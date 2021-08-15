-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 06, 2021 at 08:56 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ourselfie`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(35) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `liker` varchar(35) NOT NULL,
  `liked` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `liker`, `liked`) VALUES
(104, 'vijay', 'raj'),
(45, 'vijay', 'ashish'),
(98, 'vijay', 'vijay');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` varchar(35) NOT NULL,
  `outgoing_msg_id` varchar(35) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `time`) VALUES
(1, 'vijay', 'raj', 'hiiiii', '2021-08-04'),
(2, 'raj', 'vijay', '111', '2021-08-05'),
(3, 'raj', 'vijay', 'kya hal h', '2021-08-05'),
(4, 'vijay', 'raj', 'mst', '2021-08-05'),
(5, 'raj', 'vijay', '123', '2021-08-05'),
(6, 'raj', 'vijay', '456', '2021-08-05'),
(7, 'raj', 'vijay', '0987654', '2021-08-05'),
(8, 'raj', 'vijay', 'hklsd', '2021-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `sNo` int(10) NOT NULL AUTO_INCREMENT,
  `fName` varchar(35) NOT NULL,
  `lName` varchar(35) NOT NULL,
  `DOB` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(35) NOT NULL,
  `countryCode` varchar(10) NOT NULL,
  `mobile_no` varchar(13) NOT NULL,
  `userId` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `profileImage` varchar(35) NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp(),
  `count` varchar(15) NOT NULL,
  PRIMARY KEY (`sNo`),
  UNIQUE KEY `mobile_no` (`mobile_no`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sNo`, `fName`, `lName`, `DOB`, `gender`, `email`, `countryCode`, `mobile_no`, `userId`, `password`, `profileImage`, `time`, `count`) VALUES
(1, 'Vijay', 'Gautam', '2021-07-09', 'male', 'vijaypalgautam188@gmail.com', '91', '123', 'vijay', '12345', 'image/IMG1.jpg', '2021-07-29', '20'),
(2, 'raj', 'yadav', '2021-07-01', 'male', 'raj@pratap.com', '91', '1234567890', 'raj', '12345', 'image/male.png', '2021-07-30', '1'),
(3, 'ashish', 'kumar', '2021-08-02', 'male', 'a@a.com', '91', '123456789', 'ashish', '12345', 'image/male.png', '2021-08-05', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
