@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning">Edit Post: {{ $post->title }}</div>
    <div class="card-body">
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT') <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="5">{{ $post->content }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection