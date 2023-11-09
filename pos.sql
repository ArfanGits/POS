-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 01:24 AM
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
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'Arfan', 'tcase018@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'test', 'team@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'signtest', 'sign@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'team18Q', 'team18q@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(5, '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(6, 'jiraq', 'jiraq@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_mobile` int(11) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_mobile`, `user_address`, `created_at`, `modified_at`) VALUES
(1, 'aa_khan', ' Arfan', ' A Khan', 'khan.arfan07@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2147483647, '525 Kathleen St', '2023-10-27 13:47:33', '2023-10-27 13:47:33'),
(2, 'test', ' test', ' case', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1234561234, 'paris st', '2023-10-27 16:37:13', '2023-10-27 16:37:13'),
(3, 'Team18', ' team', ' eighteen', 'team18@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1231231234, 'laurentian university.', '2023-10-27 20:17:21', '2023-10-27 20:17:21'),
(4, 'jira', ' jira', ' soft', 'jira@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1231231234, '525 Kathleen St', '2023-10-27 22:28:22', '2023-10-27 22:28:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
