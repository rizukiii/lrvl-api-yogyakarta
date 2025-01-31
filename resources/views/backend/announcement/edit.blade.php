@extends('layouts.start')
@section('title', 'Edit Pengumuman')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('announcement.index') }}">Pengumuman</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-edit me-1"></i>
                    Edit Pengumuman
                </div>
                <div class="card-body">
                    <form action="{{ route('announcement.update', $announcement->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ $announcement->title }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required>{{ $announcement->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" id="status" class="form-control" value="{{ $announcement->status_date }}"
                                disabled>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*"
                                onchange="previewImage(event)">
                            <small class="text-muted">Biarkan kosong jika tidak mengganti gambar</small>
                            <div class="mt-2 d-flex gap-3">
                                <!-- Gambar Lama -->
                                <div>
                                    <p>Gambar Saat Ini:</p>
                                    <img src="{{ Storage::url($announcement->image) }}" alt="gambar berita" class="img-fluid"
                                        style="max-width: 150px;">
                                </div>
                                <!-- Pratinjau Gambar Baru -->
                                <div>
                                    <p>Pratinjau Gambar Baru:</p>
                                    <img id="preview-image" src="#" alt="Pratinjau Gambar" class="img-fluid d-none"
                                        style="max-width: 150px;">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Perbarui</button>
                        <a href="{{ route('announcement.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
