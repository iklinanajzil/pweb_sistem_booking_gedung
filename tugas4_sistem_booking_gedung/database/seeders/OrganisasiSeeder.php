<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrganisasiSeeder extends Seeder
{
    public function run()
    {
        $organisasi = [
            ['id' => 'ORG001', 'nama' => 'BEM Fasilkom', 'jenis' => 'BEM', 'ketua' => 'Bagus aji'],
            ['id' => 'ORG002', 'nama' => 'DPM Fasilkom', 'jenis' => 'BEM', 'ketua' => 'Ahmad Fauzi'],
            ['id' => 'ORG003', 'nama' => 'HIMASIF', 'jenis' => 'Himpunan', 'ketua' => 'Bayu Pratama'],
            ['id' => 'ORG004', 'nama' => 'HIMATIF', 'jenis' => 'Himpunan', 'ketua' => 'Siti Aminah'],
            ['id' => 'ORG005', 'nama' => 'UKM Multimedia', 'jenis' => 'UKM', 'ketua' => 'Rizky Ramadhan'],
            ['id' => 'ORG006', 'nama' => 'UKM Olahraga', 'jenis' => 'UKM', 'ketua' => 'Dimas Andrean'],
            ['id' => 'ORG007', 'nama' => 'UKM Seni', 'jenis' => 'UKM', 'ketua' => 'Larasati Putri'],
            ['id' => 'ORG008', 'nama' => 'UKM Kerohanian', 'jenis' => 'UKM', 'ketua' => 'Faisal Haris'],
            ['id' => 'ORG009', 'nama' => 'UKM Kewirausahaan', 'jenis' => 'UKM', 'ketua' => 'Eka Wahyuni'],
            ['id' => 'ORG010', 'nama' => 'UKM Pecinta Alam', 'jenis' => 'UKM', 'ketua' => 'Guntur Saputra'],
        ];

        foreach ($organisasi as $data) {
            DB::table('organisasis')->insert([
                'id_organisasi' => $data['id'],
                'nama_organisasi' => $data['nama'],
                'jenis_organisasi' => $data['jenis'],
                'nama_ketua' => $data['ketua'],
                'jumlah_pengurus' => rand(20, 60), // Angka acak antara 20-60
                'username' => strtolower(str_replace(' ', '', $data['nama'])),
                'password' => Hash::make('password123'), // Password default
                'email' => strtolower(str_replace(' ', '', $data['nama'])) . '@unej.ac.id',
                'no_hp' => '0812345678' . rand(10, 99),
                'is_aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
