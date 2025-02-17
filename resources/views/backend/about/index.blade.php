@extends('layouts.start')

@section('title', 'Tentang Kami')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tentang Kami</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tentang Kami</li>
        </ol>

        @include('backend.partials.alert')

        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <i class="fas fa-info-circle me-1"></i>
                Data Tentang Kami
                @if ($about)
                    <a href="{{ route('about.edit', $about->id) }}" class="btn btn-warning btn-sm ms-auto text-light">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                @endif
            </div>

            <div class="card-body">
                @if ($about)
                    <table class="table table-bordered">
                        <tr>
                            <th>Judul</th>
                            <td>{{ $about->title ?? 'Tidak ada data.' }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{!! nl2br(e($about->description)) ?? 'Tidak ada data.' !!}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $about->address ?? 'Tidak ada data.' }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                @if($about->email)
                                    <a href="mailto:{{ $about->email }}" class="text-decoration-none">
                                        {{ $about->email }}
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada data.</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td>
                                @if($about->telp)
                                    <a href="tel:{{ $about->telp }}" class="text-decoration-none">
                                        {{ $about->telp }}
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada data.</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Versi</th>
                            <td>{{ $about->version ?? 'Tidak ada data.' }}</td>
                        </tr>
                    </table>
                @else
                    <p class="text-center text-danger">Data "Tentang Kami" belum tersedia.</p>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
