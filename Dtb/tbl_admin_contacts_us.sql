CREATE TABLE `tbl_admin_contacts_us` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `tbl_admin_contacts_us` (`id`, `customer_name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Katrina Ibias', 'katrinaibias17@gmail.com', 'asdefrgt', 'gsb htrjwryvhqarere', '2024-05-18 23:00:14'),
(2, 'Katrina Ibias', 'katrinaibias17@gmail.com', 'asdefrgt', 'gsb htrjwryvhqarere', '2024-05-18 23:00:23'),
(3, 'Katrina Ibias', 'katrinaibias17@gmail.com', 'asdefrgt', 'gsb htrjwryvhqarere', '2024-05-18 23:08:09'),
(4, 'Katrina Ibias', 'katrinaibias17@yahoo.com', 'rjhgbwvkerg', 'rgvune[mghpcqpw', '2024-05-18 23:27:19'),
(5, 'Katrina Ibias', 'katrinaibias17@gmail.com', 'rkthgwntve/5tuphe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque justo lacus, condimentum ut enim molestie, viverra molestie urna. Duis ac enim ornare, facilisis massa id, sagittis dolor. Vivamus euismod felis a mattis egestas. Etiam risus nisl, placerat ut vulputate ut, volutpat et diam. ', '2024-05-19 00:15:57'),
(6, 'Katrina Ibias', 'katrinaibias17@gmail.com', 'duhfbgweunyg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque justo lacus, condimentum ut enim molestie, viverra molestie urna. Duis ac enim ornare, facilisis massa id, sagittis dolor. Vivamus euismod felis a mattis egestas. Etiam risus nisl, placerat ut vulputate ut, volutpat et diam. ', '2024-05-19 01:35:05'),
(7, 'Katrina Ibias', 'katrinaibias17@gmail.com', 'rjhgbwvkerg', 'ZSeXRCTVYBNUNM,OIO', '2024-05-19 01:52:20');

ALTER TABLE `tbl_admin_contacts_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

