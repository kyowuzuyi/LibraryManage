-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016 年 11 朁E01 日 06:52
-- サーバのバージョン： 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `class` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `publish` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pubdate` date NOT NULL,
  `ISBN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `book`
--

INSERT INTO `book` (`id`, `class`, `title`, `author`, `publish`, `pubdate`, `ISBN`, `amount`) VALUES
(1, 'book', 'Bloodborne Official Artworks', '電撃攻略本編集部 ', 'KADOKAWA/アスキー・メディアワークス', '2016-02-16', '9784048657983', 1),
(2, 'book', 'ダンガンロンパ霧切 1', '北山 猛邦  (著), 小松崎 類 (イラスト)', '講談社', '2013-09-13', '9784061388758', 0),
(3, 'book', 'ダンガンロンパ/ゼロ(上)', '小高 和剛  (著), 小松崎 類 (イラスト)', '講談社', '2011-09-16', '9784061388123', 1),
(4, 'book', 'NEW GAME! (1)', '得能正太郎', '芳文社', '2014-02-27', '9784832244146', 1),
(5, 'book', '化物語(上) ', '西尾 維新  (著), VOFAN (イラスト)', '講談社', '2006-11-01', '9784062836029', 1),
(8, 'game', 'Metal Gear Solid V', '', 'コナミデジタルエンタテインメント konimi', '2015-09-02', '', 1),
(9, 'anime', '魔法少女リリカルなのはViVid Blu-ray BOX ', '', 'A-1 Pictures', '2016-11-23', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
