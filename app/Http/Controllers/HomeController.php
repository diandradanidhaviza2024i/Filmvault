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
        // Fitur Pencarian: Jika ada query 'search' dari URL
        $search = $request->query('search');

        // Mengambil data film beserta relasi genrenya (Eager Loading untuk optimasi)
        $films = Film::with('genre')
                    ->when($search, function ($query, $search) {
                        return $query->where('title', 'like', '%' . $search . '%');
                    })
                    ->latest() // Urutkan dari yang terbaru ditambahkan
                    ->paginate(12); // Tampilkan 12 film per halaman

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
     * Menampilkan Film Berdasarkan Genre Tertentu
     * PERBAIKAN: Me-reuse view 'home.index' daripada mencari view 'home.genre' yang tidak ada.
     */
    public function byGenre($slug)
    {
        $genre = Genre::where('slug', $slug)->firstOrFail();
        
        // Ambil film yang id genrenya sama dengan genre yang dipilih
        $films = Film::with('genre')
                    ->where('genre_id', $genre->id)
                    ->latest()
                    ->paginate(12);

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
        $films = $user->favorites()->with('genre')->latest()->paginate(12);

        return view('home.favorites', compact('films'));
    }
}