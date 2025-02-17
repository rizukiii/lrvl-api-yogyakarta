<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JsonResponses;
use App\Models\Emergency_Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class EmergencyNumberController extends Controller
{
    public function index()
    {
        $emergency_number = Emergency_Number::latest()->get();

        return new JsonResponses(Response::HTTP_OK, "Semua data berhasil didapatkan!", $emergency_number);
    }

    public function show($id)
    {
        $emergency_number = Emergency_Number::findOrFail($id);

        return new JsonResponses(Response::HTTP_OK, "Satu data berhasildi dapatkan!", $emergency_number);
    }
}
