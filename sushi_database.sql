-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2018 at 05:30 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sushi_database`
--
CREATE DATABASE IF NOT EXISTS `sushi_database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sushi_database`;

-- --------------------------------------------------------

--
-- Table structure for table `cookorder`
--

DROP TABLE IF EXISTS `cookorder`;
CREATE TABLE `cookorder` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `cooking_status` varchar(20) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cookorder`
--

INSERT INTO `cookorder` (`id`, `order_id`, `cooking_status`, `employee_id`) VALUES
(1, 1, 'done', 3),
(2, 2, 'on progress', 3),
(3, 3, 'waiting', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `job_title` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `username`, `password`, `job_title`) VALUES
(1, 'Jeffry', '123', 'cashier'),
(2, 'Abam', '123', 'waiter'),
(3, 'Willy', '123', 'chef');

-- --------------------------------------------------------

--
-- Table structure for table `menuorder`
--

DROP TABLE IF EXISTS `menuorder`;
CREATE TABLE `menuorder` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuorder`
--

INSERT INTO `menuorder` (`id`, `order_id`, `menu_id`, `quantity`, `employee_id`) VALUES
(1, 1, 1, 1, 2),
(2, 1, 2, 1, 2),
(3, 1, 4, 1, 2),
(4, 2, 5, 2, 2),
(5, 3, 6, 2, 2),
(6, 3, 4, 2, 2),
(7, 3, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `price`, `category`) VALUES
(1, 'foodA', 5000, 'promo'),
(2, 'foodB', 10000, 'reguler'),
(3, 'foodC', 15000, 'promo'),
(4, 'drinkA', 5000, 'reguler'),
(5, 'drinkB', 6000, 'promo'),
(6, 'drinkC', 7000, 'reguler');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `table_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `table_number`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_method` varchar(20) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `date`, `payment_method`, `employee_id`, `order_id`) VALUES
(1, '2018-04-16 20:53:51', 'cash', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cookorder`
--
ALTER TABLE `cookorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cookingorder_fk1` (`order_id`),
  ADD KEY `cookingorder_fk2` (`employee_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuorder`
--
ALTER TABLE `menuorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_orderfk1` (`order_id`),
  ADD KEY `menu_orderfk2` (`menu_id`),
  ADD KEY `menu_orderfk3` (`employee_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_fk1` (`employee_id`),
  ADD KEY `payment_fk2` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cookorder`
--
ALTER TABLE `cookorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menuorder`
--
ALTER TABLE `menuorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cookorder`
--
ALTER TABLE `cookorder`
  ADD CONSTRAINT `cookingorder_fk1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cookingorder_fk2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menuorder`
--
ALTER TABLE `menuorder`
  ADD CONSTRAINT `menu_orderfk1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_orderfk2` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_orderfk3` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payment_fk1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_fk2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
