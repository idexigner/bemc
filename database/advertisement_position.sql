-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 05:40 AM
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

--
-- Dumping data for table `advertisement_position`
--

INSERT INTO `advertisement_position` (`advertisement_position_id`, `advertisement_position_name`, `advertisement_position_class_name`, `advertisement_position_width`, `advertisement_position_height`, `advertisement_position_number`, `advertisement_position_interval`, `advertisement_position_price`, `advertisement_position_is_featured`, `advertisement_position_is_active`, `advertisement_position_is_deleted`, `advertisement_position_created_by`, `advertisement_position_created_at`, `advertisement_position_updated_by`, `advertisement_position_updated_at`) VALUES
(140, 'Home Page Product Slider Advertisement', 'home-product-slider', 350, 240, 0, 6, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(141, 'Home Page Container Top Advertisement', 'home-advert-container-top', 1170, 147, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(142, 'Home Page Container Mid Advertisement', 'home-advert-container-mid', 1170, 147, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(143, 'Doctor Page Sidebar Advertisement', 'doctor-sidebar-advert', 350, 140, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(144, 'Doctor Page Top Left Advertisement', 'doctor-advert-top-left', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(145, 'Doctor Page Top Right Advertisement', 'doctor-advert-top-right', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(146, 'Doctor Page Bottom Advertisement', 'doctor-advert-bottom', 756, 138, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(147, 'Address Page Sidebar Advertisement', 'address-sidebar-advert', 350, 140, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(148, 'Address Page Top Left Advertisement', 'address-advert-top-left', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(149, 'Address Page Top Right Advertisement', 'address-advert-top-right', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(150, 'Address Page Bottom Advertisement', 'address-advert-bottom', 756, 138, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(151, 'Job Circular Page Sidebar Advertisement', 'job-circular-sidebar-advert', 350, 140, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(152, 'Job Circular Page Top Left Advertisement', 'job-circular-advert-top-left', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(153, 'Job Circular Page Top Right Advertisement', 'job-circular-advert-top-right', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(154, 'Job Circular Page Bottom Advertisement', 'job-circular-advert-bottom', 756, 138, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(155, 'Job Circular Detail Page Sidebar Advertisement', 'job-circular-detail-sidebar-advert', 350, 140, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(156, 'Job Circular Detail Page Top Left Advertisement', 'job-circular-detail-advert-top-left', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(157, 'Job Circular Detail Page Top Right Advertisement', 'job-circular-detail-advert-top-right', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(158, 'Job Circular Detail Page Bottom Advertisement', 'job-circular-detail-advert-bottom', 756, 138, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(159, 'Local News Page Sidebar Advertisement', 'news-sidebar-advert', 350, 140, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(160, 'Local News Page Top Left Advertisement', 'news-advert-top-left', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(161, 'Local News Page Top Right Advertisement', 'news-advert-top-right', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(162, 'Local News Page Bottom Advertisement', 'news-advert-bottom', 756, 138, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(163, 'Special Report Page Sidebar Advertisement', 'special-report-sidebar-advert', 350, 140, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(164, 'Special Report Page Top Left Advertisement', 'special-report-advert-top-left', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(165, 'Special Report Page Top Right Advertisement', 'special-report-advert-top-right', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(166, 'Special Report Page Bottom Advertisement', 'special-report-advert-bottom', 756, 138, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(167, 'Resource Page Sidebar Advertisement', 'resource-sidebar-advert', 350, 140, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(168, 'Resource Page Top Left Advertisement', 'resource-advert-top-left', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(169, 'Resource Page Top Right Advertisement', 'resource-advert-top-right', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(170, 'Resource Page Bottom Advertisement', 'resource-advert-bottom', 756, 138, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(171, 'Brand Search Result Page Sidebar Advertisement', 'brand-sidebar-advert', 350, 140, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(172, 'Brand Search Result Page Top Left Advertisement', 'brand-advert-top-left', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(173, 'Brand Search Result Page Top Right Advertisement', 'brand-advert-top-right', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(174, 'Brand Search Result Page Bottom Advertisement', 'brand-advert-bottom', 756, 138, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(175, 'Generic Search Result Page Sidebar Advertisement', 'generic-sidebar-advert', 350, 140, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(176, 'Generic Search Result Page Top Left Advertisement', 'generic-advert-top-left', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(177, 'Generic Search Result Page Top Right Advertisement', 'generic-advert-top-right', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(178, 'Generic Search Result Page Bottom Advertisement', 'generic-advert-bottom', 756, 138, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(179, 'Indication Search Result Page Sidebar Advertisement', 'indication-sidebar-advert', 350, 140, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(180, 'Indication Search Result Page Top Left Advertisement', 'indication-advert-top-left', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(181, 'Indication Search Result Page Top Right Advertisement', 'indication-advert-top-right', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(182, 'Indication Search Result Page Bottom Advertisement', 'indication-advert-bottom', 756, 138, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(183, 'Manufacturer Search Result Page Sidebar Advertisement', 'manufacturer-sidebar-advert', 350, 140, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(184, 'Manufacturer Search Result Page Top Left Advertisement', 'manufacturer-advert-top-left', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(185, 'Manufacturer Search Result Page Top Right Advertisement', 'manufacturer-advert-top-right', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(186, 'Manufacturer Search Result Page Bottom Advertisement', 'manufacturer-advert-bottom', 756, 138, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(187, 'International Health Page Sidebar Advertisement', 'international-health-sidebar-advert', 350, 140, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 13:54:27', 1, '2018-08-30 13:54:27'),
(188, 'International Health Page Top Left Advertisement', 'international-health-advert-top-left', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 13:54:27', 1, '2018-08-30 13:54:27'),
(189, 'International Health Page Top Right Advertisement', 'international-health-advert-top-right', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 13:54:27', 1, '2018-08-30 13:54:27'),
(190, 'International Health Page Bottom Advertisement', 'international-health-advert-bottom', 756, 138, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 13:54:27', 1, '2018-08-30 13:54:27'),
(191, 'Home Page Full Screen Advertisement', 'home-full-screen-advert', 600, 600, 1, 3000, 1000, 0, 1, 0, 1, '2019-02-04 08:54:27', 1, '2019-02-04 08:54:27'),
(199, 'Brand Search Result Page Full Screen Advertisement', 'brand-full-screen-advert', 600, 600, 1, 3000, 1000, 0, 1, 0, 1, '2019-02-04 08:54:27', 1, '2019-02-04 08:54:27'),
(200, 'Generic Search Result Page Full Screen Advertisement', 'generic-full-screen-advert', 600, 600, 1, 3000, 1000, 0, 1, 0, 1, '2019-02-04 08:54:27', 1, '2019-02-04 08:54:27'),
(201, 'MiMS Study Page Sidebar Advertisement', 'mims-study-sidebar-advert', 350, 140, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(202, 'MiMS Study Page Top Left Advertisement', 'mims-study-advert-top-left', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(203, 'MiMS Study Page Top Right Advertisement', 'mims-study-advert-top-right', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(204, 'MiMS Study Page Bottom Advertisement', 'mims-study-advert-bottom', 756, 138, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 08:54:27', 1, '2018-08-30 08:54:27'),
(208, 'Journal Page Sidebar Advertisement', 'journal-sidebar-advert', 350, 140, 0, 1, 1000, 0, 1, 0, 1, '2019-11-10 08:54:27', 1, '2019-11-10 08:54:27'),
(209, 'Journal Page Top Left Advertisement', 'journal-advert-top-left', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2019-11-10 08:54:27', 1, '2019-11-10 08:54:27'),
(210, 'Journal Page Top Right Advertisement', 'journal-advert-top-right', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2019-11-10 08:54:27', 1, '2019-11-10 08:54:27'),
(211, 'Journal Page Bottom Advertisement', 'journal-advert-bottom', 756, 138, 0, 1, 1000, 0, 1, 0, 1, '2019-11-10 08:54:27', 1, '2019-11-10 08:54:27'),
(212, 'MiMS Learning Top Slider Advertisement', 'mims-learning-top-slider', 523, 120, 0, 6, 1000, 0, 1, 0, 1, '2020-01-04 19:09:27', 1, '2020-01-04 19:09:27'),
(213, 'MiMS Learning Bottom Slider Advertisement', 'mims-learning-bottom-slider', 523, 120, 0, 6, 1000, 0, 1, 0, 1, '2020-01-04 19:09:27', 1, '2020-01-04 19:09:27'),
(214, 'EBook Top Slider Advertisement', 'ebook-top-slider', 523, 120, 0, 6, 1000, 0, 1, 0, 1, '2020-01-04 19:09:27', 1, '2020-01-04 19:09:27'),
(215, 'EBook Bottom Slider Advertisement', 'ebook-bottom-slider', 523, 120, 0, 6, 1000, 0, 1, 0, 1, '2020-01-04 19:09:27', 1, '2020-01-04 19:09:27'),
(216, 'Video Gallery Page Sidebar Advertisement', 'video-sidebar-advert', 333, 256, 0, 1, 1000, 0, 1, 0, 1, '2020-05-23 03:54:27', 1, '2020-05-23 03:54:27'),
(217, 'Video Gallery Page Top Left Advertisement', 'video-advert-top-left', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2020-05-23 03:54:27', 1, '2020-05-23 03:54:27'),
(218, 'Video Gallery Page Top Right Advertisement', 'video-advert-top-right', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2020-05-23 03:54:27', 1, '2020-05-23 03:54:27'),
(219, 'Video Gallery Page Bottom Advertisement', 'video-advert-bottom', 756, 138, 0, 1, 1000, 0, 1, 0, 1, '2020-05-23 03:54:27', 1, '2020-05-23 03:54:27'),
(220, 'Herbal Related Page Sidebar Advertisement', 'herbal-sidebar-advert', 333, 256, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 03:54:27', 1, '2018-08-30 03:54:27'),
(221, 'Herbal Related Page Top Left Advertisement', 'herbal-advert-top-left', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 03:54:27', 1, '2018-08-30 03:54:27'),
(222, 'Herbal Related Page Top Right Advertisement', 'herbal-advert-top-right', 523, 120, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 03:54:27', 1, '2018-08-30 03:54:27'),
(223, 'Herbal Related Page Bottom Advertisement', 'herbal-advert-bottom', 756, 138, 0, 1, 1000, 0, 1, 0, 1, '2018-08-30 03:54:27', 1, '2018-08-30 03:54:27'),
(224, 'Brand Page Advertisement', 'brand-advert-image', 260, 260, 1, 0, 1000, 0, 1, 0, 1, '2020-06-06 03:54:27', 1, '2020-06-06 03:54:27'),
(226, 'Home Page middle Side', 'home-page-middle-side', 520, 200, 3, 0, 1000, 0, 1, 0, 1, '2020-06-06 03:54:27', 1, '2020-06-06 03:54:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement_position`
--
ALTER TABLE `advertisement_position`
  ADD PRIMARY KEY (`advertisement_position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement_position`
--
ALTER TABLE `advertisement_position`
  MODIFY `advertisement_position_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
