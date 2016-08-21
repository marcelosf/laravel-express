@extends('template')

@section('content')

    <h1>Posts</h1>

    @foreach($posts as $post)

        <h1>{{ $post->title }} <i>({{ $post->created_at }})</i></h1>
        <p>{{ $post->content }}</p>
        <hr>

    @endforeach

@endsection