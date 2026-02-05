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
</style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('posts.index') }}">BlogSys</a>
        <div class="navbar-nav">
            <a class="nav-link" href="{{ route('posts.index') }}">Home</a>
            
            @guest
                <a class="nav-link" href="{{ route('register') }}">Register</a>
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            @else
                <a class="nav-link" href="{{ route('posts.create') }}">Create Post</a>
                <span class="navbar-text ms-3 text-info">
                    Hello, {{ Auth::user()->name }}
                </span>
            @endguest
            @auth
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-link nav-link">Logout</button>
            </form>
            @endauth
        </div>
    </div>
</nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>