-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2019 at 06:07 PM
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
(1, 'Royal Marriage Venue', 'Royal Marriage Ground', '01797636430', '200', 'marriage_function', 10000, '1472860.jpg'),
(2, 'Royal Marriage Venue2', 'Royal Marriage Ground2', '01797636431', '200', 'marriage_function', 10000, '1472865.jpg'),
(3, 'Royal Birthday Venue', 'Royal Birthday Ground', '01797636432', '200', 'birthday_party', 10000, '1472891.jpg'),
(4, '', '', '', '', 'nothing', 0, ''),
(5, '', '', '', '', 'nothing', 0, ''),
(6, '', '', '', '', 'nothing', 0, ''),
(7, '', '', '', '', 'nothing', 0, ''),
(8, '', '', '', '', 'nothing', 0, ''),
(9, '', '', '', '', 'nothing', 0, ''),
(10, '', '', '', '', 'nothing', 0, ''),
(11, '', '', '', '', 'nothing', 0, ''),
(12, '', '', '', '', 'nothing', 0, ''),
(13, '', '', '', '', 'nothing', 0, ''),
(14, '', '', '', '', 'nothing', 0, ''),
(15, '', '', '', '', 'nothing', 0, ''),
(16, '', '', '', '', 'nothing', 0, ''),
(17, '', '', '', '', 'nothing', 0, ''),
(18, '', '', '', '', 'nothing', 0, ''),
(19, '', '', '', '', 'nothing', 0, ''),
(20, '', '', '', '', 'nothing', 0, ''),
(21, '', '', '', '', 'nothing', 0, ''),
(22, '', '', '', '', 'nothing', 0, ''),
(23, '', '', '', '', 'nothing', 0, ''),
(24, '', '', '', '', 'nothing', 0, ''),
(25, '', '', '', '', 'nothing', 0, ''),
(26, '', '', '', '', 'nothing', 0, ''),
(27, '', '', '', '', 'nothing', 0, ''),
(28, '', '', '', '', 'nothing', 0, '');

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
(6, 121, '233good');

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
(1, '121', 'Kanchon Kumar Shill', 'Gaibandha sadar', 32456, 'kanchonkumar49@gmail.com', '123', '123'),
(2, '122', 'Kapsul Chandra Ray', 'Kurigram Borobari', 12345678, 'kapsul@gmail.com', '123', '123'),
(3, '', '', '', 0, '', '', ''),
(4, '', '', '', 0, '', '', ''),
(5, '', '', '', 0, '', '', ''),
(6, '', '', '', 0, '', '', ''),
(7, '', '', '', 0, '', '', ''),
(8, '', '', '', 0, '', '', ''),
(9, '', '', '', 0, '', '', ''),
(10, '', '', '', 0, '', '', ''),
(11, '', '', '', 0, '', '', ''),
(12, '', '', '', 0, '', '', ''),
(13, '', '', '', 0, '', '', ''),
(14, '', '', '', 0, '', '', ''),
(15, '', '', '', 0, '', '', ''),
(16, '', '', '', 0, '', '', ''),
(17, '', '', '', 0, '', '', ''),
(25, '', '', '', 0, '', '', ''),
(26, '', '', '', 0, '', '', ''),
(27, '', '', '', 0, '', '', ''),
(28, '', '', '', 0, '', '', ''),
(29, '', '', '', 0, '', '', ''),
(30, '', '', '', 0, '', '', ''),
(31, '', '', '', 0, '', '', ''),
(32, '', '', '', 0, '', '', ''),
(33, '', '', '', 0, '', '', ''),
(34, '', '', '', 0, '', '', ''),
(35, '', '', '', 0, '', '', ''),
(36, '', '', '', 0, '', '', ''),
(37, '', '', '', 0, '', '', ''),
(38, '', '', '', 0, '', '', ''),
(39, '123', 'Kapsul Chandra Ray', 'dfdgh', 0, 'kapsul@gmail.com', '1', '1'),
(40, '123', 'Kapsul Chandra Ray', 'dfdgh', 0, 'kapsul@gmail.com', '1', '1'),
(41, '232', 'Kapsul Chandra Ray', 'rfg', 12345678, 'kapsul@gmail.com', '32', '32'),
(42, '232', 'Kapsul Chandra Ray', 'rfg', 12345678, 'kapsul@gmail.com', '32', '32'),
(43, '232', 'Kapsul Chandra Ray', 'rfg', 12345678, 'kapsul@gmail.com', '32', '32'),
(44, '232', 'Kapsul Chandra Ray', 'rfg', 12345678, 'kapsul@gmail.com', '32', '32'),
(45, '121', 'Kapsul Chandra Ray', 'ghjkl', 12345678, 'kapsul@gmail.com', 'rtghj', 'sdfghj,'),
(46, '121', 'Kapsul Chandra Ray', 'ghjkl', 12345678, 'kapsul@gmail.com', 'rtghj', 'sdfghj,'),
(47, '121', 'Kapsul Chandra Ray', 'ghjkl', 12345678, 'kapsul@gmail.com', 'rtghj', 'sdfghj,'),
(48, '121', 'Kapsul Chandra Ray', 'ghjkl', 12345678, 'kapsul@gmail.com', 'rtghj', 'sdfghj,'),
(49, '121', 'Kapsul Chandra Ray', 'ghjkl', 12345678, 'kapsul@gmail.com', 'rtghj', 'sdfghj,'),
(50, '121', 'Kapsul Chandra Ray', 'ghjkl', 12345678, 'kapsul@gmail.com', 'rtghj', 'sdfghj,'),
(51, '121', 'Kapsul Chandra Ray', 'ghjkl', 12345678, 'kapsul@gmail.com', 'rtghj', 'sdfghj,'),
(52, '121', 'Kapsul Chandra ', 'dfghjj', 12345678, 'kapsul@gmail.com', '12', '1212'),
(53, '121', 'Kapsul Chandra ', 'dfghjj', 12345678, 'kapsul@gmail.com', '12', '1212'),
(54, '121', 'Kapsul Chandra ', 'rtrtrt', 12345678, 'kapsul@gmail.com', '12', '1212'),
(55, '121', 'Kapsul Chandra ', 'rtrtrt', 12345678, 'kapsul@gmail.com', '12', '1212'),
(56, '121', 'Kapsul Chandra ', 'rtrtrt', 12345678, 'kapsul@gmail.com', '12', '1212'),
(57, '121111', 'Kapsul Chandra Ray', 'hjkl', 12345678, 'kapsul@gmail.com', '1', '1'),
(58, '', 'Kapsul Chandra Ray', 'hjkl', 12345678, 'kapsul@gmail.com', '1', '1'),
(59, '', 'Kapsul Chandra Ray', 'hjkl', 12345678, 'kapsul@gmail.com', '1', '1'),
(60, '', 'Kapsul Chandra Ray', 'hjkl', 12345678, 'kapsul@gmail.com', '1', '1'),
(61, '121116', 'Kapsul Chandra Ray', 'hjkl', 12345678, 'kapsul@gmail.com', '1', '1');

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
('Royal Marriage Venue2', 'Royal Marriage Ground2', 'Nothing', 'Nothing', 'Nothing', 'Nothing', '', '1002', '121', '2019-12-15', '100', '', '', '', 1, 'Pending'),
('Royal Marriage Venue', 'Royal Marriage Ground', 'Royal', 'Royal', 'Royal', 'Nothing', 'VEGITABLE', '1001', '121', '2019-12-25', '100', 'DJ', 'STAGE', 'MIKE & SPEAKER', 2, 'Confirm');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user_register`
--
ALTER TABLE `tbl_user_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user_booking_data`
--
ALTER TABLE `user_booking_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
