-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2020 at 03:44 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simplecms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Electornics', '2020-09-07 03:34:51', '2020-09-07 03:34:51'),
(2, 'Vehicals', '2020-09-07 03:35:12', '2020-09-07 03:43:20'),
(5, 'Flowers', '2020-09-07 03:45:34', '2020-09-07 03:45:34'),
(6, 'Animals', '2020-09-07 03:47:40', '2020-09-07 03:47:40'),
(7, 'Fruits', '2020-09-07 05:06:18', '2020-09-07 05:06:18'),
(8, 'Birds', '2020-09-07 05:09:08', '2020-09-07 05:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'India', '2020-09-04 04:24:31', '2020-09-04 04:24:31'),
(2, 'Pakistan', '2020-09-04 04:25:55', '2020-09-04 04:25:55'),
(3, 'Canada', '2020-09-04 04:26:04', '2020-09-04 04:40:28'),
(4, 'Japan', '2020-09-04 04:26:21', '2020-09-04 04:26:21'),
(5, 'America', '2020-09-04 04:27:36', '2020-09-04 04:27:36'),
(7, 'Russia', '2020-09-04 14:53:40', '2020-09-04 14:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_02_105656_create_roles_table', 1),
(5, '2020_09_04_094057_create_countries_table', 2),
(8, '2020_09_04_103319_create_user_profiles_table', 3),
(9, '2020_09_04_104002_create_role_user_table', 3),
(10, '2020_09_07_085357_create_categories_table', 4),
(11, '2020_09_07_091810_create_products_table', 5),
(17, '2020_09_07_105223_create_purchases_table', 6),
(20, '2020_09_07_144954_create_purchase_product_table', 7),
(22, '2020_09_07_150354_create_product_purchase_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Computer', 25000, '2020-09-07 04:11:57', '2020-09-07 04:11:57'),
(2, 2, 'Bike', 13250, '2020-09-07 04:17:37', '2020-09-07 04:17:37'),
(3, 6, 'Cow', 1120, '2020-09-07 04:18:07', '2020-09-07 04:50:36'),
(7, 1, 'Television', 23650, '2020-09-07 04:51:52', '2020-09-07 04:51:52'),
(8, 6, 'Dog', 34, '2020-09-07 04:52:10', '2020-09-07 05:10:03'),
(10, 5, 'Rose', 63, '2020-09-07 04:53:51', '2020-09-07 04:53:51'),
(11, 1, 'Laptop', 26890, '2020-09-07 04:54:17', '2020-09-07 04:54:17'),
(12, 5, 'Lotus', 19, '2020-09-07 05:07:02', '2020-09-07 05:07:28'),
(13, 8, 'Peacock', 399, '2020-09-07 05:09:25', '2020-09-07 05:12:54'),
(15, 1, 'Mobile', 13650, '2020-09-07 05:57:08', '2020-09-07 05:57:08'),
(16, 2, 'Car', 13500, '2020-09-07 11:00:02', '2020-09-07 11:00:02'),
(17, 5, 'Sun Flower', 68, '2020-09-07 11:18:59', '2020-09-07 11:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_purchase`
--

CREATE TABLE `product_purchase` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_purchase`
--

INSERT INTO `product_purchase` (`id`, `product_id`, `purchase_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 11, 1, NULL, NULL),
(3, 13, 2, NULL, NULL),
(4, 2, 3, NULL, NULL),
(5, 10, 4, NULL, NULL),
(6, 12, 4, NULL, NULL),
(8, 8, 6, NULL, NULL),
(9, 1, 7, NULL, NULL),
(10, 11, 7, NULL, NULL),
(11, 15, 7, NULL, NULL),
(12, 13, 8, NULL, NULL),
(17, 8, 9, NULL, NULL),
(20, 10, 10, NULL, NULL),
(21, 12, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `category_id`, `purchase_date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 6, 1, '2020-09-18', 51890, '2020-09-07 09:40:09', '2020-09-07 09:40:09'),
(2, 6, 8, '2020-09-11', 399, '2020-09-07 09:40:48', '2020-09-07 09:40:48'),
(3, 2, 2, '2020-09-16', 13250, '2020-09-07 09:42:06', '2020-09-07 09:42:06'),
(4, 3, 5, '2020-09-25', 82, '2020-09-07 09:42:46', '2020-09-07 09:42:46'),
(6, 1, 6, '2020-09-29', 34, '2020-09-07 10:00:17', '2020-09-08 13:32:23'),
(7, 3, 1, '2020-10-05', 65540, '2020-09-07 10:01:30', '2020-09-07 10:01:30'),
(8, 4, 8, '2020-09-03', 399, '2020-09-07 10:07:32', '2020-09-07 10:07:32'),
(9, 6, 6, '2020-09-24', 34, '2020-09-07 11:04:57', '2020-09-07 11:05:24'),
(10, 2, 5, '2020-10-01', 82, '2020-09-07 11:06:07', '2020-09-07 11:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product`
--

CREATE TABLE `purchase_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2020-09-02 07:11:02', '2020-09-02 07:11:02'),
(2, 'Customer', '2020-09-02 12:49:40', '2020-09-02 12:49:40'),
(3, 'visitor', '2020-09-02 13:05:13', '2020-09-02 13:05:13'),
(4, 'Subscribers', '2020-09-02 13:07:16', '2020-09-04 04:08:52'),
(8, 'Super Admin', '2020-09-03 08:19:37', '2020-09-04 04:09:09'),
(10, 'Guest', '2020-09-03 14:05:12', '2020-09-04 12:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 4, 1, NULL, NULL),
(4, 2, 3, NULL, NULL),
(5, 3, 3, NULL, NULL),
(6, 8, 3, NULL, NULL),
(7, 2, 2, NULL, NULL),
(8, 4, 2, NULL, NULL),
(9, 8, 2, NULL, NULL),
(13, 2, 6, NULL, NULL),
(14, 3, 6, NULL, NULL),
(17, 1, 7, NULL, NULL),
(18, 2, 7, NULL, NULL),
(19, 3, 7, NULL, NULL),
(20, 8, 7, NULL, NULL),
(21, 4, 10, NULL, NULL),
(22, 4, 11, NULL, NULL),
(23, 1, 4, NULL, NULL),
(24, 4, 12, NULL, NULL),
(25, 8, 4, NULL, NULL),
(27, 4, 14, NULL, NULL),
(28, 4, 15, NULL, NULL),
(29, 4, 16, NULL, NULL),
(30, 4, 17, NULL, NULL),
(31, 4, 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin123@yopmail.com', '2020-09-08 05:03:40', '$2y$10$mj041TT.MTQ8Rtymj0Xtn.WqJK7B/R372sykTXzZPuU4BbGJBIj6a', 'zvn56Fk2Ig4rpOfrC2tFB5ivwc9afEdDGoCmTbKDxHXgV1Bmevohd6ugw5JS', '2020-09-04 08:21:29', '2020-09-11 09:10:15'),
(2, 'Dinesh Shah', 'dinesh322@yopmail.com', NULL, '$2y$10$Vw9rOTdqTwhyFQHsPWaQ8uIF685FKZAEaHobd9YtkHmQMhzCYrq6W', NULL, '2020-09-04 08:22:49', '2020-09-04 10:26:40'),
(3, 'Ravi Patel', 'ravi123@yopmail.com', '2020-09-08 06:58:02', '$2y$10$Putf078SSFBcPhRIG0xe6OMNEcpBmGcNuTMc1nykCrBdxHrNk7wfu', 'a1bEt0dKIi3EAt6xQgTOmK8ZQwfgDUTMWGjjns0lwFxCnZarApaFIIKdwYIH', '2020-09-04 08:24:41', '2020-09-08 06:58:02'),
(4, 'Mitesh Patel', 'mitesh1997@yopmail.com', '2020-09-08 05:07:41', '$2y$10$JVMiIbWtwbNDd3jgbfUDC.7OScUbA4QdvtIxE5Hbp40TVHuxBbQRa', 'nSD5LqVFCz8LOtu0bYiTEEEIEsicRbME1ERtKxIvhdvBcD8B6qzv3WXzGOFH', '2020-09-04 10:29:21', '2020-09-08 14:12:46'),
(6, 'Nikul Kadivar', 'nikul123@yopmail.com', NULL, '$2y$10$NXnm/Z5iFyIhuiJJut6CRun8FrDzXSwlIUu.JBn.hC9QMcYWpX7LG', NULL, '2020-09-04 10:32:51', '2020-09-08 03:30:06'),
(7, 'Naresh', 'naresh243@yopmail.com', NULL, '$2y$10$JzJWld8ZzboP/rPBinoSU.nrfp4vWEQ4WOSuukImg6WHcDj4u.ogC', NULL, '2020-09-04 10:59:29', '2020-09-04 10:59:29'),
(10, 'Sanjay Dervadiya', 'sanju123@yopmail.com', '2020-09-08 05:13:31', '$2y$10$7roiGlMKIvsp3PoKnLxeAenC8rrIsedaSV0HrM9ZyCYtMYnjjUq96', NULL, '2020-09-07 13:23:35', '2020-09-08 05:13:31'),
(11, 'Gaurav Patel', 'gaurav123@yopmail.com', NULL, '$2y$10$bPvoudFr2pRzvKyAkp7hr.uZsZNcXZeOwG9Wk9T30QHKD2.ej40R2', NULL, '2020-09-07 13:25:05', '2020-09-07 13:25:05'),
(12, 'Chirag Kadivar', 'chirag123@yopmail.com', '2020-09-08 05:27:42', '$2y$10$FemKaoCEHzE8nxtB27glPOy9DCVjrwuFs9UB1VjEBjfK5AIv3qFJm', NULL, '2020-09-08 05:26:48', '2020-09-08 05:27:42'),
(14, 'Rajesh Patel', 'rajesh123@yopmail.com', '2020-09-09 05:31:54', '$2y$10$Nm.Xi2zT/zuIhZ.51OOIXexQWiKBDNe9bdb/KqwiNhrS2Mmq2bCyC', NULL, '2020-09-09 05:30:40', '2020-09-09 05:31:54'),
(15, 'Bharat Patel', 'bharat123@yopmail.com', NULL, '$2y$10$QYrXbt7qRQgYQ/je0/9rG.ZX50wma3MBAYuwg4t492yZTE8hjspWe', NULL, '2020-09-09 06:02:09', '2020-09-09 06:02:09'),
(18, 'Naksh', 'naksh123@yopmail.com', '2020-10-10 05:32:49', '$2y$10$59/Kmk15LPQ6TX0a/ORwR.BZqsf1adaqfHy89PKeRaucy0WI7CM3O', NULL, '2020-10-10 05:32:02', '2020-10-10 05:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `city`, `phone`, `country_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ahmedabad', '9875646542', 3, 'profiles/profile_437.jpg', '2020-09-04 08:21:29', '2020-09-11 09:10:15'),
(2, 2, 'Dharangadhra', '9558561989', 2, 'profiles/profile_346.jpg', '2020-09-04 08:22:49', '2020-09-08 13:31:09'),
(3, 3, 'Surat', '9635731657', 2, 'profiles/dummy.jpg', '2020-09-04 08:24:42', '2020-09-08 03:29:44'),
(4, 4, 'Bharuch', '9723507622', 1, 'profiles/profile_441.jpg', '2020-09-04 10:29:21', '2020-11-03 04:16:47'),
(6, 6, 'Patdi', '955862134', 4, 'profiles/dummy.jpg', '2020-09-04 10:32:51', '2020-09-08 03:30:06'),
(7, 7, 'Lakhatar', '7621986254', 5, 'profiles/profile_225.jpg', '2020-09-04 10:59:29', '2020-09-04 11:42:48'),
(9, 10, 'default', '9876543210', 1, 'profiles/dummy.jpg', '2020-09-07 13:23:35', '2020-09-07 13:23:35'),
(10, 11, 'default', '9876543210', 1, 'profiles/dummy.jpg', '2020-09-07 13:25:05', '2020-09-07 13:25:05'),
(11, 12, 'default', '9876543210', 1, 'profiles/dummy.jpg', '2020-09-08 05:26:48', '2020-09-08 05:26:48'),
(13, 14, 'default', '9876543210', 1, 'profiles/dummy.jpg', '2020-09-09 05:30:41', '2020-09-09 05:30:41'),
(14, 15, 'default', '9876543210', 1, 'profiles/dummy.jpg', '2020-09-09 06:02:09', '2020-09-09 06:02:09'),
(17, 18, 'default', '9876543210', 1, 'profiles/dummy.jpg', '2020-10-10 05:32:02', '2020-10-10 05:32:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_purchase`
--
ALTER TABLE `product_purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_purchase_product_id_foreign` (`product_id`),
  ADD KEY `product_purchase_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_user_id_foreign` (`user_id`),
  ADD KEY `purchases_category_id_foreign` (`category_id`);

--
-- Indexes for table `purchase_product`
--
ALTER TABLE `purchase_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_product_product_id_foreign` (`product_id`),
  ADD KEY `purchase_product_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_profiles_user_id_unique` (`user_id`),
  ADD KEY `user_profiles_country_id_foreign` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_purchase`
--
ALTER TABLE `product_purchase`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `purchase_product`
--
ALTER TABLE `purchase_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_purchase`
--
ALTER TABLE `product_purchase`
  ADD CONSTRAINT `product_purchase_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_purchase_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `purchase_product`
--
ALTER TABLE `purchase_product`
  ADD CONSTRAINT `purchase_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `purchase_product_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
