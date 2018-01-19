-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 19 jan 2018 om 15:40
-- Serverversie: 10.1.21-MariaDB
-- PHP-versie: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Tabelstructuur voor tabel `apparaat`
--

CREATE TABLE `apparaat` (
  `apparaat_id` int(11) NOT NULL,
  `met_waarde` int(11) NOT NULL,
  `apparaat_naam` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leden`
--

CREATE TABLE `leden` (
  `lid_id` int(11) NOT NULL,
  `resultaat_id` int(11) NOT NULL,
  `lid_voornaam` varchar(256) NOT NULL,
  `lid_tsnvoegsel` varchar(256) NOT NULL,
  `lid_achternaam` varchar(256) NOT NULL,
  `lid_geboortedatum` date NOT NULL,
  `lid_gewicht` int(11) NOT NULL,
  `lid_straatnaam` varchar(256) NOT NULL,
  `lid_huisnr` int(11) NOT NULL,
  `lid_postcode` varchar(8) NOT NULL,
  `lid_woonplaats` varchar(256) NOT NULL,
  `lid_email` varchar(256) NOT NULL,
  `lid_tel` text NOT NULL,
  `lid_rekeningnr` varchar(25) NOT NULL,
  `lid_bank` varchar(256) NOT NULL,
  `lid_uid` varchar(256) NOT NULL,
  `lid_pwd` varchar(256) NOT NULL,
  `lid_registerdate` date NOT NULL,
  `IsLoggedIn` tinyint(4) NOT NULL,
  `LastVisit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `leden`
--

INSERT INTO `leden` (`lid_id`, `resultaat_id`, `lid_voornaam`, `lid_tsnvoegsel`, `lid_achternaam`, `lid_geboortedatum`, `lid_gewicht`, `lid_straatnaam`, `lid_huisnr`, `lid_postcode`, `lid_woonplaats`, `lid_email`, `lid_tel`, `lid_rekeningnr`, `lid_bank`, `lid_uid`, `lid_pwd`, `lid_registerdate`, `IsLoggedIn`, `LastVisit`) VALUES
(8, 0, 'Yannick', '', 'Houtzager', '2018-01-15', 0, 'Reiger', 12, '3481TR', 'Harmelen', 'yannickhj@gmail.com', '0683777745', 'NL15 RABO 0148 1234 56', 'Rabobank', 'test', '$2y$10$uhuNhfWeLmRy/6W6BhC8fOvd3SEWV6pHzk0KQ3Lz6Cwh4fTvDSQUy', '2018-01-18', 1, '2018-01-19'),
(9, 0, 'Test', 'tt', 'Testt', '2000-04-19', 70, 'daltonlaan', 2, '3481TR', 'Utrecht', 'yannickhj2@gmail.com', '0683777745', 'NL15 RABO 0148 1234 56', 'Rabobank', 'test2', '$2y$10$xDXHQx5Ok66NaIIHBI1pouiI8.yhCc29m9CCAl8sdzTCZ.mXUMljK', '2018-01-19', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `resultaat`
--

CREATE TABLE `resultaat` (
  `resultaat_id` int(11) NOT NULL,
  `apparaat_id` int(11) NOT NULL,
  `afstand` int(11) NOT NULL,
  `tijd` int(11) NOT NULL,
  `gem_snelheid` int(11) NOT NULL,
  `cal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `apparaat`
--
ALTER TABLE `apparaat`
  ADD PRIMARY KEY (`apparaat_id`);

--
-- Indexen voor tabel `leden`
--
ALTER TABLE `leden`
  ADD PRIMARY KEY (`lid_id`),
  ADD KEY `resultaat_id` (`resultaat_id`);

--
-- Indexen voor tabel `resultaat`
--
ALTER TABLE `resultaat`
  ADD PRIMARY KEY (`resultaat_id`),
  ADD KEY `apparaat_id` (`apparaat_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `apparaat`
--
ALTER TABLE `apparaat`
  MODIFY `apparaat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `leden`
--
ALTER TABLE `leden`
  MODIFY `lid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `resultaat`
--
ALTER TABLE `resultaat`
  MODIFY `resultaat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `resultaat`
--
ALTER TABLE `resultaat`
  ADD CONSTRAINT `resultaat_ibfk_1` FOREIGN KEY (`apparaat_id`) REFERENCES `apparaat` (`apparaat_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
