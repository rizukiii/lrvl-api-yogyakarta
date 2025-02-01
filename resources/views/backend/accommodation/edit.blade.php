@extends('layouts.start')
@section('title', 'Edit Akomodasi')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('accommodation.index') }}">Akomodasi</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
            @include('backend.partials.alert')

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-edit me-1"></i>
                    Edit Akomodasi
                </div>
                <div class="card-body">
                    <form action="{{ route('accommodation.update', $accommodation->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $accommodation->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $accommodation->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="star" class="form-label">Bintang</label>
                            <select name="star" id="star" class="form-control" required>
                                <option value="1" {{ old('star', $accommodation->star) == '1' ? 'selected' : '' }}>1 Bintang</option>
                                <option value="2" {{ old('star', $accommodation->star) == '2' ? 'selected' : '' }}>2 Bintang</option>
                                <option value="3" {{ old('star', $accommodation->star) == '3' ? 'selected' : '' }}>3 Bintang</option>
                                <option value="4" {{ old('star', $accommodation->star) == '4' ? 'selected' : '' }}>4 Bintang</option>
                                <option value="5" {{ old('star', $accommodation->star) == '5' ? 'selected' : '' }}>5 Bintang</option>
                                <option value="non" {{ old('star', $accommodation->star) == 'non' ? 'selected' : '' }}>Non Bintang</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $accommodation->address) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="telp" class="form-label">Telepon</label>
                            <input type="text" name="telp" id="telp" class="form-control" value="{{ old('telp', $accommodation->telp) }}">
                        </div>

                        <div class="mb-3">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="text" name="instagram" id="instagram" class="form-control" value="{{ old('instagram', $accommodation->instagram) }}">
                        </div>

                        <div class="mb-3">
                            <label for="website" class="form-label">Website</label>
                            <input type="text" name="website" id="website" class="form-control" value="{{ old('website', $accommodation->website) }}">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                            <small class="text-muted">Biarkan kosong jika tidak mengganti gambar</small>

                            <div class="mt-2 d-flex gap-3">
                                <!-- Gambar Lama -->
                                <div>
                                    <p>Gambar Saat Ini:</p>
                                    <img src="{{ Storage::url($accommodation->image) }}" alt="gambar akomodasi" class="img-fluid" style="max-width: 150px;">
                                </div>
                                <!-- Pratinjau Gambar Baru -->
                                <div>
                                    <p>Pratinjau Gambar Baru:</p>
                                    <img id="preview-image" src="#" alt="Pratinjau Gambar" class="img-fluid d-none" style="max-width: 150px;">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" name="latitude" id="latitude" class="form-control" value="{{ old('latitude', $accommodation->latitude) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" name="longitude" id="longitude" class="form-control" value="{{ old('longitude', $accommodation->longitude) }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('accommodation.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
