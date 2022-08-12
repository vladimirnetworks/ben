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
      font-family: IRANSans;
      font-style: normal;
      font-weight: bold;
      src: url('/fonts/IRANSansWeb_Bold.eot');
      src: url('/fonts/IRANSansWeb_Bold.eot?#iefix') format('embedded-opentype'),
        url('/fonts/IRANSansWeb_Bold.woff2') format('woff2'),
        url('/fonts/IRANSansWeb_Bold.woff') format('woff'),
        url('/fonts/IRANSansWeb_Bold.ttf') format('truetype');
    }

    @font-face {
      font-family: IRANSans;
      font-style: normal;
      font-weight: 500;
      src: url('/fonts/IRANSansWeb_Medium.eot');
      src: url('/fonts/IRANSansWeb_Medium.eot?#iefix') format('embedded-opentype'),
        url('/fonts/IRANSansWeb_Medium.woff2') format('woff2'),
        url('/fonts/IRANSansWeb_Medium.woff') format('woff'),
        url('/fonts/IRANSansWeb_Medium.ttf') format('truetype');
    }

    @font-face {
      font-family: IRANSans;
      font-style: normal;
      font-weight: 300;
      src: url('/fonts/IRANSansWeb_Light.eot');
      src: url('/fonts/IRANSansWeb_Light.eot?#iefix') format('embedded-opentype'),
        url('/fonts/IRANSansWeb_Light.woff2') format('woff2'),
        url('/fonts/IRANSansWeb_Light.woff') format('woff'),
        url('/fonts/IRANSansWeb_Light.ttf') format('truetype');
    }

    @font-face {
      font-family: IRANSans;
      font-style: normal;
      font-weight: 200;
      src: url('/fonts/IRANSansWeb_UltraLight.eot');
      src: url('/fonts/IRANSansWeb_UltraLight.eot?#iefix') format('embedded-opentype'),
        url('/fonts/IRANSansWeb_UltraLight.woff2') format('woff2'),
        url('/fonts/IRANSansWeb_UltraLight.woff') format('woff'),
        url('/fonts/IRANSansWeb_UltraLight.ttf') format('truetype');
    }

    @font-face {
      font-family: IRANSans;
      font-style: normal;
      font-weight: normal;
      src: url('/fonts/IRANSansWeb.eot');
      src: url('/fonts/IRANSansWeb.eot?#iefix') format('embedded-opentype'),
        url('/fonts/IRANSansWeb.woff2') format('woff2'),
        url('/fonts/IRANSansWeb.woff') format('woff'),
        url('/fonts/IRANSansWeb.ttf') format('truetype');

    }





    .main {
      direction: rtl;
      text-align: right;
    }

    body {
      background-color: #eeeff1;
      font-family: IRANSans;
      /*font-size: 1.2rem;*/
      /*line-height: 2.1rem;*/

      font-weight: 400;
    }

    .padding-0 {
      padding-right: 0;
      padding-left: 0;
    }

    a:hover {
      text-decoration: none;
    }

    .top {
      direction: rtl
    }

    .top a,
    .top a:visited {
      display: inline-block
    }

    .bpost img {
      max-width: 100%
    }


    .topbg {
      background: linear-gradient(214deg, #d200a5, #0061d2, #d20000);
      background-size: 600% 600%;

      -webkit-animation: AnimationName 19s ease infinite;
      -moz-animation: AnimationName 19s ease infinite;
      animation: AnimationName 19s ease infinite;
    }

    @-webkit-keyframes AnimationName {
      0% {
        background-position: 78% 0%
      }

      50% {
        background-position: 23% 100%
      }

      100% {
        background-position: 78% 0%
      }
    }

    @-moz-keyframes AnimationName {
      0% {
        background-position: 78% 0%
      }

      50% {
        background-position: 23% 100%
      }

      100% {
        background-position: 78% 0%
      }
    }

    @keyframes AnimationName {
      0% {
        background-position: 78% 0%
      }

      50% {
        background-position: 23% 100%
      }

      100% {
        background-position: 78% 0%
      }
    }

    .ham div {
      max-width: 30px;
      width: 10vw;
      height: 0.3rem;
      background-color: white;
      border-radius: 1rem;
      margin-top: 0.3rem;
    }

    .ham {
      margin-top: -0.3rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center
    }

    .topmn {
      height: 7vh;
      align-items: center;
    }


    @media all and (orientation:portrait) {
      .topmn {
        height: 7vh;

      }

    }

    @media all and (orientation:landscape) {
      .topmn {
        height: 11vh;
      }

    }
  </style>

</head>


<body>

  <div class="main">


    <div class="text-white topbg top  container-fluid">

      <div class="row topmn ">

        <div class="col-xs-1 text-center ham mr-4 d-lg-none">
          <div></div>
          <div></div>
          <div></div>
        </div>


        <div class="col text-center text-lg-right" style="font-weight:bold;font-size:max(3vw, 1rem);"> مجله‌ی اینترنتی بهنام</div>

       <!--  <div class="col text-right d-none d-md-block  " style="font-weight:bold">مجله‌ی اینترنتی بهنام</div> -->


        <div class="col-xs-1 text-center ham ml-4">
          <img src="https://www.behkiana.ir/icons/mag.png?" style="width:3rem">

        </div>


      </div>
      <!-- <a href="/">home</a>


      @foreach (Config::get('domain.cats') as $k => $cat)
      <a href="/cat/{{$k}}/">{{$k}}</a>
      @endforeach
 -->

    </div>


    @yield("main")








    <div class="p-4 p-md-5 mt-4 text-white bg-dark">
      footer
    </div>
  </div>




</body>

</html>