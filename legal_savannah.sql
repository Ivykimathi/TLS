-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 05:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `legal_savannah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aemail` varchar(255) NOT NULL,
  `apassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aemail`, `apassword`) VALUES
('admin@tls.com', '0987');

-- --------------------------------------------------------

--
-- Table structure for table `advocate`
--

CREATE TABLE `advocate` (
  `advid` int(11) NOT NULL,
  `advemail` varchar(255) DEFAULT NULL,
  `advname` varchar(255) DEFAULT NULL,
  `advpassword` varchar(255) DEFAULT NULL,
  `advaddress` varchar(255) DEFAULT NULL,
  `advnic` varchar(15) DEFAULT NULL,
  `advdob` date DEFAULT NULL,
  `advtel` varchar(15) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL,
  `specialties` varchar(100) DEFAULT '4'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advocate`
--

INSERT INTO `advocate` (`advid`, `advemail`, `advname`, `advpassword`, `advaddress`, `advnic`, `advdob`, `advtel`, `verified`, `specialties`) VALUES
(1, 'janedoe@gmail.com', 'Jane Doe', '0987', 'Ruai', '90234562', '2003-12-01', '0712567843', 1, '3'),
(2, 'mumondunda@gmail.com', 'mumo ndunda', 'sakina2001', 'githunguri', '12345678', '2002-02-01', '0740678954', 1, '1'),
(3, 'johndoe@gmail.com', 'John Doe', '0987', 'Utawala', '40203610', '1980-02-01', '0115151539', 1, '4'),
(4, 'kacyobrienz@gmail.com', 'Kacy OBrien', '0987', '11309 Ellison Wilson Rd', '12324534', '2003-12-09', '0700987654', 1, '2'),
(5, 'saka@gmail.com', 'Joel Sakin', 'kilo', 'meru', '30293561', '2000-01-30', '0722386231', 1, '6');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appoid` int(11) NOT NULL,
  `pid` int(10) DEFAULT NULL,
  `apponum` int(3) DEFAULT NULL,
  `scheduleid` int(10) DEFAULT NULL,
  `appodate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoid`, `pid`, `apponum`, `scheduleid`, `appodate`) VALUES
(5, 1, 2, 4, '2023-08-05'),
(6, 1, 1, 5, '2023-08-07'),
(8, 21, 1, 16, '2024-04-06'),
(9, 21, 1, 15, '2024-04-06'),
(12, 13, 1, 14, '2024-04-06'),
(13, 2, 2, 14, '2024-04-06'),
(16, 21, 1, 20, '2024-04-06'),
(17, 21, 1, 19, '2024-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `pid` int(11) NOT NULL,
  `pemail` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `ppassword` varchar(255) DEFAULT NULL,
  `paddress` varchar(255) DEFAULT NULL,
  `pnic` varchar(15) DEFAULT NULL,
  `pdob` date DEFAULT NULL,
  `ptel` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`pid`, `pemail`, `pname`, `ppassword`, `paddress`, `pnic`, `pdob`, `ptel`) VALUES
