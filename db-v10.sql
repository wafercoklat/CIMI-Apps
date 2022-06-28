-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.24-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table cakra2022.active_users
CREATE TABLE IF NOT EXISTS `active_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel cakra2022.active_users: ~0 rows (lebih kurang)

-- membuang struktur untuk table cakra2022.apps_information
CREATE TABLE IF NOT EXISTS `apps_information` (
  `id` bigint(20) DEFAULT NULL,
  `Versi` varchar(50) DEFAULT NULL,
  `Company` varchar(50) DEFAULT NULL,
  `Detail` varchar(50) DEFAULT NULL,
  `Last_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel cakra2022.apps_information: ~0 rows (lebih kurang)
INSERT INTO `apps_information` (`id`, `Versi`, `Company`, `Detail`, `Last_update`) VALUES
	(1, '1.4.10.095', 'PT Cakraindo Mitra Internasional', '2021', '2022-06-24 00:00:00');

-- membuang struktur untuk table cakra2022.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `createdBy` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modifyBy` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=807 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel cakra2022.customers: ~806 rows (lebih kurang)
INSERT INTO `customers` (`id`, `code`, `customername`, `alamat`, `type`, `aktif`, `createdBy`, `modifyBy`, `created_at`, `updated_at`) VALUES
	(1, 'CUST-0001', 'ALING TBB', '', '', 'Y', '', NULL, NULL, NULL),
	(2, 'CUST-0002', 'ATI FREIGHT PTE. LTD.', '', '', 'Y', '', NULL, NULL, NULL),
	(3, 'CUST-0003', 'BLACKLIGHT FILM', '', '', 'Y', '', NULL, NULL, NULL),
	(4, 'CUST-0004', 'BP. AYONG', '', '', 'Y', '', NULL, NULL, NULL),
	(5, 'CUST-0005', 'BP. AAN', '', '', 'Y', '', NULL, NULL, NULL),
	(6, 'CUST-0006', 'BP. ACE', '', '', 'Y', '', NULL, NULL, NULL),
	(7, 'CUST-0007', 'BP. ACUI', '', '', 'Y', '', NULL, NULL, NULL),
	(8, 'CUST-0008', 'BP. AHAI', '', '', 'Y', '', NULL, NULL, NULL),
	(9, 'CUST-0009', 'BP. AIK RUSLI', '', '', 'Y', '', NULL, NULL, NULL),
	(10, 'CUST-0010', 'BP. ALIANG', '', '', 'Y', '', NULL, NULL, NULL),
	(11, 'CUST-0011', 'BP. ALIONG', '', '', 'Y', '', NULL, NULL, NULL),
	(12, 'CUST-0012', 'BP. APHENG', '', '', 'Y', '', NULL, NULL, NULL),
	(13, 'CUST-0013', 'BP. ASIANG', '', '', 'Y', '', NULL, NULL, NULL),
	(14, 'CUST-0014', 'BP. ASIONG', '', '', 'Y', '', NULL, NULL, NULL),
	(15, 'CUST-0015', 'BP. ASUN / GODWIN', '', '', 'Y', '', NULL, NULL, NULL),
	(16, 'CUST-0016', 'BP. ATIAM', '', '', 'Y', '', NULL, NULL, NULL),
	(17, 'CUST-0017', 'BP. ATIONG', '', '', 'Y', '', NULL, NULL, NULL),
	(18, 'CUST-0018', 'BP. AWI', '', '', 'Y', '', NULL, NULL, NULL),
	(19, 'CUST-0019', 'BP. BAGO', '', '', 'Y', '', NULL, NULL, NULL),
	(20, 'CUST-0020', 'BP. CHARLES', '', '', 'Y', '', NULL, NULL, NULL),
	(21, 'CUST-0021', 'BP. CIPTO', '', '', 'Y', '', NULL, NULL, NULL),
	(22, 'CUST-0022', 'BP. DARWIN', '', '', 'Y', '', NULL, NULL, NULL),
	(23, 'CUST-0023', 'BP. EVAN', '', '', 'Y', '', NULL, NULL, NULL),
	(24, 'CUST-0024', 'BP.  HAJI JOKO', '', '', 'Y', '', NULL, NULL, NULL),
	(25, 'CUST-0025', 'BP. HERRY', '', '', 'Y', '', NULL, NULL, NULL),
	(26, 'CUST-0026', 'BP. IMRON', '', '', 'Y', '', NULL, NULL, NULL),
	(27, 'CUST-0027', 'BP. JAKSON', '', '', 'Y', '', NULL, NULL, NULL),
	(28, 'CUST-0028', 'BP. JIMMY', '', '', 'Y', '', NULL, NULL, NULL),
	(29, 'CUST-0029', 'BP. JONI', '', '', 'Y', '', NULL, NULL, NULL),
	(30, 'CUST-0030', 'BP. KARDI', '', '', 'Y', '', NULL, NULL, NULL),
	(31, 'CUST-0031', 'BP. LISON', '', '', 'Y', '', NULL, NULL, NULL),
	(32, 'CUST-0032', 'BP. MUSTOFA', '', '', 'Y', '', NULL, NULL, NULL),
	(33, 'CUST-0033', 'BP. PRASETYO', '', '', 'Y', '', NULL, NULL, NULL),
	(34, 'CUST-0034', 'BP. RUDI', '', '', 'Y', '', NULL, NULL, NULL),
	(35, 'CUST-0035', 'BP. RUDY JANTO', '', '', 'Y', '', NULL, NULL, NULL),
	(36, 'CUST-0036', 'BP.  SAEFON ', '', '', 'Y', '', NULL, NULL, NULL),
	(37, 'CUST-0037', 'BP. SARDI', '', '', 'Y', '', NULL, NULL, NULL),
	(38, 'CUST-0038', 'BP. INDRA', '', '', 'Y', '', NULL, NULL, NULL),
	(39, 'CUST-0039', 'BP.  SISWANTO', '', '', 'Y', '', NULL, NULL, NULL),
	(40, 'CUST-0040', 'BP. SUNKIET (A)', '', '', 'Y', '', NULL, NULL, NULL),
	(41, 'CUST-0041', 'BP. SUSANTO', '', '', 'Y', '', NULL, NULL, NULL),
	(42, 'CUST-0042', 'BP. TEKPIAO', '', '', 'Y', '', NULL, NULL, NULL),
	(43, 'CUST-0043', 'BP. THAMRIN', '', '', 'Y', '', NULL, NULL, NULL),
	(44, 'CUST-0044', 'VERRY', '', '', 'Y', '', NULL, NULL, NULL),
	(45, 'CUST-0045', 'BP. WILLIAM', '', '', 'Y', '', NULL, NULL, NULL),
	(46, 'CUST-0046', 'BP. WISNU', '', '', 'Y', '', NULL, NULL, NULL),
	(47, 'CUST-0047', 'BP. YONGKIM', '', '', 'Y', '', NULL, NULL, NULL),
	(48, 'CUST-0048', 'BP. YOPIE', '', '', 'Y', '', NULL, NULL, NULL),
	(49, 'CUST-0049', 'CASH', '', '', 'Y', '', NULL, NULL, NULL),
	(50, 'CUST-0050', 'CV. AGUNG JAYA MAKMUR', '', '', 'Y', '', NULL, NULL, NULL),
	(51, 'CUST-0051', 'CV. ARTHA METRO OIL', '', '', 'Y', '', NULL, NULL, NULL),
	(52, 'CUST-0052', 'CV. BAYU SARANA ABADI', '', '', 'Y', '', NULL, NULL, NULL),
	(53, 'CUST-0053', 'CV. DUTA MARINE LOGISTIC', '', '', 'Y', '', NULL, NULL, NULL),
	(54, 'CUST-0054', 'CV. INFINITY CHEMICAL', '', '', 'Y', '', NULL, NULL, NULL),
	(55, 'CUST-0055', 'CV. KARETINDO JAYA', '', '', 'Y', '', NULL, NULL, NULL),
	(56, 'CUST-0056', 'CV. NAGA MAS', '', '', 'Y', '', NULL, NULL, NULL),
	(57, 'CUST-0057', 'CV. SINAR KHATULISTIWA', '', '', 'Y', '', NULL, NULL, NULL),
	(58, 'CUST-0058', 'CV. SMART SUKSES MANDIRI', '', '', 'Y', '', NULL, NULL, NULL),
	(59, 'CUST-0059', 'GOLGON', '', '', 'Y', '', NULL, NULL, NULL),
	(60, 'CUST-0060', 'IBU ALING', '', '', 'Y', '', NULL, NULL, NULL),
	(61, 'CUST-0061', 'IBU ASUAN', '', '', 'Y', '', NULL, NULL, NULL),
	(62, 'CUST-0062', 'IBU HUSNA ENNA', '', '', 'Y', '', NULL, NULL, NULL),
	(63, 'CUST-0063', 'IBU LISI', '', '', 'Y', '', NULL, NULL, NULL),
	(64, 'CUST-0064', 'IBU PAULINE', '', '', 'Y', '', NULL, NULL, NULL),
	(65, 'CUST-0065', 'IBU SHANTI', '', '', 'Y', '', NULL, NULL, NULL),
	(66, 'CUST-0066', 'IBU SUSAN', '', '', 'Y', '', NULL, NULL, NULL),
	(67, 'CUST-0067', 'IRWAN TJIPTO', '', '', 'Y', '', NULL, NULL, NULL),
	(68, 'CUST-0068', 'LAUREN', '', '', 'Y', '', NULL, NULL, NULL),
	(69, 'CUST-0069', 'MELLY', '', '', 'Y', '', NULL, NULL, NULL),
	(70, 'CUST-0070', 'MR. CHEN', '', '', 'Y', '', NULL, NULL, NULL),
	(71, 'CUST-0071', 'PT. CRODA INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(72, 'CUST-0072', 'MR. KIM', '', '', 'Y', '', NULL, NULL, NULL),
	(73, 'CUST-0073', 'PT. 3PE', '', '', 'Y', '', NULL, NULL, NULL),
	(74, 'CUST-0074', 'AGRI OILS PTE, LTD', '', '', 'Y', '', NULL, NULL, NULL),
	(75, 'CUST-0075', 'PT. ALKINDO MITRARAYA', '', '', 'Y', '', NULL, NULL, NULL),
	(76, 'CUST-0076', 'PT. AMAN WORLD LOGISTIC', '', '', 'Y', '', NULL, NULL, NULL),
	(77, 'CUST-0077', 'PT. ANDAMO ALTA UNIVERSAL', '', '', 'Y', '', NULL, NULL, NULL),
	(78, 'CUST-0078', 'PT. ANUGERAH MAJU PRIMA', '', '', 'Y', '', NULL, NULL, NULL),
	(79, 'CUST-0079', 'PT. ARISTEK HIGHPOLYMER', '', '', 'Y', '', NULL, NULL, NULL),
	(80, 'CUST-0080', 'PT. ARTHAMAS SEJAHTERA MULIA', '', '', 'Y', '', NULL, NULL, NULL),
	(81, 'CUST-0081', 'PT. ASIANAGRO AGUNG JAYA', '', '', 'Y', '', NULL, NULL, NULL),
	(82, 'CUST-0082', 'PT. ASIATIC PERSADA', '', '', 'Y', '', NULL, NULL, NULL),
	(83, 'CUST-0083', 'PT. ASTARI NIAGARA INTERNASIONAL', '', '', 'Y', '', NULL, NULL, NULL),
	(84, 'CUST-0084', 'PT. AVIA AVIAN', '', '', 'Y', '', NULL, NULL, NULL),
	(85, 'CUST-0085', 'PT. BAHTERA LAUTAN INTAN', '', '', 'Y', '', NULL, NULL, NULL),
	(86, 'CUST-0086', 'PT. BAKRIE SUMATERA PLANTATIONS, TBK', '', '', 'Y', '', NULL, NULL, NULL),
	(87, 'CUST-0087', 'PT. BANGUN PANCA SARANA ABADI', '', '', 'Y', '', NULL, NULL, NULL),
	(88, 'CUST-0088', 'PT. BASF CARE CHEMICALS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(89, 'CUST-0089', 'PT. BASF INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(90, 'CUST-0090', 'PT. BATARA ELOK SEMESTA TERPADU', '', '', 'Y', '', NULL, NULL, NULL),
	(91, 'CUST-0091', 'PT. BEIJING DAZHENG PLASTIC INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(92, 'CUST-0092', 'PT. BERKAT JAYA SUKSES', '', '', 'Y', '', NULL, NULL, NULL),
	(93, 'CUST-0093', 'PT. BERKAT SAWIT UTAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(94, 'CUST-0094', 'PT. BHANDA GHARA REKSA', '', '', 'Y', '', NULL, NULL, NULL),
	(95, 'CUST-0095', 'PT. BINTANG TENERA', '', '', 'Y', '', NULL, NULL, NULL),
	(96, 'CUST-0096', 'PT. BONANZA MEGAH', '', '', 'Y', '', NULL, NULL, NULL),
	(97, 'CUST-0097', 'PT. BUDI NABATI PERKASA', '', '', 'Y', '', NULL, NULL, NULL),
	(98, 'CUST-0098', 'PT. BUMI LAUT TRANS', '', '', 'Y', '', NULL, NULL, NULL),
	(99, 'CUST-0099', 'PT. BUMITANGERANG MESINDOTAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(100, 'CUST-0100', 'PT. CAHAYA KURNIA PERMAI', '', '', 'Y', '', NULL, NULL, NULL),
	(101, 'CUST-0101', 'PT. CAKRAINDO MEDAN', '', '', 'Y', '', NULL, NULL, NULL),
	(102, 'CUST-0102', 'PT. CAKRAINDO SURABAYA', '', '', 'Y', '', NULL, NULL, NULL),
	(103, 'CUST-0103', 'PT. CASTROL INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(104, 'CUST-0104', 'PT. CENTA BRASINDO ABADI CHEMICAL INDUSTR', '', '', 'Y', '', NULL, NULL, NULL),
	(105, 'CUST-0105', 'PT. CHAMPION KURNIA DJAJA TECHNOLOGIES', '', '', 'Y', '', NULL, NULL, NULL),
	(106, 'CUST-0106', 'PT. CISADANE RAYA CHEMICALS', '', '', 'Y', '', NULL, NULL, NULL),
	(107, 'CUST-0107', 'PT. CITRA RESINS INDUSTRIES', '', '', 'Y', '', NULL, NULL, NULL),
	(108, 'CUST-0108', 'CLARIANT INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(109, 'CUST-0109', 'PT. CLP INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(110, 'CUST-0110', 'PT. CHOYANG MOPOLI SAMSUNG CHEMICAL INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(111, 'CUST-0111', 'PT. DAMCO', '', '', 'Y', '', NULL, NULL, NULL),
	(112, 'CUST-0112', 'PT. DARMEX BIOFUELS', '', '', 'Y', '', NULL, NULL, NULL),
	(113, 'CUST-0113', 'PT. DARMEX OIL & FATS', '', '', 'Y', '', NULL, NULL, NULL),
	(114, 'CUST-0114', 'PT. DELTA HIJAU ABADI', '', '', 'Y', '', NULL, NULL, NULL),
	(115, 'CUST-0115', 'PT. DINUO INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(116, 'CUST-0116', 'PT. DONGSUNG JAKARTA', '', '', 'Y', '', NULL, NULL, NULL),
	(117, 'CUST-0117', 'PT. ECOGREEN OLEOCHEMICALS', '', '', 'Y', '', NULL, NULL, NULL),
	(118, 'CUST-0118', 'PT. ENERGI BAHARU LESTARI', '', '', 'Y', '', NULL, NULL, NULL),
	(119, 'CUST-0119', 'PT. ESA ZONA EKSPRES', '', '', 'Y', '', NULL, NULL, NULL),
	(120, 'CUST-0120', 'PT. ETERNAL BUANA CHEMICAL INDUSTRIES', '', '', 'Y', '', NULL, NULL, NULL),
	(121, 'CUST-0121', 'PT. EVONIK SUMI ASIH', '', '', 'Y', '', NULL, NULL, NULL),
	(122, 'CUST-0122', 'PT. GAJAH TUNGGAL TBK', '', '', 'Y', '', NULL, NULL, NULL),
	(123, 'CUST-0123', 'PT. GOLDEN SUMATERA', '', '', 'Y', '', NULL, NULL, NULL),
	(124, 'CUST-0124', 'PT. GOLDEN UNION OIL', '', '', 'Y', '', NULL, NULL, NULL),
	(125, 'CUST-0125', 'PT. GRACE SPECIALTY CHEMMICALS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(126, 'CUST-0126', 'PT. GRAHA SARANA METAL', '', '', 'Y', '', NULL, NULL, NULL),
	(127, 'CUST-0127', 'PT. HASIL BUMI PRIMA', '', '', 'Y', '', NULL, NULL, NULL),
	(128, 'CUST-0128', 'PT. HENRISON INTI PERSADA', '', '', 'Y', '', NULL, NULL, NULL),
	(129, 'CUST-0129', 'PT. HUMA INDAH MEKAR', '', '', 'Y', '', NULL, NULL, NULL),
	(130, 'CUST-0130', 'PT. IDEMITSU LUBE TECHNO INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(131, 'CUST-0131', 'PT. INDOCHEMICAL CITRA KIMIA', '', '', 'Y', '', NULL, NULL, NULL),
	(132, 'CUST-0132', 'PT. INDO VEGETABLE OIL INDUSTRI', '', '', 'Y', '', NULL, NULL, NULL),
	(133, 'CUST-0133', 'PT. INFRA INTERNASIONAL', '', '', 'Y', '', NULL, NULL, NULL),
	(134, 'CUST-0134', 'PT. INHIL SARIMAS KELAPA', '', '', 'Y', '', NULL, NULL, NULL),
	(135, 'CUST-0135', 'PT. INKOMAS LESTARI', '', '', 'Y', '', NULL, NULL, NULL),
	(136, 'CUST-0136', 'PT. INNO-WANGSA OILS & FATS', '', '', 'Y', '', NULL, NULL, NULL),
	(137, 'CUST-0137', 'PT. INTAN SEGARA', '', '', 'Y', '', NULL, NULL, NULL),
	(138, 'CUST-0138', 'PT. INTI KEBUN SEJAHTERA', '', '', 'Y', '', NULL, NULL, NULL),
	(139, 'CUST-0139', 'PT. INVILON SAGITA', '', '', 'Y', '', NULL, NULL, NULL),
	(140, 'CUST-0140', 'PT. JAGAR PRIMA NUSANTARA', '', '', 'Y', '', NULL, NULL, NULL),
	(141, 'CUST-0141', 'PT. JENSHIANG NUSANTARA TEXTILECHEMICAL INDUSTRIAL', '', '', 'Y', '', NULL, NULL, NULL),
	(142, 'CUST-0142', 'PT. JUMBO POWER INTERNATIONAL', '', '', 'Y', '', NULL, NULL, NULL),
	(143, 'CUST-0143', 'PT. KAMADJAJA LOGISTIK', '', '', 'Y', '', NULL, NULL, NULL),
	(144, 'CUST-0144', 'PT. KAO INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(145, 'CUST-0145', 'PT. KAO INDONESIA CHEMICALS', '', '', 'Y', '', NULL, NULL, NULL),
	(146, 'CUST-0146', 'PT. KARYAINDAH ALAM SEJAHTERA', '', '', 'Y', '', NULL, NULL, NULL),
	(147, 'CUST-0147', 'PT. KARYA PRIMA PACIFIC', '', '', 'Y', '', NULL, NULL, NULL),
	(148, 'CUST-0148', 'PT. KELAMBIR JAYA', '', '', 'Y', '', NULL, NULL, NULL),
	(149, 'CUST-0149', 'PT. KAWAGUCHI KIMIA INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(150, 'CUST-0150', 'PT. KAYABA INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(151, 'CUST-0151', 'PT. LDC INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(152, 'CUST-0152', 'PT. LG ELECTRONICS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(153, 'CUST-0153', 'PT. LIMA PERMATA TATA', '', '', 'Y', '', NULL, NULL, NULL),
	(154, 'CUST-0154', 'PT. LION WINGS', '', '', 'Y', '', NULL, NULL, NULL),
	(155, 'CUST-0155', 'PT. LOMAC INTERNATIONAL INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(156, 'CUST-0156', 'PT. MANE INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(157, 'CUST-0157', 'PT. MAJU ASRI JAYA UTAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(158, 'CUST-0158', 'PT. MALIDAS STERILINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(159, 'CUST-0159', 'PT. MARGA CIPTA SELARAS', '', '', 'Y', '', NULL, NULL, NULL),
	(160, 'CUST-0160', 'PT. MARGA UTAMA KIRANATARA', '', '', 'Y', '', NULL, NULL, NULL),
	(161, 'CUST-0161', 'PT. MATSUMOTOYUSHI INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(162, 'CUST-0162', 'PT. MEDISAFE TECHNOLOGIES', '', '', 'Y', '', NULL, NULL, NULL),
	(163, 'CUST-0163', 'PT. MEKAR CEMPIANG RAJABRANA', '', '', 'Y', '', NULL, NULL, NULL),
	(164, 'CUST-0164', 'PT. MITRA BAHARI LOGISTICS', '', '', 'Y', '', NULL, NULL, NULL),
	(165, 'CUST-0165', 'PT. MITSUI INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(166, 'CUST-0166', 'PT. MONAGRO KIMIA', '', '', 'Y', '', NULL, NULL, NULL),
	(167, 'CUST-0167', 'PT. MOP / SEMBAWANG MARINE AND TRADING', '', '', 'Y', '', NULL, NULL, NULL),
	(168, 'CUST-0168', 'PT. MORESCO INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(169, 'CUST-0169', 'PT. MULYA ADHI PARAMITA', '', '', 'Y', '', NULL, NULL, NULL),
	(170, 'CUST-0170', 'PT. MULTI COMMODITY INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(171, 'CUST-0171', 'PT. MULTI GUNA GAS', '', '', 'Y', '', NULL, NULL, NULL),
	(172, 'CUST-0172', 'PT. MULTI INDOMANDIRI', '', '', 'Y', '', NULL, NULL, NULL),
	(173, 'CUST-0173', 'PT. MULTI NABATI SULAWESI', '', '', 'Y', '', NULL, NULL, NULL),
	(174, 'CUST-0174', 'PT. MULTIMAS NABATI ASAHAN', '', '', 'Y', '', NULL, NULL, NULL),
	(175, 'CUST-0175', 'PT. MULYO SAKTI', '', '', 'Y', '', NULL, NULL, NULL),
	(176, 'CUST-0176', 'PT. MUSIM MAS', '', '', 'Y', '', NULL, NULL, NULL),
	(177, 'CUST-0177', 'PT. MUSIM MAS - FUJI', '', '', 'Y', '', NULL, NULL, NULL),
	(178, 'CUST-0178', 'PT. NIPPON SHOKUBAI INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(179, 'CUST-0179', 'PT. NIPSEA PAINT & CHEMICALS', '', '', 'Y', '', NULL, NULL, NULL),
	(180, 'CUST-0180', 'PT. NUBIKA JAYA', '', '', 'Y', '', NULL, NULL, NULL),
	(181, 'CUST-0181', 'PT. NUPLEX RAUNG RESINS', '', '', 'Y', '', NULL, NULL, NULL),
	(182, 'CUST-0182', 'PT. PABRIK KERTAS TJIWI KIMA TBK', '', '', 'Y', '', NULL, NULL, NULL),
	(183, 'CUST-0183', 'PT. PACIFIC LUBRITAMA INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(184, 'CUST-0184', 'PT. PACINESIA CHEMICAL INDUSTRY', '', '', 'Y', '', NULL, NULL, NULL),
	(185, 'CUST-0185', 'PT. PALEM SEGAR LESTARI', '', '', 'Y', '', NULL, NULL, NULL),
	(186, 'CUST-0186', 'PT. PARVA CANDELA', '', '', 'Y', '', NULL, NULL, NULL),
	(187, 'CUST-0187', 'PT. PELITA ABADI SENTOSA', '', '', 'Y', '', NULL, NULL, NULL),
	(188, 'CUST-0188', 'PT. PELITA AGUNG AGRINDUSTRI', '', '', 'Y', '', NULL, NULL, NULL),
	(189, 'CUST-0189', 'PT. PENTA KIMIA INTERNASIONAL', '', '', 'Y', '', NULL, NULL, NULL),
	(190, 'CUST-0190', 'PT. PERMATA HIJAU GROUP', '', '', 'Y', '', NULL, NULL, NULL),
	(191, 'CUST-0191', 'PT. PERMATA HIJAU PALM OLEO', '', '', 'Y', '', NULL, NULL, NULL),
	(192, 'CUST-0192', 'PT. PEROKSIDA INDONESIA PRATAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(193, 'CUST-0193', 'PT. PERTAMINA (PERSERO)', '', '', 'Y', '', NULL, NULL, NULL),
	(194, 'CUST-0194', 'PT. PERTAMINA LUBRICANTS', '', '', 'Y', '', NULL, NULL, NULL),
	(195, 'CUST-0195', 'PT. PINDO DELI PULP AND PAPER MILLS', '', '', 'Y', '', NULL, NULL, NULL),
	(196, 'CUST-0196', 'PT. PINI JAYA INDUSTRY', '', '', 'Y', '', NULL, NULL, NULL),
	(197, 'CUST-0197', 'PT. PINTU MAS MULIA KIMIA', '', '', 'Y', '', NULL, NULL, NULL),
	(198, 'CUST-0198', 'PT. POLYCHEM INDONESIA Tbk', '', '', 'Y', '', NULL, NULL, NULL),
	(199, 'CUST-0199', 'PT. PRISCOLIN', '', '', 'Y', '', NULL, NULL, NULL),
	(200, 'CUST-0200', 'PT. PULCRA CHEMICALS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(201, 'CUST-0201', 'PT. PUNCAK GUNUNG MAS', '', '', 'Y', '', NULL, NULL, NULL),
	(202, 'CUST-0202', 'PT. PUPUK KUJANG', '', '', 'Y', '', NULL, NULL, NULL),
	(203, 'CUST-0203', 'PT. PUTRA BAJA DELI', '', '', 'Y', '', NULL, NULL, NULL),
	(204, 'CUST-0204', 'PT. PUTRA INDONESIA SEJAHTERA', '', '', 'Y', '', NULL, NULL, NULL),
	(205, 'CUST-0205', 'PT. RANCANG TIRTA WAHANA', '', '', 'Y', '', NULL, NULL, NULL),
	(206, 'CUST-0206', 'PT. RC GREASE & LUBRICANTS', '', '', 'Y', '', NULL, NULL, NULL),
	(207, 'CUST-0207', 'PT. RIKEN INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(208, 'CUST-0208', 'PT. ROLIMEX KIMIA NUSAMAS', '', '', 'Y', '', NULL, NULL, NULL),
	(209, 'CUST-0209', 'PT. SANNO PERKASA INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(210, 'CUST-0210', 'PT. SAMUDERA PASIFIC MAJU', '', '', 'Y', '', NULL, NULL, NULL),
	(211, 'CUST-0211', 'PT. SARI MAS PERMAI', '', '', 'Y', '', NULL, NULL, NULL),
	(212, 'CUST-0212', 'PT. SARI SARANA KIMIATAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(213, 'CUST-0213', 'PT. SAYAP MAS UTAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(214, 'CUST-0214', 'PT. SEALINE', '', '', 'Y', '', NULL, NULL, NULL),
	(215, 'CUST-0215', 'PT. SEPARINDO INDUSTRY', '', '', 'Y', '', NULL, NULL, NULL),
	(216, 'CUST-0216', 'PT. SHARP ELECTRONICS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(217, 'CUST-0217', 'PT.  SHINTO PAINT MANUFACTURING INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(218, 'CUST-0218', 'PT. SINAR BARU LOGISTIK', '', '', 'Y', '', NULL, NULL, NULL),
	(219, 'CUST-0219', 'PT. SINTONG SARI UNION', '', '', 'Y', '', NULL, NULL, NULL),
	(220, 'CUST-0220', 'PT. SMART GLOVE INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(221, 'CUST-0221', 'PT. SINAR MAS AGRO RESOURCES AND TECHNOLOGY TBK. (SMART, TBK)', '', '', 'Y', '', NULL, NULL, NULL),
	(222, 'CUST-0222', 'PT. SOCI MAS', '', '', 'Y', '', NULL, NULL, NULL),
	(223, 'CUST-0223', 'PT. SUMI ASIH', '', '', 'Y', '', NULL, NULL, NULL),
	(224, 'CUST-0224', 'PT. SUNWAY TREK MASINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(225, 'CUST-0225', 'PT.  SUGIMURA CHEMICAL INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(226, 'CUST-0226', 'PT. SWARNA ARGO NUSA', '', '', 'Y', '', NULL, NULL, NULL),
	(227, 'CUST-0227', 'PT. SYNERGY OIL NUSANTARA', '', '', 'Y', '', NULL, NULL, NULL),
	(228, 'CUST-0228', 'PT. TANIMAS EDIBLE OIL', '', '', 'Y', '', NULL, NULL, NULL),
	(229, 'CUST-0229', 'PT. TANIMAS SOAP INDUSTRIES', '', '', 'Y', '', NULL, NULL, NULL),
	(230, 'CUST-0230', 'PT. TITIAN ABADI LESTARI', '', '', 'Y', '', NULL, NULL, NULL),
	(231, 'CUST-0231', 'PT. TPIL', '', '', 'Y', '', NULL, NULL, NULL),
	(232, 'CUST-0232', 'PT. TRANS CONTINDO LESTARI', '', '', 'Y', '', NULL, NULL, NULL),
	(233, 'CUST-0233', 'PT. TRINSEO MATERIALS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(234, 'CUST-0234', 'PT. TRITUNGGAL MULTICHEMICALS', '', '', 'Y', '', NULL, NULL, NULL),
	(235, 'CUST-0235', 'PT. TROPICAL ACID OIL', '', '', 'Y', '', NULL, NULL, NULL),
	(236, 'CUST-0236', 'PT. TUNAS BARU LAMPUNG, TBK', '', '', 'Y', '', NULL, NULL, NULL),
	(237, 'CUST-0237', 'PT. UNGGUL INDAH CAHAYA TBK', '', '', 'Y', '', NULL, NULL, NULL),
	(238, 'CUST-0238', 'PT. UNGGUL INDAH INVESTAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(239, 'CUST-0239', 'PT. UNILEVER INDONESIA Tbk', '', '', 'Y', '', NULL, NULL, NULL),
	(240, 'CUST-0240', 'PT. UNILEVER OLEOCHEMICAL INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(241, 'CUST-0241', 'PT. UNION CONFECTIONARY', '', '', 'Y', '', NULL, NULL, NULL),
	(242, 'CUST-0242', 'PT. UNITED ROPE', '', '', 'Y', '', NULL, NULL, NULL),
	(243, 'CUST-0243', 'PT. VAN OORD INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(244, 'CUST-0244', 'PT. VEOLIA WATER TECHNOLOGIES INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(245, 'CUST-0245', 'PT. VVF INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(246, 'CUST-0246', 'PT. WILMAR BIOENERGI INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(247, 'CUST-0247', 'PT. WILMAR CAHAYA INDONESIA, TBK', '', '', 'Y', '', NULL, NULL, NULL),
	(248, 'CUST-0248', 'PT. WILMAR NABATI INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(249, 'CUST-0249', 'PT. WINGS SURYA', '', '', 'Y', '', NULL, NULL, NULL),
	(250, 'CUST-0250', 'QINGDAO BLT', '', '', 'Y', '', NULL, NULL, NULL),
	(251, 'CUST-0251', 'QINGDAO LAF', '', '', 'Y', '', NULL, NULL, NULL),
	(252, 'CUST-0252', 'RAMINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(253, 'CUST-0253', 'TRIFLEET LEASING (THE NETHERLANDS) B.V.', '', '', 'Y', '', NULL, NULL, NULL),
	(254, 'CUST-0254', 'UNION', '', '', 'Y', '', NULL, NULL, NULL),
	(255, 'CUST-0255', 'PT. CHEIL JEDANG SUPERFEED', '', '', 'Y', '', NULL, NULL, NULL),
	(256, 'CUST-0256', 'NIPPON CONCEPT SINGAPORE PTE LTD', '', '', 'Y', '', NULL, NULL, NULL),
	(257, 'CUST-0257', 'PT. UDAYA ANUGERAH ABADI', '', '', 'Y', '', NULL, NULL, NULL),
	(258, 'CUST-0258', 'PT. MONDELEZ INDO MANUFACTURING', '', '', 'Y', '', NULL, NULL, NULL),
	(259, 'CUST-0259', 'E-WAY ALLIANCE (INTERNATIONAL) PTE LTD', '', '', 'Y', '', NULL, NULL, NULL),
	(260, 'CUST-0260', 'BP. ATAK', '', '', 'Y', '', NULL, NULL, NULL),
	(261, 'CUST-0261', 'PT. EKADHARMA INTERNATIONAL, TBK', '', '', 'Y', '', NULL, NULL, NULL),
	(262, 'CUST-0262', 'PT. GOLDEN SARI', '', '', 'Y', '', NULL, NULL, NULL),
	(263, 'CUST-0263', 'Stolt nielsen (s ) pte ltd', '', '', 'Y', '', NULL, NULL, NULL),
	(264, 'CUST-0264', 'BulkGlobal Logistic Limited', '', '', 'Y', '', NULL, NULL, NULL),
	(265, 'CUST-0265', 'Ace Prima Resources', '', '', 'Y', '', NULL, NULL, NULL),
	(266, 'CUST-0266', 'PT. SHCP INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(267, 'CUST-0267', 'PT. DCC INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(268, 'CUST-0268', 'CHEMINEX PTE LTD', '', '', 'Y', '', NULL, NULL, NULL),
	(269, 'CUST-0269', 'PT. INAWAN CHEMTEX SUKSES ABADI', '', '', 'Y', '', NULL, NULL, NULL),
	(270, 'CUST-0270', 'PT. MITRAPAK ERAMANDIRI', '', '', 'Y', '', NULL, NULL, NULL),
	(271, 'CUST-0271', 'PT. BELAWANDELI CHEMICAL INDUSTRY ', '', '', 'Y', '', NULL, NULL, NULL),
	(272, 'CUST-0272', 'PT. PRIMANRU', '', '', 'Y', '', NULL, NULL, NULL),
	(273, 'CUST-0273', 'PT. MEGASETIA AGUNG KIMIA', '', '', 'Y', '', NULL, NULL, NULL),
	(274, 'CUST-0274', 'PT. LOGICOM SOLUTIONS', '', '', 'Y', '', NULL, NULL, NULL),
	(275, 'CUST-0275', 'PT. CEMERLANG ENERGI PERKASA', '', '', 'Y', '', NULL, NULL, NULL),
	(276, 'CUST-0276', 'CV Bina Mandiri', '', '', 'Y', '', NULL, NULL, NULL),
	(277, 'CUST-0277', 'Bp. Budi', '', '', 'Y', '', NULL, NULL, NULL),
	(278, 'CUST-0278', 'PT. DOW INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(279, 'CUST-0279', 'PT. PITAMAS INDONUSA', '', '', 'Y', '', NULL, NULL, NULL),
	(280, 'CUST-0280', 'Bp. Nardi', '', '', 'Y', '', NULL, NULL, NULL),
	(281, 'CUST-0281', 'PT. KHARISMA ASTRA NUSANTARA', '', '', 'Y', '', NULL, NULL, NULL),
	(282, 'CUST-0282', 'PT. KOFUKU PLASTIC INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(283, 'CUST-0283', 'PT. MARGACIPTA WIRASENTOSA', '', '', 'Y', '', NULL, NULL, NULL),
	(284, 'CUST-0284', 'PT. AIR LIQUIDE INDONESIA TEKNOLOGI ', '', '', 'Y', '', NULL, NULL, NULL),
	(285, 'CUST-0285', 'Bpk. Asiong', '', '', 'Y', '', NULL, NULL, NULL),
	(286, 'CUST-0286', 'PT. SINAR SYNO KIMIA', '', '', 'Y', '', NULL, NULL, NULL),
	(287, 'CUST-0287', 'PT. Samudera Karya Niaga', '', '', 'Y', '', NULL, NULL, NULL),
	(288, 'CUST-0288', 'PT. DONGSUH INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(289, 'CUST-0289', 'PT. ITOCHU INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(290, 'CUST-0290', 'PT. HOPAX INDONESIA ', '', '', 'Y', '', NULL, NULL, NULL),
	(291, 'CUST-0291', 'PT. RUDOLF POLYMERS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(292, 'CUST-0292', 'PT. SORINI TOWA BERLIAN CORPORINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(293, 'CUST-0293', 'PT. LAUTAN ORGANO WATER', '', '', 'Y', '', NULL, NULL, NULL),
	(294, 'CUST-0294', 'PT. DUA KUDA INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(295, 'CUST-0295', 'Bapak Aldy', '', '', 'Y', '', NULL, NULL, NULL),
	(296, 'CUST-0296', 'Ci Merry', '', '', 'Y', '', NULL, NULL, NULL),
	(297, 'CUST-0297', 'PT. JOTUN INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(298, 'CUST-0298', 'PT. INDO ASIA TIRTA MANUNGGAL', '', '', 'Y', '', NULL, NULL, NULL),
	(299, 'CUST-0299', 'PT. SARI AGROTAMA PERSADA', '', '', 'Y', '', NULL, NULL, NULL),
	(300, 'CUST-0300', 'PT. EVONIK INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(301, 'CUST-0301', 'PT. ZHONG BU ADHESIVE INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(302, 'CUST-0302', 'MR. NAKATANI', '', '', 'Y', '', NULL, NULL, NULL),
	(303, 'CUST-0303', 'PT. MCNS POLYURETHANES', '', '', 'Y', '', NULL, NULL, NULL),
	(304, 'CUST-0304', 'PT. TIGA GORGEOUS LOGISTIK', '', '', 'Y', '', NULL, NULL, NULL),
	(305, 'CUST-0305', 'MIWON COMMERCIAL, CO, LTD', '', '', 'Y', '', NULL, NULL, NULL),
	(306, 'CUST-0306', 'Bp. Iwan', '', '', 'Y', '', NULL, NULL, NULL),
	(307, 'CUST-0307', 'PT. WWRC INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(308, 'CUST-0308', 'PT. OG ASIA INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(309, 'CUST-0309', 'PT. JEBSEN JESSEN INGREDIENTS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(310, 'CUST-0310', 'PT. ALLNEX RESINS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(311, 'CUST-0311', 'PT. STARLOG INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(312, 'CUST-0312', 'PT. PHENOLIC', '', '', 'Y', '', NULL, NULL, NULL),
	(313, 'CUST-0313', 'PT. TRI-NET LOGISTICS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(314, 'CUST-0314', 'PT. PROCTER & GAMBLE OPERATIONS INDONESIA (P&G)', '', '', 'Y', '', NULL, NULL, NULL),
	(315, 'CUST-0315', 'PT. SPARINDO MUSTIKA', '', '', 'Y', '', NULL, NULL, NULL),
	(316, 'CUST-0316', 'PT. DOMAS AGROINTI PRIMA', '', '', 'Y', '', NULL, NULL, NULL),
	(317, 'CUST-0317', 'PT. TESCO ENERGY', '', '', 'Y', '', NULL, NULL, NULL),
	(318, 'CUST-0318', 'PT. ARTEMIS PRIMAVERA KEMINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(319, 'CUST-0319', 'PT. SINARMAS BIO ENERGY', '', '', 'Y', '', NULL, NULL, NULL),
	(320, 'CUST-0320', 'PT. RICH PRODUCTS MANUFACTURING INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(321, 'CUST-0321', 'PT. MULTI NABATI ASAHAN', '', '', 'Y', '', NULL, NULL, NULL),
	(322, 'CUST-0322', 'PT. FEDERAL FOOD INTERNUSA', '', '', 'Y', '', NULL, NULL, NULL),
	(323, 'CUST-0323', 'PT. POLYPLAST DWIPUTRA PRATAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(324, 'CUST-0324', 'PT. PHENOLIC PRIMA INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(325, 'CUST-0325', 'PT. TRANSCON INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(326, 'CUST-0326', 'PT. INDOCERA UTAMA PRECISI', '', '', 'Y', '', NULL, NULL, NULL),
	(327, 'CUST-0327', 'PT. HENKEL FOOTWEAR AND SPECIALITY ADHESIVES INFOR', '', '', 'Y', '', NULL, NULL, NULL),
	(328, 'CUST-0328', 'PT. TANKS STATION INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(329, 'CUST-0329', 'PT. LAUTAN  NATURAL KRIMERINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(330, 'CUST-0330', 'PT. VISICHEM INTIPRIMA', '', '', 'Y', '', NULL, NULL, NULL),
	(331, 'CUST-0331', 'PT. SILKARGO INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(332, 'CUST-0332', 'PT. IDEMITSU LUBE INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(333, 'CUST-0333', 'PT. MEGADUTA ARTHA MEGAH', '', '', 'Y', '', NULL, NULL, NULL),
	(334, 'CUST-0334', 'PT. DAYAGUNA MARITIM CARGOTAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(335, 'CUST-0335', 'BARNABAS ANUGERAH WANGIMAN', '', '', 'Y', '', NULL, NULL, NULL),
	(336, 'CUST-0336', 'PT. TOBATOTAL TRANSINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(337, 'CUST-0337', 'PT. AGROJAYA PERDANA', '', '', 'Y', '', NULL, NULL, NULL),
	(338, 'CUST-0338', 'PT. PURA BARUTAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(339, 'CUST-0339', 'PT. INDONESIA TORAY SYNTHETICS', '', '', 'Y', '', NULL, NULL, NULL),
	(340, 'CUST-0340', 'PT. SILKARGO INDONESIA - BANJARMASIN', '', '', 'Y', '', NULL, NULL, NULL),
	(341, 'CUST-0341', 'PT. ZENITH', '', '', 'Y', '', NULL, NULL, NULL),
	(342, 'CUST-0342', 'SURIACHEM SDN BHD', '', '', 'Y', '', NULL, NULL, NULL),
	(343, 'CUST-0343', 'Emery Oleochemicals (M) Sdn. Bhd', '', '', 'Y', '', NULL, NULL, NULL),
	(344, 'CUST-0344', 'PT. TRILESTARI URETAN', '', '', 'Y', '', NULL, NULL, NULL),
	(345, 'CUST-0345', 'PT. PT. MAHARDHIKA MULTI SARANA', '', '', 'Y', '', NULL, NULL, NULL),
	(346, 'CUST-0346', 'PT. INKON MULTI MANDIRI', '', '', 'Y', '', NULL, NULL, NULL),
	(347, 'CUST-0347', 'PT. SALIM IVOMAS PRATAMA TBK', '', '', 'Y', '', NULL, NULL, NULL),
	(348, 'CUST-0348', 'INNOVACION CONTENEDOR SDN BHD', '', '', 'Y', '', NULL, NULL, NULL),
	(349, 'CUST-0349', 'PT. AICA INDRIA', '', '', 'Y', '', NULL, NULL, NULL),
	(350, 'CUST-0350', 'PT.  RAJAWALI MEGAH SEMESTA', '', '', 'Y', '', NULL, NULL, NULL),
	(351, 'CUST-0351', 'BESTCHEM GROUP HOLDING CO LTD', '', '', 'Y', '', NULL, NULL, NULL),
	(352, 'CUST-0352', 'PT. PERFETTI VAN MELLE INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(353, 'CUST-0353', 'PT. VISI KEMI MITRATAMA ', '', '', 'Y', '', NULL, NULL, NULL),
	(354, 'CUST-0354', 'PT. WARNATAMA CEMERLANG ', '', '', 'Y', '', NULL, NULL, NULL),
	(355, 'CUST-0355', 'PT. PERUSAHAAN INDUSTRI CERES', '', '', 'Y', '', NULL, NULL, NULL),
	(356, 'CUST-0356', 'PT KENCANA HIJAU BINALESTARI', '', '', 'Y', '', NULL, NULL, NULL),
	(357, 'CUST-0357', 'STARLIGHT INTERCONTINENTAL PTE. LTD', '', '', 'Y', '', NULL, NULL, NULL),
	(358, 'CUST-0358', 'PT CARGILL TRADING INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(359, 'CUST-0359', 'PT. UNICOCO INDUSTRIES INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(360, 'CUST-0360', 'PT SAMCHEM PRASANDHA', '', '', 'Y', '', NULL, NULL, NULL),
	(361, 'CUST-0361', 'PT. PANCASAKTI PUTRA KENCANA', '', '', 'Y', '', NULL, NULL, NULL),
	(362, 'CUST-0362', 'PT. SYNTEGRA TECHNO INTERNATIONAL', '', '', 'Y', '', NULL, NULL, NULL),
	(363, 'CUST-0363', 'PT. OCEAN NETWORK EXPRESS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(364, 'CUST-0364', 'PT. OLEOCHEM & SOAP INDUSTRI', '', '', 'Y', '', NULL, NULL, NULL),
	(365, 'CUST-0365', 'PT. HARINDO KARYA GUNA', '', '', 'Y', '', NULL, NULL, NULL),
	(366, 'CUST-0366', 'YERIKHO LAMBUE', '', '', 'Y', '', NULL, NULL, NULL),
	(367, 'CUST-0367', 'SITI AISYAH', '', '', 'Y', '', NULL, NULL, NULL),
	(368, 'CUST-0368', 'ADE INDRA', '', '', 'Y', '', NULL, NULL, NULL),
	(369, 'CUST-0369', 'ERWIN', '', '', 'Y', '', NULL, NULL, NULL),
	(370, 'CUST-0370', 'NOVITA', '', '', 'Y', '', NULL, NULL, NULL),
	(371, 'CUST-0371', 'LENI', '', '', 'Y', '', NULL, NULL, NULL),
	(372, 'CUST-0372', 'RIFI HAMDANI', '', '', 'Y', '', NULL, NULL, NULL),
	(373, 'CUST-0373', 'JOKI MAHAPUTRA', '', '', 'Y', '', NULL, NULL, NULL),
	(374, 'CUST-0374', 'CORNELIUS PURBA', '', '', 'Y', '', NULL, NULL, NULL),
	(375, 'CUST-0375', 'KLANA PUTRA', '', '', 'Y', '', NULL, NULL, NULL),
	(376, 'CUST-0376', 'SUGITO', '', '', 'Y', '', NULL, NULL, NULL),
	(377, 'CUST-0377', 'YUDI SATYA PUTRA', '', '', 'Y', '', NULL, NULL, NULL),
	(378, 'CUST-0378', 'M AMIR', '', '', 'Y', '', NULL, NULL, NULL),
	(379, 'CUST-0379', 'YUDI APRIJA', '', '', 'Y', '', NULL, NULL, NULL),
	(380, 'CUST-0380', 'HERI SAPUTRA', '', '', 'Y', '', NULL, NULL, NULL),
	(381, 'CUST-0381', 'CHANDRA', '', '', 'Y', '', NULL, NULL, NULL),
	(382, 'CUST-0382', 'RAMADHANSYAH PUTRA SIREGAR', '', '', 'Y', '', NULL, NULL, NULL),
	(383, 'CUST-0383', 'YOSE RIZAL CHAN', '', '', 'Y', '', NULL, NULL, NULL),
	(384, 'CUST-0384', 'SESI NITA', '', '', 'Y', '', NULL, NULL, NULL),
	(385, 'CUST-0385', 'KHAIRUL FADLI', '', '', 'Y', '', NULL, NULL, NULL),
	(386, 'CUST-0386', 'YENNY', '', '', 'Y', '', NULL, NULL, NULL),
	(387, 'CUST-0387', 'MARINGAN SIHOTANG', '', '', 'Y', '', NULL, NULL, NULL),
	(388, 'CUST-0388', 'ABDUL RAZAB', '', '', 'Y', '', NULL, NULL, NULL),
	(389, 'CUST-0389', 'HENDRA', '', '', 'Y', '', NULL, NULL, NULL),
	(390, 'CUST-0390', 'ROSDIANA', '', '', 'Y', '', NULL, NULL, NULL),
	(391, 'CUST-0391', 'KENDEDES', '', '', 'Y', '', NULL, NULL, NULL),
	(392, 'CUST-0392', 'MASWITO PRANOTO AMD', '', '', 'Y', '', NULL, NULL, NULL),
	(393, 'CUST-0393', 'DEWI MAROLOP MARYANTI SIAGIAN', '', '', 'Y', '', NULL, NULL, NULL),
	(394, 'CUST-0394', 'BAMBANG KUSWOYO', '', '', 'Y', '', NULL, NULL, NULL),
	(395, 'CUST-0395', 'LENY', '', '', 'Y', '', NULL, NULL, NULL),
	(396, 'CUST-0396', 'SUGENG PRAMONO ', '', '', 'Y', '', NULL, NULL, NULL),
	(397, 'CUST-0397', 'NAZWA SARY', '', '', 'Y', '', NULL, NULL, NULL),
	(398, 'CUST-0398', 'PT. BLUELIGHT CONTINENTAL ABADI', '', '', 'Y', '', NULL, NULL, NULL),
	(399, 'CUST-0399', 'PT, ZONA ASIA FORWARDING', '', '', 'Y', '', NULL, NULL, NULL),
	(400, 'CUST-0400', 'SINARMAS CEPSA', '', '', 'Y', '', NULL, NULL, NULL),
	(401, 'CUST-0401', 'PT PADI HIJAU BUANA', '', '', 'Y', '', NULL, NULL, NULL),
	(402, 'CUST-0402', 'PT. LAUTAN KARYA NIAGA', '', '', 'Y', '', NULL, NULL, NULL),
	(403, 'CUST-0403', 'PT BERKAH EMAS SUMBER TERANG', '', '', 'Y', '', NULL, NULL, NULL),
	(404, 'CUST-0404', 'BP. AKIAN', '', '', 'Y', '', NULL, NULL, NULL),
	(405, 'CUST-0405', 'CATERINA KOESWADI', '', '', 'Y', '', NULL, NULL, NULL),
	(406, 'CUST-0406', 'PT. SARI KRESNA KIMIA', '', '', 'Y', '', NULL, NULL, NULL),
	(407, 'CUST-0407', 'PT. SERIM INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(408, 'CUST-0408', 'PT. HUNTSMAN INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(409, 'CUST-0409', 'BP APIN', '', '', 'Y', '', NULL, NULL, NULL),
	(410, 'CUST-0410', 'BP AHUA', '', '', 'Y', '', NULL, NULL, NULL),
	(411, 'CUST-0411', 'PT. LYMAN AGRO', '', '', 'Y', '', NULL, NULL, NULL),
	(412, 'CUST-0412', 'PT. PCM KIMIA INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(413, 'CUST-0413', 'Bp. AHIN', '', '', 'Y', '', NULL, NULL, NULL),
	(414, 'CUST-0414', 'PT. INDOSARANA LOKAPRATAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(415, 'CUST-0415', 'PT. PELOPOR CARGO NUSANTARA', '', '', 'Y', '', NULL, NULL, NULL),
	(416, 'CUST-0416', 'TML ( TAYLOR MINSTER LEASING )', '', '', 'Y', '', NULL, NULL, NULL),
	(417, 'CUST-0417', 'CAHAYA CANDLINDO CEMERLANG', '', '', 'Y', '', NULL, NULL, NULL),
	(418, 'CUST-0418', 'Bapak Efrison', '', '', 'Y', '', NULL, NULL, NULL),
	(419, 'CUST-0419', 'PT. AGRINDO SURYA ABADI', '', '', 'Y', '', NULL, NULL, NULL),
	(420, 'CUST-0420', 'PT SARI DUMAI SEJATI', '', '', 'Y', '', NULL, NULL, NULL),
	(421, 'CUST-0421', 'PT. BERDIKARI JAYA BERSAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(422, 'CUST-0422', 'DJD (DALIAN DJD INTERNATIONAL LOGISTICS)', '', '', 'Y', '', NULL, NULL, NULL),
	(423, 'CUST-0423', 'PT. LAUTAN LUAS TBK', '', '', 'Y', '', NULL, NULL, NULL),
	(424, 'CUST-0424', 'PT. TRITEGUH MANUNGGAL SEJATI', '', '', 'Y', '', NULL, NULL, NULL),
	(425, 'CUST-0425', 'PT. NABELIN INDONESIA ', '', '', 'Y', '', NULL, NULL, NULL),
	(426, 'CUST-0426', 'PT YUSEN LOGISTIC INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(427, 'CUST-0427', 'PT ROLIMEX KIMIA NUSAMAS', '', '', 'Y', '', NULL, NULL, NULL),
	(428, 'CUST-0428', 'PT. SPARTA PRIMA', '', '', 'Y', '', NULL, NULL, NULL),
	(429, 'CUST-0429', 'PT. PACIFIC TRANS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(430, 'CUST-0430', 'PT. BOZZETTO INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(431, 'CUST-0431', 'RIANA MADU SIHOMBING', '', '', 'Y', '', NULL, NULL, NULL),
	(432, 'CUST-0432', 'CINDY', '', '', 'Y', '', NULL, NULL, NULL),
	(433, 'CUST-0433', 'ADI', '', '', 'Y', '', NULL, NULL, NULL),
	(434, 'CUST-0434', 'MEIJI UTOMO', '', '', 'Y', '', NULL, NULL, NULL),
	(435, 'CUST-0435', 'FRANSISKA', '', '', 'Y', '', NULL, NULL, NULL),
	(436, 'CUST-0436', 'RIZIEP SONATA', '', '', 'Y', '', NULL, NULL, NULL),
	(437, 'CUST-0437', 'OXYDE CHEMICALS, INC', '', '', 'Y', '', NULL, NULL, NULL),
	(438, 'CUST-0438', 'PT. KAYU LAPIS INDONESIA ', '', '', 'Y', '', NULL, NULL, NULL),
	(439, 'CUST-0439', 'PT. MARUZEN SAMUDERA TAIHEIYO', '', '', 'Y', '', NULL, NULL, NULL),
	(440, 'CUST-0440', 'PT. PATRA TRADING', '', '', 'Y', '', NULL, NULL, NULL),
	(441, 'CUST-0441', 'PT. SINAR ALAM PERMAI', '', '', 'Y', '', NULL, NULL, NULL),
	(442, 'CUST-0442', 'RAFFLES SHIPPING INTERNATIONAL PTE LTD', '', '', 'Y', '', NULL, NULL, NULL),
	(443, 'CUST-0443', 'PT. CHEMICAL INDUSTRY TONGGOREJO ', '', '', 'Y', '', NULL, NULL, NULL),
	(444, 'CUST-0444', 'MARTHIN', '', '', 'Y', '', NULL, NULL, NULL),
	(445, 'CUST-0445', 'LELY YANTI', '', '', 'Y', '', NULL, NULL, NULL),
	(446, 'CUST-0446', 'ABINA', '', '', 'Y', '', NULL, NULL, NULL),
	(447, 'CUST-0447', 'PT. LOTTE CHEMICAL TITAN NUSANTARA', '', '', 'Y', '', NULL, NULL, NULL),
	(448, 'CUST-0448', 'PT. ATI FREIGHT LOGISTICS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(449, 'CUST-0449', 'KHAIRUL', '', '', 'Y', '', NULL, NULL, NULL),
	(450, 'CUST-0450', 'BULOG', '', '', 'Y', '', NULL, NULL, NULL),
	(451, 'CUST-0451', 'NOFA', '', '', 'Y', '', NULL, NULL, NULL),
	(452, 'CUST-0452', 'AHMAD YADI', '', '', 'Y', '', NULL, NULL, NULL),
	(453, 'CUST-0453', 'FC CHEMLOG SOLUTIONS PTE LTD', '', '', 'Y', '', NULL, NULL, NULL),
	(454, 'CUST-0454', 'KANDAR MADURA', '', '', 'Y', '', NULL, NULL, NULL),
	(455, 'CUST-0455', 'ECOGREEN OLEOCHEMICALS (S) PTE LTD ', '', '', 'Y', '', NULL, NULL, NULL),
	(456, 'CUST-0456', 'ELRICA HUTANTO', '', '', 'Y', '', NULL, NULL, NULL),
	(457, 'CUST-0457', 'JUVENTIA', '', '', 'Y', '', NULL, NULL, NULL),
	(458, 'CUST-0458', 'WAHYUDI', '', '', 'Y', '', NULL, NULL, NULL),
	(459, 'CUST-0459', 'TOGAR LAMBOK SIJABAT', '', '', 'Y', '', NULL, NULL, NULL),
	(460, 'CUST-0460', 'CAROLINE', '', '', 'Y', '', NULL, NULL, NULL),
	(461, 'CUST-0461', 'GOODRICH', '', '', 'Y', '', NULL, NULL, NULL),
	(462, 'CUST-0462', 'Palm Oleo SDN BHD', '', '', 'Y', '', NULL, NULL, NULL),
	(463, 'CUST-0463', 'PT. ASCC INTERNATIONAL INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(464, 'CUST-0464', 'PT. CIPTA KRIDA BAHARI', '', '', 'Y', '', NULL, NULL, NULL),
	(465, 'CUST-0465', 'PT SUMBER BAHAGIA MANDIRI', '', '', 'Y', '', NULL, NULL, NULL),
	(466, 'CUST-0466', 'Hengcheng International Supply Chain Co.Ltd', '', '', 'Y', '', NULL, NULL, NULL),
	(467, 'CUST-0467', 'RUDISAN JAYA', '', '', 'Y', '', NULL, NULL, NULL),
	(468, 'CUST-0468', 'PT. SNF POLYMER INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(469, 'CUST-0469', 'PT.BDP INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(470, 'CUST-0470', 'PT. MITRA ABADI MULIA', '', '', 'Y', '', NULL, NULL, NULL),
	(471, 'CUST-0471', 'PT. TRITAN UTAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(472, 'CUST-0472', 'PT. BAYAS BIOFUELS', '', '', 'Y', '', NULL, NULL, NULL),
	(473, 'CUST-0473', 'GUANZHOU INTERNATIONAL FREIGHT FORWARDING (SUZHOU)', '', '', 'Y', '', NULL, NULL, NULL),
	(474, 'CUST-0474', 'Ko Robin', '', '', 'Y', '', NULL, NULL, NULL),
	(475, 'CUST-0475', 'SURYA SALAM SIMATUPANG', '', '', 'Y', '', NULL, NULL, NULL),
	(476, 'CUST-0476', 'PT. NISSIN TRANSPORT INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(477, 'CUST-0477', 'Bp Pardi', '', '', 'Y', '', NULL, NULL, NULL),
	(478, 'CUST-0478', 'SHANGHAI BA-SHI YUEXIN LOGISTICS DEVELOPMENT CO.,L', '', '', 'Y', '', NULL, NULL, NULL),
	(479, 'CUST-0479', 'Bp. AYONG LILIN', '', '', 'Y', '', NULL, NULL, NULL),
	(480, 'CUST-0480', 'PT. PELAYARAN TRESNAMUDA SEJATI', '', '', 'Y', '', NULL, NULL, NULL),
	(481, 'CUST-0481', 'ELIDA TRESYA SIMANJUNTAK', '', '', 'Y', '', NULL, NULL, NULL),
	(482, 'CUST-0482', 'HOVONLY SIMBOLON', '', '', 'Y', '', NULL, NULL, NULL),
	(483, 'CUST-0483', 'GUSTIKA LUMBANTOBING', '', '', 'Y', '', NULL, NULL, NULL),
	(484, 'CUST-0484', 'EDWIN HARTADI LUBIS', '', '', 'Y', '', NULL, NULL, NULL),
	(485, 'CUST-0485', 'LENTRIANA MATANARI', '', '', 'Y', '', NULL, NULL, NULL),
	(486, 'CUST-0486', 'NIKITA LAURA SUMUAL', '', '', 'Y', '', NULL, NULL, NULL),
	(487, 'CUST-0487', 'YOLANDA MARGARETH SITOMPUL', '', '', 'Y', '', NULL, NULL, NULL),
	(488, 'CUST-0488', 'KARTIKA SARI', '', '', 'Y', '', NULL, NULL, NULL),
	(489, 'CUST-0489', 'EMMA TAMBUNAN', '', '', 'Y', '', NULL, NULL, NULL),
	(490, 'CUST-0490', 'NASRULLAH', '', '', 'Y', '', NULL, NULL, NULL),
	(491, 'CUST-0491', 'AFRIANITA DEWI', '', '', 'Y', '', NULL, NULL, NULL),
	(492, 'CUST-0492', 'RUMIA JULIYETI MANALU', '', '', 'Y', '', NULL, NULL, NULL),
	(493, 'CUST-0493', 'PRASPITA SAMOSIR', '', '', 'Y', '', NULL, NULL, NULL),
	(494, 'CUST-0494', 'MUHAMMAD NUR', '', '', 'Y', '', NULL, NULL, NULL),
	(495, 'CUST-0495', 'BAYU SYAHPUTRA', '', '', 'Y', '', NULL, NULL, NULL),
	(496, 'CUST-0496', 'SRI WAHYUNI', '', '', 'Y', '', NULL, NULL, NULL),
	(497, 'CUST-0497', 'YULY', '', '', 'Y', '', NULL, NULL, NULL),
	(498, 'CUST-0498', 'IPHAM HADI WIRATAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(499, 'CUST-0499', 'RIDUAN JESSE SINAGA', '', '', 'Y', '', NULL, NULL, NULL),
	(500, 'CUST-0500', 'PT. SUMBER KITA INDAH', '', '', 'Y', '', NULL, NULL, NULL),
	(501, 'CUST-0501', 'PT.  FORIN MAJU LOGISTIK.', '', '', 'Y', '', NULL, NULL, NULL),
	(502, 'CUST-0502', 'PT. REDEXINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(503, 'CUST-0503', 'PT. CLARIANT SPECIALTIES INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(504, 'CUST-0504', 'PT. MOLINDO RAYA INDUSTRIAL', '', '', 'Y', '', NULL, NULL, NULL),
	(505, 'CUST-0505', 'PT. TARUNACIPTA KENCANA', '', '', 'Y', '', NULL, NULL, NULL),
	(506, 'CUST-0506', 'HELMSMAN SOLO TEAM CO.,LTD ', '', '', 'Y', '', NULL, NULL, NULL),
	(507, 'CUST-0507', 'PT. ARCHROMA INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(508, 'CUST-0508', 'PT. SHOWA KOSAN INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(509, 'CUST-0509', 'PT. BARRY CALLEBAUT INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(510, 'CUST-0510', 'Bp. Rudyanto', '', '', 'Y', '', NULL, NULL, NULL),
	(511, 'CUST-0511', 'PT. KHARIS AGUNG PUTRA JAYA', '', '', 'Y', '', NULL, NULL, NULL),
	(512, 'CUST-0512', 'CV. SUMBER REJEKI ABADI', '', '', 'Y', '', NULL, NULL, NULL),
	(513, 'CUST-0513', 'PT. GELORA CITRA KIMIA ABADI', '', '', 'Y', '', NULL, NULL, NULL),
	(514, 'CUST-0514', 'CIMC INTERMODAL DEVELOPMENT CO,LTD', '', '', 'Y', '', NULL, NULL, NULL),
	(515, 'CUST-0515', 'PT. SALIM IVOMAS PRATAMA, TBK', '', '', 'Y', '', NULL, NULL, NULL),
	(516, 'CUST-0516', 'PT JASA USAHA LOGISTIK', '', '', 'Y', '', NULL, NULL, NULL),
	(517, 'CUST-0517', 'PT. ENERGI UNGGUL PERSADA', '', '', 'Y', '', NULL, NULL, NULL),
	(518, 'CUST-0518', 'PT. AGILITY INTERNATIONAL', '', '', 'Y', '', NULL, NULL, NULL),
	(519, 'CUST-0519', 'PT. KORMAN WAHANA TRANSINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(520, 'CUST-0520', 'PT. WIRA KUSUMA', '', '', 'Y', '', NULL, NULL, NULL),
	(521, 'CUST-0521', 'PT, TUNASSUMBER IDEAKREASI KIMIA', '', '', 'Y', '', NULL, NULL, NULL),
	(522, 'CUST-0522', 'PT. PURIMAS SASMITA', '', '', 'Y', '', NULL, NULL, NULL),
	(523, 'CUST-0523', 'PT. OASIS ANUGERAH KASIH', '', '', 'Y', '', NULL, NULL, NULL),
	(524, 'CUST-0524', 'PT. PANAH PERDANA LOGISINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(525, 'CUST-0525', 'PT. KLAMBIR JAYA', '', '', 'Y', '', NULL, NULL, NULL),
	(526, 'CUST-0526', 'OAK ETERNITY PTE.LTD.', '', '', 'Y', '', NULL, NULL, NULL),
	(527, 'CUST-0527', 'PT. INDOPHERIN JAYA', '', '', 'Y', '', NULL, NULL, NULL),
	(528, 'CUST-0528', 'PT. SZETO GLOBAL INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(529, 'CUST-0529', 'PT. LINTAS NIAGA JAYA', '', '', 'Y', '', NULL, NULL, NULL),
	(530, 'CUST-0530', 'PT. TRANS-PACIFIC PETROCHEMICAL INDOTAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(531, 'CUST-0531', 'MICHAEL', '', '', 'Y', '', NULL, NULL, NULL),
	(532, 'CUST-0532', 'CV KARYA MASINDO LESTARI', '', '', 'Y', '', NULL, NULL, NULL),
	(533, 'CUST-0533', 'PT. ECOGREEN OLEOCHEMICALS', '', '', 'Y', '', NULL, NULL, NULL),
	(534, 'CUST-0534', 'NRS - INTERFLOW', '', '', 'Y', '', NULL, NULL, NULL),
	(535, 'CUST-0535', 'PT. EMIRAD INTERNATIONAL LOGISTICS', '', '', 'Y', '', NULL, NULL, NULL),
	(536, 'CUST-0536', 'PT. SEACON LOGISTIC', '', '', 'Y', '', NULL, NULL, NULL),
	(537, 'CUST-0537', 'PT. BINA SETIA', '', '', 'Y', '', NULL, NULL, NULL),
	(538, 'CUST-0538', 'CV. MITRA AKBAR SEJAHTERA', '', '', 'Y', '', NULL, NULL, NULL),
	(539, 'CUST-0539', 'PT. AGRIPRIMA CIPTA PERSADA', '', '', 'Y', '', NULL, NULL, NULL),
	(540, 'CUST-0540', 'PT. INTERNUSA HASTA BUANA', '', '', 'Y', '', NULL, NULL, NULL),
	(541, 'CUST-0541', 'PT. PACIFIC PALMINDO INDUSTRI', '', '', 'Y', '', NULL, NULL, NULL),
	(542, 'CUST-0542', 'PT. INDOCHEMICAL CITRA KIMIA', '', '', 'Y', '', NULL, NULL, NULL),
	(543, 'CUST-0543', 'RUSMAN HARDJO', '', '', 'Y', '', NULL, NULL, NULL),
	(544, 'CUST-0544', 'PT. SINTONG ABADI', '', '', 'Y', '', NULL, NULL, NULL),
	(545, 'CUST-0545', 'PT. MITRA TANGKAS PRATAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(546, 'CUST-0546', 'CARONA DEVELOPMENT LIMITED', '', '', 'Y', '', NULL, NULL, NULL),
	(547, 'CUST-0547', 'PT. SAMUDRA BIRU CEMERLANG', '', '', 'Y', '', NULL, NULL, NULL),
	(548, 'CUST-0548', 'AAA OILS & FATS PTE LTD', '', '', 'Y', '', NULL, NULL, NULL),
	(549, 'CUST-0549', 'PT. SINERGI DWI PERKASA ', '', '', 'Y', '', NULL, NULL, NULL),
	(550, 'CUST-0550', 'PT. SWAN UTAMA LOGISTIK ', '', '', 'Y', '', NULL, NULL, NULL),
	(551, 'CUST-0551', 'PT. RANDSLINES INDONESIA ', '', '', 'Y', '', NULL, NULL, NULL),
	(552, 'CUST-0552', 'CV. PRIMA BERSAUDARA', '', '', 'Y', '', NULL, NULL, NULL),
	(553, 'CUST-0553', 'PT. SORINI AGRO ASIA CORPORINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(554, 'CUST-0554', 'PT. MAHAKARYA BINTANG GEMILANG', '', '', 'Y', '', NULL, NULL, NULL),
	(555, 'CUST-0555', 'PT. GCP APPLIED TECHNOLOGIES INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(556, 'CUST-0556', 'PT. WANA HIJAU SEMESTA', '', '', 'Y', '', NULL, NULL, NULL),
	(557, 'CUST-0557', 'PT. PALMA SATU', '', '', 'Y', '', NULL, NULL, NULL),
	(558, 'CUST-0558', 'PT. DOVER CHEMICAL', '', '', 'Y', '', NULL, NULL, NULL),
	(559, 'CUST-0559', 'PT. TRUKITA INOVASI MANDIRI', '', '', 'Y', '', NULL, NULL, NULL),
	(560, 'CUST-0560', 'PT. SURYA GADING PERMAI', '', '', 'Y', '', NULL, NULL, NULL),
	(561, 'CUST-0561', 'PT. CONDRO MOWO TRANS', '', '', 'Y', '', NULL, NULL, NULL),
	(562, 'CUST-0562', 'PT BUANA INDO KENCANA', '', '', 'Y', '', NULL, NULL, NULL),
	(563, 'CUST-0563', 'UD. PANCA BAN', '', '', 'Y', '', NULL, NULL, NULL),
	(564, 'CUST-0564', 'PT. SAMUDERA TRANS LOGISTICS', '', '', 'Y', '', NULL, NULL, NULL),
	(565, 'CUST-0565', 'BP. JONATHAN MALUKU', '', '', 'Y', '', NULL, NULL, NULL),
	(566, 'CUST-0566', 'PT. WAHANA CITRA NABATI', '', '', 'Y', '', NULL, NULL, NULL),
	(567, 'CUST-0567', 'PT. LAM SENG HANG INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(568, 'CUST-0568', 'PT. SURABAYA SHIPPING LINES', '', '', 'Y', '', NULL, NULL, NULL),
	(569, 'CUST-0569', 'PT. KIMIA FARMA SUNGWUN PHARMACOPIA', '', '', 'Y', '', NULL, NULL, NULL),
	(570, 'CUST-0570', 'PT. JOSEPH TRESNA KARYA', '', '', 'Y', '', NULL, NULL, NULL),
	(571, 'CUST-0571', 'PT. DUNIA EXPRESS TRANSINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(572, 'CUST-0572', 'PT. INDUSTRI NABATI LESTARI', '', '', 'Y', '', NULL, NULL, NULL),
	(573, 'CUST-0573', 'PT. ANUGRAH PUTRA KENCANA', '', '', 'Y', '', NULL, NULL, NULL),
	(574, 'CUST-0574', 'PT. AGRO KARYA BERSAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(575, 'CUST-0575', 'PT. MATA PELANGI CHEMINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(576, 'CUST-0576', 'YULI', '', '', 'Y', '', NULL, NULL, NULL),
	(577, 'CUST-0577', 'PT. INDORAMA POLYCHEM INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(578, 'CUST-0578', 'PT. INTERBENUA LOGISTINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(579, 'CUST-0579', 'PT. BUMITAMA GUNAJAYA ABADI', '', '', 'Y', '', NULL, NULL, NULL),
	(580, 'CUST-0580', 'BP.  ERLANGGA', '', '', 'Y', '', NULL, NULL, NULL),
	(581, 'CUST-0581', 'BP. HENDRA', '', '', 'Y', '', NULL, NULL, NULL),
	(582, 'CUST-0582', 'PT. KARUNIA UNGGUL SEMESTA', '', '', 'Y', '', NULL, NULL, NULL),
	(583, 'CUST-0583', 'PT. BASF DISTRIBUTION INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(584, 'CUST-0584', 'YADI', '', '', 'Y', '', NULL, NULL, NULL),
	(585, 'CUST-0585', 'PT. SEMPURNA DELTA KIRANA', '', '', 'Y', '', NULL, NULL, NULL),
	(586, 'CUST-0586', 'PT. SURYA JAYA PERKASA ', '', '', 'Y', '', NULL, NULL, NULL),
	(587, 'CUST-0587', 'PT. JUSTUS SAKTI RAYA', '', '', 'Y', '', NULL, NULL, NULL),
	(588, 'CUST-0588', 'PT. ANDALAS DWIPA ABADI', '', '', 'Y', '', NULL, NULL, NULL),
	(589, 'CUST-0589', 'PT. ARIA PERSADA INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(590, 'CUST-0590', 'PT. DABI BIOFUELS', '', '', 'Y', '', NULL, NULL, NULL),
	(591, 'CUST-0591', 'PT. HUR SALES INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(592, 'CUST-0592', 'PT Apical Kao Chemicals', '', '', 'Y', '', NULL, NULL, NULL),
	(593, 'CUST-0593', 'PT. JASINDO LINTASTAMA (SURABAYA)', '', '', 'Y', '', NULL, NULL, NULL),
	(594, 'CUST-0594', 'PT. INFINITY INDORAYA', '', '', 'Y', '', NULL, NULL, NULL),
	(595, 'CUST-0595', 'PT INDUSTRI INVILON SAGITA', '', '', 'Y', '', NULL, NULL, NULL),
	(596, 'CUST-0596', 'PT. BARTEX GLOBAL INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(597, 'CUST-0597', 'PT. Suntory Garuda Beverage', '', '', 'Y', '', NULL, NULL, NULL),
	(598, 'CUST-0598', 'PT. MENEMBUS BATAS', '', '', 'Y', '', NULL, NULL, NULL),
	(599, 'CUST-0599', 'EFRIZAL CHANDRA', '', '', 'Y', '', NULL, NULL, NULL),
	(600, 'CUST-0600', 'HERMAN', '', '', 'Y', '', NULL, NULL, NULL),
	(601, 'CUST-0601', 'JOHAN', '', '', 'Y', '', NULL, NULL, NULL),
	(602, 'CUST-0602', 'HASAN', '', '', 'Y', '', NULL, NULL, NULL),
	(603, 'CUST-0603', 'SUSILAWATI', '', '', 'Y', '', NULL, NULL, NULL),
	(604, 'CUST-0604', 'DJABAR CHANDRA', '', '', 'Y', '', NULL, NULL, NULL),
	(605, 'CUST-0605', 'PT. CIMI LOGISTICS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(606, 'CUST-0606', 'DESIANA', '', '', 'Y', '', NULL, NULL, NULL),
	(607, 'CUST-0607', 'LEGEND INTEGRATED LOSGISTICS SDN BHD', '', '', 'Y', '', NULL, NULL, NULL),
	(608, 'CUST-0608', 'PT. MIWON INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(609, 'CUST-0609', 'APICAL (MALAYSIA) SDN BHD', '', '', 'Y', '', NULL, NULL, NULL),
	(610, 'CUST-0610', 'PT. TIRTA WANA SEMESTA KENCANA', '', '', 'Y', '', NULL, NULL, NULL),
	(611, 'CUST-0611', 'PT. WIKA INTINUSA NIAGATAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(612, 'CUST-0612', 'PT. ANUGRAH KEKAL PLASTINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(613, 'CUST-0613', 'PT. TH INDO PLANTATIONS', '', '', 'Y', '', NULL, NULL, NULL),
	(614, 'CUST-0614', 'ZULFADHLI', '', '', 'Y', '', NULL, NULL, NULL),
	(615, 'CUST-0615', 'PT. PRIMUS SANUS COOKING OIL INDUSTRIAL (PT. PRISC', '', '', 'Y', '', NULL, NULL, NULL),
	(616, 'CUST-0616', 'PT. JX NIPPON OIL & ENERGY LUBRICANTS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(617, 'CUST-0617', 'PT. JASINDO JAYA PACIFIC', '', '', 'Y', '', NULL, NULL, NULL),
	(618, 'CUST-0618', 'PT. OMYA INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(619, 'CUST-0619', 'PT. CILIANDRA PERKASA', '', '', 'Y', '', NULL, NULL, NULL),
	(620, 'CUST-0620', 'PT. LINTAS MARITIM INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(621, 'CUST-0621', 'PT. KHATULISTIWA CIPTA AGENSINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(622, 'CUST-0622', 'PT. CARGILL INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(623, 'CUST-0623', 'PT. GLOBAL ECO CHEMICALS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(624, 'CUST-0624', 'PT. KARYA BAKTI METALASRI', '', '', 'Y', '', NULL, NULL, NULL),
	(625, 'CUST-0625', 'WIMAN', '', '', 'Y', '', NULL, NULL, NULL),
	(626, 'CUST-0626', 'PT. GLOBAL AMINES INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(627, 'CUST-0627', 'PT. DBG LOGISTIC INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(628, 'CUST-0628', 'PT. BRAID GROUP INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(629, 'CUST-0629', 'PT. KAN ISOTANK MANDIRI', '', '', 'Y', '', NULL, NULL, NULL),
	(630, 'CUST-0630', 'PT. SOJITZ INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(631, 'CUST-0631', 'Pacific Oleochemicals Sdn Bhd (64175-U) | Logistic', '', '', 'Y', '', NULL, NULL, NULL),
	(632, 'CUST-0632', 'PT. GEODIS WILSON INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(633, 'CUST-0633', 'PT. SINARINDO MEGANTARA', '', '', 'Y', '', NULL, NULL, NULL),
	(634, 'CUST-0634', 'PT. INTI MAS ABADI', '', '', 'Y', '', NULL, NULL, NULL),
	(635, 'CUST-0635', 'PT. PABRIK KERTAS TJIWI KIMIA TBK.', '', '', 'Y', '', NULL, NULL, NULL),
	(636, 'CUST-0636', 'ISO TANK MANAGEMENT PTE LTD', '', '', 'Y', '', NULL, NULL, NULL),
	(637, 'CUST-0637', 'PT. PETROCENTRAL', '', '', 'Y', '', NULL, NULL, NULL),
	(638, 'CUST-0638', 'YENNY (BLUELIGHT)', '', '', 'Y', '', NULL, NULL, NULL),
	(639, 'CUST-0639', 'PT. DIRGAHAYU VARIA CIPTA', '', '', 'Y', '', NULL, NULL, NULL),
	(640, 'CUST-0640', 'PT. TAPIAN NADENGGAN', '', '', 'Y', '', NULL, NULL, NULL),
	(641, 'CUST-0641', 'PT. INTERNUSA FOOD', '', '', 'Y', '', NULL, NULL, NULL),
	(642, 'CUST-0642', 'BP. OMAN', '', '', 'Y', '', NULL, NULL, NULL),
	(643, 'CUST-0643', 'CV. GAMPING MAS', '', '', 'Y', '', NULL, NULL, NULL),
	(644, 'CUST-0644', 'PT PAWITRA KIMIA KENCANA', '', '', 'Y', '', NULL, NULL, NULL),
	(645, 'CUST-0645', 'PT. ROYAL LOGISTICS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(646, 'CUST-0646', 'PT. PAWITRA KIMIA KENCANA', '', '', 'Y', '', NULL, NULL, NULL),
	(647, 'CUST-0647', 'MULTI COMMODITY INTERNATIONAL Pte, Ltd', '', '', 'Y', '', NULL, NULL, NULL),
	(648, 'CUST-0648', 'ADENAN', '', '', 'Y', '', NULL, NULL, NULL),
	(649, 'CUST-0649', 'PT. UNILEVER TRADING INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(650, 'CUST-0650', 'PT. PRIMATRANS JAYA EXPRESS', '', '', 'Y', '', NULL, NULL, NULL),
	(651, 'CUST-0651', 'PT. TEREOS FKS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(652, 'CUST-0652', 'PT. MULTI MITRA BARUNA', '', '', 'Y', '', NULL, NULL, NULL),
	(653, 'CUST-0653', 'PT. ROYAL FOODS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(654, 'CUST-0654', 'CV. CONTAINER INTERNATIONAL MARITIME SERVICES', '', '', 'Y', '', NULL, NULL, NULL),
	(655, 'CUST-0655', 'PT. OCEAN CENTRA FURNINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(656, 'CUST-0656', 'BUT. SARULLA OPERATIONS LTD', '', '', 'Y', '', NULL, NULL, NULL),
	(657, 'CUST-0657', 'JOSEP SINAGA', '', '', 'Y', '', NULL, NULL, NULL),
	(658, 'CUST-0658', 'PT. PARAGON TECHNOLOGY AND INNOVATION', '', '', 'Y', '', NULL, NULL, NULL),
	(659, 'CUST-0659', 'SUHENDI', '', '', 'Y', '', NULL, NULL, NULL),
	(660, 'CUST-0660', 'JESEK', '', '', 'Y', '', NULL, NULL, NULL),
	(661, 'CUST-0661', 'PT. MULTIGUNA INTERNATIONAL PERSADA', '', '', 'Y', '', NULL, NULL, NULL),
	(662, 'CUST-0662', 'PT. SUPER WAHANA TEHNO', '', '', 'Y', '', NULL, NULL, NULL),
	(663, 'CUST-0663', 'PT. K CARGO AGENCIES', '', '', 'Y', '', NULL, NULL, NULL),
	(664, 'CUST-0664', 'PT. PELAYARAN K.J MARINE', '', '', 'Y', '', NULL, NULL, NULL),
	(665, 'CUST-0665', 'PUSPA RATNA DEWI', '', '', 'Y', '', NULL, NULL, NULL),
	(666, 'CUST-0666', 'TORI', '', '', 'Y', '', NULL, NULL, NULL),
	(667, 'CUST-0667', 'PT. SMART, TBK', '', '', 'Y', '', NULL, NULL, NULL),
	(668, 'CUST-0668', 'CV NITTOPRIMA SUKSES ABADI', '', '', 'Y', '', NULL, NULL, NULL),
	(669, 'CUST-0669', 'PT. GANINDO OVERSEAS INTERNASIONAL', '', '', 'Y', '', NULL, NULL, NULL),
	(670, 'CUST-0670', 'PT. JATI PERKASA NUSANTARA', '', '', 'Y', '', NULL, NULL, NULL),
	(671, 'CUST-0671', 'PT. ANGKASA GRACIA MUKTI', '', '', 'Y', '', NULL, NULL, NULL),
	(672, 'CUST-0672', 'PT ANGJAYA SUMBER EMAS ABADI', '', '', 'Y', '', NULL, NULL, NULL),
	(673, 'CUST-0673', 'FAIRFREGHT LINES PTE, LTD', '', '', 'Y', '', NULL, NULL, NULL),
	(674, 'CUST-0674', 'PT. PESONA INTI RASA', '', '', 'Y', '', NULL, NULL, NULL),
	(675, 'CUST-0675', 'PT. SUMBER INDAH PERKASA ', '', '', 'Y', '', NULL, NULL, NULL),
	(676, 'CUST-0676', 'PT. BINASAWIT ABADIPRATAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(677, 'CUST-0677', 'JATI OLEO SDN BHD', '', '', 'Y', '', NULL, NULL, NULL),
	(678, 'CUST-0678', 'PT. NAGASE IMPOR-EKSPOR INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(679, 'CUST-0679', 'PT. CAHAYA ALAM SEJATI', '', '', 'Y', '', NULL, NULL, NULL),
	(680, 'CUST-0680', 'PT. NOAH LOGISTIK INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(681, 'CUST-0681', 'PT. RICHLAND  LOGISTICS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(682, 'CUST-0682', 'PT. CBC PRIMA', '', '', 'Y', '', NULL, NULL, NULL),
	(683, 'CUST-0683', 'CV. FIONIKA MANDIRI UTAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(684, 'CUST-0684', 'PT. SAWITAKARYA MANUNGGUL', '', '', 'Y', '', NULL, NULL, NULL),
	(685, 'CUST-0685', 'PT. KENCANA GRAHA PERMAI', '', '', 'Y', '', NULL, NULL, NULL),
	(686, 'CUST-0686', 'PT. SINAR ANTJOL', '', '', 'Y', '', NULL, NULL, NULL),
	(687, 'CUST-0687', 'CV. JAYA PRAMESWARI', '', '', 'Y', '', NULL, NULL, NULL),
	(688, 'CUST-0688', 'PT. KRESNA DUTA AGROINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(689, 'CUST-0689', 'PT. PETRONIKA', '', '', 'Y', '', NULL, NULL, NULL),
	(690, 'CUST-0690', 'PT. AGILITY', '', '', 'Y', '', NULL, NULL, NULL),
	(691, 'CUST-0691', 'PT. INDO PURECO PRATAMA', '', '', 'Y', '', NULL, NULL, NULL),
	(692, 'CUST-0692', 'PT. KORMAN WAHANA TRANSINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(693, 'CUST-0693', 'PT. RINTIS NABATI RAKSA', '', '', 'Y', '', NULL, NULL, NULL),
	(694, 'CUST-0694', 'PT. PRIMAXCEL INOVASI', '', '', 'Y', '', NULL, NULL, NULL),
	(695, 'CUST-0695', 'PT. PUMA LOGISTICS INTERNATIONAL ', '', '', 'Y', '', NULL, NULL, NULL),
	(696, 'CUST-0696', 'PETROWIDADA', '', '', 'Y', '', NULL, NULL, NULL),
	(697, 'CUST-0697', 'TAMBAL BAN RINGO', '', '', 'Y', '', NULL, NULL, NULL),
	(698, 'CUST-0698', 'YONGKIE LIM', '', '', 'Y', '', NULL, NULL, NULL),
	(699, 'CUST-0699', 'ABDUL HALIM', '', '', 'Y', '', NULL, NULL, NULL),
	(700, 'CUST-0700', 'PT GLOBAL EDERVIN BERKARYA', '', '', 'Y', '', NULL, NULL, NULL),
	(701, 'CUST-0701', 'PT. KARSAVICTA SATYA ', '', '', 'Y', '', NULL, NULL, NULL),
	(702, 'CUST-0702', 'PT. POSCO INTERNASIONAL INDONESIA ', '', '', 'Y', '', NULL, NULL, NULL),
	(703, 'CUST-0703', 'PT. PAPANDAYAN COCOA INDUSTRIES ', '', '', 'Y', '', NULL, NULL, NULL),
	(704, 'CUST-0704', 'PT. ENERGI SEJAHTERA MAS', '', '', 'Y', '', NULL, NULL, NULL),
	(705, 'CUST-0705', 'PT. BINA SINAR AMITY ', '', '', 'Y', '', NULL, NULL, NULL),
	(706, 'CUST-0706', 'CLP INTERNATIONAL PTE LTD', '', '', 'Y', '', NULL, NULL, NULL),
	(707, 'CUST-0707', 'PT. GALENIUM PHARMASIA LABORATORIES', '', '', 'Y', '', NULL, NULL, NULL),
	(708, 'CUST-0708', 'INNOVACIÃ“N CONTENEDOR', '', '', 'Y', '', NULL, NULL, NULL),
	(709, 'CUST-0709', 'PT. SOLID LOGISTICS', '', '', 'Y', '', NULL, NULL, NULL),
	(710, 'CUST-0710', 'PT. MITRA ALAM SEGAR', '', '', 'Y', '', NULL, NULL, NULL),
	(711, 'CUST-0711', 'ROYAL CARGO , INC', '', '', 'Y', '', NULL, NULL, NULL),
	(712, 'CUST-0712', 'PT. MITRA NIAGA PRATAMA SEJAHTRA', '', '', 'Y', '', NULL, NULL, NULL),
	(713, 'CUST-0713', 'PT. MILLENIUM TRANSPORTATION', '', '', 'Y', '', NULL, NULL, NULL),
	(714, 'CUST-0714', 'PT. JAYA SAMUDERA LOGISTIK', '', '', 'Y', '', NULL, NULL, NULL),
	(715, 'CUST-0715', 'PT. INTI MEGAH LOGISTIK', '', '', 'Y', '', NULL, NULL, NULL),
	(716, 'CUST-0716', 'CV. FERMASE INTI MULIA ', '', '', 'Y', '', NULL, NULL, NULL),
	(717, 'CUST-0717', 'PT. NYNAS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(718, 'CUST-0718', 'PT. POLARIS INTI PERSADA ', '', '', 'Y', '', NULL, NULL, NULL),
	(719, 'CUST-0719', 'MUSLIM ', '', '', 'Y', '', NULL, NULL, NULL),
	(720, 'CUST-0720', 'PT. SARI DUMAI OLEO ', '', '', 'Y', '', NULL, NULL, NULL),
	(721, 'CUST-0721', 'PT DANSPED LOGISTIK', '', '', 'Y', '', NULL, NULL, NULL),
	(722, 'CUST-0722', 'PT. KARACOCO NUCIFERA PRATAMA ', '', '', 'Y', '', NULL, NULL, NULL),
	(723, 'CUST-0723', 'PT ETEX BUILDING PERFORMANCE INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(724, 'CUST-0724', 'ROHMAN', '', '', 'Y', '', NULL, NULL, NULL),
	(725, 'CUST-0725', 'PT. GAP LOGISTICS', '', '', 'Y', '', NULL, NULL, NULL),
	(726, 'CUST-0726', 'PT. ECO PRIMA ENERGI ', '', '', 'Y', '', NULL, NULL, NULL),
	(727, 'CUST-0727', 'PT. ALAM MULYA ', '', '', 'Y', '', NULL, NULL, NULL),
	(728, 'CUST-0728', 'ACHMAD RIZAL', '', '', 'Y', '', NULL, NULL, NULL),
	(729, 'CUST-0729', 'CV. SURYA PERKASA ABADI', '', '', 'Y', '', NULL, NULL, NULL),
	(730, 'CUST-0730', 'PT. KYODO YUSHI LUBRICANTS TP INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(731, 'CUST-0731', 'MOCH. ABDUL HARIS  ', '', '', 'Y', '', NULL, NULL, NULL),
	(732, 'CUST-0732', 'PT. TIRTA SURYA RAYA', '', '', 'Y', '', NULL, NULL, NULL),
	(733, 'CUST-0733', 'PT. PATIWARE', '', '', 'Y', '', NULL, NULL, NULL),
	(734, 'CUST-0734', 'PT. WAWASAN KEBUN NUSANTARA', '', '', 'Y', '', NULL, NULL, NULL),
	(735, 'CUST-0735', 'PT. SUMATERA UNGGUL MAKMUR', '', '', 'Y', '', NULL, NULL, NULL),
	(736, 'CUST-0736', 'PT. GRAHA AGRO NUSANTARA', '', '', 'Y', '', NULL, NULL, NULL),
	(737, 'CUST-0737', 'PT. PERKEBUNAN ANAK NEGERI PASAMAN', '', '', 'Y', '', NULL, NULL, NULL),
	(738, 'CUST-0738', 'JEMASCO SINGAPORE', '', '', 'Y', '', NULL, NULL, NULL),
	(739, 'CUST-0739', 'PT. VOLAC WILMAR FEED INGEDIENTS INDONESIA ', '', '', 'Y', '', NULL, NULL, NULL),
	(740, 'CUST-0740', 'PT. NASCO', '', '', 'Y', '', NULL, NULL, NULL),
	(741, 'CUST-0741', 'H JOKO WEDI ', '', '', 'Y', '', NULL, NULL, NULL),
	(742, 'CUST-0742', 'PT. CEMINDO GEMILANG TBK ', '', '', 'Y', '', NULL, NULL, NULL),
	(743, 'CUST-0743', 'YOHANES DONY PRAYOGA ', '', '', 'Y', '', NULL, NULL, NULL),
	(744, 'CUST-0744', 'PT. CAHAYA SEKAR CARGO', '', '', 'Y', '', NULL, NULL, NULL),
	(745, 'CUST-0745', 'PT. SAMUDERA AGENCIES INDONESIA ', '', '', 'Y', '', NULL, NULL, NULL),
	(746, 'CUST-0746', 'PT. ALAM JAYA PERSADA ', '', '', 'Y', '', NULL, NULL, NULL),
	(747, 'CUST-0747', 'PT. JAVA TOHOKU INDUSTRIES', '', '', 'Y', '', NULL, NULL, NULL),
	(748, 'CUST-0748', 'PRESTIGIOUS SUPPLY CHAIN CO., LTD.', '', '', 'Y', '', NULL, NULL, NULL),
	(749, 'CUST-0749', 'PT. SEMUA BAHAGIA SEJAHTERA ', '', '', 'Y', '', NULL, NULL, NULL),
	(750, 'CUST-0750', 'PT. KARUNIA INDAH SEGAR', '', '', 'Y', '', NULL, NULL, NULL),
	(751, 'CUST-0751', 'CV. SIANTAR PEMATANG ', '', '', 'Y', '', NULL, NULL, NULL),
	(752, 'CUST-0752', 'TRIPLESTONE RESOURCES PTE.LTD', '', '', 'Y', '', NULL, NULL, NULL),
	(753, 'CUST-0753', 'PT. GONDO INTI PERSADA ', '', '', 'Y', '', NULL, NULL, NULL),
	(754, 'CUST-0754', 'SUDIK WIBISONO ', '', '', 'Y', '', NULL, NULL, NULL),
	(755, 'CUST-0755', 'ARI PRAMUDIYA', '', '', 'Y', '', NULL, NULL, NULL),
	(756, 'CUST-0756', 'PT. DAESANG INGREDIENTS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(757, 'CUST-0757', 'BILLY ARBANSYAH', '', '', 'Y', '', NULL, NULL, NULL),
	(758, 'CUST-0758', 'PT. SUMATRA BULKERS', '', '', 'Y', '', NULL, NULL, NULL),
	(759, 'CUST-0759', 'ZUL EFFENDI HASIBUAN', '', '', 'Y', '', NULL, NULL, NULL),
	(760, 'CUST-0760', 'PT. LAUTAN KARYA NIAGA (JAKARTA)', '', '', 'Y', '', NULL, NULL, NULL),
	(761, 'CUST-0761', 'PT. KUSUMA MUKTI REMAJA', '', '', 'Y', '', NULL, NULL, NULL),
	(762, 'CUST-0762', 'PT. SBI INTERNASIONAL INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(763, 'CUST-0763', 'PT. JASINDO LINTASTAMA (JAKARTA)', '', '', 'Y', '', NULL, NULL, NULL),
	(764, 'CUST-0764', 'PT. GLOBAL MARITIM LOGISTIK', '', '', 'Y', '', NULL, NULL, NULL),
	(765, 'CUST-0765', 'PT. SINAR INDO PRATAMA ( SINDO EXPRESS )', '', '', 'Y', '', NULL, NULL, NULL),
	(766, 'CUST-0766', 'PT. FARI JAYA PRATAMA ', '', '', 'Y', '', NULL, NULL, NULL),
	(767, 'CUST-0767', 'HMM Co.,Ltd C/O PT. Mitrarejeki Investa', '', '', 'Y', '', NULL, NULL, NULL),
	(768, 'CUST-0768', 'EVERGREEN LINE', '', '', 'Y', '', NULL, NULL, NULL),
	(769, 'CUST-0769', 'PT. KURHANZ TRANS', '', '', 'Y', '', NULL, NULL, NULL),
	(770, 'CUST-0770', 'PT. CHEM OIL INDONESIA ', '', '', 'Y', '', NULL, NULL, NULL),
	(771, 'CUST-0771', 'PT.TIGA SEKAWAN SUKSES EKSPRES', '', '', 'Y', '', NULL, NULL, NULL),
	(772, 'CUST-0772', 'PT. SEKURITI PRIMA INDO', '', '', 'Y', '', NULL, NULL, NULL),
	(773, 'CUST-0773', 'PT. KARUNIA ALAM SEGAR', '', '', 'Y', '', NULL, NULL, NULL),
	(774, 'CUST-0774', 'PT. SUMBER  HIJAU  UTAMA ', '', '', 'Y', '', NULL, NULL, NULL),
	(775, 'CUST-0775', 'PT. SUMBER HIJAU UTAMA ', '', '', 'Y', '', NULL, NULL, NULL),
	(776, 'CUST-0776', 'BIO OILS HUELVA,S.L', '', '', 'Y', '', NULL, NULL, NULL),
	(777, 'CUST-0777', 'PT.GIANT TRANSPORTER INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(778, 'CUST-0778', 'PT. PROGOSE RASSYA INDONESIA ', '', '', 'Y', '', NULL, NULL, NULL),
	(779, 'CUST-0779', 'PT. KEMIRA CHEMICALS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(780, 'CUST-0780', 'PT. OMNILOG WIJAYA LAKSANA ', '', '', 'Y', '', NULL, NULL, NULL),
	(781, 'CUST-0781', 'PT. KEMIRA CHEMICALS INDONESIA ', '', '', 'Y', '', NULL, NULL, NULL),
	(782, 'CUST-0782', 'PT. SOLVAY MANYAR ', '', '', 'Y', '', NULL, NULL, NULL),
	(783, 'CUST-0783', 'PT. INDO THAI COCO INVESTAMA ', '', '', 'Y', '', NULL, NULL, NULL),
	(784, 'CUST-0784', 'PT. SERASI SHIPPING INDONESIA ', '', '', 'Y', '', NULL, NULL, NULL),
	(785, 'CUST-0785', 'PT. ZURICH ASURANSI INDONESIA TBK', '', '', 'Y', '', NULL, NULL, NULL),
	(786, 'CUST-0786', 'CHOIRUL HUDA', '', '', 'Y', '', NULL, NULL, NULL),
	(787, 'CUST-0787', 'MOH. FAISOL', '', '', 'Y', '', NULL, NULL, NULL),
	(788, 'CUST-0788', 'PT. PUTRALIRIK DOMAS', '', '', 'Y', '', NULL, NULL, NULL),
	(789, 'CUST-0789', 'PT. SENTOSA ASIH MAKMUR', '', '', 'Y', '', NULL, NULL, NULL),
	(790, 'CUST-0790', 'PERMATA DUNIA SUKSES UTAMA ', '', '', 'Y', '', NULL, NULL, NULL),
	(791, 'CUST-0791', 'PT. DHANESWARA EKSPRES (DANEX)', '', '', 'Y', '', NULL, NULL, NULL),
	(792, 'CUST-0792', 'PT. SURABAYA BAHARI LOGISTINDO', '', '', 'Y', '', NULL, NULL, NULL),
	(793, 'CUST-0793', 'PT. SUMBER GRAHA SEJAHTERA', '', '', 'Y', '', NULL, NULL, NULL),
	(794, 'CUST-0794', 'STEVANI', '', '', 'Y', '', NULL, NULL, NULL),
	(795, 'CUST-0795', 'ABD ROHMAN ', '', '', 'Y', '', NULL, NULL, NULL),
	(796, 'CUST-0796', 'HELEN CARLIN', '', '', 'Y', '', NULL, NULL, NULL),
	(797, 'CUST-0797', 'PT. PUSAKA LINTAS SAMUDRA', '', '', 'Y', '', NULL, NULL, NULL),
	(798, 'CUST-0798', 'ALLNEX MALAYSIA SDN BHD ', '', '', 'Y', '', NULL, NULL, NULL),
	(799, 'CUST-0799', 'PT. BSA LOGISTICS INDONESIA', '', '', 'Y', '', NULL, NULL, NULL),
	(800, 'CUST-0800', 'PT. INDO REMPAH COMMODITIES', '', '', 'Y', '', NULL, NULL, NULL),
	(801, 'CUST-0801', 'JS UNION OIL & TRADING ', '', '', 'Y', '', NULL, NULL, NULL),
	(802, 'CUST-0802', 'PT. IWATANI INDUSTRIAL GAS INDONESIA ', '', '', 'Y', '', NULL, NULL, NULL),
	(803, 'CUST-0803', 'PT. ARISTEK HIGHPOLYMER ', '', '', 'Y', '', NULL, NULL, NULL),
	(804, 'CUST-0804', 'PT. ENERGI OLEO PERSADA ', '', '', 'Y', '', NULL, NULL, NULL),
	(805, 'CUST-0805', 'PT. SARI DUMAI OLEO ', '', '', 'Y', '', NULL, NULL, NULL),
	(806, 'CUST-0806', 'ASIA JAYA ELEKTRONIK MEDAN', '', '', 'Y', '', NULL, NULL, NULL);

-- membuang struktur untuk table cakra2022.dashboards
CREATE TABLE IF NOT EXISTS `dashboards` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel cakra2022.dashboards: ~0 rows (lebih kurang)

-- membuang struktur untuk table cakra2022.isotanks
CREATE TABLE IF NOT EXISTS `isotanks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plat_no` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kepemilikan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('NA','R','RT','BRO','NR') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'R',
  `createdBy` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modifyBy` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Colors` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `isotanks_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel cakra2022.isotanks: ~89 rows (lebih kurang)
