-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 04:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


-- /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
-- /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
-- /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
-- /*!40101 SET NAMES utf8mb4 */;

-- --
-- -- Database: `missskin`
-- --

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `home`
-- --

-- CREATE TABLE `home` (
--   `ID` int(11) NOT NULL,
--   `home_image` varchar(255) NOT NULL,
--   `home_emri` varchar(255) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `user`
-- --

-- CREATE TABLE `user` (
--   `id` int(11) NOT NULL,
--   `Full Name` varchar(255) NOT NULL,
--   `Username` varchar(255) NOT NULL,
--   `Email` varchar(255) NOT NULL,
--   `Password` varchar(20) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --
-- -- Indexes for dumped tables
-- --

-- --
-- -- Indexes for table `home`
-- --
-- ALTER TABLE `home`
--   ADD PRIMARY KEY (`ID`);

-- --
-- -- Indexes for table `user`
-- --
-- ALTER TABLE `user`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- AUTO_INCREMENT for dumped tables
-- --

-- --
-- -- AUTO_INCREMENT for table `home`
-- --
-- ALTER TABLE `home`
--   MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

-- --
-- -- AUTO_INCREMENT for table `user`
-- --
-- ALTER TABLE `user`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
