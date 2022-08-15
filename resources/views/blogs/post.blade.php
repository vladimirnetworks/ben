@extends('blogs.main')

@section('main')

<div class="row" style="margin:0px">
<div class="col-12 col-md-9">
    <div class="my-3 p-3 bg-white rounded">
        <h1 class="h2">
            {{$post->title}}
        </h1>
    
        <div class="m-2 bpost"> {!! $post->text !!} </div>
    
    </div>
</div>

<div class="col-12 col-md-3">
  
        <div class=" bg-white rounded my-3 py-3">
        @foreach($related as $post)
        @include("blogs.includes.list")
        @endforeach
        </div>
    
</div>
</div>


<div class="row m-0">

  

   <!-- <div style="" class="col-md-6 ">
        <div class="col-md-12 bg-white rounded">
        @foreach($related as $post)
        @include("blogs.includes.list")
        @endforeach
        </div>
    </div>
-->
    
</div>



@stop