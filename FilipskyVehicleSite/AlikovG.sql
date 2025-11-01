-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 01 2025 г., 07:42
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `AlikovG`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'ЛБТ'),
(2, 'БТР'),
(3, 'БМП'),
(4, 'Все товары');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `tovar_id` int NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `login` varchar(100) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `tovar_id`, `comment`, `login`, `created_at`) VALUES
(1, 228, 9, 'opo warrior top', 'warriorer', '2025-11-01'),
(2, 123, 2, 'btr top, dorogo', 'current_user_login', '2025-11-01'),
(3, 123, 2, 'btr top, dorogo', 'current_user_login', '2025-11-01'),
(4, 123, 12, 'iphone max pro ryadom ne stoyal', 'current_user_login', '2025-11-01'),
(5, 123, 11, 'tigr eto silno', 'current_user_login', '2025-11-01'),
(6, 123, 13, 'ded na takoy gonyal', 'current_user_login', '2025-11-01');

-- --------------------------------------------------------

--
-- Структура таблицы `reg`
--

CREATE TABLE `reg` (
  `id` int NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tovar`
--

CREATE TABLE `tovar` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_less` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_full` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tovar`
--

INSERT INTO `tovar` (`id`, `name`, `category`, `description_less`, `description_full`, `price`, `img`) VALUES
(1, 'БТР-80', 'БТР', 'Годы производства: 1984—2011 годы.\r\nБоевая масса, т: 13,6', 'Cоветский колёсный бронетранспортёр (БТР). Бронетранспортёр был принят на вооружение в 1985 году и заменил предыдущие машины, БТР-60 и БТР-70.', '125000', 'btr_80.png'),
(2, 'БТР-82', 'БТР', 'Годы производства: 2011 — н. в.\r\nБоевая масса, т: 15,4', 'Российский бронетранспортёр, представляющий собой глубокую модернизацию БТР-80.', '243000', 'btr_82.png'),
(3, 'Oshkosh M-ATV', 'БТР', 'Годы производства: 2009\r\nДлина корпуса, мм: 6 270\r\nШирина, мм: 2 490\r\nВысота, мм: 2 700', 'Машина создана американской компанией Oshkosh Truck. Броневой автомобиль разработан по программе министерства обороны США MRAP (Mine Resistant Ambush Protected — Защищена противоминной стойкостью от засад).', '54000', 'oshkosh.png'),
(4, 'Stryker', 'БТР', 'Годы производства: с 2002\r\nБоевая масса, т: 17,2', 'Stryker — семейство колёсных 8×8/4 боевых бронированных машин производства американской компании General Dynamics Land Systems.\r\nStryker создан на базе канадского бронетранспортёра LAV III, который, в свою очередь, является глубокой модернизацией швейцарского бронетранспортёра Piranha III 8x8.', '250000', 'stryker.png'),
(5, 'БМП-3', 'БМП', 'Годы производства: с 1987\r\nБоевая масса, т: 18,7', 'Советская и российская боевая бронированная гусеничная машина, предназначенная для транспортировки личного состава к переднему краю, повышения его мобильности, вооружённости и защищённости на поле боя в условиях применения ядерного оружия и совместных действий с танками в бою.', '37000', 'bmp_3.png'),
(6, 'БТР-МДМ', 'БМП', 'Принят на вооружение: 2016 год\r\nМасса: 13,2 т', 'Усовершенствованная версия БТР-МД, находящаяся на стадии малосерийного производства. Иногда его называют «Ракушка» или «Ракушка М».', '78000', 'btr_mdm.png'),
(7, 'FV4333 Stormer', 'БТР', 'Боевая масса, т: 12,7', 'Британский бронетранспортёр, созданный на базе агрегатов лёгкого танка FV101 Scorpion на базе CVR(T). Был разработан компанией Alvis Vickers.', '84000', 'stormer.png'),
(8, 'M2 Bradley', 'БМП', 'Годы производства: 1980 – 1989\r\nБоевая масса, т: 21,3 (M2)', 'Боевая машина пехоты США, названная в честь генерала Омара Брэдли. Создана во второй половине 1970-х годов на основе прототипа XM723 с учётом опыта боевого применения советской БМП-1, конструктивных особенностей германской БМП Мардер в качестве лучше защищённой и вооружённой замены бронетранспортёрам M113.', '125000', 'm2_bradley.png'),
(9, 'Warrior', 'БМП', 'Годы производства: 1986—1994\r\nБоевая масса, т: 23,5', 'Warrior, проектное обозначение MCV-80 — британская боевая машина пехоты.', '90600', 'warrior.png'),
(10, 'Мардер', 'БМП', 'Годы производства: с 1969 по 1975\r\nБоевая масса, т: 28,2 (А1)', '«Мардер» («Marder» — «Куница») — германская боевая машина пехоты.\nРазработана в 1966—1969 годах немецкой фирмой Rheinmetall AG по заказу Бундесвера.', '100000', 'marder.png'),
(11, 'Тигр-м', 'ЛБТ', 'Годы производства: 2005 — настоящее время\r\nБоевая масса, т: 5,3 (ГАЗ-233014)', 'Российский многоцелевой автомобиль повышенной проходимости, бронеавтомобиль, армейский автомобиль-внедорожник.', '50000', 'tigr_m.png'),
(12, 'International MaxxPro', 'ЛБТ', 'Годы производства: 2007\r\nМасса, кг	: 12632-13539', 'Бронетранспортёр производства Navistar International, принятый на вооружение США в 2007 году для срочного перевооружения войск в Ираке, перспективная замена HMMWV во всех передовых частях вооружённых сил США.', '75000', 'international _maxx_pro.png'),
(13, 'HMMWV', 'ЛБТ', 'Годы производства: 1984 — настоящее время\r\nМасса: 2676 кг', 'Американский общевойсковой автомобиль повышенной проходимости, состоящий на вооружении в основном у ВС США, а также вооружённых сил, полицейских и иных служб некоторых других стран.', '66000', 'hmmwv.png'),
(14, 'Урал-432009', 'ЛБТ', 'Боевая масса, т: 17,3\r\nДлина корпуса, мм: 8500\r\nШирина, мм: 2550\r\nВысота, мм: 3100\r\nКлиренс, мм: 400', 'Защищённый автомобиль, созданный для силовых структур на производственных мощностях ОАО «АЗ Урал» (г. Миасс) по техническому заданию Главного командования внутренних войск МВД России.', '89000', 'ural_432009.png'),
(15, 'Буран', 'ЛБТ', 'Годы производства: с 2017 года\r\nДлина, мм: 5580\r\nШирина, мм: 2270\r\nВысота, мм: 2450', 'Российский многоцелевой легкобронированный бронеавтомобиль, разработанный предприятием «Рида». Ключевой особенностью бронеавтомобиля является модульная конструкция бронекорпуса.', '92000', 'buran.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tovar`
--
ALTER TABLE `tovar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
