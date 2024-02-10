-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 12:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobibidz`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `ID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Postcode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ID`, `Email`, `Password`, `Name`, `Address`, `Phone`, `Postcode`) VALUES
(1, 'asd@gmail.com', 'asd', 'asd def', 'asdasdadasd', '1234567', 'abcdef'),
(2, 'zxc@gmail.com', 'asd', 'Test', 'Test address', '12345', 'abc1234'),
(3, 'abc@gmail.com', '12345', '', '', '123456', ''),
(4, 'abc@gmail.com', '12345', '', '', '1234567', ''),
(5, 'test@gmail.com', 'test', '', '', '123456', ''),
(6, 'test1@gmail.com', 'test', 'test1', 'galway test 1', '123456', 'H91DDER'),
(7, 'def@gmail.com', 'def', 'abc', 'adasd', '123456', 'abcdef');

-- --------------------------------------------------------

--
-- Table structure for table `account_cart`
--

CREATE TABLE `account_cart` (
  `ID` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_product_selected` int(11) NOT NULL,
  `is_valid` tinyint(1) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_cart`
--

INSERT INTO `account_cart` (`ID`, `product_id`, `user_id`, `total_product_selected`, `is_valid`, `product_price`) VALUES
(1, 8, 1, 1, 1, 1400),
(2, 4, 1, 1, 1, 500),
(3, 8, 1, 1, 1, 1400),
(4, 9, 1, 1, 1, 1200),
(5, 9, 1, 1, 1, 1200),
(6, 9, 1, 1, 1, 1200),
(7, 9, 1, 1, 1, 1200),
(8, 9, 7, 1, 1, 1200),
(9, 4, 7, 1, 1, 500),
(10, 3, 7, 1, 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `is_valid` int(11) NOT NULL,
  `total_in_stock` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Name`, `category_id`, `store_id`, `price`, `date_added`, `is_valid`, `total_in_stock`, `description`) VALUES
(1, 'Fire Bolt Ninja', 3, 1, 100, '2023-04-21', 1, 20, 'Fire Bolt Ninja Watch with andriod OS'),
(2, 'Iphone 12 Pro Max', 2, 2, 1000, '2023-04-28', 1, 5, 'Iphone 12 Pro Max factory unlock IOS'),
(3, 'Fitbit', 3, 2, 200, '2023-04-28', 1, 2, 'Fitbit Charge 5 with GPS'),
(4, 'Lenovo Tab M8', 1, 3, 500, '2023-04-29', 1, 2, 'Lenovo tab M8 with android OS'),
(9, 'samsung galax 12', 1, 1, 1200, '2023-07-26', 1, 4, 'yshgfjhgkbjr');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `ID` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`ID`, `category_name`) VALUES
(1, 'Tablet'),
(2, 'Phone'),
(3, 'Watch');

-- --------------------------------------------------------

--
-- Table structure for table `product_discount`
--

CREATE TABLE `product_discount` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `discount` float NOT NULL,
  `valid_until` date NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_discount`
--

INSERT INTO `product_discount` (`id`, `product_id`, `discount`, `valid_until`, `name`) VALUES
(1, 1, 30, '2023-04-30', 'weekend discount'),
(2, 2, 20, '2023-03-31', 'April Discount');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `path` varchar(1000) NOT NULL,
  `image_number` int(11) NOT NULL,
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `path`, `image_number`, `uploaded_on`) VALUES
(1, 1, '1_1682030686_firebolt.jpg', 0, '2023-04-21 00:44:46'),
(3, 4, '4_1682033459_lenovo-galaxy-tab.jpeg', 0, '2023-04-21 01:30:59'),
(4, 2, '2_1682638811_iphone12promax.jpg', 0, '2023-04-28 01:40:11'),
(9, 3, '3_1682736087_fitbit1.jpeg', 0, '2023-04-29 04:41:27'),
(20, 9, '9_1690406593_samsung.jpg', 0, '2023-07-26 22:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `user_id`, `role_name`) VALUES
(1, 1, 'admin'),
(2, 2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_number` varchar(50) NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_price_currency` varchar(10) NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `paid_amount_currency` varchar(10) NOT NULL,
  `txn_id` varchar(50) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `stripe_checkout_session_id` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_name`, `customer_email`, `item_name`, `item_number`, `item_price`, `item_price_currency`, `paid_amount`, `paid_amount_currency`, `txn_id`, `payment_status`, `stripe_checkout_session_id`, `created`, `modified`) VALUES
