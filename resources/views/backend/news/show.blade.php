@extends('layouts.start')
@section('title', 'Detail Berita')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Berita</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-newspaper me-1"></i>
                    {{ $news->title }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ Storage::url($news->image) }}" alt="gambar berita" class="img-fluid rounded">
                        </div>
                        <div class="col-md-8">
                            <h3>{{ $news->title }}</h3>
                            <p><strong>Tanggal:</strong> {{ $news->status_date }}</p>
                            <p>{{ $news->description }}</p>
                            <a href="{{ route('news.index') }}" class="btn btn-secondary">Kembali ke Berita</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
