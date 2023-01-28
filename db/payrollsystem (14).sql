-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 01:03 PM
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
('admin', 'Admin123', 2);

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
(364, 'Paid Leave for November 04 2022 is added to Kervin Robby Pagtalunan(1)  by admin Kervin Robby Pagtalunan(1)', '2022-11-04', '08:20:37', 'paidLeave'),
(365, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-11-04', '19:00:07', ''),
(366, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-11-04', '23:44:06', ''),
(367, 'Admin (Kervin Robby Pagtalunan, 1) has logged in', '2022-11-05', '09:11:55', ''),
(368, 'Account User is change to Stephen S Curry(32) by admin Kervin Robby Pagtalunan(1)', '2022-11-05', '09:20:14', 'accountSettings'),
(369, 'Account User is change to Von Paulo Santiago Plaza(2) by admin Stephen Curry(32)', '2022-11-05', '09:20:43', 'accountSettings'),
(370, 'Schedule no.1 (7:00 AM-5:00 PM) is edited by admin Von Paulo Plaza(2)', '2022-11-05', '10:40:20', 'schedule'),
(371, 'Attendance of Von Paulo Santiago Plaza(2) of 2022-11-01 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '10:40:49', 'attendance'),
(372, 'Schedule no.1 (1:00 AM-5:00 PM) is edited by admin Von Paulo Plaza(2)', '2022-11-05', '10:41:33', 'schedule'),
(373, 'Schedule no.1 (7:00 AM-5:00 PM) is edited by admin Von Paulo Plaza(2)', '2022-11-05', '10:42:03', 'schedule'),
(374, 'Schedule no.1 (7:00 AM-5:00 PM) is edited by admin Von Paulo Plaza(2)', '2022-11-05', '10:42:25', 'schedule'),
(375, 'Schedule no.1 (07:00:00-17:00:00) is edited by admin Von Paulo Plaza(2)', '2022-11-05', '10:46:57', 'schedule'),
(376, 'Attendance of Von Paulo Santiago Plaza(2) of 2022-11-01 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '10:47:40', 'attendance'),
(377, 'Kervin Robby Pagtalunan(1) schedule is change to schedule no.2 by admin Von Paulo Plaza(2)', '2022-11-05', '10:48:53', 'schedule'),
(378, 'Kervin Robby Pagtalunan(1) schedule is change to schedule no.1 by admin Von Paulo Plaza(2)', '2022-11-05', '10:48:58', 'schedule'),
(379, 'Payroll period for the 2nd period of November of 2022 is added by Admin Von Paulo Plaza(2).', '2022-11-05', '11:45:04', 'payroll'),
(380, 'Payroll period for the 1st period of November of 2022 is added by Admin Von Paulo Plaza(2).', '2022-11-05', '11:55:24', 'payroll'),
(381, 'Payroll period for the 1st period of November of 2022 is added by Admin Von Paulo Plaza(2).', '2022-11-05', '12:00:16', 'payroll'),
(382, 'Raniah Roselle Pagtalunan Dela Cruz(41) has been added to Employee List by admin Von Paulo Plaza(2)', '2022-11-05', '05:15:48', 'employeeEdit'),
(383, 'Employee No.41 Raniah Roselle Pagtalunan Dela Cruz is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '12:16:44', 'employeeEdit'),
(384, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '13:53:26', 'employeeEdit'),
(385, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '13:53:30', 'employeeEdit'),
(386, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '14:02:14', 'employeeEdit'),
(387, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '14:02:19', 'employeeEdit'),
(388, 'Attendance was uploaded with 0 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '14:05:55', 'attendance'),
(389, 'Attendance was uploaded with 0 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '14:54:54', 'attendance'),
(390, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '14:55:07', 'attendance'),
(391, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '16:48:50', 'attendance'),
(392, 'Attendance of Stephen Curry(32) of 2022-11-06 is deleted by Admin Von Paulo Plaza(2).', '2022-11-05', '09:53:51', 'attendance'),
(393, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '16:55:07', 'attendance'),
(394, 'Attendance of Stephen Curry(32) of 2022-11-06 is deleted by Admin Von Paulo Plaza(2).', '2022-11-05', '09:55:46', 'attendance'),
(395, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '16:56:00', 'attendance'),
(396, 'Attendance of Stephen Curry(32) of 2022-11-06 is deleted by Admin Von Paulo Plaza(2).', '2022-11-05', '10:01:21', 'attendance'),
(397, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '17:01:40', 'attendance'),
(398, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '17:07:01', 'attendance'),
(399, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '17:13:27', 'attendance'),
(400, 'Attendance of John Benedict Correa(5) of 2022-11-05 is deleted by Admin Von Paulo Plaza(2).', '2022-11-05', '10:16:12', 'attendance'),
(401, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '17:19:56', 'attendance'),
(402, 'Attendance of John Benedict Correa(5) of 2022-11-05 is deleted by Admin Von Paulo Plaza(2).', '2022-11-05', '10:20:02', 'attendance'),
(403, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '17:21:14', 'attendance'),
(404, 'Attendance of John Benedict Correa(5) of 2022-11-05 is deleted by Admin Von Paulo Plaza(2).', '2022-11-05', '10:21:17', 'attendance'),
(405, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '17:21:46', 'attendance'),
(406, 'Attendance of John Benedict Correa(5) of 2022-11-05 is deleted by Admin Von Paulo Plaza(2).', '2022-11-05', '10:21:52', 'attendance'),
(407, 'Account User is change to Raniah Roselle Pagtalunan Dela Cruz(41) by admin Von Paulo Plaza(2)', '2022-11-05', '17:22:15', 'accountSettings'),
(408, 'Account User is change to Von Paulo Santiago Plaza(2) by admin Raniah Roselle Dela Cruz(41)', '2022-11-05', '17:22:20', 'accountSettings'),
(409, 'Account User is change to Kervin Robby Paraisoo Pagtalunan(1) by admin Von Paulo Plaza(2)', '2022-11-05', '17:29:32', 'accountSettings'),
(410, 'Account User is change to Von Paulo Santiago Plaza(2) by admin Kervin Robby Pagtalunan(1)', '2022-11-05', '17:29:35', 'accountSettings'),
(411, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '17:43:01', 'attendance'),
(412, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:50:25', 'attendance'),
(413, 'Schedule no.2 (01:00:00-03:00:00) is edited by admin Von Paulo Plaza(2)', '2022-11-05', '17:52:23', 'schedule'),
(414, 'Schedule no.2 (17:00:00-01:00:00) is edited by admin Von Paulo Plaza(2)', '2022-11-05', '17:56:05', 'schedule'),
(415, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:56:30', 'attendance'),
(416, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:57:59', 'attendance'),
(417, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:58:04', 'attendance'),
(418, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:58:04', 'attendance'),
(419, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:58:04', 'attendance'),
(420, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:58:04', 'attendance'),
(421, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:58:04', 'attendance'),
(422, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:58:04', 'attendance'),
(423, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:58:04', 'attendance'),
(424, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:58:05', 'attendance'),
(425, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:58:05', 'attendance'),
(426, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:58:05', 'attendance'),
(427, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:58:05', 'attendance'),
(428, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:58:09', 'attendance'),
(429, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:58:09', 'attendance'),
(430, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:58:09', 'attendance'),
(431, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:58:40', 'attendance'),
(432, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '17:59:45', 'attendance'),
(433, 'Attendance of John Benedict Correa(5) of 2022-11-05 is deleted by Admin Von Paulo Plaza(2).', '2022-11-05', '11:04:38', 'attendance'),
(434, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '18:04:43', 'attendance'),
(435, 'Attendance of John Benedict Correa(5) of 2022-11-05 is deleted by Admin Von Paulo Plaza(2).', '2022-11-05', '11:05:32', 'attendance'),
(436, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '18:05:38', 'attendance'),
(437, 'Attendance of Raniah Roselle Dela Cruz(41) of 2022-11-05 is deleted by Admin Von Paulo Plaza(2).', '2022-11-05', '11:06:21', 'attendance'),
(438, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '18:06:45', 'attendance'),
(439, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '18:13:10', 'attendance'),
(440, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '18:15:11', 'attendance'),
(441, 'Schedule no.2 (17:00:00-08:00:00) is edited by admin Von Paulo Plaza(2)', '2022-11-05', '18:26:09', 'schedule'),
(442, 'Schedule no.2 (17:00:00-03:00:00) is edited by admin Von Paulo Plaza(2)', '2022-11-05', '18:26:33', 'schedule'),
(443, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '18:26:59', 'attendance'),
(444, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '18:27:17', 'attendance'),
(445, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '18:27:43', 'attendance'),
(446, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '18:29:01', 'attendance'),
(447, 'Attendance of Raniah Roselle Pagtalunan Dela Cruz(41) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '18:32:02', 'attendance'),
(448, 'Attendance of Raniah Roselle Pagtalunan Dela Cruz(41) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '18:32:17', 'attendance'),
(449, 'Attendance of Raniah Roselle Pagtalunan Dela Cruz(41) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '18:32:25', 'attendance'),
(450, 'Attendance of Raniah Roselle Pagtalunan Dela Cruz(41) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '18:32:30', 'attendance'),
(451, 'Attendance of Raniah Roselle Pagtalunan Dela Cruz(41) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '18:32:35', 'attendance'),
(452, 'Attendance of Raniah Roselle Pagtalunan Dela Cruz(41) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '18:32:44', 'attendance'),
(453, 'Attendance of Raniah Roselle Pagtalunan Dela Cruz(41) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '18:33:09', 'attendance'),
(454, 'Attendance of Raniah Roselle Pagtalunan Dela Cruz(41) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '18:33:34', 'attendance'),
(455, 'Attendance of John Benedict Correa(5) of 2022-11-05 is deleted by Admin Von Paulo Plaza(2).', '2022-11-05', '12:19:24', 'attendance'),
(456, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '19:19:31', 'attendance'),
(457, 'Attendance of John Benedict Correa(5) of 2022-11-05 is deleted by Admin Von Paulo Plaza(2).', '2022-11-05', '12:20:43', 'attendance'),
(458, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '19:20:48', 'attendance'),
(459, 'Attendance of John Benedict Correa(5) of 2022-11-05 is deleted by Admin Von Paulo Plaza(2).', '2022-11-05', '12:21:53', 'attendance'),
(460, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '19:22:00', 'attendance'),
(461, 'Attendance of John Benedict Correa(5) of 2022-11-05 is deleted by Admin Von Paulo Plaza(2).', '2022-11-05', '12:22:16', 'attendance'),
(462, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '19:22:22', 'attendance'),
(463, 'Attendance of John Benedict haha Correa(5) of 2022-11-05 is edited by Admin Von Paulo Plaza(2).', '2022-11-05', '19:22:35', 'attendance'),
(464, 'Attendance of John Benedict Correa(5) of 2022-11-05 is deleted by Admin Von Paulo Plaza(2).', '2022-11-05', '12:22:55', 'attendance'),
(465, 'Attendance was uploaded with 3 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-05', '19:24:47', 'attendance'),
(466, 'Schedule no.2 (17:00:00-02:00:00) is edited by admin Von Paulo Plaza(2)', '2022-11-05', '19:41:36', 'schedule'),
(467, 'Schedule no.2 (17:00:00-03:00:00) is edited by admin Von Paulo Plaza(2)', '2022-11-05', '19:41:46', 'schedule'),
(468, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-05', '20:40:40', ''),
(469, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-05', '20:44:11', ''),
(470, 'Kyla Aranzanso Delfin(44) has been added to Employee List by admin Von Paulo Plaza(2)', '2022-11-05', '13:47:34', 'employeeEdit'),
(471, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-06', '19:54:19', ''),
(472, 'asdsad is added to holidays for the date 2022-11-03 by admin Von Paulo Plaza(2)', '2022-11-06', '20:44:15', 'holiday'),
(473, ' is added to holidays for the date 2022-12-25 by admin Von Paulo Plaza(2)', '2022-11-06', '22:58:33', 'holiday'),
(474, 'tite is added to holidays for the date 2022-11-04 by admin Von Paulo Plaza(2)', '2022-11-06', '23:05:47', 'holiday'),
(475, 'asd is deleted to holidays for the date 2022-11-04 by admin Von Paulo Plaza(2)', '2022-11-06', '23:15:06', 'holiday'),
(476, ' is deleted to holidays for the date 2022-11-02 by admin Von Paulo Plaza(2)', '2022-11-06', '23:15:24', 'holiday'),
(477, 'asdsad is deleted to holidays for the date 2022-11-03 by admin Von Paulo Plaza(2)', '2022-11-06', '23:15:28', 'holiday'),
(478, 'tite is added to holidays for the date 2022-11-02 by admin Von Paulo Plaza(2)', '2022-11-06', '23:18:29', 'holiday'),
(479, 'asda is added to holidays for the date 2022-11-03 by admin Von Paulo Plaza(2)', '2022-11-06', '23:18:37', 'holiday'),
(480, 'sdfsdf is added to holidays for the date 2022-11-04 by admin Von Paulo Plaza(2)', '2022-11-06', '23:19:35', 'holiday'),
(481, 'asdas is added to holidays for the date 2022-11-05 by admin Von Paulo Plaza(2)', '2022-11-06', '23:19:50', 'holiday'),
(482, 'asd is added to holidays for the date 2022-11-07 by admin Von Paulo Plaza(2)', '2022-11-06', '23:20:08', 'holiday'),
(483, 'asd is deleted to holidays for the date 2022-11-07 by admin Von Paulo Plaza(2)', '2022-11-06', '23:20:13', 'holiday'),
(484, 'asdasd is deleted to holidays for the date 2022-11-05 by admin Von Paulo Plaza(2)', '2022-11-06', '23:20:17', 'holiday'),
(485, ' is deleted to holidays for the date 2022-11-04 by admin Von Paulo Plaza(2)', '2022-11-06', '23:20:20', 'holiday'),
(486, 'assd is deleted to holidays for the date 2022-11-03 by admin Von Paulo Plaza(2)', '2022-11-06', '23:20:22', 'holiday'),
(487, 'asd is deleted to holidays for the date 2022-11-02 by admin Von Paulo Plaza(2)', '2022-11-06', '23:20:25', 'holiday'),
(488, 'wef324 is added to holidays for the date 2022-11-02 by admin Von Paulo Plaza(2)', '2022-11-06', '23:20:36', 'holiday'),
(489, ' is deleted to holidays for the date 2022-11-02 by admin Von Paulo Plaza(2)', '2022-11-06', '23:20:40', 'holiday'),
(490, 'tyty is added to holidays for the date 2022-11-02 by admin Von Paulo Plaza(2)', '2022-11-06', '23:21:29', 'holiday'),
(491, 'asd is deleted to holidays for the date 2022-11-02 by admin Von Paulo Plaza(2)', '2022-11-06', '23:21:34', 'holiday'),
(492, 'HAHAHA is added to holidays for the date 2022-11-02 by admin Von Paulo Plaza(2)', '2022-11-06', '23:22:17', 'holiday'),
(493, ' is deleted to holidays for the date 2022-11-02 by admin Von Paulo Plaza(2)', '2022-11-06', '23:22:23', 'holiday'),
(494, 'yuaysdf is added to holidays for the date 2022-11-02 by admin Von Paulo Plaza(2)', '2022-11-06', '23:22:37', 'holiday'),
(495, 'asidjasdjk is deleted to holidays for the date 2022-11-02 by admin Von Paulo Plaza(2)', '2022-11-06', '23:22:41', 'holiday'),
(496, 'undas is added to holidays for the date 2022-11-02 by admin Von Paulo Plaza(2)', '2022-11-06', '23:28:05', 'holiday'),
(497, 'asd is deleted to holidays for the date 2022-11-02 by admin Von Paulo Plaza(2)', '2022-11-06', '23:34:00', 'holiday'),
(498, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-07', '08:49:41', ''),
(499, 'Karlo Paraiso Pagtalunan(45) has been added to Employee List by admin Von Paulo Plaza(2)', '2022-11-07', '01:53:33', 'employeeEdit'),
(500, 'Employee No.30 Wally 69 Bayola is edited by Admin Von Paulo Plaza(2).', '2022-11-07', '08:54:17', 'employeeEdit'),
(501, 'Kyed Paraiso Pagtalunan(46) has been added to Employee List by admin Von Paulo Plaza(2)', '2022-11-07', '02:32:09', 'employeeEdit'),
(502, 'asd is added to holidays for the date 2022-11-02 by admin Von Paulo Plaza(2)', '2022-11-07', '22:03:11', 'holiday'),
(503, 'asd is deleted to holidays for the date 2022-11-02 by admin Von Paulo Plaza(2)', '2022-11-07', '22:03:15', 'holiday'),
(504, 'asd is added to holidays for the date 2022-11-08 by admin Von Paulo Plaza(2)', '2022-11-08', '00:24:50', 'holiday'),
(505, 'a is deleted to holidays for the date 2022-11-08 by admin Von Paulo Plaza(2)', '2022-11-08', '00:24:54', 'holiday'),
(506, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-08', '00:52:52', 'employeeEdit');
INSERT INTO `activity_logs` (`id`, `activity`, `date`, `time`, `type`) VALUES
(507, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-08', '00:56:29', 'employeeEdit'),
(508, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-09', '09:13:46', ''),
(509, 'Kyed Pagtalunan(46) schedule is change to schedule no.2 by admin Von Paulo Plaza(2)', '2022-11-09', '10:19:05', 'schedule'),
(510, 'Kyed Pagtalunan(46) schedule is change to schedule no.1 by admin Von Paulo Plaza(2)', '2022-11-09', '10:19:11', 'schedule'),
(511, 'Kyed Pagtalunan(46) schedule is change to schedule no.2 by admin Von Paulo Plaza(2)', '2022-11-09', '10:19:24', 'schedule'),
(512, 'Kyed Pagtalunan(46) schedule is change to schedule no.2 by admin Von Paulo Plaza(2)', '2022-11-09', '10:19:31', 'schedule'),
(513, 'Deduction of Kyed Paraiso Pagtalunan(46) is edited by Admin Von Paulo Plaza(2).', '2022-11-09', '12:45:01', 'deduction'),
(514, 'Kervin Robby Paraisoo Pagtalunan(1) cash advances balance is edited by admin Von Paulo Plaza(2)', '2022-11-09', '09:14:31', 'cashAdvance'),
(515, 'Kervin Robby Paraisoo Pagtalunan(1) cash advances balance is edited by admin Von Paulo Plaza(2)', '2022-11-09', '21:08:09', 'cashAdvance'),
(516, 'Kervin Robby Paraisoo Pagtalunan(1) cash advances balance is edited by admin Von Paulo Plaza(2)', '2022-11-09', '21:12:29', 'cashAdvance'),
(517, 'Kervin Robby Paraisoo Pagtalunan(1) cash advances balance is edited by admin Von Paulo Plaza(2)', '2022-11-09', '21:12:39', 'cashAdvance'),
(518, 'Von Paulo Santiago Plaza(2) cash advances balance is edited by admin Von Paulo Plaza(2)', '2022-11-09', '21:12:50', 'cashAdvance'),
(519, 'Kervin Robby Paraisoo Pagtalunan(1) cash advances balance is edited by admin Von Paulo Plaza(2)', '2022-11-09', '21:16:32', 'cashAdvance'),
(520, 'Kervin Robby Paraisoo Pagtalunan(1) cash advances balance is edited by admin Von Paulo Plaza(2)', '2022-11-09', '21:17:52', 'cashAdvance'),
(521, 'Kervin Robby Paraisoo Pagtalunan(1) cash advances balance is edited by admin Von Paulo Plaza(2)', '2022-11-09', '21:17:57', 'cashAdvance'),
(522, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-11', '00:18:14', ''),
(523, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-11', '08:50:06', ''),
(524, ' is deleted to holidays for the date 2022-12-25 by admin Von Paulo Plaza(2)', '2022-11-11', '11:57:48', 'holiday'),
(525, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-12', '07:33:49', ''),
(526, 'Kervin Robby Paraisoo Pagtalunan(1) Overtime for November 02, 2022 is edited by admin Von Paulo Plaza(2)', '2022-11-12', '08:43:31', 'overtime'),
(527, 'Kervin Robby Paraisoo Pagtalunan(1) Overtime for November 02, 2022 is edited by admin Von Paulo Plaza(2)', '2022-11-12', '08:43:35', 'overtime'),
(528, 'Attendance of Von Paulo Santiago Plaza(2) of 2022-11-01 is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '09:09:32', 'attendance'),
(529, 'Attendance of Von Paulo Santiago Plaza(2) of 2022-11-01 is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '09:09:47', 'attendance'),
(530, 'Attendance of Von Paulo Santiago Plaza(2) of 2022-11-01 is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '09:09:58', 'attendance'),
(531, 'Grace period is change to 15 mintues by admin Von Paulo Plaza(2)', '2022-11-12', '09:22:11', 'companyManagement'),
(532, 'Paid Leave limit is change to 24 days by admin Von Paulo Plaza(2)', '2022-11-12', '09:22:26', 'companyManagement'),
(533, 'Grace period is change to 15 mintues by admin Von Paulo Plaza(2)', '2022-11-12', '09:22:41', 'companyManagement'),
(534, 'Grace period is change to 15 mintues by admin Von Paulo Plaza(2)', '2022-11-12', '09:23:10', 'companyManagement'),
(535, 'Grace period is change to 15 mintues by admin Von Paulo Plaza(2)', '2022-11-12', '09:23:32', 'companyManagement'),
(536, 'Employee No.5 John Benedict haha Correa is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '09:51:32', 'employeeEdit'),
(537, 'Employee No.5 John Benedict haha Correa is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '09:51:40', 'employeeEdit'),
(538, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:09:32', 'employeeEdit'),
(539, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:09:50', 'employeeEdit'),
(540, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:12:09', 'employeeEdit'),
(541, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:13:22', 'employeeEdit'),
(542, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:15:02', 'employeeEdit'),
(543, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:15:03', 'employeeEdit'),
(544, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:15:03', 'employeeEdit'),
(545, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:15:04', 'employeeEdit'),
(546, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:15:50', 'employeeEdit'),
(547, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:35:26', 'employeeEdit'),
(548, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:35:40', 'employeeEdit'),
(549, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:36:08', 'employeeEdit'),
(550, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:36:39', 'employeeEdit'),
(551, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:40:45', 'employeeEdit'),
(552, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:41:26', 'employeeEdit'),
(553, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:43:18', 'employeeEdit'),
(554, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:43:23', 'employeeEdit'),
(555, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:43:34', 'employeeEdit'),
(556, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:43:50', 'employeeEdit'),
(557, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:43:52', 'employeeEdit'),
(558, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:43:55', 'employeeEdit'),
(559, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:43:57', 'employeeEdit'),
(560, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:44:10', 'employeeEdit'),
(561, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:44:20', 'employeeEdit'),
(562, 'Employee No.1 Kervin Robby Paraisoo Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:44:40', 'employeeEdit'),
(563, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:44:53', 'employeeEdit'),
(564, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:44:58', 'employeeEdit'),
(565, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:45:06', 'employeeEdit'),
(566, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:45:17', 'employeeEdit'),
(567, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:46:41', 'employeeEdit'),
(568, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:46:48', 'employeeEdit'),
(569, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:46:55', 'employeeEdit'),
(570, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:48:14', 'employeeEdit'),
(571, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:48:20', 'employeeEdit'),
(572, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:49:26', 'employeeEdit'),
(573, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:51:06', 'employeeEdit'),
(574, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:52:12', 'employeeEdit'),
(575, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:52:25', 'employeeEdit'),
(576, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:52:41', 'employeeEdit'),
(577, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:53:08', 'employeeEdit'),
(578, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:53:12', 'employeeEdit'),
(579, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:53:54', 'employeeEdit'),
(580, 'admin Von Paulo Plaza(2) has logged out', '2022-11-12', '10:56:11', ''),
(581, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-12', '10:56:16', ''),
(582, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:56:33', 'employeeEdit'),
(583, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:58:20', 'employeeEdit'),
(584, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:58:43', 'employeeEdit'),
(585, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '10:58:52', 'employeeEdit'),
(586, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:00:11', 'employeeEdit'),
(587, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:00:24', 'employeeEdit'),
(588, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:00:35', 'employeeEdit'),
(589, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:01:39', 'employeeEdit'),
(590, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:03:44', 'employeeEdit'),
(591, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:04:18', 'employeeEdit'),
(592, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:04:30', 'employeeEdit'),
(593, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:04:42', 'employeeEdit'),
(594, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:04:47', 'employeeEdit'),
(595, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:04:48', 'employeeEdit'),
(596, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:04:49', 'employeeEdit'),
(597, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:04:54', 'employeeEdit'),
(598, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:05:04', 'employeeEdit'),
(599, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:24:27', 'employeeEdit'),
(600, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-12', '11:30:53', ''),
(601, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:31:39', 'employeeEdit'),
(602, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:35:38', 'employeeEdit'),
(603, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:36:06', 'employeeEdit'),
(604, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:36:17', 'employeeEdit'),
(605, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:37:24', 'employeeEdit'),
(606, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:37:40', 'employeeEdit'),
(607, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:37:42', 'employeeEdit'),
(608, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:38:00', 'employeeEdit'),
(609, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:38:17', 'employeeEdit'),
(610, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:38:38', 'employeeEdit'),
(611, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:41:23', 'employeeEdit'),
(612, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:41:30', 'employeeEdit'),
(613, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:45:36', 'employeeEdit'),
(614, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:45:59', 'employeeEdit'),
(615, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:46:42', 'employeeEdit'),
(616, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:46:58', 'employeeEdit'),
(617, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:52:52', 'employeeEdit'),
(618, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:53:18', 'employeeEdit'),
(619, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '11:53:47', 'employeeEdit'),
(620, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:13:24', 'employeeEdit'),
(621, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:15:48', 'employeeEdit'),
(622, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:15:58', 'employeeEdit'),
(623, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:16:02', 'employeeEdit'),
(624, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:17:26', 'employeeEdit'),
(625, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:17:41', 'employeeEdit'),
(626, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:17:50', 'employeeEdit'),
(627, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:18:18', 'employeeEdit'),
(628, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:19:01', 'employeeEdit'),
(629, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:19:23', 'employeeEdit'),
(630, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:21:33', 'employeeEdit'),
(631, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:33:32', 'employeeEdit'),
(632, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:34:35', 'employeeEdit'),
(633, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:34:44', 'employeeEdit'),
(634, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:36:13', 'employeeEdit'),
(635, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:37:28', 'employeeEdit'),
(636, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:37:57', 'employeeEdit'),
(637, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:38:24', 'employeeEdit'),
(638, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:38:35', 'employeeEdit'),
(639, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:39:49', 'employeeEdit'),
(640, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:39:56', 'employeeEdit'),
(641, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:40:08', 'employeeEdit'),
(642, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:40:53', 'employeeEdit'),
(643, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:42:38', 'employeeEdit'),
(644, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:42:54', 'employeeEdit'),
(645, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:43:06', 'employeeEdit'),
(646, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:43:25', 'employeeEdit'),
(647, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:45:39', 'employeeEdit'),
(648, 'Employee No.3 Ryan Sedrick Santiago Nolasco is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:45:55', 'employeeEdit'),
(649, 'Employee No.4 Jan Carl S Talavera is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:46:04', 'employeeEdit'),
(650, 'Employee No.5 John Benedict haha Correa is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:46:11', 'employeeEdit'),
(651, 'Employee No.30 Wally 69 Bayola is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:46:40', 'employeeEdit'),
(652, 'Employee No.31 Ryan Amper Kaindoy is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:46:59', 'employeeEdit'),
(653, 'Employee No.32 Stephen S Curry is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:47:08', 'employeeEdit'),
(654, 'Employee No.41 Raniah Roselle Pagtalunan Dela Cruz is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:47:16', 'employeeEdit'),
(655, 'Employee No.44 Kyla Aranzanso Delfin is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:47:29', 'employeeEdit'),
(656, 'Employee No.45 Karlo Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:47:42', 'employeeEdit'),
(657, 'Employee No.46 Kyed Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:47:55', 'employeeEdit'),
(658, 'Employee No.3 Ryan Sedrick Santiago Nolasco is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:48:24', 'employeeEdit'),
(659, 'Employee No.3 Ryan Sedrick Santiago Nolasco is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:48:41', 'employeeEdit'),
(660, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '12:48:50', 'employeeEdit'),
(661, 'Darius G Garland(57) has been added to Employee List by admin Von Paulo Plaza(2)', '2022-11-12', '05:51:42', 'employeeEdit'),
(662, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:06:05', 'employeeEdit'),
(663, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:06:56', 'employeeEdit'),
(664, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:07:32', 'employeeEdit'),
(665, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:07:48', 'employeeEdit'),
(666, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:14:28', 'employeeEdit'),
(667, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:14:58', 'employeeEdit'),
(668, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:15:00', 'employeeEdit'),
(669, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:15:00', 'employeeEdit'),
(670, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:15:01', 'employeeEdit'),
(671, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:15:01', 'employeeEdit'),
(672, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:15:10', 'employeeEdit'),
(673, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:15:16', 'employeeEdit'),
(674, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:15:22', 'employeeEdit'),
(675, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:15:33', 'employeeEdit'),
(676, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:15:45', 'employeeEdit'),
(677, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:16:47', 'employeeEdit'),
(678, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:16:49', 'employeeEdit'),
(679, 'Employee No.4 Jan Carl S Talavera is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:17:19', 'employeeEdit'),
(680, 'Employee No.4 Jan Carl S Talavera is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:17:23', 'employeeEdit'),
(681, 'Employee No.4 Jan Carl S Talavera is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:17:32', 'employeeEdit'),
(682, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:18:01', 'employeeEdit'),
(683, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:18:03', 'employeeEdit'),
(684, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:18:09', 'employeeEdit'),
(685, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:18:20', 'employeeEdit'),
(686, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:18:33', 'employeeEdit'),
(687, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:18:52', 'employeeEdit'),
(688, 'Employee No.3 Ryan Sedrick Santiago Nolasco is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:19:14', 'employeeEdit'),
(689, 'Employee No.5 John Benedict haha Correa is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:41:30', 'employeeEdit'),
(690, 'Employee No.5 John Benedict haha Correa is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:41:43', 'employeeEdit'),
(691, 'Employee No.5 John Benedict haha Correa is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:42:13', 'employeeEdit'),
(692, 'Employee No.5 John Benedict haha Correa is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:42:37', 'employeeEdit'),
(693, 'Employee No.5 John Benedict haha Correa is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:43:14', 'employeeEdit'),
(694, 'Employee No.5 John Benedict haha Correa is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:43:42', 'employeeEdit'),
(695, 'Employee No.5 John Benedict haha Correa is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:45:02', 'employeeEdit'),
(696, 'Employee No.5 John Benedict haha Correa is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '16:59:27', 'employeeEdit'),
(697, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '18:47:12', 'employeeEdit'),
(698, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '18:47:33', 'employeeEdit'),
(699, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '18:47:39', 'employeeEdit'),
(700, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '18:48:05', 'employeeEdit'),
(701, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '18:48:23', 'employeeEdit'),
(702, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '18:48:30', 'employeeEdit'),
(703, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '18:48:57', 'employeeEdit'),
(704, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '18:49:22', 'employeeEdit'),
(705, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '18:49:31', 'employeeEdit'),
(706, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '18:49:50', 'employeeEdit'),
(707, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-12', '18:54:50', ''),
(708, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '18:55:06', 'employeeEdit'),
(709, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '18:57:24', 'employeeEdit'),
(710, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '18:58:29', 'employeeEdit'),
(711, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '18:59:36', 'employeeEdit'),
(712, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '18:59:45', 'employeeEdit'),
(713, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '18:59:50', 'employeeEdit'),
(714, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '18:59:57', 'employeeEdit'),
(715, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:01:21', 'employeeEdit'),
(716, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:01:59', 'employeeEdit'),
(717, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:02:03', 'employeeEdit'),
(718, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:02:23', 'employeeEdit'),
(719, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:02:29', 'employeeEdit'),
(720, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:02:31', 'employeeEdit'),
(721, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:04:09', 'employeeEdit'),
(722, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:04:12', 'employeeEdit'),
(723, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:04:22', 'employeeEdit'),
(724, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:04:26', 'employeeEdit'),
(725, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:04:33', 'employeeEdit'),
(726, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:04:42', 'employeeEdit'),
(727, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:06:09', 'employeeEdit'),
(728, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:06:13', 'employeeEdit'),
(729, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:06:35', 'employeeEdit'),
(730, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:06:37', 'employeeEdit'),
(731, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:07:53', 'employeeEdit'),
(732, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:07:59', 'employeeEdit'),
(733, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:08:30', 'employeeEdit'),
(734, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:08:40', 'employeeEdit'),
(735, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:08:45', 'employeeEdit'),
(736, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:08:51', 'employeeEdit'),
(737, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:12:55', 'employeeEdit'),
(738, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:13:36', 'employeeEdit'),
(739, 'Francis Delos Reyes Teodoro(62) has been added to Employee List by admin Von Paulo Plaza(2)', '2022-11-12', '12:18:16', 'employeeEdit'),
(740, 'Kervin Robby Paraiso Pagtalunan(1) advanced &#8369;500 by admin Von Paulo Plaza(2)', '2022-11-12', '19:28:20', 'cashAdvance'),
(741, 'Account User is change to Francis Delos Reyes Teodoro(62) by admin Von Paulo Plaza(2)', '2022-11-12', '19:29:08', 'accountSettings'),
(742, 'Account User is change to Ryan Sedrick Santiago Nolasco(3) by admin Francis Teodoro(62)', '2022-11-12', '19:29:14', 'accountSettings'),
(743, 'Account User is change to Von Paulo Santiago Plaza(2) by admin Ryan Sedrick Nolasco(3)', '2022-11-12', '19:29:21', 'accountSettings'),
(744, 'Schedule no.2 (17:00:00-02:00:00) is edited by admin Von Paulo Plaza(2)', '2022-11-12', '19:30:22', 'schedule'),
(745, 'Schedule no.2 (17:00:00-03:00:00) is edited by admin Von Paulo Plaza(2)', '2022-11-12', '19:30:25', 'schedule'),
(746, 'Schedule no.11 (01:00:00-01:00:00) is added to Schedules by admin Von Paulo Plaza(2)', '2022-11-12', '19:33:48', 'schedule'),
(747, 'Schedule no.11 is deleted to Schedules by admin Von Paulo Plaza(2)', '2022-11-12', '19:35:36', 'schedule'),
(748, 'Schedule no.12 (01:00:00-01:00:00) is added to Schedules by admin Von Paulo Plaza(2)', '2022-11-12', '19:35:38', 'schedule'),
(749, 'Schedule no.13 (01:00:00-01:00:00) is added to Schedules by admin Von Paulo Plaza(2)', '2022-11-12', '19:35:53', 'schedule'),
(750, 'Schedule no.12 is deleted to Schedules by admin Von Paulo Plaza(2)', '2022-11-12', '19:35:56', 'schedule'),
(751, 'Schedule no.13 is deleted to Schedules by admin Von Paulo Plaza(2)', '2022-11-12', '19:35:58', 'schedule'),
(752, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:39:39', 'employeeEdit'),
(753, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:41:28', 'employeeEdit'),
(754, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-12', '19:43:18', ''),
(755, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:43:30', 'employeeEdit'),
(756, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-12', '19:45:40', ''),
(757, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:45:50', 'employeeEdit'),
(758, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:46:00', 'employeeEdit'),
(759, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:46:06', 'employeeEdit'),
(760, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:51:33', 'employeeEdit'),
(761, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:53:16', 'employeeEdit'),
(762, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:54:01', 'employeeEdit'),
(763, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:54:19', 'employeeEdit'),
(764, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:54:26', 'employeeEdit'),
(765, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:56:47', 'employeeEdit'),
(766, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:57:21', 'employeeEdit'),
(767, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:59:43', 'employeeEdit'),
(768, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '19:59:54', 'employeeEdit'),
(769, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '20:00:31', 'employeeEdit'),
(770, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '20:00:43', 'employeeEdit'),
(771, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '20:01:06', 'employeeEdit'),
(772, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '20:01:56', 'employeeEdit'),
(773, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '20:02:13', 'employeeEdit'),
(774, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '20:02:43', 'employeeEdit'),
(775, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '20:02:55', 'employeeEdit'),
(776, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '20:03:19', 'employeeEdit'),
(777, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '20:03:24', 'employeeEdit'),
(778, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '20:05:30', 'employeeEdit'),
(779, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '20:05:51', 'employeeEdit'),
(780, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '20:06:13', 'employeeEdit'),
(781, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-12', '20:06:30', 'employeeEdit'),
(782, '234(73) is added to Positions  by admin Von Paulo Plaza(2)', '2022-11-12', '20:06:42', 'position'),
(783, '234(73) is deleted to Positions  by admin Von Paulo Plaza(2)', '2022-11-12', '20:06:45', 'position'),
(784, 'Darius G Garland(57) advanced &#8369;300 by admin Von Paulo Plaza(2)', '2022-11-12', '22:20:38', 'cashAdvance'),
(785, 'Darius G Garland(57) advanced &#8369;300 by admin Von Paulo Plaza(2)', '2022-11-12', '22:20:44', 'cashAdvance'),
(786, 'John Benedict haha Correa(5) advanced &#8369;300 by admin Von Paulo Plaza(2)', '2022-11-12', '22:21:11', 'cashAdvance'),
(787, 'Darius G Garland(57) advanced &#8369;300 by admin Von Paulo Plaza(2)', '2022-11-12', '22:34:47', 'cashAdvance'),
(788, 'Darius G Garland(57) advanced &#8369;300 by admin Von Paulo Plaza(2)', '2022-11-12', '22:34:53', 'cashAdvance'),
(789, 'Darius G Garland(57) advanced &#8369;300 by admin Von Paulo Plaza(2)', '2022-11-12', '22:45:30', 'cashAdvance'),
(790, 'Darius G Garland(57) advanced &#8369;300 by admin Von Paulo Plaza(2)', '2022-11-12', '22:47:30', 'cashAdvance'),
(791, 'Darius G Garland(57) advanced &#8369;300 by admin Von Paulo Plaza(2)', '2022-11-12', '22:47:42', 'cashAdvance'),
(792, 'Darius G Garland(57) advanced &#8369;300 by admin Von Paulo Plaza(2)', '2022-11-12', '22:49:03', 'cashAdvance'),
(793, 'Darius G Garland(57) advanced &#8369;300 by admin Von Paulo Plaza(2)', '2022-11-12', '22:49:57', 'cashAdvance'),
(794, 'John Benedict haha Correa(5) advanced &#8369;500 by admin Von Paulo Plaza(2)', '2022-11-12', '22:50:08', 'cashAdvance'),
(795, 'Kervin Robby Paraiso Pagtalunan(1) advanced &#8369;200 by admin Von Paulo Plaza(2)', '2022-11-12', '22:55:20', 'cashAdvance'),
(796, 'Kervin Robby Paraiso Pagtalunan(1) advanced &#8369;200 by admin Von Paulo Plaza(2)', '2022-11-12', '22:55:29', 'cashAdvance'),
(797, 'Kervin Robby Paraiso Pagtalunan(1) advanced &#8369;200 by admin Von Paulo Plaza(2)', '2022-11-12', '22:56:03', 'cashAdvance'),
(798, 'Kervin Robby Paraiso Pagtalunan(1) cash advances balance is edited by admin Von Paulo Plaza(2)', '2022-11-12', '22:56:16', 'cashAdvance'),
(799, 'Kervin Robby Paraiso Pagtalunan(1) cash advances balance is edited by admin Von Paulo Plaza(2)', '2022-11-12', '22:56:24', 'cashAdvance'),
(800, 'Ryan Amper Kaindoy(31) advanced &#8369;500 by admin Von Paulo Plaza(2)', '2022-11-12', '22:57:11', 'cashAdvance'),
(801, 'Ryan Amper Kaindoy(31) cash advances balance is edited by admin Von Paulo Plaza(2)', '2022-11-12', '22:57:25', 'cashAdvance'),
(802, 'Ryan Sedrick Santiago Nolasco(3) advanced &#8369;300 by admin Von Paulo Plaza(2)', '2022-11-12', '23:02:17', 'cashAdvance'),
(803, 'Karlo Paraiso Pagtalunan(45) advanced &#8369;2000 by admin Von Paulo Plaza(2)', '2022-11-12', '23:02:49', 'cashAdvance'),
(804, 'Karlo Paraiso Pagtalunan(45) cash advances balance is edited by admin Von Paulo Plaza(2)', '2022-11-12', '23:03:54', 'cashAdvance'),
(805, 'Kyed Paraiso Pagtalunan(46) advanced &#8369;2000 by admin Von Paulo Plaza(2)', '2022-11-12', '23:04:14', 'cashAdvance'),
(806, 'Raniah Roselle Pagtalunan Dela Cruz(41) advanced &#8369;500 by admin Von Paulo Plaza(2)', '2022-11-12', '23:04:27', 'cashAdvance'),
(807, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-13', '08:20:26', ''),
(808, 'Darius G Garland(57) advanced &#8369;100 by admin Von Paulo Plaza(2)', '2022-11-13', '08:21:33', 'cashAdvance'),
(809, 'Darius G Garland(57) cash advances balance is edited by admin Von Paulo Plaza(2)', '2022-11-13', '08:21:50', 'cashAdvance'),
(810, 'Darius G Garland(57) cash advances balance is edited by admin Von Paulo Plaza(2)', '2022-11-13', '08:22:04', 'cashAdvance'),
(811, 'Paid Leave for November 13 2022 is added to Francis Teodoro(62)  by admin Von Paulo Plaza(2)', '2022-11-13', '08:28:44', 'paidLeave'),
(812, 'Paid Leave for November 09 2022 is added to Kervin Robby Pagtalunan(1)  by admin Von Paulo Plaza(2)', '2022-11-13', '08:29:59', 'paidLeave'),
(813, '2 hour/s Overtime is added to Darius G Garland(57) for the November 13, 2022 by admin Von Paulo Plaza(2)', '2022-11-13', '10:34:15', 'overtime'),
(814, 'hha is added to holidays for the date 2022-11-14 by admin Von Paulo Plaza(2)', '2022-11-13', '10:35:08', 'holiday'),
(815, 'Employee No.57 Darius G Garland is edited by Admin Von Paulo Plaza(2).', '2022-11-13', '10:36:48', 'employeeEdit'),
(816, 'Deduction of Darius G Garland(57) is edited by Admin Von Paulo Plaza(2).', '2022-11-13', '10:37:45', 'deduction'),
(817, 'Darius Garland(57) schedule is change to schedule no.2 by admin Von Paulo Plaza(2)', '2022-11-13', '10:38:11', 'schedule'),
(818, 'Darius Garland(57) schedule is change to schedule no.1 by admin Von Paulo Plaza(2)', '2022-11-13', '10:38:20', 'schedule'),
(819, 'Darius G Garland(57) Overtime for November 13, 2022 is edited by admin Von Paulo Plaza(2)', '2022-11-13', '10:42:10', 'overtime'),
(820, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-15', '13:06:03', ''),
(821, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-15', '13:07:01', 'employeeEdit'),
(822, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-15', '13:07:36', 'employeeEdit'),
(823, 'Employee No.3 Ryan Sedrick Santiago Nolasco is edited by Admin Von Paulo Plaza(2).', '2022-11-15', '13:07:47', 'employeeEdit'),
(824, 'Juan  Miguel Dela Cruz(64) has been added to Employee List by admin Von Paulo Plaza(2)', '2022-11-15', '06:18:49', 'employeeEdit'),
(825, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-15', '13:25:02', 'attendance'),
(826, 'Juan  Dela Cruz(64) schedule is change to schedule no.2 by admin Von Paulo Plaza(2)', '2022-11-15', '13:26:39', 'schedule'),
(827, 'Juan  Dela Cruz(64) schedule is change to schedule no.1 by admin Von Paulo Plaza(2)', '2022-11-15', '13:26:44', 'schedule'),
(828, 'Deduction of Juan  Miguel Dela Cruz(64) is edited by Admin Von Paulo Plaza(2).', '2022-11-15', '13:35:01', 'deduction'),
(829, 'admin Von Paulo Plaza(2) has logged out', '2022-11-15', '14:23:10', ''),
(830, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-15', '14:25:01', ''),
(831, ' is deleted to holidays for the date 2022-11-14 by admin Von Paulo Plaza(2)', '2022-11-15', '14:26:26', 'holiday'),
(832, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-15', '14:28:00', 'employeeEdit'),
(833, 'admin Von Paulo Plaza(2) has logged out', '2022-11-15', '15:11:03', ''),
(834, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-15', '15:11:14', ''),
(835, 'Attendance was uploaded with 14 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-15', '15:12:43', 'attendance'),
(836, 'admin Von Paulo Plaza(2) has logged out', '2022-11-15', '16:00:29', ''),
(837, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-17', '07:56:59', ''),
(838, 'Attendance was uploaded with 15 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-17', '10:21:59', 'attendance'),
(839, 'Payroll period for the 1st period of December of 2022 is added by Admin Von Paulo Plaza(2).', '2022-11-17', '10:22:31', 'payroll'),
(840, 'Attendance was uploaded with 30 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-17', '10:32:12', 'attendance'),
(841, 'Position no.1 Admin is edited by admin Von Paulo Plaza(2)', '2022-11-17', '11:41:06', 'position'),
(842, 'Position no.1 Admin is edited by admin Von Paulo Plaza(2)', '2022-11-17', '12:16:21', 'position'),
(843, 'Payroll period for the 2nd period of December of 2022 is added by Admin Von Paulo Plaza(2).', '2022-11-17', '12:42:41', 'payroll'),
(844, 'Position no.1 Admin is edited by admin Von Paulo Plaza(2)', '2022-11-17', '14:44:43', 'position'),
(845, 'Employee No.1 Kervin Robby Paraiso Pagtalunan is edited by Admin Von Paulo Plaza(2).', '2022-11-17', '19:14:52', 'employeeEdit'),
(846, 'Employee No.64 Juan  Miguel Dela Cruz is edited by Admin Von Paulo Plaza(2).', '2022-11-17', '19:15:10', 'employeeEdit'),
(847, 'Employee No.2 Von Paulo Santiago Plaza is edited by Admin Von Paulo Plaza(2).', '2022-11-17', '19:19:54', 'employeeEdit'),
(848, 'Paid Leave for December 03 2022 is added to Von Paulo Plaza(2)  by admin Von Paulo Plaza(2)', '2022-11-17', '19:22:12', 'paidLeave'),
(849, 'Paid Leave for November 17 2022 is added to Von Paulo Plaza(2)  by admin Von Paulo Plaza(2)', '2022-11-17', '19:31:16', 'paidLeave'),
(850, 'Paid Leave for November 17 2022 is deleted to Von Paulo Santiago Plaza(2)  by admin Von Paulo Plaza(2)', '2022-11-17', '19:31:40', 'paidLeave'),
(851, 'Paid Leave for December 17 2022 is added to Von Paulo Plaza(2)  by admin Von Paulo Plaza(2)', '2022-11-17', '19:31:53', 'paidLeave'),
(852, 'pasko is added to holidays for the date 2022-12-25 by admin Von Paulo Plaza(2)', '2022-11-17', '19:32:46', 'holiday'),
(853, 'Position no.1 Admin is edited by admin Von Paulo Plaza(2)', '2022-11-17', '19:32:57', 'position'),
(854, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-18', '07:20:55', ''),
(855, 'Payroll period for the 1st period of January of 2022 is added by Admin Von Paulo Plaza(2).', '2022-11-18', '08:14:35', 'payroll'),
(856, '123 is added to holidays for the date 2022-10-07 by admin Von Paulo Plaza(2)', '2022-11-18', '09:59:43', 'holiday'),
(857, 'asd is added to holidays for the date 2022-12-02 by admin Von Paulo Plaza(2)', '2022-11-18', '10:00:02', 'holiday'),
(858, 'Payroll for the 2nd period of October of 2022 was released by Admin Von Paulo Plaza(2).', '2022-11-18', '10:52:38', 'payroll'),
(859, 'Payroll for the 2nd period of October of 2022 was released by Admin Von Paulo Plaza(2).', '2022-11-18', '10:55:59', 'payroll'),
(860, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-19', '07:41:49', ''),
(861, 'Attendance was uploaded with 16 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-19', '08:56:43', 'attendance'),
(862, 'Attendance was uploaded with 1 attendance uploaded by Admin Von Paulo Plaza(2).', '2022-11-19', '08:57:25', 'attendance'),
(863, 'Payroll for the 2nd period of October of 2022 was released by Admin Von Paulo Plaza(2).', '2022-11-19', '17:02:51', 'payroll'),
(864, 'Payroll for the 2nd period of October of 2022 was released by Admin Von Paulo Plaza(2).', '2022-11-19', '17:07:28', 'payroll'),
(865, 'Payroll period for the 2nd period of January of 2022 is added by Admin Von Paulo Plaza(2).', '2022-11-19', '18:36:53', 'payroll'),
(866, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-20', '08:50:00', ''),
(867, 'Mid Year Pay for the year of2022 is released by Admin Von Paulo Plaza(2).', '2022-11-20', '13:26:27', 'payroll'),
(868, '13th month pay for the the year of 2023 is added by Admin Von Paulo Plaza(2).', '2022-11-20', '13:29:27', 'payroll'),
(869, 'Mid Year Pay for the year of 2022 is released by Admin Von Paulo Plaza(2).', '2022-11-20', '13:34:22', 'payroll'),
(870, 'Mid Year Pay for the year of 2022 is released by Admin Von Paulo Plaza(2).', '2022-11-20', '13:46:01', 'payroll'),
(871, '13th month pay for the year of 2021 is released by Admin Von Paulo Plaza(2).', '2022-11-20', '14:23:02', 'payroll'),
(872, 'Kervin Robby Paraiso Pagtalunan(1) advanced &#8369;1000 by admin Von Paulo Plaza(2)', '2022-11-20', '23:40:14', 'cashAdvance'),
(873, 'Attendance of Kervin Robby Paraiso Pagtalunan of 2022-11-04 is added by Admin Von Paulo Plaza(2).', '2022-11-21', '01:12:22', 'attendance'),
(874, 'Attendance of Kervin Robby Paraiso Pagtalunan of 2022-11-04 is added by Admin Von Paulo Plaza(2).', '2022-11-21', '01:13:28', 'attendance'),
(875, 'Attendance of Kervin Robby Paraiso Pagtalunan(1) of 2022-11-04 is edited by Admin Von Paulo Plaza(2).', '2022-11-21', '01:13:36', 'attendance'),
(876, 'Attendance of Von Paulo Santiago Plaza of 2022-11-04 is added by Admin Von Paulo Plaza(2).', '2022-11-21', '01:14:06', 'attendance'),
(877, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-22', '20:41:05', ''),
(878, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-23', '09:44:38', ''),
(879, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-24', '08:40:34', ''),
(880, 'Attendance of Von Paulo Santiago Plaza of 2022-11-24 is added by Admin Von Paulo Plaza(2).', '2022-11-24', '08:48:27', 'attendance'),
(881, 'Attendance of Von Paulo Santiago Plaza(2) of 2022-11-24 is edited by Admin Von Paulo Plaza(2).', '2022-11-24', '08:52:13', 'attendance'),
(882, 'Attendance of Von Paulo Santiago Plaza(2) of 2022-11-24 is edited by Admin Von Paulo Plaza(2).', '2022-11-24', '08:52:27', 'attendance'),
(883, 'Attendance of Von Paulo Santiago Plaza(2) of 2022-11-24 is edited by Admin Von Paulo Plaza(2).', '2022-11-24', '08:52:42', 'attendance'),
(884, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-24', '10:27:05', ''),
(885, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-26', '08:57:49', ''),
(886, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-26', '08:57:49', ''),
(887, 'Kervin Robby Pagtalunan(1) schedule is change to schedule no.2 by admin Von Paulo Plaza(2)', '2022-11-26', '10:09:05', 'schedule'),
(888, 'Kervin Robby Pagtalunan(1) schedule is change to schedule no.1 by admin Von Paulo Plaza(2)', '2022-11-26', '10:09:10', 'schedule'),
(889, '123(Compensation) is added with Kervin Robby Paraiso Pagtalunan by Admin Von Paulo Plaza(2).', '2022-11-26', '03:26:46', 'comp_deduc'),
(890, 'asd(Deductions) is added with Kervin Robby Paraiso Pagtalunan by Admin Von Paulo Plaza(2).', '2022-11-26', '03:46:08', 'comp_deduc'),
(891, '() is to Kervin Robby Paraiso Pagtalunan by Admin Von Paulo Plaza(2).', '2022-11-26', '03:53:29', 'comp_deduc'),
(892, 'December Incentive(Deduction) is to Kervin Robby Paraiso Pagtalunan by Admin Von Paulo Plaza(2).', '2022-11-26', '03:55:27', 'comp_deduc'),
(893, 'December Incentive(Compensation) is to Kervin Robby Paraiso Pagtalunan by Admin Von Paulo Plaza(2).', '2022-11-26', '03:55:41', 'comp_deduc'),
(894, 'December Incentive(Compensation) is to Kervin Robby Paraiso Pagtalunan by Admin Von Paulo Plaza(2).', '2022-11-26', '03:56:10', 'comp_deduc');
INSERT INTO `activity_logs` (`id`, `activity`, `date`, `time`, `type`) VALUES
(895, 'December Incentive(Compensation) is to Kervin Robby Paraiso Pagtalunan by Admin Von Paulo Plaza(2).', '2022-11-26', '03:56:27', 'comp_deduc'),
(896, 'December Incentive(Compensation) is to Kervin Robby Paraiso Pagtalunan by Admin Von Paulo Plaza(2).', '2022-11-26', '03:56:33', 'comp_deduc'),
(897, 'November Incentive(Compensation) is added with Von Paulo Santiago Plaza by Admin Von Paulo Plaza(2).', '2022-11-26', '03:57:19', 'comp_deduc'),
(898, 'November Incentive(Compensation) is to Von Paulo Santiago Plaza by Admin Von Paulo Plaza(2).', '2022-11-26', '03:58:21', 'comp_deduc'),
(899, 'Password is changed by admin Von Paulo Plaza(2)', '2022-11-26', '15:13:24', 'accountSettings'),
(900, 'admin Von Paulo Plaza(2) has logged out', '2022-11-26', '15:13:28', ''),
(901, 'Admin (Von Paulo Plaza, 2) has logged in', '2022-11-26', '15:13:52', ''),
(902, 'Karla Kamille Laderas Umali(65) has been added to Employee List by admin Von Paulo Plaza(2)', '2022-11-26', '08:40:29', 'employeeEdit'),
(903, 'Employee No.65 Karla Kamille Laderas Umali is edited by Admin Von Paulo Plaza(2).', '2022-11-26', '15:46:03', 'employeeEdit'),
(904, 'Employee No.65 Karla Kamille Laderas Umali is edited by Admin Von Paulo Plaza(2).', '2022-11-26', '15:48:19', 'employeeEdit'),
(905, 'Employee No.65 Karla Kamille Laderas Umali is edited by Admin Von Paulo Plaza(2).', '2022-11-26', '17:51:11', 'employeeEdit'),
(906, 'Employee No.65 Karla Kamille Laderas Umali is edited by Admin Von Paulo Plaza(2).', '2022-11-26', '17:55:53', 'employeeEdit'),
(907, 'maternity leave(Compensation) is added with Karla Kamille Laderas Umali by Admin Von Paulo Plaza(2).', '2022-11-26', '12:18:58', 'comp_deduc'),
(908, 'Payroll for the 1st period of November of 2022 was released by Admin Von Paulo Plaza(2).', '2022-11-26', '19:25:19', 'payroll');

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
(195, '64', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-01'),
(196, '64', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-02'),
(197, '64', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-03'),
(198, '64', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-04'),
(199, '64', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-05'),
(200, '64', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-06'),
(201, '64', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-07'),
(202, '64', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-08'),
(203, '64', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-09'),
(204, '64', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-10'),
(205, '64', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-11'),
(206, '64', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-12'),
(207, '64', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-13'),
(208, '64', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-14'),
(209, '64', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-15'),
(210, '1', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-01'),
(211, '1', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-02'),
(212, '1', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-03'),
(213, '1', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-04'),
(214, '1', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-05'),
(215, '1', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-06'),
(216, '1', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-07'),
(217, '1', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-08'),
(218, '1', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-09'),
(219, '1', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-10'),
(220, '1', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-11'),
(221, '1', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-12'),
(222, '1', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-13'),
(223, '1', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-14'),
(224, '1', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-12-15'),
(225, '1', '08:00:00', '17:00:00', '09:00:00', '7.00', 1, '2022-11-01'),
(226, '2', '08:00:00', '17:00:00', '09:00:00', '7.00', 1, '2022-11-01'),
(227, '3', '08:00:00', '17:00:00', '09:00:00', '7.00', 1, '2022-11-01'),
(228, '4', '08:00:00', '17:00:00', '09:00:00', '7.00', 1, '2022-11-01'),
(229, '5', '17:00:00', '01:00:00', '08:00:00', '6.00', 0, '2022-11-01'),
(230, '1', '08:00:00', '17:00:00', '09:00:00', '7.00', 1, '2022-11-02'),
(231, '2', '08:00:00', '17:00:00', '09:00:00', '7.00', 1, '2022-11-02'),
(232, '3', '08:00:00', '17:00:00', '09:00:00', '7.00', 1, '2022-11-02'),
(233, '4', '08:00:00', '17:00:00', '09:00:00', '7.00', 1, '2022-11-02'),
(234, '5', '17:00:00', '01:00:00', '08:00:00', '6.00', 0, '2022-11-02'),
(235, '32', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-11-05'),
(236, '32', '07:30:00', '16:30:00', '09:30:00', '6.00', 1, '2022-11-06'),
(237, '41', '07:00:00', '15:00:00', '10:00:00', '6.00', 0, '2022-11-05'),
(238, '5', '17:00:00', '02:20:00', '10:00:00', '7.00', 0, '2022-11-05'),
(239, '1', '07:02:00', '17:00:00', '10:00:00', '8.00', 1, '2022-11-05'),
(240, '2', '06:57:00', '17:00:00', '10:00:00', '8.00', 0, '2022-11-05'),
(241, '1', '07:00:00', '17:00:00', '10:00:00', '8.00', 0, '2022-01-01'),
(242, '1', '07:14:00', '17:00:00', '09:46:00', '8.00', 1, '2022-11-04'),
(243, '2', '07:13:00', '17:13:00', '10:00:00', '8.00', 1, '2022-11-04'),
(244, '2', '07:04:00', '18:02:00', '10:58:00', '8.00', 1, '2022-11-24');

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
(53, 1, '1000.00', '2022-11-02', 0),
(54, 1, '1100.00', '0000-00-00', 1),
(55, 1, '100.00', '0000-00-00', 1),
(56, 1, '200.00', '0000-00-00', 1),
(57, 2, '100.00', '0000-00-00', 1),
(58, 1, '100.00', '2022-11-09', 1),
(59, 1, '100.00', '2022-11-09', 1),
(60, 1, '100.00', '2022-11-09', 0),
(61, 1, '500.00', '2022-11-12', 0),
(62, 57, '300.00', '2022-11-12', 0),
(63, 57, '300.00', '2022-11-12', 0),
(64, 5, '300.00', '2022-11-12', 0),
(65, 57, '300.00', '2022-11-12', 0),
(66, 57, '300.00', '2022-11-12', 0),
(67, 1, '200.00', '2022-11-12', 1),
(68, 1, '200.00', '2022-11-12', 0),
(69, 31, '200.00', '2022-11-12', 1),
(70, 3, '300.00', '2022-11-12', 0),
(71, 45, '2000.00', '2022-11-12', 0),
(72, 45, '1000.00', '2022-11-12', 1),
(73, 46, '2000.00', '2022-11-12', 0),
(74, 41, '500.00', '2022-11-12', 0),
(75, 57, '100.00', '2022-11-13', 0),
(76, 57, '700.00', '2022-11-13', 0),
(77, 57, '1400.00', '2022-11-13', 1),
(78, 1, '1000.00', '2022-11-18', 1),
(79, 2, '100.00', '2022-11-18', 1),
(80, 1, '1000.00', '2022-11-18', 1),
(81, 1, '200.00', '2022-11-19', 1),
(82, 1, '1000.00', '2022-11-20', 0),
(83, 1, '1000.00', '2022-11-26', 1);

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
(1, '1', '0.00'),
(2, '2', '0.00'),
(3, '3', '300.00'),
(4, '4', '0.00'),
(5, '30', '1000.00'),
(7, '57', '0.00'),
(11, '5', '500.00'),
(12, '31', '300.00'),
(13, '45', '1000.00'),
(14, '46', '2000.00'),
(15, '41', '500.00');

-- --------------------------------------------------------

--
-- Table structure for table `chart_bir`
--

CREATE TABLE `chart_bir` (
  `id` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `amount_deduction` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chart_bir`
--

INSERT INTO `chart_bir` (`id`, `from`, `to`, `percentage`, `amount_deduction`) VALUES
(1, 0, 10417, 0, '0.00'),
(2, 10417, 16666, 20, '0.00'),
(3, 16667, 33332, 25, '1250.00'),
(4, 33333, 83332, 30, '5416.67'),
(5, 83333, 333332, 32, '20416.67'),
(6, 333333, 0, 35, '100416.67');

-- --------------------------------------------------------

--
-- Table structure for table `chart_pagibig`
--

CREATE TABLE `chart_pagibig` (
  `id` int(11) NOT NULL,
  `from` decimal(10,2) NOT NULL,
  `to` decimal(10,2) NOT NULL,
  `EE` int(11) NOT NULL,
  `ER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chart_pagibig`
--

INSERT INTO `chart_pagibig` (`id`, `from`, `to`, `EE`, `ER`) VALUES
(0, '0.00', '1500.00', 1, 2),
(0, '1501.00', '0.00', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `chart_philhealth`
--

CREATE TABLE `chart_philhealth` (
  `id` int(11) NOT NULL,
  `floor` decimal(10,2) NOT NULL,
  `ceil` decimal(10,2) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chart_philhealth`
--

INSERT INTO `chart_philhealth` (`id`, `floor`, `ceil`, `rate`) VALUES
(1, '10000.00', '80000.00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `chart_sss`
--

CREATE TABLE `chart_sss` (
  `id` int(11) NOT NULL,
  `from` decimal(10,2) NOT NULL,
  `to` decimal(10,2) NOT NULL,
  `ER` decimal(10,2) NOT NULL,
  `EE` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chart_sss`
--

INSERT INTO `chart_sss` (`id`, `from`, `to`, `ER`, `EE`, `total`) VALUES
(11, '1000.00', '3249.99', '265.00', '135.00', '400.00'),
(12, '3250.00', '3749.99', '307.50', '157.50', '465.00'),
(13, '3750.00', '4249.99', '350.00', '180.00', '530.00'),
(14, '4250.00', '4749.99', '392.50', '202.50', '595.00'),
(15, '4750.00', '5249.99', '435.00', '225.00', '660.00'),
(16, '5250.00', '5749.99', '477.50', '247.50', '725.00'),
(17, '5750.00', '6249.99', '520.00', '270.00', '790.00'),
(18, '6250.00', '6749.99', '562.50', '292.50', '855.00'),
(19, '6750.00', '7249.99', '605.00', '315.00', '920.00'),
(20, '7250.00', '7749.99', '647.50', '337.50', '985.00'),
(21, '7750.00', '8249.99', '690.00', '360.00', '1050.00'),
(22, '8250.00', '8749.99', '732.50', '382.50', '1115.00'),
(23, '8750.00', '9249.99', '775.00', '405.00', '1180.00'),
(24, '9250.00', '9749.99', '817.50', '427.50', '1245.00'),
(25, '9750.00', '10249.99', '860.00', '450.00', '1310.00'),
(26, '10250.00', '10749.99', '902.50', '472.50', '1375.00'),
(27, '10750.00', '11249.99', '945.00', '495.00', '1440.00'),
(28, '11250.00', '11749.99', '987.50', '517.50', '1505.00'),
(29, '11750.00', '12249.99', '1030.00', '540.00', '1570.00'),
(30, '12250.00', '12749.99', '1072.50', '562.50', '1635.00'),
(31, '12750.00', '13249.99', '1115.00', '585.00', '1700.00'),
(32, '13250.00', '13749.99', '1157.50', '607.50', '1765.00'),
(33, '13750.00', '14249.99', '1200.00', '630.00', '1830.00'),
(34, '14250.00', '14749.99', '1242.50', '652.50', '1895.00'),
(35, '14750.00', '15249.99', '1305.00', '675.00', '1980.00'),
(36, '15250.00', '15749.99', '1347.50', '697.50', '2045.00'),
(37, '15750.00', '16249.99', '1390.00', '720.00', '2110.00'),
(38, '16250.00', '16749.99', '1432.50', '742.50', '2175.00'),
(39, '16750.00', '17249.99', '1475.00', '765.00', '2240.00'),
(40, '17250.00', '17749.99', '1517.50', '787.50', '2305.00'),
(41, '17750.00', '18249.99', '1560.00', '810.00', '2370.00'),
(42, '18250.00', '18749.99', '1602.50', '832.50', '2435.00'),
(43, '18750.00', '19249.99', '1645.00', '855.00', '2500.00'),
(44, '19250.00', '19749.99', '1687.50', '877.50', '2565.00'),
(45, '19750.00', '20249.99', '1730.00', '900.00', '2630.00'),
(46, '20250.00', '20749.99', '1772.50', '922.50', '2695.00'),
(47, '20750.00', '21249.99', '1815.00', '945.00', '2760.00'),
(48, '21250.00', '21749.99', '1857.50', '967.50', '2825.00'),
(49, '21750.00', '22249.99', '1900.00', '990.00', '2890.00'),
(50, '22250.00', '22749.99', '1942.50', '1012.50', '2955.00'),
(51, '22750.00', '23249.99', '1985.00', '1035.00', '3020.00'),
(52, '23250.00', '23749.99', '2027.50', '1057.50', '3085.00'),
(53, '23750.00', '24249.99', '2070.00', '1080.00', '3150.00'),
(54, '24250.00', '24749.99', '2112.50', '1102.50', '3215.00'),
(55, '24750.00', '0.00', '2155.00', '1125.00', '3280.00');

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
-- Table structure for table `compensation_deductions`
--

CREATE TABLE `compensation_deductions` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `type` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `monthly_total` decimal(10,2) NOT NULL,
  `year` int(11) NOT NULL,
  `january` int(11) NOT NULL,
  `february` int(11) NOT NULL,
  `march` int(11) NOT NULL,
  `april` int(11) NOT NULL,
  `may` int(11) NOT NULL,
  `june` int(11) NOT NULL,
  `july` int(11) NOT NULL,
  `august` int(11) NOT NULL,
  `september` int(11) NOT NULL,
  `october` int(11) NOT NULL,
  `november` int(11) NOT NULL,
  `december` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `compensation_deductions`
--

INSERT INTO `compensation_deductions` (`id`, `employee_id`, `description`, `type`, `total`, `monthly_total`, `year`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`, `status`) VALUES
(1, 1, 'December Incentive', 1, '1000.00', '1000.00', 2022, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(2, 1, 'Car Loan', 2, '2000.00', '1000.00', 2022, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1),
(3, 2, 'November Incentive', 1, '1000.00', '1000.00', 2022, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
(4, 65, 'maternity leave', 1, '20000.00', '20000.00', 2022, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `compensation_pay`
--

CREATE TABLE `compensation_pay` (
  `id` int(10) NOT NULL,
  `year` varchar(5) NOT NULL,
  `type` int(1) NOT NULL,
  `data` longtext DEFAULT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('32', '255.00', '255.00', '255.00'),
('41', '255.00', '255.00', '255.00'),
('44', '255.00', '255.00', '255.00'),
('45', '255.00', '255.00', '255.00'),
('46', '255.00', '255.00', '256.00'),
('57', '200.00', '255.00', '255.00'),
('62', '255.00', '255.00', '255.00'),
('64', '255.00', '255.00', '256.00'),
('65', '255.00', '255.00', '255.00');

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
  `Email` varchar(50) DEFAULT NULL,
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
(1, '2022-09-16', 'UGE678295014', 1, 'Kervin Robby', 'Paraiso', 'Pagtalunan', 3, '2001-12-13', 'Single', '1', '1', '09213208242', NULL, '1', '1', 'Balite, Malolos, Bulacan', 'Full-time', 1, 'Active', '../employees_files/profile_pics/Employee1.jpg', '../employees_files/IDs/EmployeeID1_1.jpg', '../employees_files/IDs/EmployeeID2_1.png'),
(2, '2022-09-17', 'VJE621409378', 2, 'Von Paulo', 'Santiago', 'Plaza', 1, '2022-08-31', 'Married', '2', '2', '0192384912', NULL, '2', '2', 'Guiguinto, Bulacan', 'Full-time', 1, 'Active', '../employees_files/profile_pics/Employee2.png', '../employees_files/IDs/EmployeeID1_2.png', '../EmployeeFiles/IDs/EmployeeID2_2.jpg'),
(3, '2022-09-17', 'XAP521960743', 3, 'Ryan Sedrick', 'Santiago', 'Nolasco', 1, '2022-09-15', 'Married', '12', '12', '0912345678', 'ryansedrick@gmail.com', '12', '12', 'Angat Dam', 'Part-time', 1, 'In-Active', '../employees_files/profile_pics/Employee3.png', '../employees_files/IDs/EmployeeID1_3.png', '../employees_files/IDs/EmployeeID2_3.png'),
(4, '2022-09-21', 'XTN196045378', 4, 'Jan Carl', 'S', 'Talavera', 9, '2022-09-15', 'Single', '123', '123', '0192384912', '123123@2e131', '123', '123', 'guguinto', 'Full-time', 1, 'In-Active', '../employees_files/profile_pics/Employee4.png', '../employees_files/IDs/EmployeeID1_4.png', '../employees_files/IDs/EmployeeID2_4.png'),
(5, '2022-09-29', 'XRF965871203', 6, 'John Benedict', 'haha', 'Correa', 1, '2022-09-15', 'Married', '129341', '1293793', '0919238912', 'ben@gmail.com', '1121927', '192378', 'Norzagaray, Bulacan', 'Full-time', 2, 'In-Active', '../employees_files/profile_pics/Employee5.png', '../employees_files/IDs/EmployeeID1_5.jpg', '../employees_files/IDs/EmployeeID2_5.png'),
(30, '2022-10-24', 'LYO730816249', 9, 'Wally', '69', 'Bayola', 2, '2022-10-06', 'Widowed', '30', '30', '999121431', 'gamingvic47@gmail.com', '30', '30', 'Rosemary Lane', 'Full-time', 2, 'In-Active', '../employees_files/profile_pics/Employee30.jpg', '../EmployeeFiles/IDs/EmployeeID1_30.jpg', '../EmployeeFiles/IDs/EmployeeID2_30.jpg'),
(31, '2022-11-03', 'YTB910682753', 8, 'Ryan', 'Amper', 'Kaindoy', 2, '2000-12-21', 'Single', '82937', '89234728', '092138237', 'ryankaindoy@gmail.com', '289323', '28934', 'Purok #4, Cofradia, City Of Malolos Bulacan', 'Full-time', 1, 'In-Active', '../employees_files/profile_pics/Employee31.png', '../EmployeeFiles/IDs/EmployeeID1_31.png', '../EmployeeFiles/IDs/EmployeeID2_31.png'),
(32, '2022-11-03', 'XDV581603729', 76, 'Stephen', 'S', 'Curry', 9, '2022-11-23', 'Single', '234234', '213324', '123123', 'stephcurry@gmail.com', '5463', '23124', 'US', 'Part-time', 1, 'In-Active', '../employees_files/profile_pics/Employee32.jpg', '../EmployeeFiles/IDs/EmployeeID1_32.jpg', '../EmployeeFiles/IDs/EmployeeID2_32.jpg'),
(41, '2022-11-05', 'OIF082179465', 238478, 'Raniah Roselle', 'Pagtalunan', 'Dela Cruz', 9, '2022-03-19', 'Single', 'asdasd', '129341', '123123', 'raniahroselle@gmail.com', '34525', '34134', 'Malolos', 'Part-time', 1, 'In-Active', '../employees_files/profile_pics/Employee41.png', '../EmployeeFiles/IDs/EmployeeID1_41.png', '../EmployeeFiles/IDs/EmployeeID2_41.png'),
(44, '2022-11-05', 'RDB180349265', 99, 'Kyla', 'Aranzanso', 'Delfin', 1, '2000-04-03', 'Single', '0987654321', '0987654321', '999121431', 'kyladelfin@gmail.com', '987654321', '0987654321', 'Rosemary Lane', 'Full-time', 1, 'In-Active', '../employees_files/profile_pics/Employee44.jpg', '../EmployeeFiles/IDs/EmployeeID1_44.jpg', '../EmployeeFiles/IDs/EmployeeID2_44.jpg'),
(45, '2022-11-07', 'CYL132507849', 72384, 'Karlo', 'Paraiso', 'Pagtalunan', 1, '2022-11-10', 'Single', '34513', '123425', '12314234', 'karlopagtalunan@gmail.com', '345313', '34523', 'Balite, Malolos, Bulacan', 'Full-time', 1, 'In-Active', '../employees_files/profile_pics/Employee45.png', '../EmployeeFiles/IDs/EmployeeID1_45.png', '../EmployeeFiles/IDs/EmployeeID2_45.png'),
(46, '2022-11-07', 'ZPG632048197', 345345, 'Kyed', 'Paraiso', 'Pagtalunan', 1, '2022-11-09', 'Single', '24522', '2323424', '123243', 'kyedpagtalunan@gmail.com', '2564564', '35234', 'Balite Malolos, Bulacan', 'Full-time', 2, 'In-Active', '../employees_files/profile_pics/Employee46.png', '../EmployeeFiles/IDs/EmployeeID1_46.png', '../EmployeeFiles/IDs/EmployeeID2_46.png'),
(57, '2022-11-12', 'ZRH934215687', 43242242, 'Darius', 'G', 'Garland', 2, '2022-11-11', 'Single', '123123423', '123123', '2342342', 'dariusgarland@gmail.com', '32435', '345345', 'USA', 'Full-time', 1, 'In-Active', '../employees_files/profile_pics/Employee57.jpg', '../employees_files/IDs/EmployeeID1_57.jpg', '../employees_files/IDs/EmployeeID2_57.jpg'),
(62, '2022-11-12', 'HLO827153409', 2147483647, 'Francis', 'Delos Reyes', 'Teodoro', 1, '2022-11-23', 'Married', '12312312312312', '123123123123', '123123', NULL, '123123123123', '123123123123', 'guguinto', 'Full-time', 1, 'In-Active', '../employees_files/profile_pics/Employee62.jpg', '../employees_files/IDs/EmployeeID1_62.png', '../employees_files/IDs/EmployeeID2_62.png'),
(64, '2022-11-15', 'WXT063427185', 123123, 'Juan ', 'Miguel', 'Dela Cruz', 1, '2022-11-18', 'Married', '123123123', '123123123', '09219861589', 'juandelacruz@domain.com', '123123123', '123123123', 'Lingunan, Valenzuela', 'Full-time', 1, 'Active', '../employees_files/profile_pics/Employee64.jpg', '../employees_files/IDs/EmployeeID1_64.jpg', '../employees_files/IDs/EmployeeID2_64.jpg'),
(65, '2022-11-26', 'ZIK641792538', 13341, 'Karla Kamille', 'Laderas', 'Umali', 9, '2002-02-03', 'Single', '3123-1233-1233', '1231-1223-1253', '09213208241', 'karlaumali@gmail.com', '1233-4234-1234', '1233-1233-1233', 'Brgy. Panducot, Calumpit Bulacan', 'Full-time', 1, 'Active', '../employees_files/profile_pics/Employee65.jpg', '../employees_files/IDs/EmployeeID1_65.png', '../employees_files/IDs/EmployeeID2_65.png');

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
-- Table structure for table `holiday_event`
--

CREATE TABLE `holiday_event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `holiday_event`
--

INSERT INTO `holiday_event` (`id`, `title`, `description`, `url`, `start`, `end`, `type`) VALUES
(20, 'undas', '', NULL, '2022-11-01', '2022-11-02', 1),
(42, 'pasko', '', NULL, '2022-12-25', '2022-12-25', 0),
(43, '123', '', NULL, '2022-10-07', '2022-10-07', 0),
(44, 'asd', '', NULL, '2022-12-02', '2022-12-02', 0);

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
(62, '1', '2022-11-04'),
(63, '62', '2022-11-13'),
(64, '1', '2022-11-09'),
(65, '2', '2022-12-03'),
(67, '2', '2022-12-17');

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
(61, '31', '2.00', '2022-11-03'),
(62, '57', '3.00', '2022-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_info`
--

CREATE TABLE `payroll_info` (
  `id` int(11) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `data` longtext DEFAULT NULL,
  `status` int(11) NOT NULL,
  `period` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll_info`
--

INSERT INTO `payroll_info` (`id`, `from`, `to`, `date_added`, `data`, `status`, `period`) VALUES
(1, '2022-10-16', '2022-10-31', '2022-10-19', 'W3sibmFtZSI6Ikp1YW4gIERlbGEgQ3J1eiIsImlkIjoiNjQiLCJlbXBsb3llZUtleSI6IldYVDA2MzQyNzE4NSIsImRhdGUiOnsiZnJvbSI6IjIwMjItMTAtMTYiLCJ0byI6IjIwMjItMTAtMzEifSwicm9sZSI6IkFkbWluIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjEyMzEyMzEyMyIsIlBhZ0liaWciOiIxMjMxMjMxMjMiLCJQaGlsSGVhbHRoIjoiMTIzMTIzMTIzIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MTAwLCJwYWdJYmlnIjoxMC43Mn0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjAsIlBhZ0liaWciOjUuMzYsIlBoaWxIZWFsdGgiOjQwMCwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOjB9LCJ3aXRoSG9sZGluZ1RheCI6MCwib3RoZXIiOjB9LCJncm9zcyI6eyJwcmVzZW50RGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImJhc2ljUGF5IjowLCJiYXNpY0hyIjowLCJvdmVydGltZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sImhvbGlkYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwibGVhdmUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJ0b3RhbFdvcmtIciI6IjAifSwidG90YWwiOnsiZ3Jvc3MiOjAsImRlZHVjdGlvbiI6NDA1LjM2LCJuZXQiOi00MDUuMzZ9fSx7Im5hbWUiOiJWb24gUGF1bG8gUGxhemEiLCJpZCI6IjIiLCJlbXBsb3llZUtleSI6IlZKRTYyMTQwOTM3OCIsImRhdGUiOnsiZnJvbSI6IjIwMjItMTAtMTYiLCJ0byI6IjIwMjItMTAtMzEifSwicm9sZSI6IkFkbWluIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjIiLCJQYWdJYmlnIjoiMiIsIlBoaWxIZWFsdGgiOiIyIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MTAwLCJwYWdJYmlnIjoxMDB9LCJvdGhlckRlZHVjdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJkZWR1Y3Rpb24iOnsiU1NTIjo0MjcuNSwiUGFnSWJpZyI6MTAwLCJQaGlsSGVhbHRoIjo0MDAsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjoiMC4wMCJ9LCJ3aXRoSG9sZGluZ1RheCI6MCwib3RoZXIiOjB9LCJncm9zcyI6eyJwcmVzZW50RGF5cyI6eyJxdHkiOjgsImFtb3VudCI6NDY5MH0sImJhc2ljUGF5Ijo0NjkwLCJiYXNpY0hyIjo3MCwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImxlYXZlIjp7InF0eSI6MCwiYW1vdW50IjowfSwidG90YWxXb3JrSHIiOiI3MCJ9LCJ0b3RhbCI6eyJncm9zcyI6NDY5MCwiZGVkdWN0aW9uIjo5MjcuNSwibmV0IjozNzYyLjV9fSx7Im5hbWUiOiJLZXJ2aW4gUm9iYnkgUGFndGFsdW5hbiIsImlkIjoiMSIsImVtcGxveWVlS2V5IjoiVUdFNjc4Mjk1MDE0IiwiZGF0ZSI6eyJmcm9tIjoiMjAyMi0xMC0xNiIsInRvIjoiMjAyMi0xMC0zMSJ9LCJyb2xlIjoiSmFuaXRvciIsInJhdGUiOnsibW9udGhseSI6MTM5MzYsImRhaWx5Ijo1MzYsImhvdXJseSI6IjY3LjAwIn0sIklEcyI6eyJTU1MiOiIxIiwiUGFnSWJpZyI6IjEiLCJQaGlsSGVhbHRoIjoiMSJ9LCJjb21wZW5zYXRpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiRVJTaGFyZSI6eyJTU1MiOjEwMCwicGFnSWJpZyI6MTAwfSwib3RoZXJEZWR1Y3Rpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiZGVkdWN0aW9uIjp7IlNTUyI6NDUwLCJQYWdJYmlnIjoxMDAsIlBoaWxIZWFsdGgiOjQwNy4zNiwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOjEwMDB9LCJ3aXRoSG9sZGluZ1RheCI6MCwib3RoZXIiOjB9LCJncm9zcyI6eyJwcmVzZW50RGF5cyI6eyJxdHkiOjgsImFtb3VudCI6NDIyMX0sImJhc2ljUGF5Ijo0MjIxLCJiYXNpY0hyIjo2Mywib3ZlcnRpbWUiOnsicXR5Ijo3LCJhbW91bnQiOjQ2OX0sImhvbGlkYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwibGVhdmUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJ0b3RhbFdvcmtIciI6IjcwIn0sInRvdGFsIjp7Imdyb3NzIjo0NjkwLCJkZWR1Y3Rpb24iOjE5NTcuMzYwMDAwMDAwMDAwMSwibmV0IjoyNzMyLjY0fX1d', 0, 2),
(2, '2022-10-01', '2022-10-15', '2022-10-19', 'W3sibmFtZSI6Ikp1YW4gIERlbGEgQ3J1eiIsImlkIjoiNjQiLCJlbXBsb3llZUtleSI6IldYVDA2MzQyNzE4NSIsImRhdGUiOnsiZnJvbSI6IjIwMjItMTAtMDEiLCJ0byI6IjIwMjItMTAtMTUifSwicm9sZSI6IkFkbWluIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjEyMzEyMzEyMyIsIlBhZ0liaWciOiIxMjMxMjMxMjMiLCJQaGlsSGVhbHRoIjoiMTIzMTIzMTIzIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjAsIlBhZ0liaWciOjAsIlBoaWxIZWFsdGgiOjAsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjowfSwid2l0aEhvbGRpbmdUYXgiOjAsIm90aGVyIjowfSwiZ3Jvc3MiOnsicHJlc2VudERheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJiYXNpY1BheSI6MCwiYmFzaWNIciI6MCwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjEsImFtb3VudCI6NTM2fSwibGVhdmUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJ0b3RhbFdvcmtIciI6IjAifSwidG90YWwiOnsiZ3Jvc3MiOjUzNiwiZGVkdWN0aW9uIjowLCJuZXQiOjUzNn19LHsibmFtZSI6IlZvbiBQYXVsbyBQbGF6YSIsImlkIjoiMiIsImVtcGxveWVlS2V5IjoiVkpFNjIxNDA5Mzc4IiwiZGF0ZSI6eyJmcm9tIjoiMjAyMi0xMC0wMSIsInRvIjoiMjAyMi0xMC0xNSJ9LCJyb2xlIjoiQWRtaW4iLCJyYXRlIjp7Im1vbnRobHkiOjEzOTM2LCJkYWlseSI6NTM2LCJob3VybHkiOiI2Ny4wMCJ9LCJJRHMiOnsiU1NTIjoiMiIsIlBhZ0liaWciOiIyIiwiUGhpbEhlYWx0aCI6IjIifSwiY29tcGVuc2F0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sIkVSU2hhcmUiOnsiU1NTIjowLCJwYWdJYmlnIjowfSwib3RoZXJEZWR1Y3Rpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiZGVkdWN0aW9uIjp7IlNTUyI6MCwiUGFnSWJpZyI6MCwiUGhpbEhlYWx0aCI6MCwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOiIwLjAwIn0sIndpdGhIb2xkaW5nVGF4IjowLCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6NywiYW1vdW50Ijo0MTU0fSwiYmFzaWNQYXkiOjQxNTQsImJhc2ljSHIiOjYyLCJvdmVydGltZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sImhvbGlkYXlzIjp7InF0eSI6MSwiYW1vdW50Ijo1MzZ9LCJsZWF2ZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sInRvdGFsV29ya0hyIjoiNjIifSwidG90YWwiOnsiZ3Jvc3MiOjQ2OTAsImRlZHVjdGlvbiI6MCwibmV0Ijo0NjkwfX0seyJuYW1lIjoiS2VydmluIFJvYmJ5IFBhZ3RhbHVuYW4iLCJpZCI6IjEiLCJlbXBsb3llZUtleSI6IlVHRTY3ODI5NTAxNCIsImRhdGUiOnsiZnJvbSI6IjIwMjItMTAtMDEiLCJ0byI6IjIwMjItMTAtMTUifSwicm9sZSI6Ikphbml0b3IiLCJyYXRlIjp7Im1vbnRobHkiOjEzOTM2LCJkYWlseSI6NTM2LCJob3VybHkiOiI2Ny4wMCJ9LCJJRHMiOnsiU1NTIjoiMSIsIlBhZ0liaWciOiIxIiwiUGhpbEhlYWx0aCI6IjEifSwiY29tcGVuc2F0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sIkVSU2hhcmUiOnsiU1NTIjowLCJwYWdJYmlnIjowfSwib3RoZXJEZWR1Y3Rpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiZGVkdWN0aW9uIjp7IlNTUyI6MCwiUGFnSWJpZyI6MCwiUGhpbEhlYWx0aCI6MCwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOjEwMDB9LCJ3aXRoSG9sZGluZ1RheCI6MCwib3RoZXIiOjB9LCJncm9zcyI6eyJwcmVzZW50RGF5cyI6eyJxdHkiOjgsImFtb3VudCI6NDU1Nn0sImJhc2ljUGF5Ijo0NTU2LCJiYXNpY0hyIjo2OCwib3ZlcnRpbWUiOnsicXR5Ijo2LCJhbW91bnQiOjQwMn0sImhvbGlkYXlzIjp7InF0eSI6MSwiYW1vdW50Ijo1MzZ9LCJsZWF2ZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sInRvdGFsV29ya0hyIjoiNzQifSwidG90YWwiOnsiZ3Jvc3MiOjU0OTQsImRlZHVjdGlvbiI6MTAwMCwibmV0Ijo0NDk0fX1d', 0, 1),
(4, '2022-09-16', '2022-09-30', '2022-10-19', 'W3sibmFtZSI6Ikp1YW4gIERlbGEgQ3J1eiIsImlkIjoiNjQiLCJlbXBsb3llZUtleSI6IldYVDA2MzQyNzE4NSIsImRhdGUiOnsiZnJvbSI6IjIwMjItMDktMTYiLCJ0byI6IjIwMjItMDktMzAifSwicm9sZSI6IkFkbWluIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjEyMzEyMzEyMyIsIlBhZ0liaWciOiIxMjMxMjMxMjMiLCJQaGlsSGVhbHRoIjoiMTIzMTIzMTIzIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjAsIlBhZ0liaWciOjAsIlBoaWxIZWFsdGgiOjQwMCwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOjB9LCJ3aXRoSG9sZGluZ1RheCI6MCwib3RoZXIiOjB9LCJncm9zcyI6eyJwcmVzZW50RGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImJhc2ljUGF5IjowLCJiYXNpY0hyIjowLCJvdmVydGltZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sImhvbGlkYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwibGVhdmUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJ0b3RhbFdvcmtIciI6IjAifSwidG90YWwiOnsiZ3Jvc3MiOjAsImRlZHVjdGlvbiI6NDAwLCJuZXQiOi00MDB9fSx7Im5hbWUiOiJWb24gUGF1bG8gUGxhemEiLCJpZCI6IjIiLCJlbXBsb3llZUtleSI6IlZKRTYyMTQwOTM3OCIsImRhdGUiOnsiZnJvbSI6IjIwMjItMDktMTYiLCJ0byI6IjIwMjItMDktMzAifSwicm9sZSI6IkFkbWluIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjIiLCJQYWdJYmlnIjoiMiIsIlBoaWxIZWFsdGgiOiIyIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjAsIlBhZ0liaWciOjAsIlBoaWxIZWFsdGgiOjQwMCwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOiIwLjAwIn0sIndpdGhIb2xkaW5nVGF4IjowLCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwiYmFzaWNQYXkiOjAsImJhc2ljSHIiOjAsIm92ZXJ0aW1lIjp7InF0eSI6MCwiYW1vdW50IjowfSwiaG9saWRheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJsZWF2ZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sInRvdGFsV29ya0hyIjoiMCJ9LCJ0b3RhbCI6eyJncm9zcyI6MCwiZGVkdWN0aW9uIjo0MDAsIm5ldCI6LTQwMH19LHsibmFtZSI6IktlcnZpbiBSb2JieSBQYWd0YWx1bmFuIiwiaWQiOiIxIiwiZW1wbG95ZWVLZXkiOiJVR0U2NzgyOTUwMTQiLCJkYXRlIjp7ImZyb20iOiIyMDIyLTA5LTE2IiwidG8iOiIyMDIyLTA5LTMwIn0sInJvbGUiOiJKYW5pdG9yIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjEiLCJQYWdJYmlnIjoiMSIsIlBoaWxIZWFsdGgiOiIxIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjAsIlBhZ0liaWciOjAsIlBoaWxIZWFsdGgiOjQwMCwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOjEwMDB9LCJ3aXRoSG9sZGluZ1RheCI6MCwib3RoZXIiOjB9LCJncm9zcyI6eyJwcmVzZW50RGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImJhc2ljUGF5IjowLCJiYXNpY0hyIjowLCJvdmVydGltZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sImhvbGlkYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwibGVhdmUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJ0b3RhbFdvcmtIciI6IjAifSwidG90YWwiOnsiZ3Jvc3MiOjAsImRlZHVjdGlvbiI6MTQwMCwibmV0IjotMTQwMH19XQ==', 0, 2),
(5, '2022-09-01', '2022-09-15', '2022-10-19', 'W3sibmFtZSI6Ikp1YW4gIERlbGEgQ3J1eiIsImlkIjoiNjQiLCJlbXBsb3llZUtleSI6IldYVDA2MzQyNzE4NSIsImRhdGUiOnsiZnJvbSI6IjIwMjItMDktMDEiLCJ0byI6IjIwMjItMDktMTUifSwicm9sZSI6IkFkbWluIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjEyMzEyMzEyMyIsIlBhZ0liaWciOiIxMjMxMjMxMjMiLCJQaGlsSGVhbHRoIjoiMTIzMTIzMTIzIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjAsIlBhZ0liaWciOjAsIlBoaWxIZWFsdGgiOjAsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjowfSwid2l0aEhvbGRpbmdUYXgiOjAsIm90aGVyIjowfSwiZ3Jvc3MiOnsicHJlc2VudERheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJiYXNpY1BheSI6MCwiYmFzaWNIciI6MCwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImxlYXZlIjp7InF0eSI6MCwiYW1vdW50IjowfSwidG90YWxXb3JrSHIiOiIwIn0sInRvdGFsIjp7Imdyb3NzIjowLCJkZWR1Y3Rpb24iOjAsIm5ldCI6MH19LHsibmFtZSI6IlZvbiBQYXVsbyBQbGF6YSIsImlkIjoiMiIsImVtcGxveWVlS2V5IjoiVkpFNjIxNDA5Mzc4IiwiZGF0ZSI6eyJmcm9tIjoiMjAyMi0wOS0wMSIsInRvIjoiMjAyMi0wOS0xNSJ9LCJyb2xlIjoiQWRtaW4iLCJyYXRlIjp7Im1vbnRobHkiOjEzOTM2LCJkYWlseSI6NTM2LCJob3VybHkiOiI2Ny4wMCJ9LCJJRHMiOnsiU1NTIjoiMiIsIlBhZ0liaWciOiIyIiwiUGhpbEhlYWx0aCI6IjIifSwiY29tcGVuc2F0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sIkVSU2hhcmUiOnsiU1NTIjowLCJwYWdJYmlnIjowfSwib3RoZXJEZWR1Y3Rpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiZGVkdWN0aW9uIjp7IlNTUyI6MCwiUGFnSWJpZyI6MCwiUGhpbEhlYWx0aCI6MCwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOiIwLjAwIn0sIndpdGhIb2xkaW5nVGF4IjowLCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwiYmFzaWNQYXkiOjAsImJhc2ljSHIiOjAsIm92ZXJ0aW1lIjp7InF0eSI6MCwiYW1vdW50IjowfSwiaG9saWRheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJsZWF2ZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sInRvdGFsV29ya0hyIjoiMCJ9LCJ0b3RhbCI6eyJncm9zcyI6MCwiZGVkdWN0aW9uIjowLCJuZXQiOjB9fSx7Im5hbWUiOiJLZXJ2aW4gUm9iYnkgUGFndGFsdW5hbiIsImlkIjoiMSIsImVtcGxveWVlS2V5IjoiVUdFNjc4Mjk1MDE0IiwiZGF0ZSI6eyJmcm9tIjoiMjAyMi0wOS0wMSIsInRvIjoiMjAyMi0wOS0xNSJ9LCJyb2xlIjoiSmFuaXRvciIsInJhdGUiOnsibW9udGhseSI6MTM5MzYsImRhaWx5Ijo1MzYsImhvdXJseSI6IjY3LjAwIn0sIklEcyI6eyJTU1MiOiIxIiwiUGFnSWJpZyI6IjEiLCJQaGlsSGVhbHRoIjoiMSJ9LCJjb21wZW5zYXRpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiRVJTaGFyZSI6eyJTU1MiOjAsInBhZ0liaWciOjB9LCJvdGhlckRlZHVjdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJkZWR1Y3Rpb24iOnsiU1NTIjowLCJQYWdJYmlnIjowLCJQaGlsSGVhbHRoIjowLCJDYXNoQWR2YW5jZSI6eyJxdHkiOjIsImFtb3VudCI6MTAwMH0sIndpdGhIb2xkaW5nVGF4IjowLCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwiYmFzaWNQYXkiOjAsImJhc2ljSHIiOjAsIm92ZXJ0aW1lIjp7InF0eSI6MCwiYW1vdW50IjowfSwiaG9saWRheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJsZWF2ZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sInRvdGFsV29ya0hyIjoiMCJ9LCJ0b3RhbCI6eyJncm9zcyI6MCwiZGVkdWN0aW9uIjoxMDAwLCJuZXQiOi0xMDAwfX1d', 0, 1),
(6, '2022-08-01', '2022-08-15', '2022-10-19', 'W3sibmFtZSI6Ikp1YW4gIERlbGEgQ3J1eiIsImlkIjoiNjQiLCJlbXBsb3llZUtleSI6IldYVDA2MzQyNzE4NSIsImRhdGUiOnsiZnJvbSI6IjIwMjItMDgtMDEiLCJ0byI6IjIwMjItMDgtMTUifSwicm9sZSI6IkFkbWluIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjEyMzEyMzEyMyIsIlBhZ0liaWciOiIxMjMxMjMxMjMiLCJQaGlsSGVhbHRoIjoiMTIzMTIzMTIzIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjAsIlBhZ0liaWciOjAsIlBoaWxIZWFsdGgiOjAsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjowfSwid2l0aEhvbGRpbmdUYXgiOjAsIm90aGVyIjowfSwiZ3Jvc3MiOnsicHJlc2VudERheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJiYXNpY1BheSI6MCwiYmFzaWNIciI6MCwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImxlYXZlIjp7InF0eSI6MCwiYW1vdW50IjowfSwidG90YWxXb3JrSHIiOiIwIn0sInRvdGFsIjp7Imdyb3NzIjowLCJkZWR1Y3Rpb24iOjAsIm5ldCI6MH19LHsibmFtZSI6IlZvbiBQYXVsbyBQbGF6YSIsImlkIjoiMiIsImVtcGxveWVlS2V5IjoiVkpFNjIxNDA5Mzc4IiwiZGF0ZSI6eyJmcm9tIjoiMjAyMi0wOC0wMSIsInRvIjoiMjAyMi0wOC0xNSJ9LCJyb2xlIjoiQWRtaW4iLCJyYXRlIjp7Im1vbnRobHkiOjEzOTM2LCJkYWlseSI6NTM2LCJob3VybHkiOiI2Ny4wMCJ9LCJJRHMiOnsiU1NTIjoiMiIsIlBhZ0liaWciOiIyIiwiUGhpbEhlYWx0aCI6IjIifSwiY29tcGVuc2F0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sIkVSU2hhcmUiOnsiU1NTIjowLCJwYWdJYmlnIjowfSwib3RoZXJEZWR1Y3Rpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiZGVkdWN0aW9uIjp7IlNTUyI6MCwiUGFnSWJpZyI6MCwiUGhpbEhlYWx0aCI6MCwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOiIwLjAwIn0sIndpdGhIb2xkaW5nVGF4IjowLCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwiYmFzaWNQYXkiOjAsImJhc2ljSHIiOjAsIm92ZXJ0aW1lIjp7InF0eSI6MCwiYW1vdW50IjowfSwiaG9saWRheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJsZWF2ZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sInRvdGFsV29ya0hyIjoiMCJ9LCJ0b3RhbCI6eyJncm9zcyI6MCwiZGVkdWN0aW9uIjowLCJuZXQiOjB9fSx7Im5hbWUiOiJLZXJ2aW4gUm9iYnkgUGFndGFsdW5hbiIsImlkIjoiMSIsImVtcGxveWVlS2V5IjoiVUdFNjc4Mjk1MDE0IiwiZGF0ZSI6eyJmcm9tIjoiMjAyMi0wOC0wMSIsInRvIjoiMjAyMi0wOC0xNSJ9LCJyb2xlIjoiSmFuaXRvciIsInJhdGUiOnsibW9udGhseSI6MTM5MzYsImRhaWx5Ijo1MzYsImhvdXJseSI6IjY3LjAwIn0sIklEcyI6eyJTU1MiOiIxIiwiUGFnSWJpZyI6IjEiLCJQaGlsSGVhbHRoIjoiMSJ9LCJjb21wZW5zYXRpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiRVJTaGFyZSI6eyJTU1MiOjAsInBhZ0liaWciOjB9LCJvdGhlckRlZHVjdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJkZWR1Y3Rpb24iOnsiU1NTIjowLCJQYWdJYmlnIjowLCJQaGlsSGVhbHRoIjowLCJDYXNoQWR2YW5jZSI6eyJxdHkiOjIsImFtb3VudCI6MTAwMH0sIndpdGhIb2xkaW5nVGF4IjowLCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwiYmFzaWNQYXkiOjAsImJhc2ljSHIiOjAsIm92ZXJ0aW1lIjp7InF0eSI6MCwiYW1vdW50IjowfSwiaG9saWRheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJsZWF2ZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sInRvdGFsV29ya0hyIjoiMCJ9LCJ0b3RhbCI6eyJncm9zcyI6MCwiZGVkdWN0aW9uIjoxMDAwLCJuZXQiOi0xMDAwfX1d', 0, 1),
(7, '2022-11-01', '2022-11-15', '2022-10-31', 'W3sibmFtZSI6IkthcmxhIEthbWlsbGUgVW1hbGkiLCJpZCI6IjY1IiwiZW1wbG95ZWVLZXkiOiJaSUs2NDE3OTI1MzgiLCJkYXRlIjp7ImZyb20iOiIyMDIyLTExLTAxIiwidG8iOiIyMDIyLTExLTE1In0sInJvbGUiOiJIUiIsInJhdGUiOnsibW9udGhseSI6MTM5MzYsImRhaWx5Ijo1MzYsImhvdXJseSI6IjY3LjAwIn0sIklEcyI6eyJTU1MiOiIzMTIzLTEyMzMtMTIzMyIsIlBhZ0liaWciOiIxMjMzLTEyMzMtMTIzMyIsIlBoaWxIZWFsdGgiOiIxMjMzLTQyMzQtMTIzNCJ9LCJjb21wZW5zYXRpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiRVJTaGFyZSI6eyJTU1MiOjAsInBhZ0liaWciOjB9LCJvdGhlckRlZHVjdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJkZWR1Y3Rpb24iOnsiU1NTIjowLCJQYWdJYmlnIjowLCJQaGlsSGVhbHRoIjowLCJDYXNoQWR2YW5jZSI6eyJxdHkiOjIsImFtb3VudCI6MH0sIndpdGhIb2xkaW5nVGF4IjowLCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwiYmFzaWNQYXkiOjAsImJhc2ljSHIiOjAsIm92ZXJ0aW1lIjp7InF0eSI6MCwiYW1vdW50IjowfSwiaG9saWRheXMiOnsicXR5IjoxLCJhbW91bnQiOjUzNn0sImxlYXZlIjp7InF0eSI6MCwiYW1vdW50IjowfSwidG90YWxXb3JrSHIiOiIwIn0sInRvdGFsIjp7Imdyb3NzIjo1MzYsImRlZHVjdGlvbiI6MCwibmV0Ijo1MzZ9fSx7Im5hbWUiOiJKdWFuICBEZWxhIENydXoiLCJpZCI6IjY0IiwiZW1wbG95ZWVLZXkiOiJXWFQwNjM0MjcxODUiLCJkYXRlIjp7ImZyb20iOiIyMDIyLTExLTAxIiwidG8iOiIyMDIyLTExLTE1In0sInJvbGUiOiJBZG1pbiIsInJhdGUiOnsibW9udGhseSI6MTM5MzYsImRhaWx5Ijo1MzYsImhvdXJseSI6IjY3LjAwIn0sIklEcyI6eyJTU1MiOiIxMjMxMjMxMjMiLCJQYWdJYmlnIjoiMTIzMTIzMTIzIiwiUGhpbEhlYWx0aCI6IjEyMzEyMzEyMyJ9LCJjb21wZW5zYXRpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiRVJTaGFyZSI6eyJTU1MiOjAsInBhZ0liaWciOjB9LCJvdGhlckRlZHVjdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJkZWR1Y3Rpb24iOnsiU1NTIjowLCJQYWdJYmlnIjowLCJQaGlsSGVhbHRoIjowLCJDYXNoQWR2YW5jZSI6eyJxdHkiOjIsImFtb3VudCI6MH0sIndpdGhIb2xkaW5nVGF4IjowLCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwiYmFzaWNQYXkiOjAsImJhc2ljSHIiOjAsIm92ZXJ0aW1lIjp7InF0eSI6MCwiYW1vdW50IjowfSwiaG9saWRheXMiOnsicXR5IjoxLCJhbW91bnQiOjUzNn0sImxlYXZlIjp7InF0eSI6MCwiYW1vdW50IjowfSwidG90YWxXb3JrSHIiOiIwIn0sInRvdGFsIjp7Imdyb3NzIjo1MzYsImRlZHVjdGlvbiI6MCwibmV0Ijo1MzZ9fSx7Im5hbWUiOiJWb24gUGF1bG8gUGxhemEiLCJpZCI6IjIiLCJlbXBsb3llZUtleSI6IlZKRTYyMTQwOTM3OCIsImRhdGUiOnsiZnJvbSI6IjIwMjItMTEtMDEiLCJ0byI6IjIwMjItMTEtMTUifSwicm9sZSI6IkFkbWluIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjIiLCJQYWdJYmlnIjoiMiIsIlBoaWxIZWFsdGgiOiIyIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjAsIlBhZ0liaWciOjAsIlBoaWxIZWFsdGgiOjAsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjoiMC4wMCJ9LCJ3aXRoSG9sZGluZ1RheCI6MCwib3RoZXIiOjB9LCJncm9zcyI6eyJwcmVzZW50RGF5cyI6eyJxdHkiOjQsImFtb3VudCI6MjAxMH0sImJhc2ljUGF5IjoyMDEwLCJiYXNpY0hyIjozMCwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjEsImFtb3VudCI6NTM2fSwibGVhdmUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJ0b3RhbFdvcmtIciI6IjMwIn0sInRvdGFsIjp7Imdyb3NzIjoyNTQ2LCJkZWR1Y3Rpb24iOjAsIm5ldCI6MjU0Nn19LHsibmFtZSI6IktlcnZpbiBSb2JieSBQYWd0YWx1bmFuIiwiaWQiOiIxIiwiZW1wbG95ZWVLZXkiOiJVR0U2NzgyOTUwMTQiLCJkYXRlIjp7ImZyb20iOiIyMDIyLTExLTAxIiwidG8iOiIyMDIyLTExLTE1In0sInJvbGUiOiJKYW5pdG9yIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjEiLCJQYWdJYmlnIjoiMSIsIlBoaWxIZWFsdGgiOiIxIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjAsIlBhZ0liaWciOjAsIlBoaWxIZWFsdGgiOjAsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjoxMDAwfSwid2l0aEhvbGRpbmdUYXgiOjAsIm90aGVyIjowfSwiZ3Jvc3MiOnsicHJlc2VudERheXMiOnsicXR5Ijo0LCJhbW91bnQiOjIwMTB9LCJiYXNpY1BheSI6MjAxMCwiYmFzaWNIciI6MzAsIm92ZXJ0aW1lIjp7InF0eSI6MiwiYW1vdW50IjoxMzR9LCJob2xpZGF5cyI6eyJxdHkiOjEsImFtb3VudCI6NTM2fSwibGVhdmUiOnsicXR5IjoyLCJhbW91bnQiOjEwNzJ9LCJ0b3RhbFdvcmtIciI6IjMyIn0sInRvdGFsIjp7Imdyb3NzIjozNzUyLCJkZWR1Y3Rpb24iOjEwMDAsIm5ldCI6Mjc1Mn19XQ==', 1, 1),
(8, '2021-10-15', '2021-10-31', '2022-11-05', 'W3sibmFtZSI6Ikp1YW4gIERlbGEgQ3J1eiIsImlkIjoiNjQiLCJlbXBsb3llZUtleSI6IldYVDA2MzQyNzE4NSIsImRhdGUiOnsiZnJvbSI6IjIwMjEtMTAtMTUiLCJ0byI6IjIwMjEtMTAtMzEifSwicm9sZSI6IkFkbWluIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjEyMzEyMzEyMyIsIlBhZ0liaWciOiIxMjMxMjMxMjMiLCJQaGlsSGVhbHRoIjoiMTIzMTIzMTIzIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjAsIlBhZ0liaWciOjAsIlBoaWxIZWFsdGgiOjQwMCwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOjB9LCJ3aXRoSG9sZGluZ1RheCI6MCwib3RoZXIiOjB9LCJncm9zcyI6eyJwcmVzZW50RGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImJhc2ljUGF5IjowLCJiYXNpY0hyIjowLCJvdmVydGltZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sImhvbGlkYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwibGVhdmUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJ0b3RhbFdvcmtIciI6IjAifSwidG90YWwiOnsiZ3Jvc3MiOjAsImRlZHVjdGlvbiI6NDAwLCJuZXQiOi00MDB9fSx7Im5hbWUiOiJWb24gUGF1bG8gUGxhemEiLCJpZCI6IjIiLCJlbXBsb3llZUtleSI6IlZKRTYyMTQwOTM3OCIsImRhdGUiOnsiZnJvbSI6IjIwMjEtMTAtMTUiLCJ0byI6IjIwMjEtMTAtMzEifSwicm9sZSI6IkFkbWluIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjIiLCJQYWdJYmlnIjoiMiIsIlBoaWxIZWFsdGgiOiIyIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjAsIlBhZ0liaWciOjAsIlBoaWxIZWFsdGgiOjQwMCwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOiIwLjAwIn0sIndpdGhIb2xkaW5nVGF4IjowLCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwiYmFzaWNQYXkiOjAsImJhc2ljSHIiOjAsIm92ZXJ0aW1lIjp7InF0eSI6MCwiYW1vdW50IjowfSwiaG9saWRheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJsZWF2ZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sInRvdGFsV29ya0hyIjoiMCJ9LCJ0b3RhbCI6eyJncm9zcyI6MCwiZGVkdWN0aW9uIjo0MDAsIm5ldCI6LTQwMH19LHsibmFtZSI6IktlcnZpbiBSb2JieSBQYWd0YWx1bmFuIiwiaWQiOiIxIiwiZW1wbG95ZWVLZXkiOiJVR0U2NzgyOTUwMTQiLCJkYXRlIjp7ImZyb20iOiIyMDIxLTEwLTE1IiwidG8iOiIyMDIxLTEwLTMxIn0sInJvbGUiOiJKYW5pdG9yIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjEiLCJQYWdJYmlnIjoiMSIsIlBoaWxIZWFsdGgiOiIxIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjAsIlBhZ0liaWciOjAsIlBoaWxIZWFsdGgiOjQwMCwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOjEwMDB9LCJ3aXRoSG9sZGluZ1RheCI6MCwib3RoZXIiOjB9LCJncm9zcyI6eyJwcmVzZW50RGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImJhc2ljUGF5IjowLCJiYXNpY0hyIjowLCJvdmVydGltZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sImhvbGlkYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwibGVhdmUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJ0b3RhbFdvcmtIciI6IjAifSwidG90YWwiOnsiZ3Jvc3MiOjAsImRlZHVjdGlvbiI6MTQwMCwibmV0IjotMTQwMH19XQ==', 0, 2),
(9, '2022-11-16', '2022-11-30', '2022-11-05', 'W3sibmFtZSI6IkthcmxhIEthbWlsbGUgTGFkZXJhcyBVbWFsaSIsImlkIjoiNjUiLCJlbXBsb3llZUtleSI6IlpJSzY0MTc5MjUzOCIsImRhdGUiOnsiZnJvbSI6IjIwMjItMTEtMTYiLCJ0byI6IjIwMjItMTEtMzAifSwicm9sZSI6IkhSIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjMxMjMtMTIzMy0xMjMzIiwiUGFnSWJpZyI6IjEyMzMtMTIzMy0xMjMzIiwiUGhpbEhlYWx0aCI6IjEyMzMtNDIzNC0xMjM0In0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MTAuNzJ9LCJvdGhlckRlZHVjdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJkZWR1Y3Rpb24iOnsiU1NTIjowLCJQYWdJYmlnIjo1LjM2LCJQaGlsSGVhbHRoIjo0MDAsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjowfSwid2l0aEhvbGRpbmdUYXgiOjAsIm90aGVyIjowfSwiZ3Jvc3MiOnsicHJlc2VudERheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJiYXNpY1BheSI6MCwiYmFzaWNIciI6MCwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImxlYXZlIjp7InF0eSI6MCwiYW1vdW50IjowfSwidG90YWxXb3JrSHIiOiIwIn0sInRvdGFsIjp7Imdyb3NzIjowLCJkZWR1Y3Rpb24iOjQwNS4zNiwibmV0IjotNDA1LjM2fX0seyJuYW1lIjoiSnVhbiAgTWlndWVsIERlbGEgQ3J1eiIsImlkIjoiNjQiLCJlbXBsb3llZUtleSI6IldYVDA2MzQyNzE4NSIsImRhdGUiOnsiZnJvbSI6IjIwMjItMTEtMTYiLCJ0byI6IjIwMjItMTEtMzAifSwicm9sZSI6IkFkbWluIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjEyMzEyMzEyMyIsIlBhZ0liaWciOiIxMjMxMjMxMjMiLCJQaGlsSGVhbHRoIjoiMTIzMTIzMTIzIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MTAuNzJ9LCJvdGhlckRlZHVjdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJkZWR1Y3Rpb24iOnsiU1NTIjowLCJQYWdJYmlnIjo1LjM2LCJQaGlsSGVhbHRoIjo0MDAsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjowfSwid2l0aEhvbGRpbmdUYXgiOjAsIm90aGVyIjowfSwiZ3Jvc3MiOnsicHJlc2VudERheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJiYXNpY1BheSI6MCwiYmFzaWNIciI6MCwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImxlYXZlIjp7InF0eSI6MCwiYW1vdW50IjowfSwidG90YWxXb3JrSHIiOiIwIn0sInRvdGFsIjp7Imdyb3NzIjowLCJkZWR1Y3Rpb24iOjQwNS4zNiwibmV0IjotNDA1LjM2fX0seyJuYW1lIjoiVm9uIFBhdWxvIFNhbnRpYWdvIFBsYXphIiwiaWQiOiIyIiwiZW1wbG95ZWVLZXkiOiJWSkU2MjE0MDkzNzgiLCJkYXRlIjp7ImZyb20iOiIyMDIyLTExLTE2IiwidG8iOiIyMDIyLTExLTMwIn0sInJvbGUiOiJBZG1pbiIsInJhdGUiOnsibW9udGhseSI6MTM5MzYsImRhaWx5Ijo1MzYsImhvdXJseSI6IjY3LjAwIn0sIklEcyI6eyJTU1MiOiIyIiwiUGFnSWJpZyI6IjIiLCJQaGlsSGVhbHRoIjoiMiJ9LCJjb21wZW5zYXRpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiRVJTaGFyZSI6eyJTU1MiOjI2NSwicGFnSWJpZyI6NjEuNjR9LCJvdGhlckRlZHVjdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJkZWR1Y3Rpb24iOnsiU1NTIjoxMzUsIlBhZ0liaWciOjYxLjY0LCJQaGlsSGVhbHRoIjo0MDAsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjoiMC4wMCJ9LCJ3aXRoSG9sZGluZ1RheCI6MCwib3RoZXIiOjB9LCJncm9zcyI6eyJwcmVzZW50RGF5cyI6eyJxdHkiOjEsImFtb3VudCI6NTM2fSwiYmFzaWNQYXkiOjUzNiwiYmFzaWNIciI6OCwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImxlYXZlIjp7InF0eSI6MCwiYW1vdW50IjowfSwidG90YWxXb3JrSHIiOiI4In0sInRvdGFsIjp7Imdyb3NzIjo1MzYsImRlZHVjdGlvbiI6NTk2LjY0LCJuZXQiOi02MC42Mzk5OTk5OTk5OTk5ODZ9fSx7Im5hbWUiOiJLZXJ2aW4gUm9iYnkgUGFyYWlzbyBQYWd0YWx1bmFuIiwiaWQiOiIxIiwiZW1wbG95ZWVLZXkiOiJVR0U2NzgyOTUwMTQiLCJkYXRlIjp7ImZyb20iOiIyMDIyLTExLTE2IiwidG8iOiIyMDIyLTExLTMwIn0sInJvbGUiOiJKYW5pdG9yIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjEiLCJQYWdJYmlnIjoiMSIsIlBoaWxIZWFsdGgiOiIxIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MzUwLCJwYWdJYmlnIjo3NS4wNH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjE4MCwiUGFnSWJpZyI6NzUuMDQsIlBoaWxIZWFsdGgiOjQwMCwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOiIwLjAwIn0sIndpdGhIb2xkaW5nVGF4IjowLCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwiYmFzaWNQYXkiOjAsImJhc2ljSHIiOjAsIm92ZXJ0aW1lIjp7InF0eSI6MCwiYW1vdW50IjowfSwiaG9saWRheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJsZWF2ZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sInRvdGFsV29ya0hyIjoiMCJ9LCJ0b3RhbCI6eyJncm9zcyI6MCwiZGVkdWN0aW9uIjo2NTUuMDQsIm5ldCI6LTY1NS4wNH19XQ==', 0, 2),
(12, '2022-12-01', '2022-12-15', '2022-11-17', 'W3sibmFtZSI6IkthcmxhIEthbWlsbGUgTGFkZXJhcyBVbWFsaSIsImlkIjoiNjUiLCJlbXBsb3llZUtleSI6IlpJSzY0MTc5MjUzOCIsImRhdGUiOnsiZnJvbSI6IjIwMjItMTItMDEiLCJ0byI6IjIwMjItMTItMTUifSwicm9sZSI6IkhSIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjMxMjMtMTIzMy0xMjMzIiwiUGFnSWJpZyI6IjEyMzMtMTIzMy0xMjMzIiwiUGhpbEhlYWx0aCI6IjEyMzMtNDIzNC0xMjM0In0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjAsIlBhZ0liaWciOjAsIlBoaWxIZWFsdGgiOjAsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjowfSwid2l0aEhvbGRpbmdUYXgiOjAsIm90aGVyIjowfSwiZ3Jvc3MiOnsicHJlc2VudERheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJiYXNpY1BheSI6MCwiYmFzaWNIciI6MCwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjEsImFtb3VudCI6NTM2fSwibGVhdmUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJ0b3RhbFdvcmtIciI6IjAifSwidG90YWwiOnsiZ3Jvc3MiOjUzNiwiZGVkdWN0aW9uIjowLCJuZXQiOjUzNn19LHsibmFtZSI6Ikp1YW4gIE1pZ3VlbCBEZWxhIENydXoiLCJpZCI6IjY0IiwiZW1wbG95ZWVLZXkiOiJXWFQwNjM0MjcxODUiLCJkYXRlIjp7ImZyb20iOiIyMDIyLTEyLTAxIiwidG8iOiIyMDIyLTEyLTE1In0sInJvbGUiOiJBZG1pbiIsInJhdGUiOnsibW9udGhseSI6MTM5MzYsImRhaWx5Ijo1MzYsImhvdXJseSI6IjY3LjAwIn0sIklEcyI6eyJTU1MiOiIxMjMxMjMxMjMiLCJQYWdJYmlnIjoiMTIzMTIzMTIzIiwiUGhpbEhlYWx0aCI6IjEyMzEyMzEyMyJ9LCJjb21wZW5zYXRpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiRVJTaGFyZSI6eyJTU1MiOjAsInBhZ0liaWciOjB9LCJvdGhlckRlZHVjdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJkZWR1Y3Rpb24iOnsiU1NTIjowLCJQYWdJYmlnIjowLCJQaGlsSGVhbHRoIjowLCJDYXNoQWR2YW5jZSI6eyJxdHkiOjIsImFtb3VudCI6MH0sIndpdGhIb2xkaW5nVGF4IjowLCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6MTUsImFtb3VudCI6ODA0MH0sImJhc2ljUGF5Ijo4MDQwLCJiYXNpY0hyIjoxMjAsIm92ZXJ0aW1lIjp7InF0eSI6MCwiYW1vdW50IjowfSwiaG9saWRheXMiOnsicXR5IjoxLCJhbW91bnQiOjUzNn0sImxlYXZlIjp7InF0eSI6MCwiYW1vdW50IjowfSwidG90YWxXb3JrSHIiOiIxMjAifSwidG90YWwiOnsiZ3Jvc3MiOjg1NzYsImRlZHVjdGlvbiI6MCwibmV0Ijo4NTc2fX0seyJuYW1lIjoiVm9uIFBhdWxvIFNhbnRpYWdvIFBsYXphIiwiaWQiOiIyIiwiZW1wbG95ZWVLZXkiOiJWSkU2MjE0MDkzNzgiLCJkYXRlIjp7ImZyb20iOiIyMDIyLTEyLTAxIiwidG8iOiIyMDIyLTEyLTE1In0sInJvbGUiOiJBZG1pbiIsInJhdGUiOnsibW9udGhseSI6MTM5MzYsImRhaWx5Ijo1MzYsImhvdXJseSI6IjY3LjAwIn0sIklEcyI6eyJTU1MiOiIyIiwiUGFnSWJpZyI6IjIiLCJQaGlsSGVhbHRoIjoiMiJ9LCJjb21wZW5zYXRpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiRVJTaGFyZSI6eyJTU1MiOjAsInBhZ0liaWciOjB9LCJvdGhlckRlZHVjdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJkZWR1Y3Rpb24iOnsiU1NTIjowLCJQYWdJYmlnIjowLCJQaGlsSGVhbHRoIjowLCJDYXNoQWR2YW5jZSI6eyJxdHkiOjIsImFtb3VudCI6IjAuMDAifSwid2l0aEhvbGRpbmdUYXgiOjAsIm90aGVyIjowfSwiZ3Jvc3MiOnsicHJlc2VudERheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJiYXNpY1BheSI6MCwiYmFzaWNIciI6MCwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjEsImFtb3VudCI6NTM2fSwibGVhdmUiOnsicXR5IjoxLCJhbW91bnQiOjUzNn0sInRvdGFsV29ya0hyIjoiMCJ9LCJ0b3RhbCI6eyJncm9zcyI6MTA3MiwiZGVkdWN0aW9uIjowLCJuZXQiOjEwNzJ9fSx7Im5hbWUiOiJLZXJ2aW4gUm9iYnkgUGFyYWlzbyBQYWd0YWx1bmFuIiwiaWQiOiIxIiwiZW1wbG95ZWVLZXkiOiJVR0U2NzgyOTUwMTQiLCJkYXRlIjp7ImZyb20iOiIyMDIyLTEyLTAxIiwidG8iOiIyMDIyLTEyLTE1In0sInJvbGUiOiJKYW5pdG9yIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjEiLCJQYWdJYmlnIjoiMSIsIlBoaWxIZWFsdGgiOiIxIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjAsIlBhZ0liaWciOjAsIlBoaWxIZWFsdGgiOjAsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjoiMC4wMCJ9LCJ3aXRoSG9sZGluZ1RheCI6MCwib3RoZXIiOjB9LCJncm9zcyI6eyJwcmVzZW50RGF5cyI6eyJxdHkiOjE1LCJhbW91bnQiOjgwNDB9LCJiYXNpY1BheSI6ODA0MCwiYmFzaWNIciI6MTIwLCJvdmVydGltZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sImhvbGlkYXlzIjp7InF0eSI6MSwiYW1vdW50Ijo1MzZ9LCJsZWF2ZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sInRvdGFsV29ya0hyIjoiMTIwIn0sInRvdGFsIjp7Imdyb3NzIjo4NTc2LCJkZWR1Y3Rpb24iOjAsIm5ldCI6ODU3Nn19XQ==', 0, 1),
(13, '2022-12-16', '2022-12-31', '2022-11-17', 'W3sibmFtZSI6IkthcmxhIEthbWlsbGUgVW1hbGkiLCJpZCI6IjY1IiwiZW1wbG95ZWVLZXkiOiJaSUs2NDE3OTI1MzgiLCJkYXRlIjp7ImZyb20iOiIyMDIyLTEyLTE2IiwidG8iOiIyMDIyLTEyLTMxIn0sInJvbGUiOiJIUiIsInJhdGUiOnsibW9udGhseSI6MTM5MzYsImRhaWx5Ijo1MzYsImhvdXJseSI6IjY3LjAwIn0sIklEcyI6eyJTU1MiOiIzMTIzLTEyMzMtMTIzMyIsIlBhZ0liaWciOiIxMjMzLTEyMzMtMTIzMyIsIlBoaWxIZWFsdGgiOiIxMjMzLTQyMzQtMTIzNCJ9LCJjb21wZW5zYXRpb24iOnsidG90YWwiOjIwMDAwLCJsaXN0IjpbeyJkZXNjcmlwdGlvbiI6Im1hdGVybml0eSBsZWF2ZSIsImFtb3VudCI6IjIwMDAwLjAwIn1dfSwiRVJTaGFyZSI6eyJTU1MiOjE4MTUsInBhZ0liaWciOjEwMH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjk0NSwiUGFnSWJpZyI6MTAwLCJQaGlsSGVhbHRoIjo4NDIuODgsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjowfSwid2l0aEhvbGRpbmdUYXgiOjIyMTcuMjUsIm90aGVyIjowfSwiZ3Jvc3MiOnsicHJlc2VudERheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJiYXNpY1BheSI6MCwiYmFzaWNIciI6MCwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjEsImFtb3VudCI6NTM2fSwibGVhdmUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJ0b3RhbFdvcmtIciI6IjAifSwidG90YWwiOnsiZ3Jvc3MiOjIwNTM2LCJkZWR1Y3Rpb24iOjQxMDUuMTMsIm5ldCI6MTY0MzAuODd9fSx7Im5hbWUiOiJKdWFuICBEZWxhIENydXoiLCJpZCI6IjY0IiwiZW1wbG95ZWVLZXkiOiJXWFQwNjM0MjcxODUiLCJkYXRlIjp7ImZyb20iOiIyMDIyLTEyLTE2IiwidG8iOiIyMDIyLTEyLTMxIn0sInJvbGUiOiJBZG1pbiIsInJhdGUiOnsibW9udGhseSI6MTM5MzYsImRhaWx5Ijo1MzYsImhvdXJseSI6IjY3LjAwIn0sIklEcyI6eyJTU1MiOiIxMjMxMjMxMjMiLCJQYWdJYmlnIjoiMTIzMTIzMTIzIiwiUGhpbEhlYWx0aCI6IjEyMzEyMzEyMyJ9LCJjb21wZW5zYXRpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiRVJTaGFyZSI6eyJTU1MiOjc3NSwicGFnSWJpZyI6MTAwfSwib3RoZXJEZWR1Y3Rpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiZGVkdWN0aW9uIjp7IlNTUyI6NDA1LCJQYWdJYmlnIjoxMDAsIlBoaWxIZWFsdGgiOjQwMCwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOjB9LCJ3aXRoSG9sZGluZ1RheCI6MCwib3RoZXIiOjB9LCJncm9zcyI6eyJwcmVzZW50RGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImJhc2ljUGF5IjowLCJiYXNpY0hyIjowLCJvdmVydGltZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sImhvbGlkYXlzIjp7InF0eSI6MSwiYW1vdW50Ijo1MzZ9LCJsZWF2ZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sInRvdGFsV29ya0hyIjoiMCJ9LCJ0b3RhbCI6eyJncm9zcyI6NTM2LCJkZWR1Y3Rpb24iOjkwNSwibmV0IjotMzY5fX0seyJuYW1lIjoiVm9uIFBhdWxvIFBsYXphIiwiaWQiOiIyIiwiZW1wbG95ZWVLZXkiOiJWSkU2MjE0MDkzNzgiLCJkYXRlIjp7ImZyb20iOiIyMDIyLTEyLTE2IiwidG8iOiIyMDIyLTEyLTMxIn0sInJvbGUiOiJBZG1pbiIsInJhdGUiOnsibW9udGhseSI6MTM5MzYsImRhaWx5Ijo1MzYsImhvdXJseSI6IjY3LjAwIn0sIklEcyI6eyJTU1MiOiIyIiwiUGFnSWJpZyI6IjIiLCJQaGlsSGVhbHRoIjoiMiJ9LCJjb21wZW5zYXRpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiRVJTaGFyZSI6eyJTU1MiOjI2NSwicGFnSWJpZyI6NDIuODh9LCJvdGhlckRlZHVjdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJkZWR1Y3Rpb24iOnsiU1NTIjoxMzUsIlBhZ0liaWciOjQyLjg4LCJQaGlsSGVhbHRoIjo0MDAsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjoiMC4wMCJ9LCJ3aXRoSG9sZGluZ1RheCI6MCwib3RoZXIiOjB9LCJncm9zcyI6eyJwcmVzZW50RGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImJhc2ljUGF5IjowLCJiYXNpY0hyIjowLCJvdmVydGltZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sImhvbGlkYXlzIjp7InF0eSI6MSwiYW1vdW50Ijo1MzZ9LCJsZWF2ZSI6eyJxdHkiOjEsImFtb3VudCI6NTM2fSwidG90YWxXb3JrSHIiOiIwIn0sInRvdGFsIjp7Imdyb3NzIjoxMDcyLCJkZWR1Y3Rpb24iOjU3Ny44OCwibmV0Ijo0OTQuMTJ9fSx7Im5hbWUiOiJLZXJ2aW4gUm9iYnkgUGFndGFsdW5hbiIsImlkIjoiMSIsImVtcGxveWVlS2V5IjoiVUdFNjc4Mjk1MDE0IiwiZGF0ZSI6eyJmcm9tIjoiMjAyMi0xMi0xNiIsInRvIjoiMjAyMi0xMi0zMSJ9LCJyb2xlIjoiSmFuaXRvciIsInJhdGUiOnsibW9udGhseSI6MTM5MzYsImRhaWx5Ijo1MzYsImhvdXJseSI6IjY3LjAwIn0sIklEcyI6eyJTU1MiOiIxIiwiUGFnSWJpZyI6IjEiLCJQaGlsSGVhbHRoIjoiMSJ9LCJjb21wZW5zYXRpb24iOnsidG90YWwiOjEwMDAsImxpc3QiOlt7ImRlc2NyaXB0aW9uIjoiRGVjZW1iZXIgSW5jZW50aXZlIiwiYW1vdW50IjoiMTAwMC4wMCJ9XX0sIkVSU2hhcmUiOnsiU1NTIjo4NjAsInBhZ0liaWciOjEwMH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjQ1MCwiUGFnSWJpZyI6MTAwLCJQaGlsSGVhbHRoIjo0MDQuNDgsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjoxMDAwfSwid2l0aEhvbGRpbmdUYXgiOjAsIm90aGVyIjowfSwiZ3Jvc3MiOnsicHJlc2VudERheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJiYXNpY1BheSI6MCwiYmFzaWNIciI6MCwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjEsImFtb3VudCI6NTM2fSwibGVhdmUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJ0b3RhbFdvcmtIciI6IjAifSwidG90YWwiOnsiZ3Jvc3MiOjE1MzYsImRlZHVjdGlvbiI6MTk1NC40OCwibmV0IjotNDE4LjQ4fX1d', 0, 2),
(14, '2022-01-01', '2022-01-15', '2022-11-18', 'W3sibmFtZSI6Ikp1YW4gIERlbGEgQ3J1eiIsImlkIjoiNjQiLCJlbXBsb3llZUtleSI6IldYVDA2MzQyNzE4NSIsImRhdGUiOnsiZnJvbSI6IjIwMjItMDEtMDEiLCJ0byI6IjIwMjItMDEtMTUifSwicm9sZSI6IkFkbWluIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjEyMzEyMzEyMyIsIlBhZ0liaWciOiIxMjMxMjMxMjMiLCJQaGlsSGVhbHRoIjoiMTIzMTIzMTIzIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjAsIlBhZ0liaWciOjAsIlBoaWxIZWFsdGgiOjAsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjowfSwid2l0aEhvbGRpbmdUYXgiOjAsIm90aGVyIjowfSwiZ3Jvc3MiOnsicHJlc2VudERheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJiYXNpY1BheSI6MCwiYmFzaWNIciI6MCwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImxlYXZlIjp7InF0eSI6MCwiYW1vdW50IjowfSwidG90YWxXb3JrSHIiOiIwIn0sInRvdGFsIjp7Imdyb3NzIjowLCJkZWR1Y3Rpb24iOjAsIm5ldCI6MH19LHsibmFtZSI6IlZvbiBQYXVsbyBQbGF6YSIsImlkIjoiMiIsImVtcGxveWVlS2V5IjoiVkpFNjIxNDA5Mzc4IiwiZGF0ZSI6eyJmcm9tIjoiMjAyMi0wMS0wMSIsInRvIjoiMjAyMi0wMS0xNSJ9LCJyb2xlIjoiQWRtaW4iLCJyYXRlIjp7Im1vbnRobHkiOjEzOTM2LCJkYWlseSI6NTM2LCJob3VybHkiOiI2Ny4wMCJ9LCJJRHMiOnsiU1NTIjoiMiIsIlBhZ0liaWciOiIyIiwiUGhpbEhlYWx0aCI6IjIifSwiY29tcGVuc2F0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sIkVSU2hhcmUiOnsiU1NTIjowLCJwYWdJYmlnIjowfSwib3RoZXJEZWR1Y3Rpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiZGVkdWN0aW9uIjp7IlNTUyI6MCwiUGFnSWJpZyI6MCwiUGhpbEhlYWx0aCI6MCwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOiIwLjAwIn0sIndpdGhIb2xkaW5nVGF4IjowLCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwiYmFzaWNQYXkiOjAsImJhc2ljSHIiOjAsIm92ZXJ0aW1lIjp7InF0eSI6MCwiYW1vdW50IjowfSwiaG9saWRheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJsZWF2ZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sInRvdGFsV29ya0hyIjoiMCJ9LCJ0b3RhbCI6eyJncm9zcyI6MCwiZGVkdWN0aW9uIjowLCJuZXQiOjB9fSx7Im5hbWUiOiJLZXJ2aW4gUm9iYnkgUGFndGFsdW5hbiIsImlkIjoiMSIsImVtcGxveWVlS2V5IjoiVUdFNjc4Mjk1MDE0IiwiZGF0ZSI6eyJmcm9tIjoiMjAyMi0wMS0wMSIsInRvIjoiMjAyMi0wMS0xNSJ9LCJyb2xlIjoiSmFuaXRvciIsInJhdGUiOnsibW9udGhseSI6MTM5MzYsImRhaWx5Ijo1MzYsImhvdXJseSI6IjY3LjAwIn0sIklEcyI6eyJTU1MiOiIxIiwiUGFnSWJpZyI6IjEiLCJQaGlsSGVhbHRoIjoiMSJ9LCJjb21wZW5zYXRpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiRVJTaGFyZSI6eyJTU1MiOjAsInBhZ0liaWciOjB9LCJvdGhlckRlZHVjdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJkZWR1Y3Rpb24iOnsiU1NTIjowLCJQYWdJYmlnIjowLCJQaGlsSGVhbHRoIjowLCJDYXNoQWR2YW5jZSI6eyJxdHkiOjIsImFtb3VudCI6MTAwMH0sIndpdGhIb2xkaW5nVGF4IjowLCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6MSwiYW1vdW50Ijo1MzZ9LCJiYXNpY1BheSI6NTM2LCJiYXNpY0hyIjo4LCJvdmVydGltZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sImhvbGlkYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwibGVhdmUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJ0b3RhbFdvcmtIciI6IjgifSwidG90YWwiOnsiZ3Jvc3MiOjUzNiwiZGVkdWN0aW9uIjoxMDAwLCJuZXQiOi00NjR9fV0=', 0, 1),
(15, '2023-01-01', '2023-01-15', '2022-11-18', 'W3sibmFtZSI6Ikp1YW4gIERlbGEgQ3J1eiIsImlkIjoiNjQiLCJlbXBsb3llZUtleSI6IldYVDA2MzQyNzE4NSIsImRhdGUiOnsiZnJvbSI6IjIwMjMtMDEtMDEiLCJ0byI6IjIwMjMtMDEtMTUifSwicm9sZSI6IkFkbWluIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjEyMzEyMzEyMyIsIlBhZ0liaWciOiIxMjMxMjMxMjMiLCJQaGlsSGVhbHRoIjoiMTIzMTIzMTIzIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjAsIlBhZ0liaWciOjAsIlBoaWxIZWFsdGgiOjAsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjowfSwid2l0aEhvbGRpbmdUYXgiOjAsIm90aGVyIjowfSwiZ3Jvc3MiOnsicHJlc2VudERheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJiYXNpY1BheSI6MCwiYmFzaWNIciI6MCwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImxlYXZlIjp7InF0eSI6MCwiYW1vdW50IjowfSwidG90YWxXb3JrSHIiOiIwIn0sInRvdGFsIjp7Imdyb3NzIjowLCJkZWR1Y3Rpb24iOjAsIm5ldCI6MH19LHsibmFtZSI6IlZvbiBQYXVsbyBQbGF6YSIsImlkIjoiMiIsImVtcGxveWVlS2V5IjoiVkpFNjIxNDA5Mzc4IiwiZGF0ZSI6eyJmcm9tIjoiMjAyMy0wMS0wMSIsInRvIjoiMjAyMy0wMS0xNSJ9LCJyb2xlIjoiQWRtaW4iLCJyYXRlIjp7Im1vbnRobHkiOjEzOTM2LCJkYWlseSI6NTM2LCJob3VybHkiOiI2Ny4wMCJ9LCJJRHMiOnsiU1NTIjoiMiIsIlBhZ0liaWciOiIyIiwiUGhpbEhlYWx0aCI6IjIifSwiY29tcGVuc2F0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sIkVSU2hhcmUiOnsiU1NTIjowLCJwYWdJYmlnIjowfSwib3RoZXJEZWR1Y3Rpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiZGVkdWN0aW9uIjp7IlNTUyI6MCwiUGFnSWJpZyI6MCwiUGhpbEhlYWx0aCI6MCwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOiIwLjAwIn0sIndpdGhIb2xkaW5nVGF4IjowLCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwiYmFzaWNQYXkiOjAsImJhc2ljSHIiOjAsIm92ZXJ0aW1lIjp7InF0eSI6MCwiYW1vdW50IjowfSwiaG9saWRheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJsZWF2ZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sInRvdGFsV29ya0hyIjoiMCJ9LCJ0b3RhbCI6eyJncm9zcyI6MCwiZGVkdWN0aW9uIjowLCJuZXQiOjB9fSx7Im5hbWUiOiJLZXJ2aW4gUm9iYnkgUGFndGFsdW5hbiIsImlkIjoiMSIsImVtcGxveWVlS2V5IjoiVUdFNjc4Mjk1MDE0IiwiZGF0ZSI6eyJmcm9tIjoiMjAyMy0wMS0wMSIsInRvIjoiMjAyMy0wMS0xNSJ9LCJyb2xlIjoiSmFuaXRvciIsInJhdGUiOnsibW9udGhseSI6MTM5MzYsImRhaWx5Ijo1MzYsImhvdXJseSI6IjY3LjAwIn0sIklEcyI6eyJTU1MiOiIxIiwiUGFnSWJpZyI6IjEiLCJQaGlsSGVhbHRoIjoiMSJ9LCJjb21wZW5zYXRpb24iOnsidG90YWwiOjAsImxpc3QiOltdfSwiRVJTaGFyZSI6eyJTU1MiOjAsInBhZ0liaWciOjB9LCJvdGhlckRlZHVjdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJkZWR1Y3Rpb24iOnsiU1NTIjowLCJQYWdJYmlnIjowLCJQaGlsSGVhbHRoIjowLCJDYXNoQWR2YW5jZSI6eyJxdHkiOjIsImFtb3VudCI6MTAwMH0sIndpdGhIb2xkaW5nVGF4IjowLCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwiYmFzaWNQYXkiOjAsImJhc2ljSHIiOjAsIm92ZXJ0aW1lIjp7InF0eSI6MCwiYW1vdW50IjowfSwiaG9saWRheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJsZWF2ZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sInRvdGFsV29ya0hyIjoiMCJ9LCJ0b3RhbCI6eyJncm9zcyI6MCwiZGVkdWN0aW9uIjoxMDAwLCJuZXQiOi0xMDAwfX1d', 0, 1),
(16, '2022-01-01', '2022-12-31', '2022-11-18', NULL, 0, 3),
(17, '2021-01-01', '2021-12-31', '2022-11-19', NULL, 0, 3),
(18, '2022-01-01', '2022-06-30', '2022-11-19', 'W3siaWQiOiIxIiwibmFtZSI6IktlcnZpbiBSb2JieSBQYXJhaXNvIFBhZ3RhbHVuYW4iLCJyb2xlIjoiSmFuaXRvciIsInJhdGUiOnsiaG91cmx5IjoiNjcuMDAiLCJkYWlseSI6NTM2LCJtb250aGx5IjoxMzkzNn0sIm1vbnRocyI6eyJKYW51YXJ5Ijo1MzYsIkZlYnJ1YXJ5IjowLCJNYXJjaCI6MCwiQXByaWwiOjAsIk1heSI6MCwiSnVuZSI6MH0sImhvdXJzIjp7IkphbnVhcnkiOjgsIkZlYnJ1YXJ5IjowLCJNYXJjaCI6MCwiQXByaWwiOjAsIk1heSI6MCwiSnVuZSI6MH0sInRvdGFsSHJzIjo4LCJ0b3RhbEJhc2ljUGF5Ijo1MzYsInRvdGFsIjo4OS4zMzMzMzMzMzMzMzMzM30seyJpZCI6IjIiLCJuYW1lIjoiVm9uIFBhdWxvIFNhbnRpYWdvIFBsYXphIiwicm9sZSI6IkFkbWluIiwicmF0ZSI6eyJob3VybHkiOiI2Ny4wMCIsImRhaWx5Ijo1MzYsIm1vbnRobHkiOjEzOTM2fSwibW9udGhzIjp7IkphbnVhcnkiOjAsIkZlYnJ1YXJ5IjowLCJNYXJjaCI6MCwiQXByaWwiOjAsIk1heSI6MCwiSnVuZSI6MH0sImhvdXJzIjp7IkphbnVhcnkiOjAsIkZlYnJ1YXJ5IjowLCJNYXJjaCI6MCwiQXByaWwiOjAsIk1heSI6MCwiSnVuZSI6MH0sInRvdGFsSHJzIjowLCJ0b3RhbEJhc2ljUGF5IjowLCJ0b3RhbCI6MH0seyJpZCI6IjY0IiwibmFtZSI6Ikp1YW4gIE1pZ3VlbCBEZWxhIENydXoiLCJyb2xlIjoiQWRtaW4iLCJyYXRlIjp7ImhvdXJseSI6IjY3LjAwIiwiZGFpbHkiOjUzNiwibW9udGhseSI6MTM5MzZ9LCJtb250aHMiOnsiSmFudWFyeSI6MCwiRmVicnVhcnkiOjAsIk1hcmNoIjowLCJBcHJpbCI6MCwiTWF5IjowLCJKdW5lIjowfSwiaG91cnMiOnsiSmFudWFyeSI6MCwiRmVicnVhcnkiOjAsIk1hcmNoIjowLCJBcHJpbCI6MCwiTWF5IjowLCJKdW5lIjowfSwidG90YWxIcnMiOjAsInRvdGFsQmFzaWNQYXkiOjAsInRvdGFsIjowfV0=', 1, 4),
(19, '2021-01-01', '2021-06-30', '2022-11-19', NULL, 0, 4),
(20, '2022-01-16', '2022-01-31', '2022-11-19', 'W3sibmFtZSI6Ikp1YW4gIERlbGEgQ3J1eiIsImlkIjoiNjQiLCJlbXBsb3llZUtleSI6IldYVDA2MzQyNzE4NSIsImRhdGUiOnsiZnJvbSI6IjIwMjItMDEtMTYiLCJ0byI6IjIwMjItMDEtMzEifSwicm9sZSI6IkFkbWluIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjEyMzEyMzEyMyIsIlBhZ0liaWciOiIxMjMxMjMxMjMiLCJQaGlsSGVhbHRoIjoiMTIzMTIzMTIzIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjAsIlBhZ0liaWciOjAsIlBoaWxIZWFsdGgiOjQwMCwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOjB9LCJ3aXRoSG9sZGluZ1RheCI6MCwib3RoZXIiOjB9LCJncm9zcyI6eyJwcmVzZW50RGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImJhc2ljUGF5IjowLCJiYXNpY0hyIjowLCJvdmVydGltZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sImhvbGlkYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwibGVhdmUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJ0b3RhbFdvcmtIciI6IjAifSwidG90YWwiOnsiZ3Jvc3MiOjAsImRlZHVjdGlvbiI6NDAwLCJuZXQiOi00MDB9fSx7Im5hbWUiOiJWb24gUGF1bG8gUGxhemEiLCJpZCI6IjIiLCJlbXBsb3llZUtleSI6IlZKRTYyMTQwOTM3OCIsImRhdGUiOnsiZnJvbSI6IjIwMjItMDEtMTYiLCJ0byI6IjIwMjItMDEtMzEifSwicm9sZSI6IkFkbWluIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjIiLCJQYWdJYmlnIjoiMiIsIlBoaWxIZWFsdGgiOiIyIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MH0sIm90aGVyRGVkdWN0aW9uIjp7InRvdGFsIjowLCJsaXN0IjpbXX0sImRlZHVjdGlvbiI6eyJTU1MiOjAsIlBhZ0liaWciOjAsIlBoaWxIZWFsdGgiOjQwMCwiQ2FzaEFkdmFuY2UiOnsicXR5IjoyLCJhbW91bnQiOiIwLjAwIn0sIndpdGhIb2xkaW5nVGF4IjowLCJvdGhlciI6MH0sImdyb3NzIjp7InByZXNlbnREYXlzIjp7InF0eSI6MCwiYW1vdW50IjowfSwiYmFzaWNQYXkiOjAsImJhc2ljSHIiOjAsIm92ZXJ0aW1lIjp7InF0eSI6MCwiYW1vdW50IjowfSwiaG9saWRheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJsZWF2ZSI6eyJxdHkiOjAsImFtb3VudCI6MH0sInRvdGFsV29ya0hyIjoiMCJ9LCJ0b3RhbCI6eyJncm9zcyI6MCwiZGVkdWN0aW9uIjo0MDAsIm5ldCI6LTQwMH19LHsibmFtZSI6IktlcnZpbiBSb2JieSBQYWd0YWx1bmFuIiwiaWQiOiIxIiwiZW1wbG95ZWVLZXkiOiJVR0U2NzgyOTUwMTQiLCJkYXRlIjp7ImZyb20iOiIyMDIyLTAxLTE2IiwidG8iOiIyMDIyLTAxLTMxIn0sInJvbGUiOiJKYW5pdG9yIiwicmF0ZSI6eyJtb250aGx5IjoxMzkzNiwiZGFpbHkiOjUzNiwiaG91cmx5IjoiNjcuMDAifSwiSURzIjp7IlNTUyI6IjEiLCJQYWdJYmlnIjoiMSIsIlBoaWxIZWFsdGgiOiIxIn0sImNvbXBlbnNhdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJFUlNoYXJlIjp7IlNTUyI6MCwicGFnSWJpZyI6MTAuNzJ9LCJvdGhlckRlZHVjdGlvbiI6eyJ0b3RhbCI6MCwibGlzdCI6W119LCJkZWR1Y3Rpb24iOnsiU1NTIjowLCJQYWdJYmlnIjo1LjM2LCJQaGlsSGVhbHRoIjo0MDAsIkNhc2hBZHZhbmNlIjp7InF0eSI6MiwiYW1vdW50IjoxMDAwfSwid2l0aEhvbGRpbmdUYXgiOjAsIm90aGVyIjowfSwiZ3Jvc3MiOnsicHJlc2VudERheXMiOnsicXR5IjowLCJhbW91bnQiOjB9LCJiYXNpY1BheSI6MCwiYmFzaWNIciI6MCwib3ZlcnRpbWUiOnsicXR5IjowLCJhbW91bnQiOjB9LCJob2xpZGF5cyI6eyJxdHkiOjAsImFtb3VudCI6MH0sImxlYXZlIjp7InF0eSI6MCwiYW1vdW50IjowfSwidG90YWxXb3JrSHIiOiIwIn0sInRvdGFsIjp7Imdyb3NzIjowLCJkZWR1Y3Rpb24iOjE0MDUuMzYwMDAwMDAwMDAwMSwibmV0IjotMTQwNS4zNjAwMDAwMDAwMDAxfX1d', 0, 2),
(21, '2023-01-01', '2023-12-31', '2022-11-20', NULL, 0, 3);

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
(1, '07:00:00', '17:00:00'),
(2, '17:00:00', '03:00:00');

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
-- Indexes for table `chart_bir`
--
ALTER TABLE `chart_bir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_philhealth`
--
ALTER TABLE `chart_philhealth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_sss`
--
ALTER TABLE `chart_sss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_management`
--
ALTER TABLE `company_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compensation_deductions`
--
ALTER TABLE `compensation_deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compensation_pay`
--
ALTER TABLE `compensation_pay`
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
-- Indexes for table `holiday_event`
--
ALTER TABLE `holiday_event`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=909;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `attendance_csv`
--
ALTER TABLE `attendance_csv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `cashadvance`
--
ALTER TABLE `cashadvance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `cashadvance_total`
--
ALTER TABLE `cashadvance_total`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `chart_bir`
--
ALTER TABLE `chart_bir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chart_philhealth`
--
ALTER TABLE `chart_philhealth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chart_sss`
--
ALTER TABLE `chart_sss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `company_management`
--
ALTER TABLE `company_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `compensation_deductions`
--
ALTER TABLE `compensation_deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `compensation_pay`
--
ALTER TABLE `compensation_pay`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `employeelist`
--
ALTER TABLE `employeelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

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
-- AUTO_INCREMENT for table `holiday_event`
--
ALTER TABLE `holiday_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `leave_info`
--
ALTER TABLE `leave_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `payroll_info`
--
ALTER TABLE `payroll_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
