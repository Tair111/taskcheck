-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 05 2017 г., 17:29
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `users`
--
CREATE DATABASE IF NOT EXISTS `users` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `users`;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `gender` tinyint(2) NOT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Очистить таблицу перед добавлением данных `users`
--

TRUNCATE TABLE `users`;
--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `surname`, `name`, `middle_name`, `birthdate`, `gender`, `foto`) VALUES
(1, 'Горшкова', 'Ия', 'Мэлоровна', '1985-11-20', 0, 'iphone360_575180.jpg'),
(2, 'Беляева', 'Алла', 'Якововна', '1994-10-21', 0, 'testimg.bmp'),
(3, 'Жуков', 'Сергей', 'Степанович', '1995-07-31', 1, 'iphone360_575180.jpg'),
(4, 'Карпов', 'Станислав', 'Ростиславович', '1975-05-14', 1, 'testimg.bmp'),
(5, 'Гурьев', 'Глеб', 'Константинович', '1990-06-06', 1, 'iphone360_575180.jpg'),
(6, 'Турова', 'Ираида', 'Леонидовна', '1979-12-27', 0, 'incorrect password.jpg'),
(7, 'Белова', 'Алина', 'Викторовна', '1982-08-23', 0, 'incorrect password.jpg'),
(8, 'Гущина', 'Александра', 'Васильевна', '1996-06-06', 0, 'testimg.bmp'),
(9, 'Галкин', 'Тихон', 'Германнович', '1992-04-23', 1, 'incorrect password.jpg'),
(10, 'Абрамов', 'Роман', 'Варламович', '1992-12-18', 1, 'iphone360_575180.jpg'),
(11, 'Коновалова', 'Елизавета', 'Лаврентьевна', '1973-07-01', 0, 'iphone360_575180.jpg'),
(12, 'Харитонов', 'Всеволод', 'Антонинович', '1971-06-08', 1, '3.jpeg'),
(13, 'Мельников', 'Георгий', 'Макарович', '1974-11-27', 1, '3.jpeg'),
(14, 'Мишина', 'Агата', 'Ивановна', '1995-05-21', 0, '3.jpeg'),
(15, 'Копылова', 'Евпраксия', 'Юлиановна', '1972-07-01', 0, 'testimg.bmp'),
(16, 'Мельников', 'Филат', 'Егорович', '1972-11-10', 1, '3.jpeg'),
(17, 'Чернов', 'Артём', 'Степанович', '1987-08-25', 1, 'testimg.bmp'),
(18, 'Архипова', 'Евгения', 'Мэлсовна', '1989-05-20', 0, 'testimg.bmp'),
(19, 'Соколов', 'Альвиан', 'Мэлорович', '1972-06-20', 1, 'testimg.bmp'),
(20, 'Белова', 'Маргарита', 'Денисовна', '1991-01-21', 0, 'testimg.bmp'),
(21, 'Колесников', 'Глеб', 'Авксентьевич', '1976-09-22', 1, 'iphone360_575180.jpg'),
(22, 'Ситникова', 'Агафья', 'Пётровна', '1980-03-07', 0, 'testimg.bmp'),
(23, 'Мартынов', 'Яков', 'Антонович', '1973-04-20', 1, 'testimg.bmp'),
(24, 'Аксёнов', 'Федот', 'Романович', '1979-01-01', 1, 'incorrect password.jpg'),
(25, 'Жданова', 'Дарья', 'Ильяовна', '1973-07-30', 0, 'testimg.bmp'),
(26, 'Соколова', 'Ульяна', 'Егоровна', '1985-07-26', 0, 'incorrect password.jpg'),
(27, 'Туров', 'Владлен', 'Вячеславович', '1975-09-27', 1, '3.jpeg'),
(28, 'Брагина', 'Евдокия', 'Денисовна', '1989-05-15', 0, 'incorrect password.jpg'),
(29, 'Устинова', 'Екатерина', 'Евгеньевна', '1990-11-01', 0, 'incorrect password.jpg'),
(30, 'Максимов', 'Илья', 'Андреевич', '1987-05-17', 1, 'iphone360_575180.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
