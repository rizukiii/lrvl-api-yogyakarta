<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Terminal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TerminalController extends Controller
{
    /**
     * Menampilkan daftar terminal.
     */
    public function index()
    {
        try {
            $terminals = Terminal::latest()->get(); // Mengambil data terminal terbaru
            return view('backend.terminal.index', compact('terminals'));
        } catch (\Exception $e) {
            return redirect()->route('terminal.index')->with('error', 'Terjadi kesalahan saat memuat data: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan form untuk menambah terminal.
     */
    public function create()
    {
        return view('backend.terminal.create');
    }

    /**
     * Menyimpan data terminal baru ke database.
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
            $imagePath = $request->file('image')->store('public/terminal');
            $validatedData['image'] = $imagePath;

            // Menyimpan data terminal baru
            Terminal::create($validatedData);

            return redirect()->route('terminal.index')->with('success', 'Terminal berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('terminal.create')->with('error', 'Terjadi kesalahan saat menambahkan terminal: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan detail terminal berdasarkan ID.
     */
    public function show($id)
    {
        try {
            $terminal = Terminal::findOrFail($id); // Mencari data berdasarkan ID
            return view('backend.terminal.show', compact('terminal'));
        } catch (\Exception $e) {
            return redirect()->route('terminal.index')->with('error', 'Terminal tidak ditemukan.' . $e->getMessage());
        }
    }

    /**
     * Menampilkan form untuk mengedit data terminal.
     */
    public function edit($id)
    {
        try {
            $terminal = Terminal::findOrFail($id); // Mencari data berdasarkan ID
            return view('backend.terminal.edit', compact('terminal'));
        } catch (\Exception $e) {
            return redirect()->route('terminal.index')->with('error', 'Terminal tidak ditemukan.' . $e->getMessage());
        }
    }

    /**
     * Memperbarui data terminal di database.
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
            $terminal = Terminal::findOrFail($id); // Mencari data berdasarkan ID

            // Memeriksa apakah ada gambar baru yang di-upload
            if ($request->hasFile('image')) {
                // Menghapus gambar lama jika ada
                if ($terminal->image && Storage::exists($terminal->image)) {
                    Storage::delete($terminal->image);
                }
                // Menyimpan gambar baru
                $imagePath = $request->file('image')->store('public/terminal');
                $validatedData['image'] = $imagePath;
            }

            // Memperbarui data terminal
            $terminal->update($validatedData);

            return redirect()->route('terminal.index')->with('success', 'Data Terminal berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('terminal.edit', $id)->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus data terminal.
     */
    public function destroy($id)
    {
        try {
            $terminal = Terminal::findOrFail($id); // Mencari data berdasarkan ID

            // Menghapus gambar jika ada
            if ($terminal->image && Storage::exists($terminal->image)) {
                Storage::delete($terminal->image);
            }

            // Menghapus data terminal
            $terminal->delete();

            return redirect()->route('terminal.index')->with('success', 'Terminal berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('terminal.index')->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
