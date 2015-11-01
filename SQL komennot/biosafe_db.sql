-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2015 at 07:55 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nos`
--

INSERT INTO `nos` (`id`, `luontipvm`, `naytteenottopvm`, `tuote_id`, `bakteeri_id`, `henkilo_id`, `nayte_tutkittu`, `Raja_arvo1_m`, `Raja_arvo2_M`, `Osanaytteita_n`, `Osanaytteidenmaara_c`, `nayte_lahetetty`, `analyysi_tehty`) VALUES
(17, '2015-11-01 00:00:00', '2015-11-27', 5, 0, 3, 'Ei', '1,423+e04', '2,032+e10', 5, 2, 'Kyllä', 'Ei');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nos`
--
ALTER TABLE `nos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `henkilo_id` (`henkilo_id`),
  ADD KEY `bakteeri_id` (`bakteeri_id`),
  ADD KEY `tuote_id` (`tuote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nos`
--
ALTER TABLE `nos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `nos`
--
ALTER TABLE `nos`
  ADD CONSTRAINT `nos_ibfk_1` FOREIGN KEY (`tuote_id`) REFERENCES `tuote` (`id`),
  ADD CONSTRAINT `nos_ibfk_3` FOREIGN KEY (`henkilo_id`) REFERENCES `henkilo` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
