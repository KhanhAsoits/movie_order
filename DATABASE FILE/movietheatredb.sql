/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

DROP DATABASE IF EXISTS `movietheatredb`;
CREATE DATABASE IF NOT EXISTS `movietheatredb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `movietheatredb`;

DROP TABLE IF EXISTS `tbl_bookings`;
CREATE TABLE IF NOT EXISTS `tbl_bookings` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theater id',
  `user_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `no_seats` int(3) NOT NULL COMMENT 'number of seats',
  `amount` int(5) NOT NULL,
  `ticket_date` date NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

DELETE FROM `tbl_bookings`;
/*!40000 ALTER TABLE `tbl_bookings` DISABLE KEYS */;
INSERT INTO `tbl_bookings` (`book_id`, `ticket_id`, `t_id`, `user_id`, `show_id`, `screen_id`, `no_seats`, `amount`, `ticket_date`, `date`, `status`) VALUES
	(12, 'BKID6369842', 4, 4, 17, 3, 1, 380, '2021-04-15', '2021-04-15', 1),
	(13, 'BKID2313964', 6, 5, 21, 6, 4, 2400, '2021-04-16', '2021-04-15', 1),
	(14, 'BKID1766021', 6, 5, 22, 6, 2, 1200, '2021-04-16', '2021-04-16', 1);
/*!40000 ALTER TABLE `tbl_bookings` ENABLE KEYS */;

DROP TABLE IF EXISTS `tbl_contact`;
CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `mobile` int(11) NOT NULL,
  `subject` varchar(1000) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DELETE FROM `tbl_contact`;
/*!40000 ALTER TABLE `tbl_contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_contact` ENABLE KEYS */;

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL COMMENT 'email',
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `user_type` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

DELETE FROM `tbl_login`;
/*!40000 ALTER TABLE `tbl_login` DISABLE KEYS */;
INSERT INTO `tbl_login` (`id`, `user_id`, `username`, `password`, `user_type`) VALUES
	(1, 0, 'admin', 'password', 0),
	(2, 3, 'theatre', 'password', 1),
	(3, 4, 'theatre2', 'password', 1),
	(12, 2, 'harryden@gmail.com', 'password', 2),
	(15, 14, 'USR295127', 'PWD195747', 1),
	(17, 4, 'bruno@gmail.com', 'password', 2),
	(18, 6, 'THR760801', 'PWD649976', 1),
	(19, 5, 'james@gmail.com', 'password', 2),
	(20, 6, 'dangk1312200221@gmail.com', '13122002', 2);
/*!40000 ALTER TABLE `tbl_login` ENABLE KEYS */;

