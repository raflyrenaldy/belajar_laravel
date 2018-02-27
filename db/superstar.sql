-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2018 at 05:58 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superstar`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `KODEOTOMATIS` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE kodebaru CHAR(8);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("CL", LPAD(urut, 6, 0));
 
RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `KODEOTOMATIS2` (`nomer` INT) RETURNS VARCHAR(6) CHARSET latin1 BEGIN
DECLARE kodebaru CHAR(8);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("R", LPAD(urut, 4, 0));
 
RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `KODEOTOMATIS3` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE kodebaru CHAR(8);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("WS", LPAD(urut, 6, 0));
 
RETURN kodebaru;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_account` varchar(255) NOT NULL,
  `join_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `nama`, `no_account`, `join_date`) VALUES
('CL000001', 'Rafly Renaldy', 'RR0201', '11-21-2017'),
('CL000002', 'Fadil K', 'RR0202', '02-14-2018');

--
-- Triggers `clients`
--
DELIMITER $$
CREATE TRIGGER `KODE` BEFORE INSERT ON `clients` FOR EACH ROW BEGIN
DECLARE s VARCHAR(8);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(client_id,3,6) AS Nomer
FROM clients ORDER BY client_id DESC LIMIT 1);
 
SET s = (SELECT KODEOTOMATIS(i));
 
IF(NEW.client_id IS NULL OR NEW.client_id = '')
 THEN SET NEW.client_id =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room`) VALUES
('R0001', 'b410'),
('R0002', 'b411'),
('R0003', 'b415');

--
-- Triggers `rooms`
--
DELIMITER $$
CREATE TRIGGER `kode2` BEFORE INSERT ON `rooms` FOR EACH ROW BEGIN
DECLARE s VARCHAR(8);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(room_id,3,6) AS Nomer
FROM rooms ORDER BY room_id DESC LIMIT 1);
 
SET s = (SELECT KODEOTOMATIS2(i));
 
IF(NEW.room_id IS NULL OR NEW.room_id = '')
 THEN SET NEW.room_id =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$JyRP0nvXTrxM/ZpwZwKI3.ar.JllXH1cRdX4uhbt0XBybbhEpWW/K', 'LDUSa9WEP2WVwvEPrM6w0FNMANl78bjemL0WMtZkiX1OwPvc0JXSktRzxenw', '2018-02-21 19:55:52', '2018-02-21 19:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `workspaces`
--

CREATE TABLE `workspaces` (
  `workspaces_id` varchar(255) NOT NULL,
  `id_clients` varchar(255) NOT NULL,
  `id_room` varchar(255) NOT NULL,
  `dates` datetime NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `workspaces`
--
DELIMITER $$
CREATE TRIGGER `dates` BEFORE INSERT ON `workspaces` FOR EACH ROW BEGIN
DECLARE s VARCHAR(8);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(workspaces_id,3,6) AS Nomer
FROM workspaces ORDER BY workspaces_id DESC LIMIT 1);
 
SET s = (SELECT KODEOTOMATIS3(i));
 
IF(NEW.workspaces_id IS NULL OR NEW.workspaces_id = '')
 THEN SET NEW.workspaces_id =s;
END IF;
set new.dates = sysdate();
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workspaces`
--
ALTER TABLE `workspaces`
  ADD PRIMARY KEY (`workspaces_id`),
  ADD KEY `id_room` (`id_room`),
  ADD KEY `id_clients` (`id_clients`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `workspaces`
--
ALTER TABLE `workspaces`
  ADD CONSTRAINT `workspaces_ibfk_1` FOREIGN KEY (`id_room`) REFERENCES `rooms` (`room_id`),
  ADD CONSTRAINT `workspaces_ibfk_2` FOREIGN KEY (`id_clients`) REFERENCES `clients` (`client_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
