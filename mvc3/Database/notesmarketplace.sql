-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 11:25 AM
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
(2, 'Afganistan', '+33', '2021-03-30 00:00:00', 23, NULL, NULL, b'01'),
(3, 'Australia', '+61', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01'),
(4, 'Kenya', '+1', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01'),
(5, 'Bangladesh', '+103', '2021-03-30 10:01:54', 23, NULL, NULL, b'00');

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
  `ModifiedBy` int(11) DEFAULT NULL,
  `isactive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`ID`, `NoteID`, `Seller`, `Downloader`, `IsSellerHasAllowedDownload`, `AttachmentPath`, `IsAttachmentDownloaded`, `AttachmentDownloadedDate`, `IsPaid`, `PurchasedPrice`, `NoteTitle`, `NoteCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `isactive`) VALUES
(1, 1, 13, 13, b'01', 'uploads/13/1/attachments/104032021035752.pdf', b'01', '2021-03-17 18:44:10', b'00', '0', 'compute', '2', '2021-03-17 18:44:10', 13, NULL, NULL, b'00'),
(2, 1, 13, 13, b'01', 'uploads/13/1/attachments/104032021035752.pdf', b'01', '2021-03-17 18:49:17', b'00', '0', 'compute', '2', '2021-03-17 18:49:17', 13, NULL, NULL, b'00'),
(5, 1, 13, 1, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-18 16:22:05', b'00', '0', 'compute', '2', '2021-03-18 16:22:05', 1, NULL, NULL, b'00'),
(6, 2, 13, 1, b'01', 'uploads/Members//13/2/attachments/3904032021040537.pdf', b'01', '2021-03-18 16:22:25', b'00', '0', 'cs', '2', '2021-03-18 16:22:25', 1, NULL, NULL, b'01'),
(7, 3, 13, 1, b'01', 'uploads/Members/13/3/attachments/4004032021041759.pdf', b'01', '2021-03-18 16:22:44', b'00', '0', 'AI', '2', '2021-03-18 16:22:44', 1, NULL, NULL, b'00'),
(8, 4, 13, 1, b'01', 'uploads/Members/13/4/attachments/4104032021042053.pdf', b'01', '2021-03-18 16:23:03', b'00', '0', 'social', '2', '2021-03-18 16:23:03', 1, NULL, NULL, b'00'),
(9, 1, 13, 1, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-18 16:23:20', b'00', '0', 'compute', '2', '2021-03-18 16:23:20', 1, NULL, NULL, b'00'),
(10, 1, 13, 1, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-18 16:23:40', b'00', '0', 'compute', '2', '2021-03-18 16:23:40', 1, NULL, NULL, b'00'),
(11, 1, 13, 13, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-19 13:08:02', b'00', '0', 'compute', '2', '2021-03-19 13:08:02', 13, NULL, NULL, b'00'),
(13, 24, 1, 1, b'01', 'uploads/Members/1/24/attachments/4818032021015402.pdf', b'01', '2021-03-20 15:40:50', b'01', '1233', 'Mobile', '2', '2021-03-20 15:40:50', 1, NULL, NULL, b'00'),
(14, 25, 1, 1, b'01', 'uploads/Members/1/25/attachments/4918032021020532.pdf', b'01', '2021-03-20 15:51:52', b'01', '1342', 'Web Design', '1', '2021-03-20 15:51:52', 1, NULL, NULL, b'01'),
(15, 1, 13, 1, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-21 11:51:50', b'00', '0', 'compute', '2', '2021-03-21 11:51:50', 1, NULL, NULL, b'00'),
(16, 2, 13, 1, b'01', 'uploads/Members//13/2/attachments/3904032021040537.pdf', b'01', '2021-03-21 11:52:08', b'00', '0', 'cs', '2', '2021-03-21 11:52:08', 1, NULL, NULL, b'01'),
(17, 1, 13, 24, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-22 16:54:53', b'00', '0', 'compute', '2', '2021-03-22 16:54:53', 24, NULL, NULL, b'00'),
(23, 1, 13, 1, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-23 17:02:26', b'00', '0', 'compute', '2', '2021-03-23 17:02:26', 1, NULL, NULL, b'00'),
(24, 1, 13, 1, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-23 17:04:03', b'00', '0', 'compute', '2', '2021-03-23 17:04:03', 1, NULL, NULL, b'00'),
(25, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 17:12:53', b'00', '0', 'Cancer', '2', '2021-03-23 17:12:53', 1, NULL, NULL, b'01'),
(26, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 17:12:53', b'00', '0', 'Cancer', '2', '2021-03-23 17:12:53', 1, NULL, NULL, b'01'),
(27, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 17:25:56', b'00', '0', 'Cancer', '2', '2021-03-23 17:25:56', 1, NULL, NULL, b'01'),
(28, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 17:39:23', b'00', '0', 'Cancer', '2', '2021-03-23 17:39:23', 1, NULL, NULL, b'01'),
(29, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 17:39:23', b'00', '0', 'Cancer', '2', '2021-03-23 17:39:23', 1, NULL, NULL, b'01'),
(30, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 17:40:28', b'00', '0', 'Cancer', '2', '2021-03-23 17:40:28', 1, NULL, NULL, b'01'),
(31, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 17:40:28', b'00', '0', 'Cancer', '2', '2021-03-23 17:40:28', 1, NULL, NULL, b'01'),
(32, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 17:45:25', b'00', '0', 'Cancer', '2', '2021-03-23 17:45:25', 1, NULL, NULL, b'01'),
(33, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 17:45:25', b'00', '0', 'Cancer', '2', '2021-03-23 17:45:25', 1, NULL, NULL, b'01'),
(34, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:10:07', b'00', '0', 'Cancer', '2', '2021-03-23 18:10:07', 1, NULL, NULL, b'01'),
(35, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:10:07', b'00', '0', 'Cancer', '2', '2021-03-23 18:10:07', 1, NULL, NULL, b'01'),
(36, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:12:34', b'00', '0', 'Cancer', '2', '2021-03-23 18:12:34', 1, NULL, NULL, b'01'),
(37, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:12:34', b'00', '0', 'Cancer', '2', '2021-03-23 18:12:34', 1, NULL, NULL, b'01'),
(38, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:15:22', b'00', '0', 'Cancer', '2', '2021-03-23 18:15:22', 1, NULL, NULL, b'01'),
(39, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:15:23', b'00', '0', 'Cancer', '2', '2021-03-23 18:15:23', 1, NULL, NULL, b'01'),
(40, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:15:55', b'00', '0', 'Cancer', '2', '2021-03-23 18:15:55', 1, NULL, NULL, b'01'),
(41, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:15:55', b'00', '0', 'Cancer', '2', '2021-03-23 18:15:55', 1, NULL, NULL, b'01'),
(42, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:20:03', b'00', '0', 'Cancer', '2', '2021-03-23 18:20:03', 1, NULL, NULL, b'01'),
(43, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:20:04', b'00', '0', 'Cancer', '2', '2021-03-23 18:20:04', 1, NULL, NULL, b'01'),
(44, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:21:12', b'00', '0', 'Cancer', '2', '2021-03-23 18:21:12', 1, NULL, NULL, b'01'),
(45, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:21:12', b'00', '0', 'Cancer', '2', '2021-03-23 18:21:12', 1, NULL, NULL, b'01'),
(46, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:24:54', b'00', '0', 'Cancer', '2', '2021-03-23 18:24:54', 1, NULL, NULL, b'01'),
(47, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:24:54', b'00', '0', 'Cancer', '2', '2021-03-23 18:24:54', 1, NULL, NULL, b'01'),
(48, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:28:17', b'00', '0', 'Cancer', '2', '2021-03-23 18:28:17', 1, NULL, NULL, b'01'),
(49, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:28:17', b'00', '0', 'Cancer', '2', '2021-03-23 18:28:17', 1, NULL, NULL, b'01'),
(50, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:28:29', b'00', '0', 'Cancer', '2', '2021-03-23 18:28:29', 1, NULL, NULL, b'01'),
(51, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:28:29', b'00', '0', 'Cancer', '2', '2021-03-23 18:28:29', 1, NULL, NULL, b'01'),
(52, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:28:55', b'00', '0', 'Cancer', '2', '2021-03-23 18:28:55', 1, NULL, NULL, b'01'),
(53, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:28:55', b'00', '0', 'Cancer', '2', '2021-03-23 18:28:55', 1, NULL, NULL, b'01'),
(54, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:35:35', b'00', '0', 'Cancer', '2', '2021-03-23 18:35:35', 1, NULL, NULL, b'01'),
(55, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:35:35', b'00', '0', 'Cancer', '2', '2021-03-23 18:35:35', 1, NULL, NULL, b'01'),
(56, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:48:21', b'00', '0', 'Cancer', '2', '2021-03-23 18:48:21', 1, NULL, NULL, b'01'),
(57, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:48:21', b'00', '0', 'Cancer', '2', '2021-03-23 18:48:21', 1, NULL, NULL, b'01'),
(58, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 18:52:29', b'00', '0', 'Cancer', '2', '2021-03-23 18:52:29', 1, NULL, NULL, b'01'),
(59, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 18:52:29', b'00', '0', 'Cancer', '2', '2021-03-23 18:52:29', 1, NULL, NULL, b'01'),
(60, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 19:10:04', b'00', '0', 'Cancer', '2', '2021-03-23 19:10:04', 1, NULL, NULL, b'01'),
(61, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 19:10:05', b'00', '0', 'Cancer', '2', '2021-03-23 19:10:05', 1, NULL, NULL, b'01'),
(62, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 19:13:35', b'00', '0', 'Cancer', '2', '2021-03-23 19:13:35', 1, NULL, NULL, b'01'),
(63, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 19:13:35', b'00', '0', 'Cancer', '2', '2021-03-23 19:13:35', 1, NULL, NULL, b'01'),
(64, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 19:18:03', b'00', '0', 'Cancer', '2', '2021-03-23 19:18:03', 1, NULL, NULL, b'01'),
(65, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 19:18:03', b'00', '0', 'Cancer', '2', '2021-03-23 19:18:03', 1, NULL, NULL, b'01'),
(66, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 19:19:00', b'00', '0', 'Cancer', '2', '2021-03-23 19:19:00', 1, NULL, NULL, b'01'),
(67, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 19:19:00', b'00', '0', 'Cancer', '2', '2021-03-23 19:19:00', 1, NULL, NULL, b'01'),
(68, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 19:19:51', b'00', '0', 'Cancer', '2', '2021-03-23 19:19:51', 1, NULL, NULL, b'01'),
(69, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 19:19:52', b'00', '0', 'Cancer', '2', '2021-03-23 19:19:52', 1, NULL, NULL, b'01'),
(70, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 19:26:54', b'00', '0', 'Cancer', '2', '2021-03-23 19:26:54', 1, NULL, NULL, b'01'),
(71, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 19:26:54', b'00', '0', 'Cancer', '2', '2021-03-23 19:26:54', 1, NULL, NULL, b'01'),
(72, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 19:32:48', b'00', '0', 'Cancer', '2', '2021-03-23 19:32:48', 1, NULL, NULL, b'01'),
(73, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 19:32:48', b'00', '0', 'Cancer', '2', '2021-03-23 19:32:48', 1, NULL, NULL, b'01'),
(74, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5323032021051147.pdf', b'01', '2021-03-23 19:33:10', b'00', '0', 'Cancer', '2', '2021-03-23 19:33:10', 1, NULL, NULL, b'01'),
(75, 29, 1, 1, b'01', 'uploads/Members/1/29/attachments/5423032021051147.pdf', b'01', '2021-03-23 19:33:10', b'00', '0', 'Cancer', '2', '2021-03-23 19:33:10', 1, NULL, NULL, b'01'),
(76, 30, 13, 13, b'01', 'uploads/Members/13/30/attachments/5525032021105725.pdf', b'01', '2021-03-25 10:59:20', b'01', '100', 'INDIA', '3', '2021-03-25 10:59:20', 13, NULL, NULL, b'01'),
(77, 30, 13, 13, b'01', 'uploads/Members/13/30/attachments/5625032021105725.pdf', b'01', '2021-03-25 10:59:20', b'01', '100', 'INDIA', '3', '2021-03-25 10:59:20', 13, NULL, NULL, b'01'),
(78, 30, 13, 13, b'01', 'uploads/Members/13/30/attachments/5725032021105725.pdf', b'01', '2021-03-25 10:59:20', b'01', '100', 'INDIA', '3', '2021-03-25 10:59:20', 13, NULL, NULL, b'01'),
(79, 30, 13, 1, b'01', 'uploads/Members/13/30/attachments/5525032021105725.pdf', b'01', '2021-03-25 11:05:52', b'01', '100', 'INDIA', '3', '2021-03-25 11:00:28', 1, NULL, NULL, b'01'),
(80, 30, 13, 1, b'01', 'uploads/Members/13/30/attachments/5625032021105725.pdf', b'01', '2021-03-25 11:05:52', b'01', '100', 'INDIA', '3', '2021-03-25 11:00:28', 1, NULL, NULL, b'01'),
(81, 30, 13, 1, b'01', 'uploads/Members/13/30/attachments/5725032021105725.pdf', b'01', '2021-03-25 11:05:52', b'01', '100', 'INDIA', '3', '2021-03-25 11:00:28', 1, NULL, NULL, b'01'),
(82, 31, 1, 13, b'01', 'uploads/Members/1/31/attachments/5825032021011636.pdf', b'01', '2021-03-25 13:23:32', b'01', '1233', 'England', '1', '2021-03-25 13:21:21', 13, NULL, NULL, b'01'),
(83, 30, 13, 1, b'01', 'uploads/Members/13/30/attachments/5525032021105725.pdf', b'01', '2021-03-26 15:08:14', b'01', '100', 'INDIA', '3', '2021-03-26 15:08:14', 1, NULL, NULL, b'01'),
(84, 30, 13, 1, b'01', 'uploads/Members/13/30/attachments/5625032021105725.pdf', b'01', '2021-03-26 15:08:15', b'01', '100', 'INDIA', '3', '2021-03-26 15:08:15', 1, NULL, NULL, b'01'),
(85, 30, 13, 1, b'01', 'uploads/Members/13/30/attachments/5725032021105725.pdf', b'01', '2021-03-26 15:08:15', b'01', '100', 'INDIA', '3', '2021-03-26 15:08:15', 1, NULL, NULL, b'01'),
(86, 1, 13, 13, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-26 16:43:14', b'00', '0', 'compute', '2', '2021-03-26 16:43:14', 13, NULL, NULL, b'00'),
(87, 31, 1, 13, b'01', 'uploads/Members/1/31/attachments/5825032021011636.pdf', b'01', '2021-03-26 16:44:07', b'01', '1233', 'England', '1', '2021-03-26 16:44:07', 13, NULL, NULL, b'01'),
(88, 1, 13, 25, b'01', 'uploads/Members/13/1/attachments/104032021035752.pdf', b'01', '2021-03-26 17:46:49', b'00', '0', 'compute', '2', '2021-03-26 17:46:49', 25, NULL, NULL, b'00'),
(89, 2, 13, 25, b'01', 'uploads/Members//13/2/attachments/3904032021040537.pdf', b'01', '2021-03-26 17:48:35', b'00', '0', 'cs', '2', '2021-03-26 17:48:35', 25, NULL, NULL, b'01'),
(90, 30, 13, 25, b'01', 'uploads/Members/13/30/attachments/5525032021105725.pdf', b'01', '2021-03-26 18:16:20', b'01', '100', 'INDIA', '3', '2021-03-26 17:50:16', 25, NULL, NULL, b'01'),
(91, 30, 13, 25, b'01', 'uploads/Members/13/30/attachments/5625032021105725.pdf', b'01', '2021-03-26 18:16:20', b'01', '100', 'INDIA', '3', '2021-03-26 17:50:16', 25, NULL, NULL, b'01'),
(92, 30, 13, 25, b'01', 'uploads/Members/13/30/attachments/5725032021105725.pdf', b'01', '2021-03-26 18:16:20', b'01', '100', 'INDIA', '3', '2021-03-26 17:50:16', 25, NULL, NULL, b'01'),
(93, 31, 1, 25, b'01', 'uploads/Members/1/31/attachments/5825032021011636.pdf', b'01', '2021-03-26 18:14:57', b'01', '1233', 'England', '1', '2021-03-26 18:01:52', 25, NULL, NULL, b'01'),
(94, 12, 13, 29, b'01', 'uploads/Members/13/12/attachments/4304032021043814.pdf', b'01', '2021-04-09 16:24:08', b'00', '0', 'nikhil', '2', '2021-04-09 16:24:08', 29, NULL, NULL, b'01'),
(95, 25, 1, 29, b'01', 'uploads/Members/1/25/attachments/4918032021020532.pdf', b'01', '2021-04-09 16:42:52', b'01', '1342', 'Web Design', '1', '2021-04-09 16:35:32', 29, NULL, NULL, b'01'),
(96, 41, 29, 1, b'01', 'uploads/Members/29/41/attachments/7009042021042909.pdf', b'01', '2021-04-09 16:45:04', b'01', '1500', 'Drawing', '3', '2021-04-09 16:40:53', 1, NULL, NULL, b'01'),
(97, 41, 29, 1, b'01', 'uploads/Members/29/41/attachments/7009042021042909.pdf', b'01', '2021-04-09 16:45:12', b'01', '1500', 'Drawing', '3', '2021-04-09 16:45:12', 1, NULL, NULL, b'01'),
(98, 11, 13, 13, b'01', 'uploads/Members/13/11/attachments/4204032021043616.pdf', b'01', '2021-04-12 09:31:29', b'00', '0', 'Python Programming', '2', '2021-04-12 09:31:29', 13, NULL, NULL, b'01'),
(99, 28, 1, 13, b'01', 'uploads/Members/1/28/attachments/5220032021033626.pdf', b'01', '2021-04-12 09:33:35', b'00', '0', 'xyz', '1', '2021-04-12 09:33:35', 13, NULL, NULL, b'01'),
(100, 46, 13, 13, b'01', 'uploads/Members/13/46/attachments/7512042021093655.pdf', b'01', '2021-04-12 09:37:32', b'01', '1222', 'happy', '3', '2021-04-12 09:37:32', 13, NULL, NULL, b'01'),
(101, 39, 13, 1, b'01', 'uploads/Members/13/39/attachments/6826032021072434.pdf', b'00', '2021-04-12 09:45:31', b'01', '100', 'Krunal', '2', '2021-04-12 09:45:31', 1, NULL, NULL, b'01'),
(102, 51, 1, 1, b'01', 'uploads/Members/1/51/attachments/8016042021023808.pdf', b'01', '2021-04-16 18:09:36', b'00', '0', 'Bhukhhadtal', '2', '2021-04-16 18:09:36', 1, NULL, NULL, b'00'),
(103, 51, 1, 1, b'01', 'uploads/Members/1/51/attachments/9516042021023808.pdf', b'01', '2021-04-16 18:09:36', b'00', '0', 'Bhukhhadtal', '2', '2021-04-16 18:09:36', 1, NULL, NULL, b'00'),
(104, 51, 1, 1, b'01', 'uploads/Members/1/51/attachments/9616042021023808.pdf', b'01', '2021-04-16 18:09:36', b'00', '0', 'Bhukhhadtal', '2', '2021-04-16 18:09:36', 1, NULL, NULL, b'00'),
(105, 41, 29, 1, b'01', 'uploads/Members/29/41/attachments/7009042021042909.pdf', b'01', '2021-04-16 22:20:24', b'01', '1500', 'Drawing', '3', '2021-04-16 22:20:24', 1, NULL, NULL, b'01'),
(106, 32, 1, 1, b'01', 'uploads/Members/1/32/attachments/5926032021125653.pdf', b'01', '2021-04-16 22:21:52', b'01', '1222', 'IRON Man', '2', '2021-04-16 22:21:52', 1, NULL, NULL, b'01'),
(107, 32, 1, 1, b'01', 'uploads/Members/1/32/attachments/6026032021125653.pdf', b'01', '2021-04-16 22:21:52', b'01', '1222', 'IRON Man', '2', '2021-04-16 22:21:52', 1, NULL, NULL, b'01'),
(108, 32, 1, 1, b'01', 'uploads/Members/1/32/attachments/6126032021125653.pdf', b'01', '2021-04-16 22:21:52', b'01', '1222', 'IRON Man', '2', '2021-04-16 22:21:52', 1, NULL, NULL, b'01'),
(109, 45, 1, 13, b'01', 'uploads/Members/1/45/attachments/7410042021052329.pdf', b'01', '2021-04-16 22:39:02', b'01', '12345', 'cfgffghj', '4', '2021-04-16 22:35:35', 13, NULL, NULL, b'01'),
(110, 30, 13, 1, b'01', 'uploads/Members/13/30/attachments/5525032021105725.pdf', b'01', '2021-04-16 22:41:48', b'01', '100', 'INDIA', '3', '2021-04-16 22:41:48', 1, NULL, NULL, b'01'),
(111, 30, 13, 1, b'01', 'uploads/Members/13/30/attachments/5625032021105725.pdf', b'01', '2021-04-16 22:41:48', b'01', '100', 'INDIA', '3', '2021-04-16 22:41:48', 1, NULL, NULL, b'01'),
(112, 30, 13, 1, b'01', 'uploads/Members/13/30/attachments/5725032021105725.pdf', b'01', '2021-04-16 22:41:48', b'01', '100', 'INDIA', '3', '2021-04-16 22:41:48', 1, NULL, NULL, b'01'),
(113, 27, 1, 13, b'01', 'uploads/Members/1/27/attachments/5120032021033352.pdf', b'01', '2021-04-16 22:43:26', b'01', '1233', 'JSN', '3', '2021-04-16 22:42:42', 13, NULL, NULL, b'01'),
(114, 27, 1, 13, b'01', 'uploads/Members/1/27/attachments/5120032021033352.pdf', b'01', '2021-04-16 22:43:34', b'01', '1233', 'JSN', '3', '2021-04-16 22:43:34', 13, NULL, NULL, b'01'),
(115, 39, 13, 1, b'01', 'uploads/Members/13/39/attachments/6826032021072434.pdf', b'01', '2021-04-16 22:44:40', b'01', '100', 'Krunal', '2', '2021-04-16 22:44:40', 1, NULL, NULL, b'01'),
(116, 53, 13, 1, b'01', 'uploads/Members/13/53/attachments/9817042021090545.pdf', b'01', '2021-04-17 21:23:22', b'01', '2000', 'Gujarati', '1', '2021-04-17 21:20:32', 1, NULL, NULL, b'01'),
(117, 32, 1, 1, b'01', 'uploads/Members/1/32/attachments/5926032021125653.pdf', b'01', '2021-04-18 12:37:05', b'01', '1222', 'IRON Man', '2', '2021-04-18 12:37:05', 1, NULL, NULL, b'01'),
(118, 32, 1, 1, b'01', 'uploads/Members/1/32/attachments/6026032021125653.pdf', b'01', '2021-04-18 12:37:06', b'01', '1222', 'IRON Man', '2', '2021-04-18 12:37:06', 1, NULL, NULL, b'01'),
(119, 32, 1, 1, b'01', 'uploads/Members/1/32/attachments/6126032021125653.pdf', b'01', '2021-04-18 12:37:06', b'01', '1222', 'IRON Man', '2', '2021-04-18 12:37:06', 1, NULL, NULL, b'01'),
(120, 2, 13, 37, b'01', 'uploads/Members//13/2/attachments/3904032021040537.pdf', b'01', '2021-04-18 13:55:30', b'00', '0', 'cs', '2', '2021-04-18 13:55:30', 37, NULL, NULL, b'01'),
(121, 27, 1, 37, b'01', 'uploads/Members/1/27/attachments/5120032021033352.pdf', b'01', '2021-04-18 14:03:32', b'01', '1233', 'JSN', '3', '2021-04-18 14:01:26', 37, NULL, NULL, b'01'),
(122, 56, 37, 1, b'01', 'uploads/Members/37/56/attachments/10018042021103901.', b'00', '2021-04-18 14:15:00', b'01', '120', 'Enviroment Book', '1', '2021-04-18 14:15:00', 1, NULL, NULL, b'00'),
(123, 53, 13, 1, b'01', 'uploads/Members/13/53/attachments/9817042021090545.pdf', b'01', '2021-04-18 14:16:24', b'01', '2000', 'Gujarati', '1', '2021-04-18 14:16:24', 1, NULL, NULL, b'01'),
(124, 57, 13, 13, b'01', 'uploads/Members/13/57/attachments/10519042021032150.pdf', b'01', '2021-04-19 19:00:16', b'01', '1222', 'abcdef', '5', '2021-04-19 19:00:16', 13, NULL, NULL, b'01'),
(125, 57, 13, 13, b'01', 'uploads/Members/13/57/attachments/10519042021032150.pdf', b'01', '2021-04-19 19:07:02', b'01', '1222', 'abcdef', '5', '2021-04-19 19:07:02', 13, NULL, NULL, b'01');

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
(3, 'MCA', 'ffdkfd aejfgsd', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'00'),
(4, 'CS', 'This IS a field of company secratory', '2021-03-30 09:53:57', 23, NULL, NULL, b'01'),
(5, 'Mcom', 'mscit', '2021-04-18 08:39:00', 23, NULL, NULL, b'01'),
(6, 'BCA', 'commerce field', '2021-04-18 08:52:16', 33, NULL, NULL, b'00');

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
(2, 'val2', 'xdvvxcv', '2021-02-23 00:00:00', 1, '2021-02-23 00:00:00', 1, b'01'),
(3, 'val3', 'this is a val3', '2021-03-30 10:09:23', 23, NULL, NULL, b'01'),
(4, 'ipsum', 'abcdefghijkl', '2021-04-18 08:41:09', 23, NULL, NULL, b'01');

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
(1, 13, 11, 1, 'nikhil is good', '2021-03-04 15:57:52', 'compute', 2, 'DP_04032021035752.png', 1, 1, 'lorem ipsum abcd', 'LJ', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', '2021-04-13 00:00:00', NULL, NULL, NULL, b'00'),
(2, 13, 9, 23, 'nikhil is good', '2021-03-04 16:05:37', 'cs', 2, 'DP_04032021040537.png', 1, 1, 'lorem ipsum', 'LJ', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', '2021-04-17 00:00:00', NULL, NULL, NULL, b'01'),
(3, 13, 11, 1, 'note is worst', '2021-03-04 16:17:59', 'AI', 2, 'DP_04032021041759.png', 1, 1, 'abcdefg', 'LJ', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', NULL, NULL, NULL, NULL, b'00'),
(4, 13, 11, 1, 'note is not good\r\n', '2021-03-04 16:20:53', 'social', 2, 'DP_04032021042053.png', 1, 1, 'abcdefg', 'LJ', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', NULL, NULL, NULL, NULL, b'00'),
(11, 13, 9, 23, 'nikhil is good', '2021-03-04 16:36:16', 'Python Programming', 2, 'DP_04032021043616.png', 1, 1, 'ABCDEFGHIJKLMNOPQ', '1', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', '2021-03-04 00:00:00', NULL, NULL, NULL, b'01'),
(12, 13, 9, 23, 'nikhil is good', '2021-03-04 16:38:14', 'nikhil', 2, 'DP_04032021043814.png', 1, 1, 'ABCDEFGHIJKLMNOPQ', '1', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', '2021-03-05 00:00:00', NULL, NULL, NULL, b'01'),
(13, 13, 11, 1, 'note is worst', '2021-03-04 23:30:20', 'todo', 2, 'DP_04032021113020.png', 1, 1, 'abcdefghijkl', '1', 1, 'df', 'dv', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', '2021-03-05 00:00:00', NULL, NULL, NULL, b'00'),
(14, 13, 11, NULL, 'artificial note', '2021-03-25 13:19:46', 'Artificial', 1, 'DP_05032021021744.png', 2, 200, 'abcdefhji', 'fretrhr', 1, 'lorem', 'CS', 'asfgdf', b'00', '0', 'Preview_104032021034020.pdf', '2021-03-05 14:17:44', NULL, NULL, NULL, b'00'),
(16, 13, 11, 23, 'note is not good', '2021-03-25 13:19:46', 'abcdefg', 1, 'DP_14032021110841.png', 1, 200, 'ACBDFGN', 'aadsf', 1, 'df', 'dv', 'ertghn', b'00', '0', 'Preview_104032021034020.pdf', '2021-03-14 11:08:41', NULL, NULL, NULL, b'00'),
(24, 1, 11, NULL, 'mobile', '2021-03-25 13:19:46', 'Mobile', 2, 'DP_18032021015402.jpg', 2, 100, 'lorem ipsum abcde efhv wdfcvc wshcixk  scx  ascdv vsdfv sdfbgnb sdfgh sdfgnb sdfgnh sdfg dsfgh sdfggn sdfgh sdfgnh sdfggn dsfggn abddf wdgjcd wd sfjs wegdw fgdjgw fg ', 'L.j', 1, 'Cyber security', 'lorem', 'NIkhil', b'01', '1233', 'Preview_18032021015402.pdf', '2021-03-18 13:54:02', NULL, NULL, NULL, b'00'),
(25, 1, 9, 23, NULL, '2021-03-25 13:19:46', 'Web Design', 1, 'DP_18032021020532.png', 2, 200, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tortor aliquam nulla facilisi cras fermentum odio eu. Mus mauris vitae ultricies leo integer malesuada nunc vel risus. Odio tempor orci dapibus ultrices in iaculis nunc sed. Ante metus dictum at tempor commodo ullamcorper a lacus. Lorem ipsum dolor sit', 'L.j', 1, 'lorem', 'lorem', 'cfcv', b'01', '1342', 'Preview_18032021020532.pdf', '2021-03-18 14:05:32', NULL, NULL, NULL, b'01'),
(26, 1, 11, 23, 'not good book\r\n', '2021-03-25 13:19:46', 'Vector algebra', 1, 'DP_18032021020807.png', 2, 200, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tortor aliquam nulla facilisi cras fermentum odio eu. Mus mauris vitae ultricies leo integer malesuada nunc vel risus. Odio tempor orci dapibus ultrices in iaculis nunc sed. Ante metus dictum at tempor commodo ullamcorper a lacus. Lorem ipsum dolor sit', 'abvd', 3, 'Cyber security', 'CS', 'ertghn', b'01', '1342', 'Preview_18032021020807.pdf', '2021-03-18 14:08:07', NULL, NULL, NULL, b'00'),
(27, 1, 9, 23, NULL, '2021-03-25 13:19:46', 'JSN', 3, 'DP_20032021033351.png', 2, 200, 'abvcdgdgsgh fxghjgkh  fghjkhlj dghfjkl', 'aadsf', 4, 'lorem', 'lorem', '', b'01', '1233', 'Preview_20032021033351.pdf', '2021-03-20 15:33:51', NULL, NULL, NULL, b'01'),
(28, 1, 9, 23, NULL, '2021-03-25 13:19:46', 'xyz', 1, 'DP_20032021033625.png', 1, 200, 'lorem ipsum c y  uguddtyhfjgk fxgchvjk gchvjk gxchvjk', 'jf xgdhf', 4, 'Cyber security', 'gfdh', 'NIkhil', b'00', '0', 'Preview_20032021033625.pdf', '2021-03-20 15:36:25', NULL, NULL, NULL, b'01'),
(29, 1, 9, 23, NULL, '2021-03-25 13:19:46', 'Cancer', 2, 'DP_23032021051147.png', 1, 100, 'abcfrtgggg', 'fretrhr', 1, 'avbccc', 'dvf', 'sfgbx', b'00', '0', 'Preview_23032021051147.pdf', '2021-03-23 17:11:47', NULL, NULL, NULL, b'01'),
(30, 13, 9, 23, NULL, '2021-03-25 13:19:46', 'INDIA', 3, 'DP_25032021105725.png', 1, 100, 'abcdef hwdefg dklfkgbnh', 'jf xgdhf', 3, 'lorem', 'dav', 'vf bfg', b'01', '100', 'Preview_25032021105725.pdf', '2021-03-25 10:57:25', NULL, NULL, NULL, b'01'),
(31, 1, 9, 23, NULL, '2021-03-25 13:19:46', 'England', 1, 'DP_25032021011636.png', 1, 100, 'abcdefghijklmnopqrstuvwxyz', 'aadsf', 2, 'gjdh ', 'gfdh', 'asfgdf', b'01', '1233', 'Preview_25032021011636.pdf', '2021-03-25 13:16:36', NULL, NULL, NULL, b'01'),
(32, 1, 10, 23, 'not good', NULL, 'IRON Man', 2, 'DP_26032021125653.png', 2, 100, 'abccdefgjfb fevh bfdv bjcdvcf bdcv jdcvcb jdckvbj dcknv ', 'jf xgdhf', 4, 'lorem', 'dav', 'vf bfg', b'01', '1222', 'Preview_26032021125653.pdf', '2021-03-26 12:56:53', NULL, NULL, NULL, b'01'),
(33, 1, 10, 23, 'not good', NULL, 'Pune', 1, 'DP_26032021010557.png', 1, 100, 'abcdefghijklmnopqrstuvwxyz', 'abvd', 2, 'lorem', 'dv', 'vf bfg', b'01', '1342', 'Preview_26032021010557.pdf', '2021-03-26 13:05:57', NULL, NULL, NULL, b'01'),
(34, 1, 10, 23, 'not good', NULL, 'Chennai', 1, 'DP_26032021011849.png', 2, 200, 'abcddef asbg', 'L.j', 2, 'gjdh ', 'lorem', 'vf bfg', b'01', '200', 'Preview_26032021011849.pdf', '2021-03-26 13:18:49', NULL, NULL, NULL, b'01'),
(35, 1, 10, 23, 'not good', NULL, 'bharat', 3, 'DP_26032021021234.png', 2, 200, 'abcdefghijklmnopqrstuvwxyz', 'jf xgdhf', 4, 'lorem', 'dav', 'ertghn', b'01', '1233', 'Preview_26032021021234.pdf', '2021-03-26 14:12:34', NULL, NULL, NULL, b'01'),
(36, 13, 11, NULL, NULL, '2021-04-01 00:00:00', 'MSDHONI', 1, 'DP_26032021044734.png', 1, 200, 'abcdefghijklmnop', 'jfxgdhf', 3, 'avbccc', 'dvf', 'ertghn', b'01', '400', 'Preview_26032021044734.pdf', '2021-03-26 16:47:34', NULL, NULL, NULL, b'00'),
(38, 13, 10, 23, 'not good', NULL, 'Sachin', 1, 'DP_26032021122914.png', 1, 1, 'abcdefghijklmnopqrstuvwxyz', '1', 1, 'avbccc', 'gfdh', 'ertghn', b'00', '0', 'Preview_26032021045832.pdf', '2021-03-26 16:58:32', NULL, NULL, NULL, b'01'),
(39, 13, 9, 23, NULL, '2021-04-10 13:54:29', 'Krunal', 2, 'DP_26032021072434.png', 2, 200, 'abcdefghijklmnopqersr', 'aadsf', 2, ' fvh ', 'dvf', 'sfgbx', b'01', '100', 'Preview_26032021072434.pdf', '2021-03-26 19:24:34', NULL, NULL, NULL, b'01'),
(40, 24, 11, NULL, NULL, NULL, 'Deep Learning', 1, 'DP_31032021024029.png', 1, 100, 'abcdefghijklmnopqerstuvwxyz', 'jf xgdhf', 4, 'gjdh ', 'gfdh', 'asfgdf', b'00', '0', 'Preview_31032021024029.pdf', '2021-03-31 14:40:29', NULL, NULL, NULL, b'00'),
(41, 29, 9, 23, NULL, '2021-04-09 00:00:00', 'Drawing', 3, 'DP_09042021042909.png', 2, 200, 'noyts zzfvchv zfxvgchvjk gchvb', 'bhyk fcx', 5, 'xyz', 'vgd', 'abcdefghj', b'01', '1500', 'Preview_09042021042909.pdf', '2021-04-09 16:29:09', NULL, NULL, NULL, b'01'),
(42, 1, 10, 23, 'note good note', NULL, 'Painting', 3, 'DP_09042021104049.png', 3, 200, 'abcdefghijklmnopqrstuvwxyz', 'jf xgdhf', 5, ' fvh ', 'dav', 'sfgbx', b'01', '5000', 'Preview_09042021104049.pdf', '2021-04-09 22:40:49', NULL, NULL, NULL, b'01'),
(43, 1, 10, 23, 'bad content', NULL, 'chair', 4, 'DP_10042021010154.png', 3, 200, 'abcdefghijklmnopqrstuvwxyz', 'aadsf', 3, 'gjdh ', 'lorem', '', b'00', '0', 'Preview_10042021010154.pdf', '2021-04-10 13:01:54', NULL, NULL, NULL, b'01'),
(44, 1, 9, 23, NULL, '2021-04-16 11:01:18', 'askhd', 1, 'DP_10042021051412.png', 3, 200, 'abcdrtg', 'fretrhr', 1, 'avbccc', 'dav', 'sfgbx', b'01', '100', 'Preview_10042021051412.pdf', '2021-04-10 17:14:12', NULL, NULL, NULL, b'01'),
(45, 1, 9, 23, NULL, '2021-04-16 22:32:43', 'cfgffghj', 4, 'DP_10042021052329.png', 3, 200, 'abcdefghijklmnopqrstuvwxyz', 'fretrhr', 1, 'lorem', 'dav', 'sfgbx', b'01', '12345', 'Preview_10042021052329.pdf', '2021-04-10 17:23:29', NULL, NULL, NULL, b'01'),
(46, 13, 10, 23, 'worst book', NULL, 'happy', 3, 'DP_12042021093655.png', 3, 200, 'abccdefghijklmnop', 'fretrhr', 5, 'lorem', '1230', 'sfgbx', b'01', '1222', 'Preview_12042021093655.pdf', '2021-04-12 09:36:55', NULL, NULL, NULL, b'01'),
(48, 1, 10, 23, 'bad content', NULL, 'Jethalal', 3, 'DP_12042021102402.png', 3, 200, 'abcdefghijklmnopqrstuvwxyz', 'abvd', 2, 'gjdh ', '1234', 'ertghn', b'00', '0', 'Preview_12042021102402.pdf', '2021-04-12 10:24:02', NULL, NULL, NULL, b'01'),
(49, 1, 9, 23, NULL, '2021-04-16 11:00:12', 'Bhide', 2, 'DP_16042021105340.png', 3, 200, 'abcdefghijkldfv', 'aadsf', 5, 'gjdh ', 'dav', 'ertghn', b'00', '0', 'Preview_16042021105340.pdf', '2021-04-16 10:53:40', NULL, NULL, NULL, b'01'),
(51, 1, 11, 23, 'abcdefgh', '2021-04-16 22:32:34', 'Bhukhhadtal', 2, 'DP_16042021060739.png', 2, 2, 'abcdefghijklmnopqrstuvwxyz', '2', 2, 'fvh', 'dvf', 'ertghn', b'00', '0', 'Preview_16042021060739.pdf', '2021-04-16 18:07:39', NULL, NULL, NULL, b'00'),
(52, 1, 9, 23, NULL, '2021-04-16 22:32:24', 'Microprocessor', 3, 'DP_16042021102613.png', 3, 200, 'asdfgn vgnjmkvn hjk ghjgkhl ghjk dhfjgk hj', 'abvd', 3, 'avbccc', 'gfdh', 'sfgbx', b'00', '0', 'Preview_16042021102613.pdf', '2021-04-16 22:26:13', NULL, NULL, NULL, b'01'),
(53, 13, 9, 23, NULL, '2021-04-17 21:12:14', 'Gujarati', 1, 'DP_17042021090544.png', 2, 200, 'abcdefghijkl', 'jf xgdhf', 2, 'Cyber security', '88', 'ertghn', b'01', '2000', 'Preview_17042021090544.pdf', '2021-04-17 21:05:44', NULL, NULL, NULL, b'01'),
(54, 1, 8, 23, NULL, NULL, 'Hanuman', 1, 'DP_18042021095230.png', 1, 200, 'abcdefghijkl', 'aadsf', 1, 'gjdh ', '90', 'vf bfg', b'00', '0', 'Preview_18042021095230.pdf', '2021-04-18 09:52:30', NULL, NULL, NULL, b'01'),
(56, 37, 11, 23, 'note is not good', NULL, 'Enviroment Book', 1, 'DP_18042021020623.png', 1, 1, 'this note is for enviroment', '1', 1, 'Enviroment', '32', 'NIkhil', b'01', '120', 'Preview_18042021020623.pdf', '2021-04-18 14:06:23', NULL, NULL, NULL, b'00'),
(57, 13, 7, NULL, NULL, NULL, 'abcdef', 5, 'DP_19042021065120.png', 4, 100, 'abcdefghijkl', 'lj', 4, 'fvh', 'lorem', 'asfgdf', b'01', '1222', 'Preview_19042021065120.pdf', '2021-04-19 18:51:20', NULL, NULL, NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesattachments`
--

CREATE TABLE `sellernotesattachments` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `FileName` varchar(100) NOT NULL,
  `FilePath` varchar(500) NOT NULL,
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
(38, 1, '104032021035752.pdf', 'uploads/Members/13/1/attachments/104032021035752.pdf', NULL, NULL, NULL, NULL, b'00'),
(39, 2, '3904032021040537.pdf', 'uploads/Members//13/2/attachments/3904032021040537.pdf', NULL, NULL, NULL, NULL, b'01'),
(40, 3, '4004032021041759.pdf', 'uploads/Members/13/3/attachments/4004032021041759.pdf', NULL, NULL, NULL, NULL, b'00'),
(41, 4, '4104032021042053.pdf', 'uploads/Members/13/4/attachments/4104032021042053.pdf', NULL, NULL, NULL, NULL, b'00'),
(42, 11, '4204032021043616.pdf', 'uploads/Members/13/11/attachments/4204032021043616.pdf', NULL, NULL, NULL, NULL, b'01'),
(43, 12, '4304032021043814.pdf', 'uploads/Members/13/12/attachments/4304032021043814.pdf', NULL, NULL, NULL, NULL, b'01'),
(44, 13, '4404032021113021.pdf', 'uploads/Members/13/13/attachments/4404032021113021.pdf', NULL, NULL, NULL, NULL, b'00'),
(45, 14, '4505032021021744.pdf', 'uploads/Members/13/14/attachments/4505032021021744.pdf', NULL, NULL, NULL, NULL, b'00'),
(47, 16, '4714032021110841.pdf', 'uploads/Members/13/16/attachments/4714032021110841.pdf', NULL, NULL, NULL, NULL, b'00'),
(48, 24, '4818032021015402.pdf', 'uploads/Members/1/24/attachments/4818032021015402.pdf', NULL, NULL, NULL, NULL, b'00'),
(49, 25, '4918032021020532.pdf', 'uploads/Members/1/25/attachments/4918032021020532.pdf', NULL, NULL, NULL, NULL, b'01'),
(50, 26, '5018032021020807.pdf', 'uploads/Members/1/26/attachments/5018032021020807.pdf', NULL, NULL, NULL, NULL, b'00'),
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
(65, 36, '6526032021044734.pdf', 'uploads/Members/13/36/attachments/6526032021044734.pdf', NULL, NULL, NULL, NULL, b'00'),
(67, 38, '6626032021045832.pdf', 'uploads/Members/13/38/attachments/6626032021045832.pdf', NULL, NULL, NULL, NULL, b'01'),
(68, 39, '6826032021072434.pdf', 'uploads/Members/13/39/attachments/6826032021072434.pdf', NULL, NULL, NULL, NULL, b'01'),
(69, 40, '6931032021024029.pdf', 'uploads/Members/24/40/attachments/6931032021024029.pdf', NULL, NULL, NULL, NULL, b'01'),
(70, 41, '7009042021042909.pdf', 'uploads/Members/29/41/attachments/7009042021042909.pdf', NULL, NULL, NULL, NULL, b'01'),
(71, 42, '7109042021104049.pdf', 'uploads/Members/1/42/attachments/7109042021104049.pdf', NULL, NULL, NULL, NULL, b'01'),
(72, 43, '7210042021010155.pdf', 'uploads/Members/1/43/attachments/7210042021010155.pdf', NULL, NULL, NULL, NULL, b'01'),
(73, 44, '7310042021051412.pdf', 'uploads/Members/1/44/attachments/7310042021051412.pdf', NULL, NULL, NULL, NULL, b'01'),
(74, 45, '7410042021052329.pdf', 'uploads/Members/1/45/attachments/7410042021052329.pdf', NULL, NULL, NULL, NULL, b'01'),
(75, 46, '7512042021093655.pdf', 'uploads/Members/13/46/attachments/7512042021093655.pdf', NULL, NULL, NULL, NULL, b'01'),
(77, 48, '7612042021102402.pdf', 'uploads/Members/1/48/attachments/7612042021102402.pdf', NULL, NULL, NULL, NULL, b'01'),
(78, 49, '7816042021105340.pdf', 'uploads/Members/1/49/attachments/7816042021105340.pdf', NULL, NULL, NULL, NULL, b'01'),
(79, 49, '7916042021105340.pdf', 'uploads/Members/1/49/attachments/7916042021105340.pdf', NULL, NULL, NULL, NULL, b'01'),
(94, 51, '8016042021023808.pdf', 'uploads/Members/1/51/attachments/8016042021023808.pdf', NULL, NULL, NULL, NULL, b'00'),
(95, 51, '9516042021023808.pdf', 'uploads/Members/1/51/attachments/9516042021023808.pdf', NULL, NULL, NULL, NULL, b'00'),
(96, 51, '9616042021023808.pdf', 'uploads/Members/1/51/attachments/9616042021023808.pdf', NULL, NULL, NULL, NULL, b'00'),
(97, 52, '9716042021102613.pdf', 'uploads/Members/1/52/attachments/9716042021102613.pdf', NULL, NULL, NULL, NULL, b'01'),
(98, 53, '9817042021090545.pdf', 'uploads/Members/13/53/attachments/9817042021090545.pdf', NULL, NULL, NULL, NULL, b'01'),
(99, 54, '9918042021095230.pdf', 'uploads/Members/1/54/attachments/9918042021095230.pdf', NULL, NULL, NULL, NULL, b'01'),
(104, 56, '10018042021103901.', 'uploads/Members/37/56/attachments/10018042021103901.', NULL, NULL, NULL, NULL, b'01'),
(106, 57, '10519042021032150.pdf', 'uploads/Members/13/57/attachments/10519042021032150.pdf', NULL, NULL, NULL, NULL, b'01');

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
(4, 3, 1, 7, 'wrost language', '2021-03-19 18:30:43', 1, NULL, NULL),
(6, 2, 25, 89, 'abcdefghijkl', '2021-03-26 17:49:23', 25, NULL, NULL),
(7, 41, 1, 96, 'abcdefghijklmnopqrstuvwxyz', '2021-04-12 09:47:28', 1, NULL, NULL),
(9, 45, 13, 109, 'abcdefghijk', '2021-04-18 09:21:14', 13, NULL, NULL),
(10, 31, 13, 82, 'abcdefgh', '2021-04-18 09:21:38', 13, NULL, NULL);

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
(5, 4, 1, 8, '4', 'nice book', '2021-03-19 17:44:02', 1, NULL, NULL, b'01'),
(6, 1, 24, 17, '1', 'nice book', '2021-03-22 16:56:09', 24, NULL, NULL, b'01'),
(7, 1, 25, 88, '4', '4.5 Star book', '2021-03-26 17:47:24', 25, NULL, NULL, b'01'),
(9, 41, 1, 96, '4', 'notes is good', '2021-04-12 09:46:54', 1, NULL, NULL, b'01'),
(10, 39, 1, 115, '5', 'abcdefghijklmnop', '2021-04-16 22:45:24', 1, NULL, NULL, b'01'),
(11, 27, 13, 113, '5', 'abcdefghijklmno', '2021-04-18 09:20:44', 13, NULL, NULL, b'01'),
(13, 2, 1, 6, '5', 'nice', '2021-04-18 09:23:44', 1, NULL, NULL, b'01'),
(14, 2, 37, 120, '5', 'nice awesome book', '2021-04-18 13:56:30', 37, NULL, NULL, b'01');

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
(2, 'supportemail', 'notesmarketplace4120@gmail.com', '2021-04-09 10:32:53', 23, NULL, NULL, b'01'),
(3, 'supportphone', '09104653449', '2021-04-09 10:32:53', 23, NULL, NULL, b'01'),
(4, 'emailaddresses', 'nikhilvshah12274@gmail.com,nikhilshah4120@gmail.com', '2021-04-09 10:32:53', 23, NULL, NULL, b'01'),
(5, 'facebookurl', 'https://www.facebook.com/', '2021-04-09 10:32:53', 23, NULL, NULL, b'01'),
(6, 'twitterurl', 'https://www.twitter.com/', '2021-04-09 10:32:53', 23, NULL, NULL, b'01'),
(7, 'linkedinurl', 'https://www.linkedin.com/', '2021-04-09 10:32:53', 23, NULL, NULL, b'01'),
(8, 'defaultprofilepicture', 'reviewer-1.png', '2021-04-09 10:32:53', 23, NULL, NULL, b'01'),
(9, 'defaultnote', 'computer-science.png', '2021-04-09 10:32:53', 23, NULL, NULL, b'01');

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
(19, 1, '2020-01-04', 1, '', '+91', '8460469135', 'DP_24032021055946.jpg', '3060,Ubhsosher', 'Vanmali vanka ni pole', 'Ahmedabad', 'Gujarat', '380001', '3', 'FOREIGNer', 'Silveroack', '2021-03-18 10:13:57', 1, NULL, NULL),
(20, 13, '2021-01-04', 1, '', '+91', '45465678', 'DP_16042021070630.png', '3060,Ubhosher,Vanmali vanka ni Pole', '', 'Shahpur Ahmedabad', 'Gujarat', '380001', '4', 'GUJARAT TECHNOLOGICAL UNIVERSITY', 'lj', '2021-03-18 12:37:54', 13, NULL, NULL),
(21, 25, '2021-01-11', 1, '', '+91', '9104653449', 'DP_26032021011632.png', '3060,Ubhosher,Vanmali vanka ni Pole', '', 'Shahpur Ahmedabad', 'Gujarat', '380001', '4', 'GUJARAT TECHNOLOGICAL UNIVERSITY', 'lj', '2021-03-26 17:46:32', 25, NULL, NULL),
(24, 26, NULL, NULL, 'abc@gmail.com', '91', '9825815254', 'DP_07042021112653.jpg', '', '', '', '', '', '', NULL, NULL, '2021-04-04 17:53:08', 23, NULL, NULL),
(25, 23, NULL, NULL, 'nikhilvshah12274@gmail.com', '+91', '8460469135', 'DP_16042021070330.jpg', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 28, NULL, NULL, '', '+91', '9998293980', NULL, '', '', '', '', '', '', NULL, NULL, '2021-04-09 13:53:54', 23, NULL, NULL),
(27, 29, '2000-01-04', 1, '', '+91', '09104653449', 'DP_09042021125336.png', 'UBHOSHER SHAHPUR', '', 'Select', 'Gujarat', '380001', '5', 'GUJARAT TECHNOLOGICAL UNIVERSITY', 'Silveroack', '2021-04-09 16:23:36', 29, NULL, NULL),
(28, 33, NULL, NULL, 'abc@gmail.com', '+91', '09104653449', 'DP_18042021052027.png', '', '', '', '', '', '', NULL, NULL, '2021-04-17 15:52:57', 23, NULL, NULL),
(29, 36, NULL, NULL, '', '+61', '1234567', NULL, '', '', '', '', '', '', NULL, NULL, '2021-04-18 10:45:20', 23, NULL, NULL),
(30, 35, '2000-01-04', 1, '', '+91', '8460469135', 'DP_18042021074624.png', 'Tatvahouse', 'S.G.Highway', 'Ahmedabad', 'Gujarat', '380001', '1', 'Deem', 'LDRP', '2021-04-18 11:16:24', 35, NULL, NULL),
(31, 37, '2021-02-16', 1, '', '+91', '09104653449', 'DP_18042021102410.png', 'UBHOSHER SHAHPUR', 'shahpur', 'Select', 'Gujarat', '380001', '1', 'GTU', 'LJ', '2021-04-18 13:54:10', 37, NULL, NULL);

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
  `Password` varchar(80) NOT NULL,
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
(1, 3, 'nikhil', 'shah', 'nikhilshah4120@gmail.com', '$2y$10$zJLvOUXtJ6zEOArGbHXM1eRrvnE8kjKRM1FB3FKjTObRZ4pJ9lR6a', b'01', '2021-02-21 13:09:31', NULL, '2021-02-21 13:09:31', NULL, b'01'),
(13, 3, 'nik', 'shah', 'nikhilvshah12274@gmail.com', '$2y$10$LW29K2j/h5B5TgtAItvR2eToPJM3t8VwumZzxiFr8zTLW8Fhu9yYa', b'01', '2021-02-24 15:22:36', NULL, '2021-02-24 15:22:36', NULL, b'01'),
(16, 3, 'nikhil', 'shah', 'interviewguide4@gmail.com', '$2y$10$LW29K2j/h5B5TgtAItvR2eToPJM3t8VwumZzxiFr8zTLW8Fhu9yYa', b'00', '2021-02-27 15:37:31', NULL, '2021-02-27 15:37:31', NULL, b'01'),
(23, 1, 'Nikhil', 'Shah', 'niks04446@gmail.com', '$2y$10$dZvj7CNhh8Ma08sPTjgJ.O2KShJD5X6dZc4MKYmhxk9YFBBinWB3e', b'01', NULL, NULL, NULL, NULL, b'01'),
(24, 3, 'Anjali', 'Shah', 'anjalishah5123@gmail.com', '$2y$10$LW29K2j/h5B5TgtAItvR2eToPJM3t8VwumZzxiFr8zTLW8Fhu9yYa', b'01', '2021-03-18 09:13:23', NULL, '2021-03-18 09:13:23', NULL, b'00'),
(25, 3, 'John', 'pickard', 'malariadetectionsystem@gmail.com', '$2y$10$LW29K2j/h5B5TgtAItvR2eToPJM3t8VwumZzxiFr8zTLW8Fhu9yYa', b'01', '2021-03-26 17:44:30', NULL, '2021-03-26 17:44:30', NULL, b'01'),
(26, 2, 'vinod', 'shah', 'kefet18418@whyflkj.com', '$2y$10$LW29K2j/h5B5TgtAItvR2eToPJM3t8VwumZzxiFr8zTLW8Fhu9yYa', b'01', '2021-04-04 17:53:08', 23, NULL, NULL, b'00'),
(28, 2, 'Vivek', 'Chauhan', 'tamifob365@art2427.com', '$2y$10$LW29K2j/h5B5TgtAItvR2eToPJM3t8VwumZzxiFr8zTLW8Fhu9yYa', b'01', '2021-04-09 13:53:54', 23, NULL, NULL, b'01'),
(29, 3, 'xyz', 'abc', 'gimolek778@whyflkj.com', '$2y$10$LW29K2j/h5B5TgtAItvR2eToPJM3t8VwumZzxiFr8zTLW8Fhu9yYa', b'01', '2021-04-09 16:19:18', NULL, '2021-04-09 16:19:18', NULL, b'01'),
(32, 3, 'ANJALI', 'SHAH', 'hesape5247@whipjoy.com', '$2y$10$LW29K2j/h5B5TgtAItvR2eToPJM3t8VwumZzxiFr8zTLW8Fhu9yYa', b'01', '2021-04-17 14:17:37', NULL, '2021-04-17 14:17:37', NULL, b'01'),
(33, 2, 'ATM', 'SHAH', 'beyal56014@zcai77.com', '$2y$10$rj43cKYSgD4z9zXkS1vhcOrOWiqfVodky0I9vN4RMEvVjxgAztpRy', b'00', '2021-04-17 15:52:57', 23, NULL, NULL, b'01'),
(35, 3, 'Parth', 'Thakkar', 'dabot49826@zcai77.com', '$2y$10$a4js/TQYsfKKptDctrzVguCOXdg3EcGUG66OY3d.BULJUvSK/duVq', b'01', '2021-04-18 10:23:37', NULL, '2021-04-18 10:23:37', NULL, b'01'),
(36, 2, 'thakkar', 'parth', 'tharpakar1@gmail.com', '$2y$10$M/HMjtRDf5Urh.Yzp16NRe1XwfK9T9RyegQylXFq0Pl9IPDyrcMDe', b'00', '2021-04-18 10:45:20', 23, NULL, NULL, b'01'),
(37, 3, 'Khushal', 'Shah', 'nikhil@gmail.com', '$2y$10$jJuT3kySgnaTx1.UNzmDTuzxU0eN8l7/ahGwkP3.Dyhd5rh71946u', b'01', '2021-04-18 13:41:47', NULL, '2021-04-18 13:41:47', NULL, b'01');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `notecategories`
--
ALTER TABLE `notecategories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notetypes`
--
ALTER TABLE `notetypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `referencedata`
--
ALTER TABLE `referencedata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sellernotes`
--
ALTER TABLE `sellernotes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `sellernotesattachments`
--
ALTER TABLE `sellernotesattachments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sellernotesreview`
--
ALTER TABLE `sellernotesreview`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `systemconfiguration`
--
ALTER TABLE `systemconfiguration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=38;

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
