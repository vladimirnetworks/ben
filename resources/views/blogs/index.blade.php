@extends('blogs.main')

@section('main')





@foreach($groups as $group)
 <h4 class="m-4">{{$group['title']}}</h4>
<div  class="row m-3 bg-white rounded">
    @foreach($group['posts'] as $post)
      @include("blogs.includes.list") 
    @endforeach
</div>
@endforeach

 {{--
@if($posts->currentPage() > 2)
<a href="/index/{{$posts->currentPage()-1}}">prev</a>
@endif

@if($posts->currentPage() == 2)
<a href="/">prev</a>
@endif

@if($posts->currentPage() < $posts->lastPage())
    <a href="/index/{{$posts->currentPage()+1}}">next</a>
@endif
--}}


    @stop