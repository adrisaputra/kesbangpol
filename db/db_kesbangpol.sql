-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.19-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- membuang struktur untuk table db_kesbangpol.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_kesbangpol.failed_jobs: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.izin_penelitian_tbl
CREATE TABLE IF NOT EXISTS `izin_penelitian_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL DEFAULT '0',
  `surat_perguruan_tinggi` varchar(300) DEFAULT NULL,
  `proposal_penelitian` varchar(300) DEFAULT NULL,
  `ktp_peneliti` varchar(300) DEFAULT NULL,
  `izin_penelitian` varchar(300) DEFAULT NULL,
  `surat_pernyataan` varchar(300) DEFAULT NULL,
  `dokumen_rekomendasi` varchar(300) DEFAULT NULL,
  `nama` varchar(300) DEFAULT NULL,
  `tempat` varchar(300) DEFAULT NULL,
  `judul` varchar(300) DEFAULT NULL,
  `lokasi` varchar(300) DEFAULT NULL,
  `waktu_kegiatan` varchar(300) DEFAULT NULL,
  `bidang` varchar(300) DEFAULT NULL,
  `status_kegiatan` varchar(300) DEFAULT NULL,
  `menimbang` text DEFAULT NULL,
  `perbaikan` varchar(300) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_kesbangpol.izin_penelitian_tbl: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `izin_penelitian_tbl` DISABLE KEYS */;
INSERT INTO `izin_penelitian_tbl` (`id`, `kode`, `surat_perguruan_tinggi`, `proposal_penelitian`, `ktp_peneliti`, `izin_penelitian`, `surat_pernyataan`, `dokumen_rekomendasi`, `nama`, `tempat`, `judul`, `lokasi`, `waktu_kegiatan`, `bidang`, `status_kegiatan`, `menimbang`, `perbaikan`, `tanggal`, `waktu`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'IP-20210518022743', '1621305057.pdf', '1621305169.pdf', '1621305177.pdf', '1621305186.pdf', '1621305126.pdf', '1621307654.pdf', 'IYA RAWIA', 'Dusun Nikoloi Desa Dete Kec. Tomia Timur Kab. Wakatobi', 'DATA RINGKASAN BELANJA MENURUT URUSAN PEMERINTAH DAERAH DAN ORGANISASI KOTA KENDARI TAHUN 2005-2018', 'BPKAD', 'Januari 2020  s/d  Februari  2020', 'Data Ringkasan Belanja', 'Baru ', 'xxx', 'ass', '2021-05-18', '02:27:43', 3, 2, '2021-05-18 02:27:43', '2021-05-18 12:01:32'),
	(2, 'IP-20210518122504', '1621342360.pdf', '1621342367.pdf', '1621342379.pdf', '1621342386.pdf', '1621342393.pdf', NULL, 'ADRI SAPUTRA IBRAHIM', 'KENDARI', 'IT', 'KOMINFO', 'JANUARI S/D MARET 2021', 'IT', 'AKTIF', 'dddd', NULL, '2021-05-18', '12:25:04', 3, 2, '2021-05-18 12:25:04', '2021-05-18 12:53:55');
/*!40000 ALTER TABLE `izin_penelitian_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_kesbangpol.migrations: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
	(6, '2021_05_03_224041_create_sessions_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_kesbangpol.password_resets: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_kesbangpol.personal_access_tokens: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_kesbangpol.sessions: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('EyhsUSETGGreCHkBDIiJRee9EfM8RJ4VxC7Dbg5Y', 6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.62', 'YTo2OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Qva2VzYmFuZ3BvbC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiV0E3UnFPRmlSdEdRbEwwOUoyUVk1b0VBUHZRb3NNMEpBeDRMQ1h2bCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJG0xUzNsTmM5L3dTSDZyMUQzQ0cvb3VYM0NzVzdDVDgxOG14M2U2Nkd1amZzVXFFdGdGUG5TIjt9', 1621385101),
	('HEQvsNYWVQ0qhFetRlIpLEmzF0jNgmAPGzF0DzZX', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMjI1bDQ3NkYxa1l1NktvSjNmb0YxZDB1bmc2ZmoxSFRoeDlWamI0ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9sb2NhbGhvc3Qva2VzYmFuZ3BvbC9zdGF0dXNfaXppbl9wZW5lbGl0aWFuX3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkRnBHSTJ2VXlGeWJCU1Q0cDh4dE9HT3RDTERwTXdSMllyeHhoVVdNMDl4T0xJT3dCalVhclMiO30=', 1621381612),
	('s7Wjzam6sFE2AyEyCvq7qY9fRBcbFCkCtnOwWxoo', 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo2OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjY6Imh0dHA6Ly9sb2NhbGhvc3Qva2VzYmFuZ3BvbC9pemluX3BlbmVsaXRpYW5fZGlfdmVyaWZpa2FzaS9kZXRhaWwvMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiIyZFZ0TldjanZIM3FOUzY4aFdMZHBGOWZrTTFjSkJJWmRRZ3luMVFKIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkSEJHMU5tUFRBU1o4YkN0b1JSR3Q3LjBDRWg2RmIvVk5KRmo4R0RMb2lqaFlTQ0x4VDJhZkMiO30=', 1621385113);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.skk_ormas_tbl
CREATE TABLE IF NOT EXISTS `skk_ormas_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL DEFAULT '0',
  `anggaran_dasar` varchar(300) DEFAULT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `bendera` varchar(300) DEFAULT NULL,
  `program_kerja` varchar(300) DEFAULT NULL,
  `domisili` varchar(300) DEFAULT NULL,
  `kepemilikan` varchar(300) DEFAULT NULL,
  `foto_kantor` varchar(300) DEFAULT NULL,
  `susunan_pengurus` varchar(300) DEFAULT NULL,
  `biodata_ketua` varchar(300) DEFAULT NULL,
  `foto_ketua` varchar(300) DEFAULT NULL,
  `ktp_ketua` varchar(300) DEFAULT NULL,
  `biodata_sekretaris` varchar(300) DEFAULT NULL,
  `foto_sekretaris` varchar(300) DEFAULT NULL,
  `ktp_sekretaris` varchar(300) DEFAULT NULL,
  `biodata_bendahara` varchar(300) DEFAULT NULL,
  `foto_bendahara` varchar(300) DEFAULT NULL,
  `ktp_bendahara` varchar(300) DEFAULT NULL,
  `formulir` varchar(300) DEFAULT NULL,
  `rekomendasi` varchar(300) DEFAULT NULL,
  `surat_pernyataan_permendagri` varchar(300) DEFAULT NULL,
  `surat_pernyataan_kesediaan` varchar(300) DEFAULT NULL,
  `skt` varchar(300) DEFAULT NULL,
  `dokumen_rekomendasi` varchar(300) DEFAULT NULL,
  `perbaikan` varchar(300) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_kesbangpol.skk_ormas_tbl: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `skk_ormas_tbl` DISABLE KEYS */;
INSERT INTO `skk_ormas_tbl` (`id`, `kode`, `anggaran_dasar`, `logo`, `bendera`, `program_kerja`, `domisili`, `kepemilikan`, `foto_kantor`, `susunan_pengurus`, `biodata_ketua`, `foto_ketua`, `ktp_ketua`, `biodata_sekretaris`, `foto_sekretaris`, `ktp_sekretaris`, `biodata_bendahara`, `foto_bendahara`, `ktp_bendahara`, `formulir`, `rekomendasi`, `surat_pernyataan_permendagri`, `surat_pernyataan_kesediaan`, `skt`, `dokumen_rekomendasi`, `perbaikan`, `tanggal`, `waktu`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'SKKO-20210518023406', '1621308143.pdf', '1621308149.pdf', '1621308155.pdf', '1621308162.pdf', '1621308168.pdf', '1621308174.pdf', '1621308180.pdf', '1621308187.pdf', '1621308193.pdf', '1621308201.pdf', '1621308207.pdf', '1621308255.pdf', '1621308262.pdf', '1621308269.pdf', '1621308276.pdf', '1621308283.pdf', '1621308289.pdf', '1621308476.pdf', '1621320305.pdf', '1621308492.pdf', '1621320288.pdf', '1621308726.pdf', '1621323675.pdf', 'data belum sesuai', '2021-05-18', '02:34:06', 2, 2, '2021-05-18 02:34:06', '2021-05-19 00:36:17');
/*!40000 ALTER TABLE `skk_ormas_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.skt_ormas_tbl
CREATE TABLE IF NOT EXISTS `skt_ormas_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL DEFAULT '0',
  `anggaran_dasar` varchar(300) DEFAULT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `bendera` varchar(300) DEFAULT NULL,
  `program_kerja` varchar(300) DEFAULT NULL,
  `domisili` varchar(300) DEFAULT NULL,
  `kepemilikan` varchar(300) DEFAULT NULL,
  `foto_kantor` varchar(300) DEFAULT NULL,
  `susunan_pengurus` varchar(300) DEFAULT NULL,
  `biodata_ketua` varchar(300) DEFAULT NULL,
  `foto_ketua` varchar(300) DEFAULT NULL,
  `ktp_ketua` varchar(300) DEFAULT NULL,
  `biodata_sekretaris` varchar(300) DEFAULT NULL,
  `foto_sekretaris` varchar(300) DEFAULT NULL,
  `ktp_sekretaris` varchar(300) DEFAULT NULL,
  `biodata_bendahara` varchar(300) DEFAULT NULL,
  `foto_bendahara` varchar(300) DEFAULT NULL,
  `ktp_bendahara` varchar(300) DEFAULT NULL,
  `formulir` varchar(300) DEFAULT NULL,
  `rekomendasi` varchar(300) DEFAULT NULL,
  `surat_pernyataan_permendagri` varchar(300) DEFAULT NULL,
  `surat_pernyataan_kesediaan` varchar(300) DEFAULT NULL,
  `dokumen_rekomendasi` varchar(300) DEFAULT NULL,
  `perbaikan` varchar(300) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_kesbangpol.skt_ormas_tbl: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `skt_ormas_tbl` DISABLE KEYS */;
INSERT INTO `skt_ormas_tbl` (`id`, `kode`, `anggaran_dasar`, `logo`, `bendera`, `program_kerja`, `domisili`, `kepemilikan`, `foto_kantor`, `susunan_pengurus`, `biodata_ketua`, `foto_ketua`, `ktp_ketua`, `biodata_sekretaris`, `foto_sekretaris`, `ktp_sekretaris`, `biodata_bendahara`, `foto_bendahara`, `ktp_bendahara`, `formulir`, `rekomendasi`, `surat_pernyataan_permendagri`, `surat_pernyataan_kesediaan`, `dokumen_rekomendasi`, `perbaikan`, `tanggal`, `waktu`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'SKTO-20210518070837', '1621322502.pdf', '1621322511.pdf', NULL, '1621322517.pdf', '1621322524.pdf', '1621322530.pdf', '1621322537.pdf', '1621322544.pdf', '1621322551.pdf', '1621322558.pdf', '1621322565.pdf', '1621322573.pdf', '1621322581.pdf', '1621322588.pdf', '1621322598.pdf', '1621322608.pdf', '1621322617.pdf', '1621322625.pdf', NULL, '1621322632.pdf', '1621324387.pdf', '1621325014.pdf', 'sasa', '2021-05-18', '07:08:37', 2, 2, '2021-05-18 07:08:37', '2021-05-19 00:13:19');
/*!40000 ALTER TABLE `skt_ormas_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_kesbangpol.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_ktp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_kesbangpol.users: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `nik`, `alamat`, `no_hp`, `foto_ktp`, `group`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'administrator', 'administrator@gmail.com', NULL, '$2y$10$.Pi9v0UKQ8NtsYWGT58iI.EohUgC8mR0B9uSn5VNxLOmYK6.y2oqO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-05-03 22:48:34', '2021-05-03 22:48:34'),
	(2, 'adrisaputra', 'adri.saputra.ibrahim@gmail.com', NULL, '$2y$10$FpGI2vUyFybBST4p8xtOGOtCLDpMwR2YrxxhUWM09xOLIOwBjUarS', NULL, NULL, NULL, '7471091610910001', 'Jl. Pemuda', NULL, '1620145640.jpeg', 7, 1, '2021-05-04 16:27:20', '2021-05-04 16:27:20'),
	(3, 'staff', 'staff@gmail.com', NULL, '$2y$10$HBG1NmPTASZ8bCtoRRGt7.0CEh6Fb/VNJFj8GDLoijhYSCLxT2afC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2021-05-07 08:36:06', '2021-05-07 08:36:06'),
	(4, 'kasubid', 'kasubid@gmail.com', NULL, '$2y$10$rGCt6t7N1Oy1EuUnXbS8c.nPin4IdelP7QbMV6McatpZVk2BCbNlu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, '2021-05-07 08:37:13', '2021-05-07 08:37:13'),
	(5, 'kabid', 'kabid@gmail.com', NULL, '$2y$10$B9eHYezWlYVE2g0pihHheuZeb6E60iwK4T.8nVug40/CTTjWCjntS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, '2021-05-07 08:37:55', '2021-05-07 08:37:55'),
	(6, 'kepala_badan', 'kepala_badan@gmail.com', NULL, '$2y$10$m1S3lNc9/wSH6r1D3CG/ouX3CsW7CT818mx3e66GujfsUqEtgFPnS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1, '2021-05-07 08:51:23', '2021-05-07 08:51:23'),
	(7, 'sekretaris', 'sekretaris@gmail.com', NULL, '$2y$10$t6BdtPqYsf1knQfrH3Cp4.ASENk2KzRGK.PJ6SVxou3XRUdWG22yC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '2021-05-18 23:12:48', '2021-05-18 23:12:48');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
