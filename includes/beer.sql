-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2013 at 03:43 PM
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
-- Table structure for table `beer`
--

CREATE TABLE IF NOT EXISTS `beer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `short_description` mediumtext NOT NULL,
  `price_32` decimal(10,2) NOT NULL,
  `price_64` decimal(10,2) NOT NULL,
  `ABV` decimal(10,1) NOT NULL,
  `IBU` decimal(10,0) NOT NULL,
  `long_description` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `beer`
--

INSERT INTO `beer` (`id`, `name`, `short_description`, `price_32`, `price_64`, `ABV`, `IBU`, `long_description`) VALUES
(1, 'Shotgunn Wedding', 'North American Ale with a southern twist. ', '4.50', '7.99', '5.3', '23', 'brewed from malted hops and barley from the deep American South, this brew offers a traditional American ale with a southern twist. Southern spice flavor mixed with a smooth drinkable taste'),
(2, 'Iron Curtain', 'Irish style red ale with a hint of soviet russia', '4.50', '7.99', '5.3', '23', 'Iron Curtain is an Irish red ale with a hint of vodka flavoring. Brewed from a mixture of crytal hops and malted barley to provide a smooth flavor with a caramel infused vodka aftertaste'),
(3, 'The Dark Side', 'european style stout beer.', '2.99', '3.50', '5.8', '20', 'Brewed from european roasted, and malted barley with a hint of coffee, this brew is sure to please any drinker with an irish palet. Its mocha and stout flavor is combined with a tangy aftertaste.'),
(4, 'Heisenberg Ale', 'Smooth wheat ale with baby blue tint', '2.99', '4.50', '5.6', '50', 'It may look like its straight from a science fiction film, but don''t let the blueness fool you.This isn''t your typical wheat beer. Heisenberg provides the smooth and light taste of a wheat ale with the hint of blueberry.'),
(5, 'Weedeater', 'An Imperial IPA with a citrus flavor from the west coast.', '5.50', '8.99', '7.0', '77', 'An imperial IPA with citrus flavors from the west coast. It flows with a resinous mouthfeel, followed by a clean, dry hopped finish'),
(6, 'Goldie Locks', 'A pale lager with a gold coloring and hoppy flavoring. ', '3.25', '5.25', '5.5', '56', 'A pale lager with a gold coloring and hoppy flavoring. ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
