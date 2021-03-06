-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Wrz 2020, 17:14
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `php_symfony_project_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `comment`
--

INSERT INTO `comment` (`id`, `author_id`, `project_id`, `text`, `date`) VALUES
(14, 1, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet finibus nisi. In in tortor turpis. Integer tincidunt velit ac metus blandit, nec rutrum enim bibendum. Ut faucibus elit tortor, et finibus nisl elementum sed. Vestibulum et tristique ', '2020-09-17 15:27:38'),
(16, 2, 10, 'Testing administrator comment', '2020-09-17 17:12:58');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_package_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `project`
--

INSERT INTO `project` (`id`, `user_id`, `title`, `summary`, `description`, `date`, `updated`, `image`, `project_package_name`) VALUES
(10, 2, 'Gra mobilna na platformę android \"Endless Runner\"', 'Gra mobilna bazowana na popularnej grze \"Geometry Dash\" pisana w pythonie. Modułowe nieskończone poziomy wraz z systemem najwyższych poziomów. Możliwa do uruchomienia na Androidzie oraz Windowsie!', 'Projekt został rozpoczęty jako zaliczenie przedmiotu na studiach \"Programowanie Komponentowe\". Głównym celem było napisanie gry mobilnej używając języka Python. Żeby to osiągnąć użyliśmy Kivy framework który jest open source biblioteką do pythona pozwalającą pisać aplikacje na różne platformy. Pomysł na grę był bazowany na popularnej grze \"Geometry Dash\"\r\n\r\nGra jest bardzo prosta, jedynym celem jest przetrwać jak najdłużej, a jak sama nazwa wskazuje gra nie ma końca. Gracz zdobywa punkty podczas gry wraz z upływem czasu ale gra także staje się coraz trudniejsza. Po przegranej na koniec można wpisać swój wynik na listę najlepszych wyników jeżeli osiągnęło się ich wystarczającą ilość.\r\n\r\nGra została zaprojektowana tak żeby przeszkody były modułami co pozwala dodawać/edytować przeszkody nawet w notatniku. W grze nie ma poziomów, poszczególne przeszkody są wczytywane losowo aż gracz przegra.\r\n\r\n<h4>Autorzy</h4>\r\n<ul class=\"list-group list-group-flush grow\">\r\n<li>Artur Wenda</li>\r\n<li>Maciej Moryń</li>\r\n<li>Kamil Chmielewski</li>\r\n<li>Paulina Osińska (Grafika)</li>\r\n</ul>', '2020-06-30 00:37:00', '2020-08-26 22:37:31', 'endlessrunner-5ef2152a0e9b4148250300-5f46c7e9b0097396210037.jpg', 'endlessrunner-exe-5ef2152a1e8a5662808150-5f46c80b71abb185590131.rar'),
(11, 2, 'Gra mobilna \"Codname-G\" pisana w Unity', 'Oryginalny pomysł na grę zręcznościowo-logiczną stworzoną w zespole na studiach. Gra pisana głównie na platformę android z możliwością budowy na ios.', 'Projekt został rozpoczęty jako zaliczenie przedmiotu na studiach \"Projekt zespołowy\". Głównym celem było napisanie gry mobilnej w małym zespole używając Silnika Gier Unity. Główną platformą docelową jest był androib ale dzięki wybranemu silnikowi bardzo łatwo można zmodyfikować projekt żeby działał na urządzeniach ios. Po skończeniu projektu na studiach oraz otrzymaniu ocey planujemy dopracować projekt i wypuścic go do app stora.\r\n\r\nGra jest połączeniem zręcznościówka z grą logiczną. Gracz ma za zadanie przesuwać swoim awatarem w taki sposób żeby dotrzeć do wyznaczonego miejsca jednocześnie unikając przeszkód. Za każdym razem kiedy jego awatar się nie porusza może wybrać kierunek ruchu, ale po wybraniu awatar będzie się poruszał aż coś będzie blokować mu drogę. ta mechanika zmusza gracza do znalezienia najlepszej trasy do celu jednocześnie uważając na przeciwników którzy chcą zabić gracza zmuszając go do powrotu na pozycję startową.\r\n\r\nGra została napisana w taki sposób żeby ułatwić przyszły rozwój. Poziomy są zapisywane jako pliki binarne które mogą zostać wczytane podczas działania gry co umożliwia stworzenie edytora poziomów dla graczy.\r\n\r\n<h4>Autorzy</h4>\r\n<ul class=\"list-group list-group-flush grow\">\r\n<li>Artur Wenda</li>\r\n<li>Maciej Moryń</li>\r\n<li>Aleksandra Rawicz-Galińska</li>\r\n<li>Małgorzata Wieteska</li>\r\n</ul>', '2020-06-30 00:39:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `email`) VALUES
(1, 'user', '[]', '$argon2id$v=19$m=65536,t=4,p=1$a3N1anJnR1RQeEZheFUvSA$ADSHAYaT7kdMpD05zkvcAyhS7iuRiqpekzay2kHyM10', 'user@user'),
(2, 'admin', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$QW9ZRk9SVS5kSUdOWjg3SA$Q8JcIPxE+s0u0sUdVtS7hH7o5ovh/HrIC699JKdb7sc', 'admin@admin');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526CF675F31B` (`author_id`),
  ADD KEY `IDX_9474526C166D1F9C` (`project_id`);

--
-- Indeksy dla tabeli `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2FB3D0EEA76ED395` (`user_id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `FK_9474526CF675F31B` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

--
-- Ograniczenia dla tabeli `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `FK_2FB3D0EEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
