-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 06:54 PM
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
-- Database: `sman1tewangsangalang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_admin`
--

INSERT INTO `tabel_admin` (`username`, `password`) VALUES
('kurniawan', 'kurniawan');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jadwal_mapel`
--

CREATE TABLE `tabel_jadwal_mapel` (
  `id_jadwal` int(3) NOT NULL,
  `hari` varchar(7) NOT NULL,
  `jam` varchar(15) NOT NULL,
  `id_mapel` int(3) NOT NULL,
  `id_kelas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_jadwal_mapel`
--

INSERT INTO `tabel_jadwal_mapel` (`id_jadwal`, `hari`, `jam`, `id_mapel`, `id_kelas`) VALUES
(1, 'Senin', '08:20-12:00', 15, 3),
(2, 'Selasa', '12.00-14.00', 1, 2),
(11, 'Rabu', '07:00-09:20', 15, 1),
(12, 'Kamis', '07:00-08:40', 22, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kelas`
--

CREATE TABLE `tabel_kelas` (
  `id_kelas` int(5) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jurusan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_kelas`
--

INSERT INTO `tabel_kelas` (`id_kelas`, `kelas`, `jurusan`) VALUES
(1, '10-1', 'IPA'),
(2, '10-2', 'IPA'),
(3, '11-1', 'Bahasa'),
(8, '12-9', 'IPS'),
(16, '12-5', 'IPA');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mapel`
--

CREATE TABLE `tabel_mapel` (
  `id_mapel` int(3) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL,
  `jumlah_jam` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_mapel`
--

INSERT INTO `tabel_mapel` (`id_mapel`, `nama_mapel`, `jumlah_jam`) VALUES
(1, 'Matematika', 15),
(15, 'IPA', 12),
(22, 'Bahasa', 13),
(23, 'PPKN', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tabel_jadwal_mapel`
--
ALTER TABLE `tabel_jadwal_mapel`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `fk_mapel` (`id_mapel`),
  ADD KEY `fk_kelas` (`id_kelas`);

--
-- Indexes for table `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tabel_mapel`
--
ALTER TABLE `tabel_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_jadwal_mapel`
--
ALTER TABLE `tabel_jadwal_mapel`
  MODIFY `id_jadwal` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  MODIFY `id_kelas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tabel_mapel`
--
ALTER TABLE `tabel_mapel`
  MODIFY `id_mapel` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_jadwal_mapel`
--
ALTER TABLE `tabel_jadwal_mapel`
  ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tabel_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `tabel_mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
