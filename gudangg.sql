-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2023 at 04:06 PM
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
-- Database: `gudangg`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_18_145532_product_table', 1),
(6, '2023_05_18_153043_create_product_items_table', 1),
(7, '2023_05_19_092102_create_transactions_table', 1),
(8, '2023_05_19_093903_create_transaction_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `model_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `name`, `brand`, `price`, `model_no`) VALUES
(3, '2023-05-19 21:29:54', '2023-05-19 21:29:54', 'Iphone 14 Pro', 'Apple', '24000000', 'i14/2023'),
(4, '2023-05-19 21:30:22', '2023-05-19 21:30:22', 'Iphone 12', 'Apple', '15000000', 'i12/2021'),
(5, '2023-05-19 21:31:06', '2023-05-19 23:32:39', 'Galaxy S23 Ultra', 'Samsung', '23000000', 's23/2023'),
(6, '2023-05-20 04:56:23', '2023-05-20 04:56:23', 'Iphone 13', 'Apple', '18000000', '2022/99'),
(7, '2023-05-20 05:19:09', '2023-05-20 05:19:22', 'Galaxy Flip Z', 'Samsung', '26000000', '2023/08');

-- --------------------------------------------------------

--
-- Table structure for table `product_items`
--

CREATE TABLE `product_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_product` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `production_date` varchar(255) NOT NULL,
  `warranty_start` varchar(255) NOT NULL,
  `warranty_duration` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_items`
--

INSERT INTO `product_items` (`id`, `created_at`, `updated_at`, `id_product`, `serial_number`, `production_date`, `warranty_start`, `warranty_duration`, `status`) VALUES
(13, '2023-05-19 21:33:24', '2023-05-19 21:35:58', '3', 'ip14/#001', '2023-05-01', '2023-05-20 04:35:58', '24', 'used'),
(14, '2023-05-19 21:33:24', '2023-05-20 01:00:54', '3', 'ip14/#002', '2023-05-01', '2023-05-20 08:00:54', '24', 'used'),
(15, '2023-05-19 21:33:24', '2023-05-20 01:00:54', '4', 'ip12/#001', '2021-01-01', '2023-05-20 08:00:54', '6', 'used'),
(16, '2023-05-19 21:35:09', '2023-05-19 21:35:58', '5', 's23/#001', '2023-05-01', '2023-05-20 04:35:58', '12', 'used'),
(17, '2023-05-19 21:35:09', '2023-05-20 01:13:03', '5', 's23/#002', '2023-05-02', '2023-05-20 08:13:03', '12', 'used'),
(18, '2023-05-20 00:00:10', '2023-05-20 01:13:20', '5', 's23/#003', '2023-05-26', '2023-05-20 08:13:20', '12', 'used'),
(19, '2023-05-20 01:17:40', '2023-05-20 02:11:03', '5', 's23/#004', '2023-02-07', '2023-05-20 09:11:03', '24', 'used'),
(20, '2023-05-20 01:21:48', '2023-05-20 02:26:02', '3', 'ip14/#003', '2023-05-01', '2023-05-20 09:26:02', '12', 'used'),
(21, '2023-05-20 01:22:12', '2023-05-20 04:37:27', '3', 'ip14/#004', '2023-05-26', '2023-05-20 11:37:27', '12', 'used'),
(22, '2023-05-20 04:46:18', '2023-05-20 04:46:48', '3', 'ip14/#005', '2023-05-01', '2023-05-20 11:46:48', '12', 'used'),
(23, '2023-05-20 04:46:18', '2023-05-20 04:46:18', '3', 'ip14/#005', '2023-05-25', '-', '12', 'available'),
(24, '2023-05-20 04:52:20', '2023-05-20 04:52:20', '5', 's23/#005', '2023-05-16', '-', '12', 'available'),
(25, '2023-05-20 04:52:20', '2023-05-20 04:52:20', '5', 's23/#006', '2023-05-31', '-', '12', 'available'),
(26, '2023-05-20 04:52:20', '2023-05-20 05:22:18', '5', 's23/#007', '2023-05-28', '2023-05-20 12:22:18', '12', 'used'),
(27, '2023-05-20 04:57:55', '2023-05-20 04:58:56', '6', 'ip13/#001', '2023-05-31', '2023-05-20 11:58:56', '12', 'used'),
(28, '2023-05-20 04:57:55', '2023-05-20 04:58:56', '6', 'ip13/#002', '2023-05-31', '2023-05-20 11:58:56', '12', 'used'),
(29, '2023-05-20 04:57:55', '2023-05-20 04:58:56', '6', 'ip13/#003', '2023-05-31', '2023-05-20 11:58:56', '12', 'used'),
(30, '2023-05-20 05:20:45', '2023-05-20 05:22:18', '7', 'flz/#001', '2023-05-31', '2023-05-20 12:22:18', '12', 'used'),
(31, '2023-05-20 05:20:45', '2023-05-20 05:22:18', '7', 'flz/#002', '2023-05-31', '2023-05-20 12:22:18', '12', 'used');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_date` varchar(255) NOT NULL,
  `transaction_number` varchar(255) NOT NULL,
  `partner` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `created_at`, `updated_at`, `transaction_date`, `transaction_number`, `partner`, `type`) VALUES
