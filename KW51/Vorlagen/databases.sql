-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Dez 2023 um 18:54
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
-- Datenbank: `firma`
--
CREATE DATABASE IF NOT EXISTS `firma` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `firma`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_personen`
--

CREATE TABLE `tbl_personen` (
  `perso_name` varchar(30) DEFAULT NULL,
  `perso_vorname` varchar(25) DEFAULT NULL,
  `perso_nummer` int(11) NOT NULL,
  `perso_gehalt` double DEFAULT NULL,
  `perso_geburtstag` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `tbl_personen`
--

INSERT INTO `tbl_personen` (`perso_name`, `perso_vorname`, `perso_nummer`, `perso_gehalt`, `perso_geburtstag`) VALUES
('Mertens', 'Julia', 2297, 3621.5, '1959-12-30'),
('Maier', 'Hans', 6714, 3500, '1962-03-15'),
('Schmitz', 'Peter', 81343, 3750, '1958-04-12');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_personen`
--
ALTER TABLE `tbl_personen`
  ADD PRIMARY KEY (`perso_nummer`);
--
-- Datenbank: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_articles`
--

CREATE TABLE `tbl_articles` (
  `artic_id` int(11) NOT NULL,
  `artic_name` varchar(50) NOT NULL,
  `artic_categ_id_ref` int(11) DEFAULT NULL,
  `artic_short_desc` varchar(255) NOT NULL,
  `artic_long_desc` text DEFAULT NULL,
  `artic_price` decimal(10,2) NOT NULL,
  `artic_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `artic_updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `tbl_articles`
--

INSERT INTO `tbl_articles` (`artic_id`, `artic_name`, `artic_categ_id_ref`, `artic_short_desc`, `artic_long_desc`, `artic_price`, `artic_created_at`, `artic_updated_at`) VALUES
(1, 'Filterkaffee Äthiopien Yirgacheffe Mamo Kacha', 1, 'Arabica – Heirloom, ein leichter süffiger Kaffee für den ganzen Tag', 'Varietät: Arabica – Heirloom\r\n\r\nAufbereitung: gewaschen & sonnengetrocknet\r\n\r\nAnbauhöhe: 1700 – 2200 m\r\n\r\nAroma: Blumen, süß\r\n\r\nGeschmack: komplex, fruchtig, Tee, Blumen, Zitrone\r\n\r\nEin leichter süffiger Kaffee für den ganzen Tag\r\ngeeignet für alle Zubereitungsarten für Filterkaffee und Cold Brew', 6.99, '2023-12-17 17:40:07', NULL),
(2, 'Filterkaffee Brasilien Fazenda Sertao', 1, 'Arabica – Yellow Bourbon, für alle die kräftigen Kaffee mögen', 'Varietät: Arabica – Yellow Bourbon, Yellow Catuai, Yellow Catuca\r\nAufbereitung: natural & honey (Honiggetrocknet)\r\nAnbauhöhe: 1100 – 1450 m\r\nAroma: Früchte, Schokolade\r\nGeschmack: angenehme Säure mit guter Süße, weicher Körper\r\n\r\nfür alle die kräftigen Kaffee mögen\r\ngeeignet für alle Zubereitungsarten für Filterkaffee', 6.99, '2023-12-17 17:40:07', NULL),
(3, 'Espresso Otto', 2, '100% Arabica Blend, mittelkräftiger Espresso', '100% Arabica Blend\r\n\r\n50% Papua Neu Guinea Waghi Valley // 50% Indonesien Sulawesi Kalossi\r\n\r\nmittelkräftiger Espresso\r\nAroma: fruchtig,  beerig, schokoladig\r\nGeschmack: harmonisch, mittlere Säure\r\ngeeignet als single/double shot Espresso, Cappuccino, Café Latte, Latte Macchiato', 6.99, '2023-12-17 17:45:43', NULL),
(4, 'Espresso Wolfgang', 2, '80% Arabica / 20% Robusta, sehr kräftiger harmonischer Espresso', '80% Arabica / 20% Robusta\r\n\r\n50% Brasilien Familia Miaki // 30% Äthiopien Yirgacheffe Mamo Kacha // 20% Indien Monsooned Robusta\r\n\r\n \r\n\r\nsehr kräftiger harmonischer Espresso, leichte Säure, blumiges Aroma, dicke Crema\r\ngeeignet als single/double shot Espresso, Latte Macchiato\r\ngeeignet für Siebträgermaschine, Vollautomat, Espressokocher', 6.99, '2023-12-17 17:45:43', NULL),
(5, 'Kaffee Peru Villa Rica Fair Trade', NULL, 'Yanesha Cooperative, ganze Bohne, mittelstark bis kräftig', 'Yanesha Cooperative\r\nVarietät: Arabica – Catuai, Typica, Bourbon, Catimor\r\nAufbereitung: gewaschen & sonnengetrocknet\r\nAnbauhöhe: 1450 – 1650 m\r\nAroma: dunkle Schokolade, Kokos, Karamell, Vanille\r\nGeschmack: mittelstark bis kräftig, viel angenehme Säure, mittlerer Körper, leicht schokoladig', 7.49, '2023-12-17 17:49:04', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `categ_id` int(11) NOT NULL,
  `categ_name` varchar(50) NOT NULL,
  `categ_desc` varchar(255) DEFAULT NULL,
  `categ_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `categ_updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `tbl_categories`
--

INSERT INTO `tbl_categories` (`categ_id`, `categ_name`, `categ_desc`, `categ_created_at`, `categ_updated_at`) VALUES
(1, 'Filterkaffee', NULL, '2023-12-17 17:42:06', NULL),
(2, 'Espresso', NULL, '2023-12-17 17:42:06', NULL),
(3, 'Kaffeebohnen', NULL, '2023-12-17 17:42:28', NULL),
(4, 'Tee', NULL, '2023-12-17 17:42:28', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_articles`
--
ALTER TABLE `tbl_articles`
  ADD PRIMARY KEY (`artic_id`);

--
-- Indizes für die Tabelle `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`categ_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_articles`
--
ALTER TABLE `tbl_articles`
  MODIFY `artic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `categ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
