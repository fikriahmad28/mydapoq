-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2016 at 11:17 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_photo` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category_name`, `category_photo`) VALUES
(1, 'Blender & Mixer', 'cat-bm.png'),
(2, 'Cookware', 'cat-cookware.png'),
(3, 'Microwave & Oven', 'cat-mo.png'),
(4, 'Cooktops', 'cat-cooktops.png'),
(5, 'Sewing Machines', 'cat-sewingm.png');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`) VALUES
(1, 'Suriah Samsuddin', 'ssu@gmail.com', 'Taman Anggerik'),
(2, 'Haman Jaya Sdn Bhd', 'haman@co.com', 'Sungei Peteni'),
(3, 'Wak Doyok', 'begok@pomadewak.com', 'Kuala Lumpur'),
(4, 'Shake Uolss', 'shakeshake@goyang.org', 'Lunas Kulim'),
(5, 'Adidas', 'adidas@itu.my', 'BM');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` double NOT NULL,
  `product_photo` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_description`, `product_price`, `product_photo`, `category`, `quantity`) VALUES
(1, 'CW1', 'T Electric Japanese Takoyaki Pan', '1 Year Local Manufacturer Warranty<br>650 - 750W<br>18-hole for cooking<br>Non-stick coating plate<br>', 100, 'p-cw-takoyakipan.png', '2', 7),
(2, 'CW2', '''M'' Bread Maker (2.0L)', '2 Years Local Manufacturer Warranty<br>\r\nCapacity 2.0L<br>\r\n10 minuts power off protection <br>\r\n60 minut keep warm function<br>\r\nL E D display<br>\r\nNon stick rectangle bread pan & kneading blade<br>\r\n12 digital progam menus<br>\r\nAdjustable crust control<br>\r\nLarge viewing window for monitoring cooking progress<br>\r\n13 hour programmabledelay function<br>', 228.8, 'p-cw-breadmaker.png', '2', 3),
(3, 'CW3', '''T'' Cupcake Maker Blue', '1 Year Local Manufacturer Warranty<br>\r\n 700W<br>\r\n7-Cupcakes<br>\r\n1.5” Cupcake Base<br>\r\nDimensions: 27.2cm (L) x 21.6cm (W) x 12.3cm (H)<br>\r\nNon-stick Coating Plate and cool-touch housing<br>\r\nDual Pilot Light<br>\r\nSafety Lock Clip<br>', 81.99, 'p-cw-cupcakemaker.png', '2', 3),
(4, 'CW4', '''J'' Automatic Soymilk Maker Machine', '1 Month Local Supplier Warranty<br>\r\nProduct is not eligible for voucher<br>\r\nEasy to remove<br>\r\nTake apart and clean<br>\r\nStainless Steel, Portable<br>\r\nHeat preservation function<br>\r\nBase heating, double layer cup<br>', 93.2, 'p-cw-soymilkmaker.png', '2', 6),
(5, 'MO1', '''M'' Electric Oven 20L', '1 Year Local Supplier Warranty<br>\r\n20L / 1380W<br>\r\nPerfect for grilling, baking and toasting<br>\r\nStainless Steel Heating Element<br>\r\n100-250° Temperature Selector<br>\r\n60 Minutes Switch Off Timer<br>', 99, 'p-mo-morgan.png', '3', 3),
(6, 'MO2', '''F'' Big Electric Oven 60L', '1 Year Local Manufacturer Warranty<br>\r\nW 68.6cm L x D 42.3cm x H 37.4cm<br>\r\n2000 Watts<br>\r\nRotisserie<br>\r\nBack Fan<br>\r\nCapacity: 60L<br>\r\nOne Baking Tray<br>\r\nOne Wire Shelve<br>\r\n', 450, 'p-mo-firenzzi.png', '3', 3),
(7, 'MO3', '''D'' Multi Functional Microware Oven', '1 Year Local Manufacturer Warranty<br>\r\nCapacity: 24L with Air Fryer<br>\r\nSteam Cleaning<br>\r\nAuto Cook Programs<br>\r\nZero Standby Function<br>\r\nDurable Stainless Steel Cavity<br>\r\nCooking Modes : Warm, Defrost, Air Fryer, Convection, Grill, Combination<br>', 863.1, 'p-mo-daewo.png', '3', 5),
(8, 'MO4', '''S'' Microwave Oven', '1 Year Local Manufacturer Warranty<br>\r\n25L Capacity<br>\r\n900W Microwave and 1000W Grill<br>\r\n8 Power Levels<br>\r\n99 Mins Digital Timer<br>\r\nSpeed & Weight Defrost<br>', 257, 'p-mo-sanyo.png', '3', 8),
(9, 'BM1', '''A S'' Multi Functional Blender Food Processor and Mixer', '3 Months Local Supplier Warranty<br>\r\nMultifunction stick hand blender<br>\r\nStylish Design<br>\r\nEasy to handle<br>\r\nEasy cleaning and detachable<br>\r\nStainlesss steel stick and blade<br>', 88, 'p-bm-alphas.png', '1', 2),
(10, 'BM2', '''S'' Super 7 speed Hand Mixer', '2 Months Local Supplier Warranty<br>\r\nDouble Beater<br>\r\nStainless steel bowl<br>\r\n2.5L capacity<br>\r\nEasy to operate<br>\r\nEasy to clean<br>\r\n7 adjustable speeds<br>\r\nDetachable appliances<br>', 39, 'p-bm-sinbo.png', '1', 5),
(11, 'BM3', '''S'' Mixer With Stainless Steel Bowl', '1 Year Local Manufacturer Warranty<br>\r\nProduct is not eligible for voucher<br>\r\n7adjustable speedlevels for mixture texture control<br>', 48, 'p-bm-stand.png', '1', 3),
(12, 'BM4', '''P'' Food Processor With 28 Functions', '2 Years Local Manufacturer Warranty<br>\r\n2 years warranty by ''P'' Malaysia.<br>\r\nPower: 750 W<br>\r\nSpeeds: 2 + pulse<br>\r\nBowl capacity: 2.10 Liter<br>\r\nBowl max working capacity: 1.50 Liter <br>(dry/liquid) 500g (Flour)<br>\r\nBlender jar size: 1.75 Liter<br>\r\nBlender working capacity: 1.0 Liter<br>\r\nGrinder mill capacity: 0.25 Liter<br>', 273, 'p-bm-philips.png', '1', 8),
(13, 'CT1', '''E'' Freestanding Cooker with Electric Oven  ', '1 Year Local Manufacturer Warranty<br>\r\nAutomatic Electric Ignition<br>\r\nOven Capacity: 70L<br>\r\nOriginal Italian SABAF Burners<br>\r\nBurner Ratings: 1 x 3.8kW + 1 x 3.0kW + 1 x 1.75kW + 1 x 1.0kW<br>', 2289, 'p-ct-freestanding.png', '4', 1),
(14, 'CT2', '''P''Tempered Glass Built-in Hob', 'With Mirror Finishing<br>\r\nLow Gas Consumption<br>\r\nPowerful Flame: 4.0Kw<br>\r\nDurable Trivet<br>\r\n2 Burners with Glass Top<br>\r\nAuto Ignition System (Battery Operated)<br>\r\nTempered Glass<br>\r\nInner Dim. (mm) : 630 x 345<br>', 264, 'p-ct-temperedglass.png', '4', 6),
(15, 'CT3', '''E'' Portable Induction Cooker (Black)  ', '2 Years Local Manufacturer Warranty<br>\r\nEasy-to-clean glass surface<br>\r\n8 power levels<br>\r\nTouch control with 2 pre-set programmes<br>\r\n180 min timer<br>\r\nPot detection sensor<br>\r\nAuto cut-off and child lock<br>\r\nExtra long 2m cable<br>', 198, 'p-ct-portable.png', '4', 4),
(16, 'CT4', '''Z'' Burner Stainless Steel Gas Stove', '1 Year Local Manufacturer Warranty<br>\r\n1 Burner<br>\r\nTwister Burner<br>\r\n4.5kW Flame Power<br>\r\nStainless Steel Body<br>', 133, 'p-ct-stainlesssteel.png', '4', 2),
(17, 'SM1', 'Expert Sewing Machine 505C PRO Blue  ', '1 Month Local Supplier Warranty<br>\r\nProduct is not eligible for voucher<br>\r\n12 different sewing options<br>\r\nWork light<br>\r\nCompact & lightweight<br>\r\nWarranty: One to One Exchange(Period of 1 month for manfacture defects only)<br>', 148.4, 'p-sm-expert.png', '5', 3),
(18, 'SM2', '''J'' Portable Sewing Machine ', '1 Year Local Supplier Warranty<br>\r\nIt comes with eleven essential stitches<br>\r\nA built-in buttonhole stitch<br>\r\nA handy side thread cutter<br>\r\nA convertible free arm<br>', 1049, 'p-sm-portable.png', '5', 2),
(19, 'SM3', 'Sewing Kit', 'Thread Threader Needle Tape Measure Scissor Thimble<br>\r\nQuantity:1pc<br>\r\nColor: mix - color<br>\r\nMaterial: metal & plsatic<br>\r\nDimensions: 25 x 20 x 2cm / 9.7 x 7.8 x 0.78inch (L x W)<br>', 27, 'p-sm-kit.png', '5', 7),
(20, 'SM4', '''S'' Professional Portable Coverlock Machine', '1 Year Local Supplier Warranty<br>', 1749, 'p-sm-pro.png', '5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL,
  `id_customers` int(11) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `product_price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `id_customers`, `product_code`, `product_price`, `quantity`, `status`) VALUES
