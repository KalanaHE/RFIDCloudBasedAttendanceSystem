-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2019 at 09:51 AM
-- Server version: 5.5.64-MariaDB
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendanceSysDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_attendance`
--

CREATE TABLE IF NOT EXISTS `user_attendance` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `allow` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_attendance`
--

INSERT INTO `user_attendance` (`id`, `userid`, `allow`, `timestamp`) VALUES
(1, '222168217115', 0, '2019-10-04 02:54:27'),
(2, '17121543', 1, '2019-10-04 03:00:06'),
(3, '222168217115', 0, '2019-10-04 03:01:22'),
(4, '17121543', 1, '2019-10-04 03:01:26'),
(5, '222168217115', 0, '2019-10-04 03:18:54'),
(6, '222168217115', 0, '2019-10-04 03:19:12'),
(7, '222168217115', 0, '2019-10-04 03:19:19'),
(8, '17121543', 1, '2019-10-04 03:19:23'),
(9, '222168217115', 0, '2019-10-04 03:20:09'),
(10, '222168217115', 0, '2019-10-04 03:20:18'),
(11, '222168217115', 0, '2019-10-04 03:20:23'),
(12, '222168217115', 0, '2019-10-04 03:20:27'),
(13, '222168217115', 0, '2019-10-04 03:20:32'),
(14, '17121543', 1, '2019-10-04 03:20:36'),
(15, '17121543', 1, '2019-10-04 03:20:50'),
(16, '17121543', 1, '2019-10-04 03:36:02'),
(17, '17121543', 1, '2019-10-04 03:37:08'),
(18, '222168217115', 0, '2019-10-04 04:00:45'),
(19, '222168217115', 0, '2019-10-04 04:01:30'),
(20, '222168217115', 0, '2019-10-04 04:12:07'),
(21, '222168217115', 0, '2019-10-04 04:19:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_attendance`
--
ALTER TABLE `user_attendance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_attendance`
--
ALTER TABLE `user_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
