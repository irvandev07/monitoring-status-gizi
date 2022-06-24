-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 02, 2020 at 09:52 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `myadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `makan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `infeksi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanitasi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asuh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `miskin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `alternatif`, `nama`, `makan`, `infeksi`, `sanitasi`, `asuh`, `pangan`, `miskin`, `pendidikan`, `created_at`, `updated_at`) VALUES
(1, 'A1', 'Nagrog', '3', '3', '3', '3', '5', '5', '5', '2020-06-03 03:25:32', '2020-06-03 03:25:32'),
(2, 'A2', 'Babakan', '4', '5', '5', '2', '3', '4', '5', '2020-05-20 02:53:52', '2020-05-20 02:53:52'),
(3, 'A3', 'Dampit', '4', '4', '5', '3', '3', '4', '4', '2020-05-20 02:54:16', '2020-05-20 02:54:16'),
(4, 'A4', 'Narawita', '5', '3', '4', '2', '4', '2', '4', '2020-05-20 02:54:47', '2020-05-20 02:54:47'),
(5, 'A5', 'Tanjung', '4', '4', '3', '5', '4', '2', '4', '2020-05-20 02:55:05', '2020-05-20 02:55:05'),
(6, 'A6', 'Margasih', '3', '4', '3', '4', '4', '2', '4', '2020-05-20 02:55:34', '2020-06-03 17:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `data_anak`
--

CREATE TABLE `data_anak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `posyandu` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelamin` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gizi` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_anak`
--

INSERT INTO `data_anak` (`id`, `posyandu`, `nama`, `kelamin`, `gizi`, `created_at`, `updated_at`) VALUES
(2, 'Nagrog', 'Silvi', 'Perempuan', 'Baik', '2020-06-01 04:55:07', '2020-06-01 04:55:07'),
(3, 'Babakan Peteuy', 'David', 'Laki-laki', 'Cukup', '2020-06-01 04:55:48', '2020-06-01 04:55:48'),
(7, 'Dampit', 'Silvi P', 'Perempuan', 'Baik', '2020-06-03 16:52:36', '2020-06-03 17:38:17'),
(15, 'Dampit', 'Contoh', 'Laki-laki', 'Baik', '2020-06-03 19:28:48', '2020-06-03 19:28:48'),
(16, 'Nagrog', 'Contoh', 'Perempuan', 'Baik', '2020-06-03 19:28:48', '2020-06-03 19:28:48'),
(17, 'Nagrog', 'Contoh', 'Perempuan', 'Baik', '2020-06-03 19:28:48', '2020-06-03 19:28:48'),
(18, 'babakan', 'Contoh', 'Laki-laki', 'Baik', '2020-06-03 19:28:48', '2020-06-03 19:28:48'),
(19, 'Narawita', 'Contoh', 'Laki-laki', 'Baik', '2020-06-03 19:28:48', '2020-06-03 19:28:48'),
(20, 'Nagrog', 'Contoh', 'Perempuan', 'Baik', '2020-06-03 19:28:48', '2020-06-03 19:28:48'),
(21, 'Magarsih', 'Contoh', 'Perempuan', 'Baik', '2020-06-03 19:28:48', '2020-06-03 19:28:48'),
(22, 'Magarsih', 'Contoh', 'Perempuan', 'Baik', '2020-06-03 19:28:48', '2020-06-03 19:28:48'),
(23, 'babakan', 'Contoh', 'Laki-laki', 'Baik', '2020-06-03 19:28:48', '2020-06-03 19:28:48'),
(24, 'babakan', 'Contoh', 'Laki-laki', 'Baik', '2020-06-03 19:28:48', '2020-06-03 19:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_akhir`
--

CREATE TABLE `hasil_akhir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rank` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Faktor` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PosSatu` double(15,14) NOT NULL,
  `PosDua` double(15,14) NOT NULL,
  `PosTiga` double(15,14) NOT NULL,
  `PosEmpat` double(15,14) NOT NULL,
  `PosLima` double(15,14) NOT NULL,
  `PosEnam` double(15,14) NOT NULL,
  `PosTujuh` double(15,14) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil_akhir`
--

INSERT INTO `hasil_akhir` (`id`, `rank`, `Faktor`, `PosSatu`, `PosDua`, `PosTiga`, `PosEmpat`, `PosLima`, `PosEnam`, `PosTujuh`, `created_at`, `updated_at`) VALUES
(2, '1', 'Makan', 0.10000000000000, 0.10000000000000, 0.10000000000000, 0.10000000000000, 0.10000000000000, 0.10000000000000, 0.10000000000000, '2020-07-31 02:32:23', '2020-07-31 02:32:23'),
(3, '3', 'Kemiskinan', 0.27483831928120, 0.78976789198720, 0.27483831928120, 0.64737271823400, 0.27483831928120, 0.78976789198720, 0.27483831928120, NULL, NULL),
(4, '5', 'Infeksi', 0.78656780918234, 0.28656780918234, 0.68656780918234, 0.98656780918234, 0.18656780918234, 0.48656780918234, 0.38656780918234, NULL, NULL),
(5, '4', 'Pendidikan', 0.18656780918234, 0.38656780918234, 0.48656780918234, 0.58656780918234, 0.68656780918234, 0.88656780918234, 0.98656780918234, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `laporan_bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_penimbangan` date NOT NULL,
  `petugas_lapangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_kader` int(11) NOT NULL,
  `jumlah_kader_aktif` int(11) NOT NULL,
  `s_5` int(11) NOT NULL,
  `s_11` int(11) NOT NULL,
  `s_23` int(11) NOT NULL,
  `s_59` int(11) NOT NULL,
  `s_total` int(11) NOT NULL,
  `k_5` int(11) NOT NULL,
  `k_11` int(11) NOT NULL,
  `k_23` int(11) NOT NULL,
  `k_59` int(11) NOT NULL,
  `k_total` int(11) NOT NULL,
  `n_5` int(11) NOT NULL,
  `n_11` int(11) NOT NULL,
  `n_23` int(11) NOT NULL,
  `n_59` int(11) NOT NULL,
  `n_total` int(11) NOT NULL,
  `t_5` int(11) NOT NULL,
  `t_11` int(11) NOT NULL,
  `t_23` int(11) NOT NULL,
  `t_59` int(11) NOT NULL,
  `t_total` int(11) NOT NULL,
  `o_5` int(11) NOT NULL,
  `o_11` int(11) NOT NULL,
  `o_23` int(11) NOT NULL,
  `o_59` int(11) NOT NULL,
  `o_total` int(11) NOT NULL,
  `b_5` int(11) NOT NULL,
  `b_11` int(11) NOT NULL,
  `b_23` int(11) NOT NULL,
  `b_59` int(11) NOT NULL,
  `b_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `laporan_bulan`, `tgl_penimbangan`, `petugas_lapangan`, `jumlah_kader`, `jumlah_kader_aktif`, `s_5`, `s_11`, `s_23`, `s_59`, `s_total`, `k_5`, `k_11`, `k_23`, `k_59`, `k_total`, `n_5`, `n_11`, `n_23`, `n_59`, `n_total`, `t_5`, `t_11`, `t_23`, `t_59`, `t_total`, `o_5`, `o_11`, `o_23`, `o_59`, `o_total`, `b_5`, `b_11`, `b_23`, `b_59`, `b_total`, `created_at`, `updated_at`) VALUES
(1, 'Juni', '2020-06-04', 'hgkg', 4, 2, 2, 2, 20, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 20, 2, 2, 2, 2, 2, 2, '2020-06-02 20:20:21', '2020-06-02 20:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_03_04_055633_create_users_table', 1),
(4, '2020_03_13_070816_create_alternatif_table', 1),
(5, '2020_03_14_102502_create_wilayah_posyandu', 1),
(6, '2020_03_14_104219_create_data_anak', 1),
(7, '2020_04_16_102624_create_data_faktor_table', 1),
(8, '2020_04_19_131456_create_table_setting', 2),
(9, '2020_03_13_042532_create_tambah_anak', 3),
(10, '2020_03_27_074809_create_users_table', 4),
(11, '2020_03_30_034215_create_bpb', 4),
(12, '2020_03_31_063032_create_pemeriksaan', 4),
(13, '2020_04_16_030927_create_laporan', 4),
(14, '2020_05_18_064323_create_table_prefensi', 5),
(15, '2020_05_18_064646_create_table_preferensi', 6),
(16, '2020_05_20_090830_create_table_bpb_data_anak', 7),
(17, '2020_07_03_152454_create_table_normalisasi', 8),
(18, '2020_07_31_083814_create_hasil_akhir', 9),
(19, '2020_07_31_092126_create_hasil_akhir', 10);

-- --------------------------------------------------------

--
-- Table structure for table `normalisasi`
--

CREATE TABLE `normalisasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `posyandu` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `makan` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `infeksi` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanitasi` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asuh` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangan` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `miskin` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preferensi`
--

CREATE TABLE `preferensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rangking` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternatif` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preferensi` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'c1', '5', NULL, NULL),
(2, 'c2', '2', NULL, NULL),
(3, 'c3', '2', NULL, NULL),
(4, 'c4', '3', NULL, NULL),
(5, 'c5', '4', NULL, NULL),
(6, 'c6', '4', NULL, NULL),
(7, 'c7', '5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Silvi Pratiwi', 'silviprtwi', '$2y$10$Jy.CsaSSCzPQmn/Og7bD8.ATBIa.QSZ0uoxGiTE7BxxfwEEeVykmm', 'aDjTszq2ixJMjvGNs7rNSfpSBCBAkathejTBfl9QDuIrAumlWeI66ZJkFQnh', '2020-04-19 02:07:41', '2020-04-19 02:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_posyandu`
--

CREATE TABLE `wilayah_posyandu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posyandu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wilayah_posyandu`
--

INSERT INTO `wilayah_posyandu` (`id`, `alternatif`, `posyandu`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'A1', 'Nagrog', 'Jl. Nagrog rt 06 rw 12', '2020-05-30 06:42:56', '2020-05-30 06:42:56'),
(2, 'A2', 'Babakan Peteuy', 'Jl. Peteuy rt 03 rw 01', '2020-05-30 06:45:36', '2020-05-30 06:45:36'),
(3, 'A3', 'Dampit', 'jl. Dampit', '2020-05-30 08:18:03', '2020-05-30 08:18:03'),
(4, 'A4', 'Narawita', 'Jl. Narawita', '2020-05-30 08:18:20', '2020-05-30 08:18:20'),
(5, 'A5', 'Tanjung', 'Jl. Khoirul Tanjung', '2020-05-30 08:18:39', '2020-05-30 08:18:39'),
(6, 'A6', 'Magarsih', 'Jl. Magarsih', '2020-05-30 08:19:02', '2020-05-30 08:19:02'),
(7, 'A7', 'Garuda', 'Jl Garuda', '2020-06-03 19:38:55', '2020-06-03 19:38:55'),
(8, 'A7', 'Pos', 'Jl.wlwl', '2020-07-31 01:47:04', '2020-07-31 01:47:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_anak`
--
ALTER TABLE `data_anak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_akhir`
--
ALTER TABLE `hasil_akhir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `normalisasi`
--
ALTER TABLE `normalisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_username_index` (`username`);

--
-- Indexes for table `preferensi`
--
ALTER TABLE `preferensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_key_unique` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `wilayah_posyandu`
--
ALTER TABLE `wilayah_posyandu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatif` (`alternatif`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_anak`
--
ALTER TABLE `data_anak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_akhir`
--
ALTER TABLE `hasil_akhir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `normalisasi`
--
ALTER TABLE `normalisasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preferensi`
--
ALTER TABLE `preferensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wilayah_posyandu`
--
ALTER TABLE `wilayah_posyandu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
