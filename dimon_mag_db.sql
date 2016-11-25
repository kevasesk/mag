-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 25 2016 г., 16:51
-- Версия сервера: 5.6.29
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dimon_mag_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `parent` int(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `parent`) VALUES
(0, '(no category)', 'parent', 0),
(1, 'iPhones', 'iphones', 0),
(2, 'Macbooks', 'macbooks', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `manufacturers`
--

CREATE TABLE IF NOT EXISTS `manufacturers` (
  `id` int(11) NOT NULL,
  `manufacturers_title` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `manufacturers_title`) VALUES
(0, 'Apple'),
(1, 'Nokia'),
(2, 'Microsoft'),
(3, 'Google'),
(4, 'Meizu'),
(5, 'Asus');

-- --------------------------------------------------------

--
-- Структура таблицы `meta_products`
--

CREATE TABLE IF NOT EXISTS `meta_products` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `meta_key` varchar(200) NOT NULL,
  `meta_value` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `meta_products`
--

INSERT INTO `meta_products` (`id`, `id_product`, `meta_key`, `meta_value`) VALUES
(1, 7, 'image', 'img1.jpg'),
(2, 2, 'color', 'red'),
(3, 13, 'qqqqqqq', 'wwwwww'),
(4, 13, 'eeeee', 'rrrr'),
(5, 14, 'single_key', 'single_value'),
(8, 13, '_image', 'Hydrangeas.jpg'),
(10, 1, '_image', 'Tulips.jpg'),
(11, 48, '_image', 'Koala.jpg'),
(12, 2, '_image', 'Penguins.jpg'),
(13, 49, 'цвет', 'крастный'),
(14, 49, '_image', 'Jellyfish.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `surname`, `email`, `telephone`, `adress`, `date`) VALUES
(9, 'aaa', 'aaa', '1', '1', '1', '2016-11-24'),
(10, 'aaa', 'aaa', '1', '1', '1', '2016-11-24'),
(11, 'aaa', 'aaa', '1', '1', '1', '2016-11-24'),
(12, 'aaa', 'aaa', '1', '1', '1', '2016-11-24'),
(13, 'aaa', 'aaa', '1', '1', '1', '2016-11-24'),
(14, 'aaa', 'aaa', '1', '1', '1', '2016-11-24'),
(15, 'aaa', 'aaa', '1', '1', '1', '2016-11-24'),
(16, 'aaa', 'aaa', '1', '1', '1', '2016-11-24'),
(17, 'opa', 'opa', '1', '1', '1', '2016-11-24'),
(18, '12323', '12323', '1', '1', '1', '2016-11-24'),
(19, 'jeka', 'jeka', '1', '1', '1', '2016-11-24');

-- --------------------------------------------------------

--
-- Структура таблицы `orders_products`
--

CREATE TABLE IF NOT EXISTS `orders_products` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders_products`
--

INSERT INTO `orders_products` (`id`, `id_product`, `id_order`, `count`) VALUES
(29, 1, 17, 3),
(30, 2, 17, 4),
(31, 13, 17, 2),
(32, 48, 17, 1),
(33, 2, 18, 1),
(34, 1, 19, 1),
(35, 2, 19, 1),
(36, 13, 19, 1),
(37, 48, 19, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Products`
--

CREATE TABLE IF NOT EXISTS `Products` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `cost` varchar(50) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_manufacturers` int(11) NOT NULL,
  `in_slider` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Products`
--

INSERT INTO `Products` (`id`, `title`, `cost`, `id_category`, `id_manufacturers`, `in_slider`) VALUES
(1, 'iphone 7', '10000', 0, 0, 1),
(2, 'title', 'cost', 1, 1, 1),
(13, 'lol', '345345', 2, 0, 0),
(48, 'some', '1111', 0, 0, 1),
(49, 'new product1', '5674', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `settings_title` varchar(255) NOT NULL,
  `settings_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authKey` varchar(255) NOT NULL,
  `accessToken` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `authKey`, `accessToken`) VALUES
(1, 'admin', '123', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `meta_products`
--
ALTER TABLE `meta_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `meta_products`
--
ALTER TABLE `meta_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT для таблицы `Products`
--
ALTER TABLE `Products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
