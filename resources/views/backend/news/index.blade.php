@extends('layouts.start')

@section('title', 'Data Berita')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Berita</li>
            </ol>
            @include('backend.partials.alert')

            <div class="card mb-4">
                <div class="card-header d-flex align-items-center">
                    <i class="fas fa-table me-1"></i>
                    Tabel Data Berita
                    <a href="{{ route('news.create') }}" class="btn btn-danger btn-sm ms-auto">
                        <i class="fas fa-plus"></i> Tambah Berita
                    </a>
                </div>

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Ditambahkan Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ Storage::url($item->image) }}" alt="gambar berita" style="max-width: 100px;">
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->author }}</td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton{{ $item->id }}" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu"
                                                aria-labelledby="dropdownMenuButton{{ $item->id }}">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('news.show', $item->id) }}">Lihat</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('news.edit', $item->id) }}">Edit</a></li>
                                                <li>
                                                    <form action="{{ route('news.destroy', $item->id) }}"
                                                        method="POST" onsubmit="return confirm('Apakah Anda yakin?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item text-danger"
                                                            type="submit">Hapus</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
