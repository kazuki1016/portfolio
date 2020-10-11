-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql
-- 生成日時: 2020 年 10 月 02 日 14:08
-- サーバのバージョン： 5.7.31
-- PHP のバージョン: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `sample`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `citys`
--

CREATE TABLE `citys` (
  `city_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `citys`
--

INSERT INTO `citys` (`city_id`, `area_id`, `city_name`) VALUES
(1, 1, '熱海市'),
(2, 1, '伊豆市'),
(3, 1, '伊東市'),
(4, 1, '河津町'),
(5, 1, '御殿場市'),
(6, 1, '沼津市'),
(7, 1, '富士市'),
(8, 1, '富士宮市'),
(9, 1, '三島市'),
(10, 1, 'その他市町村'),
(11, 2, '川根本町'),
(12, 2, '静岡市'),
(13, 2, '島田市'),
(14, 2, '藤枝市'),
(15, 2, '焼津市'),
(16, 2, '吉田町'),
(17, 3, '磐田市'),
(18, 3, '御前崎市'),
(19, 3, '掛川市'),
(20, 3, '菊川町'),
(21, 3, '湖西市'),
(22, 3, '浜松市'),
(23, 3, '袋井市'),
(24, 3, '森町');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `citys`
--
ALTER TABLE `citys`
  ADD PRIMARY KEY (`city_id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `citys`
--
ALTER TABLE `citys`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
