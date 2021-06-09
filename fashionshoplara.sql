-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 12:28 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashionshoplara`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Korean Style', NULL, NULL),
(2, 'New Arrival', NULL, NULL),
(3, 'Lip Makeup', NULL, NULL),
(4, 'Pallete', NULL, NULL),
(5, 'Toner', NULL, NULL),
(7, 'Body Care', '2020-12-08 23:45:20', '2020-12-08 23:49:22'),
(9, 'Make-up', '2020-12-08 23:45:20', '2021-01-05 06:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `idKota` int(11) NOT NULL,
  `namaKota` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`idKota`, `namaKota`) VALUES
(1, 'Surabaya'),
(2, 'Sidoarjo');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_03_162700_create_books_table', 1),
(5, '2020_12_03_162804_create_categories_table', 1),
(6, '2020_12_03_163405_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_belanja` double(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_belanja`, `created_at`, `updated_at`) VALUES
(11, 10, 140000.00, '2021-06-08 23:46:41', '2021-06-08 23:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idKategori` bigint(20) UNSIGNED NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `deskripsi`, `gambar`, `price`, `created_at`, `updated_at`, `idKategori`, `stok`) VALUES
(1, 'Zalia Textured Drape Wrap Topt', 'Solid tone embroidered crossover front top', '7.jpeg', 200000.00, '2020-12-08 05:20:02', '2020-12-08 23:27:58', 1, 36),
(2, 'Zefanya Top', 'lorem ipsum', '2.jpeg', 125000.00, '2020-12-08 05:20:02', '2020-12-08 05:20:02', 1, 40),
(3, 'Sheilla Crop', 'lorem ipsum', '3.jpeg', 300000.00, '2020-12-08 05:20:02', '2020-12-08 05:20:02', 1, 40),
(4, 'Velia Outfit', 'Full Cotton', '4.jpeg', 170000.00, '2020-12-08 05:20:02', '2020-12-08 05:20:02', 2, 38),
(5, 'Selena Dress', 'lorem ipsum', '5.jpeg', 250000.00, '2020-12-08 05:20:02', '2020-12-08 05:20:02', 9, 103),
(6, 'Vony Crop Top', 'lorem ipsum', '6.jpeg', 120000.00, '2020-12-08 05:20:02', '2020-12-08 05:20:02', 2, 43),
(40, 'Serena Dress', 'Full Cotton', '8.jpeg', 470000.00, '2020-12-08 05:20:02', '2020-12-08 05:20:02', 1, 39),
(41, 'Sakura Flowery Dress', 'lorem ipsum', '9.jpeg', 268000.00, '2020-12-08 05:20:02', '2020-12-08 05:20:02', 9, 103),
(42, 'White Korean Dress', 'lorem ipsum', '10.jpeg', 200000.00, '2020-12-08 05:20:02', '2020-12-08 05:20:02', 1, 43);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `harga_satuan` double(10,2) NOT NULL,
  `subtotal` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`book_id`, `order_id`, `quantity`, `harga_satuan`, `subtotal`) VALUES
(1, 3, 1, 68000.00, 68000.00),
(1, 5, 1, 68000.00, 68000.00),
(1, 6, 3, 68000.00, 204000.00),
(1, 8, 1, 68000.00, 68000.00),
(2, 3, 1, 114000.00, 114000.00),
(2, 5, 1, 114000.00, 114000.00),
(2, 7, 1, 114000.00, 114000.00),
(2, 9, 2, 25000.00, 50000.00),
(2, 11, 1, 25000.00, 25000.00),
(3, 1, 2, 98000.00, 196000.00),
(3, 7, 1, 98000.00, 98000.00),
(3, 9, 1, 98000.00, 98000.00),
(3, 11, 1, 98000.00, 98000.00),
(4, 1, 1, 178000.00, 178000.00),
(4, 7, 1, 178000.00, 178000.00),
(4, 8, 2, 178000.00, 356000.00),
(4, 9, 1, 17000.00, 17000.00),
(4, 11, 1, 17000.00, 17000.00),
(5, 2, 1, 68000.00, 68000.00),
(6, 2, 1, 120000.00, 120000.00),
(7, 3, 1, 156000.00, 156000.00),
(34, 10, 3, 89000.00, 267000.00),
(36, 10, 1, 105000.00, 105000.00);

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `isi_saran` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id`, `name`, `email`, `notelp`, `isi_saran`) VALUES
(1, 'Elisa', 'admin@gmail.com', '08598786572', 'Sering sering beri bonus ya!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `city`, `password`, `role`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'office', '$2y$10$c./U3QF1ynCekRO8f8kNzu96PSjL3qSklbqamKnRsD3M0/83ZVa82', 'admin', NULL, '1PYsn9AvIyr5eMHcUE2oD6gk3dwDyziMez7ueKhhguSk7F8NM2zN0LgyAGog', '2020-12-08 05:34:37', '2020-12-08 05:34:37'),
(2, 'Elisa', 'elisa@gmail.com', 'office', '$2y$10$aMzUJgOqK4SxLxzEc8w06eR7wzLCHMPXp67BXMu9rG5vQJvqsYSsS', 'karyawan', NULL, NULL, '2020-12-08 05:35:33', '2020-12-08 05:35:33'),
(10, 'Sonia', 'sonia@gmail.com', 'Surabaya', '$2y$10$iVFQa0zVJVQtuufui.9a8.AWkAtEg8A9tsRtCkdcTvwWydRwtFNeC', 'member', NULL, NULL, '2021-06-08 23:46:09', '2021-06-08 23:46:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`idKota`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_idkategori_foreign` (`idKategori`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`book_id`,`order_id`),
  ADD KEY `book_order_order_id_foreign` (`order_id`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `idKota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `books_idkategori_foreign` FOREIGN KEY (`idKategori`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `book_order_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `book_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
