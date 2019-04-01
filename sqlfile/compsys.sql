-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2019 at 11:04 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `surname` char(25) NOT NULL,
  `forename` char(25) NOT NULL,
  `town` char(20) NOT NULL,
  `county` char(20) NOT NULL DEFAULT '',
  `tel` char(15) NOT NULL,
  `type` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `surname`, `forename`, `town`, `county`, `tel`, `type`) VALUES
(1, 'Alam', 'Nazmul', 'Castleisland', 'Kerry', '0833114171', ''),
(2, 'Sadiq', 'Samina', 'Roscrea', 'Tipperary', '0879820417', ''),
(3, 'Dowling', 'Sam', 'Castleisland', 'Kerry', '0872183569', ''),
(4, 'Bluett', 'Luke', 'Abbeyfeale', 'Limerick', '0868780756', ''),
(5, 'Abdul', 'Naiem', 'Castleislandd', 'Kerry', '0877187552', ''),
(6, 'Abdul', 'Niamh', 'Castleisland', 'Kerry', '0872183569', ''),
(7, 'Joe Landers', 'John', 'Anascaul', 'Kerry', '0872183569', ''),
(8, 'Killian', 'Ross', 'Tralee', 'Kerry', '0872183569', ''),
(9, 'O\'Sullivan', 'Daniel', 'Killarney', 'Kerry', '0872183569', ''),
(10, 'Hossain', 'Azad', 'Tralee', 'Kerry', '0871234567', ''),
(14, 'Afzal', 'Aquib', 'Arrah', 'Delhi', '9650433734', 'customer');

-- --------------------------------------------------------

