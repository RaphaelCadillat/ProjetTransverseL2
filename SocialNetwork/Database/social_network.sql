-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 10 avr. 2021 à 20:00
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `social_network`
--

-- --------------------------------------------------------

--
-- Structure de la table `lang_table`
--

DROP TABLE IF EXISTS `lang_table`;
CREATE TABLE IF NOT EXISTS `lang_table` (
  `id_lang` int(11) NOT NULL AUTO_INCREMENT,
  `lang_lang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_lang`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lang_table`
--

INSERT INTO `lang_table` (`id_lang`, `lang_lang`) VALUES
(1, 'english'),
(2, 'french'),
(3, 'spanish'),
(4, 'deutch'),
(5, 'italian'),
(6, 'portuguese'),
(7, 'chinese'),
(8, 'japanese');

-- --------------------------------------------------------

--
-- Structure de la table `messages_table`
--

DROP TABLE IF EXISTS `messages_table`;
CREATE TABLE IF NOT EXISTS `messages_table` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `content_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_message` datetime NOT NULL,
  `id_sender_message` int(11) NOT NULL,
  `id_receiver_message` int(11) NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `messages_table_fk0` (`id_sender_message`),
  KEY `messages_table_fk1` (`id_receiver_message`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rel_user_lang`
--

DROP TABLE IF EXISTS `rel_user_lang`;
CREATE TABLE IF NOT EXISTS `rel_user_lang` (
  `id_rel_user_lang` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_lang` int(11) NOT NULL,
  PRIMARY KEY (`id_rel_user_lang`),
  KEY `rel_user_lang_fk0` (`id_user`),
  KEY `rel_user_lang_fk1` (`id_lang`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rel_user_lang`
--

INSERT INTO `rel_user_lang` (`id_rel_user_lang`, `id_user`, `id_lang`) VALUES
(19, 39, 2),
(20, 40, 2),
(21, 41, 2),
(22, 42, 2),
(23, 43, 2),
(24, 44, 1),
(25, 45, 1),
(26, 46, 1),
(27, 47, 1),
(30, 50, 8);

-- --------------------------------------------------------

--
-- Structure de la table `req_friends`
--

DROP TABLE IF EXISTS `req_friends`;
CREATE TABLE IF NOT EXISTS `req_friends` (
  `id_req` int(11) NOT NULL AUTO_INCREMENT,
  `id_req_from` int(11) NOT NULL,
  `id_req_to` int(11) NOT NULL,
  `req_statuts` tinyint(1) NOT NULL DEFAULT '1',
  `req_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_req`),
  KEY `req_friends_fk0` (`id_req_from`),
  KEY `req_friends_fk1` (`id_req_to`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_table`
--

DROP TABLE IF EXISTS `user_table`;
CREATE TABLE IF NOT EXISTS `user_table` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` tinyint(1) NOT NULL,
  `fname_user` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname_user` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_date_user` datetime NOT NULL,
  `univ_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statuts_user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `reg_date_user` (`reg_date_user`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_table`
--

INSERT INTO `user_table` (`id_user`, `id_admin`, `fname_user`, `lname_user`, `password_user`, `mail_user`, `reg_date_user`, `univ_user`, `statuts_user`, `token`) VALUES
(39, 0, 'Amaury', 'Rossignol', '$2y$10$3AXxRA1GMScQkKOVBlzeOuPDh8bpFlyLWeMuIFrvzChojm7qJCr2q', 'a@a', '2021-04-04 21:24:24', 'efrei', '...', NULL),
(40, 0, 'Kylian', 'Artu', '$2y$10$DLvRr0KnfpBqNf.VmYNNd.GTedoiZRP1c1/g8zB8FVM5dRP4trH1O', 'k@a', '2021-04-04 21:24:52', 'efrei', '...', NULL),
(41, 0, 'Julien', 'Hassoun', '$2y$10$n7kQGg9onLIs9c5bzU8VYOFpJAJ28NyYlbs5FgKxQSBkqMAcO265y', 'j@a', '2021-04-04 21:25:38', 'efrei', '...', NULL),
(42, 0, 'Raph', 'Cadillat', '$2y$10$AfH96j9s4iKdpXw/IGPQ2.Z5pjjLP4iGJ8/N/okb3ZNTxdWwLst2a', 'r@a', '2021-04-04 21:26:16', 'efrei', '...', NULL),
(43, 0, 'Dorian', 'Leberre', '$2y$10$4DypfLn583TW3mFf9jZ8heTuvJ3kpoj004q2LhTCy69klTM1dN5GW', 'd@a', '2021-04-04 21:26:41', 'efrei', '...', NULL),
(44, 0, 'Jonathan', 'Joestar', '$2y$10$5MDkqxPjP2mDVZEnj9LJJeN/lweGG9XI2wD8rJ7.jhBFzvwCXDis6', 'j@b', '2021-04-04 21:27:29', 'efrei', '...', NULL),
(45, 0, 'Joseph', 'Joestar', '$2y$10$f5KwczzhiT3YsqDSHRewVefcCKTvv8pLlW4WMe/E5guyOMx7FM8Se', 'jo@b', '2021-04-04 21:28:11', 'efrei', '...', NULL),
(46, 0, 'Jotaro', 'Joestar', '$2y$10$DdYpTWHlWUgQLOSihGf80.tAbxEEnRAZhtRbkqaUpLjpaLEvwU5VK', 'jota@b', '2021-04-04 21:28:46', 'efrei', '...', NULL),
(47, 0, 'Sherlock', 'Holmes', '$2y$10$O4qoE6hoD5MfVTZi5kTJgu4/SFIKafqQ1cPru9gXaUUH0oeLBkYom', 's@b', '2021-04-04 21:29:16', 'efrei', '...', NULL),
(50, 0, 'Guillaume', 'Dumas', '$2y$10$K6BMnmu9/RgSbI5o2XRRk.yXdpjLG8C4V2IWARj3Jxddcw4FD.2OG', 'g@z', '2021-04-05 18:54:06', 'efrei', '...', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
