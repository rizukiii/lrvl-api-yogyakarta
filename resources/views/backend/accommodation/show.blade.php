@extends('layouts.start')

@section('title', 'Detail Akomodasi')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Detail Akomodasi</h1>
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
                    <table class="table table-bordered">
                        <tr>
                            <th>Judul</th>
                            <td>{{ $accommodation->title }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{!! nl2br(e($accommodation->description)) !!}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $accommodation->address }}</td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td>
                                <a href="tel:{{ $accommodation->telp }}" class="text-decoration-none">
                                    {{ $accommodation->telp }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>Bintang</th>
                            <td>{{ $accommodation->star }} ⭐</td>
                        </tr>
                        <tr>
                            <th>Instagram</th>
                            <td>
                                @if($accommodation->instagram)
                                    <a href="https://instagram.com/{{ ltrim($accommodation->instagram, '@') }}"
                                       target="_blank" class="text-decoration-none">
                                        {{ $accommodation->instagram }}
                                    </a>
                                @else
                                    <span class="text-muted">Tidak tersedia</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Website</th>
                            <td>
                                @if($accommodation->website)
                                    <a href="{{ $accommodation->website }}" target="_blank" class="text-decoration-none">
                                        {{ $accommodation->website }}
                                    </a>
                                @else
                                    <span class="text-muted">Tidak tersedia</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Koordinat</th>
                            <td>
                                Latitude: {{ $accommodation->latitude }}, Longitude: {{ $accommodation->longitude }}
                                <br>
                                <a href="https://www.google.com/maps?q={{ $accommodation->latitude }},{{ $accommodation->longitude }}"
                                   target="_blank" class="btn btn-sm btn-primary mt-2">
                                    Lihat di Google Maps
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>Gambar</th>
                            <td>
                                @if($accommodation->image)
                                    <img src="{{ Storage::url($accommodation->image) }}" alt="Gambar Akomodasi"
                                         class="img-fluid rounded" style="max-width: 300px;">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                        </tr>
                    </table>

                    <div class="mt-4">
                        <a href="{{ route('accommodation.index') }}" class="btn btn-secondary">Kembali ke Daftar Akomodasi</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
