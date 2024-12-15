-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 05:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'agent',
  `username` varchar(255) NOT NULL,
  `agent_company` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `realtron_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `role`, `username`, `agent_company`, `phone`, `email`, `address`, `city`, `area`, `pincode`, `password`, `profile`, `created_at`, `updated_at`, `status`, `realtron_id`) VALUES
(5, 'agent', 'ganesh', 'TP groups', '1234567890', 'ganesh@gmail.com', 'thandalam', 'chennai', 'saveetha nagar', '204026', '12345678', 'images/1719899287.jpg', '2024-07-02 00:18:07', '2024-11-03 22:44:14', 'accepted', 11),
(15, 'agent', 'saveetha', 'TP groups', '9898765432', 'saveetha@gmail.com', 'Thandalam', 'Chennai', 'saveetha nagar', '602105', '12345678', 'images/1729870824.jpg', '2024-10-25 10:10:24', '2024-11-23 03:44:32', 'accepted', 11),
(16, 'agent', 'agent', 'S Groups', '8639168860', 'agent@gmail.com', 'Saveeths nagar', 'chennai', 'thandalam', '602105', '12345678', 'images/1732111730.jpg', '2024-11-20 08:38:50', '2024-11-20 08:38:50', 'pending', 12),
(17, 'agent', 'Madhav', 'TP groups', '7412589630', 'madhav@gmail.com', 'Saveetha Nagar', 'Chennai', 'Thandalam', '602105', '12345678', 'images/1733674632.png', '2024-12-08 10:47:12', '2024-12-08 10:47:41', 'accepted', 11),
(18, 'agent', 'izze', 'Realestate', '7531594682', 'izze@gmail.com', 'Thandalam', 'Chennai', 'Saveetha Nagar', '602105', '12345678', 'images/1733848298.jpg', '2024-12-10 11:01:38', '2024-12-10 11:02:01', 'accepted', 18);

-- --------------------------------------------------------

--
-- Table structure for table `assigntasks`
--

CREATE TABLE `assigntasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_name` varchar(255) NOT NULL,
  `task` varchar(255) NOT NULL,
  `due_date` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigntasks`
--

