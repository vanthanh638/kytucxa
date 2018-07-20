-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 19, 2018 lúc 04:56 PM
-- Phiên bản máy phục vụ: 10.1.33-MariaDB
-- Phiên bản PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `kytucxa`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khunha`
--

CREATE TABLE `khunha` (
  `id` int(10) NOT NULL,
  `TenKhuNha` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khunha`
--

INSERT INTO `khunha` (`id`, `TenKhuNha`) VALUES
(1, 'Khu A'),
(2, 'Khu B'),
(3, 'Khu C'),
(5, 'Khu D');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `id` int(10) NOT NULL,
  `TenPhong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IdKhuNha` int(10) NOT NULL,
  `SoSV` int(2) NOT NULL,
  `DaO` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`id`, `TenPhong`, `IdKhuNha`, `SoSV`, `DaO`) VALUES
(1, 'A101', 1, 8, 8),
(2, 'A102', 1, 8, 5),
(4, 'A103', 1, 8, 0),
(5, 'B101', 2, 8, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MaSV` int(10) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenSV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Lop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `QueQuan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IdPhong` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`MaSV`, `password`, `TenSV`, `Lop`, `Email`, `GioiTinh`, `SDT`, `QueQuan`, `IdPhong`) VALUES
(102130150, 'Array', 'Nguyễn Thị Loan', '13T4', 'demo@gmail.com', 'Nữ', '0123456789', 'Vinh, Nghệ An', 0),
(102130176, '123456', 'Trần Văn Thanh', '13T4', 'vanthanh638@gmail.com', 'Nam', '0985616945', 'Nghệ An', 1),
(102130177, '123456', 'Hoàng Linh Tân', '13T4', '123gghghg@gmail.com', 'Nam', '0123456789', 'Quảng Trị', 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `khunha`
--
ALTER TABLE `khunha`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MaSV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `khunha`
--
ALTER TABLE `khunha`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
