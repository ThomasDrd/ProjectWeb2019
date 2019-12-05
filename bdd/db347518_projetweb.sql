-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : db113074.sql-pro.online.net
-- Généré le :  jeu. 05 déc. 2019 à 11:50
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
  `contenuComment` varchar(255) CHARACTER SET utf8 NOT NULL,
  `dateComment` int(11) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `deals`
--

CREATE TABLE `deals` (
  `deal_id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `conditions` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `img` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `date_ajout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_exp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `deals`
--

INSERT INTO `deals` (`deal_id`, `nom`, `description`, `conditions`, `user_id`, `img`, `date_ajout`, `date_exp`) VALUES
(1, 'Deal Moto', 'Moto en solde ', 'Etre pauvre', 1, '/ProjectWeb2019/user_guide/_images/moto.jpg', '2019-12-04 09:09:58', NULL),
(2, 'Bambou pas cher', '-20% sur les bambous africain', 'Uniquement pour les indiens', 1, '/ProjectWeb2019/user_guide/_images/bambou.jpg', '2019-12-03 09:09:58', NULL),
(3, 'Parachute sans voile', '-99% sur ce produit', 'Sans conditions', 1, '/ProjectWeb2019/user_guide/_images/parachute.jpg', '2019-12-04 10:47:58', NULL),
(4, 'Formule 1 pour tétraplégique', 'Commande au volant', 'Uniquement pour les handicapé', 1, '/ProjectWeb2019/user_guide/_images/F1.png', '2019-12-05 09:09:58', NULL),
(5, 'Fromage', '-20% sur le rayon fromage Leclerc', 'Uniquement au Leclerc', 1, '/ProjectWeb2019/user_guide/_images/fromage.jpg', '2019-12-05 09:09:58', NULL),
(6, 'Black Forfait SFR', '100GO pour 12€', 'Pour les nouveaux client', 1, '/ProjectWeb2019/user_guide/_images/sfr.jpg', '2019-12-05 09:09:58', NULL),
(7, 'Sosh forfait a 1€', '50Mo de Data', 'Pour ceux qui possède un chat', 1, '/ProjectWeb2019/user_guide/_images/sosh.jpg', '2019-12-05 09:09:58', NULL),
(8, 'Bouygues forfait 5€', '5Go de Data', NULL, 1, '/ProjectWeb2019/user_guide/_images/bouyguechat.jpg', '2019-12-05 09:09:58', NULL),
(9, 'Orange', '20Go à 15€', NULL, 1, '/ProjectWeb2019/user_guide/_images/orange.jpg', '2019-12-05 09:09:58', NULL),
(10, 'FREE', 'Offre pour deux euros', '12mois', 1, '/ProjectWeb2019/user_guide/_images/free.jpg', '2019-12-05 09:09:58', NULL);

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
(2, 'User'),
(3, 'Modo');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `prenom` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `mail` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pseudo` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `nom`, `prenom`, `mail`, `password`, `pseudo`, `role_id`) VALUES
(1, 'Admin', 'Admin', 'admin@mail.fr', 'admin', 'adm', 1),
(2, 'Farcis', 'Cabrel', 'jambondefrance@hotmail.fr', 'jambon', 'Xx-Jambono-xX', 3);

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
  ADD KEY `comments_deals_FK` (`deal_id`);

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
  ADD KEY `users_roles_FK` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `deals`
--
ALTER TABLE `deals`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
