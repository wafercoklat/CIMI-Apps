-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.20-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for view cakra2022.v_isotanks_list
-- Creating temporary table to overcome VIEW dependency errors
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
	`stats` VARCHAR(20) NULL COLLATE 'utf8mb4_general_ci',
	`v_tgl_ETA` DATETIME NULL,
	`v_tgl_ETD` DATETIME NULL,
	`v_cargo` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_packinglist_no` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_partai` INT(11) NULL,
	`v_tgl_muat` DATETIME NULL,
	`v_tgl_bongkar` DATETIME NULL,
	`v_customername` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_ori` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_des` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_transnumber` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_tgl_indepo_real` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci',
	`v_tgl_outdepo` DATETIME NULL,
	`v_tgl_indepo` DATETIME NULL,
	`v_transid` BIGINT(20) UNSIGNED NULL,
	`v_vessel` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`v_lokasi_loading` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_lokasi_bongkar` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_uid` VARCHAR(25) NULL COLLATE 'utf8mb4_unicode_ci',
	`v_createdby` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view cakra2022.v_isotanks_list
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_isotanks_list`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_isotanks_list` AS SELECT iso.id, iso.code, case when tr.id IS NULL then 1 ELSE tr.id end transid, tr.UID uid, tr.transnumber, DATE_FORMAT(tr.tgl_indepo_real, "%Y-%m-%d") tgl_indepo_real, tr.tgl_outdepo, case when tr.tgl_indepo_real is NULL AND tr.void = 'N' then tr.tgl_indepo ELSE tr.tgl_indepo_real END tgl_indepo, cust.customername, ori.name ori, des.name des, tr.lokasi_loading, tr.lokasi_bongkar, tra.name vessel, tr.transport_no, tr.tgl_ETA, tr.tgl_ETD, tr.cargo, tr.packinglist_no, tr.partai, tr.deskripsi, tr.tgl_muat, tr.tgl_bongkar, tr.createdBy,
CASE when tr.void = 'Y' then 'Ready'
ELSE 
	CASE when tr.tgl_indepo_real IS NOT NULL then 
		CASE when tr.tgl_indepo_real IS NULL AND NOW() > tr.tgl_indepo_real then 'Suspend' when vin.trans_ IS NOT NULL AND (NOW() BETWEEN tr.tgl_outdepo AND tr.tgl_indepo_real) AND (vin.outdepo_ > NOW()) then 'In Use - On Schedule' when vin.outdepo_ > NOW() then 'On Schedule' when (NOW() BETWEEN tr.tgl_outdepo AND tr.tgl_indepo_real) then 'In Use' ELSE 'Ready' end
	ELSE 
		CASE when tr.tgl_indepo_real IS NULL AND NOW() > tr.tgl_indepo then 'Suspend' when vin.trans_ IS NOT NULL AND (NOW() BETWEEN tr.tgl_outdepo AND tr.tgl_indepo) AND (vin.outdepo_ > NOW()) then 'In Use - On Schedule' when vin.outdepo_ > NOW() then 'On Schedule' when (NOW() BETWEEN tr.tgl_outdepo AND tr.tgl_indepo) then 'In Use' ELSE 'Ready' 
		END
	END	
END stats, vin.tgl_ETA v_tgl_ETA, vin.tgl_ETD v_tgl_ETD, vin.cargo v_cargo, vin.packinglist_no v_packinglist_no, vin.partai v_partai, vin.tgl_muat v_tgl_muat, vin.tgl_bongkar v_tgl_bongkar, vin_cust.customername v_customername, vin_ori.name v_ori, vin_des.name v_des, vin.trans_ v_transnumber, DATE_FORMAT(vin.tgl_indepo_real, "%Y-%m-%d") v_tgl_indepo_real, vin.outdepo_ v_tgl_outdepo, case when vin.tgl_indepo_real is null then vin.tgl_indepo ELSE vin.tgl_indepo_real END v_tgl_indepo, vin.id v_transid, vin_tra.name v_vessel, vin.lokasi_loading v_lokasi_loading, vin.lokasi_bongkar v_lokasi_bongkar, vin.uid v_uid, vin.createdBy v_createdby
FROM isotanks iso
left JOIN tr_isotank tr ON tr.id = (SELECT trs.id FROM tr_isotank trs WHERE trs.iso_id = iso.id AND ((NOW() BETWEEN trs.tgl_outdepo AND trs.tgl_indepo) OR trs.tgl_indepo < NOW()) ORDER BY trs.counter DESC LIMIT 1)
LEFT JOIN customers cust ON cust.id = tr.cust_id
LEFT JOIN location ori ON ori.id = tr.ori_id
LEFT JOIN location des ON des.id = tr.des_id
LEFT JOIN transport tra ON tra.id = tr.transport_id 
LEFT JOIN (SELECT iso.id isoid, tr.cust_id, tr.ori_id, tr.des_id, tr.transport_id, tr.transnumber trans_, tr.id, tr.tgl_outdepo outdepo_, tr.tgl_indepo, tr.transport_no, tr.tgl_ETA, tr.tgl_ETD, tr.packinglist_no, tr.partai, tr.tgl_muat, tr.tgl_bongkar, tr.cargo, tgl_indepo_real, tr.lokasi_loading, tr.lokasi_bongkar, tr.UID, tr.createdBy FROM isotanks iso left JOIN tr_isotank tr ON tr.id = (SELECT trs.id FROM tr_isotank trs WHERE trs.iso_id = iso.id AND (trs.tgl_outdepo > NOW()) ORDER BY trs.counter ASC LIMIT 1)) vin ON vin.isoid = iso.id
LEFT JOIN customers vin_cust ON vin_cust.id = vin.cust_id
LEFT JOIN location vin_ori ON vin_ori.id = vin.ori_id
LEFT JOIN location vin_des ON vin_des.id = vin.des_id
LEFT JOIN transport vin_tra ON vin_tra.id = vin.transport_id 
WHERE iso.`status` = 'R' ORDER BY iso.code asc ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
