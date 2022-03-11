<?php

namespace App\Http\Controllers;

use App\Models\domain;
use App\Models\post;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function bigsearch($query)
    {

        $s1 = [];

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
                    $s1[] = ['type' => "domain", "data" => ["domain"=>$domain->domain,"domain_id"=>$domain->id], "title" => $domain->domain];
                }
            }



            $posts = post::where('title', 'like', "%" . $query . "%")
                ->orWhere('tiny_text', 'like', "%" . $query . "%")
                ->orWhere('text', 'like', "%" . $query . "%")
                ->orWhere('url', 'like', "%" . $query . "%")
                ->get();

            if (isset($posts) && count($posts) > 0) {
                foreach ($posts as $post) {
                    $s1[] = ['type' => "post", "data" => ["id" => $post->id, "domain_id" => $post->domain_id, "domain" => $post->domain->domain], "title" => $post->title];
                }
            }
        }

        return ["data" => $s1];
    }



    public function showpost($domain,$post_id)
    {
        $posts = Post::where([

            ["domain_id",'=',getDomainIdByName($domain)]
            ,
            ["id","=",$post_id]

        ])->first();

        return ["data"=>$posts];
    }


    public function updatepost(Request $req , $domain,$post_id)
    {
        $post = Post::where([

            ["domain_id",'=',getDomainIdByName($domain)]
            ,
            ["id","=",$post_id]

        ])->first();

        $post->title = $req->title;
        $post->tiny_text = $req->tiny_text;
        $post->text = $req->text;
        $post->url = $req->url;
      
        $post->save();

        return ["data"=>$post];
    }


    public function addnewpost(Request $req , $domain)
    {

        $post = new Post();

        $post->domain_id = getDomainIdByName($domain);
        $post->title = $req->title;
        $post->tiny_text = $req->tiny_text;
        $post->text = $req->text;
        $post->url = $req->url;
      
        $post->save();

        return ["data"=>$post];
    }

    function deletepost(Request $req , $domain,$post_id) {
        return $post = Post::where([

            ["domain_id",'=',getDomainIdByName($domain)]
            ,
            ["id","=",$post_id]

        ])->delete();
    }

}
