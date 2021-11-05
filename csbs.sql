-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2021 at 10:53 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_pw`) VALUES
(2, 'csbs@gmail.com', '$2y$10$hTKe8EK5TNeF8/bW2loELO/4oiMEMGXn/aHc3uyAeA83ZvnNgw0Ra');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_phone` varchar(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `list_name` varchar(255) NOT NULL,
  `booking_address` varchar(255) NOT NULL,
  `booking_price` int(11) NOT NULL,
  `booking_date` varchar(15) NOT NULL,
  `booking_time` varchar(10) NOT NULL,
  `booking_message` varchar(255) NOT NULL,
  `booking_tools` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `worker2_id` int(11) NOT NULL,
  `worker3_id` int(11) NOT NULL,
  `worker4_id` int(11) NOT NULL,
  `booking_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `pay_method` varchar(255) NOT NULL,
  `worker_confirm` int(11) NOT NULL,
  `worker2_confirm` int(11) NOT NULL,
  `worker3_confirm` int(11) NOT NULL,
  `worker4_confirm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_phone`, `service_name`, `list_name`, `booking_address`, `booking_price`, `booking_date`, `booking_time`, `booking_message`, `booking_tools`, `cust_id`, `worker_id`, `worker2_id`, `worker3_id`, `worker4_id`, `booking_status`, `pay_method`, `worker_confirm`, `worker2_confirm`, `worker3_confirm`, `worker4_confirm`) VALUES
(55, '0111111', 'Office Cleaning', '4 hours+1 worker', 'penang', 370, '2021-11-02', '8:00', '', 0, 9, 0, 0, 0, 0, 'Pending', 'cash', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking_history`
--

CREATE TABLE `booking_history` (
  `bhistory_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `booking_phone` varchar(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `list_name` varchar(255) NOT NULL,
  `booking_address` varchar(255) NOT NULL,
  `booking_price` int(11) NOT NULL,
  `booking_date` varchar(255) NOT NULL,
  `booking_time` varchar(255) NOT NULL,
  `booking_message` varchar(255) NOT NULL,
  `booking_tools` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `worker2_id` int(11) NOT NULL,
  `worker3_id` int(11) NOT NULL,
  `worker4_id` int(11) NOT NULL,
  `rating` double NOT NULL,
  `review` varchar(255) NOT NULL,
  `service_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_history`
--

INSERT INTO `booking_history` (`bhistory_id`, `cust_id`, `booking_phone`, `service_name`, `list_name`, `booking_address`, `booking_price`, `booking_date`, `booking_time`, `booking_message`, `booking_tools`, `worker_id`, `worker2_id`, `worker3_id`, `worker4_id`, `rating`, `review`, `service_status`) VALUES
(2, 9, '010-233', 'Office Cleaning', '4 hours+1 worker', 'penang', 300, '2021-10-22', '8:00', '', 1, 21, 22, 23, 24, 5, 'Very good', 1),
(3, 9, '010-2223333', 'Office Cleaning', '4 hours+1 worker', '10,kerakuan,Jalan Satu Dua yoga, 19000 jelutong', 385, '2021-10-31', '8:00', '', 1, 21, 0, 0, 0, 3.5, 'good good', 1),
(4, 12, '010-2122222', 'Office Cleaning', '4 hours+1 worker', '20,pen,Jalan Satu Dua yoga ,14200,butterworth', 380, '2021-10-31', '8:00', '', 0, 21, 0, 0, 0, 4.5, 'good', 1),
(5, 12, '0102102222', 'Household Cleaning', '4 hours+2 workers', '20,penang', 100, '2021-10-31', '8:00', '', 0, 21, 22, 0, 0, 4.5, 'good', 1),
(6, 9, '01111', 'Renovation Cleaning', '8 hours+4 workers', 'penang', 800, '2021-10-31', '8:00', '', 0, 21, 22, 25, 24, 5, 'great', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `cust_pw` varchar(255) NOT NULL,
  `cust_phoneNo` varchar(255) NOT NULL,
  `cust_address` varchar(255) NOT NULL,
  `cust_coin` int(11) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_email`, `cust_pw`, `cust_phoneNo`, `cust_address`, `cust_coin`, `created_date`) VALUES
(9, 'Ken', 'ff@gmail.com', '123', '0111111', 'penang', 150, '2021-10-30 11:19:37'),
(10, 'Guest#', 'ff2@gmail.com', '123', '', '', 0, '2021-10-30 11:19:37'),
(11, 'Guest#', 'ff@gmail.co', '123', '', '', 0, '2021-10-30 11:19:37'),
(12, 'CSBS', 'csbs@gmail.com', '123', '0102103325', '10,Penang', 50000, '2021-10-30 11:19:37'),
(13, 'csbsadmin', 'csbs2@gmail.com', '123', '010-510265', '24,penang', 100, '2021-10-30 19:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `expense_amount` double NOT NULL,
  `expense_type` varchar(255) NOT NULL,
  `expense_desc` varchar(255) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `expense_amount`, `expense_type`, `expense_desc`, `created_time`) VALUES
(6, 1900, 'Tools', 'cleaning', '2021-10-16 08:34:27'),
(7, 2000, 'Promote', 'at Youtube', '2021-10-20 15:15:45'),
(9, 200, 'Others', 'issues', '2021-10-20 15:35:06'),
(12, 10100, 'Salary', 'Salary for month 10', '2021-10-20 16:33:39'),
(15, 500, 'Others', 'issues', '2021-10-29 22:59:35'),
(16, 11800, 'Salary', 'Salary for month 11', '2021-11-01 22:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `list_id` int(11) NOT NULL,
  `list_name` varchar(255) NOT NULL,
  `list_start` varchar(255) NOT NULL,
  `list_end` varchar(255) NOT NULL,
  `list_price` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`list_id`, `list_name`, `list_start`, `list_end`, `list_price`, `service_name`) VALUES
(181, '8 hours+4 workers', '8:00', '16:00', 800, 'Renovation Cleaning'),
(192, '4 hours+1 worker', '8:00', '12:00', 380, 'Office Cleaning'),
(195, '4 hours+1 worker', '8:00', '12:00', 80, 'Household Cleaning'),
(196, '4 hours+2 workers', '8:00', '12:00', 100, 'Household Cleaning');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_logo` varchar(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_cover` varchar(255) NOT NULL,
  `service_nodolist` varchar(255) NOT NULL,
  `service_status` int(11) NOT NULL DEFAULT '0',
  `service_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_logo`, `service_name`, `service_cover`, `service_nodolist`, `service_status`, `service_created`) VALUES
