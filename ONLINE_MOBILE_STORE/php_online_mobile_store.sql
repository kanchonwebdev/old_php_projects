-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 02:48 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_online_mobile_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_product_data`
--

CREATE TABLE `tbl_admin_product_data` (
  `id` int(50) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `productImage` varchar(50) NOT NULL,
  `productPrice` varchar(55) NOT NULL,
  `productDes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_product_data`
--

INSERT INTO `tbl_admin_product_data` (`id`, `productName`, `productImage`, `productPrice`, `productDes`) VALUES
(1, 'SAMSUNG J12', '1472900.jpg', '10000/=', 'THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT '),
(2, 'SAMSUNG J7', '1472860.jpg', '8000/=', 'THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT '),
(4, 'SAMSUNG S8', '1472891.jpg', '90000/=', 'THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT '),
(5, 'SAMSUNG S10+', '1472896.jpg', '100000/=', 'THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT '),
(6, 'SYMPHONY R40', '1472923.jpg', '6300/=', 'THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT '),
(8, 'NOKIA 1', '1473020.jpg', '8000/=', 'THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT '),
(9, 'NOKIA 2', 'baby-in-pich-color-winter-wears-so-cutyyy-pics.jpg', '10000/=', 'THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT '),
(10, 'NOKIA 3', 'beautiful-baby-photos-with-flowers-imgs.jpg', '15000/=', 'THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_cart`
--

CREATE TABLE `tbl_user_cart` (
  `id` int(11) NOT NULL,
  `userId` varchar(66) NOT NULL,
  `productName` varchar(55) NOT NULL,
  `productImage` varchar(55) NOT NULL,
  `productPrice` varchar(55) NOT NULL,
  `productDes` varchar(55) NOT NULL,
  `productQuantity` int(55) NOT NULL,
  `sessionID` varchar(55) NOT NULL,
  `paymentStatus` varchar(55) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_cart`
--

INSERT INTO `tbl_user_cart` (`id`, `userId`, `productName`, `productImage`, `productPrice`, `productDes`, `productQuantity`, `sessionID`, `paymentStatus`) VALUES
(1, 'kanchon49', 'SAMSUNG J12', 'productImage', '10000/=', 'THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT T', 2, 'jpf6lgme1ia8jdutulj6rurs7i', 'Paid'),
(2, 'kanchon49', 'NOKIA 2', 'productImage', '10000/=', 'THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT T', 2, 'jpf6lgme1ia8jdutulj6rurs7i', 'Paid'),
(5, 'kanchon49', 'Array', 'productImage', '10000/=', 'THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT T', 12, '8mmf8vgt54b9ch7da8qbc5rf1p', 'Pending'),
(6, 'kanchon49', 'SAMSUNG S8', 'productImage', '90000/=', 'THIS IS NUMBER ONE PRODUCT THIS IS NUMBER ONE PRODUCT T', 12, '8mmf8vgt54b9ch7da8qbc5rf1p', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_payment`
--

CREATE TABLE `tbl_user_payment` (
  `id` int(11) NOT NULL,
  `userId` varchar(55) NOT NULL,
  `items` varchar(50) NOT NULL,
  `quantity` varchar(55) NOT NULL,
  `cost` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `paymentMethod` varchar(55) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_payment`
--

INSERT INTO `tbl_user_payment` (`id`, `userId`, `items`, `quantity`, `cost`, `total`, `paymentMethod`, `amount`, `payment_id`) VALUES
(1, 'kanchon49', 'NOKIA 2', '2', 10000, 20000, 'DBBL', 40000, 35457767);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_register`
--

CREATE TABLE `tbl_user_register` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(55) NOT NULL,
  `Gender` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `contactNo` varchar(55) NOT NULL,
  `city` varchar(55) NOT NULL,
  `address` varchar(55) NOT NULL,
  `userName` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `userId` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_register`
--

INSERT INTO `tbl_user_register` (`id`, `firstName`, `middleName`, `lastName`, `Gender`, `email`, `contactNo`, `city`, `address`, `userName`, `password`, `userId`) VALUES
(1, 'KANCHON', 'KUMAR', 'SHILL', 'Male', 'kanchon@gmail.com', '01797636430', 'GAIBANDHA SADAR', 'Thana : Sadullapur, Zilla : Gaibandha, Post : Sadullapu', 'kanchon49', '123', '121'),
(2, 'KANCHON', 'KUMAR', 'SHILL', 'Male', 'kanchonkumar@gmail.com', '01797636430', 'DHAKA', 'DHAKA BANGLADESH', 'kanchon45', '123', '1001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin_product_data`
--
ALTER TABLE `tbl_admin_product_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_cart`
--
ALTER TABLE `tbl_user_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_payment`
--
ALTER TABLE `tbl_user_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_register`
--
ALTER TABLE `tbl_user_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin_product_data`
--
ALTER TABLE `tbl_admin_product_data`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user_cart`
--
ALTER TABLE `tbl_user_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user_payment`
--
ALTER TABLE `tbl_user_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_register`
--
ALTER TABLE `tbl_user_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
