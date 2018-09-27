-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 05, 2018 lúc 10:19 AM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hotel_booking`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `total_money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`id`, `user_id`, `room_id`, `check_in`, `check_out`, `total_money`) VALUES
(1, 1, 2, '2018-05-05', '2018-05-06', 1926000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorite_hotel`
--

CREATE TABLE `favorite_hotel` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `favorite_hotel`
--

INSERT INTO `favorite_hotel` (`id`, `user_id`, `hotel_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `distance_to_centre` double NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `park` tinyint(1) NOT NULL,
  `elevator` tinyint(1) NOT NULL,
  `restaurant` tinyint(1) NOT NULL,
  `coffee` tinyint(1) NOT NULL,
  `bar` tinyint(1) NOT NULL,
  `swimming_pool` tinyint(1) NOT NULL,
  `spa` tinyint(1) NOT NULL,
  `gym` tinyint(1) NOT NULL,
  `pets` tinyint(1) NOT NULL,
  `lowest_price` double NOT NULL,
  `stars` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rate` double NOT NULL,
  `number_of_rate` int(11) NOT NULL,
  `img_folder` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `description`, `city`, `address`, `distance_to_centre`, `wifi`, `park`, `elevator`, `restaurant`, `coffee`, `bar`, `swimming_pool`, `spa`, `gym`, `pets`, `lowest_price`, `stars`, `type`, `rate`, `number_of_rate`, `img_folder`) VALUES
(1, 'The Ann Hanoi', 'Khách Sạn The Ann Hanoi có địa chỉ tại số 38A Hàng Chuối, Q. Hai Bà Trưng, Hà Nội. Khách sạn nằm gần trung tâm thành phố, phía Nam của khu phố Cổ. Cách hồ Hoàn Kiếm và trung tâm mua sắm giải trí hàng đầu của thành phố chừng 10 phút đi bộ và 40 phút taxi để tới sân bay.\r\n\r\nKhách Sạn The Ann Hanoi có 150 phòng nghỉ được chia làm 3 loại: Suite, Premium, Deluxe. Các phòng đều được thiết kế đế đáp ứng sự mong đợi của khách quốc tế. Khi đặt phòng Khách Sạn The Ann Hanoi, du khách sẽ hoàn toàn hài lòng về dịch vụ và giá cả tại đây. Với phong cách phục vụ chuyên nghiệp và sự thân thiện của nhân viên khách sạn, du khách sẽ được nghỉ ngơi thoải mái sau những ngày làm việc căng thẳng hay tận hưởng những giây phút ấn tượng và khó quên bên gia đình và những người thân yêu.', 'Hà Nội', '38A Hàng Chuối, Hai Bà Trưng', 2.6, 1, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1578000, 4, 'hotel', 9, 1, 'hotel/1'),
(2, 'Hồ Hoàn Kiếm', 'Khách Sạn Hồ Hoàn Kiếm tọa lạc tại Hàng Trống, Hoàn Kiếm, Hà Nội, là điểm lý tưởng cho du khách muốn khám phá Hà Nội. Chỉ cách sân bay 35. Km, nên từ sân bay rất dễ để đi đến khách sạn. Khách ở khách sạn có thể dạo bộ xung quanh để ngắm các địa điểm thu hút hàng đầu của thành phố như : 87 Mã Mây, phố Cầu Gỗ, Nhà hát Múa rối nước Thăng Long.\r\nTại Khách Sạn Hồ Hoàn Kiếm, mọi sự cố gắng đều nhằm mục đích khiến cho du khách hài lòng. Để làm được điều đó, khách sạn sẽ cung cấp dịch vụ và tiện nghi tốt nhất. Nói đến một số thiết bị trong khách sạn, có dịch vụ giặt là/giặt khô, cho thuê xe đạp, đưa đón khách sạn/sân bay, phòng gia đình, bãi đỗ xe.\r\nNơi ăn chốn ở khách sạn được chỉ định rất rõ ràng sao cho phải đạt mức dễ chịu và tiện nghi nhất, với máy lạnh, truy cập internet không dây (miễn phí), máy pha trà/cà phê, bàn, tủ lạnh trong mỗi phòng. Bên cạnh đó, khách sạn còn gợi ý cho bạn những hoạt động vui chơi giải trí bảo đảm bạn luôn thấy hứng thú trong suốt kì nghỉ. Dù bạn đến để thư giãn hay làm gì, Khách Sạn Hồ Hoàn Kiếm luôn là sự lựa chọn hoàn hảo cho kì nghỉ của bạn ở Hà Nội.', 'Hà Nội', '29 Hàng Trống, Hoàn Kiếm', 1.1, 1, 1, 1, 1, 0, 1, 0, 0, 0, 1, 314000, 2, 'hotel', 8, 1, 'hotel/2'),
(3, 'Hanoi La Siesta Trendy', 'La Siesta Trendy is the most recent hotel in the group and is located on Nguyen Quang Bich Street that joins Phung Hung Street to the west of the old town. With our latest hotel we have created something a little different with an alternative look and feel.  The vision of La Siesta Trendy captures the present day, the edgy and buzzy feel of the city. Contemporary in design and stylishly modern in character, the incorporation of metal, glass and wood with modern steel greys and blue colors gives it a sleek contemporary dynamic feel.', 'Hà Nội', '12 Nguyễn Quang Bích', 0.7, 1, 0, 1, 1, 0, 0, 0, 1, 1, 1, 1252000, 4, 'hotel', 8.5, 1, 'hotel/3'),
(4, 'Gk Central', 'Khách sạn GK Central tọa lạc tại 92 - 94 Lý Tự Trọng, Bến Nghé, thành phố Hồ Chí Minh. Khách sạn cách sân bay Tân Sơn Nhất 7 km, cách chợ Bến Thành 3 phút đi bộ.\r\n\r\nKhách sạn GK Central là khách sạn tiêu chuẩn 3 sao sang trọng. Khi đặt phòng khách sạn GK Central, du khách sẽ hoàn toàn hài lòng về dịch vụ và giá cả tại đây. Với phong cách phục vụ chuyên nghiệp và sự thân thiện của nhân viên khách sạn, du khách sẽ được nghỉ ngơi thoải mái sau những ngày làm việc căng thẳng hay tận hưởng những giây phút ấn tượng và khó quên bên gia đình và những người thân yêu.', 'Hồ Chí Minh', '92 -94 Lý Tự Trọng, phường Bến Thành, Quận 1', 0.5, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 938000, 3, 'hotel', 7, 1, 'hotel/4'),
(5, 'Khách Sạn Grand Sài Gòn', 'Khách sạn Grand Sài Gòn nằm trên đường Đồng Khởi - một tuyến đường thương mại và mua sắm nổi tiếng tại trung tâm buôn bán Sài Gòn, Qúy khách chỉ cần đi bộ một đoạn là đến sông Sài Gòn lịch sử.\r\nĐược xây dựng vào năm 1930 và phục hồi lại năm 1997, Khách sạn Grand Sài Gòn nép mình bên sông Sài Gòn, gần các điểm giải trí và Khách sạn Grand Saigon là một trong những khách sạn cổ nhất thành phố Hồ Chí Minh, khách sạn được xây dựng từ năm 1930 và được nâng cấp, sửa chữa lại vào năm 2011. Tọa lạc tại khu vực cạnh dòng sông Sài Gòn thơ mộng, ngay trung tâm thương mại, giải trí. Sau bao lần đổi tên, nâng cấp sửa chữa và cho đến hôm nay khách sạn vẫn còn giữ được nét đẹp cổ kính của Pháp. Với những tiện nghi hoàn hảo, khách sạn sẽ mang đến cho quý khách sự thoải mái trong suốt chuyến công tác hay kỳ nghỉ tại thành phố Hồ Chí Minh. Tất cả các phòng đều có hướng nhìn ra thành phố, sông Sài Gòn hoặc hồ bơi và được trang bị tiện nghi đạt tiêu chuẩn 4 sao. Khách sạn nằm ở vị trí thuận tiện tại trung tâm thành phố, chỉ mất 8 km từ sân bay quốc tế Tân Sơn Nhất, cách Bưu điện Thành phố, Nhà thờ Đức Bà và Dinh Thống Nhất 1 km, chỉ vài phút đi bộ quý khách có thể ngắm cảnh quan sông Sài Gòn.', 'Hồ Chí Minh', '8 Đồng Khởi, Quận 1', 0.6, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 5658000, 5, 'hotel', 10, 1, 'hotel/5'),
(6, 'Sonnet Sài Gòn', 'Khách sạn Sonnet Sài Gòn nằm gần trung tâm thành phố, cách Bảo tàng Chứng tích Chiến tranh và Công viên Tao Đàn 100 m. Khách sạn nằm cách Dinh Thống Nhất 300 m và các sân bay Quốc tế Tân Sơn Nhất khoảng 8 km.\r\n\r\n \r\n\r\nKhách sạn Sonnet Sài Gòn đạt tiêu chuẩn 3 sao bao gồm 78 phòng nghỉ sang trọng. Các phòng tại đây đều được trang bị cửa sổ kính suốt từ trần đến sàn, ban công cho tầm nhìn ra toàn cảnh thành phố. Trang thiết bị trong phòng đầy đủ và tiện nghi như: TV truyền hình cáp màn hình phẳng, ấm đun nước điện, minibar, tủ quần áo, máy lạnh, Wi-fi internet. Phòng tắm riêng đi kèm tiện nghi bồn tắm, vòi sen, máy sấy tóc và đồ vệ sinh cá nhân.\r\n\r\n \r\n\r\nKhách sạn Sonnet Sài Gòn có đội ngũ nhân viên tại lễ tân phục vụ suốt 24 giờ có thể trợ giúp du khách với các dịch vụ giữ hành lý, đưa đón sân bay cũng như giặt là và ủi. Dịch vụ phòng cũng được cung cấp 24/24. Tiện nghi của khách sạn có bàn đặt tour, cửa hàng quà tặng và không gian tổ chức hội họp/tiệc.', 'Hồ Chí Minh', '14 Trương Định, Phường 6, Quận3', 1, 1, 1, 1, 1, 0, 1, 0, 0, 1, 1, 1436000, 3, 'hotel', 9, 1, 'hotel/6'),
(7, 'Dana Marina', 'Khách sạn Dana Marina là khách sạn đạt chuẩn chất lượng 4 sao có hồ bơi,tập gym tọa lạc trên đường Võ Văn Kiệt - vị trí thuận tiện và đẹp nhất thành phố Đà Nẵng, nằm gần sát bãi tắm biển Mỹ Khê thơ mộng - nơi đã được tạp chí Forbes của Mỹ bình chọn là một trong những bãi biển đẹp nhất hành tinh, thuận lợi di chuyển đến các điểm tham quan du lịch một cách nhanh chóng.\r\n\r\nVới không gian sống cao cấp và sang trọng bao gồm 67 phòng nghỉ đầy đủ tiện nghi, trang thiết bị hiện đại, không gian thân thiện được bài trí trang nhã và ấm áp để quý khách nghỉ ngơi thoải mái. Khách sạn không chỉ nổi bật với phòng ốc sang trọng, tinh tế trong lối bày trí nội ngoại thất mà còn gây ấn tượng mạnh với quầy Bar nằm cạnh hồ bơi, nằm trên tầng thượng có tầm view lý tưởng, sở hữu không gian thoáng mát, có thể ngắm nhìn toàn cảnh thành phố.\r\n\r\nVới tiêu chí sự hài lòng khách hàng là thước đo sự thành công của doanh nghiệp chúng tôi, Dana Marina nơi tôn vinh giá trị đích thực của nghệ thuật phục vụ', 'Đà Nẵng', 'Số 47-49 Đường Võ Văn Kiệt - Phường Phước Mỹ, Sơn Trà', 3.2, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 606000, 4, 'hotel', 8.5, 1, 'hotel/7');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `review` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `location` double NOT NULL,
  `room` double NOT NULL,
  `service` double NOT NULL,
  `cleaness` double NOT NULL,
  `value` double NOT NULL,
  `comfort` double NOT NULL,
  `equipment` double NOT NULL,
  `hotel` double NOT NULL,
  `meal` double NOT NULL,
  `avg_rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `review`
--

INSERT INTO `review` (`id`, `user_id`, `hotel_id`, `review`, `date`, `location`, `room`, `service`, `cleaness`, `value`, `comfort`, `equipment`, `hotel`, `meal`, `avg_rating`) VALUES
(1, 1, 1, 'Khách sạn tuyệt vời. Tôi rất hài lòng về dịch vụ.', '2018-05-05', 9, 9, 9, 9, 9, 9, 9, 9, 9, 9),
(2, 1, 2, 'Khách sạn giá rẻ. Phòng sạch sẽ và thoải mái. Tôi khá hài lòng', '2018-05-01', 8, 8, 8, 8, 8, 8, 8, 8, 8, 8),
(3, 1, 3, 'Hotel location is great. Was presented with a welcome drink which made for a fantastic first impression. Staff were extremely attentive and friendly (remembering our activities and check out dates). Staff also spoke English well. Only drawback was not all rooms have windows so be sure to check if you would prefer some natural light in the room.', '2018-05-03', 8.5, 8.5, 8.5, 8.5, 8.5, 8.5, 8.5, 8.5, 8.5, 8.5),
(4, 1, 4, 'Khách sạn nằm ở vị trí trung tâm, thuận tiện cho việc đi lại. Dễ dàng đi bộ để đến phố đi bộ Nguyễn Huệ, chợ Bến Thành và các khu vực lân cận. Có nhiều hàng ăn, cafe, đồ ăn vặt xung quanh. Buffet sáng khá ổn dù thực đơn còn hơi ít món. Thái độ của nhân viên thân thiện và nhiệt tình. Phòng ốc nhỏ gọn nhưng mới, sạch sẽ và tươm tất. Tôi sẽ quay lại GK Central cho đợt công tác hoặc du lịch tiếp theo tại TPHCM', '2018-04-25', 7, 7, 7, 7, 7, 7, 7, 7, 7, 7),
(5, 1, 5, 'Khách sạn rất tuyệt vời, sang trọng, chuẩn 5 sao. Tôi cực kì hài lòng.', '2018-05-17', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10),
(10, 1, 6, 'Khách sạn Sonnet cung cấp phòng ốc ok, phòng được dọn dẹp sạch sẽ. Trang thiết bị cũng như tiện nghi được cung cấp đầy đủ. Vị trí thuận tiện cho công việc của tôi và giá cả hợp lí. Thái độ nhân viên tốt, phục vụ chu đáo.', '2018-05-20', 9, 9, 9, 9, 9, 9, 9, 9, 9, 9),
(11, 1, 7, 'Tôi đã có những ấn tượng rất tốt khi ở Khách sạn Dana Marina. Vị trí đẹp, phòng ở trang nhã, phục vụ rất tốt. Chỉ có điểm trừ duy nhất là khu phục vụ ăn uống buffet sáng hơi chật, nên tổng quan tôi vẫn rất hài lòng.', '2018-05-19', 8.5, 8.5, 8.5, 8.5, 8.5, 8.5, 8.5, 8.5, 8.5, 8.5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `quality` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `type_of_bed` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `internet` tinyint(1) NOT NULL,
  `air` tinyint(1) NOT NULL,
  `hairdryer` tinyint(1) NOT NULL,
  `tv` tinyint(1) NOT NULL,
  `fridge` tinyint(1) NOT NULL,
  `microwave` tinyint(1) NOT NULL,
  `roomservice` tinyint(1) NOT NULL,
  `cancellation` tinyint(1) NOT NULL,
  `breakfast` tinyint(1) NOT NULL,
  `price_per_night` double NOT NULL,
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`id`, `hotel_id`, `quality`, `capacity`, `type_of_bed`, `amount`, `internet`, `air`, `hairdryer`, `tv`, `fridge`, `microwave`, `roomservice`, `cancellation`, `breakfast`, `price_per_night`, `img`) VALUES
(1, 1, 'Deluxe', 2, '2 Giường đơn / 1 Giường đôi', 4, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1578000, 'hotel/1/room/deluxe.jpg'),
(2, 1, 'Premium', 2, '2 Giường đơn / 1 Giường đôi', 2, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1926000, 'hotel/1/room/premium.jpg'),
(3, 2, 'Standard', 2, '1 giường đôi', 2, 1, 1, 1, 1, 1, 0, 0, 1, 1, 314000, 'hotel/2/room/standard.jpg'),
(4, 2, 'Superior', 2, '1 giường đôi', 2, 1, 1, 1, 1, 1, 0, 0, 1, 1, 359000, 'hotel/2/room/superior.jpg'),
(5, 2, 'Deluxe', 2, '2 Giường đơn', 2, 1, 1, 1, 1, 1, 0, 0, 1, 1, 448000, 'hotel/2/room/deluxe.jpg'),
(6, 2, 'Triple', 3, '1 Giường đơn, 1 Giường đôi', 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 547000, 'hotel/2/room/triple.jpg'),
(7, 2, 'Family', 4, '2 Giường đơn, 1 Giường đôi', 2, 1, 1, 1, 1, 1, 0, 0, 1, 1, 583000, 'hotel/2/room/family.jpg'),
(8, 3, 'Cozy Deluxe', 2, 'Giường đôi', 3, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1252000, 'hotel/3/room/cozy.jpg'),
(9, 3, 'Trendy Deluxe', 2, 'Giường đôi', 3, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1366000, 'hotel/3/room/trendy.jpg'),
(10, 4, 'Superior', 2, '1 Giường đôi', 4, 1, 1, 1, 0, 0, 0, 1, 1, 1, 938000, 'hotel/4/room/superior.jpg'),
(11, 4, 'Deluxe', 2, '1 Giường đôi / 2 Giường đơn', 4, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1119000, 'hotel/4/room/deluxe.jpg'),
(12, 4, 'Premier Deluxe', 2, '2 Giường đơn / 1 Giường đôi', 2, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1438000, 'hotel/4/room/premier.jpg'),
(13, 5, 'LUXURY-SUITE', 3, 'Giường đôi', 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 5658000, 'hotel/5/room/luxury.jpg'),
(14, 5, 'GRAND-EXCUTIVE-SUITE', 3, '2 Giường đơn / 1 Giường đôi', 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 5658000, 'hotel/5/room/grand.jpg'),
(15, 5, 'ROYAL-SUITE', 5, '2 Giường đôi', 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 7590000, 'hotel/5/room/royal.jpg'),
(16, 5, 'GRAND-SUITE', 5, '2 Giường đơn + 1 Giường đôi', 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 7590000, 'hotel/5/room/grandsuite.jpg'),
(17, 6, 'Deluxe', 2, '1 Giường đô', 5, 1, 1, 0, 1, 0, 0, 1, 0, 1, 1436000, 'hotel/6/room/deluxe.jpg'),
(18, 6, 'Premier Deluxe', 2, '1 Giường đôi', 5, 1, 1, 0, 1, 0, 0, 1, 0, 1, 1627000, 'hotel/6/room/premier.jpg'),
(19, 6, 'Junior Suite', 2, '1 Giường đôi', 5, 1, 1, 0, 1, 0, 0, 1, 0, 1, 1818000, 'hotel/6/room/junior.jpg'),
(20, 6, 'Residence Suite', 2, '1 Giường đôi', 5, 1, 1, 0, 1, 0, 0, 1, 0, 1, 2677000, 'hotel/6/room/residence.jpg'),
(21, 7, 'Superior King', 2, '1 Giường đôi', 22, 1, 1, 1, 1, 1, 0, 0, 1, 1, 606000, 'hotel/7/room/superiorking.jpg'),
(22, 7, 'Superior Twin', 2, '2 Giường đơn', 11, 1, 1, 1, 1, 1, 0, 0, 1, 1, 606000, 'hotel/7/room/superiortwin.jpg'),
(23, 7, 'Superior Triple', 3, '1 Giường đơn, 1 Giường đôi', 6, 1, 1, 1, 1, 1, 0, 1, 1, 1, 858000, 'hotel/7/room/superiortriple.jpg'),
(24, 7, 'Deluxe King', 2, '1 Giường đôi rất lớn', 12, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1009000, 'hotel/7/room/deluxeking.jpg'),
(25, 7, 'Deluxe Queen', 2, '1 Giường đôi lớn', 11, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1009000, 'hotel/7/room/deluxequeen.jpg'),
(26, 7, 'Deluxe Triple', 3, '1 Giường đơn, 1 Giường đôi', 11, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1463000, 'hotel/7/room/deluxetriple.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sex` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `admin`, `status`, `sex`, `email`, `phone`, `birth_date`, `address`, `city`, `district`, `avatar`) VALUES
(1, 'Nguyễn Đức Tùng', 'tung1705', 'toiyeua11', 1, 1, 1, 'ductungnguyen1997@gmail.com', '0984431825', '1997-05-17', '145 Phuc Loi', 'Ha Noi', 'Long Bien', 'tung1705.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `favorite_hotel`
--
ALTER TABLE `favorite_hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `favorite_hotel`
--
ALTER TABLE `favorite_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `favorite_hotel`
--
ALTER TABLE `favorite_hotel`
  ADD CONSTRAINT `favorite_hotel_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `favorite_hotel_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
