-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2016 at 06:09 PM
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
('232797', '1.jpg', 'Waterfall', 'Watercolour waterfall', 'Watercolour', 'T', 'T', '4/7/2016', 3),
('232797', '2.jpg', 'Forest Tree Waterfall', 'Waterfall inside a forest', 'Photograph', 'T', 'F', '4/7/2016', 1),
('707890', '1.jpg', 'Peacock', 'Peacock with watercolour medium', 'Watercolour', 'F', 'F', '4/7/2016', 6),
('707890', '10.jpg', 'Panda', 'Black and white panda', 'Watercolour', 'F', 'F', '4/12/2016', 0),
('707890', '11.jpg', 'Raccoon', 'Raccoonniie done with watercolour', 'Watercolour', 'F', 'F', '4/12/2016', 0),
('707890', '12.jpg', 'Wolf', 'Wolf', 'Watercolour', 'F', 'F', '4/12/2016', 0),
('707890', '2.jpg', 'Peacock', 'Peacock drawing with watercolour medium', 'Watercolour', 'T', 'T', '4/7/2016', 4),
('707890', '3.JPG', 'Watercolour Peacock', 'Watercolour peacock', 'Watercolour', 'F', 'F', '4/7/2016', 4),
('707890', '4.jpg', 'Peacock with Watercolour', 'Watercolour peacock', 'Watercolour', 'F', 'F', '4/7/2016', 5),
('707890', '5.jpg', 'Watercolour Bird', 'Bird done with watercolour', 'Watercolour', 'T', 'T', '4/12/2016', 2),
('707890', '6.jpeg', 'Deer', 'Watercolour Deer', 'Watercolour', 'F', 'T', '4/12/2016', 0),
('707890', '7.jpg', 'Watercolour Deer', 'Deer done with watercolour', 'Watercolour', 'F', 'F', '4/12/2016', 0),
('707890', '8.jpg', 'Watercolour Elephant', 'Elephant', 'Watercolour', 'F', 'F', '4/12/2016', 1),
('707890', '9.jpg', 'Owl', 'Watercolour Owl', 'Watercolour', 'F', 'F', '4/12/2016', 0);

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
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Fname`, `Lname`, `username`, `email`, `password`, `numImages`) VALUES
('232797', 'Dianna', 'Yim', 'dianna', 'dianna@gmail.com', '123', 2),
('688490', 'Jenny', 'Wu', 'jenny', 'jenny.wuu@live.ca', '123', 0),
('707890', 'Shelly', 'Sicat', 'shelly', 'shelly@gmaill.com', '123', 12),
('765312', 'Andrew', 'Dong', 'andrew', 'andrew@gmail.com', '123', 0),
('916577', 'John', 'Cajayon', 'john', 'john@gmail.com', '123', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
