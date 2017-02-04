-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 03 Janvier 2017 à 18:45
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pharmacie`
--
CREATE DATABASE IF NOT EXISTS `pharmacie` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pharmacie`;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Adresse` varchar(255) NOT NULL,
  `Motdepasse` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `confirmation_token` varchar(60) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`Adresse`, `Motdepasse`, `Mail`, `confirmation_token`, `confirmed_at`, `id`, `username`) VALUES
('182 chemin de Bouanaourra Ouest', '$2y$10$MWJC.N2Ozi7E8FX4Zdtlp.3gQ8R4WCPoRzurtgJgsptJ9KrCWayTW', 'crocodragon@hotmail.fr', 'bSxlkyNKbH56LvhwCOs22wtE4Ugz50oiXULCdx3IwUWTQoQau5gG7wBTyILA', NULL, 8, 'olivierdomen');

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `marque`
--

INSERT INTO `marque` (`nom`, `description`, `id`) VALUES
('adv', 'Advantage advotix advocate', 1),
('avene', 'marque', 2),
('bioderma', 'laboratoire', 3),
('biogaran', 'laboratoire', 4),
('cicabiafine', 'pas mal', 5),
('dodie', 'bébé', 6),
('eucerin', 'peau seche', 7),
('frontline', 'combo', 8),
('gifrer', '', 9),
('gum', '', 10),
('hydralin', '', 11),
('urgo', '', 12),
('larocheposay', '', 13),
('sanoflore', '', 14),
('puressentiel', '', 15),
('topicrem', '', 16),
('vichy', '', 17),
('saforelle', '', 18),
('scalibor', '', 19),
('scholl', '', 20),
('nutergia', '', 21),
('mustela', '', 22),
('rogercavailles', '', 25),
('rogergallet', '', 24);
--
-- Base de données :  `ventelivres`
--
CREATE DATABASE IF NOT EXISTS `ventelivres` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ventelivres`;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Datenaissance` date NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Motdepasse` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`Nom`, `Prenom`, `Datenaissance`, `Adresse`, `Mail`, `Motdepasse`, `id`) VALUES
('Galland', 'Julien', '1996-04-12', '56 Impasse du Plateau 13015 Marseille', 'immeral13@gmail.com', 'toto', 1);

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `Titre` varchar(255) NOT NULL,
  `Nomauteur` varchar(255) NOT NULL,
  `Prenomauteur` varchar(255) NOT NULL,
  `Edition` varchar(255) NOT NULL,
  `Dateparution` year(4) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Genre` varchar(255) NOT NULL,
  `Résumé` varchar(1023) NOT NULL,
  `Prix` float NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`Titre`, `Nomauteur`, `Prenomauteur`, `Edition`, `Dateparution`, `ISBN`, `Type`, `Genre`, `Résumé`, `Prix`, `id`) VALUES
('Pomme', 'Lafon', 'Charles', 'Larousse', 2004, 120, 'Roman', 'Fiction', 'Un homme arrive et dis bonjour', 5, 1),
('Pomme 2', 'Lafon', 'Charles', 'Larousse', 2004, 120, 'Roman', 'Fiction', 'Un homme arrive et dis bonjour, mais cette fois si, il repart et dis au revoir.', 6, 2),
('Poire', 'Lafon', 'Charles', 'Larousse', 2004, 120, 'BD', 'Fiction', 'Un homme vois une poire et ...', 8.5, 3),
('Poire 2', 'Toriyama', 'Akira', 'Glenat', 2002, 120, 'BD', 'Dramatique', 'Un homme voit une poire et se tranforme en super sayen', 10.55, 4),
('Banana', 'Tamalou', 'Mamadou', 'Hachette', 2015, 120, 'Roman', 'Humour', 'Un homme voit mamamdou et ...', 100, 5),
('Orange', 'Clavier', 'Christian', 'Larousse', 2000, 120, 'Roman', 'Policier', 'coucou', 20, 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
