@extends('layouts.start')

@section('title', 'Detail Wisata')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Wisata</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('tour.index') }}">Wisata</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header text-white">
                <i class="fas fa-info-circle me-1"></i>
                Detail Wisata
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Wisata</th>
                        <td>{{ $tour->title }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $tour->description }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $tour->address }}</td>
                    </tr>
                    <tr>
                        <th>Jam Operasional</th>
                        <td>{{ \Carbon\Carbon::parse($tour->open_at)->format('H:i') }} - {{ \Carbon\Carbon::parse($tour->closed_at)->format('H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>Rp {{ number_format($tour->price, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td>{{ $tour->telp ? $tour->telp : '-' }}</td>
                    </tr>
                    <tr>
                        <th>Instagram</th>
                        <td>
                            @if($tour->instagram)
                                <a href="https://instagram.com/{{ $tour->instagram }}" target="_blank">{{ $tour->instagram }}</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Website</th>
                        <td>
                            @if($tour->website)
                                <a href="{{ $tour->website }}" target="_blank">{{ $tour->website }}</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Koordinat</th>
                        <td>Latitude: {{ $tour->latitude }}, Longitude: {{ $tour->longitude }}</td>
                    </tr>
                    <tr>
                        <th>Gambar</th>
                        <td>
                            @if($tour->image)
                                <img src="{{ Storage::url($tour->image) }}" alt="Gambar Wisata"
                                    class="img-fluid" style="max-width: 300px;">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                    </tr>
                </table>

                <div class="mt-4">
                    <a href="{{ route('tour.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Wisata
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
