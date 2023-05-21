-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-05-21 10:52:35
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `stockmanagement`
--

-- --------------------------------------------------------

--
-- 資料表結構 `buyrecord`
--

CREATE TABLE `buyrecord` (
  `buy_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `buy_num` int(11) NOT NULL,
  `buy_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `buyrecord`
--

INSERT INTO `buyrecord` (`buy_id`, `product_id`, `buy_num`, `buy_date`) VALUES
(1, 1, 10, '2023-05-16'),
(3, 1, 10, '2023-05-16'),
(4, 4, 40, '2023-05-17'),
(5, 5, 80, '2023-05-17'),
(6, 1, 1, '2023-05-18'),
(7, 10, 0, '2023-05-18'),
(8, 1, 1, '2023-05-18'),
(9, 2, 20, '2023-05-18'),
(10, 3, 20, '2023-05-19'),
(11, 1, 10, '2023-05-19'),
(12, 1, 10, '2023-05-19'),
(13, 3, 98, '2023-05-19'),
(14, 1, 10, '2023-05-19'),
(15, 5, 10, '2023-05-19'),
(16, 1, 20, '2023-05-19'),
(17, 1, 20, '2023-05-19'),
(18, 1, 16, '2023-05-19'),
(19, 1, 10, '2023-05-19'),
(20, 1, 50, '2023-05-19'),
(21, 1, 20, '2023-05-20'),
(22, 2, 5, '2023-05-20'),
(23, 1, 10, '2023-05-20'),
(24, 2, 5, '2023-05-20'),
(25, 3, 10, '2023-05-20'),
(26, 4, 10, '2023-05-20'),
(27, 1, 10, '2023-05-21'),
(28, 2, 20, '2023-05-21');

-- --------------------------------------------------------

--
-- 資料表結構 `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `e_name` varchar(100) NOT NULL,
  `e_account` varchar(100) NOT NULL,
  `e_pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `employee`
--

INSERT INTO `employee` (`employee_id`, `e_name`, `e_account`, `e_pwd`) VALUES
(1, 'Apple', '123@g.com', '0000');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_descrp` varchar(200) NOT NULL,
  `p_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`product_id`, `p_name`, `p_descrp`, `p_stock`) VALUES
(1, '主機', '4090讚讚', 254),
(2, '螢幕', '護眼好用', 228),
(3, '滑鼠', '滑順', 126),
(4, '鍵盤', '好敲一直敲', 225),
(5, '喇叭', '聲音響徹雲霄', 280);

-- --------------------------------------------------------

--
-- 資料表結構 `soldrecord`
--

CREATE TABLE `soldrecord` (
  `sold_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sold_num` int(11) NOT NULL,
  `sold_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `soldrecord`
--

INSERT INTO `soldrecord` (`sold_id`, `product_id`, `sold_num`, `sold_date`) VALUES
(1, 1, 30, '2023-05-18'),
(2, 1, 30, '2023-05-18'),
(3, 1, 5, '2023-05-18'),
(4, 1, 5, '2023-05-18'),
(5, 1, 1, '2023-05-19'),
(6, 1, 1, '2023-05-19'),
(7, 1, 22, '2023-05-19'),
(8, 3, 2, '2023-05-19'),
(9, 1, 10, '2023-05-19'),
(10, 1, 10, '2023-05-19'),
(11, 1, 10, '2023-05-19'),
(12, 1, 10, '2023-05-20'),
(13, 5, 10, '2023-05-20'),
(14, 2, 5, '2023-05-20'),
(15, 2, 5, '2023-05-20'),
(16, 4, 5, '2023-05-20'),
(17, 2, 5, '2023-05-20'),
(18, 2, 1, '2023-05-20'),
(19, 4, 10, '2023-05-20'),
(20, 4, 10, '2023-05-20'),
(21, 1, 5, '2023-05-20'),
(22, 2, 1, '2023-05-20'),
(23, 1, 5, '2023-05-20'),
(24, 2, 5, '2023-05-20'),
(25, 1, 10, '2023-05-21');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `buyrecord`
--
ALTER TABLE `buyrecord`
  ADD PRIMARY KEY (`buy_id`);

--
-- 資料表索引 `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- 資料表索引 `soldrecord`
--
ALTER TABLE `soldrecord`
  ADD PRIMARY KEY (`sold_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `buyrecord`
--
ALTER TABLE `buyrecord`
  MODIFY `buy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `soldrecord`
--
ALTER TABLE `soldrecord`
  MODIFY `sold_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
