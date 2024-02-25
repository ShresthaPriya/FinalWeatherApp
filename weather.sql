-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 08:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weather`
--

-- --------------------------------------------------------

--
-- Table structure for table `forecast_data`
--

CREATE TABLE `forecast_data` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `temperature` decimal(5,2) NOT NULL,
  `humidity` int(11) NOT NULL,
  `pressure` int(11) NOT NULL,
  `wind_speed` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forecast_data`
--

INSERT INTO `forecast_data` (`id`, `city`, `date`, `temperature`, `humidity`, `pressure`, `wind_speed`) VALUES
(149, 'Bakersfield', '2023-04-28', '29.31', 33, 1012, '1.54'),
(150, 'Bakersfield', '2023-04-29', '28.23', 40, 1013, '1.79'),
(151, 'Bakersfield', '2023-04-30', '26.84', 30, 1010, '4.12'),
(152, 'Bakersfield', '2023-05-01', '16.52', 44, 1009, '4.63'),
(153, 'Bakersfield', '2023-05-02', '16.33', 47, 1009, '4.12'),
(154, 'Bakersfield', '2023-05-03', '16.07', 54, 1009, '1.54'),
(157, 'Bakersfield', '2023-05-04', '15.59', 60, 1011, '2.68'),
(158, 'Bakersfield', '2023-05-05', '14.74', 69, 1016, '1.79'),
(164, 'Bakersfield', '2023-05-06', '18.34', 46, 1014, '4.71'),
(165, 'Bakersfield', '2023-05-07', '20.82', 32, 1015, '5.23'),
(166, 'Bakersfield', '2023-05-08', '22.54', 32, 1015, '3.66'),
(167, 'Bakersfield', '2023-05-09', '24.37', 28, 1014, '3.87'),
(168, 'Bakersfield', '2023-05-10', '22.04', 29, 1011, '11.06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forecast_data`
--
ALTER TABLE `forecast_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `city` (`city`,`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forecast_data`
--
ALTER TABLE `forecast_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
