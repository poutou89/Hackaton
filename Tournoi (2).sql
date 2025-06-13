-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le : ven. 13 juin 2025 à 10:15
-- Version du serveur : 8.0.42
-- Version de PHP : 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Tournoi`
--

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

CREATE TABLE `matchs` (
  `id_match` int NOT NULL,
  `id_tournoi` int DEFAULT NULL,
  `round` int DEFAULT NULL,
  `player1_id` int DEFAULT NULL,
  `player2_id` int DEFAULT NULL,
  `score1` int DEFAULT NULL,
  `score2` int DEFAULT NULL,
  `gagnant_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `matchs`
--

INSERT INTO `matchs` (`id_match`, `id_tournoi`, `round`, `player1_id`, `player2_id`, `score1`, `score2`, `gagnant_id`) VALUES
(53, 36, 1, 6, 5, 25, 1, 6),
(54, 36, 1, 4, NULL, 1, 0, 4),
(55, 36, 2, 6, 4, 2, 1, 6),
(56, 37, 1, 3, 4, 32, 1, 3),
(57, 37, 1, 1, NULL, 2, 0, 1),
(58, 37, 2, 3, 1, 1, 3, 1),
(59, 38, 1, 5, 4, NULL, NULL, NULL),
(60, 38, 1, 1, NULL, NULL, NULL, NULL),
(61, 39, 1, 4, 1, 20, 10, 4),
(62, 39, 1, 3, NULL, 10, 0, 3),
(63, 39, 2, 4, 3, 20, 20, 3),
(64, 40, 1, 1, 4, 20, 18, 1),
(65, 40, 1, 3, NULL, 100, 0, 3),
(66, 40, 2, 1, 3, 1, 2, 3),
(67, 41, 1, 1, 3, 20, 2, 1),
(68, 41, 1, 1, 4, 20, 1, 1),
(69, 41, 1, 1, 5, 1, 20, 5),
(70, 41, 1, 3, 4, 3, 5, 4),
(71, 41, 1, 3, 5, 7, 8, 5),
(72, 41, 1, 4, 5, 9, 8, 4),
(73, 41, 2, 1, 1, NULL, NULL, NULL),
(74, 41, 2, 5, 4, NULL, NULL, NULL),
(75, 41, 2, 5, 4, NULL, NULL, NULL),
(76, 42, 1, 1, 3, 20, 50, 3),
(77, 42, 1, 1, 4, 10, 9, 1),
(78, 42, 1, 1, 5, 8, 9, 5),
(79, 42, 1, 3, 4, 5, 7, 4),
(80, 42, 1, 3, 5, 4, 63, 5),
(81, 42, 1, 4, 5, 2, 4, 5),
(82, 42, 2, 3, 1, 10, 5, 3),
(83, 42, 2, 5, 4, 2, 4, 4),
(84, 42, 2, 5, 5, 1, 2, 5),
(85, 42, 3, 3, 4, 2, 4, 4),
(86, 42, 3, 5, NULL, NULL, NULL, NULL),
(87, 43, 1, 4, 1, NULL, NULL, NULL),
(88, 43, 1, 4, 3, NULL, NULL, NULL),
(89, 43, 1, 1, 3, NULL, NULL, NULL),
(90, 44, 1, 3, 4, 20, 2, 3),
(91, 44, 1, 3, 1, 4, 5, 1),
(92, 44, 1, 4, 1, 7, 5, 4),
(93, 44, 2, 3, 1, 20, 1, 3),
(94, 44, 2, 4, NULL, 40, 0, 4),
(95, 44, 3, 3, 4, 20, 1, 3),
(96, 45, 1, 5, 3, 20, 10, 5),
(97, 45, 1, 5, 1, 1, 2, 1),
(98, 45, 1, 5, 4, 5, 7, 4),
(99, 45, 1, 3, 1, 10, 20, 1),
(100, 45, 1, 3, 4, 1, 4, 4),
(101, 45, 1, 1, 4, 8, 5, 1),
(102, 45, 2, 5, 1, NULL, NULL, NULL),
(103, 45, 2, 4, 1, NULL, NULL, NULL),
(104, 45, 2, 4, 1, NULL, NULL, NULL),
(105, 46, 1, 5, 3, 20, 2, 5),
(106, 46, 1, 5, 4, 1, 4, 4),
(107, 46, 1, 3, 4, 8, 2, 3),
(108, 46, 2, 5, 4, NULL, NULL, NULL),
(109, 46, 2, 3, NULL, NULL, NULL, NULL),
(110, 46, 2, 5, 4, NULL, NULL, NULL),
(111, 46, 2, 3, NULL, NULL, NULL, NULL),
(112, 47, 1, 3, 5, 52, 2, 3),
(113, 47, 1, 3, 1, 4, 58, 1),
(114, 47, 1, 3, 4, 0, 5, 4),
(115, 47, 1, 5, 1, 210, 11, 5),
(116, 47, 1, 5, 4, 20, 50, 4),
(117, 47, 1, 1, 4, 2, 1, 1),
(118, 47, 2, 3, 1, 50, 20, 3),
(119, 47, 2, 4, 5, 50, 10, 4),
(120, 47, 2, 4, 1, 10, 20, 1),
(121, 47, 2, 3, 1, NULL, NULL, NULL),
(122, 47, 2, 4, 5, NULL, NULL, NULL),
(123, 47, 2, 4, 1, NULL, NULL, NULL),
(124, 47, 2, 3, 4, NULL, NULL, NULL),
(125, 47, 2, 1, NULL, NULL, NULL, NULL),
(126, 48, 1, 4, 5, 52, 12, 4),
(127, 48, 1, 3, NULL, 1, 0, 3),
(128, 48, 2, 4, 3, 20, 10, 4);

