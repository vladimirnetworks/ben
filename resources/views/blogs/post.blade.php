@extends('blogs.main')

@section('main')

<div class="row" style="margin:0px">
<div class="col-12 col-md-9">
    <div class="my-3 p-3 bg-white rounded">

        <div class="row">
        <h1 class="h2 col">
            {{$post->title}}
        </h1>

        <small class="ml-2" style="white-space:nowrap;color:grey">{{bendate($post->created_at)}}</small>

    </div>
    
        <div class="m-2 bpost"> {!! $post->text !!} </div>
    
    </div>

    <div class="row bg-white rounded my-3 py-3">
        @if(@isset($related) && count($related) > 0)

        @foreach($related as $post)
        <div class="col-12 col-md-4">
        @include("blogs.includes.list")
        </div>
        @endforeach

        @endif

        </div>

</div>

<div class="col-12 col-md-3">
  
        <div class=" bg-white rounded my-3 py-3">
        @foreach($more as $post)
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