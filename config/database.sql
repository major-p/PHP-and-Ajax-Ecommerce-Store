-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 08:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ng`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', '631c1de754e98780d71d60027d9ed27b', '20-08-2020 05:07:27 AM'),
(2, 'admin', '21832155F46FBD31598C4BCD8782670C', ''),
(3, 'credenceadmin', '45BB529F8316193D0595F13992408D64', '');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `creationDate`, `updationDate`) VALUES
(5, 'Tecno', '2021-09-23 12:17:42', ''),
(6, 'Infinix', '2021-09-23 12:35:38', ''),
(7, 'Itel', '2021-09-24 10:49:58', ''),
(8, 'Apple', '2021-09-24 11:07:34', ''),
(9, 'Samsung', '2021-09-24 11:24:05', ''),
(10, 'Nokia', '2021-09-24 11:27:04', ''),
(11, 'Xiaomi', '2021-09-24 11:33:56', ''),
(12, 'Blackberry', '2021-09-24 11:44:28', ''),
(13, 'Gionee', '2021-10-01 12:22:55', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_image` text NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amount`) VALUES
(35, 37, '::1', -1, 'Infinix Hot 9', 'products-6.png', 1, 11500, 11500),
(36, 42, '::1', -1, 'Hikvision 8ch Dvr 2MP DS-7108HGHI-F1/N', 'products-1.png', 1, 36000, 36000),
(39, 41, '127.0.0.1', 5, 'Itel A33', 'products-2.png', 1, 36000, 36000),
(40, 36, '127.0.0.1', 5, 'Tecno Spark 4 Air', 'products-1.png', 1, 10000, 10000),
(42, 39, '127.0.0.1', 5, 'Hikvision DS-7108HGHI-F1 Turbo HD DVR-Hikvision', 'products-5.png', 1, 27000, 27000),
(48, 37, '127.0.0.1', -1, 'Infinix Hot 9', 'products-6.png', 1, 11500, 11500),
(49, 66, '127.0.0.1', -1, 'Rock Earphone Case For Airpods Pro Case Wireless Bluethooth', 'products-12.jpg', 1, 19053, 19053),
(50, 68, '127.0.0.1', -1, 'TPLink WIRELESS N ROUTER WR-840N', 'products-13.jpg', 1, 27000, 27000),
(51, 65, '127.0.0.1', -1, 'Man Wireless Bluethooth Earphone BT-54 Neckband Earphones', 'products-11.jpg', 1, 12800, 12800),
(52, 42, '127.0.0.1', -1, 'Tecno Spark 4', 'products-1.png', 1, 36000, 36000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(226) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `creationDate`, `updationDate`) VALUES
(7, 'Phones', '2021-11-02 20:12:20', NULL),
(8, 'Tablets', '2021-11-02 20:12:20', NULL),
(9, 'Accessories', '2021-11-02 20:12:20', NULL),
(10, 'Wireless Devices', '2021-11-02 20:12:20', NULL),
(11, 'Routers', '2021-11-02 20:12:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` int(100) NOT NULL,
  `p_qty` int(100) NOT NULL,
  `p_status` varchar(100) NOT NULL,
  `trx_id` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `address`, `contactno`, `email`, `password`, `creationDate`, `updationDate`) VALUES
