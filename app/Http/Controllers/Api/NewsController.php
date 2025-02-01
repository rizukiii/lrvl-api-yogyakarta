<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JsonResponses;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{
    public function fetchAll()
    {
        $news = News::all();

        $news->transform(function ($item) {
            $item->image = url('/') . Storage::url($item->image);
            return $item;
        });

        return new JsonResponses(Response::HTTP_OK, 'Semua Data Berita Berhasil Di Dapatkan!', $news);
    }

    public function fetchSingle($id)
    {
        $news = News::findOrFail($id);

        $news->image = url('/') . Storage::url($news->image);

        return new JsonResponses(Response::HTTP_OK, 'Satu Data Berita Berhasil Di Dapatkan!', $news);
    }
}
