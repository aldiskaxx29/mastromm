-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Feb 2022 pada 07.44
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mastrom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_produk`
--

CREATE TABLE `detail_produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `min_pesan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `detail_produk`
--

INSERT INTO `detail_produk` (`id`, `min_pesan`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Produk ini tahan panas walau dipakai lama.', '2021-11-16 23:34:34', '2021-11-16 23:34:34', NULL),
(2, '12', 'Produk ini bergaransi 1 tahun', '2021-11-16 23:35:11', '2021-11-16 23:35:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `transaksi_id`, `produk_id`, `qty`, `sub_total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(74, 77, 2, 2, 171875, '2022-02-08 03:10:50', '2022-02-08 03:10:50', NULL),
(75, 77, 1, 2, 31250, '2022-02-08 03:10:51', '2022-02-08 03:10:51', NULL),
(76, 78, 1, 1, 31250, '2022-02-08 03:16:35', '2022-02-08 03:16:35', NULL),
(77, 79, 1, 1, 31250, '2022-02-08 03:17:59', '2022-02-08 03:17:59', NULL),
(78, 79, 2, 1, 171875, '2022-02-08 03:17:59', '2022-02-08 03:17:59', NULL),
(79, 80, 1, 6, 31250, '2022-02-08 03:24:53', '2022-02-08 03:24:53', NULL),
(80, 80, 2, 6, 171875, '2022-02-08 03:24:53', '2022-02-08 03:24:53', NULL),
(81, 81, 1, 2, 31250, '2022-02-08 04:39:13', '2022-02-08 04:39:13', NULL),
(82, 82, 1, 1, 31250, '2022-02-08 04:40:59', '2022-02-08 04:40:59', NULL),
(83, 83, 1, 2, 31250, '2022-02-08 04:42:11', '2022-02-08 04:42:11', NULL),
(84, 84, 1, 1, 31250, '2022-02-08 04:43:04', '2022-02-08 04:43:04', NULL),
(85, 85, 1, 2, 62500, '2022-02-11 02:42:23', '2022-02-11 02:42:23', NULL),
(86, 86, 1, 1, 56250, '2022-02-12 00:22:59', '2022-02-12 00:22:59', NULL),
(87, 87, 1, 1, 56250, '2022-02-12 00:34:35', '2022-02-12 00:34:35', NULL),
(88, 88, 3, 1, 350000, '2022-02-12 00:36:51', '2022-02-12 00:36:51', NULL),
(89, 89, 1, 2, 56250, '2022-02-12 00:42:27', '2022-02-12 00:42:27', NULL),
(90, 89, 3, 2, 350000, '2022-02-12 00:42:27', '2022-02-12 00:42:27', NULL),
(91, 90, 1, 4, 225000, '2022-02-12 00:48:19', '2022-02-12 00:48:19', NULL),
(92, 90, 3, 2, 700000, '2022-02-12 00:48:19', '2022-02-12 00:48:19', NULL),
(93, 91, 1, 1, 56250, '2022-02-12 01:05:02', '2022-02-12 01:05:02', NULL),
(94, 92, 1, 2, 112500, '2022-02-12 04:42:27', '2022-02-12 04:42:27', NULL),
(95, 93, 1, 1, 56250, '2022-02-12 04:44:48', '2022-02-12 04:44:48', NULL),
(96, 94, 1, 1, 56250, '2022-02-12 04:47:26', '2022-02-12 04:47:26', NULL),
(97, 95, 1, 2, 112500, '2022-02-12 04:51:19', '2022-02-12 04:51:19', NULL),
(98, 95, 4, 1, 787500, '2022-02-12 04:51:19', '2022-02-12 04:51:19', NULL),
(99, 96, 1, 1, 56250, '2022-02-12 04:54:28', '2022-02-12 04:54:28', NULL),
(100, 96, 4, 1, 787500, '2022-02-12 04:54:28', '2022-02-12 04:54:28', NULL);

--
-- Trigger `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `stok_produk` AFTER INSERT ON `detail_transaksi` FOR EACH ROW BEGIN
UPDATE produk
SET stok = stok - NEW.qty
WHERE id = NEW.produk_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_users`
--

