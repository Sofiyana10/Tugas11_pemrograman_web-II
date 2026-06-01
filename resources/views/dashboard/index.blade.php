@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<h1 class="mb-4">
    <i class="bi bi-speedometer2"></i>
    Dashboard Perpustakaan
</h1>

{{-- Statistik Buku --}}
<div class="row mb-4">

    <div class="col-md-4">
        <div class="card border-primary">
            <div class="card-body">
                <h6>Total Buku</h6>
                <h2>{{ $totalBuku }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-success">
            <div class="card-body">
                <h6>Buku Tersedia</h6>
                <h2>{{ $bukuTersedia }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-danger">
            <div class="card-body">
                <h6>Buku Habis</h6>
                <h2>{{ $bukuHabis }}</h2>
            </div>
        </div>
    </div>

</div>

{{-- Statistik Anggota --}}
<div class="row mb-4">

    <div class="col-md-4">
        <div class="card border-info">
            <div class="card-body">
                <h6>Total Anggota</h6>
                <h2>{{ $totalAnggota }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-success">
            <div class="card-body">
                <h6>Anggota Aktif</h6>
                <h2>{{ $anggotaAktif }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-secondary">
            <div class="card-body">
                <h6>Anggota Nonaktif</h6>
                <h2>{{ $anggotaNonaktif }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="row">

    {{-- Buku Terbaru --}}
    <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                5 Buku Terbaru
            </div>

            <div class="card-body">

                @forelse($bukuTerbaru as $buku)

                    <p>
                        {{ $loop->iteration }}.
                        {{ $buku->judul }}
                    </p>

                @empty

                    <p>Tidak ada data buku</p>

                @endforelse

            </div>
        </div>

    </div>

    {{-- Anggota Terbaru --}}
    <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                5 Anggota Terbaru
            </div>

            <div class="card-body">

                @forelse($anggotaTerbaru as $anggota)

                    <p>
                        {{ $loop->iteration }}.
                        {{ $anggota->nama }}
                    </p>

                @empty

                    <p>Tidak ada data anggota</p>

                @endforelse

            </div>
        </div>

    </div>

</div>

{{-- Quick Links --}}
<div class="card mt-4">

    <div class="card-header">
        Quick Links
    </div>

    <div class="card-body">

        <a href="{{ route('buku.index') }}"
            class="btn btn-primary">
            Data Buku
        </a>

        <a href="{{ route('anggota.index') }}"
            class="btn btn-success">
            Data Anggota
        </a>

    </div>

</div>

@endsection