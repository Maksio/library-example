SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `author` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Авторы';

INSERT INTO `author` (`id`, `name`) VALUES
(1, 'Пушкин'),
(2, 'Лермонтов'),
(3, 'Страуструп'),
(4, 'Гоголь'),
(5, 'Зинкевич-Евстигнеева'),
(6, 'Фролов'),
(7, 'Лавров');

CREATE TABLE `book` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `annotation` text NOT NULL,
  `publish_year` int(11) NOT NULL,
  `hits` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Книги';

INSERT INTO `book` (`id`, `category_id`, `title`, `annotation`, `publish_year`, `hits`) VALUES
(1, 5, 'Вечера на хуторе близ Диканьки', 'Замечательное классическое произведение всемирно известного автора повествует нам о необычных событиях, произшедших в далекой украинской земле с кузнецом Вакулой...', 2014, 35),
(2, 2, 'Практикум по сказкотерапии', 'Практическое руководство по психологической техники психокоррекции методом комплексной сказкотерапии.', 2016, 15),
(3, 5, 'Избранное', 'Лучшие стихи Пушкина, собранные с любовью доцентом кафедры Русского языка МГУ Ветошкиным Алексеем Ивановичем', 2003, 70),
(4, 10, 'Шаткий мир', 'Нашумевшая книга Сергея Лаврова о непростом положении в мировой политической сфере в связи с нарастающим напряжением вокруг Сирии.', 2016, 100),
(5, 5, 'Евгений Онегин', 'Замечательная история несчастной любви', 2010, 44),
(6, 5, 'Медный всадник', 'Сборник рассказов АС Пушкина', 2012, 56);

CREATE TABLE `book_author` (
  `book_id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Авторы книги';

INSERT INTO `book_author` (`book_id`, `author_id`) VALUES
(1, 4),
(2, 5),
(2, 6),
(3, 1),
(3, 2),
(4, 7),
(5, 1),
(6, 1);

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Категории (жанры) книг';

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Программирование'),
(2, 'Психология'),
(3, 'Религия'),
(4, 'Детская'),
(5, 'Художественная'),
(6, 'Методическая'),
(7, 'Научная'),
(8, 'Фантастика'),
(9, 'Экономика'),
(10, 'Политика');


ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `hits` (`hits`);

ALTER TABLE `book_author`
  ADD KEY `book_id` (`book_id`,`author_id`),
  ADD KEY `author_id` (`author_id`);

ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `author`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
ALTER TABLE `book`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

ALTER TABLE `book_author`
  ADD CONSTRAINT `book_author_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`),
  ADD CONSTRAINT `book_author_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`);
