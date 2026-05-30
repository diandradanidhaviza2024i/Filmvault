<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FilmVault') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Tambahan font Orbitron untuk kesan Futuristik di Frontend -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;900&family=Montserrat:wght@800;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #050202; color: #ffffff; min-height: 100vh; display: flex; flex-direction: column; }
        main { flex: 1; }

        /* Navbar Futuristik */
        .navbar-custom { background: rgba(5, 2, 2, 0.85); backdrop-filter: blur(15px); border-bottom: 1px solid rgba(229, 9, 20, 0.3); box-shadow: 0 4px 30px rgba(229, 9, 20, 0.1); }
        .navbar-brand { font-family: 'Orbitron', sans-serif; font-weight: 900; color: transparent; -webkit-text-stroke: 1px #e50914; letter-spacing: 2px; font-size: 1.6rem; text-shadow: 0 0 10px rgba(229, 9, 20, 0.3); transition: all 0.3s; }
        .navbar-brand:hover { color: #e50914; -webkit-text-stroke: 0px; text-shadow: 0 0 20px rgba(229, 9, 20, 0.8); }
        .nav-link { color: #b3b3b3 !important; font-weight: 500; transition: all 0.3s ease; letter-spacing: 0.5px; }
        .nav-link:hover, .nav-link.active { color: #fff !important; text-shadow: 0 0 10px rgba(255, 255, 255, 0.5); }

        /* Search Bar Futuristik */
        .search-input { background-color: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); color: #fff; border-radius: 20px 0 0 20px; transition: all 0.3s; }
        .search-input:focus { background-color: rgba(229, 9, 20, 0.05); border-color: #e50914; color: #fff; box-shadow: inset 0 0 10px rgba(229, 9, 20, 0.2); }
        .search-btn { background-color: rgba(229, 9, 20, 0.8); border: 1px solid #ff0f1a; color: white; border-radius: 0 20px 20px 0; transition: all 0.3s; }
        .search-btn:hover { background-color: #e50914; box-shadow: 0 0 15px rgba(229, 9, 20, 0.5); }

        /* Card Film Futuristik */
        .film-card { background-color: rgba(15, 5, 5, 0.6); border: 1px solid rgba(255, 255, 255, 0.05); border-radius: 12px; overflow: hidden; transition: all 0.3s ease; height: 100%; position: relative; }
        .film-card:hover { transform: translateY(-10px); border-color: rgba(229, 9, 20, 0.5); box-shadow: 0 15px 30px rgba(229, 9, 20, 0.3); }
        .film-poster { width: 100%; height: 350px; object-fit: cover; border-bottom: 2px solid #e50914; transition: all 0.5s; }
        .film-card:hover .film-poster { filter: brightness(1.1) contrast(1.1); }
        .film-title { font-size: 1.05rem; font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; color: #fff; text-decoration: none; letter-spacing: 0.5px; transition: 0.3s; }
        .film-title:hover { color: #e50914; text-shadow: 0 0 8px rgba(229, 9, 20, 0.5); }

        /* Pagination User */
        .pagination-custom .pagination { display: flex; padding-left: 0; list-style: none; justify-content: center; gap: 8px; flex-wrap: wrap; margin-bottom: 0; }
        .pagination-custom .page-item .page-link { background-color: rgba(20, 5, 5, 0.8); border: 1px solid rgba(229, 9, 20, 0.4); color: #e0e0e0; border-radius: 8px; padding: 8px 16px; font-weight: 600; text-decoration: none; transition: all 0.3s; }
        .pagination-custom .page-item.active .page-link { background-color: #e50914; border-color: #ff3333; color: #fff; box-shadow: 0 0 15px rgba(229, 9, 20, 0.6); }
        .pagination-custom .page-item.disabled .page-link { background-color: rgba(10, 5, 5, 0.5); color: #555; pointer-events: none; border-color: rgba(255, 255, 255, 0.1); }
        .pagination-custom .page-item .page-link:hover:not(.disabled) { background-color: rgba(229, 9, 20, 0.9); color: #fff; border-color: #ff3333; }
        
        .pagination-custom nav p.text-sm, .pagination-custom .text-muted { display: none !important; }
        .pagination-custom .hidden.sm\:flex-1 { display: flex !important; flex-direction: column; align-items: center; gap: 15px; }

        .footer-custom { background-color: #030101; border-top: 1px solid rgba(229, 9, 20, 0.2); padding: 25px 0; margin-top: auto; }
        .tech-text { font-family: 'Orbitron', monospace; font-size: 0.7rem; letter-spacing: 2px; text-transform: uppercase; color: #888; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-custom sticky-top py-3">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">FILMVAULT</a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list text-white fs-2"></i>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-md-4">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">HOME</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('favorites.index') ? 'active' : '' }}" href="{{ route('favorites.index') }}">MY FAVORITES</a>
                    </li>
                    @endauth
                </ul>

                <form class="d-flex me-3" action="{{ route('home') }}" method="GET">
                    <input class="form-control search-input" type="search" name="search" placeholder="Search movies..." value="{{ request('search') }}">
                    <button class="btn search-btn" type="submit"><i class="bi bi-search"></i></button>
                </form>

                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">SIGN IN</a></li>
                        <li class="nav-item ms-md-2"><a class="btn btn-sm mt-1 fw-bold rounded-pill px-4" style="background-color: #e50914; color:white; border: 1px solid #ff3333; box-shadow: 0 0 10px rgba(229,9,20,0.4);" href="{{ route('register') }}">SIGN UP</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-bounding-box me-1 text-danger"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" style="background-color: rgba(15,5,5,0.95); backdrop-filter: blur(10px); border: 1px solid rgba(229,9,20,0.3);">
                                @if(Auth::user()->role === 'admin')
                                    <li><a class="dropdown-item tech-text text-white py-2" href="{{ route('admin.dashboard') }}"><i class="bi bi-cpu me-2"></i>ADMIN DASHBOARD</a></li>
                                    <li><hr class="dropdown-divider border-secondary"></li>
                                @endif
                                <li><a class="dropdown-item py-2" href="{{ route('profile.edit') }}"><i class="bi bi-gear me-2"></i>Profile Settings</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger py-2"><i class="bi bi-power me-2"></i>Terminate Session</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer class="footer-custom text-center">
        <div class="container">
            <p class="mb-1 tech-text">&copy; {{ date('Y') }} FILMVAULT. SYSTEM ONLINE.</p>
            <small class="text-secondary" style="font-size: 0.7rem;">SECURE ENTERTAINMENT NETWORK</small>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>