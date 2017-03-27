-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- 主機: localhost:3306
-- 產生時間： 2016 年 12 月 08 日 23:31
-- 伺服器版本: 5.6.33
-- PHP 版本： 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫： `final`
--

-- --------------------------------------------------------

--
-- 資料表結構 `Company`
--

CREATE TABLE `Company` (
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
-- 資料表的匯出資料 `Company`
--

INSERT INTO `Company` (`ID_Company`, `company_name`, `address`, `email`, `phone`, `category`, `income`, `state`) VALUES
(1, 'pitt', '123321 street', 'pitt1@pitt.edu', '412987654', 'Education', 100000000000, 'PA'),
(2, 'CMU', '322 st', 'CMU@gmail.com', '4121412444', 'IT', 15550000, 'PA'),
(3, 'UCLA', '312 st', 'UCLA@gmail.com', '4151112444', 'Education', 1000550, 'CA'),
(4, 'UCSD', '333 st', 'UCSD@gmail.com', '4111112444', 'Sport', 1000060, 'CA'),
(5, 'pitt1', '123321 street', 'PA', '100000000000', 'Education', 412988000, 'pitt1@pitt.edu'),
(6, 'pitt2', '123321 st', 'CA', '1005555555', 'Education', 412988000, 'pitt2@pitt.edu'),
(7, 'pitt2', '123321 st', 'CA', '1005555555', 'Education', 412988000, 'pitt2@pitt.edu'),
(8, 'pitt2', '123321 st', 'CA', '1005555555', 'Education', 412988000, 'pitt2@pitt.edu'),
(9, 'pitt2', '123321 st', 'CA', '1005555555', 'Education', 412988000, 'pitt2@pitt.edu'),
(10, 'pitt1', '123321 street', 'PA', '100000000000', 'Education', 412988000, 'pitt1@pitt.edu'),
(11, 'pitt1', '123321 street', 'PA', '100000000000', 'Education', 412988000, 'pitt1@pitt.edu'),
(12, 'pitt1', '123321 street', 'PA', '100000000000', 'Education', 412988000, 'pitt1@pitt.edu'),
(13, '', '', '', '', '', 0, ''),
(14, 'pitt1', '123321 street', 'PA', '100000000000', 'Education', 412988000, 'pitt1@pitt.edu'),
(15, 'pitt1', '123321 street', 'PA', '100000000000', 'Education', 412988000, 'pitt1@pitt.edu'),
(16, 'pitt1', '123321 street', 'PA', '100000000000', 'Education', 412988000, 'pitt1@pitt.edu'),
(17, 'pitt1', '123321 street', 'PA', '100000000000', 'Education', 412988000, 'pitt1@pitt.edu');

-- --------------------------------------------------------

--
-- 資料表結構 `Customer`
--

CREATE TABLE `Customer` (
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
-- 資料表的匯出資料 `Customer`
--

INSERT INTO `Customer` (`ID_Customer`, `customer_name`, `age`, `gender`, `address`, `email`, `phone`, `income`, `state`) VALUES
(1, 'Tony', 23, 'male', '5th', 'tony@gmail.com', '12334555', 123457000, 'NY'),
(2, 'Amy', 25, 'female', '456 st', 'Amy@gmail.com', '4121113444', 20000, 'CA'),
(3, 'Wayne', 24, 'male', '234 st', 'Wayne@gmail.com', '4121114444', 30000, 'AK'),
(4, 'Max', 33, 'male', '144 st', 'Max@gmail.com', '4121114444', 40000, 'NY'),
(5, '', 0, '', '', '', '', 0, ''),
(6, '', 0, '', '', '', '', 0, ''),
(7, '', 0, '', '', '', '', 0, ''),
(8, 'wayne', 23, 'male', '177 Morewood Ave, Pittsburgh, PA, 15213', 'wayne10610@gmail.com', '123123', 123213, 'PA'),
(9, 'wayne', 23, 'male', '177 Morewood Ave, Pittsburgh, PA, 15213', 'wayne10610@gmail.com', '123123', 123213, 'PA'),
(10, 'AA', 23, 'male', '5th Ave', 'AA@gmail.com', '12334555', 123457000, 'NY'),
(11, 'AA', 23, 'male', '5th Ave', 'AA@gmail.com', '12334555', 123457000, 'NY'),
(12, 'AA', 23, 'male', '5th Ave', 'AA@gmail.com', '12334555', 123457000, 'NY');

-- --------------------------------------------------------

--
-- 資料表結構 `Login_Company`
--

CREATE TABLE `Login_Company` (
  `ID_Company` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `Login_Company`
--

INSERT INTO `Login_Company` (`ID_Company`, `username`, `password`) VALUES
(1, 'pitt', '123'),
(2, 'CMU', '123321'),
(3, 'UCLA', '123321'),
(4, 'UCSD', '123321'),
(6, 'pitt1', '123'),
(7, 'pitt2', '123'),
(8, 'pitt2', '123'),
(9, 'pitt2', '123'),
(10, 'pitt2', '123'),
(11, 'pitt1', '123'),
(12, 'pitt1', '123'),
(13, 'pitt1', '123'),
(14, '', ''),
(15, 'pitt1', '123'),
(16, 'pitt1', '123'),
(17, 'pitt1', '123'),
(18, 'pitt1', '123');

-- --------------------------------------------------------

--
-- 資料表結構 `Login_Customer`
--

CREATE TABLE `Login_Customer` (
  `ID_Customer` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `Login_Customer`
--

INSERT INTO `Login_Customer` (`ID_Customer`, `username`, `password`) VALUES
(1, 'Tony', '123'),
(2, 'Amy', '123'),
(3, 'Wayne', '123'),
(4, 'Max', '123'),
(5, 'pitt1', '123'),
(6, 'pitt1', '123'),
(7, 'pitt1', '123'),
(8, 'pitt1', '123'),
(9, 'pitt1', '123'),
(10, 'AA', '123'),
(11, 'AA', '123'),
(12, 'AA', '123');

-- --------------------------------------------------------

--
-- 資料表結構 `Login_Manager`
--

CREATE TABLE `Login_Manager` (
  `ID_Manager` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `Login_Manager`
--

INSERT INTO `Login_Manager` (`ID_Manager`, `username`, `password`) VALUES
(1, 'MA', '123'),
(2, 'MB', '123'),
(3, 'MC', '123'),
(4, 'MD', '123'),
(5, 'Super', '123'),
(6, 'wayne111', '123'),
(7, 'apple', '123'),
(10, 'www2', '123');

-- --------------------------------------------------------

--
-- 資料表結構 `Manager`
--

CREATE TABLE `Manager` (
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
-- 資料表的匯出資料 `Manager`
--

INSERT INTO `Manager` (`ID_Manager`, `manager_name`, `address`, `email`, `phone`, `job_title`, `ID_Store`, `state`) VALUES
(1, 'MA', '3133 st', 'MA@gmail.com', '5111332444', 'clerk', 1, 'PA'),
(2, 'MB', '3313 st', 'MB@gmail.com', '5111532444', 'clerk', 2, 'CA'),
(3, 'MC', '33113 st', 'MC@gmail.com', '5155112444', 'manager', 1, 'NY'),
(4, 'MD', '3331 st', 'MD@gmail.com', '5111122444', 'manager', 2, 'NY'),
(5, 'Super', '5th Ave', 'super@super.super', '1234567890', 'super', NULL, 'CA'),
(6, 'wayne222', 'abc', 'qq@gmail.com', '123', 'manager', 3, 'PA'),
(7, 'apple manager', 'apple st', 'apple@a.com', '0123456789', 'manager', 4, 'NY'),
(10, 'www2122', 'www', 'aw@as.a', '123231231', 'clerk', 2, 'PA');

-- --------------------------------------------------------

--
-- 資料表結構 `Product`
--

CREATE TABLE `Product` (
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
-- 資料表的匯出資料 `Product`
--

INSERT INTO `Product` (`ID_Product`, `product_name`, `inventory`, `price`, `kind`, `gender`, `description`, `image`, `ID_Store`) VALUES
(1, 'Man shoes1', 22, 100, 'shoes', 'male', 'Man shoes1 Good', '/final/images/ms1.jpg', 1),
(2, 'Man shoes2', 10, 99, 'shoes', 'male', 'Man shoes2 Good', '/final/images/ms2.jpg', 1),
(3, 'Man shoes3', 15, 12, 'shoes', 'male', 'Man shoes3 Good', '/final/images/ms3.jpg', 1),
(4, 'Man shoes4', 45, 13, 'shoes', 'male', 'Man shoes4 Good', '/final/images/ms4.jpg', 1),
(5, 'Man shirt1', 0, 22, 'shirt', 'male', 'Man shirt1 Good', '/final/images/mc1.jpg', 1),
(6, 'Man shirt2', 12, 156, 'shirt', 'male', 'Man shirt2 Good', '/final/images/mc2.jpg', 1),
(7, 'Man shirt3', 55, 178, 'shirt', 'male', 'Man shirt3 Good', '/final/images/mc3.jpg', 1),
(8, 'Man shirt4', 12, 189, 'shirt', 'male', 'Man shirt4 Good', '/final/images/mc4.jpg', 1),
(9, 'Man bag1', 55, 177, 'bag', 'male', 'Man bag1 Good ', '/final/images/mb1.jpg', 1),
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
(21, 'Woman shirt1', 65, 55, 'shirt', 'female', 'Woman shirt1 Good', '/final/images/wc1.jpg', 2),
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
(33, 'q', 22, 11, 'Shoes', 'male', '1', '/final/images/www1.jpg', 1),
(35, 'shoes111111', 22, 11, 'Shoes', 'male', '1233', '/final/images/www1222.jpg', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `Region`
--

CREATE TABLE `Region` (
  `ID_Region` int(11) NOT NULL,
  `state` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `Region`
--

INSERT INTO `Region` (`ID_Region`, `state`) VALUES
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
-- 資料表結構 `Salary`
--

CREATE TABLE `Salary` (
  `job_title` varchar(40) NOT NULL DEFAULT '',
  `ID_Store` int(11) NOT NULL DEFAULT '0',
  `salary` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `Salary`
--

INSERT INTO `Salary` (`job_title`, `ID_Store`, `salary`) VALUES
('clerk', 1, 1000),
('clerk', 2, 1500),
('clerk', 3, 1),
('clerk', 4, 1000),
('manager', 1, 5000),
('manager', 2, 7000),
('manager', 3, 5444),
('manager', 4, 1111220);

-- --------------------------------------------------------

--
-- 資料表結構 `Store`
--

CREATE TABLE `Store` (
  `ID_Store` int(11) NOT NULL,
  `store_name` varchar(40) DEFAULT NULL,
  `ID_Manager` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `Store`
--

INSERT INTO `Store` (`ID_Store`, `store_name`, `ID_Manager`) VALUES
(1, 'Nike', 3),
(2, 'Adidas', 4),
(3, 'GGG1', 6),
(4, 'apple', 7);

-- --------------------------------------------------------

--
-- 資料表結構 `Transaction`
--

CREATE TABLE `Transaction` (
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
-- 資料表的匯出資料 `Transaction`
--

INSERT INTO `Transaction` (`ID_Transaction`, `purchase_date`, `quantity`, `price`, `ID_Product`, `ID_Store`, `ID_Customer`, `ID_Company`, `change_state`, `change_address`, `status`) VALUES
(1, '2016-11-01', 1, 100, 1, 1, 1, NULL, 'PA', 'asdasd', 'success'),
(2, '2016-11-10', 2, 33, 2, 2, NULL, 1, 'PA', '123123', 'uncheck'),
(3, '2016-11-12', 2, 33, 2, 2, NULL, 1, 'PA', '1231223', 'uncheck'),
(4, '2016-11-15', 2, 100, 1, 1, NULL, 1, 'PA', '123123', 'uncheck'),
(10, '2016-12-13', 2, 23, 3, 1, NULL, 1, 'PA', '123321 street', 'uncheck'),
(11, '2016-12-12', 2, 23, 3, 1, NULL, 1, 'PA', '123321 street', 'uncheck'),
(12, '2016-12-11', 2, 23, 3, 1, NULL, 1, 'PA', '123321 street', 'uncheck'),
(13, '2016-12-10', 2, 23, 3, 1, NULL, 1, 'PA', '123321 street', 'reject'),
(14, '2016-12-09', 2, 23, 3, 1, NULL, 1, 'PA', '123321 street', 'uncheck'),
(15, '2016-12-08', 2, 23, 3, 1, NULL, 1, 'PA', '123321 street', 'reject'),
(16, '2016-12-13', 2, 23, 3, 1, 1, NULL, 'pas', 'asdasd', 'uncheck'),
(17, '2016-12-23', 2, 23, 3, 1, 1, NULL, 'pas', 'asdasd', 'uncheck'),
(18, '2016-12-04', 3, 22, 7, 1, 1, NULL, 'NY', '5th', 'uncheck'),
(20, '2016-12-04', 2, 123, 12, 2, 1, NULL, 'NY', '5th', 'reject'),
(23, '2016-12-04', 4, 13, 10, 1, 1, NULL, 'NY', '5th', 'success'),
(24, '2016-12-04', 7, 22, 11, 1, NULL, 1, 'PA', '123321 street', 'uncheck'),
(25, '2016-12-04', 4, 123, 15, 2, NULL, 1, 'PA', '123321 street', 'success'),
(28, '2016-12-05', 4, 100, 1, 1, 1, NULL, 'NY', '5th', 'uncheck'),
(29, '2016-12-05', 1, 66, 23, 2, 1, NULL, 'NY', '5th', 'success'),
(30, '2016-12-05', 1, 99, 2, 1, 1, NULL, 'NY', '5th', 'uncheck'),
(31, '2016-12-05', 4, 55, 21, 2, 1, NULL, 'NY', '5th', 'uncheck'),
(32, '2016-12-05', 3, 100, 1, 1, 1, NULL, 'NY', '5th', 'uncheck'),
(33, '2016-12-05', 1, 34, 19, 2, 1, NULL, 'NY', '5th', 'uncheck'),
(34, '2016-12-08', 1, 100, 1, 1, 1, NULL, 'NY', '5th', 'cart'),
(35, '2016-12-08', 1, 177, 27, 2, 1, NULL, 'NY', '5th', 'cart'),
(36, '2016-12-08', 1, 199, 31, 2, 1, NULL, 'NY', '5th', 'cart');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `Company`
--
ALTER TABLE `Company`
  ADD PRIMARY KEY (`ID_Company`);

--
-- 資料表索引 `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`ID_Customer`);

--
-- 資料表索引 `Login_Company`
--
ALTER TABLE `Login_Company`
  ADD PRIMARY KEY (`ID_Company`);

--
-- 資料表索引 `Login_Customer`
--
ALTER TABLE `Login_Customer`
  ADD PRIMARY KEY (`ID_Customer`);

--
-- 資料表索引 `Login_Manager`
--
ALTER TABLE `Login_Manager`
  ADD PRIMARY KEY (`ID_Manager`);

--
-- 資料表索引 `Manager`
--
ALTER TABLE `Manager`
  ADD PRIMARY KEY (`ID_Manager`),
  ADD KEY `ID_Store` (`ID_Store`);

--
-- 資料表索引 `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`ID_Product`),
  ADD KEY `ID_Store` (`ID_Store`);

--
-- 資料表索引 `Region`
--
ALTER TABLE `Region`
  ADD PRIMARY KEY (`ID_Region`);

--
-- 資料表索引 `Salary`
--
ALTER TABLE `Salary`
  ADD PRIMARY KEY (`job_title`,`ID_Store`),
  ADD KEY `ID_Store` (`ID_Store`);

--
-- 資料表索引 `Store`
--
ALTER TABLE `Store`
  ADD PRIMARY KEY (`ID_Store`);

--
-- 資料表索引 `Transaction`
--
ALTER TABLE `Transaction`
  ADD PRIMARY KEY (`ID_Transaction`),
  ADD KEY `ID_Product` (`ID_Product`),
  ADD KEY `ID_Store` (`ID_Store`),
  ADD KEY `ID_Customer` (`ID_Customer`),
  ADD KEY `ID_Company` (`ID_Company`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `Company`
--
ALTER TABLE `Company`
  MODIFY `ID_Company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用資料表 AUTO_INCREMENT `Customer`
--
ALTER TABLE `Customer`
  MODIFY `ID_Customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用資料表 AUTO_INCREMENT `Login_Company`
--
ALTER TABLE `Login_Company`
  MODIFY `ID_Company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- 使用資料表 AUTO_INCREMENT `Login_Customer`
--
ALTER TABLE `Login_Customer`
  MODIFY `ID_Customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用資料表 AUTO_INCREMENT `Login_Manager`
--
ALTER TABLE `Login_Manager`
  MODIFY `ID_Manager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用資料表 AUTO_INCREMENT `Manager`
--
ALTER TABLE `Manager`
  MODIFY `ID_Manager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用資料表 AUTO_INCREMENT `Product`
--
ALTER TABLE `Product`
  MODIFY `ID_Product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- 使用資料表 AUTO_INCREMENT `Region`
--
ALTER TABLE `Region`
  MODIFY `ID_Region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- 使用資料表 AUTO_INCREMENT `Store`
--
ALTER TABLE `Store`
  MODIFY `ID_Store` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `Transaction`
--
ALTER TABLE `Transaction`
  MODIFY `ID_Transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `Manager`
--
ALTER TABLE `Manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`ID_Store`) REFERENCES `Store` (`ID_Store`);

--
-- 資料表的 Constraints `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`ID_Store`) REFERENCES `Store` (`ID_Store`);

--
-- 資料表的 Constraints `Salary`
--
ALTER TABLE `Salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`ID_Store`) REFERENCES `Store` (`ID_Store`);

--
-- 資料表的 Constraints `Transaction`
--
ALTER TABLE `Transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`ID_Product`) REFERENCES `Product` (`ID_Product`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`ID_Store`) REFERENCES `Store` (`ID_Store`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`ID_Customer`) REFERENCES `Customer` (`ID_Customer`),
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`ID_Company`) REFERENCES `Company` (`ID_Company`);
