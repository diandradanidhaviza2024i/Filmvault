<x-app-layout>
    <!-- Background Blur Overlay dari Poster -->
    <div style="position: absolute; top: 0; left: 0; right: 0; height: 60vh; 
                background: linear-gradient(to bottom, rgba(10,10,10,0.8), #0a0a0a), 
                url('{{ $film->poster }}') no-repeat center center; 
                background-size: cover; filter: blur(20px); z-index: -1;">
    </div>

    <div class="container py-5 mt-4">
        <!-- Flash Message (Notifikasi Favorit) -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show bg-success text-white border-0" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <!-- Kolom Poster -->
            <div class="col-md-4 col-lg-3 mb-4">
                <img src="{{ $film->poster }}" class="img-fluid rounded shadow-lg" style="border: 2px solid #333;" alt="{{ $film->title }}">
            </div>

            <!-- Kolom Info -->
            <div class="col-md-8 col-lg-9">
                <h1 class="fw-bold mb-2" style="font-family: 'Montserrat', sans-serif;">{{ $film->title }} ({{ $film->release_year }})</h1>
                
                <div class="d-flex align-items-center gap-3 mb-4">
                    <span class="badge" style="background-color: #e50914; font-size: 0.9rem;">{{ $film->genre->name }}</span>
                    <span class="text-warning fw-bold fs-5"><i class="bi bi-star-fill"></i> {{ $film->rating }}/10</span>
                    <span class="text-secondary"><i class="bi bi-clock"></i> {{ $film->duration }} min</span>
                    <span class="text-secondary"><i class="bi bi-globe"></i> {{ $film->language }}</span>
                </div>

                <h5 class="text-secondary mb-2">Synopsis</h5>
                <p class="lead text-light mb-4" style="font-size: 1.1rem; line-height: 1.6;">{{ $film->synopsis }}</p>

                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h6 class="text-secondary">Director</h6>
                        <p class="fw-bold">{{ $film->director }}</p>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="text-secondary">Cast</h6>
                        <p class="fw-bold">{{ $film->cast }}</p>
                    </div>
                </div>

                <!-- Tombol Action -->
                <div class="d-flex gap-3 mt-2">
                    <!-- Fitur Favorite (Hanya tampil jika login) -->
                    @auth
                        <form action="{{ route('favorite.toggle', $film->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-lg {{ $isFavorited ? 'btn-danger' : 'btn-outline-danger' }}">
                                <i class="bi {{ $isFavorited ? 'bi-heart-fill' : 'bi-heart' }}"></i> 
                                {{ $isFavorited ? 'Remove from Favorites' : 'Add to Favorites' }}
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-lg btn-outline-danger">
                            <i class="bi bi-heart"></i> Login to Favorite
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Section Trailer Opsional -->
        @if($film->trailer_url)
        <div class="row mt-5">
            <div class="col-12">
                <h4 class="fw-bold border-start border-4 ps-2 mb-4" style="border-color: #e50914 !important;">Official Trailer</h4>
                <div class="ratio ratio-16x9 rounded overflow-hidden shadow-lg" style="border: 1px solid #333;">
                    <iframe src="{{ $film->trailer_url }}" title="Trailer" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        @endif
    </div>
</x-app-layout>
