-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Jan 2024 um 14:23
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `laravel_shop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CategName` varchar(255) NOT NULL,
  `CategContent` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `categories`
--

INSERT INTO `categories` (`id`, `CategName`, `CategContent`, `created_at`, `updated_at`) VALUES
(1, 'Duchess\'s voice died.', 'White Rabbit blew three blasts on the trumpet, and called out, \'First witness!\' The first witness was the.', '2024-01-18 12:11:41', '2024-01-18 12:11:41'),
(2, 'King, the Queen, the.', 'Last came a little feeble, squeaking voice, (\'That\'s Bill,\' thought Alice,) \'Well, I hardly know--No more.', '2024-01-18 12:11:41', '2024-01-18 12:11:41'),
(3, 'Alice quietly said.', 'I know?\' said Alice, surprised at her own courage. \'It\'s no business of MINE.\' The Queen turned crimson with.', '2024-01-18 12:11:41', '2024-01-18 12:11:41'),
(4, 'Pigeon; \'but I must.', 'Alice replied very readily: \'but that\'s because it stays the same year for such a long time together.\' \'Which.', '2024-01-18 12:11:41', '2024-01-18 12:11:41'),
(5, 'She was a good deal.', 'Seven flung down his brush, and had just begun to repeat it, when a cry of \'The trial\'s beginning!\' was heard.', '2024-01-18 12:11:41', '2024-01-18 12:11:41'),
(6, 'Pigeon. \'I\'m NOT a.', 'Alice got up and ran off, thinking while she ran, as well she might, what a wonderful dream it had been. But.', '2024-01-18 12:11:41', '2024-01-18 12:11:41'),
(7, 'There\'s no pleasing.', 'Poor Alice! It was as much as she could do, lying down on one side, to look through into the garden with one.', '2024-01-18 12:11:41', '2024-01-18 12:11:41'),
(8, 'Footman continued in.', 'Mock Turtle. \'Seals, turtles, salmon, and so on; then, when you\'ve cleared all the jelly-fish out of the.', '2024-01-18 12:11:41', '2024-01-18 12:11:41'),
(9, 'Mock Turtle yawned.', 'Lory. Alice replied eagerly, for she was always ready to talk about her pet: \'Dinah\'s our cat. And she\'s such.', '2024-01-18 12:11:41', '2024-01-18 12:11:41'),
(10, 'Soup! Beau--ootiful.', 'She hastily put down the bottle, saying to herself \'That\'s quite enough--I hope I shan\'t grow any more--As it.', '2024-01-18 12:11:41', '2024-01-18 12:11:41'),
(11, 'Dinah: I think you\'d.', 'However, she soon made out that it was only a mouse that had slipped in like herself. \'Would it be of any.', '2024-01-18 12:11:41', '2024-01-18 12:11:41');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
