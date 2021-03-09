-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 01:19 PM
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
(1, 13, 9, 1, 'nikhil is good', '2021-03-04 15:57:52', 'compute', 2, 'DP_04032021035752.png', 1, 1, 'lorem ipsum abcd', '1', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_04032021035752.png', NULL, NULL, NULL, NULL, b'01'),
(2, 13, 9, 1, 'nikhil is good', '2021-03-04 16:05:37', 'cs', 2, 'DP_04032021040537.png', 1, 1, 'lorem ipsum', '1', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_04032021040537.png', NULL, NULL, NULL, NULL, b'01'),
(3, 13, 9, 1, 'nikhil is good', '2021-03-04 16:17:59', 'AI', 2, 'DP_04032021041759.png', 1, 1, 'abcdefg', '1', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_04032021041759.png', NULL, NULL, NULL, NULL, b'01'),
(4, 13, 9, 1, 'nikhil is good', '2021-03-04 16:20:53', 'social', 2, 'DP_04032021042053.png', 1, 1, 'abcdefg', '1', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_04032021042053.png', NULL, NULL, NULL, NULL, b'01'),
(5, 13, 9, 1, 'nikhil is good', '2021-03-04 16:20:53', 'Study', 2, 'DP_04032021042053.png', 1, 1, 'abcdefg', '1', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_04032021042053.png', NULL, NULL, NULL, NULL, b'01'),
(6, 13, 9, 1, 'nikhil is good', '2021-03-04 16:20:53', 'lorem', 2, 'DP_04032021042053.png', 1, 1, 'abcdefg', '1', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_04032021042053.png', NULL, NULL, NULL, NULL, b'01'),
(7, 13, 9, 1, 'nikhil is good', '2021-03-04 16:20:53', 'ipsum', 2, 'DP_04032021042053.png', 1, 1, 'abcdefg', '1', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_04032021042053.png', NULL, NULL, NULL, NULL, b'01'),
(8, 13, 9, 1, 'nikhil is good', '2021-03-04 16:20:53', 'python', 2, 'DP_04032021042053.png', 1, 1, 'abcdefg', '1', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_04032021042053.png', NULL, NULL, NULL, NULL, b'01'),
(9, 13, 9, 1, 'nikhil is good', '2021-03-04 16:20:53', 'C++', 2, 'DP_04032021042053.png', 1, 1, 'abcdefg', '1', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_04032021042053.png', NULL, NULL, NULL, NULL, b'01'),
(10, 13, 9, 1, 'nikhil is good', '2021-03-04 16:20:53', 'Java', 2, 'DP_04032021042053.png', 1, 1, 'abcdefg', '1', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_04032021042053.png', NULL, NULL, NULL, NULL, b'01'),
(11, 13, 7, 1, 'nikhil is good', '2021-03-04 16:36:16', 'Python Programming', 2, 'DP_04032021043616.png', 1, 1, 'ABCDEFGHIJKLMNOPQ', '1', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_04032021043616.png', '2021-03-04 00:00:00', NULL, NULL, NULL, b'01'),
(12, 13, 7, 1, 'nikhil is good', '2021-03-04 16:38:14', 'nikhil', 2, 'DP_04032021043814.png', 1, 1, 'ABCDEFGHIJKLMNOPQ', '1', 1, 'gjdh', 'dav', 'asfgdf', b'00', '0', 'Preview_04032021043814.png', '2021-03-05 00:00:00', NULL, NULL, NULL, b'01'),
(13, 13, 6, 1, 'nikhil is good', '2021-03-04 23:30:20', 'todo', 2, 'DP_04032021113020.png', 1, 1, 'abcdefghijkl', '1', 1, 'df', 'dv', 'asfgdf', b'00', '0', 'Preview_04032021113020.png', '2021-03-05 00:00:00', NULL, NULL, NULL, b'01'),
(14, 13, 7, NULL, NULL, NULL, 'Artificial', 1, 'DP_05032021021744.png', 2, 200, 'abcdefhji', 'fretrhr', 1, 'lorem', 'CS', 'asfgdf', b'00', '0', 'Preview_05032021021744.png', '2021-03-05 14:17:44', NULL, NULL, NULL, b'01'),
(15, 13, 6, NULL, NULL, NULL, 'vinodbhai', 3, 'DP_05032021024756.png', 1, 200, 'abcdefgghj', 'jf xgdhf', 2, 'gjdh ', 'dvf', 'ertghn', b'01', '1342', 'Preview_05032021024756.png', '2021-03-05 14:47:56', NULL, NULL, NULL, b'01');

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
(38, 1, '104032021035752.pdf', 'uploads/13/1/104032021035752.pdf', NULL, NULL, NULL, NULL, b'01'),
(39, 2, '3904032021040537.pdf', 'uploads/13/2/3904032021040537.pdf', NULL, NULL, NULL, NULL, b'01'),
(40, 3, '4004032021041759.pdf', 'uploads/13/3/4004032021041759.pdf', NULL, NULL, NULL, NULL, b'01'),
(41, 4, '4104032021042053.pdf', 'uploads/13/4/4104032021042053.pdf', NULL, NULL, NULL, NULL, b'01'),
(42, 11, '4204032021043616.pdf', 'uploads/13/11/4204032021043616.pdf', NULL, NULL, NULL, NULL, b'01'),
(43, 12, '4304032021043814.pdf', 'uploads/13/12/4304032021043814.pdf', NULL, NULL, NULL, NULL, b'01'),
(44, 13, '4404032021113021.pdf', 'uploads/13/13/4404032021113021.pdf', NULL, NULL, NULL, NULL, b'01'),
(45, 14, '4505032021021744.pdf', 'uploads/13/14/4505032021021744.pdf', NULL, NULL, NULL, NULL, b'01'),
(46, 15, '4605032021024756.pdf', 'uploads/13/15/4605032021024756.pdf', NULL, NULL, NULL, NULL, b'01');

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
(1, 'emailaddresss', 'nikhilshah4120@gmail.com', NULL, NULL, NULL, NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DOB` datetime DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `SecondaryEmailAddress` varchar(100) NOT NULL,
  `Country code` varchar(5) NOT NULL,
  `Phonenumber` varchar(20) NOT NULL,
  `Profile Picture` varchar(500) DEFAULT NULL,
  `Address Line 1` varchar(100) NOT NULL,
  `Address Line 2` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Zip Code` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `University` varchar(100) DEFAULT NULL,
  `College` varchar(100) DEFAULT NULL,
  `CreaatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifyBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`ID`, `UserID`, `DOB`, `Gender`, `SecondaryEmailAddress`, `Country code`, `Phonenumber`, `Profile Picture`, `Address Line 1`, `Address Line 2`, `City`, `State`, `Zip Code`, `Country`, `University`, `College`, `CreaatedDate`, `CreatedBy`, `ModifiedDate`, `ModifyBy`) VALUES
(1, 1, '2021-02-10 00:00:00', 1, '', '+91', '8460469135', NULL, 'sadfdbfgv dfsxc', 'sdsfv dcvc ', 'fdvcx', 'sacdx', 'cx', 'sxcfd', 'sdxc', 'sxcz', NULL, NULL, NULL, NULL);

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
(1, 3, 'nikhil', 'shah', 'nikhilshah4120@gmail.com', 'fO6Ieb*(JHXD', b'01', '2021-02-21 13:09:31', NULL, '2021-02-21 13:09:31', NULL, b'01'),
(13, 3, 'nikhil', 'shah', 'nikhilvshah12274@gmail.com', 'Nikhil12275@', b'01', '2021-02-24 15:22:36', NULL, '2021-02-24 15:22:36', NULL, b'01'),
(16, 3, 'nikhil', 'shah', 'interviewguide4@gmail.com', 'Nikhil12275@', b'00', '2021-02-27 15:37:31', NULL, '2021-02-27 15:37:31', NULL, b'01'),
(22, 3, 'anjali', 'shah', 'anjalishah5123@gmail.com', 'Anjali123@', b'01', '2021-03-05 09:15:05', NULL, '2021-03-05 09:15:05', NULL, b'01'),
(23, 2, 'Nikhil', 'Shah', 'niks04446@gmail.com', 'Nikhil12275@', b'01', NULL, NULL, NULL, NULL, b'01');

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
  ADD KEY `userid` (`UserID`),
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sellernotesattachments`
--
ALTER TABLE `sellernotesattachments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellernotesreview`
--
ALTER TABLE `sellernotesreview`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `systemconfiguration`
--
ALTER TABLE `systemconfiguration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=24;

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
