<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JsonResponses;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{
    /**
     * Menampilkan daftar berita (GET /api/news)
     */
    public function index()
    {
        $news = News::latest()->get();

        $news->transform(function ($item) {
            $item->image = url('/') . Storage::url($item->image);
            return $item;
        });

        return new JsonResponses(Response::HTTP_OK, "Semua data berhasil di dapatkan!", $news);
    }

    /**
     * Menyimpan berita baru (POST /api/news)
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image',
            'author'      => 'nullable|string|max:100'
        ]);

        $news = new News();
        $news->title = $validatedData['title'];
        $news->description = $validatedData['description'];
        $news->author = $validatedData['author'];

        if ($request->hasFile('image')) {
            $news->image = $request->file('image')->store('news', 'public');
        }

        $news->save();

        return new JsonResponses(Response::HTTP_CREATED, "Data berhasil di tambahkan!", $news);
    }

    /**
     * Menampilkan detail berita (GET /api/news/{id})
     */
    public function show($id)
    {
        $news = News::find($id);

        $news->image = url('/') . Storage::url($news->image);

        return new JsonResponses(Response::HTTP_OK, "Satu data berhasil di dapatkan!", $news);
    }

    /**
     * Memperbarui berita (PUT/PATCH /api/news/{id})
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        Validator::make($request->all(), [
            'title'       => 'required|string',
            'description' => 'required|string',
            'image'       => 'nullable|image',
            'author'      => 'nullable|string'
        ]);

        // Cari berita berdasarkan ID
        $news = News::find($id);

        // Update data berita
        $news->title = $request->title;
        $news->description = $request->description;
        $news->author = $request->author ?? $news->author; // Jika author tidak dikirim, gunakan yang lama

        // Jika ada file gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($news->image && Storage::exists($news->image)) {
                Storage::delete($news->image);
            }
            // Simpan gambar baru
            $news->image = $request->file('image')->store('news', 'public');
        }

        $news->save();

        return new JsonResponses(Response::HTTP_OK, "Data berhasil di perbarui!", $news);
    }


    /**
     * Menghapus berita (DELETE /api/news/{id})
     */
    public function destroy($id)
    {
        $news = News::find($id);

        if ($news->image && Storage::exists($news->image)) {
            Storage::delete($news->image);
        }

        $news->delete();

        return new JsonResponses(Response::HTTP_OK,"Data berhasil dihapus!",null);
    }
}
