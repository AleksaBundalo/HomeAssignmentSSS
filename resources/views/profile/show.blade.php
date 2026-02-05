@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="form-studio-container text-center">
                <div class="mb-3">
                    <i class="fas fa-user-circle fa-5x text-purple shadow-sm"></i>
                </div>
                <h2 class="neon-header h4">{{ $user->name }}</h2>
                <p class="text-muted small">Member since {{ $user->created_at->format('M Y') }}</p>
                @if(auth()->id() === $user->id)
                <form action="{{ route('profile.updateBio') }}" method="POST" class="mt-4">
                    @csrf
                    <label class="form-studio-label">Your Bio / Equipment List</label>
                    <textarea name="bio" class="form-control form-studio-input mb-3" rows="4">{{ $user->bio }}</textarea>
                    <button class="btn btn-studio-neon w-100">Update Profile</button>
                </form>
                @else
                <div class="form-studio-container">
                    <label class="form-studio-label">Critic Bio</label>
                    <p class="text-light">{{ $user->bio ?? 'This critic hasn\'t recorded a bio yet.' }}</p>
                    </div>
                    @endif
            </div>
        </div>

        <div class="col-md-8">
    <h3 class="neon-header h4 mb-4">Your Recorded Sessions</h3>
    @foreach($posts as $post)
        <div class="card bg-dark border-secondary mb-3 studio-card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0" style="color: #bb86fc;">{{ $post->title }}</h5>
                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                </div>
                
                <div class="d-flex gap-2">
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-studio-neon btn-sm">
                        View
                    </a>
                    @if(auth()->id() === $post->user_id)
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-studio-neon">
                        Edit
                    </a>

                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Delete this post? (this cannot be outdone)')">
                        @csrf

                        @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-studio-danger">
                            Delete
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
    </div>
</div>
@endsection