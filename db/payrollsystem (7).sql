-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2022 at 01:13 PM
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
-- Database: `payrollsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `time_hr` decimal(11,2) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `time_in`, `time_out`, `time_hr`, `status`, `date`) VALUES
(1, 1, '23:53:43', '01:26:05', '1.54', 1, '2022-09-16'),
(2, 2, '00:00:55', '00:17:40', '0.28', 0, '2022-09-17'),
(4, 1, '01:26:32', '10:10:43', '8.74', 0, '2022-09-17'),
(5, 3, '12:20:07', '13:51:48', '1.53', 1, '2022-09-17'),
(6, 1, '11:44:21', '09:10:35', '8.00', 1, '2022-09-18'),
(7, 2, '11:44:30', '09:10:50', '8.00', 1, '2022-09-18'),
(8, 3, '11:44:38', '09:11:07', '8.00', 1, '2022-09-18'),
(9, 1, '01:25:18', '13:54:24', '8.00', 1, '2022-09-19'),
(10, 2, '03:27:19', '14:08:17', '8.00', 1, '2022-09-19'),
(11, 3, '13:27:28', '15:28:01', '2.01', 1, '2022-09-19'),
(12, 1, '08:52:12', '16:40:53', '7.81', 1, '2022-09-20'),
(13, 2, '08:53:51', '16:41:08', '7.79', 1, '2022-09-20'),
(14, 3, '08:54:28', '16:41:11', '7.78', 1, '2022-09-20'),
(15, 1, '09:58:11', '20:55:00', '8.00', 1, '2022-09-21'),
(16, 3, '10:00:10', '20:55:48', '8.00', 1, '2022-09-21'),
(17, 2, '10:00:24', '20:55:40', '8.00', 1, '2022-09-21'),
(18, 4, '17:46:39', '00:07:04', '6.34', 1, '2022-09-21'),
(19, 4, '17:28:56', '10:43:12', '8.00', 1, '2022-09-22'),
(20, 1, '17:29:01', '10:38:04', '8.00', 1, '2022-09-22'),
(21, 1, '10:50:58', '20:01:32', '8.00', 1, '2022-09-25'),
(22, 1, '21:51:01', '01:14:51', '3.40', 1, '2022-09-28'),
(23, 5, '01:15:53', '19:50:03', '8.00', 0, '2022-09-29'),
(24, 1, '08:14:42', '16:52:55', '8.00', 1, '2022-10-01'),
(25, 5, '17:18:09', '17:21:22', '0.00', 1, '2022-10-01'),
(26, 2, '18:40:19', '00:00:00', '0.00', 1, '2022-10-01'),
(27, 3, '18:40:26', '00:00:00', '0.00', 1, '2022-10-01'),
(28, 4, '18:40:49', '18:43:26', '0.00', 1, '2022-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_csv`
--

