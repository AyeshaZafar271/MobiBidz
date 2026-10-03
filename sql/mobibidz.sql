-- --------------------------------------------------------
-- MobiBidz Database
-- Clean version: IF NOT EXISTS, product_bids included, hashed passwords
-- --------------------------------------------------------

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
SET NAMES utf8mb4;

-- --------------------------------------------------------
-- To RESET database, uncomment these lines:
-- DROP TABLE IF EXISTS `product_bids`;
-- DROP TABLE IF EXISTS `product_images`;
-- DROP TABLE IF EXISTS `product_discount`;
-- DROP TABLE IF EXISTS `account_cart`;
-- DROP TABLE IF EXISTS `transactions`;
-- DROP TABLE IF EXISTS `role`;
-- DROP TABLE IF EXISTS `product`;
-- DROP TABLE IF EXISTS `product_category`;
-- DROP TABLE IF EXISTS `account`;
-- --------------------------------------------------------

-- Table: account
CREATE TABLE IF NOT EXISTS `account` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Postcode` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Sample data (password for all = "password123")
INSERT INTO `account` (`ID`, `Email`, `Password`, `Name`, `Address`, `Phone`, `Postcode`) VALUES
(1, 'asd@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uAnc.iTi', 'asd def', 'asdasdadasd', '1234567', 'abcdef'),
(2, 'zxc@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uAnc.iTi', 'Test', 'Test address', '12345', 'abc1234'),
(6, 'test1@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uAnc.iTi', 'test1', 'galway test 1', '123456', 'H91DDER'),
(7, 'def@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uAnc.iTi', 'abc', 'adasd', '123456', 'abcdef');

-- Table: product_category
CREATE TABLE IF NOT EXISTS `product_category` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `product_category` (`ID`, `category_name`) VALUES
(1, 'Tablet'),
(2, 'Phone'),
(3, 'Watch');

-- Table: product
CREATE TABLE IF NOT EXISTS `product` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'fixed',
  `category_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `is_valid` int(11) NOT NULL,
  `total_in_stock` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `product` (`ID`, `Name`, `type`, `category_id`, `store_id`, `price`, `date_added`, `is_valid`, `total_in_stock`, `description`) VALUES
(1, 'Fire Bolt Ninja', 'fixed', 3, 1, 100, '2023-04-21', 1, 20, 'Fire Bolt Ninja Watch with android OS'),
(2, 'Iphone 12 Pro Max', 'fixed', 2, 2, 1000, '2023-04-28', 1, 5, 'Iphone 12 Pro Max factory unlock IOS'),
(3, 'Fitbit', 'fixed', 3, 2, 200, '2023-04-28', 1, 2, 'Fitbit Charge 5 with GPS'),
(4, 'Lenovo Tab M8', 'fixed', 1, 3, 500, '2023-04-29', 1, 2, 'Lenovo tab M8 with android OS'),
(9, 'Samsung Galaxy 12', 'auction', 1, 1, 1200, '2023-07-26', 1, 4, 'Samsung Galaxy 12 smartphone');

-- Table: product_bids
CREATE TABLE IF NOT EXISTS `product_bids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bid_price` decimal(10,2) NOT NULL,
  `bid_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`product_id`) REFERENCES `product`(`ID`),
  FOREIGN KEY (`user_id`) REFERENCES `account`(`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table: product_images
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `path` varchar(1000) NOT NULL,
  `image_number` int(11) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `product_images` (`id`, `product_id`, `path`, `image_number`, `uploaded_on`) VALUES
(1, 1, '1_1682030686_firebolt.jpg', 0, '2023-04-21 00:44:46'),
(3, 4, '4_1682033459_lenovo-galaxy-tab.jpeg', 0, '2023-04-21 01:30:59'),
(4, 2, '2_1682638811_iphone12promax.jpg', 0, '2023-04-28 01:40:11'),
(9, 3, '3_1682736087_fitbit1.jpeg', 0, '2023-04-29 04:41:27'),
(20, 9, '9_1690406593_samsung.jpg', 0, '2023-07-26 22:23:13');

-- Table: product_discount
CREATE TABLE IF NOT EXISTS `product_discount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `discount` float NOT NULL,
  `valid_until` date NOT NULL,
  `name` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `product_discount` (`id`, `product_id`, `discount`, `valid_until`, `name`) VALUES
(1, 1, 30, '2023-04-30', 'weekend discount'),
(2, 2, 20, '2023-03-31', 'April Discount');

-- Table: account_cart
CREATE TABLE IF NOT EXISTS `account_cart` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_product_selected` int(11) NOT NULL,
  `is_valid` tinyint(1) NOT NULL,
  `product_price` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table: role
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `role` (`role_id`, `user_id`, `role_name`) VALUES
(1, 1, 'admin'),
(2, 2, 'user');

-- Table: transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

COMMIT;
