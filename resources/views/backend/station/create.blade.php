@extends('layouts.start')

@section('title', 'Tambah Stasiun')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('station.index') }}">Stasiun</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
        @include('backend.partials.alert')

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-plus me-1"></i>
                Tambah Stasiun
            </div>
            <div class="card-body">
                <form action="{{ route('station.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Stasiun</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama Stasiun.." required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*"
                            required onchange="previewImage(event)">
                        <div class="mt-3">
                            <p>Pratinjau Gambar:</p>
                            <img id="preview-image" src="#" alt="Pratinjau Gambar" class="img-fluid d-none"
                                style="max-width: 150px;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea name="address" id="address" class="form-control" rows="4" placeholder="Masukkan Alamat Stasiun" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="open_at" class="form-label">Jam Buka</label>
                        <input type="time" name="open_at" id="open_at" class="form-control" placeholder="Masukkan Jam Buka" required>
                    </div>

                    <div class="mb-3">
                        <label for="closed_at" class="form-label">Jam Tutup</label>
                        <input type="time" name="closed_at" id="closed_at" class="form-control" placeholder="Masukkan Jam Tutup" required>
                    </div>

                    <div class="mb-3">
                        <label for="facilities" class="form-label">Fasilitas</label>
                        <textarea name="facilities" id="facilities" class="form-control" rows="4" placeholder="Masukkan Fasilitas Stasiun" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="telp" class="form-label">Telepon</label>
                        <input type="text" name="telp" id="telp" class="form-control" placeholder="Masukkan Nomor Telepon" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="aktif">Aktif</option>
                            <option value="dalam perbaikan">Dalam Perbaikan</option>
                            <option value="tutup sementara">Tutup Sementara</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="number" name="latitude" id="latitude" class="form-control" step="any" placeholder="Masukkan Latitude" required>
                    </div>

                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="number" name="longitude" id="longitude" class="form-control" step="any" placeholder="Masukkan Longitude" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim</button>
                    <a href="{{ route('station.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
