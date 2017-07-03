-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 13 Août 2015 à 14:44
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `game_zone`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(5) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(2) NOT NULL,
  `id_sous_categorie` int(2) NOT NULL,
  `id_promo` int(2) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `description_detaillee` text,
  `image_1` varchar(255) NOT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `image_3` varchar(255) DEFAULT NULL,
  `prix` decimal(10,2) NOT NULL,
  `quantite` int(5) DEFAULT NULL,
  `date` datetime NOT NULL,
  `video` text,
  PRIMARY KEY (`id_article`),
  UNIQUE KEY `nom` (`nom`),
  KEY `fk_produit_promotion1_idx` (`id_promo`),
  KEY `id_promo` (`id_promo`),
  KEY `id_categorie` (`id_categorie`),
  KEY `id_sous_categorie` (`id_sous_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_article`, `id_categorie`, `id_sous_categorie`, `id_promo`, `nom`, `marque`, `description`, `description_detaillee`, `image_1`, `image_2`, `image_3`, `prix`, `quantite`, `date`, `video`) VALUES
(5, 1, 1, 401, 'Pack FIFA 2015 Xbox One', 'Microsoft', 'e   nrfui renre fhnuir enreiuiurgergt hh hyt ytyt hyt ytn', NULL, '/game_zone/img/pack-xbox-one-fifa-15.jpg', NULL, NULL, '350.00', 40, '2015-07-29 00:00:00', NULL),
(6, 1, 2, 401, 'Pack The Last of Us Remastered Edition PS 4', 'Sony', 'iu ih fierhe hernu erf nri nriuuiuurfurer rei iureuire', NULL, '/game_zone/img/pack-ps4-500-go-jeu-the-last-of-us-remastered.jpg', NULL, NULL, '300.00', 30, '2015-07-29 00:00:00', NULL),
(7, 1, 3, 401, 'ereererer', 'ere ere ree', 'e ere r re erer ere rererere r re erre r', NULL, '', NULL, NULL, '150.00', 15, '2015-07-29 00:00:00', NULL),
(8, 2, 1, NULL, 'The Witcher III Wild Hunt Xbox One', 'CD Projekt', 'Lorem ipsum sin dolor amet consectetur, ereuihf efheziuhnnb  uhfuie ferf.', NULL, '/game_zone/img/the-witcher-iii-wild-hunt-xbox-one.png', NULL, NULL, '50.00', 40, '2015-08-04 00:00:00', NULL),
(9, 2, 2, 401, 'The Witcher III Wild Hunt PS 4', 'CD Projekt', '', NULL, '/game_zone/img/the-witcher-iii-wild-hunt-ps-4.png', NULL, NULL, '47.90', 30, '2015-08-06 00:00:00', NULL),
(10, 2, 1, 401, 'Tomb Raider Definitive Edition Xbox One', 'Crystal Dynamics', '', NULL, '/game_zone/img/tomb-raider-definitive-edition-xbox-one.png', '/game_zone/img/tr-logo.jpg', NULL, '32.00', 32, '2015-08-05 00:00:00', NULL),
(11, 2, 1, 401, 'Titan Fall Xbox One', 'Electronics Arts', '', NULL, '/game_zone/img/titan-fall-xbox-one.jpg', NULL, NULL, '35.00', 15, '2015-08-03 00:00:00', NULL),
(12, 2, 1, NULL, 'Ryse Son of Rome Xbox One', 'Crytek', '', NULL, '/game_zone/img/rise-son-of-rome-xbox-one.jpg', NULL, NULL, '25.00', 10, '2015-08-11 00:00:00', NULL),
(13, 2, 1, NULL, 'Destiny Xbox One', 'Bungie', '', NULL, '/game_zone/img/destiny-xbox-one.jpg', NULL, NULL, '40.00', 50, '2015-08-06 00:00:00', NULL),
(14, 2, 2, NULL, 'Assassin''s Creed Unity PS 4', 'Ubisoft', '', NULL, '/game_zone/img/assassin-s-creed-unity-ps-4.jpg', NULL, NULL, '35.00', 20, '2015-08-01 00:00:00', NULL),
(15, 2, 2, NULL, 'Diablo III Ultimate Evil Edition PS 4', 'Blizzard', '', NULL, '/game_zone/img/diablo-iii-ultimate-evil-edition-ps-4.jpg', NULL, NULL, '35.00', 18, '2015-08-06 00:00:00', NULL),
(16, 2, 2, NULL, 'The Last of US Remastered Edition PS 4', 'Naughty Dog', '', NULL, '/game_zone/img/the-last-of-us-remastered-ps-4.jpg', NULL, NULL, '33.00', 20, '2015-08-07 00:00:00', NULL),
(17, 2, 2, NULL, 'Watch Dogs PS 4', 'Ubisoft', '', NULL, '/game_zone/img/watch-dogs-ps-4.jpg', NULL, NULL, '45.00', 15, '2015-08-08 00:00:00', NULL),
(18, 2, 1, NULL, 'Batman Arkham Knight Xbox One', 'Rocksteady', '', NULL, '/game_zone/img/batman-the-arkham-knight-xbox-one.jpg', NULL, NULL, '59.90', 40, '2015-08-11 00:00:00', NULL),
(19, 2, 1, NULL, 'Evolve Xbox One', 'Turtle Rock', '', NULL, '/game_zone/img/evolve-xbox-one.jpg', NULL, NULL, '44.90', 30, '2015-08-09 00:00:00', NULL),
(20, 2, 1, NULL, 'Forza Motorsport 5 Xbox One', 'Turn 10', '', NULL, '/game_zone/img/forza-motorsport-5-xbox-one_.jpg', NULL, NULL, '21.90', 12, '2015-08-05 00:00:00', NULL),
(21, 2, 2, NULL, 'GTA V PS 4', 'Rockstar Games', '', NULL, '/game_zone/img/gta-v-xbox-one.jpg', NULL, NULL, '39.90', 40, '2015-08-01 00:00:00', NULL),
(22, 2, 1, NULL, 'Assassin''s Creed Unity Xbox One', NULL, '', NULL, '/game_zone/img/assassin-s-creed-unity-xbox-one.jpg', NULL, NULL, '33.99', 20, '2015-08-02 00:00:00', NULL),
(23, 2, 1, NULL, 'Dragon Age Inquisition Xbox One', 'BioWare', '', NULL, '/game_zone/img/dragon-age-inquisition-xbox-one.jpg', NULL, NULL, '29.90', 26, '2015-08-06 00:00:00', NULL),
(24, 2, 1, NULL, 'Assassin''s Creed IV Black Flag Xbox One', 'Ubisoft', '', NULL, '/game_zone/img/assassin-s-creed-black-flag-xbox-one.jpg', NULL, NULL, '14.90', 12, '2015-08-04 00:00:00', NULL),
(25, 2, 1, NULL, 'Mortal Kombat X Xbox One', 'Warner Bros Games', '', NULL, '/game_zone/img/mortal-kombat-x-xbox-one.jpg', NULL, NULL, '24.90', 15, '2015-08-09 00:00:00', NULL),
(26, 2, 1, NULL, 'Sunset Overdrive', 'Insomniac Games', '', NULL, '/game_zone/img/sunset-overdrive-xbox-one.jpg', NULL, NULL, '32.90', 30, '2015-08-12 00:00:00', NULL),
(27, 2, 2, NULL, 'Middle Earth Shadow of Mordor PS 4', 'Monolith', '', NULL, '/game_zone/img/shadow-of-mordor-ps-4.jpg', NULL, NULL, '14.90', 8, '2015-08-05 00:00:00', NULL),
(28, 2, 2, NULL, 'Tomb Raider Definitive Edition PS 4', 'Crystal Dynamics', '', NULL, '/game_zone/img/tomb-raider-definitive-edition-ps-4.jpg', NULL, NULL, '24.90', 20, '2015-08-05 00:00:00', NULL),
(29, 2, 2, NULL, 'Bloodborne', 'From Software', '', NULL, '/game_zone/img/bloodborne-ps-4.jpg', NULL, NULL, '34.90', 40, '2015-08-13 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE IF NOT EXISTS `avis` (
  `id_avis` int(5) NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  `note` int(2) NOT NULL,
  `date` datetime NOT NULL,
  `id_membre` int(5) DEFAULT NULL,
  `id_salle` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_avis`),
  KEY `id_membre` (`id_membre`,`id_salle`),
  KEY `id_salle` (`id_salle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(2) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom`) VALUES
(1, 'Consoles'),
(2, 'Jeux'),
(3, 'PC Gaming'),
(4, 'Périphériques');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(6) NOT NULL AUTO_INCREMENT,
  `montant` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `id_membre` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `fk_commande_membre1_idx` (`id_membre`),
  KEY `id_membre` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE IF NOT EXISTS `details_commande` (
  `id_details_commande` int(6) NOT NULL AUTO_INCREMENT,
  `id_commande` int(6) DEFAULT NULL,
  `id_produit` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_details_commande`),
  KEY `fk_details_commande_commande1_idx` (`id_commande`),
  KEY `fk_details_commande_produit1_idx` (`id_produit`),
  KEY `id_commande` (`id_commande`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(5) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(40) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `sexe` enum('m','f') NOT NULL DEFAULT 'm',
  `ville` varchar(20) NOT NULL,
  `cp` int(5) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `statut` int(1) NOT NULL,
  PRIMARY KEY (`id_membre`),
  UNIQUE KEY `pseudo_UNIQUE` (`pseudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `mail`, `sexe`, `ville`, `cp`, `adresse`, `statut`) VALUES
(1, 'Makaveli94', '$2y$10$qATqlpy6ho.vTiqAfoxp/e/vJbRHr2yaDPrwJo1888EzKqeEScIw2', 'DUCONSEIL', 'Romuald', 'romuald.duconseil@hotmail.fr', 'm', 'Choisy-le-Roi', 94600, '6, Rue LEDRU-ROLLIN', 1),
(2, 'Makaveli', '$2y$10$EEdH4PdhoEcnGUuiMG9jp.E1Xh81mI.TbO5l0rd3Tar.iVvKPOaZu', '', '', 'romuald.duconseil@hotmail.com', 'm', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id_newsletter` int(5) NOT NULL AUTO_INCREMENT,
  `id_membre` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_newsletter`),
  KEY `fk_newsletter_membre1_idx` (`id_membre`),
  KEY `id_membre` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `id_promo` int(2) NOT NULL AUTO_INCREMENT,
  `code_promo` varchar(6) NOT NULL,
  `reduction` int(5) NOT NULL,
  PRIMARY KEY (`id_promo`),
  UNIQUE KEY `code_promo_UNIQUE` (`code_promo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=402 ;

--
-- Contenu de la table `promotion`
--

INSERT INTO `promotion` (`id_promo`, `code_promo`, `reduction`) VALUES
(401, 'ABCD10', 50);

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie`
--

CREATE TABLE IF NOT EXISTS `sous_categorie` (
  `id_sous_categorie` int(2) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `background_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_sous_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `sous_categorie`
--

INSERT INTO `sous_categorie` (`id_sous_categorie`, `nom`, `background_img`) VALUES
(1, 'Xbox One', '/game_zone/img/background/xbox-one-background-image.jpg'),
(2, 'PS 4', '/game_zone/img/background/ps-4-background-image.jpg'),
(3, 'Wii U', '/game_zone/img/background/wii-u-background-image.jpg'),
(7, 'PC', NULL),
(10, 'Desktop', NULL),
(11, 'Portable', NULL),
(12, 'Manettes', NULL),
(13, 'Volants', NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`id_sous_categorie`) REFERENCES `sous_categorie` (`id_sous_categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_3` FOREIGN KEY (`id_promo`) REFERENCES `promotion` (`id_promo`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_membre1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD CONSTRAINT `fk_newsletter_membre1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
