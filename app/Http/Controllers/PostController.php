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

       
        $catx = $this->domain()->catss->where("title",urldecode($cat))->first();


        //$keys = array_map("trim", explode(",", $cats[$cat]));
        //$posts = $this->domain()->Search(implode(" ", $keys))->orderBy('id', 'DESC')->paginate(10, ['*'], 'page', $page);
      
        $postsrelish = catrelish::where([
            ["domain_id", $this->domain()->id],
            ["cat_id",$catx->id]
        ])->paginate(10, ['*'], 'page', $page);

        foreach ($postsrelish as $postrel) {
           $ids[] = $postrel->post_id;
        }

        $posts = $this->domain()->Posts->whereIn('id',$ids)->get();


      

        if (isset($catx->id)) {
            $pageTitle = $cat;
        }

        return view("blogs.cat", ["posts" => $posts ,'pageinate'=>$postsrelish, "pageTitle" => $pageTitle,"cat"=>$cat]);
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
    public function show($url,$id)
    {


        
        $posts = Post::whereDomainId($this->domain()->id)->orderBy('id', 'asc')->paginate(10, ['*'], 'page', 0);

        $post = $this->domain()->posts->whereId($id)->get()[0];

        
        $related = json_decode($this->domain()->related);
       
       // dd(DB::getQueryLog());
      

        return view("blogs.post", ["post" => $post, "pageTitle" => $post->title, "related" => $related,"more" => $posts]);
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
