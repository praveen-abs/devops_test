-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 10:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `velzon_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2022_05_10_023444_create_permission_tables', 1),
(6, '2022_05_18_123444_create_vmt_360_questions_table', 2),
(7, '2022_05_20_123444_create_vmt_360_forms_table', 3),
(8, '2022_05_22_123444_create_vmt_360_user_forms_table', 4),
(9, '2022_05_24_123444_create_vmt_360_employee_hierarchy_table', 5),
(10, '2022_05_31_100000_create_vmt_general_settings_table', 6),
(11, '2022_06_05_123456_create_vmt_employee_payslip_table', 7),
(12, '2022_06_07_123456_create_vmt_general_info_table', 8),
(13, '2022_06_08_123456_create_vmt_employees_table', 9),
(14, '2022_06_13_111222_create_vmt_performance_apraisal_questions_table', 10),
(15, '2022_06_22_123123_create_vmt_employee_office_details_table', 11),
(16, '2022_06_22_125125_create_vmt_client_master_table', 11),
(17, '2022_06_26_121212_create_vmt_kpi_table', 12),
(18, '2022_06_27_022837_add_userid_to_vmt_employee_details_table', 12),
(19, '2022_06_27_121212_create_vmt_employee_pms_goals_table', 12),
(20, '2022_06_28_150516_add_self_review_to_vmt_employee_pms_goals_table_table', 12),
(21, '2022_07_01_032937_add_manager_emp_id_to_vmt_employee_details_table', 13),
(22, '2022_07_02_061836_change_vmt_employee_details_table_column', 14);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `created`) VALUES
(4, 'App\\Models\\User', 1, '2022-07-01 11:46:52'),
(4, 'App\\Models\\User', 7, '2022-07-01 11:46:39'),
(5, 'App\\Models\\User', 4, '2022-07-01 11:39:38'),
(5, 'App\\Models\\User', 5, '2022-07-01 11:46:39'),
(5, 'App\\Models\\User', 6, '2022-07-01 11:46:39'),
(6, 'App\\Models\\User', 2, '2022-07-01 11:46:39'),
(6, 'App\\Models\\User', 3, '2022-07-01 11:39:54');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Performance_Appraisal', 'web', '2022-05-17 09:56:37', '2022-05-17 09:56:37'),
(2, 'Self_Appraisal', 'web', '2022-05-17 09:56:38', '2022-05-17 09:56:38'),
(3, 'Team', 'web', '2022-05-17 10:56:36', '2022-05-17 10:56:36'),
(4, 'ORG', 'web', '2022-05-17 10:56:36', '2022-05-17 10:56:36'),
(5, 'L1_Review', 'web', '2022-05-17 10:58:30', '2022-05-17 10:58:30'),
(6, 'L2_Review', 'web', '2022-05-17 10:58:30', '2022-05-17 10:58:30'),
(7, '360_Degree_Review', 'web', '2022-05-19 00:19:24', '2022-05-19 00:19:24'),
(8, 'Final_Review', 'web', '2022-05-19 00:19:24', '2022-05-19 00:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'Admin', 'web', '2022-05-19 00:19:14', '2022-05-19 00:19:14'),
(5, 'Employee', 'web', '2022-05-27 12:36:50', '2022-05-27 12:36:50'),
(6, 'Manager', 'web', '2022-06-08 23:18:27', '2022-06-08 23:18:27'),
(8, 'HR', 'web', '2022-05-19 00:19:14', '2022-05-19 00:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 4),
(1, 5),
(1, 6),
(1, 8),
(2, 4),
(2, 5),
(2, 6),
(2, 8),
(3, 4),
(3, 6),
(3, 8),
(4, 4),
(4, 5),
(4, 6),
(4, 8),
(5, 4),
(5, 6),
(5, 8),
(6, 4),
(6, 6),
(6, 8),
(7, 4),
(7, 6),
(7, 8),
(8, 4),
(8, 6),
(8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'HR Augustin', 'hr_augustin@vasagroup.abshrms.com', NULL, '$2y$10$vry5bkqFn25Jq/5JVRldEurny4slho/O2NI6Nlla57o0QKf3X0kjW', 'avatar-1.jpg', NULL, '2022-07-02 08:21:19', '2022-07-02 08:21:19'),
(2, 'Mgr Max Kumar', 'mr_max@vasagroup.abshrms.com', NULL, '$2y$10$UKk2.2IvqstWjcGFypCZke8M8sEiwJjaz9lcMYYJj6TkpGxP/cYzi', 'avatar-1.jpg', NULL, '2022-07-02 08:24:54', '2022-07-02 08:24:54'),
(3, 'Mgr Void Kumar', 'mr_void@vasagroup.abshrms.com', NULL, '$2y$10$POvQAXpAfD9dTJRhXzi1c.iKK2WuPm06GZdT1LVdp0Osmy6Z5eeIS', 'avatar-1.jpg', NULL, '2022-07-02 08:26:28', '2022-07-02 08:26:28'),
(4, 'Emp Praveen', 'emp_praveen@vasagroup.abshrms.com', NULL, '$2y$10$V/ic6IaAsqm4J0c5wJh5qO2WqV5xCejPnJ8W3Q9D/YlFyXFsngccS', 'avatar-1.jpg', NULL, '2022-07-02 08:27:47', '2022-07-02 08:27:47'),
(5, 'Emp Kumar', 'emp_kumar@vasagroup.abshrms.com', NULL, '$2y$10$QcdBLKenRbpQfxGksRgPOOIhO4uARYBP.Gz1uunj5og5iQPGRkMGa', 'avatar-1.jpg', NULL, '2022-07-02 08:28:55', '2022-07-02 08:28:55'),
(6, 'Emp Vijay', 'emp_vijay@vasagroup.abshrms.com', NULL, '$2y$10$6swUzQBnWWdh/pn21yA7pujVLj/iYX3c4Jj2QVEl4ie8dVXg/cEum', 'avatar-1.jpg', NULL, '2022-07-02 08:29:57', '2022-07-02 08:29:57'),
(7, 'SA Ardens', 'sa_ardens@vasagroup.abshrms.com', NULL, '$2y$10$OKCjTO7Z4BaMXU8mq8HyFeJ6WuIeCD58hYzxcIqRgoqU8rzIi8tHe', 'avatar-1.jpg', NULL, '2022-07-02 08:31:11', '2022-07-02 08:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `vmt_client_master`
--

CREATE TABLE `vmt_client_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_start_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_end_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_tan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_pan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_no` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `epf_reg_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esic_reg_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prof_tax_reg_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lwf_reg_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authorised_person_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authorised_person_designation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authorised_person_contact_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authorised_person_contact_email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_uploads` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vmt_client_master`
--

