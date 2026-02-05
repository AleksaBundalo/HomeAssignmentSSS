@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h1 class="display-5">{{ $post->title }}</h1>
            <p class="text-muted">Posted on {{ $post->created_at->format('M d, Y') }}</p>
            <hr>
            <div class="lead">
                {{ $post->content }}
            </div>
            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary mt-3">Back to List</a>
        </div>
    </div>
</div>
@endsection