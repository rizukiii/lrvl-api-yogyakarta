@extends('layouts.start')

@section('title', 'Detail Wisata')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Wisata: {{ $tour->title }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('tour.index') }}">Wisata</a></li>
            <li class="breadcrumb-item active">{{ $tour->title }}</li>
        </ol>
        @include('backend.partials.alert')

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-info-circle me-1"></i>
                Detail Wisata
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Image Section -->
                    <div class="col-md-6 col-lg-4 mb-3">
                        <img src="{{ Storage::url($tour->image) }}" alt="{{ $tour->title }}" class="img-fluid rounded shadow-sm">
                    </div>

                    <!-- Information Section -->
                    <div class="col-md-6 col-lg-8">
                        <h3 class="text-primary">{{ $tour->title }}</h3>
                        <p><strong>Deskripsi:</strong></p>
                        <p>{{ $tour->description }}</p>

                        <div class="row">
                            <!-- Address -->
                            <div class="col-6">
                                <p><strong>Alamat:</strong> {{ $tour->address }}</p>
                            </div>
                            <!-- Open and Close Times -->
                            <div class="col-6">
                                <p><strong>Jam Buka:</strong> {{ \Carbon\Carbon::parse($tour->open_at)->format('H:i') }}</p>
                                <p><strong>Jam Tutup:</strong> {{ \Carbon\Carbon::parse($tour->closed_at)->format('H:i') }}</p>
                            </div>
                        </div>

                        <p><strong>Harga:</strong> Rp {{ number_format($tour->price, 0, ',', '.') }}</p>

                        <!-- Contact Information -->
                        <div class="mt-3">
                            <p><strong>Kontak:</strong></p>
                            <ul class="list-unstyled">
                                @if ($tour->telp)
                                    <li><i class="fas fa-phone-alt"></i> <strong>Telepon:</strong> {{ $tour->telp }}</li>
                                @endif
                                @if ($tour->instagram)
                                    <li><i class="fab fa-instagram"></i> <strong>Instagram:</strong> <a href="https://instagram.com/{{ $tour->instagram }}" target="_blank">{{ $tour->instagram }}</a></li>
                                @endif
                                @if ($tour->website)
                                    <li><i class="fas fa-link"></i> <strong>Website:</strong> <a href="{{ $tour->website }}" target="_blank">{{ $tour->website }}</a></li>
                                @endif
                            </ul>
                        </div>

                        <!-- Coordinates -->
                        <div class="mt-4">
                            <p><strong>Koordinat:</strong></p>
                            <p>Latitude: {{ $tour->latitude }} | Longitude: {{ $tour->longitude }}</p>
                        </div>

                        <!-- Back Button -->
                        <div class="mt-4">
                            <a href="{{ route('tour.index') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i> Kembali ke Daftar Wisata</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
