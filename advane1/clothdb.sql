-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 02:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `size` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `c_id`, `size`, `username`, `amount`, `price`, `total`) VALUES
(97, 10, 'M', 'ooo', 2, 3000, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `cloth`
--

CREATE TABLE `cloth` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `color` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pic` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `ct_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cloth`
--

INSERT INTO `cloth` (`c_id`, `c_name`, `color`, `gender`, `size`, `pic`, `price`, `ct_id`, `stock`) VALUES
(6, ' Star Tassel Chain Br', 'Silver', 'F', 'F', 'j1.JPG', 30, 2, 1),
(7, ' Letter Front Ankle Boots', ' Khaki', 'U', '38', 'sh1.JPG', 660, 3, 0),
(8, ' Letter Graphic Drop', 'red', 'F', 'M', 'c11.JPG', 300, 1, 0),
(10, 'aaaa', 'red', 'M', 'M', 'c4.jpg', 3000, 1, 61),
(11, 'jean', 'blue', 'M', 'M', 'c6.JPG', 600, 1, 0),
(12, 'Fluffy Bear', 'brown', 'F', 'F', 's6.JPG', 299, 3, -4),
(13, ' Buckle Strap Cut-ou', 'white', 'U', 'F', 's5.JPG', 350, 3, 1),
(14, '2pcs Heart Decor Bra', 'Gold, Silver', 'F', 'F', 'j2.JPG', 99, 2, 7),
(15, 'qwe14twqq', 'pinkgold', 'M', 'F', 'a3.JPG', 600, 2, 2),
(16, 'Geometric Metal', 'black', 'M', 'F', 'a223.JPG', 150, 2, 3),
(17, ' Rhinestone Heart', 'silver', 'F', 'F', 'a4.JPG', 500, 2, 4),
(18, 'backwhitet-shirt', '2tone', 'M', 'M', 'c1.jpg', 300, 1, 5),
(19, 'เสื้อเด็กแว๊นนนน', 'รุ้งกกกก', 'U', 'M', 'c12.JPG', 99999999, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `cloth_type`
--

CREATE TABLE `cloth_type` (
  `ct_id` int(11) NOT NULL,
  `ct_desc` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cloth_type`
--

INSERT INTO `cloth_type` (`ct_id`, `ct_desc`) VALUES
(1, 'เสื้อผ้า'),
(2, 'เครื่องประดับ'),
(3, 'รองเท้า');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `no` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `c_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_order` date NOT NULL,
  `price` double NOT NULL,
  `amount` int(11) NOT NULL,
  `total` double NOT NULL,
  `card_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `order_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`no`, `o_id`, `c_id`, `username`, `c_name`, `date_order`, `price`, `amount`, `total`, `card_number`, `order_status`) VALUES
(32, 10, 10, 'ooo', 'aaaa', '2021-03-07', 3000, 3, 9000, '864', 'placed'),
(35, 12, 10, 'ooo', 'aaaa', '2021-03-07', 3000, 3, 9000, '86786', 'sent'),
(36, 13, 10, 'ooo', 'aaaa', '2021-03-07', 3000, 3, 9000, '54654', 'processing'),
(37, 13, 10, 'ooo', 'aaaa', '2021-03-07', 3000, 3, 9000, '54654', 'processing'),
(38, 14, 10, 'ooo', 'aaaa', '2021-03-07', 3000, 3, 9000, '456786', 'placed');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `email`, `status`) VALUES
(1, 'Admin', '1234', 'Adminpae', 'xxxxpa@hotmail.com', 'Admin'),
(3, 'ooo', '1234', 'คือลือ', 'asdasdw@hotmail.com', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_ibfk_1` (`c_id`);

--
-- Indexes for table `cloth`
--
ALTER TABLE `cloth`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `ct_id` (`ct_id`);

--
-- Indexes for table `cloth_type`
--
ALTER TABLE `cloth_type`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`no`),
  ADD KEY `c_id` (`c_id`);

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `cloth`
--
ALTER TABLE `cloth`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cloth_type`
--
ALTER TABLE `cloth_type`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `cloth` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cloth`
--
ALTER TABLE `cloth`
  ADD CONSTRAINT `cloth_ibfk_1` FOREIGN KEY (`ct_id`) REFERENCES `cloth_type` (`ct_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `cloth` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
