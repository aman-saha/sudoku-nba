-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2017 at 03:31 AM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sudoku`
--

-- --------------------------------------------------------

--
-- Table structure for table `semaphore`
--

CREATE TABLE `semaphore` (
  `id` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ip_addr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `ip_addr`) VALUES
(1, 'asd', '::1'),
(2, 'adshausdj', '::1'),
(3, 'dsa', '::1'),
(4, 'Gsgs', '192.168.43.1'),
(5, 'adskas', '::1'),
(6, 'asddas', '::1'),
(7, 'addsffs', '::1'),
(8, 'asddasasmdkasdk', '::1'),
(9, 'asdas', '::1'),
(10, 'ni', '::1'),
(11, 'numan', '::1'),
(12, 'masdmk', '::1'),
(13, 'jisuus', '::1'),
(14, 'aasd', '::1'),
(15, 'kingns', '::1'),
(16, 'aman', '::1'),
(17, 'sadnmas', '::1'),
(18, 'man', '::1'),
(19, 'amanmas', '::1'),
(20, 'abc', '::1'),
(21, 'lol', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
