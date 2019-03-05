-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2018 at 07:59 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `pos_admin`
--

CREATE TABLE `pos_admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_admin`
--

INSERT INTO `pos_admin` (`admin_id`, `email`, `otp`, `mobile`, `created_date`) VALUES
(1, 'gotothe4@mailinator.com', '9341720', '', '2017-02-15 07:58:58'),
(2, 'ravisoni@walkover.in', 'G27SYha', '', '2017-02-15 13:27:06'),
(3, 'shubham.ctinfotech@gmail.com', 'QamALbh', '', '2017-02-16 18:16:32'),
(4, 'gotothe5@mailinator.com', 'cMn5eTx', '', '2017-02-19 19:17:05'),
(5, 'gotothe6@mailinator.com', 'MnGah1D', '', '2017-02-20 06:58:40'),
(6, 'gotothe7@mailinator.com', 'ycKZSmY', '', '2017-02-25 18:35:03'),
(7, 'gotothe8@mailinator.com', 'sjtlK0P', '', '2017-02-26 11:04:24'),
(8, 'gotothe9@mailinator.com', 'cYotnps', '', '2017-02-26 11:09:07'),
(9, 'ravi@giddh.com', 'x1APlrS', '', '2017-03-06 07:32:50'),
(10, 'postest@mailinator.com', 'qwzMRhF', '', '2017-03-09 12:29:32'),
(11, 'testpos123@mailinator.com', '1rHneEk', '', '2017-03-15 10:24:15'),
(12, 'er.amitholkar@gmail.com', 'lOIEnwJ', '', '2017-03-16 10:25:26'),
(13, 'alka@creativethoughtsinfo.com', '7roqsZd', '', '2017-03-28 10:10:29'),
(14, 'umar@creativethoughtsinfo.com', 'VedBpoq', '', '2017-03-28 10:10:44'),
(15, 'chadi.abinader@omegasystemsuae.com', 'oJdREfu', '', '2017-03-28 15:19:15'),
(16, 'gotothe10@mailinator.com', 'VPYIuf9', '', '2017-04-04 11:31:09'),
(17, 'sachin@mailinator.com', 'NLTwAM8', '', '2017-04-04 14:19:31'),
(18, 'sachin24@mailinator.com', 'ZjgOxdQ', '', '2017-04-04 14:27:44'),
(19, 'sachin42@mailinator.com', 'ycvrV8Z', '', '2017-04-04 14:33:47'),
(20, 'manager@gmail.com', 'hYFjanM', '', '2017-04-04 14:50:31'),
(21, 'gotothe11@mailinator.com', 'jm5pfo7', '', '2017-04-04 15:17:11'),
(22, 'shubhendra@walkover.in', 'pHZrtOv', '', '2017-04-05 06:28:54'),
(23, 'sachin90@mailinator.com', 'YFSZQoH', '', '2017-04-05 08:22:53'),
(24, 'sachin90@gmail.com', 'wR2nOU3', '', '2017-04-05 08:31:10'),
(25, 'sachin01@mailinator.com', 'xVXw9jC', '', '2017-04-05 09:15:17'),
(26, 'sachin123@mailinator.com', '6FaZrI1', '', '2017-04-05 14:57:27'),
(27, 'ravee0422@gmail.com', 'mxZUBCA', '', '2017-04-06 07:45:28'),
(28, 'sachin2402@mailinator.com', 'iULPRxB', '', '2017-04-07 07:01:53'),
(29, 'sachin2402@gmail.com', 'kRlMXA5', '', '2017-04-07 11:27:00'),
(30, 'contacto@redisoft.mx', 'RNXjgpO', '', '2017-04-18 18:10:02'),
(31, 'juan.franco.corzo@gmail.com', 'PH8BEgY', '', '2017-04-18 18:10:49'),
(32, 'raviwalk@mailinator.com', 't0oRWqL', '', '2017-04-19 07:17:57'),
(33, 'ankita@mitti.cafe', 'fEXgOPG', '', '2017-04-26 14:49:31'),
(34, 'gotothe12@mailinator.com', 'lzs93yh', '', '2017-05-02 06:59:51'),
(35, 'sachinmail@mailinator.com', 'PJUnliO', '', '2017-05-15 11:23:08'),
(36, 'sachin1235@mailinator.com', 'BgNrTvZ', '', '2017-05-15 11:24:33'),
(37, 'gotothe1@mailinator.com', 'yrVWjCO', '', '2017-05-16 07:19:32'),
(38, 'cxyz@mailinator.com', 'Czdmh4Q', '', '2017-06-03 12:14:31'),
(39, 'ravisoni@mailinator.com', 'vhC1V3J', '', '2017-06-12 07:44:53'),
(40, 'pranjali@mailinator.com', 'txnsIXV', '', '2017-06-15 06:47:30'),
(41, 'posdemo@mailinator.com', 'WkT9Fl4', '', '2017-07-17 09:26:09'),
(42, 'ankita@mitti.com', 'MyWe4Lz', '', '2017-07-29 09:05:23'),
(43, 'chirag@walkover.in', 'gozSynI', '', '2017-07-31 10:20:05'),
(44, 'dotsale@mailinator.com', '4nmb0lO', '', '2017-09-20 11:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `pos_cash_counter`
--

CREATE TABLE `pos_cash_counter` (
  `cash_counter_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `login_date` datetime NOT NULL,
  `opening_amt` decimal(12,2) NOT NULL,
  `closing_amt` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_cash_counter`
--

INSERT INTO `pos_cash_counter` (`cash_counter_id`, `company_id`, `employee_id`, `login_date`, `opening_amt`, `closing_amt`) VALUES
(1, 1, 1, '2017-03-22 00:00:00', '2000.00', '2000.00'),
(5, 1, 9, '2017-03-24 00:00:00', '1000.00', '1198.00'),
(6, 1, 6, '2017-03-25 00:00:00', '1000.00', '1000.00'),
(7, 1, 9, '2017-03-27 00:00:00', '1000.00', '10921.08'),
(9, 1, 1, '2017-03-23 00:00:00', '2000.00', '2000.00'),
(10, 1, 6, '2017-03-26 00:00:00', '2000.00', '2050.00'),
(11, 1, 9, '2017-03-26 00:00:00', '2000.00', '2050.00'),
(13, 1, 9, '2017-03-28 00:00:00', '1000.00', '3972.25'),
(14, 1, 6, '2017-03-29 00:00:00', '2000.00', '2060.00'),
(15, 1, 6, '2017-03-29 00:00:00', '2000.00', '2000.00'),
(16, 1, 9, '2017-03-29 00:00:00', '1000.00', '1407.10'),
(17, 1, 8, '2017-03-29 00:00:00', '0.00', '0.00'),
(18, 1, 9, '2017-03-30 00:00:00', '1000.00', '2242.48'),
(19, 1, 3, '2017-03-30 00:00:00', '500.00', '635.00'),
(21, 1, 9, '2017-03-31 00:00:00', '1000.00', '1067.20'),
(22, 1, 9, '2017-04-01 00:00:00', '1000.00', '1600.76'),
(23, 1, 3, '2017-04-03 00:00:00', '0.00', '0.00'),
(24, 1, 3, '2017-04-03 00:00:00', '0.00', '0.00'),
(25, 1, 9, '2017-04-04 00:00:00', '1000.00', '1000.00'),
(32, 1, 3, '2017-04-04 00:00:00', '2000.00', '2000.00'),
(35, 1, 3, '2017-04-05 00:00:00', '2500.00', '4387.20'),
(36, 1, 3, '2017-04-06 00:00:00', '2500.00', '2634.40'),
(37, 1, 9, '2017-04-06 00:00:00', '2500.00', '2926.72'),
(38, 1, 9, '2017-04-10 00:00:00', '2000.00', '14048.40'),
(39, 1, 9, '2017-04-11 00:00:00', '2000.00', '14029.52'),
(40, 1, 3, '2017-04-11 00:00:00', '2500.00', '5071.52'),
(41, 1, 3, '2017-04-12 00:00:00', '1500.00', '5338.56'),
(42, 1, 9, '2017-04-13 00:00:00', '1000.00', '1386.40'),
(43, 1, 3, '2017-04-13 00:00:00', '0.00', '3246.32'),
(44, 1, 9, '2017-04-14 00:00:00', '0.00', '3962.68'),
(45, 1, 3, '2017-04-14 00:00:00', '1500.00', '1988.00'),
(46, 1, 9, '2017-04-15 00:00:00', '1000.00', '1000.00'),
(47, 1, 6, '2017-04-15 00:00:00', '0.00', '0.00'),
(48, 1, 8, '2017-04-15 00:00:00', '1000.00', '1168.00'),
(49, 1, 1, '2017-04-15 00:00:00', '1000.00', '1000.00'),
(50, 1, 3, '2017-04-15 00:00:00', '2000.00', '2117.60'),
(51, 1, 2, '2017-04-15 00:00:00', '2000.00', '2000.00'),
(52, 1, 7, '2017-04-15 00:00:00', '2200.00', '2200.00'),
(53, 1, 9, '2017-04-17 00:00:00', '2500.00', '2500.00'),
(54, 1, 3, '2017-04-17 00:00:00', '2000.00', '3422.40'),
(55, 1, 9, '2017-04-18 00:00:00', '1000.00', '3011.60'),
(56, 1, 3, '2017-04-18 00:00:00', '1000.00', '1762.72'),
(57, 1, 3, '2017-04-19 00:00:00', '0.00', '515.20'),
(58, 22, 26, '2017-04-19 00:00:00', '100.00', '100.00'),
(59, 1, 9, '2017-04-19 00:00:00', '200.00', '860.80'),
(60, 22, 28, '2017-04-19 00:00:00', '0.00', '0.00'),
(61, 1, 3, '2017-04-20 00:00:00', '2500.00', '2617.60'),
(62, 1, 9, '2017-04-20 00:00:00', '0.00', '1861.44'),
(63, 1, 3, '2017-04-21 00:00:00', '100.00', '329.60'),
(64, 1, 9, '2017-04-21 00:00:00', '200.00', '597.60'),
(65, 22, 28, '2017-04-21 00:00:00', '1000.00', '1200.00'),
(66, 1, 3, '2017-04-24 00:00:00', '2000.00', '2000.00'),
(67, 1, 9, '2017-04-24 00:00:00', '1000.00', '1448.00'),
(68, 1, 9, '2017-04-25 00:00:00', '0.00', '571.20'),
(69, 1, 3, '2017-04-25 00:00:00', '0.00', '3429.54'),
(70, 1, 3, '2017-04-26 00:00:00', '2500.00', '8864.64'),
(71, 1, 9, '2017-04-26 00:00:00', '0.00', '1740.48'),
(72, 1, 3, '2017-04-27 00:00:00', '0.00', '442.40'),
(73, 1, 9, '2017-04-27 00:00:00', '200.00', '200.00'),
(74, 1, 3, '2017-04-28 00:00:00', '20.00', '4350.12'),
(75, 1, 9, '2017-04-28 00:00:00', '0.00', '379.68'),
(76, 1, 9, '2017-05-01 00:00:00', '0.00', '94.00'),
(77, 1, 1, '2017-05-01 00:00:00', '0.00', '0.00'),
(78, 1, 3, '2017-05-02 00:00:00', '0.00', '0.00'),
(79, 1, 3, '2017-05-03 00:00:00', '0.00', '120.00'),
(80, 1, 2, '2017-05-03 00:00:00', '0.00', '0.00'),
(81, 1, 3, '2017-05-01 00:00:00', '0.00', '370.00'),
(82, 1, 9, '2017-05-02 00:00:00', '100.00', '1077.00'),
(83, 1, 9, '2017-05-03 00:00:00', '0.00', '160.00'),
(84, 1, 9, '2017-05-04 00:00:00', '1000.00', '1060.00'),
(85, 1, 9, '2017-05-05 00:00:00', '1500.00', '2008.00'),
(86, 1, 9, '2017-05-06 00:00:00', '2000.00', '2000.00'),
(87, 1, 1, '2017-03-23 00:00:00', '2000.00', '2000.00'),
(88, 1, 9, '2017-05-08 00:00:00', '10.00', '770.00'),
(89, 1, 1, '2017-05-08 00:00:00', '10.00', '3224.00'),
(90, 1, 9, '2017-05-09 00:00:00', '900.00', '1649.00'),
(91, 1, 9, '2017-05-10 00:00:00', '0.00', '60.00'),
(92, 1, 9, '2017-05-11 00:00:00', '2500.00', '3151.00'),
(93, 1, 9, '2017-05-12 00:00:00', '1500.00', '2030.00'),
(94, 1, 9, '2017-05-13 00:00:00', '1000.00', '1595.90'),
(95, 1, 9, '2017-05-14 00:00:00', '1200.00', '1200.00'),
(96, 1, 9, '2017-05-15 00:00:00', '200.00', '2400.50'),
(97, 1, 9, '2017-05-16 00:00:00', '1500.00', '2598.00'),
(98, 1, 9, '2017-05-17 00:00:00', '1500.00', '2699.00'),
(99, 1, 9, '2017-05-18 00:00:00', '1000.00', '1146.00'),
(100, 1, 9, '2017-05-19 00:00:00', '2000.00', '2000.00'),
(101, 1, 9, '2017-05-21 00:00:00', '1200.00', '1200.00'),
(102, 1, 9, '2017-05-21 00:00:00', '1200.00', '1200.00'),
(103, 1, 9, '2017-05-21 00:00:00', '1234.00', '1234.00'),
(104, 1, 9, '2017-05-21 00:00:00', '0.00', '0.00'),
(105, 1, 9, '2017-05-23 00:00:00', '1000.00', '1060.00'),
(106, 1, 9, '2017-05-24 00:00:00', '1000.00', '1279.00'),
(107, 1, 9, '2017-05-25 00:00:00', '1500.00', '1500.00'),
(108, 1, 9, '2017-05-25 00:00:00', '1500.00', '1500.00'),
(109, 1, 9, '2017-05-25 00:00:00', '1500.00', '1500.00'),
(110, 1, 9, '2017-05-25 00:00:00', '0.00', '0.00'),
(111, 1, 9, '2017-05-25 00:00:00', '0.00', '0.00'),
(112, 1, 9, '2017-05-25 00:00:00', '0.00', '0.00'),
(113, 1, 9, '2017-05-25 00:00:00', '0.00', '0.00'),
(114, 1, 9, '2017-05-25 00:00:00', '1000.00', '1000.00'),
(115, 1, 9, '2017-05-25 00:00:00', '1000.00', '1000.00'),
(116, 1, 9, '2017-05-25 00:00:00', '1000.00', '1000.00'),
(117, 1, 9, '0000-00-00 00:00:00', '0.00', '0.00'),
(118, 1, 9, '2017-05-25 00:00:00', '0.00', '0.00'),
(119, 1, 9, '2017-05-25 00:00:00', '1000.00', '1000.00'),
(120, 1, 9, '2017-05-25 00:00:00', '0.00', '0.00'),
(121, 1, 9, '2017-05-25 00:00:00', '0.00', '0.00'),
(122, 1, 9, '2017-05-25 00:00:00', '100.00', '100.00'),
(123, 1, 9, '2017-05-25 00:00:00', '0.00', '0.00'),
(124, 1, 9, '2017-05-25 00:00:00', '40.00', '40.00'),
(125, 1, 9, '2017-05-25 00:00:00', '100.00', '100.00'),
(126, 1, 9, '2017-05-25 00:00:00', '1000.00', '1000.00'),
(127, 1, 9, '2017-05-25 00:00:00', '0.00', '0.00'),
(128, 1, 9, '2017-05-25 00:00:00', '0.00', '0.00'),
(129, 1, 9, '2017-05-25 00:00:00', '0.00', '0.00'),
(130, 1, 9, '2017-05-25 00:00:00', '0.00', '0.00'),
(131, 1, 9, '2017-05-26 00:00:00', '1500.00', '1500.00'),
(132, 1, 9, '2017-05-29 00:00:00', '1500.00', '2937.00'),
(133, 1, 9, '2017-05-30 00:00:00', '0.00', '1207.00'),
(134, 1, 9, '2017-05-31 00:00:00', '1500.00', '1500.00'),
(135, 1, 9, '2017-06-02 00:00:00', '0.00', '0.00'),
(136, 1, 9, '2017-06-03 00:00:00', '0.00', '0.00'),
(137, 1, 9, '2017-06-05 00:00:00', '0.00', '60.00'),
(138, 1, 9, '2017-06-06 00:00:00', '0.00', '0.00'),
(139, 1, 9, '2017-06-07 00:00:00', '0.00', '0.00'),
(140, 1, 9, '2017-06-08 00:00:00', '0.00', '0.00'),
(141, 1, 9, '2017-06-14 00:00:00', '0.00', '0.00'),
(142, 1, 9, '2017-06-16 00:00:00', '0.00', '0.00'),
(143, 1, 9, '2017-06-19 00:00:00', '0.00', '70.00'),
(144, 1, 9, '2017-06-20 00:00:00', '0.00', '99.00'),
(145, 1, 9, '2017-06-21 00:00:00', '0.00', '0.00'),
(146, 1, 9, '2017-06-27 00:00:00', '1.00', '1.00'),
(147, 1, 9, '2017-06-28 00:00:00', '0.00', '0.00'),
(148, 1, 9, '2017-07-05 00:00:00', '0.00', '0.00'),
(149, 1, 9, '2017-07-06 00:00:00', '0.00', '0.00'),
(150, 1, 9, '2017-07-07 00:00:00', '0.00', '0.00'),
(151, 1, 9, '2017-07-11 00:00:00', '0.00', '0.00'),
(152, 1, 9, '2017-07-12 00:00:00', '0.00', '0.00'),
(153, 1, 9, '2017-07-13 00:00:00', '0.00', '0.00'),
(154, 1, 9, '2017-07-14 00:00:00', '0.00', '0.00'),
(155, 1, 9, '2017-07-15 00:00:00', '0.00', '0.00'),
(156, 1, 9, '2017-07-16 00:00:00', '0.00', '0.00'),
(157, 1, 6, '2017-07-17 00:00:00', '0.00', '0.00'),
(158, 1, 6, '2017-07-18 00:00:00', '0.00', '0.00'),
(159, 1, 6, '2017-07-19 00:00:00', '0.00', '0.00'),
(160, 1, 6, '2017-07-20 00:00:00', '0.00', '0.00'),
(161, 1, 6, '2017-07-21 00:00:00', '0.00', '0.00'),
(162, 1, 6, '2017-07-22 00:00:00', '0.00', '0.00'),
(163, 1, 9, '2017-07-22 00:00:00', '0.00', '0.00'),
(164, 1, 6, '2017-07-23 00:00:00', '0.00', '0.00'),
(165, 1, 6, '2017-07-24 00:00:00', '0.00', '0.00'),
(166, 1, 7, '2017-07-24 00:00:00', '0.00', '0.00'),
(167, 1, 6, '2017-07-25 00:00:00', '0.00', '0.00'),
(168, 1, 6, '2017-07-26 00:00:00', '0.00', '0.00'),
(169, 1, 6, '2017-07-27 00:00:00', '0.00', '0.00'),
(170, 1, 6, '2017-07-28 00:00:00', '0.00', '0.00'),
(171, 1, 6, '2017-08-03 00:00:00', '0.00', '0.00'),
(172, 1, 6, '2017-08-04 00:00:00', '0.00', '0.00'),
(173, 1, 6, '2017-08-05 00:00:00', '0.00', '0.00'),
(174, 1, 6, '2017-08-06 00:00:00', '0.00', '0.00'),
(175, 1, 6, '2017-08-08 00:00:00', '0.00', '0.00'),
(176, 1, 9, '2017-08-09 00:00:00', '0.00', '0.00'),
(177, 1, 6, '2017-08-09 00:00:00', '0.00', '683.00'),
(178, 1, 6, '2017-08-10 00:00:00', '0.00', '159.00'),
(179, 1, 9, '2017-08-10 00:00:00', '0.00', '0.00'),
(180, 1, 6, '2017-08-11 00:00:00', '0.00', '0.00'),
(181, 1, 6, '2017-08-12 00:00:00', '0.00', '0.00'),
(182, 1, 6, '2017-08-14 00:00:00', '100.00', '100.00'),
(183, 1, 6, '2017-08-17 00:00:00', '0.00', '326.00'),
(184, 1, 6, '2017-08-18 00:00:00', '0.00', '0.00'),
(185, 1, 6, '2017-08-19 00:00:00', '0.00', '773.00'),
(186, 1, 6, '2017-08-21 00:00:00', '0.00', '0.00'),
(187, 1, 6, '2017-08-22 00:00:00', '0.00', '596.00'),
(188, 1, 6, '2017-08-23 00:00:00', '0.00', '0.00'),
(189, 1, 6, '2017-08-24 00:00:00', '0.00', '0.00'),
(190, 1, 6, '2017-08-25 00:00:00', '0.00', '0.00'),
(191, 1, 6, '2017-08-30 00:00:00', '0.00', '483.00'),
(192, 1, 6, '2017-09-06 00:00:00', '0.00', '110.00'),
(193, 1, 6, '2017-09-23 00:00:00', '0.00', '0.00'),
(194, 1, 6, '2017-09-25 00:00:00', '0.00', '0.00'),
(195, 1, 6, '2017-10-04 00:00:00', '0.00', '0.00'),
(196, 1, 6, '2017-10-05 00:00:00', '0.00', '0.00'),
(197, 1, 6, '2017-10-05 00:00:00', '0.00', '0.00'),
(198, 1, 6, '2017-10-05 00:00:00', '0.00', '0.00'),
(199, 1, 6, '2017-10-05 00:00:00', '0.00', '0.00'),
(200, 1, 6, '2017-10-05 00:00:00', '0.00', '0.00'),
(201, 1, 6, '2017-10-05 00:00:00', '0.00', '0.00'),
(202, 1, 6, '2017-10-05 00:00:00', '10.00', '10.00'),
(203, 1, 6, '2017-10-06 00:00:00', '12.00', '12.00'),
(204, 1, 6, '2017-10-06 00:00:00', '12.00', '12.00'),
(205, 1, 6, '2017-10-06 00:00:00', '0.00', '0.00'),
(206, 1, 6, '2017-10-06 00:00:00', '20.00', '20.00'),
(207, 1, 6, '2017-10-06 00:00:00', '10.00', '10.00'),
(208, 1, 6, '2017-10-06 00:00:00', '0.00', '0.00'),
(209, 1, 6, '2017-10-06 00:00:00', '0.00', '0.00'),
(210, 1, 6, '2017-10-06 00:00:00', '0.00', '0.00'),
(211, 1, 6, '2017-10-06 00:00:00', '0.00', '0.00'),
(212, 1, 6, '2017-10-06 00:00:00', '0.00', '0.00'),
(213, 1, 6, '2017-10-06 00:00:00', '0.00', '0.00'),
(214, 1, 6, '2017-10-06 00:00:00', '0.00', '0.00'),
(215, 1, 6, '2017-10-06 00:00:00', '0.00', '0.00'),
(216, 1, 6, '2017-10-06 00:00:00', '0.00', '0.00'),
(217, 1, 6, '2017-10-06 00:00:00', '0.00', '0.00'),
(218, 1, 6, '2017-10-06 00:00:00', '0.00', '0.00'),
(219, 1, 6, '2017-10-06 00:00:00', '0.00', '0.00'),
(220, 1, 6, '2017-10-06 00:00:00', '0.00', '0.00'),
(221, 1, 6, '2017-10-06 00:00:00', '0.00', '0.00'),
(222, 1, 6, '2017-10-06 00:00:00', '0.00', '0.00'),
(223, 1, 6, '2017-10-06 00:00:00', '0.00', '0.00'),
(224, 1, 6, '2017-10-11 00:00:00', '0.00', '0.00'),
(225, 1, 6, '2017-10-11 00:00:00', '0.00', '0.00'),
(226, 1, 6, '2017-10-11 00:00:00', '0.00', '0.00'),
(227, 1, 6, '2017-10-11 00:00:00', '0.00', '0.00'),
(228, 1, 6, '2017-10-12 00:00:00', '0.00', '607.00'),
(229, 1, 6, '2017-10-26 00:00:00', '0.00', '224.00'),
(230, 1, 6, '2017-10-27 00:00:00', '0.00', '559.00'),
(231, 1, 6, '2017-10-30 00:00:00', '0.00', '493.00'),
(232, 1, 6, '2017-10-31 00:00:00', '0.00', '1184.00'),
(233, 1, 6, '2017-11-01 00:00:00', '0.00', '2648.00'),
(234, 1, 6, '2017-11-02 00:00:00', '0.00', '2778.00'),
(235, 1, 6, '2017-11-05 00:00:00', '0.00', '0.00'),
(236, 1, 6, '2017-11-06 00:00:00', '0.00', '0.00'),
(237, 1, 6, '2017-11-07 00:00:00', '0.00', '0.00'),
(238, 1, 6, '2017-11-07 00:00:00', '0.00', '0.00'),
(239, 1, 6, '2017-11-08 00:00:00', '0.00', '0.00'),
(240, 1, 6, '2017-11-08 00:00:00', '0.00', '0.00'),
(241, 1, 6, '2017-11-09 00:00:00', '0.00', '314.00'),
(242, 1, 6, '2017-11-09 00:00:00', '0.00', '314.00'),
(243, 1, 6, '2017-11-10 00:00:00', '0.00', '1308.00'),
(244, 1, 6, '2017-11-10 00:00:00', '0.00', '1308.00'),
(245, 1, 6, '2017-11-11 00:00:00', '0.00', '120.00'),
(246, 1, 6, '2017-11-11 00:00:00', '0.00', '120.00'),
(247, 1, 6, '2017-11-14 00:00:00', '0.00', '0.00'),
(248, 1, 6, '2017-11-15 00:00:00', '0.00', '294.00'),
(249, 1, 6, '2017-11-16 00:00:00', '0.00', '1091.00'),
(250, 1, 9, '2017-11-16 00:00:00', '0.00', '45.00'),
(251, 1, 6, '2017-11-17 00:00:00', '0.00', '0.00'),
(252, 1, 9, '2017-11-17 00:00:00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `pos_company`
--

CREATE TABLE `pos_company` (
  `company_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `address` varchar(150) NOT NULL,
  `country` varchar(30) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `timezone` varchar(50) NOT NULL,
  `postal_code` varchar(50) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `pin_no` varchar(4) NOT NULL,
  `tin_no` varchar(30) NOT NULL,
  `pan_no` varchar(30) NOT NULL,
  `image_logo` varchar(50) NOT NULL,
  `booking` varchar(3) NOT NULL,
  `multiple_location` varchar(3) NOT NULL,
  `giddh_auth_key` varchar(250) NOT NULL,
  `giddh_comp_unique_name` varchar(80) NOT NULL,
  `created_date` datetime NOT NULL,
  `company_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gstin` varchar(45) DEFAULT NULL,
  `name_on_invoice` varchar(50) DEFAULT NULL,
  `details_for_invoice` varchar(100) DEFAULT NULL,
  `access_token` text,
  `url` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_company`
--

INSERT INTO `pos_company` (`company_id`, `admin_id`, `name`, `email`, `address`, `country`, `state`, `city`, `timezone`, `postal_code`, `contact_number`, `currency`, `pin_no`, `tin_no`, `pan_no`, `image_logo`, `booking`, `multiple_location`, `giddh_auth_key`, `giddh_comp_unique_name`, `created_date`, `company_datetime`, `gstin`, `name_on_invoice`, `details_for_invoice`, `access_token`, `url`) VALUES
(1, 1, 'Pilgrimage Incubation Pvt Ltd.', 'gotothe4@mailinator.com', 'C.S Naidu Arcade', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '4520011', '8889238880', '1', '1122', '22222', '1234556566', '1511276101_Crispycorn.jpg', '1', '1', '', '', '2017-11-21 15:55:03', '2017-02-15 09:26:14', '23CUHPS9748E222', 'Mitti Cafe', NULL, '4b73777875b66678c2cb97c0b09d22a7b9148b2098306b3ab1d214ee44f94f0d', 'http://menu.dotsale'),
(2, 2, 'Point Of Sales Systems', 'ravisoni@walkover.in', '405 C.S Naidu Arcade, Near Greater Kailash Hospital, Old Palasia', 'India', 'Madhya Pradesh', 'Indore', 'UTC', '452018', '7828405888', '1', '1234', '123456786544', 'CUHPS9748E', '', '1', '1', '', '', '2017-07-17 10:20:18', '2017-02-15 13:32:08', '23CUHPS9748E224', NULL, NULL, '50be5fdfe20b04da8789705cfb976a47516c3758f6ec447d234060646edd93ab', 'http://menu.test.dotsale.in'),
(3, 3, 'SSSS', 'shubham.ctinfotech@gmail.com', 'palasia, indore', 'India', 'Madhya Pradesh', 'Indore', 'Africa/Cairo', '452009', '5454545456', '1', '1234', '123', '321', '', '0', '1', 'LNt65LpCQjx0B4w2ln9Ln9T6Ti277eA5ORRCUwFbgKuMsxjc3_WOCZL9J7p7xp8w5aBCIdtSgmjEO5JUKfQ7Xhgh9QmyFsg5tD5nL-Dwoaa_oakv8TksWaVbSxP_VjpZ', 'democompany', '2017-04-19 13:38:13', '2017-02-16 18:19:11', NULL, NULL, NULL, '7d4e95118238c1d8a86c2cf9809e0c33e97a4c6c531fff02ef1712ec527c676d', NULL),
(4, 4, 'Ctinfo2', 'gotothe5@mailinator.com', 'starling Tower', 'sss', 'sss', 'ssss', 'Africa/Abidjan', 'ss', '1234567890', '1', '1111', 'sss', 'ss', '1487533142_images.jpeg', '0', '0', '_aLh1q1B3GsFcBZsWeEEy4ukKZeF3PXKIzDApQCDwUQf-ztzszKTJ0xtSsZgbklQZ08jOHOmtKl_2rXW8umGLLZ_JpeMLkIy8AaMjunNvc62TsBRngW028PqpDux2oba', 'devcomindore149640187629505zbnj', '2017-04-04 14:38:40', '2017-02-19 19:36:53', NULL, NULL, NULL, '304daa3f2b1556445e38e8bb9a06e3b55ddee5ed60425e03f98e7e850ce618ff', NULL),
(5, 5, 'Ctinfo3', 'gotothe6@mailinator.com', 'Near Melhar mega mall1', 'India', 'Madhya Pradesh', 'Indore', 'Africa/Dakar', '452009', '333333333', '2', '1111', '44444444', '555555555', '1487574279_li.jpeg', '0', '1', '', '', '2017-02-20 12:41:04', '2017-02-20 07:03:59', NULL, NULL, NULL, 'ebfc2d45d0e707f2fd54c947c624cac1cde5beec0ee26b42325718db75122d04', NULL),
(6, 6, 'Ctinfo3', 'gotothe7@mailinator.com', 'Sarafa Bazar', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '23265', '5879632143', '2', '1567', '36987', '53431', '1488106983_joke2.jpg', '0', '1', '', '', '2017-02-26 12:03:03', '2017-02-26 11:03:03', NULL, NULL, NULL, '21a7806f49a531d455778e61c57d854bec536879076f8d15fb5b82d464caf4a2', NULL),
(7, 7, 'Ctinfo4', 'gotothe8@mailinator.com', 'Usha Nagar', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452009', '5484445551', '1', '4454', '3434', '546546', '1488107226_joke2.jpg', '0', '1', '', '', '2017-02-26 12:07:06', '2017-02-26 11:07:06', NULL, NULL, NULL, 'b883e29bfdfe6d5e78bee7a90699b0792fddf6aa1a114ced76ef40fba6747fe1', NULL),
(8, 8, 'Ctinfo55', 'gotothe9@mailinator.com', 'Juni Indore', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452009', '5435455468', '1', '5465', '4334', '67776', '1488107500_joke3.jpg', '0', '1', '', '', '2017-04-04 14:41:30', '2017-02-26 11:11:40', NULL, NULL, NULL, '3f5b963d98d8c2636d7bf62a2903fb14b451324fad9251005cc2b0a8dccb4e38', NULL),
(9, 9, 'Ravi soni', 'ravi@giddh.com', '405 cs naidu arcade', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452018', '7828405888', '1', '1234', '876238746847', 'kjhd2345j', '1491464539_Giddhsvg.png', '1', '1', '', '', '2017-04-06 07:43:45', '2017-04-04 09:16:30', NULL, NULL, NULL, 'db83c8cb131e634151b9630e8c38ce826f83ff846573d758bffb63ba43a9a42f', NULL),
(10, 17, 'Sachin Thakur', 'sachin@mailinator.com', '505,', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452001', '9827040200', '1', '2402', '', '', '1491315784_logo.png', '0', '0', '', '', '2017-04-04 14:23:04', '2017-04-04 14:23:04', NULL, NULL, NULL, '56a77b43dc98a583405e6a2d24dd5240b9d0fb7e4274b1b5bc3d5a32c1d429dc', NULL),
(11, 18, 'Sachin Thakur', 'sachin24@mailinator.com', '505, Shekhar central', 'India', 'Madhya Pradesh', 'indore', 'Asia/Kolkata', '452001', '9827040200', '1', '2402', '', '', '1491316317_logo.png', '0', '0', '', '', '2017-04-04 14:31:57', '2017-04-04 14:31:57', NULL, NULL, NULL, '5d66afd6a79f58769888a499ef0719d0f12b4a9e9022e3ee4d15a06725bfdd6d', NULL),
(12, 19, 'Sachin Thakur', 'sachin42@mailinator.com', '505, Shekhar Central', 'India', 'Madhya Pradesh', 'indore', 'Asia/Kolkata', '452001', '9827040200', '1', '2402', '1242335', '1231241412', '1491316496_logo.png', '0', '0', '', '', '2017-04-04 14:34:56', '2017-04-04 14:34:56', NULL, NULL, NULL, '3d2cd72b526f8a0d6bea8a88aba63186d757322ab85f9c1e23dad9496400a779', NULL),
(13, 16, 'shubham', 'gotothe10@mailinator.com', 'Near Melhar mega mall', 'India', 'Madhya Pradesh', 'indore', 'Africa/Dar_es_Salaam', '4520011', '1234567890', '1', '1111', '', '', '1491318110_index.jpeg', '0', '0', '', '', '2017-04-07 14:29:21', '2017-04-04 15:01:50', NULL, NULL, NULL, 'f6953cc9180483b8d6463b59ea1b7bc539589fab1c7bbb8f8168e7e4f6ec7750', NULL),
(14, 21, 'shubham12', 'gotothe11@mailinator.com', 'Near Melhar mega mall', 'India', 'Madhya Pradesh', 'indore', 'Africa/Dar_es_Salaam', '4520011', '1234567890', '1', '1111', '', '', '1491319112_index.jpeg', '0', '0', '', '', '2017-04-04 15:25:18', '2017-04-04 15:18:32', NULL, NULL, NULL, '70aec96be84c149b0aea16353b8b293ca24131235010e80e01dfde8a43249a1d', NULL),
(15, 22, 'Walkover', 'shubhendra@walkover.in', '405 cs naidu arcade', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452018', '9977389948', '1', '1234', '123456786544', 'asd3246hd', '1491374192_Walkoversvg.png', '1', '1', '', '', '2017-04-05 06:36:32', '2017-04-05 06:36:32', NULL, NULL, NULL, 'e4cfc4039ed9452fd6a97da0a010e96d768f6f782a5d227435a6b3861c4168be', NULL),
(16, 23, 'Sachin Thakur', 'sachin90@mailinator.com', '505, new palasia', 'India', 'Madhya Pradesh', 'indore', 'Asia/Kolkata', '452001', '9827040200', '1', '2402', '', '', '1491380841_logo.png', '0', '0', '', '', '2017-04-05 08:34:39', '2017-04-05 08:27:21', NULL, NULL, NULL, '4ad85bfc686059a2312c8bc860ea94073b41dd4c96228f3d5b200c8c81cc5e6d', NULL),
(17, 25, 'Sachin', 'sachin01@mailinator.com', '505, Shekhar Central', 'India', 'Madhya Pradesh', 'indore', 'Asia/Kolkata', '452001', '9827040200', '1', '2402', '', '', '1491383899_PGlogo.png', '0', '1', '', '', '2017-04-05 09:18:35', '2017-04-05 09:16:39', NULL, NULL, NULL, '04a6d227d275f12054a77347debd13eb448060c0e4e1ef4c2a7636e0f881d80a', NULL),
(18, 26, 'Sachin', 'sachin123@mailinator.com', '505', 'India', 'Madhya Pradesh', 'indore', 'Asia/Kolkata', '452001', '9827040200', '1', '0210', '', '', '1491404350_PGlogo.png', '0', '0', '', '', '2017-04-05 14:59:10', '2017-04-05 14:59:10', NULL, NULL, NULL, '72632c7b79c1a83c228f14331a05754281e501ea16ef2dedba338ef56976748c', NULL),
(19, 27, 'Manukaka', 'ravee0422@gmail.com', '1 Shakkar bazar main road, near sarafa', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452002', '7828405888', '1', '1234', '123456786544', 'asdfg1234h', '1491465416_Walkoversvg.png', '1', '1', '', '', '2017-04-06 08:00:07', '2017-04-06 07:56:56', NULL, NULL, NULL, 'afc81dcca597c7aaab0dd8b8236b4e57834af6a708d3b9545249bcde9c60b627', NULL),
(20, 28, 'Sachin Thakur', 'sachin2402@mailinator.com', '505, Shekhar Central, New Palasia', 'India', 'Madhya Pradesh', 'indore', 'Asia/Kolkata', '452001', '9827040200', '1', '2402', '', '', '1491548698_logo.png', '0', '1', '', '', '2017-04-07 07:04:58', '2017-04-07 07:04:45', NULL, NULL, NULL, '7fb9db1bc3cf1642a7b9da5684b13de2da06fb73c27719b16dd12fa277eef469', NULL),
(21, 31, 'werwerwerwerwerwerwer', 'juan.franco.corzo@gmail.com', 'sdf', 'sdf', 'sdf', 'sdf', 'Africa/Dakar', 'sdf', '1234567890', '1', '1111', '', '', '1492539175_bridgs.png', '0', '0', '', '', '2017-04-18 18:12:55', '2017-04-18 18:12:55', NULL, NULL, NULL, 'e00de71edad4eee0133b8b91e12c3b121ca853ee485731b53836f9c15fcc2292', NULL),
(22, 32, 'VentesBox', 'raviwalk@mailinator.com', '405-406 Capt. C.S Nayudu Arcade', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452018', '7828405888', '1', '2322', '', '', '1492587572_mittisvg.png', '1', '1', '', '', '2017-04-19 09:57:20', '2017-04-19 07:39:32', NULL, NULL, NULL, '3311301f920a1b5ebfd15103c4bb33d7d050e3ba0c3752f1e8b5ceb3bb4616c0', NULL),
(23, 38, 'cxyz', 'cxyz@mailinator.com', 'Rajendra nagar', 'India', 'Madhya Pradesh', 'indore', 'Africa/Dakar', '152009', '1234567890', '1', '0987', '', '', '1496492232_imagesqwq.jpeg', '0', '0', '', '', '2017-06-03 17:47:12', '2017-06-03 12:17:12', NULL, NULL, NULL, 'a0e82718eb70babb0e66606e72f5e4ac315a411d33f474e24bcc064207814739', NULL),
(24, 39, 'dotSale', 'ravisoni@mailinator.com', '405 CS Nayudu Arcade', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452018', '7828405888', '1', '1243', '0000000000000', 'abcde1234f', '1497254036_logo_large.png', '1', '1', 'kF1foJLO4mB6kpbdHyn7yX2r2xZbm6IXWnaAKzms3QzEWEgfLuTIV_QflO10kuLkhKynIKfJ6USm71lAmFfeUdpIk153wTO-1aLvK7FnODI=', 'postesindore14972502110870qwcvb', '2017-06-12 13:23:56', '2017-06-12 07:53:56', NULL, NULL, NULL, 'd9f8ebc8114fe467e541bf9853a8b8df5a85f136e03cce7f4b6c70faaf9fc46a', NULL),
(25, 40, 'Pranjali', 'pranjali@mailinator.com', 'abcd', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452018', '1234567890', '1', '1234', '332211432', 'asdf2134f', '1497509436_jute-bags-500x500.jpg', '1', '1', '', '', '2017-06-15 12:20:36', '2017-06-15 06:50:36', NULL, NULL, NULL, '37d2b0fc149964ac242296f6783d7fe617329dadd79320acd0ea878e6e4de146', NULL),
(26, 41, 'Demo company', 'posdemo@mailinator.com', 'Starling Tower indore', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452001', '1234567890', '1', '1244', '', '', '1500284343_Desert.jpg', '0', '1', '', '', '2017-07-17 09:39:03', '2017-07-17 09:39:03', '123', NULL, NULL, '8bf1f2e3f797ca7da2fe0ff64b5b41003a16258462358791576dde76f1c98aaf', NULL),
(27, 34, 'pooo', 'gotothe12@mailinator.com', 'sadsa', 'dsadas', 'dasd', 'asdas', 'Africa/Dar_es_Salaam', 'dasdas', '1234567896', '1', '1234', 'asdsad', 'asdsad', '', '0', '0', '', '', '2017-08-08 14:24:25', '2017-08-08 14:24:25', 'awsdasd', NULL, NULL, '20d25f6560c3beb7ab1a03ef7193c24ff15159a01562c83c8043e7b9b0da02f8', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pos_company_wallet_integration`
--

CREATE TABLE `pos_company_wallet_integration` (
  `wallet_inte_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `wallet_id` int(11) DEFAULT NULL,
  `wallet_detail` text,
  `is_active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_company_wallet_integration`
--

INSERT INTO `pos_company_wallet_integration` (`wallet_inte_id`, `company_id`, `wallet_id`, `wallet_detail`, `is_active`) VALUES
(1, 1, 1, '{\"Authorization\":\"Bearer eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJyYXZpQHRlc3QuY29tIiwibWVyY2hhbnRfaWQiOiIwMDAwMDIiLCJpYXQiOjE1MDM5ODY1NDF9.hYBDKBA8uromZ-n6_F7EyrJxppCM29vo5qlASmIn0Po\"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos_customer`
--

CREATE TABLE `pos_customer` (
  `customer_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `cust_name` varchar(80) NOT NULL,
  `cust_email` varchar(80) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_customer`
--

INSERT INTO `pos_customer` (`customer_id`, `company_id`, `cust_name`, `cust_email`, `phone_no`, `comment`, `added_date`) VALUES
(1, 1, 'Suresh', 'sur@gmial.com', '122311233', 'He purchased one shoes of Rebook, Size in 9 no.', '2017-03-03 15:22:50'),
(2, 1, 'Mahesh', 'sur2@gmial.com', '32432431', 'He purchased one eye glass of Rebook', '2017-03-03 15:23:39'),
(4, 1, 'Sudama', 'sur3@gmial.com', '32432431', 'He purchased one jeans', '2017-03-03 15:31:02'),
(5, 1, 'test', 'sauravh1234@gmail.com', '07522784994', '', '2017-03-09 13:39:01'),
(6, 1, 'sachin', 'sachin&', '98567\" \"**\"', '', '2017-03-16 08:12:18'),
(7, 1, 'Ravi', 'ravisoni@walkover.in', '7828405888', '', '2017-03-24 15:19:28'),
(8, 1, 'ravi', 'ravi', '7828405888', '', '2017-03-24 15:20:13'),
(9, 1, 'Saurabh', 'saurabh@gmial.com', '9752270449', 'He purchased one shoes of Rebook, Size in 9 no.', '2017-03-29 07:48:11'),
(10, 1, 'keshav', 'keshav@gmail.com', '9752209877', 'test', '2017-03-29 07:51:47'),
(11, 1, 'dresds', 'srere@tyt.com', '85855995959', '', '2017-03-31 11:36:15'),
(12, 1, 'anshul', '', '2584495655', '', '2017-04-01 12:28:41'),
(14, 1, 'sachin', 'sachin@mailinator.com', '9827040200', 'hi', '2017-04-06 13:00:42'),
(15, 1, 'priyanka', 'priya@gmail.com', '9876543210', '', '2017-04-11 13:11:23'),
(16, 1, 'saurabh', 'sa@gmail.com', '3546217890', '', '2017-04-13 10:13:27'),
(17, 1, 'ggg', 'a@gm.com', '9874583966', '', '2017-04-13 14:17:18'),
(18, 1, 'Suresh', 'sur@gmial.com', '1223112336', 'He purchased one shoes of Rebook, Size in 9 no.', '2017-04-15 14:57:38'),
(19, 22, 'Ravi soni', '', '7828405888', '', '2017-04-19 09:16:37'),
(26, 1, 'shubham', '', '9176593270', '', '2017-04-24 14:05:09'),
(27, 1, 'saurabh', '', '9752206197', '', '2017-04-24 14:08:58'),
(28, 1, 'testing', '', '9755605197', '', '2017-04-26 11:52:43'),
(29, 1, 'test1 mohit', 'mohittest@test.com', '9876544567', 'this is first test', '2017-05-05 18:23:50'),
(30, 1, 'test 4', 'test4@test.com', '7894563244', 'test', '2017-05-05 19:47:12'),
(31, 1, 'test5', 'teset5@tstest.com', '9876544521', 'test', '2017-05-05 19:52:09'),
(32, 1, 'test6', 'test6@test.com', '9877896542', 'test', '2017-05-05 19:55:52'),
(33, 1, 'test 7', 'teset@test.com', '7898456321', 'test', '2017-05-06 13:56:58'),
(34, 1, 'test9', 'test9@test.com', '7893214564', 'test 9', '2017-05-06 17:18:30'),
(35, 1, 'tc', 'cvghb', '9827040555', 'bbvccf', '2017-05-16 13:10:27'),
(36, 1, 'priyanka', '', '9856432140', '', '2017-05-16 13:27:10'),
(37, 1, 'saurabh', '', '9584819391', '', '2017-05-16 13:30:56'),
(38, 1, 'ankit', '', '9584622889', '', '2017-05-16 13:32:51'),
(39, 1, 'pp', '', '6543217890', '', '2017-05-16 13:34:27'),
(40, 1, 'jp', '', '0852136547', '', '2017-05-16 14:31:34'),
(41, 1, 'kp', '', '9865321470', '', '2017-05-16 14:34:42'),
(42, 1, 'ab', '', '0789654123', '', '2017-05-16 14:54:44'),
(43, 1, 'pqr', '', '3214569870', '', '2017-05-16 14:55:39'),
(44, 1, 'cbgd', '', '6532147860', '', '2017-05-16 14:57:42'),
(45, 1, 'pos', '', '9856321456', '', '2017-05-16 15:13:04'),
(46, 1, 'bhai', '', '1239874560', '', '2017-05-16 15:38:05'),
(47, 1, 'rakshit', 'gdgdg@hfhfh.com', '87878787878', 'test', '2017-05-21 00:50:23'),
(48, 1, 'Ravi', '', '1234567890', 'no comments', '2017-06-16 20:14:52'),
(49, 1, 'Ravi Soni Office', 'ravisoni@walkover.in', '8889238880', '', '2017-06-16 20:22:28'),
(50, 1, 'new name', '', '1234589756', '', '2017-06-20 15:26:33'),
(51, 1, 'new customer', '', '1234657890', '', '2017-06-20 15:36:22'),
(52, 1, 'New customer', '', '1231234123', '', '2017-07-05 13:59:28'),
(53, 1, 'customer1', '', '3213211234', '', '2017-07-05 14:04:03'),
(54, 1, 'gc', 'gauravc12@gmail.com', '9039262550', '', '2017-11-06 06:39:57'),
(55, 1, 'Gaurav', '', '9993056535', '', '2017-11-14 05:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `pos_customer_recharge`
--

CREATE TABLE `pos_customer_recharge` (
  `recharge_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `recharge_amount` decimal(12,2) DEFAULT NULL,
  `floor_id` int(11) DEFAULT NULL,
  `recharge_date` datetime DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_customer_recharge`
--

INSERT INTO `pos_customer_recharge` (`recharge_id`, `customer_id`, `company_id`, `location_id`, `recharge_amount`, `floor_id`, `recharge_date`, `payment_method_id`) VALUES
(1, 7, 1, 4, '1000.00', 3, '2017-09-25 05:56:17', 1),
(2, 7, 1, 4, '1000.00', 3, '2017-09-25 05:56:29', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pos_device_communicate_with`
--

CREATE TABLE `pos_device_communicate_with` (
  `device_communicate_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `communicate_with_id` int(11) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_device_communicate_with`
--

INSERT INTO `pos_device_communicate_with` (`device_communicate_id`, `device_id`, `company_id`, `communicate_with_id`, `updated_date`) VALUES
(5, 5, 1, 1, '0000-00-00 00:00:00'),
(6, 5, 1, 2, '0000-00-00 00:00:00'),
(7, 5, 1, 4, '0000-00-00 00:00:00'),
(8, 9, 3, 8, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pos_device_location`
--

CREATE TABLE `pos_device_location` (
  `device_location_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_device_location`
--

INSERT INTO `pos_device_location` (`device_location_id`, `location_id`, `device_id`, `company_id`, `updated_date`) VALUES
(3, 1, 2, 1, '0000-00-00 00:00:00'),
(4, 4, 2, 1, '0000-00-00 00:00:00'),
(5, 1, 1, 1, '0000-00-00 00:00:00'),
(6, 2, 1, 1, '0000-00-00 00:00:00'),
(7, 1, 3, 1, '0000-00-00 00:00:00'),
(8, 1, 4, 1, '0000-00-00 00:00:00'),
(10, 4, 5, 1, '0000-00-00 00:00:00'),
(12, 21, 7, 18, '0000-00-00 00:00:00'),
(16, 28, 10, 3, '0000-00-00 00:00:00'),
(17, 33, 11, 26, '0000-00-00 00:00:00'),
(18, 34, 11, 26, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pos_device_management`
--

CREATE TABLE `pos_device_management` (
  `device_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `device_name` varchar(50) NOT NULL,
  `device_type_id` int(11) NOT NULL,
  `device_usage_id` int(11) NOT NULL COMMENT 'Interactive ids... used for as communicate with',
  `communicate_id` int(11) NOT NULL,
  `device_unique_id` int(11) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_device_management`
--

INSERT INTO `pos_device_management` (`device_id`, `company_id`, `device_name`, `device_type_id`, `device_usage_id`, `communicate_id`, `device_unique_id`, `updated_date`) VALUES
(1, 1, 'Device Name1', 3, 2, 1, 34324, '2017-02-22 15:02:48'),
(2, 1, 'Device Name2', 1, 0, 1, 1212121, '2017-02-22 15:03:23'),
(3, 1, 'Epson printer', 3, 2, 0, 1, '2017-03-06 07:44:51'),
(4, 1, 'Barcode reader', 3, 3, 0, 2, '2017-03-06 07:45:37'),
(5, 1, 'Device Name3', 1, 0, 0, 0, '2017-03-06 14:12:02'),
(7, 18, 'printer', 1, 0, 0, 21342, '2017-04-05 15:00:17'),
(10, 3, 'd1', 1, 0, 0, 112, '2017-04-19 10:34:16'),
(11, 26, 'Dev1', 1, 0, 0, 7, '2017-07-17 09:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `pos_device_type`
--

CREATE TABLE `pos_device_type` (
  `device_type_id` int(11) NOT NULL,
  `device_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_device_type`
--

INSERT INTO `pos_device_type` (`device_type_id`, `device_type`) VALUES
(1, 'Management'),
(2, 'User'),
(3, 'Interactive');

-- --------------------------------------------------------

--
-- Table structure for table `pos_device_usage`
--

CREATE TABLE `pos_device_usage` (
  `device_usage_id` int(11) NOT NULL,
  `device_usage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_device_usage`
--

INSERT INTO `pos_device_usage` (`device_usage_id`, `device_usage`) VALUES
(1, 'Tablet'),
(2, 'Printer'),
(3, 'Barcode'),
(4, 'Moniter');

-- --------------------------------------------------------

--
-- Table structure for table `pos_discount`
--

CREATE TABLE `pos_discount` (
  `discount_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `discount_name` varchar(50) NOT NULL,
  `percentage` tinyint(2) NOT NULL,
  `applicable_from` datetime NOT NULL,
  `applicable_to` datetime NOT NULL,
  `location_id` varchar(80) NOT NULL,
  `discount_unique_name` varchar(80) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_discount`
--

INSERT INTO `pos_discount` (`discount_id`, `company_id`, `discount_name`, `percentage`, `applicable_from`, `applicable_to`, `location_id`, `discount_unique_name`, `updated_date`) VALUES
(5, 2, '5 % discount', 5, '2017-03-11 00:00:00', '2017-03-11 00:00:00', '', '', '2017-03-11 11:36:31'),
(6, 2, '10 % discount', 10, '2017-03-11 00:00:00', '2017-03-11 00:00:00', '', '', '2017-03-11 11:36:46'),
(7, 2, '15 % discount', 15, '2017-03-11 00:00:00', '2017-03-11 00:00:00', '', '', '2017-03-11 11:37:00'),
(8, 1, '5% discount', 5, '2017-03-11 00:00:00', '2017-03-11 00:00:00', '', '', '2017-03-11 12:06:39'),
(9, 1, '10% discount', 10, '2017-03-11 00:00:00', '2017-03-11 00:00:00', '', '', '2017-03-11 12:06:52'),
(10, 1, '15% discount', 15, '2017-03-11 00:00:00', '2017-03-11 00:00:00', '', '', '2017-03-11 12:07:11'),
(11, 16, 'Summer discount', 10, '2017-04-05 00:00:00', '2017-06-30 00:00:00', '', '', '2017-04-05 08:45:40'),
(12, 16, 'summer offer', 10, '2017-04-05 00:00:00', '2017-06-30 00:00:00', '', '', '2017-04-05 08:47:04'),
(13, 17, 'summer offer', 10, '2017-04-05 00:00:00', '2017-06-30 00:00:00', '', '', '2017-04-05 09:17:46'),
(14, 18, 'summer offer', 10, '2017-04-05 00:00:00', '2017-04-30 00:00:00', '', '', '2017-04-05 14:59:41'),
(15, 19, '10 % Discount', 10, '2017-04-06 00:00:00', '2017-04-06 00:00:00', '', '', '2017-04-06 08:10:02'),
(16, 19, '5 % Discount', 5, '2017-04-06 00:00:00', '2017-04-06 00:00:00', '', '', '2017-04-06 09:22:38'),
(17, 1, 'Walkover Discount', 99, '2017-04-14 00:00:00', '2017-04-14 00:00:00', '', '', '2017-04-14 05:22:29'),
(18, 22, 'Walkover Discount', 10, '2017-04-19 00:00:00', '2017-04-19 00:00:00', '', '', '2017-04-19 07:39:54'),
(19, 3, 'service tax', 10, '2017-04-19 00:00:00', '2017-04-20 00:00:00', '', '', '2017-04-19 10:30:02'),
(20, 4, 'Discount1', 11, '2017-06-03 00:00:00', '2017-06-15 00:00:00', '', '', '2017-06-03 07:53:36'),
(21, 4, 'Discount2', 20, '2017-06-05 00:00:00', '2017-06-15 00:00:00', '', '', '2017-06-03 08:01:02'),
(22, 4, 'Discount3', 10, '2017-06-13 00:00:00', '2017-06-26 00:00:00', '', '', '2017-06-03 08:02:15'),
(23, 4, 'Discount3', 10, '2017-06-13 00:00:00', '2017-06-26 00:00:00', '', '', '2017-06-03 08:03:12'),
(24, 4, 'Discount44', 10, '2017-06-15 00:00:00', '2017-06-27 00:00:00', '', 'discount410', '2017-06-03 08:06:08'),
(25, 24, '10 Discount', 10, '2017-06-12 00:00:00', '2017-06-12 00:00:00', '', '', '2017-06-12 07:56:23'),
(26, 24, '15 discount', 15, '2017-06-12 00:00:00', '2017-06-12 00:00:00', '', '', '2017-06-12 07:57:11'),
(27, 24, '30 discount', 30, '2017-06-12 00:00:00', '2017-06-12 00:00:00', '', '', '2017-06-12 08:01:23'),
(28, 4, 'Discount1100', 5, '2017-06-12 00:00:00', '2017-06-15 00:00:00', '', 'discount115', '2017-06-12 09:59:19'),
(29, 24, '50 discount', 50, '2017-06-12 00:00:00', '2017-06-12 00:00:00', '', '', '2017-06-12 10:01:06'),
(30, 24, '100 Discount', 99, '2017-06-12 00:00:00', '2017-06-12 00:00:00', '', '', '2017-06-12 10:08:01'),
(31, 26, 'Disco1', 20, '2017-07-17 00:00:00', '2017-07-20 00:00:00', '', '', '2017-07-17 09:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `pos_discount_location`
--

CREATE TABLE `pos_discount_location` (
  `discount_location_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_discount_location`
--

INSERT INTO `pos_discount_location` (`discount_location_id`, `location_id`, `discount_id`, `company_id`, `updated_date`) VALUES
(17, 5, 5, 2, '2017-03-11 11:36:31'),
(18, 5, 6, 2, '2017-03-11 11:36:46'),
(19, 5, 7, 2, '2017-03-11 11:37:00'),
(20, 1, 8, 1, '2017-03-11 12:06:39'),
(21, 1, 9, 1, '2017-03-11 12:06:52'),
(22, 1, 10, 1, '2017-03-11 12:07:11'),
(23, 19, 11, 16, '2017-04-05 08:45:40'),
(24, 19, 12, 16, '2017-04-05 08:47:04'),
(25, 20, 13, 17, '2017-04-05 09:17:46'),
(26, 21, 14, 18, '2017-04-05 14:59:41'),
(27, 22, 15, 19, '2017-04-06 08:10:02'),
(28, 22, 16, 19, '2017-04-06 09:22:38'),
(30, 27, 18, 22, '2017-04-19 07:39:54'),
(32, 28, 19, 3, '2017-04-19 10:30:08'),
(35, 1, 17, 1, '2017-05-31 07:02:48'),
(38, 31, 25, 24, '2017-06-12 08:00:19'),
(39, 31, 26, 24, '2017-06-12 08:00:29'),
(40, 31, 27, 24, '2017-06-12 08:01:24'),
(42, 31, 29, 24, '2017-06-12 10:01:07'),
(43, 29, 28, 4, '2017-06-12 10:05:34'),
(44, 31, 30, 24, '2017-06-12 10:08:02'),
(45, 33, 31, 26, '2017-07-17 09:43:21'),
(46, 34, 31, 26, '2017-07-17 09:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `pos_employee`
--

CREATE TABLE `pos_employee` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(60) NOT NULL,
  `emp_pic` varchar(50) NOT NULL,
  `company_id` int(11) NOT NULL,
  `emp_contact` varchar(12) NOT NULL,
  `emp_email` varchar(80) NOT NULL,
  `permission` int(11) NOT NULL,
  `emp_password` varchar(50) NOT NULL,
  `emp_address` text NOT NULL,
  `employee_under` int(11) NOT NULL COMMENT 'employee parent_id',
  `location_id` int(11) NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_employee`
--

INSERT INTO `pos_employee` (`employee_id`, `employee_name`, `emp_pic`, `company_id`, `emp_contact`, `emp_email`, `permission`, `emp_password`, `emp_address`, `employee_under`, `location_id`, `updated_date`) VALUES
(1, 'Shubham11', '1487676804_wmNjSl.png', 1, '1212121212', 's11@gmail.com', 1, '1234', 'Sudama Nagar', 0, 6, '2017-02-21 15:00:01'),
(2, 'Sourabh', '1487669525_images1212.jpeg', 1, '8889899855', 's12@gmail.com', 1, '1111', 'Guna, Madhya Pradesh', 1, 4, '2017-02-21 15:02:05'),
(3, 'Anshul', '', 1, '9827040200', '', 3, '1111', 'Khandwa, Madhya Pradesh', 2, 6, '2017-02-21 15:05:53'),
(4, 'Prashant', '1487669844_index.jpeg', 1, '45435435', 'pra@gmail.com', 1, '1123', 'Burahanpure', 1, 2, '2017-02-21 15:07:24'),
(5, 'Admin', '', 8, '5435455468', 'gotothe9@mailinator.com', 0, '5465', 'Juni Indore', 0, 11, '2017-02-26 16:41:40'),
(6, 'Ravi Soni1', '1488795213_images32.jpg', 1, '1234567890', 'ravi.walk11@mailinator.com', 2, '1234', 'Palasia indore', 0, 4, '2017-03-06 15:43:33'),
(7, 'Mayank Patidar', '1488797138_images111.jpg', 1, '2312321321', 'may@mailinator.com', 2, '1234', 'Burahanpure', 3, 2, '2017-03-06 16:14:25'),
(8, 'sachin', '1488797205_images33.jpg', 1, '9827040200', 'sachin@mailinator.com', 2, '1234', 'Vijay Nagar', 6, 6, '2017-03-06 16:16:45'),
(9, 'Ravi', '1489240681_ravisoni.jpg', 1, '7828405888', 'ravi@giddh.com', 1, '1234', '405 cs naidu arcade', 0, 1, '2017-03-11 13:58:01'),
(12, 'Admin', '', 11, '9827040200', 'sachin24@mailinator.com', 0, '2402', '505, Shekhar central', 0, 14, '2017-04-04 14:31:57'),
(13, 'Admin', '', 12, '9827040200', 'sachin42@mailinator.com', 0, '2402', '505, Shekhar Central', 0, 15, '2017-04-04 14:34:56'),
(14, 'Admin', '', 13, '1234567890', 'gotothe10@mailinator.com', 0, '1111', 'Near Melhar mega mall', 0, 16, '2017-04-04 15:01:50'),
(15, 'Admin', '', 14, '1234567890', 'gotothe11@mailinator.com', 0, '1111', 'Gita Bhavan2', 0, 17, '2017-04-04 15:18:32'),
(16, 'Admin', '', 15, '9977389948', 'shubhendra@walkover.in', 0, '1234', '405 cs naidu arcade', 0, 18, '2017-04-05 06:36:32'),
(17, 'Admin', '', 16, '9827040200', 'sachin90@mailinator.com', 0, '2402', '505, new palasia', 0, 19, '2017-04-05 08:27:21'),
(18, 'Neha', '', 16, '1234567890', 'neha40@mailinator.com', 16, '1234', '2131212', 0, 19, '2017-04-05 08:43:52'),
(19, 'Admin', '', 17, '9827040200', 'sachin01@mailinator.com', 0, '2402', '505, Shekhar Central', 0, 20, '2017-04-05 09:16:39'),
(20, 'Admin', '', 18, '9827040200', 'sachin123@mailinator.com', 0, '0210', '505', 0, 21, '2017-04-05 14:59:10'),
(21, 'shubham', '1491404586_PGlogo.png', 18, '1231231212', 'shubham@mailinator.com', 20, '0123', 'sarthak', 0, 21, '2017-04-05 15:03:06'),
(22, 'Admin', '', 19, '7828405888', 'ravee0422@gmail.com', 0, '1234', '1 Shakkar bazar main road, near sarafa', 0, 22, '2017-04-06 07:56:56'),
(23, 'Ravi soni', '', 19, '7828405888', 'ravisoni@walkover.in', 24, '1234', '1 shakkar bazar', 0, 22, '2017-04-06 09:43:50'),
(24, 'Admin', '', 20, '9827040200', 'sachin2402@mailinator.com', 0, '2402', '505, Shekhar Central, New Palasia', 0, 25, '2017-04-07 07:04:45'),
(25, 'Admin', '', 21, '1234567890', 'juan.franco.corzo@gmail.com', 0, '1111', 'sdf', 0, 26, '2017-04-18 18:12:56'),
(26, 'Admin', '', 22, '7828405888', 'raviwalk@mailinator.com', 0, '2322', '405-406 Capt. C.S Nayudu Arcade', 0, 27, '2017-04-19 07:39:32'),
(28, 'Ravi', '', 22, '8889238880', '', 29, '1234', '1 Shakkar bazar main road, Indore', 0, 27, '2017-04-19 07:48:10'),
(29, 'e1', '', 3, '1234567890', 'e1@mailinator.com', 31, '1234', 'Sudama Nagar', 29, 28, '2017-04-19 10:37:55'),
(30, 'Sachin', '', 1, '9827040200', '', 1, '4321', '10, sarthak street, bicholi mardana', 0, 1, '2017-04-20 07:27:48'),
(31, 'Govind', '', 4, '7974231253', 'shubham.ctinfotech@gmail.com', 32, '7894', 'Vijay Nagar', 0, 29, '2017-06-03 10:28:05'),
(32, 'Mayank Patidar', '', 4, '1234567890', 'e1@mailinator.com', 32, '5555', 'Sudama Nagar', 0, 29, '2017-06-03 10:36:57'),
(33, 'gudu1', '', 4, '1212121212', 's11@gmail.com', 32, '2222', 'Palasia indore', 0, 29, '2017-06-03 10:37:48'),
(34, 'Admin', '', 23, '1234567890', 'cxyz@mailinator.com', 0, '0987', 'Rajendra nagar', 0, 30, '2017-06-03 12:17:12'),
(35, 'Admin', '', 24, '7828405888', 'ravisoni@mailinator.com', 0, '1243', '405 CS Nayudu Arcade', 0, 31, '2017-06-12 07:53:56'),
(36, 'Ravi soni', '', 24, '8889238880', 'ravisoni@walkover.in', 35, '1234', '1 Shakkar bazar', 35, 31, '2017-06-12 08:02:36'),
(37, 'Admin', '', 25, '1234567890', 'pranjali@mailinator.com', 0, '1234', 'abcd', 0, 32, '2017-06-15 06:50:36'),
(38, 'Admin', '', 26, '1234567890', 'posdemo@mailinator.com', 0, '1244', 'Starling Tower indore', 0, 33, '2017-07-17 09:39:03'),
(39, 'Anshul', '', 26, '9874563100', 'anshul@creativethoughtsinfo.com', 39, '1234', 'Vijay nagr', 38, 34, '2017-07-17 09:50:54'),
(40, 'Admin', '', 27, '1234567896', 'gotothe12@mailinator.com', 0, '1234', 'sadsa', 0, 35, '2017-08-08 14:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `pos_expense`
--

CREATE TABLE `pos_expense` (
  `expense_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `floor_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `expense_type_id` int(11) DEFAULT NULL,
  `expense_amount` decimal(12,2) DEFAULT NULL,
  `other_detail` text,
  `expense_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_expense`
--

INSERT INTO `pos_expense` (`expense_id`, `company_id`, `location_id`, `floor_id`, `employee_id`, `expense_type_id`, `expense_amount`, `other_detail`, `expense_date`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 5, 6, 3, '50.00', '{\"purchase_order_id\":38,\"purchase_order_no\":1}', '2017-08-04 19:36:15', '2017-08-04 14:06:59', '2017-08-04 14:06:59'),
(2, 1, 4, 5, 6, 3, '50.00', '{\"purchase_order_id\":39,\"purchase_order_no\":1}', '2017-08-04 19:36:15', '2017-08-04 14:07:14', '2017-08-04 14:07:14'),
(3, 1, 4, 5, 6, 3, '40.00', '{\"purchase_order_id\":40,\"purchase_order_no\":1}', '2017-08-06 00:00:00', '2017-08-06 12:44:21', '2017-08-06 12:44:21'),
(4, 1, 4, 5, 6, 3, '290.00', '{\"purchase_order_id\":41,\"purchase_order_no\":2}', '2017-08-06 00:00:00', '2017-08-06 12:57:03', '2017-08-06 12:57:03'),
(5, 1, 4, 5, 6, 3, '295.00', '{\"purchase_order_id\":42,\"purchase_order_no\":1}', '2017-08-09 00:00:00', '2017-08-09 07:26:18', '2017-08-09 07:26:18'),
(6, 1, 4, 5, 6, 3, '280.00', '{\"purchase_order_id\":43,\"purchase_order_no\":1}', '2017-08-10 00:00:00', '2017-08-10 14:02:22', '2017-08-10 14:02:22'),
(7, 1, 4, 5, 6, 3, '50.00', '{\"purchase_order_id\":44,\"purchase_order_no\":2}', '2017-08-10 00:00:00', '2017-08-10 14:14:02', '2017-08-10 14:14:02'),
(8, 1, 4, 5, 6, 3, '200.00', '{\"purchase_order_id\":45,\"purchase_order_no\":3}', '2017-08-10 00:00:00', '2017-08-10 14:17:00', '2017-08-10 14:17:00'),
(9, 1, 4, 5, 6, 3, '50.00', '{\"purchase_order_id\":46,\"purchase_order_no\":4}', '2017-08-10 00:00:00', '2017-08-10 14:22:50', '2017-08-10 14:22:50'),
(10, 1, 4, 5, 6, 3, '120.00', '{\"purchase_order_id\":47,\"purchase_order_no\":5}', '2017-08-10 00:00:00', '2017-08-10 14:33:50', '2017-08-10 14:33:50'),
(11, 1, 4, 5, 6, 3, '192.00', '{\"purchase_order_id\":48,\"purchase_order_no\":1}', '2017-08-11 00:00:00', '2017-08-11 14:01:24', '2017-08-11 14:01:24'),
(12, 1, 4, 5, 6, 3, '240.00', '{\"purchase_order_id\":49,\"purchase_order_no\":2}', '2017-08-11 00:00:00', '2017-08-11 14:08:37', '2017-08-11 14:08:37'),
(13, 1, 4, 5, 6, 3, '20.00', '{\"purchase_order_id\":50,\"purchase_order_no\":3}', '2017-08-11 00:00:00', '2017-08-11 14:14:33', '2017-08-11 14:14:33'),
(14, 1, 4, 5, 6, 3, '40.00', '{\"purchase_order_id\":53,\"purchase_order_no\":6}', '2017-08-11 00:00:00', '2017-08-11 14:29:27', '2017-08-11 14:29:27'),
(15, 1, 4, 5, 6, 3, '40.00', '{\"purchase_order_id\":54,\"purchase_order_no\":1}', '2017-08-12 00:00:00', '2017-08-12 04:18:01', '2017-08-12 04:18:01'),
(16, 1, 4, 5, 6, 3, '40.00', '{\"purchase_order_id\":55,\"purchase_order_no\":1}', '2017-08-22 00:00:00', '2017-08-22 14:24:12', '2017-08-22 14:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `pos_expense_type`
--

CREATE TABLE `pos_expense_type` (
  `expense_type_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `expense_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_expense_type`
--

INSERT INTO `pos_expense_type` (`expense_type_id`, `company_id`, `location_id`, `expense_name`) VALUES
(1, 1, 1, 'Purchase'),
(2, 1, 2, 'Purchase'),
(3, 1, 4, 'Purchase'),
(4, 2, 5, 'Purchase'),
(5, 1, 6, 'Purchase'),
(6, 5, 7, 'Purchase'),
(7, 5, 9, 'Purchase'),
(8, 7, 10, 'Purchase'),
(9, 8, 11, 'Purchase'),
(10, 9, 12, 'Purchase'),
(11, 10, 13, 'Purchase'),
(12, 11, 14, 'Purchase'),
(13, 12, 15, 'Purchase'),
(14, 13, 16, 'Purchase'),
(15, 14, 17, 'Purchase'),
(16, 15, 18, 'Purchase'),
(17, 17, 20, 'Purchase'),
(18, 18, 21, 'Purchase'),
(19, 19, 22, 'Purchase'),
(20, 19, 24, 'Purchase'),
(21, 20, 25, 'Purchase'),
(22, 21, 26, 'Purchase'),
(23, 22, 27, 'Purchase'),
(24, 3, 28, 'Purchase'),
(25, 4, 29, 'Purchase'),
(26, 23, 30, 'Purchase'),
(27, 24, 31, 'Purchase'),
(28, 25, 32, 'Purchase'),
(29, 26, 33, 'Purchase'),
(30, 26, 34, 'Purchase');

-- --------------------------------------------------------

--
-- Table structure for table `pos_floor`
--

CREATE TABLE `pos_floor` (
  `floor_id` int(11) NOT NULL,
  `floor_name` varchar(45) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `reservation_status_id` int(11) DEFAULT NULL,
  `floor_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_floor`
--

INSERT INTO `pos_floor` (`floor_id`, `floor_name`, `location_id`, `reservation_status_id`, `floor_type_id`) VALUES
(1, 'Floor 1', 1, 1, 2),
(2, 'Second floor', 1, 3, 1),
(3, 'Floor 1', 4, 1, 2),
(5, 'Floor 3', 4, 1, 1),
(6, 'Floor 5', 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos_floor_type`
--

CREATE TABLE `pos_floor_type` (
  `floor_type_id` int(11) NOT NULL,
  `floor_type_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_floor_type`
--

INSERT INTO `pos_floor_type` (`floor_type_id`, `floor_type_name`) VALUES
(1, 'Table'),
(2, 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `pos_inventory_category`
--

CREATE TABLE `pos_inventory_category` (
  `inventory_category_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_code` varchar(12) NOT NULL,
  `parent_category_id` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `category_pic` varchar(200) NOT NULL,
  `category_unique_name` varchar(80) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kitchen_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_inventory_category`
--

INSERT INTO `pos_inventory_category` (`inventory_category_id`, `company_id`, `category_name`, `category_code`, `parent_category_id`, `tax_id`, `discount_id`, `category_pic`, `category_unique_name`, `updated_date`, `kitchen_id`) VALUES
(1, 1, 'Bhaari', '0005', 0, 0, 0, '', '', '2017-02-24 14:15:28', 32),
(2, 1, 'Halka', '0004', 0, 0, 0, '1488444088_download(1).jpg', '', '2017-02-25 10:28:20', 32),
(3, 1, 'Sandwiches', '0003', 0, 0, 0, '1488018699_joke3.jpg', '', '2017-02-25 10:31:39', 32),
(6, 1, 'Bun Maska', '0002', 0, 0, 0, '1488443686_images111.jpg', '', '2017-03-02 08:34:46', 32),
(7, 1, 'Nashta', '0001', 0, 0, 0, '1488443686_images111.jpg', '', '2017-03-08 14:06:57', 32),
(8, 2, 'Nashta', '0001', 0, 0, 0, '', '', '2017-03-11 11:37:24', NULL),
(9, 2, 'Bun Maska', '0002', 0, 0, 0, '', '', '2017-03-11 11:37:42', NULL),
(10, 2, 'Sandwiches', '0003', 0, 0, 0, '', '', '2017-03-11 11:37:55', NULL),
(11, 2, 'Halka', '0004', 0, 0, 0, '', '', '2017-03-11 11:38:11', NULL),
(12, 2, 'Bhaari', '0005', 0, 0, 0, '', '', '2017-03-11 11:38:24', NULL),
(13, 2, '3 Alag Paranthas', '0006', 0, 0, 0, '', '', '2017-03-11 11:39:00', NULL),
(14, 2, 'Murabba', '0007', 0, 0, 0, '', '', '2017-03-11 11:39:22', NULL),
(15, 2, 'Chai Kadak', '0008', 0, 0, 0, '', '', '2017-03-11 11:39:42', NULL),
(16, 2, 'Chai Alag', '0009', 0, 0, 0, '', '', '2017-03-11 11:40:42', NULL),
(17, 1, '3 Alag paranthas', '0006', 0, 0, 0, '1488443686_images111.jpg', '', '2017-03-11 12:10:04', 32),
(18, 1, 'Murabba', '0007', 0, 0, 0, '1488443686_images111.jpg', '', '2017-03-11 12:10:19', NULL),
(19, 1, 'Chai Kadak', '0008', 0, 0, 0, '1488443686_images111.jpg', '', '2017-03-11 12:10:30', 33),
(20, 1, 'Chai Alag', '0009', 0, 0, 0, '1488443686_images111.jpg', '', '2017-03-11 12:10:51', 33),
(21, 1, 'Anti Chai (Hot)', '0010', 0, 0, 0, '1488443686_images111.jpg', '', '2017-03-11 12:11:06', 33),
(22, 1, 'Anti Chai (Cold)', '0011', 0, 0, 0, '1488443686_images111.jpg', '', '2017-03-11 12:11:18', 33),
(23, 1, 'temp', '0012', 0, 0, 0, '1488443686_images111.jpg', '', '2017-03-14 10:02:40', 32),
(24, 16, 'chocolates', '0001', 0, 0, 0, '1491382399_PGlogo.png', '', '2017-04-05 08:53:19', NULL),
(25, 18, 'logo', '0001', 0, 0, 0, '1491404607_logo.jpg', '', '2017-04-05 15:03:27', NULL),
(26, 19, 'Cat 1', '0001', 0, 0, 0, '', '', '2017-04-06 09:44:13', NULL),
(27, 1, 'Raw material', '0024', 0, 0, 0, '1488443686_images111.jpg', '', '2017-04-11 13:53:55', NULL),
(28, 22, 'Raw material', '0001', 0, 0, 0, '', '', '2017-04-19 07:57:08', NULL),
(29, 22, 'Final Product', '0029', 0, 0, 0, '', '', '2017-04-19 07:58:20', NULL),
(30, 3, 'catty1', '0001', 0, 0, 0, '', '', '2017-04-19 08:21:20', NULL),
(31, 3, 'catyy2', '0031', 30, 0, 0, '', '', '2017-04-19 10:38:23', NULL),
(32, 1, 'chinese', '0028', 0, 0, 0, '1488443686_images111.jpg', '', '2017-05-16 15:07:40', 32),
(33, 1, 'continental', '0033', 0, 0, 0, '1511594995_Crispycorn.jpg', '', '2017-05-16 15:10:02', 32),
(34, 3, 'Daal223', '0032', 0, 0, 0, '', 'daal0032', '2017-05-17 07:21:57', NULL),
(35, 3, 'Floor', '0035', 34, 0, 0, '', '', '2017-05-17 07:27:30', NULL),
(36, 3, 'Grain', '0036', 34, 0, 0, '', '', '2017-05-17 07:30:42', NULL),
(37, 3, 'Rise111', '0037', 34, 0, 0, '', 'rise0037', '2017-05-17 07:33:36', NULL),
(38, 3, 'Bhaji', '0038', 34, 0, 0, '', 'bhaji0038', '2017-05-17 07:36:44', NULL),
(39, 3, 'Sav22', '0039', 0, 0, 0, '', 'sav0039', '2017-05-17 08:25:41', NULL),
(40, 3, 'puri', '0040', 0, 0, 0, '', 'puri0040', '2017-05-17 08:27:33', NULL),
(41, 4, 'Masla', '0001', 0, 0, 0, '', '', '2017-06-02 13:21:34', NULL),
(42, 4, 'curry', '0042', 0, 0, 0, '', 'curry0042', '2017-06-02 13:26:18', NULL),
(43, 4, 'mirch', '0043', 41, 0, 0, '', 'mirch0043', '2017-06-02 13:26:53', NULL),
(44, 4, 'Chai1', '0044', 43, 0, 0, '', 'chai0044', '2017-06-02 13:29:01', NULL),
(45, 24, 'Beverages', '0001', 0, 0, 0, '', 'beverages0001', '2017-06-12 10:04:33', NULL),
(46, 26, 'Bhaji', '0001', 0, 0, 0, '1500285155_Tulips.jpg', '', '2017-07-17 09:52:35', NULL),
(47, 26, 'Dal bhaj', '0047', 46, 0, 0, '1500285155_Tulips.jpg', '', '2017-07-17 09:53:19', NULL),
(48, 2, 'Raw material', '0017', 0, 0, 0, '', '', '2017-07-17 10:21:46', NULL),
(49, 27, 'Default', '0001', 0, 0, 0, '', '', '2017-08-08 14:24:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pos_inventory_category_discount`
--

CREATE TABLE `pos_inventory_category_discount` (
  `inventory_category_discount_id` int(11) NOT NULL,
  `inventory_category_id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_inventory_category_discount`
--

INSERT INTO `pos_inventory_category_discount` (`inventory_category_discount_id`, `inventory_category_id`, `discount_id`, `company_id`) VALUES
(29, 24, 11, 16),
(30, 25, 14, 18),
(34, 31, 19, 3),
(40, 37, 0, 3),
(41, 43, 0, 4),
(42, 44, 0, 4),
(43, 46, 31, 26),
(44, 47, 31, 26),
(45, 20, 0, 1),
(46, 21, 0, 1),
(47, 22, 0, 1),
(48, 19, 0, 1),
(50, 32, 0, 1),
(51, 23, 0, 1),
(52, 17, 0, 1),
(53, 7, 9, 1),
(54, 6, 9, 1),
(55, 2, 0, 1),
(56, 1, 0, 1),
(57, 33, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos_inventory_category_tax`
--

CREATE TABLE `pos_inventory_category_tax` (
  `inventory_category_tax_id` int(11) NOT NULL,
  `inventory_category_id` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_inventory_category_tax`
--

INSERT INTO `pos_inventory_category_tax` (`inventory_category_tax_id`, `inventory_category_id`, `tax_id`, `company_id`) VALUES
(7, 5, 3, 1),
(19, 8, 13, 2),
(20, 9, 13, 2),
(21, 10, 13, 2),
(22, 11, 13, 2),
(23, 12, 13, 2),
(24, 13, 13, 2),
(25, 14, 13, 2),
(26, 15, 13, 2),
(27, 16, 13, 2),
(35, 18, 14, 1),
(43, 24, 16, 16),
(44, 25, 17, 18),
(46, 28, 19, 22),
(49, 29, 19, 22),
(50, 31, 20, 3),
(55, 46, 21, 26),
(56, 47, 21, 26),
(57, 20, 14, 1),
(58, 21, 14, 1),
(59, 22, 14, 1),
(60, 19, 14, 1),
(62, 23, 14, 1),
(63, 17, 14, 1),
(64, 7, 14, 1),
(65, 6, 14, 1),
(66, 3, 14, 1),
(67, 2, 14, 1),
(68, 1, 14, 1),
(84, 33, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos_inventory_stock`
--

CREATE TABLE `pos_inventory_stock` (
  `inventory_stock_id` int(11) NOT NULL,
  `inventory_category_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `product_name` varchar(80) NOT NULL,
  `product_pic` varchar(100) NOT NULL,
  `product_code` varchar(30) NOT NULL,
  `barcode_no` varchar(40) NOT NULL,
  `stock_type` tinyint(1) NOT NULL COMMENT 'service or product',
  `is_inclusive` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `unit_id` smallint(11) NOT NULL,
  `cost_price` varchar(30) NOT NULL,
  `sell_price` varchar(30) NOT NULL,
  `opening_quantity` varchar(20) NOT NULL DEFAULT '0',
  `current_quantity` varchar(20) NOT NULL DEFAULT '0',
  `product_delete_status` tinyint(1) NOT NULL,
  `stock_unique_name` varchar(80) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_type` tinyint(4) DEFAULT NULL,
  `has_manufacturing` tinyint(4) DEFAULT '0',
  `hsn_sac` varchar(45) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `kitchen_id` int(11) DEFAULT NULL,
  `opening_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_inventory_stock`
--

INSERT INTO `pos_inventory_stock` (`inventory_stock_id`, `inventory_category_id`, `company_id`, `product_name`, `product_pic`, `product_code`, `barcode_no`, `stock_type`, `is_inclusive`, `description`, `unit_id`, `cost_price`, `sell_price`, `opening_quantity`, `current_quantity`, `product_delete_status`, `stock_unique_name`, `updated_date`, `product_type`, `has_manufacturing`, `hsn_sac`, `is_active`, `kitchen_id`, `opening_date`) VALUES
(1, 1, 1, 'Stock1', '1488275848_download(1).jpg', 'p111', 'b111', 1, 0, 'SS S SS S S Sf dfg dfdf d fdf dfdf df dfd fdfdf d fdf dfdfdfdfdfgfgfgf dgf g fgh ghg hgh g', 1, '10', '15', '5', '1', 0, '', '2017-02-28 09:57:28', 1, 0, NULL, 1, 32, NULL),
(2, 2, 1, 'Stock2', '1488276935_images121.jpg', 'p222', 'b222', 1, 0, 'gfhfg fgf dgfdg dfg dfg dfg dfg fd gfd gfdg dhgfjasdv dfg jhnjgvbnvn f g fdg erf edfqREFER', 2, '20', '25', '8', '3', 0, '', '2017-02-28 10:15:35', 1, 0, NULL, 1, 32, NULL),
(3, 3, 1, 'Stock3', '1488277211_images32.jpg', 'p333', 'b333', 2, 0, 'trt ret reterttrh hhhg jgh hjhgjggf gfhf hgfgfh fghgf', 1, '30', '45', '14', '9', 0, '', '2017-02-28 10:20:11', 1, 0, NULL, 1, 32, NULL),
(4, 1, 1, 'Stock44', '1488380196_images33.jpg', 'p4444', 'b4444', 2, 0, 'DFds fdsfg gfh fh fj gjk kjl jl lkj lkjlk lkj klkj....4', 0, '504', '1004', '204', '399', 0, '', '2017-03-01 06:58:50', 1, 0, NULL, 1, 32, NULL),
(5, 3, 1, 'Stock5', '1488352473_images.jpeg', 'p555', 'b555', 1, 0, 'ppppppppppppppppppppppppppp', 1, '5', '7', '8', '12', 0, '', '2017-03-01 07:14:33', 1, 0, NULL, 1, 32, NULL),
(13, 3, 1, 'Stock6', '1488354202_images11.jpg', 'p666', 'b666', 1, 0, 'WWQWQWQ', 2, '100', '200', '300', '396', 0, '', '2017-03-01 07:43:22', 1, 0, NULL, 1, 32, NULL),
(14, 6, 1, 'Potatos', '', 'p555', 'b555', 2, 0, 'Test', 2, '50', '60', '70', '8', 0, '', '2017-03-08 12:15:37', 2, 0, NULL, 1, 32, NULL),
(15, 7, 1, 'Pakora basket', '1489234645_pakorabasket.jpg', 'n-0001', 'n0001', 1, 1, 'A basket full of different pakora', 0, '99', '99', '0', '0', 0, '', '2017-03-11 12:15:19', 1, 0, NULL, 1, 32, NULL),
(16, 7, 1, 'Poori bhaji', '', 'n-0002', 'n0002', 1, 0, 'Plate of poori n bhaji', 0, '99', '99', '0', '-1', 0, '', '2017-03-11 12:16:06', 1, 0, NULL, 1, 32, NULL),
(17, 7, 1, 'Sprouts', '', 'n-0003', 'n0003', 1, 1, 'Bowl of sprouts', 0, '60', '60', '0', '-1', 0, '', '2017-03-11 12:56:51', 1, 0, NULL, 1, 32, NULL),
(18, 7, 1, 'Bhutte ka kis', '', 'n-0004', 'n0004', 1, 0, 'Mashed corn', 0, '60', '60', '0', '-27', 0, '', '2017-03-11 12:59:39', 1, 0, NULL, 1, 32, NULL),
(19, 7, 1, 'Vada pav', '', 'n-0005', 'n0005', 1, 0, 'Mumbaiya vada pav', 0, '50', '50', '0', '0', 0, '', '2017-03-11 13:00:33', 1, 0, NULL, 1, 32, NULL),
(20, 7, 1, 'Ghar wala poha', '', 'n-0006', 'n0006', 1, 0, 'Traditional indori poha', 0, '50', '50', '0', '-13', 0, '', '2017-03-11 13:01:21', 1, 0, NULL, 1, 32, NULL),
(21, 7, 1, 'Matar kachori', '', 'n-0007', 'n0007', 1, 0, 'Mast kachori', 0, '40', '40', '0', '-4', 0, '', '2017-03-11 13:02:07', 1, 0, NULL, 1, 32, NULL),
(22, 6, 1, 'Paneer maska', '', 'b-0001', 'b0001', 1, 0, 'Maska', 0, '46.00', '99.00', '0', '12', 0, '', '2017-03-11 13:03:00', 1, 1, '', 1, 32, NULL),
(23, 6, 1, 'Tikki maska', '', 'b-0002', 'b0002', 1, 0, 'maska', 0, '50', '50', '0', '0', 0, '', '2017-03-11 13:03:34', 1, 0, NULL, 1, 32, NULL),
(24, 6, 1, 'Palak maska', '', 'b-0003', 'b0003', 1, 0, 'maska', 0, '50', '50', '0', '-1', 0, '', '2017-03-11 13:04:17', 1, 0, NULL, 1, 32, NULL),
(25, 6, 1, 'Achari maska', '1511595059_Crispycorn.jpg', 'b-0004', 'b0004', 1, 0, 'Maska', 0, '40', '40', '0', '-261', 0, '', '2017-03-11 13:04:53', 3, 0, '', 1, 32, '1970-01-01 00:00:00'),
(26, 3, 1, 'Popeye corn', '', 's-0001', 's0001', 1, 0, 'Sandwich with spinach and corn', 0, '80', '80', '0', '0', 0, '', '2017-03-11 13:05:59', 1, 0, NULL, 1, 32, NULL),
(27, 3, 1, 'Vegetable thas', '', 's-0002', 's0002', 1, 0, 'Thasa thas vegetable inside sandwich', 0, '80', '80', '0', '0', 0, '', '2017-03-11 13:06:51', 1, 0, NULL, 1, 32, NULL),
(28, 2, 1, 'Handi pasta', '', 'h-0001', 'h0001', 1, 0, 'Pasta in handi', 0, '99', '99', '0', '-32', 0, '', '2017-03-11 13:07:29', 1, 0, NULL, 1, 32, NULL),
(29, 2, 1, 'Butter wali khichdi', '', 'h-0002', 'h0002', 1, 0, 'Khichdi', 0, '99', '99', '0', '-35', 0, '', '2017-03-11 13:09:39', 1, 0, NULL, 1, 32, NULL),
(30, 2, 1, 'Kurkure corn (m)', '', 'h-0003', 'h0003', 1, 0, 'Kurkure', 0, '99', '99', '0', '-3', 0, '', '2017-03-11 13:10:37', 1, 0, NULL, 1, 32, NULL),
(31, 2, 1, 'Beetroot tikki', '', 'h-0004', 'h0004', 1, 0, 'tikki', 0, '80', '80', '0', '-19', 0, '', '2017-03-11 13:11:14', 1, 0, NULL, 1, 32, NULL),
(32, 2, 1, 'Nachos - cheese marke', '', 'h-0005', 'h0005', 1, 0, 'Nachos', 0, '70', '70', '0', '-3', 0, '', '2017-03-11 13:13:42', 1, 0, NULL, 1, 32, NULL),
(33, 1, 1, 'Kulhad pav bhaji', '', 'bh-0001', 'bh0001', 1, 0, 'pav bhaji', 0, '129', '129', '0', '-5', 0, '', '2017-03-11 13:14:28', 1, 0, NULL, 1, 32, NULL),
(34, 1, 1, 'Kaafi brown rice + chhole', '', 'bh-0002', 'bh0002', 1, 0, 'Rice with chhole', 0, '129', '129', '0', '-9', 0, '', '2017-03-11 13:15:10', 1, 0, NULL, 1, 32, NULL),
(35, 1, 1, 'Chhole kulche', '', 'bh-0003', 'bh0003', 1, 0, 'Chhole kulche', 0, '129', '129', '0', '-47', 0, '', '2017-03-11 13:16:32', 1, 0, NULL, 1, 32, NULL),
(36, 1, 1, 'Methi thaple - tacos', '', 'bh-0004', 'bh0004', 1, 0, 'Thaple', 0, '119', '119', '0', '-3', 0, '', '2017-03-11 13:17:17', 1, 0, NULL, 1, 32, NULL),
(37, 1, 1, 'Paneer thepla - tacos', '', 'bh-0005', 'bh0005', 1, 0, 'Thepla', 0, '119', '119', '0', '-2', 0, '', '2017-03-11 13:36:09', 1, 0, NULL, 1, 32, NULL),
(38, 17, 1, 'Methi', '', 'p-0001', 'p0001', 1, 0, 'parantha', 0, '60', '60', '0', '-9', 0, '', '2017-03-11 13:36:46', 1, 0, NULL, 1, 32, NULL),
(39, 17, 1, 'Aaloo', '1511595034_Crispycorn.jpg', 'p-0002', 'p0002', 1, 0, 'Parantha', 0, '60', '60', '0', '-446', 0, '', '2017-03-11 13:37:13', 3, 0, '', 1, 32, '1970-01-01 00:00:00'),
(40, 17, 1, 'Gobhi', '', 'p-0003', 'p0003', 1, 0, 'Parantha', 0, '60', '60', '0', '-26', 0, '', '2017-03-11 13:37:47', 1, 0, NULL, 1, 32, NULL),
(41, 19, 1, 'Ketli chai (large)', '', 'ck-0001', 'ck0001', 1, 0, 'chai', 0, '129', '129', '0', '-19', 0, '', '2017-03-11 13:38:38', 1, 0, NULL, 1, 33, NULL),
(42, 19, 1, 'Ketli chai (medium)', '', 'ck-0002', 'ck0002', 1, 0, 'chai', 0, '99', '99', '0', '-11', 0, '', '2017-03-11 13:39:11', 1, 0, NULL, 1, 33, NULL),
(43, 19, 1, 'Kadak chai', '', 'ck-0003', 'ck0003', 1, 0, 'chai', 0, '40', '40', '0', '-12', 0, '', '2017-03-11 13:39:42', 1, 0, NULL, 1, 33, NULL),
(44, 19, 1, 'Acchi wali adrak chai', '', 'ck-0004', 'ck0004', 1, 0, 'chai', 0, '45', '45', '0', '-35', 1, '', '2017-03-11 13:40:52', 1, 0, NULL, 1, 33, NULL),
(45, 19, 1, 'Gur chai', '', 'ck-0005', 'ck0005', 1, 0, 'chai', 0, '45', '45', '0', '-25', 0, '', '2017-03-11 13:41:21', 1, 0, NULL, 1, 33, NULL),
(46, 19, 1, 'Bawa ni chai (Irani Chai)', '', 'ck-0006', 'ck0006', 1, 0, 'chai', 0, '45', '45', '0', '-43', 0, '', '2017-03-11 13:42:08', 1, 0, NULL, 1, 33, NULL),
(47, 19, 1, 'Laung', '', 'ck-0007', 'ck0007', 1, 0, 'chai', 0, '45', '45', '0', '0', 0, '', '2017-03-11 13:43:01', 1, 0, NULL, 1, 33, NULL),
(48, 19, 1, 'Illaichi', '', 'ck-0008', 'ck0008', 1, 0, 'chai', 0, '45', '45', '0', '-9', 0, '', '2017-03-11 13:43:40', 1, 0, NULL, 1, 33, NULL),
(49, 19, 1, 'Mint', '', 'ck-0009', 'ck0009', 1, 0, 'chai', 0, '45', '45', '0', '-3', 0, '', '2017-03-11 13:44:03', 1, 0, NULL, 1, 33, NULL),
(50, 20, 1, 'White chai', '', 'ca-0001', 'ca-0001', 1, 0, 'chai', 0, '80', '80', '0', '0', 0, '', '2017-03-11 13:44:44', 1, 0, NULL, 1, 33, NULL),
(51, 20, 1, 'Black chai', '', 'ca-0002', 'ca0002', 1, 0, 'chai', 0, '70', '70', '0', '-26', 0, '', '2017-03-11 13:45:08', 1, 0, NULL, 1, 33, NULL),
(52, 20, 1, 'Green chai', '', 'ca-0003', 'ca0003', 1, 0, 'chai', 0, '60', '60', '0', '-24', 0, '', '2017-03-11 13:45:34', 1, 0, NULL, 1, 33, NULL),
(53, 20, 1, 'Lemon iced chai', '', 'ca-0004', 'ca0004', 1, 0, 'chai', 0, '60', '60', '0', '-4', 0, '', '2017-03-11 13:48:01', 1, 0, NULL, 1, 33, NULL),
(54, 21, 1, 'Hot chocolate', '', 'ach-0001', 'ach0001', 1, 0, 'chocolate', 0, '80', '80', '0', '-31', 0, '', '2017-03-11 13:49:15', 1, 0, NULL, 1, 33, NULL),
(55, 21, 1, 'Kulhad masala dudh', '', 'ach-0002', 'ach0002', 1, 0, 'dudh', 0, '60', '60', '0', '-19', 0, '', '2017-03-11 13:49:55', 1, 0, NULL, 1, 33, NULL),
(56, 21, 1, 'Filter coffee', '', 'ach-0003', 'ach0003', 1, 0, 'coffee', 0, '40', '40', '0', '-30', 0, '', '2017-03-11 13:50:31', 1, 0, NULL, 1, 33, NULL),
(57, 22, 1, 'Desi chocolate shake', '', 'acc-0001', 'acc0001', 1, 0, 'shake', 0, '80', '80', '0', '-45', 0, '', '2017-03-11 13:51:06', 1, 0, NULL, 1, 33, NULL),
(58, 22, 1, 'Gazar kanji', '', 'acc-0002', 'acc0002', 1, 0, 'shikanji', 0, '70', '70', '0', '-13', 0, '', '2017-03-11 13:52:29', 1, 0, NULL, 1, 33, NULL),
(59, 22, 1, 'Beetroot kanji', '', 'acc-0003', 'acc0003', 1, 0, 'shikanji', 0, '70', '70', '0', '-25', 0, '', '2017-03-11 13:52:59', 1, 0, NULL, 1, 33, NULL),
(60, 22, 1, 'Cold coffee', '', 'acc-0004', 'acc0004', 1, 0, 'coffee', 0, '70', '70', '0', '-49', 0, '', '2017-03-11 13:53:32', 1, 0, NULL, 1, 33, NULL),
(61, 22, 1, 'Deep mango', '', 'acc-0005', 'acc0005', 1, 0, 'shake', 0, '70', '70', '0', '-63', 0, '', '2017-03-11 13:54:07', 1, 0, NULL, 1, 33, NULL),
(62, 22, 1, 'Banana', '', 'acc-0006', 'acc0006', 1, 0, 'shake', 0, '60', '60', '0', '-68', 0, '', '2017-03-11 13:54:33', 1, 0, NULL, 1, 33, NULL),
(63, 22, 1, 'Mint lemonade', '', 'acc-0007', 'acc0007', 1, 0, 'nimbu pani', 0, '50', '50', '0', '-3', 0, '', '2017-03-11 13:55:34', 1, 0, NULL, 1, 33, NULL),
(64, 22, 1, 'Lassi', '', 'acc-0008', 'acc0008', 1, 1, 'lassi', 0, '60', '60', '0', '-2', 0, '', '2017-03-11 13:56:06', 1, 0, NULL, 1, 33, NULL),
(65, 24, 16, 'Cadbury dairymilk', '', 'c-0001', '124124214', 1, 1, '\"A glass and a half of milk in every half pound bar of chocolate\". Cadbury Dairy Milk milk chocolate was launched in 1905 and became an instant success. Made with fresh milk from the British Isles, and Fairtrade cocoa beans, Cadbury Dairy Milk remains one of the UK\'s top chocolate brands.', 1, '8', '10', '200', '0', 0, '', '2017-04-05 08:57:34', 1, 0, NULL, 1, NULL, NULL),
(66, 25, 18, 'qwaxsxas', '1491404705_Freelancerpic5.jpeg', 'l-0001', '1234567', 1, 0, 'dadasdas', 0, '300', '500', '300', '0', 0, '', '2017-04-05 15:05:05', 1, 0, NULL, 1, NULL, NULL),
(67, 26, 19, 'Pro 1', '', 'C1-0001', '123445566', 1, 1, 'No description', 2, '99', '99', '0', '0', 0, '', '2017-04-06 09:47:59', 1, 0, NULL, 1, NULL, NULL),
(68, 27, 1, 'onion', '', 'Rm-0065', '', 1, 0, '', 1, '40', '40', '0', '6', 0, '', '2017-04-11 13:55:24', 2, 0, NULL, 1, NULL, NULL),
(69, 27, 1, 'Paneer', '', 'Rm-0069', '', 1, 0, '', 1, '240', '240', '0', '5', 0, '', '2017-04-14 05:30:44', 2, 0, NULL, 1, NULL, NULL),
(70, 6, 1, 'New Maska', '', 'BM-0071', '', 1, 1, '', 1, '0', '99', '0', '-5', 0, '', '2017-04-14 06:21:27', 1, 0, NULL, 1, 32, NULL),
(71, 28, 22, 'Paneer', '', 'Rm-0001', '', 1, 0, '', 1, '240', '240', '0', '-3.25', 0, '', '2017-04-19 08:06:06', 2, 0, NULL, 1, NULL, NULL),
(72, 28, 22, 'Aaloo', '', 'Rm-0072', '', 1, 0, '', 1, '40', '40', '0', '0', 0, '', '2017-04-19 08:12:32', 2, 0, NULL, 1, NULL, NULL),
(73, 28, 22, 'Mirch powder', '', 'Rm-0073', '', 1, 0, '', 1, '300', '300', '0', '0', 0, '', '2017-04-19 08:13:12', 2, 0, NULL, 1, NULL, NULL),
(74, 28, 22, 'Salt', '', 'Rm-0074', '', 1, 0, '', 0, '18', '18', '0', '0', 0, '', '2017-04-19 08:14:09', 2, 0, NULL, 1, NULL, NULL),
(75, 28, 22, 'Haldi', '', 'Rm-0075', '', 1, 0, '', 1, '323', '323', '0', '0', 0, '', '2017-04-19 08:14:57', 2, 0, NULL, 1, NULL, NULL),
(76, 28, 22, 'Bread packet', '', 'Rm-0076', '', 1, 0, '', 0, '45', '45', '0', '0', 0, '', '2017-04-19 08:17:06', 2, 0, NULL, 1, NULL, NULL),
(77, 30, 3, 'st1', '', 'c-0001', 'b1', 1, 0, 'd11111', 1, '100', '10', '0', '0', 0, '', '2017-04-19 10:39:23', 2, 0, NULL, 1, NULL, NULL),
(78, 38, 3, 'Daal Bhaji', '', 'B-0078', '', 1, 0, '', 2, '30', '40', '', '', 0, '', '2017-05-17 11:24:02', 1, 0, NULL, 1, NULL, NULL),
(79, 43, 4, 'chilli sauce', '', 'm-0001', '', 1, 0, '', 5, '20', '25', '', '', 0, '', '2017-06-02 13:55:56', 2, 0, NULL, 1, NULL, NULL),
(80, 42, 4, 'Kaju Curry', '', 'c-0080', '', 1, 0, '', 1, '10', '20', '', '', 0, '', '2017-06-02 14:00:01', 1, 0, NULL, 1, NULL, NULL),
(81, 42, 4, 'Acurry', '', 'c-0081', '', 1, 0, '', 5, '5', '10', '', '', 0, '', '2017-06-02 14:10:39', 1, 0, NULL, 1, NULL, NULL),
(82, 42, 4, 'Bcurry', '', 'c-0082', '', 1, 0, '', 5, '2', '4', '', '', 0, '', '2017-06-02 14:13:51', 1, 0, NULL, 1, NULL, NULL),
(83, 42, 4, 'Ccurry', '', 'c-0083', '', 1, 0, '', 5, '1', '2', '', '', 0, '', '2017-06-02 14:15:40', 1, 0, NULL, 1, NULL, NULL),
(84, 42, 4, 'Dcurry', '', 'c-0084', '', 1, 0, '', 5, '3', '6', '', '', 0, '', '2017-06-02 14:17:12', 1, 0, NULL, 1, NULL, NULL),
(85, 42, 4, 'E-curry', '', 'c-0085', '', 1, 0, '', 5, '4', '8', '', '', 0, '', '2017-06-02 14:20:35', 1, 0, NULL, 1, NULL, NULL),
(86, 42, 4, 'F-curry', '', 'c-0086', '', 1, 0, '', 1, '5', '10', '', '', 0, '', '2017-06-02 14:22:06', 1, 0, NULL, 1, NULL, NULL),
(87, 42, 4, 'G-curry', '', 'c-0087', '', 1, 0, '', 5, '3', '5', '', '', 0, 'gcurry', '2017-06-02 14:30:11', 1, 0, NULL, 1, NULL, NULL),
(88, 42, 4, 'H-curry11', '', 'c-0088', '', 1, 0, '', 5, '2', '4', '', '', 0, 'hcurry', '2017-06-02 14:33:21', 1, 0, NULL, 1, NULL, NULL),
(89, 45, 24, 'Banana shake', '', 'B-0001', '', 1, 0, 'Made of banana', 5, '20', '100', '0', '', 0, 'bananashake', '2017-06-13 10:49:22', 1, 0, NULL, 1, NULL, NULL),
(90, 46, 26, 'BJ1', '', 'B-0001', '123456', 1, 1, 'Veg food', 1, '50', '0.00', '3', '2', 0, '', '2017-07-17 09:58:17', 3, 0, NULL, 1, NULL, NULL),
(91, 48, 2, 'Jeera', '', 'Rm-0001', '', 1, 0, '', 1, '250', '0', '0', '', 0, '', '2017-07-17 10:22:40', 2, 0, NULL, 1, NULL, NULL),
(92, 48, 2, 'Ajwain', '', 'Rm-0092', '', 1, 0, '', 1, '230', '0', '0', '', 0, '', '2017-07-17 10:23:48', 2, 0, NULL, 1, NULL, NULL),
(93, 48, 2, 'Cheese', '', 'Rm-0093', '', 1, 0, '', 5, '10', '0', '0', '', 0, '', '2017-07-17 10:24:58', 2, 0, NULL, 1, NULL, NULL),
(94, 48, 2, 'Bread', '', 'Rm-0094', '', 1, 0, '', 5, '15', '15', '0', '', 0, '', '2017-07-17 10:27:05', 2, 0, NULL, 1, NULL, NULL),
(95, 48, 2, 'Onion', '', 'Rm-0095', '', 1, 0, '', 1, '30', '30', '0', '', 0, '', '2017-07-17 10:27:28', 2, 0, NULL, 1, NULL, NULL),
(96, 48, 2, 'Tomato', '', 'Rm-0096', '', 1, 0, '', 1, '20', '20', '0', '', 0, '', '2017-07-17 10:28:21', 2, 0, NULL, 1, NULL, NULL),
(97, 17, 1, 'test paratha', '', '', '', 1, 0, '', 5, '60.00', '100', '0', '12', 0, '', '2017-07-29 09:06:45', NULL, 1, '', 1, 32, NULL),
(98, 0, 1, '', '', '', '', 1, 0, '', 3, '0', '0', '0', '0', 0, '', '2017-07-29 09:12:28', 1, 1, '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pos_inventory_stock_customfields`
--

CREATE TABLE `pos_inventory_stock_customfields` (
  `inventory_stock_customfield_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `inventory_stock_id` int(11) NOT NULL,
  `custom_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_inventory_stock_customfields`
--

INSERT INTO `pos_inventory_stock_customfields` (`inventory_stock_customfield_id`, `company_id`, `inventory_stock_id`, `custom_name`) VALUES
(1, 1, 0, 'HHH'),
(2, 1, 0, 'LLL'),
(3, 1, 0, 'qr code');

-- --------------------------------------------------------

--
-- Table structure for table `pos_inventory_stock_customfields_value`
--

CREATE TABLE `pos_inventory_stock_customfields_value` (
  `inventory_stock_customfields_value_id` int(11) NOT NULL,
  `inventory_stock_customfield_id` int(11) NOT NULL,
  `inventory_stock_id` int(11) NOT NULL,
  `value` varchar(60) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_inventory_stock_customfields_value`
--

INSERT INTO `pos_inventory_stock_customfields_value` (`inventory_stock_customfields_value_id`, `inventory_stock_customfield_id`, `inventory_stock_id`, `value`, `company_id`) VALUES
(9, 1, 4, 'Happen11', 1),
(10, 2, 4, 'Happen22', 1),
(11, 1, 3, 'Happen111', 1),
(12, 2, 3, 'Happen222', 1),
(13, 1, 2, 'W1', 1),
(14, 2, 2, 'W2', 1),
(15, 1, 13, 'jjjjjjjjjjjj', 1),
(16, 2, 13, 'oooooooooooo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos_inventory_stock_discount`
--

CREATE TABLE `pos_inventory_stock_discount` (
  `inventory_stock_discount_id` int(11) NOT NULL,
  `inventory_stock_id` int(11) NOT NULL,
  `inventory_category_id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_inventory_stock_discount`
--

INSERT INTO `pos_inventory_stock_discount` (`inventory_stock_discount_id`, `inventory_stock_id`, `inventory_category_id`, `discount_id`, `company_id`) VALUES
(9, 6, 0, 4, 1),
(10, 7, 0, 4, 1),
(11, 8, 0, 4, 1),
(12, 9, 0, 4, 1),
(13, 10, 0, 4, 1),
(14, 11, 0, 4, 1),
(15, 12, 0, 4, 1),
(35, 65, 24, 11, 16),
(37, 77, 30, 19, 3),
(54, 90, 46, 31, 26),
(55, 50, 20, 0, 1),
(56, 51, 20, 0, 1),
(57, 52, 20, 0, 1),
(58, 53, 20, 0, 1),
(59, 54, 21, 0, 1),
(60, 55, 21, 0, 1),
(61, 56, 21, 0, 1),
(62, 57, 22, 0, 1),
(63, 58, 22, 0, 1),
(64, 59, 22, 0, 1),
(65, 60, 22, 0, 1),
(66, 61, 22, 0, 1),
(67, 62, 22, 0, 1),
(68, 63, 22, 0, 1),
(69, 64, 22, 0, 1),
(70, 41, 19, 0, 1),
(71, 42, 19, 0, 1),
(72, 43, 19, 0, 1),
(73, 44, 19, 0, 1),
(74, 45, 19, 0, 1),
(75, 46, 19, 0, 1),
(76, 47, 19, 0, 1),
(77, 48, 19, 0, 1),
(78, 49, 19, 0, 1),
(79, 38, 17, 0, 1),
(81, 40, 17, 0, 1),
(82, 97, 17, 0, 1),
(83, 15, 7, 9, 1),
(84, 16, 7, 9, 1),
(85, 17, 7, 9, 1),
(86, 18, 7, 9, 1),
(87, 19, 7, 9, 1),
(88, 20, 7, 9, 1),
(89, 21, 7, 9, 1),
(90, 14, 6, 9, 1),
(91, 22, 6, 9, 1),
(92, 23, 6, 9, 1),
(93, 24, 6, 9, 1),
(95, 70, 6, 9, 1),
(96, 2, 2, 0, 1),
(97, 28, 2, 0, 1),
(98, 29, 2, 0, 1),
(99, 30, 2, 0, 1),
(100, 31, 2, 0, 1),
(101, 32, 2, 0, 1),
(102, 1, 1, 0, 1),
(103, 4, 1, 0, 1),
(104, 33, 1, 0, 1),
(105, 34, 1, 0, 1),
(106, 35, 1, 0, 1),
(107, 36, 1, 0, 1),
(108, 37, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos_inventory_stock_discount_copy27apr`
--

CREATE TABLE `pos_inventory_stock_discount_copy27apr` (
  `inventory_stock_discount_id` int(11) NOT NULL,
  `inventory_stock_id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_inventory_stock_discount_copy27apr`
--

INSERT INTO `pos_inventory_stock_discount_copy27apr` (`inventory_stock_discount_id`, `inventory_stock_id`, `discount_id`, `company_id`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(8, 5, 2, 1),
(9, 6, 4, 1),
(10, 7, 4, 1),
(11, 8, 4, 1),
(12, 9, 4, 1),
(13, 10, 4, 1),
(14, 11, 4, 1),
(15, 12, 4, 1),
(26, 4, 2, 1),
(27, 4, 3, 1),
(28, 4, 4, 1),
(29, 3, 4, 1),
(30, 2, 1, 1),
(31, 2, 2, 1),
(35, 65, 11, 16),
(37, 77, 19, 3),
(38, 70, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos_inventory_stock_location`
--

CREATE TABLE `pos_inventory_stock_location` (
  `inventory_stock_location_id` int(11) NOT NULL,
  `inventory_stock_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_inventory_stock_location`
--

INSERT INTO `pos_inventory_stock_location` (`inventory_stock_location_id`, `inventory_stock_id`, `location_id`, `company_id`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(7, 5, 2, 1),
(8, 6, 2, 1),
(9, 7, 2, 1),
(10, 8, 2, 1),
(11, 9, 2, 1),
(12, 10, 2, 1),
(13, 11, 2, 1),
(14, 12, 2, 1),
(22, 4, 1, 1),
(23, 4, 4, 1),
(24, 3, 6, 1),
(25, 2, 1, 1),
(26, 2, 2, 1),
(28, 16, 1, 1),
(31, 18, 1, 1),
(32, 19, 1, 1),
(33, 20, 1, 1),
(34, 21, 1, 1),
(36, 23, 1, 1),
(37, 24, 1, 1),
(39, 26, 1, 1),
(40, 27, 1, 1),
(41, 28, 1, 1),
(42, 29, 1, 1),
(43, 30, 1, 1),
(44, 31, 1, 1),
(45, 32, 1, 1),
(46, 33, 1, 1),
(47, 34, 1, 1),
(48, 35, 1, 1),
(49, 36, 1, 1),
(50, 37, 1, 1),
(51, 38, 1, 1),
(53, 40, 1, 1),
(54, 41, 1, 1),
(55, 42, 1, 1),
(56, 43, 1, 1),
(57, 44, 1, 1),
(58, 45, 1, 1),
(59, 46, 1, 1),
(60, 47, 1, 1),
(61, 48, 1, 1),
(62, 49, 1, 1),
(63, 50, 1, 1),
(64, 51, 1, 1),
(65, 52, 1, 1),
(66, 53, 1, 1),
(67, 54, 1, 1),
(68, 55, 1, 1),
(69, 56, 1, 1),
(70, 57, 1, 1),
(71, 58, 1, 1),
(72, 59, 1, 1),
(73, 60, 1, 1),
(74, 61, 1, 1),
(75, 62, 1, 1),
(83, 17, 1, 1),
(85, 15, 1, 1),
(88, 65, 19, 16),
(89, 66, 21, 18),
(91, 67, 22, 19),
(95, 71, 27, 22),
(96, 72, 27, 22),
(97, 73, 27, 22),
(98, 74, 27, 22),
(99, 75, 27, 22),
(100, 76, 27, 22),
(102, 77, 28, 3),
(104, 13, 2, 1),
(105, 79, 29, 4),
(106, 80, 29, 4),
(107, 81, 29, 4),
(108, 82, 29, 4),
(109, 84, 29, 4),
(110, 85, 29, 4),
(114, 88, 29, 4),
(115, 89, 31, 24),
(116, 70, 1, 1),
(117, 69, 1, 1),
(118, 68, 1, 1),
(119, 64, 1, 1),
(120, 63, 1, 1),
(122, 90, 34, 26),
(123, 91, 5, 2),
(124, 92, 5, 2),
(125, 93, 5, 2),
(126, 94, 5, 2),
(127, 95, 5, 2),
(128, 96, 5, 2),
(129, 97, 1, 1),
(130, 22, 1, 1),
(146, 39, 1, 1),
(147, 25, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos_inventory_stock_tax`
--

CREATE TABLE `pos_inventory_stock_tax` (
  `inventory_stock_tax_id` int(11) NOT NULL,
  `inventory_stock_id` int(11) NOT NULL,
  `inventory_category_id` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_inventory_stock_tax`
--

INSERT INTO `pos_inventory_stock_tax` (`inventory_stock_tax_id`, `inventory_stock_id`, `inventory_category_id`, `tax_id`, `company_id`) VALUES
(9, 6, 0, 2, 1),
(10, 7, 0, 2, 1),
(11, 8, 0, 2, 1),
(12, 9, 0, 2, 1),
(13, 10, 0, 2, 1),
(14, 11, 0, 3, 1),
(15, 12, 0, 3, 1),
(93, 65, 24, 16, 16),
(95, 71, 28, 19, 22),
(96, 72, 28, 19, 22),
(97, 73, 28, 19, 22),
(98, 74, 28, 19, 22),
(99, 75, 28, 19, 22),
(100, 76, 28, 19, 22),
(102, 77, 30, 20, 3),
(121, 90, 46, 21, 26),
(123, 50, 20, 14, 1),
(124, 51, 20, 14, 1),
(125, 52, 20, 14, 1),
(126, 53, 20, 14, 1),
(127, 54, 21, 14, 1),
(128, 55, 21, 14, 1),
(129, 56, 21, 14, 1),
(130, 57, 22, 14, 1),
(131, 58, 22, 14, 1),
(132, 59, 22, 14, 1),
(133, 60, 22, 14, 1),
(134, 61, 22, 14, 1),
(135, 62, 22, 14, 1),
(136, 63, 22, 14, 1),
(137, 64, 22, 14, 1),
(138, 41, 19, 14, 1),
(139, 42, 19, 14, 1),
(140, 43, 19, 14, 1),
(141, 44, 19, 14, 1),
(142, 45, 19, 14, 1),
(143, 46, 19, 14, 1),
(144, 47, 19, 14, 1),
(145, 48, 19, 14, 1),
(146, 49, 19, 14, 1),
(147, 38, 17, 14, 1),
(149, 40, 17, 14, 1),
(150, 97, 17, 14, 1),
(151, 15, 7, 14, 1),
(152, 16, 7, 14, 1),
(153, 17, 7, 14, 1),
(154, 18, 7, 14, 1),
(155, 19, 7, 14, 1),
(156, 20, 7, 14, 1),
(157, 21, 7, 14, 1),
(158, 14, 6, 14, 1),
(159, 22, 6, 14, 1),
(160, 23, 6, 14, 1),
(161, 24, 6, 14, 1),
(163, 70, 6, 14, 1),
(164, 3, 3, 14, 1),
(165, 5, 3, 14, 1),
(166, 13, 3, 14, 1),
(167, 26, 3, 14, 1),
(168, 27, 3, 14, 1),
(169, 2, 2, 14, 1),
(170, 28, 2, 14, 1),
(171, 29, 2, 14, 1),
(172, 30, 2, 14, 1),
(173, 31, 2, 14, 1),
(174, 32, 2, 14, 1),
(175, 1, 1, 14, 1),
(176, 4, 1, 14, 1),
(177, 33, 1, 14, 1),
(178, 34, 1, 14, 1),
(179, 35, 1, 14, 1),
(180, 36, 1, 14, 1),
(181, 37, 1, 14, 1),
(197, 39, 17, 14, 1),
(198, 25, 6, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos_inventory_stock_tax_copy27apr`
--

CREATE TABLE `pos_inventory_stock_tax_copy27apr` (
  `inventory_stock_tax_id` int(11) NOT NULL,
  `inventory_stock_id` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_inventory_stock_tax_copy27apr`
--

INSERT INTO `pos_inventory_stock_tax_copy27apr` (`inventory_stock_tax_id`, `inventory_stock_id`, `tax_id`, `company_id`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(8, 5, 1, 1),
(9, 6, 2, 1),
(10, 7, 2, 1),
(11, 8, 2, 1),
(12, 9, 2, 1),
(13, 10, 2, 1),
(14, 11, 3, 1),
(15, 12, 3, 1),
(26, 4, 1, 1),
(27, 4, 2, 1),
(28, 4, 3, 1),
(29, 3, 3, 1),
(30, 2, 1, 1),
(31, 2, 2, 1),
(33, 16, 14, 1),
(36, 18, 14, 1),
(37, 19, 14, 1),
(38, 20, 14, 1),
(39, 21, 14, 1),
(40, 22, 14, 1),
(41, 23, 14, 1),
(42, 24, 14, 1),
(43, 25, 14, 1),
(44, 26, 14, 1),
(45, 27, 14, 1),
(46, 28, 14, 1),
(47, 29, 14, 1),
(48, 30, 14, 1),
(49, 31, 14, 1),
(50, 32, 14, 1),
(51, 33, 14, 1),
(52, 34, 14, 1),
(53, 35, 14, 1),
(54, 36, 14, 1),
(55, 37, 14, 1),
(56, 38, 14, 1),
(57, 39, 14, 1),
(58, 40, 14, 1),
(59, 41, 14, 1),
(60, 42, 14, 1),
(61, 43, 14, 1),
(62, 44, 14, 1),
(63, 45, 14, 1),
(64, 46, 14, 1),
(65, 47, 14, 1),
(66, 48, 14, 1),
(67, 49, 14, 1),
(68, 50, 14, 1),
(69, 51, 14, 1),
(70, 52, 14, 1),
(71, 53, 14, 1),
(72, 54, 14, 1),
(73, 55, 14, 1),
(74, 56, 14, 1),
(75, 57, 14, 1),
(76, 58, 14, 1),
(77, 59, 14, 1),
(78, 60, 14, 1),
(79, 61, 14, 1),
(80, 62, 14, 1),
(81, 63, 14, 1),
(88, 17, 14, 1),
(90, 15, 14, 1),
(92, 64, 14, 1),
(93, 65, 16, 16),
(95, 71, 19, 22),
(96, 72, 19, 22),
(97, 73, 19, 22),
(98, 74, 19, 22),
(99, 75, 19, 22),
(100, 76, 19, 22),
(102, 77, 20, 3),
(103, 70, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos_inventory_stock_unit`
--

CREATE TABLE `pos_inventory_stock_unit` (
  `inventory_stock_unit_id` int(11) NOT NULL,
  `inventory_stock_id` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_inventory_stock_unit`
--

INSERT INTO `pos_inventory_stock_unit` (`inventory_stock_unit_id`, `inventory_stock_id`, `unit`, `company_id`) VALUES
(6, 6, 1, 1),
(7, 7, 1, 1),
(8, 8, 1, 1),
(9, 9, 1, 1),
(10, 10, 1, 1),
(11, 11, 1, 1),
(12, 12, 1, 1),
(13, 13, 1, 1),
(20, 4, 1, 1),
(21, 4, 2, 1),
(22, 3, 2, 1),
(23, 2, 1, 1),
(24, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos_location`
--

CREATE TABLE `pos_location` (
  `location_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `location_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `country` varchar(60) NOT NULL,
  `state` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `timezone` varchar(80) NOT NULL,
  `postal_code` varchar(30) NOT NULL,
  `contact_number` varchar(12) NOT NULL,
  `created_date` datetime NOT NULL,
  `location_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gstin` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_location`
--

INSERT INTO `pos_location` (`location_id`, `company_id`, `location_name`, `address`, `country`, `state`, `city`, `timezone`, `postal_code`, `contact_number`, `created_date`, `location_datetime`, `gstin`) VALUES
(1, 1, 'DB Mall', 'Rajendra Nagar', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452009', '4545456465', '2017-02-15 15:05:22', '2017-02-15 09:35:22', NULL),
(2, 1, 'Relience Fresh', 'Futi kothi', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452009', '2132132132', '2017-02-15 15:14:17', '2017-02-15 09:44:17', NULL),
(4, 1, 'The Clifs1', 'Near Melhar mega mall11', 'India', 'Madhya Pradesh', 'Indore', 'Antarctica/Macquarie', '45200111', '11111111', '2017-02-15 20:37:07', '2017-02-15 10:00:48', NULL),
(5, 2, 'Store 1', '505 Shekhar Central', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452018', '7828405888', '2017-02-15 19:10:23', '2017-02-15 13:37:18', NULL),
(6, 1, 'Tresure Iand1', 'Near MG Road', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452001', '8875451210', '2017-02-15 20:39:56', '2017-02-15 15:09:47', NULL),
(7, 5, 'Ctinfo3 - Loc1', 'LG Road', 'India', 'Madhya Pradesh', 'Gwalior', 'Africa/Bangui', '55555555', '6666666', '2017-02-20 12:42:32', '2017-02-20 07:12:32', NULL),
(9, 5, 'Ctinfo3 - Loc2', 'South Tukoganj', 'India', 'Madhya Pradesh', 'Jabalpur', 'Africa/Blantyre', '2121221', '3232323', '2017-02-20 12:51:40', '2017-02-20 07:21:40', NULL),
(10, 7, 'Ctinfo4', 'Usha Nagar', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452009', '5484445551', '2017-02-26 12:07:06', '2017-02-26 11:07:06', NULL),
(11, 8, 'Ctinfo5', 'Juni Indore', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452009', '5435455468', '2017-02-26 12:11:40', '2017-02-26 11:11:40', NULL),
(12, 9, 'Ravi soni', '405 cs naidu arcade', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452018', '7828405888', '2017-04-05 06:27:13', '2017-04-04 09:16:30', NULL),
(13, 10, 'Sachin Thakur', '505,', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452001', '9827040200', '2017-04-04 14:23:04', '2017-04-04 14:23:04', NULL),
(14, 11, 'Sachin Thakur', '505, Shekhar central', 'India', 'Madhya Pradesh', 'indore', 'Asia/Kolkata', '452001', '9827040200', '2017-04-04 14:31:57', '2017-04-04 14:31:57', NULL),
(15, 12, 'Sachin Thakur', '505, Shekhar Central', 'India', 'Madhya Pradesh', 'indore', 'Asia/Kolkata', '452001', '9827040200', '2017-04-04 14:34:56', '2017-04-04 14:34:56', NULL),
(16, 13, 'shubham', 'Near Melhar mega mall', 'India', 'Madhya Pradesh', 'indore', 'Africa/Dar_es_Salaam', '4520011', '1234567890', '2017-04-04 15:01:50', '2017-04-04 15:01:50', NULL),
(17, 14, 'Dugar Tvs2', 'Gita Bhavan2', 'India', 'Madhya Pradesh', 'indore', 'Africa/Dakar', '452001', '1234567890', '2017-04-04 15:18:32', '2017-04-04 15:18:32', NULL),
(18, 15, 'Walkover', '405 cs naidu arcade', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452018', '9977389948', '2017-04-05 06:36:32', '2017-04-05 06:36:32', NULL),
(20, 17, 'Sachin', '505, Shekhar Central', 'India', 'Madhya Pradesh', 'indore', 'Asia/Kolkata', '452001', '9827040200', '2017-04-05 09:16:39', '2017-04-05 09:16:39', NULL),
(21, 18, 'Sachin', '505', 'India', 'Madhya Pradesh', 'indore', 'Asia/Kolkata', '452001', '9827040200', '2017-04-05 14:59:10', '2017-04-05 14:59:10', NULL),
(22, 19, 'Default', '1 Shakkar bazar main road, near sarafa', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452002', '7828405888', '2017-04-06 08:08:32', '2017-04-06 07:56:56', NULL),
(24, 19, 'Store 1', '1 shakkar bazar', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452002', '7828405888', '2017-04-06 08:10:54', '2017-04-06 08:10:54', NULL),
(25, 20, 'Default', '505, Shekhar Central, New Palasia', 'India', 'Madhya Pradesh', 'indore', 'Asia/Kolkata', '452001', '9827040200', '2017-04-07 07:04:45', '2017-04-07 07:04:45', NULL),
(26, 21, 'Default', 'sdf', 'sdf', 'sdf', 'sdf', 'Africa/Dakar', 'sdf', '1234567890', '2017-04-18 18:12:56', '2017-04-18 18:12:56', NULL),
(27, 22, 'Default', '405-406 Capt. C.S Nayudu Arcade', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452018', '7828405888', '2017-04-19 07:39:32', '2017-04-19 07:39:32', NULL),
(28, 3, 'ADY', 'Indore', 'India', 'Madhya Pradesh', 'indore', 'Africa/Accra', '152009', '1234567890', '2017-04-19 10:29:31', '2017-04-19 10:28:50', NULL),
(29, 4, 'Titos', 'Bhawarkua', 'India', 'Madhya Pradesh', 'indore', 'Africa/Accra', '452009', '1234564798', '2017-06-02 19:23:44', '2017-06-02 13:53:44', NULL),
(30, 23, 'Default', 'Rajendra nagar', 'India', 'Madhya Pradesh', 'indore', 'Africa/Dakar', '152009', '1234567890', '2017-06-03 17:47:12', '2017-06-03 12:17:12', NULL),
(31, 24, 'Default', '405 CS Nayudu Arcade', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452018', '7828405888', '2017-06-12 13:23:56', '2017-06-12 07:53:56', NULL),
(32, 25, 'Default', 'abcd', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452018', '1234567890', '2017-06-15 12:20:36', '2017-06-15 06:50:36', NULL),
(33, 26, 'Default', 'Starling Tower indore', 'India', 'Madhya Pradesh', 'Indore', 'Asia/Kolkata', '452001', '1234567890', '2017-07-17 09:39:03', '2017-07-17 09:39:03', '123'),
(34, 26, 'Zone1', 'MG Road', 'India', 'Madhya Pradesh', 'Indore', 'Africa/Asmara', '452009', '9876543210', '2017-07-17 09:41:32', '2017-07-17 09:41:32', '123456'),
(35, 27, 'Default', 'sadsa', 'dsadas', 'dasd', 'asdas', 'Africa/Dar_es_Salaam', 'dasdas', '1234567896', '2017-08-08 14:24:25', '2017-08-08 14:24:25', 'awsdasd');

-- --------------------------------------------------------

--
-- Table structure for table `pos_manufacture`
--

CREATE TABLE `pos_manufacture` (
  `manufacture_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `floor_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `manufacturing_date` timestamp NULL DEFAULT NULL,
  `inventory_stock_id` int(11) DEFAULT NULL,
  `manufacturing_quantity` decimal(12,2) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_manufacture`
--

INSERT INTO `pos_manufacture` (`manufacture_id`, `company_id`, `location_id`, `floor_id`, `employee_id`, `manufacturing_date`, `inventory_stock_id`, `manufacturing_quantity`, `unit_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 4, 5, 6, '2017-08-05 16:15:06', 97, '1.00', 5, '2017-08-05 10:45:05', '2017-08-05 10:45:05'),
(2, NULL, 4, 5, 6, '2017-08-05 16:15:34', 22, '1.00', 0, '2017-08-05 10:45:35', '2017-08-05 10:45:35'),
(3, 1, 4, 5, 6, '2017-08-05 16:23:50', 97, '1.00', 5, '2017-08-05 10:53:49', '2017-08-05 10:53:49'),
(4, 1, 4, 5, 6, '2017-08-05 16:25:14', 22, '12.00', 0, '2017-08-05 10:55:13', '2017-08-05 10:55:13'),
(5, 1, 4, 5, 6, '2017-08-05 16:25:30', 97, '10.00', 5, '2017-08-05 10:55:29', '2017-08-05 10:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `pos_order_from`
--

CREATE TABLE `pos_order_from` (
  `order_from_id` int(11) NOT NULL,
  `order_from_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_order_from`
--

INSERT INTO `pos_order_from` (`order_from_id`, `order_from_name`) VALUES
(1, 'offline'),
(2, 'online');

-- --------------------------------------------------------

--
-- Table structure for table `pos_payment_credential`
--

CREATE TABLE `pos_payment_credential` (
  `credential_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `payment_method_type` tinyint(1) NOT NULL,
  `key_id` varchar(150) NOT NULL,
  `key_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_payment_credential`
--

INSERT INTO `pos_payment_credential` (`credential_id`, `company_id`, `payment_method_type`, `key_id`, `key_pass`) VALUES
(1, 1, 1, 'NzgyODQwNTg4OA==', 'MDAxMjM0'),
(2, 1, 2, 'cnpwX3Rlc3RfcUhhalFLVXU2SW94aEc=', 'WU9lRFpLMmtnSmZrWUNoTUxVc1htcXA0');

-- --------------------------------------------------------

--
-- Table structure for table `pos_payment_credential_copy`
--

CREATE TABLE `pos_payment_credential_copy` (
  `credential_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `payment_method_type` tinyint(1) NOT NULL,
  `mswipe_id` varchar(100) NOT NULL,
  `mswipe_pass` varchar(100) NOT NULL,
  `razorpay_keyid` varchar(100) NOT NULL,
  `razorpay_secretkey` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_payment_credential_copy`
--

INSERT INTO `pos_payment_credential_copy` (`credential_id`, `company_id`, `payment_method_type`, `mswipe_id`, `mswipe_pass`, `razorpay_keyid`, `razorpay_secretkey`) VALUES
(1, 1, 1, 'NzgyODI0MDU4OA==', 'MDA3MjEw', '', ''),
(2, 1, 2, '', '', 'cnpwX3Rlc3RfVTZhaUJFQWZXeWpxNHA=', 'bDNoOE9seHU4SkgyeEJSY0dETlhWaW1V');

-- --------------------------------------------------------

--
-- Table structure for table `pos_payment_method`
--

CREATE TABLE `pos_payment_method` (
  `payment_method_id` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_category` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_payment_method`
--

INSERT INTO `pos_payment_method` (`payment_method_id`, `payment_type`, `payment_category`) VALUES
(1, 'Cash', 'cash'),
(2, 'Mswipe', 'card'),
(3, 'Razorpay', 'wallet'),
(4, 'Paytm', 'wallet'),
(5, 'Bingage', 'wallet');

-- --------------------------------------------------------

--
-- Table structure for table `pos_payment_split_type`
--

CREATE TABLE `pos_payment_split_type` (
  `payment_split_type_id` int(11) NOT NULL,
  `split_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_payment_split_type`
--

INSERT INTO `pos_payment_split_type` (`payment_split_type_id`, `split_type`) VALUES
(1, 'Person'),
(2, 'Category');

-- --------------------------------------------------------

--
-- Table structure for table `pos_permission`
--

CREATE TABLE `pos_permission` (
  `permission_id` int(11) NOT NULL,
  `permission_name` varchar(50) NOT NULL,
  `company_id` int(11) NOT NULL,
  `emp_add` tinyint(1) NOT NULL COMMENT 'Employee add permission',
  `emp_edit` tinyint(1) NOT NULL COMMENT 'Employee edit permission',
  `emp_delete` tinyint(1) NOT NULL COMMENT 'Employee delete permission',
  `inv_add` tinyint(1) NOT NULL COMMENT 'Inventory add permission',
  `inv_edit` tinyint(1) NOT NULL COMMENT 'Inventory edit permission',
  `inv_delete` tinyint(1) NOT NULL COMMENT 'Inventory delete permission',
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_permission`
--

INSERT INTO `pos_permission` (`permission_id`, `permission_name`, `company_id`, `emp_add`, `emp_edit`, `emp_delete`, `inv_add`, `inv_edit`, `inv_delete`, `updated_date`) VALUES
(1, 'Permission11', 1, 1, 1, 1, 1, 1, 0, '2017-02-18 08:16:54'),
(2, 'Permission2', 1, 1, 1, 1, 1, 1, 0, '2017-02-18 10:29:46'),
(3, 'Permission33', 1, 0, 0, 1, 0, 0, 0, '2017-02-18 10:31:38'),
(4, 'Permission44', 1, 1, 0, 1, 1, 0, 1, '2017-02-18 12:37:42'),
(5, 'Top Manager', 11, 1, 1, 0, 1, 1, 1, '2017-04-04 14:31:57'),
(6, 'Sales Manager', 11, 0, 0, 0, 1, 1, 1, '2017-04-04 14:31:57'),
(7, 'Top Manager', 12, 1, 1, 0, 1, 1, 1, '2017-04-04 14:34:56'),
(8, 'Sales Manager', 12, 0, 0, 0, 1, 1, 1, '2017-04-04 14:34:56'),
(9, 'Top Manager', 13, 1, 1, 0, 1, 1, 1, '2017-04-04 15:01:50'),
(10, 'Sales Manager', 13, 0, 0, 0, 1, 1, 1, '2017-04-04 15:01:50'),
(11, 'Top Manager', 14, 1, 1, 0, 1, 1, 1, '2017-04-04 15:18:32'),
(12, 'Sales Manager', 14, 0, 0, 0, 1, 1, 1, '2017-04-04 15:18:32'),
(13, 'Top Manager', 15, 1, 1, 0, 1, 1, 1, '2017-04-05 06:36:32'),
(14, 'Sales Manager', 15, 0, 0, 0, 1, 1, 1, '2017-04-05 06:36:32'),
(15, 'Top Manager', 16, 1, 1, 0, 1, 1, 1, '2017-04-05 08:27:21'),
(16, 'Sales Manager', 16, 0, 0, 0, 1, 1, 1, '2017-04-05 08:27:21'),
(17, 'Umar', 16, 1, 0, 0, 1, 1, 0, '2017-04-05 08:40:04'),
(18, 'Top Manager', 17, 1, 1, 0, 1, 1, 1, '2017-04-05 09:16:39'),
(19, 'Sales Manager', 17, 0, 0, 0, 1, 1, 1, '2017-04-05 09:16:39'),
(20, 'Top Manager', 18, 1, 1, 0, 1, 1, 1, '2017-04-05 14:59:10'),
(21, 'Sales Manager', 18, 0, 0, 0, 1, 1, 1, '2017-04-05 14:59:10'),
(22, 'shubham', 18, 1, 1, 0, 1, 0, 0, '2017-04-05 15:00:36'),
(23, 'Top Manager', 19, 1, 1, 0, 1, 1, 1, '2017-04-06 07:56:56'),
(24, 'Sales Manager', 19, 0, 0, 0, 1, 1, 1, '2017-04-06 07:56:56'),
(25, 'Top Manager', 20, 1, 1, 0, 1, 1, 1, '2017-04-07 07:04:46'),
(26, 'Sales Manager', 20, 0, 0, 0, 1, 1, 1, '2017-04-07 07:04:46'),
(27, 'Top Manager', 21, 1, 1, 0, 1, 1, 1, '2017-04-18 18:12:56'),
(28, 'Sales Manager', 21, 0, 0, 0, 1, 1, 1, '2017-04-18 18:12:56'),
(29, 'Top Manager', 22, 1, 1, 0, 1, 1, 1, '2017-04-19 07:39:32'),
(30, 'Sales Manager', 22, 0, 0, 0, 1, 1, 1, '2017-04-19 07:39:32'),
(31, 'p1', 3, 1, 1, 0, 0, 1, 1, '2017-04-19 10:36:34'),
(32, 'p1', 4, 1, 0, 0, 1, 0, 0, '2017-06-03 10:27:06'),
(33, 'Top Manager', 23, 1, 1, 0, 1, 1, 1, '2017-06-03 12:17:12'),
(34, 'Sales Manager', 23, 0, 0, 0, 1, 1, 1, '2017-06-03 12:17:12'),
(35, 'Top Manager', 24, 1, 1, 0, 1, 1, 1, '2017-06-12 07:53:56'),
(36, 'Sales Manager', 24, 0, 0, 0, 1, 1, 1, '2017-06-12 07:53:56'),
(37, 'Top Manager', 25, 1, 1, 0, 1, 1, 1, '2017-06-15 06:50:36'),
(38, 'Sales Manager', 25, 0, 0, 0, 1, 1, 1, '2017-06-15 06:50:36'),
(39, 'Top Manager', 26, 1, 1, 0, 1, 1, 1, '2017-07-17 09:39:03'),
(40, 'Sales Manager', 26, 0, 0, 0, 1, 1, 1, '2017-07-17 09:39:03'),
(41, 'perm1', 26, 1, 0, 0, 1, 1, 1, '2017-07-17 09:48:54'),
(42, 'Top Manager', 27, 1, 1, 0, 1, 1, 1, '2017-08-08 14:24:25'),
(43, 'Sales Manager', 27, 0, 0, 0, 1, 1, 1, '2017-08-08 14:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `pos_preparation`
--

CREATE TABLE `pos_preparation` (
  `kitchen_id` int(11) NOT NULL,
  `kitchen_name` varchar(50) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_preparation`
--

INSERT INTO `pos_preparation` (`kitchen_id`, `kitchen_name`, `location_id`, `company_id`) VALUES
(1, 'Default kitchen', 1, NULL),
(2, 'Default kitchen', 2, NULL),
(4, 'Default kitchen', 5, NULL),
(5, 'Default kitchen', 6, NULL),
(6, 'Default kitchen', 7, NULL),
(7, 'Default kitchen', 9, NULL),
(8, 'Default kitchen', 10, NULL),
(9, 'Default kitchen', 11, NULL),
(10, 'Default kitchen', 12, NULL),
(11, 'Default kitchen', 13, NULL),
(12, 'Default kitchen', 14, NULL),
(13, 'Default kitchen', 15, NULL),
(14, 'Default kitchen', 16, NULL),
(15, 'Default kitchen', 17, NULL),
(16, 'Default kitchen', 18, NULL),
(17, 'Default kitchen', 20, NULL),
(18, 'Default kitchen', 21, NULL),
(19, 'Default kitchen', 22, NULL),
(20, 'Default kitchen', 24, NULL),
(21, 'Default kitchen', 25, NULL),
(22, 'Default kitchen', 26, NULL),
(23, 'Default kitchen', 27, NULL),
(24, 'Default kitchen', 28, NULL),
(25, 'Default kitchen', 29, NULL),
(26, 'Default kitchen', 30, NULL),
(27, 'Default kitchen', 31, NULL),
(28, 'Default kitchen', 32, NULL),
(29, 'Default kitchen', 33, NULL),
(30, 'Default kitchen', 34, NULL),
(31, 'Default kitchen', 35, NULL),
(32, 'Kitchen 1', 4, 1),
(33, 'Beverages kitchen', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos_product_type`
--

CREATE TABLE `pos_product_type` (
  `product_type_id` int(11) NOT NULL,
  `product_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_product_type`
--

INSERT INTO `pos_product_type` (`product_type_id`, `product_type`) VALUES
(1, 'sale'),
(2, 'purchase'),
(3, 'both');

-- --------------------------------------------------------

--
-- Table structure for table `pos_profit`
--

CREATE TABLE `pos_profit` (
  `profit_id` int(11) NOT NULL,
  `profit` decimal(12,2) NOT NULL,
  `loss` decimal(12,2) NOT NULL,
  `waste` decimal(12,2) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pos_purchase_order`
--

CREATE TABLE `pos_purchase_order` (
  `purchase_order_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `purchase_order_no` varchar(30) NOT NULL COMMENT 'Invoice Generation id',
  `purchase_order_date` datetime NOT NULL,
  `subtotal_amount` decimal(12,2) NOT NULL,
  `final_amount` decimal(12,2) NOT NULL COMMENT 'Total amount sum of purchase order',
  `purchase_order_payment_status_id` smallint(6) NOT NULL COMMENT 'paid,unpaid,partial paid,cancel',
  `purchase_order_status_id` smallint(6) NOT NULL COMMENT 'Ordered, In progress,Done,Delivered,Cancel',
  `paid_amount` decimal(12,2) NOT NULL,
  `remaining_amount` decimal(12,2) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_purchase_order`
--

INSERT INTO `pos_purchase_order` (`purchase_order_id`, `company_id`, `vendor_id`, `purchase_order_no`, `purchase_order_date`, `subtotal_amount`, `final_amount`, `purchase_order_payment_status_id`, `purchase_order_status_id`, `paid_amount`, `remaining_amount`, `updated_date`, `created_at`, `updated_at`, `employee_id`) VALUES
(1, 1, 1, '1', '2017-03-23 00:00:00', '0.00', '25.00', 3, 4, '10.00', '0.00', '2017-03-23 06:50:52', NULL, NULL, NULL),
(2, 1, 2, '2', '2017-03-23 00:00:00', '0.00', '27.00', 2, 1, '17.00', '0.00', '2017-03-23 07:16:25', NULL, NULL, NULL),
(3, 1, 3, '1', '2017-03-22 00:00:00', '0.00', '250.00', 2, 1, '50.00', '0.00', '2017-03-23 07:25:18', NULL, NULL, NULL),
(4, 1, 4, '3', '2017-03-23 00:00:00', '0.00', '1497.00', 2, 1, '0.00', '1497.00', '2017-03-23 10:06:04', NULL, NULL, NULL),
(5, 1, 4, '1', '2017-03-29 00:00:00', '0.00', '535.00', 3, 5, '55.00', '480.00', '2017-03-29 13:38:12', NULL, NULL, NULL),
(6, 1, 5, '2', '2017-03-29 00:00:00', '0.00', '1008.00', 2, 5, '0.00', '1008.00', '2017-03-29 14:17:46', NULL, NULL, NULL),
(7, 1, 4, '3', '2017-03-29 00:00:00', '0.00', '1008.00', 2, 3, '50.00', '1008.00', '2017-03-29 14:36:47', NULL, NULL, NULL),
(8, 1, 4, '4', '2017-03-29 00:00:00', '0.00', '0.00', 2, 1, '0.00', '0.00', '2017-03-29 14:37:10', NULL, NULL, NULL),
(9, 1, 4, '5', '2017-03-29 00:00:00', '0.00', '10.00', 1, 1, '10.00', '0.00', '2017-03-29 14:49:09', NULL, NULL, NULL),
(10, 1, 4, '6', '2017-03-29 00:00:00', '0.00', '5.00', 2, 1, '0.00', '5.00', '2017-03-29 14:49:30', NULL, NULL, NULL),
(11, 1, 4, '1', '2017-04-14 00:00:00', '0.00', '150.00', 3, 1, '100.00', '0.00', '2017-04-14 05:29:17', NULL, NULL, NULL),
(12, 1, 6, '2', '2017-04-14 00:00:00', '0.00', '980.00', 1, 4, '0.00', '980.00', '2017-04-14 05:31:45', NULL, NULL, NULL),
(13, 1, 6, '1', '2017-04-15 00:00:00', '0.00', '720.00', 2, 3, '0.00', '720.00', '2017-04-15 07:17:33', NULL, NULL, NULL),
(14, 1, 3, '1', '2017-04-17 00:00:00', '0.00', '180.00', 2, 1, '0.00', '180.00', '2017-04-17 06:35:00', NULL, NULL, NULL),
(15, 1, 3, '1', '2017-04-18 00:00:00', '0.00', '10.00', 1, 3, '8.00', '2.00', '2017-04-18 05:47:22', NULL, NULL, NULL),
(16, 1, 3, '2', '2017-04-18 00:00:00', '0.00', '100.00', 3, 1, '85.00', '15.00', '2017-04-18 13:29:26', NULL, NULL, NULL),
(17, 1, 3, '1', '2017-04-19 00:00:00', '0.00', '99.00', 1, 4, '99.00', '0.00', '2017-04-19 07:21:05', NULL, NULL, NULL),
(18, 1, 4, '2', '2017-04-19 00:00:00', '0.00', '60.00', 1, 3, '60.00', '0.00', '2017-04-19 07:21:43', NULL, NULL, NULL),
(19, 22, 7, '1', '2017-04-19 00:00:00', '0.00', '450.00', 2, 2, '0.00', '450.00', '2017-04-19 08:18:19', NULL, NULL, NULL),
(20, 3, 8, '1', '2017-04-19 00:00:00', '0.00', '200.00', 2, 1, '0.00', '200.00', '2017-04-19 10:40:28', NULL, NULL, NULL),
(21, 1, 3, '1', '2017-04-20 00:00:00', '0.00', '99.00', 3, 2, '39.00', '60.00', '2017-04-20 07:42:37', NULL, NULL, NULL),
(22, 1, 4, '2', '2017-04-20 00:00:00', '0.00', '504.00', 1, 1, '504.00', '0.00', '2017-04-20 07:43:04', NULL, NULL, NULL),
(23, 1, 3, '3', '2017-04-20 00:00:00', '0.00', '10.00', 1, 1, '10.00', '0.00', '2017-04-20 07:43:34', NULL, NULL, NULL),
(24, 1, 4, '4', '2017-04-20 00:00:00', '0.00', '40.00', 1, 1, '40.00', '0.00', '2017-04-20 14:29:42', NULL, NULL, NULL),
(25, 1, 9, '1', '2017-04-25 00:00:00', '0.00', '200.00', 2, 1, '0.00', '200.00', '2017-04-25 15:23:43', NULL, NULL, NULL),
(26, 1, 9, '2', '2017-04-25 00:00:00', '0.00', '200.00', 2, 1, '0.00', '200.00', '2017-04-25 15:24:13', NULL, NULL, NULL),
(27, 1, 9, '3', '2017-04-25 00:00:00', '0.00', '200.00', 2, 1, '0.00', '200.00', '2017-04-25 15:27:11', NULL, NULL, NULL),
(28, 1, 9, '4', '2017-04-25 00:00:00', '0.00', '200.00', 2, 1, '0.00', '200.00', '2017-04-25 15:30:58', NULL, NULL, NULL),
(29, 1, 9, '5', '2017-04-25 00:00:00', '0.00', '75.00', 1, 1, '0.00', '75.00', '2017-04-25 15:45:47', NULL, NULL, NULL),
(30, 26, 13, '1', '2017-07-20 00:00:00', '0.00', '100.00', 2, 1, '0.00', '100.00', '2017-07-17 10:01:29', NULL, NULL, NULL),
(31, 1, 1, '1', '2017-08-04 17:50:25', '0.00', '50.00', 1, 4, '50.00', '0.00', '2017-08-04 12:20:33', '2017-08-04 12:20:33', '2017-08-04 12:20:33', 6),
(32, 1, 1, '1', '2017-08-04 17:50:25', '0.00', '50.00', 1, 4, '50.00', '0.00', '2017-08-04 12:20:54', '2017-08-04 12:20:54', '2017-08-04 12:20:54', 6),
(33, 1, 1, '1', '2017-08-04 18:00:46', '0.00', '50.00', 1, 4, '50.00', '0.00', '2017-08-04 12:30:57', '2017-08-04 12:30:57', '2017-08-04 12:30:57', 6),
(34, 1, 1, '1', '2017-08-04 18:00:46', '0.00', '50.00', 1, 4, '50.00', '0.00', '2017-08-04 12:31:17', '2017-08-04 12:31:17', '2017-08-04 12:31:17', 6),
(35, 1, 1, '1', '2017-08-04 18:03:02', '0.00', '50.00', 1, 4, '50.00', '0.00', '2017-08-04 12:33:12', '2017-08-04 12:33:12', '2017-08-04 12:33:12', 6),
(36, 1, 1, '1', '2017-08-04 18:03:02', '0.00', '50.00', 1, 4, '50.00', '0.00', '2017-08-04 12:33:29', '2017-08-04 12:33:29', '2017-08-04 12:33:29', 6),
(37, 1, 1, '1', '2017-08-04 18:03:02', '0.00', '50.00', 1, 4, '50.00', '0.00', '2017-08-04 12:37:55', '2017-08-04 12:37:55', '2017-08-04 12:37:55', 6),
(38, 1, 1, '1', '2017-08-04 19:36:15', '0.00', '50.00', 1, 4, '50.00', '0.00', '2017-08-04 14:06:59', '2017-08-04 14:06:59', '2017-08-04 14:06:59', 6),
(39, 1, 1, '1', '2017-08-04 19:36:15', '0.00', '50.00', 1, 4, '50.00', '0.00', '2017-08-04 14:07:14', '2017-08-04 14:07:14', '2017-08-04 14:07:14', 6),
(40, 1, 1, '1', '2017-08-06 00:00:00', '0.00', '40.00', 1, 4, '40.00', '0.00', '2017-08-06 12:44:21', '2017-08-06 12:44:21', '2017-08-06 12:44:21', 6),
(41, 1, 2, '2', '2017-08-06 00:00:00', '0.00', '290.00', 1, 4, '290.00', '0.00', '2017-08-06 12:57:03', '2017-08-06 12:57:03', '2017-08-06 12:57:03', 6),
(42, 1, 7, '1', '2017-08-09 00:00:00', '0.00', '295.00', 1, 4, '295.00', '0.00', '2017-08-09 07:26:18', '2017-08-09 07:26:18', '2017-08-09 07:26:18', 6),
(43, 1, 1, '1', '2017-08-10 00:00:00', '0.00', '280.00', 1, 4, '280.00', '0.00', '2017-08-10 14:02:22', '2017-08-10 14:02:22', '2017-08-10 14:02:22', 6),
(44, 1, 4, '2', '2017-08-10 00:00:00', '0.00', '50.00', 1, 4, '50.00', '0.00', '2017-08-10 14:14:02', '2017-08-10 14:14:02', '2017-08-10 14:14:02', 6),
(45, 1, 1, '3', '2017-08-10 00:00:00', '0.00', '200.00', 1, 4, '200.00', '0.00', '2017-08-10 14:17:00', '2017-08-10 14:17:00', '2017-08-10 14:17:00', 6),
(46, 1, 4, '4', '2017-08-10 00:00:00', '0.00', '50.00', 1, 4, '50.00', '0.00', '2017-08-10 14:22:50', '2017-08-10 14:22:50', '2017-08-10 14:22:50', 6),
(47, 1, 11, '5', '2017-08-10 00:00:00', '0.00', '120.00', 1, 4, '120.00', '0.00', '2017-08-10 14:33:50', '2017-08-10 14:33:50', '2017-08-10 14:33:50', 6),
(48, 1, 7, '1', '2017-08-11 00:00:00', '0.00', '192.00', 1, 4, '192.00', '0.00', '2017-08-11 14:01:24', '2017-08-11 14:01:24', '2017-08-11 14:01:24', 6),
(49, 1, 1, '2', '2017-08-11 00:00:00', '0.00', '240.00', 1, 4, '240.00', '0.00', '2017-08-11 14:08:37', '2017-08-11 14:08:37', '2017-08-11 14:08:37', 6),
(50, 1, 1, '3', '2017-08-11 00:00:00', '0.00', '20.00', 1, 4, '20.00', '0.00', '2017-08-11 14:14:33', '2017-08-11 14:14:33', '2017-08-11 14:14:33', 6),
(51, 1, 7, '4', '2017-08-11 00:00:00', '0.00', '10.00', 2, 4, '0.00', '10.00', '2017-08-11 14:24:52', '2017-08-11 14:24:52', '2017-08-11 14:24:52', 6),
(52, 1, 4, '5', '2017-08-11 00:00:00', '0.00', '50.00', 2, 4, '0.00', '50.00', '2017-08-11 14:28:59', '2017-08-11 14:28:59', '2017-08-11 14:28:59', 6),
(53, 1, 1, '6', '2017-08-11 00:00:00', '0.00', '40.00', 1, 4, '40.00', '0.00', '2017-08-11 14:29:27', '2017-08-11 14:29:27', '2017-08-11 14:29:27', 6),
(54, 1, 2, '1', '2017-08-12 00:00:00', '0.00', '40.00', 1, 4, '40.00', '0.00', '2017-08-12 04:18:01', '2017-08-12 04:18:01', '2017-08-12 04:18:01', 6),
(55, 1, 1, '1', '2017-08-22 00:00:00', '0.00', '40.00', 1, 4, '40.00', '0.00', '2017-08-22 14:24:12', '2017-08-22 14:24:12', '2017-08-22 14:24:12', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pos_purchase_order_payment_status`
--

CREATE TABLE `pos_purchase_order_payment_status` (
  `purchase_order_payment_status_id` int(11) NOT NULL,
  `payment_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_purchase_order_payment_status`
--

INSERT INTO `pos_purchase_order_payment_status` (`purchase_order_payment_status_id`, `payment_status`) VALUES
(1, 'Paid'),
(2, 'Unpaid'),
(3, 'Partial Paid'),
(4, 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `pos_purchase_order_status`
--

CREATE TABLE `pos_purchase_order_status` (
  `purchase_order_status_id` int(11) NOT NULL,
  `order_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_purchase_order_status`
--

INSERT INTO `pos_purchase_order_status` (`purchase_order_status_id`, `order_status`) VALUES
(1, 'Ordered'),
(2, 'In Progress'),
(3, 'Done'),
(4, 'Delivered'),
(5, 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `pos_purchase_order_transaction`
--

CREATE TABLE `pos_purchase_order_transaction` (
  `purchase_order_transaction_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `purchase_order_id` int(11) NOT NULL,
  `purchase_order_date` datetime NOT NULL,
  `purchase_order_no` varchar(50) NOT NULL,
  `inventory_stock_id` int(11) NOT NULL,
  `purchase_qty` smallint(6) NOT NULL,
  `purchase_rate` varchar(20) NOT NULL,
  `purchase_amount` decimal(12,2) NOT NULL,
  `unit_id` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_purchase_order_transaction`
--

INSERT INTO `pos_purchase_order_transaction` (`purchase_order_transaction_id`, `company_id`, `purchase_order_id`, `purchase_order_date`, `purchase_order_no`, `inventory_stock_id`, `purchase_qty`, `purchase_rate`, `purchase_amount`, `unit_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-03-23 00:00:00', '1', 64, 2, '10', '20.00', 2, NULL, NULL),
(2, 1, 1, '2017-03-23 00:00:00', '1', 51, 1, '5', '5.00', 1, NULL, NULL),
(3, 1, 2, '2017-03-23 00:00:00', '2', 62, 5, '5', '25.00', 1, NULL, NULL),
(4, 1, 2, '2017-03-23 00:00:00', '2', 18, 1, '2', '2.00', 1, NULL, NULL),
(5, 1, 3, '2017-03-22 00:00:00', '1', 17, 5, '30', '150.00', 1, NULL, NULL),
(6, 1, 3, '2017-03-22 00:00:00', '1', 56, 2, '50', '100.00', 2, NULL, NULL),
(7, 1, 4, '2017-03-23 00:00:00', '3', 17, 20, '60', '1200.00', 1, NULL, NULL),
(8, 1, 4, '2017-03-23 00:00:00', '3', 15, 3, '99', '297.00', 2, NULL, NULL),
(9, 1, 5, '2017-03-29 00:00:00', '1', 15, 5, '99', '495.00', 1, NULL, NULL),
(10, 1, 5, '2017-03-29 00:00:00', '1', 1, 4, '10', '40.00', 1, NULL, NULL),
(11, 1, 6, '2017-03-29 00:00:00', '2', 4, 2, '504', '1008.00', 1, NULL, NULL),
(12, 1, 7, '2017-03-29 00:00:00', '3', 4, 2, '504', '1008.00', 1, NULL, NULL),
(13, 1, 9, '2017-03-29 00:00:00', '5', 1, 1, '10', '10.00', 1, NULL, NULL),
(14, 1, 10, '2017-03-29 00:00:00', '6', 5, 1, '5', '5.00', 1, NULL, NULL),
(15, 1, 11, '2017-04-14 00:00:00', '1', 39, 3, '50', '150.00', 1, NULL, NULL),
(16, 1, 12, '2017-04-14 00:00:00', '2', 69, 4, '245', '980.00', 1, NULL, NULL),
(17, 1, 13, '2017-04-15 00:00:00', '1', 69, 3, '240', '720.00', 1, NULL, NULL),
(18, 1, 14, '2017-04-17 00:00:00', '1', 64, 3, '60', '180.00', 1, NULL, NULL),
(19, 1, 15, '2017-04-18 00:00:00', '1', 1, 1, '10', '10.00', 1, NULL, NULL),
(20, 1, 16, '2017-04-18 00:00:00', '2', 28, 10, '99', '100.00', 1, NULL, NULL),
(21, 1, 17, '2017-04-19 00:00:00', '1', 28, 1, '99', '99.00', 1, NULL, NULL),
(22, 1, 18, '2017-04-19 00:00:00', '2', 18, 1, '60', '60.00', 1, NULL, NULL),
(23, 22, 19, '2017-04-19 00:00:00', '1', 76, 10, '45', '450.00', 1, NULL, NULL),
(24, 3, 20, '2017-04-19 00:00:00', '1', 77, 2, '100', '200.00', 1, NULL, NULL),
(25, 1, 21, '2017-04-20 00:00:00', '1', 28, 1, '99', '99.00', 1, NULL, NULL),
(26, 1, 22, '2017-04-20 00:00:00', '2', 4, 1, '504', '504.00', 1, NULL, NULL),
(27, 1, 23, '2017-04-20 00:00:00', '3', 5, 2, '5', '10.00', 1, NULL, NULL),
(28, 1, 24, '2017-04-20 00:00:00', '4', 25, 1, '40', '40.00', 1, NULL, NULL),
(29, 1, 25, '2017-04-25 00:00:00', '1', 13, 2, '100', '200.00', 1, NULL, NULL),
(30, 1, 26, '2017-04-25 00:00:00', '2', 13, 2, '100', '200.00', 1, NULL, NULL),
(31, 1, 27, '2017-04-25 00:00:00', '3', 13, 2, '100', '200.00', 2, NULL, NULL),
(32, 1, 28, '2017-04-25 00:00:00', '4', 13, 2, '100', '200.00', 1, NULL, NULL),
(33, 1, 29, '2017-04-25 00:00:00', '5', 5, 3, '5', '15.00', 2, NULL, NULL),
(34, 1, 29, '2017-04-25 00:00:00', '5', 3, 2, '30', '60.00', 1, NULL, NULL),
(35, 26, 30, '2017-07-20 00:00:00', '1', 90, 2, '50', '100.00', 1, NULL, NULL),
(36, 1, 37, '2017-08-04 18:03:02', '1', 14, 1, '50', '50.00', 2, '2017-08-04 12:37:55', '2017-08-04 12:37:55'),
(37, 1, 38, '2017-08-04 19:36:15', '1', 14, 1, '50', '50.00', 2, '2017-08-04 14:06:59', '2017-08-04 14:06:59'),
(38, 1, 39, '2017-08-04 19:36:15', '1', 14, 1, '50', '50.00', 2, '2017-08-04 14:07:14', '2017-08-04 14:07:14'),
(39, 1, 40, '2017-08-06 00:00:00', '1', 68, 1, '40', '40.00', 1, '2017-08-06 12:44:21', '2017-08-06 12:44:21'),
(40, 1, 41, '2017-08-06 00:00:00', '2', 69, 1, '240', '240.00', 1, '2017-08-06 12:57:03', '2017-08-06 12:57:03'),
(41, 1, 41, '2017-08-06 00:00:00', '2', 14, 1, '50', '50.00', 2, '2017-08-06 12:57:03', '2017-08-06 12:57:03'),
(42, 1, 42, '2017-08-09 00:00:00', '1', 69, 1, '245', '245.00', 1, '2017-08-09 07:26:18', '2017-08-09 07:26:18'),
(43, 1, 42, '2017-08-09 00:00:00', '1', 14, 1, '50', '50.00', 2, '2017-08-09 07:26:18', '2017-08-09 07:26:18'),
(44, 1, 43, '2017-08-10 00:00:00', '1', 69, 1, '240', '240.00', 1, '2017-08-10 14:02:22', '2017-08-10 14:02:22'),
(45, 1, 43, '2017-08-10 00:00:00', '1', 68, 1, '40', '40.00', 1, '2017-08-10 14:02:22', '2017-08-10 14:02:22'),
(46, 1, 44, '2017-08-10 00:00:00', '2', 14, 1, '50', '50.00', 2, '2017-08-10 14:14:02', '2017-08-10 14:14:02'),
(47, 1, 45, '2017-08-10 00:00:00', '3', 68, 5, '40', '200.00', 1, '2017-08-10 14:17:00', '2017-08-10 14:17:00'),
(48, 1, 46, '2017-08-10 00:00:00', '4', 14, 1, '50', '50.00', 2, '2017-08-10 14:22:50', '2017-08-10 14:22:50'),
(49, 1, 47, '2017-08-10 00:00:00', '5', 69, 1, '240', '120.00', 1, '2017-08-10 14:33:50', '2017-08-10 14:33:50'),
(50, 1, 48, '2017-08-11 00:00:00', '1', 69, 1, '240', '192.00', 1, '2017-08-11 14:01:24', '2017-08-11 14:01:24'),
(51, 1, 49, '2017-08-11 00:00:00', '2', 69, 1, '240', '240.00', 1, '2017-08-11 14:08:37', '2017-08-11 14:08:37'),
(52, 1, 50, '2017-08-11 00:00:00', '3', 68, 1, '40', '20.00', 1, '2017-08-11 14:14:33', '2017-08-11 14:14:33'),
(53, 1, 51, '2017-08-11 00:00:00', '4', 68, 0, '40', '10.00', 1, '2017-08-11 14:24:52', '2017-08-11 14:24:52'),
(54, 1, 52, '2017-08-11 00:00:00', '5', 14, 1, '50', '50.00', 2, '2017-08-11 14:28:59', '2017-08-11 14:28:59'),
(55, 1, 53, '2017-08-11 00:00:00', '6', 68, 1, '40', '40.00', 1, '2017-08-11 14:29:27', '2017-08-11 14:29:27'),
(56, 1, 54, '2017-08-12 00:00:00', '1', 68, 1, '40', '40.00', 1, '2017-08-12 04:18:01', '2017-08-12 04:18:01'),
(57, 1, 55, '2017-08-22 00:00:00', '1', 68, 1, '40', '40.00', 1, '2017-08-22 14:24:12', '2017-08-22 14:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `pos_recipe`
--

CREATE TABLE `pos_recipe` (
  `id` int(11) NOT NULL,
  `final_product_id` int(11) NOT NULL,
  `raw_product_id` int(11) NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `qty` varchar(30) DEFAULT NULL,
  `rate` varchar(30) DEFAULT NULL,
  `profit` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_recipe`
--

INSERT INTO `pos_recipe` (`id`, `final_product_id`, `raw_product_id`, `unit_id`, `qty`, `rate`, `profit`) VALUES
(2, 22, 68, NULL, '0.25', '40', '0'),
(3, 97, 39, NULL, '1', '60', '40'),
(4, 98, 39, NULL, '1', '60', '0'),
(5, 22, 69, NULL, '0.15', '240', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pos_reservation_status`
--

CREATE TABLE `pos_reservation_status` (
  `reservation_status_id` int(11) NOT NULL,
  `status_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_reservation_status`
--

INSERT INTO `pos_reservation_status` (`reservation_status_id`, `status_name`) VALUES
(1, 'Available'),
(2, 'Occupied'),
(3, 'Reserved'),
(4, 'Merged'),
(5, 'Out of service');

-- --------------------------------------------------------

--
-- Table structure for table `pos_sales_order`
--

CREATE TABLE `pos_sales_order` (
  `sales_order_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sales_order_no` varchar(50) NOT NULL,
  `sales_order_date` datetime NOT NULL,
  `tax_amount` decimal(12,2) NOT NULL COMMENT 'Total invoice(sale) tax amount',
  `subtotal_amount` decimal(12,2) NOT NULL,
  `final_amount` decimal(12,2) NOT NULL,
  `discount_amount` decimal(12,2) NOT NULL COMMENT 'Total invoice(sale) discount amount',
  `payment_method_id` int(11) NOT NULL COMMENT 'cash, mswipe,paytm',
  `payment_split` tinyint(1) NOT NULL,
  `payment_split_type` tinyint(1) NOT NULL COMMENT '1 for person, 2 for category',
  `paid_amount` decimal(12,2) NOT NULL,
  `remaining_amount` decimal(12,2) NOT NULL,
  `sales_order_payment_status_id` int(11) NOT NULL,
  `sales_order_status_id` int(11) NOT NULL,
  `payment_response` text NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `location_id` int(11) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `floor_id` int(11) DEFAULT NULL,
  `sales_order_type_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_from_id` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_sales_order`
--

INSERT INTO `pos_sales_order` (`sales_order_id`, `company_id`, `employee_id`, `customer_id`, `sales_order_no`, `sales_order_date`, `tax_amount`, `subtotal_amount`, `final_amount`, `discount_amount`, `payment_method_id`, `payment_split`, `payment_split_type`, `paid_amount`, `remaining_amount`, `sales_order_payment_status_id`, `sales_order_status_id`, `payment_response`, `update_date`, `location_id`, `table_id`, `floor_id`, `sales_order_type_id`, `created_at`, `updated_at`, `order_from_id`) VALUES
(1, 1, 0, 1, '1', '2017-03-15 00:00:00', '50.00', '0.00', '150.00', '50.00', 1, 0, 0, '150.00', '0.00', 1, 2, '', '2017-03-18 13:08:54', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(2, 1, 0, 1, '2', '2017-03-15 00:00:00', '50.00', '0.00', '150.00', '50.00', 1, 0, 0, '150.00', '0.00', 1, 3, '', '2017-03-15 16:48:01', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(3, 1, 0, 1, '3', '2017-03-13 00:00:00', '50.00', '0.00', '150.00', '50.00', 1, 0, 0, '150.00', '0.00', 1, 3, '', '2017-03-15 16:46:44', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(4, 1, 0, 1, '1', '2017-03-16 00:00:00', '50.00', '0.00', '150.00', '50.00', 1, 0, 0, '150.00', '0.00', 1, 3, '', '2017-03-16 13:58:34', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(5, 1, 0, 1, '1', '2017-03-18 00:00:00', '50.00', '0.00', '150.00', '50.00', 1, 0, 0, '150.00', '0.00', 1, 3, '', '2017-03-18 05:59:24', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(6, 1, 0, 1, '2', '2017-03-18 00:00:00', '50.00', '0.00', '150.00', '50.00', 1, 0, 0, '150.00', '0.00', 1, 3, '', '2017-03-18 06:01:53', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(7, 1, 0, 1, '3', '2017-03-18 00:00:00', '50.00', '0.00', '150.00', '50.00', 1, 0, 0, '150.00', '0.00', 1, 3, '', '2017-03-18 08:05:59', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(8, 1, 0, 1, '4', '2017-03-18 00:00:00', '50.00', '0.00', '150.00', '50.00', 1, 0, 0, '150.00', '0.00', 1, 3, '', '2017-03-18 08:08:57', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(9, 1, 0, 1, '5', '2017-03-18 00:00:00', '50.00', '0.00', '150.00', '50.00', 1, 0, 0, '150.00', '0.00', 1, 3, '', '2017-03-18 08:10:19', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(10, 1, 0, 1, '3', '2017-03-15 00:00:00', '50.00', '0.00', '150.00', '50.00', 1, 0, 0, '150.00', '0.00', 1, 3, '', '2017-03-18 08:16:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(11, 1, 0, 1, '4', '2017-03-15 00:00:00', '50.00', '0.00', '150.00', '50.00', 1, 0, 0, '150.00', '0.00', 1, 3, '', '2017-03-18 08:17:48', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(12, 1, 0, 1, '5', '2017-03-15 00:00:00', '50.00', '0.00', '150.00', '50.00', 1, 0, 0, '150.00', '0.00', 1, 3, '', '2017-03-18 08:17:57', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(13, 1, 0, 1, '6', '2017-03-18 00:00:00', '50.00', '0.00', '150.00', '50.00', 1, 0, 0, '150.00', '0.00', 1, 3, '', '2017-03-18 08:38:46', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(14, 1, 0, 1, '1', '2017-03-20 00:00:00', '50.00', '0.00', '150.00', '50.00', 1, 0, 0, '150.00', '0.00', 1, 3, '', '2017-03-20 12:12:40', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(15, 1, 0, 1, '6', '2017-03-15 00:00:00', '50.00', '0.00', '150.00', '50.00', 1, 0, 0, '150.00', '0.00', 1, 3, '', '2017-03-20 13:42:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(16, 1, 0, 1, '7', '2017-03-15 00:00:00', '50.00', '0.00', '150.00', '50.00', 1, 0, 0, '150.00', '0.00', 1, 3, '', '2017-03-20 13:45:43', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(17, 1, 0, 1, '8', '2017-03-15 00:00:00', '50.00', '0.00', '150.00', '50.00', 1, 0, 0, '150.00', '0.00', 1, 3, '', '2017-03-20 13:53:53', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(18, 1, 0, 1, '2', '2017-03-20 00:00:00', '15.48', '0.00', '2167.48', '0.00', 1, 0, 0, '2167.48', '0.00', 1, 1, '', '2017-03-20 14:02:52', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(19, 1, 0, 1, '3', '2017-03-20 00:00:00', '0.00', '0.00', '1520.00', '0.00', 1, 0, 0, '1520.00', '0.00', 1, 1, '', '2017-03-20 14:08:42', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(20, 1, 0, 1, '4', '2017-03-20 00:00:00', '30.96', '0.00', '1292.96', '0.00', 1, 0, 0, '1292.96', '0.00', 1, 1, '', '2017-03-20 14:15:32', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(21, 1, 0, 1, '1', '2017-03-21 00:00:00', '15.48', '0.00', '1163.48', '0.00', 1, 0, 0, '1163.48', '0.00', 1, 1, '', '2017-03-21 06:02:05', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(22, 1, 0, 1, '2', '2017-03-21 00:00:00', '50.00', '0.00', '150.00', '50.00', 1, 0, 0, '150.00', '0.00', 1, 3, '', '2017-03-21 08:46:47', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(23, 1, 0, 0, '1', '2017-03-22 00:00:00', '19.08', '0.00', '168.18', '9.90', 0, 0, 0, '0.00', '0.00', 0, 0, '', '2017-03-22 08:07:05', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(24, 1, 0, 0, '1', '2017-03-22 00:00:00', '19.08', '0.00', '168.18', '9.90', 0, 0, 0, '0.00', '0.00', 0, 0, '', '2017-03-22 08:07:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(25, 1, 0, 0, '1', '0000-00-00 00:00:00', '10.61', '0.00', '99.00', '0.00', 0, 0, 0, '0.00', '0.00', 0, 0, '', '2017-03-22 13:57:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(26, 1, 0, 1, '1', '2017-03-23 00:00:00', '0.00', '0.00', '1019.00', '0.00', 1, 0, 0, '1019.00', '0.00', 1, 1, '', '2017-03-23 06:01:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(27, 1, 0, 0, '1', '0000-00-00 00:00:00', '74.87', '0.00', '698.76', '0.00', 0, 0, 0, '0.00', '0.00', 0, 0, '', '2017-03-24 07:33:17', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(28, 1, 0, 0, '1', '2017-05-24 00:00:00', '21.21', '0.00', '198.00', '0.00', 0, 0, 0, '0.00', '0.00', 0, 3, '', '2017-05-24 13:34:06', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(29, 1, 0, 0, '1', '2017-03-24 00:00:00', '17.04', '0.00', '159.00', '0.00', 0, 0, 0, '0.00', '0.00', 0, 0, '', '2017-03-24 07:44:23', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(30, 1, 0, 1, '2', '2017-03-24 00:00:00', '0.00', '0.00', '2038.00', '0.00', 1, 0, 0, '2038.00', '0.00', 1, 1, '', '2017-03-24 14:46:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(31, 1, 0, 1, '3', '2017-03-24 00:00:00', '0.00', '0.00', '2038.00', '0.00', 1, 0, 0, '2038.00', '0.00', 1, 1, '', '2017-03-24 14:49:26', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(32, 1, 0, 1, '4', '2017-03-24 00:00:00', '11.88', '0.00', '1114.88', '0.00', 1, 0, 0, '1114.88', '0.00', 1, 1, '', '2017-03-24 14:57:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(33, 1, 0, 0, '5', '2017-03-24 00:00:00', '10.61', '0.00', '99.00', '0.00', 0, 0, 0, '0.00', '0.00', 0, 0, '', '2017-03-24 16:03:01', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(34, 1, 9, 0, '6', '2017-03-24 00:00:00', '10.61', '0.00', '99.00', '0.00', 0, 0, 0, '0.00', '0.00', 0, 2, '', '2017-03-27 13:15:21', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(35, 1, 6, 0, '7', '2017-03-24 00:00:00', '10.61', '0.00', '99.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 2, '', '2017-03-27 13:15:36', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(36, 1, 9, 0, '8', '2017-03-24 00:00:00', '10.61', '0.00', '99.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 2, '', '2017-03-27 13:16:00', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(37, 1, 9, 0, '9', '2017-03-24 00:00:00', '10.61', '0.00', '99.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 0, '', '2017-03-24 16:15:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(38, 1, 9, 0, '10', '2017-03-24 00:00:00', '10.61', '0.00', '99.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 0, '', '2017-03-24 16:16:48', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(39, 1, 9, 0, '11', '2017-03-24 00:00:00', '10.61', '0.00', '99.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 0, '', '2017-03-24 16:18:34', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(40, 1, 9, 0, '12', '2017-03-24 00:00:00', '10.61', '0.00', '99.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 0, '', '2017-03-24 16:18:53', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(41, 1, 9, 0, '1', '2017-03-27 00:00:00', '10.61', '0.00', '99.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 0, '', '2017-03-27 09:08:41', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(42, 1, 9, 0, '2', '2017-03-27 00:00:00', '21.21', '0.00', '198.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 0, '', '2017-03-27 11:11:19', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(43, 1, 9, 0, '3', '2017-03-27 00:00:00', '6.43', '0.00', '60.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 0, '', '2017-03-27 11:23:33', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(44, 1, 9, 0, '4', '2017-03-27 00:00:00', '10.61', '0.00', '99.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 0, '', '2017-03-27 13:49:33', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(45, 1, 9, 1, '5', '2017-03-27 00:00:00', '0.00', '0.00', '2038.00', '0.00', 1, 0, 0, '2038.00', '0.00', 1, 2, '', '2017-03-27 13:52:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(46, 1, 9, 1, '6', '2017-03-27 00:00:00', '0.00', '0.00', '2038.00', '0.00', 1, 0, 0, '2038.00', '0.00', 1, 2, '', '2017-03-27 13:56:40', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(47, 1, 9, 0, '7', '2017-03-27 00:00:00', '13.63', '0.00', '127.20', '0.00', 1, 0, 0, '0.00', '0.00', 0, 2, '', '2017-03-27 13:57:37', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(48, 1, 9, 1, '8', '2017-03-27 00:00:00', '0.00', '0.00', '2038.00', '0.00', 1, 0, 0, '2038.00', '0.00', 1, 2, '', '2017-03-27 14:01:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(49, 1, 9, 1, '9', '2017-03-27 00:00:00', '0.00', '0.00', '2038.00', '0.00', 1, 0, 0, '2038.00', '0.00', 1, 2, '', '2017-03-27 14:17:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(50, 1, 9, 1, '10', '2017-03-27 00:00:00', '0.00', '0.00', '1019.00', '0.00', 1, 0, 0, '1019.00', '0.00', 1, 2, '', '2017-03-27 14:31:17', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(51, 1, 9, 0, '11', '2017-03-27 00:00:00', '17.88', '0.00', '166.88', '0.00', 1, 0, 0, '0.00', '0.00', 0, 2, '', '2017-03-27 16:44:40', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(52, 1, 9, 0, '1', '2017-03-28 00:00:00', '18.31', '0.00', '170.88', '0.00', 1, 0, 0, '0.00', '0.00', 0, 4, '', '2017-03-28 13:11:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(53, 1, 9, 0, '2', '2017-03-28 00:00:00', '13.20', '0.00', '123.20', '0.00', 1, 0, 0, '0.00', '0.00', 0, 4, '', '2017-03-28 14:36:59', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(54, 1, 9, 1, '3', '2017-03-28 00:00:00', '11.88', '0.00', '1154.88', '0.00', 1, 1, 1, '1154.88', '0.00', 1, 4, '', '2017-03-28 14:42:31', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(55, 1, 9, 0, '4', '2017-03-28 00:00:00', '10.80', '0.00', '100.80', '0.00', 1, 0, 0, '0.00', '0.00', 0, 4, '', '2017-03-28 14:45:23', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(56, 1, 9, 1, '5', '2017-03-28 00:00:00', '15.48', '0.00', '1163.48', '0.00', 1, 1, 1, '1163.48', '0.00', 1, 4, '', '2017-03-28 14:42:57', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(57, 1, 9, 1, '6', '2017-03-28 00:00:00', '15.48', '0.00', '1163.48', '0.00', 1, 1, 1, '1163.48', '0.00', 1, 4, '', '2017-03-28 14:28:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(58, 1, 9, 1, '7', '2017-03-28 00:00:00', '15.48', '0.00', '1163.48', '0.00', 1, 1, 1, '1163.48', '0.00', 1, 4, '', '2017-03-28 14:43:27', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(59, 1, 9, 1, '8', '2017-03-28 00:00:00', '15.48', '0.00', '1163.48', '0.00', 1, 1, 1, '1163.48', '0.00', 1, 4, '', '2017-03-28 14:44:45', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(60, 1, 9, 1, '9', '2017-03-28 00:00:00', '15.48', '0.00', '1163.48', '0.00', 1, 1, 1, '1163.48', '0.00', 1, 3, '', '2017-03-28 15:18:14', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(61, 1, 9, 1, '10', '2017-03-28 00:00:00', '15.48', '0.00', '1163.48', '0.00', 1, 1, 0, '1163.48', '0.00', 1, 3, '', '2017-03-28 15:27:18', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(62, 1, 3, 1, '11', '2017-03-28 00:00:00', '13.93', '0.00', '1057.22', '104.71', 1, 1, 1, '1057.22', '0.00', 1, 2, '', '2017-03-28 13:36:16', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(63, 1, 9, 1, '12', '2017-03-28 00:00:00', '10.61', '0.00', '99.00', '0.00', 1, 1, 0, '99.00', '0.00', 1, 4, '', '2017-03-28 15:17:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(64, 1, 9, 1, '13', '2017-03-28 00:00:00', '8.64', '0.00', '80.58', '8.06', 1, 1, 0, '80.58', '0.00', 1, 3, '', '2017-03-28 15:01:15', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(65, 1, 9, 0, '14', '2017-03-28 00:00:00', '6.43', '0.00', '60.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 2, '', '2017-03-28 15:12:00', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(66, 1, 9, 0, '15', '2017-03-28 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '0.00', '0.00', 0, 3, '', '2017-03-28 15:13:17', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(67, 1, 9, 1, '16', '2017-03-28 00:00:00', '21.21', '0.00', '198.00', '0.00', 1, 1, 0, '198.00', '0.00', 1, 2, '', '2017-03-28 15:46:19', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(68, 1, 9, 1, '17', '2017-03-28 00:00:00', '6.00', '0.00', '56.00', '0.00', 1, 1, 1, '56.00', '0.00', 1, 2, '', '2017-03-28 15:47:01', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(69, 1, 6, 0, '1', '2017-03-29 00:00:00', '6.43', '0.00', '60.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 3, '', '2017-03-28 20:47:30', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(70, 1, 9, 0, '2', '2017-03-29 00:00:00', '6.00', '0.00', '56.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 3, '', '2017-03-28 20:57:12', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(71, 1, 9, 0, '3', '2017-03-29 00:00:00', '18.00', '0.00', '168.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 4, '', '2017-03-28 21:15:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(72, 1, 9, 0, '4', '2017-03-29 00:00:00', '80.04', '0.00', '807.04', '0.00', 1, 0, 0, '0.00', '0.00', 0, 3, '', '2017-03-28 21:35:14', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(73, 1, 9, 0, '5', '2017-03-29 00:00:00', '26.40', '0.00', '246.40', '0.00', 1, 0, 0, '0.00', '0.00', 0, 3, '', '2017-03-28 21:41:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(74, 1, 9, 0, '6', '2017-03-29 00:00:00', '17.04', '0.00', '159.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 4, '', '2017-03-29 07:49:36', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(75, 1, 9, 0, '7', '2017-03-29 00:00:00', '10.61', '0.00', '159.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 3, '', '2017-03-29 08:06:29', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(76, 1, 9, 0, '8', '2017-03-29 00:00:00', '9.55', '0.00', '89.10', '8.84', 1, 0, 0, '0.00', '0.00', 0, 4, '', '2017-03-29 09:24:08', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(77, 1, 9, 1, '9', '2017-03-29 00:00:00', '22.49', '0.00', '269.88', '0.00', 1, 1, 0, '269.88', '0.00', 1, 3, '', '2017-03-29 12:11:38', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(78, 1, 3, 9, '10', '2017-03-29 00:00:00', '11.88', '0.00', '317.88', '0.00', 1, 1, 0, '317.88', '0.00', 1, 4, '', '2017-03-29 14:53:05', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(79, 1, 9, 0, '1', '2017-03-30 00:00:00', '6.00', '0.00', '56.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 4, '', '2017-03-30 06:50:08', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(80, 1, 9, 0, '2', '2017-03-30 00:00:00', '21.21', '0.00', '198.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 4, '', '2017-03-30 08:04:38', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(81, 1, 3, 0, '3', '2017-03-30 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 4, '', '2017-03-30 08:04:24', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(82, 1, 3, 0, '4', '2017-03-30 00:00:00', '0.00', '0.00', '30.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 4, '', '2017-03-30 08:07:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(83, 1, 3, 0, '5', '2017-03-30 00:00:00', '0.00', '0.00', '45.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 4, '', '2017-03-30 08:07:12', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(84, 1, 9, 1, '18', '2017-03-28 00:00:00', '15.48', '0.00', '1163.48', '0.00', 1, 1, 1, '1163.48', '0.00', 1, 2, '', '2017-03-30 08:18:45', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(85, 1, 9, 0, '6', '2017-03-30 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '0.00', '0.00', 0, 4, '', '2017-03-30 14:31:14', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(86, 1, 9, 0, '7', '2017-03-30 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '0.00', '0.00', 0, 4, '', '2017-03-30 14:31:21', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(87, 1, 9, 0, '8', '2017-03-30 00:00:00', '9.60', '0.00', '89.60', '0.00', 1, 0, 0, '0.00', '0.00', 0, 4, '', '2017-03-30 14:31:23', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(88, 1, 9, 0, '9', '2017-03-30 00:00:00', '26.28', '0.00', '245.28', '0.00', 1, 0, 0, '0.00', '0.00', 0, 4, '', '2017-03-30 15:02:01', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(89, 1, 9, 0, '10', '2017-03-30 00:00:00', '6.00', '0.00', '56.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 4, '', '2017-03-30 15:03:36', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(90, 1, 9, 0, '11', '2017-03-30 00:00:00', '4.80', '0.00', '44.80', '0.00', 1, 0, 0, '0.00', '0.00', 0, 3, '', '2017-03-30 15:03:16', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(91, 1, 9, 0, '12', '2017-03-30 00:00:00', '9.60', '0.00', '89.60', '0.00', 1, 0, 0, '0.00', '0.00', 0, 3, '', '2017-03-30 15:04:01', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(92, 1, 9, 0, '13', '2017-03-30 00:00:00', '6.43', '0.00', '60.00', '0.00', 1, 0, 0, '0.00', '0.00', 0, 3, '', '2017-03-30 15:02:20', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(93, 1, 9, 0, '14', '2017-03-30 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '0.00', '0.00', 0, 3, '', '2017-03-30 15:09:52', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(94, 1, 9, 0, '15', '2017-03-30 00:00:00', '21.60', '0.00', '201.60', '0.00', 1, 0, 0, '0.00', '0.00', 0, 3, '', '2017-03-30 15:10:50', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(111, 1, 9, 0, '1', '2017-03-31 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 0, 2, '', '2017-03-31 16:39:46', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(112, 1, 9, 0, '2', '2017-03-31 00:00:00', '5.40', '0.00', '50.40', '0.00', 2, 0, 0, '50.40', '0.00', 0, 2, '', '2017-03-31 16:40:12', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(113, 1, 9, 0, '3', '2017-03-31 00:00:00', '20.28', '0.00', '189.28', '0.00', 3, 0, 0, '189.28', '0.00', 0, 2, '', '2017-03-31 16:40:19', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(114, 1, 9, 0, '4', '2017-03-31 00:00:00', '25.20', '0.00', '235.20', '0.00', 2, 0, 0, '235.20', '0.00', 0, 2, '', '2017-03-31 16:40:25', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(115, 1, 9, 0, '5', '2017-03-31 00:00:00', '15.60', '0.00', '145.60', '0.00', 3, 0, 0, '145.60', '0.00', 0, 2, '', '2017-03-31 16:40:38', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(116, 1, 9, 0, '6', '2017-03-31 00:00:00', '61.92', '0.00', '577.92', '0.00', 3, 0, 0, '577.92', '0.00', 0, 2, '', '2017-03-31 16:46:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(117, 1, 9, 0, '1', '2017-04-01 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 0, 4, '', '2017-04-01 12:14:33', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(118, 1, 9, 0, '2', '2017-04-01 00:00:00', '7.20', '0.00', '67.20', '0.00', 2, 0, 0, '67.20', '0.00', 0, 4, '', '2017-04-01 12:17:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(119, 1, 9, 0, '3', '2017-04-01 00:00:00', '22.68', '0.00', '211.68', '0.00', 1, 0, 0, '211.68', '0.00', 0, 4, '', '2017-04-01 12:27:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(120, 1, 9, 0, '4', '2017-04-01 00:00:00', '23.88', '0.00', '222.88', '0.00', 3, 0, 0, '222.88', '0.00', 0, 4, '', '2017-04-01 12:27:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(121, 1, 9, 0, '5', '2017-04-01 00:00:00', '8.40', '0.00', '78.40', '0.00', 1, 0, 0, '78.40', '0.00', 0, 4, '', '2017-04-01 12:28:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(122, 1, 9, 0, '6', '2017-04-01 00:00:00', '12.60', '0.00', '117.60', '0.00', 2, 0, 0, '117.60', '0.00', 0, 4, '', '2017-04-01 12:28:43', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(123, 1, 9, 0, '7', '2017-04-01 00:00:00', '26.28', '0.00', '245.28', '0.00', 3, 0, 0, '245.28', '0.00', 0, 4, '', '2017-04-01 12:28:30', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(124, 1, 9, 0, '8', '2017-04-01 00:00:00', '30.96', '0.00', '288.96', '0.00', 2, 0, 0, '288.96', '0.00', 0, 4, '', '2017-04-01 12:28:32', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(125, 1, 9, 0, '9', '2017-04-01 00:00:00', '26.09', '0.00', '243.48', '0.00', 1, 0, 0, '243.48', '0.00', 0, 2, '', '2017-04-01 12:26:04', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(126, 1, 3, 9, '10', '2017-04-01 00:00:00', '20.40', '0.00', '190.40', '0.00', 1, 1, 0, '190.40', '0.00', 1, 2, '', '2017-04-01 13:43:06', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(127, 1, 3, 9, '11', '2017-04-01 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 1, 0, '162.40', '0.00', 1, 2, '', '2017-04-01 13:53:51', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(128, 1, 3, 9, '12', '2017-04-01 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 1, 0, '179.20', '0.00', 1, 2, '', '2017-04-01 13:56:42', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(129, 1, 3, 10, '13', '2017-04-01 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 1, 0, '162.40', '0.00', 1, 2, '', '2017-04-01 13:59:28', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(130, 1, 3, 9, '14', '2017-04-01 00:00:00', '24.48', '0.00', '228.48', '0.00', 1, 1, 0, '228.48', '0.00', 1, 2, '', '2017-04-01 14:01:59', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(131, 1, 3, 10, '15', '2017-04-01 00:00:00', '24.00', '0.00', '224.00', '0.00', 1, 1, 0, '224.00', '0.00', 1, 2, '', '2017-04-01 14:04:29', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(132, 1, 3, 10, '16', '2017-04-01 00:00:00', '21.60', '0.00', '201.60', '0.00', 1, 1, 0, '201.60', '0.00', 1, 2, '', '2017-04-01 14:06:33', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(133, 1, 3, 10, '17', '2017-04-01 00:00:00', '48.24', '0.00', '450.24', '7.00', 1, 1, 0, '450.24', '0.00', 1, 2, '', '2017-04-01 14:13:10', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(134, 1, 3, 4, '18', '2017-04-01 00:00:00', '18.00', '0.00', '168.00', '0.00', 1, 1, 0, '168.00', '0.00', 1, 2, '', '2017-04-01 14:25:53', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(135, 1, 3, 9, '19', '2017-04-01 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 1, 0, '162.40', '0.00', 1, 2, '', '2017-04-01 14:37:25', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(136, 1, 3, 9, '20', '2017-04-01 00:00:00', '27.00', '0.00', '252.00', '0.00', 1, 1, 0, '252.00', '0.00', 1, 2, '', '2017-04-01 14:39:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(137, 1, 3, 10, '21', '2017-04-01 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 1, 0, '162.40', '0.00', 1, 2, '', '2017-04-01 14:41:57', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(138, 1, 3, 9, '22', '2017-04-01 00:00:00', '28.20', '0.00', '263.20', '0.00', 1, 1, 0, '263.20', '0.00', 1, 2, '', '2017-04-01 14:44:44', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(139, 1, 3, 9, '23', '2017-04-01 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 1, 0, '162.40', '0.00', 1, 2, '', '2017-04-01 14:47:29', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(140, 1, 3, 9, '24', '2017-04-01 00:00:00', '24.60', '0.00', '229.60', '0.00', 1, 1, 0, '229.60', '0.00', 1, 2, '', '2017-04-01 14:49:58', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(141, 1, 3, 9, '25', '2017-04-01 00:00:00', '0.00', '0.00', '11536.00', '0.00', 1, 1, 0, '11536.00', '0.00', 1, 2, '', '2017-04-01 14:53:05', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(142, 1, 3, 10, '1', '2017-04-03 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 1, 0, '112.00', '0.00', 1, 2, '', '2017-04-03 10:07:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(143, 1, 3, 9, '2', '2017-04-03 00:00:00', '10.80', '0.00', '100.80', '0.00', 1, 1, 0, '100.80', '0.00', 1, 2, '', '2017-04-03 10:10:28', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(144, 1, 3, 9, '3', '2017-04-03 00:00:00', '10.80', '0.00', '100.80', '0.00', 1, 1, 0, '100.80', '0.00', 1, 2, '', '2017-04-03 10:14:24', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(145, 1, 3, 9, '4', '2017-04-03 00:00:00', '10.80', '0.00', '10140.80', '0.00', 1, 1, 0, '10140.80', '0.00', 1, 2, '', '2017-04-03 10:18:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(146, 1, 3, 9, '5', '2017-04-03 00:00:00', '10.80', '0.00', '100.80', '0.00', 1, 1, 0, '100.80', '0.00', 1, 2, '', '2017-04-03 10:23:06', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(147, 1, 3, 9, '6', '2017-04-03 00:00:00', '18.00', '0.00', '168.00', '0.00', 1, 1, 0, '168.00', '0.00', 1, 2, '', '2017-04-03 10:31:46', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(148, 1, 3, 4, '7', '2017-04-03 00:00:00', '16.20', '0.00', '151.20', '0.00', 1, 1, 0, '151.20', '0.00', 1, 2, '', '2017-04-03 10:38:59', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(149, 1, 3, 4, '8', '2017-04-03 00:00:00', '24.48', '0.00', '228.48', '0.00', 1, 1, 0, '228.48', '0.00', 1, 2, '', '2017-04-03 10:39:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(150, 1, 3, 9, '9', '2017-04-03 00:00:00', '10.80', '0.00', '100.80', '0.00', 1, 1, 0, '100.80', '0.00', 1, 2, '', '2017-04-03 10:41:24', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(151, 1, 3, 9, '10', '2017-04-03 00:00:00', '16.20', '0.00', '151.20', '0.00', 1, 1, 0, '151.20', '0.00', 1, 2, '', '2017-04-03 10:44:52', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(152, 1, 3, 6, '11', '2017-04-03 00:00:00', '10.80', '0.00', '100.80', '0.00', 1, 1, 0, '100.80', '0.00', 1, 2, '', '2017-04-03 10:46:54', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(153, 1, 3, 9, '12', '2017-04-03 00:00:00', '10.80', '0.00', '160.80', '0.00', 1, 1, 0, '160.80', '0.00', 1, 2, '', '2017-04-03 10:48:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(154, 1, 3, 9, '13', '2017-04-03 00:00:00', '10.80', '0.00', '160.80', '0.00', 1, 1, 0, '160.80', '0.00', 1, 2, '', '2017-04-03 10:50:50', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(155, 1, 3, 9, '14', '2017-04-03 00:00:00', '10.80', '0.00', '160.80', '0.00', 1, 1, 0, '160.80', '0.00', 1, 2, '', '2017-04-03 10:54:21', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(156, 1, 3, 9, '15', '2017-04-03 00:00:00', '10.80', '0.00', '160.80', '0.00', 1, 1, 0, '160.80', '0.00', 1, 2, '', '2017-04-03 10:55:34', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(157, 1, 3, 9, '16', '2017-04-03 00:00:00', '10.80', '0.00', '160.80', '0.00', 1, 1, 0, '160.80', '0.00', 1, 2, '', '2017-04-03 10:56:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(158, 1, 3, 9, '17', '2017-04-03 00:00:00', '25.08', '0.00', '234.08', '0.00', 1, 1, 0, '234.08', '0.00', 1, 2, '', '2017-04-03 11:00:05', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(159, 1, 3, 9, '18', '2017-04-03 00:00:00', '108.00', '0.00', '1008.00', '0.00', 1, 1, 0, '1008.00', '0.00', 1, 2, '', '2017-04-03 11:00:45', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(160, 1, 3, 9, '19', '2017-04-03 00:00:00', '286.63', '0.00', '4883.20', '0.00', 1, 1, 0, '4883.20', '0.00', 1, 2, '', '2017-04-03 11:07:04', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(161, 1, 3, 9, '20', '2017-04-03 00:00:00', '432.00', '0.00', '4032.00', '0.00', 1, 1, 0, '4032.00', '0.00', 1, 2, '', '2017-04-03 11:12:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(162, 1, 3, 9, '21', '2017-04-03 00:00:00', '84.00', '0.00', '784.00', '0.00', 1, 1, 0, '784.00', '0.00', 1, 2, '', '2017-04-03 11:16:40', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(163, 1, 3, 9, '22', '2017-04-03 00:00:00', '111.48', '0.00', '1040.48', '0.00', 1, 1, 0, '1040.48', '0.00', 1, 2, '', '2017-04-03 11:20:26', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(164, 1, 3, 9, '23', '2017-04-03 00:00:00', '56.40', '0.00', '526.40', '0.00', 1, 1, 0, '526.40', '0.00', 1, 2, '', '2017-04-03 11:24:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(165, 1, 3, 9, '24', '2017-04-03 00:00:00', '48.00', '0.00', '448.00', '0.00', 1, 1, 0, '448.00', '0.00', 1, 2, '', '2017-04-03 11:26:39', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(166, 1, 3, 9, '25', '2017-04-03 00:00:00', '48.00', '0.00', '448.00', '0.00', 1, 1, 0, '448.00', '0.00', 1, 2, '', '2017-04-03 11:28:11', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(167, 1, 3, 9, '26', '2017-04-03 00:00:00', '48.00', '0.00', '448.00', '0.00', 1, 1, 0, '448.00', '0.00', 1, 2, '', '2017-04-03 11:30:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(168, 1, 3, 9, '27', '2017-04-03 00:00:00', '37.20', '0.00', '347.20', '0.00', 1, 1, 0, '347.20', '0.00', 1, 2, '', '2017-04-03 11:31:54', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(169, 1, 3, 9, '28', '2017-04-03 00:00:00', '42.60', '0.00', '397.60', '0.00', 1, 1, 0, '397.60', '0.00', 1, 2, '', '2017-04-03 11:34:08', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(170, 1, 3, 9, '29', '2017-04-03 00:00:00', '42.60', '0.00', '397.60', '0.00', 1, 1, 0, '397.60', '0.00', 1, 2, '', '2017-04-03 11:34:17', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(171, 1, 3, 9, '30', '2017-04-03 00:00:00', '42.60', '0.00', '397.60', '0.00', 1, 1, 0, '397.60', '0.00', 1, 2, '', '2017-04-03 11:36:21', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(172, 1, 3, 9, '31', '2017-04-03 00:00:00', '48.00', '0.00', '448.00', '0.00', 1, 1, 0, '448.00', '0.00', 1, 2, '', '2017-04-03 11:36:42', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(173, 1, 3, 9, '32', '2017-04-03 00:00:00', '57.60', '0.00', '537.60', '0.00', 1, 1, 0, '537.60', '0.00', 1, 2, '', '2017-04-03 11:38:06', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(174, 1, 3, 9, '33', '2017-04-03 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 1, 0, '162.40', '0.00', 1, 2, '', '2017-04-03 11:51:43', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(175, 1, 3, 9, '34', '2017-04-03 00:00:00', '96.48', '0.00', '12948.48', '0.00', 1, 1, 0, '12948.48', '0.00', 1, 2, '', '2017-04-03 13:58:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(176, 1, 3, 9, '35', '2017-04-03 00:00:00', '27.48', '0.00', '256.48', '0.00', 1, 1, 0, '256.48', '0.00', 1, 2, '', '2017-04-03 14:01:06', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(177, 1, 3, 10, '36', '2017-04-03 00:00:00', '48.00', '0.00', '448.00', '0.00', 1, 1, 0, '448.00', '0.00', 1, 2, '', '2017-04-03 14:05:53', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(178, 1, 3, 6, '37', '2017-04-03 00:00:00', '30.00', '0.00', '12335.00', '0.00', 1, 1, 0, '12335.00', '0.00', 1, 2, '', '2017-04-03 14:10:15', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(179, 1, 3, 9, '38', '2017-04-03 00:00:00', '35.40', '0.00', '11374.40', '0.00', 1, 1, 0, '11374.40', '0.00', 1, 2, '', '2017-04-03 14:12:26', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(180, 1, 3, 9, '39', '2017-04-03 00:00:00', '154.08', '0.00', '11485.08', '0.00', 1, 1, 0, '11485.08', '0.00', 1, 2, '', '2017-04-03 14:22:15', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(181, 1, 3, 9, '40', '2017-04-03 00:00:00', '38.40', '0.00', '5378.40', '0.00', 1, 1, 0, '5378.40', '0.00', 1, 2, '', '2017-04-03 14:34:34', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(182, 1, 3, 9, '41', '2017-04-03 00:00:00', '40.68', '0.00', '379.68', '0.00', 1, 1, 0, '379.68', '0.00', 1, 2, '', '2017-04-03 14:35:48', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(183, 1, 3, 9, '42', '2017-04-03 00:00:00', '50.88', '0.00', '474.88', '0.00', 1, 1, 0, '474.88', '0.00', 1, 2, '', '2017-04-03 14:36:53', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(184, 1, 3, 9, '43', '2017-04-03 00:00:00', '49.80', '0.00', '464.80', '0.00', 1, 1, 0, '464.80', '0.00', 1, 2, '', '2017-04-03 14:44:01', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(185, 1, 3, 10, '44', '2017-04-03 00:00:00', '36.48', '0.00', '340.48', '0.00', 1, 1, 0, '340.48', '0.00', 1, 2, '', '2017-04-03 14:45:36', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(186, 1, 3, 9, '45', '2017-04-03 00:00:00', '30.00', '0.00', '280.00', '0.00', 1, 1, 0, '280.00', '0.00', 1, 2, '', '2017-04-03 14:47:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(187, 1, 3, 9, '46', '2017-04-03 00:00:00', '37.20', '0.00', '347.20', '0.00', 1, 1, 0, '347.20', '0.00', 1, 2, '', '2017-04-03 14:48:45', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(188, 1, 3, 9, '47', '2017-04-03 00:00:00', '36.00', '0.00', '336.00', '0.00', 1, 1, 0, '336.00', '0.00', 1, 2, '', '2017-04-03 14:49:29', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(189, 1, 3, 9, '48', '2017-04-03 00:00:00', '28.80', '0.00', '11312.80', '0.00', 1, 1, 0, '11312.80', '0.00', 1, 2, '', '2017-04-03 14:52:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(190, 1, 3, 9, '49', '2017-04-03 00:00:00', '54.00', '0.00', '7532.00', '0.00', 1, 1, 0, '7532.00', '0.00', 1, 2, '', '2017-04-03 14:53:59', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(191, 1, 3, 9, '50', '2017-04-03 00:00:00', '43.68', '0.00', '407.68', '0.00', 1, 1, 0, '407.68', '0.00', 1, 2, '', '2017-04-03 15:00:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(192, 1, 3, 9, '51', '2017-04-03 00:00:00', '67.44', '0.00', '629.44', '0.00', 1, 1, 0, '629.44', '0.00', 1, 2, '', '2017-04-03 15:00:17', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(193, 1, 3, 9, '1', '2017-04-04 00:00:00', '60.00', '0.00', '560.00', '0.00', 1, 1, 0, '560.00', '0.00', 1, 2, '', '2017-04-04 12:05:28', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(194, 1, 3, 10, '2', '2017-04-04 00:00:00', '18.00', '0.00', '2183.00', '0.00', 1, 1, 0, '2183.00', '0.00', 1, 2, '', '2017-04-04 13:22:51', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(195, 1, 3, 9, '3', '2017-04-04 00:00:00', '56.40', '0.00', '526.40', '0.00', 1, 1, 0, '526.40', '0.00', 1, 2, '', '2017-04-04 14:53:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(196, 1, 3, 9, '4', '2017-04-04 00:00:00', '24.60', '0.00', '229.60', '0.00', 1, 1, 0, '229.60', '0.00', 1, 2, '', '2017-04-04 14:54:32', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(197, 1, 3, 0, '1', '2017-04-05 00:00:00', '23.88', '0.00', '222.88', '0.00', 1, 1, 0, '222.88', '0.00', 1, 2, '', '2017-04-05 07:34:01', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(198, 1, 3, 0, '2', '2017-04-05 00:00:00', '36.00', '0.00', '336.00', '0.00', 1, 1, 0, '336.00', '0.00', 1, 2, '', '2017-04-05 10:44:38', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(199, 1, 3, 0, '3', '2017-04-05 00:00:00', '30.00', '0.00', '280.00', '0.00', 1, 1, 0, '280.00', '0.00', 1, 2, '', '2017-04-05 10:48:57', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(200, 1, 3, 0, '4', '2017-04-05 00:00:00', '30.00', '0.00', '280.00', '0.00', 1, 1, 0, '280.00', '0.00', 1, 2, '', '2017-04-05 10:58:10', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(201, 1, 3, 0, '5', '2017-04-05 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 0, 0, '162.40', '0.00', 1, 2, '', '2017-04-05 11:50:40', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(202, 1, 3, 0, '6', '2017-04-05 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 1, 1, '162.40', '0.00', 1, 2, '', '2017-04-05 12:18:44', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(203, 1, 3, 0, '7', '2017-04-05 00:00:00', '24.60', '0.00', '229.60', '0.00', 1, 0, 0, '229.60', '0.00', 1, 2, '', '2017-04-05 13:14:10', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(204, 1, 3, 0, '8', '2017-04-05 00:00:00', '0.00', '0.00', '0.00', '0.00', 1, 0, 0, '0.00', '0.00', 1, 2, '', '2017-04-05 13:14:10', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(205, 1, 3, 0, '9', '2017-04-05 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 0, 0, '162.40', '0.00', 1, 2, '', '2017-04-05 13:17:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(206, 1, 3, 0, '10', '2017-04-05 00:00:00', '0.00', '0.00', '0.00', '0.00', 1, 0, 0, '0.00', '0.00', 1, 2, '', '2017-04-05 13:17:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(207, 1, 3, 0, '11', '2017-04-05 00:00:00', '0.00', '0.00', '0.00', '0.00', 1, 0, 0, '0.00', '0.00', 1, 2, '', '2017-04-05 13:20:47', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(208, 1, 3, 0, '12', '2017-04-05 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-05 13:20:48', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(209, 1, 3, 0, '13', '2017-04-05 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 0, 0, '162.40', '0.00', 1, 2, '', '2017-04-05 13:28:58', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(210, 1, 3, 0, '14', '2017-04-05 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-05 13:30:59', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(211, 1, 3, 0, '15', '2017-04-05 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-05 13:32:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(212, 1, 3, 0, '16', '2017-04-05 00:00:00', '28.20', '0.00', '263.20', '0.00', 1, 0, 0, '263.20', '0.00', 1, 2, '', '2017-04-05 13:41:01', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(213, 1, 3, 0, '17', '2017-04-05 00:00:00', '25.20', '0.00', '235.20', '0.00', 1, 0, 0, '235.20', '0.00', 1, 2, '', '2017-04-05 13:45:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(214, 1, 3, 0, '18', '2017-04-05 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 0, 0, '162.40', '0.00', 1, 2, '', '2017-04-05 13:47:35', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(215, 1, 3, 0, '1', '2017-04-06 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-06 07:37:52', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(216, 1, 9, 0, '2', '2017-04-06 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-06 07:38:28', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(217, 1, 9, 0, '3', '2017-04-06 00:00:00', '45.72', '0.00', '426.72', '39.00', 1, 0, 0, '426.72', '0.00', 1, 2, '', '2017-04-06 13:03:41', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(218, 1, 3, 0, '19', '2017-04-05 00:00:00', '30.00', '0.00', '280.00', '0.00', 1, 1, 0, '280.00', '0.00', 1, 2, '', '2017-04-07 14:35:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(219, 1, 3, 0, '20', '2017-04-05 00:00:00', '30.00', '0.00', '280.00', '0.00', 1, 1, 0, '280.00', '0.00', 1, 2, '', '2017-04-07 14:38:59', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(220, 1, 9, 0, '1', '2017-04-10 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '', '2017-04-10 05:22:34', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(221, 1, 9, 0, '2', '2017-04-10 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-10 05:27:58', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(222, 1, 9, 0, '3', '2017-04-10 00:00:00', '31.20', '0.00', '291.20', '0.00', 1, 0, 0, '291.20', '0.00', 1, 2, '', '2017-04-10 05:43:53', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(223, 1, 9, 0, '4', '2017-04-10 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-10 05:47:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(224, 1, 9, 0, '5', '2017-04-10 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-10 05:53:23', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(225, 1, 9, 0, '6', '2017-04-10 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '', '2017-04-10 05:57:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(226, 1, 9, 0, '7', '2017-04-10 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 0, 0, '162.40', '0.00', 1, 2, '', '2017-04-10 05:59:50', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(227, 1, 9, 0, '8', '2017-04-10 00:00:00', '22.80', '0.00', '212.80', '0.00', 1, 0, 0, '212.80', '0.00', 1, 2, '', '2017-04-10 06:02:46', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(228, 1, 9, 0, '9', '2017-04-10 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '', '2017-04-10 06:04:54', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(229, 1, 9, 0, '10', '2017-04-10 00:00:00', '24.00', '0.00', '224.00', '0.00', 1, 0, 0, '224.00', '0.00', 1, 2, '', '2017-04-10 06:13:23', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(230, 1, 9, 0, '11', '2017-04-10 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-10 07:29:26', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(231, 1, 9, 0, '12', '2017-04-10 00:00:00', '5.40', '0.00', '50.40', '0.00', 1, 0, 0, '50.40', '0.00', 1, 2, '', '2017-04-10 07:30:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(232, 1, 9, 0, '13', '2017-04-10 00:00:00', '80.40', '0.00', '750.40', '0.00', 1, 0, 0, '750.40', '0.00', 1, 2, '', '2017-04-10 07:31:12', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(233, 1, 9, 0, '14', '2017-04-10 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-10 07:49:23', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(234, 1, 9, 0, '15', '2017-04-10 00:00:00', '10.80', '0.00', '100.80', '0.00', 1, 0, 0, '100.80', '0.00', 1, 2, '', '2017-04-10 12:40:52', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(235, 1, 9, 0, '16', '2017-04-10 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-10 12:56:24', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(236, 1, 9, 0, '17', '2017-04-10 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-10 13:12:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(237, 1, 9, 0, '18', '2017-04-10 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '', '2017-04-10 13:18:27', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(238, 1, 9, 0, '19', '2017-04-10 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '', '2017-04-10 13:24:26', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(239, 1, 9, 0, '20', '2017-04-10 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-10 13:27:41', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(240, 1, 9, 0, '21', '2017-04-10 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-10 13:30:11', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(241, 1, 9, 0, '22', '2017-04-10 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-10 13:43:57', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(242, 1, 9, 0, '23', '2017-04-10 00:00:00', '48.00', '0.00', '448.00', '0.00', 1, 0, 0, '448.00', '0.00', 1, 2, '', '2017-04-10 13:56:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(243, 1, 9, 0, '24', '2017-04-10 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '', '2017-04-10 14:03:35', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(244, 1, 9, 0, '25', '2017-04-10 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-10 14:05:24', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(245, 1, 9, 0, '26', '2017-04-10 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-10 14:07:28', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(246, 1, 9, 0, '27', '2017-04-10 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-10 14:09:51', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(247, 1, 9, 0, '28', '2017-04-10 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-10 14:12:47', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(248, 1, 9, 0, '29', '2017-04-10 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-10 14:21:04', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(249, 1, 9, 0, '30', '2017-04-10 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-10 14:26:51', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(250, 1, 9, 0, '31', '2017-04-10 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-10 14:53:35', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(251, 1, 9, 0, '32', '2017-04-10 00:00:00', '54.72', '0.00', '510.72', '24.00', 1, 0, 0, '510.72', '0.00', 1, 2, '', '2017-04-10 15:04:16', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1);
INSERT INTO `pos_sales_order` (`sales_order_id`, `company_id`, `employee_id`, `customer_id`, `sales_order_no`, `sales_order_date`, `tax_amount`, `subtotal_amount`, `final_amount`, `discount_amount`, `payment_method_id`, `payment_split`, `payment_split_type`, `paid_amount`, `remaining_amount`, `sales_order_payment_status_id`, `sales_order_status_id`, `payment_response`, `update_date`, `location_id`, `table_id`, `floor_id`, `sales_order_type_id`, `created_at`, `updated_at`, `order_from_id`) VALUES
(252, 1, 9, 0, '33', '2017-04-10 00:00:00', '11.88', '0.00', '1496.88', '0.00', 1, 0, 0, '1496.88', '0.00', 1, 2, '', '2017-04-10 15:05:57', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(253, 1, 9, 0, '34', '2017-04-10 00:00:00', '27.00', '0.00', '252.00', '0.00', 1, 0, 0, '252.00', '0.00', 1, 2, '', '2017-04-10 15:08:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(254, 1, 9, 0, '35', '2017-04-10 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-10 15:12:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(255, 1, 9, 0, '36', '2017-04-10 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-10 15:14:46', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(256, 1, 9, 0, '37', '2017-04-10 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-10 15:17:58', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(257, 1, 9, 0, '38', '2017-04-10 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-10 15:20:26', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(258, 1, 9, 0, '39', '2017-04-10 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-10 15:20:43', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(259, 1, 9, 0, '40', '2017-04-10 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-10 15:21:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(260, 1, 9, 0, '41', '2017-04-10 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-10 15:22:29', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(261, 1, 9, 0, '42', '2017-04-10 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-10 15:24:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(262, 1, 9, 0, '43', '2017-04-10 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-10 15:26:48', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(263, 1, 9, 0, '44', '2017-04-10 00:00:00', '111.60', '0.00', '1041.60', '0.00', 1, 0, 0, '1041.60', '0.00', 1, 2, '', '2017-04-10 15:32:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(264, 1, 9, 0, '45', '2017-04-10 00:00:00', '5.40', '0.00', '50.40', '0.00', 1, 0, 0, '50.40', '0.00', 1, 2, '', '2017-04-10 15:34:25', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(265, 1, 9, 0, '46', '2017-04-10 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-10 15:37:42', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(266, 1, 9, 0, '47', '2017-04-10 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-10 15:39:14', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(267, 1, 9, 0, '48', '2017-04-10 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '', '2017-04-10 15:41:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(268, 1, 9, 0, '49', '2017-04-10 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-10 15:45:26', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(269, 1, 9, 0, '50', '2017-04-10 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-10 15:50:18', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(270, 1, 9, 0, '51', '2017-04-10 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-10 15:50:58', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(271, 1, 9, 0, '52', '2017-04-10 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-10 15:53:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(272, 1, 9, 0, '53', '2017-04-10 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-10 15:58:43', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(273, 1, 9, 0, '54', '2017-04-10 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-10 16:04:54', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(274, 1, 9, 0, '55', '2017-04-10 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-10 16:06:14', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(275, 1, 9, 0, '56', '2017-04-10 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-10 16:08:17', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(276, 1, 9, 0, '57', '2017-04-10 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-10 16:13:17', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(277, 1, 9, 0, '58', '2017-04-10 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-10 16:13:47', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(278, 1, 9, 0, '59', '2017-04-10 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-10 16:15:21', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(279, 1, 9, 0, '60', '2017-04-10 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-10 16:17:49', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(280, 1, 9, 0, '61', '2017-04-10 00:00:00', '5.40', '0.00', '50.40', '0.00', 1, 0, 0, '50.40', '0.00', 1, 2, '', '2017-04-10 16:18:54', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(281, 1, 9, 0, '62', '2017-04-10 00:00:00', '5.40', '0.00', '50.40', '0.00', 1, 0, 0, '50.40', '0.00', 1, 2, '', '2017-04-10 16:23:25', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(282, 1, 9, 0, '63', '2017-04-10 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-10 16:26:25', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(283, 1, 9, 0, '64', '2017-04-10 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-10 16:29:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(284, 1, 9, 0, '65', '2017-04-10 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-10 16:34:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(285, 1, 9, 0, '1', '2017-04-11 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 4, '', '2017-04-11 13:43:50', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(286, 1, 9, 0, '2', '2017-04-11 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-11 05:37:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(287, 1, 9, 0, '3', '2017-04-11 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 3, '', '2017-04-11 13:42:49', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(288, 1, 9, 0, '4', '2017-04-11 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-11 05:40:12', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(289, 1, 9, 0, '5', '2017-04-11 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-11 05:40:14', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(290, 1, 9, 0, '6', '2017-04-11 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-11 05:43:31', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(291, 1, 9, 0, '7', '2017-04-11 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-11 05:43:33', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(292, 1, 9, 0, '8', '2017-04-11 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '', '2017-04-11 05:48:33', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(293, 1, 9, 0, '9', '2017-04-11 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '', '2017-04-11 05:53:54', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(294, 1, 9, 0, '10', '2017-04-11 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-11 05:58:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(295, 1, 9, 0, '11', '2017-04-11 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-11 06:00:43', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(296, 1, 9, 0, '12', '2017-04-11 00:00:00', '42.60', '0.00', '397.60', '0.00', 1, 0, 0, '397.60', '0.00', 1, 2, '', '2017-04-11 06:56:04', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(297, 1, 9, 0, '13', '2017-04-11 00:00:00', '35.40', '0.00', '330.40', '0.00', 1, 0, 0, '330.40', '0.00', 1, 2, '', '2017-04-11 06:58:16', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(298, 1, 9, 0, '14', '2017-04-11 00:00:00', '35.40', '0.00', '330.40', '0.00', 1, 0, 0, '330.40', '0.00', 1, 2, '', '2017-04-11 07:04:41', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(299, 1, 9, 0, '15', '2017-04-11 00:00:00', '24.60', '0.00', '229.60', '0.00', 1, 0, 0, '229.60', '0.00', 1, 2, '', '2017-04-11 07:19:31', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(300, 1, 9, 0, '16', '2017-04-11 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '', '2017-04-11 07:44:25', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(301, 1, 9, 0, '17', '2017-04-11 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-11 07:53:08', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(302, 1, 9, 0, '18', '2017-04-11 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 0, 0, '162.40', '0.00', 1, 2, '', '2017-04-11 07:55:05', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(303, 1, 9, 0, '19', '2017-04-11 00:00:00', '30.00', '0.00', '280.00', '0.00', 1, 0, 0, '280.00', '0.00', 1, 2, '', '2017-04-11 08:02:27', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(304, 1, 9, 0, '20', '2017-04-11 00:00:00', '38.40', '0.00', '358.40', '0.00', 1, 0, 0, '358.40', '0.00', 1, 2, '', '2017-04-11 08:05:45', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(305, 1, 9, 0, '21', '2017-04-11 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '', '2017-04-11 09:01:41', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(306, 1, 9, 0, '22', '2017-04-11 00:00:00', '84.00', '0.00', '784.00', '0.00', 1, 0, 0, '784.00', '0.00', 1, 2, '', '2017-04-11 09:06:50', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(307, 1, 9, 0, '23', '2017-04-11 00:00:00', '70.08', '0.00', '654.08', '0.00', 1, 0, 0, '654.08', '0.00', 1, 2, '', '2017-04-11 09:11:21', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(308, 1, 9, 0, '24', '2017-04-11 00:00:00', '85.68', '0.00', '799.68', '0.00', 1, 0, 0, '799.68', '0.00', 1, 2, '', '2017-04-11 09:17:12', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(309, 1, 9, 0, '25', '2017-04-11 00:00:00', '85.68', '0.00', '799.68', '0.00', 1, 0, 0, '799.68', '0.00', 1, 2, '', '2017-04-11 09:18:49', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(310, 1, 9, 0, '26', '2017-04-11 00:00:00', '51.43', '0.00', '480.00', '0.00', 1, 0, 0, '480.00', '0.00', 1, 2, '', '2017-04-11 09:22:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(311, 1, 9, 0, '27', '2017-04-11 00:00:00', '200.91', '0.00', '1875.20', '0.00', 1, 0, 0, '1875.20', '0.00', 1, 2, '', '2017-04-11 09:26:14', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(312, 1, 9, 0, '28', '2017-04-11 00:00:00', '69.84', '0.00', '651.80', '0.00', 1, 0, 0, '651.80', '0.00', 1, 2, '', '2017-04-11 09:34:46', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(313, 1, 9, 0, '29', '2017-04-11 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-11 11:06:57', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(314, 1, 9, 0, '30', '2017-04-11 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-11 11:08:41', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(315, 1, 9, 0, '31', '2017-04-11 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-11 11:20:04', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(316, 1, 9, 0, '32', '2017-04-11 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-11 11:27:34', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(317, 1, 9, 0, '33', '2017-04-11 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-11 11:29:29', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(318, 1, 9, 0, '34', '2017-04-11 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-11 11:34:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(319, 1, 9, 0, '35', '2017-04-11 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-11 11:35:31', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(320, 1, 9, 0, '36', '2017-04-11 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-11 11:39:58', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(321, 1, 9, 0, '37', '2017-04-11 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-11 11:44:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(322, 1, 9, 0, '38', '2017-04-11 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-11 11:46:45', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(323, 1, 9, 0, '39', '2017-04-11 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-11 11:50:43', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(324, 1, 9, 0, '40', '2017-04-11 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-11 11:51:54', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(325, 1, 9, 0, '41', '2017-04-11 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-11 11:52:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(326, 1, 9, 0, '42', '2017-04-11 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-11 11:52:34', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(327, 1, 9, 0, '43', '2017-04-11 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-11 12:00:20', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(328, 1, 9, 0, '44', '2017-04-11 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-11 12:03:57', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(329, 1, 9, 0, '45', '2017-04-11 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-11 12:04:12', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(330, 1, 9, 0, '46', '2017-04-11 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-11 12:05:52', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(331, 1, 9, 0, '47', '2017-04-11 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-11 12:10:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(332, 1, 9, 0, '48', '2017-04-11 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-11 12:17:10', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(333, 1, 9, 0, '49', '2017-04-11 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-11 12:23:28', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(334, 1, 9, 0, '50', '2017-04-11 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-11 12:25:17', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(335, 1, 9, 0, '51', '2017-04-11 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-11 12:27:25', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(336, 1, 9, 0, '52', '2017-04-11 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-11 12:30:25', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(337, 1, 9, 0, '53', '2017-04-11 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-11 12:31:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(338, 1, 9, 0, '54', '2017-04-11 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-11 12:49:35', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(339, 1, 9, 0, '55', '2017-04-11 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-11 12:52:58', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(340, 1, 9, 0, '56', '2017-04-11 00:00:00', '5.40', '0.00', '50.40', '0.00', 1, 0, 0, '50.40', '0.00', 1, 2, '', '2017-04-11 12:53:39', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(341, 1, 9, 0, '57', '2017-04-11 00:00:00', '4.80', '0.00', '44.80', '0.00', 1, 0, 0, '44.80', '0.00', 1, 2, '', '2017-04-11 12:54:59', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(342, 1, 3, 0, '58', '2017-04-11 00:00:00', '122.16', '0.00', '1140.16', '0.00', 1, 0, 0, '1140.16', '0.00', 1, 2, '', '2017-04-11 12:57:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(343, 1, 3, 0, '59', '2017-04-11 00:00:00', '122.16', '0.00', '1140.16', '0.00', 1, 0, 0, '1140.16', '0.00', 1, 2, '', '2017-04-11 13:04:16', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(344, 1, 3, 0, '60', '2017-04-11 00:00:00', '24.00', '0.00', '224.00', '0.00', 1, 0, 0, '224.00', '0.00', 1, 2, '', '2017-04-11 13:07:15', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(345, 1, 3, 0, '61', '2017-04-11 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-11 13:14:29', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(346, 1, 9, 0, '62', '2017-04-11 00:00:00', '62.40', '0.00', '522.40', '0.00', 1, 0, 0, '522.40', '0.00', 1, 2, '', '2017-04-11 13:20:40', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(347, 1, 9, 0, '63', '2017-04-11 00:00:00', '41.88', '0.00', '390.88', '0.00', 1, 0, 0, '390.88', '0.00', 1, 2, '', '2017-04-11 13:23:18', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(348, 1, 9, 0, '64', '2017-04-11 00:00:00', '10.61', '0.00', '99.00', '0.00', 1, 0, 0, '99.00', '0.00', 0, 2, '', '2017-04-11 13:41:44', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(349, 1, 3, 0, '1', '2017-04-12 00:00:00', '24.60', '0.00', '229.60', '0.00', 1, 0, 0, '229.60', '0.00', 1, 2, '', '2017-04-12 07:27:57', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(350, 1, 3, 0, '2', '2017-04-12 00:00:00', '37.80', '0.00', '352.80', '0.00', 1, 0, 0, '352.80', '0.00', 1, 2, '', '2017-04-12 13:31:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(351, 1, 3, 0, '3', '2017-04-12 00:00:00', '45.00', '0.00', '380.00', '0.00', 1, 0, 0, '380.00', '0.00', 1, 2, '', '2017-04-12 13:32:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(352, 1, 3, 0, '4', '2017-04-12 00:00:00', '50.28', '0.00', '469.28', '0.00', 1, 0, 0, '469.28', '0.00', 1, 2, '', '2017-04-12 13:38:04', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(353, 1, 3, 0, '5', '2017-04-12 00:00:00', '30.00', '0.00', '280.00', '0.00', 1, 0, 0, '280.00', '0.00', 1, 2, '', '2017-04-12 13:45:51', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(354, 1, 3, 0, '6', '2017-04-12 00:00:00', '48.00', '0.00', '448.00', '0.00', 1, 0, 0, '448.00', '0.00', 1, 2, '', '2017-04-12 13:50:23', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(355, 1, 3, 0, '7', '2017-04-12 00:00:00', '62.88', '0.00', '586.88', '0.00', 1, 0, 0, '586.88', '0.00', 1, 2, '', '2017-04-12 13:52:39', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(356, 1, 3, 0, '8', '2017-04-12 00:00:00', '30.00', '0.00', '280.00', '0.00', 1, 0, 0, '280.00', '0.00', 1, 2, '', '2017-04-12 13:55:04', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(357, 1, 3, 0, '9', '2017-04-12 00:00:00', '48.00', '0.00', '448.00', '0.00', 1, 0, 0, '448.00', '0.00', 1, 2, '', '2017-04-12 14:02:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(358, 1, 3, 0, '10', '2017-04-12 00:00:00', '39.00', '0.00', '364.00', '0.00', 1, 0, 0, '364.00', '0.00', 1, 2, '', '2017-04-12 14:43:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(359, 1, 9, 0, '1', '2017-04-13 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 0, 0, '162.40', '0.00', 1, 2, '', '2017-04-13 06:51:12', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(360, 1, 3, 0, '2', '2017-04-13 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-13 06:59:26', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(361, 1, 3, 0, '3', '2017-04-13 00:00:00', '170.40', '0.00', '1590.40', '54.00', 1, 1, 1, '1590.40', '0.00', 1, 2, '', '2017-04-13 08:08:44', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(362, 1, 9, 0, '4', '2017-04-13 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-13 14:37:51', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(363, 1, 9, 0, '5', '2017-04-13 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-13 14:45:10', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(364, 1, 3, 0, '6', '2017-04-13 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-13 14:45:52', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(365, 1, 3, 0, '7', '2017-04-13 00:00:00', '141.36', '0.00', '1319.36', '0.00', 1, 0, 0, '1319.36', '0.00', 1, 2, '', '2017-04-13 15:10:50', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(366, 1, 9, 7, '1', '2017-04-14 00:00:00', '4.80', '0.00', '44.80', '0.00', 1, 0, 0, '44.80', '0.00', 1, 3, '', '2017-04-14 06:13:51', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(367, 1, 9, 7, '2', '2017-04-14 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 1, 1, '67.20', '0.00', 1, 2, '', '2017-04-14 05:41:38', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(368, 1, 9, 0, '3', '2017-04-14 00:00:00', '24.60', '0.00', '229.60', '0.00', 1, 0, 0, '229.60', '0.00', 1, 2, '', '2017-04-14 05:43:31', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(369, 1, 3, 0, '4', '2017-04-14 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-14 05:59:33', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(370, 1, 3, 0, '5', '2017-04-14 00:00:00', '15.60', '0.00', '145.60', '0.00', 1, 1, 1, '145.60', '0.00', 1, 2, '', '2017-04-14 06:01:31', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(371, 1, 9, 0, '6', '2017-04-14 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-14 06:26:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(372, 1, 9, 0, '7', '2017-04-14 00:00:00', '14.28', '0.00', '133.28', '0.00', 1, 0, 0, '133.28', '0.00', 1, 2, '', '2017-04-14 06:28:23', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(373, 1, 9, 0, '8', '2017-04-14 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 1, 1, '67.20', '0.00', 1, 2, '', '2017-04-14 06:34:44', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(374, 1, 9, 0, '9', '2017-04-14 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-14 06:38:31', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(375, 1, 9, 0, '10', '2017-04-14 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-14 06:38:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(376, 1, 9, 0, '11', '2017-04-14 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-14 06:39:28', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(377, 1, 9, 0, '12', '2017-04-14 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-14 06:40:25', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(378, 1, 9, 0, '13', '2017-04-14 00:00:00', '5.40', '0.00', '50.40', '0.00', 1, 0, 0, '50.40', '0.00', 1, 2, '', '2017-04-14 06:57:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(379, 1, 9, 0, '14', '2017-04-14 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-14 06:58:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(380, 1, 9, 0, '15', '2017-04-14 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-14 07:04:59', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(381, 1, 9, 0, '16', '2017-04-14 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-14 07:08:53', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(382, 1, 9, 0, '17', '2017-04-14 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-14 07:13:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(383, 1, 9, 0, '18', '2017-04-14 00:00:00', '10.20', '0.00', '95.20', '0.00', 1, 0, 0, '95.20', '0.00', 1, 2, '', '2017-04-14 07:18:27', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(384, 1, 9, 0, '19', '2017-04-14 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-14 07:26:21', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(385, 1, 9, 0, '20', '2017-04-14 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-14 07:29:06', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(386, 1, 9, 0, '21', '2017-04-14 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-14 07:32:04', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(387, 1, 9, 0, '22', '2017-04-14 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-14 07:41:30', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(388, 1, 9, 0, '23', '2017-04-14 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-14 07:42:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(389, 1, 9, 0, '24', '2017-04-14 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-14 07:42:47', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(390, 1, 9, 0, '25', '2017-04-14 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-14 07:50:12', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(391, 1, 9, 0, '26', '2017-04-14 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-14 07:50:34', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(392, 1, 9, 0, '27', '2017-04-14 00:00:00', '33.60', '0.00', '313.60', '0.00', 1, 0, 0, '313.60', '0.00', 1, 2, '', '2017-04-14 07:58:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(393, 1, 9, 0, '28', '2017-04-14 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-14 07:58:58', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(394, 1, 9, 0, '29', '2017-04-14 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-14 08:04:47', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(395, 1, 9, 0, '30', '2017-04-14 00:00:00', '46.80', '0.00', '436.80', '0.00', 1, 0, 0, '436.80', '0.00', 1, 2, '', '2017-04-14 08:06:33', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(396, 1, 3, 0, '31', '2017-04-14 00:00:00', '5.40', '0.00', '50.40', '0.00', 1, 0, 0, '50.40', '0.00', 1, 2, '', '2017-04-14 09:15:48', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(397, 1, 3, 0, '32', '2017-04-14 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-14 09:16:17', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(398, 1, 3, 0, '33', '2017-04-14 00:00:00', '0.00', '0.00', '40.00', '0.00', 1, 0, 0, '40.00', '0.00', 1, 2, '', '2017-04-14 09:23:57', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(399, 1, 9, 0, '34', '2017-04-14 00:00:00', '16.61', '0.00', '195.00', '0.00', 1, 0, 0, '195.00', '0.00', 1, 2, '', '2017-04-14 09:45:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(400, 1, 9, 0, '35', '2017-04-14 00:00:00', '25.20', '0.00', '235.20', '0.00', 1, 0, 0, '235.20', '0.00', 1, 2, '', '2017-04-14 09:45:58', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(401, 1, 9, 0, '36', '2017-04-14 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '', '2017-04-14 09:46:37', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(402, 1, 8, 0, '1', '2017-04-15 00:00:00', '18.00', '0.00', '168.00', '0.00', 1, 0, 0, '168.00', '0.00', 1, 2, '', '2017-04-15 07:19:52', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(403, 1, 3, 0, '2', '2017-04-15 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-15 14:43:14', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(404, 1, 3, 0, '1', '2017-04-17 00:00:00', '292.20', '0.00', '2727.20', '0.00', 1, 0, 0, '2727.20', '0.00', 1, 2, '', '2017-04-17 05:29:48', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(405, 1, 3, 9, '2', '2017-04-17 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-17 07:50:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(406, 1, 3, 0, '3', '2017-04-17 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 0, 0, '162.40', '0.00', 1, 2, '', '2017-04-17 07:52:58', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(407, 1, 3, 0, '4', '2017-04-17 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-17 07:55:48', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(408, 1, 3, 0, '5', '2017-04-17 00:00:00', '345.60', '0.00', '94589.60', '0.00', 1, 0, 0, '94589.60', '0.00', 1, 2, '', '2017-04-17 14:26:54', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(409, 1, 3, 0, '6', '2017-04-17 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '', '2017-04-17 14:28:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(410, 1, 3, 0, '7', '2017-04-17 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '', '2017-04-17 14:30:35', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(411, 1, 3, 0, '8', '2017-04-17 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-17 14:31:53', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(412, 1, 3, 0, '9', '2017-04-17 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-17 14:34:41', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(413, 1, 3, 0, '10', '2017-04-17 00:00:00', '49.80', '0.00', '464.80', '0.00', 1, 0, 0, '464.80', '0.00', 1, 2, '', '2017-04-17 14:35:50', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(414, 1, 3, 0, '11', '2017-04-17 00:00:00', '48.00', '0.00', '448.00', '0.00', 1, 0, 0, '448.00', '0.00', 1, 2, '', '2017-04-17 14:38:35', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(415, 1, 9, 0, '1', '2017-04-18 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-18 06:01:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(416, 1, 9, 0, '2', '2017-04-18 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-18 06:04:59', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(417, 1, 9, 0, '3', '2017-04-18 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 2, '', '2017-04-18 06:06:30', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(418, 1, 9, 7, '4', '2017-04-18 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-18 06:29:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(419, 1, 9, 7, '5', '2017-04-18 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-18 06:30:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(420, 1, 3, 0, '6', '2017-04-18 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-18 07:29:40', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(421, 1, 9, 0, '7', '2017-04-18 00:00:00', '45.36', '0.00', '423.36', '0.00', 1, 0, 0, '423.36', '0.00', 1, 2, '', '2017-04-18 07:42:45', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(422, 1, 9, 0, '8', '2017-04-18 00:00:00', '15.60', '0.00', '145.60', '0.00', 1, 0, 0, '145.60', '0.00', 1, 2, '', '2017-04-18 09:10:24', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(423, 1, 9, 0, '9', '2017-04-18 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 0, 0, '162.40', '0.00', 1, 2, '', '2017-04-18 13:55:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(424, 1, 9, 0, '10', '2017-04-18 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '', '2017-04-18 13:57:42', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(425, 1, 9, 0, '11', '2017-04-18 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 0, 0, '162.40', '0.00', 1, 2, '', '2017-04-18 14:02:20', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(426, 1, 9, 0, '12', '2017-04-18 00:00:00', '27.60', '0.00', '257.60', '0.00', 1, 0, 0, '257.60', '0.00', 1, 2, '', '2017-04-18 14:14:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(427, 1, 9, 0, '13', '2017-04-18 00:00:00', '22.14', '0.00', '206.64', '20.50', 1, 0, 0, '206.64', '0.00', 1, 2, '', '2017-04-18 14:15:36', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(428, 1, 3, 0, '14', '2017-04-18 00:00:00', '24.84', '0.00', '231.84', '23.00', 1, 0, 0, '231.84', '0.00', 1, 2, '', '2017-04-18 14:18:27', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(429, 1, 3, 0, '15', '2017-04-18 00:00:00', '27.60', '0.00', '231.84', '25.76', 1, 0, 0, '231.84', '0.00', 1, 2, '', '2017-04-18 14:20:54', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(430, 1, 3, 0, '16', '2017-04-18 00:00:00', '27.60', '0.00', '231.84', '25.76', 1, 0, 0, '231.84', '0.00', 1, 2, '', '2017-04-18 14:24:12', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(431, 1, 3, 0, '1', '2017-04-19 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '', '2017-04-19 07:02:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(432, 1, 3, 0, '2', '2017-04-19 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-19 07:29:34', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(433, 1, 3, 0, '3', '2017-04-19 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-19 07:35:38', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(434, 1, 3, 0, '4', '2017-04-19 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-19 07:39:00', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(435, 1, 3, 0, '5', '2017-04-19 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-19 07:47:27', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(436, 1, 3, 0, '6', '2017-04-19 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-19 07:50:47', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(437, 1, 9, 0, '7', '2017-04-19 00:00:00', '16.80', '0.00', '156.80', '0.00', 1, 1, 1, '156.80', '0.00', 1, 2, '', '2017-04-19 10:30:28', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(438, 1, 9, 0, '8', '2017-04-19 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 1, 1, '112.00', '0.00', 1, 2, '', '2017-04-19 10:33:30', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(439, 1, 9, 0, '9', '2017-04-19 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-19 10:33:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(440, 1, 9, 0, '10', '2017-04-19 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-19 10:34:20', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(441, 1, 3, 0, '11', '2017-04-19 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 2, '', '2017-04-19 14:45:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(442, 1, 3, 0, '12', '2017-04-19 00:00:00', '12.00', '0.00', '112.00', '0.00', 2, 0, 0, '112.00', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010086586\",\"auth_code\":\"SIM344\",\"tvr\":\"0080048000\",\"tsi\":\"e800\"}', '2017-04-19 15:36:14', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(443, 1, 3, 0, '13', '2017-04-19 00:00:00', '17.40', '0.00', '162.40', '0.00', 2, 0, 0, '162.40', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010086587\",\"auth_code\":\"SIM345\",\"tvr\":\"0080048000\",\"tsi\":\"e800\"}', '2017-04-19 15:39:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(444, 1, 9, 0, '1', '2017-04-20 00:00:00', '100.44', '0.00', '937.44', '0.00', 1, 0, 0, '937.44', '0.00', 1, 2, '', '2017-04-20 14:08:29', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(445, 1, 9, 0, '2', '2017-04-20 00:00:00', '38.40', '0.00', '358.40', '0.00', 1, 0, 0, '358.40', '0.00', 1, 2, '', '2017-04-20 14:34:38', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(446, 1, 9, 0, '3', '2017-04-20 00:00:00', '48.00', '0.00', '448.00', '0.00', 1, 0, 0, '448.00', '0.00', 1, 2, '', '2017-04-20 14:35:15', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(447, 1, 9, 0, '4', '2017-04-20 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-20 14:49:21', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(448, 1, 3, 0, '5', '2017-04-20 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-20 14:50:51', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(449, 1, 3, 0, '1', '2017-04-21 00:00:00', '12.00', '0.00', '112.00', '0.00', 2, 1, 0, '112.00', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010087242\",\"auth_code\":\"000030\",\"tvr\":\"0080048000\",\"tsi\":\"e800\"}', '2017-04-21 13:09:57', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(450, 1, 9, 0, '2', '2017-04-21 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 1, 1, '117.60', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010087264\",\"auth_code\":\"000048\",\"tvr\":\"0080048000\",\"tsi\":\"e800\"}', '2017-04-21 15:10:24', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(451, 1, 9, 0, '3', '2017-04-21 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 1, 0, '117.60', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010087265\",\"auth_code\":\"000049\",\"tvr\":\"0080048000\",\"tsi\":\"e800\"}', '2017-04-21 15:17:10', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(452, 1, 9, 0, '4', '2017-04-21 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 1, 1, '162.40', '0.00', 1, 2, '', '2017-04-21 15:24:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(453, 1, 9, 0, '5', '2017-04-21 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-21 15:41:49', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(454, 22, 28, 0, '1', '2017-04-21 00:00:00', '0.00', '0.00', '200.00', '0.00', 1, 0, 0, '200.00', '0.00', 1, 2, '', '2017-04-21 15:57:32', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(455, 1, 3, 0, '6', '2017-04-21 00:00:00', '19.20', '0.00', '179.20', '0.00', 2, 0, 0, '179.20', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010087267\",\"auth_code\":\"000051\",\"tvr\":\"0000048000\",\"tsi\":\"e800\"}', '2017-04-21 15:57:36', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(456, 1, 3, 0, '7', '2017-04-21 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 1, 1, '117.60', '0.00', 1, 2, '', '2017-04-21 16:10:14', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(457, 1, 3, 0, '8', '2017-04-21 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 1, 1, '162.40', '0.00', 1, 2, '', '2017-04-21 16:32:31', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(458, 1, 3, 0, '9', '2017-04-21 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 1, 1, '162.40', '0.00', 1, 2, '', '2017-04-21 16:33:39', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(459, 1, 3, 0, '10', '2017-04-21 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 1, 1, '162.40', '0.00', 1, 2, '', '2017-04-21 16:35:45', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(460, 1, 3, 0, '11', '2017-04-21 00:00:00', '24.60', '0.00', '229.60', '0.00', 1, 1, 1, '229.60', '0.00', 1, 2, '', '2017-04-21 16:36:25', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(461, 1, 3, 0, '12', '2017-04-21 00:00:00', '24.60', '0.00', '229.60', '0.00', 1, 1, 1, '229.60', '0.00', 1, 2, '', '2017-04-21 16:38:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(462, 1, 3, 0, '13', '2017-04-21 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 1, 1, '162.40', '0.00', 1, 2, '', '2017-04-21 16:40:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(463, 22, 28, 0, '1', '2017-04-22 00:00:00', '0.00', '0.00', '48.60', '9.40', 1, 0, 0, '48.60', '0.00', 1, 2, '', '2017-04-22 13:01:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(464, 1, 9, 0, '1', '2017-04-24 00:00:00', '12.60', '0.00', '117.60', '0.00', 2, 0, 0, '117.60', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010087479\",\"auth_code\":\"000027\",\"tvr\":\"000004e000\",\"tsi\":\"e800\"}', '2017-04-24 10:54:58', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(465, 1, 9, 0, '2', '2017-04-24 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-24 11:01:27', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(466, 1, 9, 0, '3', '2017-04-24 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 2, '', '2017-04-24 11:06:48', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(467, 1, 9, 0, '4', '2017-04-24 00:00:00', '25.08', '0.00', '234.08', '0.00', 2, 0, 0, '234.08', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010087502\",\"auth_code\":\"000046\",\"tvr\":\"000004e000\",\"tsi\":\"e800\"}', '2017-04-24 11:18:49', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(468, 1, 9, 0, '5', '2017-04-24 00:00:00', '8.40', '0.00', '78.40', '0.00', 1, 0, 0, '78.40', '0.00', 1, 2, '', '2017-04-24 11:38:45', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(469, 1, 3, 0, '6', '2017-04-24 00:00:00', '7.20', '0.00', '67.20', '0.00', 3, 0, 0, '67.20', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"paymentid\":\"pay_7idXIyAnqHzLYu\"}', '2017-04-24 13:23:33', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(470, 1, 9, 0, '7', '2017-04-24 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '', '2017-04-24 16:19:41', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(471, 1, 3, 0, '1', '2017-04-25 00:00:00', '12.60', '0.00', '117.60', '0.00', 2, 0, 0, '117.60', '0.00', 1, 4, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010087690\",\"auth_code\":\"000113\",\"tvr\":\"0000048000\",\"tsi\":\"e800\"}', '2017-04-25 12:23:41', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(472, 1, 9, 0, '2', '2017-04-25 00:00:00', '12.60', '0.00', '117.60', '0.00', 2, 0, 0, '117.60', '0.00', 1, 4, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010087692\",\"auth_code\":\"000115\",\"tvr\":\"0000048000\",\"tsi\":\"e800\"}', '2017-04-25 15:32:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(473, 1, 9, 0, '3', '2017-04-25 00:00:00', '70.20', '0.00', '655.20', '0.00', 2, 0, 0, '655.20', '0.00', 1, 4, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010087693\",\"auth_code\":\"000116\",\"tvr\":\"0000048000\",\"tsi\":\"e800\"}', '2017-04-25 15:32:35', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(474, 1, 3, 0, '4', '2017-04-25 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 4, 'null', '2017-04-25 15:32:36', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(475, 1, 3, 7, '5', '2017-04-25 00:00:00', '14.40', '0.00', '134.40', '0.00', 1, 0, 0, '134.40', '0.00', 1, 4, '[]', '2017-04-25 15:32:40', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(476, 1, 3, 10, '6', '2017-04-25 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 0, 0, '162.40', '0.00', 1, 4, '[]', '2017-04-25 15:32:46', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(477, 1, 3, 16, '7', '2017-04-25 00:00:00', '24.60', '0.00', '229.60', '0.00', 1, 1, 0, '229.60', '0.00', 1, 2, 'null', '2017-04-25 12:05:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(478, 1, 3, 7, '8', '2017-04-25 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 1, 0, '162.40', '0.00', 1, 2, 'null', '2017-04-25 12:09:54', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(479, 1, 3, 27, '9', '2017-04-25 00:00:00', '22.80', '0.00', '212.80', '0.00', 1, 1, 0, '212.80', '0.00', 1, 2, '[]', '2017-04-25 12:29:19', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1);
INSERT INTO `pos_sales_order` (`sales_order_id`, `company_id`, `employee_id`, `customer_id`, `sales_order_no`, `sales_order_date`, `tax_amount`, `subtotal_amount`, `final_amount`, `discount_amount`, `payment_method_id`, `payment_split`, `payment_split_type`, `paid_amount`, `remaining_amount`, `sales_order_payment_status_id`, `sales_order_status_id`, `payment_response`, `update_date`, `location_id`, `table_id`, `floor_id`, `sales_order_type_id`, `created_at`, `updated_at`, `order_from_id`) VALUES
(480, 1, 3, 14, '10', '2017-04-25 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '[]', '2017-04-25 12:46:47', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(481, 1, 3, 10, '11', '2017-04-25 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '[]', '2017-04-25 12:51:01', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(482, 1, 3, 9, '12', '2017-04-25 00:00:00', '15.60', '0.00', '145.60', '0.00', 3, 0, 0, '145.60', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"paymentid\":\"pay_7j1bpF9qhVNsgj\"}', '2017-04-25 12:56:30', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(483, 1, 3, 9, '13', '2017-04-25 00:00:00', '15.60', '0.00', '145.60', '0.00', 1, 0, 0, '145.60', '0.00', 1, 2, '[]', '2017-04-25 13:04:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(484, 1, 3, 14, '14', '2017-04-25 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 0, 0, '162.40', '0.00', 1, 2, '[]', '2017-04-25 13:15:26', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(485, 1, 3, 9, '15', '2017-04-25 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '[]', '2017-04-25 13:18:32', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(486, 1, 3, 9, '16', '2017-04-25 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '[]', '2017-04-25 13:19:35', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(487, 1, 3, 10, '17', '2017-04-25 00:00:00', '35.28', '0.00', '329.28', '0.00', 1, 0, 0, '329.28', '0.00', 1, 2, '[]', '2017-04-25 13:25:36', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(488, 1, 3, 14, '18', '2017-04-25 00:00:00', '24.60', '0.00', '229.60', '0.00', 1, 0, 0, '229.60', '0.00', 1, 2, '[]', '2017-04-25 13:28:06', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(489, 1, 9, 9, '19', '2017-04-25 00:00:00', '17.40', '0.00', '162.40', '0.00', 1, 0, 0, '162.40', '0.00', 1, 2, '[]', '2017-04-25 14:03:18', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(490, 1, 9, 7, '20', '2017-04-25 00:00:00', '5.40', '0.00', '50.40', '0.00', 1, 0, 0, '50.40', '0.00', 1, 2, '[]', '2017-04-25 14:34:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(491, 1, 3, 9, '21', '2017-04-25 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 1, 0, '117.60', '0.00', 1, 2, '[]', '2017-04-25 15:06:14', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(492, 1, 3, 9, '22', '2017-04-25 00:00:00', '43.20', '0.00', '403.20', '0.00', 1, 0, 0, '403.20', '0.00', 1, 2, '[]', '2017-04-25 15:08:34', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(493, 1, 3, 9, '23', '2017-04-25 00:00:00', '0.00', '0.00', '1200.00', '0.00', 1, 0, 0, '1200.00', '0.00', 1, 2, '[]', '2017-04-25 15:10:51', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(494, 1, 9, 7, '24', '2017-04-25 00:00:00', '5.40', '0.00', '50.40', '0.00', 1, 0, 0, '50.40', '0.00', 1, 4, '[]', '2017-04-25 15:32:50', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(495, 1, 9, 7, '25', '2017-04-25 00:00:00', '27.60', '0.00', '257.60', '0.00', 1, 0, 0, '257.60', '0.00', 1, 2, '[]', '2017-04-25 15:29:11', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(496, 1, 9, 7, '26', '2017-04-25 00:00:00', '5.40', '0.00', '50.40', '0.00', 1, 0, 0, '50.40', '0.00', 1, 2, '[]', '2017-04-25 15:37:39', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(497, 1, 3, 14, '27', '2017-04-25 00:00:00', '7.20', '0.00', '67.20', '0.00', 3, 0, 0, '67.20', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"paymentid\":\"pay_7j6SiWFq9bkwi7\"}', '2017-04-25 17:41:19', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(498, 1, 9, 7, '1', '2017-04-26 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 4, '[]', '2017-04-26 07:52:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(499, 1, 9, 7, '2', '2017-04-26 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 4, '[]', '2017-04-26 07:52:11', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(500, 1, 9, 7, '3', '2017-04-26 00:00:00', '5.40', '0.00', '50.40', '0.00', 1, 0, 0, '50.40', '0.00', 1, 4, '[]', '2017-04-26 07:52:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(501, 1, 9, 7, '4', '2017-04-26 00:00:00', '4.80', '0.00', '44.80', '0.00', 1, 0, 0, '44.80', '0.00', 1, 4, '', '2017-04-26 07:52:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(502, 1, 9, 7, '5', '2017-04-26 00:00:00', '5.40', '0.00', '50.40', '0.00', 1, 0, 0, '50.40', '0.00', 1, 4, '[]', '2017-04-26 07:52:15', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(503, 1, 9, 7, '6', '2017-04-26 00:00:00', '5.40', '0.00', '50.40', '0.00', 1, 0, 0, '50.40', '0.00', 1, 4, '[]', '2017-04-26 07:52:16', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(504, 1, 9, 9, '7', '2017-04-26 00:00:00', '12.60', '0.00', '117.60', '0.00', 3, 0, 0, '117.60', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"paymentid\":\"pay_7jKen0MOaGN7Kg\"}', '2017-04-26 07:34:28', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(505, 1, 9, 9, '8', '2017-04-26 00:00:00', '40.08', '0.00', '374.08', '0.00', 1, 1, 0, '374.08', '0.00', 1, 2, '[]', '2017-04-26 07:47:53', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(506, 1, 9, 9, '9', '2017-04-26 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 4, '[]', '2017-04-26 11:44:46', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(507, 1, 9, 9, '10', '2017-04-26 00:00:00', '7.20', '0.00', '67.20', '0.00', 1, 0, 0, '67.20', '0.00', 1, 4, '[]', '2017-04-26 11:45:05', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(508, 1, 9, 7, '11', '2017-04-26 00:00:00', '15.48', '0.00', '144.48', '0.00', 1, 0, 0, '144.48', '0.00', 1, 4, '[]', '2017-04-26 11:44:50', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(509, 1, 3, 9, '12', '2017-04-26 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 3, '[]', '2017-04-26 11:44:31', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(510, 1, 3, 9, '13', '2017-04-26 00:00:00', '20.28', '0.00', '189.28', '0.00', 1, 0, 0, '189.28', '0.00', 1, 4, '[]', '2017-04-26 12:47:33', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(511, 1, 3, 9, '14', '2017-04-26 00:00:00', '25.20', '0.00', '235.20', '0.00', 1, 0, 0, '235.20', '0.00', 1, 2, '[]', '2017-04-26 09:30:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(512, 1, 3, 9, '15', '2017-04-26 00:00:00', '19.80', '0.00', '184.80', '0.00', 1, 0, 0, '184.80', '0.00', 1, 2, '[]', '2017-04-26 09:39:40', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(513, 1, 3, 9, '16', '2017-04-26 00:00:00', '33.48', '0.00', '312.48', '0.00', 1, 0, 0, '312.48', '0.00', 1, 2, '[]', '2017-04-26 09:40:08', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(514, 1, 9, 9, '17', '2017-04-26 00:00:00', '-19.80', '0.00', '-184.80', '330.00', 1, 0, 0, '-184.80', '0.00', 1, 2, '[]', '2017-04-26 12:24:12', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(515, 1, 9, 16, '18', '2017-04-26 00:00:00', '-25.20', '0.00', '-235.20', '420.00', 1, 0, 0, '-235.20', '0.00', 1, 2, '[]', '2017-04-26 12:28:51', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(516, 1, 9, 9, '19', '2017-04-26 00:00:00', '-12.60', '0.00', '-117.60', '210.00', 1, 0, 0, '-117.60', '0.00', 1, 2, '[]', '2017-04-26 12:37:04', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(517, 1, 9, 9, '20', '2017-04-26 00:00:00', '31.80', '0.00', '296.80', '0.00', 1, 0, 0, '296.80', '0.00', 1, 2, '[]', '2017-04-26 12:44:10', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(518, 1, 9, 14, '21', '2017-04-26 00:00:00', '44.40', '0.00', '414.40', '0.00', 1, 0, 0, '414.40', '0.00', 1, 2, '[]', '2017-04-26 12:44:58', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(519, 1, 3, 11, '22', '2017-04-26 00:00:00', '26.28', '0.00', '5325.28', '0.00', 1, 0, 0, '5325.28', '0.00', 1, 2, '[]', '2017-04-26 14:21:08', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(520, 1, 9, 9, '23', '2017-04-26 00:00:00', '88.20', '0.00', '823.20', '0.00', 1, 0, 0, '823.20', '0.00', 1, 2, '[]', '2017-04-26 14:24:45', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(521, 1, 9, 14, '24', '2017-04-26 00:00:00', '16.80', '0.00', '156.80', '0.00', 1, 0, 0, '156.80', '0.00', 1, 2, '[]', '2017-04-26 14:25:32', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(522, 1, 3, 16, '1', '2017-04-27 00:00:00', '19.20', '0.00', '179.20', '0.00', 2, 0, 0, '179.20', '0.00', 1, 3, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088228\",\"auth_code\":\"000013\",\"tvr\":\"0080048000\",\"tsi\":\"e800\"}', '2017-04-27 10:20:36', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(523, 1, 3, 16, '2', '2017-04-27 00:00:00', '19.20', '0.00', '179.20', '0.00', 2, 0, 0, '179.20', '0.00', 1, 3, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088230\",\"auth_code\":\"000015\",\"tvr\":\"0080048000\",\"tsi\":\"e800\"}', '2017-04-27 10:33:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(524, 1, 3, 14, '3', '2017-04-27 00:00:00', '8.40', '0.00', '78.40', '0.00', 2, 1, 0, '78.40', '0.00', 1, 3, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088234\",\"auth_code\":\"000019\",\"tvr\":\"0080040000\",\"tsi\":\"e800\"}', '2017-04-27 14:01:35', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(525, 1, 3, 9, '4', '2017-04-27 00:00:00', '12.60', '0.00', '117.60', '0.00', 2, 1, 0, '117.60', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088248\",\"auth_code\":\"000027\",\"tvr\":\"0080048000\",\"tsi\":\"e800\"}', '2017-04-27 05:21:51', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(526, 1, 3, 9, '5', '2017-04-27 00:00:00', '7.20', '0.00', '67.20', '0.00', 2, 0, 0, '67.20', '0.00', 1, 3, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088254\",\"auth_code\":\"000033\",\"tvr\":\"0080040000\",\"tsi\":\"e800\"}', '2017-04-27 14:02:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(527, 1, 3, 9, '6', '2017-04-27 00:00:00', '12.00', '0.00', '112.00', '0.00', 1, 0, 0, '112.00', '0.00', 1, 2, '[]', '2017-04-27 06:24:39', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(528, 1, 3, 9, '7', '2017-04-27 00:00:00', '12.00', '0.00', '112.00', '0.00', 3, 0, 0, '112.00', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"paymentid\":\"pay_7jjPerzF4aPHhs\"}', '2017-04-27 07:49:41', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(529, 1, 3, 9, '8', '2017-04-27 00:00:00', '12.00', '0.00', '112.00', '0.00', 3, 0, 0, '112.00', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"paymentid\":\"pay_7jjVVddz91oXHX\"}', '2017-04-27 07:53:37', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(530, 1, 3, 0, '9', '2017-04-27 00:00:00', '11.88', '0.00', '110.88', '0.00', 2, 0, 0, '110.88', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088373\",\"auth_code\":\"000122\",\"tvr\":\"0000048000\",\"tsi\":\"e800\"}', '2017-04-27 08:08:05', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(531, 1, 3, 0, '10', '2017-04-27 00:00:00', '22.80', '0.00', '212.80', '0.00', 1, 0, 0, '212.80', '0.00', 1, 2, '[]', '2017-04-27 18:21:01', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(532, 1, 3, 0, '11', '2017-04-27 00:00:00', '12.60', '0.00', '117.60', '0.00', 1, 0, 0, '117.60', '0.00', 1, 2, '[]', '2017-04-27 18:23:27', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(533, 1, 3, 0, '1', '2017-04-28 00:00:00', '19.20', '0.00', '179.20', '0.00', 2, 0, 0, '179.20', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088775\",\"auth_code\":\"000092\",\"tvr\":\"0000048000\",\"tsi\":\"e800\"}', '2017-04-28 09:01:25', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(534, 1, 3, 0, '2', '2017-04-28 00:00:00', '17.40', '0.00', '162.40', '0.00', 2, 0, 0, '162.40', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088776\",\"auth_code\":\"000093\",\"tvr\":\"0000048000\",\"tsi\":\"e800\"}', '2017-04-28 09:03:12', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(535, 1, 3, 0, '3', '2017-04-28 00:00:00', '17.40', '0.00', '162.40', '0.00', 2, 0, 0, '162.40', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088779\",\"auth_code\":\"000094\",\"tvr\":\"0000048000\",\"tsi\":\"e800\"}', '2017-04-28 09:10:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(536, 1, 3, 0, '4', '2017-04-28 00:00:00', '17.40', '0.00', '162.40', '0.00', 2, 0, 0, '162.40', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088780\",\"auth_code\":\"000095\",\"tvr\":\"0000048000\",\"tsi\":\"e800\"}', '2017-04-28 09:15:50', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(537, 1, 3, 0, '5', '2017-04-28 00:00:00', '14.79', '0.00', '138.04', '21.75', 1, 0, 0, '138.04', '0.00', 1, 2, '[]', '2017-04-28 09:17:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(538, 1, 3, 0, '6', '2017-04-28 00:00:00', '24.60', '0.00', '229.60', '0.00', 1, 0, 0, '229.60', '0.00', 1, 2, '[]', '2017-04-28 09:24:24', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(539, 1, 3, 0, '7', '2017-04-28 00:00:00', '19.80', '0.00', '184.80', '0.00', 1, 0, 0, '184.80', '0.00', 1, 2, '[]', '2017-04-28 09:29:28', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(540, 1, 3, 0, '8', '2017-04-28 00:00:00', '30.09', '0.00', '280.84', '44.25', 1, 0, 0, '280.84', '0.00', 1, 2, '[]', '2017-04-28 09:43:51', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(541, 1, 3, 0, '9', '2017-04-28 00:00:00', '24.60', '0.00', '229.60', '0.00', 1, 0, 0, '229.60', '0.00', 1, 2, '[]', '2017-04-28 09:52:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(542, 1, 3, 0, '10', '2017-04-28 00:00:00', '22.14', '0.00', '206.64', '20.50', 1, 0, 0, '206.64', '0.00', 1, 2, '[]', '2017-04-28 09:53:30', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(543, 1, 3, 0, '11', '2017-04-28 00:00:00', '14.28', '0.00', '133.28', '0.00', 2, 0, 0, '133.28', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"rr_no\":\"711815322993\",\"auth_code\":\"017405\",\"tvr\":\"0080040000\",\"tsi\":\"f800\"}', '2017-04-28 10:04:44', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(544, 1, 3, 0, '12', '2017-04-28 00:00:00', '5.40', '0.00', '50.40', '0.00', 2, 0, 0, '50.40', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"rr_no\":\"711815323804\",\"auth_code\":\"016268\",\"tvr\":\"\",\"tsi\":\"\"}', '2017-04-28 10:09:25', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(545, 1, 3, 0, '13', '2017-04-28 00:00:00', '26.81', '0.00', '250.20', '0.00', 1, 0, 0, '250.20', '0.00', 1, 2, '[]', '2017-04-28 10:51:47', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(546, 1, 3, 0, '14', '2017-04-28 00:00:00', '48.60', '0.00', '453.60', '0.00', 1, 0, 0, '453.60', '0.00', 1, 2, '[]', '2017-04-28 11:06:32', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(547, 1, 3, 0, '15', '2017-04-28 00:00:00', '24.60', '0.00', '229.60', '0.00', 1, 0, 0, '229.60', '0.00', 1, 2, '[]', '2017-04-28 11:12:05', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(548, 1, 9, 0, '16', '2017-04-28 00:00:00', '40.68', '0.00', '379.68', '0.00', 1, 0, 0, '379.68', '0.00', 1, 2, '[]', '2017-04-28 11:23:39', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(549, 1, 9, 0, '17', '2017-04-28 00:00:00', '17.40', '0.00', '162.40', '0.00', 2, 0, 0, '162.40', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"rr_no\":\"711817337448\",\"auth_code\":\"024265\",\"tvr\":\"0000046000\",\"tsi\":\"f800\"}', '2017-04-28 11:38:00', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(550, 1, 9, 0, '18', '2017-04-28 00:00:00', '12.00', '0.00', '112.00', '0.00', 2, 0, 0, '112.00', '0.00', 1, 2, '{\"payment_status\":\"Approved\",\"rr_no\":\"711817338787\",\"auth_code\":\"025140\",\"tvr\":\"0000046000\",\"tsi\":\"f800\"}', '2017-04-28 11:46:00', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(551, 1, 3, 0, '19', '2017-04-28 00:00:00', '24.60', '0.00', '229.60', '0.00', 1, 0, 0, '229.60', '0.00', 1, 2, '[]', '2017-04-28 12:03:36', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(552, 1, 3, 0, '20', '2017-04-28 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '[]', '2017-04-28 12:04:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(553, 1, 3, 0, '21', '2017-04-28 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '[]', '2017-04-28 12:09:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(554, 1, 3, 0, '22', '2017-04-28 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '[]', '2017-04-28 12:11:33', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(555, 1, 3, 0, '23', '2017-04-28 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '[]', '2017-04-28 12:17:53', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(556, 1, 3, 0, '24', '2017-04-28 00:00:00', '19.20', '0.00', '179.20', '0.00', 1, 0, 0, '179.20', '0.00', 1, 2, '[]', '2017-04-28 12:37:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(557, 1, 3, 0, '25', '2017-04-28 00:00:00', '24.60', '0.00', '229.60', '0.00', 1, 0, 0, '229.60', '0.00', 1, 2, '[]', '2017-04-28 12:56:30', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(558, 1, 3, 0, '26', '2017-04-28 00:00:00', '24.60', '0.00', '230.00', '0.00', 1, 0, 0, '230.00', '0.00', 1, 2, '[]', '2017-04-28 13:01:21', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(559, 1, 3, 0, '27', '2017-04-28 00:00:00', '31.20', '0.00', '251.00', '0.00', 1, 0, 0, '251.00', '0.00', 1, 2, '[]', '2017-04-28 13:42:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(560, 1, 3, 0, '28', '2017-04-28 00:00:00', '31.20', '0.00', '291.00', '0.00', 1, 0, 0, '291.00', '0.00', 1, 2, '[]', '2017-04-28 13:54:50', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(561, 1, 9, 0, '1', '2017-05-01 00:00:00', '0.38', '0.00', '4.00', '156.80', 1, 0, 0, '4.00', '0.00', 1, 2, '[]', '2017-05-01 08:01:46', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(562, 1, 9, 0, '2', '2017-05-01 00:00:00', '0.00', '0.00', '40.00', '0.00', 2, 0, 0, '40.00', '0.00', 1, 4, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088959\",\"auth_code\":\"000206\",\"tvr\":\"0000046000\",\"tsi\":\"e800\"}', '2017-05-01 11:34:14', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(563, 1, 9, 0, '3', '2017-05-01 00:00:00', '0.00', '0.00', '2.00', '98.00', 2, 0, 0, '2.00', '0.00', 1, 4, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088960\",\"auth_code\":\"000207\",\"tvr\":\"0000046000\",\"tsi\":\"e800\"}', '2017-05-01 11:34:25', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(564, 1, 9, 0, '4', '2017-05-01 00:00:00', '0.00', '0.00', '2.00', '98.00', 2, 0, 0, '2.00', '0.00', 1, 4, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088962\",\"auth_code\":\"000209\",\"tvr\":\"0000046000\",\"tsi\":\"e800\"}', '2017-05-01 11:44:45', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(565, 1, 9, 0, '5', '2017-05-01 00:00:00', '0.00', '0.00', '2.00', '98.00', 2, 0, 0, '2.00', '0.00', 1, 4, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088963\",\"auth_code\":\"000210\",\"tvr\":\"0000046000\",\"tsi\":\"e800\"}', '2017-05-01 11:36:44', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(566, 1, 9, 0, '6', '2017-05-01 00:00:00', '0.00', '0.00', '2.00', '98.00', 2, 0, 0, '2.00', '0.00', 1, 4, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088964\",\"auth_code\":\"000211\",\"tvr\":\"0000046000\",\"tsi\":\"e800\"}', '2017-05-01 11:34:42', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(567, 1, 9, 0, '7', '2017-05-01 00:00:00', '0.00', '0.00', '2.00', '98.00', 2, 0, 0, '2.00', '0.00', 1, 4, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088965\",\"auth_code\":\"000212\",\"tvr\":\"0000046000\",\"tsi\":\"e800\"}', '2017-05-01 11:38:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(568, 1, 9, 0, '8', '2017-05-01 00:00:00', '0.00', '0.00', '2.00', '98.00', 2, 0, 0, '2.00', '0.00', 1, 4, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088966\",\"auth_code\":\"000213\",\"tvr\":\"0000046000\",\"tsi\":\"e800\"}', '2017-05-01 11:38:10', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(569, 1, 9, 0, '9', '2017-05-01 00:00:00', '0.00', '0.00', '2.00', '98.00', 2, 0, 0, '2.00', '0.00', 1, 4, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088967\",\"auth_code\":\"000214\",\"tvr\":\"0000046000\",\"tsi\":\"e800\"}', '2017-05-01 11:38:27', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(570, 1, 9, 0, '10', '2017-05-01 00:00:00', '0.00', '0.00', '2.00', '98.00', 2, 0, 0, '2.00', '0.00', 1, 4, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088968\",\"auth_code\":\"000215\",\"tvr\":\"0000046000\",\"tsi\":\"e800\"}', '2017-05-01 11:44:53', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(571, 1, 9, 0, '11', '2017-05-01 00:00:00', '0.00', '0.00', '2.00', '98.00', 2, 0, 0, '2.00', '0.00', 1, 4, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088970\",\"auth_code\":\"000216\",\"tvr\":\"0000046000\",\"tsi\":\"e800\"}', '2017-05-01 11:35:30', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(572, 1, 9, 0, '12', '2017-05-01 00:00:00', '0.00', '0.00', '2.00', '98.10', 2, 0, 0, '2.00', '0.00', 1, 4, '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088971\",\"auth_code\":\"000217\",\"tvr\":\"0000046000\",\"tsi\":\"e800\"}', '2017-05-01 11:34:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(573, 1, 9, 0, '13', '2017-05-01 00:00:00', '0.00', '0.00', '105.00', '0.00', 1, 1, 0, '105.00', '0.00', 1, 4, '[]', '2017-05-01 14:03:23', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(574, 1, 3, 0, '1', '2017-05-03 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 3, '', '2017-05-01 14:36:15', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(575, 1, 3, 0, '2', '2017-05-03 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 2, '[]', '2017-05-01 14:49:29', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(576, 1, 3, 0, '14', '2017-05-01 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 2, '[]', '2017-05-01 16:47:59', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(577, 1, 3, 0, '15', '2017-05-01 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 2, '[]', '2017-05-01 16:50:00', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(578, 1, 3, 0, '16', '2017-05-01 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 2, '[]', '2017-05-01 16:56:08', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(579, 1, 3, 0, '17', '2017-05-01 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 2, '[]', '2017-05-01 16:58:23', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(580, 1, 3, 0, '18', '2017-05-01 00:00:00', '0.00', '0.00', '130.00', '0.00', 1, 0, 0, '130.00', '0.00', 1, 2, '[]', '2017-05-01 17:01:51', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(581, 1, 9, 0, '1', '2017-05-02 00:00:00', '0.00', '0.00', '160.00', '0.00', 1, 0, 0, '160.00', '0.00', 1, 4, '[]', '2017-05-02 11:04:15', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(582, 1, 9, 0, '2', '2017-05-02 00:00:00', '0.00', '0.00', '169.00', '0.00', 1, 0, 0, '169.00', '0.00', 1, 4, '[]', '2017-05-02 11:04:17', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(583, 1, 9, 0, '3', '2017-05-02 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 4, '[]', '2017-05-02 07:50:51', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(584, 1, 9, 0, '4', '2017-05-02 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 4, '[]', '2017-05-02 07:50:58', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(585, 1, 9, 0, '5', '2017-05-02 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 4, '[]', '2017-05-02 07:50:54', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(586, 1, 9, 0, '6', '2017-05-02 00:00:00', '0.00', '0.00', '99.00', '0.00', 1, 0, 0, '99.00', '0.00', 1, 4, '[]', '2017-05-02 11:04:20', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(587, 1, 9, 0, '7', '2017-05-02 00:00:00', '0.00', '0.00', '99.00', '0.00', 1, 0, 0, '99.00', '0.00', 1, 4, '', '2017-05-02 11:04:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(588, 1, 9, 0, '8', '2017-05-02 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 4, '[]', '2017-05-02 11:04:47', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(589, 1, 9, 0, '9', '2017-05-02 00:00:00', '0.00', '0.00', '210.00', '0.00', 1, 0, 0, '210.00', '0.00', 1, 4, '[]', '2017-05-02 15:21:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(590, 1, 9, 0, '3', '2017-05-03 00:00:00', '0.00', '0.00', '160.00', '0.00', 1, 0, 0, '160.00', '0.00', 1, 2, '[]', '2017-05-03 07:03:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(591, 1, 9, 0, '1', '2017-05-04 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 0, 4, '', '2017-05-04 10:13:28', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(592, 1, 9, 0, '1', '2017-05-05 00:00:00', '0.00', '0.00', '508.00', '0.00', 1, 0, 0, '508.00', '0.00', 1, 2, '[]', '2017-05-05 09:04:36', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(593, 1, 9, 0, '1', '2017-05-08 00:00:00', '0.00', '0.00', '100.00', '0.00', 1, 0, 0, '100.00', '0.00', 1, 4, '[]', '2017-05-08 10:33:39', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(594, 1, 9, 0, '2', '2017-05-08 00:00:00', '0.00', '0.00', '160.00', '0.00', 1, 1, 1, '160.00', '0.00', 1, 4, '[]', '2017-05-08 10:33:47', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(595, 1, 9, 0, '3', '2017-05-08 00:00:00', '0.00', '0.00', '160.00', '0.00', 1, 0, 0, '160.00', '0.00', 1, 4, '[]', '2017-05-08 10:35:19', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(596, 1, 9, 7, '4', '2017-05-08 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 4, '[]', '2017-05-08 10:35:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(597, 1, 9, 0, '5', '2017-05-08 00:00:00', '0.00', '0.00', '40.00', '0.00', 1, 0, 0, '40.00', '0.00', 1, 4, '[]', '2017-05-08 10:59:05', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(598, 1, 9, 0, '6', '2017-05-08 00:00:00', '0.00', '0.00', '160.00', '0.00', 1, 0, 0, '160.00', '0.00', 1, 4, '[]', '2017-05-08 10:59:35', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(599, 1, 9, 0, '7', '2017-05-08 00:00:00', '0.00', '0.00', '140.00', '0.00', 1, 0, 0, '140.00', '0.00', 1, 4, '[]', '2017-05-08 10:59:40', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(600, 1, 9, 0, '8', '2017-05-08 00:00:00', '0.00', '0.00', '100.00', '0.00', 1, 0, 0, '100.00', '0.00', 1, 4, '[]', '2017-05-08 11:00:05', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(601, 1, 9, 0, '9', '2017-05-08 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 4, '[]', '2017-05-08 11:06:44', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(602, 1, 9, 7, '10', '2017-05-08 00:00:00', '0.00', '0.00', '40.00', '0.00', 1, 0, 0, '40.00', '0.00', 1, 4, '[]', '2017-05-08 11:06:47', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(603, 1, 1, 0, '11', '2017-05-08 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 2, '[]', '2017-05-08 11:27:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(604, 1, 1, 0, '12', '2017-05-08 00:00:00', '0.00', '0.00', '100.00', '0.00', 1, 0, 0, '100.00', '0.00', 1, 2, '[]', '2017-05-08 11:29:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(605, 1, 1, 0, '13', '2017-05-08 00:00:00', '0.00', '0.00', '100.00', '0.00', 1, 1, 1, '100.00', '0.00', 1, 2, '[]', '2017-05-08 11:29:37', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(606, 1, 1, 0, '14', '2017-05-08 00:00:00', '0.00', '0.00', '205.00', '0.00', 1, 0, 0, '205.00', '0.00', 1, 2, '[]', '2017-05-08 11:30:24', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(607, 1, 1, 0, '15', '2017-05-08 00:00:00', '0.00', '0.00', '229.00', '0.00', 1, 0, 0, '229.00', '0.00', 1, 2, '[]', '2017-05-08 11:30:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(608, 1, 1, 0, '16', '2017-05-08 00:00:00', '0.00', '0.00', '245.00', '0.00', 1, 0, 0, '245.00', '0.00', 1, 2, '[]', '2017-05-08 11:31:17', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(609, 1, 1, 0, '17', '2017-05-08 00:00:00', '0.00', '0.00', '100.00', '0.00', 1, 0, 0, '100.00', '0.00', 1, 2, '[]', '2017-05-08 11:31:37', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(610, 1, 1, 0, '18', '2017-05-08 00:00:00', '0.00', '0.00', '214.00', '0.00', 1, 0, 0, '214.00', '0.00', 1, 2, '[]', '2017-05-08 11:31:57', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(611, 1, 1, 0, '19', '2017-05-08 00:00:00', '0.00', '0.00', '419.00', '0.00', 1, 0, 0, '419.00', '0.00', 1, 2, '[]', '2017-05-08 11:32:15', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(612, 1, 1, 0, '20', '2017-05-08 00:00:00', '0.00', '0.00', '304.00', '0.00', 1, 0, 0, '304.00', '0.00', 1, 2, '[]', '2017-05-08 11:32:26', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(613, 1, 1, 0, '21', '2017-05-08 00:00:00', '0.00', '0.00', '404.00', '44.90', 1, 0, 0, '404.00', '0.00', 1, 2, '[]', '2017-05-08 11:33:01', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(614, 1, 1, 0, '22', '2017-05-08 00:00:00', '0.00', '0.00', '220.00', '24.40', 1, 0, 0, '220.00', '0.00', 1, 2, '[]', '2017-05-08 11:33:37', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(615, 1, 1, 0, '23', '2017-05-08 00:00:00', '0.00', '0.00', '204.00', '0.00', 1, 0, 0, '204.00', '0.00', 1, 2, '[]', '2017-05-08 11:35:49', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(616, 1, 1, 0, '24', '2017-05-08 00:00:00', '0.00', '0.00', '410.00', '0.00', 1, 0, 0, '410.00', '0.00', 1, 2, '[]', '2017-05-08 11:36:06', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(617, 1, 9, 0, '1', '2017-05-09 00:00:00', '0.00', '0.00', '100.00', '0.00', 1, 0, 0, '100.00', '0.00', 1, 2, '[]', '2017-05-09 15:08:53', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(618, 1, 9, 0, '2', '2017-05-09 00:00:00', '0.00', '0.00', '420.00', '0.00', 1, 0, 0, '420.00', '0.00', 1, 2, '[]', '2017-05-09 15:09:14', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(619, 1, 9, 0, '3', '2017-05-09 00:00:00', '0.00', '0.00', '80.00', '0.00', 3, 1, 1, '80.00', '0.00', 1, 2, '[]', '2017-05-09 15:16:11', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(620, 1, 9, 0, '4', '2017-05-09 00:00:00', '0.00', '0.00', '229.00', '0.00', 1, 0, 0, '229.00', '0.00', 1, 2, '[]', '2017-05-09 15:38:11', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(621, 1, 9, 0, '1', '2017-05-10 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 4, '[]', '2017-05-10 14:35:40', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(622, 1, 9, 0, '1', '2017-05-11 00:00:00', '0.00', '0.00', '134.00', '6.00', 1, 0, 0, '134.00', '84.00', 0, 4, '', '2017-05-11 14:55:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(623, 1, 9, 0, '2', '2017-05-11 00:00:00', '0.00', '0.00', '169.00', '0.00', 1, 0, 0, '169.00', '31.00', 0, 4, '', '2017-05-11 14:55:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(624, 1, 9, 0, '3', '2017-05-11 00:00:00', '0.00', '0.00', '174.00', '6.00', 1, 0, 0, '174.00', '26.00', 0, 4, '', '2017-05-11 14:56:44', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(625, 1, 9, 0, '4', '2017-05-11 00:00:00', '0.00', '0.00', '174.00', '6.00', 1, 0, 0, '174.00', '26.00', 0, 4, '', '2017-05-11 14:57:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(626, 1, 9, 0, '1', '2017-05-12 00:00:00', '0.00', '0.00', '220.00', '0.00', 1, 0, 0, '220.00', '0.00', 0, 4, '', '2017-05-12 13:12:23', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(627, 1, 9, 0, '2', '2017-05-12 00:00:00', '0.00', '0.00', '115.00', '0.00', 1, 0, 0, '115.00', '35.00', 0, 4, '', '2017-05-12 13:13:29', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(628, 1, 9, 0, '3', '2017-05-12 00:00:00', '0.00', '0.00', '195.00', '0.00', 1, 0, 0, '195.00', '5.00', 0, 2, '', '2017-05-12 13:37:31', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(629, 1, 9, 0, '1', '2017-05-13 00:00:00', '0.00', '0.00', '165.00', '4.00', 1, 0, 0, '165.00', '35.00', 0, 4, '', '2017-05-13 13:21:31', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(630, 1, 9, 0, '2', '2017-05-13 00:00:00', '0.00', '0.00', '181.90', '32.10', 1, 0, 0, '181.90', '18.10', 0, 2, '', '2017-05-12 20:06:49', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(631, 1, 9, 0, '3', '2017-05-13 00:00:00', '0.00', '0.00', '155.00', '0.00', 1, 0, 0, '155.00', '45.00', 0, 2, '', '2017-05-13 14:54:05', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(632, 1, 9, 0, '4', '2017-05-13 00:00:00', '0.00', '0.00', '94.00', '6.00', 1, 0, 0, '94.00', '6.00', 0, 2, '', '2017-05-13 14:55:49', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(633, 1, 9, 0, '1', '2017-05-15 00:00:00', '0.00', '0.00', '210.00', '0.00', 1, 0, 0, '210.00', '40.00', 0, 4, '', '2017-05-15 15:54:33', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(634, 1, 9, 0, '2', '2017-05-15 00:00:00', '0.00', '0.00', '59.50', '10.50', 1, 0, 0, '59.50', '0.00', 0, 4, '', '2017-05-15 15:54:39', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(635, 1, 9, 0, '3', '2017-05-15 00:00:00', '0.00', '0.00', '287.00', '15.15', 1, 0, 0, '287.00', '0.00', 0, 4, '', '2017-05-15 15:55:04', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(636, 1, 9, 0, '4', '2017-05-15 00:00:00', '0.00', '0.00', '261.00', '13.75', 1, 0, 0, '261.00', '0.00', 0, 4, '', '2017-05-15 16:00:00', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(637, 1, 9, 0, '5', '2017-05-15 00:00:00', '0.00', '0.00', '66.00', '3.50', 1, 0, 0, '66.00', '0.00', 0, 4, '', '2017-05-15 15:57:15', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(638, 1, 9, 0, '6', '2017-05-15 00:00:00', '0.00', '0.00', '99.00', '0.00', 1, 0, 0, '99.00', '0.00', 0, 4, '', '2017-05-15 15:59:17', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(639, 1, 9, 0, '7', '2017-05-15 00:00:00', '0.00', '0.00', '80.00', '0.00', 1, 0, 0, '80.00', '0.00', 0, 2, '', '2017-05-15 11:02:28', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(640, 1, 9, 0, '8', '2017-05-15 00:00:00', '0.00', '0.00', '99.00', '0.00', 1, 0, 0, '99.00', '0.00', 0, 2, '', '2017-05-15 11:09:06', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(641, 1, 9, 0, '9', '2017-05-15 00:00:00', '0.00', '0.00', '40.00', '0.00', 1, 0, 0, '40.00', '10.00', 0, 2, '', '2017-05-15 12:07:19', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(642, 1, 9, 0, '10', '2017-05-15 00:00:00', '0.00', '0.00', '150.00', '0.00', 1, 0, 0, '150.00', '50.00', 0, 2, '', '2017-05-15 12:34:23', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(643, 1, 9, 0, '11', '2017-05-15 00:00:00', '0.00', '0.00', '80.00', '0.00', 1, 0, 0, '80.00', '20.00', 0, 2, '', '2017-05-15 12:36:28', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(644, 1, 9, 0, '12', '2017-05-15 00:00:00', '0.00', '0.00', '45.00', '0.00', 1, 0, 0, '45.00', '5.00', 0, 2, '', '2017-05-15 12:50:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(645, 1, 9, 0, '13', '2017-05-15 00:00:00', '0.00', '0.00', '249.00', '0.00', 1, 0, 0, '249.00', '51.00', 0, 2, '', '2017-05-15 12:52:06', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(646, 1, 0, 0, '14', '2017-05-15 00:00:00', '0.00', '0.00', '40.00', '0.00', 1, 0, 0, '40.00', '10.00', 0, 2, '', '2017-05-15 13:54:37', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(647, 1, 0, 0, '15', '2017-05-15 00:00:00', '0.00', '0.00', '150.00', '0.00', 1, 0, 0, '150.00', '0.00', 0, 2, '', '2017-05-15 15:42:31', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(648, 1, 0, 0, '16', '2017-05-15 00:00:00', '0.00', '0.00', '80.00', '0.00', 1, 0, 0, '80.00', '20.00', 0, 2, '', '2017-05-15 16:07:27', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(649, 1, 0, 0, '17', '2017-05-15 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '30.00', 0, 2, '', '2017-05-15 16:10:32', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(650, 1, 9, 0, '18', '2017-05-15 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '30.00', 0, 2, '', '2017-05-15 16:11:42', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(651, 1, 0, 0, '19', '2017-05-15 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 0, 2, '', '2017-05-15 16:20:25', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(652, 1, 9, 0, '20', '2017-05-15 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '30.00', 0, 2, '', '2017-05-15 16:21:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(653, 1, 0, 0, '21', '2017-05-15 00:00:00', '0.00', '0.00', '439.00', '0.00', 1, 0, 0, '439.00', '61.00', 0, 2, '', '2017-05-15 16:26:16', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(654, 1, 9, 0, '22', '2017-05-15 00:00:00', '0.00', '0.00', '195.00', '0.00', 1, 0, 0, '195.00', '5.00', 0, 2, '', '2017-05-15 16:27:32', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(655, 1, 0, 0, '23', '2017-05-15 00:00:00', '0.00', '0.00', '150.00', '0.00', 1, 0, 0, '150.00', '50.00', 0, 2, '', '2017-05-15 16:40:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(656, 1, 0, 0, '24', '2017-05-15 00:00:00', '0.00', '0.00', '150.00', '0.00', 1, 0, 0, '150.00', '0.00', 0, 2, '', '2017-05-15 16:41:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(657, 1, 9, 0, '25', '2017-05-15 00:00:00', '0.00', '0.00', '140.00', '0.00', 1, 0, 0, '140.00', '0.00', 0, 2, '', '2017-05-15 16:41:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(658, 1, 0, 0, '1', '2017-05-16 00:00:00', '0.00', '0.00', '179.00', '0.00', 1, 0, 0, '179.00', '0.00', 0, 4, '', '2017-05-16 06:35:35', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(659, 1, 0, 0, '2', '2017-05-16 00:00:00', '0.00', '0.00', '115.00', '0.00', 1, 0, 0, '115.00', '35.00', 0, 4, '', '2017-05-16 06:35:37', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(660, 1, 0, 0, '3', '2017-05-16 00:00:00', '0.00', '0.00', '150.00', '0.00', 1, 0, 0, '150.00', '0.00', 0, 4, '', '2017-05-16 06:35:48', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(661, 1, 9, 0, '4', '2017-05-16 00:00:00', '0.00', '0.00', '144.00', '0.00', 1, 0, 0, '144.00', '0.00', 0, 4, '', '2017-05-16 06:35:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(662, 1, 9, 0, '5', '2017-05-16 00:00:00', '0.00', '0.00', '125.00', '0.00', 1, 0, 0, '125.00', '0.00', 0, 2, '', '2017-05-16 06:38:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(663, 1, 9, 0, '6', '2017-05-16 00:00:00', '0.00', '0.00', '80.00', '0.00', 1, 0, 0, '80.00', '0.00', 0, 2, '', '2017-05-16 06:38:33', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(664, 1, 0, 0, '7', '2017-05-16 00:00:00', '0.00', '0.00', '230.00', '0.00', 1, 0, 0, '230.00', '20.00', 0, 2, '', '2017-05-16 07:08:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(665, 1, 0, 0, '8', '2017-05-16 00:00:00', '0.00', '0.00', '40.00', '0.00', 1, 0, 0, '40.00', '10.00', 0, 2, '', '2017-05-16 07:11:16', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(666, 1, 9, 0, '9', '2017-05-16 00:00:00', '0.00', '0.00', '120.00', '0.00', 1, 0, 0, '120.00', '0.00', 1, 2, '[]', '2017-05-16 07:48:47', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(667, 1, 9, 9, '10', '2017-05-16 00:00:00', '0.00', '0.00', '100.00', '0.00', 1, 0, 0, '100.00', '0.00', 1, 2, '[]', '2017-05-16 07:49:05', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(668, 1, 9, 0, '11', '2017-05-16 00:00:00', '0.00', '0.00', '40.00', '0.00', 1, 0, 0, '40.00', '0.00', 1, 2, '[]', '2017-05-16 07:52:29', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(669, 1, 0, 0, '12', '2017-05-16 00:00:00', '0.00', '0.00', '199.00', '0.00', 1, 0, 0, '199.00', '1.00', 0, 2, '', '2017-05-16 07:55:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(670, 1, 0, 0, '13', '2017-05-16 00:00:00', '0.00', '0.00', '100.00', '0.00', 1, 0, 0, '100.00', '0.00', 0, 2, '', '2017-05-16 08:46:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(671, 1, 9, 0, '14', '2017-05-16 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '30.00', 0, 2, '', '2017-05-16 08:47:25', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(672, 1, 0, 0, '15', '2017-05-16 00:00:00', '0.00', '0.00', '140.00', '0.00', 1, 0, 0, '140.00', '60.00', 0, 2, '', '2017-05-16 09:06:46', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(673, 1, 9, 0, '16', '2017-05-16 00:00:00', '0.00', '0.00', '140.00', '0.00', 1, 0, 0, '140.00', '60.00', 0, 2, '', '2017-05-16 09:07:11', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(674, 1, 0, 0, '17', '2017-05-16 00:00:00', '0.00', '0.00', '159.00', '0.00', 1, 0, 0, '159.00', '41.00', 0, 2, '', '2017-05-16 09:42:01', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(675, 1, 9, 0, '18', '2017-05-16 00:00:00', '0.00', '0.00', '80.00', '0.00', 1, 0, 0, '80.00', '20.00', 0, 2, '', '2017-05-16 09:43:11', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(676, 1, 0, 0, '19', '2017-05-16 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '40.00', 0, 2, '', '2017-05-16 09:45:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(677, 1, 9, 0, '20', '2017-05-16 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '30.00', 0, 2, '', '2017-05-16 09:45:42', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(678, 1, 0, 0, '21', '2017-05-16 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '30.00', 0, 2, '', '2017-05-16 09:48:26', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(679, 1, 9, 0, '22', '2017-05-16 00:00:00', '0.00', '0.00', '129.00', '0.00', 1, 0, 0, '129.00', '21.00', 0, 2, '', '2017-05-16 09:48:50', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(680, 1, 0, 0, '23', '2017-05-16 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '-1.00', 0, 2, '', '2017-05-16 10:04:08', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(681, 1, 0, 0, '24', '2017-05-16 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 0, 2, '', '2017-05-16 10:13:00', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(682, 1, 0, 0, '25', '2017-05-16 00:00:00', '0.00', '0.00', '130.00', '0.00', 1, 0, 0, '130.00', '0.00', 0, 2, '', '2017-05-16 10:18:21', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(683, 1, 0, 0, '26', '2017-05-16 00:00:00', '0.00', '0.00', '99.00', '0.00', 1, 0, 0, '99.00', '1.00', 0, 2, '', '2017-05-16 10:25:21', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(684, 1, 0, 0, '27', '2017-05-16 00:00:00', '0.00', '0.00', '473.00', '0.00', 1, 0, 0, '473.00', '-1.00', 0, 2, '', '2017-05-16 17:34:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(685, 1, 0, 0, '1', '2017-05-17 00:00:00', '0.00', '0.00', '310.00', '0.00', 1, 0, 0, '310.00', '40.00', 0, 2, '', '2017-05-17 08:44:17', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(686, 1, 9, 0, '2', '2017-05-17 00:00:00', '0.00', '0.00', '184.00', '0.00', 1, 0, 0, '184.00', '0.00', 1, 2, '[]', '2017-05-17 09:18:26', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(687, 1, 0, 0, '3', '2017-05-17 00:00:00', '0.00', '0.00', '179.00', '0.00', 1, 0, 0, '179.00', '1.00', 0, 2, '', '2017-05-17 10:00:26', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(688, 1, 9, 0, '4', '2017-05-17 00:00:00', '0.00', '0.00', '1015.00', '0.00', 1, 0, 0, '1015.00', '0.00', 0, 2, '', '2017-05-17 10:37:58', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(689, 1, 0, 0, '5', '2017-05-17 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 0, 2, '', '2017-05-17 11:01:32', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(690, 1, 9, 0, '1', '2017-05-18 00:00:00', '0.00', '0.00', '66.00', '3.50', 1, 0, 0, '66.00', '0.00', 1, 3, '[]', '2017-05-18 13:27:00', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(691, 1, 9, 0, '2', '2017-05-18 00:00:00', '0.00', '0.00', '80.00', '0.00', 1, 0, 0, '80.00', '0.00', 1, 3, '[]', '2017-05-18 13:27:00', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(692, 1, 0, 0, '3', '2017-05-18 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 0, 2, '', '2017-05-18 13:32:11', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(693, 1, 0, 0, '1', '2017-05-19 00:00:00', '0.00', '0.00', '170.05', '8.95', 1, 0, 0, '170.05', '29.95', 0, 2, '', '2017-05-19 07:02:46', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(694, 1, 0, 0, '2', '2017-05-19 00:00:00', '0.00', '0.00', '203.00', '16.70', 1, 0, 0, '203.00', '47.00', 0, 2, '', '2017-05-19 07:41:30', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(695, 1, 0, 0, '1', '2017-05-21 00:00:00', '0.00', '0.00', '203.00', '26.60', 1, 0, 0, '203.00', '0.00', 0, 3, '', '2017-05-21 13:40:16', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(696, 1, 9, 0, '1', '2017-05-22 00:00:00', '0.00', '0.00', '199.00', '0.00', 1, 0, 0, '199.00', '0.00', 1, 2, '[]', '2017-05-22 10:06:47', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(697, 1, 0, 0, '1', '2017-05-23 00:00:00', '0.00', '0.00', '60.00', '0.00', 3, 0, 0, '60.00', '0.00', 0, 2, '', '2017-05-23 13:58:20', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1);
INSERT INTO `pos_sales_order` (`sales_order_id`, `company_id`, `employee_id`, `customer_id`, `sales_order_no`, `sales_order_date`, `tax_amount`, `subtotal_amount`, `final_amount`, `discount_amount`, `payment_method_id`, `payment_split`, `payment_split_type`, `paid_amount`, `remaining_amount`, `sales_order_payment_status_id`, `sales_order_status_id`, `payment_response`, `update_date`, `location_id`, `table_id`, `floor_id`, `sales_order_type_id`, `created_at`, `updated_at`, `order_from_id`) VALUES
(698, 1, 0, 0, '2', '2017-05-23 00:00:00', '0.00', '0.00', '70.00', '0.00', 2, 0, 0, '70.00', '0.00', 0, 2, '', '2017-05-23 14:06:36', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(699, 1, 9, 0, '3', '2017-05-23 00:00:00', '0.00', '0.00', '70.00', '0.00', 3, 0, 0, '70.00', '0.00', 0, 2, '', '2017-05-23 14:08:43', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(700, 1, 0, 0, '4', '2017-05-23 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 0, 2, '', '2017-05-23 14:10:36', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(701, 1, 9, 0, '5', '2017-05-23 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 0, 2, '', '2017-05-23 14:18:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(702, 1, 0, 0, '2', '2017-05-24 00:00:00', '0.00', '0.00', '96.00', '4.00', 1, 0, 0, '96.00', '0.00', 0, 2, '', '2017-05-24 06:16:01', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(703, 1, 0, 0, '3', '2017-05-24 00:00:00', '0.00', '0.00', '115.00', '0.00', 1, 0, 0, '115.00', '0.00', 0, 2, '', '2017-05-24 06:21:15', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(704, 1, 0, 0, '4', '2017-05-24 00:00:00', '0.00', '0.00', '115.00', '0.00', 1, 0, 0, '115.00', '0.00', 0, 2, '', '2017-05-24 06:22:21', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(705, 1, 0, 0, '5', '2017-05-24 00:00:00', '0.00', '0.00', '189.00', '0.00', 1, 0, 0, '189.00', '0.00', 0, 2, '', '2017-05-24 06:31:46', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(706, 1, 0, 0, '6', '2017-05-24 00:00:00', '0.00', '0.00', '140.00', '0.00', 2, 0, 0, '140.00', '0.00', 0, 2, '', '2017-05-24 06:33:40', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(707, 1, 9, 0, '7', '2017-05-24 00:00:00', '0.00', '0.00', '120.00', '0.00', 1, 0, 0, '120.00', '0.00', 0, 2, '', '2017-05-24 06:34:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(708, 1, 0, 0, '8', '2017-05-24 00:00:00', '0.00', '0.00', '45.00', '5.00', 3, 0, 0, '45.00', '0.00', 0, 2, '', '2017-05-24 06:38:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(709, 1, 0, 0, '9', '2017-05-24 00:00:00', '0.00', '0.00', '169.00', '0.00', 1, 0, 0, '169.00', '0.00', 0, 2, '', '2017-05-24 06:46:46', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(710, 1, 0, 0, '10', '2017-05-24 00:00:00', '0.00', '0.00', '150.00', '0.00', 1, 0, 0, '150.00', '0.00', 0, 2, '', '2017-05-24 06:58:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(711, 1, 0, 0, '11', '2017-05-24 00:00:00', '0.00', '0.00', '607.00', '0.00', 1, 0, 0, '607.00', '0.00', 0, 2, '', '2017-05-24 07:25:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(712, 1, 0, 0, '12', '2017-05-24 00:00:00', '0.00', '0.00', '115.00', '0.00', 3, 0, 0, '115.00', '0.00', 0, 2, '', '2017-05-24 08:26:48', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(713, 1, 9, 0, '13', '2017-05-24 00:00:00', '0.00', '0.00', '99.00', '0.00', 1, 0, 0, '99.00', '0.00', 0, 2, '', '2017-05-24 08:27:31', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(714, 1, 0, 0, '14', '2017-05-24 00:00:00', '0.00', '0.00', '140.00', '0.00', 1, 0, 0, '140.00', '0.00', 0, 2, '', '2017-05-24 08:42:50', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(715, 1, 9, 0, '15', '2017-05-24 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 2, '[]', '2017-05-24 12:20:23', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(716, 1, 0, 0, '16', '2017-05-24 00:00:00', '0.00', '0.00', '36.00', '4.00', 3, 0, 0, '36.00', '0.00', 0, 2, '', '2017-05-24 12:49:00', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(717, 1, 9, 0, '1', '2017-05-25 00:00:00', '0.00', '0.00', '145.00', '0.00', 1, 1, 2, '145.00', '0.00', 1, 2, '[]', '2017-05-25 07:48:28', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(718, 1, 0, 0, '2', '2017-05-25 00:00:00', '0.00', '0.00', '140.00', '0.00', 1, 0, 0, '140.00', '0.00', 0, 2, '', '2017-05-25 13:16:45', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(719, 1, 0, 0, '1', '2017-05-26 00:00:00', '0.00', '0.00', '185.00', '0.00', 1, 0, 0, '185.00', '0.00', 0, 2, '', '2017-05-26 06:14:14', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(720, 1, 0, 0, '2', '2017-05-26 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 0, 2, '', '2017-05-26 13:25:48', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(721, 1, 9, 0, '1', '2017-05-29 00:00:00', '0.00', '0.00', '199.00', '0.00', 1, 0, 0, '199.00', '0.00', 1, 2, '[]', '2017-05-29 14:23:33', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(722, 1, 9, 0, '2', '2017-05-29 00:00:00', '0.00', '0.00', '973.00', '0.00', 1, 0, 0, '973.00', '0.00', 1, 2, '[]', '2017-05-29 13:08:01', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(723, 1, 9, 0, '3', '2017-05-29 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 2, '[]', '2017-05-29 13:24:44', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(724, 1, 9, 0, '4', '2017-05-29 00:00:00', '0.00', '0.00', '205.00', '22.80', 1, 0, 0, '205.00', '0.00', 1, 2, '[]', '2017-05-29 15:26:38', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(725, 1, 9, 0, '1', '2017-05-30 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 3, '[]', '2017-05-30 08:58:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(726, 1, 9, 0, '2', '2017-05-30 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 3, '[]', '2017-05-30 08:58:10', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(727, 1, 9, 0, '3', '2017-05-30 00:00:00', '0.00', '0.00', '99.00', '0.00', 1, 0, 0, '99.00', '0.00', 1, 3, '[]', '2017-05-30 08:58:10', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(728, 1, 9, 0, '4', '2017-05-30 00:00:00', '0.00', '0.00', '80.00', '0.00', 1, 0, 0, '80.00', '0.00', 1, 3, '[]', '2017-05-30 08:58:10', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(729, 1, 9, 0, '5', '2017-05-30 00:00:00', '0.00', '0.00', '40.00', '0.00', 1, 0, 0, '40.00', '0.00', 1, 3, '[]', '2017-05-30 08:58:10', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(730, 1, 9, 0, '6', '2017-05-30 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 3, '[]', '2017-05-30 08:58:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(731, 1, 9, 0, '7', '2017-05-30 00:00:00', '0.00', '0.00', '140.00', '0.00', 1, 0, 0, '140.00', '0.00', 1, 2, '[]', '2017-05-29 20:53:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(732, 1, 9, 0, '8', '2017-05-30 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 2, '[]', '2017-05-29 20:53:52', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(733, 1, 9, 0, '9', '2017-05-30 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 2, '[]', '2017-05-29 20:54:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(734, 1, 9, 0, '10', '2017-05-30 00:00:00', '0.00', '0.00', '45.00', '0.00', 1, 0, 0, '45.00', '0.00', 1, 2, '[]', '2017-05-29 20:54:19', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(735, 1, 0, 0, '11', '2017-05-30 00:00:00', '0.00', '0.00', '169.00', '0.00', 2, 0, 0, '169.00', '0.00', 0, 2, '', '2017-05-30 08:47:26', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(736, 1, 0, 0, '12', '2017-05-30 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 0, 2, '', '2017-05-30 09:00:14', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(737, 1, 0, 0, '13', '2017-05-30 00:00:00', '0.00', '0.00', '105.00', '5.00', 1, 0, 0, '105.00', '0.00', 0, 2, '', '2017-05-30 10:30:33', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(738, 1, 9, 0, '14', '2017-05-30 00:00:00', '0.00', '0.00', '40.00', '4.50', 1, 0, 0, '40.00', '0.00', 1, 2, '[]', '2017-05-30 12:12:41', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(739, 1, 9, 0, '15', '2017-05-30 00:00:00', '0.00', '0.00', '123.00', '6.45', 1, 0, 0, '123.00', '0.00', 1, 2, '[]', '2017-05-30 12:16:16', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(740, 1, 9, 0, '16', '2017-05-30 00:00:00', '0.00', '0.00', '123.00', '6.45', 1, 0, 0, '123.00', '0.00', 1, 2, '[]', '2017-05-30 12:31:34', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(741, 1, 9, 0, '17', '2017-05-30 00:00:00', '0.00', '0.00', '129.00', '0.00', 1, 0, 0, '129.00', '0.00', 1, 2, '[]', '2017-05-30 12:33:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(742, 1, 9, 0, '18', '2017-05-30 00:00:00', '0.00', '0.00', '129.00', '0.00', 1, 0, 0, '129.00', '0.00', 1, 2, '[]', '2017-05-30 12:48:59', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(743, 1, 9, 0, '19', '2017-05-30 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 2, '[]', '2017-05-30 12:49:49', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(744, 1, 9, 0, '20', '2017-05-30 00:00:00', '0.00', '0.00', '45.00', '0.00', 1, 0, 0, '45.00', '0.00', 1, 2, '[]', '2017-05-30 12:50:52', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(745, 1, 9, 0, '21', '2017-05-30 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 1, 2, '[]', '2017-05-30 12:58:49', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(746, 1, 9, 0, '22', '2017-05-30 00:00:00', '0.00', '0.00', '129.00', '0.00', 1, 0, 0, '129.00', '0.00', 1, 2, '[]', '2017-05-30 13:16:05', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(747, 1, 9, 0, '23', '2017-05-30 00:00:00', '0.00', '0.00', '40.00', '0.00', 1, 0, 0, '40.00', '0.00', 1, 2, '[]', '2017-05-30 13:25:23', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(748, 1, 9, 0, '24', '2017-05-30 00:00:00', '0.00', '0.00', '319.00', '0.00', 1, 0, 0, '319.00', '0.00', 1, 2, '[]', '2017-05-30 13:28:38', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(749, 1, 0, 0, '1', '2017-05-31 01:34:05', '0.00', '0.00', '118.00', '141.00', 1, 0, 0, '118.00', '0.00', 0, 2, '', '2017-05-31 08:18:51', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(750, 1, 0, 0, '1', '2017-05-31 01:50:43', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 0, 2, '', '2017-05-31 08:21:28', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(751, 1, 9, 0, '1', '2017-05-31 01:51:29', '0.00', '0.00', '54.00', '6.00', 1, 0, 0, '54.00', '0.00', 0, 2, '', '2017-05-31 08:23:18', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(752, 1, 9, 0, '1', '2017-05-31 01:53:18', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 0, 2, '', '2017-05-31 08:25:57', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(753, 1, 0, 0, '1', '2017-05-31 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 0, 2, '', '2017-05-31 08:36:44', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(754, 1, 0, 0, '2', '2017-05-31 00:00:00', '0.00', '0.00', '99.00', '0.00', 1, 0, 0, '99.00', '0.00', 0, 2, '', '2017-05-31 08:42:16', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(755, 1, 9, 0, '1', '2017-06-02 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 2, '[]', '2017-06-02 10:14:23', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(756, 1, 9, 1, '1', '2017-06-05 00:00:00', '0.00', '0.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 2, '[]', '2017-06-05 11:21:21', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(757, 1, 0, 49, '1', '2017-06-16 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 0, 2, '', '2017-06-16 14:52:50', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(758, 1, 0, 7, '1', '2017-06-19 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 0, 2, '', '2017-06-19 09:10:01', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(759, 1, 9, 49, '2', '2017-06-19 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 0, 2, '', '2017-06-19 09:11:48', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(760, 1, 0, 49, '1', '2017-06-20 00:00:00', '0.00', '0.00', '80.00', '0.00', 3, 0, 0, '80.00', '0.00', 0, 4, '', '2017-06-20 10:08:57', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(761, 1, 0, 49, '2', '2017-06-20 00:00:00', '0.00', '0.00', '80.00', '0.00', 3, 0, 0, '80.00', '0.00', 0, 4, '', '2017-06-20 10:09:00', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(762, 1, 0, 7, '3', '2017-06-20 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 0, 4, '', '2017-06-20 10:09:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(763, 1, 0, 49, '4', '2017-06-20 00:00:00', '0.00', '0.00', '54.00', '6.00', 3, 0, 0, '54.00', '0.00', 0, 4, '', '2017-06-20 10:09:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(764, 1, 9, 49, '5', '2017-06-20 00:00:00', '0.00', '0.00', '99.00', '0.00', 1, 0, 0, '99.00', '0.00', 0, 4, '', '2017-06-20 10:09:10', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(765, 1, 0, 49, '6', '2017-06-20 00:00:00', '0.00', '0.00', '80.00', '0.00', 1, 0, 0, '80.00', '0.00', 0, 4, '', '2017-06-20 10:09:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(766, 1, 0, 50, '7', '2017-06-20 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 0, 4, '', '2017-06-20 10:09:16', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(767, 1, 0, 51, '8', '2017-06-20 00:00:00', '0.00', '0.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 0, 4, '', '2017-06-20 10:09:20', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(768, 1, 0, 53, '1', '2017-07-05 00:00:00', '0.00', '0.00', '40.00', '0.00', 1, 0, 0, '40.00', '0.00', 0, 2, '', '2017-07-05 08:34:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(769, 1, 0, 49, '1', '2017-07-07 00:00:00', '0.00', '0.00', '40.00', '0.00', 2, 0, 0, '40.00', '0.00', 0, 2, '', '2017-07-07 07:22:39', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(770, 1, 0, 49, '2', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 07:34:31', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(771, 1, 0, 49, '3', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 07:40:46', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(772, 1, 0, 49, '4', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 07:48:14', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(773, 1, 0, 49, '5', '2017-07-07 00:00:00', '0.00', '0.00', '40.00', '0.00', 2, 0, 0, '40.00', '0.00', 0, 2, '', '2017-07-07 07:52:30', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(774, 1, 0, 49, '6', '2017-07-07 00:00:00', '0.00', '0.00', '99.00', '0.00', 2, 0, 0, '99.00', '0.00', 0, 2, '', '2017-07-07 07:55:42', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(775, 1, 0, 49, '7', '2017-07-07 00:00:00', '0.00', '0.00', '129.00', '0.00', 2, 0, 0, '129.00', '0.00', 0, 2, '', '2017-07-07 08:00:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(776, 1, 0, 49, '8', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 08:03:00', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(777, 1, 0, 49, '9', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 08:06:01', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(778, 1, 0, 49, '10', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 08:08:19', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(779, 1, 0, 49, '11', '2017-07-07 00:00:00', '0.00', '0.00', '70.00', '0.00', 2, 0, 0, '70.00', '0.00', 0, 2, '', '2017-07-07 08:09:48', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(780, 1, 0, 49, '12', '2017-07-07 00:00:00', '0.00', '0.00', '40.00', '0.00', 2, 0, 0, '40.00', '0.00', 0, 2, '', '2017-07-07 08:11:44', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(781, 1, 0, 49, '13', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 08:14:51', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(782, 1, 0, 49, '14', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 08:22:41', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(783, 1, 0, 49, '15', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 09:42:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(784, 1, 0, 49, '16', '2017-07-07 00:00:00', '0.00', '0.00', '40.00', '0.00', 2, 0, 0, '40.00', '0.00', 0, 2, '', '2017-07-07 09:49:31', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(785, 1, 0, 49, '17', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 09:52:30', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(786, 1, 0, 49, '18', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 09:57:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(787, 1, 9, 49, '19', '2017-07-07 00:00:00', '0.00', '0.00', '99.00', '0.00', 2, 0, 0, '99.00', '0.00', 0, 2, '', '2017-07-07 09:58:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(788, 1, 0, 49, '20', '2017-07-07 00:00:00', '0.00', '0.00', '70.00', '0.00', 2, 0, 0, '70.00', '0.00', 0, 2, '', '2017-07-07 10:00:57', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(789, 1, 0, 49, '21', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 10:06:50', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(790, 1, 0, 49, '22', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 10:10:33', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(791, 1, 0, 49, '23', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 10:14:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(792, 1, 0, 49, '24', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 10:19:38', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(793, 1, 0, 49, '25', '2017-07-07 00:00:00', '0.00', '0.00', '54.00', '6.00', 2, 0, 0, '54.00', '0.00', 0, 2, '', '2017-07-07 10:23:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(794, 1, 0, 49, '26', '2017-07-07 00:00:00', '0.00', '0.00', '60.00', '0.00', 2, 0, 0, '60.00', '0.00', 0, 2, '', '2017-07-07 10:26:15', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(795, 1, 0, 49, '27', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 10:48:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(796, 1, 0, 49, '28', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 11:09:55', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(797, 1, 0, 49, '29', '2017-07-07 00:00:00', '0.00', '0.00', '99.00', '0.00', 2, 0, 0, '99.00', '0.00', 0, 2, '', '2017-07-07 11:15:27', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(798, 1, 0, 49, '30', '2017-07-07 00:00:00', '0.00', '0.00', '70.00', '0.00', 2, 0, 0, '70.00', '0.00', 0, 2, '', '2017-07-07 11:21:03', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(799, 1, 9, 49, '31', '2017-07-07 00:00:00', '0.00', '0.00', '99.00', '0.00', 2, 0, 0, '99.00', '0.00', 0, 2, '', '2017-07-07 11:21:47', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(800, 1, 0, 49, '32', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 11:25:12', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(801, 1, 0, 49, '33', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 11:26:52', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(802, 1, 0, 49, '34', '2017-07-07 00:00:00', '0.00', '0.00', '99.00', '0.00', 2, 0, 0, '99.00', '0.00', 0, 2, '', '2017-07-07 11:28:26', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(803, 1, 0, 49, '35', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 11:29:56', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(804, 1, 0, 49, '36', '2017-07-07 00:00:00', '0.00', '0.00', '99.00', '0.00', 2, 0, 0, '99.00', '0.00', 0, 2, '', '2017-07-07 11:34:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(805, 1, 0, 49, '37', '2017-07-07 00:00:00', '0.00', '0.00', '60.00', '0.00', 2, 0, 0, '60.00', '0.00', 0, 2, '', '2017-07-07 11:35:54', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(806, 1, 0, 49, '38', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 11:41:23', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(807, 1, 0, 49, '39', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 11:54:27', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(808, 1, 0, 49, '40', '2017-07-07 00:00:00', '0.00', '0.00', '60.00', '0.00', 2, 0, 0, '60.00', '0.00', 0, 2, '', '2017-07-07 12:04:33', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(809, 1, 0, 49, '41', '2017-07-07 00:00:00', '0.00', '0.00', '99.00', '0.00', 2, 0, 0, '99.00', '0.00', 0, 2, '', '2017-07-07 12:37:14', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(810, 1, 0, 49, '42', '2017-07-07 00:00:00', '0.00', '0.00', '99.00', '0.00', 2, 0, 0, '99.00', '0.00', 0, 2, '', '2017-07-07 12:40:21', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(811, 1, 0, 49, '43', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 12:46:15', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(812, 1, 9, 49, '44', '2017-07-07 00:00:00', '0.00', '0.00', '99.00', '0.00', 2, 0, 0, '99.00', '0.00', 0, 2, '', '2017-07-07 12:46:45', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(813, 1, 0, 49, '45', '2017-07-07 00:00:00', '0.00', '0.00', '45.00', '0.00', 2, 0, 0, '45.00', '0.00', 0, 2, '', '2017-07-07 12:49:06', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(814, 1, 9, 49, '46', '2017-07-07 00:00:00', '0.00', '0.00', '60.00', '0.00', 2, 0, 0, '60.00', '0.00', 0, 2, '', '2017-07-07 12:49:28', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(815, 1, 0, 49, '47', '2017-07-07 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-07 12:52:23', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(816, 1, 0, 49, '48', '2017-07-07 00:00:00', '0.00', '0.00', '99.00', '0.00', 2, 0, 0, '99.00', '0.00', 0, 2, '', '2017-07-07 13:18:07', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(817, 1, 0, 49, '49', '2017-07-07 00:00:00', '0.00', '0.00', '99.00', '0.00', 2, 0, 0, '99.00', '0.00', 0, 2, '', '2017-07-07 13:34:12', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(818, 1, 0, 49, '50', '2017-07-07 00:00:00', '0.00', '0.00', '99.00', '0.00', 2, 0, 0, '99.00', '0.00', 0, 2, '', '2017-07-07 14:20:54', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(819, 1, 9, 49, '51', '2017-07-07 00:00:00', '0.00', '0.00', '129.00', '0.00', 2, 0, 0, '129.00', '0.00', 0, 2, '', '2017-07-07 14:21:58', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(820, 1, 0, 49, '52', '2017-07-07 00:00:00', '0.00', '0.00', '288.00', '0.00', 2, 0, 0, '288.00', '0.00', 0, 2, '', '2017-07-07 14:23:41', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(821, 1, 0, 49, '1', '2017-07-11 00:00:00', '0.00', '0.00', '60.00', '0.00', 2, 0, 0, '60.00', '0.00', 0, 2, '', '2017-07-11 09:47:00', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(822, 1, 0, 49, '2', '2017-07-11 00:00:00', '0.00', '0.00', '60.00', '0.00', 2, 0, 0, '60.00', '0.00', 0, 2, '', '2017-07-11 09:54:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(823, 1, 0, 49, '3', '2017-07-11 00:00:00', '0.00', '0.00', '36.00', '4.00', 2, 0, 0, '36.00', '0.00', 0, 2, '', '2017-07-11 10:09:26', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(824, 1, 0, 49, '4', '2017-07-11 00:00:00', '0.00', '0.00', '89.00', '10.00', 2, 0, 0, '89.00', '0.00', 0, 2, '', '2017-07-11 13:14:15', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(825, 1, 0, 49, '5', '2017-07-11 00:00:00', '0.00', '0.00', '129.00', '0.00', 2, 0, 0, '129.00', '0.00', 0, 2, '', '2017-07-11 13:17:47', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(826, 1, 0, 49, '6', '2017-07-11 00:00:00', '0.00', '0.00', '50.00', '0.00', 2, 0, 0, '50.00', '0.00', 0, 2, '', '2017-07-11 13:20:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(827, 1, 0, 49, '7', '2017-07-11 00:00:00', '0.00', '0.00', '89.00', '10.00', 2, 0, 0, '89.00', '0.00', 0, 2, '', '2017-07-11 14:09:18', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(828, 1, 0, 49, '8', '2017-07-11 00:00:00', '0.00', '0.00', '60.00', '0.00', 2, 0, 0, '60.00', '0.00', 0, 2, '', '2017-07-11 14:16:49', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(829, 1, 9, 7, '9', '2017-07-11 00:00:00', '0.00', '0.00', '129.00', '0.00', 2, 0, 0, '129.00', '0.00', 0, 2, '', '2017-07-11 14:17:31', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(830, 1, 0, 49, '10', '2017-07-11 00:00:00', '0.00', '0.00', '129.00', '0.00', 2, 0, 0, '129.00', '0.00', 0, 2, '', '2017-07-11 14:31:46', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(831, 1, 9, 49, '11', '2017-07-11 00:00:00', '0.00', '0.00', '60.00', '0.00', 2, 0, 0, '60.00', '0.00', 0, 2, '', '2017-07-11 14:32:34', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(832, 1, 9, 49, '12', '2017-07-11 00:00:00', '0.00', '0.00', '89.00', '10.00', 2, 0, 0, '89.00', '0.00', 0, 2, '', '2017-07-11 14:33:16', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(833, 1, 9, 49, '13', '2017-07-11 00:00:00', '0.00', '0.00', '60.00', '0.00', 2, 0, 0, '60.00', '0.00', 0, 2, '', '2017-07-11 14:33:51', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(834, 1, 0, 49, '14', '2017-07-11 00:00:00', '0.00', '0.00', '60.00', '0.00', 2, 0, 0, '60.00', '0.00', 0, 2, '', '2017-07-11 14:35:23', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(835, 1, 0, 49, '15', '2017-07-11 00:00:00', '0.00', '0.00', '129.00', '0.00', 2, 0, 0, '129.00', '0.00', 0, 2, '', '2017-07-11 14:38:57', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(836, 1, 0, 49, '16', '2017-07-11 00:00:00', '0.00', '0.00', '99.00', '0.00', 2, 0, 0, '99.00', '0.00', 0, 2, '', '2017-07-11 14:43:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(837, 1, 0, 49, '17', '2017-07-11 00:00:00', '0.00', '0.00', '119.00', '0.00', 2, 0, 0, '119.00', '0.00', 0, 2, '', '2017-07-11 15:16:33', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(838, 1, 0, 49, '18', '2017-07-11 00:00:00', '0.00', '0.00', '50.00', '0.00', 2, 0, 0, '50.00', '0.00', 0, 2, '', '2017-07-11 15:18:21', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(839, 1, 0, 49, '19', '2017-07-11 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-11 15:26:09', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(840, 1, 0, 49, '20', '2017-07-11 00:00:00', '0.00', '0.00', '40.00', '0.00', 2, 0, 0, '40.00', '0.00', 0, 2, '', '2017-07-11 15:31:20', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(841, 1, 9, 49, '21', '2017-07-11 00:00:00', '0.00', '0.00', '119.00', '0.00', 2, 0, 0, '119.00', '0.00', 0, 2, '', '2017-07-11 15:31:49', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(842, 1, 9, 49, '22', '2017-07-11 00:00:00', '0.00', '0.00', '45.00', '0.00', 2, 0, 0, '45.00', '0.00', 0, 2, '', '2017-07-11 15:32:19', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(843, 1, 0, 49, '1', '2017-07-12 00:00:00', '0.00', '0.00', '45.00', '0.00', 2, 0, 0, '45.00', '0.00', 0, 4, '', '2017-07-12 06:44:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(844, 1, 9, 49, '2', '2017-07-12 00:00:00', '0.00', '0.00', '45.00', '0.00', 2, 0, 0, '45.00', '0.00', 0, 2, '', '2017-07-12 03:30:17', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(845, 1, 9, 7, '3', '2017-07-12 00:00:00', '0.00', '0.00', '169.00', '0.00', 2, 0, 0, '169.00', '0.00', 0, 2, '', '2017-07-12 03:30:48', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(846, 1, 0, 49, '4', '2017-07-12 00:00:00', '0.00', '0.00', '60.00', '0.00', 2, 0, 0, '60.00', '0.00', 0, 2, '', '2017-07-12 03:32:17', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(847, 1, 9, 49, '5', '2017-07-12 00:00:00', '0.00', '0.00', '70.00', '0.00', 2, 0, 0, '70.00', '0.00', 0, 2, '', '2017-07-12 03:32:47', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(848, 1, 9, 49, '6', '2017-07-12 00:00:00', '0.00', '0.00', '70.00', '0.00', 2, 0, 0, '70.00', '0.00', 0, 2, '', '2017-07-12 03:33:29', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(849, 1, 0, 49, '7', '2017-07-12 00:00:00', '0.00', '0.00', '99.00', '0.00', 2, 0, 0, '99.00', '0.00', 0, 2, '', '2017-07-12 03:36:41', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(850, 1, 9, 49, '8', '2017-07-12 00:00:00', '0.00', '0.00', '119.00', '0.00', 2, 0, 0, '119.00', '0.00', 0, 2, '', '2017-07-12 03:37:11', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(851, 1, 9, 49, '9', '2017-07-12 00:00:00', '0.00', '0.00', '50.00', '0.00', 2, 0, 0, '50.00', '0.00', 0, 2, '', '2017-07-12 03:37:44', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(852, 1, 0, 49, '10', '2017-07-12 00:00:00', '0.00', '0.00', '45.00', '5.00', 2, 0, 0, '45.00', '0.00', 0, 2, '', '2017-07-12 03:47:02', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(853, 1, 9, 49, '11', '2017-07-12 00:00:00', '0.00', '0.00', '129.00', '0.00', 2, 0, 0, '129.00', '0.00', 0, 2, '', '2017-07-12 03:47:32', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(854, 1, 9, 49, '12', '2017-07-12 00:00:00', '0.00', '0.00', '70.00', '0.00', 2, 0, 0, '70.00', '0.00', 0, 2, '', '2017-07-12 03:48:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(855, 1, 0, 49, '13', '2017-07-12 00:00:00', '0.00', '0.00', '89.00', '10.00', 2, 0, 0, '89.00', '0.00', 0, 2, '', '2017-07-12 03:52:08', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(856, 1, 9, 49, '14', '2017-07-12 00:00:00', '0.00', '0.00', '129.00', '0.00', 2, 0, 0, '129.00', '0.00', 0, 2, '', '2017-07-12 03:52:34', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(857, 1, 9, 49, '15', '2017-07-12 00:00:00', '0.00', '0.00', '129.00', '0.00', 2, 0, 0, '129.00', '0.00', 0, 2, '', '2017-07-12 03:53:00', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(858, 1, 9, 49, '16', '2017-07-12 00:00:00', '0.00', '0.00', '99.00', '0.00', 2, 0, 0, '99.00', '0.00', 0, 2, '', '2017-07-12 03:53:47', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(859, 1, 0, 49, '17', '2017-07-12 00:00:00', '0.00', '0.00', '89.00', '10.00', 2, 0, 0, '89.00', '0.00', 0, 2, '', '2017-07-12 03:57:43', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(860, 1, 0, 49, '18', '2017-07-12 00:00:00', '0.00', '0.00', '40.00', '0.00', 2, 0, 0, '40.00', '0.00', 0, 2, '', '2017-07-12 09:26:54', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(861, 1, 9, 49, '19', '2017-07-12 00:00:00', '0.00', '0.00', '60.00', '0.00', 2, 0, 0, '60.00', '0.00', 0, 2, '', '2017-07-12 09:27:27', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(862, 1, 0, 49, '20', '2017-07-12 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-12 09:34:19', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(863, 1, 9, 49, '21', '2017-07-12 00:00:00', '0.00', '0.00', '60.00', '0.00', 2, 0, 0, '60.00', '0.00', 0, 2, '', '2017-07-12 09:34:44', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(864, 1, 9, 49, '22', '2017-07-12 00:00:00', '0.00', '0.00', '40.00', '0.00', 2, 0, 0, '40.00', '0.00', 0, 2, '', '2017-07-12 09:35:11', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(865, 1, 0, 49, '23', '2017-07-12 00:00:00', '0.00', '0.00', '99.00', '0.00', 2, 0, 0, '99.00', '0.00', 0, 2, '', '2017-07-12 09:39:51', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(866, 1, 9, 49, '24', '2017-07-12 00:00:00', '0.00', '0.00', '70.00', '0.00', 2, 0, 0, '70.00', '0.00', 0, 2, '', '2017-07-12 09:40:57', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(867, 1, 0, 49, '1', '2017-07-13 00:00:00', '0.00', '0.00', '80.00', '0.00', 2, 0, 0, '80.00', '0.00', 0, 2, '', '2017-07-13 06:55:38', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(868, 1, 0, 49, '2', '2017-07-13 00:00:00', '0.00', '0.00', '99.00', '0.00', 2, 0, 0, '99.00', '0.00', 0, 2, '', '2017-07-13 07:01:35', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(869, 1, 0, 49, '3', '2017-07-13 00:00:00', '0.00', '0.00', '60.00', '0.00', 2, 0, 0, '60.00', '0.00', 0, 2, '', '2017-07-13 10:48:13', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(870, 1, 0, 49, '4', '2017-07-13 00:00:00', '0.00', '0.00', '54.00', '6.00', 2, 0, 0, '54.00', '0.00', 0, 2, '', '2017-07-13 10:51:22', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(871, 1, 0, 49, '5', '2017-07-13 00:00:00', '0.00', '0.00', '99.00', '0.00', 2, 0, 0, '99.00', '0.00', 0, 2, '', '2017-07-13 11:04:48', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(872, 1, 0, 49, '6', '2017-07-13 00:00:00', '0.00', '0.00', '36.00', '4.00', 2, 0, 0, '36.00', '0.00', 0, 2, '', '2017-07-13 11:07:01', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(873, 1, 0, 49, '1', '2017-07-15 00:00:00', '0.00', '60.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 0, 2, '', '2017-07-15 10:19:29', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(874, 1, 0, 49, '2', '2017-07-15 00:00:00', '0.00', '115.00', '115.00', '0.00', 1, 0, 0, '115.00', '0.00', 0, 2, '', '2017-07-15 10:30:27', NULL, NULL, NULL, NULL, '2017-07-21 06:31:51', '2017-07-21 06:31:51', 1),
(889, 1, 6, 0, '1', '2017-07-24 00:00:00', '0.00', '608.00', '608.00', '0.00', 1, 0, 0, '269.00', '0.00', 1, 2, '', '2017-07-24 13:35:50', NULL, 5, 5, 0, '2017-07-24 08:02:36', '2017-07-24 13:35:50', 1),
(890, 1, 6, 0, '2', '2017-07-24 00:00:00', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, '0.00', '0.00', 0, 1, '', '2017-07-24 13:38:27', NULL, 5, 0, 0, '2017-07-24 13:38:27', '2017-07-24 13:38:27', 1),
(891, 1, 6, 0, '3', '2017-07-24 00:00:00', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, '0.00', '0.00', 0, 1, '', '2017-07-24 13:38:42', NULL, 4, 0, 0, '2017-07-24 13:38:42', '2017-07-24 13:38:42', 1),
(892, 1, 6, 0, '4', '2017-07-24 00:00:00', '0.00', '129.00', '129.00', '0.00', 1, 0, 0, '129.00', '0.00', 1, 4, '', '2017-07-24 13:45:51', NULL, 5, 5, 0, '2017-07-24 13:45:34', '2017-07-24 13:45:51', 1),
(893, 1, 6, 0, '5', '2017-07-24 00:00:00', '0.00', '129.00', '129.00', '0.00', 1, 0, 0, '129.00', '0.00', 1, 4, '', '2017-07-24 13:46:17', NULL, 4, 5, 0, '2017-07-24 13:46:07', '2017-07-24 13:46:17', 1),
(894, 1, 6, 0, '6', '2017-07-24 00:00:00', '0.00', '129.00', '129.00', '0.00', 1, 0, 0, '129.00', '0.00', 1, 4, '', '2017-07-24 13:51:34', NULL, 5, 5, 0, '2017-07-24 13:51:23', '2017-07-24 13:51:34', 1),
(895, 1, 6, 0, '1', '2017-07-25 00:00:00', '0.00', '400.00', '400.00', '0.00', 1, 0, 0, '400.00', '0.00', 1, 4, '', '2017-07-25 08:24:32', NULL, 5, 5, 0, '2017-07-25 08:22:48', '2017-07-25 08:24:32', 1),
(896, 1, 6, 0, '2', '2017-07-25 00:00:00', '0.00', '384.00', '379.50', '4.50', 0, 0, 0, '0.00', '0.00', 0, 2, '', '2017-07-25 13:44:16', NULL, 5, 5, 0, '2017-07-25 10:02:15', '2017-07-25 13:44:16', 1),
(897, 1, 6, 0, '3', '2017-07-25 00:00:00', '0.00', '70.00', '70.00', '0.00', 0, 0, 0, '0.00', '0.00', 0, 2, '', '2017-07-25 13:33:39', NULL, 4, 5, 0, '2017-07-25 13:32:48', '2017-07-25 13:33:39', 1),
(904, 1, 6, 0, '1', '2017-07-26 00:00:00', '0.00', '210.00', '210.00', '0.00', 1, 0, 0, '210.00', '0.00', 1, 4, '', '2017-07-26 09:54:06', 4, 6, 5, 0, '2017-07-26 09:42:46', '2017-07-26 09:54:06', 1),
(905, 1, 6, 0, '2', '2017-07-26 00:00:00', '0.00', '383.00', '383.00', '0.00', 1, 0, 0, '383.00', '0.00', 1, 4, '', '2017-07-26 09:53:36', 4, 5, 5, 0, '2017-07-26 09:52:21', '2017-07-26 09:53:36', 1),
(906, 1, 6, 0, '3', '2017-07-26 00:00:00', '0.00', '70.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 1, 4, '', '2017-07-26 09:55:35', 4, 4, 5, 0, '2017-07-26 09:53:59', '2017-07-26 09:55:35', 1),
(907, 1, 6, 0, '4', '2017-07-26 00:00:00', '0.00', '70.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 1, 4, '', '2017-07-26 09:56:00', 4, 7, 5, 0, '2017-07-26 09:55:48', '2017-07-26 09:56:00', 1),
(908, 1, 6, 0, '5', '2017-07-26 00:00:00', '0.00', '70.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 1, 4, '', '2017-07-26 10:02:22', 4, 7, 5, 0, '2017-07-26 09:56:53', '2017-07-26 10:02:22', 1),
(909, 1, 6, 0, '6', '2017-07-26 00:00:00', '0.00', '199.00', '199.00', '0.00', 1, 0, 0, '199.00', '0.00', 1, 4, '', '2017-07-26 10:54:20', 4, 4, 5, 0, '2017-07-26 10:54:06', '2017-07-26 10:54:20', 1),
(910, 1, 6, 0, '7', '2017-07-26 00:00:00', '0.00', '99.00', '99.00', '0.00', 1, 0, 0, '99.00', '0.00', 1, 4, '', '2017-07-26 10:54:50', 4, 4, 5, 0, '2017-07-26 10:54:39', '2017-07-26 10:54:50', 1),
(911, 1, 6, 0, '1', '2017-07-27 00:00:00', '0.00', '60.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 4, '', '2017-07-27 11:11:28', 4, 4, 5, 0, '2017-07-27 11:11:17', '2017-07-27 11:11:28', 1),
(912, 1, 6, 0, '2', '2017-07-27 00:00:00', '0.00', '70.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 1, 4, '', '2017-07-27 11:13:29', 4, 4, 5, 0, '2017-07-27 11:12:59', '2017-07-27 11:13:29', 1),
(913, 1, 6, 0, '3', '2017-07-27 00:00:00', '0.00', '199.00', '199.00', '0.00', 1, 0, 0, '199.00', '0.00', 1, 4, '', '2017-07-27 11:43:36', 4, 4, 5, 0, '2017-07-27 11:39:47', '2017-07-27 11:43:36', 1),
(922, 1, 6, 0, '5', '2017-07-28 00:00:00', '0.00', '199.00', '199.00', '0.00', 1, 0, 0, '199.00', '0.00', 1, 4, '', '2017-07-28 11:55:47', 4, 6, 5, 0, '2017-07-28 09:55:53', '2017-07-28 11:55:47', 1),
(923, 1, 6, 0, '6', '2017-07-28 00:00:00', '0.00', '40.00', '40.00', '0.00', 1, 0, 0, '40.00', '0.00', 1, 4, '', '2017-07-28 10:54:11', 4, 4, 5, 0, '2017-07-28 09:56:08', '2017-07-28 10:54:11', 1),
(924, 1, 6, 0, '3', '2017-07-28 00:00:00', '0.00', '249.00', '249.00', '0.00', 1, 0, 0, '249.00', '0.00', 1, 4, '', '2017-07-28 12:17:02', 4, 6, 5, 0, '2017-07-28 11:49:54', '2017-07-28 12:17:02', 1),
(925, 1, 6, 0, '4', '2017-07-28 00:00:00', '0.00', '728.00', '728.00', '0.00', 1, 0, 0, '728.00', '0.00', 1, 4, '', '2017-07-28 12:23:18', 4, 6, 5, 0, '2017-07-28 12:21:04', '2017-07-28 12:23:18', 1),
(926, 1, 6, 0, '1', '2017-08-08 00:00:00', '0.00', '228.00', '228.00', '0.00', 1, 0, 0, '228.00', '0.00', 1, 4, '', '2017-08-08 17:21:47', 4, 4, 5, 0, '2017-08-08 17:19:32', '2017-08-08 17:21:47', 1),
(927, 1, 6, 0, '2', '2017-08-08 00:00:00', '0.00', '228.00', '228.00', '0.00', 1, 0, 0, '228.00', '0.00', 1, 4, '', '2017-08-08 17:24:25', 4, 4, 5, 0, '2017-08-08 17:20:17', '2017-08-08 17:24:25', 1),
(928, 1, 6, 0, '3', '2017-08-08 00:00:00', '0.00', '80.00', '80.00', '0.00', 1, 0, 0, '80.00', '0.00', 1, 4, '', '2017-08-08 17:33:21', 4, 4, 5, 0, '2017-08-08 17:24:33', '2017-08-08 17:33:21', 1),
(929, 1, 6, 0, '4', '2017-08-08 00:00:00', '0.00', '60.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 1, 4, '', '2017-08-08 17:34:02', 4, 4, 5, 0, '2017-08-08 17:33:48', '2017-08-08 17:34:02', 1),
(930, 1, 6, 0, '1', '2017-08-09 00:00:00', '0.00', '169.00', '169.00', '0.00', 1, 0, 0, '169.00', '0.00', 1, 4, '', '2017-08-09 07:20:55', 4, 4, 5, 0, '2017-08-09 07:20:15', '2017-08-09 07:20:55', 1),
(931, 1, 6, 0, '2', '2017-08-09 00:00:00', '0.00', '129.00', '129.00', '0.00', 2, 0, 0, '129.00', '0.00', 1, 4, '', '2017-08-09 10:41:34', 4, 4, 5, 0, '2017-08-09 07:22:57', '2017-08-09 07:23:36', 1),
(932, 1, 6, 7, '3', '2017-08-09 00:00:00', '0.00', '129.00', '129.00', '0.00', 1, 0, 0, '129.00', '0.00', 0, 4, '', '2017-08-09 07:59:35', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(933, 1, 6, 0, '4', '2017-08-09 00:00:00', '0.00', '252.00', '252.00', '0.00', 1, 0, 0, '252.00', '0.00', 1, 4, '', '2017-08-09 08:11:18', 4, 4, 5, 0, '2017-08-09 08:03:59', '2017-08-09 08:11:18', 1),
(934, 1, 6, 0, '5', '2017-08-09 00:00:00', '0.00', '199.00', '199.00', '0.00', 3, 0, 0, '199.00', '0.00', 1, 4, '', '2017-08-09 10:41:34', 4, 4, 5, 0, '2017-08-09 08:11:41', '2017-08-09 08:13:21', 1),
(935, 1, 6, 0, '6', '2017-08-09 00:00:00', '0.00', '179.00', '179.00', '0.00', 2, 0, 0, '179.00', '0.00', 1, 4, '', '2017-08-09 10:41:34', 4, 5, 5, 0, '2017-08-09 08:12:31', '2017-08-09 08:13:12', 1),
(936, 1, 6, 0, '7', '2017-08-09 00:00:00', '0.00', '70.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 1, 4, '', '2017-08-09 08:13:57', 4, 8, 5, 0, '2017-08-09 08:13:33', '2017-08-09 08:13:57', 1),
(937, 1, 6, 7, '8', '2017-08-09 00:00:00', '0.00', '169.00', '169.00', '0.00', 1, 0, 0, '169.00', '0.00', 0, 4, '', '2017-08-09 11:28:45', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(938, 1, 6, 0, '9', '2017-08-09 00:00:00', '0.00', '99.00', '99.00', '0.00', 1, 0, 0, '99.00', '0.00', 1, 4, '', '2017-08-09 10:08:02', 4, 9, 6, 0, '2017-08-09 10:06:53', '2017-08-09 10:08:02', 1),
(939, 1, 6, 0, '10', '2017-08-09 00:00:00', '0.00', '99.00', '99.00', '0.00', 1, 0, 0, '99.00', '0.00', 1, 4, '', '2017-08-09 10:08:21', 4, 9, 6, 0, '2017-08-09 10:08:11', '2017-08-09 10:08:21', 1),
(940, 1, 6, 0, '11', '2017-08-09 00:00:00', '0.00', '198.00', '198.00', '0.00', 3, 0, 0, '198.00', '0.00', 1, 4, '', '2017-08-09 10:41:34', 4, 9, 6, 0, '2017-08-09 10:08:37', '2017-08-09 10:09:49', 1),
(941, 1, 6, 49, '12', '2017-08-09 00:00:00', '0.00', '140.00', '140.00', '0.00', 1, 0, 0, '140.00', '0.00', 0, 4, '', '2017-08-09 12:43:06', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(942, 1, 6, 49, '13', '2017-08-09 00:00:00', '0.00', '105.00', '105.00', '0.00', 1, 0, 0, '105.00', '0.00', 0, 2, '', '2017-08-09 12:43:56', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(943, 1, 6, 49, '14', '2017-08-09 00:00:00', '0.00', '140.00', '140.00', '0.00', 1, 0, 0, '140.00', '0.00', 0, 2, '', '2017-08-09 13:04:02', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(944, 1, 6, 0, '15', '2017-08-09 00:00:00', '0.00', '129.00', '129.00', '0.00', 1, 0, 0, '129.00', '0.00', 1, 4, '', '2017-08-09 13:47:32', 4, 9, 6, 0, '2017-08-09 13:47:22', '2017-08-09 13:47:32', 1),
(945, 1, 6, 0, '1', '2017-08-10 00:00:00', '0.00', '122.00', '122.00', '0.00', 1, 0, 0, '122.00', '0.00', 1, 4, '', '2017-08-10 08:36:29', 4, 4, 5, 0, '2017-08-10 07:39:17', '2017-08-10 08:36:29', 1),
(946, 1, 6, 0, '2', '2017-08-10 00:00:00', '0.00', '63.00', '63.00', '0.00', 1, 0, 0, '63.00', '0.00', 1, 4, '', '2017-08-10 08:36:38', 4, 5, 5, 0, '2017-08-10 07:40:43', '2017-08-10 08:36:38', 1),
(947, 1, 6, 7, '1', '2017-08-10 00:00:00', '0.00', '60.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 0, 4, '', '2017-08-10 13:41:19', 4, NULL, 3, NULL, NULL, NULL, 1),
(948, 1, 6, 0, '3', '2017-08-10 00:00:00', '0.00', '169.00', '169.00', '0.00', 0, 0, 0, '0.00', '0.00', 0, 2, '', '2017-08-10 13:47:16', 4, 4, 5, 0, '2017-08-10 13:42:26', '2017-08-10 13:47:16', 1),
(949, 1, 6, 0, '4', '2017-08-10 00:00:00', '0.00', '278.00', '278.00', '0.00', 1, 0, 0, '278.00', '0.00', 1, 4, '', '2017-08-10 14:11:54', 4, 6, 5, 0, '2017-08-10 13:43:26', '2017-08-10 14:11:54', 1),
(950, 1, 6, 0, '5', '2017-08-10 00:00:00', '0.00', '70.00', '70.00', '0.00', 0, 0, 0, '0.00', '0.00', 0, 2, '', '2017-08-10 13:48:54', 4, 7, 5, 0, '2017-08-10 13:44:10', '2017-08-10 13:48:54', 1),
(951, 1, 6, 0, '6', '2017-08-10 00:00:00', '0.00', '129.00', '129.00', '0.00', 0, 0, 0, '0.00', '0.00', 0, 2, '', '2017-08-10 14:10:31', 4, 5, 5, 0, '2017-08-10 13:44:23', '2017-08-10 14:10:31', 1),
(952, 1, 6, 0, '7', '2017-08-10 00:00:00', '0.00', '159.00', '159.00', '0.00', 0, 0, 0, '0.00', '0.00', 0, 2, '', '2017-08-10 14:10:34', 4, 8, 5, 0, '2017-08-10 13:50:32', '2017-08-10 14:10:34', 1),
(953, 1, 6, 7, '2', '2017-08-10 00:00:00', '0.00', '99.00', '99.00', '0.00', 1, 0, 0, '99.00', '0.00', 0, 2, '', '2017-08-10 14:36:50', 4, NULL, 3, NULL, NULL, NULL, 1),
(954, 1, 6, 0, '8', '2017-08-10 00:00:00', '0.00', '99.00', '99.00', '0.00', 0, 0, 0, '0.00', '0.00', 0, 1, '', '2017-08-10 14:37:30', 4, 6, 5, 0, '2017-08-10 14:37:29', '2017-08-10 14:37:30', 1),
(955, 1, 6, 0, '1', '2017-08-11 00:00:00', '0.00', '349.00', '349.00', '0.00', 1, 0, 0, '349.00', '0.00', 1, 4, '', '2017-08-11 10:14:22', 4, 5, 5, 0, '2017-08-11 08:53:12', '2017-08-11 10:14:22', 1),
(956, 1, 6, 0, '2', '2017-08-11 00:00:00', '0.00', '268.00', '268.00', '0.00', 1, 0, 0, '268.00', '0.00', 1, 4, '', '2017-08-11 10:15:23', 4, 6, 5, 0, '2017-08-11 08:53:31', '2017-08-11 10:15:23', 1),
(957, 1, 6, 0, '3', '2017-08-11 00:00:00', '0.00', '70.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 1, 4, '', '2017-08-11 10:17:57', 4, 5, 5, 0, '2017-08-11 10:17:46', '2017-08-11 10:17:57', 1),
(958, 1, 6, 0, '4', '2017-08-11 00:00:00', '0.00', '70.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 1, 4, '', '2017-08-11 10:28:21', 4, 5, 5, 0, '2017-08-11 10:21:47', '2017-08-11 10:28:21', 1),
(959, 1, 6, 0, '5', '2017-08-11 00:00:00', '0.00', '99.00', '99.00', '0.00', 1, 0, 0, '99.00', '0.00', 1, 4, '', '2017-08-11 13:59:51', 4, 4, 5, 0, '2017-08-11 13:35:55', '2017-08-11 13:59:51', 1),
(960, 1, 6, 0, '6', '2017-08-11 00:00:00', '0.00', '110.00', '110.00', '0.00', 1, 0, 0, '110.00', '0.00', 1, 4, '', '2017-08-11 14:31:53', 4, 5, 5, 0, '2017-08-11 13:38:26', '2017-08-11 14:31:53', 1),
(961, 1, 6, 0, '7', '2017-08-11 00:00:00', '0.00', '438.00', '438.00', '0.00', 1, 0, 0, '438.00', '0.00', 1, 4, '', '2017-08-11 14:15:21', 4, 6, 5, 0, '2017-08-11 13:38:40', '2017-08-11 14:15:21', 1),
(962, 1, 6, 49, '1', '2017-08-14 00:00:00', '0.00', '120.00', '115.00', '5.00', 2, 0, 0, '115.00', '0.00', 0, 4, '', '2017-08-14 08:11:28', 4, NULL, 3, NULL, NULL, NULL, 1),
(963, 1, 6, 49, '1', '2017-08-17 00:00:00', '0.00', '100.00', '96.00', '4.00', 1, 0, 0, '96.00', '0.00', 0, 4, '', '2017-08-17 06:43:07', 4, NULL, 3, NULL, NULL, NULL, 1),
(964, 1, 6, 49, '2', '2017-08-17 00:00:00', '0.00', '120.00', '115.00', '5.00', 1, 0, 0, '115.00', '0.00', 0, 4, '', '2017-08-17 06:52:42', 4, NULL, 3, NULL, NULL, NULL, 1),
(965, 1, 6, 0, '1', '2017-08-17 00:00:00', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, '0.00', '0.00', 0, 1, '', '2017-08-17 09:46:32', 4, 4, 5, 0, '2017-08-17 09:46:32', '2017-08-17 09:46:32', 1),
(966, 1, 6, 49, '3', '2017-08-17 00:00:00', '0.00', '115.00', '115.00', '0.00', 1, 0, 0, '115.00', '0.00', 0, 2, '', '2017-08-17 09:48:28', 4, NULL, 3, NULL, NULL, NULL, 1);
INSERT INTO `pos_sales_order` (`sales_order_id`, `company_id`, `employee_id`, `customer_id`, `sales_order_no`, `sales_order_date`, `tax_amount`, `subtotal_amount`, `final_amount`, `discount_amount`, `payment_method_id`, `payment_split`, `payment_split_type`, `paid_amount`, `remaining_amount`, `sales_order_payment_status_id`, `sales_order_status_id`, `payment_response`, `update_date`, `location_id`, `table_id`, `floor_id`, `sales_order_type_id`, `created_at`, `updated_at`, `order_from_id`) VALUES
(967, 1, 6, 0, '1', '2017-08-19 00:00:00', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, '0.00', '0.00', 0, 1, '', '2017-08-19 12:28:29', 4, 4, 5, 0, '2017-08-19 12:28:29', '2017-08-19 12:28:29', 1),
(968, 1, 6, 49, '1', '2017-08-19 00:00:00', '0.00', '40.00', '36.00', '4.00', 1, 0, 0, '36.00', '0.00', 0, 2, '', '2017-08-19 12:55:51', 4, NULL, 3, NULL, NULL, NULL, 1),
(969, 1, 6, 49, '2', '2017-08-19 00:00:00', '0.00', '40.00', '36.00', '4.00', 1, 0, 0, '36.00', '0.00', 0, 2, '', '2017-08-19 12:57:44', 4, NULL, 3, NULL, NULL, NULL, 1),
(970, 1, 6, 49, '3', '2017-08-19 00:00:00', '0.00', '60.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 0, 2, '', '2017-08-19 12:59:12', 4, NULL, 3, NULL, NULL, NULL, 1),
(971, 1, 6, 49, '4', '2017-08-19 00:00:00', '0.00', '60.00', '54.00', '6.00', 1, 0, 0, '54.00', '0.00', 0, 2, '', '2017-08-19 13:00:59', 4, NULL, 3, NULL, NULL, NULL, 1),
(972, 1, 6, 49, '5', '2017-08-19 00:00:00', '0.00', '70.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 0, 2, '', '2017-08-19 13:03:27', 4, NULL, 3, NULL, NULL, NULL, 1),
(973, 1, 6, 49, '6', '2017-08-19 00:00:00', '0.00', '99.00', '99.00', '0.00', 1, 0, 0, '99.00', '0.00', 0, 2, '', '2017-08-19 13:13:20', 4, NULL, 3, NULL, NULL, NULL, 1),
(974, 1, 6, 49, '7', '2017-08-19 00:00:00', '0.00', '249.00', '244.00', '5.00', 1, 0, 0, '244.00', '0.00', 0, 2, '', '2017-08-19 13:17:31', 4, NULL, 3, NULL, NULL, NULL, 1),
(975, 1, 6, 49, '8', '2017-08-19 00:00:00', '0.00', '174.00', '174.00', '0.00', 1, 0, 0, '174.00', '0.00', 0, 2, '', '2017-08-19 13:25:09', 4, NULL, 3, NULL, NULL, NULL, 1),
(976, 1, 6, 0, '1', '2017-08-22 00:00:00', '0.00', '279.00', '279.00', '0.00', 1, 0, 0, '279.00', '0.00', 1, 4, '', '2017-08-22 12:38:45', 4, 4, 5, 0, '2017-08-22 10:33:29', '2017-08-22 12:38:45', 1),
(977, 1, 6, 0, '2', '2017-08-22 00:00:00', '0.00', '169.00', '169.00', '0.00', 1, 0, 0, '169.00', '0.00', 1, 4, '', '2017-08-22 12:43:15', 4, 5, 5, 0, '2017-08-22 12:42:58', '2017-08-22 12:43:15', 1),
(978, 1, 6, 0, '3', '2017-08-22 00:00:00', '0.00', '228.00', '228.00', '0.00', 1, 0, 0, '228.00', '0.00', 1, 4, '', '2017-08-22 12:45:38', 4, 5, 5, 0, '2017-08-22 12:45:25', '2017-08-22 12:45:38', 1),
(979, 1, 6, 0, '4', '2017-08-22 00:00:00', '0.00', '269.00', '269.00', '0.00', 1, 0, 0, '269.00', '0.00', 1, 4, '', '2017-08-22 12:48:29', 4, 5, 5, 0, '2017-08-22 12:48:15', '2017-08-22 12:48:29', 1),
(980, 1, 6, 0, '5', '2017-08-22 00:00:00', '0.00', '278.00', '278.00', '0.00', 1, 0, 0, '278.00', '0.00', 1, 4, '', '2017-08-22 12:52:20', 4, 5, 5, 0, '2017-08-22 12:51:46', '2017-08-22 12:52:20', 1),
(981, 1, 6, 0, '6', '2017-08-22 00:00:00', '0.00', '298.00', '298.00', '0.00', 1, 0, 0, '298.00', '0.00', 1, 4, '', '2017-08-22 12:54:19', 4, 5, 5, 0, '2017-08-22 12:54:01', '2017-08-22 12:54:19', 1),
(982, 1, 6, 0, '7', '2017-08-22 00:00:00', '0.00', '298.00', '298.00', '0.00', 1, 0, 0, '298.00', '0.00', 1, 4, '', '2017-08-22 13:10:26', 4, 6, 5, 0, '2017-08-22 13:07:02', '2017-08-22 13:10:26', 1),
(983, 1, 6, 0, '8', '2017-08-22 00:00:00', '0.00', '130.00', '130.00', '0.00', 1, 0, 0, '130.00', '0.00', 1, 4, '', '2017-08-22 13:19:25', 4, 4, 5, 0, '2017-08-22 13:19:13', '2017-08-22 13:19:25', 1),
(984, 1, 6, 49, '1', '2017-08-22 00:00:00', '0.00', '298.00', '298.00', '0.00', 1, 0, 0, '298.00', '0.00', 0, 2, '', '2017-08-22 14:24:55', 4, NULL, 3, NULL, NULL, NULL, 1),
(985, 1, 6, 49, '2', '2017-08-22 00:00:00', '0.00', '298.00', '298.00', '0.00', 1, 0, 0, '298.00', '0.00', 0, 2, '', '2017-08-22 14:33:29', 4, NULL, 3, NULL, NULL, NULL, 1),
(986, 1, 6, 0, '1', '2017-08-23 00:00:00', '0.00', '140.00', '140.00', '0.00', 1, 0, 0, '140.00', '0.00', 1, 4, '', '2017-08-23 16:19:24', 4, 4, 5, 0, '2017-08-23 16:19:13', '2017-08-23 16:19:24', 1),
(987, 1, 6, 0, '2', '2017-08-23 00:00:00', '0.00', '80.00', '80.00', '0.00', 1, 0, 0, '80.00', '0.00', 1, 4, '', '2017-08-23 16:21:32', 4, 5, 5, 0, '2017-08-23 16:21:21', '2017-08-23 16:21:32', 1),
(988, 1, 6, 0, '3', '2017-08-23 00:00:00', '0.00', '40.00', '40.00', '0.00', 1, 0, 0, '40.00', '0.00', 1, 4, '', '2017-08-23 16:24:39', 4, 6, 5, 0, '2017-08-23 16:24:31', '2017-08-23 16:24:39', 1),
(989, 1, 6, 0, '4', '2017-08-23 00:00:00', '0.00', '120.00', '120.00', '0.00', 1, 0, 0, '120.00', '0.00', 1, 4, '', '2017-08-23 16:47:02', 4, 7, 5, 0, '2017-08-23 16:27:45', '2017-08-23 16:47:02', 1),
(990, 1, 6, 49, '1', '2017-08-30 00:00:00', '0.00', '120.00', '120.00', '0.00', 1, 0, 0, '120.00', '0.00', 0, 2, '', '2017-08-30 13:45:57', 4, NULL, 3, NULL, NULL, NULL, 1),
(991, 1, 6, 49, '2', '2017-08-30 00:00:00', '0.00', '363.00', '363.00', '0.00', 1, 0, 0, '363.00', '0.00', 0, 2, '', '2017-08-30 14:24:56', 4, NULL, 3, NULL, NULL, NULL, 1),
(992, 1, 6, 49, '1', '2017-09-06 00:00:00', '0.00', '110.00', '110.00', '0.00', 1, 0, 0, '110.00', '0.00', 0, 2, '', '2017-09-06 05:50:59', 4, NULL, 3, NULL, NULL, NULL, 1),
(993, 1, 6, 49, '1', '2017-10-06 00:00:00', '0.00', '199.00', '199.00', '0.00', 1, 0, 0, '199.00', '0.00', 0, 2, '', '2017-10-06 10:48:51', 4, NULL, 3, NULL, NULL, NULL, 1),
(994, 1, 6, 49, '2', '2017-10-06 00:00:00', '0.00', '110.00', '105.00', '5.00', 1, 0, 0, '105.00', '0.00', 0, 2, '', '2017-10-06 10:52:44', 4, NULL, 3, NULL, NULL, NULL, 1),
(995, 1, 6, 49, '3', '2017-10-06 00:00:00', '0.00', '125.00', '125.00', '0.00', 1, 0, 0, '125.00', '0.00', 0, 2, '', '2017-10-06 10:53:30', 4, NULL, 3, NULL, NULL, NULL, 1),
(996, 1, 6, 49, '4', '2017-10-06 00:00:00', '0.00', '174.00', '174.00', '0.00', 1, 0, 0, '174.00', '0.00', 0, 2, '', '2017-10-06 10:56:24', 4, NULL, 3, NULL, NULL, NULL, 1),
(997, 1, 6, 49, '5', '2017-10-06 00:00:00', '0.00', '219.00', '219.00', '0.00', 1, 0, 0, '219.00', '0.00', 0, 2, '', '2017-10-06 10:56:43', 4, NULL, 3, NULL, NULL, NULL, 1),
(998, 1, 6, 49, '6', '2017-10-06 00:00:00', '0.00', '199.00', '199.00', '0.00', 1, 0, 0, '199.00', '0.00', 0, 2, '', '2017-10-06 10:57:28', 4, NULL, 3, NULL, NULL, NULL, 1),
(999, 1, 6, 49, '1', '2017-10-12 00:00:00', '0.00', '144.00', '144.00', '0.00', 1, 0, 0, '144.00', '0.00', 0, 4, '', '2017-10-12 02:09:35', 4, NULL, 3, NULL, NULL, NULL, 1),
(1000, 1, 6, 49, '2', '2017-10-12 00:00:00', '0.00', '199.00', '199.00', '0.00', 1, 0, 0, '199.00', '0.00', 0, 4, '', '2017-10-12 02:10:56', 4, NULL, 3, NULL, NULL, NULL, 1),
(1001, 1, 6, 49, '3', '2017-10-12 00:00:00', '0.00', '105.00', '105.00', '0.00', 1, 0, 0, '105.00', '0.00', 0, 4, '', '2017-10-12 02:11:08', 4, NULL, 3, NULL, NULL, NULL, 1),
(1002, 1, 6, 49, '4', '2017-10-12 00:00:00', '0.00', '159.00', '159.00', '0.00', 1, 0, 0, '159.00', '0.00', 0, 2, '', '2017-10-12 02:14:17', 4, NULL, 3, NULL, NULL, NULL, 1),
(1003, 1, 6, 49, '1', '2017-10-26 00:00:00', '0.00', '60.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 0, 2, '', '2017-10-26 05:12:19', 4, NULL, 3, NULL, NULL, NULL, 1),
(1004, 1, 6, 49, '2', '2017-10-26 00:00:00', '0.00', '60.00', '54.00', '6.00', 1, 0, 0, '54.00', '0.00', 0, 2, '', '2017-10-26 05:13:42', 4, NULL, 3, NULL, NULL, NULL, 1),
(1005, 1, 6, 49, '3', '2017-10-26 00:00:00', '0.00', '70.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 0, 2, '', '2017-10-26 05:15:16', 4, NULL, 3, NULL, NULL, NULL, 1),
(1006, 1, 6, 49, '4', '2017-10-26 00:00:00', '0.00', '40.00', '40.00', '0.00', 1, 0, 0, '40.00', '0.00', 0, 2, '', '2017-10-26 05:19:59', 4, NULL, 3, NULL, NULL, NULL, 1),
(1007, 1, 6, 49, '1', '2017-10-27 00:00:00', '0.00', '70.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 0, 2, '', '2017-10-27 12:18:56', 4, NULL, 3, NULL, NULL, NULL, 1),
(1008, 1, 6, 49, '2', '2017-10-27 00:00:00', '0.00', '289.00', '289.00', '0.00', 1, 0, 0, '289.00', '0.00', 0, 2, '', '2017-10-27 12:24:18', 4, NULL, 3, NULL, NULL, NULL, 1),
(1009, 1, 6, 49, '3', '2017-10-27 00:00:00', '0.00', '200.00', '200.00', '0.00', 1, 0, 0, '200.00', '0.00', 0, 2, '', '2017-10-27 12:47:50', 4, NULL, 3, NULL, NULL, NULL, 1),
(1010, 1, 6, 49, '1', '2017-10-30 00:00:00', '0.00', '105.00', '105.00', '0.00', 1, 0, 0, '105.00', '0.00', 0, 2, '', '2017-10-30 13:13:02', 4, NULL, 3, NULL, NULL, NULL, 1),
(1011, 1, 6, 49, '2', '2017-10-30 00:00:00', '0.00', '199.00', '199.00', '0.00', 1, 0, 0, '199.00', '0.00', 0, 2, '', '2017-10-30 13:16:54', 4, NULL, 3, NULL, NULL, NULL, 1),
(1012, 1, 6, 49, '3', '2017-10-30 00:00:00', '0.00', '189.00', '189.00', '0.00', 1, 0, 0, '189.00', '0.00', 0, 2, '', '2017-10-30 13:18:42', 4, NULL, 3, NULL, NULL, NULL, 1),
(1013, 1, 6, 49, '1', '2017-10-31 00:00:00', '0.00', '150.00', '150.00', '0.00', 1, 0, 0, '150.00', '0.00', 0, 2, '', '2017-10-31 04:26:18', 4, NULL, 3, NULL, NULL, NULL, 1),
(1014, 1, 6, 49, '2', '2017-10-31 00:00:00', '0.00', '105.00', '105.00', '0.00', 1, 0, 0, '105.00', '0.00', 0, 2, '', '2017-10-31 04:29:24', 4, NULL, 3, NULL, NULL, NULL, 1),
(1015, 1, 6, 49, '3', '2017-10-31 00:00:00', '0.00', '144.00', '144.00', '0.00', 1, 0, 0, '144.00', '0.00', 0, 2, '', '2017-10-31 08:06:37', 4, NULL, 3, NULL, NULL, NULL, 1),
(1016, 1, 6, 49, '4', '2017-10-31 00:00:00', '0.00', '199.00', '199.00', '0.00', 1, 0, 0, '199.00', '0.00', 0, 2, '', '2017-10-31 09:07:14', 4, NULL, 3, NULL, NULL, NULL, 1),
(1017, 1, 6, 49, '5', '2017-10-31 00:00:00', '0.00', '199.00', '199.00', '0.00', 1, 0, 0, '199.00', '0.00', 0, 2, '', '2017-10-31 09:08:41', 4, NULL, 3, NULL, NULL, NULL, 1),
(1018, 1, 6, 49, '6', '2017-10-31 00:00:00', '0.00', '129.00', '129.00', '0.00', 1, 0, 0, '129.00', '0.00', 0, 2, '', '2017-10-31 09:09:51', 4, NULL, 3, NULL, NULL, NULL, 1),
(1019, 1, 6, 49, '7', '2017-10-31 00:00:00', '0.00', '258.00', '258.00', '0.00', 1, 0, 0, '258.00', '0.00', 0, 2, '', '2017-10-31 09:11:39', 4, NULL, 3, NULL, NULL, NULL, 1),
(1020, 1, 6, 49, '1', '2017-11-01 00:00:00', '0.00', '159.00', '159.00', '0.00', 1, 0, 0, '159.00', '0.00', 0, 2, '', '2017-11-01 05:45:38', 4, NULL, 3, NULL, NULL, NULL, 1),
(1021, 1, 6, 49, '2', '2017-11-01 00:00:00', '0.00', '199.00', '199.00', '0.00', 1, 0, 0, '199.00', '0.00', 0, 2, '', '2017-11-01 06:13:23', 4, NULL, 3, NULL, NULL, NULL, 1),
(1022, 1, 6, 49, '3', '2017-11-01 00:00:00', '0.00', '140.00', '140.00', '0.00', 1, 0, 0, '140.00', '0.00', 0, 2, '', '2017-11-01 06:15:50', 4, NULL, 3, NULL, NULL, NULL, 1),
(1023, 1, 6, 49, '4', '2017-11-01 00:00:00', '0.00', '105.00', '105.00', '0.00', 1, 0, 0, '105.00', '0.00', 0, 2, '', '2017-11-01 06:18:04', 4, NULL, 3, NULL, NULL, NULL, 1),
(1024, 1, 6, 49, '5', '2017-11-01 00:00:00', '0.00', '150.00', '150.00', '0.00', 1, 0, 0, '150.00', '0.00', 0, 2, '', '2017-11-01 06:20:02', 4, NULL, 3, NULL, NULL, NULL, 1),
(1025, 1, 6, 49, '6', '2017-11-01 00:00:00', '0.00', '140.00', '140.00', '0.00', 1, 0, 0, '140.00', '0.00', 0, 2, '', '2017-11-01 06:21:24', 4, NULL, 3, NULL, NULL, NULL, 1),
(1026, 1, 6, 49, '7', '2017-11-01 00:00:00', '0.00', '189.00', '189.00', '0.00', 1, 0, 0, '189.00', '0.00', 0, 2, '', '2017-11-01 06:22:38', 4, NULL, 3, NULL, NULL, NULL, 1),
(1027, 1, 6, 49, '8', '2017-11-01 00:00:00', '0.00', '115.00', '115.00', '0.00', 1, 0, 0, '115.00', '0.00', 0, 2, '', '2017-11-01 06:29:41', 4, NULL, 3, NULL, NULL, NULL, 1),
(1028, 1, 6, 49, '9', '2017-11-01 00:00:00', '0.00', '169.00', '169.00', '0.00', 1, 0, 0, '169.00', '0.00', 0, 2, '', '2017-11-01 06:31:01', 4, NULL, 3, NULL, NULL, NULL, 1),
(1029, 1, 6, 49, '10', '2017-11-01 00:00:00', '0.00', '228.00', '228.00', '0.00', 1, 0, 0, '228.00', '0.00', 0, 2, '', '2017-11-01 06:32:37', 4, NULL, 3, NULL, NULL, NULL, 1),
(1030, 1, 6, 49, '11', '2017-11-01 00:00:00', '0.00', '115.00', '115.00', '0.00', 1, 0, 0, '115.00', '0.00', 0, 2, '', '2017-11-01 06:36:16', 4, NULL, 3, NULL, NULL, NULL, 1),
(1031, 1, 6, 49, '12', '2017-11-01 00:00:00', '0.00', '169.00', '169.00', '0.00', 1, 0, 0, '169.00', '0.00', 0, 2, '', '2017-11-01 06:37:37', 4, NULL, 3, NULL, NULL, NULL, 1),
(1032, 1, 6, 49, '13', '2017-11-01 00:00:00', '0.00', '60.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 0, 2, '', '2017-11-01 06:37:58', 4, NULL, 3, NULL, NULL, NULL, 1),
(1033, 1, 6, 49, '14', '2017-11-01 00:00:00', '0.00', '60.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 0, 2, '', '2017-11-01 06:37:59', 4, NULL, 3, NULL, NULL, NULL, 1),
(1034, 1, 6, 49, '15', '2017-11-01 00:00:00', '0.00', '60.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 0, 2, '', '2017-11-01 06:38:00', 4, NULL, 3, NULL, NULL, NULL, 1),
(1035, 1, 6, 49, '16', '2017-11-01 00:00:00', '0.00', '60.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 0, 2, '', '2017-11-01 06:38:01', 4, NULL, 3, NULL, NULL, NULL, 1),
(1036, 1, 6, 49, '17', '2017-11-01 00:00:00', '0.00', '60.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 0, 2, '', '2017-11-01 06:40:27', 4, NULL, 3, NULL, NULL, NULL, 1),
(1037, 1, 6, 49, '18', '2017-11-01 00:00:00', '0.00', '60.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 0, 2, '', '2017-11-01 06:41:10', 4, NULL, 3, NULL, NULL, NULL, 1),
(1038, 1, 6, 49, '19', '2017-11-01 00:00:00', '0.00', '60.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 0, 2, '', '2017-11-01 06:41:45', 4, NULL, 3, NULL, NULL, NULL, 1),
(1039, 1, 6, 49, '20', '2017-11-01 00:00:00', '0.00', '45.00', '45.00', '0.00', 1, 0, 0, '45.00', '0.00', 0, 2, '', '2017-11-01 06:42:15', 4, NULL, 3, NULL, NULL, NULL, 1),
(1040, 1, 6, 49, '21', '2017-11-01 00:00:00', '0.00', '60.00', '60.00', '0.00', 1, 0, 0, '60.00', '0.00', 0, 2, '', '2017-11-01 06:42:42', 4, NULL, 3, NULL, NULL, NULL, 1),
(1041, 1, 6, 49, '22', '2017-11-01 00:00:00', '0.00', '115.00', '115.00', '0.00', 1, 0, 0, '115.00', '0.00', 0, 2, '', '2017-11-01 06:46:01', 4, NULL, 3, NULL, NULL, NULL, 1),
(1042, 1, 6, 49, '23', '2017-11-01 00:00:00', '0.00', '130.00', '130.00', '0.00', 1, 0, 0, '130.00', '0.00', 0, 2, '', '2017-11-01 06:52:36', 4, NULL, 3, NULL, NULL, NULL, 1),
(1043, 1, 6, 49, '1', '2017-11-02 00:00:00', '0.00', '169.00', '165.00', '4.00', 1, 0, 0, '165.00', '0.00', 0, 2, '', '2017-11-02 03:16:55', 4, NULL, 3, NULL, NULL, NULL, 1),
(1044, 1, 6, 49, '2', '2017-11-02 00:00:00', '0.00', '189.00', '189.00', '0.00', 1, 0, 0, '189.00', '0.00', 0, 2, '', '2017-11-02 03:21:26', 4, NULL, 3, NULL, NULL, NULL, 1),
(1045, 1, 6, 49, '3', '2017-11-02 00:00:00', '0.00', '160.00', '160.00', '0.00', 1, 0, 0, '160.00', '0.00', 0, 2, '', '2017-11-02 03:22:58', 4, NULL, 3, NULL, NULL, NULL, 1),
(1046, 1, 6, 49, '4', '2017-11-02 00:00:00', '0.00', '105.00', '105.00', '0.00', 1, 0, 0, '105.00', '0.00', 0, 2, '', '2017-11-02 03:24:36', 4, NULL, 3, NULL, NULL, NULL, 1),
(1047, 1, 6, 49, '5', '2017-11-02 00:00:00', '0.00', '159.00', '159.00', '0.00', 1, 0, 0, '159.00', '0.00', 0, 2, '', '2017-11-02 03:26:51', 4, NULL, 3, NULL, NULL, NULL, 1),
(1048, 1, 6, 49, '6', '2017-11-02 00:00:00', '0.00', '100.00', '100.00', '0.00', 1, 0, 0, '100.00', '0.00', 0, 2, '', '2017-11-02 03:32:06', 4, NULL, 3, NULL, NULL, NULL, 1),
(1049, 1, 6, 49, '7', '2017-11-02 00:00:00', '0.00', '169.00', '169.00', '0.00', 1, 0, 0, '169.00', '0.00', 0, 2, '', '2017-11-02 03:33:31', 4, NULL, 3, NULL, NULL, NULL, 1),
(1050, 1, 6, 49, '8', '2017-11-02 00:00:00', '0.00', '274.00', '274.00', '0.00', 1, 0, 0, '274.00', '0.00', 0, 2, '', '2017-11-02 03:45:32', 4, NULL, 3, NULL, NULL, NULL, 1),
(1051, 1, 6, 49, '9', '2017-11-02 00:00:00', '0.00', '105.00', '105.00', '0.00', 1, 0, 0, '105.00', '0.00', 0, 2, '', '2017-11-02 07:45:55', 4, NULL, 3, NULL, NULL, NULL, 1),
(1052, 1, 6, 49, '10', '2017-11-02 00:00:00', '0.00', '189.00', '189.00', '0.00', 1, 0, 0, '189.00', '0.00', 0, 2, '', '2017-11-02 07:46:12', 4, NULL, 3, NULL, NULL, NULL, 1),
(1053, 1, 6, 49, '11', '2017-11-02 00:00:00', '0.00', '115.00', '115.00', '0.00', 1, 0, 0, '115.00', '0.00', 0, 2, '', '2017-11-02 07:48:30', 4, NULL, 3, NULL, NULL, NULL, 1),
(1054, 1, 6, 49, '12', '2017-11-02 00:00:00', '0.00', '169.00', '165.00', '4.00', 1, 0, 0, '165.00', '0.00', 0, 2, '', '2017-11-02 07:48:41', 4, NULL, 3, NULL, NULL, NULL, 1),
(1055, 1, 6, 49, '13', '2017-11-02 00:00:00', '0.00', '110.00', '105.00', '5.00', 1, 0, 0, '105.00', '0.00', 0, 2, '', '2017-11-02 07:51:30', 4, NULL, 3, NULL, NULL, NULL, 1),
(1056, 1, 6, 49, '14', '2017-11-02 00:00:00', '0.00', '100.00', '100.00', '0.00', 1, 0, 0, '100.00', '0.00', 0, 2, '', '2017-11-02 07:51:39', 4, NULL, 3, NULL, NULL, NULL, 1),
(1057, 1, 6, 49, '15', '2017-11-02 00:00:00', '0.00', '159.00', '159.00', '0.00', 1, 0, 0, '159.00', '0.00', 0, 2, '', '2017-11-02 07:52:57', 4, NULL, 3, NULL, NULL, NULL, 1),
(1058, 1, 6, 49, '16', '2017-11-02 00:00:00', '0.00', '169.00', '165.00', '4.00', 1, 0, 0, '165.00', '0.00', 0, 2, '', '2017-11-02 07:53:04', 4, NULL, 3, NULL, NULL, NULL, 1),
(1059, 1, 6, 49, '17', '2017-11-02 00:00:00', '0.00', '189.00', '189.00', '0.00', 1, 0, 0, '189.00', '0.00', 0, 2, '', '2017-11-02 11:28:50', 4, NULL, 3, NULL, NULL, NULL, 1),
(1060, 1, 6, 49, '18', '2017-11-02 00:00:00', '0.00', '169.00', '165.00', '4.00', 1, 0, 0, '165.00', '0.00', 0, 2, '', '2017-11-02 11:33:57', 4, NULL, 3, NULL, NULL, NULL, 1),
(1061, 14, 35, 4221, '1', '2017-11-08 00:00:00', '24.64', '225.36', '250.00', '0.00', 1, 0, 0, '250.00', '0.00', 0, 2, '', '2017-11-08 15:35:25', 18, NULL, 8, NULL, NULL, NULL, 1),
(1062, 14, 35, 4221, '2', '2017-11-08 00:00:00', '24.64', '225.36', '250.00', '0.00', 1, 0, 0, '250.00', '0.00', 0, 2, '', '2017-11-08 15:43:20', 18, NULL, 8, NULL, NULL, NULL, 1),
(1063, 1, 6, 49, '1', '2017-11-09 00:00:00', '0.00', '189.00', '189.00', '0.00', 1, 0, 0, '189.00', '0.00', 0, 4, '', '2017-11-09 11:23:04', 4, NULL, 3, NULL, NULL, NULL, 1),
(1064, 1, 6, 49, '2', '2017-11-09 00:00:00', '0.00', '90.00', '85.00', '5.00', 1, 0, 0, '85.00', '0.00', 0, 2, '', '2017-11-09 08:46:35', 4, NULL, 3, NULL, NULL, NULL, 1),
(1065, 1, 6, 49, '3', '2017-11-09 00:00:00', '0.00', '40.00', '40.00', '0.00', 1, 0, 0, '40.00', '0.00', 0, 2, '', '2017-11-09 08:46:58', 4, NULL, 3, NULL, NULL, NULL, 1),
(1066, 1, 6, 54, '1', '2017-11-10 00:00:00', '0.00', '189.00', '189.00', '0.00', 1, 1, 1, '189.00', '0.00', 0, 2, '', '2017-11-10 12:27:23', 4, NULL, 3, NULL, NULL, NULL, 1),
(1067, 1, 6, 54, '2', '2017-11-10 00:00:00', '0.00', '110.00', '105.00', '5.00', 1, 0, 0, '105.00', '0.00', 0, 2, '', '2017-11-10 13:17:19', 4, NULL, 3, NULL, NULL, NULL, 1),
(1068, 1, 6, 54, '3', '2017-11-10 00:00:00', '0.00', '189.00', '189.00', '0.00', 1, 1, 1, '189.00', '0.00', 0, 2, '', '2017-11-10 13:19:18', 4, NULL, 3, NULL, NULL, NULL, 2),
(1069, 1, 6, 54, '4', '2017-11-10 00:00:00', '0.00', '100.00', '100.00', '0.00', 5, 0, 0, '100.00', '0.00', 0, 2, '', '2017-11-10 13:18:20', 4, NULL, 3, NULL, NULL, NULL, 1),
(1070, 1, 6, 54, '5', '2017-11-10 00:00:00', '0.00', '189.00', '189.00', '0.00', 1, 0, 0, '189.00', '0.00', 0, 2, '', '2017-11-10 13:19:18', 4, NULL, 3, NULL, NULL, NULL, 2),
(1071, 1, 6, 54, '6', '2017-11-10 00:00:00', '0.00', '174.00', '174.00', '0.00', 1, 0, 0, '174.00', '0.00', 0, 2, '', '2017-11-10 13:19:03', 4, NULL, 3, NULL, NULL, NULL, 1),
(1072, 1, 6, 54, '7', '2017-11-10 00:00:00', '0.00', '144.00', '144.00', '0.00', 1, 0, 0, '144.00', '0.00', 0, 2, '', '2017-11-10 13:19:08', 4, NULL, 3, NULL, NULL, NULL, 1),
(1073, 1, 6, 49, '8', '2017-11-10 00:00:00', '0.00', '189.00', '189.00', '0.00', 1, 0, 0, '189.00', '0.00', 0, 2, '', '2017-11-10 15:34:37', 4, NULL, 3, NULL, NULL, NULL, 1),
(1074, 1, 6, 54, '9', '2017-11-10 00:00:00', '0.00', '159.00', '159.00', '0.00', 1, 0, 0, '159.00', '0.00', 0, 2, '', '2017-11-10 15:44:00', 4, NULL, 3, 1, NULL, NULL, 1),
(1075, 1, 6, 54, '10', '2017-11-10 00:00:00', '0.00', '159.00', '159.00', '0.00', 1, 0, 0, '159.00', '0.00', 0, 2, '', '2017-11-10 15:48:30', 4, NULL, 3, 1, NULL, NULL, 1),
(1076, 1, 6, 54, '1', '2017-11-11 00:00:00', '0.00', '120.00', '120.00', '0.00', 1, 0, 0, '120.00', '0.00', 0, 2, '', '2017-11-11 15:12:02', 4, NULL, 3, 1, NULL, NULL, 1),
(1077, 1, 6, 54, '1', '2017-11-15 00:00:00', '0.00', '174.00', '174.00', '0.00', 1, 0, 0, '174.00', '0.00', 0, 2, '', '2017-11-15 03:51:46', 4, NULL, 3, 1, NULL, NULL, 1),
(1078, 1, 6, 54, '2', '2017-11-15 00:00:00', '0.00', '120.00', '120.00', '0.00', 1, 0, 0, '120.00', '0.00', 0, 2, '', '2017-11-15 03:52:23', 4, NULL, 3, 1, NULL, NULL, 1),
(1079, 1, 6, 54, '1', '2017-11-16 00:00:00', '20.00', '120.00', '120.00', '30.00', 1, 0, 0, '120.00', '0.00', 0, 2, '', '2017-11-24 06:16:09', 4, NULL, 3, 1, NULL, NULL, 1),
(1080, 1, 6, 54, '2', '2017-11-16 00:00:00', '0.00', '115.00', '115.00', '0.00', 1, 0, 0, '115.00', '0.00', 0, 2, '', '2017-11-16 05:09:55', 4, NULL, 3, 1, NULL, NULL, 2),
(1081, 1, 6, 54, '3', '2017-11-16 00:00:00', '0.00', '120.00', '120.00', '0.00', 1, 0, 0, '120.00', '0.00', 0, 2, '', '2017-11-16 05:14:51', 4, NULL, 3, 1, NULL, NULL, 2),
(1082, 1, 6, 54, '4', '2017-11-16 00:00:00', '0.00', '129.00', '129.00', '0.00', 1, 0, 0, '129.00', '0.00', 0, 2, '', '2017-11-16 05:15:28', 4, NULL, 3, 1, NULL, NULL, 2),
(1083, 1, 6, 54, '5', '2017-11-16 00:00:00', '0.00', '228.00', '228.00', '0.00', 1, 0, 0, '228.00', '0.00', 0, 2, '', '2017-11-16 05:23:24', 4, NULL, 3, 1, NULL, NULL, 2),
(1084, 1, 6, 49, '7', '2017-11-16 00:00:00', '0.00', '100.00', '100.00', '20.00', 5, 0, 0, '100.00', '0.00', 1, 1, '', '2017-11-24 06:12:55', 4, NULL, 3, 1, NULL, NULL, 2),
(1085, 1, 6, 54, '6', '2017-11-16 00:00:00', '0.00', '70.00', '70.00', '0.00', 1, 0, 0, '70.00', '0.00', 0, 2, '', '2017-11-16 11:38:40', 4, NULL, 3, 1, NULL, NULL, 2),
(1086, 1, 6, 54, '8', '2017-11-16 00:00:00', '10.00', '120.00', '120.00', '0.00', 1, 0, 0, '120.00', '0.00', 0, 1, '', '2017-11-24 06:13:08', 4, NULL, 3, 1, NULL, NULL, 2),
(1087, 1, 6, 54, '9', '2017-11-16 00:00:00', '0.00', '189.00', '189.00', '0.00', 1, 0, 0, '189.00', '0.00', 0, 1, '', '2017-11-16 11:43:26', 4, NULL, 3, 1, NULL, NULL, 2),
(1088, 1, 9, 54, '1', '2017-11-16 00:00:00', '0.00', '45.00', '45.00', '0.00', 1, 0, 0, '45.00', '0.00', 0, 2, '', '2017-11-16 11:45:47', 1, NULL, 1, 1, NULL, NULL, 2),
(1089, 1, 0, 49, '2', '2017-11-16 00:00:00', '0.00', '60.00', '60.00', '0.00', 3, 0, 0, '60.00', '0.00', 1, 1, '', '2017-11-16 14:23:12', 1, NULL, 1, 1, NULL, NULL, 2),
(1090, 1, 0, 49, '3', '2017-11-16 00:00:00', '0.00', '80.00', '80.00', '0.00', 3, 0, 0, '80.00', '0.00', 1, 1, '', '2017-11-16 14:26:45', 1, NULL, 1, 1, NULL, NULL, 2),
(1091, 1, 0, 54, '1', '2017-11-17 00:00:00', '0.00', '60.00', '60.00', '0.00', 3, 0, 0, '60.00', '0.00', 1, 1, '', '2017-11-17 04:32:20', 1, NULL, 1, 1, NULL, NULL, 2),
(1092, 1, 0, 54, '2', '2017-11-17 00:00:00', '50.00', '60.00', '60.00', '0.00', 3, 0, 0, '60.00', '0.00', 1, 1, '', '2017-11-24 06:13:46', 1, NULL, 1, 1, NULL, NULL, 2),
(1093, 1, 0, 54, '3', '2017-11-17 00:00:00', '0.00', '60.00', '60.00', '0.00', 3, 0, 0, '60.00', '0.00', 1, 1, '', '2017-11-17 05:06:34', 1, NULL, 1, 1, NULL, NULL, 2),
(1094, 1, 0, 54, '4', '2017-11-17 00:00:00', '0.00', '60.00', '60.00', '10.00', 3, 0, 0, '60.00', '0.00', 1, 1, '', '2017-11-24 06:12:37', 1, NULL, 1, 1, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pos_sales_order_payment_split`
--

CREATE TABLE `pos_sales_order_payment_split` (
  `payment_split_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `split_amount` decimal(12,2) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `sales_order_date` datetime NOT NULL,
  `split_payment_response` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_sales_order_payment_split`
--

INSERT INTO `pos_sales_order_payment_split` (`payment_split_id`, `company_id`, `sales_order_id`, `split_amount`, `payment_method_id`, `sales_order_date`, `split_payment_response`) VALUES
(1, 1, 54, '33.97', 1, '2017-03-28 00:00:00', ''),
(2, 1, 54, '33.97', 1, '2017-03-28 00:00:00', ''),
(3, 1, 54, '1019.00', 1, '2017-03-28 00:00:00', ''),
(4, 1, 54, '135.88', 1, '2017-03-28 00:00:00', ''),
(5, 1, 54, '67.94', 1, '2017-03-28 00:00:00', ''),
(6, 1, 54, '67.94', 1, '2017-03-28 00:00:00', ''),
(7, 1, 54, '1019.00', 1, '2017-03-28 00:00:00', ''),
(8, 1, 54, '67.94', 1, '2017-03-28 00:00:00', ''),
(9, 1, 54, '67.94', 1, '2017-03-28 00:00:00', ''),
(10, 1, 56, '581.74', 1, '2017-03-28 00:00:00', ''),
(11, 1, 56, '581.74', 1, '2017-03-28 00:00:00', ''),
(12, 1, 57, '581.74', 1, '2017-03-28 00:00:00', ''),
(13, 1, 57, '581.74', 1, '2017-03-28 00:00:00', ''),
(14, 1, 58, '581.74', 1, '2017-03-28 00:00:00', ''),
(15, 1, 58, '581.74', 1, '2017-03-28 00:00:00', ''),
(16, 1, 59, '581.74', 1, '2017-03-28 00:00:00', ''),
(17, 1, 59, '581.74', 1, '2017-03-28 00:00:00', ''),
(18, 1, 60, '581.74', 1, '2017-03-28 00:00:00', ''),
(19, 1, 60, '581.74', 1, '2017-03-28 00:00:00', ''),
(20, 1, 62, '387.83', 1, '2017-03-28 00:00:00', ''),
(21, 1, 68, '18.67', 1, '2017-03-28 00:00:00', ''),
(22, 1, 68, '18.67', 1, '2017-03-28 00:00:00', ''),
(23, 1, 68, '18.67', 1, '2017-03-28 00:00:00', ''),
(24, 1, 84, '581.74', 1, '2017-03-28 00:00:00', ''),
(25, 1, 84, '581.74', 1, '2017-03-28 00:00:00', ''),
(26, 1, 103, '50.00', 1, '2017-03-01 00:00:00', ''),
(27, 1, 202, '81.20', 1, '2017-04-05 00:00:00', ''),
(28, 1, 202, '81.20', 1, '2017-04-05 00:00:00', ''),
(29, 1, 361, '603.12', 1, '2017-04-13 00:00:00', ''),
(30, 1, 361, '603.12', 1, '2017-04-13 00:00:00', ''),
(31, 1, 361, '603.12', 1, '2017-04-13 00:00:00', ''),
(32, 1, 367, '60.00', 1, '2017-04-14 00:00:00', ''),
(33, 1, 367, '7.20', 1, '2017-04-14 00:00:00', ''),
(34, 1, 370, '72.80', 1, '2017-04-14 00:00:00', ''),
(35, 1, 370, '72.80', 1, '2017-04-14 00:00:00', ''),
(36, 1, 370, '72.80', 1, '2017-04-14 00:00:00', ''),
(37, 1, 373, '33.60', 1, '2017-04-14 00:00:00', ''),
(38, 1, 373, '33.60', 1, '2017-04-14 00:00:00', ''),
(39, 1, 437, '78.40', 1, '2017-04-19 00:00:00', ''),
(40, 1, 437, '78.40', 1, '2017-04-19 00:00:00', ''),
(41, 1, 437, '78.40', 1, '2017-04-19 00:00:00', ''),
(42, 1, 437, '78.40', 1, '2017-04-19 00:00:00', ''),
(43, 1, 438, '56.00', 1, '2017-04-19 00:00:00', ''),
(44, 1, 438, '56.00', 1, '2017-04-19 00:00:00', ''),
(45, 1, 450, '58.80', 1, '2017-04-21 00:00:00', ''),
(46, 1, 451, '58.80', 1, '2017-04-21 00:00:00', ''),
(47, 1, 452, '58.80', 1, '2017-04-21 00:00:00', ''),
(48, 1, 452, '51.80', 1, '2017-04-21 00:00:00', ''),
(49, 1, 452, '51.80', 1, '2017-04-21 00:00:00', ''),
(50, 1, 457, '81.20', 2, '2017-04-21 00:00:00', ''),
(51, 1, 457, '81.20', 2, '2017-04-21 00:00:00', ''),
(52, 1, 458, '81.20', 2, '2017-04-21 00:00:00', ''),
(53, 1, 458, '81.20', 2, '2017-04-21 00:00:00', ''),
(54, 1, 461, '114.80', 1, '2017-04-21 00:00:00', ''),
(55, 1, 461, '114.80', 1, '2017-04-21 00:00:00', ''),
(56, 1, 477, '76.53', 1, '2017-04-25 00:00:00', ''),
(57, 1, 478, '54.13', 1, '2017-04-25 00:00:00', ''),
(58, 1, 478, '54.13', 3, '2017-04-25 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(59, 1, 478, '54.13', 2, '2017-04-25 00:00:00', '{\"payment_status\":\"Approved\",\"rr_no\":\"000010087903\",\"auth_code\":\"000178\",\"tvr\":\"0000040000\",\"tsi\":\"e800\"}'),
(60, 1, 479, '70.93', 1, '2017-04-25 00:00:00', ''),
(61, 1, 479, '70.93', 2, '2017-04-25 00:00:00', '{\"payment_status\":\"Approved\",\"rr_no\":\"000010087912\",\"auth_code\":\"000179\",\"tvr\":\"0000040000\",\"tsi\":\"e800\"}'),
(62, 1, 479, '70.93', 3, '2017-04-25 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"pay_7j193XccgUnu1l\"}'),
(63, 1, 491, '22.40', 3, '2017-04-25 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(64, 1, 491, '22.40', 3, '2017-04-25 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(65, 1, 505, '7.35', 3, '2017-04-26 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(66, 1, 505, '7.35', 3, '2017-04-26 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(67, 1, 505, '7.35', 3, '2017-04-26 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(68, 1, 505, '7.35', 3, '2017-04-26 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(69, 1, 505, '7.35', 3, '2017-04-26 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(70, 1, 505, '7.35', 3, '2017-04-26 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(71, 1, 505, '7.35', 3, '2017-04-26 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(72, 1, 505, '7.35', 3, '2017-04-26 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(73, 1, 505, '7.35', 3, '2017-04-26 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(74, 1, 505, '7.35', 3, '2017-04-26 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(75, 1, 505, '7.35', 3, '2017-04-26 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(76, 1, 505, '7.35', 3, '2017-04-26 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(77, 1, 505, '7.35', 3, '2017-04-26 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(78, 1, 505, '7.35', 3, '2017-04-26 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(79, 1, 505, '7.35', 3, '2017-04-26 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(80, 1, 505, '7.35', 3, '2017-04-26 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(81, 1, 524, '39.20', 2, '2017-04-27 00:00:00', '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088233\",\"auth_code\":\"000018\",\"tvr\":\"0080040000\",\"tsi\":\"e800\"}'),
(82, 1, 524, '39.20', 3, '2017-04-27 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(83, 1, 525, '58.80', 2, '2017-04-27 00:00:00', '{\"payment_status\":\"Approved\",\"rr_no\":\"000010088247\",\"auth_code\":\"000026\",\"tvr\":\"0080040000\",\"tsi\":\"e800\"}'),
(84, 1, 525, '58.80', 3, '2017-04-27 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(85, 1, 573, '90.00', 1, '2017-05-01 00:00:00', ''),
(86, 1, 573, '15.00', 3, '2017-05-01 00:00:00', '{\"payment_status\":\"Approved\",\"paymentid\":\"\"}'),
(87, 1, 594, '53.33', 1, '2017-05-08 00:00:00', ''),
(88, 1, 594, '53.33', 1, '2017-05-08 00:00:00', ''),
(89, 1, 594, '53.33', 1, '2017-05-08 00:00:00', ''),
(90, 1, 605, '50.00', 1, '2017-05-08 00:00:00', ''),
(91, 1, 605, '50.00', 1, '2017-05-08 00:00:00', ''),
(92, 1, 619, '40.00', 1, '2017-05-09 00:00:00', ''),
(93, 1, 619, '40.00', 1, '2017-05-09 00:00:00', ''),
(94, 1, 717, '45.00', 1, '2017-05-25 00:00:00', ''),
(95, 1, 717, '60.00', 1, '2017-05-25 00:00:00', ''),
(96, 1, 1066, '94.50', 1, '2017-11-10 00:00:00', ''),
(97, 1, 1066, '94.50', 5, '2017-11-10 00:00:00', ''),
(98, 1, 1068, '94.50', 1, '2017-11-10 00:00:00', ''),
(99, 1, 1068, '94.50', 5, '2017-11-10 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `pos_sales_order_payment_status`
--

CREATE TABLE `pos_sales_order_payment_status` (
  `sales_order_payment_status_id` int(11) NOT NULL,
  `payment_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_sales_order_payment_status`
--

INSERT INTO `pos_sales_order_payment_status` (`sales_order_payment_status_id`, `payment_status`) VALUES
(1, 'Paid'),
(2, 'Unpaid'),
(3, 'Partial Paid'),
(4, 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `pos_sales_order_status`
--

CREATE TABLE `pos_sales_order_status` (
  `sales_order_status_id` int(11) NOT NULL,
  `order_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_sales_order_status`
--

INSERT INTO `pos_sales_order_status` (`sales_order_status_id`, `order_status`) VALUES
(1, 'Ordered'),
(2, 'In Progress'),
(3, 'Done'),
(4, 'Delivered'),
(5, 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `pos_sales_order_transaction`
--

CREATE TABLE `pos_sales_order_transaction` (
  `sales_order_transaction_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `sales_order_no` varchar(50) NOT NULL,
  `inventory_stock_id` int(11) NOT NULL,
  `inventory_category_id` int(11) NOT NULL,
  `sales_qty` smallint(6) NOT NULL,
  `sales_rate` int(11) NOT NULL,
  `sales_amount` decimal(12,2) NOT NULL,
  `unit_id` smallint(6) NOT NULL,
  `order_completion_time` int(11) NOT NULL,
  `product_order_status_id` smallint(6) NOT NULL,
  `product_tax_amount` decimal(12,2) NOT NULL COMMENT 'single product tax amount',
  `tax_ids` varchar(80) NOT NULL COMMENT 'single product tax ids comma seprated',
  `discount_ids` varchar(80) NOT NULL COMMENT 'single product discount comma seprated ids',
  `product_discount_amount` decimal(12,2) NOT NULL COMMENT 'single product discount amount',
  `comment` text NOT NULL,
  `sales_order_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `batch_no` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_sales_order_transaction`
--

INSERT INTO `pos_sales_order_transaction` (`sales_order_transaction_id`, `company_id`, `employee_id`, `sales_order_id`, `sales_order_no`, `inventory_stock_id`, `inventory_category_id`, `sales_qty`, `sales_rate`, `sales_amount`, `unit_id`, `order_completion_time`, `product_order_status_id`, `product_tax_amount`, `tax_ids`, `discount_ids`, `product_discount_amount`, `comment`, `sales_order_date`, `created_at`, `updated_at`, `batch_no`) VALUES
(1, 1, 0, 1, '1', 1, 1, 1, 20, '20.00', 1, 15, 4, '10.00', '11,12', '1,2', '10.00', '', '0000-00-00 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(2, 1, 0, 1, '1', 2, 2, 1, 20, '20.00', 1, 15, 4, '10.00', '11,12', '1,2', '10.00', '', '0000-00-00 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(3, 1, 0, 1, '1', 3, 3, 1, 20, '20.00', 1, 15, 5, '10.00', '11,12', '1,2', '10.00', '', '0000-00-00 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(4, 1, 0, 2, '2', 1, 1, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', '', '0000-00-00 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(5, 1, 0, 2, '2', 2, 2, 1, 20, '20.00', 1, 15, 3, '10.00', '11,12', '1,2', '10.00', '', '0000-00-00 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(6, 1, 0, 2, '2', 3, 3, 1, 20, '20.00', 1, 15, 2, '10.00', '11,12', '1,2', '10.00', '', '0000-00-00 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(7, 1, 0, 3, '3', 1, 1, 1, 20, '20.00', 1, 15, 2, '10.00', '11,12', '1,2', '10.00', '', '2017-03-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(8, 1, 0, 3, '3', 2, 2, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', '', '2017-03-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(9, 1, 0, 3, '3', 3, 3, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', '', '2017-03-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(10, 1, 0, 4, '1', 1, 1, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', '', '2017-03-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(11, 1, 0, 4, '1', 2, 2, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', '', '2017-03-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(12, 1, 0, 4, '1', 3, 3, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', '', '2017-03-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(13, 1, 0, 5, '1', 6, 0, 1, 20, '20.00', 1, 15, 4, '10.00', '11,12', '1,2', '10.00', '', '2017-03-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(14, 1, 0, 5, '1', 7, 0, 1, 20, '20.00', 1, 15, 2, '10.00', '11,12', '1,2', '10.00', '', '2017-03-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(15, 1, 0, 5, '1', 3, 3, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', '', '2017-03-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(16, 1, 0, 6, '2', 15, 7, 1, 20, '20.00', 1, 15, 4, '10.00', '11,12', '1,2', '10.00', '', '2017-03-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(17, 1, 0, 6, '2', 17, 7, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', '', '2017-03-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(18, 1, 0, 6, '2', 16, 7, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', '', '2017-03-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(19, 1, 0, 12, '5', 1, 1, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', 'comm3', '2017-03-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(20, 1, 0, 12, '5', 2, 2, 1, 20, '20.00', 1, 15, 2, '10.00', '11,12', '1,2', '10.00', 'comm3', '2017-03-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(21, 1, 0, 12, '5', 3, 3, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', 'comm3', '2017-03-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(22, 1, 0, 13, '6', 15, 7, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', 'This is comment that need to be added in product', '2017-03-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(23, 1, 0, 13, '6', 17, 7, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', '', '2017-03-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(24, 1, 0, 13, '6', 16, 7, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', '', '2017-03-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(25, 1, 0, 14, '1', 1, 1, 1, 20, '20.00', 1, 15, 5, '10.00', '11,12', '1,2', '10.00', 'comm3', '2017-03-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(26, 1, 0, 14, '1', 2, 2, 1, 20, '20.00', 1, 15, 5, '10.00', '11,12', '1,2', '10.00', 'comm3', '2017-03-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(27, 1, 0, 14, '1', 3, 3, 1, 20, '20.00', 1, 15, 5, '10.00', '11,12', '1,2', '10.00', 'comm3', '2017-03-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(28, 1, 0, 17, '8', 1, 1, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', 'test', '2017-03-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(29, 1, 0, 17, '8', 2, 2, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', 'test', '2017-03-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(30, 1, 0, 17, '8', 3, 3, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', 'test', '2017-03-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(31, 1, 0, 18, '2', 33, 1, 1, 129, '129.00', 0, 0, 5, '15.48', '11,12', '1,2', '0.00', '', '2017-03-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(32, 1, 0, 18, '2', 4, 1, 2, 1004, '2008.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-03-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(33, 1, 0, 18, '2', 1, 1, 1, 15, '15.00', 0, 0, 5, '0.00', '11,12', '1,2', '0.00', '', '2017-03-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(34, 1, 0, 19, '3', 4, 1, 1, 1004, '1004.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-03-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(35, 1, 0, 19, '3', 33, 1, 4, 129, '516.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-03-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(36, 1, 0, 20, '4', 4, 1, 1, 1004, '1004.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-03-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(37, 1, 0, 20, '4', 33, 1, 1, 129, '129.00', 0, 0, 2, '15.48', '11,12', '1,2', '0.00', '', '2017-03-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(38, 1, 0, 20, '4', 34, 1, 1, 129, '129.00', 0, 0, 5, '15.48', '11,12', '1,2', '0.00', '', '2017-03-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(39, 1, 0, 21, '1', 1, 1, 1, 15, '15.00', 0, 0, 5, '0.00', '11,12', '1,2', '0.00', '', '2017-03-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(40, 1, 0, 21, '1', 4, 1, 1, 1004, '1004.00', 0, 0, 5, '0.00', '11,12', '1,2', '0.00', '', '2017-03-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(41, 1, 0, 21, '1', 35, 1, 1, 129, '129.00', 0, 0, 5, '15.48', '11,12', '1,2', '0.00', '', '2017-03-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(42, 1, 0, 22, '2', 15, 7, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', 'This is comment that need to be added in product', '2017-03-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(43, 1, 0, 22, '2', 17, 7, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', '', '2017-03-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(44, 1, 0, 22, '2', 16, 7, 1, 20, '20.00', 1, 15, 1, '10.00', '11,12', '1,2', '10.00', '', '2017-03-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(45, 1, 0, 24, '1', 15, 7, 1, 99, '99.00', 0, 0, 2, '11.88', '14', '9', '9.90', '', '2017-03-22 13:17:43', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(46, 1, 0, 24, '1', 17, 7, 1, 60, '60.00', 0, 0, 3, '7.20', '14', '', '0.00', '', '2017-03-22 13:17:43', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(47, 1, 0, 25, '1', 15, 7, 1, 88, '88.39', 0, 0, 2, '10.61', '14', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(48, 1, 0, 26, '1', 1, 1, 1, 15, '15.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-03-23 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(49, 1, 0, 26, '1', 4, 1, 1, 1004, '1004.00', 0, 0, 1, '0.00', '11,12', '1,2', '0.00', '', '2017-03-23 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(50, 1, 0, 27, '1', 15, 7, 3, 88, '265.18', 0, 0, 2, '31.82', '14', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(51, 1, 0, 27, '1', 17, 7, 3, 54, '160.71', 0, 0, 2, '19.29', '14', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(52, 1, 0, 27, '1', 16, 7, 2, 99, '198.00', 0, 0, 2, '23.76', '14', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(53, 1, 0, 28, '1', 15, 7, 2, 88, '176.79', 0, 0, 3, '21.21', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(54, 1, 0, 29, '1', 15, 7, 1, 88, '88.39', 0, 0, 2, '10.61', '14', '', '0.00', '', '2017-03-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(55, 1, 0, 29, '1', 17, 7, 1, 54, '53.57', 0, 0, 3, '6.43', '14', '', '0.00', '', '2017-03-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(56, 1, 0, 30, '2', 1, 1, 2, 15, '30.00', 0, 0, 1, '0.00', '11,12', '1,2', '0.00', '', '2017-03-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(57, 1, 0, 30, '2', 4, 1, 2, 1004, '2008.00', 0, 0, 1, '0.00', '11,12', '1,2', '0.00', '', '2017-03-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(58, 1, 0, 31, '3', 1, 1, 2, 15, '30.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-03-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(59, 1, 0, 31, '3', 4, 1, 2, 1004, '2008.00', 0, 0, 3, '0.00', '11,12', '1,2', '0.00', '', '2017-03-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(60, 1, 0, 32, '4', 28, 2, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', 'eerr', '2017-03-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(61, 1, 0, 32, '4', 4, 1, 1, 1004, '1004.00', 0, 0, 3, '0.00', '11,12', '1,2', '0.00', 'bit sweet 5e5st', '2017-03-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(62, 1, 0, 33, '5', 15, 7, 1, 88, '88.39', 0, 0, 2, '10.61', '14', '', '0.00', '', '2017-03-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(63, 1, 0, 34, '6', 15, 7, 1, 88, '88.39', 0, 0, 2, '10.61', '14', '', '0.00', '', '2017-03-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(64, 1, 0, 35, '7', 15, 7, 1, 88, '88.39', 0, 0, 2, '10.61', '14', '', '0.00', '', '2017-03-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(65, 1, 0, 36, '8', 15, 7, 1, 88, '88.39', 0, 0, 2, '10.61', '14', '', '0.00', '', '2017-03-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(66, 1, 0, 37, '9', 15, 7, 1, 88, '88.39', 0, 0, 2, '10.61', '14', '', '0.00', '', '2017-03-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(67, 1, 0, 38, '10', 15, 7, 1, 88, '88.39', 0, 0, 2, '10.61', '14', '', '0.00', '', '2017-03-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(68, 1, 0, 39, '11', 15, 7, 1, 88, '88.39', 0, 0, 2, '10.61', '14', '', '0.00', '', '2017-03-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(69, 1, 0, 40, '12', 15, 7, 1, 88, '88.39', 0, 0, 2, '10.61', '14', '', '0.00', '', '2017-03-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(70, 1, 0, 41, '1', 15, 7, 1, 88, '88.39', 0, 0, 3, '10.61', '14', '', '0.00', '', '2017-03-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(71, 1, 0, 42, '2', 15, 7, 2, 88, '176.79', 0, 0, 3, '21.21', '14', '', '0.00', '', '2017-03-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(72, 1, 0, 43, '3', 17, 7, 1, 54, '53.57', 0, 0, 3, '6.43', '14', '', '0.00', '', '2017-03-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(73, 1, 0, 44, '4', 15, 7, 1, 88, '88.39', 0, 0, 3, '10.61', '14', '', '0.00', '', '2017-03-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(74, 1, 0, 45, '5', 1, 1, 2, 15, '30.00', 0, 0, 5, '0.00', '11,12', '1,2', '0.00', '', '2017-03-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(75, 1, 0, 45, '5', 4, 1, 2, 1004, '2008.00', 0, 0, 5, '0.00', '11,12', '1,2', '0.00', '', '2017-03-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(76, 1, 0, 46, '6', 1, 1, 2, 15, '30.00', 0, 0, 5, '0.00', '11,12', '1,2', '0.00', '', '2017-03-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(77, 1, 0, 46, '6', 4, 1, 2, 1004, '2008.00', 0, 0, 5, '0.00', '11,12', '1,2', '0.00', '', '2017-03-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(78, 1, 0, 47, '7', 17, 7, 1, 54, '53.57', 0, 0, 3, '6.43', '14', '', '0.00', '', '2017-03-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(79, 1, 0, 47, '7', 18, 7, 1, 60, '60.00', 0, 0, 5, '7.20', '14', '', '0.00', '', '2017-03-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(80, 1, 0, 48, '8', 1, 1, 2, 15, '30.00', 0, 0, 5, '0.00', '11,12', '1,2', '0.00', '', '2017-03-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(81, 1, 0, 48, '8', 4, 1, 2, 1004, '2008.00', 0, 0, 1, '0.00', '11,12', '1,2', '0.00', '', '2017-03-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(82, 1, 0, 49, '9', 1, 1, 2, 15, '30.00', 0, 0, 1, '0.00', '11,12', '1,2', '0.00', '', '2017-03-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(83, 1, 0, 49, '9', 4, 1, 2, 1004, '2008.00', 0, 0, 1, '0.00', '11,12', '1,2', '0.00', '', '2017-03-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(84, 1, 0, 50, '10', 1, 1, 1, 15, '15.00', 0, 0, 1, '0.00', '11,12', '1,2', '0.00', '', '2017-03-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(85, 1, 0, 50, '10', 4, 1, 1, 1004, '1004.00', 0, 0, 1, '0.00', '11,12', '1,2', '0.00', '', '2017-03-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(86, 1, 0, 51, '11', 16, 7, 1, 99, '99.00', 0, 0, 3, '11.88', '14', '', '0.00', '', '2017-03-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(87, 1, 0, 51, '11', 19, 7, 1, 50, '50.00', 0, 0, 3, '6.00', '14', '', '0.00', '', '2017-03-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(88, 1, 0, 52, '1', 16, 7, 1, 99, '99.00', 0, 0, 4, '11.88', '14', '', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(89, 1, 0, 52, '1', 17, 7, 1, 54, '53.57', 0, 0, 4, '6.43', '14', '', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(90, 1, 0, 53, '2', 18, 7, 1, 60, '60.00', 0, 0, 4, '7.20', '14', '', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(91, 1, 0, 53, '2', 19, 7, 1, 50, '50.00', 0, 0, 4, '6.00', '14', '', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(92, 1, 0, 54, '3', 1, 1, 1, 15, '15.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(93, 1, 0, 54, '3', 4, 1, 1, 1004, '1004.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(94, 1, 0, 54, '3', 2, 2, 1, 25, '25.00', 0, 0, 6, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(95, 1, 0, 54, '3', 28, 2, 1, 99, '99.00', 0, 0, 6, '11.88', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(96, 1, 0, 55, '4', 20, 7, 1, 50, '50.00', 0, 0, 4, '6.00', '14', '', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(97, 1, 0, 55, '4', 21, 7, 1, 40, '40.00', 0, 0, 4, '4.80', '14', '', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(98, 1, 0, 56, '5', 1, 1, 1, 15, '15.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(99, 1, 0, 56, '5', 4, 1, 1, 1004, '1004.00', 0, 0, 6, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(100, 1, 0, 56, '5', 33, 1, 1, 129, '129.00', 0, 0, 6, '15.48', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(101, 1, 0, 57, '6', 1, 1, 1, 15, '15.00', 0, 0, 7, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(102, 1, 0, 57, '6', 4, 1, 1, 1004, '1004.00', 0, 0, 7, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(103, 1, 0, 57, '6', 33, 1, 1, 129, '129.00', 0, 0, 7, '15.48', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(104, 1, 0, 58, '7', 1, 1, 1, 15, '15.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(105, 1, 0, 58, '7', 4, 1, 1, 1004, '1004.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(106, 1, 0, 58, '7', 33, 1, 1, 129, '129.00', 0, 0, 4, '15.48', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(107, 1, 0, 59, '8', 1, 1, 1, 15, '15.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(108, 1, 0, 59, '8', 4, 1, 1, 1004, '1004.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(109, 1, 0, 59, '8', 33, 1, 1, 129, '129.00', 0, 0, 4, '15.48', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(110, 1, 0, 60, '9', 1, 1, 1, 15, '15.00', 0, 0, 3, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(111, 1, 0, 60, '9', 4, 1, 1, 1004, '1004.00', 0, 0, 3, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(112, 1, 0, 60, '9', 33, 1, 1, 129, '129.00', 0, 0, 3, '15.48', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(113, 1, 0, 61, '10', 1, 1, 1, 15, '15.00', 0, 0, 3, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(114, 1, 0, 61, '10', 4, 1, 1, 1004, '1004.00', 0, 0, 3, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(115, 1, 0, 61, '10', 33, 1, 1, 129, '129.00', 0, 0, 3, '15.48', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(116, 1, 0, 62, '11', 1, 1, 1, 15, '15.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(117, 1, 0, 62, '11', 4, 1, 1, 1004, '1004.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(118, 1, 0, 62, '11', 33, 1, 1, 129, '129.00', 0, 0, 2, '15.48', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(119, 1, 0, 63, '12', 15, 7, 1, 88, '88.39', 0, 0, 4, '10.61', '11,12', '1,2', '0.00', 'no comments ,', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(120, 1, 0, 64, '13', 50, 20, 1, 80, '80.00', 0, 0, 3, '9.60', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(121, 1, 0, 65, '14', 17, 7, 1, 54, '53.57', 0, 0, 2, '6.43', '14', '', '0.00', 'Lemon extra', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(122, 1, 0, 66, '15', 18, 7, 2, 60, '120.00', 0, 0, 3, '14.40', '14', '', '0.00', 'no coconut', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(123, 1, 0, 67, '16', 15, 7, 2, 88, '176.79', 0, 0, 2, '21.21', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(124, 1, 0, 68, '17', 20, 7, 1, 50, '50.00', 0, 0, 2, '6.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(125, 1, 0, 69, '1', 17, 7, 1, 54, '53.57', 0, 0, 4, '6.43', '14', '', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(126, 1, 0, 70, '2', 19, 7, 1, 50, '50.00', 0, 0, 4, '6.00', '14', '', '0.00', 'Full spicy', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(127, 1, 0, 71, '3', 18, 7, 1, 60, '60.00', 0, 0, 4, '7.20', '14', '', '0.00', 'No coconut...', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(128, 1, 0, 71, '3', 19, 7, 1, 50, '50.00', 0, 0, 4, '6.00', '14', '', '0.00', 'Extra spicy', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(129, 1, 0, 71, '3', 21, 7, 1, 40, '40.00', 0, 0, 4, '4.80', '14', '', '0.00', 'Without chutney', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(130, 1, 0, 72, '4', 14, 6, 1, 60, '60.00', 2, 0, 4, '0.00', '', '', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(131, 1, 0, 72, '4', 20, 7, 2, 50, '100.00', 0, 0, 4, '12.00', '14', '', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(132, 1, 0, 72, '4', 26, 3, 3, 80, '240.00', 0, 0, 4, '28.80', '14', '', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(133, 1, 0, 72, '4', 28, 2, 2, 99, '198.00', 0, 0, 4, '23.76', '14', '', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(134, 1, 0, 72, '4', 41, 19, 1, 129, '129.00', 0, 0, 4, '15.48', '14', '', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(135, 1, 0, 73, '5', 54, 21, 1, 80, '80.00', 0, 0, 4, '9.60', '14', '', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(136, 1, 0, 73, '5', 61, 22, 1, 70, '70.00', 0, 0, 4, '8.40', '14', '', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(137, 1, 0, 73, '5', 60, 22, 1, 70, '70.00', 0, 0, 4, '8.40', '14', '', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(138, 1, 0, 74, '6', 15, 7, 1, 88, '88.39', 0, 0, 4, '10.61', '14', '', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(139, 1, 0, 74, '6', 17, 7, 1, 54, '53.57', 0, 0, 4, '6.43', '14', '', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(140, 1, 0, 75, '7', 1, 1, 1, 15, '15.00', 1, 0, 4, '0.00', '', '', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(141, 1, 0, 75, '7', 3, 3, 1, 45, '45.00', 1, 0, 4, '0.00', '', '', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(142, 1, 0, 75, '7', 15, 7, 1, 88, '88.39', 0, 0, 4, '10.61', '14', '', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(143, 1, 0, 76, '8', 15, 7, 1, 88, '88.39', 0, 0, 4, '9.55', '14', '', '8.84', 'more spicy', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(144, 1, 0, 77, '9', 14, 6, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(145, 1, 0, 77, '9', 15, 7, 1, 88, '88.39', 0, 0, 3, '10.61', '11,12', '1,2', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(146, 1, 0, 77, '9', 16, 7, 1, 99, '99.00', 0, 0, 3, '11.88', '11,12', '1,2', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(147, 1, 0, 78, '10', 5, 3, 1, 7, '7.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(148, 1, 0, 78, '10', 13, 3, 1, 200, '200.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(149, 1, 0, 78, '10', 16, 7, 1, 99, '99.00', 0, 0, 4, '11.88', '11,12', '1,2', '0.00', '', '2017-03-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(150, 1, 0, 79, '1', 19, 7, 1, 50, '50.00', 0, 0, 4, '6.00', '14', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(151, 1, 0, 80, '2', 15, 7, 2, 88, '176.79', 0, 0, 4, '21.21', '14', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(152, 1, 0, 81, '3', 3, 3, 1, 45, '45.00', 1, 0, 4, '0.00', '', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(153, 1, 0, 81, '3', 1, 1, 1, 15, '15.00', 1, 0, 4, '0.00', '', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(154, 1, 0, 82, '4', 1, 1, 2, 15, '30.00', 1, 0, 4, '0.00', '', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(155, 1, 0, 83, '5', 3, 3, 1, 45, '45.00', 1, 0, 4, '0.00', '', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(156, 1, 0, 84, '18', 1, 1, 1, 15, '15.00', 0, 0, 1, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(157, 1, 0, 84, '18', 4, 1, 1, 1004, '1004.00', 0, 0, 1, '0.00', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(158, 1, 0, 84, '18', 33, 1, 1, 129, '129.00', 0, 0, 1, '15.48', '11,12', '1,2', '0.00', '', '2017-03-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(159, 1, 0, 85, '6', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '14', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(160, 1, 0, 86, '7', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '14', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(161, 1, 0, 87, '8', 31, 2, 1, 80, '80.00', 0, 0, 4, '9.60', '14', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(162, 1, 0, 88, '9', 41, 19, 1, 129, '129.00', 0, 0, 4, '15.48', '14', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(163, 1, 0, 88, '9', 20, 7, 1, 50, '50.00', 0, 0, 4, '6.00', '14', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(164, 1, 0, 88, '9', 56, 21, 1, 40, '40.00', 0, 0, 4, '4.80', '14', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(165, 1, 0, 89, '10', 20, 7, 1, 50, '50.00', 0, 0, 4, '6.00', '14', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(166, 1, 0, 90, '11', 56, 21, 1, 40, '40.00', 0, 0, 3, '4.80', '14', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(167, 1, 0, 91, '12', 54, 21, 1, 80, '80.00', 0, 0, 3, '9.60', '14', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(168, 1, 0, 92, '13', 64, 22, 1, 54, '53.57', 0, 0, 3, '6.43', '14', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(169, 1, 0, 93, '14', 18, 7, 1, 60, '60.00', 0, 0, 3, '7.20', '14', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(170, 1, 0, 94, '15', 56, 21, 1, 40, '40.00', 0, 0, 3, '4.80', '14', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(171, 1, 0, 94, '15', 54, 21, 1, 80, '80.00', 0, 0, 3, '9.60', '14', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(172, 1, 0, 94, '15', 18, 7, 1, 60, '60.00', 0, 0, 3, '7.20', '14', '', '0.00', '', '2017-03-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(197, 1, 0, 111, '1', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '14', '', '0.00', '', '2017-03-31 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(198, 1, 0, 112, '2', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '14', '', '0.00', '', '2017-03-31 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(199, 1, 0, 113, '3', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '14', '', '0.00', '', '2017-03-31 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(200, 1, 0, 113, '3', 35, 1, 1, 129, '129.00', 0, 0, 2, '15.48', '14', '', '0.00', '', '2017-03-31 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(201, 1, 0, 114, '4', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '14', '', '0.00', '', '2017-03-31 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(202, 1, 0, 114, '4', 60, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '14', '', '0.00', '', '2017-03-31 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(203, 1, 0, 114, '4', 61, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '14', '', '0.00', '', '2017-03-31 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(204, 1, 0, 115, '5', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '14', '', '0.00', '', '2017-03-31 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(205, 1, 0, 115, '5', 60, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '14', '', '0.00', '', '2017-03-31 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(206, 1, 0, 116, '6', 35, 1, 4, 129, '516.00', 0, 0, 2, '61.92', '14', '', '0.00', '', '2017-03-31 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(207, 1, 0, 117, '1', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '14', '', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(208, 1, 0, 118, '2', 62, 22, 1, 60, '60.00', 0, 0, 4, '7.20', '14', '', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(209, 1, 0, 119, '3', 62, 22, 1, 60, '60.00', 0, 0, 4, '7.20', '14', '', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(210, 1, 0, 119, '3', 35, 1, 1, 129, '129.00', 0, 0, 4, '15.48', '14', '', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(211, 1, 0, 120, '4', 20, 7, 2, 50, '100.00', 0, 0, 4, '12.00', '14', '', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(212, 1, 0, 120, '4', 42, 19, 1, 99, '99.00', 0, 0, 4, '11.88', '14', '', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(213, 1, 0, 121, '5', 61, 22, 1, 70, '70.00', 0, 0, 4, '8.40', '14', '', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(214, 1, 0, 122, '6', 45, 19, 1, 45, '45.00', 0, 0, 4, '5.40', '14', '', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(215, 1, 0, 122, '6', 52, 20, 1, 60, '60.00', 0, 0, 4, '7.20', '14', '', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(216, 1, 0, 123, '7', 20, 7, 1, 50, '50.00', 0, 0, 4, '6.00', '14', '', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(217, 1, 0, 123, '7', 58, 22, 1, 70, '70.00', 0, 0, 4, '8.40', '14', '', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(218, 1, 0, 123, '7', 28, 2, 1, 99, '99.00', 0, 0, 4, '11.88', '14', '', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(219, 1, 0, 124, '8', 41, 19, 1, 129, '129.00', 0, 0, 4, '15.48', '14', '', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(220, 1, 0, 124, '8', 34, 1, 1, 129, '129.00', 0, 0, 4, '15.48', '14', '', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(221, 1, 0, 125, '9', 41, 19, 1, 129, '129.00', 0, 0, 2, '15.48', '14', '', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(222, 1, 0, 125, '9', 15, 7, 1, 88, '88.39', 0, 0, 2, '10.61', '14', '', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(223, 1, 0, 126, '10', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(224, 1, 0, 126, '10', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(225, 1, 0, 126, '10', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(226, 1, 0, 127, '11', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(227, 1, 0, 127, '11', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(228, 1, 0, 127, '11', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(229, 1, 0, 128, '12', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(230, 1, 0, 128, '12', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(231, 1, 0, 128, '12', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(232, 1, 0, 129, '13', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(233, 1, 0, 129, '13', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(234, 1, 0, 129, '13', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(235, 1, 0, 130, '14', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(236, 1, 0, 130, '14', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(237, 1, 0, 130, '14', 29, 2, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(238, 1, 0, 131, '15', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(239, 1, 0, 131, '15', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(240, 1, 0, 131, '15', 61, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(241, 1, 0, 132, '16', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(242, 1, 0, 132, '16', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(243, 1, 0, 132, '16', 40, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(244, 1, 0, 133, '17', 33, 1, 1, 129, '129.00', 0, 0, 2, '15.48', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(245, 1, 0, 133, '17', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(246, 1, 0, 133, '17', 57, 22, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(247, 1, 0, 133, '17', 61, 22, 2, 70, '140.00', 0, 0, 2, '15.96', '11,12', '1,2', '7.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(248, 1, 0, 134, '18', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(249, 1, 0, 134, '18', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(250, 1, 0, 134, '18', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(251, 1, 0, 135, '19', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(252, 1, 0, 135, '19', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(253, 1, 0, 135, '19', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(254, 1, 0, 136, '20', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(255, 1, 0, 136, '20', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(256, 1, 0, 136, '20', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(257, 1, 0, 136, '20', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(258, 1, 0, 137, '21', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(259, 1, 0, 137, '21', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(260, 1, 0, 137, '21', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(261, 1, 0, 138, '22', 62, 22, 2, 60, '120.00', 0, 0, 2, '14.40', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(262, 1, 0, 138, '22', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(263, 1, 0, 138, '22', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(264, 1, 0, 139, '23', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(265, 1, 0, 139, '23', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(266, 1, 0, 139, '23', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(267, 1, 0, 140, '24', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(268, 1, 0, 140, '24', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(269, 1, 0, 140, '24', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(270, 1, 0, 140, '24', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(271, 1, 0, 141, '25', 2, 2, 100, 25, '2500.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(272, 1, 0, 141, '25', 4, 1, 9, 1004, '9036.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(273, 1, 0, 171, '30', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(274, 1, 0, 171, '30', 44, 19, 1, 45, '45.00', 0, 0, 5, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(275, 1, 0, 171, '30', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(276, 1, 0, 171, '30', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(277, 1, 0, 171, '30', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(278, 1, 0, 171, '30', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(279, 1, 0, 174, '33', 44, 19, 1, 45, '45.00', 0, 0, 5, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(280, 1, 0, 174, '33', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(281, 1, 0, 174, '33', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(282, 1, 0, 175, '34', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(283, 1, 0, 175, '34', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(284, 1, 0, 175, '34', 25, 6, 2, 40, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(285, 1, 0, 175, '34', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(286, 1, 0, 175, '34', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(287, 1, 0, 175, '34', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(288, 1, 0, 175, '34', 61, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(289, 1, 0, 175, '34', 45, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(290, 1, 0, 175, '34', 40, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(291, 1, 0, 175, '34', 20, 7, 1, 50, '50.00', 0, 0, 2, '6.00', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(292, 1, 0, 175, '34', 58, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(293, 1, 0, 175, '34', 41, 19, 1, 129, '129.00', 0, 0, 2, '15.48', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(294, 1, 0, 175, '34', 4, 1, 12, 1004, '12048.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(295, 1, 0, 176, '35', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(296, 1, 0, 176, '35', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(297, 1, 0, 176, '35', 34, 1, 1, 129, '129.00', 0, 0, 2, '15.48', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(298, 1, 0, 177, '36', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(299, 1, 0, 177, '36', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(300, 1, 0, 177, '36', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(301, 1, 0, 177, '36', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(302, 1, 0, 177, '36', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(303, 1, 0, 177, '36', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(304, 1, 0, 177, '36', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(305, 1, 0, 178, '37', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(306, 1, 0, 178, '37', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(307, 1, 0, 178, '37', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(308, 1, 0, 178, '37', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(309, 1, 0, 178, '37', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(310, 1, 0, 178, '37', 5, 3, 1, 7, '7.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(311, 1, 0, 178, '37', 4, 1, 12, 1004, '12048.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(312, 1, 0, 179, '38', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(313, 1, 0, 179, '38', 44, 19, 2, 45, '90.00', 0, 0, 2, '10.80', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(314, 1, 0, 179, '38', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(315, 1, 0, 179, '38', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(316, 1, 0, 179, '38', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(317, 1, 0, 179, '38', 4, 1, 11, 1004, '11044.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(318, 1, 0, 180, '39', 4, 1, 10, 1004, '10040.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(319, 1, 0, 180, '39', 49, 19, 3, 45, '135.00', 0, 0, 2, '16.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(320, 1, 0, 180, '39', 55, 21, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(321, 1, 0, 180, '39', 5, 3, 1, 7, '7.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(322, 1, 0, 180, '39', 28, 2, 11, 99, '1089.00', 0, 0, 2, '130.68', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(323, 1, 0, 181, '40', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(324, 1, 0, 181, '40', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(325, 1, 0, 181, '40', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(326, 1, 0, 181, '40', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(327, 1, 0, 181, '40', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(328, 1, 0, 181, '40', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(329, 1, 0, 181, '40', 4, 1, 5, 1004, '5020.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(330, 1, 0, 182, '41', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(331, 1, 0, 182, '41', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(332, 1, 0, 182, '41', 29, 2, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0);
INSERT INTO `pos_sales_order_transaction` (`sales_order_transaction_id`, `company_id`, `employee_id`, `sales_order_id`, `sales_order_no`, `inventory_stock_id`, `inventory_category_id`, `sales_qty`, `sales_rate`, `sales_amount`, `unit_id`, `order_completion_time`, `product_order_status_id`, `product_tax_amount`, `tax_ids`, `discount_ids`, `product_discount_amount`, `comment`, `sales_order_date`, `created_at`, `updated_at`, `batch_no`) VALUES
(333, 1, 0, 182, '41', 61, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(334, 1, 0, 182, '41', 60, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(335, 1, 0, 183, '42', 62, 22, 2, 60, '120.00', 0, 0, 2, '14.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(336, 1, 0, 183, '42', 25, 6, 2, 40, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(337, 1, 0, 183, '42', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(338, 1, 0, 183, '42', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(339, 1, 0, 183, '42', 29, 2, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(340, 1, 0, 184, '43', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(341, 1, 0, 184, '43', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(342, 1, 0, 184, '43', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(343, 1, 0, 184, '43', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(344, 1, 0, 184, '43', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(345, 1, 0, 184, '43', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(346, 1, 0, 184, '43', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(347, 1, 0, 185, '44', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(348, 1, 0, 185, '44', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(349, 1, 0, 185, '44', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(350, 1, 0, 185, '44', 29, 2, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(351, 1, 0, 185, '44', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(352, 1, 0, 186, '45', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(353, 1, 0, 186, '45', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(354, 1, 0, 186, '45', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(355, 1, 0, 186, '45', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(356, 1, 0, 186, '45', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(357, 1, 0, 187, '46', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(358, 1, 0, 187, '46', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(359, 1, 0, 187, '46', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(360, 1, 0, 187, '46', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(361, 1, 0, 187, '46', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(362, 1, 0, 188, '47', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(363, 1, 0, 188, '47', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(364, 1, 0, 188, '47', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(365, 1, 0, 188, '47', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(366, 1, 0, 188, '47', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(367, 1, 0, 189, '48', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(368, 1, 0, 189, '48', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(369, 1, 0, 189, '48', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(370, 1, 0, 189, '48', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(371, 1, 0, 189, '48', 4, 1, 11, 1004, '11044.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(372, 1, 0, 190, '49', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(373, 1, 0, 190, '49', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(374, 1, 0, 190, '49', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(375, 1, 0, 190, '49', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(376, 1, 0, 190, '49', 4, 1, 7, 1004, '7028.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(377, 1, 0, 190, '49', 23, 6, 3, 50, '150.00', 0, 0, 2, '18.00', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(378, 1, 0, 190, '49', 58, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(379, 1, 0, 191, '50', 20, 7, 1, 50, '50.00', 0, 0, 2, '12.00', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(380, 1, 0, 191, '50', 40, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(381, 1, 0, 191, '50', 48, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(382, 1, 0, 191, '50', 53, 20, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(383, 1, 0, 191, '50', 42, 19, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(384, 1, 0, 192, '51', 41, 19, 1, 129, '129.00', 0, 0, 2, '15.48', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(385, 1, 0, 192, '51', 42, 19, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(386, 1, 0, 192, '51', 55, 21, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(387, 1, 0, 192, '51', 33, 1, 1, 129, '129.00', 0, 0, 2, '15.48', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(388, 1, 0, 192, '51', 20, 7, 2, 50, '100.00', 0, 0, 2, '12.00', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(389, 1, 0, 192, '51', 48, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(390, 1, 0, 193, '1', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(391, 1, 0, 193, '1', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(392, 1, 0, 193, '1', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(393, 1, 0, 193, '1', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(394, 1, 0, 193, '1', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(395, 1, 0, 193, '1', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(396, 1, 0, 193, '1', 40, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(397, 1, 0, 193, '1', 54, 21, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(398, 1, 0, 194, '2', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(399, 1, 0, 194, '2', 4, 1, 2, 1004, '2008.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(400, 1, 0, 194, '2', 5, 3, 1, 7, '7.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(401, 1, 0, 194, '2', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(402, 1, 0, 194, '2', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(403, 1, 0, 195, '3', 39, 17, 5, 60, '300.00', 0, 0, 2, '36.00', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(404, 1, 0, 195, '3', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(405, 1, 0, 195, '3', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(406, 1, 0, 195, '3', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(407, 1, 0, 196, '4', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(408, 1, 0, 196, '4', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(409, 1, 0, 196, '4', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(410, 1, 0, 196, '4', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(411, 1, 0, 197, '1', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(412, 1, 0, 197, '1', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(413, 1, 0, 197, '1', 29, 2, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(414, 1, 0, 198, '2', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(415, 1, 0, 198, '2', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(416, 1, 0, 198, '2', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(417, 1, 0, 198, '2', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(418, 1, 0, 198, '2', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(419, 1, 0, 199, '3', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(420, 1, 0, 199, '3', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(421, 1, 0, 199, '3', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(422, 1, 0, 199, '3', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(423, 1, 0, 199, '3', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(424, 1, 0, 200, '4', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(425, 1, 0, 200, '4', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(426, 1, 0, 200, '4', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(427, 1, 0, 200, '4', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(428, 1, 0, 200, '4', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(429, 1, 0, 201, '5', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(430, 1, 0, 201, '5', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(431, 1, 0, 201, '5', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(432, 1, 0, 202, '6', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(433, 1, 0, 202, '6', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(434, 1, 0, 202, '6', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(435, 1, 0, 203, '7', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(436, 1, 0, 203, '7', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(437, 1, 0, 203, '7', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(438, 1, 0, 203, '7', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(439, 1, 0, 204, '8', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(440, 1, 0, 204, '8', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(441, 1, 0, 204, '8', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(442, 1, 0, 204, '8', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(443, 1, 0, 205, '9', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(444, 1, 0, 205, '9', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(445, 1, 0, 205, '9', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(446, 1, 0, 206, '10', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(447, 1, 0, 206, '10', 44, 19, 1, 45, '45.00', 0, 0, 5, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(448, 1, 0, 206, '10', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(449, 1, 0, 207, '11', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(450, 1, 0, 207, '11', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(451, 1, 0, 208, '12', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(452, 1, 0, 208, '12', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(453, 1, 0, 209, '13', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(454, 1, 0, 209, '13', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(455, 1, 0, 209, '13', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(456, 1, 0, 210, '14', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(457, 1, 0, 210, '14', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(458, 1, 0, 211, '15', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(459, 1, 0, 211, '15', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(460, 1, 0, 212, '16', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(461, 1, 0, 212, '16', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(462, 1, 0, 212, '16', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(463, 1, 0, 212, '16', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(464, 1, 0, 213, '17', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(465, 1, 0, 213, '17', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(466, 1, 0, 213, '17', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(467, 1, 0, 213, '17', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(468, 1, 0, 214, '18', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(469, 1, 0, 214, '18', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(470, 1, 0, 214, '18', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(471, 1, 0, 215, '1', 62, 22, 2, 60, '120.00', 0, 0, 2, '14.40', '11,12', '1,2', '0.00', 'tes5gg', '2017-04-06 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(472, 1, 0, 216, '2', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '4', '2017-04-06 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(473, 1, 0, 216, '2', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-06 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(474, 1, 0, 217, '3', 39, 17, 1, 60, '60.00', 0, 0, 2, '6.84', '11,12', '1,2', '3.00', '', '2017-04-06 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(475, 1, 0, 217, '3', 44, 19, 8, 45, '360.00', 0, 0, 2, '38.88', '11,12', '1,2', '36.00', '', '2017-04-06 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(476, 1, 0, 218, '19', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(477, 1, 0, 218, '19', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(478, 1, 0, 218, '19', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(479, 1, 0, 218, '19', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(480, 1, 0, 218, '19', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(481, 1, 0, 219, '20', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(482, 1, 0, 219, '20', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(483, 1, 0, 219, '20', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(484, 1, 0, 219, '20', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(485, 1, 0, 219, '20', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(486, 1, 0, 220, '1', 39, 17, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(487, 1, 0, 220, '1', 25, 6, 1, 40, '40.00', 0, 0, 5, '4.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(488, 1, 0, 220, '1', 62, 22, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(489, 1, 0, 221, '2', 25, 6, 1, 40, '40.00', 0, 0, 5, '4.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(490, 1, 0, 221, '2', 62, 22, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(491, 1, 0, 222, '3', 39, 17, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(492, 1, 0, 222, '3', 62, 22, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(493, 1, 0, 222, '3', 51, 20, 1, 70, '70.00', 0, 0, 5, '8.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(494, 1, 0, 222, '3', 60, 22, 1, 70, '70.00', 0, 0, 5, '8.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(495, 1, 0, 223, '4', 62, 22, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(496, 1, 0, 223, '4', 25, 6, 1, 40, '40.00', 0, 0, 5, '4.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(497, 1, 0, 224, '5', 39, 17, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(498, 1, 0, 224, '5', 25, 6, 1, 40, '40.00', 0, 0, 5, '4.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(499, 1, 0, 225, '6', 39, 17, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(500, 1, 0, 225, '6', 25, 6, 1, 40, '40.00', 0, 0, 5, '4.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(501, 1, 0, 225, '6', 62, 22, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(502, 1, 0, 226, '7', 39, 17, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(503, 1, 0, 226, '7', 44, 19, 1, 45, '45.00', 0, 0, 5, '5.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(504, 1, 0, 226, '7', 25, 6, 1, 40, '40.00', 0, 0, 5, '4.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(505, 1, 0, 227, '8', 39, 17, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(506, 1, 0, 227, '8', 59, 22, 1, 70, '70.00', 0, 0, 5, '8.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(507, 1, 0, 227, '8', 18, 7, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(508, 1, 0, 228, '9', 39, 17, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(509, 1, 0, 228, '9', 25, 6, 1, 40, '40.00', 0, 0, 5, '4.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(510, 1, 0, 228, '9', 62, 22, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(511, 1, 0, 229, '10', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(512, 1, 0, 229, '10', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(513, 1, 0, 229, '10', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(514, 1, 0, 230, '11', 39, 17, 2, 60, '120.00', 0, 0, 2, '14.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(515, 1, 0, 231, '12', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(516, 1, 0, 232, '13', 44, 19, 6, 45, '270.00', 0, 0, 2, '32.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(517, 1, 0, 232, '13', 25, 6, 4, 40, '160.00', 0, 0, 2, '19.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(518, 1, 0, 232, '13', 62, 22, 4, 60, '240.00', 0, 0, 2, '28.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(519, 1, 0, 233, '14', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(520, 1, 0, 233, '14', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(521, 1, 0, 234, '15', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(522, 1, 0, 234, '15', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(523, 1, 0, 235, '16', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(524, 1, 0, 235, '16', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(525, 1, 0, 236, '17', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(526, 1, 0, 236, '17', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(527, 1, 0, 237, '18', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(528, 1, 0, 237, '18', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(529, 1, 0, 237, '18', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(530, 1, 0, 238, '19', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(531, 1, 0, 238, '19', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(532, 1, 0, 238, '19', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(533, 1, 0, 239, '20', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(534, 1, 0, 239, '20', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(535, 1, 0, 240, '21', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(536, 1, 0, 240, '21', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(537, 1, 0, 241, '22', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(538, 1, 0, 241, '22', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(539, 1, 0, 242, '23', 39, 17, 2, 60, '120.00', 0, 0, 2, '14.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(540, 1, 0, 242, '23', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(541, 1, 0, 242, '23', 31, 2, 2, 80, '160.00', 0, 0, 2, '19.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(542, 1, 0, 242, '23', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(543, 1, 0, 243, '24', 39, 17, 2, 60, '120.00', 0, 0, 2, '14.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(544, 1, 0, 243, '24', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(545, 1, 0, 244, '25', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(546, 1, 0, 244, '25', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(547, 1, 0, 245, '26', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(548, 1, 0, 245, '26', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(549, 1, 0, 246, '27', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(550, 1, 0, 246, '27', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(551, 1, 0, 247, '28', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(552, 1, 0, 247, '28', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(553, 1, 0, 248, '29', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(554, 1, 0, 248, '29', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(555, 1, 0, 249, '30', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(556, 1, 0, 249, '30', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(557, 1, 0, 250, '31', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(558, 1, 0, 250, '31', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(559, 1, 0, 251, '32', 25, 6, 12, 40, '480.00', 0, 0, 2, '54.72', '11,12', '1,2', '24.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(560, 1, 0, 252, '33', 29, 2, 15, 99, '1485.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(561, 1, 0, 253, '34', 46, 19, 5, 45, '225.00', 0, 0, 5, '27.00', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(562, 1, 0, 254, '35', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(563, 1, 0, 254, '35', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(564, 1, 0, 255, '36', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(565, 1, 0, 255, '36', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(566, 1, 0, 256, '37', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(567, 1, 0, 256, '37', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(568, 1, 0, 257, '38', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(569, 1, 0, 257, '38', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(570, 1, 0, 258, '39', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(571, 1, 0, 258, '39', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(572, 1, 0, 259, '40', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(573, 1, 0, 259, '40', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(574, 1, 0, 260, '41', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(575, 1, 0, 260, '41', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(576, 1, 0, 261, '42', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(577, 1, 0, 261, '42', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(578, 1, 0, 262, '43', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(579, 1, 0, 263, '44', 39, 17, 13, 60, '780.00', 0, 0, 2, '93.60', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(580, 1, 0, 263, '44', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(581, 1, 0, 263, '44', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(582, 1, 0, 264, '45', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(583, 1, 0, 265, '46', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(584, 1, 0, 265, '46', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(585, 1, 0, 266, '47', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(586, 1, 0, 266, '47', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(587, 1, 0, 267, '48', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(588, 1, 0, 267, '48', 62, 22, 2, 60, '120.00', 0, 0, 2, '14.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(589, 1, 0, 268, '49', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(590, 1, 0, 268, '49', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(591, 1, 0, 269, '50', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(592, 1, 0, 270, '51', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(593, 1, 0, 270, '51', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(594, 1, 0, 271, '52', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(595, 1, 0, 271, '52', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(596, 1, 0, 272, '53', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(597, 1, 0, 273, '54', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(598, 1, 0, 273, '54', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(599, 1, 0, 274, '55', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(600, 1, 0, 275, '56', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(601, 1, 0, 275, '56', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(602, 1, 0, 276, '57', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(603, 1, 0, 276, '57', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(604, 1, 0, 277, '58', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(605, 1, 0, 277, '58', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(606, 1, 0, 278, '59', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(607, 1, 0, 278, '59', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(608, 1, 0, 279, '60', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(609, 1, 0, 279, '60', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(610, 1, 0, 280, '61', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(611, 1, 0, 281, '62', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(612, 1, 0, 282, '63', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(613, 1, 0, 282, '63', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(614, 1, 0, 283, '64', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(615, 1, 0, 283, '64', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(616, 1, 0, 284, '65', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(617, 1, 0, 284, '65', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(618, 1, 0, 285, '1', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(619, 1, 0, 285, '1', 25, 6, 1, 40, '40.00', 0, 0, 4, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(620, 1, 0, 286, '2', 39, 17, 1, 60, '60.00', 0, 0, 3, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(621, 1, 0, 286, '2', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(622, 1, 0, 287, '3', 39, 17, 1, 60, '60.00', 0, 0, 3, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(623, 1, 0, 287, '3', 25, 6, 1, 40, '40.00', 0, 0, 3, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(624, 1, 0, 288, '4', 39, 17, 1, 60, '60.00', 0, 0, 3, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(625, 1, 0, 288, '4', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(626, 1, 0, 289, '5', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(627, 1, 0, 289, '5', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(628, 1, 0, 290, '6', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(629, 1, 0, 290, '6', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(630, 1, 0, 291, '7', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(631, 1, 0, 291, '7', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(632, 1, 0, 292, '8', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(633, 1, 0, 292, '8', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(634, 1, 0, 292, '8', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(635, 1, 0, 293, '9', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(636, 1, 0, 293, '9', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0);
INSERT INTO `pos_sales_order_transaction` (`sales_order_transaction_id`, `company_id`, `employee_id`, `sales_order_id`, `sales_order_no`, `inventory_stock_id`, `inventory_category_id`, `sales_qty`, `sales_rate`, `sales_amount`, `unit_id`, `order_completion_time`, `product_order_status_id`, `product_tax_amount`, `tax_ids`, `discount_ids`, `product_discount_amount`, `comment`, `sales_order_date`, `created_at`, `updated_at`, `batch_no`) VALUES
(637, 1, 0, 293, '9', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(638, 1, 0, 294, '10', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(639, 1, 0, 294, '10', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(640, 1, 0, 295, '11', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(641, 1, 0, 295, '11', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(642, 1, 0, 296, '12', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(643, 1, 0, 296, '12', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(644, 1, 0, 296, '12', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(645, 1, 0, 296, '12', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(646, 1, 0, 296, '12', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(647, 1, 0, 296, '12', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(648, 1, 0, 297, '13', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(649, 1, 0, 297, '13', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(650, 1, 0, 297, '13', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(651, 1, 0, 297, '13', 62, 22, 1, 60, '60.00', 0, 0, 3, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(652, 1, 0, 297, '13', 46, 19, 2, 45, '90.00', 0, 0, 2, '10.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(653, 1, 0, 298, '14', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(654, 1, 0, 298, '14', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(655, 1, 0, 298, '14', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(656, 1, 0, 298, '14', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(657, 1, 0, 298, '14', 46, 19, 2, 45, '90.00', 0, 0, 2, '10.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(658, 1, 0, 299, '15', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(659, 1, 0, 299, '15', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(660, 1, 0, 299, '15', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(661, 1, 0, 299, '15', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(662, 1, 0, 300, '16', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(663, 1, 0, 300, '16', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(664, 1, 0, 300, '16', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(665, 1, 0, 301, '17', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(666, 1, 0, 301, '17', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(667, 1, 0, 302, '18', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(668, 1, 0, 302, '18', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(669, 1, 0, 302, '18', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(670, 1, 0, 303, '19', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(671, 1, 0, 303, '19', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(672, 1, 0, 303, '19', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(673, 1, 0, 303, '19', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(674, 1, 0, 303, '19', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(675, 1, 0, 304, '20', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(676, 1, 0, 304, '20', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(677, 1, 0, 304, '20', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(678, 1, 0, 304, '20', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(679, 1, 0, 304, '20', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(680, 1, 0, 304, '20', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(681, 1, 0, 305, '21', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(682, 1, 0, 305, '21', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(683, 1, 0, 305, '21', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(684, 1, 0, 306, '22', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(685, 1, 0, 306, '22', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(686, 1, 0, 306, '22', 25, 6, 7, 40, '280.00', 0, 0, 2, '33.60', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(687, 1, 0, 306, '22', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(688, 1, 0, 306, '22', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(689, 1, 0, 306, '22', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(690, 1, 0, 306, '22', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(691, 1, 0, 306, '22', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(692, 1, 0, 307, '23', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(693, 1, 0, 307, '23', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(694, 1, 0, 307, '23', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(695, 1, 0, 307, '23', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(696, 1, 0, 307, '23', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(697, 1, 0, 307, '23', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(698, 1, 0, 307, '23', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(699, 1, 0, 307, '23', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(700, 1, 0, 307, '23', 29, 2, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(701, 1, 0, 308, '24', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(702, 1, 0, 308, '24', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(703, 1, 0, 308, '24', 25, 6, 2, 40, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(704, 1, 0, 308, '24', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(705, 1, 0, 308, '24', 46, 19, 2, 45, '90.00', 0, 0, 2, '10.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(706, 1, 0, 308, '24', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(707, 1, 0, 308, '24', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(708, 1, 0, 308, '24', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(709, 1, 0, 308, '24', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(710, 1, 0, 308, '24', 29, 2, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(711, 1, 0, 309, '25', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(712, 1, 0, 309, '25', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(713, 1, 0, 309, '25', 25, 6, 2, 40, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(714, 1, 0, 309, '25', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(715, 1, 0, 309, '25', 46, 19, 2, 45, '90.00', 0, 0, 2, '10.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(716, 1, 0, 309, '25', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(717, 1, 0, 309, '25', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(718, 1, 0, 309, '25', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(719, 1, 0, 309, '25', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(720, 1, 0, 309, '25', 29, 2, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(721, 1, 0, 310, '26', 17, 7, 8, 54, '428.57', 0, 0, 2, '51.43', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(722, 1, 0, 311, '27', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(723, 1, 0, 311, '27', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(724, 1, 0, 311, '27', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(725, 1, 0, 311, '27', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(726, 1, 0, 311, '27', 46, 19, 5, 45, '225.00', 0, 0, 2, '27.00', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(727, 1, 0, 311, '27', 59, 22, 4, 70, '280.00', 0, 0, 2, '33.60', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(728, 1, 0, 311, '27', 17, 7, 18, 54, '964.29', 0, 0, 2, '115.71', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(729, 1, 0, 312, '28', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(730, 1, 0, 312, '28', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(731, 1, 0, 312, '28', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(732, 1, 0, 312, '28', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(733, 1, 0, 312, '28', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(734, 1, 0, 312, '28', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(735, 1, 0, 312, '28', 17, 7, 1, 54, '53.57', 0, 0, 2, '6.43', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(736, 1, 0, 312, '28', 63, 22, 1, 50, '50.00', 0, 0, 2, '6.00', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(737, 1, 0, 312, '28', 32, 2, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(738, 1, 0, 312, '28', 15, 7, 1, 88, '88.39', 0, 0, 2, '10.61', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(739, 1, 0, 313, '29', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(740, 1, 0, 314, '30', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(741, 1, 0, 314, '30', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(742, 1, 0, 315, '31', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(743, 1, 0, 315, '31', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(744, 1, 0, 316, '32', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(745, 1, 0, 316, '32', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(746, 1, 0, 317, '33', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(747, 1, 0, 318, '34', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(748, 1, 0, 318, '34', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(749, 1, 0, 319, '35', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(750, 1, 0, 319, '35', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(751, 1, 0, 320, '36', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(752, 1, 0, 321, '37', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(753, 1, 0, 321, '37', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(754, 1, 0, 322, '38', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(755, 1, 0, 322, '38', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(756, 1, 0, 323, '39', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(757, 1, 0, 323, '39', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(758, 1, 0, 324, '40', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(759, 1, 0, 325, '41', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(760, 1, 0, 326, '42', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(761, 1, 0, 327, '43', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(762, 1, 0, 327, '43', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(763, 1, 0, 328, '44', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(764, 1, 0, 329, '45', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(765, 1, 0, 330, '46', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(766, 1, 0, 331, '47', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(767, 1, 0, 332, '48', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(768, 1, 0, 333, '49', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(769, 1, 0, 333, '49', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(770, 1, 0, 334, '50', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(771, 1, 0, 335, '51', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(772, 1, 0, 336, '52', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(773, 1, 0, 337, '53', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(774, 1, 0, 338, '54', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(775, 1, 0, 339, '55', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(776, 1, 0, 340, '56', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(777, 1, 0, 341, '57', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(778, 1, 0, 342, '58', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(779, 1, 0, 342, '58', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(780, 1, 0, 342, '58', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(781, 1, 0, 342, '58', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(782, 1, 0, 342, '58', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(783, 1, 0, 342, '58', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(784, 1, 0, 342, '58', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(785, 1, 0, 342, '58', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(786, 1, 0, 342, '58', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(787, 1, 0, 342, '58', 29, 2, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(788, 1, 0, 342, '58', 35, 1, 1, 129, '129.00', 0, 0, 2, '15.48', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(789, 1, 0, 342, '58', 60, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(790, 1, 0, 342, '58', 61, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(791, 1, 0, 342, '58', 57, 22, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(792, 1, 0, 342, '58', 56, 21, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(793, 1, 0, 343, '59', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(794, 1, 0, 343, '59', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(795, 1, 0, 343, '59', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(796, 1, 0, 343, '59', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(797, 1, 0, 343, '59', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(798, 1, 0, 343, '59', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(799, 1, 0, 343, '59', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(800, 1, 0, 343, '59', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(801, 1, 0, 343, '59', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(802, 1, 0, 343, '59', 29, 2, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(803, 1, 0, 343, '59', 35, 1, 1, 129, '129.00', 0, 0, 2, '15.48', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(804, 1, 0, 343, '59', 60, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(805, 1, 0, 343, '59', 61, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(806, 1, 0, 343, '59', 57, 22, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(807, 1, 0, 343, '59', 56, 21, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(808, 1, 0, 344, '60', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(809, 1, 0, 344, '60', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(810, 1, 0, 344, '60', 60, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(811, 1, 0, 345, '61', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(812, 1, 0, 346, '62', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(813, 1, 0, 346, '62', 62, 22, 1, 60, '60.00', 0, 0, 2, '14.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(814, 1, 0, 346, '62', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(815, 1, 0, 346, '62', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(816, 1, 0, 346, '62', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(817, 1, 0, 346, '62', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(818, 1, 0, 346, '62', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(819, 1, 0, 346, '62', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(820, 1, 0, 347, '63', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(821, 1, 0, 347, '63', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(822, 1, 0, 347, '63', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(823, 1, 0, 347, '63', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(824, 1, 0, 347, '63', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(825, 1, 0, 347, '63', 29, 2, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(826, 1, 0, 348, '64', 15, 7, 1, 88, '88.39', 0, 0, 2, '10.61', '14', '', '0.00', '', '2017-04-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(827, 1, 0, 349, '1', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(828, 1, 0, 349, '1', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(829, 1, 0, 349, '1', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(830, 1, 0, 349, '1', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(831, 1, 0, 350, '2', 25, 6, 2, 40, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(832, 1, 0, 350, '2', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(833, 1, 0, 350, '2', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(834, 1, 0, 350, '2', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(835, 1, 0, 350, '2', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(836, 1, 0, 351, '3', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(837, 1, 0, 351, '3', 25, 6, 1, 40, '40.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(838, 1, 0, 351, '3', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(839, 1, 0, 351, '3', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(840, 1, 0, 351, '3', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(841, 1, 0, 351, '3', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(842, 1, 0, 352, '4', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(843, 1, 0, 352, '4', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(844, 1, 0, 352, '4', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(845, 1, 0, 352, '4', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(846, 1, 0, 352, '4', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(847, 1, 0, 352, '4', 29, 2, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(848, 1, 0, 352, '4', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(849, 1, 0, 353, '5', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(850, 1, 0, 353, '5', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(851, 1, 0, 353, '5', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', 'test test test test test test test test test test the first two days to get a good weekend but', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(852, 1, 0, 353, '5', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(853, 1, 0, 353, '5', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(854, 1, 0, 354, '6', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(855, 1, 0, 354, '6', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(856, 1, 0, 354, '6', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(857, 1, 0, 354, '6', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(858, 1, 0, 354, '6', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(859, 1, 0, 354, '6', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(860, 1, 0, 354, '6', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(861, 1, 0, 355, '7', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(862, 1, 0, 355, '7', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(863, 1, 0, 355, '7', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(864, 1, 0, 355, '7', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(865, 1, 0, 355, '7', 29, 2, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(866, 1, 0, 355, '7', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(867, 1, 0, 355, '7', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(868, 1, 0, 355, '7', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(869, 1, 0, 356, '8', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(870, 1, 0, 356, '8', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(871, 1, 0, 356, '8', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(872, 1, 0, 356, '8', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(873, 1, 0, 356, '8', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(874, 1, 0, 357, '9', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', 'salted and then we would need anything to be the first', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(875, 1, 0, 357, '9', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(876, 1, 0, 357, '9', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(877, 1, 0, 357, '9', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(878, 1, 0, 357, '9', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(879, 1, 0, 357, '9', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(880, 1, 0, 357, '9', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(881, 1, 0, 358, '10', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(882, 1, 0, 358, '10', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(883, 1, 0, 358, '10', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(884, 1, 0, 358, '10', 62, 22, 3, 60, '180.00', 0, 0, 2, '21.60', '11,12', '1,2', '0.00', '', '2017-04-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(885, 1, 0, 359, '1', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(886, 1, 0, 359, '1', 44, 19, 1, 45, '45.00', 0, 0, 5, '5.40', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(887, 1, 0, 359, '1', 25, 6, 1, 40, '40.00', 0, 0, 5, '4.80', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(888, 1, 0, 360, '2', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(889, 1, 0, 361, '3', 39, 17, 18, 60, '1080.00', 0, 0, 3, '129.24', '11,12', '1,2', '3.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(890, 1, 0, 361, '3', 44, 19, 1, 45, '45.00', 0, 0, 5, '5.40', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(891, 1, 0, 361, '3', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(892, 1, 0, 361, '3', 60, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(893, 1, 0, 361, '3', 20, 7, 2, 50, '100.00', 0, 0, 3, '12.00', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(894, 1, 0, 361, '3', 42, 19, 1, 99, '99.00', 0, 0, 5, '11.88', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(895, 1, 0, 362, '4', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(896, 1, 0, 362, '4', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(897, 1, 0, 363, '5', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(898, 1, 0, 363, '5', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(899, 1, 0, 364, '6', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(900, 1, 0, 364, '6', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(901, 1, 0, 365, '7', 39, 17, 13, 60, '780.00', 0, 0, 2, '93.60', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(902, 1, 0, 365, '7', 18, 7, 2, 60, '120.00', 0, 0, 2, '14.40', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(903, 1, 0, 365, '7', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(904, 1, 0, 365, '7', 29, 2, 2, 99, '198.00', 0, 0, 2, '23.76', '11,12', '1,2', '0.00', '', '2017-04-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(905, 1, 0, 366, '1', 25, 6, 1, 40, '40.00', 0, 0, 4, '4.80', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(906, 1, 0, 367, '2', 39, 17, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(907, 1, 0, 368, '3', 39, 17, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(908, 1, 0, 368, '3', 44, 19, 1, 45, '45.00', 0, 0, 5, '5.40', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(909, 1, 0, 368, '3', 25, 6, 1, 40, '40.00', 0, 0, 5, '4.80', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(910, 1, 0, 368, '3', 62, 22, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(911, 1, 0, 369, '4', 39, 17, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(912, 1, 0, 370, '5', 44, 19, 2, 45, '90.00', 0, 0, 5, '10.80', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(913, 1, 0, 370, '5', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(914, 1, 0, 371, '6', 25, 6, 1, 40, '40.00', 0, 0, 5, '4.80', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(915, 1, 0, 371, '6', 62, 22, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(916, 1, 0, 372, '7', 36, 1, 1, 119, '119.00', 0, 0, 5, '14.28', '11,12', '1,2', '0.00', 'spicy', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(917, 1, 0, 373, '8', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(918, 1, 0, 374, '9', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(919, 1, 0, 375, '10', 62, 22, 1, 60, '60.00', 0, 0, 5, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(920, 1, 0, 376, '11', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(921, 1, 0, 376, '11', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(922, 1, 0, 377, '12', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(923, 1, 0, 377, '12', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(924, 1, 0, 378, '13', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(925, 1, 0, 379, '14', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(926, 1, 0, 379, '14', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(927, 1, 0, 380, '15', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(928, 1, 0, 380, '15', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(929, 1, 0, 381, '16', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(930, 1, 0, 381, '16', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(931, 1, 0, 382, '17', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(932, 1, 0, 383, '18', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(933, 1, 0, 383, '18', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(934, 1, 0, 384, '19', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(935, 1, 0, 384, '19', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(936, 1, 0, 385, '20', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(937, 1, 0, 385, '20', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(938, 1, 0, 386, '21', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(939, 1, 0, 387, '22', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0);
INSERT INTO `pos_sales_order_transaction` (`sales_order_transaction_id`, `company_id`, `employee_id`, `sales_order_id`, `sales_order_no`, `inventory_stock_id`, `inventory_category_id`, `sales_qty`, `sales_rate`, `sales_amount`, `unit_id`, `order_completion_time`, `product_order_status_id`, `product_tax_amount`, `tax_ids`, `discount_ids`, `product_discount_amount`, `comment`, `sales_order_date`, `created_at`, `updated_at`, `batch_no`) VALUES
(940, 1, 0, 387, '22', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(941, 1, 0, 388, '23', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(942, 1, 0, 388, '23', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(943, 1, 0, 389, '24', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(944, 1, 0, 389, '24', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(945, 1, 0, 390, '25', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(946, 1, 0, 390, '25', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(947, 1, 0, 391, '26', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(948, 1, 0, 392, '27', 60, 22, 4, 70, '280.00', 0, 0, 2, '33.60', '11,12', '1,2', '0.00', 'ekdum chilled', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(949, 1, 0, 393, '28', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(950, 1, 0, 393, '28', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(951, 1, 0, 394, '29', 40, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(952, 1, 0, 395, '30', 44, 19, 2, 45, '90.00', 0, 0, 2, '10.80', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(953, 1, 0, 395, '30', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(954, 1, 0, 395, '30', 18, 7, 3, 60, '180.00', 0, 0, 2, '21.60', '11,12', '1,2', '0.00', 'without coconut', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(955, 1, 0, 395, '30', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(956, 1, 0, 396, '31', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(957, 1, 0, 397, '32', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(958, 1, 0, 397, '32', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(959, 1, 0, 398, '33', 68, 27, 1, 40, '40.00', 0, 0, 3, '0.00', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(960, 1, 0, 399, '34', 68, 27, 1, 40, '40.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(961, 1, 0, 399, '34', 15, 7, 1, 88, '88.39', 0, 0, 3, '10.61', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(962, 1, 0, 399, '34', 24, 6, 1, 50, '50.00', 0, 0, 2, '6.00', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(963, 1, 0, 400, '35', 19, 7, 1, 50, '50.00', 0, 0, 2, '6.00', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(964, 1, 0, 400, '35', 27, 3, 1, 80, '80.00', 0, 0, 3, '9.60', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(965, 1, 0, 400, '35', 50, 20, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(966, 1, 0, 401, '36', 50, 20, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(967, 1, 0, 401, '36', 27, 3, 1, 80, '80.00', 0, 0, 3, '9.60', '11,12', '1,2', '0.00', '', '2017-04-14 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(968, 1, 0, 402, '1', 60, 22, 1, 70, '70.00', 0, 0, 3, '8.40', '11,12', '1,2', '0.00', '', '2017-04-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(969, 1, 0, 402, '1', 57, 22, 1, 80, '80.00', 0, 0, 5, '9.60', '11,12', '1,2', '0.00', '', '2017-04-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(970, 1, 0, 403, '2', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(971, 1, 0, 403, '2', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(972, 1, 0, 404, '1', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(973, 1, 0, 404, '1', 51, 20, 2, 70, '140.00', 0, 0, 2, '16.80', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(974, 1, 0, 404, '1', 18, 7, 19, 60, '1140.00', 0, 0, 2, '136.80', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(975, 1, 0, 404, '1', 31, 2, 6, 80, '480.00', 0, 0, 2, '57.60', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(976, 1, 0, 404, '1', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(977, 1, 0, 404, '1', 60, 22, 2, 70, '140.00', 0, 0, 2, '16.80', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(978, 1, 0, 404, '1', 39, 17, 2, 60, '120.00', 0, 0, 2, '14.40', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(979, 1, 0, 404, '1', 61, 22, 2, 70, '140.00', 0, 0, 2, '16.80', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(980, 1, 0, 404, '1', 57, 22, 2, 80, '160.00', 0, 0, 2, '19.20', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(981, 1, 0, 405, '2', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(982, 1, 0, 405, '2', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(983, 1, 0, 406, '3', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(984, 1, 0, 406, '3', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(985, 1, 0, 406, '3', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(986, 1, 0, 407, '4', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(987, 1, 0, 407, '4', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(988, 1, 0, 408, '5', 39, 17, 44, 60, '2640.00', 0, 0, 2, '316.80', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(989, 1, 0, 408, '5', 62, 22, 4, 60, '240.00', 0, 0, 2, '28.80', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(990, 1, 0, 408, '5', 4, 1, 91, 1004, '91364.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(991, 1, 0, 409, '6', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(992, 1, 0, 409, '6', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(993, 1, 0, 409, '6', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(994, 1, 0, 410, '7', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(995, 1, 0, 410, '7', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(996, 1, 0, 410, '7', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(997, 1, 0, 411, '8', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(998, 1, 0, 412, '9', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(999, 1, 0, 412, '9', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1000, 1, 0, 413, '10', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1001, 1, 0, 413, '10', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1002, 1, 0, 413, '10', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1003, 1, 0, 413, '10', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1004, 1, 0, 413, '10', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1005, 1, 0, 413, '10', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1006, 1, 0, 413, '10', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1007, 1, 0, 414, '11', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1008, 1, 0, 414, '11', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1009, 1, 0, 414, '11', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1010, 1, 0, 414, '11', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1011, 1, 0, 414, '11', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1012, 1, 0, 414, '11', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1013, 1, 0, 414, '11', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1014, 1, 0, 415, '1', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1015, 1, 0, 415, '1', 25, 6, 1, 40, '40.00', 0, 0, 4, '4.80', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1016, 1, 0, 416, '2', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1017, 1, 0, 417, '3', 14, 6, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1018, 1, 0, 418, '4', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1019, 1, 0, 418, '4', 44, 19, 1, 45, '45.00', 0, 0, 4, '5.40', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1020, 1, 0, 419, '5', 62, 22, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1021, 1, 0, 419, '5', 46, 19, 1, 45, '45.00', 0, 0, 4, '5.40', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1022, 1, 0, 420, '6', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1023, 1, 0, 421, '7', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1024, 1, 0, 421, '7', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1025, 1, 0, 421, '7', 46, 19, 1, 45, '45.00', 0, 0, 5, '5.40', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1026, 1, 0, 421, '7', 29, 2, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1027, 1, 0, 421, '7', 34, 1, 1, 129, '129.00', 0, 0, 5, '15.48', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1028, 1, 0, 422, '8', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1029, 1, 0, 422, '8', 60, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1030, 1, 0, 423, '9', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1031, 1, 0, 423, '9', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1032, 1, 0, 423, '9', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1033, 1, 0, 424, '10', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1034, 1, 0, 424, '10', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1035, 1, 0, 424, '10', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1036, 1, 0, 425, '11', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1037, 1, 0, 425, '11', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1038, 1, 0, 425, '11', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1039, 1, 0, 426, '12', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1040, 1, 0, 426, '12', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1041, 1, 0, 426, '12', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1042, 1, 0, 426, '12', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1043, 1, 0, 427, '13', 39, 17, 1, 60, '60.00', 0, 0, 2, '6.48', '11,12', '1,2', '6.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1044, 1, 0, 427, '13', 44, 19, 1, 45, '45.00', 0, 0, 2, '4.86', '11,12', '1,2', '4.50', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1045, 1, 0, 427, '13', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.32', '11,12', '1,2', '4.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1046, 1, 0, 427, '13', 62, 22, 1, 60, '60.00', 0, 0, 2, '6.48', '11,12', '1,2', '6.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1047, 1, 0, 428, '14', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1048, 1, 0, 428, '14', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1049, 1, 0, 428, '14', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1050, 1, 0, 428, '14', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1051, 1, 0, 429, '15', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1052, 1, 0, 429, '15', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1053, 1, 0, 429, '15', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1054, 1, 0, 429, '15', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1055, 1, 0, 430, '16', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1056, 1, 0, 430, '16', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1057, 1, 0, 430, '16', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1058, 1, 0, 430, '16', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1059, 1, 0, 431, '1', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1060, 1, 0, 431, '1', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1061, 1, 0, 432, '2', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1062, 1, 0, 433, '3', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1063, 1, 0, 434, '4', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1064, 1, 0, 435, '5', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1065, 1, 0, 436, '6', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1066, 1, 0, 437, '7', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1067, 1, 0, 437, '7', 25, 6, 2, 40, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1068, 1, 0, 438, '8', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1069, 1, 0, 438, '8', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1070, 1, 0, 439, '9', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1071, 1, 0, 439, '9', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1072, 1, 0, 440, '10', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1073, 1, 0, 440, '10', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1074, 1, 0, 441, '11', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1075, 1, 0, 442, '12', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1076, 1, 0, 442, '12', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1077, 1, 0, 443, '13', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1078, 1, 0, 443, '13', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1079, 1, 0, 443, '13', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1080, 1, 0, 444, '1', 39, 17, 2, 60, '120.00', 0, 0, 2, '14.40', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1081, 1, 0, 444, '1', 25, 6, 2, 40, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1082, 1, 0, 444, '1', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1083, 1, 0, 444, '1', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1084, 1, 0, 444, '1', 29, 2, 2, 99, '198.00', 0, 0, 2, '23.76', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1085, 1, 0, 444, '1', 61, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1086, 1, 0, 444, '1', 35, 1, 1, 129, '129.00', 0, 0, 2, '15.48', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1087, 1, 0, 444, '1', 60, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1088, 1, 0, 444, '1', 56, 21, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1089, 1, 0, 445, '2', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1090, 1, 0, 445, '2', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1091, 1, 0, 445, '2', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1092, 1, 0, 445, '2', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1093, 1, 0, 445, '2', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1094, 1, 0, 445, '2', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1095, 1, 0, 446, '3', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1096, 1, 0, 446, '3', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1097, 1, 0, 446, '3', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1098, 1, 0, 446, '3', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1099, 1, 0, 446, '3', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1100, 1, 0, 446, '3', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1101, 1, 0, 446, '3', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1102, 1, 0, 447, '4', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1103, 1, 0, 447, '4', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1104, 1, 0, 448, '5', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1105, 1, 0, 448, '5', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1106, 1, 0, 449, '1', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1107, 1, 0, 449, '1', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1108, 1, 0, 450, '2', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1109, 1, 0, 450, '2', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1110, 1, 0, 451, '3', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1111, 1, 0, 451, '3', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1112, 1, 0, 452, '4', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1113, 1, 0, 452, '4', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1114, 1, 0, 452, '4', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1115, 1, 0, 453, '5', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1116, 1, 0, 453, '5', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1117, 22, 0, 454, '1', 72, 28, 5, 40, '200.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1118, 1, 0, 455, '6', 62, 22, 2, 60, '120.00', 0, 0, 2, '14.40', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1119, 1, 0, 455, '6', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1120, 1, 0, 456, '7', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1121, 1, 0, 456, '7', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1122, 1, 0, 457, '8', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1123, 1, 0, 457, '8', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1124, 1, 0, 457, '8', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1125, 1, 0, 458, '9', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1126, 1, 0, 458, '9', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1127, 1, 0, 458, '9', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1128, 1, 0, 459, '10', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1129, 1, 0, 459, '10', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1130, 1, 0, 459, '10', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1131, 1, 0, 460, '11', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1132, 1, 0, 460, '11', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1133, 1, 0, 460, '11', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1134, 1, 0, 460, '11', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1135, 1, 0, 461, '12', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1136, 1, 0, 461, '12', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1137, 1, 0, 461, '12', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1138, 1, 0, 461, '12', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1139, 1, 0, 462, '13', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1140, 1, 0, 462, '13', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1141, 1, 0, 462, '13', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1142, 22, 0, 463, '1', 72, 28, 1, 40, '40.00', 0, 0, 2, '0.00', '11,12', '1,2', '4.00', '', '2017-04-22 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1143, 22, 0, 463, '1', 74, 28, 1, 18, '18.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-22 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1144, 1, 0, 464, '1', 39, 17, 1, 60, '60.00', 0, 0, 3, '7.20', '11,12', '1,2', '0.00', '', '2017-04-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1145, 1, 0, 464, '1', 44, 19, 1, 45, '45.00', 0, 0, 3, '5.40', '11,12', '1,2', '0.00', '', '2017-04-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1146, 1, 0, 465, '2', 39, 17, 1, 60, '60.00', 0, 0, 3, '7.20', '11,12', '1,2', '0.00', '', '2017-04-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1147, 1, 0, 465, '2', 44, 19, 1, 45, '45.00', 0, 0, 3, '5.40', '11,12', '1,2', '0.00', '', '2017-04-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1148, 1, 0, 466, '3', 62, 22, 2, 60, '120.00', 0, 0, 2, '14.40', '11,12', '1,2', '0.00', '', '2017-04-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1149, 1, 0, 467, '4', 34, 1, 1, 129, '129.00', 0, 0, 2, '15.48', '11,12', '1,2', '0.00', '', '2017-04-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1150, 1, 0, 467, '4', 57, 22, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1151, 1, 0, 468, '5', 60, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1152, 1, 0, 469, '6', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1153, 1, 0, 470, '7', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1154, 1, 0, 470, '7', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1155, 1, 0, 471, '1', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1156, 1, 0, 471, '1', 44, 19, 1, 45, '45.00', 0, 0, 4, '5.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1157, 1, 0, 472, '2', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1158, 1, 0, 472, '2', 44, 19, 1, 45, '45.00', 0, 0, 4, '5.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1159, 1, 0, 473, '3', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1160, 1, 0, 473, '3', 44, 19, 2, 45, '90.00', 0, 0, 4, '10.80', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1161, 1, 0, 473, '3', 62, 22, 2, 60, '120.00', 0, 0, 4, '14.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1162, 1, 0, 473, '3', 46, 19, 1, 45, '45.00', 0, 0, 4, '5.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1163, 1, 0, 473, '3', 51, 20, 1, 70, '70.00', 0, 0, 4, '8.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1164, 1, 0, 473, '3', 18, 7, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1165, 1, 0, 473, '3', 59, 22, 1, 70, '70.00', 0, 0, 4, '8.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1166, 1, 0, 473, '3', 61, 22, 1, 70, '70.00', 0, 0, 4, '8.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1167, 1, 0, 474, '4', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1168, 1, 0, 475, '5', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1169, 1, 0, 475, '5', 62, 22, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1170, 1, 0, 476, '6', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1171, 1, 0, 476, '6', 44, 19, 1, 45, '45.00', 0, 0, 4, '5.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1172, 1, 0, 476, '6', 25, 6, 1, 40, '40.00', 0, 0, 4, '4.80', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1173, 1, 0, 477, '7', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1174, 1, 0, 477, '7', 44, 19, 1, 45, '45.00', 0, 0, 4, '5.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1175, 1, 0, 477, '7', 25, 6, 1, 40, '40.00', 0, 0, 3, '4.80', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1176, 1, 0, 477, '7', 62, 22, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1177, 1, 0, 478, '8', 39, 17, 1, 60, '60.00', 0, 0, 3, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1178, 1, 0, 478, '8', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1179, 1, 0, 478, '8', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1180, 1, 0, 479, '9', 56, 21, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1181, 1, 0, 479, '9', 57, 22, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1182, 1, 0, 479, '9', 61, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1183, 1, 0, 480, '10', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1184, 1, 0, 480, '10', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1185, 1, 0, 481, '11', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1186, 1, 0, 481, '11', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1187, 1, 0, 482, '12', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1188, 1, 0, 482, '12', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1189, 1, 0, 483, '13', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1190, 1, 0, 483, '13', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1191, 1, 0, 484, '14', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1192, 1, 0, 484, '14', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1193, 1, 0, 484, '14', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', 'test', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1194, 1, 0, 485, '15', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1195, 1, 0, 485, '15', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1196, 1, 0, 486, '16', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1197, 1, 0, 486, '16', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', 'testing comment', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1198, 1, 0, 487, '17', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1199, 1, 0, 487, '17', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1200, 1, 0, 487, '17', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', 'banana shake', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1201, 1, 0, 487, '17', 34, 1, 1, 129, '129.00', 0, 0, 2, '15.48', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1202, 1, 0, 488, '18', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', 'testing tty', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1203, 1, 0, 488, '18', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1204, 1, 0, 488, '18', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1205, 1, 0, 488, '18', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', 'testing', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1206, 1, 0, 489, '19', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1207, 1, 0, 489, '19', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1208, 1, 0, 489, '19', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1209, 1, 0, 490, '20', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1210, 1, 0, 491, '21', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1211, 1, 0, 491, '21', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1212, 1, 0, 492, '22', 39, 17, 6, 60, '360.00', 0, 0, 2, '43.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1213, 1, 0, 493, '23', 13, 3, 6, 200, '1200.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1214, 1, 0, 494, '24', 44, 19, 1, 45, '45.00', 0, 0, 4, '5.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1215, 1, 0, 495, '25', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1216, 1, 0, 495, '25', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1217, 1, 0, 495, '25', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1218, 1, 0, 495, '25', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1219, 1, 0, 496, '26', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1220, 1, 0, 497, '27', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1221, 1, 0, 498, '1', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1222, 1, 0, 499, '2', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1223, 1, 0, 500, '3', 44, 19, 1, 45, '45.00', 0, 0, 4, '5.40', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1224, 1, 0, 501, '4', 25, 6, 1, 40, '40.00', 0, 0, 4, '4.80', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1225, 1, 0, 502, '5', 46, 19, 1, 45, '45.00', 0, 0, 4, '5.40', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1226, 1, 0, 503, '6', 44, 19, 1, 45, '45.00', 0, 0, 4, '5.40', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1227, 1, 0, 504, '7', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1228, 1, 0, 504, '7', 44, 19, 1, 45, '45.00', 0, 0, 5, '5.40', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1229, 1, 0, 505, '8', 48, 19, 1, 45, '45.00', 0, 0, 4, '5.40', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1230, 1, 0, 505, '8', 40, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1231, 1, 0, 505, '8', 29, 2, 1, 99, '99.00', 0, 0, 4, '11.88', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1232, 1, 0, 505, '8', 52, 20, 1, 60, '60.00', 0, 0, 3, '7.20', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1233, 1, 0, 505, '8', 61, 22, 1, 70, '70.00', 0, 0, 4, '8.40', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1234, 1, 0, 506, '9', 62, 22, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1235, 1, 0, 506, '9', 25, 6, 1, 40, '40.00', 0, 0, 4, '4.80', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1236, 1, 0, 507, '10', 39, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1237, 1, 0, 508, '11', 34, 1, 1, 129, '129.00', 0, 0, 4, '15.48', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1238, 1, 0, 509, '12', 39, 17, 1, 60, '60.00', 0, 0, 3, '7.20', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1239, 1, 0, 509, '12', 44, 19, 1, 45, '45.00', 0, 0, 3, '5.40', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1240, 1, 0, 510, '13', 51, 20, 1, 70, '70.00', 0, 0, 4, '8.40', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1241, 1, 0, 510, '13', 29, 2, 1, 99, '99.00', 0, 0, 4, '11.88', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1242, 1, 0, 511, '14', 51, 20, 1, 70, '70.00', 0, 0, 4, '8.40', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0);
INSERT INTO `pos_sales_order_transaction` (`sales_order_transaction_id`, `company_id`, `employee_id`, `sales_order_id`, `sales_order_no`, `inventory_stock_id`, `inventory_category_id`, `sales_qty`, `sales_rate`, `sales_amount`, `unit_id`, `order_completion_time`, `product_order_status_id`, `product_tax_amount`, `tax_ids`, `discount_ids`, `product_discount_amount`, `comment`, `sales_order_date`, `created_at`, `updated_at`, `batch_no`) VALUES
(1243, 1, 0, 511, '14', 18, 7, 1, 60, '60.00', 0, 0, 3, '7.20', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1244, 1, 0, 511, '14', 31, 2, 1, 80, '80.00', 0, 0, 3, '9.60', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1245, 1, 0, 512, '15', 40, 17, 1, 60, '60.00', 0, 0, 4, '7.20', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1246, 1, 0, 512, '15', 52, 20, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1247, 1, 0, 512, '15', 45, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1248, 1, 0, 513, '16', 57, 22, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1249, 1, 0, 513, '16', 35, 1, 1, 129, '129.00', 0, 0, 2, '15.48', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1250, 1, 0, 513, '16', 60, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1251, 1, 0, 514, '17', 39, 17, 1, 60, '60.00', 0, 0, 2, '-7.20', '11,12', '1,2', '120.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1252, 1, 0, 514, '17', 62, 22, 1, 60, '60.00', 0, 0, 2, '-7.20', '11,12', '1,2', '120.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1253, 1, 0, 514, '17', 46, 19, 1, 45, '45.00', 0, 0, 2, '-5.40', '11,12', '1,2', '90.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1254, 1, 0, 515, '18', 18, 7, 1, 60, '60.00', 0, 0, 2, '-7.20', '11,12', '1,2', '120.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1255, 1, 0, 515, '18', 31, 2, 1, 80, '80.00', 0, 0, 2, '-9.60', '11,12', '1,2', '160.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1256, 1, 0, 515, '18', 59, 22, 1, 70, '70.00', 0, 0, 2, '-8.40', '11,12', '1,2', '140.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1257, 1, 0, 516, '19', 39, 17, 1, 60, '60.00', 0, 0, 2, '-7.20', '11,12', '1,2', '120.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1258, 1, 0, 516, '19', 44, 19, 1, 45, '45.00', 0, 0, 2, '-5.40', '11,12', '1,2', '90.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1259, 1, 0, 517, '20', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1260, 1, 0, 517, '20', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1261, 1, 0, 517, '20', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1262, 1, 0, 517, '20', 62, 22, 2, 60, '120.00', 0, 0, 2, '14.40', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1263, 1, 0, 518, '21', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1264, 1, 0, 518, '21', 62, 22, 3, 60, '180.00', 0, 0, 2, '21.60', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1265, 1, 0, 518, '21', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1266, 1, 0, 518, '21', 56, 21, 2, 40, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1267, 1, 0, 519, '22', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1268, 1, 0, 519, '22', 28, 2, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1269, 1, 0, 519, '22', 18, 7, 2, 60, '120.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1270, 1, 0, 519, '22', 4, 1, 5, 1004, '5020.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1271, 1, 0, 520, '23', 44, 19, 13, 45, '585.00', 0, 0, 2, '70.20', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1272, 1, 0, 520, '23', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1273, 1, 0, 520, '23', 61, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1274, 1, 0, 521, '24', 31, 2, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1275, 1, 0, 521, '24', 18, 7, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1276, 1, 0, 522, '1', 39, 17, 1, 60, '60.00', 0, 0, 3, '7.20', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1277, 1, 0, 522, '1', 25, 6, 1, 40, '40.00', 0, 0, 3, '4.80', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1278, 1, 0, 522, '1', 62, 22, 1, 60, '60.00', 0, 0, 3, '7.20', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1279, 1, 0, 523, '2', 39, 17, 1, 60, '60.00', 0, 0, 3, '7.20', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1280, 1, 0, 523, '2', 25, 6, 1, 40, '40.00', 0, 0, 3, '4.80', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1281, 1, 0, 523, '2', 62, 22, 1, 60, '60.00', 0, 0, 3, '7.20', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1282, 1, 0, 524, '3', 59, 22, 1, 70, '70.00', 0, 0, 3, '8.40', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1283, 1, 0, 525, '4', 39, 17, 1, 60, '60.00', 0, 0, 3, '7.20', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1284, 1, 0, 525, '4', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1285, 1, 0, 526, '5', 39, 17, 1, 60, '60.00', 0, 0, 3, '7.20', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1286, 1, 0, 527, '6', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1287, 1, 0, 527, '6', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1288, 1, 0, 528, '7', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1289, 1, 0, 528, '7', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1290, 1, 0, 529, '8', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1291, 1, 0, 529, '8', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1292, 1, 0, 530, '9', 29, 2, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1293, 1, 0, 531, '10', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1294, 1, 0, 531, '10', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1295, 1, 0, 531, '10', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1296, 1, 0, 531, '10', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1297, 1, 0, 532, '11', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1298, 1, 0, 532, '11', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-27 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1299, 1, 0, 533, '1', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1300, 1, 0, 533, '1', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1301, 1, 0, 533, '1', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1302, 1, 0, 534, '2', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1303, 1, 0, 534, '2', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1304, 1, 0, 534, '2', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1305, 1, 0, 535, '3', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1306, 1, 0, 535, '3', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1307, 1, 0, 535, '3', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1308, 1, 0, 536, '4', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1309, 1, 0, 536, '4', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1310, 1, 0, 536, '4', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1311, 1, 0, 537, '5', 39, 17, 1, 60, '60.00', 0, 0, 2, '6.12', '11,12', '1,2', '9.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1312, 1, 0, 537, '5', 44, 19, 1, 45, '45.00', 0, 0, 2, '4.59', '11,12', '1,2', '6.75', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1313, 1, 0, 537, '5', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.08', '11,12', '1,2', '6.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1314, 1, 0, 538, '6', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1315, 1, 0, 538, '6', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1316, 1, 0, 538, '6', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1317, 1, 0, 538, '6', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1318, 1, 0, 539, '7', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1319, 1, 0, 539, '7', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1320, 1, 0, 539, '7', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1321, 1, 0, 540, '8', 39, 17, 1, 60, '60.00', 0, 0, 2, '6.12', '11,12', '1,2', '9.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1322, 1, 0, 540, '8', 44, 19, 1, 45, '45.00', 0, 0, 2, '4.59', '11,12', '1,2', '6.75', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1323, 1, 0, 540, '8', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.08', '11,12', '1,2', '6.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1324, 1, 0, 540, '8', 51, 20, 1, 70, '70.00', 0, 0, 2, '7.14', '11,12', '1,2', '10.50', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1325, 1, 0, 540, '8', 31, 2, 1, 80, '80.00', 0, 0, 2, '8.16', '11,12', '1,2', '12.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1326, 1, 0, 541, '9', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1327, 1, 0, 541, '9', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1328, 1, 0, 541, '9', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1329, 1, 0, 541, '9', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1330, 1, 0, 542, '10', 39, 17, 1, 60, '60.00', 0, 0, 2, '6.48', '11,12', '1,2', '6.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1331, 1, 0, 542, '10', 44, 19, 1, 45, '45.00', 0, 0, 2, '4.86', '11,12', '1,2', '4.50', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1332, 1, 0, 542, '10', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.32', '11,12', '1,2', '4.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1333, 1, 0, 542, '10', 62, 22, 1, 60, '60.00', 0, 0, 2, '6.48', '11,12', '1,2', '6.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1334, 1, 0, 543, '11', 37, 1, 1, 119, '119.00', 0, 0, 2, '14.28', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1335, 1, 0, 544, '12', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1336, 1, 0, 545, '13', 44, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1337, 1, 0, 545, '13', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1338, 1, 0, 545, '13', 70, 6, 1, 88, '88.39', 0, 0, 2, '10.61', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1339, 1, 0, 545, '13', 24, 6, 1, 50, '50.00', 0, 0, 2, '6.00', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1340, 1, 0, 546, '14', 39, 17, 2, 60, '120.00', 0, 0, 2, '14.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1341, 1, 0, 546, '14', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1342, 1, 0, 546, '14', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1343, 1, 0, 546, '14', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1344, 1, 0, 546, '14', 51, 20, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1345, 1, 0, 546, '14', 61, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1346, 1, 0, 547, '15', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1347, 1, 0, 547, '15', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1348, 1, 0, 547, '15', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1349, 1, 0, 547, '15', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1350, 1, 0, 548, '16', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1351, 1, 0, 548, '16', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1352, 1, 0, 548, '16', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1353, 1, 0, 548, '16', 29, 2, 1, 99, '99.00', 0, 0, 2, '11.88', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1354, 1, 0, 548, '16', 57, 22, 1, 80, '80.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1355, 1, 0, 549, '17', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1356, 1, 0, 549, '17', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1357, 1, 0, 549, '17', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1358, 1, 0, 550, '18', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1359, 1, 0, 550, '18', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1360, 1, 0, 551, '19', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1361, 1, 0, 551, '19', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1362, 1, 0, 551, '19', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1363, 1, 0, 551, '19', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1364, 1, 0, 552, '20', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1365, 1, 0, 552, '20', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1366, 1, 0, 552, '20', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1367, 1, 0, 553, '21', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1368, 1, 0, 553, '21', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1369, 1, 0, 553, '21', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1370, 1, 0, 554, '22', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1371, 1, 0, 554, '22', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1372, 1, 0, 554, '22', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1373, 1, 0, 555, '23', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1374, 1, 0, 555, '23', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1375, 1, 0, 555, '23', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1376, 1, 0, 556, '24', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1377, 1, 0, 556, '24', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1378, 1, 0, 556, '24', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1379, 1, 0, 557, '25', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1380, 1, 0, 557, '25', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1381, 1, 0, 557, '25', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1382, 1, 0, 557, '25', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1383, 1, 0, 558, '26', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1384, 1, 0, 558, '26', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1385, 1, 0, 558, '26', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1386, 1, 0, 558, '26', 46, 19, 1, 45, '45.00', 0, 0, 2, '5.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1387, 1, 0, 559, '27', 39, 17, 1, 60, '60.00', 0, 0, 2, '14.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1388, 1, 0, 559, '27', 25, 6, 1, 40, '40.00', 0, 0, 2, '9.60', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1389, 1, 0, 559, '27', 62, 22, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1390, 1, 0, 560, '28', 39, 17, 1, 60, '60.00', 0, 0, 2, '7.20', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1391, 1, 0, 560, '28', 46, 19, 2, 45, '90.00', 0, 0, 2, '10.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1392, 1, 0, 560, '28', 25, 6, 1, 40, '40.00', 0, 0, 2, '4.80', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1393, 1, 0, 560, '28', 59, 22, 1, 70, '70.00', 0, 0, 2, '8.40', '11,12', '1,2', '0.00', '', '2017-04-28 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1394, 1, 0, 561, '1', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.14', '11,12', '1,2', '58.80', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1395, 1, 0, 561, '1', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.10', '11,12', '1,2', '39.20', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1396, 1, 0, 561, '1', 62, 22, 1, 60, '60.00', 0, 0, 5, '0.14', '11,12', '1,2', '58.80', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1397, 1, 0, 562, '2', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1398, 1, 0, 563, '3', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '58.80', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1399, 1, 0, 563, '3', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '39.20', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1400, 1, 0, 564, '4', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '58.80', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1401, 1, 0, 564, '4', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '39.20', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1402, 1, 0, 565, '5', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '58.80', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1403, 1, 0, 565, '5', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '39.20', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1404, 1, 0, 566, '6', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '58.80', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1405, 1, 0, 566, '6', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '39.20', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1406, 1, 0, 567, '7', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '58.80', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1407, 1, 0, 567, '7', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '39.20', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1408, 1, 0, 568, '8', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '58.80', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1409, 1, 0, 568, '8', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '39.20', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1410, 1, 0, 569, '9', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '58.80', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1411, 1, 0, 569, '9', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '39.20', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1412, 1, 0, 570, '10', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '58.80', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1413, 1, 0, 570, '10', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '39.20', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1414, 1, 0, 571, '11', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '58.80', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1415, 1, 0, 571, '11', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '39.20', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1416, 1, 0, 572, '12', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '58.86', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1417, 1, 0, 572, '12', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '39.24', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1418, 1, 0, 573, '13', 46, 19, 1, 45, '45.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1419, 1, 0, 573, '13', 62, 22, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1420, 1, 0, 574, '1', 62, 22, 1, 60, '60.00', 0, 0, 3, '0.00', '11,12', '1,2', '0.00', '', '2017-05-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1421, 1, 0, 575, '2', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1422, 1, 0, 576, '14', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1423, 1, 0, 577, '15', 18, 7, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1424, 1, 0, 578, '16', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1425, 1, 0, 579, '17', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1426, 1, 0, 580, '18', 18, 7, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1427, 1, 0, 580, '18', 51, 20, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-01 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1428, 1, 0, 581, '1', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-02 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1429, 1, 0, 581, '1', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-02 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1430, 1, 0, 581, '1', 62, 22, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-02 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1431, 1, 0, 582, '2', 51, 20, 1, 70, '70.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-02 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1432, 1, 0, 582, '2', 29, 2, 1, 99, '99.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-02 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1433, 1, 0, 583, '3', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-02 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1434, 1, 0, 584, '4', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-02 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1435, 1, 0, 585, '5', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-02 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1436, 1, 0, 586, '6', 29, 2, 1, 99, '99.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-02 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1437, 1, 0, 587, '7', 29, 2, 1, 99, '99.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-02 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1438, 1, 0, 588, '8', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-02 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1439, 1, 0, 589, '9', 51, 20, 3, 70, '210.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-02 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1440, 1, 0, 590, '3', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1441, 1, 0, 590, '3', 25, 6, 1, 40, '40.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1442, 1, 0, 590, '3', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-03 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1443, 1, 0, 591, '1', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-04 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1444, 1, 0, 592, '1', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1445, 1, 0, 592, '1', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1446, 1, 0, 592, '1', 51, 20, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1447, 1, 0, 592, '1', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1448, 1, 0, 592, '1', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1449, 1, 0, 592, '1', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', 'c', '2017-05-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1450, 1, 0, 593, '1', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1451, 1, 0, 593, '1', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1452, 1, 0, 594, '2', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1453, 1, 0, 594, '2', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1454, 1, 0, 594, '2', 62, 22, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1455, 1, 0, 595, '3', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1456, 1, 0, 595, '3', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1457, 1, 0, 595, '3', 62, 22, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1458, 1, 0, 596, '4', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1459, 1, 0, 597, '5', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1460, 1, 0, 598, '6', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1461, 1, 0, 598, '6', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1462, 1, 0, 598, '6', 62, 22, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1463, 1, 0, 599, '7', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1464, 1, 0, 599, '7', 25, 6, 2, 40, '80.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1465, 1, 0, 600, '8', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1466, 1, 0, 600, '8', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1467, 1, 0, 601, '9', 62, 22, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1468, 1, 0, 602, '10', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1469, 1, 0, 603, '11', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1470, 1, 0, 604, '12', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1471, 1, 0, 604, '12', 25, 6, 1, 40, '40.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1472, 1, 0, 605, '13', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1473, 1, 0, 605, '13', 25, 6, 1, 40, '40.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1474, 1, 0, 606, '14', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1475, 1, 0, 606, '14', 25, 6, 1, 40, '40.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1476, 1, 0, 606, '14', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1477, 1, 0, 606, '14', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1478, 1, 0, 607, '15', 51, 20, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1479, 1, 0, 607, '15', 18, 7, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1480, 1, 0, 607, '15', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1481, 1, 0, 608, '16', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1482, 1, 0, 608, '16', 59, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1483, 1, 0, 608, '16', 51, 20, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1484, 1, 0, 608, '16', 18, 7, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1485, 1, 0, 609, '17', 25, 6, 1, 40, '40.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1486, 1, 0, 609, '17', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1487, 1, 0, 610, '18', 59, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1488, 1, 0, 610, '18', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1489, 1, 0, 610, '18', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1490, 1, 0, 611, '19', 25, 6, 2, 40, '80.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1491, 1, 0, 611, '19', 51, 20, 2, 70, '140.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1492, 1, 0, 611, '19', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1493, 1, 0, 611, '19', 58, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1494, 1, 0, 612, '20', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1495, 1, 0, 612, '20', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1496, 1, 0, 612, '20', 51, 20, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1497, 1, 0, 612, '20', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1498, 1, 0, 613, '21', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '6.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1499, 1, 0, 613, '21', 31, 2, 1, 80, '80.00', 0, 0, 2, '0.00', '11,12', '1,2', '8.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1500, 1, 0, 613, '21', 51, 20, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '7.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1501, 1, 0, 613, '21', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '11,12', '1,2', '9.90', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1502, 1, 0, 613, '21', 59, 22, 2, 70, '140.00', 0, 0, 2, '0.00', '11,12', '1,2', '14.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1503, 1, 0, 614, '22', 25, 6, 1, 40, '40.00', 0, 0, 2, '0.00', '11,12', '1,2', '4.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1504, 1, 0, 614, '22', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '6.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1505, 1, 0, 614, '22', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '11,12', '1,2', '4.50', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1506, 1, 0, 614, '22', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '11,12', '1,2', '9.90', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1507, 1, 0, 615, '23', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1508, 1, 0, 615, '23', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1509, 1, 0, 615, '23', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1510, 1, 0, 616, '24', 46, 19, 2, 45, '90.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1511, 1, 0, 616, '24', 62, 22, 2, 60, '120.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1512, 1, 0, 616, '24', 25, 6, 2, 40, '80.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1513, 1, 0, 616, '24', 39, 17, 2, 60, '120.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-08 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1514, 1, 0, 617, '1', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-09 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1515, 1, 0, 617, '1', 25, 6, 1, 40, '40.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-09 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1516, 1, 0, 618, '2', 31, 2, 1, 80, '80.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-09 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1517, 1, 0, 618, '2', 18, 7, 2, 60, '120.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-09 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1518, 1, 0, 618, '2', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-09 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1519, 1, 0, 618, '2', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-09 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1520, 1, 0, 618, '2', 51, 20, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-09 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1521, 1, 0, 619, '3', 31, 2, 1, 80, '80.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-09 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1522, 1, 0, 620, '4', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-09 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1523, 1, 0, 620, '4', 18, 7, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-09 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1524, 1, 0, 620, '4', 32, 2, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-09 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1525, 1, 0, 621, '1', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-10 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1526, 1, 0, 622, '1', 18, 7, 1, 60, '60.00', 0, 0, 4, '0.00', '14', '9', '6.00', '', '2017-05-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1527, 1, 0, 622, '1', 31, 2, 1, 80, '80.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1528, 1, 0, 623, '2', 61, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1529, 1, 0, 623, '2', 28, 2, 1, 99, '99.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1530, 1, 0, 624, '3', 56, 21, 1, 40, '40.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1531, 1, 0, 624, '3', 18, 7, 1, 60, '60.00', 0, 0, 4, '0.00', '14', '9', '6.00', '', '2017-05-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1532, 1, 0, 624, '3', 54, 21, 1, 80, '80.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1533, 1, 0, 625, '4', 56, 21, 1, 40, '40.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1534, 1, 0, 625, '4', 18, 7, 1, 60, '60.00', 0, 0, 4, '0.00', '14', '9', '6.00', '', '2017-05-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1535, 1, 0, 625, '4', 57, 22, 1, 80, '80.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1536, 1, 0, 626, '1', 57, 22, 1, 80, '80.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1537, 1, 0, 626, '1', 61, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1538, 1, 0, 626, '1', 60, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1539, 1, 0, 627, '2', 46, 19, 1, 45, '45.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1540, 1, 0, 627, '2', 60, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1541, 1, 0, 628, '3', 61, 22, 1, 70, '70.00', 0, 0, 3, '0.00', '14', '', '0.00', '', '2017-05-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1542, 1, 0, 628, '3', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1543, 1, 0, 628, '3', 45, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1544, 1, 0, 629, '1', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '14', '9', '4.00', '', '2017-05-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1545, 1, 0, 629, '1', 35, 1, 1, 129, '129.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0);
INSERT INTO `pos_sales_order_transaction` (`sales_order_transaction_id`, `company_id`, `employee_id`, `sales_order_id`, `sales_order_no`, `inventory_stock_id`, `inventory_category_id`, `sales_qty`, `sales_rate`, `sales_amount`, `unit_id`, `order_completion_time`, `product_order_status_id`, `product_tax_amount`, `tax_ids`, `discount_ids`, `product_discount_amount`, `comment`, `sales_order_date`, `created_at`, `updated_at`, `batch_no`) VALUES
(1546, 1, 0, 630, '2', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '6.75', '', '2017-05-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1547, 1, 0, 630, '2', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '10.50', '', '2017-05-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1548, 1, 0, 630, '2', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '14.85', '', '2017-05-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1549, 1, 0, 631, '3', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1550, 1, 0, 631, '3', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1551, 1, 0, 631, '3', 45, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1552, 1, 0, 632, '4', 18, 7, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '9', '6.00', '', '2017-05-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1553, 1, 0, 632, '4', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1554, 1, 0, 633, '1', 60, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1555, 1, 0, 633, '1', 61, 22, 2, 70, '140.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1556, 1, 0, 634, '2', 59, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '10.50', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1557, 1, 0, 635, '3', 35, 1, 2, 129, '258.00', 0, 0, 4, '0.00', '14', '', '12.90', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1558, 1, 0, 635, '3', 46, 19, 1, 45, '45.00', 0, 0, 4, '0.00', '14', '', '2.25', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1559, 1, 0, 636, '4', 57, 22, 2, 80, '160.00', 0, 0, 4, '0.00', '14', '', '8.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1560, 1, 0, 636, '4', 61, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '3.50', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1561, 1, 0, 636, '4', 45, 19, 1, 45, '45.00', 0, 0, 4, '0.00', '14', '', '2.25', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1562, 1, 0, 637, '5', 61, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '3.50', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1563, 1, 0, 638, '6', 28, 2, 1, 99, '99.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1564, 1, 0, 639, '7', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1565, 1, 0, 640, '8', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1566, 1, 0, 641, '9', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1567, 1, 0, 642, '10', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1568, 1, 0, 642, '10', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1569, 1, 0, 643, '11', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1570, 1, 0, 644, '12', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1571, 1, 0, 645, '13', 59, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1572, 1, 0, 645, '13', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1573, 1, 0, 645, '13', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1574, 1, 0, 646, '14', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1575, 1, 0, 647, '15', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1576, 1, 0, 647, '15', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1577, 1, 0, 648, '16', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1578, 1, 0, 649, '17', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1579, 1, 0, 650, '18', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1580, 1, 0, 651, '19', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1581, 1, 0, 652, '20', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1582, 1, 0, 653, '21', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1583, 1, 0, 653, '21', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1584, 1, 0, 653, '21', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1585, 1, 0, 653, '21', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1586, 1, 0, 653, '21', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1587, 1, 0, 653, '21', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1588, 1, 0, 654, '22', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1589, 1, 0, 654, '22', 59, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1590, 1, 0, 654, '22', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1591, 1, 0, 655, '23', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1592, 1, 0, 655, '23', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1593, 1, 0, 656, '24', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1594, 1, 0, 656, '24', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1595, 1, 0, 657, '25', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1596, 1, 0, 657, '25', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1597, 1, 0, 658, '1', 57, 22, 1, 80, '80.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1598, 1, 0, 658, '1', 28, 2, 1, 99, '99.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1599, 1, 0, 659, '2', 46, 19, 1, 45, '45.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1600, 1, 0, 659, '2', 59, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1601, 1, 0, 660, '3', 57, 22, 1, 80, '80.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1602, 1, 0, 660, '3', 61, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1603, 1, 0, 661, '4', 28, 2, 1, 99, '99.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1604, 1, 0, 661, '4', 45, 19, 1, 45, '45.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1605, 1, 0, 662, '5', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1606, 1, 0, 662, '5', 45, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1607, 1, 0, 663, '6', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1608, 1, 0, 664, '7', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1609, 1, 0, 664, '7', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1610, 1, 0, 664, '7', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1611, 1, 0, 665, '8', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1612, 1, 0, 666, '9', 25, 6, 1, 40, '40.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1613, 1, 0, 666, '9', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1614, 1, 0, 667, '10', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1615, 1, 0, 667, '10', 25, 6, 1, 40, '40.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1616, 1, 0, 668, '11', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1617, 1, 0, 669, '12', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1618, 1, 0, 669, '12', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1619, 1, 0, 670, '13', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1620, 1, 0, 670, '13', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1621, 1, 0, 671, '14', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1622, 1, 0, 672, '15', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1623, 1, 0, 672, '15', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1624, 1, 0, 673, '16', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1625, 1, 0, 673, '16', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1626, 1, 0, 674, '17', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1627, 1, 0, 674, '17', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1628, 1, 0, 675, '18', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1629, 1, 0, 676, '19', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1630, 1, 0, 677, '20', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1631, 1, 0, 678, '21', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1632, 1, 0, 679, '22', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1633, 1, 0, 680, '23', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1634, 1, 0, 681, '24', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1635, 1, 0, 682, '25', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1636, 1, 0, 682, '25', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1637, 1, 0, 683, '26', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1638, 1, 0, 684, '27', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1639, 1, 0, 684, '27', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1640, 1, 0, 684, '27', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1641, 1, 0, 684, '27', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1642, 1, 0, 684, '27', 58, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1643, 1, 0, 684, '27', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1644, 1, 0, 685, '1', 57, 22, 3, 80, '240.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-05-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1645, 1, 0, 685, '1', 61, 22, 1, 70, '70.00', 0, 0, 3, '0.00', '14', '', '0.00', '', '2017-05-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1646, 1, 0, 686, '2', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1647, 1, 0, 686, '2', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1648, 1, 0, 686, '2', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1649, 1, 0, 687, '3', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1650, 1, 0, 687, '3', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1651, 1, 0, 688, '4', 60, 22, 3, 70, '210.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1652, 1, 0, 688, '4', 1, 1, 1, 15, '15.00', 1, 0, 2, '0.00', '', '', '0.00', '', '2017-05-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1653, 1, 0, 688, '4', 2, 2, 1, 25, '25.00', 2, 0, 2, '0.00', '', '', '0.00', '', '2017-05-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1654, 1, 0, 688, '4', 31, 2, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1655, 1, 0, 688, '4', 61, 22, 5, 70, '350.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1656, 1, 0, 688, '4', 57, 22, 2, 80, '160.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1657, 1, 0, 688, '4', 45, 19, 3, 45, '135.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1658, 1, 0, 688, '4', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1659, 1, 0, 689, '5', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', 'some comment', '2017-05-17 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1660, 1, 0, 690, '1', 59, 22, 1, 70, '70.00', 0, 0, 5, '0.00', '11,12', '1,2', '3.50', '', '2017-05-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1661, 1, 0, 691, '2', 31, 2, 1, 80, '80.00', 0, 0, 5, '0.00', '11,12', '1,2', '0.00', '', '2017-05-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1662, 1, 0, 692, '3', 59, 22, 1, 70, '70.00', 0, 0, 5, '0.00', '14', '', '0.00', '', '2017-05-18 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1663, 1, 0, 693, '1', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '4.95', '', '2017-05-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1664, 1, 0, 693, '1', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '4.00', '', '2017-05-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1665, 1, 0, 694, '2', 31, 2, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '4.00', '', '2017-05-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1666, 1, 0, 694, '2', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '4.00', '', '2017-05-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1667, 1, 0, 694, '2', 18, 7, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '9', '8.70', '', '2017-05-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1668, 1, 0, 695, '1', 60, 22, 1, 70, '70.00', 0, 0, 3, '0.00', '14', '', '7.00', '', '2017-05-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1669, 1, 0, 695, '1', 62, 22, 2, 60, '120.00', 0, 0, 3, '0.00', '14', '', '12.00', '', '2017-05-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1670, 1, 0, 695, '1', 56, 21, 1, 40, '40.00', 0, 0, 3, '0.00', '14', '', '7.60', '', '2017-05-21 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1671, 1, 0, 696, '1', 59, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-22 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1672, 1, 0, 696, '1', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-22 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1673, 1, 0, 697, '1', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-23 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1674, 1, 0, 698, '2', 59, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-23 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1675, 1, 0, 699, '3', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-23 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1676, 1, 0, 700, '4', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-23 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1677, 1, 0, 701, '5', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-23 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1678, 1, 0, 702, '2', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1679, 1, 0, 702, '2', 25, 6, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '9', '4.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1680, 1, 0, 703, '3', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1681, 1, 0, 703, '3', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1682, 1, 0, 704, '4', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1683, 1, 0, 704, '4', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1684, 1, 0, 705, '5', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1685, 1, 0, 705, '5', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1686, 1, 0, 706, '6', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1687, 1, 0, 706, '6', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1688, 1, 0, 707, '7', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1689, 1, 0, 707, '7', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1690, 1, 0, 708, '8', 20, 7, 1, 50, '50.00', 0, 0, 2, '0.00', '14', '9', '5.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1691, 1, 0, 709, '9', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1692, 1, 0, 709, '9', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1693, 1, 0, 710, '10', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1694, 1, 0, 710, '10', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1695, 1, 0, 711, '11', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1696, 1, 0, 711, '11', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1697, 1, 0, 711, '11', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1698, 1, 0, 711, '11', 43, 19, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1699, 1, 0, 711, '11', 41, 19, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1700, 1, 0, 711, '11', 55, 21, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1701, 1, 0, 711, '11', 33, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1702, 1, 0, 712, '12', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1703, 1, 0, 712, '12', 45, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1704, 1, 0, 713, '13', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1705, 1, 0, 714, '14', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1706, 1, 0, 714, '14', 31, 2, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1707, 1, 0, 715, '15', 17, 7, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1708, 1, 0, 716, '16', 25, 6, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '9', '4.00', '', '2017-05-24 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1709, 1, 0, 717, '1', 25, 6, 1, 40, '40.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1710, 1, 0, 717, '1', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1711, 1, 0, 717, '1', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1712, 1, 0, 718, '2', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1713, 1, 0, 718, '2', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-25 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1714, 1, 0, 719, '1', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1715, 1, 0, 719, '1', 59, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1716, 1, 0, 719, '1', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1717, 1, 0, 720, '2', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-26 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1718, 1, 0, 721, '1', 59, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1719, 1, 0, 721, '1', 35, 1, 1, 129, '129.00', 0, 0, 3, '0.00', '11,12', '1,2', '0.00', '', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1720, 1, 0, 722, '2', 46, 19, 1, 45, '45.00', 0, 0, 3, '0.00', '11,12', '1,2', '0.00', '', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1721, 1, 0, 722, '2', 62, 22, 1, 60, '60.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1722, 1, 0, 722, '2', 51, 20, 1, 70, '70.00', 0, 0, 5, '0.00', '11,12', '1,2', '0.00', '', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1723, 1, 0, 722, '2', 29, 2, 1, 99, '99.00', 0, 0, 4, '0.00', '11,12', '1,2', '0.00', '', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1724, 1, 0, 722, '2', 18, 7, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1725, 1, 0, 722, '2', 25, 6, 1, 40, '40.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1726, 1, 0, 722, '2', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1727, 1, 0, 722, '2', 31, 2, 1, 80, '80.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1728, 1, 0, 722, '2', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1729, 1, 0, 722, '2', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1730, 1, 0, 722, '2', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1731, 1, 0, 722, '2', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1732, 1, 0, 722, '2', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1733, 1, 0, 722, '2', 58, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1734, 1, 0, 723, '3', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', 'some comment\nsome here also\nfew more', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1735, 1, 0, 724, '4', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '11,12', '1,2', '12.90', '', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1736, 1, 0, 724, '4', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '11,12', '1,2', '9.90', '', '2017-05-29 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1737, 1, 0, 725, '1', 62, 22, 1, 60, '60.00', 0, 0, 5, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1738, 1, 0, 726, '2', 39, 17, 1, 60, '60.00', 0, 0, 5, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1739, 1, 0, 727, '3', 29, 2, 1, 99, '99.00', 0, 0, 5, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1740, 1, 0, 728, '4', 31, 2, 1, 80, '80.00', 0, 0, 5, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1741, 1, 0, 729, '5', 56, 21, 1, 40, '40.00', 0, 0, 5, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1742, 1, 0, 730, '6', 39, 17, 1, 60, '60.00', 0, 0, 3, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1743, 1, 0, 731, '7', 31, 2, 1, 80, '80.00', 0, 0, 3, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1744, 1, 0, 731, '7', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1745, 1, 0, 732, '8', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1746, 1, 0, 733, '9', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1747, 1, 0, 734, '10', 45, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1748, 1, 0, 735, '11', 61, 22, 1, 70, '70.00', 0, 0, 5, '0.00', '14', '', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1749, 1, 0, 735, '11', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1750, 1, 0, 736, '12', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1751, 1, 0, 737, '13', 20, 7, 1, 50, '50.00', 0, 0, 2, '0.00', '14', '9', '5.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1752, 1, 0, 737, '13', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1753, 1, 0, 738, '14', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '11,12', '1,2', '4.50', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1754, 1, 0, 739, '15', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '11,12', '1,2', '6.45', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1755, 1, 0, 740, '16', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '11,12', '1,2', '6.45', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1756, 1, 0, 741, '17', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1757, 1, 0, 742, '18', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1758, 1, 0, 743, '19', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1759, 1, 0, 744, '20', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1760, 1, 0, 745, '21', 58, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1761, 1, 0, 746, '22', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1762, 1, 0, 747, '23', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1763, 1, 0, 748, '24', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1764, 1, 0, 748, '24', 58, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1765, 1, 0, 748, '24', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1766, 1, 0, 748, '24', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-05-30 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1767, 1, 0, 749, '1', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '128.00', '', '2017-05-31 01:34:05', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1768, 1, 0, 749, '1', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '7.00', '', '2017-05-31 01:34:05', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1769, 1, 0, 749, '1', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '6.00', '', '2017-05-31 01:34:05', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1770, 1, 0, 750, '1', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-31 01:50:43', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1771, 1, 0, 751, '1', 18, 7, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '9', '6.00', '', '2017-05-31 01:51:29', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1772, 1, 0, 752, '1', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-31 01:53:18', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1773, 1, 0, 753, '1', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-31 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1774, 1, 0, 754, '2', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-05-31 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1775, 1, 0, 755, '1', 18, 7, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-06-02 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1776, 1, 0, 756, '1', 39, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '11,12', '1,2', '0.00', '', '2017-06-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1777, 1, 0, 757, '1', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-06-16 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1778, 1, 0, 758, '1', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-06-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1779, 1, 0, 759, '2', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-06-19 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1780, 1, 0, 760, '1', 54, 21, 1, 80, '80.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-06-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1781, 1, 0, 761, '2', 54, 21, 1, 80, '80.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-06-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1782, 1, 0, 762, '3', 61, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-06-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1783, 1, 0, 763, '4', 18, 7, 1, 60, '60.00', 0, 0, 4, '0.00', '14', '9', '6.00', '', '2017-06-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1784, 1, 0, 764, '5', 28, 2, 1, 99, '99.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-06-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1785, 1, 0, 765, '6', 54, 21, 1, 80, '80.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-06-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1786, 1, 0, 766, '7', 61, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-06-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1787, 1, 0, 767, '8', 61, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-06-20 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1788, 1, 0, 768, '1', 43, 19, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-05 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1789, 1, 0, 769, '1', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1790, 1, 0, 770, '2', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1791, 1, 0, 771, '3', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1792, 1, 0, 772, '4', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1793, 1, 0, 773, '5', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1794, 1, 0, 774, '6', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1795, 1, 0, 775, '7', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1796, 1, 0, 776, '8', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1797, 1, 0, 777, '9', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1798, 1, 0, 778, '10', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1799, 1, 0, 779, '11', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1800, 1, 0, 780, '12', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1801, 1, 0, 781, '13', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1802, 1, 0, 782, '14', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1803, 1, 0, 783, '15', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1804, 1, 0, 784, '16', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1805, 1, 0, 785, '17', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1806, 1, 0, 786, '18', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1807, 1, 0, 787, '19', 42, 19, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1808, 1, 0, 788, '20', 59, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1809, 1, 0, 789, '21', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1810, 1, 0, 790, '22', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1811, 1, 0, 791, '23', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1812, 1, 0, 792, '24', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1813, 1, 0, 793, '25', 18, 7, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '9', '6.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1814, 1, 0, 794, '26', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1815, 1, 0, 795, '27', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1816, 1, 0, 796, '28', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1817, 1, 0, 797, '29', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1818, 1, 0, 798, '30', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1819, 1, 0, 799, '31', 42, 19, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1820, 1, 0, 800, '32', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1821, 1, 0, 801, '33', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1822, 1, 0, 802, '34', 42, 19, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1823, 1, 0, 803, '35', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1824, 1, 0, 804, '36', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1825, 1, 0, 805, '37', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1826, 1, 0, 806, '38', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1827, 1, 0, 807, '39', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1828, 1, 0, 808, '40', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1829, 1, 0, 809, '41', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1830, 1, 0, 810, '42', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1831, 1, 0, 811, '43', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1832, 1, 0, 812, '44', 42, 19, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1833, 1, 0, 813, '45', 45, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1834, 1, 0, 814, '46', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1835, 1, 0, 815, '47', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1836, 1, 0, 816, '48', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1837, 1, 0, 817, '49', 42, 19, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1838, 1, 0, 818, '50', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1839, 1, 0, 819, '51', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1840, 1, 0, 820, '52', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1841, 1, 0, 820, '52', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1842, 1, 0, 820, '52', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-07 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1843, 1, 0, 821, '1', 38, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1844, 1, 0, 822, '2', 38, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1845, 1, 0, 823, '3', 25, 6, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '9', '4.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1846, 1, 0, 824, '4', 70, 6, 1, 99, '99.00', 1, 0, 2, '0.00', '14', '9', '10.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1847, 1, 0, 825, '5', 33, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1848, 1, 0, 826, '6', 63, 22, 1, 50, '50.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1849, 1, 0, 827, '7', 70, 6, 1, 99, '99.00', 1, 0, 2, '0.00', '14', '9', '10.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1850, 1, 0, 828, '8', 55, 21, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1851, 1, 0, 829, '9', 33, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1852, 1, 0, 830, '10', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1853, 1, 0, 831, '11', 55, 21, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1854, 1, 0, 832, '12', 16, 7, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '9', '10.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1855, 1, 0, 833, '13', 38, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1856, 1, 0, 834, '14', 55, 21, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1857, 1, 0, 835, '15', 33, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0);
INSERT INTO `pos_sales_order_transaction` (`sales_order_transaction_id`, `company_id`, `employee_id`, `sales_order_id`, `sales_order_no`, `inventory_stock_id`, `inventory_category_id`, `sales_qty`, `sales_rate`, `sales_amount`, `unit_id`, `order_completion_time`, `product_order_status_id`, `product_tax_amount`, `tax_ids`, `discount_ids`, `product_discount_amount`, `comment`, `sales_order_date`, `created_at`, `updated_at`, `batch_no`) VALUES
(1858, 1, 0, 836, '16', 42, 19, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1859, 1, 0, 837, '17', 36, 1, 1, 119, '119.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1860, 1, 0, 838, '18', 63, 22, 1, 50, '50.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1861, 1, 0, 839, '19', 31, 2, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1862, 1, 0, 840, '20', 68, 27, 1, 40, '40.00', 1, 0, 2, '0.00', '', '', '0.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1863, 1, 0, 841, '21', 36, 1, 1, 119, '119.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1864, 1, 0, 842, '22', 49, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-11 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1865, 1, 0, 843, '1', 45, 19, 1, 45, '45.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1866, 1, 0, 844, '2', 49, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1867, 1, 0, 845, '3', 56, 21, 1, 40, '40.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1868, 1, 0, 845, '3', 41, 19, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1869, 1, 0, 846, '4', 55, 21, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1870, 1, 0, 847, '5', 58, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1871, 1, 0, 848, '6', 32, 2, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1872, 1, 0, 849, '7', 30, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1873, 1, 0, 850, '8', 36, 1, 1, 119, '119.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1874, 1, 0, 851, '9', 63, 22, 1, 50, '50.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1875, 1, 0, 852, '10', 20, 7, 1, 50, '50.00', 0, 0, 2, '0.00', '14', '9', '5.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1876, 1, 0, 853, '11', 34, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1877, 1, 0, 854, '12', 59, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1878, 1, 0, 855, '13', 70, 6, 1, 99, '99.00', 1, 0, 2, '0.00', '14', '9', '10.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1879, 1, 0, 856, '14', 41, 19, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1880, 1, 0, 857, '15', 33, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1881, 1, 0, 858, '16', 42, 19, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1882, 1, 0, 859, '17', 70, 6, 1, 99, '99.00', 1, 0, 2, '0.00', '14', '9', '10.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1883, 1, 0, 860, '18', 43, 19, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1884, 1, 0, 861, '19', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1885, 1, 0, 862, '20', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1886, 1, 0, 863, '21', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1887, 1, 0, 864, '22', 43, 19, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1888, 1, 0, 865, '23', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1889, 1, 0, 866, '24', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-12 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1890, 1, 0, 867, '1', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1891, 1, 0, 868, '2', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1892, 1, 0, 869, '3', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1893, 1, 0, 870, '4', 18, 7, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '9', '6.00', '', '2017-07-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1894, 1, 0, 871, '5', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1895, 1, 0, 872, '6', 25, 6, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '9', '4.00', '', '2017-07-13 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1896, 1, 0, 873, '1', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-07-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1897, 1, 0, 874, '2', 46, 19, 1, 45, '45.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-07-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1898, 1, 0, 874, '2', 59, 22, 1, 70, '70.00', 0, 0, 3, '0.00', '14', '', '0.00', '', '2017-07-15 00:00:00', '2017-07-21 06:27:37', '2017-07-21 06:27:37', 0),
(1947, 1, 6, 889, '1', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-24 08:02:36', '2017-07-24 08:02:47', 1),
(1948, 1, 6, 889, '1', 60, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-24 08:02:36', '2017-07-24 08:02:51', 1),
(1949, 1, 6, 889, '1', 51, 20, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-24 08:03:01', '2017-07-24 08:03:16', 3),
(1950, 1, 6, 889, '1', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-24 11:22:30', '2017-07-24 13:06:47', 5),
(1951, 1, 6, 889, '1', 60, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-24 11:22:30', '2017-07-24 13:06:47', 5),
(1952, 1, 6, 889, '1', 60, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-24 13:34:36', '2017-07-24 13:35:49', 7),
(1953, 1, 6, 889, '1', 61, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-24 13:34:36', '2017-07-24 13:35:50', 7),
(1954, 1, 6, 890, '2', 62, 22, 1, 60, '60.00', 0, 1, 1, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-24 13:38:27', '2017-07-24 13:38:27', 1),
(1955, 1, 6, 890, '2', 46, 19, 1, 45, '45.00', 0, 1, 1, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-24 13:38:27', '2017-07-24 13:38:27', 1),
(1956, 1, 6, 891, '3', 29, 2, 1, 99, '99.00', 0, 1, 1, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-24 13:38:42', '2017-07-24 13:38:42', 1),
(1957, 1, 6, 891, '3', 58, 22, 1, 70, '70.00', 0, 1, 1, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-24 13:38:42', '2017-07-24 13:38:42', 1),
(1958, 1, 6, 892, '4', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-24 13:45:34', '2017-07-24 13:45:39', 1),
(1959, 1, 6, 893, '5', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-24 13:46:07', '2017-07-24 13:46:11', 1),
(1960, 1, 6, 894, '6', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-24 13:51:23', '2017-07-24 13:51:28', 1),
(1961, 1, 6, 895, '1', 60, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-25 08:22:48', '2017-07-25 08:23:54', 1),
(1962, 1, 6, 895, '1', 61, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-25 08:22:48', '2017-07-25 08:23:57', 1),
(1963, 1, 6, 895, '1', 51, 20, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-25 08:23:40', '2017-07-25 08:24:11', 3),
(1964, 1, 6, 895, '1', 56, 21, 1, 40, '40.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-25 08:23:40', '2017-07-25 08:24:09', 3),
(1965, 1, 6, 895, '1', 31, 2, 1, 80, '80.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-25 08:23:46', '2017-07-25 08:24:06', 5),
(1966, 1, 6, 895, '1', 61, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-25 08:23:46', '2017-07-25 08:24:13', 5),
(1967, 1, 6, 896, '2', 60, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-25 10:02:15', '2017-07-25 13:44:15', 1),
(1968, 1, 6, 896, '2', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-25 10:02:15', '2017-07-25 13:44:16', 1),
(1969, 1, 6, 896, '2', 58, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-25 10:02:15', '2017-07-25 13:44:16', 1),
(1970, 1, 6, 896, '2', 46, 19, 1, 45, '45.00', 0, 1, 4, '0.00', '', '9', '4.50', '', '0000-00-00 00:00:00', '2017-07-25 12:44:08', '2017-07-25 13:33:43', 3),
(1971, 1, 6, 896, '2', 59, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-25 12:44:08', '2017-07-25 13:35:43', 3),
(1972, 1, 6, 897, '3', 61, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-25 13:32:48', '2017-07-25 13:33:39', 1),
(1982, 1, 6, 904, '1', 61, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-26 00:00:00', '2017-07-26 09:42:46', '2017-07-26 09:42:50', 1),
(1983, 1, 6, 904, '1', 61, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-26 09:43:20', '2017-07-26 09:43:28', 3),
(1984, 1, 6, 904, '1', 58, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-26 09:43:36', '2017-07-26 09:51:59', 5),
(1985, 1, 6, 905, '2', 17, 7, 1, 60, '60.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-26 00:00:00', '2017-07-26 09:52:21', '2017-07-26 09:52:56', 1),
(1986, 1, 6, 905, '2', 1, 1, 1, 15, '15.00', 1, 1, 4, '0.00', '', '', '0.00', '', '2017-07-26 00:00:00', '2017-07-26 09:52:21', '2017-07-26 09:52:56', 1),
(1987, 1, 6, 905, '2', 51, 20, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-26 09:52:33', '2017-07-26 09:53:01', 3),
(1988, 1, 6, 905, '2', 56, 21, 1, 40, '40.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-26 09:52:33', '2017-07-26 09:53:02', 3),
(1989, 1, 6, 905, '2', 29, 2, 2, 99, '198.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-26 09:52:46', '2017-07-26 09:52:57', 5),
(1990, 1, 6, 906, '3', 60, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-26 00:00:00', '2017-07-26 09:53:59', '2017-07-26 09:55:30', 1),
(1991, 1, 6, 907, '4', 61, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-26 00:00:00', '2017-07-26 09:55:48', '2017-07-26 09:55:51', 1),
(1992, 1, 6, 908, '5', 61, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-26 00:00:00', '2017-07-26 09:56:53', '2017-07-26 10:02:16', 1),
(1993, 1, 6, 909, '6', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-26 00:00:00', '2017-07-26 10:54:06', '2017-07-26 10:54:12', 1),
(1994, 1, 6, 909, '6', 60, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-26 00:00:00', '2017-07-26 10:54:06', '2017-07-26 10:54:12', 1),
(1995, 1, 6, 910, '7', 29, 2, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-26 00:00:00', '2017-07-26 10:54:39', '2017-07-26 10:54:43', 1),
(1996, 1, 6, 911, '1', 40, 17, 1, 60, '60.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-27 00:00:00', '2017-07-27 11:11:17', '2017-07-27 11:11:23', 1),
(1997, 1, 6, 912, '2', 61, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-27 00:00:00', '2017-07-27 11:12:59', '2017-07-27 11:13:23', 1),
(1998, 1, 6, 913, '3', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-27 00:00:00', '2017-07-27 11:39:47', '2017-07-27 11:43:28', 1),
(1999, 1, 6, 913, '3', 60, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-27 00:00:00', '2017-07-27 11:39:47', '2017-07-27 11:43:29', 1),
(2018, 1, 6, 922, '5', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-28 00:00:00', '2017-07-28 09:55:53', '2017-07-28 09:55:57', 1),
(2019, 1, 6, 922, '5', 60, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-28 00:00:00', '2017-07-28 09:55:53', '2017-07-28 09:55:58', 1),
(2020, 1, 6, 923, '6', 56, 21, 1, 40, '40.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-28 00:00:00', '2017-07-28 09:56:08', '2017-07-28 10:53:55', 1),
(2021, 1, 6, 924, '3', 20, 7, 1, 50, '50.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-28 00:00:00', '2017-07-28 11:49:54', '2017-07-28 12:16:51', 1),
(2022, 1, 6, 924, '3', 60, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-28 11:55:54', '2017-07-28 12:16:52', 2),
(2023, 1, 6, 924, '3', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-07-28 12:00:43', '2017-07-28 12:16:52', 3),
(2024, 1, 6, 925, '4', 51, 20, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-28 00:00:00', '2017-07-28 12:21:04', '2017-07-28 12:23:05', 1),
(2025, 1, 6, 925, '4', 58, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-28 00:00:00', '2017-07-28 12:21:04', '2017-07-28 12:23:06', 1),
(2026, 1, 6, 925, '4', 40, 17, 1, 60, '60.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-28 00:00:00', '2017-07-28 12:21:04', '2017-07-28 12:23:06', 1),
(2027, 1, 6, 925, '4', 28, 2, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-28 00:00:00', '2017-07-28 12:21:04', '2017-07-28 12:23:07', 1),
(2028, 1, 6, 925, '4', 57, 22, 1, 80, '80.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-28 00:00:00', '2017-07-28 12:21:04', '2017-07-28 12:23:08', 1),
(2029, 1, 6, 925, '4', 31, 2, 2, 80, '160.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-28 00:00:00', '2017-07-28 12:21:04', '2017-07-28 12:23:08', 1),
(2030, 1, 6, 925, '4', 32, 2, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-28 00:00:00', '2017-07-28 12:21:04', '2017-07-28 12:23:09', 1),
(2031, 1, 6, 925, '4', 37, 1, 1, 119, '119.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-07-28 00:00:00', '2017-07-28 12:21:04', '2017-07-28 12:23:09', 1),
(2032, 1, 6, 926, '1', 29, 2, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-08 00:00:00', '2017-08-08 17:19:32', '2017-08-08 17:21:37', 1),
(2033, 1, 6, 926, '1', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-08 00:00:00', '2017-08-08 17:19:32', '2017-08-08 17:21:38', 1),
(2034, 1, 6, 927, '2', 29, 2, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-08 00:00:00', '2017-08-08 17:20:17', '2017-08-08 17:21:40', 1),
(2035, 1, 6, 927, '2', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-08 00:00:00', '2017-08-08 17:20:17', '2017-08-08 17:21:40', 1),
(2036, 1, 6, 928, '3', 31, 2, 1, 80, '80.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-08 00:00:00', '2017-08-08 17:24:33', '2017-08-08 17:33:12', 1),
(2037, 1, 6, 929, '4', 39, 17, 1, 60, '60.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-08 00:00:00', '2017-08-08 17:33:48', '2017-08-08 17:33:56', 1),
(2038, 1, 6, 930, '1', 51, 20, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-09 00:00:00', '2017-08-09 07:20:15', '2017-08-09 07:20:49', 1),
(2039, 1, 6, 930, '1', 29, 2, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-09 00:00:00', '2017-08-09 07:20:15', '2017-08-09 07:20:50', 1),
(2040, 1, 6, 931, '2', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-09 00:00:00', '2017-08-09 07:22:57', '2017-08-09 07:23:25', 1),
(2041, 1, 0, 932, '3', 35, 1, 1, 129, '129.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-08-09 00:00:00', NULL, NULL, 0),
(2042, 1, 6, 933, '4', 61, 22, 4, 70, '280.00', 0, 1, 4, '0.00', '', '9', '28.00', '', '2017-08-09 00:00:00', '2017-08-09 08:03:59', '2017-08-09 08:04:10', 1),
(2043, 1, 6, 934, '5', 61, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-09 00:00:00', '2017-08-09 08:11:41', '2017-08-09 08:11:48', 1),
(2044, 1, 6, 934, '5', 41, 19, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-09 00:00:00', '2017-08-09 08:11:41', '2017-08-09 08:11:49', 1),
(2045, 1, 6, 935, '6', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-09 00:00:00', '2017-08-09 08:12:31', '2017-08-09 08:12:56', 1),
(2046, 1, 6, 935, '6', 24, 6, 1, 50, '50.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-08-09 08:12:47', '2017-08-09 08:12:58', 2),
(2047, 1, 6, 936, '7', 60, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-09 00:00:00', '2017-08-09 08:13:33', '2017-08-09 08:13:40', 1),
(2048, 1, 0, 937, '8', 61, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-08-09 00:00:00', NULL, NULL, 0),
(2049, 1, 0, 937, '8', 28, 2, 1, 99, '99.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-08-09 00:00:00', NULL, NULL, 0),
(2050, 1, 6, 938, '9', 29, 2, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-09 00:00:00', '2017-08-09 10:06:53', '2017-08-09 10:06:57', 1),
(2051, 1, 6, 939, '10', 28, 2, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-09 00:00:00', '2017-08-09 10:08:11', '2017-08-09 10:08:15', 1),
(2052, 1, 6, 940, '11', 28, 2, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-09 00:00:00', '2017-08-09 10:08:37', '2017-08-09 10:08:42', 1),
(2053, 1, 6, 940, '11', 42, 19, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-09 00:00:00', '2017-08-09 10:08:37', '2017-08-09 10:08:42', 1),
(2054, 1, 0, 941, '12', 61, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-08-09 00:00:00', NULL, NULL, 0),
(2055, 1, 0, 941, '12', 60, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-08-09 00:00:00', NULL, NULL, 0),
(2056, 1, 0, 942, '13', 45, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-09 00:00:00', NULL, NULL, 0),
(2057, 1, 0, 942, '13', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-09 00:00:00', NULL, NULL, 0),
(2058, 1, 0, 943, '14', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-09 00:00:00', NULL, NULL, 0),
(2059, 1, 0, 943, '14', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-09 00:00:00', NULL, NULL, 0),
(2060, 1, 6, 944, '15', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-09 00:00:00', '2017-08-09 13:47:22', '2017-08-09 13:47:26', 1),
(2061, 1, 6, 945, '1', 31, 2, 1, 80, '80.00', 0, 1, 4, '0.00', '', '10', '12.00', '', '2017-08-10 00:00:00', '2017-08-10 07:39:17', '2017-08-10 07:39:23', 1),
(2062, 1, 6, 945, '1', 18, 7, 1, 60, '60.00', 0, 1, 4, '0.00', '', '9', '6.00', '', '2017-08-10 00:00:00', '2017-08-10 07:39:17', '2017-08-10 07:39:24', 1),
(2063, 1, 6, 946, '2', 51, 20, 1, 70, '70.00', 0, 1, 4, '0.00', '', '9', '7.00', '', '2017-08-10 00:00:00', '2017-08-10 07:40:43', '2017-08-10 07:40:51', 1),
(2064, 1, 0, 947, '1', 55, 21, 1, 60, '60.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-08-10 00:00:00', NULL, NULL, 0),
(2065, 1, 6, 948, '3', 43, 19, 1, 40, '40.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-10 00:00:00', '2017-08-10 13:42:26', '2017-08-10 13:47:16', 1),
(2066, 1, 6, 948, '3', 34, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-10 00:00:00', '2017-08-10 13:42:26', '2017-08-10 13:47:16', 1),
(2067, 1, 6, 949, '4', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-10 00:00:00', '2017-08-10 13:43:26', '2017-08-10 13:47:40', 1),
(2068, 1, 6, 950, '5', 60, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-10 00:00:00', '2017-08-10 13:44:10', '2017-08-10 13:48:54', 1),
(2069, 1, 6, 951, '6', 34, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-10 00:00:00', '2017-08-10 13:44:23', '2017-08-10 14:10:31', 1),
(2070, 1, 6, 949, '4', 63, 22, 1, 50, '50.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-08-10 13:47:27', '2017-08-10 13:47:47', 2),
(2071, 1, 6, 952, '7', 18, 7, 1, 60, '60.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-10 00:00:00', '2017-08-10 13:50:32', '2017-08-10 14:10:33', 1),
(2072, 1, 6, 952, '7', 29, 2, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-10 00:00:00', '2017-08-10 13:50:32', '2017-08-10 14:10:34', 1),
(2073, 1, 6, 949, '4', 22, 6, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-08-10 14:08:49', '2017-08-10 14:10:30', 3),
(2074, 1, 0, 953, '2', 22, 6, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-10 00:00:00', NULL, NULL, 0),
(2075, 1, 6, 954, '8', 22, 6, 1, 99, '99.00', 0, 1, 1, '0.00', '', '', '0.00', '', '2017-08-10 00:00:00', '2017-08-10 14:37:29', '2017-08-10 14:37:29', 1),
(2076, 1, 6, 955, '1', 39, 17, 1, 60, '60.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-11 00:00:00', '2017-08-11 08:53:12', '2017-08-11 10:14:15', 1),
(2077, 1, 6, 956, '2', 29, 2, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-11 00:00:00', '2017-08-11 08:53:31', '2017-08-11 10:15:16', 1),
(2078, 1, 6, 955, '1', 56, 21, 1, 40, '40.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-08-11 08:53:39', '2017-08-11 10:14:15', 2),
(2079, 1, 6, 955, '1', 57, 22, 1, 80, '80.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-08-11 08:53:39', '2017-08-11 10:14:15', 2),
(2080, 1, 6, 955, '1', 56, 21, 1, 40, '40.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-08-11 08:53:50', '2017-08-11 10:14:16', 3),
(2081, 1, 6, 956, '2', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-08-11 10:03:23', '2017-08-11 10:15:16', 2),
(2082, 1, 6, 956, '2', 25, 6, 1, 40, '40.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-08-11 10:10:15', '2017-08-11 10:15:17', 3),
(2083, 1, 6, 955, '1', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-08-11 10:12:25', '2017-08-11 10:14:16', 4),
(2084, 1, 6, 957, '3', 51, 20, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-11 00:00:00', '2017-08-11 10:17:46', '2017-08-11 10:17:51', 1),
(2085, 1, 6, 958, '4', 51, 20, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-11 00:00:00', '2017-08-11 10:21:47', '2017-08-11 10:21:52', 1),
(2086, 1, 6, 959, '5', 22, 6, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-11 00:00:00', '2017-08-11 13:35:55', '2017-08-11 13:39:53', 1),
(2087, 1, 6, 960, '6', 51, 20, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-11 00:00:00', '2017-08-11 13:38:27', '2017-08-11 13:58:34', 1),
(2088, 1, 6, 960, '6', 56, 21, 1, 40, '40.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-11 00:00:00', '2017-08-11 13:38:27', '2017-08-11 13:58:35', 1),
(2089, 1, 6, 961, '7', 29, 2, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-11 00:00:00', '2017-08-11 13:38:40', '2017-08-11 13:58:36', 1),
(2090, 1, 6, 961, '7', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-11 00:00:00', '2017-08-11 13:38:40', '2017-08-11 13:58:36', 1),
(2091, 1, 6, 961, '7', 51, 20, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-08-11 13:41:12', '2017-08-11 13:58:38', 2),
(2092, 1, 6, 961, '7', 60, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-08-11 13:42:44', '2017-08-11 13:43:43', 3),
(2093, 1, 6, 961, '7', 59, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-08-11 13:45:19', '2017-08-11 13:58:39', 4),
(2094, 1, 0, 962, '1', 58, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-08-14 00:00:00', NULL, NULL, 0),
(2095, 1, 0, 962, '1', 20, 7, 1, 50, '50.00', 0, 0, 4, '0.00', '14', '9', '5.00', '', '2017-08-14 00:00:00', NULL, NULL, 0),
(2096, 1, 0, 963, '1', 39, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-08-17 00:00:00', NULL, NULL, 0),
(2097, 1, 0, 963, '1', 25, 6, 1, 40, '40.00', 0, 0, 4, '0.00', '14', '9', '4.00', '', '2017-08-17 00:00:00', NULL, NULL, 0),
(2098, 1, 0, 964, '2', 58, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-08-17 00:00:00', NULL, NULL, 0),
(2099, 1, 0, 964, '2', 20, 7, 1, 50, '50.00', 0, 0, 4, '0.00', '14', '9', '5.00', '', '2017-08-17 00:00:00', NULL, NULL, 0),
(2100, 1, 6, 965, '1', 54, 21, 1, 80, '80.00', 0, 1, 1, '0.00', '', '', '0.00', '', '2017-08-17 00:00:00', '2017-08-17 09:46:32', '2017-08-17 09:46:32', 1),
(2101, 1, 6, 965, '1', 48, 19, 1, 45, '45.00', 0, 1, 1, '0.00', '', '', '0.00', '', '2017-08-17 00:00:00', '2017-08-17 09:46:32', '2017-08-17 09:46:32', 1),
(2102, 1, 0, 966, '3', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-17 00:00:00', NULL, NULL, 0),
(2103, 1, 0, 966, '3', 59, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-17 00:00:00', NULL, NULL, 0),
(2104, 1, 6, 967, '1', 31, 2, 1, 80, '80.00', 0, 1, 1, '0.00', '', '', '0.00', '', '2017-08-19 00:00:00', '2017-08-19 12:28:29', '2017-08-19 12:28:29', 1),
(2105, 1, 6, 967, '1', 18, 7, 1, 60, '60.00', 0, 1, 1, '0.00', '', '', '0.00', '', '2017-08-19 00:00:00', '2017-08-19 12:28:29', '2017-08-19 12:28:29', 1),
(2106, 1, 0, 968, '1', 25, 6, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '9', '4.00', '', '2017-08-19 00:00:00', NULL, NULL, 0),
(2107, 1, 0, 969, '2', 25, 6, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '9', '4.00', '', '2017-08-19 00:00:00', NULL, NULL, 0),
(2108, 1, 0, 970, '3', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-19 00:00:00', NULL, NULL, 0),
(2109, 1, 0, 971, '4', 18, 7, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '9', '6.00', '', '2017-08-19 00:00:00', NULL, NULL, 0),
(2110, 1, 0, 972, '5', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-19 00:00:00', NULL, NULL, 0),
(2111, 1, 0, 973, '6', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-19 00:00:00', NULL, NULL, 0),
(2112, 1, 0, 974, '7', 58, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-19 00:00:00', NULL, NULL, 0),
(2113, 1, 0, 974, '7', 20, 7, 1, 50, '50.00', 0, 0, 2, '0.00', '14', '9', '5.00', '', '2017-08-19 00:00:00', NULL, NULL, 0),
(2114, 1, 0, 974, '7', 34, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-19 00:00:00', NULL, NULL, 0),
(2115, 1, 0, 975, '8', 48, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-19 00:00:00', NULL, NULL, 0),
(2116, 1, 0, 975, '8', 34, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-19 00:00:00', NULL, NULL, 0),
(2117, 1, 6, 976, '1', 51, 20, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 10:33:29', '2017-08-22 12:38:35', 1),
(2118, 1, 6, 976, '1', 58, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 10:33:29', '2017-08-22 12:38:35', 1),
(2119, 1, 6, 976, '1', 56, 21, 1, 40, '40.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-08-22 12:29:35', '2017-08-22 12:38:36', 2),
(2120, 1, 6, 976, '1', 29, 2, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '0000-00-00 00:00:00', '2017-08-22 12:29:35', '2017-08-22 12:38:36', 2),
(2121, 1, 6, 977, '2', 51, 20, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 12:42:58', '2017-08-22 12:43:08', 1),
(2122, 1, 6, 977, '2', 29, 2, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 12:42:58', '2017-08-22 12:43:09', 1),
(2123, 1, 6, 978, '3', 29, 2, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 12:45:25', '2017-08-22 12:45:32', 1),
(2124, 1, 6, 978, '3', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 12:45:25', '2017-08-22 12:45:32', 1),
(2125, 1, 6, 979, '4', 29, 2, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 12:48:15', '2017-08-22 12:48:20', 1),
(2126, 1, 6, 979, '4', 20, 7, 1, 50, '50.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 12:48:15', '2017-08-22 12:48:21', 1),
(2127, 1, 6, 979, '4', 56, 21, 1, 40, '40.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 12:48:15', '2017-08-22 12:48:21', 1),
(2128, 1, 6, 979, '4', 57, 22, 1, 80, '80.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 12:48:15', '2017-08-22 12:48:21', 1),
(2129, 1, 6, 980, '5', 29, 2, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 12:51:46', '2017-08-22 12:52:03', 1),
(2130, 1, 6, 980, '5', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 12:51:46', '2017-08-22 12:52:03', 1),
(2131, 1, 6, 980, '5', 20, 7, 1, 50, '50.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 12:51:46', '2017-08-22 12:52:03', 1),
(2132, 1, 6, 981, '6', 51, 20, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 12:54:01', '2017-08-22 12:54:08', 1),
(2133, 1, 6, 981, '6', 29, 2, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 12:54:01', '2017-08-22 12:54:09', 1),
(2134, 1, 6, 981, '6', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 12:54:01', '2017-08-22 12:54:09', 1),
(2135, 1, 6, 982, '7', 29, 2, 1, 99, '99.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 13:07:02', '2017-08-22 13:07:17', 1),
(2136, 1, 6, 982, '7', 35, 1, 1, 129, '129.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 13:07:02', '2017-08-22 13:07:18', 1),
(2137, 1, 6, 982, '7', 60, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 13:07:02', '2017-08-22 13:07:18', 1),
(2138, 1, 6, 983, '8', 18, 7, 1, 60, '60.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 13:19:13', '2017-08-22 13:19:18', 1),
(2139, 1, 6, 983, '8', 51, 20, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-22 00:00:00', '2017-08-22 13:19:13', '2017-08-22 13:19:18', 1),
(2140, 1, 0, 984, '1', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-22 00:00:00', NULL, NULL, 0),
(2141, 1, 0, 984, '1', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-22 00:00:00', NULL, NULL, 0),
(2142, 1, 0, 984, '1', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-22 00:00:00', NULL, NULL, 0),
(2143, 1, 0, 985, '2', 51, 20, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-22 00:00:00', NULL, NULL, 0),
(2144, 1, 0, 985, '2', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-22 00:00:00', NULL, NULL, 0),
(2145, 1, 0, 985, '2', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-22 00:00:00', NULL, NULL, 0),
(2146, 1, 6, 986, '1', 60, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-23 00:00:00', '2017-08-23 16:19:13', '2017-08-23 16:19:17', 1),
(2147, 1, 6, 986, '1', 61, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-23 00:00:00', '2017-08-23 16:19:13', '2017-08-23 16:19:17', 1),
(2148, 1, 6, 987, '2', 57, 22, 1, 80, '80.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-23 00:00:00', '2017-08-23 16:21:21', '2017-08-23 16:21:26', 1),
(2149, 1, 6, 988, '3', 56, 21, 1, 40, '40.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-23 00:00:00', '2017-08-23 16:24:31', '2017-08-23 16:24:35', 1),
(2150, 1, 6, 989, '4', 58, 22, 1, 70, '70.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-23 00:00:00', '2017-08-23 16:27:45', '2017-08-23 16:46:58', 1),
(2151, 1, 6, 989, '4', 20, 7, 1, 50, '50.00', 0, 1, 4, '0.00', '', '', '0.00', '', '2017-08-23 00:00:00', '2017-08-23 16:27:45', '2017-08-23 16:46:58', 1),
(2152, 1, 0, 990, '1', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-30 00:00:00', NULL, NULL, 0),
(2153, 1, 0, 990, '1', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-30 00:00:00', NULL, NULL, 0),
(2154, 1, 0, 991, '2', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-30 00:00:00', NULL, NULL, 0),
(2155, 1, 0, 991, '2', 34, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-30 00:00:00', NULL, NULL, 0),
(2156, 1, 0, 991, '2', 32, 2, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-30 00:00:00', NULL, NULL, 0),
(2157, 1, 0, 991, '2', 37, 1, 1, 119, '119.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-08-30 00:00:00', NULL, NULL, 0),
(2158, 1, 0, 992, '1', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-09-06 00:00:00', NULL, NULL, 0),
(2159, 1, 0, 992, '1', 58, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-09-06 00:00:00', NULL, NULL, 0),
(2160, 1, 0, 993, '1', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-06 00:00:00', NULL, NULL, 0),
(2161, 1, 0, 993, '1', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-06 00:00:00', NULL, NULL, 0),
(2162, 1, 0, 994, '2', 20, 7, 1, 50, '50.00', 0, 0, 2, '0.00', '14', '9', '5.00', '', '2017-10-06 00:00:00', NULL, NULL, 0),
(2163, 1, 0, 994, '2', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-06 00:00:00', NULL, NULL, 0),
(2164, 1, 0, 995, '3', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-06 00:00:00', NULL, NULL, 0),
(2165, 1, 0, 995, '3', 48, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-06 00:00:00', NULL, NULL, 0),
(2166, 1, 0, 996, '4', 48, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-06 00:00:00', NULL, NULL, 0),
(2167, 1, 0, 996, '4', 34, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-06 00:00:00', NULL, NULL, 0),
(2168, 1, 0, 997, '5', 48, 19, 2, 45, '90.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-06 00:00:00', NULL, NULL, 0),
(2169, 1, 0, 997, '5', 34, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-06 00:00:00', NULL, NULL, 0),
(2170, 1, 0, 998, '6', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-06 00:00:00', NULL, NULL, 0),
(2171, 1, 0, 998, '6', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-06 00:00:00', NULL, NULL, 0),
(2172, 1, 0, 999, '1', 45, 19, 1, 45, '45.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-10-12 00:00:00', NULL, NULL, 0),
(2173, 1, 0, 999, '1', 28, 2, 1, 99, '99.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-10-12 00:00:00', NULL, NULL, 0),
(2174, 1, 0, 1000, '2', 35, 1, 1, 129, '129.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-10-12 00:00:00', NULL, NULL, 0),
(2175, 1, 0, 1000, '2', 60, 22, 1, 70, '70.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-10-12 00:00:00', NULL, NULL, 0),
(2176, 1, 0, 1001, '3', 45, 19, 1, 45, '45.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-10-12 00:00:00', NULL, NULL, 0),
(2177, 1, 0, 1001, '3', 55, 21, 1, 60, '60.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-10-12 00:00:00', NULL, NULL, 0),
(2178, 1, 0, 1002, '4', 55, 21, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-12 00:00:00', NULL, NULL, 0),
(2179, 1, 0, 1002, '4', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-12 00:00:00', NULL, NULL, 0),
(2180, 1, 0, 1003, '1', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-26 00:00:00', NULL, NULL, 0),
(2181, 1, 0, 1004, '2', 18, 7, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '9', '6.00', '', '2017-10-26 00:00:00', NULL, NULL, 0),
(2182, 1, 0, 1005, '3', 51, 20, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-26 00:00:00', NULL, NULL, 0),
(2183, 1, 0, 1006, '4', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-26 00:00:00', NULL, NULL, 0),
(2184, 1, 0, 1007, '1', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-27 00:00:00', NULL, NULL, 0),
(2185, 1, 0, 1008, '2', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-27 00:00:00', NULL, NULL, 0),
(2186, 1, 0, 1008, '2', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-27 00:00:00', NULL, NULL, 0),
(2187, 1, 0, 1008, '2', 41, 19, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-27 00:00:00', NULL, NULL, 0),
(2188, 1, 0, 1008, '2', 43, 19, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-27 00:00:00', NULL, NULL, 0),
(2189, 1, 0, 1009, '3', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-27 00:00:00', NULL, NULL, 0),
(2190, 1, 0, 1009, '3', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-27 00:00:00', NULL, NULL, 0),
(2191, 1, 0, 1009, '3', 55, 21, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-27 00:00:00', NULL, NULL, 0),
(2192, 1, 0, 1010, '1', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-30 00:00:00', NULL, NULL, 0),
(2193, 1, 0, 1010, '1', 45, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-30 00:00:00', NULL, NULL, 0),
(2194, 1, 0, 1011, '2', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-30 00:00:00', NULL, NULL, 0),
(2195, 1, 0, 1011, '2', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-30 00:00:00', NULL, NULL, 0),
(2196, 1, 0, 1012, '3', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-30 00:00:00', NULL, NULL, 0),
(2197, 1, 0, 1012, '3', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-30 00:00:00', NULL, NULL, 0),
(2198, 1, 0, 1013, '1', 59, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-31 00:00:00', NULL, NULL, 0),
(2199, 1, 0, 1013, '1', 31, 2, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-31 00:00:00', NULL, NULL, 0),
(2200, 1, 0, 1014, '2', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-31 00:00:00', NULL, NULL, 0),
(2201, 1, 0, 1014, '2', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-31 00:00:00', NULL, NULL, 0),
(2202, 1, 0, 1015, '3', 45, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-31 00:00:00', NULL, NULL, 0),
(2203, 1, 0, 1015, '3', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-31 00:00:00', NULL, NULL, 0),
(2204, 1, 0, 1016, '4', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-31 00:00:00', NULL, NULL, 0),
(2205, 1, 0, 1016, '4', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-31 00:00:00', NULL, NULL, 0),
(2206, 1, 0, 1017, '5', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-31 00:00:00', NULL, NULL, 0),
(2207, 1, 0, 1017, '5', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-31 00:00:00', NULL, NULL, 0),
(2208, 1, 0, 1018, '6', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-31 00:00:00', NULL, NULL, 0),
(2209, 1, 0, 1019, '7', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-31 00:00:00', NULL, NULL, 0),
(2210, 1, 0, 1019, '7', 41, 19, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-10-31 00:00:00', NULL, NULL, 0),
(2211, 1, 0, 1020, '1', 55, 21, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2212, 1, 0, 1020, '1', 42, 19, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2213, 1, 0, 1021, '2', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2214, 1, 0, 1021, '2', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2215, 1, 0, 1022, '3', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2216, 1, 0, 1022, '3', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2217, 1, 0, 1023, '4', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2218, 1, 0, 1023, '4', 45, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2219, 1, 0, 1024, '5', 59, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2220, 1, 0, 1024, '5', 31, 2, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2221, 1, 0, 1025, '6', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2222, 1, 0, 1025, '6', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2223, 1, 0, 1026, '7', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2224, 1, 0, 1026, '7', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2225, 1, 0, 1027, '8', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2226, 1, 0, 1027, '8', 59, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2227, 1, 0, 1028, '9', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2228, 1, 0, 1028, '9', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2229, 1, 0, 1029, '10', 41, 19, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2230, 1, 0, 1029, '10', 42, 19, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2231, 1, 0, 1030, '11', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2232, 1, 0, 1030, '11', 45, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2233, 1, 0, 1031, '12', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2234, 1, 0, 1031, '12', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2235, 1, 0, 1032, '13', 55, 21, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2236, 1, 0, 1033, '14', 55, 21, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2237, 1, 0, 1034, '15', 55, 21, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2238, 1, 0, 1035, '16', 55, 21, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2239, 1, 0, 1036, '17', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2240, 1, 0, 1037, '18', 55, 21, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2241, 1, 0, 1038, '19', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2242, 1, 0, 1039, '20', 45, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2243, 1, 0, 1040, '21', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2244, 1, 0, 1041, '22', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2245, 1, 0, 1041, '22', 59, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2246, 1, 0, 1042, '23', 62, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2247, 1, 0, 1042, '23', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-01 00:00:00', NULL, NULL, 0),
(2248, 1, 0, 1043, '1', 41, 19, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2249, 1, 0, 1043, '1', 21, 7, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '9', '4.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2250, 1, 0, 1044, '2', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2251, 1, 0, 1044, '2', 41, 19, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2252, 1, 0, 1045, '3', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2253, 1, 0, 1045, '3', 43, 19, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2254, 1, 0, 1045, '3', 53, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2255, 1, 0, 1046, '4', 45, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2256, 1, 0, 1046, '4', 55, 21, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2257, 1, 0, 1047, '5', 42, 19, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2258, 1, 0, 1047, '5', 38, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2259, 1, 0, 1048, '6', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2260, 1, 0, 1048, '6', 43, 19, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2261, 1, 0, 1049, '7', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2262, 1, 0, 1049, '7', 28, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2263, 1, 0, 1050, '8', 58, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2264, 1, 0, 1050, '8', 48, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2265, 1, 0, 1050, '8', 30, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2266, 1, 0, 1050, '8', 64, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2267, 1, 0, 1051, '9', 45, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2268, 1, 0, 1051, '9', 55, 21, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2269, 1, 0, 1052, '10', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2270, 1, 0, 1052, '10', 41, 19, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2271, 1, 0, 1053, '11', 60, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2272, 1, 0, 1053, '11', 45, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2273, 1, 0, 1054, '12', 41, 19, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2274, 1, 0, 1054, '12', 21, 7, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '9', '4.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2275, 1, 0, 1055, '13', 20, 7, 1, 50, '50.00', 0, 0, 2, '0.00', '14', '9', '5.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2276, 1, 0, 1055, '13', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2277, 1, 0, 1056, '14', 43, 19, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2278, 1, 0, 1056, '14', 53, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2279, 1, 0, 1057, '15', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2280, 1, 0, 1057, '15', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2281, 1, 0, 1058, '16', 41, 19, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2282, 1, 0, 1058, '16', 21, 7, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '9', '4.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2283, 1, 0, 1059, '17', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2284, 1, 0, 1059, '17', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0);
INSERT INTO `pos_sales_order_transaction` (`sales_order_transaction_id`, `company_id`, `employee_id`, `sales_order_id`, `sales_order_no`, `inventory_stock_id`, `inventory_category_id`, `sales_qty`, `sales_rate`, `sales_amount`, `unit_id`, `order_completion_time`, `product_order_status_id`, `product_tax_amount`, `tax_ids`, `discount_ids`, `product_discount_amount`, `comment`, `sales_order_date`, `created_at`, `updated_at`, `batch_no`) VALUES
(2285, 1, 0, 1060, '18', 41, 19, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2286, 1, 0, 1060, '18', 21, 7, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '9', '4.00', '', '2017-11-02 00:00:00', NULL, NULL, 0),
(2287, 14, 0, 1061, '1', 749, 73, 1, 20, '20.00', 3, 0, 2, '0.00', '', '', '0.00', '', '2017-11-08 00:00:00', NULL, NULL, 0),
(2288, 14, 0, 1061, '1', 650, 86, 2, 80, '160.71', 3, 0, 2, '19.29', '19,20', '', '0.00', '', '2017-11-08 00:00:00', NULL, NULL, 0),
(2289, 14, 0, 1061, '1', 727, 92, 1, 45, '44.64', 3, 0, 2, '5.36', '19,20', '', '0.00', '', '2017-11-08 00:00:00', NULL, NULL, 0),
(2290, 14, 0, 1062, '2', 749, 73, 1, 20, '20.00', 3, 0, 2, '0.00', '', '', '0.00', '', '2017-11-08 00:00:00', NULL, NULL, 0),
(2291, 1, 0, 1063, '1', 40, 17, 1, 60, '60.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-11-09 00:00:00', NULL, NULL, 0),
(2292, 1, 0, 1063, '1', 41, 19, 1, 129, '129.00', 0, 0, 4, '0.00', '14', '', '0.00', '', '2017-11-09 00:00:00', NULL, NULL, 0),
(2293, 1, 0, 1064, '2', 20, 7, 1, 50, '50.00', 0, 0, 2, '0.00', '14', '9', '5.00', '', '2017-11-09 00:00:00', NULL, NULL, 0),
(2294, 1, 0, 1064, '2', 43, 19, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-09 00:00:00', NULL, NULL, 0),
(2295, 1, 0, 1065, '3', 43, 19, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-09 00:00:00', NULL, NULL, 0),
(2296, 1, 0, 1066, '1', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2297, 1, 0, 1066, '1', 41, 19, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2298, 1, 0, 1067, '2', 20, 7, 1, 50, '50.00', 0, 0, 2, '0.00', '14', '9', '5.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2299, 1, 0, 1067, '2', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2300, 1, 0, 1068, '3', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2301, 1, 0, 1068, '3', 41, 19, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2302, 1, 0, 1069, '4', 43, 19, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2303, 1, 0, 1069, '4', 53, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2304, 1, 0, 1070, '5', 34, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2305, 1, 0, 1070, '5', 64, 22, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2306, 1, 0, 1071, '6', 48, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2307, 1, 0, 1071, '6', 34, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2308, 1, 0, 1072, '7', 48, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2309, 1, 0, 1072, '7', 30, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2310, 1, 0, 1073, '8', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2311, 1, 0, 1073, '8', 41, 19, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2312, 1, 0, 1074, '9', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2313, 1, 0, 1074, '9', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2314, 1, 0, 1075, '10', 29, 2, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2315, 1, 0, 1075, '10', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-10 00:00:00', NULL, NULL, 0),
(2316, 1, 0, 1076, '1', 55, 21, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-11 00:00:00', NULL, NULL, 0),
(2317, 1, 0, 1076, '1', 38, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-11 00:00:00', NULL, NULL, 0),
(2318, 1, 0, 1077, '1', 41, 19, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-15 00:00:00', NULL, NULL, 0),
(2319, 1, 0, 1077, '1', 49, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-15 00:00:00', NULL, NULL, 0),
(2320, 1, 0, 1078, '2', 53, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-15 00:00:00', NULL, NULL, 0),
(2321, 1, 0, 1078, '2', 38, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-15 00:00:00', NULL, NULL, 0),
(2322, 1, 0, 1079, '1', 57, 22, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2323, 1, 0, 1079, '1', 56, 21, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2324, 1, 0, 1080, '2', 46, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2325, 1, 0, 1080, '2', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2326, 1, 0, 1081, '3', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2327, 1, 0, 1081, '3', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2328, 1, 0, 1082, '4', 41, 19, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2329, 1, 0, 1083, '5', 41, 19, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2330, 1, 0, 1083, '5', 42, 19, 1, 99, '99.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2331, 1, 0, 1084, '1', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2332, 1, 0, 1084, '1', 43, 19, 1, 40, '40.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2333, 1, 0, 1085, '6', 61, 22, 1, 70, '70.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2334, 1, 0, 1086, '8', 55, 21, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2335, 1, 0, 1086, '8', 38, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2336, 1, 0, 1087, '9', 35, 1, 1, 129, '129.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2337, 1, 0, 1087, '9', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2338, 1, 0, 1088, '1', 45, 19, 1, 45, '45.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2339, 1, 0, 1089, '2', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2340, 1, 0, 1090, '3', 54, 21, 1, 80, '80.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-16 00:00:00', NULL, NULL, 0),
(2341, 1, 0, 1091, '1', 38, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-17 00:00:00', NULL, NULL, 0),
(2342, 1, 0, 1092, '2', 40, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-17 00:00:00', NULL, NULL, 0),
(2343, 1, 0, 1093, '3', 52, 20, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-17 00:00:00', NULL, NULL, 0),
(2344, 1, 0, 1094, '4', 38, 17, 1, 60, '60.00', 0, 0, 2, '0.00', '14', '', '0.00', '', '2017-11-17 00:00:00', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pos_sales_order_type`
--

CREATE TABLE `pos_sales_order_type` (
  `order_type_id` int(11) NOT NULL,
  `order_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_sales_order_type`
--

INSERT INTO `pos_sales_order_type` (`order_type_id`, `order_type`) VALUES
(1, 'Dine In'),
(2, 'Takeaway'),
(3, 'Delivery'),
(4, 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `pos_subadmin_details`
--

CREATE TABLE `pos_subadmin_details` (
  `subadmin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `permission_id` tinyint(2) NOT NULL,
  `address` varchar(100) NOT NULL,
  `location_id` int(11) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_subadmin_details`
--

INSERT INTO `pos_subadmin_details` (`subadmin_id`, `email`, `name`, `mobile`, `password`, `parent_id`, `permission_id`, `address`, `location_id`, `image_name`, `company_id`) VALUES
(1, 'emp1@mailinator.com', 'John Smith', '212121213', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 'Foti kothi, Indore', 1, 'http://www.creativethoughtsinfo.com/ct100/domestic-meal/img/process3.png', 1),
(2, 'emp2@mailinator.com', 'Robby', '1234567890', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'sadsa dsdsad sad sad', 1, 'http://www.creativethoughtsinfo.com/ct100/domestic-meal/img/process3.png', 1),
(3, 'emp3@mailinator.com', 'Robby3', '1234567890', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'sadsa dsdsad sad sad', 1, 'http://www.creativethoughtsinfo.com/ct100/domestic-meal/img/process3.png', 1),
(4, 'emp4@mailinator.com', 'Robby4', '1234567890', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'sadsa dsdsad sad sad', 1, 'http://www.creativethoughtsinfo.com/ct100/domestic-meal/img/process3.png', 1),
(5, 'emp5@mailinator.com', 'Robby5', '1234567890', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'sadsa dsdsad sad sad', 1, 'http://www.creativethoughtsinfo.com/ct100/domestic-meal/img/process3.png', 1),
(6, 'emp6@mailinator.com', 'Robby6', '1234567890', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'sadsa dsdsad sad sad', 1, 'http://www.creativethoughtsinfo.com/ct100/domestic-meal/img/process3.png', 1),
(7, 'emp7@mailinator.com', 'Robby7', '1234567890', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'sadsa dsdsad sad sad', 1, 'http://www.creativethoughtsinfo.com/ct100/domestic-meal/img/process3.png', 1),
(8, 'emp8@mailinator.com', 'Robby8', '1234567890', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'sadsa dsdsad sad sad', 1, 'http://www.creativethoughtsinfo.com/ct100/domestic-meal/img/process3.png', 1),
(9, 'emp9@mailinator.com', 'Robby9', '1234567890', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'sadsa dsdsad sad sad', 1, 'http://www.creativethoughtsinfo.com/ct100/domestic-meal/img/process3.png', 1),
(10, 'emp10@mailinator.com', 'Robby10', '1234567890', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'sadsa dsdsad sad sad', 1, 'http://www.creativethoughtsinfo.com/ct100/domestic-meal/img/process3.png', 1),
(11, 'emp2@mailinator.com', 'Robby11', '1234567890', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'sadsa dsdsad sad sad', 1, 'http://www.creativethoughtsinfo.com/ct100/domestic-meal/img/process3.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos_table`
--

CREATE TABLE `pos_table` (
  `table_id` int(11) NOT NULL,
  `table_name` varchar(45) DEFAULT NULL,
  `chairs_count` varchar(45) DEFAULT NULL,
  `served_by` varchar(45) DEFAULT NULL,
  `floor_id` int(11) DEFAULT NULL,
  `reservation_status_id` int(11) DEFAULT '1',
  `base_table_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_table`
--

INSERT INTO `pos_table` (`table_id`, `table_name`, `chairs_count`, `served_by`, `floor_id`, `reservation_status_id`, `base_table_id`) VALUES
(4, 'Table 1', '5', '', 5, 1, NULL),
(5, 'Table 2', '5', '', 5, 1, NULL),
(6, 'Table 3', '5', '', 5, 1, NULL),
(7, 'Table 4', '5', '', 5, 1, NULL),
(8, 'Table 5', '5', '', 5, 1, NULL),
(9, 'Table 1', '4', '', 6, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pos_tax`
--

CREATE TABLE `pos_tax` (
  `tax_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `tax_name` varchar(50) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_tax`
--

INSERT INTO `pos_tax` (`tax_id`, `company_id`, `tax_name`, `updated_date`) VALUES
(4, 5, 'Ctinfo3-tax1', '2017-02-20 07:41:35'),
(5, 5, 'Ctinfo3-tax2', '2017-02-20 07:42:23'),
(6, 5, 'Ctinfo3-tax3', '2017-02-20 08:14:52'),
(7, 5, 'Ctinfo3-tax4', '2017-02-20 08:16:35'),
(13, 2, 'GST', '2017-03-11 11:36:02'),
(14, 1, 'GST', '2017-03-11 12:05:42'),
(15, 15, 'No Tax', '2017-04-05 06:37:08'),
(16, 16, 'Service Tax', '2017-04-05 08:38:18'),
(17, 18, 'Service Tax', '2017-04-05 14:59:56'),
(18, 19, 'No Tax', '2017-04-06 09:22:56'),
(19, 22, 'GST', '2017-04-19 07:40:31'),
(20, 3, 'Swach Bhart', '2017-04-19 10:30:31'),
(21, 26, 'Tax11', '2017-07-17 09:44:15'),
(22, 26, 'Tax22', '2017-07-17 09:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `pos_tax_percenatge`
--

CREATE TABLE `pos_tax_percenatge` (
  `tax_percentage_id` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `percentage` tinyint(2) NOT NULL,
  `applicable_from` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_tax_percenatge`
--

INSERT INTO `pos_tax_percenatge` (`tax_percentage_id`, `tax_id`, `company_id`, `percentage`, `applicable_from`) VALUES
(25, 13, 2, 0, '2017-03-11 00:00:00'),
(30, 15, 15, 0, '2017-04-05 00:00:00'),
(31, 16, 16, 14, '2017-04-05 00:00:00'),
(32, 17, 18, 14, '2017-04-05 00:00:00'),
(33, 18, 19, 0, '2017-04-06 00:00:00'),
(34, 19, 22, 10, '2017-07-01 00:00:00'),
(36, 20, 3, 12, '2017-04-20 00:00:00'),
(37, 14, 1, 0, '2017-02-02 00:00:00'),
(38, 14, 1, 0, '2017-03-15 00:00:00'),
(40, 22, 26, 20, '2017-07-18 00:00:00'),
(41, 21, 26, 10, '2017-07-18 00:00:00'),
(42, 21, 26, 5, '2017-07-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pos_timezone`
--

CREATE TABLE `pos_timezone` (
  `time_zone_id` int(11) NOT NULL,
  `zone` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_timezone`
--

INSERT INTO `pos_timezone` (`time_zone_id`, `zone`) VALUES
(1, 'Africa/Abidjan'),
(2, 'Africa/Accra'),
(3, 'Africa/Addis_Ababa'),
(4, 'Africa/Algiers'),
(5, 'Africa/Asmara'),
(6, 'Africa/Bamako'),
(7, 'Africa/Bangui'),
(8, 'Africa/Banjul'),
(9, 'Africa/Bissau'),
(10, 'Africa/Blantyre'),
(11, 'Africa/Brazzaville'),
(12, 'Africa/Bujumbura'),
(13, 'Africa/Cairo'),
(14, 'Africa/Casablanca'),
(15, 'Africa/Ceuta'),
(16, 'Africa/Conakry'),
(17, 'Africa/Dakar'),
(18, 'Africa/Dar_es_Salaam'),
(19, 'Africa/Djibouti'),
(20, 'Africa/Douala'),
(21, 'Africa/El_Aaiun'),
(22, 'Africa/Freetown'),
(23, 'Africa/Gaborone'),
(24, 'Africa/Harare'),
(25, 'Africa/Johannesburg'),
(26, 'Africa/Juba'),
(27, 'Africa/Kampala'),
(28, 'Africa/Khartoum'),
(29, 'Africa/Kigali'),
(30, 'Africa/Kinshasa'),
(31, 'Africa/Lagos'),
(32, 'Africa/Libreville'),
(33, 'Africa/Lome'),
(34, 'Africa/Luanda'),
(35, 'Africa/Lubumbashi'),
(36, 'Africa/Lusaka'),
(37, 'Africa/Malabo'),
(38, 'Africa/Maputo'),
(39, 'Africa/Maseru'),
(40, 'Africa/Mbabane'),
(41, 'Africa/Mogadishu'),
(42, 'Africa/Monrovia'),
(43, 'Africa/Nairobi'),
(44, 'Africa/Ndjamena'),
(45, 'Africa/Niamey'),
(46, 'Africa/Nouakchott'),
(47, 'Africa/Ouagadougou'),
(48, 'Africa/Porto-Novo'),
(49, 'Africa/Sao_Tome'),
(50, 'Africa/Tripoli'),
(51, 'Africa/Tunis'),
(52, 'Africa/Windhoek'),
(53, 'America/Adak'),
(54, 'America/Anchorage'),
(55, 'America/Anguilla'),
(56, 'America/Antigua'),
(57, 'America/Araguaina'),
(58, 'America/Argentina/Buenos_Aires'),
(59, 'America/Argentina/Catamarca'),
(60, 'America/Argentina/Cordoba'),
(61, 'America/Argentina/Jujuy'),
(62, 'America/Argentina/La_Rioja'),
(63, 'America/Argentina/Mendoza'),
(64, 'America/Argentina/Rio_Gallegos'),
(65, 'America/Argentina/Salta'),
(66, 'America/Argentina/San_Juan'),
(67, 'America/Argentina/San_Luis'),
(68, 'America/Argentina/Tucuman'),
(69, 'America/Argentina/Ushuaia'),
(70, 'America/Aruba'),
(71, 'America/Asuncion'),
(72, 'America/Atikokan'),
(73, 'America/Bahia'),
(74, 'America/Bahia_Banderas'),
(75, 'America/Barbados'),
(76, 'America/Belem'),
(77, 'America/Belize'),
(78, 'America/Blanc-Sablon'),
(79, 'America/Boa_Vista'),
(80, 'America/Bogota'),
(81, 'America/Boise'),
(82, 'America/Cambridge_Bay'),
(83, 'America/Campo_Grande'),
(84, 'America/Cancun'),
(85, 'America/Caracas'),
(86, 'America/Cayenne'),
(87, 'America/Cayman'),
(88, 'America/Chicago'),
(89, 'America/Chihuahua'),
(90, 'America/Costa_Rica'),
(91, 'America/Creston'),
(92, 'America/Cuiaba'),
(93, 'America/Curacao'),
(94, 'America/Danmarkshavn'),
(95, 'America/Dawson'),
(96, 'America/Dawson_Creek'),
(97, 'America/Denver'),
(98, 'America/Detroit'),
(99, 'America/Dominica'),
(100, 'America/Edmonton'),
(101, 'America/Eirunepe'),
(102, 'America/El_Salvador'),
(103, 'America/Fortaleza'),
(104, 'America/Glace_Bay'),
(105, 'America/Godthab'),
(106, 'America/Goose_Bay'),
(107, 'America/Grand_Turk'),
(108, 'America/Grenada'),
(109, 'America/Guadeloupe'),
(110, 'America/Guatemala'),
(111, 'America/Guayaquil'),
(112, 'America/Guyana'),
(113, 'America/Halifax'),
(114, 'America/Havana'),
(115, 'America/Hermosillo'),
(116, 'America/Indiana/Indianapolis'),
(117, 'America/Indiana/Knox'),
(118, 'America/Indiana/Marengo'),
(119, 'America/Indiana/Petersburg'),
(120, 'America/Indiana/Tell_City'),
(121, 'America/Indiana/Vevay'),
(122, 'America/Indiana/Vincennes'),
(123, 'America/Indiana/Winamac'),
(124, 'America/Inuvik'),
(125, 'America/Iqaluit'),
(126, 'America/Jamaica'),
(127, 'America/Juneau'),
(128, 'America/Kentucky/Louisville'),
(129, 'America/Kentucky/Monticello'),
(130, 'America/Kralendijk'),
(131, 'America/La_Paz'),
(132, 'America/Lima'),
(133, 'America/Los_Angeles'),
(134, 'America/Lower_Princes'),
(135, 'America/Maceio'),
(136, 'America/Managua'),
(137, 'America/Manaus'),
(138, 'America/Marigot'),
(139, 'America/Martinique'),
(140, 'America/Matamoros'),
(141, 'America/Mazatlan'),
(142, 'America/Menominee'),
(143, 'America/Merida'),
(144, 'America/Metlakatla'),
(145, 'America/Mexico_City'),
(146, 'America/Miquelon'),
(147, 'America/Moncton'),
(148, 'America/Monterrey'),
(149, 'America/Montevideo'),
(150, 'America/Montserrat'),
(151, 'America/Nassau'),
(152, 'America/New_York'),
(153, 'America/Nipigon'),
(154, 'America/Nome'),
(155, 'America/Noronha'),
(156, 'America/North_Dakota/Beulah'),
(157, 'America/North_Dakota/Center'),
(158, 'America/North_Dakota/New_Salem'),
(159, 'America/Ojinaga'),
(160, 'America/Panama'),
(161, 'America/Pangnirtung'),
(162, 'America/Paramaribo'),
(163, 'America/Phoenix'),
(164, 'America/Port-au-Prince'),
(165, 'America/Port_of_Spain'),
(166, 'America/Porto_Velho'),
(167, 'America/Puerto_Rico'),
(168, 'America/Rainy_River'),
(169, 'America/Rankin_Inlet'),
(170, 'America/Recife'),
(171, 'America/Regina'),
(172, 'America/Resolute'),
(173, 'America/Rio_Branco'),
(174, 'America/Santa_Isabel'),
(175, 'America/Santarem'),
(176, 'America/Santiago'),
(177, 'America/Santo_Domingo'),
(178, 'America/Sao_Paulo'),
(179, 'America/Scoresbysund'),
(180, 'America/Sitka'),
(181, 'America/St_Barthelemy'),
(182, 'America/St_Johns'),
(183, 'America/St_Kitts'),
(184, 'America/St_Lucia'),
(185, 'America/St_Thomas'),
(186, 'America/St_Vincent'),
(187, 'America/Swift_Current'),
(188, 'America/Tegucigalpa'),
(189, 'America/Thule'),
(190, 'America/Thunder_Bay'),
(191, 'America/Tijuana'),
(192, 'America/Toronto'),
(193, 'America/Tortola'),
(194, 'America/Vancouver'),
(195, 'America/Whitehorse'),
(196, 'America/Winnipeg'),
(197, 'America/Yakutat'),
(198, 'America/Yellowknife'),
(199, 'Antarctica/Casey'),
(200, 'Antarctica/Davis'),
(201, 'Antarctica/DumontDUrville'),
(202, 'Antarctica/Macquarie'),
(203, 'Antarctica/Mawson'),
(204, 'Antarctica/McMurdo'),
(205, 'Antarctica/Palmer'),
(206, 'Antarctica/Rothera'),
(207, 'Antarctica/Syowa'),
(208, 'Antarctica/Troll'),
(209, 'Antarctica/Vostok'),
(210, 'Arctic/Longyearbyen'),
(211, 'Asia/Aden'),
(212, 'Asia/Almaty'),
(213, 'Asia/Amman'),
(214, 'Asia/Anadyr'),
(215, 'Asia/Aqtau'),
(216, 'Asia/Aqtobe'),
(217, 'Asia/Ashgabat'),
(218, 'Asia/Baghdad'),
(219, 'Asia/Bahrain'),
(220, 'Asia/Baku'),
(221, 'Asia/Bangkok'),
(222, 'Asia/Beirut'),
(223, 'Asia/Bishkek'),
(224, 'Asia/Brunei'),
(225, 'Asia/Choibalsan'),
(226, 'Asia/Chongqing'),
(227, 'Asia/Colombo'),
(228, 'Asia/Damascus'),
(229, 'Asia/Dhaka'),
(230, 'Asia/Dili'),
(231, 'Asia/Dubai'),
(232, 'Asia/Dushanbe'),
(233, 'Asia/Gaza'),
(234, 'Asia/Harbin'),
(235, 'Asia/Hebron'),
(236, 'Asia/Ho_Chi_Minh'),
(237, 'Asia/Hong_Kong'),
(238, 'Asia/Hovd'),
(239, 'Asia/Irkutsk'),
(240, 'Asia/Jakarta'),
(241, 'Asia/Jayapura'),
(242, 'Asia/Jerusalem'),
(243, 'Asia/Kabul'),
(244, 'Asia/Kamchatka'),
(245, 'Asia/Karachi'),
(246, 'Asia/Kashgar'),
(247, 'Asia/Kathmandu'),
(248, 'Asia/Khandyga'),
(249, 'Asia/Kolkata'),
(250, 'Asia/Krasnoyarsk'),
(251, 'Asia/Kuala_Lumpur'),
(252, 'Asia/Kuching'),
(253, 'Asia/Kuwait'),
(254, 'Asia/Macau'),
(255, 'Asia/Magadan'),
(256, 'Asia/Makassar'),
(257, 'Asia/Manila'),
(258, 'Asia/Muscat'),
(259, 'Asia/Nicosia'),
(260, 'Asia/Novokuznetsk'),
(261, 'Asia/Novosibirsk'),
(262, 'Asia/Omsk'),
(263, 'Asia/Oral'),
(264, 'Asia/Phnom_Penh'),
(265, 'Asia/Pontianak'),
(266, 'Asia/Pyongyang'),
(267, 'Asia/Qatar'),
(268, 'Asia/Qyzylorda'),
(269, 'Asia/Rangoon'),
(270, 'Asia/Riyadh'),
(271, 'Asia/Sakhalin'),
(272, 'Asia/Samarkand'),
(273, 'Asia/Seoul'),
(274, 'Asia/Shanghai'),
(275, 'Asia/Singapore'),
(276, 'Asia/Taipei'),
(277, 'Asia/Tashkent'),
(278, 'Asia/Tbilisi'),
(279, 'Asia/Tehran'),
(280, 'Asia/Thimphu'),
(281, 'Asia/Tokyo'),
(282, 'Asia/Ulaanbaatar'),
(283, 'Asia/Urumqi'),
(284, 'Asia/Ust-Nera'),
(285, 'Asia/Vientiane'),
(286, 'Asia/Vladivostok'),
(287, 'Asia/Yakutsk'),
(288, 'Asia/Yekaterinburg'),
(289, 'Asia/Yerevan'),
(290, 'Atlantic/Azores'),
(291, 'Atlantic/Bermuda'),
(292, 'Atlantic/Canary'),
(293, 'Atlantic/Cape_Verde'),
(294, 'Atlantic/Faroe'),
(295, 'Atlantic/Madeira'),
(296, 'Atlantic/Reykjavik'),
(297, 'Atlantic/South_Georgia'),
(298, 'Atlantic/St_Helena'),
(299, 'Atlantic/Stanley'),
(300, 'Australia/Adelaide'),
(301, 'Australia/Brisbane'),
(302, 'Australia/Broken_Hill'),
(303, 'Australia/Currie'),
(304, 'Australia/Darwin'),
(305, 'Australia/Eucla'),
(306, 'Australia/Hobart'),
(307, 'Australia/Lindeman'),
(308, 'Australia/Lord_Howe'),
(309, 'Australia/Melbourne'),
(310, 'Australia/Perth'),
(311, 'Australia/Sydney'),
(312, 'Europe/Amsterdam'),
(313, 'Europe/Andorra'),
(314, 'Europe/Athens'),
(315, 'Europe/Belgrade'),
(316, 'Europe/Berlin'),
(317, 'Europe/Bratislava'),
(318, 'Europe/Brussels'),
(319, 'Europe/Bucharest'),
(320, 'Europe/Budapest'),
(321, 'Europe/Busingen'),
(322, 'Europe/Chisinau'),
(323, 'Europe/Copenhagen'),
(324, 'Europe/Dublin'),
(325, 'Europe/Gibraltar'),
(326, 'Europe/Guernsey'),
(327, 'Europe/Helsinki'),
(328, 'Europe/Isle_of_Man'),
(329, 'Europe/Istanbul'),
(330, 'Europe/Jersey'),
(331, 'Europe/Kaliningrad'),
(332, 'Europe/Kiev'),
(333, 'Europe/Lisbon'),
(334, 'Europe/Ljubljana'),
(335, 'Europe/London'),
(336, 'Europe/Luxembourg'),
(337, 'Europe/Madrid'),
(338, 'Europe/Malta'),
(339, 'Europe/Mariehamn'),
(340, 'Europe/Minsk'),
(341, 'Europe/Monaco'),
(342, 'Europe/Moscow'),
(343, 'Europe/Oslo'),
(344, 'Europe/Paris'),
(345, 'Europe/Podgorica'),
(346, 'Europe/Prague'),
(347, 'Europe/Riga'),
(348, 'Europe/Rome'),
(349, 'Europe/Samara'),
(350, 'Europe/San_Marino'),
(351, 'Europe/Sarajevo'),
(352, 'Europe/Simferopol'),
(353, 'Europe/Skopje'),
(354, 'Europe/Sofia'),
(355, 'Europe/Stockholm'),
(356, 'Europe/Tallinn'),
(357, 'Europe/Tirane'),
(358, 'Europe/Uzhgorod'),
(359, 'Europe/Vaduz'),
(360, 'Europe/Vatican'),
(361, 'Europe/Vienna'),
(362, 'Europe/Vilnius'),
(363, 'Europe/Volgograd'),
(364, 'Europe/Warsaw'),
(365, 'Europe/Zagreb'),
(366, 'Europe/Zaporozhye'),
(367, 'Europe/Zurich'),
(368, 'Indian/Antananarivo'),
(369, 'Indian/Chagos'),
(370, 'Indian/Christmas'),
(371, 'Indian/Cocos'),
(372, 'Indian/Comoro'),
(373, 'Indian/Kerguelen'),
(374, 'Indian/Mahe'),
(375, 'Indian/Maldives'),
(376, 'Indian/Mauritius'),
(377, 'Indian/Mayotte'),
(378, 'Indian/Reunion'),
(379, 'Pacific/Apia'),
(380, 'Pacific/Auckland'),
(381, 'Pacific/Chatham'),
(382, 'Pacific/Chuuk'),
(383, 'Pacific/Easter'),
(384, 'Pacific/Efate'),
(385, 'Pacific/Enderbury'),
(386, 'Pacific/Fakaofo'),
(387, 'Pacific/Fiji'),
(388, 'Pacific/Funafuti'),
(389, 'Pacific/Galapagos'),
(390, 'Pacific/Gambier'),
(391, 'Pacific/Guadalcanal'),
(392, 'Pacific/Guam'),
(393, 'Pacific/Honolulu'),
(394, 'Pacific/Johnston'),
(395, 'Pacific/Kiritimati'),
(396, 'Pacific/Kosrae'),
(397, 'Pacific/Kwajalein'),
(398, 'Pacific/Majuro'),
(399, 'Pacific/Marquesas'),
(400, 'Pacific/Midway'),
(401, 'Pacific/Nauru'),
(402, 'Pacific/Niue'),
(403, 'Pacific/Norfolk'),
(404, 'Pacific/Noumea'),
(405, 'Pacific/Pago_Pago'),
(406, 'Pacific/Palau'),
(407, 'Pacific/Pitcairn'),
(408, 'Pacific/Pohnpei'),
(409, 'Pacific/Port_Moresby'),
(410, 'Pacific/Rarotonga'),
(411, 'Pacific/Saipan'),
(412, 'Pacific/Tahiti'),
(413, 'Pacific/Tarawa'),
(414, 'Pacific/Tongatapu'),
(415, 'Pacific/Wake'),
(416, 'Pacific/Wallis'),
(417, 'UTC');

-- --------------------------------------------------------

--
-- Table structure for table `pos_unit`
--

CREATE TABLE `pos_unit` (
  `unit_id` int(11) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `short_codes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_unit`
--

INSERT INTO `pos_unit` (`unit_id`, `unit`, `short_codes`) VALUES
(1, 'Kilogram', 'kg'),
(2, 'Litre', 'l'),
(3, 'Hour', 'hr'),
(4, 'Meter', 'm'),
(5, 'Number', 'nos');

-- --------------------------------------------------------

--
-- Table structure for table `pos_vendor`
--

CREATE TABLE `pos_vendor` (
  `vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(80) NOT NULL,
  `company_id` int(11) NOT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `gstin` varchar(45) DEFAULT NULL,
  `is_delete` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_vendor`
--

INSERT INTO `pos_vendor` (`vendor_id`, `vendor_name`, `company_id`, `contact_no`, `address`, `gstin`, `is_delete`) VALUES
(1, 'Tata', 1, NULL, NULL, NULL, 0),
(2, 'Bajaj', 1, NULL, NULL, NULL, 0),
(3, 'Guru Kripa', 1, NULL, NULL, NULL, 0),
(4, 'Ravi', 1, NULL, NULL, NULL, 0),
(5, 'Rav', 1, NULL, NULL, NULL, 0),
(6, 'Kunal', 1, NULL, NULL, NULL, 0),
(7, 'Dev\'s Bakery', 22, NULL, NULL, NULL, 0),
(8, 'v1', 3, NULL, NULL, NULL, 0),
(9, 'vtest', 1, NULL, NULL, NULL, 0),
(10, 'LG', 4, NULL, NULL, NULL, 0),
(11, 'Sony', 4, NULL, NULL, NULL, 0),
(12, 'Samsung', 4, NULL, NULL, NULL, 0),
(13, 'kamal', 26, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pos_wallet`
--

CREATE TABLE `pos_wallet` (
  `wallet_id` int(11) NOT NULL,
  `wallet_name` varchar(45) DEFAULT NULL,
  `wallet_detail` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_wallet`
--

INSERT INTO `pos_wallet` (`wallet_id`, `wallet_name`, `wallet_detail`) VALUES
(1, 'bingage', '{\"Authorization\":\"\"}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pos_admin`
--
ALTER TABLE `pos_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `pos_cash_counter`
--
ALTER TABLE `pos_cash_counter`
  ADD PRIMARY KEY (`cash_counter_id`);

--
-- Indexes for table `pos_company`
--
ALTER TABLE `pos_company`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `gstin_UNIQUE` (`gstin`);

--
-- Indexes for table `pos_company_wallet_integration`
--
ALTER TABLE `pos_company_wallet_integration`
  ADD PRIMARY KEY (`wallet_inte_id`);

--
-- Indexes for table `pos_customer`
--
ALTER TABLE `pos_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `pos_customer_recharge`
--
ALTER TABLE `pos_customer_recharge`
  ADD PRIMARY KEY (`recharge_id`);

--
-- Indexes for table `pos_device_communicate_with`
--
ALTER TABLE `pos_device_communicate_with`
  ADD PRIMARY KEY (`device_communicate_id`);

--
-- Indexes for table `pos_device_location`
--
ALTER TABLE `pos_device_location`
  ADD PRIMARY KEY (`device_location_id`);

--
-- Indexes for table `pos_device_management`
--
ALTER TABLE `pos_device_management`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `pos_device_type`
--
ALTER TABLE `pos_device_type`
  ADD PRIMARY KEY (`device_type_id`);

--
-- Indexes for table `pos_device_usage`
--
ALTER TABLE `pos_device_usage`
  ADD PRIMARY KEY (`device_usage_id`);

--
-- Indexes for table `pos_discount`
--
ALTER TABLE `pos_discount`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `pos_discount_location`
--
ALTER TABLE `pos_discount_location`
  ADD PRIMARY KEY (`discount_location_id`);

--
-- Indexes for table `pos_employee`
--
ALTER TABLE `pos_employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `pos_expense`
--
ALTER TABLE `pos_expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `pos_expense_type`
--
ALTER TABLE `pos_expense_type`
  ADD PRIMARY KEY (`expense_type_id`);

--
-- Indexes for table `pos_floor`
--
ALTER TABLE `pos_floor`
  ADD PRIMARY KEY (`floor_id`);

--
-- Indexes for table `pos_floor_type`
--
ALTER TABLE `pos_floor_type`
  ADD PRIMARY KEY (`floor_type_id`);

--
-- Indexes for table `pos_inventory_category`
--
ALTER TABLE `pos_inventory_category`
  ADD PRIMARY KEY (`inventory_category_id`);

--
-- Indexes for table `pos_inventory_category_discount`
--
ALTER TABLE `pos_inventory_category_discount`
  ADD PRIMARY KEY (`inventory_category_discount_id`);

--
-- Indexes for table `pos_inventory_category_tax`
--
ALTER TABLE `pos_inventory_category_tax`
  ADD PRIMARY KEY (`inventory_category_tax_id`);

--
-- Indexes for table `pos_inventory_stock`
--
ALTER TABLE `pos_inventory_stock`
  ADD PRIMARY KEY (`inventory_stock_id`);

--
-- Indexes for table `pos_inventory_stock_customfields`
--
ALTER TABLE `pos_inventory_stock_customfields`
  ADD PRIMARY KEY (`inventory_stock_customfield_id`);

--
-- Indexes for table `pos_inventory_stock_customfields_value`
--
ALTER TABLE `pos_inventory_stock_customfields_value`
  ADD PRIMARY KEY (`inventory_stock_customfields_value_id`);

--
-- Indexes for table `pos_inventory_stock_discount`
--
ALTER TABLE `pos_inventory_stock_discount`
  ADD PRIMARY KEY (`inventory_stock_discount_id`);

--
-- Indexes for table `pos_inventory_stock_discount_copy27apr`
--
ALTER TABLE `pos_inventory_stock_discount_copy27apr`
  ADD PRIMARY KEY (`inventory_stock_discount_id`);

--
-- Indexes for table `pos_inventory_stock_location`
--
ALTER TABLE `pos_inventory_stock_location`
  ADD PRIMARY KEY (`inventory_stock_location_id`);

--
-- Indexes for table `pos_inventory_stock_tax`
--
ALTER TABLE `pos_inventory_stock_tax`
  ADD PRIMARY KEY (`inventory_stock_tax_id`);

--
-- Indexes for table `pos_inventory_stock_tax_copy27apr`
--
ALTER TABLE `pos_inventory_stock_tax_copy27apr`
  ADD PRIMARY KEY (`inventory_stock_tax_id`);

--
-- Indexes for table `pos_inventory_stock_unit`
--
ALTER TABLE `pos_inventory_stock_unit`
  ADD PRIMARY KEY (`inventory_stock_unit_id`);

--
-- Indexes for table `pos_location`
--
ALTER TABLE `pos_location`
  ADD PRIMARY KEY (`location_id`),
  ADD UNIQUE KEY `gstin_UNIQUE` (`gstin`);

--
-- Indexes for table `pos_manufacture`
--
ALTER TABLE `pos_manufacture`
  ADD PRIMARY KEY (`manufacture_id`);

--
-- Indexes for table `pos_order_from`
--
ALTER TABLE `pos_order_from`
  ADD PRIMARY KEY (`order_from_id`);

--
-- Indexes for table `pos_payment_credential`
--
ALTER TABLE `pos_payment_credential`
  ADD PRIMARY KEY (`credential_id`);

--
-- Indexes for table `pos_payment_credential_copy`
--
ALTER TABLE `pos_payment_credential_copy`
  ADD PRIMARY KEY (`credential_id`);

--
-- Indexes for table `pos_payment_method`
--
ALTER TABLE `pos_payment_method`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indexes for table `pos_payment_split_type`
--
ALTER TABLE `pos_payment_split_type`
  ADD PRIMARY KEY (`payment_split_type_id`);

--
-- Indexes for table `pos_permission`
--
ALTER TABLE `pos_permission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `pos_preparation`
--
ALTER TABLE `pos_preparation`
  ADD PRIMARY KEY (`kitchen_id`);

--
-- Indexes for table `pos_product_type`
--
ALTER TABLE `pos_product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Indexes for table `pos_profit`
--
ALTER TABLE `pos_profit`
  ADD PRIMARY KEY (`profit_id`);

--
-- Indexes for table `pos_purchase_order`
--
ALTER TABLE `pos_purchase_order`
  ADD PRIMARY KEY (`purchase_order_id`);

--
-- Indexes for table `pos_purchase_order_payment_status`
--
ALTER TABLE `pos_purchase_order_payment_status`
  ADD PRIMARY KEY (`purchase_order_payment_status_id`);

--
-- Indexes for table `pos_purchase_order_status`
--
ALTER TABLE `pos_purchase_order_status`
  ADD PRIMARY KEY (`purchase_order_status_id`);

--
-- Indexes for table `pos_purchase_order_transaction`
--
ALTER TABLE `pos_purchase_order_transaction`
  ADD PRIMARY KEY (`purchase_order_transaction_id`);

--
-- Indexes for table `pos_recipe`
--
ALTER TABLE `pos_recipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_reservation_status`
--
ALTER TABLE `pos_reservation_status`
  ADD PRIMARY KEY (`reservation_status_id`);

--
-- Indexes for table `pos_sales_order`
--
ALTER TABLE `pos_sales_order`
  ADD PRIMARY KEY (`sales_order_id`);

--
-- Indexes for table `pos_sales_order_payment_split`
--
ALTER TABLE `pos_sales_order_payment_split`
  ADD PRIMARY KEY (`payment_split_id`);

--
-- Indexes for table `pos_sales_order_payment_status`
--
ALTER TABLE `pos_sales_order_payment_status`
  ADD PRIMARY KEY (`sales_order_payment_status_id`);

--
-- Indexes for table `pos_sales_order_status`
--
ALTER TABLE `pos_sales_order_status`
  ADD PRIMARY KEY (`sales_order_status_id`);

--
-- Indexes for table `pos_sales_order_transaction`
--
ALTER TABLE `pos_sales_order_transaction`
  ADD PRIMARY KEY (`sales_order_transaction_id`);

--
-- Indexes for table `pos_sales_order_type`
--
ALTER TABLE `pos_sales_order_type`
  ADD PRIMARY KEY (`order_type_id`);

--
-- Indexes for table `pos_subadmin_details`
--
ALTER TABLE `pos_subadmin_details`
  ADD PRIMARY KEY (`subadmin_id`);

--
-- Indexes for table `pos_table`
--
ALTER TABLE `pos_table`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `pos_tax`
--
ALTER TABLE `pos_tax`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `pos_tax_percenatge`
--
ALTER TABLE `pos_tax_percenatge`
  ADD PRIMARY KEY (`tax_percentage_id`);

--
-- Indexes for table `pos_timezone`
--
ALTER TABLE `pos_timezone`
  ADD PRIMARY KEY (`time_zone_id`);

--
-- Indexes for table `pos_unit`
--
ALTER TABLE `pos_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `pos_vendor`
--
ALTER TABLE `pos_vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `pos_wallet`
--
ALTER TABLE `pos_wallet`
  ADD PRIMARY KEY (`wallet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pos_admin`
--
ALTER TABLE `pos_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `pos_cash_counter`
--
ALTER TABLE `pos_cash_counter`
  MODIFY `cash_counter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;
--
-- AUTO_INCREMENT for table `pos_company`
--
ALTER TABLE `pos_company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `pos_company_wallet_integration`
--
ALTER TABLE `pos_company_wallet_integration`
  MODIFY `wallet_inte_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pos_customer`
--
ALTER TABLE `pos_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `pos_customer_recharge`
--
ALTER TABLE `pos_customer_recharge`
  MODIFY `recharge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pos_device_communicate_with`
--
ALTER TABLE `pos_device_communicate_with`
  MODIFY `device_communicate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pos_device_location`
--
ALTER TABLE `pos_device_location`
  MODIFY `device_location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pos_device_management`
--
ALTER TABLE `pos_device_management`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pos_device_type`
--
ALTER TABLE `pos_device_type`
  MODIFY `device_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pos_device_usage`
--
ALTER TABLE `pos_device_usage`
  MODIFY `device_usage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pos_discount`
--
ALTER TABLE `pos_discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `pos_discount_location`
--
ALTER TABLE `pos_discount_location`
  MODIFY `discount_location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `pos_employee`
--
ALTER TABLE `pos_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `pos_expense`
--
ALTER TABLE `pos_expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pos_expense_type`
--
ALTER TABLE `pos_expense_type`
  MODIFY `expense_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `pos_floor`
--
ALTER TABLE `pos_floor`
  MODIFY `floor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pos_inventory_category`
--
ALTER TABLE `pos_inventory_category`
  MODIFY `inventory_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `pos_inventory_category_discount`
--
ALTER TABLE `pos_inventory_category_discount`
  MODIFY `inventory_category_discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `pos_inventory_category_tax`
--
ALTER TABLE `pos_inventory_category_tax`
  MODIFY `inventory_category_tax_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `pos_inventory_stock`
--
ALTER TABLE `pos_inventory_stock`
  MODIFY `inventory_stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `pos_inventory_stock_customfields`
--
ALTER TABLE `pos_inventory_stock_customfields`
  MODIFY `inventory_stock_customfield_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pos_inventory_stock_customfields_value`
--
ALTER TABLE `pos_inventory_stock_customfields_value`
  MODIFY `inventory_stock_customfields_value_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pos_inventory_stock_discount`
--
ALTER TABLE `pos_inventory_stock_discount`
  MODIFY `inventory_stock_discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `pos_inventory_stock_discount_copy27apr`
--
ALTER TABLE `pos_inventory_stock_discount_copy27apr`
  MODIFY `inventory_stock_discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `pos_inventory_stock_location`
--
ALTER TABLE `pos_inventory_stock_location`
  MODIFY `inventory_stock_location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `pos_inventory_stock_tax`
--
ALTER TABLE `pos_inventory_stock_tax`
  MODIFY `inventory_stock_tax_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;
--
-- AUTO_INCREMENT for table `pos_inventory_stock_tax_copy27apr`
--
ALTER TABLE `pos_inventory_stock_tax_copy27apr`
  MODIFY `inventory_stock_tax_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `pos_inventory_stock_unit`
--
ALTER TABLE `pos_inventory_stock_unit`
  MODIFY `inventory_stock_unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `pos_location`
--
ALTER TABLE `pos_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `pos_manufacture`
--
ALTER TABLE `pos_manufacture`
  MODIFY `manufacture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pos_order_from`
--
ALTER TABLE `pos_order_from`
  MODIFY `order_from_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pos_payment_credential`
--
ALTER TABLE `pos_payment_credential`
  MODIFY `credential_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pos_payment_credential_copy`
--
ALTER TABLE `pos_payment_credential_copy`
  MODIFY `credential_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pos_payment_method`
--
ALTER TABLE `pos_payment_method`
  MODIFY `payment_method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pos_payment_split_type`
--
ALTER TABLE `pos_payment_split_type`
  MODIFY `payment_split_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pos_permission`
--
ALTER TABLE `pos_permission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `pos_preparation`
--
ALTER TABLE `pos_preparation`
  MODIFY `kitchen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `pos_product_type`
--
ALTER TABLE `pos_product_type`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pos_profit`
--
ALTER TABLE `pos_profit`
  MODIFY `profit_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pos_purchase_order`
--
ALTER TABLE `pos_purchase_order`
  MODIFY `purchase_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `pos_purchase_order_payment_status`
--
ALTER TABLE `pos_purchase_order_payment_status`
  MODIFY `purchase_order_payment_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pos_purchase_order_status`
--
ALTER TABLE `pos_purchase_order_status`
  MODIFY `purchase_order_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pos_purchase_order_transaction`
--
ALTER TABLE `pos_purchase_order_transaction`
  MODIFY `purchase_order_transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `pos_recipe`
--
ALTER TABLE `pos_recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pos_sales_order`
--
ALTER TABLE `pos_sales_order`
  MODIFY `sales_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1095;
--
-- AUTO_INCREMENT for table `pos_sales_order_payment_split`
--
ALTER TABLE `pos_sales_order_payment_split`
  MODIFY `payment_split_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `pos_sales_order_payment_status`
--
ALTER TABLE `pos_sales_order_payment_status`
  MODIFY `sales_order_payment_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pos_sales_order_status`
--
ALTER TABLE `pos_sales_order_status`
  MODIFY `sales_order_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pos_sales_order_transaction`
--
ALTER TABLE `pos_sales_order_transaction`
  MODIFY `sales_order_transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2345;
--
-- AUTO_INCREMENT for table `pos_sales_order_type`
--
ALTER TABLE `pos_sales_order_type`
  MODIFY `order_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pos_subadmin_details`
--
ALTER TABLE `pos_subadmin_details`
  MODIFY `subadmin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pos_table`
--
ALTER TABLE `pos_table`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pos_tax`
--
ALTER TABLE `pos_tax`
  MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `pos_tax_percenatge`
--
ALTER TABLE `pos_tax_percenatge`
  MODIFY `tax_percentage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `pos_timezone`
--
ALTER TABLE `pos_timezone`
  MODIFY `time_zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=418;
--
-- AUTO_INCREMENT for table `pos_unit`
--
ALTER TABLE `pos_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pos_vendor`
--
ALTER TABLE `pos_vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pos_wallet`
--
ALTER TABLE `pos_wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
