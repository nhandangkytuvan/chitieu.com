-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2017 at 01:56 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vt_chitieu`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_money` int(11) UNSIGNED NOT NULL,
  `post_detail` longtext NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `post_money`, `post_detail`, `post_date`, `created_at`, `updated_at`) VALUES
(4, 1, 35000, '2 con cá chép và dưa chua', '2017-03-01 17:00:00', '2017-03-04 01:12:14', '2017-03-03 18:12:14'),
(5, 1, 23000, 'hành tây, rau, thịt', '2017-03-02 17:00:00', '2017-03-04 01:12:23', '2017-03-03 18:12:23'),
(7, 1, 70000, 'Thịt - mirinda - tep - sunlight', '2017-03-04 17:00:00', '2017-03-05 18:28:37', '2017-03-05 18:28:37'),
(8, 1, 30000, 'Thịt', '2017-03-05 17:00:00', '2017-03-06 18:07:28', '2017-03-06 18:07:28'),
(9, 1, 100000, 'Cá cơm khô, hến , cá tươi', '2017-03-06 17:00:00', '2017-03-07 18:00:05', '2017-03-07 18:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_avatar` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `user_avatar`, `user_name`, `user_email`, `created_at`, `updated_at`) VALUES
(1, 'truong', '$2y$10$tH09Kl4W7/DAjMvXYfss2.S98ZBpa/K83MiOFSvjRcWmgy1OcYMpm', 'pham-van-truong-1487748942.jpeg', 'Trường', 'hanoi@hotmail.com', '2017-03-02 02:26:55', '2017-03-01 19:26:55'),
(2, 'son', '$2y$10$Je25xJ27s4voWRXicw8Ly.oTcMff.Sjh8JATIYv3buriHsEZEoNH.', 'pham-thanh-thuy-1487754937.jpeg', 'Sơn', 'vantruong3289@gmail.com', '2017-03-02 02:29:35', '2017-03-01 19:29:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
