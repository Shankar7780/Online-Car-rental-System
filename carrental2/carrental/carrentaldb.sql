-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 01:47 PM
-- Server version: 8.0.29
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrentaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bid` int NOT NULL,
  `advance` decimal(15,2) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `message` varchar(400) NOT NULL,
  `bookingdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `pickuplocation` varchar(100) DEFAULT NULL,
  `billamount` decimal(12,2) NOT NULL,
  `car_id` varchar(12) DEFAULT NULL,
  `driver_id` int DEFAULT NULL,
  `customer_id` varchar(40) DEFAULT NULL,
  `variant_id` int DEFAULT NULL
);

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bid`, `advance`, `fromdate`, `todate`, `message`, `bookingdate`, `status`, `pickuplocation`, `billamount`, `car_id`, `driver_id`, `customer_id`, `variant_id`) VALUES
(1, '500.00', '2022-08-26', '2022-08-26', 'test', '2022-08-26 15:23:14', 'Completed', 'noida', '1000.00', 'HRXX12121', 1, 'ajay@gmail.com', 1),
(2, '500.00', '2023-06-08', '2023-06-08', 'test', '2023-06-08 17:09:15', 'Completed', 'Noida', '1000.00', 'HRXX12121', 2, 'amit@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `carno` varchar(12) NOT NULL,
  `modelyear` int NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Available',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `carv_id` int NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
);

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`carno`, `modelyear`, `status`, `active`, `createdon`, `carv_id`, `deleted`) VALUES
('HRXX12121', 2022, 'Available', 1, '2023-05-18 17:01:36', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `catname` varchar(30) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `photo` varchar(100) NOT NULL
);

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catname`, `description`, `photo`) VALUES
(1, 'Convertible', 'Convertible Car descr', 'cats/Cat63089710069fa7.18020166.jpg'),
(2, 'SUV', 'SUV Cars', 'cats/Cat6308971d4ebde3.58618084.jpg'),
(3, 'Sedan', 'Sedan Description', 'cats/Cat63089733da14e9.31388787.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `userid` varchar(40) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `gender` varchar(12) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`userid`, `uname`, `phone`, `gender`, `address`, `createdon`) VALUES
('ajay@gmail.com', 'Ajay Kumar', '9789877897', 'Male', 'Noida', '2022-08-26 15:22:21'),
('amit@gmail.com', 'Amit Kumar', '9788789789', 'Male', 'NA', '2023-06-08 17:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int NOT NULL,
  `dname` varchar(30) NOT NULL,
  `address` varchar(40) NOT NULL,
  `gender` varchar(12) NOT NULL,
  `licno` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `adhar` varchar(12) NOT NULL,
  `dob` date NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Available',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `exp` int DEFAULT NULL,
  `mstatus` varchar(12) DEFAULT NULL,
  `ratings` int DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `userid` varchar(30) DEFAULT NULL
);

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `dname`, `address`, `gender`, `licno`, `phone`, `adhar`, `dob`, `photo`, `status`, `active`, `createdon`, `exp`, `mstatus`, `ratings`, `deleted`, `userid`) VALUES
(1, 'Anil Kapoor', 'Noida', 'Male', '12312312', '9878979878', '123243643654', '1999-10-10', 'drivers/Driver630897a3972eb6.74997016.jpg', 'Available', 1, '2022-08-26 15:21:31', 5, 'Married', 4, 0, 'driver1'),
(2, 'Rajesh Kumar', 'NA', 'Male', 'DLNA12121', '9879890890', '123123123123', '1999-10-10', 'drivers/Driver6481bd23513468.88715508.jpg', 'Available', 1, '2023-06-08 17:06:03', 3, 'Married', 5, 0, 'driver2');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int NOT NULL,
  `ratings` int DEFAULT NULL,
  `feedback` varchar(1000) NOT NULL,
  `createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` varchar(40) NOT NULL
);

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `ratings`, `feedback`, `createdon`, `customer_id`) VALUES
(1, 4, 'test', '2023-05-18 17:03:00', 'ajay@gmail.com'),
(2, 5, 'test', '2023-06-08 17:10:28', 'amit@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `journeystages`
--

CREATE TABLE `journeystages` (
  `id` int NOT NULL,
  `stage` varchar(30) NOT NULL,
  `stagetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bid` int NOT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL
);

--
-- Dumping data for table `journeystages`
--

INSERT INTO `journeystages` (`id`, `stage`, `stagetime`, `bid`, `remarks`, `status`) VALUES
(1, 'Car Arrive', '2023-05-18 17:02:46', 1, 'test', ''),
(2, 'Journey Complete', '2023-05-18 17:02:52', 1, 'test', 'complete'),
(3, 'Car Arrive', '2023-06-08 17:10:09', 2, 'test', ''),
(4, 'Destination Reached', '2023-06-08 17:10:17', 2, 'done', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int NOT NULL,
  `driver_id` int NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `applydate` date NOT NULL
);

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `driver_id`, `fromdate`, `todate`, `reason`, `status`, `applydate`) VALUES
(1, 2, '2023-06-09', '2023-06-10', 'Sick Leave', 'Approved', '2023-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pid` int NOT NULL,
  `pymtdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cardno` varchar(20) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `amount` decimal(14,2) NOT NULL,
  `booking_id` int NOT NULL,
  `nameoncard` varchar(40) DEFAULT NULL,
  `complete` tinyint(1) NOT NULL
);

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`pid`, `pymtdate`, `cardno`, `remarks`, `amount`, `booking_id`, `nameoncard`, `complete`) VALUES
(1, '2022-08-26 15:23:14', '1241241241234123', 'New Booking money', '500.00', 1, 'test', 0),
(2, '2023-05-18 17:03:00', '1234123421341234', 'Payment Completed', '500.00', 1, 'Anand Singh', 1),
(3, '2023-05-18 17:03:00', '1234123421341234', 'Payment Completed', '500.00', 1, 'Anand Singh', 1),
(4, '2023-06-08 17:09:15', '2312312312312312', 'New Booking money', '500.00', 2, 'test', 0),
(5, '2023-06-08 17:10:28', '1234123421341234', 'Payment Completed', '500.00', 2, 'test', 1),
(6, '2023-06-08 17:10:28', '1234123421341234', 'Payment Completed', '500.00', 2, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(40) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `role` varchar(30) DEFAULT NULL
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `uname`, `pwd`, `role`) VALUES
('admin', 'admin', 'admin', 'Admin'),
('ajay@gmail.com', 'Ajay Kumar', 'anand', 'Customer'),
('amit@gmail.com', 'Amit Kumar', 'anand', 'Customer'),
('driver1', 'Anil Kapoor', 'anand', 'Driver'),
('driver2', 'Rajesh Kumar', 'anand', 'Driver');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `cid` int NOT NULL,
  `title` varchar(30) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `fueltype` varchar(20) NOT NULL,
  `capacity` int NOT NULL,
  `ac` tinyint(1) NOT NULL,
  `powerdoorlock` tinyint(1) NOT NULL,
  `powersteering` tinyint(1) NOT NULL,
  `airbag` tinyint(1) NOT NULL,
  `powerwindows` tinyint(1) NOT NULL,
  `cdplayer` tinyint(1) NOT NULL,
  `centrallock` tinyint(1) NOT NULL,
  `gps` tinyint(1) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int NOT NULL
);

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`cid`, `title`, `price`, `fueltype`, `capacity`, `ac`, `powerdoorlock`, `powersteering`, `airbag`, `powerwindows`, `cdplayer`, `centrallock`, `gps`, `photo`, `createdon`, `category_id`) VALUES
(1, 'BMW', '1000.00', 'Petrol', 6, 1, 1, 1, 1, 1, 1, 1, 1, 'pics/Var630897627ed4c5.90845080.jpg', '2022-08-26 15:20:26', 2),
(2, 'Cabrio', '1500.00', 'Petrol', 4, 0, 1, 1, 1, 1, 0, 0, 1, 'pics/Var630897829b5810.02000085.jpg', '2022-08-26 15:20:58', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `bookings_car_id_4a79c848_fk_registeredcars_carno` (`car_id`),
  ADD KEY `bookings_driver_id_cfde7b3a_fk_drivers_id` (`driver_id`),
  ADD KEY `bookings_customer_id_621160fd_fk_customers_userid` (`customer_id`),
  ADD KEY `bookings_variant_id_883e5924_fk_cars_cid` (`variant_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`carno`),
  ADD KEY `registeredcars_carv_id_32e13efc_fk_cars_cid` (`carv_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_customer_id_a064ac85_fk_customers_userid` (`customer_id`);

--
-- Indexes for table `journeystages`
--
ALTER TABLE `journeystages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `journeystages_bookings_id_3ebefe75_fk_bookings_bid` (`bid`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `payments_booking_id_fa2b6c3e_fk_bookings_bid` (`booking_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `cars_category_id_1c5cd8cd_fk_brands_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `journeystages`
--
ALTER TABLE `journeystages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `cid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_car_id_4a79c848_fk_registeredcars_carno` FOREIGN KEY (`car_id`) REFERENCES `cars` (`carno`),
  ADD CONSTRAINT `bookings_customer_id_621160fd_fk_customers_userid` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`userid`),
  ADD CONSTRAINT `bookings_driver_id_cfde7b3a_fk_drivers_id` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`),
  ADD CONSTRAINT `bookings_variant_id_883e5924_fk_cars_cid` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`cid`);

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `registeredcars_carv_id_32e13efc_fk_cars_cid` FOREIGN KEY (`carv_id`) REFERENCES `variants` (`cid`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_customer_id_a064ac85_fk_customers_userid` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`userid`);

--
-- Constraints for table `journeystages`
--
ALTER TABLE `journeystages`
  ADD CONSTRAINT `journeystages_bookings_id_3ebefe75_fk_bookings_bid` FOREIGN KEY (`bid`) REFERENCES `bookings` (`bid`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_booking_id_fa2b6c3e_fk_bookings_bid` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`bid`);

--
-- Constraints for table `variants`
--
ALTER TABLE `variants`
  ADD CONSTRAINT `cars_category_id_1c5cd8cd_fk_brands_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
