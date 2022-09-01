


    <div  class="border-bottom row py-3 m-0">

       
        <div class="col-4 col-md-4 p-1">
                <a href="{{$post->host}}/post/{{$post->url}}-{{$post->id}}.html">
                 {{--<img style="width:100%;border-radius:4px" src="{{$post->thumb}}" />--}}
                 <div style="border-radius:4px;width:100%;padding-bottom:90%;position:relative;overflow:hidden">

                    @if($post->thumb)
                    <img style="border-radius:4px;height:100%;position: absolute;left:-100%;right:-100%;margin:auto;" src="{{$post->thumb}}" />
                   
                        
                    @else

                    <img style="border-radius:4px;height:100%;position: absolute;left:-100%;right:-100%;margin:auto;" src="/noimage.png" />

                        
                    @endif

                </div>
                </a>
        </div>

        <div class="col-8 p-1">
            <a class="text-dark font-weight-bold"
                href="{{$post->host}}/post/{{$post->url}}-{{$post->id}}.html">{{$post->title}}</a>
            <p class="m-2"><small><a class="text-dark"
                        href="{{$post->host}}/post/{{$post->url}}-{{$post->id}}.html">{{$post->caption}}</a></small></p>
        </div>

    </div>

