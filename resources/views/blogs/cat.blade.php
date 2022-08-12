@extends('blogs.main')

@section('main')



<div  class="m-3 bg-white rounded row">
    @foreach($posts as $post)
      @include("blogs.includes.list") 
    @endforeach
</div>



@if($pageinate->currentPage() > 2)
<a href="/cat/{{$cat}}/index/{{$pageinate->currentPage()-1}}">prev</a>
@endif

@if($pageinate->currentPage() == 2)
<a href="/cat/{{$cat}}">prev</a>
@endif

@if($pageinate->currentPage() < $pageinate->lastPage())
    <a href="/cat/{{$cat}}/index/{{$pageinate->currentPage()+1}}">next</a>
@endif



    @stop