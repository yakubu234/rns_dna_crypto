-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 04:56 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id9185761_rns`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` text NOT NULL,
  `message` varchar(1000) NOT NULL,
  `pubkey` text NOT NULL,
  `privkey` text NOT NULL,
  `user` text NOT NULL,
  `code` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `email`, `subject`, `message`, `pubkey`, `privkey`, `user`, `code`, `date`) VALUES
(19, 'yakubuabiola2003@gmail.com', 'this is a sample subject', 'AGCCACCGCAAACATATCAAACATTCCAGGTATACAATGCATAACTTCTAATAATCGAACGGCTCGAAGACCTGTAAGCCATCTTAGCTAACGCAGACATCGGAGATCTGCA', 'W8vJtLIMqH7i', '00111010001010111000000010000100011000000010000101101000111101000100100000011110000100001001011001000001000001101100001011111001101100001100101001110100001110100001100101001110010000101110001100100001101111001100011001111000', 'yakubuabiola2003@gmail.com', 'UnOaLG', '2020-02-25 19:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `id_gen` varchar(111) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(100) NOT NULL,
  `code` varchar(200) NOT NULL,
  `activate` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `id_gen`, `full_name`, `email`, `password`, `code`, `activate`, `date`) VALUES
(13, '0', 'adewale adesola', 'yakubuabiola2003@gmail.com', 'password', 'NjCRMGpUcLQb', '1', '2020-02-10 19:28:00'),
(16, 'lKRr', 'Danny', 'ekundayodaniel02@gmail.com', 'Introductio', 'fbvx2cTAqyCH', '1', '2020-02-12 12:28:09'),
(17, '4o7i', 'Layobright', 'andyboyle863@gmail.com', 'basiratu', 'jrUDeOJQXksV', '0', '2020-02-22 20:31:32'),
(18, 'Fxq8', 'Layobright', 'alayosingers@gmail.com', 'basiratu', 'Qq8tdz7eFYaT', '0', '2020-02-23 17:39:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
