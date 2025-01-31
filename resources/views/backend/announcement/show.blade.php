@extends('layouts.start')
@section('title', 'Detail Pengumuman')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('announcement.index') }}">Pengumuman</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-announcementpaper me-1"></i>
                    {{ $announcement->title }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ Storage::url($announcement->image) }}" alt="gambar berita" class="img-fluid rounded">
                        </div>
                        <div class="col-md-8">
                            <h3>{{ $announcement->title }}</h3>
                            <p><strong>Tanggal:</strong> {{ $announcement->status_date }}</p>
                            <p>{{ $announcement->description }}</p>
                            <a href="{{ route('announcement.index') }}" class="btn btn-secondary">Kembali ke Pengumuman</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
