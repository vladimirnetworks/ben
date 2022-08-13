<?php

namespace App\Http\Controllers;

use App\Models\domain;
use App\Models\post;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
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

      








        return view("main.index", ["groups" => $section]);
    }
}
