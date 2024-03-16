-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: my_bd
-- Время создания: Мар 16 2024 г., 04:48
-- Версия сервера: 8.2.0
-- Версия PHP: 8.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testDB`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Q1`
--

CREATE TABLE `Q1` (
  `id` int NOT NULL,
  `body` tinytext NOT NULL,
  `time` time DEFAULT NULL,
  `author` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `Q1`
--

INSERT INTO `Q1` (`id`, `body`, `time`, `author`) VALUES
(1, 'привет', '07:47:47', 'vlad'),
(2, 'салют', '07:48:05', 'max');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Q1`
--
ALTER TABLE `Q1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Q1`
--
ALTER TABLE `Q1`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
