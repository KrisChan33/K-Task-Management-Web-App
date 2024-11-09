-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table k-task-management-web-app-database.comments: ~1 rows (approximately)
INSERT IGNORE INTO `comments` (`id`, `user_id`, `commentable_type`, `commentable_id`, `comment`, `created_at`, `updated_at`) VALUES
	(1, 1, 'App\\Models\\Project', 1, 'Please Create This both of you', '2024-11-08 00:55:54', '2024-11-08 00:55:54');

-- Dumping data for table k-task-management-web-app-database.failed_jobs: ~0 rows (approximately)

-- Dumping data for table k-task-management-web-app-database.migrations: ~14 rows (approximately)
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2024_10_11_095736_add_custom_fields_to_users_table', 1),
	(7, '2024_10_11_095737_add_avatar_url_to_users_table', 1),
	(8, '2024_10_11_144819_add_custom_fields_to_users_table', 1),
	(9, '2024_10_14_033253_create_sessions_table', 1),
	(10, '2024_10_16_092103_add_two_factor_authentication_columns', 1),
	(11, '2024_10_18_061125_create_projects_table', 1),
	(12, '2024_10_19_064028_create_tasks_table', 1),
	(13, '2024_10_30_071945_user_project', 1),
	(14, '2024_11_03_004951_create_comments_table', 1),
	(15, '2024_10_11_011629_create_permission_tables', 2);

-- Dumping data for table k-task-management-web-app-database.model_has_permissions: ~0 rows (approximately)

-- Dumping data for table k-task-management-web-app-database.model_has_roles: ~3 rows (approximately)
INSERT IGNORE INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 2),
	(1, 'App\\Models\\User', 3);

