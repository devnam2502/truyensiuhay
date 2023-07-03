-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 03, 2023 lúc 07:12 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `truyensiuhay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `binhluan_id` int(5) NOT NULL,
  `truyen_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `noidung` text NOT NULL,
  `NgayDang` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`binhluan_id`, `truyen_id`, `user_id`, `noidung`, `NgayDang`) VALUES
(1, 1, 1, 'Truyện hay lắm', '2023-05-31'),
(2, 1, 1, 'aaa', '2023-05-31'),
(3, 1, 1, 'khong the tin loi', '2023-05-31'),
(4, 10, 1, 'Truyện hay, nên xem', '2023-05-31'),
(5, 1, 1, 'aaa', '2023-06-01'),
(6, 2, 1, 'Đọc đi mọi ngừi', '2023-06-01'),
(7, 1, 3, 'Test', '2023-06-01'),
(8, 1, 3, 'Test num 2', '2023-06-01'),
(9, 1, 4, 'Test tiếp', '2023-06-01'),
(10, 24, 1, 'Truyện đỉnh cao', '2023-07-03'),
(11, 12, 1, 'Truyện rất cutoe', '2023-07-03'),
(12, 11, 1, 'Nữ chính xinh tóa uwub', '2023-07-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chapter`
--

CREATE TABLE `chapter` (
  `chapter_id` int(11) NOT NULL,
  `truyen_id` int(5) NOT NULL,
  `tenChapter` text NOT NULL,
  `soThuTu` float NOT NULL,
  `NgayDang` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chapter`
--

INSERT INTO `chapter` (`chapter_id`, `truyen_id`, `tenChapter`, `soThuTu`, `NgayDang`) VALUES
(1, 1, 'Mở Đâu', 1, '2023-05-30'),
(2, 2, 'Mở đầu', 1, '2023-05-30'),
(3, 1, '', 2, '2023-05-30'),
(8, 3, 'Mở đầu', 1, '2023-05-31'),
(10, 2, '', 2, '2023-06-01'),
(11, 4, '', 1, '2023-06-01'),
(12, 3, '', 2, '2023-06-01'),
(13, 4, '', 2, '2023-06-01'),
(14, 4, '', 3, '2023-06-01'),
(15, 10, '', 1, '2023-06-01'),
(16, 11, '', 1, '2023-07-03'),
(17, 11, '', 2, '2023-07-03'),
(18, 11, '', 3, '2023-07-03'),
(19, 11, '', 4, '2023-07-03'),
(20, 11, '', 5, '2023-07-03'),
(21, 12, '', 1, '2023-07-03'),
(22, 13, '', 1, '2023-07-03'),
(23, 14, '', 1, '2023-07-03'),
(24, 15, '', 1, '2023-07-03'),
(25, 16, '', 1, '2023-07-03'),
(26, 17, '', 1, '2023-07-03'),
(27, 18, '', 1, '2023-07-03'),
(28, 19, '', 1, '2023-07-03'),
(29, 19, '', 2, '2023-07-03'),
(30, 20, '', 1, '2023-07-03'),
(31, 20, '', 2, '2023-07-03'),
(32, 20, '', 3, '2023-07-03'),
(33, 21, '', 1, '2023-07-03'),
(34, 22, '', 1, '2023-07-03'),
(35, 23, '', 1, '2023-07-03'),
(36, 24, '', 1, '2023-07-03'),
(37, 10, '', 2, '2023-07-03'),
(38, 25, '', 1, '2023-07-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lienhe`
--

CREATE TABLE `tbl_lienhe` (
  `id` int(11) NOT NULL,
  `thongtinlienhe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_lienhe`
--

INSERT INTO `tbl_lienhe` (`id`, `thongtinlienhe`) VALUES
(1, '<ol>\n	<li>\n	<h3>Số điện thoại :<strong> </strong>0775245933 Minh Nguyễn</h3>\n	</li>\n	<li>\n	<h3>Zalo : 0775245933 Nguyễn Anh Minh</h3>\n	</li>\n	<li>\n	<h3>Fb :<a href=\"#\"> facebook.com/minhnguyen</a></h3>\n	</li>\n</ol>\n\n<h3>&nbsp;</h3>\n\n<h3>&nbsp;</h3>\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `theloai_id` int(5) NOT NULL,
  `tenTheloai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`theloai_id`, `tenTheloai`) VALUES
(1, 'Hành động'),
(2, 'Phiêu lưu'),
(3, 'Chuyển sinh'),
(4, 'Comedy'),
(5, 'Tragedy'),
(6, 'Comic'),
(7, 'Nấu ăn'),
(8, 'Cổ Đại'),
(9, 'Drama'),
(10, 'Giả tưởng'),
(11, 'Thần bí'),
(12, 'Kinh dị'),
(13, 'Tâm lý'),
(14, 'Lãng mạn'),
(15, 'Học đường'),
(16, 'Đời thường'),
(17, 'Mecha'),
(18, 'Ngôn tình'),
(19, 'Thể thao'),
(20, 'Võ thuật'),
(21, 'Lịch sử'),
(22, 'Manga'),
(23, 'Manhwa'),
(24, 'Manhua'),
(25, 'Xuyên không'),
(26, 'Siêu nhiên'),
(27, 'Trinh thám'),
(28, 'Khoa học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theodoi`
--

CREATE TABLE `theodoi` (
  `theodoi_id` int(11) NOT NULL,
  `truyen_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `theodoi`
--

INSERT INTO `theodoi` (`theodoi_id`, `truyen_id`, `user_id`) VALUES
(2, 0, 1),
(14, 10, 1),
(20, 13, 1),
(21, 20, 1),
(22, 1, 1),
(23, 12, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truyen`
--

CREATE TABLE `truyen` (
  `truyen_id` int(6) NOT NULL,
  `tenTruyen` text NOT NULL,
  `noidung` text NOT NULL DEFAULT 'Chưa có mô tả',
  `tacgia` text DEFAULT NULL,
  `anhbia` varchar(255) DEFAULT NULL,
  `folder` varchar(255) DEFAULT NULL,
  `so_chuong` float NOT NULL DEFAULT 0,
  `NgayDang` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `truyen`
--

INSERT INTO `truyen` (`truyen_id`, `tenTruyen`, `noidung`, `tacgia`, `anhbia`, `folder`, `so_chuong`, `NgayDang`) VALUES
(1, 'Thanh gươm diệt quỷ', 'Kimetsu no Yaiba – Tanjirou là con cả của gia đình vừa mất cha. Một ngày nọ, Tanjirou đến thăm thị trấn khác để bán than, khi đêm về cậu ở nghỉ tại nhà người khác thay vì về nhà vì lời đồn thổi về ác quỷ luôn rình mò gần núi vào buổi tối. Khi cậu về nhà vào ngày hôm sau, bị kịch đang đợi chờ cậu…', 'Gotouge Koyoharu', 'uploads\\Thanh_Guom_Diet_Quy\\thanh-guom-diet-quy.jpg', 'uploads\\Thanh_Guom_Diet_Quy', 6, '2023-05-30'),
(2, 'Nguyên Tôn', 'Một Tác Phẩm Mới Của Thiên Tằm Thổ Đậu Ta Có Một Ngụm Huyền Hoàng Khí, Có Thể Nuốt Thiên Địa Nhật Nguyệt Tinh. ......... Lúc Đó Đường Về, Đã Là Một Con Đường Vận Mệnh Treo Ngược. Ngày Xưa Vinh Hoa, Như Thay Đổi Khôn Lường, Một Giấc Ác Mộng Dài. Thiếu Niên Chấp Bút, Long Xà Bay Động. Là Vì Một Vòng Quang Mang Bổ Ra Dáng Vẻ Nặng Nề Chi Loạn Thế, Vấn Đỉnh Điện Ngọc Thương Khung. Đường Báo Thù, Cùng Ta Đồng Hành. Một Ngụm Huyền Hoàng Chân Khí Nhất Định Nuốt Thiên Địa Nhật Nguyệt Tinh Thần, Hùng Thị Cỏ Cây Thương Sinh. Thiết Họa Tịch Chiếu, Vụ Ải Ngân Câu, Bút Tẩu Du Long Xông Cửu Châu. Hoành Tư Thiên Hạ, Mực Vẩy Thanh Sơn, Thôn Tính Biển Hồ Nạp Trăm Sông.', '', 'uploads\\Nguyen_Ton\\nguyen-ton.jpg', 'uploads\\Nguyen_Ton', 2, '2023-05-09'),
(3, 'Onepunch Man', 'Onepunch-Man là một Manga thể loại siêu anh hùng với đặc trưng phồng tôm đấm phát chết luôn… Lol!!! Nhân vật chính trong Onepunch-man là Saitama, một con người mà nhìn đâu cũng thấy “tầm thường”, từ khuôn mặt vô hồn, cái đầu trọc lóc, cho tới thể hình long tong. Tuy nhiên, con người nhìn thì tầm thường này lại chuyên giải quyết những vấn đề hết sức bất thường. Anh thực chất chính là một siêu anh hùng luôn tìm kiếm cho mình một đối thủ mạnh. Vấn đề là, cứ mỗi lần bắt gặp một đối thủ tiềm năng, thì đối thủ nào cũng như đối thủ nào, chỉ ăn một đấm của anh là… chết luôn. Liệu rằng Onepunch-Man Saitaman có thể tìm được cho mình một kẻ ác dữ dằn đủ sức đấu với anh? Hãy theo bước Saitama trên con đường một đấm tìm đối cực kỳ hài hước của anh!!', 'Murata Yuusuke', 'uploads\\Onepunch_Man\\onepunch-man.jpg', 'uploads\\Onepunch_Man', 2, '2023-05-30'),
(4, 'Chú Thuật Hồi Chiến', 'Yuuji Itadori là một thiên tài có tốc độ và sức mạnh, nhưng cậu ấy muốn dành thời gian của mình trong Câu lạc bộ Tâm Linh. Một ngày sau cái chết của ông mình, anh gặp Megumi Fushiguro, người đang tìm kiếm vật thể bị nguyền rủa mà các thành viên CLB đã tìm thấy.   Đối mặt với những con quái vật khủng khiếp bị \"Ám\", Yuuji nuốt vật thể bị phong ấn để có được sức mạnh của nó và cứu bạn bè của mình! Nhưng giờ Yuuji là người bị \"Ám\", và cậu ấy sẽ bị kéo vào thế giới ma quỷ ly kỳ của Megumi và những con quái vật độc ác ...', 'Akutami Gege', 'uploads\\Chu_Thuat_Hoi_Chien\\chu-thuat-hoi-chien.jpg', 'uploads\\Chu_Thuat_Hoi_Chien', 3, '2023-05-30'),
(10, 'Mashle', 'Ngày Xửa Ngày Xưa, Có Một Thế Giới Nơi Phép Thuật Có Thể Chi Phối Mọi Thứ. Nhưng Sâu Trong Rừng Có Một Thanh Niên Dành Thời Gian Để Luyện Tập Cơ Bắp. Mặc Dù Không Thể Sử Dụng Phép Thuật, Nhưng Cậu Ta Có Một Cuộc Sống Yên Bình Với Cha Mình. Rồi Một Ngày, Cuộc Sống Của Cậu Gặp Nguy Hiểm! Cơ Thể Của Saitama Sẽ Bảo Vệ Cậu Ta Khỏi Những Pháp Sư? Cơ Bắp Được Luyện Tập Của Cậu Có Thể Sánh Vai Với Các Pháp Sư Ưu Tú ...? Câu Chuyện Về Saitama Ở Hogwarts Bắt Đầu!', 'Hajime Komoto', 'uploads\\Mashle\\banner.jpg', 'uploads\\Mashle', 2, '2023-06-01'),
(11, 'Bí Mật Của Idol', 'Hiruno Hizashi, một học sinh trung học năm nhất vừa bước chân vào một ngôi trường chuyên dành cho những người ưu tú. Nhưng cuộc đời đưa đẩy cậu lại mắc phải lỗi ngớ ngẩn và bị điểm liệt phải phụ đạo. Cứ tưởng cuộc đời trung học của cậu kết thúc từ đây nhưng thần romcom say \"đéo\" và ghép cậu chung với một Idol tầm cỡ nơi mọi sự chú ý dồn về một hướng.\r\n\r\n\"Từ nay về sau... Cậu sẽ học cùng tớ chứ', 'Amane Kashiko', 'uploads\\Bi_Mat_Cua_Idol\\banner.jpg', 'uploads\\Bi_Mat_Cua_Idol', 5, '2023-07-01'),
(12, 'Ống nhòm 10.000 năm ánh sáng', 'Một cô bé tên Sihil đã được tặng một ống nhòm nhìn xa 10.000 năm ánh sáng. Hào hứng, cô liền đưa lên mắt để nhìn ra ngoài vũ trụ. Bỗng cô nhìn thấy một cậu bé người Trái Đất, và rồi....', 'Arata Narumi', 'uploads\\10000_Lightyear_Binoculars\\banner.jpg', 'uploads\\10000_Lightyear_Binoculars', 1, '2023-07-02'),
(13, 'VERSUS THE EARTH', 'Vào năm 20xx, Trái Đất đã tự sinh ra hệ thống miễn dịch để tiêu diệt con người là virus đang kí sinh. Họ phải làm gì để chống lại hệ thống miễn dịch này?!', 'WATANABE Yoshitomo', 'uploads\\VERSUS_THE_EARTH\\banner.jpg', 'uploads\\VERSUS_THE_EARTH', 1, '2023-07-02'),
(14, 'Chuyển sinh thành slime', 'Một manga khác chuyển thể từ light novel đang hot ở nhật. Một anh chàng bị tên cướp đâm chết khi đang gặp vợ chưa cưới của đồng nghiệp. Khi đang thoi thóp trước khi chết, người đầy máu, anh ta nghe được một tiếng nói kỳ lạ. Giọng nói ấy chuyển thể sự tiếc nuối của anh chàng vì vẫn còn tân trước khi đi và ban cho anh ta chiêu thức đặc biệt [tiên nhân vĩ đại]. Liệu đây có phải là trò đùa?', 'Fuse, KAWAKAMI Taiki', 'uploads\\Tensei_shitara_slime_datta_ken\\banner.jpg', 'uploads\\Tensei_shitara_slime_datta_ken', 1, '2023-06-25'),
(15, 'Bungou Stray Dogs', 'Nakajima Atsushi bị đá đít ra khỏi cái cô nhi viện , không còn nơi nào để đi cũng như không có gì để ăn. Khi đang đứng ở một bờ sông, đang chết đói, anh đã cứu sống được một thằng cha cuồng tự tử. Là Dazai Osamu, và cộng sự của anh ta là Kunikida là thành viên của một tổ chức thám tử đặc biệt. Họ có những năng lực siêu nhiên và chuyên đối phó với những vụ quá nguy hiểm cho cảnh sát và quân đội. Họ đang theo dõi một con hổ xuất hiện dạo gần đây ở nơi đó , và cũng trong khoảng thời gian Atsushi đến thành phố này. Nó dường như là có một sự kết nối nào đó với Atsushi, và khi mọi chuyện đã được giải quyết xong xuôi thì có vẻ như trong tương lai thì Atsushi sẽ gắn bó với Dazai và đội thám tử bí ẩn đó nhiều nữa ...', 'Asagiri Kafuka - Hoshikawa Shiwasu', 'uploads\\Bungou_stray_dogs\\banner.jpg', 'uploads\\Bungou_stray_dogs', 1, '2023-06-14'),
(16, 'Đại khâu giáp sư', 'Một cái bí mật kinh tâm ẩn giấu, một cái đại khâu giáp thuật, 9 cái xúc xắc thần bí quỷ dị, người kế thừa huyết mạch của thần, sứ mệnh trùng kiến thần tộc...Đối mặt với rất nhiều chuyện đột nhiên tới như vậy, thiếu niên bị thần phạt sẽ làm thế nào ? Hắn là thiếu niên khiến toàn trấn nhức đầu, nhưng lại là người con hiếu thuận, hắn là tượng sư nửa đường, cũng không hề thua kém các danh môn chính phái, hắn nửa chính nửa tà, yêu ghét phân minh, hắn rất thông minh, nhưng không hề dùng tới, hắn có thiên phú dị năng, nhưng lại dùng để vui chơi, hắn tính vốn lười nhác hào hiệp, nhưng đột nhiên lại gánh trọng trách trùng kiến thần tộc.', 'Đường Gia Tam Thiếu', 'uploads\\Dai_khau_giap_su\\banner.jpg', 'uploads\\Dai_khau_giap_su', 1, '2023-05-17'),
(17, 'Isekai Tensei de Kenja ni Natte Bouken-sha Seikatsu', 'Main bị toa xe chở hàng đụng chết rồi xuyên không tới thế giới khác. Nơi những Quái vật ma thuật, mà ở thế giới của main đã tuyệt chủng, vẫn còn tồn tại. Main phải làm sao để sống sót trong thế giới cổ đại và lập nên dàn harem bao gồm những em loli đây. Đón xem!', '', 'uploads\\Isekai_Tensei_de_Kenja_ni_Natte_Bouken-sha_Seikatsu\\banner.jpg', 'uploads\\Isekai_Tensei_de_Kenja_ni_Natte_Bouken-sha_Seikatsu', 1, '2023-06-06'),
(19, 'Re:ZERO -Starting Life in Another World- The Frozen Bond', 'Manga dựa trên một OVA của Re:Zero, xoay quanh Emilia và cuộc gặp gỡ của cô với Puck trong cuộc hành trình đến biệt thự Roswaal để trở thành ứng cử viên cho cuộc bầu cử hoàng gia.', 'Nagatsuki Tappei, Minori Tsukahara, Shinichirou Otsuka', 'uploads\\ReZero_Ova\\banner.jpg', 'uploads\\ReZero_Ova', 2, '2023-06-17'),
(20, 'Re:Zero kara Hajimeru Isekai Seikatsu', 'Subaru Natsuki bị triệu hồi tới một thế giới khác khi đang trên đường về từ của hàng tiện lợi.', 'NAGATSUKI Tappei, MATSUE Daichi, FUUGETSU Makoto', 'uploads\\ReZero_vol1\\banner.jpg', 'uploads\\ReZero_vol1', 3, '2023-06-08'),
(21, 'Re:zero Kara Hajimeru Isekai Seikatsu - Daisshou - Outo No Ichinichi Hen', 'Subaru Natsuki bị triệu hồi tới một thế giới khác khi đang trên đường về từ của hàng tiện lợi.', 'NAGATSUKI Tappei, MATSUE Daichi, FUUGETSU Makoto', 'uploads\\ReZero_vol2\\banner.jpg', 'uploads\\ReZero_vol2', 1, '2023-07-01'),
(22, 'Re:zero Kara Hajimeru Isekai Seikatsu - Truth Of Zero', 'Phần tiếp theo của Re:zero Kara Hajimeru Isekai Seikatsu - Daisshou - Outo No Ichinichi Hen với nét vẽ mới của Matsuse Daichi\r\n\r\nMột học sinh trung học đột nhiên bị triệu hồi đến thế giới khác từ cửa hàng tạp hóa. với những nghi vấn khác nhau và không biết ai là người triệu hồi mình.\r\nCùng hợp tác với một cô gái nửa tiên nửa người subaru nhận ra rằng mình có thể đảo ngược thời gian khi đã chết.', 'Nagatsuki Tappei, Matsuse Daichi', 'uploads\\ReZero_vol3\\banner.jpg', 'uploads\\ReZero_vol3', 1, '2023-06-12'),
(23, 'Re:Zero arc 4: Thánh Địa và Phù Thủy Tham Lam', 'Phần tiếp theo của arc 3, và phần nối tiếp sau kết thúc thực sự của season 1, Subaru cùng Emilia vướng vào những rắc rối mới ở vùng đất gọi là Thánh Địa, nơi an nghỉ của Phù Thủy Tham Lam', 'Nagatsuki Tappei', 'uploads\\ReZero_vol4\\banner.jpg', 'uploads\\ReZero_vol4', 1, '2023-07-03'),
(24, 'Re:Zero ngoại truyện: Khúc tình ca của Quỷ Kiếm', 'Khi ác quỷ say đắm thiên thần...\r\n\r\nRất lâu về trước, nội chiến đã nổ ra giữa quân đội vương quốc Lugnica và phe Á Nhân. Một vị anh hùng được sinh ra vào ngay thời điểm này, Quỷ Kiếm, Wilhelm Trias. Đây là câu chuyện giữa vị kiếm sĩ huyền thoại và người phụ nữ anh phải lòng. Câu chuyện này xảy ra trước khi Subaru bị dịch chuyển đến Lugnica vài chục năm...', 'Nagatsuki Tappei, Tsubata Nozaki', 'uploads\\ReZero_ngoaitruyen\\banner.jpg', 'uploads\\ReZero_ngoaitruyen', 1, '2023-07-03'),
(25, 'TỬ LINH PHÁP SƯ', 'Trò chơi trở thành hiện thực, quy tắc của thế giới bị lật đổ và nhân loại bước vào kỷ nguyên toàn dân chuyển chức. Chỉ có thể trở thành người chuyển chức! Nâng cấp và trở nên mạnh mẽ hơn! Đứng trên đỉnh thế giới! Vào ngày chuyển chức, Lâm Mặc Ngữ, trở thành kẻ nghề ẩn chức nghiệp duy nhất, gọi hồn - tử linh pháp sư. Kể từ đó, các linh vật được triệu hồi không chết, thì Lâm Mặc Ngữ vẫn sẽ bình yên vô sự. “Ta ngồi cao trên ngai vàng bằng xương, đi giữa sự sống và cái chết.” “Ta chính là thiên tai!”', '', 'uploads\\Tu_Linh_Phap_Su\\banner.jpg', 'uploads\\Tu_Linh_Phap_Su', 1, '2023-06-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truyen_theloai`
--

CREATE TABLE `truyen_theloai` (
  `truyen_id` int(5) NOT NULL,
  `theloai_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `truyen_theloai`
--

INSERT INTO `truyen_theloai` (`truyen_id`, `theloai_id`) VALUES
(2, 1),
(2, 2),
(2, 24),
(2, 25),
(3, 1),
(3, 26),
(3, 20),
(3, 22),
(1, 1),
(1, 20),
(1, 21),
(1, 22),
(1, 2),
(1, 10),
(4, 1),
(4, 2),
(4, 26),
(4, 15),
(4, 20),
(4, 22),
(10, 1),
(10, 2),
(10, 26),
(10, 10),
(10, 22),
(11, 4),
(11, 14),
(11, 15),
(12, 28),
(12, 9),
(12, 14),
(12, 16),
(13, 1),
(13, 12),
(13, 28),
(13, 26),
(13, 22),
(14, 1),
(14, 2),
(14, 3),
(14, 4),
(14, 10),
(14, 22),
(14, 25),
(15, 1),
(15, 22),
(15, 27),
(16, 24),
(16, 2),
(16, 1),
(16, 10),
(16, 26),
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(17, 22),
(19, 2),
(19, 3),
(19, 1),
(19, 14),
(19, 22),
(19, 13),
(19, 4),
(19, 9),
(19, 5),
(19, 26),
(19, 10),
(20, 1),
(20, 2),
(20, 3),
(20, 4),
(20, 10),
(20, 14),
(20, 22),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(21, 10),
(21, 14),
(21, 22),
(22, 1),
(22, 3),
(22, 2),
(22, 4),
(22, 10),
(22, 14),
(22, 22),
(23, 1),
(23, 2),
(23, 3),
(23, 14),
(23, 10),
(23, 22),
(23, 4),
(24, 2),
(24, 1),
(24, 3),
(24, 4),
(24, 14),
(24, 10),
(24, 22),
(25, 1),
(25, 24),
(25, 10),
(25, 26),
(25, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `tentaikhoan` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` varchar(10) DEFAULT NULL,
  `role` text NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_users`, `tentaikhoan`, `email`, `matkhau`, `dienthoai`, `role`) VALUES
(1, 'Admin', 'Admin@gmail.com', '123456a', '0775245933', 'admin'),
(3, 'Minh Dzai', 'minhvip15964@gmail.com', '123456798a', '0775245933', 'member'),
(4, 'Minh không béo', 'minhvip15965@gmail.com', '123456abc', '0775245933', 'member');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`binhluan_id`);

--
-- Chỉ mục cho bảng `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chapter_id`);

--
-- Chỉ mục cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`theloai_id`);

--
-- Chỉ mục cho bảng `theodoi`
--
ALTER TABLE `theodoi`
  ADD PRIMARY KEY (`theodoi_id`);

--
-- Chỉ mục cho bảng `truyen`
--
ALTER TABLE `truyen`
  ADD PRIMARY KEY (`truyen_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `binhluan_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `chapter`
--
ALTER TABLE `chapter`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `theloai_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `theodoi`
--
ALTER TABLE `theodoi`
  MODIFY `theodoi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `truyen`
--
ALTER TABLE `truyen`
  MODIFY `truyen_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
