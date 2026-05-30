<x-app-layout>
    <div class="container py-5" style="margin-top: 20px; min-height: 70vh;">
        <!-- Header Favorites -->
        <div class="d-flex justify-content-between align-items-center mb-5 border-bottom border-danger pb-3" style="border-color: rgba(229,9,20,0.3) !important;">
            <h2 class="fw-bold text-white m-0" style="font-family: 'Orbitron', sans-serif; letter-spacing: 2px;">
                <i class="bi bi-heart-pulse-fill text-danger me-2" style="filter: drop-shadow(0 0 10px rgba(229,9,20,0.8));"></i> 
                MY <span class="text-danger">FAVORITES</span>
            </h2>
            <a href="{{ route('home') }}" class="btn btn-outline-light btn-sm" style="font-family: 'Orbitron', sans-serif; letter-spacing: 1px; border-color: rgba(255,255,255,0.2);">
                <i class="bi bi-arrow-left me-1"></i> BACK TO CATALOG
            </a>
        </div>

        <!-- Alert Notifikasi (Jika ada pesan sukses menambah/menghapus) -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show bg-success text-white border-0 py-3 mb-4 shadow-lg" style="box-shadow: 0 0 20px rgba(25,135,84,0.4) !important;" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> <strong>SYSTEM_UPDATE:</strong> {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Grid Film Favorit -->
        @if($films->count() > 0)
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
                @foreach($films as $film)
                    <div class="col">
                        <div class="card film-card shadow-lg" style="background-color: rgba(15, 5, 5, 0.6); border: 1px solid rgba(229, 9, 20, 0.2); border-radius: 12px; overflow: hidden; transition: all 0.3s ease; height: 100%;">
                            
                            <!-- Poster Film -->
                            <a href="{{ route('film.show', $film->slug) }}">
                                <img src="{{ $film->poster }}" class="film-poster" alt="{{ $film->title }}" style="width: 100%; height: 350px; object-fit: cover; border-bottom: 2px solid #e50914; transition: all 0.5s;">
                            </a>
                            
                            <div class="card-body p-3">
                                <!-- Judul Film -->
                                <a href="{{ route('film.show', $film->slug) }}" class="film-title d-block mb-2 text-white text-decoration-none" style="font-size: 1.05rem; font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; letter-spacing: 0.5px; transition: 0.3s;">
                                    {{ $film->title }}
                                </a>
                                
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <span class="badge" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); font-family: 'Orbitron', sans-serif; letter-spacing: 1px;">{{ $film->release_year }}</span>
                                    <span class="fw-bold" style="color: #ffc107; text-shadow: 0 0 8px rgba(255,193,7,0.5); font-size: 0.9rem;">
                                        <i class="bi bi-star-fill"></i> {{ $film->rating }}
                                    </span>
                                </div>
                                
                                <!-- Genre & Tombol Hapus Favorit -->
                                <div class="mt-4 d-flex justify-content-between align-items-center border-top border-secondary pt-2" style="border-color: rgba(255,255,255,0.1) !important;">
                                    <span class="tech-text text-secondary" style="font-size: 0.65rem; font-family: 'Orbitron', monospace; letter-spacing: 1px; text-transform: uppercase;">
                                        <i class="bi bi-tag-fill me-1"></i>{{ $film->genre->name }}
                                    </span>
                                    
                                    <!-- Tombol Remove from Favorites (FIXED: Menggunakan nama rute yang benar 'favorite.toggle') -->
                                    <form action="{{ route('favorite.toggle', $film->id) }}" method="POST" class="m-0">
                                        @csrf
                                        <button type="submit" class="btn btn-sm p-0 m-0 text-danger" title="Remove from Vault" style="background: none; border: none; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.2)'" onmouseout="this.style.transform='scale(1)'">
                                            <i class="bi bi-heartbreak-fill fs-5" style="filter: drop-shadow(0 0 5px rgba(229,9,20,0.5));"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Bootstrap 5 -->
            <div class="d-flex justify-content-center mt-5 pt-4 pagination-custom" data-bs-theme="dark">
                {{ $films->links('pagination::bootstrap-5') }}
            </div>
            
        @else
            <!-- Tampilan Jika Belum Ada Film Favorit -->
            <div class="text-center py-5 my-5">
                <i class="bi bi-heartbreak text-danger" style="font-size: 6rem; text-shadow: 0 0 30px rgba(229,9,20,0.4); opacity: 0.5;"></i>
                <h3 class="text-white mt-4" style="font-family: 'Orbitron', sans-serif; letter-spacing: 2px;">VAULT IS EMPTY</h3>
                <p class="text-secondary mt-2 mb-4" style="font-family: 'Orbitron', monospace; font-size: 0.8rem; letter-spacing: 1px; text-transform: uppercase;">
                    NO RECORDS DETECTED IN YOUR FAVORITES DATABASE.
                </p>
                <a href="{{ route('home') }}" class="btn px-5 py-3 text-white shadow-lg" style="background-color: rgba(229,9,20,0.8); border: 1px solid #ff3333; font-family: 'Orbitron', sans-serif; font-weight: 700; letter-spacing: 2px; border-radius: 8px; transition: all 0.3s;">
                    BROWSE CATALOG
                </a>
            </div>
        @endif
    </div>
</x-app-layout>