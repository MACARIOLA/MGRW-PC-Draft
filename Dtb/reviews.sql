SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `reviews` (
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

ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;