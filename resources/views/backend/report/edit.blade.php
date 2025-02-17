@extends('layouts.start')

@section('title', 'Edit Status Laporan')

@section('content')
    <main>
        <div class="container px-4">
            <h1 class="mt-4">Edit Status Laporan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('report.index') }}">Laporan</a></li>
                <li class="breadcrumb-item active">Edit Status</li>
            </ol>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('report.update-status', $report->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label for="status" class="form-label">Status Laporan</label>
                            <select name="status" id="status" class="form-control">
                                <option value="Menunggu" {{ $report->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="Diproses" {{ $report->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="Selesai" {{ $report->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('report.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
