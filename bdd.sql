-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Dim 05 Février 2017 à 21:57
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `Achats`
--

CREATE TABLE `Achats` (
  `Id` int(10) NOT NULL,
  `Id_Catalogue` int(10) NOT NULL,
  `Quantite` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Expedition` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Id_Commande` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Achats`
--

INSERT INTO `Achats` (`Id`, `Id_Catalogue`, `Quantite`, `Expedition`, `Id_Commande`) VALUES
(27, 1, '1', 'Non', '1'),
(28, 1, '1', 'Oui', '19'),
(29, 1, '1', 'Non', '20'),
(30, 6, '2', 'Non', '21'),
(31, 6, '2', 'Non', '21'),
(32, 6, '2', 'Non', '24'),
(33, 1, '2', 'Non', '25'),
(34, 4, '1', 'Non', '25'),
(35, 1, '1', 'Non', '26'),
(36, 4, '1', 'Non', '26'),
(37, 5, '11', 'Non', '26'),
(38, 6, '4', 'Non', '26');

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
(43, 6, 1),
(44, 8, 2),
(46, 8, 5),
(47, 8, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Appartements`
--

INSERT INTO `Appartements` (`Id`, `Nom`, `Type`, `Adresse`, `Ville`, `Pays`, `Nb_personne`, `Id_Utilisateur`) VALUES
(3, 'Appart g1c', 1, '', '', '', 0, 7),
(4, 'Appart', 1, '', '', '', 0, 7);

-- --------------------------------------------------------

--
-- Structure de la table `Capteur`
--

CREATE TABLE `Capteur` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(25) DEFAULT NULL,
  `Cle_Produit` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Capteur`
--

INSERT INTO `Capteur` (`Id`, `Nom`, `Cle_Produit`) VALUES
(3, 'Temperature', ''),
(7, 'Luminosite', ''),
(40, 'TempCoding', ''),
(41, 'Temp1', ''),
(42, 'TempCuis', ''),
(43, 'TempCuis', ''),
(44, 'LumSalon', ''),
(45, 'CamCuis', ''),
(46, 'CamCuis', ''),
(47, 'HumCuis', 'AZERTYUIOPQS');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Catalogue`
--

INSERT INTO `Catalogue` (`Id`, `Nom`, `Description`, `Prix`, `Id_categorie`) VALUES
(1, 'Capteur 1', 'Capteur de temperature', '19,80', '4'),
(4, 'Alarme', 'Super alarme trop stylÃ©e', '27,89', '6'),
(5, 'Volet dÃ©roulant', 'Volet pour se protÃ©ger du soleil', '40,85', '7'),
(6, 'CaptLum', 'Capteur de lumiÃ¨re', '17,70', '4');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `Id` int(10) NOT NULL,
  `Nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`Id`, `Nom`, `Description`) VALUES
(4, 'Capteurs', ''),
(6, 'SÃ©curitÃ©', ''),
(7, 'Actionneurs', 'Moteurs');

-- --------------------------------------------------------

--
-- Structure de la table `CleAct`
--

CREATE TABLE `CleAct` (
  `Id` int(10) NOT NULL,
  `Cle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Permission` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Activee` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `CleAct`
--

INSERT INTO `CleAct` (`Id`, `Cle`, `Permission`, `Activee`) VALUES
(1, 'AAA-BBB-CCC-DDD', '0', 'Oui'),
(2, 'ABC-ABC-ABC-ABC', '0', 'Oui');

-- --------------------------------------------------------

--
-- Structure de la table `Commande`
--

CREATE TABLE `Commande` (
  `Id` int(10) NOT NULL,
  `Id_Utilisateur` int(10) NOT NULL,
  `Nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Adresse` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `CodePostal` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Ville` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Prix` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Payement` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Commande`
--

INSERT INTO `Commande` (`Id`, `Id_Utilisateur`, `Nom`, `Prenom`, `Adresse`, `CodePostal`, `Ville`, `Date`, `Prix`, `Payement`) VALUES
(18, 0, 'Ne pas supprimer', 'Ne pas supprimer', 'Ne pas supprimer', '', 'Ne pas supprimer', 'Ne pas supprimer', '', ''),
(23, 0, '0', '0', '0', '0', '0', '0', '', ''),
(24, 9, 'de Javel', 'Aymeric', '12 rue de Vanves', '92000', 'Issy les moulineaux', 'February 2, 2017, 6:13 pm', '35.4', 'Non'),
(25, 7, 'G1C', 'Isep', '12 rue de Vanves', '92000', 'Issy les moulineaux', 'February 4, 2017, 2:00 pm', '67.49', 'Non'),
(26, 7, 'G1C', 'Isep', '12 rue de Vanves', '92000', 'Issy les moulineaux', 'February 4, 2017, 4:03 pm', '567.84', 'Non');

-- --------------------------------------------------------

--
-- Structure de la table `Fonctionnalite`
--

CREATE TABLE `Fonctionnalite` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Etat` int(11) DEFAULT NULL,
  `Type_donnees` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Fonctionnalite`
--

INSERT INTO `Fonctionnalite` (`Id`, `Nom`, `Etat`, `Type_donnees`) VALUES
(1, 'Température', NULL, 1),
(2, 'Luminosité', NULL, 2),
(3, 'Humidité', NULL, NULL),
(4, 'Détecteur de particules ', NULL, NULL),
(5, 'Caméra', NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Pieces`
--

INSERT INTO `Pieces` (`Id`, `Nom`, `Id_Appartements`) VALUES
(6, 'Cuisine', 3),
(7, 'Piece', 4),
(8, 'Salon', 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Programmation`
--

INSERT INTO `Programmation` (`Id`, `Date_start`, `Date_end`, `Time_start`, `Time_end`, `Consigne`, `Correction`, `Id_Fonctionnalite`, `Id_Capteur`, `Id_Pieces`, `Id_scenario`) VALUES
(3, 'Lundi', 'Samedi', '00:00', '00:00', '26', NULL, 1, 43, 6, 15),
(4, 'Mercredi', 'Jeudi', '00:00', '00:00', '23', NULL, 1, 43, 6, 16);

-- --------------------------------------------------------

--
-- Structure de la table `Scenario`
--

CREATE TABLE `Scenario` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Recurrence` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Id_Utilisateur` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Scenario`
--

INSERT INTO `Scenario` (`Id`, `Nom`, `Recurrence`, `Id_Utilisateur`) VALUES
(12, 'Ne pas supprimer', 'Non', 0),
(15, 'Semaine', 'Non', 7),
(16, 'Vac', 'Non', 7);

-- --------------------------------------------------------

--
-- Structure de la table `Statistiques`
--

CREATE TABLE `Statistiques` (
  `Id` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Type` varchar(25) DEFAULT NULL,
  `Valeur` float DEFAULT NULL,
  `Id_Capteur` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=408 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Statistiques`
--

INSERT INTO `Statistiques` (`Id`, `Date`, `Type`, `Valeur`, `Id_Capteur`) VALUES
(1, '0000-00-00 00:00:00', 'Degré', 23, 3),
(2, '0000-00-00 00:00:00', 'Degré', 23, 3),
(3, '0000-00-00 00:00:00', 'Degré', 25, 3),
(4, '0000-00-00 00:00:00', 'Degré', 29, 3),
(5, '0000-00-00 00:00:00', 'Degré', 19, 3),
(6, '0000-00-00 00:00:00', 'Lux', 80, 7),
(7, '2017-02-05 03:52:15', 'DegrÃ©', 20, 3),
(8, '2017-02-05 03:59:55', 'DegrÃ©', 20, 3),
(9, '2017-02-05 03:59:55', 'Lux', 17, 7),
(10, '2017-02-05 03:59:55', 'DegrÃ©', 23, 40),
(11, '2017-02-05 03:59:55', 'DegrÃ©', 17, 41),
(12, '2017-02-05 03:59:55', 'DegrÃ©', 19, 42),
(13, '2017-02-05 03:59:55', 'DegrÃ©', 25, 43),
(14, '2017-02-05 03:59:55', 'Lux', 95, 44),
(15, '2017-02-05 03:59:55', '%', 63, 47),
(16, '2017-02-05 03:59:56', 'DegrÃ©', 18, 3),
(17, '2017-02-05 03:59:56', 'Lux', 28, 7),
(18, '2017-02-05 03:59:56', 'DegrÃ©', 15, 40),
(19, '2017-02-05 03:59:56', 'DegrÃ©', 23, 41),
(20, '2017-02-05 03:59:56', 'DegrÃ©', 17, 42),
(21, '2017-02-05 03:59:56', 'DegrÃ©', 20, 43),
(22, '2017-02-05 03:59:56', 'Lux', 25, 44),
(23, '2017-02-05 03:59:56', '%', 75, 47),
(24, '2017-02-05 03:59:57', 'DegrÃ©', 15, 3),
(25, '2017-02-05 03:59:57', 'Lux', 106, 7),
(26, '2017-02-05 03:59:57', 'DegrÃ©', 22, 40),
(27, '2017-02-05 03:59:57', 'DegrÃ©', 23, 41),
(28, '2017-02-05 03:59:57', 'DegrÃ©', 24, 42),
(29, '2017-02-05 03:59:57', 'DegrÃ©', 15, 43),
(30, '2017-02-05 03:59:57', 'Lux', 123, 44),
(31, '2017-02-05 03:59:57', '%', 31, 47),
(32, '2017-02-05 03:59:58', 'DegrÃ©', 17, 3),
(33, '2017-02-05 03:59:58', 'Lux', 119, 7),
(34, '2017-02-05 03:59:58', 'DegrÃ©', 16, 40),
(35, '2017-02-05 03:59:58', 'DegrÃ©', 18, 41),
(36, '2017-02-05 03:59:58', 'DegrÃ©', 16, 42),
(37, '2017-02-05 03:59:58', 'DegrÃ©', 24, 43),
(38, '2017-02-05 03:59:58', 'Lux', 48, 44),
(39, '2017-02-05 03:59:58', '%', 61, 47),
(40, '2017-02-05 03:59:59', 'DegrÃ©', 25, 3),
(41, '2017-02-05 03:59:59', 'Lux', 23, 7),
(42, '2017-02-05 03:59:59', 'DegrÃ©', 24, 40),
(43, '2017-02-05 03:59:59', 'DegrÃ©', 19, 41),
(44, '2017-02-05 03:59:59', 'DegrÃ©', 16, 42),
(45, '2017-02-05 03:59:59', 'DegrÃ©', 21, 43),
(46, '2017-02-05 03:59:59', 'Lux', 9, 44),
(47, '2017-02-05 03:59:59', '%', 49, 47),
(48, '2017-02-05 04:00:00', 'DegrÃ©', 23, 3),
(49, '2017-02-05 04:00:00', 'Lux', 11, 7),
(50, '2017-02-05 04:00:00', 'DegrÃ©', 16, 40),
(51, '2017-02-05 04:00:00', 'DegrÃ©', 15, 41),
(52, '2017-02-05 04:00:00', 'DegrÃ©', 20, 42),
(53, '2017-02-05 04:00:00', 'DegrÃ©', 18, 43),
(54, '2017-02-05 04:00:00', 'Lux', 121, 44),
(55, '2017-02-05 04:00:00', '%', 60, 47),
(56, '2017-02-05 04:00:01', 'DegrÃ©', 16, 3),
(57, '2017-02-05 04:00:01', 'Lux', 85, 7),
(58, '2017-02-05 04:00:01', 'DegrÃ©', 18, 40),
(59, '2017-02-05 04:00:01', 'DegrÃ©', 15, 41),
(60, '2017-02-05 04:00:01', 'DegrÃ©', 23, 42),
(61, '2017-02-05 04:00:01', 'DegrÃ©', 18, 43),
(62, '2017-02-05 04:00:01', 'Lux', 17, 44),
(63, '2017-02-05 04:00:01', '%', 80, 47),
(64, '2017-02-05 04:00:02', 'DegrÃ©', 18, 3),
(65, '2017-02-05 04:00:02', 'Lux', 31, 7),
(66, '2017-02-05 04:00:02', 'DegrÃ©', 18, 40),
(67, '2017-02-05 04:00:02', 'DegrÃ©', 19, 41),
(68, '2017-02-05 04:00:02', 'DegrÃ©', 15, 42),
(69, '2017-02-05 04:00:02', 'DegrÃ©', 22, 43),
(70, '2017-02-05 04:00:02', 'Lux', 9, 44),
(71, '2017-02-05 04:00:02', '%', 33, 47),
(72, '2017-02-05 04:00:03', 'DegrÃ©', 24, 3),
(73, '2017-02-05 04:00:03', 'Lux', 110, 7),
(74, '2017-02-05 04:00:03', 'DegrÃ©', 19, 40),
(75, '2017-02-05 04:00:03', 'DegrÃ©', 25, 41),
(76, '2017-02-05 04:00:03', 'DegrÃ©', 20, 42),
(77, '2017-02-05 04:00:03', 'DegrÃ©', 20, 43),
(78, '2017-02-05 04:00:03', 'Lux', 42, 44),
(79, '2017-02-05 04:00:03', '%', 42, 47),
(80, '2017-02-05 04:00:04', 'DegrÃ©', 20, 3),
(81, '2017-02-05 04:00:04', 'Lux', 62, 7),
(82, '2017-02-05 04:00:04', 'DegrÃ©', 18, 40),
(83, '2017-02-05 04:00:04', 'DegrÃ©', 15, 41),
(84, '2017-02-05 04:00:04', 'DegrÃ©', 23, 42),
(85, '2017-02-05 04:00:04', 'DegrÃ©', 17, 43),
(86, '2017-02-05 04:00:04', 'Lux', 83, 44),
(87, '2017-02-05 04:00:04', '%', 80, 47),
(88, '2017-02-05 04:00:05', 'DegrÃ©', 25, 3),
(89, '2017-02-05 04:00:05', 'Lux', 125, 7),
(90, '2017-02-05 04:00:05', 'DegrÃ©', 15, 40),
(91, '2017-02-05 04:00:05', 'DegrÃ©', 22, 41),
(92, '2017-02-05 04:00:05', 'DegrÃ©', 18, 42),
(93, '2017-02-05 04:00:05', 'DegrÃ©', 16, 43),
(94, '2017-02-05 04:00:05', 'Lux', 83, 44),
(95, '2017-02-05 04:00:05', '%', 60, 47),
(96, '2017-02-05 04:00:06', 'DegrÃ©', 19, 3),
(97, '2017-02-05 04:00:06', 'Lux', 122, 7),
(98, '2017-02-05 04:00:06', 'DegrÃ©', 15, 40),
(99, '2017-02-05 04:00:06', 'DegrÃ©', 20, 41),
(100, '2017-02-05 04:00:06', 'DegrÃ©', 22, 42),
(101, '2017-02-05 04:00:06', 'DegrÃ©', 15, 43),
(102, '2017-02-05 04:00:06', 'Lux', 68, 44),
(103, '2017-02-05 04:00:06', '%', 54, 47),
(104, '2017-02-05 04:00:07', 'DegrÃ©', 25, 3),
(105, '2017-02-05 04:00:07', 'Lux', 123, 7),
(106, '2017-02-05 04:00:07', 'DegrÃ©', 19, 40),
(107, '2017-02-05 04:00:07', 'DegrÃ©', 19, 41),
(108, '2017-02-05 04:00:07', 'DegrÃ©', 20, 42),
(109, '2017-02-05 04:00:07', 'DegrÃ©', 22, 43),
(110, '2017-02-05 04:00:07', 'Lux', 81, 44),
(111, '2017-02-05 04:00:07', '%', 80, 47),
(112, '2017-02-05 04:00:08', 'DegrÃ©', 17, 3),
(113, '2017-02-05 04:00:08', 'Lux', 118, 7),
(114, '2017-02-05 04:00:08', 'DegrÃ©', 15, 40),
(115, '2017-02-05 04:00:08', 'DegrÃ©', 15, 41),
(116, '2017-02-05 04:00:08', 'DegrÃ©', 17, 42),
(117, '2017-02-05 04:00:08', 'DegrÃ©', 22, 43),
(118, '2017-02-05 04:00:08', 'Lux', 125, 44),
(119, '2017-02-05 04:00:08', '%', 36, 47),
(120, '2017-02-05 04:00:09', 'DegrÃ©', 22, 3),
(121, '2017-02-05 04:00:09', 'Lux', 12, 7),
(122, '2017-02-05 04:00:09', 'DegrÃ©', 23, 40),
(123, '2017-02-05 04:00:09', 'DegrÃ©', 15, 41),
(124, '2017-02-05 04:00:09', 'DegrÃ©', 17, 42),
(125, '2017-02-05 04:00:09', 'DegrÃ©', 20, 43),
(126, '2017-02-05 04:00:09', 'Lux', 80, 44),
(127, '2017-02-05 04:00:09', '%', 60, 47),
(128, '2017-02-05 04:00:10', 'DegrÃ©', 19, 3),
(129, '2017-02-05 04:00:10', 'Lux', 81, 7),
(130, '2017-02-05 04:00:10', 'DegrÃ©', 15, 40),
(131, '2017-02-05 04:00:10', 'DegrÃ©', 15, 41),
(132, '2017-02-05 04:00:10', 'DegrÃ©', 22, 42),
(133, '2017-02-05 04:00:10', 'DegrÃ©', 21, 43),
(134, '2017-02-05 04:00:10', 'Lux', 72, 44),
(135, '2017-02-05 04:00:10', '%', 60, 47),
(136, '2017-02-05 04:00:11', 'DegrÃ©', 21, 3),
(137, '2017-02-05 04:00:11', 'Lux', 122, 7),
(138, '2017-02-05 04:00:11', 'DegrÃ©', 25, 40),
(139, '2017-02-05 04:00:11', 'DegrÃ©', 15, 41),
(140, '2017-02-05 04:00:11', 'DegrÃ©', 22, 42),
(141, '2017-02-05 04:00:11', 'DegrÃ©', 21, 43),
(142, '2017-02-05 04:00:11', 'Lux', 7, 44),
(143, '2017-02-05 04:00:11', '%', 75, 47),
(144, '2017-02-05 04:00:12', 'DegrÃ©', 21, 3),
(145, '2017-02-05 04:00:12', 'Lux', 11, 7),
(146, '2017-02-05 04:00:12', 'DegrÃ©', 24, 40),
(147, '2017-02-05 04:00:12', 'DegrÃ©', 23, 41),
(148, '2017-02-05 04:00:12', 'DegrÃ©', 23, 42),
(149, '2017-02-05 04:00:12', 'DegrÃ©', 24, 43),
(150, '2017-02-05 04:00:12', 'Lux', 113, 44),
(151, '2017-02-05 04:00:12', '%', 51, 47),
(152, '2017-02-05 04:00:13', 'DegrÃ©', 25, 3),
(153, '2017-02-05 04:00:13', 'Lux', 89, 7),
(154, '2017-02-05 04:00:13', 'DegrÃ©', 19, 40),
(155, '2017-02-05 04:00:13', 'DegrÃ©', 17, 41),
(156, '2017-02-05 04:00:13', 'DegrÃ©', 16, 42),
(157, '2017-02-05 04:00:13', 'DegrÃ©', 15, 43),
(158, '2017-02-05 04:00:13', 'Lux', 100, 44),
(159, '2017-02-05 04:00:13', '%', 59, 47),
(160, '2017-02-05 04:00:14', 'DegrÃ©', 22, 3),
(161, '2017-02-05 04:00:14', 'Lux', 107, 7),
(162, '2017-02-05 04:00:14', 'DegrÃ©', 22, 40),
(163, '2017-02-05 04:00:14', 'DegrÃ©', 19, 41),
(164, '2017-02-05 04:00:14', 'DegrÃ©', 19, 42),
(165, '2017-02-05 04:00:14', 'DegrÃ©', 17, 43),
(166, '2017-02-05 04:00:14', 'Lux', 123, 44),
(167, '2017-02-05 04:00:14', '%', 30, 47),
(168, '2017-02-05 04:00:15', 'DegrÃ©', 17, 3),
(169, '2017-02-05 04:00:15', 'Lux', 121, 7),
(170, '2017-02-05 04:00:15', 'DegrÃ©', 15, 40),
(171, '2017-02-05 04:00:15', 'DegrÃ©', 24, 41),
(172, '2017-02-05 04:00:15', 'DegrÃ©', 21, 42),
(173, '2017-02-05 04:00:15', 'DegrÃ©', 15, 43),
(174, '2017-02-05 04:00:15', 'Lux', 100, 44),
(175, '2017-02-05 04:00:15', '%', 36, 47),
(176, '2017-02-05 04:00:16', 'DegrÃ©', 16, 3),
(177, '2017-02-05 04:00:16', 'Lux', 89, 7),
(178, '2017-02-05 04:00:16', 'DegrÃ©', 24, 40),
(179, '2017-02-05 04:00:16', 'DegrÃ©', 24, 41),
(180, '2017-02-05 04:00:16', 'DegrÃ©', 21, 42),
(181, '2017-02-05 04:00:16', 'DegrÃ©', 23, 43),
(182, '2017-02-05 04:00:16', 'Lux', 38, 44),
(183, '2017-02-05 04:00:16', '%', 59, 47),
(184, '2017-02-05 04:00:17', 'DegrÃ©', 20, 3),
(185, '2017-02-05 04:00:17', 'Lux', 91, 7),
(186, '2017-02-05 04:00:17', 'DegrÃ©', 23, 40),
(187, '2017-02-05 04:00:17', 'DegrÃ©', 22, 41),
(188, '2017-02-05 04:00:17', 'DegrÃ©', 23, 42),
(189, '2017-02-05 04:00:17', 'DegrÃ©', 21, 43),
(190, '2017-02-05 04:00:17', 'Lux', 33, 44),
(191, '2017-02-05 04:00:17', '%', 53, 47),
(192, '2017-02-05 04:00:18', 'DegrÃ©', 19, 3),
(193, '2017-02-05 04:00:18', 'Lux', 113, 7),
(194, '2017-02-05 04:00:18', 'DegrÃ©', 24, 40),
(195, '2017-02-05 04:00:18', 'DegrÃ©', 24, 41),
(196, '2017-02-05 04:00:18', 'DegrÃ©', 16, 42),
(197, '2017-02-05 04:00:18', 'DegrÃ©', 23, 43),
(198, '2017-02-05 04:00:18', 'Lux', 108, 44),
(199, '2017-02-05 04:00:18', '%', 45, 47),
(200, '2017-02-05 04:00:19', 'DegrÃ©', 23, 3),
(201, '2017-02-05 04:00:19', 'Lux', 112, 7),
(202, '2017-02-05 04:00:19', 'DegrÃ©', 17, 40),
(203, '2017-02-05 04:00:19', 'DegrÃ©', 18, 41),
(204, '2017-02-05 04:00:19', 'DegrÃ©', 25, 42),
(205, '2017-02-05 04:00:19', 'DegrÃ©', 25, 43),
(206, '2017-02-05 04:00:19', 'Lux', 62, 44),
(207, '2017-02-05 04:00:19', '%', 32, 47),
(208, '2017-02-05 04:00:20', 'DegrÃ©', 22, 3),
(209, '2017-02-05 04:00:20', 'Lux', 49, 7),
(210, '2017-02-05 04:00:20', 'DegrÃ©', 24, 40),
(211, '2017-02-05 04:00:20', 'DegrÃ©', 18, 41),
(212, '2017-02-05 04:00:20', 'DegrÃ©', 16, 42),
(213, '2017-02-05 04:00:20', 'DegrÃ©', 16, 43),
(214, '2017-02-05 04:00:20', 'Lux', 110, 44),
(215, '2017-02-05 04:00:20', '%', 63, 47),
(216, '2017-02-05 04:00:21', 'DegrÃ©', 24, 3),
(217, '2017-02-05 04:00:21', 'Lux', 81, 7),
(218, '2017-02-05 04:00:21', 'DegrÃ©', 18, 40),
(219, '2017-02-05 04:00:21', 'DegrÃ©', 22, 41),
(220, '2017-02-05 04:00:21', 'DegrÃ©', 16, 42),
(221, '2017-02-05 04:00:21', 'DegrÃ©', 20, 43),
(222, '2017-02-05 04:00:21', 'Lux', 18, 44),
(223, '2017-02-05 04:00:21', '%', 59, 47),
(224, '2017-02-05 04:00:22', 'DegrÃ©', 19, 3),
(225, '2017-02-05 04:00:22', 'Lux', 118, 7),
(226, '2017-02-05 04:00:22', 'DegrÃ©', 19, 40),
(227, '2017-02-05 04:00:22', 'DegrÃ©', 21, 41),
(228, '2017-02-05 04:00:22', 'DegrÃ©', 23, 42),
(229, '2017-02-05 04:00:22', 'DegrÃ©', 18, 43),
(230, '2017-02-05 04:00:22', 'Lux', 109, 44),
(231, '2017-02-05 04:00:22', '%', 56, 47),
(232, '2017-02-05 04:00:23', 'DegrÃ©', 16, 3),
(233, '2017-02-05 04:00:23', 'Lux', 12, 7),
(234, '2017-02-05 04:00:23', 'DegrÃ©', 24, 40),
(235, '2017-02-05 04:00:23', 'DegrÃ©', 16, 41),
(236, '2017-02-05 04:00:23', 'DegrÃ©', 15, 42),
(237, '2017-02-05 04:00:23', 'DegrÃ©', 18, 43),
(238, '2017-02-05 04:00:23', 'Lux', 22, 44),
(239, '2017-02-05 04:00:23', '%', 68, 47),
(240, '2017-02-05 04:00:24', 'DegrÃ©', 22, 3),
(241, '2017-02-05 04:00:24', 'Lux', 10, 7),
(242, '2017-02-05 04:00:24', 'DegrÃ©', 15, 40),
(243, '2017-02-05 04:00:24', 'DegrÃ©', 24, 41),
(244, '2017-02-05 04:00:24', 'DegrÃ©', 17, 42),
(245, '2017-02-05 04:00:24', 'DegrÃ©', 25, 43),
(246, '2017-02-05 04:00:24', 'Lux', 66, 44),
(247, '2017-02-05 04:00:24', '%', 34, 47),
(248, '2017-02-05 04:00:25', 'DegrÃ©', 21, 3),
(249, '2017-02-05 04:00:25', 'Lux', 102, 7),
(250, '2017-02-05 04:00:25', 'DegrÃ©', 23, 40),
(251, '2017-02-05 04:00:25', 'DegrÃ©', 23, 41),
(252, '2017-02-05 04:00:25', 'DegrÃ©', 18, 42),
(253, '2017-02-05 04:00:25', 'DegrÃ©', 24, 43),
(254, '2017-02-05 04:00:25', 'Lux', 43, 44),
(255, '2017-02-05 04:00:25', '%', 69, 47),
(256, '2017-02-05 04:00:26', 'DegrÃ©', 23, 3),
(257, '2017-02-05 04:00:26', 'Lux', 95, 7),
(258, '2017-02-05 04:00:26', 'DegrÃ©', 18, 40),
(259, '2017-02-05 04:00:26', 'DegrÃ©', 21, 41),
(260, '2017-02-05 04:00:26', 'DegrÃ©', 15, 42),
(261, '2017-02-05 04:00:26', 'DegrÃ©', 16, 43),
(262, '2017-02-05 04:00:26', 'Lux', 12, 44),
(263, '2017-02-05 04:00:26', '%', 39, 47),
(264, '2017-02-05 04:00:27', 'DegrÃ©', 17, 3),
(265, '2017-02-05 04:00:27', 'Lux', 116, 7),
(266, '2017-02-05 04:00:27', 'DegrÃ©', 18, 40),
(267, '2017-02-05 04:00:27', 'DegrÃ©', 18, 41),
(268, '2017-02-05 04:00:27', 'DegrÃ©', 17, 42),
(269, '2017-02-05 04:00:27', 'DegrÃ©', 19, 43),
(270, '2017-02-05 04:00:27', 'Lux', 12, 44),
(271, '2017-02-05 04:00:27', '%', 78, 47),
(272, '2017-02-05 04:00:28', 'DegrÃ©', 20, 3),
(273, '2017-02-05 04:00:28', 'Lux', 19, 7),
(274, '2017-02-05 04:00:28', 'DegrÃ©', 23, 40),
(275, '2017-02-05 04:00:28', 'DegrÃ©', 22, 41),
(276, '2017-02-05 04:00:28', 'DegrÃ©', 15, 42),
(277, '2017-02-05 04:00:28', 'DegrÃ©', 18, 43),
(278, '2017-02-05 04:00:28', 'Lux', 98, 44),
(279, '2017-02-05 04:00:28', '%', 61, 47),
(280, '2017-02-05 04:00:29', 'DegrÃ©', 16, 3),
(281, '2017-02-05 04:00:29', 'Lux', 68, 7),
(282, '2017-02-05 04:00:29', 'DegrÃ©', 18, 40),
(283, '2017-02-05 04:00:29', 'DegrÃ©', 20, 41),
(284, '2017-02-05 04:00:29', 'DegrÃ©', 19, 42),
(285, '2017-02-05 04:00:29', 'DegrÃ©', 22, 43),
(286, '2017-02-05 04:00:29', 'Lux', 35, 44),
(287, '2017-02-05 04:00:29', '%', 39, 47),
(288, '2017-02-05 04:00:30', 'DegrÃ©', 19, 3),
(289, '2017-02-05 04:00:30', 'Lux', 74, 7),
(290, '2017-02-05 04:00:30', 'DegrÃ©', 23, 40),
(291, '2017-02-05 04:00:30', 'DegrÃ©', 19, 41),
(292, '2017-02-05 04:00:30', 'DegrÃ©', 23, 42),
(293, '2017-02-05 04:00:30', 'DegrÃ©', 23, 43),
(294, '2017-02-05 04:00:30', 'Lux', 79, 44),
(295, '2017-02-05 04:00:30', '%', 80, 47),
(296, '2017-02-05 04:00:31', 'DegrÃ©', 22, 3),
(297, '2017-02-05 04:00:31', 'Lux', 112, 7),
(298, '2017-02-05 04:00:31', 'DegrÃ©', 18, 40),
(299, '2017-02-05 04:00:31', 'DegrÃ©', 25, 41),
(300, '2017-02-05 04:00:31', 'DegrÃ©', 18, 42),
(301, '2017-02-05 04:00:31', 'DegrÃ©', 19, 43),
(302, '2017-02-05 04:00:31', 'Lux', 116, 44),
(303, '2017-02-05 04:00:31', '%', 69, 47),
(304, '2017-02-05 04:00:32', 'DegrÃ©', 20, 3),
(305, '2017-02-05 04:00:32', 'Lux', 94, 7),
(306, '2017-02-05 04:00:32', 'DegrÃ©', 19, 40),
(307, '2017-02-05 04:00:32', 'DegrÃ©', 20, 41),
(308, '2017-02-05 04:00:32', 'DegrÃ©', 15, 42),
(309, '2017-02-05 04:00:32', 'DegrÃ©', 17, 43),
(310, '2017-02-05 04:00:32', 'Lux', 23, 44),
(311, '2017-02-05 04:00:32', '%', 40, 47),
(312, '2017-02-05 04:00:33', 'DegrÃ©', 23, 3),
(313, '2017-02-05 04:00:33', 'Lux', 66, 7),
(314, '2017-02-05 04:00:33', 'DegrÃ©', 22, 40),
(315, '2017-02-05 04:00:33', 'DegrÃ©', 16, 41),
(316, '2017-02-05 04:00:33', 'DegrÃ©', 16, 42),
(317, '2017-02-05 04:00:33', 'DegrÃ©', 25, 43),
(318, '2017-02-05 04:00:33', 'Lux', 43, 44),
(319, '2017-02-05 04:00:33', '%', 60, 47),
(320, '2017-02-05 04:00:34', 'DegrÃ©', 20, 3),
(321, '2017-02-05 04:00:34', 'Lux', 10, 7),
(322, '2017-02-05 04:00:34', 'DegrÃ©', 15, 40),
(323, '2017-02-05 04:00:34', 'DegrÃ©', 17, 41),
(324, '2017-02-05 04:00:34', 'DegrÃ©', 24, 42),
(325, '2017-02-05 04:00:34', 'DegrÃ©', 22, 43),
(326, '2017-02-05 04:00:34', 'Lux', 36, 44),
(327, '2017-02-05 04:00:34', '%', 57, 47),
(328, '2017-02-05 04:00:35', 'DegrÃ©', 20, 3),
(329, '2017-02-05 04:00:35', 'Lux', 73, 7),
(330, '2017-02-05 04:00:35', 'DegrÃ©', 20, 40),
(331, '2017-02-05 04:00:35', 'DegrÃ©', 24, 41),
(332, '2017-02-05 04:00:35', 'DegrÃ©', 25, 42),
(333, '2017-02-05 04:00:35', 'DegrÃ©', 19, 43),
(334, '2017-02-05 04:00:35', 'Lux', 81, 44),
(335, '2017-02-05 04:00:35', '%', 51, 47),
(336, '2017-02-05 04:00:36', 'DegrÃ©', 16, 3),
(337, '2017-02-05 04:00:36', 'Lux', 15, 7),
(338, '2017-02-05 04:00:36', 'DegrÃ©', 25, 40),
(339, '2017-02-05 04:00:36', 'DegrÃ©', 17, 41),
(340, '2017-02-05 04:00:36', 'DegrÃ©', 18, 42),
(341, '2017-02-05 04:00:36', 'DegrÃ©', 16, 43),
(342, '2017-02-05 04:00:36', 'Lux', 58, 44),
(343, '2017-02-05 04:00:36', '%', 33, 47),
(344, '2017-02-05 04:00:37', 'DegrÃ©', 21, 3),
(345, '2017-02-05 04:00:37', 'Lux', 20, 7),
(346, '2017-02-05 04:00:37', 'DegrÃ©', 17, 40),
(347, '2017-02-05 04:00:37', 'DegrÃ©', 23, 41),
(348, '2017-02-05 04:00:37', 'DegrÃ©', 15, 42),
(349, '2017-02-05 04:00:37', 'DegrÃ©', 20, 43),
(350, '2017-02-05 04:00:37', 'Lux', 54, 44),
(351, '2017-02-05 04:00:37', '%', 59, 47),
(352, '2017-02-05 04:00:38', 'DegrÃ©', 21, 3),
(353, '2017-02-05 04:00:38', 'Lux', 58, 7),
(354, '2017-02-05 04:00:38', 'DegrÃ©', 24, 40),
(355, '2017-02-05 04:00:38', 'DegrÃ©', 19, 41),
(356, '2017-02-05 04:00:38', 'DegrÃ©', 16, 42),
(357, '2017-02-05 04:00:38', 'DegrÃ©', 16, 43),
(358, '2017-02-05 04:00:38', 'Lux', 120, 44),
(359, '2017-02-05 04:00:38', '%', 62, 47),
(360, '2017-02-05 04:00:39', 'DegrÃ©', 22, 3),
(361, '2017-02-05 04:00:39', 'Lux', 61, 7),
(362, '2017-02-05 04:00:39', 'DegrÃ©', 20, 40),
(363, '2017-02-05 04:00:39', 'DegrÃ©', 21, 41),
(364, '2017-02-05 04:00:39', 'DegrÃ©', 24, 42),
(365, '2017-02-05 04:00:39', 'DegrÃ©', 16, 43),
(366, '2017-02-05 04:00:39', 'Lux', 10, 44),
(367, '2017-02-05 04:00:39', '%', 33, 47),
(368, '2017-02-05 04:00:40', 'DegrÃ©', 17, 3),
(369, '2017-02-05 04:00:40', 'Lux', 7, 7),
(370, '2017-02-05 04:00:40', 'DegrÃ©', 18, 40),
(371, '2017-02-05 04:00:40', 'DegrÃ©', 20, 41),
(372, '2017-02-05 04:00:40', 'DegrÃ©', 16, 42),
(373, '2017-02-05 04:00:40', 'DegrÃ©', 23, 43),
(374, '2017-02-05 04:00:40', 'Lux', 77, 44),
(375, '2017-02-05 04:00:40', '%', 69, 47),
(376, '2017-02-05 04:00:41', 'DegrÃ©', 24, 3),
(377, '2017-02-05 04:00:41', 'Lux', 102, 7),
(378, '2017-02-05 04:00:41', 'DegrÃ©', 21, 40),
(379, '2017-02-05 04:00:41', 'DegrÃ©', 25, 41),
(380, '2017-02-05 04:00:41', 'DegrÃ©', 18, 42),
(381, '2017-02-05 04:00:41', 'DegrÃ©', 25, 43),
(382, '2017-02-05 04:00:41', 'Lux', 68, 44),
(383, '2017-02-05 04:00:41', '%', 76, 47),
(384, '2017-02-05 04:00:42', 'DegrÃ©', 19, 3),
(385, '2017-02-05 04:00:42', 'Lux', 50, 7),
(386, '2017-02-05 04:00:42', 'DegrÃ©', 18, 40),
(387, '2017-02-05 04:00:42', 'DegrÃ©', 20, 41),
(388, '2017-02-05 04:00:42', 'DegrÃ©', 20, 42),
(389, '2017-02-05 04:00:42', 'DegrÃ©', 17, 43),
(390, '2017-02-05 04:00:42', 'Lux', 25, 44),
(391, '2017-02-05 04:00:42', '%', 38, 47),
(392, '2017-02-05 04:00:43', 'DegrÃ©', 23, 3),
(393, '2017-02-05 04:00:43', 'Lux', 85, 7),
(394, '2017-02-05 04:00:43', 'DegrÃ©', 23, 40),
(395, '2017-02-05 04:00:43', 'DegrÃ©', 21, 41),
(396, '2017-02-05 04:00:43', 'DegrÃ©', 23, 42),
(397, '2017-02-05 04:00:43', 'DegrÃ©', 24, 43),
(398, '2017-02-05 04:00:43', 'Lux', 90, 44),
(399, '2017-02-05 04:00:43', '%', 30, 47),
(400, '2017-02-05 04:00:44', 'DegrÃ©', 24, 3),
(401, '2017-02-05 04:00:44', 'Lux', 6, 7),
(402, '2017-02-05 04:00:44', 'DegrÃ©', 20, 40),
(403, '2017-02-05 04:00:44', 'DegrÃ©', 25, 41),
(404, '2017-02-05 04:00:44', 'DegrÃ©', 23, 42),
(405, '2017-02-05 04:00:44', 'DegrÃ©', 16, 43),
(406, '2017-02-05 04:00:44', 'Lux', 97, 44),
(407, '2017-02-05 04:00:44', '%', 62, 47);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`Id`, `Mail`, `Password`, `Nom`, `Prenom`, `Date_naissance`, `Permission`) VALUES
(7, 'isepg1c2016@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'G1C', 'Isep', '01/01/2000', 1),
(8, 'aymeric@dejavel.fr', 'b8489c3d1018dc378c6f2c1bf5bd8c69b16290e2', 'de Javel', 'Aymeric', '10/03/2000', NULL),
(9, 'ay@gmail.com', 'b8489c3d1018dc378c6f2c1bf5bd8c69b16290e2', 'de Javel', 'Aymeric', '02/02/2017', NULL),
(10, 'stef@gmail.com', 'b8489c3d1018dc378c6f2c1bf5bd8c69b16290e2', 'Stef', 'Lecon', '12/12/2000', NULL),
(11, 'stefcardoux@gmail.com', 'b8489c3d1018dc378c6f2c1bf5bd8c69b16290e2', 'Cardoux', 'Stef', '12/10/1996', 0),
(12, 'stecardoux@gmail.com', 'b8489c3d1018dc378c6f2c1bf5bd8c69b16290e2', 'Cardoux', 'Ste', '12/10/1996', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Achats`
--
ALTER TABLE `Achats`
  ADD PRIMARY KEY (`Id`);

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
-- Index pour la table `CleAct`
--
ALTER TABLE `CleAct`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
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
-- AUTO_INCREMENT pour la table `Achats`
--
ALTER TABLE `Achats`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT pour la table `Appartements`
--
ALTER TABLE `Appartements`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Capteur`
--
ALTER TABLE `Capteur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT pour la table `Catalogue`
--
ALTER TABLE `Catalogue`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `CleAct`
--
ALTER TABLE `CleAct`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `Fonctionnalite`
--
ALTER TABLE `Fonctionnalite`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Pannes`
--
ALTER TABLE `Pannes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Pieces`
--
ALTER TABLE `Pieces`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `Programmation`
--
ALTER TABLE `Programmation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Scenario`
--
ALTER TABLE `Scenario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `Statistiques`
--
ALTER TABLE `Statistiques`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=408;
--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
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
