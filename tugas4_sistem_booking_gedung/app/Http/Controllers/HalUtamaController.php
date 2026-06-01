<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalUtamaController extends Controller
{
    public function index()
    {
        $daftarGedung = [
            [
                'nama' => 'Auditorium',
                'kapasitas' => 1000,
                'fitur' => 'ac',
                'gambar' => 'img/auditorium.png'
            ],
            [
                'nama' => 'Aula KAUJE',
                'kapasitas' => 500,
                'fitur' => 'outdoor',
                'gambar' => 'img/kauje.png'
            ],
            [
                'nama' => 'PKM',
                'kapasitas' => 400,
                'fitur' => 'outdoor',
                'gambar' => 'img/pkm.png'
            ],
            [
                'nama' => 'Mas Soerachman',
                'kapasitas' => 300,
                'fitur' => 'ac',
                'gambar' => 'img/soerachman.png'
            ]
        ];

        $riwayat = [
            [
                'id_booking' => 'BK-001',
                'gedung' => 'Auditorium',
                'penyelenggara' => 'Himpunan Mahasiswa SI',
                'status' => 'Diproses'
            ],
            [
                'id_booking' => 'BK-002',
                'gedung' => 'Gedung Soetardjo',
                'penyelenggara' => 'UKM Seni',
                'status' => 'Diproses'
            ]
        ];

        // Statistik dummy
        $stats = [
            'menunggu' => 2,
            'total' => 15,
            'disetujui' => 10
        ];

        return view('HalUtama', compact('daftarGedung', 'riwayat', 'stats'));
        return view('gedung', compact('daftarGedung'));
    }
}



