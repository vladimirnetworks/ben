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
    .main {
      direction: rtl;
      text-align: right;
    }

    body {
      background-color: white;
    }

    .padding-0{
    padding-right:0;
    padding-left:0;
}
  </style>

</head>


<body>

  <div class="main">


    <div class="p-4 p-md-5 mb-4 text-white bg-dark" style="direction:rtl">
      <a href="/">home</a>
      @foreach (domain_param()->cats_decoded as $k => $cat)
      <a href="/cat/{{$k}}/">{{$k}}</a>
      @endforeach
    </div>


    @yield("main")








    <div class="p-4 p-md-5 mb-4 text-white bg-dark">
      footer
      </div>
  </div>




</body>

</html>