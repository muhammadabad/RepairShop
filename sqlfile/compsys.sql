-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2019 at 03:08 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

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
  `name` char(25) NOT NULL,
  `town` char(20) NOT NULL,
  `county` char(20) NOT NULL DEFAULT '',
  `tel` char(15) NOT NULL,
  `type` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `name`, `town`, `county`, `tel`, `type`) VALUES
(1, 'Aquib', 'Castleisland', 'Kerry', '0833114171', 'Vendor'),
(2, 'Adil', 'Roscrea', 'Tipperary', '0879820417', 'Vendor'),
(3, 'Danish', 'Castleisland', 'Kerry', '0872183569', 'Vendor'),
(4, 'Miran', 'Abbeyfeale', 'Limerick', '0868780756', 'Vendor'),
(5, '', 'Castleislandd', 'Kerry', '0877187552', ''),
(6, '', 'Castleisland', 'Kerry', '0872183569', ''),
(7, '', 'Anascaul', 'Kerry', '0872183569', ''),
(8, '', 'Tralee', 'Kerry', '0872183569', ''),
(9, '', 'Killarney', 'Kerry', '0872183569', ''),
(10, '', 'Tralee', 'Kerry', '0871234567', ''),
(14, '', 'Arrah', 'Delhi', '9650433734', 'Vendor'),
(15, '', 'delhi', 'india', '9999999999', 'Customer'),
(16, '', 'new Delhi', 'in', '991919191919', 'Vendor'),
(17, '', 'Delhi', 'New Delhi', '919547080844', 'Vendor'),
(18, 'tabish', 'new Delhi', 'in', '7992329802', 'Vendor'),
(19, 'yftyf', 'New Delhi', 'ijl', '99997999', 'Vendor'),
(20, 'Adil Afzal', 'ara', 'india', '9911961715', 'Customer'),
(21, 'ugzd', 'dbjd', 'djk', '999', 'Vendor');

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
  `Cust_Name` char(25) NOT NULL,
  `Staff_ID` int(11) NOT NULL,
  `DeviceType` enum('Laptop','Desktop','Printer','Other') NOT NULL,
  `Brand` varchar(30) NOT NULL,
  `Model` varchar(30) NOT NULL,
  `WorkDone` varchar(500) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Profit` int(11) NOT NULL,
  `Comment` varchar(500) NOT NULL,
  `RepairDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CollectionDate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` enum('New','In Progress','Resolved','Waiting for Parts','Waiting for Customer','Validated','Invoiced','Estimate Assigned') NOT NULL DEFAULT 'New',
  `PaymentReceivedDate` date DEFAULT NULL,
  `PaymentStatus` enum('Pending','Partially Paid','Paid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repairs`
--

