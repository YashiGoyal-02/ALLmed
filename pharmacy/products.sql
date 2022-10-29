-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2022 at 10:46 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `email_id` varchar(100) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`email_id`, `product_name`) VALUES
('', 'Benadryl Cough Syrup'),
('a@gmail.com', 'Benadryl Cough Syrup'),
('a@gmail.com', 'O2 Tablet'),
('a@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_data`
--

CREATE TABLE `login_data` (
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `contact_no` int(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_data`
--

INSERT INTO `login_data` (`first_name`, `last_name`, `email_id`, `contact_no`, `gender`, `address`, `password`) VALUES
('ishita', 'gupta', 'ishita@gmail.com', 2147483647, 'female', '32 dayanand vihar, karkardooma', '12#Kabcd'),
('ishita', 'gupta', 'ishita@gmail.com', 2147483647, 'female', '32 dayanand vihar, karkardooma', 'ZIPzap@123'),
('ishita', 'gupta', 'a@gmail.com', 2147483647, 'female', '32 dayanand vihar, karkardooma', 'RITrat@123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
