-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 29 Novembre 2015 à 02:58
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
  UNIQUE KEY `Login` (`Login`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vr_grp4_clients`
--

INSERT INTO `vr_grp4_clients` (`Client`, `Nom`, `Prenom`, `Login`, `MotDePasse`, `Email`) VALUES
('5a7be3e7f6', 'monNom', 'monPrenom', 'test', '94485483164baa6feeaa4f92310a4ce7', 'laspicestcool@gmail.com'),
('884bdb5d79', '', '', 'Patrick', '9d3d4a67069b48206ccaa6b4b6e049af', 'patricklesage@gmail.com'),
('5c6b5d5d3d', '', '', 'admin', '0c766e329db574ba9e943e38866faae7', 'John.Doe@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `vr_grp4_jeuxludotheque`
--

CREATE TABLE IF NOT EXISTS `vr_grp4_jeuxludotheque` (
  `ID_JEUX` int(30) NOT NULL AUTO_INCREMENT,
  `NbJeux` int(11) NOT NULL,
  `NbJeuxDispos` int(11) NOT NULL,
  PRIMARY KEY (`ID_JEUX`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `vr_grp4_jeuxludotheque`
--

INSERT INTO `vr_grp4_jeuxludotheque` (`ID_JEUX`, `NbJeux`, `NbJeuxDispos`) VALUES
(1, 5, 0),
(2, 5, 2),
(3, 5, 0),
(5, 5, 2),
(7, 10, 0),
(9, 5, 3),
(10, 15, 5),
(13, 0, 0),
(11, 0, 0),
(12, 10, 6),
(14, 0, 0),
(15, 80, 0),
(16, 3, 2),
(17, 10, 9);

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
  UNIQUE KEY `ID` (`ID_JEUX`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `vr_grp4_jeux_test`
--

INSERT INTO `vr_grp4_jeux_test` (`ID_JEUX`, `Nom`, `Desc`, `Genre`, `Support`, `Ages`, `NbJoueurs`, `Sortie`) VALUES
(1, 'Pokémon Emeraude', 'Un gosse de 11 ans part braconner des animaux afin de les faire combattre avec d''autres dresseurs, dans le but de blesser mortellement les pauvres créatures et d''extorquer de l''argent aux braconniers. Le but ultime est de vaincre une mafia rampante et de terrasser le Conseil des 4, afin de devenir le plus grand dresseur de tous les temps.', 'RPG/Aventure', 'GBA', '3', '1-4', '2005-10-21'),
(2, 'Pokemon Rubis', 'Un gosse de 11 ans part braconner des animaux afin de les faire combattre avec d''autres dresseurs, dans le but de blesser mortellement les pauvres créatures et d''extorquer de l''argent aux braconniers. Le but ultime est de vaincre une mafia rampante et de terrasser le Conseil des 4, afin de devenir le plus grand dresseur de tous les temps.\n', 'RPG/Aventure', 'GBA', '3', '1-4', '2003-07-25'),
(3, 'Pokemon Saphir', 'Un gosse de 11 ans part braconner des animaux afin de les faire combattre avec d''autres dresseurs, dans le but de blesser mortellement les pauvres créatures et d''extorquer de l''argent aux braconniers. Le but ultime est de vaincre une mafia rampante et de terrasser le Conseil des 4, afin de devenir le plus grand dresseur de tous les temps. - Un gosse de 11 ans part braconner des animaux afin de les faire combattre avec d''autres dresseurs, dans le but de blesser mortellement les pauvres créatures et d''extorquer de l''argent aux braconniers. Le but ultime est de vaincre une mafia rampante et de terrasser le Conseil des 4, afin de devenir le plus grand dresseur de tous les temps.', 'RPG/Aventure', 'GBA', '3', '1-4', '2003-07-23'),
(10, 'Civilization V', 'Pendant que Washington signe la paix avec kaméhaméha Gandhi fondateur de la religion zoroastrienne il lui envoie 5 missiles nucléaires sur sa capitale !', 'Stratégie', 'PC', '12', '1-8', '2010-09-24'),
(11, 'Half-Life 3', 'Coming soon ...', 'FPS', 'PC', '16', '1-12', '2020-04-24'),
(12, 'Fallout IV', 'Après une guerre nucléaire entre les Etats-Unis et la Chine, le monde a subi des retombées radioactives pendant de très nombreuses années. 200 ans après que les bombes soient tombées et que vous vous soyez caché dans un bunker anti-atomique, séparé de votre femme et de votre enfant, la porte de votre abri s''ouvre, et vous pouvez enfin sortir ...', 'RPG', 'PC', '18', '1', '2015-11-10'),
(13, 'Tous en SPI !', 'L''histoire d''un trio de choc, défiant toute loi de la physique élémentaire. Suivez les aventures hors normes de ce trio d''étudiants de la Licence SPI sur les prochaines plateformes next-gen iTrotinette.\n</br>\n</br>\nDimitri: Equipé de son iBarbe 3000.\n</br>\n</br>\nMarvin: Equipé de son iFlemme, <span class="fred">it''s over 9 000 ! </span>\n</br>\n</br>\nBrandon: Equipé de ses iGlasses deluxe edition.', 'Spécial', 'Tout', '75', '0', '2019-06-07'),
(5, 'The Elder Scrolls - Skyrim', 'FUS RO DAH ! FLECHE DANS LE GENOU !', 'RPG', 'PC', '18', '1', '2011-11-11'),
(14, 'The Elder Scrolls - Argonia', 'Dans les plus sombres marécages du Marais Noir, où même l''Empire n''a pu étendre son influence, un ancien mal se réveille, frappant le Hist et les Argoniens. Leurs anciens ennemis, les Elfes Noirs, y sont retournés pour asservir les survivants. L''Empire, dans le but d''étendre son influence sur ces terres inhospitalières, a rejoint les Argoniens contre les Dunmer, poussant les Altmer et Bosmer à entrer aux aussi en guerre contre l''Empire. Un nouveau choc se prépare, et pendant ce temps là, d''anciennes puissances préparent leur retour ...', 'RPG', 'PC', '18', '1', '2019-05-08'),
(7, 'Crusader Kings II', 'L''Europe est en ébullition. En Scandinavie, les Vikings se préparent à changer la face de l''Europe, en Asie de l''est, les hordes mongoles envahissent et pillent tout ce qui leur résiste, en Italie, le Pape appelle à la Croisade, et en Espagne, les Rois chrétiens se préparent pour la Reconquista ... Dirigez une famille durant cette époque tourmentée, et élevez votre dynastie au rang de plus grande lignée du monde médiéval !', 'Grande stratégie', 'PC', '12', '1-16', '2012-02-14'),
(9, 'Animal Crossing - Wild World', 'Dans cette ville, personne ne vous connait. Seul le mère vous accueille, alors que vous arrivez tard durant une nuit pluvieuse. Il vous faudra alors tisser des liens avec les bonnes personnes, vous faire respecter de tous, et étendre votre influence sur tout le ville. Et pendant ce temps là, allez pêcher, ramassez des fossiles, vendez des fruits, et remboursez votre prêt à Tom Nook, le plus grand criminel jamais créé par Nintendo !', 'Simulation de vie', 'Nintendo DS', '3', '1-4', '2005-11-23'),
(15, 'Au tableau !', 'Avez-vous rêvé d''envoyer votre élève préféré au tableau lors d''une transformée de Fourrier. C''est maintenant possible envoyez Tristan au tableau !', 'Professeur', 'Classe', '3+', '80', '2015-12-17'),
(16, 'Xenoblade Chronicles X', 'Xenoblade Chronicles X est un jeu de rôle sur Wii U. Dans ce gigantesque monde ouvert et fantastique, les joueurs peuvent se déplacer et se battre à bord de robots volants baptisés Skells. L''humanité a dû fuir la Terre suite à l''assaut de forces extraterrestres et tente de coloniser une nouvelle planète. Mais sur Mira, la faune primitive leur réserve un accueil plutôt hostile et il leur faudra s''organiser pour espérer survivre.', 'RPG/Aventure', 'WII U', '12+', 'MMO', '2015-12-04'),
(17, 'League of Martin', 'Jouez désormais au dernier MOBA, une arène en ligne à un joueur.\r\nDans le mode classique Martin se retrouvera tout seul, dans les modes aléatoires il sera encore et toujours tout seul.\r\nIncarnez ce personnage sensationnel en ne faisant absolument rien d''autre que de fixer l''écran de votre console durant des heures pleines d''action !', 'RPG/Stratégie', 'Tout', '3+', '1', '2015-12-09');

-- --------------------------------------------------------

--
-- Structure de la table `vr_grp4_paniers`
--

CREATE TABLE IF NOT EXISTS `vr_grp4_paniers` (
  `ID_PANIER` int(11) NOT NULL AUTO_INCREMENT,
  `ID_JEUX` int(11) DEFAULT NULL,
  `Client` varchar(32) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID_PANIER`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `vr_grp4_paniers`
--

INSERT INTO `vr_grp4_paniers` (`ID_PANIER`, `ID_JEUX`, `Client`, `Date`, `Timestamp`) VALUES
(4, 1, 'aa077df766', '2015-11-27', 1448641063),
(3, 1, '15de408a5a', '2015-11-27', 1448640931),
(23, 12, '884bdb5d79', '2015-11-28', 1448739874),
(6, 5, 'b4e90d4f6c', '2015-11-27', 1448607600),
(22, 10, '5a7be3e7f6', '2015-11-28', 1448738453),
(24, 3, '884bdb5d79', '2016-12-31', 1448726400),
(25, 10, '884bdb5d79', '2015-11-28', 1448739940);
