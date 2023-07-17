-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 16, 2023 at 08:24 AM
-- Server version: 8.0.33-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Yazid_19630289`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int NOT NULL,
  `username` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `password` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `hak_akses` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `username`, `password`, `hak_akses`, `created_at`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', '1', '2023-07-14 03:50:29'),
(2, 'admin2', '0192023a7bbd73250516f069df18b500', '2', '2023-07-14 04:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_narkotika`
--

CREATE TABLE `tb_narkotika` (
  `id_narkotika` int NOT NULL,
  `nama_narkotika` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_narkotika`
--

INSERT INTO `tb_narkotika` (`id_narkotika`, `nama_narkotika`, `foto`, `keterangan`, `created_at`) VALUES
(1, 'Ganja', 'ganja.jpg', 'Narkotika Yang Sangat Berbahaya dan sering di salahgunakan untuk hal yang tidak baik, Dan harus di berantas secepeat nya.', '2023-07-15 06:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int NOT NULL,
  `id_user` int NOT NULL,
  `id_narkotika` int NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int NOT NULL,
  `id_user` int NOT NULL,
  `foto_petugas` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int NOT NULL,
  `nik_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `nama_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `lahir_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `tgllahir_user` date DEFAULT NULL,
  `jekel_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `alamat_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `desa_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `kecamatan_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `kabupaten_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `rt_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `rw_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `agama_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `kawin_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `pekerjaan_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `ktp_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nik_user`, `nama_user`, `lahir_user`, `tgllahir_user`, `jekel_user`, `alamat_user`, `desa_user`, `kecamatan_user`, `kabupaten_user`, `rt_user`, `rw_user`, `agama_user`, `kawin_user`, `pekerjaan_user`, `ktp_user`, `slug`, `created_at`) VALUES
(7, '3525011711086058', 'Widya Ilham', 'banjarbaru', '2023-07-15', 'Laki-laki', 'Jl Batu Malang', 'Batu', 'landasan ulin', 'Malang', '3', '2', 'Islam', 'menikah', 'Programer', '3525011711086058_widya-ilham.pdf', '3525011711086058_widya-ilham', '2023-07-15 05:02:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tb_narkotika`
--
ALTER TABLE `tb_narkotika`
  ADD PRIMARY KEY (`id_narkotika`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_narkotika`
--
ALTER TABLE `tb_narkotika`
  MODIFY `id_narkotika` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
