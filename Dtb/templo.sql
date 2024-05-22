-- ------------------------------- --
-- -< CREATING MGWR PC DATABASE >- --

CREATE DATABASE IF NOT EXISTS MgwrPcDtb;
USE MgwrPcDtb;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- -< CREATING MGWR PC DATABASE >- --
-- ------------------------------- --

--
-- Table structure for table `cms_pricelist_laptop`
--

CREATE TABLE `cms_pricelist_laptop` (
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_pricelist_others`
--

CREATE TABLE `cms_pricelist_others` (
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_pricelist_pc`
--

CREATE TABLE `cms_pricelist_pc` (
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_pricelist_printer`
--

CREATE TABLE `cms_pricelist_printer` (
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_faqs`
--

CREATE TABLE `cms_faqs` (
  `id` int NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_faqs`
--

INSERT INTO `cms_faqs` (`id`, `question`, `answer`) VALUES
(1, 'What payment methods do you accept?', 'We accept cash, online payment, and bank transfer. For online payment and bank transfer, please use the official MGWR PC bank account. For Union Bank, the account name is MGWR PC Computer Parts and Accessories Shop, and the account number is 0027-4001-3341. For Bank of the Philippine Islands, the account name is MGWR PC Computer Parts and Accessories Shop, and the account number is 0989-644-661.'),
(2, 'Do you offer financing options for purchasing computers?', 'We accept product installment payments via Home Credit and credit card. The preferred banks for credit card installment are Bank of the Philippine Islands, HSBC, and China Bank.'),
(3, 'How Do I apply in Home Credit?', 'You can apply for Home Credit in a few simple steps. First, download the "My Home Credit" app (note that it is not compatible with iOS). Next, create an account and fill out all the required information. Then, check if you are qualified for a product loan by answering the necessary questions. Once you have completed these steps, Home Credit will offer you a product loan of up to 60,000 PHP. With this offer and your valid ID, you can visit our shop to process your loan.'),
(4, 'Are your products covered by warranty?', 'All MGWR PC products carry a standard one-year warranty, except for the following items: a one-month warranty applies to external batteries of laptops, bundled items (mouse, keyboards, speakers, etc.), and chargers/adapters. A one-week warranty applies to tables and chairs, generic fans, laptop coolers, heatsinks, LAN testers, power cords, and display cables. There is no warranty for consumables (ink, discs, etc.), software (OS, Office), accessories, promotional or sale items, freebies, and cables.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_faqs`
--
ALTER TABLE `cms_faqs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_faqs`
--
ALTER TABLE `cms_faqs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

COMMIT;
