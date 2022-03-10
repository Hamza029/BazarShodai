-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 05:44 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bazarshodai`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `email`, `phone`, `name`, `pass`, `address`, `nid`) VALUES
(3, 'test1@gmail.com', '123456', 'Nahin Hamza', '81dc9bdb52d04dc20036dbd8313ed055', 'Mohammadpur, Dhaka - 1207', '123456'),
(4, 'mushfiq1@gmail.com', '01812345678', 'Mushfiqur Rahman', '81dc9bdb52d04dc20036dbd8313ed055', 'Mohammadpur, Dhaka - 1207', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(2, 'Unity Burnett', 'buguba', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(9, 'Maxine Bauer', 'rukeg', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(11, 'Moana Maldonado', 'rinaxebi', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(17, 'Hamza', 'nahinhamza001', '81dc9bdb52d04dc20036dbd8313ed055'),
(18, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `order_id` int(11) UNSIGNED DEFAULT NULL,
  `item_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `item_id`, `quantity`, `price`, `order_id`, `item_title`) VALUES
(1, 25, 2, '56.00', 1, 'Exercitationem sit '),
(2, 26, 1, '806.00', 1, 'Harum et quis aut ei'),
(3, 26, 1, '806.00', 2, 'Harum et quis aut ei'),
(4, 31, 1, '596.00', 2, 'Et temporibus volupt'),
(5, 26, 1, '806.00', 3, 'Harum et quis aut ei'),
(6, 26, 1, '806.00', 3, 'Harum et quis aut ei'),
(7, 26, 1, '806.00', 4, 'Harum et quis aut ei'),
(8, 26, 1, '806.00', 4, 'Harum et quis aut ei'),
(9, 25, 1, '28.00', 5, 'Exercitationem sit '),
(10, 26, 1, '806.00', 6, 'Harum et quis aut ei'),
(11, 26, 1, '806.00', 7, 'Harum et quis aut ei'),
(12, 29, 1, '674.00', 8, 'Eu culpa dolore nost'),
(13, 25, 2, '56.00', 8, 'Exercitationem sit '),
(14, 26, 1, '806.00', 9, 'Harum et quis aut ei'),
(15, 30, 1, '636.00', 10, 'Dolor sequi qui aut '),
(16, 28, 1, '20.00', 11, 'Pudina Pata (Mint Leaves)'),
(17, 30, 1, '85.00', 11, 'Nekko Tuna Topping Seabream In Gravy'),
(18, 31, 1, '150.00', 12, 'Hong Hong Chunky Beef Flavor In Gravy (Can)'),
(19, 28, 1, '20.00', 13, 'Pudina Pata (Mint Leaves)'),
(20, 29, 1, '650.00', 14, 'Golden Kat Litter Clumping Leamon Flavour'),
(21, 25, 1, '15.00', 15, '  Lal Shak (Red Spinach)'),
(22, 26, 1, '10.00', 15, 'Dhonia Pata (Coriander Leaves)'),
(23, 28, 1, '20.00', 15, 'Pudina Pata (Mint Leaves)'),
(24, 32, 1, '120.00', 15, 'Savlon Handwash'),
(25, 25, 1, '15.00', 16, '  Lal Shak (Red Spinach)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(10, 'Food', 'Food_Category_928.jpg', 'Yes', 'Yes'),
(14, 'Pet Care', 'Food_Category_240.jpeg', 'Yes', 'Yes'),
(15, 'Beauty and Health', 'Food_Category_333.jpeg', 'Yes', 'Yes'),
(16, 'Hygiene', 'Food_Category_745.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(25, '  Lal Shak (Red Spinach)', 'Each bundle', '15.00', 'Item-Name-4935.jpg', 10, 'Yes', 'Yes'),
(26, 'Dhonia Pata (Coriander Leaves)', 'Per 100gm', '10.00', 'Item-Name-2234.jpg', 10, 'No', 'Yes'),
(28, 'Pudina Pata (Mint Leaves)', 'per 100gm', '20.00', 'Item-Name-1460.jpg', 10, 'Yes', 'Yes'),
(29, 'Golden Kat Litter Clumping Leamon Flavour', 'Per 10kg', '650.00', 'Item-Name-6959.jpeg', 14, 'Yes', 'Yes'),
(30, 'Nekko Tuna Topping Seabream In Gravy', 'per 70gm', '85.00', 'Item-Name-5120.jpeg', 14, 'Yes', 'Yes'),
(31, 'Hong Hong Chunky Beef Flavor In Gravy (Can)', 'per 400gm', '150.00', 'Item-Name-7721.jpeg', 14, 'Yes', 'Yes'),
(32, 'Savlon Handwash', 'per item', '120.00', 'Item-Name-1597.jpeg', 16, 'Yes', 'Yes'),
(33, 'Lifebuoy Handwash', 'Per item', '120.00', 'Item-Name-4753.jpeg', 16, 'Yes', 'Yes'),
(34, 'Tissue', 'Per pack', '30.00', 'Item-Name-1678.jpeg', 16, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `customer_id`, `price`, `order_date`) VALUES
(1, 3, '862.00', '2000-12-12'),
(2, 3, '1402.00', '2000-12-12'),
(3, 3, '806.00', '2000-12-12'),
(4, 3, '806.00', '2000-12-12'),
(5, 3, '28.00', '2000-12-12'),
(6, 3, '806.00', '2000-12-12'),
(7, 3, '806.00', '2000-12-12'),
(8, 3, '730.00', '2000-12-12'),
(9, 3, '806.00', '0000-00-00'),
(10, 3, '636.00', '2022-03-04'),
(11, 4, '105.00', '2022-03-04'),
(12, 4, '150.00', '2022-03-04'),
(13, 4, '20.00', '2022-03-04'),
(14, 4, '650.00', '2022-03-04'),
(15, 4, '165.00', '2022-03-04'),
(16, 4, '15.00', '2022-03-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
