<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JsonResponses;
use App\Models\Terminal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class TerminalController extends Controller
{
    public function index()
    {
        $terminal = Terminal::latest()->get();

        $terminal->transform(function ($item) {
            $item->image = url('/') . Storage::url($item->image);
            return $item;
        });

        return new JsonResponses(Response::HTTP_OK, "Semua data berhasil didapatkan!", $terminal);
    }

    public function show($id)
    {
        $terminal = Terminal::findOrFail($id);

        $terminal->image = url('/') . Storage::url($terminal->image);

        return new JsonResponses(Response::HTTP_OK, "Satu data berhasildi dapatkan!", $terminal);
    }
}
