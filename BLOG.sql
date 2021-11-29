-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 26 nov. 2021 à 16:48
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `BLOG`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` tinyint(3) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `user_id` tinyint(3) NOT NULL,
  `categorie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `user_id`, `categorie`) VALUES
(1, 'article 1', ' blabla\r\n                    article 1                                                                                                                                                        ', 9, 'cat 1'),
(2, 'article 2', 'contenu 2', 9, 'cat 1'),
(3, 'article 3', 'contenu 3\r\n', 9, 'cat 3'),
(4, 'article 4', 'contenu 4', 9, 'cat 4'),
(5, 'article 5', 'contenu 5', 9, 'cat 5'),
(24, 'truxc!', 'truxc!', 16, 'cat 2');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` tinyint(3) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `accepted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `password`, `accepted`) VALUES
(1, 'aelie', 'klein.amelie1991@gmail.com', '$2y$10$4UGy/SJ9G/KO.EH587OwV.EkhIX5/axE5YntlMRk0ZdZfdXV8evw6', 1),
(6, 'bb', 'bb@gmail.com', '$2y$10$oCbJx6g5NMoQ9I2Ef23HS.ispLvmncV3.df1bLe3xdgkdQrAnG/ki', 1),
(7, 'yann', 'yann@gmail.com', '$2y$10$VJvxm5pM9a4trfmBy1wevOMW9LmrmtNPmdaoDjRoypax/ODdRmRy2', 1),
(8, 'amelie', 'klein.amelie1991@gmail.com', '$2y$10$jDSKP5KZblpe5ZONsM8zWeEnZihd8DQCPIfMZA7cERw62OGvt8/Jq', 1),
(9, 'truc', 'truc@hg.com', '$2y$10$nvQ5Vj2uzFvmWVDkRF7Kye5K.cNY1i1Q05It3ncoOpbHZbTlxdFde', 1),
(10, 'tata', 'tata@gmail.com', '$2y$10$jfH.38v0HZvut1MWghOUvOOGzljIW4n0u9.tUs1tK1K/zr6/QsVd6', 1),
(11, 'zer', 'gg@gmail.com', '$2y$10$srfK1orbWcQxCbaUGZrl0Ow4UXgdSRBMozzPdHsDRR2JB0bk.zgPa', 1),
(12, 'rfgd', 'fggdf@gmail.com', '$2y$10$/G1YkNYjFmBHgfeUfM9Q5uU9UKDmrgORj/Td81JXFtTcyzIPUrPo2', 1),
(13, 'ttt', 'ttt@gmail.com', '$2y$10$3J/54NdMoPwumyq9LlI5ceZTc5.W5cuprWAHfyigwktI2dpU.Uwyq', 1),
(14, 'uyy', 'yyy@gmail.com', '$2y$10$C7TIJPL9fxfF0rAGPLPw9OsjsGXtoZK8xZLowNk7ukSJ8BbqSjno.', 1),
(15, 'tralala', 'tr@gmail.com', '$2y$10$YjHs6me594Lm60l6AF4c4eqfJ7h6esYkVE.TBuqHOQH0OKPfv9a1y', 1),
(16, '123', '123@gmail.com', '$2y$10$GRpqF2nYJF8kaVm2KsWx5OdrckNC8HslEXQPsIDBBpexigRjyLKDK', 1),
(17, 'bb', 'bb@gmail.com', '$2y$10$WSw4u8fE5yP9ZeIjfiXhPO2GbcVcv1jJOMN2HBjE9/ZUNEqqe4MQS', 1),
(18, '22', '22@gmail.com', '$2y$10$6m1f4VgtMOJmRkxSjqoJY.3YRTYhSsO.GXM2ku.izkCzNBbKGyaIK', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_user_id` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `Fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
