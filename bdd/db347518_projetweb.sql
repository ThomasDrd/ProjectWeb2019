-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : db113074.sql-pro.online.net
-- Généré le :  mar. 28 jan. 2020 à 00:00
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db347518_projetweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE `avoir` (
  `operateur_id` int(11) NOT NULL,
  `deal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `date`, `deal_id`, `user_id`) VALUES
(1, 'TROP DROLe CEST UN TEST', '2020-01-24 12:41:54', 10, 1),
(18, 'test\r\n', '2020-01-24 14:47:20', 2, 0),
(20, 'test', '2020-01-24 23:01:41', 2, 0),
(22, 'Trop cool je suis chaud', '2020-01-25 21:27:54', 3, 13),
(33, 'test', '2020-01-27 22:22:34', 2, 1),
(34, 'test', '2020-01-27 22:22:36', 2, 1),
(35, 'test', '2020-01-27 22:22:39', 2, 1),
(36, 'test', '2020-01-27 22:37:43', 2, 10);

-- --------------------------------------------------------

--
-- Structure de la table `deals`
--

CREATE TABLE `deals` (
  `deal_id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `conditions` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `date_ajout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_exp` datetime DEFAULT NULL,
  `date_deb` datetime DEFAULT NULL,
  `posted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `deals`
--

INSERT INTO `deals` (`deal_id`, `nom`, `description`, `conditions`, `user_id`, `date_ajout`, `date_exp`, `date_deb`, `posted`) VALUES
(2, 'Bambou pas cher', '', 'Uniquement pour les indiens', 1, '2019-12-03 09:09:58', '2019-12-01 00:00:00', '2019-12-24 00:00:00', 1),
(3, 'Parachute sans voile', '', 'Sans conditions', 1, '2019-12-04 10:47:58', '2019-12-08 00:00:00', '2019-12-15 00:00:00', 1),
(4, 'Formule 1 pour tétraplégique', 'Commande au volant', 'Uniquement pour les handicapé', 1, '2019-12-05 09:09:58', '2019-12-27 00:00:00', '2019-12-25 00:00:00', 1),
(5, 'Fromage', '-20% sur le rayon fromage Leclerc', 'Uniquement au Leclerc', 1, '2019-12-05 09:09:58', '2019-12-25 00:00:00', '2019-12-21 00:00:00', 1),
(6, 'Black Forfait SFR', '100GO pour 12€', 'Pour les nouveaux client', 13, '2019-12-05 09:09:58', '2019-12-31 00:00:00', '2019-12-27 00:00:00', 1),
(7, 'Sosh forfait a 1€', '50Mo de Data', 'Pour ceux qui possède un chat', 1, '2019-12-05 09:09:58', '2019-12-27 00:00:00', '2020-01-23 00:00:00', 1),
(8, 'Bouygues forfait 5€', '5Go de Data', 'testest', 1, '2019-12-05 09:09:58', '2019-11-29 00:00:00', '2019-11-12 00:00:00', 0),
(9, 'Orangee', '20Go à 15€', NULL, 1, '2019-12-05 09:09:58', '2019-12-21 00:00:00', '2019-12-21 00:00:00', 0),
(10, 'FREE', 'Offre pour deux euros', '12mois', 1, '2019-12-05 09:09:58', '2019-12-21 00:00:00', '2019-12-21 00:00:00', 0),
(22, 'testvvvccvv', 'tes', 'test', 1, '2019-12-17 22:04:41', '2018-11-16 00:00:00', '2019-11-04 09:03:03', 0),
(24, 'test', 'te', 's', 1, '2019-12-18 22:24:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(25, 'Deal modo test', 'deal', 'de', 1, '2019-12-21 12:55:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(36, 'Deal thomas', '', '', 10, '2020-01-24 23:47:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `operateurs`
--

CREATE TABLE `operateurs` (
  `operateur_id` int(11) NOT NULL,
  `operateur` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`role_id`, `role`) VALUES
(1, 'Administrateur'),
(2, 'Utilisateur'),
(3, 'Modérateur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `prenom` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `mail` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `pseudo` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `nom`, `prenom`, `mail`, `password`, `pseudo`, `role_id`) VALUES
(1, 'Admin', 'Administrateur', 'admin@mail.fr', '$2y$10$hsJnjeyqHnPG/9PJYyTKuuBXpYkur7lNFyUuVyrFQkV6nl5Ftvi.a', 'GigaAdminx', 1),
(10, 'Durand', 'Thomas', 'thomas@mail.com', '$2y$10$Z2lj0muMtRQRK.qIK3d95eKqi6AIzHVb5j7ImR.knAYKowvBeVdSm', 'thomas', 2),
(11, 'Moderateur', 'Modo', 'modo@mail.fr', '$2y$10$kqkLNJ/.pySCuvxGE0zeoeO/ckVd31DtX48I.5Rg9qwnhZwSUa3KG', 'modo', 3),
(12, 'User', 'User', 'user@user.user', '$2y$10$z6cgm/SS6.za65dGDWpImOrH4D8Vtb2weOEu22akNcFZsj7qblvO.', 'user', 2),
(13, 'duarte', 'jean-Baptiste', 'duarte_jeanbaptiste@outlook.fr', '$2y$10$4cxHZk.KpeE7VQzIac8rkOPwqpDlHLbFFUykUZTrImO6crqqT4C1S', 'jbduarte', 1),
(20, 'anto', 'anto', 'anto@mail.fr', '$2y$10$wsXI5sZ2fo4CkmWEfnf3L.8Mn36rtN.erUtbys9i3fxteWUc4CzjC', 'anto', 1),
(21, 'aaaa', 'aaaa', 'anto@mail.com', '$2y$10$wMGT2.25u5P1wmfcmBAU/ObcDRfGDP5xWz2Td4vBT1KGcQrAoAuqq', 'fnsdlfkhsqlflms', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD PRIMARY KEY (`operateur_id`,`deal_id`),
  ADD KEY `avoir_deals0_FK` (`deal_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_deals_FK` (`deal_id`),
  ADD KEY `comments_users_FK` (`user_id`) USING BTREE;

--
-- Index pour la table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`deal_id`),
  ADD KEY `deals_users_FK` (`user_id`);

--
-- Index pour la table `operateurs`
--
ALTER TABLE `operateurs`
  ADD PRIMARY KEY (`operateur_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD KEY `users_roles_FK` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `deals`
--
ALTER TABLE `deals`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `operateurs`
--
ALTER TABLE `operateurs`
  MODIFY `operateur_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `avoir_deals0_FK` FOREIGN KEY (`deal_id`) REFERENCES `deals` (`deal_id`),
  ADD CONSTRAINT `avoir_operateurs_FK` FOREIGN KEY (`operateur_id`) REFERENCES `operateurs` (`operateur_id`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_deals_FK` FOREIGN KEY (`deal_id`) REFERENCES `deals` (`deal_id`);

--
-- Contraintes pour la table `deals`
--
ALTER TABLE `deals`
  ADD CONSTRAINT `deals_users_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roles_FK` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
