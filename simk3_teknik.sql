-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 04:57 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simk3_teknik`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `lokasi`, `name`) VALUES
(1, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20', 'Kegiatan belajar mengajar'),
(2, '10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30', 'Kegiatan perawatan kebersihan ruang/ lingkungan'),
(3, '20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40', 'Perawatan rutin kabel LAN'),
(4, '30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50', 'Penggunaan listrik dan alat alat elektronik'),
(5, '40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60', 'Penggunaan ruang kelas, ruang administrasi dan kamar mandi'),
(6, '50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70', 'Penggunaan peralatan ruangan (ruang kantor & ruang kelas)'),
(7, '60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80', 'Barang-barang bekas dan sampah'),
(8, '70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91', 'Kegiatan praktikum mahasiswa menggunakan alat laboratorium'),
(9, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20', 'Memindahkan barang'),
(10, '10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30', 'Penggunaan  dan penyimpanan bahan kimia laboratorium'),
(11, '20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40', 'Penggunaan listrik alat alat laboratorium'),
(12, '30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50', 'Seminar/Kuliah gabungan'),
(13, '40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60', 'Bekerja, Rapat, Asistensi dengan mahasiswa'),
(14, '50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70', 'Bekerja, Layanan administrasi'),
(15, '60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80', 'Rapat, sidang'),
(16, '70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91', 'Membaca, mengerjakan tugas, pencarian literatur'),
(17, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20', 'Buang air kecil, Buang air besar '),
(18, '10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30', 'Ibadah/Sholat'),
(19, '20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40', 'Workshop ksatria hydros'),
(20, '30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50', 'Memarkir kendaraan'),
(21, '40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60', 'Kuliah tamu'),
(22, '50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70', 'Kegiatan praktikum Teknologi Bahan Konstruksi'),
(23, '60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80', 'Kegiatan praktikum dengan peraga batuan/mineral'),
(24, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20', 'Preparasi sampel'),
(25, '10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30', 'Pengamatan menggunakan mikroskop');

-- --------------------------------------------------------

--
-- Table structure for table `activitie_masters`
--

CREATE TABLE `activitie_masters` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activitie_masters`
--

INSERT INTO `activitie_masters` (`id`, `name`) VALUES
(1, 'Kegiatan belajar mengajar'),
(2, 'Kegiatan perawatan kebersihan ruang/ lingkungan'),
(3, 'Perawatan rutin kabel LAN'),
(4, 'Penggunaan listrik dan alat alat elektronik'),
(5, 'Penggunaan ruang kelas, ruang administrasi dan kamar mandi'),
(6, 'Penggunaan peralatan ruangan (ruang kantor & ruang kelas)'),
(7, 'Barang-barang bekas dan sampah'),
(8, 'Kegiatan praktikum mahasiswa menggunakan alat laboratorium'),
(9, 'Memindahkan barang'),
(10, 'Penggunaan  dan penyimpanan bahan kimia laboratorium'),
(11, 'Penggunaan listrik alat alat laboratorium'),
(12, 'Seminar/Kuliah gabungan'),
(13, 'Bekerja, Rapat, Asistensi dengan mahasiswa'),
(14, 'Bekerja, Layanan administrasi'),
(15, 'Rapat, sidang'),
(16, 'Membaca, mengerjakan tugas, pencarian literatur'),
(17, 'Buang air kecil, Buang air besar '),
(18, 'Ibadah/Sholat'),
(19, 'Workshop ksatria hydros'),
(20, 'Memarkir kendaraan'),
(21, 'Kuliah tamu'),
(22, 'Kegiatan praktikum Teknologi Bahan Konstruksi'),
(23, 'Kegiatan praktikum dengan peraga batuan/mineral'),
(24, 'Preparasi sampel'),
(25, 'Pengamatan menggunakan mikroskop');

-- --------------------------------------------------------

--
-- Table structure for table `apars`
--

