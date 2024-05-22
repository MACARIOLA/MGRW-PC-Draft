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
(3, 'How Do I apply in Home Credit?', 'You Can Apply In Home Credit In Just Simple Way:\r\n\r\n•   Download "My Home Credit App" (Not compatible in iOS)\r\n•   Create an account and kindly fill up all required information\r\n•   Check if you are qualified for product loan by answering those necessary questions.\r\n•   If you already finished those steps, Home Credit will give you an offer for up to 60k product loan and together with your valid ID you can now go to our shop to process your loan.'),
(4, 'Are your products covered by warranty?', 'All MGWR PC Products Carry A Standard One (1) Year Warranty Except Of The Following:\r\n\r\nOne Month Warranty Applies Only For:\r\n•   External batteries of Laptops\r\n•   Bundled Items (mouse, keyboards, speakers, etc.)\r\n•   Chargers, Adaptors\r\n\r\nOne Week Warranty Applies Only For:\r\n•   Tables and Chairs\r\n•   Generic Fans, Laptop coolers, Heatsink, LAN tester\r\n•   Powercord, Display Cables\r\n\r\nThere Is No Warranty For:\r\n•   Consumables (ink, disc, etc)\r\n•   Software (OS, Office)\r\n•   Accessories, promotional/sale items, freebies, cables');

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
