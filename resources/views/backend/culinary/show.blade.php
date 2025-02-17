@extends('layouts.start')

@section('title', 'Detail Kuliner')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Kuliner</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('culinary.index') }}">Kuliner</a></li>
            <li class="breadcrumb-item active">{{ $culinary->title }}</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-utensils me-1"></i>
                Detail Kuliner
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Kuliner</th>
                        <td>{{ $culinary->title ?? 'Tidak ada data.' }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{!! nl2br(e($culinary->description)) ?? 'Tidak ada data.' !!}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $culinary->address ?? 'Tidak ada data.' }}</td>
                    </tr>
                    <tr>
                        <th>Jam Operasional</th>
                        <td>{{ $culinary->open_at ?? '-' }} - {{ $culinary->closed_at ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>{{ $culinary->price ? 'Rp ' . number_format($culinary->price, 0, ',', '.') : 'Tidak tersedia' }}</td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td>{{ $culinary->telp ?? 'Tidak tersedia' }}</td>
                    </tr>
                    <tr>
                        <th>Instagram</th>
                        <td>
                            @if($culinary->instagram)
                                <a href="https://instagram.com/{{ ltrim($culinary->instagram, '@') }}" target="_blank" class="text-decoration-none">
                                    {{ $culinary->instagram }}
                                </a>
                            @else
                                <span class="text-muted">Tidak tersedia</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Website</th>
                        <td>
                            @if($culinary->website)
                                <a href="{{ $culinary->website }}" target="_blank" class="text-decoration-none">
                                    {{ $culinary->website }}
                                </a>
                            @else
                                <span class="text-muted">Tidak tersedia</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Koordinat</th>
                        <td>Latitude: {{ $culinary->latitude ?? '-' }}, Longitude: {{ $culinary->longitude ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Gambar</th>
                        <td>
                            @if ($culinary->image && Storage::exists($culinary->image))
                                <img src="{{ Storage::url($culinary->image) }}" alt="Gambar Kuliner"
                                     class="img-fluid rounded" style="max-width: 300px;">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                    </tr>
                </table>

                <div class="mt-4">
                    <a href="{{ route('culinary.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Kuliner
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
