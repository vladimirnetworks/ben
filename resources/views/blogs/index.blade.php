@extends('blogs.main')

@section('main')
<div class="row p-3">
@foreach($posts as $post)

    <div class=" bg-white  col-12 col-md-4 ">


        <div class="border-bottom row py-3 m-1">

            <div class="col-4 col-md-4 p-1">
                <a href="/post/{{$post->url}}-{{$post->id}}.html"> <img style="width:100%;"
                        src="https://cdn01.zoomit.ir/2021/8/samsung-galaxy-z-fold-3-playing-game-216x144.jpg" /></a>
            </div>

            <div class="col-8 p-1">
                <a class="text-dark font-weight-bold"
                    href="/post/{{$post->url}}-{{$post->id}}.html">{{$post->title}}</a>
                <p class="m-2"><small><a class="text-dark"
                            href="/post/{{$post->url}}-{{$post->id}}.html">{{$post->caption}}</a></small></p>
            </div>

        </div>

    </div>

@endforeach
</div>

@if($posts->currentPage() > 2)
<a href="/index/{{$posts->currentPage()-1}}">prev</a>
@endif

@if($posts->currentPage() == 2)
<a href="/">prev</a>
@endif

@if($posts->currentPage() < $posts->lastPage())
    <a href="/index/{{$posts->currentPage()+1}}">next</a>
    @endif



    @stop