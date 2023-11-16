-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 07:49 PM
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
  `admin_pass` varchar(255) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `reset_token`, `reset_token_expire`) VALUES
(1, 'Arfan', 'tcase018@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '8ea6ad00a3b723d4cd1ed28fb99558f9', '2023-11-11'),
(2, 'test', 'team@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL),
(3, 'signtest', 'sign@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL),
(4, 'team18Q', 'team18q@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL),
(5, '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(6, 'jiraq', 'jiraq@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `ctg_id` int(11) NOT NULL,
  `ctg_name` varchar(60) NOT NULL,
  `ctg_des` varchar(255) NOT NULL,
  `ctg_status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`ctg_id`, `ctg_name`, `ctg_des`, `ctg_status`) VALUES
(2, 'Fruits', 'Fruits and vegetables contain important vitamins, minerals and plant chemicals.', 1),
(3, 'Bakery', 'Bakery products, which include bread, eggs, cookies, and muffins.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pdt_id` int(255) NOT NULL,
  `pdt_name` varchar(200) NOT NULL,
  `pdt_price` int(255) NOT NULL,
  `pdt_des` varchar(255) NOT NULL,
  `pdt_ctg` int(200) NOT NULL,
  `pdt_img` varchar(255) NOT NULL,
  `product_stock` int(5) NOT NULL,
  `pdt_status` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pdt_id`, `pdt_name`, `pdt_price`, `pdt_des`, `pdt_ctg`, `pdt_img`, `product_stock`, `pdt_status`) VALUES
(1, ' Lemon (Kg)', 5, 'Lemon (Citrus limon (L.) Burm.) a yellow or pale yellow prolate fruit. ', 2, 'p-07.jpg', 10, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_info_ctg`
-- (See below for the actual view)
--
CREATE TABLE `product_info_ctg` (
`pdt_id` int(255)
,`pdt_name` varchar(200)
,`pdt_price` int(255)
,`pdt_des` varchar(255)
,`pdt_img` varchar(255)
,`product_stock` int(5)
,`pdt_status` tinyint(5)
,`ctg_id` int(11)
,`ctg_name` varchar(60)
);

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
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expire` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_mobile`, `user_address`, `reset_token`, `reset_token_expire`, `created_at`, `modified_at`) VALUES
(1, 'aa_khan', ' Arfan', ' A Khan', 'khan.arfan07@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2147483647, '525 Kathleen St', NULL, NULL, '2023-10-27 13:47:33', '2023-10-27 13:47:33'),
(2, 'test', ' test', ' case', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1234561234, 'paris st', NULL, NULL, '2023-10-27 16:37:13', '2023-10-27 16:37:13'),
(3, 'Team18', ' team', ' eighteen', 'team18@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1231231234, 'laurentian university.', NULL, NULL, '2023-10-27 20:17:21', '2023-10-27 20:17:21'),
(4, 'jira', ' jira', ' soft', 'jira@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1231231234, '525 Kathleen St', NULL, NULL, '2023-10-27 22:28:22', '2023-10-27 22:28:22'),
(5, 'new', ' new', ' user', 'newuser@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1234567896, 'lu', NULL, NULL, '2023-11-09 01:22:32', '2023-11-09 01:22:32'),
(6, 'test22', ' test', ' 12', 'test22@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1231231234, 'downtown', NULL, NULL, '2023-11-09 01:39:31', '2023-11-09 01:39:31'),
(7, 'Arfan', ' Arfan', ' A Khan', 'alpharfan07@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1231231234, 'Laurentian University.', '937f4365ecc4de3db67f9d6951d4caac', '2023-11-11', '2023-11-11 22:53:15', '2023-11-11 22:53:15');

-- --------------------------------------------------------

--
-- Structure for view `product_info_ctg`
--
DROP TABLE IF EXISTS `product_info_ctg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_info_ctg`  AS SELECT `products`.`pdt_id` AS `pdt_id`, `products`.`pdt_name` AS `pdt_name`, `products`.`pdt_price` AS `pdt_price`, `products`.`pdt_des` AS `pdt_des`, `products`.`pdt_img` AS `pdt_img`, `products`.`product_stock` AS `product_stock`, `products`.`pdt_status` AS `pdt_status`, `catagory`.`ctg_id` AS `ctg_id`, `catagory`.`ctg_name` AS `ctg_name` FROM (`products` join `catagory`) WHERE `products`.`pdt_ctg` = `catagory`.`ctg_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`ctg_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pdt_id`);

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
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `ctg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pdt_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
