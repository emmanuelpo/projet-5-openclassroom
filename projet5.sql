-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 04 avr. 2020 à 14:20
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet5`
--

-- --------------------------------------------------------

--
-- Structure de la table `p5_admin`
--

DROP TABLE IF EXISTS `p5_admin`;
CREATE TABLE IF NOT EXISTS `p5_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `p5_admin`
--

INSERT INTO `p5_admin` (`id`, `login`, `password`) VALUES
(1, 'AlshChenesBlancs', '$2y$10$XmCVvjNiMhy6kMplbtmLhOz0FqW7I9XukEATPyjd5l.bnWVwLdGIm');

-- --------------------------------------------------------

--
-- Structure de la table `p5_category`
--

DROP TABLE IF EXISTS `p5_category`;
CREATE TABLE IF NOT EXISTS `p5_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `p5_comments`
--

DROP TABLE IF EXISTS `p5_comments`;
CREATE TABLE IF NOT EXISTS `p5_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date_comment` datetime NOT NULL,
  `FK_post` int(11) NOT NULL,
  `report` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `p5_comments`
--

INSERT INTO `p5_comments` (`id`, `author`, `comment`, `date_comment`, `FK_post`, `report`) VALUES
(1, 'Saphira', 'Merci beaucoup pour l\'information', '2019-10-06 13:15:15', 1, 0),
(6, 'abcdef', 'aaa', '2020-03-31 19:15:36', 3, 0),
(8, 'coucou', 'salut', '2020-04-03 14:47:44', 1, 0),
(7, 'aaa', 'aaa', '2020-04-03 14:45:08', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `p5_news`
--

DROP TABLE IF EXISTS `p5_news`;
CREATE TABLE IF NOT EXISTS `p5_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_admin` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_content` datetime NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `FK_admin` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `p5_news`
--

INSERT INTO `p5_news` (`id`, `FK_admin`, `title`, `content`, `date_content`, `state`) VALUES
(1, 1, 'Bonjour je suis une première actualité', '<p>Je vous souhaite la bienvenue &agrave; tous. Je suis la premi&egrave;re actualit&eacute; du centre a&eacute;r&eacute;e Merci de m\'avoir lu.Je vous souhaite la bienvenue &agrave; tous. Je suis la premi&egrave;re actualit&eacute; du centre a&eacute;r&eacute;e Merci de m\'avoir lu.Je vous souhaite la bienvenue &agrave; tous. Je suis la premi&egrave;re actualit&eacute; du centre a&eacute;r&eacute;e Merci de m\'avoir lu.Je vous souhaite la bienvenue &agrave; tous. Je suis la premi&egrave;re actualit&eacute; du centre a&eacute;r&eacute;e Merci de m\'avoir lu</p>', '2019-10-06 13:12:25', 1),
(2, 1, 'Bonsoir, je suis la deuxième actualité du centre', '<p>qesF?OZEDNBHFIZEGFIEZBVFUZEVFUZEVB</p>\r\n<p>CIAEBFUZEVFUAVbefjhzevfuezvfuezvf</p>', '2019-10-06 13:12:25', 1),
(3, 1, 'Je suis le troisème', 'zefjoezajfojzenfoiezbf', '2019-10-06 13:12:25', 1),
(4, 1, 'Quatre', 'zref,ozehfiezbf', '2019-10-06 13:12:25', 1),
(5, 1, 'cinq', 'azdazd35165165zad', '2019-10-06 13:12:25', 1),
(6, 1, 'azdzadazd', 'zadazdazfzafzfa', '2019-10-06 13:12:25', 1),
(7, 1, 'Actualité de Test', '<div id=\"bannerR\" style=\"margin: 0px -160px 0px 0px; padding: 0px; position: sticky; top: 20px; width: 160px; height: 10px; float: right; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">\r\n<div id=\"div-gpt-ad-1474537762122-3\" style=\"margin: 0px; padding: 0px;\" data-google-query-id=\"CJPF8e-XwOgCFVLh1Qodwr0Muw\">\r\n<div id=\"google_ads_iframe_/15188745/Lipsum-Unit4_0__container__\" style=\"margin: 0px; padding: 0px; border: 0pt none;\"><iframe id=\"google_ads_iframe_/15188745/Lipsum-Unit4_0\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; vertical-align: bottom;\" title=\"3rd party ad content\" name=\"google_ads_iframe_/15188745/Lipsum-Unit4_0\" width=\"160\" height=\"600\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\" data-google-container-id=\"4\" data-load-complete=\"true\"></iframe></div>\r\n</div>\r\n</div>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rhoncus neque odio, blandit posuere mi fringilla sit amet. Nunc accumsan quis augue sed gravida. Curabitur sollicitudin, augue id egestas vestibulum, neque purus ultrices tortor, in tempor risus ipsum in lacus. Sed laoreet vestibulum lectus. <em>Pellentesque habitant morbi tristique senectus et netus et malesuada fames</em> ac turpis egestas. Nulla ut est turpis. Phasellus arcu turpis, ultrices non leo et, consequat mattis justo.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px;\">Cras velit ante, vulputate eget ullamcorper eget, lobortis non erat. Sed ac enim ac felis pulvinar congue. Quisque sit amet accumsan enim. Sed ac ante non metus euismod bibendum eget non felis. Praesent egestas vitae risus id dapibus. Nam ac est finibus, molestie lorem quis, egestas massa. <em>Pellentesque tempor</em> at ligula et pretium. Suspendisse maximus malesuada pretium. Nullam nec augue urna. Aliquam erat volutpat. Ut dolor diam, posuere ut malesuada convallis, finibus tincidunt libero. Sed sagittis vestibulum lacus eget finibus. Nulla fringilla varius tortor eget scelerisque. In ac mi at sem condimentum facilisis non eu nisl.</p>', '2020-03-29 19:17:16', 0),
(8, 1, 'Actualité de Test 3', '<p>hgybinsdgoertngojergoherghrbhebuterhbtoirejhgio buerhogjpriegprejgerpotjhrth554h654684684164164re4re64geg4er64g6464684651968r6e1gergerhgiregiurhegiuregirehgore.</p>\r\n<p>hezofhzeiufhzefhzeifhizeuhfizehfiezhfivbzeuiyezbfizfniefbnezifuzejnfhfjnezifuhzebf</p>', '2020-03-29 19:56:14', 0);

-- --------------------------------------------------------

--
-- Structure de la table `p5_schedule`
--

DROP TABLE IF EXISTS `p5_schedule`;
CREATE TABLE IF NOT EXISTS `p5_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_admin` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_content` datetime NOT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `FK_admin` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `p5_schedule`
--

INSERT INTO `p5_schedule` (`id`, `FK_admin`, `title`, `content`, `date_content`, `state`) VALUES
(1, 1, 'Bonjour je suis un', 'aabbccddeeffgg', '2019-11-19 13:29:17', 1);

-- --------------------------------------------------------

--
-- Structure de la table `p5_users`
--

DROP TABLE IF EXISTS `p5_users`;
CREATE TABLE IF NOT EXISTS `p5_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
