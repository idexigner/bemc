-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 05:39 AM
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

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`advertisement_id`, `advertisement_title`, `advertisement_organization`, `advertisement_category`, `advertisement_link`, `advertisement_publish`, `advertisement_unpublish`, `advertisement_image`, `advertisement_generic_id`, `advertisement_brand_id`, `advertisement_indication_id`, `advertisement_manufacturer_id`, `advertisement_position`, `advertisement_is_featured`, `advertisement_is_active`, `advertisemephpnt_is_deleted`, `advertisement_created_by`, `advertisement_created_at`, `advertisement_updated_by`, `advertisement_updated_at`) VALUES
(6, 'Gastrum', 'SK+F', '', '', '2023-05-08', '2023-09-01', '392798__Gastrum.jpg', NULL, NULL, NULL, NULL, 140, 1, 1, 0, 1, '2023-05-18 21:56:44', 1, '2023-05-18 21:56:44'),
(7, 'Gastrum2', 'SK+F', '', '', '2023-05-08', '2023-09-01', '392798__Gastrum.jpg', NULL, NULL, NULL, NULL, 140, 1, 1, 0, 1, '2023-05-18 21:56:44', 1, '2023-05-18 21:56:44'),
(8, 'Gastrum3', 'SK+F', '', '', '2023-05-08', '2023-09-01', '392798__Gastrum.jpg', NULL, NULL, NULL, NULL, 140, 1, 1, 0, 1, '2023-05-18 21:56:44', 1, '2023-05-18 21:56:44'),
(9, 'Title here', 'dummy2', '', '', '2023-05-01', '2023-10-07', '931564__s.jpg', NULL, NULL, NULL, NULL, 140, 0, 1, 0, 1, '2023-05-18 22:01:37', 1, '2023-05-18 22:01:37'),
(10, 'Title here', 'dummy3', '', 'https://google.com', '2023-05-01', '2023-10-07', '931564__s.jpg', NULL, NULL, NULL, NULL, 141, 0, 1, 0, 1, '2023-05-18 22:01:37', 1, '2023-05-20 17:15:01'),
(11, 'Gastrum3', 'SK+F', '', '', '2023-05-08', '2023-09-01', '392798__Gastrum.jpg', NULL, NULL, NULL, NULL, 226, 1, 1, 0, 1, '2023-05-18 21:56:44', 1, '2023-05-18 21:56:44'),
(12, 'Gastrum3', 'SK+F', '', '', '2023-05-08', '2023-09-01', '207902__amazing-nebula-in-space-SBI-301825516_800x450.jpg', NULL, NULL, NULL, NULL, 226, 1, 1, 0, 1, '2023-05-18 21:56:44', 1, '2023-05-18 21:56:44'),
(13, 'Gastrum3', 'SK+F', '', '', '2023-05-08', '2023-09-01', '392798__Gastrum.jpg', NULL, NULL, NULL, NULL, 226, 1, 1, 0, 1, '2023-05-18 21:56:44', 1, '2023-05-18 21:56:44'),
(14, 'Title here', 'dummy3', '', 'https://google.com', '2023-05-01', '2023-10-07', '931564__s.jpg', NULL, NULL, NULL, NULL, 142, 0, 1, 0, 1, '2023-05-18 22:01:37', 1, '2023-05-20 17:15:01'),
(15, 'Title here', 'Top left', '', 'link here', '2023-05-01', '2023-09-07', '977319__56e1b3dfe4f8a7ed4742c8305290b711.jpg', NULL, NULL, NULL, NULL, 144, 0, 1, 0, 1, '2023-05-20 18:18:32', 1, '2023-05-20 18:18:32'),
(16, 'aer', 'Top rigt', '', '#', '2023-04-30', '2024-02-28', '91686__17566e9add7ac9e8e7a30cf5db21e568.png', NULL, NULL, NULL, NULL, 145, 0, 1, 0, 1, '2023-05-20 18:19:03', 1, '2023-05-20 18:19:03'),
(17, 'Title here', 'sidebar', '', '#', '2023-05-01', '2024-01-31', '546101__17566e9add7ac9e8e7a30cf5db21e568.png', NULL, NULL, NULL, NULL, 143, 0, 1, 0, 1, '2023-05-20 18:19:31', 1, '2023-05-20 18:19:31'),
(18, 'title here', 'bottom one', '', 'alink', '2023-05-01', '2024-02-06', '545825__s.jpg', NULL, NULL, NULL, NULL, 146, 0, 1, 0, 1, '2023-05-20 18:20:49', 1, '2023-05-20 18:20:49'),
(19, 'Title here', 'Top left', '', 'link here', '2023-05-01', '2023-09-07', '977319__56e1b3dfe4f8a7ed4742c8305290b711.jpg', NULL, NULL, NULL, NULL, 221, 0, 1, 0, 1, '2023-05-20 18:18:32', 1, '2023-05-20 18:18:32'),
(20, 'aer', 'Top rigt', '', '#', '2023-04-30', '2024-02-28', '91686__17566e9add7ac9e8e7a30cf5db21e568.png', NULL, NULL, NULL, NULL, 222, 0, 1, 0, 1, '2023-05-20 18:19:03', 1, '2023-05-20 18:19:03'),
(21, 'Title here', 'sidebar', '', '#', '2023-05-01', '2024-01-31', '546101__17566e9add7ac9e8e7a30cf5db21e568.png', NULL, NULL, NULL, NULL, 220, 0, 1, 0, 1, '2023-05-20 18:19:31', 1, '2023-05-20 18:19:31'),
(22, 'title here', 'bottom one', '', 'alink', '2023-05-01', '2024-02-06', '545825__s.jpg', NULL, NULL, NULL, NULL, 223, 0, 1, 0, 1, '2023-05-20 18:20:49', 1, '2023-05-20 18:20:49'),
(23, 'Title here', 'Top left', '', 'link here', '2023-05-01', '2023-09-07', '977319__56e1b3dfe4f8a7ed4742c8305290b711.jpg', NULL, NULL, NULL, NULL, 209, 0, 1, 0, 1, '2023-05-20 18:18:32', 1, '2023-05-20 18:18:32'),
(24, 'aer', 'Top rigt', '', '#', '2023-04-30', '2024-02-28', '91686__17566e9add7ac9e8e7a30cf5db21e568.png', NULL, NULL, NULL, NULL, 210, 0, 1, 0, 1, '2023-05-20 18:19:03', 1, '2023-05-20 18:19:03'),
(25, 'Title here', 'sidebar', '', '#', '2023-05-01', '2024-01-31', '546101__17566e9add7ac9e8e7a30cf5db21e568.png', NULL, NULL, NULL, NULL, 208, 0, 1, 0, 1, '2023-05-20 18:19:31', 1, '2023-05-20 18:19:31'),
(26, 'title here', 'bottom one', '', 'alink', '2023-05-01', '2024-02-06', '545825__s.jpg', NULL, NULL, NULL, NULL, 211, 0, 1, 0, 1, '2023-05-20 18:20:49', 1, '2023-05-20 18:20:49'),
(27, 'Title here', 'Top left', 'brand', 'link here', '2023-05-01', '2023-09-07', '977319__56e1b3dfe4f8a7ed4742c8305290b711.jpg', NULL, 285, NULL, NULL, 172, 1, 1, 0, 1, '2023-05-20 18:18:32', 1, '2023-05-20 18:18:32'),
(28, 'aer', 'Top rigt', 'brand', '#', '2023-04-30', '2024-02-28', '91686__17566e9add7ac9e8e7a30cf5db21e568.png', NULL, 285, NULL, NULL, 173, 0, 1, 0, 1, '2023-05-20 18:19:03', 1, '2023-05-20 18:19:03'),
(29, 'Title here', 'sidebar', 'brand', '#', '2023-05-01', '2024-01-31', '546101__17566e9add7ac9e8e7a30cf5db21e568.png', NULL, 285, NULL, NULL, 171, 0, 1, 0, 1, '2023-05-20 18:19:31', 1, '2023-05-20 18:19:31'),
(30, 'title here', 'bottom one', 'brand', 'alink', '2023-05-01', '2024-02-06', '545825__s.jpg', NULL, 285, NULL, NULL, 174, 0, 1, 0, 1, '2023-05-20 18:20:49', 1, '2023-05-20 18:20:49'),
(31, 'Title here', 'Top left', '', 'link here', '2023-05-01', '2023-09-07', '977319__56e1b3dfe4f8a7ed4742c8305290b711.jpg', NULL, NULL, NULL, NULL, 172, 0, 1, 0, 1, '2023-05-20 18:18:32', 1, '2023-05-20 18:18:32'),
(32, 'aer', 'Top rigt', '', '#', '2023-04-30', '2024-02-28', '91686__17566e9add7ac9e8e7a30cf5db21e568.png', NULL, NULL, NULL, NULL, 173, 1, 1, 0, 1, '2023-05-20 18:19:03', 1, '2023-05-20 18:19:03'),
(33, 'Title here', 'sidebar', '', '#', '2023-05-01', '2024-01-31', '545825__s.jpg', NULL, NULL, NULL, NULL, 171, 1, 1, 0, 1, '2023-05-20 18:19:31', 1, '2023-05-20 18:19:31'),
(34, 'title here', 'bottom one', '', 'alink', '2023-05-01', '2024-02-06', '546101__17566e9add7ac9e8e7a30cf5db21e568.png', NULL, NULL, NULL, NULL, 174, 1, 1, 0, 1, '2023-05-20 18:20:49', 1, '2023-05-20 18:20:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`advertisement_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `advertisement_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
