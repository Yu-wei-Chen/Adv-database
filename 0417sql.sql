-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost:3306
-- 產生時間： 2017 年 04 月 18 日 05:19
-- 伺服器版本: 5.6.35
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫： `final`
--

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `a1`
-- (請參考以下實際畫面)
--
CREATE TABLE `a1` (
`year` int(11)
,`month` int(11)
,`store_id` int(11)
,`store_name` varchar(45)
,`SUM(transactiondim.price*transactiondim.quantity)` decimal(42,0)
,`region` varchar(45)
);

-- --------------------------------------------------------

--
-- 資料表結構 `company`
--

CREATE TABLE `company` (
  `ID_Company` int(11) NOT NULL,
  `company_name` varchar(40) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `category` varchar(40) DEFAULT NULL,
  `income` float DEFAULT NULL,
  `state` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `company`
--

INSERT INTO `company` (`ID_Company`, `company_name`, `address`, `email`, `phone`, `category`, `income`, `state`) VALUES
(1, 'pitt', '123321 street', 'pitt1@pitt.edu', '412987654', 'Education', 100000000000, 'PA'),
(2, 'CMU', '322 st', 'CMU@gmail.com', '4121412444', 'IT', 15550000, 'PA'),
(3, 'UCLA', '312 st', 'UCLA@gmail.com', '4151112444', 'Education', 1000550, 'CA'),
(4, 'UCSD', '333 st', 'UCSD@gmail.com', '4111112444', 'Sport', 1000060, 'CA');

-- --------------------------------------------------------

--
-- 資料表結構 `companydim`
--

CREATE TABLE `companydim` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(40) DEFAULT NULL,
  `region` varchar(40) DEFAULT NULL,
  `category` varchar(40) DEFAULT NULL,
  `income` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `companydim`
--

INSERT INTO `companydim` (`company_id`, `company_name`, `region`, `category`, `income`) VALUES
(1, 'pitt', 'PA', 'Education', 100000000000),
(2, 'CMU', 'PA', 'IT', 15550000),
(3, 'UCLA', 'CA', 'Education', 1000550),
(4, 'UCSD', 'CA', 'Sport', 1000060);

-- --------------------------------------------------------

--
-- 資料表結構 `customer`
--

CREATE TABLE `customer` (
  `ID_Customer` int(11) NOT NULL,
  `customer_name` varchar(40) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(40) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `income` float DEFAULT NULL,
  `state` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `customer`
--

INSERT INTO `customer` (`ID_Customer`, `customer_name`, `age`, `gender`, `address`, `email`, `phone`, `income`, `state`) VALUES
(1, 'Tony', 23, 'male', '5th', 'tony@gmail.com', '12334555', 123457000, 'NY'),
(2, 'Amy', 25, 'female', '456 st', 'Amy@gmail.com', '4121113444', 20000, 'CA'),
(3, 'Wayne', 24, 'male', '234 st', 'Wayne@gmail.com', '4121114444', 30000, 'PA'),
(4, 'Max', 33, 'male', '144 st', 'Max@gmail.com', '4121114444', 40000, 'NY'),
(5, 'asda', 23, 'male', '5th Ave', 'qeqweq@qq.com', '1111111111', 123457000, 'NY');

-- --------------------------------------------------------

--
-- 資料表結構 `customerdim`
--

CREATE TABLE `customerdim` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(40) DEFAULT NULL,
  `region` varchar(40) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(40) DEFAULT NULL,
  `income` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `customerdim`
--

INSERT INTO `customerdim` (`customer_id`, `customer_name`, `region`, `age`, `gender`, `income`) VALUES
(1, 'Tony', 'NY', 23, 'male', 123457000),
(2, 'Amy', 'CA', 25, 'female', 20000),
(3, 'Wayne', 'PA', 24, 'male', 30000),
(4, 'Max', 'NY', 33, 'male', 40000),
(5, 'asda', 'NY', 23, 'male', 123457000);

-- --------------------------------------------------------

--
-- 資料表結構 `fact`
--

CREATE TABLE `fact` (
  `year` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `week` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `transaction_id` int(11) NOT NULL DEFAULT '0',
  `store_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `fact`
--

INSERT INTO `fact` (`year`, `month`, `day`, `week`, `customer_id`, `company_id`, `transaction_id`, `store_id`, `region_id`, `product_id`) VALUES
(2016, 11, 12, 45, NULL, 1, 30, 3, 1, 3),
(2016, 11, 12, 45, 5, NULL, 31, 4, 2, 4),
(2016, 11, 12, 45, NULL, 1, 32, 4, 2, 3),
(2016, 11, 13, 46, NULL, 3, 33, 5, 2, 5),
(2016, 11, 13, 46, NULL, 2, 34, 5, 2, 6),
(2016, 12, 15, 50, 5, NULL, 35, 3, 1, 3),
(2016, 12, 15, 50, 3, NULL, 36, 4, 2, 4),
(2016, 12, 16, 50, NULL, 1, 37, 4, 2, 3),
(2016, 12, 17, 50, 2, NULL, 38, 5, 2, 5),
(2016, 12, 16, 50, NULL, 2, 39, 5, 2, 6),
(2017, 1, 1, 1, NULL, 1, 40, 3, 1, 3),
(2017, 1, 2, 1, 5, NULL, 41, 4, 2, 7),
(2017, 1, 3, 1, NULL, 1, 42, 4, 2, 8),
(2017, 1, 2, 1, NULL, 3, 43, 5, 2, 9),
(2017, 1, 1, 1, NULL, 2, 44, 5, 2, 10),
(2017, 2, 1, 5, 2, NULL, 45, 3, 1, 6),
(2017, 2, 1, 5, 3, NULL, 46, 4, 2, 7),
(2017, 2, 2, 5, 5, NULL, 47, 4, 2, 8),
(2017, 2, 3, 5, NULL, 3, 48, 5, 2, 8),
(2017, 2, 4, 5, NULL, 2, 49, 5, 2, 9),
(2017, 3, 1, 9, NULL, 1, 50, 3, 1, 5),
(2017, 3, 2, 9, 5, NULL, 51, 4, 2, 3),
(2017, 3, 3, 9, NULL, 1, 52, 4, 2, 4),
(2017, 3, 3, 9, NULL, 3, 53, 5, 2, 7),
(2017, 3, 2, 9, NULL, 2, 54, 5, 2, 8),
(2017, 3, 1, 9, NULL, 1, 55, 3, 1, 3),
(2017, 3, 1, 9, 5, NULL, 56, 4, 2, 4),
(2017, 3, 1, 9, NULL, 1, 57, 4, 2, 3),
(2017, 1, 2, 1, NULL, 3, 58, 5, 2, 5),
(2017, 1, 2, 1, NULL, 2, 59, 5, 2, 6),
(2017, 1, 1, 1, NULL, 1, 60, 1, 1, 1),
(2017, 1, 2, 1, NULL, 2, 61, 1, 1, 2),
(2017, 2, 1, 5, NULL, 1, 62, 1, 1, 1),
(2017, 2, 2, 5, NULL, 2, 63, 1, 1, 2),
(2017, 1, 3, 1, 1, NULL, 64, 2, 1, 1),
(2017, 1, 10, 2, 2, NULL, 65, 2, 1, 2),
(2017, 2, 4, 5, 3, NULL, 66, 2, 1, 1),
(2017, 2, 15, 7, 4, NULL, 67, 2, 1, 2),
(2016, 11, 11, 45, 1, NULL, 68, 1, 1, 1),
(2016, 11, 11, 45, 2, NULL, 69, 2, 1, 2),
(2016, 11, 11, 45, NULL, 1, 70, 3, 1, 3),
(2016, 11, 11, 45, NULL, 2, 71, 4, 2, 4),
(2016, 11, 11, 45, 4, NULL, 72, 5, 2, 5),
(2016, 11, 11, 45, NULL, 1, 73, 3, 1, 3),
(2016, 11, 11, 45, NULL, 2, 74, 4, 2, 4),
(2016, 11, 11, 45, NULL, 3, 75, 3, 1, 3),
(2016, 11, 11, 45, NULL, 4, 76, 4, 2, 4),
(2016, 12, 15, 50, 1, NULL, 77, 1, 1, 4),
(2016, 11, 11, 45, 1, NULL, 78, 1, 1, 6),
(2016, 11, 11, 45, 2, NULL, 79, 2, 1, 7),
(2016, 11, 11, 45, 3, NULL, 80, 3, 1, 8),
(2016, 11, 11, 45, 4, NULL, 81, 4, 2, 9),
(2016, 11, 11, 45, NULL, 1, 82, 5, 2, 10),
(2016, 11, 11, 45, NULL, 2, 83, 1, 1, 11),
(2016, 11, 11, 45, NULL, 3, 84, 2, 1, 12),
(2016, 11, 11, 45, 1, NULL, 85, 1, 1, 6),
(2016, 12, 20, 51, 1, NULL, 86, 4, 2, 7),
(2016, 1, 15, 2, 2, NULL, 87, 4, 2, 8),
(2016, 2, 10, 6, NULL, 3, 88, 5, 2, 9);

-- --------------------------------------------------------

--
-- 資料表結構 `login_company`
--

CREATE TABLE `login_company` (
  `ID_Company` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `login_company`
--

INSERT INTO `login_company` (`ID_Company`, `username`, `password`) VALUES
(1, 'pitt', '123'),
(2, 'CMU', '123321'),
(3, 'UCLA', '123321'),
(4, 'UCSD', '123321');

-- --------------------------------------------------------

--
-- 資料表結構 `login_customer`
--

CREATE TABLE `login_customer` (
  `ID_Customer` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `login_customer`
--

INSERT INTO `login_customer` (`ID_Customer`, `username`, `password`) VALUES
(1, 'Tony', '123'),
(2, 'Amy', '123'),
(3, 'Wayne', '123'),
(4, 'Max', '123'),
(13, 'QQ', '123');

-- --------------------------------------------------------

--
-- 資料表結構 `login_manager`
--

CREATE TABLE `login_manager` (
  `ID_Manager` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `login_manager`
--

INSERT INTO `login_manager` (`ID_Manager`, `username`, `password`) VALUES
(1, 'MA', '123'),
(2, 'MB', '123'),
(3, 'MC', '123'),
(4, 'MD', '123'),
(5, 'Super', '123'),
(6, 'wayne111', '123'),
(7, 'apple', '123'),
(8, 'peter', '123'),
(9, 'asus', '123');

-- --------------------------------------------------------

--
-- 資料表結構 `manager`
--

CREATE TABLE `manager` (
  `ID_Manager` int(11) NOT NULL,
  `manager_name` varchar(40) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `job_title` varchar(40) DEFAULT NULL,
  `ID_Store` int(11) DEFAULT NULL,
  `state` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `manager`
--

INSERT INTO `manager` (`ID_Manager`, `manager_name`, `address`, `email`, `phone`, `job_title`, `ID_Store`, `state`) VALUES
(1, 'MA', '3133 st', 'MA@gmail.com', '5111332444', 'clerk', 1, 'PA'),
(2, 'MB', '3313 st', 'MB@gmail.com', '5111532444', 'clerk', 2, 'CA'),
(3, 'MC', '33113 st', 'MC@gmail.com', '5155112444', 'manager', 1, 'NY'),
(4, 'MD', '3331 st', 'MD@gmail.com', '5111122444', 'manager', 2, 'NY'),
(5, 'Super', '5th Ave', 'super@super.super', '1234567890', 'super', NULL, 'CA'),
(7, 'apple manager', 'apple st', 'apple@a.com', '0123456789', 'manager', 4, 'NY'),
(8, 'peter', '5th Ave.', 'peter@gmail.com', '0123874658', 'clerk', 1, 'CA'),
(9, 'AUSU_M', 'centre Ave', 'ASUS@asus.com', '412999444', 'manager', 5, 'PA');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `ID_Product` int(11) NOT NULL,
  `product_name` varchar(40) DEFAULT NULL,
  `inventory` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `kind` varchar(40) DEFAULT NULL,
  `gender` varchar(30) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `ID_Store` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`ID_Product`, `product_name`, `inventory`, `price`, `kind`, `gender`, `description`, `image`, `ID_Store`) VALUES
(1, 'Man shoes1', 22, 100, 'shoes', 'male', 'Man shoes1 Good', '/final/images/ms1.jpg', 1),
(2, 'Man shoes2', 10, 99, 'shoes', 'male', 'Man shoes2 Good', '/final/images/ms2.jpg', 2),
(3, 'Man shoes3', 15, 12, 'shoes', 'male', 'Man shoes3 Good', '/final/images/ms3.jpg', 3),
(4, 'Man shoes4', 45, 13, 'shoes', 'male', 'Man shoes4 Good', '/final/images/ms4.jpg', 4),
(5, 'Man shirt1', 0, 22, 'shirt', 'male', 'Man shirt1 Good', '/final/images/mc1.jpg', 5),
(6, 'Man shirt2', 12, 156, 'shirt', 'male', 'Man shirt2 Good', '/final/images/mc2.jpg', 1),
(7, 'Man shirt3', 55, 178, 'shirt', 'male', 'Man shirt3 Good', '/final/images/mc3.jpg', 1),
(8, 'Man shirt4', 12, 189, 'shirt', 'male', 'Man shirt4 Good', '/final/images/mc4.jpg', 1),
(9, 'Man bag1', 23, 177, 'bag', 'male', 'Man bag1 Good ', '/final/images/mb1.jpg', 1),
(10, 'Man bag2', 12, 144, 'bag', 'male', 'Man bag2 Good', '/final/images/mb2.jpg', 1),
(11, 'Man bag3', 5, 155, 'bag', 'male', 'TMan bag3 Good', '/final/images/mb3.jpg', 1),
(12, 'Man bag4', 23, 199, 'bag', 'male', 'Man bag4 Good', '/final/images/mb4.jpg', 1),
(13, 'Man accessary1', 43, 99, 'accessary', 'male', 'Man accessary1 Good', '/final/images/ma1.jpg', 1),
(14, 'Man accessary2', 32, 88, 'accessary', 'male', 'Man accessary2 Good', '/final/images/ma2.jpg', 1),
(15, 'Man accessary3', 65, 88, 'accessary', 'male', 'Man accessary3 Good', '/final/images/ma3.jpg', 1),
(16, 'Man accessary4', 47, 77, 'accessary', 'male', 'Man accessary4 Good', '/final/images/ma4.jpg', 1),
(17, 'Woman shoes1', 0, 77, 'shoes', 'female', 'Woman shoes1 Good', '/final/images/ws1.jpg', 2),
(18, 'Woman shoes2', 11, 32, 'shoes', 'female', 'Woman shoes2 Good', '/final/images/ws2.jpg', 2),
(19, 'Woman shoes3', 6, 34, 'shoes', 'female', 'Woman shoes3 Good', '/final/images/ws3.jpg', 2),
(20, 'Woman shoes4', 32, 44, 'shoes', 'female', 'Woman shoes4 Good', '/final/images/ws4.jpg', 2),
(21, 'Woman shirt1', 55, 55, 'shirt', 'female', 'Woman shirt1 Good', '/final/images/wc1.jpg', 2),
(22, 'Woman shirt2', 10, 166, 'shirt', 'female', 'Woman shirt2 Good', '/final/images/wc2.jpg', 2),
(23, 'Woman shirt3', 1, 66, 'shirt', 'female', 'Woman shirt3 Good', '/final/images/wc3.jpg', 2),
(24, 'Woman shirt4', 78, 122, 'shirt', 'female', 'Woman shirt4 Good', '/final/images/wc4.jpg', 2),
(25, 'Woman accessary1', 33, 199, 'accessary', 'female', 'Woman accessary1 Good', '/final/images/wa1.jpg', 2),
(26, 'Woman accessary2', 8, 188, 'accessary', 'female', 'Woman accessary2 Good', '/final/images/wa2.jpg', 2),
(27, 'Woman accessary3', 20, 177, 'accessary', 'female', 'Woman accessary3 Good', '/final/images/wa3.jpg', 2),
(28, 'Woman accessary4', 30, 178, 'accessary', 'female', 'Woman accessary4 Good', '/final/images/wa4.jpg', 2),
(29, 'Woman bag1', 50, 179, 'bag', 'female', 'Woman bag1 Good', '/final/images/wb1.jpg', 2),
(30, 'Woman bag2', 40, 189, 'bag', 'female', 'Woman bag2 Good', '/final/images/wb2.jpg', 2),
(31, 'Woman bag3', 19, 199, 'bag', 'female', 'Woman bag3 Good', '/final/images/wb3.jpg', 2),
(32, 'Woman bag4', 18, 29, 'bag', 'female', 'Woman bag4 Good', '/final/images/wb4.jpg', 2),
(34, 'shirt 10', 50, 11, 'Shirt', 'male', 'male shirt', '/final/images/test_mshirt.jpg', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `productdim`
--

CREATE TABLE `productdim` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(40) DEFAULT NULL,
  `kind` varchar(40) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `productdim`
--

INSERT INTO `productdim` (`product_id`, `product_name`, `kind`, `price`) VALUES
(1, 'Man shoes1', 'shoes', 100),
(3, 'Man shoes3', 'shoes', 12),
(10, 'Man bag2', 'bag', 144),
(11, 'Man bag3', 'bag', 155),
(15, 'Man accessary3', 'accessary', 88),
(23, 'Woman shirt3', 'shirt', 66),
(2, 'Man shoes2', 'shoes', 99),
(4, 'Man shoes4', 'shoes', 13),
(5, 'Man shirt1', 'shirt', 22),
(6, 'Man shirt2', 'shirt', 156),
(7, 'Man shirt3', 'shirt', 178),
(8, 'Man shirt4', 'shirt', 189),
(9, 'Man bag1', 'bag', 177),
(12, 'Man bag4', 'bag', 199);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `q31`
-- (請參考以下實際畫面)
--
CREATE TABLE `q31` (
`year` int(11)
,`month` int(11)
,`day` int(11)
,`product_id` int(11)
,`product_name` varchar(40)
,`sum` decimal(42,0)
);

-- --------------------------------------------------------

--
-- 資料表結構 `query`
--

CREATE TABLE `query` (
  `id` int(11) NOT NULL,
  `fromyear` varchar(4) COLLATE utf8_bin DEFAULT NULL,
  `frommonth` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `fromday` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `fromweek` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `toyear` varchar(4) COLLATE utf8_bin DEFAULT NULL,
  `tomonth` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `today` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `toweek` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `product_name` varchar(25) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 資料表的匯出資料 `query`
--

INSERT INTO `query` (`id`, `fromyear`, `frommonth`, `fromday`, `fromweek`, `toyear`, `tomonth`, `today`, `toweek`, `product_name`) VALUES
(1, '2017', '2', NULL, NULL, '2016', '11', NULL, NULL, NULL),
(2, '2017', '2', NULL, NULL, '2017', '3', NULL, NULL, NULL),
(3, '2016', '11', '13', NULL, '2017', '2', '2', NULL, NULL),
(4, '2016', '11', '11', NULL, '2017', '2', '4', NULL, NULL),
(5, '2016', '11', NULL, NULL, '2017', '2', NULL, NULL, NULL),
(6, '2017', '2', NULL, NULL, '2017', '2', NULL, NULL, 'Man shoes2'),
(7, '2017', '2', NULL, NULL, '2017', '2', NULL, NULL, 'Man shoes3'),
(8, '2016', '11', NULL, '45', '2016', '11', NULL, '45', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `region`
--

CREATE TABLE `region` (
  `ID_Region` int(11) NOT NULL,
  `state` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `region`
--

INSERT INTO `region` (`ID_Region`, `state`) VALUES
(1, 'AK'),
(2, 'AL'),
(3, 'AZ'),
(4, 'AR'),
(5, 'CA'),
(6, 'CO'),
(7, 'CT'),
(8, 'DE'),
(9, 'DC'),
(10, 'FL'),
(11, 'GA'),
(12, 'HI'),
(13, 'ID'),
(14, 'IL'),
(15, 'IN'),
(16, 'IA'),
(17, 'KS'),
(18, 'KY'),
(19, 'LA'),
(20, 'ME'),
(21, 'MD'),
(22, 'MA'),
(23, 'MI'),
(24, 'MN'),
(25, 'MS'),
(26, 'MO'),
(27, 'MT'),
(28, 'NB'),
(29, 'NV'),
(30, 'NH'),
(31, 'NJ'),
(32, 'NM'),
(33, 'NY'),
(34, 'NC'),
(35, 'ND'),
(36, 'OH'),
(37, 'OK'),
(38, 'OR'),
(39, 'PA'),
(40, 'PR'),
(41, 'RI'),
(42, 'SC'),
(43, 'SD'),
(44, 'TN'),
(45, 'TX'),
(46, 'UT'),
(47, 'VT'),
(48, 'VA'),
(49, 'VI'),
(50, 'WA'),
(51, 'WV'),
(52, 'WI'),
(53, 'WY');

-- --------------------------------------------------------

--
-- 資料表結構 `regiondim`
--

CREATE TABLE `regiondim` (
  `region_id` int(11) NOT NULL,
  `region` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `regiondim`
--

INSERT INTO `regiondim` (`region_id`, `region`) VALUES
(1, 'AK'),
(2, 'AL');

-- --------------------------------------------------------

--
-- 資料表結構 `salary`
--

CREATE TABLE `salary` (
  `job_title` varchar(40) NOT NULL DEFAULT '',
  `ID_Store` int(11) NOT NULL DEFAULT '0',
  `salary` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `salary`
--

INSERT INTO `salary` (`job_title`, `ID_Store`, `salary`) VALUES
('clerk', 1, 1000),
('clerk', 2, 1500),
('clerk', 3, 1),
('clerk', 4, 1000),
('clerk', 5, 300),
('clerk', 6, 100000),
('manager', 1, 5000),
('manager', 2, 7000),
('manager', 3, 5444),
('manager', 4, 1111220),
('manager', 5, 500),
('manager', 6, 200000);

-- --------------------------------------------------------

--
-- 資料表結構 `store`
--

CREATE TABLE `store` (
  `ID_Store` int(11) NOT NULL,
  `store_name` varchar(40) DEFAULT NULL,
  `ID_Manager` int(11) DEFAULT NULL,
  `ID_Region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `store`
--

INSERT INTO `store` (`ID_Store`, `store_name`, `ID_Manager`, `ID_Region`) VALUES
(1, 'Nike', 3, 1),
(2, 'Adidas', 4, 1),
(3, 'GGG1', 6, 1),
(4, 'apple', 7, 2),
(5, 'ASUS', 9, 2),
(6, 'Acer1', 11, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `storedim`
--

CREATE TABLE `storedim` (
  `store_id` int(11) NOT NULL,
  `store_name` varchar(45) DEFAULT NULL,
  `region` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `storedim`
--

INSERT INTO `storedim` (`store_id`, `store_name`, `region`) VALUES
(1, 'Nike', 1),
(2, 'Adidas', 1),
(3, 'GGG1', 1),
(4, 'apple', 2),
(5, 'ASUS', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `transaction`
--

CREATE TABLE `transaction` (
  `ID_Transaction` int(11) NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `ID_Product` int(11) DEFAULT NULL,
  `ID_Store` int(11) DEFAULT NULL,
  `ID_Customer` int(11) DEFAULT NULL,
  `ID_Company` int(11) DEFAULT NULL,
  `change_state` varchar(1000) DEFAULT NULL,
  `change_address` varchar(1000) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `transaction`
--

INSERT INTO `transaction` (`ID_Transaction`, `purchase_date`, `quantity`, `price`, `ID_Product`, `ID_Store`, `ID_Customer`, `ID_Company`, `change_state`, `change_address`, `status`) VALUES
(30, '2016-11-12', 2, 100, 3, 3, NULL, 1, 'PA', '5th', 'success'),
(31, '2016-11-12', 4, 300, 4, 4, 5, NULL, 'IL', '5th', 'success'),
(32, '2016-11-12', 23, 200, 3, 4, NULL, 1, 'PA', 'Murray', 'success'),
(33, '2016-11-13', 21, 210, 5, 5, NULL, 3, 'CA', 'Murray', 'success'),
(34, '2016-11-13', 22, 120, 6, 5, NULL, 2, 'CA', 'Murray', 'success'),
(35, '2016-12-15', 3, 120, 3, 3, 5, NULL, 'PA', '5th', 'success'),
(36, '2016-12-15', 3, 32, 4, 4, 3, NULL, 'IL', '5th', 'success'),
(37, '2016-12-16', 4, 240, 3, 4, NULL, 1, 'PA', 'Murray', 'success'),
(38, '2016-12-17', 13, 110, 5, 5, 2, NULL, 'CA', 'Murray', 'success'),
(39, '2016-12-16', 20, 140, 6, 5, NULL, 2, 'CA', 'Murray', 'success'),
(40, '2017-01-01', 1, 200, 3, 3, NULL, 1, 'PA', '5th', 'success'),
(41, '2017-01-02', 4, 400, 7, 4, 5, NULL, 'IL', '5th', 'success'),
(42, '2017-01-03', 12, 100, 8, 4, NULL, 1, 'PA', 'Murray', 'success'),
(43, '2017-01-02', 15, 250, 9, 5, NULL, 3, 'CA', 'Murray', 'success'),
(44, '2017-01-01', 20, 170, 10, 5, NULL, 2, 'CA', 'Murray', 'success'),
(45, '2017-02-01', 2, 100, 6, 3, 2, NULL, 'PA', '5th', 'success'),
(46, '2017-02-01', 4, 300, 7, 4, 3, NULL, 'IL', '5th', 'success'),
(47, '2017-02-02', 23, 200, 8, 4, 5, NULL, 'PA', 'Murray', 'success'),
(48, '2017-02-03', 21, 210, 8, 5, NULL, 3, 'CA', 'Murray', 'success'),
(49, '2017-02-04', 22, 120, 9, 5, NULL, 2, 'CA', 'Murray', 'success'),
(50, '2017-03-01', 21, 100, 5, 3, NULL, 1, 'PA', '5th', 'success'),
(51, '2017-03-02', 14, 300, 3, 4, 5, NULL, 'IL', '5th', 'success'),
(52, '2017-03-03', 14, 200, 4, 4, NULL, 1, 'PA', 'Murray', 'success'),
(53, '2017-03-03', 19, 500, 7, 5, NULL, 3, 'CA', 'Murray', 'success'),
(54, '2017-03-02', 15, 1000, 8, 5, NULL, 2, 'CA', 'Murray', 'success'),
(55, '2017-03-01', 2, 100, 3, 3, NULL, 1, 'PA', '5th', 'success'),
(56, '2017-03-01', 4, 300, 4, 4, 5, NULL, 'IL', '5th', 'success'),
(57, '2017-03-01', 23, 200, 3, 4, NULL, 1, 'PA', 'Murray', 'success'),
(58, '2017-01-02', 21, 210, 5, 5, NULL, 3, 'CA', 'Murray', 'success'),
(59, '2017-01-02', 22, 120, 6, 5, NULL, 2, 'CA', 'Murray', 'success'),
(60, '2017-01-01', 10, 100, 1, 1, NULL, 1, 'PA', '5th', 'success'),
(61, '2017-01-02', 10, 99, 2, 1, NULL, 2, 'IL', '5th', 'success'),
(62, '2017-02-01', 15, 90, 1, 1, NULL, 1, 'PA', 'Murray', 'success'),
(63, '2017-02-02', 20, 99, 2, 1, NULL, 2, 'CA', 'Murray', 'success'),
(64, '2017-01-03', 40, 80, 1, 2, 1, NULL, 'MI', '6th', 'success'),
(65, '2017-01-10', 10, 99, 2, 2, 2, NULL, 'FL', '2th', 'success'),
(66, '2017-02-04', 12, 90, 1, 2, 3, NULL, 'PA', '123', 'success'),
(67, '2017-02-15', 5, 99, 2, 2, 4, NULL, 'NY', '321', 'success'),
(68, '2016-11-11', 10, 100, 1, 1, 1, NULL, 'CA', '15th', 'success'),
(69, '2016-11-11', 10, 99, 2, 2, 2, NULL, 'PA', '1th', 'success'),
(70, '2016-11-11', 100, 12, 3, 3, NULL, 1, 'NY', '16', 'success'),
(71, '2016-11-11', 10, 13, 4, 4, NULL, 2, 'IL', 'asdasd', 'success'),
(72, '2016-11-11', 4, 22, 5, 5, 4, NULL, 'PA', 'qwe', 'success'),
(73, '2016-11-11', 100, 12, 3, 3, NULL, 1, 'NY', '16', 'success'),
(74, '2016-11-11', 10, 13, 4, 4, NULL, 2, 'IL', 'asdasd', 'success'),
(75, '2016-11-11', 100, 12, 3, 3, NULL, 3, 'NY', '16', 'success'),
(76, '2016-11-11', 10, 13, 4, 4, NULL, 4, 'IL', 'asdasd', 'success'),
(77, '2016-12-15', 3, 50, 4, 1, 1, NULL, 'PA', 'qwe', 'success'),
(78, '2016-11-11', 20, 120, 6, 1, 1, NULL, 'PA', '12', 'success'),
(79, '2016-11-11', 30, 50, 7, 2, 2, NULL, 'CA', 'qwe12', 'success'),
(80, '2016-11-11', 70, 140, 8, 3, 3, NULL, 'IL', 'asd', 'success'),
(81, '2016-11-11', 60, 200, 9, 4, 4, NULL, 'AK', 'zxc32', 'success'),
(82, '2016-11-11', 150, 100, 10, 5, NULL, 1, 'CA', '5th', 'success'),
(83, '2016-11-11', 200, 30, 11, 1, NULL, 2, 'PA', '21', 'success'),
(84, '2016-11-11', 10, 300, 12, 2, NULL, 3, 'NY', 'qwe', 'success'),
(85, '2016-11-11', 20, 120, 6, 1, 1, NULL, 'PA', '12', 'success'),
(86, '2016-12-20', 100, 50, 7, 4, 1, NULL, 'CA', '12', 'success'),
(87, '2016-01-15', 30, 120, 8, 4, 2, NULL, 'PA', '5th', 'success'),
(88, '2016-02-10', 50, 300, 9, 5, NULL, 3, 'NY', 'ewq', 'success'),
(89, '2017-04-18', 1, 32, 18, 2, 1, NULL, 'NY', '5th', 'cart'),
(90, '2017-04-18', 1, 100, 1, 1, 1, NULL, 'NY', '5th', 'cart');

-- --------------------------------------------------------

--
-- 資料表結構 `transactiondim`
--

CREATE TABLE `transactiondim` (
  `transaction_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `transactiondim`
--

INSERT INTO `transactiondim` (`transaction_id`, `quantity`, `price`) VALUES
(30, 2, 100),
(31, 4, 300),
(32, 23, 200),
(33, 21, 210),
(34, 22, 120),
(35, 3, 120),
(36, 3, 32),
(37, 4, 240),
(38, 13, 110),
(39, 20, 140),
(40, 1, 200),
(41, 4, 400),
(42, 12, 100),
(43, 15, 250),
(44, 20, 170),
(45, 2, 100),
(46, 4, 300),
(47, 23, 200),
(48, 21, 210),
(49, 22, 120),
(50, 21, 100),
(51, 14, 300),
(52, 14, 200),
(53, 19, 500),
(54, 15, 1000),
(55, 2, 100),
(56, 4, 300),
(57, 23, 200),
(58, 21, 210),
(59, 22, 120),
(60, 10, 100),
(61, 10, 99),
(62, 15, 90),
(63, 20, 99),
(64, 40, 80),
(65, 10, 99),
(66, 12, 90),
(67, 5, 99),
(68, 10, 100),
(69, 10, 99),
(70, 100, 12),
(71, 10, 13),
(72, 4, 22),
(73, 100, 12),
(74, 10, 13),
(75, 100, 12),
(76, 10, 13),
(77, 3, 50),
(78, 20, 120),
(79, 30, 50),
(80, 70, 140),
(81, 60, 200),
(82, 150, 100),
(83, 200, 30),
(84, 10, 300),
(85, 20, 120),
(86, 100, 50),
(87, 30, 120),
(88, 50, 300);

-- --------------------------------------------------------

--
-- 檢視表結構 `a1`
--
DROP TABLE IF EXISTS `a1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `a1`  AS  select `fact`.`year` AS `year`,`fact`.`month` AS `month`,`storedim`.`store_id` AS `store_id`,`storedim`.`store_name` AS `store_name`,sum((`transactiondim`.`price` * `transactiondim`.`quantity`)) AS `SUM(transactiondim.price*transactiondim.quantity)`,`regiondim`.`region` AS `region` from (((`fact` join `storedim`) join `regiondim`) join `transactiondim`) where ((`fact`.`store_id` = `storedim`.`store_id`) and (`fact`.`region_id` = `regiondim`.`region_id`) and (`fact`.`transaction_id` = `transactiondim`.`transaction_id`)) group by `fact`.`year`,`fact`.`month`,`fact`.`store_id`,`fact`.`region_id` ;

-- --------------------------------------------------------

--
-- 檢視表結構 `q31`
--
DROP TABLE IF EXISTS `q31`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `q31`  AS  select `fact`.`year` AS `year`,`fact`.`month` AS `month`,`fact`.`day` AS `day`,`productdim`.`product_id` AS `product_id`,`productdim`.`product_name` AS `product_name`,sum((`transactiondim`.`quantity` * `transactiondim`.`price`)) AS `sum` from ((`fact` join `transactiondim`) join `productdim`) where ((`fact`.`transaction_id` = `transactiondim`.`transaction_id`) and (`fact`.`product_id` = `productdim`.`product_id`) and (`fact`.`year` = '2016') and (`fact`.`month` = '11') and (`fact`.`day` = '11')) group by `fact`.`year`,`fact`.`month`,`fact`.`day`,`productdim`.`product_id` order by `sum` desc limit 5 ;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`ID_Company`);

--
-- 資料表索引 `companydim`
--
ALTER TABLE `companydim`
  ADD PRIMARY KEY (`company_id`);

--
-- 資料表索引 `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID_Customer`);

--
-- 資料表索引 `customerdim`
--
ALTER TABLE `customerdim`
  ADD PRIMARY KEY (`customer_id`);

--
-- 資料表索引 `fact`
--
ALTER TABLE `fact`
  ADD PRIMARY KEY (`transaction_id`);

--
-- 資料表索引 `login_company`
--
ALTER TABLE `login_company`
  ADD PRIMARY KEY (`ID_Company`);

--
-- 資料表索引 `login_customer`
--
ALTER TABLE `login_customer`
  ADD PRIMARY KEY (`ID_Customer`);

--
-- 資料表索引 `login_manager`
--
ALTER TABLE `login_manager`
  ADD PRIMARY KEY (`ID_Manager`);

--
-- 資料表索引 `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`ID_Manager`),
  ADD KEY `ID_Store` (`ID_Store`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID_Product`),
  ADD KEY `ID_Store` (`ID_Store`);

--
-- 資料表索引 `productdim`
--
ALTER TABLE `productdim`
  ADD PRIMARY KEY (`product_id`);

--
-- 資料表索引 `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`ID_Region`);

--
-- 資料表索引 `regiondim`
--
ALTER TABLE `regiondim`
  ADD PRIMARY KEY (`region_id`);

--
-- 資料表索引 `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`job_title`,`ID_Store`),
  ADD KEY `ID_Store` (`ID_Store`);

--
-- 資料表索引 `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`ID_Store`);

--
-- 資料表索引 `storedim`
--
ALTER TABLE `storedim`
  ADD PRIMARY KEY (`store_id`);

--
-- 資料表索引 `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`ID_Transaction`),
  ADD KEY `ID_Product` (`ID_Product`),
  ADD KEY `ID_Store` (`ID_Store`),
  ADD KEY `ID_Customer` (`ID_Customer`),
  ADD KEY `ID_Company` (`ID_Company`);

--
-- 資料表索引 `transactiondim`
--
ALTER TABLE `transactiondim`
  ADD PRIMARY KEY (`transaction_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `company`
--
ALTER TABLE `company`
  MODIFY `ID_Company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `customer`
--
ALTER TABLE `customer`
  MODIFY `ID_Customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `login_company`
--
ALTER TABLE `login_company`
  MODIFY `ID_Company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `login_customer`
--
ALTER TABLE `login_customer`
  MODIFY `ID_Customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用資料表 AUTO_INCREMENT `login_manager`
--
ALTER TABLE `login_manager`
  MODIFY `ID_Manager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `manager`
--
ALTER TABLE `manager`
  MODIFY `ID_Manager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `ID_Product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- 使用資料表 AUTO_INCREMENT `region`
--
ALTER TABLE `region`
  MODIFY `ID_Region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- 使用資料表 AUTO_INCREMENT `store`
--
ALTER TABLE `store`
  MODIFY `ID_Store` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用資料表 AUTO_INCREMENT `transaction`
--
ALTER TABLE `transaction`
  MODIFY `ID_Transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- 使用資料表 AUTO_INCREMENT `transactiondim`
--
ALTER TABLE `transactiondim`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`ID_Store`) REFERENCES `store` (`ID_Store`);

--
-- 資料表的 Constraints `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`ID_Store`) REFERENCES `store` (`ID_Store`);

--
-- 資料表的 Constraints `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`ID_Store`) REFERENCES `store` (`ID_Store`);

--
-- 資料表的 Constraints `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`ID_Product`) REFERENCES `product` (`ID_Product`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`ID_Store`) REFERENCES `store` (`ID_Store`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`ID_Customer`) REFERENCES `customer` (`ID_Customer`),
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`ID_Company`) REFERENCES `company` (`ID_Company`);
