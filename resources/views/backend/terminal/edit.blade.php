@extends('layouts.start')
@section('title', 'Edit Terminal')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('terminal.index') }}">Terminal</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
            @include('backend.partials.alert')

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-edit me-1"></i>
                    Edit Data Terminal
                </div>
                <div class="card-body">
                    <form action="{{ route('terminal.update', $terminal->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Terminal</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name', $terminal->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                            <small class="text-muted">Biarkan kosong jika tidak mengganti gambar</small>

                            <div class="mt-2 d-flex gap-3">
                                <!-- Gambar Lama -->
                                <div>
                                    <p>Gambar Saat Ini:</p>
                                    <img src="{{ Storage::url($terminal->image) }}" alt="gambar akomodasi" class="img-fluid" style="max-width: 150px;">
                                </div>
                                <!-- Pratinjau Gambar Baru -->
                                <div>
                                    <p>Pratinjau Gambar Baru:</p>
                                    <img id="preview-image" src="#" alt="Pratinjau Gambar" class="img-fluid d-none" style="max-width: 150px;">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" name="address" id="address" class="form-control"
                                value="{{ old('address', $terminal->address) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="open_at" class="form-label">Jam Buka</label>
                            <input type="time" name="open_at" id="open_at" class="form-control"
                                value="{{ old('open_at', $terminal->open_at) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="closed_at" class="form-label">Jam Tutup</label>
                            <input type="time" name="closed_at" id="closed_at" class="form-control"
                                value="{{ old('closed_at', $terminal->closed_at) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="telp" class="form-label">Telepon</label>
                            <input type="tel" name="telp" id="telp" class="form-control"
                                value="{{ old('telp', $terminal->telp) }}">
                        </div>

                        <div class="mb-3">
                            <label for="facilities" class="form-label">Fasilitas</label>
                            <textarea name="facilities" id="facilities" class="form-control" rows="4" required>{{ old('facilities', $terminal->facilities) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="aktif" {{ old('status', $terminal->status) == 'aktif' ? 'selected' : '' }}>
                                    Aktif</option>
                                <option value="dalam perbaikan"
                                    {{ old('status', $terminal->status) == 'dalam perbaikan' ? 'selected' : '' }}>Dalam
                                    Perbaikan</option>
                                <option value="tutup sementara"
                                    {{ old('status', $terminal->status) == 'tutup sementara' ? 'selected' : '' }}>Tutup
                                    Sementara</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="number" name="latitude" id="latitude" class="form-control" step="any"
                                value="{{ old('latitude', $terminal->latitude) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="number" name="longitude" id="longitude" class="form-control" step="any"
                                value="{{ old('longitude', $terminal->longitude) }}" required>
                        </div>

                        <button type="submit" class="btn btn-danger">Simpan Perubahan</button>
                        <a href="{{ route('terminal.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
