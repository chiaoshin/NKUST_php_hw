-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-20 11:19:10
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `db_c109193110` 改 sql6511363(免費線上資料庫)
--
CREATE DATABASE IF NOT EXISTS `sql6511363` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sql6511363`;

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `sn` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `psw` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `account`
--

INSERT INTO `account` (`sn`, `username`, `psw`, `email`) VALUES
(1, 'admin', 'qq11', 'C109193100@nkust.edu.tw'),
(2, 'C109193111', 'C11', 'C109193111@nkust.edu.tw'),
(3, 'C109193112', 'C12', 'C109193112@nkust.edu.tw'),
(4, 'C109193142', 'C42', 'C109193142@nkust.edu.tw'),
(5, 'C109193144', 'C44', 'C109193144@nkust.edu.tw'),
(6, 'C109193110', 'C10', 'C109193110@nkust.edu.tw'),
(7, 'C109193113', 'C13', 'C109193113@nkust.edu.tw'),
(8, 'C109193114', 'C14', 'C109193114@nkust.edu.tw'),
(9, 'C109193115', 'C15', 'C109193115@nkust.edu.tw'),
(10, 'C109193116', 'C16', 'C109193116@nkust.edu.tw'),
(11, 'C109193117', 'C17', 'C109193117@nkust.edu.tw');

-- --------------------------------------------------------

--
-- 資料表結構 `bank`
--

CREATE TABLE `bank` (
  `user_id` int(11) NOT NULL,
  `account_name` varchar(25) NOT NULL,
  `amount` int(25) NOT NULL,
  `note` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `bank`
--

INSERT INTO `bank` (`user_id`, `account_name`, `amount`, `note`) VALUES
(84, '郵局', 8795, '緊急預備金'),
(86, '台企銀行', 6048, '微薄薪水'),
(90, 'Line Bank', 15000, '數位銀行'),
(91, '台灣銀行', 10000, '副業'),
(98, '元大銀行', 30000, '特別津貼'),
(96, '國泰KOKO', 1000, '開起來擺著。'),
(97, '台新銀行(richart)', 23000, '生活費用');

-- --------------------------------------------------------

--
-- 資料表結構 `cryptocurrency`
--

CREATE TABLE `cryptocurrency` (
  `cryptocurrency_id` int(11) NOT NULL,
  `cryptocurrency_name` varchar(25) NOT NULL,
  `price` decimal(38,2) NOT NULL,
  `amount` decimal(38,5) NOT NULL,
  `handlingFee` decimal(38,2) NOT NULL,
  `cost` decimal(38,2) NOT NULL,
  `TWD_cost` decimal(38,2) NOT NULL,
  `note` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `cryptocurrency`
--

INSERT INTO `cryptocurrency` (`cryptocurrency_id`, `cryptocurrency_name`, `price`, `amount`, `handlingFee`, `cost`, `TWD_cost`, `note`) VALUES
(97, 'ETH', '1073.25', '0.00190', '0.02', '2.06', '61.18', '以太幣（ETH)是以太坊(去中心化的開源的有智慧型合約功能的公共區塊鏈平台)的原生加密貨幣。'),
(98, 'BNB', '206.40', '10.00000', '20.64', '2084.64', '61936.44', '幣安交易平台的一種幣'),
(96, 'BTC', '20.00', '1.66000', '0.33', '33.53', '995.94', '狂跌的貨幣');

-- --------------------------------------------------------

--
-- 資料表結構 `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(20) NOT NULL,
  `stock_symbol` varchar(20) NOT NULL,
  `stock_name` varchar(25) NOT NULL,
  `price` decimal(38,2) NOT NULL,
  `amount` int(25) NOT NULL,
  `handlingFee` int(100) NOT NULL,
  `cost` decimal(38,2) NOT NULL,
  `note` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_symbol`, `stock_name`, `price`, `amount`, `handlingFee`, `cost`, `note`) VALUES
(100, '2208', '台船', '19.00', 1000, 20, '19020.00', '賺價差'),
(101, '2409', '友達', '23.45', 1000, 20, '23470.00', '衝動購買'),
(98, '3557', '嘉威', '75.40', 1000, 18, '75418.00', '民生用股'),
(97, '00881', '國泰台灣5G+', '16.43', 2000, 40, '32900.00', 'ETF'),
(96, '0050', '元大台灣50', '120.00', 1000, 20, '120020.00', '存股用');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`sn`);

--
-- 資料表索引 `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`user_id`);

--
-- 資料表索引 `cryptocurrency`
--
ALTER TABLE `cryptocurrency`
  ADD PRIMARY KEY (`cryptocurrency_id`);

--
-- 資料表索引 `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `account`
--
ALTER TABLE `account`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bank`
--
ALTER TABLE `bank`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `cryptocurrency`
--
ALTER TABLE `cryptocurrency`
  MODIFY `cryptocurrency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
