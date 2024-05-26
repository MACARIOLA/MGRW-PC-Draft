CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `company_info` varchar(1000) DEFAULT NULL,
  `image` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `about_us` (`id`, `company_info`, `image`) VALUES
(1, 'As a dynamic and innovative organization, we focus on providing the best computer and building a long-term relationship with our valued clients.\r\n\r\nAt MGWR PC, we are dedicated with passion to excellence and commitment in delivering premium solutions to meet your specific needs. Our dedicated team works diligently to ensure your satisfaction and success.', Null);


ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
