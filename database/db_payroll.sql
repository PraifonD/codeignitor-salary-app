-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost

-- Generation Time: Nov 13, 2023 at 02:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_payroll`
--
CREATE DATABASE IF NOT EXISTS `db_payroll` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_payroll`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `employee_id` int(255) NOT NULL,
  `dateCreate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_password`, `employee_id`, `dateCreate`) VALUES
(1, 'admin1', 'f4c46ce68ec901307bea7b723c30f9eb3d6ae33a616d6dd0afc651c5879b4a63bfefbebbb9be47080546a489ddf6751946f0', 1, '2023-11-09 18:49:25'),
(2, 'admin2', 'pwd2', 2, '2023-11-10 05:39:14'),
(3, 'naphatome', '12345', 999, '2023-11-12 09:39:05');

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_password`, `employee_id`, `dateCreate`) VALUES
(1, 'admin1', 'f4c46ce68ec901307bea7b723c30f9eb3d6ae33a616d6dd0afc651c5879b4a63bfefbebbb9be47080546a489ddf6751946f0', 1, '2023-11-09 18:49:25'),
(2, 'admin2', 'pwd2', 2, '2023-11-10 05:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deduction`
--

CREATE TABLE `tbl_deduction` (
  `deduction_id` int(11) NOT NULL,
  `deduction_type` varchar(255) NOT NULL,
  `deduction_name` varchar(255) NOT NULL,
  `deduction_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `employee_id` int(11) NOT NULL,
  `employee_username` varchar(100) NOT NULL,
  `employee_password` varchar(150) NOT NULL,
  `employee_profile_img` varchar(150) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `employee_citizen_id` varchar(13) NOT NULL,
  `employee_gender` varchar(100) NOT NULL,
  `employee_birthdate` date NOT NULL,
  `employee_marital` varchar(10) NOT NULL COMMENT 'สถานะสมรส',
  `employee_phone` varchar(10) NOT NULL,
  `employee_email` varchar(100) NOT NULL,
  `employee_address` text NOT NULL,
  `employee_position_id` int(11) NOT NULL DEFAULT 0,
  `employee_status` int(11) NOT NULL DEFAULT 1 COMMENT 'สถานะการจ้างงาน 1=Active 0=Terminated',
  `employee_employtype` int(11) NOT NULL DEFAULT 1 COMMENT 'ประเภทการจ้างงาน',
  `employee_adminstatus` int(11) NOT NULL DEFAULT 0 COMMENT 'เป็นแอดมินหรือไม่',
  `dateCreate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`employee_id`, `employee_username`, `employee_password`, `employee_profile_img`, `employee_name`, `employee_citizen_id`, `employee_gender`, `employee_birthdate`, `employee_marital`, `employee_phone`, `employee_email`, `employee_address`, `employee_position_id`, `employee_status`, `employee_employtype`, `employee_adminstatus`, `dateCreate`) VALUES

(1, 'user1', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '1ebb9bb79ae52edb370e94d526b05a24.png', 'name1 lastname1', '1111111111111', 'ชาย', '2013-11-14', 'โสด', '0111111111', 'employee1@email.com', '', 3, 1, 3, 0, '2023-11-11 13:51:18'),
(999, 'naphatome', '123456', '3ce2554e77539101fa2fbe7439c96ef8.png', 'Naphat Sang', '1111111111112', 'ชาย', '1997-10-26', 'โสด', '0812345678', '123@gmail.com', '', 2, 1, 1, 0, '2023-11-12 09:40:12'),
(1000, 'user2', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '614de438b70900cda2cc6ae28b1496d6.png', 'asdfasdf', '1234123423411', 'ชาย', '1231-03-12', 'โสด', '111111', '111@11.com', '11111', 3, 1, 1, 0, '2023-11-13 08:32:57');


-- --------------------------------------------------------

--
-- Table structure for table `tbl_employtype`
--

