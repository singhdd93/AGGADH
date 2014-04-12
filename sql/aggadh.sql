-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2014 at 12:13 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `aggadh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`a_id`, `a_username`, `a_password`, `a_name`, `a_dob`, `a_sex`, `a_email`, `a_lastlogin`, `a_since`) VALUES
(1, 'singhdd', '58ba7dfcfc0718df66e940a9d483b7bc', 'Damandeep Singh', '1993-08-03', 'm', 'singh.damandeep@gmail.com', '2013-11-30 00:00:00', '2014-03-16 08:04:46'),
(3, 'gurjot', 'c20b292c025f4ee3dce6bd20da1d0b0a', 'Gurjot Singh', '0000-00-00', 'm', 'bhattigurjot@gmail.com', '0000-00-00 00:00:00', '2014-04-05 08:10:03'),
(5, 'gurwinder', 'd5473c22e8a702280680f8ae54d415b0', 'Gurwinder Singh', '1993-04-29', 'm', 's.gurwindersinghbains@gmail.com', '0000-00-00 00:00:00', '2014-04-09 05:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
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
-- Table structure for table `branch_sub_map`
--

CREATE TABLE `branch_sub_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `branch_sub_map`
--

INSERT INTO `branch_sub_map` (`id`, `branch_id`, `sub_id`) VALUES
(19, 1, 8),
(20, 9, 8),
(21, 1, 9),
(22, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(255) NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_name`) VALUES
(1, 'Easy'),
(2, 'Medium'),
(3, 'Hard');

-- --------------------------------------------------------

--
-- Table structure for table `quest_se`
--

CREATE TABLE `quest_se` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `quest_se`
--

INSERT INTO `quest_se` (`quest_id`, `topic_id`, `quest`, `op_a`, `op_b`, `op_c`, `op_d`, `c_ans`, `level_id`) VALUES
(1, 3, 'The purpose of structured analysis is', 'to define the structure of the solution that is suitable for implementation in some programming language', 'to capture the detailed structure of the system as perceived by the user', 'to define the structure of the problems', 'all of the above', 'b', 1),
(2, 3, 'Structured analysis technique is based on', 'top-down decomposition approach', 'bottom-up approach', 'divide and conquer principle', 'Both A and C', 'd', 1),
(3, 3, 'Data Flow Diagram (DFD) is also known as a:', 'structure chart', 'bubble chart', 'Gantt chart', 'PERT chart', 'b', 2),
(4, 3, 'The context diagram of a DFD is also known as', 'level 0 DFD', 'level 1 DFD', 'level 2 DFD', 'none of the above', 'a', 1),
(5, 3, 'Decomposition of a bubble is also known as', 'classification', 'factoring', 'exploding', 'Both B and C', 'd', 2),
(6, 3, 'Decomposition of a bubble should be carried on', 'till the atomic program instructions are reached', 'upto two levels', 'until a level is reached at which the function of the bubble described using a simple algorithm', 'none of the above', 'c', 2),
(7, 3, 'The bubbles in a level 1 DFD represent', 'exactly one high-level functional requirement described in SRS document', 'more than one high-level functional requirement', 'part of a high-level functional requirement', 'any of the above depending on the problem', 'd', 1),
(8, 3, 'By looking at the structure chart, we can', 'say whether a module calls another module just once or many times', 'not say whether a module calls another module just once or many times ', 'tell the order in which the different modules are invoked', 'not tell the order in which the different modules are invoked ', 'd', 2),
(9, 3, 'In a structure chart, a module represented by a rectangle with double edges is called', 'root module', 'library module', 'primary module', 'none of the above', 'b', 1),
(10, 3, 'A structure chart differs from a flow chart in which of the following ways', 'it is always difficult to identify the different modules of the software from its flow chart representation', 'data interchange among different modules is not presented in a flow chart', 'sequential ordering of tasks inherent in a flow chart is suppressed in a structure chart', 'All Of Above', 'd', 2),
(11, 3, 'The input portion in the DFD that transform input data from physical to logical form is called', 'central transform', 'efferent branch', 'afferent branch', 'none of the above', 'c', 1),
(12, 3, 'If during structured design you observe that the data entering a DFD are incident on different bubbles, then you would use:', 'transform analysis ', 'transaction analysis', 'combination of transform and transaction analysis', 'neither transform nor transaction analysis', 'b', 2),
(13, 3, 'Which of the following types of bubbles may belong to the central transform ?', 'input validation', 'sorting input', 'filtering data', 'Both B and C', 'd', 1),
(14, 3, 'During detailed design which of the following activities take place?', 'the pseudo code for the different modules of the structure chart are developed in the form of MSPECs', 'data structures are designed for the different modules of the structure char', 'module structure is designed', 'Both A and B', 'd', 2),
(15, 3, 'The context diagram of a system represents it using more than one bubble.', 'True', 'False', 'May be', 'none of the above', 'b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quest_wt`
--

CREATE TABLE `quest_wt` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `quest_wt`
--

INSERT INTO `quest_wt` (`quest_id`, `topic_id`, `quest`, `op_a`, `op_b`, `op_c`, `op_d`, `c_ans`, `level_id`) VALUES
(1, 1, 'What is the previous version of HTML, prior to HTML5?', 'HTML 4.1', 'HTML 4.9', 'HTML 4.01', 'HTML 4', 'c', 1),
(2, 1, 'What does HTML stands for?', 'Hyper Text Markup Language', 'Home Tool Markup Language', 'Hyper Text and Markup Language', 'Non of these', 'a', 1),
(3, 1, 'Who is making Web Standards', 'World Wid Web Consortium', 'Microsoft', 'Modzilla', 'Google', 'a', 1),
(4, 1, 'The Semantic Elements are', '<form>', '<table>', '<img>', 'All Of Above', 'd', 1),
(5, 1, 'The element defines a set of navigation links is', '<nav>', '<navi>', '<href>', 'None Of Above', 'a', 1),
(6, 1, ' Tag/s specifies self-contained contents', '<figure>', '<fig>', '<figcaption>', 'Both A and C', 'd', 1),
(7, 1, 'Which is not a semantic element', '<article>', '<aside>', '<nav>', '<span>', 'd', 1),
(8, 1, 'Which defines an input control', '<input>', 'date', 'color', 'None of these', 'a', 1),
(9, 1, 'Which element specifies a list of pre-defined options for an <input> element', '<datalist> ', '<dl>', '<data>', 'Both B and C', 'a', 2),
(10, 1, ' To provide a secure way to authenticate users, element used is', '<keygen>', '<check>', '<key>', '<secure>', 'a', 2),
(11, 1, 'To specifies that an input field must be filled out before submitting the form. attribute used is', 'must', 'required', 'step', 'None Of Above', 'b', 2),
(12, 1, 'What is canvas', ' image', 'specific area', 'a rectangular area', 'All Of Above', 'c', 2),
(13, 1, 'Which corner is origin for canvas', 'upper-right', 'upper-left', 'lower-left', 'lower-right', 'b', 2),
(14, 1, 'What is SVG', 'Standard Vector Graphics', 'Standard Visual Graphics', 'Scalable Visual Graphics', ' Scalable Vector Graphics', 'd', 2),
(15, 1, 'Which one is incorrect', 'Canvas is Resolution dependent', 'SVG is not suited for game applications', 'Canvas support for event handlers', 'Canvas have poor text rendering capabilities', 'c', 3),
(16, 1, 'MIME Types for Video Formats in HTML5', 'video/mp4', 'video/webm', 'video/ogg', 'All Of Above', 'd', 2),
(17, 1, ' HTML5 Geolocation API is used to get', 'graphical position of a user.', 'geographical position of a user.', 'mouse pointer position', 'None of these', 'b', 3),
(18, 1, 'Attribute used to make an element draggable', 'drag', 'draggable', 'Drop', 'None Of Above', 'b', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
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
-- Table structure for table `sub_topic_map`
--

CREATE TABLE `sub_topic_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sub_topic_map`
--

INSERT INTO `sub_topic_map` (`id`, `sub_id`, `topic_id`) VALUES
(1, 8, 1),
(2, 8, 2),
(3, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(255) NOT NULL,
  `topic_slug` varchar(255) NOT NULL,
  PRIMARY KEY (`topic_id`),
  UNIQUE KEY `topic_slug` (`topic_slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_name`, `topic_slug`) VALUES
(1, 'HTML5', 'html5'),
(2, 'PHP', 'php'),
(3, 'Function-Oriented Software Design', 'fosdesign');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `name` text NOT NULL,
  `dob` date NOT NULL,
  `contact_no` char(13) NOT NULL,
  `sex` char(1) NOT NULL,
  `profile_id` bigint(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `branch_id` int(10) NOT NULL,
  UNIQUE KEY `user_name` (`user_name`),
  KEY `branch_id` (`branch_id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`name`, `dob`, `contact_no`, `sex`, `profile_id`, `user_name`, `branch_id`) VALUES
('Gurjot Bhatti', '1994-04-29', '9478620233', 'm', 55679487, 'bhattigurjot', 1),
('Damandeep Singh', '1993-08-03', '9988006655', 'm', 29797652, 'singhdd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_reg`
--

CREATE TABLE `users_reg` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users_reg`
--

INSERT INTO `users_reg` (`id`, `email`, `password`, `profile_id`, `confirm_code`, `is_active`, `reg_time`) VALUES
(1, 'contact@singhdd.com', '5c02a0a65de5ac1ae1a880c6fefb15b0cfff425c3f5e1208686389f2f49110bb93a93863', 29797652, 'confirmed', 1, '2014-04-07 12:41:32'),
(2, 'singh_dd93@yahoo.in', 'b2fa99bb18eb36b582132835d6cd50d3f63bc51ab05001137e52b2701b637a5e1521ca7f', 89237736, 'confirmed', 1, '2014-04-07 13:17:27'),
(3, 'bhattigurjot@gmail.com', '3f5acec98bd2deee8fe9c0ee359210756bfdff946c7ceff909a9e5b9843d6fd5babd620e', 55679487, 'confirmed', 1, '2014-04-08 02:18:56');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_info`
--
ALTER TABLE `users_info`
  ADD CONSTRAINT `users_info_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`),
  ADD CONSTRAINT `usr_reg_pid_to_user_info_pid` FOREIGN KEY (`profile_id`) REFERENCES `users_reg` (`profile_id`);
