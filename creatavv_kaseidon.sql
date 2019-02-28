-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 29, 2018 at 06:49 AM
-- Server version: 5.5.61-38.13-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creatavv_kaseidon`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `comment_date` datetime NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `comment_date`, `parent_id`) VALUES
(1, 'Hello', '2013-03-01 10:10:10', 0),
(2, 'Bonjour', '2013-03-02 10:10:10', 0),
(3, 'How are you?', '2013-03-03 10:10:10', 1),
(4, 'I\'m fine thank you, and you?', '2013-03-04 10:10:10', 1),
(5, 'Ça va?', '2013-03-05 10:10:10', 2),
(6, 'Je vais bien, merci, et toi?', '2013-03-06 10:10:10', 2),
(7, 'Yes, not too bad thanks', '2013-03-07 10:10:10', 1),
(8, 'Oui, comme ci comme ça.', '2013-03-08 10:10:10', 2),
(9, 'Bon, à bientôt.', '2013-03-09 10:10:10', 2),
(10, 'See you soon', '2013-03-10 10:10:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ks_admin`
--

CREATE TABLE `ks_admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(50) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_admin`
--

INSERT INTO `ks_admin` (`admin_id`, `email`, `password`, `company_id`) VALUES
(1, 'ks_admin@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ks_comment`
--

CREATE TABLE `ks_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_creator_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `commented_by` int(11) NOT NULL COMMENT 'user id, who gave comment',
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_comment`
--

INSERT INTO `ks_comment` (`comment_id`, `parent_comment_id`, `company_id`, `post_id`, `post_creator_id`, `comment`, `commented_by`, `created_date`, `updated_date`) VALUES
(1, 0, 1, 25, 7, 'comment1', 6, '2018-07-09 01:09:00', '0000-00-00 00:00:00'),
(2, 1, 1, 25, 7, 'comment011', 1, '2018-07-09 03:00:00', '0000-00-00 00:00:00'),
(3, 1, 1, 25, 7, 'comment012', 2, '2018-07-09 04:00:00', '0000-00-00 00:00:00'),
(4, 0, 1, 25, 7, 'comment2', 6, '2018-07-09 07:00:00', '0000-00-00 00:00:00'),
(5, 0, 1, 25, 7, 'comment3', 5, '2018-07-09 08:00:00', '0000-00-00 00:00:00'),
(6, 4, 1, 25, 7, 'comment021', 4, '2018-07-09 10:00:00', '0000-00-00 00:00:00'),
(7, 4, 1, 25, 7, 'comment022', 2, '2018-07-09 11:00:00', '0000-00-00 00:00:00'),
(8, 4, 1, 25, 7, 'comment023', 1, '2018-07-09 12:00:00', '0000-00-00 00:00:00'),
(9, 2, 1, 25, 7, 'comment0111', 3, '2018-07-10 13:00:00', '0000-00-00 00:00:00'),
(13, 0, 1, 25, 7, 'Comment4', 7, '2018-07-11 11:44:27', '0000-00-00 00:00:00'),
(14, 0, 1, 25, 7, 'Comment5', 7, '2018-07-11 11:45:24', '0000-00-00 00:00:00'),
(15, 0, 1, 25, 7, 'Comment6', 7, '2018-07-11 11:46:08', '0000-00-00 00:00:00'),
(16, 0, 1, 25, 7, 'Comment7', 7, '2018-07-11 11:46:26', '0000-00-00 00:00:00'),
(17, 0, 1, 25, 7, 'Comment8', 7, '2018-07-11 11:57:19', '0000-00-00 00:00:00'),
(18, 0, 1, 25, 7, 'Comment9', 7, '2018-07-11 12:00:03', '0000-00-00 00:00:00'),
(19, 0, 1, 25, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam consequat, sem vel iaculis blandit, odio libero vehicula nunc, iaculis scelerisque justo nisi tristique dui. Donec egestas est quis nisi ', 7, '2018-07-11 12:18:37', '0000-00-00 00:00:00'),
(20, 8, 1, 25, 7, 'Comment0233', 7, '2018-07-21 11:59:12', '0000-00-00 00:00:00'),
(21, 7, 1, 25, 7, 'comment0222', 7, '2018-07-21 11:59:28', '0000-00-00 00:00:00'),
(22, 0, 1, 26, 7, 'MongoDB is a No SQL database. It is an open-source, cross-platform, document-oriented database written in C++.', 7, '2018-07-21 14:22:02', '0000-00-00 00:00:00'),
(23, 0, 1, 26, 7, 'MongoDB database such as insert documents, update documents, delete documents, query documents, projection, sort() and limit() methods, create collection, drop collection etc.', 2, '2018-07-21 14:28:25', '0000-00-00 00:00:00'),
(24, 22, 1, 26, 7, '\"Mongo DB is scalable, open source, high performance, document oriented database.\" - 10 gen', 2, '2018-07-21 14:29:20', '0000-00-00 00:00:00'),
(25, 0, 1, 27, 1, 'This is one of the well know payment gateway brands to use in the US market.', 1, '2018-07-21 14:51:30', '0000-00-00 00:00:00'),
(26, 25, 1, 27, 1, 'Looks good.', 1, '2018-07-21 14:51:42', '0000-00-00 00:00:00'),
(27, 0, 1, 27, 1, 'What this is all about?', 1, '2018-07-21 20:11:38', '0000-00-00 00:00:00'),
(28, 0, 1, 29, 7, 'Good images.', 1, '2018-07-21 20:20:34', '0000-00-00 00:00:00'),
(29, 0, 1, 2, 1, 'Good point', 1, '2018-07-21 20:50:46', '0000-00-00 00:00:00'),
(30, 0, 1, 38, 1, 'I can\'t see the table?', 1, '2018-08-04 12:49:24', '0000-00-00 00:00:00'),
(31, 0, 1, 41, 7, 'hiiii', 1, '2018-08-27 08:23:35', '2018-08-31 16:38:38'),
(32, 0, 1, 41, 7, 'test111', 3, '2018-08-28 11:29:32', '0000-00-00 00:00:00'),
(33, 0, 1, 30, 1, 'What\'s the rest of the story?', 2, '2018-08-30 01:11:37', '0000-00-00 00:00:00'),
(34, 0, 1, 33, 7, 'Good content', 1, '2018-08-31 16:03:57', '0000-00-00 00:00:00'),
(36, 31, 1, 41, 7, 'Hello', 7, '2018-08-31 19:29:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ks_company`
--

CREATE TABLE `ks_company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `domain_name` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_company`
--

INSERT INTO `ks_company` (`company_id`, `company_name`, `domain_name`, `created_date`) VALUES
(1, 'kaseidon', 'kaseidon', '2018-12-26 13:46:02'),
(2, 'cti', 'cti', '2018-12-26 13:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `ks_followed_post`
--

CREATE TABLE `ks_followed_post` (
  `followed_post_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `followed_by` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_creator_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_followed_post`
--

INSERT INTO `ks_followed_post` (`followed_post_id`, `company_id`, `followed_by`, `post_id`, `post_creator_id`, `created_date`) VALUES
(1, 1, 3, 1, 1, '2018-06-19 15:52:09'),
(2, 1, 7, 38, 1, '2018-08-18 14:00:09'),
(3, 1, 7, 35, 1, '2018-08-18 14:01:29'),
(4, 1, 2, 38, 1, '2018-08-19 02:51:12'),
(5, 1, 2, 37, 7, '2018-08-19 02:51:24'),
(6, 1, 2, 33, 7, '2018-08-19 02:52:35'),
(7, 1, 1, 37, 7, '2018-08-21 01:30:08'),
(8, 1, 1, 33, 7, '2018-08-21 15:35:55'),
(9, 1, 2, 40, 1, '2018-08-24 18:50:05'),
(22, 1, 1, 41, 7, '2018-10-16 23:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `ks_helpful_post`
--

CREATE TABLE `ks_helpful_post` (
  `helpful_post_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `helpful_by` int(11) NOT NULL COMMENT 'user_id who marked it helpful',
  `post_creator_id` int(11) NOT NULL,
  `helpful_type` tinyint(1) NOT NULL COMMENT 'Three levels of “helpful”: 1 low -- Thank you, 2 middle -- Made my day, 3 high - Life saving',
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_helpful_post`
--

INSERT INTO `ks_helpful_post` (`helpful_post_id`, `company_id`, `post_id`, `helpful_by`, `post_creator_id`, `helpful_type`, `created_date`) VALUES
(1, 1, 1, 3, 1, 1, '2018-06-19 09:23:04'),
(2, 1, 1, 3, 1, 2, '2018-06-19 09:26:02'),
(3, 1, 1, 3, 1, 3, '2018-06-19 09:26:05'),
(4, 1, 2, 3, 1, 1, '2018-06-19 09:26:25'),
(5, 1, 3, 3, 1, 3, '2018-06-19 09:26:40'),
(6, 1, 1, 5, 1, 1, '2018-06-20 09:28:42'),
(7, 1, 1, 6, 1, 3, '2018-06-20 10:29:13'),
(8, 1, 18, 6, 7, 2, '2018-06-25 11:59:28'),
(9, 1, 25, 1, 7, 2, '2018-07-13 15:39:31'),
(10, 1, 25, 1, 7, 1, '2018-07-13 15:39:40'),
(11, 1, 25, 1, 7, 3, '2018-07-13 15:39:45'),
(12, 1, 25, 10, 7, 3, '2018-07-13 15:41:22'),
(13, 1, 25, 10, 7, 2, '2018-07-13 15:41:25'),
(14, 1, 20, 7, 1, 1, '2018-07-16 06:30:43'),
(15, 1, 29, 1, 7, 3, '2018-07-21 20:11:52'),
(16, 1, 26, 1, 7, 2, '2018-07-21 20:39:33'),
(17, 1, 33, 1, 7, 3, '2018-07-29 02:43:21'),
(18, 1, 31, 1, 7, 3, '2018-08-02 23:23:51'),
(19, 1, 37, 1, 7, 2, '2018-08-03 18:32:34'),
(20, 1, 36, 1, 7, 1, '2018-08-04 12:51:27'),
(21, 1, 38, 2, 1, 2, '2018-08-19 02:50:39'),
(22, 1, 35, 2, 1, 3, '2018-08-19 02:57:50'),
(23, 1, 1, 2, 1, 1, '2018-08-24 19:16:08'),
(24, 1, 42, 2, 1, 2, '2018-08-30 00:53:09'),
(25, 1, 41, 1, 7, 3, '2018-09-05 17:23:52'),
(26, 1, 44, 1, 7, 3, '2018-09-15 22:07:14'),
(27, 1, 46, 2, 1, 3, '2018-09-22 16:35:02'),
(28, 1, 45, 2, 1, 2, '2018-09-23 03:23:15'),
(29, 1, 34, 5, 1, 3, '2018-09-25 02:47:31'),
(30, 1, 45, 7, 1, 2, '2018-10-02 00:55:52'),
(31, 1, 9, 1, 5, 3, '2018-10-02 04:54:14'),
(32, 1, 44, 2, 7, 2, '2018-10-13 18:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `ks_history`
--

CREATE TABLE `ks_history` (
  `history_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` varchar(150) NOT NULL,
  `history_type` tinyint(4) NOT NULL,
  `message` varchar(150) NOT NULL,
  `multi_user_ids` text NOT NULL,
  `date` datetime NOT NULL,
  `icon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_history`
--

INSERT INTO `ks_history` (`history_id`, `company_id`, `post_id`, `user_id`, `history_type`, `message`, `multi_user_ids`, `date`, `icon`) VALUES
(1, 1, 25, '7', 1, 'created the post', '', '2018-08-02 00:00:00', 'fa fa-user'),
(2, 1, 25, '7', 2, 'invited', '1,2,4,3', '2018-08-02 00:00:00', 'fa fa-user-plus'),
(3, 1, 25, '1,2,3,4', 3, 'became a co-owner of the post at', '', '2018-08-02 00:00:00', 'fa fa-user'),
(4, 1, 25, '7', 4, 'updated the post,', '', '2018-08-02 00:00:00', 'fa fa-calendar'),
(5, 1, 25, '7', 5, 'Post ownership transferred to', '1', '2018-08-02 00:00:00', 'fa fa-exchange'),
(6, 1, 25, '7', 6, 'transferred the ownership to', '2', '2018-08-02 00:00:00', 'fa fa-exchange'),
(7, 1, 70, '7', 1, '', '', '2018-08-03 10:30:14', ''),
(8, 1, 70, '7', 2, '', '1,2,3,4,5,6,8,9,10', '2018-08-03 10:30:14', ''),
(9, 1, 70, '1,2,3,4,5,6,8,9,10', 3, '', '', '2018-08-03 10:30:14', ''),
(10, 1, 70, '7', 4, '', '', '2018-08-03 12:19:37', ''),
(11, 1, 36, '7', 1, '', '', '2018-08-03 12:10:18', ''),
(12, 1, 36, '7', 2, '', '3,6,10', '2018-08-03 12:10:18', ''),
(13, 1, 36, '3,6,10', 3, '', '', '2018-08-03 12:10:18', ''),
(14, 1, 37, '7', 1, '', '', '2018-08-03 12:18:26', ''),
(15, 1, 37, '7', 2, '', '3,6,10', '2018-08-03 12:18:26', ''),
(16, 1, 37, '3,6,10', 3, '', '', '2018-08-03 12:18:26', ''),
(17, 1, 36, '7', 4, '', '', '2018-08-03 01:59:35', ''),
(18, 1, 36, '7', 4, '', '', '2018-08-03 02:03:17', ''),
(19, 1, 36, '7', 4, '', '', '2018-08-03 02:14:21', ''),
(20, 1, 36, '7', 4, '', '', '2018-08-03 02:18:27', ''),
(21, 1, 36, '7', 4, '', '', '2018-08-03 02:23:50', ''),
(22, 1, 36, '7', 4, '', '', '2018-08-03 02:38:49', ''),
(23, 1, 36, '7', 4, '', '', '2018-08-03 02:42:45', ''),
(24, 1, 38, '1', 1, '', '', '2018-08-04 12:40:18', ''),
(25, 1, 38, '1', 4, '', '', '2018-08-04 12:37:45', ''),
(26, 1, 38, '1', 4, '', '', '2018-08-04 01:04:05', ''),
(27, 1, 38, '1', 4, '', '', '2018-08-13 05:46:56', ''),
(28, 1, 38, '1', 4, '', '', '2018-08-13 05:49:36', ''),
(29, 1, 39, '1', 1, '', '', '2018-08-18 03:44:10', ''),
(30, 1, 39, '1', 2, '', '2', '2018-08-18 03:44:10', ''),
(31, 1, 39, '2', 3, '', '', '2018-08-18 03:44:10', ''),
(32, 1, 39, '1', 4, '', '', '2018-08-18 03:55:01', ''),
(33, 1, 39, '1', 4, '', '', '2018-08-18 06:16:32', ''),
(34, 1, 39, '1', 4, '', '', '2018-08-18 06:17:28', ''),
(35, 1, 39, '1', 4, '', '', '2018-08-18 06:22:28', ''),
(36, 1, 39, '1', 4, '', '', '2018-08-19 01:28:22', ''),
(37, 1, 40, '1', 1, '', '', '2018-08-23 03:36:58', ''),
(38, 1, 40, '1', 2, '', '5,6,7,8,9,10', '2018-08-23 03:36:58', ''),
(39, 1, 40, '5,6,7,8,9,10', 3, '', '', '2018-08-23 03:36:58', ''),
(40, 1, 41, '7', 1, '', '', '2018-08-24 02:26:06', ''),
(41, 1, 41, '7', 2, '', '5,6', '2018-08-24 02:26:06', ''),
(42, 1, 41, '5,6', 3, '', '', '2018-08-24 02:26:06', ''),
(43, 1, 40, '1', 4, '', '', '2018-08-24 02:33:52', ''),
(44, 1, 40, '1', 4, '', '', '2018-08-24 02:36:55', ''),
(45, 1, 40, '1', 4, '', '', '2018-08-24 06:49:31', ''),
(46, 1, 35, '1', 4, '', '', '2018-08-24 08:21:53', ''),
(47, 1, 38, '1', 4, '', '', '2018-08-24 09:38:07', ''),
(48, 1, 38, '1', 4, '', '', '2018-08-24 09:39:19', ''),
(49, 1, 42, '1', 1, '', '', '2018-08-25 01:07:28', ''),
(50, 1, 40, '1', 4, '', '', '2018-08-25 07:09:46', ''),
(51, 1, 40, '1', 4, '', '', '2018-08-25 07:10:44', ''),
(52, 1, 38, '1', 4, '', '', '2018-08-26 09:01:09', ''),
(53, 1, 38, '1', 4, '', '', '2018-08-27 08:20:46', ''),
(54, 1, 38, '1', 4, '', '', '2018-08-27 08:27:30', ''),
(55, 1, 38, '1', 4, '', '', '2018-08-27 08:28:16', ''),
(56, 1, 1, '1', 4, '', '', '2018-08-30 12:40:03', ''),
(57, 1, 9, '1', 4, '', '', '2018-08-31 04:24:12', ''),
(58, 1, 9, '1', 5, '', '5', '2018-08-31 04:24:12', ''),
(59, 1, 9, '1', 6, '', '5', '2018-08-31 04:24:12', ''),
(60, 1, 40, '1', 4, '', '', '2018-08-31 06:49:09', ''),
(61, 1, 40, '1', 4, '', '', '2018-08-31 07:40:05', ''),
(62, 1, 40, '1', 5, '', '5', '2018-08-31 07:40:05', ''),
(63, 1, 40, '1', 6, '', '5', '2018-08-31 07:40:05', ''),
(64, 1, 39, '1', 4, '', '', '2018-09-02 07:18:36', ''),
(65, 1, 41, '7', 4, '', '', '2018-09-03 06:13:03', ''),
(66, 1, 41, '7', 4, '', '', '2018-09-03 06:14:53', ''),
(67, 1, 38, '1', 4, '', '', '2018-09-07 05:35:49', ''),
(68, 1, 40, '5', 4, '', '', '2018-09-08 03:43:14', ''),
(69, 1, 40, '5', 5, '', '1', '2018-09-08 03:43:14', ''),
(70, 1, 40, '5', 6, '', '1', '2018-09-08 03:43:14', ''),
(71, 1, 30, '1', 4, '', '', '2018-09-08 03:50:25', ''),
(72, 1, 40, '1', 4, '', '', '2018-09-08 06:48:42', ''),
(73, 1, 40, '2', 4, '', '', '2018-09-08 07:07:02', ''),
(74, 1, 40, '1', 4, '', '', '2018-09-08 07:08:47', ''),
(75, 1, 40, '1', 4, '', '', '2018-09-08 07:09:54', ''),
(76, 1, 40, '1', 4, '', '', '2018-09-08 07:13:25', ''),
(77, 1, 40, '5', 4, '', '', '2018-09-08 07:16:27', ''),
(78, 1, 40, '1', 4, '', '', '2018-09-08 07:22:54', ''),
(79, 1, 40, '2', 4, '', '', '2018-09-08 07:23:33', ''),
(80, 1, 43, '1', 1, '', '', '2018-09-09 08:36:05', ''),
(81, 1, 43, '1', 4, '', '', '2018-09-09 08:37:51', ''),
(82, 1, 40, '1', 4, '', '', '2018-09-13 11:35:23', ''),
(83, 1, 40, '2', 4, '', '', '2018-09-13 11:40:00', ''),
(84, 1, 40, '1', 4, '', '', '2018-09-13 12:08:29', ''),
(85, 1, 40, '2', 4, '', '', '2018-09-13 12:28:48', ''),
(86, 1, 43, '1', 4, '', '', '2018-09-15 03:14:55', ''),
(87, 1, 43, '1', 4, '', '', '2018-09-15 03:16:50', ''),
(88, 1, 35, '1', 4, '', '', '2018-09-15 03:27:33', ''),
(89, 1, 35, '1', 4, '', '', '2018-09-15 03:47:49', ''),
(90, 1, 36, '7', 4, '', '', '2018-09-15 06:44:11', ''),
(91, 1, 36, '7', 4, '', '', '2018-09-15 06:44:42', ''),
(92, 1, 36, '7', 4, '', '', '2018-09-15 06:46:03', ''),
(93, 1, 37, '7', 4, '', '', '2018-09-15 06:47:26', ''),
(94, 1, 37, '7', 4, '', '', '2018-09-15 06:48:35', ''),
(95, 1, 32, '7', 4, '', '', '2018-09-15 07:19:03', ''),
(96, 1, 44, '7', 1, '', '', '2018-09-15 07:24:54', ''),
(97, 1, 44, '7', 4, '', '', '2018-09-15 07:25:19', ''),
(98, 1, 44, '7', 4, '', '', '2018-09-15 07:26:09', ''),
(99, 1, 44, '7', 4, '', '', '2018-09-15 07:28:12', ''),
(100, 1, 44, '7', 4, '', '', '2018-09-15 07:31:28', ''),
(101, 1, 44, '7', 4, '', '', '2018-09-15 07:55:46', ''),
(102, 1, 44, '7', 4, '', '', '2018-09-15 07:57:55', ''),
(103, 1, 44, '7', 4, '', '', '2018-09-15 07:58:34', ''),
(104, 1, 44, '7', 4, '', '', '2018-09-15 08:02:47', ''),
(105, 1, 13, '1', 4, '', '', '2018-09-15 08:43:13', ''),
(106, 1, 40, '1', 4, '', '', '2018-09-15 08:48:02', ''),
(107, 1, 40, '2', 4, '', '', '2018-09-15 08:48:42', ''),
(108, 1, 43, '1', 4, '', '', '2018-09-15 09:16:13', ''),
(109, 1, 40, '1', 4, '', '', '2018-09-15 09:17:23', ''),
(110, 1, 43, '1', 4, '', '', '2018-09-15 09:28:04', ''),
(111, 1, 44, '7', 4, '', '', '2018-09-18 01:21:44', ''),
(112, 1, 44, '7', 4, '', '', '2018-09-18 01:23:14', ''),
(113, 1, 44, '7', 4, '', '', '2018-09-18 01:27:18', ''),
(114, 1, 43, '1', 4, '', '', '2018-09-21 06:53:31', ''),
(115, 1, 43, '1', 4, '', '', '2018-09-22 01:26:50', ''),
(116, 1, 9, '5', 4, '', '', '2018-09-22 01:27:46', ''),
(117, 1, 43, '1', 4, '', '', '2018-09-22 01:52:07', ''),
(118, 1, 45, '1', 1, '', '', '2018-09-22 02:28:23', ''),
(119, 1, 46, '1', 1, '', '', '2018-09-22 02:49:57', ''),
(120, 1, 47, '1', 1, '', '', '2018-09-22 02:58:23', ''),
(121, 1, 43, '5', 4, '', '', '2018-09-22 03:27:55', ''),
(122, 1, 45, '1', 4, '', '', '2018-09-23 03:33:04', ''),
(123, 1, 43, '1', 4, '', '', '2018-09-23 03:42:45', ''),
(124, 1, 43, '1', 4, '', '', '2018-09-25 02:19:09', ''),
(125, 1, 24, '1', 4, '', '', '2018-10-01 03:05:33', ''),
(126, 1, 45, '1', 4, '', '', '2018-10-01 03:08:03', ''),
(127, 1, 43, '1', 4, '', '', '2018-10-02 12:07:18', ''),
(128, 1, 44, '7', 4, '', '', '2018-10-02 12:40:37', ''),
(129, 1, 45, '1', 4, '', '', '2018-10-02 12:45:31', ''),
(130, 1, 45, '1', 4, '', '', '2018-10-02 01:17:18', ''),
(131, 1, 45, '1', 4, '', '', '2018-10-02 01:21:13', ''),
(132, 1, 45, '1', 4, '', '', '2018-10-02 01:26:00', ''),
(133, 1, 45, '1', 4, '', '', '2018-10-02 01:26:00', ''),
(134, 1, 45, '1', 4, '', '', '2018-10-02 02:33:15', ''),
(135, 1, 43, '1', 4, '', '', '2018-10-02 02:37:44', ''),
(136, 1, 45, '2', 4, '', '', '2018-10-02 04:39:45', ''),
(137, 1, 45, '1', 4, '', '', '2018-10-03 01:02:59', ''),
(138, 1, 45, '1', 4, '', '', '2018-10-03 01:11:33', ''),
(139, 1, 45, '2', 4, '', '', '2018-10-03 01:11:47', ''),
(140, 1, 45, '1', 4, '', '', '2018-10-03 01:28:03', ''),
(141, 1, 45, '1', 4, '', '', '2018-10-13 06:52:48', ''),
(142, 1, 48, '1', 1, '', '', '2018-10-13 06:54:24', ''),
(143, 1, 48, '1', 4, '', '', '2018-10-13 07:34:23', ''),
(144, 1, 45, '1', 4, '', '', '2018-10-13 07:48:30', ''),
(145, 1, 48, '1', 4, '', '', '2018-10-16 12:41:04', ''),
(146, 1, 45, '1', 4, '', '', '2018-10-16 12:58:09', ''),
(147, 1, 44, '7', 4, '', '', '2018-10-16 10:45:17', ''),
(148, 1, 48, '1', 4, '', '', '2018-10-16 11:17:22', ''),
(149, 1, 48, '1', 4, '', '', '2018-10-16 11:19:04', ''),
(150, 1, 48, '1', 4, '', '', '2018-10-16 11:54:52', ''),
(151, 1, 48, '1', 4, '', '', '2018-10-30 12:42:23', ''),
(152, 1, 45, '1', 4, '', '', '2018-11-17 09:02:06', ''),
(153, 1, 49, '1', 1, '', '', '2018-11-20 02:10:41', ''),
(154, 1, 50, '1', 1, '', '', '2018-11-22 04:03:30', ''),
(155, 1, 50, '1', 4, '', '', '2018-11-22 04:08:03', ''),
(156, 1, 51, '1', 1, '', '', '2018-11-23 03:14:57', ''),
(157, 1, 51, '1', 4, '', '', '2018-11-23 03:18:31', ''),
(158, 1, 52, '1', 1, '', '', '2018-11-27 10:34:23', ''),
(159, 1, 53, '1', 1, '', '', '2018-11-27 03:40:52', ''),
(160, 1, 45, '1', 4, '', '', '2018-12-03 03:30:36', ''),
(161, 1, 54, '1', 1, '', '', '2018-12-14 02:25:47', ''),
(162, 1, 54, '1', 2, '', '3,8', '2018-12-14 02:25:47', ''),
(163, 1, 54, '3,8', 3, '', '', '2018-12-14 02:25:47', ''),
(164, 1, 54, '1', 4, '', '', '2018-12-20 04:25:44', ''),
(165, 1, 55, '1', 1, '', '', '2018-12-21 05:43:30', ''),
(166, 1, 55, '1', 4, '', '', '2018-12-22 06:12:48', ''),
(167, 1, 55, '1', 4, '', '', '2018-12-22 06:13:16', ''),
(168, 1, 55, '1', 4, '', '', '2018-12-22 06:13:41', ''),
(169, 1, 55, '1', 4, '', '', '2018-12-22 06:13:58', ''),
(170, 1, 55, '1', 4, '', '', '2018-12-22 06:15:43', ''),
(171, 1, 55, '1', 4, '', '', '2018-12-22 06:30:49', ''),
(172, 1, 55, '1', 4, '', '', '2018-12-22 06:32:37', ''),
(173, 1, 55, '1', 4, '', '', '2018-12-22 06:36:16', ''),
(174, 1, 55, '1', 4, '', '', '2018-12-22 06:36:46', ''),
(175, 1, 55, '1', 4, '', '', '2018-12-22 06:37:08', ''),
(176, 1, 55, '1', 4, '', '', '2018-12-22 06:37:47', ''),
(177, 1, 55, '1', 4, '', '', '2018-12-22 06:37:54', ''),
(178, 1, 55, '1', 4, '', '', '2018-12-22 06:38:03', ''),
(179, 1, 55, '1', 4, '', '', '2018-12-22 06:38:15', ''),
(180, 1, 55, '1', 4, '', '', '2018-12-22 06:38:29', ''),
(181, 1, 55, '1', 4, '', '', '2018-12-22 06:38:38', ''),
(182, 1, 55, '1', 4, '', '', '2018-12-22 08:57:40', ''),
(183, 1, 55, '1', 4, '', '', '2018-12-22 08:57:56', ''),
(184, 1, 55, '1', 4, '', '', '2018-12-22 08:58:12', ''),
(185, 1, 55, '1', 4, '', '', '2018-12-24 07:05:55', ''),
(186, 1, 56, '1', 1, '', '', '2018-12-25 11:38:15', ''),
(187, 1, 56, '1', 2, '', '2,4', '2018-12-25 11:38:15', ''),
(188, 1, 56, '2,4', 3, '', '', '2018-12-25 11:38:15', ''),
(189, 1, 56, '1', 4, '', '', '2018-12-26 01:40:55', ''),
(190, 1, 55, '1', 4, '', '', '2018-12-26 03:16:55', ''),
(191, 1, 56, '1', 4, '', '', '2018-12-27 12:52:55', ''),
(192, 1, 56, '1', 4, '', '', '2018-12-28 04:03:26', ''),
(193, 1, 56, '1', 4, '', '', '2018-12-28 04:06:12', '');

-- --------------------------------------------------------

--
-- Table structure for table `ks_label`
--

CREATE TABLE `ks_label` (
  `label_id` int(11) NOT NULL,
  `label_parent_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `label_creator_id` int(11) NOT NULL,
  `label_name` varchar(200) NOT NULL,
  `visible_to` text NOT NULL,
  `inherit_visibility` tinyint(1) NOT NULL COMMENT 'Inherit the visibility list from parent to override the current list ',
  `merge_label_status` tinyint(4) NOT NULL COMMENT '1 request for merge, 2 accept request, 3 decline request',
  `request_for_merge_by` int(11) NOT NULL COMMENT 'user id who request for merge',
  `merge_for_label_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_label`
--

INSERT INTO `ks_label` (`label_id`, `label_parent_id`, `company_id`, `label_creator_id`, `label_name`, `visible_to`, `inherit_visibility`, `merge_label_status`, `request_for_merge_by`, `merge_for_label_id`) VALUES
(1, 0, 1, 1, 'L1', '', 0, 0, 0, 0),
(2, 1, 1, 1, 'L2', '2,5', 0, 0, 0, 0),
(3, 1, 1, 1, 'L3', '', 0, 0, 0, 0),
(4, 2, 1, 1, 'L51', '', 1, 0, 0, 0),
(5, 0, 1, 1, 'L101', '', 0, 0, 0, 0),
(6, 5, 1, 1, 'L102', '', 0, 0, 0, 0),
(7, 5, 1, 1, 'L103', '', 0, 0, 0, 0),
(8, 7, 1, 1, 'L104', '', 0, 0, 0, 0),
(9, 0, 1, 1, 'L4', '', 0, 0, 0, 0),
(10, 9, 1, 1, 'L5', '5', 0, 0, 0, 0),
(11, 10, 1, 1, 'L6', '', 0, 0, 0, 0),
(12, 11, 1, 1, 'L7', '', 0, 0, 0, 0),
(13, 4, 1, 1, 'L8', '8', 0, 0, 0, 0),
(14, 9, 1, 1, 'L9', '3,4,7', 1, 0, 0, 0),
(15, 5, 1, 1, 'L10', '6,9,10', 0, 0, 0, 0),
(16, 4, 1, 1, 'L11', '3,6,7', 1, 0, 0, 0),
(17, 0, 1, 3, 'Food', '6,9', 1, 0, 0, 0),
(18, 17, 1, 3, 'Organic', '2', 0, 0, 0, 0),
(19, 17, 1, 3, 'Conventional', '1,2,4,5,6,7,8,9,10', 0, 0, 0, 0),
(20, 18, 1, 3, 'gardening', '1,2,4,5,6,7,8,9,10', 1, 0, 0, 0),
(21, 0, 1, 6, 'Football', '1,2,3,4,5,7,8,9,10', 1, 0, 0, 0),
(22, 0, 1, 6, 'C++', '1,2,3,4,5,7,8,9,10', 1, 0, 0, 0),
(23, 22, 1, 6, 'Object Oriented', '1,2,3,4,5,7,8,9,10', 1, 0, 0, 0),
(24, 0, 1, 7, 'Forest', '2,3,6', 1, 0, 0, 0),
(25, 24, 1, 7, 'Ant', '4,8,9', 1, 0, 0, 0),
(26, 0, 1, 7, 'Nature', '', 0, 0, 0, 0),
(27, 21, 1, 7, 'Soccer Rule', '3,6,10', 1, 0, 0, 0),
(28, 0, 1, 6, 'Building', '', 0, 0, 0, 0),
(29, 0, 1, 6, 'Angular', '3,4', 1, 0, 0, 0),
(30, 21, 1, 1, 'FIFA', '6,7', 1, 0, 0, 0),
(31, 0, 1, 7, 'Javascript', '', 0, 0, 0, 0),
(32, 29, 1, 7, 'Type-Script', '1,9', 1, 0, 0, 0),
(33, 0, 1, 7, 'Area51', '1,2,3,4,5,6,8,9,10', 0, 0, 0, 0),
(34, 29, 1, 7, 'Angular 2', '1,4', 1, 0, 0, 0),
(35, 29, 1, 7, 'Angular 4', '1,4,9', 1, 0, 0, 0),
(37, 36, 1, 7, 'Hollywood', '1,2,3,4,5,6,8,9,10', 1, 0, 0, 0),
(38, 36, 1, 7, 'Bollywood', '1,2,3,4,5,6,8,9,10', 1, 0, 0, 0),
(39, 0, 1, 7, 'Node', '2,3,4,5,6,7,8,9,10,1', 1, 2, 0, 0),
(40, 0, 1, 1, 'Jack\'s Label', '1,2,3,4,5,6,8,9,10,', 0, 2, 0, 0),
(43, 0, 1, 7, 'Language', '1,2,3,4,5,6,8,9,10', 0, 0, 0, 0),
(44, 0, 1, 1, 'Test', '', 0, 0, 0, 0),
(45, 44, 1, 1, 'Conventional', '', 0, 0, 0, 0),
(49, 0, 1, 1, 'Quarterly Performance Report', '', 0, 0, 0, 0),
(52, 2, 1, 2, 'L2.Lucky', '', 0, 0, 0, 0),
(53, 0, 1, 7, 'Movies', '', 0, 0, 0, 0),
(54, 0, 1, 1, 'Reference', '', 0, 0, 0, 0),
(58, 44, 1, 1, 'This is a nested test lable under a long long long long name', '', 0, 0, 0, 0),
(62, 61, 1, 1, 'Conventional', '', 0, 0, 0, 0),
(63, 45, 1, 1, 'Test', '', 0, 0, 0, 0),
(66, 0, 1, 1, 'Employees', '2,3,4,5,6,7,8,9,10,11', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ks_notification`
--

CREATE TABLE `ks_notification` (
  `notification_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notify_by` int(11) NOT NULL,
  `notification_msg_id` int(11) NOT NULL,
  `notification_msg` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `label_id` int(11) NOT NULL,
  `label_btn_status` tinyint(4) NOT NULL,
  `read_status` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_notification`
--

INSERT INTO `ks_notification` (`notification_id`, `company_id`, `user_id`, `notify_by`, `notification_msg_id`, `notification_msg`, `post_id`, `label_id`, `label_btn_status`, `read_status`, `created_date`) VALUES
(1, 1, 1, 7, 2, 'Follow your post', 38, 0, 0, 0, '2018-08-18 14:00:09'),
(2, 1, 1, 7, 2, 'Follow your post', 35, 0, 0, 0, '2018-08-18 14:01:29'),
(3, 1, 1, 2, 3, 'Mark helpful your post', 38, 0, 0, 0, '2018-08-19 02:50:39'),
(4, 1, 1, 2, 2, 'Follow your post', 38, 0, 0, 0, '2018-08-19 02:51:12'),
(5, 1, 7, 2, 2, 'Follow your post', 37, 0, 0, 0, '2018-08-19 02:51:24'),
(6, 1, 7, 2, 2, 'Follow your post', 33, 0, 0, 0, '2018-08-19 02:52:35'),
(7, 1, 1, 2, 3, 'Mark helpful your post', 35, 0, 0, 0, '2018-08-19 02:57:50'),
(8, 1, 7, 1, 2, 'Follow your post', 37, 0, 0, 0, '2018-08-21 01:30:08'),
(9, 1, 7, 1, 2, 'Follow your post', 33, 0, 0, 0, '2018-08-21 15:35:55'),
(10, 1, 1, 2, 2, 'Follow your post', 40, 0, 0, 0, '2018-08-24 18:50:05'),
(11, 1, 1, 2, 3, 'Mark helpful your post', 1, 0, 0, 0, '2018-08-24 19:16:08'),
(12, 1, 7, 1, 1, 'Commented on your post', 41, 0, 0, 0, '2018-08-27 08:23:35'),
(13, 1, 7, 3, 1, 'Commented on your post', 41, 0, 0, 0, '2018-08-28 11:29:32'),
(14, 1, 1, 2, 3, 'Mark helpful your post', 42, 0, 0, 0, '2018-08-30 00:53:09'),
(15, 1, 1, 2, 1, 'Commented on your post', 30, 0, 0, 0, '2018-08-30 01:11:37'),
(16, 1, 7, 1, 1, 'Commented on your post', 33, 0, 0, 0, '2018-08-31 16:03:57'),
(17, 1, 5, 1, 7, 'Transfer posts ownership to you', 9, 0, 0, 0, '2018-08-31 16:24:12'),
(18, 1, 7, 1, 4, 'Merge Label', 0, 39, 1, 0, '2018-08-31 16:28:55'),
(19, 1, 1, 7, 5, '', 0, 39, 0, 0, '2018-08-31 16:32:19'),
(20, 1, 7, 1, 1, 'Commented on your post', 41, 0, 0, 0, '2018-08-31 16:38:46'),
(21, 1, 5, 1, 7, 'Transfer posts ownership to you', 40, 0, 0, 0, '2018-08-31 19:40:05'),
(22, 1, 1, 7, 4, 'Merge Label', 0, 40, 1, 0, '2018-09-03 18:04:56'),
(23, 1, 7, 1, 5, '', 0, 40, 0, 0, '2018-09-03 18:09:03'),
(24, 1, 7, 1, 0, 'Mark helpful your post', 41, 0, 0, 0, '2018-09-05 17:23:52'),
(25, 1, 1, 5, 0, 'Transfer posts ownership to you', 40, 0, 0, 0, '2018-09-08 15:43:14'),
(26, 1, 2, 7, 0, 'Merge Label - MongoDB to your label - Test.Lucky', 0, 50, 0, 0, '2018-09-08 19:38:42'),
(27, 1, 7, 1, 0, 'Follow your post', 41, 0, 0, 0, '2018-09-15 18:41:20'),
(28, 1, 7, 1, 0, 'Mark helpful your post', 44, 0, 0, 0, '2018-09-15 22:07:14'),
(29, 1, 7, 2, 0, 'Follow your post', 44, 0, 0, 0, '2018-09-22 13:16:38'),
(30, 1, 7, 1, 0, 'Follow your post', 44, 0, 0, 0, '2018-09-22 14:30:21'),
(31, 1, 1, 1, 0, ' (Jack Sp) Merged Test to Test', 0, 56, 0, 0, '2018-09-22 16:23:38'),
(32, 1, 1, 1, 0, ' (Jack Sp) Merged Test to Test', 0, 44, 0, 0, '2018-09-22 16:24:17'),
(33, 1, 1, 2, 0, 'Mark helpful your post', 46, 0, 0, 0, '2018-09-22 16:35:02'),
(34, 1, 1, 2, 0, 'Mark helpful your post', 45, 0, 0, 0, '2018-09-23 03:23:15'),
(35, 1, 1, 5, 0, 'Mark helpful your post', 34, 0, 0, 0, '2018-09-25 02:47:31'),
(36, 1, 1, 7, 0, 'Mark helpful your post', 45, 0, 0, 0, '2018-10-02 00:55:52'),
(37, 1, 7, 1, 0, 'Follow your post', 44, 0, 0, 1, '2018-10-02 04:01:04'),
(38, 1, 5, 1, 0, ' (Jack Sp) Mark helpful your post ', 9, 0, 0, 0, '2018-10-02 04:54:14'),
(39, 1, 7, 2, 0, 'Mark helpful your post', 44, 0, 0, 1, '2018-10-13 18:58:12'),
(40, 1, 7, 1, 0, 'Follow your post', 44, 0, 0, 1, '2018-10-15 06:31:54'),
(41, 1, 7, 1, 0, 'Follow your post', 44, 0, 0, 1, '2018-10-15 06:55:06'),
(42, 1, 7, 1, 0, 'Follow your post', 44, 0, 0, 1, '2018-10-15 07:01:28'),
(43, 1, 7, 1, 0, 'Follow your post', 44, 0, 0, 1, '2018-10-15 07:34:08'),
(44, 1, 7, 1, 0, 'Follow your post', 44, 0, 0, 1, '2018-10-15 07:38:42'),
(45, 1, 7, 1, 0, 'Follow your post', 44, 0, 0, 1, '2018-10-15 07:39:54'),
(46, 1, 7, 1, 0, 'Follow your post', 44, 0, 0, 1, '2018-10-15 07:41:24'),
(47, 1, 3, 1, 0, ' (Jack Sp) Merged Food to Food', 0, 17, 0, 0, '2018-10-15 23:08:39'),
(48, 1, 1, 1, 0, ' (Jack Sp) Merged Test to Conventional', 0, 45, 0, 0, '2018-10-16 00:41:34'),
(49, 1, 7, 1, 0, 'Follow your post', 41, 0, 0, 1, '2018-10-16 23:27:51'),
(50, 1, 7, 1, 0, ' (Jack Sp) Merged Test.Lucky to Area51', 0, 33, 0, 1, '2018-10-16 23:34:52'),
(51, 1, 5, 0, 0, '<span class=\"name\">Admin</span> remove post(1. Title 1)', 1, 0, 0, 1, '2018-11-27 15:47:16'),
(52, 1, 1, 0, 0, '<span class=\"name\">Admin</span> remove post(1. Title 1)', 1, 0, 0, 0, '2018-11-27 15:47:16'),
(53, 1, 7, 1, 0, 'Follow your post', 31, 0, 0, 1, '2018-12-01 03:02:33'),
(54, 1, 4, 0, 0, '<span class=\"name\">Admin</span> remove post(32. Post type listing)', 32, 0, 0, 1, '2018-12-01 03:05:56'),
(55, 1, 7, 0, 0, '<span class=\"name\">Admin</span> remove post(32. Post type listing)', 32, 0, 0, 1, '2018-12-01 03:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `ks_notification_msg`
--

CREATE TABLE `ks_notification_msg` (
  `notification_msg_id` int(11) NOT NULL,
  `notification_msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_notification_msg`
--

INSERT INTO `ks_notification_msg` (`notification_msg_id`, `notification_msg`) VALUES
(1, 'Commented on your post'),
(2, 'Follow your post'),
(3, 'Mark helpful your post'),
(4, 'Request for merge'),
(5, 'Accept request for merge'),
(6, 'Decline request for merge'),
(7, 'Transfer posts ownership to you.');

-- --------------------------------------------------------

--
-- Table structure for table `ks_post`
--

CREATE TABLE `ks_post` (
  `post_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `post_creator_id` int(11) NOT NULL,
  `post_type` tinyint(2) NOT NULL,
  `title` varchar(150) NOT NULL,
  `tagged_labels` varchar(200) NOT NULL,
  `co_owners` varchar(100) NOT NULL,
  `visibility` text NOT NULL,
  `publish` tinyint(1) NOT NULL COMMENT '1 not published and 0 published',
  `post_override` tinyint(1) NOT NULL,
  `content_request_status` tinyint(1) NOT NULL,
  `content_request_quiz` text NOT NULL,
  `short_description` text NOT NULL,
  `detail_description` text NOT NULL,
  `list_upload` varchar(100) NOT NULL,
  `list_type` tinyint(1) NOT NULL,
  `commented_views` text NOT NULL COMMENT 'user ids who viewed posts when comment',
  `updated_views` text NOT NULL COMMENT 'user ids who view posts when updated posts',
  `transfer_post_from` int(11) NOT NULL,
  `transfer_post_to` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `editpost_user` int(11) NOT NULL,
  `editpost_time` varchar(80) NOT NULL,
  `table_content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_post`
--

INSERT INTO `ks_post` (`post_id`, `company_id`, `post_creator_id`, `post_type`, `title`, `tagged_labels`, `co_owners`, `visibility`, `publish`, `post_override`, `content_request_status`, `content_request_quiz`, `short_description`, `detail_description`, `list_upload`, `list_type`, `commented_views`, `updated_views`, `transfer_post_from`, `transfer_post_to`, `created_date`, `updated_date`, `editpost_user`, `editpost_time`, `table_content`) VALUES
(1, 1, 1, 2, 'Title 1', '2,3,15', '5', '', 2, 0, 0, '', 'SSS', '<p>AAA</p>', '', 0, '1,1,1,1,1,2,1,1,1,1,2,2', '1,1,1,1,2,1,1,1,1,2,2', 0, 0, '2018-06-14 10:28:47', '2018-08-30 00:40:03', 0, '', ''),
(2, 1, 1, 2, 'INTERESTING WAYS TO STUDY CLIMATE CHANGE', '3,16', '5', '', 0, 0, 0, '', 'From exacerbating extreme weather events to endangering our favorite foods, the effects of climate change are widespread and readily observed. This has provided scientists with a great range of data to study the phenomenon of climate change.', '<h3 style=\"color:#222222; font-style:normal\"><strong>Fossilized Hyrax Urine</strong></h3>\r\n\r\n<p>Who knew layers of ancient pee can be a valuable treasure trove of climate change data?&nbsp;&nbsp;Thanks to the hyrax&rsquo;s pair of unusual habits, scientists are afforded a rare look at&nbsp;ancient plant biodiversity&nbsp;and how it has changed through the years.</p>\r\n\r\n<h3 style=\"color:#222222; font-style:normal\">Douglas-firs and Geoducks</h3>\r\n\r\n<p>&rdquo;Strange bedfellows&rdquo; is what scientists labeled the unusual partnership of the Douglas-fir and the geoduck in building accurate climatic measurements.</p>\r\n\r\n<p>&nbsp;</p>', '', 0, '1,7,1,1,1,1,1,1', '1,7,1,1,1,1,1,1', 0, 0, '2018-06-15 13:34:16', '0000-00-00 00:00:00', 0, '', ''),
(3, 1, 1, 2, 'CURRENT ENVIRONMENT PROBLEMS THAT OUR WORLD IS FACING', '4,16', '8', '', 0, 0, 0, '', 'The world environment is going too much worst condition day by day as we use our natural recourses indiscriminately and fail to manage our waste. Our total environmental condition deteriorate in everyday life but we yet not concern ourselves for save us from different types of natural calamities and extinction of several types of animals spaces groups, it is true that only human are responsible for polluting environment, but if we have a little bit concern than it will make us positive thinker to save our environment.', '<p><strong>Population explosion:</strong></p>\r\n\r\n<p>The first and foremost emerging problem in the world is&nbsp;population explosion&nbsp;that directly impact in our environment and every vital element of our environment such like water Tree,air,and&nbsp; many other things . It causes poverty inflation of money, high price rate of daily commodities and creates thousands of problems which are too hard to solve us. On the other hand for being increased population growth we destroy our valuable natural resources and make a devastated impact for ourselves.</p>\r\n\r\n<p><strong>Increase of CFC&rdquo;s in air:</strong></p>\r\n\r\n<p>For the lacking of Trees and forest area&nbsp;CFC&rsquo;S are increasing day by day&nbsp;for this reasons worlds temperature are increasing which directly impact to melt polar ice caps and rise of sea levels which causes undergoing our firm land into the water that directly impact a negative effect on our environment .</p>\r\n\r\n<p>It is true that by running or establishing an atomic project which causes huge carbon dioxide gas in our environment though it&rsquo;s a beneficiary side to create huge amount of energy but it has hundreds of harmful sides yet people of the rich country run these projects rather to stop the project as a result we can easily notice the intensiveness of natural calamities at present year comparing the past year.</p>\r\n\r\n<p><strong>Waste in everywhere:</strong></p>\r\n\r\n<p>Today it&rsquo;s a normal matter to through our daily waste everywhere these waste melt and pollute our environment gradually and spread out jams for this reasons our local people get sick easily. Open waste pollute our environment as well as our surroundings but everyone know about the bad effect of waste but do not take immediate steps to save their living area .</p>', '', 0, '1', '1', 0, 0, '2018-06-15 13:39:25', '0000-00-00 00:00:00', 0, '', ''),
(4, 1, 1, 2, 'EXTREME WEATHER CONDITIONS: ARE YOU PREPARED?', '10,14,8', '9', '', 0, 0, 0, '', 'Information from climatologists indicates that due to global warming, there is an increased likelihood of experiencing extreme weather conditions. Some regions have recently experienced these changes already, which are manifested in different forms including record-setting heat. As long as humans continue burning fossil fuels, extreme weather events will become a norm and this could escalate to levels that are not bearable.', '<p><strong>Get a survival pack</strong></p>\r\n\r\n<p>Each family is supposed to keep a handy survival pack. The pack should contain&nbsp;emergency essentials&nbsp;that could help in coping at least a few days after a disaster. The items that should come in this list include water, food, blankets, matches, a cell phone, first-aid kit, a transistor radio, and a flashlight. Make sure the water allocation made is sufficient to last at least three days for each person. Canned nuts, energy bars, and dehydrated milk can be stored for long and are essential items that provide good energy sources.</p>\r\n\r\n<p><strong>Think water purification</strong></p>\r\n\r\n<p>During extreme weather conditions, like in the case of a hurricane, water supply is likely to be disrupted. The water available might also be undrinkable, so the best idea is to have a purification solution in store just in case. Groundwater is likely to be contaminated by sewage, and storing water ahead of disasters may not be feasible. Water filtration technology has advanced to allow you to access clean and safe water when you need it, so get a handy filter.</p>\r\n\r\n<p><strong>Sturdy roofing solution</strong></p>\r\n\r\n<p>Weather changes like extreme heat or wind could weaken your roof. To prevent this from happening, you should think about installing roofing material that is sturdy and capable of withstanding all the extremities that come with weather changes. A good example of a roofing system that would help is&nbsp;synthetic slate roofing, which is resistant to wind, fire damage, and water. It easily handles friction and pressure without collapsing.</p>\r\n\r\n<p><strong>Mind about clothing</strong></p>\r\n\r\n<p>Harsh weather alters many things and could, among other things, knock down power grids. It could get extremely cold that you have to wear additional layers of clothing in order to withstand the weather. It&rsquo;s essential to ensure you have the right clothing for different weather conditions, especially if you live in a place that is prone to experiencing frigid temperatures.</p>', '', 0, '1,1', '1,1', 0, 0, '2018-06-15 14:16:11', '0000-00-00 00:00:00', 0, '', ''),
(5, 1, 1, 2, '5 Tips for Business Document Security', '16', '10', '', 0, 0, 0, '', 'Every small business has to be concerned about document security. You want to make sure that sensitive documents containing information about your customers, financial information or other important data doesn’t get into the wrong hands. In certain industries, in fact, the law requires you to secure certain documents to protect customers. Here are five tips to improve small business security and keep your documents safe.', '<h3 style=\"color:#79bde9; font-style:normal\">1. Implement Security Policies</h3>\r\n\r\n<p>In order to secure business documents, it&rsquo;s necessary to get everyone who works for you on board with company policies. Here are some guidelines for effective practices regarding business and document security.</p>\r\n\r\n<p>Make sure people shred all sensitive documents rather than throwing them in the recycling bin. For added document security, invest in a high-end cross-cut shredder.</p>\r\n\r\n<p>When employees leave your company be sure to revoke their access to your files and network.</p>\r\n\r\n<p>Instruct employees to use strong passwords and never to share them with anyone.</p>\r\n\r\n<p>Employees should never leave their devices unattended without locking them. When they print out documents, make sure they retrieve them promptly.</p>\r\n\r\n<p>Communicate regularly with your IT department to review protocols on data security, encryption and other security issues.</p>\r\n\r\n<h3 style=\"color:#79bde9; font-style:normal\">2. Protect Sensitive Files With Passwords</h3>\r\n\r\n<p>Securing files with passwords is one of the simplest ways to secure business documents but many small businesses fail to take this precaution. Programs such as Microsoft Word, Excel, Adobe Acrobat and other programs give you an option that requires users to enter a password to open a file. Remember to password protect files on your own computer and also when sending files such as contracts via email.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3 style=\"color:#79bde9; font-style:normal\">3. Use Electronic Signatures</h3>\r\n\r\n<p>Using electronic or eSignatures is not only more convenient but often more secure than scanning, printing and emailing documents to people in order to obtain a physical signature. It&rsquo;s always a risk to send sensitive content using email. With eSignature services such as AdobeSign and DocuSign, it&rsquo;s legal and safe to have documents signed digitally.</p>\r\n\r\n<h3 style=\"color:#79bde9; font-style:normal\">4. Create Digital Copies of All Paper Documents</h3>\r\n\r\n<p>It&rsquo;s essential to scan all important paper documents and store them in a safe place online. With paper, there&rsquo;s always the risk of fire or theft. The safest place to keep documents is in the cloud. Services such as Dropbox and many others provide you with ample storage for all your files. You can also set permissions to determine who can access or edit your files.</p>\r\n\r\n<h3 style=\"color:#79bde9; font-style:normal\">5. Use Apps to Cut Down on Paper</h3>\r\n\r\n<p>Paper documents and receipts create clutter around your home and office. They also pose a security risk as someone can always find them. You can make use of the latest smartphone apps to cut down on all this clutter. Many stores now let you get your receipts emailed to you with apps such as Expensify. This saves you the trouble of dealing with paper receipts and the bother of having to shred them later.</p>\r\n\r\n<p>These small business security tips will help you maintain better security for your documents. Improving&nbsp;security&nbsp;is an essential aspect of running a successful business. Another important element is having sufficient cash flow. One of the best ways to enjoy enhanced cash flow is to use invoice factoring, a practice that lets you collect cash up front for outstanding invoices. To learn more, contact&nbsp;Riviera Finance.</p>', '', 0, '1,1', '1,1', 0, 0, '2018-06-15 14:32:27', '0000-00-00 00:00:00', 0, '', ''),
(6, 1, 1, 2, 'SMART WAYS TO CONSERVE ENERGY', '5', '8', '', 0, 0, 0, '', 'Saving energy is a great way to reduce your bills, it could be as simple as making small changes in the household behavior. You could protect your environment and pay less when you do it right. Conserving energy improves the quality of life and increases the value of your home. It is an ideal investment idea for all.', '<p>Follow the rules</p>\r\n\r\n<p>The rules were simple when we were in school. You would remember seeing, &quot;turn off the lights when not in use&quot;, as a common sign in most places. One of the most common myths about saving energy at households is that it would be expensive. It is not true. In fact, it does not incur any extra cost, you could find easy ways to&nbsp;conserve energy&nbsp;with helpful blogs. Making small changes to your every day could result in huge savings.</p>\r\n\r\n<p><strong>Here are a few easy to follow methods to save energy:</strong></p>\r\n\r\n<p>Turn off appliances once you finish working with them.</p>\r\n\r\n<p>Limit your television time.</p>\r\n\r\n<p>Turn down the thermostat during warmer days.</p>\r\n\r\n<p>Always load the dishwasher and washing machine when they have a full load.</p>\r\n\r\n<p>You could also consider doing the chores by hand at times to save energy. Try line-drying your clothes instead of using the dryer on a hot day. These small changes may seem like they do not account much, but when you consider them all, a lot of energy saved. You could use a home energy monitor to understand which appliance consumes the most energy.</p>\r\n\r\n<p>Programmable thermostat and lightings</p>\r\n\r\n<p>In most households, the heating and cooling cost nearly 50% of the utility bills. A&nbsp;programmable thermostat&nbsp;could help you reduce your bill. A smart thermostat automatically turns off or reduces the heating and cooling times when you are away or asleep. There are programmable appliances available in the market that detect movement to work like when you are not home, these appliances stop working. It helps you to save energy and pay less. There are movement detecting lights and air conditioners too. You could also get smart-power strips that shut off the power to electronic equipment when they are not in use. It also can be set to a time-frame after which they turn off.</p>\r\n\r\n<p>Look out for energy efficient appliances</p>\r\n\r\n<p>Another major contributor to your energy bill is your appliances. The water heater accounts a huge part of your energy bill. An energy efficient water heater reduces nearly 50% of the cost. Many companies have introduced energy efficient appliances like washing machine, refrigerators and air conditioners. On an average, 13% of the household&#39;s energy consumption depends on the appliances. Avoid getting too many appliances at home and opt for conventional methods. Energy efficient machines could cost you more but their operational costs are nearly 9-25% lesser. On the long run, a good energy star labeled appliance could save you money.</p>\r\n\r\n<p>Apart from these three important ways, you could also think about weatherizing your home. Sealing air leaks is a great way to reduce heating or cooling expenses. Another key factor is to&nbsp;insulate your home. Insulation retains the heat during winter and keeps the heat out of your home during summer. Depending on the region you live, you could differ the level of insulation. Whether your motivation for energy efficiency is environmental, economic or personal, you succeed!</p>', '', 0, '1,1', '1,1', 0, 0, '2018-06-15 15:54:16', '0000-00-00 00:00:00', 0, '', ''),
(7, 1, 1, 2, '4 WAYS YOUR GARDEN CAN CONTRIBUTE TO THE ENVIRONMENT', '12', '6', '', 0, 0, 0, '', 'If you have a garden, now is a great time to utilize it in a way that benefits not only yourself but also the environment. There are many things you can do to your garden that will assist the local flora and fauna while helping you become healthier, happier, and potentially wealthier.', '<h2 style=\"font-style:normal\">Utilize Every Inch Of Space</h2>\r\n\r\n<p>There&rsquo;s bound to be some space in your garden that can be put to better use. And there&rsquo;s no better use for that space than plants. Not only will your garden look more natural and attractive, but the right plants will also help purify the air in your area.</p>\r\n\r\n<p>Through oxygenic photosynthesis, your plants, trees, and bushes will convert the wasteful carbon dioxide into oxygen, which is returned to the atmosphere. Local wildlife may benefit from your garden as well, as it can provide much-needed shelter and food for many species.</p>\r\n\r\n<p>Of course, you don&rsquo;t want your garden to look like an unkempt overgrown jungle. Some&nbsp;decomposed granite&nbsp;pathways will go a long way in ensuring it still looks like something you&rsquo;ve put time into taking care of.</p>\r\n\r\n<h2 style=\"font-style:normal\">Artificial Grass</h2>\r\n\r\n<p>Ironically, you&rsquo;ll be doing the environment a bigger favor by having&nbsp;artificial grass&nbsp;in your garden as opposed to the real thing. This is due to numerous reasons. Artificial grass doesn&rsquo;t need watering, which saves you money and your local area from running out of water.</p>\r\n\r\n<p>You won&rsquo;t need to utilize harmful chemicals and pesticides, as nothing will live in the grass. Finally, because you won&rsquo;t be cutting it any time soon, you&rsquo;ll be saving fuel and reducing emissions by not using a lawnmower.</p>\r\n\r\n<h2 style=\"font-style:normal\">Grow Your Own Food</h2>\r\n\r\n<p>This is by far the easiest and most financially beneficial way to improve your garden while improving the environment. By buying less fruit and vegetables from the store, you&rsquo;re decreasing demand. This means fewer vehicles transporting less food to supermarkets, decreasing carbon emissions and energy usage.</p>\r\n\r\n<p>The satisfaction and pride that comes with growing and consuming your own food are unlike anything else. Get your kids stuck in to help educate them on the importance of saving the environment while having fun.</p>\r\n\r\n<h2 style=\"font-style:normal\">Get A Compost Bin</h2>\r\n\r\n<p>Compost bins are extremely easy and affordable to&nbsp;set up&nbsp;and your garden will love it. Instead of throwing waste in the garbage, you can use it as fertilizer for your plants. Egg shells, tea bags, coffee grounds, fruit and vegetable peelings, cardboard and wool are all examples of compost that your garden will love.</p>', '', 0, '1,1', '1,1', 0, 0, '2018-06-15 15:57:58', '0000-00-00 00:00:00', 0, '', ''),
(8, 1, 1, 2, 'THE ECOLOGICAL CITY-STATE: GREEN LIVING IN MONACO', '1,2', '3', '', 0, 0, 0, '', 'Monaco’s diminutive size belies its commitment to sustainability and environmental improvement. Visit any Monaco real estate agency and they can inform you about the new green urban developments and residences for sale. What’s more surprising is that this green sensibility is not a new development.', '<h2 style=\"font-style:normal\">Signatory to the Kyoto Protocol</h2>\r\n\r\n<p>The Kyoto Protocol is an agreement to reduce greenhouse-gas emissions signed in 1997 and put into force in 2005. The protocol was developed under the&nbsp;UNFCCC&nbsp;(United Nations Framework Convention on Climate Change). As of 2015, the Principality had fulfilled its obligations, reducing emissions by 13.18% and continues to improve levels all the time with a new objective to cut greenhouse gas emissions by 30% by 2020 and 80% before 2050.</p>\r\n\r\n<h2 style=\"font-style:normal\">Electric Cars</h2>\r\n\r\n<p>Monaco leads by example from the top down with the Government launching an initiative to promote electric cars. In order to keep the air clean, residents receive a 30% subsidy for purchasing electric vehicles (including taxes) with a ceiling of &euro;9,000. Subsidies for&nbsp;hybrid vehiclesare more complex but still exist and benefit from the 574 charging points in public car parks and roads dotted around the Principality.</p>\r\n\r\n<p>Residents are further encouraged to use electric cars by the provision of free on-street parking. EVs and hybrids regularly appear at Monaco&rsquo;s famous car exhibitions such as SIAM and Top Marques and are the subject of many conferences supported by Prince Albert II. Most local transportation is electrically powered. Stajvelo, the 100% made in Monaco e-bike is launching this summer and made its debut at Top Marques last month. In line with the Principality&rsquo;s rich racing history, the&nbsp;Monaco ePrix&nbsp;is held every other year on the legendary F1 street circuit.</p>\r\n\r\n<h2 style=\"font-style:normal\">Waste is Recycled</h2>\r\n\r\n<p>Monaco&rsquo;s authorities have installed more than 50 collection points for glass, paper and household packaging. Trash is collected and converted into energy-producing fuel for municipal needs while waste water is treated and recycled. The Grimaldi Forum, exhibition space sets another good example as it is fueled by hydropower.</p>\r\n\r\n<h2 style=\"font-style:normal\">Planting</h2>\r\n\r\n<p>Terre de Monaco&nbsp;is a company that plants and maintains vegetable gardens on top of public and private buildings such as the hospital, in restaurants and on the Tour Od&eacute;on skyscraper. Even the huge Monaco land reclamation project Portier Cove is ecologically-minded with marine plants and other fauna being relocated to protected areas in order to minimise environmental damage. An artificial reef has been created to protect the remaining wildlife.</p>\r\n\r\n<p>&nbsp;</p>', '', 0, '1', '1', 0, 0, '2018-06-15 16:00:36', '0000-00-00 00:00:00', 0, '', ''),
(9, 1, 5, 2, 'Vegetable Gardening for Beginners', '4,13', '1,7', '', 0, 0, 0, '', 'GROWING your own vegetables is both fun and rewarding. All you really need to get started is some decent soil and a few plants. But to be a really successful vegetable gardener — and to do it organically — you\'ll need to understand what it takes to keep your plants healthy and vigorous. Here are the basics.', '<h3 style=\"color:#7e551b; font-style:normal\">Make Efficient Use of Space</h3>\r\n\r\n<p>The location of your garden (the amount of sunlight it receives, proximity to a source of water, and protection from frost and wind) is important. Yet just as crucial for growing vegetables is making the most of your garden space.</p>\r\n\r\n<p>Lots of people dream of having a huge vegetable garden, a sprawling site that will be big enough to grow everything they want, including space-hungry crops, such as corn, dried beans, pumpkins and winter squash, melons, cucumbers and watermelons. If you have the room and, even more importantly, the time and energy needed to grow a huge garden well, go for it. But vegetable gardens that make efficient use of growing space are much easier to care for, whether you&#39;re talking about a few containers on the patio or a 50-by-100-foot plot in the backyard. Raised beds are a good choice for beginners because they make the garden more manageable.</p>\r\n\r\n<h3 style=\"color:#7e551b; font-style:normal\">Get Rid of Your Rows</h3>\r\n\r\n<p>The first way to maximize space in the garden is to convert from traditional row planting to 3- or 4-foot-wide raised beds. Single rows of crops, while they might be efficient on farms that use large machines for planting, cultivating, and harvesting, are often not the best way to go in the backyard vegetable garden. In a home-sized garden, the fewer rows you have, the fewer paths between rows you will need, and the more square footage you will have available for growing crops.</p>', '', 0, '1,1,1,1,5,5,5,5,5,1,1,1,1,1', '5,5,5,1,1,1,1,1', 5, 0, '2018-06-16 09:33:50', '2018-09-22 13:27:46', 0, '', ''),
(10, 1, 3, 2, 'ORGANIC HOUSE - A HOUSE THAT FEEDS ITS \"OWNER\'S\"', '2', '', '', 0, 0, 0, '', 'How about building a house which suffices all your needs that are right from food to water and even air. Sounds mind boggling? Well, here is a 71 years old gentleman who has brought this mind-boggling imagination to reality. He resides in the home that has the small jungle, self-generated electricity, and rainwater harvesting system too.', '<p><strong>SOLAR POWER</strong></p>\r\n\r\n<p>&ldquo;In the country like India where sunlight is in abundance usage of solar power should be encouraged.&rdquo; He points out. Even on the mild sunny days this solar power is capable of producing the electricity. It took just one day to complete the set up as explained by him. There are times when the rains are heavy in such times the charged batteries help in supplying the electricity. Hence, there is hardly any issue with the electricity. &ldquo;It has been four years that he has not faced a single power cut&rdquo; he says even though the city of more prone to load shedding. &ldquo;It is a sustainable, affordable, viable project, presently giving over six percent tax-free return including battery replacement,&rdquo; he added further.</p>\r\n\r\n<p><strong>RAINWATER HARVESTING</strong></p>\r\n\r\n<p>The rainwater harvesting system was set up around 20 years ago. There is no daily maintenance requirement and only the cleaning is required during the monsoon season.</p>\r\n\r\n<p><strong>ORGANIC KITCHEN GARDEN</strong></p>\r\n\r\n<p>Not only fresh water and sustainable electricity but also organic food is what Mr.D.Suresh has taken into consideration. He also owns an organic garden in the kitchen where he grows organic fruits and organic vegetables. He believes in a healthy approach towards life which enabled him to create this organic garden. Mr.D.Suresh manages to save a lot of his income through these methods and moreover it contributes to the sustainable development of the society.</p>', '', 0, '3', '3', 0, 0, '2018-06-21 15:40:08', '0000-00-00 00:00:00', 0, '', ''),
(11, 1, 3, 2, 'WHY IS ORGANIC FOOD PRODUCE MORE EXPENSIVE THAN CONVENTIONALLY GROWN FRUITS, VEGETABLES AND GRAINS?', '18,19', '5,8,10', '', 0, 0, 0, '', 'You must know that organic food is being promoted amongst the consumers even by the government. The keen on efforts of moving towards sustainable development by opting for organic farming is gaining momentum for a while. However, one question that always tends to pop up is why organic food produce is comparatively expensive?', '<p><strong>1. More labor is involved -</strong>&nbsp;Eliminating the usage of pesticides and chemicals implies more workforce. As more labors are involved in organic farming naturally the cost of production increases. Increased in the cost of production definitely, leads to higher rates which explains why organic seems expensive than conventionally grown food items.</p>\r\n\r\n<p><br />\r\n<strong>2. Demand and supply gap -</strong>&nbsp;Unlike the handful of the population most of us are not even bothered what poison is being dropped in the plate. Even if the supply is raised by the farmers yet the demand remains stagnant which furthermore widens the gap between demand and supply.</p>\r\n\r\n<p><strong>3. Cost in transitions -</strong>&nbsp;Conventionally grown crops need fertilizers for sustainability, however, cheap fertilizers are used to over heaps of crops which is not the case with&nbsp;organically grown crops. Organically grown crops don&#39;t involve pesticides. These crops use natural substances such as compost which is inexpensive to procure but costly to transit (carrying things from one place to another).</p>\r\n\r\n<p><strong>4. The idea of crop rotation -</strong>&nbsp;Crop rotation is highly encouraged in organic farming. Using this method the consumed nitrogen is restored through cover crops. This implies that a farmer cannot keep growing cash crops (a crop produced for its commercial value) as it would hamper the quality of the soil.</p>', '', 0, '3', '3', 0, 0, '2018-06-21 15:47:38', '0000-00-00 00:00:00', 0, '', ''),
(12, 1, 3, 2, 'BEING ORGANIC', '18,17', '6,8', '', 0, 0, 0, '', 'In the struggle of keeping yourself healthy and balancing out your professional life, the health is often asked to pay the tax. Numerous urbanites are inclining themselves towards kitchen gardening to suffice their need for organically grown fruits and vegetables. Some are even making it a point to buy only organic if not grow. But, what is this organic hoopla is all about?', '<p><strong>What is &ldquo;Organic food&rdquo;?</strong>&nbsp;<br />\r\nThere are crops that are grown in fields using the fertility of soil along with several artificial pesticides and fertilisers. This kind of production is termed as conventionally grown. On the other hand, there is Organic farming. Organic farming occurs when the produce is nourished using organic fertilisers like cow urine and cow dung.&nbsp;<br />\r\nThe trouble with the conventionally grown food item is that a larger amount pesticides residual refuses to get removed through a mere wash making their ways to our systems tarnishing our respiratory and digestive health.</p>', '', 0, '3', '3', 0, 0, '2018-06-21 15:52:18', '0000-00-00 00:00:00', 0, '', ''),
(13, 1, 3, 2, 'A beginner’s guide to organic terrace gardening: What do you need to get started', '20,18', '1,9,10', '', 0, 0, 0, '', 'The two main factors that pushed me into it was the Facebook group Organic Terrace Gardening and availability of terrace space. Gardening is not something that was a hand-me-down. It was something that hit me when I came across the OTG page on FB and I was getting into a major landmark in my life – getting my house built. Since both coincided, I wanted to give it a shot. As time passed, I have been getting more and more into it. I do not have the greenest thumb, but I’m pretty happy with what I am doing. So, based on my experience over the past year or so, here are my thoughts, suggestions and tips.', '<p><img src=\"http://creativethoughtsinfo.com/ct100/kaseidon/upload/attachment/1273261_10151900772829493_287647640_o1.jpg\" /></p>\r\n\r\n<p>General Recommendations</p>\r\n\r\n<p>&ndash; Make a start and get your hands dirty! You will not learn everything on day one. It will take some time for experience to kick in and make the best out of the knowledge gained.</p>\r\n\r\n<p>&ndash; Grow what you need. Do not get excited and tempted to grow everything at one time. Start slow.</p>\r\n\r\n<p>&ndash; If you have the time and the patience maintain a diary.</p>\r\n\r\n<p>&ndash; Do use a pair of gloves when working, especially with soil.</p>\r\n\r\n<p>&ndash; Be prepared to come across some nasty looking insects and bugs!</p>\r\n\r\n<p>&ndash; Use Google and YouTube, they can be your best assistants. There&rsquo;s tons of information out there, waiting to be read and seen.</p>\r\n\r\n<p>What do you need to start</p>\r\n\r\n<h3 style=\"color:#00363f; font-style:normal\">Space</h3>\r\n\r\n<p>Balcony? Ground space? Terrace ? Basically any location which gets at least 2-3 hours or more of direct sunlight. The more the better! A place where you can keep a few containers. The number 1 question asked by newbies &ndash; &ldquo;Will my terrace/balcony be able to hold the weight of pots/plants/containers?&rdquo; Yes, it will! The average RCC/concrete slab can take huge amounts of weight. Just make sure adequate waterproofing has been done. If your terrace can bear the brunt of a heavy downpour, then you are good to go with an OTG too. For balconies, make sure, you have a water drainage outlet.</p>\r\n\r\n<h3 style=\"color:#00363f; font-style:normal\">Containers</h3>\r\n\r\n<p>Think beyond the pot! For a first time gardener, a container is any object like a pot in any shape/size. And yes, it can be a pot too! Most importantly, it should be able to&nbsp;hold water and soil and other ingredients in the container. There will be a time&nbsp;when you will be scouting for any decent sized object. For example, an oil can, an unused helmet, a vegetable/milk crate, specific types of wood, a good thick UV treated plastic grow bag, 2/5/10 litre or more water bottle/can, used paint buckets (but make absolutely sure all the paint inside is scraped off), PVC drainage pipes. Rice/cement bags can be used, but not more than once. After about 3 months, it starts to disintegrate. And once that happens, the disintegrated pieces mix up in the soil, which makes it very difficult to remove. So try to avoid them.</p>\r\n\r\n<p>There was a major discussion about usage of plastic. And the outcome is that, yes, you can use plastic (FB OTG link about plastic). If you are really scared and have your own inhibitions, stay away from plastic pots. Plastic pots of size 10 or 12 or more should be good enough for a single plant like tomato, chilly, brinjal, capsicum etc. You get pots made out of clay, mud, cement, terracotta etc. These are some of my containers.</p>', '', 0, '3,1,1,1', '1,1,1,1', 1, 0, '2018-06-21 16:40:05', '2018-09-15 20:43:13', 0, '', ''),
(14, 1, 6, 2, 'World Cup stunning moments: Zinedine Zidane\'s head-butt', '', '3,7', '', 0, 0, 0, '', 'The crowd are whistling. Something has happened. Marco Materazzi is on the ground. The match commentators are confused. They think David Trezeguet has had something to do with it but they are just guessing. Their eyes, and the eyes of hundreds of millions of people around the world, were on the other end of the pitch. They did not see it.', '<p>Zin&eacute;dine Zidane began life as a street footballer in La Castellane, the tough suburb of Marseille in which he grew up. He ended it last night as a street fighter in one of Europe&#39;s most historic stadiums and in front of a worldwide audience of millions.</p>', '', 0, '6', '6', 0, 0, '2018-06-22 08:47:04', '0000-00-00 00:00:00', 0, '', ''),
(15, 1, 6, 2, 'C++ Programming Language', '22,23', '4,8,10', '', 0, 0, 0, '', 'C++ is a general-purpose object-oriented programming (OOP) language, developed by Bjarne Stroustrup, and is an extension of the C language. It is therefore possible to code C++ in a \"C style\" or \"object-oriented style.\" In certain scenarios, it can be coded in either way and is thus an effective example of a hybrid language.', '<p>C++ is one of the most popular languages primarily utilized with system/application software, drivers, client-server applications and embedded firmware.</p>\r\n\r\n<p>The main highlight of C++ is a collection of predefined classes, which are data types that can be instantiated multiple times. The language also facilitates declaration of user-defined classes. Classes can further accommodate member functions to implement specific functionality. Multiple objects of a particular class can be defined to implement the functions within the class. Objects can be defined as instances created at run time. These classes can also be inherited by other new classes which take in the public and protected functionalities by default.</p>\r\n\r\n<p>C++ includes several operators such as comparison, arithmetic, bit manipulation and logical operators. One of the most attractive features of C++ is that it enables the overloading of certain operators such as addition.</p>\r\n\r\n<p>A few of the essential concepts within the C++ programming language include polymorphism, virtual and friend functions, templates, namespaces and pointers.</p>\r\n\r\n<p>&nbsp;</p>', '', 0, '6', '6', 0, 0, '2018-06-22 08:53:42', '0000-00-00 00:00:00', 0, '', ''),
(16, 1, 7, 2, 'Take a closer look at the forest floor', '24,25', '1', '', 0, 0, 0, '', 'When you look closely, it’s amazing what you’ll find in the forest. Doug Gilbert, Dundreggan Operations Manager, explores the forest floor in search of wood ants. A keystone species in the forest – wood ants play a major role in nature throughout the world, and Scotland is no exception.', '<p>It was a long cold winter at Dundreggan, with temperatures rarely above freezing &ndash; and lots of snow. Ploughing through knee deep drifts during January, it is hard to imagine that anything as small as ants can survive here, but survive they do! We had a couple of bright sunny days in early spring and during the middle of the day the temperature rose into the low teens. With colleagues, Fiona and James, our new Caledonian Pinewood Recovery team, we took the opportunity to look for life in the woodlands at Dundreggan and found several wood ant nests in a flurry of activity. These fascinating insects deserve our attention at this time of year when many other invertebrates are yet to get going.</p>\r\n\r\n<p>Carefully picking one or two up specimens, we were able to identify them as hairy wood ants, the most common ants of Dundreggan&rsquo;s ancient woodlands. But what were they doing? Seemingly aimless, all the workers were trotting around the sunny side of the nest. There was no sign of ant trails extending away from the nest so they didn&rsquo;t seem to be on the move for food. They were clustering, soaking up the sun, in order to transfer the heat from their bodies into the nest to warm it up more quickly. Effectively, they are their own central heating system. This is something that I had heard described recently at a training event held on wood ants by Buglife Scotland.</p>', '', 0, '7,7', '7,7', 0, 0, '2018-06-25 08:35:08', '0000-00-00 00:00:00', 0, '', ''),
(17, 1, 7, 2, 'An awareness on tree plantation', '26', '5,9', '', 0, 0, 0, '', 'Our Mother Nature plays a major role in keeping our Universe Alive... Its the most beautiful creation of God through which we gain most resources... Its our duty to conserve & make our Mother Earth Eco-friendly in today\'s polluted world..', '<p>One of the major loss in&nbsp;today&#39;s&nbsp;environment is &nbsp;depreciation of trees, hence an awareness of planting saplings must be widely spread so as to make our earth green..</p>\r\n\r\n<p>One of the best possible way to&nbsp;minimize Global Warming is to plant trees as much as we can. As i surfed about tree plantation schemes in the internet, i found a scheme called The billion tree campaign of UNEP.&nbsp;As of The Billion Tree Campaign of UNEP (United Nations Environment Programme) India is ranked 2nd in The roll of&nbsp;honour &nbsp;top ten countries.<br />\r\n&nbsp;</p>\r\n\r\n<p>As many organisations, associations &amp;&nbsp;foundations&nbsp;carry out this tree awareness &amp; plantation programme , we still need to take this issue to a major level by spreading the awareness to remote areas in India. We can just begin this&nbsp;Eco-friendly cause by conserving the existing trees that we see around our home , through the way to school , college or office. A method of gifting tree saplings is already in&nbsp;practice&nbsp;but they are very few in number.&nbsp;so let each of us start this valuable cause to&nbsp;save our environment &nbsp;from Global warming &amp; to avoid scarcity of nature resources.</p>', '', 0, '7', '7', 0, 0, '2018-06-25 08:40:23', '0000-00-00 00:00:00', 0, '', ''),
(18, 1, 7, 2, 'Rules of Football (Soccer)', '27', '1,3', '', 0, 0, 0, '', 'A match consists of two 45 minutes halves with a 15 minute rest period in between.\r\nEach team can have a minimum off 11 players (including 1 goalkeeper who is the only player allowed to handle the ball within the 18 yard box) and a minimum of 7 players are needed to constitute a match.', '<p>The field must be made of either artificial or natural grass. The size of pitches is allowed to vary but must be within 100-130 yards long and 50-100 yards wide. The pitch must also be marked with a rectangular shape around the outside showing out of bounds, two six yard boxes, two 18 yard boxes and a centre circle. A spot for a penalty placed 12 yards out of both goals and centre circle must also be visible.</p>\r\n\r\n<p>The ball must have a circumference of 58-61cm and be of a circular shape.</p>\r\n\r\n<p>Each team can name up to 7 substitute players. Substitutions can be made at any time of the match with each team being able to make a maximum of 3 substitutions per side. In the event of all three substitutes being made and a player having to leave the field for injury the team will be forced to play without a replacement for that player.</p>\r\n\r\n<p>Each game must include one referee and two assistant referee&rsquo;s (linesmen). It&rsquo;s the job of the referee to act as time keeper and make any decisions which may need to be made such as fouls, free kicks, throw ins, penalties and added on time at the end of each half. The referee may consult the assistant referees at any time in the match regarding a decision. It&rsquo;s the assistant referee&rsquo;s job to spot offside&rsquo;s in the match (see below), throw ins for either team and also assist the referee in all decision making processes where appropriate.</p>\r\n\r\n<p>If the game needs to head to extra time as a result of both teams being level in a match then 30 minutes will be added in the form of two 15 minute halves after the allotted 90 minutes.</p>\r\n\r\n<p>If teams are still level after extra time then a penalty shootout must take place.</p>\r\n\r\n<p>The whole ball must cross the goal line for it to constitute as a goal.</p>\r\n\r\n<p>For fouls committed a player could receive either a yellow or red card depending on the severity of the foul; this comes down to the referee&rsquo;s discretion. The yellow is a warning and a red card is a dismissal of that player. Two yellow cards will equal one red. Once a player is sent off then they cannot be replaced.</p>\r\n\r\n<p>If a ball goes out of play off an opponent in either of the side lines then it is given as a throw in. If it goes out of play off an attacking player on the base line then it is a goal kick. If it comes off a defending player it is a corner kick.</p>\r\n\r\n<h2 style=\"font-style:normal\">The Offside Rule in Football</h2>\r\n\r\n<p>Offside can be called when an attacking player is in front of the last defender when the pass is played through to them. The offside area is designed to discourage players from simply hanging around the opponent&rsquo;s goal waiting for a pass. To be onside they must be placed behind the last defender when the ball is played to them. If the player is in front of that last defender then he is deemed to be offside and free kick to the defending team will be called.</p>\r\n\r\n<p>A player cannot be caught offside in their own half. The goalkeeper does not count as a defender. If the ball is played backwards and the player is in front of the last defender then he is deemed to be not offside.</p>\r\n\r\n<p>&nbsp;</p>', '', 0, '7,1', '7,1', 0, 0, '2018-06-25 08:49:23', '0000-00-00 00:00:00', 0, '', ''),
(19, 1, 6, 3, 'Playstation', '', '', '', 0, 0, 0, '', 'Playstation is a video game console developed by Sony. The first Playstation was released in 1994, followed by Playstation 2 (PS2) in 2000 and Playstation 3 (PS3) in 2006.', '', '', 0, '6,2', '6,2', 0, 0, '2018-06-25 15:36:02', '0000-00-00 00:00:00', 0, '', ''),
(20, 1, 1, 3, 'FIFA World Cup', '', '4,6', '', 0, 0, 0, '', 'World Cup, formally FIFA World Cup, in football (soccer), quadrennial tournament that determines the sport’s world champion. It is likely the most popular sporting event in the world, drawing billions of television viewers every tournament.', '', '', 0, '1,1,1,1,1', '1,1,1,1,1', 0, 0, '2018-06-26 08:52:26', '0000-00-00 00:00:00', 0, '', ''),
(21, 1, 7, 2, 'What is angular', '31,29', '1', '', 0, 0, 0, '', 'Before going through this Angular Tutorial blog, I would like to draw your attention a bit. You must have gone through many web & mobile applications which are responsive & dynamic. It does not reload the whole page and instead reloads only the required section. For example Gmail, you might have noticed that when you click on an email, it only reloads that e-mail in the body section and does not retrieve the rest of the page like side and navigation bar. These kind of applications are SPA (Single Page Application) and are developed using Angular. Some of the most popular examples are NetFlix, PayPal, freelancer etc.', '<h2 style=\"font-style:normal\"><strong>Evolution of&nbsp;Angular</strong></h2>\r\n\r\n<p>Angular is a JavaScript based open-source framework for building client-side web applications. So, let us first understand Javascript. JavaScript runs on the client side of the web, which can be used to design or program how the web pages behave on the occurrence of an event. Typically, JavaScript is used for interface interactions, slideshows and other interactive components. JavaScript evolved quickly and has also been used for server-side programming (like in Node.js), game development, etc.</p>\r\n\r\n<p>JavaScript deals with the dynamic content, which is an important aspect of web development. Dynamic content refers to constantly changing content and it adapts to specific users.&nbsp;For example, JavaScript can be used to determine whether or not to render the mobile version of the website by checking the device, which is accessing the website.</p>\r\n\r\n<p>This encouraged&nbsp;web developers to start creating their own custom JavaScript libraries for reducing the number of code lines and implementing complex functionalities easily.&nbsp;<strong>jQuery</strong>&nbsp;is a fast, small, and feature-rich JavaScript library, which makes things like HTML document traversal and manipulation, event handling, animation, and Ajax much simpler with an easy-to-use API. jQuery became the most popular one because it was easy to use and extremely powerful.</p>\r\n\r\n<p>Since jQuery has no real structure, the developer has full freedom to build projects as they see fit. However, the lack of structure also means it&rsquo;s easier to fall into the trap of &ldquo;spaghetti code,&rdquo; which can lead to confusion in larger projects with no clear design direction or code maintainability. For these situations, a framework like Angular can be a big help.</p>\r\n\r\n<p>Angular is a client-side JavaScript framework that was specifically designed to help developers build SPAs (Single Page Applications) in accordance with best practices for web development. By providing a structured environment for building SPAs, the risk of producing &ldquo;spaghetti code&rdquo; is highly reduced. So, you must be wondering what is SPA?</p>\r\n\r\n<p><strong>Single-page application</strong>&nbsp;(or&nbsp;<strong>SPA</strong>) are applications that are accessed via a web browser like other websites but offer more dynamic interactions resembling native mobile and desktop apps.&nbsp;The most notable difference between a regular website and SPA is the reduced amount of page refreshes. SPAs have a heavier usage of AJAX- a way to communicate with back-end servers without doing a full page refresh to get data loaded into our application. As a result, the process of rendering pages happens mostly on the client-side.</p>\r\n\r\n<p>&nbsp;</p>', '', 0, '7,1,1', '7,1,1', 0, 0, '2018-06-26 12:25:16', '0000-00-00 00:00:00', 1, '1539644533', ''),
(22, 1, 7, 2, 'Angular is based on type-script lanaguage', '32', '', '', 0, 0, 0, '', 'Angular is a TypeScript-based open-source front-end web application platform led by the Angular Team at Google and by a community of individuals and corporations.', '<p>The architecture of an Angular application is different from AngularJS. The main building blocks for Angular are modules, components, templates, metadata, data binding, directives, services and dependency injection. We will be looking at it in a while.</p>\r\n\r\n<p>Angular was a complete rewrite of AngularJS.</p>\r\n\r\n<p>Angular does not have a concept of &ldquo;scope&rdquo; or controllers&nbsp;instead, it uses a hierarchy of components as its main architectural concept.</p>\r\n\r\n<p>Angular has a simpler expression syntax, focusing on &ldquo;[ ]&rdquo; for property binding, and &ldquo;( )&rdquo; for event binding</p>\r\n\r\n<p><strong>Mobile development</strong>&nbsp;&ndash; Desktop development is much easier when mobile performance issues are handled first. Thus, Angular first handles mobile development.</p>\r\n\r\n<p><strong>Modularity</strong>&nbsp;&ndash; Angular follows modularity. Similar functionalities are kept together in same modules. This gives Angular a lighter &amp; faster core.</p>\r\n\r\n<p>Angular recommends the use of Microsoft&rsquo;s TypeScript language, which introduces the following features:</p>\r\n\r\n<p>Class-based Object Oriented Programming</p>\r\n\r\n<p>Static Typing</p>\r\n\r\n<p>TypeScript is a superset of ECMAScript 6 (ES6) and is backward compatible with ECMAScript 5. Angular also includes the benefits of ES6:</p>\r\n\r\n<p>Iterators</p>\r\n\r\n<p>For/Of loops</p>\r\n\r\n<p>Reflection</p>\r\n\r\n<p>Improved dependency injection &ndash; bindings make it possible for dependencies to be named</p>\r\n\r\n<p>Dynamic loading</p>\r\n\r\n<p>Asynchronous template compilation</p>\r\n\r\n<p>Simpler Routing</p>\r\n\r\n<p>Replacing controllers and $scope with components and directives &ndash; a component is a directive with a template</p>\r\n\r\n<p>Support reactive programming using RxJS</p>\r\n\r\n<p>Moving ahead in this Angular tutorial, let&rsquo;s understand the features of Angular.</p>', '', 0, '7', '7', 0, 0, '2018-06-26 12:57:34', '0000-00-00 00:00:00', 0, '', ''),
(23, 1, 7, 3, 'Why is the secret military base called Area 51? Why not Area 52, or 127?', '31,29', '4,8', '', 0, 0, 0, '', 'A rash of unusual activity, coupled with new construction at the world-famous testing ground of Area 51, has aviation enthusiasts wondering if the base is gearing up to help with the development of a new bomber. Some evidence seems to point to the secret site’s involvement in the Air Force’s B-21 Raider program, designed to create a new stealth bomber to penetrate advanced enemy defenses.', '', '', 0, '7', '7', 0, 0, '2018-06-26 13:06:10', '0000-00-00 00:00:00', 0, '', ''),
(24, 1, 7, 3, 'Top most movies of all time', '37,38', '', '', 0, 0, 0, '', 'The Dark Knight,The Shawshank Redemption and The Lord of the Rings', '', '', 0, '7,1,1', '1,1,1', 1, 0, '2018-06-27 09:01:17', '2018-10-01 15:05:33', 0, '', ''),
(25, 1, 7, 3, 'Node Js', '39', '5,6', '', 0, 0, 0, '', 'Node.js is an open-source, cross-platform JavaScript run-time environment that executes JavaScript code server-side.', '', '', 0, '7,2,2', '7,2,2', 0, 0, '2018-07-07 09:26:50', '0000-00-00 00:00:00', 0, '', '');
INSERT INTO `ks_post` (`post_id`, `company_id`, `post_creator_id`, `post_type`, `title`, `tagged_labels`, `co_owners`, `visibility`, `publish`, `post_override`, `content_request_status`, `content_request_quiz`, `short_description`, `detail_description`, `list_upload`, `list_type`, `commented_views`, `updated_views`, `transfer_post_from`, `transfer_post_to`, `created_date`, `updated_date`, `editpost_user`, `editpost_time`, `table_content`) VALUES
(26, 1, 7, 2, 'MongoDB', '41', '4,6', '', 0, 0, 0, '', 'MongoDB is an open-source document database and leading NoSQL database. MongoDB is written in C++.Database is a physical container for collections. Each database gets its own set of files on the file system. A single MongoDB server typically has multiple databases.', '<p>MongoDB is a document database. Each database contains collections which in turn contains documents. Each document can be different with varying number of fields. The size and content of each document can be different from each other.</p>\r\n\r\n<p>The document structure is more in line with how developers construct their classes and objects in their respective programming languages. Developers will often say that their classes are not rows and columns but have a clear structure with key-value pairs.</p>\r\n\r\n<p>As seen in the introduction with NoSQL databases, the rows (or documents as called in MongoDB) doesn&#39;t need to have a schema defined beforehand. Instead, the fields can be created on the fly.</p>\r\n\r\n<p>The data model available within MongoDB allows you to represent hierarchical relationships, to store arrays, and other more complex structures more easily.</p>\r\n\r\n<p>Scalability &ndash; The MongoDB environments are very scalable. Companies across the world have defined clusters with some of them running 100+ nodes with around millions of documents within the database</p>', '', 0, '7', '7', 0, 0, '2018-07-21 13:15:48', '0000-00-00 00:00:00', 0, '', ''),
(27, 1, 1, 3, 'Authorize.Net Payment method', '42', '7', '', 0, 0, 0, '', 'Accept payments any time, anywhere', '', '', 0, '1,6', '1,6', 0, 0, '2018-07-21 14:50:59', '0000-00-00 00:00:00', 0, '', ''),
(28, 1, 7, 3, 'Android', '43', '4,5,8', '', 0, 0, 0, '', 'Android is an open source and Linux-based Operating System for mobile devices such as smartphones and tablet computers. Android was developed by the Open Handset Alliance, led by Google, and other companies.', '', '', 0, '7', '7', 0, 0, '2018-07-21 15:01:42', '0000-00-00 00:00:00', 0, '', ''),
(29, 1, 7, 3, 'IOS', '43', '', '', 0, 0, 0, '', 'iOS is a mobile operating system developed and distributed by Apple Inc. It was originally released in 2007 for the iPhone, iPod Touch, and Apple TV. iOS is derived from OS X, with which it shares the Darwin foundation. iOS is Apple\'s mobile version of the OS X operating system used in Apple computers.', '', '', 0, '7', '7', 0, 0, '2018-07-21 15:04:30', '0000-00-00 00:00:00', 0, '', ''),
(30, 1, 1, 2, 'My First Kaseidon Post', '29,38', '3', '', 0, 0, 0, '', 'Test Post', '<h2><em>Many year ago, there was a fairtale about a boy and a robot.</em></h2>\r\n\r\n<p><img alt=\"\" src=\"data:image/jpeg;base64,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\" style=\"height:142px; width:355px\" /></p>', '', 0, '2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1', '1,1,1,1,1,1,1,1,1,1', 1, 0, '2018-07-21 20:35:47', '2018-09-08 15:50:25', 0, '', ''),
(31, 1, 7, 1, 'Post type listing', '38', '4', '', 0, 0, 0, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum maximus nec augue non euismod. Proin malesuada sapien nec euismod pulvinar. Fusce pharetra pellentesque porta. Mauris id dui sit amet metus tempor commodo. Morbi ultrices iaculis dolor ac rhoncus. Pellentesque ac odio quis metus pulvinar accumsan. Morbi et nulla quis tellus sodales tincidunt non et nulla.', '', '', 0, '7,1,1,1,2,2,1', '7,1,1,1,2,2,1', 0, 0, '2018-07-27 11:41:48', '0000-00-00 00:00:00', 0, '', ''),
(32, 1, 7, 1, 'Post type listing', '38', '4', '', 2, 0, 0, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum maximus nec augue non euismod. Proin malesuada sapien nec euismod pulvinar. Fusce pharetra pellentesque porta. Mauris id dui sit amet metus tempor commodo. Morbi ultrices iaculis dolor ac rhoncus. Pellentesque ac odio quis metus pulvinar accumsan. Morbi et nulla quis tellus sodales tincidunt non et nulla.', '', '1532691899example2.csv', 2, '7,7,1', '7,7,1', 7, 0, '2018-07-27 11:44:59', '2018-09-15 19:19:03', 0, '', ''),
(33, 1, 7, 1, 'Post type listing2', '37', '8', '', 0, 0, 0, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum maximus nec augue non euismod. Proin malesuada sapien nec euismod pulvinar. Fusce pharetra pellentesque porta. Mauris id dui sit amet metus tempor commodo. Morbi ultrices iaculis dolor ac rhoncus. Pellentesque ac odio quis metus pulvinar accumsan. Morbi et nulla quis tellus sodales tincidunt non et nulla.', '', '1532692004myfile.xlsx', 0, '1,1,1,1,1,1,1,1', '7,1,1,1,1,1,1,1,1', 0, 0, '2018-07-27 11:46:44', '0000-00-00 00:00:00', 0, '', ''),
(34, 1, 1, 1, 'Study list', '', '', '', 0, 0, 0, '', 'A list of studies', '', '', 0, '1,1,2,11', '1,1,2,11', 0, 0, '2018-07-27 22:36:35', '0000-00-00 00:00:00', 0, '', ''),
(35, 1, 1, 1, 'Listing table manually', '19', '', '', 0, 0, 0, '', '', '', '1537025253.xlsx', 2, '1,1,1,1,1,1,1', '1,1,1', 1, 0, '2018-07-29 02:41:41', '2018-09-15 15:47:49', 0, '', ''),
(36, 1, 7, 1, 'Lists Item1', '30,38', '3,6,10', '2,5,9', 0, 0, 0, '', '', '', '1533306230.xlsx', 2, '7,4,1,1,7,7,7,1,1,2', '7,7,1,1,2', 7, 0, '2018-08-03 12:10:18', '2018-09-15 18:46:03', 0, '', ''),
(37, 1, 7, 1, 'Lists Item2', '18', '3,6,10', '1,4,8', 0, 0, 0, '', 'Way to go', '', '1533298706.xlsx', 2, '7,1,7,7,1,1,1,1,6', '7,7,1,1,1,1,6', 7, 0, '2018-08-03 12:18:26', '2018-09-15 18:48:35', 0, '', ''),
(38, 1, 1, 1, 'My List Post #1', '', '', '', 0, 0, 0, '', '', '<p>This is a &quot;Text&quot; type test post.</p>', '1533343218.xlsx', 2, '1,4,1,1,1,1,1,1,1,1,1,1,1,1,1,1,7,1', '1,1,1,1,1,1,1,1,7,1', 1, 0, '2018-08-04 00:40:18', '2018-09-07 17:35:49', 0, '', ''),
(39, 1, 1, 2, '2016 Presidential Election', '', '2', '5', 0, 0, 1, 'Describe what happens on this election', '', '<p>The <strong>United States presidential election of 2016</strong> was the 58th quadrennial American presidential election, held on Tuesday, November 8, 2016. In a surprise victory, the Republican ticket of businessman Donald Trump and Indiana Governor Mike Pence defeated the Democratic ticket of former Secretary of State Hillary Clinton and U.S. Senator from Virginia Tim Kaine[2] despite losing the popular vote. Trump took office as the 45th President, and Pence as the 48th Vice President, on January 20, 2017. Incumbent Democratic President Barack Obama was ineligible to run for a third term due to the term limits established by the 22nd Amendment. Concurrent with the presidential election, Senate, House, and many gubernatorial and state and local elections were also held on November 8.</p>', '', 0, '1,1,1,2,2,5,5,7,2,1,1,1,1', '1,1,2,2,5,5,7,2,1,1,1,1', 0, 0, '2018-08-18 03:44:10', '2018-09-02 19:18:36', 0, '', ''),
(40, 1, 1, 1, 'Performance Report', '', '2', '', 0, 0, 0, '', 'This is a report to show the Quarterly Performance of the users. /n\r\nTest report -- JS', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', '1535038618All_EOL_project_details.xlsx', 2, '1,4,2,2,2,1,1,1,7,1,1,5,5,5,5,5,5,1,1,2,2,2,2,1,1,5,5,2,1,5,5,1,1,1,1,2,2,1,1,1,1,2,1,1,2,1,1,1,1,1,1,1,2,1', '1,1,1,1,1,1,1,1,2,1', 1, 0, '2018-08-23 15:36:58', '2018-09-15 21:17:23', 0, '', ''),
(41, 1, 7, 4, 'Calendar1', '35,28', '5,6', '3,6', 0, 0, 0, '', 'Lorem ipsum Lorem ipsum', '', '', 0, '7,7,7,7,7,1,7,7,1,1,1,1,1,7,1,1,1,1,1,1,1,1,1,1,1,1,1,7,1,1,1,1,7,5,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1', '7,7,1,1,1,1,1,7,1,1,1,1,1,1,1,1,1,1,1,1,1,7,1,1,1,1,7,5,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1', 0, 0, '2018-08-24 14:26:06', '2018-09-03 18:14:53', 0, '', ''),
(43, 1, 1, 2, 'A Collection of References', '54,61', '2', '', 0, 0, 0, '', 'This post serves as an anchor for references', '<p>Post #40 <a href=\"http://creativethoughtsinfo.com/ct100/kaseidon/post/individual_post/post_details/NDE=\">Post 40</a></p>\r\n\r\n<p>Post #41 <a href=\"http://creativethoughtsinfo.com/ct100/kaseidon/post/individual_post/post_details/NDE=\">http://creativethoughtsinfo.com/ct100/kaseidon/post/individual_post/post_details/NDE=</a></p>\r\n\r\n<p>Post #40 http://creativethoughtsinfo.com/ct100/kaseidon/post/individual_post/post_details/NDA=</p>\r\n\r\n<p>https://www.nytimes.com/2018/09/06/arts/music/5-minutes-that-will-make-you-love-classical-music.html</p>', '', 0, '', '1,1,1,2,2,2,1,1,1,1,1', 1, 0, '2018-09-09 20:36:05', '2018-10-02 02:37:44', 1, '1539438034', ''),
(44, 1, 7, 2, 'How to be successful', '33', '', '', 1, 0, 0, '', 'How to be successful in the modern soceity', '<blockquote>\r\n<p>The first thing is always to know what&#39;s really going on</p>\r\n</blockquote>\r\n\r\n<p>&nbsp;Nothing is more important than <a href=\"#Anchor 2\">this</a>.</p>\r\n\r\n<p>To do something you really <a href=\"https://en.wikipedia.org/wiki/Noam_Chomsky\">love to</a>.</p>\r\n\r\n<p>Check out<a href=\"http://creativethoughtsinfo.com/ct100/kaseidon/post/individual_post/post_details/NDM=\"> Post #43</a></p>\r\n\r\n<p>Paragraph 1</p>\r\n\r\n<p><strong>Avram Noam Chomsky</strong> (born December 7, 1928) is an American <a href=\"https://en.wikipedia.org/wiki/Linguist\">linguist</a>, <a href=\"https://en.wikipedia.org/wiki/Philosopher\">philosopher</a>, <a href=\"https://en.wikipedia.org/wiki/Cognitive_scientist\">cognitive scientist</a>, <a href=\"https://en.wikipedia.org/wiki/Historian\">historian</a>, and <a href=\"https://en.wikipedia.org/wiki/Social_criticism\">social critic</a>. Sometimes described as &quot;the father of modern linguistics&quot;, Chomsky is also a major figure in <a href=\"https://en.wikipedia.org/wiki/Analytic_philosophy\">analytic philosophy</a> and one of the founders of the field of <a href=\"https://en.wikipedia.org/wiki/Cognitive_science\">cognitive science</a>. He holds a joint appointment as Institute Professor Emeritus at the <a href=\"https://en.wikipedia.org/wiki/Massachusetts_Institute_of_Technology\">Massachusetts Institute of Technology</a> (MIT) and laureate professor at the <a href=\"https://en.wikipedia.org/wiki/University_of_Arizona\">University of Arizona</a>,<a href=\"https://en.wikipedia.org/wiki/Noam_Chomsky#cite_note-22\">[22]</a><a href=\"https://en.wikipedia.org/wiki/Noam_Chomsky#cite_note-23\">[23]</a> and is the author of over 100 books on topics such as <a href=\"https://en.wikipedia.org/wiki/Linguistics\">linguistics</a>, war, politics, and <a href=\"https://en.wikipedia.org/wiki/Mass_media\">mass media</a>. Ideologically, he aligns with <a href=\"https://en.wikipedia.org/wiki/Anarcho-syndicalism\">anarcho-syndicalism</a> and <a href=\"https://en.wikipedia.org/wiki/Libertarian_socialism\">libertarian socialism</a>.</p>\r\n\r\n<p>Born to middle-class <a href=\"https://en.wikipedia.org/wiki/Ashkenazi_Jews\">Ashkenazi Jewish</a> immigrants in <a href=\"https://en.wikipedia.org/wiki/Philadelphia\">Philadelphia</a>, Chomsky developed an early interest in <a href=\"https://en.wikipedia.org/wiki/Anarchism\">anarchism</a> from alternative bookstores in New York City. He began studying at the <a href=\"https://en.wikipedia.org/wiki/University_of_Pennsylvania\">University of Pennsylvania</a> at age 16, taking courses in linguistics, mathematics, and philosophy. From 1951 to 1955, he was appointed to <a href=\"https://en.wikipedia.org/wiki/Harvard_University\">Harvard University</a>&#39;s <a href=\"https://en.wikipedia.org/wiki/Society_of_Fellows\">Society of Fellows</a>. While at Harvard, he developed the theory of <a href=\"https://en.wikipedia.org/wiki/Transformational_grammar\">transformational grammar</a>; for this, he was awarded his doctorate in 1955. Chomsky began teaching at MIT in 1957 and emerged as a significant figure in the field of linguistics for his landmark work <em><a href=\"https://en.wikipedia.org/wiki/Syntactic_Structures\">Syntactic Structures</a></em>, which remodeled the scientific study of language. From 1958 to 1959, he was a <a href=\"https://en.wikipedia.org/wiki/National_Science_Foundation\">National Science Foundation</a> fellow at the <a href=\"https://en.wikipedia.org/wiki/Institute_for_Advanced_Study\">Institute for Advanced Study</a>. Chomsky is credited as the creator or co-creator of the <a href=\"https://en.wikipedia.org/wiki/Universal_Grammar\">universal grammar</a> theory, the <a href=\"https://en.wikipedia.org/wiki/Generative_grammar\">generative grammar</a> theory, the <a href=\"https://en.wikipedia.org/wiki/Chomsky_hierarchy\">Chomsky hierarchy</a>, and the <a href=\"https://en.wikipedia.org/wiki/Minimalist_program\">minimalist program</a>. Chomsky also played a pivotal role in the decline of <a href=\"https://en.wikipedia.org/wiki/Behaviorism\">behaviorism</a>, being particularly critical of the work of <a href=\"https://en.wikipedia.org/wiki/B._F._Skinner\">B. F. Skinner</a>.</p>\r\n\r\n<p>Chomsky <a href=\"https://en.wikipedia.org/wiki/Opposition_to_United_States_involvement_in_the_Vietnam_War\">vocally opposed U.S. involvement</a> in the <a href=\"https://en.wikipedia.org/wiki/Vietnam_War\">Vietnam War</a>, believing the war to be an act of <a href=\"https://en.wikipedia.org/wiki/American_imperialism\">American imperialism</a>. In 1967, Chomsky attracted widespread public attention for his anti-war essay entitled &quot;<a href=\"https://en.wikipedia.org/wiki/The_Responsibility_of_Intellectuals\">The Responsibility of Intellectuals</a>&quot;. Associated with the <a href=\"https://en.wikipedia.org/wiki/New_Left\">New Left</a>, he was arrested multiple times for his activism and was placed on <a href=\"https://en.wikipedia.org/wiki/Nixon%27s_Enemies_List\">Nixon&#39;s &quot;Enemies List&quot;</a>. While expanding his work in linguistics over subsequent decades, he also became involved in the <a href=\"https://en.wikipedia.org/wiki/Linguistics_Wars\">Linguistics Wars</a>. In collaboration with <a href=\"https://en.wikipedia.org/wiki/Edward_S._Herman\">Edward S. Herman</a>, Chomsky later co-wrote <a href=\"https://en.wikipedia.org/wiki/Manufacturing_Consent:_The_Political_Economy_of_the_Mass_Media\">an analysis</a>, which articulated the <a href=\"https://en.wikipedia.org/wiki/Propaganda_model\">propaganda model</a> of media criticism, and worked to expose the <a href=\"https://en.wikipedia.org/wiki/Indonesian_occupation_of_East_Timor\">Indonesian occupation of East Timor</a>. Additionally, his defense of <a href=\"https://en.wikipedia.org/wiki/Freedom_of_speech\">freedom of speech</a>&mdash;including free speech for <a href=\"https://en.wikipedia.org/wiki/Holocaust_denial\">Holocaust deniers</a>&mdash;generated significant controversy in the <a href=\"https://en.wikipedia.org/wiki/Faurisson_affair\">Faurisson affair</a> of the early 1980s. Following his retirement from active teaching, Chomsky has continued his vocal political activism by opposing the <a href=\"https://en.wikipedia.org/wiki/War_on_Terror\">War on Terror</a> and supporting the <a href=\"https://en.wikipedia.org/wiki/Occupy_Movement\">Occupy Movement</a>.</p>\r\n\r\n<p>Anchor 2<a id=\"Anchor 2\" name=\"Anchor 2\"></a></p>', '', 0, '', '7,7,1,1,1,7,1,1,1,1', 7, 0, '2018-09-15 19:24:54', '2018-10-16 22:45:17', 7, '1539729941', ''),
(45, 1, 1, 4, 'Jack\'s Calendar', '', '2,3', '', 0, 0, 0, '', 'Lucky Potter\'s input', '', '', 0, '', '1,1,1,2,2,2,2', 1, 0, '2018-09-22 14:28:23', '2018-12-03 15:30:36', 1, '1542625286', ''),
(48, 1, 1, 2, 'Wonderful Post', '28', '', '', 1, 0, 0, '', 'Here is a wonderful post L101', '<p>This is a wonderful day with a wonderful idea.</p>', '', 0, '', '1,1,1,1,1,1,1,1', 1, 0, '2018-10-13 18:54:24', '2018-10-30 00:42:23', 1, '1541186812', ''),
(49, 1, 1, 1, 'Wizard Test', '', '', '', 0, 0, 0, '', '', '', '1542723041.xlsx', 1, '', '', 0, 0, '2018-11-20 14:10:41', '0000-00-00 00:00:00', 1, '1542813299', ''),
(50, 1, 1, 1, '', '', '', '', 0, 0, 0, '', '', '', '1542902610.xlsx', 2, '', '1,1,1,1', 1, 0, '2018-11-22 16:03:30', '2018-11-22 16:08:03', 1, '1542903039', ''),
(51, 1, 1, 5, 'Time Planning testing', '', '', '', 0, 0, 0, '', 'Time Planning test', '', '', 0, '', '1,1,1,2,1,2,2,2,1,1', 1, 0, '2018-11-23 15:14:57', '2018-11-23 15:18:31', 1, '1542998295', ''),
(52, 1, 1, 5, 'UPS', '', '', '', 0, 0, 0, '', '', '', '', 0, '', '', 0, 0, '2018-11-27 10:34:23', '0000-00-00 00:00:00', 0, '', ''),
(53, 1, 1, 5, 'TimeP', '', '', '', 0, 0, 0, '', '', '', '', 0, '', '', 0, 0, '2018-11-27 15:40:52', '0000-00-00 00:00:00', 0, '', ''),
(54, 1, 1, 1, 'Listing Test', '20', '6,7', '2,4', 1, 0, 0, '', '', '', '', 0, '', '1,1,1,1,1,1,1,1,1,1', 1, 0, '2018-12-14 14:25:47', '2018-12-20 04:25:44', 0, '', '[[\"1\",\"2\",\"3\",\"4\",\"Test\",\"7\",\"8\",\"9\",\"10\"],[\"row number 1\",null,null,null,null,null,null,null,\"20\"],[\"3\",null,null,null,\"56\",\"56\",\"56\",\"56\",\"30\"],[\"4\",null,null,null,\"56\",null,null,null,\"40\"],[\"5\",null,null,null,\"56\",null,null,null,\"50\"],[\"6\",null,null,null,\"56\",null,null,null,\"60\"],[\"7\",null,null,null,\"56\",null,null,null,\"70\"],[\"8\",null,null,null,\"56\",null,null,null,\"80\"],[\"9\",null,null,null,\"56\",null,null,null,\"90\"],[\"10\",null,null,null,\"56\",null,null,null,\"100\"],[null,null,null,null,null,null,null,null,null]]'),
(55, 1, 1, 5, 'Timeline Example', '29', '9', '', 0, 0, 0, '', 'nvbnvbnvbn', '', '', 0, '', '1,1,1,1,1,1,1,1,1,1,1', 1, 0, '2018-12-21 05:43:30', '2018-12-26 03:16:55', 1, '1546026497', '[[\"A\",\"B\",\"C\",\"D\",\"E\",\"F\",\"G\",\"H\",\"I\",\"J\"],[null,null,null,null,null,null,null,null,null,null],[null,null,null,null,null,null,null,null,null,null],[null,null,null,null,null,null,null,null,null,null],[null,null,null,null,null,null,null,null,null,null],[null,null,null,null,null,null,null,null,null,null],[null,null,null,null,null,null,null,null,null,null],[null,null,null,null,null,null,null,null,null,null],[null,null,null,null,null,null,null,null,null,null],[null,null,null,null,null,null,null,null,null,null]]'),
(56, 1, 1, 5, 'test_timeline', '34', '2,4', '', 0, 0, 0, '', 'testing', '', '', 0, '', '1,1,1,1,1,1,1,1,1', 1, 0, '2018-12-25 11:38:15', '2018-12-28 16:06:12', 1, '1546066165', '[[\"A\",\"B\",\"C\",\"D\",\"E\",\"F\",\"G\",\"H\",\"I\",\"J\"],[null,null,null,null,null,null,null,null,null,null],[null,null,null,null,null,null,null,null,null,null],[null,null,null,null,null,null,null,null,null,null],[null,null,null,null,null,null,null,null,null,null],[null,null,null,null,null,null,null,null,null,null],[null,null,null,null,null,null,null,null,null,null],[null,null,null,null,null,null,null,null,null,null],[null,null,null,null,null,null,null,null,null,null],[null,null,null,null,null,null,null,null,null,null]]');

-- --------------------------------------------------------

--
-- Table structure for table `ks_post_attachment`
--

CREATE TABLE `ks_post_attachment` (
  `post_attachment_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_creator_id` int(11) NOT NULL,
  `attachment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_post_attachment`
--

INSERT INTO `ks_post_attachment` (`post_attachment_id`, `company_id`, `post_id`, `post_creator_id`, `attachment`) VALUES
(1, 1, 1, 1, 'Penguins1.jpg'),
(3, 1, 2, 1, 'featt69.jpg'),
(4, 1, 2, 1, 'forest-summer-morning-sky-awesome-cool-land-sunlights-nice-parkscapes-shadows-forests-amazing-trees-'),
(5, 1, 3, 1, '349550-airpollution-1331671519-765-640x480.jpg'),
(6, 1, 3, 1, 'f999x666-36114_131179_14.jpg'),
(7, 1, 3, 1, 'images.jpg'),
(8, 1, 3, 1, 'pollution-444668_960_720.jpg'),
(9, 1, 3, 1, 'Pollution-Air-Co2-Industrial-Carbon-Dioxide.jpg'),
(10, 1, 4, 1, '1be3acaaf6b039420cf69b4cf3fdb869.jpg'),
(11, 1, 4, 1, '2_Danish-town-is-using-green-energy.jpg'),
(12, 1, 4, 1, 'extream-weather-condition.jpg'),
(13, 1, 4, 1, 'extreme-winter.jpg'),
(14, 1, 4, 1, 'weather_condition-960x640.jpeg'),
(15, 1, 5, 1, 'Koala.jpg'),
(16, 1, 6, 1, 'energy-1.jpeg'),
(17, 1, 7, 1, 'image001-1.jpg'),
(18, 1, 8, 1, 'monaco-real-estate-agency-electric-cars.jpg'),
(19, 1, 8, 1, 'monaco-real-estate-agency-fresh-produce.jpg'),
(20, 1, 8, 1, 'monaco-real-estate-agency-header.jpg'),
(21, 1, 9, 1, '5069-raised-beds.jpg'),
(22, 1, 10, 3, 'solar-panel-array.jpg'),
(23, 1, 11, 3, 'organic-food-expensive.jpg'),
(24, 1, 11, 3, 'organic-garden-expensive-cost.jpg'),
(25, 1, 12, 3, 'BLOG_POST_-_FARMING_BLOG.jpg'),
(26, 1, 12, 3, 'inforgraphics_1.jpg'),
(27, 1, 13, 3, '1273261_10151900772829493_287647640_o1.jpg'),
(28, 1, 14, 6, '2048.jpg'),
(29, 1, 15, 6, 'feature-of-cpp.png'),
(30, 1, 15, 6, 'overview-of-c-language-3-638.jpg'),
(31, 1, 16, 7, 'Leaf-cutter-ants-on-forest-floor.jpg'),
(32, 1, 17, 7, 'nature-wallpaper-45.jpg'),
(33, 1, 18, 7, 'tn_5_football-1344620007.jpg'),
(34, 1, 19, 6, '100%-GTALCS.jpg'),
(35, 1, 19, 6, '617xqbGTF1L.jpg'),
(36, 1, 20, 1, '2671554_full-lnd1.jpg'),
(37, 1, 20, 1, 'tn_5_football-13446200072.jpg'),
(38, 1, 21, 7, 'Jquery-vs-Angular-Angular-Tutorial-Edureka-11.png'),
(39, 1, 24, 7, 'MV5BNWJkYWJlOWMtY2ZhZi00YWM0LTliZDktYmRiMGYwNzczMTZhXkEyXkFqcGdeQXVyNzU1NzE3NTg@__V1_CR0,45,480,270_'),
(40, 1, 25, 7, 'nodejs_concepts.jpg'),
(41, 1, 25, 7, 'NODEJS_ASYNC_(1).png'),
(42, 1, 25, 7, 'nodejs-new-pantone-black.png'),
(43, 1, 28, 7, 'Chrysanthemum.jpg'),
(44, 1, 29, 7, '22811807.jpg'),
(45, 1, 36, 7, '5xBH2U.jpg'),
(46, 1, 36, 7, 'ArtID222.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ks_post_calendar`
--

CREATE TABLE `ks_post_calendar` (
  `post_calender_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `calender_title` varchar(150) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ks_post_calendar`
--

INSERT INTO `ks_post_calendar` (`post_calender_id`, `company_id`, `post_id`, `creator_id`, `calender_title`, `start_event`, `end_event`) VALUES
(1, 1, 41, 7, 'C1', '2018-08-07 00:00:00', '2018-08-08 00:00:00'),
(2, 1, 41, 7, 'C2', '2018-08-22 00:00:00', '2018-08-23 00:00:00'),
(9, 1, 45, 1, 'Short discussion', '2018-09-05 11:00:00', '2018-09-05 11:30:00'),
(11, 1, 41, 5, 'No event', '2018-09-05 00:00:00', '2018-09-06 00:00:00'),
(12, 1, 43, 1, 'Last Working Day!', '2018-08-31 00:00:00', '2018-09-01 00:00:00'),
(14, 1, 45, 1, 'Meeting', '2018-09-07 10:30:00', '2018-09-07 11:00:00'),
(15, 1, 45, 1, 'Test event', '2018-12-05 00:00:00', '2018-12-06 00:00:00'),
(16, 1, 45, 1, 'Another event', '2018-12-19 00:00:00', '2018-12-20 00:00:00'),
(17, 1, 45, 1, 'Patient Week', '2018-09-10 00:00:00', '2018-09-15 00:00:00'),
(20, 1, 45, 1, 'No event', '2018-10-05 06:30:00', '2018-10-05 08:00:00'),
(21, 1, 45, 1, 'NON', '2018-10-06 00:00:00', '2018-10-07 00:00:00'),
(24, 1, 45, 2, 'Event 1', '2018-10-02 00:00:00', '2018-10-02 03:30:00'),
(27, 1, 45, 1, 'kjl', '2018-10-17 00:00:00', '2018-10-18 00:00:00'),
(28, 1, 45, 1, 'W1', '2018-10-02 00:00:00', '2018-10-03 00:00:00'),
(29, 1, 45, 1, '12', '2018-10-03 00:00:00', '2018-10-04 00:00:00'),
(30, 1, 45, 1, 'q', '2018-10-09 00:00:00', '2018-10-10 00:00:00'),
(31, 1, 45, 1, 'jjjj', '2018-10-11 00:00:00', '2018-10-12 00:00:00'),
(32, 1, 45, 1, 'test', '2018-10-12 00:00:00', '2018-10-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ks_post_co_owner`
--

CREATE TABLE `ks_post_co_owner` (
  `post_co_owner_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_creator_id` int(11) NOT NULL,
  `co_owner_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_post_co_owner`
--

INSERT INTO `ks_post_co_owner` (`post_co_owner_id`, `company_id`, `post_id`, `post_creator_id`, `co_owner_id`) VALUES
(1, 0, 0, 0, '1,2,3,4'),
(2, 0, 0, 0, '4,5,6'),
(3, 0, 0, 0, '9,8,4'),
(4, 0, 0, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `ks_post_graphic`
--

CREATE TABLE `ks_post_graphic` (
  `post_graphic_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_creator_id` int(11) NOT NULL,
  `graphic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_post_graphic`
--

INSERT INTO `ks_post_graphic` (`post_graphic_id`, `company_id`, `post_id`, `post_creator_id`, `graphic`) VALUES
(1, 1, 19, 6, '1be3acaaf6b039420cf69b4cf3fdb869.jpg'),
(2, 1, 19, 6, '2_Danish-town-is-using-green-energy.jpg'),
(3, 1, 19, 6, '91EPBWxBTqL__SL1500_.jpg'),
(4, 1, 20, 1, '4e10739872e26990dfa2dc99a7f106d3.jpg'),
(5, 1, 20, 1, '9294-004-B88987C0.jpg'),
(6, 1, 20, 1, '74853-004-4C4F7CA7.jpg'),
(7, 1, 20, 1, '103091-004-77FDDF2F.jpg'),
(8, 1, 20, 1, '118102-004-80C0502E.jpg'),
(9, 1, 20, 1, '128778-004-16F9902F.jpg'),
(10, 1, 20, 1, '139485-004-C44C8CB8.jpg'),
(11, 1, 23, 7, 'images_(3).jpg'),
(12, 1, 23, 7, 'area51b.jpg'),
(13, 1, 24, 7, 'images_(4).jpg'),
(14, 1, 25, 7, 'latest-engine-versions-support-for-nodejs-application-hosting.jpg'),
(15, 1, 25, 7, 'NodeJS-vs-Java-1.jpg'),
(16, 1, 25, 7, 'foto_nodejs.png'),
(17, 1, 28, 7, 'Tulips.jpg'),
(18, 1, 29, 7, 'Hydrangeas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ks_post_list`
--

CREATE TABLE `ks_post_list` (
  `post_list_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_creator_id` int(11) NOT NULL,
  `column_status` tinyint(1) NOT NULL,
  `col_1` varchar(80) NOT NULL,
  `col_2` varchar(80) NOT NULL,
  `col_3` varchar(80) NOT NULL,
  `col_4` varchar(80) NOT NULL,
  `col_5` varchar(80) NOT NULL,
  `col_6` varchar(80) NOT NULL,
  `col_7` varchar(80) NOT NULL,
  `col_8` varchar(80) NOT NULL,
  `col_9` varchar(80) NOT NULL,
  `col_10` varchar(80) NOT NULL,
  `col_11` varchar(80) NOT NULL,
  `col_12` varchar(80) NOT NULL,
  `col_13` varchar(80) NOT NULL,
  `col_14` varchar(80) NOT NULL,
  `col_15` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_post_list`
--

INSERT INTO `ks_post_list` (`post_list_id`, `company_id`, `post_id`, `post_creator_id`, `column_status`, `col_1`, `col_2`, `col_3`, `col_4`, `col_5`, `col_6`, `col_7`, `col_8`, `col_9`, `col_10`, `col_11`, `col_12`, `col_13`, `col_14`, `col_15`) VALUES
(1, 1, 31, 7, 1, 'First_Name', 'Last_Name', 'Email', 'DOB', 'Contact_NO', '', '', '', '', '', '', '', '', '', ''),
(2, 1, 31, 7, 0, 'Batman Begins (2005)', 's1', 'w1', '1212', '22222', '', '', '', '', '', '', '', '', '', ''),
(3, 1, 31, 7, 0, '2', 's111', 'ww', '112', '33333', '', '', '', '', '', '', '', '', '', ''),
(4, 1, 31, 7, 0, '3', 's11', 'w11', '121', '444444', '', '', '', '', '', '', '', '', '', ''),
(5, 1, 31, 7, 0, '4', 'shubham', 'shubham@gmail.com', '5555', '11111111', '', '', '', '', '', '', '', '', '', ''),
(6, 1, 32, 7, 1, 'Movie_Name', 'Year ', 'Directors', 'Production companies', '', '', '', '', '', '', '', '', '', '', ''),
(7, 1, 32, 7, 0, 'Batman Begins ', '2005', 'Christopher Nolan', ' Warner Bros', '', '', '', '', '', '', '', '', '', '', ''),
(8, 1, 32, 7, 0, 'The Dark Knight', '2008', 'Christopher Nolan', ' Warner Bros', '', '', '', '', '', '', '', '', '', '', ''),
(9, 1, 32, 7, 0, 'The Dark Knight Rises', '2012', 'Christopher Nolan', ' Warner Bros', '', '', '', '', '', '', '', '', '', '', ''),
(10, 1, 32, 7, 0, 'Batman Forever', '1995', 'Joel Schumacher', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ks_post_type`
--

CREATE TABLE `ks_post_type` (
  `post_type_id` int(11) NOT NULL,
  `post_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_post_type`
--

INSERT INTO `ks_post_type` (`post_type_id`, `post_type`) VALUES
(1, 'List'),
(2, 'Text'),
(3, 'Graphic'),
(4, 'Calendar'),
(5, 'Timeline Planner');

-- --------------------------------------------------------

--
-- Table structure for table `ks_save_search`
--

CREATE TABLE `ks_save_search` (
  `save_search_id` int(11) NOT NULL,
  `search_keyword` varchar(80) NOT NULL,
  `jsondata` text NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_save_search`
--

INSERT INTO `ks_save_search` (`save_search_id`, `search_keyword`, `jsondata`, `company_id`, `user_id`) VALUES
(1, '41 calendar', '{\"username\":[\"5\",\"7\"],\"post_type\":\"\",\"title\":\"Calendar1\",\"labels\":[\"35\"],\"posts_created_from\":\"\",\"posts_created_to\":\"\",\"posts_updated_from\":\"\",\"posts_updated_to\":\"\",\"serial_from\":\"\",\"serial_to\":\"\",\"attachment\":\"\",\"tab_type\":\"1\"}', 1, 1),
(2, 'Jack\'s Search 2', '{\"username\":[\"1\"],\"post_type\":\"1\",\"title\":\"\",\"labels\":null,\"posts_created_from\":\"\",\"posts_created_to\":\"\",\"posts_updated_from\":\"\",\"posts_updated_to\":\"\",\"serial_from\":\"1\",\"serial_to\":\"20\",\"attachment\":\"\",\"tab_type\":\"1\"}', 1, 1),
(3, 'Jack Sp', '{\"username\":null,\"post_type\":\"\",\"title\":\"\",\"labels\":null,\"posts_created_from\":\"\",\"posts_created_to\":\"\",\"posts_updated_from\":\"\",\"posts_updated_to\":\"\",\"serial_from\":\"\",\"serial_to\":\"\",\"attachment\":\"\",\"tab_type\":\"1\"}', 1, 2),
(4, 'Jack', '{\"username\":null,\"post_type\":\"\",\"title\":\"\",\"labels\":null,\"posts_created_from\":\"\",\"posts_created_to\":\"\",\"posts_updated_from\":\"\",\"posts_updated_to\":\"\",\"serial_from\":\"\",\"serial_to\":\"\",\"attachment\":\"\",\"tab_type\":\"1\"}', 1, 2),
(5, 'Jack\'s search', '{\"username\":[\"1\",\"2\"],\"post_type\":\"1\",\"title\":\"\",\"labels\":null,\"posts_created_from\":\"\",\"posts_created_to\":\"\",\"posts_updated_from\":\"\",\"posts_updated_to\":\"\",\"serial_from\":\"\",\"serial_to\":\"\",\"attachment\":\"\",\"tab_type\":\"1\"}', 1, 5),
(7, 'Shanti and Jack', '{\"username\":[\"1\",\"7\"],\"post_type\":\"\",\"title\":\"\",\"labels\":[\"29\",\"33\"],\"posts_created_from\":\"\",\"posts_created_to\":\"\",\"posts_updated_from\":\"\",\"posts_updated_to\":\"\",\"serial_from\":\"\",\"serial_to\":\"\",\"attachment\":\"\",\"tab_type\":\"1\"}', 1, 1),
(8, 'Search Potter', '{\"username\":[\"2\"],\"post_type\":\"\",\"title\":\"\",\"labels\":[\"2\"],\"posts_created_from\":\"\",\"posts_created_to\":\"\",\"posts_updated_from\":\"\",\"posts_updated_to\":\"\",\"serial_from\":\"\",\"serial_to\":\"\",\"attachment\":\"\",\"tab_type\":\"1\"}', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ks_temp_postype_list`
--

CREATE TABLE `ks_temp_postype_list` (
  `temp_postype_list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `col` varchar(100) NOT NULL,
  `val` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ks_timelines`
--

CREATE TABLE `ks_timelines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `module` varchar(255) DEFAULT NULL,
  `date1` varchar(255) DEFAULT NULL,
  `date2` varchar(255) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `current_datetime` datetime NOT NULL,
  `update_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_timelines`
--

INSERT INTO `ks_timelines` (`id`, `name`, `module`, `date1`, `date2`, `company_id`, `post_id`, `creator_id`, `priority`, `current_datetime`, `update_datetime`) VALUES
(5, 'test1', 'test', 'Sat Dec 01 2018 00:00:00 GMT-0500 (Eastern Standard Time)', 'Thu Jan 31 2019 00:00:00 GMT-0500 (Eastern Standard Time)', 1, 55, 1, 0, '2018-12-25 11:21:38', '2018-12-28 19:46:19'),
(10, 'Review Documents', 'Submission Prepare', 'Thu Feb 28 2019 00:00:00 GMT-0500 (Eastern Standard Time)', 'Sun Jun 30 2019 00:00:00 GMT-0400 (Eastern Daylight Time)', 1, 56, 1, 0, '2018-12-27 05:55:12', '2018-12-28 15:46:08'),
(11, 'Event 1', 'test', 'Sat Dec 01 2018 00:00:00 GMT-0500 (Eastern Standard Time)', 'Wed Feb 27 2019 00:00:00 GMT-0500 (Eastern Standard Time)', 1, 55, 1, 0, '2018-12-27 06:15:34', '2018-12-28 19:47:34'),
(12, 'Prepare documents', 'Submission Prepare', 'Thu May 02 2019 00:00:00 GMT+0530 (India Standard Time)', 'Tue Oct 01 2019 00:00:00 GMT+0530 (India Standard Time)', 1, 56, 1, 0, '2018-12-27 12:52:49', '2018-12-29 06:47:04'),
(13, 'test', 'test', 'Sun Jan 27 2019 00:00:00 GMT+0530 (India Standard Time)', 'Thu Jan 31 2019 00:00:00 GMT+0530 (India Standard Time)', 1, 0, 1, 0, '2018-12-27 12:54:16', '2018-12-29 05:54:27'),
(14, 'test12', 'test', 'Sat Feb 02 2019 00:00:00 GMT+0530 (India Standard Time)', 'Tue Feb 26 2019 00:00:00 GMT+0530 (India Standard Time)', 1, 0, 1, 0, '2018-12-27 12:54:59', '2018-12-29 05:47:57'),
(15, 'Final Approval', 'Submission Prepare', 'Sun Sep 08 2019 00:00:00 GMT+0530 (India Standard Time)', 'Wed Apr 01 2020 00:00:00 GMT+0530 (India Standard Time)', 1, 56, 1, 0, '2018-12-28 15:55:44', '2018-12-29 06:18:05'),
(16, 'Follow up', 'After Submission', 'Sun Sep 01 2019 00:00:00 GMT-0400 (Eastern Daylight Time)', 'Wed Jan 01 2020 00:00:00 GMT-0500 (Eastern Standard Time)', 1, 56, 1, 0, '2018-12-28 15:58:11', '2018-12-29 01:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `ks_timeplanner`
--

CREATE TABLE `ks_timeplanner` (
  `timeplanner_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `text` varchar(100) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `priority` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_timeplanner`
--

INSERT INTO `ks_timeplanner` (`timeplanner_id`, `company_id`, `post_id`, `creator_id`, `text`, `startDate`, `endDate`, `priority`, `description`) VALUES
(1, 1, 95, 1, 'Win', '2018-11-18 08:00:00', '2018-11-18 09:00:00', 1, 'Winner'),
(2, 1, 95, 1, 'Gotcha', '2018-11-18 08:00:00', '2018-11-18 11:00:00', 2, 'Lovely'),
(3, 1, 95, 1, 'That', '2018-11-18 09:00:00', '2018-11-18 10:00:00', 1, 'Yahoo'),
(4, 1, 95, 1, 'My job', '2018-11-18 08:00:00', '2018-11-18 09:00:00', 3, 'Wonderfull'),
(5, 1, 95, 1, 'jai ho', '2018-11-18 09:00:00', '2018-11-18 10:00:00', 3, 'ggg'),
(6, 1, 95, 1, 'limt', '2018-11-18 09:00:00', '2018-11-18 10:00:00', 1, 'do not know'),
(7, 1, 95, 1, 'That\'s my name', '2018-11-18 09:00:00', '2018-11-18 10:00:00', 1, 'Chill Pill'),
(11, 1, 95, 1, 'OPps', '2018-11-23 08:00:00', '2018-11-23 11:00:00', 1, 'test'),
(13, 1, 51, 1, 'Test11', '1970-01-01 00:00:00', '1970-01-01 00:00:00', 1, 'Just testing here'),
(14, 1, 51, 1, 'High priority11', '2018-11-23 15:00:00', '2018-11-23 16:00:00', 2, 'testing here'),
(15, 1, 51, 1, 'Medium Test', '2018-11-23 15:00:00', '2018-11-23 16:00:00', 3, 'testsett'),
(18, 1, 51, 1, 'MMM', '2018-11-23 15:00:00', '2018-11-23 16:00:00', 3, 'hey'),
(20, 1, 52, 1, 'S1', '2018-11-27 10:00:00', '2018-11-27 11:00:00', 6, 'Test1'),
(21, 1, 52, 1, 'J2', '2018-11-27 10:00:00', '2018-11-27 11:00:00', 7, 'Test J2'),
(22, 1, 52, 1, 'K2', '2018-11-27 10:00:00', '2018-11-27 11:00:00', 8, 'K2 test'),
(23, 1, 52, 1, 't23', '2018-11-05 00:00:00', '2018-11-05 00:00:00', 6, 'testing'),
(24, 1, 52, 1, 't345', '2018-11-05 00:00:00', '2018-11-05 00:00:00', 6, 'testing'),
(25, 1, 52, 1, 't34', '1970-01-01 00:00:00', '1970-01-01 00:00:00', 10, 'testing'),
(26, 1, 52, 1, 'tst', '2018-11-04 00:00:00', '2018-11-04 00:00:00', 6, 'tesafs'),
(27, 1, 53, 1, 'Event1', '2018-11-27 00:00:00', '2018-11-27 01:00:00', 15, 'Test Event1'),
(28, 1, 53, 1, 'Event2', '2018-11-27 02:00:00', '2018-11-27 03:00:00', 15, 'Test event2'),
(29, 1, 53, 1, 'test', '2018-12-03 00:00:00', '2018-12-03 00:00:00', 15, 'test1'),
(30, 1, 55, 1, 'gfhgfhgfh', '2018-12-21 00:00:00', '2018-12-29 01:00:00', 18, 'nvbnbvn');

-- --------------------------------------------------------

--
-- Table structure for table `ks_timeplanner_priority`
--

CREATE TABLE `ks_timeplanner_priority` (
  `timeplanner_priority_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `priority_text` varchar(80) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_timeplanner_priority`
--

INSERT INTO `ks_timeplanner_priority` (`timeplanner_priority_id`, `company_id`, `post_id`, `creator_id`, `priority_text`, `color`) VALUES
(6, 1, 52, 1, 'T1', '#ffff80'),
(7, 1, 52, 1, 'T2', '#ffff00'),
(8, 1, 52, 1, 'T3', '#80ffff'),
(9, 1, 52, 1, '', '#000000'),
(10, 1, 52, 1, 'test', '#000000'),
(11, 1, 52, 1, 'testing', '#000000'),
(12, 1, 52, 1, '', '#000000'),
(13, 1, 52, 1, '', '#000000'),
(14, 1, 52, 1, 'Check again', '#000000'),
(15, 1, 53, 1, 'Time1', '#000080'),
(18, 1, 55, 1, 'test1', '#004000');

-- --------------------------------------------------------

--
-- Table structure for table `ks_users`
--

CREATE TABLE `ks_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(70) NOT NULL,
  `interests` varchar(100) NOT NULL,
  `domain` varchar(50) NOT NULL,
  `login_status` tinyint(4) NOT NULL COMMENT '1 user login, 0 not login',
  `is_super_user` tinyint(1) NOT NULL COMMENT '1 super user, 0 not',
  `company_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ks_users`
--

INSERT INTO `ks_users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `interests`, `domain`, `login_status`, `is_super_user`, `company_id`, `created_date`) VALUES
(1, 'Jack', 'Sp', 'jack@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 1, 1, 1, '0000-00-00 00:00:00'),
(2, 'Lucky', 'Potter', 'luckyp@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 1, 0, 1, '0000-00-00 00:00:00'),
(3, 'Micky', 'Js', 'mickyj@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 1, 0, 1, '0000-00-00 00:00:00'),
(4, 'Lupin', 'Duck', 'lupind@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 1, 0, 1, '0000-00-00 00:00:00'),
(5, 'Zender', 'Cage', 'zenderc@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 1, 0, 1, '0000-00-00 00:00:00'),
(6, 'Ms', 'Saikh', 'mss@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 1, 1, 1, '0000-00-00 00:00:00'),
(7, 'Shanti', 'Nath', 'shantin@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 1, 0, 1, '0000-00-00 00:00:00'),
(8, 'Pintu', 'Bhasker', 'pintub@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 1, 0, 1, '0000-00-00 00:00:00'),
(9, 'Chintu', 'Bharare', 'chintub@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 1, 0, 1, '0000-00-00 00:00:00'),
(10, 'Kashav', 'Karma', 'kashavk@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 1, 0, 1, '0000-00-00 00:00:00'),
(11, 'Sunil', 'Dangi', 'sudg@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 1, 0, 1, '2018-11-17 14:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `ks_viewed_post`
--

CREATE TABLE `ks_viewed_post` (
  `viewed_post_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `viewed_by` int(11) NOT NULL,
  `post_creator_id` int(11) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_viewed_post`
--

INSERT INTO `ks_viewed_post` (`viewed_post_id`, `company_id`, `post_id`, `viewed_by`, `post_creator_id`, `created_date`) VALUES
(1, 1, 1, 5, 1, '2018-06-20'),
(2, 1, 1, 6, 1, '2018-06-20'),
(3, 1, 9, 3, 1, '2018-06-21'),
(4, 1, 19, 1, 6, '2018-06-26'),
(5, 1, 25, 6, 7, '2018-07-09'),
(6, 1, 25, 3, 7, '2018-07-10'),
(7, 1, 26, 2, 7, '2018-07-21'),
(8, 1, 27, 7, 1, '2018-07-21'),
(9, 1, 29, 1, 7, '2018-07-21'),
(10, 1, 28, 1, 7, '2018-07-21'),
(11, 1, 25, 1, 7, '2018-07-21'),
(12, 1, 26, 1, 7, '2018-07-21'),
(13, 1, 30, 7, 1, '2018-07-23'),
(14, 1, 33, 1, 7, '2018-07-27'),
(15, 1, 23, 1, 7, '2018-07-27'),
(16, 1, 35, 7, 1, '2018-07-30'),
(17, 1, 34, 7, 1, '2018-07-30'),
(18, 1, 37, 1, 7, '2018-08-03'),
(19, 1, 38, 7, 1, '2018-08-04'),
(20, 1, 36, 1, 7, '2018-08-04'),
(21, 1, 38, 2, 1, '2018-08-19'),
(22, 1, 37, 2, 7, '2018-08-19'),
(23, 1, 33, 2, 7, '2018-08-19'),
(24, 1, 35, 2, 1, '2018-08-19'),
(25, 1, 40, 7, 1, '2018-08-24'),
(26, 1, 40, 2, 1, '2018-08-24'),
(27, 1, 36, 2, 7, '2018-08-24'),
(28, 1, 41, 2, 7, '2018-08-24'),
(29, 1, 41, 1, 7, '2018-08-24'),
(30, 1, 41, 4, 7, '2018-08-28'),
(31, 1, 40, 4, 1, '2018-08-28'),
(32, 1, 38, 4, 1, '2018-08-28'),
(33, 1, 36, 4, 7, '2018-08-28'),
(34, 1, 41, 3, 7, '2018-08-28'),
(35, 1, 30, 2, 1, '2018-08-30'),
(36, 1, 9, 1, 5, '2018-08-31'),
(37, 1, 31, 1, 7, '2018-08-31'),
(38, 1, 40, 1, 5, '2018-08-31'),
(39, 1, 39, 2, 1, '2018-09-02'),
(40, 1, 39, 5, 1, '2018-09-02'),
(41, 1, 39, 7, 1, '2018-09-02'),
(42, 1, 40, 5, 1, '2018-09-08'),
(43, 1, 13, 1, 3, '2018-09-15'),
(44, 1, 44, 1, 7, '2018-09-15'),
(45, 1, 2, 7, 1, '2018-09-15'),
(46, 1, 21, 1, 7, '2018-09-17'),
(47, 1, 43, 7, 1, '2018-09-18'),
(48, 1, 44, 2, 7, '2018-09-22'),
(49, 1, 1, 2, 1, '2018-09-22'),
(50, 1, 43, 5, 1, '2018-09-22'),
(51, 1, 45, 2, 1, '2018-09-24'),
(52, 1, 41, 5, 7, '2018-09-25'),
(53, 1, 45, 5, 1, '2018-09-25'),
(54, 1, 24, 1, 7, '2018-10-01'),
(55, 1, 43, 2, 1, '2018-10-02'),
(56, 1, 45, 8, 1, '2018-10-02'),
(57, 1, 32, 1, 7, '2018-10-05'),
(58, 1, 34, 2, 1, '2018-10-13'),
(59, 1, 18, 1, 7, '2018-10-16'),
(60, 1, 19, 2, 6, '2018-10-18'),
(61, 1, 41, 1, 7, '2018-11-15'),
(62, 1, 34, 11, 1, '2018-11-17'),
(63, 1, 44, 1, 7, '2018-11-17'),
(64, 1, 9, 1, 5, '2018-11-17'),
(65, 1, 36, 2, 7, '2018-11-17'),
(66, 1, 41, 1, 7, '2018-11-19'),
(67, 1, 44, 1, 7, '2018-11-22'),
(68, 1, 45, 5, 1, '2018-11-22'),
(69, 1, 51, 2, 1, '2018-11-23'),
(70, 1, 51, 2, 1, '2018-11-25'),
(71, 1, 33, 1, 7, '2018-11-25'),
(72, 1, 41, 1, 7, '2018-11-25'),
(73, 1, 44, 1, 7, '2018-11-25'),
(74, 1, 37, 1, 7, '2018-12-01'),
(75, 1, 31, 1, 7, '2018-12-01'),
(76, 1, 33, 1, 7, '2018-12-01'),
(77, 1, 25, 2, 7, '2018-12-08'),
(78, 1, 31, 1, 7, '2018-12-21'),
(79, 1, 31, 2, 7, '2018-12-21'),
(80, 1, 45, 2, 1, '2018-12-21'),
(81, 1, 41, 1, 7, '2018-12-22'),
(82, 1, 55, 5, 1, '2018-12-22'),
(83, 1, 13, 1, 3, '2018-12-22'),
(84, 1, 25, 2, 7, '2018-12-22'),
(85, 1, 31, 2, 7, '2018-12-22'),
(86, 1, 53, 6, 1, '2018-12-22'),
(87, 1, 37, 6, 7, '2018-12-22'),
(88, 1, 27, 6, 1, '2018-12-22'),
(89, 1, 24, 1, 7, '2018-12-24'),
(90, 1, 44, 1, 7, '2018-12-24'),
(91, 1, 13, 1, 3, '2018-12-24'),
(92, 1, 31, 1, 7, '2018-12-24'),
(93, 1, 53, 2, 1, '2018-12-29'),
(94, 1, 52, 2, 1, '2018-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `ks_viewed_post_bkup14nov2018`
--

CREATE TABLE `ks_viewed_post_bkup14nov2018` (
  `viewed_post_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `viewed_by` int(11) NOT NULL,
  `post_creator_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_viewed_post_bkup14nov2018`
--

INSERT INTO `ks_viewed_post_bkup14nov2018` (`viewed_post_id`, `company_id`, `post_id`, `viewed_by`, `post_creator_id`, `created_date`) VALUES
(1, 1, 1, 5, 1, '2018-06-20 09:33:01'),
(2, 1, 1, 6, 1, '2018-06-20 10:27:33'),
(3, 1, 9, 3, 1, '2018-06-21 15:28:23'),
(4, 1, 19, 1, 6, '2018-06-26 08:58:03'),
(5, 1, 25, 6, 7, '2018-07-09 09:55:48'),
(6, 1, 25, 3, 7, '2018-07-10 15:43:19'),
(7, 1, 26, 2, 7, '2018-07-21 14:27:23'),
(8, 1, 27, 7, 1, '2018-07-21 14:53:06'),
(9, 1, 29, 1, 7, '2018-07-21 20:09:44'),
(10, 1, 28, 1, 7, '2018-07-21 20:14:24'),
(11, 1, 25, 1, 7, '2018-07-21 20:17:29'),
(12, 1, 26, 1, 7, '2018-07-21 20:38:03'),
(13, 1, 30, 7, 1, '2018-07-23 10:02:01'),
(14, 1, 33, 1, 7, '2018-07-27 22:32:35'),
(15, 1, 23, 1, 7, '2018-07-27 22:40:55'),
(16, 1, 35, 7, 1, '2018-07-30 05:50:52'),
(17, 1, 34, 7, 1, '2018-07-30 05:51:57'),
(18, 1, 37, 1, 7, '2018-08-03 18:32:01'),
(19, 1, 38, 7, 1, '2018-08-04 10:12:02'),
(20, 1, 36, 1, 7, '2018-08-04 12:50:25'),
(21, 1, 38, 2, 1, '2018-08-19 02:50:30'),
(22, 1, 37, 2, 7, '2018-08-19 02:51:21'),
(23, 1, 33, 2, 7, '2018-08-19 02:52:31'),
(24, 1, 35, 2, 1, '2018-08-19 02:55:02'),
(25, 1, 40, 7, 1, '2018-08-24 14:32:52'),
(26, 1, 40, 2, 1, '2018-08-24 18:49:56'),
(27, 1, 36, 2, 7, '2018-08-24 18:50:36'),
(28, 1, 41, 2, 7, '2018-08-24 19:23:42'),
(29, 1, 41, 1, 7, '2018-08-24 20:22:37'),
(30, 1, 41, 4, 7, '2018-08-28 11:22:27'),
(31, 1, 40, 4, 1, '2018-08-28 11:22:44'),
(32, 1, 38, 4, 1, '2018-08-28 11:23:00'),
(33, 1, 36, 4, 7, '2018-08-28 11:23:09'),
(34, 1, 41, 3, 7, '2018-08-28 11:27:08'),
(35, 1, 30, 2, 1, '2018-08-30 01:11:12'),
(36, 1, 9, 1, 5, '2018-08-31 16:24:13'),
(37, 1, 31, 1, 7, '2018-08-31 19:23:33'),
(38, 1, 40, 1, 5, '2018-08-31 19:40:06'),
(39, 1, 39, 2, 1, '2018-09-02 19:18:58'),
(40, 1, 39, 5, 1, '2018-09-02 19:21:42'),
(41, 1, 39, 7, 1, '2018-09-02 19:24:05'),
(42, 1, 40, 5, 1, '2018-09-08 19:10:15'),
(43, 1, 13, 1, 3, '2018-09-15 20:43:13'),
(44, 1, 44, 1, 7, '2018-09-15 21:26:52'),
(45, 1, 2, 7, 1, '2018-09-15 22:15:32'),
(46, 1, 21, 1, 7, '2018-09-17 13:56:23'),
(47, 1, 43, 7, 1, '2018-09-18 01:26:05'),
(48, 1, 44, 2, 7, '2018-09-22 13:16:35'),
(49, 1, 1, 2, 1, '2018-09-22 13:59:22'),
(50, 1, 43, 5, 1, '2018-09-22 15:27:55'),
(51, 1, 45, 2, 1, '2018-09-24 07:57:15'),
(52, 1, 41, 5, 7, '2018-09-25 02:25:03'),
(53, 1, 45, 5, 1, '2018-09-25 02:25:12'),
(54, 1, 24, 1, 7, '2018-10-01 15:05:33'),
(55, 1, 43, 2, 1, '2018-10-02 00:39:35'),
(56, 1, 45, 8, 1, '2018-10-02 02:23:28'),
(57, 1, 32, 1, 7, '2018-10-05 06:23:27'),
(58, 1, 34, 2, 1, '2018-10-13 19:47:49'),
(59, 1, 18, 1, 7, '2018-10-16 06:25:19'),
(60, 1, 19, 2, 6, '2018-10-18 02:56:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `ks_admin`
--
ALTER TABLE `ks_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ks_comment`
--
ALTER TABLE `ks_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `ks_company`
--
ALTER TABLE `ks_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `ks_followed_post`
--
ALTER TABLE `ks_followed_post`
  ADD PRIMARY KEY (`followed_post_id`);

--
-- Indexes for table `ks_helpful_post`
--
ALTER TABLE `ks_helpful_post`
  ADD PRIMARY KEY (`helpful_post_id`);

--
-- Indexes for table `ks_history`
--
ALTER TABLE `ks_history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `ks_label`
--
ALTER TABLE `ks_label`
  ADD PRIMARY KEY (`label_id`);

--
-- Indexes for table `ks_notification`
--
ALTER TABLE `ks_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `ks_notification_msg`
--
ALTER TABLE `ks_notification_msg`
  ADD PRIMARY KEY (`notification_msg_id`);

--
-- Indexes for table `ks_post`
--
ALTER TABLE `ks_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `ks_post_attachment`
--
ALTER TABLE `ks_post_attachment`
  ADD PRIMARY KEY (`post_attachment_id`);

--
-- Indexes for table `ks_post_calendar`
--
ALTER TABLE `ks_post_calendar`
  ADD PRIMARY KEY (`post_calender_id`);

--
-- Indexes for table `ks_post_co_owner`
--
ALTER TABLE `ks_post_co_owner`
  ADD PRIMARY KEY (`post_co_owner_id`);

--
-- Indexes for table `ks_post_graphic`
--
ALTER TABLE `ks_post_graphic`
  ADD PRIMARY KEY (`post_graphic_id`);

--
-- Indexes for table `ks_post_list`
--
ALTER TABLE `ks_post_list`
  ADD PRIMARY KEY (`post_list_id`);

--
-- Indexes for table `ks_post_type`
--
ALTER TABLE `ks_post_type`
  ADD PRIMARY KEY (`post_type_id`);

--
-- Indexes for table `ks_save_search`
--
ALTER TABLE `ks_save_search`
  ADD PRIMARY KEY (`save_search_id`);

--
-- Indexes for table `ks_temp_postype_list`
--
ALTER TABLE `ks_temp_postype_list`
  ADD PRIMARY KEY (`temp_postype_list_id`);

--
-- Indexes for table `ks_timelines`
--
ALTER TABLE `ks_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ks_timeplanner`
--
ALTER TABLE `ks_timeplanner`
  ADD PRIMARY KEY (`timeplanner_id`);

--
-- Indexes for table `ks_timeplanner_priority`
--
ALTER TABLE `ks_timeplanner_priority`
  ADD PRIMARY KEY (`timeplanner_priority_id`);

--
-- Indexes for table `ks_users`
--
ALTER TABLE `ks_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `ks_viewed_post`
--
ALTER TABLE `ks_viewed_post`
  ADD PRIMARY KEY (`viewed_post_id`);

--
-- Indexes for table `ks_viewed_post_bkup14nov2018`
--
ALTER TABLE `ks_viewed_post_bkup14nov2018`
  ADD PRIMARY KEY (`viewed_post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ks_admin`
--
ALTER TABLE `ks_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ks_comment`
--
ALTER TABLE `ks_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `ks_company`
--
ALTER TABLE `ks_company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ks_followed_post`
--
ALTER TABLE `ks_followed_post`
  MODIFY `followed_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ks_helpful_post`
--
ALTER TABLE `ks_helpful_post`
  MODIFY `helpful_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ks_history`
--
ALTER TABLE `ks_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `ks_label`
--
ALTER TABLE `ks_label`
  MODIFY `label_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `ks_notification`
--
ALTER TABLE `ks_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `ks_notification_msg`
--
ALTER TABLE `ks_notification_msg`
  MODIFY `notification_msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ks_post`
--
ALTER TABLE `ks_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `ks_post_attachment`
--
ALTER TABLE `ks_post_attachment`
  MODIFY `post_attachment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `ks_post_calendar`
--
ALTER TABLE `ks_post_calendar`
  MODIFY `post_calender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ks_post_co_owner`
--
ALTER TABLE `ks_post_co_owner`
  MODIFY `post_co_owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ks_post_graphic`
--
ALTER TABLE `ks_post_graphic`
  MODIFY `post_graphic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ks_post_list`
--
ALTER TABLE `ks_post_list`
  MODIFY `post_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ks_post_type`
--
ALTER TABLE `ks_post_type`
  MODIFY `post_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ks_save_search`
--
ALTER TABLE `ks_save_search`
  MODIFY `save_search_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ks_temp_postype_list`
--
ALTER TABLE `ks_temp_postype_list`
  MODIFY `temp_postype_list_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ks_timelines`
--
ALTER TABLE `ks_timelines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ks_timeplanner`
--
ALTER TABLE `ks_timeplanner`
  MODIFY `timeplanner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ks_timeplanner_priority`
--
ALTER TABLE `ks_timeplanner_priority`
  MODIFY `timeplanner_priority_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ks_users`
--
ALTER TABLE `ks_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ks_viewed_post`
--
ALTER TABLE `ks_viewed_post`
  MODIFY `viewed_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `ks_viewed_post_bkup14nov2018`
--
ALTER TABLE `ks_viewed_post_bkup14nov2018`
  MODIFY `viewed_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
