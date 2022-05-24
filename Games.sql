-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2022 at 09:25 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `games`
--

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE `editor` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`id`, `name`, `country`, `city`, `description`) VALUES
(1, 'Ubisoft', 'France', 'Paris', 'Ubisoft c\'est vraiment super !'),
(2, 'Gorilla', 'Allemagne', 'Berlin', 'Créateurs du jeu archero ce sont des génies.');

-- --------------------------------------------------------

--
-- Table structure for table `games`
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
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `name_game`, `description_game`, `price`, `device`, `genre`, `editor`) VALUES
(1, 'Trackmania', 'Trackmania est un jeu de voiture qui a des bases très classique d\'un jeu de course mais qui possède des mécaniques de jeux inattendues. Vous ne pourrez jamais atteindre le temps le plus optimisé ce qui rend la compétition sur ce jeu intéressante. De plus, elle peut être diffusée à tout public car les bases du jeu sont simple à comprendre. Il y a un départ, une arrivée et des checkpoints.', 36, 'Desktop', 'Racing', 'Ubisoft'),
(2, 'Archero', 'Archero est un jeu mobile qui se joue avec la vue du dessus de votre héros. Vous aurez de multiples châteaux à parcourir par étages. Votre but, finir tous les châteaux rempli de monstres les plus forts. Améliorez votre équipement afin de les vaincre.', 1, 'Phone', 'floors levels', 'Gorilla'),
(3, 'forza', 'vroum vroum tchao', 150, 'mon gros bide', 'la vitesse', 'Ubisoft');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `editor`
--
ALTER TABLE `editor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
