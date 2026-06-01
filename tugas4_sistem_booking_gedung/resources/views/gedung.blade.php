@extends('layouts.app')
@section('title', 'Daftar Gedung | SIPEGEDUNG')
@section('content')
<section class="hero">
    <div class="hero-overlay">
        <h1>Layanan Peminjaman Gedung</h1>
        <p>Fasilitas Resmi Universitas Jember</p>
    </div>
</section>

    <section class="search-container container">
    <div class="search-box">
        <input type="text" id="searchInput" placeholder="Cari nama gedung...">

        <select id="filterDropdown" class="filter-select">
            <option value="">Semua Tipe</option>
            <option value="ac">Indoor (AC)</option>
            <option value="outdoor">Outdoor</option>
        </select>

        <button onclick="laksanakanPencarian()" class="btn-search">Cari</button>
    </div>
</section>

<div class="container" style="margin-top: 40px;">
    <h2 class="section-heading">Katalog Seluruh Gedung</h2>
    <div class="grid-container">
    @foreach($daftarGedung as $g)
        <div class="info-card" data-fitur="{{ $g['fitur'] }}">
            <div class="card-image-wrapper">
                <img src="{{ asset($g['gambar']) }}" class="card-img">
            </div>
            <div class="card-body">
                <span class="category-badge">Pertemuan</span>
                <h4>{{ $g['nama'] }}</h4>
                <p>Kapasitas: {{ $g['kapasitas'] }}</p>
                <a href="{{ route('home') }}#formulir" class="btn-book">Pesan Sekarang</a>
            </div>
        </div>
    @endforeach
</div>
</div>
@endsection
