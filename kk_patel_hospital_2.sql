-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 08:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kk_patel_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointmentname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `departmentname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `appointmentname`, `email`, `phone`, `gender`, `departmentname`, `username`, `date`, `time`, `message`, `Status`, `created_at`, `updated_at`) VALUES
(18, 'Bhoomin', 'gorasiyabhoomin@gmail.com', '6767679708', 'Male', 'Cardiologist', 'Dr. Meet Thacker', '2024-03-30', '03:31', 'dsavsdb', 'Pending', '2024-03-28 23:38:10', '2024-03-28 23:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contactname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `replied` text NOT NULL DEFAULT 'reply',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contactname`, `email`, `phone`, `subject`, `message`, `replied`, `created_at`, `updated_at`) VALUES
(2, 'gegqewg', 'gorasiyabhoomin@gmail.com', '5656565656', 'bhbhb', 'hbibuuuuu', 'wwinnje', '2024-03-15 02:02:44', '2024-03-15 02:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departmentname` varchar(255) NOT NULL,
  `departmenthead` varchar(255) NOT NULL,
  `departmentimage` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `departmentname`, `departmenthead`, `departmentimage`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Cardiologist', 'Dr.Meet Thacker', 'uploads/Departments/65e6ca5262f9c1.png', 'Experience one of the best cardiology services in Bhuj, Kutch at K.K. Patel Super Speciality Hospital. Our department comprises an experienced and qualified team of Cardiologists and Critical Care Physicians. We provide round-the-clock support for Angiography and Primary Angioplasty (PAMI), ensuring immediate care for cardiac emergencies.', '2024-02-28 01:28:23', '2024-03-05 02:01:30'),
(2, 'oncology', 'Dr.Dr annand prasad', 'uploads/Departments/2.png', 'Experience comprehensive oncology services at K.K. Patel Super Speciality Hospital, one of the best cancer centers in the Bhuj, Kutch. Our dedicated Cancer Centre is equipped with state-of-the-art facilities and the latest radiation machine. Our highly experienced team, including radiation oncologist, surgical oncologist, and medical oncologist, ensures the best possible care for our patients.', '2024-03-05 01:57:29', '2024-03-05 01:57:29'),
(3, 'orthopaedics', 'Dr.Mukesh patel', 'uploads/Departments/3.png', 'Orthopaedic Pain\r\nOrthopaedic trauma and fractures management\r\nKnee and hip joint replacement\r\nSpine pain management\r\nAdvanced endoscopic spine surgery\r\nArthroscopy for sports injury', '2024-03-05 02:02:30', '2024-03-05 02:02:30'),
(4, 'nephrology', 'Dr.Suresh', 'uploads/Departments/4.png', 'Management of acute renal failure, chronic renal failure, acute nephritis, nephrotic syndrome, reno-vascular hypertension, and collagen vascular disorders involving kidneys, etc.\r\n24x7 Dialysis\r\nContinuous Renal Replacement Therapy (CRRT) for dialysis in critically ill patients\r\nTunneled cuffed catheter insertion (PERM CATH) for patients having difficulty in constructing working Arterial Venous (AV) Fistula', '2024-03-05 02:03:11', '2024-03-05 02:03:11'),
(5, 'Physiotherapist', 'Dr. Priyankaba Jadeja', 'uploads/Departments/65f92e3db9fb85.png', 'We provide a full spectrum of spine care, from conservative measures and pain management to minimally invasive procedures and large scale reconstruction of spinal deformity.', '2024-03-05 02:03:49', '2024-03-19 00:48:37'),
(6, 'urology', 'Dr.kishan patel', 'uploads/Departments/6.png', 'Urology is a surgical specialty dealing with diagnosis and treatment of the male and female urinary tract and male reproductive organs. We use minimally invasive techniques like fiber optic endoscopic techniques and bladder key-hole surgeries, etc.', '2024-03-05 02:04:36', '2024-03-05 02:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `departmentname` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `CV` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `Avatar` varchar(255) NOT NULL,
  `Bio` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `username`, `email`, `dob`, `gender`, `address`, `departmentname`, `city`, `postal_code`, `CV`, `phone`, `Avatar`, `Bio`, `created_at`, `updated_at`) VALUES
(2, 'Dr. Meet Thacker', 'meetthacker@gmail.com', '1994-06-14', 'male', 'near prince residency ,bhuj', 'Cardiologist', 'Bhuj', '370030', '1710401115.png', '4545457687', 'uploads/doctors/1.png', 'i am cardiologist doctor', '2024-03-14 01:55:15', '2024-03-19 00:49:45'),
(3, 'Dr.Bhumiba Jadeja', 'bhumibajadeja@ggmail.com', '1998-03-31', 'female', 'Near hill garde,Bhuj', 'oncology', 'Bhuj', '370001', '1710740756.htm', '23232345434', 'uploads/doctors/2.png', 'I am an neuro sciences specialist', '2024-03-18 00:15:56', '2024-03-19 00:53:30'),
(4, 'Dr. Rugved Thakkar', 'rugvedthakkar@gmail.com', '1999-03-12', 'male', 'near Hamisar lake,bhuj', 'nephrology', 'Bhuj', '370001', '1710824601.jpeg', '4545454545', 'uploads/doctors/3.png', 'i am nepheology specialist', '2024-03-18 23:33:21', '2024-03-18 23:33:21');

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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_16_055601_create_doctors_table', 1),
(6, '2024_02_20_054718_create_department_table', 1),
(7, '2024_02_20_070618_create_admin_table', 1),
(8, '2024_02_22_044839_create_press_desk_table', 1),
(9, '2024_02_27_073526_create_contact_table', 1),
(10, '2024_02_28_050936_create_feedback_table', 1),
(11, '2024_02_29_045841_create_admin_table', 2),
(12, '2024_03_05_050204_create_admin_table', 3),
(13, '2024_03_05_054707_create_admin_table', 4),
(14, '2024_03_05_062446_create_registers_table', 5),
(15, '2024_03_05_062613_create_users_table', 6),
(16, '2024_03_06_050932_create_admins_table', 7),
(17, '2024_03_06_052643_create_users_table', 8),
(18, '2024_03_06_063006_create_users_table', 9),
(19, '2024_03_06_063718_create_users_table', 10),
(20, '2024_03_06_063943_create_users_table', 11),
(21, '2024_03_06_065050_create__a_d_m_i_n_table', 12),
(22, '2024_03_11_045056_create_appointment_table', 13),
(23, '2024_03_11_070305_create_appointment_table', 14),
(24, '2024_03_13_052618_create_users_table', 15),
(25, '2024_03_13_053435_create_users_table', 16),
(26, '2024_03_14_071919_create_doctors_table', 17),
(27, '2024_03_14_075529_create_appointment_table', 18),
(28, '2024_03_15_044607_create_appointment_table', 19),
(29, '2024_03_15_072544_create_contact_table', 20);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `press_desk`
--

CREATE TABLE `press_desk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pressimage` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `press_desk`
--

INSERT INTO `press_desk` (`id`, `pressimage`, `description`, `created_at`, `updated_at`) VALUES
(1, 'uploads/Press/65f3ed2644df8blog1.jpg', 'At \"Aang Daanana Mahayagya\" we are proud to share with our social media community that Bhujni K. K. Patel Super Specialty Hospital has successfully completed its second organ donation! We are proud to be a part of this life-changing event that has the potential to save and improve countless lives. The hospital staff worked tirelessly to make the donation process smooth, and we are proud to be a part of such a noble cause. Our heartfelt thanks to the donor and his family for their selfless work. We hope that this will inspire more people to donate organs in this noble cause of human service thereby inspiring the needy to give the gift of a new life.”', '2024-02-28 02:01:21', '2024-03-15 01:09:34'),
(2, 'uploads/Press/65efeaa006401blog2.jpg', 'Ayushman Bharat Digital Health Mission is expanding the facilities for the patients. Modern and critical healthcare infrastructure has been developed through the Ayushman Health Infrastructure Mission in the district and being taken up to the block level. Hospital are being constructed in every district. Similarly, AIIMS are being established. Medical Colleges are expanding medical education and the country is likely to get record number of doctors in next 10 years.', '2024-03-06 00:44:52', '2024-03-12 00:09:44'),
(3, 'uploads/Press/blog3.jpg', 'Prime Minister Narendra Modi has dedicated to the nation, a 200-bed KK Patel Super Speciality Hospital in Bhuj in the Kutch district of Gujarat, via video-conferencing. This hospital has been built by Shree Kutchi Leva Patel Samaj, Bhuj and is the first charitable super speciality hospital in the Kutch region.', '2024-03-12 00:11:18', '2024-03-12 00:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT 'bhuj',
  `city` varchar(255) NOT NULL DEFAULT 'bhuj',
  `postal_code` varchar(255) NOT NULL DEFAULT '370030',
  `phone` varchar(255) NOT NULL DEFAULT '1234567890',
  `logo` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `address`, `city`, `postal_code`, `phone`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'gorasiyabhoomin@gmail.com', NULL, 1, '$2y$10$goSIkswEVH3Yo73O3W3Dz.BUR4ztBlNMkBdL.6JFldrU9Vhia1PYm', 'bhuj', 'bhuj', '370030', '1234567890', 'uploads/edit_admin_profile/65f7dc17ac3c7logo3.png', 'active', '2024-03-13 00:06:46', '2024-04-01 01:18:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `appointment_email_unique` (`email`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_email_unique` (`email`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `feedback_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `press_desk`
--
ALTER TABLE `press_desk`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `press_desk`
--
ALTER TABLE `press_desk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
