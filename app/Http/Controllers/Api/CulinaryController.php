<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JsonResponses;
use App\Models\Culinary;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class CulinaryController extends Controller
{
    public function index()
    {
        $culinaries = Culinary::latest()->get();

        $culinaries->transform(function ($item) {
            $item->image = url('/') . Storage::url($item->image);
            return $item;
        });

        return new JsonResponses(Response::HTTP_OK, "Semua data berhasil didapatkan!", $culinaries);
    }

    public function show($id)
    {
        $culinaries = Culinary::findOrFail($id);

        $culinaries->image = url('/') . Storage::url($culinaries->image);

        return new JsonResponses(Response::HTTP_OK, "Satu data berhasildi dapatkan!", $culinaries);
    }
}
