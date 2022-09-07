-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2022 at 10:16 AM
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
-- Database: `booking_2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_users`
--

CREATE TABLE `agent_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `agent_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_id` int(11) NOT NULL,
  `agent_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agent_users`
--

INSERT INTO `agent_users` (`id`, `created_at`, `updated_at`, `agent_name`, `agent_id`, `agent_image`) VALUES
(1, '2022-07-11 16:20:02', '2022-07-11 16:20:02', 'Sidney Salazar', 1, '50247c458db6e7a08286f0b00514b75e.png');

-- --------------------------------------------------------

--
-- Table structure for table `audit_trails`
--

CREATE TABLE `audit_trails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_trails`
--

INSERT INTO `audit_trails` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Uploaded Location', '2022-07-12 01:07:43', '2022-07-12 01:07:43'),
(2, 'Uploaded Principal', '2022-07-12 01:08:27', '2022-07-12 01:08:27'),
(3, 'Uploaded 2022-07-07201923 Export Code', '2022-07-12 01:13:42', '2022-07-12 01:13:42'),
(4, 'Uploaded 2022-07-07201923 Export Code', '2022-07-12 01:15:38', '2022-07-12 01:15:38'),
(5, 'Uploaded export_customer_principal_code 2022-07-07201923 Export Code', '2022-07-12 01:38:50', '2022-07-12 01:38:50'),
(6, 'Uploaded export_customer_price_per_principal 2022-07-07201923 Export Code', '2022-07-12 01:48:53', '2022-07-12 01:48:53'),
(7, 'Uploaded Inventory', '2022-07-12 02:25:29', '2022-07-12 02:25:29'),
(8, 'Uploaded Sales Register', '2022-07-12 06:40:29', '2022-07-12 06:40:29'),
(9, 'Uploaded Sales Register', '2022-07-12 23:33:10', '2022-07-12 23:33:10'),
(10, 'Uploaded Sales Register', '2022-07-12 23:39:21', '2022-07-12 23:39:21'),
(11, 'Uploaded Sales Register', '2022-07-13 01:44:56', '2022-07-13 01:44:56'),
(12, 'Uploaded Inventory', '2022-07-13 09:08:52', '2022-07-13 09:08:52'),
(13, 'Uploaded export_customer_applied_to_agent 2022-07-07201923 Export Code', '2022-07-15 00:09:17', '2022-07-15 00:09:17'),
(14, 'Uploaded export_customer_principal_code 2022-07-07201923 Export Code', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(15, 'Uploaded export_customer_price_per_principal 2022-07-07201923 Export Code', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(16, 'Uploaded Sales Register', '2022-07-15 00:09:57', '2022-07-15 00:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `bad_orders`
--

CREATE TABLE `bad_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pcm_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_bo` double(15,4) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `principal_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sales_register_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bad_orders`
--

INSERT INTO `bad_orders` (`id`, `pcm_number`, `total_bo`, `agent_id`, `customer_id`, `principal_id`, `created_at`, `updated_at`, `sales_register_id`) VALUES
(1, 'PCM-SIDNEY SALAZAR-1-2022-07-0001', 62.7000, 1, 1, 2, '2022-07-22 09:09:55', '2022-07-22 09:09:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bad_order_details`
--

CREATE TABLE `bad_order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bad_order_id` bigint(20) UNSIGNED NOT NULL,
  `inventory_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double(15,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bad_order_details`
--