INSERT INTO `isotanks` (`id`, `code`, `plat_no`, `deskripsi`, `kepemilikan`, `status`, `createdBy`, `modifyBy`, `created_at`, `updated_at`, `Colors`) VALUES
	(1, 'CIMU1702179', '132', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-03-13 05:09:18', '#585A78'),
	(2, 'CIMU0202179', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#185F90'),
	(3, 'CIMU1402171', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#6F4214'),
	(4, 'CIMU1502170', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#CD244C'),
	(5, 'CIMU1802178', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#3FCA3E'),
	(6, 'BONU0254394', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-26 03:23:11', '#FDDB09'),
	(7, 'CRKU8541598', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#180230'),
	(8, 'BONU0250676', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#D00437'),
	(9, 'CIMU0081760', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#4C1D82'),
	(10, 'CIMU0110175', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#3320F4'),
	(11, 'CIMU1107176', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#181C5B'),
	(12, 'CIMU2703170', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#B2AD9'),
	(13, 'CIMU0105902', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-25 21:35:56', '#722F50'),
	(14, 'CIMU1108172', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-26 08:10:23', '#709096'),
	(15, 'CIMU8601051', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#752ABD'),
	(16, 'CIMU1486249', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#A85925'),
	(17, 'CIMU1801037', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#2D086D'),
	(18, 'CIMU1801021', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#4D99B7'),
	(19, 'CIMU1801016', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#870027'),
	(20, 'CIMU1801079', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#6FB5B0'),
	(21, 'CIMU1801058', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#F100D2'),
	(22, 'CIMU1805053', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#E9095F'),
	(23, 'CIMU1805032', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#A9D736'),
	(24, 'CIMU1805027', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#9A02D2'),
	(25, 'CIMU1805080', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#F5A2B6'),
	(26, 'CIMU1805011', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#67DACB'),
	(27, 'OAKU1806054', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#286905'),
	(28, 'OAKU1806060', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#A7B229'),
	(29, 'OAKU1806028', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#3EA317'),
	(30, 'OAKU1806012', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#581ED7'),
	(31, 'OAKU1806033', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#E11416'),
	(32, 'OAKU1806049', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#88A7FD'),
	(33, 'OAKU1808036', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#2DD5E0'),
	(34, 'OAKU1808000', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#09B3E3'),
	(35, 'OAKU1808057', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#E844D3'),
	(36, 'OAKU1808062', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#AAF176'),
	(37, 'OAKU1808078', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#37FE20'),
	(38, 'OAKU1808139', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#D88836'),
	(39, 'OAKU1808144', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#92B92F'),
	(40, 'OAKU1808083', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#324DA6'),
	(41, 'OAKU1808041', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#E1B2BF'),
	(42, 'OAKU1808020', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#03C82C'),
	(43, 'OAKU1808015', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#50CEA0'),
	(44, 'OAKU1808123', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#4D7DD4'),
	(45, 'OAKU1808118', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#3574ED'),
	(46, 'OAKU1808102', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#8FB29E'),
	(47, 'OAKU1808099', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#02DCF4'),
	(48, 'EXFU5604472', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#8804BE'),
	(49, 'EXFU5604488', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#4D6F3D'),
	(50, 'EXFU5604493', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#01092B'),
	(51, 'EXFU5604507', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#1D7668'),
	(52, 'EXFU5604554', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#71B3EA'),
	(53, 'EXFU5604512', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#D57F53'),
	(54, 'EXFU5604549', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#5D2782'),
	(55, 'EXFU5604533', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#D986C4'),
	(56, 'EXFU5606855', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#511422'),
	(57, 'EXFU5606860', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#ADD622'),
	(58, 'EXFU5606840', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#685D24'),
	(59, 'EXFU5606834', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#E2D168'),
	(60, 'EXFU5604528', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#7B1AF5'),
	(61, 'EXFU5604560', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#5E8360'),
	(62, 'EXFU5610557', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#86ACC8'),
	(63, 'EXFU5610562', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#DD0380'),
	(64, 'EXFU5610578', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#E93646'),
	(65, 'EXFU5610583', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#BF8F7F'),
	(66, 'EXFU5610599', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#4DB222'),
	(67, 'EXFU5610602', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#D60180'),
	(68, 'EXFU5610639', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#ACCB6C'),
	(69, 'EXFU5610644', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#004ED8'),
	(70, 'BULU2100004', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-25 21:50:43', '#2F7B10'),
	(71, 'BULU2100149', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-26 08:09:06', '#C170B6'),
	(72, 'EXFU5610705', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#DDBF6'),
	(73, 'EXFU5610665', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#BD655E'),
	(74, 'EXFU5610670', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#7F5A93'),
	(75, 'EXFU5610618', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#6F5B70'),
	(76, 'EXFU5610686', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#C6C429'),
	(77, 'EXFU5610623', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#62D7C'),
	(78, 'EXFU5610691', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#FE6F7F'),
	(79, 'EXFU5610650', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#CBD1AF'),
	(80, 'EXFU5610710', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#628C71'),
	(81, 'EXFU5610726', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#2EEDA7'),
	(82, 'EXFU5610731', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#D49324'),
	(83, 'EXFU5610747', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#90CA94'),
	(84, 'EXFU5610752', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#9B1574'),
	(85, 'EXFU5610768', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#F023C'),
	(86, 'EXFU5610773', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#67EB21'),
	(87, 'EXFU5610789', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#CDF41'),
	(88, 'EXFU5610794', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#F6BA6'),
	(89, 'EXFU5610808', '', '', '', 'R', 'Admin', '', '2022-01-09 17:00:00', '2022-01-09 17:00:00', '#CFB94D');

-- membuang struktur untuk table cakra2022.karyawan
CREATE TABLE IF NOT EXISTS `karyawan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_form` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_cuti` float NOT NULL DEFAULT 0,
  `verif` int(11) DEFAULT 0,
  `verified_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified_by_id` int(11) DEFAULT NULL,
  `verifed_date` date DEFAULT NULL,
  `approved` enum('Y','P','R') COLLATE utf8mb4_unicode_ci DEFAULT 'P',
  `approve_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `void` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `void_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `void_date` date DEFAULT NULL,
  `counter` int(11) DEFAULT NULL,
  `cabang` enum('M','J','S','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel cakra2022.karyawan: ~3 rows (lebih kurang)
INSERT INTO `karyawan` (`id`, `no_form`, `date`, `created_by`, `total_cuti`, `verif`, `verified_by`, `verified_by_id`, `verifed_date`, `approved`, `approve_by`, `approve_date`, `created_at`, `updated_at`, `void`, `void_by`, `void_date`, `counter`, `cabang`, `type`) VALUES
	(1, 'HRD/CK/F0001/22', '2022-05-27', 'Riza', 1, 0, NULL, NULL, NULL, 'P', NULL, NULL, '2022-05-30 01:09:12', '2022-06-19 23:54:04', NULL, NULL, NULL, 1, 'M', 1),
	(2, 'HRD/IK/F0001/22', '2022-06-16', 'Riza', 0, 0, NULL, NULL, NULL, 'P', NULL, NULL, '2022-06-16 21:34:07', '2022-06-20 01:25:16', NULL, NULL, NULL, 1, 'M', 2),
	(3, 'HRD/IK/F0002/22', '2022-06-23', 'Riza', 0, 0, NULL, NULL, NULL, 'P', NULL, NULL, '2022-06-23 19:21:19', '2022-06-23 19:21:19', NULL, NULL, NULL, 2, 'M', 2);

-- membuang struktur untuk table cakra2022.karyawan_cuti
CREATE TABLE IF NOT EXISTS `karyawan_cuti` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_form` int(11) NOT NULL,
  `cuti_tahunan` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuti_diluar_tanggungan` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuti_khusus` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_cuti` float NOT NULL DEFAULT 0,
  `tgl_pengajuan_s` date DEFAULT NULL,
  `tgl_pengajuan_e` date DEFAULT NULL,
  `tgl_kembali_kerja` date DEFAULT NULL,
  `alasan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengganti_pic` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_pic` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuti_menikah_st` date DEFAULT NULL,
  `cuti_menikah_en` date DEFAULT NULL,
  `cuti_sblm_melahirkan_st` date DEFAULT NULL,
  `cuti_sblm_melahirkan_en` date DEFAULT NULL,
  `cuti_stlh_melahirkan_st` date DEFAULT NULL,
  `cuti_stlh_melahirkan_en` date DEFAULT NULL,
  `cuti_anak_st` date DEFAULT NULL,
  `cuti_anak_en` date DEFAULT NULL,
  `cuti_dukacita_st` date DEFAULT NULL,
  `cuti_dukacita_en` date DEFAULT NULL,
  `cuti_istri_st` date DEFAULT NULL,
  `cuti_istri_en` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tgl_link` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departement` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `atasan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel cakra2022.karyawan_cuti: ~2 rows (lebih kurang)
INSERT INTO `karyawan_cuti` (`id`, `id_form`, `cuti_tahunan`, `cuti_diluar_tanggungan`, `cuti_khusus`, `total_cuti`, `tgl_pengajuan_s`, `tgl_pengajuan_e`, `tgl_kembali_kerja`, `alasan`, `pengganti_pic`, `jabatan_pic`, `cuti_menikah_st`, `cuti_menikah_en`, `cuti_sblm_melahirkan_st`, `cuti_sblm_melahirkan_en`, `cuti_stlh_melahirkan_st`, `cuti_stlh_melahirkan_en`, `cuti_anak_st`, `cuti_anak_en`, `cuti_dukacita_st`, `cuti_dukacita_en`, `cuti_istri_st`, `cuti_istri_en`, `created_at`, `updated_at`, `tgl_link`, `jabatan`, `departement`, `atasan`) VALUES
	(1, 1, 'Y', 'N', 'N', 1, '2022-05-27', '2022-05-27', '2022-05-30', 'Alasan Pribadi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 01:09:12', '2022-06-19 20:58:10', 'Sampai', 'IT', 'IT', 'Susanto');

-- membuang struktur untuk table cakra2022.karyawan_izin
CREATE TABLE IF NOT EXISTS `karyawan_izin` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_form` int(11) NOT NULL,
  `izin_pekerjaan` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `izin_pribadi` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terlambat` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keluarkantor` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pulangcepat` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tidakclock` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sakit` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sebab_lain` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_izin` date DEFAULT NULL,
  `jam_s` time DEFAULT NULL,
  `jam_e` time DEFAULT NULL,
  `keteranganizin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departement` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `atasan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel cakra2022.karyawan_izin: ~1 rows (lebih kurang)
INSERT INTO `karyawan_izin` (`id`, `id_form`, `izin_pekerjaan`, `izin_pribadi`, `terlambat`, `keluarkantor`, `pulangcepat`, `tidakclock`, `sakit`, `sebab_lain`, `tgl_izin`, `jam_s`, `jam_e`, `keteranganizin`, `created_at`, `updated_at`, `jabatan`, `departement`, `atasan`) VALUES
	(1, 2, 'N', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', '2022-06-16', '08:30:00', '10:00:00', 'Ambil Surat Motor', '2022-06-16 21:34:07', '2022-06-20 21:53:48', 'IT', 'IT', 'Susanto'),
	(3, 3, 'N', 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', '2022-06-23', '01:00:00', '02:00:00', 'Mengambil berkas laporan kuliah di UT', '2022-06-23 19:21:19', '2022-06-23 19:21:19', 'IT', 'IT', 'Susanto');

-- membuang struktur untuk table cakra2022.karyawan_type
CREATE TABLE IF NOT EXISTS `karyawan_type` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel cakra2022.karyawan_type: ~2 rows (lebih kurang)
INSERT INTO `karyawan_type` (`id`, `name`) VALUES
	(1, 'Cuti'),
	(2, 'Izin'),
	(3, 'Dinas');

-- membuang struktur untuk table cakra2022.location
CREATE TABLE IF NOT EXISTS `location` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdBy` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modifyBy` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel cakra2022.location: ~4 rows (lebih kurang)
INSERT INTO `location` (`id`, `code`, `name`, `createdBy`, `modifyBy`, `created_at`, `updated_at`) VALUES
	(1, 'MDN', 'MDN - DEPO OAK', 'Admin', 'Admin', NULL, '2022-03-14 06:39:32'),
	(2, 'JKT', 'JKT - DEPO AGT', 'Admin', NULL, NULL, NULL),
	(3, 'SBY', 'SBY - DEPO CAN', 'Admin', NULL, NULL, NULL),
	(4, 'MDN', 'MDN - DEPO KIM 3', 'Admin', NULL, NULL, NULL);

-- membuang struktur untuk table cakra2022.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` bigint(20) NOT NULL,
  `menu` varchar(50) DEFAULT NULL,
  `sub_menu` varchar(50) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel cakra2022.menu: ~18 rows (lebih kurang)
INSERT INTO `menu` (`id`, `menu`, `sub_menu`, `link`) VALUES
	(1, 'Dashboard', 'Live Dashboard', NULL),
	(2, 'Dashboard', 'Trucking', NULL),
	(3, 'Dashboard', 'Trading', NULL),
	(4, 'Dashboard', 'Payment', NULL),
	(5, 'Dashboard', 'Inventory', NULL),
	(6, 'Isotank', 'Penjadwalan Isotank', '/isotank'),
	(7, 'Isotank', 'Daftar Transaksi ', '/isotank/transaksi/all'),
	(9, 'Revisi', 'Invoice', NULL),
	(10, 'Revisi', 'Payment', NULL),
	(11, 'Revisi', 'Pending Cash', NULL),
	(8, 'Revisi', 'Biaya', NULL),
	(12, 'Karyawan', 'Daftar Formulir', '/karyawan'),
	(13, 'Master', 'Data Pengguna', '/master/data/user'),
	(16, 'Master', 'Data Customer', '/master/data/customer'),
	(15, 'Master', 'Data Isotank', '/master/data/isotank'),
	(17, 'Master', 'Data Lokasi', '/master/data/lokasi'),
	(18, 'Master', 'Data Transport', '/master/data/transport'),
	(14, 'Master', 'Set Otoritas', '/master/data/otoritas');

-- membuang struktur untuk table cakra2022.menu_users
CREATE TABLE IF NOT EXISTS `menu_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel cakra2022.menu_users: ~14 rows (lebih kurang)
INSERT INTO `menu_users` (`id`, `id_user`, `id_menu`) VALUES
	(1, 1, 1),
	(2, 1, 3),
	(3, 14, 1),
	(4, 14, 2),
	(5, 14, 4),
	(6, 16, 1),
	(7, 16, 4),
	(8, 16, 5),
	(9, 16, 6),
	(10, 16, 7),
	(11, 17, 1),
	(12, 17, 5),
	(13, 17, 7),
	(14, 19, 1);

-- membuang struktur untuk table cakra2022.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel cakra2022.migrations: ~12 rows (lebih kurang)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(37, '2021_10_29_092009_create_stoks_table', 1),
	(112, '2014_10_12_000000_create_users_table', 2),
	(113, '2014_10_12_100000_create_password_resets_table', 2),
	(114, '2019_08_19_000000_create_failed_jobs_table', 2),
	(115, '2019_12_14_000001_create_personal_access_tokens_table', 2),
	(116, '2021_10_29_092749_create_dashboards_table', 2),
	(117, '2021_10_29_092824_create_karyawans_table', 2),
	(118, '2021_11_03_101734_create_isotanks_table', 2),
	(120, '2022_01_10_042428_create_location', 2),
	(121, '2022_01_10_042546_create_customers', 2),
	(122, '2022_01_10_050706_create_deleted_transactions', 2),
	(123, '2022_01_10_040258_create_tr_isotank', 3);

-- membuang struktur untuk table cakra2022.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel cakra2022.password_resets: ~0 rows (lebih kurang)

-- membuang struktur untuk table cakra2022.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel cakra2022.personal_access_tokens: ~0 rows (lebih kurang)

-- membuang struktur untuk procedure cakra2022.pr_GetContainers
DELIMITER //
CREATE PROCEDURE `pr_GetContainers`(
	IN `startDate` VARCHAR(50),
	IN `endDate` VARCHAR(50),
	IN `loc` INT
)
BEGIN
SELECT iso.id, iso.code, tr.tgl_indepo, tr.tgl_indepo_real, tr.tgl_outdepo, tr.des_id FROM isotanks iso
LEFT JOIN tr_isotank tr ON tr.id = (SELECT trs.id FROM tr_isotank trs WHERE trs.iso_id = iso.id ORDER BY trs.counter DESC LIMIT 1)
WHERE (tr.des_id = loc) AND (tr.tgl_outdepo NOT BETWEEN startDate AND endDate) AND (tr.tgl_indepo NOT BETWEEN startDate AND endDate) AND (tr.tgl_indepo_real NOT BETWEEN startDate AND endDate) OR (((tr.tgl_indepo_real IS NULL AND NOW() > tr.tgl_indepo) OR (tr.tgl_indepo_real IS NULL AND NOW() > tr.tgl_indepo_real)) and tr.void = 'Y') ;
END//
DELIMITER ;

-- membuang struktur untuk procedure cakra2022.pr_GetCounter
DELIMITER //
CREATE PROCEDURE `pr_GetCounter`(
	IN `date` VARCHAR(50)
)
BEGIN
	SELECT counter FROM tr_isotank WHERE YEAR(created_at) = DATE LIMIT 1;
END//
DELIMITER ;

-- membuang struktur untuk procedure cakra2022.pr_GetisotankEach
DELIMITER //
CREATE PROCEDURE `pr_GetisotankEach`(
	IN `iso_id` INT
)
BEGIN
SELECT iso.code, tr.transnumber, tr.tgl_outdepo, tr.tgl_indepo, cust.customername, ori.name ori, des.name des, tr.lokasi_loading, tr.lokasi_bongkar, tra.name vessel, tr.transport_no, tr.tgl_ETA, tr.tgl_ETD, tr.cargo, tr.packinglist_no, tr.deskripsi, tr.partai, tr.packinglist_no FROM isotanks iso
left JOIN tr_isotank tr ON tr.iso_id = iso.id
LEFT JOIN customers cust ON cust.id = tr.cust_id
LEFT JOIN location ori ON ori.id = tr.ori_id
LEFT JOIN location des ON des.id = tr.des_id
LEFT JOIN transport tra ON tra.id = tr.transport_id 
WHERE iso.id = iso_id;
END//
DELIMITER ;

-- membuang struktur untuk procedure cakra2022.pr_Gettrans_Dup
DELIMITER //
CREATE PROCEDURE `pr_Gettrans_Dup`(
	IN `data` VARCHAR(25)
)
BEGIN
SELECT iso.id, iso.code, tr.id transid, tr.transnumber, DATE_FORMAT(tr.tgl_indepo_real, "%Y-%m-%d") tgl_indepo_real, DATE_FORMAT(tr.tgl_outdepo, "%Y-%m-%d") tgl_outdepo,  DATE_FORMAT(tr.tgl_indepo, "%Y-%m-%d") tgl_indepo, cust.customername, tr.cust_id, tr.ori_id ori_id, tr.des_id des_id, tr.lokasi_loading, tr.lokasi_bongkar, tr.transport_id transport_id, tr.transport_no, DATE_FORMAT(tr.tgl_ETA, "%Y-%m-%d") tgl_ETA, DATE_FORMAT(tr.tgl_ETD, "%Y-%m-%d") tgl_ETD, tr.cargo, tr.packinglist_no, tr.deskripsi, DATE_FORMAT(tr.tgl_muat, "%Y-%m-%d") tgl_muat, DATE_FORMAT(tr.tgl_bongkar, "%Y-%m-%d") tgl_bongkar, ori.name ori, des.name des, tr.jlh_Partai, trs.partai
FROM isotanks iso
LEFT JOIN tr_isotank tr ON tr.iso_id = iso.id
LEFT JOIN customers cust ON cust.id = tr.cust_id
LEFT JOIN location ori ON ori.id = tr.ori_id
LEFT JOIN location des ON des.id = tr.des_id
LEFT JOIN (SELECT trs.packinglist_no, count(trs.id) partai FROM tr_isotank trs GROUP BY trs.packinglist_no) trs ON trs.packinglist_no = tr.packinglist_no
WHERE tr.UID = DATA;
END//
DELIMITER ;

-- membuang struktur untuk procedure cakra2022.pr_Gettrans_Edit
DELIMITER //
CREATE PROCEDURE `pr_Gettrans_Edit`(
	IN `data` INT
)
BEGIN
SELECT iso.id, iso.code, tr.id transid, tr.transnumber, DATE_FORMAT(tr.tgl_indepo_real, "%Y-%m-%d") tgl_indepo_real, DATE_FORMAT(tr.tgl_outdepo, "%Y-%m-%d") tgl_outdepo,  DATE_FORMAT(tr.tgl_indepo, "%Y-%m-%d") tgl_indepo, cust.customername, tr.cust_id, tr.ori_id ori_id, tr.des_id des_id, tr.lokasi_loading, tr.lokasi_bongkar, tr.transport_id transport_id, tr.transport_no, DATE_FORMAT(tr.tgl_ETA, "%Y-%m-%d") tgl_ETA, DATE_FORMAT(tr.tgl_ETD, "%Y-%m-%d") tgl_ETD, tr.cargo, tr.packinglist_no, tr.partai, tr.deskripsi, DATE_FORMAT(tr.tgl_muat, "%Y-%m-%d") tgl_muat, DATE_FORMAT(tr.tgl_bongkar, "%Y-%m-%d") tgl_bongkar, ori.name ori, des.name des, tr.jlh_Partai
FROM isotanks iso
LEFT JOIN tr_isotank tr ON tr.iso_id = iso.id
LEFT JOIN customers cust ON cust.id = tr.cust_id
LEFT JOIN location ori ON ori.id = tr.ori_id
LEFT JOIN location des ON des.id = tr.des_id
WHERE tr.id = data;
END//
DELIMITER ;

-- membuang struktur untuk procedure cakra2022.pr_KaryawanForms_all
DELIMITER //
CREATE PROCEDURE `pr_KaryawanForms_all`(
	IN `_cabang` ENUM('M','S', 'J')
)
BEGIN
SELECT case when k.void = 'Y' then 'Void' when k.approved = 'Y' then 'Approved'  when k.approved = 'R' then 'Rejected' ELSE 'Pending' END stats, kt.name, k.approve_by, kt.name `type`, k.no_form, k.total_cuti, DATE_FORMAT(kc.tgl_pengajuan_s, "%d %M %Y") tgl_pengajuan_s, DATE_FORMAT(kc.tgl_pengajuan_e, "%d %M %Y") tgl_pengajuan_e, DATE_FORMAT(kc.tgl_kembali_kerja, "%d %M %Y") tgl_kembali_kerja, kc.alasan, kc.pengganti_pic, kc.jabatan_pic, k.created_by, k.id form_id, kc.id cuti_id, kc.tgl_link
FROM karyawan k 
join karyawan_cuti kc ON k.id = kc.id_form 
JOIN karyawan_type kt ON kt.id = k.`type`
WHERE k.cabang = _cabang
UNION ALL
SELECT case when k.void = 'Y' then 'Void' when k.approved = 'Y' then 'Approved'  when k.approved = 'R' then 'Rejected' ELSE 'Pending' END stats, kt.name, k.approve_by, kt.name `type`, k.no_form, k.total_cuti, DATE_FORMAT(k.date, "%d %M %Y"), NULL, NULL, ki.keteranganizin, NULL, NULL, k.created_by, k.id form_id, ki.id cuti_id, NULL
FROM karyawan k 
join karyawan_izin ki ON k.id = ki.id_form 
JOIN karyawan_type kt ON kt.id = k.`type`
WHERE k.cabang = _cabang;
END//
DELIMITER ;

-- membuang struktur untuk procedure cakra2022.pr_KaryawanForms_get
DELIMITER //
CREATE PROCEDURE `pr_KaryawanForms_get`(
	IN `user_` VARCHAR(50)
)
BEGIN
SELECT case when k.void = 'Y' then 'Void' when k.approved = 'Y' then 'Approved'  when k.approved = 'R' then 'Rejected' ELSE 'Pending' END stats, kt.name, k.approve_by, kt.name `type`, k.no_form, k.total_cuti, DATE_FORMAT(kc.tgl_pengajuan_s, "%d %M %Y") tgl_pengajuan_s, DATE_FORMAT(kc.tgl_pengajuan_e, "%d %M %Y") tgl_pengajuan_e, DATE_FORMAT(kc.tgl_kembali_kerja, "%d %M %Y") tgl_kembali_kerja, kc.alasan, kc.pengganti_pic, kc.jabatan_pic, k.created_by, k.id form_id, kc.id cuti_id, kc.tgl_link
FROM karyawan k 
join karyawan_cuti kc ON k.id = kc.id_form 
JOIN karyawan_type kt ON kt.id = k.`type`
WHERE k.created_by = user_
UNION ALL
SELECT case when k.void = 'Y' then 'Void' when k.approved = 'Y' then 'Approved'  when k.approved = 'R' then 'Rejected' ELSE 'Pending' END stats, kt.name, k.approve_by, kt.name `type`, k.no_form, k.total_cuti, DATE_FORMAT(k.date, "%d %M %Y"), NULL, NULL, ki.keteranganizin, NULL, NULL, k.created_by, k.id form_id, ki.id cuti_id, NULL
FROM karyawan k 
join karyawan_izin ki ON k.id = ki.id_form 
JOIN karyawan_type kt ON kt.id = k.`type`
WHERE k.created_by = user_;
END//
DELIMITER ;

-- membuang struktur untuk procedure cakra2022.pr_Menus_main
DELIMITER //
CREATE PROCEDURE `pr_Menus_main`(
	IN `_id` INT
)
BEGIN
SELECT m.menu, CONCAT(m.menu,'*') _active FROM menu_users mu LEFT JOIN menu m ON m.id = mu.id_menu WHERE mu.id_user = _id GROUP BY m.menu;
END//
DELIMITER ;

-- membuang struktur untuk procedure cakra2022.pr_Menus_sub
DELIMITER //
CREATE PROCEDURE `pr_Menus_sub`(
	IN `_iduser` INT
)
BEGIN
SELECT m.menu, m.sub_menu, m.link FROM menu_users mu  LEFT JOIN menu m ON m.id = mu.id_menu WHERE mu.id_user = _iduser;
END//
DELIMITER ;

-- membuang struktur untuk table cakra2022.transport
CREATE TABLE IF NOT EXISTS `transport` (
  `id` int(11) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel cakra2022.transport: ~3 rows (lebih kurang)
INSERT INTO `transport` (`id`, `code`, `name`, `updated_at`, `created_at`) VALUES
	(1, 'KAI', 'KERETA API', '2022-03-13 07:55:30', NULL),
	(2, 'KLU', 'KAPAL LAUT', NULL, NULL),
	(3, 'MBL', 'MOBIL', NULL, NULL);

-- membuang struktur untuk table cakra2022.tr_isotank_pldetail
CREATE TABLE IF NOT EXISTS `tr_isotank_pldetail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `packinglist` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jlh_Partai` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel cakra2022.tr_isotank_pldetail: ~0 rows (lebih kurang)

-- membuang struktur untuk table cakra2022.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cabang` enum('M','J','S','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('Administrator','Editor','Approver','Validator','Checker','Operasional') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_nopad_ci NOT NULL,
  `NA` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expire_date` datetime DEFAULT NULL,
  `token` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `changepass` int(11) NOT NULL DEFAULT 0,
  `path` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dept` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel cakra2022.users: ~9 rows (lebih kurang)
INSERT INTO `users` (`id`, `name`, `cabang`, `username`, `email`, `password`, `role`, `NA`, `remember_token`, `created_at`, `updated_at`, `expire_date`, `token`, `changepass`, `path`, `dept`) VALUES
	(1, 'Admin', 'N', 'admin', 'admin@cakraindo.com', 'admin1234', 'Administrator', 1, NULL, NULL, '2022-04-05 14:00:01', NULL, '5sTHCGTQBlvB6h1z2', 0, NULL, NULL),
	(14, 'Yugo', 'M', 'yugo', 'prayugo@cakraindo.com', '12345', 'Editor', 1, NULL, '2022-03-17 01:55:30', '2022-04-05 13:59:52', '2022-03-18 18:55:30', 'wdHPv1bkiNiPmFRNZ', 0, NULL, NULL),
	(16, 'Riza', 'M', 'riza', 'riza@cakraindo.com', '12345', 'Administrator', 1, NULL, '2022-03-17 01:59:44', '2022-06-24 03:13:25', '2022-03-18 18:59:44', '8rpfOnSQeJ1TG12', 0, 'public/file_tanda_tangan/16.jpg', NULL),
	(17, 'Susanto', 'M', 'susanto', 'susanto@cakraindo.com', '12345', 'Administrator', 1, NULL, '2022-03-21 09:40:06', '2022-04-05 13:59:07', '2022-03-23 02:40:06', 'T8kbNcLQBpSSbYR6F', 0, NULL, NULL),
	(19, 'Suwandi', 'M', 'suwandi', 'suwandi@cakraindo.com', '12345', 'Approver', 1, NULL, '2022-03-23 15:43:39', '2022-04-05 13:59:43', '2022-03-25 08:43:39', '1EAHjx2VonouDBI0r', 0, NULL, NULL),
	(20, 'Fida', 'S', 'fida', 'fida@cakraindo.com', '12345', 'Approver', 1, NULL, '2022-04-13 13:13:49', '2022-04-13 13:14:04', '2022-04-15 06:13:49', 'DdZRm6IEnLZy3dp3B', 0, NULL, NULL),
	(21, 'Hanafi', 'J', 'hanafi', 'hanafi@cakraindo.com', '12345', 'Approver', 1, NULL, '2022-04-13 13:14:18', '2022-04-13 13:14:32', '2022-04-15 06:14:18', 'sMHSk050cx10RCF1s', 0, NULL, NULL),
	(23, NULL, 'S', NULL, 'domestic.sby@cakraindo.com', NULL, 'Operasional', 2, NULL, '2022-04-14 08:50:53', '2022-04-14 08:50:53', '2022-04-16 01:50:53', 'vGYhqwnJ5QN8p7wRo', 0, NULL, NULL),
	(24, 'Linda', 'N', 'linda', 'linda@cakraindo.com', 'linda@cmi22', 'Administrator', 1, NULL, '2022-04-14 10:24:14', '2022-06-24 04:09:09', '2022-04-16 03:24:14', 'Ei2W9uYnB6hZDdEoT', 0, NULL, NULL);

-- membuang struktur untuk table cakra2022.user_menu
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` bigint(20) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel cakra2022.user_menu: ~0 rows (lebih kurang)

-- membuang struktur untuk view cakra2022.v_allmenus
-- Membuat tabel sementara untuk menangani kesalahan ketergantungan VIEW
CREATE TABLE `v_allmenus` (
	`menu` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`_active` VARCHAR(51) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- membuang struktur untuk view cakra2022.v_isotanks
-- Membuat tabel sementara untuk menangani kesalahan ketergantungan VIEW
CREATE TABLE `v_isotanks` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`code` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`transid` BIGINT(20) UNSIGNED NULL,
	`uid` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`transnumber` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`tgl_indepo_real` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`tgl_outdepo` DATETIME NULL,
	`tgl_indepo` DATETIME NULL,
	`customername` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`ori` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`des` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`lokasi_loading` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`lokasi_bongkar` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`vessel` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`transport_no` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`tgl_ETA` DATETIME NULL,
	`tgl_ETD` DATETIME NULL,
	`cargo` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`packinglist_no` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`partai` INT(11) NULL,
	`deskripsi` VARCHAR(100) NULL COLLATE 'utf8mb4_unicode_ci',
	`tgl_muat` DATETIME NULL,
	`tgl_bongkar` DATETIME NULL,
	`stats` VARCHAR(20) NULL COLLATE 'utf8mb4_general_ci',
	`ori_id` INT(11) NULL,
	`des_id` INT(11) NULL,
	`transport_id` INT(11) NULL,
	`jlh_Partai` INT(11) NULL,
	`cust_id` INT(11) NULL,
	`transidf_` BIGINT(20) UNSIGNED NULL
) ENGINE=MyISAM;

-- membuang struktur untuk view cakra2022.v_isotanks_list
-- Membuat tabel sementara untuk menangani kesalahan ketergantungan VIEW
CREATE TABLE `v_isotanks_list` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`code` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`transid` DECIMAL(20,0) NULL,
	`uid` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`transnumber` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`tgl_indepo_real` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`tgl_outdepo` DATETIME NULL,
	`tgl_indepo` DATETIME NULL,
	`customername` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`ori` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`des` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`lokasi_loading` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`lokasi_bongkar` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`vessel` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`transport_no` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`tgl_ETA` DATETIME NULL,
	`tgl_ETD` DATETIME NULL,
	`cargo` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`packinglist_no` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`partai` INT(11) NULL,
	`deskripsi` VARCHAR(100) NULL COLLATE 'utf8mb4_unicode_ci',
	`tgl_muat` DATETIME NULL,
	`tgl_bongkar` DATETIME NULL,
	`createdBy` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`jlh_Partai` INT(11) NULL,
	`stats` VARCHAR(20) NULL COLLATE 'utf8mb4_general_ci',
	`v_tgl_ETA` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`v_tgl_ETD` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`v_cargo` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_packinglist_no` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_partai` INT(11) NULL,
	`v_tgl_muat` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`v_tgl_bongkar` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`v_customername` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_ori` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_des` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_transnumber` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_tgl_indepo_real` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`v_tgl_outdepo` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`v_tgl_indepo` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`v_transid` BIGINT(20) UNSIGNED NULL,
	`v_vessel` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`v_lokasi_loading` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_lokasi_bongkar` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_uid` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_createdby` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_jlhPartai` INT(11) NULL
) ENGINE=MyISAM;

-- membuang struktur untuk view cakra2022.v_karyawan_forms
-- Membuat tabel sementara untuk menangani kesalahan ketergantungan VIEW
CREATE TABLE `v_karyawan_forms` (
	`stats` VARCHAR(8) NULL COLLATE 'utf8mb4_general_ci',
	`name` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`approve_by` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`type` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`no_form` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`total_cuti` FLOAT NOT NULL,
	`tgl_pengajuan_s` VARCHAR(72) NULL COLLATE 'utf8mb4_general_ci',
	`tgl_pengajuan_e` VARCHAR(72) NULL COLLATE 'utf8mb4_general_ci',
	`tgl_kembali_kerja` VARCHAR(72) NULL COLLATE 'utf8mb4_general_ci',
	`alasan` MEDIUMTEXT NULL COLLATE 'utf8mb4_unicode_ci',
	`pengganti_pic` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`jabatan_pic` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`created_by` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`form_id` BIGINT(20) UNSIGNED NOT NULL,
	`cuti_id` BIGINT(20) UNSIGNED NOT NULL,
	`tgl_link` VARCHAR(10) NULL COLLATE 'utf8mb4_unicode_ci'
) ENGINE=MyISAM;

-- membuang struktur untuk view cakra2022.v_trans_isotanks
-- Membuat tabel sementara untuk menangani kesalahan ketergantungan VIEW
CREATE TABLE `v_trans_isotanks` (
	`packinglist_no` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`customername` MEDIUMTEXT NULL COLLATE 'utf8mb4_unicode_ci',
	`partai` BIGINT(21) NOT NULL,
	`jlh_Partai` INT(11) NOT NULL,
	`tgl_outdepo` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`tgl_indepo` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`tgl_indepo_real` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`stats` MEDIUMTEXT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- membuang struktur untuk view cakra2022.v_trans_isotanks_det
-- Membuat tabel sementara untuk menangani kesalahan ketergantungan VIEW
CREATE TABLE `v_trans_isotanks_det` (
	`code` VARCHAR(20) NULL COLLATE 'utf8mb4_unicode_ci',
	`uid` VARCHAR(25) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`transid` BIGINT(20) UNSIGNED NOT NULL,
	`transnumber` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`tgl_indepo_real` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`tgl_outdepo` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`tgl_indepo` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`customername` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`ori` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`des` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`lokasi_loading` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`lokasi_bongkar` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`vessel` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`transport_no` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`tgl_ETA` DATETIME NULL,
	`tgl_ETD` DATETIME NULL,
	`cargo` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`packinglist_no` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`partai` INT(11) NOT NULL,
	`deskripsi` VARCHAR(100) NULL COLLATE 'utf8mb4_unicode_ci',
	`tgl_muat` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`tgl_bongkar` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`void` ENUM('Y','N') NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`jlh_Partai` INT(11) NOT NULL,
	`stats` VARCHAR(11) NULL COLLATE 'utf8mb4_general_ci',
	`void_date` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`void_reason` VARCHAR(250) NULL COLLATE 'utf8mb4_unicode_ci'
) ENGINE=MyISAM;

-- membuang struktur untuk table cakra2022.zdeleted_transactions
CREATE TABLE IF NOT EXISTS `zdeleted_transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel cakra2022.zdeleted_transactions: ~0 rows (lebih kurang)

-- membuang struktur untuk view cakra2022.v_allmenus
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `v_allmenus`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_allmenus` AS SELECT menu, CONCAT(menu,'*') _active FROM menu GROUP BY menu ;

-- membuang struktur untuk view cakra2022.v_isotanks
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `v_isotanks`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_isotanks` AS SELECT iso.id, iso.code, tr.id transid, tr.UID uid, tr.transnumber, DATE_FORMAT(tr.tgl_indepo_real, "%Y-%m-%d") tgl_indepo_real, tr.tgl_outdepo, case when tr.tgl_indepo_real is null then tr.tgl_indepo ELSE tr.tgl_indepo_real END tgl_indepo, cust.customername, ori.name ori, des.name des, tr.lokasi_loading, tr.lokasi_bongkar, tra.name vessel, tr.transport_no, tr.tgl_ETA, tr.tgl_ETD, tr.cargo, tr.packinglist_no, tr.partai, tr.deskripsi, tr.tgl_muat, tr.tgl_bongkar,
CASE when tr.void = 'Y' then 'Void' 
ELSE 
	CASE when tr.tgl_indepo_real IS NOT NULL then 
		CASE when tr.tgl_indepo_real IS NULL AND NOW() > tr.tgl_indepo_real then 'Suspend' when vin.trans_ IS NOT NULL AND (NOW() BETWEEN tr.tgl_outdepo AND tr.tgl_indepo_real) AND (vin.outdepo_ > NOW()) then 'In Use - On Schedule' when vin.outdepo_ > NOW() then 'On Schedule' when (NOW() BETWEEN tr.tgl_outdepo AND tr.tgl_indepo_real) then 'In Use' ELSE 'Ready' end
ELSE 
	  	CASE when tr.tgl_indepo_real IS NULL AND NOW() > tr.tgl_indepo then 'Suspend' when vin.trans_ IS NOT NULL AND (NOW() BETWEEN tr.tgl_outdepo AND tr.tgl_indepo) AND (vin.outdepo_ > NOW()) then 'In Use - On Schedule' when vin.outdepo_ > NOW() then 'On Schedule' when (NOW() BETWEEN tr.tgl_outdepo AND tr.tgl_indepo) then 'In Use' ELSE 'Ready' 
		END
	END 
END stats, tr.ori_id, tr.des_id, tr.transport_id, tr.jlh_Partai, tr.cust_id, vin.id transidf_
FROM isotanks iso
left JOIN tr_isotank tr ON tr.id = (SELECT trs.id FROM tr_isotank trs WHERE trs.iso_id = iso.id AND ((NOW() BETWEEN trs.tgl_outdepo AND trs.tgl_indepo) OR trs.tgl_indepo < NOW()) ORDER BY trs.counter DESC LIMIT 1)
LEFT JOIN customers cust ON cust.id = tr.cust_id
LEFT JOIN location ori ON ori.id = tr.ori_id
LEFT JOIN location des ON des.id = tr.des_id
LEFT JOIN transport tra ON tra.id = tr.transport_id 
LEFT JOIN (SELECT iso.id isoid, tr.transnumber trans_, tr.id, tr.tgl_outdepo outdepo_ FROM isotanks iso left JOIN tr_isotank tr ON tr.id = (SELECT trs.id FROM tr_isotank trs WHERE trs.iso_id = iso.id AND (trs.tgl_outdepo > NOW()) ORDER BY trs.counter ASC LIMIT 1) ) vin ON vin.isoid = iso.id
WHERE iso.`status` = 'R' ;

-- membuang struktur untuk view cakra2022.v_isotanks_list
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `v_isotanks_list`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_isotanks_list` AS SELECT iso.id, iso.code, case when tr.id IS NULL then 1 ELSE tr.id end transid, tr.UID uid, tr.transnumber, DATE_FORMAT(tr.tgl_indepo_real, "%Y-%m-%d") tgl_indepo_real, tr.tgl_outdepo, case when tr.tgl_indepo_real is NULL AND tr.void = 'N' then tr.tgl_indepo ELSE tr.tgl_indepo_real END tgl_indepo, cust.customername, ori.name ori, des.name des, tr.lokasi_loading, tr.lokasi_bongkar, tra.name vessel, tr.transport_no, tr.tgl_ETA, tr.tgl_ETD, tr.cargo, tr.packinglist_no, tr.partai, tr.deskripsi, tr.tgl_muat, tr.tgl_bongkar, tr.createdBy, tr.jlh_Partai,
CASE when tr.void = 'Y' then 'Ready'
ELSE 
	CASE when tr.tgl_indepo_real IS NOT NULL then 
		CASE when tr.tgl_indepo_real IS NULL AND NOW() > tr.tgl_indepo_real then 'Suspend' when vin.trans_ IS NOT NULL AND (NOW() BETWEEN tr.tgl_outdepo AND tr.tgl_indepo_real) AND (vin.outdepo_ > NOW()) then 'In Use - On Schedule' when vin.outdepo_ > NOW() then 'On Schedule' when (NOW() BETWEEN tr.tgl_outdepo AND tr.tgl_indepo_real) then 'In Use' ELSE 'Ready' end
	ELSE 
		CASE when tr.tgl_indepo_real IS NULL AND NOW() > tr.tgl_indepo then 'Suspend' when vin.trans_ IS NOT NULL AND (NOW() BETWEEN tr.tgl_outdepo AND tr.tgl_indepo) AND (vin.outdepo_ > NOW()) then 'In Use - On Schedule' when vin.outdepo_ > NOW() then 'On Schedule' when (NOW() BETWEEN tr.tgl_outdepo AND tr.tgl_indepo) then 'In Use' ELSE 'Ready' 
		END
	END	
END stats, DATE_FORMAT(vin.tgl_ETA, "%Y-%m-%d") v_tgl_ETA, DATE_FORMAT(vin.tgl_ETD, "%Y-%m-%d") v_tgl_ETD, vin.cargo v_cargo, vin.packinglist_no v_packinglist_no, vin.partai v_partai, DATE_FORMAT(vin.tgl_muat, "%Y-%m-%d") v_tgl_muat, DATE_FORMAT(vin.tgl_bongkar, "%Y-%m-%d") v_tgl_bongkar, vin_cust.customername v_customername, vin_ori.name v_ori, vin_des.name v_des, vin.trans_ v_transnumber, DATE_FORMAT(vin.tgl_indepo_real, "%Y-%m-%d") v_tgl_indepo_real, DATE_FORMAT(vin.outdepo_, "%Y-%m-%d") v_tgl_outdepo, case when vin.tgl_indepo_real is null then DATE_FORMAT(vin.tgl_indepo, "%Y-%m-%d") ELSE DATE_FORMAT(vin.tgl_indepo_real, "%Y-%m-%d") END v_tgl_indepo, vin.id v_transid, vin_tra.name v_vessel, vin.lokasi_loading v_lokasi_loading, vin.lokasi_bongkar v_lokasi_bongkar, vin.uid v_uid, vin.createdBy v_createdby, vin.jlh_Partai v_jlhPartai
FROM isotanks iso
left JOIN tr_isotank tr ON tr.id = (SELECT trs.id FROM tr_isotank trs WHERE trs.iso_id = iso.id AND ((NOW() BETWEEN trs.tgl_outdepo AND trs.tgl_indepo) OR trs.tgl_indepo < NOW()) ORDER BY trs.counter DESC LIMIT 1)
LEFT JOIN customers cust ON cust.id = tr.cust_id
LEFT JOIN location ori ON ori.id = tr.ori_id
LEFT JOIN location des ON des.id = tr.des_id
LEFT JOIN transport tra ON tra.id = tr.transport_id 
LEFT JOIN (SELECT iso.id isoid, tr.cust_id, tr.ori_id, tr.des_id, tr.transport_id, tr.transnumber trans_, tr.id, tr.tgl_outdepo outdepo_, tr.tgl_indepo, tr.transport_no, tr.tgl_ETA, tr.tgl_ETD, tr.packinglist_no, tr.partai, tr.tgl_muat, tr.tgl_bongkar, tr.cargo, tgl_indepo_real, tr.lokasi_loading, tr.lokasi_bongkar, tr.UID, tr.createdBy, tr.jlh_Partai FROM isotanks iso left JOIN tr_isotank tr ON tr.id = (SELECT trs.id FROM tr_isotank trs WHERE trs.iso_id = iso.id AND (trs.tgl_outdepo > NOW()) ORDER BY trs.counter ASC LIMIT 1)) vin ON vin.isoid = iso.id
LEFT JOIN customers vin_cust ON vin_cust.id = vin.cust_id
LEFT JOIN location vin_ori ON vin_ori.id = vin.ori_id
LEFT JOIN location vin_des ON vin_des.id = vin.des_id
LEFT JOIN transport vin_tra ON vin_tra.id = vin.transport_id 
WHERE iso.`status` = 'R' ORDER BY iso.code asc ;

-- membuang struktur untuk view cakra2022.v_karyawan_forms
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `v_karyawan_forms`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_karyawan_forms` AS SELECT case when k.void = 'Y' then 'Void' when k.approved = 'Y' then 'Approved'  when k.approved = 'R' then 'Rejected' ELSE 'Pending' END stats, kt.name, k.approve_by, kt.name `type`, k.no_form, k.total_cuti, DATE_FORMAT(kc.tgl_pengajuan_s, "%d %M %Y") tgl_pengajuan_s, DATE_FORMAT(kc.tgl_pengajuan_e, "%d %M %Y") tgl_pengajuan_e, DATE_FORMAT(kc.tgl_kembali_kerja, "%d %M %Y") tgl_kembali_kerja, kc.alasan, kc.pengganti_pic, kc.jabatan_pic, k.created_by, k.id form_id, kc.id cuti_id, kc.tgl_link
FROM karyawan k 
join karyawan_cuti kc ON k.id = kc.id_form 
JOIN karyawan_type kt ON kt.id = k.`type`
UNION ALL
SELECT case when k.void = 'Y' then 'Void' when k.approved = 'Y' then 'Approved'  when k.approved = 'R' then 'Rejected' ELSE 'Pending' END stats, kt.name, k.approve_by, kt.name `type`, k.no_form, k.total_cuti, DATE_FORMAT(k.date, "%d %M %Y"), NULL, NULL, ki.keteranganizin, NULL, NULL, k.created_by, k.id form_id, ki.id cuti_id, NULL
FROM karyawan k 
join karyawan_izin ki ON k.id = ki.id_form 
JOIN karyawan_type kt ON kt.id = k.`type` ;

-- membuang struktur untuk view cakra2022.v_trans_isotanks
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `v_trans_isotanks`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_trans_isotanks` AS SELECT tr.packinglist_no, GROUP_CONCAT(DISTINCT cu.customername  SEPARATOR ' - ') customername, COUNT(tr.id) partai, tr.jlh_Partai, DATE_FORMAT(MIN(tgl_outdepo), "%Y-%m-%d") tgl_outdepo, DATE_FORMAT(MIN(tgl_indepo), "%Y-%m-%d") tgl_indepo, DATE_FORMAT(MIN(tgl_indepo_real), "%Y-%m-%d") tgl_indepo_real, 
GROUP_CONCAT(DISTINCT CASE when tr.void = 'Y' then 'Void' ELSE CASE when DATE_FORMAT(NOW(), "%Y-%m-%d") = DATE_FORMAT(tr.tgl_indepo_real, "%Y-%m-%d") then 'Finish' when tr.tgl_indepo_real IS NULL AND NOW() > tr.tgl_indepo then 'Suspend' when (tr.tgl_outdepo > NOW()) then 'On Schedule' when (NOW() BETWEEN tr.tgl_outdepo AND tr.tgl_indepo) OR (NOW() BETWEEN tr.tgl_outdepo AND tr.tgl_indepo_real) then 'In Use' ELSE 'Finish' END END SEPARATOR ' - ') stats FROM tr_isotank tr
JOIN customers cu ON cu.id = tr.cust_id
GROUP BY tr.packinglist_no, tr.jlh_Partai ;

-- membuang struktur untuk view cakra2022.v_trans_isotanks_det
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `v_trans_isotanks_det`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_trans_isotanks_det` AS SELECT iso.code, tr.UID uid, tr.id transid, tr.transnumber, DATE_FORMAT(tr.tgl_indepo_real, "%Y-%m-%d") tgl_indepo_real, DATE_FORMAT(tr.tgl_outdepo, "%Y-%m-%d") tgl_outdepo,  DATE_FORMAT(tr.tgl_indepo, "%Y-%m-%d") tgl_indepo, cust.customername, ori.name ori, des.name des, tr.lokasi_loading, tr.lokasi_bongkar, tra.name vessel, tr.transport_no, tr.tgl_ETA, tr.tgl_ETD, tr.cargo, tr.packinglist_no, tr.partai, tr.deskripsi, DATE_FORMAT(tr.tgl_muat, "%Y-%m-%d") tgl_muat, DATE_FORMAT(tr.tgl_bongkar, "%Y-%m-%d") tgl_bongkar, tr.void, tr.jlh_Partai,
CASE when tr.void = 'Y' then 'Void' ELSE CASE when DATE_FORMAT(NOW(), "%Y-%m-%d") = DATE_FORMAT(tr.tgl_indepo_real, "%Y-%m-%d") then 'Finish' when tr.tgl_indepo_real IS NULL AND NOW() > tr.tgl_indepo then 'Suspend' when (tr.tgl_outdepo > NOW()) then 'On Schedule' when (NOW() BETWEEN tr.tgl_outdepo AND tr.tgl_indepo) OR (NOW() BETWEEN tr.tgl_outdepo AND tr.tgl_indepo_real) then 'In Use' ELSE 'Finish' END END stats, DATE_FORMAT(tr.void_date, "%Y-%m-%d") void_date, tr.void_reason
FROM tr_isotank tr
LEFT JOIN isotanks iso ON tr.iso_id = iso.id
LEFT JOIN customers cust ON cust.id = tr.cust_id
LEFT JOIN location ori ON ori.id = tr.ori_id
LEFT JOIN location des ON des.id = tr.des_id
LEFT JOIN transport tra ON tra.id = tr.transport_id
WHERE tr.counter <> 0
ORDER BY tr.counter DESC ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