(15, '2023-05-19 21:33:24', '2023-05-19 21:33:24', '2023-04-20 04:33:24', '20/5/2032/#P0001', 'Ibox', 'procurement'),
(16, '2023-05-19 21:35:09', '2023-05-19 21:35:09', '2023-03-20 04:35:09', '20/5/2032/#P0002', 'Sein', 'procurement'),
(17, '2023-05-19 21:35:58', '2023-05-19 21:35:58', '2023-05-20 04:35:58', '20/5/2032/#S0001', 'Jason', 'sale'),
(18, '2023-05-20 00:00:10', '2023-05-20 00:00:10', '2023-05-20 07:00:10', '20/5/2032/#P0003', 'Sein', 'procurement'),
(19, '2023-05-20 01:00:54', '2023-05-20 01:00:54', '2023-05-20 08:00:54', '20/5/2032/#S0002', 'Nia', 'sale'),
(20, '2023-05-20 01:13:03', '2023-05-20 01:13:03', '2023-05-20 08:13:03', '20/5/2032/#S0003', 'John', 'sale'),
(21, '2023-05-20 01:13:20', '2023-05-20 01:13:20', '2023-05-20 08:13:20', '20/5/2032/#S0004', 'Victor', 'sale'),
(22, '2023-05-20 01:17:40', '2023-05-20 01:17:40', '2023-01-20 08:17:40', '2/1/2032/#P0004', 'Sein', 'procurement'),
(23, '2023-05-20 01:21:48', '2023-05-20 01:21:48', '2023-02-20 08:21:48', '2/2/2032/#P0005', 'Ibox', 'procurement'),
(24, '2023-05-20 01:22:12', '2023-05-20 01:22:12', '2023-02-20 08:22:12', '2/2/2032/#P0006', 'Ibox', 'procurement'),
(25, '2023-05-20 02:11:03', '2023-05-20 02:11:03', '2023-03-20 09:11:03', '20/3/2032/#S0005', 'Zidan', 'sale'),
(26, '2023-05-20 02:26:02', '2023-05-20 02:26:02', '2023-05-20 09:26:02', '20/5/2032/#S0006', 'Fafa', 'sale'),
(27, '2023-05-20 04:37:27', '2023-05-20 04:37:27', '2023-05-18 11:37:27', '21/5/2032/#S0007', 'Juju', 'sale'),
(28, '2023-05-20 04:46:18', '2023-05-20 04:46:18', '2023-05-20 11:46:18', '2/2/2032/#P0007', 'Ibox', 'procurement'),
(29, '2023-05-20 04:46:48', '2023-05-20 04:46:48', '2023-05-19 11:46:48', '22/5/2032/#S0008', 'Bubu', 'sale'),
(30, '2023-05-20 04:52:20', '2023-05-20 04:52:20', '2023-05-20 11:52:20', '2/2/2032/#P0008', 'Sein', 'procurement'),
(31, '2023-05-20 04:57:55', '2023-05-20 04:57:55', '2023-05-20 11:57:55', '20/5/2023/#S0009', 'MAP', 'procurement'),
(32, '2023-05-20 04:58:56', '2023-05-20 04:58:56', '2023-05-20 11:58:56', '22/5/2032/#S0009', 'Rauf', 'sale'),
(33, '2023-05-20 05:20:45', '2023-05-20 05:20:45', '2023-05-20 12:20:45', '20/5/2032/#P0009', 'Sein', 'procurement'),
(34, '2023-05-20 05:22:18', '2023-05-20 05:22:18', '2023-05-20 12:22:18', '20/5/2032/#S0010', 'Huha', 'sale');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_number` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `final_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `created_at`, `updated_at`, `transaction_number`, `serial_number`, `discount`, `final_price`) VALUES
(23, '2023-05-19 21:33:24', '2023-05-19 21:33:24', '20/5/2032/#P0001', 'ip14/#001', '0', '0'),
(24, '2023-05-19 21:33:24', '2023-05-19 21:33:24', '20/5/2032/#P0001', 'ip14/#002', '0', '0'),
(25, '2023-05-19 21:33:24', '2023-05-19 21:33:24', '20/5/2032/#P0001', 'ip12/#001', '0', '0'),
(26, '2023-05-19 21:35:09', '2023-05-19 21:35:09', '20/5/2032/#P0002', 's23/#001', '0', '0'),
(27, '2023-05-19 21:35:09', '2023-05-19 21:35:09', '20/5/2032/#P0002', 's23/#002', '0', '0'),
(28, '2023-05-19 21:35:58', '2023-05-19 21:35:58', '20/5/2032/#S0001', 'ip14/#001', '5', '22800000'),
(29, '2023-05-19 21:35:58', '2023-05-19 21:35:58', '20/5/2032/#S0001', 's23/#001', '0', '23000000'),
(30, '2023-05-20 00:00:10', '2023-05-20 00:00:10', '20/5/2032/#P0003', 's23/#003', '0', '0'),
(31, '2023-05-20 01:00:54', '2023-05-20 01:00:54', '20/5/2032/#S0002', 'ip14/#002', '0', '24000000'),
(32, '2023-05-20 01:00:54', '2023-05-20 01:00:54', '20/5/2032/#S0002', 'ip12/#001', '0', '15000000'),
(33, '2023-05-20 01:13:03', '2023-05-20 01:13:03', '20/5/2032/#S0003', 's23/#002', '0', '23000000'),
(34, '2023-05-20 01:13:20', '2023-05-20 01:13:20', '20/5/2032/#S0004', 's23/#003', '0', '23000000'),
(35, '2023-05-20 01:17:40', '2023-05-20 01:17:40', '2/2/2032/#P0004', 's23/#004', '0', '0'),
(36, '2023-05-20 01:21:48', '2023-05-20 01:21:48', '2/2/2032/#P0005', 'ip14/#003', '0', '0'),
(37, '2023-05-20 01:22:12', '2023-05-20 01:22:12', '2/2/2032/#P0006', 'ip14/#004', '0', '0'),
(38, '2023-05-20 02:11:03', '2023-05-20 02:11:03', '20/3/2032/#S0005', 's23/#004', '0', '23000000'),
(39, '2023-05-20 02:26:02', '2023-05-20 02:26:02', '20/5/2032/#S0006', 'ip14/#003', '-20', '28800000'),
(40, '2023-05-20 04:37:27', '2023-05-20 04:37:27', '21/5/2032/#S0007', 'ip14/#004', '-50', '36000000'),
(41, '2023-05-20 04:46:18', '2023-05-20 04:46:18', '2/2/2032/#P0007', 'ip14/#005', '0', '0'),
(42, '2023-05-20 04:46:18', '2023-05-20 04:46:18', '2/2/2032/#P0007', 'ip14/#005', '0', '0'),
(43, '2023-05-20 04:46:48', '2023-05-20 04:46:48', '22/5/2032/#S0008', 'ip14/#005', '-25', '30000000'),
(44, '2023-05-20 04:52:20', '2023-05-20 04:52:20', '2/2/2032/#P0008', 's23/#005', '0', '0'),
(45, '2023-05-20 04:52:20', '2023-05-20 04:52:20', '2/2/2032/#P0008', 's23/#006', '0', '0'),
(46, '2023-05-20 04:52:20', '2023-05-20 04:52:20', '2/2/2032/#P0008', 's23/#007', '0', '0'),
(47, '2023-05-20 04:57:55', '2023-05-20 04:57:55', '20/5/2023/#S0009', 'ip13/#001', '0', '0'),
(48, '2023-05-20 04:57:55', '2023-05-20 04:57:55', '20/5/2023/#S0009', 'ip13/#002', '0', '0'),
(49, '2023-05-20 04:57:55', '2023-05-20 04:57:55', '20/5/2023/#S0009', 'ip13/#003', '0', '0'),
(50, '2023-05-20 04:58:56', '2023-05-20 04:58:56', '22/5/2032/#S0009', 'ip13/#001', '10', '16200000'),
(51, '2023-05-20 04:58:56', '2023-05-20 04:58:56', '22/5/2032/#S0009', 'ip13/#002', '0', '18000000'),
(52, '2023-05-20 04:58:56', '2023-05-20 04:58:56', '22/5/2032/#S0009', 'ip13/#003', '-30', '23400000'),
(53, '2023-05-20 05:20:45', '2023-05-20 05:20:45', '20/5/2032/#P0009', 'flz/#001', '0', '0'),
(54, '2023-05-20 05:20:45', '2023-05-20 05:20:45', '20/5/2032/#P0009', 'flz/#002', '0', '0'),
(55, '2023-05-20 05:22:18', '2023-05-20 05:22:18', '20/5/2032/#S0010', 's23/#007', '0', '23000000'),
(56, '2023-05-20 05:22:18', '2023-05-20 05:22:18', '20/5/2032/#S0010', 'flz/#001', '10', '23400000'),
(57, '2023-05-20 05:22:18', '2023-05-20 05:22:18', '20/5/2032/#S0010', 'flz/#002', '-20', '31200000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rauf Mazzidan', 'raufmazzidan', 'super admin', NULL, '$2y$10$uSAdysosrsy96pL89/XMXOCPvaM7C1YcI4onn3OluysmhtrhevAOK', NULL, NULL, NULL),
(4, 'Abang Admins', 'abangadmin', 'admin', NULL, '$2y$10$G.GRIKBsUC/OQHHS0IZUsubwXkROP3tKvL5eU3fe1sq8vjcy7dAp2', NULL, '2023-05-20 05:23:55', '2023-05-20 05:24:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_items`
--
ALTER TABLE `product_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_items`
--
ALTER TABLE `product_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
