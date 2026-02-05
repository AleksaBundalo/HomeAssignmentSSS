@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <h1 class="fw-bold">Latest Reviews</h1>
        @guest
            <div class="alert alert-info mb-0 py-2">
                Please <a href="{{ route('login') }}" class="fw-bold">login</a> to share a review!
            </div>
        @endguest
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success bg-dark text-success border-success">
        {{ session('success') }}
    </div>
@endif

<div class="row">
    @forelse($posts as $post)
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-bold" style="color: #bb86fc;">{{ $post->title }}</h5>
                    <p class="text-muted small">Posted by {{ $post->user->name }}</p>
                    <p class="card-text">{{ Str::limit($post->body, 120) }}</p>
                    
                    <div class="d-flex gap-2 mt-auto">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-studio-outline">View Full Review</a>
                        
                        @if($post->user_id === auth()->id())
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-studio-neon">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-studio-danger" onclick="return confirm('Delete this post forever? (this cannot be undone)')">Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted">No reviews found. Be the first!</p>
        </div>
    @endforelse
</div>
@endsection