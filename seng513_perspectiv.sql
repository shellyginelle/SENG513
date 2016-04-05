-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2016 at 06:57 AM
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
  `AllowRating` varchar(1) NOT NULL,
  `AllowComments` varchar(1) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `numViews` int(11) NOT NULL,
  PRIMARY KEY (`UserID`,`ImageID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`UserID`, `ImageID`, `Title`, `Caption`, `Category`, `AllowRating`, `AllowComments`, `Date`, `numViews`) VALUES
('114744', '1.png', 'Fairy Tail', 'Fairy tail is so cool it''s the best anime everrrrr', 'digital', 'T', 'F', '4/5/2016', 0),
('114744', '2.jpg', 'Vines', 'Vines are so pretty and stuff', 'digital', 'T', 'F', '4/5/2016', 0),
('114744', '3.jpg', 'Quote', 'Quote', 'watercolour', 'T', 'F', '4/5/2016', 0),
('114744', '4.jpg', 'Quote', 'Quote', 'watercolour', 'T', 'F', '4/5/2016', 0),
('114744', '5.jpg', 'A', 'A', 'watercolour', 'F', 'F', '4/5/2016', 0);

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

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`UserID`, `ImageID`, `Tag`) VALUES
('114744', '1.png', 'anime'),
('114744', '1.png', 'characters'),
('114744', '1.png', 'Fairy Tail');

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
('114744', 'Dianna', 'Yim', 'dyim', 'd@gmail.com', '123', 1),
('745461', 'John', 'Cajayon', 'john', 'john@gmail.com', '123', 0);

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
