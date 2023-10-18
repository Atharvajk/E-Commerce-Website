-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 07:56 PM
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
-- Database: `acemegrade_ecomerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `created_date`) VALUES
(11, 7, 8, '2023-07-29 17:48:49'),
(12, 7, 10, '2023-07-29 17:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `myorder`
--

CREATE TABLE `myorder` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(30) NOT NULL DEFAULT 'Order Placed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myorder`
--

INSERT INTO `myorder` (`order_id`, `product_id`, `user_id`, `order_date`, `order_status`) VALUES
(1, 3, 7, '2023-07-29 16:52:00', ''),
(2, 4, 7, '2023-07-29 16:52:00', 'On the way'),
(4, 3, 7, '2023-07-29 16:56:56', 'Order Placed'),
(5, 4, 7, '2023-07-29 16:56:56', 'Order Placed'),
(7, 8, 7, '2023-07-29 17:49:21', 'Dispatched'),
(8, 10, 7, '2023-07-29 17:49:21', 'On the way');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_desc` varchar(1000) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image_path` varchar(1000) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `seller_id`, `product_name`, `product_desc`, `product_price`, `product_image_path`, `created_date`) VALUES
(3, 4, 'Jersey 2', 'awesome jersey', 1500, '../product_images/WhatsApp Image 2022-10-07 at 7.20.42 PM.jpeg', '2023-07-29 11:52:12'),
(4, 4, 'Jersey 3', 'adsdsa', 1400, '../product_images/WhatsApp Image 2022-10-07 at 7.20.41 PM.jpeg', '2023-07-29 11:52:33'),
(8, 8, 'Brazil jersey', 'abc', 749, '../product_images/4a23be01-3ddb-4f5b-8873-b265a4f15fe1.JPG', '2023-07-29 17:37:59'),
(9, 8, 'England jersey', 'abc', 799, '../product_images/32803be6-a557-4ca9-ae50-9fa0c2afd628.JPG', '2023-07-29 17:38:42'),
(10, 8, 'USA away jersey', 'abc', 1299, '../product_images/5685f4f6-fbaa-41ea-bf72-1de91634a4d7.JPG', '2023-07-29 17:39:35'),
(11, 8, 'Germany Jersey', 'xyz', 1110, '../product_images/8cbc38ba-e995-461a-b9fa-ccea8705a87b.JPG', '2023-07-29 17:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `user_type` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `username`, `password`, `created_date`) VALUES
(2, 1, 'a', '$2y$10$s1aKoYpGEgG3weTyprMQ1OGm8eloTtnVbh28.ezw/1HKT7Pwxvle6', '2023-07-29 05:00:02.571537'),
(3, 1, 'Swarangi', '$2y$10$laP4t9EskpQlxxQ8GN6Rjej/IOJGIjhRpVPttt8uH4e3lcu9xCTWy', '2023-07-29 05:00:26.839718'),
(4, 2, 'Swarangisell', '$2y$10$VL1hvxBbRpKpQnqU8xaNw.H.22fJKsUgmKreyED1zh.jgf3xvwlUm', '2023-07-29 05:21:41.183952'),
(5, 1, 'Atharva', '$2y$10$v90wOVk.DJMP8OucbSlVEOkvvd6PJtuqFXo.W.AxODnLqb/T3aIhm', '2023-07-29 05:57:47.721053'),
(6, 2, 'Atharvasell', '$2y$10$br.DdU./1w0w3fQ/GLRZ6.M92og.n3.adBK3zsFbY9JGZYxJLAkV.', '2023-07-29 12:32:15.900663'),
(7, 1, 'Atharvabuy', '$2y$10$AslW5JZyKJIB30nWReP1ZOrkdRikrsxRYBOhJ5kqpJxVPfBV8fTjm', '2023-07-29 12:37:44.888731'),
(8, 2, 'swarangi', '$2y$10$9AaxgKsdd7Xr7kCWvTQYcuORPM9b6jagO5it0q2nHnGNGu.mA4z/m', '2023-07-29 17:35:33.012413');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `myorder`
--
ALTER TABLE `myorder`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `myorder`
--
ALTER TABLE `myorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `myorder`
--
ALTER TABLE `myorder`
  ADD CONSTRAINT `myorder_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `myorder_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
