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
        try {
            $culinaries = Culinary::latest()->get();

            $culinaries->transform(function ($item) {
                $item->image = url('/') . Storage::url($item->image);
                return $item;
            });

            return new JsonResponses(Response::HTTP_OK, "Semua Data Kuliner Berhasil didapatkan!", $culinaries);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, 'Ada kesalahan!', $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $culinaries = Culinary::findOrFail($id);

            $culinaries->image = url('/') . Storage::url($culinaries->image);

            return new JsonResponses(Response::HTTP_OK, "Satu Data Kuliner Berhasil didapatkan!", $culinaries);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, 'Ada kesalahan!', $e->getMessage());
        }
    }
}
