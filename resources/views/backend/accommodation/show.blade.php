@extends('layouts.start')
@section('title', 'Detail Akomodasi')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('accommodation.index') }}">Akomodasi</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>

            @include('backend.partials.alert')

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-info-circle me-1"></i>
                    Detail Akomodasi
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <strong>Judul:</strong>
                                <p>{{ $accommodation->title }}</p>
                            </div>
                            <div class="mb-3">
                                <strong>Deskripsi:</strong>
                                <p>{{ $accommodation->description }}</p>
                            </div>
                            <div class="mb-3">
                                <strong>Alamat:</strong>
                                <p>{{ $accommodation->address }}</p>
                            </div>
                            <div class="mb-3">
                                <strong>Telepon:</strong>
                                <p>{{ $accommodation->telp }}</p>
                            </div>
                            <div class="mb-3">
                                <strong>Bintang:</strong>
                                <p>{{ $accommodation->star }}</p>
                            </div>
                            <div class="mb-3">
                                <strong>Instagram:</strong>
                                <p>{{ $accommodation->instagram }}</p>
                            </div>
                            <div class="mb-3">
                                <strong>Website:</strong>
                                <p>{{ $accommodation->website }}</p>
                            </div>
                        </div>

                        <div class="col-md-6 text-center">
                            <div class="mb-3">
                                <strong>Gambar Akomodasi:</strong>
                                <br>
                                <img src="{{ Storage::url($accommodation->image) }}" alt="Gambar Akomodasi" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                            </div>
                            <div class="mb-3">
                                <strong>Lokasi:</strong>
                                <p>Latitude: {{ $accommodation->latitude }}</p>
                                <p>Longitude: {{ $accommodation->longitude }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('accommodation.index') }}" class="btn btn-secondary">Kembali ke Daftar Akomodasi</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