--
-- Stand-in structure for view `monthlyrepairs`
-- (See below for the actual view)
--
CREATE TABLE `monthlyrepairs` (
`status` enum('New','In Progress','Resolved','Waiting for Parts','Waiting for Customer','Validated','Invoiced','Estimate Assigned')
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `ordItems_id` int(11) NOT NULL,
  `ord_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) DEFAULT NULL,
  `total` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL,
  `rep_id` int(11) NOT NULL DEFAULT '0',
  `staff_id` int(11) NOT NULL DEFAULT '0',
  `ordDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `repairs`
--

CREATE TABLE `repairs` (
  `Rep_ID` int(11) NOT NULL,
  `Cust_ID` int(11) NOT NULL,
  `Staff_ID` int(11) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `DeviceType` enum('Laptop','Desktop','Printer','Other') NOT NULL,
  `Brand` varchar(30) NOT NULL,
  `Model` varchar(30) NOT NULL,
  `OS` enum('Windows 7','Windows 8','Windows Vista','Windows Older','MacOS','Linux','Other') NOT NULL,
  `WorkDone` varchar(500) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Profit` int(11) NOT NULL,
  `Comment` varchar(500) NOT NULL,
  `RepairDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CollectionDate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` enum('New','In Progress','Resolved','Waiting for Parts','Waiting for Customer','Validated','Invoiced','Estimate Assigned') NOT NULL DEFAULT 'New',
  `Date` date NOT NULL,
  `PaymentReceivedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repairs`
--

INSERT INTO `repairs` (`Rep_ID`, `Cust_ID`, `Staff_ID`, `Description`, `DeviceType`, `Brand`, `Model`, `OS`, `WorkDone`, `Quantity`, `Amount`, `Profit`, `Comment`, `RepairDate`, `CollectionDate`, `Status`, `Date`, `PaymentReceivedDate`) VALUES
(1, 10, 2, 'Paper stuck', 'Printer', 'HP', 'Inkjet', 'Other', '', 0, 0, 0, '', '2015-01-01 19:34:24', '2015-01-12 18:21:00', 'New', '0000-00-00', '0000-00-00'),
(2, 1, 1, 'Motherboard Problem', 'Laptop', 'Alienware', 'M15x', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 20:45:52', '2014-12-25 17:29:18', 'Waiting for Customer', '0000-00-00', '0000-00-00'),
(3, 1, 1, 'Virus Removal', 'Laptop', 'Dell', 'D360', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 20:46:24', NULL, 'New', '0000-00-00', '0000-00-00'),
(4, 1, 1, 'Virus Removal', 'Laptop', 'Dell', 'D360', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 20:46:26', NULL, 'In Progress', '0000-00-00', '0000-00-00'),
(5, 1, 1, 'Virus Removal', 'Laptop', 'Dell', 'D360', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 20:46:26', NULL, 'Resolved', '0000-00-00', '0000-00-00'),
(6, 1, 1, 'Virus Removal', 'Laptop', 'Dell', 'D360', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 20:46:26', NULL, 'Waiting for Parts', '0000-00-00', '0000-00-00'),
(7, 1, 1, 'Virus Removal', 'Laptop', 'Dell', 'D360', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 20:46:27', NULL, 'Invoiced', '0000-00-00', '0000-00-00'),
(8, 1, 1, 'Virus Removal', 'Laptop', 'Dell', 'D360', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 20:46:27', NULL, 'Estimate Assigned', '0000-00-00', '0000-00-00'),
(9, 1, 1, 'Virus Removal', 'Laptop', 'Dell', 'D360', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 20:46:27', NULL, 'Validated', '0000-00-00', '0000-00-00'),
(10, 1, 1, 'Virus Removal', 'Laptop', 'Dell', 'D360', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 20:46:27', NULL, 'In Progress', '0000-00-00', '0000-00-00'),
(11, 1, 1, 'Virus Removal', 'Laptop', 'Dell', 'D360', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 20:46:27', NULL, 'New', '0000-00-00', '0000-00-00'),
(12, 1, 1, 'Virus Removal', 'Laptop', 'Dell', 'D360', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 20:46:28', NULL, 'Resolved', '0000-00-00', '0000-00-00'),
(13, 1, 1, 'Virus Removal', 'Laptop', 'Dell', 'D360', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 20:46:28', NULL, 'Resolved', '0000-00-00', '0000-00-00'),
(14, 1, 1, 'Virus Removal', 'Laptop', 'Dell', 'D360', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 20:46:28', NULL, 'Resolved', '0000-00-00', '0000-00-00'),
(15, 1, 1, 'Virus Removal', 'Laptop', 'Dell', 'D360', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 20:46:28', NULL, 'New', '0000-00-00', '0000-00-00'),
(16, 1, 1, 'Virus Removal', 'Laptop', 'Dell', 'D360', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 20:46:28', NULL, 'New', '0000-00-00', '0000-00-00'),
(17, 1, 1, 'Virus Removal', 'Laptop', 'Dell', 'D360', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 20:46:28', NULL, 'New', '0000-00-00', '0000-00-00'),
(18, 1, 1, 'Virus Removal', 'Desktop', 'Dell', 'D360', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 20:46:29', '2014-12-25 19:40:08', 'New', '0000-00-00', '0000-00-00'),
(19, 1, 1, 'Office Installation\r\nPrinter driver\r\nAnti-virus Installation', 'Laptop', 'Lenovo', 'ThinkCentre Edge E73', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 20:46:29', '2014-12-25 17:22:04', 'New', '0000-00-00', '0000-00-00'),
(20, 1, 1, 'Software Installation', 'Laptop', 'Apple', 'Macbook Pro', 'Windows 7', '', 0, 0, 0, '', '2014-12-16 22:01:07', '2014-12-25 17:09:10', 'New', '0000-00-00', '0000-00-00'),
(21, 2, 1, 'BSOD', 'Laptop', 'Lenovo', 'ThinkPad Edge E545', 'Windows 8', '', 0, 0, 0, '', '2014-12-25 19:29:02', NULL, 'New', '0000-00-00', '0000-00-00'),
(22, 3, 1, 'Hinges Broke', 'Laptop', 'Toshiba', 'Satellite Pro R50-B-', 'Linux', '', 0, 0, 0, '', '2014-12-25 19:34:24', NULL, 'New', '0000-00-00', '0000-00-00'),
(23, 4, 1, 'Test', 'Desktop', 'Apple', 'MacBook Pro', 'MacOS', '', 0, 0, 0, '', '2019-03-26 09:24:02', NULL, 'New', '0000-00-00', '0000-00-00'),
(24, 1, 1, 'test', 'Printer', 'Apple', 'MacBook Pro', 'Windows 8', 'test', 12, 1500, 45, 'test', '2019-03-26 10:01:06', NULL, 'In Progress', '0000-00-00', '0000-00-00'),
(25, 1, 1, 'test', 'Printer', 'Apple', 'MacBook Pro', 'Windows 8', 'test', 12, 1500, 45, 'test', '2019-03-26 10:02:13', NULL, 'In Progress', '2019-01-02', '2019-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `forename` char(25) NOT NULL,
  `surname` char(25) NOT NULL,
  `username` varchar(11) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `town` char(20) DEFAULT NULL,
  `county` char(20) DEFAULT NULL,
  `tel` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `forename`, `surname`, `username`, `password`, `email`, `town`, `county`, `tel`) VALUES
(1, 'Nazmul', 'Alam', 'admin', 'admin', 'danazzy@live.com', 'Castleisland', 'Kerry', '0833114171'),
(2, 'Samina', 'Nazmul Alam', 'Samboo', 'mag1cwand', 'Saminas14@hotmail.com', 'Roscrea', 'Tipperary', '0879820417'),
(3, 'Aquib', 'Afzal', 'aquibzahidi', 'Motiongold', 'aquibzahidi@gmail.com', 'Arrah', 'India', '9650433734');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `description` varchar(40) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `description`, `quantity`, `price`) VALUES
(1, 'Labour', 1000, '45.00'),
(2, 'Rush Labour', 500, '75.00'),
(3, 'Printer', 1, '15.00'),
(4, 'Anti-Virus Software', 1, '30.00'),
(5, 'Backup & Restore', 1, '45.00'),
(6, '500GB HDD', 5, '25.99'),
(7, '128GB SSD Drive', 5, '69.99');

-- --------------------------------------------------------

--
-- Structure for view `monthlyrepairs`
--
DROP TABLE IF EXISTS `monthlyrepairs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `monthlyrepairs`  AS  select `repairs`.`Status` AS `status`,count(`repairs`.`Status`) AS `total` from `repairs` where (month(`repairs`.`RepairDate`) = extract(month from now())) group by `repairs`.`Status` order by `repairs`.`RepairDate` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`ordItems_id`,`ord_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`,`rep_id`);

--
-- Indexes for table `repairs`
--
ALTER TABLE `repairs`
  ADD PRIMARY KEY (`Rep_ID`,`Cust_ID`,`Staff_ID`),
  ADD KEY `fk_Repairs_Cust` (`Cust_ID`),
  ADD KEY `fk_Repairs_Staff` (`Staff_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `ordItems_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repairs`
--
ALTER TABLE `repairs`
  MODIFY `Rep_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `repairs`
--
ALTER TABLE `repairs`
  ADD CONSTRAINT `fk_Repairs_Cust` FOREIGN KEY (`Cust_ID`) REFERENCES `customers` (`cust_id`),
  ADD CONSTRAINT `fk_Repairs_Staff` FOREIGN KEY (`Staff_ID`) REFERENCES `staff` (`staff_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
