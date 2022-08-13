<?php

namespace App\Http\Controllers;

use App\Models\domain;
use App\Models\post;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {


        $top6 = '[


            {
                "title":"aaaa",
                "img":["https://sc.upid.ir/upload/169gm2p8/%d9%85%d8%a7%d8%b1%d8%aa%d8%a7-%d8%aa%d9%88%d8%b1%d9%86%d9%87-9.jpg","-100%","-100%"],
                "link" : "https://www.google.com"
            },

            {
                "title":"bbb",
                "img":["https://sc.upid.ir/upload/169gm2p8/%d9%85%d8%a7%d8%b1%d8%aa%d8%a7-%d8%aa%d9%88%d8%b1%d9%86%d9%87-9.jpg","-10%","-100%"],
               "link" : "https://www.asdsad.com"
            },

            {
                "title":"ccc",
                "img":["https://sc.upid.ir/upload/169gm2p8/%d9%85%d8%a7%d8%b1%d8%aa%d8%a7-%d8%aa%d9%88%d8%b1%d9%86%d9%87-9.jpg","-100%","-100%"],
               "link" : "https://www.google.com"
            },

            {
                "title":"ddd",
                "img":["https://sc.upid.ir/upload/169gm2p8/%d9%85%d8%a7%d8%b1%d8%aa%d8%a7-%d8%aa%d9%88%d8%b1%d9%86%d9%87-9.jpg","-100%","-100%"],
               "link" : "https://www.google.com"
            },

            {
                "title":"eee",
                "img":["https://sc.upid.ir/upload/169gm2p8/%d9%85%d8%a7%d8%b1%d8%aa%d8%a7-%d8%aa%d9%88%d8%b1%d9%86%d9%87-9.jpg","-100%","-100%"],
               "link" : "https://www.google.com"
            },

            {
                "title":"fff",
                "img":["https://sc.upid.ir/upload/169gm2p8/%d9%85%d8%a7%d8%b1%d8%aa%d8%a7-%d8%aa%d9%88%d8%b1%d9%86%d9%87-9.jpg","-100%","-100%"],
               "link" : "https://www.google.com"
            }


        ]';

        $x = '[
                  

            {
                "title":"سرگرمی",
                 "blogs":[["tasseography.benham.ir","latest"],"emojimeaning.benham.ir","granreserva.benham.ir"]
            } ,

            {
                "title":"تندرستی",
                 "blogs":[["tasseography.benham.ir","latest"],"emojimeaning.benham.ir","granreserva.benham.ir"]
            } ,

            {
                "title":"dd",
                 "blogs":[["tasseography.benham.ir","latest"],"emojimeaning.benham.ir","granreserva.benham.ir"]
            } ,

            {
                "title":"ff",
                 "blogs":[["tasseography.benham.ir","latest"],"emojimeaning.benham.ir","granreserva.benham.ir"]
            } ,

            {
                "title":"ee",
                 "blogs":[["tasseography.benham.ir","latest"],"emojimeaning.benham.ir","granreserva.benham.ir"]
            } 
            
        ]';











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

                    $ppp->host = "https://".$ioid;
                    $posts[] = $ppp ;
                }

                // $xindx[$h['title']] = post::where("domain_id",$blogtoid[$ioid])->take(4)->get();



            }

            $section[$h['title']]  = $posts;
        }

      





        $t = [
            "host"=>"aaa",
            "url"=>"aaa",
            "id"=>"aaa",
            "thumb"=>"https://sc.upid.ir/upload/2pgkfq2i/camel1-5c8fc2b1c9e77c0001eb1c6f.jpg",
            "title"=>"aaa",
            "caption"=>"aaa"
        ];

        $t = json_decode(json_encode($t));


        return view("main.index",
         [
             "groups" => $section,
             "top6"=>json_decode($top6),
             "big"=>[$t,$t,$t,$t,$t]
         ]
        );
    }
}
