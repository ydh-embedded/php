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
-- Tabellenstruktur für Tabelle `articels`
--

CREATE TABLE `articels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ArticName` varchar(255) NOT NULL,
  `ArticName_id_ref` varchar(255) NOT NULL,
  `ArticContent` varchar(255) NOT NULL,
  `ArticDescription` varchar(255) NOT NULL,
  `ArticPicture` varchar(255) NOT NULL,
  `ArticThumbnail` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `articels`
--

INSERT INTO `articels` (`id`, `ArticName`, `ArticName_id_ref`, `ArticContent`, `ArticDescription`, `ArticPicture`, `ArticThumbnail`, `created_at`, `updated_at`) VALUES
(1, 'So Alice.', '13', 'Queen\'s argument.', 'Christmas.\' And she went on in these words: \'Yes, we went to school.', 'Alice, that she had.', 'Alice. \'Well, then,\'.', '2024-01-18 12:10:50', '2024-01-18 12:10:50'),
(2, 'Suppress.', '9', 'In another moment.', 'Duck and a Dodo, a Lory and an Eaglet, and several other curious.', 'Alice. \'Reeling and.', 'CHAPTER IX. The Mock.', '2024-01-18 12:10:50', '2024-01-18 12:10:50'),
(3, 'Alice in.', '11', 'Who would not join.', 'Alice, and her eyes immediately met those of a large caterpillar.', 'Nobody moved. \'Who.', 'Dormouse was sitting.', '2024-01-18 12:10:50', '2024-01-18 12:10:50'),
(4, 'Lizard\'s.', '17', 'I? Ah, THAT\'S the.', 'Alice: \'three inches is such a nice little dog near our house I.', 'MORE than nothing.\'.', 'Hatter, it woke up.', '2024-01-18 12:10:50', '2024-01-18 12:10:50'),
(5, 'I should.', '16', 'You grant that?\'.', 'Alice hastily, afraid that she had never heard before, \'Sure then.', 'A secret, kept from.', 'Alice. \'Stand up and.', '2024-01-18 12:10:50', '2024-01-18 12:10:50'),
(6, 'I\'m sure.', '18', 'The Hatter was out.', 'Rabbit whispered in a frightened tone. \'The Queen will hear you!.', 'COULD! I\'m sure _I_.', 'Dinah, tell me your.', '2024-01-18 12:10:50', '2024-01-18 12:10:50'),
(7, 'The King.', '11', 'Then followed the.', 'Father William,\' the young man said, \'And your hair has become very.', 'The Cat\'s head began.', 'SOMEBODY ought to be.', '2024-01-18 12:10:50', '2024-01-18 12:10:50'),
(8, 'Cat; and.', '7', 'Alice to herself.', 'Cat, \'or you wouldn\'t have come here.\' Alice didn\'t think that.', 'The Cat\'s head with.', 'Tell me that first.', '2024-01-18 12:10:50', '2024-01-18 12:10:50'),
(9, 'I should.', '13', 'White Rabbit, \'and.', 'When the pie was all finished, the Owl, as a boon, Was kindly.', 'Dinah, and saying to.', 'Cheshire Cat,\' said.', '2024-01-18 12:10:50', '2024-01-18 12:10:50'),
(10, 'ME,\' but.', '8', 'You see, she came.', 'Dormouse; \'--well in.\' This answer so confused poor Alice, that she.', 'Cat: \'we\'re all mad.', 'Was kindly permitted.', '2024-01-18 12:10:50', '2024-01-18 12:10:50'),
(11, 'But, now.', '5', 'In another minute.', 'Hatter trembled so, that he shook both his shoes off. \'Give your.', 'Dinah, if I was, I.', 'Duchess, who seemed.', '2024-01-18 12:10:50', '2024-01-18 12:10:50');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `articels`
--
ALTER TABLE `articels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `articels`
--
ALTER TABLE `articels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
