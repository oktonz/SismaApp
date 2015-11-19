-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2015 at 05:49 AM
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
('03.K/91.04/P18-F3/PPK-F/DJE/2011', 'Kontrak Kerja', 'Bupati', 'Direktorat EBK', 'Dokumen Kontrak', 'Penting', '1', '2015-11-01', '2015-11-02', 'baik', 'Belum ada usulan dari bupati setempat', 'PKJ-061115~0001', 13),
('BIOGAS12312/12/51', 'Surat Gas', 'ajhgdakj', 'jhaskjdh', 'kjashkjd', 'kjhaskjdh', '1', '2014-12-31', '2015-12-31', 'asda', 'asjhdk', 'PKJ-121115~0002', 11),
('QQQ.12/12/121', 'tetetetete', 'tetetetete', 'etettetete', 'etetet', 'etettete', '1', '2015-12-31', '2014-12-31', 'rwrwrwrw', 'rwrwrwrwr', 'PKJ-161115~0005', 12);

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
('IDX-051115~0001', 'Produktif', '2015-11-01'),
('IDX-121115~0002', 'Test', '2015-11-03');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`kd_lokasi`, `gedung`, `lantai`, `rak`, `baris`, `kolom`, `file_path`, `no_dok`, `kd_map`) VALUES
(1, 'Pohon', '2', '3', '1', '3', 'assets/dokumen/Kontrak_kerja0652.pdf', '03.K/91.04/P18-F3/PPK-F/DJE/2011', 13),
(6, 'adsd', '1', '1', '1', 'A', 'assets/dokumen/Surat_Gas1656.pdf', 'BIOGAS12312/12/51', 11),
(7, 'Roaster', '2', '2', '2', 'BB', 'assets/dokumen/tetetetete1628.pdf', 'QQQ.12/12/121', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_maps`
--

CREATE TABLE IF NOT EXISTS `tbl_maps` (
  `kd_map` int(11) NOT NULL,
  `lokasi` varchar(60) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_maps`
--

INSERT INTO `tbl_maps` (`kd_map`, `lokasi`, `lat`, `lng`) VALUES
(12, 'Kabupaten Sambas', 1.323735, 109.148315),
(13, 'Kabupaten Tapanuli', 2.265340, 98.338196),
(11, 'Kabupaten Penjaringan', -6.136459, 106.742081);

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

--
-- Dumping data for table `tbl_pekerjaan`
--

INSERT INTO `tbl_pekerjaan` (`kd_pekerjaan`, `nm_pekerjaan`, `unit`, `tahun`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `status`, `keterangan`, `index_arsip`) VALUES
('PKJ-061115~0001', 'Pengadaan & Pemasangan Peralatan Kegiatan Produktif', 2, 2011, 'Sumatera Utara', 'Tapanuli', 'Sd Hole', 'Hota Tonga Turunan', 'Batal', 'Tidak Ada.', 'IDX-051115~0001'),
('PKJ-121115~0002', 'Testing Pekerjaan', 1, 2013, 'Kalimantan Barat', 'Singkawang', 'Singkawang Utara', 'Lirang', 'Belum diusulkan', 'Tidak ada', 'IDX-121115~0002'),
('PKJ-131115~0003', 'Gulali', 1, 2015, 'Kalimantan Barat', 'sambas', 'pemangkat', 'penjajap', 'Batal', 'Tidak ada', 'IDX-121115~0002'),
('PKJ-161115~0004', 'PLTU', 1, 2014, 'Kalimantan Timur', 'Tidak tahu', 'landak', 'kapir', 'tidak diketahui', 'tidak ada', 'IDX-051115~0001'),
('PKJ-161115~0005', 'Test cari bro', 1, 2011, 'Kalimantan barat', 'sambas', 'semparuk', 'prapakan', 'Pending', 'Tidak ada', 'IDX-121115~0002');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `alamat`, `email`, `nohp`, `tpt_lahir`, `tgl_lahir`, `username`, `password`, `role`) VALUES
(1, 'Administrator', 'TBD', 'TBD', 'TBD', 'TBD', '0000-00-00', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Master'),
(2, 'Sugianto', 'Jalan Moh Hambal No. 99', 'sugi.92@gmail.com', '08525245997896', 'Pemangkat', '1992-01-11', 'Sugi123', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Admin');

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
  MODIFY `kd_lokasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_maps`
--
ALTER TABLE `tbl_maps`
  MODIFY `kd_map` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
