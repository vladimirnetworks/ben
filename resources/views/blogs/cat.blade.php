@extends('blogs.main')

@section('main')



<div style="margin:0px;padding:0px" class="row">
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