-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2025 at 05:39 PM
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
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `email`, `registration_date`) VALUES
(1, 'customer1', 'customer1@example.com', '2020-01-15'),
(2, 'customer2', 'customer2@example.com', '2020-02-10'),
(3, 'customer3', 'customer3@example.com', '2020-03-22'),
(4, 'customer4', 'customer4@example.com', '2020-04-05'),
(5, 'customer5', 'customer5@example.com', '2020-04-20'),
(6, 'customer6', 'customer6@example.com', '2020-05-30'),
(7, 'customer7', 'customer7@example.com', '2020-06-18'),
(8, 'customer8', 'customer8@example.com', '2020-07-07'),
(9, 'customer9', 'customer9@example.com', '2020-08-12'),
(10, 'customer10', 'customer10@example.com', '2020-08-25'),
(11, 'customer11', 'customer11@example.com', '2020-09-15'),
(12, 'customer12', 'customer12@example.com', '2020-10-10'),
(13, 'customer13', 'customer13@example.com', '2020-10-30'),
(14, 'customer14', 'customer14@example.com', '2020-11-12'),
(15, 'customer15', 'customer15@example.com', '2020-11-25'),
(16, 'customer16', 'customer16@example.com', '2020-12-01'),
(17, 'customer17', 'customer17@example.com', '2020-12-15'),
(18, 'customer18', 'customer18@example.com', '2020-12-29'),
(19, 'customer19', 'customer19@example.com', '2021-01-05'),
(20, 'customer20', 'customer20@example.com', '2021-01-20'),
(21, 'customer21', 'customer21@example.com', '2021-02-15'),
(22, 'customer22', 'customer22@example.com', '2021-03-10'),
(23, 'customer23', 'customer23@example.com', '2021-04-01'),
(24, 'customer24', 'customer24@example.com', '2021-04-20'),
(25, 'customer25', 'customer25@example.com', '2021-05-15'),
(26, 'customer26', 'customer26@example.com', '2021-06-10'),
(27, 'customer27', 'customer27@example.com', '2021-07-05'),
(28, 'customer28', 'customer28@example.com', '2021-07-25'),
(29, 'customer29', 'customer29@example.com', '2021-08-15'),
(30, 'customer30', 'customer30@example.com', '2021-09-10'),
(31, 'customer31', 'customer31@example.com', '2021-10-01'),
(32, 'customer32', 'customer32@example.com', '2021-10-22'),
(33, 'customer33', 'customer33@example.com', '2021-11-15'),
(34, 'customer34', 'customer34@example.com', '2021-12-05'),
(35, 'customer35', 'customer35@example.com', '2021-12-15'),
(36, 'customer36', 'customer36@example.com', '2021-12-22'),
(37, 'customer37', 'customer37@example.com', '2021-12-27'),
(38, 'customer38', 'customer38@example.com', '2021-12-30'),
(39, 'customer39', 'customer39@example.com', '2022-01-12'),
(40, 'customer40', 'customer40@example.com', '2022-02-14'),
(41, 'customer41', 'customer41@example.com', '2022-03-25'),
(42, 'customer42', 'customer42@example.com', '2022-04-05'),
(43, 'customer43', 'customer43@example.com', '2022-05-10'),
(44, 'customer44', 'customer44@example.com', '2022-06-11'),
(45, 'customer45', 'customer45@example.com', '2022-07-15'),
(46, 'customer46', 'customer46@example.com', '2022-08-20'),
(47, 'customer47', 'customer47@example.com', '2022-09-05'),
(48, 'customer48', 'customer48@example.com', '2022-10-10'),
(49, 'customer49', 'customer49@example.com', '2022-10-25'),
(50, 'customer50', 'customer50@example.com', '2022-11-11'),
(51, 'customer51', 'customer51@example.com', '2022-11-25'),
(52, 'customer52', 'customer52@example.com', '2022-12-03'),
(53, 'customer53', 'customer53@example.com', '2022-12-12'),
(54, 'customer54', 'customer54@example.com', '2022-12-28'),
(55, 'customer55', 'customer55@example.com', '2023-01-05'),
(56, 'customer56', 'customer56@example.com', '2023-02-20'),
(57, 'customer57', 'customer57@example.com', '2023-03-15'),
(58, 'customer58', 'customer58@example.com', '2023-04-10'),
(59, 'customer59', 'customer59@example.com', '2023-05-05'),
(60, 'customer60', 'customer60@example.com', '2023-06-10'),
(61, 'customer61', 'customer61@example.com', '2023-07-15'),
(62, 'customer62', 'customer62@example.com', '2023-08-20'),
(63, 'customer63', 'customer63@example.com', '2023-09-25'),
(64, 'customer64', 'customer64@example.com', '2023-10-30'),
(65, 'customer65', 'customer65@example.com', '2023-11-15'),
(66, 'customer66', 'customer66@example.com', '2023-11-29'),
(67, 'customer67', 'customer67@example.com', '2023-12-05'),
(68, 'customer68', 'customer68@example.com', '2023-12-12'),
(69, 'customer69', 'customer69@example.com', '2023-12-18'),
(70, 'customer70', 'customer70@example.com', '2023-12-21'),
(71, 'customer71', 'customer71@example.com', '2023-12-23'),
(72, 'customer72', 'customer72@example.com', '2023-12-27'),
(73, 'customer73', 'customer73@example.com', '2023-12-31'),
(74, 'customer74', 'customer74@example.com', '2024-01-03'),
(75, 'customer75', 'customer75@example.com', '2024-02-12'),
(76, 'customer76', 'customer76@example.com', '2024-03-22'),
(77, 'customer77', 'customer77@example.com', '2024-04-05'),
(78, 'customer78', 'customer78@example.com', '2024-05-15'),
(79, 'customer79', 'customer79@example.com', '2024-06-20'),
(80, 'customer80', 'customer80@example.com', '2024-07-30'),
(81, 'customer81', 'customer81@example.com', '2024-08-05'),
(82, 'customer82', 'customer82@example.com', '2024-08-22'),
(83, 'customer83', 'customer83@example.com', '2024-09-12'),
(84, 'customer84', 'customer84@example.com', '2024-10-02'),
(85, 'customer85', 'customer85@example.com', '2024-10-15'),
(86, 'customer86', 'customer86@example.com', '2024-11-10'),
(87, 'customer87', 'customer87@example.com', '2024-11-20'),
(88, 'customer88', 'customer88@example.com', '2024-11-25'),
(89, 'customer89', 'customer89@example.com', '2024-11-29'),
(90, 'customer90', 'customer90@example.com', '2024-12-01'),
(91, 'customer91', 'customer91@example.com', '2024-12-10'),
(92, 'customer92', 'customer92@example.com', '2024-12-15'),
(93, 'customer93', 'customer93@example.com', '2024-12-20'),
(94, 'customer94', 'customer94@example.com', '2024-12-25'),
(95, 'customer95', 'customer95@example.com', '2024-12-30');

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
(5, 'cbd bakery', 'arudu123@gmail.com', 'Delivered', '3', '2025-05-27 05:11:36', '2025-06-01 11:15:14'),
(6, 'KFC', 'arudu123@gmail.com', 'In Progress', '5', '2025-05-31 23:56:13', '2025-06-01 09:56:13'),
(7, 'chichas', 'arudu123@gmail.com', 'In Progress', '4', '2025-05-31 23:56:26', '2025-06-01 09:56:26'),
(8, 'StartWars', 'amruthreddy@gmail.com', 'In Progress', '3', '2025-05-31 23:56:37', '2025-06-01 09:56:37'),
(9, '7 eleven', 'arudu123@gmail.com', 'In Progress', '2', '2025-06-01 00:43:22', '2025-06-01 10:43:22'),
(10, 'david jones', 'Abhay123@gmail.com', 'Delivered', '5', '2025-06-01 01:14:00', '2025-06-01 11:28:05'),
(11, '7 eleven', 'arudu123@gmail.com', 'In Progress', '4', '2025-06-02 10:47:26', '2025-06-02 20:47:26'),
(12, '7 eleven', 'arudu123@gmail.com', 'In Progress', '1', '2025-06-02 14:24:45', '2025-06-03 00:24:45'),
(13, 'Infinite Overseas', 'bunny@gmail.com', 'In Progress', '5', '2025-06-02 15:36:57', '2025-06-03 01:36:57');

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
(10, 0, 'Laura', 'laura05@gmail.com', 'Other', 'Test 123', '2025-04-26 00:51:11'),
(11, 0, 'Abhay', 'Abhay123@gmail.com', 'Negotiate the Price for order', 'I want to have more options for the price.', '2025-06-01 03:09:41'),
(12, 0, 'Abhay', 'Abhay123@gmail.com', 'Other', 'More Options', '2025-06-02 14:52:40');

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
  `assigned` tinyint(1) DEFAULT 0,
  `template_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `username`, `email`, `businessName`, `industryType`, `targetAudience`, `websiteType`, `technology`, `layoutStyle`, `logo`, `ecommerce`, `paymentGateway`, `contactForm`, `liveChat`, `estimatedPrice`, `submitted_at`, `assigned`, `template_id`) VALUES
(1, '', '', 'Pristine', 'Fashion', 'Teenagers', 'eCommerce', 'HTML/CSS', 'Minimalistic', 'No', 'Yes', 'Stripe', 'Yes', 'Yes', '', '2025-05-20 08:20:23', 1, NULL),
(2, 'Adam Smith', '', 'Pristine', 'Fashion', 'Teenagers', 'Portfolio', 'WordPress', 'Modern', 'Need a new one', 'Yes', 'Stripe', 'Yes', 'No', '', '2025-05-20 08:28:20', 1, NULL),
(3, '', '', 'Pristine', 'Fashion', 'Teenagers', 'Landing Page', 'WordPress', 'Minimalistic', 'Yes', 'Yes', 'Stripe', 'Yes', 'Yes', '900', '2025-05-22 00:17:46', 1, NULL),
(4, 'Adam Smith', 'Adam@gmail.com', 'agasthya', 'Fashion', 'Teenagers', 'eCommerce', 'WordPress', 'Modern', 'No', 'Yes', 'Razorpay', 'Yes', 'Yes', '1650', '2025-05-22 01:22:13', 1, NULL),
(5, 'Akanksha', 'ammu123@gmail.com', 'Toysie', 'Ecommerce', 'Kids', 'eCommerce', 'HTML/CSS', 'Creative', 'Need a new one', 'Yes', 'Others', 'Yes', 'Yes', '1600', '2025-05-26 12:07:17', 1, NULL),
(6, 'Amruth', 'amruthreddy@gmail.com', 'StartWars', 'ecommerce', 'Men', 'Landing Page', 'HTML/CSS', 'Minimalistic', 'Need a new one', 'No', 'Others', 'Yes', 'Yes', '200', '2025-05-26 12:43:16', 1, NULL),
(7, 'Arudhathi', 'arudu123@gmail.com', 'cbd bakery', 'Food', 'everyone', 'eCommerce', 'HTML/CSS', 'Modern', 'No', 'Yes', 'Others', 'Yes', 'Yes', '1600', '2025-05-27 05:10:22', 1, NULL),
(8, 'Arudhathi', 'arudu123@gmail.com', 'chichas', 'food ', 'everyone', 'Blog', 'Shopify', 'Creative', 'Yes', 'Yes', 'Others', 'Yes', 'No', '1200', '2025-05-30 12:43:21', 1, NULL),
(9, 'Arudhathi', 'arudu123@gmail.com', 'KFC', 'Food', 'Teenagers', 'Landing Page', 'HTML/CSS', 'Modern', 'Yes', 'Yes', 'Others', 'Yes', 'Yes', '0', '2025-05-30 14:12:12', 1, NULL),
(10, 'Arudhathi', 'arudu123@gmail.com', 'KFC', 'Food', 'Teenagers', 'Landing Page', 'HTML/CSS', 'Modern', 'Yes', 'Yes', 'Others', 'Yes', 'Yes', '0', '2025-05-30 14:12:41', 0, NULL),
(11, 'Arudhathi', 'arudu123@gmail.com', 'KFC', 'Food', 'Teenagers', 'Landing Page', 'HTML/CSS', 'Modern', 'Yes', 'Yes', 'Others', 'Yes', 'Yes', '0', '2025-05-30 14:16:00', 0, NULL),
(12, 'Amith', 'amith462@gmail.com', 'Myer', 'Clothing', 'Everyone', 'Portfolio', 'WordPress', 'Modern', 'Need a new one', 'No', 'Others', 'Yes', 'Yes', '500', '2025-05-30 15:42:19', 0, NULL),
(13, '', 'naruto@gmail.com', 'Ichiraku Ramen', 'Food', 'Leaf village', 'Custom', 'HTML/CSS', 'Creative', 'Yes', 'Yes', 'PayPal', 'Yes', 'No', '2700', '2025-05-31 10:31:32', 0, 'template3'),
(14, '', 'naruto@gmail.com', 'Ichiraku Ramen', 'Food', 'Leaf village', 'Custom', 'HTML/CSS', 'Creative', 'Yes', 'Yes', 'Others', 'Yes', 'No', '2600', '2025-05-31 10:31:49', 0, 'template3'),
(15, '', 'naruto@gmail.com', 'Ichiraku Ramen', 'Food', 'Leaf village', 'Custom', 'HTML/CSS', 'Creative', 'Yes', 'Yes', 'Stripe', 'Yes', 'No', '2700', '2025-05-31 10:34:46', 0, 'template3'),
(16, '', 'naruto@gmail.com', 'Ichiraku Ramen', 'Food', 'Leaf village', 'Custom', 'HTML/CSS', 'Creative', 'Yes', 'Yes', 'Stripe', 'Yes', 'No', '2700', '2025-05-31 10:35:34', 0, 'template3'),
(17, '', 'arudu123@gmail.com', 'Atmc', 'Education', 'Students', 'Blog', 'HTML/CSS', 'Professional', 'Yes', 'No', 'Others', 'Yes', 'Yes', '600', '2025-05-31 10:47:38', 0, 'template1'),
(18, '', 'arudu123@gmail.com', '7 eleven', 'Convenient store ', 'Everyone', 'Blog', 'WordPress', 'Professional', 'Yes', 'Yes', 'Stripe', 'Yes', 'Yes', '1300', '2025-05-31 22:43:40', 0, 'template4'),
(19, '', 'arudu123@gmail.com', '7 eleven', 'Convenient store ', 'Everyone', 'Blog', 'WordPress', 'Professional', 'Yes', 'Yes', 'Stripe', 'Yes', 'Yes', '0', '2025-05-31 22:59:00', 0, 'template4'),
(20, '', 'arudu123@gmail.com', '7 eleven', 'Convenient store ', 'Everyone', 'Blog', 'WordPress', 'Professional', 'Yes', 'Yes', 'Razorpay', 'Yes', 'Yes', '1250', '2025-05-31 22:59:08', 0, 'template4'),
(21, '', 'arudu123@gmail.com', '7 eleven', 'Convenient store ', 'Everyone', 'Blog', 'WordPress', 'Professional', 'Yes', 'Yes', 'Others', 'Yes', 'Yes', '1200', '2025-05-31 23:18:52', 1, 'template2'),
(22, '', 'arudu123@gmail.com', '7 eleven', 'Convenient store ', 'Everyone', 'Blog', 'WordPress', 'Professional', 'Yes', 'Yes', 'Stripe', 'Yes', 'Yes', '1300', '2025-05-31 23:28:52', 0, 'template3'),
(23, '', 'arudu123@gmail.com', '7 eleven', 'Convenient store ', 'Everyone', 'Blog', 'WordPress', 'Professional', 'Yes', 'Yes', 'PayPal', 'Yes', 'Yes', '1300', '2025-05-31 23:34:33', 1, 'template2'),
(24, '', 'arudu123@gmail.com', '7 eleven', 'Convenient store ', 'Everyone', 'Blog', 'WordPress', 'Modern', 'Yes', 'Yes', 'Stripe', 'Yes', 'Yes', '1300', '2025-05-31 23:40:32', 1, 'template4'),
(25, '', 'saraniya@gmail.com', 'Home hacks', 'Home decors', 'Everyone', 'Landing Page', 'HTML/CSS', 'Professional', 'Yes', 'Yes', 'PayPal', 'Yes', 'No', '900', '2025-06-01 00:51:30', 0, 'template1'),
(26, '', 'Abhay123@gmail.com', 'david jones', 'Clothing', 'Women', 'eCommerce', 'HTML/CSS', 'Creative', 'Yes', 'Yes', 'PayPal', 'Yes', 'Yes', '1700', '2025-06-01 01:05:56', 1, 'template1'),
(27, '', 'Abhay123@gmail.com', 'Huggies', 'medical', 'Babies', 'eCommerce', 'HTML/CSS', 'Creative', 'Yes', 'No', 'PayPal', 'Yes', 'Yes', '1000', '2025-06-02 12:51:47', 0, 'template2'),
(28, '', 'nandithakonda06@gmail.com', 'Go Green', 'Ecommerce', 'everyone', 'Blog', 'WordPress', 'Minimalistic', 'Need a new one', 'Yes', 'Razorpay', 'Yes', 'Yes', '1250', '2025-06-02 15:07:15', 0, 'template2'),
(29, '', 'nandithakonda06@gmail.com', 'Go Green', 'Ecommerce', 'everyone', 'Blog', 'WordPress', 'Minimalistic', 'Need a new one', 'Yes', 'Stripe', 'Yes', 'Yes', '1300', '2025-06-02 15:10:07', 0, 'template2'),
(30, '', 'bunny@gmail.com', 'Infinite Overseas', 'Consultancy', 'Students', 'Portfolio', 'HTML/CSS', 'Modern', 'Need a new one', 'Yes', 'Others', 'Yes', 'Yes', '1100', '2025-06-02 15:35:09', 1, 'template4');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `contact`, `created_at`, `role`) VALUES
(1, 'Aditya Pusala', 'adityapusala5678@gmail.com', '$2y$10$4XcH.xiJ0b.HPZkKcNlfKevM8hrh2UC6tYcQPyix0iLB./R4OyhE6', '8466920031', '2025-02-12 07:23:40', 'user'),
(2, 'alex', 'alex@gmail.com', '$2y$10$iWhVueF1q5BpZ1l62Xhd0Or2SN2HdHnICRgTBERBCxpMJm/qR64qa', '123456', '2025-02-12 08:04:13', 'user'),
(3, 'Robert Downey Jr', 'iamironman@gmail.com', '$2y$10$JIvUCZUsjtbuZycKwRJnq.LsROjxFIfIRuHE3g/Lphcu5I8kke7uu', '416621167', '2025-04-02 01:21:02', 'user'),
(4, 'supriya', 'supriyachinny@gmail.com', '$2y$10$FdCRCDmPYxf4pkQZI3ylKuIxGxP3Bt9ouGEKMvcWahON2663k6CKq', '414051554', '2025-05-02 15:32:40', 'user'),
(6, 'Aruna', 'aruna27@gmail.com', '$2y$10$eHsZb7PWrD.auDkaeuHzPu2H1CDu6WXRJlHshjt5SjXB8c3bilMDa', '9000654020', '2025-05-02 15:44:35', 'user'),
(7, 'Srinivas', 'srinivas05@gmail.com', '$2y$10$9meIXYxoW.7REWL846AK8unafaFRt6a1Sa6D5aR8XGVZUcgDl4s0u', '9395385804', '2025-05-02 19:16:52', 'user'),
(8, 'Chanduru', 'chanduru15@gmail.com', '$2y$10$/UWOGYHat5.7dEGbhxJs1.hj5h/i5UEUQzQCL4LMGAz4wvnOCcR8S', '451745369', '2025-05-02 19:19:18', 'user'),
(9, 'Test', 'Test123@gmail.com', '$2y$10$/PgiKlyonhtzHkAXKfc1Qe8mWPaqtCxpBxDCcu0mIXRS9zfcosTfG', '6303098598', '2025-05-02 22:42:12', 'user'),
(10, 'Akanksha', 'ammu123@gmail.com', '$2y$10$MdLojR0MUPiWz3HpNzdWg.wBLOn42ZIOAd3QZFncmNJ0WOpyFK1XK', '414051554', '2025-05-26 12:06:00', 'user'),
(11, 'Amruth', 'amruthreddy@gmail.com', '$2y$10$H3mc4RwTg/8plBgozkfnWOzSLiSs1jjqEatVOh5rcCp9yTP.LE45m', '6303098598', '2025-05-26 12:40:22', 'user'),
(12, 'Arudhathi', 'arudu123@gmail.com', '$2y$10$rb/lMT22n8psn82v3j2vNeADXtzFZZ8rSvVDOOwRUbt31RjJf30aa', '426228510', '2025-05-27 05:06:39', 'user'),
(13, 'Amith', 'amith462@gmail.com', '$2y$10$Vs2OhBxg5OOnq5dramaBPOYTciq9UkPq6SH1nkp2qumDChRDRkGwW', '9395385804', '2025-05-30 15:38:51', 'user'),
(14, 'Akhil', 'akhil@gmail.com', '$2y$10$0mA/s8X2vK47I8Sk0qkbc.8O6Zah7wA5wK.qO7DsldHyDzuPQ7.4u', '414051236', '2025-05-31 09:55:03', 'user'),
(15, 'Admin', 'admin@gmail.com', '$2y$10$PgBt0G8Kf2KQQVMOAvbZUeGnz8RbnVUm6w4BDV94IIYCLGI8frVxu', '414051550', '2025-05-31 10:22:07', 'admin'),
(16, 'Naruto', 'naruto@gmail.com', '$2y$10$C1yshi09498LaU3aUpwmFejwtCqEoiWmT9DJxSE7MK80qcHiWSHHa', '9006540200', '2025-05-31 10:27:52', 'user'),
(17, 'Saraniya', 'saraniya@gmail.com', '$2y$10$aU4vdpu8DuWhJsChwIIdy.BEwKC2UX/TvftqCJmcpOoJXZNXkvERO', '451745368', '2025-06-01 00:46:30', 'user'),
(18, 'Abhay', 'Abhay123@gmail.com', '$2y$10$CIq3JHOS/gkZ9qeIilE9zOkjXBW7h3s1SxZ9AXKAGkEczstRVIN8S', '900654020', '2025-06-01 01:03:48', 'user'),
(19, 'Nanditha', 'nandithakonda06@gmail.com', '$2y$10$/lSaWhD07YtAAZVZ/VXjq.AQztOXdO2j5TA/6JobXEpHSmfb.rDA2', '414051554', '2025-06-02 15:05:47', 'user'),
(20, 'Rajkumar', 'bunny@gmail.com', '$2y$10$6snp.4uFac8OtLJ6w8kOQeXgslI6dAPS5w5YyG..JFld.W8dmoH.S', '9000654020', '2025-06-02 15:33:42', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `Message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sales_data`
--
ALTER TABLE `sales_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
