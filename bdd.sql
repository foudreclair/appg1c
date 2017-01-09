-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 03 Janvier 2017 à 10:22
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `Programmation`
--

CREATE TABLE `Programmation` (
  `Id` int(11) NOT NULL,
  `Date_start` date DEFAULT NULL,
  `Date_end` date DEFAULT NULL,
  `Time_start` time DEFAULT NULL,
  `Time_end` time DEFAULT NULL,
  `Consigne` float DEFAULT NULL,
  `Correction` float DEFAULT NULL,
  `Id_Fonctionnalite` int(11) NOT NULL,
  `Id_Capteur` int(11) NOT NULL,
  `Id_Pieces` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Programmation`
--

INSERT INTO `Programmation` (`Id`, `Date_start`, `Date_end`, `Time_start`, `Time_end`, `Consigne`, `Correction`, `Id_Fonctionnalite`, `Id_Capteur`, `Id_Pieces`) VALUES
(1, '2016-12-13', '2016-12-20', '11:00:00', '14:00:00', 32, NULL, 1, 1, 1),
(2, '2016-12-08', '2016-12-16', '07:00:00', '11:00:00', 24, NULL, 2, 2, 2),
(3, '2017-01-11', '2017-01-18', NULL, NULL, 23, NULL, 2, 2, 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Programmation`
--
ALTER TABLE `Programmation`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Programmation_Id_Fonctionnalite` (`Id_Fonctionnalite`),
  ADD KEY `FK_Programmation_Id_Capteur` (`Id_Capteur`),
  ADD KEY `FK_Programmation_Id_Pieces` (`Id_Pieces`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Programmation`
--
ALTER TABLE `Programmation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Programmation`
--
ALTER TABLE `Programmation`
  ADD CONSTRAINT `FK_Programmation_Id_Capteur` FOREIGN KEY (`Id_Capteur`) REFERENCES `Capteur` (`Id`),
<<<<<<< HEAD
  ADD CONSTRAINT `FK_Programmation_Id_Fonctionnalite` FOREIGN KEY (`Id_Fonctionnalite`) REFERENCES `Fonctionnalite` (`Id`);

--
-- Contraintes pour la table `Statistiques`
--
ALTER TABLE `Statistiques`
  ADD CONSTRAINT `FK_Statistiques_Id_Capteur` FOREIGN KEY (`Id_Capteur`) REFERENCES `Capteur` (`Id`);
  
  
CREATE TABLE `Affectation` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

ALTER TABLE `Affectation`
  ADD CONSTRAINT `FK_Affectation_Id_Capteur` FOREIGN KEY (`Id_Capteur`) REFERENCES `Capteur` (`Id`);
  ADD CONSTRAINT `FK_Affectation_Id_Fonctionnalite` FOREIGN KEY (`Id_Fonctionnalite`) REFERENCES `Fonctionnalite` (`Id`);
  ADD CONSTRAINT `FK_Affectation_Id_Pieces` FOREIGN KEY (`Id_Pieces`) REFERENCES `Pieces` (`Id`);

  

  
 
=======
  ADD CONSTRAINT `FK_Programmation_Id_Fonctionnalite` FOREIGN KEY (`Id_Fonctionnalite`) REFERENCES `Fonctionnalite` (`Id`),
  ADD CONSTRAINT `FK_Programmation_Id_Pieces` FOREIGN KEY (`Id_Pieces`) REFERENCES `Pieces` (`Id`);
>>>>>>> 595e8bb85c9f8c9c92e5aeb3d947701852a37746
