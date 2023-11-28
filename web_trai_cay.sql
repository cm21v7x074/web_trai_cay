-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 05:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_trai_cay`
--

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

DROP TABLE IF EXISTS `chi_tiet_don_hang`;
CREATE TABLE `chi_tiet_don_hang` (
  `id_don_hang` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

DROP TABLE IF EXISTS `danh_muc`;
CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `ten_danh_muc`) VALUES
(1, 'Khuyến mãi'),
(2, 'Sự kiện');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

DROP TABLE IF EXISTS `don_hang`;
CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `id_nguoi_dung` int(11) NOT NULL,
  `thoi_gian_dat_hang` date NOT NULL,
  `thoi_gian_giao_hang` date NOT NULL,
  `id_trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

DROP TABLE IF EXISTS `gio_hang`;
CREATE TABLE `gio_hang` (
  `id_nguoi_dung` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gio_hang`
--

INSERT INTO `gio_hang` (`id_nguoi_dung`, `id_san_pham`, `so_luong`) VALUES
(1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `loai_san_pham`
--

DROP TABLE IF EXISTS `loai_san_pham`;
CREATE TABLE `loai_san_pham` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `hinh_anh` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`id`, `ten`, `hinh_anh`) VALUES
(1, 'Trái Cây', NULL),
(2, 'Rau Củ', NULL),
(4, 'Nước Ngọt', NULL),
(5, 'Đồ Hộp', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

DROP TABLE IF EXISTS `nguoi_dung`;
CREATE TABLE `nguoi_dung` (
  `id` int(11) NOT NULL,
  `ten_nguoi_dung` varchar(255) NOT NULL,
  `sdt_nguoi_dung` varchar(10) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `hinh_dai_dien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `ten_nguoi_dung`, `sdt_nguoi_dung`, `dia_chi`, `mat_khau`, `email`, `role`, `hinh_dai_dien`) VALUES
