<x-admin-layout>
    <div class="container-fluid py-2">
        <div class="d-flex justify-content-between align-items-center mb-5 mt-2">
            <div>
                <h2 class="fw-bold mb-2 text-white" style="font-family: 'Orbitron', sans-serif;">FAVORITE <span class="text-warning">RANKINGS</span></h2>
                <p class="tech-text text-warning mb-0">DATABASE // GLOBAL_LIKES_LOG</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-warning px-4 tech-text">
                <i class="bi bi-arrow-left me-1"></i> BACK TO DASHBOARD
            </a>
        </div>

        <div class="card admin-card p-4 p-md-5 shadow-lg" style="border-color: rgba(255,193,7,0.3);">
            <h5 class="fw-bold text-white mb-4 mt-2" style="font-family: 'Orbitron', sans-serif; letter-spacing: 1px;">
                <i class="bi bi-trophy-fill me-2 text-warning" style="filter: drop-shadow(0 0 10px rgba(255,193,7,0.8));"></i> TOP FAVORITED FILMS
            </h5>
            
            <div class="table-responsive pb-3">
                <table class="table table-admin align-middle mt-2">
                    <thead>
                        <tr class="text-nowrap">
                            <th class="text-center" style="width: 80px;">RANK</th>
                            <th style="width: 90px;">POSTER</th>
                            <th>INFORMASI FILM</th>
                            <th class="text-center">TOTAL FAVORITES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($films as $index => $film)
                            @if($film->total_favorites > 0)
                            <tr>
                                <!-- Kolom Ranking (Medali untuk Top 3) -->
                                <td class="text-center">
                                    @if($index == 0)
                                        <i class="bi bi-award-fill" style="font-size: 2.2rem; color: #FFD700; filter: drop-shadow(0 0 15px rgba(255,215,0,0.8));"></i>
                                    @elseif($index == 1)
                                        <i class="bi bi-award-fill" style="font-size: 1.8rem; color: #C0C0C0; filter: drop-shadow(0 0 10px rgba(192,192,192,0.8));"></i>
                                    @elseif($index == 2)
                                        <i class="bi bi-award-fill" style="font-size: 1.6rem; color: #CD7F32; filter: drop-shadow(0 0 10px rgba(205,127,50,0.8));"></i>
                                    @else
                                        <span class="tech-text text-secondary fs-5">#{{ $index + 1 }}</span>
                                    @endif
                                </td>
                                
                                <!-- Kolom Poster -->
                                <td>
                                    <div style="width: 60px; height: 85px; border-radius: 6px; overflow: hidden; border: 1px solid rgba(255,255,255,0.2);">
                                        <img src="{{ $film->poster }}" alt="Poster" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                </td>
                                
                                <!-- Kolom Informasi -->
                                <td>
                                    <h6 class="text-white fw-bold mb-2 fs-5" style="font-family: 'Orbitron', sans-serif; letter-spacing: 1px;">{{ $film->title }}</h6>
                                    <span class="badge border border-danger text-danger tech-text bg-transparent me-2">{{ $film->genre->name }}</span>
                                    <span class="text-secondary small"><i class="bi bi-calendar-event me-1"></i>{{ $film->release_year }}</span>
                                </td>
                                
                                <!-- Kolom Total Jumlah Favorit -->
                                <td class="text-center">
                                    <div class="d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background: rgba(255,193,7,0.1); border: 2px solid #ffc107; border-radius: 50%; box-shadow: 0 0 20px rgba(255,193,7,0.3);">
                                        <span class="fw-bold fs-3 text-white" style="font-family: 'Orbitron', sans-serif;">
                                            {{ $film->total_favorites }}
                                        </span>
                                    </div>
                                    <div class="tech-text text-warning mt-2" style="font-size: 0.6rem;">USERS LIKED</div>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Jika belum ada film yang dilike sama sekali -->
            @if($films->where('total_favorites', '>', 0)->count() == 0)
                <div class="text-center py-5 my-4">
                    <i class="bi bi-clipboard-x text-secondary mb-3" style="font-size: 4rem;"></i>
                    <h5 class="tech-text text-secondary fs-6">NO FAVORITE LOGS DETECTED YET.</h5>
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>