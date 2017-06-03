-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2014 at 09:41 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sn_snowra`
--

-- --------------------------------------------------------

--
-- Table structure for table `sn_account`
--

CREATE TABLE IF NOT EXISTS `sn_account` (
  `SN_AccountId` int(11) NOT NULL AUTO_INCREMENT,
  `SN_PersonId` int(11) NOT NULL DEFAULT '0',
  `SN_ReceipId` varchar(100) DEFAULT NULL,
  `SN_Debit` int(11) DEFAULT NULL,
  `SN_Credit` int(11) DEFAULT NULL,
  `SN_Description` varchar(2000) DEFAULT NULL,
  `Record_on` date DEFAULT NULL,
  PRIMARY KEY (`SN_AccountId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `sn_account`
--

INSERT INTO `sn_account` (`SN_AccountId`, `SN_PersonId`, `SN_ReceipId`, `SN_Debit`, `SN_Credit`, `SN_Description`, `Record_on`) VALUES
(11, 1, '11', 0, 11, '11', '2014-03-20'),
(18, 2, '123', 0, 500, '321', '2014-03-20'),
(17, 2, '951', 0, 50000, 'From Lhr', '2014-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `sn_person`
--

CREATE TABLE IF NOT EXISTS `sn_person` (
  `SN_PersonId` int(11) NOT NULL AUTO_INCREMENT,
  `SN_Name` varchar(50) NOT NULL,
  `SN_Company` varchar(50) DEFAULT NULL,
  `SN_TypeId` int(11) DEFAULT NULL,
  `SN_Title` varchar(50) DEFAULT NULL,
  `SN_Phone` varchar(20) DEFAULT NULL,
  `SN_Mobile` varchar(20) DEFAULT NULL,
  `SN_Email` varchar(30) DEFAULT NULL,
  `SN_Website` varchar(50) DEFAULT NULL,
  `SN_Description` varchar(2000) DEFAULT NULL,
  `Record_on` date DEFAULT NULL,
  PRIMARY KEY (`SN_PersonId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `sn_person`
--

INSERT INTO `sn_person` (`SN_PersonId`, `SN_Name`, `SN_Company`, `SN_TypeId`, `SN_Title`, `SN_Phone`, `SN_Mobile`, `SN_Email`, `SN_Website`, `SN_Description`, `Record_on`) VALUES
(1, 'Ali', 'Snowra', 1, 'Plumber', '0511234567', '03001234567', 'ali@snowrabulider.com', 'snowrabulider.com', 'Pluber work in first block', '2014-02-13'),
(2, 'Asad', 'Snowra', 2, 'Electriction', '0517654321', '03007654321', 'Asad@snowrabulider.com', 'snowrabulider.com', 'Electrical worker', '2014-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `sn_stock`
--

CREATE TABLE IF NOT EXISTS `sn_stock` (
  `SN_Stock_Id` int(11) NOT NULL AUTO_INCREMENT,
  `SN_PersonId` int(11) NOT NULL,
  `SN_SType_Id` int(11) NOT NULL,
  `SN_Amount` varchar(1000) NOT NULL,
  `SN_Quantity` int(11) NOT NULL,
  `SN_Description` varchar(2000) NOT NULL,
  `Record_on` date NOT NULL,
  PRIMARY KEY (`SN_Stock_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `sn_stock`
--

INSERT INTO `sn_stock` (`SN_Stock_Id`, `SN_PersonId`, `SN_SType_Id`, `SN_Amount`, `SN_Quantity`, `SN_Description`, `Record_on`) VALUES
(28, 2, 1, '500', 10, '321', '2014-03-20'),
(25, 1, 1, '5000', 100, 'From Rwl\r\n', '2014-03-20'),
(26, 1, 1, '1000', 10, '654', '2014-03-20'),
(27, 2, 2, '50000', 1000, 'From Lhr', '2014-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `sn_stock_current`
--

CREATE TABLE IF NOT EXISTS `sn_stock_current` (
  `Sn_Stock_CId` int(11) NOT NULL AUTO_INCREMENT,
  `SN_PersonId` int(11) DEFAULT NULL,
  `SN_SType_Id` int(11) DEFAULT NULL,
  `SN_Quantity` int(11) NOT NULL,
  PRIMARY KEY (`Sn_Stock_CId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sn_stock_current`
--

INSERT INTO `sn_stock_current` (`Sn_Stock_CId`, `SN_PersonId`, `SN_SType_Id`, `SN_Quantity`) VALUES
(2, 1, 1, 100),
(3, 2, 2, 100),
(4, 2, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sn_stock_type`
--

CREATE TABLE IF NOT EXISTS `sn_stock_type` (
  `SN_SType_Id` int(11) NOT NULL AUTO_INCREMENT,
  `SN_Description` varchar(2000) NOT NULL,
  PRIMARY KEY (`SN_SType_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sn_stock_type`
--

INSERT INTO `sn_stock_type` (`SN_SType_Id`, `SN_Description`) VALUES
(1, 'Cement'),
(2, 'Bricks'),
(6, 'Pipes'),
(5, 'Crush'),
(7, 'Paint');

-- --------------------------------------------------------

--
-- Table structure for table `sn_type`
--

CREATE TABLE IF NOT EXISTS `sn_type` (
  `SN_Id` int(11) NOT NULL AUTO_INCREMENT,
  `SN_Description` varchar(2000) NOT NULL,
  PRIMARY KEY (`SN_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sn_type`
--

INSERT INTO `sn_type` (`SN_Id`, `SN_Description`) VALUES
(1, 'Worker'),
(2, 'Contractor'),
(3, 'Supplier');
