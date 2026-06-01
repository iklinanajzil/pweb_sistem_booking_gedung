@extends('layouts.app')

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

<div class="main-layout container" style="margin-top: 40px;">
    <main>
        <h2 class="section-heading">Rekomendasi Ruangan</h2>
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
                            {{-- <a href="{{ route('home') }}#formulir" class="btn-book">Pesan Sekarang</a> --}}
                        </div>
                    </div>
                @endforeach
            </div>

        <section class="card-section">
                <section id="formulir" class="card-section">
                    <h2 class="section-heading" id="formTitle">Formulir Pengajuan Peminjaman</h2>

            @if(session('success'))
                <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            <form id="bookingForm" class="modern-form" action="/booking" method="POST" enctype="multipart/form-data">
                 <input type="hidden" id="editIndex" value="-1">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                                <label>Kode Booking</label>
                                <input type="text" id="bookingCode" readonly>
                            </div>
                    <div class="form-group">
                        <label>Nama Gedung/Ruangan</label>
                                <select name="nama_gedung" id="namaGedung" required>
                                    <option value="">-- Pilih Gedung --</option>
                                    <option value="Auditorium UNEJ">Auditorium UNEJ</option>
                                    <option value="Gedung Soetardjo">Gedung Soetardjo</option>
                                    <option value="Gedung Mas Soerachman">Gedung Mas Soerachman</option>
                                    <option value="Lab Terpadu">Lab Terpadu</option>
                                    <option value="Aula Fasilkom">Aula Fasilkom</option>
                                    <option value="CDAST Utara lantai 4">CDAST Utara lantai 4</option>
                                    <option value="Aula FEB">Aula FEB</option>
                                    <option value="Aula FKM">Aula FKM</option>
                                    <option value="CDAST selatan lantai 8">CDAST selatan lantai 8</option>
                                    <option value="Gedung Kewirausahaan">Gedung Kewirausahaan</option>
                                    <option value="Double Way">Double Way</option>
                                    <option value="Aula Lantai 3">Aula Lantai 3</option>
                                    <option value="Aula KAUJE">Aula KAUJE</option>
                                    <option value="PKM">PKM</option>
                                    <option value="Student Center">Student Center</option>
                                </select>
                    </div>

                    <div class="form-group">
                        <label>Penyelenggara / Organisasi</label>
                        <input type="text" name="organisasi" placeholder="Nama UKM / Fakultas" required>
                    </div>

                    <div class="form-group">
                        <label>Kategori Kegiatan</label>
                            <div class="radio-group">
                                <label><input type="radio" name="kategori_kegiatan" value="Seminar" checked> Seminar</label>
                                <label><input type="radio" name="kategori_kegiatan" value="Mahasiswa"> Mahasiswa</label>
                                <label><input type="radio" name="kategori_kegiatan" value="Formal"> Formal</label>
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Pengajuan</label>
                        <input type="date" name="tanggal_pengajuan" required>
                    </div>

                    <div class="form-group">
                        <label>Mulai Digunakan</label>
                        <input type="datetime-local" name="tgl_mulai" required>
                    </div>

                    <div class="form-group">
                        <label>Selesai Digunakan</label>
                        <input type="datetime-local" name="tgl_selesai" required>
                    </div>

                    <div class="form-group">
                        <label>Bukti Surat Izin (PDF)</label>
                        <input type="file" name="surat_izin" accept=".pdf">
                    </div>

                    <div class="form-group">
                        <label>Proposal Kegiatan (PDF)</label>
                        <input type="file" name="proposal" accept=".pdf">
                    </div>

                    <div style="grid-column: 1 / -1;" class="form-group">
                        <label>Keterangan Tambahan</label>
                        <textarea name="keterangan" rows="3" placeholder="Tuliskan detail kebutuhan..."></textarea>
                    </div>
                </div>

                <div style="margin-top: 20px;">
                    <button type="submit" class="btn-submit">Ajukan Peminjaman Sekarang</button>
                </div>
            </form>
        </section>

        <div class="card-section">
            <h2 class="section-heading">Riwayat Peminjaman Terakhir</h2>
            <div class="table-responsive">
                <table class="zebra-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Booking</th>
                            <th>Gedung</th>
                            <th>Penyelenggara</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayat as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td><b>{{ $item['id_booking'] }}</b></td>
                                <td>{{ $item['gedung'] }}</td>
                                <td>{{ $item['penyelenggara'] }}</td>
                                <td><span class="status orange">{{ $item['status'] }}</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align:center;">Belum ada riwayat peminjaman.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <aside class="sidebar">
        <div class="sidebar-content">
            <h3 class="section-heading">Statistik</h3>
            <x-stat-card label="Menunggu Konfirmasi" value="2" colorClass="orange" />
            <x-stat-card label="Total Pengajuan" value="15" colorClass="blue" />
            <x-stat-card label="Booking Disetujui" value="10" colorClass="green" />
        </div>
    </aside>
</div>

@push('scripts')
<script>
    console.log('Halaman HalUtama dimuat');
</script>
@endpush
@endsection
