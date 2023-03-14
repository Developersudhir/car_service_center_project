-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 02:43 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_garage`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `adminid` int(25) NOT NULL,
  `adminname` text NOT NULL,
  `adminmail` varchar(25) NOT NULL,
  `adminpassword` varchar(25) NOT NULL,
  `adminphone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`adminid`, `adminname`, `adminmail`, `adminpassword`, `adminphone`) VALUES
(1, 'Sudhir', 'sudhir12@gmail.com', 'Sudhir@12', '7894563210'),
(2, 'Akshay', 'akshay12@gmail.com', 'Akshay@12', '7845123069'),
(3, 'Dhiraj', 'dhiraj12@gmail.com', 'egrf', '7845123069');

-- --------------------------------------------------------

--
-- Table structure for table `contact_tb`
--

CREATE TABLE `contact_tb` (
  `name` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `query` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_tb`
--

INSERT INTO `contact_tb` (`name`, `email`, `query`) VALUES
('rohan', 'sudhir@gmail.com', 'rtfhnjfjutygkmhuj'),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('sudhir', 'sudhir@mail', 'abcdefgh!'),
('sudhir', 'sudhir@mail', ''),
('sudhir', 'sudhir@mail', ''),
('sudhir', 'sudhir@mail', ''),
('sudhir', 'sudhir@mail', ''),
('sudhir', 'sudhir@mail', ''),
('sudhir', 'sudhir@mail', 'ghjghc');

-- --------------------------------------------------------

--
-- Table structure for table `session_tb`
--

CREATE TABLE `session_tb` (
  `session_id` varchar(500) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `car_wash` int(10) NOT NULL,
  `car_battery` int(15) NOT NULL,
  `car_engine` int(10) NOT NULL,
  `car_wheel` int(10) NOT NULL,
  `fullrepair` int(10) NOT NULL,
  `windsheild` int(10) NOT NULL,
  `total_amt` varchar(12) NOT NULL,
  `delivery_time` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session_tb`
--

INSERT INTO `session_tb` (`session_id`, `name`, `email`, `car_wash`, `car_battery`, `car_engine`, `car_wheel`, `fullrepair`, `windsheild`, `total_amt`, `delivery_time`) VALUES
('6878', 'rohan', 'rohan@gmail.com', 300, 2000, 0, 2000, 8000, 0, '12300', '5.6');

-- --------------------------------------------------------

--
-- Table structure for table `signin_tb`
--

CREATE TABLE `signin_tb` (
  `name` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `carcompany` varchar(20) NOT NULL,
  `carmodelname` varchar(25) NOT NULL,
  `rtono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signin_tb`
--

INSERT INTO `signin_tb` (`name`, `phone`, `email`, `password`, `carcompany`, `carmodelname`, `rtono`) VALUES
('dhiraj', '4512789630', 'dhiraj@gmail.com', 'Dhiarj@123', 'BMW', 'BMWX1', 'mh02cf8080'),
('rohan', '4512789630', 'rohan@gmail.com', 'Rohan@123', 'BMW', 'BMWX3', 'mh02cf8052');

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `billno` int(100) NOT NULL,
  `date` varchar(10) NOT NULL,
  `name` varchar(35) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `carcompany` varchar(30) NOT NULL,
  `carmodelname` varchar(30) NOT NULL,
  `rtono` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`billno`, `date`, `name`, `phone`, `email`, `password`, `carcompany`, `carmodelname`, `rtono`) VALUES
(1, '14-01-2023', 'rohan', '4512789630', 'rohan@gmail.com', 'Rohan@123', 'Mahindra', 'Mahindra XUV300', 'MH-20-fw-8765'),
(2, '01-02-2023', 'Deepika', '9874512630', 'deepika12@gmail.com', 'Deepika', 'Mahindra', 'XUV700', 'mh02cf8040'),
(3, '01-02-2023', 'ravi', '7845129645', 'ravi12@gmail.com', 'Ravi@12', 'TATA', 'TATA NEXON', 'mh02cf7040'),
(4, '01-02-2023', 'dhiraj', '9874511542', 'dhiraj@gmail.com', 'Dhiraj@123', 'Hundai', 'Creta', 'mh20fe1245');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `session_tb`
--
ALTER TABLE `session_tb`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`billno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `adminid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `billno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
