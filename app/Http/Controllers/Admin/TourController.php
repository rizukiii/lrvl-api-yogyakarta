<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class TourController extends Controller
{
    /**
     * Menampilkan daftar tour.
     */
    public function index()
    {
        try {
            $tours = Tour::latest()->get(); // Mengambil data tour terbaru
            return view('backend.tour.index', compact('tours'));
        } catch (Exception $e) {
            return redirect()->route('tour.index')->with('error', 'Terjadi kesalahan saat memuat data: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan form untuk menambah tour.
     */
    public function create()
    {
        return view('backend.tour.create');
    }

    /**
     * Menyimpan data tour baru ke database.
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
            $imagePath = $request->file('image')->store('tour','public');
            $validatedData['image'] = $imagePath;

            // Menyimpan data tour baru
            Tour::create($validatedData);

            return redirect()->route('tour.index')->with('success', 'Tour berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->route('tour.create')->with('error', 'Terjadi kesalahan saat menambahkan tour: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan detail tour berdasarkan ID.
     */
    public function show($id)
    {
        try {
            $tour = Tour::findOrFail($id); // Mencari data berdasarkan ID
            return view('backend.tour.show', compact('tour'));
        } catch (Exception $e) {
            return redirect()->route('tour.index')->with('error', 'Tour tidak ditemukan.' . $e->getMessage());
        }
    }

    /**
     * Menampilkan form untuk mengedit data tour.
     */
    public function edit($id)
    {
        try {
            $tour = Tour::findOrFail($id); // Mencari data berdasarkan ID
            return view('backend.tour.edit', compact('tour'));
        } catch (Exception $e) {
            return redirect()->route('tour.index')->with('error', 'Tour tidak ditemukan.' . $e->getMessage());
        }
    }

    /**
     * Memperbarui data tour di database.
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
            $tour = Tour::findOrFail($id); // Mencari data berdasarkan ID

            // Memeriksa apakah ada gambar baru yang di-upload
            if ($request->hasFile('image')) {
                // Menghapus gambar lama jika ada
                if ($tour->image && Storage::exists($tour->image)) {
                    Storage::delete($tour->image);
                }
                // Menyimpan gambar baru
                $imagePath = $request->file('image')->store('tour','public');
                $validatedData['image'] = $imagePath;
            }

            // Memperbarui data tour
            $tour->update($validatedData);

            return redirect()->route('tour.index')->with('success', 'Data Tour berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->route('tour.edit', $id)->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus data tour.
     */
    public function destroy($id)
    {
        try {
            $tour = Tour::findOrFail($id); // Mencari data berdasarkan ID

            // Menghapus gambar jika ada
            if ($tour->image && Storage::exists($tour->image)) {
                Storage::delete($tour->image);
            }

            // Menghapus data tour
            $tour->delete();

            return redirect()->route('tour.index')->with('success', 'Tour berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('tour.index')->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
