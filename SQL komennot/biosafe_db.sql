-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2015 at 09:39 PM
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
-- Table structure for table `nos_analysoitavat`
--

CREATE TABLE IF NOT EXISTS `nos_analysoitavat` (
  `nos_id` int(11) NOT NULL,
  `bakteeri_id` int(11) NOT NULL,
  `osanaytteita_n` int(11) NOT NULL,
  `osanaytteita_c` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nos_analysoitavat`
--

INSERT INTO `nos_analysoitavat` (`nos_id`, `bakteeri_id`, `osanaytteita_n`, `osanaytteita_c`) VALUES
(18, 1, 0, 0),
(18, 3, 0, 0),
(18, 5, 0, 0),
(18, 6, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nos_analysoitavat`
--
ALTER TABLE `nos_analysoitavat`
  ADD UNIQUE KEY `bakteeri_id_3` (`bakteeri_id`),
  ADD UNIQUE KEY `bakteeri_id_4` (`bakteeri_id`),
  ADD UNIQUE KEY `bakteeri_id_5` (`bakteeri_id`),
  ADD UNIQUE KEY `bakteeri_id_6` (`bakteeri_id`),
  ADD KEY `nos_id` (`nos_id`),
  ADD KEY `bakteeri_id` (`bakteeri_id`),
  ADD KEY `bakteeri_id_2` (`bakteeri_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nos_analysoitavat`
--
ALTER TABLE `nos_analysoitavat`
  ADD CONSTRAINT `nos_analysoitavat_ibfk_1` FOREIGN KEY (`nos_id`) REFERENCES `nos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nos_analysoitavat_ibfk_2` FOREIGN KEY (`bakteeri_id`) REFERENCES `bakteeri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
