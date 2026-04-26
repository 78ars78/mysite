-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: mysql
-- Время создания: Июн 21 2024 г., 13:27
-- Версия сервера: 8.0.29
-- Версия PHP: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `webdevkin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id` int UNSIGNED NOT NULL,
  `brand` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=2730 DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id`, `brand`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Acer'),
(4, 'Lenovo'),
(5, 'Asus'),
(6, 'Gigabyte');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=5461 DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'nou'),
(2, 'sma'),
(3, 'vid');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `dt_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AVG_ROW_LENGTH=2730 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `details`
--

CREATE TABLE `details` (
  `order_id` int NOT NULL,
  `good_id` int NOT NULL,
  `good` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `count` int NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=3276 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int UNSIGNED NOT NULL,
  `good` varchar(255) NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `brand_id` int UNSIGNED NOT NULL,
  `price` int UNSIGNED NOT NULL,
  `rating` int UNSIGNED NOT NULL DEFAULT '0',
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=1170 DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `good`, `category_id`, `brand_id`, `price`, `rating`, `photo`) VALUES
(1, '', 1, 1, 60000, 8, 'apple_macbook_air.jpg'),
(2, '', 1, 1, 70000, 9, 'apple_macbook_pro.jpg'),
(3, '', 1, 4, 17000, 5, 'lenovo_idea_pad.jpg'),
(4, '', 1, 4, 16000, 7, 'lenovo_g5030.jpg'),
(5, '', 1, 3, 21000, 8, 'acer_aspire.jpg'),
(6, '', 2, 2, 30000, 9, 'samsung_galaxy_a7.jpg'),
(7, '', 2, 2, 17000, 8, 'samsung_galaxy_a5.jpg'),
(8, '', 2, 1, 38000, 10, 'apple_iphone_se.jpg'),
(9, '', 2, 5, 12000, 6, 'asus_zenfone_laser.jpg'),
(10, '', 2, 4, 11000, 3, 'lenovo_a5000.jpg'),
(11, '', 2, 4, 16000, 5, 'lenovo_p90.jpg'),
(12, '', 3, 5, 2000, 8, 'asus_video.jpg'),
(13, '', 3, 6, 6000, 9, 'gigabyte_video_gt740.jpg'),
(14, '', 3, 6, 14000, 10, 'gigabyte_video_gtx960.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `goods_props`
--

CREATE TABLE `goods_props` (
  `id` int UNSIGNED NOT NULL,
  `good_id` int UNSIGNED NOT NULL,
  `prop` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=1170 DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `goods_props`
--

INSERT INTO `goods_props` (`id`, `good_id`, `prop`, `value`) VALUES
(1, 1, '', 'Intel Core i5'),
(2, 1, '', '4 '),
(3, 1, '', '13 '),
(4, 2, '', 'Intel Core i7'),
(6, 2, '', '13 '),
(7, 3, '', '14 '),
(8, 4, '', 'Intel Pentium 4'),
(9, 5, '', 'Intel Core i7'),
(10, 5, '', ''),
(11, 6, '', '5 '),
(12, 6, 'GPS', ''),
(13, 7, '', '4 '),
(14, 7, 'GPS', ''),
(15, 8, '', '4 ');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `client_id` int UNSIGNED NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `dt_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AVG_ROW_LENGTH=2730 DEFAULT CHARSET=utf8mb3;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`order_id`,`good_id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_goods_brands_id` (`brand_id`),
  ADD KEY `FK_goods_categories_id` (`category_id`);

--
-- Индексы таблицы `goods_props`
--
ALTER TABLE `goods_props`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `goods_props`
--
ALTER TABLE `goods_props`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `FK_goods_brands_id` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_goods_categories_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
