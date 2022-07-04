-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 04, 2022 at 11:34 AM
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
-- Database: `dentalappointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `appointmentID` int(255) NOT NULL AUTO_INCREMENT,
  `appointmentTicket` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contactNum` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `service` varchar(255) NOT NULL,
  `dateRequested` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rescheduledDate` date DEFAULT NULL,
  `rescheduledTime` time DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `approvedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`appointmentID`),
  KEY `adminAppointmentRelation` (`approvedBy`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointmentID`, `appointmentTicket`, `name`, `age`, `gender`, `contactNum`, `email`, `address`, `time`, `date`, `service`, `dateRequested`, `rescheduledDate`, `rescheduledTime`, `status`, `approvedBy`) VALUES
(1, '129-06-22', 'William Cris Hod', 20, 'male', '2147483647', 'williamcris18@gmail.com', 'test address', '15:01:00', '2022-07-02', 'Odontectomy', '2022-06-29 02:00:21', NULL, NULL, 'cancelled', NULL),
(2, '230-06-22', 'William Cris Hod', 20, 'male', '2147483647', 'williamcris18@gmail.com', 'test address', '14:47:00', '2022-07-30', 'Odontectomy', '2022-06-30 02:47:41', NULL, NULL, 'accepted', NULL),
(3, '330-06-22', 'William Cris Hod', 20, 'male', '2147483647', 'williamcris18@gmail.com', 'test address', '14:49:00', '2022-06-30', 'Tooth Extraction', '2022-06-30 02:49:27', NULL, NULL, 'cancelled', NULL),
(4, '430-06-22', 'Marvin Ray Dalida', 20, 'male', '09270287483', 'williamcris18@gmail.com', 'Quezon City', '14:56:00', '2022-07-02', 'Tooth Extraction', '2022-06-30 02:56:38', NULL, NULL, 'cancelled', NULL),
(5, '501-07-22', 'William Cris Hod', 20, 'male', '09270287483', 'williamcris18@gmail.com', 'test address', '09:49:00', '2022-07-06', 'Odontectomy', '2022-07-01 20:50:28', '2022-07-05', '10:54:00', 'reschedule pending', NULL),
(6, '601-07-22', 'William Cris Hod', 20, 'male', '09270287483', 'williamcris18@gmail.com', 'test address', '10:00:00', '2022-07-05', 'Apicoectomy', '2022-07-01 21:00:17', NULL, NULL, 'cancelled', NULL),
(7, '702-07-22', 'Alyssa Obillo', 24, 'female', '09270287483', 'williamcris18@gmail.com', 'test address', '08:57:00', '2022-07-05', 'Tooth Extraction', '2022-07-02 20:58:37', NULL, NULL, 'accepted', NULL),
(8, '804-07-22', 'William Cris Hod', 21, 'male', '09270287483', 'williamcris18@gmail.com', 'Quezon City', '11:03:00', '2022-07-08', 'Tooth Extraction', '2022-07-04 16:35:52', NULL, NULL, 'cancelled', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `logID` int(255) NOT NULL AUTO_INCREMENT,
  `userID` int(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`logID`),
  KEY `userLogData` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `userID` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`userID`, `username`, `password`, `name`, `status`) VALUES
(1, 'admin', '$2y$10$6wo.Uqdhp.XZ0v.OHpuheeE7kulCW0d6kEV7GwBT3GW.85cdwiAN2', 'Marvin Ray Dalida', 1),
(2, 'admin-01', '$2y$10$rF8R5W.6e2C2Fkb3Q/Yi4OCwfryTBCYC37PmnIGB1V2uUmuXKFNYK', 'William Cris Hod', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `adminAppointmentRelation` FOREIGN KEY (`approvedBy`) REFERENCES `user_details` (`userID`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `userLogData` FOREIGN KEY (`userID`) REFERENCES `user_details` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