(1, 'sakindeborah@gmail.com', 'sakin sddsd', 'sakina2001', 'asdadaf', '39890768', '2000-10-31', '0712345678'),
(2, 'dre@gmail.com', 'Kacy OBrien', '0987', '11309 Ellison Wilson Rd', '12324534', '2023-06-28', '0789000000'),
(3, 'davidmumondunda@gmail.com', 'Mumo  Ndunda', 'wakandaforever', 'Kariobangi', '38150945', '2001-04-11', '0740250165'),
(4, 'sakinduku@gmail.com', 'DRE Stevens', '0987', '11309 Ellison Wilson Rd', '12345678', '2001-02-02', '0712354627'),
(5, 'sakina213@gmail.com', 'DRE Stevens', '0987', '11309 Ellison Wilson Rd', '12345678', '2001-02-02', '0712358232'),
(6, 'sakina213@gmail.com', 'DRE Stevens', '0987', '11309 Ellison Wilson Rd', '12345678', '2001-02-02', '0712358232'),
(7, 'sakindre@gmail.com', 'DRE Stevens', '0987', '11309 Ellison Wilson Rd', '12345678', '2001-02-02', '0700112211'),
(10, 'sakin0987@gmail.com', 'Deborah Sakin', '0987', 'Chokaa, Nairobi', '40203610', '2001-12-12', '0115151539'),
(11, 'sakin12637@gmail.com', 'Deborah Sakin', '0987', 'Chokaa, Nairobi', '40203610', '2001-12-12', '0115151539'),
(12, 'sakina123@gmail.com', 'Deborah Sakin', '09876', 'Chokaa, Nairobi', '40203610', '2001-12-12', '0115151539'),
(13, 'sakin25432@gmail.com', 'Deborah Sakin', 'sakina', 'Chokaa, Nairobi', '40203610', '2001-12-12', '0115151539'),
(14, 'sakoasd@gmail.com', 'Deborah Sakin', '0987', 'Chokaa, Nairobi', '40203610', '2001-12-12', '0115151539'),
(15, 'sakin98123@gmail.com', 'Kacy OBrien', '0987', '11309 Ellison Wilson Rd', '38150945', '2003-12-02', '0115151539'),
(16, 'sakin1263@gmail.com', 'Kacy OBrien', '0987', '11309 Ellison Wilson Rd', '38150945', '2003-12-02', '0115151539'),
(17, 'sakcad@gmail.com', 'Kacy OBrien', '0987', '11309 Ellison Wilson Rd', '38150945', '2003-12-02', '0115151539'),
(18, 'sakin25412@gmail.com', 'Kacy OBrien', '0987', '11309 Ellison Wilson Rd', '38150945', '2003-12-02', '0115151539'),
(19, 'sakinklasc@gmail.com', 'Kacy OBrien', '0987', '11309 Ellison Wilson Rd', '38150945', '2003-12-02', '0115151539'),
(20, 'sakin@gmail.com', ' ', 'Sakina@2001', '', '', '0000-00-00', '0115151539'),
(21, 'kajujuivy7872@gmail.com', 'ivy kimathi', '123456', '1289', '123456', '2024-04-03', '0726508594');

-- --------------------------------------------------------

--
-- Table structure for table `confirmation_codes`
--

CREATE TABLE `confirmation_codes` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `confirmation_codes`
--

