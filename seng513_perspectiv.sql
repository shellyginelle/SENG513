-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2016 at 09:26 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seng513_perspectiv`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `UserID` varchar(6) NOT NULL,
  `ImageID` varchar(50) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Caption` text NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Ratings` varchar(1) NOT NULL,
  `Comments` varchar(1) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `numViews` int(11) NOT NULL,
  PRIMARY KEY (`UserID`,`ImageID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `UserID` varchar(6) NOT NULL,
  `ImageID` varchar(50) NOT NULL,
  `Tag` varchar(50) NOT NULL,
  PRIMARY KEY (`UserID`,`ImageID`,`Tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` varchar(6) NOT NULL,
  `Fname` char(255) NOT NULL,
  `Lname` char(255) NOT NULL,
  `username` char(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `numImages` int(11) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Fname`, `Lname`, `username`, `email`, `password`, `numImages`) VALUES
('1', 'Andrew', 'Dong', 'd0nGa', 'andrew.mh.dong@gmail.com', 'password', 1),
('2', 'Andrew', 'Dong', 'DONGMAN', 'andrew@gmail.com', '1234', 1),
('671379', 'John', 'Cajayon', 'john', 'john@gmail.com', 'john', 1),
('758458', 'Jhin', 'Canary', 'jhin', 'jhin@gmail.com', '123', 1),
('800977', 'Abc', 'Abc', 'abc', 'abc@gmail.com', 'abc', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON UPDATE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `userimg` FOREIGN KEY (`UserID`,`ImageID`) REFERENCES `image` (`UserID`, `ImageID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
