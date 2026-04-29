-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 12:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telimedicine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `role` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `nid` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `email`, `password`, `dob`, `role`, `gender`, `phone`, `address`, `nid`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Mama', 'admin@gmail.com', '123456', '2023-03-29', 'admin', 'male', '012535861256', 'gawair, uttara dhaka 1230.', '15998753654256', 'andrewtate.png', '2023-03-22 09:41:59', '2023-03-06 09:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorid` varchar(255) NOT NULL,
  `doctorname` varchar(255) NOT NULL,
  `patientid` varchar(255) NOT NULL,
  `patientname` varchar(255) NOT NULL,
  `patientaddress` text NOT NULL,
  `patientphone` varchar(255) NOT NULL,
  `patientgender` varchar(255) NOT NULL,
  `appointmentdate` date NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `patientpicture` varchar(255) DEFAULT NULL,
  `appointmentstatus` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `doctorid`, `doctorname`, `patientid`, `patientname`, `patientaddress`, `patientphone`, `patientgender`, `appointmentdate`, `specialization`, `patientpicture`, `appointmentstatus`, `created_at`, `updated_at`) VALUES
(4, '3', 'Khabib', '1', 'Muhtadin', '47', '01632103756', 'male', '2023-03-29', 'orthopredix', '1679482884.png', 0, '2023-03-22 05:09:11', '2023-03-22 05:09:11'),
(5, '1', 'Brad', '1', 'Muhtadin', '47', '01632103756', 'male', '2023-03-20', 'surgeon', '1679482884.png', 1, '2023-03-22 05:10:00', '2023-03-22 05:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `date`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Khabib Nurmagomedov', 'khabib@gmail.com', '01632103756', '2023-03-27', 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', '2023-03-22 05:15:08', '2023-03-22 05:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `role` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `nid` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `firstname`, `lastname`, `email`, `password`, `dob`, `role`, `gender`, `qualification`, `specialization`, `phone`, `address`, `nid`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Brad', 'pitt', 'brad@gmail.com', '123456', '2023-03-09', 'doctor', 'male', 'MBBS', 'surgeon', '01632103756', 'Ohio, Usa', '159874565489', '1679482989.jpg', '2023-03-16 03:49:29', '2023-03-22 05:03:09'),
(2, 'Anjelina', 'Jolie', 'anjelina@gmail.com', '123456', '2023-03-04', 'doctor', 'male', 'FCPS', 'sexologist', '01632103799', 'Michigan, usa', '92929292929292', '1679483045.jpg', '2023-03-16 03:50:15', '2023-03-22 05:04:05'),
(3, 'Khabib', 'Nurmagomedov', 'khabib@gmail.com', '123456', '2023-03-25', 'doctor', 'male', 'FRCS', 'orthopredix', '01632103756', 'Daegasthan, Russia', '159874565489', '1679483097.jpeg', '2023-03-16 03:51:29', '2023-03-22 05:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `healthpackages`
--

CREATE TABLE `healthpackages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `healthpackages`
--

INSERT INTO `healthpackages` (`id`, `name`, `type`, `description`, `price`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'care', 'Basic', 'This is our basic package. Includes basic body test.', '2500', '1679483570.jpg', '2023-03-16 03:45:27', '2023-03-22 05:12:50'),
(2, 'Care plus+', 'Moderate', 'This is our standard package. Includes body and diabetis and health test.', '7500', '1679483594.jpg', '2023-03-16 03:46:47', '2023-03-22 05:13:14'),
(3, 'Premium Care+', 'Premium', 'This is our Premium package. Includes full body checkup and suggestions and guidance for 3 months.', '18000', '1679483631.jpg', '2023-03-16 03:48:18', '2023-03-22 05:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorid` varchar(255) NOT NULL,
  `doctorname` varchar(255) NOT NULL,
  `patientid` varchar(255) NOT NULL,
  `patientname` varchar(255) NOT NULL,
  `appointmentid` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `doctorpicture` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `doctorid`, `doctorname`, `patientid`, `patientname`, `appointmentid`, `message`, `doctorpicture`, `created_at`, `updated_at`) VALUES
(1, '1', 'Brad', '1', 'Muhtadin', '5', 'gulugulu meet', '1679482989.jpg', '2023-03-22 05:10:40', '2023-03-22 05:10:40');

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
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_02_01_191111_patients', 1),
(4, '2023_02_01_194033_doctors', 1),
(5, '2023_02_06_140754_appointment', 1),
(6, '2023_02_08_154608_health_packages', 1),
(7, '2023_02_12_143302_payment_history', 1),
(8, '2023_02_14_132701_patient_message', 1),
(9, '2023_02_21_161604_prescription', 1),
(10, '2023_02_22_055512_admin', 1),
(11, '2023_02_23_061802_contact', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `role` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `nid` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `firstname`, `lastname`, `email`, `password`, `dob`, `role`, `gender`, `phone`, `address`, `nid`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Muhtadin', 'Mushfiq', 'patient@gmail.com', '123456', '2023-03-01', 'patient', 'male', '01632103756', '47', '159874565489', '1679482884.png', '2023-03-16 03:40:46', '2023-03-22 05:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `patientid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `packagename` varchar(255) NOT NULL,
  `cardname` varchar(255) NOT NULL,
  `cardnumber` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `patientid`, `email`, `address`, `phone`, `nid`, `price`, `packagename`, `cardname`, `cardnumber`, `created_at`, `updated_at`) VALUES
(1, 'Muhtadin Mushfiq', '1', 'patient@gmail.com', '47', '01632103756', '159874565489', '2500', 'care', 'brac bank', '12354', '2023-03-22 05:15:55', '2023-03-22 05:15:55'),
(2, 'Muhtadin Mushfiq', '1', 'patient@gmail.com', '47', '01632103756', '159874565489', '7500', 'Care plus+', 'ucb bank', '565148965458965965456', '2023-03-22 05:16:09', '2023-03-22 05:16:09'),
(3, 'Muhtadin Mushfiq', '1', 'patient@gmail.com', '47', '01632103756', '159874565489', '18000', 'Premium Care+', 'bkash', '14854785895658965', '2023-03-22 05:16:25', '2023-03-22 05:16:25');

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
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorid` varchar(255) NOT NULL,
  `doctorname` varchar(255) NOT NULL,
  `patientid` varchar(255) NOT NULL,
  `patientname` varchar(255) NOT NULL,
  `patientpicture` varchar(255) NOT NULL,
  `appointmentid` varchar(255) NOT NULL,
  `medicine` varchar(255) NOT NULL,
  `test` varchar(255) NOT NULL,
  `suggestion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `doctorid`, `doctorname`, `patientid`, `patientname`, `patientpicture`, `appointmentid`, `medicine`, `test`, `suggestion`, `created_at`, `updated_at`) VALUES
(1, '1', 'Brad', '1', 'Muhtadin', '1679482884.png', '5', 'grass', 'puke', 'fat eat', '2023-03-22 05:11:17', '2023-03-22 05:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `block_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `healthpackages`
--
ALTER TABLE `healthpackages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `healthpackages`
--
ALTER TABLE `healthpackages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
