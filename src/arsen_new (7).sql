-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: mysql
-- Время создания: Окт 03 2024 г., 18:43
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
-- База данных: `arsen_new`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auto`
--

CREATE TABLE `auto` (
  `shoes` int NOT NULL,
  `text` int NOT NULL,
  `фирма` int NOT NULL,
  `id` int NOT NULL,
  `j` int DEFAULT NULL,
  `l` int DEFAULT NULL,
  `itog_0` varchar(250) DEFAULT NULL,
  `itog` varchar(250) DEFAULT NULL,
  `marka` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `auto`
--

INSERT INTO `auto` (`shoes`, `text`, `фирма`, `id`, `j`, `l`, `itog_0`, `itog`, `marka`, `model`) VALUES
(0, 0, 1, 5, 1, 1, '1920_1080/saab_9-5_aero_sedan_30_0.jpeg', '1920_1080/saab_9-5_aero_sedan_30_auto.jpeg', 'saab', '9-5'),
(0, 0, 1, 8, 1, 3, '1920_1080/autowp_ru_hennessey_nissan_gt-r_godzilla_700_3_0.jpg', '1920_1080/autowp_ru_hennessey_nissan_gt-r_godzilla_700_3_auto.jpg', 'nissan', 'gt-r'),
(0, 0, 2, 17, 2, 1, '1920_1080/autowp_ru_jaguar_xkr_coupe_15_0.jpg', '1920_1080/autowp_ru_jaguar_xkr_coupe_15_auto.jpg', 'ferrari', 'xkr'),
(0, 0, 1, 11, 2, 1, '1920_1080/autowp_ru_bentley_azure_35_0.jpg', '1920_1080/autowp_ru_bentley_azure_35_auto.jpg', 'bentley', 'azure'),
(0, 0, 2, 12, 3, 1, '1920_1080/autowp_ru_maserati_granturismo_s_18_0.jpg', '1920_1080/autowp_ru_maserati_granturismo_s_18_auto.jpg', 'maserati', 'granturismo'),
(0, 0, 4, 19, 3, 2, '1920_1080/1920_hummer_0.jpg', '1920_1080/1920_hummer_auto.jpg', 'hummer', 'h2'),
(0, 0, 3, 18, 1, 2, '1280_1024/1920_hummer_0.jpg', '1280_1024/1920_hummer_auto.jpg', 'hummer', 'h2');

-- --------------------------------------------------------

--
-- Структура таблицы `auto_razr`
--

CREATE TABLE `auto_razr` (
  `id` int NOT NULL,
  `razr` varchar(50) NOT NULL,
  `j` int DEFAULT NULL,
  `l` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `auto_razr`
--

INSERT INTO `auto_razr` (`id`, `razr`, `j`, `l`) VALUES
(1, '1920x1080 (FULL-HD)', 1, '1'),
(2, '1366x768', 2, '1'),
(3, '1280x720 (HD)', 1, '3'),
(4, 'Настольный ПК', 0, '0'),
(5, 'Ноутбук', 0, '0'),
(6, 'Смартфон', 0, '0'),
(8, '1280x1024', 1, '2'),
(9, '1080x1920', 3, '1'),
(10, '1080x2160', 3, '2');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `parent` int UNSIGNED NOT NULL,
  `sort` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent`, `sort`) VALUES
