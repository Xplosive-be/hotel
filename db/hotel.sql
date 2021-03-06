-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 13 juin 2022 à 19:47
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hotel`
--
CREATE DATABASE IF NOT EXISTS `hotel` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hotel`;

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_name` varchar(30) NOT NULL,
  `acc_surname` varchar(30) NOT NULL,
  `acc_address` varchar(30) NOT NULL,
  `acc_city` varchar(20) NOT NULL,
  `acc_id_country` int(11) NOT NULL,
  `acc_email` varchar(30) NOT NULL,
  `acc_password` varchar(128) NOT NULL,
  `acc_code_activation` varchar(32) NOT NULL,
  `acc_admin` tinyint(1) NOT NULL,
  `acc_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`acc_id`),
  KEY `FK_Pays` (`acc_id_country`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `bedroom`
--

DROP TABLE IF EXISTS `bedroom`;
CREATE TABLE IF NOT EXISTS `bedroom` (
  `bedroom_id` int(11) NOT NULL AUTO_INCREMENT,
  `bedroom_name` varchar(30) NOT NULL,
  `bedroom_description` text NOT NULL,
  `bedroom_bed` enum('double','twin','single') NOT NULL,
  `bedroom_priceday` int(11) NOT NULL,
  `id_roomcategory` int(11) NOT NULL,
  PRIMARY KEY (`bedroom_id`),
  KEY `FK_category_beedroom` (`id_roomcategory`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bedroom`
--

INSERT INTO `bedroom` (`bedroom_id`, `bedroom_name`, `bedroom_description`, `bedroom_bed`, `bedroom_priceday`, `id_roomcategory`) VALUES
(1, 'Chambre Standard', '                            Cette chambre dispose d’une télévision à écran plat de 107 cm et d’une salle de bains en marbre avec douche et baignoire séparée. </br> Café et thé équipements. </br> Superficie 20 m² </br> Dans votre salle de bains privative : </br> <ul> <li>Articles de toilette gratuits </li> <li>Peignoir</li> <li>Toilettes</li> <li>Baignoire ou douche</li> <li>Serviettes</li> <li>Chaussons</li> <li>Sèche-cheveux</li> <li>Papier toilette</li> <strong>Vue :</strong> <li>Vue sur la ville</li> <li>Vue sur une cour intérieure</li> </ul>                                                                                                                                                                                                                                                                                                                     ', 'double', 120, 3),
(2, 'Chambre Supérieure', 'Ces chambres spacieuses comprennent un coin salon, une connexion Wi-Fi haut débit gratuite et un téléphone haut-parleur.</br>\n\nLes luxueuses salles de bains en marbre disposent d’une baignoire et d’une douche séparées et d’articles de toilette. Machine à expresso et théière.</br>\nSuperficie 30 m² </br>\nDans votre salle de bains privative :</br>\n\n<ul> \n    <li>Articles de toilette gratuits </li> \n    <li>Peignoir</li> <li>Toilettes</li> \n    <li>Baignoire ou douche</li> <li>Serviettes</li> \n    <li>Chaussons</li> \n    <li>Sèche-cheveux</li> \n    <li>Papier toilette</li>\n    <strong>Vue :</strong> \n    <li>Vue sur la ville</li> \n    <li>Vue sur une cour intérieure</li> \n </ul>', 'twin', 240, 2),
(3, 'Suite Deluxe', 'Les Suites Delux sont conçues sur deux niveaux : La chambre, avec un lit à baldaquin en bois frappant accompagné d’une chaise longue de détente, et salle de bains sont situés à l’étage supérieur.</br> Superficie 90 m² </br> Machine à expresso et thé. Le salon avec salle d’eau séparée au niveau inférieur, et chacun a sa propre entrée privée.</br>  <ul>      <li>Articles de toilette gratuits </li>      <li>Peignoir</li> <li>Toilettes</li>      <li>Baignoire ou douche</li> <li>Serviettes</li>      <li>Chaussons</li>      <li>Sèche-cheveux</li>      <li>Papier toilette</li>     <strong>Vue :</strong>      <li>Vue sur la ville</li>      <li>Vue sur une cour intérieure</li>   </ul>', 'double', 1000, 3),
(4, 'Suite Présidentielle', 'Les 130-140m² de la suite présidentielle offrent des espaces de vie et de réunion séparés pouvant accueillir jusqu’à huit personnes ainsi qu’une petite cuisine.</br> D’une occupation de 3 personnes, une chambre supplémentaire est offerte gratuitement. Machine à expresso et thé.</br> Mais surtout d\'un Jaccuzi & hammam </br> Superficie 140 m² </br> <ul>      <li>Articles de toilette gratuits </li>      <li>Peignoir</li> <li>Toilettes</li>      <li>Baignoire ou douche</li> <li>Serviettes</li>      <li>Chaussons</li>      <li>Sèche-cheveux</li>      <li>Papier toilette</li>     <strong>Vue :</strong>      <li>Vue sur la ville</li>      <li>Vue sur une cour intérieure</li>   </ul>', 'twin', 3000, 4);

-- --------------------------------------------------------

--
-- Structure de la table `category_bedroom`
--

DROP TABLE IF EXISTS `category_bedroom`;
CREATE TABLE IF NOT EXISTS `category_bedroom` (
  `roomcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `roomcategory_name` varchar(30) NOT NULL,
  PRIMARY KEY (`roomcategory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category_bedroom`
--

INSERT INTO `category_bedroom` (`roomcategory_id`, `roomcategory_name`) VALUES
(1, 'Chambre Standard'),
(2, 'Chambre Supérieure'),
(3, 'Suite Deluxe'),
(4, 'Suite Présidentielle');

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `country_fr` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `country_en` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `country`
--

INSERT INTO `country` (`country_id`, `country_code`, `country_fr`, `country_en`) VALUES
(1, 'AF', 'Afghanistan', 'Afghanistan'),
(2, 'ZA', 'Afrique du Sud', 'South Africa'),
(3, 'AL', 'Albanie', 'Albania'),
(4, 'DZ', 'Algérie', 'Algeria'),
(5, 'DE', 'Allemagne', 'Germany'),
(6, 'AD', 'Andorre', 'Andorra'),
(7, 'AO', 'Angola', 'Angola'),
(8, 'AI', 'Anguilla', 'Anguilla'),
(9, 'AQ', 'Antarctique', 'Antarctica'),
(10, 'AG', 'Antigua-et-Barbuda', 'Antigua & Barbuda'),
(11, 'AN', 'Antilles néerlandaises', 'Netherlands Antilles'),
(12, 'SA', 'Arabie saoudite', 'Saudi Arabia'),
(13, 'AR', 'Argentine', 'Argentina'),
(14, 'AM', 'Arménie', 'Armenia'),
(15, 'AW', 'Aruba', 'Aruba'),
(16, 'AU', 'Australie', 'Australia'),
(17, 'AT', 'Autriche', 'Austria'),
(18, 'AZ', 'Azerbaïdjan', 'Azerbaijan'),
(19, 'BJ', 'Bénin', 'Benin'),
(21, 'BH', 'Bahreïn', 'Bahrain'),
(22, 'BD', 'Bangladesh', 'Bangladesh'),
(23, 'BB', 'Barbade', 'Barbados'),
(24, 'PW', 'Belau', 'Palau'),
(25, 'BE', 'Belgique', 'Belgium'),
(26, 'BZ', 'Belize', 'Belize'),
(27, 'BM', 'Bermudes', 'Bermuda'),
(28, 'BT', 'Bhoutan', 'Bhutan'),
(29, 'BY', 'Biélorussie', 'Belarus'),
(30, 'MM', 'Birmanie', 'Myanmar (ex-Burma)'),
(31, 'BO', 'Bolivie', 'Bolivia'),
(32, 'BA', 'Bosnie-Herzégovine', 'Bosnia and Herzegovina'),
(33, 'BW', 'Botswana', 'Botswana'),
(34, 'BR', 'Brésil', 'Brazil'),
(35, 'BN', 'Brunei', 'Brunei Darussalam'),
(36, 'BG', 'Bulgarie', 'Bulgaria'),
(37, 'BF', 'Burkina Faso', 'Burkina Faso'),
(38, 'BI', 'Burundi', 'Burundi'),
(39, 'CI', 'Côte d\'Ivoire', 'Ivory Coast (see Cote d\'Ivoire)'),
(40, 'KH', 'Cambodge', 'Cambodia'),
(41, 'CM', 'Cameroun', 'Cameroon'),
(42, 'CA', 'Canada', 'Canada'),
(43, 'CV', 'Cap-Vert', 'Cape Verde'),
(44, 'CL', 'Chili', 'Chile'),
(45, 'CN', 'Chine', 'China'),
(46, 'CY', 'Chypre', 'Cyprus'),
(47, 'CO', 'Colombie', 'Colombia'),
(48, 'KM', 'Comores', 'Comoros'),
(49, 'CG', 'Congo', 'Congo'),
(50, 'KP', 'Corée du Nord', 'Korea, Demo. People\'s Rep. of'),
(51, 'KR', 'Corée du Sud', 'Korea, (South) Republic of'),
(52, 'CR', 'Costa Rica', 'Costa Rica'),
(53, 'HR', 'Croatie', 'Croatia'),
(54, 'CU', 'Cuba', 'Cuba'),
(55, 'DK', 'Danemark', 'Denmark'),
(56, 'DJ', 'Djibouti', 'Djibouti'),
(57, 'DM', 'Dominique', 'Dominica'),
(58, 'EG', 'Égypte', 'Egypt'),
(59, 'AE', 'Émirats arabes unis', 'United Arab Emirates'),
(60, 'EC', 'Équateur', 'Ecuador'),
(61, 'ER', 'Érythrée', 'Eritrea'),
(62, 'ES', 'Espagne', 'Spain'),
(63, 'EE', 'Estonie', 'Estonia'),
(64, 'US', 'États-Unis', 'United States'),
(65, 'ET', 'Éthiopie', 'Ethiopia'),
(66, 'FI', 'Finlande', 'Finland'),
(67, 'FR', 'France', 'France'),
(68, 'GE', 'Géorgie', 'Georgia'),
(69, 'GA', 'Gabon', 'Gabon'),
(70, 'GM', 'Gambie', 'Gambia, the'),
(71, 'GH', 'Ghana', 'Ghana'),
(72, 'GI', 'Gibraltar', 'Gibraltar'),
(73, 'GR', 'Grèce', 'Greece'),
(74, 'GD', 'Grenade', 'Grenada'),
(75, 'GL', 'Groenland', 'Greenland'),
(76, 'GP', 'Guadeloupe', 'Guinea, Equatorial'),
(77, 'GU', 'Guam', 'Guam'),
(78, 'GT', 'Guatemala', 'Guatemala'),
(79, 'GN', 'Guinée', 'Guinea'),
(80, 'GQ', 'Guinée équatoriale', 'Equatorial Guinea'),
(81, 'GW', 'Guinée-Bissao', 'Guinea-Bissau'),
(82, 'GY', 'Guyana', 'Guyana'),
(83, 'GF', 'Guyane française', 'Guiana, French'),
(84, 'HT', 'Haïti', 'Haiti'),
(85, 'HN', 'Honduras', 'Honduras'),
(86, 'HK', 'Hong Kong', 'Hong Kong, (China)'),
(87, 'HU', 'Hongrie', 'Hungary'),
(88, 'BV', 'Ile Bouvet', 'Bouvet Island'),
(89, 'CX', 'Ile Christmas', 'Christmas Island'),
(90, 'NF', 'Ile Norfolk', 'Norfolk Island'),
(91, 'KY', 'Iles Cayman', 'Cayman Islands'),
(92, 'CK', 'Iles Cook', 'Cook Islands'),
(93, 'FO', 'Iles Féroé', 'Faroe Islands'),
(94, 'FK', 'Iles Falkland', 'Falkland Islands (Malvinas)'),
(95, 'FJ', 'Iles Fidji', 'Fiji'),
(96, 'GS', 'Iles Géorgie du Sud et Sandwich du Sud', 'S. Georgia and S. Sandwich Is.'),
(97, 'HM', 'Iles Heard et McDonald', 'Heard and McDonald Islands'),
(98, 'MH', 'Iles Marshall', 'Marshall Islands'),
(99, 'PN', 'Iles Pitcairn', 'Pitcairn Island'),
(100, 'SB', 'Iles Salomon', 'Solomon Islands'),
(101, 'SJ', 'Iles Svalbard et Jan Mayen', 'Svalbard and Jan Mayen Islands'),
(102, 'TC', 'Iles Turks-et-Caicos', 'Turks and Caicos Islands'),
(103, 'VI', 'Iles Vierges américaines', 'Virgin Islands, U.S.'),
(104, 'VG', 'Iles Vierges britanniques', 'Virgin Islands, British'),
(105, 'CC', 'Iles des Cocos (Keeling)', 'Cocos (Keeling) Islands'),
(106, 'UM', 'Iles mineures éloignées des États-Unis', 'US Minor Outlying Islands'),
(107, 'IN', 'Inde', 'India'),
(108, 'ID', 'Indonésie', 'Indonesia'),
(109, 'IR', 'Iran', 'Iran, Islamic Republic of'),
(110, 'IQ', 'Iraq', 'Iraq'),
(111, 'IE', 'Irlande', 'Ireland'),
(112, 'IS', 'Islande', 'Iceland'),
(113, 'IL', 'Israël', 'Israel'),
(114, 'IT', 'Italie', 'Italy'),
(115, 'JM', 'Jamaïque', 'Jamaica'),
(116, 'JP', 'Japon', 'Japan'),
(117, 'JO', 'Jordanie', 'Jordan'),
(118, 'KZ', 'Kazakhstan', 'Kazakhstan'),
(119, 'KE', 'Kenya', 'Kenya'),
(120, 'KG', 'Kirghizistan', 'Kyrgyzstan'),
(121, 'KI', 'Kiribati', 'Kiribati'),
(122, 'KW', 'Koweït', 'Kuwait'),
(123, 'LA', 'Laos', 'Lao People\'s Democratic Republic'),
(124, 'LS', 'Lesotho', 'Lesotho'),
(125, 'LV', 'Lettonie', 'Latvia'),
(126, 'LB', 'Liban', 'Lebanon'),
(127, 'LR', 'Liberia', 'Liberia'),
(128, 'LY', 'Libye', 'Libyan Arab Jamahiriya'),
(129, 'LI', 'Liechtenstein', 'Liechtenstein'),
(130, 'LT', 'Lituanie', 'Lithuania'),
(131, 'LU', 'Luxembourg', 'Luxembourg'),
(132, 'MO', 'Macao', 'Macao, (China)'),
(133, 'MG', 'Madagascar', 'Madagascar'),
(134, 'MY', 'Malaisie', 'Malaysia'),
(135, 'MW', 'Malawi', 'Malawi'),
(136, 'MV', 'Maldives', 'Maldives'),
(137, 'ML', 'Mali', 'Mali'),
(138, 'MT', 'Malte', 'Malta'),
(139, 'MP', 'Mariannes du Nord', 'Northern Mariana Islands'),
(140, 'MA', 'Maroc', 'Morocco'),
(141, 'MQ', 'Martinique', 'Martinique'),
(142, 'MU', 'Maurice', 'Mauritius'),
(143, 'MR', 'Mauritanie', 'Mauritania'),
(144, 'YT', 'Mayotte', 'Mayotte'),
(145, 'MX', 'Mexique', 'Mexico'),
(146, 'FM', 'Micronésie', 'Micronesia, Federated States of'),
(147, 'MD', 'Moldavie', 'Moldova, Republic of'),
(148, 'MC', 'Monaco', 'Monaco'),
(149, 'MN', 'Mongolie', 'Mongolia'),
(150, 'MS', 'Montserrat', 'Montserrat'),
(151, 'MZ', 'Mozambique', 'Mozambique'),
(152, 'NP', 'Népal', 'Nepal'),
(153, 'NA', 'Namibie', 'Namibia'),
(154, 'NR', 'Nauru', 'Nauru'),
(155, 'NI', 'Nicaragua', 'Nicaragua'),
(156, 'NE', 'Niger', 'Niger'),
(157, 'NG', 'Nigeria', 'Nigeria'),
(158, 'NU', 'Nioué', 'Niue'),
(159, 'NO', 'Norvège', 'Norway'),
(160, 'NC', 'Nouvelle-Calédonie', 'New Caledonia'),
(161, 'NZ', 'Nouvelle-Zélande', 'New Zealand'),
(162, 'OM', 'Oman', 'Oman'),
(163, 'UG', 'Ouganda', 'Uganda'),
(164, 'UZ', 'Ouzbékistan', 'Uzbekistan'),
(165, 'PE', 'Pérou', 'Peru'),
(166, 'PK', 'Pakistan', 'Pakistan'),
(167, 'PA', 'Panama', 'Panama'),
(168, 'PG', 'Papouasie-Nouvelle-Guinée', 'Papua New Guinea'),
(169, 'PY', 'Paraguay', 'Paraguay'),
(170, 'NL', 'Pays-Bas', 'Netherlands'),
(171, 'PH', 'Philippines', 'Philippines'),
(172, 'PL', 'Pologne', 'Poland'),
(173, 'PF', 'Polynésie française', 'French Polynesia'),
(174, 'PR', 'Porto Rico', 'Puerto Rico'),
(175, 'PT', 'Portugal', 'Portugal'),
(176, 'QA', 'Qatar', 'Qatar'),
(177, 'CF', 'République centrafricaine', 'Central African Republic'),
(178, 'CD', 'République démocratique du Congo', 'Congo, Democratic Rep. of the'),
(179, 'DO', 'République dominicaine', 'Dominican Republic'),
(180, 'CZ', 'République tchèque', 'Czech Republic'),
(181, 'RE', 'Réunion', 'Reunion'),
(182, 'RO', 'Roumanie', 'Romania'),
(183, 'GB', 'Royaume-Uni', 'Saint Pierre and Miquelon'),
(184, 'RU', 'Russie', 'Russia (Russian Federation)'),
(185, 'RW', 'Rwanda', 'Rwanda'),
(186, 'SN', 'Sénégal', 'Senegal'),
(187, 'EH', 'Sahara occidental', 'Western Sahara'),
(188, 'KN', 'Saint-Christophe-et-Niévès', 'Saint Kitts and Nevis'),
(189, 'SM', 'Saint-Marin', 'San Marino'),
(190, 'PM', 'Saint-Pierre-et-Miquelon', 'Saint Pierre and Miquelon'),
(191, 'VA', 'Saint-Siège ', 'Vatican City State (Holy See)'),
(192, 'VC', 'Saint-Vincent-et-les-Grenadines', 'Saint Vincent and the Grenadines'),
(193, 'SH', 'Sainte-Hélène', 'Saint Helena'),
(194, 'LC', 'Sainte-Lucie', 'Saint Lucia'),
(195, 'SV', 'Salvador', 'El Salvador'),
(196, 'WS', 'Samoa', 'Samoa'),
(197, 'AS', 'Samoa américaines', 'American Samoa'),
(198, 'ST', 'Sao Tomé-et-Principe', 'Sao Tome and Principe'),
(199, 'SC', 'Seychelles', 'Seychelles'),
(200, 'SL', 'Sierra Leone', 'Sierra Leone'),
(201, 'SG', 'Singapour', 'Singapore'),
(202, 'SI', 'Slovénie', 'Slovenia'),
(203, 'SK', 'Slovaquie', 'Slovakia'),
(204, 'SO', 'Somalie', 'Somalia'),
(205, 'SD', 'Soudan', 'Sudan'),
(206, 'LK', 'Sri Lanka', 'Sri Lanka (ex-Ceilan)'),
(207, 'SE', 'Suède', 'Sweden'),
(208, 'CH', 'Suisse', 'Switzerland'),
(209, 'SR', 'Suriname', 'Suriname'),
(210, 'SZ', 'Swaziland', 'Swaziland'),
(211, 'SY', 'Syrie', 'Syrian Arab Republic'),
(212, 'TW', 'Taïwan', 'Taiwan'),
(213, 'TJ', 'Tadjikistan', 'Tajikistan'),
(214, 'TZ', 'Tanzanie', 'Tanzania, United Republic of'),
(215, 'TD', 'Tchad', 'Chad'),
(216, 'TF', 'Terres australes françaises', 'French Southern Territories - TF'),
(217, 'IO', 'Territoire britannique de l\'Océan Indien', 'British Indian Ocean Territory'),
(218, 'TH', 'Thaïlande', 'Thailand'),
(219, 'TL', 'Timor Oriental', 'Timor-Leste (East Timor)'),
(220, 'TG', 'Togo', 'Togo'),
(221, 'TK', 'Tokélaou', 'Tokelau'),
(222, 'TO', 'Tonga', 'Tonga'),
(223, 'TT', 'Trinité-et-Tobago', 'Trinidad & Tobago'),
(224, 'TN', 'Tunisie', 'Tunisia'),
(225, 'TM', 'Turkménistan', 'Turkmenistan'),
(226, 'TR', 'Turquie', 'Turkey'),
(227, 'TV', 'Tuvalu', 'Tuvalu'),
(228, 'UA', 'Ukraine', 'Ukraine'),
(229, 'UY', 'Uruguay', 'Uruguay'),
(230, 'VU', 'Vanuatu', 'Vanuatu'),
(231, 'VE', 'Venezuela', 'Venezuela'),
(232, 'VN', 'Vietnam', 'Viet Nam'),
(233, 'WF', 'Wallis-et-Futuna', 'Wallis and Futuna'),
(234, 'YE', 'Yémen', 'Yemen'),
(235, 'YU', 'Yougoslavie', 'Saint Pierre and Miquelon'),
(236, 'ZM', 'Zambie', 'Zambia'),
(237, 'ZW', 'Zimbabwe', 'Zimbabwe'),
(238, 'MK', 'ex-République yougoslave de Macédoine', 'Macedonia, TFYR');

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id_picture` int(11) NOT NULL,
  `id_bedroom` int(11) NOT NULL,
  KEY `FK_Picture_bedroom` (`id_bedroom`),
  KEY `FK_Picture_id` (`id_picture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallery`
--

INSERT INTO `gallery` (`id_picture`, `id_bedroom`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(19, 4);

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `picture_name` varchar(50) NOT NULL,
  `picture_url` varchar(100) NOT NULL,
  `picture_description` text NOT NULL,
  PRIMARY KEY (`picture_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`picture_id`, `picture_name`, `picture_url`, `picture_description`) VALUES
(1, 'Chambre Standard 1 ', 'ressources/images/chambres/standard/standard_1.jpg', 'Photo Chambre Standard'),
(2, 'Chambre Standard 2', 'ressources/images/chambres/standard/standard_2.jpg', 'Photo Chambre Standard'),
(3, 'Chambre Standard 3', 'ressources/images/chambres/standard/standard_3.jpg', 'Photo Chambre Standard'),
(4, 'Chambre Standard 4', 'ressources/images/chambres/standard/standard_4.jpg', 'Photo Chambre Standard'),
(5, 'Chambre Supérieure 1', 'ressources/images/chambres/superieure/superieure_1.jpg', 'Photo de la chambre Supérieure'),
(6, 'Chambre Supérieure 2', 'ressources/images/chambres/superieure/superieure_2.jpg', 'Photo de la chambre Supérieure'),
(7, 'Chambre Supérieure 3', 'ressources/images/chambres/superieure/superieure_3.jpg', 'Photo de la chambre Supérieure'),
(8, 'Chambre Supérieure 4', 'ressources/images/chambres/superieure/superieure_4.jpg', 'Photo de la chambre Supérieure'),
(9, 'Chambre Supérieure 5', 'ressources/images/chambres/superieure/superieure_5.jpg', 'Photo de la chambre Supérieure'),
(10, 'Suite Deluxe 1 ', 'ressources/images/chambres/deluxe/deluxe_1.jpg', 'Photo de la Suite Deluxe.'),
(11, 'Suite Deluxe 2', 'ressources/images/chambres/deluxe/deluxe_2.jpg', 'Photo de la Suite Deluxe.'),
(12, 'Suite Deluxe 3', 'ressources/images/chambres/deluxe/deluxe_3.jpg', 'Photo de la Suite Deluxe.'),
(13, 'Suite Deluxe 4', 'ressources/images/chambres/deluxe/deluxe_4.jpg', 'Photo de la Suite Deluxe.'),
(14, 'Suite Deluxe 5', 'ressources/images/chambres/deluxe/deluxe_5.jpg', 'Photo de la Suite Deluxe.'),
(15, 'Suite Présidentielle 1', 'ressources/images/chambres/presidentielle/presidentielle_1.jpg', 'Photo de la suite présidentielle'),
(16, 'Suite Présidentielle 2', 'ressources/images/chambres/presidentielle/presidentielle_2.jpg', 'Photo de la suite présidentielle'),
(17, 'Suite Présidentielle 3', 'ressources/images/chambres/presidentielle/presidentielle_3.jpg', 'Photo de la suite présidentielle'),
(18, 'Suite Présidentielle 4', 'ressources/images/chambres/presidentielle/presidentielle_4.jpg', 'Photo de la suite présidentielle'),
(19, 'Suite Présidentielle 5', 'ressources/images/chambres/presidentielle/presidentielle_5.jpg', 'Photo de la suite présidentielle');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bedroom` int(11) NOT NULL,
  `id_acc` int(11) NOT NULL,
  `reservation_date_start` date NOT NULL,
  `reversation_date_end` date NOT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `FK_account_reservation` (`id_acc`),
  KEY `FK_bedroom_reservation` (`id_bedroom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `FK_Pays` FOREIGN KEY (`acc_id_country`) REFERENCES `country` (`country_id`);

--
-- Contraintes pour la table `bedroom`
--
ALTER TABLE `bedroom`
  ADD CONSTRAINT `FK_category_beedroom` FOREIGN KEY (`id_roomcategory`) REFERENCES `category_bedroom` (`roomcategory_id`);

--
-- Contraintes pour la table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `FK_Picture_bedroom` FOREIGN KEY (`id_bedroom`) REFERENCES `bedroom` (`bedroom_id`),
  ADD CONSTRAINT `FK_Picture_id` FOREIGN KEY (`id_picture`) REFERENCES `picture` (`picture_id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_account_reservation` FOREIGN KEY (`id_acc`) REFERENCES `account` (`acc_id`),
  ADD CONSTRAINT `FK_bedroom_reservation` FOREIGN KEY (`id_bedroom`) REFERENCES `bedroom` (`bedroom_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
