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
  `url` varchar(255) NOT NULL,
  `chan_title` varchar(200) NOT NULL,
  `chan_link` varchar(500) NOT NULL,
  `chan_descripton` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chan_link` (`chan_link`),
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tflux`
--

INSERT INTO `tflux` (`id`, `url`, `chan_title`, `chan_link`, `chan_descripton`) VALUES
(1, 'dfghjk', 'gio', 'fghj', 'gh');

-- --------------------------------------------------------

--
-- Structure de la table `tnews`
--

CREATE TABLE IF NOT EXISTS `tnews` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `flux` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
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
