-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 02, 2024 at 03:00 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lump_society`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `quantity`) VALUES
(11, 15, 1, 1),
(12, 15, 3, 1),
(27, 14, 28, 1),
(28, 14, 4, 1),
(30, 16, 3, 1),
(31, 16, 4, 1),
(32, 16, 5, 1),
(33, 16, 7, 1),
(34, 16, 9, 1),
(35, 14, 14, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `photo_alt` varchar(255) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `category` set('tops','bottoms','accesories') NOT NULL,
  `add_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `photo_url`, `photo_alt`, `stock_quantity`, `category`, `add_date`) VALUES
(1, 'BASIC HOODIE (black)', 499.00, './dist/img/new-hoodie-black.png', 'czarna bluza z nowej kolekcji', 50, 'tops', '2024-05-25'),
(3, 'BASIC HOODIE (pink)', 499.00, './dist/img/new-hoodie-pink.png', 'różowa bluza z nowej kolekcji', 50, 'tops', '2024-05-25'),
(4, 'SWEATPANTS (blue)', 349.00, './dist/img/basic-sweatpants-blue.png', 'SWEATPANTS (blue)', 30, 'bottoms', '2024-05-24'),
(5, 'SWEATPANTS (pink)', 349.00, './dist/img/basic-sweatpants-pink.png', 'SWEATPANTS (pink)', 37, 'bottoms', '2024-05-24'),
(6, 'SWEATPANTS (grey)', 349.00, './dist/img/basic-sweatpants-grey.png', 'SWEATPANTS (grey)', 36, 'bottoms', '2024-05-24'),
(7, 'BASIC HOODIE (blue)', 499.00, './dist/img/new-hoodie-blue.png', 'BASIC HOODIE (blue)', 26, 'tops', '2024-05-25'),
(8, 'FOREST HOODIE (black)', 449.00, './dist/img/forest-hoodie-black.png', 'FOREST HOODIE (black)', 78, 'tops', '2024-05-24'),
(9, 'STAR TEE (black)', 199.00, './dist/img/star-tee-black.png', 'STAR TEE (black)', 18, 'tops', '2024-05-24'),
(10, 'BASIC HOODIE (grey)', 499.00, './dist/img/new-hoodie-grey.png', 'BASIC HOODIE (grey)', 100, 'tops', '2024-05-25'),
(11, 'SHORTS (black)', 249.00, './dist/img/shorts-black.png', 'SHORTS (black)', 11, 'bottoms', '2024-05-24'),
(12, 'SHORTS (grey)', 249.00, './dist/img/shorts-grey.png', 'SHORTS (grey)', 13, 'bottoms', '2024-05-24'),
(13, 'SHORTS (taupe)', 249.00, './dist/img/shorts-taupe.png', 'SHORTS (taupe)', 34, 'bottoms', '2024-05-24'),
(14, 'TOTE BAG', 119.00, './dist/img/tote-bag.png', 'TOTE BAG', 12, 'accesories', '2024-05-24'),
(15, 'WAVY TOTE BAG ', 119.00, './dist/img/wavy-crossbody-tote-bag.png', 'WAVY TOTE BAG ', 7, 'accesories', '2024-05-24'),
(16, 'WAVY HOODIE (black)', 499.00, './dist/img/wavy-hoodie-black.png', 'WAVY HOODIE (black)', 69, 'tops', '2024-05-24'),
(28, 'Sosu', 999.99, './dist/img/sliwa.jpg', 'Sosu', 12, 'accesories', '2024-05-24');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `is_admin`) VALUES
(5, 'admin', 'admin@admin.pl', '$2y$10$WdlaUIfS3nOYjSIJHjDOHeRC2M7rsIVsWiTBJko8YqIKenotZZljy', 1),
(14, 'Szafter3', 'test@test.com', '$2y$10$uT4AhxMfyduhS8ysqzF4heZ9CPD8jl7UOhYDJqc8fzN9CjBGPmtje', 0),
(15, 'essa', 'essa@essa.pl', '$2y$10$8mTmOJaR0rV4gUxlG6KL.uUMY4Bb3at3gLwZ8Kx/J87To.9recZ7u', 0),
(16, 'Martynka', 'martynka@m.pl', '$2y$10$JIsdCxMTzzHV.qMLps1WJOvmsfNTXmwlII/Mf0LeCBPav8EhqXXRi', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
