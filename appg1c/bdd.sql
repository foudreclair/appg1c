-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 03 Janvier 2017 à 09:05
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `bdd`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Appartements`
--

INSERT INTO `Appartements` (`Id`, `Nom`, `Type`, `Adresse`, `Ville`, `Pays`, `Nb_personne`, `Id_Utilisateur`) VALUES
(1, 'Appart1', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Capteur`
--

CREATE TABLE `Capteur` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Capteur`
--

INSERT INTO `Capteur` (`Id`, `Nom`) VALUES
(1, 'Tempch1'),
(2, 'Lumch1');

-- --------------------------------------------------------

--
-- Structure de la table `Fonctionnalite`
--

CREATE TABLE `Fonctionnalite` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(25) DEFAULT NULL,
  `Etat` int(11) DEFAULT NULL,
  `Type_donnees` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Pieces`
--

INSERT INTO `Pieces` (`Id`, `Nom`, `Id_Appartements`) VALUES
(1, 'Chambre d''amis', 1),
(2, 'Cuisine', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Programmation`
--

CREATE TABLE `Programmation` (
  `Date_start` date DEFAULT NULL,
  `Date_end` date DEFAULT NULL,
  `Time_start` time DEFAULT NULL,
  `Time_end` time DEFAULT NULL,
  `Consigne` float DEFAULT NULL,
  `Correction` float DEFAULT NULL,
  `Id` int(11) NOT NULL,
  `Id_Fonctionnalite` int(11) NOT NULL,
  `Id_Capteur` int(11) NOT NULL,
  `Id_Pieces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Programmation`
--

INSERT INTO `Programmation` (`Date_start`, `Date_end`, `Time_start`, `Time_end`, `Consigne`, `Correction`, `Id`, `Id_Fonctionnalite`, `Id_Capteur`, `Id_Pieces`) VALUES
('2016-12-13', '2016-12-20', '11:00:00', '14:00:00', 17, NULL, 0, 1, 1, 1),
('2016-12-08', '2016-12-16', '07:00:00', '11:00:00', 20, NULL, 0, 2, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Statistiques`
--

CREATE TABLE `Statistiques` (
  `Id` int(11) NOT NULL,
  `Type` varchar(25) DEFAULT NULL,
  `Valeur` float DEFAULT NULL,
  `Id_Capteur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`Id`, `Mail`, `Password`, `Nom`, `Prenom`, `Date_naissance`, `Permission`) VALUES
(1, 'encule@gmail.com', 'Lourd!', 'Encule', NULL, NULL, NULL),
(2, 'encule@gmail.com', 'Lourd!', 'Encule', NULL, NULL, NULL),
(3, 'encule@gmail.com', 'Lourd!', 'Encule', NULL, NULL, NULL);

--
-- Index pour les tables exportées
--

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
  ADD PRIMARY KEY (`Id`,`Id_Fonctionnalite`,`Id_Capteur`,`Id_Pieces`),
  ADD KEY `FK_Programmation_Id_Fonctionnalite` (`Id_Fonctionnalite`),
  ADD KEY `FK_Programmation_Id_Capteur` (`Id_Capteur`);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Capteur`
--
ALTER TABLE `Capteur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Statistiques`
--
ALTER TABLE `Statistiques`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

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
  ADD CONSTRAINT `FK_Programmation_Id_Fonctionnalite` FOREIGN KEY (`Id_Fonctionnalite`) REFERENCES `Fonctionnalite` (`Id`);

--
-- Contraintes pour la table `Statistiques`
--
ALTER TABLE `Statistiques`
  ADD CONSTRAINT `FK_Statistiques_Id_Capteur` FOREIGN KEY (`Id_Capteur`) REFERENCES `Capteur` (`Id`);
