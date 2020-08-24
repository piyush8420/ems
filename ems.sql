-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.30-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ems.event
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `date` date DEFAULT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table ems.event: ~6 rows (approximately)
DELETE FROM `event`;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` (`id`, `name`, `detail`, `date`, `start`, `end`, `created_at`, `updated_at`) VALUES
	(18, 'Upcoming Luxury Launch Event', 'New Luxury Product\'s are coming soon', '2020-08-20', '13:50:00', '15:55:00', '2020-08-16 17:22:47', '2020-08-16 17:22:47'),
	(19, 'birthday', 'celebration', '2020-08-22', '18:45:00', '22:52:00', '2020-08-18 11:16:17', '2020-08-18 11:16:17'),
	(20, 'Privacy Policy', 'qwqwqwqwq', '2020-08-19', '23:56:00', '12:00:00', '2020-08-18 16:27:09', '2020-08-18 16:27:09'),
	(21, 'Privacy Policy', 'fdasaf', '2020-08-28', '23:57:00', '21:00:00', '2020-08-18 16:28:01', '2020-08-18 16:28:01'),
	(22, 'ghhfhh', 'hfgh', '2020-08-12', '13:58:00', '13:58:00', '2020-08-18 16:29:02', '2020-08-18 16:29:02'),
	(23, 'ganesh pooja', 'hjkhk', '2020-08-19', '22:06:00', '15:02:00', '2020-08-19 13:15:30', '2020-08-19 07:45:30');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;

-- Dumping structure for table ems.log
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` longtext,
  `action` longtext,
  `user_data_log` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ems.log: ~12 rows (approximately)
DELETE FROM `log`;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` (`id`, `event_id`, `action`, `user_data_log`, `created_at`, `updated_at`) VALUES
	(15, '28', 'Update Event', '{"_token":"BVKzp2EkeKbiuGxTL8AX68uIotPD7taLZYlunaiQ","_method":"PUT","name":"fffffffffffffffff","date":"2020-08-28","start":"22:15:00","end":"13:10:00","detail":"asdsa"}', '2020-08-18 22:39:30', NULL),
	(16, '3', 'Update Notification', '{"_token":"BVKzp2EkeKbiuGxTL8AX68uIotPD7taLZYlunaiQ","_method":"PUT","name":"Email Notificationnn"}', '2020-08-18 22:54:57', NULL),
	(17, '6', 'Store Notification', '{"_token":"BVKzp2EkeKbiuGxTL8AX68uIotPD7taLZYlunaiQ","name":"dfghjklkjhg"}', '2020-08-18 22:55:46', NULL),
	(18, '28', 'delete Event', '{"name":"fffffffffffffffff","detail":"asdsa","date":"2020-08-28","start":"22:15:00","end":"13:10:00"}', '2020-08-18 23:05:17', NULL),
	(19, '29', 'delete Event', '{"name":"qwertyurtyutyjyu","detail":"ytyysdfghjkcxfghjkddsfsfsd","date":"2020-08-25","start":"13:11:00","end":"22:11:00"}', '2020-08-18 23:05:31', NULL),
	(20, '27', 'delete Event', '{"name":"sddssds","detail":"asdsa","date":"2020-08-28","start":"22:15:00","end":"13:10:00"}', '2020-08-18 23:05:51', NULL),
	(21, '26', 'delete Event', '{"name":"fhdhhh","detail":"dfhgfhg","date":"2020-08-13","start":"22:06:00","end":"13:06:00"}', '2020-08-18 23:05:55', NULL),
	(22, '25', 'delete Event', '{"name":"hgfj","detail":"gjfgj","date":"2020-08-06","start":"22:10:00","end":"13:05:00"}', '2020-08-18 23:06:10', NULL),
	(23, '24', 'delete Event', '{"name":"sad","detail":"sdfdsfs","date":"2020-08-13","start":"13:04:00","end":"13:04:00"}', '2020-08-18 23:06:15', NULL),
	(24, '20', 'Email Notification', '[{"id":1,"name":"Piyush Chaudhary","company_name":"","phone_number":"","email":"chaudharypiyushph@gmail.com"},{"id":2,"name":"ritesh Chaudhary","company_name":"","phone_number":"","email":"chaudharypiyushph@gmail.com"},{"id":3,"name":"rupesh Chaudhary","company_name":"","phone_number":"","email":"chaudharypiyushph@gmail.com"},{"id":4,"name":"sanjay Chaudhary","company_name":"","phone_number":"","email":"piyushchaudhary841996@gmail.com"}]', '2020-08-19 13:08:52', NULL),
	(25, '20', 'Email Notification', '[{"id":1,"name":"Piyush Chaudhary","company_name":"","phone_number":"","email":"chaudharypiyushph@gmail.com"},{"id":2,"name":"ritesh Chaudhary","company_name":"","phone_number":"","email":"chaudharypiyushph@gmail.com"},{"id":3,"name":"rupesh Chaudhary","company_name":"","phone_number":"","email":"chaudharypiyushph@gmail.com"},{"id":4,"name":"sanjay Chaudhary","company_name":"","phone_number":"","email":"piyushchaudhary841996@gmail.com"}]', '2020-08-19 13:10:13', NULL),
	(26, '23', 'Update Event', '{"_token":"2ydsCh6OCScU1btdtvAVMNqDSel32j4FienFd9xR","_method":"PUT","name":"ganesh pooja","date":"2020-08-19","start":"22:06:00","end":"15:02:00","detail":"hjkhk"}', '2020-08-19 13:15:30', NULL);
/*!40000 ALTER TABLE `log` ENABLE KEYS */;

-- Dumping structure for table ems.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ems.migrations: ~0 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table ems.notify
CREATE TABLE IF NOT EXISTS `notify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table ems.notify: ~4 rows (approximately)
DELETE FROM `notify`;
/*!40000 ALTER TABLE `notify` DISABLE KEYS */;
INSERT INTO `notify` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(2, 'Message Notification', '2020-08-17 05:39:00', '2020-08-17 05:39:00'),
	(3, 'Email Notificationnn', '2020-08-18 22:54:57', '2020-08-18 17:24:57'),
	(4, 'Firebase Notification', '2020-08-18 13:52:03', '2020-08-18 08:22:03'),
	(5, 'WhatsApp Notification', '2020-08-18 08:23:19', '2020-08-18 08:23:19');
/*!40000 ALTER TABLE `notify` ENABLE KEYS */;

-- Dumping structure for table ems.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ems.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('chaudharypiyushph@gmail.com', '$2y$10$uHPDEVM6D9PHmq7yGoeNqeUbgnsTlbfSI.rH0aeGigbIIziqNHFC2', '2020-08-13 08:29:31');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table ems.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ems.users: ~4 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `company_name`, `phone_number`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Piyush Chaudhary', '', '', 'chaudharypiyushph@gmail.com', NULL, '$2y$10$KHKTz8/AR5P8GajM1l.Ut.iXeFqtjFZnFYdwCknnV9xVSWkp5bZJa', NULL, '2020-08-12 13:03:41', '2020-08-12 13:03:41'),
	(2, 'ritesh Chaudhary', '', '', 'chaudharypiyushph@gmail.com', NULL, '$2y$10$KHKTz8/AR5P8GajM1l.Ut.iXeFqtjFZnFYdwCknnV9xVSWkp5bZJa', NULL, '2020-08-12 13:03:41', '2020-08-12 13:03:41'),
	(3, 'rupesh Chaudhary', '', '', 'chaudharypiyushph@gmail.com', NULL, '$2y$10$KHKTz8/AR5P8GajM1l.Ut.iXeFqtjFZnFYdwCknnV9xVSWkp5bZJa', NULL, '2020-08-12 13:03:41', '2020-08-12 13:03:41'),
	(4, 'sanjay Chaudhary', '', '', 'piyushchaudhary841996@gmail.com', NULL, '$2y$10$KHKTz8/AR5P8GajM1l.Ut.iXeFqtjFZnFYdwCknnV9xVSWkp5bZJa', NULL, '2020-08-12 13:03:41', '2020-08-12 13:03:41');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
