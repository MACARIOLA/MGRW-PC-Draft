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

CREATE TABLE `admin_login` (
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
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



-- PDF FILES TABLE --
CREATE TABLE IF NOT EXISTS cms_pricelist_pdfdownloads (
  PdfID INT,
  FileName VARCHAR(255) NOT NULL,
  FilePath VARCHAR(255) NOT NULL,
  Description TEXT
);

ALTER TABLE `cms_pricelist_pdfdownloads`
  ADD PRIMARY KEY (`PdfID`);

ALTER TABLE `cms_pricelist_pdfdownloads`
  MODIFY `PdfID` int(11) NOT NULL AUTO_INCREMENT;
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
