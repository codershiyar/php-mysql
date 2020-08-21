-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2020 at 10:16 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shiygtjs_academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `img`, `link`) VALUES
(1, 'Master HTML', '', 'https://www.youtube.com/playlist?list=PLMTdZ61eBnyrnapIyOphXAkIcR5DDOGkz'),
(2, 'Master CSS', '', 'https://www.youtube.com/playlist?list=PLMTdZ61eBnyoxjc9Prw0uhwgp6YZ2-_sg'),
(3, 'Bootstrap 4', '', 'https://www.youtube.com/playlist?list=PLMTdZ61eBnyrPiX-b1MNG-MSPAJ0OgpHA'),
(4, 'Master JavaScript Development', '', 'https://www.youtube.com/playlist?list=PLMTdZ61eBnyp1nMM8mGRzpwuu6FNxFy0D'),
(5, 'Master PHP web development', '', 'https://www.youtube.com/playlist?list=PLMTdZ61eBnypZGBMDMGYI48WfZEyAgQK_'),
(6, 'Master Java Development', '', 'https://www.youtube.com/playlist?list=PLMTdZ61eBnyol1gLHHgsiQbcOayNljG4_'),
(7, 'Master Android Developer', '', 'https://www.youtube.com/playlist?list=PLMTdZ61eBnypdGHUkZ3f52wTDRywLQo4l'),
(8, 'SQL - MySQL', '', 'https://www.youtube.com/playlist?list=PLMTdZ61eBnyoQoEmLOcgTBdrAOVT-GFju'),
(9, 'PHP - MYSQL', '', 'https://www.youtube.com/watch?v=y5vMI7Nicyk&list=PLMTdZ61eBnypZGBMDMGYI48WfZEyAgQK_&index=60');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
