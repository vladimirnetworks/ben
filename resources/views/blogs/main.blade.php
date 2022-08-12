<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="" />
  <meta charset="utf-8">
  <title>@if (isset($pageTitle)) {{$pageTitle}} @else benham.ir @endif</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="/bs/bootstrap.min.css">


  <script src="/jquery/jquery.min.js"></script>

  <script src="/bs/bootstrap.min.js"></script>

  <style>

@font-face {
font-family: "irans";
src: url("static/irans.eot");
src: url("static/irans.eot?#iefix") format("embedded-opentype"),
     url("static/irans.woff") format("woff");

}

@font-face {
font-family: "irans2";

src: url("static/irans.ttf") format("truetype");

}




    .main {
      direction: rtl;
      text-align: right;
    }

    body {
      background-color: #eeeff1;
      font-family:irans,irans2;	
      font-size: 1.2rem;
      line-height: 2.1rem;
 
    font-weight: 400;
    }

    .padding-0{
    padding-right:0;
    padding-left:0;
}

a:hover {
  text-decoration: none;
}

.top {
  direction:rtl
}

.top a , .top a:visited {
 display:inline-block
}

.bpost img {
  width:100%
}
  </style>

</head>


<body>

  <div class="main">


    <div class="p-4 p-md-5 mb-4 text-white bg-dark top" >
      <a href="/">home</a>
      @foreach (Config::get('domain.cats') as $k => $cat)
      <a href="/cat/{{$k}}/">{{$k}}</a>
      @endforeach
    </div>


    @yield("main")








    <div class="p-4 p-md-5 mt-4 text-white bg-dark">
      footer
      </div>
  </div>




</body>

</html>