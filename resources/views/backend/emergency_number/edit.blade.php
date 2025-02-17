@extends('layouts.start')

@section('title', 'Edit Nomor Darurat')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('emergency.index') }}">Nomor Darurat</a></li>
            <li class="breadcrumb-item active">Edit Nomor Darurat</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Edit Nomor Darurat
            </div>
            <div class="card-body">
                <form action="{{ route('emergency.update', $number->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $number->name) }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control @error('number') is-invalid @enderror" id="number"
                            name="number" value="{{ old('number', $number->number) }}" required>
                        @error('number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Perbarui
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
