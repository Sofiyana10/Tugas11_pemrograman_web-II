@extends('layouts.app')
 
@section('title', 'Daftar Buku')
 
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>
        <i class="bi bi-book"></i>
        Daftar Buku
    </h1>
    <a href="{{ route('buku.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Buku
    </a>
</div>
 
{{-- Statistik Cards --}}
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Buku</h6>
                        <h2 class="mb-0">{{ $totalBuku }}</h2>
                    </div>
                    <div class="text-primary">
                        <i class="bi bi-book-fill" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card border-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Buku Tersedia</h6>
                        <h2 class="mb-0">{{ $bukuTersedia }}</h2>
                    </div>
                    <div class="text-success">
                        <i class="bi bi-check-circle-fill" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card border-danger">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Buku Habis</h6>
                        <h2 class="mb-0">{{ $bukuHabis }}</h2>
                    </div>
                    <div class="text-danger">
                        <i class="bi bi-x-circle-fill" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
{{-- Filter Kategori --}}
<div class="card mb-4">
    <div class="card-body">
        <h6 class="card-title">
            <i class="bi bi-funnel"></i> Filter Kategori:
        </h6>
        <div class="btn-group" role="group">
            <a href="{{ route('buku.index') }}" class="btn btn-sm {{ !isset($kategori) ? 'btn-primary' : 'btn-outline-primary' }}">
                Semua
            </a>
            <a href="{{ route('buku.kategori', 'Programming') }}" class="btn btn-sm {{ isset($kategori) && $kategori == 'Programming' ? 'btn-primary' : 'btn-outline-primary' }}">
                Programming
            </a>
            <a href="{{ route('buku.kategori', 'Database') }}" class="btn btn-sm {{ isset($kategori) && $kategori == 'Database' ? 'btn-primary' : 'btn-outline-primary' }}">
                Database
            </a>
            <a href="{{ route('buku.kategori', 'Web Design') }}" class="btn btn-sm {{ isset($kategori) && $kategori == 'Web Design' ? 'btn-primary' : 'btn-outline-primary' }}">
                Web Design
            </a>
            <a href="{{ route('buku.kategori', 'Networking') }}" class="btn btn-sm {{ isset($kategori) && $kategori == 'Networking' ? 'btn-primary' : 'btn-outline-primary' }}">
                Networking
            </a>
            <a href="{{ route('buku.kategori', 'Data Science') }}" class="btn btn-sm {{ isset($kategori) && $kategori == 'Data Science' ? 'btn-primary' : 'btn-outline-primary' }}">
                Data Science
            </a>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">

        <form action="{{ route('buku.search') }}" method="GET">

            <div class="row">

                <div class="col-md-3">
                    <input type="text"
                        name="keyword"
                        class="form-control"
                        placeholder="Cari judul, pengarang..."
                        value="{{ request('keyword') }}">
                </div>

                <div class="col-md-2">
                    <select name="kategori" class="form-select">

                        <option value="">Semua Kategori</option>

                        <option value="Programming"
                            {{ request('kategori') == 'Programming' ? 'selected' : '' }}>
                            Programming
                        </option>

                        <option value="Database"
                            {{ request('kategori') == 'Database' ? 'selected' : '' }}>
                            Database
                        </option>

                        <option value="Web Design"
                            {{ request('kategori') == 'Web Design' ? 'selected' : '' }}>
                            Web Design
                        </option>

                        <option value="Networking"
                            {{ request('kategori') == 'Networking' ? 'selected' : '' }}>
                            Networking
                        </option>

                    </select>
                </div>

                <div class="col-md-2">
                    <select name="tahun" class="form-select">

                        <option value="">Semua Tahun</option>

                        @for ($tahun = date('Y'); $tahun >= 2015; $tahun--)

                            <option value="{{ $tahun }}"
                                {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                {{ $tahun }}
                            </option>

                        @endfor

                    </select>
                </div>

                <div class="col-md-2">
                    <select name="status" class="form-select">

                        <option value="">Semua Status</option>

                        <option value="tersedia"
                            {{ request('status') == 'tersedia' ? 'selected' : '' }}>
                            Tersedia
                        </option>

                        <option value="habis"
                            {{ request('status') == 'habis' ? 'selected' : '' }}>
                            Habis
                        </option>

                    </select>
                </div>

                <div class="col-md-3">

                    <button type="submit"
                        class="btn btn-primary">
                        <i class="bi bi-search"></i>
                        Cari
                    </button>

                    <a href="{{ route('buku.index') }}"
                        class="btn btn-secondary">
                        Reset
                    </a>

                </div>

            </div>

        </form>

    </div>
</div>
 
{{-- Daftar Buku --}}
@forelse ($bukus as $buku)

    <x-buku-card :buku="$buku" />

@empty

    <div class="alert alert-info">
        Tidak ada data buku
    </div>

@endforelse
 
@if ($bukus->count() > 0)
    <div class="text-center mt-4">
        <p class="text-muted">
            Menampilkan {{ $bukus->count() }} buku
            @isset($kategori)
                dari kategori <strong>{{ $kategori }}</strong>
            @endisset
        </p>
    </div>
@endif
@endsection