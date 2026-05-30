<x-guest-layout>
    <div class="text-center mt-2">
        <a href="/" class="brand-logo">FILMVAULT</a>
        <p class="subtitle">Sign In to start Add Your New Movie List</p>
    </div>

    @if (session('status'))
        <div class="alert alert-success mb-3 rounded bg-success text-white border-0 py-2" style="font-size: 0.9rem;">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group-custom mb-4">
            <span class="input-icon"><i class="bi bi-envelope"></i></span>
            <input id="email" type="email" class="input-field" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Email Address">
        </div>
        @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror

        <!-- PERBAIKAN: Tombol Show/Hide diletakkan persis di dalam border -->
        <div class="input-group-custom mb-3">
            <span class="input-icon"><i class="bi bi-lock"></i></span>
            <input id="password" type="password" class="input-field" name="password" required autocomplete="current-password" placeholder="Password" style="padding-right: 90px !important;">
            
            <div class="toggle-password-btn" onclick="togglePassword('password', 'toggleIcon', 'toggleText')">
                <span id="toggleText">SHOW</span>
                <i class="bi bi-eye-slash" id="toggleIcon"></i>
            </div>
        </div>
        @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror

        <div class="d-flex align-items-center mb-4 mt-3">
            <input id="remember_me" type="checkbox" class="custom-checkbox me-2" name="remember">
            <label for="remember_me" class="text-secondary" style="font-size: 0.85rem; cursor: pointer; user-select: none;">
                Remember me
            </label>
        </div>

        <button type="submit" class="btn-glow mb-4">Sign In</button>

        <div class="text-center mt-3">
            <span class="text-secondary" style="font-size: 0.85rem;">New to FilmVault?</span> 
            <a href="{{ route('register') }}" class="auth-link ms-1" style="font-size: 0.85rem;">
                Sign up now. <i class="bi bi-arrow-up-right"></i>
            </a>
        </div>
    </form>
</x-guest-layout>