CREATE TABLE `detail_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `nama_alternatif` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon_alternatif` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_alternatif` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `detail_users`
--

INSERT INTO `detail_users` (`id`, `users_id`, `nama_alternatif`, `no_telepon_alternatif`, `alamat_alternatif`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'Song Jung Ki', '084545639854', 'Unpam, Tangerang Selatan', '2022-01-21 21:58:26', '2022-01-21 21:58:26', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `foto_kategori`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'VRLA Battery', 'Ms 4,5-6v.jpg', '2021-11-16 23:33:13', '2021-11-16 23:33:13', NULL),
(2, 'Gel Battery', '12v 100ah.jpg', '2021-11-16 23:33:46', '2021-11-16 23:33:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_level` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `nama_level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Master', '2021-11-16 22:45:00', '2021-11-16 22:45:00', NULL),
(2, 'Supervisor', '2021-11-16 22:45:00', '2021-11-16 22:45:00', NULL),
(3, 'Admin', '2022-02-01 11:20:09', '2022-02-01 11:20:09', NULL),
(4, 'Bronze', '2022-02-01 11:20:26', '2022-02-01 11:20:26', NULL),
(5, 'Silver', '2022-02-01 11:20:40', '2022-02-01 11:20:40', NULL),
(6, 'Gold', '2022-02-01 11:20:54', '2022-02-01 11:20:54', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `merek`
--

CREATE TABLE `merek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merek` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `merek`
--

INSERT INTO `merek` (`id`, `merek`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'MAXSTROM', '2021-11-16 23:32:41', '2021-11-16 23:32:41', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_08_15_035821_create_kategori_table', 1),
(6, '2021_08_15_035848_create_merek_table', 1),
(7, '2021_08_15_035917_create_produk_table', 1),
(8, '2021_08_15_035955_create_detail_produk_table', 1),
(9, '2021_08_15_040016_create_promo_table', 1),
(10, '2021_08_15_040108_create_keranjang_table', 1),
(11, '2021_08_15_040122_create_transaksi_table', 1),
(12, '2021_08_15_040201_create_detail_transaksi_table', 1),
(13, '2021_08_15_040226_create_invoice_table', 1),
(14, '2021_08_15_040302_create_laporan_table', 1),
(15, '2021_10_23_123557_create_level_table', 1),
(16, '2021_11_17_050545_create_detail_users_table', 1),
(17, '2021_11_17_052702_add_relationships_to_users_table', 1),
(18, '2021_11_17_052757_add_relationships_to_produk_table', 1),
(19, '2021_11_17_052937_add_relationships_to_keranjang_table', 1),
(20, '2021_11_17_053057_add_relationships_to_detail_users_table', 1),
(21, '2021_11_17_053228_add_relationships_to_transaksi_table', 1),
(22, '2021_11_17_053348_add_relationships_to_detail_transaksi_table', 1),
(23, '2021_11_17_053516_add_relationships_to_invoice_table', 1),
(24, '2021_11_17_053613_add_relationships_to_laporan_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED DEFAULT NULL,
  `merek_id` bigint(20) UNSIGNED DEFAULT NULL,
  `promo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `detail_produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode_produk` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint(20) NOT NULL,
  `harga_promo` bigint(20) DEFAULT NULL,
  `foto_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `merek_id`, `promo_id`, `detail_produk_id`, `kode_produk`, `nama_produk`, `harga`, `harga_promo`, `foto_produk`, `stok`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, 'PDK001', 'Maxstrom UPS / VRLA Battery NP4.5-4', 62500, NULL, '4,5 ah 4v.jpg', 31, '2021-11-16 16:36:22', '2021-11-16 16:36:22', NULL),
(2, 1, 1, 1, 1, 'PDK002', 'Maxstrom Electric Vehicle Battery 6 DZM 12', 343750, NULL, '6-DZF 12.jpg', 385, '2021-11-16 16:37:22', '2021-11-16 16:37:22', NULL),
(3, 1, 1, 2, 1, 'PDK003', 'Maxstrom Electric Vehicle Battery 6 DZM 20', 500000, NULL, '6DZF 20.jpg', 437, '2021-11-16 16:38:29', '2021-11-16 16:38:29', NULL),
(4, 1, 1, 2, 2, 'PDK004', 'Maxstrom Electric Vehicle Battery 6 EVF 45', 1125000, NULL, '12v 45.jpg', 480, '2021-11-16 16:39:29', '2021-11-16 16:39:29', NULL),
(5, 1, 1, 2, 1, 'PDK005', 'Maxstrom UPS / VRLA Battery NP1.2-6', 87500, NULL, '1,2ah-6v.jpg', 976, '2021-11-16 16:40:33', '2021-11-16 16:40:33', NULL),
(6, 2, 1, 3, 2, 'PDK006', 'Motorcycle Fit Gel Batteries GEL100-12', 2250000, NULL, '12v 100ah.jpg', 246, '2021-11-16 16:41:24', '2021-11-16 16:41:24', NULL),
(7, 2, 1, 3, 2, 'PDK007', 'Motorcycle Fit Gel Batteries GEL120-12', 2750000, NULL, '12v 120.jpg', 534, '2021-11-16 16:42:40', '2021-11-16 16:42:40', NULL),
(8, 2, 1, 3, 2, 'PDK008', 'Motorcycle Fit Gel Batteries GEL150-12', 3500000, NULL, '12v 150ah.jpg', 684, '2021-11-16 16:43:23', '2021-11-16 16:43:23', NULL),
(9, 2, 1, 3, 2, 'PDK009', 'Motorcycle Fit Gel Batteries GEL200-12', 4375000, NULL, '12v 200.jpg', 1482, '2021-11-16 16:44:13', '2021-11-16 16:44:13', NULL),
(10, 1, 1, 1, 2, 'PDK010', 'Motorcycle Fit UPS / VRLA Battery NP 42-12', 1062500, NULL, '12v 42ah.jpg', 294, '2021-11-16 16:45:06', '2021-11-16 16:45:06', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `promo_bronze` tinyint(4) NOT NULL DEFAULT 0,
  `promo_silver` tinyint(4) NOT NULL DEFAULT 0,
  `promo_gold` tinyint(4) NOT NULL DEFAULT 0,
  `foto_promo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id`, `promo_bronze`, `promo_silver`, `promo_gold`, `foto_promo`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 10, 50, 'promo1.png', 1, '2021-11-16 23:31:46', '2021-11-16 23:31:46', NULL),
(2, 10, 30, 50, 'promo2.png', 1, '2021-11-16 23:31:58', '2021-11-16 23:31:58', NULL),
(3, 0, 0, 50, 'promo3.png', 0, '2021-11-16 23:32:11', '2022-01-15 09:10:49', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` char(255) NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `total_produk` int(11) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `nama_penerima` char(50) NOT NULL,
  `no_telepon_penerima` char(13) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `pembayaran` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_transaksi`, `users_id`, `total_produk`, `total_harga`, `status`, `nama_penerima`, `no_telepon_penerima`, `alamat_penerima`, `pembayaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