INSERT INTO `bad_order_details` (`id`, `bad_order_id`, `inventory_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 1, 956, 1, 10.4500, '2022-07-22 09:09:55', '2022-07-22 09:09:55'),
(2, 1, 957, 1, 10.4500, '2022-07-22 09:09:55', '2022-07-22 09:09:55'),
(3, 1, 958, 1, 10.4500, '2022-07-22 09:09:55', '2022-07-22 09:09:55'),
(4, 1, 959, 1, 10.4500, '2022-07-22 09:09:55', '2022-07-22 09:09:55'),
(5, 1, 960, 1, 10.4500, '2022-07-22 09:09:55', '2022-07-22 09:09:55'),
(6, 1, 961, 1, 10.4500, '2022-07-22 09:09:55', '2022-07-22 09:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` double(15,4) NOT NULL,
  `amount_paid` double(15,4) NOT NULL,
  `mode_of_transaction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `balance` double(15,4) NOT NULL,
  `principal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exported` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_bo` double(15,4) NOT NULL,
  `or_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collection_details`
--

CREATE TABLE `collection_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `collection_id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cash` double(15,4) NOT NULL,
  `cash_add_refer` double(15,4) NOT NULL,
  `cheque` double(15,4) NOT NULL,
  `cheque_add_refer` double(15,4) NOT NULL,
  `less_refer` double(15,4) NOT NULL,
  `specify` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` double(15,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `credit_limit` double(15,2) NOT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `allowed_number_of_sales_order` int(11) NOT NULL,
  `special_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode_of_transaction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinates` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `location_id`, `credit_limit`, `store_name`, `created_at`, `updated_at`, `allowed_number_of_sales_order`, `special_account`, `mode_of_transaction`, `status`, `longitude`, `latitude`, `coordinates`) VALUES
(1, 2, 1000000000.00, 'JUANITO MULAT', '2022-07-15 00:09:17', '2022-07-15 00:09:17', 20, 'yes', 'PDC', '', '', '', ''),
(3, 1, 1000000000.00, 'JOEI VICENTE', '2022-07-15 00:09:17', '2022-07-15 00:09:17', 0, '', 'PDC', '', '', '', ''),
(5, 1, 1000000000.00, 'JOSELF PACHECO', '2022-07-15 00:09:17', '2022-07-15 00:09:17', 0, '', 'PDC', '', '', '', ''),
(16, 1, 1000000000.00, 'ALMER COMALENG', '2022-07-15 00:09:17', '2022-07-15 00:09:17', 0, '', 'PDC', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_exports`
--

CREATE TABLE `customer_exports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detailed_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exported` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_exports`
--

INSERT INTO `customer_exports` (`id`, `store_name`, `contact_person`, `contact_number`, `location`, `location_id`, `detailed_address`, `longitude`, `created_at`, `updated_at`, `exported`, `kob`, `latitude`, `status`) VALUES
(2, 'SSS', 'DDD', '09533844872', 'MISAMIS ORIENTAL EAST', '2', 'ASDASDA   ASDASDASD', '123', '2022-09-06 19:02:24', '2022-09-06 19:04:39', 'exported', 'SSS', '3123', 'Pending Approval');

-- --------------------------------------------------------

--
-- Table structure for table `customer_principal_codes`
--

CREATE TABLE `customer_principal_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `principal_id` bigint(20) UNSIGNED NOT NULL,
  `store_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_principal_codes`
--

INSERT INTO `customer_principal_codes` (`id`, `customer_id`, `principal_id`, `store_code`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'GCIVS1', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(2, 1, 3, 'PFCVS1', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(3, 1, 4, 'EPIVS1', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(4, 1, 5, 'DOLEVS1', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(5, 1, 6, 'ALVS1', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(6, 1, 7, 'CIFPIVS1', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(7, 1, 8, 'PPMCVS1', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(8, 3, 2, 'GCI3', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(9, 3, 3, 'PFC3', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(10, 3, 4, 'EPI3', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(11, 3, 5, 'DOLE3', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(12, 3, 6, 'ALASKA3', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(13, 3, 7, 'CIFPI3', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(14, 3, 8, 'PPMC3', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(15, 5, 2, 'GCI0005', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(16, 5, 3, 'PFC0005', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(17, 5, 4, 'EPI0005', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(18, 5, 5, 'DOLE0005', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(19, 5, 6, 'ALASKA0005', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(20, 5, 7, 'CIFPI0005', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(21, 5, 8, 'PPMC0005', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(22, 16, 2, 'GCI_16', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(23, 16, 3, 'PFC_16', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(24, 16, 4, 'EPI_16', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(25, 16, 5, 'DOLE_16', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(26, 16, 6, 'ALASKA_16', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(27, 16, 7, 'CIFPI_16', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(28, 16, 8, 'PPMC_16', '2022-07-15 00:09:26', '2022-07-15 00:09:26'),
(29, 16, 10, 'SUNPRIDE_FOODS_16', '2022-07-15 00:09:26', '2022-07-15 00:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `customer_principal_discounts`
--

CREATE TABLE `customer_principal_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `principal_id` bigint(20) UNSIGNED NOT NULL,
  `discount_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_rate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_principal_discounts`
--

INSERT INTO `customer_principal_discounts` (`id`, `customer_id`, `principal_id`, `discount_name`, `discount_rate`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'discount 1', 1, '2022-07-25 02:16:25', '2022-07-25 02:16:25'),
(2, 1, 2, 'discount 2', 1, '2022-07-25 02:16:25', '2022-07-25 02:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `customer_principal_prices`
--

CREATE TABLE `customer_principal_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `principal_id` bigint(20) UNSIGNED NOT NULL,
  `price_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_principal_prices`
--

INSERT INTO `customer_principal_prices` (`id`, `customer_id`, `principal_id`, `price_level`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(2, 1, 3, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(3, 1, 4, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(4, 1, 5, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(5, 1, 6, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(6, 1, 7, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(7, 1, 8, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(8, 3, 2, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(9, 3, 3, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(10, 3, 4, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(11, 3, 5, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(12, 3, 6, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(13, 3, 7, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(14, 3, 8, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(15, 5, 2, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(16, 5, 3, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(17, 5, 4, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(18, 5, 5, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(19, 5, 6, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(20, 5, 7, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(21, 5, 8, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(22, 16, 2, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(23, 16, 3, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(24, 16, 4, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(25, 16, 5, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(26, 16, 6, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(27, 16, 7, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(28, 16, 8, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29'),
(29, 16, 10, 'price_2', '2022-07-15 00:09:29', '2022-07-15 00:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `principal_id` bigint(20) UNSIGNED NOT NULL,
  `running_balance` int(11) NOT NULL,
  `price_1` decimal(15,4) NOT NULL,
  `price_2` decimal(15,4) NOT NULL,
  `price_3` decimal(15,4) NOT NULL,
  `price_4` decimal(15,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `sku_code`, `description`, `sku_type`, `principal_id`, `running_balance`, `price_1`, `price_2`, `price_3`, `price_4`, `created_at`, `updated_at`, `uom`) VALUES
(956, 'SCG7', 'SUPER CRUNCH GREEN 7G', 'BUTAL', 3, 9928387, '10.3450', '10.4500', '10.5600', '10.8700', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(957, 'SCBL7', 'SUPER CRUNCH BLUE 7G', 'BUTAL', 3, 9959693, '10.3500', '10.4500', '10.5600', '10.8700', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(958, 'SCR7', 'SUPER CRUNC RED 7G', 'BUTAL', 3, 9960356, '10.3500', '10.4500', '10.5600', '10.8700', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(959, 'SCY7', 'SUPER CRUNCH YELLOW 7G', 'BUTAL', 3, 9998146, '10.3500', '10.4500', '10.5600', '10.8700', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(960, 'TCG7', 'TAGAY CHILI & GARLIC 7G', 'BUTAL', 3, 9972386, '10.3500', '10.4500', '10.5600', '10.8700', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(961, 'RCBBQ7', 'RED CHILI BBQ 7G', 'BUTAL', 3, 10000000, '10.3500', '10.4500', '10.5600', '10.8700', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(962, 'SCBBQ7', 'SWEET CHILI BBQ 7G', 'BUTAL', 3, 10000000, '10.3500', '10.4500', '10.5600', '10.8700', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(963, 'BCBBQ7', 'BACK CHILI BBQ 7G', 'BUTAL', 3, 10000000, '10.3500', '10.4500', '10.5600', '10.8700', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(964, 'HCL5', 'HITS CARAMEL 5G', 'BUTAL', 3, 10000000, '10.3500', '10.5600', '10.5600', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(965, 'HCC5', 'HITS CHOCOLATE 5G', 'BUTAL', 3, 10000000, '10.3500', '10.5600', '10.5600', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(966, 'HSS5', 'HITS STRAWBERRY 54G', 'BUTAL', 3, 10000000, '10.3500', '10.5600', '10.5600', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(967, 'IC5', 'IKASHI CUTTLEFISH 5G', 'BUTAL', 3, 10000000, '17.4800', '17.8300', '17.8300', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(968, 'ISS5', 'IKASHI SOY SAUCE 5G', 'BUTAL', 3, 10000000, '21.2900', '21.7200', '21.7200', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(969, 'RCBBQ55', 'RED CHILI BBQ 55G', 'BUTAL', 3, 10000000, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(970, 'SCBBQ55', 'SWEET CHILI BBQ 55G', 'BUTAL', 3, 10000000, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(971, 'BCBBQ55', 'BACK CHILI BBQ 55G', 'BUTAL', 3, 10000000, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(972, 'TCG55', 'TAGY CHILI & GARLIC 55G', 'BUTAL', 3, 9997010, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(973, 'YSH18', 'YIPYAP SPEEDY HOT 18G', 'BUTAL', 3, 9997360, '20.7600', '22.8700', '21.1800', '22.0300', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(974, 'YNC18', 'YIPYAP NACHO CHESE 18G', 'BUTAL', 3, 9998442, '20.7600', '22.8700', '21.1800', '22.0300', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(975, 'YS18', 'YIPYAP SWEETCORN 18G', 'BUTAL', 3, 9998061, '20.7600', '22.8700', '21.1800', '22.0300', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(976, 'YBP18', 'YIPYAP BLACK PEPPER 18G', 'BUTAL', 3, 10000000, '20.7600', '22.8700', '20.1800', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(977, 'SCCH5', 'SUPER CRUNCH CHEESE 55G', 'BUTAL', 3, 9992719, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(978, 'SCS55', 'SUPER CRUNCH SWEETCORN 55G', 'BUTAL', 3, 9984336, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(979, 'SCR5', 'SUPER CRUNCH RED 55G', 'BUTAL', 3, 9993083, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(980, 'SCCC5', 'SUPER CRUCNH CHEESE CHEDAR', 'BUTAL', 3, 9999762, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(981, 'SCC120', 'SUPER CRUNCH CHEESE 120G', 'BUTAL', 3, 9999994, '16.5400', '18.5600', '16.8700', '17.3700', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(982, 'SCG120', 'SUPER CRUNCH SWEETCORN 120G', 'BUTAL', 3, 9999550, '16.5400', '18.5600', '16.8700', '17.3700', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(983, 'BMC110', 'BIG MUNCH CHEESE 110G', 'BUTAL', 3, 10000000, '0.0000', '20.4400', '20.4400', '21.0400', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(984, 'BMB110', 'BIG MUNCH BBQ 110G', 'BUTAL', 3, 10000000, '0.0000', '20.4400', '20.4400', '21.0400', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(985, 'YCRC14', 'YIPYAP CORN RING CHEESE 14G', 'BUTAL', 3, 9999940, '20.7600', '21.1800', '21.1800', '22.0300', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(986, 'YCSS20', 'YIPYAP CORN RING SWEET & SPICY14G', 'BUTAL', 3, 10000000, '20.7600', '21.1800', '21.1800', '22.0300', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(987, 'SCCF7 (BAG)', 'SUPER CRUNCH CHOCO FLAKES 7G', 'BUTAL', 3, 10000000, '10.3500', '10.5600', '10.5600', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(988, 'SCCF7 (BAG)', 'SUPER CRUNCH CHOCO FLAKES 7G', 'BUTAL', 3, 10000000, '68.8500', '70.2300', '70.2300', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(989, 'SBS180 (CASE)', 'S.D BROWNIE SCOTCH 180g', 'BUTAL', 3, 10000000, '44.4900', '49.7400', '45.3800', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(990, 'SCCHLK415', 'SUPER CRUNCHCHICHARONLECHON', 'BUTAL', 3, 9999626, '78.4400', '80.0000', '80.0000', '82.3700', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(991, 'SCCHR22', 'SUPER CRUNCH CHEESERING22Gx25', 'BUTAL', 3, 9997405, '5.1500', '143.8000', '131.2500', '134.9600', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(992, 'SCCLK32', 'SUPER CRUNCH CHIPCHARON LECHON', 'BUTAL', 3, 9999866, '73.1400', '78.0700', '74.6100', '76.8000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(993, 'SCCP30', 'SUPER CRUNCH CHEESE PUFFS 30', 'BUTAL', 3, 9999821, '73.1400', '74.6000', '74.6000', '76.8000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(994, 'SCCP300', 'SUPER CRUNCH CHEESE PUFF300G', 'BUTAL', 3, 9999905, '79.5000', '87.5800', '81.0900', '83.4800', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(995, 'SCCPB32', 'SUPER CRUNCH CHIPHARON PINOY', 'BUTAL', 3, 9999960, '73.1400', '78.0700', '74.6100', '76.8000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(996, 'SCCR370', 'SUPER CRUNCH CHEESE RING370G', 'BUTAL', 3, 9999864, '79.5000', '81.0900', '81.0900', '83.4800', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(997, 'SCFC48', 'S.CRUNCH FISH CHARAP 32g.', 'BUTAL', 3, 10000000, '68.8500', '70.2300', '70.2300', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(998, 'SCNB48', 'SUPER CRUNCH NACHO BBQ 48g', 'BUTAL', 3, 9999925, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(999, 'SCNBHSB 25G', 'SUPER CRUNCH BLAZIN HOT 25G', 'BUTAL', 3, 9997359, '128.7500', '143.8000', '131.2500', '134.9600', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1000, 'SCNC48', 'SUPER CRUNCH NACHO CHEESE 48g', 'BUTAL', 3, 9999865, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1001, 'SCNC500', 'SUPER CRUNC NACHOS CHEESE 500G', 'BUTAL', 3, 9999855, '72.0800', '73.5200', '73.5200', '75.6900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1002, 'SCNPP', 'SUPER CRUNCH NACHOS PEPPER 25', 'BUTAL', 3, 9999433, '128.7500', '143.8000', '131.2500', '134.9600', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1003, 'SCP330', 'SNACKERS CHEESY PUFF 330g', 'BUTAL', 3, 9999992, '68.8500', '85.7100', '70.2300', '85.7100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1004, 'SNCR400', 'SNACKERS CHEESE RING 400g', 'BUTAL', 3, 10000000, '68.8500', '84.1500', '70.2300', '84.1500', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1005, 'SCS500', 'SUPER CRUNCH SWEETCORN500G', 'BUTAL', 3, 9999832, '72.0800', '73.5200', '73.5200', '75.6900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1006, 'SDBB14(CASE)', 'SUPER DELIGHTS BROWNIE BITE 14', 'BUTAL', 3, 9998234, '61.2200', '62.4400', '62.4400', '64.2800', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1007, 'SDBB200 (CASE)', 'SUPER DELIGHT BROWNIE BITES', 'BUTAL', 3, 9999986, '44.4900', '49.7400', '47.4400', '48.8400', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1008, 'SDBBCAN (CASE)', 'SUPER DELIGHT BROWNIE BITES CA', 'BUTAL', 3, 10000000, '10.3500', '105.8900', '105.8900', '105.8900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1009, 'SDBS14 (CASE)', 'SUPER DELIGTHS BROWNIES SCOTCH', 'BUTAL', 3, 9999928, '61.2200', '62.4400', '62.4400', '64.2800', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1010, 'SDBS180 (CASE)', 'SUPER DELIGHT BROWNIE SCOTH', 'BUTAL', 3, 9999976, '46.5100', '49.7400', '47.4400', '48.8400', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1011, 'SDBSB14 (CASE).', 'SUPER DELIGHTS BUTTERSCOTCH 14', 'BUTAL', 3, 9999649, '61.2200', '62.4400', '62.4400', '64.2800', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1012, 'SDBSB180-CASE', 'S.D BUTTERSCOTCH BITES 180G', 'BUTAL', 3, 10000000, '46.5100', '49.7400', '49.7400', '48.8400', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1013, 'SDCC120 (CASE)', 'SUPER DELIGHT REG. CHOCO CHIP', 'BUTAL', 3, 9999780, '33.0000', '35.4100', '33.6600', '34.6500', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1014, 'SDMCC175 (CASE)', 'SUPER DELIGHT MINI CHOCO CHIP', 'BUTAL', 3, 10000000, '42.9400', '45.4200', '43.7900', '45.0800', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1015, 'SDMCC28', 'super delight mini chochip 28g', 'BUTAL', 3, 9984894, '5.2500', '6.0800', '5.3500', '5.5100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1016, 'SDRCC400', 'super delight reg chocolate 40', 'BUTAL', 3, 9997111, '10.0700', '10.7100', '10.2700', '10.5800', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1017, 'SNBBQ500', 'SNACKERS NACHOS BBQ 500G x 20s', 'BUTAL', 3, 10000000, '75.8500', '81.0900', '77.3600', '79.6400', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1018, 'SNC500', 'SNACKERS NACHOS CHEESE 500g', 'BUTAL', 3, 9999982, '75.8500', '81.0900', '77.3600', '79.6400', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1019, 'SNCLK415', 'SNACKER CHIPCHARON LECHON KAWA', 'BUTAL', 3, 9999954, '81.6200', '86.5000', '80.0000', '85.7100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1020, 'SNCPB415', 'SNACKER CHIPCHARON PINOY BAWAN', 'BUTAL', 3, 9999976, '81.6200', '86.5000', '83.2600', '85.7100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1021, 'SNCSS415', 'SNACKER CHIPCHARON SUKATSILI41', 'BUTAL', 3, 9999997, '81.6200', '86.5000', '79.9600', '85.7100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1022, 'SNP500', 'SNACKERS NACHOS PLAIN 500g', 'BUTAL', 3, 10000000, '68.8500', '74.6100', '70.2300', '73.6300', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1023, 'SNS500', 'SNACKERS NACHOS SWEETCORN 500', 'BUTAL', 3, 10000000, '17.4300', '79.6400', '17.7800', '79.6400', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1024, 'SNSS500', 'SNACKERS NACHOS SWEET & SPICY', 'BUTAL', 3, 10000000, '75.8500', '81.0900', '77.3600', '79.6400', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1025, 'SPP500', 'SUPER PAMASKO PACK 500G', 'BUTAL', 3, 10000000, '68.6200', '70.0200', '70.0200', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1026, 'YMCB5', 'YAPPEE MILK CHOCOLATE BAR 5G', 'BUTAL', 3, 10000000, '10.3500', '10.5600', '10.5600', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1027, 'YNC18', 'YIPYAP NACHO CHEESE 18G', 'BUTAL', 3, 9999733, '20.7600', '22.8700', '21.1800', '22.0300', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1028, 'YPBB5', 'YAPPEE PEANUT BUTTER BAR 5G', 'BUTAL', 3, 10000000, '44.4900', '45.3800', '45.3800', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1029, 'YTCF5', 'YAPPEE TWINS C-FILLED SNACK 5G', 'BUTAL', 3, 10000000, '17.6400', '17.9900', '17.9900', '18.5200', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1030, 'YTUF5', 'YAPPEE TWINS U-FILLED SNACK 5G', 'BUTAL', 3, 10000000, '17.6400', '17.9900', '17.9900', '18.5200', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1031, 'YCSH55', 'YIPYAP CORNSNACK SPEEDY HOT 55', 'BUTAL', 3, 9999505, '75.8300', '82.1800', '74.6100', '76.8000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1032, 'CCER12', 'CHUMZ CHEESE RING 12G', 'BUTAL', 3, 9999976, '17.4800', '19.5200', '17.8300', '18.5400', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1033, 'CCR55', 'CHUMZ CHEESE RING 55G', 'BUTAL', 3, 10000000, '11.4000', '12.6900', '11.6300', '11.9700', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'PACK'),
(1034, 'SCG7', 'SUPER CRUNCH GREEN 7G', 'CASE', 3, 10000000, '207.0000', '217.3500', '211.1400', '217.3500', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1035, 'SCBL7', 'SUPER CRUNCH BLUE 7G', 'CASE', 3, 10000000, '207.0000', '217.3500', '211.1400', '217.3500', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1036, 'SCR7', 'SUPER CRUNC RED 7G', 'CASE', 3, 10000000, '207.0000', '217.3500', '211.1500', '217.3500', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1037, 'SCY7', 'SUPER CRUNCH YELLOW 7G', 'CASE', 3, 10000000, '207.0000', '217.3500', '211.1400', '217.3500', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1038, 'TCG7', 'TAGAY CHILI & GARLIC 7G', 'CASE', 3, 10000000, '207.0000', '217.3500', '211.1400', '217.3500', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1039, 'RCBBQ7', 'RED CHILI BBQ 7G', 'CASE', 3, 10000000, '207.0000', '217.3500', '211.1400', '217.3500', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1040, 'SCBBQ7', 'SWEET CHILI BBQ 7G', 'CASE', 3, 10000000, '207.0000', '217.3500', '211.1400', '217.3500', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1041, 'BCBBQ7', 'BACK CHILI BBQ 7G', 'CASE', 3, 10000000, '207.0000', '217.3500', '211.1400', '217.3500', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1042, 'HCL5', 'HITS CARAMEL 5G', 'CASE', 3, 10000000, '207.0000', '211.1400', '211.1400', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1043, 'HCC5', 'HITS CHOCOLATE 5G', 'CASE', 3, 10000000, '207.0000', '211.1400', '211.1400', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1044, 'HSS5', 'HITS STRAWBERRY 54G', 'CASE', 3, 10000000, '207.0000', '211.1400', '211.1400', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1045, 'IC5', 'IKASHI CUTTLEFISH 5G', 'CASE', 3, 10000000, '207.0000', '211.1400', '211.1400', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1046, 'ISS5', 'IKASHI SOY SAUCE 5G', 'CASE', 3, 10000000, '207.0000', '211.1400', '211.1400', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1047, 'RCBBQ55', 'RED CHILI BBQ 55G', 'CASE', 3, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1048, 'SCBBQ55', 'SWEET CHILI BBQ 55G', 'CASE', 3, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1049, 'BCBBQ55', 'BACK CHILI BBQ 55G', 'CASE', 3, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1050, 'TCG55', 'TAGY CHILI & GARLIC 55G', 'CASE', 3, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1051, 'YSH18', 'YIPYAP SPEEDY HOT 18G', 'CASE', 3, 10000000, '415.2500', '440.4100', '423.5500', '440.4100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1052, 'YNC18', 'YIPYAP NACHO CHESE 18G', 'CASE', 3, 10000000, '415.2500', '440.4100', '423.5500', '440.4100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1053, 'YS18', 'YIPYAP SWEETCORN 18G', 'CASE', 3, 10000000, '415.2500', '440.4100', '423.5500', '440.4100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1054, 'YBP18', 'YIPYAP BLACK PEPPER 18G', 'CASE', 3, 10000000, '415.2500', '423.5500', '423.5500', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1055, 'SCCH5', 'SUPER CRUNCH CHEESE 55G', 'CASE', 3, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1056, 'SCS55', 'SUPER CRUNCH SWEETCORN 55G', 'CASE', 3, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1057, 'SCR5', 'SUPER CRUNCH RED 55G', 'CASE', 3, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1058, 'SCCC5', 'SUPER CRUCNH CHEESE CHEDAR', 'CASE', 3, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1059, 'SCC120', 'SUPER CRUNCH CHEESE 120G', 'CASE', 3, 10000000, '826.8000', '868.1400', '843.3400', '868.1400', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1060, 'SCG120', 'SUPER CRUNCH SWEETCORN 120G', 'CASE', 3, 10000000, '826.8000', '868.1400', '843.3400', '868.1400', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1061, 'BMC110', 'BIG MUNCH CHEESE 110G', 'CASE', 3, 10000000, '466.0900', '525.8900', '475.5100', '525.8900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1062, 'BMB110', 'BIG MUNCH BBQ 110G', 'CASE', 3, 10000000, '466.0900', '525.8900', '475.5100', '525.8900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1063, 'YCRC14', 'YIPYAP CORN RING CHEESE 14G', 'CASE', 3, 10000000, '415.2500', '440.4100', '423.5500', '440.4100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1064, 'YCSS20', 'YIPYAP CORN RING SWEET & SPICY14G', 'CASE', 3, 10000000, '415.2500', '440.4100', '423.5500', '440.4100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1065, 'SCCF7 (BAG)', 'SUPER CRUNCH CHOCO FLAKES 7G', 'CASE', 3, 10000000, '207.0000', '211.1400', '211.1400', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1066, 'SCCF7 (BAG)', 'SUPER CRUNCH CHOCO FLAKES 7G', 'CASE', 3, 10000000, '207.0000', '211.1400', '211.1400', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1067, 'SBS180 (CASE)', 'S.D BROWNIE SCOTCH 180g', 'CASE', 3, 10000000, '1067.7700', '1089.1300', '1089.1300', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1068, 'SCCHLK415', 'SUPER CRUNCHCHICHARONLECHON', 'CASE', 3, 10000000, '941.2800', '988.3400', '960.1100', '988.3400', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1069, 'SCCHR22', 'SUPER CRUNCH CHEESERING22Gx25', 'CASE', 3, 10000000, '514.1000', '539.8100', '524.3800', '539.8100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1070, 'SCCLK32', 'SUPER CRUNCH CHIPCHARON LECHON', 'CASE', 3, 10000000, '731.4000', '767.9700', '746.0300', '767.9700', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1071, 'SCCP30', 'SUPER CRUNCH CHEESE PUFFS 30', 'CASE', 3, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1072, 'SCCP300', 'SUPER CRUNCH CHEESE PUFF300G', 'CASE', 3, 10000000, '954.0000', '1001.7000', '973.0800', '1001.7000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'CASE/ PACK'),
(1073, 'SCCPB32', 'SUPER CRUNCH CHIPHARON PINOY', 'CASE', 3, 10000000, '731.4000', '767.9700', '746.0300', '767.9700', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1074, 'SCCR370', 'SUPER CRUNCH CHEESE RING370G', 'CASE', 3, 10000000, '954.0000', '1001.7000', '973.0800', '1001.7000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'CASE/ PACK'),
(1075, 'SCFC48', 'S.CRUNCH FISH CHARAP 32g.', 'CASE', 3, 10000000, '344.2700', '351.1600', '351.1600', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1076, 'SCNB48', 'SUPER CRUNCH NACHO BBQ 48g', 'CASE', 3, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1077, 'SCNBHSB 25G', 'SUPER CRUNCH BLAZIN HOT 25G', 'CASE', 3, 10000000, '514.1000', '539.8100', '524.3800', '539.8100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1078, 'SCNC48', 'SUPER CRUNCH NACHO CHEESE 48g', 'CASE', 3, 10000000, '356.7000', '383.9900', '373.0100', '383.9900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1079, 'SCNC500', 'SUPER CRUNC NACHOS CHEESE 500G', 'CASE', 3, 10000000, '864.9600', '908.2100', '882.2600', '908.2100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1080, 'SCNPP', 'SUPER CRUNCH NACHOS PEPPER 25', 'CASE', 3, 10000000, '514.1000', '539.8100', '524.3800', '539.8100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1081, 'SCP330', 'SNACKERS CHEESY PUFF 330g', 'CASE', 3, 10000000, '1160.7000', '1285.5200', '1183.8700', '1285.5200', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'BAG/PACKS'),
(1082, 'SNCR400', 'SNACKERS CHEESE RING 400g', 'CASE', 3, 10000000, '1160.7000', '1262.1400', '1183.9100', '1262.1400', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'CASE/ PACK'),
(1083, 'SCS500', 'SUPER CRUNCH SWEETCORN500G', 'CASE', 3, 10000000, '864.9600', '908.2100', '882.2600', '908.2100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'CASE/ PACK'),
(1084, 'SDBB14(CASE)', 'SUPER DELIGHTS BROWNIE BITE 14', 'CASE', 3, 10000000, '734.5800', '771.3100', '749.2700', '771.3100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'CASE/ PACKS'),
(1085, 'SDBB200 (CASE)', 'SUPER DELIGHT BROWNIE BITES', 'CASE', 3, 10000000, '1067.7700', '1171.9900', '1089.1300', '1171.9900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'CASE/ PACK'),
(1086, 'SDBBCAN (CASE)', 'SUPER DELIGHT BROWNIE BITES CA', 'CASE', 3, 10000000, '622.8700', '635.3300', '635.3300', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'CASE/ PACK'),
(1087, 'SDBS14 (CASE)', 'SUPER DELIGTHS BROWNIES SCOTCH', 'CASE', 3, 10000000, '734.5800', '771.3100', '749.2700', '771.3100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'CASE/ PACK'),
(1088, 'SDBS180 (CASE)', 'SUPER DELIGHT BROWNIE SCOTH', 'CASE', 3, 10000000, '1116.1800', '1171.9900', '1138.5000', '1171.9900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'CASE/ PACK'),
(1089, 'SDBSB14 (CASE).', 'SUPER DELIGHTS BUTTERSCOTCH 14', 'CASE', 3, 10000000, '734.5800', '771.3100', '749.2700', '771.3100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'CASE/ PACK'),
(1090, 'SDBSB180-CASE', 'S.D BUTTERSCOTCH BITES 180G', 'CASE', 3, 10000000, '1116.1800', '1171.9900', '1138.5000', '1171.9900', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'CASE/ PACK'),
(1091, 'SDCC120 (CASE)', 'SUPER DELIGHT REG. CHOCO CHIP', 'CASE', 3, 10000000, '791.8200', '831.4100', '807.6600', '831.4100', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'CASE/ PACK'),
(1092, 'SDMCC175 (CASE)', 'SUPER DELIGHT MINI CHOCO CHIP', 'CASE', 3, 10000000, '1030.3200', '1081.8400', '1050.9300', '1081.8400', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'CASE/ PACK'),
(1093, 'SDMCC28', 'super delight mini chochip 28g', 'CASE', 3, 10000000, '524.7000', '550.9400', '535.1900', '550.9400', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'CASE/ PCS'),
(1094, 'SDRCC400', 'super delight reg chocolate 40', 'CASE', 3, 10000000, '1007.0000', '1057.3500', '1027.1400', '1057.3500', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'CASE/ PCS'),
(1095, 'SNBBQ500', 'SNACKERS NACHOS BBQ 500G x 20s', 'CASE', 3, 10000000, '1516.8600', '1592.7000', '1547.2000', '1592.7000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'CASE/ PACK'),
(1096, 'SNC500', 'SNACKERS NACHOS CHEESE 500g', 'CASE', 3, 10000000, '1516.8600', '1592.7000', '1547.2000', '1592.7000', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'CASE/ PACK'),
(1097, 'SNCLK415', 'SNACKER CHIPCHARON LECHON KAWA', 'CASE', 3, 10000000, '1224.3000', '1285.5200', '1248.7900', '1285.5200', '2022-07-12 02:21:21', '2022-07-12 02:25:28', 'CASE/ PACK'),
(1098, 'SNCPB415', 'SNACKER CHIPCHARON PINOY BAWAN', 'CASE', 3, 10000000, '1224.3000', '1285.5200', '1248.7900', '1285.5200', '2022-07-12 02:21:21', '2022-07-12 02:25:29', 'CASE/ PACK'),
(1099, 'SNCSS415', 'SNACKER CHIPCHARON SUKATSILI41', 'CASE', 3, 10000000, '1224.3000', '1285.5200', '1248.7900', '1285.5200', '2022-07-12 02:21:21', '2022-07-12 02:25:29', 'CASE/ PACK'),
(1100, 'SNP500', 'SNACKERS NACHOS PLAIN 500g', 'CASE', 3, 10000000, '1250.8000', '1472.5000', '1275.8200', '1472.5000', '2022-07-12 02:21:21', '2022-07-12 02:25:29', 'CASE/ PACK'),
(1101, 'SNS500', 'SNACKERS NACHOS SWEETCORN 500', 'CASE', 3, 10000000, '1399.2000', '1592.7000', '1427.1800', '1592.7000', '2022-07-12 02:21:21', '2022-07-12 02:25:29', 'CASE/ PACK'),
(1102, 'SNSS500', 'SNACKERS NACHOS SWEET & SPICY', 'CASE', 3, 10000000, '1516.8600', '1592.7000', '1547.2000', '1592.7000', '2022-07-12 02:21:21', '2022-07-12 02:25:29', 'CASE/ PACK'),
(1103, 'SPP500', 'SUPER PAMASKO PACK 500G', 'CASE', 3, 10000000, '974.5600', '994.0500', '994.0500', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:29', 'CASE/ PACK'),
(1104, 'YMCB5', 'YAPPEE MILK CHOCOLATE BAR 5G', 'CASE', 3, 10000000, '325.7400', '359.7900', '359.7900', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:29', 'BAG/PACKS'),
(1105, 'YNC18', 'YIPYAP NACHO CHEESE 18G', 'CASE', 3, 10000000, '415.2500', '440.4100', '423.5500', '440.4100', '2022-07-12 02:21:21', '2022-07-12 02:25:29', 'BAG/PACKS'),
(1106, 'YPBB5', 'YAPPEE PEANUT BUTTER BAR 5G', 'CASE', 3, 10000000, '352.7400', '359.7900', '359.7900', '0.0000', '2022-07-12 02:21:21', '2022-07-12 02:25:29', 'BAG/PACKS'),
(1107, 'YTCF5', 'YAPPEE TWINS C-FILLED SNACK 5G', 'CASE', 3, 10000000, '352.7400', '370.3800', '359.7900', '370.3800', '2022-07-12 02:21:21', '2022-07-12 02:25:29', 'BAG/PACKS'),
(1108, 'YTUF5', 'YAPPEE TWINS U-FILLED SNACK 5G', 'CASE', 3, 10000000, '352.7400', '370.3800', '359.7900', '370.3800', '2022-07-12 02:21:21', '2022-07-12 02:25:29', 'BAG/PACKS'),
(1109, 'YCSH55', 'YIPYAP CORNSNACK SPEEDY HOT 55', 'CASE', 3, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-12 02:21:21', '2022-07-12 02:25:29', 'BAG/PACKS'),
(1110, 'CCER12', 'CHUMZ CHEESE RING 12G', 'CASE', 3, 10000000, '174.7800', '135.3800', '178.2800', '185.3800', '2022-07-12 02:21:21', '2022-07-12 02:25:29', 'BAG/PACKS'),
(1111, 'CCR55', 'CHUMZ CHEESE RING 55G', 'CASE', 3, 10000000, '284.8800', '299.1200', '290.5800', '299.1200', '2022-07-12 02:21:21', '2022-07-12 02:25:29', 'BAG/PACKS'),
(1112, 'SCG7', 'SUPER CRUNCH GREEN 7G', 'BUTAL', 2, 9928387, '10.3450', '10.4500', '10.5600', '10.8700', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1113, 'SCBL7', 'SUPER CRUNCH BLUE 7G', 'BUTAL', 2, 9959693, '10.3500', '10.4500', '10.5600', '10.8700', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1114, 'SCR7', 'SUPER CRUNC RED 7G', 'BUTAL', 2, 9960356, '10.3500', '10.4500', '10.5600', '10.8700', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1115, 'SCY7', 'SUPER CRUNCH YELLOW 7G', 'BUTAL', 2, 9998146, '10.3500', '10.4500', '10.5600', '10.8700', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1116, 'TCG7', 'TAGAY CHILI & GARLIC 7G', 'BUTAL', 2, 9972386, '10.3500', '10.4500', '10.5600', '10.8700', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1117, 'RCBBQ7', 'RED CHILI BBQ 7G', 'BUTAL', 2, 10000000, '10.3500', '10.4500', '10.5600', '10.8700', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1118, 'SCBBQ7', 'SWEET CHILI BBQ 7G', 'BUTAL', 2, 10000000, '10.3500', '10.4500', '10.5600', '10.8700', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1119, 'BCBBQ7', 'BACK CHILI BBQ 7G', 'BUTAL', 2, 10000000, '10.3500', '10.4500', '10.5600', '10.8700', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1120, 'HCL5', 'HITS CARAMEL 5G', 'BUTAL', 2, 10000000, '10.3500', '10.5600', '10.5600', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1121, 'HCC5', 'HITS CHOCOLATE 5G', 'BUTAL', 2, 10000000, '10.3500', '10.5600', '10.5600', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1122, 'HSS5', 'HITS STRAWBERRY 54G', 'BUTAL', 2, 10000000, '10.3500', '10.5600', '10.5600', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1123, 'IC5', 'IKASHI CUTTLEFISH 5G', 'BUTAL', 2, 10000000, '17.4800', '17.8300', '17.8300', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1124, 'ISS5', 'IKASHI SOY SAUCE 5G', 'BUTAL', 2, 10000000, '21.2900', '21.7200', '21.7200', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1125, 'RCBBQ55', 'RED CHILI BBQ 55G', 'BUTAL', 2, 10000000, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1126, 'SCBBQ55', 'SWEET CHILI BBQ 55G', 'BUTAL', 2, 10000000, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1127, 'BCBBQ55', 'BACK CHILI BBQ 55G', 'BUTAL', 2, 10000000, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1128, 'TCG55', 'TAGY CHILI & GARLIC 55G', 'BUTAL', 2, 9997010, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1129, 'YSH18', 'YIPYAP SPEEDY HOT 18G', 'BUTAL', 2, 9997360, '20.7600', '22.8700', '21.1800', '22.0300', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1130, 'YNC18', 'YIPYAP NACHO CHESE 18G', 'BUTAL', 2, 9998442, '20.7600', '22.8700', '21.1800', '22.0300', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1131, 'YS18', 'YIPYAP SWEETCORN 18G', 'BUTAL', 2, 9998061, '20.7600', '22.8700', '21.1800', '22.0300', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1132, 'YBP18', 'YIPYAP BLACK PEPPER 18G', 'BUTAL', 2, 10000000, '20.7600', '22.8700', '20.1800', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1133, 'SCCH5', 'SUPER CRUNCH CHEESE 55G', 'BUTAL', 2, 9992719, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1134, 'SCS55', 'SUPER CRUNCH SWEETCORN 55G', 'BUTAL', 2, 9984336, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1135, 'SCR5', 'SUPER CRUNCH RED 55G', 'BUTAL', 2, 9993083, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1136, 'SCCC5', 'SUPER CRUCNH CHEESE CHEDAR', 'BUTAL', 2, 9999762, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1137, 'SCC120', 'SUPER CRUNCH CHEESE 120G', 'BUTAL', 2, 9999994, '16.5400', '18.5600', '16.8700', '17.3700', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1138, 'SCG120', 'SUPER CRUNCH SWEETCORN 120G', 'BUTAL', 2, 9999550, '16.5400', '18.5600', '16.8700', '17.3700', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1139, 'BMC110', 'BIG MUNCH CHEESE 110G', 'BUTAL', 2, 10000000, '0.0000', '20.4400', '20.4400', '21.0400', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1140, 'BMB110', 'BIG MUNCH BBQ 110G', 'BUTAL', 2, 10000000, '0.0000', '20.4400', '20.4400', '21.0400', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1141, 'YCRC14', 'YIPYAP CORN RING CHEESE 14G', 'BUTAL', 2, 9999940, '20.7600', '21.1800', '21.1800', '22.0300', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1142, 'YCSS20', 'YIPYAP CORN RING SWEET & SPICY14G', 'BUTAL', 2, 10000000, '20.7600', '21.1800', '21.1800', '22.0300', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1143, 'SCCF7 (BAG)', 'SUPER CRUNCH CHOCO FLAKES 7G', 'BUTAL', 2, 10000000, '10.3500', '10.5600', '10.5600', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1144, 'SCCF7 (BAG)', 'SUPER CRUNCH CHOCO FLAKES 7G', 'BUTAL', 2, 10000000, '68.8500', '70.2300', '70.2300', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1145, 'SBS180 (CASE)', 'S.D BROWNIE SCOTCH 180g', 'BUTAL', 2, 10000000, '44.4900', '49.7400', '45.3800', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1146, 'SCCHLK415', 'SUPER CRUNCHCHICHARONLECHON', 'BUTAL', 2, 9999626, '78.4400', '80.0000', '80.0000', '82.3700', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1147, 'SCCHR22', 'SUPER CRUNCH CHEESERING22Gx25', 'BUTAL', 2, 9997405, '5.1500', '143.8000', '131.2500', '134.9600', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1148, 'SCCLK32', 'SUPER CRUNCH CHIPCHARON LECHON', 'BUTAL', 2, 9999866, '73.1400', '78.0700', '74.6100', '76.8000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1149, 'SCCP30', 'SUPER CRUNCH CHEESE PUFFS 30', 'BUTAL', 2, 9999821, '73.1400', '74.6000', '74.6000', '76.8000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1150, 'SCCP300', 'SUPER CRUNCH CHEESE PUFF300G', 'BUTAL', 2, 9999905, '79.5000', '87.5800', '81.0900', '83.4800', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1151, 'SCCPB32', 'SUPER CRUNCH CHIPHARON PINOY', 'BUTAL', 2, 9999960, '73.1400', '78.0700', '74.6100', '76.8000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1152, 'SCCR370', 'SUPER CRUNCH CHEESE RING370G', 'BUTAL', 2, 9999864, '79.5000', '81.0900', '81.0900', '83.4800', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1153, 'SCFC48', 'S.CRUNCH FISH CHARAP 32g.', 'BUTAL', 2, 10000000, '68.8500', '70.2300', '70.2300', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1154, 'SCNB48', 'SUPER CRUNCH NACHO BBQ 48g', 'BUTAL', 2, 9999925, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1155, 'SCNBHSB 25G', 'SUPER CRUNCH BLAZIN HOT 25G', 'BUTAL', 2, 9997359, '128.7500', '143.8000', '131.2500', '134.9600', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1156, 'SCNC48', 'SUPER CRUNCH NACHO CHEESE 48g', 'BUTAL', 2, 9999865, '73.1400', '82.1800', '74.6100', '76.8000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1157, 'SCNC500', 'SUPER CRUNC NACHOS CHEESE 500G', 'BUTAL', 2, 9999855, '72.0800', '73.5200', '73.5200', '75.6900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1158, 'SCNPP', 'SUPER CRUNCH NACHOS PEPPER 25', 'BUTAL', 2, 9999433, '128.7500', '143.8000', '131.2500', '134.9600', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1159, 'SCP330', 'SNACKERS CHEESY PUFF 330g', 'BUTAL', 2, 9999992, '68.8500', '85.7100', '70.2300', '85.7100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1160, 'SNCR400', 'SNACKERS CHEESE RING 400g', 'BUTAL', 2, 10000000, '68.8500', '84.1500', '70.2300', '84.1500', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1161, 'SCS500', 'SUPER CRUNCH SWEETCORN500G', 'BUTAL', 2, 9999832, '72.0800', '73.5200', '73.5200', '75.6900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1162, 'SDBB14(CASE)', 'SUPER DELIGHTS BROWNIE BITE 14', 'BUTAL', 2, 9998234, '61.2200', '62.4400', '62.4400', '64.2800', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1163, 'SDBB200 (CASE)', 'SUPER DELIGHT BROWNIE BITES', 'BUTAL', 2, 9999986, '44.4900', '49.7400', '47.4400', '48.8400', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1164, 'SDBBCAN (CASE)', 'SUPER DELIGHT BROWNIE BITES CA', 'BUTAL', 2, 10000000, '10.3500', '105.8900', '105.8900', '105.8900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1165, 'SDBS14 (CASE)', 'SUPER DELIGTHS BROWNIES SCOTCH', 'BUTAL', 2, 9999928, '61.2200', '62.4400', '62.4400', '64.2800', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1166, 'SDBS180 (CASE)', 'SUPER DELIGHT BROWNIE SCOTH', 'BUTAL', 2, 9999976, '46.5100', '49.7400', '47.4400', '48.8400', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1167, 'SDBSB14 (CASE).', 'SUPER DELIGHTS BUTTERSCOTCH 14', 'BUTAL', 2, 9999649, '61.2200', '62.4400', '62.4400', '64.2800', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1168, 'SDBSB180-CASE', 'S.D BUTTERSCOTCH BITES 180G', 'BUTAL', 2, 10000000, '46.5100', '49.7400', '49.7400', '48.8400', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1169, 'SDCC120 (CASE)', 'SUPER DELIGHT REG. CHOCO CHIP', 'BUTAL', 2, 9999780, '33.0000', '35.4100', '33.6600', '34.6500', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1170, 'SDMCC175 (CASE)', 'SUPER DELIGHT MINI CHOCO CHIP', 'BUTAL', 2, 10000000, '42.9400', '45.4200', '43.7900', '45.0800', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1171, 'SDMCC28', 'super delight mini chochip 28g', 'BUTAL', 2, 9984894, '5.2500', '6.0800', '5.3500', '5.5100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1172, 'SDRCC400', 'super delight reg chocolate 40', 'BUTAL', 2, 9997111, '10.0700', '10.7100', '10.2700', '10.5800', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1173, 'SNBBQ500', 'SNACKERS NACHOS BBQ 500G x 20s', 'BUTAL', 2, 10000000, '75.8500', '81.0900', '77.3600', '79.6400', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1174, 'SNC500', 'SNACKERS NACHOS CHEESE 500g', 'BUTAL', 2, 9999982, '75.8500', '81.0900', '77.3600', '79.6400', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1175, 'SNCLK415', 'SNACKER CHIPCHARON LECHON KAWA', 'BUTAL', 2, 9999954, '81.6200', '86.5000', '80.0000', '85.7100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1176, 'SNCPB415', 'SNACKER CHIPCHARON PINOY BAWAN', 'BUTAL', 2, 9999976, '81.6200', '86.5000', '83.2600', '85.7100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1177, 'SNCSS415', 'SNACKER CHIPCHARON SUKATSILI41', 'BUTAL', 2, 9999997, '81.6200', '86.5000', '79.9600', '85.7100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1178, 'SNP500', 'SNACKERS NACHOS PLAIN 500g', 'BUTAL', 2, 10000000, '68.8500', '74.6100', '70.2300', '73.6300', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1179, 'SNS500', 'SNACKERS NACHOS SWEETCORN 500', 'BUTAL', 2, 10000000, '17.4300', '79.6400', '17.7800', '79.6400', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1180, 'SNSS500', 'SNACKERS NACHOS SWEET & SPICY', 'BUTAL', 2, 10000000, '75.8500', '81.0900', '77.3600', '79.6400', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1181, 'SPP500', 'SUPER PAMASKO PACK 500G', 'BUTAL', 2, 10000000, '68.6200', '70.0200', '70.0200', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1182, 'YMCB5', 'YAPPEE MILK CHOCOLATE BAR 5G', 'BUTAL', 2, 10000000, '10.3500', '10.5600', '10.5600', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1183, 'YNC18', 'YIPYAP NACHO CHEESE 18G', 'BUTAL', 2, 9999733, '20.7600', '22.8700', '21.1800', '22.0300', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1184, 'YPBB5', 'YAPPEE PEANUT BUTTER BAR 5G', 'BUTAL', 2, 10000000, '44.4900', '45.3800', '45.3800', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1185, 'YTCF5', 'YAPPEE TWINS C-FILLED SNACK 5G', 'BUTAL', 2, 10000000, '17.6400', '17.9900', '17.9900', '18.5200', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1186, 'YTUF5', 'YAPPEE TWINS U-FILLED SNACK 5G', 'BUTAL', 2, 10000000, '17.6400', '17.9900', '17.9900', '18.5200', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1187, 'YCSH55', 'YIPYAP CORNSNACK SPEEDY HOT 55', 'BUTAL', 2, 9999505, '75.8300', '82.1800', '74.6100', '76.8000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1188, 'CCER12', 'CHUMZ CHEESE RING 12G', 'BUTAL', 2, 9999976, '17.4800', '19.5200', '17.8300', '18.5400', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1189, 'CCR55', 'CHUMZ CHEESE RING 55G', 'BUTAL', 2, 10000000, '11.4000', '12.6900', '11.6300', '11.9700', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'PACK'),
(1190, 'SCG7', 'SUPER CRUNCH GREEN 7G', 'CASE', 2, 10000000, '207.0000', '217.3500', '211.1400', '217.3500', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1191, 'SCBL7', 'SUPER CRUNCH BLUE 7G', 'CASE', 2, 10000000, '207.0000', '217.3500', '211.1400', '217.3500', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1192, 'SCR7', 'SUPER CRUNC RED 7G', 'CASE', 2, 10000000, '207.0000', '217.3500', '211.1500', '217.3500', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1193, 'SCY7', 'SUPER CRUNCH YELLOW 7G', 'CASE', 2, 10000000, '207.0000', '217.3500', '211.1400', '217.3500', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1194, 'TCG7', 'TAGAY CHILI & GARLIC 7G', 'CASE', 2, 10000000, '207.0000', '217.3500', '211.1400', '217.3500', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1195, 'RCBBQ7', 'RED CHILI BBQ 7G', 'CASE', 2, 10000000, '207.0000', '217.3500', '211.1400', '217.3500', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1196, 'SCBBQ7', 'SWEET CHILI BBQ 7G', 'CASE', 2, 10000000, '207.0000', '217.3500', '211.1400', '217.3500', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1197, 'BCBBQ7', 'BACK CHILI BBQ 7G', 'CASE', 2, 10000000, '207.0000', '217.3500', '211.1400', '217.3500', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1198, 'HCL5', 'HITS CARAMEL 5G', 'CASE', 2, 10000000, '207.0000', '211.1400', '211.1400', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1199, 'HCC5', 'HITS CHOCOLATE 5G', 'CASE', 2, 10000000, '207.0000', '211.1400', '211.1400', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1200, 'HSS5', 'HITS STRAWBERRY 54G', 'CASE', 2, 10000000, '207.0000', '211.1400', '211.1400', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1201, 'IC5', 'IKASHI CUTTLEFISH 5G', 'CASE', 2, 10000000, '207.0000', '211.1400', '211.1400', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1202, 'ISS5', 'IKASHI SOY SAUCE 5G', 'CASE', 2, 10000000, '207.0000', '211.1400', '211.1400', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1203, 'RCBBQ55', 'RED CHILI BBQ 55G', 'CASE', 2, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1204, 'SCBBQ55', 'SWEET CHILI BBQ 55G', 'CASE', 2, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1205, 'BCBBQ55', 'BACK CHILI BBQ 55G', 'CASE', 2, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1206, 'TCG55', 'TAGY CHILI & GARLIC 55G', 'CASE', 2, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1207, 'YSH18', 'YIPYAP SPEEDY HOT 18G', 'CASE', 2, 10000000, '415.2500', '440.4100', '423.5500', '440.4100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1208, 'YNC18', 'YIPYAP NACHO CHESE 18G', 'CASE', 2, 10000000, '415.2500', '440.4100', '423.5500', '440.4100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1209, 'YS18', 'YIPYAP SWEETCORN 18G', 'CASE', 2, 10000000, '415.2500', '440.4100', '423.5500', '440.4100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1210, 'YBP18', 'YIPYAP BLACK PEPPER 18G', 'CASE', 2, 10000000, '415.2500', '423.5500', '423.5500', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1211, 'SCCH5', 'SUPER CRUNCH CHEESE 55G', 'CASE', 2, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1212, 'SCS55', 'SUPER CRUNCH SWEETCORN 55G', 'CASE', 2, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1213, 'SCR5', 'SUPER CRUNCH RED 55G', 'CASE', 2, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1214, 'SCCC5', 'SUPER CRUCNH CHEESE CHEDAR', 'CASE', 2, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1215, 'SCC120', 'SUPER CRUNCH CHEESE 120G', 'CASE', 2, 10000000, '826.8000', '868.1400', '843.3400', '868.1400', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1216, 'SCG120', 'SUPER CRUNCH SWEETCORN 120G', 'CASE', 2, 10000000, '826.8000', '868.1400', '843.3400', '868.1400', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1217, 'BMC110', 'BIG MUNCH CHEESE 110G', 'CASE', 2, 10000000, '466.0900', '525.8900', '475.5100', '525.8900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1218, 'BMB110', 'BIG MUNCH BBQ 110G', 'CASE', 2, 10000000, '466.0900', '525.8900', '475.5100', '525.8900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1219, 'YCRC14', 'YIPYAP CORN RING CHEESE 14G', 'CASE', 2, 10000000, '415.2500', '440.4100', '423.5500', '440.4100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1220, 'YCSS20', 'YIPYAP CORN RING SWEET & SPICY14G', 'CASE', 2, 10000000, '415.2500', '440.4100', '423.5500', '440.4100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1221, 'SCCF7 (BAG)', 'SUPER CRUNCH CHOCO FLAKES 7G', 'CASE', 2, 10000000, '207.0000', '211.1400', '211.1400', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1222, 'SCCF7 (BAG)', 'SUPER CRUNCH CHOCO FLAKES 7G', 'CASE', 2, 10000000, '207.0000', '211.1400', '211.1400', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1223, 'SBS180 (CASE)', 'S.D BROWNIE SCOTCH 180g', 'CASE', 2, 10000000, '1067.7700', '1089.1300', '1089.1300', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1224, 'SCCHLK415', 'SUPER CRUNCHCHICHARONLECHON', 'CASE', 2, 10000000, '941.2800', '988.3400', '960.1100', '988.3400', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1225, 'SCCHR22', 'SUPER CRUNCH CHEESERING22Gx25', 'CASE', 2, 10000000, '514.1000', '539.8100', '524.3800', '539.8100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1226, 'SCCLK32', 'SUPER CRUNCH CHIPCHARON LECHON', 'CASE', 2, 10000000, '731.4000', '767.9700', '746.0300', '767.9700', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1227, 'SCCP30', 'SUPER CRUNCH CHEESE PUFFS 30', 'CASE', 2, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1228, 'SCCP300', 'SUPER CRUNCH CHEESE PUFF300G', 'CASE', 2, 10000000, '954.0000', '1001.7000', '973.0800', '1001.7000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1229, 'SCCPB32', 'SUPER CRUNCH CHIPHARON PINOY', 'CASE', 2, 10000000, '731.4000', '767.9700', '746.0300', '767.9700', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1230, 'SCCR370', 'SUPER CRUNCH CHEESE RING370G', 'CASE', 2, 10000000, '954.0000', '1001.7000', '973.0800', '1001.7000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1231, 'SCFC48', 'S.CRUNCH FISH CHARAP 32g.', 'CASE', 2, 10000000, '344.2700', '351.1600', '351.1600', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1232, 'SCNB48', 'SUPER CRUNCH NACHO BBQ 48g', 'CASE', 2, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1233, 'SCNBHSB 25G', 'SUPER CRUNCH BLAZIN HOT 25G', 'CASE', 2, 10000000, '514.1000', '539.8100', '524.3800', '539.8100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1234, 'SCNC48', 'SUPER CRUNCH NACHO CHEESE 48g', 'CASE', 2, 10000000, '356.7000', '383.9900', '373.0100', '383.9900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1235, 'SCNC500', 'SUPER CRUNC NACHOS CHEESE 500G', 'CASE', 2, 10000000, '864.9600', '908.2100', '882.2600', '908.2100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1236, 'SCNPP', 'SUPER CRUNCH NACHOS PEPPER 25', 'CASE', 2, 10000000, '514.1000', '539.8100', '524.3800', '539.8100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1237, 'SCP330', 'SNACKERS CHEESY PUFF 330g', 'CASE', 2, 10000000, '1160.7000', '1285.5200', '1183.8700', '1285.5200', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1238, 'SNCR400', 'SNACKERS CHEESE RING 400g', 'CASE', 2, 10000000, '1160.7000', '1262.1400', '1183.9100', '1262.1400', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1239, 'SCS500', 'SUPER CRUNCH SWEETCORN500G', 'CASE', 2, 10000000, '864.9600', '908.2100', '882.2600', '908.2100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1240, 'SDBB14(CASE)', 'SUPER DELIGHTS BROWNIE BITE 14', 'CASE', 2, 10000000, '734.5800', '771.3100', '749.2700', '771.3100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACKS'),
(1241, 'SDBB200 (CASE)', 'SUPER DELIGHT BROWNIE BITES', 'CASE', 2, 10000000, '1067.7700', '1171.9900', '1089.1300', '1171.9900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1242, 'SDBBCAN (CASE)', 'SUPER DELIGHT BROWNIE BITES CA', 'CASE', 2, 10000000, '622.8700', '635.3300', '635.3300', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1243, 'SDBS14 (CASE)', 'SUPER DELIGTHS BROWNIES SCOTCH', 'CASE', 2, 10000000, '734.5800', '771.3100', '749.2700', '771.3100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1244, 'SDBS180 (CASE)', 'SUPER DELIGHT BROWNIE SCOTH', 'CASE', 2, 10000000, '1116.1800', '1171.9900', '1138.5000', '1171.9900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1245, 'SDBSB14 (CASE).', 'SUPER DELIGHTS BUTTERSCOTCH 14', 'CASE', 2, 10000000, '734.5800', '771.3100', '749.2700', '771.3100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1246, 'SDBSB180-CASE', 'S.D BUTTERSCOTCH BITES 180G', 'CASE', 2, 10000000, '1116.1800', '1171.9900', '1138.5000', '1171.9900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1247, 'SDCC120 (CASE)', 'SUPER DELIGHT REG. CHOCO CHIP', 'CASE', 2, 10000000, '791.8200', '831.4100', '807.6600', '831.4100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1248, 'SDMCC175 (CASE)', 'SUPER DELIGHT MINI CHOCO CHIP', 'CASE', 2, 10000000, '1030.3200', '1081.8400', '1050.9300', '1081.8400', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK');
INSERT INTO `inventories` (`id`, `sku_code`, `description`, `sku_type`, `principal_id`, `running_balance`, `price_1`, `price_2`, `price_3`, `price_4`, `created_at`, `updated_at`, `uom`) VALUES
(1249, 'SDMCC28', 'super delight mini chochip 28g', 'CASE', 2, 10000000, '524.7000', '550.9400', '535.1900', '550.9400', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PCS'),
(1250, 'SDRCC400', 'super delight reg chocolate 40', 'CASE', 2, 10000000, '1007.0000', '1057.3500', '1027.1400', '1057.3500', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PCS'),
(1251, 'SNBBQ500', 'SNACKERS NACHOS BBQ 500G x 20s', 'CASE', 2, 10000000, '1516.8600', '1592.7000', '1547.2000', '1592.7000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1252, 'SNC500', 'SNACKERS NACHOS CHEESE 500g', 'CASE', 2, 10000000, '1516.8600', '1592.7000', '1547.2000', '1592.7000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1253, 'SNCLK415', 'SNACKER CHIPCHARON LECHON KAWA', 'CASE', 2, 10000000, '1224.3000', '1285.5200', '1248.7900', '1285.5200', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1254, 'SNCPB415', 'SNACKER CHIPCHARON PINOY BAWAN', 'CASE', 2, 10000000, '1224.3000', '1285.5200', '1248.7900', '1285.5200', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1255, 'SNCSS415', 'SNACKER CHIPCHARON SUKATSILI41', 'CASE', 2, 10000000, '1224.3000', '1285.5200', '1248.7900', '1285.5200', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1256, 'SNP500', 'SNACKERS NACHOS PLAIN 500g', 'CASE', 2, 10000000, '1250.8000', '1472.5000', '1275.8200', '1472.5000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1257, 'SNS500', 'SNACKERS NACHOS SWEETCORN 500', 'CASE', 2, 10000000, '1399.2000', '1592.7000', '1427.1800', '1592.7000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1258, 'SNSS500', 'SNACKERS NACHOS SWEET & SPICY', 'CASE', 2, 10000000, '1516.8600', '1592.7000', '1547.2000', '1592.7000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1259, 'SPP500', 'SUPER PAMASKO PACK 500G', 'CASE', 2, 10000000, '974.5600', '994.0500', '994.0500', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'CASE/ PACK'),
(1260, 'YMCB5', 'YAPPEE MILK CHOCOLATE BAR 5G', 'CASE', 2, 10000000, '325.7400', '359.7900', '359.7900', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1261, 'YNC18', 'YIPYAP NACHO CHEESE 18G', 'CASE', 2, 10000000, '415.2500', '440.4100', '423.5500', '440.4100', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1262, 'YPBB5', 'YAPPEE PEANUT BUTTER BAR 5G', 'CASE', 2, 10000000, '352.7400', '359.7900', '359.7900', '0.0000', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1263, 'YTCF5', 'YAPPEE TWINS C-FILLED SNACK 5G', 'CASE', 2, 10000000, '352.7400', '370.3800', '359.7900', '370.3800', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1264, 'YTUF5', 'YAPPEE TWINS U-FILLED SNACK 5G', 'CASE', 2, 10000000, '352.7400', '370.3800', '359.7900', '370.3800', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1265, 'YCSH55', 'YIPYAP CORNSNACK SPEEDY HOT 55', 'CASE', 2, 10000000, '365.7000', '383.9900', '373.0100', '383.9900', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1266, 'CCER12', 'CHUMZ CHEESE RING 12G', 'CASE', 2, 10000000, '174.7800', '135.3800', '178.2800', '185.3800', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS'),
(1267, 'CCR55', 'CHUMZ CHEESE RING 55G', 'CASE', 2, 10000000, '284.8800', '299.1200', '290.5800', '299.1200', '2022-07-13 09:08:52', '2022-07-13 09:08:52', 'BAG/PACKS');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `created_at`, `updated_at`, `location`) VALUES
(1, '2022-07-12 01:07:43', '2022-07-12 01:07:43', 'CAGAYAN DE ORO CITY'),
(2, '2022-07-12 01:07:43', '2022-07-12 01:07:43', 'MISAMIS ORIENTAL EAST'),
(4, '2022-07-12 01:07:43', '2022-07-12 01:07:43', 'SOUTH BUKIDNON'),
(5, '2022-07-12 01:07:43', '2022-07-12 01:07:43', 'ILIGAN'),
(6, '2022-07-12 01:07:43', '2022-07-12 01:07:43', 'WEST MIS. OR'),
(7, '2022-07-12 01:07:43', '2022-07-12 01:07:43', 'NORTH BUKIDNON'),
(8, '2022-07-12 01:07:43', '2022-07-12 01:07:43', 'LANAO'),
(9, '2022-07-12 01:07:43', '2022-07-12 01:07:43', 'MISAMIS ORIENTAL'),
(10, '2022-07-12 01:07:43', '2022-07-12 01:07:43', 'CENTRAL BUKIDNON');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_11_112510_create_locations_table', 1),
(6, '2022_07_11_112603_create_principals_table', 1),
(7, '2022_07_11_113846_add_column_user_image_to_users', 1),
(8, '2022_07_11_114940_create_agent_users_table', 1),
(9, '2022_07_11_115126_add_column_agent_image_to_agent_user', 1),
(10, '2022_07_11_122307_add_column_to_location_table', 1),
(11, '2022_07_11_122406_add_column_to_principal', 1),
(12, '2022_07_11_123645_create_customers_table', 1),
(13, '2022_07_12_005703_create_audit_trails_table', 2),
(14, '2022_07_12_011311_add_column_time_stamp', 3),
(15, '2022_07_12_012836_create_customer_principal_codes_table', 4),
(16, '2022_07_12_014610_create_customer_principal_prices_table', 5),
(17, '2022_07_12_015034_create_inventories_table', 6),
(18, '2022_07_12_021205_create_inventory_uploads_table', 7),
(19, '2022_07_12_021928_add_column_uom_to_inventory', 8),
(20, '2022_07_12_055130_create_sales_registers_table', 9),
(21, '2022_07_12_120706_create_sales_register_details_table', 10),
(22, '2022_07_12_233531_add_column_sku_type_to_sales_register', 11),
(23, '2022_07_13_140234_create_sales_orders_table', 12),
(24, '2022_07_13_140611_create_sales_order_details_table', 12),
(25, '2022_07_13_143953_add_column_sales_order_id', 12),
(26, '2022_07_13_144811_add_column_date_to_sales_order', 12),
(27, '2022_07_14_113437_add_column_allowed_number_of_sales_order', 13),
(28, '2022_07_14_125007_add_column_status_to_table_sales_order', 13),
(29, '2022_07_16_031934_add_column_special_account_to_table_customer', 14),
(30, '2022_07_16_035101_create_customer_principal_discounts_table', 14),
(31, '2022_07_19_124921_add_column_exported_to_table_sales_order', 14),
(32, '2022_07_19_235913_create_collections_table', 14),
(33, '2022_07_20_000902_create_collection_details_table', 14),
(34, '2022_07_20_001517_add_column_balance_to_collections', 14),
(35, '2022_07_20_113822_add_principal_to_collection', 14),
(36, '2022_07_20_120610_add_amount_paid_to_sales_order', 14),
(37, '2022_07_20_122143_add_amount_paid_to_sales_register', 14),
(38, '2022_07_20_132318_add_column_export_to_collection', 14),
(39, '2022_07_21_000258_add_remarks_to_collection', 15),
(40, '2022_07_21_131713_create_bad_orders_table', 16),
(41, '2022_07_21_132214_create_bad_order_details_table', 16),
(42, '2022_07_22_002112_create_bad_order_details_table', 17),
(43, '2022_07_22_002830_add_sales_register_id_to_bad_order', 18),
(44, '2022_07_22_061251_add_column_total_bo_to_collection', 19),
(45, '2022_07_28_112456_add_column_to_collections_details', 20),
(46, '2022_07_28_122128_add_or_number_to_collections', 20),
(47, '2022_07_28_123027_add_balance_to_collection_details', 20),
(48, '2022_07_28_143049_add_columns_to_customer', 20),
(49, '2022_07_28_144534_add_coordinates_to_customer', 20),
(50, '2022_08_02_112929_create_customer_exports_table', 20),
(51, '2022_08_02_114357_add_exported_to_customer_export', 20),
(52, '2022_08_03_121600_add_kob_to_customer_export', 20),
(53, '2022_08_03_125306_add_sales_order_to_sales_order', 20),
(54, '2022_09_07_005350_add_column_latitude_to_customer', 21),
(55, '2022_09_07_023452_add_status_to_customer_export', 22);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `principals`
--

CREATE TABLE `principals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `principal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `principals`
--

INSERT INTO `principals` (`id`, `created_at`, `updated_at`, `principal`) VALUES
(1, '2022-07-12 01:08:27', '2022-07-12 01:08:27', 'None'),
(2, '2022-07-12 01:08:27', '2022-07-12 01:08:27', 'GCI'),
(3, '2022-07-12 01:08:27', '2022-07-12 01:08:27', 'PFC'),
(4, '2022-07-12 01:08:27', '2022-07-12 01:08:27', 'EPI'),
(5, '2022-07-12 01:08:27', '2022-07-12 01:08:27', 'DOLE'),
(6, '2022-07-12 01:08:27', '2022-07-12 01:08:27', 'ALASKA'),
(7, '2022-07-12 01:08:27', '2022-07-12 01:08:27', 'CIFPI'),
(8, '2022-07-12 01:08:27', '2022-07-12 01:08:27', 'PPMC'),
(10, '2022-07-12 01:08:27', '2022-07-12 01:08:27', 'SUNPRIDE FOODS');

-- --------------------------------------------------------

--
-- Table structure for table `sales_orders`
--

CREATE TABLE `sales_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `principal_id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` int(11) NOT NULL,
  `mode_of_transaction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` double(15,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exported` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_paid` double(15,4) NOT NULL,
  `sales_order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_orders`
--

INSERT INTO `sales_orders` (`id`, `customer_id`, `principal_id`, `agent_id`, `mode_of_transaction`, `sku_type`, `total_amount`, `created_at`, `updated_at`, `date`, `status`, `exported`, `amount_paid`, `sales_order_number`) VALUES
(4, 3, 3, 1, 'PDC', 'BUTAL', 13418.5800, '2022-09-07 00:40:56', '2022-09-06 16:41:39', NULL, 'New', 'exported', 0.0000, 'SO-Sidney Salazar-JOEI VICENTE-1-2022-09-0002');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_details`
--

CREATE TABLE `sales_order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inventory_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double(15,4) NOT NULL,
  `sku_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sales_order_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_order_details`
--

INSERT INTO `sales_order_details` (`id`, `inventory_id`, `quantity`, `unit_price`, `sku_type`, `created_at`, `updated_at`, `sales_order_id`) VALUES
(11, 963, 50, 10.4500, 'BUTAL', '2022-09-07 00:40:56', '2022-09-07 00:40:56', 4),
(12, 964, 50, 10.5600, 'BUTAL', '2022-09-07 00:40:56', '2022-09-07 00:40:56', 4),
(13, 965, 50, 10.5600, 'BUTAL', '2022-09-07 00:40:56', '2022-09-07 00:40:56', 4),
(14, 966, 60, 10.5600, 'BUTAL', '2022-09-07 00:40:56', '2022-09-07 00:40:56', 4),
(15, 967, 70, 17.8300, 'BUTAL', '2022-09-07 00:40:56', '2022-09-07 00:40:56', 4),
(16, 971, 80, 82.1800, 'BUTAL', '2022-09-07 00:40:56', '2022-09-07 00:40:56', 4),
(17, 983, 90, 20.4400, 'BUTAL', '2022-09-07 00:40:56', '2022-09-07 00:40:56', 4),
(18, 984, 13, 20.4400, 'BUTAL', '2022-09-07 00:40:56', '2022-09-07 00:40:56', 4),
(19, 1032, 33, 19.5200, 'BUTAL', '2022-09-07 00:40:56', '2022-09-07 00:40:56', 4),
(20, 1033, 50, 12.6900, 'BUTAL', '2022-09-07 00:40:56', '2022-09-07 00:40:56', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sales_registers`
--

CREATE TABLE `sales_registers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `principal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `export_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` decimal(15,2) DEFAULT NULL,
  `dr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_delivered` date DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sku_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_paid` double(15,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_registers`
--

INSERT INTO `sales_registers` (`id`, `customer_id`, `principal_id`, `export_code`, `total_amount`, `dr`, `date_delivered`, `status`, `created_at`, `updated_at`, `sku_type`, `amount_paid`) VALUES
(1, 1, 2, 'export_code_4', '50000.00', 'DR-GCI-0001', '2022-07-05', 'partial', '2022-07-15 00:09:57', '2022-07-22 06:11:02', 'Butal', 0.0000),
(8, 3, 3, NULL, '295.00', 'PFC123123', '2022-08-29', NULL, '2022-09-06 16:22:00', '2022-09-06 16:22:00', 'BUTAL', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_register_details`
--

CREATE TABLE `sales_register_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_register_id` bigint(20) UNSIGNED NOT NULL,
  `inventory_id` bigint(20) UNSIGNED NOT NULL,
  `delivered_quantity` int(11) NOT NULL,
  `unit_price` double(15,4) DEFAULT NULL,
  `sku_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_register_details`
--

INSERT INTO `sales_register_details` (`id`, `sales_register_id`, `inventory_id`, `delivered_quantity`, `unit_price`, `sku_type`, `created_at`, `updated_at`) VALUES
(1, 1, 956, 50, 10.4500, 'BUTAL', '2022-07-15 00:09:57', '2022-07-15 00:09:57'),
(2, 1, 957, 100, 10.4500, 'BUTAL', '2022-07-15 00:09:57', '2022-07-15 00:09:57'),
(3, 1, 958, 150, 10.4500, 'BUTAL', '2022-07-15 00:09:57', '2022-07-15 00:09:57'),
(4, 1, 959, 200, 10.4500, 'BUTAL', '2022-07-15 00:09:57', '2022-07-15 00:09:57'),
(5, 1, 960, 300, 10.4500, 'BUTAL', '2022-07-15 00:09:57', '2022-07-15 00:09:57'),
(6, 1, 961, 20, 10.4500, 'BUTAL', '2022-07-15 00:09:57', '2022-07-15 00:09:57'),
(25, 8, 963, 3, 10.0000, 'BUTAL', '2022-09-06 16:22:00', '2022-09-06 16:22:00'),
(26, 8, 964, 4, 10.0000, 'BUTAL', '2022-09-06 16:22:00', '2022-09-06 16:22:00'),
(27, 8, 965, 4, 10.0000, 'BUTAL', '2022-09-06 16:22:00', '2022-09-06 16:22:00'),
(28, 8, 966, 1, 10.0000, 'BUTAL', '2022-09-06 16:22:00', '2022-09-06 16:22:00'),
(29, 8, 967, 1, 10.0000, 'BUTAL', '2022-09-06 16:22:00', '2022-09-06 16:22:00'),
(30, 8, 971, 3, 10.0000, 'BUTAL', '2022-09-06 16:22:00', '2022-09-06 16:22:00'),
(31, 8, 983, 3, 10.0000, 'BUTAL', '2022-09-06 16:22:00', '2022-09-06 16:22:00'),
(32, 8, 984, 3, 10.0000, 'BUTAL', '2022-09-06 16:22:00', '2022-09-06 16:22:00'),
(33, 8, 1032, 4, 10.0000, 'BUTAL', '2022-09-06 16:22:00', '2022-09-06 16:22:00'),
(34, 8, 1033, 4, 10.0000, 'BUTAL', '2022-09-06 16:22:00', '2022-09-06 16:22:00');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `agent_users`
--
ALTER TABLE `agent_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_trails`
--
ALTER TABLE `audit_trails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bad_orders`
--
ALTER TABLE `bad_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bad_orders_customer_id_index` (`customer_id`),
  ADD KEY `bad_orders_principal_id_index` (`principal_id`);

--
-- Indexes for table `bad_order_details`
--
ALTER TABLE `bad_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bad_order_details_bad_order_id_index` (`bad_order_id`),
  ADD KEY `bad_order_details_inventory_id_index` (`inventory_id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collections_customer_id_index` (`customer_id`);

--
-- Indexes for table `collection_details`
--
ALTER TABLE `collection_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collection_details_collection_id_index` (`collection_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_location_id_index` (`location_id`);

--
-- Indexes for table `customer_exports`
--
ALTER TABLE `customer_exports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_principal_codes`
--
ALTER TABLE `customer_principal_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_principal_codes_customer_id_index` (`customer_id`),
  ADD KEY `customer_principal_codes_principal_id_index` (`principal_id`);

--
-- Indexes for table `customer_principal_discounts`
--
ALTER TABLE `customer_principal_discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_principal_discounts_customer_id_index` (`customer_id`),
  ADD KEY `customer_principal_discounts_principal_id_index` (`principal_id`);

--
-- Indexes for table `customer_principal_prices`
--
ALTER TABLE `customer_principal_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_principal_prices_customer_id_index` (`customer_id`),
  ADD KEY `customer_principal_prices_principal_id_index` (`principal_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventories_principal_id_index` (`principal_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `principals`
--
ALTER TABLE `principals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_orders`
--
ALTER TABLE `sales_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_orders_customer_id_index` (`customer_id`),
  ADD KEY `sales_orders_principal_id_index` (`principal_id`);

--
-- Indexes for table `sales_order_details`
--
ALTER TABLE `sales_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_order_details_inventory_id_index` (`inventory_id`),
  ADD KEY `sales_order_details_sales_order_id_index` (`sales_order_id`);

--
-- Indexes for table `sales_registers`
--
ALTER TABLE `sales_registers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_registers_customer_id_index` (`customer_id`),
  ADD KEY `sales_registers_principal_id_index` (`principal_id`);

--
-- Indexes for table `sales_register_details`
--
ALTER TABLE `sales_register_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_register_details_sales_register_id_index` (`sales_register_id`),
  ADD KEY `sales_register_details_inventory_id_index` (`inventory_id`);

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
-- AUTO_INCREMENT for table `agent_users`
--
ALTER TABLE `agent_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `audit_trails`
--
ALTER TABLE `audit_trails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bad_orders`
--
ALTER TABLE `bad_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bad_order_details`
--
ALTER TABLE `bad_order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collection_details`
--
ALTER TABLE `collection_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer_exports`
--
ALTER TABLE `customer_exports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_principal_codes`
--
ALTER TABLE `customer_principal_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `customer_principal_discounts`
--
ALTER TABLE `customer_principal_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_principal_prices`
--
ALTER TABLE `customer_principal_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1268;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `principals`
--
ALTER TABLE `principals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales_orders`
--
ALTER TABLE `sales_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales_order_details`
--
ALTER TABLE `sales_order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sales_registers`
--
ALTER TABLE `sales_registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales_register_details`
--
ALTER TABLE `sales_register_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bad_orders`
--
ALTER TABLE `bad_orders`
  ADD CONSTRAINT `bad_orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `bad_orders_principal_id_foreign` FOREIGN KEY (`principal_id`) REFERENCES `principals` (`id`);

--
-- Constraints for table `bad_order_details`
--
ALTER TABLE `bad_order_details`
  ADD CONSTRAINT `bad_order_details_bad_order_id_foreign` FOREIGN KEY (`bad_order_id`) REFERENCES `bad_orders` (`id`),
  ADD CONSTRAINT `bad_order_details_inventory_id_foreign` FOREIGN KEY (`inventory_id`) REFERENCES `inventories` (`id`);

--
-- Constraints for table `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `collections_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `collection_details`
--
ALTER TABLE `collection_details`
  ADD CONSTRAINT `collection_details_collection_id_foreign` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `customer_principal_codes`
--
ALTER TABLE `customer_principal_codes`
  ADD CONSTRAINT `customer_principal_codes_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `customer_principal_codes_principal_id_foreign` FOREIGN KEY (`principal_id`) REFERENCES `principals` (`id`);

--
-- Constraints for table `customer_principal_discounts`
--
ALTER TABLE `customer_principal_discounts`
  ADD CONSTRAINT `customer_principal_discounts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `customer_principal_discounts_principal_id_foreign` FOREIGN KEY (`principal_id`) REFERENCES `principals` (`id`);

--
-- Constraints for table `customer_principal_prices`
--
ALTER TABLE `customer_principal_prices`
  ADD CONSTRAINT `customer_principal_prices_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `customer_principal_prices_principal_id_foreign` FOREIGN KEY (`principal_id`) REFERENCES `principals` (`id`);

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_principal_id_foreign` FOREIGN KEY (`principal_id`) REFERENCES `principals` (`id`);

--
-- Constraints for table `sales_orders`
--
ALTER TABLE `sales_orders`
  ADD CONSTRAINT `sales_orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `sales_orders_principal_id_foreign` FOREIGN KEY (`principal_id`) REFERENCES `principals` (`id`);

--
-- Constraints for table `sales_order_details`
--
ALTER TABLE `sales_order_details`
  ADD CONSTRAINT `sales_order_details_inventory_id_foreign` FOREIGN KEY (`inventory_id`) REFERENCES `inventories` (`id`),
  ADD CONSTRAINT `sales_order_details_sales_order_id_foreign` FOREIGN KEY (`sales_order_id`) REFERENCES `sales_orders` (`id`);

--
-- Constraints for table `sales_registers`
--
ALTER TABLE `sales_registers`
  ADD CONSTRAINT `sales_registers_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `sales_registers_principal_id_foreign` FOREIGN KEY (`principal_id`) REFERENCES `principals` (`id`);

--
-- Constraints for table `sales_register_details`
--
ALTER TABLE `sales_register_details`
  ADD CONSTRAINT `sales_register_details_inventory_id_foreign` FOREIGN KEY (`inventory_id`) REFERENCES `inventories` (`id`),
  ADD CONSTRAINT `sales_register_details_sales_register_id_foreign` FOREIGN KEY (`sales_register_id`) REFERENCES `sales_registers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
