-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 07:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistem_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `kode_produk` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `totalHarga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_belanjas`
--

CREATE TABLE `cart_belanjas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `kode_produk` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `totalHarga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `banyak_barang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `kategori`, `banyak_barang`, `created_at`, `updated_at`) VALUES
(1, 'Paku', 1, '2023-04-23 00:07:46', '2023-04-23 00:07:46'),
(3, 'Besi', 1, '2023-04-25 03:48:17', '2023-04-25 03:48:17'),
(7, 'Genting', 0, '2023-05-14 06:44:31', '2023-05-14 06:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_pembelian_details`
--

CREATE TABLE `laporan_pembelian_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `banyak_barang` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan_pembelian_details`
--

INSERT INTO `laporan_pembelian_details` (`id`, `transaksi_id`, `kode_barang`, `nama_barang`, `harga_beli`, `banyak_barang`, `total_harga`, `created_at`, `updated_at`) VALUES
(8, 8, 'P001', 'Product1', 25000, 4, 100000, '2023-05-14 16:59:41', '2023-05-14 09:59:41'),
(9, 9, 'P001', 'Product1', 25000, 1, 25000, '2023-05-14 17:05:10', '2023-05-14 10:05:10');

--
-- Triggers `laporan_pembelian_details`
--
DELIMITER $$
CREATE TRIGGER `ubahStok2` AFTER INSERT ON `laporan_pembelian_details` FOR EACH ROW BEGIN
	UPDATE stoks SET stok = stok + NEW.banyak_barang
    WHERE kode_barang = NEW.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_pembelian_headers`
--

CREATE TABLE `laporan_pembelian_headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banyakProduk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan_pembelian_headers`
--

INSERT INTO `laporan_pembelian_headers` (`id`, `banyakProduk`, `created_at`, `updated_at`) VALUES
(8, 1, '2023-05-14 16:59:41', '2023-05-14 09:59:41'),
(9, 1, '2023-05-14 17:05:10', '2023-05-14 10:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_penjualan_details`
--

CREATE TABLE `laporan_penjualan_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `banyak_barang` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `keuntungan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan_penjualan_details`
--

INSERT INTO `laporan_penjualan_details` (`id`, `transaksi_id`, `kode_barang`, `nama_barang`, `harga_barang`, `banyak_barang`, `total_harga`, `keuntungan`, `created_at`, `updated_at`) VALUES
(1, 21, 'P001', 'Product1', 27000, 2, 54000, 0, '2023-05-13 15:04:42', '2023-05-13 08:04:42'),
(2, 23, 'P001', 'Product1', 27000, 2, 54000, 4000, '2023-05-13 15:11:23', '2023-05-13 08:11:23'),
(3, 24, 'P001', 'Product1', 27000, 5, 135000, 10000, '2023-05-13 15:12:02', '2023-05-13 08:12:02'),
(4, 25, 'P001', 'Product1', 27000, 2, 54000, 4000, '2023-05-13 15:15:31', '2023-05-13 08:15:31'),
(5, 26, 'P001', 'Product1', 27000, 2, 54000, 4000, '2023-05-14 05:49:07', '2023-05-13 22:49:07'),
(6, 27, 'P001', 'Product1', 27000, 2, 54000, 4000, '2023-05-14 06:02:56', '2023-05-13 23:02:56'),
(7, 28, 'P001', 'Product1', 27000, 2, 54000, 4000, '2023-05-14 06:03:36', '2023-05-13 23:03:36'),
(8, 29, 'P001', 'Product1', 27000, 2, 54000, 4000, '2023-05-14 06:04:41', '2023-05-13 23:04:41'),
(9, 30, 'P001', 'Product1', 27000, 2, 54000, 4000, '2023-05-14 06:06:45', '2023-05-13 23:06:45'),
(11, 32, 'P001', 'Product1', 27000, 2, 54000, 4000, '2023-05-14 06:11:03', '2023-05-13 23:11:03'),
(12, 33, 'P001', 'Product1', 27000, 2, 54000, 4000, '2023-05-14 06:13:42', '2023-05-13 23:13:42'),
(13, 34, 'P001', 'Product1', 27000, 2, 54000, 4000, '2023-05-14 06:14:04', '2023-05-13 23:14:04'),
(14, 35, 'P001', 'Product1', 27000, 2, 54000, 4000, '2023-05-14 06:18:00', '2023-05-13 23:18:00'),
(15, 36, 'P001', 'Product1', 27000, 2, 54000, 4000, '2023-05-14 06:18:12', '2023-05-13 23:18:12'),
(16, 37, 'P001', 'Product1', 27000, 2, 54000, 4000, '2023-05-14 06:52:49', '2023-05-13 23:52:49'),
(17, 38, 'P001', 'Product1', 27000, 1, 27000, 2000, '2023-05-14 06:57:44', '2023-05-13 23:57:44'),
(18, 39, 'P001', 'Product1', 27000, 1, 27000, 2000, '2023-05-14 07:00:12', '2023-05-14 00:00:12'),
(19, 40, 'P001', 'Product1', 27000, 1, 27000, 2000, '2023-05-14 07:02:32', '2023-05-14 00:02:32'),
(20, 41, 'P001', 'Product1', 27000, 1, 27000, 2000, '2023-05-14 07:04:34', '2023-05-14 00:04:34'),
(21, 42, 'P001', 'Product1', 27000, 1, 27000, 2000, '2023-05-14 07:15:38', '2023-05-14 00:15:38'),
(22, 43, 'P001', 'Product1', 27000, 1, 27000, 2000, '2023-05-14 12:06:33', '2023-05-14 05:06:33'),
(23, 44, 'P001', 'Product1', 27000, 1, 27000, 2000, '2023-05-14 12:06:55', '2023-05-14 05:06:55'),
(24, 45, 'P001', 'Product1', 27000, 2, 54000, 4000, '2023-05-14 14:55:47', '2023-05-14 07:55:48'),
(25, 46, 'P001', 'Product1', 27000, 2, 54000, 4000, '2023-05-14 14:57:57', '2023-05-14 07:57:57'),
(26, 47, 'P001', 'Product1', 27000, 1, 27000, 2000, '2023-05-14 15:05:51', '2023-05-14 08:05:51'),
(27, 48, 'P001', 'Product1', 27000, 1, 27000, 2000, '2023-05-14 15:06:06', '2023-05-14 08:06:06'),
(28, 49, 'P001', 'Product1', 27000, 1, 27000, 2000, '2023-05-14 17:01:21', '2023-05-14 10:01:21'),
(29, 50, 'P001', 'Product1', 27000, 1, 27000, 2000, '2023-05-14 17:03:02', '2023-05-14 10:03:02');

--
-- Triggers `laporan_penjualan_details`
--
DELIMITER $$
CREATE TRIGGER `ubahStok` AFTER INSERT ON `laporan_penjualan_details` FOR EACH ROW BEGIN
	UPDATE stoks SET stok = stok - NEW.banyak_barang
    WHERE kode_barang = NEW.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_penjualan_headers`
