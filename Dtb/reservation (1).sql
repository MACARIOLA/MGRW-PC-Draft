-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 02:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mgwrpcdtb`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Prod_categ` varchar(50) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `IDreservation` varchar(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `num` varchar(15) NOT NULL,
  `reserved_units` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`Prod_categ`, `Date`, `IDreservation`, `customer`, `product`, `email`, `num`, `reserved_units`, `status`) VALUES
('1', '2024-05-22 11:47:00', 'kJyUvL', 'gerad autentico', 'ATHLON 3000G', 'Ronnie@gmail.com', '09673703083', 3, 'Pending'),
('3', '2024-05-22 11:49:37', 'nsvKix', 'shhes sghee', 'RYZEN 5 4650G', 'johnrodhandsome@gmail.tite', '09555555555', 15, 'Pending'),
('2', '2024-05-22 11:50:48', 'YLXAzU', 'cxacascf ascascas', 'RYZEN 5 4600G', 'Ronnie@gmail.com', '09444444444', 1, 'Pending');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
