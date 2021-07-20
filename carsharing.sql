-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июл 21 2021 г., 02:00
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `carsharing`
--

-- --------------------------------------------------------

--
-- Структура таблицы `access`
--

CREATE TABLE `access` (
  `id_access` int NOT NULL,
  `login` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `access`
--

INSERT INTO `access` (`id_access`, `login`, `password`, `access`) VALUES
(1, 'admin', 'admin1', 'admin'),
(2, 'user', 'user1', 'user'),
(3, 'guest', 'guest1', 'guest');

-- --------------------------------------------------------

--
-- Структура таблицы `carbrand`
--

CREATE TABLE `carbrand` (
  `id_brand` int NOT NULL,
  `brand` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `carbrand`
--

INSERT INTO `carbrand` (`id_brand`, `brand`) VALUES
(1, 'Nissan'),
(2, 'BMW'),
(3, 'Renault'),
(4, 'Volkswagen'),
(5, 'АвтоВАЗ'),
(6, 'Peugeot'),
(7, 'Mercedes-Benz'),
(8, 'Daewoo'),
(9, 'Skoda'),
(10, 'Toyota'),
(11, 'Mitsubishi'),
(12, 'Acura'),
(13, 'Honda'),
(14, 'FIAT'),
(15, 'Infiniti'),
(16, 'Lexus'),
(17, 'Haval'),
(18, 'УАЗ'),
(19, 'ГАЗ'),
(20, 'Citroen');

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id_car` int NOT NULL,
  `id_brand` int NOT NULL,
  `name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plate` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id_car`, `id_brand`, `name`, `plate`) VALUES
(1, 2, 'E36', 'А543ОА32'),
(2, 20, 'C4', 'В403ОР32'),
(3, 8, 'Nexia', 'А882КН77'),
(4, 14, 'Linea', 'К213ОП40'),
(5, 13, 'NSX', 'А001МР32'),
(6, 12, 'TLX', 'К211ФС32'),
(7, 16, 'LS 500', 'К001АМ32'),
(8, 7, 'W211', 'А228СС11'),
(9, 11, 'Galant', 'А454ФМ750'),
(10, 6, '607', 'В607ОР40'),
(11, 3, 'Fluence', 'Л928ДА77'),
(12, 9, 'Rapid', 'У331КУ32'),
(13, 10, 'Crown', 'Х839ВН777'),
(14, 4, 'Juke', 'П210УК77'),
(15, 19, '3102', 'А112УК32'),
(16, 18, '469', 'К002ЭМ111'),
(17, 5, '2107', 'У521ОТ99');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `client_id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` float(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`client_id`, `name`, `discount`) VALUES
(1, 'Петров А.А.', 1.50),
(2, 'Анисов П.К.', 1.00),
(3, 'Карлов А.К', 2.30),
(4, 'Кузин В.С.', 3.10),
(5, 'Бунин Б.С.', 5.07),
(6, 'Лермонтов М.Ю.', 7.55);

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
  `id_job` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `zp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `jobs`
--

INSERT INTO `jobs` (`id_job`, `name`, `zp`) VALUES
(1, 'Механик', 27000),
(2, 'Старший механик', 35000),
(3, 'Менеджер', 40000),
(4, 'Директор', 100000),
(5, 'Сотрудник колл-центра', 30000),
(6, 'Системный администратор', 70000),
(7, 'Бухгалтер', 70000),
(8, 'Уборщик', 15000);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int NOT NULL,
  `id_client` int DEFAULT NULL,
  `id_car` int DEFAULT NULL,
  `id_tariff` int DEFAULT NULL,
  `begintime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `mileage` int NOT NULL,
  `fuelleft` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `id_client`, `id_car`, `id_tariff`, `begintime`, `endtime`, `mileage`, `fuelleft`) VALUES
(1, 6, 13, 3, '2021-07-13 23:52:34', '2021-07-22 23:52:34', 100, 20),
(2, 3, 15, 2, '2021-07-23 01:58:13', '2021-07-23 04:58:13', 50, 40),
(3, 6, 7, 3, '2021-07-08 11:59:53', '2021-07-07 14:59:53', 350, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `personal`
--

CREATE TABLE `personal` (
  `id_personal` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_job` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `personal`
--

INSERT INTO `personal` (`id_personal`, `name`, `id_job`) VALUES
(1, 'Задворнов Е.М', 2),
(2, 'Никишин А.В.', 1),
(3, 'Иванов П.П', 6),
(4, 'Цыгановский Д.М.', 7),
(5, 'Пономаренко А.А.', 5),
(6, 'Гнатюк Д.Д.', 8),
(7, 'Потапов А.А', 5),
(8, 'Ушаков Д.М.', 4),
(9, 'Телешко Д.Т.', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `tariff`
--

CREATE TABLE `tariff` (
  `id_tariff` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tariff`
--

INSERT INTO `tariff` (`id_tariff`, `name`, `price`) VALUES
(1, 'Городской', 1),
(2, 'Городской +', 2),
(3, 'VIP', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id_access`);

--
-- Индексы таблицы `carbrand`
--
ALTER TABLE `carbrand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id_car`),
  ADD KEY `id_brand` (`id_brand`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id_job`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_client` (`id_client`,`id_car`,`id_tariff`),
  ADD KEY `id_car` (`id_car`),
  ADD KEY `id_tariff` (`id_tariff`);

--
-- Индексы таблицы `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`),
  ADD KEY `id_job` (`id_job`);

--
-- Индексы таблицы `tariff`
--
ALTER TABLE `tariff`
  ADD PRIMARY KEY (`id_tariff`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `access`
--
ALTER TABLE `access`
  MODIFY `id_access` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `carbrand`
--
ALTER TABLE `carbrand`
  MODIFY `id_brand` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id_car` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id_job` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `tariff`
--
ALTER TABLE `tariff`
  MODIFY `id_tariff` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `carbrand` (`id_brand`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_car`) REFERENCES `cars` (`id_car`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_tariff`) REFERENCES `tariff` (`id_tariff`);

--
-- Ограничения внешнего ключа таблицы `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`id_job`) REFERENCES `jobs` (`id_job`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
