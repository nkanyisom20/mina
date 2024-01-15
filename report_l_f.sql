-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 03:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `report_l&f`
--

-- --------------------------------------------------------

--
-- Table structure for table `lost_found`
--

CREATE TABLE `lost_found` (
  `stu_lf_id` int(4) NOT NULL,
  `student_no` int(20) NOT NULL,
  `fullnames` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `type_of_doc` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lost_found`
--

INSERT INTO `lost_found` (`stu_lf_id`, `student_no`, `fullnames`, `surname`, `type_of_doc`, `location`, `date`) VALUES
(6, 201450289, 'Asibonge', 'Mkhize', 'Drivers Licence', 'Admin Building', '2023-05-16 10:52:24'),
(7, 201450289, 'Nqubeko', 'Mkhize', 'Student Card', 'Library', '2023-05-16 10:56:14'),
(8, 201452969, 'Asibonge', 'Mkhize', 'Matric Certificate', 'Main Gate', '2023-05-16 15:57:29'),
(9, 201450289, 'Asibonge', 'Mkhize', 'Student Card', 'Main Gate', '2023-05-16 20:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `student_inf`
--

CREATE TABLE `student_inf` (
  `stu_inf_id` int(4) NOT NULL,
  `stu_reg_id` int(4) NOT NULL,
  `identity_no` varchar(10) NOT NULL,
  `email_addr` varchar(10) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `biography` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_inf`
--

INSERT INTO `student_inf` (`stu_inf_id`, `stu_reg_id`, `identity_no`, `email_addr`, `contact_no`, `biography`, `date`) VALUES
(13, 15, '', '', '', '', '2023-05-15 21:39:12'),
(14, 15, '201450289', 'mn@errert.', '0768553894', 'hi', '2023-05-15 21:59:17'),
(15, 16, '', '', '', '', '2023-05-16 15:57:07'),
(16, 19, '', '', '', '', '2023-05-17 14:06:48'),
(17, 20, '', '', '', '', '2023-05-17 15:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `student_reg`
--

CREATE TABLE `student_reg` (
  `stu_reg_id` int(4) NOT NULL,
  `student_no` varchar(10) NOT NULL,
  `fullnames` varchar(10) NOT NULL,
  `surname` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date_of_birth` varchar(100) NOT NULL,
  `verified` int(2) NOT NULL DEFAULT 0,
  `removed` int(2) NOT NULL DEFAULT 0,
  `date_registered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_reg`
--

INSERT INTO `student_reg` (`stu_reg_id`, `student_no`, `fullnames`, `surname`, `password`, `gender`, `date_of_birth`, `verified`, `removed`, `date_registered`) VALUES
(15, '201450289', 'Asibonge', 'Mkhize', '$2y$10$K63', 'Male', '2016-10-21', 1, 1, '2023-05-15 00:00:00'),
(16, '201452969', 'Asibonge', 'Mkhize', '$2y$10$zdw', 'Male', '2023-05-03', 1, 0, '2023-05-16 00:00:00'),
(19, '201450280', 'Asibonge', 'Bebe', '$2y$10$NQq', 'Male', '2023-05-02', 0, 0, '2023-05-17 00:00:00'),
(20, '201550289', 'Nkah', 'Mkhize', '$2y$10$72m', 'Male', '2023-05-19', 0, 0, '2023-05-17 15:28:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lost_found`
--
ALTER TABLE `lost_found`
  ADD PRIMARY KEY (`stu_lf_id`),
  ADD UNIQUE KEY `stu_lf_id` (`stu_lf_id`);

--
-- Indexes for table `student_inf`
--
ALTER TABLE `student_inf`
  ADD PRIMARY KEY (`stu_inf_id`),
  ADD UNIQUE KEY `stu_inf_id` (`stu_inf_id`),
  ADD KEY `student_inf_ibfk_1` (`stu_reg_id`);

--
-- Indexes for table `student_reg`
--
ALTER TABLE `student_reg`
  ADD PRIMARY KEY (`stu_reg_id`),
  ADD UNIQUE KEY `stu_reg_id` (`stu_reg_id`),
  ADD UNIQUE KEY `student_no` (`student_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lost_found`
--
ALTER TABLE `lost_found`
  MODIFY `stu_lf_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_inf`
--
ALTER TABLE `student_inf`
  MODIFY `stu_inf_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student_reg`
--
ALTER TABLE `student_reg`
  MODIFY `stu_reg_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_inf`
--
ALTER TABLE `student_inf`
  ADD CONSTRAINT `student_inf_ibfk_1` FOREIGN KEY (`stu_reg_id`) REFERENCES `student_reg` (`stu_reg_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
