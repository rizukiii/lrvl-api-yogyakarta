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
            <div class="card-header">
                <i class="fas fa-file-alt me-1"></i> Detail Laporan
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 200px;">Gambar</th>
                        <td class="text-center">
                            @if($report->image)
                                <img src="{{ Storage::url($report->image) }}" alt="Gambar Laporan" class="img-fluid rounded shadow-sm" style="max-height: 250px;">
                            @else
                                <p class="text-muted">Tidak ada gambar tersedia.</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Judul</th>
                        <td>{{ $report->title ?? 'Tidak ada data.' }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $report->description ?? 'Tidak ada deskripsi.' }}</td>
                    </tr>
                    <tr>
                        <th>Tingkat Urgensi</th>
                        <td>
                            <span class="badge
                                @if ($report->urgency == 'Rendah') bg-success
                                @elseif ($report->urgency == 'Sedang') bg-warning
                                @elseif ($report->urgency == 'Tinggi') bg-danger
                                @endif">
                                {{ $report->urgency }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge
                                @if ($report->status == 'Menunggu') bg-secondary
                                @elseif ($report->status == 'Diproses') bg-primary
                                @elseif ($report->status == 'Selesai') bg-success
                                @endif">
                                {{ $report->status }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Dikirim Pada</th>
                        <td>{{ $report->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                </table>

                <div class="text-end mt-3">
                    <a href="{{ route('report.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <a href="{{ route('report.edit-status', $report->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit Status
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
