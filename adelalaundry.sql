-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 09:47 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adelalaundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis`
--

CREATE TABLE `tbl_jenis` (
  `id_jenis_laundry` int(11) NOT NULL,
  `jenis_laundryan` varchar(255) NOT NULL,
  `harga` decimal(32,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_jenis`
--

INSERT INTO `tbl_jenis` (`id_jenis_laundry`, `jenis_laundryan`, `harga`) VALUES
(1, 'Cuci Mamel', '3000'),
(2, 'Cuci Kering', '4500'),
(3, 'Cuci Kering + Setrika', '5500'),
(4, 'Setrika', '5000'),
(5, 'Boneka', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`id_log`, `id_user`, `tanggal`, `action`) VALUES
(4, 2, '2022-03-03', 'Pesanan dengan No Order : 10 Telah diantarkan ke rumah pemesan.'),
(5, 2, '2022-03-03', 'Pesanan dengan No Order : 10 Telah diantarkan ke rumah pemesan.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(255) NOT NULL,
  `kode_promo` varchar(255) NOT NULL,
  `diskon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id_member`, `nama_member`, `kode_promo`, `diskon`) VALUES
(1, 'Budi', '1234', '2500');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `nama_pengorder` varchar(255) NOT NULL,
  `jenis_laudry` int(11) NOT NULL,
  `harga` decimal(32,0) NOT NULL,
  `alamat` longtext NOT NULL,
  `ongkir` decimal(32,0) NOT NULL,
  `statuss` int(11) NOT NULL,
  `kode_promo` varchar(255) DEFAULT NULL,
  `jumlah` decimal(32,0) NOT NULL,
  `status_order` int(11) NOT NULL,
  `no_wa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `nama_pengorder`, `jenis_laudry`, `harga`, `alamat`, `ongkir`, `statuss`, `kode_promo`, `jumlah`, `status_order`, `no_wa`) VALUES
(9, 'Budi', 4, '5000', 'weqweqweq', '2000', 1, '', '2', 0, '213412412'),
(10, 'anjay', 2, '4500', '1', '0', 1, '', '5', 1, '132131');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penghasilan`
--

CREATE TABLE `tbl_penghasilan` (
  `id_penghasilan` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` decimal(32,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_penghasilan`
--

INSERT INTO `tbl_penghasilan` (`id_penghasilan`, `id_order`, `tanggal`, `jumlah`) VALUES
(1, NULL, '2022-01-04', '3000'),
(2, NULL, '2022-01-04', '13500'),
(3, 9, '2022-01-05', '12000'),
(4, 10, '2022-01-05', '22500');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pasword` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_wa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `pasword`, `level`, `nama`, `no_wa`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'Admin', '0908908'),
(2, 'kurir', '81dc9bdb52d04dc20036dbd8313ed055', 2, 'Budi', '789789321729817');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  ADD PRIMARY KEY (`id_jenis_laundry`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk_id_jenis` (`jenis_laudry`);

--
-- Indexes for table `tbl_penghasilan`
--
ALTER TABLE `tbl_penghasilan`
  ADD PRIMARY KEY (`id_penghasilan`),
  ADD KEY `fk_order` (`id_order`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  MODIFY `id_jenis_laundry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_penghasilan`
--
ALTER TABLE `tbl_penghasilan`
  MODIFY `id_penghasilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `fk_id_jenis` FOREIGN KEY (`jenis_laudry`) REFERENCES `tbl_jenis` (`id_jenis_laundry`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_penghasilan`
--
ALTER TABLE `tbl_penghasilan`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`id_order`) REFERENCES `tbl_order` (`id_order`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
