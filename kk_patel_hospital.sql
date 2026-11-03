-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2026 at 10:22 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.28

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
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `appointmentname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departmentname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `user_id`, `appointmentname`, `email`, `phone`, `gender`, `departmentname`, `username`, `date`, `day`, `time`, `message`, `Status`, `created_at`, `updated_at`) VALUES
(18, NULL, 'Bhoomin', 'gorasiyabhoomin@gmail.com', '6767679708', 'male', 'Cardiologist', 'Dr. Meet Thacker', '2026-11-04', 'Wednesday', '10:00 AM - 11:00 AM', 'dsavsdb', 'Completed', '2024-03-28 18:08:10', '2026-11-03 07:15:36'),
(20, 2, 'Bhoomin', 'gorasiyabhoomin8@gmail.com', '34343434343', 'Male', 'oncology', 'Dr.Bhumiba Jadeja', '2026-11-03', 'Tuesday', '09:00 AM - 10:00 AM', 'advsaev', 'Pending', '2026-11-02 07:17:16', '2026-11-03 07:39:10'),
(21, 2, 'Bhoomin', 'gorasiyabhoomin8@gmail.com', '34343434343', 'Male', 'Cardiologist', 'Dr. Meet Thacker', '2026-11-05', 'Thursday', '09:00 AM - 10:00 AM', 'ewdv sxasf', 'Cancelled', '2026-11-03 00:07:13', '2026-11-03 00:16:47'),
(23, 2, 'Bhoomin', 'gorasiyabhoomin8@gmail.com', '3434343434', 'Male', 'Cardiologist', 'Dr. Meet Thacker', '2026-11-03', 'Tuesday', '04:00 PM - 05:00 PM', 'safweq', 'Approved', '2026-11-03 05:52:15', '2026-11-03 10:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint UNSIGNED NOT NULL,
  `contactname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `replied` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'reply',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` bigint UNSIGNED NOT NULL,
  `departmentname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departmenthead` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departmentimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `departmentname`, `departmenthead`, `departmentimage`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Cardiologist', 'Dr.Meet Thacker', 'uploads/Departments/65e6ca5262f9c1.png', 'Experience one of the best cardiology services in Bhuj, Kutch at K.K. Patel Super Speciality Hospital.', '2024-02-27 19:58:23', '2024-03-04 20:31:30'),
(2, 'oncology', 'Dr.Dr annand prasad', 'uploads/Departments/2.png', 'Experience comprehensive oncology services at K.K. Patel Super Speciality Hospital.', '2024-03-04 20:27:29', '2024-03-04 20:27:29'),
(3, 'orthopaedics', 'Dr.Mukesh patel', 'uploads/Departments/3.png', 'Orthopaedic Pain, trauma and fractures management, Knee and hip joint replacement.', '2024-03-04 20:32:30', '2024-03-04 20:32:30'),
(4, 'nephrology', 'Dr.Suresh', 'uploads/Departments/4.png', 'Management of acute renal failure, chronic renal failure.', '2024-03-04 20:33:11', '2024-03-04 20:33:11'),
(5, 'Physiotherapist', 'Dr. Priyankaba Jadeja', 'uploads/Departments/65f92e3db9fb85.png', 'We provide a full spectrum of spine care.', '2024-03-04 20:33:49', '2024-03-18 19:18:37'),
(6, 'urology', 'Dr.kishan patel', 'uploads/Departments/6.png', 'Urology is a surgical specialty dealing with diagnosis and treatment of the male and female urinary tract.', '2024-03-04 20:34:36', '2024-03-04 20:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$10$H.cfkysHHsEljnukB7uDk.tuA//./hj3LEr1i1ChKCrIIFTLmV29W',
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departmentname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'MBBS, MD',
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '8+ Years',
  `room_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'OPD Room #102',
  `consultation_fee` decimal(8,2) NOT NULL DEFAULT '500.00',
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `username`, `email`, `password`, `dob`, `gender`, `address`, `departmentname`, `qualification`, `experience`, `room_no`, `consultation_fee`, `is_available`, `city`, `postal_code`, `CV`, `phone`, `Avatar`, `Bio`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Dr. Meet Thacker', 'meetthacker@gmail.com', '$2y$10$tYe.Gln6QqcirtUtQkdXGO.LPPSUjHIK4cThPTUZQgfx1HzLFdmDW', '1994-06-14', 'male', 'near prince residency ,bhuj', 'Cardiologist', 'MBBS, MD', '8+ Years', 'OPD Room #102', 500.00, 1, 'Bhuj', '370030', '1710401115.png', '4545457687', 'uploads/doctors/6ae96d40140b01.png', 'i am cardiologist doctor', 'zZlzvPbT4PIw1VMg7Qu8EA9gbq6abE98c6fHHfqk2cTIVCSUsSwNg8SFuMPp', '2024-03-13 20:25:15', '2026-11-03 07:33:40'),
(3, 'Dr.Bhumiba Jadeja', 'bhumibajadeja@ggmail.com', '$2y$10$AXq09dGhuD9/8Nj57XwwVOairyTYhSAi6mRr526aUj5b3LjWRHacm', '1998-03-31', 'female', 'Near hill garde,Bhuj', 'oncology', 'MBBS, MD', '8+ Years', 'OPD Room #101', 500.00, 1, 'Bhuj', '370001', '1710740756.htm', '23232345434', 'uploads/doctors/2.png', 'I am an neuro sciences specialist', 'enxMIWDWlQ7GwDt2IeZQRenbzge73pDl5KErFNVee9lbNcRdp0g6dLiYYwBm', '2024-03-17 18:45:56', '2026-11-03 00:04:20'),
(4, 'Dr. Rugved Thakkar', 'rugvedthakkar@gmail.com', '$2y$10$F48TCYuSsnE8cV5JEk9TZuPz8C7dkUencqs5fp0CZaZMgqB9Blc3m', '1999-03-12', 'male', 'near Hamisar lake,bhuj', 'nephrology', 'MBBS, MD', '8+ Years', 'OPD Room #103', 500.00, 0, 'Bhuj', '370001', '1710824601.jpeg', '4545454545', 'uploads/doctors/3.png', 'i am nepheology specialist', 'ixBRKescRtcfLKkXApDPVwGJEA96r7uZl7T1tVCCEYT2F19Dx5YRx6yAlaYe', '2024-03-18 18:03:21', '2026-11-03 00:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedules`
--

CREATE TABLE `doctor_schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `day_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `morning_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '09:00 AM',
  `morning_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '01:00 PM',
  `evening_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '04:00 PM',
  `evening_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '07:30 PM',
  `is_day_off` tinyint(1) NOT NULL DEFAULT '0',
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_schedules`
--

INSERT INTO `doctor_schedules` (`id`, `doctor_id`, `day_name`, `morning_start`, `morning_end`, `evening_start`, `evening_end`, `is_day_off`, `notes`, `created_at`, `updated_at`) VALUES
(1, 2, 'Monday', '09:00 AM', '01:00 PM', '04:00 PM', '07:30 PM', 0, 'Regular OPD Consultations', '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(2, 2, 'Tuesday', '09:00 AM', '01:00 PM', '04:00 PM', '07:30 PM', 0, 'Regular OPD Consultations', '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(3, 2, 'Wednesday', '09:00 AM', '01:00 PM', '04:00 PM', '07:30 PM', 0, 'Regular OPD Consultations', '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(4, 2, 'Thursday', '09:00 AM', '01:00 PM', '04:00 PM', '07:30 PM', 0, 'Regular OPD Consultations', '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(5, 2, 'Friday', '09:00 AM', '01:00 PM', '04:00 PM', '07:30 PM', 0, 'Regular OPD Consultations', '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(6, 2, 'Saturday', '09:00 AM', '01:00 PM', '04:00 PM', '07:30 PM', 0, 'Regular OPD Consultations', '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(7, 2, 'Sunday', NULL, NULL, NULL, NULL, 1, 'Weekly Off / Emergency Call Only', '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(8, 3, 'Monday', '09:00 AM', '01:00 PM', '04:00 PM', '07:30 PM', 0, 'Regular OPD Consultations', '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(9, 3, 'Tuesday', '09:00 AM', '01:00 PM', '04:00 PM', '07:30 PM', 0, 'Regular OPD Consultations', '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(10, 3, 'Wednesday', '09:00 AM', '01:00 PM', '04:00 PM', '07:30 PM', 0, 'Regular OPD Consultations', '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(11, 3, 'Thursday', '09:00 AM', '01:00 PM', '04:00 PM', '07:30 PM', 1, 'Regular OPD Consultations', '2026-11-02 23:37:24', '2026-11-03 00:03:32'),
(12, 3, 'Friday', '09:00 AM', '01:00 PM', '04:00 PM', '07:30 PM', 1, 'Regular OPD Consultations', '2026-11-02 23:37:24', '2026-11-03 00:03:32'),
(13, 3, 'Saturday', '09:00 AM', '01:00 PM', '04:00 PM', '07:30 PM', 1, 'Regular OPD Consultations', '2026-11-02 23:37:24', '2026-11-03 00:03:32'),
(14, 3, 'Sunday', NULL, NULL, NULL, NULL, 1, 'Weekly Off / Emergency Call Only', '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(15, 4, 'Monday', '09:00 AM', '01:00 PM', '04:00 PM', '07:30 PM', 0, 'Regular OPD Consultations', '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(16, 4, 'Tuesday', '09:00 AM', '01:00 PM', '04:00 PM', '07:30 PM', 0, 'Regular OPD Consultations', '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(17, 4, 'Wednesday', '09:00 AM', '01:00 PM', '04:00 PM', '07:30 PM', 0, 'Regular OPD Consultations', '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(18, 4, 'Thursday', '09:00 AM', '01:00 PM', '04:00 PM', '07:30 PM', 0, 'Regular OPD Consultations', '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(19, 4, 'Friday', '09:00 AM', '01:00 PM', '04:00 PM', '07:30 PM', 0, 'Regular OPD Consultations', '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(20, 4, 'Saturday', '09:00 AM', '01:00 PM', '04:00 PM', '07:30 PM', 0, 'Regular OPD Consultations', '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(21, 4, 'Sunday', NULL, NULL, NULL, NULL, 1, 'Weekly Off / Emergency Call Only', '2026-11-02 23:37:24', '2026-11-02 23:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_time_slots`
--

CREATE TABLE `doctor_time_slots` (
  `id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `day_of_week` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'All Days',
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '09:00 AM',
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '10:00 AM',
  `slot_display` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_patients` int NOT NULL DEFAULT '8',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_time_slots`
--

INSERT INTO `doctor_time_slots` (`id`, `doctor_id`, `day_of_week`, `start_time`, `end_time`, `slot_display`, `max_patients`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 2, 'All Days', '09:00 AM', '10:00 AM', '09:00 AM - 10:00 AM', 8, 1, '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(2, 2, 'All Days', '10:00 AM', '11:00 AM', '10:00 AM - 11:00 AM', 8, 1, '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(3, 2, 'All Days', '11:00 AM', '12:00 PM', '11:00 AM - 12:00 PM', 6, 1, '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(4, 2, 'All Days', '04:00 PM', '05:00 PM', '04:00 PM - 05:00 PM', 8, 1, '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(5, 2, 'All Days', '05:00 PM', '06:00 PM', '05:00 PM - 06:00 PM', 8, 1, '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(6, 2, 'All Days', '06:00 PM', '07:00 PM', '06:00 PM - 07:00 PM', 6, 1, '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(7, 3, 'All Days', '09:00 AM', '10:00 AM', '09:00 AM - 10:00 AM', 8, 1, '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(8, 3, 'All Days', '10:00 AM', '11:00 AM', '10:00 AM - 11:00 AM', 8, 1, '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(9, 3, 'All Days', '11:00 AM', '12:00 PM', '11:00 AM - 12:00 PM', 6, 1, '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(10, 3, 'All Days', '04:00 PM', '05:00 PM', '04:00 PM - 05:00 PM', 8, 1, '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(11, 3, 'All Days', '05:00 PM', '06:00 PM', '05:00 PM - 06:00 PM', 8, 1, '2026-11-02 23:37:24', '2026-11-03 07:59:47'),
(12, 3, 'All Days', '06:00 PM', '07:00 PM', '06:00 PM - 07:00 PM', 6, 1, '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(13, 4, 'All Days', '09:00 AM', '10:00 AM', '09:00 AM - 10:00 AM', 8, 1, '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(14, 4, 'All Days', '10:00 AM', '11:00 AM', '10:00 AM - 11:00 AM', 8, 1, '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(15, 4, 'All Days', '11:00 AM', '12:00 PM', '11:00 AM - 12:00 PM', 6, 1, '2026-11-02 23:37:24', '2026-11-02 23:48:56'),
(16, 4, 'All Days', '04:00 PM', '05:00 PM', '04:00 PM - 05:00 PM', 8, 1, '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(17, 4, 'All Days', '05:00 PM', '06:00 PM', '05:00 PM - 06:00 PM', 8, 1, '2026-11-02 23:37:24', '2026-11-02 23:37:24'),
(18, 4, 'All Days', '06:00 PM', '07:00 PM', '06:00 PM - 07:00 PM', 6, 1, '2026-11-02 23:37:24', '2026-11-02 23:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'bhoomin', 'gorasiyabhoomin@gmail.com', 'ghcgchvh', '2026-11-03 09:34:46', '2026-11-03 09:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `inter`
--

CREATE TABLE `inter` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_02_20_054718_create_department_table', 1),
(5, '2024_02_22_044839_create_press_desk_table', 1),
(6, '2024_02_28_050936_create_feedback_table', 1),
(7, '2024_03_13_053435_create_users_table', 1),
(8, '2024_03_14_071919_create_doctors_table', 1),
(9, '2024_03_15_044607_create_appointment_table', 1),
(10, '2024_03_15_072544_create_contact_table', 1),
(11, '2026_10_07_044724_create_inter_table', 2),
(12, '2026_11_02_115351_add_user_id_to_appointment_table', 3),
(13, '2026_11_03_050620_add_doctor_panel_features', 4),
(14, '2026_11_03_053500_add_day_to_appointment_table', 5),
(15, '2026_11_03_080000_create_prescriptions_and_medicines_tables', 6);

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `prescription_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `patient_id` bigint UNSIGNED DEFAULT NULL,
  `symptoms` text COLLATE utf8mb4_unicode_ci,
  `symptoms_duration` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinical_notes` text COLLATE utf8mb4_unicode_ci,
  `medical_history` text COLLATE utf8mb4_unicode_ci,
  `allergies` text COLLATE utf8mb4_unicode_ci,
  `medical_advice` text COLLATE utf8mb4_unicode_ci,
  `follow_up_required` tinyint(1) NOT NULL DEFAULT '0',
  `follow_up_date` date DEFAULT NULL,
  `additional_instructions` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `issued_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `prescription_number`, `appointment_id`, `doctor_id`, `patient_id`, `symptoms`, `symptoms_duration`, `diagnosis`, `clinical_notes`, `medical_history`, `allergies`, `medical_advice`, `follow_up_required`, `follow_up_date`, `additional_instructions`, `status`, `issued_at`, `created_at`, `updated_at`) VALUES
(2, 'RX-2026-00023', 23, 2, 2, 'Intermittent morning occipital headaches and mild dizziness', '2 weeks', 'Essential Stage-1 Hypertension', 'BP 148/92 mmHg, Pulse 78 bpm regular, S1/S2 heard normal, no murmurs.', 'Sedentary desk worker, family history of hypertension.', 'No known drug allergies (NKDA)', 'Low sodium diet (<2g/day). Aerobic exercise 30 mins daily. Regular home BP monitoring.', 1, '2026-11-10', 'Serum electrolytes, lipid profile, and renal function tests before next visit.', 'issued', '2026-11-03 07:26:35', '2026-11-03 07:26:35', '2026-11-03 07:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_medicines`
--

CREATE TABLE `prescription_medicines` (
  `id` bigint UNSIGNED NOT NULL,
  `prescription_id` bigint UNSIGNED NOT NULL,
  `medicine_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosage` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frequency` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescription_medicines`
--

INSERT INTO `prescription_medicines` (`id`, `prescription_id`, `medicine_name`, `dosage`, `frequency`, `duration`, `route`, `instructions`, `created_at`, `updated_at`) VALUES
(8, 2, 'Tab. Telmisartan 40mg', '1 Tab', '1-0-0 (Morning)', '30 Days', 'Oral', 'Take with or without food in morning', '2026-11-03 07:26:35', '2026-11-03 07:26:35'),
(9, 2, 'Tab. Amlodipine 5mg', '1 Tab', '0-0-1 (Night)', '15 Days', 'Oral', 'Take at night after food', '2026-11-03 07:26:35', '2026-11-03 07:26:35'),
(10, 2, 'Tab. Paracetamol 650mg', '1 Tab', 'SOS / When Required', '3 Days', 'Oral', 'Only if headache persists', '2026-11-03 07:26:35', '2026-11-03 07:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `press_desk`
--

CREATE TABLE `press_desk` (
  `id` bigint UNSIGNED NOT NULL,
  `pressimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `press_desk`
--

INSERT INTO `press_desk` (`id`, `pressimage`, `description`, `created_at`, `updated_at`) VALUES
(1, 'uploads/Press/65f3ed2644df8blog1.jpg', 'At \"Aang Daanana Mahayagya\" K.K. Patel Super Specialty Hospital has successfully completed its second organ donation.', '2024-02-27 20:31:21', '2024-03-14 19:39:34'),
(2, 'uploads/Press/65efeaa006401blog2.jpg', 'Ayushman Bharat Digital Health Mission is expanding the facilities for the patients.', '2024-03-05 19:14:52', '2024-03-11 18:39:44'),
(3, 'uploads/Press/blog3.jpg', 'Prime Minister Narendra Modi has dedicated to the nation, a 200-bed KK Patel Super Speciality Hospital in Bhuj.', '2024-03-11 18:41:18', '2024-03-11 18:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bhuj',
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bhuj',
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '370030',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1234567890',
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `address`, `city`, `postal_code`, `phone`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'gorasiyabhoomin@gmail.com', NULL, 1, '$2y$10$goSIkswEVH3Yo73O3W3Dz.BUR4ztBlNMkBdL.6JFldrU9Vhia1PYm', 'bhuj', 'bhuj', '370030', '1234567890', 'uploads/edit_admin_profile/6ae2fc200ceb5Gemini_Generated_Image_93od5u93od5u93od (2).png', 'active', '2024-03-12 18:36:46', '2026-11-03 09:50:50'),
(2, 'Bhoomin', 'gorasiyabhoomin8@gmail.com', NULL, 0, '$2y$10$W8nutmRrMYfuNdFsMcd5wO0mVUArzDcnHQIAQPODp3hIyO5OHxWMy', 'Bhuj, Kutch', 'Bhuj', '370001', '5656565656', 'uploads/avatars/user_2_1793621067.jpg', 'inactive', '2026-11-02 06:31:18', '2026-11-03 09:41:05'),
(3, 'efw', 'krishhalai@gmail.com', NULL, 0, '$2y$10$hZ73uZ9r62NBbdqcEg.4Fu7FLH7UTv0ZEMkv5a90iwJ4JU22aPU.a', 'Bhuj, Kutch', 'Bhuj', '370001', '', NULL, 'inactive', '2026-11-03 09:15:10', '2026-11-03 09:21:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_schedules_doctor_id_index` (`doctor_id`);

--
-- Indexes for table `doctor_time_slots`
--
ALTER TABLE `doctor_time_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_time_slots_doctor_id_index` (`doctor_id`);

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
-- Indexes for table `inter`
--
ALTER TABLE `inter`
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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prescriptions_prescription_number_unique` (`prescription_number`),
  ADD UNIQUE KEY `prescriptions_appointment_id_unique` (`appointment_id`),
  ADD KEY `prescriptions_doctor_id_foreign` (`doctor_id`),
  ADD KEY `prescriptions_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `prescription_medicines`
--
ALTER TABLE `prescription_medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescription_medicines_prescription_id_foreign` (`prescription_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `doctor_time_slots`
--
ALTER TABLE `doctor_time_slots`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inter`
--
ALTER TABLE `inter`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prescription_medicines`
--
ALTER TABLE `prescription_medicines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `press_desk`
--
ALTER TABLE `press_desk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointment` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescriptions_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescriptions_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `prescription_medicines`
--
ALTER TABLE `prescription_medicines`
  ADD CONSTRAINT `prescription_medicines_prescription_id_foreign` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
