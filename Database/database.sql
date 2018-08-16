-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2018 at 03:05 PM
-- Server version: 10.3.8-MariaDB-log
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokobaju1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `idEmail` varchar(50) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `phoneNumber` char(12) DEFAULT NULL,
  `email` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`idEmail`, `picture`, `status`, `phoneNumber`, `email`) VALUES
('willychai04@gmail.com', 'jefiwjife', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idCategory` tinyint(3) UNSIGNED NOT NULL,
  `name` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idCategory`, `name`) VALUES
(1, 'Baju Bayi'),
(2, 'Celana pendek bayi'),
(3, 'Celana panjang bayi'),
(4, 'Sarung tangan'),
(5, 'Kaos kaki'),
(6, 'Topi bayi'),
(7, 'Setelan Baju Bayi'),
(8, 'Baju Bayi');

-- --------------------------------------------------------

--
-- Table structure for table `confirmation`
--

CREATE TABLE `confirmation` (
  `idConfirmation` int(10) UNSIGNED NOT NULL,
  `idNota` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `bank` char(20) NOT NULL,
  `numberAccount` char(30) NOT NULL,
  `accountOwner` char(50) NOT NULL,
  `picture` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confirmation`
--

INSERT INTO `confirmation` (`idConfirmation`, `idNota`, `date`, `bank`, `numberAccount`, `accountOwner`, `picture`) VALUES
(2, 12, '2018-08-16', 'abc', '123', 'aaa', '244c6c370fd1859325f7119e96a81584e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `idContact` tinyint(1) UNSIGNED NOT NULL,
  `idAccount` varchar(50) NOT NULL,
  `idCity` smallint(4) UNSIGNED NOT NULL,
  `idProvince` smallint(4) UNSIGNED NOT NULL,
  `postalCode` mediumint(6) UNSIGNED NOT NULL,
  `Address` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`idContact`, `idAccount`, `idCity`, `idProvince`, `postalCode`, `Address`) VALUES
(6, 'willychai04@gmail.com', 27, 2, 78111, 'Jl. Merdeka');

-- --------------------------------------------------------

--
-- Table structure for table `dataproduct`
--

CREATE TABLE `dataproduct` (
  `idProduct` smallint(5) UNSIGNED NOT NULL,
  `name` char(70) NOT NULL,
  `description` tinytext NOT NULL,
  `size` char(10) NOT NULL,
  `color` char(7) NOT NULL,
  `picture` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataproduct`
--

INSERT INTO `dataproduct` (`idProduct`, `name`, `description`, `size`, `color`, `picture`) VALUES
(4, 'Topi bonnet bayi perempuan bunga', 'Untuk bayi 0-24 bulan (allsize) Lingkar kepala 36-48 cm Material: cotton Pilihan warna: pink dan putih  Harga untuk 1x topi bayi ', 'S-XL', '#e971f2', '4c7489d8c7ef9dfb4cfbeb61b824a363b.jpg'),
(5, 'Topi Pilot Anak &amp; Bayi Rajut', 'Topi Pilot Anak &amp; Bayi Rajut Untuk usia anak : 6 bulan - 3 tahun Ada 9 pilihan warna B, C, D dan F Kosong', 'S-XL', '#97ac40', '5646dd5120051663f2ecea223e6d6adaf.jpg'),
(6, 'baju setelan anak bayi rompi tentara topi - cool army', 'READY SIZE ( 1 , 2 , 3 , 5 , 6 )  Setelan Baju Bayi Army (tentara) dengan Rompi Pisah dan Topi.', 'S-XL', '#278a15', '6940a7888cc97174dc6a61b594921b2b5.jpg'),
(7, 'Jumper Bayi Nanas + Topi Laki laki Perempuan Baju Kostum Karakter Baby', 'Jumper Bayi Nanas + Topi  Bahan : Kaos (lembut, adem dan nyaman dipakai buah hati)', 'S-XL', '#e1dc11', '74ac6dd06335425875f507c83bbf4eb54.jpg'),
(8, 'Setelan Baju Anak Bayi laki Lucu 2 Dasi + Topi - Thomas', 'Pilihan Warna : MERAH?BIRU NAVY/ABU (MOHON CEK STOK DAHULU) 1 set terdiri dari : Baju + Celana + Topi + 2 Dasi (dasi Kupu kupu dan Dasi Panjang)', 'S-XL', '#e90a0f', '8442a6d451b436d8a04137a0e82320f4d.jpg'),
(9, 'KAOS KAKI LUCU BAYI IMPORT MURAH - 12-24mo, tupaicoklattua', 'bahan premium, halus dan sangat nyaman dipakai untuk kaki si Kecil Mom,  bentuk sangat Lucu, menarik, warna cerah, dan bentuk 3d yah Mom^^', 'S-XL', '#219a10', '90c0b025e19357db01cf77ed348a37be5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nonota`
--

CREATE TABLE `nonota` (
  `idNota` int(10) UNSIGNED NOT NULL,
  `idAccount` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `service` char(10) NOT NULL,
  `ongkir` mediumint(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nonota`
--

INSERT INTO `nonota` (`idNota`, `idAccount`, `tanggal`, `service`, `ongkir`, `status`) VALUES
(1, '', '2018-08-16', '', 0, 0),
(2, '', '2018-08-16', 'Array', 49000, 0),
(3, '', '2018-08-16', 'OKE', 49000, 0),
(4, '', '2018-08-16', 'OKE', 49000, 0),
(5, '', '2018-08-16', 'OKE', 49000, 0),
(6, '', '2018-08-16', 'OKE', 49000, 0),
(7, '', '2018-08-16', 'OKE', 49000, 0),
(8, '', '2018-08-16', 'OKE', 49000, 0),
(9, '', '2018-08-16', 'OKE', 49000, 0),
(10, '', '2018-08-16', 'OKE', 49000, 0),
(11, '', '2018-08-16', 'OKE', 49000, 0),
(12, 'willychai04@gmail.com', '2018-08-16', 'OKE', 49000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderr`
--

CREATE TABLE `orderr` (
  `idOrder` int(11) UNSIGNED NOT NULL,
  `idProduct` smallint(5) UNSIGNED NOT NULL,
  `idNota` int(11) UNSIGNED NOT NULL,
  `total` tinyint(3) UNSIGNED NOT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderr`
--

INSERT INTO `orderr` (`idOrder`, `idProduct`, `idNota`, `total`, `message`) VALUES
(1, 5, 1, 1, ''),
(2, 5, 1, 1, ''),
(3, 7, 2, 1, ''),
(4, 5, 2, 1, ''),
(5, 7, 3, 1, ''),
(6, 5, 3, 1, ''),
(7, 7, 4, 1, ''),
(8, 5, 4, 1, ''),
(9, 7, 5, 1, ''),
(10, 5, 5, 1, ''),
(11, 7, 6, 1, ''),
(12, 5, 6, 1, ''),
(13, 7, 7, 1, ''),
(14, 5, 7, 1, ''),
(15, 7, 8, 1, ''),
(16, 5, 8, 1, ''),
(17, 7, 9, 1, ''),
(18, 5, 9, 1, ''),
(19, 5, 11, 1, ''),
(20, 8, 11, 1, ''),
(21, 4, 12, 1, ''),
(22, 7, 12, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idProduct` smallint(5) UNSIGNED NOT NULL,
  `idCategory` tinyint(3) UNSIGNED NOT NULL,
  `capital` mediumint(8) UNSIGNED NOT NULL,
  `sellingPrice` mediumint(8) UNSIGNED NOT NULL,
  `stock` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idProduct`, `idCategory`, `capital`, `sellingPrice`, `stock`) VALUES
(1, 6, 10000, 50000, 100),
(2, 2, 5000, 45000, 10),
(3, 2, 5000, 45000, 10),
(4, 6, 5000, 45000, 10),
(5, 6, 5000, 45000, 10),
(6, 3, 5000, 45000, 10),
(7, 7, 10000, 45000, 10),
(8, 7, 10000, 58000, 10),
(9, 5, 10000, 60000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `name` char(20) NOT NULL,
  `address` tinytext NOT NULL,
  `logo` char(100) NOT NULL,
  `instagram` char(200) NOT NULL,
  `facebook` char(200) NOT NULL,
  `google` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sosmed`
--

CREATE TABLE `sosmed` (
  `idSosmed` tinyint(2) UNSIGNED NOT NULL,
  `userSosmed` char(50) NOT NULL,
  `pass` char(50) NOT NULL,
  `type` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sosmed`
--

INSERT INTO `sosmed` (`idSosmed`, `userSosmed`, `pass`, `type`) VALUES
(1, 'nindya@gmail.com', 'SjIxQWZkbjQh', 'Instagram');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `idTransaction` int(11) NOT NULL,
  `idAccount` varchar(50) NOT NULL,
  `productName` char(100) NOT NULL,
  `total` tinyint(3) NOT NULL,
  `capital` mediumint(8) NOT NULL,
  `sellingPrice` mediumint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trolli`
--

CREATE TABLE `trolli` (
  `idTrolli` int(11) NOT NULL,
  `idAccount` varchar(50) NOT NULL,
  `idProduct` smallint(5) NOT NULL,
  `total` smallint(5) NOT NULL,
  `message` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trolli`
--

INSERT INTO `trolli` (`idTrolli`, `idAccount`, `idProduct`, `total`, `message`) VALUES
(9, 'willychai04@gmail.com', 6, 1, ''),
(10, 'willychai04@gmail.com', 4, 1, ''),
(11, 'willychai04@gmail.com', 4, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`idEmail`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indexes for table `confirmation`
--
ALTER TABLE `confirmation`
  ADD PRIMARY KEY (`idConfirmation`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idContact`),
  ADD KEY `idToken` (`idAccount`),
  ADD KEY `idCity` (`idCity`),
  ADD KEY `idProvince` (`idProvince`);

--
-- Indexes for table `dataproduct`
--
ALTER TABLE `dataproduct`
  ADD PRIMARY KEY (`idProduct`);

--
-- Indexes for table `nonota`
--
ALTER TABLE `nonota`
  ADD PRIMARY KEY (`idNota`);

--
-- Indexes for table `orderr`
--
ALTER TABLE `orderr`
  ADD PRIMARY KEY (`idOrder`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `sosmed`
--
ALTER TABLE `sosmed`
  ADD PRIMARY KEY (`idSosmed`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`idTransaction`);

--
-- Indexes for table `trolli`
--
ALTER TABLE `trolli`
  ADD PRIMARY KEY (`idTrolli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `confirmation`
--
ALTER TABLE `confirmation`
  MODIFY `idConfirmation` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `idContact` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nonota`
--
ALTER TABLE `nonota`
  MODIFY `idNota` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orderr`
--
ALTER TABLE `orderr`
  MODIFY `idOrder` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sosmed`
--
ALTER TABLE `sosmed`
  MODIFY `idSosmed` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `idTransaction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trolli`
--
ALTER TABLE `trolli`
  MODIFY `idTrolli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`idAccount`) REFERENCES `account` (`idEmail`);

--
-- Constraints for table `dataproduct`
--
ALTER TABLE `dataproduct`
  ADD CONSTRAINT `dataproduct_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idProduct`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
