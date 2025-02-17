<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JsonResponses;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AnnouncementController extends Controller
{
    public function fetchAll()
    {
        $announcements = Announcement::all();

        $announcements->transform(function ($item) {
            $item->image = url('/') . Storage::url($item->image);
            return $item;
        });

        return new JsonResponses(Response::HTTP_OK, 'Semua Data Berita Berhasil Di Dapatkan!', $announcements);
    }

    public function fetchSingle($id)
    {
        $announcement = Announcement::findOrFail($id);

        $announcement->image = url('/') . Storage::url($announcement->image);

        return new JsonResponses(Response::HTTP_OK, 'Satu Data Berita Berhasil Di Dapatkan!', $announcement);
    }
}
