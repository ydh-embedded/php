-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Jan 2024 um 15:06
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
-- Datenbank: `miniblog`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `categ_id` int(11) NOT NULL,
  `categ_name` varchar(50) NOT NULL,
  `categ_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `posts_id`            int(11) NOT NULL,
  `posts_users_id_ref`  int(11) NOT NULL,
  `posts_categ_id_ref`  int(11) NOT NULL,
  `posts_header`        varchar(50) NOT NULL COMMENT 'Überschrift / Header',
  `posts_content`       text NOT NULL,
  `posts_image`         varchar(100) DEFAULT NULL COMMENT 'Pfadangabe zum Bilderordner',
  `posts_created_at`    timestamp NOT NULL DEFAULT current_timestamp(),
  `posts_updated_at`    timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_users`
--

CREATE TABLE `tbl_users` (
  `users_id`            int(11) NOT NULL,
  `users_forename`      varchar(50) DEFAULT NULL,
  `users_lastname`      varchar(50) NOT NULL,
  `users_sal`           varchar(10) NOT NULL COMMENT 'Anrede',
  `users_email`         varchar(100) NOT NULL,
  `users_password`      varchar(255) NOT NULL,
  `users_create`        timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`categ_id`);

--
-- Indizes für die Tabelle `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `users_email` (`users_email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `categ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
