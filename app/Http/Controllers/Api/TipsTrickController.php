<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JsonResponses;
use Illuminate\Http\Request;
use App\Models\Tips_Trick;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class TipsTrickController extends Controller
{
    // ✅ GET ALL TIPS & TRICK
    public function index()
    {
        try {
            $tipsTricks = Tips_Trick::latest()->get();

            $tipsTricks->transform(function ($item) {
                if ($item->image) {
                    $item->image = url('/') . Storage::url($item->image);
                }
                return $item;
            });

            return new JsonResponses(Response::HTTP_OK, "Semua Data Tips & Trik berhasil didapatkan!", $tipsTricks);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, "Ada kesalahan!", $e->getMessage());
        }
    }

    // ✅ GET SINGLE TIPS & TRICK
    public function show($id)
    {
        try {
            $tipsTrick = Tips_Trick::findOrFail($id);

            if ($tipsTrick->image) {
                $tipsTrick->image = url('/') . Storage::url($tipsTrick->image);
            }

            return new JsonResponses(Response::HTTP_OK, "Satu Data Tips & Trik berhasil didapatkan!", $tipsTrick);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, "Ada kesalahan!", $e->getMessage());
        }
    }

    // ✅ CREATE NEW TIPS & TRICK
    public function store(Request $request)
    {
        try {
            $request->validate([
                'image' => 'nullable|image',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'author' => 'nullable|string|max:255',
            ]);

            // Handle upload image
            $imagePath = $request->hasFile('image') ? $request->file('image')->store('tips_trick', 'public') : null;

            $tipsTrick = Tips_Trick::create([
                'image' => $imagePath,
                'title' => $request->title,
                'description' => $request->description,
                'author' => $request->author ?? "admin",
            ]);

            return new JsonResponses(Response::HTTP_CREATED, "Data Tips & Trik berhasil ditambahkan!", $tipsTrick);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, "Ada kesalahan!", $e->getMessage());
        }
    }

    // ✅ UPDATE TIPS & TRICK
    public function update(Request $request, $id)
    {
        try {
            $tipsTrick = Tips_Trick::findOrFail($id);

            $request->validate([
                'image' => 'nullable|image',
                'title' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'author' => 'nullable|string|max:255',
            ]);

            // Handle upload image baru
            if ($request->hasFile('image')) {
                if (!empty($tipsTrick->image)) {
                    Storage::disk('public')->delete($tipsTrick->image);
                }
                $tipsTrick->image = $request->file('image')->store('tips_trick', 'public');
            }

            $tipsTrick->title = $request->title ?? $tipsTrick->title;
            $tipsTrick->description = $request->description ?? $tipsTrick->description;
            $tipsTrick->author = $request->author ?? $tipsTrick->author;
            $tipsTrick->save();

            return new JsonResponses(Response::HTTP_OK, "Data Tips & Trik berhasil diperbarui!", $tipsTrick);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, "Ada kesalahan!", $e->getMessage());
        }
    }

    // ✅ DELETE TIPS & TRICK
    public function destroy($id)
    {
        try {
            $tipsTrick = Tips_Trick::findOrFail($id);

            if (!empty($tipsTrick->image)) {
                Storage::disk('public')->delete($tipsTrick->image);
            }

            $tipsTrick->delete();

            return new JsonResponses(Response::HTTP_OK, "Data Tips & Trik berhasil dihapus!", null);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, "Ada kesalahan!", $e->getMessage());
        }
    }
}
