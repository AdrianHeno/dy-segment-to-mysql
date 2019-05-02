-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2019 at 12:32 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `segment`
--

-- --------------------------------------------------------

--
-- Table structure for table `geofence`
--

CREATE TABLE `geofence` (
  `id` int(11) NOT NULL,
  `roaming_request_id` varchar(255) DEFAULT NULL,
  `run_id` varchar(255) DEFAULT NULL,
  `shift_id` varchar(255) DEFAULT NULL,
  `event_type` varchar(255) NOT NULL,
  `event_timestamp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `geofence`
--

INSERT INTO `geofence` (`id`, `roaming_request_id`, `run_id`, `shift_id`, `event_type`, `event_timestamp`) VALUES
(1, '73e5fbd5-a967-4414-b3d3-165ba65b8d9d', 'ca526388-8420-4119-a2b6-09287c580726', 'null', 'exitInnerFence', '2019-05-02T03:19:05.398Z');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `geofence`
--
ALTER TABLE `geofence`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `geofence`
--
ALTER TABLE `geofence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
