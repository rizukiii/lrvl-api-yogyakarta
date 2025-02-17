@extends('layouts.start')

@section('title', 'Detail Nomor Darurat')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Nomor Darurat</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('emergency.index') }}">Nomor Darurat</a></li>
            <li class="breadcrumb-item active">Detail Nomor Darurat</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-phone-alt me-1"></i>
                Detail Nomor Darurat
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Layanan</th>
                        <td>{{ $number->name ?? 'Tidak ada data.' }}</td>
                    </tr>
                    <tr>
                        <th>Nomor</th>
                        <td>
                            @if($number->number)
                                <a href="tel:{{ $number->number }}" class="text-decoration-none">
                                    {{ $number->number }}
                                </a>
                            @else
                                <span class="text-muted">Tidak ada nomor</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Dibuat Pada</th>
                        <td>{{ $number->created_at ? $number->created_at->format('d M Y H:i') : 'Tidak tersedia' }}</td>
                    </tr>
                    <tr>
                        <th>Terakhir Diperbarui</th>
                        <td>{{ $number->updated_at ? $number->updated_at->format('d M Y H:i') : 'Tidak tersedia' }}</td>
                    </tr>
                </table>

                <div class="mt-4">
                    <a href="{{ route('emergency.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
