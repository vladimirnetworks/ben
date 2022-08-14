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


    <div id="mbmag" class="col-1 text-center ham ml-4" onClick="srchm()">
      <img src="https://www.behkiana.ir/icons/mag.png?" style="width:3rem">
    </div>



    <div id="mbsrch" class="col" style="display:none;height:100%;">
      <div class=" rounded row m-2" style="width:100%;background-color:white">

        <input id="srchboxm" class="col mr-1" placeholder="جستجو ..."
          style="border:0px;outline: none;width:100%;background-color: transparent;" />
        <img src="https://www.behkiana.ir/icons/mag.png?" style="height:100%">

      </div>
    </div>

    <script>
      function srchm() {
        $("#mbmag").fadeOut();
        $("#mbtitle").fadeOut(function() {
          $("#mbsrch").fadeIn(function() {
         
            $("#srchboxm").focus();
          }).css("display","flex");

         
        });
      }

$("#srchboxm").focusout(function(){
  $("#mbsrch").hide()
  $("#mbmag").fadeIn();
  $("#mbtitle").fadeIn();

});

    /*  
*/

    </script>



  </div>
  {{-- <a href="/">home</a>


  @foreach (Config::get('domain.cats') as $k => $cat)
  <a href="/cat/{{$k}}/">{{$k}}</a>
  @endforeach

  --}}

</div>