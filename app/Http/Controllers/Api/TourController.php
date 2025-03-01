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
        try {
            $tours = Tour::latest()->get();

            // Transformasi data dengan memperbaiki URL gambar
            $tours->transform(function ($item) {
                $item->image = $item->image ? url('/') . Storage::url($item->image) : null;
                return $item;
            });

            return new JsonResponses(Response::HTTP_OK, "Semua Data Tour berhasil didapatkan!", $tours);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, "Ada kesalahan!", $e->getMessage());
        }
    }

    /**
     * Menampilkan satu data wisata berdasarkan ID.
     */
    public function show($id)
    {
        try {
            $tour = Tour::findOrFail($id);

            // Periksa jika gambar ada, jika tidak, biarkan null
            $tour->image = $tour->image ? url('/') . Storage::url($tour->image) : null;

            return new JsonResponses(Response::HTTP_OK, "Satu Data Tour berhasil didapatkan!", $tour);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, "Ada kesalahan!", $e->getMessage());
        }
    }
}
