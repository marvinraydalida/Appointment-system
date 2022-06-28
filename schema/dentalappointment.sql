-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 28, 2022 at 04:13 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointmentID`, `appointmentTicket`, `name`, `age`, `gender`, `contactNum`, `email`, `address`, `time`, `date`, `service`, `dateRequested`, `rescheduledDate`, `rescheduledTime`, `status`, `approvedBy`) VALUES
(1, '129-06-22', 'William Cris Hod', 20, 'male', 2147483647, 'williamcris18@gmail.com', 'test address', '13:03:00', '2022-06-27', 'Tooth Extraction', '2022-06-29 00:04:09', NULL, NULL, 'cancelled', NULL),
(2, '229-06-22', 'Luke Juniel Galicia', 20, 'male', 2147483647, 'williamcris18@gmail.com', 'test address', '13:11:00', '2022-06-21', 'Tooth Extraction', '2022-06-29 00:11:57', NULL, NULL, 'cancelled', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `adminAppointmentRelation` FOREIGN KEY (`approvedBy`) REFERENCES `user_details` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
