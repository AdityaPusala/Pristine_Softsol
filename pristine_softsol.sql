-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2025 at 03:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pristine_softsol`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `assigned_to` varchar(255) NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `status`, `assigned_to`, `deadline`) VALUES
(1, 'E-Commerce Website', 'Ongoing', 'John Doe', '2025-04-15'),
(2, 'CRM System', 'Pending', 'Jane Smith', '2025-05-10'),
(3, 'AI Chatbot', 'Completed', 'David Johnson', '2025-03-20'),
(4, 'Mobile App Development', 'Ongoing', 'Emily White', '2025-06-05'),
(5, 'SEO Optimization', 'Pending', 'Michael Brown', '2025-04-30'),
(6, 'Cloud Migration', 'Completed', 'Sophia Wilson', '2025-02-28'),
(7, 'HR Management System', 'Ongoing', 'Chris Adams', '2025-07-15'),
(8, 'Inventory Management', 'Pending', 'Emma Davis', '2025-06-20'),
(9, 'Payment Gateway Integration', 'Completed', 'Daniel Lee', '2025-01-31'),
(10, 'Cybersecurity Audit', 'Ongoing', 'Olivia Martinez', '2025-05-25'),
(11, 'Operating System based on AI', 'Ongoing', 'Nanditha', '2025-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire_responses`
--

CREATE TABLE `questionnaire_responses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `question_1` text NOT NULL,
  `question_2` text NOT NULL,
  `question_3` text NOT NULL,
  `question_4` text NOT NULL,
  `question_5` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_data`
--

CREATE TABLE `sales_data` (
  `id` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `sales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_data`
--

INSERT INTO `sales_data` (`id`, `month`, `sales`) VALUES
(1, 'January', 5000),
(2, 'February', 7500),
(3, 'March', 6200),
(4, 'April', 8400),
(5, 'May', 9500),
(6, 'June', 11000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `contact`, `created_at`) VALUES
(1, 'Aditya Pusala', 'adityapusala5678@gmail.com', '$2y$10$4XcH.xiJ0b.HPZkKcNlfKevM8hrh2UC6tYcQPyix0iLB./R4OyhE6', '8466920031', '2025-02-12 07:23:40'),
(2, 'alex', 'alex@gmail.com', '$2y$10$iWhVueF1q5BpZ1l62Xhd0Or2SN2HdHnICRgTBERBCxpMJm/qR64qa', '123456', '2025-02-12 08:04:13'),
(3, 'Robert Downey Jr', 'iamironman@gmail.com', '$2y$10$JIvUCZUsjtbuZycKwRJnq.LsROjxFIfIRuHE3g/Lphcu5I8kke7uu', '416621167', '2025-04-02 01:21:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaire_responses`
--
ALTER TABLE `questionnaire_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sales_data`
--
ALTER TABLE `sales_data`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `questionnaire_responses`
--
ALTER TABLE `questionnaire_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_data`
--
ALTER TABLE `sales_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questionnaire_responses`
--
ALTER TABLE `questionnaire_responses`
  ADD CONSTRAINT `questionnaire_responses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
