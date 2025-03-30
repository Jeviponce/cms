-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 03:28 PM
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
-- Table structure for table `reservation_tbl`
--

CREATE TABLE `reservation_tbl` (
  `id` int(11) NOT NULL,
  `ReqNum` varchar(245) DEFAULT NULL,
  `FName` varchar(245) DEFAULT NULL,
  `ValidId` varchar(245) DEFAULT NULL,
  `Lots` varchar(245) DEFAULT NULL,
  `Size` varchar(245) DEFAULT NULL,
  `BPermit` varchar(245) DEFAULT NULL,
  `RBPermit` varchar(245) DEFAULT NULL,
  `DoC` varchar(245) DEFAULT NULL,
  `Dte` varchar(245) DEFAULT NULL,
  `Tme` varchar(245) DEFAULT NULL
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
  `userlvl` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`Id`, `FName`, `Mail`, `CNumber`, `Pwd`, `Address`, `userlvl`) VALUES
(1, 'Juan Dela Cruz', 'jdc@gmail.com', '09198912562', 'test', 'Pasay City', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation_tbl`
--
ALTER TABLE `reservation_tbl`
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
-- AUTO_INCREMENT for table `reservation_tbl`
--
ALTER TABLE `reservation_tbl`
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
