-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2017 at 06:21 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chien`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('AdminManager', '1', 1501641002),
('ManagerProduct', '2', 1501641002);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('AdminManager', 1, 'Quyền cao nhất', NULL, NULL, 1501639454, 1501639454),
('create-product', 2, 'Tạo sản phẩm', NULL, NULL, 1501869217, 1501869217),
('index-product', 2, 'Xem danh sách sản phẩm', NULL, NULL, 1501867881, 1501867881),
('ManagerCategory', 1, 'Gán nhóm quyền cho Category\r\n', NULL, NULL, 1501818304, 1501818304),
('ManagerProduct', 1, 'Gán nhóm quyền cho sản phẩm', NULL, NULL, 1501639454, 1501639454),
('update-category', 2, 'Sửa Danh mục', NULL, NULL, 1502073751, 1502073751);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('AdminManager', 'create-product'),
('AdminManager', 'index-product'),
('AdminManager', 'ManagerCategory'),
('AdminManager', 'ManagerProduct'),
('AdminManager', 'update-category'),
('ManagerCategory', 'AdminManager'),
('ManagerCategory', 'ManagerCategory'),
('ManagerCategory', 'ManagerProduct');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `icon`, `group_id`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Clothing', '<i class=\"icon fa fa-shopping-bag\" aria-hidden=\"true\"></i>', 1, 0, 1, 1501775478, 1501948188),
(2, 'Electronics ', '<i class=\"icon fa fa-laptop\" aria-hidden=\"true\"></i>', 1, 0, 1, 133222, 1501948199),
(3, 'HEALTH & BEAUTYNEW', '', 1, 0, 1, 111111, 1501948240),
(4, 'WATCHES', '<i class=\"icon fa fa-clock-o\"></i>', 1, 0, 1, 11111, 1501948250),
(5, 'Men', '', 1, 1, 1, 11111, 1501988942),
(6, 'Women', NULL, 1, 1, 1, 1111111, 1111111),
(7, 'Boys', NULL, 1, 1, 1, 111111, 1111111),
(8, 'Girls', NULL, 1, 1, 1, 11111111, 1111111),
(9, 'Dresses', NULL, 1, 5, 1, 1111111, 111111),
(10, 'Shoes', NULL, 1, 5, 1, 22222, 22222),
(11, 'Jackets', NULL, 1, 5, 1, 222222, 111111),
(12, 'Sunglasses', NULL, 1, 5, 1, 16161616, 16161616),
(13, 'Sport Wear', NULL, 1, 5, 1, 222222, 112222),
(14, 'Blazers', NULL, 1, 5, 1, 1313111, 11111),
(15, 'Shirts', '', 1, 5, 1, 11111, 11111),
(16, 'Handbags', NULL, 1, 6, 1, 1313131, 1111111),
(17, 'Jwellery', NULL, 1, 6, 1, 22222, 222222),
(18, 'Swimwear', '', 1, 6, 1, 322222, 1501948403),
(19, 'Tops', NULL, 1, 6, 1, 11111, 111),
(20, 'Flats', NULL, 1, 6, 1, 1, 1),
(21, 'Shoes-girl', '', 1, 6, 1, 1, 1501989056),
(22, 'Winter Wear', NULL, 1, 6, 1, 1111, 11111),
(23, 'Toys & Games', NULL, 1, 7, 1, 111111, 111111),
(24, 'Jeans', NULL, 1, 7, 1, 11111, 11111),
(25, 'Shirts-child', NULL, 1, 7, 1, 222222, 11111),
(26, 'Shoes-child', NULL, 1, 7, 1, 11111, 1111),
(27, 'School Bags', NULL, 1, 7, 1, 1111111, 1111111),
(28, 'Lunch Box', NULL, 1, 7, 1, 11111, 1111),
(29, 'Footwear', NULL, 1, 7, 1, 1111, 1111),
(30, 'Sandals', NULL, 1, 8, 1, 1111, 1111),
(31, 'Shorts', NULL, 1, 8, 1, 111111, 1111111),
(32, 'Dresses-child', NULL, 1, 8, 1, 11111, 111),
(33, 'Jwellery-child', NULL, 1, 8, 1, 22222, 222222),
(34, 'Bags', NULL, 1, 8, 1, 1111, 11111),
(35, 'Night Dress', NULL, 1, 8, 1, 1, 1),
(36, 'Swim Wear', NULL, 1, 8, 1, 11111, 1111);

-- --------------------------------------------------------

--
-- Table structure for table `colorprodut`
--

CREATE TABLE `colorprodut` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colorprodut`
--

