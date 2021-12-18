<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
        $posts = Post::whereDomainId(domain_id())->orderBy('id', 'DESC')->paginate(2, ['*'], 'page', $page);


        return view("blogs.index", ["groups" => [
            ["title"=>"a" , "posts"=>$posts],
            ["title"=>"b" , "posts"=>$posts],
            ["title"=>"c" , "posts"=>$posts]
        ],"pageTitle"=>domain_param()->title]);
    }

    public function cat($cat, $page = 1)
    {

        $cats = domain_param()->cats_decoded;
        $keys = array_map("trim", explode(",", $cats[$cat]));
        $posts = $posts = Post::whereDomainId(domain_id())->whereRaw(" MATCH(`title`) AGAINST (? IN BOOLEAN MODE) ", implode(" ", $keys))->orderBy('id', 'DESC')->paginate(2, ['*'], 'page', $page);
        
        if (isset($cats[$cat])) {
            $pageTitle = $cat;
        }
        
        return view("blogs.index", ["posts" => $posts,"pageTitle"=>$pageTitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::create2(["domain_id" => 2, "url" => "aa-bb", "title" => "aaa", "text" => "zzzz"]);
    }

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
    public function show($url, post $post)
    {


        $posts = Post::whereDomainId(domain_id())->orderBy('id', 'DESC')->paginate(2, ['*'], 'page', 0);

        return view("blogs.post", ["post" => $post,"pageTitle"=>$post->title,"related"=>$posts]);
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
