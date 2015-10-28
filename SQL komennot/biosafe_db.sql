-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2015 at 08:54 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biosafe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `asiakas`
--

CREATE TABLE IF NOT EXISTS `asiakas` (
  `id` int(11) NOT NULL,
  `nimi` varchar(32) NOT NULL,
  `yritys_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asiakas`
--

INSERT INTO `asiakas` (`id`, `nimi`, `yritys_id`) VALUES
(1, 'Prisma Kuopio', 1),
(2, 'Citymarket', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bakteeri`
--

CREATE TABLE IF NOT EXISTS `bakteeri` (
  `id` int(11) NOT NULL,
  `nimi` varchar(32) NOT NULL,
  `Tietoja` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bakteeri`
--

INSERT INTO `bakteeri` (`id`, `nimi`, `Tietoja`) VALUES
(1, 'Aerobiset mikrobit', ''),
(2, 'Enterobakteerit', ''),
(3, 'Homeet', ''),
(4, 'Hiiva', ''),
(5, 'Bacillus cereus', ''),
(6, 'Clostridium perfringens', 'Suojakaasu- ja hapettomat pakkaukset');

-- --------------------------------------------------------

--
-- Table structure for table `henkilo`
--

CREATE TABLE IF NOT EXISTS `henkilo` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `etunimi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sukunimi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `puhnro` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `yritys_id` int(11) NOT NULL,
  `asiakas_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `henkilo`
--

INSERT INTO `henkilo` (`id`, `username`, `etunimi`, `sukunimi`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `puhnro`, `status`, `created_at`, `updated_at`, `yritys_id`, `asiakas_id`) VALUES
(1, 'JoonasADM', 'Joonas', 'Testi', '2TTZ6nzxlj0WgMxBXdH-vutQtmPe9k8V', '$2y$13$Sl8M5Td/GfTJOdnm.uF/L./sWrMqT0TIw6nETSXT8jt3G1i5rMczC', NULL, 'joonas@posti.fe', '040123123', 10, 1445408347, 1445408347, 0, 0),
(3, 'kesko.testi@kesko.fi', 'Kesko', 'Testi', 'DKXZwfSSUgCVz8u_KAeT0qVJgP5OhskX', '$2y$13$vVMTnrFM8YNwpIJRfT3AY.eMEKFvFJ9QF4LoqvJrGa9IlunyCSatG', NULL, 'kesko.testi@kesko.fi', '0301233322', 10, 1445877517, 1445877517, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `laboratoriot`
--

CREATE TABLE IF NOT EXISTS `laboratoriot` (
  `id` int(11) NOT NULL,
  `laboratio_nimi` varchar(32) NOT NULL,
  `osoite` varchar(40) NOT NULL,
  `postinro` int(11) NOT NULL,
  `postitoimipaikka` varchar(32) NOT NULL,
  `puhnro` varchar(32) NOT NULL,
  `sposti` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1442765420),
('m130524_201442_init', 1442765433);

-- --------------------------------------------------------

--
-- Table structure for table `naytteenotto`
--

CREATE TABLE IF NOT EXISTS `naytteenotto` (
  `id` int(11) NOT NULL,
  `nos_id` int(11) NOT NULL,
  `tekija_id` int(11) NOT NULL,
  `laboratio_id` int(11) NOT NULL,
  `lahetetty_labraan` set('Kyllä','Ei') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nos`
--

CREATE TABLE IF NOT EXISTS `nos` (
  `id` int(11) NOT NULL,
  `luontipvm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `naytteenottopvm` date NOT NULL,
  `tuote_id` int(11) NOT NULL,
  `bakteeri_id` int(11) NOT NULL,
  `henkilo_id` int(11) NOT NULL,
  `nayte_tutkittu` enum('Ei','Kyllä') NOT NULL DEFAULT 'Ei',
  `Raja_arvo1_m` varchar(32) NOT NULL,
  `Raja_arvo2_M` varchar(32) NOT NULL,
  `Osanaytteita_n` int(10) NOT NULL,
  `Osanaytteidenmaara_c` int(10) NOT NULL,
  `nayte_lahetetty` enum('Kyllä','Ei') NOT NULL DEFAULT 'Ei',
  `analyysi_tehty` enum('Kyllä','Ei') NOT NULL DEFAULT 'Ei'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nos`
--

INSERT INTO `nos` (`id`, `luontipvm`, `naytteenottopvm`, `tuote_id`, `bakteeri_id`, `henkilo_id`, `nayte_tutkittu`, `Raja_arvo1_m`, `Raja_arvo2_M`, `Osanaytteita_n`, `Osanaytteidenmaara_c`, `nayte_lahetetty`, `analyysi_tehty`) VALUES
(11, '2015-10-28 08:10:10', '2015-10-31', 5, 0, 3, 'Ei', '1,423+e04', '2,032+e10', 7, 2, 'Ei', 'Ei'),
(12, '2015-10-28 08:10:17', '2015-10-31', 5, 0, 3, 'Ei', '1,423+e04', '2,032+e10', 7, 2, 'Ei', 'Ei');

-- --------------------------------------------------------

--
-- Table structure for table `nos_bakteerit`
--

CREATE TABLE IF NOT EXISTS `nos_bakteerit` (
  `nos_id` int(11) NOT NULL,
  `bakteeri_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nos_bakteerit`
--

INSERT INTO `nos_bakteerit` (`nos_id`, `bakteeri_id`) VALUES
(12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tuote`
--

CREATE TABLE IF NOT EXISTS `tuote` (
  `id` int(11) NOT NULL,
  `nimi` varchar(100) NOT NULL,
  `ean` int(50) NOT NULL,
  `Ravintokoostumus` text NOT NULL,
  `sisaltaako_porkkanaa` enum('Kyllä','Ei') NOT NULL,
  `sisaltaako_perunaa` enum('Kyllä','Ei') NOT NULL,
  `Tuoteryhma` enum('Valmisruoka','Lihavalmiste','Raakalihavalmiste','Muu') NOT NULL,
  `yritys_id` int(11) NOT NULL,
  `asiakas_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tuote`
--

INSERT INTO `tuote` (`id`, `nimi`, `ean`, `Ravintokoostumus`, `sisaltaako_porkkanaa`, `sisaltaako_perunaa`, `Tuoteryhma`, `yritys_id`, `asiakas_id`) VALUES
(2, 'RB porkkanalaatikko', 1231231, '100% parasta porkkanaa', 'Kyllä', 'Ei', 'Valmisruoka', 1, 1),
(3, 'RB maksalaatikko', 120310314, 'Maksaa ja laatikko', 'Ei', 'Kyllä', 'Valmisruoka', 1, 1),
(5, 'Pirkka makkara', 123213123, '5% liha\r\n90% jauho', 'Ei', 'Ei', 'Lihavalmiste', 2, 2),
(6, 'Siskonmakkarapaketti', 123123123, 'TESTI', 'Kyllä', 'Kyllä', 'Raakalihavalmiste', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `yritys`
--

CREATE TABLE IF NOT EXISTS `yritys` (
  `id` int(11) NOT NULL,
  `yritysnimi` varchar(32) NOT NULL,
  `tuotantopaikka` enum('Espoo','Varkaus','Helsinki','Kerava') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yritys`
--

INSERT INTO `yritys` (`id`, `yritysnimi`, `tuotantopaikka`) VALUES
(1, 'SOK', 'Espoo'),
(2, 'Kesko', 'Kerava');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asiakas`
--
ALTER TABLE `asiakas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `yritys_id` (`yritys_id`),
  ADD KEY `yritys_id_2` (`yritys_id`);

--
-- Indexes for table `bakteeri`
--
ALTER TABLE `bakteeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `henkilo`
--
ALTER TABLE `henkilo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`etunimi`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `laboratoriot`
--
ALTER TABLE `laboratoriot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `naytteenotto`
--
ALTER TABLE `naytteenotto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nos`
--
ALTER TABLE `nos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `henkilo_id` (`henkilo_id`),
  ADD KEY `bakteeri_id` (`bakteeri_id`),
  ADD KEY `tuote_id` (`tuote_id`);

--
-- Indexes for table `nos_bakteerit`
--
ALTER TABLE `nos_bakteerit`
  ADD PRIMARY KEY (`nos_id`),
  ADD KEY `nos_id` (`nos_id`),
  ADD KEY `bakteeri_id` (`bakteeri_id`),
  ADD KEY `bakteeri_id_2` (`bakteeri_id`);

--
-- Indexes for table `tuote`
--
ALTER TABLE `tuote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `yritys_id` (`yritys_id`),
  ADD KEY `asiakas_id` (`asiakas_id`);

--
-- Indexes for table `yritys`
--
ALTER TABLE `yritys`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asiakas`
--
ALTER TABLE `asiakas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bakteeri`
--
ALTER TABLE `bakteeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `henkilo`
--
ALTER TABLE `henkilo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `laboratoriot`
--
ALTER TABLE `laboratoriot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `naytteenotto`
--
ALTER TABLE `naytteenotto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nos`
--
ALTER TABLE `nos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tuote`
--
ALTER TABLE `tuote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `yritys`
--
ALTER TABLE `yritys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `asiakas`
--
ALTER TABLE `asiakas`
  ADD CONSTRAINT `asiakas_ibfk_1` FOREIGN KEY (`yritys_id`) REFERENCES `yritys` (`id`);

--
-- Constraints for table `nos`
--
ALTER TABLE `nos`
  ADD CONSTRAINT `nos_ibfk_1` FOREIGN KEY (`tuote_id`) REFERENCES `tuote` (`id`),
  ADD CONSTRAINT `nos_ibfk_3` FOREIGN KEY (`henkilo_id`) REFERENCES `henkilo` (`id`);

--
-- Constraints for table `nos_bakteerit`
--
ALTER TABLE `nos_bakteerit`
  ADD CONSTRAINT `nos_bakteerit_ibfk_1` FOREIGN KEY (`nos_id`) REFERENCES `nos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nos_bakteerit_ibfk_2` FOREIGN KEY (`bakteeri_id`) REFERENCES `bakteeri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tuote`
--
ALTER TABLE `tuote`
  ADD CONSTRAINT `tuote_ibfk_1` FOREIGN KEY (`yritys_id`) REFERENCES `yritys` (`id`),
  ADD CONSTRAINT `tuote_ibfk_2` FOREIGN KEY (`asiakas_id`) REFERENCES `asiakas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
