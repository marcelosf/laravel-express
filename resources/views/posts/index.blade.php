@extends('template')

@section('content')

    <h1>Posts</h1>

    @foreach($posts as $post)

        <h1>{{ $post->title }} <i>({{ $post->created_at }})</i></h1>
        <p>{{ $post->content }}</p>
        
        <h3>Comments</h3>
        @foreach($post->comments as $comment)
            
            <b>Name: </b> {{ $comment->name }} <br>
            <b>Comment: </b> {{ $comment->comment }}
        @endforeach
        <hr>

    @endforeach

@endsection