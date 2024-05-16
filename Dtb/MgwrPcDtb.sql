-- ------------------------------- --
-- -< CREATING MGWR PC DATABASE >- --

CREATE DATABASE IF NOT EXISTS MgwrPcDtb;
USE MgwrPcDtb;

-- -< CREATING MGWR PC DATABASE >- --
-- ------------------------------- --





-- ------------------------------- --
-- -----< CUSTOMER FEEDBACK >----- --

-- CUSTOMER FEEDBACKS --
CREATE TABLE `customer_feedbacks` (
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
  `window_shopper` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- -----< CUSTOMER FEEDBACK >----- --
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
    PdfID INT AUTO_INCREMENT PRIMARY KEY,
    FileName VARCHAR(255) NOT NULL,
    FilePath VARCHAR(255) NOT NULL,
    Description TEXT
);

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

ALTER TABLE `customer_product_reviews`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customer_product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;



-- SURVEY RESPONSES --
CREATE TABLE IF NOT EXISTS customer_survey_responses (
  submission_date timestamp NOT NULL DEFAULT current_timestamp(),
  id INT NOT NULL,
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


CREATE TABLE `admin_login_tbl` (
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `admin_login_tbl` (`admin_username`, `admin_password`) VALUES
('MGWRPCAdmin', 'Admin123');
COMMIT;

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `faqs` (`id`, `question`, `answer`) VALUES
(1, 'What payment methods do you accept?', 'We Accept Cash, Online Payment And Bank Transfer.\r\nFor Online Payment And Bank Transfer Please Use Official MGWR PC Bank Account:\r\n\r\nUnion Bank\r\nAccount Name: MGWR PC COMPUTER PARTS AND ACCESSORIES SHOP\r\nAccount Number: 0027-4001-3341\r\n\r\nBank of the Phili'),
(2, 'Do you offer financing options for purchasing computers?', 'We Accept Product Installment Via Home Credit And Credit Card.\r\n\r\nPreferred Bank For Credit Card Installment.\r\n•   Bank of the philippines Island\r\n•   HSCBC\r\n•   China Bank'),
(3, 'How Do I apply in Home Credit?', 'You Can Apply In Home Credit In Just Simple Way:\r\n\r\n•   Download \"My Home Credit App\" (Not compatible in IOS)\r\n•   Create an account and kindly fill up all required information\r\n•   Check if you are qualified for product loand by answering those necessary question.\r\n•   If you already finished those steps. Home credit will give you an offer for upto 60k product loand and together with your m Valid ID you can now go to our shop to process your loan.'),
(4, 'Are your products covered by warranty?', 'Yes\r\n');


ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;


CREATE TABLE `pc_pricelist_tbl` (
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `pc_pricelist_tbl` (`filename`, `filepath`) VALUES
('LAPTOP-CATALOG.pdf', 'uploads/LAPTOP-CATALOG.pdf');
COMMIT;



CREATE TABLE `laptop_pricelist_tbl` (
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `laptop_pricelist_tbl` (`filename`, `filepath`) VALUES
('LAPTOP-CATALOG.pdf', 'uploads/LAPTOP-CATALOG.pdf');
COMMIT;



CREATE TABLE `printer_pricelist_tbl` (
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;


CREATE TABLE `others_pricelist_tbl` (
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;




