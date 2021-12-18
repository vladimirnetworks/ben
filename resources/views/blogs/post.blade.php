@extends('blogs.main')

@section('main')


<div class="m-1 p-1">
    <h1 class="h2">
        {{$post->title}}
    </h1>

   <div class="m-2"> {{$post->text}} </div>

</div>

<hr>
<div style="margin:0px;padding:0px" class="row">
    @foreach($related as $post)
      @include("blogs.includes.list") 
    @endforeach
</div>



@stop