<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::withCount('films')->orderBy('name', 'asc')->paginate(10);
        return view('admin.genres.index', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:genres,name',
        ]);

        Genre::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.genres.index')->with('success', 'Genre berhasil ditambahkan!');
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:genres,name,' . $genre->id,
        ]);

        $genre->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.genres.index')->with('success', 'Genre berhasil diperbarui!');
    }

    public function destroy(Genre $genre)
    {
        // Otomatis menghapus film terkait karena foreign key diatur ke cascadeOnDelete
        $genre->delete();
        return redirect()->route('admin.genres.index')->with('success', 'Genre berhasil dihapus!');
    }
}
