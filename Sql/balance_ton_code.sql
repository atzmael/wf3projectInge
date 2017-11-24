-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 24 nov. 2017 à 14:19
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
  `content` text,
  `vote` decimal(5,0) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `is_publish` tinyint(1) NOT NULL,
  `_id_util` int(11) NOT NULL,
  `_id_lang` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `title`, `description`, `content`, `vote`, `release_date`, `is_publish`, `_id_util`, `_id_lang`) VALUES
(3, 'le plus petit code possible', NULL, '&lt;p&gt;', NULL, '2017-11-17', 0, 3, 1),
(4, 'blabla', NULL, '&lt;p&gt;&lt;/p&gt;', NULL, '2017-11-17', 0, 3, 1),
(5, 'Ins&eacute;rer lien bootstrap', NULL, 'CSS\r\n\r\nCopy-paste the stylesheet &lt;link&gt; into your &lt;head&gt; before all other stylesheets to load our CSS.\r\n\r\n&lt;link rel=&quot;stylesheet&quot; href=&quot;https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css&quot; integrity=&quot;sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb&quot; crossorigin=&quot;anonymous&quot;&gt;\r\n\r\nJS\r\n\r\nMany of our components require the use of JavaScript to function. Specifically, they require jQuery, Popper.js, and our own JavaScript plugins. Place the following &lt;script&gt;s near the end of your pages, right before the closing &lt;/body&gt; tag, to enable them. jQuery must come first, then Popper.js, and then our JavaScript plugins.\r\n\r\nWe use jQuery&rsquo;s slim build, but the full version is also supported.\r\n\r\n&lt;script src=&quot;https://code.jquery.com/jquery-3.2.1.slim.min.js&quot; integrity=&quot;sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;\r\n&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js&quot; integrity=&quot;sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;\r\n&lt;script src=&quot;https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js&quot; integrity=&quot;sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;\r\n\r\nCurious which components explicitly require jQuery, our JS, and Popper.js? Click the show components link below. If you&rsquo;re at all unsure about the general page structure, keep reading for an example page template.', NULL, '2017-11-23', 0, 2, 1),
(6, 'bootstrap', NULL, '&lt;!doctype html&gt;\r\n&lt;html lang=&quot;en&quot;&gt;\r\n  &lt;head&gt;\r\n    &lt;title&gt;Hello, world!&lt;/title&gt;\r\n    &lt;!-- Required meta tags --&gt;\r\n    &lt;meta charset=&quot;utf-8&quot;&gt;\r\n    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1, shrink-to-fit=no&quot;&gt;\r\n\r\n    &lt;!-- Bootstrap CSS --&gt;\r\n    &lt;link rel=&quot;stylesheet&quot; href=&quot;https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css&quot; integrity=&quot;sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb&quot; crossorigin=&quot;anonymous&quot;&gt;\r\n  &lt;/head&gt;\r\n  &lt;body&gt;\r\n    &lt;h1&gt;Hello, world!&lt;/h1&gt;\r\n\r\n    &lt;!-- Optional JavaScript --&gt;\r\n    &lt;!-- jQuery first, then Popper.js, then Bootstrap JS --&gt;\r\n    &lt;script src=&quot;https://code.jquery.com/jquery-3.2.1.slim.min.js&quot; integrity=&quot;sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;\r\n    &lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js&quot; integrity=&quot;sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;\r\n    &lt;script src=&quot;https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js&quot; integrity=&quot;sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;\r\n  &lt;/body&gt;\r\n&lt;/html&gt;', NULL, '2017-11-23', 0, 2, 2);

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
(2, 'css', NULL);

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
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_com` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `language`
--
ALTER TABLE `language`
  MODIFY `id_lang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`_id_util`) REFERENCES `user` (`id_util`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
