<x-app-layout>
    <!-- Hero Banner Cyberpunk / Futuristic -->
    @if(!request('search') && !request('genre') && !request('year') && !request('country') && request('page', 1) == 1)
    <div class="position-relative d-flex justify-content-center align-items-center text-center py-5 mb-5" style="min-height: 65vh; border-bottom: 2px solid rgba(229,9,20,0.3); box-shadow: 0 10px 30px rgba(0,0,0,0.8);">
        <!-- PERBAIKAN BACKGROUND: Menggunakan gambar kota neon futuristik -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;
                    background: linear-gradient(rgba(5,2,2,0.8), rgba(15,0,5,0.7)), 
                    url('https://images.unsplash.com/photo-1555680202-c86f0e12f086?q=80&w=2070&auto=format&fit=crop') no-repeat center center; 
                    background-size: cover; z-index: 0; filter: contrast(1.1) saturate(1.2);">
        </div>
        
        <div class="px-3 py-5 position-relative" style="max-width: 850px; z-index: 1;">
            <h1 class="display-3 text-white mb-3" style="font-family: 'Orbitron', sans-serif; font-weight: 900; letter-spacing: 2px; text-shadow: 0 0 20px rgba(229,9,20,0.8);">
                UNLIMITED <span style="color: transparent; -webkit-text-stroke: 1px #e50914;">MOVIES</span>, <br> 
                <span style="color: #e50914; text-shadow: 0 0 30px rgba(229,9,20,0.6);">ENDLESS ENTERTAINMENT.</span>
            </h1>
            <p class="lead text-light mb-5 px-md-4" style="font-size: 1.1rem; letter-spacing: 1px;">Initialize your digital library. Discover futuristic sci-fi, mind-bending thrillers, and save them to your personal vault.</p>
            <a href="#katalog" class="btn btn-lg text-white text-decoration-none" style="background-color: rgba(229,9,20,0.8); font-family: 'Orbitron', sans-serif; font-weight: 700; border-radius: 8px; padding: 15px 40px; border: 1px solid #ff3333; box-shadow: 0 0 20px rgba(229,9,20,0.5); letter-spacing: 2px; transition: all 0.3s;">ACCESS CATALOG</a>
        </div>
        
        <!-- Efek Garis Neon di bawah banner -->
        <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 2px; background: linear-gradient(90deg, transparent, #e50914, transparent); box-shadow: 0 -5px 15px rgba(229,9,20,0.8);"></div>
    </div>
    @endif

    <div class="container py-4" id="katalog">
        <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
            <h3 class="fw-bold border-start border-4 ps-3 text-white" style="border-color: #e50914 !important; font-family: 'Orbitron', sans-serif; letter-spacing: 1px;">
                {{ request('search') ? 'SEARCH_RESULTS_ [' . request('search') . ']' : 'LATEST UPLOADS' }}
            </h3>
            
            <form action="{{ route('home') }}" method="GET" class="d-flex gap-2 flex-wrap">
                <!-- Pertahankan input search jika sedang mencari -->
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif

                <!-- Filter Genre -->
                <select name="genre" class="form-select bg-dark text-white border-danger" style="width: auto; background-color: rgba(15,5,5,0.95) !important;">
                    <option value="">All Genres</option>
                    @foreach($genres as $g)
                        <option value="{{ $g->name }}" {{ request('genre') == $g->name ? 'selected' : '' }}>{{ strtoupper($g->name) }}</option>
                    @endforeach
                </select>
                
                <!-- Filter Year -->
                <select name="year" class="form-select bg-dark text-white border-danger" style="width: auto; background-color: rgba(15,5,5,0.95) !important;">
                    <option value="">All Years</option>
                    <option value="2025" {{ request('year') == '2025' ? 'selected' : '' }}>2025</option>
                    <option value="2024" {{ request('year') == '2024' ? 'selected' : '' }}>2024</option>
                    <option value="2023" {{ request('year') == '2023' ? 'selected' : '' }}>2023</option>
                    <option value="2022" {{ request('year') == '2022' ? 'selected' : '' }}>2022</option>
                    <option value="2021" {{ request('year') == '2021' ? 'selected' : '' }}>2021</option>
                    <option value="2020" {{ request('year') == '2020' ? 'selected' : '' }}>2020</option>
                </select>

                <!-- Filter Country -->
                <select name="country" class="form-select bg-dark text-white border-danger" style="width: auto; background-color: rgba(15,5,5,0.95) !important;">
                    <option value="">All Countries</option>
                    <option value="USA" {{ request('country') == 'USA' ? 'selected' : '' }}>USA</option>
                    <option value="Indonesia" {{ request('country') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                    <option value="UK" {{ request('country') == 'UK' ? 'selected' : '' }}>UK</option>
                    <option value="Japan" {{ request('country') == 'Japan' ? 'selected' : '' }}>Japan</option>
                    <option value="South Korea" {{ request('country') == 'South Korea' ? 'selected' : '' }}>South Korea</option>
                </select>

                <button type="submit" class="btn btn-danger"><i class="bi bi-funnel"></i> Apply</button>
            </form>
        </div>

        @if($films->count() > 0)
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
                @foreach($films as $film)
                    <div class="col">
                        <div class="card film-card shadow-lg" style="background-color: rgba(15, 5, 5, 0.6); border: 1px solid rgba(255, 255, 255, 0.05); border-radius: 12px; overflow: hidden; transition: all 0.3s ease; height: 100%;">
                            <a href="{{ route('film.show', $film->slug) }}">
                                <img src="{{ $film->poster }}" class="film-poster" alt="{{ $film->title }}" style="width: 100%; height: 350px; object-fit: cover; border-bottom: 2px solid #e50914; transition: all 0.5s;">
                            </a>
                            <div class="card-body p-3">
                                <a href="{{ route('film.show', $film->slug) }}" class="film-title d-block mb-2 text-white text-decoration-none" style="font-size: 1.05rem; font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; letter-spacing: 0.5px; transition: 0.3s;">{{ $film->title }}</a>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <span class="badge" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); font-family: 'Orbitron', sans-serif; letter-spacing: 1px;">{{ $film->release_year }}</span>
                                    <span class="fw-bold" style="color: #ffc107; text-shadow: 0 0 8px rgba(255,193,7,0.5); font-size: 0.9rem;">
                                        <i class="bi bi-star-fill"></i> {{ $film->rating }}
                                    </span>
                                </div>
                                <div class="mt-3 tech-text text-danger" style="font-size: 0.65rem; font-family: 'Orbitron', monospace; letter-spacing: 2px; text-transform: uppercase;">
                                    <i class="bi bi-tag-fill me-1"></i>{{ $film->genre->name }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination dengan Bootstrap 5 -->
            <div class="d-flex justify-content-center mt-5 pt-4 pagination-custom" data-bs-theme="dark">
                {{ $films->links('pagination::bootstrap-5') }}
            </div>
        @else
            <div class="text-center py-5 my-5">
                <i class="bi bi-database-exclamation text-danger" style="font-size: 5rem; text-shadow: 0 0 20px rgba(229,9,20,0.5);"></i>
                <h4 class="text-secondary mt-4" style="font-family: 'Orbitron', sans-serif; letter-spacing: 2px;">NO_DATA_FOUND</h4>
                <p class="tech-text text-secondary" style="font-family: 'Orbitron', monospace; font-size: 0.7rem; letter-spacing: 2px; text-transform: uppercase;">System could not locate matching records in the database.</p>
            </div>
        @endif
    </div>
</x-app-layout>