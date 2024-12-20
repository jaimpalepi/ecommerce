-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2024 at 06:53 AM
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
-- Database: `efs`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `units` int NOT NULL,
  `total` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_code`, `product_name`, `product_desc`, `price`, `units`, `total`, `date`, `email`) VALUES
(12, 'EFC1', 'Kipas', 'Cosmos 12-LDA - Desk Fan 12 inch memiliki bilah kipas berukuran 12 inch, 3 level kecepatan dan tombol berhenti, dengan desain blade aerodinamis menyebarkan angin lebih merata & sejuk. Tombol model piano.', 226500, 1, 226500, '2024-11-21 14:47:58', 'sjobs@apple.com'),
(13, 'EFC1', 'Kipas', 'Cosmos 12-LDA - Desk Fan 12 inch memiliki bilah kipas berukuran 12 inch, 3 level kecepatan dan tombol berhenti, dengan desain blade aerodinamis menyebarkan angin lebih merata & sejuk. Tombol model piano.', 226500, 1, 226500, '2024-12-16 11:16:37', 'zaimpahlevi25@gmail.com'),
(14, 'EFS1', 'Kipas', 'Cosmos 12-LDA - Desk Fan 12 inch memiliki bilah kipas berukuran 12 inch, 3 level kecepatan dan tombol berhenti, dengan desain blade aerodinamis menyebarkan angin lebih merata & sejuk. Tombol model piano.', 226500, 1, 226500, '2024-12-20 04:30:28', 'jaim@jaim');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `qty` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `unggulan` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`, `unggulan`) VALUES
(1, 'EFS1', 'Kipas', 'Cosmos 12-LDA - Desk Fan 12 inch memiliki bilah kipas berukuran 12 inch, 3 level kecepatan dan tombol berhenti, dengan desain blade aerodinamis menyebarkan angin lebih merata & sejuk. Tombol model piano.', 'kipas.jpg', 26, 226500.00, 0),
(2, 'EFS2', 'Mesin Cuci', 'Motor penggerak langsung yang ada di dalam mesin cuci kami memiliki ketangguhan sekaligus tidak bising. Kami menjamin bahwa Anda tidak akan kecewa. ', 'cuci.jpeg', 7, 200000.00, 1),
(3, 'EFS3', 'Lampu', 'Mode yang didukung:\r\nStandardSwitch: Kecerahan konstan, Tanpa remote, kabel sakelar USB\r\nRemoteControl: Kecerahan yang dapat disesuaikan, cahaya yang dapat disesuaikan, remote control, kabel sakelar USB', 'lampu.jpeg', 34, 75000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `city`, `email`, `password`, `type`) VALUES
(1, 'steve', 'jobs', 'kebumen', 'kebumen', 'sjobs@apple.com', 'steve', 'seller'),
(2, 'Admin', 'Webmaster', 'Internet', 'Electricity', 'admin@admin.com', 'admin', 'admin'),
(5, 'zaim', 'pahlevi', 'konoha', 'konoha', 'jaim@jaim', 'jaim', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
