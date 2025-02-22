@extends('layouts.start')

@section('title', 'Edit Wisata')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Wisata: {{ $tour->title }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('tour.index') }}">Wisata</a></li>
            <li class="breadcrumb-item active">{{ $tour->title }}</li>
        </ol>
        @include('backend.partials.alert')

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Edit Wisata
            </div>
            <div class="card-body">
                <form action="{{ route('tour.update', $tour->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $tour->title) }}" placeholder="Masukkan Judul.." required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea name="description" id="description" class="form-control" rows="4" placeholder="Masukkan Deskripsi.." required>{{ old('description', $tour->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                        <small class="text-muted">Biarkan kosong jika tidak mengganti gambar</small>

                        <div class="mt-2 d-flex gap-3">
                            <!-- Gambar Lama -->
                            <div>
                                <p>Gambar Saat Ini:</p>
                                <img src="{{ Storage::url($tour->image) }}" alt="gambar akomodasi" class="img-fluid" style="max-width: 150px;">
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
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $tour->address) }}" placeholder="Masukkan Alamat" required>
                    </div>

                    <div class="mb-3">
                        <label for="open_at" class="form-label">Jam Buka</label>
                        <input type="time" name="open_at" id="open_at" class="form-control" value="{{ old('open_at', $tour->open_at) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="closed_at" class="form-label">Jam Tutup</label>
                        <input type="time" name="closed_at" id="closed_at" class="form-control" value="{{ old('closed_at', $tour->closed_at) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="telp" class="form-label">Telepon</label>
                        <input type="tel" name="telp" id="telp" class="form-control" value="{{ old('telp', $tour->telp) }}" placeholder="Masukkan Nomor Telepon">
                    </div>

                    <div class="mb-3">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" name="instagram" id="instagram" class="form-control" value="{{ old('instagram', $tour->instagram) }}" placeholder="Masukkan Akun Instagram">
                    </div>

                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" name="website" id="website" class="form-control" value="{{ old('website', $tour->website) }}" placeholder="Masukkan Website">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $tour->price) }}" placeholder="Masukkan Harga" required>
                    </div>

                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="number" name="latitude" id="latitude" class="form-control" value="{{ old('latitude', $tour->latitude) }}" step="any" placeholder="Masukkan Latitude" required>
                    </div>

                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="number" name="longitude" id="longitude" class="form-control" value="{{ old('longitude', $tour->longitude) }}" step="any" placeholder="Masukkan Longitude" required>
                    </div>

                    <button type="submit" class="btn btn-danger">Perbarui Wisata</button>
                    <a href="{{ route('tour.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