(77, 'INV/20220208/728', 15, 4, 406250, 0, 'verdian nih bos', '09686212424', 'tangerang', NULL, '2022-02-08 03:10:50', '2022-02-08 03:10:51', NULL),
(78, 'INV/20220208/350', 15, 1, 31250, 0, 'verdian', '09686212424', 'tangerang', NULL, '2022-02-08 03:16:35', '2022-02-08 03:16:35', NULL),
(79, 'INV/20220208/821', 15, 2, 203125, 0, 'verdian aldama', '09686212424', 'tangerang', NULL, '2022-02-08 03:17:59', '2022-02-08 03:17:59', NULL),
(80, 'INV/20220208/459', 15, 12, 1218750, 0, 'verdian', '09686212424', 'tangerang', NULL, '2022-02-08 03:24:53', '2022-02-08 03:24:53', NULL),
(81, 'INV/20220208/742', 15, 2, 62500, 1, 'verdian langsung beli', '09686212424', 'tangerang', NULL, '2022-02-08 04:39:13', '2022-02-08 04:39:13', NULL),
(82, 'INV/20220208/945', 15, 1, 31250, 0, 'verdian beli beli', '09686212424', 'tangerang', NULL, '2022-02-08 04:40:59', '2022-02-08 04:40:59', NULL),
(83, 'INV/20220208/631', 15, 2, 62500, 0, 'verdian', '09686212424', 'tangerang', NULL, '2022-02-08 04:42:11', '2022-02-08 04:42:11', NULL),
(84, 'INV/20220208/310', 15, 1, 31250, 0, 'verdian', '09686212424', 'tangerang', NULL, '2022-02-08 04:43:04', '2022-02-08 04:43:04', NULL),
(85, 'INV/20220211/471', 15, 2, 125000, 0, 'verdian', '09686212424', 'tangerang', NULL, '2022-02-11 02:42:23', '2022-02-11 02:42:23', NULL),
(86, 'INV/20220212/886', 15, 1, 56250, 0, 'verdian', '09686212424', 'tangerang', NULL, '2022-02-12 00:22:59', '2022-02-12 00:22:59', NULL),
(87, 'INV/20220212/497', 15, 1, 56250, 0, 'verdian nih bos', '09686212424', 'tangerang', NULL, '2022-02-12 00:34:35', '2022-02-12 00:34:35', NULL),
(88, 'INV/20220212/876', 15, 1, 350000, 0, 'verdian', '09686212424', 'tangerang', 1, '2022-02-12 00:36:51', '2022-02-12 00:36:51', NULL),
(89, 'INV/20220212/282', 15, 4, 812500, 0, 'verdian', '09686212424', 'tangerang', 1, '2022-02-12 00:42:27', '2022-02-12 00:42:27', NULL),
(90, 'INV/20220212/127', 15, 6, 925000, 0, 'aldi setiawan', '09686212424', 'indonesia', 3, '2022-02-12 00:48:19', '2022-02-12 00:48:19', NULL),
(91, 'INV/20220212/869', 15, 1, 56250, 0, 'verdian', '09686212424', 'tangerang', 1, '2022-02-12 01:05:02', '2022-02-12 01:05:02', NULL),
(92, 'INV/20220212/683', 15, 2, 112500, 0, 'verdian beli beli', '09686212424', 'tangerang', 2, '2022-02-12 04:42:27', '2022-02-12 04:42:28', NULL),
(93, 'INV/20220212/104', 15, 1, 56250, 0, 'verdian', '09686212424', 'tangerang', 1, '2022-02-12 04:44:48', '2022-02-12 04:44:48', NULL),
(94, 'INV/20220212/529', 15, 1, 56250, 0, 'verdian', '09686212424', 'tangerang', 1, '2022-02-12 04:47:26', '2022-02-12 04:47:26', NULL),
(95, 'INV/20220212/245', 15, 3, 900000, 0, 'verdian', '09686212424', 'tangerang', 1, '2022-02-12 04:51:19', '2022-02-12 04:51:19', NULL),
(96, 'INV/20220212/164', 15, 2, 843750, 0, 'verdian', '09686212424', 'tangerang', 1, '2022-02-12 04:54:28', '2022-02-12 04:54:28', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `toko` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telepon` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '8afc319537215ad71754fe27fbdd43ed.jp',
  `status` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `toko`, `level_id`, `email`, `username`, `password`, `no_telepon`, `alamat`, `foto_user`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Master', NULL, 1, 'admin@mail.com', 'admin', '$2a$12$RgJaCBxbEFSbRFZ1JMJZWuizX6q4AJwkho/apkORqxwGnL9xTzzFy', '081219070117', 'Cimone, Tangerang', '61ebbbea8fbde.jpg', 1, NULL, '2022-01-21 21:24:36', '2022-01-22 01:10:18', NULL),
(2, 'aldi1', 'samudera', 5, 'aldi@gmail.com', 'aldi123', '$2y$10$Cq.3GXdYh0FbSleStkzZf.vQMWkTwavDwJyeEmbQW1KrQYnvN48LW', '0987666789876', 'tangerang', '61eb88d4ebdba.png', 1, NULL, '2022-01-21 21:25:10', '2022-02-08 05:14:02', NULL),
(3, 'Customer 1', 'Toko 1', 6, 'toko1@mail.com', 'toko1', '$2y$10$zbcX8dktOHxnjqOk4xpchOzbeEo7YPp605hauU2u/89XQGzOBsoSS', '081245456789', 'Unpam, Tangerang Selatan', '61eb8dec22d0b.jpeg', 1, NULL, '2022-01-21 21:30:11', '2022-01-21 21:30:11', NULL),
(5, 'lutfi', 'sbn', 5, 'lutfi@gmail.com', 'lutfi123', '$2y$10$lkUAzkr/yV8jtswLhGA.A.A66HmyUNPGpN7ugTWDqbVp6eEX9yfEW', '098676576878', 'tangerang', '61eb8dec22d0b.jpeg', 1, NULL, '2022-01-21 21:49:58', '2022-01-21 21:54:04', NULL),
(6, 'feri', 'sss', 5, 'feri@gmail.com', 'feri123', '$2y$10$pLWNTY7IQFD3rSYa/RxH2.Z2iylCi3Z9MCHj1Q3dw696Ll21SUjJu', '098776267987', 'tangreang', '61eb9bd34d544.jpeg', 1, NULL, '2022-01-21 22:49:37', '2022-01-21 22:53:23', NULL),
(7, 'andri', 'ada', 2, 'andri@gmail.com', 'andir123', '$2y$10$95KvQEClCguZ88NVkNreduldREMNmTLAOJwpWezlMXbsg1OUiMbAK', '0989898989', 'tangerang', '61eb9cfa04da0.jpeg', 1, NULL, '2022-01-21 22:55:04', '2022-01-21 22:58:18', NULL),
(8, 'adul', 'adas', 2, 'adul@gmail.com', 'adul123', '$2y$10$w5xDAEnh5/Iz8cnc43Kx7u0VtLTdFj7rODQvh55Lb4BfPHgYbBCVi', '098765654345', 'tangerang', '61eb9f49bf92a.jpeg', 1, NULL, '2022-01-21 23:02:26', '2022-01-21 23:08:09', NULL),
(9, 'alda', 'adew', 1, 'alda@gmail.com', 'alda', '$2y$10$pfoycpI8mdLrdVvhOpE3D.lwl7tGBnK9egd3dM1S2kxf.ECBtlUcm', '098776267987', 'tangerang', '61ebbd5debeb0.jpeg', 1, NULL, '2022-01-21 23:09:51', '2022-01-22 01:16:30', NULL),
(10, 'tester1', 'toko tester', 2, 'tester@gmail.com', 'tester', '$2y$10$zSWCt7py5/hMMqpOtgmoaudz5SZA02Ycdur6hnoWrU3V8QOpfFtD2', '0896565656565', 'cipondoh', '8afc319537215ad71754fe27fbdd43ed.jpg', 0, NULL, '2022-01-22 00:10:57', '2022-01-22 00:10:57', NULL),
(11, 'dummy', 'test', 2, 'test@gmail.com', 'dummy', '$2y$10$lC3W7rxL2vBZg8GrB3a.w.hSJ8/8ARuA.SODvXtbVqZWC0eCfN8Km', '08881488721', 'dummy', '8afc319537215ad71754fe27fbdd43ed.jpg', 0, NULL, '2022-01-22 00:12:36', '2022-01-22 00:12:36', NULL),
(14, 'Dummy', 'Dummy', 2, 'Dummy123@gmail.com', 'Dummy001', '$2y$10$hQNTv.j0Xn8F.l4d5ZAs8.8WiHUNMxweGZD/FG5zqBhCxPZn4Ehv6', '0881488734', 'jalan kembar', '61ebb46e09484.jpeg', 1, NULL, '2022-01-22 00:15:37', '2022-01-22 00:38:22', NULL),
(15, 'verdian', 'samarinda', 5, 'verdian@gmail.com', 'verdian', '$2y$10$fvNlbcVQIuR898ihGTxNLO6cibA63PQrUnnhFdlAZf32X3BZX2VDe', '09686212424', 'tangerang', 'default.png', 1, NULL, '2022-02-03 08:17:13', '2022-02-08 05:49:10', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `detail_transaksi_produk_id_foreign` (`produk_id`) USING BTREE,
  ADD KEY `detail_transaksi_transaksi_id_foreign` (`transaksi_id`) USING BTREE;

--
-- Indeks untuk tabel `detail_users`
--
ALTER TABLE `detail_users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `detail_users_users_id_foreign` (`users_id`) USING BTREE;

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `kategori_kategori_unique` (`kategori`) USING BTREE;

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `keranjang_users_id_foreign` (`users_id`) USING BTREE,
  ADD KEY `keranjang_produk_id_foreign` (`produk_id`) USING BTREE;

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `merek_merek_unique` (`merek`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `produk_kode_produk_unique` (`kode_produk`) USING BTREE,
  ADD UNIQUE KEY `produk_nama_produk_unique` (`nama_produk`) USING BTREE,
  ADD KEY `produk_kategori_id_foreign` (`kategori_id`) USING BTREE,
  ADD KEY `produk_merek_id_foreign` (`merek_id`) USING BTREE,
  ADD KEY `produk_promo_id_foreign` (`promo_id`) USING BTREE,
  ADD KEY `produk_detail_produk_id_foreign` (`detail_produk_id`) USING BTREE;

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `transaksi_users_id_foreign` (`users_id`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_toko_unique` (`toko`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE,
  ADD UNIQUE KEY `users_username_unique` (`username`) USING BTREE,
  ADD KEY `users_level_id_foreign` (`level_id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_produk`
--
ALTER TABLE `detail_produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `detail_users`
--
ALTER TABLE `detail_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `merek`
--
ALTER TABLE `merek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `promo`
--
ALTER TABLE `promo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `detail_transaksi_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_users`
--
ALTER TABLE `detail_users`
  ADD CONSTRAINT `detail_users_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `keranjang_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_detail_produk_id_foreign` FOREIGN KEY (`detail_produk_id`) REFERENCES `detail_produk` (`id`),
  ADD CONSTRAINT `produk_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`),
  ADD CONSTRAINT `produk_merek_id_foreign` FOREIGN KEY (`merek_id`) REFERENCES `merek` (`id`),
  ADD CONSTRAINT `produk_promo_id_foreign` FOREIGN KEY (`promo_id`) REFERENCES `promo` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
