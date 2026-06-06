<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight" style="font-family: 'Orbitron', sans-serif; letter-spacing: 1px; text-shadow: 0 0 10px rgba(229,9,20,0.5);">
            {{ __('PROFILE SETTINGS') }}
        </h2>
    </x-slot>

    <!-- CSS Super Agresif untuk menimpa Tailwind di dalam Partials -->
    <style>
        .profile-container {
            color: #e0e0e0;
        }

        /* Panel Kaca (Glassmorphism Murni) */
        .glass-panel {
            background: rgba(15, 5, 10, 0.75) !important;
            backdrop-filter: blur(15px) !important;
            -webkit-backdrop-filter: blur(15px) !important;
            border: 1px solid rgba(229, 9, 20, 0.3) !important;
            box-shadow: 0 10px 40px rgba(0,0,0,0.8), inset 0 0 15px rgba(229, 9, 20, 0.05) !important;
            border-radius: 16px !important;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .glass-panel:hover {
            box-shadow: 0 15px 45px rgba(229, 9, 20, 0.15), inset 0 0 20px rgba(229, 9, 20, 0.1) !important;
        }

        /* Teks & Label */
        .profile-container h2, .profile-container header h2 { 
            color: #ffffff !important; 
            font-family: 'Orbitron', sans-serif !important; 
            letter-spacing: 1px !important; 
            text-transform: uppercase;
        }
        .profile-container p { color: #a0a0a0 !important; font-size: 0.9rem; }
        .profile-container label { 
            color: #e0e0e0 !important; 
            font-weight: 600 !important; 
            letter-spacing: 0.5px !important; 
            font-size: 0.9rem !important; 
            margin-bottom: 5px !important; 
            display: block !important;
        }
        
        /* Input Fields */
        .profile-container input[type="text"], 
        .profile-container input[type="email"], 
        .profile-container input[type="password"] {
            background-color: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            color: #ffffff !important;
            border-radius: 8px !important;
            padding: 0.8rem 1rem !important;
            width: 100% !important;
            box-shadow: inset 0 2px 5px rgba(0,0,0,0.5) !important;
            transition: all 0.3s ease !important;
        }
        .profile-container input:focus {
            border-color: #e50914 !important;
            background-color: rgba(229, 9, 20, 0.05) !important;
            box-shadow: 0 0 15px rgba(229, 9, 20, 0.3) !important;
            outline: none !important;
            --tw-ring-color: transparent !important;
        }

        /* Buttons Utama */
        .profile-container button {
            background: linear-gradient(135deg, #a10000, #e50914) !important;
            color: #ffffff !important;
            border: none !important;
            padding: 0.75rem 1.5rem !important;
            border-radius: 8px !important;
            font-weight: 700 !important;
            letter-spacing: 1px !important;
            transition: all 0.3s ease !important;
            text-transform: uppercase !important;
            box-shadow: 0 5px 15px rgba(229, 9, 20, 0.2) !important;
        }
        .profile-container button:hover {
            background: linear-gradient(135deg, #cc0000, #ff1a26) !important;
            box-shadow: 0 8px 25px rgba(229, 9, 20, 0.5) !important;
            transform: translateY(-2px) !important;
        }

        /* Khusus tombol Delete Account */
        .profile-container button.bg-red-600 {
            background: transparent !important;
            border: 1px solid #e50914 !important;
            color: #e50914 !important;
        }
        .profile-container button.bg-red-600:hover {
            background: #e50914 !important;
            color: #fff !important;
            box-shadow: 0 0 20px rgba(229, 9, 20, 0.5) !important;
        }

        /* Status Teks (Tersimpan / Saved) */
        .profile-container .text-gray-600 {
            color: #10b981 !important; /* Warna hijau neon sukses */
            font-weight: bold !important;
        }

        /* Link Bawah */
        .profile-container a { color: #e50914 !important; font-weight: 600; text-decoration: none; transition: 0.3s; }
        .profile-container a:hover { color: #ff3333 !important; text-shadow: 0 0 10px rgba(229, 9, 20, 0.5); }
    </style>

    <div class="py-12 profile-container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Update Profile Information -->
            <div class="p-6 sm:p-8 glass-panel">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-6 sm:p-8 glass-panel">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User Form -->
            <div class="p-6 sm:p-8 glass-panel" style="border-width: 2px !important; border-color: rgba(229,9,20,0.6) !important;">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>