-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 02:49 AM
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
-- Database: `php_room_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `r_name` varchar(55) NOT NULL,
  `r_bed_no` int(55) NOT NULL,
  `r_capacity` int(55) NOT NULL,
  `r_price` int(55) NOT NULL,
  `r_number` int(55) NOT NULL,
  `session_id` varchar(55) NOT NULL,
  `start_from` date NOT NULL,
  `to_end` date NOT NULL,
  `total_day` int(55) NOT NULL,
  `date_array` text NOT NULL,
  `booking_action` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `r_name`, `r_bed_no`, `r_capacity`, `r_price`, `r_number`, `session_id`, `start_from`, `to_end`, `total_day`, `date_array`, `booking_action`) VALUES
(1, 'ROYAL ROOM 3', 3, 6, 10000, 103, '68u4kfijfibothkf7ktp1r8mn1', '2020-01-28', '2020-01-31', 4, '2020-01-28 2020-01-29 2020-01-30 2020-01-31', '2020-01-28 07:11:42'),
(2, 'ROYAL ROOM 3', 3, 6, 10000, 103, '03p4jvdcduqi65dbcho7t0ra6p', '2020-02-02', '2020-02-05', 4, '2020-02-02 2020-02-03 2020-02-04 2020-02-05', '2020-01-28 07:13:26'),
(3, 'ROYAL ROOM 2', 2, 4, 8000, 102, '03p4jvdcduqi65dbcho7t0ra6p', '2020-01-29', '2020-01-31', 3, '2020-01-29 2020-01-30 2020-01-31', '2020-01-28 07:25:23'),
(4, 'ROYAL ROOM 2', 2, 4, 8000, 102, '03p4jvdcduqi65dbcho7t0ra6p', '2020-02-02', '2020-02-11', 10, '2020-02-02 2020-02-03 2020-02-04 2020-02-05 2020-02-06 2020-02-07 2020-02-08 2020-02-09 2020-02-10 2020-02-11', '2020-01-28 07:29:28'),
(9, 'ROYAL ROOM 6', 1, 2, 6000, 106, '8mmf8vgt54b9ch7da8qbc5rf1p', '2020-02-03', '2020-02-05', 3, '2020-02-03 2020-02-04 2020-02-05', '2020-02-02 16:18:08'),
(10, 'ROYAL ROOM 5', 2, 4, 10000, 105, '8mmf8vgt54b9ch7da8qbc5rf1p', '2020-02-03', '2020-02-07', 5, '2020-02-03 2020-02-04 2020-02-05 2020-02-06 2020-02-07', '2020-02-02 16:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `u_name` varchar(55) NOT NULL,
  `u_payment_method` varchar(55) NOT NULL,
  `u_payment_id` varchar(55) NOT NULL,
  `u_email` varchar(55) NOT NULL,
  `session_id` varchar(55) NOT NULL,
  `payment_tk` int(55) NOT NULL,
  `action_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `u_name`, `u_payment_method`, `u_payment_id`, `u_email`, `session_id`, `payment_tk`, `action_time`) VALUES
(1, 'KANCHON KUMAR SHILL', 'BKASH', '1234567890456', 'kanchon@gmail.com', '68u4kfijfibothkf7ktp1r8mn1', 4000, '2020-01-27 09:52:07'),
(2, 'KANCHON KUMAR SHILL', 'BKASH', '1234567890456', 'kanchon@gmail.com', '03p4jvdcduqi65dbcho7t0ra6p', 3000, '2020-01-28 07:27:20'),
(3, 'KANCHON KUMAR SHILL', 'BKASH', '1234567890456', 'kanchon@gmail.com', '03p4jvdcduqi65dbcho7t0ra6p', 10000, '2020-01-28 07:29:39'),
(4, 'KANCHON KUMAR SHILL', '', '', 'kanchon@gmail.com', '03p4jvdcduqi65dbcho7t0ra6p', 10000, '2020-01-28 08:01:30'),
(5, 'KANCHON KUMAR SHILL', 'BKASH', '123456', 'kanchon@gmail.com', '8mmf8vgt54b9ch7da8qbc5rf1p', 5000, '2020-02-02 16:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `id` int(11) NOT NULL,
  `r_name` varchar(55) NOT NULL,
  `r_bed_no` int(55) NOT NULL,
  `r_capacity` int(55) NOT NULL,
  `r_price` int(55) NOT NULL,
  `r_image` varchar(55) NOT NULL,
  `r_number` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`id`, `r_name`, `r_bed_no`, `r_capacity`, `r_price`, `r_image`, `r_number`) VALUES
(1, 'ROYAL ROOM', 1, 2, 10000, '1472860.jpg', 101),
(2, 'ROYAL ROOM 2', 2, 4, 8000, '1472865.jpg', 102),
(3, 'ROYAL ROOM 3', 3, 6, 10000, '1472891.jpg', 103),
(4, 'ROYAL ROOM 4', 3, 6, 12000, '1472896.jpg', 104),
(5, 'ROYAL ROOM 5', 2, 4, 10000, '1472900.jpg', 105),
(6, 'ROYAL ROOM 6', 1, 2, 6000, '1472923.jpg', 106),
(7, 'ROYAL ROOM 7', 3, 6, 12000, '1472990.jpg', 107);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `u_name` varchar(55) NOT NULL,
  `u_email` varchar(55) NOT NULL,
  `u_phone` varchar(55) NOT NULL,
  `u_address` varchar(55) NOT NULL,
  `u_pass` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved_status` varchar(55) NOT NULL DEFAULT 'APPROVED',
  `block_status` varchar(55) NOT NULL DEFAULT 'BLOCK'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `u_name`, `u_email`, `u_phone`, `u_address`, `u_pass`, `created_at`, `approved_status`, `block_status`) VALUES
(1, '', '', '', '', '', '2020-01-27 09:26:52', 'APPROVED', 'BLOCK'),
(2, 'KANCHON KUMAR SHILL', 'kanchon@gmail.com', '01797636430', 'SADULLAPUR,GAIBANDHA', '123', '2020-01-27 09:27:19', 'APPROVED', 'BLOCK'),
(3, 'KANCHON KUMAR SHILL2', 'kanchon2@gmail.com', '01797636430', 'SADULLAPUR,GAIBANDHA', '123', '2020-01-27 09:43:09', 'APPROVED', 'BLOCK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
