-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 13 nov. 2017 à 11:56
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `iffs`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `titre` text,
  `description` text,
  `contenu` text,
  `vote` decimal(10,0) DEFAULT NULL,
  `date_parution` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_com` int(10) UNSIGNED NOT NULL,
  `titre_com` text,
  `date_parution` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lang`
--

CREATE TABLE `lang` (
  `id_lang` int(10) UNSIGNED NOT NULL,
  `nom_lang` varchar(50) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id_pic` int(10) UNSIGNED NOT NULL,
  `caption` varchar(50) DEFAULT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rang`
--

CREATE TABLE `rang` (
  `id_rang` int(10) UNSIGNED NOT NULL,
  `nom_rang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(10) UNSIGNED NOT NULL,
  `tag_name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `cle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_util` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `inscription` date DEFAULT NULL,
  `annee_de_naissance` int(4) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_com`);

--
-- Index pour la table `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id_lang`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id_pic`);

--
-- Index pour la table `rang`
--
ALTER TABLE `rang`
  ADD PRIMARY KEY (`id_rang`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Index pour la table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_util`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_com` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lang`
--
ALTER TABLE `lang`
  MODIFY `id_lang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id_pic` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rang`
--
ALTER TABLE `rang`
  MODIFY `id_rang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_util` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
