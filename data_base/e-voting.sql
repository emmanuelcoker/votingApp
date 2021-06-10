-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2017 at 10:33 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `votes` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `seat`, `regno`, `votes`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Brian', 'president', 'DIT-C004-0536\\2013', 0, 2, '2017-05-12 07:43:58', '2017-05-12 07:43:58'),
(2, 'Dave', 'vice-chair', 'DIT-C004-0532\\2014', 0, 3, '2017-05-12 07:44:03', '2017-05-12 07:44:03'),
(3, 'Allan', 'finance', 'DIT-C004-0536\\2014', 0, 5, '2017-05-12 07:44:09', '2017-05-12 07:44:09'),
(4, 'Mike', 'sec-general', 'DIT-C004-0536\\2011', 1, 6, '2017-05-12 07:44:17', '2017-05-12 10:51:36'),
(5, 'Juma', 'president', 'DIT-C004-0516\\2013', 3, 7, '2017-05-12 08:03:03', '2017-05-12 13:48:54'),
(6, 'Gallar', 'vice-chair', 'DIT-C004-0291\\2013', 3, 8, '2017-05-12 08:03:09', '2017-05-12 13:48:54'),
(7, 'Mudavi', 'finance', 'DIT-C004-051\\2013', 3, 9, '2017-05-12 08:03:20', '2017-05-12 13:48:54'),
(8, 'Hashi', 'sec-general', 'DIT-C004-0506\\2014', 2, 10, '2017-05-12 08:03:25', '2017-05-12 13:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(41, '2014_10_12_100000_create_password_resets_table', 1),
(42, '2014_10_12_153604_create_users_table', 1),
(43, '2017_05_05_000000_create_candidates_table', 1),
(44, '2017_05_05_000000_create_roles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2017-05-12 06:12:01', '2017-05-12 06:12:01'),
(2, 'voter', '2017-05-12 06:12:01', '2017-05-12 06:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `regno`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Derrick', 'dkip64@gmail.com', '$2y$10$nbZ/YHatgMcpFsN9kwMDk.3KH2N.HPQok6U6NrW16Zi4Tn50.eJoi', 'C004-0415/2014', 1, 'yJsLdOqe1Y4Ky2Avg5MdIra1uN0bdv7zubfZTHzSJv5JyyWLQmYRg5dFnSCR', '2017-05-12 06:12:01', '2017-05-12 06:12:01'),
(2, 'Brian', 'Brian@gmail.com', '$2y$10$r5K0hLeXwT2Hg.SQI4.Ij.cx25s7yuhaJx0/0eHFq2d69Ns559j8y', 'DIT-C004-0536\\2013', 2, NULL, '2017-05-12 06:19:17', '2017-05-12 06:19:17'),
(3, 'Dave', 'dave@gmail.com', '$2y$10$h72hqFSGLHy4.LP6jpXexOlZJrMpN4ki9hC49oIcgMTAYFDHhViRa', 'DIT-C004-0532\\2014', 2, '82mbE84q3JpqgMLIof5TTw874gZ6w33QMArOJCerMexIfhUGkvRBD3uRKJ77', '2017-05-12 06:22:22', '2017-05-12 06:22:22'),
(5, 'Allan', 'allan@gmail.com', '$2y$10$iTXTp5Yo8L7NGVHs4WXHWuX4s8Vd0l.2SmXaODcg4VnRrZwdCfX0G', 'DIT-C004-0536\\2014', 2, NULL, '2017-05-12 06:34:41', '2017-05-12 06:34:41'),
(6, 'Mike', 'mike@gmail.com', '$2y$10$NOH7iqX5z8zP97WSMGAZQOU7Ir5DfiiSz6skDDIXWP8GQRChWO8va', 'DIT-C004-0536\\2011', 2, NULL, '2017-05-12 07:23:35', '2017-05-12 07:23:35'),
(7, 'Juma', 'juma@gmail.com', '$2y$10$lKeS2kxfftwLyQrnphGA/OZeq1eKLLrRp0uRKJ9GrsxJ282x4/h7S', 'DIT-C004-0516\\2013', 2, NULL, '2017-05-12 07:24:10', '2017-05-12 07:24:10'),
(8, 'Gallar', 'gallar@gmail.com', '$2y$10$CmEz6ruiTxI2J7yEC/dAy.Dtg9KE31UFpzuuvy2tLFLYk7kVnLBMq', 'DIT-C004-0291\\2013', 2, NULL, '2017-05-12 07:25:19', '2017-05-12 07:25:19'),
(9, 'Mudavi', 'mudavi@gmail.com', '$2y$10$41U2AfKTlyhdXG.k3HSm2u0/ZDBGfdB9eNcjPzkCa7e/Y1htfwcdO', 'DIT-C004-051\\2013', 2, NULL, '2017-05-12 07:29:45', '2017-05-12 07:29:45'),
(10, 'Hashi', 'hashi@gmail.com', '$2y$10$OJ0zX2Cr2wh0wLrBF3w1ROVfODy1o3JlU1iworifNr.9a8EFkEOES', 'DIT-C004-0506\\2014', 2, NULL, '2017-05-12 07:41:25', '2017-05-12 07:41:25'),
(11, 'Gobby', 'gobby@gmail.com', '$2y$10$JZLxiine7peb.rLjvIkGfunY/SnNm4XvsIe9iX8CXrotH/y3dK64S', 'DIT-C004-0436\\2014', 2, NULL, '2017-05-16 04:38:23', '2017-05-16 04:38:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
