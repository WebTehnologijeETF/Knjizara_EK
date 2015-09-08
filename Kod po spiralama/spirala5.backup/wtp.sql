-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2015 at 05:19 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wtp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_slovenian_ci NOT NULL,
  `user_name` text COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `user_name`) VALUES
(1, '1111', 'edos');

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE IF NOT EXISTS `komentari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vijesti` int(11) DEFAULT NULL,
  `vrijeme` timestamp NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci,
  `autor` text COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vijesti` (`vijesti`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`id`, `vijesti`, `vrijeme`, `tekst`, `autor`) VALUES
(1, 1, '2015-09-05 20:24:58', 'Legenda', 'Safet susic'),
(3, 2, '2015-09-05 21:18:11', 'OCM, nije lose ', 'MACHINEWOLF'),
(5, 2, '0000-00-00 00:00:00', 'eeee', 'eeee'),
(6, 1, '0000-00-00 00:00:00', 'asdsad', 'dasdas'),
(7, 1, '0000-00-00 00:00:00', 'asdasdddddd', 'asdsa'),
(9, 1, '2015-09-07 22:20:50', 'hjjjjj', 'adasdsa'),
(10, 1, '0000-00-00 00:00:00', 'ddddddddddd', 'dddddddddddddd');

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE IF NOT EXISTS `vijesti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(20) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `naslov` varchar(20) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `slika` text COLLATE utf8_slovenian_ci,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `detaljnije` text COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `autor`, `naslov`, `slika`, `vrijeme`, `detaljnije`) VALUES
(1, 'Aleksa', 'emina', 'https://upload.wikimedia.org/wikipedia/commons/b/b8/Aleksa_Santic.JPG', '2015-09-05 13:55:13', 'Aleksa Šantić was born into a Bosnian family in 1868 in Mostar in the Ottoman Empire. His father Risto was a merchant, and his mother Mara was a housewife.'),
(2, 'Mesa Selimovic', 'Dervis i smrt', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/MesaSelimovic_Serbian_Literature_Great_Men_Stamps.jpg/477px-MesaSelimovic_Serbian_Literature_Great_Men_Stamps.jpg', '2015-09-05 21:12:05', 'Selimovic was born to a prominent Bosnian Muslim family on 26 April 1910 in Tuzla (present-day Bosnia and Herzegovina), where he graduated from elementary school and high school. In 1930, he enrolled to study the Serbo-Croatian language and literature at the University of Belgrade Faculty of Philology and graduated in 1934.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `komentari_ibfk_1` FOREIGN KEY (`vijesti`) REFERENCES `vijesti` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
