<meta charset="utf-8">
<title>@if (isset($pageTitle)) {{$pageTitle}} @else benham.ir @endif</title>
<meta name="description" content="" />
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


  .topbg2 {
    background-color: white;
   
  
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
    background-color: rgb(2, 0, 110);
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
      min-height:50px;
    }

  }

  .pnkmenu a ,  .pnkmenu a:visited {
    font-weight: bold;
    text-decoration: none;
    color:white;
    display: inline-block;
  position: relative;
  
  }


  .pnkmenu a::after , .wbmnu a::after {
  content: '';
  position: absolute;
  width: 100%;
  transform: scaleX(0);
  border-radius: 5px;
  height: 0.05em;
  bottom: 0;
  left: 0;
  background: currentcolor;
  transform-origin: bottom right;
  transition: transform 0.25s ease-out;
}

.pnkmenu a:hover::after {
  transform: scaleX(1);
  transform-origin: bottom left;
}

.wbmnu a:hover::after {
  transform: scaleX(1);
  transform-origin: bottom left;
}

        
.wbmnu {
    margin-right:2rem;
  }
  .wbmnu a , .wbmnu a:visited {
    position: relative;
      color:#060055ab;
      font-size: 0.9rem;
      margin-right:1rem;
      font-weight: normal;
     
  }

  .wbmnu a:before {
    content:"\203A";
    margin-left:0.2rem
  }


  .bnh {
    background: #121FCF;
background: linear-gradient(to right, #121FCF 0%, #CF1512 100%);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;




  }
</style>