DROP TABLE IF EXISTS `tbl_movie`;
CREATE TABLE IF NOT EXISTS `tbl_movie` (
  `movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` int(11) NOT NULL COMMENT 'theatre id',
  `movie_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `cast` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `release_date` date NOT NULL,
  `image` varchar(200) NOT NULL,
  `video_url` varchar(200) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0 means active ',
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

DELETE FROM `tbl_movie`;
/*!40000 ALTER TABLE `tbl_movie` DISABLE KEYS */;
INSERT INTO `tbl_movie` (`movie_id`, `t_id`, `movie_name`, `cast`, `desc`, `release_date`, `image`, `video_url`, `status`) VALUES
	(18, 3, 'PHÙ THỦY TỐI THƯỢNG TRONG ĐA VŨ TRỤ HỖN LOẠN', 'Benedict Cumberbatch, Elizabeth Olsen Rachel McAdams', 'Sau các sự kiện của Avengers: Endgame, Tiến sĩ Stephen Strange tiếp tục nghiên cứu về Viên đá Thời gian. Nhưng một người bạn cũ đã trở thành kẻ thù tìm cách tiêu diệt mọi phù thủy trên Trái đất, làm xáo trộn kế hoạch của Strange và cũng khiến anh ta mở ra một tội ác khôn lường.', '2022-05-04', 'images/dr-strange-payoff-poster.png', 'https://www.youtube.com/embed/nBNtRvpCmms', 0),
	(19, 3, 'THẾ GIỚI KHỦNG LONG: LÃNH ĐỊA', 'Chris Pratt, Bryce Dallas Howard, Isabella Sermon, Omar Sy, Sam Neill', 'Bốn năm sau kết thúc Jurassic World: Fallen Kingdom, những con khủng long đã thoát khỏi nơi giam cầm và tiến vào thế giới loài người. Giờ đây, chúng xuất hiện ở khắp mọi nơi. Sinh vật to lớn ấy không còn chỉ ở trên đảo như trước nữa mà gần ngay trước mắt, thậm chí còn có thể chạm tới. Owen Grady may mắn gặp lại cô khủng long mà anh và khán giả vô cùng yêu mến - Blue. Tuy nhiên, Blue không đi một mình mà còn đem theo một chú khủng long con khác. Điều này khiến Owen càng quyết tâm bảo vệ mẹ con cô được sinh sống an toàn. Thế nhưng, hai giống loài quá khác biệt. Liệu có thể tồn tại một kỷ nguyên mà khủng long và con người sống chung một cách hòa bình?', '2022-06-10', 'images/rsz_jurassic_world_dominion.png', 'https://www.youtube.com/embed/wPOKNuV9BT0', 1),
	(20, 3, 'DORAEMON: NOBITA VÀ CUỘC CHIẾN VŨ TRỤ TÍ HON 2021', 'Subaru Kimura, Megumi Oohara, Megumi Oohara, Kakazu Yumi, Seki Tomokazu', 'Nobita tình cờ gặp được người ngoài hành tinh tí hon Papi, vốn là Tổng thống của hành tinh Pirika, chạy trốn tới Trái Đất để thoát khỏi những kẻ nổi loạn nơi quê nhà. Doraemon, Nobita và hội bạn thân dùng bảo bối đèn pin thu nhỏ biến đổi theo kích cỡ giống Papi để chơi cùng cậu bé. Thế nhưng, một tàu chiến không gian tấn công cả nhóm. Cảm thấy có trách nhiệm vì liên lụy mọi người, Papi quyết định một mình đương đầu với quân phiến loạn tàn ác. Doraemon và các bạn lên đường đến hành tinh Pirika, sát cánh bên người bạn của mình.', '2022-05-27', 'images/rsz_1doraemonlsw-_poster.png', 'https://www.youtube.com/embed/dd_R1GQwKlY', 1),
	(21, 3, 'HARRY POTTER VÀ CĂN PHÒNG BÍ MẬT (RE-RUN)', 'Daniel Radcliff, Emma Watson, Rupert Grint, Bonnie Wright, Kenneth Branagh,...', 'Phần tiếp theo của loạt phim Harry Potter vẫn tiếp tục xoay quanh bộ ba Harry Potter - Ron Weasley - Hermione Granger. Bộ ba phù thủy sẽ đối mặt với một thử thách mới trong năm học thứ 2 tại trường Hogwarts. Một thế lực hắc ám đang bao trùm ngôi trường phù thủy này, tấn công hàng loạt học sinh và đe dọa mở Phòng Chứa Bí Mật một lần nữa. (Phim chiếu lại)', '2022-06-03', 'images/hp2.png', 'https://www.youtube.com/embed/TdYq3WrTCBA', 0),
	(22, 3, 'PHI CÔNG SIÊU ĐẲNG MAVERICK', 'Tom Cruise, Justin Marks, Peter Craig, Eric Warren Singer', 'Sau hơn ba mươi năm phục vụ, Pete “Maverick” Mitchell từng nổi danh là một phi công thử nghiệm quả cảm hàng đầu của Hải quân, né tránh cơ hội thăng chức, điều khiến anh cảm thấy bị bó buộc, để trở về làm chính mình.', '2022-05-27', 'images/top_gun_maverick_-_poster_28.03_1_.png', 'https://www.youtube.com/embed/4O80AMDYwXU', 1),
	(23, 3, 'ĐẠI NÁO CUNG TRĂNG', 'Aleks Le, Howard Nightingall, Lilian Gartner, Raphael von Bargen, Drew Sarich, Cindy Robinson', 'Chuyến phiêu lưu đến Mặt Trăng của Peter bắt đầu khi em gái cậu, Anne, bị tên Trăng Tặc độc ác bắt cóc khi cô bé đang cố gắng giúp Bác Bọ Zoomzeman tìm lại vợ của mình. Trong cuộc hành trình đầy bất ngờ ấy, Peter gặp Thần Ngủ ở Đồng Cỏ Sao. Để giải cứu Anne, họ đã cùng nhau tham gia một cuộc đua kỳ thú dọc Dải Ngân Hà với 5 vị thần thiên nhiên: Ngài Bão Tố, Phù Thủy Sấm, Ngài Mưa Đá, Bậc Thầy Mưa Gió, và Bà Chúa Tuyết.', '2022-06-03', 'images/mb-main-poster_1.png', 'https://www.youtube.com/embed/i7TezW5eueI', 1),
	(24, 3, 'MAIKA - CÔ BÉ ĐẾN TỪ HÀNH TINH KHÁC', 'Chu Diệp Anh, Lại Trường Phú, Tin Tin, Huy Me, Ngọc Tưởng, Tiểu Bảo Quốc.', 'Hùng là cậu bé 8 tuổi mồ côi mẹ, sống với cha nhưng tình cảm cha con không khăng khít. Sau khi người bạn thân nhất của Hùng phải chuyển nhà, bố con cậu cũng bị chủ nhà ép chuyển đi. Cậu bé thường tìm kiếm niềm an ủi bằng cách ngắm bầu trời đêm. Một đêm có mưa sao băng, cậu thấy một ngôi sao rơi xuống vùng đất gần đó. Khi Hùng đi tìm, cậu không thấy ngôi sao nào mà thấy một cô bé. Hai đứa trẻ kết thân và giúp đỡ nhau.', '2022-05-27', 'images/maika-1200x1800_1.png', 'https://www.youtube.com/embed/mOH-VKJBsh8', 1),
	(25, 3, 'CHUYẾN PHIÊU LƯU CỦA PIL', 'Kaycie Chase, Paul Borne, Julien Crampon...', 'Ngày xửa ngày xưa, có một cô bé mồ côi phải trở thành nàng công chúa bất đắc dĩ không giống ai. Một ngày nọ, hoàng tử bị một tên quan độc ác đầu độc và khiến Pil cùng những người bạn phải đứng lên bảo vệ mình và cả vương quốc.', '2022-06-01', 'images/pilsadventure-poster_1.png', 'https://youtube.com/embed/yeGjaYJPM44', 1),
	(26, 3, 'HARRY POTTER VÀ HÒN ĐÁ PHÙ THỦY (RE-RUN)', 'Daniel Radcliffe, Rupert Grint, Emma Watson, Tom Felton', 'Chuyển thể của phần đầu tiên của cuốn tiểu thuyết dành cho thiếu nhi nổi tiếng của tác giả J.K.Rowling, cậu bé Harry Potter vào sinh nhật lần thứ 11 rằng bố mẹ cậu là hai vị phù thủy nổi tiếng. Bản thân cậu sở hữu phép thuật và năng lực mà ai cũng mong muốn có được sau khi sống sót khỏi Chúa tể Voldermort. Từ cuộc sống của một đứa trẻ mồ côi, cậu trở thành một học sinh tại ngôi trường phù thủy danh giá Hogwarts. Tại đây, cậu đã tìm được những người bạn thân nhất của mình và giúp cậu khám phá ra sự thật về cái chết bí ẩn của cha mẹ mình. (Phim chiếu lại từ 20/5)', '2022-05-20', 'images/hp1.png', 'https://youtube.com/embed/lzZ_Z1Sfczg', 0);
/*!40000 ALTER TABLE `tbl_movie` ENABLE KEYS */;

DROP TABLE IF EXISTS `tbl_news`;
CREATE TABLE IF NOT EXISTS `tbl_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `cast` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `news_date` date NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `attachment` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

DELETE FROM `tbl_news`;
/*!40000 ALTER TABLE `tbl_news` DISABLE KEYS */;
INSERT INTO `tbl_news` (`news_id`, `name`, `cast`, `news_date`, `description`, `attachment`) VALUES
	(3, 'Black Widow', 'Scarlett Johansson, Florence Pugh, David Harbour, Rachel Weisz', '2021-07-09', 'At birth the Black Widow (aka Natasha Romanova) is given to the KGB, which grooms her to become its ultimate operative.', 'news_images/blackwidow.jpg'),
	(9, 'Shang-Chi and the Legend of the Ten Rings', 'Simu Liu, Awkwafina, Tony Leung, Fala Chen, Micheele Yeoh', '2021-09-14', 'Shang-Chi is a master of numerous unarmed and weaponry-based wushu styles, including the use of the gun, nunchaku, and jian.', 'news_images/shangchi.jpg'),
	(10, 'The Eternals', 'Richard Madden, Salma Hayek, Angelina Jolie, Kit Harrington', '2021-11-04', 'The saga of the eternals, a race of immortal beings who lived on earth and shaped its history and civilizations.', 'news_images/eternals.jpg'),
	(11, 'Test', 'Black Window, Harry John', '2022-06-02', 'Phim hay ', 'news_images/bg-main.png'),
	(13, 'CẢNH SÁT VŨ TRỤ LIGHTYEAR', 'Chris Evans, Keke Palmer, Peter Sohn, Taika Waititi, Dale Soules, James Brolin...', '2022-06-17', 'Bộ phim kể về chuyến hành trình hành động kết hợp khoa học viễn tưởng nhằm giới thiệu câu chuyện về nguồn gốc của nhân vật Buzz Lightyear — người anh hùng đã truyền cảm hứng sáng tạo ra đồ chơi. “Lightyear” sẽ theo chân Cảnh Sát Vũ Trụ huyền thoại trong cuộc hành trình bước ra ngoài không gian cùng với một nhóm chiến binh đầy tham vọng và người bạn đồng hành là chú mèo máy Sox.', 'news_images/lightyear_epic_payoff_vietnam_1.png'),
	(14, 'HARRY POTTER VÀ TÙ NHÂN AZKABAN (RE-RUN)', 'Daniel Radcliffe, Emma Watson, Rupert Grint, Gary Oldman, Alan Rickman, Tom Felton', '2022-06-17', 'Năm thứ ba của Harry Potter bắt đầu trở nên tồi tệ khi Harry phát hiện ra tên sát nhân Sirius Black đã trốn thoát khỏi nhà tù Azkaban và đang tìm đến Harry để trả thù. Một loạt cai ngục Azkaban được cử đến để bảo vệ Hogwarts và truy đuổi Sirius Black. Một giáo viên bí ẩn đã xuất hiện để dạy Harry Potter cách bảo vệ bản thân. Tuy nhiên, Harry dần phát hiện ra bí mật của mối quan hệ giữa Harry và tên sát nhân Sirius Black phức tạp hơn cậu nghĩ. (Re-run)', 'news_images/hp3.png'),
	(15, 'MÈO ĐI HIA: ĐIỀU ƯỚC CUỐI CÙNG', 'Florence Pugh, Olivia Colman, Salma Hayek, Antonio Banderas', '2022-09-16', 'Phần nối tiếp của Puss in Boots đã ra mắt từ 11 năm trước. Chú mèo đi hia sẽ chính thức trở lại màn ảnh lớn trong 1 chuyến phiêu lưu mới, vui nhộn hơn và cũng gay cấn hơn khi đã trót “tiêu xài” 8 trong số 9 cái mạng của mình.', 'news_images/puss-in-boots-poster.png'),
	(16, 'LIÊN MINH SIÊU THÚ DC', 'Dwayne Johnson, Kevin Hart, Keanu Reeves', '2022-07-29', 'Trong “Liên Minh Siêu Thú DC”, Siêu Cún Krypto và Superman là cặp bài trùng không thể tách rời, cùng sở hữu những siêu năng lực tương tự và cùng nhau chiến đấu chống lại tội phạm tại thành phố Metropolis. Khi Superman và những thành viên của Liên Minh Công Lý bị bắt cóc, Krypto phải thuyết phục cậu chàng Ace luộm thuộm, nàng Heo PB, Rùa Merton và Sóc Chip khai phá những sức mạnh tiềm ẩn và cùng nhau giải cứu các siêu anh hùng. “Liên Minh Siêu Thú DC” có sự góp giọng của bộ đôi ngôi sao nổi tiếng bậc nhất Hollywood Dwayne Johnson (lồng tiếng cho Siêu cún Krypto) và Kevin Hart (Superman). Đặc biệt, tài tử Keanu Reeves sẽ đảm nhận những câu thoại chất lừ đến từ Batman.', 'news_images/dc_league_super_pets-_teaser_poster_1.png');
/*!40000 ALTER TABLE `tbl_news` ENABLE KEYS */;

DROP TABLE IF EXISTS `tbl_registration`;
CREATE TABLE IF NOT EXISTS `tbl_registration` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

DELETE FROM `tbl_registration`;
/*!40000 ALTER TABLE `tbl_registration` DISABLE KEYS */;
INSERT INTO `tbl_registration` (`user_id`, `name`, `email`, `phone`, `age`, `gender`) VALUES
	(2, 'Harry Den', 'harryden@gmail.com', '1247778540', 22, 'gender'),
	(4, 'Bruno', 'bruno@gmail.com', '7451112450', 30, 'gender'),
	(5, 'James', 'james@gmail.com', '7124445696', 25, 'gender'),
	(6, 'khanh', 'dangk1312200221@gmail.com', '8376658437', 18, 'gender');
/*!40000 ALTER TABLE `tbl_registration` ENABLE KEYS */;

DROP TABLE IF EXISTS `tbl_screens`;
CREATE TABLE IF NOT EXISTS `tbl_screens` (
  `screen_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` int(11) NOT NULL COMMENT 'theatre id',
  `screen_name` varchar(110) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `seats` int(11) NOT NULL COMMENT 'number of seats',
  `charge` int(11) NOT NULL,
  PRIMARY KEY (`screen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

DELETE FROM `tbl_screens`;
/*!40000 ALTER TABLE `tbl_screens` DISABLE KEYS */;
INSERT INTO `tbl_screens` (`screen_id`, `t_id`, `screen_name`, `seats`, `charge`) VALUES
	(1, 3, 'Hà Nội', 1000, 200);
/*!40000 ALTER TABLE `tbl_screens` ENABLE KEYS */;

DROP TABLE IF EXISTS `tbl_shows`;
CREATE TABLE IF NOT EXISTS `tbl_shows` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_id` int(11) NOT NULL COMMENT 'show time id',
  `theatre_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 means show available',
  `r_status` int(11) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

DELETE FROM `tbl_shows`;
/*!40000 ALTER TABLE `tbl_shows` DISABLE KEYS */;
INSERT INTO `tbl_shows` (`s_id`, `st_id`, `theatre_id`, `movie_id`, `start_date`, `status`, `r_status`) VALUES
	(1, 3, 3, 18, '2022-06-04', 0, 1),
	(3, 1, 3, 18, '2022-06-04', 0, 0),
	(4, 4, 3, 18, '2022-06-04', 0, 0),
	(5, 1, 3, 18, '2022-06-05', 1, 1);
/*!40000 ALTER TABLE `tbl_shows` ENABLE KEYS */;

DROP TABLE IF EXISTS `tbl_show_time`;
CREATE TABLE IF NOT EXISTS `tbl_show_time` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `screen_id` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL COMMENT 'noon,second,etc',
  `start_time` time NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

DELETE FROM `tbl_show_time`;
/*!40000 ALTER TABLE `tbl_show_time` DISABLE KEYS */;
INSERT INTO `tbl_show_time` (`st_id`, `screen_id`, `name`, `start_time`) VALUES
	(1, 1, 'Noon', '10:00:00'),
	(2, 1, 'Matinee', '14:00:00'),
	(3, 1, 'First', '18:00:00'),
	(4, 1, 'Second', '21:00:00'),
	(5, 2, 'Noon', '10:00:00'),
	(6, 2, 'Matinee', '14:00:00'),
	(7, 2, 'First', '18:00:00'),
	(8, 2, 'Second', '21:00:00'),
	(9, 3, 'Noon', '10:00:00'),
	(10, 3, 'Matinee', '14:00:00'),
	(11, 3, 'First', '18:00:00'),
	(12, 3, 'Second', '21:00:00'),
	(14, 4, 'Noon', '12:03:00'),
	(15, 5, 'First', '00:08:00'),
	(16, 5, 'Second', '15:10:00'),
	(17, 5, 'Others', '18:10:00'),
	(18, 6, 'Noon', '00:02:00'),
	(19, 6, 'First', '06:35:00'),
	(20, 6, 'Second', '09:18:00'),
	(21, 5, 'Matinee', '20:04:00'),
	(22, 1, 'Sáng', '19:30:00');
/*!40000 ALTER TABLE `tbl_show_time` ENABLE KEYS */;

DROP TABLE IF EXISTS `tbl_theatre`;
CREATE TABLE IF NOT EXISTS `tbl_theatre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `place` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `state` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `pin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

DELETE FROM `tbl_theatre`;
/*!40000 ALTER TABLE `tbl_theatre` DISABLE KEYS */;
INSERT INTO `tbl_theatre` (`id`, `name`, `address`, `place`, `state`, `pin`) VALUES
	(3, 'AMC Theatre', '11500 Ash St', 'Leawd', 'DM', 691523),
	(4, 'Cinemark', '3900 Dallas Parkway Suite 500 Plano', '12 Street, Ep', 'UD', 691523),
	(5, 'Midtown Cinemas', 'Aue', 'Charles Street, EUS', 'DMM', 691523),
	(6, 'Riverview Theater', '3800 42nd Ave S', 'Minneapolis, MN 55406', 'Minnesot', 224450);
/*!40000 ALTER TABLE `tbl_theatre` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