(1, 'Автомобили', 0, 1),
(2, 'Мотоциклы', 0, 2),
(3, 'Мазда', 1, 1),
(4, 'Хонда', 1, 2),
(5, 'Кавасаки', 2, 2),
(6, 'Харлей', 2, 1),
(7, 'Мазда 3', 3, 2),
(8, 'Мазда 6', 3, 1),
(9, 'Седан', 7, 2),
(10, 'Хечбэк', 7, 1),
(11, 'Лодки', 0, 3),
(12, 'Лифтбэк', 8, 2),
(13, 'Кроссовер', 8, 1),
(14, 'Белый', 13, 1),
(15, 'Красный', 13, 2),
(16, 'Черный', 13, 3),
(17, 'Зеленый', 13, 4),
(18, 'Мазда CX', 3, 3),
(19, 'Мазда MX', 3, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `moto`
--

CREATE TABLE `moto` (
  `id` int NOT NULL,
  `price` int NOT NULL,
  `marka` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `brightness` varchar(50) CHARACTER SET cp1251 COLLATE cp1251_general_ci DEFAULT NULL,
  `img` varchar(50) NOT NULL,
  `img_0` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `moto`
--

INSERT INTO `moto` (`id`, `price`, `marka`, `name`, `model`, `color`, `brightness`, `img`, `img_0`) VALUES
(3, 1000, 'ferrari', 'fer1', '1', 'red', 'bright', 'ferrari_red', ''),
(2, 2000, 'ferrari', 'fer2', '2', 'yellow', 'bright', 'ferrari_yellow', ''),
(1, 6222, 'ferrari', 'fer3', '3', 'black', 'dark', 'ferrari_black', ''),
(4, 3245, 'ferrari', 'fer4', '4', 'gray', 'bright', 'ferrari_gray', ''),
(5, 23422, 'bentley', 'ben3', '1', 'red', 'bright', 'bentley_red', ''),
(6, 2345, 'bentley', 'ben2', '2', 'black', 'dark', 'bentley_black', ''),
(7, 3456, 'bentley', 'ben1', '3', 'gray', 'bright', 'bentley_gray', ''),
(8, 2356, 'bentley', 'ben4', '4', 'yellow', 'bright', 'bentley_yellow', ''),
(9, 3563, 'lambo', 'lam3', '1', 'red', 'bright', 'lambo_red', ''),
(10, 3456, 'lambo', 'lam2', '2', 'yellow', 'bright', 'lambo_yellow', ''),
(11, 8333, 'lambo', 'lam1', '3', 'gray', 'bright', 'lambo_gray', ''),
(12, 23444, 'lambo', 'lam4', '4', 'black', 'dark', 'lambo_black', ''),
(14, 1000, 'ferrari', 'fer1', '1', 'red', 'bright', 'ferrari_red', '');

-- --------------------------------------------------------

--
-- Структура таблицы `moto_razr`
--

CREATE TABLE `moto_razr` (
  `id` int NOT NULL,
  `name` varchar(30) CHARACTER SET cp1251 COLLATE cp1251_general_ci NOT NULL,
  `attr` varchar(30) NOT NULL,
  `nazv` varchar(30) CHARACTER SET cp1251 COLLATE cp1251_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `moto_razr`
--

INSERT INTO `moto_razr` (`id`, `name`, `attr`, `nazv`) VALUES
(1, 'Феррари', 'marka', 'ferrari'),
(2, 'Бентли', 'marka', 'bentley'),
(3, 'Ламборгини', 'marka', 'lambo'),
(7, 'Красный', 'color', 'red'),
(8, 'Черный', 'color', 'black'),
(9, 'Серый', 'color', 'gray'),
(10, 'Желтый', 'color', 'yellow'),
(12, 'bright', 'brightness', ''),
(13, 'dark', 'brightness', '');

-- --------------------------------------------------------

--
-- Структура таблицы `music`
--

CREATE TABLE `music` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `parent` int UNSIGNED DEFAULT NULL,
  `sort` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `music`
--

INSERT INTO `music` (`id`, `title`, `parent`, `sort`) VALUES
(1, 'Уитни Хьюстон', 0, 1),
(2, 'Абба', 0, 2),
(3, 'Битлз', 0, 3),
(4, 'Рок\'н\'ролл', 0, 4),
(6, 'Мульт1', 1, 1),
(7, 'Мульт11', 1, 2),
(8, 'Мульт2', 2, 1),
(9, 'МULT22', 8, 1),
(10, 'Мульт111', 7, 1),
(11, 'Мульт222', 8, 2),
(12, 'Мульт3', 3, 1),
(13, 'Мульт33', 3, 2),
(14, 'Мульт4', 4, 1),
(15, 'Мульт1111', 6, 1),
(16, 'Мульт2222', 8, 3),
(18, 'Мульт44', 14, 1),
(19, 'Мульт444', 14, 2),
(20, 'Мульт4444', 14, 3),
(21, 'Мульт44444', 14, 6),
(22, 'Мульт444444', 14, 0),
(25, 'Мульт11111111', 6, 3),
(26, 'Мульт1111111', 6, 2),
(27, 'Мульт333', 12, 1),
(28, 'Мульт3333', 27, 1),
(29, 'Мульт111111111', 7, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `music_songs`
--

CREATE TABLE `music_songs` (
  `id` int NOT NULL,
  `song` varchar(50) NOT NULL,
  `label` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `music_songs`
--

INSERT INTO `music_songs` (`id`, `song`, `label`) VALUES
(1, 'уитни15', 15),
(3, 'уитни26', 26),
(5, 'уитни26_0', 26),
(6, 'уитни25', 25);

-- --------------------------------------------------------

--
-- Структура таблицы `userlist`
--

CREATE TABLE `userlist` (
  `id` int NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `userlist`
--

INSERT INTO `userlist` (`id`, `user`, `pass`) VALUES
(1, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `vmenu`
--

CREATE TABLE `vmenu` (
  `id` int NOT NULL,
  `menu` varchar(50) NOT NULL,
  `parent` int NOT NULL,
  `sort` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `vmenu`
--

INSERT INTO `vmenu` (`id`, `menu`, `parent`, `sort`) VALUES
(1, 'Меню1', 1, 1),
(2, 'Меню2', 1, 2),
(3, 'Меню3', 1, 3),
(4, 'Меню4', 1, 4),
(5, 'Меню5', 1, 5),
(6, 'Меню6', 2, 1),
(7, 'Меню7', 2, 2),
(8, 'Меню8', 2, 3),
(9, 'Меню9', 2, 4),
(10, 'Меню10', 2, 5),
(11, 'Меню11', 3, 1),
(12, 'Меню12', 3, 2),
(13, 'Меню13', 3, 3),
(14, 'Меню14', 3, 4),
(15, 'Меню15', 3, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `auto_razr`
--
ALTER TABLE `auto_razr`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `moto`
--
ALTER TABLE `moto`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `moto_razr`
--
ALTER TABLE `moto_razr`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `music_songs`
--
ALTER TABLE `music_songs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vmenu`
--
ALTER TABLE `vmenu`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `vmenu` ADD FULLTEXT KEY `menu` (`menu`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auto`
--
ALTER TABLE `auto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `auto_razr`
--
ALTER TABLE `auto_razr`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `moto`
--
ALTER TABLE `moto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `moto_razr`
--
ALTER TABLE `moto_razr`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `music`
--
ALTER TABLE `music`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=906;

--
-- AUTO_INCREMENT для таблицы `music_songs`
--
ALTER TABLE `music_songs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `userlist`
--
ALTER TABLE `userlist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `vmenu`
--
ALTER TABLE `vmenu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
