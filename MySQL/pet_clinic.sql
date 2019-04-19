-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 19, 2019 at 02:06 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pet-clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `ID` int(10) UNSIGNED NOT NULL,
  `pet_name` varchar(145) DEFAULT NULL,
  `pet_photo_name` varchar(545) DEFAULT NULL,
  `user_ID` int(10) UNSIGNED DEFAULT NULL,
  `pets_species_ID` int(10) UNSIGNED DEFAULT NULL,
  `deleted` enum('true','false') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`ID`, `pet_name`, `pet_photo_name`, `user_ID`, `pets_species_ID`, `deleted`) VALUES
(1, 'Laki', NULL, 1, 1, NULL),
(2, 'Djeki', NULL, 2, 2, NULL),
(3, 'Dzoni', NULL, 3, 3, NULL),
(4, 'Miki', NULL, 3, 1, NULL),
(5, 'Pero', NULL, 2, 3, NULL),
(6, 'Lala', NULL, 1, 3, NULL),
(7, 'Rekica', NULL, 4, 1, NULL),
(8, 'Maca', NULL, 4, 1, NULL),
(9, 'Milivoje', NULL, NULL, NULL, NULL),
(10, 'Neenko', NULL, 8, 0, NULL),
(11, 'Neenko', NULL, 9, 0, NULL),
(12, 'asdasd', NULL, 10, 0, NULL),
(13, '', NULL, 11, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pets_species`
--

CREATE TABLE `pets_species` (
  `ID` int(10) UNSIGNED NOT NULL,
  `pets_species_name` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pets_species`
--

INSERT INTO `pets_species` (`ID`, `pets_species_name`) VALUES
(1, 'Retriver'),
(2, 'Malteser'),
(3, 'Staford'),
(4, 'Beagle'),
(5, 'Dogge');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(245) DEFAULT NULL,
  `pass` varchar(245) DEFAULT NULL,
  `first_name` varchar(145) DEFAULT NULL,
  `last_name` varchar(145) DEFAULT NULL,
  `administrator` enum('true','false') DEFAULT NULL,
  `deleted` enum('true','false') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `pass`, `first_name`, `last_name`, `administrator`, `deleted`) VALUES
(0000000001, 'sha1$13112e4b$1$0c349f353f1fe08b94941967a343d77fe7d3953a', 'sha1$a8fbf2f6$1$1c18abcd06bd7fe63212facab810bbd1496f6e3b', 'Nikola', 'Starcevic', 'true', NULL),
(0000000002, NULL, NULL, 'Neven ', 'Josipovic', 'false', NULL),
(0000000003, NULL, NULL, 'Mina', 'Minic', 'false', NULL),
(0000000004, NULL, NULL, 'Pera ', 'Detlic', 'false', NULL),
(0000000005, NULL, NULL, 'Novi', 'NoviPrezime', NULL, NULL),
(0000000006, NULL, NULL, 'Novi2', 'prezime2', 'false', NULL),
(0000000007, NULL, NULL, 'pera', 'peric', NULL, NULL),
(0000000008, NULL, NULL, 'Matea', 'Rajcic', NULL, NULL),
(0000000009, NULL, NULL, 'Matea', 'Rajcic', NULL, NULL),
(0000000010, NULL, NULL, 'asdas', 'asda', NULL, NULL),
(0000000011, NULL, NULL, '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `ID` int(10) UNSIGNED NOT NULL,
  `visit_date` date DEFAULT NULL,
  `visit_title` varchar(145) DEFAULT NULL,
  `visit_desciption` varchar(45) DEFAULT NULL,
  `usser_ID` int(10) UNSIGNED DEFAULT NULL,
  `visit_type` varchar(200) DEFAULT NULL,
  `email` varchar(545) DEFAULT NULL,
  `pets_ID` int(10) UNSIGNED DEFAULT NULL,
  `visit_time` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`ID`, `visit_date`, `visit_title`, `visit_desciption`, `usser_ID`, `visit_type`, `email`, `pets_ID`, `visit_time`) VALUES
(5, '2019-04-07', 'asda', 'She\'s a sick dog', NULL, 'cosmetic', NULL, NULL, '2311'),
(6, '2019-04-07', 'asda', 'formBio', NULL, 'cosmetic', NULL, NULL, '2311'),
(7, '2019-04-29', 'Contreole', 'Visit reason: She\'s a sick dog', NULL, 'Cosmetc', NULL, NULL, '0632'),
(8, '2019-04-21', 'Igor', 'Visit reason:  Sakam viski', NULL, 'Medical Emergensy', NULL, NULL, '1115'),
(9, '2019-04-21', 'Igor', 'Visit reason:  Sakam viski', NULL, 'Medical Emergensy', NULL, NULL, '1115'),
(10, '2019-04-30', 'Dragn', 'Visit reason: Test', NULL, 'Check-up', NULL, NULL, '0526'),
(12, '2019-04-18', 'Novi test', 'Visit reason: adasdasa', NULL, 'Medical Emergensy', NULL, NULL, '1115'),
(18, '2019-04-18', 'test5', 'Visit reason: adds', NULL, 'Medical Emergensy', NULL, NULL, '1115'),
(19, '2019-04-18', 'test6', 'Visit reason: ', NULL, 'Medical Emergensy', NULL, NULL, '1115'),
(20, '2019-04-18', 'test7', 'Visit reason: ', NULL, 'Cosmetc', NULL, NULL, '1115'),
(22, '2019-04-18', 'test 7', 'Visit reason: sad', NULL, 'Medical Emergensy', NULL, NULL, '1115'),
(23, '2019-04-18', 'sa', 'Visit reason: ', NULL, 'null', NULL, NULL, '1115'),
(28, '2019-04-18', 'Dragan ', 'Visit reason: ', NULL, 'Medical Emergensy', NULL, NULL, '1115'),
(29, '2019-04-18', 'asda', 'Visit reason: ', NULL, 'Medical Emergensy', NULL, NULL, '1115'),
(30, '2019-04-18', 'asas', 'Visit reason: ', NULL, 'Medical Emergensy', NULL, NULL, '1115'),
(31, '2019-04-18', 'Dragan', 'Visit reason: ', NULL, 'Check-up', NULL, NULL, '1115'),
(33, '2019-04-18', 'Dragan U', 'Visit reason: asda', NULL, 'null', 'usic.d.dragan@gmail.com', NULL, '1115'),
(34, '2019-04-22', 'Nikola', 'Visit reason: Dog bree', NULL, 'Consultation', 'nikola.baljevic@gmail.com', NULL, '0111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`),
  ADD KEY `fk_pets_user1_idx` (`user_ID`),
  ADD KEY `fk_pets_pets_species1_idx` (`pets_species_ID`);

--
-- Indexes for table `pets_species`
--
ALTER TABLE `pets_species`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`),
  ADD KEY `fk_visits_usser_idx` (`usser_ID`),
  ADD KEY `fk_visits_pets1_idx` (`pets_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pets_species`
--
ALTER TABLE `pets_species`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
