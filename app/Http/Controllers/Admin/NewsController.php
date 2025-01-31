<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Menampilkan daftar berita.
     */
    public function index()
    {
        $news = News::latest()->get(); // Urutkan dari berita terbaru
        return view('backend.news.index', compact('news'));
    }

    /**
     * Menampilkan form tambah berita.
     */
    public function create()
    {
        return view('backend.news.create');
    }

    /**
     * Menyimpan berita baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
        ]);

        try {
            $news = new News();
            $news->title = $validatedData['title'];
            $news->description = $validatedData['description'];

            if ($request->hasFile('image')) {
                $news->image = $request->file('image')->store('public/news');
            }

            $news->save();

            return redirect()->route('news.index')->with('success', 'Berita berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->route('news.create')->with('error', 'Gagal membuat berita. ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan berita berdasarkan ID.
     */
    public function show($id)
    {
        try {
            $news = News::findOrFail($id);
            return view('backend.news.show', compact('news'));
        } catch (\Exception $e) {
            return redirect()->route('news.index')->with('error', 'Berita tidak ditemukan.');
        }
    }

    /**
     * Menampilkan form edit berita.
     */
    public function edit($id)
    {
        try {
            $news = News::findOrFail($id);
            return view('backend.news.edit', compact('news'));
        } catch (\Exception $e) {
            return redirect()->route('news.index')->with('error', 'Berita tidak ditemukan. ' . $e->getMessage());
        }
    }

    /**
     * Memperbarui berita.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
        ]);

        try {
            $news = News::findOrFail($id);
            $news->title = $validatedData['title'];
            $news->description = $validatedData['description'];

            if ($request->hasFile('image')) {
                if ($news->image && Storage::exists($news->image)) {
                    Storage::delete($news->image);
                }
                $news->image = $request->file('image')->store('public/news');
            }

            $news->save();

            return redirect()->route('news.index')->with('success', 'Data Berita berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('news.edit', $id)->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus berita.
     */
    public function destroy($id)
    {
        try {
            $news = News::findOrFail($id);

            if ($news->image && Storage::exists($news->image)) {
                Storage::delete($news->image);
            }

            $news->delete();

            return redirect()->route('news.index')->with('success', 'Data Berita berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('news.index')->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
