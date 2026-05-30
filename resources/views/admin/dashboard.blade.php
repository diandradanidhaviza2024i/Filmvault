<x-admin-layout>
    <style>
        /* CSS Khusus agar kotak Users dan Favorites menyala sesuai warnanya saat di-hover */
        .stat-card-users { 
            border-color: rgba(13, 202, 240, 0.5) !important; 
            box-shadow: inset 0 0 15px rgba(13, 202, 240, 0.1); 
        }
        .stat-card-users:hover { 
            border-color: #0dcaf0 !important; 
            box-shadow: 0 10px 25px rgba(13, 202, 240, 0.4), inset 0 0 20px rgba(13, 202, 240, 0.3) !important; 
            transform: translateY(-5px); 
        }

        .stat-card-favs { 
            border-color: rgba(255, 193, 7, 0.5) !important; 
            box-shadow: inset 0 0 15px rgba(255, 193, 7, 0.1); 
        }
        .stat-card-favs:hover { 
            border-color: #ffc107 !important; 
            box-shadow: 0 10px 25px rgba(255, 193, 7, 0.4), inset 0 0 20px rgba(255, 193, 7, 0.3) !important; 
            transform: translateY(-5px); 
        }
    </style>

    <div class="container-fluid py-2">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-5 mt-2">
            <div>
                <h2 class="fw-bold mb-0 text-white" style="font-family: 'Orbitron', sans-serif;">DASHBOARD <span class="text-danger">OVERVIEW</span></h2>
            </div>
        </div>

        <!-- Stat Cards Row -->
        <div class="row g-4 mb-5">
            <!-- Card 1: Total Films -->
            <div class="col-md-3">
                <a href="{{ route('admin.films.index') }}" class="text-decoration-none">
                    <div class="stat-card d-flex align-items-center justify-content-between h-100">
                        <div>
                            <span class="tech-text text-danger">TOTAL FILMS_</span>
                            <div class="stat-number mt-1">{{ $totalFilms }}</div>
                        </div>
                        <div class="stat-icon"><i class="bi bi-film"></i></div>
                    </div>
                </a>
            </div>
            
            <!-- Card 2: Total Genres -->
            <div class="col-md-3">
                <a href="{{ route('admin.genres.index') }}" class="text-decoration-none">
                    <div class="stat-card d-flex align-items-center justify-content-between h-100">
                        <div>
                            <span class="tech-text text-danger">CLASSIFICATIONS_</span>
                            <div class="stat-number mt-1">{{ $totalGenres ?? 8 }}</div>
                        </div>
                        <div class="stat-icon"><i class="bi bi-diagram-3"></i></div>
                    </div>
                </a>
            </div>
            
            <!-- Card 3: Registered Users (Efek Hover Biru) -->
            <div class="col-md-3">
                <a href="{{ route('admin.users') }}" class="text-decoration-none">
                    <div class="stat-card stat-card-users d-flex align-items-center justify-content-between h-100">
                        <div>
                            <span class="tech-text text-info">REGISTERED USERS_</span>
                            <div class="stat-number text-white mt-1">{{ $totalUsers }}</div>
                            <small class="tech-text text-info" style="font-size: 0.55rem;">VIEW ANALYTICS <i class="bi bi-arrow-right"></i></small>
                        </div>
                        <div class="stat-icon text-info"><i class="bi bi-people"></i></div>
                    </div>
                </a>
            </div>
            
            <!-- Card 4: Favorite Logs (Efek Hover Kuning) -->
            <div class="col-md-3">
                <a href="{{ route('admin.favoritesLog') }}" class="text-decoration-none">
                    <div class="stat-card stat-card-favs d-flex align-items-center justify-content-between h-100">
                        <div>
                            <span class="tech-text text-warning">FAVORITE LOGS_</span>
                            <div class="stat-number text-white mt-1">{{ $totalFavorites }}</div>
                            <small class="tech-text text-warning" style="font-size: 0.55rem;">VIEW RANKINGS <i class="bi bi-arrow-right"></i></small>
                        </div>
                        <div class="stat-icon text-warning"><i class="bi bi-heart-pulse"></i></div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Latest Movies Added Table -->
        <div class="row">
            <div class="col-12">
                <div class="card admin-card p-4 p-md-5 mt-2 shadow-lg">
                    <h5 class="fw-bold text-white mb-5" style="font-family: 'Orbitron', sans-serif; letter-spacing: 1px;">
                        <i class="bi bi-activity me-2 text-danger"></i> RECENT UPLOADS LOG
                    </h5>
                    <div class="table-responsive pb-3">
                        <table class="table table-admin align-middle text-nowrap mt-2">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 80px;">Poster</th>
                                    <th>Judul Film</th>
                                    <th>Genre</th>
                                    <th>Tahun</th>
                                    <th>Rating</th>
                                    <th>Director</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestFilms as $film)
                                    <tr>
                                        <td class="text-center">
                                            <div style="width: 50px; height: 70px; margin: 0 auto; border-radius: 6px; overflow: hidden; border: 1px solid rgba(229,9,20,0.4); box-shadow: 0 0 10px rgba(229,9,20,0.2);">
                                                <img src="{{ $film->poster }}" style="width: 100%; height: 100%; object-fit: cover;" alt="">
                                            </div>
                                        </td>
                                        <td class="fw-bold text-white fs-6">{{ $film->title }}</td>
                                        <td><span class="badge bg-transparent border border-danger text-danger tech-text px-2 py-1">{{ $film->genre->name }}</span></td>
                                        <td class="tech-text text-light" style="font-size: 0.85rem;">{{ $film->release_year }}</td>
                                        <td><span class="text-warning fw-bold"><i class="bi bi-star-fill me-1"></i> {{ $film->rating }}</span></td>
                                        <td class="text-light">{{ $film->director }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5 text-secondary tech-text">NO DATA FOUND IN DATABASE.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-admin-layout>