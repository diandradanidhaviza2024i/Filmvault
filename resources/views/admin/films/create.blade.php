<x-admin-layout>
    <div class="container-fluid" style="max-width: 1000px;">
        
        <div class="mb-4">
            <a href="{{ route('admin.films.index') }}" class="btn btn-sm btn-outline-light mb-3 border-secondary tech-text"><i class="bi bi-arrow-left me-1"></i>BACK_TO_LIST</a>
            <h2 class="fw-bold text-white" style="font-family: 'Orbitron', sans-serif;">INSERT <span class="text-danger">NEW RECORD</span></h2>
            <p class="tech-text text-info">INITIALIZE DATA UPLOAD TO SYSTEM</p>
        </div>

        <div class="card admin-card p-5 shadow-lg">
            <form action="{{ route('admin.films.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <!-- Judul -->
                    <div class="col-md-8 mb-4">
                        <label class="form-label tech-text text-white">TITLE_</label>
                        <input type="text" class="form-control admin-input" name="title" value="{{ old('title') }}" required>
                        @error('title') <span class="text-danger small mt-1 d-block fw-bold">{{ $message }}</span> @enderror
                    </div>
                    
                    <!-- Genre -->
                    <div class="col-md-4 mb-4">
                        <label class="form-label tech-text text-white">GENRE_ID_</label>
                        <select class="form-select admin-input" name="genre_id" required>
                            <option value="" disabled selected>Select Node</option>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                            @endforeach
                        </select>
                        @error('genre_id') <span class="text-danger small mt-1 d-block fw-bold">{{ $message }}</span> @enderror
                    </div>
                </div>
                
                <!-- Sinopsis -->
                <div class="row">
                    <div class="col-12 mb-4">
                        <label class="form-label tech-text text-white">SYNOPSIS_DATA_</label>
                        <textarea class="form-control admin-input" name="synopsis" rows="5" required>{{ old('synopsis') }}</textarea>
                        @error('synopsis') <span class="text-danger small mt-1 d-block fw-bold">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- Rating -->
                    <div class="col-md-4 mb-4">
                        <label class="form-label tech-text text-white">RATING_VAL_</label>
                        <input type="number" step="0.1" class="form-control admin-input" name="rating" value="{{ old('rating') }}" required>
                        @error('rating') <span class="text-danger small mt-1 d-block fw-bold">{{ $message }}</span> @enderror
                    </div>
                    <!-- Tahun -->
                    <div class="col-md-4 mb-4">
                        <label class="form-label tech-text text-white">YEAR_</label>
                        <input type="number" class="form-control admin-input" name="release_year" value="{{ old('release_year') }}" required>
                        @error('release_year') <span class="text-danger small mt-1 d-block fw-bold">{{ $message }}</span> @enderror
                    </div>
                    <!-- Durasi -->
                    <div class="col-md-4 mb-4">
                        <label class="form-label tech-text text-white">RUNTIME_MIN_</label>
                        <input type="number" class="form-control admin-input" name="duration" value="{{ old('duration') }}" required>
                        @error('duration') <span class="text-danger small mt-1 d-block fw-bold">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- Negara -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label tech-text text-white">ORIGIN_COUNTRY_</label>
                        <input type="text" class="form-control admin-input" name="country" value="{{ old('country') }}" required>
                        @error('country') <span class="text-danger small mt-1 d-block fw-bold">{{ $message }}</span> @enderror
                    </div>
                    <!-- Bahasa -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label tech-text text-white">LANGUAGE_</label>
                        <input type="text" class="form-control admin-input" name="language" value="{{ old('language') }}" required>
                        @error('language') <span class="text-danger small mt-1 d-block fw-bold">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- Director -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label tech-text text-white">DIRECTOR_</label>
                        <input type="text" class="form-control admin-input" name="director" value="{{ old('director') }}" required>
                        @error('director') <span class="text-danger small mt-1 d-block fw-bold">{{ $message }}</span> @enderror
                    </div>
                    <!-- Cast -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label tech-text text-white">MAIN_CAST_</label>
                        <input type="text" class="form-control admin-input" name="cast" value="{{ old('cast') }}" required>
                        @error('cast') <span class="text-danger small mt-1 d-block fw-bold">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <!-- Poster -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label tech-text text-white">UPLOAD_IMAGE_FILE_</label>
                        <input type="file" class="form-control admin-input" name="poster" accept="image/*" required>
                        @error('poster') <span class="text-danger small mt-1 d-block fw-bold">{{ $message }}</span> @enderror
                    </div>
                    <!-- Trailer -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label tech-text text-white">EMBED_TRAILER_LINK_ <span class="text-secondary">(OPTIONAL)</span></label>
                        <input type="url" class="form-control admin-input" name="trailer_url" value="{{ old('trailer_url') }}">
                        @error('trailer_url') <span class="text-danger small mt-1 d-block fw-bold">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row mt-3 border-top border-secondary pt-4">
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-glow-danger px-5 py-3 fw-bold" style="font-family: 'Orbitron', sans-serif; letter-spacing: 2px; font-size: 1.1rem;">EXECUTE UPLOAD</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>