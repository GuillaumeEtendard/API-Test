-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 27 Mai 2016 à 20:00
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `api`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

CREATE TABLE IF NOT EXISTS `adresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rue` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `codePostal` varchar(255) COLLATE utf8_bin NOT NULL,
  `ville` varchar(255) COLLATE utf8_bin NOT NULL,
  `creationDateAdresse` datetime NOT NULL,
  `updateDateAdresse` datetime NOT NULL,
  `contacts_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=20 ;

--
-- Contenu de la table `adresses`
--

INSERT INTO `adresses` (`id`, `rue`, `codePostal`, `ville`, `creationDateAdresse`, `updateDateAdresse`, `contacts_id`) VALUES
(4, NULL, '75001', 'Paris', '2016-05-27 17:04:01', '2016-05-27 17:04:01', 1),
(10, NULL, '75005', 'Paris', '2016-05-27 17:27:43', '2016-05-27 17:27:43', 9),
(12, '3 rue Jean ', '70001', 'Charenton', '2016-05-27 18:20:29', '2016-05-27 19:01:42', 3),
(13, '10 rue du Caire', '75010', 'Paris', '2016-05-27 18:21:43', '2016-05-27 18:21:43', 6);

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `civilite` varchar(255) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(255) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(255) COLLATE utf8_bin NOT NULL,
  `birthdate` date DEFAULT NULL,
  `creationDateContact` datetime NOT NULL,
  `updateDateContact` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=17 ;

--
-- Contenu de la table `contacts`
--

INSERT INTO `contacts` (`id`, `civilite`, `lastname`, `firstname`, `birthdate`, `creationDateContact`, `updateDateContact`) VALUES
(1, 'Monsieur', 'Eric', 'Jean', NULL, '2016-05-27 18:25:45', '2016-05-27 18:25:45'),
(3, 'Monsieur', 'Colop', 'Emilie', '2016-05-04', '2016-05-27 16:27:58', '2016-05-27 18:58:58'),
(6, 'Monsieur', 'Pat', 'Emile', NULL, '2016-05-27 17:11:56', '2016-05-27 18:21:34'),
(9, 'Madame', 'Josea', 'Emilie', NULL, '2016-05-27 15:12:01', '2016-05-27 15:12:01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
