-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 04:22 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('3208272667675645', 'Yuli', 'yuli', '202cb962ac59075b964b07152d234b70', '083821257689'),
('3208312345677878', 'Anisa Tamami', 'nisa', '202cb962ac59075b964b07152d234b70', '087744278976'),
('3208909098987878', 'Fira Oktavia', 'pira', '202cb962ac59075b964b07152d234b70', '0877676768878'),
('3208989087678778', 'Agiesta Fitria', 'agies', '202cb962ac59075b964b07152d234b70', '087734216754');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(5) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('proses','selesai','ditolak') NOT NULL,
  `foto1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`, `foto1`) VALUES
(28, '2023-03-15', '3208272667675645', 'jugugugug', 'IMG-20210205-WA0001.jpg', 'proses', ''),
(30, '2023-03-15', '3208909098987878', 'tetetetetetetetett', 'IMG-20210316-WA0048.jpg', 'proses', ''),
(31, '2023-03-15', '3208909098987878', 'iugguedgegdgiegdiuegdugdiu', 'IMG-20210205-WA0035_1.jpg', 'proses', ''),
(32, '2023-03-15', '3208272667675645', 'hwdhwidhiw', 'IMG-20200419-WA0064.jpg', 'proses', ''),
(33, '2023-03-15', '3208272667675645', 'banjir di dusun puhun', 'banjir.jfif', 'proses', ''),
(34, '2023-03-16', '3208989087678778', 'terjadi kebakaran tadi pagi', 'kebakaran.jfif', 'selesai', ''),
(35, '2023-03-16', '3208989087678778', 'anisa', 'banjir_1.jfif', 'proses', ''),
(36, '2023-03-16', '3208989087678778', 'ada maling', 'banjir_2.jfif', 'proses', ''),
(37, '2023-03-16', '3208989087678778', 'nina', 'banjir_3.jfif', 'proses', ''),
(38, '2023-03-16', '3208909098987878', 'ada maling', 'banjir_4.jfif', 'proses', ''),
(39, '2023-03-16', '3208312345677878', '3 poto', 'kebakaran_1.jfif', 'proses', ''),
(40, '2023-03-16', '3208312345677878', 'vjyfyfff', 'kebakaran_2.jfif', 'proses', ''),
(41, '2023-03-16', '3208312345677878', 'geugwuegdgewgduew', 'kebakaran_3.jfif', 'proses', 'kebakaran_3.jfif'),
(42, '2023-03-16', '3208989087678778', 'bahaya', 'kebakaran_4.jfif', 'proses', ''),
(43, '2023-03-16', '3208989087678778', 'khfgioef3', 'longsor.jfif', 'proses', ''),
(44, '2023-03-16', '3208989087678778', 'bahaya', 'kebakaran_5.jfif', 'proses', ''),
(45, '2023-03-16', '3208909098987878', 'anisa', 'longsor_1.jfif', 'proses', ''),
(46, '2023-03-16', '3208909098987878', 'ada bahaya', 'banjir_5.jfif', 'proses', ''),
(47, '2023-03-16', '3208272667675645', 'hai hays', 'banjir_6.jfif', 'proses', 'banjir_6.jfif'),
(48, '2023-03-16', '3208989087678778', 'ada bbhayaa', 'longsor_2.jfif', 'proses', 'longsor_2.jfif'),
(49, '2023-03-16', '3208989087678778', 'hahahaha', 'kebakaran_6.jfif', 'proses', 'kebakaran_6.jfif'),
(50, '2023-03-16', '3208989087678778', 'dididiiiddi', 'kebakaran_7.jfif', 'proses', 'kebakaran_7.jfif'),
(51, '2023-03-16', '3208989087678778', 'hai gays', 'longsor_3.jfif', 'proses', 'longsor_3.jfif'),
(52, '2023-03-16', '3208909098987878', 'ada bahaaaaya', 'longsor_4.jfif', 'proses', 'longsor_4.jfif'),
(53, '2023-03-16', '3208989087678778', 'rfkjruirbj4r5f', 'kebakaran_9.jfif', 'proses', 'kebakaran_9.jfif'),
(54, '2023-03-16', '3208989087678778', 'jcgcgc', 'kebakaran_10.jfif', 'proses', 'kebakaran_10.jfif'),
(55, '2023-03-17', '3208989087678778', 'haiiiiii', 'desa_2.png', 'proses', 'favicon.png');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(5) NOT NULL,
  `nama_petugas` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp_petugas` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp_petugas`, `level`) VALUES
(3, 'Administrator', 'admin', '202cb962ac59075b964b07152d234b70', '08999', 'admin'),
(4, 'adii', 'petugas', '202cb962ac59075b964b07152d234b70', '08999', 'petugas'),
(5, 'Anisa Tamami', 'anisa', '202cb962ac59075b964b07152d234b70', '08776767899', 'petugas'),
(6, 'Nina Aprilia', 'nina', '202cb962ac59075b964b07152d234b70', '087712356789', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(5) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `isi_tanggapan` text NOT NULL,
  `id_petugas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `isi_tanggapan`, `id_petugas`) VALUES
(19, 34, '2023-03-16', 'akan segeran ditangani', 4),
(20, 34, '2023-03-16', 'sudah ditangani', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`,`id_petugas`),
  ADD KEY `tanggapan_ibfk_1` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
