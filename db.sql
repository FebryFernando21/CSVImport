-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2019 at 10:44 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10
 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET GLOBAL time_zone = '+7:00';

--
-- Database: `CSVImport`
--
 
-- --------------------------------------------------------
 
--
-- Table structure for table `csv_data`
--
 
CREATE TABLE `csv_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `csv_filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `csv_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 
--
-- Indexes for dumped tables
--
 
--
-- Indexes for table `csv_data`
--
ALTER TABLE `csv_data`
  ADD PRIMARY KEY (`id`);
 
--
-- AUTO_INCREMENT for dumped tables
--
 
--
-- AUTO_INCREMENT for table `csv_data`
--
ALTER TABLE `csv_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;