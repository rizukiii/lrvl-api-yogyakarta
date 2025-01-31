<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    /**
     * Menampilkan daftar berita.
     */
    public function index()
    {
        $announcement = Announcement::latest()->get(); // Urutkan dari berita terbaru
        return view('backend.announcement.index', compact('announcement'));
    }

    /**
     * Menampilkan form tambah berita.
     */
    public function create()
    {
        return view('backend.announcement.create');
    }

    /**
     * Menyimpan berita baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
        ]);

        try {
            $announcement = new Announcement();
            $announcement->title = $validatedData['title'];
            $announcement->description = $validatedData['description'];

            if ($request->hasFile('image')) {
                $announcement->image = $request->file('image')->store('public/announcement');
            }

            $announcement->save();

            return redirect()->route('announcement.index')->with('success', 'Announcement created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('announcement.create')->with('error', 'Failed to create announcement. ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan berita berdasarkan ID.
     */
    public function show($id)
    {
        try {
            $announcement = Announcement::findOrFail($id);
            return view('backend.announcement.show', compact('announcement'));
        } catch (\Exception $e) {
            return redirect()->route('announcement.index')->with('error', 'Announcement not found.');
        }
    }

    /**
     * Menampilkan form edit berita.
     */
    public function edit($id)
    {
        try {
            $announcement = Announcement::findOrFail($id);
            return view('backend.announcement.edit', compact('announcement'));
        } catch (\Exception $e) {
            return redirect()->route('announcement.index')->with('error', 'Announcement not found.');
        }
    }

    /**
     * Memperbarui berita.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
        ]);

        try {
            $announcement = Announcement::findOrFail($id);
            $announcement->title = $validatedData['title'];
            $announcement->description = $validatedData['description'];

            if ($request->hasFile('image')) {
                if ($announcement->image && Storage::exists($announcement->image)) {
                    Storage::delete($announcement->image);
                }
                $announcement->image = $request->file('image')->store('public/announcement');
            }

            $announcement->save();

            return redirect()->route('announcement.index')->with('success', 'Announcement updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('announcement.edit', $id)->with('error', 'Failed to update announcement.');
        }
    }

    /**
     * Menghapus berita.
     */
    public function destroy($id)
    {
        try {
            $announcement = Announcement::findOrFail($id);

            if ($announcement->image && Storage::exists($announcement->image)) {
                Storage::delete($announcement->image);
            }

            $announcement->delete();

            return redirect()->route('announcement.index')->with('success', 'Announcement successfully deleted.');
        } catch (\Exception $e) {
            return redirect()->route('announcement.index')->with('error', 'Failed to delete announcement.');
        }
    }
}
