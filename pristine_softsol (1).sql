-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2025 at 01:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`, `email`) VALUES
(1, 'Alex', 'alex123@gmail.com'),
(2, 'John', 'john02@gmail.com'),
(3, 'Adam', 'adam@gmail.com'),
(4, 'Jenifer', 'jenifer143@gmail.com'),
(5, 'Michael', 'michael06@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `Message_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `Message` varchar(225) NOT NULL,
  `Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`Message_id`, `User_id`, `Name`, `Email`, `Message`, `Time`) VALUES
(1, 1, 'Nanditha', 'nkonda@gmail.com', 'I wouild LIKE TO', '2025-04-12 21:25:26'),
(2, 1, 'Aditya', 'aditya@gmail.com', 'I would know more about services.', '2025-04-13 10:58:35'),
(3, 1, 'Arjun', 'Arjun05@gmail.com', 'More INfo', '2025-04-15 14:47:53'),
(4, 1, 'jhon', 'Jhon@gmail.com', 'More info for services', '2025-04-15 14:48:27'),
(5, 1, 'Aruna', 'Aruna27@gmail.com', 'I would know about the services.', '2025-05-03 08:25:19'),
(6, 1, 'Test ', 'Test123@gmail.com', 'Test about services', '2025-05-03 08:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` enum('Pending','In Progress','Ongoing','Testing','Delivered') NOT NULL DEFAULT 'Pending',
  `assigned_to` varchar(100) NOT NULL,
  `assigned_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `email`, `status`, `assigned_to`, `assigned_at`, `updated_at`) VALUES
(1, 'Pristine', '', 'Delivered', '3', '2025-05-26 11:28:46', '2025-05-26 21:49:41'),
(2, 'Pristine', '', 'Delivered', '4', '2025-05-26 11:31:36', '2025-05-26 21:58:06'),
(3, 'Pristine', '', 'Delivered', '4', '2025-05-26 11:40:11', '2025-05-26 22:14:51'),
(4, 'Toysie', 'ammu123@gmail.com', 'Delivered', '5', '2025-05-26 12:07:41', '2025-05-27 15:11:56'),
(5, 'cbd bakery', 'arudu123@gmail.com', 'In Progress', '3', '2025-05-27 05:11:36', '2025-05-27 15:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `Message_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `Issue` varchar(225) NOT NULL,
  `Message` varchar(225) NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`Message_id`, `User_id`, `Name`, `Email`, `Issue`, `Message`, `Time`) VALUES
(1, 0, 'Jhon', 'jhon@gmail.com', 'Negotiate the Price for order', 'test', '2025-04-25 12:26:09'),
(2, 0, 'jack', 'jackD@gmail.com', 'Request Invoice for order', 'Invoice please', '2025-04-25 12:27:07'),
(3, 0, 'Nanditha', 'nkonda@gmail.com', 'Negotiate the Price for order', 'More pricing options', '2025-04-25 12:30:09'),
(4, 0, 'Nanditha', 'nkonda@gmail.com', 'Negotiate the Price for order', 'More pricing options', '2025-04-25 12:32:11'),
(5, 0, 'Aditya', 'adi@gmail.com', 'Request Invoice for order', 'invoice ', '2025-04-25 12:32:56'),
(6, 0, 'David', 'Davidjones@gmail.com', 'Other', 'More template options', '2025-04-25 12:34:48'),
(7, 0, 'ram', 'ram025@gmail.com', 'Other', 'options for price', '2025-04-25 12:37:24'),
(8, 0, 'Richard', 'richard08@gmail.com', 'Other', 'details', '2025-04-25 12:40:26'),
(9, 0, 'james', 'jamesbond@gmail.com', 'Negotiate the Price for order', 'amount \r\n', '2025-04-25 12:41:58'),
(10, 0, 'Laura', 'laura05@gmail.com', 'Other', 'Test 123', '2025-04-26 00:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `businessName` varchar(255) DEFAULT NULL,
  `industryType` varchar(100) DEFAULT NULL,
  `targetAudience` varchar(255) DEFAULT NULL,
  `websiteType` varchar(100) DEFAULT NULL,
  `technology` varchar(100) DEFAULT NULL,
  `layoutStyle` varchar(100) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `ecommerce` varchar(50) DEFAULT NULL,
  `paymentGateway` varchar(100) DEFAULT NULL,
  `contactForm` varchar(50) DEFAULT NULL,
  `liveChat` varchar(50) DEFAULT NULL,
  `estimatedPrice` varchar(50) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `assigned` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `username`, `email`, `businessName`, `industryType`, `targetAudience`, `websiteType`, `technology`, `layoutStyle`, `logo`, `ecommerce`, `paymentGateway`, `contactForm`, `liveChat`, `estimatedPrice`, `submitted_at`, `assigned`) VALUES