--

CREATE TABLE `laporan_penjualan_headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banyakProduk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan_penjualan_headers`
--

INSERT INTO `laporan_penjualan_headers` (`id`, `banyakProduk`, `created_at`, `updated_at`) VALUES
(21, 1, '2023-05-13 15:04:42', '2023-05-13 08:04:42'),
(22, 1, '2023-05-13 15:09:10', '2023-05-13 08:09:10'),
(23, 1, '2023-05-13 15:11:23', '2023-05-13 08:11:23'),
(24, 1, '2023-05-13 15:12:02', '2023-05-13 08:12:02'),
(25, 1, '2023-05-13 15:15:31', '2023-05-13 08:15:31'),
(26, 1, '2023-05-14 05:49:07', '2023-05-13 22:49:07'),
(27, 1, '2023-05-14 06:02:56', '2023-05-13 23:02:56'),
(28, 1, '2023-05-14 06:03:36', '2023-05-13 23:03:36'),
(29, 1, '2023-05-14 06:04:41', '2023-05-13 23:04:41'),
(30, 1, '2023-05-14 06:06:45', '2023-05-13 23:06:45'),
(31, 1, '2023-05-14 06:08:41', '2023-05-13 23:08:41'),
(32, 1, '2023-05-14 06:11:03', '2023-05-13 23:11:03'),
(33, 1, '2023-05-14 06:13:42', '2023-05-13 23:13:42'),
(34, 1, '2023-05-14 06:14:04', '2023-05-13 23:14:04'),
(35, 1, '2023-05-14 06:18:00', '2023-05-13 23:18:00'),
(36, 1, '2023-05-14 06:18:12', '2023-05-13 23:18:12'),
(37, 1, '2023-05-14 06:52:49', '2023-05-13 23:52:49'),
(38, 1, '2023-05-14 06:57:44', '2023-05-13 23:57:44'),
(39, 1, '2023-05-14 07:00:12', '2023-05-14 00:00:12'),
(40, 1, '2023-05-14 07:02:32', '2023-05-14 00:02:32'),
(41, 1, '2023-05-14 07:04:34', '2023-05-14 00:04:34'),
(42, 1, '2023-05-14 07:15:38', '2023-05-14 00:15:38'),
(43, 1, '2023-05-14 12:06:33', '2023-05-14 05:06:33'),
(44, 1, '2023-05-14 12:06:55', '2023-05-14 05:06:55'),
(45, 1, '2023-05-14 14:55:47', '2023-05-14 07:55:48'),
(46, 1, '2023-05-14 14:57:57', '2023-05-14 07:57:57'),
(47, 1, '2023-05-14 15:05:51', '2023-05-14 08:05:51'),
(48, 1, '2023-05-14 15:06:06', '2023-05-14 08:06:06'),
(49, 1, '2023-05-14 17:01:21', '2023-05-14 10:01:21'),
(50, 1, '2023-05-14 17:03:02', '2023-05-14 10:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_04_18_091433_create_kategoris_table', 1),
(4, '2023_04_20_051043_create_stoks_table', 1),
(8, '2023_05_07_041241_create_laporan_penjualan_headers_table', 2),
(10, '2023_05_10_143755_cart_belanja', 3),
(11, '2023_05_10_164032_laporan_pembelian_details', 3),
(12, '2023_05_10_164135_laporan_pembelian_headers', 3),
(14, '2023_05_07_041457_create_laporan_penjualan_details_table', 5),
(15, '2023_05_06_101828_create_carts_table', 6),
(19, '2023_05_13_153717_create_pendapatans_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pendapatans`
--

CREATE TABLE `pendapatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pendapatan` int(11) NOT NULL,
  `keuntungan` int(11) NOT NULL,
  `transaksi` int(11) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendapatans`
--

INSERT INTO `pendapatans` (`id`, `pendapatan`, `keuntungan`, `transaksi`, `waktu`, `created_at`, `updated_at`) VALUES
(3, 108000, 8000, 4, '2023-05-14', '2023-05-14 15:05:51', '2023-05-14 10:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stoks`
--

CREATE TABLE `stoks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `harga_jual` bigint(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `batas_stok` int(11) NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stoks`
--

INSERT INTO `stoks` (`id`, `kode_barang`, `image`, `nama_barang`, `harga_beli`, `harga_jual`, `stok`, `batas_stok`, `kategori_id`, `satuan`, `created_at`, `updated_at`) VALUES
(2, 'T002', NULL, 'test2', 10000, 27000, 11, 10, 3, 'pcs', '2023-04-23 00:31:52', '2023-05-14 01:27:03'),
(5, 'T001', NULL, 'test', 25000, 27000, 6, 10, 1, 'pcs', '2023-04-25 01:06:46', '2023-04-25 01:06:46'),
(6, 'P001', 'product-images/FHfIl2pLnmWOi22lWOqtQvddZbDj5Azp2aAjz2QX.jpg', 'Product1', 25000, 27000, 10, 5, 1, 'pack', '2023-04-27 19:24:50', '2023-05-07 00:33:14');

--
-- Triggers `stoks`
--
DELIMITER $$
CREATE TRIGGER `addStok` AFTER INSERT ON `stoks` FOR EACH ROW BEGIN
	UPDATE kategoris SET banyak_barang = banyak_barang + 1
    WHERE id=NEW.kategori_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `deleteStok` BEFORE DELETE ON `stoks` FOR EACH ROW BEGIN
	UPDATE kategoris SET banyak_barang = banyak_barang - 1
    WHERE id=OLD.kategori_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateStok1` BEFORE UPDATE ON `stoks` FOR EACH ROW BEGIN
	UPDATE kategoris SET banyak_barang = banyak_barang - 1
    WHERE id=OLD.kategori_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateStok2` AFTER UPDATE ON `stoks` FOR EACH ROW BEGIN
	UPDATE kategoris SET banyak_barang = banyak_barang + 1
    WHERE id=NEW.kategori_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Achmad Saepudin', 'admin', '$2y$10$sBh.b4MdIkdd128.FVGEKOW34uz3BjYSyuL.4.9I9FI4/KTmTG3SW', NULL, '2023-04-23 00:07:46', '2023-04-23 00:07:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_belanjas`
--
ALTER TABLE `cart_belanjas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategoris_kategori_unique` (`kategori`);

--
-- Indexes for table `laporan_pembelian_details`
--
ALTER TABLE `laporan_pembelian_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_pembelian_headers`
--
ALTER TABLE `laporan_pembelian_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_penjualan_details`
--
ALTER TABLE `laporan_penjualan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_penjualan_headers`
--
ALTER TABLE `laporan_penjualan_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendapatans`
--
ALTER TABLE `pendapatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `stoks`
--
ALTER TABLE `stoks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stoks_kode_barang_unique` (`kode_barang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_belanjas`
--
ALTER TABLE `cart_belanjas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `laporan_pembelian_details`
--
ALTER TABLE `laporan_pembelian_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `laporan_pembelian_headers`
--
ALTER TABLE `laporan_pembelian_headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `laporan_penjualan_details`
--
ALTER TABLE `laporan_penjualan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `laporan_penjualan_headers`
--
ALTER TABLE `laporan_penjualan_headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pendapatans`
--
ALTER TABLE `pendapatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stoks`
--
ALTER TABLE `stoks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
