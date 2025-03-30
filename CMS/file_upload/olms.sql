-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 12:18 PM
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
-- Database: `olms`
--

-- --------------------------------------------------------

--
-- Table structure for table `detsaction_tbl`
--

CREATE TABLE `detsaction_tbl` (
  `RollNum` int(11) NOT NULL,
  `TinNum` varchar(255) NOT NULL,
  `ReqNum` varchar(255) NOT NULL,
  `LeaveCredDte` varchar(255) DEFAULT NULL,
  `VLEarned` varchar(255) DEFAULT NULL,
  `SLEarned` varchar(255) DEFAULT NULL,
  `VLLess` varchar(255) DEFAULT NULL,
  `SLLess` varchar(255) DEFAULT NULL,
  `VLBal` varchar(255) DEFAULT NULL,
  `SLBal` varchar(255) DEFAULT NULL,
  `Recommendation` varchar(255) DEFAULT NULL,
  `RecomSpec` varchar(255) NOT NULL,
  `ApprovedFor` varchar(255) DEFAULT NULL,
  `otherSpec` varchar(255) NOT NULL,
  `DisAppSpec` varchar(255) NOT NULL,
  `prsnl_stat` varchar(255) NOT NULL,
  `personnel_sign` varchar(245) NOT NULL,
  `personnel_name` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detsapp_tbl`
--

CREATE TABLE `detsapp_tbl` (
  `RollNum` int(11) NOT NULL,
  `ReqNum` varchar(255) NOT NULL,
  `TinNum` varchar(255) NOT NULL,
  `OffDept` varchar(255) DEFAULT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `DteFil` varchar(255) DEFAULT NULL,
  `EmpPos` varchar(255) DEFAULT NULL,
  `EmpSal` varchar(255) DEFAULT NULL,
  `TypeLeave` varchar(255) DEFAULT NULL,
  `Detsleave` varchar(255) DEFAULT NULL,
  `Specify` varchar(255) DEFAULT 'N/A',
  `NumWorkDays` varchar(255) DEFAULT NULL,
  `incFrom` varchar(255) DEFAULT NULL,
  `incTo` varchar(255) NOT NULL,
  `Cmtn` varchar(255) DEFAULT NULL,
  `dc_sign` varchar(255) NOT NULL,
  `prsnl_sign` varchar(255) NOT NULL,
  `red_sign` varchar(255) NOT NULL,
  `reject_dc` varchar(255) NOT NULL,
  `reject_prsnl` varchar(255) NOT NULL,
  `reject_red` varchar(255) NOT NULL,
  `cmnt` varchar(255) NOT NULL,
  `applicant_sign` varchar(245) NOT NULL,
  `dc_name` varchar(245) NOT NULL,
  `personnel_name` varchar(245) NOT NULL,
  `ao_name` varchar(245) NOT NULL,
  `red_name` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `detsapp_tbl`
--

INSERT INTO `detsapp_tbl` (`RollNum`, `ReqNum`, `TinNum`, `OffDept`, `FullName`, `DteFil`, `EmpPos`, `EmpSal`, `TypeLeave`, `Detsleave`, `Specify`, `NumWorkDays`, `incFrom`, `incTo`, `Cmtn`, `dc_sign`, `prsnl_sign`, `red_sign`, `reject_dc`, `reject_prsnl`, `reject_red`, `cmnt`, `applicant_sign`, `dc_name`, `personnel_name`, `ao_name`, `red_name`) VALUES
(1, 'REQ241100001', '509096111', 'PMD', 'Loruel Tapas Largosa', '2024/11/17', 'Programmer', 'G12', 'Vacation Leave', 'Within Philippines', 'Nueva Ecija', '2', '2024-11-18', '2024-11-19', 'Not Requested', 'signature.png \n2024/11/17', '', '', '', '', '', '', 'signature.png', 'chief chief chief', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `user_id` varchar(245) DEFAULT NULL,
  `username` varchar(245) NOT NULL,
  `password` varchar(245) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `group_id` varchar(245) DEFAULT NULL,
  `firstname` varchar(245) DEFAULT NULL,
  `middlename` varchar(245) DEFAULT NULL,
  `lastname` varchar(245) DEFAULT NULL,
  `suffix` varchar(245) DEFAULT NULL,
  `address` varchar(245) DEFAULT NULL,
  `birthdate` varchar(245) DEFAULT NULL,
  `contactnumber` varchar(245) DEFAULT NULL,
  `civilstatus` varchar(245) DEFAULT NULL,
  `gender` varchar(245) DEFAULT NULL,
  `image` varchar(245) DEFAULT NULL,
  `office` varchar(245) DEFAULT NULL,
  `aor` varchar(245) DEFAULT NULL,
  `section` varchar(245) DEFAULT NULL,
  `item` varchar(245) DEFAULT NULL,
  `position` varchar(245) NOT NULL,
  `designation` varchar(245) DEFAULT NULL,
  `salary_per_annum` varchar(245) DEFAULT NULL,
  `division` varchar(245) DEFAULT NULL,
  `esign_description` varchar(245) DEFAULT NULL,
  `authorized_esign` varchar(245) DEFAULT NULL,
  `details` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `user_id`, `username`, `password`, `email`, `group_id`, `firstname`, `middlename`, `lastname`, `suffix`, `address`, `birthdate`, `contactnumber`, `civilstatus`, `gender`, `image`, `office`, `aor`, `section`, `item`, `position`, `designation`, `salary_per_annum`, `division`, `esign_description`, `authorized_esign`, `details`) VALUES
(1, '509096111', 'User', 'user', 'lorueltps.largosa@gmail.com', '2', 'Loruel', 'Tapas', 'Largosa', 'n.a', 'Pasay City', '1998/10/28', '09753357801', 'Single', 'Male', NULL, 'Regional', 'n.a', 'ICT', 'n.a', 'Programmer', 'Job-Order', 'G12', 'PMD', NULL, 'signature.png', 'Non-Signatory'),
(2, '000000000', 'chief', 'chief', 'chief@chief', '2', 'chief', 'chief', 'chief', 'chief', 'chief', 'na', 'na', 'na', 'na', 'na', 'PMD', 'na', 'na', 'na', 'na', 'Division Chief', 'na', 'PMD', 'na', 'signature.png', 'Signatory'),
(3, '1111111111', 'personnel', 'personnel', 'personnel@personnel', '2', 'personnel', 'personnel', 'personnel', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'NA', 'na', 'AD', 'na', 'signature.png', 'Signatory'),
(4, '222222222', 'AO', 'AO', 'AO@AO', '2', 'AO', 'AO', 'AO', 'AO', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'Division Chief', 'na', 'AD', 'na', 'signature.png', 'Signatory'),
(5, '333333333', 'RED', 'RED', 'red@red', '2', 'red', 'red', 'red', 'red', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'na', 'Head of Office', 'na', 'ORED', 'na', 'signature.png', 'Signatory');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detsaction_tbl`
--
ALTER TABLE `detsaction_tbl`
  ADD PRIMARY KEY (`RollNum`);

--
-- Indexes for table `detsapp_tbl`
--
ALTER TABLE `detsapp_tbl`
  ADD PRIMARY KEY (`RollNum`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detsaction_tbl`
--
ALTER TABLE `detsaction_tbl`
  MODIFY `RollNum` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detsapp_tbl`
--
ALTER TABLE `detsapp_tbl`
  MODIFY `RollNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
