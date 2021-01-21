-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 01:32 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dom`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `naper` varchar(255) DEFAULT NULL,
  `alamatKantor` varchar(255) DEFAULT NULL,
  `notelp` varchar(12) DEFAULT NULL,
  `nofax` varchar(12) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `naper`, `alamatKantor`, `notelp`, `nofax`, `email`, `website`, `logo`, `created_at`, `updated_at`) VALUES
(1, '8 Bit', 'Jl. Jend. Sudirman No.Kav 44-46, RT.14/RW.1, 1, Bend. Hilir, Kecamatan Tanah Abang, Kota Jakarta Pusat', '0217561858', '0217561858', '8bit@gmail.com', 'www.8bit.com', 'ICON.png', NULL, '2021-01-21 02:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_name`, `admin_password`) VALUES
(1, 'adminsatu', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `thumbnail` varchar(250) DEFAULT NULL,
  `body` varchar(250) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `thumbnail`, `body`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Libur Natal', 'PohonNatal.jpg', 'Memperingati hari raya Natal', NULL, '2021-01-20 17:20:08', '2021-01-20 18:56:40'),
(6, 'Tahun Baru', 'TahunBaru.jpg', 'Memperingati hari raya tahun baru', NULL, '2021-01-20 17:41:24', '2021-01-20 18:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `check_in` time DEFAULT NULL,
  `check_out` time DEFAULT NULL,
  `overtime_in` time DEFAULT NULL,
  `overtime_out` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `nip`, `date`, `check_in`, `check_out`, `overtime_in`, `overtime_out`) VALUES
(19, '202101160001', '2021-01-18', '16:36:53', '20:07:23', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `bank_code` varchar(10) NOT NULL,
  `bank_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`bank_code`, `bank_name`) VALUES
('002', 'Bank BRI'),
('003', 'Bank Ekspor Indonesi'),
('008', 'Bank Mandiri'),
('009', 'Bank BNI'),
('011', 'Bank Danamon'),
('013', 'Permata Bank'),
('014', 'Bank BCA'),
('016', 'Bank BII Maybank'),
('019', 'Bank Panin'),
('020', 'Bank Arta Niaga Kenc'),
('022', 'Bank CIMB Niaga'),
('023', 'Bank UOB Indonesia'),
('026', 'Bank Lippo'),
('028', 'Bank OCBC NISP'),
('030', 'American Express Ban'),
('031', 'Citibank'),
('032', 'JP. Morgan Chase Ban'),
('033', 'Bank of America, N.A'),
('034', 'ING Indonesia Bank'),
('037', 'Bank Artha Graha Int'),
('039', 'Bank Credit Agricole'),
('040', 'The Bangkok Bank Com'),
('041', 'The Hongkong & Shang'),
('042', 'The Bank of Tokyo Mi'),
('045', 'Bank Sumitomo Mitsui'),
('046', 'Bank DBS Indonesia'),
('047', 'Bank Resona Perdania'),
('048', 'Bank Mizuho Indonesi'),
('050', 'Standard Chartered B'),
('052', 'Bank ABN Amro'),
('053', 'Bank Keppel Tatlee B'),
('054', 'Bank Capital Indones'),
('057', 'Bank BNP Paribas Ind'),
('059', 'Korea Exchange Bank '),
('061', 'Bank ANZ Indonesia'),
('067', 'Deutsche Bank AG.'),
('068', 'Bank Woori Indonesia'),
('069', 'Bank OF China '),
('076', 'Bank Bumi Arta'),
('087', 'Bank Ekonomi'),
('088', 'Bank Antardaerah'),
('089', 'Bank Haga'),
('093', 'Bank IFI'),
('095', 'Bank JTRUST'),
('097', 'Bank Mayapada'),
('110', 'Bank Jabar dan Bante'),
('111', 'Bank DKI'),
('112', 'BPD DIY'),
('113', 'Bank Jateng'),
('114', 'Bank Jatim'),
('115', 'BPD Jambi'),
('116', 'BPD Aceh, BPD Aceh S'),
('117', 'Bank Sumut'),
('118', 'Bank Nagari'),
('119', 'Bank Riau'),
('120', 'Bank Sumsel Babel'),
('121', 'Bank Lampung'),
('122', 'Bank Kalsel'),
('123', 'Bank Kalimantan Bara'),
('124', 'Bank Kalimantan Timu'),
('125', 'Bank Kalteng'),
('126', 'Bank Sulsel dan Bara'),
('127', 'Bank Sulut Gorontalo'),
('128', 'Bank NTB, NTB Syaria'),
('129', 'BPD Bali'),
('130', 'Bank NTT'),
('131', 'Bank Maluku Malut'),
('132', 'Bank Papua'),
('133', 'Bank Bengkulu'),
('134', 'Bank Sulawesi Tengah'),
('135', 'Bank Sultra'),
('145', 'Bank Nusantara Parah'),
('146', 'Bank of India Indone'),
('147', 'Bank Muamalat'),
('151', 'Bank Mestika Dharma'),
('152', 'Bank Metro Express ('),
('153', 'Bank Sinarmas'),
('157', 'Bank Maspion Indones'),
('159', 'Bank Hagakita'),
('161', 'Bank Ganesha'),
('162', 'Bank Windu Kentjana'),
('164', 'Halim Indonesia Bank'),
('166', 'Bank Harmoni Interna'),
('167', 'Bank QNB Kesawan (Ba'),
('200', 'Bank Tabungan Negara'),
('212', 'Bank Himpunan Saudar'),
('213', 'Bank Tabungan Pensiu'),
('214', 'JENIUS'),
('405', 'Bank Swaguna'),
('422', 'Bank BRI Syariah'),
('425', 'Bank BJB Syariah'),
('426', 'Bank Mega'),
('427', 'Bank BNI Syariah'),
('441', 'Bank Bukopin'),
('451', 'Bank Syariah Mandiri'),
('459', 'Bank Bisnis Internas'),
('466', 'Bank Sri Partha'),
('484', 'Bank Bintang Manungg'),
('485', 'Bank MNC / Bank Bumi'),
('490', 'Bank Yudha Bhakti'),
('494', 'Bank BRI Agro'),
('498', 'Bank Indomonex (Bank'),
('501', 'Bank Royal Indonesia'),
('503', 'Bank Alfindo (Bank N'),
('506', 'Bank Syariah Mega'),
('513', 'Bank Ina Perdana'),
('517', 'Bank Harfa'),
('520', 'Prima Master Bank'),
('521', 'Bank Persyarikatan I'),
('523', 'Bank Dipo Internatio'),
('525', 'Bank Akita'),
('526', 'Liman International '),
('531', 'Anglomas Internasion'),
('535', 'Bank Kesejahteraan E'),
('536', 'Bank BCA Syariah'),
('542', 'Bank Artos IND'),
('547', 'Bank Purba Danarta'),
('548', 'Bank Multi Arta Sent'),
('553', 'Bank Mayora Indonesi'),
('555', 'Bank Index Selindo'),
('559', 'Centratama Nasional '),
('562', 'Bank Fama Internasio'),
('564', 'Bank Mandiri Taspen '),
('566', 'Bank Victoria Intern'),
('567', 'Bank Harda'),
('688', 'BPR KS'),
('789', 'Indosat Dompetku'),
('911', 'Telkomsel Tcash'),
('945', 'Bank Agris'),
('946', 'Bank Merincorp'),
('947', 'Bank Maybank Indocor'),
('948', 'Bank OCBC – Indonesi'),
('949', 'Bank CTBC (China Tru'),
('950', 'Bank Commonwealth');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `agenda` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `agenda`, `color`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, 'Cuti Bersama', 'Red', '2021-01-01 17:52:56', '2021-01-01 17:52:56', '2021-01-01 17:52:56', '2021-01-01 17:52:56'),
(3, 'Cuti Bersama', 'Red', '2021-01-18 17:52:56', '2021-01-18 17:52:56', '2021-01-18 20:17:07', '0000-00-00 00:00:00'),
(5, 'LIBUR', 'rgb(167, 29, 42)', '2021-01-22 09:01:00', '2021-01-22 10:01:00', '2021-01-20 18:49:28', '2021-01-20 18:49:28'),
(6, 'Lunch', 'rgb(40, 167, 69)', '2021-01-23 08:01:00', '2021-01-23 09:01:00', '2021-01-20 18:50:15', '2021-01-20 18:50:15'),
(7, 'Go home', 'rgb(255, 193, 7)', '2021-01-14 09:01:00', '2021-01-14 10:01:00', '2021-01-20 18:50:59', '2021-01-20 18:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `disc_submission`
--

CREATE TABLE `disc_submission` (
  `id_sub` int(11) NOT NULL,
  `user` varchar(20) DEFAULT NULL,
  `approver` varchar(20) DEFAULT NULL,
  `submission_for` varchar(20) DEFAULT NULL,
  `submission_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `approve_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `implementation_date_start` timestamp NULL DEFAULT NULL,
  `implementation_date_end` timestamp NULL DEFAULT NULL,
  `user_desc` varchar(100) DEFAULT NULL,
  `approver_desc` varchar(100) DEFAULT NULL,
  `attachment` varchar(100) DEFAULT NULL,
  `status_sub` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disc_submission`
--

INSERT INTO `disc_submission` (`id_sub`, `user`, `approver`, `submission_for`, `submission_date`, `approve_date`, `implementation_date_start`, `implementation_date_end`, `user_desc`, `approver_desc`, `attachment`, `status_sub`) VALUES
(60, '202101160001', '202101170001', 'CUTI', '2021-01-16 17:00:00', NULL, '2021-01-17 17:00:00', '2021-01-18 17:00:00', 'Melahirkan', NULL, NULL, 'P');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `division_name` varchar(20) DEFAULT NULL,
  `division_desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `division_name`, `division_desc`) VALUES
(3, 'Human Resource', 'Divisi yang memanajemen sumber daya manusia'),
(4, 'Akutansi & Keuangan', 'Divisi yang memanejemen keuangan'),
(5, 'MAP', 'Divisi yang menangani pengadaan'),
(12, 'Marketing dan Sales', 'Divisi yang menangani marketing dan sales'),
(13, 'Manajemen resiko', 'Divisi yang menangani analisa resiko perusahaan');

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `nip` varchar(20) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `division` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `right_to_leave` int(2) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `join_date` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `bank_code` varchar(10) DEFAULT NULL,
  `bank_no` varchar(20) DEFAULT NULL,
  `bank_account` varchar(20) DEFAULT NULL,
  `bpjs_ks` varchar(20) DEFAULT NULL,
  `bpjs_tk` varchar(20) DEFAULT NULL,
  `insurance` varchar(20) DEFAULT NULL,
  `ktp` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `education` varchar(20) DEFAULT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`nip`, `first_name`, `last_name`, `division`, `position`, `right_to_leave`, `email`, `no_telp`, `join_date`, `status`, `bank_code`, `bank_no`, `bank_account`, `bpjs_ks`, `bpjs_tk`, `insurance`, `ktp`, `address`, `education`, `foto`) VALUES
('202101160001', 'Muhammad', 'Hilman', 3, 3, 12, 'hilman@gmail.com', '089653834111', '2021-01-16 07:55:34', 1, '002', '1234567890001', 'Muhammad Hilman', '1234567890001', '1234567890001', '', '3276021404940001', 'Jatiwaringin - Bekasi', 'S1 Komputer', '202101160001-profil.jpg'),
('202101170001', 'Andi', 'Saryoko', 3, 3, 12, 'andy@gmail.com', '089653834111', '2021-01-17 07:34:16', 1, '002', '1234567890001', 'Andi Saryoko', '1234567890001', '1234567890001', '', '3276021404940001', 'Tambun- Bekasi', 'S1 Komputer', '202101170001-profil.jpg'),
('202101180001', 'Abdur', 'Rozak', 4, 1, 12, 'rozak@gmail.com', '089653834111', '2021-01-18 08:03:51', 1, '002', '1234567890001', 'Abdur Rozak', '1234567890001', '1234567890001', '', '3276021404940001', 'Bekasi', 'S1 Ekonomi', '202101180001-profil.jpg'),
('202101210001', 'Ihsan', 'Bagus', 5, 1, 12, 'bagus@gmail.com', '089675232093', '2021-01-20 18:00:12', 1, '002', '123456789', 'Ihsan Bagus', '123456789', '123456789', '123456789', '3201013108930001', 'Bekasi barat - Bekasi', 'S1 Manajemen', '202101210001-profil.jpg'),
('202101210002', 'Ardi', 'Nurdin', 13, 1, 12, 'ardy@gmail.com', '089675233872', '2021-01-20 18:03:22', 1, '002', '123456789', 'Ardi Nurdin', '123456789', '123456789', '123456111', '3201013108930002', 'Cilodong - Depok', 'S1 Ekonomi', '202101210002-profil.jpg'),
('202101210003', 'Ahmad', 'Nurjati', 12, 1, 12, 'anurjati16@gmail.com', '089675232093', '2021-01-20 18:05:38', 1, '002', '123456789', 'Ahmad Nurjati', '123456789', '123456789', '', '3201013108930005', 'Sentul - Bogor', 'S1 Aktuaria', '202101210003-profil.jpg'),
('202101210004', 'Pegawai', 'Satu', 4, 1, 12, 'pegawaisatu@gmail.com', '089675232111', '2021-01-20 18:08:33', 1, '002', '123456789', 'Pegawai Satu', '123456789', '123456789', '123456789', '3201013108930003', 'Jatiwaringin - Bekasi', 'S1 Ekonomi', '202101210004-profil.jpg'),
('202101210005', 'Pegawai', 'Dua', 5, 5, 12, 'pegawaidua@gmail.com', '08961111222', '2021-01-20 18:11:12', 1, '002', '123456789', 'Pegawai Dua', '123456789', '123456789', '', '3201013108930003', 'Pasar minggu - Jakarta', 'S1 Administrasi', '202101210005-profil.jpg'),
('202101210006', 'Pegawai', 'Tiga', 12, 7, 12, 'pegawaitiga@gmail.com', '089811113333', '2021-01-20 18:13:25', 1, '002', '123456789', 'Pegawai Tiga', '123456789', '123456789', '123456789', '3276021404940002', 'Blok M - Jakarta', 'S1 Akuntansi', '202101210006-profil.jpg'),
('202101210007', 'Pegawai', 'Empat', 13, 5, 12, 'pegawaiempat@gmail.com', '089675232093', '2021-01-20 18:15:51', 1, '002', '123456789', 'Pegawai Empat', '123456789', '123456789', '', '3276021404940003', 'Pondok gede - Bekasi', 'S1 Aktuaria', '202101210007-profil.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employe_status`
--

CREATE TABLE `employe_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(20) DEFAULT NULL,
  `status_desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employe_status`
--

INSERT INTO `employe_status` (`id`, `status_name`, `status_desc`) VALUES
(1, 'Staff', 'Status Staff Tetap'),
(3, 'Kontrak', 'Status pegawai kontrak dengan perusahaan langsung'),
(4, 'Outsourching', 'Status pegawai kontrak dengan pihak ketiga');

-- --------------------------------------------------------

--
-- Table structure for table `memo`
--

CREATE TABLE `memo` (
  `id` int(11) NOT NULL,
  `sender` varchar(20) DEFAULT NULL,
  `receiver` varchar(20) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `attachment` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `overtime_submission`
--

CREATE TABLE `overtime_submission` (
  `id_sub_ot` int(11) NOT NULL,
  `user` varchar(20) DEFAULT NULL,
  `approver` varchar(20) DEFAULT NULL,
  `submission_date` timestamp NULL DEFAULT NULL,
  `approve_date` timestamp NULL DEFAULT NULL,
  `implementation_date` timestamp NULL DEFAULT NULL,
  `user_desc` varchar(100) DEFAULT NULL,
  `approver_desc` varchar(100) DEFAULT NULL,
  `status_sub_ot` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `position_name` varchar(20) DEFAULT NULL,
  `position_desc` varchar(100) DEFAULT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `position_name`, `position_desc`, `level`) VALUES
(1, 'Kepala Divisi', 'Bertanggung jawab atas proses bisnis divisi', 2),
(2, 'Wakil Kepala Divisi', 'Bertanggung jawab dalam membantu kepala divisi', 3),
(3, 'HR', 'Bertanggung jawab dalam approve kepala divisi', 1),
(5, 'Staff Administrasi', 'Bertanggungjawab atas laporan administrasi', 3),
(6, 'Staff IT', 'Bertanggungjawab atas IT support', 3),
(7, 'Staff Keuangan', 'Bertanggungjawab atas laporan keuangan', 3);

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id_time` int(11) NOT NULL,
  `start` time NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id_time`, `start`, `status`) VALUES
(1, '07:01:59', 'in'),
(2, '16:01:59', 'out');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `allow` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nip`, `password`, `last_login`, `role`, `created_at`, `updated_at`, `deleted_at`, `allow`) VALUES
(11, '202101160001', '12345', NULL, NULL, '2021-01-16 07:55:34', '2021-01-17 04:30:09', NULL, 'Y'),
(12, '202101170001', '12345', NULL, NULL, '2021-01-17 07:34:16', '2021-01-20 10:42:32', NULL, 'Y'),
(16, '202101180001', '12345', NULL, NULL, '2021-01-18 08:03:51', '2021-01-20 10:59:46', NULL, 'Y'),
(17, '202101210001', '12345', NULL, NULL, '2021-01-20 18:00:12', '2021-01-20 18:05:59', NULL, 'Y'),
(18, '202101210002', '12345', NULL, NULL, '2021-01-20 18:03:22', '2021-01-20 18:06:02', NULL, 'Y'),
(19, '202101210003', '12345', NULL, NULL, '2021-01-20 18:05:38', '2021-01-20 18:06:06', NULL, 'Y'),
(20, '202101210004', '12345', NULL, NULL, '2021-01-20 18:08:33', NULL, NULL, 'N'),
(21, '202101210005', '12345', NULL, NULL, '2021-01-20 18:11:12', NULL, NULL, 'N'),
(22, '202101210006', '12345', NULL, NULL, '2021-01-20 18:13:25', NULL, NULL, 'N'),
(23, '202101210007', '12345', NULL, NULL, '2021-01-20 18:15:51', NULL, NULL, 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_attendance_employe_1` (`nip`);

--
-- Indexes for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`bank_code`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disc_submission`
--
ALTER TABLE `disc_submission`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `fk_disc_submission_employe_1` (`user`),
  ADD KEY `fk_disc_submission_employe_2` (`approver`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `fk_employe_position_1` (`position`),
  ADD KEY `fk_employe_division_1` (`division`),
  ADD KEY `fk_employe_employe_status_1` (`status`),
  ADD KEY `fk_employe_bank_account_1` (`bank_code`);

--
-- Indexes for table `employe_status`
--
ALTER TABLE `employe_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_memo_employe_1` (`sender`),
  ADD KEY `fk_memo_employe_2` (`receiver`);

--
-- Indexes for table `overtime_submission`
--
ALTER TABLE `overtime_submission`
  ADD PRIMARY KEY (`id_sub_ot`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id_time`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_employe_1` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `disc_submission`
--
ALTER TABLE `disc_submission`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employe_status`
--
ALTER TABLE `employe_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `overtime_submission`
--
ALTER TABLE `overtime_submission`
  MODIFY `id_sub_ot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id_time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_attendance_employe_1` FOREIGN KEY (`nip`) REFERENCES `employe` (`nip`);

--
-- Constraints for table `disc_submission`
--
ALTER TABLE `disc_submission`
  ADD CONSTRAINT `fk_disc_submission_employe_1` FOREIGN KEY (`user`) REFERENCES `employe` (`nip`),
  ADD CONSTRAINT `fk_disc_submission_employe_2` FOREIGN KEY (`approver`) REFERENCES `employe` (`nip`);

--
-- Constraints for table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `fk_employe_bank_account_1` FOREIGN KEY (`bank_code`) REFERENCES `bank_account` (`bank_code`),
  ADD CONSTRAINT `fk_employe_division_1` FOREIGN KEY (`division`) REFERENCES `division` (`id`),
  ADD CONSTRAINT `fk_employe_employe_status_1` FOREIGN KEY (`status`) REFERENCES `employe_status` (`id`),
  ADD CONSTRAINT `fk_employe_position_1` FOREIGN KEY (`position`) REFERENCES `position` (`id`);

--
-- Constraints for table `memo`
--
ALTER TABLE `memo`
  ADD CONSTRAINT `fk_memo_employe_1` FOREIGN KEY (`sender`) REFERENCES `employe` (`nip`),
  ADD CONSTRAINT `fk_memo_employe_2` FOREIGN KEY (`receiver`) REFERENCES `employe` (`nip`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_employe_1` FOREIGN KEY (`nip`) REFERENCES `employe` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
