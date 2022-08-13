


    <div  class="border-bottom row py-3 m-0">

       
        <div class="col-4 col-md-4 p-1">
            <a href="{{$post->host}}/post/{{$post->url}}-{{$post->id}}.html"> <img style="width:100%;border-radius:4px"
                    src="{{$post->thumb}}" /></a>
        </div>

        <div class="col-8 p-1">
            <a class="text-dark font-weight-bold"
                href="{{$post->host}}/post/{{$post->url}}-{{$post->id}}.html">{{$post->title}}</a>
            <p class="m-2"><small><a class="text-dark"
                        href="/post/{{$post->url}}-{{$post->id}}.html">{{$post->caption}}</a></small></p>
        </div>

    </div>