(1, 1, 'C2', 228.8, 1, 'Proceed'),
(2, 1, 'C1', 100, 1, 'Proceed'),
(3, 2, 'C2', 228.8, 2, 'Proceed'),
(4, 2, 'C1', 100, 2, 'Proceed'),
(5, 2, 'BM1', 88, 2, 'Proceed'),
(6, 2, 'MO4', 257, 2, 'Proceed'),
(7, 3, 'C2', 228.8, 2, 'Pending'),
(8, 3, 'C1', 100, 2, 'Pending'),
(9, 3, 'BM1', 88, 2, 'Pending'),
(10, 3, 'MO4', 257, 2, 'Pending'),
(11, 3, 'C2', 228.8, 2, 'Pending'),
(12, 3, 'C1', 100, 2, 'Pending'),
(13, 3, 'BM1', 88, 2, 'Pending'),
(14, 3, 'MO4', 257, 2, 'Pending'),
(15, 3, 'BM4', 273, 2, 'Pending'),
(16, 3, 'MO1', 99, 1, 'Pending'),
(17, 3, 'MO3', 863.1, 1, 'Pending'),
(18, 3, 'C2', 228.8, 1, 'Pending'),
(19, 3, 'BM4', 273, 2, 'Pending'),
(20, 3, 'MO1', 99, 1, 'Pending'),
(21, 3, 'MO3', 863.1, 1, 'Pending'),
(22, 3, 'C2', 228.8, 1, 'Pending'),
(23, 4, 'BM4', 273, 2, 'Pending'),
(24, 4, 'MO1', 99, 1, 'Pending'),
(25, 4, 'MO3', 863.1, 1, 'Pending'),
(26, 4, 'C2', 228.8, 1, 'Pending'),
(27, 5, 'BM4', 273, 2, 'Pending'),
(28, 5, 'MO1', 99, 1, 'Pending'),
(29, 5, 'MO3', 863.1, 1, 'Pending'),
(30, 5, 'C2', 228.8, 1, 'Pending'),
(31, 5, 'C1', 100, 3, 'Pending'),
(32, 6, 'CW2', 228.8, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `pass`, `level`) VALUES
(1, 'Admin', 'admin', 'admin', 1),
(2, 'User', 'user', 'user', 0),
(3, 'Asd', 'asd', 'asd', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
