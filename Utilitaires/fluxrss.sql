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



--
-- Base de données: `fluxrss`
--

DROP TABLE IF EXISTS `tadmin`;
DROP TABLE IF EXISTS `tnews`;
DROP TABLE IF EXISTS `tflux`;
DROP TABLE IF EXISTS `tParams`;


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
  `description` varchar(2000) NOT NULL,
  `image_url` varchar(1000),
  `image_titre` varchar(1000),
  `image_link` varchar(1000),
  PRIMARY KEY (`id`),
  UNIQUE KEY `path` (`path`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

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
  `description` varchar(5000) NOT NULL,
  `datePub` DATETIME NOT NULL ,
  PRIMARY KEY (`id`),
  KEY `flux` (`flux`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Contraintes pour la table `tnews`
--
ALTER TABLE `tnews`
  ADD CONSTRAINT `FK_tflux_on_tnews` FOREIGN KEY (`flux`) REFERENCES `tflux` (`id`);


-- --------------------------------------------------------

--
-- Structure de la table `tAdmin`
--

CREATE TABLE IF NOT EXISTS `tAdmin` (
  `login` varchar(50) NOT NULL,  
  `mdp` varchar(50) NOT NULL,
  PRIMARY KEY (`login`)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tParams`
--

CREATE TABLE IF NOT EXISTS `tParams` (
  `param` VARCHAR(255) NOT NULL  ,
  `value` VARCHAR(255),
  PRIMARY KEY (`param`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0