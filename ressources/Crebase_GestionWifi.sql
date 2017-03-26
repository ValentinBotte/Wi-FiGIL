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
-- Structure de la table `historique`
--
CREATE TABLE `historique` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mac` varchar(12) NOT NULL,
  `date_historique` datetime NOT NULL,
  `libelle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `historique`
--

INSERT INTO `historique` (`id`, `nom`, `prenom`, `mac`, `date_historique`, `libelle`) VALUES
(26, 'RAIMON', 'Dylan', '112233445566', '2017-03-26 23:15:53', 'demande'),
(27, 'RAIMON', 'Dylan', 'aabbccddeeff', '2017-03-26 23:16:02', 'demande'),
(28, 'RAIMON', 'Dylan', 'aabbccddeeff', '2017-03-26 23:16:13', 'demande validée'),
(29, 'RAIMON', 'Dylan', '112233445566', '2017-03-26 23:16:15', 'demande validée'),
(30, 'RAIMON', 'Dylan', '112233445566', '2017-03-26 23:16:17', 'supprimer'),
(31, 'RAIMON', 'Dylan', 'aabbccddeeff', '2017-03-26 23:16:30', 'supprimer'),
(32, 'RAIMON', 'Dylan', '111111111111', '2017-03-26 23:16:38', 'supprimer');

-- --------------------------------------------------------

--
-- Structure de la table `peripherique`
--

CREATE TABLE `peripherique` (
  `num` int(11) NOT NULL,
  `num_user` int(11) DEFAULT NULL,
  `num_prof` int(11) DEFAULT NULL,
  `libelle` varchar(128) NOT NULL,
  `mac` varchar(12) NOT NULL,
  `date_ajout` datetime NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `peripherique`
--

INSERT INTO `peripherique` (`num`, `num_user`, `num_prof`, `libelle`, `mac`, `date_ajout`, `etat`) VALUES
(1, 162, null, 'iphone 5', 'F8CF12B46A6F', '2016-05-08 15:21:02', '1'),
(2, 162, null, 'Samsung S', 'D6BC6A2CA65D', '2016-10-15 08:35:45', '1'),
(3, 162, null, 'Nokia', '14B5AD4BC6A', '2017-01-24 16:20:24', '0'),
(4, 162, null, 'Archos', '19B75EF13DA2', '2017-03-02 22:26:02', '0'),
(5, 162, null, 'LUMIA', '12DAB15C58F3', '2017-03-13 08:14:65', '0');

-- --------------------------------------------------------

--
-- Structure de la table `port_etudiant`
--

CREATE TABLE `port_etudiant` (
  `num` int(11) NOT NULL,
  `numGroupe` int(11) DEFAULT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `mel` varchar(64) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `numexam` varchar(16) DEFAULT NULL,
  `valide` varchar(1) NOT NULL DEFAULT 'O'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `port_professeur` (
  `num` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `mel` varchar(64) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `niveau` int(11) NOT NULL,
  `valide` varchar(1) DEFAULT 'O'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `port_professeur`
--

INSERT INTO `port_professeur` (`num`, `nom`, `prenom`, `mel`, `mdp`, `niveau`, `valide`) VALUES
(1, 'admin', '', 'jgil@ac-nice.fr', 'fcdc73f20acb6df693f000ce101b4f04', 0, 'O'),
(2, 'raimon', 'Dylan', 'dydy@gmail.com', '3e0fcf194a1f41068953f5f17ee45fde', 1, 'O'),
(6, 'GIL', 'José', 'Jose-Ambrosio.Gil@ac-nice.fr', 'fcdc73f20acb6df693f000ce101b4f04', 1, 'O');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `peripherique`
--
ALTER TABLE `peripherique`
  ADD PRIMARY KEY (`num`),
  ADD KEY `FK_PERIPHE_ETU` (`num_user`),
  ADD KEY `FK_PERIPHE_PROF` (`num_prof`);

--
-- Index pour la table `port_etudiant`
--
ALTER TABLE `port_etudiant`
  ADD PRIMARY KEY (`num`),
  ADD KEY `ietudgrou` (`numGroupe`);

--
-- Index pour la table `port_professeur`
--
ALTER TABLE `port_professeur`
  ADD PRIMARY KEY (`num`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `peripherique`
--
ALTER TABLE `peripherique`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `port_etudiant`
--
ALTER TABLE `port_etudiant`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;
--
-- AUTO_INCREMENT pour la table `port_professeur`
--
ALTER TABLE `port_professeur`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `peripherique`
--
ALTER TABLE `peripherique`
  ADD CONSTRAINT `FK_PERIPHE_ETU` FOREIGN KEY (`num_user`) REFERENCES `port_etudiant` (`num`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_PERIPHE_PROF` FOREIGN KEY (`num_prof`) REFERENCES `port_professeur` (`num`) ON DELETE CASCADE;

-- --------------------------------------------------------
COMMIT;