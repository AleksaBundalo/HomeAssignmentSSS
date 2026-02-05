@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">Create New Post</div>
            <div class="card-body">
                
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
                    @csrf <div class="mb-3">
                        <label class="form-label">Post Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea name="content" class="form-control" rows="5">{{ old('content') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted">Embed Track (Spotify, SoundCloud, or YouTube)</label>
                        <input type="url" name="media_link" class="form-control" placeholder="https://open.spotify.com/track/..." value="{{ $post->media_link ?? '' }}">
                    </div>

                    <button type="submit" class="btn btn-success">Save Post</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection