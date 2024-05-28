



CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `products_id` varchar(50) NOT NULL,
  `products_name` varchar(50) NOT NULL,
  `image` longblob DEFAULT NULL,
  `description` varchar(1000) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `total_units` int(11) NOT NULL,
  `reserved_units` int(11) NOT NULL,
  `specs_cpu` varchar(100) NOT NULL,
  `specs_motherboard` varchar(100) NOT NULL,
  `specs_ram` varchar(100) NOT NULL,
  `specs_ssd` varchar(100) NOT NULL,
  `specs_monitor` varchar(100) NOT NULL,
  `specs_computercase` varchar(100) NOT NULL,
  `specs_powersupply` varchar(100) NOT NULL,
  `specs_fan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



INSERT INTO `inventory` (`id`, `products_id`, `products_name`, `image`, `description`, `unit_price`, `total_units`, `reserved_units`, `specs_cpu`, `specs_motherboard`, `specs_ram`, `specs_ssd`, `specs_monitor`, `specs_computercase`, `specs_powersupply`, `specs_fan`) VALUES
(1, 'SULIT PC 1', 'ATHLON 3000G', NULL, 'Maangas na Computer', 13990, 5, 0, 'ATHLON 3000G', 'BIOSTAR A520M H 3.1', 'ADATA 8GB 3200MHZ', 'ADATA SU650 256GB SATA', 'VIEWPLUS MH-20 20\"', 'POWER LOGIC V200', 'POWERLOGIC 700W', 'Not Included');
INSERT INTO `inventory` (`id`, `products_id`, `products_name`, `image`, `description`, `unit_price`, `total_units`, `reserved_units`, `specs_cpu`, `specs_motherboard`, `specs_ram`, `specs_ssd`, `specs_monitor`, `specs_computercase`, `specs_powersupply`, `specs_fan`) VALUES
(2, 'SULIT PC 2', 'RYZEN 5 4600G', NULL, 'SULIT PC 2 NA MAANGAS', 21990, 5, 0, 'RYZEN 5 4600G', 'BIOSTAR A520M H 3.1', 'ADATA 16GB 3200MHZ', 'KINGSTON 480GB SATA', 'HKC 24\" IPS FHD 75HZ', 'YGT M3 BLACK', 'AEROCOOL 500W 80+', 'Not Included');
INSERT INTO `inventory` (`id`, `products_id`, `products_name`, `image`, `description`, `unit_price`, `total_units`, `reserved_units`, `specs_cpu`, `specs_motherboard`, `specs_ram`, `specs_ssd`, `specs_monitor`, `specs_computercase`, `specs_powersupply`, `specs_fan`) VALUES
(3, 'SULIT PC 3', 'RYZEN 5 4650G', NULL, 'PC 3 NA MAANGAS', 22990, 5, 0, 'RYZEN 5 4650G', 'BIOSTAR A520M H 3.1', 'ADATA 16GB 3200MHZ', 'KINGSTON 480GB SATA', 'HKC 24\" IPS FHD 75HZ', 'DARKFLASH DK 150 BLACK', 'AEROCOOL 500W 80+', 'Not Included');
INSERT INTO `inventory` (`id`, `products_id`, `products_name`, `image`, `description`, `unit_price`, `total_units`, `reserved_units`, `specs_cpu`, `specs_motherboard`, `specs_ram`, `specs_ssd`, `specs_monitor`, `specs_computercase`, `specs_powersupply`, `specs_fan`) VALUES
(4, 'SULIT PC 4', 'RYZEN 5 5600G', NULL, 'PC 4 NA MAANGAS', 23990, 5, 0, 'RYZEN 5 5600G', 'BIOSTAR A520M H 3.1', 'ADATA 16GB 3200MHZ', 'KINGSTON 480GB SATA', 'HKC 24\" IPS FHD 75HZ', 'COOLMAN RUBY BLACK', 'AEROCOOL 500W 80+', 'Not Included');
INSERT INTO `inventory` (`id`, `products_id`, `products_name`, `image`, `description`, `unit_price`, `total_units`, `reserved_units`, `specs_cpu`, `specs_motherboard`, `specs_ram`, `specs_ssd`, `specs_monitor`, `specs_computercase`, `specs_powersupply`, `specs_fan`) VALUES
(5, 'SULIT PC 5', 'RYZEN 5 5600G', NULL, 'PC 5 NA MAANGAS', 26990, 5, 0, 'RYZEN 5 5600G', 'MSI B450M PRO VDH MAX', 'T-FORCE RGB 16GB 2X8', 'KINGSTON NV2 1TB', 'HKC 24\" IPS FHD 75HZ', 'DARKFLASH DK 352 PLUS', 'AEROCOOL 500W 80+', 'Not Included');
INSERT INTO `inventory` (`id`, `products_id`, `products_name`, `image`, `description`, `unit_price`, `total_units`, `reserved_units`, `specs_cpu`, `specs_motherboard`, `specs_ram`, `specs_ssd`, `specs_monitor`, `specs_computercase`, `specs_powersupply`, `specs_fan`) VALUES
(6, 'SULIT PC 6', 'RYZEN 7 5700G', NULL, 'MAANGAS NA PC 6', 28990, 5, 0, 'RYZEN 7 5700G', 'MSI B450M PRO VDH MAX', 'T-FORCE RGB 16GB 2X8', 'KINGSTON NV2 500GB', 'HKC 24\" IPS FHD 75HZ', 'COOLMAN REYNA BLACK', 'AEROCOOL 500W 80+', 'COOLMAN CM03 3IN1');
INSERT INTO `inventory` (`id`, `products_id`, `products_name`, `image`, `description`, `unit_price`, `total_units`, `reserved_units`, `specs_cpu`, `specs_motherboard`, `specs_ram`, `specs_ssd`, `specs_monitor`, `specs_computercase`, `specs_powersupply`, `specs_fan`) VALUES
(7, 'SULIT PC 7', 'RYZEN 7 5700G', NULL, 'MAANGAS NA PC 7', 33990, 5, 0, 'RYZEN 7 5700G', 'MSI B550M PRO VDH WIFI', 'T-FORCE RGB 16GB 2X8', 'KINGSTON NV2 1TB', 'HKC 24\" IPS FHD 75HZ', 'DARKFLASH DS900 AIR', 'AEROCOOL 500W 80+', 'COOLMAN CM03 6PCS');
INSERT INTO `inventory` (`id`, `products_id`, `products_name`, `image`, `description`, `unit_price`, `total_units`, `reserved_units`, `specs_cpu`, `specs_motherboard`, `specs_ram`, `specs_ssd`, `specs_monitor`, `specs_computercase`, `specs_powersupply`, `specs_fan`) VALUES
(8, 'SULIT LAPTOP 1', 'LENOVO THINKPAD X250 USED', '', 'MAANGAS NA LAPTOP 1', 10990, 5, 0, 'INTEL CORE I5 6TH GEN', 'Not Included', '8GB RAM', '256 GB SSD', '12\" SCREEN', 'Not Included', 'Not Included', 'Not Included'),
(9, 'SULIT LAPTOP 2', 'LENOVO THINKPAD L580 USED', '', 'MAANGAS NA LAPTOP 2', 11200, 5, 0, 'INTEL CORE I3 8TH GEN', 'Not Included', '8GB RAM', '256 GB SSD', '15.6\" SCREEN', 'Not Included', 'Not Included', 'Not Included'),
(10, 'SULIT LAPTOP 3', 'LENOVO THINKPAD L480 USED', '', 'MAANGAS NA LAPTOP 3', 11200, 5, 0, 'INTEL CORE I3 8TH GEN', 'Not Included', '8GB RAM', '256 GB SSD', '14\" SCREEN', 'Not Included', 'Not Included', 'Not Included'),
(11, 'SULIT LAPTOP 4', 'LENOVO THINKPAD E570 USED', '', 'MAANGAS NA LAPTOP 4', 11990, 5, 0, 'INTEL CORE I5 7TH GEN', 'Not Included', '8GB RAM', '256 GB SSD', '15.6\\\" SCREEN', 'Not Included', 'Not Included', 'Not Included'),
(12, 'SULIT PRINTER 1', 'L121 PRINTER', '', 'MAANGAS NA PRINTER 1', 5595, 5, 0, 'Not Included', 'Not Included', 'Not Included', 'Not Included', 'Not Included', 'Not Included', 'Not Included', 'Not Included'),
(13, 'SULIT PRINTER 2', 'L3210 3IN1 PRINTER', '', 'MAANGAS NA PRINTER 2', 8795, 5, 0, 'Not Included', 'Not Included', 'Not Included', 'Not Included', 'Not Included', 'Not Included', 'Not Included', 'Not Included'),
(14, 'SULIT PRINTER 3', 'L3250 4IN1 PRINTER', '', 'MAANGAS NA PRINTER 3', 10225, 5, 0, 'Not Included', 'Not Included', 'Not Included', 'Not Included', 'Not Included', 'Not Included', 'Not Included', 'Not Included'),
(15, 'SULIT PRINTER 4', 'L5290 4IN1 PRINTER', '', 'MAANGAS NA PRINTER 4', 13495, 5, 0, 'Not Included', 'Not Included', 'Not Included', 'Not Included', 'Not Included', 'Not Included', 'Not Included', 'Not Included');


ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;


