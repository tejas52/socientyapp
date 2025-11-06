-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2025 at 07:55 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `society`
--

-- --------------------------------------------------------

--
-- Table structure for table `flats`
--

DROP TABLE IF EXISTS `flats`;
CREATE TABLE IF NOT EXISTS `flats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `wing_id` int NOT NULL,
  `flat_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `member_id` int DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `wing_id` (`wing_id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `flats`
--

INSERT INTO `flats` (`id`, `wing_id`, `flat_no`, `owner_name`, `member_id`, `created`, `modified`) VALUES
(5, 6, '', 'Simona Kamal Modi', 1, '2025-10-05 15:58:27', NULL),
(6, 6, '', 'simana fkljfa', 2, '2025-10-05 15:58:55', NULL),
(7, 6, '', 'Gautam pandey', 1, '2025-10-08 16:49:50', NULL),
(8, 6, '', 'fafadf', NULL, '2025-10-08 16:53:02', NULL),
(9, 3, '', 'fafafa', 2, '2025-10-08 16:56:03', NULL),
(10, 3, '401', '14313', 2, '2025-10-08 16:56:56', '2025-10-08 19:43:08'),
(11, 2, '201', 'dfadf', 2, '2025-10-08 16:57:55', '2025-10-08 19:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `flats_2`
--

DROP TABLE IF EXISTS `flats_2`;
CREATE TABLE IF NOT EXISTS `flats_2` (
  `id` int NOT NULL AUTO_INCREMENT,
  `wing_id` int NOT NULL,
  `flat_no` varchar(20) NOT NULL,
  `member_id` int DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `wing_id` (`wing_id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_charges`
--

DROP TABLE IF EXISTS `maintenance_charges`;
CREATE TABLE IF NOT EXISTS `maintenance_charges` (
  `id` int NOT NULL AUTO_INCREMENT,
  `society_id` int NOT NULL,
  `wing_id` int NOT NULL,
  `flat_id` int NOT NULL,
  `month` year NOT NULL,
  `month_number` tinyint NOT NULL,
  `year` year NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `penalty` decimal(10,2) DEFAULT '0.00',
  `status` enum('Pending','Paid','Partial') DEFAULT 'Pending',
  `remarks` text,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_payments`
--

DROP TABLE IF EXISTS `maintenance_payments`;
CREATE TABLE IF NOT EXISTS `maintenance_payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `maintenance_charge_id` int NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `penalty_paid` decimal(10,2) DEFAULT '0.00',
  `payment_date` date NOT NULL,
  `payment_mode` enum('Cash','Cheque','Online','UPI') DEFAULT 'Cash',
  `reference_no` varchar(100) DEFAULT NULL,
  `remarks` text,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `maintenance_charge_id` (`maintenance_charge_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `society_id` int NOT NULL,
  `wing_id` int NOT NULL,
  `flat_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `society_id` (`society_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `society_id`, `wing_id`, `flat_id`, `name`, `email`, `phone`, `created`, `modified`) VALUES
(1, 2, 6, 3, 'Tejas Parmar', 'tejasparmar1991@gmail.com', '07048578018', '2025-09-28 11:22:10', NULL),
(2, 2, 1, 3, 'Tejas Parmar', 'tejasparmar1991@gmail.com', '07048578018', '2025-09-28 12:01:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `members_2`
--

DROP TABLE IF EXISTS `members_2`;
CREATE TABLE IF NOT EXISTS `members_2` (
  `id` int NOT NULL AUTO_INCREMENT,
  `society_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `society_id` (`society_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog_2`
--

DROP TABLE IF EXISTS `phinxlog_2`;
CREATE TABLE IF NOT EXISTS `phinxlog_2` (
  `version` bigint NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `societies`
--

DROP TABLE IF EXISTS `societies`;
CREATE TABLE IF NOT EXISTS `societies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `societies`
--

INSERT INTO `societies` (`id`, `name`, `address`, `created`, `modified`) VALUES
(2, 'Ramaa Residency', 'Jahangirabad1', '2025-09-20 19:39:30', '2025-11-06 19:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `societies_2`
--

DROP TABLE IF EXISTS `societies_2`;
CREATE TABLE IF NOT EXISTS `societies_2` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `society_maintenance_phinxlog`
--

DROP TABLE IF EXISTS `society_maintenance_phinxlog`;
CREATE TABLE IF NOT EXISTS `society_maintenance_phinxlog` (
  `version` bigint NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wings`
--

DROP TABLE IF EXISTS `wings`;
CREATE TABLE IF NOT EXISTS `wings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `society_id` int NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `society_id` (`society_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wings`
--

INSERT INTO `wings` (`id`, `name`, `society_id`, `created`, `modified`) VALUES
(2, 'A2', 2, '2025-09-20 19:46:27', NULL),
(3, 'B1', 2, '2025-09-20 19:46:39', NULL),
(4, 'B2', 2, '2025-09-20 19:46:54', NULL),
(5, 'C1', 2, '2025-09-20 19:47:02', NULL),
(6, 'C2', 2, '2025-09-20 19:47:10', NULL),
(7, 'D1', 2, '2025-09-20 19:47:16', NULL),
(8, 'D2', 2, '2025-09-20 19:47:21', NULL),
(9, 'D3', 2, '2025-09-20 19:47:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wings_2`
--

DROP TABLE IF EXISTS `wings_2`;
CREATE TABLE IF NOT EXISTS `wings_2` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `society_id` int NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `society_id` (`society_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flats`
--
ALTER TABLE `flats`
  ADD CONSTRAINT `flats_ibfk_1` FOREIGN KEY (`wing_id`) REFERENCES `wings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `flats_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `flats_2`
--
ALTER TABLE `flats_2`
  ADD CONSTRAINT `flats_2_ibfk_1` FOREIGN KEY (`wing_id`) REFERENCES `wings_2` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `flats_2_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `members_2` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`society_id`) REFERENCES `societies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `members_2`
--
ALTER TABLE `members_2`
  ADD CONSTRAINT `members_2_ibfk_1` FOREIGN KEY (`society_id`) REFERENCES `societies_2` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wings`
--
ALTER TABLE `wings`
  ADD CONSTRAINT `wings_ibfk_1` FOREIGN KEY (`society_id`) REFERENCES `societies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wings_2`
--
ALTER TABLE `wings_2`
  ADD CONSTRAINT `wings_2_ibfk_1` FOREIGN KEY (`society_id`) REFERENCES `societies_2` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
