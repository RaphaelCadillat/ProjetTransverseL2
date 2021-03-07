-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 07 mars 2021 à 22:35
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
-- Structure de la table `table_users_test`
--

DROP TABLE IF EXISTS `table_users_test`;
CREATE TABLE IF NOT EXISTS `table_users_test` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `fname_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_user` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_en_user` tinyint(1) NOT NULL,
  `lang_fr_user` tinyint(1) NOT NULL,
  `lang_jp_user` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `table_users_test`
--

INSERT INTO `table_users_test` (`id_user`, `fname_user`, `lname_user`, `pass_user`, `lang_en_user`, `lang_fr_user`, `lang_jp_user`) VALUES
(1, 'Kylian', 'ARTU', 'prolinux', 1, 1, 1),
(2, 'Amaury', 'Rossignol', 'jefaisdesformulairesquali', 0, 1, 0),
(3, 'Julien', 'HASSOUN', 'jeprefairejoueraApex', 1, 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
