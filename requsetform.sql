-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2022 at 09:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `requsetform`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(250) NOT NULL,
  `department` varchar(250) NOT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`, `created_at`, `updated_at`) VALUES
(1, 'College', '2022-08-06 02:26:22.000000', '2022-08-06 02:26:22.000000'),
(2, 'ICTC', '2022-08-06 03:00:29.000000', '2022-08-06 03:00:29.000000');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(255) NOT NULL,
  `sender` int(255) NOT NULL,
  `reciever` int(255) NOT NULL,
  `requestby` varchar(255) NOT NULL,
  `dateneeded` varchar(255) NOT NULL,
  `typeofservice` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `sender`, `reciever`, `requestby`, `dateneeded`, `typeofservice`, `description`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'allein', '2022-08-08', 'network,', '2 wire', '4', 'di diay ko', '2022-08-06 09:09:34.000000', '2022-08-07 05:59:50.000000'),
(2, 1, 3, 'robson', '2022-08-08', 'network,', '6 monitor', '3', NULL, '2022-08-07 03:50:27.000000', '2022-08-07 06:37:55.000000'),
(3, 1, 4, 'miguelles', '2022-08-09', 'software,', 'microsoft', '1', '', '2022-08-07 06:33:39.000000', '2022-08-07 06:33:39.000000'),
(4, 1, 3, 'college head', '2022-08-08', 'hardware,', '1 ssd', '1', '', '2022-08-07 06:35:31.000000', '2022-08-07 06:35:31.000000');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(255) NOT NULL,
  `role` varchar(250) NOT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-08-06 01:08:51.000000', '2022-08-06 01:08:51.000000'),
(2, 'Office Head', '2022-08-06 01:14:46.000000', '2022-08-06 01:14:46.000000'),
(3, 'client', '2022-08-06 01:15:19.000000', '2022-08-06 01:15:19.000000');

-- --------------------------------------------------------

--
-- Table structure for table `statuss`
--

CREATE TABLE `statuss` (
  `id` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statuss`
--

INSERT INTO `statuss` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pending', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'onprocess', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, 'completed', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, 'not completed', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(100) NOT NULL,
  `department_id` int(100) NOT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$1XMqFBHiX/GbcFb.2ai.7.Vd9gNU7DPiivwxfScNCXZHct0eaReX.', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'collegeunit', '$2y$10$hnqrR61bZCIB9RP17XsTUeSl/3m9ijgAUPXaawLjNJ8BjZOzwydh6', 3, 1, '2022-08-06 02:40:50.000000', '2022-08-06 02:40:50.000000'),
(3, 'acdictc', '$2y$10$EJZMTgLJJDtnhCncORlkTO4AcrjMGQK/wf6AgbIMnifiJdEUyMmaC', 1, 2, '2022-08-06 03:01:08.000000', '2022-08-06 03:01:08.000000'),
(4, 'collegehead', '$2y$10$BBmLxVEBQS6qexhJxwVTYu7hbdfHLjJckbgaz8/2km6bma0Tzsmg.', 2, 1, '2022-08-06 03:34:16.000000', '2022-08-06 03:34:16.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department` (`department`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `statuss`
--
ALTER TABLE `statuss`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status` (`status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statuss`
--
ALTER TABLE `statuss`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
