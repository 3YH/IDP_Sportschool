-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 26, 2018 at 11:31 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idpsportschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `apparaat`
--

CREATE TABLE `apparaat` (
  `apparaat_id` int(11) NOT NULL,
  `apparaat_naam` varchar(256) CHARACTER SET latin1 NOT NULL,
  `met_waarde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apparaat`
--

INSERT INTO `apparaat` (`apparaat_id`, `apparaat_naam`, `met_waarde`) VALUES
(1, 'Loopband', 8),
(2, 'Roeien', 3),
(3, 'Fiets', 16);

-- --------------------------------------------------------

--
-- Table structure for table `leden`
--

CREATE TABLE `leden` (
  `lid_id` int(50) NOT NULL,
  `pas_code` varchar(256) NOT NULL,
  `lid_gewicht` int(50) NOT NULL,
  `isLoggedIn` varchar(10) NOT NULL,
  `LastVisit` date NOT NULL,
  `lid_achternaam` varchar(256) NOT NULL,
  `lid_bank` varchar(256) NOT NULL,
  `lid_email` varchar(256) NOT NULL,
  `lid_geboortedatum` date NOT NULL,
  `lid_huisnr` int(50) NOT NULL,
  `lid_postcode` varchar(50) NOT NULL,
  `lid_pwd` varchar(256) NOT NULL,
  `lid_registerdate` date NOT NULL,
  `lid_rekeningnr` varchar(256) NOT NULL,
  `lid_straatnaam` varchar(256) NOT NULL,
  `lid_tel` int(50) NOT NULL,
  `lid_tsnvoegsel` varchar(256) NOT NULL,
  `lid_uid` varchar(256) NOT NULL,
  `lid_voornaam` varchar(256) NOT NULL,
  `lid_woonplaats` varchar(256) NOT NULL,
  `lid_abbo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leden`
--

INSERT INTO `leden` (`lid_id`, `pas_code`, `lid_gewicht`, `isLoggedIn`, `LastVisit`, `lid_achternaam`, `lid_bank`, `lid_email`, `lid_geboortedatum`, `lid_huisnr`, `lid_postcode`, `lid_pwd`, `lid_registerdate`, `lid_rekeningnr`, `lid_straatnaam`, `lid_tel`, `lid_tsnvoegsel`, `lid_uid`, `lid_voornaam`, `lid_woonplaats`, `lid_abbo`) VALUES
(2, '12345', 56, 'false', '2018-01-23', 'Beer', 'ING', 'meneer@hotmail.com', '2000-01-09', 18, '1688JK', 'wachtwoord', '2017-09-04', 'NL77INGB0000578446', 'boerenstreek', 658748754, 'de', 'Gebruikersnaam', 'henk', 'Soest', ''),
(7, '', 53, '', '2018-01-23', 'Houtzager', 'hotdog', 'yannickhj3@gmail.com', '2015-01-25', 0, '3481tr', '$2y$10$3beOqflE9O1J/d8QQEvLEeV40TVgsKUYOTgDPkywVA9Bd5XsQhwAq', '2018-01-25', 'NL15 RABO 0148 1234 56', 'reiger', 683777745, '', 'test', 'Yannick', 'utrecht', ''),
(8, '', 70, '', '0000-00-00', 'Testt', 'husker', 'yannickhj2@gmail.com', '2018-01-25', 0, '3481tr', '$2y$10$Sxh4AVBR9jdrYJzdNJFl0OeZzoji4L0qKNTv01KYhsz88B5H844C.', '2018-01-25', 'NL15 RABO 0148 1234 56', 'daltonlaan', 683777745, 'tt', 'Admind', 'Test3', 'utrecht', 'Big'),
(9, '', 50, '', '0000-00-00', 'Testt', 'apollo', 'yannickhj3@gmail.com', '2018-01-25', 12, '3481tr', '$2y$10$a1r1Mxy7QrUB1YaK4/6xJuu8G.MWCkov9eEoLZCFnkANhT.ALUCCi', '2018-01-25', 'NL15 RABO 0148 1234 56', 'daltonlaan', 683777745, 'tt', 'test2', 'Test2', 'utrecht', 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `resultaat`
--

CREATE TABLE `resultaat` (
  `resultaat_id` int(50) NOT NULL,
  `lid_id` int(50) NOT NULL,
  `apparaat_id` int(11) NOT NULL,
  `tijd` int(50) NOT NULL,
  `cal` int(50) NOT NULL,
  `gem_snelheid` int(50) NOT NULL,
  `afstand` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resultaat`
--

INSERT INTO `resultaat` (`resultaat_id`, `lid_id`, `apparaat_id`, `tijd`, `cal`, `gem_snelheid`, `afstand`) VALUES
(1, 2, 2, 100, 78, 10, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apparaat`
--
ALTER TABLE `apparaat`
  ADD PRIMARY KEY (`apparaat_id`);

--
-- Indexes for table `leden`
--
ALTER TABLE `leden`
  ADD PRIMARY KEY (`lid_id`),
  ADD KEY `lid_id` (`lid_id`);

--
-- Indexes for table `resultaat`
--
ALTER TABLE `resultaat`
  ADD PRIMARY KEY (`resultaat_id`),
  ADD UNIQUE KEY `resultaat_id` (`resultaat_id`),
  ADD KEY `apparaat_id` (`apparaat_id`),
  ADD KEY `resultaat_id_2` (`resultaat_id`),
  ADD KEY `lid_id` (`lid_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apparaat`
--
ALTER TABLE `apparaat`
  MODIFY `apparaat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `leden`
--
ALTER TABLE `leden`
  MODIFY `lid_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `resultaat`
--
ALTER TABLE `resultaat`
  MODIFY `resultaat_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `resultaat`
--
ALTER TABLE `resultaat`
  ADD CONSTRAINT `apparaat_id_FK` FOREIGN KEY (`apparaat_id`) REFERENCES `apparaat` (`apparaat_id`),
  ADD CONSTRAINT `lid_id_FK` FOREIGN KEY (`lid_id`) REFERENCES `leden` (`lid_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;