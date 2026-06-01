<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        // Data dummy untuk riwayat peminjaman
        $riwayat = [
            [
                'id_booking' => 'BK-001',
                'nama_gedung' => 'Auditorium',
                'nama_kegiatan' => 'Seminar',
                'tgl_mulai' => '2026-05-10',
                'status' => 'Disetujui',
                'keterangan' => 'Klik untuk detail'
            ],
            [
                'id_booking' => 'BK-002',
                'nama_gedung' => 'PKM',
                'nama_kegiatan' => 'Seminar',
                'tgl_mulai' => '2026-05-15',
                'status' => 'Diproses',
                'keterangan' => 'Klik untuk detail'
            ],
            [
                'id_booking' => 'BK-003',
                'nama_gedung' => 'Aula KAUJE',
                'nama_kegiatan' => 'Seminar',
                'tgl_mulai' => '2026-05-05',
                'status' => 'Ditolak',
                'keterangan' => 'Klik untuk detail'
            ],
            [
            'id_booking' => 'UNJ-2026-99',
            'nama_gedung' => 'Aula Lantai 3',
            'nama_kegiatan' => 'UKM MULTIMEDIA',
            'tgl_mulai' => '2026-04-30 06:30',
            'status' => 'Menunggu' // Kita gunakan 'Menunggu' agar sesuai gambar 2
        ],
        [
            'id_booking' => 'UNJ-2026-99',
            'nama_gedung' => 'Aula KAUJE',
            'nama_kegiatan' => 'HIMAGRO',
            'tgl_mulai' => '2026-04-30 22:44',
            'status' => 'Menunggu'
        ],
        [
            'id_booking' => 'UNJ-2026-99',
            'nama_gedung' => 'Aula Fasilkom',
            'nama_kegiatan' => 'ukkm kewirausahaan',
            'tgl_mulai' => '2026-05-05 23:35',
            'status' => 'Menunggu'
        ],
        [
            'id_booking' => 'UNJ-2026-99',
            'nama_gedung' => 'Gedung Kewirausahaan',
            'nama_kegiatan' => 'UKKM Kewirausahaan',
            'tgl_mulai' => '2026-05-02 06:31',
            'status' => 'Menunggu'
        ],
        [
            'id_booking' => 'UNJ-2026-005',
            'nama_gedung' => 'Aula FEB',
            'nama_kegiatan' => 'KSPM-GI UNEJ',
            'tgl_mulai' => '2026-05-02 06:59',
            'status' => 'Menunggu'
        ]
        ];

        return view('riwayat', compact('riwayat'));
    }

    public function status($id)
    {
        return view('status', compact('id'));
    }
}
