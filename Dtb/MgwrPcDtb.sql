-- ------------------------------- --
-- -< CREATING MGWR PC DATABASE >- --
CREATE DATABASE IF NOT EXISTS MgwrPcDtb;
USE MgwrPcDtb;

-- -< CREATING MGWR PC DATABASE >- --
-- ------------------------------- --





-- ------------------------------- --
-- ------------< CMS >------------ --

-- PROMOTIONS --
CREATE TABLE `cms_home-promotions` (
  `ID` int(2) NOT NULL,
  `PHOTO` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cms_home-promotions` (`ID`, `PHOTO`) VALUES
(1, NULL),
(2, NULL),
(3, NULL);

ALTER TABLE `cms_home-promotions`
  ADD PRIMARY KEY (`ID`);
COMMIT;



-- PDF FILES TABLE --
CREATE TABLE `cms_pricelist-pdfdownloads` (
    `PdfID` INT AUTO_INCREMENT PRIMARY KEY,
    `FileName` VARCHAR(255) NOT NULL,
    `FilePath` VARCHAR(255) NOT NULL,
    `Description` TEXT
);

-- ------------< CMS >------------ --
-- ------------------------------- --





-- ------------------------------- --
-- -----------< FORMS >----------- --

-- PRODUCT REVIEWS --
CREATE TABLE `customer-product-reviews` (
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text DEFAULT NULL,
  `rating` enum('5 Star','4 Star','3 Star','2 Star','1 Star') NOT NULL,
  `first_time_buyer` tinyint(1) DEFAULT 0,
  `regular_customer` tinyint(1) DEFAULT 0,
  `budget_shopper` tinyint(1) DEFAULT 0,
  `brand_loyalist` tinyint(1) DEFAULT 0,
  `gift_shopper` tinyint(1) DEFAULT 0,
  `not_interested` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `customer-product-reviews`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customer-product-reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;



-- SURVEY RESPONSES --
CREATE TABLE `customer-survey-responses` (
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `age` INT NULL,
  `experience` VARCHAR(255) NOT NULL,
  `liked_feature` VARCHAR(255) NOT NULL,
  `recommend` VARCHAR(255) NOT NULL,
  `sensible_part` VARCHAR(255) NOT NULL,
  `improvement_suggestion` VARCHAR(255) NOT NULL,
  `device_impact` VARCHAR(255) NOT NULL,
  `likelihood_of_return` VARCHAR(255) NOT NULL,
  `likelihood_of_purchase` VARCHAR(255) NOT NULL,
  `overall_performance` VARCHAR(255) NOT NULL,
  `comment` TEXT NOT NULL
);

ALTER TABLE `customer-survey-responses`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customer-survey-responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

-- -----------< FORMS >----------- --
-- ------------------------------- --














-- -------------------------- --
-- Reservation Contacts Table --
-- -------------------------- --
CREATE TABLE IF NOT EXISTS ReservationContactsTbl (
    ReservationID INT PRIMARY KEY,
    Name VARCHAR(255),
    Email VARCHAR(255),
    ContactNumber VARCHAR(11) CHECK (ContactNumber LIKE '09_________')
);
