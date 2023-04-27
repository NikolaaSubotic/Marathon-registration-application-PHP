-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 09:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k1maraton`
--

-- --------------------------------------------------------

--
-- Table structure for table `rezultat`
--

CREATE TABLE `rezultat` (
  `id` int(11) NOT NULL,
  `prolaz_kroz_cilj` datetime NOT NULL,
  `broj_takmicara` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rezultat`
--

INSERT INTO `rezultat` (`id`, `prolaz_kroz_cilj`, `broj_takmicara`) VALUES
(1, '2023-04-19 09:05:13', 'as'),
(2, '2023-04-19 09:37:22', 'rrr'),
(3, '0000-00-00 00:00:00', ''),
(4, '0000-00-00 00:00:00', 'eee'),
(5, '2023-04-19 13:01:42', '66'),
(6, '2023-04-19 13:01:57', '666');

-- --------------------------------------------------------

--
-- Table structure for table `takmicar`
--

CREATE TABLE `takmicar` (
  `id` int(11) NOT NULL,
  `ime_prezime` varchar(50) NOT NULL,
  `drzava` varchar(50) NOT NULL,
  `kategorija` varchar(50) NOT NULL,
  `broj_telefona` varchar(17) NOT NULL,
  `broj_takmicara` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `takmicar`
--

INSERT INTO `takmicar` (`id`, `ime_prezime`, `drzava`, `kategorija`, `broj_telefona`, `broj_takmicara`) VALUES
(1, 'bojovic', 'BiH', 'Klasifikovano takmic', '23234', 'as'),
(2, 'bojovic', 'Crna gora', 'Klasifikovano takmicenje', '232323', 'rrr'),
(3, 'llaza', 'BiH', 'Klasifikovano takmicenje', '23', 'eee'),
(4, 'dddd', 'BiH', 'Klasifikaciono takmicenje', '3232', '666'),
(5, 'ghghgh', 'cg', 'klasifikovano_takmicenje', '45678', 'eee'),
(6, 'ygygyg', 'Crna Gora', 'Senior', '65432', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rezultat`
--
ALTER TABLE `rezultat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `takmicar`
--
ALTER TABLE `takmicar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rezultat`
--
ALTER TABLE `rezultat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `takmicar`
--
ALTER TABLE `takmicar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
