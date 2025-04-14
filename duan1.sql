-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 14, 2025 at 12:43 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `bio`, `created_at`, `updated_at`) VALUES
(1, 'ta duc thai', NULL, '2025-03-21 00:59:23', '2025-03-21 00:59:23'),
(2, 'nguyen tien thinh', NULL, '2025-03-21 00:59:23', '2025-03-21 00:59:23'),
(3, 'Minh Cương', NULL, '2025-03-26 14:49:50', '2025-03-20 14:49:50'),
(4, 'Phạm Minh', NULL, '2025-03-20 14:49:50', '2025-03-04 14:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `ID` int NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` text,
  `Image` varchar(255) DEFAULT NULL,
  `Position` int NOT NULL,
  `Status` tinyint(1) DEFAULT '1',
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`ID`, `Title`, `Description`, `Image`, `Position`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'One Piece', 'truyện hay', '../uploads/banner/1744100947_Banner_Truyện Tranh_BĐTT_Final_V1.jpg.jpg', 0, 1, '2025-04-08 08:29:07', '2025-04-08 08:29:07'),
(2, 'Doraemon', 'ádsa', '../uploads/banner/1744100964_truyen-trang-Doraemon-01.jpg', 0, 1, '2025-04-08 08:29:24', '2025-04-08 08:29:24'),
(3, 'Truyện', 'sad', '../uploads/banner/1744100978_manga-nhat-ban-va-webtoon-han-quoc-thong-tri-nganh-truyen-tranh-the-gioi-2_RMBA.jpg', 0, 1, '2025-04-08 08:29:38', '2025-04-08 08:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 1, '2025-04-04 01:54:14', '2025-04-04 01:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int NOT NULL,
  `cart_id` int DEFAULT NULL,
  `comic_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `unit_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `comic_id`, `quantity`, `unit_price`) VALUES
