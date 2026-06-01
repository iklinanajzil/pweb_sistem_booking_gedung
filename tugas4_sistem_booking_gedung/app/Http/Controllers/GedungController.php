<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GedungController extends Controller
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
            ],
            [
                'nama' => 'Gedung Soetardjo',
                'kapasitas' => 1000,
                'fitur' => 'ac',
                'gambar' => 'img/soetardjo.png'
            ],
            [
                'nama' => 'lab Terpadu',
                'kapasitas' => 50,
                'fitur' => 'ac',
                'gambar' => 'img/lab.png'
            ],
            [
                'nama' => 'Aula Fasilkom',
                'kapasitas' => 400,
                'fitur' => 'ac',
                'gambar' => 'img/fasilkom.png'
            ],
            [
                'nama' => 'CDAST Utara lantai 4',
                'kapasitas' => 80,
                'fitur' => 'ac',
                'gambar' => 'img/cdast-utara.png'
            ], [
                'nama' => 'Aula FEB',
                'kapasitas' => 100,
                'fitur' => 'ac',
                'gambar' => 'img/feb.png'
            ],
            [
                'nama' => 'Aula FKM',
                'kapasitas' => 200,
                'fitur' => 'ac',
                'gambar' => 'img/fkm.png'
            ],
            [
                'nama' => 'CDAST selatan lantai 8',
                'kapasitas' => 120,
                'fitur' => 'ac',
                'gambar' => 'img/cdast-selatan.png'
            ],
            [
                'nama' => 'Gedung Kewirausahaan',
                'kapasitas' => 250,
                'fitur' => 'ac',
                'gambar' => 'img/kewirausahaan.png'
            ],
             [
                'nama' => 'Double Way',
                'kapasitas' => 2000,
                'fitur' => 'outdoor',
                'gambar' => 'img/umum.png'
            ],
            [
                'nama' => 'CDAST selatan lantai 8',
                'kapasitas' => 120,
                'fitur' => 'ac',
                'gambar' => 'img/cdast-selatan.png'
            ],
            [
                'nama' => 'Rektorat Lantai 3',
                'kapasitas' => 250,
                'fitur' => 'ac',
                'gambar' => 'img/rektorat.png'
            ],
            [
                'nama' => 'Student Center',
                'kapasitas' => 400,
                'fitur' => 'ac',
                'gambar' => 'img/student-center.png'
            ]
        ];
        // Langsung mengembalikan view prosedur
        return view('gedung', compact('daftarGedung'));
    }
}
