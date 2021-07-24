-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2021 pada 09.14
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guppyci4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'superadmin', 'super admin.'),
(2, 'user', 'regular user.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 4),
(2, 5),
(2, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'fusuyufuyusu@yahoo.com', 4, '2021-07-04 20:23:34', 1),
(2, '::1', 'fusuyufuyusu@yahoo.com', 4, '2021-07-04 20:32:33', 1),
(3, '::1', 'fusuyufuyusu@yahoo.com', 4, '2021-07-04 20:33:34', 1),
(4, '::1', 'fusuyufuyusu@yahoo.com', 4, '2021-07-04 21:07:37', 1),
(5, '::1', 'fusuyufuyusu@yahoo.com', 4, '2021-07-04 21:07:55', 1),
(6, '::1', 'fusuyufuyusu@yahoo.com', 4, '2021-07-04 21:20:12', 1),
(7, '::1', 'user@gmail.com', 5, '2021-07-04 21:21:58', 1),
(8, '::1', 'user@gmail.com', 5, '2021-07-04 21:43:29', 1),
(9, '::1', 'fusuyufuyusu@yahoo.com', 4, '2021-07-05 01:30:37', 1),
(10, '::1', 'fusuyufuyusu@yahoo.com', 4, '2021-07-05 06:11:38', 1),
(11, '::1', 'user@user.com', NULL, '2021-07-05 06:20:17', 0),
(12, '::1', 'sayauser', NULL, '2021-07-05 06:20:26', 0),
(13, '::1', 'user@gmail.com', 5, '2021-07-05 06:20:48', 1),
(14, '::1', 'fusuyufuyusu@yahoo.com', 4, '2021-07-05 08:46:54', 1),
(15, '::1', 'user@gmail.com', 5, '2021-07-05 08:47:20', 1),
(16, '::1', 'user@gmail.com', 5, '2021-07-05 22:42:37', 1),
(17, '::1', 'user@gmail.com', 5, '2021-07-06 19:21:22', 1),
(18, '::1', 'fusuyufuyusu@yahoo.com', 4, '2021-07-07 00:32:26', 1),
(19, '::1', 'user@gmail.com', 5, '2021-07-07 00:38:56', 1),
(20, '::1', 'fusuyufuyusu@yahoo.com', 4, '2021-07-07 00:41:09', 1),
(21, '::1', 'user@gmail.com', 5, '2021-07-07 00:48:48', 1),
(22, '::1', 'fusuyufuyusu@yahoo.com', 4, '2021-07-07 00:49:17', 1),
(23, '::1', 'user@gmail.com', 5, '2021-07-07 01:44:05', 1),
(24, '::1', 'fusuyufuyusu@yahoo.com', 4, '2021-07-07 01:59:49', 1),
(25, '::1', 'sayausers', NULL, '2021-07-07 02:43:34', 0),
(26, '::1', 'user@gmail.com', 5, '2021-07-07 02:43:41', 1),
(27, '::1', 'fusuyufuyusu@yahoo.com', 4, '2021-07-07 02:44:27', 1),
(28, '::1', 'iniusers', NULL, '2021-07-10 12:41:41', 0),
(29, '::1', 'iniusers', NULL, '2021-07-10 12:42:07', 0),
(30, '::1', 'fusuyufuyusu@yahoo.com', 4, '2021-07-10 12:42:16', 1),
(31, '::1', 'fusuyufuyusu@yahoo.com', 4, '2021-07-21 07:35:46', 1),
(32, '::1', 'iniusers', NULL, '2021-07-21 08:03:30', 0),
(33, '::1', 'iniusers', NULL, '2021-07-21 08:03:40', 0),
(34, '::1', 'iniusers', NULL, '2021-07-21 08:03:55', 0),
(35, '::1', 'iniuser', NULL, '2021-07-21 08:04:05', 0),
(36, '::1', 'yusufprananda@mail.com', 6, '2021-07-21 08:04:43', 1),
(37, '::1', 'fusuyufuyusu@yahoo.com', 4, '2021-07-21 08:07:59', 1),
(38, '::1', 'fusuyufuyusu@yahoo.com', 4, '2021-07-21 08:19:47', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'shoplist', 'manage shoplist.'),
(2, 'profile', 'manage own profile info.'),
(3, 'keranjang', 'manage own keranjang.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `id_users` int(11) UNSIGNED NOT NULL,
  `kode` varchar(10) NOT NULL,
  `total` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `checkout`
--

INSERT INTO `checkout` (`id`, `id_users`, `kode`, `total`, `id_status`) VALUES
(35, 5, 'TC7YDS8wVb', 300000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikan`
--

CREATE TABLE `ikan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ikan`
--

INSERT INTO `ikan` (`id`, `nama`, `slug`, `harga`, `gambar`, `stok`, `deskripsi`) VALUES
(15, 'Albino Blue Grass', 'albino-blue-grass', 500000, '1626871172_912dcad5217622d141bd.jpeg', 100, 'Albino Blue Grass memiliki perpaduan warna cantik dengan warna mata merah yang diakibatkan gen albino yang dimilikinya, Serta warna dasar badan yang berwarna putih dengan corak bintik pada badan hingga ujung ekornya yang melebar membentuk kipas yang berwarna biru terang. Membuat Albino Blue Grass membawa mood yang tenang jika diletakkan di ruangan anda.'),
(21, 'Red Grass', 'red-grass', 250000, '1626871316_e114e32a9d030722c48d.jpeg', 50, 'Ikan yang akan menemanimu.'),
(22, 'Sky Red', 'sky-red', 250000, '1626871357_b74ac233950202d22677.jpeg', 100, 'Ikan yang akan menemanimu.'),
(23, 'Rainbow Grass', 'rainbow-grass', 300000, '1626871404_73b7d5c1bb89211f0899.jpeg', 20, 'Ikan yang akan menemanimu.'),
(24, 'Albino Full Platinum', 'albino-full-platinum', 500000, '1626871437_ddb3ff31bedd78748d0d.jpeg', 10, 'Ikan yang akan menemanimu.'),
(25, 'Blue Grass', 'blue-grass', 100000, '1626871468_1ed4c2090253f194f2e6.jpeg', 150, 'Ikan yang akan menemanimu.'),
(26, 'Black Moscov', 'black-moscov', 500000, '1626871512_7ba9d83067c25f36ddc5.jpeg', 20, 'Ikan yang akan menemanimu.'),
(27, 'Sky Blue', 'sky-blue', 400000, '1626871556_1d2c8bda1bc15600806d.jpeg', 50, 'Ikan yang akan menemanimu.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_users` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `id_ikan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL,
  `kode_checkout` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_users`, `id_ikan`, `jumlah`, `total`, `kode_checkout`) VALUES
(5, 17, 1, 350000, '9fXMB47ibq'),
(5, 19, 1, 250000, '9fXMB47ibq'),
(5, 17, 1, 350000, '9fXMB47ibq'),
(5, 19, 1, 250000, '9fXMB47ibq'),
(5, 17, 1, 350000, '9fXMB47ibq'),
(5, 17, 1, 350000, '9fXMB47ibq'),
(5, 19, 1, 250000, '9fXMB47ibq'),
(5, 17, 1, 350000, '9U2W1h3eXC'),
(5, 17, 1, 350000, '9WFdZeDMNg'),
(5, 15, 1, 500000, '4ft1VBqIwU'),
(5, 19, 2, 500000, '7Juvb9jNGe'),
(5, 19, 1, 250000, '7aSOlGMibE'),
(5, 15, 5, 2500000, 'UcDVdm4jua'),
(5, 18, 1, 300000, 'MjnXf3HShI'),
(5, 18, 1, 300000, 'TC7YDS8wVb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1625444681, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `nama`) VALUES
(1, 'Belum Bayar'),
(2, 'Sudah Bayar'),
(3, 'Dikirim'),
(4, 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `namauser` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nohp` varchar(13) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `namauser`, `alamat`, `nohp`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'fusuyufuyusu@yahoo.com', 'fusuyufuyusu', 'FF', 'Indonesia', '0813462571', '$2y$10$KHch6EOn6r.uoXbIM2OCieKRMc.IbmY1dMvR3o/vJXRNGlMOuzb32', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-07-04 20:23:26', '2021-07-04 20:23:26', NULL),
(5, 'user@gmail.com', 'sayausers', 'Muhammad Yusuf Prananda', 'Jl. SM. Aminuddin Gg. Rambai No.006', '082247803061', '$2y$10$..1MOpOFQWlqG/9aUkVngu5y8K22D3nm8zE6Tzt7M56R/ByDQg2XK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-07-04 21:21:48', '2021-07-04 21:21:48', NULL),
(6, 'yusufprananda@mail.com', 'yusufprananda', 'Muhammad Yusuf Prananda', 'Jl. SM. Aminuddin', '0802010203010', '$2y$10$I6wyIpBFaHj6sq/C6RMRceCyMD9L39yb9n7hXU4.R8t2bG3UzKfe2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-07-21 08:04:34', '2021-07-21 08:04:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_status` (`id_status`);

--
-- Indeks untuk tabel `ikan`
--
ALTER TABLE `ikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_ikan` (`id_ikan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `ikan`
--
ALTER TABLE `ikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `checkout_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
