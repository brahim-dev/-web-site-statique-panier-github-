-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 09:52 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'cosmetics products', '#'),
(2, 'natural plants', '#'),
(3, 'naturalsoaps products', '#'),
(4, 'OIL', '#');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(10) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_pass` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_name`, `client_email`, `client_pass`, `phone`) VALUES
(24, 'AINANE Youssef', 'gmail@gmail.com', '123456', '0642584286'),
(26, 'AINANE Youssef', 'youssef.adinom@gmail.com', '123456', '0642584286'),
(27, 'ahmad samih', 'ahmad@gmail.com', '123456', '0642584286');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `order_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_name` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `zip` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `products` varchar(20) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`order_id`, `client_id`, `client_name`, `email`, `adresse`, `zip`, `phone`, `products`, `total`) VALUES
(1, 24, 'youssef ainane', 'youssef.adinom@gmail.com', 'drarga agadir', 80000, 642584286, 'Argan Oilcustor oil1', 115);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `comment`) VALUES
(3, 'youssef ainane', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `p_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`p_id`, `client_id`, `qty`) VALUES
(24, 20, 1),
(25, 24, 1),
(27, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_keywords` text NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_keywords`, `product_desc`) VALUES
(24, 2, 4, '2020-04-23 15:56:53', 'Argan Oil', 'layout/img/products/argan/01.jpg', 'layout/img/products/argan/01.jpg', 'layout/img/products/argan/01.jpg', 100, '#', '#'),
(25, 3, 4, '2020-04-23 15:57:05', 'custor oil1', 'layout/img/products/ricin/ricin1.jpg', 'layout/img/products/ricin/ricin1.jpg', 'layout/img/products/ricin/ricin1.jpg', 15, '#', '#'),
(26, 3, 4, '2020-04-23 15:57:09', 'custor oil2', 'layout/img/products/ricin/ricin2.jpg', 'layout/img/products/ricin/ricin2.jpg', 'layout/img/products/ricin/ricin2.jpg', 17, '#', '#'),
(27, 3, 4, '2020-04-23 15:57:13', 'custor oil3', 'layout/img/products/ricin/ricin3.jpg', 'layout/img/products/ricin/ricin3.jpg', 'layout/img/products/ricin/ricin3.jpg', 25, '#', '#'),
(28, 1, 2, '2020-04-23 03:12:40', 'honey', 'layout/img/products/honey/honey1.jpg', 'layout/img/products/honey/honey1.jpg', 'layout/img/products/honey/honey1.jpg', 35, '#', '#'),
(29, 1, 2, '2020-04-23 03:09:10', 'dates', 'layout/img/products/dates/dates1.jpg', 'layout/img/products/dates/dates1.jpg', 'layout/img/products/dates/dates1.jpg', 10, '#', '#'),
(30, 1, 2, '2020-04-23 03:12:36', 'amlou', 'layout/img/products/amlou/amlou3.jpg', 'layout/img/products/amlou/amlou3.jpg', 'layout/img/products/amlou/amlou3.jpg', 25, '#', '#');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_categories`
--

CREATE TABLE `product_sub_categories` (
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_sub_categories`
--

INSERT INTO `product_sub_categories` (`p_cat_id`, `cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 2, 'dates', '#'),
(2, 4, 'argan', '#'),
(3, 4, 'custor oil', '#');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'slider1', 'layout/img/banners/banner01.jpg'),
(2, 'slider2', 'layout/img/banners/banner02.jpg'),
(3, 'slider3', 'layout/img/banners/banner003.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
