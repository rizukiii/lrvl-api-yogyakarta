<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JsonResponses;
use App\Models\Airport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AirportController extends Controller
{
    public function index()
    {
        try {
            $airport = Airport::latest()->get();

            $airport->transform(function ($item) {
                $item->image = url('/') . Storage::url($item->image);
                return $item;
            });

            return new JsonResponses(Response::HTTP_OK, "Semua Data Airport Berhasil didapatkan!", $airport);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, 'Ada kesalahan!', $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $airport = Airport::findOrFail($id);

            $airport->image = url('/') . Storage::url($airport->image);

            return new JsonResponses(Response::HTTP_OK, "Satu Data Berhasil didapatkan!", $airport);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, 'Ada kesalahan!', $e->getMessage());
        }
    }
}
