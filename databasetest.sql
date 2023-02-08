-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2023 at 06:17 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `databasetest`
--

-- --------------------------------------------------------

--
-- Table structure for table `congty`
--

CREATE TABLE `congty` (
  `id_congty` int(11) NOT NULL auto_increment,
  `tencongty` varchar(50) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `dienthoai` varchar(10) default NULL,
  `fax` varchar(10) default NULL,
  PRIMARY KEY  (`id_congty`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `congty`
--

INSERT INTO `congty` (`id_congty`, `tencongty`, `diachi`, `dienthoai`, `fax`) VALUES
(1, 'Apple', '23 Nguyễn Du - Quận 1 - TP HCM', '0368794556', '0368794556'),
(2, 'SamSung', 'Khu công nghiệp Biên Hòa - Đồng Nai', '0397826451', '0397826451');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(11) NOT NULL auto_increment,
  `tensanpham` varchar(50) NOT NULL,
  `gia` double NOT NULL,
  `giamgia` double NOT NULL,
  `mota` varchar(150) default NULL,
  `hinh` varchar(50) NOT NULL,
  `id_congty` int(11) NOT NULL,
  PRIMARY KEY  (`id_sanpham`),
  KEY `id congty` (`id_congty`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `tensanpham`, `gia`, `giamgia`, `mota`, `hinh`, `id_congty`) VALUES
(1, 'Iphone 12', 900, 750, 'Sản phẩm mới nhất của Apple ra mắt 2020 ', 'iphone12.jpg', 1),
(2, 'SamSung S20', 900, 700, 'Sản phẩm mới nhất của SamSung ra mắt 2020 ', 'S20.jpg', 2),
(3, 'Iphone 13', 1200, 600, 'Sản phẩm mới nhất của Apple ra mắt 2021', 'iphone13.jpg', 1),
(4, 'Samsung Galaxy S21 Ultra 5G', 800, 700, 'Đen Nguyên BảnĐen Nguyên BảnBạc Ngẫu HứngBạc Ngẫu Hứng Samsung Galaxy S21 Ultra 5G', 'S21.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `UserName` varchar(50) NOT NULL,
  `PassWord` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`UserName`, `PassWord`) VALUES
('admin', '202cb962ac59075b964b07152d234b70');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_congty`) REFERENCES `congty` (`id_congty`) ON DELETE CASCADE ON UPDATE CASCADE;
