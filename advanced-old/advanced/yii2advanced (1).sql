-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2017 at 09:48 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2advanced`
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
('customer', '2', 1503900504),
('customer-create', '2', 1503900572),
('customer-index', '2', 1503900572),
('customer-update', '2', 1503900573),
('customer-view', '2', 1503900573),
('order', '2', 1503900567),
('order-index', '2', 1503900573);

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
('customer', 1, 'Tạo nhóm quyền khách hàng', NULL, NULL, 1503476988, 1503476988),
('customer-create', 2, 'Quyền tạo mới khách hàng', NULL, NULL, 1503476860, 1503476860),
('customer-index', 2, 'Quyền xem danh sách khách hàng\r\n', NULL, NULL, 1503476375, 1503476375),
('customer-update', 2, 'Quyền sửa thông tin khách hàng', NULL, NULL, 1503476910, 1503476910),
('customer-view', 2, 'Quyền xem thông tin chi tiết chi tiết khách hàng', NULL, NULL, 1503476946, 1503476946),
('order', 1, 'Nhóm quyền quản lý đơn hàng', NULL, NULL, 1503475513, 1503903653),
('order-index', 2, 'xem danh sách đơn hàng', NULL, NULL, 1503473106, 1503473106);

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
('customer', 'order');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('GuestRule', 'O:41:\"backend\\modules\\rbac\\components\\GuestRule\":3:{s:4:\"name\";s:9:\"GuestRule\";s:9:\"createdAt\";i:1476004085;s:9:\"updatedAt\";i:1476004085;}', 1476004085, 1476004085),
('RouteRule', 'O:41:\"backend\\modules\\rbac\\components\\RouteRule\":3:{s:4:\"name\";s:9:\"RouteRule\";s:9:\"createdAt\";i:1476004105;s:9:\"updatedAt\";i:1476004105;}', 1476004105, 1476004105);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shorttitle` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `slug`, `image`, `shorttitle`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, '10 thực phẩm vô cùng tốt cho sức khỏe, ngừa ung thư', '10-thuc-pham-vo-cung-tot-cho-suc-khoe', 'http://localhost:88/advanced/uploads/images/blog/post1.jpg', '<p style=\"text-align: center;\">Những thực phẩm sau rất gi&agrave;u vitamin kho&aacute;ng chất tốt cho sức khỏe, c&oacute; t&aacute;c dụng ph&ograve;ng chống ung thư.</p>', '<p><strong>1. Chanh đ&agrave;o<br /></strong></p>\r\n<p>Chỉ cần 1 tr&aacute;i chanh đ&atilde; cung cấp hơn 100% nhu cầu vitamin C h&agrave;ng ng&agrave;y của bạn, gi&uacute;p tăng lượng cholesterol HDL &lsquo;tốt&rsquo; v&agrave; xương chắc khỏe.</p>\r\n<p><img src=\"http://localhost:88/advanced/uploads/images/blog/blog-5-1.jpg?1502857341522\" alt=\"\" width=\"500\" height=\"375\" /></p>\r\n<p>Flavonoids c&oacute; trong chanh gi&uacute;p hạn chế sự ph&aacute;t triển của c&aacute;c tế b&agrave;o ung thư v&agrave; hoạt động như một chất chống vi&ecirc;m.</p>\r\n<p>H&atilde;y bỏ 1 l&aacute;t chanh v&agrave;o trong t&aacute;ch tr&agrave;. Một nghi&ecirc;n cứu cho thấy chanh l&agrave;m tăng khoảng 80% khả năng cơ thể hấp thu c&aacute;c chất chống &ocirc;xy h&oacute;a trong tr&agrave;.</p>\r\n<p><strong>2. S&uacute;p-lơ</strong></p>\r\n<p>Một c&acirc;y s&uacute;p-lơ chứa hơn 100% nhu cầu vitamin K v&agrave; gần 200% nhu cầu vitamin C h&agrave;ng ng&agrave;y của cơ thể. Đ&acirc;y l&agrave; 2 chất dinh dưỡng cần thiết cho sự ph&aacute;t triển của xương.</p>\r\n<p>&nbsp;<img src=\"http://localhost:88/advanced/uploads/images/blog/blog-1-1.jpg?1502857434995\" alt=\"\" width=\"500\" height=\"375\" /></p>\r\n<p align=\"center\"><img class=\"news-image\" src=\"http://anh.24h.com.vn/upload/3-2016/images/2016-09-02/1472778147-broccoli1_pdfe.jpg\" alt=\"10 thực phẩm v&ocirc; c&ugrave;ng tốt cho sức khỏe, ngừa ung thư - 2\" /></p>\r\n<p>&nbsp;</p>\r\n<p>S&uacute;p-lơ cũng c&oacute; t&aacute;c dụng ngăn ngừa nhiều loại ung thư.</p>\r\n<p>Trong khi hấp hoặc đun s&ocirc;i chỉ giữ lại 66% chất dinh dưỡng, th&igrave; d&ugrave;ng l&ograve; vi s&oacute;ng giữ tới 90% vitamin C c&oacute; trong s&uacute;p-lơ.</p>\r\n<p><strong>3. S&ocirc;c&ocirc;la đen</strong></p>\r\n<p>Chỉ 7g s&ocirc;c&ocirc;la đen mỗi ng&agrave;y c&oacute; thể giảm huyết &aacute;p ở người khỏe mạnh.Ngo&agrave;i ra, bột cacao c&ograve;n gi&agrave;u flavonoid v&agrave; c&aacute;c chất chống &ocirc;xy h&oacute;a, gi&uacute;p giảm lượng cholesterol LDL &lsquo;xấu&rsquo; v&agrave; tăng lượng cholesterol HDL &lsquo;tốt&rsquo;.</p>\r\n<p>1 thanh s&ocirc;c&ocirc;la đen chứa khoảng 53,5mg flavonoid, 1 thanh s&ocirc;c&ocirc;la sữa chứa &lt;14mg flavonoid.</p>\r\n<p><strong>4. Khoai t&acirc;y</strong></p>\r\n<p>Một&nbsp;củ khoai t&acirc;y đỏ chứa 66 mcg folate (chất quan trọng trong cấu tr&uacute;c tế b&agrave;o), tương đương với 1 b&aacute;t rau ch&acirc;n vịt hoặc s&uacute;p-lơ.1 củ khoai lang chứa gấp gần 8 lần nhu cầu vitamin A h&agrave;ng ng&agrave;y, gi&uacute;p ngăn ngừa ung thư v&agrave; tăng cường hệ miễn dịch.</p>\r\n<p>N&ecirc;n để nguội khoai t&acirc;y trước khi ăn. Nghi&ecirc;n cứu cho thấy l&agrave;m như vậy gi&uacute;p bạn đốt ch&aacute;y hơn 25% chất b&eacute;o sau bữa ăn.</p>\r\n<p><strong>5. C&aacute; hồi</strong></p>\r\n<p>C&aacute; hồi rất gi&agrave;u axit b&eacute;o omega-3, gi&uacute;p giảm nguy cơ bị trầm cảm, bệnh tim, v&agrave; ung thư.</p>\r\n<p>&nbsp;</p>\r\n<p align=\"center\"><img class=\"news-image\" src=\"http://anh.24h.com.vn/upload/3-2016/images/2016-09-02/1472778147-salmon_omega_31_wlvt.jpg\" alt=\"10 thực phẩm v&ocirc; c&ugrave;ng tốt cho sức khỏe, ngừa ung thư - 3\" /></p>\r\n<p>&nbsp;</p>\r\n<p>Một khẩu phần 85g c&aacute; hồi chứa gần 50% nhu cầu niacin h&agrave;ng ng&agrave;y của bạn, c&oacute; thể bảo vệ chống lại bệnh Alzheimer v&agrave; sa s&uacute;t tr&iacute; tuệ.</p>\r\n<p>Lưu &yacute;: C&aacute; hồi nu&ocirc;i chứa lượng chất độc polychlorinated biphenyl (PCB) cao gấp 16 lần so với c&aacute; hồi tự nhi&ecirc;n.</p>\r\n<p><strong>6. Quả hạch</strong></p>\r\n<p>Quả hạch chứa axit b&eacute;o omega-3 nhiều nhất trong c&aacute;c loại quả, gi&uacute;p giảm cholesterol.Omega-3 gi&uacute;p cải thiện t&acirc;m trạng, ph&ograve;ng chống ung thư v&agrave; bảo vệ cơ thể khỏi t&aacute;c hại của &aacute;nh nắng mặt trời.</p>\r\n<p>Chất chống &ocirc;xy h&oacute;a melatonin c&oacute; trong quả hạch gi&uacute;p điều tiết giấc ngủ.</p>\r\n<p><strong>7. Tr&aacute;i bơ</strong></p>\r\n<p>Một nghi&ecirc;n cứu đ&atilde; chứng minh bơ gi&agrave;u chất b&eacute;o l&agrave;nh mạnh, gi&uacute;p giảm 22% lượng cholesterol.&nbsp;Một tr&aacute;i bơ chứa hơn 50% nhu cầu chất xơ v&agrave; 40% nhu cầu folate h&agrave;ng ng&agrave;y của cơ thể, c&oacute; thể giảm nguy cơ mắc bệnh tim.</p>\r\n<p>Th&ecirc;m bơ v&agrave;o sa-l&aacute;t c&oacute; thể tăng 3-5 lần khả năng hấp thu c&aacute;c chất dinh dưỡng quan trọng như beta-carotene,&hellip; so với sa-l&aacute;t kh&ocirc;ng th&ecirc;m bơ.</p>\r\n<p><strong>8. Tỏi</strong></p>\r\n<p>Tỏi l&agrave; 1 trong 10 thực phẩm tốt nhất cho sức khỏeTỏi gi&uacute;p ức chế sự ph&aacute;t triển của vi khuẩn, bao gồm E. coli.Hợp chất allicin trong tỏi hoạt động như một chất chống vi&ecirc;m hiệu quả, gi&uacute;p giảm nồng độ cholesterol v&agrave; hạ huyết &aacute;p.</p>\r\n<p>Lưu &yacute;: Ăn tỏi tươi nghiền nhỏ l&agrave; tốt nhất v&igrave; giải ph&oacute;ng nhiều allicin nhất. Kh&ocirc;ng n&ecirc;n nấu tỏi; tỏi tiếp x&uacute;c với nhiệt độ cao qu&aacute; 10 ph&uacute;t sẽ l&agrave;m mất đi c&aacute;c chất dinh dưỡng quan trọng.</p>\r\n<p><strong>9. Rau bina</strong></p>\r\n<p>Rau bina chứa lutein v&agrave; xeaxanthin - hai chất chống &ocirc;xy h&oacute;a gi&uacute;p tăng cường hệ miễn dịch, rất quan trọng với sức khỏe đ&ocirc;i mắt.Nghi&ecirc;n cứu mới đ&acirc;y cho thấy trong số c&aacute;c loại tr&aacute;i c&acirc;y v&agrave; rau chống ung thư, rau bina l&agrave; một trong những loại rau c&oacute; hiệu quả nhất.</p>\r\n<p>H&atilde;y thử trộn 1 b&aacute;t rau bina, 1 b&aacute;t c&agrave; rốt nghiền, 1 quả chuối, 1 b&aacute;t nước &eacute;p t&aacute;o v&agrave; 1 ch&uacute;t đ&aacute;, bạn sẽ c&oacute; thức uống ngon t v&agrave; bổ dưỡng.</p>\r\n<p><strong>10. Đậu đỗ</strong></p>\r\n<p>Ăn 1 phần rau họ đậu (đậu đỗ, đậu H&agrave; Lan, đậu lăng,&hellip;) 4 lần mỗi tuần c&oacute; thể giảm 22%nguy cơ mắc bệnh tim v&agrave; nguy cơ mắc ung thư v&uacute;.Đậu c&agrave;ng đen c&agrave;ng chứa nhiều chất chống &ocirc;xy h&oacute;a. Một nghi&ecirc;n cứu chỉ ra rằng đậu đen chứa chất chống &ocirc;xy h&oacute;a nhiều gấp 40 lần so với đậu trắng.</p>', 10, 1502857442, 1503842860),
(2, 'Vì sao nên ăn chuối trước và sau khi tập thể dục?', 'vi-sao-nen-an-chuoi-truoc-va-sau-tap-the-duc', 'http://localhost:88/advanced/uploads/images/blog/blog-2-1.jpg', '<p>Đường glucose trong chuối được hấp thụ nhanh v&agrave;o m&aacute;u c&oacute; thể bổ sung tức th&igrave; lượng đường bị hao hụt..</p>', '<p>Theo&nbsp;<em>Zenlife Yoga</em>, chuối đ&atilde; được chứng minh l&agrave; một trong những thực phẩm gi&uacute;p x&acirc;y dựng cơ bắp, rất tốt cho vận động vi&ecirc;n v&agrave; người l&agrave;m việc nặng nhọc.&nbsp;Nghi&ecirc;n cứu cho thấy chuối chứa carbohydrate hấp thụ nhanh v&agrave; carbohydrate hấp thụ chậm.&nbsp;Một bữa ăn chỉ to&agrave;n với chuối cũng c&oacute; thể cung cấp đủ năng lượng để duy tr&igrave; hoạt động thể lực h&agrave;ng giờ.&nbsp;</p>\r\n<table class=\"tplCaption\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td><img src=\"http://localhost:81/Clem/uploads/products/Blog/blog-2-1.jpg\" alt=\"\" width=\"500\" height=\"375\" /><img src=\"http://localhost:88/advanced/uploads/images/blog/blog-2-1.jpg?1503545468126\" alt=\"\" width=\"500\" height=\"375\" /></td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p class=\"Image\">Ảnh:&nbsp;<em>News</em>.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p class=\"Normal\">Khi con người hoạt động thể lực k&eacute;o d&agrave;i, năng lượng bị hao hụt nhiều, cơ thể phải huy động đến lượng đường trong m&aacute;u để cung cấp cho cơ bắp.&nbsp;Những trường hợp n&agrave;y, đường glucose trong chuối được hấp thụ nhanh v&agrave;o m&aacute;u c&oacute; thể bổ sung tức th&igrave; lượng đường bị hao hụt, gi&uacute;p vận động vi&ecirc;n phục hồi sau khi vận động mệt mỏi.</p>\r\n<p class=\"Normal\">Trong chuối c&oacute; đường fructose được hấp thụ chậm n&ecirc;n duy tr&igrave; năng lượng cho cơ thể l&acirc;u hơn. Ngo&agrave;i ra chuối chứa c&aacute;c loại carbohydrate (bột đường) kh&aacute;c được chuyển h&oacute;a chậm v&agrave; ph&oacute;ng th&iacute;ch đường v&agrave;o m&aacute;u từ từ để đ&aacute;p ứng cho những hoạt động thể lực k&eacute;o d&agrave;i h&agrave;ng giờ sau đ&oacute;. Lượng potassium cao trong chuối c&ograve;n gi&uacute;p duy tr&igrave; trương lực cơ, l&agrave;m giảm nguy cơ vọp bẻ ở vận động vi&ecirc;n.&nbsp;</p>\r\n<p class=\"Normal\">Nhiều người c&oacute; th&oacute;i quen ăn cơm, phở hay thịt động vật chứa nhiều protein rất kh&oacute; hấp thụ, kh&ocirc;ng thể cung cấp ngay dinh dưỡng v&agrave; năng lượng cho cơ thể trước hay sau khi tập.&nbsp;Do đ&oacute;, chuy&ecirc;n gia khuy&ecirc;n n&ecirc;n chọn chuối l&agrave; thức ăn nhanh cho vận động vi&ecirc;n trước, trong v&agrave; sau tập luyện.&nbsp;Tốt nhất n&ecirc;n ăn trước v&agrave; sau khi tập 15 ph&uacute;t.</p>', 10, 1503545477, 1503843171),
(3, 'Chuyện gì xảy ra khi bạn quên uống nước vào buổi sáng', 'chuyen-gi-xay-ra-neu-ban-quen-uong-nuoc-vao -buoi-sang', 'http://localhost:88/advanced/uploads/images/blog/blog-4-1.jpg', '<p>Nếu kh&ocirc;ng uống nước, c&aacute;c chất thải của sự trao đổi chất t&iacute;ch tụ sau một đ&ecirc;m c&oacute; thể g&acirc;y nhiễm độc...</p>', '<p class=\"normal\">Nếu kh&ocirc;ng uống nước, c&aacute;c chất thải của sự trao đổi chất t&iacute;ch tụ sau một đ&ecirc;m c&oacute; thể g&acirc;y nhiễm độc...</p>\r\n<p>&nbsp;</p>\r\n<table class=\"tplCaption\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td><img src=\"http://localhost:81/Clem/uploads/products/Blog/blog-4-1.jpg\" alt=\"\" width=\"500\" height=\"333\" /><img src=\"http://localhost:88/advanced/uploads/images/blog/blog-4-1.jpg?1503545689059\" alt=\"\" width=\"500\" height=\"333\" /></td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p class=\"Image\">Ảnh minh họa:&nbsp;<em>Artofthehome</em>.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p class=\"Normal\">Theo&nbsp;<em>Medicalnewstoday</em>, nhiều người thường qu&ecirc;n uống nước v&agrave;o buổi s&aacute;ng sau khi ngủ dậy. Th&oacute;i quen n&agrave;y kh&ocirc;ng tốt cho sức khỏe, thậm ch&iacute; c&oacute; thể dẫn đến bệnh tật. Nhiều nghi&ecirc;n cứu cho thấy bổ sung một lượng nước nhất định cho cơ thể sau một đ&ecirc;m ngủ đậy vừa đ&aacute;p ứng được nhu cầu trao đổi chất của c&aacute;c cơ quan đồng thời l&agrave; biện ph&aacute;p hữu hiệu để ngăn ngừa bệnh tật.</p>\r\n<p class=\"Normal\">Theo cơ chế th&ocirc;ng thường, trong khi ngủ, cơ thể con người mất đi một lượng nước lớn chủ yếu th&ocirc;ng qua h&ocirc; hấp v&agrave; da. Sau một đ&ecirc;m ngủ từ 7 đến 8 tiếng, c&aacute;c cơ quan to&agrave;n th&acirc;n v&agrave; tế b&agrave;o đều bị mất nước. Đặc biệt trong m&ugrave;a lạnh kh&ocirc; hanh, lượng nước mất đi sẽ nhiều hơn m&ugrave;a ẩm ướt.</p>\r\n<p class=\"Normal\">T&igrave;nh trạng mất nước trong đ&ecirc;m k&eacute;o theo giảm lượng dịch thể v&agrave; l&agrave;m cho m&aacute;u trở n&ecirc;n đặc hơn, lưu lượng giảm, tốc độ lưu th&ocirc;ng chậm. V&igrave; vậy việc bổ sung nước kịp thời l&uacute;c n&agrave;y chẳng kh&aacute;c n&agrave;o \'đất kh&ocirc; gặp mưa r&agrave;o\', cơ thể trở n&ecirc;n khoan kho&aacute;i v&agrave; hoạt động tốt suốt cả ng&agrave;y.</p>\r\n<p class=\"Normal\">Uống nước v&agrave;o buổi s&aacute;ng c&ograve;n l&agrave; c&aacute;ch l&agrave;m sạch c&aacute;c dịch thể trong người. Chẳng hạn, dạ d&agrave;y sau một đ&ecirc;m ngủ dậy gần như trống rỗng, uống một cốc nước lớn gi&uacute;p rửa sạch cặn b&atilde; b&aacute;m tr&ecirc;n th&agrave;nh dạ d&agrave;y, vi khuẩn kh&ocirc;ng c&ograve;n chỗ b&aacute;m n&ecirc;n nhanh ch&oacute;ng bị thải ra khỏi cơ thể theo đường tiểu.</p>\r\n<p class=\"Normal\">Một t&aacute;c dụng kh&aacute;c của nước l&agrave; l&agrave;m lo&atilde;ng nước tiểu. C&aacute;c chất thải của sự trao đổi chất t&iacute;ch lũy lại sau một đ&ecirc;m ngủ, nếu kh&ocirc;ng c&oacute; đủ lượng nước cần thiết để hỗ trợ b&agrave;i tiết th&igrave; sẽ ở lại trong cơ thể rất l&acirc;u. Đ&acirc;y l&agrave; nguồn gốc dẫn đến nhiễm độc mạn t&iacute;nh. Ngược lại, cung cấp nước kịp thời gi&uacute;p tống chất thải ra khỏi cơ thể qua đường nước tiểu, l&agrave;m sạch m&aacute;u, ph&ograve;ng chống bệnh li&ecirc;n quan đến nhiễm tr&ugrave;ng, nhiễm độc v&agrave; kết sỏi hệ b&agrave;i tiết.</p>\r\n<p class=\"Normal\">C&aacute;c chuy&ecirc;n gia khuy&ecirc;n tốt nhất n&ecirc;n uống nước ấm v&agrave;o buổi s&aacute;ng vừa tốt cho cơ thể vừa c&oacute; t&aacute;c dụng giữ ẩm cho da, nhờ đ&oacute; da trở n&ecirc;n s&aacute;ng v&agrave; mịn hơn. Đ&acirc;y l&agrave; c&aacute;ch hiệu quả để bảo vệ da v&agrave; c&aacute;c tổ chức trong cơ thể, đồng thời tăng sức đề kh&aacute;ng. Đặc biệt uống nước buổi s&aacute;ng rất tốt trong việc ph&ograve;ng v&agrave; điều trị t&aacute;o b&oacute;n, đảm bảo việc đại tiện dễ d&agrave;ng. Với người gi&agrave;, chức năng đường ruột giảm, nhu động ruột yếu nếu kh&ocirc;ng c&oacute; th&oacute;i quen uống nước sau khi ngủ dậy sẽ rất dễ bị t&aacute;o b&oacute;n.</p>', 10, 1503545697, 1503842930),
(4, 'Khi nào nên uống chanh đào ngâm để trị ho, cảm cúm', 'chanh-dao-ngan-tri-ho-cam-cum', 'http://localhost:88/advanced/uploads/images/qua-chanh-dao.jpg', '<p>Khi n&agrave;o n&ecirc;n uống chanh đ&agrave;o ng&acirc;m để trị ho, cảm c&uacute;m!!! H&atilde;y xem ng&agrave;y b&agrave;i viết n&agrave;y để biết th&ecirc;m th&ocirc;ng tin...</p>', '<p class=\"normal\">Khi n&agrave;o n&ecirc;n uống chanh đ&agrave;o ng&acirc;m để trị ho, cảm c&uacute;m!!! H&atilde;y xem ng&agrave;y b&agrave;i viết n&agrave;y để biết th&ecirc;m th&ocirc;ng tin...</p>\r\n<p>&nbsp;</p>\r\n<p class=\"Image\">Chanh đ&agrave;o H&agrave; Nội đang được b&aacute;n nhiều tr&ecirc;n c&aacute;c tuyến đường ở TP HCM. Ảnh:<em>&nbsp;Trần Ngoan</em>.</p>\r\n<p class=\"Normal\">Thời tiết thay đổi, nhiều người trong gia đ&igrave;nh chị Oanh (quận B&igrave;nh Thạnh, TP HCM) thay nhau đổ bệnh, chủ yếu l&agrave; c&aacute;c triệu chứng&nbsp;sổ mũi, sốt, ho, vi&ecirc;m họng. Chị mua chanh đ&agrave;o H&agrave; Nội ng&acirc;m với đường hoặc mật ong để ngậm. \"H&ocirc;m qua m&igrave;nh d&ugrave;ng thử thấy cổ họng dịu hơn, bớt đau r&aacute;t c&ograve;n c&aacute;c triệu chứng kh&aacute;c chưa giảm, hy vọng d&ugrave;ng th&ecirc;m v&agrave;i ng&agrave;y nữa bệnh sẽ khỏi\", chị Oanh chia sẻ.&nbsp;</p>\r\n<p class=\"Normal\">Hiện nay chanh đ&agrave;o H&agrave; Nội v&agrave;o TP HCM được b&aacute;n nhiều dọc theo nhiều tuyến đường Phan Văn Trị (quận G&ograve; Vấp), Điện Bi&ecirc;n Phủ (quận B&igrave;nh Thạnh), 3 th&aacute;ng 2 (quận 10)... Mỗi kg quả tươi gi&aacute; 40.000 đồng, được c&aacute;c b&agrave; nội trợ cho l&agrave; trị ho, cảm c&uacute;m hiệu quả.&nbsp;</p>\r\n<p class=\"Normal\">Theo lương y Nguyễn Đức Nghĩa, Hội Dược liệu TP HCM, d&acirc;n gian thường d&ugrave;ng chanh, tắc chưng hoặc ng&acirc;m với đường ph&egrave;n, mật ong để trị ho, cảm c&uacute;m như một b&agrave;i thuốc truyền miệng hiệu quả. Tại Việt Nam hiện c&oacute; khoảng 20 loại chanh v&agrave; chanh đ&agrave;o l&agrave; một trong số đ&oacute;.</p>\r\n<p class=\"Normal\">Chanh đ&agrave;o ng&acirc;m mật ong tốt cho sức khỏe, song lương y Nghĩa lưu &yacute; b&agrave;i thuốc n&agrave;y chỉ hiệu quả đối với c&aacute;c trường hợp mới chớm bệnh như đau họng, ho do nhiễm khuẩn hay dị ứng thời tiết. Kh&ocirc;ng d&ugrave;ng chanh đ&agrave;o cho bệnh nh&acirc;n ho k&egrave;m theo sốt. C&aacute;c trường hợp bệnh nặng như suy h&ocirc; hấp, hen suyễn, ung thư phổi... kh&ocirc;ng được tự &yacute; d&ugrave;ng chanh m&agrave; n&ecirc;n đến kh&aacute;m b&aacute;c sĩ chuy&ecirc;n khoa để được theo d&otilde;i v&agrave; điều trị, tr&aacute;nh biến chứng nguy hiểm.&nbsp;</p>\r\n<p class=\"Normal\">Ph&acirc;n t&iacute;ch th&agrave;nh phần dược l&yacute; cho thấy trong quả chanh chứa nhiều chất c&oacute; lợi cho cơ thể như vitamin C, nh&oacute;m vitamin B pectin, kali, canxi v&agrave; chất chống &ocirc;xy h&oacute;a. Tất cả c&aacute;c loại chanh, tắc th&ocirc;ng thường ng&acirc;m với mật ong hoặc chưng đường ph&egrave;n, cho th&ecirc;m&nbsp;gừng v&agrave;o d&ugrave;ng đều tốt cho người c&oacute; triệu chứng cảm lạnh,&nbsp;đau r&aacute;t họng,&nbsp;cơ thể h&agrave;n, vi&ecirc;m đại tr&agrave;ng, vi&ecirc;m dạ d&agrave;y mạn t&iacute;nh, đầy hơi, ti&ecirc;u chảy, đ&agrave;o thải độc tố...&nbsp;</p>\r\n<p class=\"Normal\">Người chưa bị bệnh c&oacute; thể uống một ly nước chanh hoặc tắc pha mật ong khi mới ngủ dậy để ph&ograve;ng ngừa. Lưu &yacute;: Kh&ocirc;ng d&ugrave;ng cho trẻ dưới một tuổi rưỡi. Kh&ocirc;ng n&ecirc;n pha qu&aacute; ngọt hay qu&aacute; chua v&igrave; kh&ocirc;ng tốt cho sức khỏe.</p>', 10, 1503545789, 1503842954),
(5, 'Nam giới muốn khỏe nên ăn gừng thường xuyên', 'muon-khoe-nen-an-gung', 'http://localhost:88/advanced/uploads/images/blog/blog-6-show.jpg', '<p>Gừng t&iacute;nh ấm c&oacute; t&aacute;c dụng bổ thận, &iacute;ch tinh, trị c&aacute;c chứng bệnh do thận hư g&acirc;y ra như bất lực, ớn lạnh...</p>', '<p class=\"normal\">Gừng t&iacute;nh ấm c&oacute; t&aacute;c dụng bổ thận, &iacute;ch tinh, trị c&aacute;c chứng bệnh do thận hư g&acirc;y ra như bất lực, ớn lạnh...</p>\r\n<p>&nbsp;</p>\r\n<p><img src=\"http://localhost:81/Clem/uploads/products/Blog/blog-6-1.jpg\" alt=\"\" width=\"500\" height=\"407\" /><img src=\"http://localhost:88/advanced/uploads/images/blog/blog-6-show.jpg?1503545882136\" alt=\"\" width=\"370\" height=\"370\" /></p>\r\n<p class=\"Image\">Gừng. Ảnh:&nbsp;<em>Vietrap</em>.</p>\r\n<p class=\"Normal\">Theo&nbsp;<em>Health Sina</em>, gừng nổi tiếng l&agrave; thực phẩm trợ dương, c&ograve;n c&oacute; t&ecirc;n gọi kh&aacute;c l&agrave; &ldquo;ho&agrave;n hồn thảo&rdquo;. Theo Đ&ocirc;ng y, gừng t&iacute;nh cay, ấm, c&oacute; thể đẩy l&ugrave;i cơn cảm lạnh, trị vi&ecirc;m, giảm ho, chống n&ocirc;n, giải độc, người xưa cho n&oacute; l&agrave; &ldquo;thuốc trị b&aacute;ch bệnh tại gia&rdquo;.</p>\r\n<p class=\"Normal\">Gừng t&ugrave;y mức độ tươi hay kh&ocirc; m&agrave; c&oacute; t&iacute;nh năng kh&aacute;c nhau. Gừng kh&ocirc; c&oacute; t&iacute;nh nhiệt, cay hơn, t&aacute;c dụng hồi dương tốt song t&aacute;c dụng nhuận phổi k&eacute;m hơn. V&igrave; vậy nước gừng l&agrave;m từ gừng tươi v&agrave; gừng kh&ocirc; c&oacute; c&ocirc;ng dụng kh&aacute;c nhau.</p>\r\n<p class=\"subtitle\">Gia tăng cảm gi&aacute;c th&egrave;m ăn v&agrave; chống l&atilde;o h&oacute;a</p>\r\n<p class=\"Normal\">Đ&agrave;n &ocirc;ng trung ni&ecirc;n thường bị lạnh dạ d&agrave;y, ch&aacute;n ăn dẫn đến sức khỏe k&eacute;m, c&oacute; thể sử dụng gừng tươi thường xuy&ecirc;n để k&iacute;ch th&iacute;ch sự tiết dịch dạ d&agrave;y, th&uacute;c đẩy ti&ecirc;u h&oacute;a.</p>\r\n<p class=\"Normal\">C&aacute;ch d&ugrave;ng: Gừng tươi xắt l&aacute;t, mỗi s&aacute;ng uống một ly nước ấm, cho l&aacute;t gừng v&agrave;o miệng nhai từ từ để m&ugrave;i gừng lan trong miệng đến dạ d&agrave;y v&agrave; tho&aacute;t ra ngo&agrave;i mũi.</p>\r\n<p class=\"subtitle\">Điều trị liệt dương</p>\r\n<p class=\"Normal\">Gừng c&oacute; t&iacute;nh ấm n&ecirc;n trị được c&aacute;c vấn&nbsp;đề do t&iacute;nh&nbsp;h&agrave;n g&acirc;y ra,&nbsp;đồng thời bồi bổ dạ d&agrave;y v&agrave;&nbsp;m&aacute;u. Gừng c&oacute; thể&nbsp;kết hợp với c&aacute; ch&eacute;p,&nbsp;sơn tra gi&uacute;p bổ thận, &iacute;ch tinh, s&aacute;ng mắt, điều trị c&aacute;c chứng bệnh do thận hư g&acirc;y ra như bất lực, ớn lạnh, đau lưng, mệt mỏi, suy nhược.</p>\r\n<p class=\"Normal\">Nguy&ecirc;n liệu chế biến gồm một&nbsp;con c&aacute; ch&eacute;p khoảng 500 g, gừng 10 g, sơn tra 10 g. C&aacute; l&agrave;m sạch ruột cho v&agrave;o nồi c&ugrave;ng với&nbsp;gừng v&agrave; sơn tra đun s&ocirc;i, th&ecirc;m rượu, muối, một ch&uacute;t&nbsp;bột ngọt cho vừa ăn. D&ugrave;ng khi bụng đ&oacute;i, mỗi ng&agrave;y ăn một&nbsp;lần, li&ecirc;n tục 5 ng&agrave;y.</p>\r\n<p class=\"Normal\">Lưu &yacute;:&nbsp;Gừng c&oacute; t&iacute;nh ấm, chỉ d&ugrave;ng khi bị lạnh, nếu d&ugrave;ng qu&aacute; nhiều sẽ tổn thương &acirc;m kh&iacute;. Người bị đau họng, cổ họng kh&ocirc;, ph&acirc;n kh&ocirc; v&agrave; c&aacute;c triệu chứng nhiệt kh&aacute;c kh&ocirc;ng n&ecirc;n d&ugrave;ng gừng.</p>', 10, 1503545890, 1503842980);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `parent`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rau Củ Quả', 'rau-cu-qua', 0, 'Rau cu qua', 10, 1502698681, 1502698681),
(2, 'Thực phẩm', 'thuc-pham', 0, 'thực phẩm nói chung', 10, 1502706898, 1502706898),
(3, 'Trái cây', 'trai-cay', 0, 'Trái cây nói chung', 10, 1502707162, 1502707162),
(4, 'Sản phẩm khác', 'san-pham-khac', 0, 'Sản phẩm khác', 10, 1502707353, 1502707353),
(5, 'Rau ăn lá', 'rau-an-la', 1, 'rau ăn lá', 10, 1502707455, 1502707455),
(6, 'Rau ăn quả', 'rau-an-qua', 1, 'rau ăn quả', 10, 1502707513, 1502707513),
(7, 'Các Loại  Củ', 'cac-loại-cu', 1, 'rau ăn củ', 10, 1502707607, 1502707607),
(8, 'Trái cây trong nước', 'trai-cay-trong-nuoc', 3, 'trái cây trong nước', 10, 1502707641, 1502707641),
(9, 'Trái cây nhập khẩu', 'trai-cay-nhap-khau', 3, 'trái cây nhập khẩu', 10, 1502707688, 1502707688),
(10, 'Thực phẩm tươi sống', 'thuc-pham-tuoi-song', 2, 'thực phẩm tươi sống', 10, 1502707736, 1502707736),
(11, 'Thực phẩm đông lạnh, sơ chế', 'thuc-pham-dong-lanh', 2, 'Thực phẩm đông lạnh, sơ chế', 10, 1502707898, 1502707898),
(12, 'Gạo', 'gao', 4, 'Gạo', 10, 1502707947, 1502707947),
(13, 'Nấm', 'nam', 4, 'nấm', 10, 1502707991, 1502707991),
(14, 'Đóng túi', 'dong-tui', 4, 'sản phẩm đóng túi', 10, 1502708048, 1502708048);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `body`, `created_at`, `updated_at`) VALUES
(1, 'Đỗ Văn Quyền', 'mitquyen94@gmail.com', 'khách hàng', 'làm ăn như lồn', 1503993230, 1503993230),
(2, 'Đỗ Văn Quyền', 'mitquyen94@gmail.com', 'khách hàng', 'làm ăn như lồn vậy mày', 1503993406, 1503993406),
(3, 'Đỗ Văn Quyền', 'mitquyen94@gmail.com', 'khách hàng', 'làm ăn như lồn vậy mày', 1503993439, 1503993439),
(4, 'Đỗ Văn Quyền', 'mitquyen94@gmail.com', 'khách hàng', 'chán làm ăn như lồn vậy mày', 1503993494, 1503993494),
(5, 'Đỗ Văn Quyền', 'mitquyen94@gmail.com', 'khách hàng', 'chán làm ăn như lồn vậy mày', 1503993558, 1503993558),
(6, 'Đỗ Văn Quyền', 'mitquyen94@gmail.com', 'khách hàng', 'chán làm ăn như lồn vậy mày', 1503993571, 1503993571),
(7, 'Hoàng Văn Chiến', 'mitquyen94@gmail.com', 'giao hàng', 'có những lời thô tục mới khách hàng', 1503993713, 1503993713),
(8, 'Giang a tống', 'mitquyen94@gmail.com', 'nhân viên giao hàng', 'làm ăn như lông vậy', 1503993930, 1503993930),
(9, 'Giang a tống', 'mitquyen94@gmail.com', 'nhân viên giao hàng', 'làm ăn như lông vậy', 1503994028, 1503994028),
(10, 'Giang a tống', 'mitquyen94@gmail.com', 'nhân viên 1234', 'nhân viên giao choáng quá mày ak', 1503994048, 1503994048),
(11, 'Giang a tống', 'mitquyen94@gmail.com', 'nhân viên 1234123123', 'nhân viên giao hàng đẹp trai vãi', 1503994093, 1503994093),
(12, 'Giang a tống ok', 'mitquyen94@gmail.com', 'nhân viên giao hàng ngon', 'nhân viên xinh gái', 1503994188, 1503994188),
(13, 'chien', 'sendemailphp123@gmail.com', 'demo', 'demo thoi', 1504019933, 1504019933),
(14, 'chien', 'hoangchien2712tv@gmail.com', 'dai ca', 'daica', 1504085201, 1504085201),
(15, 'dai ca', 'sendemailphp123@gmail.com', 'daica', 'daica', 1504085401, 1504085401),
(16, 'khong biet', 'hoangchien2712tv@gmail.com', 'cang nhi', 'cang nhi', 1504200429, 1504200429);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `fullname`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'chien', 'hoang dinh chien', 'XpESZE4rOZDjOh3kugHq620RqAn6xchY', '$2y$13$WMFz.W1j5H1RzlF/xUpF7uakMewz56HjxCVgNSm/av0Tki6n4EqM2', NULL, 'chien@gmail.com', '0936826151', 'ha noi', 10, 1502674873, 1503762518),
(2, 'hoang', 'hoang dinh chien', 'Je5ep90dy3U1gCc8IVtCAEX4dO0kwMh9', '$2y$13$b5GXX32Tz6CmwyNT2k7Qh.IWZQEg2ab00oE3/LZPwFRT0zYzKtFdi', NULL, 'hoang@gmail.com', '0936826555', 'ha noi', 10, 1502674987, 1502674987),
(3, 'admin', 'Hoàng Đình Chiến', '3zMQNAyJRI9u8DcuQbbgFlAeFDxUbtMX', '$2y$13$y0yLYkKrBWvLMNV6PaOBd.oWz3G5C4Dk2OrIeXIXjWkGI6zsEtnd2', NULL, 'sendemailphp123@gmail.com', '01234567891', 'Hà Nội', 10, 1502679383, 1503470456),
(4, 'dinh', 'hoang văn chein', 'xF_UTE-Ae_MTKrzHIObni3D7pvISCViv', '$2y$13$dbfV1V60SZ5ECvWnun05DOEDoYuhY4WOTBlMU0XdMceSySCSajvYW', NULL, 'dinh@gmail.com', '0133546220', 'hà noi', 10, 1502680118, 1502680118),
(5, 'demo', 'demo thoi', '75bOX_jWZr1xqzNnka316YGywDjPmtps', '$2y$13$Fyp7u90zaW0lqq5m/q0tle73XIZklyNZF87ZQJuctvS/Apwk/45fG', NULL, 'demo@gmail.com', '23154656600', 'hà nội', 10, 1502680220, 1502680220),
(6, 'manh', 'Hoàng Đình Mạnh', 'yoxeMWMlytZDoHIhAsVnMp7NwlU4esCs', '$2y$13$//Sq2qXGH7RbLInsAVo/pOwOhvpVbViQGrLl4IWuyLTn0ZiCup8vO', NULL, 'hdmanh@gmail.com@gmail.com', '01251231234', 'Hà Nội', 10, 1502680363, 1503247562),
(12, 'hoangchien2712tv@gmail.com', '', 'MqttBF39WE7hVyaVYUv8VthiHJERMQpT', '$2y$13$umgoaWu.M63omyJwLRsPY.U5JAS94LwHiI7rHMA6FF6jExVPo06TG', 'utjhjyUR34pAbC7K548eZ6V7zwgml7sG_1503388056', 'hoangchien2712tv@gmail.com', '', '', 10, 1503388056, 1503388056),
(13, 'khongbiet', 'admin', 'DTfr6wdFvZERkLlZZswQb73UTwX81El3', '$2y$13$o3Tqa/vTKr6FawM/rmAigef/Y2TEDAmPRLDGdLiTlbWt6v6c0CRLe', NULL, 'khongbiet@gmail.com', '0123654987', 'ha noi', 10, 1503561911, 1503679200);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shipper', 10, 1503044462, 1503044462);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 25, 'http://localhost:88/advanced/uploads/images/thit-mong-bo.jpg', 10, 1503040410, 1503040410),
(3, 26, 'http://localhost:88/advanced/uploads/images/thit-lung-cuu.jpg', 10, 1503041665, 1503041665),
(4, 26, 'http://localhost:88/advanced/uploads/images/thit-lung-cuu.jpg', 10, 1503041665, 1503041665);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `fullname`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dinh', 'de mo thoi', 'svHZ9q5-DZAb4Lo1QJDGiSDLEcRbUqgl', '$2y$13$Kt3gb1j0fjsOpUeJ1cfPkO89LpYHb6ZZUztbRAMK2rpDK361A/6Su', NULL, 'dinh@gmail.com', '936826151', 'ha noi', 10, 1502476341, 1502479883),
(2, 'admin', 'Hoàng Đình Chiến', 'm1Z99nXLo2a3F04mn8pExP3U982MOry-', '$2y$13$D4OUbM7II0SCtCKNhj4uuOugy969DBk7BEVPtSNKIou1JWkI2Xkzm', NULL, 'admin@gmail.com', '936826155', 'Hà Nội', 10, 1502476480, 1502479863);

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
('m000000_000000_base', 1502636480),
('m130524_201442_init', 1502636486),
('m140506_102106_rbac_init', 1503460771),
('m170814_012658_customer', 1502674105),
('m170814_034129_Member', 1502682112),
('m170814_073515_category', 1502696489),
('m170814_075429_category', 1502697285),
('m170814_105819_product', 1502709010),
('m170814_132618_price_list', 1502722524),
('m170815_045545_wishlist', 1502773250),
('m170816_035358_blog', 1502855909),
('m170818_051222_Images', 1503033249),
('m170818_073733_Order', 1503041960),
('m170818_074011_OrderDetail', 1503042702),
('m170818_075936_payment', 1503043316),
('m170818_080324_Delivery', 1503043452),
('m170822_024058_auth', 1503370059),
('m170822_025809_auth', 1503374197),
('m170822_044548_auth', 1503377216),
('m170822_045619_auth', 1503377814),
('m170822_074618_auth', 1503387998),
('m170823_033724_rbac_init', 1503459495),
('m170825_043720_supplier', 1503671722),
('m170825_143658_supplier', 1503671839),
('m170829_060738_contact', 1503987008),
('m170830_073752_subscribe', 1504078738);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addess` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname_ship` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_ship` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_ship` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addess_ship` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `request` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `cus_id`, `fullname`, `email`, `mobile`, `addess`, `fullname_ship`, `email_ship`, `mobile_ship`, `addess_ship`, `request`, `total`, `payment_id`, `delivery_id`, `status`, `created_at`) VALUES
(20, 6, 'Hoàng Đình Mạnh', 'hdmanh@gmail.com', '01251231234', 'Hà Nội', 'Hoàng Đình Mạnh', 'hdmanh@gmail.com', '01251231234', 'Hà Nội', '', 250000, 1, 1, 2, 1503248690),
(38, 3, 'Hoàng Đình Chiến', 'sendemailphp123@gmail.com', '09999999', 'Hà Nội', 'Hoàng Đình Chiến', 'sendemailphp123@gmail.com', '09999999', 'Hà Nội', '', 200000, 1, 1, 3, 1503297692),
(41, 3, 'Hoàng Đình Chiến', 'sendemailphp123@gmail.com', '01234567891', 'Hà Nội', 'Hoàng Đình Chiến', 'sendemailphp123@gmail.com', '01234567891', 'Hà Nội', '', 200000, 1, 1, 0, 1503550209),
(42, 3, 'Hoàng Đình Chiến', 'sendemailphp123@gmail.com', '01234567891', 'Hà Nội', 'Hoàng Đình Chiến', 'sendemailphp123@gmail.com', '01234567891', 'Hà Nội', '', 98000, 1, 1, 0, 1503635189),
(43, 3, 'Hoàng Đình Chiến', 'sendemailphp123@gmail.com', '01234567891', 'Hà Nội', 'Hoàng Đình Chiến', 'sendemailphp123@gmail.com', '01234567891', 'Hà Nội', '', 98000, 1, 1, 0, 1503635411),
(44, 3, 'Hoàng Đình Chiến', 'sendemailphp123@gmail.com', '01234567891', 'Hà Nội', 'Hoàng Đình Chiến', 'sendemailphp123@gmail.com', '01234567891', 'Hà Nội', '', 98000, 1, 1, 0, 1503635516),
(45, 3, 'Hoàng Đình Chiến', 'sendemailphp123@gmail.com', '01234567891', 'Hà Nội', 'Hoàng Đình Chiến', 'sendemailphp123@gmail.com', '01234567891', 'Hà Nội', '', 98000, 1, 1, 3, 1503635553),
(46, 3, 'Hoàng Đình Chiến', 'sendemailphp123@gmail.com', '01234567891', 'Hà Nội', 'Hoàng Đình Chiến', 'sendemailphp123@gmail.com', '01234567891', 'Hà Nội', '', 98000, 1, 1, 2, 1503635569),
(47, 3, 'Hoàng Đình Chiến', 'sendemailphp123@gmail.com', '01234567891', 'Hà Nội', 'Hoàng Đình Chiến', 'sendemailphp123@gmail.com', '01234567891', 'Hà Nội', '', 98000, 1, 1, 1, 1503635871);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `order_id`, `product_id`, `price`, `quantity`, `status`, `created_at`) VALUES
(3, 3, 2, 200000, 1, 0, 1503076308),
(4, 3, 3, 230000, 1, 0, 1503076308),
(5, 4, 4, 350000, 1, 0, 1503076471),
(6, 4, 7, 55000, 1, 0, 1503076471),
(7, 5, 13, 150000, 1, 0, 1503077721),
(8, 5, 14, 200000, 1, 0, 1503077721),
(9, 5, 17, 250000, 1, 0, 1503077721),
(10, 6, 15, 18000, 1, 0, 1503079048),
(11, 7, 2, 200000, 1, 0, 1503079128),
(12, 9, 24, 80000, 1, 0, 1503079228),
(13, 12, 8, 80000, 1, 0, 1503079846),
(14, 13, 2, 200000, 1, 0, 1503162953),
(15, 14, 2, 200000, 1, 0, 1503244877),
(16, 14, 5, 8000, 1, 0, 1503244877),
(17, 14, 3, 230000, 3, 0, 1503244877),
(18, 15, 13, 150000, 1, 0, 1503245214),
(19, 15, 14, 200000, 1, 0, 1503245214),
(20, 15, 17, 250000, 1, 0, 1503245214),
(21, 16, 5, 8000, 1, 0, 1503245762),
(22, 16, 6, 50000, 1, 0, 1503245762),
(23, 18, 6, 50000, 1, 0, 1503247261),
(24, 18, 5, 5000, 1, 0, 1503247261),
(25, 19, 5, 5000, 1, 0, 1503247339),
(26, 19, 6, 50000, 1, 0, 1503247339),
(27, 20, 2, 200000, 1, 0, 1503248691),
(28, 20, 6, 50000, 1, 0, 1503248691),
(29, 21, 3, 230000, 9, 0, 1503295663),
(30, 21, 13, 150000, 1, 0, 1503295663),
(31, 21, 5, 5000, 1, 0, 1503295663),
(32, 21, 2, 200000, 1, 0, 1503295663),
(33, 22, 3, 230000, 9, 0, 1503295690),
(34, 22, 13, 150000, 1, 0, 1503295690),
(35, 22, 5, 5000, 1, 0, 1503295690),
(36, 22, 2, 200000, 1, 0, 1503295690),
(37, 23, 3, 230000, 9, 0, 1503295755),
(38, 23, 13, 150000, 1, 0, 1503295755),
(39, 23, 5, 5000, 1, 0, 1503295755),
(40, 23, 2, 200000, 1, 0, 1503295755),
(41, 24, 3, 230000, 9, 0, 1503295775),
(42, 24, 13, 150000, 1, 0, 1503295775),
(43, 24, 5, 5000, 1, 0, 1503295775),
(44, 24, 2, 200000, 1, 0, 1503295775),
(45, 25, 3, 230000, 9, 0, 1503295807),
(46, 25, 13, 150000, 1, 0, 1503295807),
(47, 25, 5, 5000, 1, 0, 1503295808),
(48, 25, 2, 200000, 1, 0, 1503295808),
(49, 26, 3, 230000, 9, 0, 1503295893),
(50, 26, 13, 150000, 1, 0, 1503295893),
(51, 26, 5, 5000, 1, 0, 1503295893),
(52, 26, 2, 200000, 1, 0, 1503295893),
(53, 27, 3, 230000, 9, 0, 1503296021),
(54, 27, 13, 150000, 1, 0, 1503296021),
(55, 27, 5, 5000, 1, 0, 1503296021),
(56, 27, 2, 200000, 1, 0, 1503296021),
(57, 28, 3, 230000, 9, 0, 1503296054),
(58, 28, 13, 150000, 1, 0, 1503296054),
(59, 28, 5, 5000, 1, 0, 1503296054),
(60, 28, 2, 200000, 1, 0, 1503296054),
(61, 32, 3, 230000, 1, 0, 1503296829),
(62, 32, 4, 350000, 2, 0, 1503296830),
(63, 36, 2, 200000, 1, 0, 1503297301),
(64, 36, 3, 230000, 1, 0, 1503297301),
(65, 37, 2, 200000, 1, 0, 1503297331),
(66, 37, 3, 230000, 1, 0, 1503297331),
(67, 38, 2, 200000, 1, 0, 1503297692),
(68, 40, 2, 200000, 1, 0, 1503550192),
(69, 41, 2, 200000, 1, 0, 1503550209),
(70, 42, 2, 98000, 1, 0, 1503635189),
(71, 43, 2, 98000, 1, 0, 1503635411),
(72, 44, 2, 98000, 1, 0, 1503635516),
(73, 46, 2, 98000, 1, 0, 1503635569),
(74, 47, 2, 98000, 1, 0, 1503635872);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Thanh toán khi nhận hàng', 10, 1503044591, 1503044591);

-- --------------------------------------------------------

--
-- Table structure for table `price_list`
--

CREATE TABLE `price_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `price_list`
--

