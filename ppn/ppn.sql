-- phpMyAdmin SQL Dump
-- version 5.1.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2023 at 11:49 AM
-- Server version: 8.0.32-0ubuntu0.22.10.2
-- PHP Version: 8.1.7-1ubuntu3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppn`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int NOT NULL,
  `booking_seat` int NOT NULL,
  `mobile_no` int NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `booking_seat`, `mobile_no`, `date`, `time`, `from`, `to`, `user_name`, `payment`) VALUES
(1, 1, 766363543, '2023-04-13', '8.00 pm', 'jaffna', 'colombo', 'GUEST', 'pending'),
(3, 2, 766363543, '2023-04-13', '8.00 pm', 'jaffna', 'colombo', 'GUEST', 'pending'),
(5, 2, 766363543, '2023-04-13', '8.00 pm', 'jaffna', 'colombo', 'GUEST', 'pending'),
(6, 3, 112312312, '2023-04-13', '8.00 pm', 'jaffna', 'colombo', 'GUEST', 'pending'),
(7, 1, 766363543, '2023-03-13', '8.00 pm', 'jaffna', 'colombo', 'GUEST', 'pending'),
(8, 5, 766363543, '2023-04-13', '8.00 pm', 'jaffna', 'colombo', 'admin', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `mobile_no`, `password`, `role`) VALUES
(1, 'admin', '0766363543', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'rabiz', 'Aute veritatis adipi', 'e10adc3949ba59abbe56e057f20f883e', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
