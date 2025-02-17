@extends('layouts.start')

@section('title', 'Detail Stasiun')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Stasiun: {{ $station->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('station.index') }}">Stasiun</a></li>
            <li class="breadcrumb-item active">{{ $station->name }}</li>
        </ol>
        @include('backend.partials.alert')

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-eye me-1"></i>
                Detail Stasiun
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Stasiun</th>
                        <td>{{ $station->name }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $station->address }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitas</th>
                        <td>{{ $station->facilities }}</td>
                    </tr>
                    <tr>
                        <th>Jam Buka</th>
                        <td>{{ $station->open_at }}</td>
                    </tr>
                    <tr>
                        <th>Jam Tutup</th>
                        <td>{{ $station->closed_at }}</td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td>{{ $station->telp ? $station->telp : 'Tidak tersedia' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge {{ $station->status ? 'bg-success' : 'bg-danger' }}">
                                {{ $station->status ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Koordinat</th>
                        <td>
                            <strong>Latitude:</strong> {{ $station->latitude }} |
                            <strong>Longitude:</strong> {{ $station->longitude }}
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">Gambar</th>
                        <td>
                            @if($station->image)
                                <img src="{{ Storage::url($station->image) }}" alt="Stasiun Image" class="img-fluid rounded shadow-sm" style="max-height: 250px;">
                            @else
                                <p class="text-muted">Tidak ada gambar tersedia.</p>
                            @endif
                        </td>
                    </tr>
                </table>

                <div class="text-end mt-3">
                    <a href="{{ route('station.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Stasiun
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
