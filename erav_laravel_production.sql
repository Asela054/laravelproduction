-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2026 at 01:15 PM
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
-- Database: `erav_laravel_templatedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `batch_uuid` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'user', 'User updated', 'App\\Models\\User', 'updated', 1, NULL, NULL, '{\"attributes\":{\"password\":\"$2y$12$Jwh5N8OKyxpKYkZz98juNOjWGUuQyenrcYa.WxOAXCLd.GRqUgdQC\",\"updatedatetime\":\"2026-05-05 14:33:42\"},\"old\":{\"password\":\"0e22acf301365416f1d84331bde53bfa\",\"updatedatetime\":\"2020-11-10 18:00:00\"}}', NULL, '2026-05-05 09:03:42', '2026-05-05 09:03:42'),
(2, 'user', 'User updated', 'App\\Models\\User', 'updated', 2, NULL, NULL, '{\"attributes\":{\"password\":\"$2y$12$Dp4tq9lq.4IQJbOodKINr.atucfuZNaDHeoPirVM84l1vsdRiF\\/0y\",\"updatedatetime\":\"2026-05-05 14:36:05\"},\"old\":{\"password\":\"962a8a0fa1a66d9ca5e1a1b8b9943ae4\",\"updatedatetime\":\"2020-11-10 18:00:00\"}}', NULL, '2026-05-05 09:06:05', '2026-05-05 09:06:05'),
(3, 'user', 'User created', 'App\\Models\\User', 'created', 67, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_user\":67,\"name\":\"kamal sooriyarachchi\",\"username\":\"kamal\",\"email\":\"thisaratharindaciscoitn@gmail.com\",\"password\":\"$2y$12$ti4QOF\\/t0rarvL6cvUXbfO78\\/JlLMyf7EY5A2AfgX6foXkQjmcdfO\",\"imagepath\":null,\"status\":1,\"updatedatetime\":\"2026-05-05 14:58:34\",\"tbl_user_type_idtbl_user_type\":7}}', NULL, '2026-05-05 09:28:34', '2026-05-05 09:28:34'),
(4, 'salesmanager', 'Sales Manager created', 'App\\Models\\Salesmanager', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_sales_manager\":1,\"salesmanagername\":\"Harujan\",\"contactone\":\"1234564532\",\"email\":\"kamalsooriyaracchi+2@gmail.com\",\"address\":\"64\\/7 kukan nagar 7th lane vepankulam\",\"status\":1,\"insertdatetime\":\"2026-05-05 15:00:12\",\"updatedatetime\":\"2026-05-05 15:00:12\",\"tbl_user_idtbl_user\":66,\"insertuser\":1}}', NULL, '2026-05-05 09:30:12', '2026-05-05 09:30:12'),
(5, 'employee', 'Employee created', 'App\\Models\\Employee', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_employee\":1,\"name\":\"kamal sooriyarachchi\",\"epfno\":null,\"nic\":\"712853395p\",\"phone\":\"0716722232\",\"address\":\"No 45\\r\\nWedawalawwa  Dikwala Rd,\",\"status\":1,\"useraccountid\":67,\"updatedatetime\":\"2026-05-05 15:00:50\",\"tbl_user_idtbl_user\":1,\"tbl_user_type_idtbl_user_type\":7,\"tbl_sales_manager_idtbl_sales_manager\":1}}', NULL, '2026-05-05 09:30:50', '2026-05-05 09:30:50'),
(6, 'customer', 'Customer created', 'App\\Models\\Customer', 'created', 1, NULL, NULL, '{\"attributes\":{\"type\":null,\"customer\":\"ABC Stores\",\"formcode\":null,\"nic\":\"123456789V\",\"phone\":\"0771234567\",\"email\":\"abc@gmail.com\",\"address\":\"No.123, Main street\",\"postal_code\":null,\"is_vat\":0,\"vat_num\":null,\"s_vat\":null,\"numofvisitdays\":null,\"nonvisit\":null,\"creditlimit\":null,\"credittype\":null,\"creditperiod\":null,\"emergencydate\":null,\"remarks\":\"New Customer\",\"ref\":0,\"longitude\":\"0.00000000\",\"latitude\":\"0.00000000\",\"comment\":null,\"paymentpersonname\":null,\"paymentpersonmobile\":null,\"deliverypersonname\":null,\"deliverypersonmobile\":null,\"buisnesscopyimagepath\":null,\"dealerboardimagepath\":null,\"selfieimagepath\":null,\"productimagepath\":null,\"status\":1,\"updatedatetime\":\"2026-05-07 12:51:24\",\"tbl_user_idtbl_user\":1,\"tbl_area_idtbl_area\":1,\"tbl_province_idtbl_province\":1}}', NULL, '2026-05-07 07:21:24', '2026-05-07 07:21:24'),
(7, 'customer_assets', 'Customer Asset created', 'App\\Models\\CustomerAssets', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_customer_assets\":1,\"assetname\":\"test\",\"description\":\"test\",\"status\":1,\"updateuser\":1,\"updatedatetime\":\"2026-05-11 16:54:22\"}}', NULL, '2026-05-11 11:24:22', '2026-05-11 11:24:22'),
(8, 'customer_assets', 'Customer Asset updated', 'App\\Models\\CustomerAssets', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"status\":3},\"old\":{\"status\":1}}', NULL, '2026-05-11 11:24:31', '2026-05-11 11:24:31'),
(9, 'customer_type', 'Customer Type created', 'App\\Models\\CustomerType', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_customer_type\":1,\"type\":\"test\",\"description\":null,\"status\":1,\"updateuser\":1,\"updatedatetime\":\"2026-05-11 16:55:09\"}}', NULL, '2026-05-11 11:25:09', '2026-05-11 11:25:09'),
(10, 'customer_type', 'Customer Type updated', 'App\\Models\\CustomerType', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"status\":3},\"old\":{\"status\":1}}', NULL, '2026-05-11 11:25:18', '2026-05-11 11:25:18'),
(11, 'user', 'User created', 'App\\Models\\User', 'created', 68, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_user\":68,\"name\":\"Sadeesha Chathura\",\"username\":\"sadeesha\",\"email\":\"sadeeshachathura@gmail.com\",\"password\":\"$2y$12$YycpWe6KX5XqgCOi2l0bheDL.\\/e1YcbQAYHfOr5WXaLpLSrLL13ti\",\"imagepath\":null,\"status\":1,\"updatedatetime\":\"2026-05-12 14:33:04\",\"tbl_user_type_idtbl_user_type\":2}}', NULL, '2026-05-12 09:03:04', '2026-05-12 09:03:04'),
(12, 'user', 'User updated', 'App\\Models\\User', 'updated', 67, 'App\\Models\\User', 1, '{\"attributes\":{\"status\":2},\"old\":{\"status\":1}}', NULL, '2026-05-12 09:03:20', '2026-05-12 09:03:20'),
(13, 'user', 'User updated', 'App\\Models\\User', 'updated', 67, 'App\\Models\\User', 1, '{\"attributes\":{\"status\":1},\"old\":{\"status\":2}}', NULL, '2026-05-12 09:03:27', '2026-05-12 09:03:27'),
(14, 'usertype', 'User Type created', 'App\\Models\\Usertype', 'created', 16, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_user_type\":16,\"type\":\"SOFTWARE\",\"status\":1,\"updatedatetime\":\"2026-05-12 14:33:40\"}}', NULL, '2026-05-12 09:03:40', '2026-05-12 09:03:40'),
(15, 'usertype', 'User Type created', 'App\\Models\\Usertype', 'created', 17, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_user_type\":17,\"type\":\"NEW TEST\",\"status\":1,\"updatedatetime\":\"2026-05-12 14:34:07\"}}', NULL, '2026-05-12 09:04:07', '2026-05-12 09:04:07'),
(16, 'usertype', 'User Type updated', 'App\\Models\\Usertype', 'updated', 17, 'App\\Models\\User', 1, '{\"attributes\":{\"status\":2},\"old\":{\"status\":1}}', NULL, '2026-05-12 09:04:17', '2026-05-12 09:04:17'),
(17, 'usertype', 'User Type updated', 'App\\Models\\Usertype', 'updated', 17, 'App\\Models\\User', 1, '{\"attributes\":{\"status\":1},\"old\":{\"status\":2}}', NULL, '2026-05-12 09:04:23', '2026-05-12 09:04:23'),
(18, 'userprivilages', 'User Privilages created', 'App\\Models\\UserPrivilege', 'created', 500, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_user_privilege\":500,\"tbl_user_idtbl_user\":68,\"tbl_menu_list_idtbl_menu_list\":1,\"access_status\":1,\"add\":1,\"edit\":1,\"statuschange\":1,\"remove\":1,\"status\":1,\"approvestatus\":0,\"checkstatus\":0,\"updatedatetime\":\"2026-05-12 14:34:55\"}}', NULL, '2026-05-12 09:04:55', '2026-05-12 09:04:55'),
(19, 'userprivilages', 'User Privilages created', 'App\\Models\\UserPrivilege', 'created', 501, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_user_privilege\":501,\"tbl_user_idtbl_user\":68,\"tbl_menu_list_idtbl_menu_list\":2,\"access_status\":1,\"add\":1,\"edit\":1,\"statuschange\":1,\"remove\":1,\"status\":1,\"approvestatus\":0,\"checkstatus\":0,\"updatedatetime\":\"2026-05-12 14:34:55\"}}', NULL, '2026-05-12 09:04:55', '2026-05-12 09:04:55'),
(20, 'userprivilages', 'User Privilages created', 'App\\Models\\UserPrivilege', 'created', 502, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_user_privilege\":502,\"tbl_user_idtbl_user\":68,\"tbl_menu_list_idtbl_menu_list\":3,\"access_status\":1,\"add\":1,\"edit\":1,\"statuschange\":1,\"remove\":1,\"status\":1,\"approvestatus\":0,\"checkstatus\":0,\"updatedatetime\":\"2026-05-12 14:34:55\"}}', NULL, '2026-05-12 09:04:55', '2026-05-12 09:04:55'),
(21, 'menu', 'Menu created', 'App\\Models\\Menu', 'created', 138, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_menu_list\":138,\"menu\":\"TEST MENU\",\"status\":1}}', NULL, '2026-05-12 09:05:27', '2026-05-12 09:05:27'),
(22, 'menu', 'Menu created', 'App\\Models\\Menu', 'created', 139, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_menu_list\":139,\"menu\":\"PACKING ORDER\",\"status\":1}}', NULL, '2026-05-25 05:37:24', '2026-05-25 05:37:24'),
(23, 'userprivilages', 'User Privilages created', 'App\\Models\\UserPrivilege', 'created', 503, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_user_privilege\":503,\"tbl_user_idtbl_user\":1,\"tbl_menu_list_idtbl_menu_list\":139,\"access_status\":1,\"add\":1,\"edit\":1,\"statuschange\":1,\"remove\":1,\"status\":1,\"approvestatus\":0,\"checkstatus\":0,\"updatedatetime\":\"2026-05-25 11:08:34\"}}', NULL, '2026-05-25 05:38:34', '2026-05-25 05:38:34'),
(24, 'menu', 'Menu created', 'App\\Models\\Menu', 'created', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_menu_list\":4,\"menu\":\"PACKING ORDER\",\"status\":1}}', NULL, '2026-05-25 06:05:09', '2026-05-25 06:05:09'),
(25, 'menu', 'Menu updated', 'App\\Models\\Menu', 'updated', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"menu\":\"PRODUCTION ORDER\"},\"old\":{\"menu\":\"PACKING ORDER\"}}', NULL, '2026-05-25 06:05:53', '2026-05-25 06:05:53'),
(26, 'menu', 'Menu created', 'App\\Models\\Menu', 'created', 5, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_menu_list\":5,\"menu\":\"PRODUCTION RECORDS\",\"status\":1}}', NULL, '2026-05-25 06:06:10', '2026-05-25 06:06:10'),
(27, 'menu', 'Menu created', 'App\\Models\\Menu', 'created', 6, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_menu_list\":6,\"menu\":\"PRODUCTION QUALITY\",\"status\":1}}', NULL, '2026-05-25 06:06:22', '2026-05-25 06:06:22'),
(28, 'menu', 'Menu created', 'App\\Models\\Menu', 'created', 7, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_menu_list\":7,\"menu\":\"FINISH GOOD BOM\",\"status\":1}}', NULL, '2026-06-01 07:16:20', '2026-06-01 07:16:20'),
(29, 'menu', 'Menu created', 'App\\Models\\Menu', 'created', 8, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_menu_list\":8,\"menu\":\"MATERIAL CATEGORY\",\"status\":1}}', NULL, '2026-06-03 06:11:41', '2026-06-03 06:11:41'),
(30, 'menu', 'Menu created', 'App\\Models\\Menu', 'created', 9, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_menu_list\":9,\"menu\":\"MATERIAL DETAIL\",\"status\":1}}', NULL, '2026-06-03 06:11:53', '2026-06-03 06:11:53'),
(31, 'menu', 'Menu created', 'App\\Models\\Menu', 'created', 10, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_menu_list\":10,\"menu\":\"UNIT\",\"status\":1}}', NULL, '2026-06-03 08:41:46', '2026-06-03 08:41:46'),
(32, 'user', 'User created', 'App\\Models\\User', 'created', 69, 'App\\Models\\User', 1, '{\"attributes\":{\"idtbl_user\":69,\"name\":\"Test User\",\"username\":\"test12345\",\"email\":\"test123@gmail.com\",\"password\":\"$2y$12$w1O0bPuUTa6UjHI9TM7KlumeFZ9CYOuyYRDYcug3STM\\/cUyzQp3.O\",\"imagepath\":null,\"status\":1,\"updatedatetime\":\"2026-06-08 10:09:49\",\"tbl_user_type_idtbl_user_type\":3}}', NULL, '2026-06-08 04:39:50', '2026-06-08 04:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `nic` varchar(255) DEFAULT NULL,
  `tin` varchar(255) DEFAULT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `payment_person_name` varchar(255) DEFAULT NULL,
  `payment_person_mobile` varchar(255) DEFAULT NULL,
  `vat_num` varchar(255) DEFAULT NULL,
  `s_vat` varchar(255) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `business_copy` varchar(255) DEFAULT NULL,
  `dealer_board` varchar(255) DEFAULT NULL,
  `shop_image` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `free_issue_rules`
--

CREATE TABLE `free_issue_rules` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `buy_qty` int(11) NOT NULL,
  `free_qty` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `product_free_issue`
--

CREATE TABLE `product_free_issue` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `buy_quantity` int(11) NOT NULL,
  `free_quantity` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `idtbl_account` int(11) NOT NULL,
  `code` varchar(4) NOT NULL,
  `accountno` varchar(8) NOT NULL,
  `accountname` varchar(45) NOT NULL,
  `specialcate` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_account_category_idtbl_account_category` int(11) NOT NULL,
  `tbl_account_subcategory_idtbl_account_subcategory` int(11) NOT NULL,
  `tbl_account_type_idtbl_account_type` int(11) NOT NULL,
  `tbl_account_nestcategory_idtbl_account_nestcategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_allocation`
--

