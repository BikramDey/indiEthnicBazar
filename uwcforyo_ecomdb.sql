-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 09:35 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uwcforyo_ecomdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ctid` int(11) NOT NULL,
  `ctname` varchar(200) NOT NULL,
  `ctcreate_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ctid`, `ctname`, `ctcreate_date`) VALUES
(1, 'Shirts', '2023-06-08 16:11:39'),
(2, 'Pants', '2023-06-08 16:15:24'),
(3, 'Coats', '2023-06-08 16:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `cid` int(11) NOT NULL,
  `ctoken` varchar(20) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `cphone` bigint(20) NOT NULL,
  `cemail` varchar(255) NOT NULL,
  `caddress` varchar(1000) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL,
  `cpassword` varchar(30) NOT NULL,
  `ccreate_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`cid`, `ctoken`, `cname`, `cphone`, `cemail`, `caddress`, `state`, `pincode`, `cpassword`, `ccreate_date`) VALUES
(1, 'b84c59fea8', 'Bikram Dey', 8777745732, 'bikramdey458@gmail.com', '48/ollabibitala,makhla', 'West Bengal', 712245, 'bikram987', '2023-06-08 16:05:38'),
(2, 'bec71ea8c1', 'Babu Dey', 9432135820, 'babudey111@gmail.com', '48/ollabibitala,makhla', 'West Bengal', 712245, 'babu987', '2023-06-08 16:32:06'),
(3, 'cb212fb6ed', 'Ram Dey', 8674245543, 'ram453@gmail.com', '48/ollabibitala,makhla', 'West Bengal', 712245, 'ram987', '2023-06-08 17:18:59'),
(4, 'acb8e4a6b9', 'Mou Dey', 7451389865, 'mou121@gmail.com', '48/ollabibitala,makhla', 'West Bengal', 712245, 'mou987', '2023-06-08 17:30:13'),
(5, '0f4187ffa7', 'Anish Dey', 5654655611, 'ansh322@gmail.com', '48/ollabibitala,makhla', 'West Bengal', 712245, 'anish987', '2023-06-08 19:49:01'),
(6, '018676f6d1', 'Anish Dey', 4354553112, 'anish@gmail.com', '48/ollabibitala,makhla', 'West Bengal', 712245, 'anish987', '2023-06-08 20:37:15'),
(7, '61af9cd635', 'Jodu Dey', 9187654430, 'jodu458@gmail.com', '48/ollabibitala,makhla', 'West Bengal', 712245, 'jodu987', '2023-06-08 21:09:29'),
(8, '5829339ca9', 'Danish Dey', 23436734431, 'danish@gmail.com', '48/ollabibitala,makhla', 'West Bengal', 712245, 'danish987', '2023-06-09 00:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `ctoken` varchar(20) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `totalqty` int(11) NOT NULL,
  `totalamt` int(20) NOT NULL,
  `order_date` datetime NOT NULL,
  `pay_method` varchar(11) NOT NULL,
  `upi_id` varchar(100) NOT NULL,
  `upi_transaction_id` varchar(100) NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `oiid` int(11) NOT NULL,
  `pdid` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `size` varchar(5) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(200) NOT NULL,
  `ctoken` varchar(20) NOT NULL,
  `paymod` varchar(11) NOT NULL,
  `order_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `pdid` int(11) NOT NULL,
  `pdname` varchar(255) NOT NULL,
  `pdbrand` varchar(150) NOT NULL,
  `pdstars` int(11) NOT NULL,
  `pdprice` int(11) NOT NULL,
  `pdcategory` varchar(255) NOT NULL,
  `pddetail` varchar(5500) NOT NULL,
  `pdimage1` varchar(255) NOT NULL,
  `pdimage2` varchar(255) NOT NULL,
  `pdimage3` varchar(255) NOT NULL,
  `pdimage4` varchar(255) NOT NULL,
  `pd_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`pdid`, `pdname`, `pdbrand`, `pdstars`, `pdprice`, `pdcategory`, `pddetail`, `pdimage1`, `pdimage2`, `pdimage3`, `pdimage4`, `pd_date`) VALUES
