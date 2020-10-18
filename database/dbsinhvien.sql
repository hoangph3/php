-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 17, 2020 lúc 09:08 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbsinhvien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `challenge`
--

CREATE TABLE `challenge` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suggest` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `challenge`
--

INSERT INTO `challenge` (`id`, `name`, `suggest`) VALUES
(27, '1', 'Miss Forest'),
(28, '2', 'Forest XN'),
(29, '3', 'Bài thơ của Tổ Hữu'),
(30, '4', 'Rice ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `homework`
--

CREATE TABLE `homework` (
  `id` int(11) NOT NULL,
  `task` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `message`
--

INSERT INTO `message` (`id`, `sender`, `receiver`, `content`, `time`) VALUES
(62, 'vcsadmin', 'hoangph3', 'Xin chao', '2020-09-28 05:48:22'),
(63, 'vcsadmin', 'hoangph3', 'Hello', '2020-09-28 05:48:29'),
(64, 'vcsadmin', 'hoangph3', 'Lam quen', '2020-09-28 05:48:41'),
(65, 'vcsadmin', 'hoangph3', 'Tam biet', '2020-09-28 05:48:52'),
(66, 'vcsadmin', 'hoang', 'xin chao tiep', '2020-09-28 05:49:00'),
(67, 'vcshoangp', 'vcsadmin', 'Xin chao', '2020-09-28 05:49:59'),
(68, 'hoang', 'vcsadmin', 'Khong co gi', '2020-09-28 05:50:58'),
(69, '', 'hoangph3', '', '2020-10-18 02:07:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userpwd` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`id`, `username`, `userpwd`, `fullname`, `email`, `phone`, `facebook_id`) VALUES
(200023, 'vcshoangp', '1', 'Phạm Hoàng', 'phamhoanghxh1@gmail.com', '0339362666', NULL),
(200024, 'hoangph3', '1', 'Hoàng Phạm', 'ph292292@gmail.com', '000', NULL),
(200025, 'hoang', '1', '121212', '121212@212', '1212', NULL),
(200028, 'tao', '1', 'Táo', '121212@asa1', '1', NULL),
(200029, 'xoai', '1', 'Xoài', '12@3', '1', NULL),
(200030, 'dao', '1', 'Đào Tấn', '111111111111111@aa', '1', NULL),
(200031, 'an', '1', 'Trần Văn An', '111111111111111@aa', '112', NULL),
(200032, 'tho', '1', 'Thọ', '12@3', '1', NULL),
(200033, 'hai', '1', 'Hài', '12121@a', '1', NULL),
(200034, NULL, NULL, 'Hạnh Lê', '', NULL, '2697727203777492');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userpwd` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teacher`
--

INSERT INTO `teacher` (`id`, `username`, `userpwd`) VALUES
(3, 'vcsadmin', '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `challenge`
--
ALTER TABLE `challenge`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `challenge`
--
ALTER TABLE `challenge`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200035;

--
-- AUTO_INCREMENT cho bảng `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
