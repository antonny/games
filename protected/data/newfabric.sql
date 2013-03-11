-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 19 2013 г., 20:47
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `newfabric`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(7) NOT NULL,
  `tkan_id` int(5) NOT NULL,
  `amount` int(4) NOT NULL,
  PRIMARY KEY (`id`,`tkan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `tkan_id`, `amount`) VALUES
(7, 4, 1),
(25, 4, 8),
(25, 5, 7),
(25, 6, 15),
(25, 7, 1),
(25, 8, 67);

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(5) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `date_add` datetime NOT NULL,
  `txt` text COLLATE utf8_unicode_ci,
  `state` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_fabriccomment` (`type`),
  KEY `FK_authorcomment` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `type`, `author_id`, `date_add`, `txt`, `state`) VALUES
(1, 8, 25, '2013-02-19 20:34:17', 'gjhghj', 1),
(2, 8, 25, '2013-02-19 20:45:26', 'jkjkj', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `sname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `privs` int(3) NOT NULL DEFAULT '1',
  `photo` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `profile` text COLLATE utf8_unicode_ci NOT NULL,
  `confirm_password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Дамп данных таблицы `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `salt`, `email`, `name`, `sname`, `fname`, `privs`, `photo`, `profile`, `confirm_password`) VALUES
(21, 'd', 'dd', 'd', 'ddd', 'dddddddd', 'ddddd', 'ddddddd', 1, 'dddddd', 'ddddddddddddd', ''),
(22, 'My', '6f6415de0d37ab4f0ed3261cefa08be3', '28b206548469ce62182048fd9cf91760', 's', 'name', 'f', 'f', 1, '3713990.jpg', '', ''),
(23, 'Anton', 'a1ffb4625240e67c2e9d699fae689f6d', '28b206548469ce62182048fd9cf91760', 's@j.net', 'a', 'a', 'a', 2, '7727051.jpg', '', ''),
(24, 'Anton', 'a1ffb4625240e67c2e9d699fae689f6d', '28b206548469ce62182048fd9cf91760', 'd@f.net', 'ant', 'ant', 'ant', 2, '62960816.jpg', '', ''),
(25, 'admin', '1c3dd8b850b055bb7b6fb0fb59a7cd04', '28b206548469ce62182048fd9cf91760', 'ivan@ivan.ru', 'ivan', 'n', 'n', 2, '7427979.jpg', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `tkan`
--

CREATE TABLE IF NOT EXISTS `tkan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(5,2) NOT NULL,
  `width` float(4,2) NOT NULL,
  `length` float(4,2) NOT NULL,
  `tkantype` int(11) NOT NULL,
  `img` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `info` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_t` (`tkantype`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `tkan`
--

INSERT INTO `tkan` (`id`, `name`, `color`, `price`, `width`, `length`, `tkantype`, `img`, `info`) VALUES
(4, 'new1', '', 8.00, 2.00, 4.00, 1, '81729126.jpg', ''),
(5, 'f', '', 45.00, 6.00, 6.00, 2, '91729737.jpg', ''),
(6, 'New3', '', 34.00, 2.00, 4.00, 2, '80523682.jpg', ''),
(7, 'Liens', '', 22.00, 4.00, 5.00, 2, '23553467.jpg', ''),
(8, 'New5', '', 7.00, 5.00, 1.00, 2, '38369751.jpg', '');

-- --------------------------------------------------------

--
-- Структура таблицы `tkan_type`
--

CREATE TABLE IF NOT EXISTS `tkan_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `tkan_type`
--

INSERT INTO `tkan_type` (`id`, `name`) VALUES
(1, 'cotton'),
(2, 'linen'),
(3, 'hemp');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_authorcomment` FOREIGN KEY (`author_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_fabriccomment` FOREIGN KEY (`type`) REFERENCES `tkan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tkan`
--
ALTER TABLE `tkan`
  ADD CONSTRAINT `FK_t` FOREIGN KEY (`tkantype`) REFERENCES `tkan_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
