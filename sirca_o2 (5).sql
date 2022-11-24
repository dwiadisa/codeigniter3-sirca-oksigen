-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2022 at 04:24 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirca_o2`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_ca`
--

DROP TABLE IF EXISTS `data_ca`;
CREATE TABLE IF NOT EXISTS `data_ca` (
  `id_ca` int NOT NULL AUTO_INCREMENT,
  `no_induk_CA` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pengguna_nama` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pengguna_username` varchar(50) NOT NULL,
  `pengguna_password` varchar(250) NOT NULL,
  `pengguna_email` varchar(250) NOT NULL,
  `pengguna_level` enum('WTO_ADMIN','WTO_VIEW','CALON_ANGGOTA','') NOT NULL,
  `pengguna_status` int NOT NULL,
  `nim` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fakultas` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prodi` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(12) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `tempat_lahir` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_rumah` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_kost` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `instagram` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hobi` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `div_drama` int NOT NULL,
  `div_tari` int NOT NULL,
  `div_rupa` int NOT NULL,
  `div_sinema` int NOT NULL,
  `alasan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `riwayat_organisasi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto_ktm` varchar(500) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `foto_diri` varchar(500) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `tanggal_submit` date NOT NULL,
  `tahun_submit` year NOT NULL,
  PRIMARY KEY (`id_ca`),
  UNIQUE KEY `pengguna_username` (`pengguna_username`),
  UNIQUE KEY `pengguna_email` (`pengguna_email`)
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `data_ca`
--

INSERT INTO `data_ca` (`id_ca`, `no_induk_CA`, `pengguna_nama`, `pengguna_username`, `pengguna_password`, `pengguna_email`, `pengguna_level`, `pengguna_status`, `nim`, `fakultas`, `prodi`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat_rumah`, `alamat_kost`, `instagram`, `no_hp`, `hobi`, `div_drama`, `div_tari`, `div_rupa`, `div_sinema`, `alasan`, `riwayat_organisasi`, `foto_ktm`, `foto_diri`, `tanggal_submit`, `tahun_submit`) VALUES
(156, 'CATO-2022-1810651078', 'Farel Mistoasdasd', 'farel_misto', '25d55ad283aa400af464c76d713c07ad', 'farelfaraday234@gmail.com', 'CALON_ANGGOTA', 1, '1810651078', '1', '1', 'Laki-Laki', 'Malang', '2022-11-23', 'hjgjgjhgjhghjgjhgjhgjhgjh', 'hjhghjghjgjhgjhgjh', '@adasdsad', '8090909009090', 'menek pager', 1, 1, 1, 1, 'nambah kenalan cewek ajah seh gak macem macem', '                test test test', 'null_ktm.png', 'asu.png', '2022-11-12', 2020),
(157, 'CATO-2022-1231221', 'SIRCA TEST', 'calon_anggota2', '25d55ad283aa400af464c76d713c07ad', 'emailkuaja@email.com', 'CALON_ANGGOTA', 1, '18130651072', '1', '3', 'Laki-Laki', 'Malang', '2021-12-31', 'askdlksajdlkjaslkdjsalkdjla', 'kjashdkjahsjkdhsakjhdkja', '@adasdsad', '00000000', 'askdjklasjdlkasjd', 1, 1, 1, 1, 'jkshjhkjhakjd', '      jskdfjshkfjhskjfhs', 'null_ktm.png', 'logo_web_o2.png', '2022-11-19', 0000),
(181, '', 'test calon calon', 'test_calon_oksigen', '25d55ad283aa400af464c76d713c07ad', 'test_calon_oksigen@email.go.id', 'CALON_ANGGOTA', 1, '', '', '', '', '', '0000-00-00', '', '', '', '', '', 0, 0, 0, 0, '', '', '', 'null_foto.jpg', '0000-00-00', 0000),
(182, 'CATO-2022-9999999999999', 'asdasdasd', 'calonanggota2000', '25d55ad283aa400af464c76d713c07ad', 'emailnyaca@email.com', 'CALON_ANGGOTA', 1, '9999999999999', '4', '14', 'Perempuan', 'wqeqwewqewqe', '2022-11-23', 'ewtfwerewr', 'ewrewrewrewrewrew', 'wqewqe', '00000000', 'ewrewrewr', 1, 1, 0, 0, 'asd', '            ewrewrewrewrewrewr', 'null_ktm.png', 'null_foto.jpg', '2022-11-23', 2022),
(207, 'CATO-2022-1856554785', 'ukm teater oksigen', 'ukmteateroksigen', '25d55ad283aa400af464c76d713c07ad', 'ukmteateroksigen@email.id', 'CALON_ANGGOTA', 1, '1856554785', '7', '19', 'Laki-Laki', 'sadsadsadsadsa', '2022-11-08', 'sadasdsadsad', 'sadsadas', 'dsadsadas', 'asdasd', 'sadsadas', 0, 0, 1, 1, 'sadasdas', '    asdasdas', 'null_ktm.png', 'null_foto.jpg', '2022-11-23', 2022),
(208, '', 'asdasdas', '', '', '', '', 0, '', '', '', '', '', '0000-00-00', '', '', '', '', '', 0, 0, 0, 0, '', '', '', '', '0000-00-00', 0000),
(210, 'CATO-2022-787987979', 'test aja dah', 'cuma_kamu', '25d55ad283aa400af464c76d713c07ad', 'cuma_kau@email.com', 'CALON_ANGGOTA', 1, '787987979', '1', '3', 'Laki-Laki', 'kjkjhkhkhkjh', '2022-11-17', 'sadsadasda', 'sadasdsadsadas', 'asudhagdjha', '21321321', 'sadasdasdsad', 0, 0, 0, 1, 'sadsadasd', 'asdsadsadasd', 'null_ktm.png', 'PHP.jpg', '2022-11-20', 2022),
(211, 'CATO-2022-78798797987', 'adisamedia developer', 'suka_aja_daftar', '25d55ad283aa400af464c76d713c07ad', 'suka_aja_daftar@email.com', 'CALON_ANGGOTA', 1, '78798797987', '4', '14', 'Laki-Laki', 'Lumajang', '1998-03-23', 'Jl. Singosari 45 Jember Kaliwates', '-', '@adasdsad', '00000000', 'balapa liar di jalanan yang berliku', 1, 0, 0, 1, 'suka aja iseng maen maen aja ', 'ketua umum drag and drop', 'null_ktm.png', 'IMG_4807.jpg', '2022-11-23', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `data_fakultas`
--

DROP TABLE IF EXISTS `data_fakultas`;
CREATE TABLE IF NOT EXISTS `data_fakultas` (
  `id_fakultas` int NOT NULL AUTO_INCREMENT,
  `nama_fakultas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_fakultas`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_fakultas`
--

INSERT INTO `data_fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Teknik'),
(2, 'Hukum'),
(3, 'Ilmu Sosial dan Politik'),
(4, 'Ilmu Kesehatan'),
(5, 'Psikologi'),
(7, 'Ilmu Keguruan dan Ilmu Pendidikan'),
(10, 'Ekonomi dan Bisnis'),
(11, ' Agama Islam'),
(12, 'Pertanian');

-- --------------------------------------------------------

--
-- Table structure for table `data_prodi`
--

DROP TABLE IF EXISTS `data_prodi`;
CREATE TABLE IF NOT EXISTS `data_prodi` (
  `id_prodi` int NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(50) NOT NULL,
  `fakultas` int NOT NULL,
  PRIMARY KEY (`id_prodi`),
  KEY `fk_fakultas_ke_prodi` (`fakultas`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_prodi`
--

INSERT INTO `data_prodi` (`id_prodi`, `nama_prodi`, `fakultas`) VALUES
(1, 'Teknik Informatika', 1),
(2, 'Teknik Sipil', 1),
(3, 'Teknik Lingkungan', 1),
(4, 'Manajemen Informatika', 1),
(5, 'Teknik Mesin', 1),
(6, 'Ilmu Komunikasi', 3),
(7, 'Ilmu Pemerintahan', 3),
(8, 'Ilmu Hukum', 2),
(9, 'Psikologi', 5),
(10, 'Manajemen', 10),
(12, 'Akuntansi', 10),
(14, 'Keperawatan', 4),
(19, 'Pendidikan Bahasa dan Sastra Indonesia', 7),
(20, 'Pendidikan Bahasa Inggris', 7),
(21, 'Matematika', 7),
(23, 'Pendidikan Agama Islam', 11),
(24, 'Ekonomi Syariah', 11),
(25, 'Agroteknologi', 12),
(26, 'Pendidikan Olahraga', 7),
(27, 'Teknik Elektro', 1),
(28, 'Teknologi Ilmu Pertanian', 12),
(29, 'Pendidikan Biologi', 7),
(30, 'Perhotelan D3', 3),
(31, 'S1 Keperawatan', 4),
(32, 'Ners Keperawatan', 4),
(34, 'aaaaaaaaaaaaaa', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` int NOT NULL AUTO_INCREMENT,
  `pengguna_nama` varchar(50) NOT NULL,
  `pengguna_username` varchar(50) NOT NULL,
  `pengguna_password` varchar(250) NOT NULL,
  `pengguna_email` varchar(250) NOT NULL,
  `pengguna_level` enum('WTO_ADMIN','WTO_VIEW','KEANGGOTAAN','') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pengguna_foto` varchar(255) NOT NULL,
  `pengguna_status` int NOT NULL,
  PRIMARY KEY (`id_pengguna`),
  UNIQUE KEY `pengguna_username` (`pengguna_username`),
  UNIQUE KEY `pengguna_email` (`pengguna_email`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `pengguna_nama`, `pengguna_username`, `pengguna_password`, `pengguna_email`, `pengguna_level`, `pengguna_foto`, `pengguna_status`) VALUES
(1, 'Arrohim Dwi Ksatria', '11.18.10', '21232f297a57a5a743894a0e4a801fc3', 'admin@email.net', 'WTO_ADMIN', 'IMG_4807.jpg', 1),
(32, 'test admin', '11.18.99', '25d55ad283aa400af464c76d713c07ad', 'farelfaraday234@gmail.com', 'WTO_ADMIN', 'IMG_7008_(1).jpg', 1),
(34, 'TEST WTO VIEW', 'testwtoview', '25d55ad283aa400af464c76d713c07ad', 'testwtoview@email.om', 'WTO_VIEW', 'PHP.jpg', 1),
(35, 'Safitri Ramadhayanti Saputro', '14.21.08', '25d55ad283aa400af464c76d713c07ad', 'safitri@email.com', 'WTO_VIEW', 'logo_adisa.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id_setting` int NOT NULL,
  `nama_setting` varchar(10) NOT NULL,
  `value` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_setting`, `value`) VALUES
(0, 'form_aktif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `side_bar`
--

DROP TABLE IF EXISTS `side_bar`;
CREATE TABLE IF NOT EXISTS `side_bar` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `icon` varchar(100) NOT NULL,
  `text` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `category` enum('Content Management System','SISTEM PENDAFTARAN CALON ANGGOTA','SETTING','') NOT NULL,
  `hak_akses` enum('a','','','') NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_prodi`
--
ALTER TABLE `data_prodi`
  ADD CONSTRAINT `fk_fakultas_ke_prodi` FOREIGN KEY (`fakultas`) REFERENCES `data_fakultas` (`id_fakultas`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