(1, 'Cartoon Astronaut T-Shirts 1', 'adidas', 5, 78, 'Shirts', 'The Gildan Ultra Cotton T-shirt is made form a substantial 6.0 oz. per sq. yd. fabric constructed from 100% cotton, this classic fit preshrunk jersey knit provides unmatched comfort with each wear. Featuring a taped neck and shoulder, and a seamlesss double-needle collar, and available in a range of colors, it offers it all in the ultimate head-turning package.', 'pdid1-image1.jpg', 'pdid1-image2.jpg', 'pdid1-image3.jpg', 'pdid1-image4.jpg', '2023-06-08 17:24:04'),
(2, 'Cartoon Astronaut T-Shirts 2', 'adidas2', 3, 78, 'Shirts', 'The Gildan Ultra Cotton T-shirt is made form a substantial 6.0 oz. per sq. yd. fabric constructed from 100% cotton, this classic fit preshrunk jersey knit provides unmatched comfort with each wear. Featuring a taped neck and shoulder, and a seamlesss double-needle collar, and available in a range of colors, it offers it all in the ultimate head-turning package2.', 'pdid2-image1.jpg', 'pdid2-image2.jpg', 'pdid2-image3.jpg', 'pdid2-image4.jpg', '2023-06-08 20:41:36'),
(3, 'Cartoon Astronaut T-Shirts 3', 'adidas', 4, 78, 'Shirts', 'The Gildan Ultra Cotton T-shirt is made form a substantial 6.0 oz. per sq. yd. fabric constructed from 100% cotton, this classic fit preshrunk jersey knit provides unmatched comfort with each wear. Featuring a taped neck and shoulder, and a seamlesss double-needle collar, and available in a range of colors, it offers it all in the ultimate head-turning package.', 'pdid3-image1.jpg', 'pdid3-image2.jpg', 'pdid3-image3.jpg', 'pdid3-image4.jpg', '2023-06-08 19:49:24'),
(4, 'Cartoon Astronaut T-Shirts 4', 'adidas', 5, 78, 'Shirts', 'The Gildan Ultra Cotton T-shirt is made form a substantial 6.0 oz. per sq. yd. fabric constructed from 100% cotton, this classic fit preshrunk jersey knit provides unmatched comfort with each wear. Featuring a taped neck and shoulder, and a seamlesss double-needle collar, and available in a range of colors, it offers it all in the ultimate head-turning package.', 'pdid4-image1.jpg', 'pdid4-image2.jpg', 'pdid4-image3.jpg', 'pdid4-image4.jpg', '2023-06-08 20:37:40'),
(5, 'Cartoon Astronaut T-Shirts 5', 'adidas', 5, 78, 'Shirts', 'The Gildan Ultra Cotton T-shirt is made form a substantial 6.0 oz. per sq. yd. fabric constructed from 100% cotton, this classic fit preshrunk jersey knit provides unmatched comfort with each wear. Featuring a taped neck and shoulder, and a seamlesss double-needle collar, and available in a range of colors, it offers it all in the ultimate head-turning package.', 'pdid5-image1.jpg', 'pdid5-image2.jpg', 'pdid5-image3.jpg', 'pdid5-image4.jpg', '2023-06-08 21:08:44'),
(6, 'Cartoon Astronaut T-Shirts 6', 'adidas', 5, 78, 'Shirts', 'The Gildan Ultra Cotton T-shirt is made form a substantial 6.0 oz. per sq. yd. fabric constructed from 100% cotton, this classic fit preshrunk jersey knit provides unmatched comfort with each wear. Featuring a taped neck and shoulder, and a seamlesss double-needle collar, and available in a range of colors, it offers it all in the ultimate head-turning package.', 'pdid6-image1.jpg', 'pdid6-image2.jpg', 'pdid6-image3.jpg', 'pdid6-image4.jpg', '2023-06-09 00:42:52'),
(7, 'Cartoon Astronaut T-Shirts 7', 'adidas', 5, 78, 'Shirts', 'The Gildan Ultra Cotton T-shirt is made form a substantial 6.0 oz. per sq. yd. fabric constructed from 100% cotton, this classic fit preshrunk jersey knit provides unmatched comfort with each wear. Featuring a taped neck and shoulder, and a seamlesss double-needle collar, and available in a range of colors, it offers it all in the ultimate head-turning package.', 'pdid7-image1.jpg', 'pdid7-image2.jpg', 'pdid7-image3.jpg', 'pdid7-image4.jpg', '2023-06-09 02:01:10'),
(8, 'Cartoon Astronaut T-Shirts 8', 'adidas', 5, 78, 'Shirts', 'The Gildan Ultra Cotton T-shirt is made form a substantial 6.0 oz. per sq. yd. fabric constructed from 100% cotton, this classic fit preshrunk jersey knit provides unmatched comfort with each wear. Featuring a taped neck and shoulder, and a seamlesss double-needle collar, and available in a range of colors, it offers it all in the ultimate head-turning package.', 'pdid8-image1.jpg', 'pdid8-image2.jpg', 'pdid8-image3.jpg', 'pdid8-image4.jpg', '2023-06-09 02:21:01'),
(9, 'Cartoon Astronaut T-Shirts 9', 'adidas', 5, 78, 'Shirts', 'The Gildan Ultra Cotton T-shirt is made form a substantial 6.0 oz. per sq. yd. fabric constructed from 100% cotton, this classic fit preshrunk jersey knit provides unmatched comfort with each wear. Featuring a taped neck and shoulder, and a seamlesss double-needle collar, and available in a range of colors, it offers it all in the ultimate head-turning package.', 'pdid9-image1.jpg', 'pdid9-image2.jpg', 'pdid9-image3.jpg', 'pdid9-image4.jpg', '2023-06-09 03:03:14'),
(10, 'Cartoon Astronaut T-Shirts 10', 'adidas', 5, 78, 'Shirts', 'The Gildan Ultra Cotton T-shirt is made form a substantial 6.0 oz. per sq. yd. fabric constructed from 100% cotton, this classic fit preshrunk jersey knit provides unmatched comfort with each wear. Featuring a taped neck and shoulder, and a seamlesss double-needle collar, and available in a range of colors, it offers it all in the ultimate head-turning package.', 'pdid10-image1.jpg', 'pdid10-image2.jpg', 'pdid10-image3.jpg', 'pdid10-image4.jpg', '2023-06-09 18:41:04'),
(11, 'Cartoon Astronaut T-Shirts 11', 'adidas', 5, 78, 'Shirts', 'The Gildan Ultra Cotton T-shirt is made form a substantial 6.0 oz. per sq. yd. fabric constructed from 100% cotton, this classic fit preshrunk jersey knit provides unmatched comfort with each wear. Featuring a taped neck and shoulder, and a seamlesss double-needle collar, and available in a range of colors, it offers it all in the ultimate head-turning package.', 'pdid11-image1.jpg', 'pdid11-image2.jpg', 'pdid11-image3.jpg', 'pdid11-image4.jpg', '2023-06-09 20:34:58'),
(12, 'Cartoon Astronaut T-Shirts 12', 'adidas', 5, 78, 'Shirts', 'The Gildan Ultra Cotton T-shirt is made form a substantial 6.0 oz. per sq. yd. fabric constructed from 100% cotton, this classic fit preshrunk jersey knit provides unmatched comfort with each wear. Featuring a taped neck and shoulder, and a seamlesss double-needle collar, and available in a range of colors, it offers it all in the ultimate head-turning package.', 'pdid12-image1.jpg', 'pdid12-image2.jpg', 'pdid12-image3.jpg', 'pdid12-image4.jpg', '2023-06-10 01:42:11'),
(13, 'Cartoon Astronaut T-Shirts 13', 'adidas', 5, 78, 'Shirts', 'The Gildan Ultra Cotton T-shirt is made form a substantial 6.0 oz. per sq. yd. fabric constructed from 100% cotton, this classic fit preshrunk jersey knit provides unmatched comfort with each wear. Featuring a taped neck and shoulder, and a seamlesss double-needle collar, and available in a range of colors, it offers it all in the ultimate head-turning package.', 'pdid13-image1.jpg', 'pdid13-image2.jpg', 'pdid13-image3.jpg', 'pdid13-image4.jpg', '2023-06-10 01:43:58'),
(14, 'Cartoon Astronaut T-Shirts 14', 'adidas', 5, 78, 'Pants', 'The Gildan Ultra Cotton T-shirt is made form a substantial 6.0 oz. per sq. yd. fabric constructed from 100% cotton, this classic fit preshrunk jersey knit provides unmatched comfort with each wear. Featuring a taped neck and shoulder, and a seamlesss double-needle collar, and available in a range of colors, it offers it all in the ultimate head-turning package.', 'pdid14-image1.jpg', 'pdid14-image2.jpg', 'pdid14-image3.jpg', 'pdid14-image4.jpg', NULL),
(15, 'Cartoon Astronaut T-Shirts', 'adidas', 5, 78, 'Shirts', 'The Gildan Ultra Cotton T-shirt is made form a substantial 6.0 oz. per sq. yd. fabric constructed from 100% cotton, this classic fit preshrunk jersey knit provides unmatched comfort with each wear. Featuring a taped neck and shoulder, and a seamlesss double-needle collar, and available in a range of colors, it offers it all in the ultimate head-turning package.', 'pdid15-image1.jpg', 'pdid15-image2.jpg', 'pdid15-image3.jpg', 'pdid15-image4.jpg', NULL),
(16, 'Cartoon Astronaut T-Shirts 16', 'adidas', 5, 78, 'Shirts', 'The Gildan Ultra Cotton T-shirt is made form a substantial 6.0 oz. per sq. yd. fabric constructed from 100% cotton, this classic fit preshrunk jersey knit provides unmatched comfort with each wear. Featuring a taped neck and shoulder, and a seamlesss double-needle collar, and available in a range of colors, it offers it all in the ultimate head-turning package.', 'pdid16-image1.jpg', 'pdid16-image2.jpg', 'pdid16-image3.jpg', 'pdid16-image4.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_product_size`
--

CREATE TABLE `shop_product_size` (
  `pdsizeid` int(11) NOT NULL,
  `pdid` int(11) NOT NULL,
  `sizevalue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ctid`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `cphone` (`cphone`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`oiid`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`pdid`);

--
-- Indexes for table `shop_product_size`
--
ALTER TABLE `shop_product_size`
  ADD PRIMARY KEY (`pdsizeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ctid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `oiid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `shop_product_size`
--
ALTER TABLE `shop_product_size`
  MODIFY `pdsizeid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
