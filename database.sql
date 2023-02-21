-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table hospital.appointments
DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient` bigint(20) unsigned NOT NULL,
  `doctor` bigint(20) unsigned NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeslot` bigint(20) unsigned NOT NULL,
  `fees` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appointments_patient_foreign` (`patient`),
  KEY `appointments_doctor_foreign` (`doctor`),
  KEY `appointments_timeslot_foreign` (`timeslot`),
  CONSTRAINT `appointments_doctor_foreign` FOREIGN KEY (`doctor`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `appointments_patient_foreign` FOREIGN KEY (`patient`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `appointments_timeslot_foreign` FOREIGN KEY (`timeslot`) REFERENCES `timeslot` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hospital.appointments: ~2 rows (approximately)
DELETE FROM `appointments`;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` (`id`, `status`, `patient`, `doctor`, `date`, `timeslot`, `fees`, `number`, `address`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Pending', 2, 3, '2020-03-31', 1, '500', '01782448244', NULL, NULL, '2020-03-31 02:21:42', '2020-03-31 02:21:42'),
	(3, 'Pending', 8, 3, '2020-04-01', 1, '570', '01782448244', NULL, NULL, '2020-04-01 03:28:13', '2020-04-02 01:05:32');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;

-- Dumping structure for table hospital.doctor_fee
DROP TABLE IF EXISTS `doctor_fee`;
CREATE TABLE IF NOT EXISTS `doctor_fee` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `doctor` bigint(20) unsigned NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctor_fee_doctor_foreign` (`doctor`),
  CONSTRAINT `doctor_fee_doctor_foreign` FOREIGN KEY (`doctor`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hospital.doctor_fee: ~0 rows (approximately)
DELETE FROM `doctor_fee`;
/*!40000 ALTER TABLE `doctor_fee` DISABLE KEYS */;
INSERT INTO `doctor_fee` (`id`, `doctor`, `amount`, `description`, `created_at`, `updated_at`) VALUES
	(1, 3, '500', NULL, '2020-03-29 04:24:20', '2020-03-29 04:24:20');
/*!40000 ALTER TABLE `doctor_fee` ENABLE KEYS */;

-- Dumping structure for table hospital.doctor_schedule
DROP TABLE IF EXISTS `doctor_schedule`;
CREATE TABLE IF NOT EXISTS `doctor_schedule` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `doctor` bigint(20) unsigned NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeslot` bigint(20) unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctor_schedule_doctor_foreign` (`doctor`),
  KEY `doctor_schedule_timeslot_foreign` (`timeslot`),
  CONSTRAINT `doctor_schedule_doctor_foreign` FOREIGN KEY (`doctor`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `doctor_schedule_timeslot_foreign` FOREIGN KEY (`timeslot`) REFERENCES `timeslot` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hospital.doctor_schedule: ~0 rows (approximately)
DELETE FROM `doctor_schedule`;
/*!40000 ALTER TABLE `doctor_schedule` DISABLE KEYS */;
INSERT INTO `doctor_schedule` (`id`, `doctor`, `day`, `timeslot`, `description`, `created_at`, `updated_at`) VALUES
	(4, 3, '2020-03-30', 1, 'Hi', '2020-03-29 04:38:45', '2020-03-29 04:38:45');
/*!40000 ALTER TABLE `doctor_schedule` ENABLE KEYS */;

-- Dumping structure for table hospital.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hospital.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table hospital.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hospital.migrations: ~9 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(13, '2014_10_12_000000_create_users_table', 1),
	(14, '2014_10_12_100000_create_password_resets_table', 1),
	(15, '2019_08_19_000000_create_failed_jobs_table', 1),
	(18, '2020_03_29_022048_timeslot', 2),
	(19, '2020_03_29_030640_doctor_fee', 2),
	(20, '2020_03_29_040110_doctor_schedule', 2),
	(21, '2020_03_30_014835_create_tests_table', 3),
	(23, '2020_03_30_021451_create_patient_tests_table', 4),
	(30, '2020_03_30_030021_create_patient_medicines_table', 5),
	(31, '2020_03_30_041910_create_appointments_table', 5),
	(32, '2020_03_31_015852_create_prescriptions_table', 5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table hospital.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hospital.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table hospital.patient_medicines
DROP TABLE IF EXISTS `patient_medicines`;
CREATE TABLE IF NOT EXISTS `patient_medicines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `patient` bigint(20) unsigned NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_medicines_patient_foreign` (`patient`),
  CONSTRAINT `patient_medicines_patient_foreign` FOREIGN KEY (`patient`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hospital.patient_medicines: ~2 rows (approximately)
DELETE FROM `patient_medicines`;
/*!40000 ALTER TABLE `patient_medicines` DISABLE KEYS */;
INSERT INTO `patient_medicines` (`id`, `patient`, `date`, `cost`, `medicine`, `created_at`, `updated_at`) VALUES
	(2, 2, '2020-04-01', '450', 'Napa: 10 Days', '2020-04-01 04:01:42', '2020-04-01 04:01:42'),
	(3, 8, '2020-04-01', '450', 'Azithromycin: 2 Days', '2020-04-01 04:05:54', '2020-04-01 04:05:54');
/*!40000 ALTER TABLE `patient_medicines` ENABLE KEYS */;

-- Dumping structure for table hospital.patient_tests
DROP TABLE IF EXISTS `patient_tests`;
CREATE TABLE IF NOT EXISTS `patient_tests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `patient` bigint(20) unsigned NOT NULL,
  `test` bigint(20) unsigned NOT NULL,
  `collection_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_tests_patient_foreign` (`patient`),
  KEY `patient_tests_test_foreign` (`test`),
  CONSTRAINT `patient_tests_patient_foreign` FOREIGN KEY (`patient`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `patient_tests_test_foreign` FOREIGN KEY (`test`) REFERENCES `tests` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hospital.patient_tests: ~1 rows (approximately)
DELETE FROM `patient_tests`;
/*!40000 ALTER TABLE `patient_tests` DISABLE KEYS */;
INSERT INTO `patient_tests` (`id`, `patient`, `test`, `collection_date`, `delivery_date`, `cost`, `description`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, '2020-03-30', '2020-03-31', '450', NULL, '2020-03-30 02:41:09', '2020-03-30 02:41:09');
/*!40000 ALTER TABLE `patient_tests` ENABLE KEYS */;

-- Dumping structure for table hospital.prescriptions
DROP TABLE IF EXISTS `prescriptions`;
CREATE TABLE IF NOT EXISTS `prescriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `appointment` bigint(20) unsigned NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hospital.prescriptions: ~3 rows (approximately)
DELETE FROM `prescriptions`;
/*!40000 ALTER TABLE `prescriptions` DISABLE KEYS */;
INSERT INTO `prescriptions` (`id`, `appointment`, `date`, `description`, `created_at`, `updated_at`) VALUES
	(2, 1, '2020-04-01', 'Azithromycin mg/sml\r\nDay 1: 15 mL\r\nDay 2: 7.5 mL', '2020-03-31 02:32:17', '2020-03-31 02:32:17'),
	(3, 3, '2020-04-02', 'Desc', '2020-04-01 04:18:37', '2020-04-01 04:18:37'),
	(4, 3, '2020-04-02', 'Medicine: 2 Days', '2020-04-02 01:27:46', '2020-04-02 01:27:46');
/*!40000 ALTER TABLE `prescriptions` ENABLE KEYS */;

-- Dumping structure for table hospital.tests
DROP TABLE IF EXISTS `tests`;
CREATE TABLE IF NOT EXISTS `tests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hospital.tests: ~2 rows (approximately)
DELETE FROM `tests`;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
INSERT INTO `tests` (`id`, `name`, `cost`, `duration`, `sample`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Blood Glucose', '450', '1 Day', 'Pee', NULL, '2020-03-30 02:07:27', '2020-03-30 02:12:19');
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;

-- Dumping structure for table hospital.timeslot
DROP TABLE IF EXISTS `timeslot`;
CREATE TABLE IF NOT EXISTS `timeslot` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hospital.timeslot: ~0 rows (approximately)
DELETE FROM `timeslot`;
/*!40000 ALTER TABLE `timeslot` DISABLE KEYS */;
INSERT INTO `timeslot` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
	(1, '9:00 - 9:30', '9:00 - 9:30', '2020-03-29 04:22:40', '2020-03-29 04:22:40');
/*!40000 ALTER TABLE `timeslot` ENABLE KEYS */;

-- Dumping structure for table hospital.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hospital.users: ~4 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `phone`, `dob`, `address`, `city`, `country`, `photo`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@example.com', '01782448244', '2020-03-27', 'Dhaka', 'Dhaka', 'Bangladesh', '/uploads/users/avatar_1_1585313857.jpg', 'admin', NULL, '$2y$10$N7FL.pypnLsES1nRu27Khe.RZaUPIWHIIKQHDDaQlzPlQkdXfCZ1W', NULL, '2020-04-02 08:21:38', '2020-03-27 12:57:37'),
	(2, 'Patient', 'patient@example.com', NULL, '2020-03-29', NULL, NULL, NULL, '', 'patient', NULL, '$2y$10$oQvD9Q4PfLunZUEt21MPC.iM8P5dpy4GZiTUsPlxXbtw9kdQfrh26', NULL, '2020-04-02 08:21:37', '2020-03-29 02:16:47'),
	(3, 'Doctor', 'doctor@example.com', NULL, NULL, NULL, NULL, NULL, NULL, 'doctor', NULL, '$2y$10$sBU8dvN5q0aNO8prBXrq..o.4oxChLJ20YTqAe6DN1hd/YVpP5Bmi', NULL, '2020-04-02 08:21:35', '2020-04-02 08:21:40'),
	(4, 'Hospital', 'receptionist@example.com', NULL, NULL, NULL, NULL, NULL, NULL, 'receptionist', NULL, '$2y$10$zHs9VEXUXE2dh4aiSAnex.uFiIoSNkZQjmbHjuluAsEmOshAsO5Dq', NULL, '2020-04-02 08:21:34', '2020-04-02 08:21:41'),
	(8, 'Imran', 'bfihelp@gmail.com', '01782448244', '2020-03-31', NULL, 'Dhaka', 'Bangladesh', '/uploads/users/avatar_1585625840.jpg', 'patient', NULL, '$2y$10$GP8x.y5OSIUBSmetz8H8y.8tliVbW/t5yoqhLXQrHSpKXyWChs0A2', NULL, '2020-03-31 03:37:20', '2020-03-31 03:37:20');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
