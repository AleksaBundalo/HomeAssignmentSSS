@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h1 class="display-5">{{ $post->title }}</h1>
            <p class="text-muted">
                By <strong>{{ $post->user->name }}</strong>
                on {{ $post->created_at->format('M d, Y') }}</p>
                at {{ $post->created_at->format('H:i') }}
            <hr>
            <div class="lead">
                {{ $post->content }}
            </div>
            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary mt-3">Back to List</a>
            <hr>
            <h4>Comments</h4>
            @forelse($post->comments as $comment)
                <div class="alert alert-light border shadow-sm py-2">
                    <p class="mb-0">
                        <strong>{{ $comment->user?->name ?? 'Anonymous' }}:</strong> {{ $comment->body }}
                        <small class="text-muted">({{ $comment->created_at->diffForHumans() }})</small>
                    </p>
                    <p class="mb-0">{{ $comment->body }}</p>
                </div>
            @empty
                <p class="text-muted">No comments yet. Be the first to share your thoughts!</p>
            @endforelse
            <hr>
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea name="body" class="form-control" placeholder="Write a comment..." rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Post Comment</button>
            </form>
            
        </div>
    </div>
</div>
@endsection