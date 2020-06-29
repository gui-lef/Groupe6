-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  lun. 29 juin 2020 à 06:43
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `siteop`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codePostal` int(11) NOT NULL,
  `nomVille` varchar(255) NOT NULL,
  `nomPays` varchar(255) NOT NULL,
  `adresse1` varchar(255) NOT NULL,
  `adresseComplementaire` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idAdresse_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id`, `codePostal`, `nomVille`, `nomPays`, `adresse1`, `adresseComplementaire`) VALUES
(1, 62410, 'wingles', 'France', '27 rue des rues', 'bâtiments 12');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `panier_idPanier` int(11) NOT NULL,
  `utilisateur_idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`),
  UNIQUE KEY `idType de produit_UNIQUE` (`idCommande`),
  KEY `fk_Commande_Panier1_idx` (`panier_idPanier`),
  KEY `fk_Commande_Utilisateur1_idx` (`utilisateur_idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `dvdbluray`
--

DROP TABLE IF EXISTS `dvdbluray`;
CREATE TABLE IF NOT EXISTS `dvdbluray` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomDvd` varchar(255) NOT NULL,
  `descriptionDvd` text NOT NULL,
  `prixDvd` decimal(5,2) NOT NULL,
  `imageDvd` varchar(255) NOT NULL,
  `image2Dvd` varchar(255) DEFAULT NULL,
  `dateAjoutDvd` datetime NOT NULL,
  `qteDvd` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dvdbluray`
--

INSERT INTO `dvdbluray` (`id`, `nomDvd`, `descriptionDvd`, `prixDvd`, `imageDvd`, `image2Dvd`, `dateAjoutDvd`, `qteDvd`) VALUES
(5, 'Coffret One Piece Partie 2 - Edition Limitée- DVD', 'Coffret One Piece Partie 2 - Edition Limitée- DVD', '39.00', 'One-Piece-Partie-2-Edition-Limitee-Collector-DVD.jpg', 'One-Piece-Partie-2-Edition-Limitee-Collector-DVD2.jpg', '2020-06-05 16:24:30', 10),
(6, 'Coffret One Piece Partie 3 - Edition Limitée- DVD', 'Coffret One Piece Partie 3 - Edition Limitée- DVD \r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tempus elit eget felis aliquam euismod. Ut condimentum luctus faucibus. Ut at tortor id urna ultrices volutpat.', '39.00', 'Coffret-One-Piece-Partie-3-Edition-Collector-Limitee-DVD.jpg', 'Coffret-One-Piece-Partie-3-Edition-Collector-Limitee-DVD2.jpg', '2020-06-07 14:43:32', 2);

-- --------------------------------------------------------

--
-- Structure de la table `figurine`
--

DROP TABLE IF EXISTS `figurine`;
CREATE TABLE IF NOT EXISTS `figurine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomFigurine` varchar(255) NOT NULL,
  `descriptionFigurine` text NOT NULL,
  `prixFigurine` decimal(5,2) NOT NULL,
  `imageFigurine` varchar(255) NOT NULL,
  `image2Figurine` varchar(255) DEFAULT NULL,
  `dateAjoutFigurine` datetime NOT NULL,
  `qteFigurine` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `figurine`
--

INSERT INTO `figurine` (`id`, `nomFigurine`, `descriptionFigurine`, `prixFigurine`, `imageFigurine`, `image2Figurine`, `dateAjoutFigurine`, `qteFigurine`) VALUES
(3, 'Figurine de Trafalgar Law - Ichibansho - 27 cm', 'ceci est une Figurine de Trafalgar Law - Ichibansho - 27 cm\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque feugiat pulvinar felis, at facilisis nibh. Sed dui mi, ultrices quis sodales et, posuere ac arcu.', '39.90', 'law.jpeg', 'law2.jpg', '2020-06-05 16:10:24', 1),
(4, 'Figurine Roronoa Zoro – Grandista Manga Dimension– 28 cm', 'Figurine Roronoa Zoro – Grandista Manga Dimension– 28 Cm', '89.90', 'zoro.jpeg', 'zoro2.jpeg', '2020-06-05 16:11:58', 2),
(5, 'Figurine Monkey D Luffy Grandista Manga Dimensions', 'Figurine Monkey D Luffy Grandista Manga Dimensions', '39.90', 'luffy.jpg', 'luffy2.jpg', '2020-06-05 16:20:52', 5),
(7, 'Figurine de Kinenom - Ichibansho - 21 cm', 'Figurine de Kinenom - Ichibansho - 21 cm', '29.90', 'kinenom.jpg', 'kinenom2.jpg', '2020-06-10 16:13:04', 1);

-- --------------------------------------------------------

--
-- Structure de la table `goodie`
--

DROP TABLE IF EXISTS `goodie`;
CREATE TABLE IF NOT EXISTS `goodie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomGoodie` varchar(255) NOT NULL,
  `descriptionGoodie` text NOT NULL,
  `prixGoodie` decimal(5,2) NOT NULL,
  `imageGoodie` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image2Goodie` varchar(255) DEFAULT NULL,
  `dateAjoutGoodie` datetime NOT NULL,
  `qteGoodie` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `goodie`
--

INSERT INTO `goodie` (`id`, `nomGoodie`, `descriptionGoodie`, `prixGoodie`, `imageGoodie`, `image2Goodie`, `dateAjoutGoodie`, `qteGoodie`) VALUES
(2, 'Tapis de souris symbole Mugiwara', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque feugiat pulvinar felis, at facilisis nibh. Sed dui mi, ultrices quis sodales et, posuere ac arcu.', '12.00', 'tapis-de-souris-one-piece-en-forme-skull.jpg', 'tapis-de-souris-one-piece-en-forme-skull2.jpg', '2020-06-07 14:34:32', 3),
(3, 'Drapeau Noir', 'Drapeau Noir', '6.90', '1507-1.jpg', '1507-2.jpg', '2020-06-11 14:57:03', 2);

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomLivre` varchar(255) NOT NULL,
  `descriptionLivre` text NOT NULL,
  `prixLivre` decimal(5,2) NOT NULL,
  `imageLivre` varchar(255) NOT NULL,
  `image2Livre` varchar(255) DEFAULT NULL,
  `dateAjoutLivre` datetime NOT NULL,
  `qteLivre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `nomLivre`, `descriptionLivre`, `prixLivre`, `imageLivre`, `image2Livre`, `dateAjoutLivre`, `qteLivre`) VALUES
(3, 'Manga - Tome 94 - Edition originale', 'Manga - Tome 94 - Edition originale', '6.90', 'One-Piece-Edition-originale-tome-94.jpg', 'One-Piece-Edition-originale-tome-94-2.jpg', '2020-06-05 16:16:29', 2),
(4, 'Manga - Tome 92 - Edition originale', 'Manga - Tome 92 - Edition originale', '6.90', 'One-Piece-tome-92.jpg', 'One-Piece-tome-92-2.jpg', '2020-06-05 16:21:57', 1),
(8, 'Manga - Tome 93 - Edition originale', 'Manga - Tome 93 - Edition originale', '6.90', 'One-Piece-Edition-originale-tome-93.jpg', 'One-Piece-Edition-originale-tome-93-2.jpg', '2020-06-11 09:12:01', 2);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `idPanier` int(11) NOT NULL AUTO_INCREMENT,
  `figurine_idFigurine` int(11) DEFAULT NULL,
  `livre_idLivre` int(11) DEFAULT NULL,
  `dvdBluray_idDvd` int(11) DEFAULT NULL,
  `vetement_idVetement` int(11) DEFAULT NULL,
  `goodie_idGoodie` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPanier`),
  KEY `fk_Panier_Figurine_idx` (`figurine_idFigurine`),
  KEY `fk_Panier_Livre1_idx` (`livre_idLivre`),
  KEY `fk_Panier_DVD & Bluray1_idx` (`dvdBluray_idDvd`),
  KEY `fk_Panier_Vetement1_idx` (`vetement_idVetement`),
  KEY `fk_Panier_Goodie1_idx` (`goodie_idGoodie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomUti` varchar(255) NOT NULL,
  `prenomUti` varchar(255) NOT NULL,
  `emailUti` varchar(100) NOT NULL,
  `mdpUti` varchar(255) NOT NULL,
  `telUti` int(11) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'CLIENT',
  `adresse_idAdresse` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUtilisateur_UNIQUE` (`id`),
  KEY `fk_Utilisateur_Adresse1_idx` (`adresse_idAdresse`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vetement`
--

DROP TABLE IF EXISTS `vetement`;
CREATE TABLE IF NOT EXISTS `vetement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomVetement` varchar(255) NOT NULL,
  `descriptionVetement` text NOT NULL,
  `prixVetement` decimal(5,2) NOT NULL,
  `tailleVetement` varchar(45) DEFAULT NULL,
  `imageVetement` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image2Vetement` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `dateAjoutVetement` datetime NOT NULL,
  `qteVetement` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vetement`
--

INSERT INTO `vetement` (`id`, `nomVetement`, `descriptionVetement`, `prixVetement`, `tailleVetement`, `imageVetement`, `image2Vetement`, `dateAjoutVetement`, `qteVetement`) VALUES
(8, 'T-shirt Luffy - beige -taille : L', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ipsum justo, fermentum nec nibh sit amet, ornare tristique sem. Lorem ipsum dolor sit amet', '12.00', 'l', 'One-Piece-t-shirt-wanted-luffy-beige-taille-l.jpg', 'One-Piece-t-shirt-wanted-luffy-beige-taille-l2.jpg', '2020-06-08 09:39:01', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_Commande_Panier1` FOREIGN KEY (`panier_idPanier`) REFERENCES `panier` (`idPanier`),
  ADD CONSTRAINT `fk_Commande_Utilisateur1` FOREIGN KEY (`utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fk_Panier_DVD & Bluray1` FOREIGN KEY (`dvdBluray_idDvd`) REFERENCES `dvdbluray` (`id`),
  ADD CONSTRAINT `fk_Panier_Figurine` FOREIGN KEY (`figurine_idFigurine`) REFERENCES `figurine` (`id`),
  ADD CONSTRAINT `fk_Panier_Goodie1` FOREIGN KEY (`goodie_idGoodie`) REFERENCES `goodie` (`id`),
  ADD CONSTRAINT `fk_Panier_Livre1` FOREIGN KEY (`livre_idLivre`) REFERENCES `livre` (`id`),
  ADD CONSTRAINT `fk_Panier_Vetement1` FOREIGN KEY (`vetement_idVetement`) REFERENCES `vetement` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_Utilisateur_Adresse1` FOREIGN KEY (`adresse_idAdresse`) REFERENCES `adresse` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
