-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: db_lessons
-- Время создания: Фев 13 2025 г., 14:02
-- Версия сервера: 8.0.40
-- Версия PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project_amopoint`
--

-- --------------------------------------------------------

--
-- Структура таблицы `info`
--

CREATE TABLE `info` (
  `id` int NOT NULL,
  `ip` text COLLATE utf8mb4_general_ci NOT NULL,
  `country` text COLLATE utf8mb4_general_ci,
  `city` text COLLATE utf8mb4_general_ci,
  `device` enum('mobile','tablet','pc','') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `info`
--

INSERT INTO `info` (`id`, `ip`, `country`, `city`, `device`, `date`) VALUES
(1, '10.0.5.2', 'Russia', 'Moscow', 'tablet', '2025-02-12 13:20:22'),
(2, '37.29.113.114', 'Russia', 'Moscow', 'pc', '2025-02-13 13:20:28'),
(3, '37.29.113.114', 'Russia', 'Moscow', 'pc', '2025-02-13 10:20:09'),
(4, '37.29.113.114', 'Russia', 'Moscow', 'pc', '2025-02-13 10:21:59'),
(5, '5.10.150.20', 'Russia', 'Belgorod', 'mobile', '2025-02-03 14:30:57'),
(6, '37.29.113.114', 'Russia', 'Moscow', 'pc', '2025-02-13 10:34:22'),
(7, '37.29.113.114', 'Russia', 'Moscow', 'pc', '2025-02-13 10:36:23'),
(8, '37.29.113.114', 'Russia', 'Moscow', 'pc', '2025-02-13 10:37:00'),
(9, '10.20.55.44', 'Russia', 'Moscow', 'pc', '2025-02-13 14:37:17'),
(12, '37.29.113.114', 'Russia', 'Moscow', 'pc', '2025-02-13 10:41:05'),
(13, '37.29.113.114', 'Russia', 'Moscow', 'pc', '2025-02-13 10:41:27'),
(14, '192.168.10.25', 'Russia', 'Moscow', 'pc', '2025-02-13 13:41:38'),
(15, '37.29.113.114', 'Russia', 'Moscow', 'pc', '2025-02-13 10:43:04'),
(16, '10.010.10.100', 'Russia', 'Moscow', 'pc', '2025-02-13 20:43:35'),
(17, '37.29.113.114', 'Russia', 'Moscow', 'pc', '2025-02-13 10:49:42'),
(20, '8.8.8.9', 'Russia', 'Moscow', 'pc', '2025-02-13 16:55:04'),
(28, '8.8.8.8', 'USA', 'New York', 'tablet', '2025-02-13 13:20:13'),
(46, '37.29.113.114', 'Russia', 'Moscow', 'pc', '2025-02-13 16:52:29'),
(47, '37.29.113.114', 'Russia', 'Moscow', 'pc', '2025-02-13 14:00:32'),
(48, '37.29.113.114', 'Russia', 'Moscow', 'pc', '2025-02-13 14:01:09'),
(49, '37.29.113.114', 'Russia', 'Moscow', 'pc', '2025-02-13 14:01:41'),
(50, '37.29.113.114', 'Russia', 'Moscow', 'pc', '2025-02-13 14:02:07');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `info`
--
ALTER TABLE `info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