INSERT INTO `price_list` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kg', 10, 1502724661, 1502850670),
(2, '0.5kg', 10, 1502725214, 1502983078),
(3, 'Túi', 10, 1502725347, 1502725362),
(4, 'Khay', 10, 1502725375, 1502725375),
(5, 'Quả', 10, 1502849815, 1502849815),
(6, 'Cây', 10, 1502852072, 1502852072),
(7, 'Bắp', 10, 1502980646, 1502980646);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cate_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `pricesale` float DEFAULT NULL,
  `pricelist` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `saleoff` float DEFAULT NULL,
  `startsale` date DEFAULT NULL,
  `endsale` date DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `new` int(6) DEFAULT '10',
  `bestseller` int(6) DEFAULT '10',
  `featured` int(6) DEFAULT '10',
  `hotdeals` int(6) DEFAULT '10',
  `sepcialoffer` int(6) DEFAULT '10',
  `instock` int(6) DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `image`, `cate_id`, `price`, `pricesale`, `pricelist`, `saleoff`, `startsale`, `endsale`, `desc`, `content`, `new`, `bestseller`, `featured`, `hotdeals`, `sepcialoffer`, `instock`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Quả Việt quất', 'qua-viet-quat', 'http://localhost:88/advanced/uploads/images/5.jpg', 8, 200000, 98000, 'Kg', 49, '2017-08-24', '2017-08-31', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>&nbsp;</p>', 0, 10, 0, 10, 0, 10, 10, 1502771567, 1503597525),
