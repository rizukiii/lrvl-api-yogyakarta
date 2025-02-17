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
                <i class="fas fa-info-circle me-1"></i>
                Detail Terminal
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Terminal</th>
                        <td>{{ $terminal->name }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $terminal->address }}</td>
                    </tr>
                    <tr>
                        <th>Jam Operasional</th>
                        <td>{{ $terminal->open_at }} - {{ $terminal->closed_at }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitas</th>
                        <td>{{ $terminal->facilities }}</td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td>{{ $terminal->telp ? $terminal->telp : 'Tidak tersedia' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($terminal->status == 'aktif')
                                <span class="badge bg-success">Aktif</span>
                            @elseif($terminal->status == 'dalam perbaikan')
                                <span class="badge bg-warning text-dark">Dalam Perbaikan</span>
                            @else
                                <span class="badge bg-danger">Tutup Sementara</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Koordinat</th>
                        <td>Latitude: {{ $terminal->latitude }}, Longitude: {{ $terminal->longitude }}</td>
                    </tr>
                    <tr>
                        <th>Gambar</th>
                        <td>
                            @if($terminal->image)
                                <img src="{{ Storage::url($terminal->image) }}" alt="Gambar Terminal"
                                    class="img-fluid" style="max-width: 300px;">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                    </tr>
                </table>

                <div class="mt-4">
                    <a href="{{ route('terminal.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
