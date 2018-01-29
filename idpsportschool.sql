-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2018 at 12:48 PM
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
  `pas_code` int(64) NOT NULL,
  `lid_voornaam` varchar(256) NOT NULL,
  `lid_tsnvoegsel` varchar(256) DEFAULT NULL,
  `lid_achternaam` varchar(256) NOT NULL,
  `lid_gewicht` int(50) NOT NULL,
  `lid_geboortedatum` date NOT NULL,
  `lid_email` varchar(256) NOT NULL,
  `lid_huisnr` int(50) NOT NULL,
  `lid_postcode` varchar(50) NOT NULL,
  `lid_straatnaam` varchar(256) NOT NULL,
  `lid_tel` int(50) NOT NULL,
  `lid_woonplaats` varchar(256) NOT NULL,
  `lid_rekeningnr` varchar(256) NOT NULL,
  `lid_bank` varchar(256) NOT NULL,
  `lid_abbo` varchar(256) NOT NULL,
  `lid_uid` varchar(256) NOT NULL,
  `lid_pwd` varchar(256) NOT NULL,
  `lid_registerdate` date NOT NULL,
  `IsLoggedIn` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leden`
--

INSERT INTO `leden` (`lid_id`, `pas_code`, `lid_voornaam`, `lid_tsnvoegsel`, `lid_achternaam`, `lid_gewicht`, `lid_geboortedatum`, `lid_email`, `lid_huisnr`, `lid_postcode`, `lid_straatnaam`, `lid_tel`, `lid_woonplaats`, `lid_rekeningnr`, `lid_bank`, `lid_abbo`, `lid_uid`, `lid_pwd`, `lid_registerdate`, `IsLoggedIn`) VALUES
(2, 12345, 'henk', 'de', 'Beer', 56, '2000-01-09', 'meneer@hotmail.com', 18, '1688JK', 'boerenstreek', 658748754, 'Soest', 'NL77INGB0000578446', 'ING', '', 'Gebruikersnaam', 'wachtwoord', '2017-09-04', 'false'),
(7, 0, 'Yannick', '', 'Houtzager', 53, '2015-01-25', 'yannickhj3@gmail.com', 99, '3481tr', 'reiger', 683777745, 'utrecht', 'NL15 RABO 0148 1234 56', 'Rabobank', 'Big', 'test', '$2y$10$3beOqflE9O1J/d8QQEvLEeV40TVgsKUYOTgDPkywVA9Bd5XsQhwAq', '2018-01-25', ''),
(8, 0, 'Test3', 'tt', 'Testt', 70, '2018-01-25', 'yannickhj2@gmail.com', 0, '3481tr', 'daltonlaan', 683777745, 'utrecht', 'NL15 RABO 0148 1234 56', 'husker', 'Big', 'Admind', '$2y$10$Sxh4AVBR9jdrYJzdNJFl0OeZzoji4L0qKNTv01KYhsz88B5H844C.', '2018-01-25', ''),
(10, 2147483647, 'Jan', 'van', 'Eerd', 78, '2018-01-29', 'volderlgio@gmail.com', 12, '3481TR', 'Reiger', 683777745, 'Harmelen', 'NL15 RABO 0148 1234 56', 'Rabobank', 'Regular', 'test2', '$2y$10$5HvR3tgpczAWpJZSsYLJ.uO7B/lYIKANvwlZymkNUJ4y1ZNvrshSu', '2018-01-29', NULL);

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
  `afstand` int(50) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resultaat`
--

INSERT INTO `resultaat` (`resultaat_id`, `lid_id`, `apparaat_id`, `tijd`, `cal`, `gem_snelheid`, `afstand`, `datum`) VALUES
(1, 7, 2, 100, 78, 10, 50, '2018-01-24'),
(2, 7, 1, 50, 7, 10, 50, '2018-01-01'),
(3, 8, 2, 100, 78, 10, 50, '2017-12-28'),
(4, 7, 2, 60, 100, 10, 50, '2018-01-01'),
(5, 7, 3, 300, 425, 20, 50, '2018-01-01'),
(6, 7, 3, 50, 50, 20, 50, '2018-01-01'),
(9, 8, 1, 88, 50, 20, 50, '2018-01-28'),
(10, 10, 1, 88, 50, 20, 50, '2018-01-02');

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
  MODIFY `lid_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `resultaat`
--
ALTER TABLE `resultaat`
  MODIFY `resultaat_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
