-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 07 déc. 2017 à 12:25
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

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `title` text,
  `description` text,
  `vote` decimal(5,0) DEFAULT '0',
  `release_date` date DEFAULT NULL,
  `is_publish` tinyint(1) NOT NULL,
  `_id_util` int(11) NOT NULL,
  `_id_lang` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `title`, `description`, `vote`, `release_date`, `is_publish`, `_id_util`, `_id_lang`) VALUES
(2, 'Mon premier HTML', 'Je suis twig', '0', '2017-12-07', 0, 3, 1),
(3, 'Mon premier css', 'Introduction à SASS', '0', '2017-12-07', 0, 3, 2),
(4, 'Mon premier JS', 'Les évènements', '0', '2017-12-07', 0, 3, 3),
(5, 'Mon premier PHP', 'LA POO, C\'EST D\'ENFER', '0', '2017-12-07', 0, 3, 4),
(6, 'Mon premier SQL', 'Une requête', '0', '2017-12-07', 0, 3, 5),
(7, 'Structure page', 'Une structure', '0', '2017-12-07', 0, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `article_has_tag`
--

DROP TABLE IF EXISTS `article_has_tag`;
CREATE TABLE `article_has_tag` (
  `_id_article` int(11) NOT NULL,
  `_id_tag` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
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

DROP TABLE IF EXISTS `content_article`;
CREATE TABLE `content_article` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `_id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `content_article`
--

INSERT INTO `content_article` (`id`, `content`, `_id_article`) VALUES
(1, '{% extends &quot;layout.html.twig&quot; %}\r\n\r\n{% block content %}\r\n\r\n    &lt;main class=&quot;container article&quot;&gt;\r\n\r\n        &lt;div class=&quot;userContent&quot;&gt;\r\n            &lt;p&gt;Bienvenue {{ user.pseudo }} ({{ user.firstname }} {{ user.lastname }})&lt;/p&gt;\r\n            &lt;p&gt;Date d\'inscription : {{ user.registration|date(\'d/m/Y\') }}&lt;/p&gt;\r\n            &lt;p&gt;Mail : {{ user.email }}&lt;/p&gt;\r\n            &lt;p&gt;Pays : {{ user.country }}&lt;/p&gt;\r\n            &lt;p&gt;Ville : {{ user.city }}&lt;/p&gt;\r\n        &lt;/div&gt;\r\n\r\n    &lt;/main&gt;\r\n\r\n{% endblock %}\r\n', 2),
(2, '\r\n/* import du fichier contenant toutes les variables */\r\n@import \'variable\';\r\n\r\n/** GENERAL CHANGE **/\r\n\r\nbody {\r\n    color: $color_font;\r\n    button {\r\n        @include button();\r\n    }\r\n    font-size: 16px;\r\n}\r\n\r\nh1 {\r\n    color: $primarycolor;\r\n    font-size: 2em;\r\n    margin: 2vw 0\r\n}\r\nh2 {\r\n    color: $primarycolor;\r\n    font-size: 1.8em;\r\n}\r\nh3 {\r\n    color: $primarycolor;\r\n    font-size: 1.6em;\r\n}\r\na {\r\n    @include link($primarycolor2, $lightcolor2);\r\n    font-size: 1em;\r\n}\r\n\r\np {\r\n    font-size: 1em;\r\n}\r\n\r\n#loader {\r\n    @include centrer(absolute);\r\n}\r\n\r\nmain {\r\n    padding: 25vw 0 35vw 0;\r\n    box-sizing: border-box;\r\n}\r\n\r\n.fa-star, .fa-star-o {\r\n    color: $primarycolor;\r\n}\r\n\r\ninput, textarea, select {\r\n    font-size: .9em;\r\n    margin: 1vw 0;\r\n    border: none;\r\n}\r\ninput {\r\n    width: 100%;\r\n    padding: 1vw;\r\n}\r\n\r\n.linkBtn {\r\n    @include button();\r\n    @include link(#fff, #fff);\r\n    margin: .5vw;\r\n    padding: .5vw;\r\n    &amp;:hover {\r\n        text-decoration: none;\r\n    }\r\n}\r\n\r\n\r\n/* TEST */\r\n\r\n/***********/\r\n/* CONTENT */\r\n/***********/\r\n\r\n.page {\r\n    background: $lightgrey;\r\n    min-height: 100vh;\r\n    position:relative;\r\n\r\n    @import \'header\';\r\n\r\n    /* import des fichiers pour le contenu */\r\n    @import \'index\';\r\n    @import \'user\';\r\n    @import \'index_lang\';\r\n    @import \'insert_code\';\r\n    @import \'faq\';\r\n    @import \'recherche\';\r\n\r\n    @import \'footer\';\r\n\r\n}\r\n\r\n/** SMALL CHANGE **/\r\n\r\n.link {\r\n    @include link($primarycolor2, $lightcolor2);\r\n    text-decoration: underline;\r\n}\r\n\r\n@import \'responsive\';', 3),
(3, '$(\'#loader\').hide();\r\n    $(\'#moreOptions\').on(\'click\',function(){$(\'#options\').fadeToggle();});\r\n    $(\'#search\').on(\'keyup\', recherche);  //ecouteur evenement sur le click lance la fonction validform\r\n    $(\'#search2\').on(\'keyup\', recherche2);\r\n    $(\'#optVote\').on(\'change\', recherche);\r\n    $(\'#optDate\').on(\'change\', recherche);\r\n    $(\'#copyCode\').on(\'click\', copyToClipboard);\r\n\r\n    $(\'#btnSearch\').on(\'click\',function(){$(\'.recherche\').show();});\r\n    $(\'.close\').on(\'click\',function(){$(\'.recherche\').hide();});\r\n    $(\'#ajout_content\').on(\'click\', ajout_content);', 4),
(4, 'public function getContact($app, $sessionid){\r\n		$sql = \'SELECT * FROM user WHERE id_util = :sessionid\';\r\n		$query = $app[\'db\']-&gt;prepare($sql);\r\n		$query -&gt; bindValue(\':sessionid\', $sessionid[\'id_util\'], PDO::PARAM_INT);\r\n	    $query -&gt; execute();\r\n\r\n	    return $query -&gt; fetch();\r\n}', 5),
(5, 'Voici une requ&ecirc;te tr&egrave;s longue', 6),
(6, '$sql = &quot;SELECT DISTINCT language.language_name, (SELECT count(id_article) FROM article WHERE article._id_lang = language.id_lang) as nb, (SELECT article.title FROM article WHERE article._id_lang = language.id_lang ORDER BY id_article DESC LIMIT 1) as lastArticle, (SELECT article.id_article FROM article WHERE article._id_lang = language.id_lang ORDER BY id_article DESC LIMIT 1) as lastIdArticle FROM `language` INNER JOIN article WHERE article._id_lang = language.id_lang&quot;;\r\n', 6),
(7, 'J\'ai la flemme de vous l\'expliquer &agrave; l\'&eacute;crit, on va attendre la soutenance...', 6),
(8, '&lt;html&gt;', 7),
(9, '&lt;body&gt;', 7),
(10, '&lt;head&gt;', 7),
(11, '&lt;/head&gt;', 7),
(12, '&lt;/body&gt;', 7),
(13, '&lt;/html&gt;', 7);

-- --------------------------------------------------------

--
-- Structure de la table `language`
--

DROP TABLE IF EXISTS `language`;
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
(3, 'javascript', NULL),
(4, 'php', NULL),
(5, 'mysql', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
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

DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id_tag` int(10) UNSIGNED NOT NULL,
  `tag_name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `token`
--

DROP TABLE IF EXISTS `token`;
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

DROP TABLE IF EXISTS `user`;
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
(2, 'Flogny', 'Damien', 'Macadams', 'etudiant', 'damien.flogny@gmail.com', '2017-03-24', 'Paris', 'France', 1, '$2y$10$7GvmiATxeFpdcW40.veRgecwzpSgX9GBkrT6VkVnbuUNPHgbyr.v.', 0, 0),
(3, 'blabla', 'blabla', 'bloblo89', 'noob', 'macminus@webforce3.fr', '2017-07-20', 'blabla', 'blabla', 10, '$2y$10$fOWHaHmjUMnzpiMMqYiVROMFw66Hz7uBf.gee4RGwv9ve2urelUda', 0, 0),
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
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_com` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `content_article`
--
ALTER TABLE `content_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
