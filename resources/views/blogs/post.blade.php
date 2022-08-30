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

  {{--

   <!-- <div style="" class="col-md-6 ">
        <div class="col-md-12 bg-white rounded">
        @foreach($related as $post)
        @include("blogs.includes.list")
        @endforeach
        </div>
    </div>
-->
--}}
    
</div>

@if(hname() == 'tasseography.benham.ir')
<div  id="motvldc"  class="container" style="direction:rtl;text-align:center; position:fixed;left:0px;bottom:-100%; -o-transition:1.5s;-ms-transition:1.5s;-moz-transition:1.5s;-webkit-transition:1.5s;transition:1.5s;width:100%">


    
    <div style="text-align:center;padding:2%;font-size:150%;color:white;background-color:#cc0099">متولد کدوم ماهی ؟</div>
  
   <div class="btn-group btn-group-justified">
     <a href="tg://resolve?domain=coffeereading&post=506&single" class="btn btn-primary">فروردین</a>
     <a href="tg://resolve?domain=coffeereading&post=507&single" class="btn btn-primary">اردیبهشت</a>
     <a href="tg://resolve?domain=coffeereading&post=508&single" class="btn btn-primary">خرداد</a>
    <a href="tg://resolve?domain=coffeereading&post=509&single" class="btn btn-primary">تیر</a>
   </div>
   
     <div class="btn-group btn-group-justified">
     <a href="tg://resolve?domain=coffeereading&post=510&single" class="btn btn-primary">مرداد</a>
     <a href="tg://resolve?domain=coffeereading&post=511&single" class="btn btn-primary">شهریور</a>
     <a href="tg://resolve?domain=coffeereading&post=512&single" class="btn btn-primary">مهر</a>
     <a href="tg://resolve?domain=coffeereading&post=513&single" class="btn btn-primary">آبان</a>
   </div>
   
     <div class="btn-group btn-group-justified">
     <a href="tg://resolve?domain=coffeereading&post=514&single" class="btn btn-primary">آذر</a>
     <a href="tg://resolve?domain=coffeereading&post=515&single" class="btn btn-primary">دی</a>
     <a href="tg://resolve?domain=coffeereading&post=516&single" class="btn btn-primary">بهمن</a>
     <a href="tg://resolve?domain=coffeereading&post=517&single" class="btn btn-primary">اسفند</a>
   </div>
  
  
  </div>
  
  
  <script>
  
  $(".btn-group a").click(function() {
  
  var txtx= $(this).text();
  
  $.ajax({
         url: "/cstat.php?t="+txtx,
         type: 'GET',
  
         success: function(res) {
  
         }
  
     });
  
  var hrefx= $(this).attr('href');
  
  hrefx = hrefx .replace("https://www.instagram.com/p/","instagram://media?id=");
  
  if (hrefx.indexOf('instagram') >= 0) {
  window.setTimeout(function() {
  window.location=hrefx ;
  },30);
  }
  
  });
  
  window.setTimeout(function() {
  
    $([document.documentElement, document.body]).animate({
      scrollTop: $(document).scrollTop()+$("#motvldc").height()+7
   }, 2000);
     
     document.getElementById('motvldc').style.bottom='0px';
     
     $("body").css({"paddingBottom":($("#motvldc").height()+50)+"px"});
     
  },1);
  </script>
@endif


@stop