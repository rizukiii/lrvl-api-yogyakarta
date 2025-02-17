<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data pertama Tentang Kami, jika ada
        $about = About::first();

        // Jika tidak ada data, buat data baru
        if (!$about) {
            $about = new About([
                'title' => 'Default Title',  // Judul default
                'description' => 'Default Description',  // Deskripsi default
                'address' => 'Default Address',  // Alamat default
                'email' => 'default@email.com',  // Email default
                'telp' => '1234567890',  // Telepon default
                'version' => '1.0',  // Versi default
            ]);
            $about->save(); // Simpan data baru
        }

        // Kembalikan tampilan index dengan data 'about'
        return view('backend.about.index', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil data 'about' berdasarkan ID
        $about = About::findOrFail($id);

        // Kembalikan halaman edit dengan data 'about'
        return view('backend.about.edit', compact('about'));
    }

    /**
     * Update data Tentang Kami di database.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telp' => 'required|string',
            'version' => 'required|string|max:50',
        ]);
        
        try {
            // Temukan data 'about' berdasarkan ID
            $about = About::findOrFail($id);

            // Perbarui data 'about' dengan input yang baru
            $about->update($validated);

            // Redirect ke halaman index atau halaman lainnya dengan pesan sukses
            return redirect()->route('about.index')->with('success', 'Data Tentang Kami berhasil diperbarui.');
        } catch (\Exception $e) {
            // Tangani exception jika terjadi error, tampilkan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }
}
