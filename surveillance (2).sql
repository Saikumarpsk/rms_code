-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2017 at 11:40 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surveillance`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset_id_list`
--

CREATE TABLE `asset_id_list` (
  `asset_id` int(11) NOT NULL,
  `asset_name` varchar(120) DEFAULT NULL,
  `asset_short_name` varchar(120) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `region_id` varchar(120) NOT NULL,
  `continent_id` varchar(120) NOT NULL,
  `province_id` varchar(120) NOT NULL,
  `country_id` varchar(120) NOT NULL,
  `field_id` varchar(120) NOT NULL,
  `division_id` varchar(120) NOT NULL,
  `asset_loc_lat` varchar(120) NOT NULL,
  `asset_loc_long` varchar(120) NOT NULL,
  `asset_location_id` varchar(120) NOT NULL,
  `asset_timezone` varchar(120) NOT NULL,
  `asset_land_sea` varchar(120) NOT NULL,
  `asset_pad_platform` varchar(120) NOT NULL,
  `asset_well_method` varchar(120) NOT NULL,
  `asset_type1` varchar(120) NOT NULL,
  `asset_type2` varchar(120) NOT NULL,
  `asset_prod_method` varchar(120) NOT NULL,
  `asset_lift_type` varchar(120) NOT NULL,
  `asset_secondary_prod_method` varchar(120) NOT NULL,
  `asset_res_name` varchar(120) NOT NULL,
  `asset_res_type` varchar(120) NOT NULL,
  `asset_lift_contract_type` varchar(120) NOT NULL,
  `id_created` varchar(120) NOT NULL,
  `ts_created` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset_id_list`
--

INSERT INTO `asset_id_list` (`asset_id`, `asset_name`, `asset_short_name`, `customer_id`, `region_id`, `continent_id`, `province_id`, `country_id`, `field_id`, `division_id`, `asset_loc_lat`, `asset_loc_long`, `asset_location_id`, `asset_timezone`, `asset_land_sea`, `asset_pad_platform`, `asset_well_method`, `asset_type1`, `asset_type2`, `asset_prod_method`, `asset_lift_type`, `asset_secondary_prod_method`, `asset_res_name`, `asset_res_type`, `asset_lift_contract_type`, `id_created`, `ts_created`) VALUES
(1, 'Asset101', 'A101', 1, 'TS', 'IND', 'TEST', 'india', 'field_India_1', 'TEST', '123.444.56665.4', '5443.444.56665.4', 'TEST', 'TEST', 'TEST', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Asset102', 'A102', 1, 'TS', 'IND', 'TEST', 'india', 'field_India_2', 'TEST', '123.444.56665.4', '5443.444.56665.4', 'TEST', 'TEST', 'TEST', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Asset110', 'A110', 1, 'NW', 'NEW', 'TEST', 'New zealand', 'field_newzealand_1', 'TEST', '123.444.56665.4', '5443.444.56665.4', 'TEST', 'TEST', 'TEST', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'Asset111', 'A111', 1, 'NW', 'NEW', 'TEST', 'New zealand', 'field_newzealand_2', 'TEST', '123.444.56665.4', '5443.444.56665.4', 'TEST', 'TEST', 'TEST', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `cust_name_parent` varchar(120) NOT NULL,
  `cust_short_name` varchar(120) NOT NULL,
  `parent_HQ` varchar(120) NOT NULL,
  `address_HQ` varchar(120) NOT NULL,
  `id_created` varchar(120) NOT NULL,
  `ts_created` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `cust_name_parent`, `cust_short_name`, `parent_HQ`, `address_HQ`, `id_created`, `ts_created`) VALUES
(1, 'RELIANCE', 'saran', 'Telanga', 'Hyderabad', 'AS', ''),
(2, 'AIRTEL', 'bala', 'Telanga', 'Hyderabad', 'AB', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_branch`
--

CREATE TABLE `customer_branch` (
  `customer_branch_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cust_name_local` varchar(120) NOT NULL,
  `cust_local_shot_name` varchar(120) NOT NULL,
  `country_HQ` varchar(120) NOT NULL,
  `local_HQ` varchar(120) NOT NULL,
  `address_country` varchar(120) NOT NULL,
  `address_local` varchar(120) NOT NULL,
  `id_created` varchar(120) NOT NULL,
  `ts_created` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_branch`
--

INSERT INTO `customer_branch` (`customer_branch_id`, `customer_id`, `cust_name_local`, `cust_local_shot_name`, `country_HQ`, `local_HQ`, `address_country`, `address_local`, `id_created`, `ts_created`) VALUES
(1, 1, 'INDIA', 'ind', 'Delhi', 'Hyderand', 'Hi-tech city', 'address', 'address', ''),
(2, 1, 'New zealand', 'New', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `user_id` int(10) NOT NULL,
  `user_first` varchar(250) NOT NULL,
  `user_last` varchar(250) NOT NULL,
  `user_role` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_title` varchar(300) NOT NULL,
  `user_email_id` varchar(300) NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `user_country` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `user_first`, `user_last`, `user_role`, `user_title`, `user_email_id`, `user_password`, `user_country`) VALUES
(1, 'TEST', 'USER', 0, 'Production Analyst', 'user@gmail.com', 'user', 'canada');

-- --------------------------------------------------------

--
-- Table structure for table `user_mapping`
--

CREATE TABLE `user_mapping` (
  `user_map_id` int(11) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_branch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_mapping`
--

INSERT INTO `user_mapping` (`user_map_id`, `user_id`, `customer_id`, `customer_branch_id`) VALUES
(1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset_id_list`
--
ALTER TABLE `asset_id_list`
  ADD PRIMARY KEY (`asset_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer_branch`
--
ALTER TABLE `customer_branch`
  ADD PRIMARY KEY (`customer_branch_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_mapping`
--
ALTER TABLE `user_mapping`
  ADD PRIMARY KEY (`user_map_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `customer_branch_id` (`customer_branch_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset_id_list`
--
ALTER TABLE `asset_id_list`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer_branch`
--
ALTER TABLE `customer_branch`
  MODIFY `customer_branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_mapping`
--
ALTER TABLE `user_mapping`
  MODIFY `user_map_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `asset_id_list`
--
ALTER TABLE `asset_id_list`
  ADD CONSTRAINT `asset_id_list_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `customer_branch`
--
ALTER TABLE `customer_branch`
  ADD CONSTRAINT `customer_branch_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `user_mapping`
--
ALTER TABLE `user_mapping`
  ADD CONSTRAINT `user_mapping_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `user_mapping_ibfk_2` FOREIGN KEY (`customer_branch_id`) REFERENCES `customer_branch` (`customer_branch_id`),
  ADD CONSTRAINT `user_mapping_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users_table` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
