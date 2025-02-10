@extends('layouts.start')

@section('title', 'Detail Laporan')

@section('content')
    <main>
        <div class="container px-4">
            <h1 class="mt-4">Detail Laporan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('report.index') }}">Laporan</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>

            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <h4>Judul:</h4>
                        <p>{{ $report->title }}</p>
                    </div>

                    <div class="mb-3">
                        <h4>Deskripsi:</h4>
                        <p>{{ $report->description }}</p>
                    </div>

                    <div class="mb-3">
                        <h4>Tingkat Urgensi:</h4>
                        <span class="badge
                            @if ($report->urgency == 'Rendah') bg-success
                            @elseif ($report->urgency == 'Sedang') bg-warning
                            @elseif ($report->urgency == 'Tinggi') bg-danger
                            @endif">
                            {{ $report->urgency }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <h4>Status:</h4>
                        <span class="badge
                            @if ($report->status == 'Menunggu') bg-secondary
                            @elseif ($report->status == 'Diproses') bg-primary
                            @elseif ($report->status == 'Selesai') bg-success
                            @endif">
                            {{ $report->status }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <h4>Dikirim Pada:</h4>
                        <p>{{ $report->created_at->format('d M Y, H:i') }}</p>
                    </div>

                    <div class="mb-3">
                        <h4>Gambar:</h4>
                        @if ($report->image)
                            <img src="{{ Storage::url($report->image) }}" alt="Gambar Laporan" style="max-width: 300px;">
                        @else
                            <p><i>Tidak ada gambar tersedia</i></p>
                        @endif
                    </div>

                    <a href="{{ route('report.index') }}" class="btn btn-secondary">Kembali</a>
                    <a href="{{ route('report.edit-status', $report->id) }}" class="btn btn-primary">Edit Status</a>
                </div>
            </div>
        </div>
    </main>
@endsection
