-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2018 at 11:53 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
('CL000002', 'Siapa', 'RR0202', '02-14-2018'),
('CL000003', 'Dilan', 'RR02003', '03-20-2018'),
('CL000005', 'Rumahmu', 'RR32123', '02-25-2018');

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

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_04_24_132459_create_roles_table', 1),
(2, '2018_04_24_133034_create_user_roles_table', 1),
(3, '2018_04_25_080305_add_column_role_id_to_users', 2),
(4, '2018_04_25_081012_create_roles_table', 3),
(5, '2018_04_25_103544_add_avatar_column_to_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `full_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'Super Admin', '2018-04-25 01:25:56', '2018-04-25 01:25:56'),
(2, 'admin', 'Admin', '2018-04-25 01:25:56', '2018-04-25 01:25:56'),
(3, 'user', 'User', '2018-04-25 01:25:56', '2018-04-25 01:25:56');

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
('R0002', 'b415');

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
  `role_id` int(11) NOT NULL DEFAULT '3',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `avatar`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', NULL, 'admin@admin.com', '$2y$10$.2g8GqjGqXxoJiL6Jf7tNO81jPqqA.1/To1BmrYWwyFKMoZJCy6cG', 'TFItsLAIBTfbWJDbOBtB2IZa1Ta7H1Z0LDZ0yBSmUwnrHmjYghAfJ9VzngpF', '2018-04-25 21:53:31', '2018-04-25 21:53:31'),
(6, 2, 'Reza', NULL, 'reza@gmail.com', '$2y$10$YrMUk8eYwACbpZVJf/ZfmuNCBdOmgi6cJmSaBcg26Z7/vWAOyhl8u', '3tNdzR3H4kcqM0V3G9HEbgkgT5iJMXuPFlL7Fft7yLDgS4Jeb51g3oYMOyDP', '2018-04-26 03:00:20', '2018-04-26 03:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(1, 1);

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
-- Dumping data for table `workspaces`
--

INSERT INTO `workspaces` (`workspaces_id`, `id_clients`, `id_room`, `dates`, `video`) VALUES
('WS000001', 'CL000002', 'R0001', '2018-04-23 16:48:05', 'Video1.mp4'),
('WS000002', 'CL000003', 'R0002', '2018-04-23 18:36:21', '37384.t.mp4'),
('WS000003', 'CL000003', 'R0001', '2018-04-23 18:36:36', '37349.t.mp4'),
('WS000004', 'CL000002', 'R0001', '2018-04-23 18:36:45', '37351.t.mp4'),
('WS000005', 'CL000002', 'R0002', '2018-04-23 18:36:58', '37357.t.mp4'),
('WS000006', 'CL000001', 'R0002', '2018-04-24 17:10:25', '37361.t.mp4'),
('WS000007', 'CL000001', 'R0001', '2018-04-24 17:10:43', '37384.t.mp4'),
('WS000008', 'CL000001', 'R0001', '2018-04-24 17:11:05', '37358.t.mp4'),
('WS000009', 'CL000002', 'R0002', '2018-04-24 17:11:19', '37380.t.mp4'),
('WS000010', 'CL000001', 'R0002', '2018-04-24 17:11:29', '37381.t.mp4'),
('WS000011', 'CL000002', 'R0001', '2018-04-24 17:11:40', '37378.t.mp4'),
('WS000012', 'CL000001', 'R0001', '2018-04-24 18:53:37', 'Video1.mp4'),
('WS000013', 'CL000001', 'R0002', '2018-04-24 19:30:37', '37378.t.mp4'),
('WS000014', 'CL000001', 'R0001', '2018-04-24 19:41:57', '37363.t.mp4'),
('WS000015', 'CL000001', 'R0001', '2018-04-24 19:42:16', '37380.t.mp4'),
('WS000016', 'CL000002', 'R0001', '2018-04-24 19:43:08', '37384.t-20180424.mp4'),
('WS000017', 'CL000002', 'R0002', '2018-04-24 19:44:03', '37361.t-120403.mp4'),
('WS000018', 'CL000002', 'R0001', '2018-04-24 19:46:20', '37358.t-190419.mp4'),
('WS000019', 'CL000001', 'R0002', '2018-04-24 19:47:53', '37361.t-194753.mp4'),
('WS000020', 'CL000003', 'R0001', '2018-04-25 21:15:25', '37381.t-211524.mp4'),
('WS000021', 'CL000001', 'R0001', '2018-04-11 14:30:00', '37384.t-094623.mp4'),
('WS000022', 'CL000001', 'R0001', '2018-04-26 10:30:00', '37378.t-094655.mp4'),
('WS000023', 'CL000001', 'R0001', '2018-04-27 00:00:00', '37363.t-154720.mp4');

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
