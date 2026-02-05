@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="header-container text-center mb-5">
    <h1 class="display-3 neon-header">
        Latest Reviews
    </h1>
    <p class="text-muted text-uppercase fw-bold" style="letter-spacing: 5px; opacity: 0.7;">
        The latest thoughts on music
    </p>
</div>
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
<div class="{{ $loop->first ? 'col-12 mb-5' : 'col-md-6 mb-4' }}">
    <div class="card shadow-sm h-100 studio-card {{ $loop->first ? 'featured-border' : '' }}">
        <div class="card-body p-4">
            <h2 class="{{ $loop->first ? 'display-5' : 'h5' }} fw-bold" style="color: #bb86fc;">
                {{ $post->title }}
            </h2>
            
            <div class="d-flex align-items-center mb-3">
                <a href="{{ route('profile.show', $post->user->id) }}" class="text-decoration-none">
                    <span class="badge rounded-pill bg-dark border border-light text-light px-3 py-2 opacity-75 studio-card">
                        By {{ $post->user->name }}
                    </span>
                </a>
                <span class="ms-2 text-light small" style="opacity: 0.6;">
                    • {{ $post->created_at->diffForHumans() }}
                </span>
            </div>
            
            <p class="card-text">{{ Str::limit($post->body, $loop->first ? 300 : 120) }}</p>

            <div class="d-flex gap-2 mt-auto">
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-studio-outline">View Full Review</a>

                @if($post->user_id === auth()->id())
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-studio-neon">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-studio-danger" onclick="return confirm('Delete forever?')">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
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