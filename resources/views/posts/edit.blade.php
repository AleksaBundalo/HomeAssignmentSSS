@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-lg p-4">
            <h2 class="fw-bold mb-4" style="color: #bb86fc;">Edit Review: {{ $post->title }}</h2>
            
            @if ($errors->any())
            <div class="alert alert-danger bg-dark text-danger border-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label text-muted">Review Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label text-muted">The Analysis</label>
                    <textarea name="content" class="form-control" rows="10" required>{{ $post->content }}</textarea>
                </div>
                
                <div class="mb-3 p-3 border border-secondary rounded" style="background: #1a1a1a;">
                    <label class="form-label fw-bold" style="color: #bb86fc;">🎵 Media Embed URL</label>
                    <input type="text" name="media_link" class="form-control"
                    placeholder="Paste Spotify, YouTube, or SoundCloud link here"
                    value="{{ old('media_link', $post->media_link) }}">
                    <small class="text-muted italic">Must include http:// or https://</small>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-light">Cancel</a>
                    <button type="submit" class="btn btn-primary px-5">Update Review</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection