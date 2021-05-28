-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 05:39 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) UNSIGNED NOT NULL,
  `categoryName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
(1, 'Sony'),
(2, 'iPhone'),
(3, 'Samsung'),
(4, 'Asus'),
(5, 'Oppo'),
(6, 'HTC'),
(7, 'Nokia'),
(8, 'Lenovo'),
(11, 'xx');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentID` int(11) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userID` int(11) UNSIGNED NOT NULL,
  `productID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentID`, `content`, `userID`, `productID`) VALUES
(1, 'khuyến mãi đến bao giờ vậy bạn', 2, 23),
(2, 'sản phẩm tốt', 2, 23),
(4, 'tốt\r\n', 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactID` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactID`, `title`, `content`) VALUES
(1, 'đánh giá sản phẩm', 'sản phẩm tốt chất lượng tốt, dễ dàng đặt hàng'),
(2, 'nhan xet ', 'tot'),
(4, 'xin chào', 'xin chào'),
(5, 'đẹp', 'đẹp');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `imageID` int(11) UNSIGNED NOT NULL,
  `imageName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productID` int(11) UNSIGNED NOT NULL,
  `choose` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`imageID`, `imageName`, `url`, `productID`, `choose`) VALUES
(4, 'iPhone 7 Plus', 'apple-iphone-7-plus-1.jpg', 2, 1),
(5, 'iPhone 7 Plus', 'iphone7-plus-oro-rosa_6.jpg', 2, 1),
(6, 'SAMSUNG GALAXY J7', 'samsung-galaxy-j7-gold.jpg', 3, 1),
(7, 'SAMSUNG GALAXY J7', 'samsung-galaxy-j7-black.jpg', 3, 1),
(8, 'ASUS ZENFONE GO', 'asus-zenfone-go-red.jpg', 4, 1),
(9, 'ASUS ZENFONE GO', 'asus-zenfone-go-white.jpg', 4, 1),
(10, 'OPPO A37 NEO 9', 'oppo-a37-hero.png', 5, 1),
(11, 'OPPO A37 NEO 9', 'oppo-a371.jpg', 5, 1),
(14, 'LUMIA 730', 'xanh.jpg', 6, 1),
(15, 'LUMIA 730', 'trang1.jpg', 6, 1),
(18, 'iphone 6', 'iphone-6s-plus-64gb-bac-org-1.png', 10, 1),
(19, 'iphone 6', 'iphone-6s-plus-128gb-black-gray.jpg', 10, 1),
(26, 'dell', 'sony.jpg', 15, 1),
(27, 'dell', 'xperia-z5-premium-dual-1.jpg', 15, 1),
(28, 'demo', 'sony-xperia-m5-single-sim-vang-dong-700x467-11.jpg', 16, 1),
(29, 'demo', 'SonyXperiaXA2.jpg', 16, 1),
(48, 'Sony Xperia Z5 Dual', 'sony-xperia-z5.jpg', 1, 1),
(49, 'Sony Xperia Z5 Dual', 'SONY-XPERIA-Z5-DUAL-3.jpg', 1, 1),
(58, 'Lenovo Vibe P1', 'lenovo-vibe-p1-hero.png', 21, 1),
(59, 'Lenovo Vibe P1', 'lenovo-vibe-p1-bac-org-1.png', 21, 1),
(60, 'iphone 6', 'iphone-6s-plus-64gb-bac-org-1.png', 22, 1),
(61, 'iphone 6', 'iphone-6s-plus-128gb-black-gray.jpg', 22, 1),
(62, 'iPhone 5S 64GB', 'iphone-5s-16gb-bac-org-1.png', 23, 1),
(63, 'iPhone 5S 64GB', 'iphone-5s-16gb.png', 23, 1),
(64, 'Sony Xperia X', 'sony-xperia-x-org-vang.png', 24, 1),
(65, 'Sony Xperia X', 'sony-xperia-x-vanghong-org-1.png', 24, 1),
(66, 'Sony Xperia XZ', 'sony-xperia-xz-org-bac.png', 25, 1),
(67, 'Sony Xperia XZ', 'sony-xperia-xz-org-den.png', 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `idOther` int(11) UNSIGNED NOT NULL,
  `fullname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_buy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` int(11) NOT NULL,
  `is_customer` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_pay` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`idOther`, `fullname`, `email`, `phone`, `address`, `date_buy`, `total`, `is_customer`, `is_pay`) VALUES
(68, '', 'heheh@gmail.com', 2147483647, 'quận 3                        ', '29/11/2016', 4400000, '2', 'đã thanh toán'),
(69, 'Tarin', 'heheh@gmail.com', 2147483647, 'quận 3                        ', '29/11/2016', 52800000, '2', 'đã thanh toán'),
(70, 'jndewjfebfjbfj', 'heheh@gmail.com12345', 1234567890, 'quan 3                        ', '6/12/2016', 4400000, '10', 'đã thanh toán'),
(72, 'Tarin', 'heheh@gmail.com', 2147483647, 'quận 3                        ', '6/12/2016', 11490000, '2', 'đang chờ xử lý'),
(73, 'thudfhhg', 'hihi@gmail.com', 93423525, 'vdgdfgd                        ', '6/12/2016', 11490000, '0', 'đã thanh toán'),
(74, 'asdfghjklffff', 'heheh@gmail.com222', 1234567899, 'sasfsdfsadfasdf                        ', '6/12/2016', 19900000, '10', 'đã thanh toán');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) UNSIGNED NOT NULL,
  `productName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `discount` int(11) NOT NULL DEFAULT 0,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categoryID` int(11) UNSIGNED NOT NULL,
  `dateupdate` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soluonghientai` int(11) NOT NULL DEFAULT 0,
  `soluongconlai` int(11) NOT NULL DEFAULT 0,
  `soluongbanduoc` int(11) DEFAULT NULL,
  `thoigian_baohanh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `description`, `price`, `discount`, `image`, `categoryID`, `dateupdate`, `soluonghientai`, `soluongconlai`, `soluongbanduoc`, `thoigian_baohanh`) VALUES
(1, 'Sony Xperia Z5 Dual', 'Xperia Z5 Dual là smartphone chủ lực của Sony với nhiều cải tiến về công nghệ lẫn thiết kế sẽ mang lại nhiều thích thú cho bạn.\r\n\r\nCảm biến vân tay 1 chạm dễ dàng sử dụng và nhận diện nhanh chóng\r\n\r\nCảm biến vân tay một chạm trên Xperia Z5 Dual có tốc độ xử lý nhanh, nhạy giúp cho mở khóa nhanh hơn, ngoài ra cảm biến được đặt ngay vị trí rất dễ để thao tác nhanh chóng mở khóa.\r\nCamera cho tốc độ lấy nét siêu nhanh\r\n\r\nCamera trên máy được tích hợp cảm biến Exmor RS cho tốc độ lấy nét nhanh chỉ 0.03 giây, độ phân giải cao 23 MP hỗ trợ chống rung quang học, chụp thiếu sáng tốt, quay video 4K hay khả năng zoom gấp 5 lần mà không ảnh hưởng đến chất lượng ảnh quá nhiều.\r\nVới camera trước độ phân giải 5 MP vừa đủ để người dùng có những tấm hình selfie ấn tượng cùng bạn bè và người thân.\r\nCông nghệ sạc nhanh cùng tính năng siêu tiết kiệm pin\r\n\r\nSony Z5 có dung lượng pin lớn 2900 mAh đảm bảo khả năng duy trì thời gian sử dụng được nhiều hơn, ngoài ra máy còn tích hợp công nghệ sạc nhanh Quick Charge 2.0 rút ngắn thời gian sạc pin.\r\nSony Xperia Z5 Premium Dual thuộc phân khúc cấp cao với những trang bị tốt nhất và độc quyền nhất, sẽ mang đến cho bạn những trải nghiệm thú vị và thích nhất.\r\n', 11990000, 500000, 'sony-xperia-z5-dual.png', 1, '15/11/2016', 30, 30, 21, 7),
(2, 'iPhone 7 Plus', 'iPhone 7 Plus 32 GB với bộ đôi camera kép ấn tượng cùng tiêu chuẩn chống nước lần đầu tiên xuất hiện trên các thế hệ iPhone sẽ là smartphone đáng mua nhất dịp cuối năm.\r\n\r\nThiết kế quen thuộc\r\n\r\nThiết kế của chiếc iPhone 7 Plus 32 GB không có nhiều điểm khác biệt so với người anh em iPhone 6s Plus năm ngoái. Mặt lưng chính là điểm nổi bật nhất của iPhone 7 Plus 32 GB với bộ đôi camera kép lồi hẳn lên.\r\nNgoài ra thì Phím Home vật lý truyền thống trên các dòng iPhone cũng đã được Apple loại bỏ và thay vào đó là phím Home với với công nghệ cảm ứng lực giúp bạn sử dụng thiết bị thoải mái hơn mà không sợ bị liệt hay hỏng phím Home.\r\nMàn hình của máy vẫn giữ nguyên kích thước 5.5 inch độ phân giải 1080 x 1920 pixels nhưng được cải tiến về độ sáng cũng như độ tương phản mang lại trải nghiệm tốt hơn.\r\n\r\nHiệu năng hàng đầu\r\n\r\nNăm ngoái khi Apple giới thiệu con chip Apple A9 trên bộ đôi iPhone 6s và 6s Plus thì người dùng đã không khỏi bất ngờ về hiệu năng mà nó mang lại.\r\nNăm nay với con chip Apple thế hệ mới mà theo Apple công bố là sẽ cho tốc độ CPU nhanh hơn 40% và tốc độ GPU nhanh hơn 50% so với thế hệ trước thì chắc chắn iPhone 7 Plus 32 GB sẽ không làm người dùng thất vọng.\r\n\r\nKhả năng chống nước IP67\r\n\r\nLần đầu tiên trên một chiếc iPhone thì Apple đã tích hợp khả năng chống nước và chống bụi tiêu chuẩn IP67 giúp người dùng có thể thoải mái mang theo chiếc iPhone của mình xuống hồ bơi và chụp những bức hình vui vẻ.\r\nBộ đôi camera ấn tượng\r\n\r\nVới bộ đôi camera kép có cùng độ phân giải 12 MP và một trong số đó là ống kinh góc rộng và máy ảnh còn lại có tiêu cự 56 mm. Theo Apple hệ thống camera kép này cho phép zoom quang 2X mà không làm suy giảm chất lượng ảnh.\r\n\r\nKhi chụp người dùng có thể zoom từ 1-10x nhưng từ 2x trở lên là zoom số, khi zoom số thuật toán xử lý ảnh sẽ cùng kết hợp hình ảnh từ cả 2 camera để xử lý, qua đó sẽ cho chất lượng cao gấp 4 lần hệ thống thường.\r\nNgoài ra thì Apple cũng sẽ tích hợp khả năng sử dụng đồng thời cả 2 camera để giả lập độ sâu trường ảnh mang lại cho người dùng những bức ảnh xóa phông ấn tượng.\r\n\r\nHệ điều hành mới\r\n\r\nĐồng thời với việc ra mắt iPhone mới thì Apple cũng giới thiệu tới người dùng hệ điều hành iOS 10 hoàn toàn mới với nhiều cải tiến mạnh mẽ về giao diện màn hình khóa, thanh thông báo, Apple Maps, Apple Music, Messages và HomeKit.\r\nVới những trang bị hàng đầu hiện nay thì iPhone 7 Plus 32 GB thực sự là 1 flahship đáng sở hữu trong dịp mua sắm cuối năm.', 22290000, 200000, 'iphone-7-plus-2.png', 2, '2016-11-10', 30, 20, 14, 12),
(3, 'SAMSUNG GALAXY J7', 'Samsung Galaxy J7 có thiết kế khá quen thuộc trên dòng Galaxy J Series, cộng với đó là cấu hình ổn định, camera tốt.\r\n\r\nThiết kế đậm chất dòng Galaxy J Series\r\n\r\nGalaxy J7 sở hữu phong cách thiết kế đầy trẻ trung và năng động của dòng Galaxy J Series, các cạnh máy được bo tròn cùng với viền giả kim loại mang lại cảm giác thoải mái khi cầm trên tay.\r\nChụp ảnh đẹp hơn với Galaxy J7\r\n\r\nNhờ được tích hợp cảm biến khẩu độ f/1.9 trên camera 13 MP cho chất lượng hình ảnh chụp ấn tượng, đồng thời hỗ trợ chụp ảnh tốt hơn trong điều kiện thiếu sáng nhờ tích hợp đèn flash.\r\nẢnh chụp tốt trong tầm giá\r\n\r\nGalaxy J7 được trang bị vi xử lý 8 nhân Exynos 7580 do chính Samsung tự sản xuất, chip đồ họa Mali T720, RAM dung lượng 1.5 GB, bộ nhớ trong 16 GB và có hỗ trợ thẻ nhớ ngoài MicroSD lên tới 128 GB.\r\nĐáng tiếc một chút khi trên Galaxy J7 không hỗ trợ 4G, tuy nhiên điều này cũng không quá cần thiết khi tốc độ 3G hay Wi-Fi hiện nay đã khá tốt.', 4500000, 100000, 'samsung-galaxy-j7-1-400x533.png', 3, '2016-11-03', 30, 20, 15, 6),
(4, 'ASUS ZENFONE GO', 'Zenfone Go có mức giá thấp, ấn tượng với RAM 2 GB giúp máy vận hành tốt hơn, màn hình lớn mang lại không gian giải trí thoải mái.\r\nCấu hình tốt trong tầm giá\r\nVới mức RAM 2 GB, chip xử lý MT6580, 4 nhân có tốc độ 1.3 GHz, máy có thể chơi được các game nặng khá tốt, các tác vụ, chạy đa nhiệm ổn.\r\nCác tiện ích trong máy\r\nBạn có thể thiết lập các tiện ích của máy như nhấn đúp để mở màn hình hay vẽ kí tự để mở nhanh ứng dụng cần thiết trong cài đặt Zenmotion.\r\nZenfone Go sẽ là một sự lựa chọn tốt cho bạn trong các sản phẩm cùng phân khúc giá bởi cấu hình tốt, tính năng cử chỉ tiện ích và camera đẹp', 53000000, 200000, 'asus-zenfone2-gold.jpg', 4, '2016-11-10', 30, 20, 10, 12),
(5, 'OPPO A37 NEO 9', 'OPPO A37 (Neo 9) là thiết bị tiếp theo của dòng OPPO Neo vốn được người dùng yêu thích với camera selfie ảo diệu cùng mức giá bán phải chăng.\r\n\r\nThiết kế bắt mắt\r\n\r\nThiết kế là điểm cải tiến lớn trên OPPO A37 so với các thế hệ OPPO Neo 5 và Neo 7 đi trước, vẫn được làm từ nhựa nhưng OPPO A37 đã chắc chắn và thời trang hơn các đàn anh của mình rất nhiều.\r\nMáy sở hữu thiết kế nhựa nguyên khối với nhiều đường nét được thừa hưởng từ chiếc OPPO F1 Plus của hãng, bắt mắt và tinh tế.\r\nCamera selfie ảo diệu\r\n\r\nTiếp nối sự thành công của các thế hệ trước thì OPPO A37 cũng được đầu tư mạnh về camera selfie với độ phân giải lên tới 5 MP cùng tính năng làm mịn da độc quyền được rất nhiều bạn trẻ yêu thích.\r\nMàn hình hiển thị khá\r\n\r\nOPPO A37 được trang bị màn hình 5 inch độ phân giải HD 720 x 1280 pixels, sử dụng tấm nền IPS LCD cho chất lượng hiển thị ở mức khá.\r\nHiệu năng ở mức khá\r\n\r\nOPPO A37 được trang bị bộ vi xử lý Snapdragon 410 tốc độ 1.2 GHz, chip đồ họa Adreno 306, RAM 2 GB bộ nhớ trong 16 GB.\r\nQua trải nghiệm thì máy có thể chơi được các tựa game nặng như Asphalt 8 hay N.O.V.A 3 ở mức đồ họa trung bình.\r\n\r\nNếu như bạn đang cần tìm kiếm một smartphone nhỏ gọn, thiết kế thời trang cùng camera selfie đẹp thì OPPO A37 sẽ là sự lựa chọn hàng đầu dành cho bạn.', 6300000, 100000, 'oppo-a37-vangdong.png', 5, '25/11/2016', 30, 20, 10, 12),
(6, 'LUMIA 730', 'Đơn giản, nhỏ gọn cùng trải nghiệm hệ điều hành Windows Phone với mức giá tốt cùng Lumia 730.\r\nSelfie góc rộng cùng bạn bè\r\nVới camera trước có độ phân giải 5 MP cùng góc chụp rộng cho bạn dễ dàng chụp cùng lúc nhiều người hơn.\r\nTuỳ chọn màu sắc với cá tính của bạn\r\nTuỳ vào từng màu máy sẽ có mặt lưng là bóng hay nhám, 2 cạnh bên được bo cong tròn giúp bạn dễ cầm hơn, không bị cấn vào tay khó chịu.\r\nHệ điều hành mới lạ\r\nMáy sử dụng hệ điều hành Windows Phone 8.1 mang đến cho bạn trải nghiệm khá mới mẻ so với những dòng điện thoại dùng Android rất nhiều ngày nay, bạn tìm hiểu thêm tại đây.\r\nCấu hình ổn định\r\nThương hiệu uy tín cùng những tính năng tốt, đặc biệt mức giá ổn thì Lumia 730 sẽ là một sự lựa chọn tốt cho bạn muốn trải nghiệm hệ điều hành mới.', 5300000, 200000, 'xam.jpg', 7, '2016-11-04', 30, 20, 12, 12),
(10, 'iPhone 6s Plus 64GB', 'iPhone 6s Plus là phiên bản nâng cấp hoàn hảo từ iPhone 6 Plus với nhiều tính năng mới hấp dẫn.\r\n\r\nCamera được cải tiến iPhone 6s Plus\r\n\r\niPhone 6s Plus 64 GB được nâng cấp độ phân giải camera sau lên 12 MP (thay vì 8 MP như trên iPhone 6 Plus), camera cho tốc độ lấy nét và chụp nhanh, thao tác chạm để chụp nhẹ nhàng. Chất lượng ảnh trong các điều kiện chụp khác nhau tốt.\r\nCamera trước với độ phân giải 5 MP cho hình ảnh với độ chi tiết rõ nét, đặc biệt máy còn có tính năng Retina Flash, sẽ giúp màn hình sáng lên như đèn Flash để bức ảnh khi bạn chụp trong trời tối được tốt hơn.\r\nThích thú hơn với màn hình rộng\r\n\r\nMàn hình lớn cùng màu sắc tươi tắn, độ nét cao sẽ mang đến nhiều thích thú khi lướt web, xem phim hay làm việc.\r\nCảm ứng 3D Touch độc đáo\r\n\r\n3D Touch là tính năng hoàn toàn mới trên iPhone 6s Plus, cho phép người dùng xem trước được các tùy chọn nhanh dựa vào lực nhấn mạnh hay nhẹ mà không cần phải nhấp vào ứng dụng. Để sử dụng, bạn chỉ cần nhấn vào màn hình hoặc ứng dụng 1 lực mạnh đến khi máy rung nhẹ là có thể xem được.\r\nĐáng tiếc tính năng 3D Touch này chỉ mới được áp dụng trên các ứng dụng của Apple như: danh bạ, camera, mail, máy ảnh ... \r\n\r\nBạn có thể tìm hiểu thêm tính năng 3D Touch tại đây.\r\n\r\nSức mạnh của bộ vi xử lý A9 mới nhất\r\n\r\niPhone 6s Plus sử dụng vi xử lý A9 tốc độ 1.8 GHz (iPhone 6 Plus chỉ với 1.4 GHz), giúp máy chạy cùng lúc nhiều ứng dụng mượt mà. Bạn sẽ thực sự cảm nhận được sức mạnh của iPhone 6s Plus khi chiến các game có đồ họa nặng như Modern Combat 5 hay Warhammer 40.000.\r\nNgoài ra iPhone 6s Plus còn được trang bị các công nghệ tiên tiến nhất hiện nay như: Wifi chuẩn dual-band và tính năng kết nối 4G thời thượng, cho tốc độ kết nối và tải dữ liệu rất nhanh, cảm biến vân tay cải tiến để nhận diện và mở khóa nhanh hơn.\r\n\r\nMột chiếc điện thoại vừa thể hiện đẳng cấp của bạn vừa mang lại những nâng cấp tốt hơn như camera, hiệu năng hoạt động mạnh mẽ hơn, tính năng 3D Touch độc đáo, tất cả sẽ là trải nghiệm mới mẻ cho bạn khi chọn mua iPhone 6s Plus.', 19900000, 0, 'iphone6s.png', 2, '2016-11-03', 100, 20, 80, 12),
(15, 'Sony Xperia XA Ultra', 'Sony Xperia XA Ultra sở hữu màn hình lớn cùng camera trước có độ phân giải cao cùng nhiều tính năng cao cấp.\r\n\r\nMàn hình lớn\r\n\r\nSony Xperia XA Ultra mang trong mình màn hình có kích thước 6 inch độ phân giải 1080 x 1920 pixels cùng tấm nền IPS LCD. Máy đem lại màu sắc thể hiện khá sắc nét cùng một góc nhìn rộng cho bạn thoải mái chia sẻ nội dung với bạn bè.\r\nMáy cũng sở hữu thiết kế khá thon gọn so với một chiếc phablet màn hình lớn với các góc cạnh bo tròn mềm mại cùng phần viền màn hình siêu mỏng tương tự như trên chiếc Xperia XA.\r\nĐiểm trừ trên thiết kế của các dòng Xperia là cụm phím điều hướng cơ bản của Android vẫn nằm ở bên trong màn hình và chiếm diện tích hiển thị vẫn xuất hiện trên XA Ultra, hi vọng Sony sẽ lắng nghe người dùng và có những thay đổi cho các thiết bị của mình trong thời gian tới.\r\nCamera trước sắc nét\r\n\r\nVới camera trước có độ phân giải 16 MP, hỗ trợ đèn flash trợ sáng cùng tính năng chống rung quang học OIS cao cấp sẽ giúp bạn có những bức ảnh có chất lượng vượt trội với XA Ultra. Ngoài ra máy cũng hỗ trợ chụp hình bằng cử chỉ giúp bạn có thể có những bức ảnh nhóm dễ dàng.\r\nNgoài ra camera chính của máy cũng có độ phân giải lên tới 21.5 MP cùng đèn flash trợ sáng cho bạn những bức ảnh thiếu sáng có chất lượng tốt. Máy cũng hỗ trợ quay phim độ phân giải FullHD 1080p@30fps giúp bạn có thể lưu lại những đoạn video thú vị.\r\nHiệu năng tốt\r\n\r\nXperia XA Ultra mang trên mình vi xử lý MediaTek Helio P10 8 nhân, RAM 3 GB, bộ nhớ trong 16 GB kèm khe cắm thẻ nhớ hỗ trợ tối đa lên đến hơn 200 GB. Máy chạy trên nền Android 6.0 Marshmallow, và viên pin có dung lượng 2700 mAh cùng chế độ sạc nhanh.\r\nVới cấu hình này, XA Ultra sẽ mang lại cho bạn những trải nghiệm đa nhiệm mượt mà và khả năng giải trí cùng những game đỉnh cao mà không giật lag.\r\n\r\nXperia XA Ultra là smartphone đáng sở hữu nhất trong phân khúc điện thoại màn hình lớn.', 7490000, 200000, 'sony-xperia-xa-ultra-1.png', 1, '2016-11-25', 35, 20, 15, 12),
(16, 'Sony Xperia M5', 'Sony Xperia M5 (Single SIM) là sự kết hợp hài hòa các ưu điểm giữa Xperia Z3 Plus và M4 Aqua để đưa ra sản phẩm tốt nhất, khắc phục một vài hạn chế ở chiếc M4 trước kia.\r\n\r\nThiết kế cao cấp của Xperia Z3 Plus\r\n\r\nNhìn tổng thể bên ngoài, Sony Xperia M5 (Single SIM) có nhiều nét tương đồng với Xperia Z3 Plus, đây là một ưu điểm tạo nên vẻ sang trọng, cao cấp và sắc sảo hơn so với Xperia M4.\r\nMáy được hoàn thiện với chất lượng tốt, đậm phong cách quen thuộc của các dòng điện thoại Sony, bao phủ toàn bộ máy là hai mặt kính được làm từ nhựa, chống xước. Khung viền xung quanh của máy bằng chất liệu kim loại và được gia cố ở bốn góc nhằm bảo vệ máy một cách tối đa khi có va đập xảy ra.\r\nMàn hình Full HD mịn màng\r\n\r\nSo với thế hệ M4 trước kia thì Xperia M5 (Single SIM) đã được nâng cấp từ màn hình HD sang Full HD, một nâng cấp đáng giá với số tiền bỏ ra.\r\nCặp đôi camera “khủng”\r\n\r\nĐầu tiên “khủng” về thông số camera với camera chính với độ phân giải 21.5 MP, camera trước là 13 MP.\r\nHiệu năng mạnh mẽ\r\n\r\nSony Xperia M5 (Single SIM) được trang bị bộ vi xử lý tám nhân MediaTek MT6795 Helio X10 tốc độ xung nhịp đạt 2 Ghz, tích hợp chip đồ họa GPU PowerVR G6200 và đi kèm với bộ nhớ RAM 3 GB.\r\nQuản lý ứng dụng trên máy rất tốt giúp máy chạy rất nhanh, mượt mà và ổn định. Các tác vụ đa nhiệm hoạt động trơn tru và không gặp bất cứ vấn đề gì như giật, treo.\r\n\r\nVới mức giá hấp dẫn, thiết kế sang trọng, cao cấp, cấu hình mạnh mẽ và camera ấn tượng Sony Xperia M5 (Single SIM) rất đáng để bạn lựa chọn trong phân khúc.', 7490000, 100000, 'sony-xperia-m5-single-sim-300x300.jpg', 1, '2016-11-10', 32, 20, 12, 6),
(21, 'Lenovo Vibe P1', 'Lenovo Vibe P1 sở hữu dung lượng pin 5000 mAh có thể sạc cho thiết bị khác cùng nhiều tính năng hấp dẫn không kém.\r\n\r\nThời gian sử dụng dài\r\n\r\nVới dung lượng viên pin 5000 mAh, Lenovo Vibe P1 luôn trong trạng thái hoạt động, phục vụ tốt các nhu cầu làm việc, giải trí, chơi game hay xem phim thoải mái.\r\nThiết kế khung kim loại\r\n\r\nLenovo Vibe P1 hoàn thiện nguyên khối nhôm, mặt lưng bo cong sang hai bên ôm sát tay, cảm giác cầm rất thoải mái, đầm tay và chắc chắn. Thiết kế sang trọng và cao cấp so với sản phẩm tầm trung.\r\nMàn hình trong trẻo, nổi bật\r\n\r\nKhi nhìn vào màn hình Lenovo Vibe P1 cảm giác các chi tiết đang nổi ngoài màn hình, cho màu sắc và độ trong rất tốt. Kích thước 5.5 inch độ phân giải Full HD rất tuyệt để chơi game hay xem phim giải trí.\r\nCấu hình tầm trung cùng bảo mật vân tay\r\n\r\nLenovo Vibe P1 trang bị cấu hình khá quen thuộc trong phân khúc giá với Snapdragon 615, tốc độ 4 nhân 1.5 GHz Cortex-A53 + 4 nhân 1.0 GHz Cortex-A53, 2 GB RAM và 32 GB bộ nhớ trong chắc chắn đủ sức mang đến những trải nghiệm tốt.\r\nCamera cho màu sắc và độ nét tốt\r\n\r\nMáy trang bị cho camera chính độ phân giải cao 13 MP cho hình ảnh tốt và nét, màu sắc được tái tạo gần như đúng với thực tế, ít bị bệt màu.\r\nThiết kế đẹp, tinh tế, cấu hình mạnh mẽ cùng nhiều công nghệ được trang bị và thời lượng pin tuyệt vời chính là những yếu tố sẽ làm nên sự thành công của Lenovo Vibe P1.', 5290000, 100000, 'lenovo-vibe-p1-vang-dong-org-1.png', 8, '2016-11-29', 30, 20, 10, 12),
(22, 'iPhone 6s Plus 16GB', 'iPhone 6s Plus là phiên bản nâng cấp hoàn hảo từ iPhone 6 Plus với nhiều tính năng mới hấp dẫn.\r\n\r\nCamera được cải tiến iPhone 6s Plus\r\n\r\niPhone 6s Plus 64 GB được nâng cấp độ phân giải camera sau lên 12 MP (thay vì 8 MP như trên iPhone 6 Plus), camera cho tốc độ lấy nét và chụp nhanh, thao tác chạm để chụp nhẹ nhàng. Chất lượng ảnh trong các điều kiện chụp khác nhau tốt.\r\nCamera trước với độ phân giải 5 MP cho hình ảnh với độ chi tiết rõ nét, đặc biệt máy còn có tính năng Retina Flash, sẽ giúp màn hình sáng lên như đèn Flash để bức ảnh khi bạn chụp trong trời tối được tốt hơn.\r\nThích thú hơn với màn hình rộng\r\n\r\nMàn hình lớn cùng màu sắc tươi tắn, độ nét cao sẽ mang đến nhiều thích thú khi lướt web, xem phim hay làm việc.\r\nCảm ứng 3D Touch độc đáo\r\n\r\n3D Touch là tính năng hoàn toàn mới trên iPhone 6s Plus, cho phép người dùng xem trước được các tùy chọn nhanh dựa vào lực nhấn mạnh hay nhẹ mà không cần phải nhấp vào ứng dụng. Để sử dụng, bạn chỉ cần nhấn vào màn hình hoặc ứng dụng 1 lực mạnh đến khi máy rung nhẹ là có thể xem được.\r\nĐáng tiếc tính năng 3D Touch này chỉ mới được áp dụng trên các ứng dụng của Apple như: danh bạ, camera, mail, máy ảnh ... \r\n\r\nBạn có thể tìm hiểu thêm tính năng 3D Touch tại đây.\r\n\r\nSức mạnh của bộ vi xử lý A9 mới nhất\r\n\r\niPhone 6s Plus sử dụng vi xử lý A9 tốc độ 1.8 GHz (iPhone 6 Plus chỉ với 1.4 GHz), giúp máy chạy cùng lúc nhiều ứng dụng mượt mà. Bạn sẽ thực sự cảm nhận được sức mạnh của iPhone 6s Plus khi chiến các game có đồ họa nặng như Modern Combat 5 hay Warhammer 40.000.\r\nNgoài ra iPhone 6s Plus còn được trang bị các công nghệ tiên tiến nhất hiện nay như: Wifi chuẩn dual-band và tính năng kết nối 4G thời thượng, cho tốc độ kết nối và tải dữ liệu rất nhanh, cảm biến vân tay cải tiến để nhận diện và mở khóa nhanh hơn.\r\n\r\nMột chiếc điện thoại vừa thể hiện đẳng cấp của bạn vừa mang lại những nâng cấp tốt hơn như camera, hiệu năng hoạt động mạnh mẽ hơn, tính năng 3D Touch độc đáo, tất cả sẽ là trải nghiệm mới mẻ cho bạn khi chọn mua iPhone 6s Plus.', 19900000, 0, 'iphone-6s-plus-128gb-black-gray.jpg', 2, '2016-11-03', 100, 20, 81, 12),
(23, 'iPhone 5S 64GB', 'Được đổi mới mạnh mẽ về thiết kế, cấu hình cùng một màn hình kích thước lớn đi cùng mang đến nhiều thích thú hơn trong sử dụng.\r\n\r\nBo tròn lạ mắt\r\n\r\nCác phiên bản của iPhone 6 Plus được bo tròn các cạnh nên khi cầm lâu máy sẽ không bị đau do cấn vào tay, nhất là với chiếc điện thoại có kích thước lớn thì điều này sẽ làm bạn yêu thích hơn.\r\nCamera cải thiện tốt\r\n\r\nMặc dù độ phân giải chỉ 8 MP, khẩu độ F2.2 nhưng những gì camera iPhone 6 Plus làm được lại rất tốt, máy cho tốc độ lấy nét và chạm chụp rất nhanh, màu sắc được thu lại rất tốt.\r\nVi xử lý mạnh mẽ hơn\r\n\r\niPhone 6 Plus sử dụng chip xử lý A8 tốc độ 1.4 GHz cho việc xử lý tác vụ nhanh hơn 30%, tiết kiệm năng lượng hơn 25% so với chip A7 trên iPhone 5S (1.3 GHz), đối với việc chơi game có cấu hình nặng cũng sẽ rất dễ dàng. \r\niPhone 6 Plus dùng hệ điều hành iOS 9 với nhiều tính năng thú vị, bạn có thể tham khảo thêm tại đây.\r\n\r\nMáy sử dụng chip đồ họa PowerVR GX6450, có thể xử lý hình ảnh độ phân giải cao như video 4K hay game 3D tốt và mượt hơn, màn hình Retina HD cùng kích thước 5.5 inch cho mọi thao tác lướt web, giải trí hay xử lý công việc đều rất tốt.\r\nNgoài một số nhược điểm như hệ điều hành khó sử dụng hay không có phím trở lại, tuy nhiên khi bạn đã quen sử dụng iPhone bạn sẽ luôn muốn sử dụng tiếp theo các dòng mới của hãng, vì thiết kế sang trọng, tinh tế, máy thao tác nhanh, chụp ảnh đẹp.', 5420000, 100000, 'iphone-5s-16gb-den-1-org-1.png', 2, '2016-11-29', 30, 25, 5, 12),
(24, 'Sony Xperia X', 'Thiết kế ấn tượng\r\n\r\nVới thiết kế nguyên khối, khung viền bằng kim loại và bo tròn các góc cạnh cho cảm giác cầm chắc tay. Màn hình của Xperia XA là màn hình IPS LCD có kích thước 5 inch với độ phân giải HD 720p cho chất lượng hình ảnh sắc nét, sống động.\r\nĐiểm nổi bật trong ngôn ngữ thiết kế mới của Sony là họ đã khéo léo thiết kế mặt kính cong nhẹ, tràn ra hai bên tạo cho người nhìn có cảm giác viền màn hình gần như không tồn tại.\r\nHiệu năng cao trong tầm phân khúc\r\n\r\nSo với các smartphone cùng phân khúc cấu hình Xperia XA sử dụng chip MediaTek Helio P10 với 8 nhân 64 bit, RAM 2 GB có thể nói là rất mạnh trong tầm giá 6-7 triệu. Máy chạy hệ điều hành Android 6.0.1 (Marshmallow).\r\n\r\nCamera chính của Xperia có độ phân giải 13 MP với hỗ trợ lấy nét tự động (Auto Focus), quay phim 1080p.\r\n\r\nCamera trước có độ phân giải 8 MP. Với cảm biến độ nhạy cao, người dùng có thể chụp được những bức ảnh rõ ràng, sắc nét ngay cả trong điều kiện ánh sáng yếu bằng cả 2 camera trước sau.\r\nSony đã hỗ trợ rất tốt cho người sử dụng về chụp ảnh. Camera của XA luôn sẵn sàng khởi động cực nhanh với phím khởi chạy camera, kèm theo đó là tính năng lấy nét tự động siêu nhanh giúp bạn không bỏ lỡ khoảnh khắc đẹp nào.\r\nNăng lượng pin đột phá\r\n\r\nPin của Xperia XA có dung lượng 2300 mAh. Theo Sony với dung lượng này XA có thể sử dụng được 2 ngày. Đây là một con số không lớn nhưng cũng không quá nhỏ đối với chiếc smartphone màn hình 5 inch độ phân giải 720p.\r\n\r\nMáy cũng sẽ hỗ trợ sạc nhanh cho người dùng, tuy nhiên bạn sẽ cần mua riêng bộ sạc này để sử dụng.\r\n\r\nMáy có bộ nhớ trong 16 GB, khe cắm thẻ nhớ microSD lên đến 200 GB và có 4 màu sắc để người dùng lựa chọn.', 5800000, 0, 'sony-xperia-x-org-trang.png', 1, '2016-11-29', 30, 20, 10, 12),
(25, 'Sony Xperia XZ', 'Sony Xperia XZ với thiết kế cực đẹp, cùng camera chất lượng hơn, nhiều tính năng tiện ích hơn.\r\n\r\nThiết kế sang trọng\r\n\r\nCải tiến hơn so với thiết kế truyền thống của dòng Xperia, Sony Xperia XZ mang trên mình diện mạo mới - đẹp hơn, sang trọng hơn. \r\nSony Xperia XZ được trang bị công nghệ màn hình TRILUMINOSTM kích thước 5.2 inch cùng độ phân giải FullHD giúp hình ảnh hiển thị tốt, màu sắc trung thực và thời lượng pin được tăng cường đáng kể nhờ màn hình không quá to.\r\nCấu hình mạnh mẽ\r\n\r\nMang trên mình vi xử lý mới nhất Snapdragon 820 4 nhân 64-bit chip đồ họa Adreno 530, bộ nhớ RAM 3 GB cùng 64 GB bộ nhớ trong. Cấu hình mạng mẽ giúp Xepria XZ xử lý các tác vụ đa nhiệm tốt, chơi các game với đồ họa cao.\r\nBên cạnh đó, máy còn có khe nhắm mở rộng với thẻ MicroSD hỗ trợ tối đa 256 GG, kết nối 4G LTE Cat 9 với tốc độ cực nhanh, hệ điều hành mới Android 6.0 (Marshmallow) ổn định, bảo mật và nhiều tiện ích.\r\n\r\nMáy ảnh tốt\r\n\r\nVới cảm biến ảnh 23 MP cùng nhiều công nghệ tiên tiến như chống rung 5 trực, lấy nét bằng laser...Sony Xperia XZ thực sự trở thành một thiết bị nhiếp ảnh di động chuyên nghiệp. Hình ảnh chụp từ Xperia XZ có độ phân giải tốt, lấy nét nhanh cùng nhiều tính năng độc đ\r\ntrước 13 MP hỗ trợ chụp ảnh ngược sáng HDR, selfie góc rộng...\r\n\r\nGiải trí ấn tượng\r\n\r\nSony Xperia XZ trang bị công nghệ âm thanh Hi-res Audio giúp trải nghiệm âm thanh trung thực và sống động hơn.\r\nNgoài ra XZ còn trang bị khả năng chống nước, chống bụi hiệu quả cùng cảm biến vân tay tích hợp ở phím Home.', 7500000, 100000, 'sony-xperia-xz.png', 1, '2016-11-29', 30, 20, 10, 12);

