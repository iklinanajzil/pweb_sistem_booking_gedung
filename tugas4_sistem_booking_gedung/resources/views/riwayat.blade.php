@extends('layouts.app')

@section('content')
<section class="container mt-5">
    <div class="container">
            <section class="sub-hero">
                <div class="hero-content-card">
                    <div class="hero-badge">Dashboard Riwayat Peminjaman</div>
                    <h1>RIWAYAT & MONITORING</h1>
                    <div class="hero-divider"></div>
                    <p><i class="icon">🏢</i> Unit Kegiatan Mahasiswa Multimedia Fasilkom</p>
                </div>
            </section>

            <div class="card-section">
                <div style="margin-bottom: 20px;"></div>
                <div class="table-controls" style="margin-bottom: 20px; display: flex; gap: 10px;">
                <input type="text" id="searchBooking" placeholder="Cari Kode atau Organisasi..." style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; flex: 1;">

                <select id="filterGedung" style="padding: 8px; border-radius: 4px; border: 1px solid #ccc;">
                    <option value="Semua">Semua Gedung</option>
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
        </div>

    <div class="card-section">
        <h2 class="section-heading">Riwayat Peminjaman Gedung</h2>
        <div class="table-responsive">
        <div class="table-responsive">
            <table class="table-custom text-center align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Booking</th>
                        <th>Gedung / Ruangan</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal Acara</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riwayat as $key => $r)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="fw-bold">{{ $r['id_booking'] }}</td>
                            <td>{{ $r['nama_gedung'] }}</td>
                            <td class="text-uppercase">{{ $r['nama_kegiatan'] }}</td>
                            <td>{{ $r['tgl_mulai'] }}</td>
                            <td>
                                <span class="status-badge status-menunggu">
                                    {{ $r['status'] }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('peminjaman.status', $r['id_booking']) }}" class="btn-cek-progres">
                                    <i class="fas fa-search"></i> Cek Progres
                                </a>
                            </td>
                            <td>
                                <button class="btn-action btn-edit me-1">Edit</button>
                                <button class="btn-action btn-hapus">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">Belum ada data peminjaman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


    </div>
</section>
@push('scripts')
<script>
    console.log('Halaman HalUtama dimuat');
</script>
@endpush
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchBooking');
    const filterSelect = document.getElementById('filterGedung');
    const tableRows = document.querySelectorAll('.table-custom tbody tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const filterTerm = filterSelect.value.toLowerCase();

        tableRows.forEach(row => {
            // Kita ambil data dari kolom ID Booking (index 1), Gedung (index 2), dan Kegiatan (index 3)
            const idBooking = row.cells[1].textContent.toLowerCase();
            const namaGedung = row.cells[2].textContent.toLowerCase();
            const namaKegiatan = row.cells[3].textContent.toLowerCase();

            const matchesSearch = idBooking.includes(searchTerm) || namaKegiatan.includes(searchTerm);
            const matchesFilter = filterTerm === "semua" || namaGedung.includes(filterTerm);

            // Baris ditampilkan hanya jika cocok dengan search DAN filter
            if (matchesSearch && matchesFilter) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }

    // Jalankan fungsi setiap kali ada input atau perubahan select
    searchInput.addEventListener('input', filterTable);
    filterSelect.addEventListener('change', filterTable);
});
</script>
