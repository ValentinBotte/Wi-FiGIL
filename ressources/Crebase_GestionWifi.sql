-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 25 Novembre 2016 à 10:43
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



/*!40101 SET NAMES utf8 */;

--
-- Base de données: `acceswifi`
--
DROP DATABASE IF EXISTS `acceswifi`;
CREATE DATABASE IF NOT EXISTS `acceswifi`; 
USE `acceswifi`;

-- --------------------------------------------------------

--
-- Structure de la table `port_etudiant`
--

CREATE TABLE IF NOT EXISTS `port_etudiant` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `numGroupe` int(11) DEFAULT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `mel` varchar(64) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `numexam` varchar(16) DEFAULT NULL,
  `valide` varchar(1) NOT NULL DEFAULT 'O',
  PRIMARY KEY (`num`),
  KEY `ietudgrou` (`numGroupe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Contenu de la table `port_etudiant`
--

INSERT INTO `port_etudiant` (`num`, `numGroupe`, `nom`, `prenom`, `mel`, `mdp`, `numexam`, `valide`) VALUES(1, 1, 'Raimon', 'Dylan', 'dylanraimon@gmail.com', 'admin!', '1231231231231231', 'O');


-- --------------------------------------------------------

--
-- Structure de la table `port_professeur`
--

CREATE TABLE IF NOT EXISTS `port_professeur` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `mel` varchar(64) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `niveau` int(11) NOT NULL ,
  `valide` varchar(1) DEFAULT 'O',
  PRIMARY KEY (`num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Contenu de la table `port_professeur`
--

INSERT INTO `port_professeur` (`num`, `nom`, `prenom`, `mel`, `mdp`, `niveau`, `valide`) VALUES(1, 'Admin', 'Admin', 'dylanraimon@gmail.com', 'admin!', 1, 'O');

-- --------------------------------------------------------

--
-- Structure de la table `peripherique`
--

CREATE TABLE IF NOT EXISTS `peripherique` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `num_user` int(11) NOT NULL,
  `libelle` varchar(128) NOT NULL,
  `mac` varchar(12) NOT NULL,
  `date_ajout` DATETIME NOT NULL,
  PRIMARY KEY (`num`),
  CONSTRAINT FK_PERIPHE_ETU FOREIGN KEY (`num_user`)
	  REFERENCES `port_etudiant` (`num`) 
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Contenu de la table `peripherique`
--

INSERT INTO `peripherique` (`num`, `num_user`, `libelle`, `mac`, `date_ajout`) VALUES(1, 1, 'portable', 'F8CF12B46A6F', '2016-05-08 00:00:00');

-- --------------------------------------------------------
COMMIT;