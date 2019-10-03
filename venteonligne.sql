-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 06 fév. 2019 à 17:57
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `venteonligne`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `idcat` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(255) NOT NULL,
  PRIMARY KEY (`idcat`),
  UNIQUE KEY `nom` (`nom`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idcat`, `nom`, `type`) VALUES
(1, 'Cameras', 1),
(2, 'Computers', 1),
(3, 'Mobile Phone', 1),
(4, 'Tablets', 1),
(5, 'Men\'s Clothings', 2),
(6, 'Kids Clothing', 2),
(7, 'Women\'s Shoes', 2),
(8, 'Kids Shoes', 2),
(9, 'Women\'s Clothing', 2),
(10, 'PHP', 6),
(11, 'JAVA SCRIPT', 6),
(12, 'JAVA', 6);

-- --------------------------------------------------------

--
-- Structure de la table `featured`
--

DROP TABLE IF EXISTS `featured`;
CREATE TABLE IF NOT EXISTS `featured` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desciption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `featured`
--

INSERT INTO `featured` (`id`, `name`, `desciption`, `prix`) VALUES
(1, 'Casque', 'Beexcellent Micro Casque Gaming PS4, Casque PC Ultra-Léger Stéréo Lumière Stéréo Bass Anti-Bruit LED lumière avec 3.5mm Connecteur Compatible Xbox One Laptop Tablette et Tous Les Smartphone (Bleu)', '100'),
(2, 'Casque', 'JBL T450BT - Casque supra-auriculaire - Léger et pliable - Écouteurs Bluetooth sans fil - Avec commande pour appels - Autonomie jusqu’à 11 hrs - Noir ', '150'),
(3, 'Camera', 'Sony FDR-X3000R + AKA-FGP1 Camera d\'action ultra-stabilisée/4K | Travel Kit | Blanc', '120'),
(4, 'Cameras', 'Mevo Plus (EU) - La Caméra des événements en Direct : Diffusez en Full HD 1080p ou Enregistrez en 4K, Compatible avec Android et iOS ', '200'),
(5, 'Cameras', 'GoPro HERO7 Black — Caméra numérique embarquée étanche avec écran tactile, vidéo HD 4K, photos 12 MP, diffusion en direct et stabilisation intégrée ', '200'),
(6, 'Montre', 'Willful Montre Connectée Smartwatch Bracelet Connecté Podomètre Etanche IP68 Écran Couleur pour Femme Homme Enfant Smart Watch Cardiofréquencemètre pour iPhone Samsung Huawei Android iOS Smartphone ', '25'),
(7, 'Imprimante', 'HP Sprocket Imprimante Photo portable (Bluetooth, Impression Couleur sans Encre 5 x 7,6 cm) Blanc ', '147'),
(8, 'Fitbit', 'Fitbit - Charge 2 - Bracelet d\'activité et de suivi de la fréquence cardiaque', '122');

-- --------------------------------------------------------

--
-- Structure de la table `feedbeck`
--

DROP TABLE IF EXISTS `feedbeck`;
CREATE TABLE IF NOT EXISTS `feedbeck` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `feedbeck`
--

INSERT INTO `feedbeck` (`id`, `name`, `email`, `subject`, `message`) VALUES
(2, 'belgacem', 'belgacem3.ghiloufi@enis.tn', 'bbb', 'kkkkkkkkk');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `idp` int(255) NOT NULL AUTO_INCREMENT,
  `category` int(255) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`idp`),
  UNIQUE KEY `code` (`code`),
  KEY `category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`idp`, `category`, `code`, `nom`, `description`, `prix`, `quantite`) VALUES
(1, 1, 'x12', 'Cameras', '', 100, 10),
(2, 1, 'x13', 'Cameras', '', 150, 20),
(3, 1, 'x14', 'Cameras', '', 200, 15),
(4, 3, 'x20', 'Mobile Phone', 'Honor View 10 Smartphone portable debloque 4G (Ecran: 5,99 pouces - 128 Go - Double Nano-SIM - Android) Noir ', 370, 11),
(5, 1, 'x22', 'Camescope Noir', 'Canon - Legria HF R806 - Camescope Noir ', 295, 10),
(6, 2, 'x23', ' Lenovo 80X6004QFR', '[Ancien Modele] Lenovo 80X6004QFR Ultrabook 13,3\'\' Gris (Intel Core i5, 8 Go de RAM, 256, Go, Intel HD Graphics, Windows 10)', 10250, 10);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `idt` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idt`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`idt`, `nom`) VALUES
(6, 'BOOKS'),
(2, 'CLOTHES'),
(1, 'ELECTRONICS'),
(5, 'FOOD AND BEVERAGES'),
(3, 'SPORTS & LEISURE');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idu` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idu`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idu`, `nom`, `prenom`, `email`, `pass`) VALUES
(1, 'belgacem', 'ghiloufi', 'belgacemghiloufi2019@gmail.com', '41709926'),
(2, 'ghiloufi', 'belgacem', 'belgacemghiloufi2018@gmail.com', '41709926'),
(3, 'belgacem1', 'ghiloufi', 'belgacemghiloufi2017@gmail.com', '41709926'),
(4, 'belgacem2', 'ghiloufi', 'belgacemghiloufi2020@gmail.com', '41709926'),
(5, 'ghiloufi2', 'belgacem', 'belgacemghiloufi@gmail.com', '41709926'),
(6, 'ghiloufi3', 'belgacem', 'belgacemghiloufi2016@gmail.com', '41709926'),
(7, 'ghiloufi4', 'belgacem', 'belgacemghiloufi2@gmail.com', '41709926');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type` (`idt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`idcat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
