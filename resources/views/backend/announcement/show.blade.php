@extends('layouts.start')

@section('title', 'Detail Pengumuman')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Pengumuman</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('announcement.index') }}">Pengumuman</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-bullhorn me-1"></i>
                {{ $announcement->title ?? 'Judul Tidak Tersedia' }}
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Judul</th>
                        <td>{{ $announcement->title ?? 'Tidak ada data.' }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ $announcement->status_date ?? 'Tidak ada data.' }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{!! nl2br(e($announcement->description)) ?? 'Tidak ada data.' !!}</td>
                    </tr>
                    <tr>
                        <th>Gambar</th>
                        <td>
                            @if ($announcement->image && Storage::exists($announcement->image))
                                <img src="{{ Storage::url($announcement->image) }}" alt="Gambar Pengumuman"
                                     class="img-fluid rounded" style="max-width: 300px;">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                    </tr>
                </table>

                <div class="mt-4">
                    <a href="{{ route('announcement.index') }}" class="btn btn-secondary">Kembali ke Pengumuman</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
