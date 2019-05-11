-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2019 at 07:59 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shubham_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz` text NOT NULL,
  `type` tinyint(4) NOT NULL,
  `ans` text NOT NULL,
  `hv_child` tinyint(1) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz`, `type`, `ans`, `hv_child`, `p_id`) VALUES
(1, 'Q1', 2, 'A1', 1, 0),
(2, 'Q10', 2, 'A10', 1, 1),
(3, 'Q100', 2, 'A100', 0, 2),
(4, 'Q2', 2, 'A2', 1, 0),
(5, 'Q20', 2, 'A20', 0, 4),
(6, 'Q3', 2, 'A3', 0, 0),
(7, 'Q4', 1, 'A4', 1, 0),
(8, 'Q41', 1, 'A41', 1, 7),
(9, 'Q5', 2, 'A51', 0, 0),
(10, 'Q42', 2, 'A42', 1, 8),
(11, 'Q43', 1, 'A44', 0, 10),
(12, 'Q66', 2, 'A6', 1, 0),
(13, 'Q61', 1, 'A610', 0, 12),
(14, 'Q7', 2, 'A8', 1, 0),
(15, 'Q71', 1, 'A71', 0, 14);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_old3`
--

CREATE TABLE `quiz_old3` (
  `quiz_id` int(11) NOT NULL,
  `quiz` text NOT NULL,
  `type` tinyint(4) NOT NULL,
  `ans` text NOT NULL,
  `hv_child` tinyint(1) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_old3`
--

INSERT INTO `quiz_old3` (`quiz_id`, `quiz`, `type`, `ans`, `hv_child`, `p_id`) VALUES
(1, 'Q1', 2, 'A1', 1, 0),
(2, 'Q10', 2, 'A10', 1, 1),
(3, 'Q100', 2, 'A100', 0, 2),
(4, 'Q2', 2, 'A2', 1, 0),
(5, 'Q20', 2, 'A20', 0, 4),
(6, 'Q3', 2, 'A3', 0, 0),
(7, 'Q4', 1, 'A4', 1, 0),
(8, 'Q41', 1, 'A41', 1, 7),
(9, 'Q5', 2, 'A51', 0, 0),
(10, 'Q42', 2, 'A42', 1, 8),
(11, 'Q43', 1, 'A44', 0, 10),
(12, 'Q66', 2, 'A6', 1, 0),
(13, 'Q61', 1, 'A610', 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_old11`
--

CREATE TABLE `quiz_old11` (
  `quiz_id` int(11) NOT NULL,
  `quiz` text NOT NULL,
  `type` tinyint(4) NOT NULL,
  `ans` text NOT NULL,
  `hv_child` tinyint(1) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_old11`
--

INSERT INTO `quiz_old11` (`quiz_id`, `quiz`, `type`, `ans`, `hv_child`, `p_id`) VALUES
(1, 'Q1', 2, 'A1', 1, 0),
(2, 'Q10', 2, 'A10', 1, 1),
(3, 'Q100', 2, 'A100', 0, 2),
(4, 'Q2', 2, 'A2', 1, 0),
(5, 'Q20', 2, 'A20', 0, 4),
(6, 'Q3', 2, 'A3', 0, 0),
(7, 'Q4', 1, 'A4', 1, 0),
(8, 'Q41', 1, 'A41', 1, 7),
(9, 'Q5', 2, 'A51', 0, 0),
(10, 'Q42', 2, 'A42', 1, 8),
(11, 'Q43', 1, 'A44', 0, 10),
(12, 'Q66', 2, 'A6', 1, 0),
(13, 'Q61', 1, 'A610', 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_old12`
--

CREATE TABLE `quiz_old12` (
  `quiz_id` int(11) NOT NULL,
  `quiz` text NOT NULL,
  `type` tinyint(4) NOT NULL,
  `ans` text NOT NULL,
  `hv_child` tinyint(1) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_old12`
--

INSERT INTO `quiz_old12` (`quiz_id`, `quiz`, `type`, `ans`, `hv_child`, `p_id`) VALUES
(1, 'Q1', 2, 'A1', 1, 0),
(2, 'Q10', 2, 'A10', 1, 1),
(3, 'Q100', 2, 'A100', 0, 2),
(4, 'Q2', 2, 'A2', 1, 0),
(5, 'Q20', 2, 'A20', 0, 4),
(6, 'Q3', 2, 'A3', 0, 0),
(7, 'Q4', 1, 'A4', 1, 0),
(8, 'Q41', 1, 'A41', 1, 7),
(9, 'Q5', 2, 'A51', 0, 0),
(10, 'Q42', 2, 'A42', 1, 8),
(11, 'Q43', 1, 'A44', 0, 10),
(12, 'Q66', 2, 'A6', 1, 0),
(13, 'Q61', 1, 'A610', 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_old13`
--

CREATE TABLE `quiz_old13` (
  `quiz_id` int(11) NOT NULL,
  `quiz` text NOT NULL,
  `type` tinyint(4) NOT NULL,
  `ans` text NOT NULL,
  `hv_child` tinyint(1) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_old13`
--

INSERT INTO `quiz_old13` (`quiz_id`, `quiz`, `type`, `ans`, `hv_child`, `p_id`) VALUES
(1, 'Q1', 2, 'A1', 1, 0),
(2, 'Q10', 2, 'A10', 1, 1),
(3, 'Q100', 2, 'A100', 0, 2),
(4, 'Q2', 2, 'A2', 1, 0),
(5, 'Q20', 2, 'A20', 0, 4),
(6, 'Q3', 2, 'A3', 0, 0),
(7, 'Q4', 1, 'A4', 1, 0),
(8, 'Q41', 1, 'A41', 1, 7),
(9, 'Q5', 2, 'A51', 0, 0),
(10, 'Q42', 2, 'A42', 1, 8),
(11, 'Q43', 1, 'A44', 0, 10),
(12, 'Q66', 2, 'A6', 1, 0),
(13, 'Q61', 1, 'A610', 0, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_old3`
--
ALTER TABLE `quiz_old3`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_old11`
--
ALTER TABLE `quiz_old11`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_old12`
--
ALTER TABLE `quiz_old12`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_old13`
--
ALTER TABLE `quiz_old13`
  ADD PRIMARY KEY (`quiz_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `quiz_old3`
--
ALTER TABLE `quiz_old3`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `quiz_old11`
--
ALTER TABLE `quiz_old11`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `quiz_old12`
--
ALTER TABLE `quiz_old12`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `quiz_old13`
--
ALTER TABLE `quiz_old13`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