-- Dumping data for table k-task-management-web-app-database.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table k-task-management-web-app-database.permissions: ~92 rows (approximately)
INSERT IGNORE INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'view_comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(2, 'view_any_comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(3, 'create_comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(4, 'update_comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(5, 'restore_comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(6, 'restore_any_comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(7, 'replicate_comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(8, 'reorder_comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(9, 'delete_comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(10, 'delete_any_comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(11, 'force_delete_comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(12, 'force_delete_any_comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(13, 'view_my::comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(14, 'view_any_my::comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(15, 'create_my::comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(16, 'update_my::comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(17, 'restore_my::comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(18, 'restore_any_my::comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(19, 'replicate_my::comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(20, 'reorder_my::comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(21, 'delete_my::comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(22, 'delete_any_my::comment', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(23, 'force_delete_my::comment', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(24, 'force_delete_any_my::comment', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(25, 'view_my::projects', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(26, 'view_any_my::projects', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(27, 'create_my::projects', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(28, 'update_my::projects', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(29, 'restore_my::projects', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(30, 'restore_any_my::projects', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(31, 'replicate_my::projects', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(32, 'reorder_my::projects', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(33, 'delete_my::projects', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(34, 'delete_any_my::projects', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(35, 'force_delete_my::projects', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(36, 'force_delete_any_my::projects', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(37, 'view_my::task', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(38, 'view_any_my::task', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(39, 'create_my::task', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(40, 'update_my::task', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(41, 'restore_my::task', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(42, 'restore_any_my::task', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(43, 'replicate_my::task', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(44, 'reorder_my::task', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(45, 'delete_my::task', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(46, 'delete_any_my::task', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(47, 'force_delete_my::task', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(48, 'force_delete_any_my::task', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(49, 'view_project', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(50, 'view_any_project', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(51, 'create_project', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(52, 'update_project', 'web', '2024-11-08 00:05:51', '2024-11-08 00:05:51'),
	(53, 'restore_project', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(54, 'restore_any_project', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(55, 'replicate_project', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(56, 'reorder_project', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(57, 'delete_project', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(58, 'delete_any_project', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(59, 'force_delete_project', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(60, 'force_delete_any_project', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(61, 'view_role', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(62, 'view_any_role', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(63, 'create_role', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(64, 'update_role', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(65, 'delete_role', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(66, 'delete_any_role', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(67, 'view_task', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(68, 'view_any_task', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(69, 'create_task', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(70, 'update_task', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(71, 'restore_task', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(72, 'restore_any_task', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(73, 'replicate_task', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(74, 'reorder_task', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(75, 'delete_task', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(76, 'delete_any_task', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(77, 'force_delete_task', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(78, 'force_delete_any_task', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(79, 'view_user', 'web', '2024-11-08 00:05:52', '2024-11-08 00:05:52'),
	(80, 'view_any_user', 'web', '2024-11-08 00:05:53', '2024-11-08 00:05:53'),
	(81, 'create_user', 'web', '2024-11-08 00:05:53', '2024-11-08 00:05:53'),
	(82, 'update_user', 'web', '2024-11-08 00:05:53', '2024-11-08 00:05:53'),
	(83, 'restore_user', 'web', '2024-11-08 00:05:53', '2024-11-08 00:05:53'),
	(84, 'restore_any_user', 'web', '2024-11-08 00:05:53', '2024-11-08 00:05:53'),
	(85, 'replicate_user', 'web', '2024-11-08 00:05:53', '2024-11-08 00:05:53'),
	(86, 'reorder_user', 'web', '2024-11-08 00:05:53', '2024-11-08 00:05:53'),
	(87, 'delete_user', 'web', '2024-11-08 00:05:53', '2024-11-08 00:05:53'),
	(88, 'delete_any_user', 'web', '2024-11-08 00:05:53', '2024-11-08 00:05:53'),
	(89, 'force_delete_user', 'web', '2024-11-08 00:05:53', '2024-11-08 00:05:53'),
	(90, 'force_delete_any_user', 'web', '2024-11-08 00:05:53', '2024-11-08 00:05:53'),
	(91, 'page_EditProfilePage', 'web', '2024-11-08 00:05:53', '2024-11-08 00:05:53'),
	(92, 'widget_SampleWidget', 'web', '2024-11-08 00:05:53', '2024-11-08 00:05:53');

-- Dumping data for table k-task-management-web-app-database.personal_access_tokens: ~0 rows (approximately)

-- Dumping data for table k-task-management-web-app-database.projects: ~1 rows (approximately)
INSERT IGNORE INTO `projects` (`id`, `user_id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Leonardo Da Vinci Arts', 'Leonardo Da Vinci Arts assigned to user and admin', 'Not Started', '2024-11-08 00:49:14', '2024-11-08 00:49:14');

-- Dumping data for table k-task-management-web-app-database.roles: ~2 rows (approximately)
INSERT IGNORE INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'super_admin', 'web', '2024-11-08 00:05:50', '2024-11-08 00:05:50'),
	(2, 'panel_user', 'web', '2024-11-08 00:05:53', '2024-11-08 00:05:53');

-- Dumping data for table k-task-management-web-app-database.role_has_permissions: ~165 rows (approximately)
INSERT IGNORE INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(25, 1),
	(26, 1),
	(27, 1),
	(28, 1),
	(29, 1),
	(30, 1),
	(31, 1),
	(32, 1),
	(33, 1),
	(34, 1),
	(35, 1),
	(36, 1),
	(37, 1),
	(38, 1),
	(39, 1),
	(40, 1),
	(41, 1),
	(42, 1),
	(43, 1),
	(44, 1),
	(45, 1),
	(46, 1),
	(47, 1),
	(48, 1),
	(49, 1),
	(50, 1),
	(51, 1),
	(52, 1),
	(53, 1),
	(54, 1),
	(55, 1),
	(56, 1),
	(57, 1),
	(58, 1),
	(59, 1),
	(60, 1),
	(61, 1),
	(62, 1),
	(63, 1),
	(64, 1),
	(65, 1),
	(66, 1),
	(67, 1),
	(68, 1),
	(69, 1),
	(70, 1),
	(71, 1),
	(72, 1),
	(73, 1),
	(74, 1),
	(75, 1),
	(76, 1),
	(77, 1),
	(78, 1),
	(79, 1),
	(80, 1),
	(81, 1),
	(82, 1),
	(83, 1),
	(84, 1),
	(85, 1),
	(86, 1),
	(87, 1),
	(88, 1),
	(89, 1),
	(90, 1),
	(91, 1),
	(92, 1),
	(1, 2),
	(2, 2),
	(3, 2),
	(4, 2),
	(5, 2),
	(6, 2),
	(7, 2),
	(8, 2),
	(9, 2),
	(10, 2),
	(11, 2),
	(12, 2),
	(13, 2),
	(14, 2),
	(15, 2),
	(16, 2),
	(17, 2),
	(18, 2),
	(19, 2),
	(20, 2),
	(21, 2),
	(22, 2),
	(23, 2),
	(24, 2),
	(25, 2),
	(26, 2),
	(27, 2),
	(28, 2),
	(29, 2),
	(30, 2),
	(31, 2),
	(32, 2),
	(33, 2),
	(34, 2),
	(35, 2),
	(36, 2),
	(37, 2),
	(38, 2),
	(39, 2),
	(40, 2),
	(41, 2),
	(42, 2),
	(43, 2),
	(44, 2),
	(45, 2),
	(46, 2),
	(47, 2),
	(48, 2),
	(49, 2),
	(50, 2),
	(51, 2),
	(52, 2),
	(53, 2),
	(54, 2),
	(55, 2),
	(56, 2),
	(57, 2),
	(58, 2),
	(59, 2),
	(60, 2),
	(67, 2),
	(68, 2),
	(69, 2),
	(70, 2),
	(71, 2),
	(72, 2),
	(73, 2),
	(74, 2),
	(75, 2),
	(76, 2),
	(77, 2),
	(78, 2),
	(91, 2);

-- Dumping data for table k-task-management-web-app-database.sessions: ~1 rows (approximately)
INSERT IGNORE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`, `created_at`, `updated_at`) VALUES
	('zPhntGQquut4kxXOSL9BAobfIHz1gqah6Sw36eYw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibHhia0FnYXMwV0hGbHM5bUxBc0N0bDZWOFpnYzg2RkpCMmhJSThPMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1731139985, NULL, NULL);

-- Dumping data for table k-task-management-web-app-database.tasks: ~1 rows (approximately)
INSERT IGNORE INTO `tasks` (`id`, `project_id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Buy Brushes', 'I add this task, accomplish this', 'Pending', '2024-11-08 01:33:41', '2024-11-08 01:33:41');

-- Dumping data for table k-task-management-web-app-database.users: ~3 rows (approximately)
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `custom_fields`, `avatar_url`) VALUES
	(1, 'Super Admin', 'superadmin@gmail.com', '2024-11-08 00:05:16', '$2y$12$n5pGcP3hzc5AzH8KXnAma.g1GNzL65TLKzYYAxjJkE5ysr9a9P.Wq', NULL, NULL, NULL, 'C45U3d5xZNi7s8ermfOgN9CO7IWFJ2M3pDcV1ahIMjcsGBRLPpCZ6OkslGQ5', '2024-11-08 00:05:17', '2024-11-08 00:05:17', NULL, ''),
	(2, 'Student Full Name', 'student@gmail.com', '2024-11-08 00:05:17', '$2y$12$mPlkBdrflFdQSmzkSxz2D.zx9YCMpDN5bPSE4HFi7dGRscKnXkNp6', NULL, NULL, NULL, '9Z6xIgCIoJFReZOIXAbO9nK05ZBd9NJT5N80GaeUoYKJhcnX9A1o0bxPLKpe', '2024-11-08 00:05:17', '2024-11-08 00:05:17', NULL, ''),
	(3, 'Kristian', 'Kristian@gmail.com', NULL, '$2y$12$PBWOnFODyVRYInyw/z/2FuEoWv8uSn01QPZCN1EdqpoAGqGI41ABm', NULL, NULL, NULL, NULL, '2024-11-08 01:38:53', '2024-11-08 01:38:53', NULL, NULL);

-- Dumping data for table k-task-management-web-app-database.user_project: ~2 rows (approximately)
INSERT IGNORE INTO `user_project` (`id`, `user_id`, `project_id`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, NULL, NULL),
	(2, 1, 1, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
