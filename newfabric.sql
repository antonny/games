-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 28 2013 г., 20:22
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
(25, 4, 1),
(25, 5, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `type`, `author_id`, `date_add`, `txt`, `state`) VALUES
(3, 8, 25, '2013-02-21 18:44:56', 'xfxfgxg', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `orders` text COLLATE utf8_unicode_ci NOT NULL,
  `date_order` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_userorder` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `orders`, `date_order`) VALUES
(13, 25, '<table><tr><td>f</td><td>2</td></tr><tr><td>Liens</td><td>1</td></tr><tr><td>New5</td><td>1</td></tr></table>', '2013-02-28 18:31:38');

-- --------------------------------------------------------

--
-- Структура таблицы `stat`
--

CREATE TABLE IF NOT EXISTS `stat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `action` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_action` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_useraction` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `stat`
--

INSERT INTO `stat` (`id`, `user_id`, `action`, `date_action`) VALUES
(14, 25, 'clear cart', '2013-02-28 19:05:35'),
(15, 26, 'clear cart', '2013-02-28 19:21:08');

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
  `verifyCode` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `salt`, `email`, `name`, `sname`, `fname`, `privs`, `photo`, `profile`, `confirm_password`, `verifyCode`) VALUES
(21, 'd', 'dd', 'd', 'ddd', 'dddddddd', 'ddddd', 'ddddddd', 1, 'dddddd', 'ddddddddddddd', '', ''),
(22, 'My', '6f6415de0d37ab4f0ed3261cefa08be3', '28b206548469ce62182048fd9cf91760', 's', 'name', 'f', 'f', 1, '3713990.jpg', '', '', ''),
(23, 'Anton', 'a1ffb4625240e67c2e9d699fae689f6d', '28b206548469ce62182048fd9cf91760', 's@j.net', 'a', 'a', 'a', 2, '7727051.jpg', '', '', ''),
(24, 'Anton', 'a1ffb4625240e67c2e9d699fae689f6d', '28b206548469ce62182048fd9cf91760', 'd@f.net', 'ant', 'ant', 'ant', 2, '62960816.jpg', '', '', ''),
(25, 'admin', '1c3dd8b850b055bb7b6fb0fb59a7cd04', '28b206548469ce62182048fd9cf91760', 'ivan@ivan.ru', 'ivan', 'n', 'n', 2, '7427979.jpg', '', '', ''),
(26, 'ant', 'a1ffb4625240e67c2e9d699fae689f6d', '28b206548469ce62182048fd9cf91760', 'q@f.net', 'q', 'q', 'q', 1, '15591431.jpg', '', 'mnb12345', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

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
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_userorder` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `stat`
--
ALTER TABLE `stat`
  ADD CONSTRAINT `FK_useraction` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tkan`
--
ALTER TABLE `tkan`
  ADD CONSTRAINT `FK_t` FOREIGN KEY (`tkantype`) REFERENCES `tkan_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