INSERT INTO `colorprodut` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Xanh', 1, 11111, 111111),
(2, 'Do', 1, 11111, 111111),
(3, 'Tim', 1, 11111, 111111),
(4, 'Vang', 1, 11111, 111111),
(6, 'blue', 1, 1111, 11111);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `full_name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Chien hoang 1', 'WiAlifKc6FfMl4ElGpsApwShD8VxoAuY', '$2y$13$BPiRvhZ10dNOq7EIs9rZReTo4BV38nXpPisEPJR/Gj9TOryJCaB3C', NULL, 'admin@gmail.com', 13131313, 'ha noi', 10, 1501473065, 1502274081),
(2, 'chien', 'chidn-abn', 'ZwlnEtwcT6vdZPWjGQP1OnN0hp-spR40', '$2y$13$AnSv2Iy.CO7OC1sTCmqUr.Aw4IhclbVUofjws1ZjIFZp/SHQiqHgu', NULL, 'chien@gmail.com', 161616161, 'ha noi', 10, 1501472934, 1501472934),
(3, 'demo', 'chien-qqq', 'ntBAC0IF0V7jWA7LiBqbMguRIL5qSAeb', '$2y$13$wj0iyveujT2xH.AFRiiR/ucU.XIHyQ8rroaGcJM5Fes4pms8CiTQW', NULL, 'demo@gmail.com', 912231231, 'ha noi', 10, 1500965043, 1500965043),
(4, 'hoang', 'chien qqq', 'm-JTdWiLuUG2IKSKNPUch0I2qmC1WAYm', '$2y$13$6G.yd3Vgk.5UofKWSsatHeCkaXhRNASJD1SktqLN96CaKTCuvWj1K', NULL, 'hoang@gmail.com', 131164646, 'ha noi', 10, 1501473031, 1501473031),
(5, 'admin123', 'Chien hoang', '4k8T1ZxrmYMjoHVRn74c1j2a64LmkeBC', '$2y$13$mAQpvs7OEjvpfJhVWGU4tuXdZQmp6RGKKHKe.pn45ZZxRVbA9/w96', NULL, 'admin123@gmail.com', 0, '', 10, 1501827176, 1502091593),
(6, 'demothoi', 'demothoivavavvavavavaavaa', 'z8guVQfDgWVadmA7bEbybBES_DTfgnJG', '$2y$13$yXInUFjgiqssEBa4jDDlMukXEENNnD2UzkmMACH5.Vy6gu7GH4XzW', NULL, 'demothoi@gmail.com', 123456789, 'ccacacacvvdvdvddvdvdvdvdvd', 10, 1502289207, 1502289577);

-- --------------------------------------------------------

--
-- Table structure for table `deliver`
--

CREATE TABLE `deliver` (
  `deliver_id` int(11) NOT NULL,
  `deliver_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `deliver`
--

