-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2016 at 07:25 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `virtual_learner`
--
CREATE DATABASE `virtual_learner` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `virtual_learner`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Email` varchar(50) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Role` varchar(4) NOT NULL DEFAULT 'RL01',
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `Password`, `Role`) VALUES
('adamx@yahoo.com', 'adamx', 'RL01');

--
-- Triggers `admin`
--
DROP TRIGGER IF EXISTS `trg_login_admin`;
DELIMITER //
CREATE TRIGGER `trg_login_admin` AFTER INSERT ON `admin`
 FOR EACH ROW begin
insert into userlogins (email,password,role)
values (new.email, new.password, new.role);
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `CourseId` varchar(10) NOT NULL,
  `CourseName` text NOT NULL,
  `Description` varchar(250) NOT NULL,
  PRIMARY KEY (`CourseId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseId`, `CourseName`, `Description`) VALUES
('EEE321', 'Robotics', '<p>dfdc vhcgc vghcdgchg nkjgjvhj jfdcfvjb bjfyhvbfc frsrxfdx cdresredc gtydtrstrujb vuyfytfklkn vytdtrsers jytdrdsr vhytydcyv lknlhufy cdzesrb vghcytk vgfxrezsb hcxxgchc &nbsp;kgyuvjb &nbsp;</p>\r\n'),
('MIS221', '<p>Mgmt Info Sys</p>\r\n', 'ndknc dkcndkjcn djcnjkcndc dicndkjcndc dcdncjd vbn kjdncd vdnjvndkjvn ffnnknvkjv djjkvvn knkvnv ');

-- --------------------------------------------------------

--
-- Table structure for table `download_manager`
--

