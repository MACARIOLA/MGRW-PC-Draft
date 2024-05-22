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
(3, NULL);

ALTER TABLE `cms_home_promotions`
  ADD PRIMARY KEY (`ID`);
COMMIT;



-- ABOUT US --




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
(1, 'What payment methods do you accept?', 'We accept cash, online payment, and bank transfer. For online payment and bank transfer, please use the official MGWR PC bank account. For Union Bank, the account name is MGWR PC Computer Parts and Accessories Shop, and the account number is 0027-4001-3341. For Bank of the Philippine Islands, the account name is MGWR PC Computer Parts and Accessories Shop, and the account number is 0989-644-661.
'),
(2, 'Do you offer financing options for purchasing computers?', 'We accept product installment payments via Home Credit and credit card. The preferred banks for credit card installment are Bank of the Philippine Islands, HSBC, and China Bank.'),
(3, 'How Do I apply in Home Credit?', 'You can apply for Home Credit in a few simple steps. First, download the "My Home Credit" app (note that it is not compatible with iOS). Next, create an account and fill out all the required information. Then, check if you are qualified for a product loan by answering the necessary questions. Once you have completed these steps, Home Credit will offer you a product loan of up to 60,000 PHP. With this offer and your valid ID, you can visit our shop to process your loan.'),
(4, 'Are your products covered by warranty?', 'All MGWR PC products carry a standard one-year warranty, except for the following items: a one-month warranty applies to external batteries of laptops, bundled items (mouse, keyboards, speakers, etc.), and chargers/adapters. A one-week warranty applies to tables and chairs, generic fans, laptop coolers, heatsinks, LAN testers, power cords, and display cables. There is no warranty for consumables (ink, discs, etc.), software (OS, Office), accessories, promotional or sale items, freebies, and cables.');

ALTER TABLE `cms_faqs`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cms_faqs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

-- ------------< CMS >------------ --
-- ------------------------------- --





-- ------------------------------- --
-- ---------< INVENTORY >--------- --

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
