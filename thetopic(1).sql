-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2024 at 12:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thetopic`
--

-- --------------------------------------------------------

--
-- Table structure for table `contribute`
--

CREATE TABLE `contribute` (
  `contribute_id` int(11) NOT NULL,
  `like_contribution` varchar(222) NOT NULL,
  `user_id` varchar(222) NOT NULL,
  `contribution` varchar(300) NOT NULL,
  `contribution_img` varchar(255) NOT NULL,
  `topic_id` varchar(225) NOT NULL,
  `mark_viewed` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contribute`
--

INSERT INTO `contribute` (`contribute_id`, `like_contribution`, `user_id`, `contribution`, `contribution_img`, `topic_id`, `mark_viewed`) VALUES
(1, '1', '1', 'hello', '', '1', '1'),
(2, '1', '1', 'hello guys', '', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `creat_topic`
--

CREATE TABLE `creat_topic` (
  `topic_id` int(11) NOT NULL,
  `user_id` varchar(222) NOT NULL,
  `topic` varchar(222) NOT NULL,
  `topic_img` varchar(255) NOT NULL,
  `topic_search_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `creat_topic`
--

INSERT INTO `creat_topic` (`topic_id`, `user_id`, `topic`, `topic_img`, `topic_search_code`) VALUES
(1, '1', 'elite', '', 'TOP_1IC7135');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_time` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `user_name`, `password`, `date_time`) VALUES
(1, 'kehinde', 'kehinde', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contribute`
--
ALTER TABLE `contribute`
  ADD PRIMARY KEY (`contribute_id`);

--
-- Indexes for table `creat_topic`
--
ALTER TABLE `creat_topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contribute`
--
ALTER TABLE `contribute`
  MODIFY `contribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `creat_topic`
--
ALTER TABLE `creat_topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
