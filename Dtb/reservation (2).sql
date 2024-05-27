-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 06:34 AM
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
('1', '2024-05-22 11:47:00', 'kJyUvL', 'gerad autentico', 'ATHLON 3000G', 'Ronnie@gmail.com', '09673703083', 3, 'Confirmed'),
('3', '2024-05-22 11:49:37', 'nsvKix', 'shhes sghee', 'RYZEN 5 4650G', 'johnrodhandsome@gmail.tite', '09555555555', 15, 'cancelled'),
('2', '2024-05-22 11:50:48', 'YLXAzU', 'cxacascf ascascas', 'RYZEN 5 4600G', 'Ronnie@gmail.com', '09444444444', 1, 'Confirmed'),
('1', '2024-05-25 20:54:00', 'rYcDTF', 'jessa macariola', 'ATHLON 3000G', 'macariola@gmail.com', '09777777777', 1, 'cancelled'),
('1', '2024-05-25 20:55:00', 'UaendI', 'vnew rodelas', 'ATHLON 3000G', 'rodelas@gmail.com', '09333333335', 1, 'cancelled'),
('1', '2024-05-25 20:55:22', 'qlNaEX', 'katrina ibias', 'ATHLON 3000G', 'katrinaibias@yahoo.com', '09222222222', 1, 'Pending'),
('1', '2024-05-26 17:56:57', 'UsHOjc', 'JOMAR CORDERO ads', 'ATHLON 3000G', 'hashas@gmail.com', '09397521094', 5, 'Confirmed');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
