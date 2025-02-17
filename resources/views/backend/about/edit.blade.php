@extends('layouts.start')
@section('title', 'Edit Tentang Kami')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('about.index') }}">Tentang Kami</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        @include('backend.partials.alert')
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Edit Data Tentang Kami
            </div>
            <div class="card-body">
                <form action="{{ route('about.update', $about->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $about->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $about->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $about->address) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $about->email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="telp" class="form-label">Telp</label>
                        <input type="text" name="telp" id="telp" class="form-control" value="{{ old('telp', $about->telp) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="version" class="form-label">Versi</label>
                        <input type="text" name="version" id="version" class="form-control" value="{{ old('version', $about->version) }}" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('about.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
