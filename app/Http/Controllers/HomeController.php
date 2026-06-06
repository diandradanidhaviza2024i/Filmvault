<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan Halaman Utama (Katalog Semua Film)
     */
    public function index(Request $request)
    {
        // Tangkap semua input filter dari URL
        $search = $request->query('search');
        $genreFilter = $request->query('genre');
        $yearFilter = $request->query('year');
        $countryFilter = $request->query('country');

        // Mulai query ke database
        $query = Film::with('genre');

        // 1. Logika Filter Pencarian
        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        // 2. Logika Filter Genre
        if ($genreFilter) {
            $query->whereHas('genre', function($q) use ($genreFilter) {
                $q->where('name', $genreFilter);
            });
        }

        // 3. Logika Filter Year (Tahun)
        if ($yearFilter) {
            $query->where('release_year', $yearFilter);
        }

        // 4. Logika Filter Country (Negara)
        if ($countryFilter) {
            $query->where('country', $countryFilter);
        }

        // Eksekusi data, ubah jadi 15 per halaman, dan pastikan filter tidak hilang saat pindah page
        $films = $query->latest()->paginate(15)->appends($request->all());

        $genres = Genre::orderBy('name', 'asc')->get(); // Ambil semua genre untuk menu filter

        return view('home.index', compact('films', 'genres', 'search'));
    }

    /**
     * Menampilkan Detail Satu Film
     */
    public function show($slug)
    {
        // Cari film berdasarkan slug. Jika tidak ketemu, munculkan 404
        $film = Film::with('genre')->where('slug', $slug)->firstOrFail();
        
        // Cek apakah user yang sedang login sudah memfavoritkan film ini
        $isFavorited = false;
        if (auth()->check()) {
            $isFavorited = auth()->user()->favorites()->where('film_id', $film->id)->exists();
        }

        return view('home.show', compact('film', 'isFavorited'));
    }

    /**
     * Menampilkan Film Berdasarkan Genre Tertentu (dari klik link)
     */
    public function byGenre($slug)
    {
        $genre = Genre::where('slug', $slug)->firstOrFail();
        
        $films = Film::with('genre')
                    ->where('genre_id', $genre->id)
                    ->latest()
                    ->paginate(15); // Disamakan menjadi 15 film per halaman

        $genres = Genre::orderBy('name', 'asc')->get();
        
        // Menyiasati agar text title filter genre tampil rapi di view index
        $search = 'Genre: ' . $genre->name;

        return view('home.index', compact('films', 'genres', 'search'));
    }

    /**
     * Mengelola Fitur Tambah/Hapus Favorite (Bookmark)
     */
    public function toggleFavorite(Film $film)
    {
        $user = auth()->user();

        // toggle() otomatis menambahkan jika belum ada, atau menghapus jika sudah ada
        $user->favorites()->toggle($film->id);

        return back()->with('success', 'Daftar favorit berhasil diperbarui!');
    }

    /**
     * Menampilkan Halaman Daftar Film Favorit User
     */
    public function favorites()
    {
        $user = auth()->user();
        
        // Ambil data film dari relasi favorites milik user yang sedang login
        $films = $user->favorites()->with('genre')->latest()->paginate(15); // Disamakan 15 juga

        return view('home.favorites', compact('films'));
    }
}