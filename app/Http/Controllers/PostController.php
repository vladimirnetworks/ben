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
    public function index($page=1)
    {
        $posts = Post::whereDomainId(domain_id())->orderBy('id','DESC')->paginate(2, ['*'], 'page', $page);
       
     
        return view("blogs.index",["posts"=>$posts]);
    }

    public function cat($cat,$page=1)
    {

        dd(domain_param()->cats_decoded);

        /*

        cat1 => aa,bb,cc,dd,ee
        cat2 => aa,bb,cc,dd,ee
        cat3 => aa,bb,cc,dd


        */

        $posts = Post::whereDomainId(domain_id())->orderBy('id','DESC')->paginate(2, ['*'], 'page', $page);   
        return view("blogs.index",["posts"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::create2(["domain_id"=>2,"url"=>"aa-bb","title"=>"aaa","text"=>"zzzz"]);
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
    public function show($url,post $post)
    {
        return view("blogs.post",["post"=>$post]);
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