CREATE TABLE `attendance_csv` (
  `id` int(11) NOT NULL,
  `Employee_ID` varchar(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time DEFAULT NULL,
  `time_hr` time NOT NULL,
  `total_hr` decimal(10,2) NOT NULL,
  `status` int(2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_csv`
--

INSERT INTO `attendance_csv` (`id`, `Employee_ID`, `time_in`, `time_out`, `time_hr`, `total_hr`, `status`, `date`) VALUES
(42, '1', '08:14:00', '16:30:00', '09:00:00', '8.50', 1, '2022-10-05'),
(43, '2', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-05'),
(44, '3', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-05'),
(45, '4', '08:00:00', '16:00:00', '09:00:00', '8.00', 0, '2022-10-05'),
(46, '5', '08:00:00', '17:00:00', '09:00:00', '0.00', 0, '2022-10-05'),
(47, '1', '07:55:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-06'),
(48, '2', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-06'),
(49, '3', '08:01:00', '17:00:00', '09:00:00', '9.00', 1, '2022-10-06'),
(50, '4', '07:54:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-06'),
(51, '5', '17:00:00', '24:00:00', '07:00:00', '7.00', 0, '2022-10-06'),
(52, '1', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-08'),
(53, '2', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-08'),
(54, '3', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-08'),
(55, '4', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-08'),
(56, '5', '17:00:00', '24:00:00', '07:00:00', '7.00', 0, '2022-10-08'),
(57, '1', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-09'),
(58, '2', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-09'),
(59, '3', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-09'),
(60, '4', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-09'),
(61, '5', '17:00:00', '24:00:00', '07:00:00', '7.00', 0, '2022-10-09'),
(62, '1', '08:00:00', '16:00:00', '08:00:00', '8.00', 0, '2022-10-11'),
(63, '2', '08:00:00', '16:00:00', '08:00:00', '8.00', 0, '2022-10-11'),
(64, '3', '08:17:00', '16:00:00', '07:43:00', '7.00', 1, '2022-10-11'),
(65, '4', '08:00:00', '16:00:00', '08:00:00', '8.00', 0, '2022-10-11'),
(66, '5', '17:05:00', '00:07:00', '07:02:00', '7.03', 1, '2022-10-11'),
(72, '5', '17:00:00', '01:00:00', '08:00:00', '8.00', 0, '2022-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `cashadvance`
--

CREATE TABLE `cashadvance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `date_advanced` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cashadvance`
--

INSERT INTO `cashadvance` (`id`, `employee_id`, `amount`, `date_advanced`) VALUES
(1, 1, '500.00', '2022-09-16'),
(2, 2, '200.00', '2022-09-17'),
(5, 3, '500.00', '2022-09-20'),
(9, 1, '300.00', '2022-09-24'),
(10, 2, '1000.00', '2022-09-24'),
(11, 1, '100.00', '2022-09-24'),
(12, 1, '100.00', '2022-09-24'),
(13, 3, '500.00', '2022-09-24'),
(14, 1, '300.00', '2022-09-24'),
(15, 4, '1000.00', '2022-09-24'),
(16, 4, '500.00', '2022-09-24'),
(17, 1, '200.00', '2022-09-24'),
(18, 3, '500.00', '2022-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `cashadvance_total`
--

CREATE TABLE `cashadvance_total` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cashadvance_total`
--

INSERT INTO `cashadvance_total` (`id`, `employee_id`, `total`) VALUES
(1, '1', '1500.00'),
(2, '2', '1200.00'),
(3, '3', '1500.00'),
(4, '4', '1500.00');

-- --------------------------------------------------------

--
-- Table structure for table `deductioninfo`
--

CREATE TABLE `deductioninfo` (
  `employee_id` varchar(100) NOT NULL,
  `SSS` decimal(10,2) NOT NULL,
  `Philhealth` decimal(10,2) NOT NULL,
  `Pagibig` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deductioninfo`
--

INSERT INTO `deductioninfo` (`employee_id`, `SSS`, `Philhealth`, `Pagibig`) VALUES
('1', '255.00', '200.00', '250.00'),
('2', '123.00', '255.00', '123.00'),
('3', '177.00', '175.00', '300.00'),
('4', '177.00', '189.00', '250.00'),
('5', '255.00', '255.00', '255.00');

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`id`, `description`, `amount`) VALUES
(2, 'PhilHealth', '200.00'),
(3, 'Pag-ibig', '200.00'),
(6, 'SSS', '200.00');

-- --------------------------------------------------------

--
-- Table structure for table `employeelist`
--

CREATE TABLE `employeelist` (
  `id` int(11) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `employee_key` varchar(50) NOT NULL,
  `fingerprint_id` int(10) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `mName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `employee_Role` int(11) NOT NULL,
  `Birthday` date NOT NULL,
  `civilStatus` varchar(50) NOT NULL,
  `SSS` varchar(100) NOT NULL,
  `Tax` varchar(100) NOT NULL,
  `Contact` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhilHealth` varchar(50) NOT NULL,
  `Pagibig` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `workType` varchar(50) NOT NULL,
  `sched` int(11) NOT NULL,
  `employee_status` varchar(50) NOT NULL,
  `ProfilePic` varchar(250) NOT NULL,
  `id1` varchar(250) NOT NULL,
  `id2` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeelist`
--

INSERT INTO `employeelist` (`id`, `date_added`, `employee_key`, `fingerprint_id`, `fName`, `mName`, `lName`, `employee_Role`, `Birthday`, `civilStatus`, `SSS`, `Tax`, `Contact`, `Email`, `PhilHealth`, `Pagibig`, `Address`, `workType`, `sched`, `employee_status`, `ProfilePic`, `id1`, `id2`) VALUES
(1, '2022-09-16', 'UGE678295014', 1, 'Kervin Robby', 'Paraiso', 'Pagtalunan', 3, '2001-12-13', 'Single', '13', '13', '09213208242', 'kervinpagtalunan@gmail.com', '13', '13', 'Balite, Malolos, Bulacan', 'Full-time', 1, 'Active', '../EmployeeFiles/ProfilePic/Employee1.jpg', '../EmployeeFiles/IDs/EmployeeID1_1.jpg', '../EmployeeFiles/IDs/EmployeeID2_1.jpg'),
(2, '2022-09-17', 'VJE621409378', 2, 'Von Paulo', 'Santiago', 'Plaza', 1, '2022-08-31', 'Married', '2', '2', '0192384912', 'vonpaulo@yahoo.com', '2', '2', 'Guiguinto, Bulacan', 'Full-time', 1, 'Active', '../EmployeeFiles/ProfilePic/Employee2.jpg', '../EmployeeFiles/IDs/EmployeeID1_2.jpg', '../EmployeeFiles/IDs/EmployeeID2_2.jpg'),
(3, '2022-09-17', 'XAP521960743', 3, 'Ryan Sedrick', 'Santiago', 'Nolasco', 1, '2022-09-15', 'Married', '12', '12', '0912345678', 'ryansedrick@gmail.com', '12', '12', 'Angat Dam', 'Part-time', 1, 'Active', '../EmployeeFiles/ProfilePic/Employee3.jpg', '../EmployeeFiles/IDs/EmployeeID1_3.jpg', '../EmployeeFiles/IDs/EmployeeID2_3.jpg'),
(4, '2022-09-21', 'XTN196045378', 4, 'Jan Carl', 'S', 'Talavera', 9, '2022-09-15', 'Single', '123', '123', '0192384912', '123123@2e131', '123', '123', 'guguinto', 'Full-time', 1, 'Active', '../EmployeeFiles/ProfilePic/Employee4.jpg', '../EmployeeFiles/IDs/EmployeeID1_4.jpg', '../EmployeeFiles/IDs/EmployeeID2_4.jpg'),
(5, '2022-09-29', 'XRF965871203', 6, 'John Benedict', 'haha', 'Correa', 1, '2022-09-15', 'Married', '0129341', '1293793', '0919238912', 'ben@gmail.com', '1121927', '192378', 'Norzagaray, Bulacan', 'Full-time', 2, 'Active', '../EmployeeFiles/ProfilePic/Employee5.jpg', '../EmployeeFiles/IDs/EmployeeID1_5.jpg', '../EmployeeFiles/IDs/EmployeeID2_5.jpg'),
(11, '2022-10-08', 'THX407182395', 7, 'kervs', 'S', 'asd', 1, '2022-10-14', 'Married', '13', '13', '123123', '123123@2e131', '13', '13', 'guguinto', 'Full-time', 1, 'In-active', '../EmployeeFiles/ProfilePic/Employee11.jpg', '../EmployeeFiles/IDs/EmployeeID1_11.jpg', '../EmployeeFiles/IDs/EmployeeID2_11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `day` varchar(2) NOT NULL,
  `month` varchar(2) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `date_2` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `description`, `day`, `month`, `date_added`, `date_2`) VALUES
(1, 'christmas day', '01', '10', '2022-10-01', '2022-10-01'),
(6, 'asdasdasd', '12', '10', '2022-10-01', '2022-10-12'),
(7, 'christmas day', '25', '12', '2022-10-02', '2022-12-25'),
(18, 'Undas', '01', '11', '2022-10-12', '2022-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(11) NOT NULL,
  `description` char(100) NOT NULL,
  `date` date NOT NULL,
  `date_added` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `description`, `date`, `date_added`) VALUES
(15, 'Chataue\'s Day', '2022-09-25', '2022-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `leave_info`
--

CREATE TABLE `leave_info` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_info`
--

INSERT INTO `leave_info` (`id`, `employee_id`, `date`) VALUES
(32, '1', '2022-09-03'),
(33, '3', '2022-09-03'),
(34, '4', '2022-09-17'),
(35, '4', '2022-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `ot_hr` decimal(10,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`id`, `employee_id`, `ot_hr`, `date`) VALUES
(1, '1', '4.49', '2022-09-19'),
(2, '2', '2.68', '2022-09-19'),
(3, '1', '13.44', '2022-09-18'),
(4, '2', '13.44', '2022-09-18'),
(5, '3', '13.44', '2022-09-18'),
(6, '1', '2.95', '2022-09-21'),
(7, '2', '2.92', '2022-09-21'),
(8, '3', '2.93', '2022-09-21'),
(9, '1', '9.15', '2022-09-22'),
(10, '4', '9.24', '2022-09-22'),
(11, '1', '2.00', '2022-09-25'),
(18, '1', '2.00', '2022-10-01'),
(22, '4', '2.00', '2022-10-08'),
(24, '1', '2.00', '2022-10-08'),
(25, '1', '2.00', '2022-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `rate` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `description`, `rate`) VALUES
(1, 'Admin', '67.00'),
(2, 'Guard', '50.00'),
(3, 'Janitor', '67.00'),
(9, 'HR', '57.00');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `time_in`, `time_out`) VALUES
(1, '08:00:00', '16:00:00'),
(2, '17:00:00', '01:00:00'),
(3, '07:00:00', '07:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_csv`
--
ALTER TABLE `attendance_csv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashadvance`
--
ALTER TABLE `cashadvance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashadvance_total`
--
ALTER TABLE `cashadvance_total`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeelist`
--
ALTER TABLE `employeelist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fingerprint_id` (`fingerprint_id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_info`
--
ALTER TABLE `leave_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `attendance_csv`
--
ALTER TABLE `attendance_csv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `cashadvance`
--
ALTER TABLE `cashadvance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cashadvance_total`
--
ALTER TABLE `cashadvance_total`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `employeelist`
--
ALTER TABLE `employeelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `leave_info`
--
ALTER TABLE `leave_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
