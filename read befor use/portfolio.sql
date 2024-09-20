-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2024 at 02:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `title` varchar(200) NOT NULL,
  `main_title` varchar(100) DEFAULT NULL,
  `hastag` varchar(200) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `status`, `title`, `main_title`, `hastag`, `img`, `file`, `created_at`, `updated_at`) VALUES
(2, 1, 'កាមេរ៉ានិងលែនអ្វីដំបូង?', 'camera ', 'shoot camera  ', '1724295864.jpg', '1724309748.html', '2024-08-21 15:54:37', '2024-08-22 08:55:48'),
(5, 1, 'ជីវិតនៅសាកលវិទ្យាល័យ', 'university ', 'mylife university ', '1724249833.jpg', '1724249833.html', '2024-08-21 16:17:13', '2024-08-21 16:17:13'),
(6, 1, 'គំនិតឆ្នៃប្រឌិតនិងការបង្កើត!', 'photoshop ', 'design artic ', '1724296057.jpg', '1724309018.html', '2024-08-22 05:07:37', '2024-08-22 11:52:17'),
(7, 1, 'ហេតុអ្វីរៀនអាយធី?', 'learnit', 'whyit whatit', '1724296107.jpg', '1724308812.html', '2024-08-22 05:08:27', '2024-08-22 08:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `role`, `profile`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'My', 'Research', 1, 'favicon.png', 'admin@gmail.com', '164c21c23bb981fb6e4fa17fe92023fe', '2024-08-20 21:01:00', '2024-08-20 21:01:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
