-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 08 2020 г., 17:06
-- Версия сервера: 5.6.41
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `author_id`, `name`, `text`, `created_at`) VALUES
(1, 1, 'Новое название', 'Новое текст статьи', '2020-02-13 14:34:08'),
(2, 2, 'Статья 2', 'Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, \"consectetur\", и занялся его поисками в классической латинской литературе. В результате он нашёл неоспоримый первоисточник Lorem Ipsum в разделах 1.10.32 и 1.10.33 книги \"de Finibus Bonorum et Malorum\" (\"О пределах добра и зла\"), написанной Цицероном в 45 году н.э. Этот трактат по теории этики был очень популярен в эпоху Возрождения. Первая строка Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", происходит от одной из строк в разделе 1.10.32', '2020-02-13 14:34:08'),
(3, 1, 'Новое название', 'Новый текст статьи', '2020-03-08 13:54:22'),
(4, 1, 'Новое название', 'Новый текст статьи', '2020-03-08 13:54:45'),
(5, 1, 'Новое название', 'Новый текст статьи', '2020-03-08 13:54:46'),
(6, 1, 'Новое название', 'Новый текст статьи', '2020-03-08 13:54:46'),
(7, 1, 'Новое название', 'Новый текст статьи', '2020-03-08 13:54:47'),
(8, 1, 'Новое название', 'Новый текст статьи', '2020-03-08 13:56:19'),
(9, 1, 'Новое название', 'Новый текст статьи', '2020-03-08 13:57:04'),
(10, 1, 'Новое название', 'Новый текст статьи', '2020-03-08 13:57:10'),
(11, 1, 'Новое название', 'Новый текст статьи', '2020-03-08 13:57:12'),
(12, 1, 'Новое название', 'Новый текст статьи', '2020-03-08 14:10:56'),
(13, 1, 'Новое название', 'Новый текст статьи', '2020-03-08 14:11:11'),
(14, 1, 'Новое название', 'Новый текст статьи', '2020-03-08 14:11:45'),
(15, 1, 'Новое название', 'Новый текст статьи', '2020-03-08 14:12:02'),
(16, 1, 'Новое название', 'Новый текст статьи', '2020-03-08 14:12:33'),
(17, 1, 'Новое название', 'Новый текст статьи', '2020-03-08 14:15:01'),
(18, 1, 'Новое название', 'Новый текст статьи', '2020-03-08 14:16:43');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `role` enum('admin','user') NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `is_confirmed`, `role`, `password_hash`, `auth_token`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', 1, 'admin', 'hash1', 'token1', '2020-02-11 09:32:19'),
(2, 'user', 'user@gmail.com', 1, 'user', 'hash2', 'token2', '2020-02-11 09:32:19'),
(15, 'cp.291912', 'cp.291912@gmail.com', 1, 'user', '$2y$10$nA129HrqDrqv2n6BH5dAtOFUhWnnIOkiJGi1nNxKz7HHI9NfLVsbS', 'c7f515c6acdec2f9a5f1a3e7485bd6f33e776ba6351b7267a2be415977f6c353c8daac1fc986ff73', '2020-03-08 15:20:39');

-- --------------------------------------------------------

--
-- Структура таблицы `users_activation_codes`
--

CREATE TABLE `users_activation_codes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_activation_codes`
--

INSERT INTO `users_activation_codes` (`id`, `user_id`, `code`) VALUES
(1, 6, 'c90117fe4dda7ab467d29f310e470e50'),
(2, 7, '6ffb2c9730ecec97d9dc77ee9e1d2ce7'),
(3, 8, '7c60c019a5414f4f06b766b031c1a611'),
(4, 9, 'b98c0cf7ce89935002f1aa0d3a7dbdbc'),
(5, 10, '7c908492f934558f9da217b7d79bd0a4'),
(6, 11, '1bb231e752e9c9b2febb5d5b5845ec86'),
(7, 12, 'a27238e2a9a06d13410f5cb6297564b2'),
(8, 13, '1ad0352d5e3fb74582f060fc58437bd9'),
(9, 14, '9df1966d8948018641553649840ec43b'),
(10, 15, 'fee5766b43f744abc08536864eed16f9');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_activation_codes`
--
ALTER TABLE `users_activation_codes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users_activation_codes`
--
ALTER TABLE `users_activation_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
