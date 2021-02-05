-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 01:59 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `admin_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_img`) VALUES
(12, 'Abeer Otoom', 'Admin@admin.com', 'Abeer1234', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(3) NOT NULL,
  `cat_name` varchar(20) NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `cat_img`) VALUES
(10, 'Clothes', '  ZARA,GUCCI,LV                                                      ', '4.jpg'),
(11, 'Makup', 'Huda beauty ,Mac ,Loreal                                                                                ', '2.jpg'),
(12, 'Skin Care', '  NIVEA,Garnier                                                                                                                                       ', '3.jpg'),
(13, 'Watches', '  Swatch                                                      ', '1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(3) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `address`, `phone`) VALUES
(6, 'Abeer Otoom', 'abeerotoom@gmail.com', 'A12345678', 'jordan - amman', '0791234567'),
(7, 'Abeer k Otoom', 'abeer2otoom@gmail.com', 'A1234567', 'jordan - amman', '0791234567'),
(8, 'maysam otoom1', 'maysamotoom1@gmail.com', 'Maysam12345', 'jordan -jaresh-suf', '0791234569');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pro_id` int(3) NOT NULL,
  `fdate` date NOT NULL DEFAULT current_timestamp(),
  `feedback_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `pro_id`, `fdate`, `feedback_text`) VALUES
(22, 'abeer', 'abeer22otoom@gmail.com', 25, '2021-02-03', 'sooo cute'),
(23, 'Abeer', 'user@gmail.com', 25, '2021-02-03', 'woooow');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(3) NOT NULL,
  `total` int(3) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `cust_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `total`, `date`, `cust_id`) VALUES
(36, 36, '2021-02-03', 6),
(40, 299, '2021-02-04', 7),
(41, 109, '2021-02-04', 7),
(42, 12, '2021-02-04', 8),
(43, 78, '2021-02-04', 8),
(44, 20, '2021-02-04', 7),
(45, 50, '2021-02-04', 6);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(3) NOT NULL,
  `qty_size` varchar(20) NOT NULL,
  `order_id` int(3) NOT NULL,
  `pro_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `qty_size`, `order_id`, `pro_id`) VALUES
(57, '1', 36, 37),
(65, '2 / M', 40, 18),
(66, '4', 40, 45),
(67, '1', 40, 33),
(68, '2', 40, 39),
(69, '1', 41, 50),
(70, '1', 42, 42),
(71, '2 / M', 43, 17),
(72, '1', 44, 35),
(73, '2 / S', 45, 19);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(3) NOT NULL,
  `pro_name` varchar(20) NOT NULL,
  `pro_desc` text NOT NULL,
  `pro_price` int(3) NOT NULL,
  `pro_image` text NOT NULL,
  `cat_id` int(3) NOT NULL,
  `vendor_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_desc`, `pro_price`, `pro_image`, `cat_id`, `vendor_id`) VALUES
