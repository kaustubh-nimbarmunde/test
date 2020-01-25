-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2020 at 05:55 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spryox_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_value` varchar(50) NOT NULL,
  `sub_cat_name` varchar(50) NOT NULL,
  `sub_cat_value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_value`, `sub_cat_name`, `sub_cat_value`) VALUES
(1, 'cat1', 'Category 1', 'subcat11', 'Sub Category 11'),
(2, 'cat1', 'Category 1', 'subcat12', 'Sub Category 12'),
(3, 'cat2', 'Category 2', 'subcat21', 'Sub Category 21'),
(4, 'cat2', 'Category 2', 'subcat22', 'Sub Category 22');

-- --------------------------------------------------------

--
-- Table structure for table `formdata`
--

CREATE TABLE `formdata` (
  `d_id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `sub_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formdata`
--

INSERT INTO `formdata` (`d_id`, `uname`, `quantity`, `price`, `category`, `sub_category`) VALUES
(2, 'ksn', 2, 3, 'cat2', 'Select Sub Category'),
(3, 'kautya', 22, 2, 'cat1', 'Select Sub Category'),
(9, 'kaustubh', 23, 4000, 'cat1', 'subcat11');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `path` varchar(300) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `d_id`, `path`, `status`) VALUES
(3, 2, 'uploads/Screenshot from 2020-01-14 15-46-43.png', 1),
(4, 2, 'uploads/Screenshot from 2019-12-08 13-47-00.png', 1),
(5, 2, 'uploads/Screenshot from 2019-12-08 13-46-55.png', 1),
(6, 3, 'uploads/Screenshot from 2020-01-14 15-46-43.png', 1),
(8, 9, 'uploads/Screenshot from 2020-01-14 15-46-43.png', 1),
(9, 9, 'uploads/Screenshot from 2019-12-08 13-47-00.png', 1),
(10, 9, 'uploads/Screenshot from 2019-12-08 13-46-55.png', 1),
(11, 9, 'uploads/Screenshot from 2019-12-08 13-46-40.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `formdata`
--
ALTER TABLE `formdata`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `formdata`
--
ALTER TABLE `formdata`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
