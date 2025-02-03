@extends('layouts.start')

@section('title', 'Detail Terminal')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Terminal: {{ $terminal->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('terminal.index') }}">Terminal</a></li>
            <li class="breadcrumb-item active">{{ $terminal->name }}</li>
        </ol>
        @include('backend.partials.alert')

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-eye me-1"></i>
                Detail Terminal
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Image Section -->
                    <div class="col-md-6 col-lg-4 mb-3">
                        <label for="image" class="form-label"><strong>Gambar</strong></label>
                        <div>
                            @if($terminal->image)
                                <img src="{{ Storage::url($terminal->image) }}" alt="Terminal Image" class="img-fluid rounded shadow-sm" style="max-height: 250px;">
                            @else
                                <p>No image uploaded.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Info Section -->
                    <div class="col-md-6 col-lg-8">
                        <h3 class="text-primary">{{ $terminal->name }}</h3>

                        <div class="mb-3">
                            <label class="form-label"><strong>Alamat</strong></label>
                            <p>{{ $terminal->address }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Fasilitas</strong></label>
                            <p>{{ $terminal->facilities }}</p>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label class="form-label"><strong>Jam Buka</strong></label>
                                <p>{{ $terminal->open_at }}</p>
                            </div>
                            <div class="col-6">
                                <label class="form-label"><strong>Jam Tutup</strong></label>
                                <p>{{ $terminal->closed_at }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label class="form-label"><strong>Telepon</strong></label>
                                <p>{{ $terminal->telp ? $terminal->telp : 'Tidak tersedia' }}</p>
                            </div>
                            <div class="col-6">
                                <label class="form-label"><strong>Status</strong></label>
                                <p>{{ $terminal->status ? 'Aktif' : 'Tidak Aktif' }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label class="form-label"><strong>Latitude</strong></label>
                                <p>{{ $terminal->latitude }}</p>
                            </div>
                            <div class="col-6">
                                <label class="form-label"><strong>Longitude</strong></label>
                                <p>{{ $terminal->longitude }}</p>
                            </div>
                        </div>

                        <!-- Back Button -->
                        <div class="mt-4 d-flex justify-content-end">
                            <a href="{{ route('terminal.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali ke Daftar Terminal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
