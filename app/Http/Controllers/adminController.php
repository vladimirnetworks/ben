<?php

namespace App\Http\Controllers;

use App\Models\cat;
use App\Models\catrelish;
use App\Models\domain;
use App\Models\post;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;

class adminController extends Controller
{
    //

    public function importcatrelish()
    {

        $x = json_decode(file_get_contents("catrelish.json"), true);
        foreach ($x[2]['data'] as $h) {
            $catx = urldecode($h['cat']);


            $catid = 0;

            $getcats  = domain::where("id", $h['blogid'])->first();

            if (isset($getcats->id)) {

                $xcat = json_decode($getcats->cats, true);



                $indx = 1;
                foreach ($xcat as $k => $hhh) {
                    if ($k == $catx) {
                        $catid = $indx;
                        break;
                    }
                    $indx++;
                }

                if ($catid >= 1) {
                    catrelish::create([
                        "domain_id" => $h['blogid'],
                        "cat_id" => $catid,
                        "post_id" => $h['postid']
                    ]);
                }
            }
        }
    }

    public function importpost()
    {

        $x = json_decode(file_get_contents("post.json"), true);

        echo count($x[2]['data']);

        foreach ($x[2]['data'] as $h) {




            preg_match_all('!src="(.*?)"!', $h['text'], $m);




            if (preg_match("!^[0-9]+$!", $h['thumb'])) {
                $h['thumb'] = $m[1][$h['thumb']];
            }




            post::create([
                "id" => $h['postid'],
                "domain_id" => $h['blogid'],
                "created_at" => $h['times'],
                "updated_at" => $h['changitime'],
                "title" => $h['title'],
                "text" => $h['text'],
                "thumb" => $h['thumb'],
                "tiny_text" => $h['title'],
                "url" => $h['url'],
                "tags" => $h['keysearch']
            ]);
        }
    }
    public function import()
    {

        $x = json_decode(file_get_contents("blogs.json"), true);


        foreach ($x[2]['data'] as $h) {
            if ($h['filter'] == 0) {

                $x2['domain'] = (preg_match("!\.!",  $h['name']) ? $h['name'] : $h['name'] . ".benham.ir");
                $x2['title'] =  $h['title'];
                $x2['id'] =  $h['id'];

                $catt = explode("\n", trim($h['cats']));

                $xc = [];
                foreach ($catt as $c) {
                    $xc[trim($c)] = trim($c);
                }

                $x2['cats'] =  json_encode($xc);
                if ($x2['cats'] == '{"":""}') {
                    $x2['cats'] = '{}';
                }
                $export[] = $x2;
            }
        }






        foreach ($export as $x) {

            #echo $x['id'];exit;

            domain::create([
                "id" => $x['id'],
                "domain" => $x['domain'],
                "title" => $x['title'],
                "cats" => $x['cats']
            ]);

            $jcat = json_decode($x['cats'], true);


            if (count($jcat)) {
                foreach ($jcat as $kcat => $hitxaz) {

                    cat::create([
                        "domain_id" => $x['id'],
                        "title" => $kcat
                    ]);

                    // dd($kcat);

                }
            }
        }
    }
    public function checkdomain($query)
    {
        return ["status" => (getDomainIdByName($query))];
    }
    public function domainconf($query)
    {


        $dom = domain::whereId(getDomainIdByName($query))->first();


        return [
            "title" => $dom->title,
            "cats" => $dom->cats
        ];
    }
    public function deletedomain($query)
    {

        $dom = domain::whereId(getDomainIdByName($query))->first();
        post::where(["domain_id" => $dom->id])->delete();
        $dom->delete();
        return $dom->id;
    }

    public function domainsetconf(Request $req, $query)
    {
        $dom = domain::whereId(getDomainIdByName($query))->first();

        $dom->title = $req->title;
        $dom->cats = $req->cat;
        $dom->tags = $req->tags;
        $dom->save();

        return (["status" => "ok2"]);
    }

