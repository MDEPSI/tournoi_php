-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 06 Juin 2018 à 21:41
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `tournoi_php`
--
CREATE DATABASE IF NOT EXISTS `tournoi_php` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tournoi_php`;

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE IF NOT EXISTS `joueur` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `rang` int(3) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `classement` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=412 ;

-- --------------------------------------------------------

--
-- Structure de la table `match`
--

CREATE TABLE IF NOT EXISTS `match` (
  `num` int(3) NOT NULL AUTO_INCREMENT,
  `tour` int(3) NOT NULL,
  `index` int(3) NOT NULL,
  `joueur1` int(3) DEFAULT NULL,
  `rang_joueur1` int(11) NOT NULL,
  `joueur2` int(3) DEFAULT NULL,
  `rang_joueur2` int(11) NOT NULL,
  `end` tinyint(1) NOT NULL,
  PRIMARY KEY (`num`),
  KEY `joueur1` (`joueur1`),
  KEY `joueur2` (`joueur2`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `match`
--
ALTER TABLE `match`
  ADD CONSTRAINT `match_ibfk_1` FOREIGN KEY (`joueur1`) REFERENCES `joueur` (`id`),
  ADD CONSTRAINT `match_ibfk_2` FOREIGN KEY (`joueur2`) REFERENCES `joueur` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
