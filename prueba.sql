-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 05:35 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `codigo_postal`, `colonia`, `delegacion`, `estado`, `user_id`) VALUES
(4, 55647, 'ldReIBYN', 'TcktQeQc1VZ', 'k6pJU', 1),
(5, 77564, 'IAFlo', 'wDEht', '2D4V4o', 2),
(6, 11156, 'nscttdlIiG', 'xKwlxUJDnADEU', 'TFJBhq', 3),
(7, 67894, 'qbFph9FQ3', '4PU2i', '0ugWUH82MuEufVY', 4);

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
(1, 'User 1', 'Apellido 1', 'Male', 'mail@mail.com', '5512345678', 'Administrativo', '1', '$2y$12$PUtyQlDjGtiL8phNQ9zx.exSSdvXY6PV31HuWxkdIDQenP9I0J1RS', '2023-11-20 05:29:00', '2023-11-20 05:29:00'),
(2, 'User 2', 'Apellido2', 'Male', 'mail@mail.com', '5512345678', 'Administrativo', '1', '$2y$12$eGSMy31JqSqCHaQqgvfjfuljRoC89rqVwtGe8FQAIEbBjCJk7Gkeq', '2023-11-20 05:29:00', '2023-11-20 05:29:00'),
(3, 'User 3', 'Apellido 3', 'Female', 'mail3@mail.com', '5512345678', 'Administrativo', '1', '$2y$12$lNa/1Vo3VmxPtHLtaDaAqepZ8FH5pKg92WPFv2zreB8MZ4LcNy7La', '2023-11-20 05:30:00', '2023-11-20 05:30:00'),
(4, 'User 4', 'Apellido 4', 'Female', 'mail4@mail.com', '5512345678', 'Administrativo', '1', '$2y$12$yu88mUXqo4uowUvIUjybuORd8/MdCI5Wlk6xvU02mRzZJryq/.ZWi', '2023-11-20 05:33:00', '2023-11-20 05:33:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
