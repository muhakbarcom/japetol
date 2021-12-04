-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 04:13 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `japetol`
--

-- --------------------------------------------------------

--
-- Table structure for table `akbr_contoh`
--

CREATE TABLE `akbr_contoh` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akbr_contoh`
--

INSERT INTO `akbr_contoh` (`id`, `nama`, `alamat`, `email`) VALUES
(1, 'Muhammad Akbar', 'Sarijadi, Bandung', 'muhammad.akbar5999@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_detail_pemesanan` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_detail_pemesanan`, `id_pemesanan`, `id_produk`, `qty`, `total_harga`) VALUES
(12, 12, 11, 1, 50000),
(13, 12, 10, 1, 70000),
(14, 13, 10, 1, 70000),
(15, 14, 8, 5, 750000),
(16, 15, 11, 4, 200000),
(18, 17, 8, 1, 150000),
(19, 17, 7, 1, 230000),
(20, 17, 6, 1, 250000),
(21, 18, 16, 1, 140000),
(22, 19, 17, 1, 40000);

--
-- Triggers `detail_pemesanan`
--
DELIMITER $$
CREATE TRIGGER `stok` AFTER INSERT ON `detail_pemesanan` FOR EACH ROW BEGIN
UPDATE produk SET stok_produk = stok_produk - new.qty
WHERE id_produk = new.id_produk
;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_menu`
--

