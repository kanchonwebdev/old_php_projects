-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2019 at 02:06 PM
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
-- Database: `php_post`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `cname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `cname`) VALUES
(1, 'PHP'),
(2, 'PYTHON'),
(3, 'JAVA'),
(4, 'C SHARP'),
(5, 'C PLUS PLUS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `name`, `description`, `category`) VALUES
(1, 'php title', 'this is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this i', 'PHP'),
(2, 'Java Post Titile', 'this is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this i', 'JAVA'),
(3, 'Python Post Title', 'this is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this i', 'PYTHON'),
(4, 'C# Post Title', 'this is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this i', 'C SHARP'),
(5, 'C++ Post Title', 'this is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this i', 'C PLUS PLUS'),
(6, 'C++ Post Title', 'this is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this ithis is php post this is php post this i', 'C PLUS PLUS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