INSERT INTO `confirmation_codes` (`id`, `email`, `code`, `created_at`) VALUES
(15, 'sakinklasc@gmail.com', 846439, '2023-08-04 16:23:32'),
(16, 'sakin@gmail.com', 255403, '2023-08-05 06:52:35'),
(17, 'kajujuivy7872@gmail.com', 717595, '2024-04-04 17:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `convo_list`
--

CREATE TABLE `convo_list` (
  `id` int(30) NOT NULL,
  `from_user` int(30) NOT NULL,
  `to_user` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(30) NOT NULL,
  `from_user` int(30) NOT NULL,
  `to_user` int(30) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = text , 2 = photos,3 = videos, 4 = documents',
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `popped` tinyint(1) NOT NULL DEFAULT 0,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_user`, `to_user`, `type`, `message`, `status`, `popped`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 1, 2, 1, 'test', 1, 1, 0, '2021-10-16 11:45:21', '2021-10-17 19:36:34'),
(2, 1, 2, 1, '1', 1, 1, 0, '2021-10-16 11:45:25', '2021-10-17 19:36:34'),
(3, 1, 2, 1, '2', 1, 1, 0, '2021-10-16 11:45:26', '2021-10-17 19:36:34'),
(4, 1, 2, 1, '3', 1, 1, 0, '2021-10-16 11:45:28', '2021-10-17 19:36:34'),
(5, 1, 2, 1, '4', 1, 1, 0, '2021-10-16 11:45:30', '2021-10-17 19:36:34'),
(6, 1, 2, 1, '5', 1, 1, 0, '2021-10-16 11:45:31', '2021-10-17 19:36:34'),
(7, 1, 2, 1, '6', 1, 1, 0, '2021-10-16 11:45:32', '2021-10-17 19:36:34'),
(8, 1, 2, 1, '7', 1, 1, 0, '2021-10-16 11:45:34', '2021-10-17 19:36:34'),
(9, 1, 2, 1, '8', 1, 1, 0, '2021-10-16 11:45:35', '2021-10-17 19:36:34'),
(10, 1, 2, 1, '9', 1, 1, 0, '2021-10-16 11:45:37', '2021-10-17 19:36:34'),
(11, 1, 2, 1, '10', 1, 1, 0, '2021-10-16 11:45:42', '2021-10-17 19:36:34'),
(12, 1, 2, 1, '11', 1, 1, 0, '2021-10-16 11:45:44', '2021-10-17 19:36:34'),
(13, 1, 2, 1, '12', 1, 1, 0, '2021-10-16 11:45:47', '2021-10-17 19:36:34'),
(14, 1, 2, 1, '13', 1, 1, 0, '2021-10-16 11:45:51', '2021-10-17 19:36:34'),
(15, 1, 2, 1, '14', 1, 1, 0, '2021-10-16 11:45:54', '2021-10-17 19:36:34'),
(16, 1, 2, 1, '15', 1, 1, 0, '2021-10-16 11:45:57', '2021-10-17 19:36:34'),
(17, 2, 1, 1, '16', 1, 1, 0, '2021-10-16 11:52:45', '2021-10-17 19:37:00'),
(18, 2, 1, 1, '17', 1, 1, 0, '2021-10-16 11:52:49', '2021-10-17 19:37:00'),
(19, 2, 1, 1, '18', 1, 1, 0, '2021-10-16 11:52:54', '2021-10-17 19:37:00'),
(20, 2, 1, 1, '19', 1, 1, 0, '2021-10-16 11:52:57', '2021-10-17 19:37:00'),
(21, 2, 1, 1, '20', 1, 1, 0, '2021-10-16 11:53:06', '2021-10-17 19:37:00'),
(22, 2, 1, 1, '21', 1, 1, 0, '2021-10-16 11:58:48', '2021-10-17 19:37:00'),
(23, 2, 1, 1, 'test', 1, 1, 0, '2021-10-16 12:03:40', '2021-10-17 19:37:00'),
(24, 2, 1, 1, 'test', 1, 1, 0, '2021-10-16 12:04:48', '2021-10-17 19:37:00'),
(25, 1, 2, 1, 're', 1, 1, 0, '2021-10-16 12:05:03', '2021-10-17 19:36:34'),
(26, 1, 2, 1, 'wew', 1, 1, 0, '2021-10-16 12:05:19', '2021-10-17 19:36:34'),
(27, 2, 1, 1, 'hey John', 1, 1, 0, '2021-10-17 18:43:58', '2021-10-17 19:37:00'),
(28, 1, 3, 1, 'Hi Sam', 1, 1, 0, '2021-10-17 18:50:20', '2021-10-17 19:42:15'),
(29, 1, 2, 1, 'claire', 1, 1, 0, '2021-10-17 18:50:37', '2021-10-17 19:36:34'),
(30, 3, 1, 1, 'hey john', 1, 1, 0, '2021-10-17 19:42:31', '2021-10-17 19:43:18'),
(31, 1, 2, 1, 'test', 1, 0, 0, '2021-10-17 19:42:43', '2021-10-17 19:42:44'),
(32, 3, 1, 1, 'yow', 1, 1, 0, '2021-10-17 19:43:22', '2021-10-17 19:43:49'),
(33, 1, 2, 1, 'claire', 1, 0, 1, '2021-10-17 19:43:57', '2021-10-18 00:01:46'),
(34, 3, 1, 1, 'john??', 1, 1, 0, '2021-10-17 19:44:30', '2021-10-17 19:46:01'),
(35, 3, 1, 1, 'test', 1, 1, 0, '2021-10-17 19:45:42', '2021-10-17 19:46:01'),
(36, 3, 1, 1, 'hey', 1, 1, 0, '2021-10-17 19:46:12', '2021-10-17 19:46:26'),
(37, 3, 1, 1, 'psst', 1, 1, 0, '2021-10-17 19:46:33', '2021-10-17 19:47:47'),
(38, 3, 1, 1, 'John??', 1, 1, 0, '2021-10-17 19:47:00', '2021-10-17 19:47:47'),
(39, 3, 1, 1, 'hey you', 1, 1, 0, '2021-10-17 19:47:27', '2021-10-17 19:47:47'),
(40, 3, 1, 1, 'test', 1, 1, 0, '2021-10-17 19:47:54', '2021-10-17 19:50:50'),
(41, 1, 2, 1, '123', 1, 0, 0, '2021-10-17 19:49:08', '2021-10-17 19:49:09'),
(42, 3, 1, 1, '1234', 1, 1, 0, '2021-10-17 19:49:17', '2021-10-17 19:50:50'),
(43, 3, 1, 1, 'test', 1, 1, 0, '2021-10-17 19:50:04', '2021-10-17 19:50:50'),
(44, 3, 1, 1, 'qweqwe', 1, 1, 0, '2021-10-17 19:50:42', '2021-10-17 19:50:50'),
(45, 3, 1, 1, 'aaa', 1, 1, 0, '2021-10-17 19:50:57', '2021-10-17 19:52:52'),
(46, 3, 1, 1, 'John??', 1, 1, 0, '2021-10-17 19:51:38', '2021-10-17 19:52:52'),
(47, 1, 2, 1, 'calire??', 1, 0, 0, '2021-10-17 19:51:50', '2021-10-17 19:51:51'),
(48, 3, 1, 1, 'hey', 1, 1, 0, '2021-10-17 19:52:02', '2021-10-17 19:52:52'),
(49, 3, 1, 1, 'yes ?', 1, 1, 0, '2021-10-17 19:52:58', '2021-10-17 19:53:09'),
(59, 4, 1, 1, 'dude', 1, 1, 0, '2021-10-17 20:15:38', '2021-10-17 20:15:43'),
(60, 1, 4, 1, 'hey', 1, 1, 0, '2021-10-17 20:15:50', '2021-10-17 20:16:04'),
(61, 4, 1, 1, 'men', 1, 1, 0, '2021-10-17 21:28:39', '2021-10-17 21:39:08'),
(62, 4, 1, 1, 'test', 1, 1, 0, '2021-10-17 21:32:31', '2021-10-17 21:39:08'),
(63, 1, 3, 1, 'test', 1, 1, 0, '2021-10-17 21:32:53', '2021-10-18 00:02:20'),
(64, 4, 1, 1, 'test', 1, 1, 0, '2021-10-17 21:33:00', '2021-10-17 21:39:08'),
(65, 4, 1, 1, 'dude', 1, 1, 0, '2021-10-17 21:33:27', '2021-10-17 21:39:08'),
(66, 4, 1, 1, 'yow', 1, 1, 0, '2021-10-17 21:35:24', '2021-10-17 21:39:08'),
(67, 4, 1, 1, 'test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test ', 1, 1, 0, '2021-10-17 21:38:07', '2021-10-17 21:42:42'),
(68, 4, 1, 1, 'teest', 1, 1, 0, '2021-10-17 21:49:16', '2021-10-17 21:49:18'),
(69, 4, 1, 1, 'dude??', 1, 1, 0, '2021-10-17 21:52:38', '2021-10-17 21:52:41'),
(70, 4, 1, 1, 'sup', 1, 1, 0, '2021-10-17 21:52:48', '2021-10-17 21:54:47'),
(71, 1, 4, 1, 'hey', 1, 1, 0, '2021-10-17 21:53:02', '2021-10-17 21:54:13'),
(72, 1, 4, 1, 'What ??', 1, 1, 0, '2021-10-17 21:54:54', '2021-10-17 21:55:15'),
(73, 1, 4, 1, 'How can I help you ?', 1, 1, 0, '2021-10-17 21:55:29', '2021-10-17 21:56:46'),
(74, 4, 1, 1, 'test only', 1, 1, 0, '2021-10-17 21:56:51', '2021-10-17 22:19:00'),
(75, 4, 1, 1, 'test', 1, 1, 0, '2021-10-17 21:57:08', '2021-10-17 22:19:00'),
(76, 4, 1, 1, 'a', 1, 1, 0, '2021-10-17 21:57:14', '2021-10-17 22:19:00'),
(77, 4, 1, 1, '123', 1, 1, 0, '2021-10-17 21:58:26', '2021-10-17 22:19:00'),
(78, 4, 1, 1, '123', 1, 1, 0, '2021-10-17 21:58:31', '2021-10-17 22:19:00'),
(79, 4, 1, 1, '2221\r\n25', 1, 1, 0, '2021-10-17 21:58:38', '2021-10-17 22:19:00'),
(80, 1, 4, 1, 'yes?\r\n22', 1, 1, 0, '2021-10-17 21:59:39', '2021-10-17 21:59:43'),
(81, 4, 1, 1, 'hey', 1, 1, 0, '2021-10-17 22:01:22', '2021-10-17 22:19:00'),
(82, 4, 1, 1, 'what\r\n??', 1, 1, 0, '2021-10-17 22:01:58', '2021-10-17 22:19:00'),
(83, 4, 1, 1, 'test\r\n', 1, 1, 0, '2021-10-17 22:15:43', '2021-10-17 22:19:00'),
(84, 4, 1, 1, 'test\r\n', 1, 1, 0, '2021-10-17 22:16:01', '2021-10-17 23:07:20'),
(85, 4, 1, 1, 'yow\r\n\r\nsup', 1, 1, 0, '2021-10-17 22:16:11', '2021-10-17 23:07:20'),
(86, 4, 1, 1, 'wew\r\ntest', 1, 1, 0, '2021-10-17 22:18:30', '2021-10-17 23:07:20'),
(87, 1, 4, 1, 'test', 1, 1, 0, '2021-10-17 22:19:08', '2021-10-17 22:29:46'),
(88, 1, 4, 1, 'test\r\ntest', 1, 1, 0, '2021-10-17 22:19:14', '2021-10-17 22:29:46'),
(89, 1, 4, 1, 'test\r\ntest', 1, 1, 0, '2021-10-17 22:21:13', '2021-10-17 22:29:46'),
(90, 1, 4, 1, 'dude\r\nCan I Ask ?', 1, 1, 1, '2021-10-17 22:30:01', '2021-10-17 23:36:55'),
(91, 4, 1, 1, 'What?\r\nIs it about something?', 1, 1, 1, '2021-10-17 22:30:32', '2021-10-17 23:37:56'),
(92, 1, 4, 1, 'Remeber test 101\r\nCan you check the bug ?', 1, 1, 1, '2021-10-17 22:31:09', '2021-10-17 23:36:01'),
(93, 4, 1, 1, 'test', 1, 1, 1, '2021-10-17 22:42:23', '2021-10-17 23:38:02'),
(94, 4, 1, 1, 'test', 1, 1, 1, '2021-10-17 22:43:28', '2021-10-17 23:07:29'),
(95, 4, 1, 1, 'test', 1, 1, 1, '2021-10-17 23:21:14', '2021-10-17 23:35:50'),
(96, 4, 1, 1, 'hey dude', 1, 1, 0, '2021-10-17 23:44:45', '2021-10-17 23:46:14'),
(97, 4, 1, 1, 'yow', 1, 1, 0, '2021-10-17 23:46:04', '2021-10-17 23:46:14'),
(98, 4, 1, 1, 'fs', 1, 1, 0, '2021-10-17 23:48:34', '2021-10-17 23:55:38'),
(99, 4, 1, 1, 'test', 1, 1, 0, '2021-10-17 23:49:12', '2021-10-17 23:55:38'),
(100, 1, 4, 1, 'what?', 1, 1, 0, '2021-10-17 23:49:22', '2021-10-17 23:51:07'),
(101, 1, 4, 1, 'yow', 1, 1, 0, '2021-10-17 23:55:42', '2021-10-18 00:01:56'),
(102, 3, 1, 1, 'JOhn?', 1, 1, 0, '2021-10-18 00:02:29', '2023-08-04 09:21:16'),
(103, 3, 1, 1, 'Hey John', 1, 1, 0, '2021-10-18 00:02:33', '2023-08-04 09:21:16'),
(104, 3, 1, 1, 'John', 1, 1, 0, '2021-10-18 00:02:49', '2023-08-04 09:21:16'),
(105, 3, 1, 1, 'test', 1, 1, 0, '2021-10-18 00:03:21', '2023-08-04 09:21:16'),
(106, 3, 1, 1, 'john', 1, 1, 0, '2021-10-18 00:03:26', '2023-08-04 09:21:16'),
(107, 3, 1, 1, 'hey', 1, 1, 0, '2021-10-18 00:03:58', '2023-08-04 09:21:16'),
(108, 3, 1, 1, 'hey', 1, 1, 0, '2021-10-18 00:04:06', '2023-08-04 09:21:16'),
(109, 3, 1, 1, 'test', 1, 1, 0, '2021-10-18 00:07:23', '2023-08-04 09:21:16'),
(110, 3, 1, 1, 'test', 1, 1, 0, '2021-10-18 00:07:56', '2023-08-04 09:21:16'),
(111, 3, 1, 1, 'test', 1, 1, 0, '2021-10-18 00:07:59', '2023-08-04 09:21:16'),
(112, 1, 3, 1, 'Hey', 0, 0, 0, '2023-08-04 09:21:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messaging`
--

CREATE TABLE `messaging` (
  `ID` int(10) NOT NULL,
  `client` varchar(255) NOT NULL,
  `client_message` text NOT NULL,
  `advocate` varchar(255) NOT NULL,
  `advocate_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messaging`
--

INSERT INTO `messaging` (`ID`, `client`, `client_message`, `advocate`, `advocate_message`) VALUES
(1, 'ivy kimathi', 'hello', 'Jane Doe', ''),
(2, 'ivy kimathi', 'hello', 'Jane Doe', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `scheduleid` int(11) NOT NULL,
  `advname` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `scheduledate` date DEFAULT NULL,
  `scheduletime` time DEFAULT NULL,
  `nop` int(4) DEFAULT NULL,
  `client` varchar(255) NOT NULL,
  `client_tel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleid`, `advname`, `title`, `scheduledate`, `scheduletime`, `nop`, `client`, `client_tel`) VALUES
(4, '2', 'Welcome for Emergency Services', '2023-08-05', '08:00:00', 20, '', 0),
(5, '3', 'Children and Related issues', '2023-08-09', '09:00:00', 30, '', 0),
(6, '4', 'Financial Law', '2023-08-19', '09:00:00', 15, '', 0),
(7, '', NULL, '2024-04-10', '15:20:00', NULL, 'ivy kimathi', 726508594),
(8, NULL, NULL, '2024-04-10', '15:20:00', NULL, 'ivy kimathi', 726508594),
(9, '', '', '2024-04-17', '08:00:00', NULL, 'ivy kimathi', 726508594),
(10, '<?php echo urlencode($name); ?>', '<?php echo urlencode($spcil_name); ?>', '2024-04-17', '08:00:00', NULL, 'ivy kimathi', 726508594),
(11, '<?php echo urlencode($name); ?>', '', '2024-04-17', '08:00:00', NULL, 'ivy kimathi', 726508594),
(12, ' Jane Doe', '', '2024-04-17', '08:00:00', NULL, 'sakini', 726508594),
(13, 'mumo ndunda', '', '0000-00-00', '00:00:00', NULL, 'ivy kimathi', 726508594),
(14, 'Joel Sakin', 'Industrial Relations, Unions and Employment', '2024-05-01', '09:40:00', NULL, 'ivy kimathi', 726508594),
(19, 'mumo ndunda', 'Alternative Dispute Resolution', '2024-04-17', '07:50:00', NULL, 'ivy kimathi', 726508594),
(20, 'Jane Doe', 'Criminal Law - General', '2024-04-20', '10:00:00', NULL, 'ivy kimathi', 726508594),
(21, 'Kacy OBrien', 'Personal Injuries and Insurance Law', '2024-05-07', '16:30:00', NULL, 'ivy kimathi', 726508594),
(22, 'John Doe', 'General Practice', '2024-05-30', '13:52:00', NULL, 'ivy kimathi', 726508594);

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(2) NOT NULL,
  `sname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `sname`) VALUES
(1, 'Alternative Dispute Resolution'),
(2, 'Personal Injuries and Insurance Law'),
(3, 'Criminal Law - General'),
(4, 'General Practice'),
(5, 'Constitution and Human Rights Law'),
(6, 'Industrial Relations, Unions and Employment');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `contact` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `contact`, `gender`, `dob`, `email`, `password`, `date_created`, `date_updated`) VALUES
(1, 'John', 'D', 'Smith', '09123456789', 'Male', '1997-06-23', 'jsmith@sample.com', '39ce7e2a8573b41ce73b5ba41617f8f7', '2021-10-15 10:34:00', '2021-10-15 12:58:34'),
(2, 'Claire', 'C', 'Blake', '09123654987', 'Female', '1997-10-14', 'cblake@sample.com', '4744ddea876b11dcb1d169fadf494418', '2021-10-15 13:04:40', NULL),
(3, 'Samantha Jane', 'C', 'Lou', '78978511554', 'Female', '1997-07-15', 'slou@sample.com', '1ed1255790523a907da869eab7306f5a', '2021-10-15 13:05:23', NULL),
(4, 'Mike', 'C', 'Williams', '096546655588', 'Male', '1998-12-10', 'mwilliams@sample.com', 'a88df23ac492e6e2782df6586a0c645f', '2021-10-17 19:54:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `webuser`
--

CREATE TABLE `webuser` (
  `email` varchar(255) NOT NULL,
  `usertype` char(1) DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webuser`
--

INSERT INTO `webuser` (`email`, `usertype`, `confirmed`) VALUES
('admin@tls.com', 'a', 0),
('davidmumondunda@gmail.com', 'c', 0),
('dre@gmail.com', 'c', 0),
('janedoe@gmail.com', 'l', 0),
('johndoe@gmail.com', 'l', 0),
('kacyobrienz@gmail.com', 'l', 0),
('kajujuivy7872@gmail.com', 'c', 0),
('mumondunda@gmail.com', 'l', 0),
('sakcad@gmail.com', 'c', 0),
('sakin0987@gmail.com', 'c', 0),
('sakin12637@gmail.com', 'c', 0),
('sakin1263@gmail.com', 'c', 0),
('sakin25412@gmail.com', 'c', 0),
('sakin25432@gmail.com', 'c', 0),
('sakin254@gmail.com', 'c', 0),
('sakin98123@gmail.com', 'c', 0),
('sakin@gmail.com', 'c', 0),
('sakina123@gmail.com', 'c', 0),
('sakina213@gmail.com', 'c', 1),
('sakindeborah2@gmail.com', 'c', 0),
('sakindeborah@gmail.com', 'c', 0),
('sakindre@gmail.com', 'c', 1),
('sakinduku@gmail.com', 'c', 1),
('sakinklasc@gmail.com', 'c', 0),
('sakoasd@gmail.com', 'c', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aemail`);

--
-- Indexes for table `advocate`
--
ALTER TABLE `advocate`
  ADD PRIMARY KEY (`advid`),
  ADD UNIQUE KEY `specialties` (`specialties`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `scheduleid` (`scheduleid`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `confirmation_codes`
--
ALTER TABLE `confirmation_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `convo_list`
--
ALTER TABLE `convo_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messaging`
--
ALTER TABLE `messaging`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleid`),
  ADD KEY `advid` (`advname`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webuser`
--
ALTER TABLE `webuser`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advocate`
--
ALTER TABLE `advocate`
  MODIFY `advid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `confirmation_codes`
--
ALTER TABLE `confirmation_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `convo_list`
--
ALTER TABLE `convo_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `messaging`
--
ALTER TABLE `messaging`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scheduleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `confirmation_codes`
--
ALTER TABLE `confirmation_codes`
  ADD CONSTRAINT `confirmation_codes_ibfk_1` FOREIGN KEY (`email`) REFERENCES `webuser` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