(1, '', '', 'Pristine', 'Fashion', 'Teenagers', 'eCommerce', 'HTML/CSS', 'Minimalistic', 'No', 'Yes', 'Stripe', 'Yes', 'Yes', '', '2025-05-20 08:20:23', 1),
(2, 'Adam Smith', '', 'Pristine', 'Fashion', 'Teenagers', 'Portfolio', 'WordPress', 'Modern', 'Need a new one', 'Yes', 'Stripe', 'Yes', 'No', '', '2025-05-20 08:28:20', 1),
(3, '', '', 'Pristine', 'Fashion', 'Teenagers', 'Landing Page', 'WordPress', 'Minimalistic', 'Yes', 'Yes', 'Stripe', 'Yes', 'Yes', '900', '2025-05-22 00:17:46', 1),
(4, 'Adam Smith', 'Adam@gmail.com', 'agasthya', 'Fashion', 'Teenagers', 'eCommerce', 'WordPress', 'Modern', 'No', 'Yes', 'Razorpay', 'Yes', 'Yes', '1650', '2025-05-22 01:22:13', 1),
(5, 'Akanksha', 'ammu123@gmail.com', 'Toysie', 'Ecommerce', 'Kids', 'eCommerce', 'HTML/CSS', 'Creative', 'Need a new one', 'Yes', 'Others', 'Yes', 'Yes', '1600', '2025-05-26 12:07:17', 1),
(6, 'Amruth', 'amruthreddy@gmail.com', 'StartWars', 'ecommerce', 'Men', 'Landing Page', 'HTML/CSS', 'Minimalistic', 'Need a new one', 'No', 'Others', 'Yes', 'Yes', '200', '2025-05-26 12:43:16', 0),
(7, 'Arudhathi', 'arudu123@gmail.com', 'cbd bakery', 'Food', 'everyone', 'eCommerce', 'HTML/CSS', 'Modern', 'No', 'Yes', 'Others', 'Yes', 'Yes', '1600', '2025-05-27 05:10:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_data`
--

CREATE TABLE `sales_data` (
  `id` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `sales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `contact`, `created_at`) VALUES
(1, 'Aditya Pusala', 'adityapusala5678@gmail.com', '$2y$10$4XcH.xiJ0b.HPZkKcNlfKevM8hrh2UC6tYcQPyix0iLB./R4OyhE6', '8466920031', '2025-02-12 07:23:40'),
(2, 'alex', 'alex@gmail.com', '$2y$10$iWhVueF1q5BpZ1l62Xhd0Or2SN2HdHnICRgTBERBCxpMJm/qR64qa', '123456', '2025-02-12 08:04:13'),
(3, 'Robert Downey Jr', 'iamironman@gmail.com', '$2y$10$JIvUCZUsjtbuZycKwRJnq.LsROjxFIfIRuHE3g/Lphcu5I8kke7uu', '416621167', '2025-04-02 01:21:02'),
(4, 'supriya', 'supriyachinny@gmail.com', '$2y$10$FdCRCDmPYxf4pkQZI3ylKuIxGxP3Bt9ouGEKMvcWahON2663k6CKq', '414051554', '2025-05-02 15:32:40'),
(6, 'Aruna', 'aruna27@gmail.com', '$2y$10$eHsZb7PWrD.auDkaeuHzPu2H1CDu6WXRJlHshjt5SjXB8c3bilMDa', '9000654020', '2025-05-02 15:44:35'),
(7, 'Srinivas', 'srinivas05@gmail.com', '$2y$10$9meIXYxoW.7REWL846AK8unafaFRt6a1Sa6D5aR8XGVZUcgDl4s0u', '9395385804', '2025-05-02 19:16:52'),
(8, 'Chanduru', 'chanduru15@gmail.com', '$2y$10$/UWOGYHat5.7dEGbhxJs1.hj5h/i5UEUQzQCL4LMGAz4wvnOCcR8S', '451745369', '2025-05-02 19:19:18'),
(9, 'Test', 'Test123@gmail.com', '$2y$10$/PgiKlyonhtzHkAXKfc1Qe8mWPaqtCxpBxDCcu0mIXRS9zfcosTfG', '6303098598', '2025-05-02 22:42:12'),
(10, 'Akanksha', 'ammu123@gmail.com', '$2y$10$MdLojR0MUPiWz3HpNzdWg.wBLOn42ZIOAd3QZFncmNJ0WOpyFK1XK', '414051554', '2025-05-26 12:06:00'),
(11, 'Amruth', 'amruthreddy@gmail.com', '$2y$10$H3mc4RwTg/8plBgozkfnWOzSLiSs1jjqEatVOh5rcCp9yTP.LE45m', '6303098598', '2025-05-26 12:40:22'),
(12, 'Arudhathi', 'arudu123@gmail.com', '$2y$10$rb/lMT22n8psn82v3j2vNeADXtzFZZ8rSvVDOOwRUbt31RjJf30aa', '426228510', '2025-05-27 05:06:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Message_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`Message_id`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `Message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `Message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales_data`
--
ALTER TABLE `sales_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
