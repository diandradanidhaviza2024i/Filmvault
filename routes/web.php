<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FilmController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

// --- RUTE PUBLIK (Semua orang bisa akses) ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/film/{slug}', [HomeController::class, 'show'])->name('film.show');
Route::get('/genre/{slug}', [HomeController::class, 'byGenre'])->name('genre.show');


// --- RUTE USER LOGIN ---
Route::middleware('auth')->group(function () {
    // Fitur Favorite
    Route::post('/film/{film}/favorite', [HomeController::class, 'toggleFavorite'])->name('favorite.toggle');
    Route::get('/my-favorites', [HomeController::class, 'favorites'])->name('favorites.index');

    // Profile Bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // SOLUSI ERROR 419 / ROUTE NOT FOUND: Rute penengah setelah login sukses
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('home');
    })->name('dashboard');
});


// --- RUTE ADMIN ---
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard, Users & Favorites Logs (Memakai DashboardController)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [DashboardController::class, 'users'])->name('users');
    Route::get('/favorites-log', [DashboardController::class, 'favoritesLog'])->name('favoritesLog');
    
    // CRUD Film & Genre
    Route::resource('films', FilmController::class);
    Route::resource('genres', GenreController::class);
});

require __DIR__.'/auth.php';