-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 28 nov. 2017 à 15:49
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
-- Base de données :  `balance_ton_code`
--
DROP DATABASE IF EXISTS `balance_ton_code`;
CREATE DATABASE IF NOT EXISTS `balance_ton_code` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `balance_ton_code`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `title` text,
  `description` text,
  `vote` decimal(5,0) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `is_publish` tinyint(1) NOT NULL,
  `_id_util` int(11) NOT NULL,
  `_id_lang` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `title`, `description`, `vote`, `release_date`, `is_publish`, `_id_util`, `_id_lang`) VALUES
(3, 'le plus petit code possible', NULL, NULL, '2017-11-17', 0, 3, 1),
(4, 'blabla', NULL, NULL, '2017-11-17', 0, 3, 1),
(5, 'Ins&eacute;rer lien bootstrap', NULL, NULL, '2017-11-23', 0, 2, 1),
(6, 'bootstrap', NULL, '4', '2017-11-23', 0, 2, 2),
(16, '.add( selector )', 'Create a new jQuery object with elements added to the set of matched elements.', NULL, '2017-11-27', 0, 2, 3),
(17, 'ezsztgzgzegzeg', 'zegzegzgzeg', NULL, '2017-11-27', 0, 2, 3),
(18, 'aezgaze', 'zgegzgzg', NULL, '2017-11-27', 0, 2, 1),
(19, 'rthrjrr', 'rtuyrturtu', NULL, '2017-11-27', 0, 2, 1),
(20, 'rthrjrr', 'rtuyrturtu', NULL, '2017-11-27', 0, 2, 1),
(21, 'erheherherh', 'erheherhe', NULL, '2017-11-27', 0, 2, 3),
(22, 'erheherherh', 'erheherhe', NULL, '2017-11-27', 0, 2, 3),
(23, 'zeztzet', 'zetztezt', NULL, '2017-11-27', 0, 2, 2),
(24, 'zeztzet', 'zetztezt', NULL, '2017-11-27', 0, 2, 2),
(25, 'zeztzet', 'zetztezt', NULL, '2017-11-27', 0, 2, 2),
(26, 'ngksdgni', 'sgiodngik', NULL, '2017-11-27', 0, 2, 2),
(27, 'ngksdgni', 'sgiodngik', NULL, '2017-11-27', 0, 2, 2),
(28, 'gsq', 'qdfhqdfh', NULL, '2017-11-27', 0, 2, 3),
(29, 'sdfsd', 'sdgqsd', NULL, '2017-11-27', 0, 2, 2),
(30, 'sdfsd', 'sdgqsd', NULL, '2017-11-27', 0, 2, 2),
(31, 'sdfsds', 'sdfqsd', NULL, '2017-11-27', 0, 2, 3),
(32, 'sdgfsd', 'sdgsd', NULL, '2017-11-27', 0, 2, 2),
(33, 'qdsbgjsng', 'gsdklghsdjg', NULL, '2017-11-27', 0, 2, 3),
(34, 'qsdfsdf', 'sdfsd', NULL, '2017-11-27', 0, 2, 2),
(35, 'sgsdgsq', 'sdgsdg', NULL, '2017-11-27', 0, 2, 3),
(36, 'sgsdgsq', 'sdgsdg', NULL, '2017-11-27', 0, 2, 3),
(37, 'zetsdtg', 'sfgsdgs', NULL, '2017-11-27', 0, 2, 1),
(38, 'fsdfs', 'sdfsdfs', NULL, '2017-11-27', 0, 2, 2),
(39, 'fsdfs', 'sdfsdfs', NULL, '2017-11-27', 0, 2, 2),
(40, 'fsdfqsdfsd', 'sqdgqsdg', NULL, '2017-11-27', 0, 2, 4),
(41, 'sdgfdsxg', 'gsxdgsg', NULL, '2017-11-27', 0, 2, 2),
(42, 'dfbhdf', 'dfbdfbgd', NULL, '2017-11-27', 0, 2, 3),
(43, 'Softcode', 'zegzgzgzg', NULL, '2017-11-28', 0, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `article_has_tag`
--

CREATE TABLE `article_has_tag` (
  `_id_article` int(11) NOT NULL,
  `_id_tag` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id_com` int(10) NOT NULL,
  `content` text,
  `release_date` date DEFAULT NULL,
  `_id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `content_article`
--

CREATE TABLE `content_article` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `_id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `content_article`
--

INSERT INTO `content_article` (`id`, `content`, `_id_article`) VALUES
(1, '0', 39),
(2, '0', 39),
(3, 'content1', 40),
(4, 'content2', 40),
(5, 'content3', 40),
(6, 'sdgsdgsd', 41),
(7, '&lt;p&gt;&lt;/p&gt;', 41),
(8, 'sgjhsdgjk454', 41),
(9, 'dsfbdfbgd', 42),
(10, 'dfbdfbdf', 42),
(11, 'dfbdf', 42),
(12, 'dfbdfbdfbdf', 42),
(13, 'zegzgzegzegzeg', 43),
(14, 'zegfezgzgzgzgzeg', 43),
(15, 'gzezgezgzegzgzegzgzeg', 43);

-- --------------------------------------------------------

--
-- Structure de la table `language`
--

CREATE TABLE `language` (
  `id_lang` int(10) UNSIGNED NOT NULL,
  `language_name` varchar(50) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `language`
--

INSERT INTO `language` (`id_lang`, `language_name`, `description`) VALUES
(1, 'html', NULL),
(2, 'css', NULL),
(3, 'Js & Jquery', NULL),
(4, 'PHP', NULL),
(5, 'MySQL', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id_pic` int(10) UNSIGNED NOT NULL,
  `caption` varchar(50) DEFAULT NULL,
  `picture` varchar(255) NOT NULL,
  `_id_util` int(11) NOT NULL
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
  `token_key` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `token`
--

INSERT INTO `token` (`id`, `token_key`) VALUES
(3, '24f16c13cae7f2684b8a071362072686');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_util` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `function` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `registration` date DEFAULT NULL,
  `city` varchar(128) NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `rank` int(11) DEFAULT '10',
  `password` varchar(255) DEFAULT NULL,
  `nb_article` int(11) DEFAULT '0',
  `nb_comment` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_util`, `firstname`, `lastname`, `pseudo`, `function`, `email`, `registration`, `city`, `country`, `rank`, `password`, `nb_article`, `nb_comment`) VALUES
(2, 'Flogny', 'Damien', 'Macadams', 'etudiant', 'damien.flogny@gmail.com', NULL, 'Paris', 'France', 1, '$2y$10$7GvmiATxeFpdcW40.veRgecwzpSgX9GBkrT6VkVnbuUNPHgbyr.v.', 0, 0),
(3, 'blabla', 'blabla', 'bloblo89', 'noob', 'macminus@webforce3.fr', NULL, 'blabla', 'blabla', 10, '$2y$10$fOWHaHmjUMnzpiMMqYiVROMFw66Hz7uBf.gee4RGwv9ve2urelUda', 0, 0),
(4, 'Mac', 'Maxi', '', 'noob', 'macmaxi@webforce3.fr', NULL, 'auxerre', 'france', 10, '$2y$10$NtynOlcvn8jkREyI0Dz5Fun2x72hczmocGYkoA/EMMivPdiderl42', 0, 0),
(5, 'Veinstein', 'Herv&eacute;', '', 'noob', 'veinstein@webforce3.fr', NULL, 'auxerre', 'france', 10, '$2y$10$R9WnAaO0DRq0OIpPrwh4LuqJREc.2y6jemlYUounybUVX9MUv3HD.', 0, 0),
(6, 'jean', 'mi', '', 'noob', 'jeanmi@webforce3.fr', NULL, 'auxerre', 'france', 10, '$2y$10$mAtLG/qO4QuSrVXTrrypl.XRgK4gJAAUaBZYfejgj9eMCNbfga9XC', 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `fk_article_utilisateur_idx` (`_id_util`),
  ADD KEY `fk_article_lang1_idx` (`_id_lang`);

--
-- Index pour la table `article_has_tag`
--
ALTER TABLE `article_has_tag`
  ADD PRIMARY KEY (`_id_article`,`_id_tag`),
  ADD KEY `fk_article_has_tag_tag1_idx` (`_id_tag`),
  ADD KEY `fk_article_has_tag_article1_idx` (`_id_article`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `fk_commentaire_article1_idx` (`_id_article`);

--
-- Index pour la table `content_article`
--
ALTER TABLE `content_article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `_id_article` (`_id_article`);

--
-- Index pour la table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id_lang`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id_pic`),
  ADD KEY `_id_util` (`_id_util`);

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
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_util`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_com` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `content_article`
--
ALTER TABLE `content_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `language`
--
ALTER TABLE `language`
  MODIFY `id_lang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id_pic` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_util` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`_id_util`) REFERENCES `user` (`id_util`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`_id_lang`) REFERENCES `language` (`id_lang`);

--
-- Contraintes pour la table `article_has_tag`
--
ALTER TABLE `article_has_tag`
  ADD CONSTRAINT `article_has_tag_ibfk_1` FOREIGN KEY (`_id_article`) REFERENCES `article` (`id_article`),
  ADD CONSTRAINT `article_has_tag_ibfk_2` FOREIGN KEY (`_id_tag`) REFERENCES `tag` (`id_tag`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`_id_article`) REFERENCES `article` (`id_article`);

--
-- Contraintes pour la table `content_article`
--
ALTER TABLE `content_article`
  ADD CONSTRAINT `content_article_ibfk_1` FOREIGN KEY (`_id_article`) REFERENCES `article` (`id_article`);

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`_id_util`) REFERENCES `user` (`id_util`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
