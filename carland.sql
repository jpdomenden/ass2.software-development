-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 01:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carland`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Customers_id` int(11) NOT NULL,
  `Customers_mobile` int(11) NOT NULL,
  `Customers_name` varchar(250) DEFAULT NULL,
  `Customers_email` varchar(250) NOT NULL,
  `Customers_streetname` varchar(250) NOT NULL,
  `Customers_city` varchar(250) NOT NULL,
  `Customers_state` varchar(250) NOT NULL,
  `Customers_postcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Employee_id` int(11) NOT NULL,
  `Employee_mobile` int(11) NOT NULL,
  `Employee_name` varchar(250) DEFAULT NULL,
  `Employee_email` varchar(250) NOT NULL,
  `Employee_streetname` varchar(250) NOT NULL,
  `Employee_city` varchar(250) NOT NULL,
  `Employee_state` varchar(250) NOT NULL,
  `Employee_postcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `Invoice_id` int(11) NOT NULL,
  `GST_number` int(11) NOT NULL,
  `Total_amount` decimal(10,2) NOT NULL,
  `GST_amount` decimal(10,2) NOT NULL,
  `Sales_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `Sales_id` int(11) NOT NULL,
  `Timestamp` datetime NOT NULL,
  `Vehicle_id` int(11) DEFAULT NULL,
  `Employee_id` int(11) DEFAULT NULL,
  `Customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `Vehicle_id` int(11) NOT NULL,
  `Make` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Year` int(11) NOT NULL,
  `Stock_number` int(11) DEFAULT NULL,
  `Doors` int(11) NOT NULL,
  `Engine` int(11) NOT NULL,
  `Color` varchar(50) NOT NULL,
  `Mileage` int(11) NOT NULL,
  `Seats` int(11) NOT NULL,
  `Safety_rating` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`Vehicle_id`, `Make`, `Model`, `Year`, `Stock_number`, `Doors`, `Engine`, `Color`, `Mileage`, `Seats`, `Safety_rating`, `Price`) VALUES
(100, 'Toyota', 'Corolla', 2000, 500, 4, 2, 'white', 100000, 5, 4, 1000),
(101, 'Holden', 'Commodore', 2001, 501, 4, 2, 'Black', 50000, 4, 5, 2000),
(102, 'Suzuki', 'Swift', 2010, 502, 4, 1, 'Red', 150000, 5, 3, 1500),
(104, 'Mercedes', 'Benz', 0, NULL, 0, 0, '', 0, 0, 0, 0),
(106, 'Honda', 'Logo', 1991, 506, 4, 1, 'Red', 150000, 5, 3, 1200),
(107, 'Toyota', 'Landcruiser', 1991, 507, 5, 2, 'Grey', 150000, 7, 5, 10000),
(109, 'jaguar', 'xd', 1221, 509, 4, 3, 'red', 1023, 45, 3, 12121),
(274, 'Mercedes', 'Logo', 1221, 1221, 4, 4, 'Red', 1000000, 4, 3, 11),
(987, 'hyundai', 'susimtso', 987, 987, 987, 987, '987', 987, 987, 987, 987);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `Wishlist_id` int(11) NOT NULL,
  `Vehicle_id` int(11) DEFAULT NULL,
  `Customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customers_id`),
  ADD UNIQUE KEY `Customers_name` (`Customers_name`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Employee_id`),
  ADD UNIQUE KEY `Employee_name` (`Employee_name`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`Invoice_id`),
  ADD KEY `Sales_id` (`Sales_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`Sales_id`),
  ADD KEY `Vehicle_id` (`Vehicle_id`),
  ADD KEY `Employee_id` (`Employee_id`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`Vehicle_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`Wishlist_id`),
  ADD KEY `Vehicle_id` (`Vehicle_id`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Customers_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `Employee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `Invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `Sales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `Vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=988;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `Wishlist_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`Sales_id`) REFERENCES `sales` (`Sales_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`Vehicle_id`) REFERENCES `vehicles` (`Vehicle_id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`Employee_id`) REFERENCES `employees` (`Employee_id`),
  ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`Customer_id`) REFERENCES `customers` (`Customers_id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`Vehicle_id`) REFERENCES `vehicles` (`Vehicle_id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`Customer_id`) REFERENCES `customers` (`Customers_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
