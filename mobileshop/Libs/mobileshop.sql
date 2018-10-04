-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2017 at 02:44 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobileshop02`
--

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `ID` int(11) NOT NULL,
  `MaTaiKhoan` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `TinhTrang` varchar(50) COLLATE utf16_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Dumping data for table `dathang`
--

INSERT INTO `dathang` (`ID`, `MaTaiKhoan`, `MaSanPham`, `SoLuong`, `TinhTrang`) VALUES
(1, 3, 10, 1, 'đã giao hàng');

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `ID` int(11) NOT NULL,
  `TenLoai` varchar(50) COLLATE utf16_vietnamese_ci NOT NULL,
  `Icon` varchar(50) COLLATE utf16_vietnamese_ci NOT NULL,
  `IDName` varchar(50) COLLATE utf16_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`ID`, `TenLoai`, `Icon`, `IDName`) VALUES
(5, 'ĐIỆN THOẠI', 'iphone.png', 'dienthoai'),
(6, 'TABLET', 'tablet.png', 'tablet'),
(7, 'LAPTOP', 'laptop.png', 'laptop'),
(8, 'PHỤ KIỆN', 'phukien.png', 'phukien'),
(9, 'SIM, THẺ', 'sim.png', 'sim');

-- --------------------------------------------------------

--
-- Table structure for table `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `ID` int(11) NOT NULL,
  `NhaSanXuat` varchar(100) CHARACTER SET ucs2 COLLATE ucs2_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Dumping data for table `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`ID`, `NhaSanXuat`) VALUES
(1, 'HTC'),
(2, 'Apple'),
(3, 'Samsung'),
(4, 'Sony'),
(5, 'OPPO'),
(6, 'Dell'),
(7, 'Asus'),
(8, 'HP-Compaq'),
(9, 'Lenovo'),
(10, 'Acer'),
(11, 'Macbook(Apple)');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `ID` int(11) NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `TenSanPham` varchar(50) COLLATE utf16_vietnamese_ci NOT NULL,
  `MaNhaSanXuat` int(11) NOT NULL,
  `SoLuong` int(50) NOT NULL,
  `Gia` decimal(19,3) NOT NULL,
  `ChiTiet` varchar(500) CHARACTER SET ucs2 COLLATE ucs2_vietnamese_ci NOT NULL,
  `Img` varchar(100) COLLATE utf16_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`ID`, `MaLoai`, `TenSanPham`, `MaNhaSanXuat`, `SoLuong`, `Gia`, `ChiTiet`, `Img`) VALUES
(2, 5, 'Điện thoại Samsung Galaxy S7 Edge (Xanh Coral)', 3, 100, '18490000.000', '+ Màn hình: Super AMOLED, 5.5", Quad HD<br/>+ Camera: 12 MP<br/>+ RAM: 4 GB', 'samsung-galaxy-s7-edge-blue-coral-edition-1-400x460-400x460.png'),
(3, 5, 'Điện thoại iPhone 7 Plus 256GB', 2, 100, '27990000.000', '+ Màn hình: LED-backlit IPS LCD, 5.5", Retina HD<br/>+ Camera: Hai camera 12 MPP<br/>+ RAM: 3 GB', 'iphone-7-plus-256gb-2-400x460.png'),
(4, 5, 'Điện thoại Sony Xperia XZ', 4, 100, '14990000.000', '+ Màn hình: TRILUMINOS™, 5.2", Full HD<br/>+ Camera: 23 MP<br/>+ RAM: 3 GB', 'sony-xperia-xz-1-400x460.png'),
(5, 5, 'Điện thoại OPPO F1 Plus', 5, 100, '9990000.000', '+ Màn hình: AMOLED, 5.5", Full HD<br/>+ Camera: 13 MP<br/>+ RAM: 4 GB', 'oppo-f1-plus-3-400x460.png'),
(6, 5, 'Điện thoại HTC 10', 1, 100, '16990000.000', '+ Màn hình: SSuper LCD 5, 5.2", Quad HD<br/>+ Camera: 12 MP<br/>+ RAM: 4 GB', 'htc-102-400x460.png'),
(7, 5, 'Điện thoại iPhone 6s Plus', 2, 100, '18990000.000', '+ Màn hình: Super AMOLED, 5.5", Quad HD<br/>+ Camera: 12 MP<br/>+ RAM: 4 GB', 'iphone-6s-plus-64gb-400-400x450.png'),
(8, 5, 'Điện thoại iPhone 6 Plus', 2, 100, '15990000.000', '+ Màn hình: LED-backlit IPS LCD, 5.5", Retina HD<br/>+ Camera: 8 MP<br/>+ RAM: 1 GB', 'iphone-6-plus-64gb-3-400x460.png'),
(9, 5, 'Điện thoại iPhone SE', 2, 100, '10990000.000', '+ Màn hình: Super AMOLED, 5.5", Quad HD<br/>+ Camera: 12 MP<br/>+ RAM: 4 GB', 'iphone-se-64gb-400x460.png'),
(10, 5, 'Điện thoại Samsung Galaxy S7', 3, 100, '14990000.000', '+ Màn hình: Super AMOLED, 5.5", Quad HD<br/>+ Camera: 12 MP<br/>+ RAM: 4 GB', 'samsung-galaxy-s7-2-400x460.png'),
(11, 5, 'Điện thoại Samsung Galaxy Note 5', 3, 100, '12490000.000', '+ Màn hình: Super AMOLED, 5.5", Quad HD<br/>+ Camera: 12 MP<br/>+ RAM: 4 GB', 'samsung-galaxy-note-5-1-400x534-1-400x448.png'),
(12, 5, 'Điện thoại Samsung Galaxy A9 Pro', 3, 100, '10990000.000', '+ Màn hình: Super AMOLED, 6", Full HD<br/>+ Camera: 16 MP<br/>+ RAM: 4 GB', 'samsung-galaxy-a9-pro-1-400x460.png'),
(13, 5, 'Điện thoại Samsung Galaxy A7', 3, 100, '8990000.000', '+ Màn hình: Super AMOLED, 5.5", Quad HD<br/>+ Camera: 12 MP<br/>+ RAM: 4 GB', 'samsung-galaxy-a7-2016-1-400x460-400x460.png'),
(14, 5, 'Điện thoại Samsung Galaxy J7 Prime', 3, 100, '6290000.000', '+ Màn hình: PLS TFT LCD, 5.5", Full HD<br/>+ Camera: 8 MP<br/>+ RAM: 3 GB', 'samsung-galaxy-j7-prime-1-400x460.png'),
(15, 5, 'Điện thoại OPPO F1s', 5, 100, '5990000.000', '+ Màn hình: IPS LCD, 5.5", HD<br/>+ Camera: 16 MP<br/>+ RAM: 3 GB', 'oppo-f1s-hero-400x460-400x460.png'),
(16, 5, 'Điện thoại OPPO A39 (Neo 9s)', 5, 100, '4690000.000', '+ Màn hình: Super AMOLED, 5.2", Quad HD<br/>+ Camera: 13 MP<br/>+ RAM: 3 GB', 'oppo-a39-hero-1-1-400x460.png'),
(17, 5, 'Điện thoại Sony Xperia Z5 Dual', 4, 100, '10990000.000', '+ Màn hình: Super AMOLED, 5.5", Quad HD<br/>+ Camera: 12 MP<br/>+ RAM: 4 GB', 'sony-xperia-z5-dual-400x460.png'),
(18, 5, 'Điện thoại Sony Xperia X', 4, 100, '9990000.000', '+ Màn hình: IPS LCD, 5", Full HD<br/>+ Camera: 13 MP<br/>+ RAM: 3 GB', 'sony-xperia-x-1-400x460.png'),
(19, 5, 'Điện thoại Sony Xperia XA Ultra', 4, 100, '7490000.000', '+ Màn hình: IPS LCD, 6", Full HD<br/>+ Camera: 16 MP<br/>+ RAM: 3 GB', 'sony-xperia-xa-ultra-1-400x460.png'),
(20, 5, 'Điện thoại Sony Xperia M5', 4, 100, '6990000.000', '+ Màn hình: IPS LCD, 5", Full HD<br/>+ Camera: 13 MP<br/>+ RAM: 3 GB', 'sony-xperia-m5-single-sim-hero-400x534.png'),
(21, 5, 'Điện thoại HTC One A9', 1, 100, '7192000.000', '+ Màn hình: AMOLED, 5", Full HD<br/>+ Camera: 13 MP<br/>+ RAM: 2 GB', 'htc-one-a9-2-400x460.png'),
(22, 5, 'Điện thoại HTC Desire 10 Pro', 1, 100, '7990000.000', '+ Màn hình: IPS LCD, 5.5", Full HD<br/>+ Camera: 13 MP<br/>+ RAM: 4 GB', 'htc-desire-10-pro-400x460.png'),
(23, 5, 'Điện thoại HTC One ME', 1, 100, '5990000.000', '+ Màn hình: Super LCD 3, 5.2", Quad HD<br/>+ Camera: 20 MP<br/>+ RAM: 3 GB', 'htc-one-me9-global-gold-sepia-sketchfab-443x425.png'),
(24, 5, 'Điện thoại Samsung Galaxy S7 Edge', 3, 100, '16990000.000', '+ Màn hình: Super AMOLED, 5.5", Quad HD<br/>+ Camera: 12 MP<br/>+ RAM: 4 GB', 'samsung-galaxy-s7-edge-pink-gold-edition-400x460.png'),
(25, 5, 'Điện thoại iPhone 7 Plus 32GB', 2, 100, '22290000.000', '+ Màn hình: LED-backlit IPS LCD, 5.5", Retina HD<br/>+ Camera: 12 MP<br/>+ RAM: 3 GB', 'iphone-7-plus-2-400x460-400x460.png'),
(26, 6, 'Máy tính bảng Samsung Galaxy Tab 3V T116', 3, 100, '2990000.000', '+ Màn hình: TFT, 7"<br/>+ Camera: 2 MP<br/>+ RAM: 1 GB', 'samsung-galaxy-tab-3v-t116-400x460.png'),
(27, 6, 'Máy tính bảng Samsung Galaxy Tab E 9.6 (SM-T561)', 3, 100, '4990000.000', '+ Màn hình: WXGA TFT, 9.6"<br/>+ Camera: 5 MP<br/>+ RAM: 1.5 GB', 'samsung-galaxy-tab-e-96-sm-t561--1.jpg'),
(28, 6, 'Máy tính bảng iPad Mini 2 Retina 16GB/WiFi', 2, 100, '5990000.000', '+ Màn hình: Retina công nghệ IPS, 7.9"<br/>+ Camera: 5 MP<br/>+ RAM: 1 GB', 'ipad-mini-2-retina-cellular-16gb-02.jpg'),
(29, 6, 'Máy tính bảng Samsung Galaxy Tab A 9.7 (SM-P555)', 3, 100, '6490000.000', '+ Màn hình: 	TFT LCD, 9.7"<br/>+ Camera: 5 MP<br/>+ RAM: 2 GB', 'samsung-galaxy-tab-a-plus-97-sm-p555-533but-3-400x533.png'),
(30, 6, 'Máy tính bảng iPad Mini 4 Wifi 32GB', 2, 100, '10490000.000', '+ Màn hình: Super AMOLED, 5.5", Quad HD<br/>+ Camera: 12 MP<br/>+ RAM: 4 GB', 'ipad-mini-4-wifi-32gb-400-400x460.png'),
(31, 6, 'Máy tính bảng Samsung Galaxy Tab A6 10.1 Spen', 3, 100, '8990000.000', '+ Màn hình: PLS LCD, 10.1"\r\n<br/>+ Camera: 8 MP<br/>+ RAM: 3 GB', 'samsung-galaxy-tab-a6-101-spen-6.jpg'),
(32, 6, 'Máy tính bảng iPad Mini 3 Retina Cellular 16GB', 2, 100, '9341000.000', '+ Màn hình: Retina công nghệ IPS, 7.9"<br/>+ Camera: 5 MP<br/>+ RAM: 1 GB', 'ipad-mini-3-cellular-icon-2-400x533.png'),
(33, 6, 'Máy tính bảng iPad Air 2 Cellular 16GB', 2, 100, '11990000.000', '+ Màn hình: Retina công nghệ IPS, 9.7"<br/>+ Camera: 8 MP<br/>+ RAM: 2 GB', 'ipad-air-2-cellular-16g-1-300x420.png'),
(34, 7, 'Laptop Lenovo IdeaPad 100S/2GB/32GB/Win10', 9, 100, '3990000.000', '+CPU: Intel, Atom, Z3735F Quad-Core, 1.33 GHz</br>+ RAM: DDR3L(On board), 2 GB, 1600 MHz</br>+ Màn hình: 11.6 inch, HD', 'lenovo-ideapad-100s-2-400x400.png'),
(35, 7, 'Laptop Acer ES1 431/4GB/500GB/Win10', 10, 100, '5990000.000', '+CPU: Intel, Atom, Z3735F Quad-Core, 1.33 GHz</br>+ RAM: DDR3L(On board), 2 GB, 1600 MHz</br>+ Màn hình: 11.6 inch, HD', 'acer-es1-431-n3060-4gb-500gb-win10-400x400.png'),
(36, 7, 'Laptop Asus E402SA/2GB/500GB/Win10', 7, 100, '6290000.000', '+CPU: Intel, Celeron, N3060, 1.60 GHz</br>+ RAM: DDR3L(On board), 2 GB, 1600 MHz</br>+ Màn hình: 14 inch, HD ', 'asus-e402sa-wx251t-400-400x400.png'),
(37, 7, 'Laptop HP 14 am065TU/4GB/500GB/Win10', 8, 100, '6390000.000', '+CPU: Intel, Celeron, N3060, 1.60 GHz</br>+ RAM: DDR3L (1 khe RAM), 4 GB, 1600 MHz</br>+ Màn hình: 14 inch, HD', 'hp-14-am065tu-x3b72pa-400x400-400x400.png'),
(38, 7, 'Laptop Dell Inspiron 3552/4GB/500GB/Win10', 6, 100, '6690000.000', '+CPU: Intel, Celeron, N3060, 1.60 GHz</br>+ RAM: DDR3L (1 khe RAM), 4 GB, 1600 MHz</br>+ Màn hình: 15.6 inch, HD', 'dell-inspiron-3552-v5c008w-400-400x400.png'),
(39, 7, 'Laptop Apple Macbook MMGL2 Core M 1.1G/8GB/256GB', 11, 100, '28490000.000', '+CPU: Intel, Core M, -, 1.10 GHz</br>+ RAM: DDR3, 8 GB, 1866 MHz</br>+ Màn hình: 12 inch, Retina', 'apple-macbook-12-mmgl2-core-m-11g-8gb-256gb-macos-400-400x400.png');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `ID` int(11) NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `TenTaiKhoan` varchar(50) COLLATE utf16_vietnamese_ci NOT NULL,
  `MatKhau` varchar(50) COLLATE utf16_vietnamese_ci NOT NULL,
  `HoTen` varchar(50) COLLATE utf16_vietnamese_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` varchar(255) COLLATE utf16_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`ID`, `MaLoai`, `TenTaiKhoan`, `MatKhau`, `HoTen`, `NgaySinh`, `DiaChi`) VALUES
(2, 0, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Quản trị', '1991-12-04', 'Hà nội'),
(3, 1, 'cpvo', 'e10adc3949ba59abbe56e057f20f883e', 'Cao Phi Võ', '1991-09-04', 'Vĩnh Long');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MaTaiKhoan` (`MaTaiKhoan`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MaLoai` (`MaLoai`),
  ADD KEY `MaNhaSanXuat` (`MaNhaSanXuat`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dathang`
--
ALTER TABLE `dathang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `FK_DATHANG_SANPHAM` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`ID`),
  ADD CONSTRAINT `FK_DATHANG_TAIKHOAN` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`ID`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_SANPHAM_NHASANXUAT` FOREIGN KEY (`MaNhaSanXuat`) REFERENCES `nhasanxuat` (`ID`),
  ADD CONSTRAINT `FK_SANPHAN_LOAI` FOREIGN KEY (`MaLoai`) REFERENCES `loai` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
