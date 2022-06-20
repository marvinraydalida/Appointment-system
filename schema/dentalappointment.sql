-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 20, 2022 at 04:08 AM
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
  `dateRequested` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL,
  `approvedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`appointmentID`),
  KEY `adminAppointmentRelation` (`approvedBy`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointmentID`, `appointmentTicket`, `name`, `age`, `gender`, `contactNum`, `email`, `address`, `time`, `date`, `dateRequested`, `status`, `approvedBy`) VALUES
(1, '131-05-22', 'Vann Chezter Lizan', 21, 'male', 123, 'vannchezterl@gmail.com', 'Quezon City', '10:42:00', '2022-05-31', '2022-05-31 22:42:48', 'cancelled', NULL),
(2, '231-05-22', 'William Cris Hod', 20, 'male', 123, 'williamcris18@gmail.com', 'Quezon City', '14:43:00', '2022-05-31', '2022-05-31 22:43:37', 'declined', NULL),
(3, '331-05-22', 'Marvin Ray Dalida', 21, 'male', 123, 'marvinraydalida@gmail.com', 'test address', '10:15:00', '2022-05-31', '2022-05-31 22:52:19', 'accepted', NULL),
(4, '431-05-22', 'William Cris Hod', 21, 'male', 123, 'williamcris18@gmail.com', 'Quezon City', '08:30:00', '2022-06-02', '2022-05-31 23:26:43', 'accepted', NULL),
(5, '501-06-22', 'William Cris Hod', 20, 'male', 123, 'williamcris18@gmail.com', 'test address', '14:30:00', '2022-06-01', '2022-06-01 20:48:05', 'accepted', NULL),
(6, '603-06-22', 'William Cris Hod', 20, 'male', 123, 'williamcris18@gmail.com', 'test address', '15:18:00', '2022-06-05', '2022-06-04 03:18:59', 'declined', NULL),
(7, '713-06-22', 'Marvin Ray Dalida', 20, 'male', 222, 'marvinraydalida@gmail.com', 'test address', '14:06:00', '2022-06-17', '2022-06-14 02:07:02', 'cancelled', NULL),
(8, '813-06-22', 'William Cris Hod', 20, 'male', 11, 'williamcris18@gmail.com', 'test address', '14:08:00', '2022-06-15', '2022-06-14 02:08:39', 'pending', NULL),
(9, '914-06-22', 'William Cris Hod', 21, 'male', 11, 'williamcris18@gmail.com', 'test address', '14:13:00', '2022-06-20', '2022-06-14 02:13:21', 'declined', NULL),
(10, '1017-06-22', 'William Cris Hod', 20, '1', 11111, 'williamcris18@gmail.com', 'test address', '14:25:00', '2022-06-17', '2022-06-17 02:25:56', 'accepted', NULL);

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
