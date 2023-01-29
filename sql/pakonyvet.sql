-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 05:55 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakonyvet`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointmentsID` int(11) NOT NULL,
  `appointmentsName` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `appointmentsColor` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `allDay` tinyint(4) DEFAULT 0,
  `appointmentsDescription` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointmentsID`, `appointmentsName`, `start`, `end`, `appointmentsColor`, `allDay`, `appointmentsDescription`) VALUES
(1, 'First appointment', '2022-03-29 08:00:00', '2022-03-29 23:59:59', '#0fa0ba', 1, 'Important appointment');

--
-- Triggers `appointments`
--
DELIMITER $$
CREATE TRIGGER `endTimeTrigger` BEFORE INSERT ON `appointments` FOR EACH ROW IF
(NEW.allDay = 1)
THEN
SET NEW.end = DATE_FORMAT(NEW.start, "%Y-%m-%d 23:59:59");
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `petsID` int(11) NOT NULL,
  `petsType` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `petsName` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `petsOwner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersID` int(11) NOT NULL,
  `usersFullName` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `usersName` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `usersPassword` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `usersPhone` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `usersEmail` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `usersVerified` tinyint(4) DEFAULT NULL,
  `usersToken` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vets`
--

CREATE TABLE `vets` (
  `vetsID` int(11) NOT NULL,
  `vetsName` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `vets`
--

INSERT INTO `vets` (`vetsID`, `vetsName`) VALUES
(1, 'Dr. Szieberth Ágnes'),
(2, 'Dr. Branyiczki Róbert');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointmentsID`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`petsID`),
  ADD KEY `petsOwner` (`petsOwner`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersID`);

--
-- Indexes for table `vets`
--
ALTER TABLE `vets`
  ADD PRIMARY KEY (`vetsID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointmentsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `petsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `vets`
--
ALTER TABLE `vets`
  MODIFY `vetsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`petsOwner`) REFERENCES `users` (`usersID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
