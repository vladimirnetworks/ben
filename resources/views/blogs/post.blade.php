@extends('blogs.main')

@section('main')


<div>
    <h1>
        {{$post->title}}
    </h1>

    {{$post->text}}

</div>

@stop