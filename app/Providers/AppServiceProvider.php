<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; // Untuk Bootstrap 5 Pagination
use Illuminate\Support\Facades\URL;  // Wajib ditambahkan untuk Vercel HTTPS

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 1. Menggunakan Bootstrap 5 untuk tampilan Pagination
        Paginator::useBootstrapFive(); 

        // 2. Memaksa Laravel menggunakan HTTPS saat di Vercel (Production)
        // Mencegah error tampilan CSS/JS tidak termuat
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}