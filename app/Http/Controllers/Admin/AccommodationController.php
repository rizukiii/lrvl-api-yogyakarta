<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class AccommodationController extends Controller
{
    /**
     * Menampilkan daftar akomodasi.
     */
    public function index()
    {
        try {
            $accommodation = Accommodation::latest()->get(); // Mengambil data akomodasi terbaru
            return view('backend.accommodation.index', compact('accommodation'));
        } catch (Exception $e) {
            return redirect()->route('accommodation.index')->with('error', 'Terjadi kesalahan saat memuat data: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan form untuk menambah akomodasi.
     */
    public function create()
    {
        return view('backend.accommodation.create');
    }

    /**
     * Menyimpan data akomodasi baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'star' => 'required|integer',
            'address' => 'required|string',
            'telp' => 'nullable|string',
            'instagram' => 'nullable|string',
            'website' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        try {
            // Menyimpan gambar yang di-upload
            $imagePath = $request->file('image')->store('public/accommodation');
            $validatedData['image'] = $imagePath;

            // Menyimpan data akomodasi baru
            Accommodation::create($validatedData);

            return redirect()->route('accommodation.index')->with('success', 'Akomodasi berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->route('accommodation.create')->with('error', 'Terjadi kesalahan saat menambahkan akomodasi: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan detail akomodasi berdasarkan ID.
     */
    public function show($id)
    {
        try {
            $accommodation = Accommodation::findOrFail($id); // Mencari data berdasarkan ID
            return view('backend.accommodation.show', compact('accommodation'));
        } catch (Exception $e) {
            return redirect()->route('accommodation.index')->with('error', 'Akomodasi tidak ditemukan.' . $e->getMessage());
        }
    }

    /**
     * Menampilkan form untuk mengedit data akomodasi.
     */
    public function edit($id)
    {
        try {
            $accommodation = Accommodation::findOrFail($id); // Mencari data berdasarkan ID
            return view('backend.accommodation.edit', compact('accommodation'));
        } catch (Exception $e) {
            return redirect()->route('accommodation.index')->with('error', 'Akomodasi tidak ditemukan.' . $e->getMessage());
        }
    }

    /**
     * Memperbarui data akomodasi di database.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|image',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'star' => 'required|integer',
            'address' => 'required|string',
            'telp' => 'nullable|string',
            'instagram' => 'nullable|string',
            'website' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        try {
            $accommodation = Accommodation::findOrFail($id); // Mencari data berdasarkan ID

            // Memeriksa apakah ada gambar baru yang di-upload
            if ($request->hasFile('image')) {
                // Menghapus gambar lama jika ada
                if ($accommodation->image && Storage::exists($accommodation->image)) {
                    Storage::delete($accommodation->image);
                }
                // Menyimpan gambar baru
                $imagePath = $request->file('image')->store('public/accommodation');
                $validatedData['image'] = $imagePath;
            }

            // Memperbarui data akomodasi
            $accommodation->update($validatedData);

            return redirect()->route('accommodation.index')->with('success', 'Data Akomodasi berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->route('accommodation.edit', $id)->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus data akomodasi.
     */
    public function destroy($id)
    {
        try {
            $accommodation = Accommodation::findOrFail($id); // Mencari data berdasarkan ID

            // Menghapus gambar jika ada
            if ($accommodation->image && Storage::exists($accommodation->image)) {
                Storage::delete($accommodation->image);
            }

            // Menghapus data akomodasi
            $accommodation->delete();

            return redirect()->route('accommodation.index')->with('success', 'Akomodasi berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('accommodation.index')->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
