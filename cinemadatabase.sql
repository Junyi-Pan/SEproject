-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 04:19 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinemadatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `AddressID` int(11) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`AddressID`, `address1`, `address2`, `city`, `state`, `zip`, `userID`) VALUES
(1, '123 Main Street', '', 'Loganville', 'Georgia', '30052', 24);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingID` int(11) NOT NULL,
  `streetAddress` char(64) NOT NULL DEFAULT '',
  `city` char(32) NOT NULL DEFAULT '',
  `zipCode` char(16) NOT NULL DEFAULT '',
  `state` char(16) NOT NULL DEFAULT '',
  `bookerID` int(11) NOT NULL DEFAULT 0,
  `ticketIDs` char(255) NOT NULL DEFAULT '',
  `totalPrice` float(255,2) NOT NULL DEFAULT 0.00,
  `numTickets` int(11) NOT NULL DEFAULT 0,
  `showingID` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movieID` int(11) NOT NULL,
  `title` char(64) NOT NULL DEFAULT '',
  `trailerLink` char(255) NOT NULL DEFAULT '',
  `description` char(255) NOT NULL DEFAULT '',
  `durationInMinutes` char(64) NOT NULL DEFAULT '',
  `genre` char(32) NOT NULL DEFAULT '',
  `cast` char(255) NOT NULL DEFAULT '',
  `producer` char(32) NOT NULL DEFAULT '',
  `review` char(255) NOT NULL DEFAULT 'Not terrible',
  `rating` int(11) NOT NULL DEFAULT 0,
  `showingIDs` char(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paymentinfo`
--

CREATE TABLE `paymentinfo` (
  `paymentMethodID` int(11) NOT NULL,
  `cardNumber` varchar(255) NOT NULL DEFAULT '',
  `streetAddress` char(64) NOT NULL DEFAULT '',
  `streetAddress2` char(64) NOT NULL DEFAULT '',
  `city` char(32) NOT NULL DEFAULT '',
  `zipCode` char(16) NOT NULL DEFAULT '',
  `state` char(16) NOT NULL DEFAULT '',
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `expMonth` int(11) NOT NULL DEFAULT 1,
  `expYear` int(11) NOT NULL DEFAULT 2000,
  `cvv` varchar(255) NOT NULL,
  `ownerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentinfo`
--

INSERT INTO `paymentinfo` (`paymentMethodID`, `cardNumber`, `streetAddress`, `city`, `zipCode`, `state`, `fName`, `lName`, `expMonth`, `expYear`, `cvv`, `ownerID`) VALUES
(11, '1', '124 Main Street', 'Loganville', '30052', 'Georgia', 'Andrew', 'Marsh', 1, 2023, 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `code` char(32) NOT NULL DEFAULT '',
  `percentOff` int(11) NOT NULL DEFAULT 0,
  `dollarsOff` int(11) NOT NULL DEFAULT 0,
  `expiration` date NOT NULL DEFAULT '2022-03-04'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `securitykeys`
--

CREATE TABLE `securitykeys` (
  `cardEncryptionKey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `securitykeys`
--

INSERT INTO `securitykeys` (`cardEncryptionKey`) VALUES
('sup3rs3cr3tk3y');

-- --------------------------------------------------------

--
-- Table structure for table `showings`
--

CREATE TABLE `showings` (
  `showingID` int(11) NOT NULL,
  `movieID` int(11) NOT NULL DEFAULT 0,
  `time` float(255,2) NOT NULL DEFAULT 12.00,
  `date` date NOT NULL DEFAULT '2022-03-04'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `showrooms`
--

CREATE TABLE `showrooms` (
  `theatreID` int(11) NOT NULL DEFAULT 0,
  `showroomID` int(11) NOT NULL,
  `numSeats` int(11) NOT NULL DEFAULT 10,
  `reservedSeats` char(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `theatres`
--

CREATE TABLE `theatres` (
  `theatreID` int(11) NOT NULL,
  `theatreName` char(64) NOT NULL DEFAULT 'Americans Spell it Theater',
  `streetAddress` char(64) NOT NULL DEFAULT '',
  `city` char(32) NOT NULL DEFAULT '',
  `zipCode` char(16) NOT NULL DEFAULT '',
  `state` char(16) NOT NULL DEFAULT '',
  `numShowrooms` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticketID` int(11) NOT NULL,
  `ticketTypeID` int(11) NOT NULL DEFAULT 1,
  `showingID` int(11) NOT NULL DEFAULT 0,
  `seatNumber` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tickettypes`
--

CREATE TABLE `tickettypes` (
  `ticketTypeID` int(11) NOT NULL,
  `price` float(255,2) NOT NULL DEFAULT 5.00,
  `name` char(16) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `email` char(32) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `firstName` char(32) NOT NULL DEFAULT '',
  `lastName` char(32) NOT NULL DEFAULT '',
  `state` int(11) NOT NULL DEFAULT 1,
  `isAdmin` int(11) NOT NULL DEFAULT 0,
  `subscribed` int(11) NOT NULL DEFAULT 0,
  `reset_password_token` varchar(45) DEFAULT NULL,
  `verificationCode` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `email`, `password`, `firstName`, `lastName`, `state`, `isAdmin`, `subscribed`, `reset_password_token`, `verificationCode`) VALUES
(24, 'ajm36242@uga.edu', '$2y$10$NadF1eh70XOtJNU6bQU9Uu3MDsP1dLPHCQSD6wFb7z92x9noKNxYy', 'Andrew', 'Marsh', 1, 1, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`AddressID`),
  ADD KEY `Foreign Key` (`userID`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `Person` (`bookerID`),
  ADD KEY `Show` (`showingID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieID`);

--
-- Indexes for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD PRIMARY KEY (`paymentMethodID`),
  ADD KEY `Owner` (`ownerID`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `showings`
--
ALTER TABLE `showings`
  ADD PRIMARY KEY (`showingID`),
  ADD KEY `Movie` (`movieID`);

--
-- Indexes for table `showrooms`
--
ALTER TABLE `showrooms`
  ADD PRIMARY KEY (`showroomID`),
  ADD KEY `Theatre` (`theatreID`);

--
-- Indexes for table `theatres`
--
ALTER TABLE `theatres`
  ADD PRIMARY KEY (`theatreID`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticketID`),
  ADD KEY `Ticket` (`ticketTypeID`),
  ADD KEY `wohs` (`showingID`);

--
-- Indexes for table `tickettypes`
--
ALTER TABLE `tickettypes`
  ADD PRIMARY KEY (`ticketTypeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `AddressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movieID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  MODIFY `paymentMethodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `showings`
--
ALTER TABLE `showings`
  MODIFY `showingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `showrooms`
--
ALTER TABLE `showrooms`
  MODIFY `showroomID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theatres`
--
ALTER TABLE `theatres`
  MODIFY `theatreID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticketID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickettypes`
--
ALTER TABLE `tickettypes`
  MODIFY `ticketTypeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `Foreign Key` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `Person` FOREIGN KEY (`bookerID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `Show` FOREIGN KEY (`showingID`) REFERENCES `showings` (`showingID`);

--
-- Constraints for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD CONSTRAINT `Owner` FOREIGN KEY (`ownerID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `showings`
--
ALTER TABLE `showings`
  ADD CONSTRAINT `Movie` FOREIGN KEY (`movieID`) REFERENCES `movies` (`movieID`);

--
-- Constraints for table `showrooms`
--
ALTER TABLE `showrooms`
  ADD CONSTRAINT `Theatre` FOREIGN KEY (`theatreID`) REFERENCES `theatres` (`theatreID`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `Ticket` FOREIGN KEY (`ticketTypeID`) REFERENCES `tickettypes` (`ticketTypeID`),
  ADD CONSTRAINT `wohs` FOREIGN KEY (`showingID`) REFERENCES `showings` (`showingID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
