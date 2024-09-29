-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2024 at 11:31 PM
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
-- Database: `codecafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `handle` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`handle`, `name`, `id`, `pass`) VALUES
('k', 'k', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `contests`
--

CREATE TABLE `contests` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `contest_name` varchar(100) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contests`
--

INSERT INTO `contests` (`id`, `admin_id`, `contest_name`, `start_date`, `end_date`, `created_at`, `duration`) VALUES
(1, 1, 'test', '2024-09-29 05:32:00', '2024-09-29 22:12:00', '2024-09-28 23:29:42', 1000),
(2, 1, 'test2', '2024-09-29 20:54:00', '2024-09-30 13:34:00', '2024-09-29 13:54:56', 1000),
(3, 1, 'test3', '2024-09-29 21:40:00', '2024-09-30 14:20:00', '2024-09-29 14:40:33', 1000),
(4, 1, 'test4', '2024-09-29 13:43:00', '2024-09-29 13:58:00', '2024-09-29 17:43:18', 15),
(5, 1, '1wsdr', '2024-09-30 14:45:00', '2026-11-19 13:28:00', '2024-09-29 17:45:33', 1123123),
(6, 1, 'wer345235', '2024-09-30 17:45:00', '2258-11-05 21:48:00', '2024-09-29 17:46:21', 123123123);

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `problem_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`id`, `admin_id`, `contest_id`, `problem_name`, `description`, `created_at`) VALUES
(1, 1, 1, 'a', '../../Model/problemDiscriptionAndInput/1/66f891666a975/description.txt', '2024-09-28 23:29:42'),
(2, 1, 1, 'b', '../../Model/problemDiscriptionAndInput/1/66f891666b3f6/description.txt', '2024-09-28 23:29:42'),
(3, 1, 2, '1', '../../Model/problemDiscriptionAndInput/2/66f95c3029a1d/description.txt', '2024-09-29 13:54:56'),
(4, 1, 2, '2', '../../Model/problemDiscriptionAndInput/2/66f95c302a3cd/description.txt', '2024-09-29 13:54:56'),
(5, 1, 2, '3', '../../Model/problemDiscriptionAndInput/2/66f95c302ac62/description.txt', '2024-09-29 13:54:56'),
(6, 1, 3, '11', '../../Model/problemDiscriptionAndInput/3/66f966e116758/description.txt', '2024-09-29 14:40:33'),
(7, 1, 3, '12', '../../Model/problemDiscriptionAndInput/3/66f966e117384/description.txt', '2024-09-29 14:40:33'),
(8, 1, 3, '13', '../../Model/problemDiscriptionAndInput/3/66f966e117f74/description.txt', '2024-09-29 14:40:33'),
(9, 1, 3, '14', '../../Model/problemDiscriptionAndInput/3/66f966e11878a/description.txt', '2024-09-29 14:40:33'),
(10, 1, 4, '1', '../../Model/problemDiscriptionAndInput/4/66f991b6731a4/description.txt', '2024-09-29 17:43:18'),
(11, 1, 5, '1', '../../Model/problemDiscriptionAndInput/5/66f9923d4e2b9/description.txt', '2024-09-29 17:45:33'),
(12, 1, 6, 'qwe', '../../Model/problemDiscriptionAndInput/6/66f9926ddedc4/description.txt', '2024-09-29 17:46:21'),
(13, 1, 6, 'werwer', '../../Model/problemDiscriptionAndInput/6/66f9926ddf6e6/description.txt', '2024-09-29 17:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `registrations`
--
DELIMITER $$
CREATE TRIGGER `increment_contests_attended` AFTER INSERT ON `registrations` FOR EACH ROW BEGIN
    UPDATE `users`
    SET `contests_attended_count` = `contests_attended_count` + 1
    WHERE `id` = NEW.user_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `problem_id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `submission_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('solved','failed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `submissions`
--
DELIMITER $$
CREATE TRIGGER `increment_solved_problems` AFTER INSERT ON `submissions` FOR EACH ROW BEGIN
    IF NEW.status = 'solved' THEN
        UPDATE `users`
        SET `solved_problems_count` = `solved_problems_count` + 1
        WHERE `id` = NEW.user_id;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `rating` int(11) DEFAULT 1500,
  `solved_problems_count` int(11) DEFAULT 0,
  `contests_attended_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `phone`, `dob`, `password`, `created_at`, `rating`, `solved_problems_count`, `contests_attended_count`) VALUES
(1, '1', '4', '123123', '2024-09-10', '1', '2024-09-28 14:08:21', 1500, 0, 0),
(2, '2', '1231', '123', '2024-09-19', '1', '2024-09-28 14:08:44', 1500, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `handle` (`handle`);

--
-- Indexes for table `contests`
--
ALTER TABLE `contests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `contest_id` (`contest_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `contest_id` (`contest_id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `problem_id` (`problem_id`),
  ADD KEY `contest_id` (`contest_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contests`
--
ALTER TABLE `contests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contests`
--
ALTER TABLE `contests`
  ADD CONSTRAINT `contests_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `problems`
--
ALTER TABLE `problems`
  ADD CONSTRAINT `problems_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `problems_ibfk_2` FOREIGN KEY (`contest_id`) REFERENCES `contests` (`id`);

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `registrations_ibfk_2` FOREIGN KEY (`contest_id`) REFERENCES `contests` (`id`);

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `submissions_ibfk_2` FOREIGN KEY (`problem_id`) REFERENCES `problems` (`id`),
  ADD CONSTRAINT `submissions_ibfk_3` FOREIGN KEY (`contest_id`) REFERENCES `contests` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