CREATE TABLE IF NOT EXISTS `download_manager` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `downloads` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `filename` (`filename`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `download_manager`
--


-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE IF NOT EXISTS `lecturers` (
  `FirstName` varchar(15) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `CourseId` varchar(25) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Role` varchar(4) NOT NULL DEFAULT 'RL02',
  PRIMARY KEY (`Email`),
  KEY `CourseId` (`CourseId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`FirstName`, `LastName`, `Email`, `CourseId`, `Password`, `Role`) VALUES
('nhbvhfb', 'hfvubvi', 'lec@yahoo.com', 'EEE321', 'lec', 'RL02');

--
-- Triggers `lecturers`
--
DROP TRIGGER IF EXISTS `trg_login`;
DELIMITER //
CREATE TRIGGER `trg_login` AFTER INSERT ON `lecturers`
 FOR EACH ROW begin
insert into userlogins (email,password,role)
values (new.email, new.password, new.role);
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `trgupd`;
DELIMITER //
CREATE TRIGGER `trgupd` AFTER UPDATE ON `lecturers`
 FOR EACH ROW begin
insert into userlogins (email,password,role)
values (new.email, new.password, new.role);
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `MaterialId` int(9) NOT NULL AUTO_INCREMENT,
  `FilePath` varchar(250) NOT NULL,
  `FileName` varchar(20) NOT NULL,
  `CourseId` varchar(10) NOT NULL,
  PRIMARY KEY (`MaterialId`),
  KEY `CourseId` (`CourseId`),
  KEY `CourseId_2` (`CourseId`),
  KEY `CourseId_3` (`CourseId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`MaterialId`, `FilePath`, `FileName`, `CourseId`) VALUES
(4, 'C:/wamp/www/Graduation/Material/1441182249', 'jbvbjrh', 'EEE321'),
(5, 'C:/wamp/www/Graduation/Material/1459328209', 'dhth', 'EEE321');

-- --------------------------------------------------------

--
-- Table structure for table `myfiles`
--

CREATE TABLE IF NOT EXISTS `myfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fichier` varchar(255) NOT NULL,
  `CourseId` varchar(10) NOT NULL,
  `downloads` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `CourseId` (`CourseId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `myfiles`
--

INSERT INTO `myfiles` (`id`, `fichier`, `CourseId`, `downloads`) VALUES
(5, 'photoShoot-1.0.zip', 'EEE321', 0),
(6, 'Document.doc', 'EEE321', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registercourses`
--

CREATE TABLE IF NOT EXISTS `registercourses` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `CourseId` varchar(10) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Email` (`Email`),
  KEY `CourseId` (`CourseId`),
  KEY `CourseId_2` (`CourseId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `registercourses`
--

INSERT INTO `registercourses` (`Id`, `Email`, `CourseId`) VALUES
(27, 'e@yahoo.com', 'MIS221'),
(28, 'e@yahoo.com', 'EEE321');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `RoleId` varchar(15) NOT NULL,
  `RoleName` varchar(50) NOT NULL,
  PRIMARY KEY (`RoleId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RoleId`, `RoleName`) VALUES
('RL01', 'Administrator'),
('RL02', 'Lecturer'),
('RL03', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `Email` varchar(50) NOT NULL,
  `FirstName` varchar(15) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Role` varchar(4) NOT NULL DEFAULT 'RL03',
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Email`, `FirstName`, `LastName`, `Password`, `Role`) VALUES
('asd@gmail.com', 'qwe', 'rty', '2222', 'RL03'),
('asd@op.com', 'addd', 'efghrnt', 'fnryhte', 'RL03'),
('asd@yahoo.com', 'qwe', 'rty', '1111', 'RL03'),
('axc@yahoo.com', 'ab', 'cd', '56029f31970472e', 'RL03'),
('d@yahoo.com', 'fghjkl', 'edrtyui', '8277e0910d75019', 'RL03'),
('e@yahoo.com', 'jhgf', 'ytfd', 'e', 'RL03'),
('g@yahoo.com', 'vjvbjh', 'jbkbjk', 'g', 'RL03');

--
-- Triggers `students`
--
DROP TRIGGER IF EXISTS `trg_login_stud`;
DELIMITER //
CREATE TRIGGER `trg_login_stud` AFTER INSERT ON `students`
 FOR EACH ROW begin
insert into userlogins (email,password,role)
values (new.email, new.password, new.role);
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `userlogins`
--

CREATE TABLE IF NOT EXISTS `userlogins` (
  `Email` varchar(100) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Role` varchar(15) NOT NULL,
  PRIMARY KEY (`Email`),
  KEY `Role` (`Role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogins`
--

INSERT INTO `userlogins` (`Email`, `Password`, `Role`) VALUES
('a@yahoo.com', 'a', 'RL01'),
('b@yahoo.com', 'b', 'RL02'),
('c@yahoo.com', 'c', 'RL03'),
('d@yahoo.com', '8277e0910d75019', 'RL03'),
('e@yahoo.com', 'e', 'RL03'),
('g@yahoo.com', 'g', 'RL03'),
('hart@gmail.com', 'hart', 'RL02'),
('lec@yahoo.com', 'lec', 'RL02'),
('oka@yahoo.com', 'oka', 'RL02'),
('y@yahoo.com', 'fwfqfq', 'RL02');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `lecturers_ibfk_1` FOREIGN KEY (`CourseId`) REFERENCES `course` (`CourseId`);

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `fk_course` FOREIGN KEY (`CourseId`) REFERENCES `course` (`CourseId`);

--
-- Constraints for table `myfiles`
--
ALTER TABLE `myfiles`
  ADD CONSTRAINT `myfiles_ibfk_1` FOREIGN KEY (`CourseId`) REFERENCES `course` (`CourseId`);

--
-- Constraints for table `registercourses`
--
ALTER TABLE `registercourses`
  ADD CONSTRAINT `denynocourse` FOREIGN KEY (`CourseId`) REFERENCES `course` (`CourseId`),
  ADD CONSTRAINT `denyunregistered` FOREIGN KEY (`Email`) REFERENCES `students` (`Email`);
