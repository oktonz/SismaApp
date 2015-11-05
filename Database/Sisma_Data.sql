-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2015 at 04:43 AM
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

--
-- Dumping data for table `tbl_dokumen`
--

INSERT INTO `tbl_dokumen` (`no_dok`, `nm_dok`, `asal`, `penerima`, `kategori`, `sifat`, `versi`, `tgl_dok`, `tgl_terima`, `kondisi`, `keterangan`, `kd_pekerjaan`, `kd_map`) VALUES
('BIO.01/12/15.SSA', 'Testing', 'Camat', 'ebk', 'Surat permintaan', 'tidak penting', '1', '2015-11-01', '2015-11-11', 'baik', '', 'PKRJ-00011', 2),
('QWE.12.12/21QW', 'Dokumen Test', 'test1', 'test2', 'surat', 'penting', '1', '2015-11-05', '2015-11-05', 'Baik', 'tidak ada', 'PKRJ-00004', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_index`
--

CREATE TABLE IF NOT EXISTS `tbl_index` (
  `index_arsip` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_index`
--

INSERT INTO `tbl_index` (`index_arsip`, `judul`, `tgl_input`) VALUES
('IDX-00001', 'PLTMH', '2015-10-01'),
('IDX-00002', 'Produktif', '2015-10-30'),
('xxxxxxxxxxxxxxxxxxeewerqwer', 'qwerqwerqwer', '2015-11-17');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`kd_lokasi`, `gedung`, `lantai`, `rak`, `baris`, `kolom`, `file_path`, `no_dok`, `kd_map`) VALUES
(3, 'qwe', '11', '2', '11', '1', 'assets/dokumen/Testing0422.pdf', 'BIO.01/12/15.SSA', 2),
(4, 'Test 123', '1', '1', '1', 'A', 'assets/dokumen/Dokumen_Test0406.pdf', 'QWE.12.12/21QW', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_maps`
--

CREATE TABLE IF NOT EXISTS `tbl_maps` (
  `kd_map` int(11) NOT NULL,
  `lokasi` varchar(60) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_maps`
--

INSERT INTO `tbl_maps` (`kd_map`, `lokasi`, `lat`, `lng`) VALUES
(1, 'Kabupaten Sambas', 1.384143, 109.285645),
(2, 'Kabupaten Mempawah', 0.362546, 108.978027),
(3, 'Kabupaten Singkawang', 0.900842, 109.010986),
(4, 'Kabupaten Pontianak', -0.032959, 109.362541),
(5, 'Kabupaten Bengkayang', 0.780005, 109.488892),
(6, 'Kabupaten Sanggau', 0.098877, 110.598511),
(9, 'Test', -0.593251, 109.736076);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pekerjaan`
--

CREATE TABLE IF NOT EXISTS `tbl_pekerjaan` (
  `kd_pekerjaan` varchar(25) NOT NULL,
  `nm_pekerjaan` varchar(200) NOT NULL,
  `unit` varchar(2) DEFAULT NULL,
  `tahun` year(4) NOT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `desa` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `index_arsip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pekerjaan`
--

INSERT INTO `tbl_pekerjaan` (`kd_pekerjaan`, `nm_pekerjaan`, `unit`, `tahun`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `status`, `keterangan`, `index_arsip`) VALUES
('PKRJ-00004', 'Testing', '1', 2014, 'Jawa Tengah', 'testing', 'test', 'test', 'est', 'test', 'IDX-00001'),
('PKRJ-00011', 'Implementasi Biogas Komunal untuk Rumah Tangga dan industri UKM (Limbah Industri Tahu)', '1', 2012, 'Jawa Tengah', 'Kulon Progo', 'Sentolo', 'Tuksono', 'Selesai', 'Tidak ada keterangan lebih lanjut', 'IDX-00001');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `alamat`, `email`, `nohp`, `tpt_lahir`, `tgl_lahir`, `username`, `password`, `role`) VALUES
(1, 'Administrator', '-', NULL, '-', '-', '0000-00-00', 'Admin', '202cb962ac59075b964b07152d234b70', 'Master'),
(14, 'Toni Stevanus', 'Jalan Pangeran Tubagus Angke No. 192', 'Toni.99@gmail.com', '085245451890', 'Jakarta', '1990-12-31', 'Toni', 'dce6345ea5b90d6ea53f0ef5c4b4c72c', 'Admin');

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
  MODIFY `kd_lokasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_maps`
--
ALTER TABLE `tbl_maps`
  MODIFY `kd_map` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
