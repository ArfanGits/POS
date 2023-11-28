-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 06:20 AM
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
(6, 'jiraq', 'jiraq@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL),
(7, 'team18test', 'alpharfan07@gmail.com', '123456789', NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_order_info`
-- (See below for the actual view)
--
CREATE TABLE `all_order_info` (
`order_id` int(10)
,`product_name` varchar(200)
,`product_item` varchar(255)
,`amount` int(255)
,`customer_name` varchar(255)
,`shipping_mobile` int(11)
,`shipping_address` varchar(255)
,`order_time` timestamp
,`order_date` date
);

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
(1, 'Fruits', 'Fruits and vegetables contain important vitamins, minerals and plant chemicals.', 1),
(2, 'Bakery', 'Bakery products, which include bread, eggs, cookies, and muffins.', 1),
(3, 'Juice', 'Juice is a drink made from the extraction or pressing of the natural liquid.', 1),
(4, 'Meat', 'Meat is defined as the flesh of animals (including fishes and chickens) used as food.', 1),
(5, 'Vegetables', 'Vegetables are usually grouped according to the portion of the plant that is eaten.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_item` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `shipping_mobile` int(11) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `order_time` timestamp NULL DEFAULT current_timestamp(),
  `order_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_name`, `product_item`, `amount`, `shipping_mobile`, `shipping_address`, `order_time`, `order_date`) VALUES
(1, 8, 'Green Apple (Kg)<br> Banana (Kg)<br> ', '2', 10, 1231231234, ' Laurentian', '2023-11-28 02:55:05', '2023-11-27'),
(2, 8, 'Tropicana Mango<br> Banana (Kg)<br> ', '2', 9, 1231231234, ' Laurentian University', '2023-11-28 03:00:55', '2023-11-27'),
(3, 8, 'Tropicana Mango<br> ', '1', 5, 1231231234, ' Laurentian CIty', '2023-11-28 03:14:46', '2023-11-27'),
(4, 8, ' Red Apple (kg)<br> ', '1', 6, 1231231234, ' Laurentian', '2023-11-28 03:18:41', '2023-11-27'),
(5, 8, 'Green Apple (Kg)<br> ', '1', 6, 1231231234, ' lu', '2023-11-28 03:23:59', '2023-11-27');

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
(1, ' Lemon (Kg)', 5, 'Lemon (Citrus limon (L.) Burm.) a yellow or pale yellow prolate fruit. ', 1, 'p-07.jpg', 10, 1),
(2, 'Banana (Kg)', 4, 'A banana is a curved, yellow fruit with thick skin and soft sweet flesh. ', 1, '2901099.jpg', 30, 1),
(3, ' Red Apple (kg)', 6, 'Red Delicious has a sweet but very mild flavor, somewhat reminiscent of slightly over-ripe melon. ', 1, '2901460.jpg', 20, 1),
(4, 'Green Apple (Kg)', 6, 'The flavor of Green apples is extremely acidic, sometimes to the point of not having other taste, but generally refreshing.', 1, 'apple1.jpg', 15, 1),
(5, 'Grapes (Kg)', 4, 'Grapes are fleshy, rounded fruits that grow in clusters made up of many fruits of greenish, yellowish, or purple skin.', 1, 'graps_white.jpg', 24, 1),
(6, 'Avocado (Kg)', 3, 'An avocado is a bright green fruit with a large pit and dark leathery skin.', 1, 'p-01.jpg', 20, 1),
(7, 'Egg', 8, 'Egg, the content of the hard-shelled reproductive body produced by a bird, is considered food.', 2, 'EGG.jpg', 30, 1),
(8, 'Bread', 3, 'Bread is a staple food prepared from a dough of flour (usually wheat) and water, usually by baking.', 2, 'Sandwich-White.jpg', 5, 1),
(9, 'Cookies', 3, 'Cookie, (from Dutch koekje, diminutive of koek, “cake”), primarily in the United States, is any of various small sweet cakes.', 2, 'Chocolate_Chip_Cookies.jpg', 25, 1),
(10, 'Wheat Flour', 10, 'Flour is the product obtained by grinding wheat kernels or \"berries\". ', 2, 'Wheat_Flour_2.jpg', 9, 1),
(11, 'Tropicana Mango', 5, 'TROPICANA Mango with Lime Take the taste of three bright fruit juices.', 3, 'Tropicana Mango.jpg', 10, 1),
(12, 'Prime Blue Raspberry', 3, 'These hydrating drinks are made with 10% coconut water and contain electrolytes, B vitamins, and BCAAs.', 3, 'Prime Blue Raspberry.jpg', 10, 1),
(13, 'Prime Lemon Lime', 10, 'Prime Lemon Lime by Logan Paul and KSI is a refreshing and delicious way to replenish your body with essential fluids and electrolytes.', 3, 'Prime Lemon Lime.jpg', 10, 1),
(14, 'Prime Tropical Punch', 3, 'Prime has superior hydration with electrolytes, great taste, and only 20 calories.', 3, 'Prime Tropical Punch.jpg', 10, 1),
(15, 'Chicken (Kg)', 10, 'Chickens are average-sized fowls, characterized by smaller heads, short beaks and wings, and a round body perched on featherless legs.', 4, 'chicken.jpg', 24, 1),
(16, 'Lamb (Kg)', 14, 'Lamb, live sheep before the age of one year, and the flesh of such an animal. ', 4, 'Lamb.jpg', 6, 1),
(17, 'Tilapia (Kg)', 30, 'Tilapia are a hardy, fast-growing fish, that can live up to ten years and reach ten pounds in weight. ', 4, 'Telapia.jpg', 5, 1),
(18, 'Salmon (Kg)', 40, 'Salmons have sleek, streamlined bodies that typically change color throughout their lifetimes.', 4, 'Salmon.jpg', 12, 1),
(19, 'Broccoli (Kg)', 4, 'Fresh broccoli should be dark green in color, with firm stalks and compact bud clusters.', 5, 'p-03.jpg', 27, 1),
(20, 'Cauliflower (Kg)', 6, 'Cauliflowers are annual plants that reach about 0.5 metres (1.5 feet) tall and bear large rounded leaves that resemble collards.', 5, 'p-26.jpg', 19, 1),
(21, 'Pumpkin (Kg)', 6, 'Pumpkins are often yellowish to orange in color, and they vary from oblate to globular to oblong.', 5, 'p-28.jpg', 18, 1),
(22, 'Tomato (Kg)', 1, 'Tomatoe skin is a thin and fleshy tissue comprising the remainder of the fruit wall and the placenta.', 5, 'p-22.jpg', 25, 1);

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
(7, 'Arfan', ' Arfan', ' A Khan', 'alpharfan07@gmail.com', '123456789', 1231231234, 'Laurentian University.', NULL, NULL, '2023-11-11 22:53:15', '2023-11-11 22:53:15'),
(8, 'ArfanAKhan', ' test', ' wenew', 'newmail@gmail.com', '123456', 1231231234, 'laurentian', NULL, NULL, '2023-11-27 00:29:09', '2023-11-27 00:29:09');

-- --------------------------------------------------------

--
-- Structure for view `all_order_info`
--
DROP TABLE IF EXISTS `all_order_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_order_info`  AS SELECT `orders`.`order_id` AS `order_id`, `orders`.`product_name` AS `product_name`, `orders`.`product_item` AS `product_item`, `orders`.`amount` AS `amount`, `users`.`user_firstname` AS `customer_name`, `orders`.`shipping_mobile` AS `shipping_mobile`, `orders`.`shipping_address` AS `shipping_address`, `orders`.`order_time` AS `order_time`, `orders`.`order_date` AS `order_date` FROM (`orders` join `users`) WHERE `users`.`user_id` = `orders`.`user_id` ;

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

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
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `ctg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pdt_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
