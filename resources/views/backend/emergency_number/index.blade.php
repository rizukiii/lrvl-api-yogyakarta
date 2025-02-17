@extends('layouts.start')

@section('title', 'Data Nomor Darurat')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Nomor Darurat</li>
        </ol>
        @include('backend.partials.alert')

        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <i class="fas fa-table me-1"></i>
                Tabel Data Nomor Darurat
                <a href="{{ route('emergency.create') }}" class="btn btn-danger btn-sm ms-auto">
                    <i class="fas fa-plus"></i> Tambah Nomor Darurat
                </a>
            </div>

            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Layanan</th>
                            <th>Nomor</th>
                            <th>Ditambahkan Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($numbers as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->number }}</td>
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
                                                    href="{{ route('emergency.show', $item->id) }}">Lihat</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('emergency.edit', $item->id) }}">Edit</a></li>
                                            <li>
                                                <form action="{{ route('emergency.destroy', $item->id) }}"
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
