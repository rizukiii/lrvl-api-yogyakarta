<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JsonResponses;
use App\Models\Emergency_Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Component\HttpFoundation\Response;

class EmergencyNumberController extends Controller
{
    public function index()
    {
        try {
            $emergency_number = Emergency_Number::latest()->get();

            return new JsonResponses(Response::HTTP_OK, "Semua data Nomor Darurat berhasil didapatkan!", $emergency_number);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, 'Ada kesalahan!', $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $emergency_number = Emergency_Number::findOrFail($id);

            return new JsonResponses(Response::HTTP_OK, "Satu data Nomor Darurat berhasil di dapatkan!", $emergency_number);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, 'Ada kesalahan!', $e->getMessage());
        }
    }
}
