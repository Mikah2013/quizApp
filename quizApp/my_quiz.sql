-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 18, 2019 at 06:14 PM
-- Server version: 5.7.24
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_text` text,
  `default_answer` text NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(150) DEFAULT NULL,
  `quiz_description` text,
  `admin_email` varchar(55) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`quiz_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `respondent`
--

DROP TABLE IF EXISTS `respondent`;
CREATE TABLE IF NOT EXISTS `respondent` (
  `respondent_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`respondent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `score_id` int(11) NOT NULL AUTO_INCREMENT,
  `score` int(11) DEFAULT NULL,
  `question_number` int(11) NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `quiz_name` varchar(255) NOT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`score_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
