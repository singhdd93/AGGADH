-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2014 at 04:00 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dhagga`
--
CREATE DATABASE IF NOT EXISTS `dhagga` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dhagga`;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--
-- Creation: Mar 01, 2014 at 07:52 AM
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches` (
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
-- Creation: Mar 01, 2014 at 07:52 AM
--

DROP TABLE IF EXISTS `branch_sub_map`;
CREATE TABLE `branch_sub_map` (
  `branch_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--
-- Creation: Mar 01, 2014 at 07:52 AM
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE `level` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(255) NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quest_web_tech`
--
-- Creation: Mar 01, 2014 at 07:52 AM
--

DROP TABLE IF EXISTS `quest_web_tech`;
CREATE TABLE `quest_web_tech` (
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
-- Creation: Mar 01, 2014 at 07:52 AM
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
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
-- Creation: Mar 01, 2014 at 07:52 AM
--

DROP TABLE IF EXISTS `sub_topic_map`;
CREATE TABLE `sub_topic_map` (
  `sub_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--
-- Creation: Mar 01, 2014 at 07:52 AM
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
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
-- Creation: Mar 01, 2014 at 07:52 AM
--

DROP TABLE IF EXISTS `users_info`;
CREATE TABLE `users_info` (
  `name` text NOT NULL,
  `dob` date NOT NULL,
  `contact_no` char(13) NOT NULL,
  `sex` char(1) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  UNIQUE KEY `user_name` (`user_name`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_reg`
--
-- Creation: Mar 01, 2014 at 07:52 AM
--

DROP TABLE IF EXISTS `users_reg`;
CREATE TABLE `users_reg` (
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
