-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 05:18 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shadowdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `inquiry` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `inquiry`) VALUES
(1, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(2, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(3, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(4, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(5, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(6, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(7, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(8, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(9, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(10, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(11, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(12, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(13, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(14, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(15, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(16, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(17, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(18, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(19, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(20, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(21, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(22, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(23, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(24, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(25, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(26, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(27, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(28, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?'),
(29, 'Sean Pan', 'natalie@mail.com', 'Hello, are you guys selling the FOG shirt?');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `code`, `image`, `price`) VALUES
(6, 'Black Polo Shirt with logo', 'CDG', 'P001', 'product-images/product1.png', 1.00),
(7, 'Black Logo Sweatshirt', 'Champion', 'P002', 'product-images/product7.jpg', 180.00),
(10, 'Black Hoodie with Zip', 'Champion', 'P005', 'product-images/product5.png', 280.00),
(11, 'Yellow Sweatshirt', 'SSUR', 'P004', 'product-images/product6.png', 199.99),
(15, 'Navy Blue T-shirt', 'Stussy', 'P011', 'product-images/product8.png', 120.00),
(16, 'Black Script T-shirt', 'Shadow', 'P012', 'product-images/product12.jpeg', 89.99),
(17, 'White Full Hearts', 'CDG', 'P013', 'product-images/product0.png', 129.00),
(19, 'Grey Script T-shirt', 'Champion', 'P015', 'product-images/product13.png', 99.99),
(20, 'Black Logo Sweatshirt', 'Stussy', 'P016', 'product-images/product15.png', 290.00),
(22, 'Grey \"FAKE\" sweatshirt', 'SSUR', 'P014', 'product-images/product14.jpg', 190.00),
(34, 'Stussy Pink Hoodie', 'SSUR', 'P567', 'product-images/product10.png', 230.12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `lastname`, `user_type`, `password`) VALUES
(2, 'alvin123@gmail.com', 'Alvin', 'Lim', 'admin', '202cb962ac59075b964b07152d234b70'),
(5, 'ronaldo@gmail.com', 'Jack', 'Ronaldo', 'user', '202cb962ac59075b964b07152d234b70'),
(6, 'curry@gmail.com', 'Stephen', 'Curry', 'user', '202cb962ac59075b964b07152d234b70'),
(16, 'lily@gmail.com', 'Lily', 'Tan', 'user', 'e99a18c428cb38d5f260853678922e03'),
(17, 'mikeoxmall@mail.com', 'Mike', 'Oxmall', 'admin', 'e99a18c428cb38d5f260853678922e03'),
(18, 'test@mail.com', 'Test', 'One', 'user', 'e99a18c428cb38d5f260853678922e03'),
(19, 'bob@gmail.com', 'Bob', 'Griffin', 'user', 'e99a18c428cb38d5f260853678922e03'),
(20, 'seanpan@gmail.com', 'Sean', 'Pan', 'admin', 'e99a18c428cb38d5f260853678922e03'),
(21, 'darren@gmail.com', 'Darren', 'Chu', 'user', 'e99a18c428cb38d5f260853678922e03'),
(23, 'james@gmail.com', 'Lebron', 'James', 'user', 'e99a18c428cb38d5f260853678922e03'),
(24, 'jessica@gmail.com', 'Jessica', 'Lim', 'user', 'e99a18c428cb38d5f260853678922e03'),
(25, 'jayden@gmail.com', 'Jayden', 'Lim', 'user', 'e99a18c428cb38d5f260853678922e03'),
(26, 'sean@gmail.com', 'Sean', 'Pan', 'admin', 'e99a18c428cb38d5f260853678922e03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
