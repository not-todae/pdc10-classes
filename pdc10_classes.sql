-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 04:13 PM
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
-- Database: `pdc10_classes`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `class_code` varchar(20) NOT NULL,
  `employee_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `description`, `class_code`, `employee_number`) VALUES
(17, 'Professional Elective 2', 'Professional Elective 2 ito ni ', 'ITE20', '20-20-20'),
(19, 'Professional Domain Course 10', 'Professional Domain Course 10 sample', 'PDC10', '20-20-20');

-- --------------------------------------------------------

--
-- Table structure for table `class_rosters`
--

CREATE TABLE `class_rosters` (
  `id` int(11) NOT NULL,
  `class_code` varchar(20) NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `enrolled_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_rosters`
--

INSERT INTO `class_rosters` (`id`, `class_code`, `student_number`, `enrolled_at`) VALUES
(1, 'ITE20', '20-1441-991', '2022-10-28 04:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `student_number`, `email`, `contact_number`, `program`) VALUES
(74, 'David', 'Echon', '20-1441-991', 'echon.davidaaron@auf.edu.ph', '+63928476170', 'BSCS'),
(75, 'Sample', 'Sample', '20-1312-123', 'sample@sample.com', '+63978945216', 'BSIT');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `employee_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `email`, `contact_number`, `employee_number`) VALUES
(24, 'Dan', 'Renato', 'renato.dan@auf.edu.ph', '+63689914898', '20-20-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_code` (`class_code`,`employee_number`),
  ADD KEY `employee_number` (`employee_number`);

--
-- Indexes for table `class_rosters`
--
ALTER TABLE `class_rosters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_code` (`class_code`),
  ADD KEY `student_number` (`student_number`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_number` (`student_number`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_number` (`employee_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `class_rosters`
--
ALTER TABLE `class_rosters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`employee_number`) REFERENCES `teachers` (`employee_number`);

--
-- Constraints for table `class_rosters`
--
ALTER TABLE `class_rosters`
  ADD CONSTRAINT `class_rosters_ibfk_1` FOREIGN KEY (`student_number`) REFERENCES `students` (`student_number`),
  ADD CONSTRAINT `class_rosters_ibfk_2` FOREIGN KEY (`class_code`) REFERENCES `classes` (`class_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
