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
                <div><a href="/fun">فیلم و سریال</a></div>
            </div>

            <div class="col-4 col-md-3 text-center p-3">
                <div><a href="/fun">علمی</a></div>
            </div>

            <div class="col-4 col-md-3 text-center p-3">
                <div>سلامتی</div>
            </div>

            <div class="col-4 col-md-3 text-center p-3">
                <div>بیوگرافی</div>
            </div>


            <div class="col-4 col-md-3 text-center p-3">
                <div>آشپزی</div>
            </div>

            <div class="col-4 col-md-3 text-center p-3">
                <div>فال</div>
            </div>



            <div class="d-none d-md-inline col-4 col-md-3 text-center p-3">
                <div>پزشکی</div>
            </div>

            <div class="d-none d-md-inline col-4 col-md-3 text-center p-3">
                <div>تکنولوژی</div>
            </div>



        </div>

        <div style="display:flex;justify-content: space-around;">

            <div class="rounded-bottom shadow text-center small p-1"
                style="width:35vw;background-color:white;color:lightslategrey">افراد آنلاین : ۳۴</div>


            <div class="rounded-bottom shadow text-center small p-1"
                style="width:35vw;background-color:white;color:lightslategrey">پنج‌شنبه ۱۴۰۱/۰۱/۲۲</div>
        </div>

        <div class="row mt-4" style="margin:0px">


            @if(!$big)
            @foreach($top6 as $k=>$top)
            <div class="col-6 col-md-2 mt-1 p-1 @if($k >= 4) d-none d-md-inline @endif">
                <div class="rounded"
                    style="position:relative;overflow:hidden;width:100%;padding-bottom:70%;background-color:white">
                    <a target="_blank" href="{{$top->link}}"> <img
                            style="z-index:999;width:100%;position:absolute;top:{{$top->img[1]}};bottom:{{$top->img[2]}};margin:auto;left:-100%;right:-100%"
                            src="{{$top->img[0]}}" /></a>
                    <div
                        style="width:100%;position:absolute;bottom:0px;z-index:1000;padding:1rem;background-color:#000000a8;">
                        <a target="_blank" href="{{$top->link}}" style="color:white;font-weight:bold">{{$top->title}}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif


        </div>


        @if($big)
        <div class="p-3 m-3 bg-white rounded">
            <h3>{{$bigtitle}}</h3>
            <div class="row" style="margin:0px">



                @foreach($big as $bk => $post)
                <div class="col-12 col-md-4">
                    @include("blogs.includes.list")
                </div>
                @endforeach


            </div>
        </div>
        @endif


        @if(!$big)
        <div class="row" style="margin:0px">
            @foreach($groups as $kg => $group)
            <div class="col-md-6 col-lg-4 m-0">

                <div style="display:flex;width:100%;justify-content: space-between;align-items: center">
                    <h4 class="m-4">{{$kg}}</h4> <a style="margin-left:2rem" href="#">بیشتر ...</a>
                </div>

                <div class="m-2 bg-white rounded">
                    @foreach($group as $post)
                    @include("blogs.includes.list")
                    @endforeach
                </div>

            </div>
            @endforeach
        </div>
        @endif





        @include("includes.footer")


    </div>




</body>

</html>