-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2020 at 01:43 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `cucian`
--

CREATE TABLE `cucian` (
  `id_cucian` int(11) NOT NULL,
  `jenis_cucian` varchar(45) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `nama_pelanggan` varchar(45) DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cucian`
--

INSERT INTO `cucian` (`id_cucian`, `jenis_cucian`, `berat`, `nama_pelanggan`, `id_pegawai`, `id_paket`) VALUES
(5, 'hh', 7, 'sinta', 1, 1),
(6, 'aa', 2, 'hh', 1, 1),
(7, 'baju', 3, 'sukma', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `active` set('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `email`, `password`, `active`) VALUES
(1, 'hanosi@undiksha.ac.id', '123', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(45) DEFAULT NULL,
  `hargaperkg` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `hargaperkg`) VALUES
(1, 'Expres', 5000),
(2, 'Komplit', 5000),
(4, 'Ekonomis', 9000),
(5, 'Expert', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`) VALUES
(1, 'hanosi'),
(3, 'edi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cucian`
--
ALTER TABLE `cucian`
  ADD PRIMARY KEY (`id_cucian`,`id_pegawai`,`id_paket`),
  ADD KEY `fk_cucian_pegawai_idx` (`id_pegawai`),
  ADD KEY `fk_cucian_paket1_idx` (`id_paket`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cucian`
--
ALTER TABLE `cucian`
  MODIFY `id_cucian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cucian`
--
ALTER TABLE `cucian`
  ADD CONSTRAINT `fk_cucian_paket1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cucian_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