CREATE TABLE `frontend_menu` (
  `id_menu` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frontend_menu`
--

INSERT INTO `frontend_menu` (`id_menu`, `label`, `link`, `id`, `sort`) VALUES
(1, 'Home', 'frontend/index', 'Home', 0),
(2, 'Features', 'frontend/features', 'Features', 1),
(3, 'About', 'frontend/about', 'about', 2),
(4, 'Sign in', 'login', 'signin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'pembeli', 'Pembeli'),
(33, 'penjual', 'Penjual');

-- --------------------------------------------------------

--
-- Table structure for table `groups_menu`
--

CREATE TABLE `groups_menu` (
  `id_groups` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups_menu`
--

INSERT INTO `groups_menu` (`id_groups`, `id_menu`) VALUES
(1, 40),
(1, 8),
(1, 91),
(4, 91),
(1, 93),
(1, 94),
(1, 43),
(1, 44),
(1, 42),
(1, 3),
(2, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(1, 125),
(2, 125),
(7, 125),
(8, 125),
(17, 125),
(18, 125),
(24, 125),
(26, 125),
(28, 125),
(29, 125),
(1, 127),
(2, 127),
(33, 119),
(1, 92),
(2, 92),
(33, 92),
(33, 114),
(33, 122),
(1, 1),
(2, 1),
(33, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `kategori`) VALUES
(5, 'Pet Salon'),
(6, 'Pet Food'),
(7, 'Pet Accessories'),
(8, 'Pet Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `list_session_token`
--

CREATE TABLE `list_session_token` (
  `session_id` int(11) NOT NULL,
  `session_token` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `active_time` datetime NOT NULL,
  `expire_time` datetime NOT NULL,
  `is_login` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_session_token`
--

INSERT INTO `list_session_token` (`session_id`, `session_token`, `admin_id`, `active_time`, `expire_time`, `is_login`) VALUES
(12, 'mFu6GqJ9laWV3G9pwgch9pETdg', 1, '2021-01-07 12:35:04', '2021-01-07 12:50:04', 0),
(13, 'S7oAgkk63Xm8n2MGzXIdnJsXho', 1, '2021-01-07 12:41:35', '2021-01-07 12:56:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(18, '::1', 'admin@admin.com', 1638616517),
(19, '::1', 'admin@muhakbar.com', 1638616523);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `npm`, `nama`, `tgl_lahir`) VALUES
(1, 2193001, 'Alvi Yatul Wardah', '2000-12-09'),
(2, 2193002, 'Aryaputra Wicaksono', '2001-05-30'),
(3, 2193003, 'Charles Marpaung', '2000-10-19'),
(4, 2193004, 'Ester Cibro', '2001-04-07'),
(5, 2193005, 'Fajar Somantri', '2000-08-10'),
(6, 2193006, 'Genta Tabah Pengabdian', '2001-04-20'),
(7, 2193007, 'Gerald Rajagukguk', '2001-06-03'),
(8, 2193008, 'Grenius Natanael Sidabutar', '2001-12-31'),
(9, 2193009, 'Ilfah Rifany', '2001-06-02'),
(10, 2193010, 'Khaliza Diva Qintanada', '2001-09-07'),
(11, 2193011, 'Koestiyandi Prayoga', '2001-05-17'),
(12, 2193012, 'Mita Hasanah', '2000-07-19'),
(13, 2193013, 'Muhammad Akbar', '1999-09-05'),
(14, 2193014, 'Nazzilla Auliya Putri', '2000-08-11'),
(15, 2193015, 'Popy Geovani', '2001-04-30'),
(16, 2193016, 'Prita Fitria Waluyo', '2001-01-09'),
(17, 2193017, 'Savia Almira Salsabilla', '2001-02-14'),
(18, 2193018, 'Tegar Nova Silviana', '2001-11-08'),
(19, 2193019, 'Thifal Irbah Anan', '2000-07-04'),
(20, 2193020, 'Vinda Ayu Lestari', '2001-01-20'),
(21, 2193021, 'Zsa Zsa Sabilla', '2001-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 99,
  `level` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(125) NOT NULL,
  `label` varchar(25) NOT NULL,
  `link` varchar(125) NOT NULL,
  `id` varchar(25) NOT NULL DEFAULT '#',
  `id_menu_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `sort`, `level`, `parent_id`, `icon`, `label`, `link`, `id`, `id_menu_type`) VALUES
(1, 0, 1, 0, 'empty', 'MAIN NAVIGATION', '#', '#', 1),
(3, 1, 2, 1, 'fas fa-tachometer-alt', 'Dashboard', 'dashboard', '#', 1),
(4, 12, 2, 40, 'fas fa-table', 'CRUD Generator', 'crudbuilder', '1', 1),
(8, 11, 2, 40, 'fas fa-bars', 'Menu', 'cms/menu/side-menu', 'navMenu', 1),
(40, 9, 1, 0, 'empty', 'DEV', '#', '#', 1),
(42, 6, 2, 92, 'fas fa-users-cog', 'User', '#', '1', 1),
(43, 7, 3, 42, 'fas fa-angle-double-right', 'Users', 'users', '1', 1),
(44, 8, 3, 42, 'fas fa-angle-double-right', 'Groups', 'groups', '2', 1),
(92, 3, 1, 0, 'empty', 'MASTER DATA', '#', 'masterdata', 1),
(107, 10, 2, 40, 'fas fa-cog', 'Setting', 'setting', 'setting', 1),
(114, 4, 2, 92, 'fas fa-birthday-cake', 'Produk', 'produk', '#', 1),
(119, 2, 2, 1, 'fas fa-swatchbook', 'Kelola Pemesanan', 'pemesanan/admin', '#', 1),
(122, 5, 2, 92, 'fas fa-address-book', 'Kategori Produk', 'kategori_produk', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_type`
--

CREATE TABLE `menu_type` (
  `id_menu_type` int(11) NOT NULL,
  `type` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_type`
--

INSERT INTO `menu_type` (`id_menu_type`, `type`) VALUES
(1, 'Side menu');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `metode_pembayaran` enum('bayar ditempat','transfer bank') NOT NULL,
  `status_pembayaran` enum('pembayaran tertunda','dalam proses','selesai') NOT NULL,
  `bukti_transfer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pemesanan`, `metode_pembayaran`, `status_pembayaran`, `bukti_transfer`) VALUES
(11, 12, 'transfer bank', 'dalam proses', 'iko13.jpg'),
(12, 13, 'bayar ditempat', 'selesai', NULL),
(13, 14, 'transfer bank', 'selesai', 'iko14.jpg'),
(14, 15, 'bayar ditempat', 'selesai', NULL),
(16, 17, 'bayar ditempat', 'selesai', NULL),
(17, 18, 'bayar ditempat', 'dalam proses', NULL),
(18, 19, 'transfer bank', 'selesai', 'c39f5eba-2ec8-4c90-bd67-57152fd139c2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `status_pemesanan` enum('sedang diproses','selesai','belum diproses') NOT NULL DEFAULT 'belum diproses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `tanggal_pemesanan`, `total_pembayaran`, `id_pelanggan`, `status_pemesanan`) VALUES
(12, '2021-08-06', 120000, 47, 'belum diproses'),
(13, '2021-08-06', 70000, 47, 'selesai'),
(14, '2021-08-06', 750000, 47, 'selesai'),
(15, '2021-08-06', 200000, 47, 'selesai'),
(17, '2021-08-06', 630000, 47, 'selesai'),
(18, '2021-12-04', 140000, 46, 'belum diproses'),
(19, '2021-12-04', 40000, 50, 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `gambar_produk` varchar(50) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `stok_produk`, `gambar_produk`, `kategori_id`) VALUES
(14, 'Whiskas', 40000, 22, 'neko21.jpg', 6),
(15, 'Kalung', 140000, 22, 'neko22.jpg', 6),
(16, 'Whiskas', 140000, 21, 'neko23.jpg', 5),
(17, 'Whiskas', 40000, 21, 'neko24.jpg', 7),
(18, 'Kalung', 140000, 22, 'neko25.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nilai` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `kode`, `nama`, `nilai`) VALUES
(1, 'neko2.jpg', 'Jasa Petshop Online', 'www.japetol.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(254) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `image` varchar(128) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `first_name`, `last_name`, `password`, `active`, `image`) VALUES
(1, '', 'admin@japetol.com', 'admin', 'admin', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', 1, 'neko2.jpg'),
(46, 'member@muhakbar.com', 'pembeli@japetol.com', 'pembeli', '01', '$2y$08$I8//I82woWY5EUsaK5RV/.m28pLCMxwpg9nPEgijrh4rLSi37BEeu', 1, 'default.jpg'),
(47, 'bilapelanggan@gmail.com', 'penjual@japetol.com', 'Penjual', '01', '$2y$08$xYzNIounINGCLfSR/mE6TuO8KKImn77cLEivAHvrRR8Mf2oEPqb0K', 1, 'default.jpg'),
(48, 'akbar@akar.com', 'akbar@akar.com', 'akbar', 'akbar', '$2y$08$KaQM61/inegy7ojYNa9oJeHcZVTuuErBMkQQ.udYukWc0Poxyycoi', 1, 'default.jpg'),
(49, 'bebas@gmail.com', 'bebas@gmail.com', 'bebas', 'bebas', '$2y$08$Jt2Yl98vgCFr.N7d8raSru/MIZEdU4y/KQAbK7Dxfs/kT9FhOsfRq', 1, 'default.jpg'),
(50, 'genta@gmail.com', 'genta@gmail.com', 'genta', 'immanuek', '$2y$08$0wzILSpVUO1FB8f4pUsJiustKzjIDJrkqSfahrnCFxIbNR3L/.kbK', 1, 'default.jpg'),
(51, 'bagas@gmail.com', 'bagas@gmail.com', 'bagas', 'nih', '$2y$08$iJrnssFkti2BGinl57C.OOkEuCzqz64xrE9w/cSlKNzmjpZ9KckGu', 1, 'default.jpg'),
(52, 'ari@gmail.com', 'ari@gmail.com', 'ari', 'wan', '$2y$08$EvFWW1oSa5Ikeo9OBEPOuuzf/0f6WSBnarm.9GKVS1uBLWf17JjfG', 1, 'default.jpg'),
(53, 'penjual2@japetol.com', 'penjual2@japetol.com', 'penjual', '02', '$2y$08$VYtbVjORC/ku.7516EFCBuPnDhZlzzUX2tn8MTGVp6DcUCHO3Kp/S', 1, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(125, 1, 1),
(126, 46, 2),
(127, 47, 33),
(128, 48, 2),
(129, 49, 2),
(130, 50, 2),
(131, 51, 2),
(132, 52, 33),
(133, 53, 33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akbr_contoh`
--
ALTER TABLE `akbr_contoh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detail_pemesanan`);

--
-- Indexes for table `frontend_menu`
--
ALTER TABLE `frontend_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `list_session_token`
--
ALTER TABLE `list_session_token`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `FK__list_admin` (`admin_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `npm` (`npm`) USING BTREE;

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id_menu_type`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akbr_contoh`
--
ALTER TABLE `akbr_contoh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_detail_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `frontend_menu`
--
ALTER TABLE `frontend_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `list_session_token`
--
ALTER TABLE `list_session_token`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id_menu_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
