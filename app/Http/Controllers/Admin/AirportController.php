<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Airport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AirportController extends Controller
{
    /**
     * Menampilkan daftar airport.
     */
    public function index()
    {
        try {
            $airports = Airport::latest()->get(); // Mengambil data airport terbaru
            return view('backend.airport.index', compact('airports'));
        } catch (\Exception $e) {
            return redirect()->route('airport.index')->with('error', 'Terjadi kesalahan saat memuat data: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan form untuk menambah airport.
     */
    public function create()
    {
        return view('backend.airport.create');
    }

    /**
     * Menyimpan data airport baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|image',
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'open_at' => 'nullable|date_format:H:i',
            'closed_at' => 'nullable|date_format:H:i',
            'facilities' => 'nullable|string',
            'telp' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'status' => 'required|in:aktif,dalam perbaikan,tutup sementara',
        ]);

        try {
            // Menyimpan gambar yang di-upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/airport');
                $validatedData['image'] = $imagePath;
            }

            // Menyimpan data airport baru
            Airport::create($validatedData);

            return redirect()->route('airport.index')->with('success', 'Airport berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('airport.create')->with('error', 'Terjadi kesalahan saat menambahkan airport: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan detail airport berdasarkan ID.
     */
    public function show($id)
    {
        try {
            $airport = Airport::findOrFail($id); // Mencari data berdasarkan ID
            return view('backend.airport.show', compact('airport'));
        } catch (\Exception $e) {
            return redirect()->route('airport.index')->with('error', 'Airport tidak ditemukan.' . $e->getMessage());
        }
    }

    /**
     * Menampilkan form untuk mengedit data airport.
     */
    public function edit($id)
    {
        try {
            $airport = Airport::findOrFail($id); // Mencari data berdasarkan ID
            return view('backend.airport.edit', compact('airport'));
        } catch (\Exception $e) {
            return redirect()->route('airport.index')->with('error', 'Airport tidak ditemukan.' . $e->getMessage());
        }
    }

    /**
     * Memperbarui data airport di database.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|image',
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'open_at' => 'nullable|date_format:H:i',
            'closed_at' => 'nullable|date_format:H:i',
            'facilities' => 'nullable|string',
            'telp' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'status' => 'required|in:aktif,dalam perbaikan,tutup sementara',
        ]);

        try {
            $airport = Airport::findOrFail($id); // Mencari data berdasarkan ID

            // Memeriksa apakah ada gambar baru yang di-upload
            if ($request->hasFile('image')) {
                // Menghapus gambar lama jika ada
                if ($airport->image && Storage::exists($airport->image)) {
                    Storage::delete($airport->image);
                }
                // Menyimpan gambar baru
                $imagePath = $request->file('image')->store('public/airport');
                $validatedData['image'] = $imagePath;
            }

            // Memperbarui data airport
            $airport->update($validatedData);

            return redirect()->route('airport.index')->with('success', 'Data Airport berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('airport.edit', $id)->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus data airport.
     */
    public function destroy($id)
    {
        try {
            $airport = Airport::findOrFail($id); // Mencari data berdasarkan ID

            // Menghapus gambar jika ada
            if ($airport->image && Storage::exists($airport->image)) {
                Storage::delete($airport->image);
            }

            // Menghapus data airport
            $airport->delete();

            return redirect()->route('airport.index')->with('success', 'Airport berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('airport.index')->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
