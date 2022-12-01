<div class="text-white topbg2 top  container-fluid">

  <div class="row topmn ">

    <div class="col-1 text-center ham  d-lg-none">
      <span class="mr-4">
        <div></div>
        <div></div>
        <div></div>
      </span>

    </div>


    <div id="mbtitle" class="col text-center text-lg-right" style=" align-items: center;   justify-content: center;display:flex;font-weight:bold;font-size:max(2vw, 1rem);height:100%">
      <a href="https://www.benham.ir" class="bnh" style="white-space: nowrap;"> مجله‌ی اینترنتی
        بهنام</a>
        

        <div class="wbmnu d-none d-lg-inline" style="white-space: nowrap;">
          <a href="/">صفحه اول</a>
          <a href="https://www.benham.ir/about">درباره‌ی سایت</a>
          <a href="https://www.benham.ir/contact-us">تماس با ما</a>
        </div>
        


        <div style="width:100%;display:flex;height:100%;align-items: center;" class="d-none d-lg-flex">
          <div class="" style="border-radius:1rem;height:50%;background-color: white;width:50%;display:flex;justify-content: center;align-items:center;margin-right: auto;
          margin-left: auto;border:1px solid #e7e7e7">
          <form id="frm0" method="post" action="https://www.benham.ir/search" style="display: inherit;width:90%">
            {{ csrf_field() }}
            <input  name="qsearch" style="height: 80%;width:90%;border:0px;outline:0px;font-size:1rem" placeholder="جستجو ..." /></form>
           <img onClick="document.getElementById('frm0').submit()" src="https://www.benham.ir/icons/mag.png?" style="height: 80%" />
          </div>
        </div>


    </div>


    <div id="mbmag" class="col-1 text-center ham ml-4 d-lg-none" onClick="srchm()">
      <img src="https://www.benham.ir/icons/mag.png?" style="width:3rem">
    </div>




    <div id="mbsrch" class="col" style="display:none;height:100%;">
      <div class=" rounded row m-2" style="width:100%;background-color:white">

        <form id="frm1"  style="align-items: center;display: flex;" class="col mr-1" method="post" action="https://www.benham.ir/search"> <input id="srchboxm" name="qsearch" class="" placeholder="جستجو ..."
          style="border:0px;outline: none;width:100%;background-color: transparent;" />  {{ csrf_field() }}</form>
        <img onClick="document.getElementById('frm0').submit()" src="https://www.benham.ir/icons/mag.png?" style="height:100%">

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

$("#srchboxm").focusout(function(e){
setTimeout(function() {
  $("#mbsrch").hide()
  $("#mbmag").fadeIn();
  $("#mbtitle").fadeIn();
}, 500);


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