-- --------------------------------------------------------

--
-- Table structure for table `productorders`
--

CREATE TABLE `productorders` (
  `id` int(11) UNSIGNED NOT NULL,
  `productID` int(11) UNSIGNED NOT NULL,
  `idOther` int(11) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `productorders`
--

INSERT INTO `productorders` (`id`, `productID`, `idOther`, `amount`) VALUES
(2, 3, 68, 1),
(3, 4, 69, 1),
(6, 1, 72, 1);

-- --------------------------------------------------------

--
-- Table structure for table `thongso`
--

CREATE TABLE `thongso` (
  `thongsoID` int(11) UNSIGNED NOT NULL,
  `productID` int(11) UNSIGNED NOT NULL,
  `manhinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HDD` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CMRTruoc` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `CMRSau` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `RAM` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ROM` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `thesim` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `dungluongPIN` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thongso`
--

INSERT INTO `thongso` (`thongsoID`, `productID`, `manhinh`, `HDD`, `CMRTruoc`, `CMRSau`, `RAM`, `ROM`, `thesim`, `dungluongPIN`) VALUES
(4, 2, 'LED-backlit IPS LCD, 5.5\", Retina HD', 'iOS 10', '7 MP', 'Hai camera 12 MP', '3 GB', '32 GB', '1 SIM, Nano SIM', '2900 mAh'),
(6, 3, 'Super AMOLED, 5.5\", HD', 'Android 5.1 (Lollipop)', '5 MP', '13 MP', '1.5 GB', '8 GB', '2 SIM 2 sóng, Micro SIM', '3000mA'),
(7, 4, 'IPS LCD, 5', 'Android 5.1 (Lollipop)', '8 MP', '16 MP', '8GB', '6GB', '2 SIM, Micro SIM', '4000mA'),
(8, 5, 'IPS LCD, 5\", Full HD', 'Android 6.0 (Marshmallow)', '8 MP', '13 MP', '8GB', '16 GB', '2 SIM, Micro SIM', '3000mA'),
(10, 6, 'AMOLED, 4.7\", HD', 'Windows Phone 8.1 (Nâng cấp lên Windows 10)', '5 MP', '6.7 MP', '16GB', '4GB', '2 SIM, Micro SIM', '3400mA'),
(12, 10, 'LED-backlit IPS LCD, 5.5\", Retina HD', 'iOS 9', '8 MP', '12 MP', '4GB', '64 GB', '1 SIM, Nano SIM', '2750 mAh'),
(16, 15, 'IPS LCD, 6\", Full HD', 'Android 6.0 (Marshmallow)', '16 MP', '21.5 MP', '3 GB', '16 GB', '2 SIM, Nano SIM', '2700 mAh'),
(17, 16, 'IPS LCD, 6', 'Android 5.0 (Lollipop)', '16 MP', '21.5 MP', '3 GB', '16 GB', '2 SIM, Nano SIM', '4000mA'),
(27, 1, 'IPS LCD, 5.5', 'Android 6.0 (Marshmallow)', '5 MP', '23 MP', '3 GB', '32 GB', 'Đang cập nhật, Nano SIM', '2900 mAh'),
(32, 21, 'IPS LCD, 5.5\", Full HD', 'Android 5.1 (Lollipop)', '5 MP', '23 MP', '3 GB', '16 GB', '1 SIM, Nano SIM', '2560 mAh'),
(33, 22, 'LED-backlit IPS LCD, 5.5\", Retina HD', 'iOS 10', '7 MP', 'Hai camera 12 MP', '3 GB', '32 GB', '1 SIM, Nano SIM', '2900 mAh'),
(34, 23, 'LED-backlit IPS LCD, 5.5\", Retina HD', 'iOS 9.3', '5 MP', '23 MP', '3 GB', '32 GB', '1 SIM, Nano SIM', '1560 mAh'),
(35, 24, 'IPS LCD, 5\", HD', 'Android 6.0 (Marshmallow)', '8 MP', '13 MP', '8GB', '32 GB', '1 SIM, Nano SIM', '2560 mAh'),
(36, 25, 'IPS LCD, 5.5\", Full HD', 'Android 6.0 (Marshmallow)', '8 MP', '16 MP', '8GB', '32 GB', '1 SIM, Nano SIM', '3400mA');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL,
  `add_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `phone`, `address`, `fullname`, `level`, `add_date`) VALUES
(1, 'hoangyen107', '670b14728ad9902aecba32e22fa4f6bd', 'admingg@gmail.com', 123456781, 'quận 2', 'Nguyễn Văn A', 1, NULL),
(2, 'hoangyen107', '25d55ad283aa400af464c76d713c07ad', 'heheh@gmail.com', 2147483647, 'quận 3', 'Tarin', 1, NULL),
(3, 'test', '96e79218965eb72c92a549dd5a330112', 'hehehfdsf@gmail.coms', 1234567890, 'quận 10', 'Trần Văn B', 2, NULL),
(4, 'test1', '96e79218965eb72c92a549dd5a330112', 'hehehsds@gmail.comsgjvj', 1234567890, 'quận 5', 'Lê Văn C', 2, NULL),
(5, 'hoàng yên ', '96e79218965eb72c92a549dd5a330112', 'test1@gmail.com', 123466789, 'quận 3', 'hoàng thị thanh yên ', 2, '0000-00-00 00:00:00'),
(6, 'testing', '670b14728ad9902aecba32e22fa4f6bd', 'test@gmail.com', 123456789, 'quận 3', 'testtest', 2, '0000-00-00 00:00:00'),
(8, 'test name', '96e79218965eb72c92a549dd5a330112', 'check@gmail.com', 123456789, 'quận 3, tphcm', 'check2nguyen', 2, '0000-00-00 00:00:00'),
(9, 'Dol Nguyen', '25d55ad283aa400af464c76d713c07ad', 'hihi@gmail.com', 1692686056, 'quan tam binh', 'Dol Nguyen', 2, '0000-00-00 00:00:00'),
(10, 'ZXcvbnm', '96e79218965eb72c92a549dd5a330112', 'hehehfdf@gmail.com222', 1234567899, 'sasfsdfsadfasdf', 'asdfghjklffff', 2, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `fk_comment_product` (`productID`),
  ADD KEY `fk_comment_user` (`userID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactID`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`imageID`),
  ADD KEY `fk_image_product` (`productID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOther`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `fk_product_category` (`categoryID`);

--
-- Indexes for table `productorders`
--
ALTER TABLE `productorders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_product` (`productID`),
  ADD KEY `fk_orders` (`idOther`);

--
-- Indexes for table `thongso`
--
ALTER TABLE `thongso`
  ADD PRIMARY KEY (`thongsoID`),
  ADD KEY `fk_thongso_product` (`productID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `imageID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `idOther` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `productorders`
--
ALTER TABLE `productorders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `thongso`
--
ALTER TABLE `thongso`
  MODIFY `thongsoID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_product` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`),
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`userID`) REFERENCES `user` (`id`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_image_product` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`);

--
-- Constraints for table `productorders`
--
ALTER TABLE `productorders`
  ADD CONSTRAINT `fk_orders` FOREIGN KEY (`idOther`) REFERENCES `orders` (`idOther`),
  ADD CONSTRAINT `fk_orders_product` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `thongso`
--
ALTER TABLE `thongso`
  ADD CONSTRAINT `fk_thongso_product` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
