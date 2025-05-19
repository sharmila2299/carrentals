-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 02:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carsandbikesrentals`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookingdet`
--

CREATE TABLE `tbl_bookingdet` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `BOOKING_ID` varchar(50) NOT NULL,
  `VEHICLE_ID` varchar(50) NOT NULL,
  `START_DATE` varchar(50) NOT NULL,
  `END_DATE` varchar(50) NOT NULL,
  `PRICE` varchar(50) NOT NULL,
  `STATUS` varchar(200) NOT NULL,
  `NOTIFICATION` varchar(250) NOT NULL,
  `RANDOM_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_bookingdet`
--

INSERT INTO `tbl_bookingdet` (`ID`, `BOOKING_ID`, `VEHICLE_ID`, `START_DATE`, `END_DATE`, `PRICE`, `STATUS`, `NOTIFICATION`, `RANDOM_ID`) VALUES
(1, 'BookingID0001', 'VehicleID0001', '2024-11-21', '2024-11-23', '1000', 'reject', '', '673f1c4f6f126'),
(2, '', '', '', '', '1000', 'approved', '', '6749a1277790e'),
(3, 'BookingID0003', 'VehicleID0003', '2024-11-29', '2024-11-30', '13', 'approved', '', '6749a590dff8e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `BOOKING_ID` varchar(50) NOT NULL,
  `VEHICLE_ID` varchar(50) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `START_DATE` varchar(50) NOT NULL,
  `END_DATE` varchar(50) NOT NULL,
  `PRICE` varchar(50) NOT NULL,
  `TOTAL_PRICE` varchar(50) NOT NULL,
  `STATUS` varchar(200) NOT NULL,
  `NOTIFICATION` varchar(250) NOT NULL,
  `RANDOM_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`ID`, `BOOKING_ID`, `VEHICLE_ID`, `EMAIL`, `START_DATE`, `END_DATE`, `PRICE`, `TOTAL_PRICE`, `STATUS`, `NOTIFICATION`, `RANDOM_ID`) VALUES
(1, 'BookingID0001', 'VehicleID0001', '', '2025-01-30', '2025-02-02', '800', '2400.00', 'Available', '', '679b00215b7d9'),
(2, 'BookingID0002', 'VehicleID0002', '', '2025-01-30', '2025-02-01', '5000', '10000.00', 'Available', '', '679b0b9f3a4c1'),
(3, 'BookingID0003', 'VehicleID0003', 'nagesh123@gmail.com', '2025-01-30', '2025-02-02', '800', '2400.00', 'Available', '', '679b0cb595081'),
(4, 'BookingID0004', 'VehicleID0004', 'nagesh123@gmail.com', '2025-01-30', '2025-02-01', '5000', '10000.00', 'Available', '', '679b60d274889'),
(5, 'BookingID0005', 'VehicleID0005', 'sharmila@gmail.com', '2025-02-01', '2025-02-05', '1000', '4000.00', 'Available', '', '679de74a1b112');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custmoreservice`
--

CREATE TABLE `tbl_custmoreservice` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `ISSUE_DESCRIPTION` varchar(350) NOT NULL,
  `ATTACHMENT` varchar(250) NOT NULL,
  `RANDOM_ID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logins`
--

CREATE TABLE `tbl_logins` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `RANDOM_ID` varchar(20) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_logins`
--

INSERT INTO `tbl_logins` (`ID`, `USERNAME`, `PASSWORD`, `RANDOM_ID`, `CREATED_AT`) VALUES
(1, 'admin@gmail.com', 'admin123', '8iThroK40dwKp5cGYvIv', '2024-10-30 09:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_send`
--

CREATE TABLE `tbl_send` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `SUBJECT` varchar(100) NOT NULL,
  `MESSAGE` varchar(250) NOT NULL,
  `RANDOM_ID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_send`
--

INSERT INTO `tbl_send` (`ID`, `NAME`, `EMAIL`, `SUBJECT`, `MESSAGE`, `RANDOM_ID`) VALUES
(1, 'Sharmila', 'sharmila@gmail.com', 'about rentals details', 'i want to know about the car rentals', '674ad93b98a30'),
(2, 'Sharmila', 'sharmila123@gmail.com', 'About car rentals', 'i want to know about the car rentals', '675809ca3310f');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(500) NOT NULL,
  `IMAGE` varchar(200) NOT NULL,
  `RANDOM_ID` varchar(10) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `USER_ID` varchar(25) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `GENDER` varchar(30) NOT NULL,
  `PHONE_NUMBER` varchar(10) NOT NULL,
  `ADDRESS` varchar(200) NOT NULL,
  `AADHAR_PHOTO` varchar(250) NOT NULL,
  `PROFILE_PHOTO` varchar(250) NOT NULL,
  `RANDOM_ID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`ID`, `USER_ID`, `NAME`, `EMAIL`, `PASSWORD`, `DOB`, `GENDER`, `PHONE_NUMBER`, `ADDRESS`, `AADHAR_PHOTO`, `PROFILE_PHOTO`, `RANDOM_ID`) VALUES
(1, 'UserID0001', 'Sharmila M', 'sharmila@gmail.com', '123', '2024-12-10', 'female', '7330902067', 'kakinada', '../uploads/users/6758273adaa83imageWhatsApp Image 2024-11-27 at 12.18.10 PM.jpeg', '../uploads/users/6758273adaa83image1arch.png', '6758273adaa83'),
(2, 'UserID0002', 'Sharmila', 'sharmilasharu2929@gmail.com', '123', '2025-05-11', 'female', '1234567890', 'WERTYUIO', '../uploads/users/682b2a4e1b391imageScreenshot (209).png', '../uploads/users/682b2a4e1b391image1Screenshot (213).png', '682b2a4e1b391');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicles`
--

CREATE TABLE `tbl_vehicles` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `VEHICLE_TYPE` varchar(100) NOT NULL,
  `BRAND` varchar(100) NOT NULL,
  `MODAL` varchar(100) NOT NULL,
  `NUMBER_PLATE` varchar(100) NOT NULL,
  `RENTAL_PRICING` varchar(10) NOT NULL,
  `PHOTOS` varchar(250) NOT NULL,
  `AVALIBILITY_STATUS` varchar(100) NOT NULL,
  `DELETE_STATUS` int(11) NOT NULL DEFAULT 1,
  `RANDOM_ID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_vehicles`
--

INSERT INTO `tbl_vehicles` (`ID`, `VEHICLE_TYPE`, `BRAND`, `MODAL`, `NUMBER_PLATE`, `RENTAL_PRICING`, `PHOTOS`, `AVALIBILITY_STATUS`, `DELETE_STATUS`, `RANDOM_ID`) VALUES
(1, 'Car', 'Mahindra', 'XUV700', 'APIN110084', '1000', '../uploads/Vehicles/67417d916cf74imagecar6.jpg', 'Available', 1, '67417d916cf74'),
(2, 'Car', 'Mahindra ', 'Thar', 'APIN0077610', '1500', '../uploads/Vehicles/67417e29c84feimagecar9.jpg', 'Available', 1, '67417e29c84fe'),
(3, 'Car', 'BMW', 'BMW001', 'APIN0099121', '2000', '../uploads/Vehicles/67417e8ca301dimagecar1.jpg', 'Available', 1, '67417e8ca301d'),
(4, 'Bike', 'Royal Enfield', 'M009', 'AP009MG11', '2570', '../uploads/Vehicles/67417eed38c4bimagebike1.jpg', 'Available', 1, '67417eed38c4b'),
(5, 'Bike', 'Royal Enfield', 'R107A', 'TN00IN122', '3000', '../uploads/Vehicles/67417f2817cf6imagebike2.jpg', 'Available', 1, '67417f2817cf6'),
(6, 'Bike', 'HERO', 'H120', 'TN1100P190', '3500', '../uploads/Vehicles/67417f68f0e80imagebike.jpg', 'Available', 1, '67417f68f0e80'),
(7, 'Car', 'Toyota', 'Cruiser Hyryder', 'AP20SDA0094', '3500', '../uploads/Vehicles/67418068a59ccimagecar11.jfif', 'Available', 1, '67418068a59cc'),
(8, 'Car', 'Mercedes-Benz', 'C-Class', 'MB-C250', '5000', '../uploads/Vehicles/6741837bd5fb6imagecar.jpg', 'Available', 1, '674180e043694'),
(9, 'Car', 'Toyota', 'Camry', 'CAM-5678', '5000', '../uploads/Vehicles/674181644b5d4imagecar7.jfif', 'Available', 1, '674181644b5d4'),
(10, 'Car', 'FORD', 'Mustang', 'FRD-MUS1', '7000', '../uploads/Vehicles/67419941627bbimageforddd.jpg', 'Available', 1, '67419941627bb'),
(11, 'Car', 'FORD', 'F-150', 'FRD-1502', '5500', '../uploads/Vehicles/67419b9e21cf2imageford.jpg', 'Available', 1, '67419b9e21cf2'),
(12, 'Car', 'FORD', 'Explorer', 'EXPL-340', '4500', '../uploads/Vehicles/67419be364383imagecarford.jpg', 'Available', 1, '67419be364383'),
(13, 'Car', 'Honda', 'Creta', 'HON-CVC1', '3500', '../uploads/Vehicles/67419cc47df30imagecreta.jfif', 'Available', 1, '67419cc47df30'),
(14, 'Bike', ' KTM', ' KTM 390 ', 'KTM-010-1123', '4500', '../uploads/Vehicles/67419fecc9ac6imageKTM.jpg', 'Available', 1, '67419fecc9ac6'),
(15, 'Bike', 'Triumph Bonneville ', 'T120', 'TRI-009-993211', '3500', '../uploads/Vehicles/6741a04a35136imagebike3.jpg', 'Available', 1, '6741a04a35136'),
(16, 'Bike', 'Kawasaki Ninja ', 'Ninja ZX-10R', 'KWS-008-2211', '5500', '../uploads/Vehicles/6741a0928e352imagebike4.jpg', 'Available', 1, '6741a0928e352'),
(17, 'Bike', 'Royal Enfield', 'Classic 350', 'RE-007-990021', '5500', '../uploads/Vehicles/6741a0d4a3b9bimagebike5.jpg', 'Available', 1, '6741a0d4a3b9b'),
(18, 'Bike', 'BMW', 'R 1250 GS', 'BMW-005-99871', '4500', '../uploads/Vehicles/6741a12d57835imagebike6.jpg', 'Available', 1, '6741a12d57835'),
(19, 'Bike', ' Honda', ' Honda CB500X', 'HND-004', '3000', '../uploads/Vehicles/6741a20e010acimagebikeee.jpg', 'Available', 1, '6741a1b8ed5d8'),
(20, 'Bike', 'Yamaha ', 'YZF-R1', 'YMH-003-0901', '7500', '../uploads/Vehicles/6741a2ca26d7aimagebik7.jpg', 'Available', 1, '6741a2ca26d7a'),
(21, 'Car', 'Toyota', 'Corolla', 'TOY-1234', '3500', '../uploads/Vehicles/6741a401e31e5imagecarr.jfif', 'Available', 1, '6741a401e31e5'),
(22, 'Car', 'Hyundai ', 'Tucson', 'DLC04TC0049', '6000', '../uploads/Vehicles/6741a4cdc39a5imagedl04tc0449.jpg', 'Available', 1, '6741a4cdc39a5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehiclesimages`
--

CREATE TABLE `tbl_vehiclesimages` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `NUMBER_PLATE` varchar(25) NOT NULL,
  `PHOTOS` varchar(250) NOT NULL,
  `RANDOM_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bookingdet`
--
ALTER TABLE `tbl_bookingdet`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `tbl_custmoreservice`
--
ALTER TABLE `tbl_custmoreservice`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `tbl_logins`
--
ALTER TABLE `tbl_logins`
  ADD UNIQUE KEY `id` (`ID`);

--
-- Indexes for table `tbl_send`
--
ALTER TABLE `tbl_send`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `tbl_vehicles`
--
ALTER TABLE `tbl_vehicles`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `tbl_vehiclesimages`
--
ALTER TABLE `tbl_vehiclesimages`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bookingdet`
--
ALTER TABLE `tbl_bookingdet`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_custmoreservice`
--
ALTER TABLE `tbl_custmoreservice`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_logins`
--
ALTER TABLE `tbl_logins`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_send`
--
ALTER TABLE `tbl_send`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_vehicles`
--
ALTER TABLE `tbl_vehicles`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_vehiclesimages`
--
ALTER TABLE `tbl_vehiclesimages`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
