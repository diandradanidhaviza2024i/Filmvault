<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Halaman Dashboard Utama
     */
    public function index()
    {
        // Mengambil statistik untuk counter card
        $totalFilms = Film::count();
        $totalGenres = Genre::count();
        $totalUsers = User::where('role', 'user')->count();
        
        // Menghitung total data di tabel pivot favorites
        $totalFavorites = DB::table('favorites')->count();

        // Mengambil film-film terbaru yang baru ditambahkan
        $latestFilms = Film::with('genre')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalFilms', 
            'totalGenres', 
            'totalUsers', 
            'totalFavorites', 
            'latestFilms'
        ));
    }

    /**
     * Halaman Registered Users + Data Grafik
     */
    public function users()
    {
        // Ambil daftar user biasa untuk tabel
        $users = User::where('role', 'user')->latest()->paginate(15);

        // Mengambil data untuk grafik (Jumlah user mendaftar per bulan di tahun ini)
        $chartData = User::where('role', 'user')
                         ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                         ->whereYear('created_at', date('Y'))
                         ->groupBy('month')
                         ->orderBy('month')
                         ->get();

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $labels = [];
        $data = [];

        // Menyusun array untuk dikirim ke Chart.js
        foreach (range(1, 12) as $m) {
            $labels[] = $months[$m - 1];
            $match = $chartData->firstWhere('month', $m);
            $data[] = $match ? $match->count : 0;
        }

        return view('admin.users', compact('users', 'labels', 'data'));
    }

    /**
     * Halaman Favorite Logs (Peringkat Film Paling Disukai)
     */
    public function favoritesLog()
    {
        // Mengambil semua film, lalu menghitung manual jumlah favoritnya
        $films = Film::with('genre')->get()->map(function ($film) {
            $film->total_favorites = DB::table('favorites')->where('film_id', $film->id)->count();
            return $film;
        })->sortByDesc('total_favorites')->values(); // Urutkan otomatis dari yang terbanyak

        return view('admin.favorites', compact('films'));
    }
}