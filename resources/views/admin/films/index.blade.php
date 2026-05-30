<x-admin-layout>
    <div class="container-fluid py-2">
        <div class="d-flex justify-content-between align-items-center mb-5 mt-2">
            <div>
                <h2 class="fw-bold mb-2 text-white" style="font-family: 'Orbitron', sans-serif;">KELOLA <span class="text-danger">FILM</span></h2>
                <p class="tech-text text-info mb-0">DATABASE // MASTER_RECORDS</p>
            </div>
            <a href="{{ route('admin.films.create') }}" class="btn btn-glow-danger px-4">
                <i class="bi bi-plus-lg me-1"></i> Tambah Record Film
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show bg-success text-white border-0 py-3 mb-5 shadow-lg" style="box-shadow: 0 0 20px rgba(25,135,84,0.4) !important;" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> <strong>SUCCESS:</strong> {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card admin-card p-4 p-md-5 shadow-lg">
            <div class="table-responsive pb-3">
                <table class="table table-admin align-middle mt-2">
                    <thead>
                        <tr class="text-nowrap">
                            <th class="text-center" style="width: 70px;">IMG</th>
                            <th>TITLE_ID</th>
                            <th>CLASSIFICATION</th>
                            <th>YEAR</th>
                            <th>RATING</th>
                            <th>DIRECTOR</th>
                            <th class="text-end">EXECUTABLE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($films as $film)
                            <tr>
                                <td class="text-center">
                                    <div style="width: 50px; height: 70px; border-radius: 6px; overflow: hidden; border: 1px solid rgba(229,9,20,0.6); box-shadow: 0 0 12px rgba(229,9,20,0.3);">
                                        <img src="{{ $film->poster }}" style="width: 100%; height: 100%; object-fit: cover;" alt="">
                                    </div>
                                </td>
                                <td class="text-nowrap">
                                    <div class="fw-bold text-white mb-1" style="font-size: 1.05rem; letter-spacing: 0.5px;">{{ $film->title }}</div>
                                    <div class="tech-text text-info"><i class="bi bi-clock me-1"></i>{{ $film->duration }} MIN</div>
                                </td>
                                <td class="text-nowrap">
                                    <span class="badge" style="background: rgba(229, 9, 20, 0.15); border: 1px solid rgba(229, 9, 20, 0.6); color: #fff; font-family: 'Orbitron', sans-serif; letter-spacing: 1px; padding: 6px 10px;">
                                        {{ $film->genre->name }}
                                    </span>
                                </td>
                                <td class="tech-text text-light fs-6">{{ $film->release_year }}</td>
                                <td class="text-nowrap">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-star-fill text-warning me-2" style="filter: drop-shadow(0 0 8px rgba(255,193,7,0.8)); font-size: 1.1rem;"></i>
                                        <span class="fw-bold text-white fs-6">{{ $film->rating }}</span>
                                    </div>
                                </td>
                                <td class="text-light text-nowrap fw-semibold">{{ $film->director }}</td>
                                <td class="text-end text-nowrap">
                                    <a href="{{ route('admin.films.edit', $film->id) }}" class="btn btn-sm btn-icon edit-btn me-2" title="Edit Record">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.films.destroy', $film->id) }}" method="POST" class="d-inline" onsubmit="return confirm('WARNING! Tindakan ini tidak dapat dibatalkan. Konfirmasi penghapusan?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-icon delete-btn" title="Delete Record">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-secondary tech-text">NO MASTER RECORDS FOUND IN SYSTEM.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Tampilan Pagination akan dihajar otomatis oleh CSS sakti di layout -->
            <div class="d-flex justify-content-center mt-5 mb-3 pagination-custom">
                {{ $films->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>