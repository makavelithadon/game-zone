-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 18 Août 2015 à 15:06
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
  KEY `id_categorie` (`id_categorie`),
  KEY `id_sous_categorie` (`id_sous_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_article`, `id_categorie`, `id_sous_categorie`, `nom`, `marque`, `description`, `description_detaillee`, `image_1`, `image_2`, `image_3`, `prix`, `quantite`, `date`, `video`) VALUES
(5, 1, 1, 'Pack FIFA 2015 Xbox One', 'Microsoft', 'Conçue par les ingénieurs les plus inventifs du jeu vidéo, Xbox ONE va permettre aux créateurs de jeux de donner libre cours à leur imagination et développer des technologies\nnovatrices jusqu''ici inimaginables.', NULL, '/game_zone/img/pack-xbox-one-fifa-15.jpg', NULL, NULL, '350.00', 4000, '2015-08-15 00:00:00', NULL),
(6, 1, 2, 'Pack The Last of Us Remastered Edition PS 4', 'Sony', 'iu ih fierhe hernu erf nri nriuuiuurfurer rei iureuire', NULL, '/game_zone/img/pack-ps4-500-go-jeu-the-last-of-us-remastered.jpg', NULL, NULL, '300.00', 3000, '2015-07-29 00:00:00', NULL),
(7, 1, 3, 'ereererer', 'ere ere ree', 'e ere r re erer ere rererere r re erre r', NULL, '', NULL, NULL, '150.00', 1500, '2015-07-29 00:00:00', NULL),
(8, 2, 1, 'The Witcher III Wild Hunt Xbox One', 'CD Projekt', 'Lorem ipsum sin dolor amet consectetur, ereuihf efheziuhnnb  uhfuie ferf.uyty efue k ehfef eryuf reunjnre uer re re uur jeknhu  r nuer bv erb eruvnevjre vre vrevn ruv reuv irejvi ruureui\n', 'The Witcher 3 : Wild Hunt est une oeuvre qui aura cristallisé de nombreux espoirs. Portée par un studio au statut tout particulier dans le coeur des joueurs, la saga The Witcher s’est creusée une place de choix dans le monde du RPG occidental à l’univers mature. Jusqu’alors cloisonnée dans des environnements fermés, CD Projeckt RED a fait le pari d’offrir à son sorceleur fétiche un écrin de choix pour la conclusion de sa trilogie. Un vaste monde ouvert à la technique léchée et aux promesses de liberté clamées haut et fort à grands coups de bandes-annonces. Connaisseurs et néophytes ont vu en The Witcher 3 une sorte de messie du RPG. Mais au petit jeu de l’open world, beaucoup se sont cassé les dents, car à vouloir trop en faire on peut perdre de vue l’essentiel. C’était sans compter sur le talent du studio polonais…', '/game_zone/img/the-witcher-iii-wild-hunt-xbox-one.png', NULL, NULL, '50.00', 992, '2015-08-15 00:00:00', NULL),
(9, 2, 2, 'The Witcher III Wild Hunt PS 4', 'CD Projekt', '', NULL, '/game_zone/img/the-witcher-iii-wild-hunt-ps-4.png', NULL, NULL, '47.90', 2998, '2015-08-06 00:00:00', NULL),
(10, 2, 1, 'Tomb Raider Definitive Edition Xbox One', 'Crystal Dynamics', '', NULL, '/game_zone/img/tomb-raider-definitive-edition-xbox-one.png', '/game_zone/img/tr-logo.jpg', NULL, '32.00', 3200, '2015-08-05 00:00:00', NULL),
(11, 2, 1, 'Titan Fall Xbox One', 'Electronics Arts', '', NULL, '/game_zone/img/titan-fall-xbox-one.jpg', NULL, NULL, '35.00', 1500, '2015-08-03 00:00:00', NULL),
(12, 2, 1, 'Ryse Son of Rome Xbox One', 'Crytek', '', NULL, '/game_zone/img/rise-son-of-rome-xbox-one.jpg', NULL, NULL, '25.00', 998, '2015-08-11 00:00:00', NULL),
(13, 2, 1, 'Destiny Xbox One', 'Bungie', '', NULL, '/game_zone/img/destiny-xbox-one.jpg', NULL, NULL, '40.00', 5000, '2015-08-06 00:00:00', NULL),
(14, 2, 2, 'Assassin''s Creed Unity PS 4', 'Ubisoft', 'urhefu ur fer feruf uerf,  fiueruif uiefe n feufe, jrnfie. Aijiufuie eneifier eceicneiniennern ecnervnernvn eerjuiervernvev ervuiernvrejefenncnbvojviojvkjndkc x ceiroikcnkjnuidr.', NULL, '/game_zone/img/assassin-s-creed-unity-ps-4.jpg', NULL, NULL, '35.00', 2000, '2015-08-01 00:00:00', NULL),
(15, 2, 2, 'Diablo III Ultimate Evil Edition PS 4', 'Blizzard', '', NULL, '/game_zone/img/diablo-iii-ultimate-evil-edition-ps-4.jpg', NULL, NULL, '35.00', 1798, '2015-08-06 00:00:00', NULL),
(16, 2, 2, 'The Last of US Remastered Edition PS 4', 'Naughty Dog', '', NULL, '/game_zone/img/the-last-of-us-remastered-ps-4.jpg', NULL, NULL, '33.00', 1997, '2015-08-07 00:00:00', NULL),
(17, 2, 2, 'Watch Dogs PS 4', 'Ubisoft', '', NULL, '/game_zone/img/watch-dogs-ps-4.jpg', NULL, NULL, '45.00', 1499, '2015-08-08 00:00:00', NULL),
(18, 2, 1, 'Batman Arkham Knight Xbox One', 'Rocksteady', '', NULL, '/game_zone/img/batman-the-arkham-knight-xbox-one.jpg', NULL, NULL, '59.90', 3991, '2015-08-11 00:00:00', NULL),
(19, 2, 1, 'Evolve Xbox One', 'Turtle Rock', '', NULL, '/game_zone/img/evolve-xbox-one.jpg', NULL, NULL, '44.90', 2999, '2015-08-09 00:00:00', NULL),
(20, 2, 1, 'Forza Motorsport 5 Xbox One', 'Turn 10', '', NULL, '/game_zone/img/forza-motorsport-5-xbox-one_.jpg', NULL, NULL, '21.90', 1200, '2015-08-05 00:00:00', NULL),
(21, 2, 2, 'GTA V PS 4', 'Rockstar Games', 'Eriuitteijtiejte jeritjiejiter renreijr eriiereer jirnreinireifiuerre  ferfnuieruif ncnf. Ijizjeujnjiez , eiduiez oezdoi ezdnez zn crencoirczejnc ejkc jecoei cje cje rcj.', NULL, '/game_zone/img/gta-v-xbox-one.jpg', NULL, NULL, '39.90', 4000, '2015-08-01 00:00:00', NULL),
(22, 2, 1, 'Assassin''s Creed Unity Xbox One', 'Ubisoft', '', NULL, '/game_zone/img/assassin-s-creed-unity-xbox-one.jpg', NULL, NULL, '33.99', 2000, '2015-08-02 00:00:00', NULL),
(23, 2, 1, 'Dragon Age Inquisition Xbox One', 'BioWare', '', NULL, '/game_zone/img/dragon-age-inquisition-xbox-one.jpg', NULL, NULL, '29.90', 2596, '2015-08-06 00:00:00', NULL),
(24, 2, 1, 'Assassin''s Creed IV Black Flag Xbox One', 'Ubisoft', '', NULL, '/game_zone/img/assassin-s-creed-black-flag-xbox-one.jpg', NULL, NULL, '14.90', 1200, '2015-08-04 00:00:00', NULL),
(25, 2, 1, 'Mortal Kombat X Xbox One', 'Warner Bros Games', '', NULL, '/game_zone/img/mortal-kombat-x-xbox-one.jpg', NULL, NULL, '24.90', 1499, '2015-08-09 00:00:00', NULL),
(26, 2, 1, 'Sunset Overdrive Xbox One', 'Insomniac Games', '', NULL, '/game_zone/img/sunset-overdrive-xbox-one.jpg', NULL, NULL, '32.90', 990, '2015-08-12 00:00:00', NULL),
(27, 2, 2, 'Middle Earth Shadow of Mordor PS 4', 'Monolith', '', NULL, '/game_zone/img/shadow-of-mordor-ps-4.jpg', NULL, NULL, '14.90', 800, '2015-08-05 00:00:00', NULL),
(28, 2, 2, 'Tomb Raider Definitive Edition PS 4', 'Crystal Dynamics', '', NULL, '/game_zone/img/tomb-raider-definitive-edition-ps-4.jpg', NULL, NULL, '24.90', 2000, '2015-08-05 00:00:00', NULL),
(29, 2, 2, 'Bloodborne PS 4', 'From Software', 'Eriuitteijtiejte jeritjiejiter renreijr eriiereer jirnreinireifiuerre  ferfnuieruif ncnf. Ijizjeujnjiez , eiduiez oezdoi ezdnez zn crencoirczejnc ejkc jecoei cje cje rcj.', NULL, '/game_zone/img/bloodborne-ps-4.jpg', NULL, NULL, '34.90', 4000, '2015-08-13 00:00:00', NULL),
(30, 3, 10, 'erereerererer', 'erererere', 'ererr er er r er ere re er ', NULL, '', NULL, NULL, '0.00', 4, '2015-08-05 00:00:00', NULL),
(32, 3, 11, 're re r ', ' er ere r e', 'ee rer er er rre', NULL, '', NULL, NULL, '15.90', 5, '2015-08-07 00:00:00', NULL),
(35, 3, 10, 'rverve rrver', 'er ter  rctc eter', 'er ert ertrtr trer t', NULL, '', NULL, NULL, '10.80', 5, '2015-08-05 00:00:00', NULL),
(36, 3, 11, 'rverve', 'rverve rrver', 'rverve rrver', NULL, '', NULL, NULL, '45.00', 4, '2015-08-19 00:00:00', NULL),
(37, 4, 12, 'rer ret ht  y y', 'tyry erey ry y', 'ry ty rury yyth', NULL, '', NULL, NULL, '15.00', 6, '2015-08-19 00:00:00', NULL),
(38, 4, 13, 'i ukilio', 'loi ol ', 'liol liol loil', NULL, '', NULL, NULL, '10.00', 3, '2015-08-12 00:00:00', NULL),
(39, 4, 12, 'ze hujtyh', 'rt hhyuju', 'ytr hhhujui  ehet y', NULL, '', NULL, NULL, '4.00', 3, '2015-08-19 00:00:00', NULL),
(40, 4, 12, 'e thtyh ', 'trhythy', ' er hh h', NULL, '', NULL, NULL, '18.00', 4, '2015-08-06 00:00:00', NULL),
(41, 1, 1, ' trtrvt etvtetv', 'trvt rtrv et', 'v rterv ertvtv trv tv t', NULL, '', NULL, NULL, '259.90', 17, '2015-08-12 00:00:00', NULL);

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
  `id_article` int(5) NOT NULL,
  PRIMARY KEY (`id_avis`),
  KEY `id_membre` (`id_membre`),
  KEY `id_article` (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `avis`
--

INSERT INTO `avis` (`id_avis`, `commentaire`, `note`, `date`, `id_membre`, `id_article`) VALUES
(1, 'Très bon jeu, j''y ai seulement joué quelques heures mais tout est là, la magie opère, le gameplay est très fin, la durée de vie phénoménal et les graphismes à tomber par terre! CD Projekt nous a encore servi ce qu''ils savent faire le mieux : de très bon jeu. Je recommande vivmeent même pour ceux qui ne sont pas fan de ce genre de jeu.', 9, '2015-08-05 00:00:00', 1, 5),
(2, 'Très bon jeu, j''y ai seulement joué quelques heures mais tout est là, la magie opère, le gameplay est très fin, la durée de vie phénoménal et les graphismes à tomber par terre! CD Projekt nous a encore servi ce qu''ils savent faire le mieux : de très bon jeu. Je recommande vivmeent même pour ceux qui ne sont pas fan de ce genre de jeu.', 9, '2015-08-07 00:00:00', 1, 8),
(3, 'etretretertrtre', 9, '2015-08-07 00:00:00', 2, 8),
(4, 'ejfnvnnvei', 7, '2015-08-07 00:00:00', 3, 8);

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
  `montant` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL,
  `id_membre` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `fk_commande_membre1_idx` (`id_membre`),
  KEY `id_membre` (`id_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `montant`, `date`, `id_membre`) VALUES
(1, '987.00', '2015-08-17 20:08:51', 1),
(2, '1237.00', '2015-08-17 20:08:51', 1),
(3, '1587.00', '2015-08-17 20:08:51', 1),
(4, '1612.00', '2015-08-17 20:08:51', 1),
(5, '987.00', '2015-08-17 20:10:04', 1),
(6, '1237.00', '2015-08-17 20:10:04', 1),
(7, '1587.00', '2015-08-17 20:10:04', 1),
(8, '1612.00', '2015-08-17 20:10:04', 1),
(9, '987.00', '2015-08-17 20:10:44', 1),
(10, '1237.00', '2015-08-17 20:10:44', 1),
(11, '1587.00', '2015-08-17 20:10:44', 1),
(12, '1612.00', '2015-08-17 20:10:44', 1),
(13, '987.00', '2015-08-17 20:10:46', 1),
(14, '1237.00', '2015-08-17 20:10:46', 1),
(15, '1587.00', '2015-08-17 20:10:46', 1),
(16, '1612.00', '2015-08-17 20:10:46', 1),
(17, '987.00', '2015-08-17 20:11:02', 1),
(18, '1237.00', '2015-08-17 20:11:02', 1),
(19, '1587.00', '2015-08-17 20:11:02', 1),
(20, '1612.00', '2015-08-17 20:11:02', 1),
(21, '0.00', '2015-08-17 20:14:08', 1),
(22, '1587.00', '2015-08-17 20:18:34', 1),
(23, '166190.00', '2015-08-17 20:19:30', 1),
(24, '1662.00', '2015-08-17 20:23:01', 1),
(25, '0.00', '2015-08-17 20:23:38', 1),
(26, '0.00', '2015-08-17 20:24:09', 1),
(27, '1662.00', '2015-08-17 20:25:25', 1),
(28, '1662.00', '2015-08-17 20:25:54', 1),
(29, '1662.00', '2015-08-17 20:26:25', 1),
(30, '1662.00', '2015-08-17 20:26:26', 1),
(31, '1662.00', '2015-08-17 20:26:26', 1),
(32, '1662.00', '2015-08-17 20:26:33', 1),
(33, '1662.00', '2015-08-17 20:27:00', 1),
(34, '1662.00', '2015-08-17 20:27:01', 1),
(35, '1662.00', '2015-08-17 20:28:18', 1),
(36, '1662.00', '2015-08-17 20:28:48', 1),
(37, '1662.00', '2015-08-17 20:29:10', 1),
(38, '1661.90', '2015-08-17 20:31:10', 1),
(39, '1661.90', '2015-08-17 22:06:02', 1),
(40, '714.90', '2015-08-17 22:18:00', 1),
(41, '780.70', '2015-08-17 23:31:50', 1),
(42, '780.70', '2015-08-17 23:31:54', 1),
(43, '780.70', '2015-08-17 23:33:18', 1),
(44, '780.70', '2015-08-17 23:33:32', 1),
(45, '65.80', '2015-08-18 11:25:41', 1),
(46, '129.90', '2015-08-18 12:42:22', 1),
(47, '129.90', '2015-08-18 12:43:10', 1),
(48, '129.90', '2015-08-18 12:43:24', 1),
(49, '129.90', '2015-08-18 12:43:41', 1),
(50, '129.90', '2015-08-18 12:44:50', 1),
(51, '129.90', '2015-08-18 12:45:32', 1),
(52, '129.90', '2015-08-18 12:45:45', 1),
(53, '129.90', '2015-08-18 12:51:52', 1),
(54, '129.90', '2015-08-18 12:51:55', 1),
(55, '129.90', '2015-08-18 12:52:27', 1),
(56, '129.90', '2015-08-18 12:53:36', 1),
(57, '179.90', '2015-08-18 12:54:31', 1),
(58, '179.90', '2015-08-18 12:58:05', 1),
(59, '179.90', '2015-08-18 12:58:22', 1),
(60, '32.90', '2015-08-18 13:06:29', 1),
(61, '32.90', '2015-08-18 13:06:51', 1),
(62, '32.90', '2015-08-18 13:07:15', 1),
(63, '131.60', '2015-08-18 13:08:45', 1),
(64, '131.60', '2015-08-18 13:11:28', 1),
(65, '131.60', '2015-08-18 13:12:44', 1),
(66, '131.60', '2015-08-18 13:12:48', 1),
(67, '131.60', '2015-08-18 13:14:03', 1),
(68, '131.60', '2015-08-18 13:14:11', 1),
(69, '98.70', '2015-08-18 13:15:14', 1),
(70, '131.60', '2015-08-18 13:18:55', 1),
(71, '230.00', '2015-08-18 13:42:11', 1),
(72, '59.90', '2015-08-18 13:43:32', 1),
(73, '35.00', '2015-08-18 13:44:25', 1),
(74, '100.00', '2015-08-18 13:45:23', 1),
(75, '95.80', '2015-08-18 13:49:17', 1),
(76, '66.00', '2015-08-18 13:49:37', 1),
(77, '59.90', '2015-08-18 13:50:38', 1),
(78, '33.00', '2015-08-18 13:51:16', 1),
(79, '32.90', '2015-08-18 13:58:55', 1),
(80, '32.90', '2015-08-18 13:59:23', 1),
(81, '59.90', '2015-08-18 14:01:54', 1),
(82, '29.90', '2015-08-18 14:04:47', 1),
(83, '50.00', '2015-08-18 14:08:06', 1),
(84, '59.90', '2015-08-18 14:08:30', 1),
(85, '24.90', '2015-08-18 14:14:12', 1),
(86, '59.90', '2015-08-18 14:43:07', 1),
(87, '59.90', '2015-08-18 14:44:11', 1),
(88, '50.00', '2015-08-18 14:45:07', 1),
(89, '59.90', '2015-08-18 14:45:46', 1),
(90, '25.00', '2015-08-18 14:46:20', 1),
(91, '44.90', '2015-08-18 14:46:37', 1),
(92, '29.90', '2015-08-18 14:47:10', 1),
(93, '50.00', '2015-08-18 14:48:37', 1),
(94, '29.90', '2015-08-18 14:54:31', 1),
(95, '59.90', '2015-08-18 14:56:37', 1),
(96, '29.90', '2015-08-18 14:57:18', 1),
(97, '59.90', '2015-08-18 14:58:20', 1),
(98, '25.00', '2015-08-18 14:59:01', 1),
(99, '32.90', '2015-08-18 15:00:38', 1),
(100, '32.90', '2015-08-18 15:00:53', 1),
(101, '32.90', '2015-08-18 15:02:12', 1),
(102, '32.90', '2015-08-18 15:02:58', 1);

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE IF NOT EXISTS `details_commande` (
  `id_details_commande` int(6) NOT NULL AUTO_INCREMENT,
  `id_commande` int(6) DEFAULT NULL,
  `id_article` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_details_commande`),
  KEY `fk_details_commande_commande1_idx` (`id_commande`),
  KEY `fk_details_commande_produit1_idx` (`id_article`),
  KEY `id_commande` (`id_commande`),
  KEY `id_produit` (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- Contenu de la table `details_commande`
--

INSERT INTO `details_commande` (`id_details_commande`, `id_commande`, `id_article`) VALUES
(1, 0, 11),
(2, 0, 18),
(3, 51, 11),
(4, 51, 18),
(5, 52, 11),
(6, 52, 18),
(7, 53, 11),
(8, 53, 18),
(9, 54, 11),
(10, 54, 18),
(11, 55, 11),
(12, 55, 18),
(13, 56, 11),
(14, 56, 18),
(15, 57, 11),
(16, 57, 18),
(17, 57, 8),
(18, 58, 11),
(19, 58, 18),
(20, 58, 8),
(21, 59, 11),
(22, 59, 18),
(23, 59, 8),
(24, 60, 26),
(25, 61, 26),
(26, 62, 26),
(27, 63, 26),
(28, 64, 26),
(29, 65, 26),
(30, 66, 26),
(31, 67, 26),
(32, 68, 26),
(33, 69, 26),
(34, 70, 26),
(35, 71, 8),
(36, 71, 15),
(37, 71, 17),
(38, 72, 18),
(39, 73, 15),
(40, 74, 8),
(41, 75, 9),
(42, 76, 16),
(43, 77, 18),
(44, 78, 16),
(45, 79, 26),
(46, 80, 26),
(47, 81, 18),
(48, 82, 23),
(49, 83, 8),
(50, 84, 18),
(51, 85, 25),
(52, 86, 18),
(53, 87, 18),
(54, 88, 8),
(55, 89, 18),
(56, 90, 12),
(57, 91, 19),
(58, 92, 23),
(59, 93, 8),
(60, 94, 23),
(61, 95, 18),
(62, 96, 23),
(63, 97, 18),
(64, 98, 12),
(65, 99, 26),
(66, 100, 26),
(67, 101, 26),
(68, 102, 26);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `mail`, `sexe`, `ville`, `cp`, `adresse`, `statut`) VALUES
(1, 'Makaveli94', '$2y$10$qATqlpy6ho.vTiqAfoxp/e/vJbRHr2yaDPrwJo1888EzKqeEScIw2', 'DUCONSEIL', 'Romuald', 'romuald.duconseil@hotmail.fr', 'm', 'Choisy-le-Roi', 94600, '6, Rue LEDRU-ROLLIN', 1),
(2, 'Makaveli', '$2y$10$EEdH4PdhoEcnGUuiMG9jp.E1Xh81mI.TbO5l0rd3Tar.iVvKPOaZu', '', '', 'romuald.duconseil@hotmail.com', 'm', '', 0, '', 0),
(3, 'erereerer', '$2y$10$XzSlZPeZuEACKhmOwiqJaOX/OazMdjpn2YFWcLCIMuy5MJB98BIqq', 'erererer', 'rererr', 'romuald.duconseil@hotmail.de', 'm', 'rererer', 45454, 'erereerer', 0);

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
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`id_sous_categorie`) REFERENCES `sous_categorie` (`id_sous_categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`) ON DELETE CASCADE ON UPDATE CASCADE;

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
