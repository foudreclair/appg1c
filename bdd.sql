-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Jeu 02 Février 2017 à 13:49
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `bdd`
--

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
(4, 'Alarme', 'Super alarme trop stylÃ©e', '27,89', '6');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Catalogue`
--
ALTER TABLE `Catalogue`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Catalogue`
--
ALTER TABLE `Catalogue`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;