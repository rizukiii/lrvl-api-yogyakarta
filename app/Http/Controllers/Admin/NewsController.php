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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        try {
            $news = new News();
            $news->title = $validatedData['title'];
            $news->description = $validatedData['description'];

            if ($request->hasFile('image')) {
                $news->image = $request->file('image')->store('public/news');
            }

            $news->save();

            return redirect()->route('news.index')->with('success', 'News created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('news.create')->with('error', 'Failed to create news. ' . $e->getMessage());
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
            return redirect()->route('news.index')->with('error', 'News not found.');
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
            return redirect()->route('news.index')->with('error', 'News not found.');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
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

            return redirect()->route('news.index')->with('success', 'News updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('news.edit', $id)->with('error', 'Failed to update news.');
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

            return redirect()->route('news.index')->with('success', 'News successfully deleted.');
        } catch (\Exception $e) {
            return redirect()->route('news.index')->with('error', 'Failed to delete news.');
        }
    }
}
