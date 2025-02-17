@extends('layouts.start')
@section('title', 'Detail Berita')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Berita</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Berita</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-newspaper me-1"></i> Detail Berita
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Bagian Gambar -->
                    <div class="col-md-4">
                        @if($news->image)
                            <img src="{{ Storage::url($news->image) }}" alt="Gambar Berita" class="img-fluid rounded shadow-sm" style="max-height: 250px;">
                        @else
                            <p class="text-muted">Tidak ada gambar tersedia.</p>
                        @endif
                    </div>

                    <!-- Bagian Informasi -->
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tr>
                                <th>Judul</th>
                                <td>{{ $news->title ?? 'Tidak ada data.' }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>{{ $news->status_date ?? 'Tidak ada data.' }}</td>
                            </tr>
                            <tr>
                                <th>Penulis</th>
                                <td>{{ $news->author ?? 'Admin' }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $news->description ?? 'Tidak ada deskripsi.' }}</td>
                            </tr>
                        </table>

                        <div class="mt-3 text-end">
                            <a href="{{ route('news.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali ke Berita
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
