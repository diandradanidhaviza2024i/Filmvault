<x-app-layout>
    <!-- Hero Banner Cyberpunk / Futuristic -->
    @if(!request('search'))
    <div class="position-relative d-flex justify-content-center align-items-center text-center py-5 mb-5" style="min-height: 65vh; border-bottom: 2px solid rgba(229,9,20,0.3); box-shadow: 0 10px 30px rgba(0,0,0,0.8);">
        <!-- PERBAIKAN BACKGROUND: Menggunakan gambar kota neon futuristik -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;
                    background: linear-gradient(rgba(5,2,2,0.8), rgba(15,0,5,0.7)), 
                    url('https://images.unsplash.com/photo-1555680202-c86f0e12f086?q=80&w=2070&auto=format&fit=crop') no-repeat center center; 
                    background-size: cover; z-index: 0; filter: contrast(1.1) saturate(1.2);">
        </div>
        
        <div class="px-3 py-5" style="max-width: 850px; z-index: 1;">
            <h1 class="display-3 text-white mb-3" style="font-family: 'Orbitron', sans-serif; font-weight: 900; letter-spacing: 2px; text-shadow: 0 0 20px rgba(229,9,20,0.8);">
                UNLIMITED <span style="color: transparent; -webkit-text-stroke: 1px #e50914;">MOVIES</span>, <br> 
                <span style="color: #e50914; text-shadow: 0 0 30px rgba(229,9,20,0.6);">ENDLESS ENTERTAINMENT.</span>
            </h1>
            <p class="lead text-light mb-5 px-md-4" style="font-size: 1.1rem; letter-spacing: 1px;">Initialize your digital library. Discover futuristic sci-fi, mind-bending thrillers, and save them to your personal vault.</p>
            <a href="#katalog" class="btn btn-lg text-white" style="background-color: rgba(229,9,20,0.8); font-family: 'Orbitron', sans-serif; font-weight: 700; border-radius: 8px; padding: 15px 40px; border: 1px solid #ff3333; box-shadow: 0 0 20px rgba(229,9,20,0.5); letter-spacing: 2px;">ACCESS CATALOG</a>
        </div>
    </div>
    @endif

    <div class="container py-4" id="katalog">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h3 class="fw-bold border-start border-4 ps-3 text-white" style="border-color: #e50914 !important; font-family: 'Orbitron', sans-serif; letter-spacing: 1px;">
                {{ request('search') ? 'SEARCH_RESULTS_ [' . request('search') . ']' : 'LATEST_UPLOADS_' }}
            </h3>
            
            <div class="dropdown">
                <button class="btn dropdown-toggle text-white" type="button" data-bs-toggle="dropdown" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.2);">
                    <i class="bi bi-funnel me-1"></i> Filter Genre
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" style="background-color: rgba(15,5,5,0.95); border: 1px solid rgba(229,9,20,0.3);">
                    <li><a class="dropdown-item" href="{{ route('home') }}">ALL_GENRES</a></li>
                    <li><hr class="dropdown-divider border-secondary"></li>
                    @foreach($genres as $g)
                        <li><a class="dropdown-item" href="{{ route('genre.show', $g->slug) }}">{{ strtoupper($g->name) }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        @if($films->count() > 0)
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
                @foreach($films as $film)
                    <div class="col">
                        <div class="card film-card shadow-lg">
                            <a href="{{ route('film.show', $film->slug) }}">
                                <img src="{{ $film->poster }}" class="film-poster" alt="{{ $film->title }}">
                            </a>
                            <div class="card-body p-3">
                                <a href="{{ route('film.show', $film->slug) }}" class="film-title d-block mb-2">{{ $film->title }}</a>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <span class="badge" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); font-family: 'Orbitron', sans-serif; letter-spacing: 1px;">{{ $film->release_year }}</span>
                                    <span class="fw-bold" style="color: #ffc107; text-shadow: 0 0 8px rgba(255,193,7,0.5); font-size: 0.9rem;">
                                        <i class="bi bi-star-fill"></i> {{ $film->rating }}
                                    </span>
                                </div>
                                <div class="mt-3 tech-text text-danger" style="font-size: 0.65rem;">
                                    <i class="bi bi-tag-fill me-1"></i>{{ $film->genre->name }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-5 pt-4 pagination-custom" data-bs-theme="dark">
                {{ $films->links('pagination::bootstrap-5') }}
            </div>
        @else
            <div class="text-center py-5 my-5">
                <i class="bi bi-database-exclamation text-danger" style="font-size: 5rem; text-shadow: 0 0 20px rgba(229,9,20,0.5);"></i>
                <h4 class="text-secondary mt-4" style="font-family: 'Orbitron', sans-serif; letter-spacing: 2px;">NO_DATA_FOUND</h4>
                <p class="tech-text">System could not locate matching records in the database.</p>
            </div>
        @endif
    </div>
</x-app-layout>