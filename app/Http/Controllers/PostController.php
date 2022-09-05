<?php

namespace App\Http\Controllers;

use App\Models\catrelish;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\domain;

class PostController extends start
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function sitemap()
    {

        //  $latest =  $this->domain()->posts->orderBy('id', 'DESC')->take(100)->get();


        $latest = $this->domain()->posts->orderBy('updated_at', 'desc')->limit(1000)->get();




        // dd($posts[0]->domain->domain);



        $sitemap =  '<?xml version="1.0" encoding="UTF-8"?>

        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        
        ';

        foreach ($latest as $hitx) {

            $linkpage = "https://" . $hitx->domain->domain . "/post/" . $hitx->url . "-" . $hitx->id . '.html';
            $lastmodx = '<lastmod>' . $hitx->updated_at . '+03:30</lastmod>';


            $sitemap .=  '<url>
' . '<loc>' . $linkpage . '</loc>
' . $lastmodx . '
</url>
';
        }

        $sitemap .=  "</urlset>";

        return response($sitemap, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }




    public function index()
    {

        DB::enableQueryLog();



        $cats = \Config::get('domain.cats');




        $groups = [];

        if (count($cats)) {
            foreach ($cats as $k => $cat) {
                if ($k < 10) {

                    $keys = array_map("trim", explode(",", $cat));
                    $posts = $this->domain()->Search(implode(" ", $keys))->orderBy('id', 'DESC')->take(5)->get();
                    #  dd(DB::getQueryLog());

                    if (count($posts)) {
                        $groups[] = ["title" => $k, "posts" => $posts];
                    }
                }
            }
        }

        $latest = $posts = $this->domain()->posts->orderBy('id', 'DESC')->take(10)->get();

        return view("blogs.index", [
            "latest" => $latest,
            "groups" => $groups,
            "pageTitle" => $this->domain()->title
        ]);
    }




    public function cat($cat, $page = 1)
    {


        $cats = \Config::get('domain.cats');


        $catx = $this->domain()->catss->where("title", urldecode($cat))->first();


        //$keys = array_map("trim", explode(",", $cats[$cat]));
        //$posts = $this->domain()->Search(implode(" ", $keys))->orderBy('id', 'DESC')->paginate(10, ['*'], 'page', $page);

        $postsrelish = catrelish::where([
            ["domain_id", $this->domain()->id],
            ["cat_id", $catx->id]
        ])->paginate(10, ['*'], 'page', $page);

        foreach ($postsrelish as $postrel) {
            $ids[] = $postrel->post_id;
        }

        $posts = $this->domain()->Posts->whereIn('id', $ids)->get();




        if (isset($catx->id)) {
            $pageTitle = $cat;
        }

        return view("blogs.cat", ["posts" => $posts, 'pageinate' => $postsrelish, "pageTitle" => $pageTitle, "cat" => $cat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */


    public static function xben($mm, $k)
    {

        $aa = '
        <div id="b' . $k . 'video-player"></div>
        <script>
        jwplayer("b' . $k . 'video-player").setup({
    
        "playbackRateControls": "true",
        "timeSliderAbove": "true",
        "width": "100%",
        "aspectratio": "16:9",
        "skin":
        {
        "active": "#E20022",
       
        "controlbar": {
        "iconsActive": "#f00",
        "icons": "#fff"
        },
        "timeslider": {
        "progress": "#f00"
        },
        "menus": {
        "textActive": "#f00"
        }
        },
            
                "qualityLabels": { },
            
        "playlist": [{
        "image": "",
        "sources": [
    
            
                {
                "file": "' . $mm . '",
                "type": "dash"
                }
            
        ],
    
        }],
    
            
                "dash": "shaka",
            
    
    
        "autostart": "viewable",
    
        "logo": {
            "file": "",
            "position": "bottom-right"
        },
    
        "plugins": {
        }
        });
    
    
    
    
    </script>';
        return $aa;
    }


    public function show($url, $id)
    {

        $benmash = '<script src="https://static.namasha.com/content/player8.11.10/jwplayer.js"></script>
        <script>jwplayer.base = "https://static.namasha.com/content/player8.11.10/";</script>
        <script>jwplayer.key = "kukmSGInuqM0shRLwJjVLWeWAxLakiKS90Fg2+vhQks=";</script>
        ';


        $posts = Post::whereDomainId($this->domain()->id)->orderBy('id', 'asc')->paginate(10, ['*'], 'page', 0);

        $post = $this->domain()->posts->whereId($id)->get()[0];


        if (preg_match("!https://.*?.namasha.com/dash/.*?/Manifest.mpd!", $post->text)) {
            $post->text  = $benmash . $post->text;

            preg_match_all("!(https://.*?.namasha.com/dash/.*?/Manifest.mpd)!", $post->text, $m);
            foreach ($m[1] as $k => $hh) {
                $zz[] = $this::xben($hh, $k);
            }

            $post->text = str_replace($m[1], $zz, $post->text);
        }

        $related = json_decode($this->domain()->related_posts);




        // dd(DB::getQueryLog());


        return view("blogs.post", ["post" => $post, "pageTitle" => $post->title, "related" => $related, "more" => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
    }
}