(8, 4, 8, 2, '98898.00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Tình cảm', 'Những câu chuyện về tình yêu', '2025-03-19 01:39:14', '2025-03-25 14:32:18'),
(2, 'Trinh thám', 'Manga về các vụ án và điều tra', '2025-03-19 01:39:14', '2025-03-25 14:33:02'),
(3, 'Siêu nhiên', 'Manga về các yếu tố siêu nhiên', '2025-03-21 01:19:57', '2025-03-25 14:33:38'),
(4, 'Học đường', 'Câu chuyện về thế giới học đường', '2025-03-21 01:51:19', '2025-03-25 14:34:00'),
(6, 'Thể thao', 'Manga về các môn thể thao', '2025-03-25 14:34:22', '2025-03-25 14:34:22'),
(7, 'Fantasy', 'Thế giới kỳ ảo về phép thuật', '2025-03-25 14:34:45', '2025-03-25 14:34:45'),
(8, 'Kinh dị', 'Thể loại manga kinh dị, rùng rợn\r\n', '2025-03-25 14:36:26', '2025-03-25 14:36:26'),
(9, 'Hành động', 'Thể loại với những cảnh hành động đã mắt', '2025-03-25 14:36:53', '2025-03-25 14:36:53'),
(10, 'Phiêu lưu', 'Câu chuyện về những cuộc phiêu lưu kì bí', '2025-03-25 14:37:15', '2025-03-25 14:37:15'),
(11, 'Hài hước', 'Manga về những câu chuyện hài hước và thú vị', '2025-03-25 14:37:35', '2025-03-25 14:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `comics`
--

CREATE TABLE `comics` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `description` text,
  `publication_date` date DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `original_price` decimal(10,2) DEFAULT NULL,
  `stock_quantity` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comics`
--

INSERT INTO `comics` (`id`, `title`, `author_id`, `category_id`, `description`, `publication_date`, `price`, `original_price`, `stock_quantity`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Cùng Đỉnh Lưu Ảnh Đế Yêu Đương Phát Đường', 1, 1, 'Cùng Đỉnh Lưu Ảnh Đế Yêu Đương Phát Đường được đánh giá là một trong những truyện tranh ngôn tình hay nhất năm nay. Thái VC không tải giao diện admin về ak ', '2025-03-25', '35454.00', '35454.00', 241, '../uploads/product/1742913591_truyen-tranh-ngon-tinh-hay-1.jpg', '2025-03-21 00:57:09', '2025-04-03 11:38:19'),
(3, 'Nam Chính Quái Vật Sống Dưới Giường Tôi', 1, 1, 'Cuộc sống của nữ chính vốn dĩ bình thường cho đến khi người anh trai gửi tặng một món quà bất ngờ: một chú slime màu xanh', '2025-03-18', '100000.00', '80000.00', 117, '../uploads/product/1742913656_truyen-tranh-ngon-tinh-hay-2.jpg', '2025-03-21 01:05:18', '2025-04-10 04:56:02'),
(5, 'Tớ Crush Cậu Mất Rồi!', 1, 1, 'Bộ truyện tranh ngôn tình hay và lãng mạn này xoay quanh nhân vật Hyeji, một cô gái sở hữu nhan sắc vạn người mê, là \"nữ thần Instagram\" với hàng triệu lượt theo dõi. Tuy nhiên, cô lại đang chìm trong \"kiếp ế bền vững\".', '2025-03-19', '43443.00', '23223.00', 230, '../uploads/product/1742913690_truyen-tranh-ngon-tinh-hay-3.jpg', '2025-03-25 14:41:30', '2025-04-10 04:58:47'),
(6, 'Hẹn hò chốn công sở', 1, 1, 'Trên diễn đàn review truyện tranh ngôn tình hay, Hẹn hò chốn công sở nổi lên như một hiện tượng thu hút đông đảo độc giả.', '2025-03-13', '45454.00', '32230.00', 454, '../uploads/product/1742913767_truyen-tranh-ngon-tinh-hay-4.jpg', '2025-03-25 14:42:47', '2025-04-10 04:58:31'),
(7, 'Hôn trộm 55 lần222', 1, 1, 'Hôn trộm 55 lần được nhiều độc giả đánh giá là bộ truyện tranh ngôn tình hay nhất, đặc biệt vô cùng ngọt ngào. Cốt truyện xoay quanh Lục Cẩn Niên và An Hảo', '2025-03-13', '131300.00', '93400.00', 55, '../uploads/product/1742913816_truyen-tranh-ngon-tinh-hay-5.jpg', '2025-03-25 14:43:36', '2025-04-10 04:57:41'),
(8, ' Thám tử lừng danh Conan (Detective Conan)', 2, 2, 'Thám tử lừng danh Conan chính là bộ truyện tranh trinh thám kinh điển nhất. Hiện nay vẫn chưa có tác phẩm nào sánh được tầm cỡ của bộ truyện này.', '2025-03-05', '98898.00', '89870.00', 990, '../uploads/product/1742913879_conan.jpg', '2025-03-25 14:44:39', '2025-04-10 04:59:06'),
(9, 'Thám tử kindaichi', 2, 2, 'Thám Tử Kindaichi (hay Detective Kindaichi) là một trong những bộ truyện manga trinh thám ly kỳ và hấp dẫn nhất của hai tác giả Kanari Yozaburo hoặc Amagi Seimaru (tùy theo tập).', '2025-03-12', '89888.00', '78700.00', 63, '../uploads/product/1742913930_kindaichi.jpg', '2025-03-25 14:45:30', '2025-04-10 04:59:47'),
(10, 'Học viện thám tử Q (Detective Academy Q)', 2, 2, 'Học viện thám tử Q không chỉ tập hợp những vụ án giết người hàng loạt tinh vi, phức tạp, cách tạo dựng hoàn cảnh, hiện trường cực kỳ logic và hấp dẫn, mà còn đặc tả tâm lý nhân vật vô cùng sắc sảo, ', '2025-03-10', '88898.00', '69767.00', 43, '../uploads/product/1742913986_hoc-vien-tham-tu-q.jpg', '2025-03-25 14:46:26', '2025-04-10 05:00:43'),
(11, 'Monster', 2, 2, 'Truyện tranh Monster là một seinen manga do Naoki Urasawa sáng tác. Truyện được đăng trên tạp chí Big Comic Original của NXB Shogakukan từ năm 1994 đến 2001', '2025-03-14', '78708.00', '76600.00', 341, '../uploads/product/1742914087_monster.jpg', '2025-03-25 14:48:07', '2025-04-10 05:00:59'),
(12, 'Thám tử Q.E.D (Thám tử Toma)', 2, 2, 'Q.E.D là một manga trinh thám rất nổi tiếng của tác giả Katou Motohiro, đăng tải trên tạp chí dài kỳ của NXB Kodansha vào năm 1998.', '2025-03-07', '76766.00', '56550.00', 454, '../uploads/product/1742914162_toma.jpg', '2025-03-25 14:49:22', '2025-04-10 05:01:17'),
(13, 'Mob Psycho 100', 3, 3, 'Hãy tưởng tượng một cậu bé trung học bình thường tên là Kageyama Shigeo - còn được biết đến với cái tên Mob. Nhưng đừng để vẻ ngoài bình thường của cậu ấy đánh lừa bạn, bởi Mob không phải là người bình thường.', '2025-02-23', '78787.00', '66323.00', 234, '../uploads/product/1742914335_mob-psycho-100-281123.jpg', '2025-03-25 14:52:15', '2025-04-10 05:01:31'),
(14, 'Chainsaw Man', 3, 3, '\"Chainsaw Man\" - một bộ truyện kể về cuộc đời đầy sóng gió của Denji, một thanh niên nghèo rớt mồng phải làm việc chân tay cho một tổ chức tội phạm để trả nợ.', '2025-03-15', '77877.00', '66866.00', 565, '../uploads/product/1742914430_chainsaw-man-281123.jpg', '2025-03-25 14:53:50', '2025-04-10 05:02:48'),
(15, 'Jujutsu Kaisen (Chú thuật hồi chiến)', 3, 3, '\"Chú thuật hồi chiến - Jujutsu Kaisen\" là một bộ truyện đưa chúng ta vào cuộc phiêu lưu của Itadori Yuuji - một học sinh trung học sở hữu sức mạnh vật lý đáng kinh ngạc. ', '2025-03-11', '23226.00', '20001.00', 453, '../uploads/product/1742914502_chu-thuat-hoi-chien-281123.jpg', '2025-03-25 14:55:02', '2025-04-10 05:02:09'),
(16, 'The Promised Neverland (Miền đất hứa)', 3, 3, 'Tại một cô nhi viện yên bình tên là Grace Field House, một nhóm trẻ mồ côi sống cuộc sống hạnh phúc dưới sự chăm sóc của người phụ nữ họ gọi là \"Mẹ\".', '2025-03-04', '8888.00', '5555.00', 565, '../uploads/product/1742914643_mien-dat-hua-281123.jpg', '2025-03-25 14:57:23', '2025-03-25 14:57:23'),
(17, 'Death Note', 3, 3, '\"Death Note\" quyện lấy cuộc đời của Yagami Light, một học sinh trung học thiên tài, khi anh tìm thấy một cuốn sổ ghi chép vô cùng quyền năng - \"Death Note\". ', '2025-03-09', '6777.00', '6665.00', 232, '../uploads/product/1742914721_truyen-tranh-death-note-281123.jpg', '2025-03-25 14:58:41', '2025-03-25 14:58:41'),
(18, 'Hibi Chouchou', 4, 4, 'Hibi Chouchou kể về mối tình nhẹ nhàng giữa Suiren Shibazeki, một cô gái xinh đẹp nhưng nhút nhát, và Kawasumi Taichi, một chàng trai trầm lặng, đam mê karate. ', '2025-03-13', '45444.00', '22232.00', 322, '../uploads/product/1742914772_image6_202410051441371025.jpg', '2025-03-25 14:59:32', '2025-03-25 14:59:32'),
(19, 'Last Game', 4, 4, 'Last Game là một bộ manga lãng mạn xoay quanh mối quan hệ giữa Yanagi, một cậu thiếu gia giàu có và thông minh, và Kujou, một cô gái nghèo nhưng học giỏi.', '2025-03-03', '6766.00', '2421.00', 454, '../uploads/product/1742914844_image14_202410051441539983.jpg', '2025-03-25 15:00:44', '2025-03-25 15:00:44'),
(20, 'Gekkan Shojo Nozaki-Kun', 4, 4, 'Gekkan Shoujo Nozaki-kun là một bộ manga hài hước xoay quanh cô nữ sinh Sakura Chiyo, người thầm yêu cậu bạn cùng lớp Nozaki Umetarou.', '2025-03-05', '4544.00', '5353.00', 432, '../uploads/product/1742914902_image8_202410051442113937.jpg', '2025-03-25 15:01:42', '2025-04-04 02:01:15'),
(21, 'ReLIFE', 4, 4, 'ReLIFE là một bộ manga xoay quanh Arata Kaizaki, một người đàn ông 27 tuổi thất bại trong công việc và cuộc sống.', '2025-03-14', '5655.00', '2232.00', 334, '../uploads/product/1742914942_image15_202410051442287285.jpg', '2025-03-25 15:02:22', '2025-03-25 15:02:22'),
(22, 'Ao Haru Ride', 4, 4, 'Ao Haru Ride theo chân cô gái trẻ Yoshioka Futaba, người đã phải thay đổi bản thân để hòa nhập với môi trường xung quanh và tránh bị tổn thương.', '2025-03-26', '78777.00', '63232.00', 433, '../uploads/product/1742914997_image1_202410051442445899.jpg', '2025-03-25 15:03:17', '2025-04-10 05:02:29'),
(23, 'Haikyuu!!', 1, 6, 'Haikyuu!! – Chàng Khổng Lồ Tí Hon là câu chuyện về Hinata Shoyo, một cậu bé tuy có chiều cao khiêm tốn nhưng lại đam mê bóng chuyền mãnh liệt.', '2025-03-07', '76700.00', '60300.00', 343, '../uploads/product/1742915076_image11_202412122205509845.jpg', '2025-03-25 15:04:36', '2025-04-10 05:00:02'),
(24, 'Slam Dunk', 1, 6, 'Slam Dunk là một trong những manga thể thao đỉnh cao về đề tài bóng rổ. Nhân vật chính, Sakuragi Hanamichi, ban đầu là một học sinh nổi tiếng nghịch ngợm và ít quan tâm đến thể thao.', '2025-03-10', '76676.00', '60444.00', 434, '../uploads/product/1742915117_image16_202412122207249326.jpg', '2025-03-25 15:05:17', '2025-04-10 05:00:21'),
(25, 'Major', 1, 6, 'Major là một bộ truyện tranh thể thao nổi tiếng của Nhật Bản về bóng chày, kể về cuộc đời của Honda Gorou, một cậu bé đam mê bóng chày và mong muốn trở thành cầu thủ chuyên nghiệp như cha mình. ', '2025-02-26', '99990.00', '75550.00', 877, '../uploads/product/1742915183_image15_202412122209089375.jpg', '2025-03-25 15:06:23', '2025-04-10 04:58:04'),
(26, 'Kuroko – Tuyển Thủ Vô Hình', 1, 6, 'Kuroko – Tuyển Thủ Vô Hình là một câu chuyện thể thao hấp dẫn xoay quanh đội bóng rổ trường Seirin. ', '2025-03-13', '98888.00', '43330.00', 322, '../uploads/product/1742915232_image6_202412122210218315.jpg', '2025-03-25 15:07:12', '2025-04-10 04:58:20'),
(27, 'Ace of Diamond', 1, 6, 'Ace of Diamond là câu chuyện về Eijun Sawamura, một cầu thủ bóng chày tài năng với phong cách ném bóng độc đáo, khiến bóng di chuyển một cách khó lường.', '2025-03-13', '88755.00', '65556.00', 565, '../uploads/product/1742915273_image10_202412122211308945.jpg', '2025-03-25 15:07:53', '2025-03-25 15:07:53'),
(28, ' Nữ Chính Ngoại Tình Với Vị Hôn Phu Của Tôi', 3, 7, 'Tôi là một nhân vật phản diện trong tiểu thuyết tình cảm. Vốn chỉ là người phụ nữ cao quý được đính hôn với nam chính để tăng sức ảnh hưởng chính trị. Nhưng rồi, tôi phát hiện nữ chính – người đáng lẽ là tình địch của tôi – lại… lén lút ngoại tình với vị hôn phu của tôi phía sau lưng.\r\n\r\nKhi sự thật phơi bày, tôi không còn là kẻ yếu mềm chỉ biết khóc. Tôi quyết định buông bỏ tất cả – vị hôn phu phản bội, vị trí nữ phụ bị ghét bỏ – và bắt đầu trả lại từng món nợ một cách thanh thản, nhưng cũng đầy khí chất.\r\n\r\nAi ngờ rằng... chính từ lúc tôi quay lưng, một người đàn ông khác lại xuất hiện và nói:\r\n“Nếu cô không cần anh ta nữa... thì tôi có thể là vị hôn phu mới của cô.”', '2025-03-10', '40000.00', '12121.00', 12, '../uploads/product/1744262680_Fantasy1.jpg', '2025-04-10 05:21:48', '2025-04-10 05:25:31'),
(29, ' TÁI SINH THÀNH KIẾM SĨ MA THUẬT', 3, 7, 'Một nhân viên văn phòng bình thường-Toru Mizunori, vì một sự cố nên đã rơi vào \"vết nứt không gian\" và gặp chúa.(nói chung là thuộc thể loại isekai:vvv)\r\n\r\nĐộc giả có thể tìm mua ấn phẩm tại các nhà sách hoặc tham khảo bản ebook Tái Sinh Thành Kiếm Sĩ Ma Thuật PDF của tác giả Hiroto Kanou nếu chưa có điều kiện.\r\n\r\nTất cả sách điện tử, ebook trên website dilib.vn đều có bản quyền thuộc về tác giả. Chúng tôi khuyến khích các bạn nếu có điều kiện, khả năng xin hãy mua sách giấy.', '2025-04-03', '80000.00', '70000.00', 13, '../uploads/product/1744263012_Fantasy2.jpg', '2025-04-10 05:30:12', '2025-04-10 05:30:12'),
(30, 'Light Novels - Tặng Hoa Cho Quái Vật Trong Rừng', 3, 7, 'Tặng Hoa Cho Quái Vật Trong Rừng\r\n\r\nCleo là cậu ấm con nhà danh giá với thể chất yếu ớt, tinh thần yếu đuối, và cuộc sống tù túng dưới sự áp chế của người cha khắc nghiệt lạnh lùng cùng sự khinh khi của hầu hết gia nhân.\r\n\r\nMặc dù nhạt nhòa trong thế giới quyền lực danh vọng, nhưng Cleo là một tài năng đang dần nở rộ trong thế giới hội họa. Cuộc sống của cậu đột ngột thay đổi khi gia tộc đẩy cậu vào một thử thách khó khăn - Thử thách Hoa hồng xanh.\r\n\r\nVượt qua các quái vật trong rừng, hái bông hoa về đúng giờ, Cleo sẽ được thừa kế gia sản và tước vị.\r\n\r\nTrái lại, cậu sẽ sống trong áp chế và khinh khi mãi mãi.\r\n\r\nNgay đêm đầu tiên vào rừng, Cleo đã bị tùy tùng bỏ rơi. Nhưng khó khăn lớn nhất là khi cậu bất ngờ rơi vào tay hoa ăn thịt người mang hình hài thiếu nữ khỏa thân. Sinh tồn của Cleo giờ phụ thuộc vào khả năng xoay xở của cậu với bông hoa vô tư nhưng đầy nguy hiểm ấy.\r\n\r\nTặng hoa cho quái vật trong rừng, là ẩn dụ về cuộc gặp gỡ giữa hai thế giới, hai giống loài, và mê hoặc hơn là hành trình khám phá ra màu sắc cuộc sống cùng ý nghĩa thực sự của đời mình.\r\n\r\nRừng già âm u đầy rẫy hiểm nguy lại là nơi nảy nở những giác ngộ quý giá và tình cảm nguyên sơ, làm đổi thay không chỉ cuộc sống của Cleo, mà còn của cả dân chúng, của nếp sống và truyền thuyết bao đời trong vùng.', '2025-04-27', '196000.00', '100000.00', 33, '../uploads/product/1744263289_Fantasy3.jpg', '2025-04-10 05:34:49', '2025-04-10 05:37:25'),
(31, 'Sách - Giải Mã Giấc Mơ - Tauriel -AZB', 3, 7, 'Mọi chuyện bắt đầu từ những giấc mơ.\r\n\r\nGiấc mơ đưa cô sinh viên năm cuối về quá khứ, trong thân phận nàng tiên cá vô tình cứu mạng một người đàn ông bí ẩn đang bị truy lùng ráo riết,\r\n\r\nMột cô gái bình thường có giấc mơ hoàn toàn trùng khớp với cuốn tiểu thuyết trên mạng mà cô chưa từng đọc,\r\n\r\nHai người không quen biết lại tìm thấy nhau qua sự liên hệ lạ lùng của những giấc mơ,\r\n\r\n…\r\n\r\nQuá khứ - tương lai, nhân duyên kiếp này – tiền duyên kiếp trước… Những giấc mơ kì lạ liên tục kéo đến như muốn cảnh báo một điều gì đó. Những hiện tượng kỳ bí, tâm linh liên quan tới giấc mơ diễn ra quanh các nhân vật tưởng chừng không hề quen biết nhau làm xáo trộn cuộc sống của họ. Mối nghiệt duyên kéo dài từ kiếp trước, lỗi lầm hàng trăm năm trời vẫn không thể trả hết… dần hé lộ.\r\n\r\nLiệu có tia hy vọng nào đưa họ thoát khỏi tấn bi kịch đang dần lặp lại một lần nữa không?\r\n\r\n…\r\n\r\nKiếp này hắn không thể ở bên nàng. Kiếp sau, dù có phải xới tung cả giang sơn bốn bề này lên, hắn cũng sẽ tìm được nàng.', '2025-04-12', '86000.00', '70000.00', 4, '../uploads/product/1744263723_Fantasy4.png', '2025-04-10 05:41:43', '2025-04-10 05:48:47'),
(32, ' Fantastic Beasts: The Wonder Of Nat', 3, 7, 'Prepare to pore over ancient maps of sea monsters; naturalists\' field notes crammed with intricately painted chameleons and caterpillars; and dinosaurs such as the mighty Dracorex Hogwartsia, the \'Dragon King of Hogwarts\'. The Natural History Museum boasts one of the finest collections in the world - some 80 million animals, plants, minerals, rocks and fossils. These scientific specimens sit beside breathtaking artwork of J.K. Rowling\'s magical creatures; fascinating props and artefacts from the Fantastic Beasts and Harry Potter films; and stunning wildlife photography. Readers are invited to meet unicorns and merpeople, Nifflers and Bowtruckles, pythons and tigers, and observe their amazing and endlessly surprising behaviours.\r\n\r\n\r\n\r\nChuẩn bị để lỗ chân lông trên các bản đồ cổ của quái vật biển; Các ghi chú hiện trường của các nhà tự nhiên học nhồi nhét với tắc kè hoa và sâu bướm được sơn phức tạp; và những con khủng long như The Mighty Dracorex Hogwartsia, \'Vua rồng của Hogwarts\'. Bảo tàng Lịch sử Tự nhiên tự hào là một trong những bộ sưu tập tốt nhất trên thế giới - khoảng 80 triệu động vật, thực vật, khoáng sản, đá và hóa thạch. Những mẫu vật khoa học này ngồi bên cạnh tác phẩm nghệ thuật ngoạn mục của J.K. Sinh vật ma thuật của Rowling; Đạo cụ và đồ tạo tác hấp dẫn từ các bộ phim Fantastic Beasts và Harry Potter; và chụp ảnh động vật hoang dã tuyệt đẹp. Độc giả được mời gặp kỳ lân và merpeople, nifflers và bowtruckles, trăn và hổ, và quan sát những hành vi tuyệt vời và đáng ngạc nhiên của họ.', '2020-07-10', '643000.00', '500000.00', 3, '../uploads/product/1744264010_Fantasy5.jpg', '2025-04-10 05:46:50', '2025-04-10 05:46:50'),
(33, 'Sách Kinh Dịch Trọn Bộ', 3, 8, 'Dịch là biến đổi, tức là tùy thời biến đổi để theo Đạo. Nó là thứ sách rộng lớn đầy đủ, hầu thuận theo lẽ số mệnh (tính mệnh này chỉ về tính chất số mệnh, không phải chữ tính mệnh chỉ về sinh mạng), thông đạt cớ u minh, hiểu hết tình trạng muôn vật mà bảo những cách mở mang các vật, làm thành các việc.\r\n\r\n\r\n\r\nKhổng Tử đã từng nói: “Nếu cho tôi sống thêm vài năm nữa, thì cho dù 50 tuổi học Kinh Dịch cũng không phải là sai lầm”.\r\n\r\n\r\n\r\nCó thể nói, Kinh Dịch là một trước tác kinh điển lâu đời nhất, kết tinh trí tuệ của văn hóa Trung Hoa cổ đại. Kinh Dịch phát hiện tính quy luật và phương pháp nhận thức, dự đoán, xử lý sự vật, và với ý nghí nghĩa phương pháp luận này, nó có ảnh hưởng quan trọng đối với nhiều lĩnh vực như triết học, khoa học xã hội, văn hóa nghệ thuật… của Trung Quốc từ xưa đến nay.\r\n\r\n\r\n\r\nTrong Kinh Dịch có 384 hào, có nghĩa là có 384 lời khuyên hữu ích.\r\n\r\n\r\n\r\nLật mở từng trang sách, bạn sẽ có cảm giác nhẹ nhàng, khoan khoái, bạn hẳn sẽ không nghĩ rằng quản lý trong học thuật truyền thống lại được viết ra gần gũi, dễ hiểu đến thế. Ở đó, bạn không hề thấy bất kỳ hơi thở nào mang âm hưởng nghiên cứu Nho giáo, càng không hề thấy chỗ nào khó hiểu cả. Đáng quý hơn là, bạn sẽ thấy mỗi một điểm trong cuốn sách này đều liên quan mật thiết đến công việc của bản thân mình. Mỗi một quan điểm, mỗi một kiến giải trong đó đều giúp chúng ta thoát ra khỏi khó khăn và cản trở để trưởng thành trong công việc.', '2025-04-24', '129000.00', '150000.00', 5, '../uploads/product/1744268196_kinhdi1.jpg', '2025-04-10 06:56:36', '2025-04-10 06:56:36'),
(34, 'Sách Kinh Dịch Trọn Bộ 2', 3, 8, 'Khổng Tử đã từng nói: “Nếu cho tôi sống thêm vài năm nữa, thì cho dù 50 tuổi học Kinh Dịch cũng không phải là sai lầm”. Có thể nói, Kinh Dịch là một trước tác kinh điển lâu đời nhất, kết tinh trí tuệ của văn hóa Trung Hoa cổ đại. Kinh Dịch phát hiện tính quy luật và phương pháp nhận thức, dự đoán, xử lý sự vật, và với ý nghí nghĩa phương pháp luận này, nó có ảnh hưởng quan trọng đối với nhiều lĩnh vực như triết học, khoa học xã hội, văn hóa nghệ thuật… của Trung Quốc từ xưa đến nay. Trong Kinh Dịch có 384 hào, có nghĩa là có 384 lời khuyên hữu ích. Lật mở từng trang sách, bạn sẽ có cảm giác nhẹ nhàng, khoan khoái, bạn hẳn sẽ không nghĩ rằng quản lý trong học thuật truyền thống lại được viết ra gần gũi, dễ hiểu đến thế. Ở đó, bạn không hề thấy bất kỳ hơi thở nào mang âm hưởng nghiên cứu Nho giáo, càng không hề thấy chỗ nào khó hiểu cả. Đáng q...', '2013-04-06', '310000.00', '378000.00', 3, '../uploads/product/1744268462_kinhdi2.jpg', '2025-04-10 07:01:02', '2025-04-10 07:01:02'),
(35, 'Những Kẻ Ăn Sách', 3, 8, 'Ngoài Yorkshire Moors, có một tộc người bí mật coi sách là thức ăn và lưu giữ mọi nội dung của cuốn sách trong đầu sau khi ăn nó. Đối với họ, tiểu thuyết gián điệp là một món ăn nhẹ; tiểu thuyết lãng mạn là một món ngon ngọt ngào. Ăn bản đồ có thể giúp họ nhớ các điểm đến và trẻ em, khi chúng cư xử không đúng mực, buộc phải ăn những trang từ điển khô khốc, mốc meo.\r\n\r\nDevon là một phần của Gia đình ấy, một gia tộc ăn sách lâu đời và ẩn dật. Các anh trai của cô lớn lên và say sưa với những câu chuyện về lòng dũng cảm và phiêu lưu, còn Devon - giống như tất cả những người phụ nữ thích ăn sách khác - được nuôi dưỡng bằng chế độ ăn kiêng tuyển chọn cẩn thận gồm những câu chuyện cổ tích và những câu chuyện cảnh báo.\r\n\r\nNhưng cuộc sống thực không phải lúc nào cũng có kết thúc có hậu, khi Devon biết được điều đó lúc đứa con trai do cô sinh ra sở hữu niềm khao khát hiếm gặp và đen tối hơn - thằng bé không thích ăn sách, mà muốn gặm nhấm tâm hồn con người.', '2025-04-01', '200000.00', '229000.00', 4, '../uploads/product/1744268637_kinhdi3.jpg', '2025-04-10 07:03:57', '2025-04-10 07:03:57'),
(36, 'Sách Kinh Dị Đặc Sắc Bức Tranh Kỳ Quái', 3, 8, 'Bức tranh cô gái đứng trong gió được đăng tải trên một trang blog nọ, lại có Bức tranh bị nhòe và bóng mờ bao phủ căn hộ do một đứa bé bị mất tích vẽ, còn cả Bức tranh phong cảnh đồi núi với những nét vẽ run rẩ\r\nNhững bức tranh vẽ tưởng chừng như vô thưởng vô phạt, cũng chẳng hề liên quan gì đến Tất cả tổng cộng 9 bức tranh vẽ tay ẩn chứa những “câu đố bí ẩn” chờ đợi được giải mã.\r\nRốt cuộc những người vẽ ra chúng đã muốn truyền tải thông điệp gì?\r\nSự thật chấn động nào được chôn giấu phía sau 9 bức vẽ kỳ lạ ấy?\r\nSẽ ra sao khi những mảnh ghép bí ẩn rời rạc nọ bỗng dưng được xâu chuỗi lại và liên kết với nhau để mở ra một cái kết chẳng thể ngờ tới?', '2013-01-30', '130000.00', '142000.00', 6, '../uploads/product/1744268794_kinhdi4.jpg', '2025-04-10 07:06:34', '2025-04-10 07:06:34'),
(37, 'Người Dọn Phòng', 3, 8, '\r\n\r\nMolly Gray không giống những người khác. Cô luôn phải chật vật với những kỹ năng giao tiếp xã hội và luôn hiểu sai ý người khác. Bà cô từng là người giúp cô phiên dịch thế giới này, hệ thống hóa lại nó thành những quy tắc đơn giản mà Molly có thể áp dụng được.\r\n\r\n\r\n\r\nVà rồi, kể từ khi bà cô qua đời vài tháng trước, người con gái hai mươi lăm tuổi ấy lại phải một mình chèo chống hết những phức tạp của cuộc đời. Thế nhưng, chẳng sao cả… cô vẫn cứ say sưa lao mình vào công việc với tư cách là một nhân viên dọn phòng tại khách sạn. Mỗi buổi sáng, cô đều thấy thích thú khi được khoác lên mình bộ đồng phục chỉnh tề, chất đầy những chai lọ cùng những bánh xà phòng nho nhỏ vào xe đẩy của mình và trả các phòng nghỉ tại khách sạn Regency Grand về lại với trạng thái hoàn hảo của chúng.\r\n\r\n\r\n\r\nThế nhưng, cuộc sống nền nếp của Molly bỗng chốc bị đảo lộn vào cái ngày cô bước chân vào phòng suite của ông trùm giàu có và khét tiếng Charles Black, chỉ để nhận ra nó đã bị xáo trộn, còn bản thân ông Black thì đang nằm chết ngay trên giường. Trước khi kịp hiểu được chuyện gì đang xảy ra, thái độ bất thường của Molly đã khiến phía cảnh sát quay sang chĩa mũi nhọn vào cô, coi cô là nghi phạm chính của vụ án. Molly phải làm sao để thoát khỏi rắc rối này?', '2025-03-31', '83000.00', '90000.00', 9, '../uploads/product/1744268889_kinhdi5.png', '2025-04-10 07:08:09', '2025-04-10 07:08:09'),
(38, 'Động Lực Chèo Lái Hành Vi - Sự thật kinh ngạc về những động cơ thúc đẩy hành động của con người', 3, 9, 'Hãy quyên đi những thứ mà bạn cho rằng mình hoàn toàn thấu hiểu về cách thức tạo động lực thúc đẩy con người trong công việc, học tập hay tại chính gia đình. Chúng ta đều sai hết cả. Trong cuốn sách Động lực chèo lái hành vi, Daniel H. Pink đã trình bày những sự thật gây choáng váng.\r\nDựa trên những nghiên cứu về động lực thúc đẩy con người được thực hiện trong bốn thập kỷ qua, Pink đã chỉ ra những khác biệt giữa lý thuyết với thực tế - cũng như tác động của chúng ta tới cuộc sống của chúng ta. Ông đã chứng minh rằng, mặc dù đã làm mưa làm gió suốt thế kỷ XX, phương pháp cũ rích Củ cà rốt và cây gậy không còn phù hợp để thúc đẩy mọi người vượt qua những thử thách trong thời đại ngày nay.\r\nTrong Động lực chèo lái hành vi, ông nêu ra ba yếu tố tạo ra động lực thực sự:\r\n- Tự chủ - khao khát được làm chủ cuộc sống của chính mình.\r\n- Thành thạo - niềm thôi thúc không ngừng hoàn thiện và bổ sung kiến thức về các vấn đề bất kỳ.\r\n- Lý tưởng - khao khát được cống hiến không vì bản thân mình.\r\nĐộng lực chèo lái hành vi đưa ra nhiều ý tưởng đột phá - một cuốn sách hiếm hoi thực sự sẽ làm thay đổi tư duy cũng như cuộc sống của bạn.\r\n', '2025-04-29', '100000.00', '111111.00', 2, '../uploads/product/1744269051_hanhdong1.jpeg', '2025-04-10 07:10:51', '2025-04-10 07:10:51'),
(39, ' Chính sách ưu đãi của Fahasa Thời gian giao hàng :  Giao nhanh và uy tín Chính sách đổi trả :  Đổi trả miễn phí toàn quốc Chính sách khách sỉ :  Ưu đãi khi mua số lượng lớn Dám Hành Động', 3, 9, 'Một cái nhìn “người trong cuộc” về hành trình chiến đấu chống lại cuộc khủng hoảng kinh tế chỉ đứng sau Đại Khủng hoảng về quy mô.\r\n\r\nNăm 2006, Ben S. Bernanke được bổ nhiệm làm Chủ tịch Cục Dự trữ Liên bang (FED), đỉnh cao bất ngờ của hành trình cá nhân từ thị trấn nhỏ Nam Carolina đến những cuộc gặp gỡ học thuật uy tín và cuối cùng là dịch vụ công tại hội trường quyền lực của Washington.\r\n\r\nLàm việc dưới hai thời tổng thống đúng vào thời điểm nền kinh tế Mỹ đang rơi vào khủng hoảng tài chính trầm trọng, Ben S. Bernanke đã dẫn dắt FED – và cùng các đồng nghiệp trong Bộ Tài chính ổn định thành công một hệ thống tài chính đang lên. Với sự sáng tạo và quyết đoán, họ đã ngăn chặn sự sụp đổ kinh tế ở quy mô không tưởng và tiếp tục xây dựng các chương trình không chính thống giúp vực dậy nền kinh tế Mỹ và trở thành mô hình cho các quốc gia khác.\r\n\r\nMột cuốn sách súc tích, chi tiết, đáng đọc đối với bất cứ ai quan tâm đến tài chính và kinh tế.\r\n\r\nBen S. Bernanke đảm nhiệm vị trí Chủ tịch của Cục Dự trữ Liên bang (FED) từ năm 2006 đến năm 2014. Ông được tạp chí Time vinh danh là “Nhân vật của năm” vào năm 2009. Trước khi gắn bó với sự nghiệp dịch vụ công, ông là Giáo sư Kinh tế tại Đại học Princeton.', '2025-04-01', '200000.00', '210000.00', 3, '../uploads/product/1744269145_hanhdong2.jpg', '2025-04-10 07:12:25', '2025-04-10 07:12:25'),
(40, 'Sách Hành Trình Về Phương Đông ', 3, 9, 'Hành trình về phương đông là một cuốn sách chứa đựng những triết lý sống cao đẹp, giúp bạn tìm những giá trị bên trong con người mình. Tác giả của cuốn sách Dr. Blair Thomas Spalding và được dịch lại bởi Nguyên Phong. Tác phẩm có tất cả 6 quyển ghi nhận đầy đủ về cuộc hành trình huyền bí và hấp dẫn ở Ấn độ, Tây Tạng, Trung Hoa, Ba tự Ba, quyển đầu ghi lại những cuộc thám hiểm của phái đoàn từ Anh sang Ấn, sự gặp gỡ giữa phái đoàn và những vị thầy tâm linh sống ở Á châu, và ở dãy Hy Mã Lạp Sơn. Đây là một cuốn sách tuyệt với đối với ai thích tìm hiểu về chuyện tâm linh, huyền bí, phật giáo. Bạn sẽ khám phá ra rất nhiều điều thú vị trong cuốn sách này.', '2025-04-06', '80000.00', '80000.00', 6, '../uploads/product/1744269291_hanhdong3.jpg', '2025-04-10 07:14:20', '2025-04-10 07:14:51'),
(41, 'Kỷ Luật Bản Thân - Sức Mạnh Lớn Từ Hành Động Nhỏ', 3, 9, 'Bạn có bao giờ tự hỏi làm thế nào có những người có thể đạt được nhiều thành công như vậy? Làm cách nào họ vượt qua những thất bại và căng thẳng? Rõ ràng là họ không được trao sức mạnh đặc biệt nào để hóa phép ra mọi thứ. Nhưng bí quyết của họ nằm ở ngay trong cuốn sách này: KỶ LUẬT BẢN THÂN – SỨC MẠNH LỚN TỪ HÀNH ĐỘNG NHỎ.\r\n Cuốn sách sẽ tiết lộ những khái niệm đã biến đổi một số doanh nhân thành công nhất thế giới, từ trạng thái choáng ngợp đến vô vọng. Hãy tưởng tượng bạn thức dậy mà không có nỗi lo lắng nào của ngày hôm qua, chỉ có động lực để thành công ngày hôm nay. Hãy giành lại những ngày thứ Hai của bạn, tăng năng suất, làm việc ít hơn nhưng hiệu quả và tạo ra những kết quả vững chắc nhờ sự trợ giúp của cuốn sách trong tay. Bây giờ bạn đã có bí mật về tư duy phù hợp với mình, bạn có thể làm chủ sự tập trung của mình và bắt đầu làm được nhiều việc hơn trong 24 giờ mỗi ngày.\r\n\r\n Trong cuốn sách KỶ LUẬT BẢN THÂN – SỨC MẠNH LỚN TỪ HÀNH ĐỘNG NHỎ, bạn sẽ tìm thấy:\r\n\r\n- Cách tiếp cận xác định xem thời gian đáng giá bao nhiêu.\r\n\r\n- Hạn chế làm việc quá sức: tạo lịch trình ngắn gọn và có chiến lược ủy quyền hiệu quả, tập trung vào điểm mạnh của bạn. Cân bằng giữa công việc và cuộc sống để đảm bảo năng suất. Rời xa những triển vọng không dẫn đến đâu.\r\n\r\n- Kế hoạch hành động & thói quen thành công để bắt đầu tuần mới hiệu quả. Tìm hiểu các kỹ thuật sẽ đưa bạn lên vị trí dẫn đầu. Tránh phiền nhiễu bằng cách nói KHÔNG mà không cảm thấy tội lỗi.', '2025-01-08', '123000.00', '129000.00', 3, '../uploads/product/1744269413_hanhdong4.jpg', '2025-04-10 07:16:53', '2025-04-10 07:16:53'),
(42, 'Hành Động Ngay - 7 Ngày Chinh Phục Trì Hoãn Và Tái Tạo Động Lực Phi Thường', 3, 9, 'Hành Động Ngay - 7 Ngày Chinh Phục Trì Hoãn Và Tái Tạo Động Lực Phi Thường\r\n\r\nĐối tượng mục tiêu của sách Hành động ngay - 7 ngày chinh phục trì hoãn và tái tạo động lực phi thường:\r\n\r\n- Cá nhân trong nhiều lĩnh vực: Cuốn sách này có thể hữu ích cho bất kỳ ai gặp khó khăn trong việc bắt đầu thực hiện nhiệm vụ\r\n\r\n- Mức độ trì hoãn: Sách phù hợp với những người có mức độ trì hoãn từ nhẹ đến trung bình. Nếu bạn đã hình thành thói quen trì hoãn nặng nề, bạn có thể cần một phương pháp tiếp cận chuyên sâu hơn kết hợp với cuốn sách này.\r\n\r\n- Độc giả hướng đến hành động: Cuốn sách này lý tưởng cho những người thích các bước thực tế hơn lý thuyết dài dòng. Sách cung cấp các bài tập rõ ràng và kế hoạch có cấu trúc để thực hiện ngay lập tức.\r\n\r\n- Cởi mở với việc tự phản chiếu: Sách khuyến khích nhận thức về bản thân và hiểu lý do đằng sau sự trì hoãn. Nếu bạn cởi mở để suy ngẫm về thói quen và kiểu suy nghĩ của mình, cuốn sách này có thể là một công cụ đắt giá.\r\n\r\nĐộ tuổi: Người trưởng thành trẻ (18-35) và những người chuyên nghiệp có thể đang phải loay hoay với công việc, học tập và cuộc sống cá nhân, dẫn đến cảm giác choáng ngợp và khó tập trung.\r\n\r\nNghề nghiệp: Sinh viên, doanh nhân, người làm việc tự do và bất kỳ ai dựa vào khả năng tập trung và hoàn thành nhiệm vụ hiệu quả.\r\n\r\nSở thích: Những người quan tâm đến phát triển bản thân, mẹo tăng năng suất và chiến lược tự cải thiện.\r\n\r\n=> Nhìn chung, \"Hành động tức thì\" là một lựa chọn tốt cho bất kỳ ai muốn có một hướng dẫn thực tế và dễ tiếp cận để vượt qua sự trì hoãn và hành động theo mục tiêu của họ.', '2025-02-03', '38000.00', '40000.00', 12, '../uploads/product/1744269536_hanhdong5.jpg', '2025-04-10 07:18:56', '2025-04-10 07:18:56'),
(43, 'Nhà Giả Kim', 3, 10, 'Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người.\r\n\r\nTiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.\r\n\r\n“Nhưng nhà luyện kim đan không quan tâm mấy đến những điều ấy. Ông đã từng thấy nhiều người đến rồi đi, trong khi ốc đảo và sa mạc vẫn là ốc đảo và sa mạc. Ông đã thấy vua chúa và kẻ ăn xin đi qua biển cát này, cái biển cát thường xuyên thay hình đổi dạng vì gió thổi nhưng vẫn mãi mãi là biển cát mà ông đã biết từ thuở nhỏ. Tuy vậy, tự đáy lòng mình, ông không thể không cảm thấy vui trước hạnh phúc của mỗi người lữ khách, sau bao ngày chỉ có cát vàng với trời xanh nay được thấy chà là xanh tươi hiện ra trước mắt. ‘Có thể Thượng đế tạo ra sa mạc chỉ để cho con người biết quý trọng cây chà là,’ ông nghĩ.”', '2025-03-31', '67000.00', '70000.00', 21, '../uploads/product/1744269715_phuluu1.jpg', '2025-04-10 07:21:55', '2025-04-11 01:52:26'),
(44, 'Đảo Giấu Vàng ', 3, 10, 'Robert Louis Stevenson (1850-1894) là nhà văn người Scotland. Ông học ngành khoa học, đỗ kỹ sư, được huy chương bạc về một sáng kiến kỹ thuật. Nhưng đó chỉ là vốn kiến thức chung để giúp ông đi vào ngành mà trái tim ông đã chọn: viết văn. Stevenson được nhiều người mến phục vì tinh thần phấn đấu chống lại bệnh tật với sự vui vẻ và lòng can đảm. Ông cho ra đời nhiều tác phẩm NXB Văn Học nổi tiếng, trong đó có tiểu thuyết Đảo giấu vàng.\r\n\r\n\r\n\r\nMột hòn đảo chơi vơi giữa biển, đêm ngày ầm ầm sóng vỗ, bỗng có một sức lôi cuốn kỳ diệu chỉ vì nó giấu trong lòng một kho vàng do băng cướp của viên thuyền trưởng Flint cất giấu. Ai sẽ đoạt được kho vàng, bọn cướp còn lại trong các băng của Flint hay là những người khác? Việc trước hết, có ý nghĩa quyết định là tìm ra được nơi Flint chôn giấu kho vàng, và tấm bản đồ chỉ nơi cất giấu lại tình cờ rơi vào tay chú thiếu niên nghèo, dũng cảm, thông minh hào hiệp, tên là Jim Haokinx. Câu chuyện phiêu lưu đến Đảo giấu vàng cũng bắt đầu từ đây...', '2025-03-17', '60000.00', '70000.00', 18, '../uploads/product/1744269916_phuluu2.jpg', '2025-04-10 07:25:16', '2025-04-10 07:25:16'),
(45, 'Sách Đất Rừng Phương Nam ', 3, 10, 'Cuộc đời lưu lạc của chú bé An qua những miền đất rừng phương Nam thời kì đầu cuộc kháng chiến chống Pháp. Một vùng đất trù phú, đa dạng, kì vĩ với những kênh rạch, tôm cá, chim chóc, muông thú, lúa gạ và cây cối, rừng già. Trong thế giới đó có những con người vô cùng nhân hậu như cha mẹ nuôi của bé An, như cậu bé Cò, chú Võ Tò cùng những người anh em giàu lòng yêu quê hương, đất nước. Cuộc sống tự do và cuộc đời phóng khoáng cởi mở đã để lại ấn tượng sâu sắc trong tâm khảm người đọc nhiều thế hệ suốt những năm tháng qua.\r\n\r\n\r\n\r\nCái chất thơ mà Đoàn Giỏi gửi vào từng trang bút ký, vốn bắt nguồn từ tình yêu đối với mảnh đất và con người Nam Bộ và được thể hiện trong từng chi tiết miêu tả, trong ngôn ngữ và tính cách nhân vật. Cái “chất liệu Miền Nam” ấy đã đem tới nền văn học của chúng ta trong những năm 50, 60 ngày ấy một sự khởi sắc đầy ấn tượng mới mẻ, hấp dẫn, một thứ bổ sung cho cách nhìn về con người và thiên nhiên vùng đất phương Nam.', '2025-02-17', '80000.00', '80000.00', 96, '../uploads/product/1744270064_phuluu3.jpg', '2025-04-10 07:27:44', '2025-04-10 07:27:44'),
(46, 'Sách - Bộ Hộp Tây Du Ký ', 3, 10, 'ây du ký là một trong những tác phẩm kinh điển trong văn học Trung Hoa. Tác phẩm tổng cộng\r\n\r\n\r\n\r\ncó một trăm hồi, ra đời vào năm Vạn Lịch thứ 29 (1601), triều Minh, do Ngô Thừa Ân (1500\r\n\r\n\r\n\r\nhoặc 1506 - 1581), tự Nhữ Trung, hiệu Xạ Dương Sơn Nhân sáng tác ra.\r\n\r\n\r\n\r\nTây du ký được xem là tác phẩm văn học đạt đến độ mẫu mực, đứng trong 4 tác phẩm văn học cổ điển vĩ đại nhất của Trung Hoa, gọi là Tứ đại danh tác (cùng với Tam Quốc Diễn Nghĩa của La Quán Trung, Thủy Hử của Thi Nại Am và Hồng Lâu Mộng của Tào Tuyết Cần).\r\n\r\n\r\n\r\nTiểu thuyết kể về hành trình của Trần Huyền Trang đến Tây Trúc (Ấn Độ) để thỉnh kinh. Theo ông là ba đệ tử: Tôn Ngộ Không một tên khỉ do đá sinh ra; Trư Ngộ Năng hay còn gọi là Trư Bát Giới; Sa Ngộ Tĩnh hay còn gọi là Sa Tăng, cùng đồng hành đi phò tá thỉnh kinh. Bên cạnh đó, con ngựa mà Trần Huyền Trang cưỡi cũng là một nhận vật do hoàng tử của Long Vương (Bạch Long Mã) hóa thành.\r\n\r\n\r\n\r\nNhững chương đầu thuật lại những kì công của Tôn Ngộ Không, từ khi ra đời từ một hòn đá ở biển Hoa Đông , xưng vương ở Hoa Quả Sơn, tầm sư học đạo, đại náo thiên cung, sau đó bị Phật Tổ Như Lai bắt nhốt trong núi Ngũ Hành 500 năm. Truyện kể lại Huyền Trang trở thành một nhà sư ra sao và được hoàng đế nhà Đường gửi đi thỉnh kinh sau khi hoàng đế thoát chết.\r\n\r\n\r\n\r\nPhần tiếp của câu chuyện kể về các hiểm nguy mà thầy trò Đường Tam Tạng phải đối đầu, trong đó nhiều yêu quái là đồ đệ của các vị Tiên, Phật. Một số yêu tinh muốn ăn thịt Huyền Trang, một số khác muốn cám dỗ họ bằng cách biến thành đàn bà đẹp. Tôn Ngộ Không phải sử dụng phép thuật và quan hệ của mình với thế giới yêu quái và Tiên, Phật để đánh bại các kẻ thù nhiều mánh khóe, như Ngưu Ma Vương hay Thiết Phiến Công chúa...\r\n\r\n\r\n\r\nTác phẩm Tây Du Ký đúc kết lên một triết lí nhân sinh, rằng con người có thể chinh phục mọi thứ nếu có sự đoàn kết, ý chí và sức mạnh.', '2025-03-17', '50000.00', '500000.00', 12, '../uploads/product/1744270302_phuluu4.jpg', '2025-04-10 07:31:42', '2025-04-10 07:31:42'),
(47, ' Anh Chàng Hobbit', 3, 10, 'GIỚI THIỆU SÁCH\r\n\r\nBilbo Baggins là một hobbit điển hình. Anh chàng chỉ thấy thú nhất khi được ngồi bên lò sưởi mà hút tẩu, uống bia, chờ đến giờ ăn, và đừng hòng có chuyện tham gia chuyến mạo hiểm nào hay làm điều gì bất ngờ. Nhưng Bilbo không được yên, chẳng bao lâu sẽ có một lão phù thủy tên Gandalf cùng mười ba chú lùn xuất hiện ở ngưỡng cửa hang hobbit tiện nghi của chàng, và chưa kịp vớ vội mũ mão với khăn tay, Bilbo đã bị cuốn vào một cuộc phiêu lưu đầy rẫy hiểm nguy để giành lại kho vàng của người lùn vốn từ lâu đã chìm trong quên lãng….\r\n\r\n\r\n\r\nLà tác phẩm dạo đầu nhưng không hề bị lu mờ dưới cái bóng đồ sộ của bộ ba kiệt tác Chúa nhẫn, Anh chàng hobbit xứng đáng là cuốn sách thiếu nhi kinh điển có một tầm vóc riêng biệt. Mang giọng kể hài hước, thông tuệ, cùng những miêu tả choáng ngợp về một thế giới Trung Địa bao la với rừng thẳm, núi cao, hang sâu, tiên, rồng, yêu tinh, người khổng lồ, cuốn sách vừa như một câu chuyện cổ tích dành cho những người trẻ tuổi, vừa đạt đến tầm của một tác phẩm văn học kỳ ảo quyến rũ độc giả mọi thời. Chính Anh chàng hobbit, chứ không phải Chúa nhẫn, đã đặt những viên gạch đầu tiên cho sự phát triển của dòng tiểu thuyết kỳ ảo hiện đại trong thế kỷ XX', '2025-02-19', '119000.00', '119000.00', 34, '../uploads/product/1744270451_phuluu5.jpg', '2025-04-10 07:34:11', '2025-04-10 07:34:11'),
(48, 'Năng Lực Hài Hước', 3, 11, 'Có lẽ không ít lần bạn bị cuốn vào mạch cảm xúc của những câu chuyện hài hước, hấp dẫn của một ai đó bởi cách nói chuyện, diễn đạt vui vẻ, hài hước của họ. Và sau mỗi lần như vậy, bạn lại ngầm so sánh với bản thân, không biết làm sao cho cách nói chuyện trở nên bớt nhạt nhẽo, vô số lần rơi vào các tình huống kiểu như: \r\n\r\nTrong bữa tiệc mọi người đều vui vẻ phấn khởi, sôi nổi rộn ràng nhưng bạn lại ngồi một mình “ngậm tăm”, mãi mới đủ can đảm nói một câu thì khung cảnh vốn dĩ náo nhiệt lại trở nên tẻ nhạt, bạn cũng lúng túng đến chẳng còn mặt mũi.\r\n\r\nHoặc khi bạn đến chỗ làm mới, muốn giới thiệu bản thân nhưng nói xong họ tên liền mặt đỏ như gấc, không nói thêm được lời nào. Khi báo cáo công việc, trong khi các đồng nghiệp khác ăn nói đĩnh đạc bạn lại câm như hến, đầu óc trống rỗng.\r\n\r\nĐừng lo lắng, rất nhiều phiền não từ nhỏ nhặt đến lớn lao bạn gặp phải trong cuộc sống đều có thể được giải tỏa khi bạn là một người có khiếu hài hước. Như nhà văn Anh William Makepeace Thackeray từng nói: “Hài hước là phục sức đẹp đẽ nhất mà bạn khoác lên người khi xã giao”.\r\n\r\nTuy nhiên, nhiều người lại cho rằng hài hước chỉ có được từ bẩm sinh, thật ra không phải vậy. Hài hước có thể rèn luyện theo thời gian thông qua quá trình giao tiếp, nói chuyện với mọi người. Và nếu bạn muốn cải thiện loại năng lực này, trở thành một người hài hước, đi tới đâu cũng mang theo một khí chất được chào đón, để lại ấn tượng sâu sắc thì đây là cuốn sách dành cho bạn.\r\n\r\n“Năng lực hài hước”, sẽ giúp bạn từng bước xây dựng nên một con người ấn tượng, đạt được đến đỉnh cao của giao tiếp, biến bản thân trở thành “trung tâm”, từ các cuộc họp mặt gia đình, bạn bè, đồng nghiệp cho đến các bài diễn thuyết trước công chúng. Bạn cũng không còn phải lo thiếu “gia vị” cho những câu chuyện của mình, hiểu thế nào mới là hài hước thực sự, đúng lúc và đúng chỗ, ứng biến phù hợp trong từng hoàn cảnh.\r\n\r\nLoại năng lực này giống như một thói quen, nếu bạn dùng nó thường xuyên, sự thông minh dí dỏm thực sự có thể hòa vào gen của bạn đó. Hy vọng cuốn sách sẽ góp phần mang lại một diện mạo mới cho cuộc sống của bạn nhờ vào năng lực hài hước này.', '2025-03-31', '96000.00', '96000.00', 32, '../uploads/product/1744272294_hai1.jpg', '2025-04-10 08:04:54', '2025-04-10 08:04:54'),
(49, 'Sự thông minh trong hài hước: Nói tinh tế, dễ vào tim', 3, 11, '“Hài hước là một nghệ thuật sống và là biểu hiện của trí tuệ.” Những người hài hước luôn biết cách phá vỡ các quy tắc thông thường, giải quyết vấn đề một cách bất ngờ và nhờ đó mà tháo gỡ được mọi hiểu lầm hoặc mẫu thuẫn.\r\n\r\nCuốn sách Sự Thông Minh Trong Hài Hước kết hợp giữa lý thuyết và các ví dụ, giúp bạn đọc dễ dàng hiểu được làm thế nào để cuộc sống trở nên thú vị hơn, làm thế nào để tạo thêm nhiều hứng thú cho cuộc sống. Bizbooks tin rằng sau khi đọc xong cuốn sách, mỗi độc giả đều có thể trở thành một người thú vị hơn về mặt ngôn ngữ, cuộc sống lẫn tinh thần. Hãy để niềm vui được kết nối chặt chẽ với cuộc sống của bạn, hãy để bản thân và mọi người xung quanh cùng cảm thấy hạnh phúc!', '2025-03-31', '139000.00', '139000.00', 39, '../uploads/product/1744272383_hai2.jpg', '2025-04-10 08:06:23', '2025-04-10 08:06:23'),
(50, 'Ông nội vượt ngục', 3, 11, 'Trong quyển sách này, tác giả muốn gửi đến đọc giả chuyến \"vượt ngục\" ly kỳ của hai ông cháu trong câu chuyện. Giọng văn tình cảm, dí dỏm, nét vẽ đáng yêu… nhằm giúp các em tiếp nhận và thẩm thấu nhanh nhất.\r\n\r\n\r\n\r\nCâu chuyện đem lại những bài học hay về lối sống trung thực, về tình yêu thương gia đình và nhiều điều cần thiết để phát triển nhân cách cho bạn đọc trẻ tuổi, cũng như những bất ngờ thú vị cho cả người đọc trưởng thành', '2025-04-01', '120000.00', '120000.00', 65, '../uploads/product/1744272783_hai3.jpg', '2025-04-10 08:13:03', '2025-04-10 08:15:55'),
(51, 'Tình Yêu Cuồng Nhiệt', 3, 11, 'Là bậc thầy của ngòi bút châm biếm, Aziz Nesin soi vào mọi ngóc ngách hiện thực Thổ Nhĩ Kỳ, khiến cho sự thực hiện lên dị dạng, gây tiếng cười hóm hỉnh nhưng thức tỉnh lương tri người đọc hướng đến một xã hội công bằng và tốt đẹp hơn. Vì thế, ông nổi tiếng thế giới như một nhà văn chân chính, từng vào tù, bị mưu hại nhưng vẫn kiên cường đấu tranh cho lý tưởng nhân văn và yêu mến con người cho đến cuối cuộc đời mình.', '2025-04-06', '69000.00', '69000.00', 12, '../uploads/product/1744272920_hai4.webp', '2025-04-10 08:14:25', '2025-04-10 08:15:20'),
(52, 'Lời Vàng Của Bố ', 3, 11, 'Tác giả cuốn sách Justin Samuel Halpern sinh ngày 3 tháng 9, 1980 tại Mỹ. Shit My Dad Says ban đầu được anh viết trên trang Twitter của riêng mình. Chỉ trong một thời gian ngắn, những ghi chú của anh được hàng trăm ngàn người theo dõi. Các tay môi giới văn chương gọi điện, muốn giới thiệu anh; các nhà sản xuất truyền hình mời anh tham gia chương trình của họ; còn phóng viên thì xin phép được phỏng vấn. Cuốn sách Shit My Dad Says được xuất bản và ngay lập tức trở thành bestseller ở Mỹ.\r\n\r\nShit My Dad Say - Lời vàng của bố sẽ giúp độc giả hình dung về cuộc sống gia đình người Mỹ trung lưu, không phải cuộc sống trong phim ảnh, mà là cuộc sống thật với vô vàn khó khăn của nó. Đó là các nhà biên kịch tương lai làm bồi bàn trong nhà hàng, và chuyên gia trong lĩnh vực “dược phẩm hạt nhân” làm việc cật lực hàng ngày tới tận tối khuya với rất nhiều áp lực.\r\n\r\nCuốn sách này có lẽ cũng sẽ là bằng chứng cho việc công nghệ thông tin hiện đại không khiến cho cha mẹ và con cái cách biệt, mà nó đã san bằng những khoảng trống còn chưa được hiểu hết về nhau trong mối quan hệ đó. Đồng thời, cuốn sách còn là cây cầu nối văn hóa ra thế giới bên ngoài, có thể, qua đó sẽ có nhiều cặp cha-con hiểu nhau hơn.\r\n\r\nVà điều cuối cùng, những người làm sách muốn chuyển đến cho bạn đọc, nhất là bạn đọc trẻ tuổi một nhãn quan trung thực khi suy xét mọi vấn đề trong cuộc sống. Chúng ta phải làm việc chăm chỉ, nỗ lực không ngừng, lắng nghe và suy nghĩ, trung thực và tận tâm, quan sát cẩn thận mọi thứ xung quanh, và đối xử tử tế với những người xứng đáng được như thế.', '2025-04-01', '60000.00', '60000.00', 43, '../uploads/product/1744273062_hai5.jpg', '2025-04-10 08:17:42', '2025-04-10 08:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `comic_sales`
--

CREATE TABLE `comic_sales` (
  `id` int NOT NULL,
  `comic_id` int DEFAULT NULL,
  `sale_type` enum('percent','fixed') NOT NULL,
  `sale_value` decimal(10,2) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` enum('active','inactive','pending') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comic_variants`
--

CREATE TABLE `comic_variants` (
  `id` int NOT NULL,
  `comic_id` int DEFAULT NULL,
  `format` enum('Bia cứng','Bia mềm') NOT NULL,
  `language` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `original_price` decimal(10,2) DEFAULT NULL,
  `stock_quantity` int NOT NULL,
  `publication_date` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isbn` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comic_variants`
--

INSERT INTO `comic_variants` (`id`, `comic_id`, `format`, `language`, `price`, `original_price`, `stock_quantity`, `publication_date`, `image`, `created_at`, `updated_at`, `isbn`) VALUES
(1, 2, 'Bia cứng', 'Pháp', '123.00', '2312.00', 232, '2025-03-28', '../uploads/variants/1743126005_javascript_logo.png', '2025-03-28 01:19:45', '2025-03-28 01:40:05', 200);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `ID` int NOT NULL,
  `user_id` int NOT NULL,
  `comics_id` int NOT NULL,
  `Content` text NOT NULL,
  `likes` int DEFAULT '0',
  `Dislike` int DEFAULT '0',
  `Create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`ID`, `user_id`, `comics_id`, `Content`, `likes`, `Dislike`, `Create_at`, `Update_at`, `status`) VALUES
