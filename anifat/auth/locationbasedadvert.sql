-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 05:02 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `locationbasedadvert`
--

-- --------------------------------------------------------

--
-- Table structure for table `advert`
--

CREATE TABLE `advert` (
  `id` int(11) NOT NULL,
  `comp_id` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `advert` varchar(20000) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advert`
--

INSERT INTO `advert` (`id`, `comp_id`, `company_name`, `city`, `state`, `token`, `advert`, `phone`, `image`, `time`) VALUES
(3, 'WCYtxnMa8j', 'yakubu and company', 'Abeokuta', '', 'zrYDM6CWL0', 'this is the test run with images ', '08123470036', 'atsYlUBnfvgithub.PNG', '2019-12-03 19:09:07'),
(4, 'WCYtxnMa8j', 'yakubu and company', 'Abeokuta', '', 'CNZXop54x6', 'final test ', '08123470036', '7CqsOB1wfh2.jpg', '2019-12-03 19:27:51'),
(5, 'WCYtxnMa8j', 'yakubu and company', 'Abeokuta', '', 'gAQNnbTVMz', 'this is from another city hope you gates ', '08123470036', 'p1xgJhfswGheader-default.jpg', '2019-12-03 20:51:47'),
(6, 'WCYtxnMa8j', 'yakubu and company', 'Abeokuta', '', 'VTFwJKAv3j', 'yest fndfjkn efbjbngrk fe njknjfngjk', '08123470036', 'VRNnXde2zwmagna.jpg', '2019-12-03 20:52:47'),
(7, 'WCYtxnMa8j', 'yakubu and company', 'Abeokuta', '', 'kCbXT5VEBs', 'wqertyuioufdsaASDFHJ', '08123470036', '6hn0ECJy1U1.jpg', '2019-12-03 20:52:57'),
(8, 'WCYtxnMa8j', 'yakubu and company', 'Abeokuta', 'Abeokuta', 'RD6KNQlWiM', 'post', '08123470036', 'amQO3R9f6tphoto-1479981280584-037818c1297d.jpeg', '2019-12-04 05:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `state` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `lga` varchar(20) NOT NULL,
  `zip` varchar(12) NOT NULL,
  `contact` int(20) NOT NULL,
  `alt_contact` int(19) NOT NULL,
  `img` varchar(200) NOT NULL,
  `token` varchar(2000) NOT NULL,
  `activate` varchar(20) NOT NULL,
  `status` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `company_name`, `company_email`, `password`, `address`, `state`, `town`, `lga`, `zip`, `contact`, `alt_contact`, `img`, `token`, `activate`, `status`, `date`) VALUES
(3, 'Hannie\'s touch', 'yakubuabiola2003@gmail.com', '$2y$10$UKRJphn/cc1Dq98419eiDeeDvUlgQsvo5DZZL4wM.covr1pa6VGpS', 'Off Erinlu, Ijebu-Ode, Ogun State, Off Abiola way, Madojutimi, Abeokuta, Ogun State', 'Ogun', 'Abeokuta', 'abeokuta south', '110211', 2147483647, 2147483647, '68o2lGcLbjheader-default.jpg', 'WCYtxnMa8j', '1', '', '2019-12-04 06:24:27'),
(7, 'dami oshibanjo', 'damilolabanjo53@gmail.com', '$2y$10$c2frADCfaAgntxZQx2eBXefTwr5KNLEYVE.WtUgRHmxQFU.qI0eCG', '', '', '', '', '', 0, 0, '', 'JhI1K2S5ro', '1', '', '2019-12-03 08:57:12'),
(8, '', '', '$2y$10$Vyhfzifkb272j718g3dhL.lgo9/AP2/tSMbbmMexAtP/BJnesX06K', '', '', '', '', '', 0, 0, '', 'ZdXUeWRSGq', '0', '', '2019-12-04 06:04:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advert`
--
ALTER TABLE `advert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
