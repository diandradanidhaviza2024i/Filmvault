<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SYSTEM.ADMIN_PANEL // FILMVAULT</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;900&family=Montserrat:wght@800;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(5, 5, 10, 0.85), rgba(15, 0, 5, 0.95)), 
                        url('https://images.unsplash.com/photo-1605806616949-1e87b487cb2a?q=80&w=2070&auto=format&fit=crop') no-repeat center center fixed;
            background-size: cover; color: #e0e0e0; overflow-x: hidden;
        }

        .tech-text { font-family: 'Orbitron', monospace; font-size: 0.65rem; letter-spacing: 2px; text-transform: uppercase; }

        .admin-sidebar {
            background: rgba(5, 2, 2, 0.6); backdrop-filter: blur(15px); border-right: 1px solid rgba(229, 9, 20, 0.3); box-shadow: 5px 0 20px rgba(229, 9, 20, 0.1); min-height: 100vh; width: 260px; position: fixed; top: 0; left: 0; z-index: 100; padding-top: 20px;
        }

        .admin-brand {
            font-family: 'Orbitron', sans-serif; font-weight: 900; color: transparent; -webkit-text-stroke: 1px #e50914; font-size: 1.8rem; letter-spacing: 3px; display: inline-block; text-decoration: none; text-shadow: 0 0 10px rgba(229, 9, 20, 0.3); transition: all 0.3s; display: block; text-align: center;
        }
        .admin-brand:hover { color: #e50914; -webkit-text-stroke: 0px; text-shadow: 0 0 20px rgba(229, 9, 20, 0.8); }

        .sidebar-menu { list-style: none; padding: 0; margin-top: 10px; }
        .sidebar-menu li a { display: flex; align-items: center; padding: 15px 25px; color: #a3a3a3; text-decoration: none; font-weight: 500; font-size: 0.95rem; transition: all 0.3s ease; border-left: 3px solid transparent; letter-spacing: 0.5px; }
        .sidebar-menu li a i { font-size: 1.25rem; margin-right: 15px; color: #777; transition: all 0.3s; }
        .sidebar-menu li a:hover, .sidebar-menu li a.active { color: #ffffff; background: linear-gradient(90deg, rgba(229, 9, 20, 0.15) 0%, transparent 100%); border-left-color: #e50914; box-shadow: inset 5px 0 15px rgba(229, 9, 20, 0.1); }
        .sidebar-menu li a:hover i, .sidebar-menu li a.active i { color: #e50914; text-shadow: 0 0 10px rgba(229, 9, 20, 0.5); }

        .admin-wrapper { margin-left: 260px; padding: 40px; }

        .admin-card {
            background: rgba(10, 5, 5, 0.6); backdrop-filter: blur(12px); border: 1px solid rgba(229, 9, 20, 0.3); border-radius: 12px; box-shadow: 0 0 40px rgba(0, 0, 0, 0.6), inset 0 0 20px rgba(229, 9, 20, 0.05); position: relative; overflow: hidden;
        }
        .admin-card::before { content: ''; position: absolute; top: 0; left: 0; width: 40px; height: 40px; border-top: 2px solid #e50914; border-left: 2px solid #e50914; border-radius: 12px 0 0 0; pointer-events: none; }

        .stat-card {
            background: rgba(20, 5, 5, 0.7); border: 1px solid rgba(229, 9, 20, 0.3); border-radius: 12px; padding: 24px; transition: all 0.3s ease; position: relative; overflow: hidden;
        }
        .stat-card:hover { transform: translateY(-5px); border-color: #e50914; box-shadow: 0 10px 25px rgba(229, 9, 20, 0.3), inset 0 0 15px rgba(229, 9, 20, 0.15); }
        .stat-number { font-family: 'Orbitron', sans-serif; font-weight: 700; font-size: 2.2rem; color: #ffffff; text-shadow: 0 0 15px rgba(229, 9, 20, 0.8); }
        .stat-icon { font-size: 2.5rem; color: rgba(229, 9, 20, 0.8); filter: drop-shadow(0 0 10px rgba(229, 9, 20, 0.5)); }

        .table-admin { color: #d1d1d1; margin-bottom: 0; }
        .table-admin th { background: rgba(229, 9, 20, 0.15) !important; border-bottom: 2px solid #e50914 !important; color: #ffffff !important; font-family: 'Orbitron', sans-serif; letter-spacing: 1px; font-weight: 600; font-size: 0.85rem; text-transform: uppercase; padding: 15px; }
        .table-admin td { background: transparent !important; border-bottom: 1px solid rgba(229, 9, 20, 0.2) !important; vertical-align: middle; padding: 15px; transition: background 0.3s; }
        .table-admin tbody tr:hover td { background: rgba(229, 9, 20, 0.08) !important; }

        .pagination-custom .pagination { margin-bottom: 0; gap: 5px; }
        .pagination-custom .page-item .page-link { background-color: rgba(20, 5, 5, 0.6); border-color: rgba(229, 9, 20, 0.3); color: #e0e0e0; border-radius: 6px; padding: 8px 16px; font-weight: 600; transition: all 0.3s; }
        .pagination-custom .page-item.active .page-link { background-color: #e50914; border-color: #ff3333; color: #fff; box-shadow: 0 0 15px rgba(229, 9, 20, 0.5); }
        .pagination-custom .page-item.disabled .page-link { background-color: rgba(10, 5, 5, 0.4); color: #666; border-color: rgba(255, 255, 255, 0.1); }
        .pagination-custom .page-item .page-link:hover:not(.disabled) { background-color: rgba(229, 9, 20, 0.8); color: #fff; border-color: #ff3333; }

        .form-label { color: #ffffff !important; font-weight: 600; letter-spacing: 1px; margin-bottom: 0.6rem; display: inline-block; text-shadow: 0 0 5px rgba(255,255,255,0.2); }
        .admin-input { background: rgba(255, 255, 255, 0.08) !important; border: 1px solid rgba(255, 255, 255, 0.25) !important; color: #ffffff !important; border-radius: 8px; padding: 0.85rem 1.2rem; font-size: 1rem; transition: all 0.3s ease; box-shadow: inset 0 2px 5px rgba(0,0,0,0.5); }
        .admin-input:focus { border-color: #ff3333 !important; background: rgba(229, 9, 20, 0.08) !important; box-shadow: 0 0 15px rgba(229, 9, 20, 0.4), inset 0 2px 5px rgba(0,0,0,0.5) !important; }
        .admin-input::placeholder { color: #888; font-weight: 300; }

        /* --- PERBAIKAN: CSS KHUSUS DROPDOWN/SELECT FUTURISTIK --- */
        select.admin-input {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            /* Panah dropdown kustom warna neon merah */
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23ff3333' class='bi bi-caret-down-fill' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E") !important;
            background-repeat: no-repeat !important;
            background-position: right 1.2rem center !important;
            background-size: 16px 12px !important;
            cursor: pointer;
        }

        select.admin-input option {
            background-color: #0d0404 !important; /* Latar belakang hitam kemerahan gelap */
            color: #ff3333 !important; /* Teks merah neon */
            font-family: 'Orbitron', sans-serif !important; /* Font futuristik */
            font-weight: 600;
            letter-spacing: 1px;
            padding: 15px !important;
        }

        select.admin-input option:checked {
            background-color: #e50914 !important; /* Warna saat dipilih */
            color: #ffffff !important;
        }
        /* -------------------------------------------------------- */

        .btn-glow-danger { background: rgba(229, 9, 20, 0.9); color: #fff; border: 1px solid #ff3333; box-shadow: 0 0 15px rgba(229, 9, 20, 0.4); transition: all 0.3s; text-transform: uppercase; }
        .btn-glow-danger:hover { background: #ff0f1a; color: #fff; box-shadow: 0 0 25px rgba(229, 9, 20, 0.8); transform: translateY(-2px); }

        .btn-icon { width: 36px; height: 36px; padding: 0; display: inline-flex; align-items: center; justify-content: center; border-radius: 8px; transition: all 0.3s ease; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); color: #e0e0e0; }
        .edit-btn:hover { background: rgba(255, 193, 7, 0.2); border-color: #ffc107; color: #ffc107; box-shadow: 0 0 15px rgba(255, 193, 7, 0.5); transform: translateY(-2px); }
        .delete-btn:hover { background: rgba(229, 9, 20, 0.2); border-color: #ff3333; color: #ff3333; box-shadow: 0 0 15px rgba(229, 9, 20, 0.5); transform: translateY(-2px); }

        .modal-content.glass-modal { background: rgba(10, 5, 5, 0.9); backdrop-filter: blur(25px); border: 1px solid rgba(229, 9, 20, 0.5); box-shadow: 0 0 50px rgba(0, 0, 0, 0.9), inset 0 0 20px rgba(229, 9, 20, 0.15); border-radius: 12px; }
        .modal-header { border-bottom: 1px solid rgba(229, 9, 20, 0.4); }
        .modal-footer { border-top: 1px solid rgba(229, 9, 20, 0.4); }
    </style>
</head>
<body>

    <aside class="admin-sidebar">
        <div class="text-center mt-3 mb-5">
            <a href="{{ route('home') }}" class="admin-brand mb-1">FILMVAULT</a>
            <span class="badge bg-transparent border border-danger text-danger tech-text px-3 py-2 mt-2" style="font-size: 0.65rem; box-shadow: 0 0 10px rgba(229,9,20,0.2);">WELCOME ADMIN</span>
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-cpu"></i> System Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.films.index') }}" class="{{ request()->routeIs('admin.films.*') ? 'active' : '' }}">
                    <i class="bi bi-film"></i> Kelola Data Film
                </a>
            </li>
            <li>
                <a href="{{ route('admin.genres.index') }}" class="{{ request()->routeIs('admin.genres.*') ? 'active' : '' }}">
                    <i class="bi bi-diagram-3"></i> Klasifikasi Genre
                </a>
            </li>
            <li>
                <hr style="border-color: rgba(255,255,255,0.15); margin: 15px 25px;">
            </li>
            <li>
                <a href="{{ route('home') }}">
                    <i class="bi bi-box-arrow-up-right"></i> Kembali ke Frontend
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}" id="logout-form" class="d-none">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-danger">
                    <i class="bi bi-power"></i> Terminate Session
                </a>
            </li>
        </ul>
    </aside>

    <main class="admin-wrapper">
        {{ $slot }}
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>