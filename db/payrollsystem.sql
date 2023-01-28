-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 08:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

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
-- Table structure for table `employeelist`
--

CREATE TABLE `employeelist` (
  `id` int(255) NOT NULL,
  `date_added` date DEFAULT current_timestamp(),
  `fName` varchar(100) NOT NULL,
  `mName` varchar(100) NOT NULL,
  `lName` varchar(100) NOT NULL,
  `employee_Role` varchar(100) NOT NULL,
  `Birthday` varchar(100) NOT NULL,
  `civilStatus` varchar(100) NOT NULL,
  `SSS` varchar(100) NOT NULL,
  `Tax` varchar(100) NOT NULL,
  `Contact` varchar(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhilHealth` varchar(100) NOT NULL,
  `Pagibig` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `ProfilePic` char(255) NOT NULL,
  `id1` varchar(255) NOT NULL,
  `id2` varchar(255) NOT NULL,
  `workType` varchar(100) NOT NULL,
  `employee_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeelist`
--

INSERT INTO `employeelist` (`id`, `date_added`, `fName`, `mName`, `lName`, `employee_Role`, `Birthday`, `civilStatus`, `SSS`, `Tax`, `Contact`, `Email`, `PhilHealth`, `Pagibig`, `Address`, `ProfilePic`, `id1`, `id2`, `workType`, `employee_status`) VALUES
(69, '2022-06-17', 'Kyla Mae', 'Aranzanso', 'Delfin', 'Admin', '2022-06-17', 'Single', '1', '1', '999121431', 'vonpaulo.plaza.s@bulsu.edu.ph', '1', '1', 'Rosemary Lane', 'EmployeeFiles/ProfilePic/Employee69.png', 'EmployeeFiles/IDs/EmployeeID1_69.jpg', 'EmployeeFiles/IDs/EmployeeID2_69.jpg', 'Part-time', 'In-active'),
(70, '2022-06-17', 'Von', 'Santiago', 'Plaza', 'BOT', '2022-06-17', 'Single', '1', '1', '999121431', 'gamingvic47@gmail.com', '1', '1', 'Rosemary Lane', 'EmployeeFiles/ProfilePic/Employee70.jpg', 'EmployeeFiles/IDs/EmployeeID1_70.jpg', 'EmployeeFiles/IDs/EmployeeID2_70.jpg', 'Full-time', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeelist`
--
ALTER TABLE `employeelist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeelist`
--
ALTER TABLE `employeelist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
