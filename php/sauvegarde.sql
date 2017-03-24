-- Generation time: Fri, 24 Mar 2017 07:57:58 +0100
-- Host: 127.0.0.1
-- DB name: acceswifi
/*!40030 SET NAMES UTF8 */;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `peripherique`;
CREATE TABLE `peripherique` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `num_user` int(11) DEFAULT NULL,
  `num_prof` int(11) DEFAULT NULL,
  `libelle` varchar(128) NOT NULL,
  `mac` varchar(12) NOT NULL,
  `date_ajout` datetime NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`num`),
  KEY `FK_PERIPHE_ETU` (`num_user`),
  KEY `FK_PERIPHE_PROF` (`num_prof`),
  CONSTRAINT `FK_PERIPHE_ETU` FOREIGN KEY (`num_user`) REFERENCES `port_etudiant` (`num`) ON DELETE CASCADE,
  CONSTRAINT `FK_PERIPHE_PROF` FOREIGN KEY (`num_prof`) REFERENCES `port_professeur` (`num`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `port_etudiant`;
CREATE TABLE `port_etudiant` (
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
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=utf8;

INSERT INTO `port_etudiant` VALUES ('152','11','BOTTE','Valentin','botte.valentin83@gmail.com','fcdc73f20acb6df693f000ce101b4f04',NULL,'O'),
('160','11','NICOLI','Romain','romain.nicoli83@gmail.com','4ab422ebe898aaa0c0c7b3df6b39cea8',NULL,'O'); 


DROP TABLE IF EXISTS `port_professeur`;
CREATE TABLE `port_professeur` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `mel` varchar(64) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `niveau` int(11) NOT NULL,
  `valide` varchar(1) DEFAULT 'O',
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `port_professeur` VALUES ('1','admin','','jgil@ac-nice.fr','fcdc73f20acb6df693f000ce101b4f04','0','O'),
('2','raimon','Dylan','dydy@gmail.com','3e0fcf194a1f41068953f5f17ee45fde','1','O'),
('6','GIL','José','Jose-Ambrosio.Gil@ac-nice.fr','fcdc73f20acb6df693f000ce101b4f04','1','O'); 




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

