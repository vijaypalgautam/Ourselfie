-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 30, 2021 at 01:40 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `liker`, `liked`) VALUES
(15, 'ashish', 'ashish'),
(17, 'ashish', 'vijay'),
(18, 'vijay', 'vijay');

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
  `time` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `time`) VALUES
(1, 'ashish', 'vijay', 'hi', '2021-08-30 19:04:26');

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
  `mobile_no` bigint(10) NOT NULL,
  `userId` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `profileImage` varchar(35) NOT NULL,
  `time` varchar(35) NOT NULL,
  `count` varchar(15) NOT NULL,
  PRIMARY KEY (`sNo`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sNo`, `fName`, `lName`, `DOB`, `gender`, `email`, `countryCode`, `mobile_no`, `userId`, `password`, `profileImage`, `time`, `count`) VALUES
(1, 'Vijay', 'pal', '1997-12-05', 'male', 'vijay@pal.com', '91', 7018396648, 'vijay', '12345', 'image/IMG1.jpg', '2021-08-30 18:42:41', '2'),
(2, 'ashish', 'kumar', '2001-01-01', 'male', 'a@a.com', '91', 1234567890, 'ashish', '12345', 'image/male.png', '2021-08-30 18:50:46', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
