<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Culinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CulinaryController extends Controller
{
    /**
     * Menampilkan daftar culinary.
     */
    public function index()
    {
        try {
            $culinaries = Culinary::latest()->get(); // Mengambil data culinary terbaru
            return view('backend.culinary.index', compact('culinaries'));
        } catch (\Exception $e) {
            return redirect()->route('culinary.index')->with('error', 'Terjadi kesalahan saat memuat data: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan form untuk menambah culinary.
     */
    public function create()
    {
        return view('backend.culinary.create');
    }

    /**
     * Menyimpan data culinary baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'open_at' => 'required|date_format:H:i',
            'closed_at' => 'required|date_format:H:i',
            'telp' => 'nullable|string',
            'instagram' => 'nullable|string',
            'website' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        try {
            // Menyimpan gambar yang di-upload
            $imagePath = $request->file('image')->store('public/culinaries');
            $validatedData['image'] = $imagePath;

            // Menyimpan data culinary baru
            Culinary::create($validatedData);

            return redirect()->route('culinary.index')->with('success', 'Culinary berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('culinary.create')->with('error', 'Terjadi kesalahan saat menambahkan culinary: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan detail culinary berdasarkan ID.
     */
    public function show($id)
    {
        try {
            $culinary = Culinary::findOrFail($id); // Mencari data berdasarkan ID
            return view('backend.culinary.show', compact('culinary'));
        } catch (\Exception $e) {
            return redirect()->route('culinary.index')->with('error', 'Culinary tidak ditemukan.' . $e->getMessage());
        }
    }

    /**
     * Menampilkan form untuk mengedit data culinary.
     */
    public function edit($id)
    {
        try {
            $culinary = Culinary::findOrFail($id); // Mencari data berdasarkan ID
            return view('backend.culinary.edit', compact('culinary'));
        } catch (\Exception $e) {
            return redirect()->route('culinary.index')->with('error', 'Culinary tidak ditemukan.' . $e->getMessage());
        }
    }

    /**
     * Memperbarui data culinary di database.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|image',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'open_at' => 'required|date_format:H:i',
            'closed_at' => 'required|date_format:H:i',
            'telp' => 'nullable|string',
            'instagram' => 'nullable|string',
            'website' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        try {
            $culinary = Culinary::findOrFail($id); // Mencari data berdasarkan ID

            // Memeriksa apakah ada gambar baru yang di-upload
            if ($request->hasFile('image')) {
                // Menghapus gambar lama jika ada
                if ($culinary->image && Storage::exists($culinary->image)) {
                    Storage::delete($culinary->image);
                }
                // Menyimpan gambar baru
                $imagePath = $request->file('image')->store('public/culinaries');
                $validatedData['image'] = $imagePath;
            }

            // Memperbarui data culinary
            $culinary->update($validatedData);

            return redirect()->route('culinary.index')->with('success', 'Data Culinary berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('culinary.edit', $id)->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus data culinary.
     */
    public function destroy($id)
    {
        try {
            $culinary = Culinary::findOrFail($id); // Mencari data berdasarkan ID

            // Menghapus gambar jika ada
            if ($culinary->image && Storage::exists($culinary->image)) {
                Storage::delete($culinary->image);
            }

            // Menghapus data culinary
            $culinary->delete();

            return redirect()->route('culinary.index')->with('success', 'Culinary berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('culinary.index')->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
