-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2015 at 03:59 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gold_loan`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE IF NOT EXISTS `borrower` (
  `id` int(255) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `age` int(150) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(15) DEFAULT '8080593361',
  `email` varchar(55) DEFAULT 'acharya.ganesh2@gmail.com',
  `occupation` varchar(200) DEFAULT 'job',
  `address` varchar(500) DEFAULT NULL,
  `pincode` int(15) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower`
--

INSERT INTO `borrower` (`id`, `name`, `age`, `gender`, `dob`, `phone`, `email`, `occupation`, `address`, `pincode`, `city`, `state`, `country`) VALUES
(3, 'Bhavesh Bangera', 23, 'male', '1992-12-23', '8689850935', 'bhaveshbangera@gmail.com', 'Student', 'Dombivli', 400003, 'Mumbai', 'Maharashtra', ' India'),
(4, 'Paritosh Neelmani', 22, 'male', '2015-08-19', '8729452395', 'paritosh@gmail.com', 'Student', 'Khandeshwar', 400004, 'Mumbai', 'Maharashtra', ' India'),
(5, 'Deepesh Rao', 22, 'male', '2015-08-02', '8128564722', 'rao.deepesh@gmail.com', 'Student', 'Kopar', 400005, 'Mumbai', 'Maharashtra', ' India'),
(6, 'Kiran Malvi', 23, 'male', '2015-08-25', '9929552389', 'malvi.kiran@gmail.com', 'Student', 'Dombivli', 400006, 'Mumbai', 'Maharastra', ' India'),
(8, 'Amit Srivastav', 23, 'male', '2015-08-18', '9929784521', 'Mr.srivastav@gmail.com', 'Student', 'Bhiwandi', 400008, 'Mumbai', 'Maharastra', ' India'),
(9, 'Anoop Sudhakaran', 23, 'male', '2015-08-20', '8572857828', 'sudhakaran.anoop@gmail.com', 'Student', 'Seawoods', 400009, 'Mumbai', 'Maharashtra', ' India'),
(10, 'Nikhil Nair', 23, 'male', '2015-08-18', '8587432176', 'nikhil@gmail.com', 'Student', 'Dombivli', 400010, 'Mumbai', 'Maharashtra', ' India'),
(11, 'Preet Gill', 22, 'male', '1992-02-12', '8734561290', 'gill.pranpreet@gmail.com', 'Student', 'Kharghar', 410207, 'Mumbai ', 'Maharashtra', ' India'),
(12, 'Milind Amrutkar', 23, 'male', '1992-08-27', '9029700369', ' milind.amrutkar@gmail.com', 'Student', 'Panvel', 410206, 'Mumbai', 'Maharashtra', ' India'),
(13, 'Piyush Shekhar', 22, 'male', '1993-07-06', '7838456122', ' shekhar.piyush@gmail.com', 'Student', 'Khandeshwar', 410207, 'Mumbai', 'Maharashtra', ' India'),
(14, 'Ganesh Acharya', 22, 'male', '1993-06-07', '8929384922', ' acharya.ganesh@gmail.com', 'Student', 'Dharavi', 410003, 'Mumbai', 'Maharashtra', ' India'),
(15, 'Nilesh Kadam', 22, 'male', '1993-02-02', '9023498763', ' kadam.nilesh@gmail.com', 'Student', 'Airoli', 410097, 'Mumbai', 'Maharashtra', ' India');

-- --------------------------------------------------------

--
-- Table structure for table `loan_details`
--

