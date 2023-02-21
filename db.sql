-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Lut 2023, 22:04
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Baza danych: `kindergarten`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `accounts`
--

CREATE TABLE `accounts` (
  `accountId` int(11) NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `familyName` text COLLATE utf8_polish_ci NOT NULL,
  `accountType` text COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `accounts`
--

INSERT INTO `accounts` (`accountId`, `email`, `name`, `familyName`, `accountType`, `password`) VALUES
(1, 'A.Kitler@kidspark.com', 'Alexander', 'Kitler', 'admin', 'Bailon123'),
(2, 'J.Kitler@kidspark.com', 'Jenny', 'Kitler-Markov', 'educator', 'Bailon123'),
(3, 'P.Smith@kidspark.com', 'Pauline', 'Smith', 'educator', 'smitherine00'),
(4, 'O.Kwiatkowska@kidspark.com', 'Ola', 'Kwiatkowska', 'educator', 'Polnik96'),
(9, 'białychemik@arroyo.com', 'Wałter', 'Biały', 'parent', 'JESSIE_WE_NEED_TO_COOK'),
(12, 'arksman@gmail.com', 'Ben', 'Arksman', 'parent', '8731239'),
(14, 'melens@gmail.com', 'Melsa', 'Ensworth', 'parent', 'Ilussion2137');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `familyName` text COLLATE utf8_polish_ci NOT NULL,
  `birthdate` date NOT NULL,
  `groupId` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `children`
--

INSERT INTO `children` (`id`, `name`, `familyName`, `birthdate`, `groupId`) VALUES
(1, 'Jaś', 'Różowek', '1984-09-24', '1'),
(2, 'Adam', 'Kitler', '2012-08-02', '1'),
(3, 'Catheryn', 'Ensworth', '2013-02-01', '1'),
(4, 'William', 'Arksman', '2013-02-06', '1'),
(5, 'Junior', 'Arksman', '2007-02-07', '2'),
(6, 'Flynnberg', 'Biały', '2007-02-20', '2'),
(7, 'Holly', 'Biała', '2014-02-08', '2'),
(8, 'Leon', 'Smith', '2004-09-24', '3'),
(9, 'Mike', 'Smith', '2004-09-24', '3'),
(10, 'Krismov', 'Ensworth', '2004-02-04', '3');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `groups`
--

CREATE TABLE `groups` (
  `groupId` int(11) NOT NULL,
  `groupName` text COLLATE utf8_polish_ci NOT NULL,
  `caretakerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `groups`
--

INSERT INTO `groups` (`groupId`, `groupName`, `caretakerId`) VALUES
(1, 'Spacemen', 1),
(2, 'Ricks', 3),
(3, 'Mortys', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `paymentnotice`
--

CREATE TABLE `paymentnotice` (
  `id` int(11) NOT NULL,
  `childId` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `dateDue` date NOT NULL,
  `objectives` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `paymentnotice`
--

INSERT INTO `paymentnotice` (`id`, `childId`, `cost`, `dateDue`, `objectives`) VALUES
(1, 1, 100, '2023-03-07', 'food'),
(2, 3, 50, '2023-03-07', 'Meds'),
(3, 9, 70, '2023-03-07', 'Meds, Rehabilitation');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payments`
--

CREATE TABLE `payments` (
  `paymentId` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `dateDue` date NOT NULL,
  `accountId` int(11) NOT NULL,
  `childId` int(11) NOT NULL,
  `objective` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `payments`
--

INSERT INTO `payments` (`paymentId`, `cost`, `dateDue`, `accountId`, `childId`, `objective`) VALUES
(1, 100, '2023-02-22', 9, 1, 'food, fee,'),
(2, 100, '2023-02-28', 2, 1, 'food, fee'),
(3, 120, '2023-02-28', 14, 3, 'food 2x , fee'),
(4, 100, '2023-02-28', 12, 4, 'food, fee'),
(5, 100, '2023-02-28', 12, 5, 'food, fee'),
(6, 180, '2023-02-28', 9, 6, 'fee 2x, food'),
(7, 180, '2023-02-28', 9, 7, 'fee 2x, food'),
(8, 120, '2023-02-28', 3, 8, 'food 2x, fee'),
(9, 120, '2023-02-28', 3, 9, 'food 2x, fee'),
(10, 200, '2023-02-28', 14, 10, 'food 2x, fee 2x');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `relations`
--

CREATE TABLE `relations` (
  `relationId` int(11) NOT NULL,
  `childId` int(11) NOT NULL,
  `accountId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `relations`
--

INSERT INTO `relations` (`relationId`, `childId`, `accountId`) VALUES
(1, 1, 9),
(2, 2, 1),
(3, 2, 2),
(4, 3, 14),
(5, 4, 12),
(6, 5, 12),
(7, 6, 9),
(8, 7, 9),
(9, 8, 3),
(10, 9, 3),
(11, 10, 14);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accountId`);

--
-- Indeksy dla tabeli `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`groupId`);

--
-- Indeksy dla tabeli `paymentnotice`
--
ALTER TABLE `paymentnotice`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indeksy dla tabeli `relations`
--
ALTER TABLE `relations`
  ADD PRIMARY KEY (`relationId`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `accounts`
--
ALTER TABLE `accounts`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `groups`
--
ALTER TABLE `groups`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `paymentnotice`
--
ALTER TABLE `paymentnotice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `relations`
--
ALTER TABLE `relations`
  MODIFY `relationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;
