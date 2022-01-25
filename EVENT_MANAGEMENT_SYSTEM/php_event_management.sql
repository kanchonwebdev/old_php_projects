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
-- Database: `php_event_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_booking_data`
--

CREATE TABLE `admin_booking_data` (
  `id` int(11) NOT NULL,
  `venu_name` varchar(50) NOT NULL,
  `venu_address` varchar(50) NOT NULL,
  `venu_phone_number` varchar(50) NOT NULL,
  `capacity` varchar(100) NOT NULL,
  `preferred` text NOT NULL,
  `amount` int(50) NOT NULL,
  `venu_image` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_booking_data`
--

INSERT INTO `admin_booking_data` (`id`, `venu_name`, `venu_address`, `venu_phone_number`, `capacity`, `preferred`, `amount`, `venu_image`) VALUES
(1, 'BIRTHDAY PARTY', 'BIRTHDAY PARTY ADRESS', '01797636430', '100', 'BIRTHDAY_PARTY', 10000, '1472860.jpg'),
(2, 'MARRIAGE FUNCTION', ' MARRIAGE FUNCTION ADRESS', '01797636430', '150', 'MARRIAGE_FUNCTION', 10000, '1472865.jpg'),
(3, 'ANNUAL MARRIAGE CEREMONY', 'ANNUAL MARRIAGE CEREMONY ADRESS', '01797636430', '100', 'ANNUAL_MARRIAGE_CEREMONY', 20000, '1472891.jpg'),
(4, 'SUCCESS PARTY', 'SUCCESS PARTY ADRESS', '01797636430', '200', 'SUCCESS_PARTY', 25000, '1472896.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_login`
--

CREATE TABLE `tbl_admin_login` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_login`
--

INSERT INTO `tbl_admin_login` (`id`, `admin_name`, `admin_password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `feedBack_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `userID`, `feedBack_text`) VALUES
(1, 0, ''),
(2, 121, 'nice'),
(3, 121, '233good'),
(4, 121, '233good'),
(5, 121, '233good'),
(6, 121, '233good'),
(7, 121, 'Very Nice..');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_register`
--

CREATE TABLE `tbl_user_register` (
  `id` int(11) NOT NULL,
  `userId` varchar(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phoneNumber` int(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` text NOT NULL,
  `confirmPass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_register`
--

INSERT INTO `tbl_user_register` (`id`, `userId`, `userName`, `address`, `phoneNumber`, `email`, `pass`, `confirmPass`) VALUES
(1, '1001', 'KANCHON KUMAR SHILL', 'DHAKA,BANGLADESH', 1797636430, 'kanchonku@gmail.com', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user_booking_data`
--

CREATE TABLE `user_booking_data` (
  `venu_name` varchar(50) NOT NULL,
  `venu_address` varchar(50) NOT NULL,
  `breakfast` varchar(50) NOT NULL,
  `tea_&_snack` varchar(50) NOT NULL,
  `lunch` varchar(50) NOT NULL,
  `dinner` varchar(50) NOT NULL,
  `food_type` varchar(50) NOT NULL DEFAULT 'Veg',
  `booking_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `booking_date` date NOT NULL,
  `guest_number` varchar(50) NOT NULL,
  `dj` varchar(50) DEFAULT NULL,
  `stage` varchar(50) DEFAULT NULL,
  `mike` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `booking_status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_booking_data`
--

INSERT INTO `user_booking_data` (`venu_name`, `venu_address`, `breakfast`, `tea_&_snack`, `lunch`, `dinner`, `food_type`, `booking_id`, `user_id`, `booking_date`, `guest_number`, `dj`, `stage`, `mike`, `id`, `booking_status`) VALUES
('BIRTHDAY PARTY', 'BIRTHDAY PARTY ADRRESS', 'Normal', 'Normal', 'Nothing', 'Nothing', 'NON VEGITABLE', '12121', '1001', '2020-02-05', '100', 'DJ', 'STAGE', 'MIKE & SPEAKER', 1, 'Confirm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_booking_data`
--
ALTER TABLE `admin_booking_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_register`
--
ALTER TABLE `tbl_user_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_booking_data`
--
ALTER TABLE `user_booking_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_booking_data`
--
ALTER TABLE `admin_booking_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user_register`
--
ALTER TABLE `tbl_user_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_booking_data`
--
ALTER TABLE `user_booking_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
