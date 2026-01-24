@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p class="text-muted">By {{ $post->user->name }} | {{ $post->created_at->diffForHumans() }}</p>
    <p>{{ $post->body }}</p>

    <hr>
    <h5>Comments</h5>
    @foreach($post->comments as $comment)
        <div class="mb-2">
            <strong>{{ $comment->user->name }}:</strong> {{ $comment->body }}
        </div>
    @endforeach

    @auth
    <form action="{{ route('comments.store', $post->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="body" class="form-control" rows="3" placeholder="Add a comment"></textarea>
        </div>
        <button class="btn btn-primary btn-sm mt-2">Comment</button>
    </form>
    @endauth
</div>
@endsection
