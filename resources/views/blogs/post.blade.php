@extends('blogs.main')

@section('main')


<div class="m-1">
    <h1 class="h2">
        {{$post->title}}
    </h1>

   <div class="m-2"> {{$post->text}} </div>

</div>

@stop