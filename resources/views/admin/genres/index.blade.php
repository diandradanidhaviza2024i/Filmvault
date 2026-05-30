<x-admin-layout>
    <div class="container-fluid py-2">
        <div class="d-flex justify-content-between align-items-center mb-5 mt-2">
            <div>
                <h2 class="fw-bold mb-2 text-white" style="font-family: 'Orbitron', sans-serif;">KELOLA <span class="text-danger">GENRE</span></h2>
                <p class="tech-text text-info mb-0">DATABASE // CLASSIFICATIONS</p>
            </div>
            <button class="btn btn-glow-danger px-4" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="bi bi-plus-lg me-1"></i> Tambah Genre
            </button>
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
                            <th>ID_SYS</th>
                            <th class="w-50">Nama Kategori</th>
                            <th>Link Relasi</th>
                            <th class="text-end">Executable</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($genres as $genre)
                            <tr>
                                <td class="tech-text text-danger">#{{ str_pad($genre->id, 4, '0', STR_PAD_LEFT) }}</td>
                                <td class="fw-bold text-white fs-6">{{ $genre->name }}</td>
                                <td><span class="badge bg-transparent border border-info text-info tech-text px-2 py-1">{{ $genre->films_count }} FILMS LINKED</span></td>
                                <td class="text-end text-nowrap">
                                    <button class="btn btn-sm btn-icon edit-btn me-2" data-bs-toggle="modal" data-bs-target="#editModal{{ $genre->id }}" title="Edit Genre">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <form action="{{ route('admin.genres.destroy', $genre->id) }}" method="POST" class="d-inline" onsubmit="return confirm('WARNING! Yakin ingin menghapus node ini? Semua entitas film yang terkait akan ikut dimusnahkan.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-icon delete-btn" title="Delete Genre">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Glass Modal Edit Genre -->
                            <div class="modal fade" id="editModal{{ $genre->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content glass-modal p-2">
                                        <div class="modal-header border-secondary pb-4">
                                            <h5 class="modal-title text-white fw-bold" style="font-family: 'Orbitron', sans-serif;">EDIT GENRE</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.genres.update', $genre->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body py-5">
                                                <div class="mb-2">
                                                    <!-- PERBAIKAN Teks Label & Title Form -->
                                                    <label class="form-label text-white fw-bold mb-3" style="font-size: 1.1rem; letter-spacing: 1px;">Nama Genre</label>
                                                    <input type="text" class="form-control admin-input py-3" name="name" value="{{ $genre->name }}" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-secondary pt-4">
                                                <button type="button" class="btn btn-sm btn-outline-light px-4" data-bs-dismiss="modal">BATAL</button>
                                                <button type="submit" class="btn btn-sm btn-glow-danger px-4">SIMPAN PERUBAHAN</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-secondary tech-text">NO CLASSIFICATIONS FOUND.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-center mt-5 mb-3 pagination-custom">
                {{ $genres->links() }}
            </div>
        </div>
    </div>

    <!-- Glass Modal Create Genre -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content glass-modal p-2">
                <div class="modal-header border-secondary pb-4">
                    <h5 class="modal-title text-white fw-bold" style="font-family: 'Orbitron', sans-serif;">TAMBAH GENRE</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.genres.store') }}" method="POST">
                    @csrf
                    <div class="modal-body py-5">
                        <div class="mb-2">
                            <!-- PERBAIKAN Teks Label -->
                            <label class="form-label text-white fw-bold mb-3" style="font-size: 1.1rem; letter-spacing: 1px;">Nama Genre Baru</label>
                            <input type="text" class="form-control admin-input py-3" name="name" placeholder="Misal: Sci-Fi Cyberpunk" required>
                        </div>
                    </div>
                    <div class="modal-footer border-secondary pt-4">
                        <button type="button" class="btn btn-sm btn-outline-light px-4" data-bs-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-sm btn-glow-danger px-4">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>