(1, 'admin', '0987654321', 'admin', '123456', 'admin@gmail.com', 'admin', ''),
(2, 'sanza1610', '098754321', '160 levantho', '123456', 'sanza1610@gmail.com', 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `nguon_goc`
--

DROP TABLE IF EXISTS `nguon_goc`;
CREATE TABLE `nguon_goc` (
  `id` int(11) NOT NULL,
  `xuat_xu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguon_goc`
--

INSERT INTO `nguon_goc` (`id`, `xuat_xu`) VALUES
(1, 'Anh'),
(2, 'Pháp'),
(3, 'Đức'),
(4, 'Mỹ'),
(5, 'Trung Quốc');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

DROP TABLE IF EXISTS `san_pham`;
CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `can_nang` varchar(255) NOT NULL,
  `gia_tien` int(11) NOT NULL DEFAULT 0,
  `id_nguon_goc` int(11) NOT NULL,
  `id_loai_san_pham` int(11) NOT NULL,
  `hinh_anh` text NOT NULL,
  `gia_khuyen_mai` int(11) NOT NULL DEFAULT 0,
  `noi_dung` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten_san_pham`, `can_nang`, `gia_tien`, `id_nguon_goc`, `id_loai_san_pham`, `hinh_anh`, `gia_khuyen_mai`, `noi_dung`) VALUES
(5, 'Cam', '15kg', 500000, 2, 1, 'https://dacsancamvinh.net/wp-content/uploads/2015/06/cong-dung-qua-cam.jpg', 0, 'Mô Tả Cam'),
(6, 'Táo', '12kg', 100000, 4, 1, 'https://newfreshfoods.com.vn//datafiles/3/2018-02-27/thumb_16100958642348_tao-do-my-red-delicious-size-36-44.jpg', 0, 'Mô Tả Táo'),
(8, 'Coca Cola', '10kg', 100000, 5, 4, 'https://product.hstatic.net/200000356473/product/cocacola-chai-390ml_7214ffae946e4e63826e8f38a45ed5fa_grande.jpg', 0, 'Chi tiet Coca Cola');

-- --------------------------------------------------------

--
-- Table structure for table `tin_tuc`
--

DROP TABLE IF EXISTS `tin_tuc`;
CREATE TABLE `tin_tuc` (
  `id` int(11) NOT NULL,
  `tieu_de` varchar(255) DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `noi_dung` text DEFAULT NULL,
  `id_danh_muc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tin_tuc`
--

INSERT INTO `tin_tuc` (`id`, `tieu_de`, `hinh_anh`, `noi_dung`, `id_danh_muc`) VALUES
(1, 'Còn bao nhiêu ngày nữa đến Tết 2024? Đếm ngược Tết 2024', 'https://cdn.tgdd.vn/Files/2022/02/08/1414401/con-bao-nhieu-ngay-nua-den-tet-2023-dem-nguoc-tet-2023-202302161150114327.jpg', 'Còn bao nhiêu ngày đến Tết 2024? Hôm nay là Thứ ba, ngày 28/11/2023 (DL) - 16/11 (AL). Vậy là còn 74 ngày nữa là đến Tết Nguyên đán 2024.\r\nXem nhanh\r\n1. Còn bao nhiêu ngày nữa đến Tết Tây 2024?\r\n2. Còn bao nhiêu ngày nữa đến Tết Nguyên đán 2024?\r\n3. Tết 2024 được nghỉ mấy ngày?\r\n Tết Nguyên đán 2024 được nghỉ mấy ngày?\r\n Tết Dương lịch 2024 được nghỉ mấy ngày?\r\n4. Tết Nguyên đán (Tết ta) 2024 là ngày mấy?\r\n5. Vì sao cần đếm ngược Tết Nguyên đán Giáp Thìn?\r\n6. Gợi ý mâm ngũ quả ngày Tết đẹp\r\n7. Gợi ý các câu chúc Tết hay\r\nHÔM NAY: Thứ ba, 28/11/2023 (Dương lịch)\r\n16/10/2023 (Âm lịch)\r\nChỉ còn\r\n73 NGÀY\r\n00 giờ 46 phút 29 giây\r\nlà đến Tết Nguyên Đán\r\nTết Nguyên Đán diễn ra vào Thứ bảy, 10/02/2024 (Dương lịch)\r\n01/01/2024 (Âm lịch)\r\nCòn bao nhiêu ngày nữa đến Tết Tây 2024? Còn bao nhiêu ngày nữa đến Tết Nguyên đán 2024? Còn bao nhiêu ngày nữa đến giao thừa 2024? Tết 2024 được nghỉ mấy ngày? Đây là những câu hỏi mà nhiều người quan tâm, muốn biết nhất hiện nay. Hãy cùng Bách hóa XANH tìm hiểu chi tiết qua bài viết sau nhé!\r\n\r\n1Còn bao nhiêu ngày nữa đến Tết Tây 2024?\r\nNăm 2023 có 365 ngày, nếu tính từ ngày 27/09/2023 thì sẽ còn 94 ngày nữa đến ngày giao thừa, tức ngày 31/12/2023 (Chủ nhật) và 95 ngày sẽ bước sang mùng 1 Tết Dương lịch 2024, tức ngày 1/1/2024 (Thứ 2).\r\n\r\n', 1),
(2, 'Oishi nay có trà sữa Tealy với 2 hương vị trendy, ngon mê ly', 'https://cdn.tgdd.vn/Files/2023/11/27/1556049/oishi-nay-co-tra-sua-tealy-voi-2-huong-vi-trendy-ngon-me-ly-202311271337176723.jpg', 'Trà sữa là thức uống được yêu thích của nhiều người, đặc biệt là giới trẻ. Nhằm đáp ứng nhu cầu của thị trường, thương hiệu Oishi đã cho ra mắt dòng trà sữa Tealy với 2 hương vị trendy, ngon mê ly. Cùng tìm hiểu về sản phẩm này nhé!\r\n\r\n1Đôi nét về thương hiệu Oishi\r\nOishi là một thương hiệu snacks và đồ uống nổi tiếng của Philippines, được thành lập vào năm 1946. Thương hiệu hiện đang có mặt tại hơn 20 quốc gia trên thế giới, trong đó có Việt Nam.\r\n\r\nĐôi nét về thương hiệu Oishi\r\nĐôi nét về thương hiệu Oishi\r\n\r\nOishi được biết đến với các sản phẩm snacks đa dạng, từ snack tôm, snack khoai tây, snack bắp, snack hành,... đến các loại đồ uống như trà, cà phê, nước giải khát,... Các sản phẩm của Oishi được sản xuất theo quy trình hiện đại, đảm bảo chất lượng và an toàn vệ sinh thực phẩm.\r\n\r\nNăm 1996, Công ty Liwayway Corporation của Philippines đã thành lập Công ty Công nghiệp Thực phẩm Liwayway Việt Nam tại Thành phố Hồ Chí Minh, nhanh chóng trở nên phổ biến và được nhiều người yêu thích. Trải qua hơn 25 năm phát triển tại Việt Nam, Oishi đã trở thành một trong những thương hiệu snacks hàng đầu tại thị trường Việt Nam.\r\n\r\n2Các loại trà sữa Tealy của Oishi có gì đặc biệt?\r\nOishi Tealy có 2 loại trà sữa chính là trà sữa truyền thống và trà sữa đường nâu. Cả hai loại trà sữa đều được làm từ nguyên liệu chất lượng cao, bao gồm trà đen, sữa tươi và đường.\r\n\r\nTrà sữa Tealy truyền thống\r\nTrà sữa Tealy vị truyền thống\r\nTrà sữa Tealy vị truyền thống\r\n\r\nTrà sữa Tealy được đóng chai nhựa PET 320ml với thiết kế hiện đại, bắt mắt. Chai nhựa có màu trắng trong suốt, giúp người dùng dễ dàng quan sát màu sắc của trà sữa. Trên bao bì chai có đầy đủ thông tin về sản phẩm, bao gồm thành phần, cách sử dụng,...\r\n\r\nTrà sữa truyền thống của Oishi có hương vị trà đen đậm đà, kết hợp cùng vị béo ngọt của sữa tươi. Trà sữa có màu nâu cánh gián đẹp mắt, vị ngọt vừa phải, không quá gắt.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai`
--

DROP TABLE IF EXISTS `trang_thai`;
CREATE TABLE `trang_thai` (
  `id` int(11) NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trang_thai`
--

INSERT INTO `trang_thai` (`id`, `ten_trang_thai`) VALUES
(2, 'Thất Bại'),
(3, 'Đang Xử Lý'),
(4, 'Đã Nhận'),
(5, 'Thành Công');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD KEY `id_san_pham` (`id_san_pham`),
  ADD KEY `id_don_hang` (`id_don_hang`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nguoi_dung` (`id_nguoi_dung`),
  ADD KEY `id_trang_thai` (`id_trang_thai`);

--
-- Indexes for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD KEY `id_nguoi_dung` (`id_nguoi_dung`),
  ADD KEY `id_san_pham` (`id_san_pham`);

--
-- Indexes for table `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguon_goc`
--
ALTER TABLE `nguon_goc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_loai_san_pham` (`id_loai_san_pham`),
  ADD KEY `id_nguon_goc` (`id_nguon_goc`);

--
-- Indexes for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trang_thai`
--
ALTER TABLE `trang_thai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nguon_goc`
--
ALTER TABLE `nguon_goc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trang_thai`
--
ALTER TABLE `trang_thai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`),
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id`);

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`),
  ADD CONSTRAINT `don_hang_ibfk_2` FOREIGN KEY (`id_trang_thai`) REFERENCES `trang_thai` (`id`);

--
-- Constraints for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`),
  ADD CONSTRAINT `gio_hang_ibfk_2` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`);

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`id_loai_san_pham`) REFERENCES `loai_san_pham` (`id`),
  ADD CONSTRAINT `san_pham_ibfk_2` FOREIGN KEY (`id_nguon_goc`) REFERENCES `nguon_goc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
