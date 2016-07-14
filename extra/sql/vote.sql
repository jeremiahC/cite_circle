-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2016 at 12:15 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cite_circle`
--

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `voted_status_id` int(11) NOT NULL,
  `status_user_id` int(11) NOT NULL,
  `vote_user_id` int(11) NOT NULL,
  `vote_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD UNIQUE KEY `voted_status_id` (`voted_status_id`,`vote_user_id`), ADD UNIQUE KEY `voted_status_id_2` (`voted_status_id`,`vote_user_id`,`vote_count`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
