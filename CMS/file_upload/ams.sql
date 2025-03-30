-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2024 at 07:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_tbl`
--

CREATE TABLE `attendance_tbl` (
  `RollNum` int(11) NOT NULL,
  `QRCode` varchar(255) DEFAULT NULL,
  `AttendDte` varchar(45) DEFAULT NULL,
  `TimeIn` varchar(45) DEFAULT NULL,
  `TimeOut` varchar(45) DEFAULT 'Null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_tbl`
--

INSERT INTO `attendance_tbl` (`RollNum`, `QRCode`, `AttendDte`, `TimeIn`, `TimeOut`) VALUES
(1, '1704', '2024-08-19', '08:15:44am', '06:45:57pm'),
(2, '60909', '2024-08-19', '08:16:34am', '06:43:38pm'),
(3, '12851', '2024-08-19', '08:17:35am', '06:45:46pm'),
(4, '25303', '2024-08-19', '08:17:47am', '06:43:28pm'),
(5, '75928', '2024-08-19', '08:17:58am', '07:31:33pm'),
(6, '44430', '2024-08-19', '08:19:05am', '7:30:33pm'),
(7, '83517', '2024-08-19', '08:20:14am', '06:44:25pm'),
(8, '57732', '2024-08-19', '08:20:21am', '06:45:50pm'),
(9, '37353', '2024-08-19', '08:21:18am', '06:45:29pm'),
(10, '5035', '2024-08-19', '08:30:21am', '06:47:06pm'),
(11, '9196', '2024-08-19', '08:33:25am', '06:53:25pm'),
(12, '84810', '2024-08-19', '08:38:39am', '8:00pm'),
(13, '93511', '2024-08-19', '08:38:44am', '06:53:29pm'),
(14, '94234', '2024-08-19', '08:45:41am', '07:31:07pm'),
(15, '44225', '2024-08-19', '08:46:33am', '06:55:04pm'),
(16, '98958', '2024-08-19', '08:55:44am', '06:47:11pm'),
(17, '27419', '2024-08-19', '08:55:48am', '06:47:09pm'),
(18, '63000', '2024-08-19', '08:57:46am', '8:00pm'),
(19, '20373', '2024-08-19', '09:00:21am', '06:44:53pm'),
(20, '76807', '2024-08-19', '09:03:47am', '06:50:22pm'),
(21, '67891', '2024-08-19', '09:18:52am', '8:00pm'),
(22, '79077', '2024-08-19', '09:37:55am', '06:47:15pm'),
(23, '40988', '2024-08-19', '09:38:00am', '06:49:33pm'),
(24, '7151', '2024-08-19', '09:48:19am', '06:49:07pm'),
(25, '38097', '2024-08-19', '09:48:46am', '06:49:19pm'),
(26, '84540', '2024-08-19', '10:01:39am', '06:43:52pm'),
(27, '82088', '2024-08-19', '10:20:12am', '07:31:29pm'),
(28, '84585', '2024-08-19', '10:27:34am', '07:31:16pm'),
(29, '67684', '2024-08-19', '10:38:09am', '06:47:46pm'),
(30, '88176', '2024-08-19', '10:43:49am', '06:46:10pm'),
(31, '13107', '2024-08-19', '12:27:06pm', '06:44:22pm'),
(32, '58414', '2024-08-19', '06:25:44pm', '06:44:03pm'),
(34, '34551', '2024-08-19', '06:44:31pm', '06:44:40pm'),
(35, '1805', '2024-08-19', '06:44:35pm', '06:44:37pm'),
(36, '38881', '2024-08-19', '06:44:45pm', '06:44:48pm'),
(37, '12269', '2024-08-19', '06:45:35pm', '8:00pm'),
(38, '70623', '2024-08-19', '06:47:34pm', '8:00pm'),
(39, '36866', '2024-08-19', '07:30:40pm', '07:31:00pm'),
(40, '82088', '2024-08-20', '07:24:30am', '05:53:41pm'),
(41, '25303', '2024-08-20', '07:24:40am', '05:54:00pm'),
(42, '44225', '2024-08-20', '07:37:24am', '06:27:38pm'),
(43, '76807', '2024-08-20', '07:38:27am', '05:54:18pm'),
(44, '36866', '2024-08-20', '07:38:32am', '05:59:26pm'),
(45, '57732', '2024-08-20', '07:38:38am', '05:55:22pm'),
(46, '58414', '2024-08-20', '07:41:33am', '05:55:57pm'),
(47, '60909', '2024-08-20', '07:44:33am', '05:51:01pm'),
(48, '5035', '2024-08-20', '07:48:59am', '05:51:23pm'),
(49, '94234', '2024-08-20', '07:50:09am', '05:59:21pm'),
(50, '79077', '2024-08-20', '07:50:14am', '05:54:03pm'),
(51, '20373', '2024-08-20', '07:50:30am', '06:02:48pm'),
(52, '67684', '2024-08-20', '07:53:48am', '05:57:33pm'),
(53, '93511', '2024-08-20', '07:54:00am', '06:25:42pm'),
(54, '12851', '2024-08-20', '07:56:07am', '05:53:57pm'),
(55, '84810', '2024-08-20', '07:57:00am', '06:25:45pm'),
(56, '63000', '2024-08-20', '07:58:17am', '06:25:37pm'),
(57, '40988', '2024-08-20', '07:58:48am', '05:55:42pm'),
(58, '98958', '2024-08-20', '08:00:21am', '05:59:04pm'),
(59, '27419', '2024-08-20', '08:00:25am', '06:00:02pm'),
(60, '38097', '2024-08-20', '08:00:28am', '6:05:39pm'),
(61, '7151', '2024-08-20', '08:00:32am', '6:01:50pm'),
(62, '38881', '2024-08-20', '08:05:16am', '05:55:38pm'),
(63, '13107', '2024-08-20', '08:06:06am', '06:03:25pm'),
(64, '9196', '2024-08-20', '08:06:09am', '06:00:28pm'),
(65, '1805', '2024-08-20', '08:06:12am', '06:00:13pm'),
(66, '34551', '2024-08-20', '08:06:16am', '06:04:52pm'),
(67, '44430', '2024-08-20', '08:11:57am', '05:58:34pm'),
(68, '67891', '2024-08-20', '08:15:00am', '06:23:04pm'),
(69, '37353', '2024-08-20', '08:15:04am', '06:03:30pm'),
(70, '88176', '2024-08-20', '08:15:07am', '06:23:00pm'),
(71, '8130', '2024-08-20', '08:16:12am', '05:53:52pm'),
(72, '75928', '2024-08-20', '08:16:14am', '05:53:50pm'),
(73, '83517', '2024-08-20', '08:16:17am', '05:53:36pm'),
(74, '84585', '2024-08-20', '08:16:22am', '05:50:58pm'),
(75, '70623', '2024-08-20', '08:23:10am', '05:59:10pm'),
(76, '84540', '2024-08-20', '08:23:24am', '6:06:55pm'),
(77, '12269', '2024-08-20', '08:25:23am', '05:54:14pm'),
(78, '52294', '2024-08-20', '10:03:36am', '05:56:28pm'),
(79, '85329', '2024-08-19', '8:10am', '7:00pm'),
(80, '80666', '2024-08-19', '8:11am', '7:05pm'),
(81, '37095', '2024-08-19', '8:25:30am', '7:10:30pm'),
(82, '59840', '2024-08-19', '8:25:30am', '7:01:30pm'),
(83, '85329', '2024-08-20', '7:51:25am', '05:54:57pm'),
(84, '80666', '2024-08-20', '8:00:01am', '06:03:21pm'),
(85, '37095', '2024-08-20', '8:10:11am', '06:03:33pm'),
(86, '59840', '2024-08-20', '7:58:55am', '6:04:55pm'),
(88, '43089', '2024-08-20', '05:55:13pm', '05:55:34pm'),
(90, '43686', '2024-08-20', '06:00:36pm', '06:00:43pm'),
(92, '44225', '2024-08-21', '07:25:27am', '06:07:10pm'),
(93, '5035', '2024-08-21', '07:25:35am', '07:26:04am'),
(94, '36866', '2024-08-21', '07:43:39am', '06:22:52pm'),
(95, '57732', '2024-08-21', '07:43:42am', '06:09:17pm'),
(96, '25303', '2024-08-21', '07:43:45am', '05:32:06pm'),
(97, '82088', '2024-08-21', '07:47:12am', '05:33:33pm'),
(98, '43089', '2024-08-21', '08:04:59am', '05:32:29pm'),
(99, '76807', '2024-08-21', '08:10:33am', '05:31:50pm'),
(100, '93511', '2024-08-21', '08:13:22am', '05:56:27pm'),
(101, '58414', '2024-08-21', '08:13:27am', '05:32:03pm'),
(102, '63000', '2024-08-21', '08:13:33am', '06:03:50pm'),
(103, '7151', '2024-08-21', '08:14:43am', '06:12:45pm'),
(104, '27419', '2024-08-21', '08:14:47am', '06:17:29pm'),
(105, '84810', '2024-08-21', '08:16:18am', '05:56:39pm'),
(106, '94234', '2024-08-21', '08:16:28am', '05:36:59pm'),
(107, '60909', '2024-08-21', '08:19:31am', '05:32:01pm'),
(108, '12851', '2024-08-21', '08:19:35am', '05:32:37pm'),
(109, '79077', '2024-08-21', '08:20:08am', '05:47:32pm'),
(110, '67891', '2024-08-21', '08:21:45am', '06:25:41pm'),
(111, '37353', '2024-08-21', '08:21:50am', '06:20:36pm'),
(112, '44430', '2024-08-21', '08:21:58am', '6:03:05pm'),
(113, '98958', '2024-08-21', '08:25:24am', '06:15:49pm'),
(114, '13107', '2024-08-21', '08:26:10am', '05:40:10pm'),
(115, '40988', '2024-08-21', '08:26:46am', '05:47:24pm'),
(116, '85329', '2024-08-21', '08:26:52am', '05:47:21pm'),
(117, '38881', '2024-08-21', '08:26:56am', '05:47:29pm'),
(118, '9196', '2024-08-21', '08:27:54am', '05:36:37pm'),
(119, '34551', '2024-08-21', '08:28:00am', '05:36:47pm'),
(120, '1805', '2024-08-21', '08:28:03am', '11:32:29am'),
(121, '80666', '2024-08-21', '08:32:09am', '06:34:57pm'),
(122, '37095', '2024-08-21', '08:33:24am', '06:34:53pm'),
(123, '1704', '2024-08-21', '08:35:49am', '6:05:05pm'),
(124, '88176', '2024-08-21', '08:36:21am', '05:33:25pm'),
(125, '67684', '2024-08-21', '08:38:53am', '05:33:18pm'),
(126, '70623', '2024-08-21', '08:41:49am', '05:50:31pm'),
(127, '83517', '2024-08-21', '08:58:57am', '05:37:46pm'),
(128, '8130', '2024-08-21', '08:59:02am', '05:36:27pm'),
(129, '75928', '2024-08-21', '08:59:04am', '05:36:29pm'),
(130, '84585', '2024-08-21', '08:59:07am', '05:32:24pm'),
(131, '43686', '2024-08-21', '09:11:03am', '6:10:25pm'),
(132, '86254', '2024-08-21', '09:31:52am', '05:50:26pm'),
(133, '52294', '2024-08-21', '09:31:56am', '6:02:30pm'),
(134, '9432', '2024-08-21', '11:14:17am', '06:17:01pm'),
(135, '31917', '2024-08-21', '11:14:35am', '06:16:00pm'),
(136, '38505', '2024-08-21', '11:14:38am', '05:56:34pm'),
(137, '70706', '2024-08-21', '11:32:38am', '06:16:30pm'),
(138, '36029', '2024-08-21', '05:50:33pm', '6:03:06pm'),
(139, '20373', '2024-08-21', '06:07:18pm', '6:10:10pm'),
(140, '25303', '2024-08-22', '07:28:08am', '05:33:41pm'),
(141, '5035', '2024-08-22', '07:34:54am', '06:12:37pm'),
(142, '44225', '2024-08-22', '07:34:59am', '06:12:42pm'),
(144, '36866', '2024-08-22', '07:36:04am', '06:12:46pm'),
(145, '43089', '2024-08-22', '07:37:54am', '06:01:26pm'),
(146, '1704', '2024-08-22', '08:11:49am', '05:33:33pm'),
(147, '82088', '2024-08-22', '08:11:57am', '05:32:24pm'),
(148, '12851', '2024-08-22', '08:12:06am', '05:33:38pm'),
(149, '83517', '2024-08-22', '08:12:13am', '05:58:11pm'),
(150, '76807', '2024-08-22', '08:12:22am', '05:34:46pm'),
(151, '94234', '2024-08-22', '08:14:02am', '06:12:32pm'),
(152, '23170', '2024-08-22', '08:14:09am', '06:12:40pm'),
(153, '52294', '2024-08-22', '08:14:21am', '05:34:59pm'),
(154, '79077', '2024-08-22', '08:18:07am', '05:30:39pm'),
(155, '58414', '2024-08-22', '08:54:29am', '05:31:27pm'),
(156, '60909', '2024-08-22', '09:01:26am', '05:32:20pm'),
(157, '37353', '2024-08-22', '09:01:34am', '5:30:00pm'),
(158, '38097', '2024-08-22', '09:01:41am', '06:39:31pm'),
(159, '98958', '2024-08-22', '09:01:49am', '05:34:42pm'),
(160, '7151', '2024-08-22', '09:01:57am', '06:35:07pm'),
(161, '27419', '2024-08-22', '09:02:04am', '05:34:34pm'),
(162, '13107', '2024-08-22', '09:02:10am', '06:50:08pm'),
(163, '9196', '2024-08-22', '09:02:17am', '06:24:49pm'),
(164, '34551', '2024-08-22', '09:02:25am', '06:24:16pm'),
(165, '44430', '2024-08-22', '09:02:31am', '05:34:17pm'),
(166, '63000', '2024-08-22', '09:02:39am', '06:41:51pm'),
(167, '1805', '2024-08-22', '09:02:45am', '06:24:19pm'),
(168, '93511', '2024-08-22', '09:02:53am', '05:49:21pm'),
(169, '40988', '2024-08-22', '09:03:02am', '05:30:35pm'),
(170, '38881', '2024-08-22', '09:03:12am', '05:30:30pm'),
(171, '85329', '2024-08-22', '09:03:31am', '05:30:27pm'),
(172, '57732', '2024-08-22', '09:03:48am', '05:57:32pm'),
(173, '84585', '2024-08-22', '09:04:06am', '05:58:23pm'),
(174, '8130', '2024-08-22', '09:04:21am', '05:58:19pm'),
(175, '75928', '2024-08-22', '09:04:30am', '05:58:15pm'),
(176, '67684', '2024-08-22', '09:04:45am', '05:49:34pm'),
(177, '38505', '2024-08-22', '09:04:59am', '06:50:03pm'),
(178, '88176', '2024-08-22', '09:05:23am', '06:47:37pm'),
(179, '84810', '2024-08-22', '09:06:06am', '06:35:56pm'),
(180, '36029', '2024-08-22', '09:06:19am', '06:23:14pm'),
(181, '86254', '2024-08-22', '09:06:33am', '5:30:00pm'),
(182, '80666', '2024-08-22', '09:06:47am', '06:50:41pm'),
(183, '31917', '2024-08-22', '09:06:52am', '06:51:06pm'),
(184, '70706', '2024-08-22', '09:06:59am', '06:01:57pm'),
(185, '9432', '2024-08-22', '09:07:06am', '5:30:00pm'),
(186, '12269', '2024-08-22', '05:31:42pm', '05:31:47pm'),
(187, '84540', '2024-08-22', '05:31:54pm', '05:31:58pm'),
(188, '70623', '2024-08-22', '05:35:58pm', '5:30:00pm'),
(189, '67891', '2024-08-22', '06:17:01pm', '5:30:00pm'),
(191, '1310', '2024-08-22', '06:50:27pm', '5:30:00pm'),
(192, '43686', '2024-08-22', '8:15:00am', '5:30:00pm'),
(193, '44225', '2024-08-23', '07:32:42am', '07:32:50am'),
(194, '43089', '2024-08-23', '07:32:59am', '03:19:36pm'),
(195, '36866', '2024-08-23', '07:46:47am', 'Null'),
(196, '70623', '2024-08-23', '08:01:56am', 'Null'),
(197, '82088', '2024-08-23', '08:02:03am', '03:20:04pm'),
(198, '93511', '2024-08-23', '08:02:16am', 'Null'),
(199, '84810', '2024-08-23', '08:02:27am', 'Null'),
(200, '38505', '2024-08-23', '08:02:37am', 'Null'),
(201, '63000', '2024-08-23', '08:08:17am', 'Null'),
(202, '60909', '2024-08-23', '08:10:36am', 'Null'),
(203, '25303', '2024-08-23', '08:10:48am', '03:19:48pm'),
(204, '76807', '2024-08-23', '08:11:01am', 'Null'),
(205, '44430', '2024-08-23', '08:13:01am', 'Null'),
(206, '52294', '2024-08-23', '08:13:09am', 'Null'),
(207, '40988', '2024-08-23', '10:01:02am', '03:20:29pm'),
(208, '38881', '2024-08-23', '10:01:27am', '03:20:40pm'),
(209, '85329', '2024-08-23', '10:01:53am', '03:20:45pm'),
(210, '27419', '2024-08-23', '10:01:59am', 'Null'),
(211, '38097', '2024-08-23', '10:03:04am', 'Null'),
(212, '79077', '2024-08-23', '10:03:14am', '03:20:53pm'),
(213, '37353', '2024-08-23', '10:03:22am', 'Null'),
(214, '67891', '2024-08-23', '10:03:38am', 'Null'),
(215, '98958', '2024-08-23', '10:03:53am', 'Null'),
(216, '12851', '2024-08-23', '10:04:01am', 'Null'),
(217, '43686', '2024-08-23', '10:04:09am', 'Null'),
(218, '13107', '2024-08-23', '10:04:14am', 'Null'),
(219, '1805', '2024-08-23', '10:04:20am', 'Null'),
(220, '9196', '2024-08-23', '10:04:25am', 'Null'),
(221, '67684', '2024-08-23', '10:04:30am', 'Null'),
(222, '57732', '2024-08-23', '10:04:37am', '03:21:05pm'),
(223, '9432', '2024-08-23', '10:04:43am', 'Null'),
(224, '70706', '2024-08-23', '10:04:49am', 'Null'),
(225, '86254', '2024-08-23', '10:04:56am', 'Null'),
(226, '31917', '2024-08-23', '10:05:03am', 'Null'),
(227, '36029', '2024-08-23', '10:05:10am', 'Null'),
(228, '94234', '2024-08-23', '10:05:15am', 'Null'),
(229, '88176', '2024-08-23', '10:05:21am', 'Null'),
(230, '58414', '2024-08-23', '03:19:05pm', 'Null'),
(231, '1704', '2024-08-23', '03:19:58pm', 'Null'),
(232, '84585', '2024-08-23', '03:20:11pm', '03:20:19pm'),
(233, '83517', '2024-08-23', '03:21:00pm', 'Null');

