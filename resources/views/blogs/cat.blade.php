@extends('blogs.main')

@section('main')



<div style="margin:0px;padding:0px" class="row">
    @foreach($posts as $post)
      @include("blogs.includes.list") 
    @endforeach
</div>



@if($posts->currentPage() > 2)
<a href="/cat/{{$cat}}/index/{{$posts->currentPage()-1}}">prev</a>
@endif

@if($posts->currentPage() == 2)
<a href="/cat/{{$cat}}">prev</a>
@endif

@if($posts->currentPage() < $posts->lastPage())
    <a href="/cat/{{$cat}}/index/{{$posts->currentPage()+1}}">next</a>
@endif



    @stop