-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2018 at 03:03 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autograder`
--

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `problemId` int(5) NOT NULL,
  `problemTitle` text NOT NULL,
  `problemDescription` text NOT NULL,
  `inputFile` blob NOT NULL,
  `checkerFile` blob NOT NULL,
  `timeLimit` int(5) NOT NULL,
  `memoryLimit` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`problemId`, `problemTitle`, `problemDescription`, `inputFile`, `checkerFile`, `timeLimit`, `memoryLimit`) VALUES
(2, 'Quick sort', 'Write a c program that uses quick algorithm to sort ', 0x433a77616d703634096d70706870394144362e746d70, 0x433a77616d703634096d70706870394145372e746d70, 324, 43),
(1, 'Binary sort', 'Write a c program that uses biary algorithm to sort ', 0x433a77616d703634096d70706870334545392e746d70, 0x433a77616d703634096d70706870334545412e746d70, 324, 43),
(0, 'Fibonacci', 'write a java program that prints out the first 10 fibonacci numbers', 0x433a77616d703634096d70706870393130382e746d70, 0x433a77616d703634096d70706870393132382e746d70, 4545, 543);

-- --------------------------------------------------------

--
-- Table structure for table `studentsubmissions`
--

CREATE TABLE `studentsubmissions` (
  `email` varchar(30) NOT NULL,
  `problemId` int(5) NOT NULL,
  `submission` varchar(10) NOT NULL,
  `result` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentsubmissions`
--

INSERT INTO `studentsubmissions` (`email`, `problemId`, `submission`, `result`) VALUES
('s1@gmail.com', 2, 's2', 'r2'),
('s@gmail.com', 2, 's2', 'r2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `secondName` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `firstName`, `secondName`, `password`, `role`) VALUES
('sendimarvin1@gmail.com', 'Marvin', 'Sendikaddiwa', 'Aurora1!', 'student'),
('a@gmail.com', 'a', 'a', 'a', 'admin'),
('s@gmail.com', 's', 's', 's', 'student'),
('s1@gmail.com', 'Augustine', 'Abule', 's1', NULL),
('s3@gmail.co2', 'Isaac', 'Owomugisha', 's3', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`problemId`);

--
-- Indexes for table `studentsubmissions`
--
ALTER TABLE `studentsubmissions`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
