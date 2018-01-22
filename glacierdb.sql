-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for glacierdb
CREATE DATABASE IF NOT EXISTS `glacierdb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `glacierdb`;

-- Dumping structure for table glacierdb.usertype
CREATE TABLE IF NOT EXISTS `usertype` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Contains information about the user type.';

-- Dumping data for table glacierdb.usertype: ~4 rows (approximately)
/*!40000 ALTER TABLE `usertype` DISABLE KEYS */;
INSERT INTO `usertype` (`ID`, `name`, `status`) VALUES
	(1, 'Admin', 1),
	(2, 'Employee', 1),
	(3, 'Conti-Partner', 1),
	(4, 'Customer', 1);
/*!40000 ALTER TABLE `usertype` ENABLE KEYS */;
-- Dumping structure for table glacierdb.users
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `No` varchar(15) NOT NULL DEFAULT '0',
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `usertype` int(11) NOT NULL,
  `firstTimeLogin` int(11) DEFAULT NULL,
  `resetCode` int(11) NOT NULL DEFAULT '0',
  `createdBy` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  KEY `Usertype` (`usertype`),
  CONSTRAINT `Usertype` FOREIGN KEY (`usertype`) REFERENCES `usertype` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Table contains users login information.';

-- Dumping data for table glacierdb.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`ID`, `No`, `firstName`, `middleName`, `lastName`, `email`, `password`, `usertype`, `firstTimeLogin`, `resetCode`, `createdBy`, `status`) VALUES
	(1, 'E000000012', 'Joshua', 'Bakasa', 'Neyole', 'joshua.bakasa@dataposit.co.ke', 'ae8a97165a6cd640a149ec76965d51b7559d164d', 1, NULL, 0, NULL, 1),
	(2, 'E000000013', 'Joshua', 'Bakasa', 'Neyole', 'baksajoshua09@gmail.com', 'ae8a97165a6cd640a149ec76965d51b7559d164d', 1, NULL, 0, 'joshua.bakasa@dataposit.co.ke', 1),
	(3, 'C0000000050', 'HEKIMA', 'AUTO', 'TYRES', 'bakasajoshua09@gmail.com', 'ae8a97165a6cd640a149ec76965d51b7559d164d', 4, NULL, 0, NULL, 1),
	(4, '05', 'MOSES', '', 'SADIQUE', 'joshua.bakasa@strathmore.edu', 'ae8a97165a6cd640a149ec76965d51b7559d164d', 2, NULL, 0, NULL, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
