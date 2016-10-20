-- phpMyAdmin SQL Dump
-- version 4.0.10.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2016 at 12:02 PM
-- Server version: 5.1.73-log
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `CSC423TermProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

DROP TABLE IF EXISTS `Customer`;
CREATE TABLE IF NOT EXISTS `Customer` (
  `CustomerId` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Address` varchar(75) COLLATE latin1_general_ci NOT NULL,
  `City` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `State` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `ZIP` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `Phone` varchar(14) COLLATE latin1_general_ci NOT NULL,
  `Email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`CustomerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`CustomerId`, `Name`, `Address`, `City`, `State`, `ZIP`, `Phone`, `Email`) VALUES
('A3YUI87PO9', 'Sandeep Mitra', '901 Margaret Street', 'Fairport', 'NY', '14450', '585-820-9860', 'smitra@brockport.edu'),
('ZPX72JOP8', 'K B Lakshmanan', '270 Willowbrooke Trail', 'Brockport', 'NY', '14420', '585-395-2176', 'klakshma@brockport.edu'),
('ZWX89IOP7', 'T M Rao', '255 WillowbrookeTrail', 'Brockport', 'NY', '14450', '585-395-5176', 'trao@brockport.edu');

-- --------------------------------------------------------

--
-- Table structure for table `CustomerPurchase`
--

