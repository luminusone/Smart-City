-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2019 at 12:29 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartcitydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `light`
--

DROP TABLE IF EXISTS `light`;
CREATE TABLE IF NOT EXISTS `light` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `street_id` int(11) NOT NULL,
  `light_title` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `is_turnon` tinyint(1) NOT NULL,
  `is_available` tinyint(1) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `street_id` (`street_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `light`
--

INSERT INTO `light` (`id`, `street_id`, `light_title`, `is_turnon`, `is_available`, `created_date`, `update_date`) VALUES
(1, 6, 'Light 4', 1, 1, '2019-05-22 10:00:00', '2019-05-22 15:18:07'),
(2, 7, 'light 1', 0, 1, '2019-05-24 17:43:45', '2019-05-24 17:43:45'),
(3, 6, 'light 1', 0, 1, '2019-05-24 17:46:44', '2019-06-02 15:31:32'),
(4, 5, 'Light 110', 0, 1, '2019-06-02 11:44:35', '2019-06-02 11:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `pollution`
--

DROP TABLE IF EXISTS `pollution`;
CREATE TABLE IF NOT EXISTS `pollution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `street_id` int(11) NOT NULL,
  `status_pollution` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `street_id` (`street_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pollution`
--

INSERT INTO `pollution` (`id`, `street_id`, `status_pollution`, `created_date`, `update_date`) VALUES
(2, 7, 'sdsád', NULL, NULL),
(3, 2, '0', '2019-06-01 22:23:11', '2019-06-01 22:23:11'),
(4, 5, '1', '2019-06-01 22:25:51', '2019-06-01 22:25:51'),
(5, 5, '0', '2019-06-01 22:27:59', '2019-06-01 22:27:59'),
(6, 4, '1', '2019-06-01 22:30:02', '2019-06-01 22:30:02'),
(7, 4, '0', '2019-06-01 22:30:27', '2019-06-01 22:30:27'),
(8, 2, '1', '2019-06-01 22:31:10', '2019-06-01 22:31:10'),
(9, 6, '1', '2019-06-01 22:35:21', '2019-06-01 22:35:21'),
(10, 6, '0', '2019-06-01 22:37:40', '2019-06-01 22:37:40'),
(11, 6, '1', '2019-06-01 22:40:26', '2019-06-01 22:40:26'),
(12, 1, '0', '2019-06-01 22:41:08', '2019-06-01 22:41:08'),
(13, 7, '1', '2019-06-02 11:35:17', '2019-06-02 11:35:17'),
(14, 7, '0', '2019-06-02 11:36:25', '2019-06-02 11:36:25'),
(15, 7, '0', '2019-06-02 11:41:49', '2019-06-02 11:41:49'),
(16, 7, '0', '2019-06-02 11:42:03', '2019-06-02 11:42:03'),
(17, 7, '1', '2019-06-02 11:42:23', '2019-06-02 11:42:23'),
(18, 1, '0', '2019-06-02 12:50:37', '2019-06-02 12:50:37'),
(19, 7, '1', '2019-06-03 00:17:25', '2019-06-03 00:17:25'),
(20, 7, '1', '2019-06-03 00:18:30', '2019-06-03 00:18:30'),
(21, 7, '1', '2019-06-03 00:18:49', '2019-06-03 00:18:49'),
(22, 7, '1', '2019-06-03 00:20:27', '2019-06-03 00:20:27'),
(23, 7, '1', '2019-06-03 00:22:09', '2019-06-03 00:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `smart_street`
--

DROP TABLE IF EXISTS `smart_street`;
CREATE TABLE IF NOT EXISTS `smart_street` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_street` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `total_light` int(11) NOT NULL DEFAULT '0',
  `current_trafic` int(11) NOT NULL DEFAULT '1',
  `current_pollution` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `smart_street`
--

INSERT INTO `smart_street` (`id`, `name_street`, `total_light`, `current_trafic`, `current_pollution`, `created_date`, `update_date`) VALUES
(1, 'Rue de Yaya', 0, 1, 0, '2019-05-14 00:50:00', '2019-06-02 14:50:37'),
(2, 'Rue de Ha', 0, 2, 1, '2019-05-14 00:50:00', '2019-06-02 00:31:10'),
(3, 'Rue de Bang', 0, 1, 1, '2019-05-14 00:50:00', '2019-05-14 00:50:00'),
(4, 'Rue de Ines', 0, 1, 0, '2019-05-21 15:53:30', '2019-06-02 00:30:27'),
(5, 'Rue de Tarshini', 1, 1, 0, '2019-05-21 15:58:34', '2019-06-02 13:44:35'),
(6, 'Rue de Elisa', 2, 0, 1, '2019-05-22 03:45:39', '2019-06-02 00:40:26'),
(7, 'Boulevard de Max', 1, 1, 1, '2019-05-24 17:42:09', '2019-06-03 02:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `trafic`
--

DROP TABLE IF EXISTS `trafic`;
CREATE TABLE IF NOT EXISTS `trafic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `street_id` int(11) NOT NULL,
  `status_trafic` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `street_id` (`street_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trafic`
--

INSERT INTO `trafic` (`id`, `street_id`, `status_trafic`, `created_date`, `update_date`) VALUES
(1, 6, 2, '2019-05-22 06:32:40', '2019-05-22 06:32:40'),
(2, 6, 2, '2019-05-22 06:33:21', '2019-05-22 06:33:21'),
(3, 6, 2, '2019-05-22 06:36:07', '2019-05-22 06:36:07'),
(4, 6, 2, '2019-05-22 06:39:14', '2019-05-22 06:39:14'),
(5, 6, 0, '2019-05-22 06:40:39', '2019-05-22 06:40:39'),
(6, 6, 2, '2019-05-22 06:40:59', '2019-05-22 06:40:59'),
(7, 6, 1, '2019-05-22 06:41:18', '2019-05-22 06:41:18'),
(8, 6, 2, '2019-05-22 06:41:51', '2019-05-22 06:41:51'),
(9, 6, 0, '2019-05-22 06:42:59', '2019-05-22 06:42:59'),
(10, 6, 2, '2019-05-22 06:44:03', '2019-05-22 06:44:03'),
(11, 6, 2, '2019-05-22 06:44:29', '2019-05-22 06:44:29'),
(12, 6, 0, '2019-05-24 17:35:45', '2019-05-24 17:35:45'),
(13, 2, 2, '2019-05-31 11:45:46', '2019-05-31 11:45:46'),
(14, 2, 2, '2019-05-31 11:46:57', '2019-05-31 11:46:57'),
(15, 2, 2, '2019-05-31 11:47:51', '2019-05-31 11:47:51'),
(16, 7, 1, '2019-06-01 22:42:31', '2019-06-01 22:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `firstname` text COLLATE utf8_unicode_ci NOT NULL,
  `lastname` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `location` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `age`, `location`, `date`, `avatar`) VALUES
(1, 'Bang', 'Nguyen', 'khietbang.7501@gmail.com', 23, 'Creteil', '2019-06-01', 'assets/images/signin-avatar.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
