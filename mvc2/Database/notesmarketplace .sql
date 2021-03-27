-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 11:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notesmarketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `CountryCode` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`ID`, `Name`, `CountryCode`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'India', '+91', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01'),
(2, 'Afganistan', '+33', NULL, NULL, NULL, NULL, b'01'),
(3, 'Australia', '+61', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01'),
(4, 'canada', '+1', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `Seller` int(11) NOT NULL,
  `Downloader` int(11) NOT NULL,
  `IsSellerHasAllowedDownload` bit(2) NOT NULL,
  `AttachmentPath` varchar(10000) DEFAULT NULL,
  `IsAttachmentDownloaded` bit(2) NOT NULL,
  `AttachmentDownloadedDate` datetime NOT NULL,
  `IsPaid` bit(2) NOT NULL,
  `PurchasedPrice` decimal(10,0) DEFAULT NULL,
  `NoteTitle` varchar(100) NOT NULL,
  `NoteCategory` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`ID`, `NoteID`, `Seller`, `Downloader`, `IsSellerHasAllowedDownload`, `AttachmentPath`, `IsAttachmentDownloaded`, `AttachmentDownloadedDate`, `IsPaid`, `PurchasedPrice`, `NoteTitle`, `NoteCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
(1, 1, 13, 13, b'01', 'uploads/13/1/attachments/104032021035752.pdf', b'01', '2021-03-17 18:44:10', b'00', '0', 'compute', '2', '2021-03-17 18:44:10', 13, NULL, NULL),
(2, 1, 13, 13, b'01', 'uploads/13/1/attachments/104032021035752.pdf', b'01', '2021-03-17 18:49:17', b'00', '0', 'compute', '2', '2021-03-17 18:49:17', 13, NULL, NULL),
(5, 1, 13, 1, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-18 16:22:05', b'00', '0', 'compute', '2', '2021-03-18 16:22:05', 1, NULL, NULL),
(6, 2, 13, 1, b'01', 'uploads/Members//13/2/attachments/3904032021040537.pdf', b'01', '2021-03-18 16:22:25', b'00', '0', 'cs', '2', '2021-03-18 16:22:25', 1, NULL, NULL),
(7, 3, 13, 1, b'01', 'uploads/Members/13/3/attachments/4004032021041759.pdf', b'01', '2021-03-18 16:22:44', b'00', '0', 'AI', '2', '2021-03-18 16:22:44', 1, NULL, NULL),
(8, 4, 13, 1, b'01', 'uploads/Members/13/4/attachments/4104032021042053.pdf', b'01', '2021-03-18 16:23:03', b'00', '0', 'social', '2', '2021-03-18 16:23:03', 1, NULL, NULL),
(9, 1, 13, 1, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-18 16:23:20', b'00', '0', 'compute', '2', '2021-03-18 16:23:20', 1, NULL, NULL),
(10, 1, 13, 1, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-18 16:23:40', b'00', '0', 'compute', '2', '2021-03-18 16:23:40', 1, NULL, NULL),
(11, 1, 13, 13, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-19 13:08:02', b'00', '0', 'compute', '2', '2021-03-19 13:08:02', 13, NULL, NULL),
(13, 24, 1, 1, b'01', 'uploads/Members/1/24/attachments/4818032021015402.pdf', b'01', '2021-03-20 15:40:50', b'01', '1233', 'Mobile', '2', '2021-03-20 15:40:50', 1, NULL, NULL),
(14, 25, 1, 1, b'01', 'uploads/Members/1/25/attachments/4918032021020532.pdf', b'01', '2021-03-20 15:51:52', b'01', '1342', 'Web Design', '1', '2021-03-20 15:51:52', 1, NULL, NULL),
(15, 1, 13, 1, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-21 11:51:50', b'00', '0', 'compute', '2', '2021-03-21 11:51:50', 1, NULL, NULL),
(16, 2, 13, 1, b'01', 'uploads/Members//13/2/attachments/3904032021040537.pdf', b'01', '2021-03-21 11:52:08', b'00', '0', 'cs', '2', '2021-03-21 11:52:08', 1, NULL, NULL),
(17, 1, 13, 24, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-22 16:54:53', b'00', '0', 'compute', '2', '2021-03-22 16:54:53', 24, NULL, NULL),
(23, 1, 13, 1, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-23 17:02:26', b'00', '0', 'compute', '2', '2021-03-23 17:02:26', 1, NULL, NULL),
(24, 1, 13, 1, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-23 17:04:03', b'00', '0', 'compute', '2', '2021-03-23 17:04:03', 1, NULL, NULL),
(25, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 17:12:53', b'00', '0', 'Cancer', '2', '2021-03-23 17:12:53', 1, NULL, NULL),
(26, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 17:12:53', b'00', '0', 'Cancer', '2', '2021-03-23 17:12:53', 1, NULL, NULL),
(27, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 17:25:56', b'00', '0', 'Cancer', '2', '2021-03-23 17:25:56', 1, NULL, NULL),
(28, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 17:39:23', b'00', '0', 'Cancer', '2', '2021-03-23 17:39:23', 1, NULL, NULL),
(29, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 17:39:23', b'00', '0', 'Cancer', '2', '2021-03-23 17:39:23', 1, NULL, NULL),
(30, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 17:40:28', b'00', '0', 'Cancer', '2', '2021-03-23 17:40:28', 1, NULL, NULL),
(31, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 17:40:28', b'00', '0', 'Cancer', '2', '2021-03-23 17:40:28', 1, NULL, NULL),
(32, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 17:45:25', b'00', '0', 'Cancer', '2', '2021-03-23 17:45:25', 1, NULL, NULL),
(33, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 17:45:25', b'00', '0', 'Cancer', '2', '2021-03-23 17:45:25', 1, NULL, NULL),
(34, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:10:07', b'00', '0', 'Cancer', '2', '2021-03-23 18:10:07', 1, NULL, NULL),
(35, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:10:07', b'00', '0', 'Cancer', '2', '2021-03-23 18:10:07', 1, NULL, NULL),
(36, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:12:34', b'00', '0', 'Cancer', '2', '2021-03-23 18:12:34', 1, NULL, NULL),
(37, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:12:34', b'00', '0', 'Cancer', '2', '2021-03-23 18:12:34', 1, NULL, NULL),
(38, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:15:22', b'00', '0', 'Cancer', '2', '2021-03-23 18:15:22', 1, NULL, NULL),
(39, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:15:23', b'00', '0', 'Cancer', '2', '2021-03-23 18:15:23', 1, NULL, NULL),
(40, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:15:55', b'00', '0', 'Cancer', '2', '2021-03-23 18:15:55', 1, NULL, NULL),
(41, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:15:55', b'00', '0', 'Cancer', '2', '2021-03-23 18:15:55', 1, NULL, NULL),
(42, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:20:03', b'00', '0', 'Cancer', '2', '2021-03-23 18:20:03', 1, NULL, NULL),
(43, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:20:04', b'00', '0', 'Cancer', '2', '2021-03-23 18:20:04', 1, NULL, NULL),
(44, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:21:12', b'00', '0', 'Cancer', '2', '2021-03-23 18:21:12', 1, NULL, NULL),
(45, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:21:12', b'00', '0', 'Cancer', '2', '2021-03-23 18:21:12', 1, NULL, NULL),
(46, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:24:54', b'00', '0', 'Cancer', '2', '2021-03-23 18:24:54', 1, NULL, NULL),
(47, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:24:54', b'00', '0', 'Cancer', '2', '2021-03-23 18:24:54', 1, NULL, NULL),
(48, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:28:17', b'00', '0', 'Cancer', '2', '2021-03-23 18:28:17', 1, NULL, NULL),
(49, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:28:17', b'00', '0', 'Cancer', '2', '2021-03-23 18:28:17', 1, NULL, NULL),
(50, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:28:29', b'00', '0', 'Cancer', '2', '2021-03-23 18:28:29', 1, NULL, NULL),
(51, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:28:29', b'00', '0', 'Cancer', '2', '2021-03-23 18:28:29', 1, NULL, NULL),
(52, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:28:55', b'00', '0', 'Cancer', '2', '2021-03-23 18:28:55', 1, NULL, NULL),
(53, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:28:55', b'00', '0', 'Cancer', '2', '2021-03-23 18:28:55', 1, NULL, NULL),
(54, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:35:35', b'00', '0', 'Cancer', '2', '2021-03-23 18:35:35', 1, NULL, NULL),
(55, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:35:35', b'00', '0', 'Cancer', '2', '2021-03-23 18:35:35', 1, NULL, NULL),
(56, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:48:21', b'00', '0', 'Cancer', '2', '2021-03-23 18:48:21', 1, NULL, NULL),
(57, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:48:21', b'00', '0', 'Cancer', '2', '2021-03-23 18:48:21', 1, NULL, NULL),
(58, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:52:29', b'00', '0', 'Cancer', '2', '2021-03-23 18:52:29', 1, NULL, NULL),
(59, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:52:29', b'00', '0', 'Cancer', '2', '2021-03-23 18:52:29', 1, NULL, NULL),
(60, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 19:10:04', b'00', '0', 'Cancer', '2', '2021-03-23 19:10:04', 1, NULL, NULL),
(61, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 19:10:05', b'00', '0', 'Cancer', '2', '2021-03-23 19:10:05', 1, NULL, NULL),
(62, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 19:13:35', b'00', '0', 'Cancer', '2', '2021-03-23 19:13:35', 1, NULL, NULL),
(63, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 19:13:35', b'00', '0', 'Cancer', '2', '2021-03-23 19:13:35', 1, NULL, NULL),
(64, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 19:18:03', b'00', '0', 'Cancer', '2', '2021-03-23 19:18:03', 1, NULL, NULL),
(65, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 19:18:03', b'00', '0', 'Cancer', '2', '2021-03-23 19:18:03', 1, NULL, NULL),
(66, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 19:19:00', b'00', '0', 'Cancer', '2', '2021-03-23 19:19:00', 1, NULL, NULL),
(67, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 19:19:00', b'00', '0', 'Cancer', '2', '2021-03-23 19:19:00', 1, NULL, NULL),
(68, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 19:19:51', b'00', '0', 'Cancer', '2', '2021-03-23 19:19:51', 1, NULL, NULL),
(69, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 19:19:52', b'00', '0', 'Cancer', '2', '2021-03-23 19:19:52', 1, NULL, NULL),
(70, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 19:26:54', b'00', '0', 'Cancer', '2', '2021-03-23 19:26:54', 1, NULL, NULL),
(71, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 19:26:54', b'00', '0', 'Cancer', '2', '2021-03-23 19:26:54', 1, NULL, NULL),
(72, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 19:32:48', b'00', '0', 'Cancer', '2', '2021-03-23 19:32:48', 1, NULL, NULL),
(73, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 19:32:48', b'00', '0', 'Cancer', '2', '2021-03-23 19:32:48', 1, NULL, NULL),
(74, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 19:33:10', b'00', '0', 'Cancer', '2', '2021-03-23 19:33:10', 1, NULL, NULL),
(75, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 19:33:10', b'00', '0', 'Cancer', '2', '2021-03-23 19:33:10', 1, NULL, NULL),
(76, 30, 13, 13, b'01', 'uploads/Members/13/30/attachments/5525032021105725.pdf', b'01', '2021-03-25 10:59:20', b'01', '100', 'INDIA', '3', '2021-03-25 10:59:20', 13, NULL, NULL),
(77, 30, 13, 13, b'01', 'uploads/Members/13/30/attachments/5625032021105725.pdf', b'01', '2021-03-25 10:59:20', b'01', '100', 'INDIA', '3', '2021-03-25 10:59:20', 13, NULL, NULL),
(78, 30, 13, 13, b'01', 'uploads/Members/13/30/attachments/5725032021105725.pdf', b'01', '2021-03-25 10:59:20', b'01', '100', 'INDIA', '3', '2021-03-25 10:59:20', 13, NULL, NULL),
(79, 30, 13, 1, b'01', 'uploads/Members/13/30/attachments/5525032021105725.pdf', b'01', '2021-03-25 11:05:52', b'01', '100', 'INDIA', '3', '2021-03-25 11:00:28', 1, NULL, NULL),
(80, 30, 13, 1, b'01', 'uploads/Members/13/30/attachments/5625032021105725.pdf', b'01', '2021-03-25 11:05:52', b'01', '100', 'INDIA', '3', '2021-03-25 11:00:28', 1, NULL, NULL),
(81, 30, 13, 1, b'01', 'uploads/Members/13/30/attachments/5725032021105725.pdf', b'01', '2021-03-25 11:05:52', b'01', '100', 'INDIA', '3', '2021-03-25 11:00:28', 1, NULL, NULL),
(82, 31, 1, 13, b'01', 'uploads/Members/1/31/attachments/5825032021011636.pdf', b'01', '2021-03-25 13:23:32', b'01', '1233', 'England', '1', '2021-03-25 13:21:21', 13, NULL, NULL),
(83, 30, 13, 1, b'01', 'uploads/Members/13/30/attachments/5525032021105725.pdf', b'01', '2021-03-26 15:08:14', b'01', '100', 'INDIA', '3', '2021-03-26 15:08:14', 1, NULL, NULL),
(84, 30, 13, 1, b'01', 'uploads/Members/13/30/attachments/5625032021105725.pdf', b'01', '2021-03-26 15:08:15', b'01', '100', 'INDIA', '3', '2021-03-26 15:08:15', 1, NULL, NULL),
(85, 30, 13, 1, b'01', 'uploads/Members/13/30/attachments/5725032021105725.pdf', b'01', '2021-03-26 15:08:15', b'01', '100', 'INDIA', '3', '2021-03-26 15:08:15', 1, NULL, NULL),
(86, 1, 13, 13, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-26 16:43:14', b'00', '0', 'compute', '2', '2021-03-26 16:43:14', 13, NULL, NULL),
(87, 31, 1, 13, b'01', 'uploads/Members/1/31/attachments/5825032021011636.pdf', b'01', '2021-03-26 16:44:07', b'01', '1233', 'England', '1', '2021-03-26 16:44:07', 13, NULL, NULL),
(88, 1, 13, 25, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-26 17:46:49', b'00', '0', 'compute', '2', '2021-03-26 17:46:49', 25, NULL, NULL),
(89, 2, 13, 25, b'01', 'uploads/Members//13/2/attachments/3904032021040537.pdf', b'01', '2021-03-26 17:48:35', b'00', '0', 'cs', '2', '2021-03-26 17:48:35', 25, NULL, NULL),
(90, 30, 13, 25, b'01', 'uploads/Members/13/30/attachments/5525032021105725.pdf', b'01', '2021-03-26 18:16:20', b'01', '100', 'INDIA', '3', '2021-03-26 17:50:16', 25, NULL, NULL),
(91, 30, 13, 25, b'01', 'uploads/Members/13/30/attachments/5625032021105725.pdf', b'01', '2021-03-26 18:16:20', b'01', '100', 'INDIA', '3', '2021-03-26 17:50:16', 25, NULL, NULL),
(92, 30, 13, 25, b'01', 'uploads/Members/13/30/attachments/5725032021105725.pdf', b'01', '2021-03-26 18:16:20', b'01', '100', 'INDIA', '3', '2021-03-26 17:50:16', 25, NULL, NULL),
(93, 31, 1, 25, b'01', 'uploads/Members/1/31/attachments/5825032021011636.pdf', b'01', '2021-03-26 18:14:57', b'01', '1233', 'England', '1', '2021-03-26 18:01:52', 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notecategories`
--

CREATE TABLE `notecategories` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(10000) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notecategories`
--

INSERT INTO `notecategories` (`ID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'science', 'abcd efggefdvvhk', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01'),
(2, 'Commerce', 'sdvdbgfbg', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01'),
(3, 'English', 'ffdkfd aejfgsd', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `notetypes`
--

CREATE TABLE `notetypes` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(10000) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notetypes`
--

INSERT INTO `notetypes` (`ID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'val1', 'abdeeddf', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01'),
(2, 'val2', 'xdvvxcv', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `referencedata`
--

CREATE TABLE `referencedata` (
  `ID` int(11) NOT NULL,
  `Value` varchar(100) NOT NULL,
  `DataValue` varchar(100) NOT NULL,
  `RefCategory` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referencedata`
--

INSERT INTO `referencedata` (`ID`, `Value`, `DataValue`, `RefCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Male', 'M', 'Gender', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01'),
(2, 'Female', 'Fe', 'Gender', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01'),
(3, 'Unknown', 'U', 'Gender', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01'),
(4, 'Paid', 'P', 'Selling Mode', '2021-02-21 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01'),
(5, 'Free', 'F', 'Selling Mode', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01'),
(6, 'Draft', 'Draft', 'Notes Status', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01'),
(7, 'Submitted For Review', 'Submitted For Review', 'Notes Status', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01'),
(8, 'In Review', 'In Review', 'Notes Status', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01'),
(9, 'Published', 'Approved', 'Notes Status', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01'),
(10, 'Rejected', 'Rejected', 'Notes Status', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01'),
(11, 'Removed', 'Removed', 'Notes Status', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotes`
--

CREATE TABLE `sellernotes` (
  `ID` int(11) NOT NULL,
  `SellerID` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `ActionedBy` int(11) DEFAULT NULL,
  `AdminRemarks` varchar(1000) DEFAULT NULL,
  `PublishedDate` datetime DEFAULT NULL,
  `Title` varchar(100) NOT NULL,
  `Category` int(11) NOT NULL,
  `DisplayPicture` varchar(500) DEFAULT NULL,
  `NoteType` int(11) DEFAULT NULL,
  `NumberofPages` int(11) DEFAULT NULL,
  `Description` varchar(1000) NOT NULL,
  `UniversityName` varchar(200) DEFAULT NULL,
  `Country` int(11) DEFAULT NULL,
  `Course` varchar(100) DEFAULT NULL,
  `CourseCode` varchar(100) DEFAULT NULL,
  `Professor` varchar(100) DEFAULT NULL,
  `IsPaid` bit(2) NOT NULL,
  `SellingPrice` decimal(10,0) DEFAULT NULL,
  `NotesPreview` varchar(1000) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellernotes`
--

INSERT INTO `sellernotes` (`ID`, `SellerID`, `Status`, `ActionedBy`, `AdminRemarks`, `PublishedDate`, `Title`, `Category`, `DisplayPicture`, `NoteType`, `NumberofPages`, `Description`, `UniversityName`, `Country`, `Course`, `CourseCode`, `Professor`, `IsPaid`, `SellingPrice`, `NotesPreview`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 13, 9, 1, 'nikhil is good', '2021-03-04 15:57:52', 'compute', 2, 'DP_04032021035752.png', 1, 1, 'lorem ipsum abcd', 'LJ', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', NULL, NULL, NULL, NULL, b'01'),
(2, 13, 9, 1, 'nikhil is good', '2021-03-04 16:05:37', 'cs', 2, 'DP_04032021040537.png', 1, 1, 'lorem ipsum', 'LJ', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', NULL, NULL, NULL, NULL, b'01'),
(3, 13, 9, 1, 'nikhil is good', '2021-03-04 16:17:59', 'AI', 2, 'DP_04032021041759.png', 1, 1, 'abcdefg', 'LJ', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', NULL, NULL, NULL, NULL, b'01'),
(4, 13, 9, 1, 'nikhil is good', '2021-03-04 16:20:53', 'social', 2, 'DP_04032021042053.png', 1, 1, 'abcdefg', 'LJ', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', NULL, NULL, NULL, NULL, b'01'),
(7, 13, 9, 1, 'nikhil is good', '2021-03-04 16:20:53', 'ipsum', 2, 'DP_04032021042053.png', 1, 1, 'abcdefg', 'LJ', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', NULL, NULL, NULL, NULL, b'01'),
(8, 13, 9, 1, 'nikhil is good', '2021-03-04 16:20:53', 'python', 2, 'DP_04032021042053.png', 1, 1, 'abcdefg', 'LJ', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', NULL, NULL, NULL, NULL, b'01'),
(10, 13, 9, 1, 'nikhil is good', '2021-03-04 16:20:53', 'Java', 2, 'DP_04032021042053.png', 1, 1, 'abcdefg', 'LJ', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', NULL, NULL, NULL, NULL, b'01'),
(11, 13, 9, 1, 'nikhil is good', '2021-03-04 16:36:16', 'Python Programming', 2, 'DP_04032021043616.png', 1, 1, 'ABCDEFGHIJKLMNOPQ', '1', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', '2021-03-04 00:00:00', NULL, NULL, NULL, b'01'),
(12, 13, 9, 1, 'nikhil is good', '2021-03-04 16:38:14', 'nikhil', 2, 'DP_04032021043814.png', 1, 1, 'ABCDEFGHIJKLMNOPQ', '1', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', '2021-03-05 00:00:00', NULL, NULL, NULL, b'01'),
(13, 13, 9, 1, 'nikhil is good', '2021-03-04 23:30:20', 'todo', 2, 'DP_04032021113020.png', 1, 1, 'abcdefghijkl', '1', 1, 'df', 'dv', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', '2021-03-05 00:00:00', NULL, NULL, NULL, b'01'),
(14, 13, 9, NULL, NULL, '2021-03-25 13:19:46', 'Artificial', 1, 'DP_05032021021744.png', 2, 200, 'abcdefhji', 'fretrhr', 1, 'lorem', 'CS', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', '2021-03-05 14:17:44', NULL, NULL, NULL, b'01'),
(16, 13, 9, NULL, NULL, '2021-03-25 13:19:46', 'abcdefg', 1, 'DP_14032021110841.png', 1, 200, 'ACBDFGN', 'aadsf', 1, 'df', 'dv', 'ertghn', b'00', '0', 'Preview_104032021034020.pdf', '2021-03-14 11:08:41', NULL, NULL, NULL, b'01'),
(24, 1, 9, NULL, NULL, '2021-03-25 13:19:46', 'Mobile', 2, 'DP_18032021015402.jpg', 2, 100, 'lorem ipsum abcde efhv wdfcvc wshcixk  scx  ascdv vsdfv sdfbgnb sdfgh sdfgnb sdfgnh sdfg dsfgh sdfggn sdfgh sdfgnh sdfggn dsfggn abddf wdgjcd wd sfjs wegdw fgdjgw fg ', 'L.j', 1, 'Cyber security', 'lorem', 'NIkhil', b'01', '1233', 'Preview_18032021015402.pdf', '2021-03-18 13:54:02', NULL, NULL, NULL, b'01'),
(25, 1, 9, NULL, NULL, '2021-03-25 13:19:46', 'Web Design', 1, 'DP_18032021020532.png', 2, 200, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tortor aliquam nulla facilisi cras fermentum odio eu. Mus mauris vitae ultricies leo integer malesuada nunc vel risus. Odio tempor orci dapibus ultrices in iaculis nunc sed. Ante metus dictum at tempor commodo ullamcorper a lacus. Lorem ipsum dolor sit', 'L.j', 1, 'lorem', 'lorem', 'cfcv', b'01', '1342', 'Preview_18032021020532.pdf', '2021-03-18 14:05:32', NULL, NULL, NULL, b'01'),
(26, 1, 9, NULL, NULL, '2021-03-25 13:19:46', 'Vector algebra', 1, 'DP_18032021020807.png', 2, 200, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tortor aliquam nulla facilisi cras fermentum odio eu. Mus mauris vitae ultricies leo integer malesuada nunc vel risus. Odio tempor orci dapibus ultrices in iaculis nunc sed. Ante metus dictum at tempor commodo ullamcorper a lacus. Lorem ipsum dolor sit', 'abvd', 3, 'Cyber security', 'CS', 'ertghn', b'01', '1342', 'Preview_18032021020807.pdf', '2021-03-18 14:08:07', NULL, NULL, NULL, b'01'),
(27, 1, 9, NULL, NULL, '2021-03-25 13:19:46', 'JSN', 3, 'DP_20032021033351.png', 2, 200, 'abvcdgdgsgh fxghjgkh  fghjkhlj dghfjkl', 'aadsf', 4, 'lorem', 'lorem', '', b'01', '1233', 'Preview_20032021033351.pdf', '2021-03-20 15:33:51', NULL, NULL, NULL, b'01'),
(28, 1, 9, NULL, NULL, '2021-03-25 13:19:46', 'xyz', 1, 'DP_20032021033625.png', 1, 200, 'lorem ipsum c y  uguddtyhfjgk fxgchvjk gchvjk gxchvjk', 'jf xgdhf', 4, 'Cyber security', 'gfdh', 'NIkhil', b'00', '0', 'Preview_20032021033625.pdf', '2021-03-20 15:36:25', NULL, NULL, NULL, b'01'),
(29, 1, 9, NULL, NULL, '2021-03-25 13:19:46', 'Cancer', 2, 'DP_23032021051147.png', 1, 100, 'abcfrtgggg', 'fretrhr', 1, 'avbccc', 'dvf', 'sfgbx', b'00', '0', 'Preview_23032021051147.pdf', '2021-03-23 17:11:47', NULL, NULL, NULL, b'01'),
(30, 13, 9, NULL, NULL, '2021-03-25 13:19:46', 'INDIA', 3, 'DP_25032021105725.png', 1, 100, 'abcdef hwdefg dklfkgbnh', 'jf xgdhf', 3, 'lorem', 'dav', 'vf bfg', b'01', '100', 'Preview_25032021105725.pdf', '2021-03-25 10:57:25', NULL, NULL, NULL, b'01'),
(31, 1, 9, NULL, NULL, '2021-03-25 13:19:46', 'England', 1, 'DP_25032021011636.png', 1, 100, 'abcdefghijklmnopqrstuvwxyz', 'aadsf', 2, 'gjdh ', 'gfdh', 'asfgdf', b'01', '1233', 'Preview_25032021011636.pdf', '2021-03-25 13:16:36', NULL, NULL, NULL, b'01'),
(32, 1, 10, NULL, NULL, NULL, 'IRON Man', 2, 'DP_26032021125653.png', 2, 100, 'abccdefgjfb fevh bfdv bjcdvcf bdcv jdcvcb jdckvbj dcknv ', 'jf xgdhf', 4, 'lorem', 'dav', 'vf bfg', b'01', '1222', 'Preview_26032021125653.pdf', '2021-03-26 12:56:53', NULL, NULL, NULL, b'01'),
(33, 1, 10, NULL, NULL, NULL, 'Pune', 1, 'DP_26032021010557.png', 1, 100, 'abcdefghijklmnopqrstuvwxyz', 'abvd', 2, 'lorem', 'dv', 'vf bfg', b'01', '1342', 'Preview_26032021010557.pdf', '2021-03-26 13:05:57', NULL, NULL, NULL, b'01'),
(34, 1, 10, NULL, NULL, NULL, 'Chennai', 1, 'DP_26032021011849.png', 2, 200, 'abcddef asbg', 'L.j', 2, 'gjdh ', 'lorem', 'vf bfg', b'01', '200', 'Preview_26032021011849.pdf', '2021-03-26 13:18:49', NULL, NULL, NULL, b'01'),
(35, 1, 10, NULL, NULL, NULL, 'bharat', 3, 'DP_26032021021234.png', 2, 200, 'abcdefghijklmnopqrstuvwxyz', 'jf xgdhf', 4, 'lorem', 'dav', 'ertghn', b'01', '1233', 'Preview_26032021021234.pdf', '2021-03-26 14:12:34', NULL, NULL, NULL, b'01'),
(36, 13, 7, NULL, NULL, NULL, 'MSDHONI', 1, 'DP_26032021044734.png', 1, 200, 'abcdefghijklmnop', 'jfxgdhf', 3, 'avbccc', 'dvf', 'ertghn', b'01', '400', 'Preview_26032021044734.pdf', '2021-03-26 16:47:34', NULL, NULL, NULL, b'01'),
(38, 13, 7, NULL, NULL, NULL, 'Sachin', 1, 'DP_26032021122914.png', 1, 1, 'abcdefghijklmnopqrstuvwxyz', '1', 1, 'avbccc', 'gfdh', 'ertghn', b'00', '0', 'Preview_26032021045832.pdf', '2021-03-26 16:58:32', NULL, NULL, NULL, b'01'),
(39, 13, 7, NULL, NULL, NULL, 'Krunal', 2, 'DP_26032021072434.png', 2, 200, 'abcdefghijklmnopqersr', 'aadsf', 2, ' fvh ', 'dvf', 'sfgbx', b'01', '100', 'Preview_26032021072434.pdf', '2021-03-26 19:24:34', NULL, NULL, NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesattachments`
--

CREATE TABLE `sellernotesattachments` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `FileName` varchar(100) NOT NULL,
  `FilePath` varchar(1000) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellernotesattachments`
--

INSERT INTO `sellernotesattachments` (`ID`, `NoteID`, `FileName`, `FilePath`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(38, 1, '104032021035752.pdf', 'uploads/Members/13/1/attachments/104032021035752.pdf', NULL, NULL, NULL, NULL, b'01'),
(39, 2, '3904032021040537.pdf', 'uploads/Members//13/2/attachments/3904032021040537.pdf', NULL, NULL, NULL, NULL, b'01'),
(40, 3, '4004032021041759.pdf', 'uploads/Members/13/3/attachments/4004032021041759.pdf', NULL, NULL, NULL, NULL, b'01'),
(41, 4, '4104032021042053.pdf', 'uploads/Members/13/4/attachments/4104032021042053.pdf', NULL, NULL, NULL, NULL, b'01'),
(42, 11, '4204032021043616.pdf', 'uploads/Members/13/11/attachments/4204032021043616.pdf', NULL, NULL, NULL, NULL, b'01'),
(43, 12, '4304032021043814.pdf', 'uploads/Members/13/12/attachments/4304032021043814.pdf', NULL, NULL, NULL, NULL, b'01'),
(44, 13, '4404032021113021.pdf', 'uploads/Members/13/13/attachments/4404032021113021.pdf', NULL, NULL, NULL, NULL, b'01'),
(45, 14, '4505032021021744.pdf', 'uploads/Members/13/14/attachments/4505032021021744.pdf', NULL, NULL, NULL, NULL, b'01'),
(47, 16, '4714032021110841.pdf', 'uploads/Members/13/16/attachments/4714032021110841.pdf', NULL, NULL, NULL, NULL, b'01'),
(48, 24, '4818032021015402.pdf', 'uploads/Members/1/24/attachments/4818032021015402.pdf', NULL, NULL, NULL, NULL, b'01'),
(49, 25, '4918032021020532.pdf', 'uploads/Members/1/25/attachments/4918032021020532.pdf', NULL, NULL, NULL, NULL, b'01'),
(50, 26, '5018032021020807.pdf', 'uploads/Members/1/26/attachments/5018032021020807.pdf', NULL, NULL, NULL, NULL, b'01'),
(51, 27, '5120032021033352.pdf', 'uploads/Members/1/27/attachments/5120032021033352.pdf', NULL, NULL, NULL, NULL, b'01'),
(52, 28, '5220032021033626.pdf', 'uploads/Members/1/28/attachments/5220032021033626.pdf', NULL, NULL, NULL, NULL, b'01'),
(53, 29, '5323032021051147.pdf', 'uploads/Members/1/29/attachments/5323032021051147.pdf', NULL, NULL, NULL, NULL, b'01'),
(54, 29, '5423032021051147.pdf', 'uploads/Members/1/29/attachments/5423032021051147.pdf', NULL, NULL, NULL, NULL, b'01'),
(55, 30, '5525032021105725.pdf', 'uploads/Members/13/30/attachments/5525032021105725.pdf', NULL, NULL, NULL, NULL, b'01'),
(56, 30, '5625032021105725.pdf', 'uploads/Members/13/30/attachments/5625032021105725.pdf', NULL, NULL, NULL, NULL, b'01'),
(57, 30, '5725032021105725.pdf', 'uploads/Members/13/30/attachments/5725032021105725.pdf', NULL, NULL, NULL, NULL, b'01'),
(58, 31, '5825032021011636.pdf', 'uploads/Members/1/31/attachments/5825032021011636.pdf', NULL, NULL, NULL, NULL, b'01'),
(59, 32, '5926032021125653.pdf', 'uploads/Members/1/32/attachments/5926032021125653.pdf', NULL, NULL, NULL, NULL, b'01'),
(60, 32, '6026032021125653.pdf', 'uploads/Members/1/32/attachments/6026032021125653.pdf', NULL, NULL, NULL, NULL, b'01'),
(61, 32, '6126032021125653.pdf', 'uploads/Members/1/32/attachments/6126032021125653.pdf', NULL, NULL, NULL, NULL, b'01'),
(62, 33, '6226032021010557.pdf', 'uploads/Members/1/33/attachments/6226032021010557.pdf', NULL, NULL, NULL, NULL, b'01'),
(63, 34, '6326032021011849.pdf', 'uploads/Members/1/34/attachments/6326032021011849.pdf', NULL, NULL, NULL, NULL, b'01'),
(64, 35, '6426032021021234.pdf', 'uploads/Members/1/35/attachments/6426032021021234.pdf', NULL, NULL, NULL, NULL, b'01'),
(65, 36, '6526032021044734.pdf', 'uploads/Members/13/36/attachments/6526032021044734.pdf', NULL, NULL, NULL, NULL, b'01'),
(67, 38, '6626032021045832.pdf', 'uploads/Members/13/38/attachments/6626032021045832.pdf', NULL, NULL, NULL, NULL, b'01'),
(68, 39, '6826032021072434.pdf', 'uploads/Members/13/39/attachments/6826032021072434.pdf', NULL, NULL, NULL, NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesreportedissues`
--

CREATE TABLE `sellernotesreportedissues` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `ReportedByID` int(11) NOT NULL,
  `AgainstDownloadID` int(11) NOT NULL,
  `Remarks` varchar(1000) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellernotesreportedissues`
--

INSERT INTO `sellernotesreportedissues` (`ID`, `NoteID`, `ReportedByID`, `AgainstDownloadID`, `Remarks`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
(1, 1, 1, 5, 'lorem ipsum ', '2021-03-19 18:29:22', 1, NULL, NULL),
(3, 2, 1, 6, 'not useful ', '2021-03-19 18:30:25', 1, NULL, NULL),
(4, 3, 1, 7, 'wrost language', '2021-03-19 18:30:43', 1, NULL, NULL),
(6, 2, 25, 89, 'abcdefghijkl', '2021-03-26 17:49:23', 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesreview`
--

CREATE TABLE `sellernotesreview` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `ReviewedByID` int(11) NOT NULL,
  `AgainstDownloadsID` int(11) NOT NULL,
  `Ratings` decimal(10,0) NOT NULL,
  `Comments` varchar(1000) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellernotesreview`
--

INSERT INTO `sellernotesreview` (`ID`, `NoteID`, `ReviewedByID`, `AgainstDownloadsID`, `Ratings`, `Comments`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 1, 1, 5, '5', 'awesome notes', '2021-03-19 17:38:50', 1, NULL, NULL, b'01'),
(2, 3, 1, 7, '5', 'book is good', '2021-03-19 17:43:07', 1, NULL, NULL, b'01'),
(3, 2, 1, 6, '3', 'Average book', '2021-03-19 17:43:27', 1, NULL, NULL, b'01'),
(5, 4, 1, 8, '4', 'nice book', '2021-03-19 17:44:02', 1, NULL, NULL, b'01'),
(6, 1, 24, 17, '1', 'nice book', '2021-03-22 16:56:09', 24, NULL, NULL, b'01'),
(7, 1, 25, 88, '4', '4.5 Star book', '2021-03-26 17:47:24', 25, NULL, NULL, b'01'),
(8, 2, 25, 89, '1', 'abcdefghijklmno', '2021-03-26 17:49:06', 25, NULL, NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `systemconfiguration`
--

CREATE TABLE `systemconfiguration` (
  `ID` int(11) NOT NULL,
  `configurationKey` varchar(100) NOT NULL,
  `value` varchar(10000) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `systemconfiguration`
--

INSERT INTO `systemconfiguration` (`ID`, `configurationKey`, `value`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'emailaddresss', 'niks04446@gmail.com', NULL, NULL, NULL, NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `SecondaryEmailAddress` varchar(100) NOT NULL,
  `Countrycode` varchar(5) NOT NULL,
  `Phonenumber` varchar(20) NOT NULL,
  `ProfilePicture` varchar(500) DEFAULT NULL,
  `AddressLine1` varchar(100) NOT NULL,
  `AddressLine2` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `ZipCode` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `University` varchar(100) DEFAULT NULL,
  `College` varchar(100) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifyBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`ID`, `UserID`, `DOB`, `Gender`, `SecondaryEmailAddress`, `Countrycode`, `Phonenumber`, `ProfilePicture`, `AddressLine1`, `AddressLine2`, `City`, `State`, `ZipCode`, `Country`, `University`, `College`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifyBy`) VALUES
(18, 24, '2003-12-05', 2, '', '+91', '9104653449', 'DP_18032021044656.jpg', '3060,Ubhosher,Vanmali vanka ni Pole', '', 'Shahpur Ahmedabad', 'Gujarat', '380001', '1', 'GUJARAT TECHNOLOGICAL UNIVERSITY', 'H.B.Kapadia', '2021-03-18 09:16:56', 24, NULL, NULL),
(19, 1, '2020-01-04', 1, '', '+91', '8460469135', 'DP_24032021055946.jpg', '3060,Ubhsosher', 'Vanmali vanka ni pole', 'Ahmedabad', 'Gujarat', '380001', '3', 'FOREIGN', 'Silveroack', '2021-03-18 10:13:57', 1, NULL, NULL),
(20, 13, '2021-01-04', 1, '', '+91', '45465678', 'DP_18032021080754.jpg', '3060,Ubhosher,Vanmali vanka ni Pole', '', 'Shahpur Ahmedabad', 'Gujarat', '380001', '4', 'GUJARAT TECHNOLOGICAL UNIVERSITY', 'lj', '2021-03-18 12:37:54', 13, NULL, NULL),
(21, 25, '2021-01-11', 1, '', '+91', '9104653449', 'DP_26032021011632.png', '3060,Ubhosher,Vanmali vanka ni Pole', '', 'Shahpur Ahmedabad', 'Gujarat', '380001', 'Select your country', 'GUJARAT TECHNOLOGICAL UNIVERSITY', 'lj', '2021-03-26 17:46:32', 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(1000) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`ID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'SuperAdmin', 'Which Manages Admin and Members', '2021-02-21 00:00:00', 1, '2021-02-21 00:00:00', 1, b'01'),
(2, 'Admin', 'Which Manages Members', '2021-02-21 00:00:00', 1, '2021-02-21 00:00:00', 1, b'01'),
(3, 'Members', NULL, '2021-02-21 00:00:00', 1, '2021-02-21 00:00:00', 1, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `RoleID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `EmailID` varchar(100) NOT NULL,
  `Password` varchar(24) NOT NULL,
  `IsEmailVerified` bit(2) NOT NULL DEFAULT b'0',
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `RoleID`, `FirstName`, `LastName`, `EmailID`, `Password`, `IsEmailVerified`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 3, 'nikhil', 'shah', 'nikhilshah4120@gmail.com', 'Nikhil12275@', b'01', '2021-02-21 13:09:31', NULL, '2021-02-21 13:09:31', NULL, b'01'),
(13, 3, 'nikhil', 'shah', 'nikhilvshah12274@gmail.com', 'Nikhil4120@', b'01', '2021-02-24 15:22:36', NULL, '2021-02-24 15:22:36', NULL, b'01'),
(16, 3, 'nikhil', 'shah', 'interviewguide4@gmail.com', 'Nikhil12275@', b'00', '2021-02-27 15:37:31', NULL, '2021-02-27 15:37:31', NULL, b'01'),
(23, 2, 'Nikhil', 'Shah', 'niks04446@gmail.com', 'Nikhil12275@', b'01', NULL, NULL, NULL, NULL, b'01'),
(24, 3, 'Anjali', 'Shah', 'anjalishah5123@gmail.com', 'Anjali5123@', b'01', '2021-03-18 09:13:23', NULL, '2021-03-18 09:13:23', NULL, b'01'),
(25, 3, 'John', 'pickard', 'malariadetectionsystem@gmail.com', 'Nikhil12275@', b'01', '2021-03-26 17:44:30', NULL, '2021-03-26 17:44:30', NULL, b'01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `seller` (`Seller`),
  ADD KEY `downloader` (`Downloader`),
  ADD KEY `N` (`NoteID`);

--
-- Indexes for table `notecategories`
--
ALTER TABLE `notecategories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `notetypes`
--
ALTER TABLE `notetypes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `referencedata`
--
ALTER TABLE `referencedata`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sellernotes`
--
ALTER TABLE `sellernotes`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Title` (`Title`),
  ADD KEY `sellerid` (`SellerID`),
  ADD KEY `status` (`Status`),
  ADD KEY `action` (`ActionedBy`),
  ADD KEY `category` (`Category`),
  ADD KEY `notetype` (`NoteType`),
  ADD KEY `country` (`Country`);

--
-- Indexes for table `sellernotesattachments`
--
ALTER TABLE `sellernotesattachments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `note_id` (`NoteID`);

--
-- Indexes for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `reportedby` (`ReportedByID`),
  ADD KEY `Notesid` (`NoteID`),
  ADD KEY `downloadid` (`AgainstDownloadID`);

--
-- Indexes for table `sellernotesreview`
--
ALTER TABLE `sellernotesreview`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `noteid` (`NoteID`),
  ADD KEY `download` (`AgainstDownloadsID`),
  ADD KEY `reviewbyid` (`ReviewedByID`);

--
-- Indexes for table `systemconfiguration`
--
ALTER TABLE `systemconfiguration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD KEY `gender` (`Gender`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Userrole` (`RoleID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `notecategories`
--
ALTER TABLE `notecategories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notetypes`
--
ALTER TABLE `notetypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `referencedata`
--
ALTER TABLE `referencedata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sellernotes`
--
ALTER TABLE `sellernotes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sellernotesattachments`
--
ALTER TABLE `sellernotesattachments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sellernotesreview`
--
ALTER TABLE `sellernotesreview`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `systemconfiguration`
--
ALTER TABLE `systemconfiguration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `N` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `downloader` FOREIGN KEY (`Downloader`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seller` FOREIGN KEY (`Seller`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sellernotes`
--
ALTER TABLE `sellernotes`
  ADD CONSTRAINT `action` FOREIGN KEY (`ActionedBy`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category` FOREIGN KEY (`Category`) REFERENCES `notecategories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `country` FOREIGN KEY (`Country`) REFERENCES `countries` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notetype` FOREIGN KEY (`NoteType`) REFERENCES `notetypes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sellerid` FOREIGN KEY (`SellerID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status` FOREIGN KEY (`Status`) REFERENCES `referencedata` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sellernotesattachments`
--
ALTER TABLE `sellernotesattachments`
  ADD CONSTRAINT `note_id` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  ADD CONSTRAINT `Notesid` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `downloadid` FOREIGN KEY (`AgainstDownloadID`) REFERENCES `downloads` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reportedby` FOREIGN KEY (`ReportedByID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sellernotesreview`
--
ALTER TABLE `sellernotesreview`
  ADD CONSTRAINT `download` FOREIGN KEY (`AgainstDownloadsID`) REFERENCES `downloads` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `noteid` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviewbyid` FOREIGN KEY (`ReviewedByID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `gender` FOREIGN KEY (`Gender`) REFERENCES `referencedata` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userid` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `test` FOREIGN KEY (`RoleID`) REFERENCES `userroles` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
