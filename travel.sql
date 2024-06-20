-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2024 at 11:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`username`, `password`) VALUES
('admin', 'travel@123');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `contact_details` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `guests` int(11) NOT NULL,
  `arrivals` date NOT NULL,
  `leaving` date NOT NULL,
  `booking_status` varchar(50) NOT NULL DEFAULT 'Pending',
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `customer_name`, `contact_details`, `location`, `guests`, `arrivals`, `leaving`, `booking_status`, `package_id`) VALUES
(3, 'abiy', 'qajsa', 'aa', 2, '0000-00-00', '0000-00-00', 'Cancelled', 3),
(5, 'Ab And', 'andargieabiyA85@gmail.com 0920352016 1', 'Addis baba', 6, '2024-06-11', '2024-06-17', 'Confirmed', 5),
(6, 'Ab And', 'andargieabiyA85@gmail.com 0920352016 1', 'Addis baba', 3, '2024-06-10', '2024-06-18', 'Confirmed', 3),
(7, 'Ab And', 'andargieabiy48@Gmail.com 0920352016 1', 'axum', 3, '2024-06-19', '2024-06-20', 'Confirmed', 3),
(8, 'selomon', 'andargieabiy8@gmail.com 0920352016 1', 'Addis baba', 3, '0342-12-31', '0042-12-23', 'Pending', 3),
(9, 'aesd', 'andargieabiyA85@gmail.com 23241345 Wolkite Universti', 'axum', 3, '2024-06-16', '2024-06-18', 'Confirmed', 3),
(10, 'Ab Andargie', 'admin@gmail.com 0920352016 12', 'axum', 2, '2024-06-17', '2024-06-18', 'Pending', 5),
(11, 'Ab And', 'andargieabiyA85@gmail.com 0920352016 1', 'Addis baba', 3, '2024-06-17', '2024-06-20', 'Pending', 3),
(12, 'admin', 'andargieabiyA85@gmail.com 0901013597 adiss abeba', 'sheger', 2, '2024-06-20', '2024-06-21', 'Pending', 5),
(13, 'Meski1', 'eyerusalemdegu@gmail.com 0901013597 sheger', 'sheger', 2, '2024-06-20', '2024-06-21', 'Pending', 3);

-- --------------------------------------------------------

--
-- Table structure for table `book_form`
--

CREATE TABLE `book_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `guests` int(255) NOT NULL,
  `arrivals` date NOT NULL,
  `leaving` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_form`
--

INSERT INTO `book_form` (`id`, `name`, `email`, `phone`, `address`, `location`, `guests`, `arrivals`, `leaving`) VALUES
(0, 'Abiy Andargie', 'andargieabiy48@Gmail.com', '0920352016', '13', 'Addis baba', 2, '2024-06-11', '2024-06-12'),
(0, 'Ab And', 'andargieabiy85@gmail.com', '0920352016', '1', 'Addis baba', 1, '2024-06-10', '2024-06-19'),
(0, 'Ab And', 'andargieabiy48@Gmail.com', '0920352016', '1', 'Addis baba', 3, '2024-06-11', '2024-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_name`, `description`, `price`, `duration`, `image_path`) VALUES
(3, 'Aksum', 'Aksum found in the northern part of ethiopia ', 445.00, '2024-06-20', 'images/aksum.jpg'),
(5, 'couple packages', 'Best couple package in arbamicnch', 300.00, '', 'images/couple.jfif'),
(18, 'Abune Ymata', 'religious tour', 49.00, '2024-06-22', 'images/abuneYmata.png'),
(19, 'omo', 'this tour is about beautifull culture of ethiopia', 200.00, '3', 'images/omo.jpg'),
(20, 'lalibela', 'the best tour package', 200.00, '2024-06-21', 'images/lalibela.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `password`) VALUES
(1, 'Abiy Andargie', 'admin', 'andargieabiyA85@gmail.com', '572567898abfccc27841d86d3922fa7e'),
(2, 'meskerem', 'atamin g', 'meseremdegu06@gmail.com', '$2y$10$3/Fu1PxJVUBzKiTmvZe.WOAEElGKAjFITyTMZuSSSarec60F6FWdG'),
(3, 'meski', 'Meski1', 'eyerusalemdegu@gmail.com', '$2y$10$Mx0dOPP0RdcsUDVYmyLDpOcBcDa/geHTOErIytCmNwuZyd7NZIJ02'),
(4, 'yared m', 'yared1', 'yared@gmail.com', '$2y$10$kSHAYIZYwJJf9KCLQAQBSum4WYxdkLDaNk1Wk82mtLFwN57oXlSi2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `fk_bookings_package_id` (`package_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_bookings_package_id` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
