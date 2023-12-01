-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 01, 2023 at 05:15 PM
-- Server version: 10.6.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u888758245_attendance_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `adjustment`
--

CREATE TABLE `adjustment` (
  `adjustment_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `adjustment_type` varchar(100) NOT NULL,
  `adjustment_date` varchar(50) NOT NULL,
  `adjustment_reason` varchar(255) NOT NULL,
  `requested_on` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `employee_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `a_id` int(11) NOT NULL,
  `a_message` varchar(255) NOT NULL,
  `a_date` varchar(50) NOT NULL,
  `a_title` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `read_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alert`
--

INSERT INTO `alert` (`a_id`, `a_message`, `a_date`, `a_title`, `user_id`, `read_status`) VALUES
(122, 'hello', '16/11/2023', 'hi', 'ETFDSD005', 'read'),
(123, 'hello', '16/11/2023', 'hi', 'ETPDJD001', 'unread'),
(124, 'hello', '16/11/2023', 'hi', 'ETPDJD002', 'unread'),
(125, 'hello', '16/11/2023', 'hi', 'ETPDJD003', 'unread'),
(126, 'hello', '16/11/2023', 'hi', 'ETPDJD004', 'unread'),
(127, 'hello', '16/11/2023', 'hi', 'ETPGSGD001', 'unread'),
(128, 'hello', '16/11/2023', 'hi', 'ETPSSE006', 'unread'),
(129, 'hello', '16/11/2023', 'hi', 'ETPSSE007', 'unread'),
(130, 'hello', '16/11/2023', 'hi', 'ETPSSE008', 'unread'),
(131, 'hello', '16/11/2023', 'hi', 'ETPSSE009', 'unread'),
(132, 'hello', '16/11/2023', 'hi', 'ETPSSE010', 'unread'),
(133, 'hello', '16/11/2023', 'hi', 'ETPSSE011', 'unread'),
(134, 'hello', '16/11/2023', 'hi', 'ETPSSM005', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `user_id` varchar(50) NOT NULL,
  `leave_id` int(11) NOT NULL,
  `start_time` varchar(11) NOT NULL,
  `end_time` varchar(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `leave_type` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `employee_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `n_id` int(11) NOT NULL,
  `n_title` varchar(100) NOT NULL,
  `n_message` varchar(100) NOT NULL,
  `read_status` varchar(50) NOT NULL,
  `n_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `auto` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Signin` varchar(50) NOT NULL,
  `Status` text NOT NULL,
  `Signout_Status` text NOT NULL,
  `Signout` varchar(50) NOT NULL,
  `activity` text NOT NULL,
  `Date` varchar(15) NOT NULL,
  `attendance` text NOT NULL,
  `hours` varchar(255) DEFAULT NULL,
  `overtime` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`auto`, `user_id`, `Name`, `Signin`, `Status`, `Signout_Status`, `Signout`, `activity`, `Date`, `attendance`, `hours`, `overtime`) VALUES
(3108, 'ETPSSE010', 'Tuba', '05:40:33pm', 'On Time', 'Half day', '05:41:31pm', 'Signed Out', '11, 16, 2023', 'Present', '0:0:58', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(255) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `current_address` varchar(255) NOT NULL,
  `user_access` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `joining_date` varchar(50) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `cnic` varchar(100) NOT NULL,
  `date_of_birth` varchar(100) NOT NULL,
  `martial_status` varchar(100) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_status` varchar(50) NOT NULL,
  `user_shift` varchar(50) NOT NULL,
  `time_in` varchar(50) NOT NULL,
  `time_out` varchar(50) NOT NULL,
  `off_email` varchar(255) DEFAULT NULL,
  `n_name` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL,
  `n_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `employee_name`, `department`, `gender`, `email`, `current_address`, `user_access`, `password`, `designation`, `joining_date`, `qualification`, `contact_number`, `cnic`, `date_of_birth`, `martial_status`, `user_image`, `user_status`, `user_shift`, `time_in`, `time_out`, `off_email`, `n_name`, `relation`, `n_number`) VALUES
('admin', 'Shahrukh', 'Administration', 'Male', '', '', 'Administrator', '$2y$10$zxANLNvYbGlWwXCN0kBvQ..MtIhXRZ8WL/7aTo4wYXa12qhfjlO1K', 'Director', '', '', '', '', '', 'Married', '', 'Active', '', '', '', NULL, NULL, NULL, NULL),
('admin123', 'user123', 'Administration', 'Male', '', '', 'Administrator', '$2y$10$sY42NN14r0xM2307GqaOw.GWaU2nhgreKK/AoIFgSjbbSVQARn8zC', 'Director', '', '', '', '', '', 'Married', '', 'Active', '', '', '', NULL, NULL, NULL, NULL),
('ETFDSD005', 'Muhammad Junaid Qureshi', 'Development', 'Male', 'junaidfaraz79@gmail.com', 'Nazimabad', 'Employee', '$2y$10$ljO3FLSBmXdSs9WRLWNFju.s7rKSzh.IpJZ0Q/MZNA6GCuOyuu1Ly', 'Senior Developer', '11/1/2023', 'MCS', '0333-3441773', ' 42101-9128632-9', '12/03/1979', 'Married', '../uploads/742999sir junaid qureshi-01.jpg', 'Active', 'Full Time', '05:00:00pm', '05:00:00am', NULL, NULL, NULL, NULL),
('ETFSSE001', 'Muhammad Usman Alam', 'Sales', 'Male', 'alamusman693@gmail.com', 'Sector 11-A(A-175), North Karachi', 'Employee', '$2y$10$sY42NN14r0xM2307GqaOw.GWaU2nhgreKK/AoIFgSjbbSVQARn8zC', 'Sales Executive', '1/1/2020', 'Bachelors in Ecnomics', '0315-8992956', ' 42101-3531909-9', '18/11/1998', 'Single', '../uploads/Rfjphc.png', 'Inactive', 'Full Time', '06:00:00pm', '12:00:00am', NULL, NULL, NULL, NULL),
('ETFSSE002', 'Muhammad Kaif Khan', 'Sales', 'Male', 'muhammadkaifkhan736@gmail.com', 'A97/1 Alfalah Society, Shah Faisal Colony, Karachi', 'Employee', '$2y$10$sY42NN14r0xM2307GqaOw.GWaU2nhgreKK/AoIFgSjbbSVQARn8zC', 'Sales Executive', '1/1/2020', 'inter', '0347-6320619', ' 42201-2535351-7', '01/04/2004', 'Single', '../uploads/Rfjphc.png', 'Inactive', 'Full Time', '07:00:00pm', '02:00:00am', NULL, NULL, NULL, NULL),
('ETFSSE003', 'Syed Muhammad Tahir Hussaini', 'Sales', 'Male', 'syedtahirhussain773@gmail.com', 'Flat No 21 A Saleem square near Shama shopping center', 'Employee', '$2y$10$sY42NN14r0xM2307GqaOw.GWaU2nhgreKK/AoIFgSjbbSVQARn8zC', 'Sales Executive', '1/1/2020', 'Bachelors in Computer Science', '03432077567', ' 42201-3188317-7', '02/10/1991', 'Single', '../uploads/Rfjphc.png', 'Inactive', 'Full Time', '07:00:00pm', '02:00:00am', NULL, NULL, NULL, NULL),
('ETPDJD001', 'Musadiq Mustafa', 'Development', 'Male', 'musadiqmustafa461@gmail.com', 'Flat 1005, 10th floor, Pearl Classic', 'Employee', '$2y$10$UlugB92JiZ.aWHJLMRvv4edeBNuDybl.7n/YgXBQY21dqnjCi92/K', 'Senior Developer', '1/1/2020', 'BSCS from UIT University', '0341-7181026', '42101-2188151-5', '14/09/2001', 'Single', '../uploads/274787musadiq id card-01.jpg', 'Active', 'Part Time', '08:00:00pm', '02:00:00am', NULL, NULL, NULL, NULL),
('ETPDJD002', 'Muhammad Maaz ', 'Development', 'Male', 'm.maazfaisal0301@gmail.com', 'R-380, Block B, Saima Arabian Villas, Karachi', 'Employee', '$2y$10$ZlztqkiS/LacHzLIw1hssO9AR3vxaRm/plE6ksXginEskf.kdIjKi', 'Junior Developer', '1/1/2020', 'Bachelors in Computer Science', '0312-2345662', '42101-9525558-5', '09/02/2002', 'Single', '../uploads/722299astronaut.jpg', 'Active', 'Part Time', '05:00:00pm', '01:15:00am', NULL, NULL, NULL, NULL),
('ETPDJD003', 'Abdul Rafay', 'Development', 'Male', 'abdulrafay99910@gmail.com', 'R-75/76 Paradise Homes Scheme-33', 'Employee', '$2y$10$mAeyzq9TwbsjSTDlka8zc.GlmdI4.dj9OuDHVDTprRflF57xK0KZ6', 'Senior Developer', '9/1/2023', 'BSCS from UIT University', '03102214648', '42501-5288304-9', '05/24/2001', 'Single', '../uploads/287239raffay id card-01.jpg', 'Active', 'Part Time', '05:00:00pm', '01:00:00am', 'rafay.abdul3210@gmail.com', 'Ahmad Faisal', 'Cousin', '03332214345'),
('ETPDJD004', 'Amash', 'Development', 'Male', 'amashalam83@gmail.com', '', 'Employee', '$2y$10$VY3fBzF8eGOKoqrihUxnZOkyEXk9WaN2qIrjQQM9FznpJSMJfZvcy', 'Junior Developer', '6/1/2023', 'BSCS from UIT University', '0311-6861297', ' 42201-4298429-9', '', 'Single', '../uploads/854394amash id card-01.jpg', 'Active', 'Part Time', '07:00:00pm', '01:00:00am', NULL, NULL, NULL, NULL),
('ETPGSGD001', 'Usama Raza', 'Graphics', 'Male', 'usamaraza332@gmail.com', 'B-41 block-19 f.b area roshan bagh society karachi pakistan', 'Employee', '$2y$10$H3X6ooM4suOnseZU9CURku/bYUyH7CWRODsvuuPOa7tilJrRPqTOO', 'Senior Graphic Designer', '1/1/2020', 'Inter     ', '0303-2600430', ' 42101-4859629-5', '13/04/1998', 'Single', '../uploads/390585usama raza id card-01.jpg', 'Active', 'Part Time', '06:00:00pm', '12:00:00am', NULL, NULL, NULL, NULL),
('ETPSSE006', 'Yahya Rafiq', 'Development', 'Male', 'yahyarafiq56@gmail.com', '', 'Employee', '$2y$10$epkranwIE2nbn0OH2IVrKOKATXopt0/689MstsHuinnIeoSR2DSYK', 'Junior Developer', '5/1/2023', 'ADC ', '0318-3807460', '  42201-5172725-7', '30/12/1999', 'Single', '../uploads/39894yahya id card-01.jpg', 'Active', 'Part Time', '05:15:00pm', '05:00:00am', NULL, NULL, NULL, NULL),
('ETPSSE007', 'Syed Ebad', 'Sales', 'Male', 'syedebad200@gmail.com', '', 'Employee', '$2y$10$a3Gujv4FzJKY.8N9YG8UO.h2AutgicGlSh/pz0qMsKuO9s4Gb1p/2', 'Sales Executive', '6/1/2023', '', '0330-3426719', ' 42101-0471774-7', '', 'Single', '../uploads/282673bitcoin.jpg', 'Active', 'Part Time', '05:00:00pm', '06:00:00am', NULL, NULL, NULL, NULL),
('ETPSSE008', 'Rahim', 'Sales', 'Male', 'blackbeastworld666@gmail.com', '', 'Employee', '$2y$10$YFoKr3RQksfLSF/1KDiha.13/CKy8bm/Bfm1qi4fY5R5s1lss9YRy', 'Sales Executive', '10/1/2023', '', '0336-1309291', ' 4210162616473', '', 'Single', '../uploads/386826bitcoin.jpg', 'Active', 'Part Time', '05:00:00pm', '06:00:00am', NULL, NULL, NULL, NULL),
('ETPSSE009', 'Shanzeh Rizvi', 'Sales', 'Female', 'syedashanzehrizvi@gmail.com', '', 'Employee', '$2y$10$M85rv15tX9b.4pk/UNZIR.go.w.qHkrTOQcbSR8GlOSi/.LNimJhW', 'Sales Executive', '10/1/2023', '', '0334-3018532', '  4210153208587', '', 'Single', '../uploads/8960shanzeh id card-01.jpg', 'Active', 'Part Time', '05:15:00pm', '06:00:00am', NULL, NULL, NULL, NULL),
('ETPSSE010', 'Tuba', 'Sales', 'Female', '', '', 'Employee', '$2y$10$qxdn/5VcBxFE8z9V1inS7uOb/mlVt/CrGbzFfOpWCF/9hT/5a1YD2', 'Sales Executive', '10/1/2023', '', '', ' ', '', 'Single', '../uploads/185410tuba id card-01.jpg', 'Active', 'Part Time', '05:15:00pm', '05:00:00pm', NULL, NULL, NULL, NULL),
('ETPSSE011', 'Bisma Imran', 'Sales', 'Female', 'bismaimran36@gmail.com', '', 'Employee', '$2y$10$oeZtk5SFvP.VvDOcbHBA0uVxPHDZofKE2unOp1RqOM0viB10ZdN6u', 'Sales Executive', '10/1/2023', '', '0343-2457711', ' 42201-6770734-2', '', 'Single', '../uploads/473732bisma id card-01-01.jpg', 'Active', 'Part Time', '05:15:00pm', '05:00:00am', NULL, NULL, NULL, NULL),
('ETPSSM005', 'Syed Muhammad Mohib', 'Sales', 'Male', 'muhammadmohib575@gmail.com', '', 'Employee', '$2y$10$.DZQI53v2j0Wwg3RK/lvvuAyxCrn7mf95ISzbZ9VJYf7frFyEGw2O', 'Sales Manager', '9/1/2022', 'BSCS', '0347-2499421', '  42101-5043325-9', '', 'Single', '../uploads/53896mohib id card-01.jpg', 'Active', 'Part Time', '05:00:00pm', '05:00:00am', NULL, NULL, NULL, NULL),
('ETRSSH004', 'Syed Aaqib Ali', 'Sales', 'Male', 'syedaaqibali64@gmail.com', 'R-65,66 Block I, North Nazimabad, Karachi', 'Employee', '$2y$10$sY42NN14r0xM2307GqaOw.GWaU2nhgreKK/AoIFgSjbbSVQARn8zC', 'Sales Head', '1/1/2020', 'BSCS from Hamdard University', '03369066949', ' 42101-4783203-1', '05-12-2003', 'Single', '../uploads/Rfjphc.png', 'Inactive', 'Remote', '07:00:00pm', '02:00:00am', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adjustment`
--
ALTER TABLE `adjustment`
  ADD PRIMARY KEY (`adjustment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`auto`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adjustment`
--
ALTER TABLE `adjustment`
  MODIFY `adjustment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signin`
--
ALTER TABLE `signin`
  MODIFY `auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3117;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adjustment`
--
ALTER TABLE `adjustment`
  ADD CONSTRAINT `adjustment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `signin`
--
ALTER TABLE `signin`
  ADD CONSTRAINT `signin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