INSERT INTO `vmt_client_master` (`id`, `client_code`, `client_name`, `address`, `contract_start_date`, `contract_end_date`, `cin_number`, `company_tan`, `company_pan`, `gst_no`, `epf_reg_number`, `esic_reg_number`, `prof_tax_reg_number`, `lwf_reg_number`, `authorised_person_name`, `authorised_person_designation`, `authorised_person_contact_number`, `authorised_person_contact_email`, `billing_address`, `shipping_address`, `doc_uploads`, `product`, `subscription_type`, `created_at`, `updated_at`) VALUES
(19, 'Vasa', 'Vasa', NULL, '2022-06-01', '2022-06-14', '111', '111111111', '1111111111', '18AABCU9603R1ZM', '1111111', '1111111111111111111', '11111111', '11111111', '1Vasa', 'Vasas', '9999988887', 'praveenkumar.techdev@gmail.com', 'asdf', 'asdf', NULL, 'Recruitment', 'Quarterly', '2022-06-29 16:13:29', '2022-06-29 16:13:29'),
(20, 'Vasa', 'Vasa', NULL, '2022-06-01', '2022-06-01', '11', '1111111111111', '1111111111', '18AABCU9603R1ZM', '11111', '1111111111111111111111', '111111111111111111', '1111111111', 'vasa', 'vasa', '9999988888', 'praveenkumar.techdev@gmail.com', 'asdf', 'asdf', NULL, 'Accounting', 'Quarterly', '2022-06-29 22:17:44', '2022-06-29 22:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `vmt_employee_details`
--

CREATE TABLE `vmt_employee_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `emp_no` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doj` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dol` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhar_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `epf_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esic_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marrital_status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hra` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_edu_allowance` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spl_alw` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_fixed_gross` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `epfemployer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esicemployer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `epfemployee` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esicemployee` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esic_applicability` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_ifsc_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_age` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_age` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_age` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kid_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kid_age` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vmt_employee_details`
--

INSERT INTO `vmt_employee_details` (`id`, `userid`, `emp_no`, `gender`, `status`, `doj`, `dol`, `location`, `dob`, `father_name`, `pan_number`, `aadhar_number`, `uan`, `epf_number`, `esic_number`, `marrital_status`, `basic`, `hra`, `child_edu_allowance`, `spl_alw`, `total_fixed_gross`, `epfemployer`, `esicemployer`, `ctc`, `epfemployee`, `esicemployee`, `pt`, `net`, `esic_applicability`, `mobile_number`, `bank_name`, `bank_ifsc_code`, `bank_account_number`, `present_address`, `permanent_address`, `father_age`, `mother_name`, `mother_age`, `spouse_name`, `spouse_age`, `kid_name`, `kid_age`, `created_at`, `updated_at`) VALUES
(1, 1, 'Vasa100', 'male', NULL, '2022-06-02', '2022-06-02', 'asdf', '2022-06-30', 'Arr', 'BTEPP0598R', '223412341234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9999999999', 'asdfadsf', '3423', '123412341234', 'asdf', 'asdf', NULL, 'jjj', NULL, 'asd', '2022-05-31', 'a', '2022-06-01', '2022-06-29 16:33:53', '2022-06-29 16:33:53'),
(2, 2, 'Vasa102', 'male', NULL, '2022-06-02', '2022-06-02', 'asdf', '2022-06-30', 'Arr', 'BTEPP0598R', '223412341234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9999999999', 'asdfadsf', '3423', '123412341234', 'asdf', 'asdf', NULL, 'jjj', NULL, 'asd', '2022-05-31', 'a', '2022-06-01', '2022-06-29 16:33:53', '2022-06-29 16:33:53'),
(3, 3, 'Vasa103', 'male', NULL, '2022-06-02', '2022-06-02', 'asdf', '2022-06-30', 'Arr', 'BTEPP0598R', '223412341234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9999999999', 'asdfadsf', '3423', '123412341234', 'asdf', 'asdf', NULL, 'jjj', NULL, 'asd', '2022-05-31', 'a', '2022-06-01', '2022-06-29 16:33:53', '2022-06-29 16:33:53'),
(4, 4, 'Vasa104', 'Male', 'ACTIVE', '44652', NULL, 'CHENNAI', '35525', 'S.Martin Charles', 'GASPM9000E', '283110730101', '101803791305', 'TNAMB24340250000010093', '5133163873', 'Unmarried', '9000', '4500', '200', '1300', '=SUM(S96:V96)', '=IF(W96-T96>15000,15000*12%,(W96-T96)*12%)', '=ROUND(IF(W96<=21000,W96*3.25%,0),0)', '=SUM(W96:Y96)', '=IF(W96-T96>15000,15000*12%,(W96-T96)*12%)', '=ROUND(IF(W96<=21000,Z96*0.75%,0),0)', '208', '=W96-AA96-AB96-AC96', '=IF(W96>21000,\"NO\",\"YES\")', '9698944302', 'State Bank of India', 'SBIN0003373', '20287210068', 'Dunamis machines,Edappalayam,Red Hills, Chennai', 'Velankanni puram,chetriya patti(po),attur(tk),Dindigul (dt)-624302', '04/04/1975', 'M.Mariya Arockiyammmal', '04/05/1978', NULL, NULL, NULL, NULL, '2022-06-08 23:01:59', '2022-06-08 23:01:59'),
(5, 5, 'Vasa105', 'male', NULL, '2022-06-02', '2022-06-02', 'asdf', '2022-06-30', 'Arr', 'BTEPP0598R', '223412341234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9999999999', 'asdfadsf', '3423', '123412341234', 'asdf', 'asdf', NULL, 'jjj', NULL, 'asd', '2022-05-31', 'a', '2022-06-01', '2022-06-29 16:33:53', '2022-06-29 16:33:53'),
(6, 6, 'Vasa106', 'male', NULL, '2022-06-02', '2022-06-02', 'asdf', '2022-06-30', 'Arr', 'BTEPP0598R', '223412341234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9999999999', 'asdfadsf', '3423', '123412341234', 'asdf', 'asdf', NULL, 'jjj', NULL, 'asd', '2022-05-31', 'a', '2022-06-01', '2022-06-29 16:33:53', '2022-06-29 16:33:53'),
(7, 7, 'Vasa107', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vmt_employee_hierarchies`
--

CREATE TABLE `vmt_employee_hierarchies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `child_count` smallint(6) NOT NULL,
  `child_nodes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vmt_employee_hierarchies`
--

INSERT INTO `vmt_employee_hierarchies` (`id`, `user_id`, `parent_id`, `child_count`, `child_nodes`, `created_at`, `updated_at`) VALUES
(35, 1, NULL, 3, '6', '2022-05-27 12:37:19', '2022-05-27 12:37:19'),
(36, 1, NULL, 3, '5', '2022-05-27 12:37:19', '2022-05-27 12:37:19'),
(37, 1, NULL, 3, '4', '2022-05-27 12:37:19', '2022-05-27 12:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `vmt_employee_office_details`
--

CREATE TABLE `vmt_employee_office_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `user_id` int(5) NOT NULL,
  `department` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `process` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_center` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmation_period` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holiday_location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l1_manager_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l1_manager_designation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l1_manager_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l2_manager_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l2_manager_designation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l2_manager_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l3_manager_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l3_manager_designation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l3_manager_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l4_manager_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l4_manager_designation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l4_manager_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `officical_mail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `official_mobile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_notice` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vmt_employee_office_details`
--

INSERT INTO `vmt_employee_office_details` (`id`, `emp_id`, `user_id`, `department`, `process`, `designation`, `cost_center`, `confirmation_period`, `holiday_location`, `l1_manager_code`, `l1_manager_designation`, `l1_manager_name`, `l2_manager_code`, `l2_manager_designation`, `l2_manager_name`, `l3_manager_code`, `l3_manager_designation`, `l3_manager_name`, `l4_manager_code`, `l4_manager_designation`, `l4_manager_name`, `work_location`, `officical_mail`, `official_mobile`, `emp_notice`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'IT', 'asdf', 'Admin', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'com.java.praveen@gmail.com', '9999999999', '3', '2022-06-29 16:34:57', '2022-06-29 16:34:57'),
(2, 2, 2, 'IT', 'asdf', 'Manager', 'asdf', 'asdf', 'asdf', 'Vasa100', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'voidmaxtech@gmail.com', '9999999999', '3', '2022-06-29 16:34:57', '2022-06-29 16:34:57'),
(3, 3, 3, 'IT', 'asdf', 'Manager', 'asdf', 'asdf', 'asdf', 'Vasa100', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'mr_void@vasagroup.abshrms.com', '9999999999', '3', '2022-06-29 16:34:57', '2022-06-29 16:34:57'),
(4, 4, 4, 'IT', 'asdf', 'Employee', 'asdf', 'asdf', 'asdf', 'Vasa102', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'praveenkumar.techdev@gmail.com', '9999999999', '3', '2022-06-29 16:30:18', '2022-06-29 16:30:18'),
(5, 5, 5, 'IT', 'asdf', 'Employee', 'asdf', 'asdf', 'asdf', 'Vasa102', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'praveenkumar.techdev@gmail.com', '9999999999', '3', '2022-06-29 16:34:57', '2022-06-29 16:34:57'),
(6, 6, 6, 'IT', 'asdf', 'Employee', 'asdf', 'asdf', 'asdf', 'Vasa103', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'emp_vijay@vasagroup.abshrms.com', '9999999999', '3', '2022-06-29 16:34:57', '2022-06-29 16:34:57'),
(7, 7, 7, 'IT', 'asdf', 'Hr', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'sa_ardens@vasagroup.abshrms.com', '9999999999', '3', '2022-06-29 16:30:18', '2022-06-29 16:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `vmt_employee_payslip`
--

CREATE TABLE `vmt_employee_payslip` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `EMP_NO` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMP_NAME` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Gender` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DESIGNATION` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DEPARTMENT` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOJ` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LOCATION` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOB` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Father_Name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PAN_Number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Aadhar_Number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UAN` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EPF_Number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ESIC_Number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Bank_Name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Account_Number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Bank_IFSC_Code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PAYROLL_MONTH` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BASIC` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HRA` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CHILD_EDU_ALLOWANCE` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SPL_ALW` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TOTAL_FIXED_GROSS` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MONTH_DAYS` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Worked_Days` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Arrears_Days` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LOP` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Earned_BASIC` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BASIC_ARREAR` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Earned_HRA` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HRA_ARREAR` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Earned_CHILD_EDU_ALLOWANCE` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CHILD_EDU_ALLOWANCE_ARREAR` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Earned_SPL_ALW` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SPL_ALW_ARREAR` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Overtime` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TOTAL_EARNED_GROSS` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PF_WAGES` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PF_WAGES_ARREAR_EPFR` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EPFR` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EPFR_ARREAR` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EDLI_CHARGES` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EDLI_CHARGES_ARREARS` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PF_ADMIN_CHARGES` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PF_ADMIN_CHARGES_ARREARS` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMPLOYER_ESI` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Employer_LWF` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CTC` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EPF_EE` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EPF_EE_ARREAR` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMPLOYEE_ESIC` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PROF_TAX` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TDS` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SAL_ADV` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CANTEEN_DEDN` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OTHER_DEDUC` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LWF` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TOTAL_DEDUCTIONS` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NET_TAKE_HOME` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Rupees` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EL_Opn_Bal` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Availed_EL` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Balance_EL` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Rename` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Greetings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vmt_employee_payslip`
--

INSERT INTO `vmt_employee_payslip` (`id`, `EMP_NO`, `EMP_NAME`, `Gender`, `DESIGNATION`, `DEPARTMENT`, `DOJ`, `LOCATION`, `DOB`, `Father_Name`, `PAN_Number`, `Aadhar_Number`, `UAN`, `EPF_Number`, `ESIC_Number`, `Bank_Name`, `Account_Number`, `Bank_IFSC_Code`, `PAYROLL_MONTH`, `BASIC`, `HRA`, `CHILD_EDU_ALLOWANCE`, `SPL_ALW`, `TOTAL_FIXED_GROSS`, `MONTH_DAYS`, `Worked_Days`, `Arrears_Days`, `LOP`, `Earned_BASIC`, `BASIC_ARREAR`, `Earned_HRA`, `HRA_ARREAR`, `Earned_CHILD_EDU_ALLOWANCE`, `CHILD_EDU_ALLOWANCE_ARREAR`, `Earned_SPL_ALW`, `SPL_ALW_ARREAR`, `Overtime`, `TOTAL_EARNED_GROSS`, `PF_WAGES`, `PF_WAGES_ARREAR_EPFR`, `EPFR`, `EPFR_ARREAR`, `EDLI_CHARGES`, `EDLI_CHARGES_ARREARS`, `PF_ADMIN_CHARGES`, `PF_ADMIN_CHARGES_ARREARS`, `EMPLOYER_ESI`, `Employer_LWF`, `CTC`, `EPF_EE`, `EPF_EE_ARREAR`, `EMPLOYEE_ESIC`, `PROF_TAX`, `TDS`, `SAL_ADV`, `CANTEEN_DEDN`, `OTHER_DEDUC`, `LWF`, `TOTAL_DEDUCTIONS`, `NET_TAKE_HOME`, `Rupees`, `EL_Opn_Bal`, `Availed_EL`, `Balance_EL`, `Rename`, `Email`, `Greetings`, `created_at`, `updated_at`) VALUES
(1, 'DM001', 'Kumaran', 'MALE', 'MANAGING DIRECTOR', 'NA', '44531', 'CHENNAI', '27677', 'AUGUSTIN', 'PAN123', 'ADH123', 'UAN123', 'EPF123', 'Not Applicable', 'HDFC BANK', 'ACCNO123', 'HDFC0000001', 'Apr-22', '36000', '18000', '200', '5800', '60000', '30', '30', '0', '0', '36000', '0', '18000', '0', '200', '0', '5800', '0', '0', '60000', '15000', '0', '1800', '0', '75', '0', '75', '0', '0', '0', '61950', '1800', '0', '0', '208', '2990', '0', '210', '0', '0', '5208', '54792', 'Rupees Fifty Four Thousand Seven Hundred Ninety Two Only', '8.75', '0', '8.75', '=B2&\"_\"&C2&\"_\"&\"Payslip\"&\"_\"&S2', 'KUMARAN@DUNAMISMACHINES.CO.IN', '=\"Dear\"&\" \"&C2', '2022-06-06 02:56:27', '2022-06-06 02:56:27'),
(2, 'DM002', 'Kumaran1', 'MALE', 'MANAGING DIRECTOR', 'NA', '44532', 'CHENNAI', '27678', 'AUGUSTIN', 'PAN124', 'ADH124', 'UAN124', 'EPF124', 'Not Applicable', 'HDFC BANK', 'ACCNO124', 'HDFC0000002', 'Apr-23', '36000', '18000', '200', '5800', '60000', '30', '30', '0', '0', '36000', '0', '18000', '0', '200', '0', '5800', '0', '0', '60000', '15000', '0', '1800', '0', '75', '0', '75', '0', '0', '0', '61950', '1800', '0', '0', '208', '2990', '0', '210', '0', '0', '5208', '54792', 'Rupees Fifty Four Thousand Seven Hundred Ninety Two Only', '8.76', '1', '8.76', '=B3&\"_\"&C3&\"_\"&\"Payslip\"&\"_\"&S3', 'KUMARAN@DUNAMISMACHINES.CO.IN', '=\"Dear\"&\" \"&C3', '2022-06-06 02:56:27', '2022-06-06 02:56:27'),
(3, 'DM003', 'Kumaran2', 'MALE', 'MANAGING DIRECTOR', 'NA', '44533', 'CHENNAI', '27679', 'AUGUSTIN', 'PAN125', 'ADH125', 'UAN125', 'EPF125', 'Not Applicable', 'HDFC BANK', 'ACCNO125', 'HDFC0000003', 'Apr-24', '36000', '18000', '200', '5800', '60000', '30', '30', '0', '0', '36000', '0', '18000', '0', '200', '0', '5800', '0', '0', '60000', '15000', '0', '1800', '0', '75', '0', '75', '0', '0', '0', '61950', '1800', '0', '0', '208', '2990', '0', '210', '0', '0', '5208', '54792', 'Rupees Fifty Four Thousand Seven Hundred Ninety Two Only', '8.77', '2', '8.77', '=B4&\"_\"&C4&\"_\"&\"Payslip\"&\"_\"&S4', 'KUMARAN@DUNAMISMACHINES.CO.IN', '=\"Dear\"&\" \"&C4', '2022-06-06 02:56:27', '2022-06-06 02:56:27'),
(4, 'DM004', 'Kumaran3', 'MALE', 'MANAGING DIRECTOR', 'NA', '44534', 'CHENNAI', '27680', 'AUGUSTIN', 'PAN126', 'ADH126', 'UAN126', 'EPF126', 'Not Applicable', 'HDFC BANK', 'ACCNO126', 'HDFC0000004', 'Apr-25', '36000', '18000', '200', '5800', '60000', '30', '30', '0', '0', '36000', '0', '18000', '0', '200', '0', '5800', '0', '0', '60000', '15000', '0', '1800', '0', '75', '0', '75', '0', '0', '0', '61950', '1800', '0', '0', '208', '2990', '0', '210', '0', '0', '5208', '54792', 'Rupees Fifty Four Thousand Seven Hundred Ninety Two Only', '8.78', '3', '8.78', '=B5&\"_\"&C5&\"_\"&\"Payslip\"&\"_\"&S5', 'KUMARAN@DUNAMISMACHINES.CO.IN', '=\"Dear\"&\" \"&C5', '2022-06-06 02:56:27', '2022-06-06 02:56:27'),
(5, 'DM005', 'Kumaran4', 'MALE', 'MANAGING DIRECTOR', 'NA', '44535', 'CHENNAI', '27681', 'AUGUSTIN', 'PAN127', 'ADH127', 'UAN127', 'EPF127', 'Not Applicable', 'HDFC BANK', 'ACCNO127', 'HDFC0000005', 'Apr-26', '36000', '18000', '200', '5800', '60000', '30', '30', '0', '0', '36000', '0', '18000', '0', '200', '0', '5800', '0', '0', '60000', '15000', '0', '1800', '0', '75', '0', '75', '0', '0', '0', '61950', '1800', '0', '0', '208', '2990', '0', '210', '0', '0', '5208', '54792', 'Rupees Fifty Four Thousand Seven Hundred Ninety Two Only', '8.79', '4', '8.79', '=B6&\"_\"&C6&\"_\"&\"Payslip\"&\"_\"&S6', 'KUMARAN@DUNAMISMACHINES.CO.IN', '=\"Dear\"&\" \"&C6', '2022-06-06 02:56:27', '2022-06-06 02:56:27'),
(6, 'DM006', 'Kumaran5', 'MALE', 'MANAGING DIRECTOR', 'NA', '44536', 'CHENNAI', '27682', 'AUGUSTIN', 'PAN128', 'ADH128', 'UAN128', 'EPF128', 'Not Applicable', 'HDFC BANK', 'ACCNO128', 'HDFC0000006', 'Apr-27', '36000', '18000', '200', '5800', '60000', '30', '30', '0', '0', '36000', '0', '18000', '0', '200', '0', '5800', '0', '0', '60000', '15000', '0', '1800', '0', '75', '0', '75', '0', '0', '0', '61950', '1800', '0', '0', '208', '2990', '0', '210', '0', '0', '5208', '54792', 'Rupees Fifty Four Thousand Seven Hundred Ninety Two Only', '8.80', '5', '8.80', '=B7&\"_\"&C7&\"_\"&\"Payslip\"&\"_\"&S7', 'KUMARAN@DUNAMISMACHINES.CO.IN', '=\"Dear\"&\" \"&C7', '2022-06-06 02:56:27', '2022-06-06 02:56:27'),
(7, 'DM007', 'Kumaran6', 'MALE', 'MANAGING DIRECTOR', 'NA', '44537', 'CHENNAI', '27683', 'AUGUSTIN', 'PAN129', 'ADH129', 'UAN129', 'EPF129', 'Not Applicable', 'HDFC BANK', 'ACCNO129', 'HDFC0000007', 'Apr-28', '36000', '18000', '200', '5800', '60000', '30', '30', '0', '0', '36000', '0', '18000', '0', '200', '0', '5800', '0', '0', '60000', '15000', '0', '1800', '0', '75', '0', '75', '0', '0', '0', '61950', '1800', '0', '0', '208', '2990', '0', '210', '0', '0', '5208', '54792', 'Rupees Fifty Four Thousand Seven Hundred Ninety Two Only', '8.81', '6', '8.81', '=B8&\"_\"&C8&\"_\"&\"Payslip\"&\"_\"&S8', 'KUMARAN@DUNAMISMACHINES.CO.IN', '=\"Dear\"&\" \"&C8', '2022-06-06 02:56:27', '2022-06-06 02:56:27'),
(8, 'DM008', 'Kumaran7', 'MALE', 'MANAGING DIRECTOR', 'NA', '44538', 'CHENNAI', '27684', 'AUGUSTIN', 'PAN130', 'ADH130', 'UAN130', 'EPF130', 'Not Applicable', 'HDFC BANK', 'ACCNO130', 'HDFC0000008', 'Apr-29', '36000', '18000', '200', '5800', '60000', '30', '30', '0', '0', '36000', '0', '18000', '0', '200', '0', '5800', '0', '0', '60000', '15000', '0', '1800', '0', '75', '0', '75', '0', '0', '0', '61950', '1800', '0', '0', '208', '2990', '0', '210', '0', '0', '5208', '54792', 'Rupees Fifty Four Thousand Seven Hundred Ninety Two Only', '8.82', '7', '8.82', '=B9&\"_\"&C9&\"_\"&\"Payslip\"&\"_\"&S9', 'KUMARAN@DUNAMISMACHINES.CO.IN', '=\"Dear\"&\" \"&C9', '2022-06-06 02:56:27', '2022-06-06 02:56:27'),
(9, 'DM009', 'Kumaran8', 'MALE', 'MANAGING DIRECTOR', 'NA', '44539', 'CHENNAI', '27685', 'AUGUSTIN', 'PAN131', 'ADH131', 'UAN131', 'EPF131', 'Not Applicable', 'HDFC BANK', 'ACCNO131', 'HDFC0000009', 'Apr-30', '36000', '18000', '200', '5800', '60000', '30', '30', '0', '0', '36000', '0', '18000', '0', '200', '0', '5800', '0', '0', '60000', '15000', '0', '1800', '0', '75', '0', '75', '0', '0', '0', '61950', '1800', '0', '0', '208', '2990', '0', '210', '0', '0', '5208', '54792', 'Rupees Fifty Four Thousand Seven Hundred Ninety Two Only', '8.83', '8', '8.83', '=B10&\"_\"&C10&\"_\"&\"Payslip\"&\"_\"&S10', 'KUMARAN@DUNAMISMACHINES.CO.IN', '=\"Dear\"&\" \"&C10', '2022-06-06 02:56:27', '2022-06-06 02:56:27'),
(10, 'DM010', 'Kumaran9', 'MALE', 'MANAGING DIRECTOR', 'NA', '44540', 'CHENNAI', '27686', 'AUGUSTIN', 'PAN132', 'ADH132', 'UAN132', 'EPF132', 'Not Applicable', 'HDFC BANK', 'ACCNO132', 'HDFC0000010', 'Apr-31', '36000', '18000', '200', '5800', '60000', '30', '30', '0', '0', '36000', '0', '18000', '0', '200', '0', '5800', '0', '0', '60000', '15000', '0', '1800', '0', '75', '0', '75', '0', '0', '0', '61950', '1800', '0', '0', '208', '2990', '0', '210', '0', '0', '5208', '54792', 'Rupees Fifty Four Thousand Seven Hundred Ninety Two Only', '8.84', '9', '8.84', '=B11&\"_\"&C11&\"_\"&\"Payslip\"&\"_\"&S11', 'KUMARAN@DUNAMISMACHINES.CO.IN', '=\"Dear\"&\" \"&C11', '2022-06-06 02:56:27', '2022-06-06 02:56:27'),
(11, 'DM011', 'Kumaran10', 'MALE', 'MANAGING DIRECTOR', 'NA', '44541', 'CHENNAI', '27687', 'AUGUSTIN', 'PAN133', 'ADH133', 'UAN133', 'EPF133', 'Not Applicable', 'HDFC BANK', 'ACCNO133', 'HDFC0000011', 'Apr-32', '36000', '18000', '200', '5800', '60000', '30', '30', '0', '0', '36000', '0', '18000', '0', '200', '0', '5800', '0', '0', '60000', '15000', '0', '1800', '0', '75', '0', '75', '0', '0', '0', '61950', '1800', '0', '0', '208', '2990', '0', '210', '0', '0', '5208', '54792', 'Rupees Fifty Four Thousand Seven Hundred Ninety Two Only', '8.85', '10', '8.85', '=B12&\"_\"&C12&\"_\"&\"Payslip\"&\"_\"&S12', 'KUMARAN@DUNAMISMACHINES.CO.IN', '=\"Dear\"&\" \"&C12', '2022-06-06 02:56:27', '2022-06-06 02:56:27'),
(12, 'DM012', 'Kumaran11', 'MALE', 'MANAGING DIRECTOR', 'NA', '44542', 'CHENNAI', '27688', 'AUGUSTIN', 'PAN134', 'ADH134', 'UAN134', 'EPF134', 'Not Applicable', 'HDFC BANK', 'ACCNO134', 'HDFC0000012', 'Apr-33', '36000', '18000', '200', '5800', '60000', '30', '30', '0', '0', '36000', '0', '18000', '0', '200', '0', '5800', '0', '0', '60000', '15000', '0', '1800', '0', '75', '0', '75', '0', '0', '0', '61950', '1800', '0', '0', '208', '2990', '0', '210', '0', '0', '5208', '54792', 'Rupees Fifty Four Thousand Seven Hundred Ninety Two Only', '8.86', '11', '8.86', '=B13&\"_\"&C13&\"_\"&\"Payslip\"&\"_\"&S13', 'KUMARAN@DUNAMISMACHINES.CO.IN', '=\"Dear\"&\" \"&C13', '2022-06-06 02:56:27', '2022-06-06 02:56:27'),
(13, 'DM013', 'Kumaran12', 'MALE', 'MANAGING DIRECTOR', 'NA', '44543', 'CHENNAI', '27689', 'AUGUSTIN', 'PAN135', 'ADH135', 'UAN135', 'EPF135', 'Not Applicable', 'HDFC BANK', 'ACCNO135', 'HDFC0000013', 'Apr-34', '36000', '18000', '200', '5800', '60000', '30', '30', '0', '0', '36000', '0', '18000', '0', '200', '0', '5800', '0', '0', '60000', '15000', '0', '1800', '0', '75', '0', '75', '0', '0', '0', '61950', '1800', '0', '0', '208', '2990', '0', '210', '0', '0', '5208', '54792', 'Rupees Fifty Four Thousand Seven Hundred Ninety Two Only', '8.87', '12', '8.87', '=B14&\"_\"&C14&\"_\"&\"Payslip\"&\"_\"&S14', 'KUMARAN@DUNAMISMACHINES.CO.IN', '=\"Dear\"&\" \"&C14', '2022-06-06 02:56:27', '2022-06-06 02:56:27'),
(14, 'DM014', 'Kumaran13', 'MALE', 'MANAGING DIRECTOR', 'NA', '44544', 'CHENNAI', '27690', 'AUGUSTIN', 'PAN136', 'ADH136', 'UAN136', 'EPF136', 'Not Applicable', 'HDFC BANK', 'ACCNO136', 'HDFC0000014', 'Apr-35', '36000', '18000', '200', '5800', '60000', '30', '30', '0', '0', '36000', '0', '18000', '0', '200', '0', '5800', '0', '0', '60000', '15000', '0', '1800', '0', '75', '0', '75', '0', '0', '0', '61950', '1800', '0', '0', '208', '2990', '0', '210', '0', '0', '5208', '54792', 'Rupees Fifty Four Thousand Seven Hundred Ninety Two Only', '8.88', '13', '8.88', '=B15&\"_\"&C15&\"_\"&\"Payslip\"&\"_\"&S15', 'KUMARAN@DUNAMISMACHINES.CO.IN', '=\"Dear\"&\" \"&C15', '2022-06-06 02:56:27', '2022-06-06 02:56:27'),
(15, 'DM015', 'Kumaran14', 'MALE', 'MANAGING DIRECTOR', 'NA', '44545', 'CHENNAI', '27691', 'AUGUSTIN', 'PAN137', 'ADH137', 'UAN137', 'EPF137', 'Not Applicable', 'HDFC BANK', 'ACCNO137', 'HDFC0000015', 'Apr-36', '36000', '18000', '200', '5800', '60000', '30', '30', '0', '0', '36000', '0', '18000', '0', '200', '0', '5800', '0', '0', '60000', '15000', '0', '1800', '0', '75', '0', '75', '0', '0', '0', '61950', '1800', '0', '0', '208', '2990', '0', '210', '0', '0', '5208', '54792', 'Rupees Fifty Four Thousand Seven Hundred Ninety Two Only', '8.89', '14', '8.89', '=B16&\"_\"&C16&\"_\"&\"Payslip\"&\"_\"&S16', 'KUMARAN@DUNAMISMACHINES.CO.IN', '=\"Dear\"&\" \"&C16', '2022-06-06 02:56:27', '2022-06-06 02:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `vmt_employee_pms_goals_table`
--

CREATE TABLE `vmt_employee_pms_goals_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `self_kpi_review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `self_kpi_percentage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `self_kpi_comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_kpi_review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_kpi_percentage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_kpi_comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hr_kpi_review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hr_kpi_percentage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hr_kpi_comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kpi_table_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignment_period` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coverage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviewer_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_employee_accepted` tinyint(1) DEFAULT NULL,
  `is_employee_submitted` tinyint(11) DEFAULT NULL,
  `is_manager_approved` tinyint(4) DEFAULT NULL,
  `is_manager_submitted` tinyint(4) DEFAULT NULL,
  `is_hr_submitted` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vmt_employee_pms_goals_table`
--

INSERT INTO `vmt_employee_pms_goals_table` (`id`, `self_kpi_review`, `self_kpi_percentage`, `self_kpi_comments`, `manager_kpi_review`, `manager_kpi_percentage`, `manager_kpi_comments`, `hr_kpi_review`, `hr_kpi_percentage`, `hr_kpi_comments`, `kpi_table_id`, `assignment_period`, `coverage`, `reviewer_id`, `employee_id`, `mail_link`, `author_id`, `is_employee_accepted`, `is_employee_submitted`, `is_manager_approved`, `is_manager_submitted`, `is_hr_submitted`, `created_at`, `updated_at`) VALUES
(35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '22', 'Jan', NULL, '2', '5', 'http://localhost:8000/vmt-pmsappraisal-review', '1', 0, 0, NULL, NULL, NULL, '2022-07-02 12:23:05', '2022-07-02 12:23:05'),
(36, '{\"37\":\"emp typed\"}', '{\"37\":\"emp typed\"}', '{\"37\":\"emp typed\"}', '{\"37\":\"mgr typed\"}', '{\"37\":\"mgr typed\"}', NULL, '', '', NULL, '22', 'Jan', NULL, '2', '4', 'http://localhost:8000/vmt-pmsappraisal-review', '1', 0, 0, NULL, NULL, NULL, '2022-07-02 12:23:05', '2022-07-03 01:55:27'),
(37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24', 'Jan', NULL, '2', '4', 'http://localhost:8000/vmt-pmsappraisal-review', '4', 0, 0, 0, 0, 0, '2022-07-03 02:43:58', '2022-07-03 02:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `vmt_general_info`
--

CREATE TABLE `vmt_general_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_instruction` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vmt_general_info`
--

INSERT INTO `vmt_general_info` (`id`, `short_name`, `login_instruction`, `logo_img`, `background_img`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '/generalinfo/1656777514-logo.jpg', '/generalinfo/1656524696-bg.jpg', '2022-06-08 00:24:40', '2022-07-02 10:28:34'),
(2, 'Hello', 'adfasdfasdf', '/generalinfo/1654667695-logo.png', '/generalinfo/1654667695-bg.jpg', '2022-06-08 00:24:55', '2022-06-08 00:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `vmt_general_settings`
--

CREATE TABLE `vmt_general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workflow_component` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `associate_wise_template` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kra_competency` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `increment_percentage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_component` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating_preference` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annual_score_calculation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_employee_review_rating` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_review_components` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage_components` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage_groupwise` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finalscore_calculation_method` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achievement_based_rating` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_all_managers_to_employee` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_rated_managers` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating_period_based` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating_component` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vmt_general_settings`
--

INSERT INTO `vmt_general_settings` (`id`, `workflow_component`, `associate_wise_template`, `kra_competency`, `increment_percentage`, `report_component`, `rating_preference`, `annual_score_calculation`, `show_employee_review_rating`, `employee_review_components`, `percentage_components`, `percentage_groupwise`, `finalscore_calculation_method`, `achievement_based_rating`, `show_all_managers_to_employee`, `show_rated_managers`, `rating_period_based`, `rating_component`, `created_at`, `updated_at`) VALUES
(1, 'Option-1', 'on', 'Option-1', 'Option-1', 'Option-1', 'Option-1', 'Option-1', 'on', 'Option-1', 'Option-1', 'on', 'Option-1', 'on', 'on', 'on', 'Monthssss', 'Option-1', '2022-05-31 12:20:46', '2022-05-31 12:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `vmt_kpi_table`
--

CREATE TABLE `vmt_kpi_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kpi_rows` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vmt_kpi_table`
--

INSERT INTO `vmt_kpi_table` (`id`, `kpi_rows`, `author_id`, `author_name`, `created_at`, `updated_at`) VALUES
(22, '37', '1', 'HR Augustin', '2022-07-02 12:23:02', '2022-07-02 12:23:02'),
(23, '38,39', '4', 'Emp Praveen', '2022-07-03 02:38:33', '2022-07-03 02:38:33'),
(24, '40,41', '4', 'Emp Praveen', '2022-07-03 02:39:36', '2022-07-03 02:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `vmt_performance_apraisal_questions`
--

CREATE TABLE `vmt_performance_apraisal_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dimension` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kpi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operational_definition` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `measure` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frequency` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stretch_target` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kpi_weightage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vmt_performance_apraisal_questions`
--

INSERT INTO `vmt_performance_apraisal_questions` (`id`, `dimension`, `kpi`, `operational_definition`, `measure`, `frequency`, `target`, `stretch_target`, `source`, `kpi_weightage`, `author_id`, `author_name`, `created_at`, `updated_at`) VALUES
(37, 'July 2_ 11:20pm', '`July 2_ 9:50pm', 'July 2_ 9:50pm', 'July 2_ 9:50pm', 'July 2_ 9:50pm', 'July 2_ 9:50pm', 'July 2_ 9:50pm', 'July 2_ 9:50pm', 'July 2_ 9:50pm', '1', 'HR Augustin', '2022-07-02 12:23:02', '2022-07-02 12:23:02'),
(38, 'July 3rd, emp sets goal', 'emp sets goal', 'emp sets goal', 'emp sets goal', 'emp sets goal', 'emp sets goal', 'emp sets goal', 'emp sets goal', 'emp sets goal', '4', 'Emp Praveen', '2022-07-03 02:38:33', '2022-07-03 02:38:33'),
(39, 'July 3rd, emp sets goal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'Emp Praveen', '2022-07-03 02:38:33', '2022-07-03 02:38:33'),
(40, 'July 3rd, emp sets goal', 'emp sets goal', 'emp sets goal', 'emp sets goal', 'emp sets goal', 'emp sets goal', 'emp sets goal', 'emp sets goal', 'emp sets goal', '4', 'Emp Praveen', '2022-07-03 02:39:36', '2022-07-03 02:39:36'),
(41, 'July 3rd, emp sets goal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'Emp Praveen', '2022-07-03 02:39:36', '2022-07-03 02:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `vmt_reviewforms`
--

CREATE TABLE `vmt_reviewforms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `questions` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `author_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vmt_reviewforms`
--

INSERT INTO `vmt_reviewforms` (`id`, `name`, `questions`, `author_id`, `author_name`, `created_at`, `updated_at`) VALUES
(1, 'Form 1', '1,2,3', 2, 'praveen', '2022-05-20 07:00:37', '2022-05-22 02:02:38'),
(2, 'Form 2', '2', 1, 'admin', '2022-05-23 10:13:44', '2022-05-23 10:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `vmt_reviewquestions`
--

CREATE TABLE `vmt_reviewquestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `author_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vmt_reviewquestions`
--

INSERT INTO `vmt_reviewquestions` (`id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `answer`, `author_id`, `author_name`, `created_at`, `updated_at`) VALUES
(1, '1THis is a test question', 'op1', 'op2', 'op3', 'op4', 'op5', 'op12345', 1, 'admin', '2022-05-18 03:53:25', '2022-05-19 00:15:44'),
(2, 'This is question 2222', 'op11', 'op22', 'op33', 'op44', 'op55', 'op33', 1, 'admin', '2022-05-18 03:53:57', '2022-05-18 03:54:13'),
(3, 'Q 3', '111', '222', '333', '444', '555', '444', 2, 'praveen', '2022-05-22 02:00:48', '2022-05-22 02:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `vmt_reviewuserforms`
--

CREATE TABLE `vmt_reviewuserforms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vmt_reviewuserforms`
--

INSERT INTO `vmt_reviewuserforms` (`id`, `form_id`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 1, 1, '2022-05-31 12:17:33', '2022-05-31 12:17:33');

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vmt_client_master`
--
ALTER TABLE `vmt_client_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vmt_employee_details`
--
ALTER TABLE `vmt_employee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vmt_employee_hierarchies`
--
ALTER TABLE `vmt_employee_hierarchies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vmt_employee_office_details`
--
ALTER TABLE `vmt_employee_office_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vmt_employee_payslip`
--
ALTER TABLE `vmt_employee_payslip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vmt_employee_pms_goals_table`
--
ALTER TABLE `vmt_employee_pms_goals_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vmt_general_info`
--
ALTER TABLE `vmt_general_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vmt_general_settings`
--
ALTER TABLE `vmt_general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vmt_kpi_table`
--
ALTER TABLE `vmt_kpi_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vmt_performance_apraisal_questions`
--
ALTER TABLE `vmt_performance_apraisal_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vmt_reviewforms`
--
ALTER TABLE `vmt_reviewforms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vmt_reviewquestions`
--
ALTER TABLE `vmt_reviewquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vmt_reviewuserforms`
--
ALTER TABLE `vmt_reviewuserforms`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `vmt_client_master`
--
ALTER TABLE `vmt_client_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vmt_employee_details`
--
ALTER TABLE `vmt_employee_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `vmt_employee_hierarchies`
--
ALTER TABLE `vmt_employee_hierarchies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `vmt_employee_office_details`
--
ALTER TABLE `vmt_employee_office_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `vmt_employee_payslip`
--
ALTER TABLE `vmt_employee_payslip`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vmt_employee_pms_goals_table`
--
ALTER TABLE `vmt_employee_pms_goals_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `vmt_general_info`
--
ALTER TABLE `vmt_general_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vmt_general_settings`
--
ALTER TABLE `vmt_general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vmt_kpi_table`
--
ALTER TABLE `vmt_kpi_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vmt_performance_apraisal_questions`
--
ALTER TABLE `vmt_performance_apraisal_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `vmt_reviewforms`
--
ALTER TABLE `vmt_reviewforms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vmt_reviewquestions`
--
ALTER TABLE `vmt_reviewquestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vmt_reviewuserforms`
--
ALTER TABLE `vmt_reviewuserforms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
