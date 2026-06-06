<x-app-layout>
    <style>
        /* Paksa background profile menjadi transparan menyatu dengan body utama */
        .bg-gray-100, .dark\:bg-gray-900 { background-color: transparent !important; }
        
        /* Box form profile dibuat ala glassmorphism */
        .bg-white, .dark\:bg-gray-800 { 
            background-color: rgba(15, 5, 5, 0.8) !important; 
            border: 1px solid rgba(229, 9, 20, 0.3) !important; 
            backdrop-filter: blur(10px);
            color: #fff !important; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.5) !important;
        }
        
        /* Ubah warna teks form menjadi terang */
        h2, p, label, .text-gray-800, .text-gray-900, .text-gray-600 { color: #e0e0e0 !important; }
        
        /* Styling input field agar futuristik */
        input[type="text"], input[type="email"], input[type="password"] {
            background-color: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(229, 9, 20, 0.5) !important;
            color: white !important;
        }
        input:focus { border-color: #e50914 !important; box-shadow: 0 0 10px rgba(229, 9, 20, 0.5) !important; }
        
        /* Styling tombol Save */
        button { background-color: #e50914 !important; color: white !important; border: none !important; transition: 0.3s; }
        button:hover { background-color: #ff3333 !important; box-shadow: 0 0 15px rgba(229, 9, 20, 0.5) !important; }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
