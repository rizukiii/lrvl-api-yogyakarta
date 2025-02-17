@extends('layouts.start')
@section('title', 'Laporan')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Laporan</li>
            </ol>
            @include('backend.partials.alert')

            <div class="card mb-4">
                <div class="card-header d-flex align-items-center">
                    <i class="fas fa-table me-1"></i>
                    Tabel Data Laporan
                </div>

                <div class="card-body">
                    <table id="datatablesSimple" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Tingkat Urgensi</th>
                                <th>Dikirim Pada</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($item->image)
                                            <img src="{{ Storage::url($item->image) }}" alt="gambar laporan"
                                                style="max-width: 100px;">
                                        @else
                                            <span>Tidak Ada Gambar</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ Str::limit($item->description, 50) }}</td>
                                    <td>
                                        <span class="badge
                                            @if ($item->urgency == 'Rendah') bg-success
                                            @elseif ($item->urgency == 'Sedang') bg-warning
                                            @elseif ($item->urgency == 'Tinggi') bg-danger
                                            @endif">
                                            {{ $item->urgency }}
                                        </span>
                                    </td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                    <td>
                                        <span class="badge
                                            @if ($item->status == 'Menunggu') bg-secondary
                                            @elseif ($item->status == 'Diproses') bg-primary
                                            @elseif ($item->status == 'Selesai') bg-success
                                            @endif">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton{{ $item->id }}" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $item->id }}">
                                                <li><a class="dropdown-item" href="{{ route('report.show', $item->id) }}">Lihat</a></li>
                                                <li><a class="dropdown-item" href="{{ route('report.edit-status', $item->id) }}">Edit Status</a></li>
                                                <li>
                                                    <form action="{{ route('report.destroy', $item->id) }}" method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item text-danger" type="submit">Hapus</button>
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