INSERT INTO `deliver` (`deliver_id`, `deliver_name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'chuyen phat', 1, 1478150798, 1478150798),
(3, 'Shiper', 1, 1478150826, 1478150826);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sản Phẩm', 1, 1499466899, 1501988408),
(2, 'demo', 1, 1503762852, 1503762852),
(3, 'demo2', 1, 1503763272, 1503763272);

-- --------------------------------------------------------

--
-- Table structure for table `imageproduct`
--

CREATE TABLE `imageproduct` (
  `images_id` int(11) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `imageproduct`
--

INSERT INTO `imageproduct` (`images_id`, `pro_id`, `images`, `name`, `status`, `created_at`, `updated_at`) VALUES
(13, 28, 'http://localhost:88/chien/uploads/images/p27.jpg', NULL, 1, 1500663802, 1500663802),
(15, 5, 'http://localhost:88/chien/uploads/images/41nuv7ElojL._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', NULL, 1, 1500938314, 1500938314),
(100, 4, 'http://localhost:88/chien/uploads/images/41nB3QXaXuL._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', NULL, 1, 1502423139, 1502423139),
(101, 4, 'http://localhost:88/chien/uploads/images/41nB3QXaXuL._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', NULL, 1, 1502423139, 1502423139);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1500930502),
('m140506_102106_rbac_init', 1501557981);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addess` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_ship` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_ship` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_ship` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addess_ship` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `request` text COLLATE utf8_unicode_ci,
  `total` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `deliver_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `username`, `email`, `mobile`, `addess`, `user_ship`, `email_ship`, `mobile_ship`, `addess_ship`, `request`, `total`, `payment_id`, `deliver_id`, `status`, `created_at`) VALUES
(84, 1, 'admin', 'admin@gmail.com', '13131313', 'ha noi', 'admin', 'admin@gmail.com', '13131313', 'ha noi', '', 47, 1, 3, 0, 1502267797),
(85, 1, 'admin', 'admin@gmail.com', '13131313', 'ha noi', 'admin123', 'admin@gmail.com', '13131313', 'ha noi', '', 8, 2, 2, 2, 1502267972),
(86, 1, 'admin', 'admin@gmail.com', '13131313', 'ha noi', 'adminffafafaafa', 'adfafafafafmin@gmail.com', '1313221313', 'ha noifafaf', '', 8, 1, 2, 0, 1502268034),
(87, 1, 'admin', 'admin@gmail.com', '13131313', 'ha noi', 'chien111111', 'admin11111@gmail.com', '131313132', 'ha noi', '', 62, 1, 2, 3, 1502269002),
(88, 1, 'admin', 'admin@gmail.com', '13131313', 'ha noi', 'admin', 'hoangchien2712tv@gmail.com', '13131313', 'ha noi', '', 15, 1, 2, 0, 1502424184),
(89, 1, 'admin', 'admin@gmail.com', '13131313', 'ha noi', 'admin', 'hoangchien2712tv@gmail.com', '13131313', 'ha noi', '', 15, 1, 2, 0, 1502424333),
(90, 1, 'admin', 'admin@gmail.com', '13131313', 'ha noi', 'admin', 'hoangchien2712tv@gmail.com', '13131313', 'ha noi', '', 15, 1, 2, 0, 1502424340),
(91, 1, 'admin', 'admin@gmail.com', '13131313', 'ha noi', 'admin', 'hoangchien2712tv@gmail.com', '13131313', 'ha noi', '', 15, 1, 2, 0, 1502424343),
(92, 1, 'admin', 'admin@gmail.com', '13131313', 'ha noi', 'admin', 'hoangchien2712tv@gmail.com', '13131313', 'ha noi', '', 15, 1, 2, 0, 1502424406),
(93, 1, 'admin', 'admin@gmail.com', '13131313', 'ha noi', 'admin', 'hoangchien2712tv@gmail.com', '13131313', 'ha noi', '', 15, 1, 2, 0, 1502424915),
(94, 1, 'admin', 'admin@gmail.com', '13131313', 'ha noi', 'admin', 'hoangchien2712tv@gmail.com', '13131313', 'ha noi', '', 15, 1, 2, 0, 1502425388);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `size`, `color`, `price`, `quantity`, `status`, `created_at`) VALUES
(27, 84, 4, 'XL', 'Xanh', 15, 1, 0, 1502267797),
(28, 84, 4, 'XL', 'Do', 15, 1, 0, 1502267797),
(29, 84, 4, 'XL', 'Tim', 15, 1, 0, 1502267797),
(30, 85, 5, 'XL', 'Xanh', 8, 1, 0, 1502267973),
(31, 86, 5, 'XL', 'Xanh', 8, 1, 0, 1502268035),
(32, 87, 4, 'XL', 'Xanh', 15, 1, 0, 1502269002),
(33, 87, 4, 'XXL', 'Xanh', 15, 1, 0, 1502269002),
(34, 87, 4, 'XXL', 'Do', 15, 1, 0, 1502269003),
(35, 87, 4, 'XXL', 'Tim', 15, 1, 0, 1502269003),
(36, 88, 4, 'XL', 'Xanh', 15, 1, 0, 1502424185),
(37, 89, 4, 'XL', 'Xanh', 15, 1, 0, 1502424333),
(38, 90, 4, 'XL', 'Xanh', 15, 1, 0, 1502424340),
(39, 91, 4, 'XL', 'Xanh', 15, 1, 0, 1502424343),
(40, 92, 4, 'XL', 'Xanh', 15, 1, 0, 1502424406),
(41, 93, 4, 'XL', 'Xanh', 15, 1, 0, 1502424915),
(42, 94, 4, 'XL', 'Xanh', 15, 1, 0, 1502425388);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Thanh toán khi nhận hàng', 1, 1478150927, 1481443734),
(2, 'Thanh toán qua thẻ', 1, 1478150986, 1481443746);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cate_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `saleoff` float DEFAULT NULL,
  `pricesale` float DEFAULT NULL,
  `startsale` date DEFAULT NULL,
  `endsalse` date DEFAULT NULL,
  `color_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `images`, `cate_id`, `price`, `saleoff`, `pricesale`, `startsale`, `endsalse`, `color_id`, `size_id`, `content`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Men\'s Long', 'http://localhost:88/chien/uploads/images/41nB3QXaXuL._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 15.73, 63.5728, 10, '2017-08-11', '2017-08-11', 'a:2:{i:0;s:4:\"Xanh\";i:1;s:2:\"Do\";}', 'a:2:{i:0;s:2:\"XL\";i:1;s:3:\"XXL\";}', '<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% Polyester</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Pull On closure</span></li>\r\n<li><span class=\"a-list-item\">Machine Wash</span></li>\r\n<li><span class=\"a-list-item\">Two crew-neck tees in Cool Dri jersey featuring long sleeves and UPF 50+ protection</span></li>\r\n</ul>', 1, 1499902014, 1502423139),
(5, 'Men\'s ComfortSoft', 'http://localhost:88/chien/uploads/images/41nuv7ElojL._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 8.99, NULL, NULL, NULL, NULL, 'a:1:{i:0;s:4:\"Xanh\";}', 'a:1:{i:0;s:2:\"XL\";}', '<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% Cotton</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Pull On closure</span></li>\r\n<li><span class=\"a-list-item\">Machine Wash</span></li>\r\n<li><span class=\"a-list-item\">Comfortable cotton fabric</span></li>\r\n<li><span class=\"a-list-item\">Full-cut provides roomier fit</span></li>\r\n<li><span class=\"a-list-item\">Double-stitched sleeves and bottom hem for durability</span></li>\r\n</ul>\r\n<div class=\"a-row a-expander-container a-expander-inline-container\">\r\n<div class=\"a-expander-content a-expander-extend-content a-expander-content-expanded\">\r\n<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">Lay flat collar keeps its shape wash after wash</span></li>\r\n<li><span class=\"a-list-item\">All the comfort of Hanes with our famous tag-free collar</span></li>\r\n</ul>\r\n</div>\r\n</div>', 1, 1499902715, 1500938314),
(6, 'Men\'s FreshIQ', 'http://localhost:88/chien/uploads/images/31LH32R-VvL._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 12.93, NULL, NULL, NULL, NULL, NULL, '0', '<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% Cotton</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Pull On closure</span></li>\r\n<li><span class=\"a-list-item\">Machine Wash</span></li>\r\n<li><span class=\"a-list-item\">Comfortable cotton fabric</span></li>\r\n<li><span class=\"a-list-item\">Full-cut provides roomier fit</span></li>\r\n<li><span class=\"a-list-item\">Double-stitched sleeves and bottom hem for durability</span></li>\r\n</ul>', 1, 1499902776, 1499902776),
(7, 'Men\'s \'K87\' Workwear', 'http://localhost:88/chien/uploads/images/51Kg2BUeKyL._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 12.76, NULL, NULL, NULL, NULL, NULL, '0', '<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% Cotton</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Pull On closure</span></li>\r\n<li><span class=\"a-list-item\">Machine Wash</span></li>\r\n<li><span class=\"a-list-item\">Comfortable cotton fabric</span></li>\r\n<li><span class=\"a-list-item\">Full-cut provides roomier fit</span></li>\r\n<li><span class=\"a-list-item\">Double-stitched sleeves and bottom hem for durability</span></li>\r\n</ul>', 1, 1499902887, 1499902887),
(8, 'Men\'s Pocket', 'http://localhost:88/chien/uploads/images/412KG1R2eRL._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 12.96, NULL, NULL, NULL, NULL, NULL, '0', '<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% Cotton</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Pull On closure</span></li>\r\n<li><span class=\"a-list-item\">Machine Wash</span></li>\r\n<li><span class=\"a-list-item\">Comfortable cotton fabric</span></li>\r\n<li><span class=\"a-list-item\">Full-cut provides roomier fit</span></li>\r\n<li><span class=\"a-list-item\">Double-stitched sleeves and bottom hem for durability</span></li>\r\n<li></li>\r\n</ul>', 1, 1499903139, 1499903139),
(9, 'Men\'s Big & Tall', 'http://localhost:88/chien/uploads/images/41zJw-0urBL._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 12.76, NULL, NULL, NULL, NULL, NULL, '0', '<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% Cotton</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Pull On closure</span></li>\r\n<li><span class=\"a-list-item\">Machine Wash</span></li>\r\n<li><span class=\"a-list-item\">Comfortable cotton fabric</span></li>\r\n<li><span class=\"a-list-item\">Full-cut provides roomier fit</span></li>\r\n<li><span class=\"a-list-item\">Double-stitched sleeves and bottom hem for durability</span></li>\r\n</ul>', 1, 1499903197, 1499903197),
(10, 'Men\'s UPF 50', 'http://localhost:88/chien/uploads/images/41CfrRItR3L._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 12.95, NULL, NULL, NULL, NULL, NULL, '0', '<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% Cotton</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Pull On closure</span></li>\r\n<li><span class=\"a-list-item\">Machine Wash</span></li>\r\n<li><span class=\"a-list-item\">Comfortable cotton fabric</span></li>\r\n<li><span class=\"a-list-item\">Full-cut provides roomier fit</span></li>\r\n<li><span class=\"a-list-item\">Double-stitched sleeves and bottom hem for durability</span></li>\r\n</ul>', 1, 1499903251, 1499903251),
(11, 'Men\'s 2 Pack ', 'http://localhost:88/chien/uploads/images/41gy%2B67pLpL._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 12.97, NULL, NULL, NULL, NULL, NULL, '0', '<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% Cotton</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Pull On closure</span></li>\r\n<li><span class=\"a-list-item\">Machine Wash</span></li>\r\n<li><span class=\"a-list-item\">Comfortable cotton fabric</span></li>\r\n<li><span class=\"a-list-item\">Full-cut provides roomier fit</span></li>\r\n<li><span class=\"a-list-item\">Double-stitched sleeves and bottom hem for durability</span></li>\r\n</ul>', 1, 1499903462, 1499903462),
(12, 'Men\'s Stay Tucked Crew', 'http://localhost:88/chien/uploads/images/41PaVd08x-L._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 27.99, NULL, NULL, NULL, NULL, NULL, '0', '<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% Cotton</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Pull On closure</span></li>\r\n<li><span class=\"a-list-item\">Machine Wash</span></li>\r\n<li><span class=\"a-list-item\">Comfortable cotton fabric</span></li>\r\n<li><span class=\"a-list-item\">Full-cut provides roomier fit</span></li>\r\n<li><span class=\"a-list-item\">Double-stitched sleeves and bottom hem for durability</span></li>\r\n</ul>', 1, 1499903516, 1499903516),
(13, 'mens Premium Fitted', 'http://localhost:88/chien/uploads/images/415HLrfwMKL._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 5.26, NULL, NULL, NULL, NULL, NULL, '0', '<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% Cotton</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Pull On closure</span></li>\r\n<li><span class=\"a-list-item\">Machine Wash</span></li>\r\n<li><span class=\"a-list-item\">Comfortable cotton fabric</span></li>\r\n<li><span class=\"a-list-item\">Full-cut provides roomier fit</span></li>\r\n<li><span class=\"a-list-item\">Double-stitched sleeves and bottom hem for durability</span></li>\r\n</ul>', 1, 1499903634, 1499903634),
(14, 'N6210 Next Level Men\'s', 'http://localhost:88/chien/uploads/images/41fF-sE4YHL._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 1.49, NULL, NULL, NULL, NULL, NULL, '0', '<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% Cotton</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Pull On closure</span></li>\r\n<li><span class=\"a-list-item\">Machine Wash</span></li>\r\n<li><span class=\"a-list-item\">Comfortable cotton fabric</span></li>\r\n<li><span class=\"a-list-item\">Full-cut provides roomier fit</span></li>\r\n<li><span class=\"a-list-item\">Double-stitched sleeves and bottom hem for durability</span></li>\r\n</ul>', 1, 1499903687, 1499903687),
(15, 'Men\'s Short-Sleeve', 'http://localhost:88/chien/uploads/images/41B36xeKN-L._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 2.04, NULL, NULL, NULL, NULL, NULL, '0', '<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">90% Pre-Shrunk Cotton/10% Polyester</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">shirts closure</span></li>\r\n<li><span class=\"a-list-item\">Machine Wash</span></li>\r\n<li><span class=\"a-list-item\">Short-sleeve tee featuring banded crew neckline</span></li>\r\n</ul>', 1, 1499903748, 1499903748),
(16, 'Men\'s Heavy Cotton T-Shirt', 'http://localhost:88/chien/uploads/images/31zmcLPZPUL._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 0.99, NULL, NULL, NULL, NULL, NULL, '0', '<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% cotton jersey, 6.1 oz.; Ash, Charcoal Heather, Light Steel and Oxford Gray, cotton/polyester</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Beefy-T closure</span></li>\r\n<li><span class=\"a-list-item\">Ultra-soft premium cotton feels great against your skin</span></li>\r\n<li><span class=\"a-list-item\">Non-chafe fabric taping reinforces neck and shoulders</span></li>\r\n<li><span class=\"a-list-item\">Lay Flat collar keeps its shape wash after wash</span></li>\r\n<li><span class=\"a-list-item\">Durable double stitching trims sleeves and bottom hem</span></li>\r\n<li><span class=\"a-list-item\">Full cut provides roomier fitSpecifications</span></li>\r\n</ul>', 1, 1499903851, 1499903851),
(17, 'Men\'s Graphic', 'http://localhost:88/chien/uploads/images/41cTLZcFnJL._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 3.08, NULL, NULL, NULL, NULL, NULL, '0', '<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% cotton jersey, 6.1 oz.; Ash, Charcoal Heather, Light Steel and Oxford Gray, cotton/polyester</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Beefy-T closure</span></li>\r\n<li><span class=\"a-list-item\">Ultra-soft premium cotton feels great against your skin</span></li>\r\n<li><span class=\"a-list-item\">Non-chafe fabric taping reinforces neck and shoulders</span></li>\r\n<li><span class=\"a-list-item\">Lay Flat collar keeps its shape wash after wash</span></li>\r\n<li><span class=\"a-list-item\">Durable double stitching trims sleeves and bottom hem</span></li>\r\n<li><span class=\"a-list-item\">Full cut provides roomier fitSpecifications</span></li>\r\n</ul>', 1, 1499903899, 1499903899),
(18, 'Men\'s Heavy Cotton', 'http://localhost:88/chien/uploads/images/31MPvKmLv-L._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 1.52, NULL, NULL, NULL, NULL, NULL, '0', '<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% cotton jersey, 6.1 oz.; Ash, Charcoal Heather, Light Steel and Oxford Gray, cotton/polyester</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Beefy-T closure</span></li>\r\n<li><span class=\"a-list-item\">Ultra-soft premium cotton feels great against your skin</span></li>\r\n<li><span class=\"a-list-item\">Non-chafe fabric taping reinforces neck and shoulders</span></li>\r\n<li><span class=\"a-list-item\">Lay Flat collar keeps its shape wash after wash</span></li>\r\n<li><span class=\"a-list-item\">Durable double stitching trims sleeves and bottom hem</span></li>\r\n<li><span class=\"a-list-item\">Full cut provides roomier fitSpecifications</span></li>\r\n</ul>', 1, 1499904010, 1499904010),
(19, 'Adult Tagless Long', 'http://localhost:88/chien/uploads/images/417VsZvYZ-L._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 3.43, NULL, NULL, NULL, NULL, NULL, '0', '<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% cotton jersey, 6.1 oz.; Ash, Charcoal Heather, Light Steel and Oxford Gray, cotton/polyester</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Beefy-T closure</span></li>\r\n<li><span class=\"a-list-item\">Ultra-soft premium cotton feels great against your skin</span></li>\r\n<li><span class=\"a-list-item\">Non-chafe fabric taping reinforces neck and shoulders</span></li>\r\n<li><span class=\"a-list-item\">Lay Flat collar keeps its shape wash after wash</span></li>\r\n<li><span class=\"a-list-item\">Durable double stitching trims sleeves and bottom hem</span></li>\r\n<li><span class=\"a-list-item\">Full cut provides roomier fitSpecifications</span></li>\r\n</ul>', 1, 1499904085, 1499904085),
(20, 'Men\'s Nano ', 'http://localhost:88/chien/uploads/images/41gy%2B67pLpL._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 6.41, NULL, NULL, NULL, NULL, NULL, '0', '<div id=\"featurebullets_feature_div\" class=\"feature\" data-feature-name=\"featurebullets\">\r\n<div id=\"feature-bullets\" class=\"a-section a-spacing-medium a-spacing-top-small\">\r\n<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% cotton jersey, 6.1 oz.; Ash, Charcoal Heather, Light Steel and Oxford Gray, cotton/polyester</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Beefy-T closure</span></li>\r\n<li><span class=\"a-list-item\">Ultra-soft premium cotton feels great against your skin</span></li>\r\n<li><span class=\"a-list-item\">Non-chafe fabric taping reinforces neck and shoulders</span></li>\r\n<li><span class=\"a-list-item\">Lay Flat collar keeps its shape wash after wash</span></li>\r\n<li><span class=\"a-list-item\">Durable double stitching trims sleeves and bottom hem</span></li>\r\n<li><span class=\"a-list-item\">Full cut provides roomier fitSpecifications</span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div id=\"edpIngress_feature_div\" class=\"feature\" data-feature-name=\"edpIngress\">&nbsp;</div>\r\n<div id=\"vendorPoweredCoupon_feature_div\" class=\"feature\" data-feature-name=\"vendorPoweredCoupon\">&nbsp;</div>\r\n<div id=\"heroQuickPromo_feature_div\" class=\"feature\" data-feature-name=\"heroQuickPromo\">&nbsp;</div>\r\n<p>&nbsp;</p>', 1, 1499904172, 1499904172),
(21, 'Dickie\'s Men\'s Short ', 'http://localhost:88/chien/uploads/images/419N6RePLQL._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 12.99, NULL, NULL, NULL, NULL, NULL, '0', '<div id=\"featurebullets_feature_div\" class=\"feature\" data-feature-name=\"featurebullets\">\r\n<div id=\"feature-bullets\" class=\"a-section a-spacing-medium a-spacing-top-small\">\r\n<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% cotton jersey, 6.1 oz.; Ash, Charcoal Heather, Light Steel and Oxford Gray, cotton/polyester</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Beefy-T closure</span></li>\r\n<li><span class=\"a-list-item\">Ultra-soft premium cotton feels great against your skin</span></li>\r\n<li><span class=\"a-list-item\">Non-chafe fabric taping reinforces neck and shoulders</span></li>\r\n<li><span class=\"a-list-item\">Lay Flat collar keeps its shape wash after wash</span></li>\r\n<li><span class=\"a-list-item\">Durable double stitching trims sleeves and bottom hem</span></li>\r\n<li><span class=\"a-list-item\">Full cut provides roomier fitSpecifications</span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div id=\"edpIngress_feature_div\" class=\"feature\" data-feature-name=\"edpIngress\">&nbsp;</div>\r\n<div id=\"vendorPoweredCoupon_feature_div\" class=\"feature\" data-feature-name=\"vendorPoweredCoupon\">&nbsp;</div>\r\n<div id=\"heroQuickPromo_feature_div\" class=\"feature\" data-feature-name=\"heroQuickPromo\">&nbsp;</div>\r\n<p>&nbsp;</p>', 1, 1499905212, 1499905212),
(22, 'Bolter Men\'s Everyday ', 'http://localhost:88/chien/uploads/images/41MlQ1UxHbL._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 12.99, NULL, NULL, NULL, NULL, NULL, '0', '<div id=\"featurebullets_feature_div\" class=\"feature\" data-feature-name=\"featurebullets\">\r\n<div id=\"feature-bullets\" class=\"a-section a-spacing-medium a-spacing-top-small\">\r\n<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% cotton jersey, 6.1 oz.; Ash, Charcoal Heather, Light Steel and Oxford Gray, cotton/polyester</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Beefy-T closure</span></li>\r\n<li><span class=\"a-list-item\">Ultra-soft premium cotton feels great against your skin</span></li>\r\n<li><span class=\"a-list-item\">Non-chafe fabric taping reinforces neck and shoulders</span></li>\r\n<li><span class=\"a-list-item\">Lay Flat collar keeps its shape wash after wash</span></li>\r\n<li><span class=\"a-list-item\">Durable double stitching trims sleeves and bottom hem</span></li>\r\n<li><span class=\"a-list-item\">Full cut provides roomier fitSpecifications</span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div id=\"edpIngress_feature_div\" class=\"feature\" data-feature-name=\"edpIngress\">&nbsp;</div>\r\n<div id=\"vendorPoweredCoupon_feature_div\" class=\"feature\" data-feature-name=\"vendorPoweredCoupon\">&nbsp;</div>\r\n<div id=\"heroQuickPromo_feature_div\" class=\"feature\" data-feature-name=\"heroQuickPromo\">&nbsp;</div>\r\n<p>&nbsp;</p>', 1, 1499905270, 1499905270),
(23, 'Men\'s Tagless ', 'http://localhost:88/chien/uploads/images/41loaRuvR9L._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 15.14, NULL, NULL, NULL, NULL, NULL, '0', '<div id=\"featurebullets_feature_div\" class=\"feature\" data-feature-name=\"featurebullets\">\r\n<div id=\"feature-bullets\" class=\"a-section a-spacing-medium a-spacing-top-small\">\r\n<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% cotton jersey, 6.1 oz.; Ash, Charcoal Heather, Light Steel and Oxford Gray, cotton/polyester</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Beefy-T closure</span></li>\r\n<li><span class=\"a-list-item\">Ultra-soft premium cotton feels great against your skin</span></li>\r\n<li><span class=\"a-list-item\">Non-chafe fabric taping reinforces neck and shoulders</span></li>\r\n<li><span class=\"a-list-item\">Lay Flat collar keeps its shape wash after wash</span></li>\r\n<li><span class=\"a-list-item\">Durable double stitching trims sleeves and bottom hem</span></li>\r\n<li><span class=\"a-list-item\">Full cut provides roomier fitSpecifications</span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div id=\"edpIngress_feature_div\" class=\"feature\" data-feature-name=\"edpIngress\">&nbsp;</div>\r\n<div id=\"vendorPoweredCoupon_feature_div\" class=\"feature\" data-feature-name=\"vendorPoweredCoupon\">&nbsp;</div>\r\n<div id=\"heroQuickPromo_feature_div\" class=\"feature\" data-feature-name=\"heroQuickPromo\">&nbsp;</div>\r\n<p>&nbsp;</p>', 1, 1499905324, 1499905324),
(24, 'Men\'s Humor ', 'http://localhost:88/chien/uploads/images/41xZv%2B4jxkL._AC_UL390_SR300%2C390_FMwebp_QL65_.jpg', 15, 5, NULL, NULL, NULL, NULL, NULL, '0', '<div id=\"featurebullets_feature_div\" class=\"feature\" data-feature-name=\"featurebullets\">\r\n<div id=\"feature-bullets\" class=\"a-section a-spacing-medium a-spacing-top-small\">\r\n<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">100% cotton jersey, 6.1 oz.; Ash, Charcoal Heather, Light Steel and Oxford Gray, cotton/polyester</span></li>\r\n<li><span class=\"a-list-item\">Imported</span></li>\r\n<li><span class=\"a-list-item\">Beefy-T closure</span></li>\r\n<li><span class=\"a-list-item\">Ultra-soft premium cotton feels great against your skin</span></li>\r\n<li><span class=\"a-list-item\">Non-chafe fabric taping reinforces neck and shoulders</span></li>\r\n<li><span class=\"a-list-item\">Lay Flat collar keeps its shape wash after wash</span></li>\r\n<li><span class=\"a-list-item\">Durable double stitching trims sleeves and bottom hem</span></li>\r\n<li><span class=\"a-list-item\">Full cut provides roomier fitSpecifications</span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div id=\"edpIngress_feature_div\" class=\"feature\" data-feature-name=\"edpIngress\">&nbsp;</div>\r\n<div id=\"vendorPoweredCoupon_feature_div\" class=\"feature\" data-feature-name=\"vendorPoweredCoupon\">&nbsp;</div>\r\n<div id=\"heroQuickPromo_feature_div\" class=\"feature\" data-feature-name=\"heroQuickPromo\">&nbsp;</div>\r\n<p>&nbsp;</p>', 1, 1499905370, 1499905370);

-- --------------------------------------------------------

--
-- Table structure for table `sizeproduct`
--

CREATE TABLE `sizeproduct` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sizeproduct`
--

INSERT INTO `sizeproduct` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'XL', 1, 11, 111),
(3, 'XXL', 1, 11, 111);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_create` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `date_create`, `status`) VALUES
(1, 2, 4, 1501472223, 1),
(2, 1, 5, 1502096682, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `colorprodut`
--
ALTER TABLE `colorprodut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `deliver`
--
ALTER TABLE `deliver`
  ADD PRIMARY KEY (`deliver_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `imageproduct`
--
ALTER TABLE `imageproduct`
  ADD PRIMARY KEY (`images_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sizeproduct`
--
ALTER TABLE `sizeproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `colorprodut`
--
ALTER TABLE `colorprodut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `deliver`
--
ALTER TABLE `deliver`
  MODIFY `deliver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `imageproduct`
--
ALTER TABLE `imageproduct`
  MODIFY `images_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `sizeproduct`
--
ALTER TABLE `sizeproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
