-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 20 2019 г., 20:40
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `intervolga`
--

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id_country` int(10) UNSIGNED NOT NULL COMMENT 'Первичный ключ',
  `name_country` varchar(255) NOT NULL COMMENT 'Название страны',
  `name_capital` varchar(255) NOT NULL COMMENT 'Название столицы',
  `population` int(16) UNSIGNED NOT NULL COMMENT 'Численность населения'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Страны' ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id_country`, `name_country`, `name_capital`, `population`) VALUES
(1, 'Россия', 'Москва', 146900000),
(2, 'Китай', 'Пекин', 1380083000),
(3, 'Германия', 'Берлин', 83299031),
(7, 'Украина', 'Киев', 42386403),
(8, 'Аргентина', 'Буэнос-Айрес', 45018326),
(9, 'Ватикан', 'Ватикан', 1000),
(10, 'Великобритания', 'Лондон', 66182374),
(11, 'Греция', 'Афины', 10799432),
(12, 'Индия', 'Нью-Дели', 1370988359);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id_country`),
  ADD UNIQUE KEY `name_country` (`name_country`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id_country` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Первичный ключ', AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
