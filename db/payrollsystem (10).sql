-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 01:32 AM
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
  `password` varchar(50) NOT NULL,
  `employee_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`username`, `password`, `employee_no`) VALUES
('admin', 'admin1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `activity` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `activity`, `date`, `time`, `type`) VALUES
(137, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-23 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-23', '20:26:30', 'attendance'),
(138, 'Kervin Robby Paraiso Pagtalunan(1) Overtime for2022-10-23 is deleted by admin Kervin Robby Pagtalunan(1)', '2022-10-23', '20:27:57', 'overtime'),
(139, '2 hour/s Overtime is added to Kervin Robby Paraiso Pagtalunan(1) for the 2022-10-23 by admin Kervin Robby Pagtalunan(1)', '2022-10-23', '20:28:15', 'overtime'),
(140, 'Kervin Robby Paraiso Pagtalunan(1) Overtime for2022-10-23 is deleted by admin Kervin Robby Pagtalunan(1)', '2022-10-23', '20:28:34', 'overtime'),
(141, '() Overtime for is deleted by admin Kervin Robby Pagtalunan(1)', '2022-10-23', '20:28:34', 'overtime'),
(142, '() Overtime for is deleted by admin Kervin Robby Pagtalunan(1)', '2022-10-23', '20:28:34', 'overtime'),
(143, '() Overtime for is deleted by admin Kervin Robby Pagtalunan(1)', '2022-10-23', '20:28:34', 'overtime'),
(144, '2 hour/s Overtime is added to Kervin Robby Paraiso Pagtalunan(1) for the 2022-10-23 by admin Kervin Robby Pagtalunan(1)', '2022-10-23', '20:28:36', 'overtime'),
(145, 'test is added to holidays for the date 2022-10-15 by admin Kervin Robby Pagtalunan(1)', '2022-10-23', '20:32:40', 'leave'),
(146, 'test is deleted to holidays for the date  by admin Kervin Robby Pagtalunan(1)', '2022-10-23', '20:32:53', 'leave'),
(147, 'Paid Leave forOctober 2022 08 is added to Kervin Robby Pagtalunan(1)  by admin Kervin Robby Pagtalunan(1)', '2022-10-23', '22:43:08', 'paidLeave'),
(148, 'Paid Leave for October Fri 2022 is added to Kervin Robby Pagtalunan(1)  by admin Kervin Robby Pagtalunan(1)', '2022-10-23', '22:44:15', 'paidLeave'),
(149, 'Paid Leave for October 08 2022is deleted to Kervin Robby Paraiso Pagtalunan(1)  by admin Kervin Robby Pagtalunan(1)', '2022-10-23', '22:56:09', 'paidLeave'),
(150, 'Paid Leave for September 17 2022 is deleted to Jan Carl S Talavera(4)  by admin Kervin Robby Pagtalunan(1)', '2022-10-23', '22:56:36', 'paidLeave'),
(151, 'Paid Leave for September 03 2022 is deleted to Ryan Sedrick Santiago Nolasco(3)  by admin Kervin Robby Pagtalunan(1)', '2022-10-23', '22:56:39', 'paidLeave'),
(152, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-10-24', '09:35:15', ''),
(153, 'test(57) is added to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '09:35:32', 'position'),
(154, 'Deduction of John Benedict haha Correa(5) is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '09:58:57', 'deduction'),
(155, 'Deduction of John Benedict haha Correa(5) is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '09:59:28', 'deduction'),
(156, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-10-24', '10:15:04', ''),
(157, 'Deduction of Jan Carl S Talavera(4) is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '10:16:25', 'deduction'),
(158, 'Deduction of Von Paulo Santiago Plaza(2) is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '10:29:31', 'deduction'),
(159, 'Deduction of Jan Carl S Talavera(4) is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '10:32:17', 'deduction'),
(160, 'Account User is change to Kervin Robby Paraiso Pagtalunan(1) by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '10:44:50', 'accountSettings'),
(161, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '13:17:16', 'employeeEdit'),
(162, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '13:17:16', 'employeeEdit'),
(163, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '13:17:37', 'employeeEdit'),
(164, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '13:17:37', 'employeeEdit'),
(165, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '13:18:38', 'employeeEdit'),
(166, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '13:18:54', 'employeeEdit'),
(167, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '13:18:57', 'employeeEdit'),
(168, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '13:23:50', 'employeeEdit'),
(169, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '13:24:26', 'employeeEdit'),
(170, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '13:27:55', 'employeeEdit'),
(171, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '13:28:00', 'employeeEdit'),
(172, 'test(57) is deleted to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '14:04:40', 'position'),
(173, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '14:07:52', 'employeeEdit'),
(174, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '14:11:22', 'employeeEdit'),
(175, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '14:14:10', 'employeeEdit'),
(176, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '14:17:14', 'employeeEdit'),
(177, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '14:17:19', 'employeeEdit'),
(178, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '14:17:22', 'employeeEdit'),
(179, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '14:17:25', 'employeeEdit'),
(180, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '14:17:28', 'employeeEdit'),
(181, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '14:19:38', 'employeeEdit'),
(182, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '14:19:42', 'employeeEdit'),
(183, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '14:20:52', 'employeeEdit'),
(184, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '14:20:56', 'employeeEdit'),
(185, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-11 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '14:34:22', 'attendance'),
(186, 'Attendance of Von Paulo Santiago Plaza(2) of 2022-10-23 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '14:35:39', 'attendance'),
(187, 'Attendance of Jan Carl S Talavera(4) of 2022-10-23 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '14:35:51', 'attendance'),
(188, '2 hour/s Overtime is added to Kervin Robby Paraiso Pagtalunan(1) for the 2022-10-24 by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '16:05:16', 'overtime'),
(189, '2 hour/s Overtime is added to Kervin Robby Paraiso Pagtalunan(1) for the 2022-10-22 by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '16:13:40', 'overtime'),
(190, 'Kervin Robby Paraiso Pagtalunan(1) Overtime for2022-10-24 is deleted by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '16:17:58', 'overtime'),
(191, 'Kervin Robby Paraiso Pagtalunan(1) Overtime for2022-10-23 is edited by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '10:32:36', 'overtime'),
(192, 'Kervin Robby Paraiso Pagtalunan(1) Overtime for October 23, 2022 is edited by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '16:35:10', 'overtime'),
(193, '2 hour/s Overtime is added to Kervin Robby Paraiso Pagtalunan(1) for the October 24, 2022 by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '16:35:57', 'overtime'),
(194, 'Kervin Robby Paraiso Pagtalunan(1) Overtime for October 24, 2022 is deleted by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '16:36:03', 'overtime'),
(195, 'Kervin Robby Paraiso Pagtalunan(1) Overtime for October 23, 2022 is edited by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '16:53:40', 'overtime'),
(196, 'Kervin Robby Paraiso Pagtalunan(1) Overtime for October 23, 2022 is edited by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '16:55:07', 'overtime'),
(197, 'Kervin Robby Paraiso Pagtalunan(1) Overtime for October 23, 2022 is edited by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '16:55:49', 'overtime'),
(198, 'Kervin Robby Paraiso Pagtalunan(1) Overtime for October 23, 2022 is edited by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '16:55:58', 'overtime'),
(199, 'Kervin Robby Paraiso Pagtalunan(1) Overtime for October 23, 2022 is edited by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '16:56:54', 'overtime'),
(200, 'Kervin Robby Paraiso Pagtalunan(1) Overtime for October 23, 2022 is edited by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '16:57:07', 'overtime'),
(201, 'Kervin Robby Paraiso Pagtalunan(1) Overtime for October 23, 2022 is edited by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '16:57:11', 'overtime'),
(202, '2 hour/s Overtime is added to Kervin Robby Paraiso Pagtalunan(1) for the October 24, 2022 by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '17:05:47', 'overtime'),
(203, '2 hour/s Overtime is added to Kervin Robby Paraiso Pagtalunan(1) for the January 01, 1970 by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '17:06:08', 'overtime'),
(204, 'Kervin Robby Paraiso Pagtalunan(1) Overtime for October 24, 2022 is deleted by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '17:07:09', 'overtime'),
(205, '2 hour/s Overtime is added to Kervin Robby Paraiso Pagtalunan(1) for the October 24, 2022 by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '17:10:15', 'overtime'),
(206, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-10-24', '19:16:11', ''),
(207, '2 hour/s Overtime is added to Wally 69 Bayola(30) for the October 24, 2022 by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '19:25:18', 'overtime'),
(208, 'Wally 69 Bayola(30) advanced &#8369;1000 by admin Kervin Robby Pagtalunan(1)', '2022-10-24', '19:25:39', 'cashAdvance'),
(209, 'Employee No.30 Wally 69 Bayola is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '19:31:50', 'employeeEdit'),
(210, 'Employee No.30 Wally 69 Bayola is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-24', '19:32:12', 'employeeEdit'),
(211, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-10-25', '14:05:06', ''),
(212, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-10-26', '07:47:45', ''),
(213, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '07:50:00', 'employeeEdit'),
(214, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '07:50:21', 'employeeEdit'),
(215, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '07:55:48', 'employeeEdit'),
(216, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '07:57:20', 'employeeEdit'),
(217, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:05:47', 'employeeEdit'),
(218, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:06:22', 'employeeEdit'),
(219, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:06:46', 'employeeEdit'),
(220, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:08:53', 'employeeEdit'),
(221, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:09:32', 'employeeEdit'),
(222, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:09:50', 'employeeEdit'),
(223, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:09:57', 'employeeEdit'),
(224, '2 hour/s Overtime is added to Kervin Robby Paraisoo Pagtalunan(1) for the October 26, 2022 by admin Kervin Robby Pagtalunan(1)', '2022-10-26', '08:11:25', 'overtime'),
(225, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:11:42', 'employeeEdit'),
(226, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:11:56', 'employeeEdit'),
(227, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:12:03', 'employeeEdit'),
(228, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:12:06', 'employeeEdit'),
(229, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:12:38', 'employeeEdit'),
(230, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:14:33', 'employeeEdit'),
(231, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:14:37', 'employeeEdit'),
(232, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:15:14', 'employeeEdit'),
(233, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:15:16', 'employeeEdit'),
(234, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:15:18', 'employeeEdit'),
(235, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:32:10', 'employeeEdit'),
(236, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:34:53', 'employeeEdit'),
(237, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:34:57', 'employeeEdit'),
(238, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:35:47', 'employeeEdit'),
(239, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:36:35', 'employeeEdit'),
(240, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:37:52', 'employeeEdit'),
(241, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:38:08', 'employeeEdit'),
(242, 'Employee No.30 Wally 69 Bayola is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:38:45', 'employeeEdit'),
(243, 'Employee No.30 Wally 69 Bayola is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:40:06', 'employeeEdit'),
(244, 'Employee No.30 Wally 69 Bayola is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:41:34', 'employeeEdit'),
(245, 'Employee No.30 Wally 69 Bayola is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '08:42:41', 'employeeEdit'),
(246, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-10-26', '21:46:11', ''),
(247, 'Employee No.30 Wally 69 Bayola is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '21:46:33', 'employeeEdit'),
(248, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '21:46:56', 'employeeEdit'),
(249, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-26', '21:47:17', 'employeeEdit'),
(250, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-10-30', '17:22:37', ''),
(251, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-16 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '19:45:56', 'attendance'),
(252, 'Attendance was uploaded with 0 attendance uploaded by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '19:46:41', 'attendance'),
(253, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-16 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '19:47:34', 'attendance'),
(254, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-16 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '19:48:41', 'attendance'),
(255, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-16 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '19:48:53', 'attendance'),
(256, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-16 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '19:50:26', 'attendance'),
(257, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-16 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '19:51:32', 'attendance'),
(258, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-16 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '19:52:14', 'attendance'),
(259, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-16 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '19:52:38', 'attendance'),
(260, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-16 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '19:53:08', 'attendance'),
(261, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-16 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '19:53:44', 'attendance'),
(262, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-16 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '19:54:44', 'attendance'),
(263, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-16 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '19:55:01', 'attendance'),
(264, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-17 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '19:55:18', 'attendance'),
(265, '12(58) is added to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-30', '19:59:17', 'position'),
(266, '12(59) is added to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-30', '19:59:19', 'position'),
(267, '12(60) is added to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-30', '19:59:22', 'position'),
(268, '12(61) is added to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-30', '19:59:25', 'position'),
(269, '12(62) is added to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-30', '19:59:28', 'position'),
(270, '12(63) is added to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-30', '19:59:34', 'position'),
(271, '12(64) is added to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-30', '19:59:42', 'position'),
(272, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-16 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '20:29:13', 'attendance'),
(273, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-16 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '20:29:13', 'attendance'),
(274, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-16 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '20:30:05', 'attendance'),
(275, 'Attendance of Von Paulo Santiago Plaza(2) of 2022-10-19 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '20:30:21', 'attendance'),
(276, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-16 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '20:38:47', 'attendance'),
(277, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-10-18 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-30', '20:39:08', 'attendance'),
(278, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-10-31', '07:10:10', ''),
(279, 'Position no.1 Admin is edited by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:18:37', 'position'),
(280, 'Position no.62 12 is edited by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:29:42', 'position'),
(281, 'asd(65) is added to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:30:39', 'position'),
(282, 'asd(65) is deleted to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:30:50', 'position'),
(283, '12(64) is deleted to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:30:55', 'position'),
(284, '12(63) is deleted to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:30:58', 'position'),
(285, '12(62) is deleted to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:31:01', 'position'),
(286, '12(61) is deleted to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:31:03', 'position'),
(287, '12(60) is deleted to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:31:06', 'position'),
(288, '12(59) is deleted to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:31:08', 'position'),
(289, '12(58) is deleted to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:31:11', 'position'),
(290, 'Deduction of Wally 69 Bayola(30) is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-31', '07:43:50', 'deduction'),
(291, 'Paid Leave for October 28 2022 is added to Ryan Sedrick Nolasco(3)  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:51:39', 'paidLeave'),
(292, 'Paid Leave for October 21 2022 is added to Ryan Sedrick Nolasco(3)  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:51:47', 'paidLeave'),
(293, 'Paid Leave for October 11 2022 is added to Jan Carl Talavera(4)  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:51:56', 'paidLeave'),
(294, 'Paid Leave for October 07 2022 is added to Jan Carl Talavera(4)  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:52:04', 'paidLeave'),
(295, 'Paid Leave for October 08 2022 is added to Ryan Sedrick Nolasco(3)  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:52:09', 'paidLeave'),
(296, 'Paid Leave for October 02 2022 is added to Kervin Robby Pagtalunan(1)  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:52:15', 'paidLeave'),
(297, 'Paid Leave for October 28 2022 is added to Kervin Robby Pagtalunan(1)  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:52:42', 'paidLeave'),
(298, 'Paid Leave for September 10 2022 is deleted to Jan Carl S Talavera(4)  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:53:28', 'paidLeave'),
(299, 'Paid Leave for October 07 2022 is deleted to Jan Carl S Talavera(4)  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:53:32', 'paidLeave'),
(300, 'Paid Leave for October 11 2022 is deleted to Jan Carl S Talavera(4)  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:53:35', 'paidLeave'),
(301, 'Paid Leave for October 08 2022 is deleted to Ryan Sedrick Santiago Nolasco(3)  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:53:37', 'paidLeave'),
(302, 'Paid Leave for October 21 2022 is deleted to Ryan Sedrick Santiago Nolasco(3)  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:53:38', 'paidLeave'),
(303, 'Paid Leave for October 28 2022 is deleted to Ryan Sedrick Santiago Nolasco(3)  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:53:40', 'paidLeave'),
(304, 'Paid Leave for October 02 2022 is deleted to Kervin Robby Paraiso Pagtalunan(1)  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:53:41', 'paidLeave'),
(305, 'Paid Leave for October 28 2022 is deleted to Kervin Robby Paraiso Pagtalunan(1)  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:53:44', 'paidLeave'),
(306, 'Paid Leave for October 07 2022 is deleted to Kervin Robby Paraiso Pagtalunan(1)  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:53:45', 'paidLeave'),
(307, 'Paid Leave for October 01 2022 is deleted to Kervin Robby Paraiso Pagtalunan(1)  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:53:47', 'paidLeave'),
(308, 'Paid Leave for September 03 2022 is deleted to Kervin Robby Paraiso Pagtalunan(1)  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '07:53:48', 'paidLeave'),
(309, 'Grace period is change to 30 mintues by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '08:35:26', 'companyManagement'),
(310, 'Grace period is change to 15 mintues by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '08:35:31', 'companyManagement'),
(311, 'Payroll period for the 1st period of November of 2022 is added by Admin Kervin Robby Pagtalunan(1).', '2022-10-31', '15:57:48', 'payroll'),
(312, 'a(66) is added to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '16:10:47', 'position'),
(313, 'a(67) is added to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '16:10:50', 'position'),
(314, 'a(68) is added to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '16:10:54', 'position'),
(315, 'a(69) is added to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '16:10:56', 'position'),
(316, 'a(70) is added to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '16:11:00', 'position'),
(317, 'a(71) is added to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '16:11:03', 'position'),
(318, 'a(72) is added to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-10-31', '16:11:09', 'position'),
(319, 'Attendance of Jan Carl S Talavera(4) of 2022-10-19 is edited by Admin Kervin Robby Pagtalunan(1).', '2022-10-31', '16:13:36', 'attendance'),
(320, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-10-31', '16:17:09', ''),
(321, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-11-01', '01:18:28', ''),
(322, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Kervin Robby Pagtalunan(1).', '2022-11-01', '01:36:06', 'employeeEdit'),
(323, 'a(71) is deleted to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-11-01', '01:38:31', 'position'),
(324, 'a(72) is deleted to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-11-01', '01:38:33', 'position'),
(325, 'a(70) is deleted to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-11-01', '01:38:36', 'position'),
(326, 'a(69) is deleted to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-11-01', '01:38:38', 'position'),
(327, 'a(68) is deleted to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-11-01', '01:38:40', 'position'),
(328, 'a(67) is deleted to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-11-01', '01:38:42', 'position'),
(329, 'a(66) is deleted to Positions  by admin Kervin Robby Pagtalunan(1)', '2022-11-01', '01:38:44', 'position'),
(330, 'Paid Leave for November 01 2022 is added to Kervin Robby Pagtalunan(1)  by admin Kervin Robby Pagtalunan(1)', '2022-11-01', '01:44:03', 'paidLeave'),
(331, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-11-01', '20:26:56', ''),
(332, 'Kervin Robby Paraisoo Pagtalunan(1) advanced &#8369;100 by admin Kervin Robby Pagtalunan(1)', '2022-11-02', '09:29:13', 'cashAdvance'),
(333, 'Kervin Robby Paraisoo Pagtalunan(1) advanced &#8369;12 by admin Kervin Robby Pagtalunan(1)', '2022-11-02', '09:40:57', 'cashAdvance'),
(334, 'Kervin Robby Paraisoo Pagtalunan(1) advanced &#8369;123 by admin Kervin Robby Pagtalunan(1)', '2022-11-02', '09:41:13', 'cashAdvance'),
(335, 'Payroll for the 2nd period of October of 2022 was released by Admin Kervin Robby Pagtalunan(1).', '2022-11-02', '09:47:01', 'payroll'),
(336, '2 hour/s Overtime is added to Kervin Robby Paraisoo Pagtalunan(1) for the November 02, 2022 by admin Kervin Robby Pagtalunan(1)', '2022-11-02', '10:10:43', 'overtime'),
(337, '2 hour/s Overtime is added to Ryan Sedrick Santiago Nolasco(3) for the November 02, 2022 by admin Kervin Robby Pagtalunan(1)', '2022-11-02', '10:11:05', 'overtime'),
(338, 'Paid Leave for November 05 2022 is added to Kervin Robby Pagtalunan(1)  by admin Kervin Robby Pagtalunan(1)', '2022-11-02', '10:20:16', 'paidLeave'),
(339, 'Paid Leave for November 04 2022 is added to Kervin Robby Pagtalunan(1)  by admin Kervin Robby Pagtalunan(1)', '2022-11-02', '10:48:16', 'paidLeave'),
(340, 'Paid Leave for November 05 2022 is deleted to Kervin Robby Paraisoo Pagtalunan(1)  by admin Kervin Robby Pagtalunan(1)', '2022-11-02', '10:50:28', 'paidLeave'),
(341, 'Kervin Robby Paraisoo Pagtalunan(1) advanced &#8369;1000 by admin Kervin Robby Pagtalunan(1)', '2022-11-02', '13:03:30', 'cashAdvance'),
(342, 'Position no.1 Admin is edited by admin Kervin Robby Pagtalunan(1)', '2022-11-02', '15:36:38', 'position'),
(343, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-11-03', '09:00:44', ''),
(344, 'christmas day is deleted to holidays for the date  by admin Kervin Robby Pagtalunan(1)', '2022-11-03', '10:25:21', 'leave'),
(345, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-11-03', '11:48:12', ''),
(346, 'Attendance was uploaded with 10 attendance uploaded by Admin Kervin Robby Pagtalunan(1).', '2022-11-03', '11:51:00', 'attendance'),
(347, 'Paid Leave for November 04 2022 is deleted to Kervin Robby Paraisoo Pagtalunan(1)  by admin Kervin Robby Pagtalunan(1)', '2022-11-03', '11:51:41', 'paidLeave'),
(348, 'Paid Leave for November 01 2022 is deleted to Kervin Robby Paraisoo Pagtalunan(1)  by admin Kervin Robby Pagtalunan(1)', '2022-11-03', '11:51:43', 'paidLeave'),
(349, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-11-03', '12:02:14', ''),
(350, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-11-03', '12:02:38', ''),
(351, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-11-03', '12:03:02', ''),
(352, 'admin Kervin Robby Pagtalunan(1) has logged out', '2022-11-03', '12:08:24', ''),
(353, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-11-03', '12:08:27', ''),
(354, 'admin Kervin Robby Pagtalunan(1) has logged out', '2022-11-03', '12:08:36', ''),
(355, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-11-03', '12:08:37', ''),
(356, 'Employee No.31 Ryan Amper Kaindoy is edited by Admin Kervin Robby Pagtalunan(1).', '2022-11-03', '12:44:30', 'employeeEdit'),
(357, '2 hour/s Overtime is added to Ryan Amper Kaindoy(31) for the November 03, 2022 by admin Kervin Robby Pagtalunan(1)', '2022-11-03', '12:44:47', 'overtime'),
(358, 'Stephen S Curry(32) has been added to Employee List by admin Kervin Robby Pagtalunan(1) has logged out', '2022-11-03', '05:55:57', 'employeeEdit'),
(359, 'Kervin Robby Pagtalunan(1) schedule is change to schedule no.2 by admin Kervin Robby Pagtalunan(1)', '2022-11-03', '13:25:54', 'schedule'),
(360, 'Kervin Robby Pagtalunan(1) schedule is change to schedule no.1 by admin Kervin Robby Pagtalunan(1)', '2022-11-03', '13:25:59', 'schedule'),
(361, 'Schedule no.10 (07:00:00-19:00:00) is added to Schedules by admin Kervin Robby Pagtalunan(1)', '2022-11-03', '13:45:05', 'schedule'),
(362, 'Schedule no.10 is deleted to Schedules by admin Kervin Robby Pagtalunan(1)', '2022-11-03', '17:06:38', 'schedule'),
(363, 'Undas is deleted to holidays for the date  by admin Kervin Robby Pagtalunan(1)', '2022-11-03', '17:57:17', 'leave'),
(364, 'Paid Leave for November 04 2022 is added to Kervin Robby Pagtalunan(1)  by admin Kervin Robby Pagtalunan(1)', '2022-11-04', '08:20:37', 'paidLeave');

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
(62, '1', '08:00:00', '15:00:00', '07:00:00', '7.00', 0, '2022-10-11'),
(63, '2', '08:00:00', '16:00:00', '08:00:00', '8.00', 0, '2022-10-11'),
(64, '3', '08:17:00', '16:00:00', '07:43:00', '7.00', 1, '2022-10-11'),
(65, '4', '08:00:00', '16:00:00', '08:00:00', '8.00', 0, '2022-10-11'),
(66, '5', '17:05:00', '00:07:00', '07:02:00', '7.03', 1, '2022-10-11'),
(72, '5', '17:00:00', '01:00:00', '08:00:00', '8.00', 0, '2022-10-10'),
(73, '1', '08:00:00', '16:00:00', '08:00:00', '8.00', 0, '2022-10-12'),
(84, '1', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-14'),
(85, '2', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-14'),
(86, '3', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-14'),
(87, '4', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-14'),
(88, '5', '17:00:00', '01:00:00', '08:00:00', '8.00', 0, '2022-10-14'),
(89, '1', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-15'),
(90, '2', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-15'),
(91, '3', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-15'),
(92, '4', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-15'),
(93, '5', '17:00:00', '01:00:00', '08:00:00', '8.00', 0, '2022-10-15'),
(94, '1', '08:00:00', '16:00:00', '08:00:00', '8.00', 0, '2022-10-16'),
(95, '2', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-16'),
(96, '3', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-16'),
(97, '4', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-16'),
(98, '5', '17:00:00', '01:00:00', '08:00:00', '8.00', 0, '2022-10-16'),
(99, '1', '08:00:00', '16:00:00', '08:00:00', '8.00', 0, '2022-10-17'),
(100, '2', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-17'),
(101, '3', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-17'),
(102, '4', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-17'),
(103, '5', '17:00:00', '01:00:00', '08:00:00', '8.00', 0, '2022-10-17'),
(104, '1', '08:00:00', '16:00:00', '08:00:00', '8.00', 0, '2022-10-18'),
(105, '2', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-18'),
(106, '3', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-18'),
(107, '4', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-18'),
(108, '5', '17:00:00', '01:00:00', '08:00:00', '8.00', 0, '2022-10-18'),
(109, '1', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-19'),
(110, '2', '08:00:00', '16:00:00', '08:00:00', '8.00', 0, '2022-10-19'),
(111, '3', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-19'),
(112, '4', '08:00:00', '16:00:00', '08:00:00', '8.00', 0, '2022-10-19'),
(113, '5', '17:00:00', '01:00:00', '08:00:00', '8.00', 0, '2022-10-19'),
(114, '1', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-20'),
(115, '2', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-20'),
(116, '3', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-20'),
(117, '4', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-20'),
(118, '5', '17:00:00', '01:00:00', '08:00:00', '8.00', 0, '2022-10-20'),
(119, '1', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-21'),
(120, '2', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-21'),
(121, '3', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-21'),
(122, '4', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-21'),
(123, '5', '17:00:00', '01:00:00', '08:00:00', '8.00', 0, '2022-10-21'),
(124, '1', '08:15:00', '13:06:00', '04:51:00', '4.10', 1, '2022-10-22'),
(125, '2', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-22'),
(126, '3', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-22'),
(127, '4', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-22'),
(128, '5', '17:00:00', '01:00:00', '08:00:00', '8.00', 0, '2022-10-22'),
(129, '1', '08:00:00', '16:00:00', '08:00:00', '8.00', 0, '2022-10-23'),
(130, '2', '08:00:00', '16:00:00', '08:00:00', '8.00', 0, '2022-10-23'),
(131, '3', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-10-23'),
(132, '4', '11:00:00', '16:00:00', '05:00:00', '5.00', 1, '2022-10-23'),
(133, '5', '17:00:00', '01:00:00', '08:00:00', '8.00', 0, '2022-10-23'),
(134, '1', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-11-01'),
(135, '2', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-11-01'),
(136, '3', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-11-01'),
(137, '4', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-11-01'),
(138, '5', '17:00:00', '01:00:00', '08:00:00', '8.00', 0, '2022-11-01'),
(139, '1', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-11-02'),
(140, '2', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-11-02'),
(141, '3', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-11-02'),
(142, '4', '08:00:00', '17:00:00', '09:00:00', '9.00', 0, '2022-11-02'),
(143, '5', '17:00:00', '01:00:00', '08:00:00', '8.00', 0, '2022-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `cashadvance`
--

CREATE TABLE `cashadvance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `date_advanced` date NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cashadvance`
--

INSERT INTO `cashadvance` (`id`, `employee_id`, `amount`, `date_advanced`, `type`) VALUES
(1, 1, '500.00', '2022-09-16', 0),
(2, 2, '200.00', '2022-09-17', 0),
(5, 3, '500.00', '2022-09-20', 0),
(9, 1, '300.00', '2022-09-24', 0),
(10, 2, '1000.00', '2022-09-24', 0),
(11, 1, '100.00', '2022-09-24', 0),
(12, 1, '100.00', '2022-09-24', 0),
(13, 3, '500.00', '2022-09-24', 0),
(14, 1, '300.00', '2022-09-24', 0),
(15, 4, '1000.00', '2022-09-24', 0),
(16, 4, '500.00', '2022-09-24', 0),
(17, 1, '200.00', '2022-09-24', 0),
(18, 3, '500.00', '2022-09-24', 0),
(45, 30, '1000.00', '2022-10-24', 0),
(46, 1, '100.00', '2022-11-02', 0),
(47, 1, '12.00', '2022-11-02', 0),
(48, 1, '123.00', '2022-11-02', 0),
(49, 1, '735.00', '0000-00-00', 1),
(50, 2, '200.00', '0000-00-00', 1),
(51, 3, '500.00', '0000-00-00', 1),
(52, 4, '500.00', '0000-00-00', 1),
(53, 1, '1000.00', '2022-11-02', 0);

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
(1, '1', '1000.00'),
(2, '2', '0.00'),
(3, '3', '0.00'),
(4, '4', '0.00'),
(5, '30', '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `company_management`
--

CREATE TABLE `company_management` (
  `id` int(11) NOT NULL,
  `last_period` date NOT NULL,
  `grace_period` int(11) NOT NULL,
  `ca_limit` int(10) NOT NULL,
  `leave_limit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_management`
--

INSERT INTO `company_management` (`id`, `last_period`, `grace_period`, `ca_limit`, `leave_limit`) VALUES
(1, '2022-10-15', 15, 5000, 24);

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
('1', '255.00', '255.00', '255.00'),
('2', '255.00', '255.00', '255.00'),
('3', '255.00', '255.00', '255.00'),
('4', '255.00', '255.00', '200.00'),
('5', '255.00', '255.00', '256.00'),
('11', '255.00', '255.00', '255.00'),
('12', '255.00', '255.00', '255.00'),
('22', '255.00', '255.00', '255.00'),
('27', '255.00', '255.00', '255.00'),
('28', '255.00', '255.00', '255.00'),
('30', '255.00', '255.00', '255.00'),
('31', '255.00', '255.00', '255.00'),
('32', '255.00', '255.00', '255.00');

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
(1, '2022-09-16', 'UGE678295014', 1, 'Kervin Robby', 'Paraisoo', 'Pagtalunan', 3, '2001-12-13', 'Single', '1', '1', '09213208242', 'kervinpagtalunan@gmail.com', '1', '1', 'Balite, Malolos, Bulacan', 'Full-time', 1, 'Active', '../EmployeeFiles/ProfilePic/Employee1.png', '../EmployeeFiles/IDs/EmployeeID1_1.jpg', '../EmployeeFiles/IDs/EmployeeID2_1.jpg'),
(2, '2022-09-17', 'VJE621409378', 2, 'Von Paulo', 'Santiago', 'Plaza', 1, '2022-08-31', 'Married', '2', '2', '0192384912', 'vonpaulo@yahoo.com', '2', '2', 'Guiguinto, Bulacan', 'Full-time', 1, 'Active', '../EmployeeFiles/ProfilePic/Employee2.jpg', '../EmployeeFiles/IDs/EmployeeID1_2.jpg', '../EmployeeFiles/IDs/EmployeeID2_2.jpg'),
(3, '2022-09-17', 'XAP521960743', 3, 'Ryan Sedrick', 'Santiago', 'Nolasco', 1, '2022-09-15', 'Married', '12', '12', '0912345678', 'ryansedrick@gmail.com', '12', '12', 'Angat Dam', 'Part-time', 1, 'Active', '../EmployeeFiles/ProfilePic/Employee3.jpg', '../EmployeeFiles/IDs/EmployeeID1_3.jpg', '../EmployeeFiles/IDs/EmployeeID2_3.jpg'),
(4, '2022-09-21', 'XTN196045378', 4, 'Jan Carl', 'S', 'Talavera', 9, '2022-09-15', 'Single', '123', '123', '0192384912', '123123@2e131', '123', '123', 'guguinto', 'Full-time', 1, 'Active', '../EmployeeFiles/ProfilePic/Employee4.jpg', '../EmployeeFiles/IDs/EmployeeID1_4.jpg', '../EmployeeFiles/IDs/EmployeeID2_4.jpg'),
(5, '2022-09-29', 'XRF965871203', 6, 'John Benedict', 'haha', 'Correa', 1, '2022-09-15', 'Married', '129341', '1293793', '0919238912', 'ben@gmail.com', '1121927', '192378', 'Norzagaray, Bulacan', 'Full-time', 2, 'Active', '../EmployeeFiles/ProfilePic/Employee5.jpg', '../EmployeeFiles/IDs/EmployeeID1_5.jpg', '../EmployeeFiles/IDs/EmployeeID2_5.jpg'),
(30, '2022-10-24', 'LYO730816249', 9, 'Wally', '69', 'Bayola', 2, '2022-10-06', 'Widowed', '30', '30', '999121431', 'gamingvic47@gmail.com', '30', '30', 'Rosemary Lane', 'Full-time', 2, 'In-Active', '../EmployeeFiles/ProfilePic/Employee30.jpg', '../EmployeeFiles/IDs/EmployeeID1_30.jpg', '../EmployeeFiles/IDs/EmployeeID2_30.jpg'),
(31, '2022-11-03', 'YTB910682753', 8, 'Ryan', 'Amper', 'Kaindoy', 2, '2000-12-21', 'Single', '82937', '89234728', '092138237', 'ryankaindoy@gmail.com', '289323', '28934', 'Purok #4, Cofradia, City Of Malolos Bulacan', 'Full-time', 1, 'Active', '../EmployeeFiles/ProfilePic/Employee31.png', '../EmployeeFiles/IDs/EmployeeID1_31.png', '../EmployeeFiles/IDs/EmployeeID2_31.png'),
(32, '2022-11-03', 'XDV581603729', 76, 'Stephen', 'S', 'Curry', 9, '2022-11-23', 'Single', '234234', '213324', '123123', 'stephcurry@gmail.com', '5463', '23124', 'US', 'Part-time', 1, 'Active', '../EmployeeFiles/ProfilePic/Employee32.jpg', '../EmployeeFiles/IDs/EmployeeID1_32.jpg', '../EmployeeFiles/IDs/EmployeeID2_32.jpg');

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
  `date_2` date NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `description`, `day`, `month`, `date_added`, `date_2`, `type`) VALUES
(21, 'New Year\'s Day', '01', '01', '2022-10-19', '2022-01-01', 1),
(22, 'Lunar New Year', '01', '02', '2022-10-19', '2022-02-01', 1),
(26, 'Labour Day', '01', '05', '2022-10-19', '2022-05-01', 0),
(30, 'undas', '01', '10', '2022-10-23', '2022-10-01', 0),
(34, 'All Saints\' Day', '01', '11', '2022-11-03', '2022-11-02', 1),
(35, 'Christmas Day', '25', '12', '2022-11-03', '2022-12-25', 1);

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
(62, '1', '2022-11-04');

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
(18, '1', '2.00', '2022-10-01'),
(22, '4', '2.00', '2022-10-08'),
(24, '1', '2.00', '2022-10-08'),
(25, '1', '2.00', '2022-10-09'),
(50, '1', '1.00', '2022-10-23'),
(52, '1', '2.00', '2022-10-22'),
(56, '1', '2.00', '2022-10-24'),
(57, '30', '2.00', '2022-10-24'),
(58, '1', '2.00', '2022-10-26'),
(59, '1', '2.00', '2022-11-02'),
(60, '3', '2.00', '2022-11-02'),
(61, '31', '2.00', '2022-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_info`
--

