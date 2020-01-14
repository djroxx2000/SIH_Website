-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2020 at 12:58 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `court_case_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `admin_first_name` varchar(50) NOT NULL,
  `admin_last_name` varchar(50) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_first_name`, `admin_last_name`, `email`, `password`, `phone_no`) VALUES
(1, 'test', 'test', 'test@test', '$2y$10$TraCEh6Dmy74N9.JhDWxLO/XCTi45hZhFYUbKVyLLf8Ryvg/c3DTi', NULL),
(2, 'test2', 'test2', 'test2@test2', '$2y$10$YKcA3jx8imPGQJN/OKF4sOYfXM/cHTNLl0LyqBF6wo.E4w6sw0/BW', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `case_id` int(11) NOT NULL,
  `case_type` varchar(50) NOT NULL,
  `case_details` varchar(200) NOT NULL,
  `next_hearing_date` date NOT NULL,
  `prev_hearing_date` date NOT NULL,
  `case_status` varchar(50) NOT NULL,
  `court_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`case_id`, `case_type`, `case_details`, `next_hearing_date`, `prev_hearing_date`, `case_status`, `court_name`) VALUES
(1, 'idk_type', 'random case details', '2012-12-12', '2011-11-11', 'pending', 'supreme court');

-- --------------------------------------------------------

--
-- Table structure for table `case_invoices`
--

CREATE TABLE `case_invoices` (
  `case_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `image_proof` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `client_first_name` varchar(50) NOT NULL,
  `client_last_name` varchar(50) NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `client_password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone_no` int(11) DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_first_name`, `client_last_name`, `client_email`, `client_password`, `phone_no`, `address`) VALUES
(1, 'testclient', 'clienttest', 'test@testclient', '$2y$10$opHKtn0ZmDD6YfgX8nONje4OyBineFj01lvjXspvtjufOPm/n1vX.', NULL, NULL),
(2, 'test', 'test', 'test@test', '$2y$10$Iqa4IJuL0ibFdEQM8MvCy.w9zYRl7IVFJnhdtz7tU/ZR9PNb4NM9W', NULL, NULL),
(3, 'test12', 'test12', 'test12@test12', '$2y$10$cR1MpwRFgGjJiKY93UmDI.fWdZFqDxl3.TYieX2JlNNL79JRrfCP2', NULL, NULL),
(4, 'test123', 'test1212', 'test11', '$2y$10$dUnFEsSM0dDqEfxiVNq8x.JCd.L.E/catCF3vq0keGsh2iLeqLusi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(200) NOT NULL,
  `user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_id`, `feedback_content`, `user_name`) VALUES
(1, 'This is a random feedback , generated for testing', 'Random user'),
(2, 'This is a random feedback generated for testing again.', 'random user 2'),
(3, 'This is a random feedback generated for testing again.', 'random user 2'),
(4, 'This is a random feedback generated for testing again.', 'random user 2'),
(5, 'This is a random feedback generated for testing again.', 'random user 2'),
(6, 'This is a random feedback generated for testing again.', 'random user 2'),
(7, 'This is a random feedback generated for testing again.', 'random user 2');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_login`
--

CREATE TABLE `lawyer_login` (
  `lawyer_id` int(11) NOT NULL,
  `lawyer_first_name` varchar(50) NOT NULL,
  `lawyer_last_name` varchar(50) NOT NULL,
  `lawyer_email` varchar(50) NOT NULL,
  `lawyer_password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lawyer_phone_no` int(11) DEFAULT NULL,
  `lawyer_city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `lawyer_address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `lawyer_rating` int(11) DEFAULT NULL,
  `specialization` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `lawyer_image` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lawyer_login`
--

INSERT INTO `lawyer_login` (`lawyer_id`, `lawyer_first_name`, `lawyer_last_name`, `lawyer_email`, `lawyer_password`, `lawyer_phone_no`, `lawyer_city`, `lawyer_address`, `lawyer_rating`, `specialization`, `lawyer_image`) VALUES
(6, 'test', 'test', 'test@test', '$2y$10$EH6syDHLHODkgdOfRkPVEeGdEkGbRGKY3athPVzFndTCLlP5PHQym', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'test12', 'test11', 'test12@test12', '$2y$10$qAaBkvZnYOpXQ3Uv.4vSJ.q..trXolyGLIdtCoCqd85COE.DrN7DO', NULL, NULL, NULL, NULL, NULL, NULL),
(8, '111', '111', '111q@111q', '$2y$10$17IMctFpkNR9yqhDSQzIleGa6.VPTA5gxWCglbTg8v5XBpo768v9e', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `case_invoices`
--
ALTER TABLE `case_invoices`
  ADD KEY `foreign_key_to_case_id` (`case_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `lawyer_login`
--
ALTER TABLE `lawyer_login`
  ADD PRIMARY KEY (`lawyer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `case_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lawyer_login`
--
ALTER TABLE `lawyer_login`
  MODIFY `lawyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `case_invoices`
--
ALTER TABLE `case_invoices`
  ADD CONSTRAINT `foreign_key_to_case_id` FOREIGN KEY (`case_id`) REFERENCES `cases` (`case_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