(4, 'Emete Precious9', '10,Teacher Street', 9, 'precious@ajloungesapele.com', '899faf6921546b487c5dd46c6f37fa6a', '2021-09-22 18:29:59', NULL),
(5, 'Freda', '10 Teacher Street ', 9, 'freda@ajloungesapele.com', '3fb86c59a57017974ca778f7fb082af2', '2021-09-22 18:32:54', NULL),
(7, 'Harriet', '10, Teacher Street', 9, 'harriet@ajloungesapele.com', '9f375193680b2b270edefebe6ca271d7', '2021-09-22 18:38:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employeeslog`
--

CREATE TABLE `employeeslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeslog`
--

INSERT INTO `employeeslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(29, 4, 'precious@ajloungesapele.com', 0x3130352e3131322e3130382e32313000, '2021-09-22 18:41:08', NULL, 1),
(30, 5, 'Freda@ajloungesapele.com', 0x3139372e3231302e37392e3134380000, '2021-09-22 18:56:18', NULL, 1),
(31, 4, 'precious@ajloungesapele.com', 0x3130352e3131322e3132332e32353200, '2021-10-08 10:28:25', NULL, 1),
(32, NULL, 'ajrecords', 0x3130352e3131322e3130372e36000000, '2021-10-11 16:30:38', NULL, 0),
(33, NULL, 'ajrecords', 0x3130352e3131322e3130372e36000000, '2021-10-11 16:37:03', NULL, 0),
(34, NULL, 'ajrecords', 0x3130352e3131322e3130372e36000000, '2021-10-11 16:38:02', NULL, 0),
(35, NULL, 'precious@ajloungesapele.com', 0x3130352e3131322e3130372e36000000, '2021-10-11 16:39:58', NULL, 0),
(36, 4, 'precious@ajloungesapele.com', 0x3130352e3131322e3130372e36000000, '2021-10-11 16:40:59', NULL, 1),
(37, 4, 'precious@ajloungesapele.com', 0x3130352e3131322e3130372e36000000, '2021-10-11 16:43:17', NULL, 1),
(38, 4, 'precious@ajloungesapele.com', 0x3130352e3131322e3130372e36000000, '2021-10-11 16:50:58', NULL, 1),
(39, 4, 'precious@ajloungesapele.com', 0x3130352e3131322e3130372e36000000, '2021-10-11 16:57:13', NULL, 1),
(40, 4, 'precious@ajloungesapele.com', 0x3130352e3131322e3130372e36000000, '2021-10-11 17:00:04', NULL, 1),
(41, NULL, '', 0x3130352e3131322e3130372e36000000, '2021-10-11 17:01:22', NULL, 0),
(42, 4, 'precious@ajloungesapele.com', 0x3130352e3131322e3130372e36000000, '2021-10-11 17:01:36', NULL, 1),
(43, 5, 'freda@ajloungesapele.com', 0x3139372e3231302e3232362e32303500, '2021-10-13 11:51:21', NULL, 1),
(44, 5, 'freda@ajloungesapele.com', 0x3139372e3231302e35352e3736000000, '2021-10-13 11:53:02', NULL, 1),
(45, NULL, 'fredaajloungesapeke.com', 0x3139372e3231302e3232372e32343500, '2021-10-13 12:16:11', NULL, 0),
(46, 5, 'freda@ajloungesapele.com', 0x3139372e3231302e3232372e32343500, '2021-10-13 12:18:39', NULL, 1),
(47, 4, 'precious@ajloungesapele.com', 0x3130352e3131322e3130342e31373100, '2021-10-14 09:12:00', NULL, 1),
(48, 4, 'precious@ajloungesapele.com', 0x3130352e3131322e3130342e31373100, '2021-10-14 09:24:01', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_orders`
--

CREATE TABLE `food_orders` (
  `order_id` int(11) NOT NULL,
  `order_product_id` int(11) NOT NULL,
  `code` varchar(11) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_title` varchar(300) NOT NULL,
  `menu_cat_id` int(11) NOT NULL,
  `menu_price` double NOT NULL,
  `menu_desc` text DEFAULT NULL,
  `menu_image` varchar(225) NOT NULL,
  `menu_tag` varchar(225) DEFAULT NULL,
  `menu_stock` int(11) DEFAULT NULL,
  `menu_availability` varchar(225) DEFAULT NULL,
  `menu_keywords` varchar(225) DEFAULT NULL,
  `counter` int(11) DEFAULT NULL,
  `date_view` date DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_title`, `menu_cat_id`, `menu_price`, `menu_desc`, `menu_image`, `menu_tag`, `menu_stock`, `menu_availability`, `menu_keywords`, `counter`, `date_view`, `creationDate`, `updationDate`) VALUES
(1, 'Burger and Chips', 1, 2400, NULL, 'gallery-1.jpg', NULL, NULL, 'In Stock', 'burger', 10, '2022-06-09', '2022-06-09 15:01:54', NULL),
(2, 'Chicken and Chips', 1, 1400, NULL, 'gallery-2.jpg', NULL, NULL, 'In Stock', 'chicken', NULL, NULL, '2022-06-09 15:01:54', NULL),
(3, 'Jollof Rice and Chicken', 1, 3400, NULL, 'gallery-3.jpg', NULL, NULL, 'In Stock', 'jollof,rice', 1, '2022-06-13', '2022-06-09 15:01:54', NULL),
(4, 'Fried Rice and Chicken', 2, 2300, NULL, 'gallery-4.jpg', NULL, NULL, 'Out of Stock', 'fried rice', 1, '2022-06-24', '2022-06-09 15:01:54', NULL),
(5, 'Coconut Rice and Stew', 1, 1900, NULL, 'gallery-5.jpg', NULL, NULL, 'In Stock', NULL, NULL, NULL, '2022-06-09 15:07:02', NULL),
(6, 'Grilled Chicken', 2, 1500, NULL, 'gallery-6.jpg', NULL, NULL, 'In Stock', 'chicken', 87, '2022-06-09', '2022-06-09 15:07:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_categories`
--

CREATE TABLE `menu_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(225) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updationDate` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_categories`
--

INSERT INTO `menu_categories` (`cat_id`, `cat_title`, `creationDate`, `updationDate`) VALUES
(1, 'Desert', '2022-06-09 14:59:28', NULL),
(2, 'Small Chops', '2022-06-09 14:59:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_cat_id` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `product_desc` longtext DEFAULT NULL,
  `product_image` text NOT NULL,
  `product_tag` varchar(225) DEFAULT NULL,
  `product_brand_id` int(100) NOT NULL,
  `stock` int(100) NOT NULL,
  `availability` varchar(225) NOT NULL DEFAULT 'In Stock',
  `product_keywords` text NOT NULL,
  `counter` int(11) DEFAULT NULL,
  `date_view` date DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_cat_id`, `product_price`, `product_desc`, `product_image`, `product_tag`, `product_brand_id`, `stock`, `availability`, `product_keywords`, `counter`, `date_view`, `creationDate`, `updationDate`) VALUES
(36, 'Tecno Spark 4 Air', 7, 10000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'products-1.png', 'HOT', 5, 2, 'Out of Stock', 'tecno', 8, '2023-01-01', '2021-11-02 17:46:43', NULL),
(37, 'Infinix Hot 9', 7, 11500, NULL, 'products-6.png', 'LATEST', 6, 10, 'In Stock', 'infinix', 8, '2023-01-01', '2021-11-02 17:46:43', NULL),
(39, 'Tecno Spark 2', 17, 27000, NULL, 'products-5.png', NULL, 0, 4, 'In Stock', '', NULL, NULL, '2021-11-02 17:46:43', NULL),
(40, 'Infinix Hot 9', 7, 31000, NULL, 'products-3.png', NULL, 0, 3, 'In Stock', '', NULL, NULL, '2021-11-02 17:46:43', NULL),
(41, 'Itel A33', 7, 36000, NULL, 'products-2.png', NULL, 0, 10, 'In Stock', '', NULL, NULL, '2021-11-02 17:46:43', NULL),
(42, 'Tecno Spark 4', 7, 36000, NULL, 'products-1.png', 'NEW', 0, 20, 'In Stock', '', 1, '2022-06-12', '2021-11-02 17:46:43', NULL),
(43, 'Tecno Spark 4', 7, 46000, NULL, 'products-7.png', NULL, 0, 4, 'In Stock', 'tecno', 1, '2022-10-28', '2021-11-02 17:46:43', NULL),
(64, 'Infinix Hot 9', 7, 470000, NULL, 'products-2.png', NULL, 0, 5, 'In Stock', '', 1, '2022-06-07', '2021-11-02 17:46:43', NULL),
(65, 'Man Wireless Bluethooth Earphone BT-54 Neckband Earphones', 10, 12800, 'Style : Neckband\r\nIs wireless : Yes\r\nBrand Name : LEMONMAN\r\nResistance : 32?\r\nModel Number : BT-54 earphones\r\nVolume Control : Yes\r\nSensitivity : 123dB\r\nControl Button : Yes\r\nSupport APP : No\r\nFunction : For Mobile Phone\r\nFunction : Common Headphone\r\nFunction : Sport\r\nFunction : For iPod\r\nWireless Type : Bluetooth\r\nWireless Type : None\r\nLine Length : 0.3m\r\nWaterproof : No\r\nSupport Apt-x : No\r\nSupport Memory Card : No', 'products-11.jpg', 'New', 2, 2, 'In Stock', 'bluetooth', 5, '2023-01-01', '2023-01-01 12:32:11', NULL),
(66, 'Rock Earphone Case For Airpods Pro Case Wireless Bluethooth', 10, 19053, '    Item type:Earphone silicone case\r\n    Size:For airpods pro case\r\n    •Unlike traditional, circular earbuds, the design is defined by the geometry of the ear which makes them more comfortable for more people than any other earbud-style headphones\r\n    •The speakers inside have been engineered to maximize sound output and minimize sound loss, which means you get high-quality audio\r\n    •?Comfortable and Durable? With Designed ergonomically, the Type C Headphone can fit the ear perfectly and wear comfortably even for long periods of time without any pain. Anti-wrap oxygen-free copper wire inside provides the whole earphones flexibility, make you not only easily walk through backpack and clothes while moving outside activities. Come with Storage Case, keep the usb c earphones safe and extremely portable.\r\n    •Ergonomic In-ear Headphone: Ergonomically in-ear design delivers more powerful and clear sound, allow you to have clearer phone calls, enjoy excellent quality music streaming and gaming experience, comes with S/M/L silicone cap.\r\n    •Suitable for MP3, iPod, iPhone, DVD and CD players, as well as portable gaming systems. In-ear headphones allow you to listen to music without interference.', 'products-12.jpg', NULL, 2, 10, 'In Stock', 'bluetooth', 1, '2023-01-02', '2023-01-01 12:32:11', NULL),
(67, 'TPLink TP-Link Archer C7 Ac1750 Wireless Dual Band Gigabit Router', 11, 70000, 'TP-LINK’s Archer C7 comes with the next generation Wi-Fi standard – 802.11ac, 3 times faster than wireless N speeds and delivering a combined wireless data transfer rate of up to 1.75Gbps. With 1300Mbps wireless speeds over the crystal clear 5GHz band and 450Mbps over the 2.4GHz band, the Archer C7 is the superior choice for seamless HD streaming, online gaming and other bandwidth-intensive tasks.', 'products-8.png', NULL, 2, 0, 'In Stock', 'router', NULL, NULL, '2023-01-01 12:37:25', NULL),
(68, 'TPLink WIRELESS N ROUTER WR-840N', 11, 27000, '27000Set up the TL-WR840N in minutes thanks to its intuitive web interface and the powerful Tether app. Tether also lets you manage its network settings from any Android or iOS device, including parental controls and access control.  mTP-Link’s TL-WR840N is a high speed solution that is compatible with IEEE 802.11b/g/n. Based on 802.11n technology, TL-WR840N gives users wireless performance at up to 300Mbps, which can meet your most demanding home networking needs, such as HD streaming, online gaming and large files downloading.eet your most demanding home networking needs, such as HD streaming, online gaming ', 'products-13.jpg', NULL, 2, 4, 'In Stock', 'router', NULL, NULL, '2023-01-01 12:37:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `received_payment`
--

CREATE TABLE `received_payment` (
  `id` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `trx_id` varchar(100) NOT NULL,
  `ref` varchar(250) DEFAULT NULL,
  `status` varchar(225) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `received_payment`
--

INSERT INTO `received_payment` (`id`, `amount`, `trx_id`, `ref`, `status`, `date`) VALUES
(1, 45000, '112345', 'aa345', 'In Progress', '2021-11-07'),
(2, 47500, 'C3C8A6B', NULL, 'Pending', '2021-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `recordlog`
--

CREATE TABLE `recordlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recordlog`
--

INSERT INTO `recordlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(24, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-02-09 15:43:34', NULL, 0),
(25, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-02-09 15:44:07', NULL, 1),
(26, NULL, 'omagbemi omatseye spencer', 0x3a3a3100000000000000000000000000, '2020-02-09 16:51:07', NULL, 0),
(27, NULL, 'spencer@gmail.com', 0x3a3a3100000000000000000000000000, '2020-02-09 16:52:05', NULL, 0),
(28, 8, 'bignamepreciousonstage@gmail.com', 0x3a3a3100000000000000000000000000, '2020-02-09 16:55:57', NULL, 1),
(29, 8, 'bignamepreciousonstage@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-19 20:27:21', NULL, 1),
(30, NULL, 'spencer@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-19 21:31:12', NULL, 0),
(31, 8, 'bignamepreciousonstage@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-19 21:31:37', '20-08-2020 03:01:45 AM', 1),
(32, 8, 'bignamepreciousonstage@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-19 21:34:22', '19-08-2020 11:34:26 PM', 1),
(33, 8, 'bignamepreciousonstage@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-19 21:35:21', NULL, 1),
(34, 8, 'bignamepreciousonstage@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-19 22:39:57', '20-08-2020 04:10:22 AM', 1),
(35, 8, 'bignamepreciousonstage@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-19 22:43:58', NULL, 1),
(36, 8, 'bignamepreciousonstage@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-22 22:13:03', NULL, 1),
(37, NULL, 'precious@gmail.com', 0x3a3a3100000000000000000000000000, '2020-09-30 18:04:52', NULL, 0),
(38, NULL, 'spencer@gmail.com', 0x3a3a3100000000000000000000000000, '2020-09-30 18:05:03', NULL, 0),
(39, 1, 'records', 0x3a3a3100000000000000000000000000, '2021-08-28 21:23:47', NULL, 1),
(40, 1, 'records', 0x3139372e3231302e38342e3235320000, '2021-08-30 06:20:35', NULL, 1),
(41, 1, 'records', 0x3139372e3231302e35352e3335000000, '2021-08-30 07:43:55', NULL, 1),
(42, 1, 'records', 0x3139372e3231302e35352e3335000000, '2021-08-30 08:02:32', NULL, 1),
(43, 2, 'ajrecords', 0x3139372e3231302e3232362e37320000, '2021-08-30 08:27:11', NULL, 1),
(44, 2, 'ajrecords', 0x3139372e3231312e35382e3631000000, '2021-08-30 10:50:17', NULL, 1),
(45, 1, 'records', 0x3139372e3231302e35352e3132350000, '2021-08-30 15:55:34', NULL, 1),
(46, 1, 'records', 0x3139372e3231302e3232372e31333100, '2021-08-30 16:07:01', NULL, 1),
(47, 1, 'admin', 0x3139372e3231302e3232372e31333100, '2021-08-30 16:36:25', '30-08-2021 10:06:37 PM', 1),
(48, 2, 'admin', 0x3139372e3231302e3232372e31333100, '2021-08-30 16:36:51', NULL, 1),
(49, 2, 'admin', 0x3139372e3231312e35382e3631000000, '2021-08-30 17:53:08', NULL, 1),
(50, 1, 'records', 0x3231322e3130322e36332e3132000000, '2021-09-01 06:41:33', NULL, 1),
(51, 1, 'records', 0x3139372e3231302e37392e3130360000, '2021-09-01 11:09:35', NULL, 1),
(52, 2, 'ajrecords', 0x3139372e3231312e35382e3631000000, '2021-09-02 14:19:25', NULL, 1),
(53, 2, 'ajrecords', 0x3130352e3131322e39392e3137320000, '2021-09-05 07:36:26', NULL, 1),
(54, 2, 'admin', 0x3139372e3231302e3232372e32323300, '2021-09-22 15:35:40', NULL, 1),
(55, 2, 'admin', 0x3139372e3231302e37392e3234330000, '2021-09-22 16:54:42', NULL, 1),
(56, 2, 'admin', 0x3139372e3231302e35342e3939000000, '2021-09-22 17:19:14', NULL, 1),
(57, 2, 'admin', 0x3130352e3131322e3130382e32313000, '2021-09-22 18:15:06', NULL, 1),
(58, 2, 'admin', 0x3130352e3131322e39362e3138350000, '2021-09-23 12:12:56', NULL, 1),
(59, 1, '1', 0x3138302e3234312e34352e3130000000, '2021-09-24 04:01:44', NULL, 1),
(60, 1, '1', 0x3138302e3234312e34352e3130000000, '2021-09-24 04:03:54', NULL, 1),
(61, 2, 'admin', 0x3130352e3131322e39362e3138350000, '2021-09-24 09:54:57', NULL, 1),
(62, 2, 'admin', 0x3130352e3131322e3130372e31393600, '2021-10-01 12:05:30', NULL, 1),
(63, 2, 'ajrecords', 0x3130352e3131322e3130372e31393600, '2021-10-01 12:36:57', NULL, 1),
(64, 2, 'ajrecords', 0x3130352e3131322e3130372e31393600, '2021-10-01 15:52:28', '01-10-2021 09:27:58 PM', 1),
(65, 2, 'ajrecords', 0x3130352e3131322e3130372e31393600, '2021-10-01 22:07:34', NULL, 1),
(66, 2, 'admin', 0x3130352e3131322e3132332e32353200, '2021-10-08 10:24:05', NULL, 1),
(67, 2, 'ajrecords', 0x3130352e3131322e3132332e32353200, '2021-10-08 10:24:41', '08-10-2021 03:56:43 PM', 1),
(68, 2, 'ajrecords', 0x3130352e3131322e3130372e36000000, '2021-10-11 16:46:48', NULL, 1),
(69, 2, 'ajrecords', 0x3130352e3131322e3130372e36000000, '2021-10-11 16:53:13', NULL, 1),
(70, 2, 'ajrecords', 0x3130352e3131322e3130342e31373100, '2021-10-14 09:20:20', '14-10-2021 02:52:57 PM', 1),
(71, 1, 'admin', 0x3132372e302e302e3100000000000000, '2021-11-07 16:03:09', '07-11-2021 10:53:38 PM', 1),
(72, 3, 'credenceadmin', 0x3132372e302e302e3100000000000000, '2021-11-07 17:24:07', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'records', '631c1de754e98780d71d60027d9ed27b', '20-08-2020 05:07:27 AM'),
(2, 'ajrecords', '1BFA675162781AD4BCD96D7A6D6A8DE8', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(3, 'Precious', 'Omagbemi', 'precious@gmail.com', 'cd6855fc6139f6686ecd45badec90f8b', '09033944592', '45, Ogorode Lane', 'Gana, Sapele'),
(5, 'Omagbemi', 'Precious', 'bignamepreciousonstage@gmail.com', 'b51f838479c10d04898e8e96c20eccc8', '09033944592', '45, Ogorode Lane', '45, Ogorode Lane');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeeslog`
--
ALTER TABLE `employeeslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_orders`
--
ALTER TABLE `food_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu_categories`
--
ALTER TABLE `menu_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `received_payment`
--
ALTER TABLE `received_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recordlog`
--
ALTER TABLE `recordlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employeeslog`
--
ALTER TABLE `employeeslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `food_orders`
--
ALTER TABLE `food_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_categories`
--
ALTER TABLE `menu_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `received_payment`
--
ALTER TABLE `received_payment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recordlog`
--
ALTER TABLE `recordlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
