-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2016 at 10:55 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
-- Table structure for table `aauth_groups`
--

CREATE TABLE IF NOT EXISTS `aauth_groups` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_groups`
--

INSERT INTO `aauth_groups` (`id`, `name`, `definition`) VALUES
(1, 'Admin', 'Super Admin Group'),
(2, 'Public', 'Public Access Group'),
(3, 'Default', 'Default Access Group'),
(4, 'School', 'School Admin Group');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perms`
--

CREATE TABLE IF NOT EXISTS `aauth_perms` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perm_to_group`
--

CREATE TABLE IF NOT EXISTS `aauth_perm_to_group` (
  `perm_id` int(11) unsigned NOT NULL DEFAULT '0',
  `group_id` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perm_to_user`
--

CREATE TABLE IF NOT EXISTS `aauth_perm_to_user` (
  `perm_id` int(11) unsigned NOT NULL DEFAULT '0',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_pms`
--

CREATE TABLE IF NOT EXISTS `aauth_pms` (
`id` int(11) unsigned NOT NULL,
  `sender_id` int(11) unsigned NOT NULL,
  `receiver_id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_system_variables`
--

CREATE TABLE IF NOT EXISTS `aauth_system_variables` (
`id` int(11) unsigned NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_users`
--

CREATE TABLE IF NOT EXISTS `aauth_users` (
`id` int(11) unsigned NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `name` varchar(100) NOT NULL,
  `banned` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `last_login_attempt` datetime DEFAULT NULL,
  `forgot_exp` text,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text,
  `verification_code` text,
  `totp_secret` varchar(16) DEFAULT NULL,
  `ip_address` text,
  `login_attempts` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_users`
--

INSERT INTO `aauth_users` (`id`, `email`, `pass`, `name`, `banned`, `last_login`, `last_activity`, `last_login_attempt`, `forgot_exp`, `remember_time`, `remember_exp`, `verification_code`, `totp_secret`, `ip_address`, `login_attempts`) VALUES
(1, 'chevy@gmail.com', '8b235284a9f7a82364468e52dab386f33844421b481113794e0b4d634c86d0f3', 'chevy', 0, '2016-06-03 07:34:47', '2016-06-03 07:34:47', '2016-06-03 07:00:00', NULL, '2016-06-06 00:00:00', 'KzckP4Jwtjq5IBRu', NULL, NULL, '::1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `aauth_user_profile`
--

CREATE TABLE IF NOT EXISTS `aauth_user_profile` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_picture` varchar(100) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `age` int(255) DEFAULT NULL,
  `contact_number` int(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aauth_user_profile`
--

INSERT INTO `aauth_user_profile` (`id`, `user_id`, `user_picture`, `firstname`, `lastname`, `birthday`, `age`, `contact_number`, `address`, `gender`) VALUES
(1, 1, NULL, 'gwapo ko', 'banico', '0000-00-00', 24, 2147483647, 'bbb', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_user_to_group`
--

CREATE TABLE IF NOT EXISTS `aauth_user_to_group` (
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `group_id` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_user_to_group`
--

INSERT INTO `aauth_user_to_group` (`user_id`, `group_id`) VALUES
(1, 1),
(1, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3);

-- --------------------------------------------------------

--
-- Table structure for table `aauth_user_variables`
--

CREATE TABLE IF NOT EXISTS `aauth_user_variables` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(10000) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status_comments`
--

CREATE TABLE IF NOT EXISTS `status_comments` (
`comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `time` varchar(100) NOT NULL,
  `cmt_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aauth_groups`
--
ALTER TABLE `aauth_groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_perms`
--
ALTER TABLE `aauth_perms`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_perm_to_group`
--
ALTER TABLE `aauth_perm_to_group`
 ADD PRIMARY KEY (`perm_id`,`group_id`);

--
-- Indexes for table `aauth_perm_to_user`
--
ALTER TABLE `aauth_perm_to_user`
 ADD PRIMARY KEY (`perm_id`,`user_id`);

--
-- Indexes for table `aauth_pms`
--
ALTER TABLE `aauth_pms`
 ADD PRIMARY KEY (`id`), ADD KEY `full_index` (`id`,`sender_id`,`receiver_id`,`date_read`);

--
-- Indexes for table `aauth_system_variables`
--
ALTER TABLE `aauth_system_variables`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_users`
--
ALTER TABLE `aauth_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_user_profile`
--
ALTER TABLE `aauth_user_profile`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_id` (`user_id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `aauth_user_to_group`
--
ALTER TABLE `aauth_user_to_group`
 ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indexes for table `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id_index` (`user_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`status_id`), ADD UNIQUE KEY `status_id_2` (`status_id`), ADD KEY `status_id` (`status_id`), ADD KEY `status_id_3` (`status_id`), ADD KEY `status_id_4` (`status_id`), ADD KEY `status_id_5` (`status_id`);

--
-- Indexes for table `status_comments`
--
ALTER TABLE `status_comments`
 ADD PRIMARY KEY (`comment_id`), ADD UNIQUE KEY `comment_id` (`comment_id`), ADD KEY `cmt_status_id` (`cmt_status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aauth_groups`
--
ALTER TABLE `aauth_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `aauth_perms`
--
ALTER TABLE `aauth_perms`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aauth_pms`
--
ALTER TABLE `aauth_pms`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aauth_system_variables`
--
ALTER TABLE `aauth_system_variables`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aauth_users`
--
ALTER TABLE `aauth_users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `aauth_user_profile`
--
ALTER TABLE `aauth_user_profile`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status_comments`
--
ALTER TABLE `status_comments`
MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
