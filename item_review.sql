-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 02:00 AM
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
-- Table structure for table `item_review`
--

CREATE TABLE `item_review` (
  `name` text NOT NULL,
  `comment` text NOT NULL,
  `radio1` varchar(100) NOT NULL,
  `checkbox1` varchar(100) NOT NULL,
  `checkbox2` varchar(100) NOT NULL,
  `checkbox3` varchar(100) NOT NULL,
  `checkbox4` varchar(100) NOT NULL,
  `checkbox5` varchar(100) NOT NULL,
  `checkbox6` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_review`
--

INSERT INTO `item_review` (`name`, `comment`, `radio1`, `checkbox1`, `checkbox2`, `checkbox3`, `checkbox4`, `checkbox5`, `checkbox6`) VALUES
('Katrina Ibias', 'ayaw ko na', '3 Star', '0', '0', '1', '0', '0', '0'),
('gerald', 'ayaw kona', '4 Star', '0', '1', '0', '0', '0', '0'),
('Katrina Ibias', 'wraaaaaaaaaaa!', '5 Star', '1', '0', '0', '0', '0', '0'),
('God tangsen tiger', 'nakakapagod', '5 Star', '1', '0', '0', '0', '0', '0'),
('Katrina Ibias', 'huhuuhuhu', '4 Star', '0', '0', '1', '0', '0', '0'),
('God tangsen tiger', 'putanginaaaaa!', '3 Star', '0', '1', '0', '0', '0', '0'),
('Katrina Ibias', 'ugh! sakit sa ulo!', '2 Star', '0', '0', '0', '0', '0', '1'),
('God jangsan tiger', 'huhuhuu', '5 Star', '1', '0', '0', '0', '0', '0'),
('gerald', 'malapit na huhu', '5 Star', '1', '0', '0', '0', '0', '0'),
('kc', 'takte huhuhu', '3 Star', '0', '0', '0', '1', '0', '0'),
('gerald', 'gergiperg[qie', '2 Star', '0', '0', '0', '0', '1', '0'),
('gerald', 'asdfghjkl', '5 Star', '1', '0', '0', '0', '0', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
