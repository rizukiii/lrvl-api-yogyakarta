@extends('layouts.start')

@section('title', 'Detail Tips & Trick')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Tips & Trick</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('tips_trick.index') }}">Tips & Trick</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-info-circle me-1"></i>
                Detail Tips & Trick
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Judul</th>
                        <td>{{ $tips_trick->title }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $tips_trick->description }}</td>
                    </tr>
                    <tr>
                        <th>Penulis</th>
                        <td>{{ $tips_trick->author }}</td>
                    </tr>
                    <tr>
                        <th>Dibuat Pada</th>
                        <td>{{ $tips_trick->created_at->format('d M Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Terakhir Diperbarui</th>
                        <td>{{ $tips_trick->updated_at->format('d M Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Gambar</th>
                        <td>
                            @if($tips_trick->image)
                                <img src="{{ Storage::url($tips_trick->image) }}" alt="Gambar Tips & Trick"
                                    class="img-fluid" style="max-width: 300px;">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                    </tr>
                </table>

                <div class="mt-4">
                    <a href="{{ route('tips_trick.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
