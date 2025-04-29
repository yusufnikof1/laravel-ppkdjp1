-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2025 at 10:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tailwind-point-of-sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `category_id` int(50) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_photo` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `quantity` int(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_photo`, `product_price`, `quantity`, `product_description`, `is_active`, `created_at`, `updated_at`) VALUES
(8, 1, 'Beef Burger', '680edc61322a7_beef-burger.png', 25000.00, 98, 'Burger dengan daging sapi lezat', 1, NULL, NULL),
(9, 1, 'Mie Goreng', '680ee13baea02_indomie-goreng-white_1_480x480.jpg', 10000.00, 96, 'Mie Goreng lezat dengan tambahan telur ceplok', 1, NULL, NULL),
(10, 1, 'Indomie Rebus', '680ee3011bd15_Indomie-rebus-white-bg_optimized.png', 10000.00, 96, 'Indomie rebus dengan tambahan telur ceplok lezat', 1, NULL, NULL),
(11, 2, 'Matcha Latte', '680ee3a04a0ea_matcha-latte.png', 12000.00, 96, 'Matcha Latte dengan campuran matcha dengan kopi', 1, NULL, NULL),
(12, 2, 'Coffe Latte', '680ee3f294c1e_coffee-latte.png', 12000.00, 98, 'Coffe Latte dengan campuran susu nikmat', 1, NULL, NULL),
(13, 2, 'Ice Tea', '680ee434c4583_ice-tea.png', 6000.00, 98, 'Minuman es teh manis yang menyegarkan', 1, NULL, NULL),
(14, 3, 'Croissant', '680ee55a5c78e_croissant.png', 25000.00, 97, 'Croissant lezat dengan isian coklat', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
