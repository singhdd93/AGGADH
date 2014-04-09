-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2014 at 02:47 PM
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
CREATE DATABASE `aggadh` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `aggadh`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `a_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `a_username` varchar(255) NOT NULL,
  `a_password` text NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_dob` date NOT NULL,
  `a_sex` varchar(1) NOT NULL,
  `a_email` text NOT NULL,
  `a_lastlogin` datetime NOT NULL,
  `a_since` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`a_id`),
  UNIQUE KEY `a_username` (`a_username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`a_id`, `a_username`, `a_password`, `a_name`, `a_dob`, `a_sex`, `a_email`, `a_lastlogin`, `a_since`) VALUES
(1, 'singhdd', '58ba7dfcfc0718df66e940a9d483b7bc', 'Damandeep Singh', '1993-08-03', 'm', 'singh.damandeep@gmail.com', '2013-11-30 00:00:00', '2014-03-16 08:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `branch_sub_map`
--

CREATE TABLE IF NOT EXISTS `branch_sub_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `branch_sub_map`
--

INSERT INTO `branch_sub_map` (`id`, `branch_id`, `sub_id`) VALUES
(19, 1, 8),
(20, 9, 8),
(21, 1, 9),
(22, 2, 9),
(23, 1, 0),
(24, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(255) NOT NULL,
  `bn_slug` varchar(255) NOT NULL,
  PRIMARY KEY (`branch_id`),
  UNIQUE KEY `bn_slug` (`bn_slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_name`, `bn_slug`) VALUES
(1, 'Computer Science Engineering', 'computerscience'),
(2, 'Electronics Engineering', 'electronics'),
(5, 'Electrical Engineering', 'electrical'),
(6, 'Mechanical Engineering', 'mech'),
(7, 'Civil Engineering', 'civil'),
(8, 'Production Engineering', 'production'),
(9, 'Information Technology', 'it');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(255) NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_name`) VALUES
(1, 'Easy');

-- --------------------------------------------------------

--
-- Table structure for table `quest_se`
--

CREATE TABLE IF NOT EXISTS `quest_se` (
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
-- Table structure for table `quest_wt`
--

CREATE TABLE IF NOT EXISTS `quest_wt` (
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
-- Table structure for table `sub_topic_map`
--

CREATE TABLE IF NOT EXISTS `sub_topic_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sub_topic_map`
--

INSERT INTO `sub_topic_map` (`id`, `sub_id`, `topic_id`) VALUES
(2, 8, 104);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(255) NOT NULL,
  `sub_slug` varchar(255) NOT NULL,
  PRIMARY KEY (`sub_id`),
  UNIQUE KEY `sub_slug` (`sub_slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `sub_name`, `sub_slug`) VALUES
(8, 'Web Technologies', 'wt'),
(9, 'Software Engineering', 'se');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(255) NOT NULL,
  `topic_slug` varchar(255) NOT NULL,
  PRIMARY KEY (`topic_id`),
  UNIQUE KEY `topic_slug` (`topic_slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_name`, `topic_slug`) VALUES
(101, 'HTML', 'html'),
(104, 'php', 'php');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE IF NOT EXISTS `users_info` (
  `name` text NOT NULL,
  `dob` date NOT NULL,
  `contact_no` char(13) NOT NULL,
  `sex` char(1) NOT NULL,
  `profile_id` bigint(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `branch_id` int(10) NOT NULL,
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `branch_id` (`branch_id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_reg`
--

CREATE TABLE IF NOT EXISTS `users_reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `profile_id` bigint(11) NOT NULL,
  `confirm_code` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `profile_id` (`profile_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_info`
--
ALTER TABLE `users_info`
  ADD CONSTRAINT `users_info_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`),
  ADD CONSTRAINT `usr_reg_pid_to_user_info_pid` FOREIGN KEY (`profile_id`) REFERENCES `users_reg` (`profile_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
