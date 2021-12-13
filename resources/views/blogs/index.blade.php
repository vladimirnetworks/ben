@extends('blogs.main')

@section('main')


blog index


@foreach($posts as $post)

<div>
    <h1>
       <a href="/post/aa-a-a-{{$post->id}}.html">{{$post->title}}</a>
    </h1>

    {{$post->text}}

</div>

@endforeach


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