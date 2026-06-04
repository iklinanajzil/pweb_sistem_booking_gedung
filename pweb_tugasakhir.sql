-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 03, 2026 at 01:05 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pweb_tugasakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `ruangan_id` bigint UNSIGNED NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `waktu_mulai` datetime DEFAULT NULL,
  `waktu_selesai` datetime DEFAULT NULL,
  `kategori_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_surat_izin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proposal_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_tambahan` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','disetujui','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `alasan_ditolak` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `ruangan_id`, `tanggal_pengajuan`, `tanggal_pinjam`, `waktu_mulai`, `waktu_selesai`, `kategori_kegiatan`, `bukti_surat_izin`, `proposal_kegiatan`, `keterangan_tambahan`, `status`, `alasan_ditolak`, `created_at`, `updated_at`) VALUES
(1, 2, 4, '2026-05-15', NULL, NULL, NULL, 'Seminar', '1778828879_surat_LKM2_KEL3.pdf', '1778828880_proposal_LKM2_KEL3.pdf', 'akan dilaksanakan seminar tentang investasi untuk generasi muda', 'pending', NULL, '2026-05-15 00:08:00', '2026-05-15 00:08:00'),
(2, 4, 2, '2026-05-15', NULL, NULL, NULL, 'Seminar', '1778834048_surat_LKM2_KEL3.pdf', '1778834048_proposal_Penjualan, Pengadaan, Perencanaan.pdf', '-', 'pending', NULL, '2026-05-15 01:34:08', '2026-05-15 01:34:08'),
(3, 4, 4, '2026-05-15', NULL, NULL, NULL, 'Pelatihan', '1778834177_surat_LKM2_KEL3.pdf', '1778834177_proposal_Accounting & Finance, SDM.pdf', 'diklat pengurus baru', 'pending', NULL, '2026-05-15 01:36:17', '2026-05-15 01:36:17'),
(4, 2, 2, '2026-05-15', '2026-05-30', '2026-05-30 07:00:00', '2026-05-30 15:00:00', 'Lainnya', '1778842352_surat_LKM2_KEL3.pdf', '1778842352_proposal_Accounting & Finance, SDM.pdf', '-', 'pending', NULL, '2026-05-15 10:52:32', '2026-05-15 10:52:32'),
(5, 4, 2, '2026-05-15', '2026-05-30', '2026-05-30 07:07:00', '2026-05-30 13:00:00', 'Lainnya', '1778842532_surat_LKM2_KEL3.pdf', '1778842532_proposal_LKM2_KEL3.pdf', '-', 'disetujui', NULL, '2026-05-15 10:55:32', '2026-05-15 13:12:29'),
(6, 4, 2, '2026-05-15', '2026-05-30', '2026-05-30 07:00:00', '2026-05-30 15:00:00', 'Lainnya', '1778842638_surat_LKM2_KEL3.pdf', '1778842638_proposal_Penjualan, Pengadaan, Perencanaan.pdf', NULL, 'pending', NULL, '2026-05-15 10:57:18', '2026-05-15 10:57:18'),
(7, 4, 4, '2026-05-15', '2026-05-30', '2026-05-30 07:00:00', '2026-05-30 15:00:00', 'Lainnya', '1778843354_surat_Accounting & Finance, SDM.pdf', '1778843354_proposal_LKM2_KEL3.pdf', '-', 'pending', NULL, '2026-05-15 11:09:14', '2026-05-15 11:09:14'),
(8, 2, 4, '2026-05-15', '2026-05-30', '2026-05-30 07:00:00', '2026-05-30 15:00:00', 'Seminar', '1778843533_surat_LKM2_KEL3.pdf', '1778843533_proposal_Accounting & Finance, SDM.pdf', '-', 'disetujui', NULL, '2026-05-15 11:12:13', '2026-05-15 11:17:36'),
(9, 2, 4, '2026-05-15', '2026-05-30', '2026-05-30 07:00:00', '2026-05-30 15:00:00', 'Pelatihan', '1778843684_surat_LKM2_KEL3.pdf', '1778843684_proposal_Accounting & Finance, SDM.pdf', '-', 'pending', NULL, '2026-05-15 11:14:44', '2026-05-15 11:14:44'),
(10, 2, 8, '2026-05-15', '2026-05-27', '2026-05-27 13:00:00', '2026-05-27 17:00:00', 'Rapat Organisasi', '1778850061_surat_Accounting & Finance, SDM.pdf', NULL, 'Rapat membahas program kerja, dan dihadiri 53 anggota pengurus', 'pending', NULL, '2026-05-15 13:01:01', '2026-05-15 13:01:01'),
(11, 4, 8, '2026-05-15', '2026-05-27', '2026-05-27 13:00:00', '2026-05-27 17:00:00', 'Kegiatan Seni', '1778853419_surat_Accounting & Finance, SDM.pdf', NULL, NULL, 'ditolak', NULL, '2026-05-15 13:57:00', '2026-05-15 14:40:59'),
(12, 4, 8, '2026-05-15', '2026-05-27', '2026-05-27 13:00:00', '2026-05-27 17:00:00', 'Rapat Organisasi', NULL, NULL, '-', 'disetujui', NULL, '2026-05-15 14:35:50', '2026-05-15 14:40:14'),
(13, 2, 8, '2026-05-15', '2026-05-29', '2026-05-29 13:00:00', '2026-05-29 15:00:00', 'Rapat Organisasi', '1778857871_surat_Accounting & Finance, SDM.pdf', NULL, NULL, 'disetujui', NULL, '2026-05-15 15:11:11', '2026-05-20 08:54:09'),
(14, 2, 4, '2026-05-20', '2026-05-29', '2026-05-29 06:00:00', '2026-05-29 15:00:00', 'Kegiatan Seni', 'bukti_surat/1779256882_surat_A_KEL12_PROGRES1.pdf', 'proposal/1779256882_proposal_2859-61-10851-1-10-20240611.pdf', NULL, 'pending', NULL, '2026-05-20 06:01:22', '2026-05-20 06:01:22'),
(15, 2, 2, '2026-05-20', '2026-05-25', '2026-05-25 02:00:00', '2026-05-25 16:00:00', 'Pelatihan', 'uploads/bukti_surat/1779258195_surat_PWEB_Tugas P1.pdf', 'uploads/proposal/1779258195_proposal_A_KEL12_PROGRES 1.pdf', NULL, 'ditolak', 'peminjaman jam 02:00 tidak diperbolehkan', '2026-05-20 06:23:15', '2026-05-30 08:38:54'),
(16, 2, 2, '2026-05-20', '2026-05-27', '2026-05-27 12:00:00', '2026-05-27 16:00:00', 'Workshop', 'uploads/bukti_surat/1779259157_surat_Pengukuran Kinerja TI.pdf', 'uploads/proposal/1779259157_proposal_SCM & CRM.pdf', NULL, 'pending', NULL, '2026-05-20 06:39:17', '2026-05-20 06:39:17'),
(17, 7, 7, '2026-05-20', '2026-05-24', '2026-05-24 09:00:00', '2026-05-24 15:00:00', 'Lainnya', 'uploads/bukti_surat/1779265124_surat_Context Diagram_SEEDTRACK.jpg', 'uploads/proposal/1779265124_proposal_A_KEL12_PROGRES 1.pdf', NULL, 'disetujui', NULL, '2026-05-20 08:18:44', '2026-05-20 08:32:07'),
(18, 8, 8, '2026-05-20', '2026-05-26', '2026-05-26 09:00:00', '2026-05-26 14:00:00', 'Seminar', 'uploads/bukti_surat/1779268966_surat_SURAT IZIN.pdf', 'uploads/proposal/1779268966_proposal_PROPOSAL.pdf', 'Seminar tentang Penyuluhan Pertanian', 'pending', NULL, '2026-05-20 09:22:46', '2026-05-20 09:22:46'),
(19, 2, 4, '2026-05-22', '2026-05-28', '2026-05-28 10:00:00', '2026-05-28 16:00:00', 'Pelatihan', 'uploads/bukti_surat/1779460120_surat_SURAT IZIN.pdf', 'uploads/proposal/1779460120_proposal_proposal.png', 'pelatihan analisis fundamental', 'pending', NULL, '2026-05-22 14:28:40', '2026-05-22 14:28:40'),
(20, 14, 1, '2026-05-22', '2026-05-30', '2026-05-30 12:00:00', '2026-05-30 16:00:00', 'Seminar', 'uploads/bukti_surat/1779467062_surat_SURAT IZIN.pdf', 'uploads/proposal/1779467062_proposal_proposal.png', '-', 'ditolak', 'ruangan pada hari itu sedang dalam perbaikan', '2026-05-22 16:24:22', '2026-05-30 08:19:28'),
(21, 6, 1, '2026-05-22', '2026-06-06', '2026-06-06 12:00:00', '2026-06-06 17:00:00', 'Seminar', 'uploads/bukti_surat/1779467749_surat_SURAT IZIN.pdf', 'uploads/proposal/1779467749_proposal_proposal.png', '-', 'ditolak', NULL, '2026-05-22 16:35:49', '2026-05-30 07:55:23'),
(22, 14, 2, '2026-05-30', '2026-06-03', '2026-06-03 12:00:00', '2026-06-03 14:00:00', 'Seminar', NULL, NULL, '--', 'disetujui', NULL, '2026-05-30 05:27:31', '2026-05-30 07:55:02'),
(23, 14, 11, '2026-05-30', '2026-06-06', '2026-06-06 09:00:00', '2026-06-06 12:00:00', 'Olahraga', NULL, NULL, '500 peserta', 'ditolak', NULL, '2026-05-30 05:29:42', '2026-05-30 07:54:53'),
(24, 14, 10, '2026-05-30', '2026-06-04', '2026-06-04 09:00:00', '2026-06-04 16:00:00', 'Olahraga', 'uploads/bukti_surat/1780121807_surat_SURATIZIN.pdf', 'uploads/proposal/1780121807_proposal_proposal.png', 'olahraga basket', 'disetujui', NULL, '2026-05-30 06:16:48', '2026-05-30 07:54:39'),
(26, 18, 2, '2026-06-01', '2026-06-08', '2026-06-08 07:00:00', '2026-06-08 12:00:00', 'Pelatihan', 'uploads/bukti_surat/1780309104_surat_SURATIZIN.pdf', 'uploads/proposal/1780309104_proposal_PROPOSAL.pdf', NULL, 'pending', NULL, '2026-06-01 10:18:24', '2026-06-01 10:18:24'),
(27, 18, 15, '2026-06-01', '2026-06-08', '2026-06-08 06:00:00', '2026-06-08 08:00:00', 'Workshop', 'uploads/bukti_surat/1780309292_surat_SURATIZIN.pdf', 'uploads/proposal/1780309292_proposal_PROPOSAL.pdf', 'Kegiatannya dilakukan disekitar jalan', 'pending', NULL, '2026-06-01 10:21:32', '2026-06-01 10:21:32'),
(29, 14, 17, '2026-06-02', '2026-06-06', '2026-06-06 11:00:00', '2026-06-06 15:00:00', 'Seminar', 'uploads/bukti_surat/1780365537_surat_SURATIZIN.pdf', 'uploads/proposal/1780365537_proposal_PROPOSAL.pdf', 'Seminar yang dilakukan oleh tim basket yang sukses dan sudah memenangkan banyak juara', 'pending', NULL, '2026-06-02 01:58:57', '2026-06-02 01:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-weather_Jember', 'a:6:{s:4:\"city\";s:6:\"Jember\";s:11:\"temperature\";s:5:\"23°C\";s:11:\"description\";s:5:\"Sunny\";s:8:\"humidity\";s:3:\"81%\";s:10:\"wind_speed\";s:6:\"4 km/h\";s:10:\"feels_like\";s:5:\"19°C\";}', 1780363647),
('laravel-cache-weather_organisasi_Jember', 'a:6:{s:4:\"city\";s:6:\"Jember\";s:11:\"temperature\";s:5:\"23°C\";s:11:\"description\";s:5:\"Sunny\";s:8:\"humidity\";s:3:\"81%\";s:10:\"wind_speed\";s:6:\"4 km/h\";s:10:\"feels_like\";s:5:\"19°C\";}', 1780367346);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2026_05_14_150608_create_users_table', 1),
(4, '2026_05_14_150609_create_ruangans_table', 1),
(5, '2026_05_14_150610_create_bookings_table', 1),
(6, '2026_05_14_155059_create_sessions_table', 2),
(7, '2026_05_15_080028_add_index_to_bookings_table', 3),
(8, '2026_05_15_170813_add_tanggal_pinjam_to_bookings_table', 3),
(9, '2026_05_15_172210_change_waktu_columns_to_datetime_in_bookings_table', 4),
(10, '2026_05_22_175058_create_visitor_stats_table', 5),
(11, '2026_05_29_154601_create_password_reset_tokens_table', 6),
(12, '2026_05_30_150130_add_alasan_ditolak_to_peminjaman_table', 7),
(13, '2026_06_02_082556_add_soft_deletes_to_users_table', 8),
(14, '2026_06_02_082919_add_soft_deletes_to_ruangans_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruangans`
--

CREATE TABLE `ruangans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` int NOT NULL,
  `fasilitas` text COLLATE utf8mb4_unicode_ci,
  `status` enum('tersedia','dipinjam','perbaikan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tersedia',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangans`
--

INSERT INTO `ruangans` (`id`, `nama_ruangan`, `kode_ruangan`, `lokasi`, `kapasitas`, `fasilitas`, `status`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Auditorium', 'RG-001', 'dekatnya gerbang utama', 700, 'Proyektor, Kursi, dan AC', 'tersedia', 'uploads/ruangan/1780362549_auditorium.png', '2026-05-14 19:17:26', '2026-06-02 01:09:09', NULL),
(2, 'Gedung Soetardjo', 'RG-002', 'jalan karimata 15', 500, 'Proyektor, AC, dan 300 Kursi', 'dipinjam', 'uploads/ruangan/1780362594_soetardjo.png', '2026-05-14 19:19:40', '2026-06-02 01:09:54', NULL),
(3, 'Laboratorium Terpadu', 'RG-003', 'ISDB FK', 49, 'ALat Laboratorium, AC, Kursi, Meja, Proyektor', 'tersedia', 'uploads/ruangan/1779238984_lab.png', '2026-05-14 19:21:52', '2026-05-20 01:03:04', NULL),
(4, 'Mas Soerachman Lantai 3', 'RG-004', 'Geudng Mas Soerachman', 250, 'Proyektor, AC', 'dipinjam', 'uploads/ruangan/1779238963_soerachman1.png', '2026-05-14 19:28:57', '2026-05-20 01:02:43', NULL),
(7, 'Aula Fasilkom', 'RG-005', 'Fakultas Ilmu Komputer', 100, 'lengkap', 'dipinjam', 'uploads/ruangan/1779238937_fasilkom.png', '2026-05-14 20:12:08', '2026-05-20 08:32:07', NULL),
(8, 'Aula FEB', 'RG-006', 'Fakultas Ekonomi Bisnis', 70, 'lengkap', 'dipinjam', 'uploads/ruangan/1779238918_feb.png', '2026-05-14 21:30:53', '2026-05-20 01:01:58', NULL),
(9, 'CDAST Utara lantai 4', 'RG-007', 'Gedung CDAST Utara', 100, 'AC, Whiteboard, 50 Kursi, Proyektor', 'tersedia', 'uploads/ruangan/1779238860_cdast-utara.png', '2026-05-15 00:21:39', '2026-05-20 01:01:00', NULL),
(10, 'Gedung Kewirausahaan Lantai 4', 'RG-008', 'Gedung Kewirausahaan', 120, 'AC, Proyektor, 100 Kursi, Meja, Sound System', 'dipinjam', 'uploads/ruangan/1779237948_kewirausahaan.png', '2026-05-15 00:24:10', '2026-05-30 07:54:39', NULL),
(11, 'Aula FKM', 'RG-009', 'Fakultas Kesehatan Masyarakat', 69, 'AC, proyektor, Kursi', 'tersedia', 'uploads/ruangan/1778935515_fkm.png', '2026-05-16 12:45:15', '2026-05-20 18:12:07', NULL),
(12, 'CDAST selatan lantai 8', 'RG-010', 'CDAST Selatan', 100, 'AC, Proyektor, White board, Kursi', 'tersedia', 'uploads/ruangan/1779238764_cdast-selatan.png', '2026-05-20 00:59:24', '2026-05-20 00:59:24', NULL),
(15, 'Double Way Unej', 'RG-012', 'Setelahnya gerbang masuk', 2000, 'Outdoor', 'tersedia', 'uploads/ruangan/1779853913_umum.png', '2026-05-27 03:51:53', '2026-05-27 03:51:53', NULL),
(17, 'PKM', 'RG-013', 'jalan kalimantan 8', 450, 'Sound System, Proyektor', 'tersedia', 'uploads/ruangan/1780365363_pkm.png', '2026-06-02 01:56:03', '2026-06-02 02:02:34', '2026-06-02 02:02:34');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4fV5upeT0corYldeIf5vWTJQugQR5ofV37cRIqOP', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'eyJfdG9rZW4iOiJWTzhuc1NCdHpxbFhzVXd2MmFXVVdlS1lydmN1c3N4eGg1Rm9nMjIwIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvb3JnYW5pc2FzaSIsInJvdXRlIjoiYWRtaW4ub3JnYW5pc2FzaS5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==', 1780367065),
('Iq6sJZwJdfUhdVuyHV43hvL3nKxj7ZC4P1zyisgO', 14, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJoN05zM1Q1SEhOejlrNm5RZFhZYVg1Qjd4NWpEbTlmek1wNTlJdGRnIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9vcmdhbmlzYXNpXC9yaXdheWF0Iiwicm91dGUiOiJvcmdhbmlzYXNpLnJpd2F5YXQuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MTR9', 1780366788);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','organisasi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_organisasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ketua_organisasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_organisasi` enum('UKM','BEM','Himpunan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_anggota` int DEFAULT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `nama_organisasi`, `ketua_organisasi`, `jenis_organisasi`, `jumlah_anggota`, `no_telp`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin Unej', 'admin@unej.ac.id', '$2y$12$ZJOSVYH6DjqOgjQurSe8Kuri9rz8uaAFgakTd/hYvon0lUHIOIix.', 'admin', NULL, NULL, NULL, NULL, NULL, 'uploads/admin/1779237593_fasilkom.png', '2026-05-14 08:36:10', '2026-05-29 08:49:23', NULL),
(2, 'KSPM-GI', 'kspmgi@gmail.com', '$2y$12$fpmPGZHbjcemlV7nwiCcbefF71DCRcSfQ8vXVtPzgjQbdG2d5jb4K', 'organisasi', 'Kelompok Studi Pasar Modal - Galery Investasi', 'alexandria', 'UKM', 57, '08556781234', 'uploads/organisasi/1779235922_download (1).png', '2026-05-14 10:42:34', '2026-05-20 00:12:02', NULL),
(4, 'UKM PS', 'ukmps@gmail.com', '$2y$12$kPmswix5ajixiWUYAYu/LuSSAGRN2A0.aX5pGcps7/nl1VOjo.lPm', 'organisasi', 'UKM Paduan Suara Universitas Jember', 'Scania', 'UKM', 79, '085367241126', 'uploads/organisasi/1779235878_download (1).png', '2026-05-14 21:56:01', '2026-05-20 00:11:18', NULL),
(5, 'BEM UNEJ', 'bemunej@gmail.com', '$2y$12$2ppuYmk8t/q/fyKVWXwZQuwBfEI7baFsfEl9y24hXFlOqjpE4u5ue', 'organisasi', 'Badan Eksekutif Mahasiswa Universitas Jember', 'Ayatullah', 'BEM', 57, '082345127548', 'C:\\Users\\NAJZIL MUHSININA\\AppData\\Local\\Temp\\php5DB8.tmp', '2026-05-16 12:31:47', '2026-05-16 13:30:40', NULL),
(6, 'UKKM', 'ukkm@gmail.com', '$2y$12$EowC2sjXG4D5bCOrCh872eM/T9RGjgDdaJkYlKYNqwKeMDnd4OrQG', 'organisasi', 'Unit Kegiatan Kesejahteraan Mahasiswa', 'Azlam', 'UKM', 39, '085253746288', 'uploads/organisasi/1779290561_download (1).png', '2026-05-16 12:38:19', '2026-06-01 12:09:51', NULL),
(7, 'UKM Catur', 'ukmcatur@gmail.com', '$2y$12$ZOF0qgVWXe4ePGufHQgiAuWOloJsCSUcXDrUJOvqT4CY82SqBn0sO', 'organisasi', 'UKM Catur Universitas Jember', 'Narashya', 'UKM', 56, '085253746284', 'uploads/organisasi/1779235236_download (1).png', '2026-05-16 15:53:16', '2026-05-29 11:16:39', NULL),
(8, 'Himagro', 'himagro@gmail.com', '$2y$12$GJWXtwUwRPdaJijhOhIBTOnDqogT7g0Kt.MeMfFTZtpkYHrQkpTGG', 'organisasi', 'Himpunan Mahasiswa Agronomi', 'Tafana', 'Himpunan', 37, '085238874567', 'uploads/organisasi/1779234472_download (1).png', '2026-05-16 15:56:02', '2026-05-19 23:47:52', NULL),
(14, 'UKM Basket', 'ukmbasket@gmail.com', '$2y$12$CsAOD8mvMyh02TG/K8J62ukgRKT0fJlJn6EWFlBZ1VYQlBpK78mLq', 'organisasi', 'UKM Basket Universitas Jember', 'Narendra', 'UKM', 46, '085234178864', 'uploads/organisasi/1779234207_download (1).png', '2026-05-19 23:43:27', '2026-05-20 14:43:53', NULL),
(15, 'BEM FIB', 'bemfib@gmail.com', '$2y$12$WRbcV1/sAT2FWOvchIxfau5idDGA0HEt8MyfxCBjjbs6u1lW/UOnK', 'organisasi', 'BEM Fakultas Ilmu Budaya', 'Nasya', 'BEM', 62, '082436574123', 'uploads/organisasi/1780049165_bemfib.jpg', '2026-05-20 00:10:31', '2026-05-29 12:03:54', NULL),
(16, 'BEM FIK', 'bemfik@gmail.com', '$2y$12$cqlmy18pbS62qcSeDA1Zb.KJhqoT8hG5HQCsUtR6gFRW04d6JOZZy', 'organisasi', 'BEM Fakultas Ilmu Keperawatan', 'Sabila', 'BEM', 55, '085136528864', 'uploads/organisasi/1779290514_download (1).png', '2026-05-20 15:21:54', '2026-05-20 15:21:54', NULL),
(17, 'Himadok', 'himadok@gmail.com', '$2y$12$oJRVw7UrFG8yTNtGSJ6Kx.5yrWIIo9vKlAhciobjapbFz.MDMbJPC', 'organisasi', 'Himpunan Mahasiswa Kedokteran', 'Shaqueena', 'Himpunan', 61, '085613288532', 'uploads/organisasi/1779290780_download (1).png', '2026-05-20 15:26:20', '2026-05-20 15:26:20', NULL),
(18, 'ukmfutsal', 'ukmfutsal@gmail.com', '$2y$12$dmcEA.kWQGQqet5MyRgGSumQ4pii9QLbYv7QeRjEwrf1s66jLVPMi', 'organisasi', 'UKM Futsal UNEJ', 'Abrisyam', 'UKM', 44, '081423695876', 'uploads/organisasi/1779291124_download (1).png', '2026-05-20 15:32:04', '2026-06-01 11:34:17', NULL),
(22, 'BEM FEB', 'bemfeb@gmail.com', '$2y$12$QALc9fguem31EeIann77sucG4wgCmWYBCR3g7grHHePk8aXHDfa2a', 'organisasi', 'BEM Fakultas Ekonomi dan Bisnis', 'Zahira', 'BEM', 43, '082543781129', 'uploads/organisasi/1780367063_bemfib.jpg', '2026-06-02 02:24:23', '2026-06-02 02:24:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_stats`
--

CREATE TABLE `visitor_stats` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `visit_count` int NOT NULL DEFAULT '0',
  `first_visit` timestamp NULL DEFAULT NULL,
  `last_visit` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_stats`
--

INSERT INTO `visitor_stats` (`id`, `user_id`, `visit_count`, `first_visit`, `last_visit`, `created_at`, `updated_at`) VALUES
(1, 1, 36, '2026-05-22 10:55:58', '2026-06-02 00:57:13', '2026-05-22 10:55:58', '2026-06-02 00:57:13'),
(2, 4, 4, '2026-05-22 13:21:57', '2026-05-25 08:19:52', '2026-05-22 13:21:57', '2026-05-25 08:19:52'),
(3, 2, 25, '2026-05-22 13:54:54', '2026-05-30 09:03:06', '2026-05-22 13:54:54', '2026-05-30 09:03:06'),
(4, 18, 15, '2026-05-22 15:23:43', '2026-06-01 11:52:26', '2026-05-22 15:23:43', '2026-06-01 11:52:26'),
(5, 7, 17, '2026-05-22 15:30:39', '2026-06-01 05:57:29', '2026-05-22 15:30:39', '2026-06-01 05:57:29'),
(6, 14, 21, '2026-05-22 16:08:35', '2026-06-02 02:16:52', '2026-05-22 16:08:35', '2026-06-02 02:16:52'),
(7, 6, 6, '2026-05-22 16:27:02', '2026-06-01 12:10:11', '2026-05-22 16:27:02', '2026-06-01 12:10:11'),
(8, 15, 5, '2026-05-29 09:44:40', '2026-05-29 12:04:18', '2026-05-29 09:44:40', '2026-05-29 12:04:18'),
(9, 8, 7, '2026-05-30 06:45:51', '2026-05-30 08:59:55', '2026-05-30 06:45:51', '2026-05-30 08:59:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_ruangan_id_waktu_mulai_waktu_selesai_status_index` (`ruangan_id`,`status`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `ruangans`
--
ALTER TABLE `ruangans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ruangans_kode_ruangan_unique` (`kode_ruangan`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitor_stats`
--
ALTER TABLE `visitor_stats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitor_stats_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ruangans`
--
ALTER TABLE `ruangans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `visitor_stats`
--
ALTER TABLE `visitor_stats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `visitor_stats`
--
ALTER TABLE `visitor_stats`
  ADD CONSTRAINT `visitor_stats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
