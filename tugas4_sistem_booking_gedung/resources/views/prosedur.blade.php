@extends('layouts.app')
@section('content')
    <div class="container">
        <section class="sub-hero">
            <div class="hero-content-card">
                <div class="hero-badge">Panduan Pengguna</div>
                <h1>PROSEDUR PEMINJAMAN</h1>
                <div class="hero-divider"></div>
                <p>Ikuti 4 langkah mudah untuk reservasi fasilitas di lingkungan Universitas Jember.</p>
            </div>
        </section>

        <div class="card-section">
            <div class="timeline-wrapper">

                <div class="timeline-step">
                    <div class="step-number">01</div>
                    <div class="timeline-content">
                        <div class="step-icon">🏢</div>
                        <div class="step-text">
                            <h3>Pilih Gedung & Jadwal</h3>
                            <p>Cek ketersediaan gedung melalui menu <strong>Daftar Gedung</strong>. Pastikan kapasitas dan fasilitas sesuai dengan kebutuhan acara Anda.</p>
                        </div>
                    </div>
                </div>

                <div class="timeline-step">
                    <div class="step-number">02</div>
                    <div class="timeline-content">
                        <div class="step-icon">📂</div>
                        <div class="step-text">
                            <h3>Siapkan Berkas Digital</h3>
                            <p>Siapkan Scan Surat Izin Kegiatan (SIK) dan Proposal kegiatan dalam format <strong>PDF</strong> dengan ukuran maksimal 2MB per file.</p>
                        </div>
                    </div>
                </div>

                <div class="timeline-step">
                    <div class="step-number">03</div>
                    <div class="timeline-content">
                        <div class="step-icon">✍️</div>
                        <div class="step-text">
                            <h3>Isi Formulir Pengajuan</h3>
                            <p>Klik tombol <strong>"Pinjam Sekarang"</strong> pada halaman detail gedung. Isi data peminjam, waktu penggunaan, dan unggah berkas yang diminta.</p>
                        </div>
                    </div>
                </div>

                <div class="timeline-step">
                    <div class="step-number">04</div>
                    <div class="timeline-content">
                        <div class="step-icon">⏳</div>
                        <div class="step-text">
                            <h3>Verifikasi & Monitoring</h3>
                            <p>Pantau status pengajuan Anda secara berkala di menu <strong>Riwayat Peminjaman</strong>. Proses verifikasi biasanya memakan waktu 2x24 jam kerja.</p>
                        </div>
                    </div>
                </div>

            </div>

            <div style="text-align: center; margin-top: 50px; padding-bottom: 20px;">
                <a href="#" class="btn-download">
                    <span>📥</span> Download Panduan Lengkap (PDF)
                </a>
                <p style="margin-top: 15px; color: #94a3b8; font-size: 0.8rem;">Versi Terbaru: Maret 2026</p>
            </div>
        </div>
    </div>
@endsection
