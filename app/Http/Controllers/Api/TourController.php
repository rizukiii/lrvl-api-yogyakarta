<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JsonResponses;
use App\Models\Tour;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class TourController extends Controller
{
    /**
     * Menampilkan semua data wisata.
     */
    public function index()
    {
        $tours = Tour::latest()->get();

        if ($tours->isEmpty()) {
            return new JsonResponses(Response::HTTP_OK, "Tidak ada data wisata yang tersedia!", []);
        }

        // Transformasi data dengan memperbaiki URL gambar
        $tours->transform(function ($item) {
            $item->image = $item->image ? url('/') . Storage::url($item->image) : null;
            return $item;
        });

        return new JsonResponses(Response::HTTP_OK, "Semua data berhasil didapatkan!", $tours);
    }

    /**
     * Menampilkan satu data wisata berdasarkan ID.
     */
    public function show($id)
    {
        $tour = Tour::findOrFail($id);

        // Periksa jika gambar ada, jika tidak, biarkan null
        $tour->image = $tour->image ? url('/') . Storage::url($tour->image) : null;

        return new JsonResponses(Response::HTTP_OK, "Satu data berhasil didapatkan!", $tour);
    }
}
