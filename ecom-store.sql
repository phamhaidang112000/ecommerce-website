-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 04:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(10) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slider_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_name`, `slider_image`) VALUES
(1, 'Slider number 1', 'slide-8.jpg'),
(2, 'Slider number 2', 'slide-2.jpg'),
(3, 'Slider number 3', 'slide-3.jpg'),
(5, 'Slider number 4', 'slide-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admins`
--

CREATE TABLE `tbl_admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admins`
--

INSERT INTO `tbl_admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES
(1, 'pham hai dang', 'hd@gmail.com', '123456', 'present_image.jpg', 'viet nam', 'asdasdasd', 'asdasdasdasd', 'asdasdasdasdasd'),
(2, 'tran trung hai', 'haitran@gmail.com', '123456', 'Nozomi_Sasaki-.jpg', 'usa', 'adkas;dkas;dkas;dk', '123123123', 'streamer'),
(3, 'le bron', 'bron@gmail.com', '123456', 'iko.png', 'usa', 'sdasdasdasdasdasd', '123123', 'nba player');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_boxes_section`
--

CREATE TABLE `tbl_boxes_section` (
  `box_id` int(10) NOT NULL,
  `box_title` text NOT NULL,
  `box_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_boxes_section`
--

INSERT INTO `tbl_boxes_section` (`box_id`, `box_title`, `box_desc`) VALUES
(1, 'best price', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(2, 'best quality', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(3, 'best feel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `pro_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `p_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(10) NOT NULL,
  `category_title` text NOT NULL,
  `category_desc` text NOT NULL,
  `category_top` text NOT NULL,
  `category_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_title`, `category_desc`, `category_top`, `category_image`) VALUES
(1, 'Men', 'A T-shirt, or tee, is a style of fabric shirt named after the T shape of its body and sleeves. Traditionally, it has short sleeves and a round neckline, known as a crew neck, which lacks a collar.', 'yes', 'men.jpg'),
(2, 'Women', 'A T-shirt, or tee, is a style of fabric shirt named after the T shape of its body and sleeves. Traditionally, it has short sleeves and a round neckline, known as a crew neck, which lacks a collar.', 'yes', 'women.jpg'),
(3, 'Kids', 'A T-shirt, or tee, is a style of fabric shirt named after the T shape of its body and sleeves. Traditionally, it has short sleeves and a round neckline, known as a crew neck, which lacks a collar.', 'no', 'kids.jpg'),
(4, 'Other', 'A T-shirt, or tee, is a style of fabric shirt named after the T shape of its body and sleeves. Traditionally, it has short sleeves and a round neckline, known as a crew neck, which lacks a collar.', 'no', 'others.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupons`
--

CREATE TABLE `tbl_coupons` (
  `coupon_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int(100) NOT NULL,
  `coupon_used` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_coupons`
--

INSERT INTO `tbl_coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(1, 3, 'title_check1', '20', '123', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(1, 'pham hai dang', 'haidang@gmail.com', '1234', 'viet nam', 'thai binh', '0326325773', 'to 7 , tien phong , tp thai binh', 'grey-man-1.jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_order`
--

CREATE TABLE `tbl_customer_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer_order`
--

INSERT INTO `tbl_customer_order` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(6, 1, 23, 1143010660, 1, 'Medium', '2022-06-25', 'pending'),
(7, 1, 22, 699482613, 1, 'Medium', '2022-06-25', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacturers`
--

CREATE TABLE `tbl_manufacturers` (
  `manufacturer_id` int(10) NOT NULL,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text NOT NULL,
  `manufacturer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_manufacturers`
--

INSERT INTO `tbl_manufacturers` (`manufacturer_id`, `manufacturer_title`, `manufacturer_top`, `manufacturer_image`) VALUES
(1, 'Zara', 'yes', 'man_1.jpg'),
(2, 'Gucci', 'no', 'man_2.jpg'),
(3, 'Versace', 'no', 'man_3.jpg'),
(4, 'Louis Vuitton', 'yes', 'man_4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pending_order`
--

CREATE TABLE `tbl_pending_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pending_order`
--

INSERT INTO `tbl_pending_order` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(6, 1, 1143010660, 16, 1, 'Medium', 'pending'),
(7, 1, 699482613, 15, 1, 'Medium', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(10) NOT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_label` text NOT NULL,
  `product_sale` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `manufacturer_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`, `product_label`, `product_sale`) VALUES
(3, 2, 4, 1, '2022-06-24 10:08:32', 'coats 121', 'boys-Puffer-Coat-With-Detachable-Hood-1.jpg', 'boys-Puffer-Coat-With-Detachable-Hood-2.jpg', 'boys-Puffer-Coat-With-Detachable-Hood-3.jpg', 134, '<p>Good joobb</p>', 'Coats', 'sale', 100),
(4, 3, 5, 2, '2022-06-24 01:35:16', 'polo', 'g-polos-tshirt-1.jpg', 'g-polos-tshirt-2.jpg', 'g-polos-tshirt-2.jpg', 120, '<p>Gooasdasasdasd</p>', 't-shirt', 'sale', 11),
(5, 4, 5, 1, '2022-06-24 01:51:01', 't-shirt 226', 'grey-man-1.jpg', 'grey-man-2.jpg', 'grey-man-3.jpg', 190, '<p>asdasdasdasda</p>', 't-shirt', 'new', 0),
(6, 1, 3, 2, '2022-06-24 01:51:09', 'shoes 112', 'High Heels Women Pantofel Brukat-1.jpg', 'High Heels Women Pantofel Brukat-2.jpg', 'High Heels Women Pantofel Brukat-3.jpg', 129, '<p>afvxcvxcvzvzcz</p>', 'shoes', 'new', 0),
(7, 2, 3, 1, '2022-06-24 01:35:29', 'shoes 116', 'Man-Adidas-Suarez-Slop-On-1.jpg', 'Man-Adidas-Suarez-Slop-On-2.jpg', 'Man-Adidas-Suarez-Slop-On-3.jpg', 134, '<p>asdczxvxbcxvzc</p>', 'shoes', 'sale', 14),
(8, 3, 1, 1, '2022-06-24 01:35:32', 'jacket 223', 'Man-Geox-Winter-jacket-1.jpg', 'Man-Geox-Winter-jacket-2.jpg', 'Man-Geox-Winter-jacket-3.jpg', 139, '<p>hsdkfjhldadsjdlsad</p>', 'jacket', 'sale', 15),
(9, 4, 5, 1, '2022-06-24 01:51:15', 'polo man 23', 'Man-Polo-1.jpg', 'Man-Polo-2.jpg', 'Man-Polo-3.jpg', 129, '<p>dfkjaksjdfhaksfhsdfkjshadfjd</p>', 'polo', 'new', 0),
(10, 1, 1, 2, '2022-06-24 01:51:20', 'jacket 457', 'Red-Winter-jacket-1.jpg', 'Red-Winter-jacket-2.jpg', 'Red-Winter-jacket-3.jpg', 134, '<p>sgsdhasdkjhdsfkjghfdgdfsssssssdfffffffffffffsdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff</p>', 'jacket', 'new', 0),
(11, 2, 2, 2, '2022-06-24 01:35:42', 'ring', 'women-diamond-heart-ring-1.jpg', 'women-diamond-heart-ring-2.jpg', 'women-diamond-heart-ring-3.jpg', 1123, '<p>dasdsdfaslgjlasjfalsdjflsadjfks</p>', 'ring', 'sale', 18),
(12, 3, 5, 1, '2022-06-24 01:35:46', 't-shirt 300', 'Man-Polo-1.jpg', 'Man-Polo-2.jpg', 'Man-Polo-3.jpg', 134, '<p>sasdadksmdasmdasmd</p>', 't-shirt', 'sale', 19),
(13, 4, 5, 1, '2022-06-24 01:51:26', 't-shirt 301', 'grey-man-1.jpg', 'grey-man-2.jpg', 'grey-man-3.jpg', 123, '<p>afdfsdfsdfsdfsdfsdf</p>', 't-shirt', 'new', 0),
(14, 1, 5, 1, '2022-06-24 01:51:30', 't-shirt 302', 'Man-Geox-Winter-jacket-1.jpg', 'Man-Geox-Winter-jacket-2.jpg', 'Man-Geox-Winter-jacket-3.jpg', 134, '<p>sdfsdkfjsdlkfjsdlkf</p>', 't-shirt', 'new', 0),
(15, 2, 5, 1, '2022-06-24 01:35:57', 't-shirt 304', 'boys-Puffer-Coat-With-Detachable-Hood-1.jpg', 'boys-Puffer-Coat-With-Detachable-Hood-2.jpg', 'boys-Puffer-Coat-With-Detachable-Hood-3.jpg', 234, '<p>asdasdasdasd</p>', 't-shirt', 'sale', 22),
(16, 3, 4, 2, '2022-06-24 01:36:00', 'women coat 1717', 'Mobile-Power-Jacket.jpg', 'Mobile-Power-Jacket-2.jpg', 'Mobile-Power-Jacket-3.jpg', 134, '<p>ddhdhdhghgfhfghf</p>', 'Coats', 'sale', 23),
(18, 2, 3, 2, '2022-06-24 08:29:11', 'check123', 'black-swan-blouse.jpg', 'swan-blouse-2.jpg', 'swan-blouse-3.jpg', 156, '<p>qwqeqwewqe</p>', 't-shirt', 'new', 122);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_categories`
--

CREATE TABLE `tbl_product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product_categories`
--

INSERT INTO `tbl_product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`, `p_cat_top`, `p_cat_image`) VALUES
(1, ' Jacket ', 'A jacket is a garment for the upper body, usually extending below the hips. A jacket typically has sleeves, and fastens in the front or slightly on the side.', 'yes', 'jacket.jpg'),
(2, 'Accessories', 'Accessories are items of equipment that are not usually essential, but which can be used with or added to something else in order to make it more efficient, useful, or decorative.', 'no', 'acc.jpg'),
(3, 'Shoes', 'A shoe is an item of footwear intended to protect and comfort the human foot. Shoes are also used as an item of decoration and fashion', 'no', 'shoes.jpg'),
(4, 'Coats', 'A coat typically is an outer garment for the upper body as worn by either gender for warmth or fashion.', 'yes', 'coat.jpg'),
(5, 'T-shirt', 'A T-shirt, or tee, is a style of fabric shirt named after the T shape of its body and sleeves. Traditionally, it has short sleeves and a round neckline, known as a crew neck, which lacks a collar.', 'no', 'tshirt.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_boxes_section`
--
ALTER TABLE `tbl_boxes_section`
  ADD PRIMARY KEY (`box_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_coupons`
--
ALTER TABLE `tbl_coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_customer_order`
--
ALTER TABLE `tbl_customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_manufacturers`
--
ALTER TABLE `tbl_manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_pending_order`
--
ALTER TABLE `tbl_pending_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_product_categories`
--
ALTER TABLE `tbl_product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_boxes_section`
--
ALTER TABLE `tbl_boxes_section`
  MODIFY `box_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_coupons`
--
ALTER TABLE `tbl_coupons`
  MODIFY `coupon_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer_order`
--
ALTER TABLE `tbl_customer_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_manufacturers`
--
ALTER TABLE `tbl_manufacturers`
  MODIFY `manufacturer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pending_order`
--
ALTER TABLE `tbl_pending_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_product_categories`
--
ALTER TABLE `tbl_product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
