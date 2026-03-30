-- phpMyAdmin SQL Dump
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2026 at 12:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omkar_book_store`
--
CREATE DATABASE IF NOT EXISTS `omkar_book_store` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `omkar_book_store`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Adventure Books', 'adventure', 'Explore thrilling adventures, daring heroes, and epic journeys.', NOW(), NOW()),
(2, 'Horror Books', 'horror', 'Spine-chilling tales to keep you up at night.', NOW(), NOW()),
(3, 'Comedy Books', 'comedy', 'Laugh out loud with these hilarious reads!', NOW(), NOW()),
(4, 'Kids Books', 'kids', 'Fun, colorful, and educational books for young readers.', NOW(), NOW());

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `title`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
-- Adventure
(1, 1, 'Heart of Darkness', 'Explore the African Congo’s depths in this classic adventure by Joseph Conrad.', 350.00, 'adv-1.jfif', NOW(), NOW()),
(2, 1, 'The Hobbit', 'J.R.R. Tolkien’s timeless fantasy about Bilbo’s unexpected journey is a must-read.', 450.00, 'adv-1.jpg', NOW(), NOW()),
(3, 1, 'Treasure Island', 'A classic tale of pirates, treasure maps, and high-seas adventure by Robert Louis Stevenson.', 300.00, 'adv-2.webp', NOW(), NOW()),
(4, 1, 'The Call of the Wild', 'Jack London’s story of survival and adventure in the Yukon wilderness.', 280.00, 'adv-3.jpg', NOW(), NOW()),
(5, 1, 'Into the Wild', 'The true story of Christopher McCandless’s journey into the Alaskan wilderness.', 320.00, 'adv-4.jpg', NOW(), NOW()),
(6, 1, 'Life of Pi', 'An inspiring story of survival and adventure at sea by Yann Martel.', 400.00, 'adv-2.jfif', NOW(), NOW()),
-- Comedy
(7, 3, 'The Hitchhiker\'s Guide to the Galaxy', 'Douglas Adams’ absurd intergalactic comedy adventure.', 390.00, 'comedy-2.jpg', NOW(), NOW()),
(8, 3, 'Bossypants', 'Tina Fey\'s witty memoir full of personal and professional laughs.', 350.00, 'comedy-3.jpg', NOW(), NOW()),
(9, 3, 'Good Omens', 'A hilarious tale of the apocalypse by Neil Gaiman and Terry Pratchett.', 420.00, 'comedy-4.jpg', NOW(), NOW()),
-- Horror
(10, 2, 'Dracula', 'The original vampire novel by Bram Stoker that started it all.', 300.00, 'horror-1.png', NOW(), NOW()),
(11, 2, 'The Shining', 'Stephen King\'s terrifying tale of isolation and madness in a haunted hotel.', 480.00, 'horror-2.png', NOW(), NOW()),
(12, 2, 'Frankenstein', 'Mary Shelley\'s gothic novel about science gone too far.', 320.00, 'horror-3.png', NOW(), NOW()),
-- Kids
(13, 4, 'Charlotte\'s Web', 'A heartwarming tale of friendship between a pig and a spider.', 250.00, 'kide-2.png', NOW(), NOW()),
(14, 4, 'Diary of a Wimpy Kid', 'Laugh along with Greg Heffley in this best-selling illustrated series.', 300.00, 'kide-3.png', NOW(), NOW()),
(15, 4, 'The Cat in the Hat', 'Dr. Seuss\'s classic book that makes reading fun for kids.', 220.00, 'kide-4.png', NOW(), NOW());

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_book_id_foreign` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
