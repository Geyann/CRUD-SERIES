-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 06:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudseries`
--

-- --------------------------------------------------------

--
-- Table structure for table `multipledata`
--

CREATE TABLE `multipledata` (
  `ID` int(25) NOT NULL,
  `CheckBoxData` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `radiodata`
--

CREATE TABLE `radiodata` (
  `id` int(11) NOT NULL,
  `gender` enum('male','female','kids','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `selectdata`
--

CREATE TABLE `selectdata` (
  `ID` int(25) NOT NULL,
  `place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seriescrud`
--

CREATE TABLE `seriescrud` (
  `ID` int(25) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mobile` varchar(25) NOT NULL,
  `multipleData` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seriescrud`
--

INSERT INTO `seriescrud` (`ID`, `Fname`, `Lname`, `Email`, `Mobile`, `multipleData`, `gender`, `place`) VALUES
(1, 'jeevan', 'labid', 'jeevan@gmail.com', '09565656575', 'CSS', 'kids', 'Sabang'),
(3, 'joshua', 'belen', 'belen@yahoo.com', '098366575668', 'React', 'male', 'Halang'),
(4, 'ardie', 'pamintuan', 'ardie@gmail.com', '0965757333', 'React', '', ''),
(5, 'joy', 'motas', 'joy@gmail.com', '09565375735', 'Javascript', '', 'Sabang'),
(9, 'julito', 'labid', 'juls@Gmail.com', '09763766383', 'CSS', 'female', 'Muzon'),
(11, '', '', '', '', 'React', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `multipledata`
--
ALTER TABLE `multipledata`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `radiodata`
--
ALTER TABLE `radiodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selectdata`
--
ALTER TABLE `selectdata`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `seriescrud`
--
ALTER TABLE `seriescrud`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `multipledata`
--
ALTER TABLE `multipledata`
  MODIFY `ID` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `radiodata`
--
ALTER TABLE `radiodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `selectdata`
--
ALTER TABLE `selectdata`
  MODIFY `ID` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seriescrud`
--
ALTER TABLE `seriescrud`
  MODIFY `ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