(112, 'http://192.168.0.151:8080/cleaning/csbs.jpg', 'Household Cleaning', 'http:///192.168.0.151:8080/cleaning/th (2).jpg', '-no wash car', 1, '2021-10-11 03:30:28'),
(113, 'http:///192.168.0.151:8080/cleaning/th.jpg', 'Renovation Cleaning', 'http:///192.168.0.151:8080/cleaning/cleaning.jpg', '-No Washing Car\r\n-No Clean Animals', 1, '2021-10-24 20:52:50'),
(116, 'http:///192.168.0.151:8080/cleaning/th.jpg', 'Office Cleaning', 'http:///192.168.0.151:8080/cleaning/csbsw.jpg', '-no wash table', 1, '2021-10-29 21:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `off_date` date NOT NULL,
  `off_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `off_date`, `off_reason`) VALUES
(8, '2021-10-14', 'holiday'),
(9, '2021-11-13', 'holiday');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `voucher_id` int(11) NOT NULL,
  `voucher_name` varchar(255) NOT NULL,
  `voucher_type` varchar(255) NOT NULL,
  `voucher_amount` double NOT NULL,
  `expiry_date` date NOT NULL,
  `voucher_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`voucher_id`, `voucher_name`, `voucher_type`, `voucher_amount`, `expiry_date`, `voucher_status`) VALUES
(3, 'New Register User', 'festival', 10, '2021-10-12', 0),
(4, 'Raya', 'newuser', 10, '2021-10-05', 0),
(7, 'new2', 'festival', 15, '2021-10-31', 0),
(8, 'Deeve', 'festival', 15, '2021-10-30', 0),
(9, 'Deeve2', 'festival', 10, '2021-11-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `voucherlist`
--

CREATE TABLE `voucherlist` (
  `vl_id` int(11) NOT NULL,
  `voucher_name` varchar(255) NOT NULL,
  `voucher_amount` int(11) NOT NULL,
  `expiry_date` date NOT NULL,
  `cust_id` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `voucher_use` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `worker_id` int(11) NOT NULL,
  `worker_image` varchar(255) NOT NULL,
  `worker_name` varchar(255) NOT NULL,
  `worker_email` varchar(255) NOT NULL,
  `worker_pw` varchar(255) NOT NULL,
  `worker_salary` int(11) NOT NULL,
  `worker_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`worker_id`, `worker_image`, `worker_name`, `worker_email`, `worker_pw`, `worker_salary`, `worker_status`) VALUES
(21, 'http://192.168.0.151:8080/cleaning/th.jpg', 'Ken', 'ken@gmail.com', 'ken1234', 1600, 0),
(22, 'http:///192.168.0.151:8080/cleaning/csbsw.jpg', 'Thomas', 'abc@gmail.com', '123', 1800, 0),
(23, 'http:///192.168.0.151:8080/cleaning/csbsw.jpg', 'Raon', '123456@gmail.com', '1', 1300, 0),
(24, 'http:///192.168.0.151:8080/cleaning/csbsw.jpg', 'Federick', 'federick@gmail.com', '12345', 1500, 0),
(25, 'http:///192.168.0.151:8080/cleaning/cleaning.jpg', 'Robert', 'robert@gmail.com', '12345', 1900, 0),
(26, 'http:///192.168.0.151:8080/cleaning/th.jpg', 'Alexs', 'alexs@gmail.com', '123', 2000, 0),
(28, 'http:///192.168.0.151:8080/cleaning/th (2).jpg', 'kenderick', 'ken3@gmail.com', '123456', 1700, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `booking_history`
--
ALTER TABLE `booking_history`
  ADD PRIMARY KEY (`bhistory_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- Indexes for table `voucherlist`
--
ALTER TABLE `voucherlist`
  ADD PRIMARY KEY (`vl_id`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `booking_history`
--
ALTER TABLE `booking_history`
  MODIFY `bhistory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `voucherlist`
--
ALTER TABLE `voucherlist`
  MODIFY `vl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