-- --------------------------------------------------------

--
-- Structure de la table `tournoi`
--

CREATE TABLE `tournoi` (
  `id_tournoi` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tournoi`
--

INSERT INTO `tournoi` (`id_tournoi`, `nom`, `date`, `type`) VALUES
(36, 'qdzdqsd', '2025-06-13 07:46:51', 'knockout'),
(37, 'Catherine', '2025-06-13 09:02:11', 'knockout'),
(38, 'Catherine', '2025-06-13 09:23:21', 'knockout'),
(39, 'Kiril', '2025-06-13 09:42:21', 'round-robin'),
(40, 'vamos', '2025-06-13 09:45:18', 'knockout'),
(41, 'test', '2025-06-13 09:49:36', 'round-robin'),
(42, 'test2', '2025-06-13 09:52:23', 'round-robin'),
(43, 'test3', '2025-06-13 09:57:13', 'round-robin'),
(44, 'test3', '2025-06-13 09:59:46', 'round-robin'),
(45, 'test4', '2025-06-13 10:00:48', 'round-robin'),
(46, 'test5', '2025-06-13 10:03:34', 'round-robin'),
(47, 'test6', '2025-06-13 10:06:30', 'round-robin'),
(48, 'test7', '2025-06-13 10:07:48', 'round-robin');

-- --------------------------------------------------------

--
-- Structure de la table `tournoi_joueurs`
--

CREATE TABLE `tournoi_joueurs` (
  `id` int NOT NULL,
  `id_tournoi` int NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tournoi_joueurs`
--

INSERT INTO `tournoi_joueurs` (`id`, `id_tournoi`, `id_user`) VALUES
(93, 36, 4),
(94, 36, 5),
(95, 36, 6),
(96, 37, 1),
(97, 37, 3),
(98, 37, 4),
(99, 38, 1),
(100, 38, 4),
(101, 38, 5),
(102, 39, 1),
(103, 39, 3),
(104, 39, 4),
(105, 40, 1),
(106, 40, 3),
(107, 40, 4),
(108, 41, 1),
(109, 41, 3),
(110, 41, 4),
(111, 41, 5),
(112, 42, 1),
(113, 42, 3),
(114, 42, 4),
(115, 42, 5),
(116, 43, 1),
(117, 43, 3),
(118, 43, 4),
(119, 44, 1),
(120, 44, 3),
(121, 44, 4),
(122, 45, 1),
(123, 45, 3),
(124, 45, 4),
(125, 45, 5),
(126, 46, 3),
(127, 46, 4),
(128, 46, 5),
(129, 47, 1),
(130, 47, 3),
(131, 47, 4),
(132, 47, 5),
(133, 48, 3),
(134, 48, 4),
(135, 48, 5);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `mdp`, `role`) VALUES
(1, 'poutou89', 'ce11cd5bb406cdec290f9cff9c967a31d84b5d0c', 'admin'),
(3, 'dqzdzd', 'ce11cd5bb406cdec290f9cff9c967a31d84b5d0c', 'joueur'),
(4, 'kuiku', 'ce11cd5bb406cdec290f9cff9c967a31d84b5d0c', 'joueur'),
(5, 'iuiulu', 'ce11cd5bb406cdec290f9cff9c967a31d84b5d0c', 'joueur'),
(6, 'vcbv', 'ce11cd5bb406cdec290f9cff9c967a31d84b5d0c', 'joueur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`id_match`),
  ADD KEY `id_tournoi` (`id_tournoi`),
  ADD KEY `player1_id` (`player1_id`),
  ADD KEY `player2_id` (`player2_id`),
  ADD KEY `gagnant_id` (`gagnant_id`);

--
-- Index pour la table `tournoi`
--
ALTER TABLE `tournoi`
  ADD PRIMARY KEY (`id_tournoi`);

--
-- Index pour la table `tournoi_joueurs`
--
ALTER TABLE `tournoi_joueurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tournoi` (`id_tournoi`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `id_match` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT pour la table `tournoi`
--
ALTER TABLE `tournoi`
  MODIFY `id_tournoi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `tournoi_joueurs`
--
ALTER TABLE `tournoi_joueurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD CONSTRAINT `matchs_ibfk_1` FOREIGN KEY (`id_tournoi`) REFERENCES `tournoi` (`id_tournoi`),
  ADD CONSTRAINT `matchs_ibfk_2` FOREIGN KEY (`player1_id`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `matchs_ibfk_3` FOREIGN KEY (`player2_id`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `matchs_ibfk_4` FOREIGN KEY (`gagnant_id`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `tournoi_joueurs`
--
ALTER TABLE `tournoi_joueurs`
  ADD CONSTRAINT `tournoi_joueurs_ibfk_1` FOREIGN KEY (`id_tournoi`) REFERENCES `tournoi` (`id_tournoi`) ON DELETE CASCADE,
  ADD CONSTRAINT `tournoi_joueurs_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
