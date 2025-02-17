<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Emergency_Number;
use Illuminate\Http\Request;

class EmergencyNumberController extends Controller
{
    /**
     * Menampilkan daftar nomor darurat.
     */
    public function index()
    {
        $numbers = Emergency_Number::latest()->get();
        return view('backend.emergency_number.index', compact('numbers'));
    }

    /**
     * Menampilkan form tambah nomor darurat.
     */
    public function create()
    {
        return view('backend.emergency_number.create');
    }

    /**
     * Menyimpan nomor darurat baru.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'    => 'required|string|max:255',
            'number' => 'required|string|max:20'
        ]);

        try {
            Emergency_Number::create($validatedData);
            return redirect()->route('emergency.index')->with('success', 'Nomor darurat berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('emergency.create')->with('error', 'Gagal menambahkan nomor darurat. ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan form edit nomor darurat.
     */
    public function edit($id)
    {
        $number = Emergency_Number::findOrFail($id);
        return view('backend.emergency_number.edit', compact('number'));
    }

    /**
     * Memperbarui nomor darurat.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'    => 'required|string|max:255',
            'number' => 'required|string|max:20'
        ]);

        $number = Emergency_Number::findOrFail($id);

        try {
            $number->update($validatedData);
            return redirect()->route('emergency.index')->with('success', 'Nomor darurat berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('emergency.edit', $id)->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus nomor darurat.
     */
    public function destroy($id)
    {
        $number = Emergency_Number::findOrFail($id);

        try {
            $number->delete();
            return redirect()->route('emergency.index')->with('success', 'Nomor darurat berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('emergency.index')->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }

    public function show($id){

        $number = Emergency_Number::findOrFail($id);

        return view('backend.emergency_number.show',compact('number'));
    }
}
