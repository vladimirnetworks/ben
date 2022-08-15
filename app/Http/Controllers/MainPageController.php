<?php

namespace App\Http\Controllers;

use App\Models\domain;
use App\Models\post;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index($cat = "")
    {


        $top6 = file_get_contents("top6.json");

        





        $cating =  file_get_contents('pinkcats.json');


        $cating = json_decode($cating, true);



        $x = file_get_contents("indexcat.json");
        $x = json_decode($x, true);



        include("xblid.php");

        $bloog = [];

        foreach ($x as $h) {
            foreach ($h['blogs'] as $blog) {

                $ioid = (is_array($blog) ? $blog[0] : $blog);
                if (!isset($blogtoid[$ioid])) {
                    $bloog[] = $ioid;
                }
            }
        }

        foreach ($cating as $h) {
            foreach ($h['blogs'] as $blog) {

                $ioid = $blog;
                if (!isset($blogtoid[$ioid])) {
                    $bloog[] = $ioid;
                }
            }
        }


        if (count($bloog)) {
            $blogsid = domain::whereIn('domain', $bloog)->get();

            if ($blogsid) {
                foreach ($blogsid as $blid) {

                    $blogtoid[$ioid] =  $blid->id;
                    $xb[] = '$blogtoid["' . $blid->domain . '"] = ' . $blid->id . " ;";
                }

                file_put_contents("xblid.php", "\n" . implode("\n", $xb), FILE_APPEND);
            }
        }







        ////////////////////


        foreach ($x as $h) {
            $section[$h['title']] = [];
            $posts = [];
            foreach ($h['blogs'] as $blog) {

                $ioid = (is_array($blog) ? $blog[0] : $blog);



                $tp = post::where("domain_id", $blogtoid[$ioid])->take(2)->get();

                foreach ($tp as $ppp) {

                    $ppp->host = "https://" . $ioid;
                    $posts[] = $ppp;
                }

                // $xindx[$h['title']] = post::where("domain_id",$blogtoid[$ioid])->take(4)->get();



            }

            $section[$h['title']]  = $posts;
        }




        /////////////////////////////////

        $bigtitle = null;
        $postsbig = [];
        if (isset($cating[$cat])) {

            $bigx = $cating[$cat];
            $bigtitle = $bigx['title'];

           
            foreach ($bigx['blogs'] as $blog) {

                $ioid = $blog;

                $tp = post::where("domain_id", $blogtoid[$ioid])->take(5)->get();

                foreach ($tp as $ppp) {

                    $ppp->host = "https://" . $ioid;
                    $postsbig[] = $ppp;
                }

                // $xindx[$h['title']] = post::where("domain_id",$blogtoid[$ioid])->take(4)->get();



            }
        }


        
       



        return view(
            "main.index",
            [
                "groups" => $section,
                "top6" => json_decode($top6),
                "big" => $postsbig,
                "bigtitle" => $bigtitle
            ]
        );
    }

    public function searchall(Request $r)
    {


        $tp = post::where("title" ,"like","%{$r->qsearch}%")->take(50)->get();

     

        $t = [];
        foreach ($tp as $h) {
            $t[] = [
                "host" => "https://".$h->domain->domain,
                "url" => $h->url,
                "id" => $h->id,
                "thumb" => $h->thumb,
                "title" => $h->domain->title,
                "caption" => $h->title
            ];
        }
       



        $t = json_decode(json_encode($t));


        return view(
            "main.index",
            [
                "groups" => null,
                "top6" => null,
                "big" => $t,
                "bigtitle" => $r['qsearch']
            ]
        );
    }
}
