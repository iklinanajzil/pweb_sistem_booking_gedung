@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-section" style="max-width: 800px; margin: auto;">

        <div style="text-align: center; margin-bottom: 40px;">
            <span class="category-badge">ID BOOKING: #{{ $id }}</span>
            <h2 style="margin-top: 10px;">Detail Progress Pengajuan</h2>
        </div>

        <div class="timeline-container">
            <div class="timeline-item active">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h4 style="color: var(--primary)">Dokumen Diterima</h4>
                    <p style="font-size: 13px; color: #64748b;">23 Mar 2026 - 09:00 WIB</p>
                    <small>Berkas telah masuk ke database sistem Sarpras.</small>
                </div>
            </div>

            <div class="timeline-item active">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h4 style="color: var(--primary)">Verifikasi Admin</h4>
                    <p style="font-size: 13px; color: #64748b;">24 Mar 2026 - 14:20 WIB</p>
                    <small>Admin sedang memeriksa kelengkapan proposal dan surat izin.</small>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content" style="opacity: 0.6;">
                    <h4>Penerbitan Izin</h4>
                    <p>Menunggu tanda tangan digital Kepala Biro.</p>
                </div>
            </div>
        </div>

        <div style="background: #fff9eb; border: 1px solid #fde68a; padding: 15px; border-radius: 8px; margin-top: 20px;">
            <p style="font-size: 14px; color: #92400e;">
                <strong>Catatan Admin:</strong> Mohon pastikan nomor HP penyelenggara aktif untuk koordinasi teknis di lapangan.
            </p>
        </div>

        <div style="margin-top: 30px; text-align: center;">
            <a href="{{ route('riwayat.index') }}" class="btn-book" style="text-decoration: none; background: #64748b;"> Kembali ke Riwayat</a>
        </div>
    </div>
</div>
@endsection
