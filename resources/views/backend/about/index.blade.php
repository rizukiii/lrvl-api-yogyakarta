@extends('layouts.start')
@section('title', 'Tentang Kami')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tentang Kami</li>
        </ol>
        @include('backend.partials.alert')
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <i class="fas fa-info-circle me-1"></i>
                Data Tentang Kami
                <a href="{{ route('about.edit', $about->id ) }}" class="btn btn-warning btn-sm ms-auto text-light">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </div>
            <div class="card-body">
                @if ($about)
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <strong>Judul:</strong>
                                <p>{{ $about->title ?? 'Tidak ada data.' }}</p>
                            </div>
                            <div class="mb-3">
                                <strong>Deskripsi:</strong>
                                <p>{{ $about->description ?? 'Tidak ada data.' }}</p>
                            </div>
                            <div class="mb-3">
                                <strong>Alamat:</strong>
                                <p>{{ $about->address ?? 'Tidak ada data.' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <strong>Email:</strong>
                                <p>{{ $about->email ?? 'Tidak ada data.' }}</p>
                            </div>
                            <div class="mb-3">
                                <strong>Telp:</strong>
                                <p>{{ $about->telp ?? 'Tidak ada data.' }}</p>
                            </div>
                            <div class="mb-3">
                                <strong>Versi:</strong>
                                <p>{{ $about->version ?? 'Tidak ada data.' }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <p class="text-center text-danger">Data Tentang Kami belum tersedia.</p>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
