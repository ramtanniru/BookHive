-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 11, 2023 at 06:01 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookhive`
--

-- --------------------------------------------------------

--
-- Table structure for table `Publishers`
--

CREATE TABLE `Publishers` (
  `PublisherID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Publishers`
--

INSERT INTO `Publishers` (`PublisherID`, `Name`, `Address`) VALUES
(1, 'ABC publications', 'Guntur, Andhra Pradesh, India'),
(2, 'LM publications', 'Kodada, Warangal, Telangana, India'),
(3, 'RT publications', 'Nandigama, Andhra pradesh, India'),
(4, 'VT publications ', 'Etukuru, Guntur, Andhra Pradesh, India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Publishers`
--
ALTER TABLE `Publishers`
  ADD PRIMARY KEY (`PublisherID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
