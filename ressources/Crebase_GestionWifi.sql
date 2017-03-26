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

INSERT INTO `port_etudiant` (`num`, `numGroupe`, `nom`, `prenom`, `mel`, `mdp`, `numexam`, `valide`) VALUES
(152, 11, 'BOTTE', 'Valentin', 'botte.valentin83@gmail.com', 'fcdc73f20acb6df693f000ce101b4f04', NULL, 'O'),
(160, 11, 'NICOLI', 'Romain', 'romain.nicoli83@gmail.com', '4ab422ebe898aaa0c0c7b3df6b39cea8', NULL, 'O'),
(162, 11, 'RAIMON', 'Dylan', 'dylanraimon@gmail.com', '3e0fcf194a1f41068953f5f17ee45fde', NULL, 'O');


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

INSERT INTO `port_professeur` (`num`, `nom`, `prenom`, `mel`, `mdp`, `niveau`, `valide`) VALUES
(1, 'admin', '', 'jgil@ac-nice.fr', 'fcdc73f20acb6df693f000ce101b4f04', 0, 'O'),
(2, 'raimon', 'Dylan', 'dydy@gmail.com', '3e0fcf194a1f41068953f5f17ee45fde', 1, 'O'),
(6, 'GIL', 'José', 'Jose-Ambrosio.Gil@ac-nice.fr', 'fcdc73f20acb6df693f000ce101b4f04', 1, 'O');

-- --------------------------------------------------------

--
-- Structure de la table `peripherique`
--

CREATE TABLE IF NOT EXISTS `peripherique` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `num_user` int(11) NULL,
  `num_prof` int(11) NULL,
  `libelle` varchar(128) NOT NULL,
  `mac` varchar(12) NOT NULL,
  `date_ajout` DATETIME NOT NULL,
  `etat` INTEGER DEFAULT 0 NOT NULL,
  PRIMARY KEY (`num`),
  CONSTRAINT FK_PERIPHE_ETU FOREIGN KEY (`num_user`)
	  REFERENCES `port_etudiant` (`num`) on delete CASCADE ,
	CONSTRAINT FK_PERIPHE_PROF FOREIGN KEY (`num_prof`)
	  REFERENCES `port_professeur` (`num`) on delete CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Contenu de la table `peripherique`
--

INSERT INTO `peripherique` (`num`, `num_user`,`num_prof`, `libelle`, `mac`, `date_ajout`, `etat`) VALUES
(1, 162, null, 'iphone 5', 'F8CF12B46A6F', '2016-05-08 15:21:02', '1'),
(2, 162, null, 'Samsung S', 'D6BC6A2CA65D', '2016-10-15 08:35:45', '1'),
(3, 162, null, 'Nokia', '14B5AD4BC6A', '2017-01-24 16:20:24', '0'),
(4, 162, null, 'Archos', '19B75EF13DA2', '2017-03-02 22:26:02', '0'),
(5, 162, null, 'LUMIA', '12DAB15C58F3', '2017-03-13 08:14:65', '0')
;

-- --------------------------------------------------------
COMMIT;