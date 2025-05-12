-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2025 at 05:03 AM
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
-- Table structure for table `seriescrud`
--

CREATE TABLE `seriescrud` (
  `ID` int(25) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mobile` varchar(25) NOT NULL,
  `multipleData` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seriescrud`
--

INSERT INTO `seriescrud` (`ID`, `Fname`, `Lname`, `Email`, `Mobile`, `multipleData`) VALUES
(1, 'james', 'ethan', 'ethanJims@gmail.com', '00000123', ''),
(2, 'Nathan', 'Antonio', 'Nathan@yahoo.com', '09293', ''),
(3, 'Leo', 'Minasa', 'leo@yahoo.com', '09836', ''),
(4, 'John', 'Lenon', 'jhon@gmail.com', '11123', 'React,HTML'),
(5, 'Inno', 'Mana', 'inoo@gmail.com', '77223', 'Javascript,React');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seriescrud`
--
ALTER TABLE `seriescrud`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seriescrud`
--
ALTER TABLE `seriescrud`
  MODIFY `ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
