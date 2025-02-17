@extends('layouts.start')

@section('title', 'Tambah Nomor Darurat')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('emergency.index') }}">Nomor Darurat</a></li>
            <li class="breadcrumb-item active">Tambah Nomor Darurat</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-plus me-1"></i>
                Tambah Nomor Darurat
            </div>
            <div class="card-body">
                <form action="{{ route('emergency.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control @error('number') is-invalid @enderror" id="number"
                            name="number" value="{{ old('number') }}" required>
                        @error('number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('emergency.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Batal
                    </a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
