<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Blog System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
    background-color: #121212;
    background-image: radial-gradient(rgba(187, 134, 252, 0.1) 1px, transparent 1px);
    background-size: 30px 30px;
    background-attachment: fixed;
}
.studio-card {
    background: rgba(25, 25, 25, 0.85) !important;
    backdrop-filter: blur(8px);
    border: 1px solid rgba(187, 134, 252, 0.1) !important;
    transition: all 0.4s ease;
}
.header-container {
    position: relative;
    padding: 2rem 0;
    /* This creates the 'smoke' or glow effect behind the text */
    background: radial-gradient(circle at center, rgba(187, 134, 252, 0.15) 0%, transparent 70%);
}

.neon-header {
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #fff;
    /* Multiple layers of shadow create a realistic neon glow */
    text-shadow: 
        0 0 10px rgba(187, 134, 252, 0.8),
        0 0 20px rgba(187, 134, 252, 0.4),
        0 0 30px rgba(187, 134, 252, 0.2);
}
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

/* Custom Studio Form Styling */
.form-studio-container {
    background: rgba(25, 25, 25, 0.9) !important;
    backdrop-filter: blur(15px);
    border: 1px solid rgba(187, 134, 252, 0.2) !important;
    border-radius: 15px;
    padding: 2.5rem;
    box-shadow: 0 15px 35px rgba(0,0,0,0.5);
}

.form-studio-label {
    color: #bb86fc;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 0.8rem;
    letter-spacing: 1px;
    margin-bottom: 0.5rem;
}

.form-studio-input {
    background-color: rgba(18, 18, 18, 0.5) !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    color: #fff !important;
    padding: 0.8rem !important;
    transition: all 0.3s ease;
}

.form-studio-input:focus {
    border-color: #bb86fc !important;
    box-shadow: 0 0 10px rgba(187, 134, 252, 0.2) !important;
}

/* Glassmorphism Navbar */
.navbar-studio {
    background: rgba(18, 18, 18, 0.8) !important;
    backdrop-filter: blur(15px);
    border-bottom: 1px solid rgba(187, 134, 252, 0.2);
    padding: 1rem 0;
    transition: all 0.3s ease;
}

/* Vinylverse Logo Glow */
.navbar-brand-studio {
    font-weight: 800;
    letter-spacing: 2px;
    color: #fff !important;
    text-shadow: 0 0 10px rgba(187, 134, 252, 0.5);
}

/* Nav Link Hover States */
.nav-link-studio {
    color: rgba(255, 255, 255, 0.7) !important;
    font-weight: 500;
    position: relative;
    transition: color 0.3s ease;
}

.nav-link-studio:hover {
    color: #bb86fc !important;
}

/* Active Underline Effect */
.nav-link-studio::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -5px;
    left: 0;
    background-color: #bb86fc;
    transition: width 0.3s ease;
}

.nav-link-studio:hover::after {
    width: 100%;
}

.vinyl-texture {
    background-image: radial-gradient(circle at center, #1a1a1a 1px, transparent 1px);
    background-size: 20px 20px;
    opacity: 0.3;
}

.studio-card {
    background: rgba(31, 31, 31, 0.8) !important;
    backdrop-filter: blur(10px);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.studio-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0 20px rgba(187, 134, 252, 0.25);
    border-color: #bb86fc !important;
}

.featured-border {
    border-left: 5px solid #bb86fc !important;
    background: linear-gradient(45deg, #1f1f1f, #121212) !important;
}

.badge.rounded-pill {
    color: #bb86fc;
    font-weight: 400;
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

.btn-sm {
    display: inline-flex;
    align-items: center;
    white-space: nowrap; /* Prevents text from disappearing on small screens */
    padding: 0.4rem 0.8rem !important;
}

.btn-outline-info {
    border-color: #0dcaf0 !important;
    color: #0dcaf0 !important;
}

.btn-outline-danger {
    border-color: #dc3545 !important;
    color: #dc3545 !important;
}


</style>
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-studio sticky-top">
    <div class="container">
        <a class="navbar-brand navbar-brand-studio d-flex align-items-center" href="{{ url('/') }}">
            <i class="fas fa-compact-disc me-2 text-purple"></i> Vinylverse
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link nav-link-studio px-3" href="{{ route('posts.index') }}">
                        <i class="fas fa-compass me-1"></i> Discover
                    </a>
                </li>
                
                @auth
                
                    <li class="nav-item">
                        <span class="nav-link text-light opacity-75 small">Hello, <span class="text-purple">{{ auth()->user()->name }}</span></span>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a href="{{ route('posts.create') }}" class="btn btn-studio-neon btn-sm px-4">
                            Write Review
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link nav-link-studio px-3" href="{{ route('profile.myProfile') }}">
                            <i class="fas fa-id-badge me-1"></i> My Profile
                        </a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link-studio text-danger border-0">Logout</button>
                        </form>
                    </li>
                    @else
                <li class="nav-item">
                    <a class="nav-link nav-link-studio px-3" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-studio-outline btn-sm px-4" href="{{ route('register') }}">
                        Join the Vinylverse
                    </a>
                </li>
                @endauth
            </ul>
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