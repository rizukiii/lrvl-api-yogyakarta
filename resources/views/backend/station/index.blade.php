@extends('layouts.start')
@section('title', 'Stasiun')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Stasiun</li>
            </ol>
            @include('backend.partials.alert')

            <div class="card mb-4">
                <div class="card-header d-flex align-items-center">
                    <i class="fas fa-table me-1"></i>
                    Tabel Data Stasiun
                    <a href="{{ route('station.create') }}" class="btn btn-danger btn-sm ms-auto">
                        <i class="fas fa-plus"></i> Tambah Stasiun
                    </a>
                </div>

                <div class="card-body ">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Stasiun</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Jam Operasional</th>
                                <th>Ditambahkan Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stations as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ Storage::url($item->image) }}" alt="gambar station" style="max-width: 100px;">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        <span class="badge
                                            @if($item->status == 'aktif') badge-success
                                            @elseif($item->status == 'dalam perbaikan') badge-warning
                                            @else badge-danger
                                            @endif">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $item->open_at }} - {{ $item->closed_at }}</td>
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
                                                        href="{{ route('station.show', $item->id) }}">Lihat</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('station.edit', $item->id) }}">Edit</a></li>
                                                <li>
                                                    <form action="{{ route('station.destroy', $item->id) }}"
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
