# 🏢 ROOMBOOKING UNEJ
### Sistem Booking Ruangan & Gedung Universitas Jember

![Laravel](https://img.shields.io/badge/Laravel-11.x-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.1+-blue?logo=php)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.1.3-purple?logo=bootstrap)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-orange?logo=mysql)
![License](https://img.shields.io/badge/License-MIT-green)

> **RoomBooking UNEJ** adalah sistem informasi peminjaman ruangan berbasis web yang dikembangkan khusus untuk **Universitas Jember**. Sistem ini memungkinkan organisasi mahasiswa mengajukan peminjaman ruangan secara online, sementara admin dapat mengelola dan memverifikasi pengajuan dengan mudah, cepat, dan terintegrasi.

[![Demo Aplikasi]](#) [![Laporan]](#) [![Video Demo]](#)

---

## 📋 Daftar Isi

- [✨ Fitur Aplikasi](#-fitur-aplikasi)
- [🛠 Teknologi yang Digunakan](#-teknologi-yang-digunakan)
- [💻 Persyaratan Sistem](#-persyaratan-sistem)
- [📥 Instalasi](#-instalasi)
- [⚙️ Konfigurasi](#️-konfigurasi)
- [👥 Akun Default](#-akun-default)
- [📊 Struktur Database](#-struktur-database)
- [📸 Screenshot](#-screenshot)
- [🔧 Troubleshooting](#-troubleshooting)
- [📁 Struktur Folder](#-struktur-folder)
- [👨‍💻 Kontributor](#-kontributor)
- [📝 Lisensi](#-lisensi)

---

## ✨ Fitur Aplikasi

### 👑 Admin

| No | Fitur | Deskripsi |
|----|-------|------------|
| 1 | **Dashboard Admin** | Menampilkan statistik total pengajuan, disetujui, pending, ditolak, total organisasi, total ruangan, dan 10 peminjaman terbaru |
| 2 | **Kelola Ruangan** | CRUD ruangan lengkap (Tambah, Edit, Hapus, Detail) + upload foto ruangan |
| 3 | **Kelola Organisasi** | CRUD organisasi (admin yang mendaftarkan, TIDAK ADA registrasi publik) |
| 4 | **Manajemen Peminjaman** | Lihat daftar peminjaman, setujui, tolak (dengan alasan), lihat detail |
| 5 | **Profil Admin** | Ubah foto profil, nama, email, dan password |
| 6 | **Dark/Light Mode** | Toggle tema tampilan (gelap/terang) - tersimpan di cookie |

### 🏫 Organisasi

| No | Fitur | Deskripsi |
|----|-------|------------|
| 1 | **Dashboard Organisasi** | Cuaca, statistik kunjungan, ruangan tersedia, rekomendasi ruangan, 10 riwayat terakhir |
| 2 | **Daftar Ruangan** | Search, filter, detail ruangan, dan tombol booking langsung |
| 3 | **Booking Ruangan** | Form peminjaman lengkap dengan upload surat izin dan proposal kegiatan |
| 4 | **Riwayat Peminjaman** | Filter berdasarkan status (pending/disetujui/ditolak), search, dan detail |
| 5 | **Prosedur Peminjaman** | Informasi tata cara peminjaman, persyaratan, dan FAQ |
| 6 | **Profil Organisasi** | Ubah logo, nama, email, ketua, jumlah anggota, telepon, dan password |
| 7 | **Dark/Light Mode** | Toggle tema tampilan (gelap/terang) - tersimpan di cookie |

### 🔧 Fitur Teknis

| No | Fitur | Deskripsi |
|----|-------|------------|
| 1 | **Autentikasi** | Login/Logout dengan session, proteksi halaman berdasarkan role (admin/organisasi) |
| 2 | **Lupa Password** | Kirim link reset password ke email via Mailtrap (support testing) |
| 3 | **AJAX/Fetch API** | Pencarian organisasi real-time tanpa reload halaman |
| 4 | **Cek Ketersediaan** | Pengecekan jadwal ruangan secara real-time saat booking |
| 5 | **Modal Dinamis** | Detail data ditampilkan via modal dengan loading indicator |
| 6 | **Responsive Design** | Tampilan optimal di desktop, tablet, dan mobile |
| 7 | **Validasi Form** | Client-side (JavaScript) + Server-side (Laravel Validation) |

---

## 🛠 Teknologi yang Digunakan

| Komponen | Teknologi | Versi |
|----------|-----------|-------|
| **Backend Framework** | Laravel | 11.x |
| **Bahasa Pemrograman** | PHP | 8.1+ |
| **Database** | MySQL / MariaDB | 5.7+ |
| **Frontend Framework** | Bootstrap | 5.1.3 |
| **JavaScript** | Vanilla JS (Fetch API) | ES6 |
| **Icons** | Font Awesome | 6.0 |
| **Font** | Google Fonts (Poppins) | - |
| **Email Testing** | Mailtrap.io | - |
| **Version Control** | Git | - |

---

## 💻 Persyaratan Sistem

Sebelum menginstal, pastikan komputer/server Anda memenuhi persyaratan berikut:

| Komponen | Minimum | Rekomendasi |
|----------|---------|-------------|
| **PHP** | 8.1 | 8.2 atau lebih tinggi |
| **Composer** | 2.x | 2.5+ |
| **Node.js** | 16.x | 18.x atau 20.x |
| **NPM** | 8.x | 9.x atau 10.x |
| **MySQL** | 5.7 | 8.0+ |
| **Web Server** | Apache/Nginx | Apache 2.4+ / Nginx 1.18+ |
| **Browser** | - | Chrome, Firefox, Edge (versi terbaru) |

### Cara Cek Versi

```bash
php -v               # Cek versi PHP
composer --version   # Cek versi Composer
node -v              # Cek versi Node.js
npm -v               # Cek versi NPM
mysql --version      # Cek versi MySQL