(17, 'Contrast Hoodie', 'HOODIE WITH A HIGH NECK AND ADJUSTABLE DRAWSTRING HOOD. CUFFED LONG SLEEVES. ', 39, 'zara1.PNG', 10, 24),
(18, 'Formal Jacket ', 'CROPPED BLAZER WITH A LAPEL COLLAR AND LONG SLEEVES. FRONT PATCH POCKETS WITH BUTTONS.', 99, 'v2.PNG', 10, 24),
(19, 'Jacket', 'LONG SLEEVE KNIT CARDIGAN WITH A ROUND NECKLINE, LONG SLEEVES.', 25, 'zara3.PNG', 10, 24),
(20, 'Purl-Kint sweater', 'SWEATER WITH A ROUND NECK AND CUFFED LONG BALLOON SLEEVES.', 35, 'v4.PNG', 10, 24),
(21, 'Jeans', 'HIGH-WAIST JEANS WITH A WIDE-LEG DESIGN, FADED EFFECT, FIVE POCKETS, RIPPED DETAILS AT THE', 39, 'v6.PNG', 10, 24),
(22, 'SWEATER', 'LOOSE-FITTING SWEATER WITH A ROUND NECK AND LONG SLEEVES. CABLE-KNIT DETAIL IN THE SAME', 40, 'v7.PNG', 10, 24),
(23, 'Soft dress', 'WHITE SOFT DRESS AND SHORT WITH 100S', 100, 'G1.jpg', 10, 26),
(24, 'Velvet dress', 'BLACK SOFT DRESS ', 150, 'g2.jpeg', 10, 26),
(25, 'Belted shoulder', 'BLACK SOFT DRESS ', 250, 'g4.jpeg', 10, 26),
(26, 'leather jacket', 'LONG BLACK LEATHER JACKET', 260, 'l2.jpg', 10, 25),
(27, 'Uniforms', 'FORMAL JACKET AND PANTS', 400, 'l3.jpg', 10, 25),
(28, 'Jacket', 'LONG JACKET WITH A GOLDEN BELT', 255, 'l4.jpg', 10, 25),
(29, 'Eyeshadow', 'ALL COLOR : MAT AND GLITTERING', 30, 'h1.jpg', 11, 27),
(30, 'Foundation', 'SUITABLE FOR ALL SKIN TYPES', 25, 'h2.jpg', 11, 27),
(31, 'Lipsticks', 'ALL COLORS', 20, 'h3.jpg', 11, 27),
(32, 'Matt Lip', 'ALL COLORS', 35, 'h4.jpg', 11, 27),
(33, 'Soft Matte', 'ALL COLORS ', 33, 'm1.png', 11, 28),
(34, 'Firlet', 'ALL COLORS ', 15, 'm2.png', 11, 28),
(35, 'Star', 'All SKIN', 20, 'm3.png', 11, 28),
(36, 'Mineralize', 'ALL COLORS', 16, 'm4.png', 11, 28),
(37, 'Lash', 'New', 36, 'lo1.jpg', 11, 29),
(38, 'Pro-Matte', 'Matte-over', 30, 'lo2.jpg', 11, 29),
(39, 'Concealr', 'cover all', 20, 'lo3.jpg', 11, 29),
(40, 'Foundation', ' LONGWEAR', 25, 'lo4.jpg', 11, 29),
(42, 'Micell', 'REMOVE MU', 12, 'nv2.jpg', 12, 30),
(43, 'Lotion', 'IN-SHOWER', 5, 'nv3.jpg', 12, 30),
(44, 'Nivea sun', 'everyday use', 15, 'nv4.jpg', 12, 30),
(45, 'Micellar', 'SKIN-ACTIVE', 7, 'gr1.jpg_480Wx480H', 12, 31),
(46, 'Eye make-up', 'FRESH FORMULA', 10, 'gr2.jpg', 12, 31),
(47, 'Micellar', 'CLEANING', 5, 'gr3.jpg', 12, 31),
(48, 'SkinActive', 'CLEAN , REFRESHING', 6, 'gr4.jpg', 12, 31),
(49, 'Swatch Glass', ' SWATCH GLASS OF BUBBLES GOLDEN ST.STEEL GOLDEN DIAL FOR WOMEN', 116, 'sw1.PNG', 13, 32),
(50, 'Swatch Goldy', 'SWATCH GOLDY HUG GOLDEN ST.STEEL FOR WOMEN', 109, 'sw2.PNG', 13, 32),
(51, 'Watche', 'SWATCH DHABISCUS COLORED RUBBER FOR WOMEN', 54, 'sw3.PNG', 13, 32),
(52, ' Swatch Goldy', ' SWATCH GOLDY SHOW BLACK LEATHERFOR WOMEN', 99, 'sw4.PNG', 13, 32);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `logo` text NOT NULL,
  `website` text NOT NULL,
  `accept` varchar(20) NOT NULL DEFAULT 'No',
  `vdesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `name`, `email`, `password`, `logo`, `website`, `accept`, `vdesc`) VALUES
(24, 'ZARA', 'zara@gmail.com', 'Zara2020', 'cz.jpg', 'https://www.zara.com/jo/', 'yes', 'one of the largest international fashion companies.The customer is at the heart of our unique business model, which includes design,production,distribution.                                               '),
(25, 'Louis Vuitton', 'LouisVuitton@gmail.com', 'Louis2020', 'cl.jpg', 'https://me.louisvuitton.com ', 'yes', 'is the world\'s most valuable luxury brand and is a division of LVMH. Its products include leather goods, handbags, trunks, shoes, watches, jewelry and accessories.'),
(26, 'GUCCI', 'GUCCI@gmail.com', 'Gucci2020', 'cg.jpg', 'https://www.gucci.com/', 'yes', 'Gucci is an Italian fashion label founded in 1921 by Guccio Gucci, making it one of the oldest Italian fashion brands in operation today. Like many historic fashion houses.                                                        '),
(27, 'Huda beauty', 'huda@gmail.com', 'Huda2020', 'hh.png', 'https://hudabeauty.com/', 'yes', ' is a cosmetics line launched in 2013 by Iraqi-American businesswoman and makeup artist, Huda Kattan.    \r\n                                              '),
(28, 'MAC', 'MAC@gmail.com', 'Macc2020', 'mn.jpeg', 'https://www.maccosmetics.com/', 'yes', ' is a proud COMMUNITY of professional makeup artists working together to bring our vision to life.              '),
(29, 'Loreal', 'loreal@gmail.com', 'Loreal2020', 'l.jpg', 'https://www.lorealparisusa.com/about-loreal-paris', 'yes', '  is a total beauty care company that combines the latest in technology with the highest in quality for the ultimate in luxury beauty at mass.                                                                               '),
(30, 'Nivea', 'nivea@gmail.com', 'Nivea2020', 'nv.jpg', 'https://www.nivea.co.uk/', 'yes', '   As one of the leading companies in the field of skin care – our products always cater for the needs of our consumers, who place a great deal of faith in us. \r\n                                                    '),
(31, 'Garnier', 'garnier@gmail.com', 'Garnier2020', 'gr.jpg', 'https://www.garnier.co.uk/', 'yes', ' (French pronunciation: ​ɡarniay) is a mass market cosmetics brand of French cosmetics company LOreal. It produces hair care and skin care products.                                                                                   '),
(32, 'Swatch', 'Swatch@gmail.com', 'Swatch2020', 'sw.jpg', 'https://www.swatch.com/', 'yes', 'is a brand name for a line of wrist watches from the Swatch Group, a Swiss conglomerate with vertical control of the production of Swiss watches and related products                                                        ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_ibfk_1` (`pro_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `product_ibfk_2` (`vendor_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
