-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 11:05 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myclass`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
('admin1', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `choose_course`
--

CREATE TABLE `choose_course` (
  `id` int(10) NOT NULL,
  `courseId` int(10) NOT NULL,
  `studentId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `choose_course`
--

INSERT INTO `choose_course` (`id`, `courseId`, `studentId`) VALUES
(29, 11, 'student1'),
(30, 6, 'student1'),
(31, 6, 'student2');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `section` varchar(2) NOT NULL,
  `time` varchar(20) NOT NULL,
  `roomNo` varchar(10) NOT NULL,
  `capacity` int(3) NOT NULL,
  `count` int(3) DEFAULT 0,
  `teacherId` varchar(10) NOT NULL,
  `fee` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `section`, `time`, `roomNo`, `capacity`, `count`, `teacherId`, `fee`, `status`) VALUES
(3, 'Math 101', 'A', 'Sun 10-12pm', '3113', 40, 40, 'teacher1', 3500, 1),
(5, 'English 101', 'B', 'Mon 10-12pm', '2112', 40, 0, 'teacher2', 2000, 1),
(6, 'Intro to Algo', 'B', 'Tue 10-12pm', '1112', 40, 2, 'teacher1', 3000, 1),
(11, 'Economics 101', 'B', 'Thu 12-2pm', '1121', 40, 1, 'teacher3', 2000, 1),
(12, 'Programming Language 101', 'A', 'Wed 10-12pm', '3323', 40, 0, 'teacher2', 2500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(10) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `courseId` int(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `size` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `filename`, `courseId`, `date`, `size`) VALUES
(26, 'assignment.docx', 3, '2020-04-26 07:55:20', 0.029),
(35, 'assignment.docx', 6, '2020-04-30 15:03:19', 0.029);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(10) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `courseId` int(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `content`, `courseId`, `date`) VALUES
(5, 'Quiz 1 @ sunday', 6, '2020-04-28 01:08:42'),
(6, 'Result published', 6, '2020-04-28 01:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `amount` int(5) NOT NULL,
  `method` varchar(20) NOT NULL,
  `refNo` varchar(50) NOT NULL,
  `courseId` int(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL,
  `studentId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `amount`, `method`, `refNo`, `courseId`, `date`, `status`, `studentId`) VALUES
(32, 2000, 'bKash', '3409509', 6, '2020-04-30 14:53:47', 1, 'student1'),
(33, 2500, 'Upay', '99023902', 5, '2020-04-30 14:55:02', 0, 'student1'),
(34, 3000, 'bKash', '00223293', 6, '2020-04-30 15:01:56', 1, 'student2');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(10) NOT NULL,
  `result` varchar(3) NOT NULL,
  `courseId` int(10) NOT NULL,
  `studentId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `result`, `courseId`, `studentId`) VALUES
(30, 'A', 6, 'student1'),
(31, 'B', 6, 'student2');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(10) NOT NULL,
  `amount` int(5) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL,
  `teacherId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `parentContact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profilePhoto` varchar(50) NOT NULL,
  `valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `password`, `name`, `dept`, `parentContact`, `email`, `profilePhoto`, `valid`) VALUES
('student1', 'aA11!', 'Chris Russel', 'SE', '+3236523231', 's1@mail.com', 'student1.jpg', 1),
('student2', 'aA11!', 'Maria Giles', 'Business', '+23265656', 's2@mail.com', 'student2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `salary` int(6) NOT NULL,
  `profilePhoto` varchar(50) NOT NULL,
  `valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `password`, `name`, `dept`, `qualification`, `email`, `salary`, `profilePhoto`, `valid`) VALUES
('teacher1', 'aA11!', 'Bill Gates', 'CS', 'Phd, Harvard', 't1@mail.com', 100000, 'teacher1.jpg', 1),
('teacher2', 'aA11!', 'Mark Zuck', 'CS', 'Bachelors, Harvard', 't2@mail.com', 80000, 'teacher2.jpg', 1),
('teacher3', 'aA11!', 'Jeff Bezos', 'BBA', 'PhD, Cambridge', 't3@mail.com', 120000, 'teacher3.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choose_course`
--
ALTER TABLE `choose_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choose_course`
--
ALTER TABLE `choose_course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
