-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 09:44 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_allocation`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `acYearID` int(11) NOT NULL,
  `acYear` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`acYearID`, `acYear`) VALUES
(1, '2020/2021'),
(2, '2021/2022'),
(3, 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` int(11) NOT NULL,
  `courseCode` varchar(15) NOT NULL,
  `courseName` varchar(60) NOT NULL,
  `courseUnit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `courseCode`, `courseName`, `courseUnit`) VALUES
(5, 'dinf 0214', 'Object Oriented Programming', 10),
(6, 'dinf 12412', 'JS validation', 15),
(7, 'as fasd', 'asdfasdfa asd asd s', 12);

-- --------------------------------------------------------

--
-- Table structure for table `course_schedules`
--

CREATE TABLE `course_schedules` (
  `scheduleID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `semesterID` int(11) NOT NULL,
  `acYearID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleID` int(11) NOT NULL,
  `roleName` varchar(20) DEFAULT NULL,
  `roleDescription` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleID`, `roleName`, `roleDescription`) VALUES
(1, 'Admin', 'Administrator'),
(2, 'Staff', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `semesterID` int(11) NOT NULL,
  `semesterName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`semesterID`, `semesterName`) VALUES
(1, 'Semester 1'),
(2, 'Semester 2');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `staffID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staffID`, `firstName`, `middleName`, `lastName`, `DOB`, `userID`) VALUES
(1, 'Omar ', 'Saleh', 'Suleiman', '2010-11-19', 2),
(2, 'Sada', 'Ali', 'Juma', '2022-12-27', 3),
(3, 'Salum', 'Khamis', 'Ubani', '2023-01-05', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(20) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `roleID` int(11) DEFAULT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `profile` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `password`, `roleID`, `lastLogin`, `profile`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2023-02-01 23:42:24', 'img_admin.png'),
(3, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 2, '2023-02-01 16:03:41', 'a1.jpg'),
(4, 'user2', '7e58d63b60197ceb55a1c487989a3720', 2, '2023-01-30 09:37:25', 'avatar.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`acYearID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `course_schedules`
--
ALTER TABLE `course_schedules`
  ADD PRIMARY KEY (`scheduleID`),
  ADD KEY `acYearID` (`acYearID`),
  ADD KEY `courseID` (`courseID`),
  ADD KEY `semesterID` (`semesterID`),
  ADD KEY `staffID` (`staffID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`semesterID`),
  ADD UNIQUE KEY `semesterName` (`semesterName`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staffID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD KEY `roleID` (`roleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `acYearID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_schedules`
--
ALTER TABLE `course_schedules`
  MODIFY `scheduleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `semesterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_schedules`
--
ALTER TABLE `course_schedules`
  ADD CONSTRAINT `course_schedules_ibfk_1` FOREIGN KEY (`acYearID`) REFERENCES `academic_years` (`acYearID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_schedules_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_schedules_ibfk_3` FOREIGN KEY (`semesterID`) REFERENCES `semesters` (`semesterID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_schedules_ibfk_4` FOREIGN KEY (`staffID`) REFERENCES `staffs` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `staffs_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `roles` (`roleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
