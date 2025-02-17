<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StationController extends Controller
{
    /**
     * Menampilkan daftar station.
     */
    public function index()
    {
        try {
            $stations = Station::latest()->get(); // Mengambil data station terbaru
            return view('backend.station.index', compact('stations'));
        } catch (\Exception $e) {
            return redirect()->route('station.index')->with('error', 'Terjadi kesalahan saat memuat data: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan form untuk menambah station.
     */
    public function create()
    {
        return view('backend.station.create');
    }

    /**
     * Menyimpan data station baru ke database.
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
                $imagePath = $request->file('image')->store('public/station');
                $validatedData['image'] = $imagePath;
            }

            // Menyimpan data station baru
            Station::create($validatedData);

            return redirect()->route('station.index')->with('success', 'Station berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('station.create')->with('error', 'Terjadi kesalahan saat menambahkan station: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan detail station berdasarkan ID.
     */
    public function show($id)
    {
        try {
            $station = Station::findOrFail($id); // Mencari data berdasarkan ID
            return view('backend.station.show', compact('station'));
        } catch (\Exception $e) {
            return redirect()->route('station.index')->with('error', 'Station tidak ditemukan.' . $e->getMessage());
        }
    }

    /**
     * Menampilkan form untuk mengedit data station.
     */
    public function edit($id)
    {
        try {
            $station = Station::findOrFail($id); // Mencari data berdasarkan ID
            return view('backend.station.edit', compact('station'));
        } catch (\Exception $e) {
            return redirect()->route('station.index')->with('error', 'Station tidak ditemukan.' . $e->getMessage());
        }
    }

    /**
     * Memperbarui data station di database.
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
            $station = Station::findOrFail($id); // Mencari data berdasarkan ID

            // Memeriksa apakah ada gambar baru yang di-upload
            if ($request->hasFile('image')) {
                // Menghapus gambar lama jika ada
                if ($station->image && Storage::exists($station->image)) {
                    Storage::delete($station->image);
                }
                // Menyimpan gambar baru
                $imagePath = $request->file('image')->store('public/station');
                $validatedData['image'] = $imagePath;
            }

            // Memperbarui data station
            $station->update($validatedData);

            return redirect()->route('station.index')->with('success', 'Data Station berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('station.edit', $id)->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus data station.
     */
    public function destroy($id)
    {
        try {
            $station = Station::findOrFail($id); // Mencari data berdasarkan ID

            // Menghapus gambar jika ada
            if ($station->image && Storage::exists($station->image)) {
                Storage::delete($station->image);
            }

            // Menghapus data station
            $station->delete();

            return redirect()->route('station.index')->with('success', 'Station berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('station.index')->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
