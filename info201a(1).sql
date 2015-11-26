-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 26 Novembre 2015 à 01:29
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `info201a`
--

-- --------------------------------------------------------

--
-- Structure de la table `vr_grp4_clients`
--

CREATE TABLE IF NOT EXISTS `vr_grp4_clients` (
  `Client` varchar(32) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Login` varchar(50) NOT NULL,
  `MotDePasse` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`Client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vr_grp4_clients`
--

INSERT INTO `vr_grp4_clients` (`Client`, `Nom`, `Prenom`, `Login`, `MotDePasse`, `Email`) VALUES
('ee8ed0970f9ad9cc51c113e4c9a8a710', '', '', 'Test', '0c766e329db574ba9e943e38866faae7', 'John.Doe@gmail.com'),
('15de408a5a', '', '', 'testeuh', '0c766e329db574ba9e943e38866faae7', 'Jog@lol.com');

-- --------------------------------------------------------

--
-- Structure de la table `vr_grp4_jeuxludotheque`
--

CREATE TABLE IF NOT EXISTS `vr_grp4_jeuxludotheque` (
  `ID_JEUX` int(30) NOT NULL AUTO_INCREMENT,
  `NbJeux` int(11) NOT NULL,
  `NbJeuxDispos` int(11) NOT NULL,
  PRIMARY KEY (`ID_JEUX`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `vr_grp4_jeuxludotheque`
--

INSERT INTO `vr_grp4_jeuxludotheque` (`ID_JEUX`, `NbJeux`, `NbJeuxDispos`) VALUES
(1, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `vr_grp4_jeux_test`
--

CREATE TABLE IF NOT EXISTS `vr_grp4_jeux_test` (
  `ID_JEUX` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) NOT NULL,
  `Desc` text NOT NULL,
  `Genre` varchar(30) NOT NULL,
  `Support` varchar(30) NOT NULL,
  `Ages` varchar(5) NOT NULL,
  `NbJoueurs` varchar(5) NOT NULL,
  `Sortie` date NOT NULL,
  PRIMARY KEY (`ID_JEUX`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `vr_grp4_jeux_test`
--

INSERT INTO `vr_grp4_jeux_test` (`ID_JEUX`, `Nom`, `Desc`, `Genre`, `Support`, `Ages`, `NbJoueurs`, `Sortie`) VALUES
(1, 'Pokemon Emeraude', 'Un gosse de 11 ans part braconner des animaux afin de les faire combattre avec d''autres dresseurs, dans le but de blesser mortellement les pauvres créatures et d''extorquer de l''argent aux braconniers. Le but ultime est de vaincre une mafia rampante et de terrasser le Conseil des 4, afin de devenir le plus grand dresseur de tous les temps.', 'RPG/Aventure', 'GBA', '3+', '1-4', '2015-11-02'),
(2, 'Pokemon Rubis', 'Un gosse de 11 ans part braconner des animaux afin de les faire combattre avec d''autres dresseurs, dans le but de blesser mortellement les pauvres créatures et d''extorquer de l''argent aux braconniers. Le but ultime est de vaincre une mafia rampante et de terrasser le Conseil des 4, afin de devenir le plus grand dresseur de tous les temps.\n', 'RPG/Aventure', 'GBA', '3+', '1-4', '2015-11-24'),
(3, 'Pokemon Saphir', 'Un gosse de 11 ans part braconner des animaux afin de les faire combattre avec d''autres dresseurs, dans le but de blesser mortellement les pauvres créatures et d''extorquer de l''argent aux braconniers. Le but ultime est de vaincre une mafia rampante et de terrasser le Conseil des 4, afin de devenir le plus grand dresseur de tous les temps. - Un gosse de 11 ans part braconner des animaux afin de les faire combattre avec d''autres dresseurs, dans le but de blesser mortellement les pauvres créatures et d''extorquer de l''argent aux braconniers. Le but ultime est de vaincre une mafia rampante et de terrasser le Conseil des 4, afin de devenir le plus grand dresseur de tous les temps.', 'RPG/Aventure', 'GBA', '3+', '1-4', '2015-11-30'),
(4, 'Pokemon Saphire', 'Un gosse de 11 ans part braconner des animaux afin de les faire combattre avec d''autres dresseurs, dans le but de blesser mortellement les pauvres créatures et d''extorquer de l''argent aux braconniers. Le but ultime est de vaincre une mafia rampante et de terrasser le Conseil des 4, afin de devenir le plus grand dresseur de tous les temps. - Un gosse de 11 ans part braconner des animaux afin de les faire combattre avec d''autres dresseurs, dans le but de blesser mortellement les pauvres créatures et d''extorquer de l''argent aux braconniers. Le but ultime est de vaincre une mafia rampante et de terrasser le Conseil des 4, afin de devenir le plus grand dresseur de tous les temps.', 'RPG/Aventure', 'GBA', '3+', '1-4', '2015-11-30');

-- --------------------------------------------------------

--
-- Structure de la table `vr_grp4_paniers`
--

CREATE TABLE IF NOT EXISTS `vr_grp4_paniers` (
  `ID_JEUX` int(11) NOT NULL AUTO_INCREMENT,
  `Client` varchar(32) NOT NULL,
  `Date` date NOT NULL,
  `Timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID_JEUX`,`Client`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `vr_grp4_paniers`
--

INSERT INTO `vr_grp4_paniers` (`ID_JEUX`, `Client`, `Date`, `Timestamp`) VALUES
(1, 'ee8ed0970f9ad9cc51c113e4c9a8a710', '0000-00-00', 0),
(3, 'ee8ed0970f9ad9cc51c113e4c9a8a710', '0000-00-00', 0),
(2, 'ee8ed0970f9ad9cc51c113e4c9a8a710', '0000-00-00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
