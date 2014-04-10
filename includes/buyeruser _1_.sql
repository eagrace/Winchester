-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2013 at 06:11 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `beer`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyeruser`
--

CREATE TABLE IF NOT EXISTS `buyeruser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Company Name` varchar(200) NOT NULL,
  `rep first name` varchar(200) NOT NULL,
  `rep last name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `buyeruser`
--

INSERT INTO `buyeruser` (`id`, `Company Name`, `rep first name`, `rep last name`, `username`, `password`, `role`) VALUES
(1, 'admin', 'Al', 'koholik', 'admin', 'passwordadmin', 1),
(2, 'Charlie O''s Bar and Grill', 'Ivan', 'Martin', 'charliemartin', 'password1', 2),
(3, 'Applebees', 'Jack', 'Johnson', 'apple_jack', 'password3', 2),
(4, 'Syd''s Bar and Grill', 'Syd', 'nees', 'sydnees', 'password4', 2),
(5, 'Kwik-E-Mart', 'Apu', 'Nahasapeemapetilon', 'apu', 'password5', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
