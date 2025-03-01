<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JsonResponses;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class StationController extends Controller
{
    public function index()
    {
        try {
            $station = Station::latest()->get();

            $station->transform(function ($item) {
                $item->image = url('/') . Storage::url($item->image);
                return $item;
            });

            return new JsonResponses(Response::HTTP_OK, "Semua Data Stasiun berhasil didapatkan!", $station);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, "Ada kesalahan!", $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $station = Station::findOrFail($id);

            $station->image = url('/') . Storage::url($station->image);

            return new JsonResponses(Response::HTTP_OK, "Satu Data Stasiun berhasil didapatkan!", $station);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, "Ada kesalahan!", $e->getMessage());
        }
    }
}
