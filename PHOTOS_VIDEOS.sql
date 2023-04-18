-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2023 at 08:20 PM
-- Server version: 5.7.41
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erm2015_goodtimeChorus`
--

-- --------------------------------------------------------

--
-- Table structure for table `PHOTOS_VIDEOS`
--

CREATE TABLE `PHOTOS_VIDEOS` (
  `PVID` int(11) NOT NULL,
  `UID` int(11) NOT NULL DEFAULT '0',
  `TID` tinyint(4) NOT NULL,
  `Added` date DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `URL` varchar(200) NOT NULL,
  `altTxt` varchar(200) NOT NULL,
  `caption` varchar(500) DEFAULT NULL,
  `inGallery` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PHOTOS_VIDEOS`
--

INSERT INTO `PHOTOS_VIDEOS` (`PVID`, `UID`, `TID`, `Added`, `Name`, `URL`, `altTxt`, `caption`, `inGallery`) VALUES
(1, 0, 1, NULL, 'Photo 1', 'chorus_ptpg_1.jpg', 'A photo of several men singing', NULL, b'1'),
(2, 0, 1, NULL, 'Photo 2', 'chorus_ptpg_2.jpg', '', NULL, b'1'),
(3, 0, 1, NULL, 'Photo 3', 'chorus_ptpg_3.jpg', '', NULL, b'1'),
(4, 0, 1, NULL, 'Photo 4', 'chorus_ptpg_4.jpg', '', NULL, b'1'),
(5, 0, 1, NULL, 'Photo 5', 'chorus_ptpg_5.jpg', '', '', b'1'),
(6, 0, 1, NULL, 'Photo 6', 'chorus_ptpg_6.jpg', '', NULL, b'1'),
(7, 0, 1, NULL, 'Photo 7', 'chorus_ptpg_7.jpg', '', NULL, b'1'),
(8, 0, 1, NULL, 'Photo 8', 'chorus_ptpg_8.jpg', '', NULL, b'1'),
(9, 0, 1, NULL, 'Photo 9', 'chorus_ptpg_9.jpg', '', NULL, b'1'),
(10, 0, 2, NULL, NULL, '-HBsBiOfA38', '', NULL, b'1'),
(11, 0, 2, NULL, NULL, '-3yrHiAnmjQ', '', NULL, b'1'),
(12, 0, 2, NULL, NULL, 'Y1ZskgSQDNo', '', NULL, b'1'),
(13, 0, 2, NULL, NULL, 'Ckfr_OCCxQY', '', NULL, b'1'),
(14, 0, 2, NULL, NULL, 'LFVzXuBNaOE', '', NULL, b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `PHOTOS_VIDEOS`
--
ALTER TABLE `PHOTOS_VIDEOS`
  ADD PRIMARY KEY (`PVID`),
  ADD KEY `UID` (`UID`),
  ADD KEY `TID` (`TID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `PHOTOS_VIDEOS`
--
ALTER TABLE `PHOTOS_VIDEOS`
  MODIFY `PVID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `PHOTOS_VIDEOS`
--
ALTER TABLE `PHOTOS_VIDEOS`
  ADD CONSTRAINT `PHOTOS_VIDEOS_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `USER` (`UID`),
  ADD CONSTRAINT `PHOTOS_VIDEOS_ibfk_2` FOREIGN KEY (`TID`) REFERENCES `MEDIA_TYPE` (`TID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
