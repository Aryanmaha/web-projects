-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2022 at 01:25 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `herbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` varchar(255) NOT NULL,
  `Fname` text NOT NULL,
  `Lname` text NOT NULL,
  `DOB` date NOT NULL,
  `Contact_info` int(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_id` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Fname` text NOT NULL,
  `Lname` text NOT NULL,
  `DOB` date NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Billing_address` varchar(255) NOT NULL,
  `Contact_info` decimal(65,0) NOT NULL,
  `customer_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `Expert_id` int(255) NOT NULL,
  `Fname` text NOT NULL,
  `Lname` text NOT NULL,
  `DOB` date NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Contact_info` int(65) NOT NULL,
  `Expertise` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_id` int(65) NOT NULL,
  `Order_id` int(255) NOT NULL,
  `Customer_id` int(65) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `price`, `img`) VALUES
(1, 'parsley', 'parsley01', 2.50, 'product-images/parsley.jpg'),
(2, 'mint', 'mint01', 3.00, 'product-images/mint.jpg'),
(3, 'dill', 'dill01', 3.00, 'product-images/dill.jpg'),
(4, 'basil', 'basil01', 5.00, 'product-images/basil.jpg'),
(5, 'sage', 'sage01', 5.00, 'product-images/sage.jpg'),
(6, 'rosemary', 'rosemary01', 3.50, 'product-images/rosemary.jpg'),
(7, 'thyme', 'thyme01', 7.00, 'product-images/thyme.jpg'),
(8, 'coriander/cilantro', 'coriander01', 1.50, 'product-images/coriander.jpg'),
(9, 'fennel', 'fennel01', 2.50, 'product-images/fennel.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `Seller_id` varchar(255) NOT NULL,
  `Fname` text NOT NULL,
  `Lname` text NOT NULL,
  `DOB` date NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Contact_info` decimal(65,0) NOT NULL,
  `Product_id` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_order`
--

CREATE TABLE `shopping_order` (
  `Order_id` varchar(255) NOT NULL,
  `Customer_id` int(65) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction report`
--

CREATE TABLE `transaction report` (
  `Report_id` int(255) NOT NULL,
  `Customer_id` int(65) NOT NULL,
  `Order_id` int(255) NOT NULL,
  `Product_id` int(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`),
  ADD KEY `Admin_id` (`Admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_id`),
  ADD KEY `Category_id` (`Category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`Expert_id`),
  ADD KEY `Expert_id` (`Expert_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_id`),
  ADD KEY `Payment_id` (`Payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`Seller_id`),
  ADD UNIQUE KEY `Product_id` (`Product_id`),
  ADD KEY `Seller_id` (`Seller_id`),
  ADD KEY `Product_id_2` (`Product_id`);

--
-- Indexes for table `shopping_order`
--
ALTER TABLE `shopping_order`
  ADD PRIMARY KEY (`Order_id`),
  ADD UNIQUE KEY `Customer_id` (`Customer_id`),
  ADD KEY `Order_id` (`Order_id`),
  ADD KEY `Customer_id_2` (`Customer_id`);

--
-- Indexes for table `transaction report`
--
ALTER TABLE `transaction report`
  ADD PRIMARY KEY (`Report_id`),
  ADD KEY `Report_id` (`Report_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Payment_id`) REFERENCES `shopping_order` (`Customer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `seller_ibfk_1` FOREIGN KEY (`Seller_id`) REFERENCES `category` (`Category_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `seller_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `admin` (`Admin_id`) ON UPDATE CASCADE;

--
-- Constraints for table `transaction report`
--
ALTER TABLE `transaction report`
  ADD CONSTRAINT `transaction report_ibfk_1` FOREIGN KEY (`Report_id`) REFERENCES `product` (`Product_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
