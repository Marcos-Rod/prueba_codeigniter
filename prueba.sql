-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 12:56 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prueba`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `codigo_postal` int(6) NOT NULL,
  `colonia` varchar(255) NOT NULL,
  `delegacion` varchar(255) NOT NULL,
  `estado` varchar(60) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `codigo_postal`, `colonia`, `delegacion`, `estado`, `user_id`) VALUES
(1, 45627, 'RpjyB', 'HC4vedn', '9g43H', 1),
(2, 14235, 'bZ50rOO0we0tr', '9V47RlxQfdn', '726PdNAULH', 2),
(3, 77645, 'aSuNQZ', 'Pzczs6', 'k6hSdy', 3),
(4, 88645, '0gklNkxhMO0', '7OJXpQL', 'Lbcl1e41Uz9XSDF', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `user_type` varchar(30) NOT NULL DEFAULT 'Administrativo',
  `status` enum('1','2') NOT NULL DEFAULT '1',
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `gender`, `email`, `phone`, `user_type`, `status`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Marcos', 'Rodriguez', 'Male', 'tmlwar01@gmail.com', '5512345678', 'Administrativo', '1', '$2y$12$fudYAq2wjANH7y6zw68RP.fQaVOoWMOakmm2DpD4vIZW3WsE8FVie', '2023-11-21 00:53:00', '2023-11-21 00:53:00'),
(2, 'Jose', 'Peres', 'Male', 'mail1@mail.com', '5512345678', 'Administrativo-Operativo', '1', '$2y$12$gG8Y3lNnHUBR3Aee66maEOJLR4t3r3uqe7FqMdMl4d.8FOhy9DZxq', '2023-11-21 00:53:00', '2023-11-21 00:53:00'),
(3, 'Brenda', 'Reyes', 'Female', 'mail3@mail.com', '5512345678', 'Operativo', '1', '$2y$12$byhEdoUSNbFOwn4Wmu7ueeYCTs.QpCGgJJZCZKrxosfbFlo8V50pm', '2023-11-21 00:54:00', '2023-11-21 00:54:00'),
(4, 'Teodoro', 'Montes', 'Male', 'mail4@mail.com', '5512345678', 'Administrativo', '2', '$2y$12$N8HbQzA.dn6b.VnLyF0l9evbDHMd/AfBeUuqqy6KISszH.KOlZrYC', '2023-11-21 00:54:00', '2023-11-21 00:54:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
