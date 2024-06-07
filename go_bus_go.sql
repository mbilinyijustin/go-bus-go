-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2024 at 02:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `go_bus_go`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'Test@12345', '13-05-2024');

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `id` int(11) NOT NULL,
  `busID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `seatNo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `busName` varchar(50) DEFAULT NULL,
  `busNumber` int(11) DEFAULT NULL,
  `totalSeats` int(11) DEFAULT NULL,
  `routeFrom` varchar(50) DEFAULT NULL,
  `routeTo` varchar(50) DEFAULT NULL,
  `price` int(6) DEFAULT NULL,
  `departureTime` time DEFAULT NULL,
  `image` blob DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `busName`, `busNumber`, `totalSeats`, `routeFrom`, `routeTo`, `price`, `departureTime`, `image`, `description`) VALUES
(1, 'TURU BEST', 2, 30, 'MBEYA', 'SINGIDA', 40000, '06:53:00', NULL, 'Ndugu abiria unahitajika kufika stand nusu saa kabla ya mda  wa kuondoka'),
(2, 'PREMIER BUS', 16, 30, 'MWANZA', 'MBEYA', 2500, '11:07:00', NULL, 'WELCOME'),
(3, 'FIKOSHI BUS', 12, 30, 'MBEYA', 'IRINGA', 30000, '06:45:00', NULL, 'Ndugu abiria kuwa mpole'),
(10, 'TURU BEST', 1, 30, 'SINGIDA', 'MBEYA', 40000, '21:48:00', NULL, 'HII INAKIWASHA'),
(11, 'ABC', 1, 50, 'MBEYA', 'DODOMA', 30000, '14:13:00', NULL, 'Yoyote'),
(12, 'SUPER FEO', 1, 50, 'SONGEA', 'MBEYA', 20000, '13:35:00', NULL, 'Karibuni ndugu abiria katika basi letu');

-- --------------------------------------------------------

--
-- Table structure for table `busadminlog`
--

