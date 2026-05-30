<x-guest-layout>
    <div class="text-center mt-2">
        <a href="/" class="brand-logo">FILMVAULT</a>
        <p class="subtitle">Join the digital Movie Library</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="input-group-custom mb-4">
            <span class="input-icon"><i class="bi bi-person"></i></span>
            <input id="name" type="text" class="input-field" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Full Name">
        </div>
        @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror

        <div class="input-group-custom mb-4">
            <span class="input-icon"><i class="bi bi-envelope"></i></span>
            <input id="email" type="email" class="input-field" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Email Address">
        </div>
        @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror

        <!-- PERBAIKAN: Teks Show/Hide di dalam Input -->
        <div class="input-group-custom mb-4">
            <span class="input-icon"><i class="bi bi-lock"></i></span>
            <input id="password" type="password" class="input-field" name="password" required autocomplete="new-password" placeholder="Password" style="padding-right: 90px !important;">
            <div class="toggle-password-btn" onclick="togglePassword('password', 'toggleIcon1', 'toggleText1')">
                <span id="toggleText1">SHOW</span>
                <i class="bi bi-eye-slash" id="toggleIcon1"></i>
            </div>
        </div>
        @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror

        <div class="input-group-custom mb-3">
            <span class="input-icon"><i class="bi bi-shield-check"></i></span>
            <input id="password_confirmation" type="password" class="input-field" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" style="padding-right: 90px !important;">
            <div class="toggle-password-btn" onclick="togglePassword('password_confirmation', 'toggleIcon2', 'toggleText2')">
                <span id="toggleText2">SHOW</span>
                <i class="bi bi-eye-slash" id="toggleIcon2"></i>
            </div>
        </div>
        @error('password_confirmation') <span class="invalid-feedback">{{ $message }}</span> @enderror

        <button type="submit" class="btn-glow mb-4 mt-4">Initialize Account</button>

        <div class="text-center mt-2">
            <span class="text-secondary" style="font-size: 0.85rem;">Already have an account?</span> 
            <a href="{{ route('login') }}" class="auth-link ms-1" style="font-size: 0.85rem;">
                Sign in. <i class="bi bi-arrow-up-right"></i>
            </a>
        </div>
    </form>
</x-guest-layout>