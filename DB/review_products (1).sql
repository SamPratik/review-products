-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 12:45 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `review_products`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shihab Mahmood', 'shihab@example.com', '$2y$10$4t7zzG1B6Nnx0TRbWCcYxeReyJqK5E4jaE2gLgE.vy5L11Yl8wokW', 'wfB5LH9Qtm6peAvCdpB4rnlDCY8b2BpZcBhczF1jyojC0oWiQHMc74779GUA', '2018-04-05 09:59:46', '2018-04-06 08:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Food', NULL, NULL),
(2, 'Electronics', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `comment`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 21, 'This is a comment', '2018-03-27 04:16:11', '2018-03-27 04:16:11', 1),
(4, 20, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', '2018-03-27 04:44:48', '2018-03-27 04:44:48', 1),
(6, 20, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2018-03-27 04:45:23', '2018-03-27 04:45:23', 1),
(7, 21, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.', '2018-03-27 04:53:29', '2018-03-27 04:53:29', 1),
(8, 21, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2018-03-27 05:02:14', '2018-03-27 05:02:14', 1),
(9, 20, 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2018-03-27 05:02:47', '2018-03-27 05:02:47', 1),
(22, 22, 'Comment from Affan', '2018-03-27 13:17:37', '2018-03-27 13:17:37', 2),
(23, 21, 'remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-03-27 13:21:20', '2018-03-27 13:21:20', 2),
(42, 22, 'second comment in latest post till now', '2018-03-28 03:16:56', '2018-03-28 03:16:56', 1),
(54, 21, 'Comment from burger page', '2018-03-28 05:29:16', '2018-03-28 05:29:16', 1),
(55, 20, 'comment from pizza page', '2018-03-28 05:36:12', '2018-03-28 05:36:12', 1),
(56, 20, 'comment from ratul hasan', '2018-03-28 13:55:51', '2018-03-28 13:55:51', 5),
(93, 26, 'seventh updated comment', '2018-03-29 15:01:40', '2018-03-30 03:50:53', 1),
(98, 22, 'fifth comment', '2018-03-30 04:11:39', '2018-03-30 04:11:39', 1),
(109, 25, 'firs comment', '2018-03-30 05:15:31', '2018-03-30 05:15:31', 1),
(110, 25, 'second comment', '2018-03-30 05:15:37', '2018-03-30 05:15:37', 1),
(112, 26, '9th comment updated', '2018-03-30 11:36:31', '2018-04-05 12:38:18', 1),
(113, 29, 'first comment', '2018-04-01 08:54:53', '2018-04-05 12:22:05', 1),
(114, 30, 'laptop post', '2018-04-01 13:00:50', '2018-04-01 13:00:50', 1),
(115, 30, 'second comment', '2018-04-01 13:00:56', '2018-04-01 13:00:56', 1),
(116, 30, 'third comment', '2018-04-01 13:01:37', '2018-04-01 13:01:37', 1),
(130, 34, 'first comment', '2018-04-05 05:02:25', '2018-04-05 05:02:25', 1),
(131, 34, 'second comment', '2018-04-05 05:02:36', '2018-04-05 05:02:36', 1),
(132, 34, 'third commnet', '2018-04-05 05:02:47', '2018-04-05 05:02:47', 1),
(135, 34, 'sixth comment', '2018-04-05 05:06:26', '2018-04-05 05:06:26', 2),
(136, 34, 'seventh comment', '2018-04-05 05:06:35', '2018-04-05 05:06:35', 2),
(137, 34, '8th comment', '2018-04-05 05:06:44', '2018-04-05 05:06:44', 2),
(138, 34, '9th comment', '2018-04-05 08:59:09', '2018-04-05 08:59:09', 1),
(142, 20, 'comment', '2018-04-05 11:32:31', '2018-04-05 11:32:31', 1),
(143, 36, 'first comment', '2018-04-05 12:41:44', '2018-04-05 12:41:44', 1),
(144, 21, 'comment', '2018-04-06 05:13:12', '2018-04-06 05:13:12', 1),
(147, 36, 'comment', '2018-04-06 05:15:01', '2018-04-06 05:15:01', 1),
(148, 36, 'comment', '2018-04-06 05:15:03', '2018-04-06 05:15:03', 1),
(149, 36, 'comment', '2018-04-06 05:16:45', '2018-04-06 05:16:45', 1),
(150, 36, 'comment', '2018-04-06 05:17:06', '2018-04-06 05:17:06', 1),
(151, 36, 'comment', '2018-04-06 05:17:26', '2018-04-06 05:17:26', 1),
(152, 36, 'comment', '2018-04-06 05:18:09', '2018-04-06 05:18:09', 1),
(153, 22, 'comment', '2018-04-06 05:18:41', '2018-04-06 05:18:41', 1),
(154, 21, 'second comment', '2018-04-06 05:21:32', '2018-04-06 05:21:32', 1),
(155, 21, 'third comment', '2018-04-06 05:21:49', '2018-04-06 05:21:49', 1),
(156, 21, 'fourth comment', '2018-04-06 05:23:36', '2018-04-06 05:23:36', 1),
(157, 22, 'second comment', '2018-04-06 05:36:02', '2018-04-06 05:36:02', 1),
(158, 22, 'third comment', '2018-04-06 05:37:33', '2018-04-06 05:37:33', 1),
(159, 22, 'comment', '2018-04-06 05:44:06', '2018-04-06 05:44:06', 1),
(160, 22, 'second comment', '2018-04-06 07:33:22', '2018-04-06 07:33:22', 1),
(161, 22, 'third comment', '2018-04-06 07:34:21', '2018-04-06 07:34:21', 1),
(162, 22, 'fourth comment', '2018-04-06 07:35:20', '2018-04-06 07:35:20', 1),
(163, 22, 'fifth comment', '2018-04-06 07:57:28', '2018-04-06 07:57:28', 1),
(164, 22, 'sixth comment', '2018-04-06 08:00:31', '2018-04-06 08:00:31', 1),
(165, 22, 'seventh comment', '2018-04-06 08:01:06', '2018-04-06 08:01:06', 1),
(166, 29, 'second comment', '2018-04-06 08:08:01', '2018-04-06 08:08:01', 1),
(167, 29, 'third comment', '2018-04-06 08:08:18', '2018-04-06 08:08:18', 1),
(168, 30, 'fourth comment', '2018-04-06 08:09:36', '2018-04-06 08:09:36', 1),
(169, 30, 'fifth comment', '2018-04-06 08:09:59', '2018-04-06 08:09:59', 1),
(170, 36, 'second comment', '2018-04-06 08:10:43', '2018-04-06 08:10:43', 1),
(171, 34, '10th comment', '2018-04-06 08:16:30', '2018-04-06 08:16:30', 1),
(172, 22, 'eight comment', '2018-04-06 08:20:09', '2018-04-06 08:20:09', 1),
(173, 36, 'third comment', '2018-04-06 08:21:45', '2018-04-06 08:21:45', 1),
(174, 37, 'comment', '2018-04-06 08:46:39', '2018-04-06 08:46:39', 1),
(175, 37, 'second comment', '2018-04-06 09:24:17', '2018-04-06 09:24:17', 1),
(176, 37, 'third comment', '2018-04-06 11:44:19', '2018-04-06 11:44:19', 1),
(177, 37, 'fourth comment', '2018-04-07 09:47:09', '2018-04-07 09:47:09', 1),
(178, 37, 'fifth comment', '2018-04-08 09:09:22', '2018-04-08 09:09:22', 1),
(179, 37, 'sixth comment', '2018-04-08 09:10:08', '2018-04-08 09:10:08', 1),
(180, 37, '7th comment', '2018-04-08 09:11:42', '2018-04-08 09:11:42', 1),
(181, 37, '8th comment', '2018-04-08 09:24:16', '2018-04-08 09:24:16', 1),
(182, 37, '9th comment', '2018-04-08 09:25:24', '2018-04-08 09:25:24', 1),
(183, 37, '10th comment', '2018-04-08 09:35:44', '2018-04-08 09:35:44', 1),
(184, 37, '11th comment', '2018-04-08 09:37:36', '2018-04-08 09:37:36', 1),
(185, 37, '12th comment', '2018-04-08 09:42:46', '2018-04-08 09:42:46', 1),
(186, 35, 'first comment', '2018-04-12 00:04:31', '2018-04-12 00:04:31', 1),
(187, 27, 'first comment', '2018-04-12 08:39:57', '2018-04-12 08:39:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2018_03_25_153851_add_cols_to_users', 2),
(9, '2018_03_25_155906_create_posts_table', 3),
(10, '2018_03_25_162514_create_post_images_table', 4),
(11, '2018_03_25_162952_create_comments_table', 5),
(12, '2018_03_25_163746_create_sub_categories_table', 6),
(13, '2018_03_25_163918_create_shops_table', 6),
(14, '2018_03_25_165625_create_categories_table', 7),
(16, '2018_03_25_170050_add_category_id_to_subcategories', 8),
(17, '2018_03_25_182646_replace_cat_with_category_id_in_posts', 9),
(18, '2018_03_26_091425_drop_shops', 10),
(19, '2018_03_26_092007_create_users_table', 11),
(20, '2018_03_26_092343_add_cols_to_users', 12),
(21, '2018_03_26_092615_drop_shops', 13),
(23, '2018_03_26_092753_add_drop_cols_to_shops', 14),
(24, '2018_03_27_092636_add_item_col_to_posts', 15),
(25, '2018_03_27_100706_add_user_id_to_comments', 16),
(26, '2018_03_28_153408_rename_religious_to_religion', 17),
(31, '2018_04_03_193511_create_admins_table', 18),
(32, '2018_04_04_212431_create_activity_date_to_users', 18),
(33, '2018_04_15_185148_create_social_providers_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('pratik.anwar@gmail.com', '754d20f9f6d47ddc985430aa16653c9ae356ad7750295716d4af0a85d8cf51eb', '2018-04-04 02:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `rating` double(3,1) DEFAULT NULL,
  `post` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `shop_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shop_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `subcategory_id`, `price`, `rating`, `post`, `created_at`, `updated_at`, `category_id`, `shop_name`, `shop_location`, `item`) VALUES
(20, 1, 2, 350, 6.5, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2018-03-27 05:01:17', '2018-03-27 05:01:17', 1, 'Al Fresco', 'Sector - 11, Uttara', 'Chicken Supreme'),
(21, 2, 1, 220, 8.0, 'Really awesome burger. worth to try once.', '2018-03-27 08:25:26', '2018-03-27 08:25:26', 1, 'BFC', 'serctor-13, uttara', 'Super Burger Combo'),
(22, 2, 2, 340, 7.0, 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2018-03-27 11:11:19', '2018-03-27 11:11:19', 1, 'Al fresco', 'Uttara, Dhaka', 'Oven Baked'),
(25, 1, 1, 99, 5.9, 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2018-03-28 04:19:38', '2018-04-01 08:19:16', 1, 'Mexican Spicy', 'Sector - 11, Uttara, Dhaka', 'Student'),
(26, 1, 1, 200, 7.0, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2018-03-28 14:25:28', '2018-03-30 11:53:53', 1, 'bfc', 'Uttara, Dhaka', 'Grill Chicken'),
(27, 1, 1, 260, 6.0, 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2018-04-01 04:17:11', '2018-04-05 12:21:54', 1, 'Takeout', 'Uttara, Dhaka', 'Chicken Cheese Delight'),
(29, 1, 1, 270, 5.0, 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-04-01 04:51:45', '2018-04-01 04:51:45', 1, 'Takeout', 'Dhanmondi', 'chicken cheese delight'),
(30, 1, 4, 53500, 8.0, 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-04-01 12:40:57', '2018-04-03 10:09:36', 2, 'Dolphin', 'Agargaon', 'HP Probook 4440s'),
(34, 1, 4, 53500, 9.0, 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-04-05 04:54:28', '2018-04-05 04:54:28', 2, 'DOLPHIN', 'Agargaon', 'HP Probook 4440s'),
(35, 1, 1, 260, 9.0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-04-05 09:01:44', '2018-04-05 09:01:44', 1, 'Fat Joes', 'Uttara, Dhaka', 'Smoke Wood'),
(36, 1, 1, 260, 9.0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-04-05 09:01:57', '2018-04-05 12:37:57', 1, 'Fat Joes', 'Uttara, Dhaka', 'Smoke Wood'),
(37, 1, 1, 260, 7.0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-04-06 08:44:54', '2018-04-06 08:44:54', 1, 'takeout', 'Uttara', 'chicken cheese delight'),
(38, 1, 2, 200, 8.5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2018-04-12 08:37:56', '2018-04-12 08:37:56', 1, 'veni vidi vici', 'uttara', 'demo'),
(40, 1, 5, 99, 9.0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-04-16 02:21:57', '2018-04-16 02:21:57', 1, 'Sung Palace', 'Uttara', 'Thai Fried Rice'),
(41, 1, 1, 260, 10.0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-04-16 02:25:06', '2018-04-16 02:25:06', 1, 'Fat joes', 'Uttara', 'Smoke wood');

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

CREATE TABLE `post_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_images`
--

INSERT INTO `post_images` (`id`, `post_id`, `image`, `created_at`, `updated_at`) VALUES
(38, 20, '5aba247d25e00.jpg', '2018-03-27 05:01:17', '2018-03-27 05:01:17'),
(39, 20, '5aba247da010d.jpg', '2018-03-27 05:01:17', '2018-03-27 05:01:17'),
(40, 20, '5aba247df140c.jpg', '2018-03-27 05:01:18', '2018-03-27 05:01:18'),
(41, 21, '5aba5456e2f8d.jpg', '2018-03-27 08:25:27', '2018-03-27 08:25:27'),
(42, 21, '5aba545766e24.jpg', '2018-03-27 08:25:27', '2018-03-27 08:25:27'),
(43, 21, '5aba54579a535.jpg', '2018-03-27 08:25:27', '2018-03-27 08:25:27'),
(44, 22, '5aba7b3755514.jpg', '2018-03-27 11:11:19', '2018-03-27 11:11:19'),
(45, 23, '5abb67049d162.jpg', '2018-03-28 03:57:25', '2018-03-28 03:57:25'),
(46, 23, '5abb67051a650.jpg', '2018-03-28 03:57:25', '2018-03-28 03:57:25'),
(47, 23, '5abb67055c240.jpg', '2018-03-28 03:57:25', '2018-03-28 03:57:25'),
(48, 23, '5abb670592e1c.jpg', '2018-03-28 03:57:25', '2018-03-28 03:57:25'),
(67, 25, '5abd0b67d2024.jpg', '2018-03-29 09:51:04', '2018-03-29 09:51:04'),
(69, 26, '5abd0be9e93d1.jpg', '2018-03-29 09:53:14', '2018-03-29 09:53:14'),
(70, 26, '5abd0bea76869.jpg', '2018-03-29 09:53:14', '2018-03-29 09:53:14'),
(71, 26, '5abd0beab50ce.jpg', '2018-03-29 09:53:14', '2018-03-29 09:53:14'),
(72, 27, '5ac0b1a7421e9.jpg', '2018-04-01 04:17:11', '2018-04-01 04:17:11'),
(73, 27, '5ac0b1a7e0d35.jpg', '2018-04-01 04:17:12', '2018-04-01 04:17:12'),
(74, 27, '5ac0b1a815eb2.jpg', '2018-04-01 04:17:12', '2018-04-01 04:17:12'),
(76, 29, '5ac0b9c186665.jpg', '2018-04-01 04:51:45', '2018-04-01 04:51:45'),
(77, 30, '5ac127b974936.jpg', '2018-04-01 12:40:57', '2018-04-01 12:40:57'),
(78, 30, '5ac127b9b7a89.jpg', '2018-04-01 12:40:57', '2018-04-01 12:40:57'),
(85, 34, '5ac6006505a90.jpg', '2018-04-05 04:54:29', '2018-04-05 04:54:29'),
(86, 35, '5ac63a58823e8.jpg', '2018-04-05 09:01:44', '2018-04-05 09:01:44'),
(87, 35, '5ac63a58eb522.jpg', '2018-04-05 09:01:45', '2018-04-05 09:01:45'),
(88, 36, '5ac63a658452e.jpg', '2018-04-05 09:01:57', '2018-04-05 09:01:57'),
(89, 36, '5ac63a65eb722.jpg', '2018-04-05 09:01:58', '2018-04-05 09:01:58'),
(90, 37, '5ac787e6e6fd4.jpg', '2018-04-06 08:44:55', '2018-04-06 08:44:55'),
(91, 37, '5ac787e7b3ccf.jpg', '2018-04-06 08:44:55', '2018-04-06 08:44:55'),
(92, 37, '5ac787e7e17e7.jpg', '2018-04-06 08:44:56', '2018-04-06 08:44:56'),
(93, 38, '5acf6f444e702.jpg', '2018-04-12 08:37:56', '2018-04-12 08:37:56'),
(94, 38, '5acf6f44e6678.jpg', '2018-04-12 08:37:57', '2018-04-12 08:37:57'),
(96, 40, '5ad45d26099f2.jpg', '2018-04-16 02:21:58', '2018-04-16 02:21:58'),
(99, 41, '5ad45ed39084c.jpg', '2018-04-16 02:29:07', '2018-04-16 02:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `social_providers`
--

CREATE TABLE `social_providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'Burger', NULL, NULL, 1),
(2, 'Pizza', NULL, NULL, 1),
(3, 'Mobile', NULL, NULL, 2),
(4, 'Laptop', NULL, NULL, 2),
(5, 'Thai Food', NULL, NULL, 1),
(7, 'French Fries', '2018-04-04 11:05:40', '2018-04-04 11:05:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `about` text COLLATE utf8_unicode_ci,
  `religion` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activity_pt` int(11) NOT NULL DEFAULT '20',
  `activity_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `location`, `remember_token`, `created_at`, `updated_at`, `about`, `religion`, `gender`, `image`, `activity_pt`, `activity_date`) VALUES
(1, 'Samiul Alim Pratik', 'pratik.anwar@gmail.com', '$2y$10$4HFUN0hWbvjiDIqCZKq3q.XHVk/nHQldPsuPgWdmO8ekmBzrfOSZe', '01689583182', 'Uttara', 'wrQ9JvfbFcRohpqDUhmu5VM7xZCdJ5gWTN8ocM9LnItq5mTPnZBvUQGZMa5z', '2018-03-26 03:21:23', '2018-04-16 04:12:43', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.', 'Buddha', 'Male', '1522264476.jpg', 360, '2018/04/16'),
(2, 'Fazley Rabbey Affan', 'affan@example.com', '$2y$10$TB295aIufdNZruN1qZqobO20xHOLjGis6n.fdfMcQMxS8DHaebJTm', '01797541430', 'Dhanmondi', '4q8rzEkdfwDEGYDJ7hRPcKPZS5NVx2fiXFR7AAit0kwPGUXRCR900tsgWynu', '2018-03-28 13:17:33', '2018-04-16 01:40:40', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\'', NULL, NULL, '1522265024.jpg', 50, '2018/04/16'),
(5, 'Ratul Hasan', 'ratul.hasan@example.com', '$2y$10$xqcivLuGKHH8YpUGkwOJ7OecN51zZmZHCjzhvddNZDM6QB/WbEsky', '01556322887', 'Rampura', 'Ht08ezU6EWK2Gxi3ElDcgyutbDflytFI8rCk2pNyZfluSBwlxNJObUg8agPI', '2018-03-28 13:41:43', '2018-04-04 15:54:58', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\'', 'Muslim', 'Male', '1522266158.jpg', 20, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_providers`
--
ALTER TABLE `social_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `social_providers`
--
ALTER TABLE `social_providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
