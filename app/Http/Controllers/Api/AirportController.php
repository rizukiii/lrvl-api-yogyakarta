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
        $airport = Airport::latest()->get();

        $airport->transform(function ($item) {
            $item->image = url('/') . Storage::url($item->image);
            return $item;
        });

        return new JsonResponses(Response::HTTP_OK, "Semua data berhasil didapatkan!", $airport);
    }

    public function show($id)
    {
        $airport = Airport::findOrFail($id);

        $airport->image = url('/') . Storage::url($airport->image);

        return new JsonResponses(Response::HTTP_OK, "Satu data berhasildi dapatkan!", $airport);
    }
}