INSERT INTO `assigntasks` (`id`, `agent_name`, `task`, `due_date`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'ganesh', 'ambattur', '3/3/24', 'complete soon', '2024-07-07 23:00:57', '2024-07-07 23:00:57'),
(3, 'Hari', 'Thandalam', '3/3/24', 'complete the task', '2024-07-08 09:58:37', '2024-07-08 09:58:37'),
(7, 'varun, salem', 'Thandalam', '2024-07-08', 'Complete the work', '2024-07-08 11:13:45', '2024-07-08 11:13:45'),
(8, 'ganesh, chennai', 'eaSDA', '2024-07-09', 'qerafcd', '2024-07-08 21:41:58', '2024-07-08 21:41:58'),
(9, 'varun, salem', 'hi hello sapitengala', '2024-10-26', 'comple the task asap', '2024-10-24 03:12:50', '2024-10-24 03:12:50'),
(10, 'ganesh, chennai', 'Thandalam', '2024-11-27', 'Complete the task and submit the details', '2024-11-24 09:43:44', '2024-11-24 09:43:44'),
(11, 'ganesh, chennai', 'complete', '2024-11-26', 'qqwewrwerf', '2024-11-24 09:57:17', '2024-11-24 09:57:17'),
(12, 'saveetha, Chennai', 'complete', '2024-11-26', 'qqwewrwerf', '2024-11-24 09:58:30', '2024-11-24 09:58:30'),
(13, 'saveetha, Chennai', 'complete', '2024-11-26', 'qqwewrwerf', '2024-11-24 09:58:40', '2024-11-24 09:58:40'),
(14, 'ganesh, chennai', 'complete', '2024-11-26', 'qqwewrwerf', '2024-11-24 09:58:50', '2024-11-24 09:58:50'),
(15, 'izze, Chennai', 'Complete the work. Generate the bill', '2024-12-14', 'Work in Ambatture ot', '2024-12-10 11:15:52', '2024-12-10 11:15:52'),
(16, 'izze, Chennai', 'complete the task and generate bill', '2024-12-14', 'Location in Ambatture ot', '2024-12-10 11:17:42', '2024-12-10 11:17:42'),
(17, 'izze, Chennai', 'complete the task', '2024-12-14', 'location in ambattur', '2024-12-10 11:37:37', '2024-12-10 11:37:37'),
(18, 'Madhav, Chennai', 'Complete the task and generate the bill', '2024-12-12', 'Location in ambutter', '2024-12-10 11:43:04', '2024-12-10 11:43:04'),
(19, 'ganesh, chennai', 'Complete the task and generate the bill', '2024-12-12', 'Location in ambutter', '2024-12-10 11:43:34', '2024-12-10 11:43:34'),
(20, 'ganesh, chennai', 'Complete the task and generate the bill', '2024-12-12', 'Location in ambutter', '2024-12-10 11:43:46', '2024-12-10 11:43:46'),
(21, 'ganesh, chennai', 'Complete the task and generate the bill', '2024-12-12', 'Location in ambutter', '2024-12-10 11:44:08', '2024-12-10 11:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'apartment', '2024-06-03 04:05:36', '2024-06-03 04:05:36'),
(2, 'plots', '2024-06-03 04:06:15', '2024-06-03 04:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `agent_name` varchar(255) NOT NULL,
  `agent_phone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_name`, `user_phone`, `user_address`, `agent_name`, `agent_phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'madhav', '9012345678', 'SaveethaNagar', 'ganesh', '8012345678', '12334', '2024-11-08 05:12:49', '2024-11-08 05:12:49'),
(2, 'hari', '7098654321', 'Thandalam', 'ganesh', '6543217098', 'I need to by this house', '2024-11-08 10:38:54', '2024-11-08 10:38:54'),
(3, 'Madhav', '7412589632', 'Thandalam', 'Ganesh', '8523697412', 'I want to buy the house', '2024-12-05 23:48:49', '2024-12-05 23:48:49');

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
-- Table structure for table `generates`
--

CREATE TABLE `generates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `agent_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `admin_share` decimal(10,2) NOT NULL,
  `company_share` decimal(10,2) NOT NULL,
  `agent_share` decimal(10,2) NOT NULL,
  `user_share` decimal(10,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generates`
--

INSERT INTO `generates` (`id`, `company_name`, `agent_name`, `price`, `admin_share`, `company_share`, `agent_share`, `user_share`, `user_id`, `company_id`, `agent_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(12, 'TP groups', 'ganesh', 1000000.00, 50000.00, 100000.00, 150000.00, 700000.00, NULL, NULL, NULL, NULL, '2024-12-05 23:00:42', '2024-12-05 23:00:42'),
(13, 'TP groups', 'ganesh', 1000000.00, 50000.00, 100000.00, 150000.00, 700000.00, NULL, NULL, NULL, NULL, '2024-12-05 23:02:52', '2024-12-05 23:02:52'),
(14, 'TP groups', 'ganesh', 100000.00, 5000.00, 10000.00, 15000.00, 70000.00, NULL, NULL, NULL, NULL, '2024-12-05 23:05:58', '2024-12-05 23:05:58'),
(15, 'TP groups', 'ganesh', 100000.00, 5000.00, 10000.00, 15000.00, 70000.00, NULL, NULL, NULL, NULL, '2024-12-05 23:06:14', '2024-12-05 23:06:14'),
(16, 'TP groups', 'ganesh', 100000.00, 5000.00, 10000.00, 15000.00, 70000.00, NULL, NULL, NULL, NULL, '2024-12-05 23:07:54', '2024-12-05 23:07:54'),
(17, 'TP groups', 'ganesh', 100000.00, 5000.00, 10000.00, 15000.00, 70000.00, NULL, NULL, NULL, NULL, '2024-12-05 23:09:16', '2024-12-05 23:09:16'),
(18, 'TP groups', 'ganesh', 100000.00, 5000.00, 10000.00, 15000.00, 70000.00, NULL, NULL, NULL, NULL, '2024-12-05 23:11:39', '2024-12-05 23:11:39'),
(19, 'TP groups', 'agent', 10000000.00, 500000.00, 1000000.00, 1500000.00, 7000000.00, NULL, NULL, NULL, NULL, '2024-12-10 07:50:44', '2024-12-10 07:50:44');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_03_084422_create_categories_table', 2),
(6, '2024_06_03_085020_create_categories_table', 3),
(7, '2024_06_06_091315_create_properties_table', 4),
(8, '2024_06_13_042634_create_realtrons_table', 5),
(9, '2024_06_13_062517_create_agents_table', 6),
(10, '2024_06_17_044140_add_realtroncompany_field_to_realtrons', 6),
(11, '2024_06_20_060540_add_fileupload_field_to_realtrons', 7),
(12, '2024_06_21_050853_add_pincode__to__realtrons', 7),
(13, '2024_06_23_153302_create_table_agent_table', 7),
(14, '2024_06_24_033612_create_agent_table', 8),
(15, '2024_06_24_094233_create_realtron_table', 9),
(16, '2024_06_24_094255_create_agent_table', 9),
(17, '2024_06_24_100439_create_realtron_table', 10),
(18, '2024_06_24_101909_create_agent_table', 11),
(19, '2024_06_24_105130_create_realtrons_table', 12),
(20, '2024_06_25_033838_add_password_to__realtrons', 13),
(21, '2024_06_25_044241_add_status_to__realtrons', 14),
(22, '2024_06_25_050322_add_status_to__agent', 15),
(23, '2024_06_25_080558_create_agents_table', 16),
(24, '2024_06_26_031924_add_status_to__agents', 17),
(25, '2024_06_26_032128_add_status_to__agents', 18),
(26, '2024_06_26_092156_add_status_to__users', 19),
(27, '2024_06_27_040249_add_realtron_id_to_agents_table', 20),
(28, '2024_06_28_035855_add_realtron_id_to_users_table', 21),
(29, '2024_07_01_032020_create_sellers_table', 22),
(30, '2024_07_02_052311_add_realtron_id_to_sellers_table', 23),
(31, '2024_07_05_032932_create_assigntasks_table', 24),
(32, '2024_10_22_060936_add_agent_to_properties_table', 25),
(33, '2024_11_04_050342_add_price_to_properties_table', 26),
(34, '2024_11_08_061939_create_contact_table', 27),
(35, '2024_11_08_062815_create_contact_table', 28),
(36, '2024_11_08_102735_create_contacts_table', 29),
(37, '2024_11_13_155537_create_generate_table', 30),
(38, '2024_11_14_080507_create_dumps_table', 31),
(39, '2024_11_14_094418_create_generates_table', 32),
(40, '2024_11_14_094544_create_generates_table', 33),
(41, '2024_11_23_045309_create_generates_table', 34);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `selling_type` varchar(255) NOT NULL,
  `bhk` varchar(255) NOT NULL,
  `agent_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `bedroom` varchar(255) NOT NULL,
  `bathroom` varchar(255) NOT NULL,
  `kitchen` varchar(255) NOT NULL,
  `balcony` varchar(255) NOT NULL,
  `hall` varchar(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `total_floor` varchar(255) NOT NULL,
  `area_size` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `property_type`, `selling_type`, `bhk`, `agent_name`, `company_name`, `bedroom`, `bathroom`, `kitchen`, `balcony`, `hall`, `floor`, `total_floor`, `area_size`, `city`, `state`, `address`, `image1`, `image2`, `image3`, `image4`, `status`, `created_at`, `updated_at`, `price`) VALUES
(31, 'Houses', 'Sale', '2 BHK', 'ganesh', 'TP groups', '2', '2', '1', '1', '1', '3rd Floor', '5 Floors', '120000', 'Chittoor', 'AP', 'RL colony', 'properties/673367a1cdf04.jpg', 'properties/673367a1cebd9.jpg', 'properties/673367a1cf172.jpg', 'properties/673367a1cf6b0.jpg', 'Available', '2024-11-12 09:05:13', '2024-12-05 23:57:33', '1000000'),
(33, 'Houses', 'Sale', '2 BHK', 'ganesh', 'TP groups', '2', '2', '1', '1', '1', '3rd Floor', '5 Floors', '12000', 'Chennai', 'TN', 'Saveetha Nagar', 'properties/67337c86d7163.jpg', 'properties/67337c86d798f.jpg', 'properties/67337c86d7e82.jpg', 'properties/67337c86d838a.jpg', 'Soldout', '2024-11-12 10:34:22', '2024-12-05 23:05:49', '100000'),
(72, 'Houses', 'Sale', '2 BHK', 'agent', 'TP groups', '2', '2', '1', '2', '1', '2nd Floor', '5 Floors', '12000', 'Chennai', 'Tamil Nadu', 'Saveetha Nagar', 'properties/6758310f956ea.jpg', 'properties/6758310f95da2.jpg', 'properties/6758310f968be.jpg', 'properties/6758310f973c9.jpg', 'Soldout', '2024-12-10 06:46:15', '2024-12-10 07:50:09', '10000000');

-- --------------------------------------------------------

--
-- Table structure for table `realtrons`
--

CREATE TABLE `realtrons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'realtron',
  `username` varchar(255) NOT NULL,
  `realtron_company` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `bussiness_phone` varchar(255) NOT NULL,
  `age_of_company` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `upload_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `realtrons`
--

INSERT INTO `realtrons` (`id`, `role`, `username`, `realtron_company`, `phone`, `email`, `address`, `city`, `area`, `pincode`, `bussiness_phone`, `age_of_company`, `profile`, `upload_file`, `created_at`, `updated_at`, `password`, `status`) VALUES
(11, 'realtron', 'Tharun', 'TP groups', '9087654321', 'tharun@gmail.com', 'Thandalam', 'Chennai', 'Saveetha nagar', '6021054', '6789054321', '3', 'profiles/1719844895.png', 'upload/1719844895.pdf', '2024-07-01 09:11:35', '2024-07-01 09:21:27', '12345678', 'accepted'),
(12, 'realtron', 'Sree', 'S Groups', '9876543210', 'sree@gmail.com', 'Thandalam', 'Chennai', 'Saveetha nagar', '602105', '6785432190', '4', 'profiles/1719845085.png', 'upload/1719845085.pdf', '2024-07-01 09:14:45', '2024-10-27 09:01:36', '12345678', 'accepted'),
(13, 'realtron', 'Kommi', 'K Groups', '9798965432', 'kommi@gmail.com', 'Thandalam', 'Chennai', 'Saveetha nagar', '602105', '6543217898', '3', 'profiles/1719845296.png', 'upload/1719845296.pdf', '2024-07-01 09:18:16', '2024-07-01 09:21:38', '12345678', 'accepted'),
(14, 'realtron', 'Guna', 'G Groups', '9123456780', 'Guna@gmail.com', 'Thandalam', 'Chennai', 'Saveetha nagar', '602105', '6785432104', '6', 'profiles/1719845446.png', 'upload/1719845446.pdf', '2024-07-01 09:20:46', '2024-07-01 09:21:43', '12345678', 'accepted'),
(15, 'realtron', 'sai', 'SS groups', '7890654321', 'sai@gmail.com', 'thandalam', 'chennai', 'saveetha nagar', '204026', '6543210987', '4', 'profiles/1719889629.jpeg', 'upload/1719889629.pdf', '2024-07-01 21:37:09', '2024-10-27 09:02:03', '12345678', 'accepted'),
(17, 'realtron', 'Company', 'SIMATS', '9014835890', 'SIMATS@gmail.com', 'Thandalam', 'Chennai', 'Saveetha Nagar', '602105', '7123456710', '2', 'profiles/1732112526.jpg', 'upload/1732112526.pdf', '2024-11-20 08:52:06', '2024-12-10 10:49:57', '12345678', 'rejected'),
(18, 'realtron', 'Company', 'Realestate', '8523697410', 'company@gmail.com', 'Saveetha nagar', 'Chennai', 'Thandalam', '602105', '6547891230', '5', 'profiles/1733847531.jpg', 'upload/1733847531.pdf', '2024-12-10 10:48:51', '2024-12-10 10:49:47', '12345678', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `property_address` varchar(255) NOT NULL,
  `property_image` varchar(255) NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `realtron_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `username`, `email`, `phone`, `company_name`, `address`, `property_address`, `property_image`, `property_type`, `created_at`, `updated_at`, `realtron_id`) VALUES
(5, 'meena', 'meena@gmail.com', '9876453210', 'TP groups', 'thandalam', 'saveetha nagar', 'properties/1719896495.jpg', 'plot', '2024-07-01 23:31:35', '2024-07-01 23:31:35', 11),
(8, 'madhav', 'madhavamilineni2003@gmail.com', '0987654321', 'S Groups', 'chennai', 'Muttukur,chittor\r\n1-59,pin code:517419', 'properties/1720066288.jpg', 'plot', '2024-07-03 22:41:28', '2024-07-03 22:41:28', 12),
(9, 'mahimahi', 'mahimahi@gmail.com', '9807654631', 'K Groups', 'chennai', 'chennai,thandalam', 'properties/1720366778.png', 'plot', '2024-07-07 10:09:38', '2024-07-07 10:09:38', 13),
(10, 'Saveetha', 'saveetha@gmail.com', '7894561230', 'SIMATS', 'Thandalam', 'Chettipedu', 'properties/1733759294.jpg', 'house', '2024-12-09 10:18:14', '2024-12-09 10:18:14', 17),
(11, 'Hari', 'hari@gmail.com', '9512369745', 'Realestate', 'chettipedu', 'ambattur ot', 'properties/1733848997.jpg', 'house', '2024-12-10 11:13:17', '2024-12-10 11:13:17', 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `realtron_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `usertype`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `realtron_id`) VALUES
(1, 'user', 'user@gmail.com', '9014835900', '0', NULL, '$2y$10$YMAuhNS/MwYOnejzP4OVLOT7VC45uRALn7Nl6p8KgLZv9MtYuWIN.', 'GPSb4MwiXujw1fm8g6OS0PRuGIzNvhb9ERhe9LgKpXaRpjyozeDgNwsTPXWG', '2024-06-02 23:21:16', '2024-06-02 23:21:16', NULL),
(2, 'admin', 'admin@gmail.com', '9807612534', '1\n', NULL, '$2y$10$FxSaaYxfVEsF94p1FCwNSOEfPiFJXWar.PLhOGiQBiFev9SbOHAGC', NULL, '2024-06-02 23:21:57', '2024-06-02 23:21:57', NULL),
(10, 'devi', 'devi@gmail.com', '8967045231', '0', NULL, '$2y$10$VCsIBYwvI4tbLut4PEPbJOCKEyikd9zDRPToEhG63DAvU53EVz6i6', NULL, '2024-06-14 01:04:10', '2024-06-14 01:04:10', NULL),
(45, 'Tharun', 'tharun@gmail.com', '9087654321', 'realtron', NULL, '$2y$10$ZFdX0xsoP.nlhNhfmTInVexNAPmPOUJi.WZwYiyFKZulGteajmL2y', NULL, '2024-07-01 09:21:27', '2024-07-01 09:21:27', 11),
(46, 'Sree', 'sree@gmail.com', '9876543210', 'realtron', NULL, '$2y$10$zFsPCVgbeQETxUZmjJ91ceGCj2C0lLcvHWhtAmZ5oEtxyB.Z5nLg.', NULL, '2024-07-01 09:21:34', '2024-07-01 09:21:34', 12),
(47, 'Kommi', 'kommi@gmail.com', '9798965432', 'realtron', NULL, '$2y$10$zjWMxXvdGCXN8CTJN8CXuO8LJYkK2JvUca6d3gVSdAgrI9navpFU2', NULL, '2024-07-01 09:21:38', '2024-07-01 09:21:38', 13),
(48, 'Guna', 'Guna@gmail.com', '9123456780', 'realtron', NULL, '$2y$10$MaOz2pUGnOpgxQRQBWWVweYBBFjp0K.kHKVKPz2OLHAw4UDQ.W1Mi', NULL, '2024-07-01 09:21:43', '2024-07-01 09:21:43', 14),
(50, 'agent', 'agent@gmail.com', '8979594939', 'agent', NULL, '$2y$10$Fcuges2DqYDnKiriqzZGPOJQ.ccOA9H9FL4oFDH015HE9r77jDcy2', NULL, '2024-07-09 04:29:33', '2024-07-09 04:29:33', 12),
(51, 'sai', 'sai@gmail.com', '7890654321', 'realtron', NULL, '$2y$10$k5iGzpwyvbDu8PeOo/dZ4.TeC1ZuX0.RSWdefx1FpzavnfwfX9UEa', NULL, '2024-07-10 03:56:06', '2024-07-10 03:56:06', 15),
(52, 'ganesh', 'ganesh@gmail.com', '1234567890', 'agent', NULL, '$2y$10$GQx04vmmOBdAW3NOO0HM7OKsD894cht702L.V69zApyNf/aqwbRmi', NULL, '2024-10-21 04:36:44', '2024-10-21 04:36:44', 11),
(53, 'varun', 'varun@gmail.com', '0987654321', 'agent', NULL, '$2y$10$uBA9byGyQaymSxdSt3ONmeujJWEtdKNmj/y4RDH5vHP5jWYcyTfRy', NULL, '2024-10-24 01:20:31', '2024-10-24 01:20:31', 11),
(54, 'saveetha', 'saveetha@gmail.com', '9898765432', 'agent', NULL, '$2y$10$kXNG0n5roP88nsegtdAVkOlHDG/ni0vq.VeC1y6TdqaY90y.sPhRG', NULL, '2024-10-25 10:10:50', '2024-10-25 10:10:50', 11),
(55, 'Company', 'SIMATS@gmail.com', '9014835890', 'realtron', NULL, '$2y$10$Ka2dIsBoPFJxu2OpIARLyOFfQd8z2O38baUpANGx4aWfV2pulueVq', NULL, '2024-11-20 08:53:26', '2024-11-20 08:53:26', 17),
(56, 'd', 'helo@gmail.com', '8529637410', '0', NULL, '$2y$10$sygIJX2w7kizSSXA1wPkE.flF3yXbTgZ5ERS0KMtS1i5XjObsOsOC', NULL, '2024-11-22 23:56:34', '2024-11-22 23:56:34', NULL),
(57, 'Madhav', 'madhav@gmail.com', '7412589630', 'agent', NULL, '$2y$10$KSZj8TZyNeT34WpzsGmW7.ianyqlr7pKkz9DqNIWfadhepO5uIDR6', NULL, '2024-12-08 10:47:41', '2024-12-08 10:47:41', 11),
(58, 'Company', 'company@gmail.com', '8523697410', 'realtron', NULL, '$2y$10$P4ouMn.F45XTKnAbYpVgo.Z6EDqQbBto7tri2jDsn6t/fSqyTR5G2', NULL, '2024-12-10 10:49:47', '2024-12-10 10:49:47', 18),
(59, 'izze', 'izze@gmail.com', '7531594682', 'agent', NULL, '$2y$10$imJ1oH4xbxZXMAI/KAaSb.sTYB1kj8qNbK9CWxP.m4Di1/bguvcsS', NULL, '2024-12-10 11:02:01', '2024-12-10 11:02:01', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agents_realtron_id_foreign` (`realtron_id`);

--
-- Indexes for table `assigntasks`
--
ALTER TABLE `assigntasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `generates`
--
ALTER TABLE `generates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `generates_user_id_foreign` (`user_id`);

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
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realtrons`
--
ALTER TABLE `realtrons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sellers_realtron_id_foreign` (`realtron_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD KEY `users_realtron_id_foreign` (`realtron_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `assigntasks`
--
ALTER TABLE `assigntasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generates`
--
ALTER TABLE `generates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `realtrons`
--
ALTER TABLE `realtrons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agents`
--
ALTER TABLE `agents`
  ADD CONSTRAINT `agents_realtron_id_foreign` FOREIGN KEY (`realtron_id`) REFERENCES `realtrons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `generates`
--
ALTER TABLE `generates`
  ADD CONSTRAINT `generates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `sellers_realtron_id_foreign` FOREIGN KEY (`realtron_id`) REFERENCES `realtrons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_realtron_id_foreign` FOREIGN KEY (`realtron_id`) REFERENCES `realtrons` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
