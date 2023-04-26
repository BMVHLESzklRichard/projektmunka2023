-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql.omega:3306
-- Generation Time: Apr 12, 2023 at 11:59 AM
-- Server version: 5.7.40-log
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rnmotorsport`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permission` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `username`, `password`, `name`, `permission`, `status`, `photo`) VALUES
(22, 'norbi@gmail.com', 'Norbi', '2eb5878a0e31994055624bcaabface2f8bcf3862', 'Szép Norbert', 1, 1, '1679577918.jpeg'),
(23, 'home@gmail.com', 'Jotato', 'e83249bd3ba79932e16fb1fb5100dafade9954c2', 'Szkleván Richárd', 1, 1, '1680109756.jpeg'),
(27, 'mindegy@gmail.com', 'SebiFCB1899', 'c6efaf27673db4f7d2de52c0ab20a0655112cbad', 'Híves Sebastian', 0, 1, '1679578196.jpeg'),
(29, 'teszt@gmail.com', 'Teszt1', '9ca395ace8a7f758044bdcd8642f8fae49687448', 'Teszt Teszt', 0, 1, '1678361454.jpeg'),
(30, 'probaaaa@gmail.com', 'Probaaa', '9f47b814230f7481deb45506283214aa58e923f9', 'Proba', 0, 0, 'p.jpg'),
(36, 'kordics.b@gmail.com', 'Balazskaaaaa', 'f10e2821bbbea527ea02200352313bc059445190', 'Kordics Balázs', 0, 1, 'b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `newsid` int(255) NOT NULL,
  `accid` int(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `commentdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `newsid`, `accid`, `comment`, `commentdate`) VALUES
(58, 30, 23, 'SAINZ MEGVERI őT', '2023-03-07 00:00:00'),
(78, 52, 22, 'Jajj ne!\n', '2023-03-21 00:00:00'),
(79, 52, 23, 'ez nem lesz jó', '2023-03-21 00:00:00'),
(81, 52, 22, 'Jó verseny volt izgalmas.', '2023-03-24 00:00:00'),
(82, 52, 22, 'haha', '2023-03-24 00:00:00'),
(106, 39, 23, 'majd jövőre!', '2023-03-27 09:54:38'),
(190, 71, 22, 'HEllo', '2023-03-30 13:39:05'),
(191, 76, 23, 'Teljesen egyetértek az előbb olvasottakkal.', '2023-04-01 15:08:01'),
(197, 80, 23, 'Sziasztok', '2023-04-05 12:35:53'),
(198, 80, 36, 'Helloka', '2023-04-05 12:36:52'),
(199, 80, 36, 'Van kérdés?', '2023-04-05 12:37:12'),
(200, 80, 36, 'Jotato', '2023-04-05 12:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `driverPoints` int(255) NOT NULL,
  `driverPhoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `lastName`, `firstName`, `driverPoints`, `driverPhoto`) VALUES
(1, 'Hamilton', 'Lewis', 38, 'lajos.jpg'),
(2, 'Russell', 'George', 18, 'russell.jpg'),
(3, 'Norris', 'Lando', 8, 'norris.jpg'),
(4, 'Piastri', 'Oscar', 4, 'piastri.jpg'),
(5, 'Verstappen', 'Max', 69, 'max.jpg'),
(6, 'Perez', 'Sergio', 54, 'perez.jpg'),
(7, 'Alonso', 'Fernando', 45, 'alonso.jpg'),
(8, 'Stroll', 'Lance', 20, 'stroll.jpg'),
(9, 'Sainz', 'Carlos', 20, 'sainz.jpg'),
(10, 'Leclerc', 'Charles', 6, 'leclerc.jpg'),
(11, 'Ocon', 'Esteban', 4, 'ocon.jpg'),
(12, 'Gasly', 'Pierre', 2, 'gasly.jpg'),
(13, 'Bottas', 'Valtteri', 4, 'bottas.jpg'),
(14, 'Guanyu', 'Zhou', 2, 'zhou.jpg'),
(15, 'Magnussen', 'Kevin', 1, 'kmag.jpg'),
(16, 'Hulkenberg', 'Nico', 6, 'hulk.jpg'),
(17, 'Tsunoda', 'Yuki', 1, 'yuki.jpg'),
(18, 'De Vries', 'Nyck', 0, 'vries.jpg'),
(19, 'Albon', 'Alexander', 1, 'albon.jpg'),
(20, 'Sargeant', 'Logan', 0, 'logan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fullteams`
--

CREATE TABLE `fullteams` (
  `id` int(255) NOT NULL,
  `teamId` int(255) NOT NULL,
  `driverId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fullteams`
--

INSERT INTO `fullteams` (`id`, `teamId`, `driverId`) VALUES
(1, 1, 1),
(2, 1, 2),
(9, 2, 9),
(10, 2, 10),
(5, 3, 5),
(6, 3, 6),
(3, 4, 3),
(4, 4, 4),
(11, 5, 11),
(12, 5, 12),
(17, 6, 17),
(18, 6, 18),
(7, 7, 7),
(8, 7, 8),
(13, 8, 13),
(14, 8, 14),
(15, 9, 15),
(16, 9, 16),
(19, 10, 19),
(20, 10, 20);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(255) NOT NULL,
  `writerId` int(255) NOT NULL,
  `alias` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `shownPicture` varchar(255) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `creationDate` datetime NOT NULL,
  `modDate` datetime NOT NULL,
  `mainNews` tinyint(1) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `writerId`, `alias`, `shownPicture`, `title`, `content`, `creationDate`, `modDate`, `mainNews`, `description`, `status`) VALUES
(30, 22, 'meghibasodas', '1678137194.png', 'Kiderült, miért esett ki Charles Leclerc Bahreinben', '<p>Kider&uuml;lt, mi&eacute;rt esett ki Charles Leclerc Bahreinben</p>', '2023-03-06 22:05:21', '2023-04-09 11:23:41', 1, 'Így akár az is benne lehet a pakliban, hogy a második futamon rajtbüntetést kap Leclerc...', 2),
(37, 22, 'trukk', '1678536814.png', 'Az Alfa Romeo csak szórakozott a padlólemezével az autóbemutatón', '<p>&nbsp;</p>\r\n\r\n<p><strong>Az Alfa Romeo bemutatott padl&oacute;lemeze teljes f&eacute;lrevezet&eacute;s volt.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"../../kepek/tartalomkepek/20230311-131325.png\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Amikor az Alfa Romeo az &eacute;v elej&eacute;n leleplezte &uacute;j versen</p>', '2023-02-28 12:55:24', '2023-04-09 11:23:49', 1, 'Valójában sosem akartak ilyen megoldással versenyezni.', 2),
(39, 22, 'motorhiba', '1678920372.png', 'HIVATALOS: Leclerc-é az első rajtbüntetés az idei szezonban', '<p>&nbsp;</p>\r\n\r\n<p>Charles Leclercre legal&aacute;bb 10 helyes rajtb&uuml;ntet&eacute;s</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '2023-03-15 23:46:12', '2023-04-09 11:23:54', 1, 'A Ferrari versenyzője Charles Leclerc 10 rajthelyes büntetést kap a Szaúd Arábiai Nagydíjon', 2),
(51, 22, 'saudifpketto', '1680380441.png', 'Szaúd-Arábiai Nagydíj: Verstappen futotta a legjobb időt a második szabadedzésen két tizeddel megelőzve Alonsot.', '<p><strong>Max Verstappen &eacute;rte el a leggyorsabb időt a Forma-1 m&aacute;sodik szabadedz&eacute;s&eacute;n a &nbsp;Sza&uacute;d Ar&aacute;bi&aacute;ban k&eacute;t tized m&aacute;sodpercel megverse Alonsot.</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"../../user/hirek/uploads/max.png\" /></strong></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\">A nappali k&ouml;r&uuml;lm&eacute;nyek k&ouml;z&ouml;tt futott első szabadedz&eacute;st k&ouml;vetően a m&aacute;sodik szabadedz&eacute;s m&aacute;r napnyugta ut&aacute;n ker&uuml;lt megrendez&eacute;sre sokkal reprezentat&iacute;v k&ouml;r&uuml;lm&eacute;nyek k&ouml;z&ouml;tt a holnapi időm&eacute;rőt &eacute;s a vas&aacute;rnapi versenyt illetően. </span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\">Lance Stroll kezdte meg a k&ouml;r&ouml;z&eacute;st a p&aacute;ly&aacute;n, a k&ouml;zepes kever&eacute;ken &eacute;s futott egy 1:32.293-as k&ouml;rt, amit Carlos Sainz r&ouml;videsen 1:31.080-re jav&iacute;tott, amint t&ouml;bb aut&oacute; is kigurult a p&aacute;ly&aacute;ra. </span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\">A spanyol tartotta a hely&eacute;t az &eacute;len a szabadedz&eacute;s első perceiben Alonso 1:31.392-ideje előtt de Sainz k&ouml;r&eacute;t sem sokkal k&eacute;sőbb Verstappen m&aacute;r meg is jav&iacute;totta. </span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\">Miut&aacute;n</span><span style=\"font-size:11.0pt\"> a holland megfutotta 1:30.801.es k&ouml;r&eacute;t &uacute;gy tűnt Stroll lehet az a pil&oacute;ta, aki megelőzheti de az utols&oacute; szektorban nem siker&uuml;lt jav&iacute;tania &iacute;gy az Aston Martonos csapatt&aacute;rsa Fernando Alonso neve ker&uuml;lt az &eacute;lre mellette egy&nbsp; 1:30.612-es k&ouml;ridővel. </span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\">Ezt</span><span style=\"font-size:11.0pt\"> k&ouml;vetően Sergio Perez futott egy 1:30.428-as k&ouml;rt, amivel cs&ouml;kkenteni tudta&nbsp; alemarad&aacute;s&aacute;t az &eacute;len tart&oacute;zkod&oacute;khoz k&eacute;pest, azonban Vertappen v&aacute;lasza k&ouml;zel 4 tizeddel volt jobb, mint csapatt&aacute;rsa k&ouml;rideje. Ezzel a k&ouml;rrel a bajnoki c&iacute;mv&eacute;dő ism&eacute;telten az &eacute;lre &aacute;llt az edz&eacute;s első negyed&eacute;nek v&eacute;g&eacute;re. </span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\">Az első h&uacute;szpercnyi kem&eacute;ny &eacute;s k&ouml;zepes gumin val&oacute; k&ouml;r&ouml;zget&eacute;s ut&aacute;n előker&uuml;ltek a l&aacute;gy kever&eacute;kek &eacute;s ezzel megkezdődtek az időm&eacute;rős szimul&aacute;ci&oacute;k is. Alonso &eacute;s Perez is futottak egy-egy k&ouml;rt a l&aacute;gy kever&eacute;keken pr&oacute;b&aacute;lva visszaszerezni a vezet&eacute;st Verstappentől, ami Pereznek siker&uuml;lt is egy 1:29.902-es k&ouml;r&eacute;vel. </span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\">Verstappen</span><span style=\"font-size:11.0pt\"> csak k&eacute;sőbb teljes&iacute;tette saj&aacute;t k&ouml;r&eacute;t a l&aacute;gy gumikon &eacute;s az edz&eacute;s fel&eacute;n&eacute;l ism&eacute;telten &aacute;tvette a vezet&eacute;st a maga 1:29.603-as k&ouml;r&eacute;vel h&aacute;rom tizedet adva a m&aacute;sodik helyen &aacute;ll&oacute; csapatt&aacute;rs&aacute;nak.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\">Az edz&eacute;s v&eacute;ge előtt a csapatok megkezdt&eacute;k a versenyre val&oacute; felk&eacute;sz&uuml;l&eacute;s&uuml;ket &eacute;s az időeredm&eacute;nyek innentől nem is v&aacute;ltoztak.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\">Verstappen</span><span style=\"font-size:11.0pt\"> annak ellen&eacute;re, hogy nagyon gyors versenyk&ouml;r&ouml;ket tudott futni a sebess&eacute;gv&aacute;lt&aacute;sra panaszkodott k&eacute;sleltet&eacute;s &eacute;rezve a visszakapcsol&aacute;sok k&ouml;z&ouml;tt. </span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\">Az Alpine pil&oacute;t&aacute;i Estaban Onoc &eacute;s Pierre Gasly is a legjobb t&iacute;zebn v&eacute;geztek a 4. &eacute;s 6. poz&iacute;ci&oacute;ban. Nico Hulkenberg ism&eacute;t j&oacute;l teljes&iacute;tett a 8. helyre vezetve a Haas-t m&iacute;g csapatt&aacute;rsa Magnussen csak a 15. legjobb időt tudta aut&oacute;zni. </span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\">A k&eacute;t Ferrari gyenge teljes&iacute;tm&eacute;nye a d&eacute;lelőtt ut&aacute;n d&eacute;lut&aacute;nra sem javult. Leclerc &eacute;s Sainz csak a 9 &eacute;s 10. helyet tudt&aacute;k megszerezni. Leclerc az edz&eacute;s v&eacute;ge fel&eacute; furcs&aacute;nak &eacute;rezte az aut&oacute;ja hajt&aacute;sl&aacute;nc&aacute;nak a viselked&eacute;s&eacute;t, de a csapata megnyugtatta, hogy az adatokon nem l&aacute;tnak semmi hib&aacute;t. </span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\">Az első 11 egy m&aacute;sodpercen bel&uuml;l v&eacute;gzett egym&aacute;shoz k&eacute;pest Hamiltonnal, bez&aacute;r&oacute;lag aki 0.996 ezredm&aacute;sodpercel volt lemaradva az &eacute;len &aacute;ll&oacute; Verstappenhez k&eacute;pest, m&iacute;g csapatt&aacute;rsa George Russell a negyedik helyen v&eacute;gzett. </span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-size:11.0pt\">Ezzel</span><span style=\"font-size:11.0pt\"> a szezon m&aacute;sodik versenyh&eacute;tv&eacute;g&eacute;ly&eacute;nek az első napja v&eacute;get &eacute;rt. Folytat&aacute;s holnap 14:00-kor a harmadik szabadedz&eacute;ssel, az időm&eacute;rő pedig holnap 18:00-kor veszi majd kezdet&eacute;t.</span></span></p>\r\n\r\n<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:center\">Helyez&eacute;s</td>\r\n			<td style=\"text-align:center\">Versenyző</td>\r\n			<td style=\"text-align:center\">Aut&oacute;</td>\r\n			<td style=\"text-align:center\">K&ouml;r</td>\r\n			<td style=\"text-align:center\">Idő</td>\r\n			<td style=\"text-align:center\">H&aacute;tr&aacute;ny</td>\r\n			<td style=\"text-align:center\">Intervallum</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">1</td>\r\n			<td style=\"text-align:center\">Max Verstappen</td>\r\n			<td style=\"text-align:center\">Red Bull</td>\r\n			<td style=\"text-align:center\">29</td>\r\n			<td style=\"text-align:center\">1&#39;29.603</td>\r\n			<td style=\"text-align:center\">-</td>\r\n			<td style=\"text-align:center\">-</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">2</td>\r\n			<td style=\"text-align:center\">Fernando Alonso</td>\r\n			<td style=\"text-align:center\">Aston Martin</td>\r\n			<td style=\"text-align:center\">26</td>\r\n			<td style=\"text-align:center\">1&#39;29.811</td>\r\n			<td style=\"text-align:center\">0.208</td>\r\n			<td style=\"text-align:center\">0.208</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">3</td>\r\n			<td style=\"text-align:center\">Sergio Perez</td>\r\n			<td style=\"text-align:center\">Red Bull</td>\r\n			<td style=\"text-align:center\">26</td>\r\n			<td style=\"text-align:center\">1&#39;29.902</td>\r\n			<td style=\"text-align:center\">0.299</td>\r\n			<td style=\"text-align:center\">0.091</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">4</td>\r\n			<td style=\"text-align:center\">Esteban Ocon</td>\r\n			<td style=\"text-align:center\">Alpine</td>\r\n			<td style=\"text-align:center\">27</td>\r\n			<td style=\"text-align:center\">1&#39;30.039</td>\r\n			<td style=\"text-align:center\">0.436</td>\r\n			<td style=\"text-align:center\">0.137</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">5</td>\r\n			<td style=\"text-align:center\">Geroge Russell</td>\r\n			<td style=\"text-align:center\">Mercedes</td>\r\n			<td style=\"text-align:center\">27</td>\r\n			<td style=\"text-align:center\">1&#39;30.070</td>\r\n			<td style=\"text-align:center\">0.467</td>\r\n			<td style=\"text-align:center\">0.031</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">6</td>\r\n			<td style=\"text-align:center\">Pierre Gasly</td>\r\n			<td style=\"text-align:center\">Alpine</td>\r\n			<td style=\"text-align:center\">28</td>\r\n			<td style=\"text-align:center\">1&#39;30.100</td>\r\n			<td style=\"text-align:center\">0.497</td>\r\n			<td style=\"text-align:center\">0.030</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">7</td>\r\n			<td style=\"text-align:center\">Lance Stroll</td>\r\n			<td style=\"text-align:center\">Aston Martin</td>\r\n			<td style=\"text-align:center\">27</td>\r\n			<td style=\"text-align:center\">1&#39;30.110</td>\r\n			<td style=\"text-align:center\">0.507</td>\r\n			<td style=\"text-align:center\">0.010</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">8</td>\r\n			<td style=\"text-align:center\">Nico H&uuml;lkenberg</td>\r\n			<td style=\"text-align:center\">Haas</td>\r\n			<td style=\"text-align:center\">27</td>\r\n			<td style=\"text-align:center\">1&#39;30.181</td>\r\n			<td style=\"text-align:center\">0.578</td>\r\n			<td style=\"text-align:center\">0.071</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">9</td>\r\n			<td style=\"text-align:center\">Charles Leclerc</td>\r\n			<td style=\"text-align:center\">Ferrari</td>\r\n			<td style=\"text-align:center\">28</td>\r\n			<td style=\"text-align:center\">1&#39;30.341</td>\r\n			<td style=\"text-align:center\">0.738</td>\r\n			<td style=\"text-align:center\">0.160</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">10</td>\r\n			<td style=\"text-align:center\">Carlos Sainz</td>\r\n			<td style=\"text-align:center\">Ferrari</td>\r\n			<td style=\"text-align:center\">29</td>\r\n			<td style=\"text-align:center\">1&#39;30.592</td>\r\n			<td style=\"text-align:center\">0.989</td>\r\n			<td style=\"text-align:center\">0.251</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">11</td>\r\n			<td style=\"text-align:center\">Lewis Hamilton</td>\r\n			<td style=\"text-align:center\">Mercedes</td>\r\n			<td style=\"text-align:center\">27</td>\r\n			<td style=\"text-align:center\">1&#39;30.599</td>\r\n			<td style=\"text-align:center\">0.996</td>\r\n			<td style=\"text-align:center\">0.007</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">12</td>\r\n			<td style=\"text-align:center\">Lando Norris</td>\r\n			<td style=\"text-align:center\">Mclaren</td>\r\n			<td style=\"text-align:center\">27</td>\r\n			<td style=\"text-align:center\">1&#39;30.721</td>\r\n			<td style=\"text-align:center\">1.118</td>\r\n			<td style=\"text-align:center\">0.122</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">13</td>\r\n			<td style=\"text-align:center\">Cunoda J&uacute;ki</td>\r\n			<td style=\"text-align:center\">Alpha Tauri</td>\r\n			<td style=\"text-align:center\">30</td>\r\n			<td style=\"text-align:center\">1&#39;30776</td>\r\n			<td style=\"text-align:center\">1.173</td>\r\n			<td style=\"text-align:center\">0.055</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">14</td>\r\n			<td style=\"text-align:center\">Alexander Albon</td>\r\n			<td style=\"text-align:center\">Williams</td>\r\n			<td style=\"text-align:center\">27</td>\r\n			<td style=\"text-align:center\">1&#39;30.810</td>\r\n			<td style=\"text-align:center\">1.207</td>\r\n			<td style=\"text-align:center\">0.034</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">15</td>\r\n			<td style=\"text-align:center\">Kevin Magnussen</td>\r\n			<td style=\"text-align:center\">Haas</td>\r\n			<td style=\"text-align:center\">25</td>\r\n			<td style=\"text-align:center\">1&#39;30.820</td>\r\n			<td style=\"text-align:center\">1.217</td>\r\n			<td style=\"text-align:center\">0.010</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">16</td>\r\n			<td style=\"text-align:center\">Csou Kuan-j&uuml;</td>\r\n			<td style=\"text-align:center\">Alfa Romeo</td>\r\n			<td style=\"text-align:center\">27</td>\r\n			<td style=\"text-align:center\">1&#39;30.837</td>\r\n			<td style=\"text-align:center\">1.234</td>\r\n			<td style=\"text-align:center\">0.017</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">17</td>\r\n			<td style=\"text-align:center\">Nyck de Vries</td>\r\n			<td style=\"text-align:center\">Alpha Tauri</td>\r\n			<td style=\"text-align:center\">29</td>\r\n			<td style=\"text-align:center\">1&#39;30.921</td>\r\n			<td style=\"text-align:center\">1.318</td>\r\n			<td style=\"text-align:center\">0.084</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">18</td>\r\n			<td style=\"text-align:center\">Logan Sargent</td>\r\n			<td style=\"text-align:center\">Williams</td>\r\n			<td style=\"text-align:center\">30</td>\r\n			<td style=\"text-align:center\">1&#39;30.959</td>\r\n			<td style=\"text-align:center\">1.256</td>\r\n			<td style=\"text-align:center\">0.038</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">19</td>\r\n			<td style=\"text-align:center\">Oscar Piastri</td>\r\n			<td style=\"text-align:center\">Mclaren</td>\r\n			<td style=\"text-align:center\">26</td>\r\n			<td style=\"text-align:center\">1&#39;30.964</td>\r\n			<td style=\"text-align:center\">1.361</td>\r\n			<td style=\"text-align:center\">0.005</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">20</td>\r\n			<td style=\"text-align:center\">Valtteri Bottas</td>\r\n			<td style=\"text-align:center\">Alfa Romea</td>\r\n			<td style=\"text-align:center\">30</td>\r\n			<td style=\"text-align:center\">1&#39;31.052</td>\r\n			<td style=\"text-align:center\">1.449</td>\r\n			<td style=\"text-align:center\">0.088</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', '2023-03-17 20:14:32', '2023-04-01 22:20:41', 0, 'Max Verstappen érte el a leggyorsabb időt a Forma-1 második szabadedzésén a  Szaúd Arábiában két tized másodpercel megverse Alonsot.', 1),
(52, 22, 'szaudiverseny', '1680380409.jpeg', 'Pérez nyert Szaúd-Arábiában, Verstappen a második helyig zárkózott', '<p><strong>Noha a rajtn&aacute;l egy kicsit megbotlott, Sergio P&eacute;rez magabiztosan nyerte a Sza&uacute;d-ar&aacute;biai Nagyd&iacute;jat! M&aacute;sodikk&eacute;nt a tizen&ouml;t&ouml;dik helyről z&aacute;rk&oacute;z&oacute;</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"../../user/hirek/uploads/szaudi.jpg\" /></strong></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A sza&uacute;di versenynek a 2022-es szezon ut&aacute;n id&eacute;n is Sergio P&eacute;rez v&aacute;ghatott neki az első helyről (a mexik&oacute;i hossz&uacute; F1-es p&aacute;lyafut&aacute;sa mindk&eacute;t pole poz&iacute;ci&oacute;j&aacute;t Dzsidd&aacute;ban szerezte), mellőle pedig Charles Leclerc h&aacute;trasorol&aacute;sa ut&aacute;n Fernando Alonso v&aacute;rta a startot.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A m&aacute;sodik rajtsoron George Russell &eacute;s Carlos Sainz, a harmadikon pedig Lance Stroll &eacute;s Esteban Ocon osztozott.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A motorcsere miatt t&iacute;z rajthelyes b&uuml;ntet&eacute;st kap&oacute; Leclerc a tizenkettedik rajtkock&aacute;ra &aacute;ll&iacute;thatta fel Ferrarij&aacute;t, a c&iacute;mv&eacute;dő, Max Verstappen pedig csak a tizen&ouml;t&ouml;diket foglalhatta el, miut&aacute;n m&aacute;r az időm&eacute;rő m&aacute;sodik szakasz&aacute;ban kiesett műszaki hiba miatt.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A futam m&aacute;r csak a monac&oacute;i &eacute;s a holland rajtpoz&iacute;ci&oacute;ja miatt is izgalmasnak &iacute;g&eacute;rkezett, mindkettej&uuml;knek komoly felz&aacute;rk&oacute;z&aacute;sra &ndash; vagyis sok előz&eacute;sre &ndash; volt ugyanis sz&uuml;ks&eacute;g&uuml;k.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">P&eacute;rez kiss&eacute; bizonytalanul kapta el a rajtot, az első kanyarban teh&aacute;t Alonso fordult el elsőnek, az Aston Martin &ouml;r&ouml;me azonban nem tartott sok&aacute;ig, az FIA ugyanis k&ouml;z&ouml;lte, a spanyol &ouml;t m&aacute;sodperces b&uuml;ntet&eacute;st kap (ezt elő ki&aacute;ll&aacute;s&aacute;n&aacute;l kellett teljes&iacute;tnie), ami&eacute;rt rosszul &aacute;llt fel a rajtr&aacute;csra&hellip;</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A negyedik k&ouml;rben azt&aacute;n amiatt is bosszankodhattak, hogy P&eacute;rez a c&eacute;legyenes v&eacute;g&eacute;n kif&eacute;kezte a k&eacute;tszeres bajnokot, vagyis visszavette az elsős&eacute;get.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Russell tartotta a harmadik helyet, Stroll pedig felj&ouml;tt a negyedikre, miut&aacute;n egy b&aacute;tor manőverrel maga m&ouml;g&eacute; utas&iacute;totta Sainzot. A rajt nagy vesztese Piastri volt, kinek első sz&aacute;rnya megs&eacute;r&uuml;lt a rajt ut&aacute;ni t&uuml;leked&eacute;sben, &iacute;gy m&aacute;r az első k&ouml;r v&eacute;g&eacute;n ki kellett &aacute;llnia a boxba, ezzel pedig &eacute;rt&eacute;kes poz&iacute;ci&oacute;kat vesz&iacute;tett.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Ami a felz&aacute;rk&oacute;z&oacute;kat illeti, a l&aacute;gy abroncson startol&oacute; Leclerc &ouml;t k&ouml;r alatt a kilencedik, a k&ouml;zepeseken indul&oacute; Verstappen pedig a tizenegyedik helyre j&ouml;tt fel. &Uacute;jabb &ouml;t k&ouml;r eltelt&eacute;vel Leclerc &uacute;jabb k&eacute;t poz&iacute;ci&oacute;t jav&iacute;tott: Pierre Gaslyt &eacute;s Lewis Hamiltont is lehagyta. Verstappen hozz&aacute; hasonl&oacute;an szint&eacute;n kettőt előz&ouml;tt, Csou Kuan-j&uuml;t &eacute;s Gaslyt &ndash; a holland &iacute;gy m&aacute;r kilencedik volt.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Verstappen a tizenkettedik k&ouml;rben Hamiltont is megelőzte, vagyis m&aacute;r ott volt Leclerc nyom&aacute;ban, a monac&oacute;i viszont előre menek&uuml;lt! A tizenharmadik k&ouml;r elej&eacute;n megelőzte Ocont, &aacute;tv&eacute;ve ezzel a hatodik helyez&eacute;st. Ocon sok&aacute;ig Verstappent sem tudta tartani, egy k&ouml;rrel k&eacute;sőbb teh&aacute;t a k&eacute;t felz&aacute;rk&oacute;z&oacute; ism&eacute;t egym&aacute;s m&ouml;g&ouml;tt volt.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A ki&aacute;ll&aacute;sok sor&aacute;t Stroll nyitotta, taktik&aacute;ja viszont nem volt t&uacute;l kifizetődő, saj&aacute;t cser&eacute;je ut&aacute;n ugyanis Sainz el&eacute; ker&uuml;lt a p&aacute;ly&aacute;n. N&eacute;h&aacute;ny k&ouml;rrel k&eacute;sőbb a kanadainak nagyobb baja is ad&oacute;dott, csapata ugyanis arra k&eacute;rte, azonnal &aacute;ll&iacute;tsa le aut&oacute;j&aacute;t, ő pedig f&eacute;lre&aacute;llt, feladva ezzel a k&uuml;zdelmet.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Ez a futam lefoly&aacute;s&aacute;ra is hat&aacute;ssal volt, p&aacute;ly&aacute;ra k&uuml;ldt&eacute;k ugyanis a biztons&aacute;gi aut&oacute;t, az addig kiaut&oacute;zott előny&ouml;k teh&aacute;t lenull&aacute;z&oacute;dtak. Az &uacute;jraind&iacute;t&aacute;skor &ndash; &eacute;s a ker&eacute;kcser&eacute;k ut&aacute;n &ndash; P&eacute;rez, Alonso, Russell, Verstappen, Sainz, Hamilton &eacute;s Leclerc volt a sorrend a mezőny elej&eacute;n, &eacute;s ez a z&ouml;ld jelz&eacute;s ut&aacute;n is v&aacute;ltozatlan maradt.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A huszonkettedik k&ouml;rben azt&aacute;n Hamilton (az &eacute;lmezőnyben egyed&uuml;l ő volt p&aacute;ly&aacute;n k&ouml;zepes abroncsokon, a t&ouml;bbiek mind a kem&eacute;nyeket haszn&aacute;lt&aacute;k) legyűrte Sainzot, a k&ouml;vetkezőben pedig Verstappen vette &aacute;t a harmadik helyet Russelltől. A huszon&ouml;t&ouml;dik k&ouml;rben a c&iacute;mv&eacute;dő Alons&oacute;t is maga m&ouml;g&eacute; utas&iacute;totta, a futam fel&eacute;n&eacute;l teh&aacute;t (ahogyan azt egy&eacute;bk&eacute;nt a spanyol &bdquo;megj&oacute;solta&rdquo; a rajt előtt) a c&iacute;mv&eacute;dő m&aacute;r m&aacute;sodik volt.</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">&Uacute;jra Red Bull 1-2 volt teh&aacute;t a p&aacute;ly&aacute;n: P&eacute;rez &ouml;t &eacute;s f&eacute;l m&aacute;sodperccel vezetett a csapatt&aacute;rs előtt, aki megpr&oacute;b&aacute;lta lopni a t&aacute;vols&aacute;got a mexik&oacute;ihoz k&eacute;pest &ndash; n&eacute;h&aacute;ny tizedn&eacute;l t&ouml;bbet viszont az első &ouml;t k&ouml;r alatt nem tudott lefaragni.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A mezőnyben ekkor megmerevedtek az erőviszonyok: a k&eacute;t Red Bull k&ouml;z&ouml;tt nem cs&ouml;kkent l&aacute;tv&aacute;nyosan a k&uuml;l&ouml;nbs&eacute;g, Alonso tisztes t&aacute;vols&aacute;gb&oacute;l k&ouml;vette őket, majd a k&eacute;t Mercedes &eacute;s a k&eacute;t Ferrari j&ouml;tt. Az ez&uuml;st&ouml;s&ouml;k &eacute;s a csillagosok k&ouml;z&ouml;tt kisebb volt a k&uuml;l&ouml;nbs&eacute;g, előz&eacute;si manővert viszont Hamilton &eacute;s Leclerc sem tudott ind&iacute;tani.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A futam v&eacute;g&eacute;n izgalmakat egyed&uuml;l Cunoda Juki &eacute;s Kevin Magnussen, utols&oacute; pont&eacute;rt zajl&oacute; k&uuml;zdelme szolg&aacute;ltatott: a d&aacute;n t&ouml;bb alkalommal is megpr&oacute;b&aacute;lta legyűrni jap&aacute;n ellenfel&eacute;t, előz&eacute;s&eacute;re viszont eg&eacute;szen a negyvenhetedik k&ouml;rig kellett v&aacute;rni. Akkor azonban bevetőd&ouml;tt a c&eacute;legyenes v&eacute;g&eacute;n &eacute;s &aacute;tvette a tizedik helyez&eacute;st.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Az &eacute;len m&aacute;r nem t&ouml;rt&eacute;nt v&aacute;ltoz&aacute;s, P&eacute;rez megszerezte teh&aacute;t idei első &eacute;s p&aacute;lyafut&aacute;sa &ouml;t&ouml;dik Forma&ndash;1-es futamgyőzelm&eacute;t, a tizen&ouml;t&ouml;dik helyről indul&oacute; Verstappen pedig m&aacute;sodikk&eacute;nt &eacute;rt c&eacute;lba. Alonso &uacute;jabb harmadik helyez&eacute;st gyűjt&ouml;tt, a negyedik poz&iacute;ci&oacute; pedig Russell&eacute; volt, majd Hamilton &eacute;s a k&eacute;t Ferrari j&ouml;tt. Pontot Ocon, Gasly &eacute;s Magnussen szerzett m&eacute;g. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Folytat&aacute;s k&eacute;t h&eacute;t m&uacute;lva Ausztr&aacute;li&aacute;ban!</span></span></span></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>', '2023-03-19 22:26:05', '2023-04-01 22:20:09', 0, 'Perez győzött Verstappen előtt a Szaúdi Nagydíjon, Alonso a futam után bukta a dobogóját!', 1),
(71, 22, 'hibaskonstrukcio', '1680206153.png', 'A Mercedes Bahrein előtt tisztában volt a W14-es konstrukciójuk korlátaival.', '<p><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">A Mercedes elismerte, hogy nem v&aacute;ltak be a fejleszt&eacute;seik a 2023-as Forma-1-es aut&oacute;jukkal, erre pedig m&aacute;r azelőtt r&aacute;j&ouml;ttek, hogy az kigurult volna a p&aacute;ly&aacute;ra a bahreini előszezoni teszten.</span></span></strong></p>\r\n\r\n<p><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><img alt=\"\" src=\"../../user/hirek/uploads/w14.png\" /></span></span></strong></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A n&eacute;met gy&aacute;rt&oacute; egy neh&eacute;znek mondhat&oacute; szezonkezdeten van t&uacute;l, ami annak k&ouml;sz&ouml;nhető, hogy a 2023-as W14-es k&oacute;djelű versenyaut&oacute;juk nagy lemarad&aacute;sban van a mezőnyből toronymagasan kiemelkedő Red Bullt&oacute;l. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A Mercedes csapatfőn&ouml;ke Toto Wolff k&ouml;zvetlen&uuml;l a bahreini időm&eacute;rőt k&ouml;vetően azt nyilatkozta, hogy a csapat m&aacute;r elvetette az eddigi koncepci&oacute;t &eacute;s teljesen &uacute;j ir&aacute;nyt vesznek a fejleszt&eacute;sekkel.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">B&aacute;r igen meglepő volt, hogy Wolff l&aacute;tsz&oacute;lag az első időm&eacute;rő alapj&aacute;n vonta le ezt a k&ouml;vetkeztet&eacute;s, az&oacute;ta kider&uuml;lt, hogy a Mercedes m&aacute;r hetekkel a szezonkezdet előtt tudta, hogy valami radik&aacute;lis v&aacute;ltoztat&aacute;st kell alkalmazniuk annak &eacute;rdek&eacute;ben, hogy ism&eacute;t versenyk&eacute;pesek legyenek. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Andrew Shovlin, a Mercedes vezető m&eacute;rn&ouml;ke elismerte, hogy m&aacute;r az aut&oacute; sz&eacute;lcsatorn&aacute;s fejleszt&eacute;s&eacute;nek a v&eacute;g&eacute;n r&aacute;j&ouml;ttek erre, amikor az ott kapott adatok nem v&aacute;ltott&aacute;k be a fejleszt&eacute;sekhez fűz&ouml;tt rem&eacute;nyeket. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">&bdquo;M&aacute;r azelőtt l&aacute;ttuk a sz&eacute;lcsatorn&aacute;ban azt, hogy a fejleszt&eacute;si r&aacute;t&aacute;nk elmarad a v&aacute;rakoz&aacute;sainkt&oacute;l, hogy fel&uuml;lt&uuml;nk volna a rep&uuml;lőre Bahreinbe&rdquo; &ndash; ismerte el Shovlin. &bdquo;M&aacute;r ekkor sz&oacute;ba ker&uuml;lt, hogy radik&aacute;lisabb l&eacute;p&eacute;seket kell tenn&uuml;nk egy m&aacute;sik koncepci&oacute; fel&eacute;.&rdquo;</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">&bdquo;Ugyanakkor az, amit Bahreinben l&aacute;ttunk, tal&aacute;n kicsit mindenkit r&aacute;&eacute;bresztett arra, hogy ezt sokkal hamarabb meg kell l&eacute;pn&uuml;nk, mint amire elősz&ouml;r gondoltunk.&rdquo;</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Shovlin r&eacute;szben megerős&iacute;tette azt is, hogy a &bdquo;zero pod&rdquo; elnevez&eacute;sű oldaldoboz kialak&iacute;t&aacute;snak annyi, amikor azt k&eacute;rdezt&eacute;k tőle, szerinte Wolff mire gondolt, amikor a koncepci&oacute;v&aacute;lt&aacute;sr&oacute;l besz&eacute;lt. Azt v&aacute;laszolta, hogy &bdquo;tal&aacute;n mindenki az oldaldobozokra gondol m&aacute;r, amikor koncepci&oacute;r&oacute;l besz&eacute;l&uuml;nk&rdquo;.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">&bdquo;A W14 a tavalyi aut&oacute; evol&uacute;ci&oacute;ja, aminek sz&aacute;mos tulajdons&aacute;g&aacute;t az hat&aacute;rozza meg, hol helyezt&uuml;k el a v&aacute;zon az oldald&oacute; &uuml;tk&ouml;zőz&oacute;n&aacute;kat. Egy&eacute;rtelmű, hogy az eddigi megold&aacute;saink nem hoznak annyit a konyh&aacute;ra, mint rem&eacute;lt&uuml;k, de ez igaz a teljes aut&oacute;ra.&rdquo;</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">&bdquo;El&eacute;g naiv lenne b&aacute;rkinek is azt gondolnia, hogy egy elt&eacute;rően kin&eacute;ző bor&iacute;t&aacute;st&oacute;l eltűnik a lemarad&aacute;sunk, a helyzet az, hogy a h&aacute;tr&aacute;nyunk legnagyobb r&eacute;sz&eacute;t az aut&oacute; m&aacute;s ter&uuml;letein szedt&uuml;k &ouml;ssze. Rengeteg projekten dolgozunk, hogy a k&ouml;vetkező 5 verseny alatt megpr&oacute;b&aacute;ljuk jav&iacute;tani az aut&oacute; temp&oacute;j&aacute;t.&rdquo;</span></span></span></p>', '2023-03-28 21:26:33', '2023-03-30 21:55:53', 0, 'A Mercedes már azelőtt tudta, hogy megérkezett volna a Forma-1-es, hogy változtatniuk kell az autójuk koncepcióján.', 1),
(76, 22, 'australiafpegy', '1680351085.png', 'Max Verstappen nyerte az Ausztrál Nagydíj eseménydúsra sikerült első szabadedzését.', '<p><strong><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">K&eacute;t h&eacute;t ut&aacute;n &uacute;jra Forma-1-es futamot rendeznek, a helysz&iacute;n ez&uacute;ttal Ausztr&aacute;lia volt, magyar idő szerint p&eacute;nteken kora hajnalban ker&uuml;lt sor az első szabadedz&eacute;sre.</span></span></span></strong></p>\r\n\r\n<p><strong><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><img alt=\"\" src=\"../../user/hirek/uploads/asutraliafpegy.png\" /></span></span></span></strong></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A Red Bullos Max Verstappen futotta a leggyorsabb k&ouml;ridőt 1:18.790-el az edz&eacute;s v&eacute;g&eacute;n, ezzel megelőzve a Mercedes pil&oacute;t&aacute;j&aacute;t, Lewis Hamiltont, aki az edz&eacute;s v&eacute;g&eacute;n l&eacute;pett előre a m&aacute;sodik helyre, miut&aacute;n kezdetben k&uuml;szk&ouml;d&ouml;tt a W14 vezethetős&eacute;g&eacute;vel. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Sergio Perez a harmadik helyen z&aacute;rt a m&aacute;sik Red Bullal megelőzve Fernando Alonsot, b&aacute;r előbbi a legjobb idej&eacute;t a k&ouml;zepesen kever&eacute;ken &eacute;rte el, mivel a l&aacute;gy gumiabroncson futott k&ouml;re sor&aacute;n let&eacute;rt a p&aacute;ly&aacute;r&oacute;l.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A k&eacute;t Ferrari csak az 5. &eacute;s 6. helyeket &eacute;rő időket tudt&aacute;k megaut&oacute;zni Leclerc, Sainz sorrenben. Ut&oacute;bbinak volt egy p&aacute;ly&aacute;n k&iacute;v&uuml;li &eacute;lm&eacute;nye, amikor az 1-2-es kanyarkombin&aacute;ci&oacute;ban az aut&oacute; h&aacute;tulja kit&ouml;rt alatta &eacute;s lesodr&oacute;dott a p&aacute;ly&aacute;r&oacute;l. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Az edz&eacute;s alatt erősen f&uacute;jt a sz&eacute;l a p&aacute;lya ezen szakasz&aacute;n aminek k&ouml;vetkezt&eacute;ben t&ouml;bb m&aacute;s pil&oacute;ta is k&uuml;szk&ouml;d&ouml;tt hasonl&oacute; probl&eacute;m&aacute;kkal. Az Alpha Taurin&aacute;l versenyző Yuki Tsunoda esete volt a legl&aacute;tv&aacute;nyosabb, amikor az egyes kanyarban megp&ouml;rd&uuml;lt &eacute;s a levegőbe emelkedett az aut&oacute;ja, amikor &aacute;tsz&aacute;nk&aacute;zott a s&oacute;der&aacute;gyon. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Lando Norris a 7. helyre hozta be a Mclarent megelőzve ezzel a Mercedesn&eacute;l versenyző Russellt &eacute;s a legjobb 10-be utols&oacute;nak bef&eacute;rő Lance Strollt is. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">B&aacute;r Verstappen nyert az edz&eacute;s neki sem volt z&ouml;kkenőmentes, mivel rendszeresen lecs&uacute;szott az 1-es kanyar cs&uacute;cspontj&aacute;r&oacute;l. Az edz&eacute;s v&eacute;ge fel&eacute; t&uacute;ls&aacute;gosan r&aacute;ment a 4-es kanyar kij&aacute;rati ker&eacute;kvetőj&eacute;re &eacute;s megp&ouml;rd&uuml;lt a haszn&aacute;lt l&aacute;gy gumikon. Ugyan ott, ahol tavaly Sebastian Vettel a falnak csapta. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Az edz&eacute;s fel&eacute;n&eacute;l azt&aacute;n egy piros z&aacute;szl&oacute;s megszak&iacute;t&aacute;s k&ouml;vetkezett, amikor a GPS rendszer, amit a csapatok &eacute;s az FIA is haszn&aacute;l meghib&aacute;sodott. T&ouml;bb pil&oacute;ta is panaszkodott a feltart&aacute;sokra, ami annak volt k&ouml;sz&ouml;nhető, hogy a csapatok a rendszerhiba miatt nem tudt&aacute;k a pil&oacute;t&aacute;kat időben inform&aacute;lni a m&ouml;g&ouml;ttes forgalomr&oacute;l.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">A kilenc perces megszak&iacute;t&aacute;st k&ouml;vetően a pil&oacute;t&aacute;k ism&eacute;t a p&aacute;ly&aacute;ra hajtottak, azonban az edz&eacute;s v&eacute;ge előtt Logan Sargent aut&oacute;ja meg&aacute;llt a p&aacute;ly&aacute;n &uacute;jabb piros z&aacute;szl&oacute;s megszak&iacute;t&aacute;st okozva. </span></span></p>', '2023-04-01 14:11:25', '0000-00-00 00:00:00', 0, 'Verstappen nyerte a piros zászlóval megszakított és leintett első szabadedzést Ausztráliában', 1),
(77, 22, 'australiafpketto', '1680380738.png', 'Aston Martin sikert hozott az Ausztál Nagydíj második szabadedzése', '<p><strong><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Az esem&eacute;nyd&uacute;s első szabadedz&eacute;st k&ouml;vetően Alonso nyerte az esős folytat&aacute;st Leclerc &eacute;s Verstappen előtt. </span></span></span></strong></p>\r\n\r\n<p><strong><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><img alt=\"\" src=\"../../user/hirek/uploads/alonso.png\" /></span></span></strong></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Verstappen volt az első, aki kihajtott a boxb&oacute;l a m&aacute;sodik szabadedz&eacute;sen, de Carlos Sainz futotta meg az első m&eacute;rt k&ouml;rt. A k&ouml;zepes gumikon el&eacute;rt 1:20.378-as k&ouml;r&eacute;t azt&aacute;n p&aacute;r perccel k&eacute;sőbb Verstappen m&aacute;r 1:19.759-re jav&iacute;totta, de a spanyol is gyors volt &eacute;s egy 1:19.695.&ouml;s k&ouml;ridővel &uacute;jra az &eacute;lre &aacute;llt. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">&Aacute;m ez az idő sem volt sok&aacute;ig el&eacute;g az első hely megtart&aacute;s&aacute;hoz, ugyanis Fernando Alonso az első k&ouml;r&eacute;n futott egy 1:18.887-es időt, amivel elvette honfit&aacute;rs&aacute;t&oacute;l az első helyet &eacute;s a k&eacute;sőbbiek folyam&aacute;n m&aacute;r nem is mozdult el onnan. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Nemsokkal 15 perc eltelt&eacute;vel meg&eacute;rkezett az eső az Albert Parkba. Jelentősebb esőz&eacute;s ekkor m&eacute;g csak az 1-es kanyarban volt tapasztalhat&oacute;, ahol Verstappen alatt meg is ingott a Red Bull. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Mielőtt az időj&aacute;r&aacute;s rosszabbra fordult volna Leclerc j&ouml;tt fel a m&aacute;sodik helyre t&ouml;bb mint 4 tizedes lemarad&aacute;sban Alonsohoz k&eacute;pest. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Az eső egyre jobban el kezdett esni, melynek k&ouml;vetkezt&eacute;ben Lance Stroll megkoccolta a falat a 9-es kanyar előtt. Az eső intenzit&aacute;s&aacute;nak n&ouml;veked&eacute;s&eacute;vel hajtottak vissza a pil&oacute;t&aacute;k a gar&aacute;zsokba. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Nagyj&aacute;b&oacute;l f&eacute;lt&aacute;von a Ferrari pil&oacute;t&aacute;k visszamer&eacute;szkedtek a p&aacute;ly&aacute;ra l&aacute;gy gumikon &eacute;s őket k&ouml;vette Russell is az intermediate gumikon azonban mind a h&aacute;rman egyetlen k&ouml;r ut&aacute;n visszat&eacute;rtek a boxutc&aacute;ba, mivel a Ferrarik szenvedek a tapad&aacute;ssal a slick gumikon, az eső gumiknak pedig nem volt el&eacute;g nedves az aszfaltcs&iacute;k.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Ezt k&ouml;vetően Hamilton, Verstappen &eacute;s Ocon is kigurultak a p&aacute;ly&aacute;ra az eső gumikon, de egy k&ouml;r eltelt&eacute;vel ők is visszamentek a gar&aacute;zsba. &nbsp;</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Az utols&oacute; 20 perchez k&ouml;zeledve t&ouml;bb aut&oacute; is kihajtott a p&aacute;ly&aacute;ra, hogy tov&aacute;bbi k&ouml;rt tegyenek meg az intereken. Ezzel p&aacute;rhuzamosan megkezdődtek a boxutca v&eacute;g&eacute;n a rajtgyakorlatok egy esetleges esős rajtra k&eacute;sz&uuml;lve. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Az esőben val&oacute; k&ouml;r&ouml;zget&eacute;s nem jelentett vesz&eacute;lyt az eddig futott időkre. A legfigyelemre m&eacute;lt&oacute;bb jelentek Russell &eacute;s Stroll nev&eacute;hez fűződnek ugyanis mind a ketten k&ouml;zel j&aacute;rtak, hogy eldobj&aacute;k az aut&oacute;jukat a 3-as kanyarban. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">Logan Sargent volt az egyetlen, aki egyetlen egy k&ouml;rt sem teljes&iacute;tett az edz&eacute;sen k&ouml;sz&ouml;nhetően az első szabadedz&eacute;sen elszenvedett technikai hib&aacute;j&aacute;nak. </span></span><span style=\"font-size:11.0pt\"> </span></p>', '2023-04-01 17:55:36', '2023-04-01 22:25:38', 1, 'Az eseménydús nyitás után esős folytatást hozott az ausztrál program', 1),
(78, 22, 'australiafpharom', '1680380649.png', 'Verstappen nyerte az utolsó szabadedzést Ausztráliában.', '<p><strong><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A Red Bullos v&eacute;gzett az &eacute;len az időm&eacute;rő előtti utols&oacute; gyakorl&aacute;son Alonso &eacute;s Esteban Ocon előtt.</span></span></span></strong><strong><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"> </span></span></span></strong></p>\r\n\r\n<p><img alt=\"\" src=\"../../user/hirek/uploads/maxikaaa.png\" /></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A p&eacute;nteki eső &aacute;ztatta FP2 ut&aacute;n a szombati utols&oacute; edz&eacute;s m&aacute;r ism&eacute;t sz&aacute;raz k&ouml;r&uuml;lm&eacute;nyek k&ouml;z&ouml;tt zajlott Melbourneben a fenyegető esőfelhők ellen&eacute;re, b&aacute;r a reggeli szit&aacute;l&aacute;s rontotta a tapad&aacute;si k&ouml;r&uuml;lm&eacute;nyeket a p&aacute;ly&aacute;n.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A p&eacute;nteken l&aacute;tott fennakad&aacute;sok miatt a legt&ouml;bb csapat nem vesztegette az időt &eacute;s egyből a p&aacute;ly&aacute;ra gurultak, hogy bep&oacute;tolj&aacute;k a probl&eacute;m&aacute;k miatt elmaradt időm&eacute;rős &eacute;s verseny szimul&aacute;ci&oacute;kat. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A bajnoki &eacute;llovas Max Verstappen nyitotta meg a k&ouml;r&ouml;z&eacute;st egy 1:19.664-es k&ouml;ridővel a k&ouml;zepes gumikever&eacute;ken, majd nem sokkal k&eacute;sőbb ezt az időt tov&aacute;bb jav&iacute;tva 1:18.741-el &aacute;llt az &eacute;len a holland. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Verstappen volt az egyetlen, aki a top csapatok k&ouml;z&uuml;l a k&ouml;zepeseken futotta meg a k&ouml;r&eacute;t, amit nem sokkal k&eacute;sőbb Charles Leclerc jav&iacute;tott tov&aacute;bb a Ferrari vol&aacute;nja m&ouml;g&ouml;tt. A monac&oacute;i pil&oacute;ta 1:18.691-es k&ouml;rt futott a l&aacute;gy abroncsokon, amivel &aacute;t is vette a vezet&eacute;st. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Sergio Perez a m&aacute;sik Red Bullal az edz&eacute;s első fel&eacute;ben a gar&aacute;zsban maradt, mivel a szerelni kellett az RB19 h&aacute;tulj&aacute;t. A p&eacute;nteki kaotikus edz&eacute;sek miatt az &iacute;gy elvesztett p&aacute;lyaidő a mexik&oacute;i sz&aacute;m&aacute;ra m&eacute;g &eacute;rt&eacute;kesebbnek bizonyult. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">15 perc eltelt&eacute;vel Fernando Alonso is kigurult a p&aacute;ly&aacute;ra &eacute;s egyből egy 1:18,329-el nyitott a l&aacute;gy kever&eacute;keken, amit nem sokkal k&eacute;sőbb honfit&aacute;rsa Carlos Sainz tov&aacute;bb jav&iacute;tott 1:18.127-re. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Perez szerencs&eacute;j&eacute;re a csapata meg tudta oldani a technikai probl&eacute;m&aacute;t az aut&oacute;val &eacute;s p&aacute;ly&aacute;ra tudott hajtani ő is 20 perc eltelt&eacute;vel. Az első gyors k&ouml;r&eacute;n azonban k&ouml;zel ker&uuml;lt a falakhoz annak k&ouml;sz&ouml;nhetően, hogy a Haassal k&ouml;r&ouml;zgető Nico Hulkenberg feltartotta. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Ezt k&ouml;vetően az edz&eacute;s fel&eacute;n&eacute;l azt&aacute;n egy piros z&aacute;szl&oacute;s megszak&iacute;t&aacute;s k&ouml;vetkezett, mert Nyck de Vries aut&oacute;j&aacute;r&oacute;l leszakadt egy elem &eacute;s pont az ide&aacute;lis &iacute;ven landolt a 9- es kanyar előtt, de h&aacute;rom perccel k&eacute;sőbb folytathat&oacute;dott is a k&ouml;r&ouml;z&eacute;s. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A gyorsan javul&oacute; tapad&aacute;si viszonyok az idők folyamatos jav&iacute;t&aacute;s&aacute;hoz vezetett az utols&oacute; 10 percben, mielőtt az 1-es kanyarban felerős&ouml;d&ouml;tt a szit&aacute;l&aacute;s, aminek k&ouml;vetkezt&eacute;ben Perez &eacute;s Leclerc is elhagyta a p&aacute;ly&aacute;t. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Alonso r&ouml;vid időre az &eacute;lre &aacute;llt egy 1:17.727-es idővel de Verstappen gyorsan visszavette a vezet&eacute;st egy 1:17.565-&ouml;s idővel. Az Alpine versenyzője Esteban Ocon szint&eacute;n kihaszn&aacute;lta a javul&oacute; p&aacute;lyaviszonyokat &eacute;s a harmadik helyet szerezte meg, amit az edz&eacute;s v&eacute;g&eacute;ig meg is tartott megelőzve ezzel George Russellt a negyedik helyen. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A m&aacute;sik Alpinnal Gasly az &ouml;t&ouml;dik helyet tudta megszerezni, akit Perez k&ouml;vetett a sorban. Sainz &eacute;s Hamilton, akik az utols&oacute; gyors k&ouml;r&uuml;kben forgalomba ker&uuml;ltek k&ouml;vette őt a 6. &eacute;s 7. helyen. A legjobb t&iacute;zbe m&eacute;g Lance Stroll &eacute;s Zhou f&eacute;rek be a 9. &eacute;s 10. helyen.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Hulkenberg a 11. helyen v&eacute;gzett a Haassal, megelőzve a Williams pil&oacute;t&aacute;j&aacute;t Alexander Albont &eacute;s Leclercet. A hazai p&aacute;ly&aacute;n versenyző Oscar Piastri csak a 14. helyet tudta megszerezni a Mclarennel, m&ouml;g&ouml;tte Valtteri Bottas a m&aacute;sik Alfa Romeoval &eacute;s Yuki Tsunoda k&ouml;vetkeztek. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Őket k&ouml;vette Logan Sargent a Williamsel &eacute;s Kevin Magnussen a Haassal. A sort pedig Nyck de Vries &eacute;s Lando Norris z&aacute;rta. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Norris csak 12 k&ouml;rt teljes&iacute;tett k&ouml;sz&ouml;nhetően egy kuplung probl&eacute;m&aacute;nak, ami miatt ki kellett hagynia az edz&eacute;s utols&oacute; harmad&aacute;t. </span></span></span></p>', '2023-04-01 22:24:09', '0000-00-00 00:00:00', 1, 'Verstappen az élen az utolsó gyakorláson, 6 tizeden belül a top 8', 1);
INSERT INTO `news` (`id`, `writerId`, `alias`, `shownPicture`, `title`, `content`, `creationDate`, `modDate`, `mainNews`, `description`, `status`) VALUES
(79, 22, 'australiaquali', '1680389295.jpeg', 'Verstappen szerezte meg a pole pozíciót az Ausztrál Nagydíj időmérő edzésén.', '<p style=\"text-align:center\"><strong><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Max Verstappen legyőzve a Mercedes p&aacute;ros&aacute;t szerezte meg az első rajkock&aacute;t a vas&aacute;rnapi futamra, ahol Sergio Perez kies&eacute;se miatt a mezőny v&eacute;g&eacute;ről rajtol majd.</span></span></span></strong></p>\r\n\r\n<p style=\"text-align:center\"><strong><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><img alt=\"\" src=\"../../user/hirek/uploads/perez.jpg\" /></span></span></span></strong></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Miut&aacute;n egy enyhe eső el&aacute;ztatta a Melbourne-i aszfaltcs&iacute;kot egy izgalmas időm&eacute;rőre volt kil&aacute;t&aacute;s. A p&aacute;lya v&eacute;g&uuml;l felsz&aacute;radt a kezd&eacute;sre, de az alacsony p&aacute;lyahőm&eacute;rs&eacute;klet miatt a gumiknak t&ouml;bb meleg&iacute;tő k&ouml;r kellett az &uuml;zemi hőfok el&eacute;r&eacute;s&eacute;hez, ami megnehez&iacute;tette a pil&oacute;t&aacute;k dolg&aacute;t. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A Q1 elej&eacute;n Logan Sargent p&ouml;rg&ouml;tt meg, majd p&aacute;r perccel k&eacute;sőbb a Red Bullos Sergio Perez f&eacute;kezte el a 3-as kanyart, melynek k&ouml;vetkezt&eacute;ben a kavics&aacute;gyban ragadt, &iacute;gy m&eacute;rt k&ouml;r n&eacute;lk&uuml;l kiesett, az edz&eacute;st pedig piros z&aacute;szl&oacute;val szak&iacute;tott&aacute;k meg. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Az &uacute;jraind&iacute;t&aacute;s ut&aacute;n Verstappen vette &aacute;t a vezet&eacute;st, mik&ouml;zben a t&ouml;bbi pil&oacute;ta k&uuml;szk&ouml;d&ouml;tt a gumimeleg&iacute;t&eacute;ssel. Verstappen tov&aacute;bb jav&iacute;tott, 1:17.4-et futott maga m&ouml;g&eacute; utas&iacute;tva Alonsot a m&aacute;sodik helyen.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A Q1 utols&oacute; perceiben a k&eacute;t Mclaren, Tsunoda &eacute;s Bottas &aacute;lltak kies&eacute;sre, de folyamatosan javultak a k&ouml;r&uuml;lm&eacute;nyek. A Q1 v&eacute;g&eacute;n v&eacute;g&uuml;l Vertappen, Hamilton &eacute;s Russel v&eacute;gzett a top 3-ban, Piastri, Zhou, Bottas &eacute;s Perez pedig kiestek. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A Q2-ben Leclerc kezdett az &eacute;len, 1:15.5-el de Alonso &eacute;s Verstappen is megjav&iacute;tott&aacute;k az idej&eacute;t. Norris az első k&ouml;r&eacute;ben hib&aacute;zott &eacute;s megl&aacute;togatta a kavics&aacute;gyat. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Az első pr&oacute;b&aacute;lkoz&aacute;sok ut&aacute;n Norrison k&iacute;v&uuml;l mindenki rendelkezett m&eacute;rt idővel. Tsunoda, Gasly, Magnussen, De Vries &eacute;s Norris &aacute;lltak kieső helyen. Meglepet&eacute;sre az első k&ouml;r&ouml;k ut&aacute;n H&uuml;lkenberg az 5. helyen &aacute;llt, ahogy Albon is a top 10-ben volt. A Q2 v&eacute;g&eacute;n azt&aacute;n Gasly jav&iacute;tott, de &iacute;gy is csak a 11. helyet tudta megszerezni, Norris pedig a 12. helyre l&eacute;pett előre, ebben a k&ouml;rben is &eacute;rintette egy kicsit a s&oacute;dert az utols&oacute; szektorban, amivel időt vesztett. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Verstappen tov&aacute;bb jav&iacute;tott az &eacute;len, 1:17.056-ot ment, &iacute;gy ő nyerte a Q2-t, Alonos &eacute;s a Ferrarik előtt. Kiesett Ocon, Tsunoda, Norris, Magnussen &eacute;s De Vries is. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A Q3-ba teh&aacute;t a k&eacute;t Ferrari, a k&eacute;t Mercedes, a k&eacute;t Aston Martin valamint Verstappen, Gasly &eacute;s meglepet&eacute;sre Hulkenberg &eacute;s Albon jutottak be. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A Q3 elej&eacute;n Verstappen 1:17.5-&ouml;s k&ouml;rt futott, ami nem volt teljes m&eacute;rt&eacute;kben tiszta &iacute;gy 5-en is be tudtak j&ouml;nni el&eacute;. Az elős k&ouml;r&ouml;ket k&ouml;vetően Hamilton, Alonso, Russell volt a top 3. A holland azt&aacute;n egyből ment egy &uacute;jabb gyors k&ouml;rt, amivel &aacute;tvette a vezet&eacute;st Hamiltont&oacute;l 9 ezred m&aacute;sodperccel. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A Q3 v&eacute;g&eacute;n az utols&oacute; k&ouml;r&eacute;vel csapott igaz&aacute;n oda Verstappen, 1:16.7-es k&ouml;r&eacute;vel megszerezte a pole-t. M&ouml;g&eacute; a k&eacute;t Mercedes j&ouml;tt be Russell Hamilton sorrendben, majd a top 3-at k&ouml;vetően: Alonso, Sainz, Stroll, Leclerc, Albon, Gasly &eacute;s H&uuml;lkenberg. </span></span></span></p>', '2023-04-02 00:47:40', '2023-04-02 00:48:15', 1, 'A Red Bull keretbefoglalta a mezőnyt, a Mercedes a semmiből lépett előre az ausztrál időmérőn', 1),
(80, 22, 'australiaverseny', '1680592538.png', 'Verstappen nyerte a kaotikus véget ért Ausztrál Nagydíjat.', '<p style=\"text-align:center\"><strong><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Max Verstappen nyerte a 37. alkalommal megrendezett Ausztr&aacute;l Nagyd&iacute;jat&nbsp; Lewis Hamilton &eacute;s Fernando Alonso előtt, ahol a bizarr jeleneteknek k&ouml;sz&ouml;nhetően 12 versenyző fejezte be a futamot. </span></span></span></strong></p>\r\n\r\n<p><strong><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><img alt=\"\" src=\"../../user/hirek/uploads/ausztraliaverseny.png\" /></span></span></span></strong></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Naps&uuml;t&eacute;ses sz&aacute;raz k&ouml;r&uuml;lm&eacute;nyek k&ouml;z&ouml;tt rendezt&eacute;k meg a 37. Ausztr&aacute;l Nagyd&iacute;jat, ami kaotikus jelenetek k&ouml;z&ouml;tt &eacute;rt v&eacute;get, 12 versenyző tudta befejezni a futamot. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A rajtot k&ouml;vetően mind a k&eacute;t Mercedes &aacute;tugrotta a rosszul rajtol&oacute; Max Verstappent, aki &iacute;gy a 3. helyre cs&uacute;szott vissza. A k&eacute;t Aston Martin sem rajtolt j&oacute;l, Alonso az 5. m&iacute;g Stroll a 7. helyen j&ouml;tt el a rajtot k&ouml;vetően. Ut&oacute;bbi a Leclercel val&oacute; koccan&aacute;snak k&ouml;sz&ouml;nhette a visszaes&eacute;t melynek k&ouml;vetkezt&eacute;ben a monac&oacute;i versenye 3 kanyar ut&aacute;n v&eacute;get &eacute;rt. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A sorrend az &eacute;len nem v&aacute;ltozott eg&eacute;szen a 9. k&ouml;rig, mikor Alex Albon a 6. helyen haladva a falnak csapta az aut&oacute;t. A biztons&aacute;gi aut&oacute;s f&aacute;zis alatt Russell &eacute;s Sainz is a boxba hajtottak &uacute;j abroncsok&eacute;rt de nem sokkal k&eacute;sőbb piros z&aacute;szl&oacute;val f&eacute;lbeszak&iacute;tott&aacute;k a versenyt, ami miatt sokat buktak a t&ouml;bbiekhez k&eacute;pest. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Az &uacute;j rajtot teh&aacute;t Lewis Hamilton v&aacute;rhatta az &eacute;lről, akinek siker&uuml;lt is megtartania a vezet&eacute;st, de miut&aacute;n enged&eacute;lyezt&eacute;k a DRS haszn&aacute;lat&aacute;t Verstappennek siker&uuml;lt ism&eacute;t az &eacute;lre &aacute;llnia &eacute;s egy k&eacute;nyelmesnek mondhat&oacute; előnyt kiaut&oacute;znia Hamiltonhoz k&eacute;pest. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A futam tov&aacute;bbi r&eacute;sz&eacute;ben az &eacute;len nem t&ouml;rt&eacute;nt m&aacute;r v&aacute;ltoz&aacute;s. Verstappen 10 m&aacute;sodperces előnyt tudott kiaut&oacute;zni a t&ouml;bbiekhez k&eacute;pest, ami csak akkor cs&ouml;kkent, amikor az utols&oacute; előtti kanyart elf&eacute;kezte &eacute;s let&eacute;rt a p&aacute;ly&aacute;r&oacute;l. A k&ouml;z&eacute;pmezőnyben Lando Norris &eacute;s Nico H&uuml;lkenberg csat&aacute;zott a 8. &eacute;s 9. helyek&eacute;rt, amiből a brit ker&uuml;lt ki győztesen, k&ouml;sz&ouml;nhetően H&uuml;lkenberg apr&oacute; hib&aacute;j&aacute;nak. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A verseny ezen szakasz&aacute;ban az első 3 egym&aacute;s ut&aacute;n futott&aacute;k meg a leggyorsabb k&ouml;r&ouml;ket de előz&eacute;sre nem ker&uuml;lt sor. Ekkor kezdődtek indultak be az esem&eacute;nyek kezdve azzal, hogy Kevin Magnussen furcsa m&oacute;don lesodr&oacute;dott a kettes kanyarban &eacute;s a jobb h&aacute;ts&oacute; kerek&eacute;vel eltal&aacute;lta a falat. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A sz&eacute;tsz&oacute;r&oacute;d&oacute; t&ouml;rmel&eacute;kek &eacute;s Magnussen p&aacute;ly&aacute;n val&oacute; meg&aacute;ll&aacute;sa miatt ism&eacute;t megszak&iacute;tott&aacute;k a versenyt mind&ouml;ssze 3 k&ouml;rrel a v&eacute;ge előtt. Ez mindenkinek egy &uacute;j es&eacute;lyt adott a l&aacute;gyakon tov&aacute;bbi poz&iacute;ci&oacute;k szerz&eacute;s&eacute;re. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Az &uacute;j rajtn&aacute;l Verstappen j&oacute;l j&ouml;tt el &iacute;gy Hamilton nem tudta t&aacute;madni a hollandot. M&ouml;g&ouml;tt&uuml;k Carlos Sainz elf&eacute;kezte az egyes kanyart ezzel ki&uuml;tve a versenyből a 3. helyen &aacute;ll&oacute; honfit&aacute;rs&aacute;t Alons&oacute;t, aki ezzel visszaesett a mezőny v&eacute;g&eacute;re, de nem keletkezett k&aacute;r az aut&oacute;j&aacute;ban.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A k&ouml;z&eacute;pmezőnyben halad&oacute; Gasly szint&eacute;n elf&eacute;kezte az 1-es kanyart, ennek k&ouml;vetkezt&eacute;ben lesodr&oacute;dott a p&aacute;ly&aacute;r&oacute;l. Amikor visszat&eacute;rt nem n&eacute;zve a visszapillant&oacute; t&uuml;kr&eacute;t beh&uacute;zta az aut&oacute;j&aacute;t csapatt&aacute;rsa Esteban Ocon el&eacute; ezzel ki&uuml;tve mindkettőj&uuml;ket. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Mielőtt a piros z&aacute;szl&oacute; harmadszor is előker&uuml;lt volna a versenyen a Lance Stroll cs&uacute;szott ki a kavics&aacute;gyba a 3-as kanyarban mik&ouml;zben Sainzzal csat&aacute;zott. Ezzel mind a k&eacute;t Aston Martin a top 10-en k&iacute;v&uuml;lre ker&uuml;lt. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A versenyt harmadszor is megszak&iacute;tott&aacute;k, de mivel Versappen nem fejezte be az első szektort ez&eacute;rt a hivatalos sorrend a rajtot megelőző sorrend volt a kiesett aut&oacute;k n&eacute;lk&uuml;l &eacute;pp &uacute;gy, mint tavaly Silverstoneban. A k&ouml;r&uuml;lbel&uuml;l 20 perces megszak&iacute;t&aacute;s alatt Sainz kapott egy 5 m&aacute;sodperces időb&uuml;ntet&eacute;st Alonsoval val&oacute; &uuml;tk&ouml;z&eacute;se miatt. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Hosszas gondolkod&aacute;s ut&aacute;n a versenyir&aacute;ny&iacute;t&aacute;s a biztons&aacute;gi aut&oacute;s befejez&eacute;s mellett d&ouml;nt&ouml;tt &eacute;s mivel ez alatt nem lehet előzni Sainz a b&uuml;ntet&eacute;se miatt kiszorult a pontszerzők k&ouml;z&uuml;l. </span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">A verseny v&eacute;gi k&aacute;osz k&ouml;vetkezt&eacute;ben mind a k&eacute;t Mclaren pil&oacute;ta a pontszerzők k&ouml;z&ouml;tt z&aacute;rt csak&uacute;gy, mint az Alfa Romeoval Zhou. Az utols&oacute; pontszerző helyet v&eacute;g&uuml;l Yuki Tsunoda szerezte meg az Alpha Taurival.</span></span></span></p>', '2023-04-02 10:52:32', '2023-04-04 09:15:43', 1, 'Magnussen balesete után jött a káosz Melboruneben ahol mindkét Ferrari és Alpine is nullázott.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(255) NOT NULL,
  `raceId` int(255) NOT NULL,
  `teamId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `raceId`, `teamId`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 2, 1),
(12, 2, 2),
(13, 2, 3),
(14, 2, 4),
(15, 2, 5),
(16, 2, 6),
(17, 2, 7),
(18, 2, 8),
(19, 2, 9),
(20, 2, 10),
(21, 3, 1),
(22, 3, 2),
(23, 3, 3),
(24, 3, 4),
(25, 3, 5),
(26, 3, 6),
(27, 3, 7),
(28, 3, 8),
(29, 3, 9),
(30, 3, 10),
(31, 4, 1),
(32, 4, 2),
(33, 4, 3),
(34, 4, 4),
(35, 4, 5),
(36, 4, 6),
(37, 4, 7),
(38, 4, 8),
(39, 4, 9),
(40, 4, 10),
(41, 5, 1),
(42, 5, 2),
(43, 5, 3),
(44, 5, 4),
(45, 5, 5),
(46, 5, 6),
(47, 5, 7),
(48, 5, 8),
(49, 5, 9),
(50, 5, 10),
(51, 6, 1),
(52, 6, 2),
(53, 6, 3),
(54, 6, 4),
(55, 6, 5),
(56, 6, 6),
(57, 6, 7),
(58, 6, 8),
(59, 6, 9),
(60, 6, 10),
(61, 7, 1),
(62, 7, 2),
(63, 7, 3),
(64, 7, 4),
(65, 7, 5),
(66, 7, 6),
(67, 7, 7),
(68, 7, 8),
(69, 7, 9),
(70, 7, 10),
(71, 8, 1),
(72, 8, 2),
(73, 8, 3),
(74, 8, 4),
(75, 8, 5),
(76, 8, 6),
(77, 8, 7),
(78, 8, 8),
(79, 8, 9),
(80, 8, 10),
(81, 9, 1),
(82, 9, 2),
(83, 9, 3),
(84, 9, 4),
(85, 9, 5),
(86, 9, 6),
(87, 9, 7),
(88, 9, 8),
(89, 9, 9),
(90, 9, 10),
(91, 10, 1),
(92, 10, 2),
(93, 10, 3),
(94, 10, 4),
(95, 10, 5),
(96, 10, 6),
(97, 10, 7),
(98, 10, 8),
(99, 10, 9),
(100, 10, 10),
(301, 11, 1),
(302, 11, 2),
(303, 11, 3),
(304, 11, 4),
(305, 11, 5),
(306, 11, 6),
(307, 11, 7),
(308, 11, 8),
(309, 11, 9),
(310, 11, 10),
(311, 12, 1),
(312, 12, 2),
(313, 12, 3),
(314, 12, 4),
(315, 12, 5),
(316, 12, 6),
(317, 12, 7),
(318, 12, 8),
(319, 12, 9),
(320, 12, 10),
(321, 13, 1),
(322, 13, 2),
(323, 13, 3),
(324, 13, 4),
(325, 13, 5),
(326, 13, 6),
(327, 13, 7),
(328, 13, 8),
(329, 13, 9),
(330, 13, 10),
(331, 14, 1),
(332, 14, 2),
(333, 14, 3),
(334, 14, 4),
(335, 14, 5),
(336, 14, 6),
(337, 14, 7),
(338, 14, 8),
(339, 14, 9),
(340, 14, 10),
(341, 15, 1),
(342, 15, 2),
(343, 15, 3),
(344, 15, 4),
(345, 15, 5),
(346, 15, 6),
(347, 15, 7),
(348, 15, 8),
(349, 15, 9),
(350, 15, 10),
(351, 16, 1),
(352, 16, 2),
(353, 16, 3),
(354, 16, 4),
(355, 16, 5),
(356, 16, 6),
(357, 16, 7),
(358, 16, 8),
(359, 16, 9),
(360, 16, 10),
(361, 17, 1),
(362, 17, 2),
(363, 17, 3),
(364, 17, 4),
(365, 17, 5),
(366, 17, 6),
(367, 17, 7),
(368, 17, 8),
(369, 17, 9),
(370, 17, 10),
(371, 18, 1),
(372, 18, 2),
(373, 18, 3),
(374, 18, 4),
(375, 18, 5),
(376, 18, 6),
(377, 18, 7),
(378, 18, 8),
(379, 18, 9),
(380, 18, 10),
(381, 19, 1),
(382, 19, 2),
(383, 19, 3),
(384, 19, 4),
(385, 19, 5),
(386, 19, 6),
(387, 19, 7),
(388, 19, 8),
(389, 19, 9),
(390, 19, 10),
(391, 20, 1),
(392, 20, 2),
(393, 20, 3),
(394, 20, 4),
(395, 20, 5),
(396, 20, 6),
(397, 20, 7),
(398, 20, 8),
(399, 20, 9),
(400, 20, 10),
(401, 21, 1),
(402, 21, 2),
(403, 21, 3),
(404, 21, 4),
(405, 21, 5),
(406, 21, 6),
(407, 21, 7),
(408, 21, 8),
(409, 21, 9),
(410, 21, 10),
(411, 22, 1),
(412, 22, 2),
(413, 22, 3),
(414, 22, 4),
(415, 22, 5),
(416, 22, 6),
(417, 22, 7),
(418, 22, 8),
(419, 22, 9),
(420, 22, 10),
(421, 23, 1),
(422, 23, 2),
(423, 23, 3),
(424, 23, 4),
(425, 23, 5),
(426, 23, 6),
(427, 23, 7),
(428, 23, 8),
(429, 23, 9),
(430, 23, 10);

-- --------------------------------------------------------

--
-- Table structure for table `races`
--

CREATE TABLE `races` (
  `id` int(255) NOT NULL,
  `raceName` varchar(255) NOT NULL,
  `raceDate` datetime NOT NULL,
  `racePic` varchar(255) NOT NULL,
  `countryFlag` varchar(255) NOT NULL,
  `fpOne` datetime NOT NULL,
  `fpTwo` datetime NOT NULL,
  `fpThree` datetime NOT NULL,
  `quali` datetime NOT NULL,
  `sprint` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `races`
--

INSERT INTO `races` (`id`, `raceName`, `raceDate`, `racePic`, `countryFlag`, `fpOne`, `fpTwo`, `fpThree`, `quali`, `sprint`) VALUES
(1, 'Bahraini Nagydíj', '2023-03-05 16:00:00', '../kepek/palyak/bahrain.png', 'bahrain.png', '2023-03-03 12:30:00', '2023-03-03 16:00:00', '2023-03-04 12:30:00', '2023-03-04 16:00:00', '0000-00-00 00:00:00'),
(2, 'Szaudi Nagydíj', '2023-03-19 18:00:00', '../kepek/palyak/saudi.png', 'saudi.png', '2023-03-17 14:29:00', '2023-03-17 18:00:00', '2023-03-18 14:30:00', '2023-03-18 18:00:00', '0000-00-00 00:00:00'),
(3, 'Ausztrál Nagydíj', '2023-04-02 07:00:00', '../kepek/palyak/australia.png', 'australia.png', '2023-03-31 03:30:00', '2023-03-31 07:00:00', '2023-04-01 03:30:00', '2023-04-01 07:00:00', '0000-00-00 00:00:00'),
(4, 'Azeri Nagydíj', '2023-04-30 13:00:00', '../kepek/palyak/baku.png', 'azer.png', '2023-04-28 11:30:00', '2023-04-29 11:30:00', '0000-00-00 00:00:00', '2023-04-28 15:00:00', '2023-04-29 15:30:00'),
(5, 'Miami Nagydíj', '2023-05-07 21:30:00', '../kepek/palyak/miami.png', 'usa.png', '2023-05-05 20:30:00', '2023-05-06 00:00:00', '2023-05-06 18:30:00', '2023-05-26 22:00:00', '0000-00-00 00:00:00'),
(6, 'Emilia Romagnai Nagydíj', '2023-05-21 15:00:00', '../kepek/palyak/imola.png', 'italy.png', '2023-05-19 13:30:00', '2023-05-19 17:00:00', '2023-05-20 12:30:00', '2023-05-20 16:00:00', '0000-00-00 00:00:00'),
(7, 'Monacoi Nagydíj', '2023-05-28 15:00:00', '../kepek/palyak/monaco.png', 'monaco.png', '2023-05-26 13:30:00', '2023-05-26 17:00:00', '2023-05-27 12:30:00', '2023-05-27 16:00:00', '0000-00-00 00:00:00'),
(8, 'Spanyol Nagydíj', '2023-06-04 15:00:00', '../kepek/palyak/spain.png', 'spain.png', '2023-06-02 13:30:00', '2023-06-02 17:00:00', '2023-06-03 12:30:00', '2023-06-03 16:00:00', '0000-00-00 00:00:00'),
(9, 'Kanadai Nagydíj', '2023-06-18 20:00:00', '../kepek/palyak/canada.png', 'canada.png', '2023-06-16 19:30:00', '2023-06-16 23:00:00', '2023-06-17 18:30:00', '2023-05-17 22:00:00', '0000-00-00 00:00:00'),
(10, 'Osztrák Nagydíj', '2023-07-02 15:00:00', '../kepek/palyak/austria.png', 'austria2.png', '2023-05-30 13:30:00', '2023-07-01 12:30:00', '0000-00-00 00:00:00', '2023-06-30 17:00:00', '2023-07-01 16:30:00'),
(11, 'Brit Nagydíj', '2023-07-09 16:00:00', '../kepek/palyak/silverstone.png', 'uk.png', '2023-07-07 13:30:00', '2023-07-07 17:00:00', '2023-07-08 12:30:00', '2023-07-08 16:00:00', '0000-00-00 00:00:00'),
(12, 'Magyar Nagydíj', '2023-07-23 15:00:00', '../kepek/palyak/hungary.png', 'hungary.png', '2023-07-21 13:30:00', '2023-07-21 17:00:00', '2023-07-22 12:30:00', '2023-07-22 16:00:00', '0000-00-00 00:00:00'),
(13, 'Belga Nagydíj', '2023-07-30 15:00:00', '../kepek/palyak/belgium.png', 'belgium.png', '2023-07-28 13:30:00', '2023-07-29 12:30:00', '0000-00-00 00:00:00', '2023-07-29 17:00:00', '2023-07-29 16:30:00'),
(14, 'Holland Nagydíj', '2023-08-27 15:00:00', '../kepek/palyak/zandvoort.png', 'netherlans.png', '2023-08-25 12:30:00', '2023-08-25 16:00:00', '2023-08-26 11:30:00', '2023-08-26 15:00:00', '0000-00-00 00:00:00'),
(15, 'Olasz Nagydíj', '2023-09-03 15:00:00', '../kepek/palyak/monza.png', 'italy.png', '2023-09-01 13:30:00', '2023-09-01 17:00:00', '2023-09-02 12:30:00', '2023-09-02 16:00:00', '0000-00-00 00:00:00'),
(16, 'Szingapúri Nagydíj', '2023-09-17 14:00:00', '../kepek/palyak/singapore.png', 'singapore.png', '2023-09-15 11:30:00', '2023-09-15 15:00:00', '2023-09-16 11:30:00', '2023-09-16 15:00:00', '0000-00-00 00:00:00'),
(17, 'Japán Nagydíj', '2023-09-24 07:00:00', '../kepek/palyak/japan-removebg-preview.png', 'japan.png', '2023-09-22 04:30:00', '2023-09-22 08:00:00', '2023-09-23 04:30:00', '2023-09-23 08:00:00', '0000-00-00 00:00:00'),
(18, 'Qatari Nagydíj', '2023-10-08 19:00:00', '../kepek/palyak/qatar.png', 'qatar.png', '2023-10-06 15:30:00', '2023-10-07 15:30:00', '0000-00-00 00:00:00', '2023-10-06 19:00:00', '2023-10-07 19:30:00'),
(19, 'Amerikai Nagydíj', '2023-10-22 21:00:00', '../kepek/palyak/austin.png', 'usa.png', '2023-10-20 19:30:00', '2023-10-21 20:00:00', '0000-00-00 00:00:00', '2023-10-20 13:00:00', '2023-10-22 00:00:00'),
(20, 'Mexikói Nagydíj', '2023-10-29 21:00:00', '../kepek/palyak/mexico.png', 'mexico.png', '2023-10-27 20:30:00', '2023-10-28 00:00:00', '2023-10-28 19:30:00', '2023-10-28 23:00:00', '0000-00-00 00:00:00'),
(21, 'Brazil Nagydíj', '2023-11-05 18:00:00', '../kepek/palyak/brazil.png', 'brazil.png', '2023-11-03 15:30:00', '2023-11-04 15:30:00', '0000-00-00 00:00:00', '2023-11-03 19:00:00', '2023-11-04 19:30:00'),
(22, 'Las Vegasi Nagydíj', '2023-11-19 07:00:00', '../kepek/palyak/lasvegas.png', 'usa.png', '2023-11-17 05:30:00', '2023-11-17 09:00:00', '2023-11-18 05:30:00', '2023-11-18 09:00:00', '0000-00-00 00:00:00'),
(23, 'Abu Dhabi Nagydíj', '2023-11-26 14:00:00', '../kepek/palyak/abu_dhabi.png', 'uae.png', '2023-11-24 10:30:00', '2023-11-24 14:00:00', '2023-11-25 11:30:00', '2023-11-25 15:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(255) NOT NULL,
  `teamName` varchar(255) NOT NULL,
  `teamPoints` int(255) NOT NULL,
  `teamConstructors` int(255) NOT NULL,
  `teamWins` int(255) NOT NULL,
  `teamPodiums` int(255) NOT NULL,
  `teamRanking` int(255) NOT NULL,
  `teamPrincipal` varchar(255) NOT NULL,
  `teamPhoto` varchar(255) NOT NULL,
  `carPhoto` varchar(255) NOT NULL,
  `teamColor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `teamName`, `teamPoints`, `teamConstructors`, `teamWins`, `teamPodiums`, `teamRanking`, `teamPrincipal`, `teamPhoto`, `carPhoto`, `teamColor`) VALUES
(1, 'Mercedes AMG Petronas F1 Team', 56, 8, 125, 281, 3, 'Toto Wolff', 'mergalogo.jpg', 'mercedesrajz.png', 'black'),
(2, 'Scuderia Ferrari', 26, 16, 241, 798, 2, 'Frederic Vasseur', 'ferrari2.jpg', 'ferrarirajz.png', '#930418'),
(3, 'Oracle Red Bull Racing', 123, 5, 92, 234, 1, 'Christian Horner', 'redbullfekete.jpg', 'redbullrajz.png', '#13152c'),
(4, 'Mclaren Formula 1 Team', 12, 8, 183, 494, 5, 'Andrea Stella', 'mclaren2.jpg', 'mclarenrajz.png', '#fb7415'),
(5, 'BWT Alpine F1 Team', 8, 0, 1, 2, 4, 'Otmar Szafnauer', 'alpine.jpg', 'alpinerajz.png', '#f38ec2'),
(6, 'Scuderia Alpha Tauri', 1, 0, 1, 2, 9, 'Franz Tost', 'alpha2.jpg', 'alphataurirajz.png', '#172d54'),
(7, 'Aston Martin Aramco Cognizant Formula One Team', 65, 0, 0, 1, 7, 'Mike Krack', 'aston.jpg', 'astonmartinrajz.png', '#145243'),
(8, 'Alfa Romeo F1 Team Stake', 6, 0, 0, 0, 6, 'Alessandro Alunni Bravi', 'alfa.png', 'alfarajz.png', '#991d24'),
(9, 'MoneyGram Haas F1 Team', 7, 0, 0, 0, 8, 'Guenther Steiner', 'haas.jpg', 'haasrajz.png', '#a7a7a7'),
(10, 'Williams Racing', 1, 9, 114, 313, 10, 'Jamse Volwes', 'williamss.jpg', 'williamsrajz.png', '#0c234f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hirid` (`newsid`),
  ADD KEY `accid` (`accid`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fullteams`
--
ALTER TABLE `fullteams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `csapatid` (`teamId`,`driverId`),
  ADD KEY `pilotaid` (`driverId`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hiriroid` (`writerId`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `csapatid` (`raceId`,`teamId`),
  ADD KEY `futamid` (`teamId`);

--
-- Indexes for table `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `fullteams`
--
ALTER TABLE `fullteams`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;

--
-- AUTO_INCREMENT for table `races`
--
ALTER TABLE `races`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`accid`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `fullteams`
--
ALTER TABLE `fullteams`
  ADD CONSTRAINT `fullteams_ibfk_1` FOREIGN KEY (`teamId`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `fullteams_ibfk_2` FOREIGN KEY (`driverId`) REFERENCES `drivers` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`writerId`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`teamId`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `participants_ibfk_2` FOREIGN KEY (`raceId`) REFERENCES `races` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
