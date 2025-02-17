<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JsonResponses;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends Controller
{
    public function fetchAll()
    {
        $abouts = About::all();

        return new JsonResponses(Response::HTTP_OK, 'Semua Data Akomodasi Berhasil Di Dapatkan!', $abouts);
    }
}
