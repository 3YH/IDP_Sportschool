-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2018 at 06:02 PM
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
(10, 2147483647, 'Jan', 'van', 'Eerd', 78, '2018-01-29', 'jan1@gmail.com', 12, '3481TR', 'Reiger', 683777745, 'Harmelen', 'NL15 RABO 0148 1234 56', 'Rabobank', 'Regular', 'jan1', '$2y$10$5HvR3tgpczAWpJZSsYLJ.uO7B/lYIKANvwlZymkNUJ4y1ZNvrshSu', '2018-01-29', NULL),
(13, 1916653541, 'Rogier', '', 'Veldt', 88, '1991-01-31', 'rogier1@gmail.com', 27, '8872 MA', 'De Finne', 643747145, 'Midlum', 'NL15 RABO 0148 1234 56', 'ABN Ambro', 'Mini', 'rogier1', '$2y$10$xta1V1EkAHd/wgomXOhbRem1oeCoGt2Ze53lQunDPxWd0ZnovpAP6', '2018-01-31', NULL),
(14, 1976751541, 'Steef', '', 'Robbers', 56, '1993-01-16', 'steef1@gmail.com', 196, '8872 MA', 'Amalia van Solmsstraat', 643747145, 'Honselersdijk ', 'NL15 RABO 0148 1234 56', 'Rabobank', 'Flex', 'steef1', '$2y$10$xta1V1EkAHd/wgomXOhbRem1oeCoGt2Ze53lQunDPxWd0ZnovpAP6', '2018-01-31', NULL),
(15, 1937505091, 'Nanneke', 'van', 'Alebeek', 59, '1976-06-30', 'nanneke1@gmail.com', 159, '4515 NE', 'Klakbaan', 643747145, 'IJzendijke', 'NL15 RABO 0148 1234 56', 'ING', 'Easy', 'nanneke1', '$2y$10$MaCF6b/v7jpuyIi9CG.wDeXZJ7PpysNVa1IF38KYrX/5WZqdV9jXy', '2018-01-31', NULL),
(16, 2147483647, 'Florijn', '', 'Spil', 76, '2004-01-31', 'florijn1@gmail.com', 138, '7586 BL', 'Hoofdstraat', 643747145, 'Overdinkel ', 'NL15 RABO 0148 1234 56', 'Rabobank', 'Mini', 'florijn1', '$2y$10$vmzbkooYdZ6xwj/mRFnpAeouh.gIMIhC6BzMCpuSACH8iOGmTmk1a', '2018-01-31', NULL),
(17, 2147483647, 'Pascal', 'van', 'Leeuwen', 83, '1986-01-31', 'pascal1@gmail.com', 99, '4515 NE', 'Baronielaan', 683777745, 'Emmeloord ', 'NL15 RABO 0148 1234 56', 'NN Bank', 'Easy', 'pascal1', '$2y$10$slrkc/Is0LSGKe5xG.d3.OdK3orx0R3qCXHbr2GCVdzXthGOkbPH.', '2018-01-31', NULL),
(18, 2147483647, 'Oguz', '', 'Diks', 68, '1987-10-27', 'oguz1@gmail.com', 190, '8401 RG', 'Watse Eelkesstrjitte', 641747745, 'Gorredijk ', 'NL15 RABO 0148 1234 56', 'Triodos Bank', 'Flex', 'oguz1', '$2y$10$JwOmPZWiSDgSLpNyHzJkWeX15irjfeTpbX/sAniNusVmAdpdfX0YW', '2018-01-31', NULL),
(19, 2147483647, 'Krissie', '', 'Niesing', 58, '1991-08-13', 'krissie1@gmail.com', 170, '3863 AE', 'Van der Meerstraat', 643747145, 'Nijkerk ', 'NL15 RABO 0148 1234 56', 'Rabobank', 'Mini', 'krissie1', '$2y$10$Av2qkFpRTBybO/fkth6vJeKMABO5tMosurP4iq4sCk2ZJAf4mhPrq', '2018-01-31', NULL),
(20, 2147483647, 'Thea', 'van', '\'t Zand', 87, '1995-01-31', 'thea1@gmail.com', 64, '4515 NE', 'Burgemeester Verduynstraat', 643747145, 'Waalwijk', 'NL15 RABO 0148 1234 56', 'Deltra Lloyd', 'Easy', 'thea1', '$2y$10$PAaeyOmQ1n0nTO0ijQ.S5OXkikA9gkGM1ZwnIVVKtCEp/zflzcQ5K', '2018-01-31', NULL);

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
(12, 10, 1, 431, 126, 23, 2120, '2018-01-25'),
(13, 10, 2, 1153, 300, 29, 5032, '2018-01-22'),
(14, 10, 2, 991, 200, 26, 1043, '2018-01-17'),
(15, 10, 1, 491, 220, 13, 420, '2018-01-10'),
(16, 10, 3, 2111, 123, 29, 6214, '2017-12-19'),
(17, 10, 3, 1325, 82, 25, 3218, '2018-01-29');

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
  MODIFY `lid_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `resultaat`
--
ALTER TABLE `resultaat`
  MODIFY `resultaat_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
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