CREATE TABLE `apars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `inventory_id` bigint(20) UNSIGNED NOT NULL,
  `departemen_id` bigint(20) UNSIGNED NOT NULL,
  `q1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q9` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q10` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q11` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q12` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q13` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q14` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apars`
--

INSERT INTO `apars` (`id`, `user_id`, `inventory_id`, `departemen_id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 1, 3, 3, 'Ya', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Ya', 'Ya', '2021-09-24 20:42:41', '2021-09-25 00:50:09', NULL),
(5, 1, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-28 23:36:26', '2021-12-28 23:36:26', NULL),
(6, 1, 5, 2, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-29 00:44:07', '2021-12-29 00:52:01', NULL),
(7, 1, 3, 3, 'Ya', 'Tidak', 'Ya', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak', '2021-12-29 04:01:10', '2022-02-16 11:08:47', '2022-02-16 11:08:47'),
(8, 1, 3, 3, 'Ya', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Ya', 'Ya', 'Ya', 'Tidak', 'Ya', 'Ya', 'Ya', 'Tidak', '2021-12-30 01:47:33', '2022-02-16 10:57:40', '2022-02-16 10:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `controls`
--

CREATE TABLE `controls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `controls`
--

INSERT INTO `controls` (`id`, `name`) VALUES
(1, 'Eliminasi'),
(2, 'Substitusi'),
(3, 'Rekayasa Teknis'),
(4, 'Rekayasa Administrasi'),
(5, 'Alat Pelindung Diri');

-- --------------------------------------------------------

--
-- Table structure for table `control_childrens`
--

CREATE TABLE `control_childrens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `control_childrens`
--

INSERT INTO `control_childrens` (`id`, `name`, `parent_id`) VALUES
(1, 'Eliminasi', 1),
(2, 'Substitusi', 2),
(3, 'Re-design (desain ulang)', 3),
(4, 'Pemberian pengaman mesin (Guarding)', 3),
(5, 'Ventilasi', 3),
(6, 'Pemberian absorber', 3),
(7, 'Isolasi', 3),
(8, 'Pemeliharaan (maintenance)', 3),
(9, 'Pengawasan secara berkala (monitoring)', 4),
(10, 'Pemberian Tanda , label atau rambu berbahaya (Log Out-Tag Out)', 4),
(11, 'Pembuatan SOP', 4),
(12, 'Pelatihan', 4),
(13, 'Sosialisasi atau penyuluhan', 4),
(14, 'Pengaturan shift kerja atau praktikum', 4),
(15, 'Peringatan sirine/lampu', 4),
(16, 'Surat izin kerja atau praktikum', 4),
(17, 'Pemeriksaan kesehatan', 4),
(18, 'Housekeeping : 5S (Seiri, Seiton, Seiso, Seiketsu,Shitsuke)', 4),
(19, 'Google glass', 5),
(20, 'Safety Shoes', 5),
(21, 'Masker', 5),
(22, 'Sarung tangan', 5),
(23, 'Wearpack', 5),
(24, 'Leather Apron', 5),
(25, 'Helm las', 5);

-- --------------------------------------------------------

--
-- Table structure for table `departemens`
--

CREATE TABLE `departemens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemens`
--

INSERT INTO `departemens` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Sipil', '2021-09-06 05:52:31', '2021-09-06 05:52:31'),
(2, 'Arsitektur', '2021-09-06 05:53:03', '2021-09-06 05:53:03'),
(3, 'Teknik Kimia', '2021-09-06 05:53:03', '2021-09-06 05:53:03'),
(4, 'Perencanaan Wilayah dan Kota', '2021-09-06 05:53:03', '2021-09-06 05:53:03'),
(5, 'Teknik Mesin', '2021-09-06 05:53:03', '2021-09-06 05:53:03'),
(6, 'Teknik Elektro', '2021-09-06 05:53:03', '2021-09-06 05:53:03'),
(7, 'Teknik Industri', '2021-09-06 05:53:03', '2021-09-06 05:53:03'),
(8, 'Teknik Lingkungan', '2021-09-06 05:53:03', '2021-09-06 05:53:03'),
(9, 'Teknik Kapal', '2021-09-06 05:53:03', '2021-09-06 05:53:03'),
(10, 'Teknik Geologi', '2021-09-06 05:53:03', '2021-09-06 05:53:03'),
(11, 'Teknik Geodesi', '2021-09-06 05:53:03', '2021-09-06 05:53:03'),
(12, 'Teknik Komputer', '2021-09-06 05:53:03', '2021-09-06 05:53:03'),
(13, 'Dekanat', '2021-09-06 05:53:03', '2021-09-06 05:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `dokumens`
--

CREATE TABLE `dokumens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_file` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumens`
--

INSERT INTO `dokumens` (`id`, `name_file`, `file`, `created_at`, `updated_at`) VALUES
(1, 'SOP PELAKSANAAN PRAKTIKUM', 'SOP PELAKSANAAN PRAKTIKUM.pdf', NULL, '2022-01-15 06:17:35'),
(3, 'SOP PEMELIHARAAN AIR CONDITIONER (AC)', 'SOP PEMELIHARAAN AIR CONDITIONER (AC).pdf', '2022-01-15 05:16:56', '2022-01-15 05:16:56'),
(4, 'SOP PEMAKAIAN RUANG', 'SOP PEMAKAIAN RUANG.pdf', '2022-02-08 00:17:29', '2022-02-08 00:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hazards`
--

CREATE TABLE `hazards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hazards`
--

INSERT INTO `hazards` (`id`, `name`) VALUES
(1, 'Tempat terlalu penuh dengan barang-barang yang sudah tidak digunakan'),
(2, 'Tempat penyimpanan barang yang kurang memadai'),
(3, 'Radiasi monitor komputer'),
(4, 'Pencahayaan kurang'),
(5, 'Suhu ruangan panas'),
(6, 'Pembaharuan APAR'),
(7, 'Tidak tersedia kotak P3K'),
(8, 'Sisa alat-alat praktikum, tugas akhir yang menumpuk di area kampus'),
(9, 'Kabel stop kontak berserakan'),
(10, 'Penggunaan listrik'),
(11, 'Ketinggian'),
(12, 'Arus listrik yang tidak di grounding'),
(13, 'Percikan listrik dari proses welding '),
(14, 'Lantai mengelupas'),
(15, 'Tegangan listrik yang tidak stabil / naik turun'),
(16, 'Listrik padam'),
(17, 'Kabel dan alat-alat elektronik (komputer, printer, scanner, emergency lamp) yang berantakan'),
(18, 'Pembersihan lantai'),
(19, 'Menggunakan peralatan ruangan seperti proyektor, alat tulis kantor, dll.'),
(20, 'Lupa mengunci ruangan setelah kegiatan atau pergantian kelas'),
(21, 'Penggunaan kompressor yang tidak sesuai prosedur'),
(22, 'Putaran mesin turning yang terlalu tinggi'),
(23, 'Pemasangan pahat potong dan benda kerja pada mesin turning tidak sesuai prosedur'),
(24, 'Putaran mesin milling terlalu tinggi'),
(25, 'LCD gantung');

-- --------------------------------------------------------

--
-- Table structure for table `hirarccontrols`
--

CREATE TABLE `hirarccontrols` (
  `form_diperlukan` varchar(255) NOT NULL,
  `sop` varchar(255) NOT NULL,
  `residual_severity` varchar(255) NOT NULL,
  `residual_exposure` varchar(255) NOT NULL,
  `residual_probability` varchar(255) NOT NULL,
  `residual_risk_rating` varchar(255) NOT NULL,
  `residual_risk_category` varchar(255) NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hirarcdetails`
--

CREATE TABLE `hirarcdetails` (
  `current_severity` varchar(255) NOT NULL,
  `current_exposure` varchar(255) NOT NULL,
  `current_probability` varchar(255) NOT NULL,
  `current_risk_rating` varchar(255) NOT NULL,
  `current_risk_category` varchar(255) NOT NULL,
  `penyebab` varchar(255) NOT NULL,
  `usulan` varchar(255) NOT NULL,
  `deleted_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hirarcdetails`
--

INSERT INTO `hirarcdetails` (`current_severity`, `current_exposure`, `current_probability`, `current_risk_rating`, `current_risk_category`, `penyebab`, `usulan`, `deleted_at`) VALUES
('1', '3', '6', '18', 'slight', 'kurang nya pengawasan', 'Administrative control: Safety induction sebelum praktikum\r\n', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `hirarcs`
--

CREATE TABLE `hirarcs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `departemen_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `activity` varchar(255) NOT NULL,
  `hazard` varchar(255) NOT NULL,
  `risk` varchar(255) NOT NULL,
  `kesesuaian` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `kendali` varchar(255) NOT NULL,
  `current_severity` varchar(255) NOT NULL,
  `current_exposure` varchar(255) NOT NULL,
  `current_probability` varchar(255) NOT NULL,
  `current_risk_rating` varchar(255) NOT NULL,
  `current_risk_category` varchar(255) NOT NULL,
  `penyebab` varchar(255) NOT NULL,
  `usulan` varchar(255) NOT NULL,
  `form_diperlukan` varchar(255) NOT NULL,
  `sop` varchar(255) NOT NULL,
  `residual_severity` varchar(255) NOT NULL,
  `residual_exposure` varchar(255) NOT NULL,
  `residual_probability` varchar(255) NOT NULL,
  `residual_risk_rating` varchar(255) NOT NULL,
  `residual_risk_category` varchar(255) NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hirarcs`
--

INSERT INTO `hirarcs` (`id`, `user_id`, `departemen_id`, `location_id`, `activity`, `hazard`, `risk`, `kesesuaian`, `kondisi`, `kendali`, `current_severity`, `current_exposure`, `current_probability`, `current_risk_rating`, `current_risk_category`, `penyebab`, `usulan`, `form_diperlukan`, `sop`, `residual_severity`, `residual_exposure`, `residual_probability`, `residual_risk_rating`, `residual_risk_category`, `penanggung_jawab`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 83, 'Penggunaan listrik alat alat laboratorium', 'Penggunaan listrik', 'Tersengat listrik', 'Yes', 'Normal', 'Pemberitahuan untuk hati-hati dalam penggunaan listrik', '1', '2', '3', '6', 'Slight', 'Kabel listrik usang', 'Pembaharuan kabel listrik', '-', '-', '3', '2', '1', '6', 'Slight', 'P2K3', 'Open', '2021-12-27 09:31:38', '2023-08-21 02:20:40', NULL),
(2, 1, 3, 79, 'Kegiatan belajar mengajar', 'Kabel stop kontak berserakan', 'Dapat merusak alat-alat elektronik', 'Yes', 'Normal', 'Jas lab', '1', '1', '1', '1', 'Slight', 'Kurangnya pengetahuan', 'Screen guard', '', '-', '1', '0.5', '1', '0.5', 'Slight', 'K3 Departemen', 'Open', '2021-12-28 03:52:46', '2023-08-21 02:15:04', NULL),
(4, 1, 8, 42, 'Praktikum', 'Terkena bahan kimia', 'Cidera', 'Yes', 'Normal', 'Mengenalkan bahaya kepada praktikan', '3', '-', '2', '6', 'Slight', 'Kurang pengetahuan', 'Memantau proses praktikum', '-', '-', '2', '-', '1', '2', 'Slight', 'K3 Departemen', 'Open', '2021-12-28 10:18:17', '2023-08-11 02:28:16', '2023-08-11 02:28:16'),
(5, 1, 2, 3, 'Kegiatan belajar mengajar', 'Suhu ruangan panas', 'Tersengat listrik', 'Yes', 'Normal', 'Membuka seluruh pintu dan jendele', '1', '10', '3', '30', 'Low', 'Kurangnya ventilasi', 'Memberi AC', '', '-', '1', '0.5', '1', '0.5', 'Slight', 'K3 Departemen', 'Open', '2021-12-29 12:25:09', '2023-08-24 04:48:01', NULL),
(6, 1, 9, 87, 'Kegiata belajar mengajar', 'Sambungan listrik paralel', 'Tegangan arus pendek', 'Yes', 'Normal', 'Membuat jalur kabel', '3', '10', '3', '90', 'Medium', 'Pengawasan yang tidak memadai', 'Menyampaikan bahaya elektrik', '-', '-', '1', '10', '1', '10', 'Slight', 'K3 Departemen', 'Open', '2021-12-30 08:43:16', '2023-08-04 09:39:37', '2022-02-16 11:07:15'),
(7, 9, 12, 70, 'Praktikum', 'Listrik padam', 'Terbentur atau menabrak barang', 'N/A', 'Normal', 'Menggunakan genset kecil', '1', '6', '6', '36', 'Low', '-', '-', '-', '-', '1', '6', '1', '1', 'Slight', 'UPA FT', 'Open', '2023-05-29 10:28:13', '2023-08-04 09:44:19', '2023-05-29 03:30:14'),
(55, 9, 4, 5, 'Kegiatan belajar mengajar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-21 03:25:20', '2023-08-24 12:01:18', NULL),
(57, 9, 5, 2, 'Kegiatan praktikum dengan peraga batuan/mineral', 'Listrik padam', 'Terbentur', 'Yes', 'Normal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 05:02:43', '2023-08-25 02:09:28', NULL),
(58, 0, 0, 0, '', 'T', 'dapat menyebabkan orang tersandung atau terluka serta gangguan estetika', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 05:02:43', '2023-08-24 18:26:19', '2023-08-24 18:26:19'),
(59, 9, 3, 3, 'Kegiatan perawatan kebersihan ruang/ lingkungan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 20:53:13', '2023-08-24 20:53:13', NULL),
(60, 0, 0, 0, '', 'Tempat penyimpanan barang yang kurang memadai', 'Dapat menyebabkan seseorang tersandung atau terluka', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 20:53:13', '2023-08-24 20:53:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hirarc_detail_controls`
--

CREATE TABLE `hirarc_detail_controls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hirarc_detail_id` bigint(20) UNSIGNED NOT NULL,
  `hirarc_id` bigint(20) UNSIGNED NOT NULL,
  `control_child_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hirarc_postratings`
--

CREATE TABLE `hirarc_postratings` (
  `hirarc_detail_id` bigint(20) UNSIGNED NOT NULL,
  `hirarc_id` bigint(20) UNSIGNED NOT NULL,
  `post_severity` float NOT NULL,
  `post_exposure` float NOT NULL,
  `post_probability` float NOT NULL,
  `hasilpostcontrol` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hirarc_postratings`
--

INSERT INTO `hirarc_postratings` (`hirarc_detail_id`, `hirarc_id`, `post_severity`, `post_exposure`, `post_probability`, `hasilpostcontrol`, `created_at`, `updated_at`) VALUES
(1, 1, 15, 1, 3, 45, NULL, '2021-12-27 09:39:58'),
(2, 1, 7, 2, 3, 42, '2021-12-27 02:41:50', '2021-12-27 02:41:50'),
(5, 1, 15, 2, 6, 180, '2021-12-27 06:08:16', '2021-12-27 13:09:13'),
(7, 1, 7, 3, 1, 21, '2021-12-27 06:13:29', '2021-12-27 06:13:29'),
(11, 1, 7, 6, 6, 252, '2021-12-27 06:18:18', '2021-12-27 13:23:36'),
(12, 1, 7, 2, 3, 42, '2021-12-27 06:24:00', '2021-12-27 06:24:00'),
(13, 1, 7, 2, 1, 14, '2021-12-27 06:26:14', '2021-12-27 13:27:59'),
(14, 1, 7, 1, 3, 21, '2021-12-27 06:28:21', '2021-12-27 06:28:21'),
(15, 1, 15, 1, 6, 90, '2021-12-27 06:33:21', '2021-12-27 06:33:21'),
(16, 1, 7, 3, 6, 126, '2021-12-27 06:33:29', '2021-12-27 06:33:29'),
(17, 1, 15, 2, 3, 90, '2021-12-27 09:09:17', '2021-12-27 09:09:17'),
(18, 2, 7, 2, 3, 42, '2021-12-27 20:53:31', '2021-12-27 20:53:31'),
(19, 2, 7, 2, 6, 84, '2021-12-27 20:54:11', '2021-12-27 20:54:11'),
(20, 2, 15, 3, 3, 135, '2021-12-27 21:13:27', '2021-12-27 21:13:27'),
(21, 2, 7, 2, 3, 42, '2021-12-27 21:15:03', '2021-12-27 21:15:03'),
(22, 2, 3, 1, 1, 3, '2021-12-27 21:17:32', '2021-12-27 21:17:32'),
(23, 2, 7, 1, 1, 7, '2021-12-27 21:19:15', '2021-12-27 21:19:15'),
(40, 1, 7, 1, 3, 21, NULL, '2021-12-28 07:45:54'),
(43, 4, 7, 2, 3, 42, '2021-12-28 03:19:34', '2021-12-28 03:19:34'),
(44, 4, 15, 2, 1, 30, '2021-12-28 03:21:34', '2021-12-28 10:27:49'),
(45, 4, 7, 0.5, 1, 3.5, '2021-12-28 03:28:19', '2021-12-28 03:28:19'),
(46, 4, 7, 3, 6, 126, '2021-12-28 03:32:22', '2021-12-28 03:32:22'),
(47, 4, 15, 1, 1, 15, '2021-12-28 03:33:00', '2021-12-28 03:33:00'),
(48, 4, 7, 2, 3, 42, '2021-12-28 03:39:28', '2021-12-28 03:39:28'),
(49, 4, 7, 2, 1, 14, '2021-12-29 05:21:08', '2021-12-29 05:21:08'),
(50, 4, 3, 2, 3, 18, '2021-12-29 05:21:26', '2021-12-29 05:21:26'),
(51, 4, 7, 2, 3, 42, '2021-12-29 05:21:53', '2021-12-29 05:21:53'),
(52, 5, 7, 3, 6, 126, '2021-12-29 05:25:29', '2021-12-29 05:25:29'),
(53, 5, 15, 1, 3, 45, '2021-12-29 05:26:57', '2021-12-29 05:26:57'),
(55, 5, 7, 1, 3, 21, '2021-12-29 05:28:34', '2021-12-29 05:28:34'),
(56, 6, 3, 2, 6, 36, '2021-12-30 01:43:56', '2021-12-30 01:43:56'),
(57, 6, 3, 3, 6, 54, '2021-12-30 01:44:10', '2021-12-30 01:44:10'),
(59, 6, 3, 2, 3, 18, '2021-12-30 01:45:16', '2021-12-30 01:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `hirarc_preratings`
--

CREATE TABLE `hirarc_preratings` (
  `hirarc_detail_id` bigint(20) UNSIGNED NOT NULL,
  `hirarc_id` bigint(20) UNSIGNED NOT NULL,
  `pre_severity` float NOT NULL,
  `pre_exposure` float NOT NULL,
  `pre_probability` float NOT NULL,
  `hasilprecontrol` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hirarc_preratings`
--

INSERT INTO `hirarc_preratings` (`hirarc_detail_id`, `hirarc_id`, `pre_severity`, `pre_exposure`, `pre_probability`, `hasilprecontrol`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 2, 6, 84, '2021-12-27 09:40:25', '2021-12-27 09:40:25'),
(2, 1, 7, 2, 3, 42, '2021-12-27 02:40:48', '2021-12-27 02:40:48'),
(5, 1, 15, 1, 6, 90, '2021-12-27 04:03:42', '2021-12-27 04:03:42'),
(7, 1, 7, 1, 1, 7, '2021-12-27 04:28:52', '2021-12-27 04:28:52'),
(11, 1, 7, 1, 3, 21, '2021-12-27 06:16:37', '2021-12-27 13:23:40'),
(12, 1, 3, 2, 3, 18, '2021-12-27 06:23:52', '2021-12-27 06:23:52'),
(13, 1, 15, 3, 3, 135, '2021-12-27 06:26:06', '2021-12-27 13:28:02'),
(14, 1, 3, 1, 3, 9, '2021-12-27 06:28:13', '2021-12-27 06:28:13'),
(15, 1, 15, 2, 3, 90, '2021-12-27 06:28:40', '2021-12-27 06:28:40'),
(16, 1, 15, 2, 6, 180, '2021-12-27 06:28:53', '2021-12-27 06:28:53'),
(17, 1, 7, 2, 3, 42, '2021-12-27 09:09:09', '2021-12-27 09:09:09'),
(18, 2, 15, 1, 3, 45, '2021-12-27 20:53:22', '2021-12-27 20:53:22'),
(19, 2, 3, 2, 3, 18, '2021-12-27 20:53:37', '2021-12-27 20:53:37'),
(20, 2, 15, 2, 6, 180, '2021-12-27 21:13:18', '2021-12-27 21:13:18'),
(21, 2, 15, 2, 1, 30, '2021-12-27 21:14:53', '2021-12-27 21:14:53'),
(22, 2, 7, 1, 1, 7, '2021-12-27 21:17:23', '2021-12-27 21:17:23'),
(23, 2, 15, 2, 1, 30, '2021-12-27 21:19:06', '2021-12-27 21:19:06'),
(40, 1, 7, 1, 3, 21, '2021-12-28 07:46:14', '2021-12-28 07:46:14'),
(43, 4, 3, 1, 6, 18, '2021-12-28 03:19:26', '2021-12-28 03:19:26'),
(44, 4, 15, 3, 6, 270, '2021-12-28 03:19:39', '2021-12-28 10:27:55'),
(45, 4, 40, 2, 1, 80, '2021-12-28 03:28:06', '2021-12-28 03:28:06'),
(46, 4, 7, 2, 6, 84, '2021-12-28 03:32:13', '2021-12-28 03:32:13'),
(47, 4, 15, 2, 3, 90, '2021-12-28 03:32:54', '2021-12-28 10:39:07'),
(48, 4, 15, 2, 6, 180, '2021-12-28 03:39:24', '2021-12-28 03:39:24'),
(49, 4, 7, 3, 6, 126, '2021-12-29 05:21:00', '2021-12-29 05:21:00'),
(50, 4, 7, 0.5, 3, 10.5, '2021-12-29 05:21:16', '2021-12-29 05:21:16'),
(51, 4, 7, 1, 3, 21, '2021-12-29 05:21:31', '2021-12-29 05:21:31'),
(52, 5, 7, 2, 3, 42, '2021-12-29 05:25:21', '2021-12-29 05:25:21'),
(53, 5, 7, 2, 6, 84, '2021-12-29 05:26:48', '2021-12-29 05:26:48'),
(55, 5, 7, 1, 6, 42, '2021-12-29 05:28:24', '2021-12-29 05:28:24'),
(56, 6, 7, 2, 6, 84, '2021-12-30 01:43:47', '2021-12-30 01:43:47'),
(57, 6, 15, 2, 3, 90, '2021-12-30 01:44:03', '2021-12-30 01:44:03'),
(59, 6, 3, 1, 3, 9, '2021-12-30 01:45:02', '2021-12-30 01:45:02'),
(60, 7, 1, 0.5, 1, 0.5, '2023-05-29 03:28:40', '2023-05-29 03:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `home_simk3s`
--

CREATE TABLE `home_simk3s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_benda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen_id` bigint(20) UNSIGNED NOT NULL,
  `berat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kadaluwarsa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kondisi_box` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Ada Foto',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `id_benda`, `name`, `tipe`, `departemen_id`, `berat`, `tanggal_kadaluwarsa`, `lokasi`, `kondisi`, `kondisi_box`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, '1', 'APAR Air', 'APAR', 3, '2 kg', '2021/11/25', 'Teknik Kimia Kelas D250', 'Kondisi Kurang Bagus', NULL, 'APAR Air.png', '2021-09-20 13:22:09', '2022-01-13 04:55:27', NULL),
(4, '2', 'APAR Foam', 'APAR', 3, '5', '2022/01/20', 'Teknik Kimia Kelas D250', 'Kondisi Baik', NULL, 'APAR Foam.png', '2021-09-21 09:39:33', '2021-09-21 09:39:33', NULL),
(5, '3', 'APAR Air', 'APAR', 2, '4', '2021/12/31', 'Teknik Arsitektur Kelas D203', 'Kondisi Baik', NULL, 'APAR Air.png', '2021-09-22 09:12:27', '2021-09-22 09:12:27', NULL),
(10, '4', 'APAR Air', 'APAR', 3, '2', '2021/09/25', 'Teknik Komputer Kelas D203', 'Kondisi Baik', NULL, 'APAR Air.png', '2021-09-24 05:49:18', '2021-09-24 06:05:10', NULL),
(11, '5', 'APAR Air', 'APAR', 5, '2', '2021/12/31', 'Teknik Mesin', 'Kondisi Baik', NULL, 'APAR Air.png', '2021-12-31 09:27:58', '2022-02-16 11:21:29', '2022-02-16 11:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `investigasis`
--

CREATE TABLE `investigasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p2k3_id` bigint(20) UNSIGNED DEFAULT NULL,
  `laporinsiden_id` bigint(20) UNSIGNED NOT NULL,
  `departemen_id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyebab_langsung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyebab_tidak_langsung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyebab_dasar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenggat_waktu` date NOT NULL,
  `tindakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investigasis`
--

INSERT INTO `investigasis` (`id`, `p2k3_id`, `laporinsiden_id`, `departemen_id`, `kategori`, `penyebab_langsung`, `penyebab_tidak_langsung`, `penyebab_dasar`, `tenggat_waktu`, `tindakan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 2, 3, 3, 'Minor Injury', 'Kepleset', 'Jatuh', 'Mengantuk', '2021-12-24', '', '2021-12-23 07:20:40', '2023-08-25 09:09:08', NULL),
(18, 1, 6, 4, 'Minor Injury', 'Kepleset', 'Jatuh', 'Mengantuk', '2022-01-01', '', '2022-01-01 04:14:54', '2023-08-25 09:36:15', NULL),
(20, 5, 2, 2, 'Minor Injury', 'kepleset', 'Jatuh', 'Mengantuk', '2022-01-13', 'Menyelamatkan', '2022-01-13 08:52:02', '2022-02-16 11:22:52', '2022-02-16 11:22:52'),
(31, 10, 2, 2, 'Serangan Jantung', '', '', 'Pohon Tumbang', '0000-00-00', '', NULL, NULL, NULL),
(32, 8, 3, 4, 'Asma', '', '', 'Pohon Tumbang', '0000-00-00', '', NULL, NULL, NULL),
(33, NULL, 0, 0, 'Serangan Jantung yes', 'test', 'yes', 'Kebakaran', '0000-00-00', 'yes', NULL, '2023-08-27 10:57:09', '2023-08-27 10:57:09'),
(34, NULL, 0, 0, 'Serangan Jantung', 'tset', 'test', 'tidak diketahui', '0000-00-00', 'test', NULL, '2023-08-27 10:57:14', '2023-08-27 10:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `laporinsidens`
--

CREATE TABLE `laporinsidens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p2k3_id` bigint(20) UNSIGNED DEFAULT 0,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode_laporinsiden` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanda_pengenal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_kejadian` date NOT NULL,
  `departemen_id` bigint(20) UNSIGNED NOT NULL,
  `lokasi_rinci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_insiden` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_insiden_box` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kronologi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyebab_insiden` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penyebab_insiden_box` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pelapor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_pelapor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomer_telepon_pelapor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_pelapor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_korban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_korban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomer_telepon_korban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_korban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporinsidens`
--

INSERT INTO `laporinsidens` (`id`, `p2k3_id`, `user_id`, `kode_laporinsiden`, `tanda_pengenal`, `waktu_kejadian`, `departemen_id`, `lokasi_rinci`, `jenis_insiden`, `jenis_insiden_box`, `kronologi`, `penyebab_insiden`, `penyebab_insiden_box`, `nama_pelapor`, `email_pelapor`, `nomer_telepon_pelapor`, `unit_pelapor`, `nama_korban`, `email_korban`, `nomer_telepon_korban`, `unit_korban`, `status`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 8, 1, 'INSDN-1', 'dimdimdum.png', '2022-01-08', 7, 'Gedung Serbaguna', 'Pendarahan', NULL, 'aaaa', 'Mengantuk*', NULL, 'dimdimdum', 'dimasaldi619@gmail.com', '08786786756', 'UNDIP', 'Ahmad', 'ahmad@gmail.com', NULL, NULL, 3, 'dimdimdum.png', '2021-08-10 07:48:50', '2023-08-25 02:07:31', NULL),
(2, 10, 4, 'INSDN-2', 'king.png', '2021-10-20', 2, 'Gedung Serbaguna', 'Serangan Jantung', NULL, 'aaa', 'Pohon Tumbang', NULL, 'king', 'dimasaldi619@gmail.com', '089879789', 'UNDIP', NULL, NULL, NULL, NULL, 2, 'dimdimdum.png', '2021-09-21 07:53:32', '2023-08-25 02:43:33', NULL),
(3, 8, 1, 'INSDN-3', '', '2021-08-18', 4, 'Gedung Serbaguna', 'Asma', NULL, 'aaaa', 'Pohon Tumbang', NULL, 'jack', 'bb@bb', '08676577', 'UNDIP', NULL, NULL, NULL, NULL, 2, 'jack.png', '2021-08-18 07:55:37', '2023-08-27 10:07:40', NULL),
(4, 8, 1, 'INSDN-4', '', '2021-05-18', 6, 'Gedung Serbaguna', 'Serangan Jantung', NULL, 'aaaa', 'Kebakaran', NULL, 'min', 'dimasaldi619@gmail.com', '086776756755', 'Undip', NULL, NULL, NULL, NULL, 2, 'min.png', '2021-08-10 08:22:11', '2023-08-25 02:44:30', NULL),
(5, 11, 1, 'INSDN-5', '', '2021-11-16', 1, 'Gedung Serbaguna', 'Asma', NULL, 'aaa', 'Pohon Tumbang', NULL, 'ayooo', 'bb@bb', '086786786', 'UNDIP', NULL, NULL, NULL, NULL, 1, 'ayooo.png', '2021-07-20 08:36:24', '2023-08-25 02:44:42', NULL),
(6, 11, 1, 'INSDN-6', '', '2022-02-01', 1, 'Gedung Serbaguna', 'Asma', NULL, 'aaa', 'Pohon Tumbang', NULL, 'van', 'dimasaldi619@gmail.com', '0897548574', 'UNDIP', NULL, NULL, NULL, NULL, 1, 'van.png', '2021-06-15 09:23:57', '2023-08-25 02:44:53', NULL),
(13, 10, 6, 'INSDN-7', 'Della.png', '2022-02-01', 2, 'Gedung Serbaguna', 'Serangan Jantung', NULL, 'Berjalan di samping trotoar', 'Kecelakaan Lalu lintas', NULL, 'Della', 'della.putryz@gmail.com', '08927387283', 'UNDIP', NULL, NULL, NULL, NULL, 1, 'Della.jpg', '2022-01-31 22:28:34', '2023-08-25 02:45:05', NULL),
(14, 8, 1, 'INSDN-14', 'Zack.jpg', '2022-02-02', 3, 'Gedung Serbaguna', 'Serangan Jantung', NULL, 'aaa', 'Pohon Tumbang', NULL, 'Zack', 'zack@gmail.com', '08934873873', 'UNDIP', NULL, NULL, NULL, NULL, 1, 'Zack.png', '2022-01-31 22:41:12', '2023-08-25 07:27:23', NULL),
(15, 11, 6, 'INSDN-15', 'Nice.png', '2022-02-01', 2, 'Gedung Serbaguna', 'Serangan Jantung', NULL, 'aaaa', 'Kebakaran', NULL, 'Nice', 'Nice@gmail.com', '0893274837483', 'Undip', NULL, NULL, NULL, NULL, 1, 'Nice.jpg', '2022-02-01 01:37:11', '2023-08-25 02:47:57', '2023-08-25 02:47:57'),
(16, 11, 9, 'INSDN-15', '1692973392_QaPOHc9YP4.png', '2023-08-25', 4, 'Lab Komputer', 'Serangan Jantung', NULL, 'Tiba tiba korban kejang kejang saat praktikum', 'tidak diketahui', NULL, 'afifa', 'afifahumaira@students.undip.ac.id', '081234567890', '', NULL, NULL, NULL, NULL, 2, '1692973391_cc93BwrNt2.png', '2023-08-25 07:23:12', '2023-08-27 10:08:04', NULL),
(17, 0, NULL, 'INSDN-16', '1693052167_vFCTHyai5s.png', '2023-08-26', 6, 'test', 'Asma', NULL, 'test', 'test', NULL, 'test', 'afifahumaira@students.undip.ac.id', '081234567890', '', NULL, NULL, NULL, NULL, 1, '1693052167_GKZHrnbvdZ.png', '2023-08-26 05:16:07', '2023-08-27 01:05:46', '2023-08-27 01:05:46'),
(18, 0, NULL, 'INSDN-16', '1693052294_rE1noPnNlB.png', '2023-08-26', 6, 'test', 'Asma', NULL, 'test', 'test', NULL, 'test', 'afifahumaira@students.undip.ac.id', '081234567890', '', NULL, NULL, NULL, NULL, 1, '1693052294_AO6IVDZtJk.png', '2023-08-26 05:18:14', '2023-08-27 01:05:54', '2023-08-27 01:05:54'),
(19, 0, NULL, 'INSDN-16', '1693052320_rkXn9Rif8F.png', '2023-08-26', 6, 'test', 'Asma', NULL, 'test', 'test', NULL, 'test', 'afifahumaira@students.undip.ac.id', '081234567890', '', NULL, NULL, NULL, NULL, 1, '1693052320_fqhrxZnwcx.png', '2023-08-26 05:18:40', '2023-08-27 01:06:01', '2023-08-27 01:06:01'),
(20, NULL, 9, 'INSDN-16', '1693123611_SPJZsKSdWY.png', '2023-08-27', 1, 'test', 'Pingsan', NULL, 'test', 'test', NULL, 'test', 'afifahumaira@students.undip.ac.id', '081234567890', '', NULL, NULL, NULL, NULL, 1, '1693123611_IHRQcLZsKb.png', '2023-08-27 01:06:51', '2023-08-27 01:08:09', '2023-08-27 01:08:09'),
(21, 0, 9, 'INSDN-16', '1693124016_zHF1RAiMVp.png', '2023-08-27', 1, 'test', 'Pingsan', NULL, 'test', 'test', NULL, 'test', 'afifahumaira@students.undip.ac.id', '081234567890', '', NULL, NULL, NULL, NULL, 1, '1693124016_sFaR8cqcDo.png', '2023-08-27 01:13:36', '2023-08-27 01:13:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departemen_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `departemen_id`, `name`) VALUES
(2, 2, 'Studio Perancangan'),
(3, 2, 'Mushola'),
(4, 2, 'Ruang Kelas'),
(5, 2, 'Aula'),
(6, 3, 'Parkiran'),
(7, 3, 'Laboratorium Komputasi Proses'),
(8, 4, 'Parkiran'),
(9, 4, 'Ruang Kelas'),
(10, 4, 'Ruang Dosen'),
(11, 4, 'Ruang TU'),
(12, 4, 'Ruang Theater'),
(13, 4, 'Perpustakaan'),
(14, 4, 'Toilet'),
(15, 4, 'Ruang Seminar/Studio'),
(16, 4, 'Ruang ASPI'),
(17, 4, 'Musholla'),
(18, 5, 'Laboratorium Proses Produksi, CNC dan Metrology'),
(19, 5, 'Laboratorium Metalurgi Fisik'),
(20, 5, 'Laboratorium Thermofluida'),
(21, 5, 'Laboratorium Komputasi'),
(22, 5, 'Laboratorium Perancangan Teknik dan Tribology'),
(23, 5, 'Ruang Kelas'),
(24, 6, ' Laboratorium Komputer dan Informatika'),
(25, 6, 'Laboratorium Elektronika dan Mikroprocessor'),
(26, 6, 'Laboratorium Konversi Energi Listrik dan Sistem Tenaga'),
(27, 6, 'Laboratorium Teknik Kontrol Otomatis'),
(28, 6, ' Laboratorium Telekomunikasi dan Pengolahan Signal'),
(29, 6, 'Ruang kelas'),
(30, 7, 'Ruang Kelas 201'),
(31, 7, 'Ruang Kelas 202'),
(32, 7, 'Ruang Kelas 203'),
(33, 7, 'Ruang Kelas 204'),
(34, 7, 'Laboratorium OPSI'),
(35, 7, 'Laboratorium DSS'),
(36, 7, 'Laboratorium STUDIO'),
(37, 7, 'Laboratorium RSKE'),
(38, 7, 'Laboratorium TPS'),
(39, 7, 'Laboratorium Sistem Produksi'),
(40, 7, 'Ruang Multimedia'),
(41, 8, 'Office dan Classroom'),
(42, 8, 'Laboratorium Air'),
(43, 9, 'Laboratorium Teknik Pengelasan'),
(44, 9, 'Laboratorium Hidrodinamika'),
(45, 9, 'Laboratorium Konstruksi'),
(46, 9, 'Laboratorium Mesin'),
(47, 9, 'Laboratorium Komputer'),
(48, 9, 'Ruang Kelas'),
(49, 10, 'Laboratorium Geodinamik,Hidrogeologi dan Planologi'),
(50, 10, 'Laboratorium Geoteknik, Geotermal, dan Geofisika'),
(51, 10, 'Laboratorium Paleontologi, Geologi Foto, dan Geoptik'),
(52, 10, 'Laboratorium Sedimen, Geologi Minyak Bumi, dan Geokimia'),
(53, 10, 'Ruang Komputer atau Laboratorium Geokomputasi'),
(54, 10, 'Ruang Kelas'),
(55, 10, 'Ruang HMTG'),
(56, 10, 'Ruang Alat'),
(57, 10, 'Ruang Arsip'),
(58, 10, 'Ruang Panel'),
(59, 10, 'Toilet'),
(60, 10, 'Mushola'),
(61, 11, 'Laboratorium Pengukuran dan Pemetaan Dasar'),
(62, 11, 'Laboratorium Survei Hidrografi'),
(63, 11, 'Laboratorium Komputer dan Sistem Informasi Geografis'),
(64, 11, ' Laboratorium Fotogramteri dan Penginderaan Jauh dan Lab'),
(65, 11, 'Ruang Kelas'),
(66, 12, 'Ruang Kelas E201'),
(67, 12, 'Ruang Kelas D304'),
(68, 12, 'Ruang Kelas Ex Lab Multimedia'),
(69, 12, 'Ruang Kelas Ex Ruang Sidang'),
(70, 12, 'Laboratorium RPL'),
(71, 12, 'Laboratorium Sistem Tertanam'),
(72, 12, 'Laboratorium Jaringan'),
(73, 12, 'Laboratorium Multimedia'),
(74, 12, 'Perpustakaan'),
(75, 12, 'Ruang Kadep'),
(76, 12, 'Ruang TU'),
(77, 12, 'Ruang Sidang'),
(78, 13, 'Gedung Dekanat KWU'),
(79, 3, 'Laboratorium Mikrobiologi'),
(80, 3, 'Laboratorium Dasar Teknik Kimia 1 dan 2'),
(81, 3, 'Laboratorium Proses Teknik Kimia'),
(82, 3, 'Laboratorium Operasi Teknik Kimia'),
(83, 1, 'Laboratorium Bahan dan Konstruksi'),
(84, 1, 'Laboratorium Mekanika Tanah'),
(85, 1, 'Laboratorium Transportasi'),
(86, 1, 'Laboratorium Air'),
(87, 1, 'Ruang Kelas'),
(88, 1, 'Aula'),
(89, 2, 'Parkiran'),
(90, 3, 'Ruang Kelas'),
(91, 8, 'Laboratorium Udara'),
(92, 0, 'test'),
(93, 0, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `location_masters`
--

CREATE TABLE `location_masters` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location_masters`
--

INSERT INTO `location_masters` (`id`, `name`) VALUES
(1, 'Laboratorium Komputasi'),
(2, 'Studio Perancangan'),
(3, 'Mushola'),
(4, 'Ruang Kelas'),
(5, 'Aula'),
(6, 'Parkiran'),
(7, 'Laboratorium Komputasi Proses'),
(8, 'Parkiran'),
(9, 'Ruang Kelas'),
(10, 'Ruang Dosen'),
(11, 'Ruang TU'),
(12, 'Ruang Theater'),
(13, 'Perpustakaan'),
(14, 'Toilet'),
(15, 'Ruang Seminar/Studio'),
(16, 'Ruang ASPI'),
(17, 'Musholla'),
(18, 'Laboratorium Proses Produksi, CNC dan Metrology'),
(19, 'Laboratorium Metalurgi Fisik'),
(20, 'Laboratorium Thermofluida'),
(21, 'Laboratorium Komputasi'),
(22, 'Laboratorium Perancangan Teknik dan Tribology'),
(23, 'Ruang Kelas'),
(24, ' Laboratorium Komputer dan Informatika'),
(25, 'Laboratorium Elektronika dan Mikroprocessor'),
(26, 'Laboratorium Konversi Energi Listrik dan Sistem Tenaga'),
(27, 'Laboratorium Teknik Kontrol Otomatis'),
(28, ' Laboratorium Telekomunikasi dan Pengolahan Signal'),
(29, 'Ruang kelas'),
(30, 'Ruang Kelas 201'),
(31, 'Ruang Kelas 202'),
(32, 'Ruang Kelas 203'),
(33, 'Ruang Kelas 204'),
(34, 'Laboratorium OPSI'),
(35, 'Laboratorium DSS'),
(36, 'Laboratorium STUDIO'),
(37, 'Laboratorium RSKE'),
(38, 'Laboratorium TPS'),
(39, 'Laboratorium Sistem Produksi'),
(40, 'Ruang Multimedia'),
(41, 'Office dan Classroom'),
(42, 'Laboratorium Air'),
(43, 'Laboratorium Teknik Pengelasan'),
(44, 'Laboratorium Hidrodinamika'),
(45, 'Laboratorium Konstruksi'),
(46, 'Laboratorium Mesin'),
(47, 'Laboratorium Komputer'),
(48, 'Ruang Kelas'),
(49, 'Laboratorium Geodinamik,Hidrogeologi dan Planologi'),
(50, 'Laboratorium Geoteknik, Geotermal, dan Geofisika'),
(51, 'Laboratorium Paleontologi, Geologi Foto, dan Geoptik'),
(52, 'Laboratorium Sedimen, Geologi Minyak Bumi, dan Geokimia'),
(53, 'Ruang Komputer atau Laboratorium Geokomputasi'),
(54, 'Ruang Kelas'),
(55, 'Ruang HMTG'),
(56, 'Ruang Alat'),
(57, 'Ruang Arsip'),
(58, 'Ruang Panel'),
(59, 'Toilet'),
(60, 'Mushola'),
(61, 'Laboratorium Pengukuran dan Pemetaan Dasar'),
(62, 'Laboratorium Survei Hidrografi'),
(63, 'Laboratorium Komputer dan Sistem Informasi Geografis'),
(64, ' Laboratorium Fotogramteri dan Penginderaan Jauh dan Lab'),
(65, 'Ruang Kelas'),
(66, 'Ruang Kelas E201'),
(67, 'Ruang Kelas D304'),
(68, 'Ruang Kelas Ex Lab Multimedia'),
(69, 'Ruang Kelas Ex Ruang Sidang'),
(70, 'Laboratorium RPL'),
(71, 'Laboratorium Sistem Tertanam'),
(72, 'Laboratorium Jaringan'),
(73, 'Laboratorium Multimedia'),
(74, 'Perpustakaan'),
(75, 'Ruang Kadep'),
(76, 'Ruang TU'),
(77, 'Ruang Sidang'),
(78, 'Gedung Dekanat KWU'),
(79, 'Laboratorium Mikrobiologi'),
(80, 'Laboratorium Dasar Teknik Kimia 1 dan 2'),
(81, 'Laboratorium Proses Teknik Kimia'),
(82, 'Laboratorium Operasi Teknik Kimia'),
(83, 'Laboratorium Bahan dan Konstruksi'),
(84, 'Laboratorium Mekanika Tanah'),
(85, 'Laboratorium Transportasi'),
(86, 'Laboratorium Air'),
(87, 'Ruang Kelas'),
(88, 'Aula'),
(89, 'Parkiran'),
(90, 'Ruang Kelas'),
(91, 'Laboratorium Udara');

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gedung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lantai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maps`
--

INSERT INTO `maps` (`id`, `gedung`, `lantai`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Perkapalan', 'Lantai 1', 'Teknik Kapal Lantai 1.png', NULL, NULL),
(2, 'Teknik Perkapalan', 'Lantai 2', 'Teknik Kapal Lantai 2.png', NULL, NULL),
(3, 'Teknik Perkapalan', 'Lantai 3', 'Teknik Kapal Lantai 3.png', NULL, NULL),
(4, 'Dekanat Fakultas Teknik', 'Lantai 1', 'Dekanat Fakultas Teknik Lantai 1.png', '2022-01-11 12:05:12', '2022-01-11 12:05:12'),
(5, 'Dekanat Fakultas Teknik', 'Lantai 2', 'Dekanat Fakultas Teknik Lantai 2.png', '2022-01-11 12:26:39', '2022-01-11 12:26:39'),
(6, 'Dekanat Fakultas Teknik', 'Lantai 3', 'Dekanat Fakultas Teknik Lantai 3.png', '2022-01-11 12:34:59', '2022-01-11 12:34:59'),
(7, 'Dekanat Fakultas Teknik', 'Lantai 4', 'Dekanat Fakultas Teknik Lantai 4.png', '2022-01-11 12:36:23', '2022-01-11 12:36:23'),
(8, 'Dekanat Fakultas Teknik', 'Lantai 5', 'Dekanat Fakultas Teknik Lantai 5.png', '2022-01-11 13:07:20', '2022-01-11 13:07:20'),
(9, 'Teknik Arsitektur Gedung A', 'Lantai 1', 'Teknik Arsitektur Gedung A Lantai 1.png', '2022-01-11 13:38:58', '2022-01-11 13:38:58'),
(10, 'Teknik Arsitektur Gedung A', 'Lantai 2', 'Teknik Arsitektur Gedung A Lantai 2.png', '2022-01-11 13:48:08', '2022-01-11 13:48:08'),
(11, 'Teknik Arsitektur Gedung A', 'Lantai 3', 'Teknik Arsitektur Gedung A Lantai 3.png', '2022-01-11 13:48:25', '2022-01-11 13:48:25'),
(12, 'Teknik Arsitektur Gedung B', 'Lantai 1', 'Teknik Arsitektur Gedung B Lantai 1.png', '2022-01-11 13:51:48', '2022-01-11 13:51:48'),
(13, 'Teknik Arsitektur Gedung B', 'Lantai 2', 'Teknik Arsitektur Gedung B Lantai 2.png', '2022-01-11 13:52:30', '2022-01-11 13:52:30'),
(14, 'Teknik Arsitektur Gedung B', 'Lantai 3', 'Teknik Arsitektur Gedung B Lantai 3.png', '2022-01-11 13:52:46', '2022-01-11 13:52:46'),
(15, 'Teknik Arsitektur Gedung C', 'Lantai 1', 'Teknik Arsitektur Gedung C Lantai 1.png', '2022-01-11 13:57:35', '2022-01-11 13:57:35'),
(16, 'Teknik Arsitektur Gedung C', 'Lantai 2', 'Teknik Arsitektur Gedung C Lantai 2.png', '2022-01-11 13:57:51', '2022-01-11 13:57:51'),
(17, 'Teknik Arsitektur Gedung C', 'Lantai 3', 'Teknik Arsitektur Gedung C Lantai 3.png', '2022-01-11 13:58:06', '2022-01-11 13:58:06'),
(18, 'Teknik Arsitektur Gedung D', 'Lantai 1', 'Teknik Arsitektur Gedung D Lantai 1.png', '2022-01-11 14:01:42', '2022-01-11 14:01:42'),
(19, 'Teknik Arsitektur Gedung D', 'Lantai 2', 'Teknik Arsitektur Gedung D Lantai 2.png', '2022-01-11 14:02:01', '2022-01-11 14:02:01'),
(20, 'Teknik Arsitektur Gedung D', 'Lantai 3', 'Teknik Arsitektur Gedung D Lantai 3.png', '2022-01-11 14:02:13', '2022-01-11 14:02:13'),
(21, 'Teknik Elektro Gedung A', 'Lantai 1', 'Teknik Elektro Gedung A Lantai 1.png', '2022-01-11 20:14:37', '2022-01-11 20:14:37'),
(22, 'Teknik Elektro Gedung A', 'Lantai 2', 'Teknik Elektro Gedung A Lantai 2.png', '2022-01-11 20:15:03', '2022-01-11 20:15:03'),
(23, 'Teknik Elektro Gedung A', 'Lantai 3', 'Teknik Elektro Gedung A Lantai 3.png', '2022-01-11 20:15:22', '2022-01-11 20:15:22'),
(24, 'Teknik Elektro Gedung B', 'Lantai 1', 'Teknik Elektro Gedung B Lantai 1.png', '2022-01-11 20:18:17', '2022-01-11 20:18:17'),
(25, 'Teknik Elektro Gedung B', 'Lantai 2', 'Teknik Elektro Gedung B Lantai 2.png', '2022-01-11 20:18:33', '2022-01-11 20:18:33'),
(26, 'Teknik Elektro Gedung B', 'Lantai 3', 'Teknik Elektro Gedung B Lantai 3.png', '2022-01-11 20:19:32', '2022-01-11 20:19:32'),
(27, 'Teknik Geologi', 'Lantai 1', 'Teknik Geologi Lantai 1.png', '2022-01-11 20:26:27', '2022-01-11 20:26:27'),
(28, 'Teknik Geologi', 'Lantai 2', 'Teknik Geologi Lantai 2.png', '2022-01-11 20:29:43', '2022-01-11 20:29:43'),
(29, 'Teknik Geologi', 'Lantai 3', 'Teknik Geologi Lantai 3.png', '2022-01-11 20:29:55', '2022-01-11 20:29:55'),
(30, 'Teknik Industri', 'Lantai 1', 'Teknik Industri Lantai 1.png', '2022-01-11 20:34:34', '2022-01-11 20:34:34'),
(31, 'Teknik Industri', 'Lantai 2', 'Teknik Industri Lantai 2.png', '2022-01-11 20:34:56', '2022-01-11 20:34:56'),
(32, 'Teknik Industri', 'Lantai 3', 'Teknik Industri Lantai 3.png', '2022-01-11 20:35:10', '2022-01-11 20:35:10'),
(33, 'Teknik Industri', 'Lantai 4', 'Teknik Industri Lantai 4.png', '2022-01-11 20:35:21', '2022-01-11 20:35:21'),
(34, 'Teknik Kimia Gedung A', 'Lantai 1', 'Teknik Kimia Gedung A Lantai 1.png', '2022-01-11 20:58:14', '2022-01-11 20:58:14'),
(35, 'Teknik Kimia Gedung A', 'Lantai 2', 'Teknik Kimia Gedung A Lantai 2.png', '2022-01-11 20:58:32', '2022-01-11 20:58:32'),
(36, 'Teknik Kimia Gedung A', 'Lantai 3', 'Teknik Kimia Gedung A Lantai 3.png', '2022-01-11 20:59:00', '2022-01-11 20:59:00'),
(37, 'Teknik Kimia Gedung B', 'Lantai 1', 'Teknik Kimia Gedung B Lantai 1.png', '2022-01-11 21:02:56', '2022-01-11 21:02:56'),
(38, 'Teknik Kimia Gedung B', 'Lantai 2', 'Teknik Kimia Gedung B Lantai 2.png', '2022-01-11 21:03:24', '2022-01-11 21:03:24'),
(39, 'Teknik Kimia Gedung B', 'Lantai 3', 'Teknik Kimia Gedung B Lantai 3.png', '2022-01-11 21:03:41', '2022-01-11 21:03:41'),
(40, 'Teknik Kimia Gedung C', 'Lantai 1', 'Teknik Kimia Gedung C Lantai 1.png', '2022-01-11 21:03:54', '2022-01-11 21:03:54'),
(41, 'Teknik Kimia Gedung C', 'Lantai 2', 'Teknik Kimia Gedung C Lantai 2.png', '2022-01-11 21:04:15', '2022-01-11 21:04:15'),
(42, 'Teknik Kimia Gedung C', 'Lantai 3', 'Teknik Kimia Gedung C Lantai 3.png', '2022-01-11 21:04:27', '2022-01-11 21:04:27'),
(43, 'Laboratorium Kimia Dasar (Teknik Kimia)', 'Lantai 1', 'Laboratorium Kimia Dasar (Teknik Kimia) Lantai 1.png', '2022-01-11 21:12:21', '2022-01-11 21:12:21'),
(44, 'Laboratorium Pengolahan Limbah (Teknik Kimia)', 'Lantai 1', 'Laboratorium Pengolahan Limbah (Teknik Kimia) Lantai 1.png', '2022-01-11 21:12:36', '2022-01-11 21:12:36'),
(45, 'PWK Gedung A', 'Lantai 1', 'PWK Gedung A Lantai 1.png', '2022-01-11 21:21:26', '2022-01-11 21:21:26'),
(46, 'PWK Gedung A', 'Lantai 2', 'PWK Gedung A Lantai 2.png', '2022-01-11 21:22:56', '2022-01-11 21:22:56'),
(47, 'PWK Gedung A', 'Lantai 3', 'PWK Gedung A Lantai 3.png', '2022-01-11 21:23:09', '2022-01-11 21:23:09'),
(48, 'PWK Gedung B', 'Lantai 1', 'PWK Gedung B Lantai 1.png', '2022-01-11 21:28:11', '2022-01-11 21:28:11'),
(49, 'PWK Gedung B', 'Lantai 2', 'PWK Gedung B Lantai 2.png', '2022-01-11 21:28:23', '2022-01-11 21:28:23'),
(50, 'PWK Gedung B', 'Lantai 3', 'PWK Gedung B Lantai 3.png', '2022-01-11 21:28:39', '2022-01-11 21:28:39'),
(51, 'Teknik Sipil Gedung A', 'Lantai 1', 'Teknik Sipil Gedung A Lantai 1.png', '2022-01-11 21:30:24', '2022-01-11 21:30:24'),
(52, 'Teknik Sipil Gedung B dan C', 'Lantai 1', 'Teknik Sipil Gedung B dan C Lantai 1.png', '2022-01-11 21:30:50', '2022-01-11 21:30:50'),
(53, 'Teknik Sipil Gedung B dan C', 'Lantai 2', 'Teknik Sipil Gedung B dan C Lantai 2.png', '2022-01-11 21:31:03', '2022-01-11 21:31:03'),
(54, 'Teknik Sipil Gedung B dan C', 'Lantai 3', 'Teknik Sipil Gedung B dan C Lantai 3.png', '2022-01-11 21:31:17', '2022-01-11 21:31:17'),
(55, 'Teknik Sipil Gedung D', 'Lantai 1', 'Teknik Sipil Gedung D Lantai 1.png', '2022-01-11 21:36:58', '2022-01-11 21:36:58'),
(56, 'Teknik Sipil Gedung D', 'Lantai 2', 'Teknik Sipil Gedung D Lantai 2.png', '2022-01-11 21:37:13', '2022-01-11 21:37:13'),
(57, 'Teknik Sipil Gedung D', 'Lantai 3', 'Teknik Sipil Gedung D Lantai 3.png', '2022-01-11 21:37:26', '2022-01-11 21:37:26'),
(58, 'Teknik Sipil Gedung E', 'Lantai 1', 'Teknik Sipil Gedung E Lantai 1.png', '2022-01-11 21:37:48', '2022-01-11 21:37:48'),
(59, 'Teknik Sipil Gedung E', 'Lantai 2', 'Teknik Sipil Gedung E Lantai 2.png', '2022-01-11 21:38:01', '2022-01-11 21:38:01'),
(60, 'Teknik Sipil Gedung E', 'Lantai 3', 'Teknik Sipil Gedung E Lantai 3.png', '2022-01-11 21:38:13', '2022-01-11 21:38:13'),
(61, 'Gedung Kuliah Bersama', 'Lantai 1', 'Gedung Kuliah Bersama Lantai 1.png', '2022-01-11 21:42:49', '2022-01-11 21:42:49'),
(62, 'Gedung Kuliah Bersama', 'Lantai 2', 'Gedung Kuliah Bersama Lantai 2.png', '2022-01-11 21:44:06', '2022-01-11 21:44:06'),
(63, 'Gedung Kuliah Bersama', 'Lantai 3', 'Gedung Kuliah Bersama Lantai 3.png', '2022-01-11 21:44:16', '2022-01-11 21:44:16'),
(64, 'Teknik Mesin Gedung B', 'Lantai 1', 'Teknik Mesin Gedung B Lantai 1.png', '2022-01-11 21:56:38', '2022-01-11 21:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2021_03_26_034735_create_lapor_insiden_table', 1),
(15, '2021_05_01_085831_create_kejadians_table', 1),
(16, '2021_05_17_085100_create_potensibahayas_table', 2),
(17, '2021_05_22_112411_create_potensibahayas_table', 3),
(18, '2021_06_22_095746_create_potensibahayas_table', 4),
(19, '2021_08_09_051751_create_lapor_insiden_table', 5),
(20, '2021_08_09_074405_create_lapor_insiden_tabel', 6),
(21, '2021_08_10_140329_create_penanggungjawab_tabel', 7),
(22, '2021_08_17_063841_create_penanggungjawab_tabel', 8),
(23, '2021_08_18_112934_create_penanggungjawabs_tabel', 9),
(24, '2021_08_18_122907_create_penanggungjawabs_tabel', 10),
(25, '2021_08_18_135136_create_penanggungjawabs_tabel', 11),
(26, '2021_08_18_135309_create_penanggungjawabs_tabel', 12),
(27, '2021_08_18_153209_create_penanggungjawabs', 13),
(28, '2021_08_18_153409_create_penanggungjawabs', 14),
(29, '2021_08_18_161123_create_penanggungjawabs_table', 15),
(30, '2021_08_19_095126_create_penanggungjawabs_table', 16),
(31, '2021_08_19_101324_create_penanggungjawabs_table', 17),
(32, '2021_08_19_101501_create_penanggungjawabs_table', 18),
(33, '2021_08_19_102027_create_penanggungjawabs_table', 19),
(34, '2021_08_19_142015_create_investigasis_table', 20),
(35, '2021_08_19_143248_create_penanggungjawabs_table', 21),
(36, '2021_08_19_144010_create_penanggungjawabs_table', 22),
(37, '2021_08_24_102214_create_users_table', 23),
(38, '2021_08_25_122519_create_users_table', 24),
(39, '2021_08_27_160954_create_maps_table', 25),
(40, '2021_09_06_045127_create_activities_table', 26),
(41, '2021_09_06_045618_create_controls_table', 27),
(42, '2021_09_06_050626_create_control_childrens_table', 28),
(43, '2021_09_06_051019_create_departemens_table', 29),
(44, '2021_09_06_051113_create_hazards_table', 30),
(45, '2021_09_06_051159_create_risks_table', 31),
(46, '2021_09_06_053115_create_activities_table', 32),
(47, '2021_09_06_053201_create_controls_table', 33),
(48, '2021_09_06_053226_create_control_childrens_table', 34),
(49, '2021_09_06_053317_create_departemens_table', 35),
(50, '2021_09_06_053341_create_hazards_table', 36),
(51, '2021_09_06_053422_create_risks_table', 37),
(52, '2021_09_06_053945_create_control_childrens_table', 38),
(53, '2021_09_06_054338_create_control_childrens_table', 39),
(54, '2021_09_06_111127_create_locations_table', 40),
(55, '2021_09_06_112712_create_locations_table', 41),
(57, '2021_09_06_123532_create_hirarcs_details_controls_table', 43),
(58, '2021_09_06_124708_create_hirarc_detail_controls_table', 44),
(59, '2021_09_06_125107_create_hirarc_detail_ratings_table', 45),
(60, '2021_09_11_103149_create_hirarc_ratingpres_table', 46),
(61, '2021_09_15_124618_create_hirarc_postcontrols_table', 47),
(62, '2021_09_15_125235_create_hirarc_postcontrols_table', 48),
(63, '2021_09_17_192902_create_hirarc_details_table', 49),
(64, '2021_09_17_194518_create_hirarc_details_table', 50),
(65, '2021_09_20_173142_create_inventorys_table', 51),
(66, '2021_09_21_121501_create_apar_inspections_table', 52),
(67, '2021_09_24_112537_create_p3k_inventories_table', 53),
(68, '2021_09_24_162629_create_p3ks_table', 54),
(69, '2021_09_24_163957_create_p3ks_table', 55),
(70, '2021_09_27_065932_create_home_simk3_table', 56),
(71, '2021_09_27_174300_create_data_kosong_table', 57),
(72, '2022_02_16_173934_deleted_table', 58),
(73, '2023_07_05_144736_create_location_masters_table', 59),
(74, '2023_07_05_145749_update_name_column_in_location_masters_table', 60),
(75, '2023_07_05_154451_create_activitie_masters_table', 61),
(76, '2023_07_05_154909_update_name_column_in_activitie_masters_table', 62),
(77, '2023_07_17_144923_update_location_masters_table', 63),
(78, '2023_07_24_144515_create_hirarcdetails_table', 64),
(79, '2023_08_18_092822_create_hirarcs_table', 65),
(80, '2019_12_14_000001_create_personal_access_tokens_table', 60),
(81, '2023_08_27_093605_create_dokumens_table', 66);

-- --------------------------------------------------------

--
-- Table structure for table `p2k3s`
--

CREATE TABLE `p2k3s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p2k3s`
--

INSERT INTO `p2k3s` (`id`, `user_id`, `nama`, `avatar`, `jabatan`, `departemen`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 1, 'Dimas Aldi', 'Dimas Aldi.jpg', 'Ketua', 'Teknik Komputer', '2021-08-26 06:55:26', '2023-08-25 08:59:27', NULL),
(10, 2, 'Dimdim', 'Dimdim.jpg', 'Penanggung Jawab II', 'Teknik Komputer', '2021-08-26 06:56:41', '2021-08-26 06:57:49', NULL),
(11, 5, 'Yanuar', 'Yanuar.png', 'Penanggung Jawab II', 'Teknik Kimia', '2021-08-26 06:58:15', '2023-08-25 08:59:38', NULL),
(13, 11, 'Caca', '1692959028_Screenshot (6).png', 'P2K3', 'Teknik Industri', '2023-08-25 03:23:49', '2023-08-25 03:25:47', '2023-08-25 03:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `p3ks`
--

CREATE TABLE `p3ks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `p3k_inventory_id` bigint(20) UNSIGNED NOT NULL,
  `departemen_id` bigint(20) UNSIGNED NOT NULL,
  `q1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q9` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q10` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q11` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q12` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q13` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q14` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q15` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q16` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q17` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q18` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q19` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q20` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q21` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q22` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q23` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q1_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q2_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q3_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q4_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q5_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q6_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q7_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q8_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q9_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q10_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q11_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q12_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q13_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q14_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q15_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q16_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q17_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q18_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q19_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q20_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q21_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q22_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q23_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p3ks`
--

INSERT INTO `p3ks` (`id`, `user_id`, `p3k_inventory_id`, `departemen_id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`, `q21`, `q22`, `q23`, `q1_desc`, `q2_desc`, `q3_desc`, `q4_desc`, `q5_desc`, `q6_desc`, `q7_desc`, `q8_desc`, `q9_desc`, `q10_desc`, `q11_desc`, `q12_desc`, `q13_desc`, `q14_desc`, `q15_desc`, `q16_desc`, `q17_desc`, `q18_desc`, `q19_desc`, `q20_desc`, `q21_desc`, `q22_desc`, `q23_desc`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 3, 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'bahan yang kuat', 'aa', 'bb', 'cc', 'dd', 'ee', 'ff', 'gg', 'hh', 'ii', 'jj', 'kk', 'll', 'mm', 'nn', 'oo', 'pp', 'qq', 'rr', 'ss', 'tt', 'uu', 'vv', '2021-09-24 20:40:33', '2021-09-25 00:54:33', NULL),
(2, 1, 2, 3, 'Ya', 'Ya', 'Tidak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bahan yang kuat', 'Kotak P3K mudah dibawa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-24 20:41:10', '2021-12-29 01:22:06', NULL),
(32, 4, 1, 3, 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-29 04:18:07', '2022-02-16 11:33:08', '2022-02-16 11:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `p3k_inventories`
--

CREATE TABLE `p3k_inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_benda_p3k` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_p3k` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_p3k` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_kadaluwarsa_p3k` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_p3k` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi_p3k` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kondisi_box_p3k` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_p3k` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p3k_inventories`
--

INSERT INTO `p3k_inventories` (`id`, `id_benda_p3k`, `name_p3k`, `tipe_p3k`, `departemen_id`, `tanggal_kadaluwarsa_p3k`, `lokasi_p3k`, `kondisi_p3k`, `kondisi_box_p3k`, `gambar_p3k`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Kotak P3K Tipe A', 'P3K', 3, '2021/09/30', 'Teknik Kimia Ruang 203', 'Kehabisan Stock', NULL, 'Kotak P3K Tipe A.png', '2021-09-24 07:36:00', '2021-09-24 07:36:00', NULL),
(2, '2', 'Kotak P3K Tipe B', 'P3K', 3, '2021/10/29', 'Teknik Kimia Ruang 207', 'Kondisi Baik', NULL, 'Kotak P3K Tipe A.png', '2021-09-24 07:36:37', '2021-09-24 19:50:52', NULL),
(3, '3', 'Kotak P3K Tipe C', 'P3K', 3, '2021/10/29', 'Teknik Kimia Ruang 207', 'Kondisi Baik', NULL, 'Kotak P3K Tipe A.png', '2021-09-24 07:38:23', '2021-09-24 19:51:00', NULL),
(7, '4', 'Kotak P3K Tipe B', 'P3K', 5, '2021/12/31', 'Teknik Mesin', 'Kondisi Baik', NULL, 'Kotak P3K Tipe B.png', '2021-12-31 09:35:16', '2022-02-16 11:17:56', '2022-02-16 11:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$/J5pJ4oBAT5PfDsLsROaQOfI13o7jE.tRIkzvH5Kq83pC1hjhBCo6', '2023-08-26 05:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `potensibahayas`
--

CREATE TABLE `potensibahayas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p2k3_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode_potensibahaya` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanda_pengenal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelapor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_pelapor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomer_telepon_pelapor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_kejadian` date NOT NULL,
  `kategori_pelapor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_pelapor_box` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institusi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_civitas_akademika_box` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `potensi_bahaya` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `potensi_bahaya_box` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_potensi_bahaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resiko_bahaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usulan_perbaikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `potensibahayas`
--

INSERT INTO `potensibahayas` (`id`, `p2k3_id`, `user_id`, `kode_potensibahaya`, `tanda_pengenal`, `nama_pelapor`, `email_pelapor`, `nip_nim`, `nomer_telepon_pelapor`, `waktu_kejadian`, `kategori_pelapor`, `kategori_pelapor_box`, `institusi`, `tujuan`, `departemen_id`, `unit_civitas_akademika_box`, `lokasi`, `potensi_bahaya`, `potensi_bahaya_box`, `deskripsi_potensi_bahaya`, `resiko_bahaya`, `usulan_perbaikan`, `gambar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 6, 'PTNSBHYA-1', '', 'Razer', 'dimasaldi619@gmail.com', '21120117130058', '086736473643', '2021-09-19', 'Mahasiswa', NULL, 'Fakultas Teknik', 'Teknik Komputer', 6, NULL, 'Teknik Kimia Kelas D240', NULL, NULL, 'Kursi roboh mengakibatkan mahasiswa terjatuh dari kursi', 'Kursi Rusak', 'Kursi di perbaiki', 'Razer.jpg', 3, '2021-09-20 09:22:53', '2023-08-25 03:19:19', NULL),
(2, 2, 1, 'PTNSBHYA-2', '', 'Krez', '', '21120117130058', '086778677', '2021-12-23', 'Mahasiswa', NULL, 'Fakultas Teknik', 'aaaaa', 3, NULL, 'Teknik Kimia Kelas D250', 'Biologis', NULL, 'Lalalala', 'bbb', 'bbb', 'Krez.png', 2, '2021-12-23 09:17:11', '2022-01-01 06:39:31', NULL),
(3, NULL, 1, 'PTNSBHYA-3', '', 'Miu', '', '21120117130051', '0897458475834', '2021-12-23', 'Mahasiswa', NULL, 'Fakultas Teknik', 'aa', 3, NULL, 'Teknik Kimia Kelas D250', 'Biologis', NULL, 'aa', 'aa', 'aa', 'Miu.png', 1, '2021-12-23 09:21:16', '2021-12-23 09:21:16', NULL),
(4, NULL, 1, 'PTNSBHYA-4', '', 'bayu', '', '21120117130066', '0878676756', '2021-12-24', 'Karyawan', NULL, 'Fakultas Teknik', 'aaa', 4, NULL, 'Teknik Kimia Kelas D250', 'Biologis', NULL, 'aaa', 'aa', 'aa', 'bayu.png', 1, '2021-12-23 09:25:52', '2021-12-23 09:25:52', NULL),
(5, NULL, 1, 'PTNSBHYA-5', '', 'dimdimdum', '', '21120117130057', '08594859449', '2021-12-30', 'Mahasiswa', NULL, 'Fakultas Teknik', 'aaaa', 6, NULL, 'Teknik Kimia Kelas D250', 'Biologis', NULL, 'aaaa', 'Kursi Rusak', 'aaaaa', 'dimdimdum.png', 1, '2021-12-30 01:35:40', '2021-12-30 01:35:40', NULL),
(6, 0, 4, 'PTNSBHYA-6', 'king.jpg', 'king', 'king@gmail.com', '21120117130057', '085934583485734', '2021-12-30', 'Mahasiswa', NULL, 'Fakultas Teknik', 'ke rumah', 2, NULL, 'Teknik Kimia Kelas D250', 'Biologis', NULL, 'aaa', 'aa', 'aa', 'king.png', 1, '2021-12-30 01:41:16', '2022-02-01 05:49:54', NULL),
(8, NULL, NULL, 'PTNSBHYA-7', 'Hizky.png', 'Hizky', '', '21120117130057', '08786786', '2022-02-01', 'Mahasiswa', NULL, 'Fakultas Teknik', 'aaaa', 3, NULL, 'Teknik Kimia Kelas D250', 'Biologis', NULL, 'aaa', 'aaa', 'aaa', 'Hizky.jpg', 1, '2022-02-01 03:44:59', '2022-02-01 03:44:59', NULL),
(12, NULL, NULL, 'PTNSBHYA-9', 'Jexy.jpg', 'Jexy', '', '21120117130057', '08954758784', '2022-02-01', 'Tamu', NULL, 'Fakultas Teknik', 'aaa', 2, NULL, 'Teknik Arsitektur Kelas D203', 'Ergonomi', NULL, 'aa', 'aa', 'aa', 'Jexy.png', 1, '2022-02-01 03:52:04', '2022-02-01 03:52:04', NULL),
(13, 0, 6, 'PTNSBHYA-13', 'Della Putri.png', 'Della Putri', 'della.putryz@gmail.com', '21120117130057', '08596594684', '2022-02-02', 'Tamu', NULL, 'Fakultas Teknik', 'aaa', 2, NULL, 'aaa', 'Kimiawi', NULL, 'aa', 'aa', 'aa', 'Della Putri.png', 1, '2022-02-01 04:48:52', '2023-08-25 03:03:48', '2023-08-25 03:03:48'),
(14, NULL, NULL, 'PTNSBHYA-14', 'Rui.png', 'Rui', 'Rui@gmail.com', '21120117130057', '0896756755', '2022-02-01', 'Mahasiswa', NULL, 'Fakultas Teknik', 'aaaaa', 2, NULL, 'Teknik Arsitektur Kelas D203', 'Ergonomi', NULL, 'aa', 'aa', 'aa', 'Rui.jpg', 1, '2022-02-01 05:54:15', '2022-02-16 11:35:11', '2022-02-16 11:35:11'),
(15, NULL, 9, 'PTNBHYA-14', '1692957653_FjsHi3Eyxb.png', 'afifa', 'afifahumaira@students.undip.ac.id', '21120000000', '081234567890', '2023-08-25', 'Mahasiswa', NULL, 'Teknik Komputer', 'Kuliah', NULL, 'Mahasiswa', 'Laboratorium Komputasi', 'Fisik', NULL, 'Tertimpa', 'Pingsan', 'diberi pagar di sekit area pembangunan', '1692957653_39J3thBWVp.png', 1, '2023-08-25 03:00:53', '2023-08-25 08:41:31', NULL),
(16, 10, 9, 'PTNBHYA-15', '1693028121_snZath1fyu.png', 'sayid', 'user/Sayidmiqdad@gmail.com', '21122112', '0812123456789', '2023-08-26', 'Tamu', NULL, 'Fakultas Teknik', 'lihat-lihat', NULL, 'Tamu', 'Gedung baru', 'Psikologi', NULL, 'panick attack', 'Pingsan', 'dipindahkan', '1693028120_pF8UFesmRw.png', 2, '2023-08-25 22:35:21', '2023-08-26 01:01:32', NULL),
(17, NULL, NULL, 'PTNBHYA-16', '1693054586_hqnqG9qNUG.png', 'test', 'user/Sayidmiqdad@gmail.com', '2112', '0812123456789', '2023-08-26', 'Mahasiswa', NULL, 'Fakultas Teknik', 'Kuliah', NULL, 'Tamu', 'test', 'Biologis', NULL, 'test', 'test', 'test', '1693054586_7PH0fID04B.png', 1, '2023-08-26 05:56:26', '2023-08-26 05:56:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `risks`
--

CREATE TABLE `risks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `risks`
--

INSERT INTO `risks` (`id`, `name`) VALUES
(1, 'Dapat merusak alat-alat elektronik'),
(2, 'Kondisi gelap yang menghambat pekerjaan dan membahayakan keselamatan'),
(3, 'Dapat menyebabkan seseorang tersandung atau terluka'),
(4, 'Hubungan arus pendek pada stop kontak atau kabel pada peralatan elektronik dapat menyebabkan kebakaran'),
(5, 'Tersengat listrik'),
(6, 'Radiasi dari layar komputer dapat membuat mata lelah'),
(7, 'Pada siang hari, ruang kelas terasa panas dan gerah. Dapat menyebabkan dehidrasi dan merusak mata'),
(8, 'Tergelincir dan cedera ringan'),
(9, 'Kelalaian dalam penggunaan peralatan ruangan secara tidak tepat dalam melakukan kegiatan'),
(10, 'Kehilangan barang dalam ruangan'),
(11, 'Peralatan ruangan  yang berantakan dapat menyebabkan seseorang tergelincir, jatuh, tersandung, atau bahkan melukai seseorang'),
(12, 'Dapat menyebabkan pekerja jatuh hingga meninggal'),
(13, 'Paparan terhadap bau dan bahan kimia terkena kulit'),
(14, 'Kurangnya kenyamanan ruang gerak'),
(15, 'Barang-barang di dalam lab yang berantakan'),
(16, 'Iritasi mata'),
(17, 'Mata lelah, error meningkat'),
(18, 'Tidak nyaman, kurang konsentrasi, dehidrasi'),
(19, 'Dalam situasi darurat akan sulit memadamkan api serta mengendalikan kebakaran kecil'),
(20, 'Sulit melakukan pertolongan pertama jika ada yang mengalami kecelakaan'),
(21, 'dapat menyebabkan orang tersandung atau terluka serta gangguan estetika'),
(22, 'Kinerja server menurun akibat panas'),
(23, 'Tidak nyaman'),
(24, 'Teks di papan tulis tidak terbaca'),
(25, 'Semangat belajar menurun');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `hak_akses`, `email`, `departemen_id`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dimas Aldi', 'admin', 'dimasaldi619@gmail.com', NULL, 'Dimas Aldi.png', NULL, '$2y$10$11LSY8EJbkIXo7t1e6Dyfu1HxrU6us51TJdnYkMEz1iyc.Ye7Pmqe', NULL, '2021-08-25 05:50:29', '2023-08-25 08:59:27', NULL),
(2, 'Dimdim', 'p2k3', 'dimasaldy999@gmail.com', NULL, 'default.png', NULL, '$2y$10$SE9cAAN4RZtDGGPY2fcxF.O2tQwZmY2qmYo5aRB/X6codeE6bkQSa', NULL, '2021-08-26 00:01:35', '2021-12-28 06:24:08', NULL),
(3, 'Erik', 'pimpinan', 'erych.milanisty@gmail.com', NULL, 'default.png', NULL, '$2y$10$qDgQe4wUTa/arBLxwL0Uw.kVUUTk1aA.7CrmpyAhPZHGFzcW9iA1q', NULL, '2021-08-26 02:06:24', '2021-12-20 02:53:45', NULL),
(4, 'Elang', 'k3_departemen', 'Elang999@gmail.com', 2, 'default.png', NULL, '$2y$10$ZD2a6wM2djnma.DW1KmGCuPejZM5L4uvh9uH9cpBNVXlqKNsbMQz.', NULL, '2021-08-26 06:48:03', '2021-12-21 04:03:47', NULL),
(5, 'Yanuar', 'p2k3', 'yanuar999@gmail.com', NULL, 'default.png', NULL, '$2y$10$gD./WmFdjRp2brvc20f/6e/Ai5tkj4WaOu3sZ80reF3GZbE0SIV.O', NULL, '2021-08-26 06:48:30', '2023-08-25 08:59:38', NULL),
(6, 'Della Putri', 'tamu', 'della.putryz@gmail.com', NULL, 'default.png', NULL, '$2y$10$uCljbVJB3AWa4Ft4n7hMHePAVe811JYS1mUhuRQGtwlMPgUQYGQRS', NULL, '2021-09-07 03:44:20', '2022-01-20 01:47:20', NULL),
(7, 'Rizky Febian', 'tamu', 'rizkyfebian@gmail.com', NULL, 'default.png', NULL, '$2y$10$91yCL5U76muG5Aob7iTZRucrCz.JFSZT7kEJzQ58MZrWf51qkHena', NULL, '2022-01-01 08:17:23', '2022-02-16 10:52:15', '2022-02-16 10:52:15'),
(9, 'admin', 'admin', 'admin@admin.com', 12, 'default.png', NULL, '$2a$12$nclzDODTdYwn8GVNKM/YK.Y1jYPJCamsXUZ9MKp4q8owcv2Dc.HTC', NULL, NULL, NULL, NULL),
(11, 'Caca', 'K3 Departemen', 'buatapaaja311@gmail.com', 6, '1692959416_Screenshot (6).png', NULL, '$2y$10$dzqWkNrP79hB3VCJQcZo9O1CRzynRk/3np27D5MnqSIQnNQ2iI0n2', NULL, '2023-08-25 03:23:48', '2023-08-25 03:31:00', '2023-08-25 03:31:00'),
(12, 'afifa', 'K3 Departemen', 'afifahumaira1@gmail.com', 4, 'default.png', NULL, '$2y$10$X4OLYA8IQsYJdzs8W0wJaOYvP3YxhAw6utkEB4oaXx.JFzcAqo5di', NULL, '2023-08-25 03:46:19', '2023-08-25 09:02:34', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_dashboard`
-- (See below for the actual view)
--
CREATE TABLE `vw_dashboard` (
`bulan` varchar(9)
,`jumlah` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_dashboard`
--
DROP TABLE IF EXISTS `vw_dashboard`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_dashboard`  AS SELECT monthname(`laporinsidens`.`created_at`) AS `bulan`, count(`laporinsidens`.`kronologi`) AS `jumlah` FROM `laporinsidens` GROUP BY month(`laporinsidens`.`created_at`)  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activitie_masters`
--
ALTER TABLE `activitie_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apars`
--
ALTER TABLE `apars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apar_inspections_user_id_foreign_key` (`user_id`),
  ADD KEY `apar_inspections_inventory_id_foreign_key` (`inventory_id`),
  ADD KEY `apars_ke_departemen` (`departemen_id`);

--
-- Indexes for table `controls`
--
ALTER TABLE `controls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `control_childrens`
--
ALTER TABLE `control_childrens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `control_childrens_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `departemens`
--
ALTER TABLE `departemens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumens`
--
ALTER TABLE `dokumens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hazards`
--
ALTER TABLE `hazards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hirarcs`
--
ALTER TABLE `hirarcs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hirarcs_ke_users` (`user_id`),
  ADD KEY `hirarcs_ke_departemen` (`departemen_id`),
  ADD KEY `hirarcs_ke_location` (`location_id`);

--
-- Indexes for table `hirarc_detail_controls`
--
ALTER TABLE `hirarc_detail_controls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hirarc_postratings`
--
ALTER TABLE `hirarc_postratings`
  ADD PRIMARY KEY (`hirarc_detail_id`),
  ADD KEY `postrating_ke_hirarc_id` (`hirarc_id`);

--
-- Indexes for table `hirarc_preratings`
--
ALTER TABLE `hirarc_preratings`
  ADD PRIMARY KEY (`hirarc_detail_id`),
  ADD KEY `prerating_ke_hirarcs` (`hirarc_id`);

--
-- Indexes for table `home_simk3s`
--
ALTER TABLE `home_simk3s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventories_departemen_id_foreign_key` (`departemen_id`);

--
-- Indexes for table `investigasis`
--
ALTER TABLE `investigasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invesitgasi_ke_laporinsiden` (`laporinsiden_id`),
  ADD KEY `invesitgasi_ke_departemen` (`departemen_id`),
  ADD KEY `investigasi_ke_p2k3s` (`p2k3_id`);

--
-- Indexes for table `laporinsidens`
--
ALTER TABLE `laporinsidens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporinsiden_ke_user_id` (`user_id`),
  ADD KEY `laporinsiden_ke_departemen_id` (`departemen_id`),
  ADD KEY `laporinsiden_ke_p2k3s` (`p2k3_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_departement_id_foreign` (`departemen_id`);

--
-- Indexes for table `location_masters`
--
ALTER TABLE `location_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p2k3s`
--
ALTER TABLE `p2k3s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penanggungjawabs_user_id_foreign` (`user_id`);

--
-- Indexes for table `p3ks`
--
ALTER TABLE `p3ks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p3ks_user_id_foreign` (`user_id`),
  ADD KEY `p3ks_p3k_inventory_id_foreign` (`p3k_inventory_id`),
  ADD KEY `p3ks_ke_departemen_id` (`departemen_id`);

--
-- Indexes for table `p3k_inventories`
--
ALTER TABLE `p3k_inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p3k_inventories_departemen_id_foreign_key` (`departemen_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `potensibahayas`
--
ALTER TABLE `potensibahayas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `potensibahaya_ke_user_id` (`user_id`),
  ADD KEY `potensibahaya_ke_departemen_id` (`departemen_id`),
  ADD KEY `potensibahaya_ke_p2k3s` (`p2k3_id`);

--
-- Indexes for table `risks`
--
ALTER TABLE `risks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `user_ke_departemen` (`departemen_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `activitie_masters`
--
ALTER TABLE `activitie_masters`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `apars`
--
ALTER TABLE `apars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `controls`
--
ALTER TABLE `controls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `control_childrens`
--
ALTER TABLE `control_childrens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `departemens`
--
ALTER TABLE `departemens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dokumens`
--
ALTER TABLE `dokumens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hazards`
--
ALTER TABLE `hazards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `hirarcs`
--
ALTER TABLE `hirarcs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `hirarc_detail_controls`
--
ALTER TABLE `hirarc_detail_controls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hirarc_postratings`
--
ALTER TABLE `hirarc_postratings`
  MODIFY `hirarc_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `hirarc_preratings`
--
ALTER TABLE `hirarc_preratings`
  MODIFY `hirarc_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `home_simk3s`
--
ALTER TABLE `home_simk3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `investigasis`
--
ALTER TABLE `investigasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `laporinsidens`
--
ALTER TABLE `laporinsidens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `location_masters`
--
ALTER TABLE `location_masters`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `p2k3s`
--
ALTER TABLE `p2k3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `p3ks`
--
ALTER TABLE `p3ks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `p3k_inventories`
--
ALTER TABLE `p3k_inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `potensibahayas`
--
ALTER TABLE `potensibahayas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `risks`
--
ALTER TABLE `risks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apars`
--
ALTER TABLE `apars`
  ADD CONSTRAINT `apar_inspections_inventory_id_foreign_key` FOREIGN KEY (`inventory_id`) REFERENCES `inventories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apar_inspections_user_id_foreign_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apars_ke_departemen` FOREIGN KEY (`departemen_id`) REFERENCES `departemens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `control_childrens`
--
ALTER TABLE `control_childrens`
  ADD CONSTRAINT `control_childrens_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `controls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
