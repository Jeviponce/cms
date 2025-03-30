-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2025 at 09:28 PM
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
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(245) NOT NULL,
  `image` varchar(245) NOT NULL,
  `file_type` varchar(10) DEFAULT NULL,
  `UserMail` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(11) NOT NULL,
  `RefNum` varchar(245) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `graveNum` varchar(245) NOT NULL,
  `FName` varchar(245) NOT NULL,
  `ValidId` varchar(245) NOT NULL,
  `Lots` varchar(245) NOT NULL,
  `Size` varchar(245) NOT NULL,
  `BPermit` varchar(245) NOT NULL,
  `RBPermit` varchar(245) NOT NULL,
  `DoC` varchar(245) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `dte` varchar(245) NOT NULL,
  `status` varchar(245) NOT NULL DEFAULT '0',
  `UserMail` varchar(245) NOT NULL,
  `DoCDte` varchar(245) NOT NULL,
  `mail` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `Id` int(11) NOT NULL,
  `FName` varchar(245) DEFAULT NULL,
  `Mail` varchar(245) DEFAULT NULL,
  `CNumber` varchar(245) DEFAULT NULL,
  `Pwd` varchar(245) DEFAULT NULL,
  `Address` varchar(245) NOT NULL,
  `dte` varchar(245) NOT NULL,
  `userlvl` varchar(245) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 1,
  `img` varchar(245) DEFAULT 'profile_img.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`Id`, `FName`, `Mail`, `CNumber`, `Pwd`, `Address`, `dte`, `userlvl`, `status`, `img`) VALUES
(1, 'Juan Dela Cruz', 'jdc@gmail.com', '09192356211', 'admin', 'Makati', '2025/01/05', '1', 1, 'profile_img.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
