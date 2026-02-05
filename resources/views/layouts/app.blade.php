<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Blog System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body { background-color: #121212; color: #e0e0e0; font-family: 'Inter', sans-serif; }
    .navbar { background-color: #1f1f1f !important; border-bottom: 2px solid #bb86fc; }
    .card { background-color: #1f1f1f; border: none; border-radius: 12px; color: white; }
    .btn-primary { background-color: #bb86fc; border: none; color: #121212; font-weight: bold; }
    .btn-primary:hover { background-color: #9965f4; color: white; }
    .text-muted { color: #b3b3b3 !important; }
    .alert-info { background-color: #2c2c2c; border-color: #bb86fc; color: #bb86fc; }
    input, textarea { background-color: #2c2c2c !important; color: white !important; border: 1px solid #444 !important; }
    
::placeholder {
    color: #888 !important; 
    opacity: 1; 
}

    .btn-studio-neon { 
    background-color: #bb86fc; 
    border: none; 
    color: #121212; 
    font-weight: 600; 
    border-radius: 6px; 
}

.btn-studio-neon:hover { 
    background-color: #9965f4; 
    color: white; 
}

.btn-studio-outline { 
    border: 1px solid #bb86fc; 
    color: #bb86fc; 
    background: transparent;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-studio-outline:hover { 
    background: #bb86fc; 
    color: #121212; 
    box-shadow: 0 0 15px rgba(187, 134, 252, 0.4);
}

.btn-studio-danger {
    background-color: #cf6679;
    border: none;
    color: #121212;
    font-weight: 600;
}

.btn-studio-danger:hover {
    background-color: #b00020;
    color: white;
}
</style>
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark mb-4 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('posts.index') }}">
        <span style="color: #bb86fc;">💿</span> Vinylverse
        <div class="navbar-nav ms-auto align-items-center">
                <a class="nav-link px-3" href="{{ route('posts.index') }}">Discover</a>
                @guest
                    <a class="nav-link px-3" href="{{ route('login') }}">Sign In</a>
                    <a class="btn btn-primary btn-sm ms-2" href="{{ route('register') }}">Join the Lab</a>
                @else
                    <a class="nav-link text-info px-3" href="#">Hello, {{ Auth::user()->name }}</a>
                    <a class="btn btn-outline-light btn-sm mx-2" href="{{ route('posts.create') }}">Write Review</a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link p-0" style="font-size: 0.9rem;">Logout</button>
                    </form>
                @endguest
        </div>
    </div>
</nav>

    <main class="container">
        @yield('content')
    </main>

    <footer class="mt-auto py-3 text-center text-muted border-top border-secondary" style="background: #1f1f1f;">
        <small>&copy; 2026 Vinylverse</small>
    </footer>
</body>
</html>