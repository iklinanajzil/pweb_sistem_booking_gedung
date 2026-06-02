# 🏢 ROOMBOOKING UNEJ
### Sistem Booking Ruangan & Gedung Universitas Jember

![Laravel](https://img.shields.io/badge/Laravel-11.x-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.1+-blue?logo=php)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.1.3-purple?logo=bootstrap)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-orange?logo=mysql)
![License](https://img.shields.io/badge/License-MIT-green)

> **RoomBooking UNEJ** adalah sistem informasi peminjaman ruangan berbasis web yang dikembangkan khusus untuk Universitas Jember. Sistem ini hadir untuk mengatasi permasalahan peminjaman ruangan yang masih dilakukan secara manual, seperti:
- Proses administrasi yang lama dan berbelit
- Sering terjadinya bentrokan jadwal (double booking)
- Sulitnya melacak status pengajuan peminjaman
- Data peminjaman tidak terkelola dengan baik
- Tidak adanya transparansi ketersediaan ruangan
- Dengan sistem ini, organisasi mahasiswa dapat mengajukan peminjaman ruangan secara online, sementara admin dapat mengelola dan memverifikasi pengajuan dengan mudah dan cepat.

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
- [🔧 Troubleshooting](#-troubleshooting)
- [👨‍💻 Kontributor](#-kontributor)


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
| **Database** | MySQL | 5.7+ |
| **Frontend Framework** | Bootstrap | 5.1.3 |
| **JavaScript** | Fetch API | ES6 |
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
| **MySQL** | 5.7 | 8.0+ ||
| **Web Server** | | Laragon/XAMPP
| **Browser** | - | Chrome, Firefox, Edge (versi terbaru) |

### Cara Cek Versi

```bash
php -v               # Cek versi PHP
composer --version   # Cek versi Composer
node -v              # Cek versi Node.js
npm -v               # Cek versi NPM
mysql --version      # Cek versi MySQL


## 📥 Instalasi

### Prasyarat

Pastikan komputer/server Anda telah terinstall:

| Software | Minimum Version |
|----------|-----------------|
| PHP | 8.1 atau lebih tinggi |
| Composer | 2.x |
| Node.js & NPM | Node 16+ / NPM 8+ |
| MySQL/MariaDB | MySQL 5.7+ |

### Langkah 1: Clone Repository

```bash
git clone https://github.com/iklinanajzil/pweb_sistem_booking_gedung/PWEB_TugasAkhir.git
cd PWEB_TugasAkhir
```

### Langkah 2: Install Dependensi PHP (Composer)

```bash
composer install
```

### Langkah 3: Install Dependensi JavaScript (NPM)

```bash
npm install
npm run build
```

### Langkah 4: Konfigurasi Environment

```bash
cp .env.example .env
```

### Langkah 5: Generate Application Key

```bash
php artisan key:generate
```

### Langkah 6: Konfigurasi Database

Buka file `.env` dan sesuaikan:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=roombooking_unej
DB_USERNAME=root
DB_PASSWORD=
```

### Langkah 7: Jalankan Migrasi

```bash
php artisan migrate
```

### Langkah 8: Jalankan Seeder

```bash
php artisan db:seed --class=AdminSeeder
```

### Langkah 9: Buat Symlink Storage

```bash
php artisan storage:link
```

### Langkah 10: Konfigurasi Email (Opsional)

```env
MAIL_MAILER=log
MAIL_FROM_ADDRESS=noreply@roombooking.test
MAIL_FROM_NAME="RoomBooking UNEJ"
```

### Langkah 11: Jalankan Server

```bash
php artisan serve
```

Aplikasi akan berjalan di: **http://127.0.0.1:8000**

---

## 👥 Akun Default

| Role | Email | Password |
|------|-------|----------|
| **Admin** | admin@unej.ac.id | password123 |

> Organisasi harus ditambahkan oleh admin melalui menu **Kelola Organisasi**.

---


## 📊 Struktur Database
### Detail Tabel

| Tabel | Jumlah Kolom | Primary Key | Foreign Key |
|-------|--------------|-------------|-------------|
| `users` | 14 | `id` | - |
| `ruangan` | 9 | `id` | - |
| `peminjaman` | 16 | `id` | `user_id`, `ruangan_id` |
| `visitor_stats` | 5 | `id` | `user_id` |
| `password_reset_tokens` | 3 | `email` | - |


---

## ⚙️ Konfigurasi

### Konfigurasi Database (.env)

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=roombooking_unej
DB_USERNAME=root
DB_PASSWORD=
```

### Konfigurasi Email (Mailtrap untuk Testing)

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@roombooking.test
MAIL_FROM_NAME="RoomBooking UNEJ"
```

### Konfigurasi Email (Log untuk Testing Tanpa Email)

```env
MAIL_MAILER=log
MAIL_FROM_ADDRESS=noreply@roombooking.test
MAIL_FROM_NAME="RoomBooking UNEJ"
```

### Konfigurasi Aplikasi (.env)

```env
APP_NAME="RoomBooking UNEJ"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000
```

### Konfigurasi Session

```env
SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_DOMAIN=null
```

---

## 🔧 Troubleshooting
### 1. Error: Route [dashboard] not defined
**Penyebab:** Route dashboard tidak terdaftar atau user belum login
**Solusi:**
```bash
php artisan route:clear
php artisan cache:clear
```

### 2. Error: Class not found
**Penyebab:** Composer autoload tidak update
**Solusi:**
```bash
composer dump-autoload
```

### 3. Error: 500 Internal Server Error
**Penyebab:** Cache atau konfigurasi bermasalah
**Solusi:**
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

### 4. Error: Database connection failed
**Penyebab:** Konfigurasi database di .env salah
**Solusi:** Cek kembali:
- `DB_HOST`, `DB_PORT`, `DB_DATABASE`
- Pastikan database server berjalan
- Pastikan database sudah dibuat

### 5. Error: SQLSTATE[42S02] - Table not found
**Penyebab:** Migrasi belum dijalankan
**Solusi:**
```bash
php artisan migrate
```

### 6. Error: Storage symlink not found
**Penyebab:** Symlink storage belum dibuat
**Solusi:**
```bash
php artisan storage:link
```

### 7. Error: File upload failed (PDF/Gambar)
**Penyebab:** Ukuran file melebihi batas
**Solusi:** Kompres file atau ubah `max:2048` menjadi `max:8192` di controller

### 8. Error: Email not sent (Lupa password)
**Penyebab:** Konfigurasi email salah
**Solusi:**
- Set `MAIL_MAILER=log` untuk testing
- Cek email di `storage/logs/laravel.log`
- Atau daftar di [Mailtrap.io](https://mailtrap.io) untuk SMTP gratis

### 9. Dark mode tidak berfungsi
**Penyebab:** Cookie atau cache browser
**Solusi:** Hapus cookie browser atau gunakan mode incognito

### 10. Error: MethodNotAllowedHttpException
**Penyebab:** Method HTTP salah (POST vs GET)
**Solusi:** Cek method form di blade (gunakan `@method` yang sesuai)

### 11. Error: CSRF token mismatch
**Penyebab:** Token CSRF tidak valid atau expired
**Solusi:** Refresh halaman atau tambahkan `@csrf` di form

### 12. Error: 403 Forbidden (CheckRole)
**Penyebab:** User tidak memiliki role yang sesuai
**Solusi:** Pastikan user login dengan role yang benar (admin/organisasi)

---

## 👨‍💻 Kontributor

| Nama | NIM | Kontak | Kontribusi |
|------|------|--------|------------|
| **IKLINA NAJZIL MUHSININA** | 242410101001 | iklinanajzil@gmail.com | Backend, Frontend, Database, Dokumentasi |

**Terima kasih telah menggunakan RoomBooking UNEJ!** 🎉
