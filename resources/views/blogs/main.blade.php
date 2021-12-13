<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="" />
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">

</head>

<body>
  
<div class="container">


@foreach (domain_param()->cats_decoded as $k => $cat)


<a href="/cat/{{array_key_first($cat)}}/">{{array_key_first($cat)}}</a>


@endforeach
<hr>


 @yield("main")
</div>



</body>
</html>