CREATE TABLE `payroll_info` (
  `id` int(11) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `data` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `period` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll_info`
--

INSERT INTO `payroll_info` (`id`, `from`, `to`, `date_added`, `data`, `status`, `period`) VALUES
(1, '2022-10-16', '2022-10-31', '2022-10-19', 'W3sibmFtZSI6IktlcnZpbiBSb2JieSBQYWd0YWx1bmFuIiwiaWQiOiIxIiwiZW1wbG95ZWVLZXkiOiJVR0U2NzgyOTUwMTQiLCJkYXRlIjp7ImZyb20iOiIyMDIyLTEwLTE2IiwidG8iOiIyMDIyLTEwLTMxIn0sInJvbGUiOiJKYW5pdG9yIiwicmF0ZSI6eyJtb250aGx5IjoxMzQwMCwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjEiLCJQYWdJYmlnIjoiMSIsIlBoaWxIZWFsdGgiOiIxIn0sImRlZHVjdGlvbiI6eyJTU1MiOjI1NSwiUGFnSWJpZyI6MjU1LCJQaGlsSGVhbHRoIjoyNTUsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjoiNzM1LjAwIn0sIm90aGVyIjowfSwiZ3Jvc3MiOnsicHJlc2VudERheXMiOnsicXR5Ijo4LCJhbW91bnQiOjEwMDB9LCJvdmVydGltZSI6eyJxdHkiOjcsImFtb3VudCI6NDY5fSwiaG9saWRheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJsZWF2ZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sInRvdGFsV29ya0hyIjoiNzAifSwidG90YWwiOnsiZ3Jvc3MiOjQ2OTAsImRlZHVjdGlvbiI6MTUwMCwibmV0IjozMTkwfX0seyJuYW1lIjoiVm9uIFBhdWxvIFBsYXphIiwiaWQiOiIyIiwiZW1wbG95ZWVLZXkiOiJWSkU2MjE0MDkzNzgiLCJkYXRlIjp7ImZyb20iOiIyMDIyLTEwLTE2IiwidG8iOiIyMDIyLTEwLTMxIn0sInJvbGUiOiJBZG1pbiIsInJhdGUiOnsibW9udGhseSI6MTYwMDAsImRhaWx5Ijo2NDAsImhvdXJseSI6IjgwLjAwIn0sIklEcyI6eyJTU1MiOiIyIiwiUGFnSWJpZyI6IjIiLCJQaGlsSGVhbHRoIjoiMiJ9LCJkZWR1Y3Rpb24iOnsiU1NTIjoyNTUsIlBhZ0liaWciOjI1NSwiUGhpbEhlYWx0aCI6MjU1LCJDYXNoQWR2YW5jZSI6eyJxdHkiOjIsImFtb3VudCI6IjIwMC4wMCJ9LCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6OCwiYW1vdW50IjoxMDAwfSwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImxlYXZlIjp7InF0eSI6MCwiYW1vdW50IjowfSwidG90YWxXb3JrSHIiOiI3MCJ9LCJ0b3RhbCI6eyJncm9zcyI6NTYwMCwiZGVkdWN0aW9uIjo5NjUsIm5ldCI6NDYzNX19LHsibmFtZSI6IlJ5YW4gU2VkcmljayBOb2xhc2NvIiwiaWQiOiIzIiwiZW1wbG95ZWVLZXkiOiJYQVA1MjE5NjA3NDMiLCJkYXRlIjp7ImZyb20iOiIyMDIyLTEwLTE2IiwidG8iOiIyMDIyLTEwLTMxIn0sInJvbGUiOiJBZG1pbiIsInJhdGUiOnsibW9udGhseSI6MTYwMDAsImRhaWx5Ijo2NDAsImhvdXJseSI6IjgwLjAwIn0sIklEcyI6eyJTU1MiOiIxMiIsIlBhZ0liaWciOiIxMiIsIlBoaWxIZWFsdGgiOiIxMiJ9LCJkZWR1Y3Rpb24iOnsiU1NTIjoyNTUsIlBhZ0liaWciOjI1NSwiUGhpbEhlYWx0aCI6MjU1LCJDYXNoQWR2YW5jZSI6eyJxdHkiOjIsImFtb3VudCI6IjUwMC4wMCJ9LCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6OCwiYW1vdW50IjoxMDAwfSwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImxlYXZlIjp7InF0eSI6MCwiYW1vdW50IjowfSwidG90YWxXb3JrSHIiOiI3MiJ9LCJ0b3RhbCI6eyJncm9zcyI6NTc2MCwiZGVkdWN0aW9uIjoxMjY1LCJuZXQiOjQ0OTV9fSx7Im5hbWUiOiJKYW4gQ2FybCBUYWxhdmVyYSIsImlkIjoiNCIsImVtcGxveWVlS2V5IjoiWFROMTk2MDQ1Mzc4IiwiZGF0ZSI6eyJmcm9tIjoiMjAyMi0xMC0xNiIsInRvIjoiMjAyMi0xMC0zMSJ9LCJyb2xlIjoiSFIiLCJyYXRlIjp7Im1vbnRobHkiOjEzNDAwLCJkYWlseSI6NTM2LCJob3VybHkiOiI2Ny4wMCJ9LCJJRHMiOnsiU1NTIjoiMTIzIiwiUGFnSWJpZyI6IjEyMyIsIlBoaWxIZWFsdGgiOiIxMjMifSwiZGVkdWN0aW9uIjp7IlNTUyI6MjU1LCJQYWdJYmlnIjoyNTUsIlBoaWxIZWFsdGgiOjIwMCwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOiI1MDAuMDAifSwib3RoZXIiOjB9LCJncm9zcyI6eyJwcmVzZW50RGF5cyI6eyJxdHkiOjgsImFtb3VudCI6MTAwMH0sIm92ZXJ0aW1lIjp7InF0eSI6MCwiYW1vdW50IjowfSwiaG9saWRheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJsZWF2ZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sInRvdGFsV29ya0hyIjoiNjcifSwidG90YWwiOnsiZ3Jvc3MiOjQ0ODksImRlZHVjdGlvbiI6MTIxMCwibmV0IjozMjc5fX0seyJuYW1lIjoiSm9obiBCZW5lZGljdCBDb3JyZWEiLCJpZCI6IjUiLCJlbXBsb3llZUtleSI6IlhSRjk2NTg3MTIwMyIsImRhdGUiOnsiZnJvbSI6IjIwMjItMTAtMTYiLCJ0byI6IjIwMjItMTAtMzEifSwicm9sZSI6IkFkbWluIiwicmF0ZSI6eyJtb250aGx5IjoxNjAwMCwiZGFpbHkiOjY0MCwiaG91cmx5IjoiODAuMDAifSwiSURzIjp7IlNTUyI6IjEyOTM0MSIsIlBhZ0liaWciOiIxOTIzNzgiLCJQaGlsSGVhbHRoIjoiMTEyMTkyNyJ9LCJkZWR1Y3Rpb24iOnsiU1NTIjoyNTUsIlBhZ0liaWciOjI1NSwiUGhpbEhlYWx0aCI6MjU2LCJDYXNoQWR2YW5jZSI6eyJxdHkiOjIsImFtb3VudCI6MH0sIm90aGVyIjowfSwiZ3Jvc3MiOnsicHJlc2VudERheXMiOnsicXR5Ijo4LCJhbW91bnQiOjEwMDB9LCJvdmVydGltZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sImhvbGlkYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwibGVhdmUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJ0b3RhbFdvcmtIciI6IjY0In0sInRvdGFsIjp7Imdyb3NzIjo1MTIwLCJkZWR1Y3Rpb24iOjc2NiwibmV0Ijo0MzU0fX1d', 1, 2),
(2, '2022-10-01', '2022-10-15', '2022-10-19', 'W3sibmFtZSI6IktlcnZpbiBSb2JieSBQYWd0YWx1bmFuIiwiaWQiOiIxIiwiZW1wbG95ZWVLZXkiOiJVR0U2NzgyOTUwMTQiLCJkYXRlIjp7ImZyb20iOiIyMDIyLTEwLTAxIiwidG8iOiIyMDIyLTEwLTE1In0sInJvbGUiOiJKYW5pdG9yIiwicmF0ZSI6eyJtb250aGx5IjoxMzQwMCwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjEzIiwiUGFnSWJpZyI6IjEzIiwiUGhpbEhlYWx0aCI6IjEzIn0sImRlZHVjdGlvbiI6eyJTU1MiOjI1NSwiUGFnSWJpZyI6MjU1LCJQaGlsSGVhbHRoIjoyNTUsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjoxMDAwfSwib3RoZXIiOjB9LCJncm9zcyI6eyJwcmVzZW50RGF5cyI6eyJxdHkiOjgsImFtb3VudCI6MTAwMH0sIm92ZXJ0aW1lIjp7InF0eSI6NiwiYW1vdW50Ijo0MDJ9LCJob2xpZGF5cyI6eyJxdHkiOjMsImFtb3VudCI6MTYwOH0sImxlYXZlIjp7InF0eSI6MSwiYW1vdW50Ijo1MzZ9LCJ0b3RhbFdvcmtIciI6Ijc2In0sInRvdGFsIjp7Imdyb3NzIjo3MjM2LCJkZWR1Y3Rpb24iOjE3NjUsIm5ldCI6NTQ3MX19LHsibmFtZSI6IlZvbiBQYXVsbyBQbGF6YSIsImlkIjoiMiIsImVtcGxveWVlS2V5IjoiVkpFNjIxNDA5Mzc4IiwiZGF0ZSI6eyJmcm9tIjoiMjAyMi0xMC0wMSIsInRvIjoiMjAyMi0xMC0xNSJ9LCJyb2xlIjoiQWRtaW4iLCJyYXRlIjp7Im1vbnRobHkiOjEzNjAwLCJkYWlseSI6NTQ0LCJob3VybHkiOiI2OC4wMCJ9LCJJRHMiOnsiU1NTIjoiMiIsIlBhZ0liaWciOiIyIiwiUGhpbEhlYWx0aCI6IjIifSwiZGVkdWN0aW9uIjp7IlNTUyI6MjU1LCJQYWdJYmlnIjoyNTUsIlBoaWxIZWFsdGgiOjI1NSwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOjEwMDB9LCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6NywiYW1vdW50IjoxMDAwfSwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjMsImFtb3VudCI6MTYzMn0sImxlYXZlIjp7InF0eSI6MCwiYW1vdW50IjowfSwidG90YWxXb3JrSHIiOiI2MiJ9LCJ0b3RhbCI6eyJncm9zcyI6NTg0OCwiZGVkdWN0aW9uIjoxNzY1LCJuZXQiOjQwODN9fSx7Im5hbWUiOiJSeWFuIFNlZHJpY2sgTm9sYXNjbyIsImlkIjoiMyIsImVtcGxveWVlS2V5IjoiWEFQNTIxOTYwNzQzIiwiZGF0ZSI6eyJmcm9tIjoiMjAyMi0xMC0wMSIsInRvIjoiMjAyMi0xMC0xNSJ9LCJyb2xlIjoiQWRtaW4iLCJyYXRlIjp7Im1vbnRobHkiOjEzNjAwLCJkYWlseSI6NTQ0LCJob3VybHkiOiI2OC4wMCJ9LCJJRHMiOnsiU1NTIjoiMTIiLCJQYWdJYmlnIjoiMTIiLCJQaGlsSGVhbHRoIjoiMTIifSwiZGVkdWN0aW9uIjp7IlNTUyI6MjU1LCJQYWdJYmlnIjoyNTUsIlBoaWxIZWFsdGgiOjI1NSwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOjEwMDB9LCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6NywiYW1vdW50IjoxMDAwfSwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjMsImFtb3VudCI6MTYzMn0sImxlYXZlIjp7InF0eSI6MCwiYW1vdW50IjowfSwidG90YWxXb3JrSHIiOiI2MSJ9LCJ0b3RhbCI6eyJncm9zcyI6NTc4MCwiZGVkdWN0aW9uIjoxNzY1LCJuZXQiOjQwMTV9fSx7Im5hbWUiOiJKYW4gQ2FybCBUYWxhdmVyYSIsImlkIjoiNCIsImVtcGxveWVlS2V5IjoiWFROMTk2MDQ1Mzc4IiwiZGF0ZSI6eyJmcm9tIjoiMjAyMi0xMC0wMSIsInRvIjoiMjAyMi0xMC0xNSJ9LCJyb2xlIjoiSFIiLCJyYXRlIjp7Im1vbnRobHkiOjEzNDAwLCJkYWlseSI6NTM2LCJob3VybHkiOiI2Ny4wMCJ9LCJJRHMiOnsiU1NTIjoiMTIzIiwiUGFnSWJpZyI6IjEyMyIsIlBoaWxIZWFsdGgiOiIxMjMifSwiZGVkdWN0aW9uIjp7IlNTUyI6MjU1LCJQYWdJYmlnIjoyNTUsIlBoaWxIZWFsdGgiOjI1NSwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOjEwMDB9LCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6NywiYW1vdW50IjoxMDAwfSwib3ZlcnRpbWUiOnsicXR5IjoyLCJhbW91bnQiOjEzNH0sImhvbGlkYXlzIjp7InF0eSI6MywiYW1vdW50IjoxNjA4fSwibGVhdmUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJ0b3RhbFdvcmtIciI6IjY0In0sInRvdGFsIjp7Imdyb3NzIjo1ODk2LCJkZWR1Y3Rpb24iOjE3NjUsIm5ldCI6NDEzMX19LHsibmFtZSI6IkpvaG4gQmVuZWRpY3QgQ29ycmVhIiwiaWQiOiI1IiwiZW1wbG95ZWVLZXkiOiJYUkY5NjU4NzEyMDMiLCJkYXRlIjp7ImZyb20iOiIyMDIyLTEwLTAxIiwidG8iOiIyMDIyLTEwLTE1In0sInJvbGUiOiJBZG1pbiIsInJhdGUiOnsibW9udGhseSI6MTM2MDAsImRhaWx5Ijo1NDQsImhvdXJseSI6IjY4LjAwIn0sIklEcyI6eyJTU1MiOiIxMjkzNDEiLCJQYWdJYmlnIjoiMTkyMzc4IiwiUGhpbEhlYWx0aCI6IjExMjE5MjcifSwiZGVkdWN0aW9uIjp7IlNTUyI6MjU1LCJQYWdJYmlnIjoyNTUsIlBoaWxIZWFsdGgiOjI1NiwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOjB9LCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6OCwiYW1vdW50IjoxMDAwfSwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjMsImFtb3VudCI6MTYzMn0sImxlYXZlIjp7InF0eSI6MCwiYW1vdW50IjowfSwidG90YWxXb3JrSHIiOiI2MSJ9LCJ0b3RhbCI6eyJncm9zcyI6NTc4MCwiZGVkdWN0aW9uIjo3NjYsIm5ldCI6NTAxNH19XQ==', 1, 1),
(4, '2022-09-16', '2022-09-30', '2022-10-19', NULL, 0, 2),
(5, '2022-09-01', '2022-09-15', '2022-10-19', NULL, 0, 1),
(6, '2022-08-01', '2022-08-15', '2022-10-19', NULL, 0, 1),
(7, '2022-11-01', '2022-11-15', '2022-10-31', NULL, 0, 1);

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
(2, 'Guard', '65.00'),
(3, 'Janitor', '67.00'),
(9, 'HR', '67.00');

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
(2, '17:00:00', '01:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `company_management`
--
ALTER TABLE `company_management`
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
  ADD UNIQUE KEY `fingerprint_id` (`fingerprint_id`),
  ADD UNIQUE KEY `SSS` (`SSS`,`Tax`,`Email`,`PhilHealth`,`Pagibig`),
  ADD UNIQUE KEY `SSS_3` (`SSS`,`Tax`,`PhilHealth`,`Pagibig`),
  ADD UNIQUE KEY `SSS_5` (`SSS`),
  ADD UNIQUE KEY `Tax` (`Tax`,`Email`,`PhilHealth`,`Pagibig`),
  ADD UNIQUE KEY `Tax_2` (`Tax`),
  ADD UNIQUE KEY `PhilHealth` (`PhilHealth`),
  ADD UNIQUE KEY `Pagibig` (`Pagibig`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `SSS_2` (`SSS`),
  ADD KEY `SSS_4` (`SSS`);

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
-- Indexes for table `payroll_info`
--
ALTER TABLE `payroll_info`
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
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `attendance_csv`
--
ALTER TABLE `attendance_csv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `cashadvance`
--
ALTER TABLE `cashadvance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `cashadvance_total`
--
ALTER TABLE `cashadvance_total`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company_management`
--
ALTER TABLE `company_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `employeelist`
--
ALTER TABLE `employeelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `leave_info`
--
ALTER TABLE `leave_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `payroll_info`
--
ALTER TABLE `payroll_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
