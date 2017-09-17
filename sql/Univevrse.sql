-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2017 at 06:32 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Universe`
--

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `MIS` int(11) NOT NULL,
  `uploads` bigint(20) NOT NULL DEFAULT '0',
  `usedspace` double NOT NULL DEFAULT '0',
  `limit` double NOT NULL DEFAULT '1024'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE `Login` (
  `MIS` int(9) NOT NULL,
  `password` text,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` (`MIS`, `password`, `last_login`) VALUES
(123, 'abc', '2017-09-14 10:39:02'),
(234, '900150983cd24fb0d6963f7d28e17f72', '2017-09-14 10:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `Raters`
--

CREATE TABLE `Raters` (
  `MIS_own` int(9) NOT NULL,
  `MIS_other` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `MIS` int(9) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `rating` float(2,1) NOT NULL DEFAULT '0.0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`MIS`, `name`, `email`, `branch`, `rating`) VALUES
(123, 'abc', 'abc', 'abc', 0.0);

-- --------------------------------------------------------

--
-- Table structure for table `Upload`
--

CREATE TABLE `Upload` (
  `MIS` int(9) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `upload_date` datetime NOT NULL,
  `file_type` enum('Audio','Compressed','Executable','Font','ISO','Image','Internet related','Presentation','Programming','Spreadsheet','System related','Text','Video') DEFAULT NULL,
  `dir` text NOT NULL,
  `downloads` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`MIS`);

--
-- Indexes for table `Raters`
--
ALTER TABLE `Raters`
  ADD PRIMARY KEY (`MIS_own`,`MIS_other`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`MIS`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `Upload`
--
ALTER TABLE `Upload`
  ADD PRIMARY KEY (`MIS`,`file_name`,`upload_date`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