DROP TABLE IF EXISTS `CustomerPurchase`;
CREATE TABLE IF NOT EXISTS `CustomerPurchase` (
  `CustomerPurchaseId` int(10) NOT NULL AUTO_INCREMENT,
  `CustomerId` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `ItemId` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `StoreId` int(5) NOT NULL,
  `QuantityPurchased` int(5) NOT NULL,
  `DateTimeOfPurchase` int(11) NOT NULL,
  PRIMARY KEY (`CustomerPurchaseId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Inventory`
--

DROP TABLE IF EXISTS `Inventory`;
CREATE TABLE IF NOT EXISTS `Inventory` (
  `InventoryId` int(5) NOT NULL AUTO_INCREMENT,
  `StoreId` int(5) NOT NULL,
  `ItemId` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `QuantityInStock` int(5) NOT NULL,
  PRIMARY KEY (`InventoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `InventoryItem`
--

DROP TABLE IF EXISTS `InventoryItem`;
CREATE TABLE IF NOT EXISTS `InventoryItem` (
  `ItemId` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Description` varchar(75) COLLATE latin1_general_ci NOT NULL,
  `Size` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `Division` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `Department` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `Category` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `ItemCost` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `ItemRetail` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `ImageFileName` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `VendorId` int(5) NOT NULL,
  PRIMARY KEY (`ItemId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `InventoryItem`
--

INSERT INTO `InventoryItem` (`ItemId`, `Description`, `Size`, `Division`, `Department`, `Category`, `ItemCost`, `ItemRetail`, `ImageFileName`, `VendorId`) VALUES
('1200003', 'MENTOS MINT PEGGABLE 1.32OZ 6PK', '8OZ', 'FOOD CONVENIENCE', 'CANDY', 'CANDY & FOOD ITEMS', '1.6', '2.2', '', 16),
('1200040', 'HOSTESS ORANGE CUPCAKES 3.38OZ', '3.38OZ', 'FOOD CONVENIENCE', 'BREAD', 'CANDY & FOOD ITEMS', '0.5', '0.73', '', 6),
('1200041', 'HOSTESS DONUT GEMS CHOCOLATE 3OZ', '3OZ', 'FOOD CONVENIENCE', 'BREAD', 'CANDY & FOOD ITEMS', '0.5', '0.73', '', 6),
('1200042', 'HOSTESS DONUT GEMS CRUNCH 3OZ', '3OZ', 'FOOD CONVENIENCE', 'BREAD', 'CANDY & FOOD ITEMS', '0.5', '0.73', '', 6),
('1200043', 'HOSTESS GEM DONUTS POWDERED 3OZ', '3OZ', 'FOOD CONVENIENCE', 'BREAD', 'CANDY & FOOD ITEMS', '0.5', '0.73', '', 6),
('1200044', 'HOSTESS HO HO 3OZ', '3OZ', 'FOOD CONVENIENCE', 'BREAD', 'CANDY & FOOD ITEMS', '0.5', '0.73', '', 6),
('1200045', 'HOSTESS CHERRY PIE 4.5OZ', '4.5OZ', 'FOOD CONVENIENCE', 'BREAD', 'CANDY & FOOD ITEMS', '0.5', '0.73', '', 6),
('1200046', 'HOSTESS APPLE PIE 4.5OZ', '4.5OZ', 'FOOD CONVENIENCE', 'BREAD', 'CANDY & FOOD ITEMS', '0.5', '0.73', '', 6),
('1200048', 'HOSTESS TWINKIES VANILLA 2.7OZ', '2.7OZ', 'FOOD CONVENIENCE', 'BREAD', 'CANDY & FOOD ITEMS', '0.5', '0.73', '', 6),
('1200051', 'HOSTESS CUPCAKE CHOCOLATE 3.17OZ', '3.17OZ', 'FOOD CONVENIENCE', 'BREAD', 'CANDY & FOOD ITEMS', '0.5', '0.73', '', 6),
('1200128', 'DO NOT USE BD FG SOFT PPRMINT PUFFS 4OZ', '4OZ', 'FOOD CONVENIENCE', 'CANDY', 'CANDY & FOOD ITEMS', '0.34', '0.73', '', 12),
('1200135', 'KEEBLER RAINBOW CHIP COOKIES 14.5OZ', '14.5OZ', 'FOOD CONVENIENCE', 'COOKIES/CRACKERS', 'CANDY & FOOD ITEMS', '1.64', '2.01', '', 21),
('1200136', 'SCOOBY GRAHAM CINNAMON CRACKERS 11OZ', '11OZ', 'FOOD CONVENIENCE', 'COOKIES/CRACKERS', 'CANDY & FOOD ITEMS', '1.59', '2.09', '', 21),
('1200137', 'FG PINWHEEL MALLOW FUDGE COOKIE 9OZ', '9OZ', 'FOOD CONVENIENCE', 'COOKIES/CRACKERS', 'CANDY & FOOD ITEMS', '0.94', '1.28', '', 22),
('1200140', 'LANCE CPTN WAFER JALAPENO CHSE 1OZ 6PK', '6OZ', 'FOOD CONVENIENCE', 'COOKIES/CRACKERS', 'CANDY & FOOD ITEMS', '0.45', '0.73', '', 23),
('1200142', 'FG SHORTBREAD COOKIE LEMON 8.5OZ', '8.5OZ', 'FOOD CONVENIENCE', 'COOKIES/CRACKERS', 'CANDY & FOOD ITEMS', '0.75', '1.28', '', 22),
('1200145', 'FG WHITE SHTBRD COKIE FUDGE STRIP 11.5OZ', '11.5OZ', 'FOOD CONVENIENCE', 'COOKIES/CRACKERS', 'CANDY & FOOD ITEMS', '0.81', '1.28', '', 22),
('1200154', 'SNICKERS BITES 8OZ', '8OZ', 'FOOD CONVENIENCE', 'CANDY', 'CANDY & FOOD ITEMS', '1.54', '2.2', '', 15),
('1200157', 'FLIPZ PRETZEL WHITE 5OZ', '5OZ', 'FOOD CONVENIENCE', 'CANDY', 'CANDY & FOOD ITEMS', '0.93', '1.46', '', 17),
('1200158', 'MENTOS MINI MINTS THEATER BOX 2.82OZ', '2.82OZ', 'FOOD CONVENIENCE', 'CANDY', 'CANDY & FOOD ITEMS', '0.46', '0.73', '', 16),
('1200186', 'RICOLINO MORITAS 1.76OZ', '1.76OZ', 'FOOD CONVENIENCE', 'CANDY', 'CANDY & FOOD ITEMS', '0.38', '0.59', '', 19),
('1200188', 'LANCE VAN O LUNCH COOKIES 1.10OZ 5PK', '5.5OZ', 'FOOD CONVENIENCE', 'COOKIES/CRACKERS', 'CANDY & FOOD ITEMS', '0.42', '0.73', '', 23),
('1200189', 'LANCE LEM O LUNCH COOKIES 1.1OZ 5PK', '5.5OZ', 'FOOD CONVENIENCE', 'COOKIES/CRACKERS', 'CANDY & FOOD ITEMS', '0.42', '0.73', '', 23),
('1200190', 'LANCE NEKOT COOKIES PNUT BTR 1.16OZ 5PK', '5.8OZ', 'FOOD CONVENIENCE', 'COOKIES/CRACKERS', 'CANDY & FOOD ITEMS', '0.42', '0.73', '', 23),
('1200196', 'KEEBLER GRASSHOPPER 10OZ', '10OZ', 'FOOD CONVENIENCE', 'COOKIES/CRACKERS', 'CANDY & FOOD ITEMS', '1.64', '2.01', '', 21),
('1200199', 'NABISCO OREO MEGA STUF 13.2OZ', '13.2OZ', 'FOOD CONVENIENCE', 'COOKIES/CRACKERS', 'CANDY & FOOD ITEMS', '2.18', '2.56', '', 24),
('1200200', 'NABISCO OREO HDS OR TLS DBL STF 15.25OZ', '15.25OZ', 'FOOD CONVENIENCE', 'COOKIES/CRACKERS', 'CANDY & FOOD ITEMS', '2.67', '2.75', '', 24),
('1200226', 'CHEEZ IT DUO CHEDDAR PARMESEAN 13.7OZ', '13.7OZ', 'FOOD CONVENIENCE', 'COOKIES/CRACKERS', 'CANDY & FOOD ITEMS', '1.99', '2.56', '', 21),
('1200227', 'NBSCO COOKIES BELVITA BLUEBERRY 8.8OZ', '8.8OZ', 'FOOD CONVENIENCE', 'COOKIES/CRACKERS', 'CANDY & FOOD ITEMS', '1.75', '2.2', '', 24),
('1200233', 'NABISCO RITZ REDUCED FAT 13.72 OZ', '13.72OZ', 'FOOD CONVENIENCE', 'COOKIES/CRACKERS', 'CANDY & FOOD ITEMS', '1.86', '2.2', '', 24),
('1202071', 'FG 100 PCT APPLE JUICE 64 FL OZ', '64FO', 'FOOD CONVENIENCE', 'READY TO DRINK BEV', 'CANDY & FOOD ITEMS', '0.97', '1.65', '032251120718_fg apple juice.jpg\n', 28),
('1202093', 'FOLGERS FR VAN CAPPUCCINO 16OZ', '16OZ', 'FOOD CONVENIENCE', 'WAREHOUSE BEVERAGES', 'CANDY & FOOD ITEMS', '2.12', '3.11', '025500068480_folgers.jpg', 27),
('1202248', 'HOT TAMALES THEATER BOX 5 OZ', '5OZ', 'FOOD CONVENIENCE', 'CANDY', 'CANDY & FOOD ITEMS', '0.45', '0.65', '', 11),
('1202252', 'ALBERTS FISH KABOB 2.5 OZ', '2.5OZ', 'FOOD CONVENIENCE', 'CANDY', 'CANDY & FOOD ITEMS', '0.37', '0.75', '', 14),
('1205557', 'HR POPSICLE WITH FROSTING .2469OZ', '0.2469OZ', 'FOOD CONVENIENCE', 'CANDY', 'CANDY & FOOD ITEMS', '0.3', '0.73', '', 10),
('1205558', 'HR POWDER FILLED CANDY 67G 2.3634OZ', '2.3634OZ', 'FOOD CONVENIENCE', 'CANDY', 'CANDY & FOOD ITEMS', '0.32', '0.73', '', 13),
('1205559', 'HR FOOT OF GUMBALLS 9.87 OZ', '9.87OZ', 'FOOD CONVENIENCE', 'CANDY', 'CANDY & FOOD ITEMS', '0.79', '1.46', '', 13),
('1205578', 'FG ASSORTED TOFFEES 40Z 18PC', '72OZ', 'FOOD CONVENIENCE', 'CANDY', 'CANDY & FOOD ITEMS', '0.47', '0.73', '', 18),
('1205585', 'DO NOT USE-MI  SPEARMINT LEAVES 10 0Z', '10OZ', 'FOOD CONVENIENCE', 'CANDY', 'CANDY & FOOD ITEMS', '0.45', '0.73', '', 20),
('1206026', 'BODY PARTS GUMMY CANDY 7.9 OZ', '7.9OZ', 'FOOD CONVENIENCE', 'CANDY', 'CANDY & FOOD ITEMS', '0.66', '0.85', '', 13),
('1209154', 'MRS FRESHLEYS MINI DONT W PWDRD SGR 10OZ', '10OZ', 'FOOD CONVENIENCE', 'BREAD', 'CANDY & FOOD ITEMS', '0.88', '1.28', '', 7),
('1209201', 'MRS FRESHLEYS MINI DONUTS CHOC CAKE 10OZ', '10OZ', 'FOOD CONVENIENCE', 'BREAD', 'CANDY & FOOD ITEMS', '0.88', '1.28', '', 7),
('1219048', 'POUND CAKE VANILLA 8.82 OZ', '8.82OZ', 'FOOD CONVENIENCE', 'BREAD', 'CANDY & FOOD ITEMS', '0.42', '0.73', '', 8),
('1220013', 'MRS FRESHLEY SWISS ROLL 1 OZ 8 PK', '8OZ', 'FOOD CONVENIENCE', 'BREAD', 'CANDY & FOOD ITEMS', '0.56', '0.84', '', 7),
('1220161', 'DO NOT USE MI BC FNDIDDLSYLLWCPCKS15.2OZ', '15.2OZ', 'FOOD CONVENIENCE', 'BREAD', 'CANDY & FOOD ITEMS', '1.57', '2.01', '', 9),
('2600004', 'BAREFOOT CABERNET SAUVIGNON RED 1.5L', '50.721FO', 'FOOD CONVENIENCE', 'BEER', 'BEVERAGE ALCOHOL', '6.59', '8.78', '', 3),
('2600007', 'BAREFOOT PINOT GRIGIO WHITE WINE 1.5L', '50.721FO', 'FOOD CONVENIENCE', 'BEER', 'BEVERAGE ALCOHOL', '6.59', '8.78', '', 3),
('2600008', 'ECCO DOMANI PINOT GRIGIO WHT WINE 750ML', '750ML', 'FOOD CONVENIENCE', 'BEER', 'BEVERAGE ALCOHOL', '6.04', '8.05', '', 3),
('2600010', 'DAILYS CCKTLS FRZN BAHAMA MAMA 10FL OZ', '10FO', 'FOOD CONVENIENCE', 'BEER', 'BEVERAGE ALCOHOL', '1.1', '1.46', '', 4),
('2600018', 'DAILYS CKTAIL FRZN PINA COLADA 10FLOZ', '10FO', 'FOOD CONVENIENCE', 'BEER', 'BEVERAGE ALCOHOL', '1.1', '1.46', '', 4),
('2602002', 'BLUE MOON REG BOTTLE 12OZ 6PK', '72FO', 'FOOD CONVENIENCE', 'BEER', 'BEVERAGE ALCOHOL', '4.39', '4.59', '', 5),
('2602003', 'STEEL RESERVE CAN 16OZ 4PK', '64FO', 'FOOD CONVENIENCE', 'BEER', 'BEVERAGE ALCOHOL', '2', '2.2', '', 5),
('2602078', 'BAREFOOT CABERNET 750ML', '25.3605FO', 'FOOD CONVENIENCE', 'BEER', 'BEVERAGE ALCOHOL', '4.07', '4.76', '', 1),
('2602080', 'BAREFOOT MERLOT 750ML', '25.3605FO', 'FOOD CONVENIENCE', 'BEER', 'BEVERAGE ALCOHOL', '4.07', '4.76', '', 1),
('2602083', 'BAREFOOT RED MOSCATO 750ML', '25.3605FO', 'FOOD CONVENIENCE', 'BEER', 'BEVERAGE ALCOHOL', '4.07', '4.76', '', 1),
('2602087', 'LIBERTY CREEK CABERNET SAUVIGNON 1.5L', '50.721FO', 'FOOD CONVENIENCE', 'BEER', 'BEVERAGE ALCOHOL', '4.21', '5.12', '', 1),
('2602088', 'GALLO FV SWEET CHARDONNAY 750ML', '25.3605FO', 'FOOD CONVENIENCE', 'BEER', 'BEVERAGE ALCOHOL', '3.29', '4.03', '', 2),
('2602098', 'GALLO  CHARDONNAY 1.5LT', '50.721FO', 'FOOD CONVENIENCE', 'BEER', 'BEVERAGE ALCOHOL', '4.68', '6.11', '', 1),
('2602103', 'GALLO RED MOSCATO 1.5LT', '50.721FO', 'FOOD CONVENIENCE', 'BEER', 'BEVERAGE ALCOHOL', '4.68', '6.22', '', 1),
('2602108', 'TISDALE STILL WINE MERLOT 750ML', '25.3605FO', 'FOOD CONVENIENCE', 'BEER', 'BEVERAGE ALCOHOL', '2.52', '3.29', '', 1),
('902175', 'ED HARDY REFILL LIGHTER', '1EA', 'GENERAL MERCHANDISE', 'ELECTRONICS', 'HEALTH AIDS', '0.51', '0.73', '', 25),
('903000', 'SLIDE CIGARETTE LIGHTER L3', 'NULL', 'GENERAL MERCHANDISE', 'ELECTRONICS', 'HEALTH AIDS', '0.33', '0.73', '', 26);

-- --------------------------------------------------------

--
-- Table structure for table `InventoryItemCategory`
--

DROP TABLE IF EXISTS `InventoryItemCategory`;
CREATE TABLE IF NOT EXISTS `InventoryItemCategory` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `UPC` text COLLATE latin1_general_ci NOT NULL,
  `ItemId` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Order`
--

DROP TABLE IF EXISTS `Order`;
CREATE TABLE IF NOT EXISTS `Order` (
  `OrderId` int(5) NOT NULL AUTO_INCREMENT,
  `VendorId` int(5) NOT NULL,
  `StoreId` int(5) NOT NULL,
  `DateTimeOfOrder` int(11) NOT NULL,
  `Status` enum('Pending','Delivered','Canceled','') COLLATE latin1_general_ci NOT NULL DEFAULT 'Pending',
  `DateTimeOfFulfillment` int(11) NOT NULL,
  PRIMARY KEY (`OrderId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `OrderDetail`
--

DROP TABLE IF EXISTS `OrderDetail`;
CREATE TABLE IF NOT EXISTS `OrderDetail` (
  `OrderDetailId` int(5) NOT NULL AUTO_INCREMENT,
  `OrderId` int(5) NOT NULL,
  `ItemId` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `QuantityOrdered` int(5) NOT NULL,
  PRIMARY KEY (`OrderDetailId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `RetailStore`
--

DROP TABLE IF EXISTS `RetailStore`;
CREATE TABLE IF NOT EXISTS `RetailStore` (
  `StoreId` int(5) NOT NULL AUTO_INCREMENT,
  `StoreCode` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `StoreName` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Address` varchar(75) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `City` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `State` varchar(3) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ZIP` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Phone` varchar(14) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ManagerName` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`StoreId`),
  UNIQUE KEY `StoreName` (`StoreCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `RetailStore`
--

INSERT INTO `RetailStore` (`StoreId`, `StoreCode`, `StoreName`, `Address`, `City`, `State`, `ZIP`, `Phone`, `ManagerName`) VALUES
(1, 'ABC1', 'Long Pond Road Greece', '101 Long Pond Road', 'Rochester', 'NY', '14623', '585-227-3765', 'Pratap Gupta'),
(2, 'XYZ2', 'Route 31 Fairport', '3780 Pittsford-Palmyra Road', 'Fairport', 'NY', '14450', '585-223-5478', 'Kevin Humphrey');

-- --------------------------------------------------------

--
-- Table structure for table `ReturnToVendor`
--

DROP TABLE IF EXISTS `ReturnToVendor`;
CREATE TABLE IF NOT EXISTS `ReturnToVendor` (
  `ReturnToVendorId` int(5) NOT NULL AUTO_INCREMENT,
  `VendorId` int(5) NOT NULL,
  `StoreId` int(5) NOT NULL,
  `DateTimeOfReturn` int(11) NOT NULL,
  PRIMARY KEY (`ReturnToVendorId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ReturnToVendorDetail`
--

DROP TABLE IF EXISTS `ReturnToVendorDetail`;
CREATE TABLE IF NOT EXISTS `ReturnToVendorDetail` (
  `ReturnToVendorDetailId` int(5) NOT NULL AUTO_INCREMENT,
  `ReturnToVendorId` int(5) NOT NULL,
  `ItemId` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `QuantityReturned` int(5) NOT NULL,
  PRIMARY KEY (`ReturnToVendorDetailId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Vendor`
--

DROP TABLE IF EXISTS `Vendor`;
CREATE TABLE IF NOT EXISTS `Vendor` (
  `VendorId` int(5) NOT NULL AUTO_INCREMENT,
  `VendorCode` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `VendorName` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Address` varchar(75) COLLATE latin1_general_ci NOT NULL,
  `City` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `State` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `ZIP` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `Phone` varchar(14) COLLATE latin1_general_ci NOT NULL,
  `ContactPersonName` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`VendorId`),
  UNIQUE KEY `Name` (`VendorCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `Vendor`
--

INSERT INTO `Vendor` (`VendorId`, `VendorCode`, `VendorName`, `Address`, `City`, `State`, `ZIP`, `Phone`, `ContactPersonName`, `Password`) VALUES
(1, '28236', 'FDS-MERCHANDISE', '101 Main Street', 'Brockport', 'NY', '14420', '585-637-0001', 'Jonathan Agins', 'Ratatouille1'),
(2, '106767', 'STEFANELLI DISTRIBUTING (DSD)', '102 Main Street', 'Fairport', 'NY', '14450', '585-223-0001', 'Andrew Allen', 'LandBeforeTime2'),
(3, '109001', 'GLAZER''S INC (TX-WINE) DSD', '103 Main Street', 'Pittsford', 'NY', '14534', '585-323-0001', 'Cory Beer-Cunningham', 'MightyMorphin7'),
(4, '90200', 'AMERICAN BEVERAGE CORP (VERONA P)', '103 Main Street', 'Penfield', 'NY', '14526', '585-377-0001', 'Stephanie Cruz', 'LaDolceVita9'),
(5, '94727', 'PEPIN DISTRIBUTION CO', '104 Main Street', 'Victor', 'NY', '14564', '585-886-0001', 'Jason Finch', 'IrmaLaDouce8'),
(6, '109648', 'HOSTESS BRANDS LLC', '107 Main Street', 'Webster', 'NY', '14580', '585-292-0001', 'Evan Fleisher', 'Amarcord11'),
(7, '35501', 'FLOWERS FOODS SPECIALTY GROUP LLC', '110 Main Street', 'Spencerport', 'NY', '14559', '585-396-0001', 'Joseph Jackson', 'GhareBaire72'),
(8, '762', 'FUTURE SALES & LIQUIDATIONS (D3)', '108 Main Street', 'Brockport', 'NY', '14420', '585-637-1100', 'Ryan Kinsella', 'LaVacheQuiRit8'),
(9, '32982', 'GENERAL MILLS INC', '120 Main Street', 'Fairport', 'NY', '14450', '585-223-7789', 'Gabriel LePage', 'Potemkin778'),
(10, '106085', 'FOURSTAR GROUP(XIAMEN-HK BK)(LC)', '112 Park Avenue', 'New York', 'NY', '10017', '212-457-0001', 'Kevin Murphy', 'Eight9AndAHalf05'),
(11, '1049', 'JUST BORN INC', '115 Main Street', 'Fairport', 'NY', '14450', '585-223-8765', 'Randy Pawlikowski', 'RomaCittaAperta9'),
(12, '91735', 'PIEDMONT CANDY CO (SEASONAL)', '200 Main Street', 'Brockport', 'NY', '14420', '585-637-1122', 'Cody Romanos', 'LaVitaEBella12'),
(13, '100369', 'FOURSTAR GRP(D12-YANTIAN-HK BK)', '130 High Street', 'Rochester', 'NY', '14620', '585-556-0002', 'Jonathan Allen', 'LaReineMargot17'),
(14, '51', 'R L ALBERT & SON INC', '17775 Water Street', 'Binghamton', 'NY', '13905', '607-729-2230', 'Andrew Agins', 'TriDesWillens35'),
(15, '1222', 'MARS CHOCOLATE NA LLC', '1894 Houston Street', 'New York', 'NY', '10054', '212-775-0989', 'Cory Cruz', 'DesGlaubens33'),
(16, '2020', 'PERFETTI VAN MELLE USA INC', '6426 Montgomery Street', 'Rhinebeck', 'NY', '12572', '845-876-4001', 'Stephanie Beer-Cunningham', 'FestDerVolker38'),
(17, '77189', 'DEMET''S CANDY COMPANY', '1605 Route 9', 'Wappingers Falls', 'NY', '12590', '845-297-4112', 'Jason Fleisher', 'AlexNevsky38'),
(18, '103441', 'RAGOLD CONFECTIONS', '1 Ring Road', 'Garden City', 'NY', '11005', '516-307-8009', 'Evan Finch', 'OctoberTen1917'),
(19, '92196', 'SARA LEE BAKERY GROUP INC (WEST)', '227 Baldwin Street', 'Johnson City', 'NY', '13790', '607-729-1876', 'Joseph Kinsella', 'ChocolatGabon8'),
(20, '82882', 'SUNRISE CONFECTIONS', '822 Murray Hill Road', 'Vestal', 'NY', '13850', '607-798-4569', 'Ryan Jackson', 'Charulata1879'),
(21, '1072', 'KELLOGG SALES COMPANY', '7350 Round Pond Rd', 'Syracuse', 'NY', '13212', '315-452-0310', 'Gabriel Murphy', 'OperaJawa89'),
(22, '982', 'INTERBAKE FOODS INC SIOUX CITY D', '1 Devils Food Dr', 'North Sioux City', 'SD', '57049', '605-232-4900', 'Kevin LePage', 'Rashomon778'),
(23, '83362', 'LANCE INC (PP-GA)', '130 Thruway Park Dr', 'West Henrietta', 'NY', '14586 ', '585-321-1420', 'Randy Romanos', 'Seven8Samurai99'),
(24, '108564', 'MONDELEZ GLOBAL LLC (CAT 361)', '201 Main Street', 'Brockport', 'NY', '14420', '585-637-2221', 'Cody Pawlikowski', 'Pedro8Matador'),
(25, '99067', 'FLASH SALES INC', '201 High Street', 'Fairport', 'NY', '14450', '585-223-9089', 'Jonathan Romanos', 'Pedro8Mala9Educ10'),
(26, '63180', 'GIBSON ENTERPRISES INC', '72 Chaseview Road', 'Fairport', 'NY', '14450', '585-223-7654', 'Andrew Pawlikowski', 'RedLantern99'),
(27, '95464', 'J M SMUCKER (COFFEE PREPAID)', '172 High Street Extn', 'Fairport', 'NY', '14450', '585-421-8765', 'Cory Murphy', 'Hakuna54Matata'),
(28, '46416', 'CLEMENT PAPPAS & CO INC (P-MOUNT)', '1690 Route 9', 'Wappingers Falls', 'NY', '12590', '845-297-4019', 'Brian Humphrey', 'Lumumba98Congo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
