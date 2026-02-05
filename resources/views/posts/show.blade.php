@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card bg-dark border-secondary shadow-sm mb-4">
        <div class="card-body p-4">
            <h1 class="display-4 fw-bold" style="color: #bb86fc;">{{ $post->title }}</h1>
            <p class="text-muted mb-4">
                By <strong style="color: #bb86fc;">{{ $post->user->name }}</strong>
                on {{ $post->created_at->format('M d, Y') }}</p>
                at {{ $post->created_at->format('H:i') }}
            <hr>
            @if($post->media_link)
            <div class="media-embed mb-4 shadow-sm" style="border-radius: 12px; overflow: hidden; background: #1f1f1f;">
                @php
                $url = $post->media_link;
                @endphp
                    
                @if(str_contains($post->media_link, 'spotify.com'))
                @php
                $spotifyUrl = str_replace('open.spotify.com/', 'open.spotify.com/embed/', $post->media_link);
                $spotifyUrl = str_replace('embed/embed/', 'embed/', $spotifyUrl);
                @endphp
                <iframe 
                style="border-radius:12px"
                src="{{ $spotifyUrl }}"
                width="100%"
                height="352"
                frameBorder="0"
                allowfullscreen=""
                allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                loading="lazy">
                </iframe>
                @elseif(str_contains($url, 'youtube.com') || str_contains($url, 'youtu.be'))
                @php
                parse_str(parse_url($url, PHP_URL_QUERY), $ytVars);
                $videoId = $ytVars['v'] ?? basename(parse_url($url, PHP_URL_PATH));
                @endphp
                <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/{{ $videoId }}" allowfullscreen></iframe>
                </div>
                @elseif(str_contains($url, 'soundcloud.com'))
                <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url={{ urlencode($url) }}&color=%23bb86fc"></iframe>
                @endif
            </div>
            @endif
            <div class="lead text-light mb-4" style="line-height: 1.8;">
                {{ $post->content }}
            </div>
            <a href="{{ route('posts.index') }}" class="btn btn-studio-outline">
                &larr; Back to Session Feed
            </a>
            <hr>
            <hr class="border-secondary my-5">
    <h4 class="fw-bold mb-4" style="color: #bb86fc;">Fan Discussion</h4>

    
    @forelse($post->comments as $comment)
        <div class="card bg-dark border-secondary mb-3 shadow-sm">
            <div class="card-body py-2">
                <p class="mb-0">
                    <strong style="color: #bb86fc;">{{ $comment->user?->name ?? 'Anonymous' }}:</strong> 
                    <span class="text-light">{{ $comment->body }}</span>
                </p>
                <small class="text-muted" style="font-size: 0.75rem;">
                    {{ $comment->created_at->diffForHumans() }}
                </small>
            </div>
        </div>
    @empty
        <p class="text-muted italic">No reviews shared yet. Be the first to drop a thought!</p>
    @endforelse

    <hr class="border-secondary my-5">

    
    @auth
        <div class="card bg-dark border-secondary p-4 shadow">
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label text-muted small">Join the session...</label>
                    <textarea name="body" class="form-control" rows="3" placeholder="What are your thoughts on this drop?" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary px-4">Post Comment</button>
            </form>
        </div>
    @else
        
        <div class="card bg-dark border-secondary text-center py-5 shadow-sm">
            <div class="card-body">
                <div class="mb-3" style="font-size: 2rem;">🎙️</div>
                <h5 class="fw-bold text-white">Want to join the discussion?</h5>
                <p class="text-muted small mb-4">Critics must be logged in to leave feedback.</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm px-4">Sign In</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm px-4">Create Account</a>
                </div>
            </div>
        </div>
    @endauth

</div> 
@endsection