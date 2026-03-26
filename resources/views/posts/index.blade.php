@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Create a Post</h2>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <textarea name="description" placeholder="What's on your mind?" class="form-control mb-2"></textarea>
        <button type="submit" class="btn btn-success">Post</button>
    </form>

    <hr>

    @foreach($posts as $post)
    <div class="post border p-3 mb-3">
        <strong>{{ $post->name }}</strong>
        <p>{{ $post->description }}</p>

        <div class="comments ml-4">
            @foreach($post->comments as $comment)
                <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->comment }}</p>
            @endforeach
        </div>

        <form action="{{ route('posts.comment', $post->id) }}" method="POST">
            @csrf
            <input type="text" name="comment" placeholder="Write a comment..." class="form-control">
            <button type="submit" class="btn btn-primary btn-sm mt-1">Comment</button>
        </form>
    </div>
    @endforeach

</div>
@endsection
