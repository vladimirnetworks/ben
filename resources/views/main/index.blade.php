<!DOCTYPE html>
<html lang="en">

<head>

    @include("includes.headers")

</head>


<body>

    <div class="main">


        @include("includes.topmenu")

        <div class="row py-1 " style="background: rgb(187,0,121);
        background: linear-gradient(0deg, rgba(187,0,121,1) 0%, rgba(255,0,165,1) 100%);color:white;font-weight:bold;margin:0px">
        
            <div class="col-4 col-md-3 text-center p-3">
                <div >فیلم و سریال</div>
            </div>

            <div class="col-4 col-md-3 text-center p-3">
                <div >علمی</div>
            </div>

            <div class="col-4 col-md-3 text-center p-3">
                <div >سلامتی</div>
            </div>

            <div class="col-4 col-md-3 text-center p-3">
                <div >بیوگرافی</div>
            </div>


            <div class="col-4 col-md-3 text-center p-3">
                <div >آشپزی</div>
            </div>

            <div class="col-4 col-md-3 text-center p-3">
                <div >فال</div>
            </div>



            <div class="d-none d-md-inline col-4 col-md-3 text-center p-3">
                <div >پزشکی</div>
            </div>

            <div class="d-none d-md-inline col-4 col-md-3 text-center p-3">
                <div >تکنولوژی</div>
            </div>

            

        </div>

        <div style="display:flex;justify-content: space-around;">

            <div class="rounded-bottom shadow text-center small p-1" style="width:35vw;background-color:white;color:lightslategrey">افراد آنلاین : ۳۴</div>


            <div class="rounded-bottom shadow text-center small p-1" style="width:35vw;background-color:white;color:lightslategrey">پنج‌شنبه ۱۴۰۱/۰۱/۲۲</div>
        </div>

        <div class="row mt-4" style="margin:0px">

            <div class="col-6 col-md-2 mt-1 p-1">
                <div class="rounded" style="width:100%;padding-bottom:70%;background-color:white"></div>
            </div>

            <div class="col-6 col-md-2 mt-1 p-1">
                <div class="rounded" style="width:100%;padding-bottom:70%;background-color:white"></div>
            </div>

            <div class="col-6 col-md-2 mt-1 p-1">
                <div class="rounded" style="width:100%;padding-bottom:70%;background-color:white"></div>
            </div>

            <div class="col-6 col-md-2 mt-1 p-1">
                <div class="rounded" style="width:100%;padding-bottom:70%;background-color:white"></div>
            </div>


            <div class="d-none d-md-inline col-6 col-md-2 mt-1 p-1">
                <div class="rounded" style="width:100%;padding-bottom:70%;background-color:white"></div>
            </div>



            <div class="d-none d-md-inline col-6 col-md-2 mt-1 p-1">
                <div class="rounded" style="width:100%;padding-bottom:70%;background-color:white"></div>
            </div>


        </div>

        <div class="row" style="margin:0px">
        @foreach($groups as $kg => $group)
        <div class="col-md-6 col-lg-4 m-0" >
            
            <div style="display:flex;width:100%;justify-content: space-between;align-items: center"><h4 class="m-4">{{$kg}}</h4> <a style="margin-left:2rem"  href="#">بیشتر ...</a></div>

            <div class="m-2 bg-white rounded">
                @foreach($group as $post)
                @include("blogs.includes.list")
                @endforeach
            </div>

        </div>
        @endforeach
    </div>





        @include("includes.footer")


    </div>




</body>

</html>