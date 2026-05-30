<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::with('genre')->latest()->paginate(10);
        return view('admin.films.index', compact('films'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('admin.films.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:films,title',
            'genre_id' => 'required|exists:genres,id',
            'synopsis' => 'required|string',
            'rating' => 'required|numeric|between:0,10',
            'release_year' => 'required|integer|min:1900|max:' . (date('Y') + 2),
            'duration' => 'required|integer|min:1',
            'country' => 'required|string|max:100',
            'language' => 'required|string|max:100',
            'cast' => 'required|string',
            'director' => 'required|string|max:255',
            'poster' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Maksimal 2MB
            'trailer_url' => 'nullable|url',
        ]);

        $data = $request->except('poster');
        $data['slug'] = Str::slug($request->title);

        // Menangani upload poster gambar
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $filename = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('posters', $filename, 'public');
            $data['poster'] = Storage::url($path); // Menyimpan path publik /storage/posters/filename.jpg
        }

        Film::create($data);

        return redirect()->route('admin.films.index')->with('success', 'Film baru berhasil ditambahkan!');
    }

    public function edit(Film $film)
    {
        $genres = Genre::all();
        return view('admin.films.edit', compact('film', 'genres'));
    }

    public function update(Request $request, Film $film)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:films,title,' . $film->id,
            'genre_id' => 'required|exists:genres,id',
            'synopsis' => 'required|string',
            'rating' => 'required|numeric|between:0,10',
            'release_year' => 'required|integer|min:1900|max:' . (date('Y') + 2),
            'duration' => 'required|integer|min:1',
            'country' => 'required|string|max:100',
            'language' => 'required|string|max:100',
            'cast' => 'required|string',
            'director' => 'required|string|max:255',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'trailer_url' => 'nullable|url',
        ]);

        $data = $request->except('poster');
        $data['slug'] = Str::slug($request->title);

        // Jika mengupload poster baru
        if ($request->hasFile('poster')) {
            // Hapus poster lama dari folder storage jika ada dan bukan link placeholder unsplash
            if ($film->poster && !Str::contains($film->poster, 'unsplash.com')) {
                $oldPath = Str::replace('/storage/', '', $film->poster);
                Storage::disk('public')->delete($oldPath);
            }

            $file = $request->file('poster');
            $filename = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('posters', $filename, 'public');
            $data['poster'] = Storage::url($path);
        }

        $film->update($data);

        return redirect()->route('admin.films.index')->with('success', 'Data film berhasil diperbarui!');
    }

    public function destroy(Film $film)
    {
        // Hapus poster terkait dari penyimpanan
        if ($film->poster && !Str::contains($film->poster, 'unsplash.com')) {
            $oldPath = Str::replace('/storage/', '', $film->poster);
            Storage::disk('public')->delete($oldPath);
        }

        $film->delete();

        return redirect()->route('admin.films.index')->with('success', 'Film berhasil dihapus!');
    }
}
