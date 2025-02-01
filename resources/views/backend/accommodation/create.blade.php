@extends('layouts.start')
@section('title', 'Tambah Akomodasi')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('accommodation.index') }}">Akomodasi</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
            @include('backend.partials.alert')

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Akomodasi
                </div>
                <div class="card-body">
                    <form action="{{ route('accommodation.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Masukkan Judul.." required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Masukkan Deskripsi.."
                                required></textarea>
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
                            <label for="star" class="form-label">Bintang</label>
                            <input type="number" name="star" id="star" class="form-control" min="1"
                                max="5" placeholder="Masukkan jumlah bintang" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" name="address" id="address" class="form-control"
                                placeholder="Masukkan Alamat" required>
                        </div>

                        <div class="mb-3">
                            <label for="telp" class="form-label">Telepon</label>
                            <input type="text" name="telp" id="telp" class="form-control"
                                placeholder="Masukkan Nomor Telepon">
                        </div>

                        <div class="mb-3">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="text" name="instagram" id="instagram" class="form-control"
                                placeholder="Masukkan Akun Instagram">
                        </div>

                        <div class="mb-3">
                            <label for="website" class="form-label">Website</label>
                            <input type="text" name="website" id="website" class="form-control"
                                placeholder="Masukkan Website">
                        </div>

                        <div class="mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="number" name="latitude" id="latitude" class="form-control" step="any"
                                placeholder="Masukkan Latitude" required>
                        </div>

                        <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="number" name="longitude" id="longitude" class="form-control" step="any"
                                placeholder="Masukkan Longitude" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <a href="{{ route('accommodation.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
