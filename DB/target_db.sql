-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2020 at 09:48 AM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-23+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `target_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CATE_Code` int(11) NOT NULL,
  `CATE_Name` varchar(100) NOT NULL,
  `CATE_Desc` text NOT NULL,
  `CATE_Flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CATE_Code`, `CATE_Name`, `CATE_Desc`, `CATE_Flag`) VALUES
(1, 'COMPUTERS', 'PCs,Laptops and electronic devices.', 1),
(2, 'TABLES', 'Tablets and electronic devices.', 1),
(3, 'SMARTPHONES', 'Smartphones and electronic devices.', 1),
(4, 'ACCESSORIES', 'Various electronic devices.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `CLIE_Code` int(11) NOT NULL,
  `CTYPE_Code` int(11) NOT NULL,
  `DOC_Code` int(11) NOT NULL,
  `CLIE_Names` varchar(100) NOT NULL,
  `CLIE_Phone` varchar(9) NOT NULL,
  `CLIE_Address` varchar(256) NOT NULL,
  `CLIE_Doc_Number` varchar(20) NOT NULL,
  `CLIE_Flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`CLIE_Code`, `CTYPE_Code`, `DOC_Code`, `CLIE_Names`, `CLIE_Phone`, `CLIE_Address`, `CLIE_Doc_Number`, `CLIE_Flag`) VALUES
(4, 2, 2, 'Mark Zuckerberg', '999852147', 'Palo Alto 555, CA', '0789456123', 1),
(5, 2, 2, 'Jeff Bezos', '999231654', 'Central Park 455, NY', '0875395174', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_types`
--

CREATE TABLE `client_types` (
  `CTYPE_Code` int(11) NOT NULL,
  `CTYPE_Name` varchar(100) NOT NULL,
  `CTYPE_Desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_types`
--

INSERT INTO `client_types` (`CTYPE_Code`, `CTYPE_Name`, `CTYPE_Desc`) VALUES
(1, 'General Public', ''),
(2, 'Business', '');

-- --------------------------------------------------------

--
-- Table structure for table `doc_types`
--

CREATE TABLE `doc_types` (
  `DOC_Code` int(11) NOT NULL,
  `DOC_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_types`
--

INSERT INTO `doc_types` (`DOC_Code`, `DOC_Name`) VALUES
(1, 'DNI'),
(2, 'RUC');

-- --------------------------------------------------------

--
-- Table structure for table `navigations`
--

CREATE TABLE `navigations` (
  `NAVI_Code` int(11) NOT NULL,
  `NAVI_Name` varchar(100) NOT NULL,
  `NAVI_Link` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `navigations`
--

INSERT INTO `navigations` (`NAVI_Code`, `NAVI_Name`, `NAVI_Link`) VALUES
(1, 'Dashboard', 'dashboard'),
(2, 'Categories', 'maintenance/categories'),
(3, 'Clients', 'maintenance/clients'),
(4, 'Products', 'maintenance/products'),
(5, 'Orders', 'movements/orders'),
(6, 'Orders', 'reports/orders'),
(7, 'Users', 'administration/users'),
(8, 'Permissions', 'administration/permissions');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ORD_Code` int(11) NOT NULL,
  `CLIE_Code` int(11) NOT NULL,
  `USR_Code` int(11) NOT NULL,
  `VCHR_Code` int(11) NOT NULL,
  `ORD_Number` varchar(20) NOT NULL,
  `ORD_Serial` varchar(100) NOT NULL,
  `ORD_Igv` float NOT NULL,
  `ORD_Discount` float NOT NULL,
  `ORD_Total` float NOT NULL,
  `ORD_Flag` tinyint(1) NOT NULL,
  `ORD_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ORD_Code`, `CLIE_Code`, `USR_Code`, `VCHR_Code`, `ORD_Number`, `ORD_Serial`, `ORD_Igv`, `ORD_Discount`, `ORD_Total`, `ORD_Flag`, `ORD_Date`) VALUES
(7, 4, 1, 1, '0000061', '001', 1710, 0, 10953.2, 1, '2020-04-21'),
(10, 5, 1, 1, '0000071', '001', 2127.64, 0, 13628.4, 1, '2020-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `DETA_Code` int(11) NOT NULL,
  `PROD_Code` int(11) NOT NULL,
  `ORD_Code` int(11) NOT NULL,
  `DETA_Qty` int(11) NOT NULL,
  `DETA_Subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`DETA_Code`, `PROD_Code`, `ORD_Code`, `DETA_Qty`, `DETA_Subtotal`) VALUES
(3, 1, 7, 2, 5491),
(4, 2, 7, 3, 3752.25),
(5, 1, 10, 1, 2745.5),
(6, 2, 10, 7, 8755.25);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `PERMI_Code` int(11) NOT NULL,
  `NAVI_Code` int(11) NOT NULL,
  `ROLE_Code` int(11) NOT NULL,
  `PERMI_Read` int(11) NOT NULL,
  `PERMI_Insert` int(11) NOT NULL,
  `PERMI_Update` int(11) NOT NULL,
  `PERMI_Delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`PERMI_Code`, `NAVI_Code`, `ROLE_Code`, `PERMI_Read`, `PERMI_Insert`, `PERMI_Update`, `PERMI_Delete`) VALUES
(2, 2, 1, 1, 1, 1, 1),
(4, 3, 1, 1, 1, 1, 1),
(5, 1, 1, 1, 1, 1, 1),
(6, 4, 1, 1, 1, 1, 1),
(7, 5, 1, 1, 1, 1, 1),
(9, 6, 1, 1, 1, 1, 1),
(10, 7, 1, 1, 1, 1, 1),
(11, 8, 1, 1, 1, 1, 1),
(12, 1, 2, 1, 1, 1, 1),
(13, 2, 2, 1, 1, 1, 0),
(14, 7, 2, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `PROD_Code` int(11) NOT NULL,
  `CATE_Code` int(11) NOT NULL,
  `PROD_Serial` varchar(10) NOT NULL,
  `PROD_Name` varchar(100) NOT NULL,
  `PROD_Desc` text NOT NULL,
  `PROD_Price` float NOT NULL,
  `PROD_Stock` int(11) NOT NULL,
  `PROD_Picture` varchar(512) NOT NULL,
  `PROD_Flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PROD_Code`, `CATE_Code`, `PROD_Serial`, `PROD_Name`, `PROD_Desc`, `PROD_Price`, `PROD_Stock`, `PROD_Picture`, `PROD_Flag`) VALUES
(1, 1, 'C-123', 'iMac Pro', 'Customize your 21.5-inch iMac with Retina 4K display.', 2745.5, 97, 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/imac-21-cto-hero-201903?wid=627&hei=522&fmt=jpeg&qlt=95&.v=1553120926388', 1),
(2, 2, 'T-456', 'iPad Air', 'Try to find a more advanced mobile display. We\'ll wait. The 8-core graphics processor delivers fluid performance for things like 4K video editing, 3D design, and augmented reality.', 1250.75, 490, 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/ipad-pro-12-11-select-202003?wid=445&amp;hei=550&amp;fmt=jpeg&amp;qlt=95&amp;op_usm=0.5,0.5&amp;.v=1583430767182', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ROLE_Code` int(11) NOT NULL,
  `ROLE_Name` varchar(100) NOT NULL,
  `ROLE_Desc` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ROLE_Code`, `ROLE_Name`, `ROLE_Desc`) VALUES
(1, 'SUPERAMIN', 'Total control'),
(2, 'ADMIN', 'Administration of modules'),
(3, 'USER', 'Some modules');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USR_Code` int(11) NOT NULL,
  `ROLE_Code` int(11) NOT NULL,
  `USR_Phone` varchar(9) NOT NULL,
  `USR_Names` varchar(100) NOT NULL,
  `USR_Email` varchar(128) NOT NULL,
  `USR_Username` varchar(100) NOT NULL,
  `USR_Password` varchar(128) NOT NULL,
  `USR_Avatar` varchar(512) NOT NULL,
  `USR_Flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USR_Code`, `ROLE_Code`, `USR_Phone`, `USR_Names`, `USR_Email`, `USR_Username`, `USR_Password`, `USR_Avatar`, `USR_Flag`) VALUES
(1, 1, '999347011', 'Pew Die Pie', 'pewdiepie2@yahoo.com', 'pewdiepie2', 'e38ad214943daad1d64c102faec29de4afe9da3d', 'https://cdn.i-scmp.com/sites/default/files/styles/768x768/public/d8/images/methode/2019/03/20/18ddf00a-4a02-11e9-8e02-95b31fc3f54a_image_hires_025413.JPG?itok=Tb0nPRV7&v=1553021659', 1),
(2, 2, '999321456', 'Ambar Driscoll', 'ambard@google.com', 'ambard', '2aa60a8ff7fcd473d321e0146afd9e26df395147', 'https://d2h1pu99sxkfvn.cloudfront.net/b0/4894721/283224411_twgDSYAHVE/U5.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_types`
--

CREATE TABLE `voucher_types` (
  `VCHR_Code` int(11) NOT NULL,
  `VCHR_Name` varchar(100) NOT NULL,
  `VCHR_Igv` float NOT NULL,
  `VCHR_Qty` int(11) NOT NULL,
  `VCHR_Serial` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher_types`
--

INSERT INTO `voucher_types` (`VCHR_Code`, `VCHR_Name`, `VCHR_Igv`, `VCHR_Qty`, `VCHR_Serial`) VALUES
(1, 'INVOICE', 18.5, 8, '001'),
(2, 'TICKET', 0, 1, '001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CATE_Code`),
  ADD UNIQUE KEY `CATE_Name` (`CATE_Name`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`CLIE_Code`),
  ADD UNIQUE KEY `CLIE_Doc_Number` (`CLIE_Doc_Number`),
  ADD KEY `CTYPE_Code` (`CTYPE_Code`,`DOC_Code`),
  ADD KEY `fk_doc_type_client` (`DOC_Code`);

--
-- Indexes for table `client_types`
--
ALTER TABLE `client_types`
  ADD PRIMARY KEY (`CTYPE_Code`);

--
-- Indexes for table `doc_types`
--
ALTER TABLE `doc_types`
  ADD PRIMARY KEY (`DOC_Code`);

--
-- Indexes for table `navigations`
--
ALTER TABLE `navigations`
  ADD PRIMARY KEY (`NAVI_Code`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORD_Code`),
  ADD KEY `CLIE_Code` (`CLIE_Code`,`VCHR_Code`,`USR_Code`),
  ADD KEY `fk_user_order` (`USR_Code`),
  ADD KEY `VCHR_Code` (`VCHR_Code`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`DETA_Code`),
  ADD KEY `PROD_Code` (`PROD_Code`,`ORD_Code`),
  ADD KEY `fk_order_order_item` (`ORD_Code`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`PERMI_Code`),
  ADD KEY `NAVI_Code` (`NAVI_Code`,`ROLE_Code`),
  ADD KEY `fk_role_permission` (`ROLE_Code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PROD_Code`),
  ADD KEY `CATE_Code` (`CATE_Code`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ROLE_Code`),
  ADD UNIQUE KEY `ROLE_Type` (`ROLE_Name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USR_Code`),
  ADD UNIQUE KEY `USR_Email` (`USR_Email`,`USR_Username`),
  ADD KEY `ROLE_Code` (`ROLE_Code`);

--
-- Indexes for table `voucher_types`
--
ALTER TABLE `voucher_types`
  ADD PRIMARY KEY (`VCHR_Code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CATE_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `CLIE_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `client_types`
--
ALTER TABLE `client_types`
  MODIFY `CTYPE_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `doc_types`
--
ALTER TABLE `doc_types`
  MODIFY `DOC_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `navigations`
--
ALTER TABLE `navigations`
  MODIFY `NAVI_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ORD_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `DETA_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `PERMI_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `PROD_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ROLE_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USR_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `voucher_types`
--
ALTER TABLE `voucher_types`
  MODIFY `VCHR_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `fk_client_type_client` FOREIGN KEY (`CTYPE_Code`) REFERENCES `client_types` (`CTYPE_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_doc_type_client` FOREIGN KEY (`DOC_Code`) REFERENCES `doc_types` (`DOC_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_client_order` FOREIGN KEY (`CLIE_Code`) REFERENCES `clients` (`CLIE_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_order` FOREIGN KEY (`USR_Code`) REFERENCES `users` (`USR_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_voucher_type_order` FOREIGN KEY (`VCHR_Code`) REFERENCES `voucher_types` (`VCHR_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_order_order_item` FOREIGN KEY (`ORD_Code`) REFERENCES `orders` (`ORD_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_order_item` FOREIGN KEY (`PROD_Code`) REFERENCES `products` (`PROD_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `fk_navigation_permission` FOREIGN KEY (`NAVI_Code`) REFERENCES `navigations` (`NAVI_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_role_permission` FOREIGN KEY (`ROLE_Code`) REFERENCES `roles` (`ROLE_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category_product` FOREIGN KEY (`CATE_Code`) REFERENCES `categories` (`CATE_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role_user` FOREIGN KEY (`ROLE_Code`) REFERENCES `roles` (`ROLE_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
