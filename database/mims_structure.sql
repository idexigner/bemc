-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 07:30 AM
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
-- Database: `mims`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `address_title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_category` int(11) NOT NULL,
  `address_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_contact` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_is_active` tinyint(4) DEFAULT 1,
  `address_is_deleted` tinyint(4) DEFAULT 0,
  `address_created_by` int(11) NOT NULL,
  `address_created_at` timestamp NULL DEFAULT current_timestamp(),
  `address_updated_by` int(11) DEFAULT NULL,
  `address_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `address_category`
--

CREATE TABLE `address_category` (
  `address_category_id` bigint(20) UNSIGNED NOT NULL,
  `address_category_title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_category_is_active` tinyint(4) DEFAULT 1,
  `address_category_is_deleted` tinyint(4) DEFAULT 0,
  `address_category_created_by` int(11) NOT NULL,
  `address_category_created_at` timestamp NULL DEFAULT current_timestamp(),
  `address_category_updated_by` int(11) DEFAULT NULL,
  `address_category_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `advertisement_id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_title` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advertisement_organization` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advertisement_category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advertisement_link` varchar(1200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advertisement_publish` date NOT NULL,
  `advertisement_unpublish` date NOT NULL,
  `advertisement_image` varchar(1200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advertisement_generic_id` int(11) DEFAULT NULL,
  `advertisement_brand_id` int(11) DEFAULT NULL,
  `advertisement_indication_id` int(11) DEFAULT NULL,
  `advertisement_manufacturer_id` int(11) DEFAULT NULL,
  `advertisement_position` int(11) DEFAULT NULL,
  `advertisement_is_featured` tinyint(4) DEFAULT 0,
  `advertisement_is_active` tinyint(4) DEFAULT 1,
  `advertisemephpnt_is_deleted` tinyint(4) DEFAULT 0,
  `advertisement_created_by` int(11) NOT NULL,
  `advertisement_created_at` timestamp NULL DEFAULT current_timestamp(),
  `advertisement_updated_by` int(11) DEFAULT NULL,
  `advertisement_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_position`
--

CREATE TABLE `advertisement_position` (
  `advertisement_position_id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_position_name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advertisement_position_class_name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advertisement_position_width` int(11) NOT NULL,
  `advertisement_position_height` int(11) NOT NULL,
  `advertisement_position_number` int(11) DEFAULT 0,
  `advertisement_position_interval` int(11) DEFAULT 1,
  `advertisement_position_price` int(11) DEFAULT 1,
  `advertisement_position_is_featured` tinyint(4) DEFAULT 0,
  `advertisement_position_is_active` tinyint(4) DEFAULT 1,
  `advertisement_position_is_deleted` tinyint(4) DEFAULT 0,
  `advertisement_position_created_by` int(11) NOT NULL,
  `advertisement_position_created_at` timestamp NULL DEFAULT current_timestamp(),
  `advertisement_position_updated_by` int(11) DEFAULT NULL,
  `advertisement_position_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `brand_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_generic_id` int(11) NOT NULL,
  `brand_manufacturer_id` int(11) NOT NULL,
  `brand_dosage_form_id` int(11) NOT NULL,
  `brand_strength_id` int(11) NOT NULL,
  `brand_pack_size_id` int(11) NOT NULL,
  `brand_image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_price` double(8,2) NOT NULL,
  `brand_is_hightlight` tinyint(4) DEFAULT 0,
  `brand_is_new_product` tinyint(4) DEFAULT 0,
  `brand_is_new_brand` tinyint(4) DEFAULT 0,
  `brand_is_new_presentation` tinyint(4) DEFAULT 0,
  `brand_is_active` tinyint(4) DEFAULT 1,
  `brand_is_deleted` tinyint(4) DEFAULT 0,
  `brand_created_by` int(11) NOT NULL,
  `brand_created_at` timestamp NULL DEFAULT current_timestamp(),
  `brand_updated_by` int(11) DEFAULT NULL,
  `brand_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_state_id` int(11) NOT NULL,
  `city_is_active` tinyint(4) DEFAULT 1,
  `city_is_deleted` tinyint(4) DEFAULT 0,
  `city_created_by` int(11) NOT NULL,
  `city_created_at` timestamp NULL DEFAULT current_timestamp(),
  `city_updated_by` int(11) DEFAULT NULL,
  `city_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_is_active` tinyint(4) DEFAULT 1,
  `country_is_deleted` tinyint(4) DEFAULT 0,
  `country_created_by` int(11) NOT NULL,
  `country_created_at` timestamp NULL DEFAULT current_timestamp(),
  `country_updated_by` int(11) DEFAULT NULL,
  `country_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_phone_personal` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_phone_clinic` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_specialization` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_achievement` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_experience` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_profession_degree` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_certificate` varchar(1200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_image` varchar(1200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_bio_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_country_id` int(11) DEFAULT NULL,
  `doctor_state_id` int(11) DEFAULT NULL,
  `doctor_city_id` int(11) DEFAULT NULL,
  `doctor_zip_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_is_featured` tinyint(4) DEFAULT 0,
  `doctor_is_active` tinyint(4) DEFAULT 1,
  `doctor_is_deleted` tinyint(4) DEFAULT 0,
  `doctor_created_by` int(11) NOT NULL,
  `doctor_created_at` timestamp NULL DEFAULT current_timestamp(),
  `doctor_updated_by` int(11) DEFAULT NULL,
  `doctor_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosageform`
--

CREATE TABLE `dosageform` (
  `dosageform_id` bigint(20) UNSIGNED NOT NULL,
  `dosageform_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosageform_is_active` tinyint(4) DEFAULT 1,
  `dosageform_is_deleted` tinyint(4) DEFAULT 0,
  `dosageform_created_by` int(11) NOT NULL,
  `dosageform_created_at` timestamp NULL DEFAULT current_timestamp(),
  `dosageform_updated_by` int(11) DEFAULT NULL,
  `dosageform_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `error_logs`
--

CREATE TABLE `error_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stack_trace` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `generic`
--

CREATE TABLE `generic` (
  `generic_id` bigint(20) UNSIGNED NOT NULL,
  `generic_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `generic_classification` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generic_safety_remark` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generic_indication` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generic_indication_tags` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generic_dosage_administration` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generic_contraindication_precaution` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generic_composition` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generic_pharmacology` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generic_interaction` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generic_side_effect` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generic_overdose_effect` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generic_storage_condition` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generic_pregnancy_lactation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generic_is_active` tinyint(4) DEFAULT 1,
  `generic_is_deleted` tinyint(4) DEFAULT 0,
  `generic_created_by` int(11) DEFAULT NULL,
  `generic_created_at` timestamp NULL DEFAULT current_timestamp(),
  `generic_updated_by` int(11) DEFAULT NULL,
  `generic_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indication`
--

CREATE TABLE `indication` (
  `indication_id` bigint(20) UNSIGNED NOT NULL,
  `indication_name` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indication_is_active` tinyint(4) DEFAULT 1,
  `indication_is_deleted` tinyint(4) DEFAULT 0,
  `indication_created_by` int(11) NOT NULL,
  `indication_created_at` timestamp NULL DEFAULT current_timestamp(),
  `indication_updated_by` int(11) DEFAULT NULL,
  `indication_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indication_generic_mapping`
--

CREATE TABLE `indication_generic_mapping` (
  `indication_mapping_id` bigint(20) UNSIGNED NOT NULL,
  `indication_mapping_indication_id` int(11) NOT NULL,
  `indication_mapping_generic_id` int(11) NOT NULL,
  `indication_mapping_is_active` tinyint(4) DEFAULT 1,
  `indication_mapping_is_deleted` tinyint(4) DEFAULT 0,
  `indication_mapping_created_by` int(11) NOT NULL,
  `indication_mapping_created_at` timestamp NULL DEFAULT current_timestamp(),
  `indication_mapping_updated_by` int(11) DEFAULT NULL,
  `indication_mapping_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `job_category` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_organization` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_organization_logo` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_position` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_application_deadline` datetime NOT NULL,
  `job_publish_date` datetime NOT NULL,
  `job_image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_salary` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_educational_requirement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_experience_requirement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_vacancy` int(11) DEFAULT NULL,
  `job_age_limit` int(11) DEFAULT NULL,
  `job_location` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_source` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_employment_type` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_nature` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_application_procedure` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_is_active` tinyint(4) DEFAULT 1,
  `job_is_deleted` tinyint(4) DEFAULT 0,
  `job_created_by` int(11) NOT NULL,
  `job_created_at` timestamp NULL DEFAULT current_timestamp(),
  `job_updated_by` int(11) DEFAULT NULL,
  `job_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `journal_id` bigint(20) UNSIGNED NOT NULL,
  `journal_title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `journal_category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `journal_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `journal_image` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `journal_is_active` tinyint(4) DEFAULT 1,
  `journal_is_deleted` tinyint(4) DEFAULT 0,
  `journal_created_by` int(11) NOT NULL,
  `journal_created_at` timestamp NULL DEFAULT current_timestamp(),
  `journal_updated_by` int(11) DEFAULT NULL,
  `journal_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `location_country_id` int(11) NOT NULL,
  `location_state_id` int(11) NOT NULL,
  `location_city_id` int(11) NOT NULL,
  `location_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_longitude` double(8,2) DEFAULT NULL,
  `location_latitude` double(8,2) DEFAULT NULL,
  `location_is_active` tinyint(4) DEFAULT 1,
  `location_is_deleted` tinyint(4) DEFAULT 0,
  `location_created_by` int(11) NOT NULL,
  `location_created_at` timestamp NULL DEFAULT current_timestamp(),
  `location_updated_by` int(11) DEFAULT NULL,
  `location_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `manufacturer_id` bigint(20) UNSIGNED NOT NULL,
  `manufacturer_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer_phone` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer_mobile` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer_fax` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer_location_id` int(11) DEFAULT NULL,
  `manufacturer_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer_country_id` int(11) DEFAULT NULL,
  `manufacturer_state_id` int(11) DEFAULT NULL,
  `manufacturer_city_id` int(11) DEFAULT NULL,
  `manufacturer_longitude` double(8,2) DEFAULT NULL,
  `manufacturer_latitude` double(8,2) DEFAULT NULL,
  `manufacturer_is_active` tinyint(4) DEFAULT 1,
  `manufacturer_is_deleted` tinyint(4) DEFAULT 0,
  `manufacturer_created_by` int(11) NOT NULL,
  `manufacturer_created_at` timestamp NULL DEFAULT current_timestamp(),
  `manufacturer_updated_by` int(11) DEFAULT NULL,
  `manufacturer_updated_at` timestamp NULL DEFAULT current_timestamp()
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

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `news_title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_image` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_publish_date` date NOT NULL,
  `news_unpublish_date` date NOT NULL,
  `news_is_active` tinyint(4) DEFAULT 1,
  `news_is_deleted` tinyint(4) DEFAULT 0,
  `news_created_by` int(11) NOT NULL,
  `news_created_at` timestamp NULL DEFAULT current_timestamp(),
  `news_updated_by` int(11) DEFAULT NULL,
  `news_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packsize`
--

CREATE TABLE `packsize` (
  `packsize_id` bigint(20) UNSIGNED NOT NULL,
  `packsize_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packsize_is_active` tinyint(4) DEFAULT 1,
  `packsize_is_deleted` tinyint(4) DEFAULT 0,
  `packsize_created_by` int(11) NOT NULL,
  `packsize_created_at` timestamp NULL DEFAULT current_timestamp(),
  `packsize_updated_by` int(11) DEFAULT NULL,
  `packsize_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `specialization_id` bigint(20) UNSIGNED NOT NULL,
  `specialization_name` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization_is_active` tinyint(4) DEFAULT 1,
  `specialization_is_deleted` tinyint(4) DEFAULT 0,
  `specialization_created_by` int(11) NOT NULL,
  `specialization_created_at` timestamp NULL DEFAULT current_timestamp(),
  `specialization_updated_by` int(11) DEFAULT NULL,
  `specialization_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialization_doctor_mapping`
--

CREATE TABLE `specialization_doctor_mapping` (
  `specialization_mapping_id` bigint(20) UNSIGNED NOT NULL,
  `specialization_mapping_specialization_id` int(11) NOT NULL,
  `specialization_mapping_doctor_id` int(11) NOT NULL,
  `specialization_mapping_is_active` tinyint(4) DEFAULT 1,
  `specialization_mapping_is_deleted` tinyint(4) DEFAULT 0,
  `specialization_mapping_created_by` int(11) NOT NULL,
  `specialization_mapping_created_at` timestamp NULL DEFAULT current_timestamp(),
  `specialization_mapping_updated_by` int(11) DEFAULT NULL,
  `specialization_mapping_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `special_report`
--

CREATE TABLE `special_report` (
  `special_report_id` bigint(20) UNSIGNED NOT NULL,
  `special_report_title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_report_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_report_link_address` varchar(1200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_report_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_report_is_featured` tinyint(4) DEFAULT 0,
  `special_report_is_active` tinyint(4) DEFAULT 1,
  `special_report_is_deleted` tinyint(4) DEFAULT 0,
  `special_report_created_by` int(11) NOT NULL,
  `special_report_created_at` timestamp NULL DEFAULT current_timestamp(),
  `special_report_updated_by` int(11) DEFAULT NULL,
  `special_report_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_country_id` int(11) NOT NULL,
  `state_is_active` tinyint(4) DEFAULT 1,
  `state_is_deleted` tinyint(4) DEFAULT 0,
  `state_created_by` int(11) NOT NULL,
  `state_created_at` timestamp NULL DEFAULT current_timestamp(),
  `state_updated_by` int(11) DEFAULT NULL,
  `state_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `strength`
--

CREATE TABLE `strength` (
  `strength_id` bigint(20) UNSIGNED NOT NULL,
  `strength_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strength_is_active` tinyint(4) DEFAULT 1,
  `strength_is_deleted` tinyint(4) DEFAULT 0,
  `strength_created_by` int(11) NOT NULL,
  `strength_created_at` timestamp NULL DEFAULT current_timestamp(),
  `strength_updated_by` int(11) DEFAULT NULL,
  `strength_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `zipcode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `is_deleted` tinyint(4) DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_module_mapping`
--

CREATE TABLE `user_module_mapping` (
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `module_user_id` int(11) NOT NULL,
  `module_generic` tinyint(4) DEFAULT 0,
  `module_brand` tinyint(4) DEFAULT 0,
  `module_manufacturer` tinyint(4) DEFAULT 0,
  `module_dosage_form` tinyint(4) DEFAULT 0,
  `module_strength` tinyint(4) DEFAULT 0,
  `module_pack_size` tinyint(4) DEFAULT 0,
  `module_indication` tinyint(4) DEFAULT 0,
  `module_scroller` tinyint(4) DEFAULT 0,
  `module_doctor` tinyint(4) DEFAULT 0,
  `module_job` tinyint(4) DEFAULT 0,
  `module_news` tinyint(4) DEFAULT 0,
  `module_journal` tinyint(4) DEFAULT 0,
  `module_address` tinyint(4) DEFAULT 0,
  `module_advertisement` tinyint(4) DEFAULT 0,
  `module_special_report` tinyint(4) DEFAULT 0,
  `module_video` tinyint(4) DEFAULT 0,
  `module_user` tinyint(4) DEFAULT 0,
  `module_setting` tinyint(4) DEFAULT 0,
  `module_created_by` int(11) NOT NULL,
  `module_created_at` timestamp NULL DEFAULT current_timestamp(),
  `module_updated_by` int(11) DEFAULT NULL,
  `module_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_is_active` tinyint(4) DEFAULT 1,
  `role_is_deleted` tinyint(4) DEFAULT 0,
  `role_created_by` int(11) NOT NULL,
  `role_created_at` timestamp NULL DEFAULT current_timestamp(),
  `role_updated_by` int(11) NOT NULL,
  `role_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `video_title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` varchar(1200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_image` varchar(1200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_is_featured` tinyint(4) DEFAULT 0,
  `video_is_active` tinyint(4) DEFAULT 1,
  `video_is_deleted` tinyint(4) DEFAULT 0,
  `video_created_by` int(11) NOT NULL,
  `video_created_at` timestamp NULL DEFAULT current_timestamp(),
  `video_updated_by` int(11) DEFAULT NULL,
  `video_updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `address_category`
--
ALTER TABLE `address_category`
  ADD PRIMARY KEY (`address_category_id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`advertisement_id`);

--
-- Indexes for table `advertisement_position`
--
ALTER TABLE `advertisement_position`
  ADD PRIMARY KEY (`advertisement_position_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `dosageform`
--
ALTER TABLE `dosageform`
  ADD PRIMARY KEY (`dosageform_id`);

--
-- Indexes for table `error_logs`
--
ALTER TABLE `error_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `generic`
--
ALTER TABLE `generic`
  ADD PRIMARY KEY (`generic_id`);

--
-- Indexes for table `indication`
--
ALTER TABLE `indication`
  ADD PRIMARY KEY (`indication_id`);

--
-- Indexes for table `indication_generic_mapping`
--
ALTER TABLE `indication_generic_mapping`
  ADD PRIMARY KEY (`indication_mapping_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`journal_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `packsize`
--
ALTER TABLE `packsize`
  ADD PRIMARY KEY (`packsize_id`);

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
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`specialization_id`);

--
-- Indexes for table `specialization_doctor_mapping`
--
ALTER TABLE `specialization_doctor_mapping`
  ADD PRIMARY KEY (`specialization_mapping_id`);

--
-- Indexes for table `special_report`
--
ALTER TABLE `special_report`
  ADD PRIMARY KEY (`special_report_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `strength`
--
ALTER TABLE `strength`
  ADD PRIMARY KEY (`strength_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_module_mapping`
--
ALTER TABLE `user_module_mapping`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `address_category`
--
ALTER TABLE `address_category`
  MODIFY `address_category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `advertisement_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisement_position`
--
ALTER TABLE `advertisement_position`
  MODIFY `advertisement_position_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosageform`
--
ALTER TABLE `dosageform`
  MODIFY `dosageform_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `error_logs`
--
ALTER TABLE `error_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generic`
--
ALTER TABLE `generic`
  MODIFY `generic_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indication`
--
ALTER TABLE `indication`
  MODIFY `indication_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indication_generic_mapping`
--
ALTER TABLE `indication_generic_mapping`
  MODIFY `indication_mapping_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `journal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packsize`
--
ALTER TABLE `packsize`
  MODIFY `packsize_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `specialization_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialization_doctor_mapping`
--
ALTER TABLE `specialization_doctor_mapping`
  MODIFY `specialization_mapping_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `special_report`
--
ALTER TABLE `special_report`
  MODIFY `special_report_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `strength`
--
ALTER TABLE `strength`
  MODIFY `strength_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_module_mapping`
--
ALTER TABLE `user_module_mapping`
  MODIFY `module_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `video_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