(1, 1, 8, 'hay quá ', 0, 0, '2025-04-08 16:03:29', '2025-04-08 16:05:09', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_status` enum('unpaid','paid','refunded','failed','processing') NOT NULL,
  `payment_method` enum('CREDIT','COD','BANKING','MOMO') NOT NULL,
  `shipping_status` enum('pending','delivering','delivered','returned','cancelled') NOT NULL,
  `shipping_address` text NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `phone_car` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `total_amount`, `payment_status`, `payment_method`, `shipping_status`, `shipping_address`, `receiver_name`, `phone_car`) VALUES
(1, 1, '2025-04-03 11:27:08', '1868704.00', 'processing', 'BANKING', 'pending', 'dasda', 'thinh', '0989315010'),
(2, 1, '2025-04-03 11:27:38', '1868704.00', 'processing', 'BANKING', 'pending', 'sadsad', 'thinhnt', '0989315010'),
(3, 1, '2025-04-03 11:38:19', '2737390.00', 'processing', 'BANKING', 'cancelled', 'asd', 'thinh', '0989315010'),
(4, 1, '2025-04-03 13:06:42', '1802440.00', 'processing', 'BANKING', 'pending', 'ádsdsdasd', 'Nguyễn Tiến Thịnh', '0989315020'),
(5, 1, '2025-04-03 15:28:58', '20400.00', 'processing', 'BANKING', 'pending', 'ádsad', 'Nguyễn Tiến Thịnh', '0989315020'),
(6, 1, '2025-04-04 02:01:15', '4544.00', 'processing', 'BANKING', 'pending', 'ádkahsdk', 'Nguyễn Tiến Thịnh', '0989315010');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `comic_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `comic_id`, `quantity`, `unit_price`, `title`, `image`, `subtotal`) VALUES
(1, 3, 2, 2, '35454.00', NULL, NULL, NULL),
(2, 3, 5, 2, '434343.00', NULL, NULL, NULL),
(3, 3, 9, 2, '898898.00', NULL, NULL, NULL),
(4, 4, 3, 2, '2322.00', NULL, NULL, NULL),
(5, 4, 9, 2, '898898.00', NULL, NULL, NULL),
(6, 5, 3, 2, '2322.00', NULL, NULL, NULL),
(7, 5, 11, 2, '7878.00', NULL, NULL, NULL),
(8, 6, 20, 1, '4544.00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `comic_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `rating` enum('very_bad','bad','average','good','excellent') NOT NULL,
  `review_text` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `order_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `comic_id`, `user_id`, `rating`, `review_text`, `created_at`, `status`, `order_id`) VALUES
(1, 5, 1, 'good', 'chất lượng', '2025-04-08 10:03:18', 'approved', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `avatar`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Tiến Thịnh', 'thinhnt123@gmail.com', '$2y$10$hLreqeQ6.X.u/Knd.9mbUOa6btMyQGtJ7/LSskpujJ2/fCtthRbZe', '0989315020', 'uploads/user/1743690312_aaaa.jpg', 'admin', '2025-04-02 00:59:45', '2025-04-08 11:10:18'),
(2, 'Cuong Bùi Minh', 'abcd@gmail.com', '$2y$10$jlFMQSTikt.LezYe4H03rOhVvWc/cG4gKo5DCBEiYAFaxbNGow94K', '0976949258', 'default.jpg', 'admin', '2025-04-10 04:52:26', '2025-04-10 04:52:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `comic_id` (`comic_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comics`
--
ALTER TABLE `comics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `comic_sales`
--
ALTER TABLE `comic_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comic_id` (`comic_id`);

--
-- Indexes for table `comic_variants`
--
ALTER TABLE `comic_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comic_id` (`comic_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comics_id` (`comics_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `comic_id` (`comic_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comic_id` (`comic_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comics`
--
ALTER TABLE `comics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `comic_sales`
--
ALTER TABLE `comic_sales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comic_variants`
--
ALTER TABLE `comic_variants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`comic_id`) REFERENCES `comics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comics`
--
ALTER TABLE `comics`
  ADD CONSTRAINT `comics_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `comics_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `comic_sales`
--
ALTER TABLE `comic_sales`
  ADD CONSTRAINT `comic_sales_ibfk_1` FOREIGN KEY (`comic_id`) REFERENCES `comics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comic_variants`
--
ALTER TABLE `comic_variants`
  ADD CONSTRAINT `comic_variants_ibfk_1` FOREIGN KEY (`comic_id`) REFERENCES `comics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`comics_id`) REFERENCES `comics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`comic_id`) REFERENCES `comics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`comic_id`) REFERENCES `comics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