CREATE TABLE `tbl_account_allocation` (
  `idtbl_account_allocation` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `companybank` int(11) NOT NULL,
  `branchcompanybank` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_account_idtbl_account` int(11) DEFAULT NULL,
  `tbl_account_detail_idtbl_account_detail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_category`
--

CREATE TABLE `tbl_account_category` (
  `idtbl_account_category` int(11) NOT NULL,
  `code` varchar(2) NOT NULL,
  `category` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_account_finacialtype_idtbl_account_finacialtype` int(11) NOT NULL,
  `tbl_account_transactiontype_idtbl_account_transactiontype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_detail`
--

CREATE TABLE `tbl_account_detail` (
  `idtbl_account_detail` int(11) NOT NULL,
  `code` varchar(4) NOT NULL,
  `accountno` varchar(12) NOT NULL,
  `accountname` varchar(45) NOT NULL,
  `special_cate_detail` int(11) NOT NULL,
  `special_cate_sub` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_account_idtbl_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_finacialtype`
--

CREATE TABLE `tbl_account_finacialtype` (
  `idtbl_account_finacialtype` int(11) NOT NULL,
  `finacialtype` varchar(45) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_nestcategory`
--

CREATE TABLE `tbl_account_nestcategory` (
  `idtbl_account_nestcategory` int(11) NOT NULL,
  `nestcategory` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_account_category_idtbl_account_category` int(11) NOT NULL,
  `tbl_account_subcategory_idtbl_account_subcategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_open_bal`
--

CREATE TABLE `tbl_account_open_bal` (
  `idtbl_account_open_bal` int(11) NOT NULL,
  `applydate` date NOT NULL,
  `openbal` double NOT NULL,
  `creditdebit` varchar(5) DEFAULT NULL COMMENT 'Credit - C, Debit - D',
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_account_idtbl_account` int(11) NOT NULL,
  `tbl_account_detail_idtbl_account_detail` int(11) NOT NULL,
  `tbl_master_idtbl_master` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_payable`
--

CREATE TABLE `tbl_account_payable` (
  `idtbl_account_payable` int(11) NOT NULL,
  `tradate` date NOT NULL,
  `batchno` varchar(15) NOT NULL COMMENT 'AR2023APR00000 Batch no limit 999999',
  `tratype` varchar(5) NOT NULL COMMENT 'C-Credit / D-Debit',
  `amount` double NOT NULL,
  `narration` varchar(150) NOT NULL,
  `poststatus` int(11) DEFAULT NULL,
  `postuser` int(11) DEFAULT NULL,
  `editstatus` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_master_idtbl_master` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL,
  `tbl_account_payable_main_idtbl_account_payable_main` int(11) NOT NULL,
  `tbl_account_idtbl_account` int(11) NOT NULL,
  `tbl_account_detail_idtbl_account_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_payable_main`
--

CREATE TABLE `tbl_account_payable_main` (
  `idtbl_account_payable_main` int(11) NOT NULL,
  `paytype` int(11) NOT NULL COMMENT '0=GRN Payable',
  `tradate` date NOT NULL,
  `batchno` varchar(15) NOT NULL COMMENT 'AP2023APR00000 Batch no limit 999999',
  `supplier` int(11) NOT NULL,
  `invoiceno` varchar(15) NOT NULL,
  `amount` double NOT NULL,
  `poststatus` int(11) DEFAULT NULL,
  `postuser` int(11) DEFAULT NULL,
  `postviewtime` datetime DEFAULT NULL,
  `editstatus` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL,
  `tbl_master_idtbl_master` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_paysettle`
--

CREATE TABLE `tbl_account_paysettle` (
  `idtbl_account_paysettle` int(11) NOT NULL,
  `date` date NOT NULL,
  `batchno` varchar(15) NOT NULL,
  `supplier` int(11) NOT NULL,
  `totalpayment` double NOT NULL,
  `remark` varchar(200) NOT NULL,
  `completestatus` int(11) DEFAULT NULL,
  `poststatus` int(11) DEFAULT NULL,
  `postuser` int(11) DEFAULT NULL,
  `postviewtime` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_receivable_type_idtbl_receivable_type` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL,
  `tbl_master_idtbl_master` int(11) NOT NULL,
  `tbl_account_idtbl_account` int(11) NOT NULL,
  `tbl_account_detail_idtbl_account_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_paysettle_has_tbl_cheque_issue`
--

CREATE TABLE `tbl_account_paysettle_has_tbl_cheque_issue` (
  `tbl_account_paysettle_idtbl_account_paysettle` int(11) NOT NULL,
  `tbl_cheque_issue_idtbl_cheque_issue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_paysettle_info`
--

CREATE TABLE `tbl_account_paysettle_info` (
  `idtbl_account_paysettle_info` int(11) NOT NULL,
  `batchno` varchar(15) NOT NULL,
  `narration` varchar(200) NOT NULL,
  `amount` double NOT NULL,
  `invoiceno` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_account_paysettle_idtbl_account_paysettle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_receivable`
--

CREATE TABLE `tbl_account_receivable` (
  `idtbl_account_receivable` int(11) NOT NULL,
  `tradate` date NOT NULL,
  `batchno` varchar(15) NOT NULL COMMENT 'AP2023APR00000 Batch no limit 999999',
  `tratype` varchar(5) NOT NULL COMMENT 'C-Credit / D-Debit',
  `amount` double NOT NULL,
  `narration` varchar(150) NOT NULL,
  `poststatus` int(11) DEFAULT NULL,
  `postuser` int(11) DEFAULT NULL,
  `editstatus` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_master_idtbl_master` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL,
  `tbl_account_receivable_main_idtbl_account_receivable_main` int(11) NOT NULL,
  `tbl_account_idtbl_account` int(11) NOT NULL,
  `tbl_account_detail_idtbl_account_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_receivable_main`
--

CREATE TABLE `tbl_account_receivable_main` (
  `idtbl_account_receivable_main` int(11) NOT NULL,
  `rectype` int(11) NOT NULL COMMENT '0=Invoice Receivable',
  `tradate` date NOT NULL,
  `batchno` varchar(15) NOT NULL COMMENT 'AP2023APR00000 Batch no limit 999999',
  `customer` int(11) NOT NULL,
  `receiptno` varchar(15) NOT NULL,
  `amount` double NOT NULL,
  `poststatus` int(11) DEFAULT NULL,
  `postuser` int(11) DEFAULT NULL,
  `postviewtime` datetime DEFAULT NULL,
  `editstatus` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL,
  `tbl_master_idtbl_master` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_special_category`
--

CREATE TABLE `tbl_account_special_category` (
  `idtbl_account_special_category` int(11) NOT NULL,
  `specialcategory` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_subcategory`
--

CREATE TABLE `tbl_account_subcategory` (
  `idtbl_account_subcategory` int(11) NOT NULL,
  `subcategory` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_account_category_idtbl_account_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_transaction`
--

CREATE TABLE `tbl_account_transaction` (
  `idtbl_account_transaction` int(11) NOT NULL,
  `tradate` date NOT NULL,
  `batchno` varchar(15) NOT NULL COMMENT 'AT2023APR00000 Batch no limit 999999',
  `trabatchotherno` varchar(15) NOT NULL COMMENT 'Batch no limit 999999',
  `tratype` varchar(5) NOT NULL,
  `seqno` varchar(10) NOT NULL,
  `crdr` varchar(10) NOT NULL,
  `accamount` double NOT NULL,
  `narration` varchar(150) NOT NULL,
  `totamount` double NOT NULL,
  `ismatched` int(11) NOT NULL,
  `reversstatus` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_account_idtbl_account` int(11) NOT NULL,
  `tbl_master_idtbl_master` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_transactiontype`
--

CREATE TABLE `tbl_account_transactiontype` (
  `idtbl_account_transactiontype` int(11) NOT NULL,
  `transactiontype` varchar(45) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_transaction_full`
--

CREATE TABLE `tbl_account_transaction_full` (
  `idtbl_account_transaction_full` int(11) NOT NULL,
  `tradate` date NOT NULL,
  `batchno` varchar(15) NOT NULL COMMENT 'AT2023APR00000 Batch no limit 999999',
  `tratype` varchar(5) NOT NULL,
  `crdr` varchar(10) NOT NULL,
  `accamount` double NOT NULL,
  `narration` varchar(150) NOT NULL,
  `totamount` double NOT NULL,
  `ismatch` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_account_idtbl_account` int(11) NOT NULL,
  `tbl_master_idtbl_master` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_transaction_manual`
--

CREATE TABLE `tbl_account_transaction_manual` (
  `idtbl_account_transaction_manual` int(11) NOT NULL,
  `tradate` date NOT NULL,
  `batchno` varchar(15) NOT NULL,
  `tratype` varchar(5) NOT NULL,
  `seqno` varchar(10) NOT NULL,
  `crdr` varchar(10) NOT NULL,
  `amount` double NOT NULL,
  `narration` varchar(150) NOT NULL,
  `poststatus` int(11) DEFAULT NULL,
  `postuser` int(11) DEFAULT NULL,
  `postviewtime` datetime DEFAULT NULL,
  `editstatus` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_account_idtbl_account` int(11) NOT NULL,
  `tbl_account_detail_idtbl_account_detail` int(11) NOT NULL,
  `tbl_master_idtbl_master` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL,
  `manualtrans_main_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_transaction_manual_main`
--

CREATE TABLE `tbl_account_transaction_manual_main` (
  `idtbl_account_transaction_manual_main` int(11) NOT NULL,
  `tradate` date NOT NULL,
  `batchno` varchar(15) NOT NULL,
  `amount` double NOT NULL,
  `narration` varchar(150) NOT NULL,
  `transactiontype` int(11) NOT NULL COMMENT '1 = Journal Batch',
  `poststatus` int(11) DEFAULT NULL,
  `postuser` int(11) DEFAULT NULL,
  `postviewtime` datetime DEFAULT NULL,
  `editstatus` int(11) NOT NULL,
  `completestatus` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_master_idtbl_master` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_type`
--

CREATE TABLE `tbl_account_type` (
  `idtbl_account_type` int(11) NOT NULL,
  `accounttype` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `idtbl_area` int(11) NOT NULL,
  `area` varchar(450) NOT NULL,
  `tbl_district_idtbl_district` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=130 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`idtbl_area`, `area`, `tbl_district_idtbl_district`, `status`, `updatedatetime`, `tbl_user_idtbl_user`) VALUES
(1, 'JAELA', 8, 1, '2021-12-29 10:12:13', 1),
(2, 'EKALA', 8, 1, '2024-09-03 09:56:48', 1),
(3, 'KATUNAYAKA', 8, 1, '2021-12-22 10:23:43', 1),
(4, 'KANDANA', 8, 1, '2021-12-22 10:24:05', 1),
(5, 'GAMPHA', 8, 1, '2021-12-22 10:24:11', 1),
(6, 'PAMUNUGAMA', 8, 1, '2021-12-22 10:24:19', 1),
(7, 'ALAKANDA', 8, 1, '2021-12-22 10:24:27', 1),
(8, 'WATHTHALA', 8, 1, '2021-12-22 10:24:36', 1),
(9, 'RAGAMA', 8, 1, '2021-12-22 10:24:42', 1),
(10, 'NEGAMBO', 8, 1, '2025-02-26 04:01:59', 1),
(11, 'MAKAVITA', 8, 1, '2021-12-22 10:24:57', 1),
(12, 'SEDUWA', 8, 1, '2021-12-22 10:25:06', 1),
(13, 'UDUGAMPOLA', 8, 3, '2025-02-26 04:04:59', 1),
(14, 'VEYANGODA', 8, 1, '2021-12-22 10:25:29', 1),
(15, 'MINUWANGODA', 8, 1, '2021-12-22 10:25:38', 1),
(16, 'DADUGAMPOLA', 8, 1, '2021-12-22 10:25:46', 1),
(17, 'KOCHCHIKADE', 6, 1, '2021-12-22 10:25:56', 1),
(18, 'KOTUGODA', 8, 3, '2023-10-26 02:50:33', 1),
(19, 'DUNAGAHA', 8, 1, '2021-12-22 10:26:13', 1),
(20, 'DUNAGAHA', 8, 3, '2025-02-26 04:01:10', 1),
(21, 'GONAWILLA', 7, 1, '2021-12-22 10:26:32', 1),
(22, 'WALIPANNAMULLA', 7, 1, '2021-12-22 10:26:40', 1),
(23, 'WALIWERIYA', 8, 1, '2021-12-22 10:26:47', 1),
(24, 'MAKOLA', 8, 1, '2021-12-22 10:26:55', 1),
(25, 'DUNAGAHA', 8, 3, '2025-02-26 04:00:54', 1),
(26, 'WATTALA', 8, 3, '2021-12-29 09:54:32', 1),
(27, 'KOLONNAWA', 9, 1, '2023-10-26 04:11:35', 19),
(28, 'BANDARAGAMA', 10, 1, '2024-09-03 10:00:43', 1),
(29, 'KIRIWATHTHUDUWA', 9, 1, '2024-09-03 10:01:22', 1),
(30, 'KATUNERIYA', 6, 1, '2024-09-03 10:04:37', 1),
(31, 'MARAVILA', 6, 1, '2024-09-03 10:10:44', 1),
(32, 'NATHTHANDIYA', 6, 1, '2024-09-03 10:11:34', 1),
(33, 'MALWANA', 8, 1, '2024-09-03 10:12:13', 1),
(34, 'KIRIBATHGODA', 8, 1, '2024-09-03 10:13:58', 1),
(35, 'DOMPE', 8, 1, '2024-09-03 10:14:33', 1),
(36, 'NUGEGODA', 9, 1, '2024-09-03 10:15:17', 1),
(37, 'MEEGODA', 9, 1, '2024-09-03 10:16:03', 1),
(38, 'WETEKEYAWA', 7, 1, '2024-09-03 10:24:41', 1),
(39, 'DEWALAPOLA', 8, 1, '2024-09-03 10:25:46', 1),
(40, 'KIRINDIWITA', 8, 1, '2024-09-09 06:07:10', 1),
(41, 'POTHUWATAWANA', 7, 1, '2024-09-09 06:09:39', 1),
(42, 'MATHUGAMA', 10, 1, '2024-09-09 06:11:37', 1),
(43, 'YAKKALA', 8, 1, '2024-09-09 06:12:32', 1),
(44, 'WALIPANNAGAHAMULLA', 6, 1, '2024-09-09 06:15:25', 20),
(45, 'GANEMULLA', 8, 1, '2024-09-09 06:16:56', 20),
(46, 'DANKOTUWA', 6, 3, '2025-02-26 06:07:10', 1),
(47, 'DANKOTUWA', 6, 1, '2024-09-09 06:18:24', 20),
(48, 'MAHARAGAMA', 9, 1, '2024-09-09 06:20:04', 20),
(49, 'KORASE', 8, 1, '2024-09-09 06:20:36', 20),
(50, 'MAKANDURA', 6, 1, '2024-09-09 06:23:08', 20),
(51, 'KULIYAPITIYA', 6, 1, '2024-09-09 06:25:49', 20),
(52, 'KIRILLAWALA', 8, 1, '2024-09-09 06:30:43', 20),
(53, 'AHANGAMA', 25, 1, '2024-09-09 06:31:28', 20),
(54, 'MAWARAMANDIYA', 6, 1, '2024-09-09 06:36:39', 1),
(55, 'LUNUWILA', 6, 1, '2024-09-09 06:36:45', 20),
(56, 'WALIGAMA', 25, 1, '2024-09-09 06:37:50', 20),
(57, 'WALIGAMA', 25, 3, '2025-03-03 05:15:48', 20),
(58, 'KAMBURUGAMUWA', 25, 1, '2024-09-09 06:39:04', 20),
(59, 'MATHARA', 24, 1, '2024-09-09 06:40:14', 20),
(60, 'THELIJJAWILA', 24, 1, '2024-09-09 06:43:23', 20),
(61, 'HUNGAMA', 24, 1, '2024-09-09 06:44:54', 20),
(62, 'AMBALANTHOTA', 24, 1, '2024-09-09 06:51:23', 20),
(63, 'THISSAMAHARAMAYA', 23, 1, '2024-09-09 06:56:27', 20),
(64, 'THANAMALWILA', 23, 1, '2024-09-09 06:57:59', 20),
(65, 'YATIYANA', 24, 1, '2024-09-09 06:58:35', 20),
(66, 'AKURESSA', 24, 1, '2024-09-09 07:01:49', 20),
(67, 'MORAWAKA', 24, 1, '2024-09-09 07:02:32', 20),
(68, 'PITABEDDARA', 24, 1, '2024-09-09 07:03:53', 20),
(69, 'ATHILIWAWA', 23, 1, '2024-09-09 07:10:25', 20),
(70, 'IMADUWA', 24, 1, '2024-09-09 07:15:26', 20),
(71, 'GALLE', 25, 1, '2024-09-09 07:15:49', 20),
(72, 'HABARADUWA', 24, 1, '2024-09-09 07:16:13', 20),
(73, 'ANURADHAPURA', 11, 1, '2024-09-09 07:16:43', 20),
(74, 'NOCHCHIYAGAMA', 11, 1, '2024-09-09 07:21:40', 20),
(75, 'KAKIRAWA', 11, 1, '2024-09-09 07:24:24', 20),
(76, 'GALENBIDUNUWAWA', 11, 1, '2024-09-09 07:24:48', 20),
(77, 'DEMANHANDIYA', 8, 1, '2024-09-09 07:26:10', 20),
(78, 'BORELLA', 9, 1, '2024-09-09 07:26:32', 20),
(79, 'KADAWATHA', 8, 1, '2024-09-09 07:55:42', 20),
(80, 'KADUWELA', 8, 1, '2024-09-09 07:29:04', 20),
(81, 'Nugegoda', 9, 3, '2024-09-09 07:30:15', 20),
(82, 'Avissawella', 9, 3, '2024-09-09 07:31:31', 20),
(83, 'Pasgoda', 24, 3, '2024-09-09 07:34:11', 20),
(84, 'Lunugala', 21, 3, '2024-09-09 07:36:06', 20),
(85, 'Medapathana', 21, 3, '2024-09-09 07:38:50', 20),
(86, 'Madapatha', 9, 3, '2024-09-09 07:39:58', 20),
(87, 'Uva Paranagama', 21, 3, '2024-09-09 07:40:48', 20),
(88, 'Rathmalana', 9, 3, '2024-09-09 07:42:01', 20),
(89, 'Lellopitiya', 17, 3, '2024-09-09 07:52:53', 20),
(90, 'Padalangala', 17, 3, '2024-09-09 07:53:33', 20),
(91, 'Lunuwatta', 21, 3, '2024-09-09 07:54:46', 20),
(92, 'Akurana', 14, 3, '2024-09-09 07:56:35', 20),
(93, 'Kadugannawa', 14, 3, '2024-09-10 08:55:08', 20),
(94, 'Moratuwa', 9, 3, '2024-09-11 05:55:18', 27),
(95, 'Arewwala', 9, 3, '2024-09-11 06:02:04', 27),
(96, 'Baththaramulla', 9, 3, '2024-09-11 06:15:09', 27),
(97, 'Denipitiya', 24, 3, '2024-09-11 06:15:53', 27),
(98, 'Angoda', 9, 3, '2024-09-11 06:19:13', 27),
(99, 'Ganemulla', 8, 3, '2024-09-11 06:21:36', 27),
(100, 'Kolonnawa', 9, 3, '2024-09-11 06:22:32', 27),
(101, 'Wallampitiya', 9, 3, '2024-09-11 06:22:47', 27),
(102, 'Malabe', 9, 3, '2024-09-11 06:26:25', 27),
(103, 'Thalangama', 9, 3, '2024-09-11 06:27:03', 27),
(104, 'Kahawaththa', 17, 3, '2024-09-11 06:27:42', 27),
(105, 'Bogahakumbura', 21, 3, '2024-09-11 06:32:16', 27),
(106, 'Thanthirimale', 11, 3, '2024-09-11 06:34:32', 27),
(107, 'Meegahakiwla', 21, 3, '2024-09-11 06:35:02', 27),
(108, 'Kobbekaduwa', 14, 3, '2024-09-11 06:36:47', 27),
(109, 'Balangoda', 17, 3, '2024-09-11 06:37:17', 27),
(110, 'Kotadeniyawa', 8, 3, '2024-09-11 06:42:38', 27),
(111, 'Boralanda', 21, 3, '2024-09-11 06:45:10', 27),
(112, 'Kananke', 25, 3, '2024-09-11 06:47:38', 27),
(113, 'Welipitiya', 24, 3, '2024-09-11 06:50:54', 27),
(114, 'Homagama', 9, 3, '2024-09-11 06:53:34', 27),
(115, 'Mabima', 8, 3, '2024-09-11 06:54:24', 27),
(116, 'Ella', 21, 3, '2024-09-11 06:55:24', 27),
(117, 'Kiribathgoda', 8, 3, '2024-09-11 07:00:21', 27),
(118, 'Katana', 8, 3, '2024-09-11 07:01:34', 27),
(119, 'Kalaniya', 8, 3, '2024-09-11 07:04:08', 27),
(120, 'Ettampitiya', 21, 3, '2024-09-11 07:11:32', 27),
(121, 'Thispane', 15, 3, '2024-09-11 07:17:56', 27),
(122, 'Mount Lavinia', 9, 3, '2024-09-11 07:22:20', 27),
(123, 'Ibbagamuwa', 7, 3, '2024-09-11 07:33:03', 27),
(124, 'Rajanganaya', 9, 3, '2024-09-11 07:34:40', 27),
(125, 'Kandakatiya', 21, 3, '2024-09-11 07:39:15', 27),
(126, 'Halthota', 10, 3, '2024-09-11 07:40:27', 27),
(127, 'Moranthuduwa', 10, 3, '2024-09-11 07:40:59', 27),
(128, 'Kella', 17, 3, '2024-09-11 07:41:32', 27),
(129, 'Galauda', 21, 3, '2024-09-11 07:42:10', 27),
(130, 'Thembuwana', 10, 3, '2024-09-11 07:42:54', 27),
(131, 'Padukka', 9, 3, '2024-09-11 07:52:24', 27),
(132, 'Dampella', 25, 3, '2024-09-11 07:54:17', 27),
(133, 'Kamburupitiya', 24, 3, '2024-09-13 05:08:51', 27),
(134, 'Thelijjawila', 24, 3, '2024-09-13 05:09:32', 27),
(135, 'Atakalanpanna', 17, 3, '2024-09-13 05:10:25', 27),
(136, 'Medagama', 21, 3, '2024-09-13 05:11:29', 27),
(137, 'Siyambalape', 9, 3, '2024-09-13 05:12:32', 27),
(138, 'Palatuwa', 25, 3, '2024-09-13 05:13:41', 27),
(139, 'Agalawatta', 10, 3, '2024-09-13 05:22:39', 20),
(140, 'Tebuwana', 8, 3, '2024-09-13 05:23:16', 20),
(141, 'Matugama', 10, 3, '2024-09-13 05:24:05', 20),
(142, 'Thaldena', 21, 3, '2024-09-13 05:26:00', 20),
(143, 'Panadura', 10, 3, '2024-09-13 05:29:53', 20),
(144, 'Bombuwala', 10, 3, '2024-09-13 05:33:16', 20),
(145, 'Kotiyakumbura', 16, 3, '2024-09-13 05:38:38', 20),
(146, 'Udapussallawa', 15, 3, '2024-09-13 05:50:58', 20),
(147, 'Rajagiriya', 9, 3, '2024-09-13 05:51:21', 20),
(148, 'Elpitiya', 25, 3, '2024-09-13 06:00:45', 20),
(149, 'Gothatuwa', 9, 3, '2024-09-13 06:02:27', 27),
(150, 'Embilipitiya', 17, 3, '2024-09-13 06:03:08', 27),
(151, 'Haldummulla', 21, 3, '2024-09-13 06:03:58', 20),
(152, 'Kamburugamuwa', 24, 3, '2024-09-13 06:05:05', 27),
(153, 'Yakkala', 8, 3, '2024-09-13 06:07:35', 20),
(154, 'Dedigamuwa', 9, 3, '2024-09-13 06:13:43', 20),
(155, 'Mahiyanganaya', 21, 3, '2024-09-13 06:28:45', 20),
(156, 'Mapalagama', 25, 3, '2024-09-13 06:36:58', 20),
(157, 'Deniyaya', 24, 3, '2024-09-13 06:41:59', 20),
(158, 'Cheddikulam', 5, 3, '2024-09-13 06:42:40', 20),
(159, 'Hikkaduwa', 25, 3, '2024-09-13 06:52:53', 20),
(160, 'Nittambuwa', 8, 3, '2024-09-13 06:53:12', 27),
(161, 'Urubokka', 24, 3, '2024-09-13 06:58:05', 20),
(162, 'Malwana', 8, 3, '2024-09-13 07:11:54', 20),
(163, 'Ambalangoda', 25, 3, '2024-09-13 07:15:48', 20),
(164, 'Padiyatalawa', 20, 3, '2024-09-13 07:26:38', 20),
(165, 'Hasalaka', 14, 3, '2024-09-13 07:29:25', 20),
(166, 'Kolonna', 17, 3, '2024-09-14 02:30:02', 20),
(167, 'Divulapitiya', 8, 3, '2024-09-14 02:32:07', 20),
(168, 'Ragama', 8, 3, '2024-09-14 02:32:40', 20),
(169, 'Tangalle', 24, 3, '2024-09-14 02:50:30', 20),
(170, 'Dikwella', 24, 3, '2024-09-14 02:55:43', 20),
(171, 'Negombo', 8, 3, '2024-09-14 03:01:36', 20),
(172, 'Ahungalla', 25, 3, '2024-09-14 03:04:41', 20),
(173, 'Ambanpola', 7, 3, '2024-09-14 03:29:23', 20),
(174, 'Aluthgama', 10, 3, '2024-09-14 03:43:27', 20),
(175, 'Beliatta', 23, 3, '2024-09-18 05:25:41', 20),
(176, 'Wadduwa', 9, 3, '2024-09-18 05:36:55', 20),
(177, 'Wattala', 9, 3, '2024-09-18 05:45:38', 20),
(178, 'Hakmana', 24, 3, '2024-09-18 06:04:07', 20),
(179, 'Hanwella', 9, 3, '2024-09-18 06:09:08', 20),
(180, 'Keppetipola', 21, 3, '2024-09-18 06:11:28', 27),
(181, 'Tambuttegama', 11, 3, '2024-09-18 06:17:40', 20),
(182, 'Sooriyawewa', 23, 3, '2024-09-18 06:24:09', 20),
(183, 'Makandura', 24, 3, '2024-09-18 06:48:18', 20),
(184, 'Dodanduwa', 25, 3, '2024-09-18 06:55:05', 27),
(185, 'Walasmulla', 23, 3, '2024-09-18 06:57:12', 27),
(186, 'Horana', 9, 3, '2024-09-18 07:09:28', 20),
(187, 'Batapola', 25, 3, '2024-09-18 07:12:30', 20),
(188, 'Batapola', 25, 3, '2024-09-18 07:12:30', 20),
(189, 'Deiyandara', 24, 3, '2024-09-18 07:20:27', 20),
(190, 'Kitulgala', 14, 3, '2024-09-18 07:57:23', 20),
(191, 'Girandurukotte', 21, 3, '2024-09-20 05:16:48', 20),
(192, 'Dambulla', 7, 3, '2024-09-20 05:39:19', 20),
(193, 'Karandeniya', 25, 3, '2024-09-20 05:45:53', 27),
(194, 'Balapitiya', 25, 3, '2024-09-20 05:48:55', 20),
(195, 'Morawaka', 24, 3, '2024-09-20 05:49:32', 27),
(196, 'Dehiattakandiya', 12, 3, '2024-09-20 05:53:56', 20),
(197, 'Dompe', 8, 3, '2024-09-20 06:01:19', 27),
(198, 'Damanewela', 20, 3, '2024-09-20 07:20:39', 27),
(200, 'Galnewa', 7, 3, '2024-09-20 07:28:15', 20),
(201, 'Madampe.', 6, 3, '2024-09-20 07:58:37', 20),
(202, 'Medawachchiya', 11, 3, '2024-09-25 06:06:49', 20),
(203, 'Bakamuna', 12, 3, '2024-09-25 07:38:48', 20),
(204, 'WALIWERIYA', 8, 3, '2025-02-24 05:37:35', 1),
(205, 'RAGAMA', 8, 3, '2025-02-25 09:15:45', 1),
(206, 'MAKEWITA', 8, 3, '2025-02-26 09:34:03', 1),
(207, 'EKALA', 8, 3, '2025-02-26 09:50:16', 1),
(208, 'KANDANA', 8, 3, '2025-02-26 10:56:37', 1),
(209, 'KANDANA', 8, 3, '2025-02-26 11:13:44', 1),
(210, 'LIYANAGEMULLA', 8, 3, '2025-02-26 12:45:51', 1),
(211, 'DUNAGAHA', 8, 3, '2025-02-26 01:07:28', 1),
(212, 'KOCHCHIKADE', 8, 3, '2025-02-26 02:17:46', 1),
(213, 'NEGAMBO', 8, 3, '2025-02-26 02:51:43', 1),
(214, 'UDUGAMPOLA', 8, 3, '2025-02-26 02:56:57', 1),
(215, 'UDUGAMPOLA', 8, 1, '2025-02-26 04:05:17', 1),
(216, 'WENNAPPUWA', 6, 1, '2025-02-26 06:15:35', 1),
(217, 'RUKGAHAWILA', 8, 1, '2025-02-28 09:29:13', 1),
(218, 'SIYABALAPE', 8, 1, '2025-02-28 02:33:32', 1),
(219, 'THALPAVILA', 24, 1, '2025-03-01 12:28:53', 1),
(220, 'PADUKKA', 9, 1, '2025-03-01 01:19:39', 1),
(221, 'VAVNIYA', 5, 1, '2025-03-01 01:40:24', 1),
(222, 'MANNARAM', 1, 1, '2025-03-01 01:40:53', 1),
(223, 'TRINCOMALEE', 1, 1, '2025-03-01 01:41:20', 1),
(224, 'WALIGAMA', 24, 3, '2025-03-03 05:15:25', 1),
(225, 'WALLGAMA', 24, 3, '2025-03-03 05:14:21', 1),
(226, 'WALLGAMA', 24, 3, '2025-04-03 02:38:53', 1),
(227, 'GONAPINUWALA', 25, 1, '2025-03-04 10:48:23', 1),
(228, 'UDUGAMA', 25, 1, '2025-03-04 01:06:10', 1),
(229, 'HOROPATHANA', 11, 1, '2025-03-04 01:37:19', 1),
(230, 'KOTUGODA', 9, 1, '2025-03-05 09:10:00', 1),
(231, 'ALAWWA', 8, 1, '2025-03-05 01:50:29', 1),
(232, 'THABUTHTHEGAMA', 11, 1, '2025-03-05 04:28:04', 1),
(233, 'PUTHTHALAMA', 6, 1, '2025-03-05 04:51:40', 1),
(234, 'GALNAWA', 11, 1, '2025-03-05 05:25:05', 1),
(235, 'RABEWA', 11, 1, '2025-03-05 06:03:36', 1),
(236, 'MADAWACHCHIYA', 11, 1, '2025-03-05 06:05:14', 1),
(237, 'BINGIRIYA', 8, 1, '2025-03-08 10:07:24', 1),
(238, 'DUMMALASOORIYA', 8, 1, '2025-03-08 11:18:54', 1),
(239, 'MARADAGAHAMULA', 8, 1, '2025-03-08 11:24:45', 1),
(240, 'PILIYANDALA', 9, 1, '2025-03-08 12:09:33', 1),
(241, 'MORAGOLLAGAMA', 11, 1, '2025-03-08 01:02:41', 1),
(242, 'MADAMPE', 6, 1, '2025-03-11 09:28:37', 1),
(243, 'WEERAPOKUNA', 8, 3, '2025-03-11 09:36:10', 1),
(244, 'DELGODA', 8, 1, '2025-03-11 09:29:56', 1),
(245, 'DOMPE', 8, 1, '2025-03-11 09:31:05', 1),
(246, 'WEERAPOKUNA', 8, 1, '2025-03-11 09:35:58', 1),
(247, 'DELGODA', 8, 3, '2025-03-11 12:18:53', 1),
(248, 'DAMBADENIYA', 7, 1, '2025-03-11 01:50:43', 1),
(249, 'KOTADENIYAWA', 8, 1, '2025-03-14 11:11:15', 1),
(250, 'MIHIRIGAMA', 8, 1, '2025-03-14 12:43:17', 1),
(251, 'MARAWILA', 6, 3, '2025-03-25 03:02:38', 1),
(252, 'GIRIULLA', 8, 1, '2025-03-14 02:06:10', 1),
(253, 'THIRAPPAN', 1, 1, '2025-03-14 05:12:35', 1),
(254, 'KALUTHARA', 9, 1, '2025-03-15 10:48:12', 1),
(255, 'PANNIPITIYA', 9, 1, '2025-03-15 11:06:28', 1),
(256, 'THALAWA', 11, 1, '2025-03-15 12:42:28', 1),
(257, 'KEBITHIGOLLAWA', 11, 1, '2025-03-15 12:57:04', 1),
(258, 'MARADANKADAWALA', 11, 1, '2025-03-15 01:12:09', 1),
(259, 'MAHAILUPPALLAMA', 11, 1, '2025-03-15 01:13:55', 1),
(260, 'THALAWATHUGODA', 8, 1, '2025-03-17 01:39:24', 1),
(261, 'BELIATHTHA', 24, 1, '2025-03-18 10:42:09', 1),
(262, 'DEVINUWARA', 24, 1, '2025-03-18 02:15:34', 1),
(263, 'HAKMANA', 24, 1, '2025-03-18 03:01:41', 1),
(264, 'MONARAGALA', 22, 1, '2025-03-19 04:51:10', 1),
(265, 'KOTIYAKUBURA', 16, 1, '2025-03-19 02:39:22', 1),
(266, 'WALASMULLA', 24, 1, '2025-03-21 12:59:43', 1),
(267, 'EBILIPITIYA', 17, 1, '2025-03-21 03:00:19', 1),
(268, 'MIDDENIYA', 17, 1, '2025-03-21 03:00:50', 1),
(269, 'THANGALLE', 24, 1, '2025-03-21 04:42:59', 1),
(270, 'WEERAKATIYA', 24, 1, '2025-03-21 05:01:37', 1),
(271, 'HANDALA', 8, 1, '2025-03-21 05:29:35', 1),
(272, 'HUNUPITIYA', 9, 1, '2025-03-21 05:44:35', 1),
(273, 'RAJANGANAYA', 11, 1, '2025-03-24 10:17:59', 1),
(274, 'katana', 8, 1, '2025-03-25 08:58:30', 1),
(275, 'DARALUWA', 8, 1, '2025-03-25 02:07:19', 1),
(276, 'ATABE', 7, 1, '2025-03-26 04:07:08', 1),
(277, 'NARAMMALA', 7, 1, '2025-03-27 02:29:53', 1),
(278, 'HETTIPOLA', 7, 1, '2025-03-27 02:36:03', 1),
(279, 'DAMBULLA', 13, 1, '2025-03-31 01:41:35', 1),
(280, 'RATHGAMA', 25, 1, '2025-04-01 03:22:46', 1),
(281, 'HORAMPALLA', 8, 1, '2025-04-02 10:35:30', 1),
(282, 'PUHULWELLA', 24, 1, '2025-04-03 10:16:56', 1),
(283, 'KATUWANA', 24, 1, '2025-04-03 10:22:32', 1),
(284, 'WALIPITIYA', 24, 1, '2025-04-03 02:54:38', 1),
(285, 'WANCHAWALA', 24, 1, '2025-04-05 09:49:20', 1),
(286, 'KANDANEGEDARA', 7, 1, '2025-04-07 10:52:49', 1),
(287, 'KALAKARAMBAWA', 11, 1, '2025-04-09 12:32:15', 1),
(288, ' PANIRENDAWA.,', 6, 3, '2025-04-10 11:10:41', 1),
(289, 'MALLAWAGEDARA', 8, 1, '2025-04-30 02:50:37', 1),
(290, 'ALAWWA', 8, 1, '2025-05-03 08:58:13', 1),
(291, 'KALPITIYA', 6, 3, '2025-05-30 02:25:22', 1),
(292, 'NOROCHCHOLE', 18, 1, '2025-05-05 10:14:42', 1),
(293, 'NAIWALA', 8, 1, '2025-05-09 02:53:06', 1),
(294, 'ANGODA', 9, 1, '2025-05-10 09:23:32', 1),
(295, 'BIBILADENIYA', 8, 1, '2025-05-10 09:27:24', 1),
(296, 'HOKANDARA', 9, 1, '2025-05-17 09:31:45', 1),
(297, 'DIVULAPITIYA', 8, 1, '2025-05-17 09:56:31', 1),
(298, 'POLGAHWELA', 8, 1, '2025-05-19 01:19:54', 1),
(299, 'WABADA', 8, 1, '2025-05-19 05:52:46', 1),
(300, 'MEEGAHAWELA', 11, 1, '2025-05-21 09:27:11', 1),
(301, 'URAGASHANDIYA', 24, 1, '2025-05-21 12:05:28', 1),
(302, 'WALLAWAYA', 25, 1, '2025-05-21 05:00:33', 1),
(303, 'CHILAW', 6, 1, '2025-05-22 11:29:11', 1),
(304, 'MAWENALLA', 16, 1, '2025-05-23 08:55:19', 1),
(305, 'KEGALLE', 16, 1, '2025-05-23 11:21:30', 1),
(306, 'PASYALA', 8, 1, '2025-05-23 11:42:24', 1),
(307, 'NITTAMBUWA', 8, 1, '2025-05-27 11:29:13', 1),
(308, 'PALAVIYA', 6, 1, '2025-05-30 11:17:41', 1),
(309, 'KALPITIYA', 6, 1, '2025-05-30 11:31:20', 1),
(310, 'PADAVI', 18, 1, '2025-05-30 11:55:37', 1),
(311, 'PADAVIYA', 18, 1, '2025-05-30 12:04:38', 1),
(312, 'PULMODDAI', 3, 1, '2025-05-30 12:11:41', 1),
(313, 'KALPITIYA', 6, 1, '2025-05-30 02:25:07', 1),
(314, 'RABUKKANA', 16, 1, '2025-06-19 12:44:13', 1),
(315, 'HOMAGAMA', 9, 1, '2025-06-21 09:12:17', 1),
(316, 'KUNCHIKULAMA', 11, 1, '2025-06-23 09:31:59', 1),
(317, 'THALAGALA', 10, 1, '2025-06-28 09:13:05', 1),
(318, 'RIKILLAGASKADA', 14, 1, '2025-06-28 12:59:12', 1),
(319, 'ABEPUSSA', 16, 3, '2025-06-30 10:52:32', 1),
(320, 'RANNA', 23, 1, '2025-07-05 11:38:32', 1),
(321, 'URAPOLA', 8, 1, '2025-07-14 11:32:18', 1),
(322, 'URUGASMANHANDIYA', 25, 1, '2025-07-14 12:32:16', 1),
(323, 'KARANDENIYA', 25, 1, '2025-07-14 12:36:35', 1),
(324, 'UDUPILA', 8, 1, '2025-08-01 12:44:31', 1),
(325, 'ANDIAMBALAMA', 8, 1, '2025-09-02 02:31:27', 1),
(326, 'WEERABUGEDARA', 7, 1, '2025-09-08 01:01:03', 1),
(327, 'WARIYAPOLA', 7, 1, '2025-09-13 11:06:24', 1),
(328, 'AMPARA', 20, 1, '2025-09-19 02:31:23', 1),
(329, 'ATHURUGIRIYA', 9, 1, '2025-09-24 04:44:08', 1),
(330, 'RATHMALANA', 9, 1, '2025-09-25 09:36:49', 1),
(331, 'IMBULGODA', 8, 1, '2025-09-25 09:41:03', 1),
(332, 'WELIPILLEWA', 9, 1, '2025-10-01 01:10:14', 1),
(333, 'BADDEGAMA', 25, 1, '2025-10-08 03:42:22', 1),
(334, 'THAMBAGALLA', 7, 1, '2025-10-11 11:00:04', 1),
(335, 'NIKADALUPOTHA', 7, 1, '2025-10-11 11:06:23', 1),
(336, 'MOGODAWEWA', 11, 1, '2025-10-11 12:18:17', 1),
(337, 'HATHARALIYADDA', 14, 1, '2025-10-14 10:02:02', 1),
(338, 'RIDIGAMA', 7, 1, '2025-10-14 10:02:52', 1),
(339, 'IBBAGAMUWA', 7, 1, '2025-10-14 10:03:27', 1),
(340, 'MASPOTHA', 7, 1, '2025-10-14 10:03:50', 1),
(341, 'MAHAWA', 7, 1, '2025-10-14 10:04:31', 1),
(342, 'WERELLAGAMA', 7, 1, '2025-10-14 10:04:47', 1),
(343, 'SARAGAMA', 7, 1, '2025-10-14 10:07:27', 1),
(344, 'KANDY', 14, 1, '2025-10-14 05:35:51', 1),
(345, 'THALATHUOYA', 14, 1, '2025-10-14 05:36:50', 1),
(346, 'HIKKADUWA', 24, 1, '2025-10-17 09:49:16', 1),
(347, 'KUNDASALE', 14, 1, '2025-10-17 09:54:13', 1),
(348, 'PILIMATHALAWA', 14, 1, '2025-10-17 04:35:45', 1),
(349, 'BANDARAKOSWATTA', 7, 1, '2025-10-18 01:27:02', 1),
(350, 'MANIKHINNA', 14, 1, '2025-10-20 03:44:06', 1),
(351, 'NIKAWERATIYA', 7, 1, '2025-10-20 03:44:23', 1),
(352, 'DUMMALASURIYA', 7, 1, '2025-10-21 04:17:58', 1),
(353, 'BADULLA', 14, 1, '2025-10-21 05:38:06', 1),
(354, 'MAHIYANGANAYA', 14, 1, '2025-10-22 09:29:15', 1),
(355, 'WERAGANTHOTA', 14, 1, '2025-10-22 09:43:57', 1),
(356, 'PALLEGAMA', 8, 1, '2025-10-22 09:51:21', 1),
(357, 'GALKULAMA', 11, 1, '2025-10-22 05:19:33', 1),
(358, 'BANDARAWELA', 21, 1, '2025-10-23 03:04:15', 1),
(359, 'KOTHMALE', 14, 1, '2025-10-24 09:29:51', 1),
(360, 'GONAPINUWALA', 25, 3, '2025-10-24 12:04:27', 1),
(361, 'KURUNEGALA', 7, 1, '2025-10-24 04:27:20', 1),
(362, 'DEHIWALA', 9, 1, '2025-10-29 11:07:46', 1),
(363, 'AKMEEMANA', 11, 1, '2025-10-29 01:49:13', 1),
(364, 'MALABE', 9, 1, '2025-10-29 04:22:19', 1),
(365, 'MASKELIYA', 14, 1, '2025-10-30 05:08:06', 1),
(366, 'HATTON', 14, 1, '2025-10-30 05:08:22', 1),
(367, 'POLPITHIGAMA', 12, 1, '2025-10-30 05:09:10', 1),
(368, 'PUSSELLAWA', 14, 1, '2025-11-04 04:46:08', 1),
(369, 'PUNDALUOYA', 14, 1, '2025-11-04 04:49:20', 1),
(370, 'KUMBUKGETE', 7, 1, '2025-11-06 01:56:02', 1),
(371, 'POLGAHAWELA', 7, 3, '2025-11-10 10:54:14', 1),
(372, 'GALEWELA', 13, 1, '2025-11-10 11:01:07', 1),
(373, 'MELSIRIPURA', 7, 1, '2025-11-10 11:03:52', 1),
(374, 'YATYANTHOTA', 16, 1, '2025-12-26 13:21:45', 63),
(375, 'TEST', 11, 3, '2026-05-05 10:17:05', 1),
(376, 'DSFRSD', 9, 3, '2026-05-05 10:17:50', 1),
(377, 'TEST AMPARA', 20, 3, '2026-05-05 10:19:30', 1),
(378, 'SAFD', 19, 3, '2026-05-05 10:23:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asset`
--

CREATE TABLE `tbl_asset` (
  `idtbl_asset` int(11) NOT NULL,
  `asset_name` varchar(100) NOT NULL,
  `asset_code` varchar(5) NOT NULL,
  `currentyear` year(4) NOT NULL,
  `assetdiscription` double NOT NULL,
  `purchasedate` date NOT NULL,
  `depreciationrate` int(11) NOT NULL,
  `depreciationstartdate` date NOT NULL,
  `depreciationyear` double NOT NULL,
  `assetsvalue` double NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_asset_type_idtbl_asset_type` int(11) NOT NULL,
  `tbl_depreciation_type_idtbl_depreciation_type` int(11) NOT NULL,
  `tbl_depreciation_category_idtbl_depreciation_category` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asset_destroy`
--

CREATE TABLE `tbl_asset_destroy` (
  `idtbl_asset_destroy` int(11) NOT NULL,
  `destroy_item` varchar(255) NOT NULL,
  `destroy_date` date NOT NULL,
  `destroy_amount` decimal(10,2) NOT NULL,
  `destroy_reason` varchar(255) NOT NULL,
  `editstatus` int(11) NOT NULL,
  `poststatus` int(11) DEFAULT NULL,
  `postuser` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_asset_idtbl_asset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asset_has_tbl_account_detail`
--

CREATE TABLE `tbl_asset_has_tbl_account_detail` (
  `tbl_asset_idtbl_asset` int(11) NOT NULL,
  `tbl_account_detail_idtbl_account_detail` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asset_sell`
--

CREATE TABLE `tbl_asset_sell` (
  `idtbl_asset_sell` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `sell` int(11) NOT NULL,
  `editstatus` int(11) NOT NULL,
  `poststatus` int(11) DEFAULT NULL,
  `postuser` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_asset_idtbl_asset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asset_type`
--

CREATE TABLE `tbl_asset_type` (
  `idtbl_asset_type` int(11) NOT NULL,
  `asset_type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `idtbl_bank` int(11) NOT NULL,
  `bankname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank_branch`
--

CREATE TABLE `tbl_bank_branch` (
  `idtbl_bank_branch` int(11) NOT NULL,
  `branchname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_bank_idtbl_bank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank_rec_info`
--

CREATE TABLE `tbl_bank_rec_info` (
  `idtbl_bank_rec_info` int(11) NOT NULL,
  `tbl_bank_rec_list_idtbl_bank_rec_list` int(11) NOT NULL,
  `tbl_account_transaction_idtbl_account_transaction` int(11) NOT NULL COMMENT 'contains-mix-of-account-transaction-info-ids-or-other-bank-record-ids',
  `rec_info_origin_name` varchar(45) NOT NULL DEFAULT 'transaction_full',
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank_rec_list`
--

CREATE TABLE `tbl_bank_rec_list` (
  `idtbl_bank_rec_list` int(11) NOT NULL,
  `tbl_account_idtbl_account` int(11) NOT NULL,
  `tbl_finacial_year_idtbl_finacial_year` int(11) NOT NULL,
  `tbl_finacial_month_idtbl_finacial_month` int(11) NOT NULL,
  `bank_rec_date` date NOT NULL,
  `acc_rec_batchno` varchar(15) NOT NULL,
  `statement_open_bal` double NOT NULL,
  `statement_tot_cr` double NOT NULL,
  `statement_tot_dr` double NOT NULL,
  `statement_closed_bal` double NOT NULL,
  `status` int(11) NOT NULL,
  `rec_approved` tinyint(4) NOT NULL DEFAULT 0,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank_rec_revision`
--

CREATE TABLE `tbl_bank_rec_revision` (
  `idtbl_bank_rec_revision` int(11) NOT NULL,
  `tbl_bank_rec_list_idtbl_bank_rec_list` int(11) NOT NULL,
  `tbl_account_idtbl_account_cr` int(11) NOT NULL,
  `tbl_account_idtbl_account_dr` int(11) NOT NULL,
  `bank_narration` varchar(150) NOT NULL,
  `bank_amount` double NOT NULL,
  `tbl_master_idtbl_master` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch_category`
--

CREATE TABLE `tbl_batch_category` (
  `idtbl_batch_category` int(11) NOT NULL,
  `batch_category` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch_num_register`
--

CREATE TABLE `tbl_batch_num_register` (
  `idtbl_batch_num_register` varchar(15) NOT NULL COMMENT 'prefixed-batch-number-type-with-financial-year-and-month',
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL,
  `ref_no` int(11) NOT NULL DEFAULT 1,
  `acq_locked` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch_transaction`
--

CREATE TABLE `tbl_batch_transaction` (
  `idtbl_batch_transaction` int(11) NOT NULL,
  `transdate` date NOT NULL,
  `batchno` varchar(15) NOT NULL,
  `narration` varchar(45) DEFAULT NULL,
  `desc` mediumtext NOT NULL,
  `qtyhand` double DEFAULT NULL,
  `qtyin` double DEFAULT NULL,
  `qtyout` double DEFAULT NULL,
  `unitcost` double DEFAULT NULL,
  `newunitcost` double DEFAULT NULL,
  `uom_id` int(11) DEFAULT NULL,
  `materialbatch` varchar(45) DEFAULT NULL,
  `creditamount` double DEFAULT NULL,
  `debitamount` double DEFAULT NULL,
  `invoiceno` varchar(45) DEFAULT NULL,
  `crdr` varchar(10) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL,
  `tbl_batch_trans_type_idtbl_batch_trans_type` int(11) NOT NULL,
  `tbl_master_idtbl_master` int(11) NOT NULL,
  `tbl_account_idtbl_account` int(11) NOT NULL,
  `tbl_account_detail_idtbl_account_detail` int(11) NOT NULL,
  `tbl_print_material_info_idtbl_print_material_info` int(11) NOT NULL,
  `tbl_batch_transaction_main_idtbl_batch_transaction_main` int(11) NOT NULL,
  `tbl_supplier_idtbl_supplier` int(11) NOT NULL,
  `tbl_customer_idtbl_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch_transaction_main`
--

CREATE TABLE `tbl_batch_transaction_main` (
  `idtbl_batch_transaction_main` int(11) NOT NULL,
  `transdate` date NOT NULL,
  `batchno` varchar(15) NOT NULL,
  `completestatus` int(11) NOT NULL,
  `approvestatus` int(11) NOT NULL,
  `approveuser` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL,
  `tbl_batch_category_idtbl_batch_category` int(11) NOT NULL,
  `tbl_batch_trans_type_idtbl_batch_trans_type` int(11) NOT NULL,
  `tbl_master_idtbl_master` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch_trans_type`
--

CREATE TABLE `tbl_batch_trans_type` (
  `idtbl_batch_trans_type` int(11) NOT NULL,
  `batctranstypecode` varchar(4) NOT NULL,
  `batctranstype` varchar(45) NOT NULL,
  `taxapply` int(11) NOT NULL,
  `crdr` varchar(10) NOT NULL,
  `plusminus` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_batch_category_idtbl_batch_category` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch_trans_type_info`
--

CREATE TABLE `tbl_batch_trans_type_info` (
  `idtbl_batch_trans_type_info` int(11) NOT NULL,
  `crdr` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_batch_trans_type_idtbl_batch_trans_type` int(11) NOT NULL,
  `tbl_account_idtbl_account` int(11) NOT NULL,
  `tbl_account_detail_idtbl_account_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch_trans_type_tax`
--

CREATE TABLE `tbl_batch_trans_type_tax` (
  `idtbl_batch_trans_type_tax` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_batch_trans_type_idtbl_batch_trans_type` int(11) NOT NULL,
  `tbl_account_idtbl_account` int(11) NOT NULL,
  `tbl_account_detail_idtbl_account_detail` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catalog`
--

CREATE TABLE `tbl_catalog` (
  `idtbl_catalog` int(11) NOT NULL,
  `uom` int(11) NOT NULL,
  `group_type` int(11) NOT NULL,
  `tbl_catalog_category_idtbl_catalog_category` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `inserdatetime` datetime DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catalog_category`
--

CREATE TABLE `tbl_catalog_category` (
  `idtbl_catalog_category` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sequence` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_size_categories_idtbl_size_categories` int(11) NOT NULL DEFAULT 1,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catalog_details`
--

CREATE TABLE `tbl_catalog_details` (
  `idtbl_catalog_details` int(11) NOT NULL,
  `product_name` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_userid` int(11) NOT NULL,
  `tbl_catalog_idtbl_catalog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cheque_info`
--

CREATE TABLE `tbl_cheque_info` (
  `idtbl_cheque_info` int(11) NOT NULL,
  `startno` varchar(7) NOT NULL,
  `endno` varchar(7) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_account_idtbl_account` int(11) NOT NULL,
  `tbl_bank_idtbl_bank` int(11) NOT NULL,
  `tbl_bank_branch_idtbl_bank_branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cheque_issue`
--

CREATE TABLE `tbl_cheque_issue` (
  `idtbl_cheque_issue` int(11) NOT NULL,
  `chedate` date NOT NULL,
  `chequeno` varchar(7) NOT NULL,
  `narration` varchar(45) NOT NULL,
  `amount` double NOT NULL,
  `chequereturn` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_cheque_info_idtbl_cheque_info` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cheque_payments`
--

CREATE TABLE `tbl_cheque_payments` (
  `idtbl_cheque_payments` int(11) NOT NULL,
  `cheque_number` varchar(50) NOT NULL,
  `tbl_customer_idtbl_customer` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tbl_bank_idtbl_bank` int(11) NOT NULL,
  `tbl_bank_branch_idtbl_bank_branch` int(11) DEFAULT NULL,
  `payment_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `insertdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedatetime` timestamp NULL DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) DEFAULT NULL,
  `is_payment_added` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cheque_payment_reentries`
--

CREATE TABLE `tbl_cheque_payment_reentries` (
  `idtbl_cheque_payment_reentries` int(11) NOT NULL,
  `tbl_cheque_payments_idtbl_cheque_payments` int(11) NOT NULL,
  `tbl_customer_idtbl_customer` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `cheque_number` varchar(50) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `idtbl_company` int(11) NOT NULL,
  `company` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `address1` varchar(45) NOT NULL,
  `address2` varchar(45) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_branch`
--

CREATE TABLE `tbl_company_branch` (
  `idtbl_company_branch` int(11) NOT NULL,
  `branch` varchar(45) NOT NULL,
  `code` varchar(5) NOT NULL,
  `address1` varchar(45) NOT NULL,
  `address2` varchar(45) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_details`
--

CREATE TABLE `tbl_contact_details` (
  `idtbl_contact_details` int(11) NOT NULL,
  `contact_owner` varchar(450) NOT NULL,
  `relation` varchar(450) NOT NULL,
  `number` int(11) NOT NULL,
  `email` varchar(450) NOT NULL,
  `updatedatetime` date NOT NULL,
  `status` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `type` varchar(450) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_creditenote`
--

CREATE TABLE `tbl_creditenote` (
  `idtbl_creditenote` int(11) NOT NULL,
  `returnamount` double NOT NULL,
  `payAmount` double NOT NULL,
  `balAmount` double NOT NULL,
  `baltotalamount` double NOT NULL,
  `settle` int(11) DEFAULT NULL,
  `settledate` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_customer_idtbl_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_creditenote_detail`
--

CREATE TABLE `tbl_creditenote_detail` (
  `idtbl_creditenote_detail` int(11) NOT NULL,
  `returntotal` double NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_creditenote_idtbl_creditenote` int(11) NOT NULL,
  `tbl_return_idtbl_return` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `idtbl_customer` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `customer` varchar(450) NOT NULL,
  `formcode` varchar(450) DEFAULT NULL,
  `nic` varchar(45) DEFAULT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(450) DEFAULT NULL,
  `address` mediumtext NOT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `is_vat` int(11) DEFAULT 0,
  `vat_num` varchar(450) DEFAULT NULL,
  `s_vat` varchar(450) DEFAULT NULL,
  `numofvisitdays` int(11) DEFAULT NULL,
  `nonvisit` int(11) DEFAULT NULL,
  `creditlimit` double DEFAULT NULL,
  `credittype` int(11) DEFAULT NULL,
  `creditperiod` int(11) DEFAULT NULL,
  `emergencydate` varchar(10) DEFAULT NULL,
  `remarks` varchar(450) DEFAULT NULL,
  `ref` int(11) DEFAULT 0,
  `longitude` decimal(10,8) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `comment` varchar(450) DEFAULT NULL,
  `paymentpersonname` varchar(450) DEFAULT NULL,
  `paymentpersonmobile` int(11) DEFAULT NULL,
  `deliverypersonname` varchar(450) DEFAULT NULL,
  `deliverypersonmobile` int(11) DEFAULT NULL,
  `buisnesscopyimagepath` mediumtext DEFAULT NULL,
  `dealerboardimagepath` mediumtext DEFAULT NULL,
  `selfieimagepath` mediumtext DEFAULT NULL,
  `productimagepath` mediumtext DEFAULT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) DEFAULT NULL,
  `tbl_area_idtbl_area` int(11) DEFAULT NULL,
  `tbl_province_idtbl_province` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`idtbl_customer`, `type`, `customer`, `formcode`, `nic`, `phone`, `email`, `address`, `postal_code`, `is_vat`, `vat_num`, `s_vat`, `numofvisitdays`, `nonvisit`, `creditlimit`, `credittype`, `creditperiod`, `emergencydate`, `remarks`, `ref`, `longitude`, `latitude`, `comment`, `paymentpersonname`, `paymentpersonmobile`, `deliverypersonname`, `deliverypersonmobile`, `buisnesscopyimagepath`, `dealerboardimagepath`, `selfieimagepath`, `productimagepath`, `status`, `updatedatetime`, `tbl_user_idtbl_user`, `tbl_area_idtbl_area`, `tbl_province_idtbl_province`) VALUES
(1, 1, 'ABC Traders', 'CUS001', '199812345678', '0771234567', 'abc@gmail.com', 'No 25, Main Street, Colombo', '10000', 1, 'VAT12345', 'SVAT001', 5, 0, 500000, 0, 30, '2026-05-25', 'Sample customer remarks', 0, 79.86120000, 6.92710000, 'Test customer comment', 'Kamal Perera', 712345678, 'Nimal Silva', 723456789, 'uploads/businesscopy.jpg', 'uploads/dealerboard.jpg', 'uploads/selfie.jpg', 'uploads/product.jpg', 1, '2026-05-25 12:41:05', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_assets`
--

CREATE TABLE `tbl_customer_assets` (
  `idtbl_customer_assets` int(10) UNSIGNED NOT NULL,
  `assetname` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `updateuser` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=16384 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_customer_assets`
--

INSERT INTO `tbl_customer_assets` (`idtbl_customer_assets`, `assetname`, `description`, `status`, `updateuser`, `updatedatetime`) VALUES
(1, 'test', 'test', 3, 1, '2026-05-11 16:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_asset_assignments`
--

CREATE TABLE `tbl_customer_asset_assignments` (
  `idtbl_customer_asset_assignments` bigint(20) UNSIGNED NOT NULL,
  `tbl_customer_idtbl_customer` int(10) UNSIGNED NOT NULL,
  `tbl_customer_assets_id` bigint(20) UNSIGNED NOT NULL,
  `assigned_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_location`
--

CREATE TABLE `tbl_customer_location` (
  `idtbl_customer_location` int(11) NOT NULL,
  `tbl_area_idtbl_area` int(11) NOT NULL,
  `address` mediumtext NOT NULL,
  `ownername` varchar(450) NOT NULL,
  `ownercontact` varchar(20) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `updatedatetime` date NOT NULL,
  `status` int(11) NOT NULL,
  `tbl_customer_idtbl_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_order`
--

CREATE TABLE `tbl_customer_order` (
  `idtbl_customer_order` int(11) NOT NULL,
  `cuspono` varchar(45) NOT NULL COMMENT 'CP/YY/MM/idtbl_customer_order',
  `date` date NOT NULL,
  `total` double NOT NULL,
  `discount` double NOT NULL,
  `podiscount` double NOT NULL,
  `podiscountpercentage` double NOT NULL,
  `vat` double NOT NULL,
  `nettotal` double NOT NULL,
  `confirm` int(11) DEFAULT NULL,
  `confrimuser` int(11) DEFAULT NULL,
  `dispatchissue` int(11) DEFAULT NULL,
  `dispatchuser` int(11) DEFAULT NULL,
  `ship` int(11) DEFAULT NULL,
  `shipuser` int(11) DEFAULT NULL,
  `delivered` int(11) DEFAULT NULL,
  `delivereduser` int(11) DEFAULT NULL,
  `return` int(11) DEFAULT NULL,
  `returnuser` int(11) DEFAULT NULL,
  `is_printed` int(11) DEFAULT 0,
  `remark` mediumtext DEFAULT NULL,
  `cancelreason` mediumtext DEFAULT NULL,
  `duedate` int(11) DEFAULT NULL,
  `vatpre` double NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `new_cpo_datetime` datetime DEFAULT NULL,
  `confirmed_datetime` datetime DEFAULT NULL,
  `dispatched_datetime` datetime DEFAULT NULL,
  `delivered_datetime` datetime DEFAULT NULL,
  `cancelled_datetime` datetime DEFAULT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_area_idtbl_area` int(11) NOT NULL,
  `tbl_employee_idtbl_employee` int(11) NOT NULL,
  `tbl_locations_idtbl_locations` int(11) NOT NULL,
  `tbl_customer_idtbl_customer` int(11) NOT NULL,
  `type` int(11) DEFAULT 1,
  `delivereddatetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_customer_order`
--

INSERT INTO `tbl_customer_order` (`idtbl_customer_order`, `cuspono`, `date`, `total`, `discount`, `podiscount`, `podiscountpercentage`, `vat`, `nettotal`, `confirm`, `confrimuser`, `dispatchissue`, `dispatchuser`, `ship`, `shipuser`, `delivered`, `delivereduser`, `return`, `returnuser`, `is_printed`, `remark`, `cancelreason`, `duedate`, `vatpre`, `status`, `insertdatetime`, `new_cpo_datetime`, `confirmed_datetime`, `dispatched_datetime`, `delivered_datetime`, `cancelled_datetime`, `updateuser`, `updatedatetime`, `tbl_user_idtbl_user`, `tbl_area_idtbl_area`, `tbl_employee_idtbl_employee`, `tbl_locations_idtbl_locations`, `tbl_customer_idtbl_customer`, `type`, `delivereddatetime`) VALUES
(1, 'PO-1001', '2026-05-25', 3000, 100, 50, 5, 200, 2900, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 1, '2026-05-25 12:44:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, NULL),
(2, 'PO-1002', '2026-05-25', 5000, 200, 100, 5, 300, 4700, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 1, '2026-05-25 12:45:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_order_delivery_data`
--

CREATE TABLE `tbl_customer_order_delivery_data` (
  `idtbl_customer_order_delivery_data` int(11) NOT NULL,
  `deliverDate` datetime DEFAULT NULL,
  `deliverRemarks` mediumtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `tbl_vehicle_idtbl_vehicle` int(11) NOT NULL DEFAULT 1,
  `tbl_customer_order_idtbl_customer_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_order_detail`
--

CREATE TABLE `tbl_customer_order_detail` (
  `idtbl_customer_order_detail` int(11) NOT NULL,
  `orderqty` double NOT NULL,
  `confirmqty` double NOT NULL,
  `dispatchqty` double NOT NULL,
  `qty` double NOT NULL,
  `freeqty` int(11) NOT NULL DEFAULT 0,
  `unitprice` double NOT NULL,
  `saleprice` double NOT NULL,
  `discountpresent` double NOT NULL,
  `discount` double NOT NULL,
  `total` double NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_customer_order_idtbl_customer_order` int(11) NOT NULL,
  `tbl_product_idtbl_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_customer_order_detail`
--

INSERT INTO `tbl_customer_order_detail` (`idtbl_customer_order_detail`, `orderqty`, `confirmqty`, `dispatchqty`, `qty`, `freeqty`, `unitprice`, `saleprice`, `discountpresent`, `discount`, `total`, `status`, `insertdatetime`, `updateuser`, `updatedatetime`, `tbl_user_idtbl_user`, `tbl_customer_order_idtbl_customer_order`, `tbl_product_idtbl_product`) VALUES
(1, 2, 0, 0, 2, 0, 1000, 1100, 5, 100, 1900, 1, '2026-05-25 12:44:59', NULL, NULL, 1, 1, 1),
(2, 1, 0, 0, 1, 0, 1200, 1300, 3, 50, 1100, 1, '2026-05-25 12:44:59', NULL, NULL, 1, 1, 2),
(3, 1, 0, 0, 1, 0, 1500, 1600, 2, 30, 1470, 1, '2026-05-25 12:45:20', NULL, NULL, 1, 1, 5),
(4, 2, 0, 0, 2, 0, 800, 900, 3, 50, 1550, 1, '2026-05-25 12:45:20', NULL, NULL, 1, 2, 3),
(5, 3, 0, 0, 3, 0, 500, 600, 2, 20, 1740, 1, '2026-05-25 12:45:20', NULL, NULL, 1, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_order_hold_stock`
--

CREATE TABLE `tbl_customer_order_hold_stock` (
  `idtbl_customer_order_hold_stock` int(11) NOT NULL,
  `qty` double NOT NULL,
  `invoiceissue` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_product_idtbl_product` int(11) NOT NULL,
  `tbl_customer_order_idtbl_customer_order` int(11) NOT NULL,
  `tbl_location_idtbl_location` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_type`
--

CREATE TABLE `tbl_customer_type` (
  `idtbl_customer_type` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `updateuser` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=16384 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_customer_type`
--

INSERT INTO `tbl_customer_type` (`idtbl_customer_type`, `type`, `description`, `status`, `updateuser`, `updatedatetime`) VALUES
(1, 'test', NULL, 3, 1, '2026-05-11 16:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_visitdays`
--

CREATE TABLE `tbl_customer_visitdays` (
  `idtbl_customer_visitdays` int(11) NOT NULL,
  `dayname` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_customer_idtbl_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cutomer_order_dispatch`
--

CREATE TABLE `tbl_cutomer_order_dispatch` (
  `idtbl_cutomer_order_dispatch` int(11) NOT NULL,
  `dispatchdate` date NOT NULL,
  `vehicleno` varchar(10) NOT NULL,
  `drivername` varchar(45) NOT NULL,
  `trackingno` varchar(45) NOT NULL,
  `trackingwebsite` mediumtext NOT NULL,
  `currier` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cutomer_order_dispatch_has_tbl_customer_order`
--

CREATE TABLE `tbl_cutomer_order_dispatch_has_tbl_customer_order` (
  `tbl_cutomer_order_dispatch_idtbl_cutomer_order_dispatch` int(11) NOT NULL,
  `tbl_customer_order_idtbl_customer_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_damage_return`
--

CREATE TABLE `tbl_damage_return` (
  `idtbl_damage_return` int(11) NOT NULL,
  `returndate` date NOT NULL,
  `qty` double NOT NULL,
  `comsendstatus` int(11) NOT NULL,
  `comsenddate` date NOT NULL,
  `backstockstatus` int(11) NOT NULL,
  `backstockdate` date NOT NULL,
  `returncusstatus` int(11) NOT NULL,
  `returncusdate` date NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_return_idtbl_return` int(11) NOT NULL,
  `tbl_product_idtbl_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_depreciation_category`
--

CREATE TABLE `tbl_depreciation_category` (
  `idtbl_depreciation_category` int(11) NOT NULL,
  `depreciation_category` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_depreciation_info`
--

CREATE TABLE `tbl_depreciation_info` (
  `idtbl_depreciation_info` int(11) NOT NULL,
  `date` date NOT NULL,
  `depreciationmonth` varchar(7) NOT NULL,
  `depreciationrate` double NOT NULL,
  `depreciationamount` double NOT NULL,
  `editstatus` int(11) NOT NULL,
  `poststatus` int(11) DEFAULT NULL,
  `postuser` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_asset_idtbl_asset` int(11) NOT NULL,
  `tbl_master_idtbl_master` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_depreciation_method`
--

CREATE TABLE `tbl_depreciation_method` (
  `idtbl_depreciation_method` int(11) NOT NULL,
  `method` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_depreciation_type`
--

CREATE TABLE `tbl_depreciation_type` (
  `idtbl_depreciation_type` int(11) NOT NULL,
  `depreciation_type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor`
--

CREATE TABLE `tbl_distributor` (
  `idtbl_distributor` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `ref` int(11) NOT NULL DEFAULT 0,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `insert_time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor_customer`
--

CREATE TABLE `tbl_distributor_customer` (
  `idtbl_discus` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `vat_num` varchar(255) NOT NULL,
  `buisnesscopyimagepath` varchar(255) DEFAULT NULL,
  `dealerboardimagepath` varchar(255) DEFAULT NULL,
  `credit_limit` double NOT NULL,
  `credit_type` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `tbl_distributor_idtbl_distributor` int(11) NOT NULL,
  `tbl_area_idtbl_area` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `insert_time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor_customer_invoice`
--

CREATE TABLE `tbl_distributor_customer_invoice` (
  `idtbl_dis_invoiceid` int(10) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `invoice_date` datetime NOT NULL,
  `order_id` int(11) NOT NULL,
  `total` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `discount_percentage` double DEFAULT NULL,
  `nettotal` double NOT NULL,
  `status` int(11) NOT NULL,
  `tbl_distributor_idtbl_distributor` int(11) NOT NULL,
  `tbl_distributor_customer_id` int(11) DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `insert_time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor_cus_order`
--

CREATE TABLE `tbl_distributor_cus_order` (
  `idtbl_dis_cus_orderid` int(10) UNSIGNED NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `total` double NOT NULL,
  `discount` double DEFAULT NULL,
  `discount_percentage` double DEFAULT NULL,
  `nettotal` double NOT NULL,
  `vat_percentage` double(8,2) DEFAULT NULL,
  `vat_value` double DEFAULT NULL,
  `nettotal_with_vat` double DEFAULT NULL,
  `confirm` int(11) NOT NULL DEFAULT 0,
  `confirm_user` int(11) NOT NULL DEFAULT 0,
  `confirm_date` datetime DEFAULT NULL,
  `dispatch` int(11) NOT NULL DEFAULT 0,
  `dispatch_user` int(11) NOT NULL DEFAULT 0,
  `dispatch_date` datetime DEFAULT NULL,
  `deliver` int(11) NOT NULL DEFAULT 0,
  `deliver_user` int(11) NOT NULL DEFAULT 0,
  `deliver_date` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `tbl_distributor_customer_id` int(11) NOT NULL,
  `tbl_distributor_idtbl_distributor` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `insert_time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor_cus_order_detail`
--

CREATE TABLE `tbl_distributor_cus_order_detail` (
  `idtbl_dis_cus_order_detailid` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_unitprice` double DEFAULT NULL,
  `item_saleprice` double NOT NULL,
  `batch_info` varchar(255) DEFAULT NULL,
  `qty` double(8,2) NOT NULL,
  `free_qty` double(8,2) DEFAULT NULL,
  `total` double NOT NULL,
  `item_discount` double DEFAULT NULL,
  `discount_percentage` double DEFAULT NULL,
  `nettotal` double NOT NULL,
  `vat_percentage` double(8,2) NOT NULL,
  `vat_value` double NOT NULL,
  `nettotal_with_vat` double NOT NULL,
  `status` int(11) NOT NULL,
  `tbl_distributor_cus_order_id` int(11) NOT NULL,
  `tbl_distributor_customer_id` int(11) NOT NULL,
  `tbl_distributor_idtbl_distributor` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `insert_time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor_grn`
--

CREATE TABLE `tbl_distributor_grn` (
  `idtbl_grn` int(10) UNSIGNED NOT NULL,
  `grn_no` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `total` double NOT NULL DEFAULT 0,
  `vatamount` double DEFAULT NULL,
  `nettotal` double DEFAULT NULL,
  `invoicenum` varchar(255) NOT NULL,
  `dispatchnum` varchar(255) NOT NULL,
  `batchno` varchar(255) NOT NULL,
  `porder_id` int(11) NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `confirm_status` int(11) NOT NULL DEFAULT 0,
  `transfer_status` int(11) NOT NULL DEFAULT 0,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor_grn_detail`
--

CREATE TABLE `tbl_distributor_grn_detail` (
  `idtbl_grn_detail` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `qty` double NOT NULL DEFAULT 0,
  `unitprice` double DEFAULT NULL,
  `saleprice` double DEFAULT NULL,
  `retailprice` double DEFAULT NULL,
  `total` double NOT NULL DEFAULT 0,
  `grn_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor_invoice_detail`
--

CREATE TABLE `tbl_distributor_invoice_detail` (
  `idtbl_dis_invoice_detailid` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_unitprice` double DEFAULT NULL,
  `item_saleprice` double NOT NULL,
  `qty` double(8,2) NOT NULL,
  `free_qty` double(8,2) NOT NULL,
  `total` double NOT NULL,
  `item_discount` double DEFAULT NULL,
  `discount_percentage` double DEFAULT NULL,
  `nettotal` double NOT NULL,
  `status` int(11) NOT NULL,
  `tbl_distributor_idtbl_distributor` int(11) NOT NULL,
  `tbl_distributor_invoice_id` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `insert_time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor_order`
--

CREATE TABLE `tbl_distributor_order` (
  `idtbl_dis_orderid` int(10) UNSIGNED NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `total` double NOT NULL,
  `discount` double DEFAULT NULL,
  `discount_percentage` double DEFAULT NULL,
  `nettotal` double NOT NULL,
  `confirm` int(11) NOT NULL DEFAULT 0,
  `confirm_user` int(11) NOT NULL DEFAULT 0,
  `confirm_date` datetime DEFAULT NULL,
  `dispatch` int(11) NOT NULL DEFAULT 0,
  `dispatch_user` int(11) NOT NULL DEFAULT 0,
  `dispatch_date` datetime DEFAULT NULL,
  `deliver` int(11) NOT NULL DEFAULT 0,
  `deliver_user` int(11) NOT NULL DEFAULT 0,
  `deliver_date` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `des_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `insert_time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor_order_detail`
--

CREATE TABLE `tbl_distributor_order_detail` (
  `idtbl_dis_order_detail_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_saleprice` double NOT NULL,
  `qty` double(8,2) NOT NULL,
  `freeqty` double(8,2) NOT NULL,
  `total` double NOT NULL,
  `item_discount` double DEFAULT NULL,
  `discount_percentage` double DEFAULT NULL,
  `nettotal` double NOT NULL,
  `status` int(11) NOT NULL,
  `tbl_distributor_order_id` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `insert_time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor_porder`
--

CREATE TABLE `tbl_distributor_porder` (
  `idtbl_porder` int(10) UNSIGNED NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `total` double NOT NULL DEFAULT 0,
  `vat` double NOT NULL DEFAULT 0,
  `nettotal` double NOT NULL DEFAULT 0,
  `vatpre` double NOT NULL DEFAULT 0,
  `remarks` longtext DEFAULT NULL,
  `completestatus` int(11) NOT NULL DEFAULT 0,
  `confirmstatus` int(11) NOT NULL DEFAULT 0,
  `grnissuestatus` int(11) NOT NULL DEFAULT 0,
  `location_id` int(11) NOT NULL DEFAULT 0,
  `distributor_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor_porder_detail`
--

CREATE TABLE `tbl_distributor_porder_detail` (
  `idtbl_porder_detail` int(10) UNSIGNED NOT NULL,
  `qty` double NOT NULL DEFAULT 0,
  `unitprice` double NOT NULL DEFAULT 0,
  `saleprice` double NOT NULL DEFAULT 0,
  `retailprice` double DEFAULT NULL,
  `total` double NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL,
  `porder_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor_return`
--

CREATE TABLE `tbl_distributor_return` (
  `idtbl_dis_returnid` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` double(8,2) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `return_type` int(11) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `tbl_distributor_idtbl_distributor` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `insert_time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor_stock`
--

CREATE TABLE `tbl_distributor_stock` (
  `idtbl_dis_stockid` int(10) UNSIGNED NOT NULL,
  `batchno` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_saleprice` double NOT NULL,
  `item_bulkprice` double NOT NULL,
  `batch_qty` float DEFAULT 0,
  `qty` double(8,2) NOT NULL,
  `status` int(11) NOT NULL,
  `tbl_distributor_idtbl_distributor` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `insert_time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor_stock_adjustment`
--

CREATE TABLE `tbl_distributor_stock_adjustment` (
  `idtbl_dis_stock_adjustment` int(10) UNSIGNED NOT NULL,
  `adjustmenttype` int(11) NOT NULL,
  `adjustqty` double NOT NULL,
  `remarks` longtext DEFAULT NULL,
  `distributor_stock_id` int(11) NOT NULL,
  `batchnumber` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `inserteddatetime` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `distributor_id` int(11) NOT NULL,
  `updateuser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `idtbl_district` int(11) NOT NULL,
  `name` varchar(450) NOT NULL,
  `tbl_province_idtbl_province` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=655 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`idtbl_district`, `name`, `tbl_province_idtbl_province`) VALUES
(1, 'Jaffna', 4),
(2, 'Kilinochchi', 4),
(3, 'Mannar', 4),
(4, 'Mullaitivu', 4),
(5, 'Vavuniya', 4),
(6, 'Puttalam', 6),
(7, 'Kurunegala', 6),
(8, 'Gampaha	', 1),
(9, 'Colombo', 1),
(10, 'Kaluthara', 1),
(11, 'Anuradhapura', 7),
(12, 'Polonnaruwa', 7),
(13, 'Mathale', 2),
(14, 'Kandy', 2),
(15, 'Nuwara Eliya', 2),
(16, 'Kegalle', 9),
(17, 'Rathnapura', 9),
(18, 'Trincomalee', 5),
(19, 'Batticaloa', 5),
(20, 'Ampara', 5),
(21, 'Badulla', 8),
(22, 'Monaragala', 8),
(23, 'Hambanthota', 3),
(24, 'Mathara', 3),
(25, 'Galle', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dist_cus_invoice`
--

CREATE TABLE `tbl_dist_cus_invoice` (
  `idtbl_dis_cus_invoiceid` int(10) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `invoice_date` datetime NOT NULL,
  `order_id` int(11) NOT NULL,
  `total` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `discount_percentage` double DEFAULT NULL,
  `nettotal` double NOT NULL,
  `vat_percentage` double(8,2) DEFAULT NULL,
  `vat_value` double DEFAULT NULL,
  `nettotal_with_vat` double DEFAULT NULL,
  `status` int(11) NOT NULL,
  `tbl_distributor_idtbl_distributor` int(11) NOT NULL,
  `tbl_distributor_customer_id` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `insert_time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dist_cus_invoice_detail`
--

CREATE TABLE `tbl_dist_cus_invoice_detail` (
  `idtbl_dis_cus_invoice_detailid` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_price` double NOT NULL,
  `qty` double(8,2) NOT NULL,
  `free_qty` double(8,2) NOT NULL,
  `total` double NOT NULL,
  `item_discount` double DEFAULT NULL,
  `discount_percentage` double DEFAULT NULL,
  `nettotal` double NOT NULL,
  `vat_percentage` double(8,2) NOT NULL,
  `vat_value` double NOT NULL,
  `nettotal_with_vat` double NOT NULL,
  `status` int(11) NOT NULL,
  `tbl_distributor_idtbl_distributor` int(11) NOT NULL,
  `tbl_distributor_customer_id` int(11) NOT NULL,
  `tbl_distributor_cus_invoice_id` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `insert_time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `idtbl_employee` int(11) NOT NULL,
  `name` varchar(450) NOT NULL,
  `epfno` varchar(45) DEFAULT NULL,
  `nic` varchar(450) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `address` mediumtext NOT NULL,
  `status` int(11) NOT NULL,
  `useraccountid` int(11) DEFAULT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_user_type_idtbl_user_type` int(11) NOT NULL,
  `tbl_sales_manager_idtbl_sales_manager` int(11) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=16384 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`idtbl_employee`, `name`, `epfno`, `nic`, `phone`, `address`, `status`, `useraccountid`, `updatedatetime`, `tbl_user_idtbl_user`, `tbl_user_type_idtbl_user_type`, `tbl_sales_manager_idtbl_sales_manager`) VALUES
(1, 'kamal sooriyarachchi', NULL, '712853395p', '0716722232', 'No 45\r\nWedawalawwa  Dikwala Rd,', 1, 67, '2026-05-05 15:00:50', 1, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_area`
--

CREATE TABLE `tbl_employee_area` (
  `tbl_area_idtbl_area` int(11) NOT NULL,
  `tbl_employee_idtbl_employee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_has_tbl_dispatch`
--

CREATE TABLE `tbl_employee_has_tbl_dispatch` (
  `tbl_employee_idtbl_employee` int(11) NOT NULL,
  `tbl_dispatch_idtbl_dispatch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_target`
--

CREATE TABLE `tbl_employee_target` (
  `idtbl_employee_target` int(11) NOT NULL,
  `month` date NOT NULL,
  `targetqty` double NOT NULL,
  `targetqtycomplete` double NOT NULL,
  `targetvalue` double NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_employee_idtbl_employee` int(11) NOT NULL,
  `tbl_product_idtbl_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_target_details`
--

CREATE TABLE `tbl_employee_target_details` (
  `idtbl_employee_target_details` int(11) NOT NULL,
  `tbl_product_idtbl_product` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `current_value` int(11) NOT NULL,
  `target_status` int(11) NOT NULL,
  `tbl_employee_target_idtbl_employee_target` int(11) NOT NULL,
  `updatedatetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expences_type`
--

CREATE TABLE `tbl_expences_type` (
  `idtbl_expences_type` int(11) NOT NULL,
  `expencestype` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `updatedateime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expence_info`
--

CREATE TABLE `tbl_expence_info` (
  `idtbl_expence_info` int(11) NOT NULL,
  `exptype` int(11) DEFAULT NULL COMMENT '1-GRN, 2-Service, 3-Spare Part, 4-Other',
  `expcode` varchar(4) DEFAULT NULL COMMENT 'GRN, SER, SPR, OTH',
  `grnno` varchar(15) NOT NULL,
  `grndate` date NOT NULL,
  `amount` double NOT NULL,
  `invamount` double NOT NULL,
  `paystatus` int(11) NOT NULL,
  `poststatus` int(11) NOT NULL,
  `editstatus` int(11) NOT NULL,
  `remark` mediumtext NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_supplier_idtbl_supplier` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_finacial_month`
--

CREATE TABLE `tbl_finacial_month` (
  `idtbl_finacial_month` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `monthname` varchar(45) NOT NULL,
  `activestatus` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_finacial_year_idtbl_finacial_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_finacial_year`
--

CREATE TABLE `tbl_finacial_year` (
  `idtbl_finacial_year` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `desc` mediumtext NOT NULL,
  `actstatus` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gl_report_head_sections`
--

CREATE TABLE `tbl_gl_report_head_sections` (
  `id` int(11) NOT NULL,
  `report_id` varchar(3) NOT NULL,
  `head_section_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gl_report_sub_sections`
--

CREATE TABLE `tbl_gl_report_sub_sections` (
  `id` int(11) NOT NULL,
  `tbl_gl_report_head_section_id` int(11) NOT NULL,
  `sub_section_name` varchar(50) NOT NULL,
  `sect_cancel` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gl_report_sub_section_particulars`
--

CREATE TABLE `tbl_gl_report_sub_section_particulars` (
  `id` int(11) NOT NULL,
  `tbl_gl_report_sub_section_id` int(11) NOT NULL,
  `tbl_gl_report_head_section_id` int(11) NOT NULL,
  `idtbl_subaccount` int(11) NOT NULL,
  `subaccount` varchar(12) NOT NULL,
  `fig_seq_no` tinyint(4) NOT NULL DEFAULT 100 COMMENT 'reporting-order-of-figures',
  `value_ac_open_bal` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'consider-open-balance-of-account',
  `value_ac_cr_dr` tinyint(4) NOT NULL DEFAULT 0,
  `report_part_cancel` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grn`
--

CREATE TABLE `tbl_grn` (
  `idtbl_grn` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` double NOT NULL,
  `vatamount` double NOT NULL,
  `nettotal` double NOT NULL,
  `invoicenum` varchar(450) NOT NULL,
  `dispatchnum` varchar(450) NOT NULL,
  `batchno` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `confirm_status` int(11) NOT NULL DEFAULT 0,
  `transferstatus` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_porder_idtbl_porder` int(11) NOT NULL,
  `tbl_location_idtbl_location` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grndetail`
--

CREATE TABLE `tbl_grndetail` (
  `idtbl_grndetail` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` int(11) NOT NULL,
  `qty` double NOT NULL,
  `unitprice` double NOT NULL,
  `saleprice` double NOT NULL,
  `total` double NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_grn_idtbl_grn` int(11) NOT NULL,
  `tbl_product_idtbl_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_category`
--

CREATE TABLE `tbl_group_category` (
  `idtbl_group_category` int(11) NOT NULL,
  `category` varchar(450) NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_product_category_idtbl_product_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `idtbl_invoice` int(11) NOT NULL,
  `invoiceno` varchar(45) NOT NULL COMMENT 'IV/YY/MM/idtbl_invoice',
  `date` date NOT NULL,
  `total` double NOT NULL,
  `discount` double NOT NULL,
  `vatamount` double NOT NULL,
  `nettotal` double NOT NULL,
  `paymentcomplete` int(11) NOT NULL,
  `vat_status` int(11) NOT NULL DEFAULT 0,
  `vat_rate` int(11) NOT NULL DEFAULT 0,
  `cancelreason` mediumtext NOT NULL,
  `duedate` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_area_idtbl_area` int(11) NOT NULL,
  `tbl_customer_idtbl_customer` int(11) NOT NULL,
  `tbl_locations_idtbl_locations` int(11) NOT NULL,
  `tbl_customer_order_idtbl_customer_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_detail`
--

CREATE TABLE `tbl_invoice_detail` (
  `idtbl_invoice_detail` int(11) NOT NULL,
  `qty` double NOT NULL,
  `freeqty` int(11) NOT NULL DEFAULT 0,
  `unitprice` double NOT NULL,
  `saleprice` double NOT NULL,
  `discount` double NOT NULL,
  `total` double NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_product_idtbl_product` int(11) NOT NULL,
  `tbl_invoice_idtbl_invoice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_payment`
--

CREATE TABLE `tbl_invoice_payment` (
  `idtbl_invoice_payment` int(11) NOT NULL,
  `date` date NOT NULL,
  `payment` double NOT NULL,
  `balance` double NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_payment_detail`
--

CREATE TABLE `tbl_invoice_payment_detail` (
  `idtbl_invoice_payment_detail` int(11) NOT NULL,
  `method` int(11) NOT NULL,
  `amount` double NOT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `receiptno` varchar(100) DEFAULT NULL,
  `chequeno` varchar(100) DEFAULT NULL,
  `chequedate` date DEFAULT NULL,
  `creditnoteid` int(11) DEFAULT NULL,
  `addaccountstatus` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_bank_idtbl_bank` int(11) DEFAULT NULL,
  `tbl_invoice_payment_idtbl_invoice_payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_payment_has_tbl_invoice`
--

CREATE TABLE `tbl_invoice_payment_has_tbl_invoice` (
  `idtbl_invoice_payment_has_tbl_invoice` int(11) NOT NULL,
  `tbl_invoice_payment_idtbl_invoice_payment` int(11) NOT NULL,
  `tbl_invoice_idtbl_invoice` int(11) NOT NULL,
  `total` double NOT NULL,
  `discount` double NOT NULL,
  `payamount` double NOT NULL,
  `fullstatus` int(11) NOT NULL,
  `halfstatus` int(11) NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locations`
--

CREATE TABLE `tbl_locations` (
  `idtbl_locations` int(11) NOT NULL,
  `province` varchar(450) NOT NULL,
  `district` varchar(450) NOT NULL,
  `city` varchar(450) NOT NULL,
  `locationname` varchar(450) NOT NULL,
  `address` mediumtext NOT NULL,
  `contact1` varchar(30) NOT NULL,
  `contact2` varchar(30) NOT NULL,
  `contactperson` varchar(450) NOT NULL,
  `tbl_bank_idtbl_bank` int(11) NOT NULL,
  `accountowner` varchar(450) NOT NULL,
  `accountnumber` varchar(60) NOT NULL,
  `email` varchar(450) NOT NULL,
  `headperson` varchar(450) NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` date NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master`
--

CREATE TABLE `tbl_master` (
  `idtbl_master` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL,
  `tbl_finacial_year_idtbl_finacial_year` int(11) NOT NULL,
  `tbl_finacial_month_idtbl_finacial_month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material_category`
--

CREATE TABLE `tbl_material_category` (
  `idtbl_material_category` int(11) NOT NULL,
  `categoryname` varchar(45) NOT NULL,
  `categorycode` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_material_category`
--

INSERT INTO `tbl_material_category` (`idtbl_material_category`, `categoryname`, `categorycode`, `status`, `insertdatetime`, `updateuser`, `updatedatetime`, `tbl_user_idtbl_user`) VALUES
(1, 'Test Category 1', 'TST1', 1, '2026-06-03 12:28:01', 1, '2026-06-03 13:59:40', 1),
(2, 'Test Category 2', 'TST2', 1, '2026-06-08 10:26:40', NULL, NULL, 1),
(3, 'Spices', 'TST3', 1, '2026-06-08 14:16:15', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material_info`
--

CREATE TABLE `tbl_material_info` (
  `idtbl_material_info` int(11) NOT NULL,
  `materialname` varchar(45) NOT NULL,
  `materialinfocode` varchar(45) NOT NULL,
  `unitperctn` double NOT NULL,
  `reorderlevel` int(11) NOT NULL,
  `comment` mediumtext DEFAULT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_material_category_idtbl_material_category` int(11) NOT NULL,
  `tbl_unit_idtbl_unit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_material_info`
--

INSERT INTO `tbl_material_info` (`idtbl_material_info`, `materialname`, `materialinfocode`, `unitperctn`, `reorderlevel`, `comment`, `status`, `insertdatetime`, `updateuser`, `updatedatetime`, `tbl_user_idtbl_user`, `tbl_material_category_idtbl_material_category`, `tbl_unit_idtbl_unit`) VALUES
(1, 'Test Material Name', 'TSTM1', 150, 100, 'Test', 1, '2026-06-08 10:27:48', 1, '2026-06-08 10:31:09', 1, 1, 6),
(2, 'Ginger Powder', 'TSTM45', 150, 100, NULL, 1, '2026-06-08 14:19:26', NULL, NULL, 1, 3, 2),
(3, 'Chillie Powder', 'TSTM56', 150, 100, NULL, 1, '2026-06-08 14:20:00', NULL, NULL, 1, 3, 2),
(4, 'Pepper Powder', 'TSTM412', 150, 100, NULL, 1, '2026-06-08 14:20:34', NULL, NULL, 1, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material_stock`
--

CREATE TABLE `tbl_material_stock` (
  `idtbl_material_stock` int(11) NOT NULL,
  `batchno` varchar(45) NOT NULL COMMENT 'Ex Semi: SEMI20230118001, Ex Normal: Supcode+materialcode+202301190001',
  `qty` double NOT NULL,
  `unitprice` double NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_material_info_idtbl_material_info` int(11) NOT NULL,
  `tbl_location_idtbl_location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_material_stock`
--

INSERT INTO `tbl_material_stock` (`idtbl_material_stock`, `batchno`, `qty`, `unitprice`, `status`, `insertdatetime`, `updateuser`, `updatedatetime`, `tbl_user_idtbl_user`, `tbl_material_info_idtbl_material_info`, `tbl_location_idtbl_location`) VALUES
(1, 'MAT2026000001', 50, 120, 1, '2026-06-08 10:00:00', NULL, NULL, 1, 1, 1),
(2, 'MAT2026000002', 29.4995, 150, 1, '2026-06-08 10:05:00', 1, '2026-06-08 15:54:07', 1, 2, 1),
(3, 'MAT2026000003', 79.7998, 90, 1, '2026-06-08 10:10:00', 1, '2026-06-08 15:54:07', 1, 3, 2),
(4, 'MAT2026000004', 24.8999, 200, 1, '2026-06-08 10:15:00', 1, '2026-06-08 15:54:07', 1, 4, 2),
(5, 'MAT2026000005', 60, 75, 1, '2026-06-08 10:20:00', NULL, NULL, 1, 5, 1),
(6, 'MAT2026000006', 100, 50, 1, '2026-06-08 10:25:00', NULL, NULL, 1, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_list`
--

CREATE TABLE `tbl_menu_list` (
  `idtbl_menu_list` int(11) NOT NULL,
  `menu` varchar(4500) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=123 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_menu_list`
--

INSERT INTO `tbl_menu_list` (`idtbl_menu_list`, `menu`, `status`) VALUES
(1, 'User Privileges', 1),
(2, 'User Type', 1),
(3, 'User Account', 1),
(4, 'PRODUCTION ORDER', 1),
(5, 'PRODUCTION RECORDS', 1),
(6, 'PRODUCTION QUALITY', 1),
(7, 'FINISH GOOD BOM', 1),
(8, 'MATERIAL CATEGORY', 1),
(9, 'MATERIAL DETAIL', 1),
(10, 'UNIT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_original_customer_order`
--

CREATE TABLE `tbl_original_customer_order` (
  `idtbl_original_customer_order` int(11) NOT NULL,
  `cuspono` varchar(45) NOT NULL COMMENT 'CP/YY/MM/idtbl_original_customer_order',
  `date` date NOT NULL,
  `total` double NOT NULL,
  `discount` double NOT NULL,
  `podiscount` double NOT NULL,
  `podiscountpercentage` double NOT NULL,
  `vat` double NOT NULL,
  `nettotal` double NOT NULL,
  `confirm` int(11) DEFAULT NULL,
  `confrimuser` int(11) DEFAULT NULL,
  `dispatchissue` int(11) DEFAULT NULL,
  `dispatchuser` int(11) DEFAULT NULL,
  `ship` int(11) DEFAULT NULL,
  `shipuser` int(11) DEFAULT NULL,
  `delivered` int(11) DEFAULT NULL,
  `delivereduser` int(11) DEFAULT NULL,
  `return` int(11) DEFAULT NULL,
  `returnuser` int(11) DEFAULT NULL,
  `is_printed` int(11) DEFAULT 0,
  `remark` mediumtext DEFAULT NULL,
  `cancelreason` mediumtext DEFAULT NULL,
  `vatpre` double NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_area_idtbl_area` int(11) NOT NULL,
  `tbl_employee_idtbl_employee` int(11) NOT NULL,
  `tbl_locations_idtbl_locations` int(11) NOT NULL,
  `tbl_customer_idtbl_customer` int(11) NOT NULL,
  `tbl_customer_order_idtblcustomer_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_original_customer_order_detail`
--

CREATE TABLE `tbl_original_customer_order_detail` (
  `idtbl_original_customer_order_detail` int(11) NOT NULL,
  `orderqty` double NOT NULL,
  `confirmqty` double NOT NULL,
  `dispatchqty` double NOT NULL,
  `qty` double NOT NULL,
  `freeqty` int(11) NOT NULL DEFAULT 0,
  `unitprice` double NOT NULL,
  `saleprice` double NOT NULL,
  `discountpresent` double NOT NULL,
  `discount` double NOT NULL,
  `total` double NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_product_idtbl_product` int(11) NOT NULL,
  `tbl_original_customer_order_idtbl_original_customer_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_other_payincome`
--

CREATE TABLE `tbl_other_payincome` (
  `idtbl_other_payincome` int(11) NOT NULL,
  `date` date NOT NULL,
  `invreceno` int(11) NOT NULL,
  `amount` double NOT NULL,
  `glapply` int(11) NOT NULL,
  `supplier` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `narration` varchar(150) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packing_quality`
--

CREATE TABLE `tbl_packing_quality` (
  `idtbl_packing_quality` int(11) NOT NULL,
  `examined_quantity` double NOT NULL,
  `net_weight` double NOT NULL,
  `gross_weight` double NOT NULL,
  `moisture` varchar(45) NOT NULL,
  `color` varchar(45) NOT NULL,
  `taste` varchar(45) NOT NULL,
  `seal` int(11) NOT NULL,
  `water_leakages` varchar(45) NOT NULL,
  `statuspassfail` int(11) NOT NULL,
  `comments` mediumtext NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_production_order_idtbl_production_order` int(11) NOT NULL,
  `tbl_product_idtbl_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pettycash`
--

CREATE TABLE `tbl_pettycash` (
  `idtbl_pettycash` int(11) NOT NULL,
  `date` date NOT NULL,
  `pettycashcode` varchar(15) NOT NULL,
  `desc` mediumtext NOT NULL,
  `amount` double NOT NULL,
  `poststatus` int(11) NOT NULL,
  `postuser` int(11) DEFAULT NULL,
  `postviewtime` varchar(45) DEFAULT NULL,
  `reimbursestatus` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL,
  `tbl_account_idtbl_account` int(11) NOT NULL,
  `tbl_account_detail_idtbl_account_detail_exp` int(11) NOT NULL COMMENT 'expences detail account',
  `tbl_account_idtbl_account_exp` int(11) NOT NULL COMMENT 'expences account',
  `tbl_master_idtbl_master` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pettycash_account_balance`
--

CREATE TABLE `tbl_pettycash_account_balance` (
  `idtbl_pettycash_account_balance` int(11) NOT NULL,
  `balance` double NOT NULL,
  `tbl_account_petty_cash_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pettycash_expenses`
--

CREATE TABLE `tbl_pettycash_expenses` (
  `idtbl_pettycash_expenses` int(11) NOT NULL,
  `amount` double NOT NULL,
  `narration` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_account_petty_cash_account` int(11) NOT NULL,
  `tbl_account_expenses_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pettycash_reimburse`
--

CREATE TABLE `tbl_pettycash_reimburse` (
  `idtbl_pettycash_reimburse` int(11) NOT NULL,
  `date` date NOT NULL,
  `reimbursecode` varchar(15) NOT NULL,
  `openbal` double NOT NULL,
  `reimursebal` double NOT NULL,
  `closebal` double NOT NULL,
  `chequeno` varchar(7) DEFAULT NULL,
  `chequedate` date DEFAULT NULL,
  `printstatus` int(11) NOT NULL,
  `approvestatus` int(11) NOT NULL,
  `chequecreate` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_account_idtbl_account` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL,
  `tbl_cheque_issue_idtbl_cheque_issue` int(11) NOT NULL,
  `tbl_master_idtbl_master` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pettycash_reimburse_has_tbl_pettycash`
--

CREATE TABLE `tbl_pettycash_reimburse_has_tbl_pettycash` (
  `tbl_pettycash_reimburse_idtbl_pettycash_reimburse` int(11) NOT NULL,
  `tbl_pettycash_idtbl_pettycash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pettycash_summary`
--

CREATE TABLE `tbl_pettycash_summary` (
  `idtbl_pettycash_summary` int(11) NOT NULL,
  `date` date NOT NULL,
  `openbal` double NOT NULL,
  `postbal` double NOT NULL,
  `reimbal` double NOT NULL,
  `closebal` double NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_account_idtbl_account` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL,
  `tbl_master_idtbl_master` int(11) NOT NULL,
  `tbl_pettycash_reimburse_idtbl_pettycash_reimburse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_porder`
--

CREATE TABLE `tbl_porder` (
  `idtbl_porder` int(11) NOT NULL,
  `orderdate` date NOT NULL,
  `total` double NOT NULL,
  `vat` double NOT NULL,
  `nettotal` double NOT NULL,
  `vatpre` double NOT NULL,
  `remark` mediumtext NOT NULL,
  `completestatus` int(11) NOT NULL,
  `confirmstatus` int(11) NOT NULL,
  `grnissuestatus` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_supplier_idtbl_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_porder_detail`
--

CREATE TABLE `tbl_porder_detail` (
  `idtbl_porder_detail` int(11) NOT NULL,
  `qty` double NOT NULL,
  `unitprice` double NOT NULL,
  `saleprice` double NOT NULL,
  `total` double NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_product_idtbl_product` int(11) NOT NULL,
  `tbl_porder_idtbl_porder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `idtbl_product` int(11) NOT NULL,
  `product_code` varchar(450) NOT NULL,
  `barcode` int(11) NOT NULL,
  `product_name` varchar(4500) NOT NULL,
  `common_name` varchar(50) NOT NULL,
  `size` varchar(45) NOT NULL,
  `unitprice` double NOT NULL,
  `saleprice` double NOT NULL,
  `dollarrate` float NOT NULL DEFAULT 0,
  `rol` int(11) NOT NULL,
  `pices_per_box` int(11) NOT NULL,
  `retail` double NOT NULL,
  `salediscount` int(11) NOT NULL,
  `retaildiscount` int(11) NOT NULL,
  `price_acceptable` int(11) NOT NULL COMMENT '1 = unit price acceptable, 2 = precentage acceptable	',
  `additional_discount` int(11) NOT NULL,
  `starpoints` int(11) NOT NULL,
  `uom` int(11) NOT NULL DEFAULT 1,
  `productimagepath` mediumtext NOT NULL,
  `buying_qty` int(11) DEFAULT NULL,
  `free_qty` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_product_category_idtbl_product_category` int(11) NOT NULL,
  `tbl_group_category_idtbl_group_category` int(11) NOT NULL,
  `tbl_sub_product_category_idtbl_sub_product_category` int(11) NOT NULL,
  `tbl_supplier_idtbl_supplier` int(11) NOT NULL,
  `tbl_sizes_idtbl_sizes` int(11) NOT NULL,
  `tbl_size_categories_idtbl_size_categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`idtbl_product`, `product_code`, `barcode`, `product_name`, `common_name`, `size`, `unitprice`, `saleprice`, `dollarrate`, `rol`, `pices_per_box`, `retail`, `salediscount`, `retaildiscount`, `price_acceptable`, `additional_discount`, `starpoints`, `uom`, `productimagepath`, `buying_qty`, `free_qty`, `status`, `updatedatetime`, `tbl_user_idtbl_user`, `tbl_product_category_idtbl_product_category`, `tbl_group_category_idtbl_group_category`, `tbl_sub_product_category_idtbl_sub_product_category`, `tbl_supplier_idtbl_supplier`, `tbl_sizes_idtbl_sizes`, `tbl_size_categories_idtbl_size_categories`) VALUES
(1, 'PRD001', 2147483647, 'Coca Cola', 'Soft Drink', '500ml', 180, 220, 300, 15, 24, 230, 5, 3, 1, 2, 20, 0, 'uploads/products/cocacola.jpg', 10, 1, 1, '2026-05-25 12:43:38', 1, 1, 1, 1, 1, 1, 1),
(2, 'PRD002', 2147483647, 'Sprite', 'Soft Drink', '500ml', 175, 215, 300, 15, 24, 225, 5, 3, 1, 2, 20, 0, 'uploads/products/sprite.jpg', 10, 1, 1, '2026-05-25 12:43:38', 1, 1, 1, 1, 1, 1, 1),
(3, 'PRD003', 2147483647, 'Fanta Orange', 'Soft Drink', '500ml', 170, 210, 300, 20, 24, 220, 4, 2, 1, 2, 15, 0, 'uploads/products/fanta.jpg', 12, 2, 1, '2026-05-25 12:43:38', 1, 1, 1, 1, 1, 1, 1),
(4, 'PRD004', 2147483647, 'Anchor Milk Powder', 'Milk Powder', '400g', 1150, 1250, 300, 8, 12, 1300, 6, 4, 1, 3, 40, 0, 'uploads/products/anchor.jpg', 5, 1, 1, '2026-05-25 12:43:38', 1, 2, 1, 1, 1, 1, 1),
(5, 'PRD005', 2147483647, 'Sunlight Soap', 'Soap', '120g', 90, 120, 300, 30, 72, 125, 3, 2, 1, 1, 10, 0, 'uploads/products/sunlight.jpg', 20, 3, 1, '2026-05-25 12:43:38', 1, 3, 1, 1, 1, 1, 1),
(6, 'PRD006', 456784542, 'Curry Powder', 'CRP', '1', 325, 385, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', 100, 120, 1, '2026-06-08 10:44:39', 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production_daily_complete`
--

CREATE TABLE `tbl_production_daily_complete` (
  `idtbl_production_daily_complete` int(11) NOT NULL,
  `comdate` date NOT NULL,
  `qty` double NOT NULL,
  `damageqty` double NOT NULL,
  `checkstatus` int(11) DEFAULT NULL,
  `checkperson` int(11) DEFAULT NULL,
  `mfdate` date DEFAULT NULL,
  `expdate` date DEFAULT NULL,
  `batchno` varchar(45) DEFAULT NULL,
  `unitprice` double NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_production_order_idtbl_production_order` int(11) NOT NULL,
  `tbl_product_idtbl_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production_material_issue`
--

CREATE TABLE `tbl_production_material_issue` (
  `idtbl_production_material_issue` int(11) NOT NULL,
  `qty` double NOT NULL,
  `batchno` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_production_order_idtbl_production_order` int(11) NOT NULL,
  `tbl_product_idtbl_product` int(11) NOT NULL,
  `tbl_material_info_idtbl_material_info` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_production_material_issue`
--

INSERT INTO `tbl_production_material_issue` (`idtbl_production_material_issue`, `qty`, `batchno`, `status`, `insertdatetime`, `updateuser`, `updatedatetime`, `tbl_user_idtbl_user`, `tbl_production_order_idtbl_production_order`, `tbl_product_idtbl_product`, `tbl_material_info_idtbl_material_info`) VALUES
(1, 0.5005, 'MAT2026000002', 1, '2026-06-08 15:54:07', NULL, NULL, 1, 9, 6, 2),
(2, 0.2002, 'MAT2026000003', 1, '2026-06-08 15:54:07', NULL, NULL, 1, 9, 6, 3),
(3, 0.1001, 'MAT2026000004', 1, '2026-06-08 15:54:07', NULL, NULL, 1, 9, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production_order`
--

CREATE TABLE `tbl_production_order` (
  `idtbl_production_order` int(11) NOT NULL,
  `prodate` date NOT NULL,
  `procode` int(11) NOT NULL,
  `prostartdate` date DEFAULT NULL,
  `proenddate` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_customer_order_idtbl_customer_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_production_order`
--

INSERT INTO `tbl_production_order` (`idtbl_production_order`, `prodate`, `procode`, `prostartdate`, `proenddate`, `status`, `insertdatetime`, `updateuser`, `updatedatetime`, `tbl_user_idtbl_user`, `tbl_customer_order_idtbl_customer_order`) VALUES
(1, '2026-05-25', 1, '2026-05-26', '2026-05-27', 1, '2026-05-25 13:48:27', NULL, NULL, 1, 1),
(2, '2026-05-25', 2, '2026-05-27', '2026-05-28', 1, '2026-05-25 13:59:55', NULL, NULL, 1, 1),
(3, '2026-06-08', 3, '2026-06-09', '2026-06-10', 1, '2026-06-08 14:33:43', NULL, NULL, 1, 2),
(4, '2026-06-08', 4, '2026-06-09', '2026-06-09', 1, '2026-06-08 14:42:22', NULL, NULL, 1, 1),
(5, '2026-06-08', 5, '2026-06-09', '2026-06-01', 1, '2026-06-08 14:42:48', NULL, NULL, 1, 1),
(6, '2026-06-08', 6, '2026-06-10', '2026-06-10', 1, '2026-06-08 14:48:34', NULL, NULL, 1, 1),
(7, '2026-06-08', 7, '2026-06-12', '2026-06-12', 1, '2026-06-08 14:50:50', NULL, NULL, 1, 1),
(8, '2026-06-08', 8, '2026-06-17', '2026-06-17', 1, '2026-06-08 14:55:23', NULL, NULL, 1, 2),
(9, '2026-06-08', 9, '2026-06-17', '2026-06-17', 1, '2026-06-08 15:35:30', NULL, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production_orderdetail`
--

CREATE TABLE `tbl_production_orderdetail` (
  `idtbl_production_orderdetail` int(11) NOT NULL,
  `qty` double NOT NULL,
  `issueqty` double NOT NULL,
  `unitprice` double NOT NULL,
  `total` double NOT NULL,
  `materialissue` int(11) NOT NULL,
  `partialissued` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_production_order_idtbl_production_order` int(11) NOT NULL,
  `tbl_product_idtbl_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_production_orderdetail`
--

INSERT INTO `tbl_production_orderdetail` (`idtbl_production_orderdetail`, `qty`, `issueqty`, `unitprice`, `total`, `materialissue`, `partialissued`, `status`, `insertdatetime`, `updateuser`, `updatedatetime`, `tbl_user_idtbl_user`, `tbl_production_order_idtbl_production_order`, `tbl_product_idtbl_product`) VALUES
(1, 1, 0, 1000, 1000, 0, 0, 1, '2026-05-25 13:48:27', NULL, NULL, 1, 1, 1),
(2, 1, 0, 1000, 1000, 0, 0, 1, '2026-05-25 13:59:55', NULL, NULL, 1, 2, 1),
(3, 2, 0, 800, 1600, 0, 0, 1, '2026-06-08 14:33:43', NULL, NULL, 1, 3, 3),
(4, 1, 0, 1500, 1500, 0, 0, 1, '2026-06-08 14:42:22', NULL, NULL, 1, 4, 5),
(5, 1, 0, 1000, 1000, 0, 0, 1, '2026-06-08 14:42:48', NULL, NULL, 1, 5, 1),
(6, 1, 0, 1500, 1500, 0, 0, 1, '2026-06-08 14:48:34', 1, '2026-06-08 16:37:43', 1, 6, 5),
(7, 1, 0, 1200, 1200, 0, 0, 1, '2026-06-08 14:50:50', NULL, NULL, 1, 7, 2),
(8, 2, 0, 800, 1600, 0, 0, 1, '2026-06-08 14:55:23', NULL, NULL, 1, 8, 3),
(9, 3, 1, 500, 1500, 0, 1, 1, '2026-06-08 15:35:30', 1, '2026-06-08 15:54:07', 1, 9, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production_quality`
--

CREATE TABLE `tbl_production_quality` (
  `idtbl_production_quality` int(11) NOT NULL,
  `examined_quantity` double NOT NULL,
  `washing_temperature` double NOT NULL,
  `washing_time` varchar(45) DEFAULT NULL,
  `drying_temperature` double NOT NULL,
  `drying_time` varchar(45) DEFAULT NULL,
  `aftrer_drying_moisture` double NOT NULL,
  `drying_cooling_time` varchar(45) DEFAULT NULL,
  `cut_size` varchar(45) NOT NULL,
  `cutting_wastage` double NOT NULL,
  `moisture_after_grinding` varchar(45) NOT NULL,
  `roasting_temperature` varchar(45) NOT NULL,
  `roasting_color` varchar(45) NOT NULL,
  `roasting_time` varchar(45) DEFAULT NULL,
  `cooling_moisture` varchar(45) NOT NULL,
  `cooling_time` varchar(45) DEFAULT NULL,
  `magnet_verification` int(11) NOT NULL,
  `comments` mediumtext NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_semi_production_idtbl_semi_production` int(11) NOT NULL,
  `tbl_material_info_idtbl_material_info` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production_quality_machinelist`
--

CREATE TABLE `tbl_production_quality_machinelist` (
  `idtbl_production_quality_machinelist` int(11) NOT NULL,
  `mesh_size` varchar(250) DEFAULT NULL,
  `wastage` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `insertdatetime` datetime DEFAULT NULL,
  `tbl_production_quality_idtbl_production_quality` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_machine_idtbl_machine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products_update_log`
--

CREATE TABLE `tbl_products_update_log` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `action_type` enum('UPDATE','DELETE') NOT NULL,
  `old_unit_price` decimal(10,2) DEFAULT NULL,
  `old_sale_price` decimal(10,2) DEFAULT NULL,
  `new_unit_price` decimal(10,2) DEFAULT NULL,
  `new_sale_price` decimal(10,2) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_bom`
--

CREATE TABLE `tbl_product_bom` (
  `idtbl_product_bom` int(11) NOT NULL,
  `qty` double NOT NULL,
  `wastage` double NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_product_idtbl_product` int(11) NOT NULL,
  `tbl_material_info_idtbl_material_info` int(11) NOT NULL,
  `tbl_product_bom_info_idtbl_product_bom_info` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_product_bom`
--

INSERT INTO `tbl_product_bom` (`idtbl_product_bom`, `qty`, `wastage`, `status`, `insertdatetime`, `updateuser`, `updatedatetime`, `tbl_user_idtbl_user`, `tbl_product_idtbl_product`, `tbl_material_info_idtbl_material_info`, `tbl_product_bom_info_idtbl_product_bom_info`) VALUES
(7, 0.5, 0.1, 1, '2026-06-08 14:25:08', NULL, NULL, 1, 6, 2, 1),
(8, 0.2, 0.1, 1, '2026-06-08 14:25:08', NULL, NULL, 1, 6, 3, 1),
(9, 0.1, 0.1, 1, '2026-06-08 14:25:08', NULL, NULL, 1, 6, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_bom_info`
--

CREATE TABLE `tbl_product_bom_info` (
  `idtbl_product_bom_info` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_product_bom_info`
--

INSERT INTO `tbl_product_bom_info` (`idtbl_product_bom_info`, `title`, `status`, `insertdatetime`, `updateuser`, `updatedatetime`, `tbl_user_idtbl_user`) VALUES
(1, 'Curry Powder', 1, '2026-06-08 14:22:17', 1, '2026-06-08 14:25:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

CREATE TABLE `tbl_product_category` (
  `idtbl_product_category` int(11) NOT NULL,
  `category` varchar(450) NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_free_issue`
--

CREATE TABLE `tbl_product_free_issue` (
  `tbl_product_free_issue_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `buy_quantity` int(11) NOT NULL DEFAULT 0,
  `free_quantity` int(11) NOT NULL DEFAULT 0,
  `start_date` varchar(5) NOT NULL,
  `end_date` varchar(5) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_image`
--

CREATE TABLE `tbl_product_image` (
  `idtbl_product_image` int(11) NOT NULL,
  `imagepath` longtext DEFAULT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_userid` int(11) NOT NULL,
  `tbl_catalog_idtbl_catalog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_province`
--

CREATE TABLE `tbl_province` (
  `idtbl_province` int(10) UNSIGNED NOT NULL,
  `province_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=1820 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_province`
--

INSERT INTO `tbl_province` (`idtbl_province`, `province_name`) VALUES
(1, 'Western'),
(2, 'Central'),
(3, 'Southern'),
(4, 'Northern'),
(5, 'Eastern'),
(6, 'North Western'),
(7, 'North Central'),
(8, 'Uva'),
(9, 'Sabaragamuwa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receivable`
--

CREATE TABLE `tbl_receivable` (
  `idtbl_receivable` int(11) NOT NULL,
  `recdate` date DEFAULT NULL,
  `batchno` varchar(15) NOT NULL,
  `payer` int(11) NOT NULL,
  `amount` double NOT NULL,
  `narration` varchar(150) DEFAULT NULL,
  `chequedate` date DEFAULT NULL,
  `chequeno` varchar(15) DEFAULT NULL,
  `depositstatus` int(11) NOT NULL,
  `chequereturn` int(11) NOT NULL DEFAULT 0,
  `poststatus` int(11) DEFAULT NULL,
  `postuser` int(11) DEFAULT NULL,
  `postviewtime` datetime DEFAULT NULL,
  `editstatus` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_receivable_type_idtbl_receivable_type` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL,
  `tbl_master_idtbl_master` int(11) NOT NULL,
  `tbl_account_idtbl_account` int(11) NOT NULL,
  `tbl_account_detail_idtbl_account_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receivable_info`
--

CREATE TABLE `tbl_receivable_info` (
  `idtbl_receivable_info` int(11) NOT NULL,
  `invoiceno` int(11) NOT NULL,
  `narration` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_receivable_idtbl_receivable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receivable_type`
--

CREATE TABLE `tbl_receivable_type` (
  `idtbl_receivable_type` int(11) NOT NULL,
  `receivabletype` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_return`
--

CREATE TABLE `tbl_return` (
  `idtbl_return` int(11) NOT NULL,
  `returntype` int(11) NOT NULL,
  `has_invoice` int(11) NOT NULL DEFAULT 1 COMMENT '0 = No Invoice, 1 = Have Invoice',
  `returndate` date NOT NULL,
  `status` int(11) NOT NULL,
  `total` double NOT NULL,
  `reason_type` int(11) NOT NULL DEFAULT 0,
  `damaged_reason` mediumtext DEFAULT NULL,
  `qtystatus` int(11) NOT NULL DEFAULT 0,
  `acceptance_status` int(11) NOT NULL,
  `recieved_status` int(11) NOT NULL DEFAULT 0,
  `credit_note` int(11) NOT NULL,
  `credit_note_issue` int(11) NOT NULL,
  `updatedatetime` date NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_customer_idtbl_customer` int(11) NOT NULL,
  `tbl_employee_idtbl_employee` int(11) NOT NULL,
  `tbl_invoice_idtbl_invoice` int(11) NOT NULL,
  `tbl_locations_idtbl_locations` int(11) DEFAULT NULL,
  `tbl_supplier_idtbl_supplier` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_return_details`
--

CREATE TABLE `tbl_return_details` (
  `idtbl_return_details` int(11) NOT NULL,
  `unitprice` double NOT NULL,
  `qty` int(11) NOT NULL,
  `actualqty` int(11) NOT NULL DEFAULT -2,
  `discount` int(11) NOT NULL,
  `total` double NOT NULL,
  `updatedatetime` date NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_return_idtbl_return` int(11) NOT NULL,
  `tbl_product_idtbl_product` int(11) NOT NULL,
  `tbl_invoice_idtbl_invoice` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_routes`
--

CREATE TABLE `tbl_routes` (
  `idtbl_routes` int(10) UNSIGNED NOT NULL,
  `routename` longtext NOT NULL,
  `routecode` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_info`
--

CREATE TABLE `tbl_sales_info` (
  `idtbl_sales_info` int(11) NOT NULL,
  `saletype` int(11) DEFAULT NULL COMMENT '1-INVOICE, 2-Other',
  `salecode` varchar(4) DEFAULT NULL COMMENT 'INV, OTH',
  `invno` varchar(15) NOT NULL,
  `invdate` date NOT NULL,
  `amount` double NOT NULL,
  `invamount` double NOT NULL,
  `paystatus` int(11) NOT NULL,
  `poststatus` int(11) NOT NULL,
  `editstatus` int(11) NOT NULL,
  `remark` mediumtext NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_customer_idtbl_customer` int(11) NOT NULL,
  `tbl_company_idtbl_company` int(11) NOT NULL,
  `tbl_company_branch_idtbl_company_branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_manager`
--

CREATE TABLE `tbl_sales_manager` (
  `idtbl_sales_manager` int(11) NOT NULL,
  `salesmanagername` varchar(50) NOT NULL,
  `contactone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` mediumtext NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `insertuser` int(11) NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=16384 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_sales_manager`
--

INSERT INTO `tbl_sales_manager` (`idtbl_sales_manager`, `salesmanagername`, `contactone`, `email`, `address`, `status`, `insertdatetime`, `updatedatetime`, `tbl_user_idtbl_user`, `insertuser`) VALUES
(1, 'Harujan', '1234564532', 'kamalsooriyaracchi+2@gmail.com', '64/7 kukan nagar 7th lane vepankulam', 1, '2026-05-05 15:00:12', '2026-05-05 15:00:12', 66, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sizes`
--

CREATE TABLE `tbl_sizes` (
  `idtbl_sizes` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sequence` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_size_categories_idtbl_size_categories` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size_categories`
--

CREATE TABLE `tbl_size_categories` (
  `idtbl_size_categories` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `idtbl_stock` int(11) NOT NULL,
  `batchqty` int(11) NOT NULL,
  `qty` double NOT NULL,
  `unitprice` double NOT NULL DEFAULT 0,
  `saleprice` double NOT NULL DEFAULT 0,
  `update` date NOT NULL,
  `status` int(11) NOT NULL,
  `batchno` varchar(200) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `insertdatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_product_idtbl_product` int(11) NOT NULL,
  `tbl_location_idtbl_location` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock_adjustment`
--

CREATE TABLE `tbl_stock_adjustment` (
  `idtbl_stock_adjustment` int(11) NOT NULL,
  `adjustmenttype` int(11) NOT NULL COMMENT '1 - Add stock, 2 - Deduct stock',
  `adjustqty` double NOT NULL,
  `remarks` mediumtext NOT NULL,
  `batchnumbers` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_product_idtbl_product` int(11) NOT NULL,
  `tbl_location_idtbl_location` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_product_category`
--

CREATE TABLE `tbl_sub_product_category` (
  `idtbl_sub_product_category` int(11) NOT NULL,
  `category` varchar(450) NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_product_category_idtbl_product_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `idtbl_supplier` int(11) NOT NULL,
  `suppliername` varchar(450) NOT NULL,
  `supcode` int(11) DEFAULT NULL,
  `contactone` int(11) NOT NULL,
  `contacttwo` int(11) NOT NULL,
  `email` varchar(450) NOT NULL,
  `address` varchar(450) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tax`
--

CREATE TABLE `tbl_tax` (
  `id` int(11) NOT NULL,
  `rate` float NOT NULL,
  `date_from` date DEFAULT NULL,
  `nbt` decimal(10,2) DEFAULT NULL,
  `s_vat` decimal(10,2) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `insertdatetime` datetime DEFAULT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `idtbl_unit` int(11) NOT NULL,
  `unitname` varchar(45) NOT NULL,
  `unitcode` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`idtbl_unit`, `unitname`, `unitcode`, `status`, `insertdatetime`, `updateuser`, `updatedatetime`, `tbl_user_idtbl_user`) VALUES
(1, 'Kilo Gram', 'UNT1', 1, '2026-06-03 14:43:54', 1, '2026-06-08 10:06:39', 1),
(2, 'Gram', 'UNT2', 1, '2026-06-03 14:59:15', 1, '2026-06-03 14:59:42', 1),
(3, 'Litre', 'UNT3', 1, '2026-06-03 15:02:20', NULL, NULL, 1),
(4, 'Pieces', 'UNT4', 1, '2026-06-03 15:03:32', NULL, NULL, 1),
(5, 'Reems', 'UNT5', 3, '2026-06-03 15:06:36', 1, '2026-06-03 15:07:30', 1),
(6, 'Test Unit', 'UNT6', 1, '2026-06-08 10:12:05', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upgrade_dipreciation`
--

CREATE TABLE `tbl_upgrade_dipreciation` (
  `idtbl_upgrade_dipreciation` int(11) NOT NULL,
  `upgrade_item` varchar(255) NOT NULL,
  `upgrade_part` varchar(255) NOT NULL,
  `upgrade_amount` decimal(10,2) NOT NULL,
  `upgrade_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `expire_date` date NOT NULL,
  `editstatus` int(11) NOT NULL,
  `poststatus` int(11) DEFAULT NULL,
  `postuser` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_asset_idtbl_asset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `idtbl_user` int(11) NOT NULL,
  `name` varchar(4500) NOT NULL,
  `username` varchar(4500) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` mediumtext NOT NULL,
  `imagepath` mediumtext DEFAULT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_type_idtbl_user_type` int(11) NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=5461 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`idtbl_user`, `name`, `username`, `email`, `password`, `imagepath`, `status`, `updatedatetime`, `tbl_user_type_idtbl_user_type`) VALUES
(1, 'Super Administrator', 'admin', NULL, '$2y$10$zKofXX0iT.tl2nFbryI4s.KU3LTSPqqce19TP6.R9asWJcntjqHyi', '', 1, '2026-05-05 14:33:42', 1),
(2, 'Administrator', 'ml-admin', NULL, '$2y$12$Dp4tq9lq.4IQJbOodKINr.atucfuZNaDHeoPirVM84l1vsdRiF/0y', '', 1, '2026-05-05 14:36:05', 2),
(66, 'test', 'test', 'test@gmail.com', '$2y$12$s2/yt3LcoUc/t1xq4WX9T.7SG.DJn0RdDjmQQlVyUdgyPMMNj5wc2', NULL, 1, '2026-05-03 01:30:54', 13),
(67, 'kamal sooriyarachchi', 'kamal', 'thisaratharindaciscoitn@gmail.com', '$2y$12$ti4QOF/t0rarvL6cvUXbfO78/JlLMyf7EY5A2AfgX6foXkQjmcdfO', NULL, 1, '2026-05-05 14:58:34', 7),
(68, 'Sadeesha Chathura', 'sadeesha', 'sadeeshachathura@gmail.com', '$2y$12$YycpWe6KX5XqgCOi2l0bheDL./e1YcbQAYHfOr5WXaLpLSrLL13ti', NULL, 1, '2026-05-12 14:33:04', 2),
(69, 'Test User', 'test12345', 'test123@gmail.com', '$2y$12$w1O0bPuUTa6UjHI9TM7KlumeFZ9CYOuyYRDYcug3STM/cUyzQp3.O', NULL, 1, '2026-06-08 10:09:49', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_logindata`
--

CREATE TABLE `tbl_user_logindata` (
  `idtbl_user_logindata` int(11) NOT NULL,
  `lorryid` int(11) NOT NULL,
  `deviceid` varchar(50) NOT NULL,
  `logindate` date NOT NULL,
  `logintime` time NOT NULL,
  `logoutstatus` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_privilege`
--

CREATE TABLE `tbl_user_privilege` (
  `idtbl_user_privilege` int(11) NOT NULL,
  `add` int(11) NOT NULL,
  `edit` int(11) NOT NULL,
  `statuschange` int(11) NOT NULL,
  `remove` int(11) NOT NULL,
  `access_status` int(11) NOT NULL,
  `approvestatus` int(11) NOT NULL,
  `checkstatus` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_menu_list_idtbl_menu_list` int(11) NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=191 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user_privilege`
--

INSERT INTO `tbl_user_privilege` (`idtbl_user_privilege`, `add`, `edit`, `statuschange`, `remove`, `access_status`, `approvestatus`, `checkstatus`, `status`, `updatedatetime`, `tbl_user_idtbl_user`, `tbl_menu_list_idtbl_menu_list`) VALUES
(1, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 22:44:24', 1, 1),
(2, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 2),
(3, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 3),
(4, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 4),
(5, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 5),
(6, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 6),
(7, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 7),
(8, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 8),
(9, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 9),
(10, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 10),
(11, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 11),
(12, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 12),
(13, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 13),
(14, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 14),
(15, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 15),
(16, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 16),
(17, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 17),
(18, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 18),
(19, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 19),
(20, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 21),
(21, 0, 0, 0, 0, 1, 0, 0, 1, '2024-09-02 12:56:54', 1, 22),
(22, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 23),
(23, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 24),
(24, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 25),
(25, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 26),
(26, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 27),
(27, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 28),
(28, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 31),
(29, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 32),
(30, 1, 1, 1, 1, 1, 0, 0, 1, '2024-07-26 10:46:54', 1, 40),
(31, 1, 1, 1, 1, 1, 0, 0, 1, '2024-08-18 12:15:21', 1, 48),
(32, 1, 1, 1, 1, 1, 0, 0, 1, '2024-08-18 12:16:53', 1, 47),
(33, 1, 1, 1, 1, 1, 0, 0, 1, '2024-08-20 09:45:31', 1, 33),
(34, 1, 1, 1, 1, 1, 0, 0, 1, '2024-08-20 09:45:31', 1, 34),
(35, 1, 1, 1, 1, 1, 0, 0, 1, '2024-08-20 09:45:31', 1, 35),
(36, 1, 1, 1, 1, 1, 0, 0, 1, '2024-08-20 09:45:31', 1, 36),
(37, 1, 1, 1, 1, 1, 0, 0, 1, '2024-08-20 09:45:31', 1, 37),
(38, 1, 1, 1, 1, 1, 0, 0, 1, '2024-08-20 09:45:31', 1, 38),
(39, 1, 1, 1, 1, 1, 0, 0, 1, '2024-08-20 09:45:31', 1, 39),
(40, 1, 1, 1, 1, 1, 0, 0, 1, '2024-08-20 09:45:31', 1, 40),
(41, 1, 1, 1, 1, 1, 0, 0, 1, '2024-08-20 09:45:31', 1, 41),
(42, 1, 1, 1, 1, 1, 0, 0, 1, '2024-08-20 09:45:31', 1, 42),
(43, 1, 1, 1, 1, 1, 0, 0, 1, '2024-08-20 09:45:31', 1, 43),
(44, 1, 1, 1, 1, 1, 0, 0, 1, '2024-08-20 09:45:31', 1, 44),
(45, 1, 1, 1, 1, 1, 0, 0, 1, '2024-08-20 09:45:31', 1, 45),
(46, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 05:58:13', 27, 7),
(47, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 10:46:29', 27, 8),
(48, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 10:46:37', 27, 18),
(49, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 10:46:53', 27, 25),
(50, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 10:47:01', 27, 24),
(51, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 10:47:09', 27, 26),
(52, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 10:47:20', 27, 23),
(53, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 10:47:35', 27, 19),
(54, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 10:47:43', 27, 48),
(55, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 10:47:51', 27, 33),
(56, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 10:47:59', 27, 34),
(57, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 10:48:11', 27, 35),
(58, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 10:48:20', 27, 21),
(59, 1, 0, 1, 0, 1, 0, 0, 3, '2024-09-07 07:53:11', 27, 39),
(60, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 05:52:22', 20, 7),
(61, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 05:31:17', 20, 8),
(62, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 10:49:43', 20, 18),
(63, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 11:23:27', 20, 25),
(64, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 11:23:39', 20, 24),
(65, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 04:18:18', 20, 33),
(66, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 04:18:18', 20, 34),
(67, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 04:23:12', 29, 18),
(68, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 04:23:12', 29, 19),
(69, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 04:23:12', 29, 23),
(70, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 04:23:12', 29, 24),
(71, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 04:23:12', 29, 25),
(72, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 04:23:12', 29, 26),
(73, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 04:25:47', 29, 33),
(74, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 04:25:47', 29, 34),
(75, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 04:25:47', 29, 35),
(76, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 04:25:47', 29, 48),
(77, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 05:39:54', 21, 7),
(78, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 04:33:44', 21, 18),
(79, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 05:38:29', 21, 24),
(80, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 05:38:37', 28, 7),
(81, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 04:35:20', 28, 18),
(82, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 04:35:20', 28, 41),
(83, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 04:35:20', 28, 42),
(84, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 04:35:20', 28, 43),
(85, 1, 0, 0, 0, 1, 0, 0, 1, '2024-09-09 04:35:20', 28, 45),
(86, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 04:36:15', 29, 8),
(87, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 04:37:30', 28, 8),
(88, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 05:26:32', 21, 8),
(89, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-09 05:53:46', 29, 7),
(90, 1, 1, 1, 0, 1, 0, 0, 1, '2024-09-09 06:12:09', 20, 28),
(91, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-11 05:32:34', 27, 28),
(92, 1, 1, 1, 1, 1, 0, 0, 1, '2024-09-20 11:35:28', 1, 49),
(93, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-25 04:44:24', 20, 9),
(94, 1, 1, 0, 0, 1, 0, 0, 2, '2024-09-25 05:01:10', 20, 10),
(95, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-25 05:01:42', 20, 11),
(96, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-25 05:07:32', 20, 12),
(97, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-25 05:26:44', 27, 9),
(98, 1, 1, 0, 0, 1, 0, 0, 3, '2025-02-06 12:05:21', 29, 6),
(99, 1, 1, 0, 0, 1, 0, 0, 1, '2024-09-25 05:39:32', 29, 9),
(100, 1, 1, 0, 0, 1, 0, 0, 1, '2024-10-02 06:37:23', 21, 9),
(101, 1, 1, 0, 0, 1, 0, 0, 3, '2025-02-06 12:03:16', 29, 5),
(102, 1, 1, 1, 1, 1, 0, 0, 1, '2024-12-28 08:38:27', 1, 50),
(103, 1, 1, 1, 1, 1, 0, 0, 1, '2025-01-02 10:14:25', 1, 51),
(104, 1, 1, 1, 1, 1, 0, 0, 1, '2025-01-02 10:14:25', 1, 52),
(105, 1, 1, 1, 1, 1, 0, 0, 1, '2025-01-02 10:14:25', 1, 53),
(106, 1, 1, 1, 0, 1, 0, 0, 1, '2025-01-07 12:02:21', 29, 17),
(107, 1, 1, 1, 0, 1, 0, 0, 1, '2025-01-07 12:03:05', 29, 52),
(108, 1, 1, 1, 0, 1, 0, 0, 1, '2025-01-07 12:03:37', 29, 53),
(109, 1, 1, 1, 1, 1, 0, 0, 1, '2025-02-11 04:35:34', 20, 17),
(110, 1, 1, 1, 0, 1, 0, 0, 1, '2025-02-03 12:59:06', 20, 51),
(111, 1, 1, 1, 0, 1, 0, 0, 1, '2025-02-03 12:59:27', 20, 52),
(112, 1, 1, 1, 0, 1, 0, 0, 1, '2025-02-03 12:59:53', 20, 18),
(113, 1, 1, 1, 0, 1, 0, 0, 1, '2025-02-03 01:00:21', 20, 23),
(114, 1, 1, 1, 0, 1, 0, 0, 1, '2025-02-03 01:01:01', 20, 24),
(115, 1, 1, 1, 0, 1, 0, 0, 1, '2025-02-03 01:01:17', 20, 26),
(116, 1, 1, 1, 0, 1, 0, 0, 1, '2025-02-07 09:38:18', 29, 51),
(117, 1, 0, 0, 0, 1, 0, 0, 1, '2025-02-07 05:56:54', 19, 39),
(118, 1, 0, 0, 0, 1, 0, 0, 1, '2025-02-07 05:57:34', 19, 31),
(119, 1, 0, 0, 0, 1, 0, 0, 1, '2025-02-07 05:57:54', 19, 33),
(120, 1, 0, 0, 0, 1, 0, 0, 1, '2025-02-07 05:58:29', 19, 36),
(121, 1, 0, 0, 0, 1, 0, 0, 1, '2025-02-07 05:59:32', 19, 18),
(122, 1, 0, 0, 0, 1, 0, 0, 1, '2025-02-07 05:59:48', 19, 19),
(123, 1, 0, 0, 0, 1, 0, 0, 1, '2025-02-07 06:00:08', 19, 9),
(124, 1, 0, 0, 0, 1, 0, 0, 1, '2025-02-07 06:01:05', 19, 15),
(125, 1, 0, 0, 0, 1, 0, 0, 1, '2025-02-07 06:01:17', 19, 7),
(126, 1, 0, 0, 0, 1, 0, 0, 3, '2025-02-07 06:10:40', 19, 17),
(127, 1, 0, 0, 0, 1, 0, 0, 1, '2025-02-07 06:11:07', 19, 53),
(128, 1, 1, 1, 1, 1, 0, 0, 1, '2025-02-10 08:47:42', 1, 57),
(129, 1, 1, 0, 0, 1, 0, 0, 1, '2025-02-10 09:32:37', 20, 27),
(130, 1, 1, 0, 0, 1, 0, 0, 1, '2025-02-11 12:07:36', 29, 21),
(131, 1, 1, 1, 0, 1, 0, 0, 1, '2025-02-11 04:39:10', 20, 53),
(132, 1, 1, 0, 0, 1, 0, 0, 1, '2025-02-11 04:37:26', 20, 39),
(133, 1, 1, 0, 0, 1, 0, 0, 1, '2025-02-11 04:38:55', 20, 50),
(134, 1, 1, 0, 0, 1, 0, 0, 1, '2025-02-13 12:32:55', 19, 57),
(135, 1, 1, 0, 0, 1, 0, 0, 1, '2025-02-13 06:56:55', 20, 57),
(136, 1, 1, 1, 1, 1, 0, 0, 1, '2025-02-17 01:25:38', 1, 58),
(137, 1, 1, 1, 1, 1, 0, 0, 1, '2025-02-17 06:56:07', 1, 59),
(138, 1, 1, 1, 1, 1, 0, 0, 1, '2025-04-03 11:48:40', 1, 62),
(139, 1, 1, 1, 1, 1, 0, 0, 1, '2025-04-03 11:48:40', 1, 63),
(140, 0, 0, 0, 0, 1, 0, 0, 1, '2025-04-03 02:03:45', 1, 64),
(141, 0, 0, 0, 0, 1, 0, 0, 1, '2025-04-03 02:03:45', 1, 65),
(142, 1, 1, 1, 1, 1, 0, 0, 1, '2025-04-21 09:52:59', 1, 67),
(143, 1, 1, 1, 1, 1, 0, 0, 1, '2025-04-21 09:52:59', 1, 68),
(144, 1, 1, 1, 1, 1, 0, 0, 1, '2025-04-21 09:52:59', 1, 69),
(145, 1, 1, 1, 1, 1, 0, 0, 1, '2025-04-21 09:52:59', 1, 70),
(146, 1, 1, 1, 1, 1, 0, 0, 1, '2025-04-21 09:52:59', 1, 71),
(147, 1, 1, 1, 1, 1, 0, 0, 1, '2025-04-21 09:52:59', 1, 72),
(148, 1, 1, 1, 1, 1, 0, 0, 1, '2025-04-21 09:52:59', 1, 73),
(149, 1, 1, 1, 1, 1, 0, 0, 1, '2025-04-21 09:52:59', 1, 77),
(150, 1, 1, 1, 1, 1, 0, 0, 1, '2025-04-21 09:52:59', 1, 78),
(151, 1, 1, 1, 1, 1, 0, 0, 1, '2025-04-21 09:52:59', 1, 79),
(152, 1, 1, 1, 1, 1, 0, 0, 1, '2025-04-21 09:52:59', 1, 80),
(153, 1, 1, 1, 1, 1, 0, 0, 1, '2025-04-21 09:52:59', 1, 85),
(154, 1, 1, 0, 1, 1, 0, 0, 1, '2025-05-07 12:01:55', 51, 17),
(155, 1, 1, 0, 1, 1, 0, 0, 1, '2025-05-07 12:01:55', 51, 18),
(156, 1, 1, 0, 1, 1, 0, 0, 1, '2025-05-07 12:01:55', 51, 19),
(157, 1, 1, 0, 1, 1, 0, 0, 1, '2025-05-07 12:01:55', 51, 21),
(158, 1, 1, 0, 1, 1, 0, 0, 1, '2025-05-07 12:01:55', 51, 97),
(159, 1, 1, 1, 1, 1, 0, 0, 1, '2025-05-07 12:06:59', 58, 17),
(160, 1, 1, 1, 1, 1, 0, 0, 1, '2025-05-07 12:06:59', 58, 18),
(161, 1, 1, 1, 1, 1, 0, 0, 1, '2025-05-07 12:06:59', 58, 19),
(162, 1, 1, 1, 1, 1, 0, 0, 1, '2025-05-07 12:06:59', 58, 21),
(163, 1, 1, 1, 1, 1, 0, 0, 1, '2025-05-07 12:06:59', 58, 97),
(164, 1, 1, 1, 1, 1, 0, 0, 1, '2025-05-07 12:06:59', 58, 98),
(165, 1, 1, 1, 1, 1, 0, 0, 1, '2025-05-07 12:10:16', 55, 17),
(166, 1, 1, 1, 1, 1, 0, 0, 1, '2025-05-07 12:10:16', 55, 18),
(167, 1, 1, 1, 1, 1, 0, 0, 1, '2025-05-07 12:10:16', 55, 19),
(168, 1, 1, 1, 1, 1, 0, 0, 1, '2025-05-07 12:10:16', 55, 21),
(169, 1, 1, 1, 1, 1, 0, 0, 1, '2025-05-28 10:05:05', 1, 105),
(170, 1, 1, 1, 1, 1, 0, 0, 1, '2025-06-09 11:33:52', 1, 106),
(171, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-01 04:02:13', 1, 95),
(172, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-03 02:01:40', 1, 107),
(173, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 66),
(174, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 67),
(175, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 68),
(176, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 69),
(177, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 70),
(178, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 71),
(179, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 72),
(180, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 73),
(181, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 74),
(182, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 75),
(183, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 76),
(184, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 77),
(185, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 78),
(186, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 79),
(187, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 80),
(188, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 81),
(189, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 82),
(190, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 83),
(191, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 84),
(192, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 85),
(193, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 86),
(194, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 87),
(195, 1, 1, 1, 1, 1, 0, 0, 1, '2025-07-30 02:06:45', 59, 95),
(196, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 74),
(197, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 75),
(198, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 76),
(199, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 81),
(200, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 82),
(201, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 83),
(202, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 84),
(203, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 85),
(204, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 97),
(205, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 98),
(206, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 99),
(207, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 100),
(208, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 101),
(209, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 102),
(210, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 103),
(211, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 104),
(212, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 108),
(213, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 109),
(214, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 110),
(215, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 111),
(216, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-05 09:26:48', 1, 112),
(217, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-26 12:40:29', 60, 66),
(218, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-26 12:40:29', 60, 67),
(219, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-26 12:40:29', 60, 68),
(220, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-26 12:40:29', 60, 69),
(221, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-26 12:40:29', 60, 70),
(222, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-26 12:40:29', 60, 71),
(223, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-26 12:40:29', 60, 72),
(224, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-26 12:40:29', 60, 73),
(225, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-26 12:40:29', 60, 78),
(226, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-26 12:40:29', 60, 79),
(227, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-26 12:40:29', 60, 80),
(228, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-26 12:40:29', 60, 95),
(229, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-26 12:40:29', 60, 111),
(230, 1, 1, 1, 1, 1, 0, 0, 1, '2025-08-26 12:40:29', 60, 112),
(231, 1, 1, 1, 1, 1, 0, 0, 1, '2025-09-11 02:24:14', 60, 26),
(232, 1, 1, 1, 1, 1, 0, 0, 1, '2025-09-11 02:25:41', 2, 26),
(233, 1, 1, 1, 1, 1, 0, 0, 1, '2025-10-07 02:15:43', 60, 81),
(234, 1, 1, 1, 1, 1, 0, 0, 1, '2025-10-07 02:15:43', 60, 82),
(235, 1, 1, 1, 1, 1, 0, 0, 1, '2025-10-07 02:15:43', 60, 83),
(236, 1, 1, 1, 1, 1, 0, 0, 1, '2025-10-07 02:15:43', 60, 84),
(237, 1, 1, 1, 1, 1, 0, 0, 1, '2025-10-07 02:15:43', 60, 85),
(238, 1, 1, 1, 1, 1, 0, 0, 1, '2025-10-21 02:06:15', 1, 113),
(239, 1, 1, 1, 1, 1, 0, 0, 1, '2025-10-26 11:08:38', 1, 78),
(240, 1, 1, 1, 1, 1, 0, 0, 1, '2025-10-26 11:08:38', 1, 79),
(241, 1, 1, 1, 1, 1, 0, 0, 1, '2025-10-26 11:08:38', 1, 112),
(242, 1, 1, 1, 1, 1, 0, 0, 1, '2025-10-26 11:08:38', 1, 113),
(243, 1, 1, 1, 1, 1, 0, 0, 1, '2025-11-24 11:24:48', 1, 114),
(244, 1, 1, 1, 1, 1, 0, 0, 1, '2025-12-09 12:27:55', 1, 115),
(245, 1, 1, 1, 1, 1, 0, 0, 1, '2025-12-09 11:00:21', 1, 116),
(246, 1, 1, 1, 1, 1, 0, 0, 1, '2025-12-10 12:08:52', 1, 117),
(247, 1, 1, 1, 1, 1, 0, 0, 1, '2025-12-13 12:16:41', 1, 60),
(490, 1, 1, 1, 1, 1, 0, 0, 1, '2026-02-08 23:47:43', 1, 123),
(491, 1, 1, 1, 1, 1, 0, 0, 1, '2026-02-10 00:22:17', 2, 118),
(492, 1, 1, 1, 1, 1, 0, 0, 1, '2026-02-10 00:23:26', 1, 118),
(493, 1, 1, 1, 1, 1, 0, 0, 1, '2026-02-10 00:30:57', 1, 122),
(494, 1, 1, 1, 1, 1, 0, 0, 1, '2026-02-10 10:50:50', 63, 118),
(495, 1, 1, 1, 1, 1, 0, 0, 1, '2026-02-10 10:50:52', 63, 122),
(496, 1, 1, 1, 1, 1, 0, 0, 1, '2026-03-17 01:17:00', 1, 131),
(497, 1, 1, 1, 1, 1, 0, 0, 1, '2026-04-18 12:52:44', 1, 125),
(498, 1, 1, 1, 1, 1, 0, 0, 1, '2026-05-01 22:45:05', 1, 134),
(499, 1, 1, 1, 1, 1, 0, 0, 1, '2026-05-02 22:56:22', 1, 135),
(500, 1, 1, 1, 1, 1, 0, 0, 1, '2026-05-12 14:34:55', 68, 1),
(501, 1, 1, 1, 1, 1, 0, 0, 1, '2026-05-12 14:34:55', 68, 2),
(502, 1, 1, 1, 1, 1, 0, 0, 1, '2026-05-12 14:34:55', 68, 3),
(503, 1, 1, 1, 1, 1, 0, 0, 1, '2026-05-25 11:08:34', 1, 139);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `idtbl_user_type` int(11) NOT NULL,
  `type` varchar(4500) NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=1092 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`idtbl_user_type`, `type`, `status`, `updatedatetime`) VALUES
(1, 'Super Admin', 1, '2020-11-10 20:00:00'),
(2, 'Admin', 1, '2020-11-10 20:00:00'),
(3, 'User', 1, '2021-01-11 01:12:13'),
(4, 'Driver', 3, '2023-10-18 10:49:57'),
(5, 'Helper', 1, '2021-01-11 01:12:26'),
(6, 'Officer', 1, '2021-01-11 01:12:36'),
(7, 'Ref', 1, '2021-01-17 10:04:34'),
(8, 'ASM', 1, '2021-12-21 02:38:14'),
(9, 'CSM', 3, '2023-10-18 10:50:41'),
(10, 'COO', 3, '2023-10-18 10:50:33'),
(11, 'CM', 3, '2023-10-18 10:50:30'),
(12, 'SPO', 3, '2023-10-18 10:50:04'),
(13, 'Sales Manager', 1, '2024-08-17 06:50:25'),
(14, 'Tab User', 1, '2025-02-07 10:11:06'),
(15, 'Distributor', 1, '2026-01-18 10:15:07'),
(16, 'SOFTWARE', 1, '2026-05-12 14:33:40'),
(17, 'NEW TEST', 1, '2026-05-12 14:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vat`
--

CREATE TABLE `tbl_vat` (
  `idtbl_vat` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `vat_rate` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vat_info`
--

CREATE TABLE `tbl_vat_info` (
  `idtbl_vat_info` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `vat` double DEFAULT NULL,
  `nbt` double DEFAULT NULL,
  `s_vat` double DEFAULT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle`
--

CREATE TABLE `tbl_vehicle` (
  `idtbl_vehicle` int(11) NOT NULL,
  `vehicleno` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `insertdatetime` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_loading`
--

CREATE TABLE `tbl_vehicle_loading` (
  `idtbl_vehicle_loading` int(11) NOT NULL,
  `tbl_vehicle_idtbl_vehicle` int(11) DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) DEFAULT NULL,
  `total_items` int(11) DEFAULT 0,
  `total_remaining` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `update_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_loading_details`
--

CREATE TABLE `tbl_vehicle_loading_details` (
  `idtbl_vehicle_loading_details` int(11) NOT NULL,
  `tbl_vehicle_loading_idtbl_vehicle_loading` int(11) DEFAULT NULL,
  `tbl_product_idtbl_product` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `qty_remaining` int(11) NOT NULL DEFAULT 0,
  `salesprice` decimal(10,2) DEFAULT NULL,
  `unitprice` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_loading_details_batches`
--

CREATE TABLE `tbl_vehicle_loading_details_batches` (
  `idtbl_vehicle_loading_details_batches` int(11) NOT NULL,
  `tbl_vehicle_loading_details_idtbl_vehicle_loading_details` int(11) DEFAULT NULL,
  `tbl_batch_idtbl_batch` int(11) DEFAULT NULL,
  `qty_from_batch` int(11) DEFAULT NULL,
  `qty_returned` int(11) NOT NULL DEFAULT 0,
  `status` varchar(50) DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warehouse`
--

CREATE TABLE `tbl_warehouse` (
  `idtbl_warehouse` int(11) NOT NULL,
  `potype` int(11) NOT NULL,
  `ismaterialpo` int(11) NOT NULL,
  `isassemblepo` int(11) NOT NULL,
  `orderdate` date NOT NULL,
  `subtotal` double NOT NULL,
  `disamount` double NOT NULL,
  `discount` double NOT NULL,
  `podiscount` double NOT NULL,
  `po_amount` double NOT NULL,
  `nettotal` double NOT NULL,
  `payfullhalf` int(11) NOT NULL,
  `remark` int(11) NOT NULL,
  `confirmstatus` int(11) NOT NULL,
  `dispatchissue` int(11) NOT NULL,
  `grnissuestatus` int(11) NOT NULL,
  `paystatus` int(11) NOT NULL,
  `shipstatus` int(11) NOT NULL,
  `deliverystatus` int(11) NOT NULL,
  `trackingno` varchar(45) NOT NULL,
  `trackingwebsite` mediumtext DEFAULT NULL,
  `callstatus` int(11) NOT NULL,
  `narration` mediumtext DEFAULT NULL,
  `cancelreason` mediumtext DEFAULT NULL,
  `returnstatus` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `insertdatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_locations_idtbl_locations` int(11) NOT NULL,
  `tbl_porder_idtbl_porder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warehouse_details`
--

CREATE TABLE `tbl_warehouse_details` (
  `idtbl_warehouse_details` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `qty` double NOT NULL,
  `freeqty` double DEFAULT NULL,
  `freeproductid` int(11) DEFAULT NULL,
  `unitprice` double NOT NULL,
  `saleprice` double NOT NULL,
  `discount` double DEFAULT NULL,
  `discountamount` double DEFAULT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `insertdatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_porder_idtbl_porder` int(11) NOT NULL,
  `tbl_product_idtbl_product` int(11) NOT NULL,
  `tbl_material_idtbl_material` int(11) NOT NULL,
  `idtbl_porder_detail` int(11) NOT NULL,
  `tbl_warehouse_idtbl_warehouse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `subject` (`subject_type`,`subject_id`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `free_issue_rules`
--
ALTER TABLE `free_issue_rules`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product_free_issue`
--
ALTER TABLE `product_free_issue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `date_range` (`start_date`,`end_date`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`idtbl_account`),
  ADD KEY `fk_tbl_account_tbl_account_category1_idx` (`tbl_account_category_idtbl_account_category`),
  ADD KEY `fk_tbl_account_tbl_account_nestcategory1_idx` (`tbl_account_nestcategory_idtbl_account_nestcategory`),
  ADD KEY `fk_tbl_account_tbl_account_subcategory1_idx` (`tbl_account_subcategory_idtbl_account_subcategory`),
  ADD KEY `fk_tbl_account_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_account_allocation`
--
ALTER TABLE `tbl_account_allocation`
  ADD PRIMARY KEY (`idtbl_account_allocation`),
  ADD KEY `fk_tbl_account_allocation_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_account_category`
--
ALTER TABLE `tbl_account_category`
  ADD PRIMARY KEY (`idtbl_account_category`),
  ADD KEY `fk_tbl_account_category_tbl_account_finacialtype1_idx` (`tbl_account_finacialtype_idtbl_account_finacialtype`),
  ADD KEY `fk_tbl_account_category_tbl_account_transactiontype1_idx` (`tbl_account_transactiontype_idtbl_account_transactiontype`),
  ADD KEY `fk_tbl_account_category_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_account_detail`
--
ALTER TABLE `tbl_account_detail`
  ADD PRIMARY KEY (`idtbl_account_detail`),
  ADD KEY `fk_tbl_account_detail_tbl_account1_idx` (`tbl_account_idtbl_account`),
  ADD KEY `fk_tbl_account_detail_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_account_finacialtype`
--
ALTER TABLE `tbl_account_finacialtype`
  ADD PRIMARY KEY (`idtbl_account_finacialtype`);

--
-- Indexes for table `tbl_account_nestcategory`
--
ALTER TABLE `tbl_account_nestcategory`
  ADD PRIMARY KEY (`idtbl_account_nestcategory`),
  ADD KEY `fk_tbl_account_nestcategory_tbl_account_category1_idx` (`tbl_account_category_idtbl_account_category`),
  ADD KEY `fk_tbl_account_nestcategory_tbl_account_subcategory1_idx` (`tbl_account_subcategory_idtbl_account_subcategory`),
  ADD KEY `fk_tbl_account_nestcategory_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_account_open_bal`
--
ALTER TABLE `tbl_account_open_bal`
  ADD PRIMARY KEY (`idtbl_account_open_bal`),
  ADD KEY `fk_tbl_account_open_bal_tbl_company_branch1_idx` (`tbl_company_branch_idtbl_company_branch`),
  ADD KEY `fk_tbl_account_open_bal_tbl_company1_idx` (`tbl_company_idtbl_company`),
  ADD KEY `fk_tbl_account_open_bal_tbl_master1_idx` (`tbl_master_idtbl_master`),
  ADD KEY `fk_tbl_account_open_bal_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_account_payable`
--
ALTER TABLE `tbl_account_payable`
  ADD PRIMARY KEY (`idtbl_account_payable`),
  ADD KEY `fk_tbl_account_payable_tbl_account_payable_main1_idx` (`tbl_account_payable_main_idtbl_account_payable_main`),
  ADD KEY `fk_tbl_account_payable_tbl_company_branch1_idx` (`tbl_company_branch_idtbl_company_branch`),
  ADD KEY `fk_tbl_account_payable_tbl_company1_idx` (`tbl_company_idtbl_company`),
  ADD KEY `fk_tbl_account_payable_tbl_master1_idx` (`tbl_master_idtbl_master`),
  ADD KEY `fk_tbl_account_payable_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_account_payable_main`
--
ALTER TABLE `tbl_account_payable_main`
  ADD PRIMARY KEY (`idtbl_account_payable_main`),
  ADD KEY `fk_tbl_account_payable_main_tbl_company_branch1_idx` (`tbl_company_branch_idtbl_company_branch`),
  ADD KEY `fk_tbl_account_payable_main_tbl_company1_idx` (`tbl_company_idtbl_company`),
  ADD KEY `fk_tbl_account_payable_main_tbl_master1_idx` (`tbl_master_idtbl_master`),
  ADD KEY `fk_tbl_account_payable_main_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_account_paysettle`
--
ALTER TABLE `tbl_account_paysettle`
  ADD PRIMARY KEY (`idtbl_account_paysettle`),
  ADD KEY `fk_tbl_account_paysettle_tbl_company_branch1_idx` (`tbl_company_branch_idtbl_company_branch`),
  ADD KEY `fk_tbl_account_paysettle_tbl_company1_idx` (`tbl_company_idtbl_company`),
  ADD KEY `fk_tbl_account_paysettle_tbl_master1_idx` (`tbl_master_idtbl_master`),
  ADD KEY `fk_tbl_account_paysettle_tbl_receivable_type1_idx` (`tbl_receivable_type_idtbl_receivable_type`),
  ADD KEY `fk_tbl_account_paysettle_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_account_paysettle_has_tbl_cheque_issue`
--
ALTER TABLE `tbl_account_paysettle_has_tbl_cheque_issue`
  ADD PRIMARY KEY (`tbl_account_paysettle_idtbl_account_paysettle`,`tbl_cheque_issue_idtbl_cheque_issue`),
  ADD KEY `fk_tbl_account_paysettle_has_tbl_cheque_issue_tbl_account_p_idx` (`tbl_account_paysettle_idtbl_account_paysettle`),
  ADD KEY `fk_tbl_account_paysettle_has_tbl_cheque_issue_tbl_cheque_is_idx` (`tbl_cheque_issue_idtbl_cheque_issue`);

--
-- Indexes for table `tbl_account_paysettle_info`
--
ALTER TABLE `tbl_account_paysettle_info`
  ADD PRIMARY KEY (`idtbl_account_paysettle_info`),
  ADD KEY `fk_tbl_account_paysettle_info_tbl_account_paysettle1_idx` (`tbl_account_paysettle_idtbl_account_paysettle`),
  ADD KEY `fk_tbl_account_paysettle_info_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_account_receivable`
--
ALTER TABLE `tbl_account_receivable`
  ADD PRIMARY KEY (`idtbl_account_receivable`),
  ADD KEY `fk_tbl_account_receivable_tbl_account_receivable_main1_idx` (`tbl_account_receivable_main_idtbl_account_receivable_main`),
  ADD KEY `fk_tbl_account_receivable_tbl_company_branch1_idx` (`tbl_company_branch_idtbl_company_branch`),
  ADD KEY `fk_tbl_account_receivable_tbl_company1_idx` (`tbl_company_idtbl_company`),
  ADD KEY `fk_tbl_account_receivable_tbl_master1_idx` (`tbl_master_idtbl_master`),
  ADD KEY `fk_tbl_account_receivable_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_account_receivable_main`
--
ALTER TABLE `tbl_account_receivable_main`
  ADD PRIMARY KEY (`idtbl_account_receivable_main`),
  ADD KEY `fk_tbl_account_receivvable_main_tbl_company_branch1_idx` (`tbl_company_branch_idtbl_company_branch`),
  ADD KEY `fk_tbl_account_receivvable_main_tbl_company1_idx` (`tbl_company_idtbl_company`),
  ADD KEY `fk_tbl_account_receivvable_main_tbl_master1_idx` (`tbl_master_idtbl_master`),
  ADD KEY `fk_tbl_account_receivvable_main_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_account_special_category`
--
ALTER TABLE `tbl_account_special_category`
  ADD PRIMARY KEY (`idtbl_account_special_category`),
  ADD KEY `fk_tbl_account_special_category_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_account_subcategory`
--
ALTER TABLE `tbl_account_subcategory`
  ADD PRIMARY KEY (`idtbl_account_subcategory`),
  ADD KEY `fk_tbl_account_subcategory_tbl_account_category1_idx` (`tbl_account_category_idtbl_account_category`),
  ADD KEY `fk_tbl_account_subcategory_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_account_transaction`
--
ALTER TABLE `tbl_account_transaction`
  ADD PRIMARY KEY (`idtbl_account_transaction`),
  ADD KEY `fk_tbl_account_transaction_tbl_account1_idx` (`tbl_account_idtbl_account`),
  ADD KEY `fk_tbl_account_transaction_tbl_company_branch1_idx` (`tbl_company_branch_idtbl_company_branch`),
  ADD KEY `fk_tbl_account_transaction_tbl_company1_idx` (`tbl_company_idtbl_company`),
  ADD KEY `fk_tbl_account_transaction_tbl_master1_idx` (`tbl_master_idtbl_master`),
  ADD KEY `fk_tbl_account_transaction_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_account_transactiontype`
--
ALTER TABLE `tbl_account_transactiontype`
  ADD PRIMARY KEY (`idtbl_account_transactiontype`);

--
-- Indexes for table `tbl_account_transaction_full`
--
ALTER TABLE `tbl_account_transaction_full`
  ADD PRIMARY KEY (`idtbl_account_transaction_full`),
  ADD KEY `fk_tbl_account_transaction_full_tbl_account1_idx` (`tbl_account_idtbl_account`),
  ADD KEY `fk_tbl_account_transaction_full_tbl_company_branch1_idx` (`tbl_company_branch_idtbl_company_branch`),
  ADD KEY `fk_tbl_account_transaction_full_tbl_company1_idx` (`tbl_company_idtbl_company`),
  ADD KEY `fk_tbl_account_transaction_full_tbl_master1_idx` (`tbl_master_idtbl_master`),
  ADD KEY `fk_tbl_account_transaction_full_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_account_transaction_manual`
--
ALTER TABLE `tbl_account_transaction_manual`
  ADD PRIMARY KEY (`idtbl_account_transaction_manual`),
  ADD KEY `fk_tbl_account_transaction_manual_tbl_account_transaction_m_idx` (`manualtrans_main_id`),
  ADD KEY `fk_tbl_account_transaction_manual_tbl_company_branch1_idx` (`tbl_company_branch_idtbl_company_branch`),
  ADD KEY `fk_tbl_account_transaction_manual_tbl_company1_idx` (`tbl_company_idtbl_company`),
  ADD KEY `fk_tbl_account_transaction_manual_tbl_master1_idx` (`tbl_master_idtbl_master`),
  ADD KEY `fk_tbl_account_transaction_manual_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_account_transaction_manual_main`
--
ALTER TABLE `tbl_account_transaction_manual_main`
  ADD PRIMARY KEY (`idtbl_account_transaction_manual_main`),
  ADD KEY `fk_tbl_account_transaction_manual_main_tbl_company_branch1_idx` (`tbl_company_branch_idtbl_company_branch`),
  ADD KEY `fk_tbl_account_transaction_manual_main_tbl_company1_idx` (`tbl_company_idtbl_company`),
  ADD KEY `fk_tbl_account_transaction_manual_main_tbl_master1_idx` (`tbl_master_idtbl_master`),
  ADD KEY `fk_tbl_account_transaction_manual_main_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_account_type`
--
ALTER TABLE `tbl_account_type`
  ADD PRIMARY KEY (`idtbl_account_type`),
  ADD KEY `fk_tbl_account_type_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`idtbl_area`),
  ADD KEY `fk_tbl_area_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_asset`
--
ALTER TABLE `tbl_asset`
  ADD PRIMARY KEY (`idtbl_asset`),
  ADD KEY `fk_tbl_asset_tbl_asset_type1_idx` (`tbl_asset_type_idtbl_asset_type`),
  ADD KEY `fk_tbl_asset_tbl_company_branch1_idx` (`tbl_company_branch_idtbl_company_branch`),
  ADD KEY `fk_tbl_asset_tbl_company1_idx` (`tbl_company_idtbl_company`),
  ADD KEY `fk_tbl_asset_tbl_depreciation_category1_idx` (`tbl_depreciation_category_idtbl_depreciation_category`),
  ADD KEY `fk_tbl_asset_tbl_depreciation_type1_idx` (`tbl_depreciation_type_idtbl_depreciation_type`),
  ADD KEY `fk_tbl_asset_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_asset_destroy`
--
ALTER TABLE `tbl_asset_destroy`
  ADD PRIMARY KEY (`idtbl_asset_destroy`),
  ADD KEY `fk_tbl_asset_destroy_tbl_asset1_idx` (`tbl_asset_idtbl_asset`),
  ADD KEY `fk_tbl_asset_destroy_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_asset_has_tbl_account_detail`
--
ALTER TABLE `tbl_asset_has_tbl_account_detail`
  ADD PRIMARY KEY (`tbl_asset_idtbl_asset`,`tbl_account_detail_idtbl_account_detail`),
  ADD KEY `fk_tbl_asset_has_tbl_account_detail_tbl_account_detail1_idx` (`tbl_account_detail_idtbl_account_detail`),
  ADD KEY `fk_tbl_asset_has_tbl_account_detail_tbl_asset1_idx` (`tbl_asset_idtbl_asset`),
  ADD KEY `fk_tbl_asset_has_tbl_account_detail_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_asset_sell`
--
ALTER TABLE `tbl_asset_sell`
  ADD PRIMARY KEY (`idtbl_asset_sell`),
  ADD KEY `fk_tbl_asset_sell_tbl_asset1_idx` (`tbl_asset_idtbl_asset`),
  ADD KEY `fk_tbl_asset_sell_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_asset_type`
--
ALTER TABLE `tbl_asset_type`
  ADD PRIMARY KEY (`idtbl_asset_type`),
  ADD KEY `fk_tbl_asset_type_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`idtbl_bank`),
  ADD KEY `fk_tbl_bank_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_bank_branch`
--
ALTER TABLE `tbl_bank_branch`
  ADD PRIMARY KEY (`idtbl_bank_branch`),
  ADD KEY `fk_tbl_bank_branch_tbl_bank1_idx` (`tbl_bank_idtbl_bank`),
  ADD KEY `fk_tbl_bank_branch_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_bank_rec_info`
--
ALTER TABLE `tbl_bank_rec_info`
  ADD PRIMARY KEY (`idtbl_bank_rec_info`),
  ADD KEY `fk_tbl_bank_rec_info_tbl_bank_rec_list2_idx` (`tbl_bank_rec_list_idtbl_bank_rec_list`),
  ADD KEY `fk_tbl_bank_rec_info_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_bank_rec_list`
--
ALTER TABLE `tbl_bank_rec_list`
  ADD PRIMARY KEY (`idtbl_bank_rec_list`),
  ADD KEY `fk_tbl_bank_rec_list_tbl_account2_idx` (`tbl_account_idtbl_account`),
  ADD KEY `fk_tbl_bank_rec_list_tbl_finacial_month2_idx` (`tbl_finacial_month_idtbl_finacial_month`),
  ADD KEY `fk_tbl_bank_rec_list_tbl_finacial_year2_idx` (`tbl_finacial_year_idtbl_finacial_year`),
  ADD KEY `fk_tbl_bank_rec_list_tbl_user2_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_bank_rec_revision`
--
ALTER TABLE `tbl_bank_rec_revision`
  ADD PRIMARY KEY (`idtbl_bank_rec_revision`),
  ADD KEY `fk_tbl_bank_rec_revision_tbl_account1_idx` (`tbl_account_idtbl_account_cr`),
  ADD KEY `fk_tbl_bank_rec_revision_tbl_account2_idx` (`tbl_account_idtbl_account_dr`),
  ADD KEY `fk_tbl_bank_rec_revision_tbl_bank_rec_list1_idx` (`tbl_bank_rec_list_idtbl_bank_rec_list`),
  ADD KEY `fk_tbl_bank_rec_revision_tbl_master1_idx` (`tbl_master_idtbl_master`),
  ADD KEY `fk_tbl_bank_rec_revision_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_batch_category`
--
ALTER TABLE `tbl_batch_category`
  ADD PRIMARY KEY (`idtbl_batch_category`),
  ADD KEY `fk_tbl_batch_category_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_batch_num_register`
--
ALTER TABLE `tbl_batch_num_register`
  ADD KEY `fk_tbl_batch_num_register_tbl_company_branch1_idx` (`tbl_company_branch_idtbl_company_branch`);

--
-- Indexes for table `tbl_batch_transaction`
--
ALTER TABLE `tbl_batch_transaction`
  ADD PRIMARY KEY (`idtbl_batch_transaction`),
  ADD KEY `fk_tbl_batch_transaction_tbl_batch_trans_type1_idx` (`tbl_batch_trans_type_idtbl_batch_trans_type`),
  ADD KEY `fk_tbl_batch_transaction_tbl_batch_transaction_main1_idx` (`tbl_batch_transaction_main_idtbl_batch_transaction_main`),
  ADD KEY `fk_tbl_batch_transaction_tbl_company_branch1_idx` (`tbl_company_branch_idtbl_company_branch`),
  ADD KEY `fk_tbl_batch_transaction_tbl_company1_idx` (`tbl_company_idtbl_company`),
  ADD KEY `fk_tbl_batch_transaction_tbl_master1_idx` (`tbl_master_idtbl_master`),
  ADD KEY `fk_tbl_batch_transaction_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_batch_transaction_main`
--
ALTER TABLE `tbl_batch_transaction_main`
  ADD PRIMARY KEY (`idtbl_batch_transaction_main`),
  ADD KEY `fk_tbl_batch_transaction_main_tbl_batch_category1_idx` (`tbl_batch_category_idtbl_batch_category`),
  ADD KEY `fk_tbl_batch_transaction_main_tbl_batch_trans_type1_idx` (`tbl_batch_trans_type_idtbl_batch_trans_type`),
  ADD KEY `fk_tbl_batch_transaction_main_tbl_company_branch1_idx` (`tbl_company_branch_idtbl_company_branch`),
  ADD KEY `fk_tbl_batch_transaction_main_tbl_company1_idx` (`tbl_company_idtbl_company`),
  ADD KEY `fk_tbl_batch_transaction_main_tbl_master1_idx` (`tbl_master_idtbl_master`),
  ADD KEY `fk_tbl_batch_transaction_main_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_batch_trans_type`
--
ALTER TABLE `tbl_batch_trans_type`
  ADD PRIMARY KEY (`idtbl_batch_trans_type`),
  ADD KEY `fk_tbl_batch_trans_type_tbl_batch_category1_idx` (`tbl_batch_category_idtbl_batch_category`),
  ADD KEY `fk_tbl_batch_trans_type_tbl_company_branch1_idx` (`tbl_company_branch_idtbl_company_branch`),
  ADD KEY `fk_tbl_batch_trans_type_tbl_company1_idx` (`tbl_company_idtbl_company`),
  ADD KEY `fk_tbl_batch_trans_type_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_batch_trans_type_info`
--
ALTER TABLE `tbl_batch_trans_type_info`
  ADD PRIMARY KEY (`idtbl_batch_trans_type_info`),
  ADD KEY `fk_tbl_batch_trans_type_info_tbl_batch_trans_type1_idx` (`tbl_batch_trans_type_idtbl_batch_trans_type`),
  ADD KEY `fk_tbl_batch_trans_type_info_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_batch_trans_type_tax`
--
ALTER TABLE `tbl_batch_trans_type_tax`
  ADD PRIMARY KEY (`idtbl_batch_trans_type_tax`),
  ADD KEY `fk_tbl_batch_trans_type_tax_tbl_batch_trans_type1_idx` (`tbl_batch_trans_type_idtbl_batch_trans_type`),
  ADD KEY `fk_tbl_batch_trans_type_tax_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_catalog`
--
ALTER TABLE `tbl_catalog`
  ADD PRIMARY KEY (`idtbl_catalog`),
  ADD KEY `fk_tbl_catalog_tbl_catalog_category1_idx` (`tbl_catalog_category_idtbl_catalog_category`),
  ADD KEY `fk_tbl_catalog_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_catalog_category`
--
ALTER TABLE `tbl_catalog_category`
  ADD PRIMARY KEY (`idtbl_catalog_category`),
  ADD KEY `fk_tbl_catalog_category_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_catalog_details`
--
ALTER TABLE `tbl_catalog_details`
  ADD PRIMARY KEY (`idtbl_catalog_details`);

--
-- Indexes for table `tbl_cheque_info`
--
ALTER TABLE `tbl_cheque_info`
  ADD PRIMARY KEY (`idtbl_cheque_info`),
  ADD KEY `fk_tbl_cheque_info_tbl_account1_idx` (`tbl_account_idtbl_account`),
  ADD KEY `fk_tbl_cheque_info_tbl_bank_branch1_idx` (`tbl_bank_branch_idtbl_bank_branch`),
  ADD KEY `fk_tbl_cheque_info_tbl_bank1_idx` (`tbl_bank_idtbl_bank`),
  ADD KEY `fk_tbl_cheque_info_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_cheque_issue`
--
ALTER TABLE `tbl_cheque_issue`
  ADD PRIMARY KEY (`idtbl_cheque_issue`),
  ADD KEY `fk_tbl_cheque_issue_tbl_cheque_info1_idx` (`tbl_cheque_info_idtbl_cheque_info`),
  ADD KEY `fk_tbl_cheque_issue_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_cheque_payments`
--
ALTER TABLE `tbl_cheque_payments`
  ADD PRIMARY KEY (`idtbl_cheque_payments`),
  ADD KEY `fk_bank` (`tbl_bank_idtbl_bank`),
  ADD KEY `fk_branch` (`tbl_bank_branch_idtbl_bank_branch`),
  ADD KEY `fk_customer` (`tbl_customer_idtbl_customer`),
  ADD KEY `fk_user` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_cheque_payment_reentries`
--
ALTER TABLE `tbl_cheque_payment_reentries`
  ADD PRIMARY KEY (`idtbl_cheque_payment_reentries`),
  ADD KEY `fk_bank` (`bank_id`),
  ADD KEY `fk_cheque_payment` (`tbl_cheque_payments_idtbl_cheque_payments`),
  ADD KEY `fk_customer` (`tbl_customer_idtbl_customer`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`idtbl_company`),
  ADD KEY `fk_tbl_company_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_company_branch`
--
ALTER TABLE `tbl_company_branch`
  ADD PRIMARY KEY (`idtbl_company_branch`),
  ADD KEY `fk_tbl_company_branch_tbl_company1_idx` (`tbl_company_idtbl_company`),
  ADD KEY `fk_tbl_company_branch_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_contact_details`
--
ALTER TABLE `tbl_contact_details`
  ADD PRIMARY KEY (`idtbl_contact_details`),
  ADD KEY `fk_electrician` (`person_id`),
  ADD KEY `fk_tbl_contact_details_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_creditenote`
--
ALTER TABLE `tbl_creditenote`
  ADD PRIMARY KEY (`idtbl_creditenote`),
  ADD KEY `constraint_tbl_customer_tbl_return` (`tbl_customer_idtbl_customer`),
  ADD KEY `fk_tbl_creditenote_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_creditenote_detail`
--
ALTER TABLE `tbl_creditenote_detail`
  ADD PRIMARY KEY (`idtbl_creditenote_detail`),
  ADD KEY `fk_tbl_creditenote_detail_tbl_creditenote1_idx` (`tbl_creditenote_idtbl_creditenote`),
  ADD KEY `fk_tbl_creditenote_detail_tbl_return1_idx` (`tbl_return_idtbl_return`),
  ADD KEY `fk_tbl_creditenote_detail_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`idtbl_customer`),
  ADD KEY `fk_tbl_customer_tbl_area1_idx` (`tbl_area_idtbl_area`),
  ADD KEY `fk_tbl_customer_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_customer_assets`
--
ALTER TABLE `tbl_customer_assets`
  ADD PRIMARY KEY (`idtbl_customer_assets`);

--
-- Indexes for table `tbl_customer_asset_assignments`
--
ALTER TABLE `tbl_customer_asset_assignments`
  ADD PRIMARY KEY (`idtbl_customer_asset_assignments`),
  ADD UNIQUE KEY `uq_customer_asset` (`tbl_customer_idtbl_customer`,`tbl_customer_assets_id`);

--
-- Indexes for table `tbl_customer_location`
--
ALTER TABLE `tbl_customer_location`
  ADD PRIMARY KEY (`idtbl_customer_location`),
  ADD KEY `fk_area` (`tbl_area_idtbl_area`),
  ADD KEY `fk_customer_location` (`tbl_customer_idtbl_customer`),
  ADD KEY `fk_location_user` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_customer_order`
--
ALTER TABLE `tbl_customer_order`
  ADD PRIMARY KEY (`idtbl_customer_order`),
  ADD KEY `fk_tbl_customer_order_tbl_area1_idx` (`tbl_area_idtbl_area`),
  ADD KEY `fk_tbl_customer_order_tbl_customer1_idx` (`tbl_customer_idtbl_customer`),
  ADD KEY `fk_tbl_customer_order_tbl_employee1_idx` (`tbl_employee_idtbl_employee`),
  ADD KEY `fk_tbl_customer_order_tbl_locations1_idx` (`tbl_locations_idtbl_locations`),
  ADD KEY `fk_tbl_customer_order_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_customer_order_delivery_data`
--
ALTER TABLE `tbl_customer_order_delivery_data`
  ADD PRIMARY KEY (`idtbl_customer_order_delivery_data`);

--
-- Indexes for table `tbl_customer_order_detail`
--
ALTER TABLE `tbl_customer_order_detail`
  ADD PRIMARY KEY (`idtbl_customer_order_detail`),
  ADD KEY `fk_tbl_customer_order_detail_tbl_customer_order1_idx` (`tbl_customer_order_idtbl_customer_order`),
  ADD KEY `fk_tbl_customer_order_detail_tbl_product1_idx` (`tbl_product_idtbl_product`),
  ADD KEY `fk_tbl_customer_order_detail_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_customer_order_hold_stock`
--
ALTER TABLE `tbl_customer_order_hold_stock`
  ADD PRIMARY KEY (`idtbl_customer_order_hold_stock`),
  ADD KEY `fk_tbl_customer_order_hold_stock_tbl_customer_order1_idx` (`tbl_customer_order_idtbl_customer_order`),
  ADD KEY `fk_tbl_customer_order_hold_stock_tbl_product1_idx` (`tbl_product_idtbl_product`),
  ADD KEY `fk_tbl_customer_order_hold_stock_tbl_user1_idx` (`tbl_user_idtbl_user`),
  ADD KEY `fk_tbl_customer_order_hold_stock_location` (`tbl_location_idtbl_location`);

--
-- Indexes for table `tbl_customer_type`
--
ALTER TABLE `tbl_customer_type`
  ADD PRIMARY KEY (`idtbl_customer_type`);

--
-- Indexes for table `tbl_customer_visitdays`
--
ALTER TABLE `tbl_customer_visitdays`
  ADD PRIMARY KEY (`idtbl_customer_visitdays`),
  ADD KEY `fk_tbl_customer_visitdays_tbl_customer1_idx` (`tbl_customer_idtbl_customer`),
  ADD KEY `fk_tbl_customer_visitdays_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_cutomer_order_dispatch`
--
ALTER TABLE `tbl_cutomer_order_dispatch`
  ADD PRIMARY KEY (`idtbl_cutomer_order_dispatch`);

--
-- Indexes for table `tbl_cutomer_order_dispatch_has_tbl_customer_order`
--
ALTER TABLE `tbl_cutomer_order_dispatch_has_tbl_customer_order`
  ADD PRIMARY KEY (`tbl_cutomer_order_dispatch_idtbl_cutomer_order_dispatch`);

--
-- Indexes for table `tbl_damage_return`
--
ALTER TABLE `tbl_damage_return`
  ADD PRIMARY KEY (`idtbl_damage_return`);

--
-- Indexes for table `tbl_depreciation_category`
--
ALTER TABLE `tbl_depreciation_category`
  ADD PRIMARY KEY (`idtbl_depreciation_category`);

--
-- Indexes for table `tbl_depreciation_info`
--
ALTER TABLE `tbl_depreciation_info`
  ADD PRIMARY KEY (`idtbl_depreciation_info`);

--
-- Indexes for table `tbl_depreciation_method`
--
ALTER TABLE `tbl_depreciation_method`
  ADD PRIMARY KEY (`idtbl_depreciation_method`);

--
-- Indexes for table `tbl_depreciation_type`
--
ALTER TABLE `tbl_depreciation_type`
  ADD PRIMARY KEY (`idtbl_depreciation_type`);

--
-- Indexes for table `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  ADD PRIMARY KEY (`idtbl_distributor`);

--
-- Indexes for table `tbl_distributor_customer`
--
ALTER TABLE `tbl_distributor_customer`
  ADD PRIMARY KEY (`idtbl_discus`);

--
-- Indexes for table `tbl_distributor_customer_invoice`
--
ALTER TABLE `tbl_distributor_customer_invoice`
  ADD PRIMARY KEY (`idtbl_dis_invoiceid`);

--
-- Indexes for table `tbl_distributor_cus_order`
--
ALTER TABLE `tbl_distributor_cus_order`
  ADD PRIMARY KEY (`idtbl_dis_cus_orderid`);

--
-- Indexes for table `tbl_distributor_cus_order_detail`
--
ALTER TABLE `tbl_distributor_cus_order_detail`
  ADD PRIMARY KEY (`idtbl_dis_cus_order_detailid`);

--
-- Indexes for table `tbl_distributor_grn`
--
ALTER TABLE `tbl_distributor_grn`
  ADD PRIMARY KEY (`idtbl_grn`);

--
-- Indexes for table `tbl_distributor_grn_detail`
--
ALTER TABLE `tbl_distributor_grn_detail`
  ADD PRIMARY KEY (`idtbl_grn_detail`);

--
-- Indexes for table `tbl_distributor_invoice_detail`
--
ALTER TABLE `tbl_distributor_invoice_detail`
  ADD PRIMARY KEY (`idtbl_dis_invoice_detailid`);

--
-- Indexes for table `tbl_distributor_order`
--
ALTER TABLE `tbl_distributor_order`
  ADD PRIMARY KEY (`idtbl_dis_orderid`);

--
-- Indexes for table `tbl_distributor_order_detail`
--
ALTER TABLE `tbl_distributor_order_detail`
  ADD PRIMARY KEY (`idtbl_dis_order_detail_id`);

--
-- Indexes for table `tbl_distributor_porder`
--
ALTER TABLE `tbl_distributor_porder`
  ADD PRIMARY KEY (`idtbl_porder`),
  ADD UNIQUE KEY `tbl_distributor_porder_order_no_unique` (`order_no`);

--
-- Indexes for table `tbl_distributor_porder_detail`
--
ALTER TABLE `tbl_distributor_porder_detail`
  ADD PRIMARY KEY (`idtbl_porder_detail`);

--
-- Indexes for table `tbl_distributor_return`
--
ALTER TABLE `tbl_distributor_return`
  ADD PRIMARY KEY (`idtbl_dis_returnid`);

--
-- Indexes for table `tbl_distributor_stock`
--
ALTER TABLE `tbl_distributor_stock`
  ADD PRIMARY KEY (`idtbl_dis_stockid`);

--
-- Indexes for table `tbl_distributor_stock_adjustment`
--
ALTER TABLE `tbl_distributor_stock_adjustment`
  ADD PRIMARY KEY (`idtbl_dis_stock_adjustment`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`idtbl_district`);

--
-- Indexes for table `tbl_dist_cus_invoice`
--
ALTER TABLE `tbl_dist_cus_invoice`
  ADD PRIMARY KEY (`idtbl_dis_cus_invoiceid`);

--
-- Indexes for table `tbl_dist_cus_invoice_detail`
--
ALTER TABLE `tbl_dist_cus_invoice_detail`
  ADD PRIMARY KEY (`idtbl_dis_cus_invoice_detailid`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`idtbl_employee`);

--
-- Indexes for table `tbl_employee_area`
--
ALTER TABLE `tbl_employee_area`
  ADD PRIMARY KEY (`tbl_area_idtbl_area`);

--
-- Indexes for table `tbl_employee_has_tbl_dispatch`
--
ALTER TABLE `tbl_employee_has_tbl_dispatch`
  ADD PRIMARY KEY (`tbl_employee_idtbl_employee`);

--
-- Indexes for table `tbl_employee_target`
--
ALTER TABLE `tbl_employee_target`
  ADD PRIMARY KEY (`idtbl_employee_target`);

--
-- Indexes for table `tbl_employee_target_details`
--
ALTER TABLE `tbl_employee_target_details`
  ADD PRIMARY KEY (`idtbl_employee_target_details`);

--
-- Indexes for table `tbl_expences_type`
--
ALTER TABLE `tbl_expences_type`
  ADD PRIMARY KEY (`idtbl_expences_type`);

--
-- Indexes for table `tbl_expence_info`
--
ALTER TABLE `tbl_expence_info`
  ADD PRIMARY KEY (`idtbl_expence_info`);

--
-- Indexes for table `tbl_finacial_month`
--
ALTER TABLE `tbl_finacial_month`
  ADD PRIMARY KEY (`idtbl_finacial_month`);

--
-- Indexes for table `tbl_finacial_year`
--
ALTER TABLE `tbl_finacial_year`
  ADD PRIMARY KEY (`idtbl_finacial_year`);

--
-- Indexes for table `tbl_gl_report_head_sections`
--
ALTER TABLE `tbl_gl_report_head_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gl_report_sub_sections`
--
ALTER TABLE `tbl_gl_report_sub_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gl_report_sub_section_particulars`
--
ALTER TABLE `tbl_gl_report_sub_section_particulars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_grn`
--
ALTER TABLE `tbl_grn`
  ADD PRIMARY KEY (`idtbl_grn`),
  ADD KEY `fk_tbl_grn_location` (`tbl_location_idtbl_location`);

--
-- Indexes for table `tbl_grndetail`
--
ALTER TABLE `tbl_grndetail`
  ADD PRIMARY KEY (`idtbl_grndetail`);

--
-- Indexes for table `tbl_group_category`
--
ALTER TABLE `tbl_group_category`
  ADD PRIMARY KEY (`idtbl_group_category`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`idtbl_invoice`);

--
-- Indexes for table `tbl_invoice_detail`
--
ALTER TABLE `tbl_invoice_detail`
  ADD PRIMARY KEY (`idtbl_invoice_detail`);

--
-- Indexes for table `tbl_invoice_payment`
--
ALTER TABLE `tbl_invoice_payment`
  ADD PRIMARY KEY (`idtbl_invoice_payment`);

--
-- Indexes for table `tbl_invoice_payment_detail`
--
ALTER TABLE `tbl_invoice_payment_detail`
  ADD PRIMARY KEY (`idtbl_invoice_payment_detail`);

--
-- Indexes for table `tbl_invoice_payment_has_tbl_invoice`
--
ALTER TABLE `tbl_invoice_payment_has_tbl_invoice`
  ADD PRIMARY KEY (`idtbl_invoice_payment_has_tbl_invoice`),
  ADD UNIQUE KEY `uq_payment_invoice` (`tbl_invoice_payment_idtbl_invoice_payment`,`tbl_invoice_idtbl_invoice`);

--
-- Indexes for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  ADD PRIMARY KEY (`idtbl_locations`);

--
-- Indexes for table `tbl_master`
--
ALTER TABLE `tbl_master`
  ADD PRIMARY KEY (`idtbl_master`);

--
-- Indexes for table `tbl_material_category`
--
ALTER TABLE `tbl_material_category`
  ADD PRIMARY KEY (`idtbl_material_category`),
  ADD KEY `fk_tbl_matiriel_category_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_material_info`
--
ALTER TABLE `tbl_material_info`
  ADD PRIMARY KEY (`idtbl_material_info`),
  ADD KEY `fk_tbl_material_info_tbl_user1_idx` (`tbl_user_idtbl_user`),
  ADD KEY `fk_tbl_material_info_tbl_material_category1_idx` (`tbl_material_category_idtbl_material_category`);

--
-- Indexes for table `tbl_material_stock`
--
ALTER TABLE `tbl_material_stock`
  ADD PRIMARY KEY (`idtbl_material_stock`),
  ADD KEY `fk_tbl_material_stock_tbl_user1_idx` (`tbl_user_idtbl_user`),
  ADD KEY `fk_tbl_material_stock_tbl_material_info1_idx` (`tbl_material_info_idtbl_material_info`),
  ADD KEY `fk_tbl_material_stock_tbl_location1_idx` (`tbl_location_idtbl_location`);

--
-- Indexes for table `tbl_menu_list`
--
ALTER TABLE `tbl_menu_list`
  ADD PRIMARY KEY (`idtbl_menu_list`);

--
-- Indexes for table `tbl_original_customer_order`
--
ALTER TABLE `tbl_original_customer_order`
  ADD PRIMARY KEY (`idtbl_original_customer_order`);

--
-- Indexes for table `tbl_original_customer_order_detail`
--
ALTER TABLE `tbl_original_customer_order_detail`
  ADD PRIMARY KEY (`idtbl_original_customer_order_detail`);

--
-- Indexes for table `tbl_other_payincome`
--
ALTER TABLE `tbl_other_payincome`
  ADD PRIMARY KEY (`idtbl_other_payincome`);

--
-- Indexes for table `tbl_packing_quality`
--
ALTER TABLE `tbl_packing_quality`
  ADD PRIMARY KEY (`idtbl_packing_quality`),
  ADD KEY `fk_tbl_packing_quality_tbl_user1_idx` (`tbl_user_idtbl_user`),
  ADD KEY `fk_tbl_packing_quality_tbl_production_order1_idx` (`tbl_production_order_idtbl_production_order`),
  ADD KEY `fk_tbl_packing_quality_tbl_product1_idx` (`tbl_product_idtbl_product`);

--
-- Indexes for table `tbl_pettycash`
--
ALTER TABLE `tbl_pettycash`
  ADD PRIMARY KEY (`idtbl_pettycash`);

--
-- Indexes for table `tbl_pettycash_account_balance`
--
ALTER TABLE `tbl_pettycash_account_balance`
  ADD PRIMARY KEY (`idtbl_pettycash_account_balance`);

--
-- Indexes for table `tbl_pettycash_expenses`
--
ALTER TABLE `tbl_pettycash_expenses`
  ADD PRIMARY KEY (`idtbl_pettycash_expenses`);

--
-- Indexes for table `tbl_pettycash_reimburse`
--
ALTER TABLE `tbl_pettycash_reimburse`
  ADD PRIMARY KEY (`idtbl_pettycash_reimburse`);

--
-- Indexes for table `tbl_pettycash_reimburse_has_tbl_pettycash`
--
ALTER TABLE `tbl_pettycash_reimburse_has_tbl_pettycash`
  ADD PRIMARY KEY (`tbl_pettycash_reimburse_idtbl_pettycash_reimburse`);

--
-- Indexes for table `tbl_pettycash_summary`
--
ALTER TABLE `tbl_pettycash_summary`
  ADD PRIMARY KEY (`idtbl_pettycash_summary`);

--
-- Indexes for table `tbl_porder`
--
ALTER TABLE `tbl_porder`
  ADD PRIMARY KEY (`idtbl_porder`);

--
-- Indexes for table `tbl_porder_detail`
--
ALTER TABLE `tbl_porder_detail`
  ADD PRIMARY KEY (`idtbl_porder_detail`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`idtbl_product`);

--
-- Indexes for table `tbl_production_daily_complete`
--
ALTER TABLE `tbl_production_daily_complete`
  ADD PRIMARY KEY (`idtbl_production_daily_complete`),
  ADD KEY `fk_tbl_production_daily_complete_tbl_user1_idx` (`tbl_user_idtbl_user`),
  ADD KEY `fk_tbl_production_daily_complete_tbl_production_order1_idx` (`tbl_production_order_idtbl_production_order`),
  ADD KEY `fk_tbl_production_daily_complete_tbl_product1_idx` (`tbl_product_idtbl_product`);

--
-- Indexes for table `tbl_production_material_issue`
--
ALTER TABLE `tbl_production_material_issue`
  ADD PRIMARY KEY (`idtbl_production_material_issue`),
  ADD KEY `fk_tbl_production_material_issue_tbl_user1_idx` (`tbl_user_idtbl_user`),
  ADD KEY `fk_tbl_production_material_issue_tbl_production_order1_idx` (`tbl_production_order_idtbl_production_order`),
  ADD KEY `fk_tbl_production_material_issue_tbl_product1_idx` (`tbl_product_idtbl_product`),
  ADD KEY `fk_tbl_production_material_issue_tbl_material_info1_idx` (`tbl_material_info_idtbl_material_info`);

--
-- Indexes for table `tbl_production_order`
--
ALTER TABLE `tbl_production_order`
  ADD PRIMARY KEY (`idtbl_production_order`),
  ADD KEY `fk_tbl_production_order_tbl_user1_idx` (`tbl_user_idtbl_user`),
  ADD KEY `fk_production_customer_order` (`tbl_customer_order_idtbl_customer_order`);

--
-- Indexes for table `tbl_production_orderdetail`
--
ALTER TABLE `tbl_production_orderdetail`
  ADD PRIMARY KEY (`idtbl_production_orderdetail`),
  ADD KEY `fk_tbl_production_orderdetail_tbl_user1_idx` (`tbl_user_idtbl_user`),
  ADD KEY `fk_tbl_production_orderdetail_tbl_production_order1_idx` (`tbl_production_order_idtbl_production_order`),
  ADD KEY `fk_tbl_production_orderdetail_tbl_product1_idx` (`tbl_product_idtbl_product`);

--
-- Indexes for table `tbl_production_quality`
--
ALTER TABLE `tbl_production_quality`
  ADD PRIMARY KEY (`idtbl_production_quality`),
  ADD KEY `fk_tbl_production_quality_tbl_user1_idx` (`tbl_user_idtbl_user`),
  ADD KEY `fk_tbl_production_quality_tbl_semi_production1_idx` (`tbl_semi_production_idtbl_semi_production`),
  ADD KEY `fk_tbl_production_quality_tbl_material_info1_idx` (`tbl_material_info_idtbl_material_info`);

--
-- Indexes for table `tbl_production_quality_machinelist`
--
ALTER TABLE `tbl_production_quality_machinelist`
  ADD PRIMARY KEY (`idtbl_production_quality_machinelist`),
  ADD KEY `fk_tbl_production_quality_machinelist_tbl_production_qualit_idx` (`tbl_production_quality_idtbl_production_quality`),
  ADD KEY `fk_tbl_production_quality_machinelist_tbl_user1_idx` (`tbl_user_idtbl_user`),
  ADD KEY `fk_tbl_production_quality_machinelist_tbl_machine1_idx` (`tbl_machine_idtbl_machine`);

--
-- Indexes for table `tbl_products_update_log`
--
ALTER TABLE `tbl_products_update_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_products_update_log_ibfk_1` (`product_id`);

--
-- Indexes for table `tbl_product_bom`
--
ALTER TABLE `tbl_product_bom`
  ADD PRIMARY KEY (`idtbl_product_bom`),
  ADD KEY `fk_tbl_product_bom_tbl_user1_idx` (`tbl_user_idtbl_user`),
  ADD KEY `fk_tbl_product_bom_tbl_product1_idx` (`tbl_product_idtbl_product`),
  ADD KEY `fk_tbl_product_bom_tbl_material_info1_idx` (`tbl_material_info_idtbl_material_info`),
  ADD KEY `fk_tbl_product_bom_tbl_product_bom_info1_idx` (`tbl_product_bom_info_idtbl_product_bom_info`);

--
-- Indexes for table `tbl_product_bom_info`
--
ALTER TABLE `tbl_product_bom_info`
  ADD PRIMARY KEY (`idtbl_product_bom_info`),
  ADD KEY `fk_tbl_product_bom_info_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  ADD PRIMARY KEY (`idtbl_product_category`);

--
-- Indexes for table `tbl_product_free_issue`
--
ALTER TABLE `tbl_product_free_issue`
  ADD PRIMARY KEY (`tbl_product_free_issue_id`),
  ADD KEY `fk_free_issue_product` (`product_id`),
  ADD KEY `fk_free_issue_updated_by` (`updated_by`);

--
-- Indexes for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  ADD PRIMARY KEY (`idtbl_product_image`);

--
-- Indexes for table `tbl_province`
--
ALTER TABLE `tbl_province`
  ADD PRIMARY KEY (`idtbl_province`);

--
-- Indexes for table `tbl_receivable`
--
ALTER TABLE `tbl_receivable`
  ADD PRIMARY KEY (`idtbl_receivable`);

--
-- Indexes for table `tbl_receivable_info`
--
ALTER TABLE `tbl_receivable_info`
  ADD PRIMARY KEY (`idtbl_receivable_info`);

--
-- Indexes for table `tbl_receivable_type`
--
ALTER TABLE `tbl_receivable_type`
  ADD PRIMARY KEY (`idtbl_receivable_type`);

--
-- Indexes for table `tbl_return`
--
ALTER TABLE `tbl_return`
  ADD PRIMARY KEY (`idtbl_return`),
  ADD KEY `idx_tbl_return_invoice` (`tbl_invoice_idtbl_invoice`),
  ADD KEY `idx_tbl_return_location` (`tbl_locations_idtbl_locations`);

--
-- Indexes for table `tbl_return_details`
--
ALTER TABLE `tbl_return_details`
  ADD PRIMARY KEY (`idtbl_return_details`),
  ADD KEY `fk_tbl_return_details_tbl_invoice1_idx` (`tbl_invoice_idtbl_invoice`);

--
-- Indexes for table `tbl_routes`
--
ALTER TABLE `tbl_routes`
  ADD PRIMARY KEY (`idtbl_routes`);

--
-- Indexes for table `tbl_sales_info`
--
ALTER TABLE `tbl_sales_info`
  ADD PRIMARY KEY (`idtbl_sales_info`);

--
-- Indexes for table `tbl_sales_manager`
--
ALTER TABLE `tbl_sales_manager`
  ADD PRIMARY KEY (`idtbl_sales_manager`);

--
-- Indexes for table `tbl_sizes`
--
ALTER TABLE `tbl_sizes`
  ADD PRIMARY KEY (`idtbl_sizes`);

--
-- Indexes for table `tbl_size_categories`
--
ALTER TABLE `tbl_size_categories`
  ADD PRIMARY KEY (`idtbl_size_categories`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`idtbl_stock`),
  ADD KEY `fk_tbl_stock_location` (`tbl_location_idtbl_location`);

--
-- Indexes for table `tbl_stock_adjustment`
--
ALTER TABLE `tbl_stock_adjustment`
  ADD PRIMARY KEY (`idtbl_stock_adjustment`),
  ADD KEY `fk_tbl_stock_adjustment_location` (`tbl_location_idtbl_location`);

--
-- Indexes for table `tbl_sub_product_category`
--
ALTER TABLE `tbl_sub_product_category`
  ADD PRIMARY KEY (`idtbl_sub_product_category`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`idtbl_supplier`);

--
-- Indexes for table `tbl_tax`
--
ALTER TABLE `tbl_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`idtbl_unit`),
  ADD UNIQUE KEY `unitcode_UNIQUE` (`unitcode`),
  ADD KEY `fk_tbl_unit_tbl_user1_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_upgrade_dipreciation`
--
ALTER TABLE `tbl_upgrade_dipreciation`
  ADD PRIMARY KEY (`idtbl_upgrade_dipreciation`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`idtbl_user`);

--
-- Indexes for table `tbl_user_logindata`
--
ALTER TABLE `tbl_user_logindata`
  ADD PRIMARY KEY (`idtbl_user_logindata`);

--
-- Indexes for table `tbl_user_privilege`
--
ALTER TABLE `tbl_user_privilege`
  ADD PRIMARY KEY (`idtbl_user_privilege`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`idtbl_user_type`);

--
-- Indexes for table `tbl_vat`
--
ALTER TABLE `tbl_vat`
  ADD PRIMARY KEY (`idtbl_vat`);

--
-- Indexes for table `tbl_vat_info`
--
ALTER TABLE `tbl_vat_info`
  ADD PRIMARY KEY (`idtbl_vat_info`);

--
-- Indexes for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  ADD PRIMARY KEY (`idtbl_vehicle`);

--
-- Indexes for table `tbl_vehicle_loading_details`
--
ALTER TABLE `tbl_vehicle_loading_details`
  ADD PRIMARY KEY (`idtbl_vehicle_loading_details`);

--
-- Indexes for table `tbl_vehicle_loading_details_batches`
--
ALTER TABLE `tbl_vehicle_loading_details_batches`
  ADD PRIMARY KEY (`idtbl_vehicle_loading_details_batches`);

--
-- Indexes for table `tbl_warehouse`
--
ALTER TABLE `tbl_warehouse`
  ADD PRIMARY KEY (`idtbl_warehouse`);

--
-- Indexes for table `tbl_warehouse_details`
--
ALTER TABLE `tbl_warehouse_details`
  ADD PRIMARY KEY (`idtbl_warehouse_details`);

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
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `free_issue_rules`
--
ALTER TABLE `free_issue_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_free_issue`
--
ALTER TABLE `product_free_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `idtbl_account` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `idtbl_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;

--
-- AUTO_INCREMENT for table `tbl_catalog`
--
ALTER TABLE `tbl_catalog`
  MODIFY `idtbl_catalog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_catalog_category`
--
ALTER TABLE `tbl_catalog_category`
  MODIFY `idtbl_catalog_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_catalog_details`
--
ALTER TABLE `tbl_catalog_details`
  MODIFY `idtbl_catalog_details` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `idtbl_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_company_branch`
--
ALTER TABLE `tbl_company_branch`
  MODIFY `idtbl_company_branch` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contact_details`
--
ALTER TABLE `tbl_contact_details`
  MODIFY `idtbl_contact_details` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_creditenote`
--
ALTER TABLE `tbl_creditenote`
  MODIFY `idtbl_creditenote` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_creditenote_detail`
--
ALTER TABLE `tbl_creditenote_detail`
  MODIFY `idtbl_creditenote_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `idtbl_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer_assets`
--
ALTER TABLE `tbl_customer_assets`
  MODIFY `idtbl_customer_assets` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer_asset_assignments`
--
ALTER TABLE `tbl_customer_asset_assignments`
  MODIFY `idtbl_customer_asset_assignments` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer_location`
--
ALTER TABLE `tbl_customer_location`
  MODIFY `idtbl_customer_location` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer_order`
--
ALTER TABLE `tbl_customer_order`
  MODIFY `idtbl_customer_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer_order_delivery_data`
--
ALTER TABLE `tbl_customer_order_delivery_data`
  MODIFY `idtbl_customer_order_delivery_data` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer_order_detail`
--
ALTER TABLE `tbl_customer_order_detail`
  MODIFY `idtbl_customer_order_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_customer_order_hold_stock`
--
ALTER TABLE `tbl_customer_order_hold_stock`
  MODIFY `idtbl_customer_order_hold_stock` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer_type`
--
ALTER TABLE `tbl_customer_type`
  MODIFY `idtbl_customer_type` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer_visitdays`
--
ALTER TABLE `tbl_customer_visitdays`
  MODIFY `idtbl_customer_visitdays` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cutomer_order_dispatch`
--
ALTER TABLE `tbl_cutomer_order_dispatch`
  MODIFY `idtbl_cutomer_order_dispatch` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cutomer_order_dispatch_has_tbl_customer_order`
--
ALTER TABLE `tbl_cutomer_order_dispatch_has_tbl_customer_order`
  MODIFY `tbl_cutomer_order_dispatch_idtbl_cutomer_order_dispatch` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_damage_return`
--
ALTER TABLE `tbl_damage_return`
  MODIFY `idtbl_damage_return` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_depreciation_category`
--
ALTER TABLE `tbl_depreciation_category`
  MODIFY `idtbl_depreciation_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_depreciation_info`
--
ALTER TABLE `tbl_depreciation_info`
  MODIFY `idtbl_depreciation_info` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_depreciation_method`
--
ALTER TABLE `tbl_depreciation_method`
  MODIFY `idtbl_depreciation_method` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_depreciation_type`
--
ALTER TABLE `tbl_depreciation_type`
  MODIFY `idtbl_depreciation_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  MODIFY `idtbl_distributor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_distributor_customer`
--
ALTER TABLE `tbl_distributor_customer`
  MODIFY `idtbl_discus` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_distributor_customer_invoice`
--
ALTER TABLE `tbl_distributor_customer_invoice`
  MODIFY `idtbl_dis_invoiceid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_distributor_cus_order`
--
ALTER TABLE `tbl_distributor_cus_order`
  MODIFY `idtbl_dis_cus_orderid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_distributor_cus_order_detail`
--
ALTER TABLE `tbl_distributor_cus_order_detail`
  MODIFY `idtbl_dis_cus_order_detailid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_distributor_grn`
--
ALTER TABLE `tbl_distributor_grn`
  MODIFY `idtbl_grn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_distributor_grn_detail`
--
ALTER TABLE `tbl_distributor_grn_detail`
  MODIFY `idtbl_grn_detail` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_distributor_invoice_detail`
--
ALTER TABLE `tbl_distributor_invoice_detail`
  MODIFY `idtbl_dis_invoice_detailid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_distributor_order`
--
ALTER TABLE `tbl_distributor_order`
  MODIFY `idtbl_dis_orderid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_distributor_order_detail`
--
ALTER TABLE `tbl_distributor_order_detail`
  MODIFY `idtbl_dis_order_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_distributor_porder`
--
ALTER TABLE `tbl_distributor_porder`
  MODIFY `idtbl_porder` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_distributor_porder_detail`
--
ALTER TABLE `tbl_distributor_porder_detail`
  MODIFY `idtbl_porder_detail` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_distributor_return`
--
ALTER TABLE `tbl_distributor_return`
  MODIFY `idtbl_dis_returnid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_distributor_stock`
--
ALTER TABLE `tbl_distributor_stock`
  MODIFY `idtbl_dis_stockid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_distributor_stock_adjustment`
--
ALTER TABLE `tbl_distributor_stock_adjustment`
  MODIFY `idtbl_dis_stock_adjustment` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `idtbl_district` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_dist_cus_invoice`
--
ALTER TABLE `tbl_dist_cus_invoice`
  MODIFY `idtbl_dis_cus_invoiceid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dist_cus_invoice_detail`
--
ALTER TABLE `tbl_dist_cus_invoice_detail`
  MODIFY `idtbl_dis_cus_invoice_detailid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `idtbl_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_employee_area`
--
ALTER TABLE `tbl_employee_area`
  MODIFY `tbl_area_idtbl_area` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee_has_tbl_dispatch`
--
ALTER TABLE `tbl_employee_has_tbl_dispatch`
  MODIFY `tbl_employee_idtbl_employee` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee_target`
--
ALTER TABLE `tbl_employee_target`
  MODIFY `idtbl_employee_target` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee_target_details`
--
ALTER TABLE `tbl_employee_target_details`
  MODIFY `idtbl_employee_target_details` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_expences_type`
--
ALTER TABLE `tbl_expences_type`
  MODIFY `idtbl_expences_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_expence_info`
--
ALTER TABLE `tbl_expence_info`
  MODIFY `idtbl_expence_info` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_finacial_month`
--
ALTER TABLE `tbl_finacial_month`
  MODIFY `idtbl_finacial_month` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_finacial_year`
--
ALTER TABLE `tbl_finacial_year`
  MODIFY `idtbl_finacial_year` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gl_report_head_sections`
--
ALTER TABLE `tbl_gl_report_head_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gl_report_sub_sections`
--
ALTER TABLE `tbl_gl_report_sub_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gl_report_sub_section_particulars`
--
ALTER TABLE `tbl_gl_report_sub_section_particulars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_grn`
--
ALTER TABLE `tbl_grn`
  MODIFY `idtbl_grn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_grndetail`
--
ALTER TABLE `tbl_grndetail`
  MODIFY `idtbl_grndetail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_group_category`
--
ALTER TABLE `tbl_group_category`
  MODIFY `idtbl_group_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `idtbl_invoice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_invoice_detail`
--
ALTER TABLE `tbl_invoice_detail`
  MODIFY `idtbl_invoice_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_invoice_payment`
--
ALTER TABLE `tbl_invoice_payment`
  MODIFY `idtbl_invoice_payment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_invoice_payment_detail`
--
ALTER TABLE `tbl_invoice_payment_detail`
  MODIFY `idtbl_invoice_payment_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_invoice_payment_has_tbl_invoice`
--
ALTER TABLE `tbl_invoice_payment_has_tbl_invoice`
  MODIFY `idtbl_invoice_payment_has_tbl_invoice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  MODIFY `idtbl_locations` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_master`
--
ALTER TABLE `tbl_master`
  MODIFY `idtbl_master` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_material_category`
--
ALTER TABLE `tbl_material_category`
  MODIFY `idtbl_material_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_material_info`
--
ALTER TABLE `tbl_material_info`
  MODIFY `idtbl_material_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_material_stock`
--
ALTER TABLE `tbl_material_stock`
  MODIFY `idtbl_material_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_menu_list`
--
ALTER TABLE `tbl_menu_list`
  MODIFY `idtbl_menu_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_original_customer_order`
--
ALTER TABLE `tbl_original_customer_order`
  MODIFY `idtbl_original_customer_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_original_customer_order_detail`
--
ALTER TABLE `tbl_original_customer_order_detail`
  MODIFY `idtbl_original_customer_order_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_other_payincome`
--
ALTER TABLE `tbl_other_payincome`
  MODIFY `idtbl_other_payincome` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_packing_quality`
--
ALTER TABLE `tbl_packing_quality`
  MODIFY `idtbl_packing_quality` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pettycash`
--
ALTER TABLE `tbl_pettycash`
  MODIFY `idtbl_pettycash` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pettycash_account_balance`
--
ALTER TABLE `tbl_pettycash_account_balance`
  MODIFY `idtbl_pettycash_account_balance` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pettycash_expenses`
--
ALTER TABLE `tbl_pettycash_expenses`
  MODIFY `idtbl_pettycash_expenses` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pettycash_reimburse`
--
ALTER TABLE `tbl_pettycash_reimburse`
  MODIFY `idtbl_pettycash_reimburse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pettycash_reimburse_has_tbl_pettycash`
--
ALTER TABLE `tbl_pettycash_reimburse_has_tbl_pettycash`
  MODIFY `tbl_pettycash_reimburse_idtbl_pettycash_reimburse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pettycash_summary`
--
ALTER TABLE `tbl_pettycash_summary`
  MODIFY `idtbl_pettycash_summary` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_porder`
--
ALTER TABLE `tbl_porder`
  MODIFY `idtbl_porder` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_porder_detail`
--
ALTER TABLE `tbl_porder_detail`
  MODIFY `idtbl_porder_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `idtbl_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_production_daily_complete`
--
ALTER TABLE `tbl_production_daily_complete`
  MODIFY `idtbl_production_daily_complete` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_production_material_issue`
--
ALTER TABLE `tbl_production_material_issue`
  MODIFY `idtbl_production_material_issue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_production_order`
--
ALTER TABLE `tbl_production_order`
  MODIFY `idtbl_production_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_production_orderdetail`
--
ALTER TABLE `tbl_production_orderdetail`
  MODIFY `idtbl_production_orderdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_production_quality`
--
ALTER TABLE `tbl_production_quality`
  MODIFY `idtbl_production_quality` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_production_quality_machinelist`
--
ALTER TABLE `tbl_production_quality_machinelist`
  MODIFY `idtbl_production_quality_machinelist` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_products_update_log`
--
ALTER TABLE `tbl_products_update_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product_bom`
--
ALTER TABLE `tbl_product_bom`
  MODIFY `idtbl_product_bom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_product_bom_info`
--
ALTER TABLE `tbl_product_bom_info`
  MODIFY `idtbl_product_bom_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  MODIFY `idtbl_product_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product_free_issue`
--
ALTER TABLE `tbl_product_free_issue`
  MODIFY `tbl_product_free_issue_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  MODIFY `idtbl_product_image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_province`
--
ALTER TABLE `tbl_province`
  MODIFY `idtbl_province` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_receivable`
--
ALTER TABLE `tbl_receivable`
  MODIFY `idtbl_receivable` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_receivable_info`
--
ALTER TABLE `tbl_receivable_info`
  MODIFY `idtbl_receivable_info` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_receivable_type`
--
ALTER TABLE `tbl_receivable_type`
  MODIFY `idtbl_receivable_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_return`
--
ALTER TABLE `tbl_return`
  MODIFY `idtbl_return` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_return_details`
--
ALTER TABLE `tbl_return_details`
  MODIFY `idtbl_return_details` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_routes`
--
ALTER TABLE `tbl_routes`
  MODIFY `idtbl_routes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sales_info`
--
ALTER TABLE `tbl_sales_info`
  MODIFY `idtbl_sales_info` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sales_manager`
--
ALTER TABLE `tbl_sales_manager`
  MODIFY `idtbl_sales_manager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sizes`
--
ALTER TABLE `tbl_sizes`
  MODIFY `idtbl_sizes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_size_categories`
--
ALTER TABLE `tbl_size_categories`
  MODIFY `idtbl_size_categories` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `idtbl_stock` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stock_adjustment`
--
ALTER TABLE `tbl_stock_adjustment`
  MODIFY `idtbl_stock_adjustment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sub_product_category`
--
ALTER TABLE `tbl_sub_product_category`
  MODIFY `idtbl_sub_product_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `idtbl_supplier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tax`
--
ALTER TABLE `tbl_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `idtbl_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_upgrade_dipreciation`
--
ALTER TABLE `tbl_upgrade_dipreciation`
  MODIFY `idtbl_upgrade_dipreciation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `idtbl_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbl_user_logindata`
--
ALTER TABLE `tbl_user_logindata`
  MODIFY `idtbl_user_logindata` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_privilege`
--
ALTER TABLE `tbl_user_privilege`
  MODIFY `idtbl_user_privilege` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `idtbl_user_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_vat`
--
ALTER TABLE `tbl_vat`
  MODIFY `idtbl_vat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vat_info`
--
ALTER TABLE `tbl_vat_info`
  MODIFY `idtbl_vat_info` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  MODIFY `idtbl_vehicle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vehicle_loading_details`
--
ALTER TABLE `tbl_vehicle_loading_details`
  MODIFY `idtbl_vehicle_loading_details` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vehicle_loading_details_batches`
--
ALTER TABLE `tbl_vehicle_loading_details_batches`
  MODIFY `idtbl_vehicle_loading_details_batches` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_warehouse`
--
ALTER TABLE `tbl_warehouse`
  MODIFY `idtbl_warehouse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_warehouse_details`
--
ALTER TABLE `tbl_warehouse_details`
  MODIFY `idtbl_warehouse_details` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_customer_order_hold_stock`
--
ALTER TABLE `tbl_customer_order_hold_stock`
  ADD CONSTRAINT `fk_tbl_customer_order_hold_stock_location` FOREIGN KEY (`tbl_location_idtbl_location`) REFERENCES `tbl_locations` (`idtbl_locations`);

--
-- Constraints for table `tbl_grn`
--
ALTER TABLE `tbl_grn`
  ADD CONSTRAINT `fk_tbl_grn_location` FOREIGN KEY (`tbl_location_idtbl_location`) REFERENCES `tbl_locations` (`idtbl_locations`);

--
-- Constraints for table `tbl_material_category`
--
ALTER TABLE `tbl_material_category`
  ADD CONSTRAINT `fk_tbl_matiriel_category_tbl_user1` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_material_info`
--
ALTER TABLE `tbl_material_info`
  ADD CONSTRAINT `fk_tbl_material_info_tbl_material_category1` FOREIGN KEY (`tbl_material_category_idtbl_material_category`) REFERENCES `tbl_material_category` (`idtbl_material_category`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_material_info_tbl_user1` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_production_order`
--
ALTER TABLE `tbl_production_order`
  ADD CONSTRAINT `fk_production_customer_order` FOREIGN KEY (`tbl_customer_order_idtbl_customer_order`) REFERENCES `tbl_customer_order` (`idtbl_customer_order`);

--
-- Constraints for table `tbl_products_update_log`
--
ALTER TABLE `tbl_products_update_log`
  ADD CONSTRAINT `tbl_products_update_log_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`idtbl_product`);

--
-- Constraints for table `tbl_product_free_issue`
--
ALTER TABLE `tbl_product_free_issue`
  ADD CONSTRAINT `fk_free_issue_product` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`idtbl_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_free_issue_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `tbl_user` (`idtbl_user`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_return`
--
ALTER TABLE `tbl_return`
  ADD CONSTRAINT `fk_tbl_return_location` FOREIGN KEY (`tbl_locations_idtbl_locations`) REFERENCES `tbl_locations` (`idtbl_locations`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD CONSTRAINT `fk_tbl_stock_location` FOREIGN KEY (`tbl_location_idtbl_location`) REFERENCES `tbl_locations` (`idtbl_locations`);

--
-- Constraints for table `tbl_stock_adjustment`
--
ALTER TABLE `tbl_stock_adjustment`
  ADD CONSTRAINT `fk_tbl_stock_adjustment_location` FOREIGN KEY (`tbl_location_idtbl_location`) REFERENCES `tbl_locations` (`idtbl_locations`);

--
-- Constraints for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD CONSTRAINT `fk_tbl_unit_tbl_user1` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
