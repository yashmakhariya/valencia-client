-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 02, 2022 at 01:26 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `valencia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(10001, 'Administrator', 'labhansh25@outlook.in', NULL, '$2y$10$be.jtKp6pK5yZxG3X.Ddz.IEtTyKlIxFr1ywi1cTKE1myXwPbVKZC', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum_purchase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meta_data`
--

CREATE TABLE `meta_data` (
  `data` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meta_data`
--

INSERT INTO `meta_data` (`data`, `value`, `created_at`, `updated_at`) VALUES
('gst', NULL, NULL, NULL),
('shipping', NULL, NULL, NULL),
('carousel_img_1', NULL, NULL, NULL),
('carousel_img_2', NULL, NULL, NULL),
('carousel_img_3', NULL, NULL, NULL),
('carousel_img_4', NULL, NULL, NULL),
('carousel_img_5', NULL, NULL, NULL),
('parent_category', 'a:4:{i:0;s:3:\"Men\";i:1;s:5:\"Women\";i:2;s:3:\"Boy\";i:3;s:4:\"Girl\";}', NULL, '2022-01-02 03:35:20'),
('sub_category', 'a:4:{i:0;s:7:\"T-Shirt\";i:1;s:5:\"Shirt\";i:2;s:5:\"Jeans\";i:3;s:6:\"Jacket\";}', NULL, '2022-01-02 03:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2021_10_26_160836_create_admins_table', 1),
(6, '2021_10_26_161622_create_products_table', 1),
(7, '2021_10_26_161809_create_orders_table', 1),
(8, '2021_12_22_044319_create_reviews_table', 1),
(9, '2021_12_22_045653_create_coupons_table', 1),
(10, '2021_12_23_090101_create_meta_data_table', 1),
(11, '2021_12_27_174928_create_blogs_table', 1),
(12, '2021_12_28_180943_create_news_letter_emails_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_letter_emails`
--

CREATE TABLE `news_letter_emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_alternate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_note` text COLLATE utf8mb4_unicode_ci,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shiprocket_order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shiprocket_shipment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image_6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_parent_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sub_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_attributes` text COLLATE utf8mb4_unicode_ci,
  `product_variant` text COLLATE utf8mb4_unicode_ci,
  `product_size` text COLLATE utf8mb4_unicode_ci,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price_discounted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_offer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_group_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `token_number`, `product_name`, `product_image_thumbnail`, `product_image_1`, `product_image_2`, `product_image_3`, `product_image_4`, `product_image_5`, `product_image_6`, `product_description`, `product_parent_category`, `product_sub_category`, `product_attributes`, `product_variant`, `product_size`, `product_price`, `product_price_discounted`, `product_offer_type`, `product_group_type`, `created_at`, `updated_at`) VALUES
(10001, '999117', 'Hopscotch Boys Tees', 'images/products/product-999117-thumbnail.jpg', 'images/products/product-999117-1.jpg', NULL, NULL, NULL, NULL, NULL, 'Product details\r\nPackage Dimensions ‏ : ‎ 19.99 x 17.98 x 4.98 cm; 349.27 Grams\r\nDate First Available ‏ : ‎ 15 October 2020\r\nASIN ‏ : ‎ B08371K1KV\r\nItem part number ‏ : ‎ MY-2390258\r\nDepartment ‏ : ‎ Boys\r\nItem Weight ‏ : ‎ 349 g\r\nBest Sellers Rank: #22,448 in Clothing & Accessories (See Top 100 in Clothing & Accessories)\r\n#275 in Boys\' T-Shirts\r\nCustomer Reviews:', 'Boy', 'T-Shirt', 'a:3:{i:0;a:1:{i:0;s:18:\"Fit Type: Slim Fit\";}i:1;a:1:{i:0;s:30:\"Fabric: Cotton; Style: Regular\";}i:2;a:1:{i:0;s:20:\"Neck Style: Collared\";}}', NULL, 'a:3:{i:0;a:1:{i:0;s:5:\"Small\";}i:1;a:1:{i:0;s:6:\"Medium\";}i:2;a:1:{i:0;s:5:\"Large\";}}', '599', '499', 'Sale', 'Best Seller', '2022-01-02 03:39:42', '2022-01-02 03:39:42'),
(10002, '438630', 'JUGULAR Boy\'s Dot Striped Full Sleeve Cotton Printed T-Shirt', 'images/products/product-438630-thumbnail.jpg', 'images/products/product-438630-1.jpg', NULL, NULL, NULL, NULL, NULL, 'Product details\r\nPackage Dimensions ‏ : ‎ 24.4 x 22 x 1.9 cm; 170 Grams\r\nDate First Available ‏ : ‎ 20 April 2021\r\nASIN ‏ : ‎ B0936MBBFV\r\nItem part number ‏ : ‎ 1JGRF-BOYS-DOT\r\nDepartment ‏ : ‎ Boys\r\nItem Weight ‏ : ‎ 170 g\r\nNet Quantity ‏ : ‎ 1.00 count\r\nBest Sellers Rank: #930 in Clothing & Accessories (See Top 100 in Clothing & Accessories)\r\n#16 in Boys\' T-Shirts\r\nCustomer Reviews:', 'Boy', 'T-Shirt', 'a:3:{i:0;a:1:{i:0;s:50:\"Care Instructions: Hand-wash And Machine Wash Cold\";}i:1;a:1:{i:0;s:21:\"Fit Type: Regular Fit\";}i:2;a:1:{i:0;s:21:\"Fit Type: Regular Fit\";}}', NULL, 'a:3:{i:0;a:1:{i:0;s:5:\"Small\";}i:1;a:1:{i:0;s:6:\"Medium\";}i:2;a:1:{i:0;s:5:\"Large\";}}', '499', '399', 'Sale', 'Best Seller', '2022-01-02 03:44:55', '2022-01-02 03:44:55'),
(10003, '966721', 'Hopscotch Boys Cotton Stripes Half Sleeves T-Shirt in Coral Color for Ages 8-10 Years (HSP-3702045/Z)', 'images/products/product-966721-thumbnail.jpg', 'images/products/product-966721-1.jpg', NULL, NULL, NULL, NULL, NULL, 'Package Dimensions ‏ : ‎ 19.99 x 17.98 x 4.98 cm; 349.27 Grams\r\nDate First Available ‏ : ‎ 7 August 2021\r\nManufacturer ‏ : ‎ Hopscotch\r\nASIN ‏ : ‎ B09C3R1LLY\r\nItem part number ‏ : ‎ HSP-3702045\r\nCountry of Origin ‏ : ‎ India\r\nDepartment ‏ : ‎ Boys\r\nManufacturer ‏ : ‎ Hopscotch\r\nImporter ‏ : ‎ Hopscotch\r\nItem Weight ‏ : ‎ 349 g\r\nBest Sellers Rank: #54,090 in Clothing & Accessories (See Top 100 in Clothing & Accessories)\r\n#677 in Boys\' T-Shirts\r\nCustomer Reviews:', 'Boy', 'T-Shirt', 'a:3:{i:0;a:1:{i:0;s:30:\"Care Instructions: Gentle Wash\";}i:1;a:1:{i:0;s:21:\"Fit Type: Regular Fit\";}i:2;a:1:{i:0;s:76:\"This Coral Stripes Half Sleeves T-Shirt the best choice for your little one!\";}}', NULL, 'a:3:{i:0;a:1:{i:0;s:5:\"Small\";}i:1;a:1:{i:0;s:6:\"Medium\";}i:2;a:1:{i:0;s:5:\"Large\";}}', '449', '349', 'Sale', 'Best Seller', '2022-01-02 03:49:59', '2022-01-02 03:49:59'),
(10004, '754847', 'Max Girl\'s Regular T-Shirt', 'images/products/product-754847-thumbnail.jpg', 'images/products/product-754847-1.jpg', NULL, NULL, NULL, NULL, NULL, 'Product Dimensions ‏ : ‎ 16 x 12 x 5 cm; 250 Grams\r\nDate First Available ‏ : ‎ 31 March 2021\r\nManufacturer ‏ : ‎ Lifestyle Int Pvt Ltd\r\nASIN ‏ : ‎ B091GRQKVX\r\nItem model number ‏ : ‎ M21CBT24IVORY\r\nDepartment ‏ : ‎ Girls\r\nManufacturer ‏ : ‎ Lifestyle Int Pvt Ltd, Lifestyle Int Pvt Ltd, 77 Degree Town Centre, Building No. 3, West Wing, Off HAL Airport Road, Yamlur, Bangalore-560093\r\nPacker ‏ : ‎ Lifestyle Int Pvt Ltd, 77 Degree Town Centre, Building No. 3, West Wing, Off HAL Airport Road, Yamlur, Bangalore-560093\r\nItem Weight ‏ : ‎ 250 g\r\nItem Dimensions LxWxH ‏ : ‎ 16 x 12 x 5 Centimeters\r\nGeneric Name ‏ : ‎ T-Shirt\r\nBest Sellers Rank: #83,558 in Clothing & Accessories (See Top 100 in Clothing & Accessories)\r\n#555 in Girls\' T-Shirts\r\nCustomer Reviews', 'Girl', 'T-Shirt', 'a:3:{i:0;a:1:{i:0;s:31:\"Care Instructions: Machine Wash\";}i:1;a:1:{i:0;s:17:\"Fit Type: Regular\";}i:2;a:1:{i:0;s:36:\"MAX Typographic Print Sleeveless Top\";}}', NULL, 'a:3:{i:0;a:1:{i:0;s:5:\"Small\";}i:1;a:1:{i:0;s:6:\"Medium\";}i:2;a:1:{i:0;s:5:\"Large\";}}', '349', '249', 'Sale', 'Best Seller', '2022-01-02 04:30:35', '2022-01-02 04:30:35'),
(10005, '712493', 'Naughty Ninos Girl\'s Trench Regular fit Jacket', 'images/products/product-712493-thumbnail.jpg', 'images/products/product-712493-1.jpg', NULL, NULL, NULL, NULL, NULL, 'Product Dimensions ‏ : ‎ 30 x 25 x 2 cm; 350 Grams\r\nDate First Available ‏ : ‎ 23 October 2017\r\nManufacturer ‏ : ‎ Naughty Ninos\r\nASIN ‏ : ‎ B07WLRK8ZB\r\nItem model number ‏ : ‎ NNW0078TST\r\nCountry of Origin ‏ : ‎ India\r\nDepartment ‏ : ‎ Girls\r\nManufacturer ‏ : ‎ Naughty Ninos, Naughty Ninos Pvt Ltd, 138A Udyog Vihar Phase 6, Sector 37, Gurugram, Haryana 122004 Phone: 97170 99864\r\nPacker ‏ : ‎ Naughty Ninos Pvt Ltd, 138A Udyog Vihar Phase 6, Sector 37, Gurugram, Haryana 122004 Phone: 97170 99864\r\nItem Weight ‏ : ‎ 350 g\r\nItem Dimensions LxWxH ‏ : ‎ 30 x 25 x 2 Centimeters\r\nNet Quantity ‏ : ‎ 1 number\r\nIncluded Components ‏ : ‎ 1 Children garment\r\nGeneric Name ‏ : ‎ Jacket\r\nBest Sellers Rank: #2,163 in Clothing & Accessories (See Top 100 in Clothing & Accessories)\r\n#3 in Girls\' Jackets\r\nCustomer Reviews: 4.1 out of 5 stars', 'Girl', 'Jacket', 'a:3:{i:0;a:1:{i:0;s:31:\"Care Instructions: Machine Wash\";}i:1;a:1:{i:0;s:21:\"Fit Type: regular fit\";}i:2;a:1:{i:0;s:16:\"Color Name: Pink\";}}', NULL, 'a:3:{i:0;a:1:{i:0;s:5:\"Small\";}i:1;a:1:{i:0;s:6:\"Medium\";}i:2;a:1:{i:0;s:5:\"Large\";}}', '899', '799', 'Sale', 'Best Seller', '2022-01-02 04:34:11', '2022-01-02 04:34:11'),
(10006, '605687', 'TrapNation Men Solid Puffer Jacket Jerkin', 'images/products/product-605687-thumbnail.jpg', 'images/products/product-605687-1.jpg', NULL, NULL, NULL, NULL, NULL, 'Date First Available ‏ : ‎ 10 September 2021\r\nASIN ‏ : ‎ B09G3K3RMD\r\nItem part number ‏ : ‎ NYLO\r\nDepartment ‏ : ‎ Men\r\nPacker ‏ : ‎ Blue Store,X-545,Jai Mata Di Gali,RaghubarPura No-1,Gandhi Nagar Delhi 110031,M-9718450031\r\nNet Quantity ‏ : ‎ 1.00 count\r\nBest Sellers Rank: #73 in Clothing & Accessories (See Top 100 in Clothing & Accessories)\r\n#5 in Men\'s Jackets\r\nCustomer Reviews', 'Men', 'Jacket', 'a:3:{i:0;a:1:{i:0;s:33:\"Care Instructions: Dry Clean Only\";}i:1;a:1:{i:0;s:21:\"Fit Type: regular fit\";}i:2;a:1:{i:0;s:21:\"Fit Type: Regular Fit\";}}', NULL, 'a:3:{i:0;a:1:{i:0;s:5:\"Small\";}i:1;a:1:{i:0;s:6:\"Medium\";}i:2;a:1:{i:0;s:5:\"Large\";}}', '1999', '1599', 'Sale', 'Best Seller', '2022-01-02 04:39:21', '2022-01-02 04:39:21'),
(10007, '621002', 'IndoPrimo Men\'s Regular Fit Casual Shirt', 'images/products/product-621002-thumbnail.jpg', 'images/products/product-621002-1.jpg', NULL, NULL, NULL, NULL, NULL, 'Is Discontinued By Manufacturer ‏ : ‎ No\r\nPackage Dimensions ‏ : ‎ 27.18 x 21.84 x 2.79 cm; 280 Grams\r\nDate First Available ‏ : ‎ 31 August 2018\r\nManufacturer ‏ : ‎ IndoPrimo\r\nASIN ‏ : ‎ B07VT5JB7X\r\nItem part number ‏ : ‎ Men\'s Casual Chinese Collar Shirt 1\r\nDepartment ‏ : ‎ Men\r\nManufacturer ‏ : ‎ IndoPrimo\r\nItem Weight ‏ : ‎ 280 g\r\nCustomer Reviews', 'Men', 'Shirt', 'a:3:{i:0;a:1:{i:0;s:21:\"Fit Type: Regular Fit\";}i:1;a:1:{i:0;s:30:\"Fabric: Cotton; Style: Regular\";}i:2;a:1:{i:0;s:20:\"Neck Style: Collared\";}}', NULL, 'a:3:{i:0;a:1:{i:0;s:5:\"Small\";}i:1;a:1:{i:0;s:6:\"Medium\";}i:2;a:1:{i:0;s:5:\"Large\";}}', '999', '899', 'Sale', 'Best Seller', '2022-01-02 04:43:13', '2022-01-02 04:43:13'),
(10008, '410743', 'Spykar Men\'s Casual Regular Fit Jeans', 'images/products/product-410743-thumbnail.jpg', 'images/products/product-410743-1.jpg', NULL, NULL, NULL, NULL, NULL, 'Product Dimensions ‏ : ‎ 50 x 30 x 100 cm; 400 Grams\r\nDate First Available ‏ : ‎ 17 August 2020\r\nManufacturer ‏ : ‎ INDACOJEANSPVT.LTD.\r\nASIN ‏ : ‎ B08G18CGMV\r\nItem model number ‏ : ‎ MGYM-02AI-103\r\nDepartment ‏ : ‎ Men\r\nManufacturer ‏ : ‎ INDACOJEANSPVT.LTD., INDACOJEANSPVT.LTD.G-21,MIDC-IndustrialArea,Tarapur\r\nPacker ‏ : ‎ Spykar Lifestyles PVT LTD Lotus Corporate Park, 19th Floor, A wing, Ram Mandir Lane, Jai Coach Junction, Off Western Express Highway, Goregaon (East), Mumbai-400 063. TEL: 02242101992, 02242175300\r\nItem Weight ‏ : ‎ 400 g\r\nItem Dimensions LxWxH ‏ : ‎ 50 x 30 x 100 Centimeters\r\nGeneric Name ‏ : ‎ Jeans\r\nCustomer Reviews:', 'Men', 'Jeans', 'a:3:{i:0;a:1:{i:0;s:31:\"Care Instructions: Machine Wash\";}i:1;a:1:{i:0;s:21:\"Fit Type: Regular Fit\";}i:2;a:1:{i:0;s:19:\"Color name: DK.BLUE\";}}', NULL, 'a:3:{i:0;a:1:{i:0;s:5:\"Small\";}i:1;a:1:{i:0;s:6:\"Medium\";}i:2;a:1:{i:0;s:5:\"Large\";}}', '1000', '900', 'Sale', 'Best Seller', '2022-01-02 04:50:23', '2022-01-02 04:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ratings` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci,
  `wishlist` text COLLATE utf8mb4_unicode_ci,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `meta_data`
--
ALTER TABLE `meta_data`
  ADD UNIQUE KEY `meta_data_data_unique` (`data`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_letter_emails`
--
ALTER TABLE `news_letter_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news_letter_emails`
--
ALTER TABLE `news_letter_emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10009;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
