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
        try {
            $announcements = Announcement::all();

            $announcements->transform(function ($item) {
                $item->image = url('/') . Storage::url($item->image);
                return $item;
            });

            return new JsonResponses(Response::HTTP_OK, 'Semua Data Pengumuman Berhasil Di Dapatkan!', $announcements);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, 'Ada kesalahan!', $e->getMessage());
        }
    }

    public function fetchSingle($id)
    {
        try {
            $announcement = Announcement::findOrFail($id);

            $announcement->image = url('/') . Storage::url($announcement->image);

            return new JsonResponses(Response::HTTP_OK, 'Satu Data Pengumuman Berhasil Di Dapatkan!', $announcement);
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, 'Ada kesalahan!', $e->getMessage());
        }
    }
}
