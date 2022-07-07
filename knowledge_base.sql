-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 04:07 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowledge_base`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(11) NOT NULL,
  `nilai_bobot` float DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `nilai_bobot`, `keterangan`) VALUES
(1, 0, 'Tidak Yakin'),
(2, 0.4, 'Sedikit Yakin'),
(3, 0.6, 'Cukup Yakin'),
(4, 0.8, 'Yakin'),
(5, 1, 'Sangat Yakin');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `nama_gejala` varchar(100) DEFAULT NULL,
  `id_bobot_pakar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`, `id_bobot_pakar`) VALUES
(1, 'Laptop sering hank (not responding)', 3),
(2, 'Temperatur kipas tidak baik', 3),
(3, 'Laptop mudah panas', 2),
(4, 'Laptop sering overheat (suhu Laptop melebihi dari batas normal)', 4),
(5, 'Suara kipas sangat berisik', 4),
(6, 'Tidak terasa ada angin pada pembuangan', 3),
(7, 'Laptop sering tiba-tiba mati ', 2),
(8, 'Kipas laptop tidak berputar', 2),
(9, 'Keyboard tidak berfungsi', 4),
(10, 'Ada kode-kode aneh', 4),
(11, 'Muncul kode error pada laptop', 4),
(12, 'Hardisk mengalami overheat (suhu Hardisk melebihi dari batas normal)', 3),
(13, 'Hardisk cepat panas', 3),
(14, 'Data sering tidak terbaca', 3),
(15, 'Blue Screen', 3),
(16, 'Laptop tidak dapat hidup sama sekali', 3),
(17, 'Laptop hanya bisa hidup sampai logo windows', 4),
(18, 'Kegagalan pada saat membuka program', 3),
(19, 'Sistem hanya menyala sementara', 3),
(20, 'Sering terjadi kegagalan saat booting', 4),
(21, 'Layar bergoyang', 2),
(22, 'Adanya Goomy (bercak putih pada layar)', 3),
(23, 'LCD bergaris', 4),
(24, 'LCD terdapat artifact (munculnya garis atau titik-titik warna-warni)', 4),
(25, 'LCD Blank', 2),
(26, 'Booting berhenti setelah melakukan POST', 2),
(27, 'Kerja booting sampai ke windows berjalan lambat', 3),
(28, 'Windows explorer tidak dapat Dijalankan', 3),
(29, 'Start menu tidak dapat dijalankan', 4),
(30, 'Prosedur Shut down tidak dapat Dijalankan', 4),
(31, 'Prosedur shutdown berhenti sebelum komputer benar- benar berhenti ', 3),
(32, 'Layar selalu diam', 3),
(33, 'Driver tidak terpasang', 2),
(34, 'Port USB longgar', 4),
(35, 'Port USB patah', 3),
(36, 'Jalur pada USB pada PCB putus', 3),
(37, 'Disable USB Selective', 4),
(38, 'Problem di steker charger', 4),
(39, 'Problem di charger laptop', 3),
(40, 'Masalah pada adapter charger', 3),
(41, 'Masalah pada sambungan kabel charger', 4),
(42, 'Masalah pada ujung konektor', 3),
(43, 'Masalah pada port charger', 4),
(44, 'Laptop keluar tanda silang pada gambar baterai', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

CREATE TABLE `kerusakan` (
  `id_kerusakan` int(11) NOT NULL,
  `jenis_kerusakan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`id_kerusakan`, `jenis_kerusakan`) VALUES
(1, 'Kerusakan Pada Fan'),
(2, 'Kerusakan Pada Harddisk'),
(3, 'Kerusakan Pada Processor'),
(4, 'Kerusakan Pada Layar'),
(5, 'Kerusakan Pada Sistem Operasi'),
(6, 'Kerusakan Pada USB'),
(7, 'Kerusakan Pada Charging');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_kerusakan` int(11) DEFAULT NULL,
  `nilai_cf` varchar(5) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `id_kerusakan`, `nilai_cf`, `id_user`) VALUES
(17, 1, '0.926', 1),
(18, 1, '0.926', 1),
(19, 1, '0.926', 1),
(20, 4, '0.544', 1),
(22, 1, '0.926', 1),
(24, 1, '0.702', 1),
(25, 1, '0.921', 1),
(26, 2, '0.800', 1),
(27, 1, '0.926', 1),
(28, 1, '0.926', 1),
(29, 7, '0.728', 1),
(36, 1, '0.891', 1),
(37, 2, '0.828', 2),
(38, 7, '0.902', 1),
(39, 1, '0.908', 1),
(40, 1, '0.800', 1),
(45, 1, '0.957', 1),
(46, 1, '0.957', 1),
(47, 1, '0.513', 1),
(48, 7, '0.48', 1),
(49, 1, '0.769', 1),
(50, 1, '0.895', 1),
(51, 1, '0.895', 1),
(52, 1, '0.24', 1),
(53, 1, '0.971', 4),
(54, 1, '0.604', 1);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_gejala`
--

