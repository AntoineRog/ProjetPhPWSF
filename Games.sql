-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 24 mai 2022 à 21:43
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `games`
--

-- --------------------------------------------------------

--
-- Structure de la table `editor`
--

CREATE TABLE `editor` (
  `id_editor` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `editor`
--

INSERT INTO `editor` (`id_editor`, `name`, `country`, `city`, `description`) VALUES
(1, 'Ubisoft', 'France', 'Paris', 'Ubisoft c\'est vraiment super !'),
(2, 'Gorilla', 'Allemagne', 'Berlin', 'Créateurs du jeu archero ce sont des génies.');

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `name_game` varchar(50) NOT NULL,
  `description_game` text NOT NULL,
  `price` int(11) NOT NULL,
  `device` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `editor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `name_game`, `description_game`, `price`, `device`, `genre`, `editor`) VALUES
(1, 'Trackmania', 'Trackmania est un jeu de voiture qui a des bases très classique d\'un jeu de course mais qui possède des mécaniques de jeux inattendues. Vous ne pourrez jamais atteindre le temps le plus optimisé ce qui rend la compétition sur ce jeu intéressante. De plus, elle peut être diffusée à tout public car les bases du jeu sont simple à comprendre. Il y a un départ, une arrivée et des checkpoints.', 36, 'Desktop', 'Racing', 'Ubisoft'),
(2, 'Archero', 'Archero est un jeu mobile qui se joue avec la vue du dessus de votre héros. Vous aurez de multiples châteaux à parcourir par étages. Votre but, finir tous les châteaux rempli de monstres les plus forts. Améliorez votre équipement afin de les vaincre.', 1, 'Phone', 'floors levels', 'Gorilla'),
(3, 'forza', 'vroum vroum tchao', 150, 'mon gros bide', 'la vitesse', 'Ubisoft');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`id_editor`);

--
-- Index pour la table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `editor`
--
ALTER TABLE `editor`
  MODIFY `id_editor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
