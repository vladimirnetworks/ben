<!DOCTYPE html>
<html lang="en">

<head>

    @include("includes.headers")

</head>


<body>

    <div class="main">


        @include("includes.topmenu")

        <div class="pnkmenu row py-1 "
            style="background: rgb(187,0,121);
        background: linear-gradient(180deg, rgb(187 0 24) 0%, rgb(255 0 129) 100%);color:white;font-weight:bold;margin:0px;border-top:0.3rem solid #f79900">

            <div class="col-4 col-md-3 text-center p-3">
                <div><a href="tv">فیلم و سریال</a></div>
            </div>

            <div class="col-4 col-md-3 text-center p-3">
                <div><a href="tech">تکنولوژی</a></div>
            </div>

            <div class="col-4 col-md-3 text-center p-3">
                <div><a href="health">سلامتی</a></div>
            </div>

            <div class="col-4 col-md-3 text-center p-3">
                <div><a href="animals">حیوانات</a></div>
            </div>


            <div class="col-4 col-md-3 text-center p-3">
                <div><a href="cooking">آشپزی</a></div>
            </div>

            <div class="col-4 col-md-3 text-center p-3">
                <div><a href="fal">فال</a></div>
            </div>



            <div class="d-none d-md-inline col-4 col-md-3 text-center p-3">
               
                <div><a href="science">علمی</a></div>
            </div>

            <div class="d-none d-md-inline col-4 col-md-3 text-center p-3">
               
                <div><a href="bio">بیوگرافی</a></div>
            </div>



        </div>

        <div style="display:flex;justify-content: space-around;">

            <div class="rounded-bottom shadow text-center small p-1"
                style="width:35vw;background-color:white;color:lightslategrey">افراد آنلاین : {{persiannumber(onlineusers())}}</div>


            <div class="rounded-bottom shadow text-center small p-1"
                style="width:35vw;background-color:white;color:lightslategrey">
              {{ dayofweek()}}
            {{farsidate(date("Y-m-d"))}}
            </div>
        </div>

        <div class="row mt-4" style="margin:0px">


           


        </div>


       

       
        <div class="p-3 m-3 bg-white rounded">
            <h3>درباره ی سایت</h3>
        </div>
       


        





        @include("includes.footer")


    </div>




</body>

</html>