CREATE TABLE `riwayat_gejala` (
  `id_riwayat_gejala` int(11) NOT NULL,
  `id_riwayat` int(11) DEFAULT NULL,
  `id_gejala` int(11) DEFAULT NULL,
  `id_bobot_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_gejala`
--

INSERT INTO `riwayat_gejala` (`id_riwayat_gejala`, `id_riwayat`, `id_gejala`, `id_bobot_user`) VALUES
(27, 17, 1, 4),
(28, 17, 3, 3),
(29, 17, 4, 3),
(31, 18, 1, 4),
(32, 18, 3, 3),
(33, 18, 4, 3),
(34, 18, 5, 4),
(35, 19, 1, 4),
(36, 19, 3, 3),
(37, 19, 4, 3),
(38, 19, 5, 4),
(39, 20, 21, 3),
(40, 20, 25, 5),
(41, 20, 33, 3),
(42, 20, 43, 3),
(47, 22, 1, 4),
(48, 22, 3, 3),
(49, 22, 4, 3),
(50, 22, 5, 4),
(51, 22, 44, 2),
(58, 24, 1, 4),
(59, 24, 3, 2),
(60, 24, 8, 4),
(61, 25, 1, 2),
(62, 25, 2, 2),
(63, 25, 3, 4),
(64, 25, 5, 5),
(65, 25, 12, 3),
(66, 25, 13, 2),
(67, 25, 15, 3),
(68, 26, 12, 3),
(69, 26, 13, 2),
(70, 26, 14, 3),
(71, 26, 15, 3),
(72, 26, 25, 4),
(73, 26, 26, 5),
(74, 27, 1, 4),
(75, 27, 3, 3),
(76, 27, 4, 3),
(77, 27, 5, 4),
(78, 28, 1, 4),
(79, 28, 3, 3),
(80, 28, 4, 3),
(81, 28, NULL, 4),
(82, 29, 44, 2),
(97, 36, 1, 4),
(98, 36, 2, 5),
(99, 36, 4, 3),
(100, 37, 14, 2),
(101, 37, 15, 3),
(102, 37, 16, 4),
(103, 37, 17, 2),
(104, 38, 33, 4),
(105, 38, 41, 4),
(106, 38, 42, 5),
(107, 38, 44, 2),
(108, 39, 1, 2),
(109, 39, 2, 4),
(110, 39, 4, 4),
(111, 39, 6, 3),
(112, 39, 11, NULL),
(113, 39, 12, NULL),
(114, 39, 13, NULL),
(115, 39, 14, NULL),
(116, 39, 15, NULL),
(117, 39, 16, NULL),
(118, 39, 17, NULL),
(119, 39, 18, NULL),
(120, 39, 19, NULL),
(121, 39, 20, NULL),
(122, 39, 21, NULL),
(123, 39, 22, NULL),
(124, 39, 23, NULL),
(125, 39, 24, NULL),
(126, 39, 25, NULL),
(127, 39, 26, NULL),
(128, 39, 27, NULL),
(129, 39, 28, NULL),
(130, 39, 29, NULL),
(131, 39, 30, NULL),
(132, 39, 31, NULL),
(133, 39, 32, NULL),
(134, 39, 33, NULL),
(135, 39, 34, NULL),
(136, 39, 35, NULL),
(137, 39, 36, NULL),
(138, 39, 37, NULL),
(139, 39, 38, NULL),
(140, 39, 39, NULL),
(141, 39, 40, NULL),
(142, 39, 41, NULL),
(143, 39, 42, NULL),
(144, 39, 43, NULL),
(145, 39, 44, NULL),
(146, 40, 2, 3),
(147, 40, 3, 5),
(148, 40, 4, 3),
(149, 40, 19, 4),
(150, 40, 28, 4),
(151, 45, 1, 3),
(152, 45, 2, 2),
(153, 45, 3, 4),
(154, 45, 4, 4),
(155, 45, 5, 4),
(156, 45, 11, 5),
(157, 45, 12, 5),
(158, 45, 39, 4),
(159, 45, 40, 4),
(160, 46, 1, 3),
(161, 46, 2, 2),
(162, 46, 3, 4),
(163, 46, 4, 4),
(164, 46, 5, 4),
(165, 46, 11, 5),
(166, 46, 12, 5),
(167, 46, 39, 4),
(168, 46, 40, 4),
(169, 47, 1, 2),
(170, 47, 2, 3),
(171, 47, 43, 3),
(172, 48, 43, 3),
(173, 49, 4, 4),
(174, 49, 6, 3),
(175, 49, 28, 3),
(176, 49, 29, 4),
(177, 50, 1, 3),
(178, 50, 3, 4),
(179, 50, 4, 3),
(180, 50, 5, 2),
(181, 50, 7, 4),
(182, 51, 1, 3),
(183, 51, 3, 4),
(184, 51, 4, 3),
(185, 51, 5, 2),
(186, 51, 7, 4),
(187, 52, 1, 2),
(188, 53, 1, 3),
(189, 53, 3, 3),
(190, 53, 4, 4),
(191, 53, 5, 3),
(192, 53, 6, 4),
(193, 53, 7, 5),
(194, 54, 1, 4),
(195, 54, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id_rule` int(11) NOT NULL,
  `id_gejala` int(11) DEFAULT NULL,
  `id_kerusakan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id_rule`, `id_gejala`, `id_kerusakan`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 2),
(11, 11, 2),
(12, 12, 2),
(13, 13, 2),
(14, 14, 2),
(15, 15, 2),
(16, 16, 2),
(17, 17, 2),
(18, 1, 3),
(19, 3, 3),
(20, 7, 3),
(21, 15, 3),
(22, 16, 3),
(23, 18, 3),
(24, 19, 3),
(25, 20, 3),
(26, 21, 4),
(27, 22, 4),
(28, 23, 4),
(29, 24, 4),
(30, 25, 4),
(31, 26, 5),
(32, 27, 5),
(33, 28, 5),
(34, 29, 5),
(35, 30, 5),
(36, 31, 5),
(37, 32, 5),
(38, 33, 6),
(39, 34, 6),
(40, 35, 6),
(41, 36, 6),
(42, 37, 6),
(43, 3, 7),
(44, 38, 7),
(45, 39, 7),
(46, 40, 7),
(47, 41, 7),
(48, 42, 7),
(49, 43, 7),
(50, 44, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `passwords` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `nama_user`, `email`, `passwords`, `role`) VALUES
(1, 'adityap', 'Aditya Pratama', 'adityap@gmail.com', '1234', 'admin'),
(2, 'dika', 'dika', 'dika@gmail.com', '1234', 'user'),
(4, 'astuti', 'astuti', 'astuti@gmail.com', '1234', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`),
  ADD KEY `id_bobot_pakar` (`id_bobot_pakar`);

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`id_kerusakan`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_kerusakan` (`id_kerusakan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `riwayat_gejala`
--
ALTER TABLE `riwayat_gejala`
  ADD PRIMARY KEY (`id_riwayat_gejala`),
  ADD KEY `id_riwayat` (`id_riwayat`),
  ADD KEY `id_gejala` (`id_gejala`),
  ADD KEY `id_bobot_user` (`id_bobot_user`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id_rule`),
  ADD KEY `id_kerusakan` (`id_kerusakan`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `kerusakan`
--
ALTER TABLE `kerusakan`
  MODIFY `id_kerusakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `riwayat_gejala`
--
ALTER TABLE `riwayat_gejala`
  MODIFY `id_riwayat_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gejala`
--
ALTER TABLE `gejala`
  ADD CONSTRAINT `gejala_ibfk_1` FOREIGN KEY (`id_bobot_pakar`) REFERENCES `bobot` (`id_bobot`);

--
-- Constraints for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_1` FOREIGN KEY (`id_kerusakan`) REFERENCES `kerusakan` (`id_kerusakan`),
  ADD CONSTRAINT `riwayat_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `riwayat_gejala`
--
ALTER TABLE `riwayat_gejala`
  ADD CONSTRAINT `riwayat_gejala_ibfk_1` FOREIGN KEY (`id_riwayat`) REFERENCES `riwayat` (`id_riwayat`),
  ADD CONSTRAINT `riwayat_gejala_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`),
  ADD CONSTRAINT `riwayat_gejala_ibfk_3` FOREIGN KEY (`id_bobot_user`) REFERENCES `bobot` (`id_bobot`);

--
-- Constraints for table `rules`
--
ALTER TABLE `rules`
  ADD CONSTRAINT `rules_ibfk_1` FOREIGN KEY (`id_kerusakan`) REFERENCES `kerusakan` (`id_kerusakan`),
  ADD CONSTRAINT `rules_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
