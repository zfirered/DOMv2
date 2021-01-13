-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 11:03 AM
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
(1, '11190002', '2020-12-07', '08:00:18', NULL, NULL, NULL),
(2, '11190002', '2020-11-30', '22:59:26', NULL, NULL, NULL),
(3, '11190003', '2020-12-17', NULL, '22:01:19', NULL, NULL),
(4, '11190587', '2020-12-19', NULL, '22:28:18', NULL, NULL);

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
(1, 'Cuti Bersama', 'Red', '2021-01-01 17:52:56', '2021-01-01 17:52:56', '2021-01-01 17:52:56', '2021-01-01 17:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `disc_submission`
--

CREATE TABLE `disc_submission` (
  `id` int(11) NOT NULL,
  `user` varchar(20) DEFAULT NULL,
  `approver` varchar(20) DEFAULT NULL,
  `submission_for` varchar(20) DEFAULT NULL,
  `submission_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `approve_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `implementation_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `user_desc` varchar(20) DEFAULT NULL,
  `approver_desc` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disc_submission`
--

INSERT INTO `disc_submission` (`id`, `user`, `approver`, `submission_for`, `submission_date`, `approve_date`, `implementation_date`, `user_desc`, `approver_desc`, `status`) VALUES
(1, '11190002', '11190003', 'Sakit', '2021-01-02 08:58:41', '2021-01-02 08:58:41', '2021-01-04 08:58:41', 'Sakit flu', 'Diizinkan', 'Y');

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
(5, 'MAP', 'Divisi yang menangani pengadaan');

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

INSERT INTO `employe` (`nip`, `first_name`, `last_name`, `division`, `position`, `email`, `no_telp`, `join_date`, `status`, `bank_code`, `bank_no`, `bank_account`, `bpjs_ks`, `bpjs_tk`, `insurance`, `ktp`, `address`, `education`, `foto`) VALUES
('11190002', 'Ahmad', 'Nurjati', 4, 2, 'ajeng@gmail.com', '089653834999', '2020-12-06 07:26:22', 1, '002', '096501011604999', 'Ajeng Nurhapsari', '0001454326999', '0001454327999', '9999999999999', '32760214049409999', 'Jakarta', 'S1 Ekonomi', 'user7-128x128.jpg'),
('11190003', 'Ihsan', 'Bagus', 5, 2, 'adrian@gmail.com', '089653834333', '2020-12-07 16:30:13', 1, '002', '096501011604333', 'Adrian', '0001454326333', '0001454327333', '9999999999333', '32760214049403333', 'Bogor', 'D3 Akutansi', 'user8-128x128.jpg'),
('11190004', 'Abdur', 'Rozak', 4, 2, 'rozak@gmail.com', '089653831444', '2020-12-21 14:26:58', 1, '002', '096501011604444', 'Abdur Rozak', '0001454326444', '0001454327444', '9999999999444', '32760214049409444', 'Bekasi', 'D3 Akutansi', 'user2-160x160.jpg'),
('11190587', 'Ardi', 'Nurdin', 3, 1, 'ardinurdin89@gmail.com', '089653834136', '2020-12-06 07:21:49', 1, '002', '096501011604534', 'Ardi Nurdin', '0001454326918', '0001454327018', '9999999999888', '3276021404940001', 'Depok', 'S1 Sistem Informasi', 'user6-128x128.jpg');

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
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `thumbnail` varchar(20) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
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
(3, 'Human Resource', 'Bertanggung jawab dalam approve kepala divisi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `id` int(11) NOT NULL,
  `submission_name` varchar(20) DEFAULT NULL,
  `submission_desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subsidy`
--

CREATE TABLE `subsidy` (
  `id` int(11) NOT NULL,
  `subsidy_name` varchar(20) DEFAULT NULL,
  `nominal` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '07:00:59', 'in'),
(2, '16:00:59', 'out');

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
(3, '11190587', '12345', NULL, NULL, '2020-12-06 07:21:49', '2021-01-02 04:50:25', NULL, 'Y'),
(4, '11190002', '12345', NULL, NULL, '2020-12-06 07:26:22', '2020-12-06 07:51:23', NULL, 'N'),
(6, '11190003', '12345', NULL, NULL, '2020-12-07 16:30:13', NULL, NULL, 'N'),
(7, '11190004', '12345', NULL, NULL, '2020-12-21 14:26:58', NULL, NULL, 'N');

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`),
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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_news_employe_1` (`created_by`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subsidy`
--
ALTER TABLE `subsidy`
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
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `disc_submission`
--
ALTER TABLE `disc_submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employe_status`
--
ALTER TABLE `employe_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subsidy`
--
ALTER TABLE `subsidy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id_time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_employe_1` FOREIGN KEY (`created_by`) REFERENCES `employe` (`nip`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_employe_1` FOREIGN KEY (`nip`) REFERENCES `employe` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
