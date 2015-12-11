-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2015 at 11:25 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
('-', 'Laporan Kabid Pertamben Kab Pengandaran pada workshop Serah terima aset', '-', '-', 'Laporan', '-', '1', '2014-11-27', '2015-11-23', 'Rusak', 'Kondisi aset tidak ada penangkal petir intake, head race dan penstock tertimpa longsor.', 'PKJ-231115~0002', 2),
('03/91.04/P07-F3/PPK-F/DJE/2011', 'Nomor Kontrak', '-', '-', 'Dokumen Kontrak', '-', '1', '2015-11-23', '2015-11-23', 'Baik', 'Tidak Ada.', 'PKJ-231115~0001', 1),
('03/91.04/P10-F3/PPK-F/DJE/2011', 'Nomor Kontrak', '-', '-', 'Dokumen Kontrak', '-', '1', '2015-11-23', '2015-11-23', 'Rusak', 'Tidak ada', 'PKJ-231115~0002', 2),
('03/91.04/S05-F2/PPKF/DJE/2011', 'Surat Kontrak', '-', '-', 'Dokumen kontrak', '-', '1', '2015-12-31', '2015-12-31', 'Baik', 'Tidak ada', 'PKJ-231115~0003', 5),
('08/BA/91/SDE/2012:671/1626/BBMSDAESDM/2012', 'PJK Pemda', '-', '-', 'Berita Acara Sementara', '-', '1', '2012-06-21', '2015-11-23', 'Rusak', 'Tidak ada', 'PKJ-231115~0002', 2),
('231/21.04/DEA.02/2014', 'Serah terima ke Bupati', '-', '-', 'Surat Permintaan', '-', '1', '2014-04-01', '2014-04-02', 'Baik', 'Tidak Ada.', 'PKJ-231115~0001', 1),
('239/21.04/DEA.02/2014', 'Serah Terima ke Bupati', '-', '-', 'Surat Permintaan', '-', '1', '2014-04-01', '2015-11-23', 'Rusak', 'Tidak ada.', 'PKJ-231115~0002', 2),
('540/721/IV/2011', 'Usulan dari Pemda', 'Gubernur Sulawesi Barat', '-', 'Surat', 'Penting', '1', '2011-04-08', '2015-11-01', 'Baik', 'Tidak ada.', 'PKJ-231115~0003', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_index`
--

CREATE TABLE IF NOT EXISTS `tbl_index` (
  `index_arsip` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `instansi` varchar(150) DEFAULT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_index`
--

INSERT INTO `tbl_index` (`index_arsip`, `judul`, `instansi`, `tgl_input`) VALUES
('IDX-231115~0001', 'PLTMH', 'Direktorat Aneka EBT', '2015-11-20'),
('IDX-231115~0002', '-', 'Direktorat Bioenergi', '2015-12-31');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`kd_lokasi`, `gedung`, `lantai`, `rak`, `baris`, `kolom`, `file_path`, `no_dok`, `kd_map`) VALUES
(1, 'Testing', '2', '2', '2', '2', 'assets/dokumen/Serah_terima_ke_Bupati2323.pdf', '231/21.04/DEA.02/2014', 1),
(2, 'Test', '2', '2', '2', '2', 'assets/dokumen/Nomor_Kontrak2327.pdf', '03/91.04/P07-F3/PPK-F/DJE/2011', 1),
(3, 'Luar Biasa', '2', '1', '1', '1', 'assets/dokumen/Serah_Terima_ke_Bupati2333.pdf', '239/21.04/DEA.02/2014', 2),
(4, 'Luar Biasa', '1', '1', '1', '1', 'assets/dokumen/Nomor_Kontrak2334.pdf', '03/91.04/P10-F3/PPK-F/DJE/2011', 2),
(5, 'Renault', '1', '2', '3', '4', 'assets/dokumen/PJK_Pemda2337.pdf', '08/BA/91/SDE/2012:671/1626/BBMSDAESDM/2012', 2),
(6, 'Luar Biasa', '1', '2', '3', '4', 'assets/dokumen/Laporan_Kabid_Pertamben_Kab_Pengandaran_pada_workshop_Serah_terima_aset2341.pdf', '-', 2),
(7, 'Timuraya', '5', '1', '2', '4', 'assets/dokumen/Surat_Kontrak2335.pdf', '03/91.04/S05-F2/PPKF/DJE/2011', 5),
(8, 'Timuraya', '2', '2', '2', '2', 'assets/dokumen/Usulan_dari_Pemda2337.pdf', '540/721/IV/2011', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_maps`
--

CREATE TABLE IF NOT EXISTS `tbl_maps` (
  `kd_map` int(11) NOT NULL,
  `lokasi` varchar(60) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_maps`
--

INSERT INTO `tbl_maps` (`kd_map`, `lokasi`, `lat`, `lng`) VALUES
(1, 'Kabupaten Samosir', 2.653622, 98.768250),
(2, 'Kabupaten Ciamis', -7.324330, 108.324333),
(3, 'Kabupaten Jayapura', -2.959499, 139.822144),
(5, 'Kabupaten Mamuju Utara', -1.510445, 119.492371);

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
('PKJ-231115~0001', 'PLTMH 31.20 kW', 1, 2011, 'Sumatera Utara', 'Samosir', '-', 'Hasinggahan', 'Belum diusulkan', 'Tidak ada Surat Pernyataan Pemda menerima Hibah, tidak ada BAST Sementara, tidak ada foto proyek.', 'IDX-231115~0001'),
('PKJ-231115~0002', 'PLTMH 24.40 kW', 1, 2011, 'Jawa Barat', 'Ciamis', 'Cigugur', 'Harumandala', 'Kondisi Rusak', 'Tidak ada Surat pernyataan Pemda menerima hibah, Foto proyek tidak ada.', 'IDX-231115~0001'),
('PKJ-231115~0003', 'Pembangunan DME berbasis BBN Singkong 400 L/Hari: 90%v/v', 1, 2011, 'Sulawesi Barat', 'Mamuju Utara', 'Pasang Kayu ', 'Karya Bersama', 'Belum diusulkan', 'Tidak ada Surat Pernyataan Pemda menerima hibah, foto proyek tidak ada.', 'IDX-231115~0002');

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
(1, 'Administrator', 'TBD', 'TBD', 'TBD', 'TBD', '0000-00-00', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Master');

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
  MODIFY `kd_lokasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_maps`
--
ALTER TABLE `tbl_maps`
  MODIFY `kd_map` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
