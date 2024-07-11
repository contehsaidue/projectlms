-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 29, 2021 at 05:36 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `admin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(15) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`admin_ID`, `fname`, `lname`, `gender`, `age`, `contact_no`, `user_email`, `user_pass`, `user_image`) VALUES
(1, 'Saidu', 'Conteh', 'Male', 21, '+23277028023', 'csaidue@gmail.com', '1234', 'assets/adminregisteruploads/IMG-20210319-WA0041.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

DROP TABLE IF EXISTS `tblbook`;
CREATE TABLE IF NOT EXISTS `tblbook` (
  `bookid` int(11) NOT NULL AUTO_INCREMENT,
  `bookcover` varchar(255) DEFAULT NULL,
  `booktitle` varchar(50) DEFAULT NULL,
  `bookauthor` varchar(50) DEFAULT NULL,
  `bookcategoryid` int(5) DEFAULT NULL,
  `bookstatusid` int(5) DEFAULT NULL,
  `bookpublisher` varchar(50) DEFAULT NULL,
  `bookdateadded` date DEFAULT NULL,
  PRIMARY KEY (`bookid`),
  KEY `bookcategoryid` (`bookcategoryid`),
  KEY `bookstatusid` (`bookstatusid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`bookid`, `bookcover`, `booktitle`, `bookauthor`, `bookcategoryid`, `bookstatusid`, `bookpublisher`, `bookdateadded`) VALUES
(4, 'assets/bookcovers/knight-3003641_1280.jpg', 'Java - Object Oriented', 'SE Conteh', 3, 2, 'SE Publications', '2021-12-27'),
(2, 'assets/bookcovers/course-3.jpg', 'C++ Introduction', 'SE Conteh', 3, 2, 'SE Publications', '2021-12-27'),
(3, 'assets/bookcovers/course-2.jpg', 'MySqli  - Functiuonal Approach', 'SE Conteh', 3, 2, 'SE Publications', '2021-12-27'),
(5, 'assets/bookcovers/course-1.jpg', 'PHP - For beginners', 'SE Conteh', 3, 2, 'SE Publications', '2021-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `tblbookcategory`
--

DROP TABLE IF EXISTS `tblbookcategory`;
CREATE TABLE IF NOT EXISTS `tblbookcategory` (
  `bookcatid` int(11) NOT NULL AUTO_INCREMENT,
  `bookcatname` varchar(50) NOT NULL,
  PRIMARY KEY (`bookcatid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookcategory`
--

INSERT INTO `tblbookcategory` (`bookcatid`, `bookcatname`) VALUES
(4, 'Fiction'),
(2, 'Non-Fiction'),
(3, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `tblbookreturn`
--

DROP TABLE IF EXISTS `tblbookreturn`;
CREATE TABLE IF NOT EXISTS `tblbookreturn` (
  `bookreturn_ID` int(11) NOT NULL AUTO_INCREMENT,
  `book_ID` int(11) DEFAULT NULL,
  `stud_ID` int(11) DEFAULT NULL,
  `date_returned` date DEFAULT NULL,
  PRIMARY KEY (`bookreturn_ID`),
  KEY `book_ID` (`book_ID`),
  KEY `stud_ID` (`stud_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookreturn`
--

INSERT INTO `tblbookreturn` (`bookreturn_ID`, `book_ID`, `stud_ID`, `date_returned`) VALUES
(1, 5, 1, '2021-12-28'),
(2, 2, 1, '2021-12-28'),
(3, 3, 1, '2021-12-28'),
(4, 4, 1, '2021-12-28'),
(5, 5, 1, '2021-12-28'),
(6, 5, 1, '2021-12-28'),
(7, 2, 1, '2021-12-28'),
(8, 3, 1, '2021-12-28'),
(9, 4, 1, '2021-12-28'),
(10, 3, 3, '2021-12-28'),
(11, 4, 3, '2021-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `tblbookstatus`
--

DROP TABLE IF EXISTS `tblbookstatus`;
CREATE TABLE IF NOT EXISTS `tblbookstatus` (
  `bookstatusid` int(11) NOT NULL AUTO_INCREMENT,
  `bookstatusname` varchar(50) NOT NULL,
  PRIMARY KEY (`bookstatusid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookstatus`
--

INSERT INTO `tblbookstatus` (`bookstatusid`, `bookstatusname`) VALUES
(1, 'New'),
(2, 'Fairly Used'),
(3, 'Old');

-- --------------------------------------------------------

--
-- Table structure for table `tblborrowing`
--

DROP TABLE IF EXISTS `tblborrowing`;
CREATE TABLE IF NOT EXISTS `tblborrowing` (
  `borrowing_ID` int(11) NOT NULL AUTO_INCREMENT,
  `book_ID` int(11) DEFAULT NULL,
  `stud_ID` int(11) DEFAULT NULL,
  `date_borrowed` date DEFAULT NULL,
  PRIMARY KEY (`borrowing_ID`),
  KEY `book_ID` (`book_ID`),
  KEY `stud_ID` (`stud_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblborrowing`
--

INSERT INTO `tblborrowing` (`borrowing_ID`, `book_ID`, `stud_ID`, `date_borrowed`) VALUES
(17, 5, 3, '2021-12-28'),
(21, 3, 1, '2021-12-29'),
(15, 2, 1, '2021-12-28'),
(20, 4, 1, '2021-12-29'),
(19, 2, 3, '2021-12-28'),
(22, 5, 1, '2021-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `tblcertificate`
--

DROP TABLE IF EXISTS `tblcertificate`;
CREATE TABLE IF NOT EXISTS `tblcertificate` (
  `certificateid` int(11) NOT NULL AUTO_INCREMENT,
  `certificate_name` varchar(50) NOT NULL,
  PRIMARY KEY (`certificateid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcertificate`
--

INSERT INTO `tblcertificate` (`certificateid`, `certificate_name`) VALUES
(1, 'Certificate'),
(2, 'Higher Diploma (Diploma)'),
(3, 'Degree'),
(4, 'Masters'),
(5, 'PhD');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

DROP TABLE IF EXISTS `tblstudent`;
CREATE TABLE IF NOT EXISTS `tblstudent` (
  `stud_ID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `studentid` int(5) DEFAULT NULL,
  `program` varchar(50) DEFAULT NULL,
  `certificatetype` int(11) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`stud_ID`),
  KEY `certificatetype` (`certificatetype`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`stud_ID`, `fname`, `lname`, `gender`, `age`, `studentid`, `program`, `certificatetype`, `phone`, `email`, `password`, `image`) VALUES
(1, 'Secant', 'Chase', 'Male', '21', 55892, 'Computer Science', 3, '076235306', 'csaidue@gmail.com', '1234', 'assets/studentregisteruploads/course-1.jpg'),
(3, 'Ibrahim', 'Fofanah', 'Male', '31', 55899, 'Computer Science', 4, '030248931', 'csaidue@gmail.com', '1234', 'assets/studentregisteruploads/bg-masthead.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
