-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2021 at 01:54 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `referje0_bagrusareestaging`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `id` int(11) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `project_image` varchar(200) NOT NULL,
  `project_duration` varchar(200) NOT NULL,
  `project_start` datetime(6) NOT NULL,
  `project_end` datetime(6) NOT NULL,
  `project_status` int(11) NOT NULL,
  `project_description` longtext NOT NULL,
  `project_assign` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`id`, `project_name`, `project_image`, `project_duration`, `project_start`, `project_end`, `project_status`, `project_description`, `project_assign`) VALUES
(1, 'HTML to WP', 'images/1623987933.jpg', '7 Days', '2021-06-19 12:00:00.000000', '2021-06-25 12:00:00.000000', 1, '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</span>', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_status`
--

CREATE TABLE `tbl_project_status` (
  `id` int(11) NOT NULL,
  `project_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_project_status`
--

INSERT INTO `tbl_project_status` (`id`, `project_status`) VALUES
(1, 'Development'),
(2, 'Quality Check'),
(3, 'Finish');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `task_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_name` varchar(200) NOT NULL,
  `task_start` datetime(6) NOT NULL,
  `task_end` datetime(6) NOT NULL,
  `task_description` longtext NOT NULL,
  `task_status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`task_id`, `project_id`, `task_name`, `task_start`, `task_end`, `task_description`, `task_status`) VALUES
(2, 3, 'task1', '2021-06-01 12:00:00.000000', '2021-06-25 12:00:00.000000', 'ggt', '1'),
(3, 3, 'task2', '2021-06-15 12:00:00.000000', '2021-06-17 12:00:00.000000', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_fullname` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_created` datetime(6) NOT NULL,
  `user_status` enum('0','1') NOT NULL DEFAULT '0',
  `user_pin` varchar(20) NOT NULL,
  `user_role` set('Administrator','Subscriber') NOT NULL DEFAULT 'Subscriber'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_email`, `user_fullname`, `user_name`, `user_password`, `user_created`, `user_status`, `user_pin`, `user_role`) VALUES
(1, 'admin@mail.com', 'Admin', 'admin', '12345', '2021-06-18 09:18:11.000000', '1', '4838', 'Administrator'),
(2, 'user@mail.com', 'User', 'user', '12345', '2021-06-18 09:18:49.000000', '1', '1883', 'Subscriber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_project_status`
--
ALTER TABLE `tbl_project_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_project_status`
--
ALTER TABLE `tbl_project_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
