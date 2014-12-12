-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 10 Décembre 2014 à 21:09
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `fluxrss`
--
CREATE DATABASE IF NOT EXISTS `fluxrss` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fluxrss`;

-- --------------------------------------------------------

--
-- Structure de la table `tflux`
--

CREATE TABLE IF NOT EXISTS `tflux` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,  
  `path` varchar(500) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `descripton` varchar(2000) NOT NULL,
  `image_url` varchar(1000),
  `image_titre` varchar(1000),
  `image_link` varchar(1000),
  PRIMARY KEY (`id`),
  UNIQUE KEY `path` (`path`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `tnews`
--

CREATE TABLE IF NOT EXISTS `tnews` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `flux` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `guid` varchar(1000) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `datePub` varchar(200),
  `dateAjout` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `flux` (`flux`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tnews`
--
ALTER TABLE `tnews`
  ADD CONSTRAINT `FK_tflux_on_tnews` FOREIGN KEY (`flux`) REFERENCES `tflux` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;