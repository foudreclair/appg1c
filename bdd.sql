-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Lun 30 Janvier 2017 à 15:55
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `Affectation`
--

CREATE TABLE `Affectation` (
  `Id` int(11) NOT NULL,
  `Id_Pieces` int(11) NOT NULL,
  `Id_Fonctionnalite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Affectation`
--

INSERT INTO `Affectation` (`Id`, `Id_Pieces`, `Id_Fonctionnalite`) VALUES
(43, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Appartements`
--

CREATE TABLE `Appartements` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(25) DEFAULT NULL,
  `Type` int(11) DEFAULT NULL,
  `Adresse` varchar(100) DEFAULT NULL,
  `Ville` varchar(25) DEFAULT NULL,
  `Pays` varchar(25) DEFAULT NULL,
  `Nb_personne` int(11) DEFAULT NULL,
  `Id_Utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Appartements`
--

INSERT INTO `Appartements` (`Id`, `Nom`, `Type`, `Adresse`, `Ville`, `Pays`, `Nb_personne`, `Id_Utilisateur`) VALUES
(3, 'Appart g1c', 1, '', '', '', 0, 7);

-- --------------------------------------------------------

--
-- Structure de la table `Capteur`
--

CREATE TABLE `Capteur` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Capteur`
--

INSERT INTO `Capteur` (`Id`, `Nom`) VALUES
(3, 'Temperature'),
(7, 'Luminosite'),
(40, 'TempCoding'),
(41, 'Temp1'),
(42, 'TempCuis'),
(43, 'TempCuis');

-- --------------------------------------------------------

--
-- Structure de la table `Catalogue`
--

CREATE TABLE `Catalogue` (
  `Id` int(10) NOT NULL,
  `Nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `Prix` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Id_categorie` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Catalogue`
--

INSERT INTO `Catalogue` (`Id`, `Nom`, `Description`, `Prix`, `Id_categorie`) VALUES
(1, 'Capteur 1', 'Lourd', '19,80', '4'),
(2, 'eqvdfv', 'dvddv', '6,80', 'vvddv'),
(3, 'nom', 'czrczrc', '12,30', '6'),
(4, 'Alarme', 'Super alarme trop stylÃ©e', '27,89', '6');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `Id` int(10) NOT NULL,
  `Nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`Id`, `Nom`, `Description`) VALUES
(4, 'Capteurs', ''),
(6, 'SÃ©curitÃ©', '');

-- --------------------------------------------------------

--
-- Structure de la table `Fonctionnalite`
--

CREATE TABLE `Fonctionnalite` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Etat` int(11) DEFAULT NULL,
  `Type_donnees` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Fonctionnalite`
--

INSERT INTO `Fonctionnalite` (`Id`, `Nom`, `Etat`, `Type_donnees`) VALUES
(1, 'Température', NULL, 1),
(2, 'Luminosité', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Pannes`
--

CREATE TABLE `Pannes` (
  `Id` int(11) NOT NULL,
  `Niveau` int(11) DEFAULT NULL,
  `Etat` int(11) DEFAULT NULL,
  `Id_Capteur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Pieces`
--

CREATE TABLE `Pieces` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(25) DEFAULT NULL,
  `Id_Appartements` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Pieces`
--

INSERT INTO `Pieces` (`Id`, `Nom`, `Id_Appartements`) VALUES
(6, 'Cuisine', 3);

-- --------------------------------------------------------

--
-- Structure de la table `Programmation`
--

CREATE TABLE `Programmation` (
  `Id` int(11) NOT NULL,
  `Date_start` varchar(30) DEFAULT NULL,
  `Date_end` varchar(30) DEFAULT NULL,
  `Time_start` varchar(30) DEFAULT NULL,
  `Time_end` varchar(30) DEFAULT NULL,
  `Consigne` varchar(30) DEFAULT NULL,
  `Correction` varchar(30) DEFAULT NULL,
  `Id_Fonctionnalite` int(11) NOT NULL,
  `Id_Capteur` int(11) NOT NULL,
  `Id_Pieces` int(11) NOT NULL,
  `Id_scenario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Programmation`
--

INSERT INTO `Programmation` (`Id`, `Date_start`, `Date_end`, `Time_start`, `Time_end`, `Consigne`, `Correction`, `Id_Fonctionnalite`, `Id_Capteur`, `Id_Pieces`, `Id_scenario`) VALUES
(3, 'Lundi', 'Samedi', '00:00', '00:00', '26', NULL, 1, 43, 6, 15);

-- --------------------------------------------------------

--
-- Structure de la table `Scenario`
--

CREATE TABLE `Scenario` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Recurrence` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Id_Utilisateur` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Scenario`
--

INSERT INTO `Scenario` (`Id`, `Nom`, `Recurrence`, `Id_Utilisateur`) VALUES
(12, 'Ne pas supprimer', 'Non', 0),
(15, 'Semaine', 'Non', 7);

-- --------------------------------------------------------

--
-- Structure de la table `Statistiques`
--

CREATE TABLE `Statistiques` (
  `Id` int(11) NOT NULL,
  `Type` varchar(25) DEFAULT NULL,
  `Valeur` float DEFAULT NULL,
  `Id_Capteur` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Statistiques`
--

INSERT INTO `Statistiques` (`Id`, `Type`, `Valeur`, `Id_Capteur`) VALUES
(1, 'Degré', 23, 3),
(2, 'Degré', 23, 3),
(3, 'Degré', 25, 3),
(4, 'Degré', 29, 3),
(5, 'Degré', 19, 3),
(6, 'Lux', 80, 7);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `Id` int(11) NOT NULL,
  `Mail` varchar(25) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Nom` varchar(25) DEFAULT NULL,
  `Prenom` varchar(25) DEFAULT NULL,
  `Date_naissance` varchar(25) DEFAULT NULL,
  `Permission` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`Id`, `Mail`, `Password`, `Nom`, `Prenom`, `Date_naissance`, `Permission`) VALUES
(7, 'isepg1c2016@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'G1C', 'Isep', '01/01/2000', 1),
(8, 'aymeric@dejavel.fr', 'b8489c3d1018dc378c6f2c1bf5bd8c69b16290e2', 'de Javel', 'Aymeric', '10/03/2000', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Affectation`
--
ALTER TABLE `Affectation`
  ADD PRIMARY KEY (`Id`,`Id_Pieces`,`Id_Fonctionnalite`),
  ADD KEY `FK_Affectation_Id_Pieces` (`Id_Pieces`),
  ADD KEY `FK_Affectation_Id_Fonctionnalite` (`Id_Fonctionnalite`);

--
-- Index pour la table `Appartements`
--
ALTER TABLE `Appartements`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Appartements_Id_Utilisateur` (`Id_Utilisateur`);

--
-- Index pour la table `Capteur`
--
ALTER TABLE `Capteur`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Catalogue`
--
ALTER TABLE `Catalogue`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Fonctionnalite`
--
ALTER TABLE `Fonctionnalite`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Pannes`
--
ALTER TABLE `Pannes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Pannes_Id_Capteur` (`Id_Capteur`);

--
-- Index pour la table `Pieces`
--
ALTER TABLE `Pieces`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Pieces_Id_Appartements` (`Id_Appartements`);

--
-- Index pour la table `Programmation`
--
ALTER TABLE `Programmation`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Programmation_Id_Fonctionnalite` (`Id_Fonctionnalite`),
  ADD KEY `FK_Programmation_Id_Capteur` (`Id_Capteur`),
  ADD KEY `FK_Programmation_Id_Pieces` (`Id_Pieces`);

--
-- Index pour la table `Scenario`
--
ALTER TABLE `Scenario`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Statistiques`
--
ALTER TABLE `Statistiques`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Statistiques_Id_Capteur` (`Id_Capteur`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Appartements`
--
ALTER TABLE `Appartements`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Capteur`
--
ALTER TABLE `Capteur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `Catalogue`
--
ALTER TABLE `Catalogue`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `Fonctionnalite`
--
ALTER TABLE `Fonctionnalite`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Pannes`
--
ALTER TABLE `Pannes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Pieces`
--
ALTER TABLE `Pieces`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `Programmation`
--
ALTER TABLE `Programmation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Scenario`
--
ALTER TABLE `Scenario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `Statistiques`
--
ALTER TABLE `Statistiques`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Affectation`
--
ALTER TABLE `Affectation`
  ADD CONSTRAINT `FK_Affectation_Id` FOREIGN KEY (`Id`) REFERENCES `Capteur` (`Id`),
  ADD CONSTRAINT `FK_Affectation_Id_Fonctionnalite` FOREIGN KEY (`Id_Fonctionnalite`) REFERENCES `Fonctionnalite` (`Id`),
  ADD CONSTRAINT `FK_Affectation_Id_Pieces` FOREIGN KEY (`Id_Pieces`) REFERENCES `Pieces` (`Id`);

--
-- Contraintes pour la table `Appartements`
--
ALTER TABLE `Appartements`
  ADD CONSTRAINT `FK_Appartements_Id_Utilisateur` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `Utilisateur` (`Id`);

--
-- Contraintes pour la table `Pannes`
--
ALTER TABLE `Pannes`
  ADD CONSTRAINT `FK_Pannes_Id_Capteur` FOREIGN KEY (`Id_Capteur`) REFERENCES `Capteur` (`Id`);

--
-- Contraintes pour la table `Pieces`
--
ALTER TABLE `Pieces`
  ADD CONSTRAINT `FK_Pieces_Id_Appartements` FOREIGN KEY (`Id_Appartements`) REFERENCES `Appartements` (`Id`);

--
-- Contraintes pour la table `Programmation`
--
ALTER TABLE `Programmation`
  ADD CONSTRAINT `FK_Programmation_Id_Capteur` FOREIGN KEY (`Id_Capteur`) REFERENCES `Capteur` (`Id`),
  ADD CONSTRAINT `FK_Programmation_Id_Fonctionnalite` FOREIGN KEY (`Id_Fonctionnalite`) REFERENCES `Fonctionnalite` (`Id`),
  ADD CONSTRAINT `FK_Programmation_Id_Pieces` FOREIGN KEY (`Id_Pieces`) REFERENCES `Pieces` (`Id`);

--
-- Contraintes pour la table `Statistiques`
--
ALTER TABLE `Statistiques`
  ADD CONSTRAINT `FK_Statistiques_Id_Capteur` FOREIGN KEY (`Id_Capteur`) REFERENCES `Capteur` (`Id`);
