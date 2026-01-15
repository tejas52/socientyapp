-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2026 at 01:00 PM
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
  `flat_no` int NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `reside_type` enum('Owner','Tenant','','') NOT NULL,
  `member_id` int DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `wing_id` (`wing_id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `flats`
--

INSERT INTO `flats` (`id`, `wing_id`, `flat_no`, `owner_name`, `reside_type`, `member_id`, `created`, `modified`) VALUES
(14, 6, 1302, 'Tejas Parmar', 'Owner', 1, '2025-12-17 19:46:21', NULL),
(20, 6, 1304, 'Akahay Jitendrabhai Parmar', 'Owner', 3, '2025-12-31 14:56:20', '2025-12-31 14:57:33'),
(21, 6, 1301, 'Ankit Jigdishbhai Saraiya', 'Owner', NULL, '2025-12-31 15:19:38', NULL),
(22, 6, 703, 'Ashish Prakashbhai Gheewala', 'Owner', NULL, '2025-12-31 16:17:48', NULL),
(23, 6, 1102, 'Bharatiben Dilipbhai Patel', 'Owner', NULL, '2025-12-31 16:18:50', NULL),
(24, 6, 1103, 'Dilipbhai Chandwani', 'Owner', NULL, '2025-12-31 16:19:28', NULL),
(25, 6, 804, 'Sagar Laxmikant Shah', 'Owner', NULL, '2025-12-31 16:20:08', NULL),
(28, 6, 101, 'Simona Kamal Mode', 'Owner', NULL, '2026-01-05 12:11:22', NULL),
(29, 6, 102, 'Gautam R. Pandey', 'Owner', NULL, '2026-01-05 12:11:45', NULL),
(30, 6, 103, 'Anand Kashiram More', 'Tenant', NULL, '2026-01-05 12:12:20', NULL),
(31, 6, 104, 'Vishal Manharlal Ariwala', 'Owner', NULL, '2026-01-05 12:13:31', NULL),
(32, 6, 201, 'Amitkumar Dhirubhai Morkar', 'Owner', NULL, '2026-01-05 12:14:18', NULL),
(34, 6, 202, 'Chandubhai Ahir', 'Tenant', NULL, '2026-01-05 12:15:33', NULL),
(35, 6, 203, 'Amit Balkrishna More', 'Owner', NULL, '2026-01-05 12:15:54', NULL),
(36, 6, 204, 'Ketanbhai K. Patel', 'Tenant', NULL, '2026-01-05 12:16:35', NULL),
(37, 6, 301, 'Harsh K. Gandhi', 'Owner', NULL, '2026-01-05 12:16:56', NULL),
(38, 6, 302, 'Chetan N. Rathod', 'Owner', NULL, '2026-01-05 12:17:19', NULL),
(39, 6, 303, 'Divakar Madan Singh', 'Owner', NULL, '2026-01-05 12:17:45', NULL),
(40, 6, 304, 'Chirag Narendrabhai Pachchigar', 'Owner', NULL, '2026-01-05 12:18:08', NULL),
(41, 6, 401, 'Pushpendra S. Dave', 'Owner', NULL, '2026-01-05 12:18:36', NULL),
(42, 6, 402, 'Nisarg Navinbhai Patel', 'Tenant', NULL, '2026-01-05 12:19:05', NULL),
(43, 6, 403, 'Ajaykumar Talakchand. Jingar', 'Owner', NULL, '2026-01-05 12:19:26', NULL),
(44, 6, 404, 'Nilesh R. Baraiya', 'Owner', NULL, '2026-01-05 12:19:46', NULL),
(45, 6, 501, 'Dharmeshtaben K. Patel', 'Tenant', NULL, '2026-01-05 12:20:11', NULL),
(46, 6, 502, 'Jatin Navinbhai Patel', 'Tenant', NULL, '2026-01-05 12:20:43', NULL),
(47, 6, 503, 'Harishbhai Prabhubhai Patel', 'Tenant', NULL, '2026-01-05 12:21:00', NULL),
(48, 6, 504, 'Manish M. Rasoliwala', 'Owner', NULL, '2026-01-05 12:21:36', NULL),
(49, 6, 601, 'Kamalabhen A. Polekar', 'Tenant', NULL, '2026-01-05 12:21:57', NULL),
(50, 6, 602, 'Karan P. Pardiwala', 'Tenant', NULL, '2026-01-05 12:22:21', NULL),
(51, 6, 603, 'Jayesh K. Chauhan', 'Tenant', NULL, '2026-01-05 12:22:39', NULL),
(52, 6, 604, 'Mitul J. Soni', 'Owner', NULL, '2026-01-05 12:23:02', NULL),
(53, 6, 701, 'Mihirkumar Harshadbhai Patel', 'Owner', NULL, '2026-01-05 12:23:28', NULL),
(54, 6, 702, 'Lila H. Sosa', 'Tenant', NULL, '2026-01-05 12:23:47', NULL),
(55, 6, 704, 'Jay Rajeshbhai Gandhi', 'Tenant', NULL, '2026-01-05 12:24:11', NULL),
(56, 6, 801, 'Kalpna Chetan Rahod', 'Tenant', NULL, '2026-01-05 12:25:26', NULL),
(57, 6, 802, 'Manish Sharma', 'Owner', NULL, '2026-01-05 12:26:49', NULL),
(58, 6, 803, 'Krunal Somabhai Prajapati', 'Owner', NULL, '2026-01-05 12:27:28', NULL),
(60, 6, 901, 'Kailash R. Patel', 'Owner', NULL, '2026-01-05 12:28:11', '2026-01-05 12:29:28'),
(61, 6, 902, 'Kajal Ashar', 'Owner', NULL, '2026-01-05 12:28:34', NULL),
(62, 6, 903, 'Karan Ashokbhai Pachchgar', 'Owner', NULL, '2026-01-05 12:30:01', NULL),
(63, 6, 904, 'Snehil Meharishi', 'Owner', NULL, '2026-01-05 12:30:22', NULL),
(64, 6, 1001, 'Arjun Dahyabhai Parmar', 'Tenant', NULL, '2026-01-05 12:31:34', NULL),
(65, 6, 1002, 'Kalpesh Vijaybhai Rana', 'Tenant', NULL, '2026-01-05 12:31:50', NULL),
(66, 6, 1003, 'Vipul Suresh Gandhi', 'Owner', NULL, '2026-01-05 12:32:08', NULL),
(67, 6, 1004, 'Pravin Y. Pawar', 'Owner', NULL, '2026-01-05 12:32:30', NULL),
(68, 6, 1101, 'Suraj A. Chaudhari', 'Owner', NULL, '2026-01-05 12:34:31', '2026-01-05 19:36:44'),
(69, 6, 1104, 'Vaishali Ajaybhai Vaidya', 'Owner', NULL, '2026-01-05 12:34:50', NULL),
(70, 6, 1201, 'Prakashkumar Kanaiyalal  Bhagat', 'Tenant', NULL, '2026-01-05 12:35:44', NULL),
(71, 6, 1202, 'Aasha Sagar Rana', 'Tenant', NULL, '2026-01-05 12:36:14', '2026-01-05 12:48:42'),
(72, 6, 1203, 'Chandubhai L. Gadhiya', 'Owner', NULL, '2026-01-05 12:37:15', NULL),
(73, 6, 1204, 'Ganesh Ashok Suratwala', 'Tenant', NULL, '2026-01-05 12:37:33', NULL),
(74, 6, 1303, 'Priti Jignesh Chanchad', 'Tenant', NULL, '2026-01-05 12:37:52', NULL),
(75, 6, 1401, 'Alpa R. Shroff', 'Owner', NULL, '2026-01-05 12:38:10', NULL),
(76, 6, 1402, 'Mamta Ashok Singh', 'Owner', NULL, '2026-01-05 12:38:24', NULL),
(77, 6, 1403, 'Rajendrabhai Gupta', 'Owner', NULL, '2026-01-05 12:38:47', NULL),
(78, 6, 1404, 'Sanjaybhai', 'Owner', NULL, '2026-01-05 12:39:03', NULL);

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
-- Table structure for table `income_expence`
--

DROP TABLE IF EXISTS `income_expence`;
CREATE TABLE IF NOT EXISTS `income_expence` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `transaction_date` date NOT NULL,
  `transaction_type` enum('General','Maintenance','Parking Rent') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `transaction_mode` enum('Credit','Debit') NOT NULL,
  `flat_id` int DEFAULT NULL,
  `debit_amount` int DEFAULT NULL,
  `credit_amount` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `income_expence`
--

INSERT INTO `income_expence` (`id`, `description`, `transaction_date`, `transaction_type`, `transaction_mode`, `flat_id`, `debit_amount`, `credit_amount`) VALUES
(1, 'dfdf', '2026-01-02', 'General', 'Credit', 14, NULL, 111);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_charges`
--

DROP TABLE IF EXISTS `maintenance_charges`;
CREATE TABLE IF NOT EXISTS `maintenance_charges` (
  `id` int NOT NULL AUTO_INCREMENT,
  `paid_date` date NOT NULL,
  `society_id` int NOT NULL,
  `wing_id` int NOT NULL,
  `flat_id` int NOT NULL,
  `member_id` int NOT NULL,
  `month` int NOT NULL,
  `month_number` tinyint NOT NULL,
  `year` year NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `penalty` decimal(10,2) DEFAULT '0.00',
  `penalty_paid` int NOT NULL,
  `status` enum('Pending','Paid','Partial') DEFAULT 'Pending',
  `remarks` text,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `maintenance_charges`
--

INSERT INTO `maintenance_charges` (`id`, `paid_date`, `society_id`, `wing_id`, `flat_id`, `member_id`, `month`, `month_number`, `year`, `amount`, `penalty`, `penalty_paid`, `status`, `remarks`, `created`, `modified`) VALUES
(98, '2026-01-06', 2, 6, 63, 57, 1, 0, '2026', 1300.00, 0.00, 0, 'Paid', NULL, '2026-01-06 10:21:53', '2026-01-06 10:21:53'),
(97, '2026-01-06', 2, 6, 57, 53, 1, 0, '2026', 1300.00, 0.00, 0, 'Paid', NULL, '2026-01-06 10:14:04', '2026-01-06 10:14:04'),
(95, '2026-01-05', 2, 6, 69, 28, 1, 0, '2026', 1300.00, 0.00, 0, 'Paid', NULL, '2026-01-05 20:31:46', '2026-01-05 20:31:46'),
(94, '2026-01-05', 2, 6, 56, 52, 1, 0, '2026', 1500.00, 0.00, 0, 'Paid', NULL, '2026-01-05 20:30:23', '2026-01-05 20:30:23'),
(93, '2026-01-05', 2, 6, 31, 11, 1, 0, '2026', 1300.00, 0.00, 0, 'Paid', NULL, '2026-01-05 20:25:51', '2026-01-05 20:25:51'),
(92, '2026-01-05', 2, 6, 28, 37, 1, 0, '2026', 1300.00, 0.00, 0, 'Paid', NULL, '2026-01-05 20:23:37', '2026-01-05 20:23:37'),
(91, '2026-01-04', 2, 6, 75, 34, 1, 0, '2026', 1300.00, 0.00, 0, 'Paid', NULL, '2026-01-05 20:22:48', '2026-01-05 20:22:48'),
(90, '2026-01-03', 2, 6, 78, 61, 1, 0, '2026', 1300.00, 0.00, 0, 'Paid', NULL, '2026-01-05 20:21:20', '2026-01-05 20:21:20'),
(89, '2026-01-02', 2, 6, 45, 46, 1, 0, '2026', 1500.00, 0.00, 0, 'Paid', NULL, '2026-01-05 20:18:25', '2026-01-05 20:18:25'),
(96, '2026-01-05', 2, 6, 21, 4, 1, 0, '2026', 1300.00, 0.00, 0, 'Paid', NULL, '2026-01-05 20:35:02', '2026-01-05 20:35:02'),
(75, '2026-01-01', 2, 6, 38, 15, 1, 0, '2026', 1300.00, 0.00, 0, 'Paid', NULL, '2026-01-05 15:27:58', '2026-01-05 15:27:58'),
(76, '2026-01-01', 2, 6, 48, 20, 1, 0, '2026', 1300.00, 0.00, 0, 'Paid', NULL, '2026-01-05 15:29:38', '2026-01-05 15:29:38'),
(77, '2026-01-01', 2, 6, 70, 29, 1, 0, '2026', 1500.00, 0.00, 0, 'Paid', NULL, '2026-01-05 15:31:07', '2026-01-05 15:31:07'),
(78, '2026-01-01', 2, 6, 71, 10, 1, 0, '2026', 1500.00, 0.00, 0, 'Paid', NULL, '2026-01-05 15:32:31', '2026-01-05 15:32:31'),
(79, '2026-01-01', 2, 6, 77, 35, 1, 0, '2026', 1300.00, 0.00, 0, 'Paid', NULL, '2026-01-05 15:34:09', '2026-01-05 15:34:09'),
(80, '2026-01-02', 2, 6, 47, 19, 1, 0, '2026', 1500.00, 0.00, 0, 'Paid', NULL, '2026-01-05 15:36:45', '2026-01-05 15:36:45'),
(81, '2026-01-02', 2, 6, 65, 25, 1, 0, '2026', 1500.00, 0.00, 0, 'Paid', NULL, '2026-01-05 15:37:49', '2026-01-05 15:37:49'),
(82, '2026-01-05', 2, 6, 67, 26, 1, 0, '2026', 1300.00, 0.00, 0, 'Paid', NULL, '2026-01-05 15:38:57', '2026-01-05 15:38:57'),
(83, '2026-01-02', 2, 6, 72, 31, 1, 0, '2026', 1300.00, 0.00, 0, 'Paid', NULL, '2026-01-05 15:40:11', '2026-01-05 15:40:11'),
(84, '2026-01-03', 2, 6, 46, 18, 1, 0, '2026', 1500.00, 0.00, 0, 'Paid', NULL, '2026-01-05 15:41:26', '2026-01-05 15:41:26'),
(85, '2026-01-03', 2, 6, 52, 22, 1, 0, '2026', 1300.00, 0.00, 0, 'Paid', NULL, '2026-01-05 15:42:27', '2026-01-05 15:42:27'),
(86, '2026-01-03', 2, 6, 64, 24, 1, 0, '2026', 1500.00, 0.00, 0, 'Paid', NULL, '2026-01-05 15:47:01', '2026-01-05 15:47:01'),
(87, '2026-01-03', 2, 6, 74, 33, 1, 0, '2026', 1500.00, 0.00, 0, 'Paid', NULL, '2026-01-05 15:49:14', '2026-01-05 15:49:14');

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
-- Table structure for table `maintenance_rate`
--

DROP TABLE IF EXISTS `maintenance_rate`;
CREATE TABLE IF NOT EXISTS `maintenance_rate` (
  `id` int NOT NULL,
  `wing_id` int NOT NULL,
  `reside_type` enum('Owner','Tenant','','') NOT NULL,
  `amount` int NOT NULL
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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `society_id`, `wing_id`, `flat_id`, `name`, `email`, `phone`, `created`, `modified`) VALUES
(1, 2, 6, 14, 'Tejas Parmar', 'tejasparmar1991@gmail.com', '7048578018', '2025-09-28 11:22:10', '2025-12-19 19:44:38'),
(3, 2, 6, 20, 'Akshay Jitendrabhai Parmar', 'akshay.parmar.p01@gmail.com', '8460855278', '2025-12-31 14:57:21', '2025-12-31 15:02:30'),
(4, 2, 6, 21, 'Ankit Jigdishbhai Saraiya', 'ankitjsaraiya@gmail.com', '9825560807', '2025-12-31 15:20:30', NULL),
(5, 2, 6, 25, 'Sagar Laxmikan Shah', 'sagarshah15892@gmail.com', '8085915058', '2025-12-31 16:34:44', NULL),
(6, 2, 6, 22, 'Ashish Prakashbhai  Gheewala', 'a.p.gheewala@gmail.com', '8758406232', '2025-12-31 16:36:09', NULL),
(7, 2, 6, 23, 'Bhartiben Dilipbhai Patel', 'akshaypatel2104@gmail.com', '7874245921', '2025-12-31 16:37:09', NULL),
(8, 2, 6, 24, 'Dilipbhai Chandwani', 'dilipsoni111213@gmail.com', '7737191992', '2025-12-31 16:38:05', NULL),
(10, 2, 6, 71, 'Aasha Sagar Rana', 'ranaaasha84@gmail.com', '9327945717', '2026-01-05 12:51:17', NULL),
(11, 2, 6, 31, 'Vishal Manharlal Ariwala', 'vishalariwala2013@gmail.com', '9924614925', '2026-01-05 13:14:16', NULL),
(12, 2, 6, 32, 'Amitkumar Dhirubhai Morkar', 'amitmorkar@gmail.com', '9099076674', '2026-01-05 13:15:07', '2026-01-05 19:21:25'),
(13, 2, 6, 34, 'Chandubhai R Ahir', 'ahirdivyansh5730@gmail.com', '9924555730', '2026-01-05 13:15:48', NULL),
(14, 2, 6, 37, 'Harsh K. Gandhi', 'harshgandhi7787@gmail.com', '8511175451', '2026-01-05 13:16:29', NULL),
(15, 2, 6, 38, 'Chetan N. Rathod', 'chetan020174@gemal.com', '9016227332', '2026-01-05 13:17:17', '2026-01-05 20:29:19'),
(16, 2, 6, 41, 'Pushpendra S. Dave', 'dpushapendar15@gmail.com', '9898563904', '2026-01-05 13:17:58', NULL),
(17, 2, 6, 44, 'Nilesh R. Baraiya', 'nileshbaraiya@ymail.com', '9825646390', '2026-01-05 13:22:08', NULL),
(18, 2, 6, 46, 'Jatin Navinbhai Patel', 'pateljatin1412@gmail.com', '9099115200', '2026-01-05 13:22:51', NULL),
(19, 2, 6, 47, 'Harishbhai Prabhubhai Patel', 'harishpatel1446@Gmail.com', '9825750504', '2026-01-05 13:23:33', NULL),
(20, 2, 6, 48, 'Manish M. Rasoliwala', 'pritirasoliwala@gmail.com', '8401883678', '2026-01-05 13:24:07', NULL),
(21, 2, 6, 50, 'Karan P. Pardiwala', 'karu786@gmail.com', '9924462678', '2026-01-05 13:24:44', NULL),
(22, 2, 6, 52, 'Mitul Jitendrakumar soni', 'mitulsoni64@gmail.com', '9408962876', '2026-01-05 13:25:19', '2026-01-05 15:44:44'),
(23, 2, 6, 62, 'Karan Ashokbhai Pachchgar', 'pachchigarkaran7@gmail.com', '9879609940', '2026-01-05 13:25:59', NULL),
(24, 2, 6, 64, 'Arjun Dahyabhai Parmar', 'arjunparmar0786@gmail.com', '9898088961', '2026-01-05 13:26:40', '2026-01-05 15:48:09'),
(25, 2, 6, 65, 'Kalpesh Vijaybhai Rana', 'krana431@gmaill.com', '7874914308', '2026-01-05 13:28:11', NULL),
(26, 2, 6, 67, 'Pravin Y. Pawar', 'praveenpawar81@gmail.com', '9879102263', '2026-01-05 13:28:58', NULL),
(27, 2, 6, 68, 'Suraj A. Chaudhari', 'surajchaudhari1@gmail.com', '9574735873', '2026-01-05 13:29:47', NULL),
(28, 2, 6, 69, 'Vaishali Ajaybhai Vaidya', 'v64607293@gmail.com', '8849767145', '2026-01-05 13:30:33', NULL),
(29, 2, 6, 70, 'Prakashkumar Kanaiyalal Bhagat', 'prakashbhagat197@gmail.com', '9909110878', '2026-01-05 13:31:05', NULL),
(30, 2, 6, 71, 'Aasha Sagar Rana', 'ranaaasha84@gmail.com', '9327945717', '2026-01-05 13:31:52', NULL),
(31, 2, 6, 72, 'Chandubhai L. Gadhiya', 'geetagadiya1960@gmail.com', '8767567559', '2026-01-05 13:32:26', NULL),
(32, 2, 6, 73, 'Ganesh Ashok Suratwala', 'ganesh_suratwala@yahoo.com', '8767082877', '2026-01-05 13:33:00', NULL),
(33, 2, 6, 74, 'Priti Jignesh Chanchad', 'jigneshchanchad@gmail.com', '8767474144', '2026-01-05 13:33:35', NULL),
(34, 2, 6, 75, 'Alpa R. Shrauf', 'vishvshroff54@gmail.com', '8690991673', '2026-01-05 13:34:12', NULL),
(35, 2, 6, 77, 'Rajendrabhai Gupta', 'rajangupta3292@gmail.com', '8141682608', '2026-01-05 13:34:49', NULL),
(37, 2, 6, 28, 'Simona Kamal Modi', '', '', '2026-01-05 19:19:34', NULL),
(38, 2, 6, 29, 'Gautam R. Pandey', '', '', '2026-01-05 19:20:36', NULL),
(39, 2, 6, 30, 'Anand Kashiram More', '', '', '2026-01-05 19:20:59', NULL),
(40, 2, 6, 35, 'Amit Balkrishna More', '', '', '2026-01-05 19:22:04', NULL),
(41, 2, 6, 36, 'Ketanbhai K. Patel', 'ketanpatel1887@gmail.com', '9586800028', '2026-01-05 19:22:30', '2026-01-06 10:11:24'),
(42, 2, 6, 39, 'Divakar Madan Singh', '', '', '2026-01-05 19:23:01', NULL),
(43, 2, 6, 40, 'Chirag Narendrabhai Pachchigar', '', '', '2026-01-05 19:23:48', NULL),
(44, 2, 6, 42, 'Nisarg Navinbhai Patel', 'nishargpatel6801@gmail.com', '9879658995', '2026-01-05 19:24:12', '2026-01-06 12:13:11'),
(45, 2, 6, 43, 'Ajaykumar Talakchand. Jingar', '', '', '2026-01-05 19:24:30', NULL),
(46, 2, 6, 45, 'Dharmeshtaben K. Patel', 'dharmisthapatel180476@gmail.com', '9375742954', '2026-01-05 19:24:55', '2026-01-06 10:10:17'),
(47, 2, 6, 49, 'Kamalabhen A. Polekar', '', '', '2026-01-05 19:26:08', NULL),
(48, 2, 6, 51, 'Jayesh K. Chauhan', '', '', '2026-01-05 19:26:39', NULL),
(49, 2, 6, 53, 'Mihirkumar Hareshbhai Patel', 'mihirpatel5141@gmail.com', '9725155141', '2026-01-05 19:27:23', '2026-01-06 10:07:52'),
(50, 2, 6, 54, 'Lila H. Sosa', '', '', '2026-01-05 19:27:44', NULL),
(51, 2, 6, 55, 'Jay Rajeshbhai Gandhi', '', '', '2026-01-05 19:28:02', NULL),
(52, 2, 6, 56, 'Chetan V. Rathod', '', '', '2026-01-05 19:29:07', NULL),
(53, 2, 6, 57, 'Manish Sharma', '', '', '2026-01-05 19:29:23', NULL),
(54, 2, 6, 58, 'Krunal Somabhai Prajapati', '', '', '2026-01-05 19:30:09', NULL),
(55, 2, 6, 60, 'Kailash R. Patel', '', '', '2026-01-05 19:30:54', NULL),
(56, 2, 6, 61, 'Kajal Jignesh Asar', '', '', '2026-01-05 19:32:49', NULL),
(57, 2, 6, 63, 'Snehal Meharishi', '', '', '2026-01-05 19:33:21', NULL),
(58, 2, 6, 66, 'Vipul Gandhi', '', '', '2026-01-05 19:33:52', NULL),
(60, 2, 6, 76, 'Mamta Ashok Singh', '', '', '2026-01-05 19:39:14', NULL),
(61, 2, 6, 78, 'Sanjaybhai', '', '', '2026-01-05 19:39:31', '2026-01-05 19:40:08');

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
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created`, `modified`) VALUES
(1, 'admin', '2025-12-20 00:36:44', '2025-12-20 00:36:44'),
(2, 'society_admin', '2025-12-20 00:36:44', '2025-12-20 00:36:44'),
(3, 'member', '2025-12-20 00:36:44', '2025-12-20 00:36:44');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `societies`
--

INSERT INTO `societies` (`id`, `name`, `address`, `created`, `modified`) VALUES
(2, 'Ramaa Residency', 'Jahangirabad1', '2025-09-20 19:39:30', '2025-11-06 19:35:14'),
(4, 'Subham Height', 'jahangirabad', '2025-12-27 13:51:19', '2025-12-27 13:51:19');

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int NOT NULL,
  `society_id` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wings`
--

INSERT INTO `wings` (`id`, `name`, `society_id`, `created`, `modified`) VALUES
(2, 'A22', 2, '2025-09-20 19:46:27', '2025-12-28 09:13:31'),
(3, 'B1', 2, '2025-09-20 19:46:39', NULL),
(4, 'B2', 2, '2025-09-20 19:46:54', NULL),
(5, 'C1', 2, '2025-09-20 19:47:02', NULL),
(6, 'C2', 2, '2025-09-20 19:47:10', NULL),
(7, 'D1', 2, '2025-09-20 19:47:16', NULL),
(8, 'D2', 2, '2025-09-20 19:47:21', NULL),
(9, 'D3', 2, '2025-09-20 19:47:28', NULL),
(10, 'E2', 2, '2025-12-28 11:39:45', NULL);

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
