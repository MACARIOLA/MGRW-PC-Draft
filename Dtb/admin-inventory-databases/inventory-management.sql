-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2024 at 04:13 PM
-- Server version: 5.7.34
-- PHP Version: 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `products_id` varchar(50) NOT NULL,
  `products_name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(120) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `total_units` int(11) NOT NULL,
  `reserved_units` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `products_id`, `products_name`, `image`, `description`, `unit_price`, `total_units`, `reserved_units`) VALUES
(1, 'UNIT PC 1', 'LENOVO THINKPAD L480', '1.jpg', 'Processor: Intel Core i5 6300U RAM: 8GB RAM SSD: 256GB GPU: Intel HD Graphics 620 Screen Size: 12.5', 55, 55, 55),
(2, 'UNIT PC 2', 'Intel Core i9-12900K', '2.jpg', 'Processor: Intel Core i5 6300U RAM: 8GB RAM SSD: 256GB GPU: Intel HD Graphics 620 Screen Size: 12.5', 2452, 53, 53),
(3, 'UNIT PC 3', 'AMD Ryzen 9 5900X', '3.jpg', 'Processor: Intel Core i5 6300U RAM: 8GB RAM SSD: 256GB GPU: Intel HD Graphics 620 Screen Size: 12.5', 3564, 13, 53),
(4, 'UNIT PC 4', 'Intel Core i7-12700K', '4.jpg', '', 25, 35, 53),
(5, 'UNIT PC 5', 'AMD Ryzen 7 5800X', '5.jpg', 'Processor: Intel Core i5 6300U RAM: 8GB RAM SSD: 256GB GPU: Intel HD Graphics 620 Screen Size: 12.5', 5, 5, 5),
(6, 'UNIT PC 6', 'Intel Core i5-12600K', '6.jpg', 'Processor: Intel Core i5 6300U RAM: 8GB RAM SSD: 256GB GPU: Intel HD Graphics 620 Screen Size: 12.5', 6, 6, 6),
(7, 'UNIT PC 7', 'AMD Ryzen 5 5600X', '7.jpg', 'Processor: Intel Core i5 6300U RAM: 8GB RAM SSD: 256GB GPU: Intel HD Graphics 620 Screen Size: 12.5', 5, 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `reservation_name` varchar(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `reserved_units` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `reservation_name`, `customer`, `product`, `reserved_units`, `status`) VALUES
(1, 'RESERVATION 1', 'Juan', 'LENOVO THINKPAD X260', 5, 'delivered'),
(2, 'RESERVATION 1', 'Joe', 'LENOVO THINKPAD L480', 5, 'cancelled'),
(3, 'Reservation 3', 'Jen', 'LENOVO THINKPAD E570', 2, 'delivered'),
(4, 'Reservation 4', 'Juan', 'LENOVO THINKPAD L570', 10, 'delivered'),
(5, 'Reservation 5', 'Juan dela Cruz', 'IDEAPAD SLIM 3I -15IAU7', 8, 'pending'),
(6, 'Reservation 6', 'Mark', 'IDEAPAD SLIM 3-15IAH8', 11, 'delivered');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