-- --------------------------------------------------------

--
-- Table structure for table `attendeesdets_tbl`
--

CREATE TABLE `attendeesdets_tbl` (
  `RollNum` int(11) NOT NULL,
  `FName` varchar(90) DEFAULT NULL,
  `Gender` varchar(45) DEFAULT NULL,
  `ContactNum` varchar(45) DEFAULT NULL,
  `Mail` varchar(90) DEFAULT NULL,
  `PENRO` varchar(90) DEFAULT NULL,
  `Position` varchar(90) DEFAULT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'logo.png',
  `reg_date` varchar(45) NOT NULL,
  `qrtext` varchar(255) NOT NULL,
  `qrimage` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `permail` varchar(255) NOT NULL,
  `foodres` varchar(255) NOT NULL DEFAULT 'No',
  `bartext` varchar(300) NOT NULL,
  `barimg` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendeesdets_tbl`
--

INSERT INTO `attendeesdets_tbl` (`RollNum`, `FName`, `Gender`, `ContactNum`, `Mail`, `PENRO`, `Position`, `img`, `reg_date`, `qrtext`, `qrimage`, `age`, `nickname`, `permail`, `foodres`, `bartext`, `barimg`) VALUES
(1, 'Mirasol, Felix S., Jr. ', 'Male', '09177183152', 'mimaroparegion@denr.gov.ph', 'DENR MIMAROPA', 'OIC, Regional Executive Director', 'att.uE5pWKFW3iahglAWs9Z41Ae3yuiixn3oZ2Wfl7HRbmw.jpg', '2024-08-14', '20373', '1723610943.png', '60 and Above', 'Felix', 'mirasolfelix@yahoo.com', 'Sweets, spicy, and fish (Tilapia and Bangus)', '20373', '1723610943.png'),
(2, 'Flores, Gandhi G.', 'Female', '09175729529', 'legal.r4b@denr.gov.ph', 'Legal Division', 'Attorney V/OIC, Assistant Regional Director for Management Services and Chief, Legal Divis', 'ATTY GANDHI FLORES (1).JPG', '2024-08-14', '12269', '1723614642.png', '46-59', 'Gandhi', 'gandhi_flores@yahoo.com', 'n/a', '12269', '1723614642.png'),
(3, 'Maximo C. Landrito', 'Male', '09081633971', 'ardts.mimaropa@gmail.com', 'Office of the Assistant Regional Director for Technical Services', 'OIC, Assistant Regional Director for Technical Services', 'Maximo Landrito.jpg', '2024-08-14', '23170', '1723614705.png', '46-59', 'Mikko', 'micolandrito7715@yahoo.com.ph', 'NA', '23170', '1723614705.png'),
(4, 'SISON, RHEA LYN V.', 'Female', '09750966034', 'sisonrhealyn24@gmail.com', 'PMD', 'GIS OPERATOR', 'RHEA.jpg', '2024-08-14', '25303', '1723615766.png', '30 and Below', 'RHEA', 'sisonrhealyn24@gmail.com', 'N/A', '25303', '1723615766.png'),
(5, 'Mira, Nestor Jr. G.', 'Male', '09292270265', 'cenroroxasormindoro@denr.gov.ph', 'PENRO Oriental Mindoro', 'SEMS', 'MIRA, NESTOR JR G. (2).jpg', '2024-08-14', '79077', '1723623302.png', '31-45', 'Nes', 'miranestorjr@yahoo.com', 'beef', '79077', '1723623302.png'),
(6, 'SHEILA C. ALDAY', 'Female', '09322844228', 'finance.r4b@denr.gov.ph', 'Finance', 'TWG Regular Member', 'sheila 2x2.JPG.jpg', '2024-08-14', '84810', '1723624392.png', '31-45', 'SHEILA', 'sheila.cerezo20@gmail.com', '', '84810', '1723624392.png'),
(7, 'Melchor, Jeremy A.', 'Female', '09065419008', 'pps4bmimaropa@gmail.com', 'Regional Office/PMD', 'Planning Officer III', 'ABCEDE, JEREMY C. (Project Evaluation Officer II) .JPG', '2024-08-14', '52418', '1723624428.png', '31-45', 'Jem', 'abcedejeremy@gmail.com', '', '52418', '1723624428.png'),
(8, 'Pudiquet, Corazon E.', 'Female', '09173235087', 'penroor.mindoro@denr.gov.ph', 'PENRO Oriental Mindoro', 'Planning Officer III', 'Mam Cora.jpg', '2024-08-14', '40988', '1723624447.png', '46-59', 'Cora', 'corazonpudiquet@gmail.com', 'N.A', '40988', '1723624447.png'),
(9, 'PEDRO A. MARMOL', 'Male', '09301904531', 'jojomarmol0811@gmail.com', 'PENRO Occidental Mindoro', 'ECOMS II', 'PEDRO A. MARMOL_ID.jpg', '2024-08-14', '44430', '1723624455.png', '31-45', 'JOJO', 'jojomarmol0811@gmail.com', 'NA', '44430', '1723624455.png'),
(10, 'Tamayosa, Arabelle Joy V.', 'Female', '09269780375', 'penroor.mindoro@denr.gov.ph', 'PENRO Oriental Mindoro', 'EcoMS I/Planning Staff', 'ARABELLE JOY TAMAYOSA (1).jpg', '2024-08-14', '38881', '1723624550.png', '30 and Below', 'Ara', 'arabelsvaldez@gmail.com', 'N.A', '38881', '1723624550.png'),
(11, 'CLAUDETT M. ENDOZO', 'Female', '09176276382', 'fppkmd.fps@fmb.denr.gov.ph', 'FOREST MANAGEMENT BUREAU', 'SENIOR FOREST MANAGEMENT SPECIALIST/ OIC, FOREST POLICY SECTION', 'logo.png', '2024-08-14', '28790', '1723624718.png', '30 and Below', 'CLAUI', 'endozoclaudett@gmail.com', 'N.A.', '28790', '1723624718.png'),
(12, 'Canua, Ma. Carmina M.', 'Female', '09564278505', 'mccanua@fmb.denr.gov.ph', 'FMB', 'Supervising Forest Management Specialist/Chief, FPPKMD-FPSS', 'logo.png', '2024-08-14', '20495', '1723624742.png', '31-45', 'Mina', 'carminacanua@gmail.com', 'NA', '20495', '1723624742.png'),
(13, 'CASTANAS, GRACE M.', 'Female', '09120997668', 'cenroroxaspalawan@denr.gov.ph', 'PSU', 'ECOMSII/Designated PO', 'logo.png', '2024-08-14', '70706', '1723624879.png', '46-59', 'GRACE', 'gracemahilom31@gmail.com', 'N/A', '70706', '1723624879.png'),
(14, 'Medenilla, Jhonna Liza S.', 'Female', '09760715456', 'planning.penromarinduque@denr.gov.ph', 'Marinduque ', 'Planning Officer II/In-Charge, Planning Section', '2x2 Picture - Copy.jpg', '2024-08-14', '98958', '1723624942.png', '31-45', 'Jhonna', 'jhoemz1415@gmail.com', 'food with too much garlic', '98958', '1723624942.png'),
(15, 'Umali, Michelle B.', 'Female', '09217439377', 'planning.penrooccmindoro@denr.gov.ph', 'Occidental Mindoro', 'Planning Officer II', 'logo.png', '2024-08-14', '34551', '1723625060.png', '31-45', 'Mitch', 'mikaelakate12@gmail.com', 'oily foods ', '34551', '1723625060.png'),
(16, 'LOPEZ, RENCHEL KAYE L. ', 'Female', '09477300080', 'cenrosablayan.planning@gmail.com', 'CENRO SABLAYAN', 'FORESTER I/PLANNING OFFICER', '2 x 2.JPG', '2024-08-14', '9196', '1723625566.png', '30 and Below', 'RENCHEL', 'work.lopezrk@gmail.com', 'N.A', '9196', '1723625566.png'),
(17, 'Peralta, Monaliza G.', 'Female', '09391366378', 'planning.penroromblon@denr.gov.ph', 'PENRO Romblon', 'Planning Officer I', 'Monaliza Peralta.jpg', '2024-08-14', '38097', '1723625641.png', '31-45', 'Mona', 'monalizagperalta@gmail.com', 'No pork/shrimp/crab (Seventh-Day Adventist)', '38097', '1723625641.png'),
(18, 'Oyong, Heidy, Leal', 'Female', '09179324060', 'planning.penromarinduque@denr.gov.ph', 'PENRO Marinduque', 'Planning Officer I', 'Heidy pix.jpg', '2024-08-14', '27419', '1723625738.png', '31-45', 'Heidy', 'heidyoyong@gmail.com', 'N.A.', '27419', '1723625738.png'),
(19, 'Cacabelos, Eunice May A.', 'Female', '09496510745', 'planning.penroromblon@denr.gov.ph', 'PENRO Romblon', 'Forest Technician II/ Planning Asst.', '11dcab34-9b35-4f4a-ace9-16be3bd5f7f4.jpg', '2024-08-14', '7151', '1723626024.png', '31-45', 'Nice', 'eunicemay.0007@gmail.com', 'N.A.', '7151', '1723626024.png'),
(20, 'Olaguera-Calayo, Cyndel D.', 'Female', '09994033652', 'bac.r4b@denr.gov.ph', 'Administrative Division', 'Administrative Officer V (Chief, Procurement Section)', 'MPA-Olaguera-Cyndel.png', '2024-08-14', '5035', '1723626150.png', '31-45', 'Cyndz', 'cdolaguera.calayo@gmail.com', 'n.a.', '5035', '1723626150.png'),
(21, 'Castro, Jeffrey C.', 'Male', '0998-552-6332', 'cenrocoron@denr.gov.ph', 'CENRO Coron/ Planning and Support Unit', 'Forester II/ Designated Planning Officer', 'IMG_20220408_115210_349-removebg-preview.png', '2024-08-14', '13107', '1723626800.png', '46-59', 'Jeff', 'jeffcastro2013@gmail.com', 'N.A.', '13107', '1723626800.png'),
(22, 'UDTOJAN, MAYLENE S.', 'Female', '9995945630', 'msudtojan@denr.gov.ph', 'PENRO Palawan', 'ISA II/OIC-Chief, Planning Section', 'logo.png', '2024-08-14', '37095', '1723627272.png', '31-45', 'MAY', 'msudtojan@denr.gov.ph', 'N/A', '37095', '1723627272.png'),
(23, 'APPIE, RACHEL H', 'Female', '09063574729', 'cenrobrookespoint@denr.gov.ph', 'PALAWAN', 'ECOMS II/Planning Officer', '432728638_7519684614733558_677554283749357985_n.jpg', '2024-08-14', '86254', '1723628518.png', '31-45', 'Chel', 'happieraquel1213@gmail.com', 'pork', '86254', '1723628518.png'),
(24, 'TAMAYO, JENNELYN A.', 'Female', '09270220975', 'adplanning321@gmail.com', 'Administrative Division', 'Administrative Officer III/ PO AD', 'logo.png', '2024-08-14', '38505', '1723628674.png', '31-45', 'JENNY', 'jenjay1028@gmail.com', 'NA', '38505', '1723628674.png'),
(25, 'MORA, Kaizen P.', 'Female', '0991 348 8849', 'smd.r4b@denr.gov.ph', 'Surveys and Mapping Division', 'Mathematician I/ SMD Planning Officer', 'IMG_20240814_212209_515.jpg', '2024-08-14', '57732', '1723642062.png', '31-45', 'Kaiz', 'kaikaimora92@gmail.com', 'NA', '57732', '1723642062.png'),
(26, 'Saños, Ma. Elaine D.', 'Female', '09369922674', 'pps4bmimaropa@gmail.com', 'Regional Office/PMD', 'Planning Officer II', 'IMG_7539.m pp.jpg', '2024-08-15', '94234', '1723678581.png', '31-45', 'Laine', 'maelainesanos@gmail.com', 'None', '94234', '1723678581.png'),
(27, 'Ancheta, Jaime,Jr. My.', 'Male', '09176997726', 'mimaropaengp@gmail.com', 'CDD/NGP', 'Forester/NGP Regional Coordinator', '', '2024-08-15', '52294', '1723687753.png', '60 and Above', 'Jun', 'ancheta.juna@gmail.com', 'None', '52294', '1723687753.png'),
(28, 'Endangan, Maria Melissa L.', 'Female', '09292468826', 'cdd.r4b@denr.gov.ph', 'Conservation and Development Division', 'DMO V/Chief CDD', '', '2024-08-15', '67891', '1723702478.png', '46-59', 'melissa', 'bem_endangan@yahoo.com', 'none', '67891', '1723702478.png'),
(29, 'Dagumampan, Karen P.', 'Female', '09086187687', 'ydomimaropa@gmail.com', 'Planning and Management Division', 'Administrative Officer IV', '2x2 Karen Dagumampan (3).jpg', '2024-08-15', '84585', '1723702653.png', '31-45', 'Karen', 'ydomimaropa@gmail.com', 'No blood :)', '84585', '1723702653.png'),
(30, 'PEÑA, JEROME A.', 'Male', '09951777621', 'pena.jerome2001@gmail.com', 'REGIONAL OFFICE/PMD', 'PROJECT SUPPORT OFFICER', 'xxx.jpg', '2024-08-15', '83517', '1723702945.png', '30 and Below', 'JEROME', 'pena.jerome2001@gmail.com', 'N/A', '83517', '1723702945.png'),
(31, 'Rabeje, Lenel R.', 'Male', '09266551882', 'legal.r4b@denr.gov.ph', 'Legal Division', 'Attorney III', '21073cd9-545c-4a3b-9c04-3ca3d3d8ac89.jpg', '2024-08-15', '60909', '1723703173.png', '31-45', 'Lenel', 'rabejelenel1023@gmail.com', 'None', '60909', '1723703173.png'),
(32, 'PEREZ, CATHERINE G', 'Female', '09776285811', 'N.A@N.A', 'DENR MIMAROPA/Conservation and Development Division', 'ENGINEER II/PLANNING OFFICER', '_DSC6655 vid.jpg', '2024-08-15', '37353', '1723703804.png', '30 and Below', 'KATE', 'engrkateperez11@gmail.com', 'Seafoods', '37353', '1723703804.png'),
(33, 'Saludo, Jonas Paolo M.', 'Male', '09171561122', 'pmd.r4b@denr.gov.ph', 'Regional Office/PMD', 'PO IV/OIC-Chief, PMD', '', '2024-08-15', '76807', '1723704030.png', '31-45', 'Jonas', 'saludo.jonaspaolo@gmail.com', 'Spicy, salty and oily', '76807', '1723704030.png'),
(34, 'Manzano, L', 'Female', '09215127273', 'denrfinance.4b@denr.gov.ph', 'Regional Office/Finance Division', 'Chief Budget Section', '', '2024-08-15', '93511', '1723704341.png', '46-59', 'Lorie', 'loriegm1214@gmail.com', 'n/a', '93511', '1723704341.png'),
(35, 'TUBAL, CARMEN RAMINA S.', 'Female', '09053346023', 'denrmimaropalpddwrps@gmaikl.com', 'LICENSES PATENTS AND DEEDS DIVISION (LPDD)', 'Sr. ECOMS', 'edited picture.jpg', '2024-08-15', '88176', '1723705958.png', '46-59', 'Mina', 'carmenramina@gmail.com', 'high sugar', '88176', '1723705958.png'),
(36, 'Mora, Kaila P.', 'Female', '09086821174', 'pps4bmimaropa@gmail.com', 'Regional Office/PMD', 'Planning Officer I', 'Kaila.jpg', '2024-08-15', '36866', '1723706650.png', '30 and Below', 'Kai', 'morakaila3@gmail.com', 'Pork', '36866', '1723706650.png'),
(37, 'Lomenario, April Boy S.', 'Male', '09120276639', 'pmd.r4b@denr.gov.ph', 'Regional Office/PMD', 'GIS Operator', '', '2024-08-15', '12851', '1723706741.png', '30 and Below', 'AB', 'aprilboylomenario@gmail.com', 'NA', '12851', '1723706741.png'),
(38, 'Bautista, Ruby, C.', 'Female', '09495005050', 'finance.r4b@denr.gov.ph', 'Regional Office / Finance', 'Chief, Finance Division', 'mam ruby.png', '2024-08-15', '84540', '1723710259.png', '60 and Above', 'Ruby', 'rubyc.bautista@yahoo.com', 'N/A', '84540', '1723710259.png'),
(39, 'Tañada, Kaizzer Irvin S.', 'Prefer Not to Say', '09502868320', 'pps4bmimaropa@gmail.com', 'PMD', 'Statistician II', 'Kaizzer Tanada ID.JPG', '2024-08-15', '1704', '1723714522.png', '31-45', 'Kaiz', 'irvin.microsoft@gmail.com', 'N.A', '1704', '1723714522.png'),
(40, 'Calayo, Jose Branco, L.', 'Male', '+639994033651', 'starkwayne@yahoo.com', 'Regional Office/ Planning and Management Division', 'Statistician I', 'branco.jpg', '2024-08-16', '44225', '1723769426.png', '31-45', 'Branco', 'starkwayne@yahoo.com', 'None', '44225', '1723769426.png'),
(41, 'Martin, Myrna V', 'Female', '09472082942', 'enforcement.mimaropa@gmail.com', 'ENFORCEMENT', 'DMO II', 'VIZCAYNO, MYRNA, L. (Administravite Assistant I).JPG', '2024-08-16', '63000', '1723770262.png', '31-45', 'MYR', 'mvbizcayno29@gmail.com', '', '63000', '1723770262.png'),
(42, 'Mapanao, Myra S.', 'Female', '09195813254', 'planning.penropalawan@denr.gov.ph', 'DENR PENRO Palawan', 'Planning Officer II', 'ID.jpg', '2024-08-16', '70623', '1723773140.png', '31-45', 'Mai', 'myra.mapanao@gmail.com', 'N.A', '70623', '1723773140.png'),
(43, 'LARGOSA, LORUEL T.', 'Male', '09753357801', 'lorueltps.largosa@gmail.com', 'PMD', 'Programmer', 'Screenshot_20240815-093553~2.jpg', '2024-08-16', '88169', '1723776635.png', '30 and Below', 'Uel', 'lorueltps.largosa@gmail.com', 'None', '88169', '1723776635.png'),
(44, 'CODILLA, DENZIL TROI S.', 'Male', '09205400699', 'troicodilla15@gmail.com', 'REGIONAL OFFICE', 'PROJECT SUPPORT OFFICER', 'CODILLA, DENZIL TROI S..JPG', '2024-08-16', '82088', '1723782637.png', '30 and Below', 'TROI', 'troicodilla15@gmail.com', 'N.A', '82088', '1723782637.png'),
(45, 'GAMBA, RITTZIEN D.', 'Female', '09770190132', 'pmd_mimar4b@yahoo.com.ph', 'RO/PMD ', 'DATA MANAGEMENT OFFICER ', 'RITTZIEN GAMBA.JPG', '2024-08-16', '75928', '1723782777.png', '31-45', 'TZIEN ', 'tziengamba1129@gmail.com', 'NONE', '75928', '1723782777.png'),
(46, 'JUVENAL MARK I FERRER', 'Male', '09690873607', 'markferrer445@gmail.com', 'ADMINISTRATIVE DIVISION-HRDS', 'Administrative Officer IV', 'Juvenal Mark_I_Ferrer.jpg', '2024-08-16', '67684', '1723790821.png', '31-45', 'MARK', 'markferrer445@gmail.com', '', '67684', '1723790821.png'),
(47, 'Limpiada, Marilyn R.', 'Female', '09174951650', 'r4b.lpdd@denr.gov.ph', 'DENR MIMAROPA/LPDD', 'Chief, Licenses, Patents and Deeds Division', '', '2024-08-16', '8130', '1723795563.png', '46-59', 'Marl', 'mrlimpiada@denr.gov.ph', 'NA', '8130', '1723795563.png'),
(48, 'Bitongan, Jomilyn M', 'Prefer Not to Say', '09062879264', 'cenrosanjose@denr.gov.ph', 'CENRO SAN JOSE-OCCIDENTAL. MINDORO', 'LMO I/In-Charge, Planning and Budget', '2x2 joms.jpg', '2024-08-18', '1805', '1723990326.png', '30 and Below', 'Joms', 'jombitongan01@gmail.com', 'N/A', '1805', '1723990326.png'),
(49, 'NICKO T. IBAÑEZ', 'Male', '0926 002 7562', 'nickoibanez08@gmail.com', 'DENR MIMAROPA- PMD', 'STATISTICIAN I', 'NTI.jpg', '2024-08-19', '58414', '1724026574.png', '30 and Below', 'NICKO', 'nickoibanez08@gmail.com', 'NA', '58414', '1724026574.png'),
(50, 'Belen, Jermar D.', 'Male', '0926746533', 'jdbelen@denr.gov.ph', 'PMD', 'ISA II', '', '2024-08-19', '83008', '1724026869.png', '31-45', 'Jermar', 'jdbelen@denr.gov.ph', 'N.A', '83008', '1724026869.png'),
(51, 'Veloso, Patrice Angela T.', 'Female', '09950119509', 'cenrosocorro@denr.gov.ph', 'DENRO CENRO Socorro, PENRO Calapan City, Oriental Mindoro', 'Forester I/Designated Planning Officer', '2x2.jpg', '2024-08-19', '85329', '1724031800.png', '30 and Below', 'Pat', 'triceveloso@gmail.com', 'N.A', '85329', '1724031800.png'),
(52, 'Merced, John Philip', 'Male', '09156121813', 'johnphilipmerced@gmail.com', 'Regional Office/ PMD', 'Statistician II', '10302222_896908706987243_7011179397350766540_n.jpg', '2024-08-19', '59840', '1724055896.png', '31-45', 'J.P.', 'johnphilipmerced@gmail.com', 'NA', '59840', '1724055896.png'),
(53, 'Talabucon, Wamalayda S.', 'Female', 'n.a', 'n.a@gmail.com', 'NA', 'OIC', '', '2024-08-20', '80666', '1724112227.png', '31-45', 'Lay', 'n.a@gmail.com', 'N/A', '80666', '1724112227.png'),
(54, 'lovendino jr. elner O.', 'Male', '09562168256', 'lovendinoelner@gmail.com', 'admin', 'driver', '20240820_081553.jpg', '2024-08-20', '43089', '1724112434.png', '30 and Below', 'jayr', 'lovendinoelner@gmail.com', 'N/A', '43089', '1724112434.png'),
(55, 'Corado, Madona P.', 'Female', '09177707466', 'doncorabril@gmail.com', 'MIMAROPA', 'Senior Communications Development Officer', 'DENR MPCORADO.jpg', '2024-08-20', '43686', '1724136616.png', '31-45', 'Dona', 'doncorabril@gmail.com', 'N/A', '43686', '1724136616.png'),
(56, 'Cacha, Lanie Jane R.', 'Female', '09508823612', 'reylj@gmail.com', 'blank', 'blank', '', '2024-08-20', '31917', '1724142448.png', '30 and Below', 'Jane', 'reylj@gmail.com', 'n.a', '31917', '1724142448.png'),
(57, 'JANES, PANES', 'Female', '0951-299-3486', 'cenroquezon@denr.gov.ph', 'CENRO', 'FORESTER II', 'PANES, Janes T. (no name tag).jpg', '2024-08-21', '36029', '1724201923.png', '31-45', 'JANES', 'panes.janes@gmail.com', 'Not applicable', '36029', '1724201923.png'),
(58, 'GAMUTIA, AZUCENA E.', 'Female', 'N.A', 'aegamutia@gmail.com', 'N.A', 'N.A', '', '2024-08-21', '9432', '1724203972.png', '30 and Below', 'AZUCENA', 'aegamutia@gmail.com', 'N.A', '9432', '1724203972.png'),
(59, 'Dela Cruz, Imelda R.', 'Female', 'n.a', 'n.a@n.a', 'n.a', 'n.a', '', '2024-08-21', '87618', '1724218333.png', '31-45', 'Imelda', 'n.a@n.a', 'n.a', '87618', '1724218333.png'),
(60, 'Saroca, Lilia P.', 'Female', 'n.a', 'n.a@n.a', 'n.a', 'n.a', '', '2024-08-21', '65069', '1724218396.png', '31-45', 'Lilia', 'n.a@n.a', 'n.a', '65069', '1724218396.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `RollNum` int(11) NOT NULL,
  `FullName` varchar(45) DEFAULT NULL,
  `Uname` varchar(45) DEFAULT NULL,
  `Mail` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `Pwd` varchar(45) DEFAULT NULL,
  `CPwd` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`RollNum`, `FullName`, `Uname`, `Mail`, `gender`, `Pwd`, `CPwd`) VALUES
(1, 'DENR MIMAROPA', 'DENR', 'aksyonkalikasan@gmail.com', 'Male', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  ADD PRIMARY KEY (`RollNum`);

--
-- Indexes for table `attendeesdets_tbl`
--
ALTER TABLE `attendeesdets_tbl`
  ADD PRIMARY KEY (`RollNum`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`RollNum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  MODIFY `RollNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `attendeesdets_tbl`
--
ALTER TABLE `attendeesdets_tbl`
  MODIFY `RollNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