CREATE TABLE `tbl_employtype` (
  `employtype_id` int(11) NOT NULL,
  `employtype_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_employtype`
--

INSERT INTO `tbl_employtype` (`employtype_id`, `employtype_name`) VALUES
(1, 'Full-time'),
(2, 'Part-time'),
(3, 'Trainee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payroll`
--

CREATE TABLE `tbl_payroll` (
  `payroll_id` int(11) NOT NULL,
  `payroll_month` varchar(100) NOT NULL COMMENT 'รายการเงินเดือนของเดือนไหน',
  `employee_id` int(11) NOT NULL,
  `base_salary` int(20) NOT NULL,
  `payroll_ss` int(11) NOT NULL,
  `payroll_tax` int(11) NOT NULL,
  `payroll_total` int(11) NOT NULL COMMENT 'ผลรวม',
  `payroll_status` int(11) NOT NULL,
  `dateCreate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่สร้างรายการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_payroll`
--

INSERT INTO `tbl_payroll` (`payroll_id`, `payroll_month`, `employee_id`, `base_salary`, `payroll_ss`, `payroll_tax`, `payroll_total`, `payroll_status`, `dateCreate`) VALUES
(3, '1111-11-11', 999, 1200000, 0, 0, 0, 1, '2023-11-13 06:39:01'),
(4, '0000-00-00', 1, 111111, 750, 16528, 93833, 1, '2023-11-13 07:52:13'),
(5, '0000-00-00', 999, 1200000, 750, 379583, 819667, 1, '2023-11-13 07:52:17'),
(6, '0000-00-00', 999, 90000, 750, 11250, 78000, 1, '2023-11-13 07:52:25'),
(7, '2023-11-12', 999, 90000, 750, 11250, 78000, 1, '2023-11-13 07:53:24'),
(8, '2022-11', 999, 90000, 750, 11250, 78000, 2, '2023-11-13 07:07:17'),
(10, '', 0, 0, 0, 0, 0, 1, '2023-11-13 07:23:55'),
(11, '', 0, 0, 0, 0, 0, 1, '2023-11-13 07:23:57'),
(12, '', 0, 0, 0, 0, 0, 1, '2023-11-13 07:24:18'),
(13, '', 0, 0, 0, 0, 0, 1, '2023-11-13 07:24:45'),
(14, '2023-06', 999, 1200000, 750, 379583, 819667, 2, '2023-11-13 07:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payroll_status`
--

CREATE TABLE `tbl_payroll_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_payroll_status`
--

INSERT INTO `tbl_payroll_status` (`id`, `status_name`, `color`) VALUES
(1, 'จ่ายเงินสำเร็จ', '#008000	'),
(2, 'ค้างจ่าย', '#FF0000\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(200) NOT NULL,
  `position_department` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`position_id`, `position_name`, `position_department`) VALUES
(0, ' ', ' '),
(2, 'Marketing Manager', 'Sales and Marketing Department'),
(3, 'Human Resources Specialist', 'Human Resources Department'),
(4, 'Financial Analyst', 'Finance and Accounting Department'),
(5, 'Junior Software Developer', 'IT Department');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salary`
--

CREATE TABLE `tbl_salary` (
  `salary_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salary_basesalary` int(11) NOT NULL,
  `dateCreate` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วันเดือนปี ที่สร้างรายการ'

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


--
-- Dumping data for table `tbl_salary`
--


INSERT INTO `tbl_salary` (`salary_id`, `employee_id`, `salary_basesalary`, `dateCreate`) VALUES
(2, 1, 102938, '2023-11-11 13:51:18'),
(3, 2, 10293, '2023-11-11 13:56:50'),
(4, 3, 10293, '2023-11-11 18:11:38'),
(5, 999, 160000, '2023-11-12 10:40:46'),
(6, 999, 500000, '2023-11-12 13:29:12'),
(7, 1, 18000, '2023-11-12 15:08:15'),
(8, 1000, 111111, '2023-11-13 08:32:57');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `tbl_deduction`
--
ALTER TABLE `tbl_deduction`
  ADD PRIMARY KEY (`deduction_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `member_username` (`employee_username`),
  ADD UNIQUE KEY `citizen_id` (`employee_citizen_id`),
  ADD UNIQUE KEY `employee_name` (`employee_name`),
  ADD UNIQUE KEY `employee_profile_img` (`employee_profile_img`),
  ADD UNIQUE KEY `employee_profile_img_2` (`employee_profile_img`);

--
-- Indexes for table `tbl_employtype`
--
ALTER TABLE `tbl_employtype`
  ADD PRIMARY KEY (`employtype_id`),
  ADD UNIQUE KEY `employtype_id` (`employtype_id`);

--
-- Indexes for table `tbl_payroll`
--
ALTER TABLE `tbl_payroll`
  ADD PRIMARY KEY (`payroll_id`),
  ADD UNIQUE KEY `payroll_id` (`payroll_id`);

--
-- Indexes for table `tbl_payroll_status`
--
ALTER TABLE `tbl_payroll_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`position_id`),
  ADD UNIQUE KEY `position_name` (`position_name`);

--
-- Indexes for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`

  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`

  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;


--
-- AUTO_INCREMENT for table `tbl_payroll`
--
ALTER TABLE `tbl_payroll`
  MODIFY `payroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_payroll_status`
--
ALTER TABLE `tbl_payroll_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_salary`
--
ALTER TABLE `tbl_salary`

  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
