-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 06:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
  `description` varchar(1000) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `total_units` int(11) NOT NULL,
  `reserved_units` int(11) NOT NULL,
  `specs_cpu` varchar(100) NOT NULL,
  `specs_motherboard` varchar(100) NOT NULL,
  `specs_ram` varchar(100) NOT NULL,
  `specs_ssd` varchar(100) NOT NULL,
  `specs_monitor` varchar(100) NOT NULL,
  `specs_computercase` varchar(100) NOT NULL,
  `specs_powersupply` varchar(100) NOT NULL,
  `specs_fan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `products_id`, `products_name`, `image`, `description`, `unit_price`, `total_units`, `reserved_units`, `specs_cpu`, `specs_motherboard`, `specs_ram`, `specs_ssd`, `specs_monitor`, `specs_computercase`, `specs_powersupply`, `specs_fan`) VALUES
(1, 'SULIT PC 1', 'ATHLON 3000G', '1.jpg', '\"SULIT PC 1\" presents a budget-friendly powerhouse with the ATHLON 3000G at its core. This compact yet capable system is designed to deliver impressive performance without breaking the bank. The ATHLON 3000G, with its dual-core processing prowess and integrated Radeon Vega graphics, ensures smooth multitasking and reliable gaming experiences for casual users and entry-level gamers alike.', 55, 5, 55, 'ATHLON 3000G', 'BIOSTAR A520M H 3.1 ', 'ADATA 8GB 3200 MHZ', 'ADATA SU650', 'VIEW PLUS MH-20 20\"', 'POWER LOGIC V2O0', 'POWERLOGIC 700W', ''),
(2, 'SULIT PC 2 ', 'RYZEN 5 4600G', '2.jpg', '\"SULIT PC 2\" embodies the epitome of performance and value, harnessing the formidable power of the Ryzen 5 4600G processor. This system is engineered to offer an exceptional computing experience, blending raw processing power with integrated Radeon graphics for seamless multitasking and immersive gaming.', 2452, 5, 53, 'RYZEN 5 4600G', 'BIOSTAR A52OM H3.1', 'ADATA 16GB 3200MHZ', 'KINGSTON 480GB SATA', 'HKC 24\" IPS FHD 75HZ', 'YGT M3 BLACK', 'AEROCOOL 500W 80+', ''),
(3, 'SULIT PC 3', 'RYZEN 5 4650G', '3.jpg', '\r\n\"SULIT PC 3\" represents the pinnacle of performance and efficiency, driven by the formidable Ryzen 5 4650G processor. This system is meticulously engineered to provide an unparalleled computing experience, blending cutting-edge processing power with integrated Radeon graphics for seamless multitasking, content creation, and gaming.', 3564, 5, 53, 'RYZEN 5 4650G', 'BIOSTAR A520M H 3.1', 'ADATA 16GB 3200MHZ ', 'KINGSTON 480GB SATA ', 'HKC 24\" IPS FHD 75HZ', 'DARK FLASH DK 150 BLACK', 'AEROCOOL 500W 80+', ''),
(4, 'SULIT PC 4', 'RYZEN 5 5600G', '4.jpg', '\"SULIT PC 4\" exemplifies the perfect fusion of high-performance computing and affordability, powered by the formidable Ryzen 5 5600G processor. This system is meticulously crafted to deliver an exceptional computing experience, blending cutting-edge processing power with integrated Radeon graphics for seamless multitasking, content creation, and gaming.', 25, 5, 53, 'RYZEN 5 5600G', 'BIOSTAR A520M H 3.1', 'ADATA 16GB 3200MHZ', 'KINGSTON 480GB SATA', 'HKC 24\" IPS FHD 75HZ ', 'COOLMAN RUBY BLACK', 'AEROCOOL 500W 80+', ''),
(5, 'SULIT PC 5', 'RYZEN 5 5600G', '5.jpg', '\"SULIT PC 5\" represents a pinnacle in affordable high-performance computing, propelled by the Ryzen 5 5600G processor. Meticulously designed to offer an exceptional computing experience, this system seamlessly integrates cutting-edge processing power with Radeon graphics, ensuring fluid multitasking, content creation, and gaming.\r\n\r\nThe Ryzen 5 5600G serves as the beating heart of SULIT PC 5, unleashing six cores and twelve threads of processing might. Whether you\'re tackling demanding workloads, editing high-resolution content, or indulging in immersive gaming sessions, this processor ensures lightning-fast performance without the need for a discrete GPU.', 5, 5, 5, 'SULIT PC 5', 'MSI B450M PRO VDH MAX', 'T-FORCE RGB 16GB 2X8', 'KINGSTON NV2 1TB', 'HKC 24\" IPS FHD 75HZ', 'DARKFLASH DK 352 PLUS', 'AEROCOOL 500W 80+', ''),
(6, 'SULIT PC 6', 'RYZEN 5 5700G', '6.jpg', '\"SULIT PC 6\" epitomizes the perfect blend of performance and affordability, driven by the formidable Ryzen 5 5600G processor. This system is meticulously engineered to provide an exceptional computing experience, seamlessly integrating cutting-edge processing power with Radeon graphics to deliver smooth multitasking, content creation, and gaming.', 6, 5, 6, 'RYZEN 5 5700G', 'MSI 540M PRO VDH MAX', 'T-FORCE RGB 16GB 2X8', 'KINGSTON NV2 500GB', 'HKC 24\" IPS FHD 75HZ', 'COOLMAN REYNA BLACK ', 'AEROCOOL 500W 80+', 'COOLMAN CM03 3IN1'),
(7, 'SULIT PC 7', 'RYZEN 5 5700G', '7.jpg', 'Processor: Intel Core i5 6300U RAM: 8GB RAM SSD: 256GB GPU: Intel HD Graphics 620 Screen Size: 12.5', 5, 5, 7, 'RYZEN 5 5700G', 'MSI B550M PRO VDH WIFI ', 'T-FORCE RGB 16GB 2X8', 'KINGSTON NV2 1TB', 'HKC 24\" IPS FHD 75HZ', 'DARK FLASH DS900 AIR', 'AEROCOOL 500W 80+', 'COOLMAN CM03 6PCS');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
