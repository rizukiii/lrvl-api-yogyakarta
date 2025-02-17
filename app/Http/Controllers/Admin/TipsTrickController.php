<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tips_Trick;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TipsTrickController extends Controller
{
    /**
     * Menampilkan daftar Tips & Trick.
     */
    public function index()
    {
        $tips_tricks = Tips_Trick::latest()->get();
        return view('backend.tips_trick.index', compact('tips_tricks'));
    }

    /**
     * Menampilkan form tambah Tips & Trick.
     */
    public function create()
    {
        return view('backend.tips_trick.create');
    }

    /**
     * Menyimpan Tips & Trick baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image',
        ]);

        try {
            $tips = new Tips_Trick();
            $tips->title = $validatedData['title'];
            $tips->description = $validatedData['description'];
            $tips->author = 'admin';

            if ($request->hasFile('image')) {
                $tips->image = $request->file('image')->store('public/tips_trick');
            }

            $tips->save();

            return redirect()->route('tips_trick.index')->with('success', 'Tips & Trick berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->route('tips_trick.create')->with('error', 'Gagal membuat Tips & Trick: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan detail Tips & Trick berdasarkan ID.
     */
    public function show($id)
    {
        $tips_trick = Tips_Trick::findOrFail($id);
        return view('backend.tips_trick.show', compact('tips_trick'));
    }

    /**
     * Menampilkan form edit Tips & Trick.
     */
    public function edit($id)
    {
        $tips_trick = Tips_Trick::findOrFail($id);
        return view('backend.tips_trick.edit', compact('tips_trick'));
    }

    /**
     * Memperbarui Tips & Trick.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image',
        ]);

        try {
            $tips = Tips_Trick::findOrFail($id);
            $tips->title = $validatedData['title'];
            $tips->description = $validatedData['description'];

            if ($request->hasFile('image')) {
                if ($tips->image && Storage::exists($tips->image)) {
                    Storage::delete($tips->image);
                }
                $tips->image = $request->file('image')->store('public/tips_trick');
            }

            $tips->save();

            return redirect()->route('tips_trick.index')->with('success', 'Tips & Trick berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('tips_trick.edit', $id)->with('error', 'Gagal memperbarui Tips & Trick: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus Tips & Trick.
     */
    public function destroy($id)
    {
        try {
            $tips = Tips_Trick::findOrFail($id);

            if ($tips->image && Storage::exists($tips->image)) {
                Storage::delete($tips->image);
            }

            $tips->delete();

            return redirect()->route('tips_trick.index')->with('success', 'Tips & Trick berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('tips_trick.index')->with('error', 'Gagal menghapus Tips & Trick: ' . $e->getMessage());
        }
    }
}
