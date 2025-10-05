-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Erstellungszeit: 04. Okt 2025 um 21:01
-- Server-Version: 5.7.36
-- PHP-Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `vote`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `candidates`
--

DROP TABLE IF EXISTS `candidates`;
CREATE TABLE IF NOT EXISTS `candidates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `votes` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `votes`) VALUES
(1, 'Adam', 0),
(2, 'Nancy', 0),
(3, 'Amanda', 1),
(4, 'Alex', 7);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `voters`
--

DROP TABLE IF EXISTS `voters`;
CREATE TABLE IF NOT EXISTS `voters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `voted` tinyint(1) NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `emails` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `voters`
--

INSERT INTO `voters` (`id`, `email`, `password`, `voted`, `name`) VALUES
(1, 'hh@yahoo.com', '123456', 1, ''),
(2, 'ff@yahoo.com', '123456', 0, ''),
(3, 'user@gmail.com', '123456', 0, 'The-User'),
(4, 'amal@yahoo.com', '123456', 0, ''),
(5, 'amal@hotmail.com', '123456', 1, 'Amal'),
(6, 'foo-bar@example.com', '123456', 0, ''),
(7, 'kl@kl.com', '123456', 0, ''),
(8, 'ss@l.com', '123456', 0, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `votes`
--

DROP TABLE IF EXISTS `votes`;
CREATE TABLE IF NOT EXISTS `votes` (
  `voter_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `vote_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`voter_id`,`candidate_id`),
  KEY `candidate_id` (`candidate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
