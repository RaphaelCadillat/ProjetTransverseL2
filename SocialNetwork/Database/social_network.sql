-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 28 mars 2021 à 20:03
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
-- Structure de la table `friends_users`
--

DROP TABLE IF EXISTS `friends_users`;
CREATE TABLE IF NOT EXISTS `friends_users` (
  `id_friends_user` int(11) NOT NULL AUTO_INCREMENT,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  PRIMARY KEY (`id_friends_user`),
  UNIQUE KEY `id_friends_user` (`id_friends_user`),
  KEY `friends_users_fk0` (`user1`),
  KEY `friends_users_fk1` (`user2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rel_user_lang`
--

INSERT INTO `rel_user_lang` (`id_rel_user_lang`, `id_user`, `id_lang`) VALUES
(7, 27, 5),
(8, 28, 1),
(9, 29, 1);

-- --------------------------------------------------------

--
-- Structure de la table `req_friends`
--

DROP TABLE IF EXISTS `req_friends`;
CREATE TABLE IF NOT EXISTS `req_friends` (
  `id_req` int(11) NOT NULL AUTO_INCREMENT,
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL,
  PRIMARY KEY (`id_req`),
  KEY `req_friends_fk0` (`id_user1`),
  KEY `req_friends_fk1` (`id_user2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `reg_date_user` (`reg_date_user`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_table`
--

INSERT INTO `user_table` (`id_user`, `id_admin`, `fname_user`, `lname_user`, `password_user`, `mail_user`, `reg_date_user`, `univ_user`, `statuts_user`) VALUES
(27, 0, 'Dio', 'Brando', '$2y$10$ahYAn4XgDrpD3GzpJpNuh.qwVvZ7aQjnINQfjizuKfqb65PHqSw02', 'didi@bra', '2021-03-20 17:54:08', 'efrei', 'Za warudo'),
(28, 0, 'Jotaro', 'Joestar', '$2y$10$EnJuPwxMejXs8qjywSWdfeGRqOmO8IpoldqyCz7sAuZPDczWb/Qq6', 'jojo@gmail.com', '2021-03-20 18:57:53', 'efrei', '...'),
(29, 0, 'Natuto', 'Uzumaki', '$2y$10$6h1tvcXTS8m7yUeUL89AlO3kVrxgY5ac.wN2CbxAGz7N2mutrcVLS', 'naroute@route', '2021-03-20 19:04:40', 'efrei', '...');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
