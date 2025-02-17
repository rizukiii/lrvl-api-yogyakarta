@extends('layouts.start')

@section('title', 'Detail Bandara')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('airport.index') }}">Bandara</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
            @include('backend.partials.alert')

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-info-circle me-1"></i>
                    Detail Bandara
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Bandara</th>
                            <td>{{ $airport->name }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $airport->address }}</td>
                        </tr>
                        <tr>
                            <th>Jam Operasional</th>
                            <td>{{ $airport->open_at }} - {{ $airport->closed_at }}</td>
                        </tr>
                        <tr>
                            <th>Fasilitas</th>
                            <td>{{ $airport->facilities }}</td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td>{{ $airport->telp }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($airport->status == 'aktif')
                                    <span class="badge bg-success">Aktif</span>
                                @elseif($airport->status == 'dalam perbaikan')
                                    <span class="badge bg-warning text-dark">Dalam Perbaikan</span>
                                @else
                                    <span class="badge bg-danger">Tutup Sementara</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Koordinat</th>
                            <td>Latitude: {{ $airport->latitude }}, Longitude: {{ $airport->longitude }}</td>
                        </tr>
                        <tr>
                            <th>Gambar</th>
                            <td>
                                @if($airport->image)
                                    <img src="{{ Storage::url($airport->image) }}" alt="Gambar Bandara"
                                        class="img-fluid" style="max-width: 300px;">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                        </tr>
                    </table>

                    <div class="mt-4">
                        <a href="{{ route('airport.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
