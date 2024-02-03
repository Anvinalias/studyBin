-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2024 at 06:26 AM
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
-- Database: `studybin`
--

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resource_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `uploaded_by` varchar(30) DEFAULT NULL,
  `program` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `status` enum('pending','approved','denied','active') NOT NULL DEFAULT 'pending',
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','mentor','student') NOT NULL DEFAULT 'student',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`, `create_at`, `update_at`, `delete_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'c1111bd512b29e821b120b86446026b8', 'admin', '2023-12-12 06:57:50', NULL, NULL),
(6, 'joseph', 'joseph@gmail.com', '674f33841e2309ffdd24c85dc3b999de', 'student', '2024-01-02 23:54:52', NULL, NULL),
(8, 'anvin', 'anvin@gmail.com', 'df67ac282cc10d9bd080453af9747785', 'student', '2024-01-03 00:02:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_requests`
--

CREATE TABLE `user_requests` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `topic` varchar(20) NOT NULL,
  `category` varchar(30) NOT NULL,
  `program` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','done','rejected','') NOT NULL DEFAULT 'pending',
  `details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_requests`
--

INSERT INTO `user_requests` (`request_id`, `user_id`, `username`, `resource_id`, `topic`, `category`, `program`, `course`, `semester`, `created_at`, `deleted_at`, `status`, `details`) VALUES
(4, 2, 'new', NULL, 'mod1', 'Category1', 'Program1', 'Course1', 'Semester1', '2024-01-02', NULL, 'pending', 'notes'),
(5, 2, 'new', NULL, 'grammer', 'Category1', 'Program1', 'Course4', 'Semester1', '2024-01-02', NULL, 'pending', 'english note');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resource_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_requests`
--
ALTER TABLE `user_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_requests`
--
ALTER TABLE `user_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_requests`
--
ALTER TABLE `user_requests`
  ADD CONSTRAINT `userrequests_resourceid_foreign` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`resource_id`),
  ADD CONSTRAINT `userrequests_userid_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
