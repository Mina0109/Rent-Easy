-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 07:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flask`
--

-- --------------------------------------------------------

--
-- Table structure for table `leaseagreement`
--

CREATE TABLE `leaseagreement` (
  `id` int(20) NOT NULL,
  `property_type` varchar(50) NOT NULL,
  `property_address` varchar(200) NOT NULL,
  `move_in_date` datetime NOT NULL,
  `move_out_date` datetime NOT NULL,
  `rent_amount` float NOT NULL,
  `deposit_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaseagreement`
--

INSERT INTO `leaseagreement` (`id`, `property_type`, `property_address`, `move_in_date`, `move_out_date`, `rent_amount`, `deposit_amount`) VALUES
(1, 'f', 'fff', '2023-11-24 00:00:00', '2023-12-23 00:00:00', 2, 2),
(2, 'f', 'fff', '2023-11-23 00:00:00', '2023-12-08 00:00:00', 1, 2),
(3, 'f', 'fff', '2023-11-23 00:00:00', '2023-12-23 00:00:00', 100, 1000),
(4, 'f', 'fff', '2023-11-23 00:00:00', '2023-12-23 00:00:00', 100, 1000),
(5, 'f', 'fff', '2023-11-23 00:00:00', '2023-12-23 00:00:00', 100, 1000),
(6, 'f', 'fff', '2023-12-07 00:00:00', '2023-12-10 00:00:00', 6, 8),
(7, 'f', 'fff', '2023-12-07 00:00:00', '2023-12-10 00:00:00', 6, 8),
(8, 'f', 'fff', '2023-12-07 00:00:00', '2023-12-10 00:00:00', 6, 8),
(9, 'f', 'fff', '2023-12-07 00:00:00', '2023-12-10 00:00:00', 6, 8),
(10, 'f', 'fff', '2023-12-01 00:00:00', '2023-12-03 00:00:00', 100, 10);

-- --------------------------------------------------------

--
-- Table structure for table `leaseagreements`
--

CREATE TABLE `leaseagreements` (
  `id` int(11) NOT NULL,
  `property_type` varchar(100) NOT NULL,
  `tenant_name` varchar(255) NOT NULL,
  `tenant_email` varchar(255) NOT NULL,
  `tenant_mobile` varchar(20) NOT NULL,
  `landlord_name` varchar(255) NOT NULL,
  `landlord_address` varchar(255) NOT NULL,
  `landlord_email` varchar(255) NOT NULL,
  `landlord_mobile` varchar(20) NOT NULL,
  `minimum_notice` int(11) NOT NULL,
  `property_address` varchar(255) NOT NULL,
  `move_in_date` date NOT NULL,
  `move_out_date` date NOT NULL,
  `rent_amount` varchar(255) NOT NULL,
  `deposit_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaseagreements`
--

INSERT INTO `leaseagreements` (`id`, `property_type`, `tenant_name`, `tenant_email`, `tenant_mobile`, `landlord_name`, `landlord_address`, `landlord_email`, `landlord_mobile`, `minimum_notice`, `property_address`, `move_in_date`, `move_out_date`, `rent_amount`, `deposit_amount`) VALUES
(1, '0', 'asdf', 'raef@g.com', '1234', 'sddf', 'wers', 'we@gmail.com', '1234', 2, 'ewrtw', '2023-12-01', '2023-12-08', '1000', '10'),
(2, '0', 'asdf', 'raef@g.com', '1234', 'sddf', 'wers', 'we@gmail.com', '1234', 2, 'ewrtw', '2023-12-10', '2023-12-10', '12', '1'),
(3, '0', 'aaa', 'b@gmail.com', '1234', 'sddf', 'wers', 'we@gmail.com', '1234', 2, 'ewrtw', '2023-12-01', '2023-12-09', '12', '2'),
(4, '0', 'Fahmida', 'b@gmail.com', '1234', 'sddf', 'wers', 'da@gmail.com', '1234', 1, 'ewrtw', '2023-12-03', '2023-12-03', '1', '1'),
(5, '0', 'Fahmida', 'f1@gmail.com', '1234', 'sddf', 'wers', 'p@gmail.com', '1234', 1, 'fff', '2023-12-30', '2024-01-05', '2', '2'),
(6, '0', 'Fahmida', 'f1@gmail.com', '1234', 'sddf', 'wers', 'b@gmail.com', '1234', 3, 'fff', '2023-12-03', '2023-12-22', '12', '2'),
(7, '0', 'asdf', 'raef@g.com', '1234', 'miguel', 'wers', 'mm@gmail.com', '1234', 2, 'ewrtw', '2023-12-22', '2024-01-06', '12', '1'),
(8, '0', 'Fahmida', 'f1@gmail.com', '1234', 'miguel', 'wers', 'mm@gmail.com', '1234', 5, 'ewrtw', '2023-12-16', '2023-12-10', '100', '22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_type` varchar(10) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_type`, `name`, `contact`, `email`, `password`, `id`) VALUES
('landlord', 'miguel', 987666, 'm@gmail.com', '$2y$10$p5Vk30WpdApGMM/fAN/U0uLqddZdep9NgYpBLrFVcen', 1),
('tenant', 'fahmi', 1234, 'f@gmail.com', '$2y$10$u/ixLnCOmvmQBE.F0vPt4eVvYvqpSsECpVAzsf2gkXU', 2),
('tenant', 'fahmi', 1234, 'f1@gmail.com', 'fahmi', 3),
('landlord', 'fahmi', 1234, 'f2@gmail.com', 'fahmi', 4),
('landlord', 'fahmi', 1234, 'f2@gmail.com', 'fahmi', 5),
('landlord', 'fahmi', 1234, 'f2@gmail.com', 'fahmi', 6),
('landlord', 'miguel', 12345, 'm2@gmail.com', 'miguel', 7),
('landlord', 'blah', 12345, 'om@gmail.com', 'rabbit', 8),
('landlord', 'blah', 12345, 'om@gmail.com', 'ffff', 9),
('landlord', 'fahmi', 1234, 'f@gmail.com', 'ffff', 10),
('landlord', 'fah', 12345, 'f3@gmail.com', 'ffff', 11),
('landlord', 'fahmi', 1234, 'o@gmail.com', 'ffff', 12),
('landlord', 'fahmi', 1234, 'o@gmail.com', 'ffff', 13),
('landlord', 'dalia', 1234, 'd@gmail.com', 'dddd', 14),
('landlord', 'fahmi', 1234, 'o@gmail.com', 'ffff', 15),
('landlord', 'fa', 1234, 'p@gmail.com', 'llll', 16),
('landlord', 'dal', 1234, 'd@gmail.com', 'dddd', 17),
('landlord', 'dalia', 1234, 'da@gmail.com', 'dddd', 18),
('landlord', 'blah', 1234, 'b@gmail.com', 'bbbb', 19),
('landlord', 'miguel', 1234, 'mm@gmail.com', '1234', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `id`) VALUES
('fahmi', 'fahmi', 1),
('fahmi', 'fahmi', 2),
('fahmi', 'fahmi', 3),
('miguel', 'migs', 4),
('maryama', 'maryama', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leaseagreement`
--
ALTER TABLE `leaseagreement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaseagreements`
--
ALTER TABLE `leaseagreements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `leaseagreement`
--
ALTER TABLE `leaseagreement`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `leaseagreements`
--
ALTER TABLE `leaseagreements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
