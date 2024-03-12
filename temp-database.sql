-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 12 mars 2024 à 09:42
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rentaserv`
--

-- --------------------------------------------------------

--
-- Structure de la table `operating_systems`
--

CREATE TABLE `operating_systems` (
  `id` int(11) NOT NULL,
  `Nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `operating_systems`
--

INSERT INTO `operating_systems` (`id`, `Nom`) VALUES
(1, 'Unix'),
(2, 'Linux'),
(3, 'macOS'),
(4, 'NetWare');

-- --------------------------------------------------------

--
-- Structure de la table `serveurs`
--

CREATE TABLE `serveurs` (
  `id` int(11) NOT NULL,
  `prix` double NOT NULL,
  `nom` varchar(20) NOT NULL,
  `marque` varchar(20) NOT NULL,
  `processeur` varchar(20) NOT NULL,
  `RAM` int(11) NOT NULL,
  `stockage` int(11) NOT NULL,
  `owner` int(11) DEFAULT NULL,
  `operating_system` int(11) DEFAULT NULL,
  `icon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `serveurs`
--

INSERT INTO `serveurs` (`id`, `prix`, `nom`, `marque`, `processeur`, `RAM`, `stockage`, `owner`, `operating_system`, `icon`) VALUES
(14673, 3.99, 'WebCloud Lite', '2CRSI', 'Intel i3', 4, 1, NULL, 2, ''),
(14769, 8.99, 'GamingCloud 28', 'CYPHER GLOBAL', 'Xeon 4 Core', 8, 512, NULL, 1, ''),
(17305, 24.99, 'PanaCloud 15', 'Panasonic', 'Intel i7', 32, 2048, NULL, 3, ''),
(44983, 19.99, 'WebCloud 36+', '2CRSI', 'Intel i5', 16, 1024, NULL, 2, ''),
(56423, 12.99, 'Server pro 4U', 'LDLC', 'Intel i5', 16, 960, NULL, 3, ''),
(66019, 15.99, 'KS-4', 'OVHcloud', 'Intel i5', 16, 2048, NULL, 4, ''),
(77158, 26.99, 'KS-8', 'OVHcloud', 'Intel Xeon E5', 64, 960, NULL, 4, ''),
(79238, 10.99, 'PanaCloud 8', 'Panasonic', 'Intel i5', 16, 512, NULL, 3, ''),
(81950, 16.99, 'GamingCloud 28++', 'CYPHER GLOBAL', 'Xeon 8 Core', 32, 1024, NULL, 1, ''),
(92557, 9.99, 'ServerPro 2U', 'LDLC', 'Intel i3', 8, 480, NULL, 3, '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `operating_systems`
--
ALTER TABLE `operating_systems`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `serveurs`
--
ALTER TABLE `serveurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Serveurs_Utilisateurs_idx` (`owner`),
  ADD KEY `fk_Serveurs_Operating_Systems1_idx` (`operating_system`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `serveurs`
--
ALTER TABLE `serveurs`
  ADD CONSTRAINT `fk_Serveurs_Operating_Systems1` FOREIGN KEY (`operating_system`) REFERENCES `operating_systems` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Serveurs_Utilisateurs` FOREIGN KEY (`owner`) REFERENCES `utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
