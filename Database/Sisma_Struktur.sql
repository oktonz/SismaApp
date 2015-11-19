-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2015 at 05:50 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisma`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokumen`
--

CREATE TABLE IF NOT EXISTS `tbl_dokumen` (
  `no_dok` varchar(100) NOT NULL,
  `nm_dok` varchar(100) NOT NULL,
  `asal` varchar(50) DEFAULT NULL,
  `penerima` varchar(50) DEFAULT NULL,
  `kategori` varchar(25) DEFAULT NULL,
  `sifat` varchar(25) DEFAULT NULL,
  `versi` varchar(5) DEFAULT NULL,
  `tgl_dok` date NOT NULL,
  `tgl_terima` date NOT NULL,
  `kondisi` varchar(35) DEFAULT NULL,
  `keterangan` text,
  `kd_pekerjaan` varchar(25) NOT NULL,
  `kd_map` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_index`
--

CREATE TABLE IF NOT EXISTS `tbl_index` (
  `index_arsip` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lokasi`
--

CREATE TABLE IF NOT EXISTS `tbl_lokasi` (
  `kd_lokasi` int(11) NOT NULL,
  `gedung` varchar(50) NOT NULL,
  `lantai` varchar(15) NOT NULL,
  `rak` varchar(15) NOT NULL,
  `baris` varchar(15) NOT NULL,
  `kolom` varchar(15) NOT NULL,
  `file_path` varchar(150) DEFAULT NULL,
  `no_dok` varchar(100) NOT NULL,
  `kd_map` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_maps`
--

CREATE TABLE IF NOT EXISTS `tbl_maps` (
  `kd_map` int(11) NOT NULL,
  `lokasi` varchar(60) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pekerjaan`
--

CREATE TABLE IF NOT EXISTS `tbl_pekerjaan` (
  `kd_pekerjaan` varchar(25) NOT NULL,
  `nm_pekerjaan` varchar(200) NOT NULL,
  `unit` int(11) DEFAULT NULL,
  `tahun` year(4) NOT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `desa` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `index_arsip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nohp` varchar(15) NOT NULL,
  `tpt_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  ADD PRIMARY KEY (`no_dok`);

--
-- Indexes for table `tbl_index`
--
ALTER TABLE `tbl_index`
  ADD PRIMARY KEY (`index_arsip`);

--
-- Indexes for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`kd_lokasi`);

--
-- Indexes for table `tbl_maps`
--
ALTER TABLE `tbl_maps`
  ADD PRIMARY KEY (`kd_map`);

--
-- Indexes for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  ADD PRIMARY KEY (`kd_pekerjaan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  MODIFY `kd_lokasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_maps`
--
ALTER TABLE `tbl_maps`
  MODIFY `kd_map` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
