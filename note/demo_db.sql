-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2026 at 05:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currents`
--

CREATE TABLE `currents` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(111) DEFAULT NULL,
  `product_id` varchar(111) NOT NULL,
  `portfolio_id` varchar(111) DEFAULT NULL,
  `location` varchar(111) DEFAULT NULL,
  `receive_date` varchar(111) DEFAULT NULL,
  `mc_status` varchar(111) DEFAULT NULL,
  `is_loan` int(11) DEFAULT 0 COMMENT '0=no,1=yes',
  `is_assign` int(111) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=ongoing 1= transfered ',
  `transfer_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `currents`
--

INSERT INTO `currents` (`id`, `emp_id`, `product_id`, `portfolio_id`, `location`, `receive_date`, `mc_status`, `is_loan`, `is_assign`, `created_at`, `updated_at`, `status`, `transfer_at`) VALUES
(10775, 'Test100', '9232', 'Hire Purchase-Recovery', 'Cumilla', '2018-03-02', 'Good', 0, 0, '2025-12-03 02:26:07', '2025-12-03 02:27:02', 0, '2025-12-03 02:27:02'),
(10776, '1001', '9232', 'Hire Purchase-Recovery', 'Dhaka3', '2015-12-18', 'Old', 0, 1, '2025-12-03 02:27:12', '2025-12-13 23:32:43', 1, '2025-12-03 04:31:03'),
(10777, '1001', '9232', 'Hire Purchase-Recovery', 'Cumilla', '2018-12-03', 'Need Service', 0, 1, '2025-12-03 02:54:21', '2025-12-03 06:09:40', 0, '2025-12-03 03:33:19'),
(10800, '30001', '9243', 'Hire Purchase-Recovery', 'cumilla', '2024-05-10', 'Good', 1, 0, '2025-12-10 21:27:39', '2025-12-11 01:35:52', 0, NULL),
(10801, '30002', '9244', 'Foton-Sales', 'Cumilla Laksam', '2024-05-10', 'Medium', 0, 0, '2025-12-10 21:27:39', '2025-12-11 01:35:04', 0, NULL),
(10838, '4857', '9235', '14', NULL, NULL, NULL, 1, 0, '2026-01-08 02:44:03', '2026-01-08 02:44:03', 0, NULL),
(10839, '4860', '9237', '13', 'Dhaka', '2026-01-16', 'Need to Repair', 0, 0, '2026-01-08 02:44:20', '2026-01-08 02:44:20', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `idcards`
--

CREATE TABLE `idcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `page_width` int(11) NOT NULL,
  `page_height` int(11) NOT NULL,
  `photo_style` enum('round','square') NOT NULL DEFAULT 'square',
  `photo_size` int(11) DEFAULT NULL,
  `margin_top` int(11) NOT NULL DEFAULT 5,
  `margin_bottom` int(11) NOT NULL DEFAULT 5,
  `margin_left` int(11) NOT NULL DEFAULT 5,
  `margin_right` int(11) NOT NULL DEFAULT 5,
  `signature` varchar(255) DEFAULT NULL,
  `template_html` text DEFAULT NULL,
  `editor_content` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

CREATE TABLE `laptops` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(111) NOT NULL,
  `model` text DEFAULT NULL,
  `handover` varchar(111) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=ongoing 1= transfared',
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `transfer_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`id`, `emp_id`, `model`, `handover`, `status`, `remarks`, `created_at`, `updated_at`, `deleted_at`, `transfer_at`) VALUES
(1341, '1004', 'Mo-78653', '2025-12-13', 1, 'Laptop details2', '2025-12-13 23:33:16', '2025-12-13 23:33:45', NULL, '2025-12-13 23:33:45'),
(1340, '30001', 'Mo-78652', '2025-12-31', 1, 'Remarks', '2025-12-11 04:57:12', '2025-12-11 04:57:37', NULL, '2025-12-11 04:57:37'),
(1339, '30001', 'Mo-78652', '2025-12-31', 1, 'Laptop details', '2025-12-11 04:34:54', '2025-12-11 04:35:06', NULL, '2025-12-11 04:35:06'),
(1338, 'em-200', 'Mo-78652', '2025-12-23', 1, 'Remarks', '2025-12-11 04:34:06', '2025-12-11 04:36:29', NULL, '2025-12-11 04:36:29'),
(1337, '200', 'Mo-78652', '2025-12-24', 1, 'Remarks', '2025-12-11 04:33:20', '2025-12-11 04:36:17', NULL, '2025-12-11 04:36:17'),
(1328, '1001', 'test', '2025-12-18', 1, NULL, '2025-12-09 23:53:22', '2025-12-10 23:45:10', NULL, '2025-12-10 23:45:10'),
(1327, '1001', NULL, NULL, 1, NULL, '2025-12-09 23:52:45', '2025-12-11 04:35:39', NULL, '2025-12-11 04:35:39'),
(1326, '1003', NULL, NULL, 1, NULL, '2025-12-09 23:51:23', '2025-12-11 04:36:34', NULL, '2025-12-11 04:36:34'),
(1325, '201', 'Mo-78652200', '2025-12-24', 0, 'Laptop details', '2025-12-09 23:46:34', '2025-12-11 05:04:56', NULL, NULL),
(1324, '1001', 'Mo-7865', '2025-12-31', 1, 'Laptop details', '2025-12-09 23:42:15', '2025-12-13 23:42:39', NULL, '2025-12-13 23:42:39'),
(1323, '1001', NULL, NULL, 1, NULL, '2025-12-09 23:41:09', '2026-01-28 21:33:10', NULL, '2026-01-28 21:33:10'),
(1322, '1001', 'Mo-78652', '2025-12-14', 1, 'Remarks', '2025-12-09 23:41:01', '2025-12-15 05:10:00', NULL, '2025-12-15 05:10:00'),
(1321, '1001', 'Mo-78652', '2025-02-01', 1, 'Remarks', '2025-12-09 23:39:07', '2025-12-11 04:56:29', NULL, '2025-12-11 04:56:29'),
(1336, '1002', 'Mo-78652', '2025-12-15', 1, 'Laptop info', '2025-12-10 21:59:31', '2025-12-10 21:59:49', NULL, '2025-12-10 21:59:49'),
(1333, '200', 'Mo-78652', '2021-12-02', 1, 'Laptop details', '2025-12-10 04:48:07', '2025-12-10 22:02:10', NULL, '2025-12-10 22:02:10'),
(1334, '123123', NULL, '2025-01-10', 1, NULL, '2025-12-10 05:01:29', '2025-12-10 22:00:59', NULL, '2025-12-10 22:00:59'),
(1335, '1002', 'Mo-78652', '2025-12-10', 1, 'Remarks2', '2025-12-10 21:57:15', '2025-12-10 22:00:27', NULL, '2025-12-10 22:00:27'),
(1332, '123123', NULL, '1970-01-01', 1, NULL, '2025-12-10 04:45:09', '2025-12-10 04:45:14', NULL, '2025-12-10 04:45:14'),
(1331, '10011', NULL, '1970-01-01', 1, NULL, '2025-12-10 03:07:03', '2025-12-10 05:20:05', NULL, '2025-12-10 05:20:05'),
(1329, 'Test200', 'Mo-78652', '2025-12-10', 1, 'Remarks', '2025-12-10 03:06:12', '2025-12-11 05:04:40', NULL, '2025-12-11 05:04:40'),
(1330, '123123', '800000', '2025-12-11', 1, 'data', '2025-12-10 03:06:42', '2025-12-11 04:26:33', NULL, NULL);

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_19_060520_create_idcards_table', 1),
(5, '2026_05_05_070758_create_employees_table', 1),
(6, '2026_05_05_070758_create_products_table', 1),
(7, '2026_05_05_070759_create_vehicles_table', 1),
(8, '2026_05_05_070800_create_portfolios_table', 1),
(9, '2026_05_05_070857_create_items_table', 1);

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
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(111) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Hire Purchase-Recovery', 1, '2025-08-18 23:13:29', '2025-08-18 23:13:29'),
(3, 'Yamaha Sales Team', 1, '2025-08-18 23:13:38', '2025-08-18 23:13:38'),
(4, 'Hire Purchase-Sales', 1, '2025-08-18 23:13:45', '2025-08-18 23:13:45'),
(5, 'Agri Service Team', 1, '2025-08-18 23:13:52', '2025-08-18 23:13:52'),
(6, 'Supply Chain Team', 1, '2025-08-18 23:14:05', '2025-08-18 23:14:05'),
(7, 'Yamaha Service Team', 1, '2025-08-18 23:14:15', '2025-08-18 23:14:15'),
(8, 'Head Office', 1, '2025-08-18 23:14:21', '2025-08-18 23:14:21'),
(9, 'Foton Service Team', 1, '2025-08-18 23:14:28', '2025-08-18 23:14:28'),
(10, 'Water Pump- Territory Officer', 1, '2025-08-18 23:14:43', '2025-08-18 23:14:43'),
(11, 'Foton-Recovery', 1, '2025-08-18 23:14:49', '2025-08-18 23:14:49'),
(12, 'Foton-Sales', 1, '2025-08-18 23:14:56', '2025-08-18 23:14:56'),
(13, 'Water Pump Service Team', 1, '2025-08-18 23:15:11', '2025-08-18 23:15:11'),
(14, 'Recovery Area Head', 1, '2025-08-18 23:15:17', '2025-08-18 23:15:17'),
(15, 'Water Pump- Area Head', 1, '2025-08-18 23:15:25', '2025-08-18 23:15:25'),
(16, 'Foton Recovery Team', 1, '2025-08-18 23:18:13', '2025-08-18 23:18:13'),
(17, 'Dealership Business Territory Officer', 1, '2025-08-18 23:19:15', '2025-08-18 23:19:15'),
(18, 'Dealership Business Sales & Service', 1, '2025-08-18 23:19:22', '2025-08-18 23:19:22'),
(19, 'Yamaha Traning Team', 1, '2025-08-18 23:19:28', '2025-08-18 23:19:28'),
(20, 'Yamaha Flagship Team', 1, '2025-08-18 23:19:39', '2025-08-18 23:19:39'),
(21, 'Yamaha Factory Team', 1, '2025-08-18 23:19:46', '2025-08-18 23:19:46'),
(22, 'CE Servive Team', 1, '2025-08-18 23:19:52', '2025-08-18 23:19:52'),
(23, 'Yamaha HQ Team', 1, '2025-08-18 23:19:59', '2025-08-18 23:19:59'),
(24, 'Foton Registration Team', 1, '2025-08-18 23:20:06', '2025-08-18 23:20:06'),
(25, 'Spare parts team PT & DE', 1, '2025-08-18 23:20:13', '2025-08-18 23:20:13'),
(26, 'Yahama Factory Team (typo variation of Yamaha)', 0, '2025-08-18 23:20:20', '2025-08-18 23:23:36'),
(27, 'Water Pump HQ Team', 1, '2025-08-18 23:20:27', '2025-08-18 23:20:27'),
(28, 'Lequi Moly', 1, '2025-08-18 23:20:57', '2025-08-18 23:20:57'),
(29, 'Merine Service Team', 1, '2025-08-18 23:21:04', '2025-08-18 23:21:04'),
(30, 'Tyre Team', 1, '2025-08-18 23:21:10', '2025-08-18 23:21:10'),
(31, 'Hire Purchase Area Head', 1, '2025-08-18 23:21:18', '2025-08-18 23:21:18'),
(32, 'Water Pump- Zonal Head', 1, '2025-08-18 23:21:25', '2025-08-18 23:21:25'),
(33, 'Dealership Business Zonal Head', 1, '2025-08-18 23:21:32', '2025-08-18 23:21:32'),
(34, 'Generator Team', 1, '2025-08-18 23:21:38', '2025-08-18 23:21:38'),
(35, 'Dealership Business Spare Parts', 1, '2025-08-18 23:21:48', '2025-08-18 23:21:48'),
(36, 'Foton Sales Team', 1, '2025-08-18 23:21:54', '2025-08-18 23:21:54'),
(37, 'Water pump service team (lowercase variation)', 1, '2025-08-18 23:22:01', '2025-08-18 23:22:10'),
(38, 'New Machineries', 1, '2025-08-18 23:22:16', '2025-08-18 23:22:16'),
(39, 'Resale Tractor', 1, '2025-08-18 23:22:23', '2025-08-18 23:22:23'),
(40, 'WP Area Head', 1, '2025-08-18 23:22:50', '2025-08-18 23:22:50'),
(41, 'All Motors (MSR Project Team)', 1, '2025-08-18 23:23:02', '2025-12-02 17:06:29'),
(200069, '', 0, '2026-02-01 21:53:05', '2026-02-01 21:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `eng_no` varchar(255) NOT NULL,
  `chassis_no` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('SkWdsb57trJnK7VsaMI4S9ezRQe7AWqnod0m7yEv', 1, '192.168.92.108', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMGhpc2tneExHenlBb0VOWjNld0hHRmN0VmdzRGxVSG93TFFObnI4aiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xOTIuMTY4LjkyLjEwODo4MDAwL3ZlaGljbGUvbGlzdCI7czo1OiJyb3V0ZSI7czoxMjoidmVoaWNsZS5saXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1778996280),
('TgR5fM9GwaRw02H0uUBVz0aSL6hB5K2VPSUR5jTB', 1, '192.168.92.108', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMGs1MndqMWlOd09SM1I2RzRUOXpTY1g0MUo2Z3R2UHNpNG0xQkVwTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xOTIuMTY4LjkyLjEwODo4MDAwL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1778995587),
('Xm4euzUHAE5wZhHOFSz042gXoCqbyufese7i3Zep', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiejlWTUp4TzRCS2ZuSDFkZkRrM1B0WjkxSllXQkR5OW9odFd0OHVFcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1777965053);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$XVD9qIZgF./7XI8JntAUf.R8.5LFAkdadAiBQWkHvwn9lwf6PlYgi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eng_no` varchar(255) NOT NULL,
  `chassis_no` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `currents`
--
ALTER TABLE `currents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_emp_id_index` (`emp_id`),
  ADD KEY `employees_name_index` (`name`),
  ADD KEY `employees_status_index` (`status`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `idcards`
--
ALTER TABLE `idcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_name_index` (`name`),
  ADD KEY `items_status_index` (`status`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolios_name_index` (`name`),
  ADD KEY `portfolios_status_index` (`status`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_eng_no_index` (`eng_no`),
  ADD KEY `products_chassis_no_index` (`chassis_no`),
  ADD KEY `products_brand_index` (`brand`),
  ADD KEY `products_status_index` (`status`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_eng_no_index` (`eng_no`),
  ADD KEY `vehicles_chassis_no_index` (`chassis_no`),
  ADD KEY `vehicles_brand_index` (`brand`),
  ADD KEY `vehicles_status_index` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currents`
--
ALTER TABLE `currents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10840;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4879;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `idcards`
--
ALTER TABLE `idcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1342;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200081;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9250;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
