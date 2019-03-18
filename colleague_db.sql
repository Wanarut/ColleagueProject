-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 09:13 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `colleague_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_pin`
--

CREATE TABLE `class_pin` (
  `pin` varchar(5) NOT NULL,
  `team_size` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_pin`
--

INSERT INTO `class_pin` (`pin`, `team_size`, `create_date`) VALUES
('1150', 4, '2019-03-17 14:11:01'),
('6342', 5, '2019-03-18 08:03:45'),
('6538', 4, '2019-03-18 08:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `pin` varchar(5) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`pin`, `client_name`, `type`, `join_date`) VALUES
('6342', '590610111', 3, '2019-03-18 08:04:39'),
('1150', '590610123', 1, '2019-03-17 15:04:57'),
('1150', '590610352', 2, '2019-03-18 04:32:38'),
('1150', '590610456', 3, '2019-03-18 04:25:12'),
('1150', '590610485', 4, '2019-03-18 04:32:18'),
('1150', '590610545', 1, '2019-03-17 15:50:56'),
('1150', '590610654', 2, '2019-03-18 04:20:40'),
('1150', '590610655', 3, '2019-03-17 15:19:34'),
('1150', '590610656', 4, '2019-03-17 15:00:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_pin`
--
ALTER TABLE `class_pin`
  ADD PRIMARY KEY (`pin`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
