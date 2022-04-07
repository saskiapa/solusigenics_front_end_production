-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 11:43 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solusigenics`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorited`
--

CREATE TABLE `favorited` (
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorited`
--

INSERT INTO `favorited` (`user_id`, `video_id`, `created_at`, `updated_at`) VALUES
(6, 1, '2022-03-30 09:35:55', '2022-03-30 09:35:55'),
(6, 4, '2022-03-30 09:35:58', '2022-03-30 09:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'ha', 'hans@outlook.com', '$2y$10$18p7Cl879ScLNADDcWWwSeNs.FLT7sToyDGuu9AZ0J8TKD04LoKlC', '2022-02-24 07:04:51', '2022-02-24 07:04:51'),
(2, 'hi', 'mnaufalmuafa.dart@gmail.com', '$2y$10$1Y6aMNTFHiDqQPBlL.vbROLiqxIqr4bHlSsGh6dnXohDxtS2YalTu', '2022-02-26 18:37:23', '2022-02-26 18:37:23'),
(3, 'moshatin25', 'moshatin25@eatneha.com', '$2y$10$HEsS4masIK.PtUJQ03srW.8rPMQmJpQqS.zWGlSxjyA4F77hz4lRy', '2022-02-26 19:54:37', '2022-02-26 19:54:37'),
(4, 'charlotejones', 'charlotejones@gmail.com', '$2y$10$gYmwIfUJygkAhGRZwv7fj.0mxmp.3XJPjqr.NfJff8XaPFPfueaIO', '2022-02-26 20:05:10', '2022-02-26 20:05:10'),
(5, 'jessica', 'jessicagracia@gmail.com', '$2y$10$OftLtAT1k2fWq.oFx8Glp.pIHou8esYzudTxVsvodOpNIbILvJMHK', '2022-02-26 20:16:04', '2022-02-26 20:16:04'),
(6, 'lucy', 'lucysmith@gmail.com', '$2y$10$IZVXxDv9myPYtEGZm9BEweKaARKANZQWbtpY.1R2hjUuonh0iKp.i', '2022-02-26 20:19:33', '2022-02-26 20:19:33'),
(7, 'troy', 'troyyates@gmail.com', '$2y$10$XqAUuu80WkQqJXAnERtFpOkUvtuz/nlYWsPiFL0Wzn2qy7MBmHchu', '2022-02-26 20:40:23', '2022-02-26 20:40:23'),
(8, 'kiakia', 'kiakia@gmail.com', '$2y$10$k8/IKIta5fmnqaJ5wWxn6uyMhN693YN7q4Gk7zMkLz4Mq9TJITMi2', '2022-03-13 22:03:55', '2022-03-13 22:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `actual_id` varchar(255) NOT NULL,
  `source` enum('YouTube','Vimeo','','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `actual_id`, `source`, `created_at`, `updated_at`) VALUES
(1, 'OXXEL-Cpvpw', 'YouTube', '2022-03-29 06:31:36', '2022-03-29 06:31:36'),
(2, 'wgLKpB4imP0', 'YouTube', '2022-03-29 06:31:40', '2022-03-29 06:31:40'),
(3, 'RUk6cnJebOA', 'YouTube', '2022-03-29 06:31:44', '2022-03-29 06:31:44'),
(4, 'QwAET2hyVSU', 'YouTube', '2022-03-29 06:40:13', '2022-03-29 06:40:13'),
(5, 'sQL8-3hXBNY', 'YouTube', '2022-03-30 09:01:15', '2022-03-30 09:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `watched`
--

CREATE TABLE `watched` (
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `watched`
--

INSERT INTO `watched` (`user_id`, `video_id`, `created_at`, `updated_at`) VALUES
(6, 1, '2022-03-29 06:31:36', '2022-03-30 09:35:23'),
(6, 2, '2022-03-29 06:31:40', '2022-03-29 06:32:06'),
(6, 3, '2022-03-29 06:31:44', '2022-03-29 06:31:44'),
(6, 4, '2022-03-29 06:40:13', '2022-03-30 09:35:25'),
(6, 5, '2022-03-30 09:01:15', '2022-03-30 09:13:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorited`
--
ALTER TABLE `favorited`
  ADD PRIMARY KEY (`user_id`,`video_id`),
  ADD KEY `fk_favorited_video_id_videos_id` (`video_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watched`
--
ALTER TABLE `watched`
  ADD PRIMARY KEY (`user_id`,`video_id`),
  ADD KEY `fk_watched_video_id_videos_id` (`video_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorited`
--
ALTER TABLE `favorited`
  ADD CONSTRAINT `fk_favorited_user_id_users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_favorited_video_id_videos_id` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `watched`
--
ALTER TABLE `watched`
  ADD CONSTRAINT `fk_watched_user_id_users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_watched_video_id_videos_id` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