(3, 'Quả Nho', 'qua-nho', 'http://localhost:88/advanced/uploads/images/qua-nho.jpg', 8, 230000, NULL, 'Kg', NULL, NULL, NULL, '<p>bestseller</p>', '<p>bestseller</p>', 0, 10, 0, 0, 0, 10, 10, 1502780244, 1503597546),
(4, 'Quả Chanh đào', 'qua-chanh-dao', 'http://localhost:88/advanced/uploads/images/qua-chanh-dao.jpg', 8, 35000, NULL, 'Kg', NULL, '2017-08-16', '2017-08-31', '<p>bestseller</p>', '<p>Chanh đ&agrave;o h&agrave; nội , một thức loại thức uống ngon, giải kh&aacute;t thanh nhiệt cho m&ugrave;a h&egrave; nắng n&oacute;ng. kh&ocirc;ng những thế chanh đ&agrave;o c&ograve;n l&agrave; một loại thuốc đ&ocirc;ng y trị ho v&ocirc; c&ugrave;ng hiệu quả d&agrave;nh cho tất cả mọi người, đồng thời gi&uacute;p bảo vệ sức khỏe của bạn kh&ocirc;ng bị ảnh hưởng của thời tiết khi c&oacute; sự thay đổi</p>\r\n<p>+ chanh đ&agrave;o ng&acirc;m mật ong : l&agrave; một b&agrave;i thuốc ph&ugrave; hợp với mọi gia đ&igrave;nh đặc biệt l&agrave; nh&agrave; c&oacute; con nhỏ từ 2 tuổi trở l&ecirc;n. V&agrave;o ng&agrave;y thời tiết lạnh hay khi trẻ mới bắt đầu ho th&igrave; buổi s&aacute;ng khi thức dậy lấy một muổng nước chanh đ&agrave;o ng&acirc;m mật ong cho trẻ uống, với người lớn th&igrave; cắt l&aacute;t quả chanh ng&acirc;m rồi trộn đều với nước trong b&igrave;nh, sau đ&oacute; nhai v&agrave; ngậm khoảng 20 ph&uacute;t, rồi nuốt, ng&agrave;y l&agrave;m v&agrave;i lần.</p>', 0, 10, 0, 0, 0, 10, 10, 1502849510, 1503597578),
(5, 'Quả Dứa', 'qua-dua', 'http://localhost:88/advanced/uploads/images/qua-dua.jpg', 8, 8000, 5000, 'Quả', NULL, '2017-08-19', '2017-08-24', '<p>bestseller</p>', '<p>qua dua</p>', 0, 10, 0, 0, 0, 10, 10, 1502849873, 1503597597),
(6, 'Quả Hồng', 'qua-hong', 'http://localhost:88/advanced/uploads/images/qua-hong.jpg', 8, 50000, NULL, 'Kg', NULL, '2017-08-16', '2017-08-16', '<p>bestseller</p>', '<p>qua hong</p>', 0, 10, 0, 0, 0, 10, 10, 1502849925, 1503597624),
(7, 'Quả Lê', 'qua-le', 'http://localhost:88/advanced/uploads/images/qua-le.jpg', 8, 55000, NULL, 'Kg', NULL, '2017-08-16', '2017-08-16', '<p>bestseller</p>', '<p>Quả L&ecirc;</p>', 0, 10, 0, 0, 0, 10, 10, 1502850131, 1503597651),
(8, 'Quả Cam', 'qua-cam', 'http://localhost:88/advanced/uploads/images/qua-cam.jpg', 8, 80000, NULL, 'Kg', NULL, '2017-08-16', '2017-08-16', '<p>bestseller</p>', '<p>Quả Cam</p>', 0, 10, 0, 0, 0, 10, 10, 1502850178, 1503597668),
(9, 'Quả Bưởi', 'qua-buoi', 'http://localhost:88/advanced/uploads/images/qua-buoi.jpg', 8, 76000, NULL, 'Quả', NULL, '2017-08-16', '2017-08-16', '', '<p>qua buoi &nbsp;</p>', NULL, NULL, NULL, NULL, NULL, 10, 10, 1502850238, 1502850238),
(10, 'Quả Thanh Long', 'qua-thanh-long', 'http://localhost:88/advanced/uploads/images/qua-thanh-long.jpg', 8, 75000, NULL, 'kg', NULL, '2017-08-16', '2017-08-16', '', '<p>thanh long</p>', NULL, NULL, NULL, NULL, NULL, 10, 10, 1502850300, 1502850300),
(11, 'Quả Cam Xoàn', 'qua-cam-xoan', 'http://localhost:88/advanced/uploads/images/qua-cam-xoan.jpg', 8, 60000, NULL, 'kg', NULL, '2017-08-16', '2017-08-16', '', '<p>Quả Cam Xo&agrave;n</p>', NULL, NULL, NULL, NULL, NULL, 10, 10, 1502850364, 1502850364),
(12, 'Quả Sầu Riêng', 'sau-rieng', 'http://localhost:88/advanced/uploads/images/qua-sau-rieng.jpg', 8, 135000, NULL, 'kg', NULL, '2017-08-16', '2017-08-16', '', '<p>qua sau rieng</p>', NULL, NULL, NULL, NULL, NULL, 10, 10, 1502850418, 1502850418),
(13, 'Quả Dâu Tây', 'qua-rau-tay', 'http://localhost:88/advanced/uploads/images/dau-tay.jpg', 9, 150000, 130000, 'Kg', NULL, '2017-08-16', '2017-08-16', '<p>sgsgsgsgsgsgsggsgsgs</p>', '<p>sgsgsgsgsgsgsggsgsgs</p>', 0, 10, 0, 0, 0, 10, 10, 1502850915, 1503603750),
(14, 'RedBerry', 'redberry', 'http://localhost:88/advanced/uploads/images/RedBerry.jpg', 9, 200000, NULL, 'Kg', NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 0, 0, 0, 0, 0, 10, 10, 1502851991, 1504105165),
(15, 'Súp Lơ', 'sup-lo', 'http://localhost:88/advanced/uploads/images/sup-lo.jpg', 5, 18000, NULL, 'Cây', NULL, '2017-08-16', '2017-08-16', '<p>Đối với cơ thể con người th&igrave; th&agrave;nh phần kho&aacute;ng chất-vitamin của&nbsp;<a draggable=\"false\" href=\"http://giadinh.net.vn/an/meo-chon-mua-bao-quan-va-che-bien-sup-lo-20111130050356776.htm\">s&uacute;p lơ</a>&nbsp;rất c&oacute; &iacute;ch bởi n&oacute; c&oacute; t&aacute;c dụng từ nhiều mặt: K&iacute;ch th&iacute;ch c&aacute;c qu&aacute; tr&igrave;nh trao đổi chất v&agrave; tham gia v&agrave;o hoạt động tạo m&aacute;u để củng cố hệ tim-mạch, cũng như c&aacute;c chức năng bảo vệ cơ thể. V&igrave; thế, s&uacute;p lơ kh&ocirc;ng chỉ được coi l&agrave; một m&oacute;n ăn dinh dưỡng qu&yacute; gi&aacute; m&agrave; c&ograve;n l&agrave; một th&agrave;nh phần dinh dưỡng quan trọng đối với cơ thể.</p>', '<p>Đối với cơ thể con người th&igrave; th&agrave;nh phần kho&aacute;ng chất-vitamin của&nbsp;<a draggable=\"false\" href=\"http://giadinh.net.vn/an/meo-chon-mua-bao-quan-va-che-bien-sup-lo-20111130050356776.htm\">s&uacute;p lơ</a>&nbsp;rất c&oacute; &iacute;ch bởi n&oacute; c&oacute; t&aacute;c dụng từ nhiều mặt: K&iacute;ch th&iacute;ch c&aacute;c qu&aacute; tr&igrave;nh trao đổi chất v&agrave; tham gia v&agrave;o hoạt động tạo m&aacute;u để củng cố hệ tim-mạch, cũng như c&aacute;c chức năng bảo vệ cơ thể. V&igrave; thế, s&uacute;p lơ kh&ocirc;ng chỉ được coi l&agrave; một m&oacute;n ăn dinh dưỡng qu&yacute; gi&aacute; m&agrave; c&ograve;n l&agrave; một th&agrave;nh phần dinh dưỡng quan trọng đối với cơ thể.</p>', 0, 0, 0, 0, 10, 10, 10, 1502852131, 1503628701),
(16, 'Ngô nếp ngọt', 'ngo-net-ngot', 'http://localhost:88/advanced/uploads/images/ngo-ngot.jpg', 7, 15000, 7350, 'Bắp', 49, '2017-08-24', '2017-08-29', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>ng&ocirc; ngọt&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 0, 0, 10, 10, 0, 10, 10, 1502958451, 1503594151),
(17, 'Nho Úc', 'ngo-uc', 'http://localhost:88/advanced/uploads/images/nho-uc.jpg', 9, 250000, 200000, 'Kg', NULL, '2017-08-17', '2017-08-17', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 10, 0, 0, 0, 10, 10, 10, 1502959619, 1503628768),
(18, 'Quả Chanh vàng', 'qua-chanh-vang', 'http://localhost:88/advanced/uploads/images/qua-chanh-vang.jpg', 8, 60000, 50000, 'Kg', NULL, '2017-08-17', '2017-08-31', '', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, NULL, NULL, 3, NULL, 10, 10, 1502981916, 1503326772),
(19, 'Quả Đu đủ', 'qua-du-du', 'http://localhost:88/advanced/uploads/images/qua-du-du.jpg', 8, 40000, 35000, 'Kg', NULL, '2017-08-17', '2017-08-26', '', '<p>qua du dủ</p>', NULL, NULL, NULL, 2, NULL, 10, 10, 1502982656, 1503031295),
(20, 'Quả Lặc lầy', 'qua-lac-lay', 'http://localhost:88/advanced/uploads/images/qua-lac-le.jpg', 8, 25000, 20000, '0.5kg', NULL, '2017-08-17', '2017-08-17', '<p>Mướp Nh&acirc;̣t hay còn gọi là lặc lày từ khi mới xu&acirc;́t hi&ecirc;̣n đã được coi là m&ocirc;̣t loại quả cao c&acirc;́p đặc sản với giá thành kh&ocirc;ng h&ecirc;̀ rẻ. Ngoài t&ecirc;n gọi là mướp Nh&acirc;̣t (lặc lày), loại quả này còn được bà con d&acirc;n t&ocirc;̣c Thái gọi với cái t&ecirc;n mặc t&ecirc;̣t (mướp rừng), mướp Mường.</p>', '<p>Mướp Nh&acirc;̣t hay còn gọi là lặc lày từ khi mới xu&acirc;́t hi&ecirc;̣n đã được coi là m&ocirc;̣t loại quả cao c&acirc;́p đặc sản với giá thành kh&ocirc;ng h&ecirc;̀ rẻ. Ngoài t&ecirc;n gọi là mướp Nh&acirc;̣t (lặc lày), loại quả này còn được bà con d&acirc;n t&ocirc;̣c Thái gọi với cái t&ecirc;n mặc t&ecirc;̣t (mướp rừng), mướp Mường.</p>', 0, 0, 0, 0, 10, 10, 10, 1502983055, 1503628621),
(21, 'Nho Xanh', 'nho-xanh', 'http://localhost:88/advanced/uploads/images/nho-xanh-ninhthuan_1.jpg', 7, 80000, NULL, 'Kg', NULL, '2017-08-18', '2017-08-18', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 10, 0, 0, 0, 10, 10, 10, 1503039319, 1503628725),
(24, 'test', 'test', 'http://localhost:88/advanced/uploads/images/nho-xanh-ninhthuan_1.jpg', 6, 80000, NULL, 'Kg', NULL, '2017-08-18', '2017-08-18', '', '<p>xvvzvzvvzxvzvzvzxzxvzvzxvzxvzxv</p>', NULL, NULL, NULL, NULL, NULL, 10, 10, 1503039616, 1503039616),
(25, 'test2', 'test2', 'http://localhost:88/advanced/uploads/images/Spices.jpg', 6, 10000, NULL, 'Kg', NULL, '2017-08-18', '2017-08-18', '', '<p>c&acirc;ccacacacaccacacacacacaccacacacaca</p>\r\n<p>c&acirc;ccacacacacacaca</p>\r\n<p>&acirc;ccccccccccccccccccccccccccc</p>\r\n<p>caaaaaaaaaaaaaaaaaaaaaaaaa</p>\r\n<p>&nbsp;</p>', NULL, NULL, NULL, NULL, NULL, 10, 10, 1503039788, 1503040410),
(27, 'Quả Cherry đỏ', 'qua-cherry-do', 'http://localhost:88/advanced/uploads/images/cherru-do.jpg', 9, 485000, NULL, 'Kg', NULL, '2017-08-22', '2017-08-22', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 10, 0, 0, 0, 10, 10, 10, 1503416837, 1503628754),
(28, 'Rau Xà lách', 'xa-lach', 'http://localhost:88/advanced/uploads/images/xalach.jpg', 5, 15000, NULL, '0.5kg', NULL, '2017-08-24', '2017-08-24', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 10, 0, 0, 0, 0, 10, 10, 1503590544, 1503590544),
(29, 'Ớt Đà lạt', 'ot-da-lat', 'http://localhost:88/advanced/uploads/images/ot-da-lat.jpg', 6, 35000, NULL, 'Kg', NULL, '2017-08-24', '2017-08-24', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 10, 0, 0, 0, 0, 10, 10, 1503593901, 1503593901),
(30, 'Dâu tây', 'dau-tay', 'http://localhost:88/advanced/uploads/images/p6.jpg', 9, 75000, NULL, 'Kg', NULL, '2017-08-24', '2017-08-24', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 0, 0, 10, 0, 0, 10, 10, 1503594000, 1503594000),
(31, 'Khoai tây', 'khoai-tay', 'http://localhost:88/advanced/uploads/images/p10.jpg', 7, 15000, 2250, 'Kg', 15, '2017-08-24', '2017-08-31', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 0, 0, 10, 0, 0, 10, 10, 1503594086, 1503595929),
(32, 'Ổi phúc lợi', 'oi-phuc-loi', 'http://localhost:88/advanced/uploads/images/oi.jpg', 8, 35000, NULL, 'Kg', NULL, '2017-08-24', '2017-08-24', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 10, 0, 10, 0, 0, 10, 10, 1503595707, 1503595744),
(33, 'Mướp đắng', 'muop-dang', 'http://localhost:88/advanced/uploads/images/p19.jpg', 6, 22000, NULL, 'Kg', NULL, '2017-08-24', '2017-08-24', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 10, 0, 10, 0, 10, 10, 10, 1503595873, 1503628739),
(34, 'Quả Na', 'qua-na', 'http://localhost:88/advanced/uploads/images/p24.jpg', 8, 12000, NULL, 'Quả', NULL, '2017-08-25', '2017-08-25', '<p>Kh&ocirc;ng chỉ gi&uacute;p l&agrave;m đẹp da, quả na c&ograve;n c&oacute; nhiều t&aacute;c dụng đối với sức khỏe như bảo vệ mắt, cải thiện ti&ecirc;u h&oacute;a, ngăn ngừa mệt mỏi, đặc biệt rất tốt cho phụ nữ mang thai.</p>', '<p>Kh&ocirc;ng chỉ gi&uacute;p l&agrave;m đẹp da, quả na c&ograve;n c&oacute; nhiều t&aacute;c dụng đối với sức khỏe như bảo vệ mắt, cải thiện ti&ecirc;u h&oacute;a, ngăn ngừa mệt mỏi, đặc biệt rất tốt cho phụ nữ mang thai.</p>', 0, 0, 0, 0, 10, 10, 10, 1503628880, 1503628880),
(35, 'Đậu đỗ', 'dau-do', 'http://localhost:88/advanced/uploads/images/p2.jpg', 8, 32000, NULL, 'Kg', NULL, '2017-08-25', '2017-08-25', '<p>Kh&ocirc;ng chỉ gi&uacute;p l&agrave;m đẹp da, quả na c&ograve;n c&oacute; nhiều t&aacute;c dụng đối với sức khỏe như bảo vệ mắt, cải thiện ti&ecirc;u h&oacute;a, ngăn ngừa mệt mỏi, đặc biệt rất tốt cho phụ nữ mang thai.</p>', '<p>Kh&ocirc;ng chỉ gi&uacute;p l&agrave;m đẹp da, quả na c&ograve;n c&oacute; nhiều t&aacute;c dụng đối với sức khỏe như bảo vệ mắt, cải thiện ti&ecirc;u h&oacute;a, ngăn ngừa mệt mỏi, đặc biệt rất tốt cho phụ nữ mang thai.</p>', 0, 0, 0, 0, 10, 10, 10, 1503628964, 1503628964);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`, `status`, `created_at`) VALUES
(1, 'chien@gmail.com', 10, 1504080499),
(2, 'hoangchien@gmail.com', 10, 1504080618),
(3, 'hoangchien2712tv@gmail.com', 10, 1504080747),
(4, 'dinh@gmail.com', 10, 1504080869);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speech` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `image`, `name`, `company`, `speech`, `email`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'http://localhost:88/advanced/uploads/images/supplier/member1.png', 'Nhà Cung cấp 1', 'ADC company', 'Chúng tôi luôn mang đến những sản phẩm tốt nhất từ trang trại chúng tôi đến ngôi nhà của bạn.', 'supplier1@gmail.com', '0981231234', 'Hà Nội', 10, 1503673515, 1503675333);

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
  `cus_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `cus_id`, `product_id`, `status`, `created_at`) VALUES
(2, 6, 5, 10, 1503248561),
(3, 6, 6, 10, 1503248564),
(4, 3, 21, 10, 1503994518),
(5, 3, 28, 10, 1503994570);

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
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD UNIQUE KEY `description` (`description`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
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
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

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
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `price_list`
--
ALTER TABLE `price_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD UNIQUE KEY `slug_2` (`slug`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `price_list`
--
ALTER TABLE `price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
