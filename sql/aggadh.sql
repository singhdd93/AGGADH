-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2014 at 02:01 PM
-- Server version: 5.5.34-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aggadh`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--
-- Creation: Mar 03, 2014 at 08:31 AM
--

CREATE TABLE IF NOT EXISTS `branches` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(255) NOT NULL,
  `bn_slug` varchar(255) NOT NULL,
  PRIMARY KEY (`branch_id`),
  UNIQUE KEY `bn_slug` (`bn_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `branch_sub_map`
--
-- Creation: Mar 03, 2014 at 08:31 AM
--

CREATE TABLE IF NOT EXISTS `branch_sub_map` (
  `branch_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--
-- Creation: Mar 03, 2014 at 08:31 AM
--

CREATE TABLE IF NOT EXISTS `level` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(255) NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quest_web_tech`
--
-- Creation: Mar 03, 2014 at 08:31 AM
--

CREATE TABLE IF NOT EXISTS `quest_web_tech` (
  `quest_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `quest` text NOT NULL,
  `op_a` text NOT NULL,
  `op_b` text NOT NULL,
  `op_c` text NOT NULL,
  `op_d` text NOT NULL,
  `c_ans` char(1) NOT NULL,
  `level_id` int(11) NOT NULL,
  PRIMARY KEY (`quest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--
-- Creation: Mar 03, 2014 at 08:31 AM
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(255) NOT NULL,
  `sub_slug` varchar(255) NOT NULL,
  PRIMARY KEY (`sub_id`),
  UNIQUE KEY `sub_slug` (`sub_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sub_topic_map`
--
-- Creation: Mar 03, 2014 at 08:31 AM
--

CREATE TABLE IF NOT EXISTS `sub_topic_map` (
  `sub_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--
-- Creation: Mar 03, 2014 at 08:31 AM
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(255) NOT NULL,
  `topic_slug` varchar(255) NOT NULL,
  PRIMARY KEY (`topic_id`),
  UNIQUE KEY `topic_slug` (`topic_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--
-- Creation: Mar 03, 2014 at 08:31 AM
--

CREATE TABLE IF NOT EXISTS `users_info` (
  `name` text NOT NULL,
  `dob` date NOT NULL,
  `contact_no` char(13) NOT NULL,
  `sex` char(1) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  UNIQUE KEY `user_name` (`user_name`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `users_info`:
--   `profile_id`
--       `users_reg` -> `profile_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_reg`
--
-- Creation: Mar 03, 2014 at 08:31 AM
--

CREATE TABLE IF NOT EXISTS `users_reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `profile_id` int(11) NOT NULL,
  `confirm_code` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`profile_id`),
  KEY `profile_id` (`profile_id`),
  KEY `profile_id_2` (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_info`
--
ALTER TABLE `users_info`
  ADD CONSTRAINT `link_pid_of_reg_to_info` FOREIGN KEY (`profile_id`) REFERENCES `users_reg` (`profile_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
