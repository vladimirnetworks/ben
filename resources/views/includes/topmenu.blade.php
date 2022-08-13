<div class="text-white topbg top  container-fluid">

    <div class="row topmn ">

      <div class="col-1 text-center ham  d-lg-none">
        <span class="mr-4">
        <div></div>
        <div></div>
        <div></div>
        </span>

      </div>


      <div id="mbtitle" class="col text-center text-lg-right" style="font-weight:bold;font-size:max(2vw, 1rem);">
        <a href="/" style="color:white"> مجله‌ی اینترنتی
          بهنام</a>

      </div>


      <div id="mbmag" class="col-1 text-center ham ml-4">
        <img src="https://www.behkiana.ir/icons/mag.png?" style="width:3rem">
      </div>


      <div id="mbsrch" class="col-11 " style="display:none">
        <div class="bg-white rounded">
          <img src="https://www.behkiana.ir/icons/mag.png?" style="width:3rem">
        </div>
      </div>

      <script>
        $("#mbmag").fadeOut();
        $("#mbtitle").fadeOut(function() {
          $("#mbsrch").fadeIn()
        });


      </script>



    </div>
    {{-- <a href="/">home</a>


    @foreach (Config::get('domain.cats') as $k => $cat)
    <a href="/cat/{{$k}}/">{{$k}}</a>
    @endforeach

  --}}
  
  </div>