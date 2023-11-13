-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2023 at 09:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int NOT NULL,
  `product_code` varchar(20) DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `description` text,
  `price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `unit` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'PCS' COMMENT 'satuan',
  `discount_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `stock` int NOT NULL DEFAULT '0' COMMENT 'stock',
  `image` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci COMMENT 'gambar dari product'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `product_code`, `is_active`, `created_at`, `updated_at`, `created_by`, `updated_by`, `description`, `price`, `unit`, `discount_amount`, `stock`, `image`) VALUES
(1, 'Sepatu lari', 1, 'P0001', '1', '2023-10-11 06:33:07', '2023-11-13 07:54:44', NULL, NULL, 'Sangat cocok digunakan untuk berolahraga', '375000.00', 'PCS', '0.00', 15, '1699862083_653f25f395f5b.jpg'),
(4, 'Jaket Bomber', 2, 'JK0003', '1', '2023-10-14 02:44:18', '2023-11-13 07:55:36', NULL, NULL, 'Sangat cocok digunakan untuk musim dingin', '175000.00', 'PCS', '0.00', 35, '1699862136_jaket-bomber.jpg'),
(6, 'Kemeja Ciangi Sanghai', 4, 'KMJ004', '1', '2023-10-14 02:53:57', '2023-11-13 07:56:16', NULL, NULL, 'Sangat Cocok untuk bepergian ataupun bergaya dengan style casual', '75000.00', 'PCS', '0.00', 5, '1699862176_kemeja-ciangi-sanghai.jpg'),
(16, 'Kaos Sablon Pantai', 2, 'KS890', '1', '2023-10-17 01:37:08', '2023-11-13 07:56:47', NULL, NULL, 'Sangat cocok digunakan untuk sehari hari', '15000.00', 'PCS', '0.00', 100, '1699862207_Kaos-sablon.jpg'),
(17, 'Jaket Fleece', 2, 'JKT789', '1', '2023-10-17 12:20:51', '2023-11-13 07:57:27', NULL, NULL, 'Sangat cocok digunakan untuk musim dingin', '275000.00', 'PCS', '0.00', 150, '1699862247_jaket-fleece.jpg'),
(18, 'Sweater Polos', 2, 'SW005', '1', '2023-10-17 13:59:35', '2023-11-13 07:57:57', NULL, NULL, 'Sangat cocok digunakan untuk sehari hari maupun musim dingin', '45000.00', 'PCS', '0.00', 50, '1699862277_basic-sweater.jpg'),
(21, 'Kemeja Zora', 4, 'KMZ890', '1', '2023-10-17 14:10:10', '2023-11-13 07:58:28', NULL, NULL, 'Sangat Cocok untuk bepergian ataupun bergaya dengan style casual', '55000.00', 'PCS', '0.00', 78, '1699862307_kemeja-zora.jpg'),
(28, 'Kardigan Rajut', 2, 'KRD867', '1', '2023-10-18 00:12:45', '2023-11-13 07:59:02', NULL, NULL, 'Outer ini dibuat dengan bahan wol sangat cocok untuk musim dingin', '55000.00', 'PCS', '0.00', 34, '1699862342_kardigan-rajut.jpg'),
(29, 'Kalung Emas dan Perak', 3, 'KLG045', '1', '2023-10-18 06:13:30', '2023-11-13 07:59:47', NULL, NULL, 'Kalung ini sangat cantik. Dan sangat cocok bila dipadukan dengan style apapun.', '950000.00', 'PCS', '30.00', 5, '1699862386_653f147c54a72.jpg'),
(32, 'Jersey Custom', 1, 'JSY009', '1', '2023-10-20 07:38:01', '2023-11-13 08:00:26', NULL, NULL, 'Jersey ini terbuat dari bahan yang mudah menyerap keringat jadi sangat cocok digunakan ketika berolahraga.', '325000.00', 'PCS', '20.00', 10, '1699862426_653f25f392727.jpg'),
(33, 'Sendal Selop Karet', 2, 'SND244', '1', '2023-10-20 07:50:51', '2023-11-13 08:00:58', NULL, NULL, 'Sendal ini terbuat dari bahan karet. Bahan karet menjadikan sandal tidak licin dan anti selip', '25000.00', 'PCS', '0.00', 50, '1699862458_653f14ade16b1.jpg'),
(34, 'Cincin Perak', 3, 'CN678', '1', '2023-10-20 07:52:42', '2023-11-13 08:01:34', NULL, NULL, 'Terbuat dari bahan perak dan anti luntur', '675000.00', 'PCS', '0.00', 35, '1699862494_653f14dcc524c.jpg'),
(35, 'Jas Kantor Wanita', 4, 'JSK345', '1', '2023-10-20 07:57:36', '2023-11-13 08:02:08', NULL, NULL, 'Terbuat dari bahan yang terbaik dan sangat cocok untuk digunakan saat bekerja', '255000.00', 'PCS', '0.00', 25, '1699862528_653f14f508de8.jpg'),
(68, 'Skipping', 1, 'SKP6789', '1', '2023-11-13 08:03:31', NULL, NULL, NULL, 'Skipping Tali untuk lompat tali', '35000.00', 'PCS', '0.00', 15, '1699862611_653f25f394655.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_UN` (`product_code`),
  ADD KEY `products_FK` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_FK` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
