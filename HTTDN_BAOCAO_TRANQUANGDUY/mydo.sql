-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 12, 2021 lúc 04:01 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mydo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `useradmin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `passadmin` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`useradmin`, `passadmin`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `mahoadon` int(11) NOT NULL,
  `masanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`mahoadon`, `masanpham`, `soluong`, `dongia`) VALUES
(2, 1, 2, 10000),
(3, 1, 1, 10000),
(4, 1, 1, 10000),
(5, 1, 3, 10000),
(6, 3, 1, 15000000),
(7, 3, 1, 15000000),
(8, 3, 1, 15000000),
(9, 1, 1, 10000),
(10, 12, 1, 233323000),
(11, 12, 1, 233323000),
(12, 12, 1, 233323000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cuahang`
--

CREATE TABLE `cuahang` (
  `macuahang` int(11) NOT NULL,
  `mataikhoan` int(11) NOT NULL,
  `tencuahang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sodienthoai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` text COLLATE utf8_unicode_ci NOT NULL,
  `tinhtrang` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cuahang`
--

INSERT INTO `cuahang` (`macuahang`, `mataikhoan`, `tencuahang`, `sodienthoai`, `diachi`, `tinhtrang`) VALUES
(1, 7, 'cửa hàng của a', '0987654321', 'trái đất', 1),
(3, 8, 'cửa hàng của b', '1234567890', 'asd ad 2', 1),
(4, 4, 'cua hang cd', '0889742044', 'tùm ụa', 1),
(5, 3, 'cua hang c222', '1231231231', '12321', 1),
(6, 9, 'cua hang c222', '1231231231', 'tùm ụa', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `deta`
--

CREATE TABLE `deta` (
  `mahoadon` int(11) NOT NULL,
  `makhachhang` int(11) NOT NULL,
  `tenkhachhang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `sodienthoai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `deta`
--

INSERT INTO `deta` (`mahoadon`, `makhachhang`, `tenkhachhang`, `gioitinh`, `sodienthoai`, `diachi`) VALUES
(2, 5, 'qwe', 'Nam', '1234567890', '123 '),
(3, 5, 'qwe', 'Nam', '1234567890', '123 '),
(4, 5, 'asd asd á dsa dá dsa d', 'Nữ', '1234567890', 'q weq qư ewq ewq ewq eqw eqw e'),
(5, 5, 'asd asd á dsa dá dsa d', 'Nữ', '1234567890', 'q weq qư ewq ewq ewq eqw eqw e'),
(6, 1, '', '', '', ''),
(0, 5, 'nguyễn văn a', 'Nữ', '1234567890', 'ádasd'),
(0, 5, 'nguyễn văn a', 'Nữ', '1234567890', 'ádasd'),
(0, 5, 'nguyễn văn a', 'Nữ', '1234567890', 'ádasd'),
(0, 5, 'nguyễn văn a', 'Nữ', '1234567890', 'ádasd'),
(7, 6, 'nguyễn văn b', 'Nam', '0345345345', 'asda dwqd wq dwq dqwd2 d21 e21 e21e'),
(8, 5, 'nguyễn văn a', 'Nữ', '1234567890', 'ádasd'),
(0, 6, 'nguyễn văn b', 'Nam', '0345345345', 'asda dwqd wq dwq dqwd2 d21 e21 e21e'),
(0, 6, 'nguyễn văn b', 'Nam', '0345345345', 'asda dwqd wq dwq dqwd2 d21 e21 e21e'),
(0, 6, 'nguyễn văn b', 'Nam', '0345345345', 'asda dwqd wq dwq dqwd2 d21 e21 e21e'),
(0, 6, 'nguyễn văn b', 'Nam', '0345345345', 'asda dwqd wq dwq dqwd2 d21 e21 e21e'),
(0, 6, 'nguyễn văn b', 'Nam', '0345345345', 'asda dwqd wq dwq dqwd2 d21 e21 e21e'),
(0, 6, 'nguyễn văn b', 'Nam', '0345345345', 'asda dwqd wq dwq dqwd2 d21 e21 e21e'),
(0, 6, 'nguyễn văn b', 'Nam', '0345345345', 'asda dwqd wq dwq dqwd2 d21 e21 e21e'),
(9, 6, 'nguyễn văn b', 'Nam', '0345345345', 'asda dwqd wq dwq dqwd2 d21 e21 e21e'),
(10, 7, 'Mèo', 'Nam', '0889742042', 'dá'),
(11, 8, 'min', 'Nam', '0889742041', 'abc'),
(12, 8, 'min', 'Nam', '0889742041', 'abc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `makhachhang` int(11) NOT NULL,
  `masanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `mahoadon` int(11) NOT NULL,
  `makhachhang` int(11) NOT NULL,
  `tongdonhang` float NOT NULL,
  `phivanchuyen` float NOT NULL,
  `thue` float NOT NULL,
  `tongthanhtoan` float NOT NULL,
  `ngaytao` datetime NOT NULL,
  `XACNHAN` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`mahoadon`, `makhachhang`, `tongdonhang`, `phivanchuyen`, `thue`, `tongthanhtoan`, `ngaytao`, `XACNHAN`) VALUES
(2, 5, 20000, 2000, 2000, 24000, '2021-05-10 11:21:40', 1),
(3, 5, 10000, 1000, 1000, 12000, '2021-05-10 11:27:10', 2),
(4, 5, 10000, 1000, 1000, 12000, '2021-05-10 11:40:46', 1),
(5, 5, 30000, 3000, 3000, 36000, '2021-05-10 14:55:29', 0),
(6, 1, 15000000, 1500000, 1500000, 18000000, '2021-05-10 15:26:39', 0),
(7, 6, 15000000, 1500000, 1500000, 18000000, '2021-05-10 18:28:23', 1),
(8, 5, 15000000, 1500000, 1500000, 18000000, '2021-05-10 18:30:14', 1),
(9, 6, 10000, 1000, 1000, 12000, '2021-05-10 18:43:06', 0),
(10, 7, 233323000, 23332300, 23332300, 279988000, '2021-05-12 07:05:27', 1),
(11, 8, 233323000, 23332300, 23332300, 279988000, '2021-05-12 08:37:09', 0),
(12, 8, 233323000, 23332300, 23332300, 279988000, '2021-05-12 08:37:37', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makhachhang` int(11) NOT NULL,
  `mataikhoan` int(11) DEFAULT NULL,
  `tenkhachhang` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gioitinh` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodienthoai` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makhachhang`, `mataikhoan`, `tenkhachhang`, `gioitinh`, `sodienthoai`, `diachi`) VALUES
(1, 3, 'min', 'Nam', '0889742041', 'abc'),
(2, 4, 'min', 'Nam', '0889742041', 'abc'),
(3, 5, 'min', 'Nam', '0889742041', 'abc'),
(4, 6, 'min', 'Nam', '0889742041', 'abc'),
(5, 7, 'min', 'Nam', '0889742041', 'abc'),
(6, 8, 'min', 'Nam', '0889742041', 'abc'),
(7, 9, 'min', 'Nam', '0889742041', 'abc'),
(8, 10, 'min', 'Nam', '0889742041', 'abc'),
(9, 11, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masanpham` int(11) NOT NULL,
  `macuahang` int(11) NOT NULL,
  `tensanpham` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` text COLLATE utf8_unicode_ci NOT NULL,
  `mota` text CHARACTER SET utf8 NOT NULL,
  `dongia` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `tennhasanxuat` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masanpham`, `macuahang`, `tensanpham`, `hinhanh`, `mota`, `dongia`, `soluong`, `tennhasanxuat`) VALUES
(1, 1, 'may anh sony', 'sanpham/1dx3.jpg', 'Tốt', 10000, 8, 'sony'),
(2, 1, 'ffffffffffffffffffffffffffffffffff', 'sanpham/nikon-coolpix-w300.jpg', 'good', 333333, 222, 'v'),
(3, 1, 'sản phẩm thứ hai', 'sanpham/nikon-coolpix-w300.jpg', 'Ngon', 15000000, 10, 'panasonic'),
(4, 1, 'Máy Ảnh Cầm Tay', 'sanpham/may-anh-nikon-z7(3).jpg', '<p>DỞ</p>', 122222000000000, 1, 'Kion'),
(6, 1, 'Canon EOS 290D + Kit 18-1364mm', 'sanpham/nikond780.jpg', 'Chụp Ngon', 10000000000, 8, 'Sony'),
(9, 1, 'Canon EOS 922D + Kit 18-13622mm', 'sanpham/canon-eos-800d.jpg', 'Ngon', 2000000, 23, 'Canon'),
(11, 1, 'máy ảnh hingh', 'sanpham/sony-cybershot-dsc-w830-den.jpeg', 'Tốt', 10000000000, 12, 'Sony'),
(12, 1, 'Máy Ảnh Đời Tống', 'sanpham/nikon-d5600-body(1).jpg', 'Tốt', 233323000, 10, 'NiKon'),
(13, 1, 'máy ảnh  komn', 'sanpham/20140065_1951043328509509_6929581866710081595_n.jpg', '<p>222</p>', 1221120000, 2, 'mikm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `mataikhoan` int(11) NOT NULL,
  `tentaikhoan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tinhtrang` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`mataikhoan`, `tentaikhoan`, `email`, `matkhau`, `tinhtrang`) VALUES
(1, 'test1', 'test1@gmail.com', '123', 0),
(3, '1', '1@gmail.com', '1', 1),
(4, '2', '2@gmail', '2', 1),
(5, '3', '3@qqwe', '3', 1),
(6, '4', '4@123123', '4', 1),
(7, 'a', 'a@xn--dasdasd-gwa', 'a', 1),
(8, 'b', 'b@adawdaasd', 'b', 1),
(9, '123', 'dotieumi123@gmail.com', '123', 0),
(10, 'abc123', 'dotieumi12223@gmail.com', '123', 0),
(11, 'abc1234', 'dotieumi1223@gmail.com', '123', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`mahoadon`,`masanpham`) USING BTREE,
  ADD KEY `masanpham` (`masanpham`);

--
-- Chỉ mục cho bảng `cuahang`
--
ALTER TABLE `cuahang`
  ADD PRIMARY KEY (`macuahang`),
  ADD KEY `mataikhoan` (`mataikhoan`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`makhachhang`,`masanpham`),
  ADD KEY `masanpham` (`masanpham`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahoadon`),
  ADD KEY `makhachhang` (`makhachhang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makhachhang`),
  ADD KEY `khachhang_ibfk_1` (`mataikhoan`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masanpham`),
  ADD KEY `macuahang` (`macuahang`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`mataikhoan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cuahang`
--
ALTER TABLE `cuahang`
  MODIFY `macuahang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `mahoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makhachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `mataikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`masanpham`) REFERENCES `sanpham` (`masanpham`),
  ADD CONSTRAINT `chitiethoadon_ibfk_3` FOREIGN KEY (`mahoadon`) REFERENCES `hoadon` (`mahoadon`);

--
-- Các ràng buộc cho bảng `cuahang`
--
ALTER TABLE `cuahang`
  ADD CONSTRAINT `cuahang_ibfk_1` FOREIGN KEY (`mataikhoan`) REFERENCES `taikhoan` (`mataikhoan`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`makhachhang`) REFERENCES `khachhang` (`makhachhang`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`masanpham`) REFERENCES `sanpham` (`masanpham`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`makhachhang`) REFERENCES `khachhang` (`makhachhang`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`mataikhoan`) REFERENCES `taikhoan` (`mataikhoan`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`macuahang`) REFERENCES `cuahang` (`macuahang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