CREATE TABLE IF NOT EXISTS `loan_details` (
  `loan_id` int(20) NOT NULL,
  `cust_id` int(20) NOT NULL,
  `item_description` varchar(20) NOT NULL,
  `item_quantity` int(20) NOT NULL,
  `gross_wt` int(20) NOT NULL,
  `net_wt` int(20) NOT NULL,
  `amount_lend` int(20) NOT NULL,
  `interest` decimal(20,2) NOT NULL,
  `emidate` date DEFAULT NULL,
  `emi` int(20) NOT NULL,
  `auction_period` int(20) NOT NULL,
  `settlement` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `balance` int(20) NOT NULL,
  `paid` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_details`
--

INSERT INTO `loan_details` (`loan_id`, `cust_id`, `item_description`, `item_quantity`, `gross_wt`, `net_wt`, `amount_lend`, `interest`, `emidate`, `emi`, `auction_period`, `settlement`, `date`, `balance`, `paid`) VALUES
(10, 3, 'Chain', 1, 200, 198, 360000, '1.00', '0000-00-00', 7561, 2, 'no', '2015-07-09', 367561, 0),
(11, 4, 'Ring', 1, 240, 238, 100000, '2.50', NULL, 0, 0, 'no', '2015-09-09', 100000, 0),
(12, 9, 'Chain', 1, 400, 398, 120000, '2.00', '2015-09-09', 25440, 12, 'no', '2014-08-12', 145440, 1),
(14, 8, 'Bangles', 2, 350, 348, 60000, '2.50', '2015-09-09', 2100, 0, 'no', '2015-08-12', 61200, 2),
(15, 11, 'Mangalsutra', 1, 500, 498, 120000, '1.50', NULL, 20700, 12, 'no', '2014-09-28', 140700, 0),
(17, 6, 'Ring', 1, 250, 248, 20000, '2.50', '2015-09-10', 0, 0, 'no', '2015-07-07', 20000, 2),
(18, 3, 'Bangles', 2, 300, 297, 540000, '1.00', NULL, 61020, 11, 'no', '2014-10-07', 601020, 0),
(19, 11, 'Mangalsutra', 1, 100, 98, 18000, '2.50', '2015-08-27', 0, 0, 'yes', '2015-09-10', 0, 0),
(20, 10, 'Mangalsutra', 1, 150, 147, 270000, '1.50', '2015-09-01', 9720, 10, 'no', '2013-07-11', 279720, 16),
(21, 4, 'Bangles', 4, 200, 196, 360000, '1.00', NULL, 0, 0, 'no', '2015-09-01', 360000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `loan_emi`
--

CREATE TABLE IF NOT EXISTS `loan_emi` (
  `loan_id` int(20) NOT NULL,
  `cash_paid` int(20) NOT NULL,
  `transaction_date` date NOT NULL,
  `remarks` varchar(500) NOT NULL,
  `transaction_id` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_emi`
--

INSERT INTO `loan_emi` (`loan_id`, `cash_paid`, `transaction_date`, `remarks`, `transaction_id`) VALUES
(12, 6000, '2015-09-09', '3', 27),
(14, 900, '2015-09-09', '2', 28),
(20, 90000, '2015-09-10', '10', 29),
(20, 7200, '2015-09-01', '6', 30),
(17, 1050, '2015-09-10', '2', 31),
(19, 18000, '2015-08-27', '0', 32);

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE IF NOT EXISTS `master` (
  `interest_id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `percentage` varchar(20) NOT NULL,
  `description` varchar(500) NOT NULL,
  `schedule` varchar(20) NOT NULL,
  `fine` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`interest_id`, `name`, `amount`, `percentage`, `description`, `schedule`, `fine`) VALUES
(1, '', '5000', '2.50', 'This scheme is valid for amount<=5000', '6', '200'),
(2, 'level1', '10000', '2.00', 'for amount more than 100000', '12', '500'),
(3, 'level2', '50000', '1.50', 'for amount more than 50000', '12', '1000'),
(4, 'level3', '100000', '1.00', 'for amount more than 100000', '12', '1500');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `phone`, `role`) VALUES
('Bhavesh', 'bhavesh', 'bangera.bhavesh@gmail.com', '808059361', 'admin'),
('ganesh', 'psganesh', 'acharya.ganesh2@gmail.com', '8080593361', 'admin'),
('Kiran', 'kiran', 'malvi.kiran@gmail.com', '8639472637', 'manager'),
('Milind', 'milind', 'amrutkar.milind@gmail.com', '9029700369', 'admin'),
('Paritosh', 'paritosh', 'neelmani.paritosh@gmail.com', '8080593661', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_details`
--
ALTER TABLE `loan_details`
  ADD PRIMARY KEY (`loan_id`), ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `loan_emi`
--
ALTER TABLE `loan_emi`
  ADD PRIMARY KEY (`transaction_id`), ADD KEY `loan_id` (`loan_id`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`interest_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrower`
--
ALTER TABLE `borrower`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `loan_details`
--
ALTER TABLE `loan_details`
  MODIFY `loan_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `loan_emi`
--
ALTER TABLE `loan_emi`
  MODIFY `transaction_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `interest_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `loan_details`
--
ALTER TABLE `loan_details`
ADD CONSTRAINT `loan_details_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `borrower` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_emi`
--
ALTER TABLE `loan_emi`
ADD CONSTRAINT `loan_emi_ibfk_1` FOREIGN KEY (`loan_id`) REFERENCES `loan_details` (`loan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