CREATE TABLE `busadminlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `logout` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `busadminlog`
--

INSERT INTO `busadminlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 1, 'alicepremier@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-14 08:55:21', NULL, 1),
(2, 1, 'alicepremier@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-14 09:55:28', '14-05-2024 03:25:28 PM', 1),
(3, 1, 'alicepremier@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-14 09:57:03', NULL, 1),
(4, 2, 'williamabc@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-20 09:11:28', NULL, 1),
(5, 1, 'alicepremier@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-20 09:32:41', NULL, 1),
(6, 3, 'mashakapremier@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-21 06:59:28', '21-05-2024 12:29:28 PM', 1),
(7, 1, 'alicepremier@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-26 07:39:14', '26-05-2024 01:09:14 PM', 1),
(8, 1, 'alicepremier@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-26 09:33:53', '26-05-2024 03:03:53 PM', 1),
(9, NULL, 'lushiba@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-26 10:05:37', NULL, 0),
(10, 1, 'alicepremier@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-26 10:06:05', NULL, 1),
(11, 1, 'alicepremier@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-26 12:45:55', NULL, 1),
(12, 1, 'alicepremier@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-26 12:53:29', '26-05-2024 06:23:29 PM', 1),
(13, NULL, 'alicepremier@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-26 12:49:39', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `buscompany`
--

CREATE TABLE `buscompany` (
  `id` int(11) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buscompany`
--

INSERT INTO `buscompany` (`id`, `company`, `creationDate`, `updationDate`) VALUES
(1, 'PREMIER BUS', '2024-05-13 19:05:24', '2024-05-13 19:05:24'),
(2, 'ABC COMPANY', '2024-05-20 09:06:53', '2024-05-20 09:06:53'),
(3, 'NYEHUNGE', NULL, NULL),
(7, 'ferrary', '2024-05-23 21:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bus_admin`
--

CREATE TABLE `bus_admin` (
  `id` int(11) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `busAdminName` varchar(50) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `contactno` varchar(11) DEFAULT NULL,
  `busAdminEmail` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_admin`
--

INSERT INTO `bus_admin` (`id`, `company`, `busAdminName`, `address`, `contactno`, `busAdminEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'PREMIER BUS', 'Alice Paul', 'Cocacola-432', '+255 627 66', 'alicepremier@gmail.com', '38200191774674430cd456392b4c5d95', '2024-05-14 08:15:06', '2024-05-14 08:15:06'),
(2, '', 'William Mbilinyi', 'Cocacola-432', '+255 643 32', 'williamabc@gmail.com', '5c428d8875d2948607f3e3fe134d71b4', NULL, NULL),
(3, '', 'Mashaka', 'Cocacola-432', '+255 643 32', 'mashakapremier@gmail.com', '5c428d8875d2948607f3e3fe134d71b4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `searchbooking`
--

CREATE TABLE `searchbooking` (
  `id` int(11) NOT NULL,
  `routeFrom` varchar(50) DEFAULT NULL,
  `routeTo` varchar(50) DEFAULT NULL,
  `searchDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `searchbooking`
--

INSERT INTO `searchbooking` (`id`, `routeFrom`, `routeTo`, `searchDate`) VALUES
(1, 'MBEYA', 'SINGIDA', '2024-05-22'),
(2, 'MBEYA', 'SINGIDA', '2024-05-22'),
(3, 'MBEYA', 'SINGIDA', '2024-05-22'),
(4, 'MBEYA', 'SINGIDA', '2024-05-22'),
(5, 'MWANZA', 'SINGIDA', '2024-05-23'),
(6, 'MWANZA', 'SINGIDA', '2024-05-23'),
(7, 'MWANZA', 'SINGIDA', '2024-05-23'),
(8, 'MWANZA', 'SINGIDA', '2024-05-23'),
(9, 'MWANZA', 'SINGIDA', '2024-05-23'),
(10, 'MWANZA', 'SINGIDA', '2024-05-16'),
(11, 'MWANZA', 'SINGIDA', '2024-05-16'),
(12, 'MWANZA', 'SINGIDA', '2024-05-16'),
(13, 'MWANZA', 'SINGIDA', '2024-05-17'),
(14, 'MWANZA', 'SINGIDA', '2024-05-17'),
(15, 'MBEYA', 'MBEYA', '2024-05-23'),
(16, 'MBEYA', 'MBEYA', '2024-05-23'),
(17, 'MBEYA', 'MBEYA', '2024-05-23'),
(18, 'MBEYA', 'MBEYA', '2024-05-23'),
(19, 'MBEYA', 'MBEYA', '2024-05-23'),
(20, 'MBEYA', 'MBEYA', '2024-05-23'),
(21, 'MBEYA', 'MBEYA', '2024-05-23'),
(22, 'MBEYA', 'MBEYA', '2024-05-23'),
(23, 'MBEYA', 'MBEYA', '2024-05-23'),
(24, 'MBEYA', 'MBEYA', '2024-05-23'),
(25, 'MBEYA', 'MBEYA', '2024-05-23'),
(26, 'MBEYA', 'MBEYA', '2024-05-23'),
(27, 'MBEYA', 'MBEYA', '2024-05-23'),
(28, 'MBEYA', 'MBEYA', '2024-05-23'),
(29, 'MBEYA', 'MBEYA', '2024-05-23'),
(30, 'MBEYA', 'MBEYA', '2024-05-23'),
(31, 'MBEYA', 'MBEYA', '2024-05-23'),
(32, 'MBEYA', 'MBEYA', '2024-05-23'),
(33, 'MBEYA', 'MBEYA', '2024-05-23'),
(34, 'MBEYA', 'MBEYA', '2024-05-23'),
(35, 'MBEYA', 'MBEYA', '2024-05-23'),
(36, 'MBEYA', 'MBEYA', '2024-05-23'),
(37, 'MBEYA', 'MBEYA', '2024-05-23'),
(38, 'MBEYA', 'SINGIDA', '2024-05-31'),
(39, 'MBEYA', 'SINGIDA', '2024-05-31'),
(40, 'MBEYA', 'MBEYA', '2024-05-23'),
(41, 'MBEYA', 'SINGIDA', '2024-05-10'),
(42, 'MBEYA', 'SINGIDA', '2024-05-10'),
(43, 'MBEYA', 'SINGIDA', '2024-05-17'),
(44, 'SINGIDA', 'MBEYA', '2024-05-24'),
(45, 'MBEYA', 'SINGIDA', '2024-05-17'),
(46, 'MBEYA', 'SINGIDA', '2024-05-03'),
(47, 'MBEYA', 'SINGIDA', '2024-05-16'),
(48, 'MBEYA', 'SINGIDA', '2024-05-16'),
(49, 'MBEYA', 'SINGIDA', '2024-05-16'),
(50, 'MBEYA', 'SINGIDA', '2024-05-09'),
(51, 'MBEYA', 'SINGIDA', '2024-05-17'),
(52, 'MBEYA', 'SINGIDA', '2024-05-10'),
(53, 'MBEYA', 'SINGIDA', '2024-05-11'),
(54, 'MBEYA', 'SINGIDA', '2024-05-09'),
(55, 'MBEYA', 'SINGIDA', '2024-05-14'),
(56, 'MBEYA', 'SINGIDA', '2024-05-08'),
(57, 'MBEYA', 'SINGIDA', '2024-05-14'),
(58, 'MBEYA', 'DODOMA', '2024-05-23'),
(59, 'MWANZA', 'MBEYA', '2024-05-30'),
(60, 'SINGIDA', 'MBEYA', '2024-05-29'),
(61, 'MWANZA', 'DODOMA', '2024-05-22'),
(62, 'MBEYA', 'DODOMA', '2024-05-21'),
(63, 'SONGEA', 'MBEYA', '2024-05-21'),
(64, 'MBEYA', 'SINGIDA', '2024-05-16'),
(65, 'MWANZA', 'MBEYA', '2024-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `seatno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 0, '', 0x3a3a3100000000000000000000000000, '2024-05-13 07:43:34', '', 0),
(2, 0, 'Yohana', 0x3a3a3100000000000000000000000000, '2024-05-21 14:58:10', '21-05-2024 08:28:10 PM', 0),
(3, 4, 'yohanamsongole@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-13 07:45:32', '', 1),
(4, 4, 'yohanamsongole@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-13 08:14:38', NULL, 1),
(5, NULL, 'yohanamsongole@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-13 08:14:57', NULL, 0),
(6, NULL, 'Yohana', 0x3a3a3100000000000000000000000000, '2024-05-13 08:15:39', NULL, 0),
(7, NULL, 'Yohana', 0x3a3a3100000000000000000000000000, '2024-05-13 08:16:09', NULL, 0),
(8, NULL, 'lushiba@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-13 12:09:56', NULL, 0),
(9, NULL, 'jackson@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-13 12:11:04', NULL, 0),
(10, 3, 'jackson@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-13 12:11:35', NULL, 1),
(11, 4, 'Yohana', 0x3a3a3100000000000000000000000000, '2024-05-13 12:41:05', NULL, 1),
(12, 4, 'Yohana', 0x3a3a3100000000000000000000000000, '2024-05-13 14:22:05', '13-05-2024 07:52:05 PM', 1),
(13, 4, 'yohanamsongole@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-14 14:26:37', NULL, 1),
(14, 4, 'yohanamsongole@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-14 14:32:13', NULL, 1),
(15, 4, 'yohanamsongole@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-15 15:44:43', NULL, 1),
(16, 4, 'Yohana', 0x3a3a3100000000000000000000000000, '2024-05-16 12:33:41', NULL, 1),
(17, 4, 'Yohana', 0x3a3a3100000000000000000000000000, '2024-05-16 14:32:34', '16-05-2024 08:02:34 PM', 1),
(18, NULL, 'lushiba@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-16 14:35:46', NULL, 0),
(19, NULL, 'lushibajames@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-16 14:40:16', NULL, 0),
(20, 6, 'lushiba@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-16 14:42:41', NULL, 1),
(21, 6, 'lushiba@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-16 19:56:11', NULL, 1),
(22, 4, 'yohanamsongole@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-20 09:18:59', '20-05-2024 02:48:59 PM', 1),
(23, 4, 'yohanamsongole@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-20 09:30:17', '20-05-2024 03:00:17 PM', 1),
(24, 4, 'yohanamsongole@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-20 09:37:18', NULL, 1),
(25, 4, 'yohanamsongole@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-21 06:43:01', '21-05-2024 12:13:01 PM', 1),
(26, 4, 'yohanamsongole@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-21 06:46:43', '21-05-2024 12:16:43 PM', 1),
(27, 4, 'yohanamsongole@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-26 07:36:34', '26-05-2024 01:06:34 PM', 1),
(28, NULL, 'yohanamsongole@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-26 12:33:29', NULL, 0),
(29, 4, 'yohanamsongole@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-26 12:41:26', '26-05-2024 06:11:26 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password_again` varchar(50) NOT NULL,
  `regDate` timestamp NULL DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `city`, `gender`, `phone`, `email`, `password`, `password_again`, `regDate`, `updationDate`) VALUES
(3, 'Jackson', 'Samwel', 'Ikuti 123', 'Mwanza', 'male', NULL, 'jackson@gmail.com', 'ebb663adce3adabf3c766bf742a997ef', '', NULL, NULL),
(4, 'Yohana', 'Msongole', 'Ikuti 123', 'Mwanza', 'male', NULL, 'yohanamsongole@gmail.com', '5c428d8875d2948607f3e3fe134d71b4', '', NULL, NULL),
(6, 'Lushiba', 'James', 'Ikuti 123', 'Mbeya', 'male', NULL, 'lushiba@gmail.com', '5c428d8875d2948607f3e3fe134d71b4', '', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`id`),
  ADD KEY `busID` (`busID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `busadminlog`
--
ALTER TABLE `busadminlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buscompany`
--
ALTER TABLE `buscompany`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_admin`
--
ALTER TABLE `bus_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `searchbooking`
--
ALTER TABLE `searchbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `busadminlog`
--
ALTER TABLE `busadminlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `buscompany`
--
ALTER TABLE `buscompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bus_admin`
--
ALTER TABLE `bus_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `searchbooking`
--
ALTER TABLE `searchbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked`
--
ALTER TABLE `booked`
  ADD CONSTRAINT `booked_ibfk_1` FOREIGN KEY (`busID`) REFERENCES `bus` (`id`),
  ADD CONSTRAINT `booked_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