INSERT INTO `repairs` (`Rep_ID`, `Cust_ID`, `Cust_Name`, `Staff_ID`, `DeviceType`, `Brand`, `Model`, `WorkDone`, `Quantity`, `Amount`, `Profit`, `Comment`, `RepairDate`, `CollectionDate`, `Status`, `PaymentReceivedDate`, `PaymentStatus`) VALUES
(1, 10, '', 2, 'Printer', 'HP', 'Inkjet', '', 0, 0, 0, '', '2015-01-01 19:34:24', '2015-01-12 18:21:00', 'New', '0000-00-00', 'Pending'),
(2, 1, '', 1, 'Laptop', 'Alienware', 'M15x', '', 0, 0, 0, '', '2014-12-16 20:45:52', '2014-12-25 17:29:18', 'Waiting for Customer', '0000-00-00', 'Pending'),
(3, 1, '', 1, 'Laptop', 'Dell', 'D360', '', 0, 0, 0, '', '2014-12-16 20:46:24', NULL, 'New', '0000-00-00', 'Pending'),
(4, 1, '', 1, 'Laptop', 'Dell', 'D360', '', 0, 0, 0, '', '2014-12-16 20:46:26', NULL, 'In Progress', '0000-00-00', 'Pending'),
(5, 1, '', 1, 'Laptop', 'Dell', 'D360', '', 0, 0, 0, '', '2014-12-16 20:46:26', NULL, 'Resolved', '0000-00-00', 'Pending'),
(6, 1, '', 1, 'Laptop', 'Dell', 'D360', '', 0, 0, 0, '', '2014-12-16 20:46:26', NULL, 'Waiting for Parts', '0000-00-00', 'Pending'),
(7, 1, '', 1, 'Laptop', 'Dell', 'D360', '', 0, 0, 0, '', '2014-12-16 20:46:27', NULL, 'Invoiced', '0000-00-00', 'Pending'),
(8, 1, '', 1, 'Laptop', 'Dell', 'D360', '', 0, 0, 0, '', '2014-12-16 20:46:27', NULL, 'Estimate Assigned', '0000-00-00', 'Pending'),
(9, 1, '', 1, 'Laptop', 'Dell', 'D360', '', 0, 0, 0, '', '2014-12-16 20:46:27', NULL, 'Validated', '0000-00-00', 'Pending'),
(10, 1, '', 1, 'Laptop', 'Dell', 'D360', '', 0, 0, 0, '', '2014-12-16 20:46:27', NULL, 'In Progress', '0000-00-00', 'Pending'),
(11, 1, '', 1, 'Laptop', 'Dell', 'D360', '', 0, 0, 0, '', '2014-12-16 20:46:27', NULL, 'New', '0000-00-00', 'Pending'),
(12, 1, '', 1, 'Laptop', 'Dell', 'D360', '', 0, 0, 0, '', '2014-12-16 20:46:28', NULL, 'Resolved', '0000-00-00', 'Pending'),
(13, 1, '', 1, 'Laptop', 'Dell', 'D360', '', 0, 0, 0, '', '2014-12-16 20:46:28', NULL, 'Resolved', '0000-00-00', 'Pending'),
(14, 1, '', 1, 'Laptop', 'Dell', 'D360', '', 0, 0, 0, '', '2014-12-16 20:46:28', NULL, 'Resolved', '0000-00-00', 'Pending'),
(15, 1, '', 1, 'Laptop', 'Dell', 'D360', '', 0, 0, 0, '', '2014-12-16 20:46:28', NULL, 'New', '0000-00-00', 'Pending'),
(16, 1, '', 1, 'Laptop', 'Dell', 'D360', '', 0, 0, 0, '', '2014-12-16 20:46:28', NULL, 'New', '0000-00-00', 'Pending'),
(17, 1, '', 1, 'Laptop', 'Dell', 'D360', '', 0, 0, 0, '', '2014-12-16 20:46:28', NULL, 'New', '0000-00-00', 'Pending'),
(18, 1, '', 1, 'Desktop', 'Dell', 'D360', '', 0, 0, 0, '', '2014-12-16 20:46:29', '2014-12-25 19:40:08', 'New', '0000-00-00', 'Pending'),
(19, 1, '', 1, 'Laptop', 'Lenovo', 'ThinkCentre Edge E73', '', 0, 0, 0, '', '2014-12-16 20:46:29', '2014-12-25 17:22:04', 'New', '0000-00-00', 'Pending'),
(20, 1, '', 1, 'Laptop', 'Apple', 'Macbook Pro', '', 0, 0, 0, '', '2014-12-16 22:01:07', '2014-12-25 17:09:10', 'New', '0000-00-00', 'Pending'),
(21, 2, '', 1, 'Laptop', 'Lenovo', 'ThinkPad Edge E545', '', 0, 0, 0, '', '2014-12-25 19:29:02', NULL, 'New', '0000-00-00', 'Pending'),
(22, 3, '', 1, 'Laptop', 'Toshiba', 'Satellite Pro R50-B-', '', 0, 0, 0, '', '2014-12-25 19:34:24', NULL, 'New', '0000-00-00', 'Pending'),
(23, 4, '', 1, 'Desktop', 'Apple', 'MacBook Pro', '', 0, 0, 0, '', '2019-03-26 09:24:02', NULL, 'New', '0000-00-00', 'Pending'),
(24, 1, '', 1, 'Printer', 'Apple', 'MacBook Pro', 'test', 12, 1500, 45, 'test', '2019-03-26 10:01:06', NULL, 'In Progress', '0000-00-00', 'Pending'),
(25, 1, '', 1, 'Printer', 'Apple', 'MacBook Pro', 'test', 12, 1500, 45, 'test', '2019-03-26 10:02:13', NULL, 'In Progress', '2019-02-03', 'Pending'),
(26, 14, '', 3, 'Laptop', 'MacBook', 'Air', 'done', 1, 100, 100, 'sss', '2019-03-26 10:38:45', NULL, 'New', '2019-03-22', 'Pending'),
(27, 14, '', 3, 'Laptop', 'MacBook', 'Air', 'done', 1, 100, 100, 'sss', '2019-03-26 10:42:34', NULL, 'New', '2019-03-22', 'Pending'),
(28, 14, '', 3, 'Laptop', 'MacBook', 'Air', 'nothing', 2, 10, 10, 'sssd', '2019-03-26 10:42:38', '2019-03-27 14:23:26', 'New', '2019-03-22', 'Pending'),
(29, 14, '', 3, 'Laptop', 'Asus', 'pro', 'ok', 5, 200, 200, 'bad', '2019-03-26 11:07:18', '2019-03-27 14:50:58', 'New', '2019-03-15', 'Pending'),
(30, 14, '', 3, 'Laptop', 'Apple', 'MacBook Air', 'OK', 2, 200, 200, 'checkc', '2019-03-27 14:21:11', '2019-03-30 15:00:14', 'Resolved', '2019-03-16', 'Partially Paid'),
(31, 14, '', 3, 'Laptop', 'apple', 'macbook', 'ok', 2, 200, 200, 'k', '2019-03-29 15:55:09', NULL, 'Resolved', '0000-00-00', 'Pending'),
(32, 16, '', 3, 'Desktop', 'Lenovo', 'x11knb', 'nothing', 1, 100, 100, 'aaaa', '2019-03-29 17:55:53', '2019-04-01 11:57:17', 'Resolved', '2019-03-29', 'Partially Paid'),
(33, 14, '', 3, 'Laptop', 'Asus', 'MacBook Air', 'nothing', 100, 100, 100, 'ss', '2019-04-01 06:35:12', '2019-04-01 12:12:14', 'Validated', '2019-04-25', 'Partially Paid'),
(34, 15, '', 3, 'Laptop', 'Apple', 'I&', 'done', 5, 55, 55, '555', '2019-04-01 07:14:01', NULL, 'New', '2019-04-12', 'Pending'),
(35, 14, '', 3, 'Desktop', 'Asus', 'x11knb', 'Change Screen', 0, 0, 0, '', '2019-04-02 09:29:49', NULL, 'New', '0000-00-00', 'Pending'),
(36, 15, '', 3, 'Laptop', 'Apple', 'MacBook', 'NO', 0, 100, 100, 'Checkc', '2019-04-02 09:36:06', '2019-04-02 15:26:44', 'Resolved', '2019-04-19', 'Paid'),
(37, 1, '', 3, 'Laptop', 's', 's', 's', 0, 0, 0, '', '2019-04-02 09:59:03', NULL, 'New', NULL, 'Pending'),
(38, 15, '', 3, 'Laptop', 'Lenovo', 'I&', 'Change Screen', 0, 0, 0, '', '2019-04-02 14:52:22', NULL, 'New', NULL, 'Pending'),
(39, 15, '', 3, 'Laptop', 'Lenovo', 'I&', 'Change Screen', 0, 0, 0, '', '2019-04-02 14:53:16', NULL, 'New', NULL, 'Pending'),
(40, 15, '', 3, 'Laptop', 'Lenovo', 'I&', 'Change Screen', 0, 0, 0, '', '2019-04-02 14:53:34', NULL, 'New', NULL, 'Pending'),
(41, 15, '', 3, 'Laptop', 'Lenovo', 'I&', 'Change Screen', 0, 0, 0, '', '2019-04-02 14:53:47', NULL, 'New', NULL, 'Pending'),
(42, 15, '', 3, 'Laptop', 'j,g', 'mhf', 'jthfj', 0, 0, 0, '', '2019-04-03 12:47:23', '2019-04-08 14:39:22', 'Invoiced', '0000-00-00', 'Pending'),
(43, 14, '', 3, 'Laptop', 'Lenovo', 'ckcidi', 'uhlewfh', 0, 0, 0, '', '2019-04-08 09:18:53', NULL, 'Invoiced', NULL, 'Pending'),
(44, 20, '', 3, 'Laptop', 'Asus', 'm1108', 'fkgyug', 0, 100, 88, 'mjghkhg', '2019-04-09 15:37:51', NULL, 'Waiting for Parts', NULL, 'Pending'),
(45, 20, '', 3, 'Laptop', 'Asus', 'm1108', 'fkgyug', 0, 100, 88, 'mjghkhg', '2019-04-09 15:58:15', NULL, 'Waiting for Parts', NULL, 'Pending'),
(46, 19, '', 3, 'Laptop', 'nag', 'hfs', 'mf', 0, 0, 0, '', '2019-04-09 15:59:04', NULL, 'New', NULL, 'Pending'),
(47, 1, '', 3, 'Laptop', 'Apple', 'Macbook Air', 'kdjf', 0, 199, 99, 'n/f', '2019-04-09 16:31:32', NULL, 'New', NULL, 'Pending'),
(48, 19, '', 3, 'Laptop', 'dms', 'mjweGD', 'MJEWHG', 0, 0, 0, '', '2019-04-09 17:16:23', NULL, 'Waiting for Parts', NULL, 'Pending'),
(49, 19, '', 3, 'Laptop', 'Apple', 'MacBook Air', 'nothing', 0, 0, 0, '', '2019-04-09 17:23:27', NULL, 'New', NULL, 'Pending'),
(50, 19, '', 3, 'Laptop', 'Asus', 'Air', 'Change Screen', 0, 0, 0, '', '2019-04-09 17:26:33', NULL, 'New', NULL, 'Pending'),
(51, 19, '', 3, 'Laptop', 'Asus', 'Air', 'Change Screen', 0, 0, 0, '', '2019-04-09 17:27:00', NULL, 'New', NULL, 'Pending'),
(52, 19, '', 3, 'Laptop', 'Asus', 'Air', 'Change Screen', 0, 0, 0, '', '2019-04-09 17:27:04', NULL, 'New', NULL, 'Pending'),
(53, 19, '', 3, 'Laptop', 'Asus', 'MacBook Air', 'nothing', 0, 0, 0, '', '2019-04-09 17:27:17', NULL, 'New', NULL, 'Pending'),
(54, 19, '', 3, 'Laptop', 'Asus', 'MacBook Air', 'nothing', 0, 0, 0, '', '2019-04-09 17:27:29', NULL, 'New', NULL, 'Pending'),
(55, 19, '', 3, 'Laptop', 'Asus', 'MacBook Air', 'nothing', 0, 0, 0, '', '2019-04-09 17:28:05', NULL, 'New', NULL, 'Pending'),
(56, 19, '', 3, 'Laptop', 'Asus', 'Air', 'Change Screen', 0, 0, 0, '', '2019-04-09 17:40:22', NULL, 'New', NULL, 'Pending'),
(57, 1, 'Aquib', 3, 'Laptop', 'Asus', 's', 'uhlewfh', 0, 0, 0, 'ok', '2019-04-09 19:45:20', '2019-04-10 02:10:24', 'Invoiced', '2019-04-17', 'Paid'),
(58, 1, '', 3, 'Laptop', 'asus', 'ss', 'ss', 0, 99, 99, 'jg', '2019-04-11 12:50:50', NULL, 'In Progress', NULL, 'Pending'),
(59, 1, '', 3, 'Desktop', 'asus', 'ss', 'ss', 0, 1, 1, '1', '2019-04-11 12:54:51', NULL, 'New', NULL, 'Pending'),
(60, 1, '', 3, 'Laptop', '1', '1', '1', 0, 0, 0, '', '2019-04-11 12:57:59', NULL, 'New', NULL, 'Pending'),
(61, 2, 'Adil', 3, 'Laptop', '1', '1', '1', 0, 0, 0, '', '2019-04-11 13:06:21', NULL, 'New', NULL, 'Pending');

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
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `Rep_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
