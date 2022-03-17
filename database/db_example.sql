-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2022 at 05:34 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_example`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_butir_kegiatan`
--

CREATE TABLE `tbl_butir_kegiatan` (
  `id` int(11) NOT NULL,
  `id_unsur` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL,
  `nama` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_butir_kegiatan`
--

INSERT INTO `tbl_butir_kegiatan` (`id`, `id_unsur`, `id_sub`, `nama`, `created_at`, `update_at`) VALUES
(1, 1, 3, 'Hallo', '2022-03-17 12:29:11', '2022-03-17 12:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_unsur`
--

CREATE TABLE `tbl_sub_unsur` (
  `id` int(11) NOT NULL,
  `id_unsur` int(11) NOT NULL,
  `nama` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_unsur`
--

INSERT INTO `tbl_sub_unsur` (`id`, `id_unsur`, `nama`, `created_at`, `update_at`) VALUES
(1, 1, 'Pendidikan sekolah dan memperoleh ijazah/gelar', '2021-05-04 13:09:59', '2021-05-04 13:09:59'),
(2, 1, 'Diklat Fungsional / Teknis di bidang tugas Pol PP dan Memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat', '2021-05-04 13:12:07', '2021-05-04 13:12:07'),
(3, 1, 'DIklat Prajabatan', '2021-05-04 13:13:54', '2021-05-04 13:13:54'),
(6, 2, 'Melaksanakan penindakan yutisi', '2021-05-17 11:24:13', '2021-05-17 11:24:13'),
(7, 2, 'Pelaksanaan tindakan Non Yustisi', '2021-05-17 11:24:55', '2021-05-17 11:24:55'),
(8, 4, 'Pembuatan Karya Tulis/Karya Ilmiah di bidang tugas Pol PP ', '2021-05-17 11:26:04', '2021-05-17 11:26:04'),
(9, 4, 'Penerjemah / penyaduran buku dan bahan lainnya di bidang tugas Pol PP ', '2021-05-17 11:27:34', '2021-05-17 11:27:34'),
(10, 4, 'Penyusunan Buku pedoman/ketentuan pelaksanaan/ketentuan teknis di bidang tugas Pol PP', '2021-05-17 11:28:50', '2021-05-17 11:28:50'),
(11, 5, 'Pengajar/Pelatih pada diklat fungsional/teknis dibidang tugas Pol PP', '2021-05-17 11:30:31', '2021-05-17 11:30:31'),
(12, 2, 'Mengevaluasi penegakan perda dan peraturan kepala daerah', '2021-05-17 11:32:07', '2021-05-17 11:32:07'),
(13, 3, 'Membuat rencana induk (Master Plan)', '2021-05-17 11:34:32', '2021-05-17 11:34:32'),
(14, 3, 'Melakukan Patroli', '2021-05-17 11:35:37', '2021-05-17 11:35:37'),
(15, 3, 'Melaksanakan pengamanan dan pengawalan', '2021-05-17 11:36:17', '2021-05-17 11:36:17'),
(16, 3, 'Melakukan Pengendalian massa', '2021-05-17 11:36:43', '2021-05-17 11:36:43'),
(17, 3, 'Melaksanakan deteksi dini', '2021-05-17 11:37:21', '2021-05-17 11:37:21'),
(18, 3, 'Memfasilitasi dan melakukan pemberdayaan kapasitas serta menyelenggarakan perlindungan masyarakat', '2021-05-17 11:38:22', '2021-05-17 11:38:22'),
(19, 5, 'Peran serta dalam seminar / lokakarya / koferensi dibidang tugas Pol PP', '2021-05-17 11:40:01', '2021-05-17 11:40:01'),
(20, 5, 'Kenganggitaan dalam Organisasi Profesi', '2021-05-17 11:40:42', '2021-05-17 11:40:42'),
(21, 5, 'Kenganggitaan dalam Tim Penilai', '2021-05-17 11:41:07', '2021-05-17 11:41:07'),
(22, 5, 'Perolehan Penghargaan / Tanda Jasa', '2021-05-17 11:41:37', '2021-05-17 11:41:37'),
(23, 5, 'Perolehan Ijazah / gelar kesarjanaan lainnya', '2021-05-17 11:42:10', '2021-05-17 11:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unsur`
--

CREATE TABLE `tbl_unsur` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_unsur`
--

INSERT INTO `tbl_unsur` (`id`, `nama`, `created_at`, `update_at`) VALUES
(1, 'Pendidikan', '2021-05-04 13:05:34', '2021-05-04 13:05:34'),
(2, 'Penegakan Perda', '2021-05-04 13:05:47', '2021-05-04 13:05:47'),
(3, 'Penyelenggara Ketertiban Umum dan Ketrentraman Masyarakat', '2021-05-04 13:08:38', '2021-05-04 13:08:38'),
(4, 'Pengembangan Profesi', '2021-05-04 13:08:58', '2021-05-04 13:08:58'),
(5, 'Penunjang Tugas Pol PP', '2021-05-04 13:09:24', '2021-05-04 13:09:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_butir_kegiatan`
--
ALTER TABLE `tbl_butir_kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sub` (`id_sub`),
  ADD KEY `id_unsur` (`id_unsur`);

--
-- Indexes for table `tbl_sub_unsur`
--
ALTER TABLE `tbl_sub_unsur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_unsur` (`id_unsur`);

--
-- Indexes for table `tbl_unsur`
--
ALTER TABLE `tbl_unsur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_butir_kegiatan`
--
ALTER TABLE `tbl_butir_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sub_unsur`
--
ALTER TABLE `tbl_sub_unsur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_unsur`
--
ALTER TABLE `tbl_unsur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_butir_kegiatan`
--
ALTER TABLE `tbl_butir_kegiatan`
  ADD CONSTRAINT `tbl_butir_kegiatan_ibfk_1` FOREIGN KEY (`id_sub`) REFERENCES `tbl_sub_unsur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_butir_kegiatan_ibfk_2` FOREIGN KEY (`id_unsur`) REFERENCES `tbl_unsur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sub_unsur`
--
ALTER TABLE `tbl_sub_unsur`
  ADD CONSTRAINT `fk_subunsur_unusr` FOREIGN KEY (`id_unsur`) REFERENCES `tbl_unsur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_unsur`
--
ALTER TABLE `tbl_unsur`
  ADD CONSTRAINT `tbl_unsur_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tbl_sub_unsur` (`id_unsur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
