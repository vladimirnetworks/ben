<div class="text-white topbg2 top  container-fluid">

  <div class="row topmn ">

    <div class="col-1 text-center ham  d-lg-none">
      <span class="mr-4">
        <div></div>
        <div></div>
        <div></div>
      </span>

    </div>


    <div id="mbtitle" class="col text-center text-lg-right" style="    justify-content: center;display:flex;font-weight:bold;font-size:max(2vw, 1rem);">
      <a href="/" class="bnh"> مجله‌ی اینترنتی
        بهنام</a>
        

        <div class="wbmnu d-none d-lg-inline">
          <a href="#">صفحه اول</a>
          <a href="#">نقشه سایت</a>
          <a href="#">تماس با ما</a>
        </div>
        


        <div style="color:red;margin-right:auto" class="d-none d-lg-inline">
        search
        </div>


    </div>


    <div id="mbmag" class="col-1 text-center ham ml-4 d-lg-none" onClick="srchm()">
      <img src="https://www.behkiana.ir/icons/mag.png?" style="width:3rem">
    </div>




    <div id="mbsrch" class="col" style="display:none;height:100%;">
      <div class=" rounded row m-2" style="width:100%;background-color:white">

        <input id="srchboxm" class="col mr-1" placeholder="جستجو ..."
          style="border:0px;outline: none;width:100%;background-color: transparent;border-bottom:1px solid grey" />
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