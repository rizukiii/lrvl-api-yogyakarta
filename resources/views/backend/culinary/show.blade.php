@extends('layouts.start')

@section('title', 'Detail Kuliner')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Kuliner: {{ $culinary->title }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('culinary.index') }}">Kuliner</a></li>
            <li class="breadcrumb-item active">{{ $culinary->title }}</li>
        </ol>
        @include('backend.partials.alert')

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-eye me-1"></i>
                Detail Kuliner
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Image Section -->
                    <div class="col-md-6 col-lg-4 mb-3">
                        <label for="image" class="form-label"><strong>Gambar</strong></label>
                        <div>
                            @if($culinary->image)
                                <img src="{{ Storage::url($culinary->image) }}" alt="Kuliner Image" class="img-fluid rounded shadow-sm" style="max-height: 250px;">
                            @else
                                <p>No image uploaded.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Info Section -->
                    <div class="col-md-6 col-lg-8">
                        <h3 class="text-danger">{{ $culinary->title }}</h3>

                        <div class="mb-3">
                            <label class="form-label"><strong>Deskripsi</strong></label>
                            <p>{{ $culinary->description }}</p>
                        </div>

                        <!-- Address, Time and Contact Info -->
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label"><strong>Alamat</strong></label>
                                <p>{{ $culinary->address }}</p>
                            </div>
                            <div class="col-6">
                                <label class="form-label"><strong>Jam Buka</strong></label>
                                <p>{{ $culinary->open_at }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label class="form-label"><strong>Jam Tutup</strong></label>
                                <p>{{ $culinary->closed_at }}</p>
                            </div>
                            <div class="col-6">
                                <label class="form-label"><strong>Harga</strong></label>
                                <p>{{ $culinary->price ? 'Rp ' . number_format($culinary->price, 0, ',', '.') : 'Tidak tersedia' }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label class="form-label"><strong>Telepon</strong></label>
                                <p>{{ $culinary->telp ? $culinary->telp : 'Tidak tersedia' }}</p>
                            </div>
                            <div class="col-6">
                                <label class="form-label"><strong>Instagram</strong></label>
                                <p>{{ $culinary->instagram ? $culinary->instagram : 'Tidak tersedia' }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label class="form-label"><strong>Website</strong></label>
                                <p>{{ $culinary->website ? $culinary->website : 'Tidak tersedia' }}</p>
                            </div>
                        </div>

                        <!-- Coordinates -->
                        <div class="mt-4">
                            <label class="form-label"><strong>Koordinat</strong></label>
                            <p>Latitude: {{ $culinary->latitude }} | Longitude: {{ $culinary->longitude }}</p>
                        </div>

                        <!-- Back Button -->
                        <div class="mt-4 d-flex justify-content-end">
                            <a href="{{ route('culinary.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali ke Daftar Kuliner
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
