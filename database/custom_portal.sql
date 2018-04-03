-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2018 at 05:22 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `custom_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `options` mediumtext NOT NULL,
  `values` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shop_cat`
--

CREATE TABLE `shop_cat` (
  `category_id` int(11) NOT NULL,
  `category_name` mediumtext NOT NULL,
  `category_description` longtext,
  `category_slug` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_cat`
--

INSERT INTO `shop_cat` (`category_id`, `category_name`, `category_description`, `category_slug`, `category_image`, `parent_id`, `created_at`, `updated_at`) VALUES
(61, 'Mobiles', '', 'mobiles', NULL, 0, '2018-03-27 12:51:22', '0000-00-00 00:00:00'),
(62, 'All Mobile Phones', '', 'all-mobile-phones', NULL, 61, '2018-03-27 12:52:21', '2018-03-27 09:22:21'),
(63, 'All Mobile Phones Accessories', '', 'all-mobile-phones-accessories', NULL, 61, '2018-03-28 08:40:47', '0000-00-00 00:00:00'),
(64, 'Cases &  Covers', '', 'cases-covers', NULL, 63, '2018-03-27 12:53:33', '2018-03-27 09:23:33'),
(65, 'Screen Protectors', '', 'screen-protectors', NULL, 63, '2018-03-27 12:54:11', '0000-00-00 00:00:00'),
(66, 'Tablets', '', 'tablets', NULL, 63, '2018-03-27 12:54:57', '0000-00-00 00:00:00'),
(67, 'Wearable Accessories', '', 'wearable-accessories', NULL, 63, '2018-03-27 12:55:17', '0000-00-00 00:00:00'),
(69, 'Laptops', '', 'laptops', NULL, 103, '2018-04-02 10:42:54', '2018-04-02 07:12:54'),
(70, 'Printers', '', 'printers', NULL, 103, '2018-04-02 10:43:03', '2018-04-02 07:13:03'),
(71, 'Desktop & Monitors', '', 'desktop-monitors', NULL, 103, '2018-04-02 10:43:17', '2018-04-02 07:13:17'),
(72, 'Hard Drive', '', 'hard-drive', NULL, 103, '2018-04-02 10:43:26', '2018-04-02 07:13:26'),
(73, 'Pendrives', '', 'pendrives', NULL, 103, '2018-04-02 10:43:38', '2018-04-02 07:13:38'),
(74, 'Memory Card', '', 'memory-card', NULL, 103, '2018-04-02 10:43:47', '2018-04-02 07:13:47'),
(75, 'Software', '', 'software', NULL, 103, '2018-04-02 10:43:58', '2018-04-02 07:13:58'),
(76, 'PC Gamings', '', 'pc-gamings', NULL, 103, '2018-04-03 14:43:25', '2018-04-03 11:13:25'),
(77, 'Women Fashion', '', 'women-fashion', NULL, 0, '2018-03-29 09:32:39', '0000-00-00 00:00:00'),
(78, 'Clothing', '', 'clothing', NULL, 77, '2018-03-29 09:32:54', '0000-00-00 00:00:00'),
(79, 'Western Wear', '', 'western-wear', NULL, 77, '2018-03-29 09:33:12', '0000-00-00 00:00:00'),
(80, 'Ethnic Wear', '', 'ethnic-wear', NULL, 77, '2018-03-29 09:33:30', '0000-00-00 00:00:00'),
(81, 'Lingerie & Nightwear', '', 'lingerie-nightwear', NULL, 77, '2018-03-29 09:33:54', '0000-00-00 00:00:00'),
(82, 'Watches', '', 'watches', NULL, 77, '2018-03-29 09:34:16', '0000-00-00 00:00:00'),
(83, 'Handbags & Clutches', '', 'handbags-clutches', NULL, 77, '2018-03-29 09:34:37', '0000-00-00 00:00:00'),
(84, 'Sunglasses', '', 'sunglasses', NULL, 77, '2018-03-29 09:34:58', '0000-00-00 00:00:00'),
(85, 'Shoes', '', 'shoes', NULL, 77, '2018-03-29 09:35:14', '0000-00-00 00:00:00'),
(86, 'Fashion Sandals', '', 'fashion-sandals', NULL, 77, '2018-03-29 09:35:36', '0000-00-00 00:00:00'),
(87, 'Ballerinas', '', 'ballerinas', NULL, 77, '2018-03-29 09:35:54', '0000-00-00 00:00:00'),
(88, 'The Designer Boutique', '', 'the-designer-boutique', NULL, 77, '2018-03-29 09:36:16', '0000-00-00 00:00:00'),
(89, 'Handloom & Handicraft Store', '', 'handloom-handicraft-store', NULL, 77, '2018-03-29 09:36:35', '0000-00-00 00:00:00'),
(90, 'Sportswear', '', 'sportswear', NULL, 77, '2018-03-29 09:36:53', '0000-00-00 00:00:00'),
(91, 'Fashion Sales & Deals', '', 'fashion-sales-deals', NULL, 77, '2018-03-29 09:37:12', '0000-00-00 00:00:00'),
(92, 'Sports, Fitness, Bags, Luggage', '', 'sports-fitness-bags-luggage', NULL, 0, '2018-03-29 09:38:10', '2018-03-29 06:08:10'),
(93, 'Cricket', '', 'cricket', NULL, 92, '2018-03-29 09:37:57', '0000-00-00 00:00:00'),
(94, 'Badminton', '', 'badminton', NULL, 92, '2018-03-29 09:38:35', '0000-00-00 00:00:00'),
(95, 'Cycling', '', 'cycling', NULL, 92, '2018-03-29 09:38:58', '0000-00-00 00:00:00'),
(96, 'Football', '', 'football', NULL, 92, '2018-03-29 09:39:14', '0000-00-00 00:00:00'),
(97, 'Running', '', 'running', NULL, 92, '2018-03-29 09:39:33', '0000-00-00 00:00:00'),
(98, 'Camping & Hiking', 'This is the testing of description.', 'camping-hiking', NULL, 92, '2018-04-01 16:29:08', '2018-04-01 12:59:08'),
(103, 'Computers and accessories', '', 'computers-and-accessories', NULL, 0, '2018-04-02 10:42:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shop_cat_settings`
--

CREATE TABLE `shop_cat_settings` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `settings` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_cat_settings`
--

INSERT INTO `shop_cat_settings` (`id`, `category_id`, `settings`) VALUES
(2, 76, 'a:4:{s:11:\"cat_metakey\";s:34:\"dfsdfdsf,df,df,d,fd,f,df,d,fd,f,ds\";s:11:\"cat_metadis\";N;s:6:\"choice\";s:1:\"0\";s:16:\"show_description\";s:1:\"1\";}');

-- --------------------------------------------------------

--
-- Table structure for table `shop_media`
--

CREATE TABLE `shop_media` (
  `id` int(11) NOT NULL,
  `media_name` varchar(255) NOT NULL,
  `media_type` varchar(255) NOT NULL,
  `media_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shop_products`
--

CREATE TABLE `shop_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `product_description` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `product_short_des` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `product_cost` int(11) NOT NULL,
  `product_selling` int(11) NOT NULL,
  `product_sales` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_products`
--

INSERT INTO `shop_products` (`product_id`, `product_name`, `product_description`, `product_short_des`, `product_cost`, `product_selling`, `product_sales`, `created_at`, `update_at`) VALUES
(1, 'physics book', 'hello this is a description', 'hello this is a short description', 120, 150, 135, '2017-12-07 16:30:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_products_varients`
--

CREATE TABLE `shop_products_varients` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_cost` int(11) NOT NULL,
  `product_selling` int(11) NOT NULL,
  `product_sale_price` int(11) NOT NULL,
  `product_whole_cp` int(11) NOT NULL,
  `product_whole_sp` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shop_product_cat`
--

CREATE TABLE `shop_product_cat` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_product_cat`
--

INSERT INTO `shop_product_cat` (`id`, `category_id`, `product_id`) VALUES
(1, 37, 1);

-- --------------------------------------------------------

--
-- Table structure for table `show_product_gallery`
--

CREATE TABLE `show_product_gallery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `user_status` enum('0','1') NOT NULL DEFAULT '0',
  `verification_status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `user_role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2018-02-24 15:49:35', '0000-00-00 00:00:00'),
(9, 'Subadmin', '2018-02-27 07:20:19', '0000-00-00 00:00:00'),
(14, 'Customers', '2018-03-29 13:43:14', '2018-03-29 10:13:14'),
(17, 'Dealers', '2018-03-27 12:47:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_browser`
--

CREATE TABLE `visitor_browser` (
  `id` int(11) NOT NULL,
  `browser_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor_browser`
--

INSERT INTO `visitor_browser` (`id`, `browser_name`, `created_at`) VALUES
(3, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '2018-03-06 18:07:24'),
(4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '2018-03-07 14:17:23'),
(5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '2018-03-21 06:23:54'),
(6, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 Edge/16.16299', '2018-03-28 09:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_ip`
--

CREATE TABLE `visitor_ip` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `browser_id` int(11) NOT NULL,
  `login_attempts` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor_ip`
--

INSERT INTO `visitor_ip` (`id`, `ip_address`, `browser_id`, `login_attempts`, `created_at`) VALUES
(6, '::1', 3, 0, '2018-03-06 18:07:24'),
(7, '::1', 4, 0, '2018-03-07 14:17:23'),
(8, '::1', 5, 0, '2018-03-21 06:23:55'),
(9, '::1', 6, 0, '2018-03-28 09:31:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_cat`
--
ALTER TABLE `shop_cat`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `shop_cat_settings`
--
ALTER TABLE `shop_cat_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `shop_media`
--
ALTER TABLE `shop_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_products`
--
ALTER TABLE `shop_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shop_products_varients`
--
ALTER TABLE `shop_products_varients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_product_cat`
--
ALTER TABLE `shop_product_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `show_product_gallery`
--
ALTER TABLE `show_product_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_user_role_id` (`user_role_id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `visitor_browser`
--
ALTER TABLE `visitor_browser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `browser_name` (`browser_name`(191));

--
-- Indexes for table `visitor_ip`
--
ALTER TABLE `visitor_ip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `browser_id` (`browser_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop_cat`
--
ALTER TABLE `shop_cat`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `shop_cat_settings`
--
ALTER TABLE `shop_cat_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shop_media`
--
ALTER TABLE `shop_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop_products`
--
ALTER TABLE `shop_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shop_products_varients`
--
ALTER TABLE `shop_products_varients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop_product_cat`
--
ALTER TABLE `shop_product_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `show_product_gallery`
--
ALTER TABLE `show_product_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `visitor_browser`
--
ALTER TABLE `visitor_browser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `visitor_ip`
--
ALTER TABLE `visitor_ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `shop_cat_settings`
--
ALTER TABLE `shop_cat_settings`
  ADD CONSTRAINT `shop_cat_settings_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `shop_cat` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_role_id` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`role_id`);

--
-- Constraints for table `visitor_ip`
--
ALTER TABLE `visitor_ip`
  ADD CONSTRAINT `visitor_ip_ibfk_1` FOREIGN KEY (`browser_id`) REFERENCES `visitor_browser` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
