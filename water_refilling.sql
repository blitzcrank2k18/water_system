-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2019 at 04:49 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `water_refilling`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `type_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `address`, `contact_number`, `type_id`, `status`) VALUES
(1, 'Jerwin Pereys', 'Sitio Cabug EB Magalona', '09115465421', 2, 'Inactive'),
(2, 'Natlie Hearts', 'Tres Fuentes Street Barangay Rizal Silay City', '0918171161', 1, 'Inactive'),
(3, 'Jilliane', 'Busay', '09656565', 2, 'Active'),
(4, 'Hershey', 'tres fuentes street barangay rizal silay city', '+639177701151', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_status` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `order_id`, `delivery_date`, `delivery_status`, `user_id`) VALUES
(1, 1, '2019-08-11', 'Delivered', 3),
(2, 2, '2019-08-12', 'Delivered', 3),
(3, 3, '2019-08-12', 'delivered', 3),
(4, 4, '2019-08-11', 'delivered', 3),
(5, 5, '2019-08-12', 'delivered', 3),
(6, 6, '2019-08-12', 'Delivered', 3),
(7, 11, '2019-08-22', 'Delivered', 3),
(8, 12, '2019-08-22', 'Delivered', 3),
(9, 13, '2019-08-22', 'Delivered', 3),
(10, 15, '2019-08-22', 'delivered', 3),
(11, 16, '2019-08-21', 'Delivered', 3),
(12, 17, '2019-08-22', 'delivered', 3),
(13, 18, '2019-08-22', 'Delivered', 3),
(14, 1, '2019-08-21', 'pending', 3),
(15, 2, '2019-08-22', 'pending', 3),
(16, 3, '2019-08-22', 'pending', 3);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_total` decimal(10,2) NOT NULL,
  `order_status` varchar(30) NOT NULL,
  `order_type` varchar(30) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `charge` decimal(10,2) NOT NULL,
  `disc` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `order_date`, `order_total`, `order_status`, `order_type`, `payment`, `payment_status`, `charge`, `disc`, `balance`) VALUES
(1, 3, '2019-08-21 17:43:14', '71.50', 'confirmed', 'Delivery', '71.50', 'Paid', '6.50', '0.00', '0.00'),
(2, 3, '2019-08-21 17:54:24', '71.50', 'confirmed', 'Delivery', '0.00', 'Unpaid', '6.50', '0.00', '71.50'),
(3, 3, '2019-08-21 18:03:24', '71.50', 'confirmed', 'Delivery', '70.00', 'Partially Paid', '6.50', '0.00', '1.50');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `product_id`, `order_qty`, `order_price`, `total`) VALUES
(1, 1, 1, 1, '30.00', '30.00'),
(2, 1, 2, 1, '35.00', '35.00'),
(3, 2, 1, 1, '30.00', '30.00'),
(4, 2, 2, 1, '35.00', '35.00'),
(5, 3, 1, 1, '30.00', '30.00'),
(6, 3, 2, 1, '35.00', '35.00');

-- --------------------------------------------------------

--
-- Table structure for table `personel`
--

CREATE TABLE `personel` (
  `personel_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `pin_number` varchar(5) NOT NULL,
  `address` varchar(150) NOT NULL,
  `sex` varchar(15) NOT NULL,
  `birthday` varchar(30) NOT NULL,
  `mobile_number` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `position` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personel`
--

INSERT INTO `personel` (`personel_id`, `firstname`, `lastname`, `pin_number`, `address`, `sex`, `birthday`, `mobile_number`, `status`, `position`) VALUES
(1, 'Alexandra', 'Delos Reyes', '1254', 'Sitio Subay Barangay 5 EB Magalona ', 'Female', '08/25/1991', '0917989818', '', 'Driver'),
(2, 'Juan', 'Rider', '09492', 'Tres Fuentes Street Barangay Rizal Silay city', 'Female', '08/25/1991', '0917989819', '', 'Delivery Boy');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(150) NOT NULL,
  `size` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category`, `description`, `size`, `price`) VALUES
(1, 'Blue Water Product 1', 'Container with Handle', 'This is a sample description', '1000', '30.00'),
(2, 'Blue Water Round Neck', 'Round Container', '', '1200', '35.00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_type` varchar(30) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `order_id`, `transaction_date`, `transaction_type`, `amount`) VALUES
(1, 1, '2019-08-21 17:43:57', 'Cash', '71.50'),
(2, 2, '2019-08-21 17:54:33', 'Cash', '0.00'),
(3, 3, '2019-08-21 18:03:33', 'Cash', '70.00');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `delivery_charge` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type`, `discount`, `delivery_charge`) VALUES
(1, 'Vendor', '10.00', '0.00'),
(2, 'Household', '0.00', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `firstname`, `lastname`, `status`, `user_type`) VALUES
(1, 'admin', 'a1Bz20ydqelm8m1wqlb8fe4f782a98ed5ca99e3cf2a2565e1a', 'CHMSC TALISAY', 'USER', 'Active', 'Administrator'),
(3, 'admin', 'a1Bz20ydqelm8m1wql8f1d43620bc6bb580df6e80b0dc05c48', 'Juvic', 'Corugda', 'Active', 'Delivery Personel'),
(4, 'alex', 'a1Bz20ydqelm8m1wql590cebfaecd94ff87e6c7b2a43f85fda', 'Alexandra D', 'Delos Santos', 'Active', 'Administrator'),
(5, 'jer', 'a1Bz20ydqelm8m1wql418d502bb0840cc603246ba5d77a68c5', 'Jerwin', 'CHMSC', 'Active', 'Delivery Personel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `personel`
--
ALTER TABLE `personel`
  ADD PRIMARY KEY (`personel_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personel`
--
ALTER TABLE `personel`
  MODIFY `personel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
