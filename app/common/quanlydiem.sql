-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 25, 2021 lúc 05:01 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlydiem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `actived_flag` int(1) NOT NULL,
  `reset_password_token` varchar(100) NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `login_id`, `password`, `actived_flag`, `reset_password_token`, `updated`, `created`) VALUES
(1, 'thuydeptrai', '123', 1, 'thuy@gmail.com', '2021-12-14 15:45:34', '2021-12-14 15:44:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `scores`
--

CREATE TABLE `scores` (
  `id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `score` int(2) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `scores`
--

INSERT INTO `scores` (`id`, `student_id`, `subject_id`, `teacher_id`, `score`, `description`, `updated`, `created`) VALUES
(1, 1, 1, 1, 10, '', '2021-12-25 13:34:47', '2021-12-25 07:33:47'),
(2, 1, 3, 3, 9, '', '2021-12-25 13:35:19', '2021-12-25 07:35:05'),
(3, 7, 7, 7, 9, '', '2021-12-25 13:35:19', '2021-12-25 07:35:05'),
(4, 1, 2, 2, 9, '', '2021-12-25 13:35:58', '2021-12-25 07:35:47'),
(5, 1, 4, 4, 9, '', '2021-12-25 13:36:09', '2021-12-25 07:36:00'),
(6, 1, 6, 6, 9, '', '2021-12-25 13:36:28', '2021-12-25 07:36:11'),
(7, 1, 7, 7, 10, '', '2021-12-25 13:36:41', '2021-12-25 07:36:29'),
(8, 1, 5, 5, 9, '', '2021-12-25 13:36:55', '2021-12-25 07:36:43'),
(9, 4, 1, 1, 9, '', '2021-12-25 13:37:14', '2021-12-25 07:37:03'),
(10, 3, 4, 4, 9, '', '2021-12-25 13:37:28', '2021-12-25 07:37:16'),
(11, 2, 7, 7, 9, '', '2021-12-25 13:37:42', '2021-12-25 07:37:30'),
(12, 5, 6, 6, 10, '', '2021-12-25 13:37:57', '2021-12-25 07:37:43'),
(13, 6, 4, 4, 9, '', '2021-12-25 22:58:26', '2021-12-25 16:58:12'),
(14, 8, 1, 1, 10, '', '2021-12-25 23:00:27', '2021-12-25 17:00:12'),
(15, 7, 4, 4, 10, '', '2021-12-25 23:00:38', '2021-12-25 17:00:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`id`, `name`, `avatar`, `description`, `updated`, `created`) VALUES
(1, 'Hà Quốc Việt', 'Viet.jpg', '', '2021-12-25 13:22:49', '2021-12-25 07:21:46'),
(2, 'Trần Quang Thụy', 'Thuy.jpg', '', '2021-12-25 13:23:16', '2021-12-25 07:23:02'),
(3, 'Phạm Minh Tiến', 'Tien.jpg', '', '2021-12-25 13:23:35', '2021-12-25 07:23:26'),
(4, 'Nguyễn Xuân Thành', 'Thanh.jpg', '', '2021-12-25 13:23:55', '2021-12-25 07:23:39'),
(5, 'Đỗ Hữu Quang', 'quang.jpg', '', '2021-12-25 13:24:12', '2021-12-25 07:24:03'),
(6, 'Nguyễn Long Hải', 'hai.jpg', '', '2021-12-25 22:57:50', '2021-12-25 16:57:29'),
(7, 'Phí Linh Chi', 'chi.jpg', '', '2021-12-25 22:59:51', '2021-12-25 16:59:42'),
(8, 'Trần Thị Huyền Trang', 'trang.jpg', '', '2021-12-25 23:00:06', '2021-12-25 16:59:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `school_year` char(10) NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `avatar`, `description`, `school_year`, `updated`, `created`) VALUES
(1, 'Lập trình web', 'web.jpg', '', '2K', '2021-12-25 13:26:55', '2021-12-25 07:24:42'),
(2, 'Cơ sở dữ liệu', 'csdl.jpg', '', '2K', '2021-12-25 13:27:42', '2021-12-25 07:27:26'),
(3, 'Cấu trúc dữ liệu và thuật toán ', 'dsa.jpg', '', '2K1', '2021-12-25 13:28:04', '2021-12-25 07:27:44'),
(4, 'Machine Learning', 'ml.jpg', '', '2K', '2021-12-25 13:28:20', '2021-12-25 07:28:06'),
(5, 'Xử lí ngôn ngữ tự nhiên và ứng dụng', 'nlp.jpg', '', '2K', '2021-12-25 13:28:41', '2021-12-25 07:28:22'),
(6, 'Mật mã và an toàn thông tin', 'crypto.jpg', '', '2K', '2021-12-25 13:28:57', '2021-12-25 07:28:44'),
(7, 'Thị giác máy tính', 'vision.jpg', '', '2K1', '2021-12-25 13:29:21', '2021-12-25 07:29:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `specialized` char(10) NOT NULL,
  `degree` char(10) NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `avatar`, `description`, `specialized`, `degree`, `updated`, `created`) VALUES
(1, 'Trần Thị Huyền Trang', 'trang.jpg', '', 'WEB', 'BS', '2021-12-25 13:30:31', '2021-12-25 07:30:03'),
(2, 'Vũ Tiến Dũng', 'dung.jpg', '', 'DS', 'PHD', '2021-12-25 13:30:58', '2021-12-25 07:30:33'),
(3, 'Hoàng Thanh Tùng', 'tung.jpg', '', 'ML', 'PHD', '2021-12-25 13:31:30', '2021-12-25 07:31:02'),
(4, 'Lê Hồng Phương', 'phuong.jpg', '', 'DS', 'PHD', '2021-12-25 13:31:48', '2021-12-25 07:31:33'),
(5, 'Nguyễn Thị Minh Huyền', 'huyen.jpg', '', 'NLP', 'PHD', '2021-12-25 13:32:24', '2021-12-25 07:31:50'),
(6, 'Phó Đức Tài', 'tai.jpg', '', 'MATH', 'PHD', '2021-12-25 13:32:46', '2021-12-25 07:32:29'),
(7, 'Nguyễn Thị Bích Thủy', 'thuy.jpg', '', 'CV', 'PHD', '2021-12-25 13:33:25', '2021-12-25 07:33:04');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_id` (`login_id`);

--
-- Chỉ mục cho bảng `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scores_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scores_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
