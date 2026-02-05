@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-studio-container">
            <h2 class="neon-header mb-4 h3">Create New Post</h2>          
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf 
                    <div class="mb-4">
                        <label class="form-studio-label">Post Title</label>
                        <input type="text" name="title" class="form-control form-studio-input" placeholder="Enter title..." required>
                    </div>

                    <div class="mb-4">
                        <label class="form-studio-label">Content</label>
                        <textarea name="content" class="form-control form-studio-input" rows="6" placeholder="Break down the production, lyrics, and vibe..."></textarea>
                    </div>

                    <div class="mb-5">
                        <label class="form-studio-label">Embed Track (Spotify, SoundCloud, or YouTube)</label>
                        <input type="url" name="media_link" class="form-control" placeholder="https://open.spotify.com/track/..." value="{{ $post->media_link ?? '' }}">
                    </div>
                    <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-studio-neon px-5">Publish Review</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-studio-outline">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection