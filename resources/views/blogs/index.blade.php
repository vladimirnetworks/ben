blog index

@foreach($posts as $post)

<h1>
 {{$post->title}}
 <h1>

    {{$post->text}}

@endforeach