(1, '', '', 'Demo Product', '', 25.00, 'USD', 25.00, 'usd', 'pi_3NZPvpIpEIxx77k11X2Qs4DU', 'succeeded', NULL, '2023-07-30 04:06:46', '2023-07-30 04:06:46'),
(2, '', '', 'Demo Product', '', 25.00, 'USD', 25.00, 'usd', 'pi_3NZQBRIpEIxx77k12IEPExyv', 'succeeded', NULL, '2023-07-30 04:21:16', '2023-07-30 04:21:16'),
(3, '', '', 'Demo Product', '', 25.00, 'USD', 25.00, 'usd', 'pi_3NZQG5IpEIxx77k11FNSmcNC', 'succeeded', NULL, '2023-07-30 04:25:49', '2023-07-30 04:25:49'),
(4, '', '', 'Demo Product', '', 25.00, 'USD', 25.00, 'usd', 'pi_3NZQH8IpEIxx77k10M2A0M5S', 'succeeded', NULL, '2023-07-30 04:27:02', '2023-07-30 04:27:02'),
(5, '', '', 'Demo Product', '', 25.00, 'USD', 25.00, 'usd', 'pi_3NZQM5IpEIxx77k12FDp1EwQ', 'succeeded', NULL, '2023-07-30 04:32:49', '2023-07-30 04:32:49'),
(6, '', '', 'Demo Product', '', 25.00, 'USD', 25.00, 'usd', 'pi_3NZQNGIpEIxx77k12qmff2Zc', 'succeeded', NULL, '2023-07-30 04:33:28', '2023-07-30 04:33:28'),
(7, 'asd', 'asd@gmail.com', 'Demo Product', '', 25.00, 'USD', 25.00, 'usd', 'pi_3NaT18IpEIxx77k127doDJJY', 'succeeded', NULL, '2023-08-02 01:34:43', '2023-08-02 01:34:43'),
(8, '', '', ' samsung', '', 1200.00, 'GBP', 1200.00, 'gbp', 'pi_3NaUysIpEIxx77k112Unlfgp', 'succeeded', NULL, '2023-08-02 03:54:53', '2023-08-02 03:54:53'),
(9, '', '', ' samsung galax 12', '', 1200.00, 'GBP', 1200.00, 'gbp', 'pi_3NaVF5IpEIxx77k10QRg1AW1', 'succeeded', NULL, '2023-08-02 03:57:17', '2023-08-02 03:57:17'),
(10, '', '', ' samsung galax 12', '', 1200.00, 'GBP', 1200.00, 'gbp', 'pi_3NaVKXIpEIxx77k12Swe6tRX', 'succeeded', NULL, '2023-08-02 04:02:54', '2023-08-02 04:02:54'),
(11, '', '', ' samsung galax 12', '', 1200.00, 'GBP', 1200.00, 'gbp', 'pi_3NaVMDIpEIxx77k11uBugUAr', 'succeeded', NULL, '2023-08-02 04:04:36', '2023-08-02 04:04:36'),
(12, '', '', ' samsung galax 12', '', 1200.00, 'GBP', 1200.00, 'gbp', 'pi_3NaVORIpEIxx77k11c3430xR', 'succeeded', NULL, '2023-08-02 04:06:57', '2023-08-02 04:06:57'),
(13, '', '', ' samsung galax 12', '', 1200.00, 'GBP', 1200.00, 'gbp', 'pi_3NaVQ8IpEIxx77k11XrcCBzQ', 'succeeded', NULL, '2023-08-02 04:08:42', '2023-08-02 04:08:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `account_cart`
--
ALTER TABLE `account_cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product_discount`
--
ALTER TABLE `product_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `account_cart`
--
ALTER TABLE `account_cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_discount`
--
ALTER TABLE `product_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
