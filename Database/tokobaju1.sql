-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2018 at 09:10 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

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
  `idToken` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `phoneNumber` char(12) DEFAULT NULL,
  `email` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'dalaman');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `idCity` smallint(4) UNSIGNED NOT NULL,
  `name` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `idContact` tinyint(1) UNSIGNED NOT NULL,
  `idToken` varchar(50) NOT NULL,
  `idCity` smallint(4) UNSIGNED NOT NULL,
  `idProvince` smallint(4) UNSIGNED NOT NULL,
  `postalCode` mediumint(6) UNSIGNED NOT NULL,
  `Address` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dataproduct`
--

CREATE TABLE `dataproduct` (
  `idProduct` smallint(5) UNSIGNED NOT NULL,
  `name` char(30) NOT NULL,
  `picture` char(8) NOT NULL,
  `description` tinytext NOT NULL,
  `size` tinyint(2) UNSIGNED NOT NULL,
  `color` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `idProvince` smallint(4) UNSIGNED NOT NULL,
  `name` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `idSale` smallint(5) UNSIGNED NOT NULL,
  `idProduct` smallint(5) UNSIGNED NOT NULL,
  `percent` tinyint(2) UNSIGNED NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `stock` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shippingcompany`
--

CREATE TABLE `shippingcompany` (
  `idCompany` char(5) NOT NULL,
  `name` char(30) NOT NULL,
  `service` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sosmed`
--

CREATE TABLE `sosmed` (
  `id_sosmed` char(50) NOT NULL,
  `pass` char(40) NOT NULL,
  `name` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `idToken` varchar(50) NOT NULL,
  `idProduct` smallint(5) UNSIGNED NOT NULL,
  `idSale` smallint(5) UNSIGNED DEFAULT NULL,
  `total` smallint(5) UNSIGNED NOT NULL,
  `capital` mediumint(8) UNSIGNED NOT NULL,
  `sellingPrice` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trolli`
--

CREATE TABLE `trolli` (
  `idToken` varchar(50) NOT NULL,
  `idProduct` smallint(5) UNSIGNED NOT NULL,
  `idSale` smallint(5) UNSIGNED DEFAULT NULL,
  `total` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`idToken`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`idCity`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idContact`),
  ADD KEY `idToken` (`idToken`),
  ADD KEY `idCity` (`idCity`),
  ADD KEY `idProvince` (`idProvince`);

--
-- Indexes for table `dataproduct`
--
ALTER TABLE `dataproduct`
  ADD PRIMARY KEY (`idProduct`);

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
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`idProvince`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`idSale`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indexes for table `shippingcompany`
--
ALTER TABLE `shippingcompany`
  ADD PRIMARY KEY (`idCompany`);

--
-- Indexes for table `sosmed`
--
ALTER TABLE `sosmed`
  ADD PRIMARY KEY (`id_sosmed`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`idToken`),
  ADD KEY `idProduct` (`idProduct`),
  ADD KEY `idSale` (`idSale`);

--
-- Indexes for table `trolli`
--
ALTER TABLE `trolli`
  ADD PRIMARY KEY (`idToken`),
  ADD KEY `idProduct` (`idProduct`),
  ADD KEY `idSale` (`idSale`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `idContact` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `idSale` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`idToken`) REFERENCES `account` (`idToken`),
  ADD CONSTRAINT `contact_ibfk_2` FOREIGN KEY (`idCity`) REFERENCES `city` (`idCity`),
  ADD CONSTRAINT `contact_ibfk_3` FOREIGN KEY (`idProvince`) REFERENCES `province` (`idProvince`);

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

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idProduct`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`idToken`) REFERENCES `account` (`idToken`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idProduct`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`idSale`) REFERENCES `sale` (`idSale`);

--
-- Constraints for table `trolli`
--
ALTER TABLE `trolli`
  ADD CONSTRAINT `trolli_ibfk_1` FOREIGN KEY (`idToken`) REFERENCES `account` (`idToken`),
  ADD CONSTRAINT `trolli_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idProduct`),
  ADD CONSTRAINT `trolli_ibfk_3` FOREIGN KEY (`idSale`) REFERENCES `sale` (`idSale`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
