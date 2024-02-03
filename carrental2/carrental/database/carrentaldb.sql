-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 02:57 PM
-- Server version: 8.0.21
-- PHP Version: 8.0.0

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
  `status` varchar(20)  NOT NULL DEFAULT 'Pending',
  `pickuplocation` varchar(100) DEFAULT NULL,
  `billamount` decimal(12,2) NOT NULL,
  `car_id` varchar(12) DEFAULT NULL,
  `driver_id` int DEFAULT NULL,
  `customer_id` varchar(40) DEFAULT NULL,
  `variant_id` int DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `carno` varchar(12) NOT NULL,
  `modelyear` int NOT NULL,
  `status` varchar(20)  NOT NULL DEFAULT 'Available',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `carv_id` int NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
);

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
  `status` varchar(20)  NOT NULL DEFAULT 'Available',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `exp` int DEFAULT NULL,
  `mstatus` varchar(12) DEFAULT NULL,
  `ratings` int DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `userid` varchar(30) DEFAULT NULL
);

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
  `status` varchar(20)  DEFAULT 'Pending',
  `applydate` date NOT NULL
);

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
('admin', 'admin', 'admin', 'Admin');

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
  MODIFY `bid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `journeystages`
--
ALTER TABLE `journeystages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `cid` int NOT NULL AUTO_INCREMENT;

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
