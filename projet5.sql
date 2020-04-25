-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 25 avr. 2020 à 15:51
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
(1, 'AlshChenesBlancs', '$2y$10$SWw33.NrwYPwhD/GDAt5juxLi3xOn6F9Bdz3oEPRVBIA.XF1vO3qS');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `p5_comments`
--

INSERT INTO `p5_comments` (`id`, `author`, `comment`, `date_comment`, `FK_post`, `report`) VALUES
(1, 'Saphira', 'Merci beaucoup pour l\'information', '2019-10-06 13:15:15', 1, 0),
(6, 'abcdef', 'aaa', '2020-03-31 19:15:36', 3, 0),
(8, 'coucou', 'salut', '2020-04-03 14:47:44', 1, 0),
(7, 'aaa', 'aaa', '2020-04-03 14:45:08', 1, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `p5_news`
--

INSERT INTO `p5_news` (`id`, `FK_admin`, `title`, `content`, `date_content`, `state`) VALUES
(1, 1, 'Inscription de vos enfants pour l’année 2019 - 2020', 'Afin d’inscrire vos enfants au centre de loisirs des Chênes Blancs, il faudra nous ramener le dossier d’inscription rempli avec tout les documents demandés en main propre. La date limite de remise des dossiers pour les mercredis et les vacances d’automne 2019 est le 10 Septembre dernier délai. En vous remerciant par avance de votre compréhension.', '2019-10-06 13:12:25', 1),
(2, 1, 'PAI et traitements médicaux', 'Lors de l\'inscription de vos enfants, si ces derniers suivent des traitements ou possèdent des allergies particulières, veuillez nous remettre au plus vite une photocopie des PAI et/ou des traitements afin que nous puissions donner les médicaments nécessaires à vos enfants. Dans le cas contraires, nous ne pouvons pas leur donner directement leur traitement et seront obligés de vous appeler afin que vous leur donniez.', '2019-10-06 13:12:25', 1),
(3, 1, 'Droits à l\'image', 'A partir du mercredi 02 Octobre, vous retrouverez au bureau de l\'accueil de loisirs le document nous permettant de prendre en photos vos enfants. Vous devrez nous le retournez au plus vite.', '2019-10-06 13:12:25', 1),
(4, 1, 'Première sortie de l\'année', 'Le mercredi 16 Octobre 2019, la première sortie du centre de loisirs est organisé.Elle se déroulera au château de Laussac. Départ à 8h00 et retour à 17h30. \r\nSi des parents veulent nous accompagner, il faudra nous contacter par mail ou par téléphone afin de nous confirmer votre présence.\r\nEn vous remerciant par avance.\r\n', '2019-10-06 13:12:25', 1),
(5, 1, 'Halloween', 'Le mercredi 30 Octobre 2019, si vous le souhaitez, les enfants peuvent venir déguiser au centre de loisirs. Veuillez notez cependant que du à la présence de tout petit, les costumes ne doivent pas faire trop peur et les accessoires sont autorisés si les enfants en possédant font attention à leur affaires ( les animateurs n\'étant pas garant des affaires venant de la maison).\r\nJoyeux Halloween à vous !', '2019-10-06 13:12:25', 1),
(6, 1, 'Mercredi de Noël', 'Le mercredi 18 Décembre, vous parents pourrez participer au Noël des enfants au centre de loisirs. Vous retrouverez des ateliers, des stands de chocolat chaud et de churros et pour terminer cette magnifique journée, nous vous proposerons une petite pièce de théâtre de Noël. Venez nombreux.\r\n', '2019-10-06 13:12:25', 1),
(7, 1, 'Fermeture du centre pendant les vacances de Noël', 'Nous tenons à rappeler aux familles que le centre de loisirs des Chênes Blancs fermera ses portes du lundi 23 Décembre 2019 au dimanche 5 Janvier 2020 inclus. De plus, la date butoir pour inscrire vos enfants les mercredi de la rentré est le vendredi 20 Décembre 2020. Joyeuses fêtes et bonne année à vous.\r\n\r\n', '2020-03-29 19:17:16', 1),
(9, 1, 'Sortie au musée d\'histoire naturelle', '<p>Lorem Elsass ipsum yeuh. barapli consectetur&nbsp; Salut bisamme non quam, elementum chambon tellus commodo hopla Oberschaeffolsheim baeckeoffe libero, m&auml;nele r&eacute;chime gewurztraminer vulputate Pfourtz ! m&eacute;t&eacute;or schpeck ornare picon bi&egrave;re libero. flammekueche aliquam Verdammi n&uuml;dle bredele turpis, Oberschaeffolsheim Christkindelsm&auml;rik gal non kuglopf nullam auctor, sit rhoncus varius habitant Chulia Roberstau lotto-owe semper Heineken Mauris Yo d&ucirc;.&nbsp;</p>', '2020-04-25 17:18:11', 0),
(8, 1, 'Inscription pour le séjour au ski', 'A partir du lundi 13 Janvier 2020, vous retrouverez au bureau du centre de loisirs les feuilles d\'inscriptions pour le séjour au ski durant les vacances d\'hiver 2020 (du 24 au 28 Février 2020). Veuillez nous remettre les feuilles remplies avec les documents nécessaires au plus tard le 1er Février 2020', '2020-03-29 19:56:14', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `p5_schedule`
--

INSERT INTO `p5_schedule` (`id`, `FK_admin`, `title`, `content`, `date_content`, `state`) VALUES
(1, 1, 'Premier jour de centre', 'Aujourd\'hui, c\'est le premier mercredi au centre des Chênes Blancs. Nous apprenons le nouveau fonctionnement du centre, les nouveaux jeux qui ont été acheté.C\'est chouette car on retrouve les copains de l\'école et on peut jouer avec eux. En plus, on apprend à utiliser un ordinateur et à taper au clavier pour écrire ce journal pour les papa et les maman. Les animateurs nous aident à l\'écrire. Tout le monde s\'y met, même certains qui sont en grande section de maternelle. Cette journée est super.', '2019-09-11 13:29:17', 1),
(2, 1, 'Mercredi 18 Septembre', 'Oufff, on est tous essoufflé. Les animateurs ont organisé une énorme olympiade. Au programme, une course avec des haies, du lancer de poids, du saut en longueur et à la fin un énorme relais à travers tout le centre. C\'est l\'équipe des rouges qui a gagné car ils avaient Marc et Fabien dans leur équipe. Ce sont les deux qui courent le plus vite dans le centre.\r\n\r\n', '2019-09-19 19:32:00', 1),
(3, 1, 'Mercredi 9 Octobre', '\"Bouh\" dit mon copain Marc essayant de me faire peur. Avec les animateurs, nous préparons halloween. On décore le centre, on prépare nos costumes et on choisit même les bonbons qu\'on aura le mercredi avant Halloween. Maman et papa me disent qu\'il ne faut pas en manger beaucoup car sinon on va devoir aller chez le dentiste et c\'est pas agréable d\'y aller.', '2019-10-10 12:17:16', 1),
(4, 1, 'Château de Laussac', 'Aujourd\'hui on est allé visiter un château fort à Laussac. Un monsieur vivant dans une petite maison à côté du château nous a fait toute la visite. On a pu se balader à l\'intérieur, sur les remparts, on est monté dans les tours et on est même descendu dans les douves. Le monsieur nous a expliqué que les douves étaient autrefois remplis d\'eau et empêchait les ennemis de rentrer dans le château lorsque le pont levis était relevé. Ensuite, on a pu voir les différentes armures que portait les chevaliers. On a même essayé leur casque. C\'était une chouette journée.\r\n', '2019-10-29 14:25:08', 1),
(5, 1, 'Jour d’ Halloween au centre', 'Bouhhhhh, des bonbons ou un sort ?! C\'est Halloween au centre aujourd\'hui. Avec tout les copains et copines, on s\'est déguisé. Des vampires, des loups garous, des fantômes, des cow-boys et même un dark Vador envahissent les salles et la cour.On a fait un grand jeu cluedo toute la journée et on a eu pleins de bonbons avant de partir avec nos parents.\r\n', '2019-11-06 18:38:38', 1),
(6, 1, 'Mercredi 20 Novembre', 'Joyeux No.... Ah non c\'est pas encore pardon. Mais on prépare déjà Noël au centre. On commence les personnages d\'une histoire qu\'on est entrain d\'écrire. L\'histoire plus les personnages iront sous le chapiteau de la ville pour que nos papas et nos mamans puissent la voir.', '2019-11-21 13:18:20', 1),
(7, 1, 'Mercredi de Noël', 'Joyeux Noël ! Aujourd\'hui, on fait pleins de jeux et d\'ateliers. On a crée de la barbe a papa, fait des churros et du chocolat chaud et préparer les stands pour les parents avec les animateurs. D\'ailleurs, avant que les parents arrivent, on a reçu pleins de bonbons et on a fait un énorme goûter, c\'était trop bon.', '2019-12-19 14:28:22', 1),
(8, 1, 'Premier mercredi d\'Hiver', 'Aujourd\'hui, nous avons enlevé toutes les décorations de Noël du centre. On a appris qu\'on partirait au ski pendant les vacances de Février. Moi je ne sais pas encore en faire mais mon copain Marc m\'a dit que c\'était pas compliqué, il faut juste y aller en chasse neige au début et ensuite c\'est facile. J\'espère que je vais pas trop tombé dans la neige quand on va y aller.', '2020-01-09 12:24:32', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
