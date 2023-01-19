-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 05:55 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(200) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `USERNAME`, `PASSWORD`) VALUES
(1, 'vm', '123');

-- --------------------------------------------------------

--
-- Table structure for table `assign_class`
--

CREATE TABLE `assign_class` (
  `ID` int(11) NOT NULL,
  `SEM` varchar(100) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Staff` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_class`
--

INSERT INTO `assign_class` (`ID`, `SEM`, `Subject`, `Staff`) VALUES
(1, '7', '1', '3'),
(2, '7', '2', '4'),
(3, '7', '4', '1');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_process`
--

CREATE TABLE `attendance_process` (
  `ID` int(11) NOT NULL,
  `STU_ID` int(11) NOT NULL,
  `STAFF_ID` int(11) NOT NULL,
  `SUB_ID` int(11) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `time` varchar(50) NOT NULL,
  `STATUS` varchar(10) NOT NULL,
  `year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dynmic_subject`
--

CREATE TABLE `dynmic_subject` (
  `ID` int(11) NOT NULL,
  `date1` varchar(100) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dynmic_subject`
--

INSERT INTO `dynmic_subject` (`ID`, `date1`, `staff_id`, `sub_id`) VALUES
(1, '12/01/2022', 3, 6),
(2, '12/01/2022', 3, 2),
(3, '12/01/2022', 3, 6),
(4, '12/01/2022', 3, 7),
(5, '12/01/2022', 3, 7),
(6, '', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `staff_data`
--

CREATE TABLE `staff_data` (
  `ID` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Mobile` bigint(11) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_data`
--

INSERT INTO `staff_data` (`ID`, `Name`, `Mobile`, `Email`, `Username`, `Password`, `Image`, `Status`) VALUES
(1, 'Lata Swami', 12345678, 'latas1@gmail.com', 'Lata', 'Lata1', 'upload/1_staff.png', 'approve'),
(2, 'Ramesh Sharma', 67890, 'ramesh2@gmail.com', 'Ramesh', 'Ramesh2', 'upload/2_staff.png', ''),
(3, 'Maheshwari Kanade', 13579, 'mahi@gmail.com', 'mahi', 'mahi', 'upload/3_staff.png', 'approve'),
(4, 'Vaishnavi Jambhale', 24680, 'vaishnavi@gmail.com', 'v', 'v', 'upload/4_staff.png', 'approve'),
(5, 'Yogeshwari Swami', 99999999990, 'yogi90@gmail.com', 'yogi', 'yogi', 'upload/5_staff.png', ''),
(6, 'Vaishnavi Naikwade', 2020202020, 'vaishu20@gmail.com', 'vaishnavi', 'Vaishu', 'upload/6_staff.png', 'approve');

-- --------------------------------------------------------

--
-- Table structure for table `std_data`
--

CREATE TABLE `std_data` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Roll no.` int(25) NOT NULL,
  `class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_data`
--

INSERT INTO `std_data` (`ID`, `Name`, `Roll no.`, `class`) VALUES
(1, 'vaishnavi', 1, 'Final Year'),
(2, 'Maheshwari ', 2, 'Final Year'),
(3, 'Vaishnavi N', 3, 'Final Year'),
(4, 'Deepak', 1, 'Third Year'),
(5, 'Bhagyashree', 2, 'Third Year'),
(6, 'Janhavi', 1, 'Second Year'),
(7, 'Pooja', 2, 'Second Year'),
(8, 'Jagdish', 3, 'Second Year'),
(11, 'Raj ', 4, 'Second Year'),
(12, 'Jyoti', 5, 'Second Year'),
(13, 'Pranjal', 4, 'Final Year'),
(14, 'Shivani', 3, 'Third Year'),
(15, 'Onkar', 4, 'Third Year'),
(16, 'Suraj', 5, 'Final Year'),
(17, 'Sarita', 6, 'Second Year'),
(18, 'Risha', 10, '2');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `ID` int(11) NOT NULL,
  `SEM` varchar(100) NOT NULL,
  `Subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`ID`, `SEM`, `Subject`) VALUES
(1, '7', 'Cloud computing '),
(2, '7', 'Big data'),
(3, '3', 'Discrete Mathematics'),
(4, '7', 'Software Engineering '),
(5, '7', 'Blockchain Technology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `assign_class`
--
ALTER TABLE `assign_class`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `attendance_process`
--
ALTER TABLE `attendance_process`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dynmic_subject`
--
ALTER TABLE `dynmic_subject`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `staff_data`
--
ALTER TABLE `staff_data`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `std_data`
--
ALTER TABLE `std_data`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assign_class`
--
ALTER TABLE `assign_class`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `attendance_process`
--
ALTER TABLE `attendance_process`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dynmic_subject`
--
ALTER TABLE `dynmic_subject`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `staff_data`
--
ALTER TABLE `staff_data`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `std_data`
--
ALTER TABLE `std_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