    public function regdomain(Request $req)
    {
        if (getDomainIdByName($req->domain) < 0) {
            domain::create(["domain" => $req->domain, "title" => $req->domain, "cats" => "{}"]);
            return ["status" => "ok"];
        } else {
            return ["status" => "fail"];
        }
    }


    public function bigsearch($query)
    {

        $s1 = [];

        if (substr($query, 0, 5) == "site:") {
            $blogid = getDomainIdByName(str_replace("site:", "", $query));

            if (isset($blogid) && $blogid > 0) {
                $posts = post::where('domain_id', '=', $blogid)->orderBy('id', 'DESC')->get();

                if (isset($posts) && count($posts) > 0) {
                    foreach ($posts as $post) {
                        $s1[] = ['type' => "post", "data" => ["id" => $post->id, "domain_id" => $post->domain_id, "domain" => $post->domain->domain], "title" => $post->title];
                    }
                }
            }
        }

        if (isset($query) && trim($query) == 'allblogs') {
            $domains = domain::orderBy('id', 'DESC')->get();

            if (isset($domains) && count($domains) > 0) {
                foreach ($domains as $domain) {
                    $s1[] = ['type' => "domain", "data" => ["domain" => $domain->domain, "domain_id" => $domain->id], "title" => $domain->domain];
                }
            }
        }

        if (isset($query) && trim($query) != '') {


            for ($x = 0; $x <= 10; $x++) {
                $t[] = ["title" => $query];
            }



            $domains = domain::where('domain', 'like', "%" . $query . "%")
                ->orWhere('cats', 'like', "%" . $query . "%")
                ->orWhere('title', 'like', "%" . $query . "%")
                ->get();

            if (isset($domains) && count($domains) > 0) {
                foreach ($domains as $domain) {
                    $s1[] = ['type' => "domain", "data" => ["domain" => $domain->domain, "domain_id" => $domain->id], "title" => $domain->domain];
                }
            }



            $posts = post::where('title', 'like', "%" . $query . "%")
                ->orWhere('tiny_text', 'like', "%" . $query . "%")
                ->orWhere('text', 'like', "%" . $query . "%")
                ->orWhere('url', 'like', "%" . $query . "%")
                ->get();

            if (isset($posts) && count($posts) > 0) {
                foreach ($posts as $post) {
                    if (isset($post->domain->domain)) {
                        $s1[] = ['type' => "post", "data" => ["id" => $post->id, "domain_id" => $post->domain_id, "domain" => $post->domain->domain], "title" => $post->title];
                    }
                }
            }
        }

        return ["data" => $s1];
    }


    public function showposts($domain)
    {
        $posts = Post::where([

            ["domain_id", '=', getDomainIdByName($domain)]


        ])->first();

        return ["dataz" => $posts];
    }



    public function showpost($domain, $post_id)
    {
        $posts = Post::where([

            ["domain_id", '=', getDomainIdByName($domain)],
            ["id", "=", $post_id]

        ])->first();

        return ["data" => $posts];
    }


    public function updatepost(Request $req, $domain, $post_id)
    {
      //  \DB::enableQueryLog();

       





        \DB::table('posts')->where([

            "domain_id" => getDomainIdByName($domain),
            "id" => $post_id

        ])->update([
            'title' => $req->title,
            'tiny_text' => $req->tiny_text,
            'text' => $req->text,
            'url' => $req->url
        ]);

  
        return ["data" => Post::where([

            ["domain_id", '=', getDomainIdByName($domain)],
            ["id", "=", $post_id]

        ])->first()];
    }


    public function addnewpost(Request $req, $domain)
    {

        $post = new Post();

        $post->domain_id = getDomainIdByName($domain);
        $post->title = $req->title;
        $post->tiny_text = $req->tiny_text;
        $post->text = $req->text;
        $post->url = $req->url;

        $post->save();

        return ["data" => $post];
    }

    function deletepost(Request $req, $domain, $post_id)
    {



        $post = Post::where([

            ["domain_id", '=', getDomainIdByName($domain)],
            ["id", "=", $post_id]

        ])->delete();



        return $post;
    }
}
