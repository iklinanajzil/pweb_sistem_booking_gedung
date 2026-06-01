<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Organisasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Iklina Najzil',
            'username' => 'iklinanajzil',
            'email' => 'iklinanajzil@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Beri profil organisasi untuk admin (UKM Multimedia)
        $admin->organisasi()->create([
            'nama_organisasi' => 'UKM Multimedia Fasilkom',
            'jenis_organisasi' => 'UKM Fakultas',
            'nama_ketua' => 'Budi Harjo',
            'no_hp' => '08123456789',
            'jumlah_pengurus' => 57,
            'is_aktif' => true,
        ]);

        // 2. Buat Data Organisasi Contoh (HIMASIF)
        $user1 = User::create([
            'name' => 'HIMASIF UNEJ',
            'username' => 'himasif',
            'email' => 'himasif@unej.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'organisasi',
        ]);

        $user1->organisasi()->create([
            'nama_organisasi' => 'Himpunan Mahasiswa Sistem Informasi',
            'jenis_organisasi' => 'Himpunan',
            'nama_ketua' => 'Ketua Himasif',
            'no_hp' => '08987654321',
            'jumlah_pengurus' => 40,
            'is_aktif' => true,
        ]);

        // 3. Buat Data Organisasi Contoh (UKM Musik)
        $user2 = User::create([
            'name' => 'UKM Musik',
            'username' => 'ukmmusik',
            'email' => 'musik@unej.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'organisasi',
        ]);

        $user2->organisasi()->create([
            'nama_organisasi' => 'Unit Kegiatan Mahasiswa Musik',
            'jenis_organisasi' => 'UKM Universitas',
            'nama_ketua' => 'Ketua Musik',
            'no_hp' => '0855555555',
            'jumlah_pengurus' => 25,
            'is_aktif' => true,
        ]);

        $user2 = User::create([
            'name' => 'BEM UNEJ',
            'username' => 'bemunej',
            'email' => 'bemunej@unej.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'organisasi',
        ]);

        $user2->organisasi()->create([
            'nama_organisasi' => 'BEM Universitas Jember',
            'jenis_organisasi' => 'UKM Universitas',
            'nama_ketua' => 'Ketua BEM UNEJ',
            'no_hp' => '085555555555',
            'jumlah_pengurus' => 25,
            'is_aktif' => true,
        ]);
    }
}
