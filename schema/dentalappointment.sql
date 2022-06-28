-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 28, 2022 at 04:20 PM
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
  `contactNum` int(255) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointmentID`, `appointmentTicket`, `name`, `age`, `gender`, `contactNum`, `email`, `address`, `time`, `date`, `service`, `dateRequested`, `rescheduledDate`, `rescheduledTime`, `status`, `approvedBy`) VALUES
(1, '129-06-22', 'William Cris Hod', 20, 'male', 2147483647, 'williamcris18@gmail.com', 'test address', '13:15:00', '2022-07-04', 'Tooth Extraction', '2022-06-29 00:15:52', NULL, NULL, 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `logID` int(255) NOT NULL AUTO_INCREMENT,
  `userID` int(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `happenedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`userID`, `username`, `password`, `name`, `status`) VALUES
(1, 'admin', '$2y$10$6wo.Uqdhp.XZ0v.OHpuheeE7kulCW0d6kEV7GwBT3GW.85cdwiAN2', 'Marvin Ray Dalida', 1);

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
