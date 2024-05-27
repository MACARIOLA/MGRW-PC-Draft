-- ------------------------------- --
-- -< CREATING MGWR PC DATABASE >- --

CREATE DATABASE IF NOT EXISTS MgwrPcDtb;
USE MgwrPcDtb;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- -< CREATING MGWR PC DATABASE >- --
-- ------------------------------- --





-- ------------------------------- --
-- -----------< LOGIN >----------- --

CREATE TABLE IF NOT EXISTS admin_login (
  admin_username varchar(255) NOT NULL,
  admin_password varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `admin_login` (`admin_username`, `admin_password`) VALUES
('MGWRPCAdmin', 'Admin123');
COMMIT;

-- -----------< LOGIN >----------- --
-- ------------------------------- --





-- ------------------------------- --
-- ------------< CMS >------------ --

-- PROMOTIONS --
CREATE TABLE IF NOT EXISTS cms_home_promotions (
  ID int(2) NOT NULL,
  PHOTO longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cms_home_promotions` (`ID`, `PHOTO`) VALUES
(1, NULL),
(2, NULL),
(3, NULL),
(4, NULL),
(5, NULL);

ALTER TABLE `cms_home_promotions`
  ADD PRIMARY KEY (`ID`);
COMMIT;



-- ABOUT US --
CREATE TABLE IF NOT EXISTS cms_about_us (
  id int(11) NOT NULL,
  company_info varchar(1000) DEFAULT NULL,
  image longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cms_about_us` (`id`, `company_info`, `image`) VALUES
(1, 'As a dynamic and innovative organization, we focus on providing the best computer and building a long-term relationship with our valued clients.\r\n\r\nAt MGWR PC, we are dedicated with passion to excellence and commitment in delivering premium solutions to meet your specific needs. Our dedicated team works diligently to ensure your satisfaction and success.', Null);

ALTER TABLE `cms_about_us`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cms_about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;



-- PRICELIST --
CREATE TABLE IF NOT EXISTS cms_pricelist_pc (
  filename varchar(255) NOT NULL,
  filepath varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS cms_pricelist_laptop (
  filename varchar(255) NOT NULL,
  filepath varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS cms_pricelist_printer (
  filename varchar(255) NOT NULL,
  filepath varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS cms_pricelist_others (
  filename varchar(255) NOT NULL,
  filepath varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- FAQS --
CREATE TABLE IF NOT EXISTS cms_faqs (
  id int NOT NULL,
  question varchar(1000) NOT NULL,
  answer varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cms_faqs` (`id`, `question`, `answer`) VALUES
(1, 'What payment methods do you accept?', 'We Accept Cash, Online Payment And Bank Transfer.\r\nFor Online Payment And Bank Transfer Please Use Official MGWR PC Bank Account:\r\n\r\nUnion Bank\r\nAccount Name: MGWR PC COMPUTER PARTS AND ACCESSORIES SHOP\r\nAccount Number: 0027-4001-3341\r\n\r\nBank of the Philippines Island\r\nAccount Name: MGWR PC COMPUTER PARTS AND ACCESSORIES SHOP\r\nAccount Number: 0989-644-661'),
(2, 'Do you offer financing options for purchasing computers?', 'We Accept Product Installment Via Home Credit And Credit Card.\r\n\r\nPreferred Bank For Credit Card Installment.\r\n•   Bank of the philippines Island\r\n•   HSCBC\r\n•   China Bank'),
(3, 'How Do I apply in Home Credit?', 'You Can Apply In Home Credit In Just Simple Way:\r\n\r\n•   Download \"My Home Credit App\" (Not compatible in IOS)\r\n•   Create an account and kindly fill up all required information\r\n•   Check if you are qualified for product loand by answering those necessary question.\r\n•   If you already finished those steps. Home credit will give you an offer for upto 60k product loand and together with your m Valid ID you can now go to our shop to process your loan.'),
(4, 'Are your products covered by warranty?', 'All MGWR PC Products Carry A Standard One (1) Year Warranty Except Of The Following:\r\n\r\nOne Month Warranty Applies Only For:\r\n•   External batteries of Laptops\r\n•   Bundled Items ( mouse, keyboards, speacker,etc.)\r\n•   Chargers, Adaptors\r\n\r\nOne Week Warranty Applies Only For:\r\n•   Tables and Chairs\r\n•   Generic Fans,Laptop coolers,Heatsink, LAN tester\r\n•   Powercord , Display Cables\r\n\r\nThere Is No Warranty For:\r\n•   Consumables (ink,disc, etc)\r\n•   Software ( OS, Office)\r\n•   Acessories, promotional/sale items, freebies,cables');

ALTER TABLE `cms_faqs`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cms_faqs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

-- ------------< CMS >------------ --
-- ------------------------------- --





-- ------------------------------- --
-- ---------< INVENTORY >--------- --

-- INVENTORY --
CREATE TABLE IF NOT EXISTS inventory (
  id int(11) NOT NULL,
  products_id varchar(50) NOT NULL,
  products_name varchar(50) NOT NULL,
  image longblob DEFAULT NULL,
  description varchar(1000) NOT NULL,
  unit_price int(11) NOT NULL,
  total_units int(11) NOT NULL,
  reserved_units int(11) NOT NULL,
  specs_cpu varchar(100) NOT NULL,
  specs_motherboard varchar(100) NOT NULL,
  specs_ram varchar(100) NOT NULL,
  specs_ssd varchar(100) NOT NULL,
  specs_monitor varchar(100) NOT NULL,
  specs_computercase varchar(100) NOT NULL,
  specs_powersupply varchar(100) NOT NULL,
  specs_fan varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;



-- RESERVATION --
CREATE TABLE IF NOT EXISTS reservation (
  Prod_categ varchar(50) NOT NULL,
  Date varchar(50) NOT NULL,
  IDreservation varchar(50) NOT NULL,
  customer varchar(50) NOT NULL,
  product varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  num varchar(15) NOT NULL,
  reserved_units int(11) NOT NULL,
  status varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ---------< INVENTORY >--------- --
-- ------------------------------- --





-- ------------------------------- --
-- -----------< FORMS >----------- --

-- PRODUCT REVIEWS --
CREATE TABLE IF NOT EXISTS customer_product_reviews (
  submission_date timestamp NOT NULL DEFAULT current_timestamp(),
  id int(11),
  name varchar(255) NOT NULL,
  comment text DEFAULT NULL,
  rating enum('5 Star','4 Star','3 Star','2 Star','1 Star') NOT NULL,
  first_time_buyer tinyint(1) DEFAULT 0,
  regular_customer tinyint(1) DEFAULT 0,
  budget_shopper tinyint(1) DEFAULT 0,
  brand_loyalist tinyint(1) DEFAULT 0,
  gift_shopper tinyint(1) DEFAULT 0,
  window_shopper tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `customer_product_reviews`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customer_product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;



-- SURVEY RESPONSES --
CREATE TABLE IF NOT EXISTS customer_survey_responses (
  submission_date timestamp NOT NULL DEFAULT current_timestamp(),
  id INT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  age INT NULL,
  experience VARCHAR(255) NOT NULL,
  liked_feature VARCHAR(255) NOT NULL,
  recommend VARCHAR(255) NOT NULL,
  sensible_part VARCHAR(255) NOT NULL,
  improvement_suggestion VARCHAR(255) NOT NULL,
  device_impact VARCHAR(255) NOT NULL,
  likelihood_of_return VARCHAR(255) NOT NULL,
  likelihood_of_purchase VARCHAR(255) NOT NULL,
  overall_performance VARCHAR(255) NOT NULL,
  comment TEXT NOT NULL
);

ALTER TABLE `customer_survey_responses`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customer_survey_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;



-- CUSTOMER FEEDBACKS --
CREATE TABLE IF NOT EXISTS customer_feedbacks (
  submission_date timestamp NOT NULL DEFAULT current_timestamp(),
  id int(11) NOT NULL,
  name varchar(255) NOT NULL,
  comment text DEFAULT NULL,
  rating enum('5 Star','4 Star','3 Star','2 Star','1 Star') NOT NULL,
  first_time_buyer tinyint(1) DEFAULT 0,
  regular_customer tinyint(1) DEFAULT 0,
  budget_shopper tinyint(1) DEFAULT 0,
  brand_loyalist tinyint(1) DEFAULT 0,
  gift_shopper tinyint(1) DEFAULT 0,
  window_shopper tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- -----------< FORMS >----------- --
-- ------------------------------- --





-- ------------------------------- --
-- -----------< INBOX >----------- --

-- CONTACTS TABLE --
CREATE TABLE IF NOT EXISTS admin_contact_us (
  id int(11),
  customer_name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  subject varchar(255) DEFAULT NULL,
  message text DEFAULT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `admin_contact_us`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `admin_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

-- -----------< INBOX >----------- --
-- ------------------------------- --
