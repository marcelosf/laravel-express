@extends('template')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Posts</h1>
    </div>
    
    <hr>
    
    @foreach($posts as $post)
    
    <div class="panel panel-default">
        <div class="panel-heading"><h3>{{ $post->title }}</h3>  <i>{{ $post->created_at }}</i></div>
        <div class="panel-body">
            {{ $post->content }}
            <h3>Comments:</h3>
            <div class="well">
                @foreach($post->comments as $comment)
                    <h4><b>Name:</b> {{ $comment->name }} </h4>
                    <h4>Comment: </h4> {{ $comment->comment }}
                @endforeach
            </div>
        </div>
        <div class="panel-footer">
            <h5>Tags:</h5>
            <div class="btn-group" role="group" aria-label="...">
                @foreach($post->tags as $tag)
                <button type="button" class="btn btn-info">{{ $tag->name }}</button>
                @endforeach
            </div>
        </div>
    </div>
    
    @endforeach
@endsection

</div>