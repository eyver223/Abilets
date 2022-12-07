-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 07 2022 г., 11:24
-- Версия сервера: 5.6.51
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `AviaBD`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Bilets`
--

CREATE TABLE `Bilets` (
  `Bilets_id` int(11) NOT NULL,
  `Title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cost` decimal(10,2) NOT NULL,
  `CountryCityFrom_id` int(11) NOT NULL,
  `CountryCityWhere_id` int(11) NOT NULL,
  `DepartureDateTime` datetime NOT NULL,
  `travel_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Bilets`
--

INSERT INTO `Bilets` (`Bilets_id`, `Title`, `Cost`, `CountryCityFrom_id`, `CountryCityWhere_id`, `DepartureDateTime`, `travel_time`) VALUES
(1, 'Utair', '2685.00', 2, 1, '2022-11-30 13:18:00', '02:00:00'),
(2, 'Победа', '14690.00', 2, 3, '2022-12-03 09:20:00', '10:00:00'),
(3, 'SCAT', '10299.00', 3, 1, '2022-12-14 13:19:00', '12:00:00'),
(4, 'Москва-Алматы', '10599.00', 1, 3, '2022-10-30 17:47:39', '05:55:00');

-- --------------------------------------------------------

--
-- Структура таблицы `Country`
--

CREATE TABLE `Country` (
  `CountryID` int(11) NOT NULL,
  `CountryCity_id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Country`
--

INSERT INTO `Country` (`CountryID`, `CountryCity_id`, `Name`) VALUES
(1, 1, 'Россия'),
(2, 2, 'Россия'),
(3, 3, 'Казахстан');

-- --------------------------------------------------------

--
-- Структура таблицы `CountryCity`
--

CREATE TABLE `CountryCity` (
  `CountryCity_id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `CountryCity`
--

INSERT INTO `CountryCity` (`CountryCity_id`, `Name`) VALUES
(1, 'Москва'),
(2, 'Уфа'),
(3, 'Алматы');

-- --------------------------------------------------------

--
-- Структура таблицы `Orders`
--

CREATE TABLE `Orders` (
  `OrderId` int(11) NOT NULL,
  `email_u` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bilets_id` int(11) NOT NULL,
  `DateOrder` date NOT NULL,
  `baggage` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Orders`
--

INSERT INTO `Orders` (`OrderId`, `email_u`, `Bilets_id`, `DateOrder`, `baggage`) VALUES
(13, 'erert@we', 3, '2012-05-22', 'no'),
(14, 'guest@yandex.ru', 3, '2012-05-22', 'no');

-- --------------------------------------------------------

--
-- Структура таблицы `Role`
--

CREATE TABLE `Role` (
  `Role_id` int(11) NOT NULL,
  `Role_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Role`
--

INSERT INTO `Role` (`Role_id`, `Role_Name`) VALUES
(1, 'Администратор'),
(2, 'менеджер'),
(3, 'клиент'),
(4, 'гость');

-- --------------------------------------------------------

--
-- Структура таблицы `User`
--

CREATE TABLE `User` (
  `User_Id` int(11) NOT NULL,
  `Role_id` int(11) NOT NULL,
  `Surname` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `User`
--

INSERT INTO `User` (`User_Id`, `Role_id`, `Surname`, `Name`, `login`, `password`, `email`) VALUES
(1, 1, 'Шанев', 'Артур', 'admin', 'admin', 'shan.arty@yandex.ru'),
(2, 3, 'иванов', 'Максим', 'guest', 'guest', 'guest@yandex.ru'),
(3, 2, 'петров', 'Иван', 'man', 'man', 'man@mail.com'),
(6, 3, 'смирнов', 'Алексей', 'andreykoloban', '123', 'andreykoloban@yandex.ru'),
(35, 4, 'укеук', ' укеуке', NULL, NULL, 'erert@we');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Bilets`
--
ALTER TABLE `Bilets`
  ADD PRIMARY KEY (`Bilets_id`),
  ADD KEY `Bilets_id` (`Bilets_id`),
  ADD KEY `CountryCityWhere_id` (`CountryCityWhere_id`),
  ADD KEY `bilets_ibfk_1` (`CountryCityFrom_id`);

--
-- Индексы таблицы `Country`
--
ALTER TABLE `Country`
  ADD PRIMARY KEY (`CountryID`),
  ADD KEY `CountryCity_id` (`CountryCity_id`);

--
-- Индексы таблицы `CountryCity`
--
ALTER TABLE `CountryCity`
  ADD PRIMARY KEY (`CountryCity_id`),
  ADD KEY `CountryCity_id` (`CountryCity_id`);

--
-- Индексы таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `Bilets_id` (`Bilets_id`),
  ADD KEY `email_u` (`email_u`) USING BTREE;

--
-- Индексы таблицы `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`Role_id`),
  ADD KEY `Role_id` (`Role_id`);

--
-- Индексы таблицы `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`User_Id`),
  ADD KEY `Role_id` (`Role_id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Bilets`
--
ALTER TABLE `Bilets`
  MODIFY `Bilets_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `Country`
--
ALTER TABLE `Country`
  MODIFY `CountryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `CountryCity`
--
ALTER TABLE `CountryCity`
  MODIFY `CountryCity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `Orders`
--
ALTER TABLE `Orders`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `Role`
--
ALTER TABLE `Role`
  MODIFY `Role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Bilets`
--
ALTER TABLE `Bilets`
  ADD CONSTRAINT `bilets_ibfk_1` FOREIGN KEY (`CountryCityFrom_id`) REFERENCES `CountryCity` (`CountryCity_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bilets_ibfk_2` FOREIGN KEY (`CountryCityWhere_id`) REFERENCES `CountryCity` (`CountryCity_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `CountryCity`
--
ALTER TABLE `CountryCity`
  ADD CONSTRAINT `countrycity_ibfk_1` FOREIGN KEY (`CountryCity_id`) REFERENCES `Country` (`CountryCity_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `bilet` FOREIGN KEY (`Bilets_id`) REFERENCES `Bilets` (`Bilets_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_email` FOREIGN KEY (`email_u`) REFERENCES `User` (`email`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
