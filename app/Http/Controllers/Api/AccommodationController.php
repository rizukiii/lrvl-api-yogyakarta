<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JsonResponses;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AccommodationController extends Controller
{
    /**
     * Menampilkan semua data Akomodasi
     */
    public function fetchAll()
    {
        try {
            $accommodations = Accommodation::all();

            $accommodations->transform(function ($item) {
                $item->image = url('/') . Storage::url($item->image);
                return $item;
            });

            return new JsonResponses(Response::HTTP_OK, 'Semua Data Akomodasi Berhasil Di Dapatkan!', $accommodations);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, 'Ada kesalahan!', $e->getMessage());
        }
    }

    /**
     * Menampilkan data Akomodasi berdasarkan ID
     */
    public function fetchSingle($id)
    {
        try {
            $accommodation = Accommodation::findOrFail($id);

            $accommodation->image = url('/') . Storage::url($accommodation->image);

            return new JsonResponses(Response::HTTP_OK, 'Satu Data Akomodasi Berhasil Di Dapatkan!', $accommodation);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, 'Ada kesalahan!', $e->getMessage());
        }
    }
}
