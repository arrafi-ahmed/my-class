-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2020 at 10:04 AM
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
-- Database: `coaching`
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
(1, 3, 'student1'),
(3, 5, 'student2'),
(4, 3, 'student2');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `section` varchar(2) NOT NULL,
  `time` varchar(20) NOT NULL,
  `roomNo` varchar(10) NOT NULL,
  `capacity` int(3) NOT NULL,
  `teacherId` varchar(10) NOT NULL,
  `fee` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `section`, `time`, `roomNo`, `capacity`, `teacherId`, `fee`, `status`) VALUES
(3, 'Intro to Math', 'A', 'Sun 10-12pm', '3112', 40, 'teacher1', 1500, 1),
(5, 'Intro to English', 'B', 'Thu 9.30 am', '1101', 30, 'teacher1', 2000, 0),
(6, 'Intro to Algo', 'C', 'Mon 3pm', '2112', 45, 'teacher2', 3000, 1);

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
(24, 'assignment.docx', 3, '2020-04-14 15:37:48', 0.029),
(25, 'Tour management system.doc', 3, '2020-04-14 15:38:10', 0.018);

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
(3, 'adsfasdf', 3, '2020-04-14 12:25:20'),
(4, 'Idfdsfdsf', 3, '2020-04-14 12:31:05');

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
(1, 3000, 'bKash', '98987889797', 6, '2020-04-16 23:42:42', 1, 'student1'),
(2, 3000, 'bKash', '98987889790', 6, '2020-04-16 23:46:45', 1, 'student1'),
(3, 2500, 'Upay', '009898767', 6, '2020-04-16 23:54:03', 1, 'student1'),
(4, 500, 'Upay', '7887979', 6, '2020-04-17 00:40:44', 0, 'student1'),
(5, 300, 'Upay', '686869797', 6, '2020-04-18 13:40:43', 0, 'student1'),
(6, 300, 'Upay', '686869797', 6, '2020-04-18 13:42:23', 0, 'student1'),
(7, 300, 'Upay', '686869797', 6, '2020-04-18 13:42:28', 1, 'student1');

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
(4, 'A', 3, 'student1'),
(28, 'B', 3, 'student2');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(10) NOT NULL,
  `amount` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL,
  `teacherId` int(10) NOT NULL
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
('student1', 'asdf', 'Chris Russel', 'CSE', '+323652323', 's1@mail.com', 'student1.jpg', 1),
('student2', 'asdf', 'Maria Giles', 'Business', '+23265656', 's2@mail.com', 'student2.jpg', 1);

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
  `profilePhoto` varchar(50) NOT NULL,
  `valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `password`, `name`, `dept`, `qualification`, `email`, `profilePhoto`, `valid`) VALUES
('teacher1', 'asdf', 'Bill Gates', 'CSE', 'Phd, Harvard', 't1@mail.com', 'teacher1.jpg', 1),
('teacher2', 'asdf', 'Mark Zuck', 'CS', 'Bachelors, Harvard', 't2@mail.com', 'teacher2.jpg', 1);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
