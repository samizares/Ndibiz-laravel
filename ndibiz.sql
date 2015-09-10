-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2015 at 01:57 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ndibiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `street` text NOT NULL,
  `lga_id` int(10) unsigned NOT NULL,
  `state_id` int(10) unsigned NOT NULL,
  `biz_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `street`, `lga_id`, `state_id`, `biz_id`) VALUES
(1, '5,omonile street, off shangisha', 2, 25, 1),
(2, '10,uyi street,off Ikorodu street', 4, 25, 3),
(6, '10,omonile street off shangisha', 2, 25, 8),
(7, '34,notorious street', 1, 25, 9),
(9, '67,federal housing mile 2', 3, 25, 11),
(10, '56,jemila street, off Alaroro', 9, 1, 12),
(12, '45,otodo street off yedheux', 26, 2, 15),
(13, '45,adejomo street, off Elosa avenue', 21, 1, 16),
(14, '56,cofidencial road, off stayoff abenue', 4, 25, 17),
(15, '34,Winston churchii Avenue', 22, 2, 18),
(16, '98,Fadeyi street', 3, 25, 19),
(17, '56, Edumare street, of Ikosi', 4, 25, 20),
(18, '34, etim Iyang crescent', 28, 25, 21),
(19, '34,Toyin street', 31, 25, 22);

-- --------------------------------------------------------

--
-- Table structure for table `biz`
--

CREATE TABLE IF NOT EXISTS `biz` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `contactname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone1` int(11) DEFAULT NULL,
  `phone2` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(10) unsigned NOT NULL,
  `rating_cache` float unsigned NOT NULL DEFAULT '3',
  `rating_count` int(10) unsigned NOT NULL DEFAULT '0',
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `featured` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`id`),
  UNIQUE KEY `businessprofile_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `biz`
--

INSERT INTO `biz` (`id`, `name`, `contactname`, `email`, `website`, `phone1`, `phone2`, `created_at`, `updated_at`, `user_id`, `rating_cache`, `rating_count`, `slug`, `featured`) VALUES
(1, 'samizares cab service', 'sammyoryor', 'samizares@gmail.com', 'http://www.samizarescab.com', 2147483647, 2147483647, '2015-08-12 21:17:40', '2015-08-27 17:36:11', 7, 3, 0, '', 'YES'),
(3, 'coded Night club', 'Great sammy', 'samizares@yahoo.com', 'http://www.codednightclub.com', 2147483647, 2147483647, '2015-08-12 21:34:57', '2015-08-12 21:34:57', 7, 3, 0, '', 'NO'),
(8, 'Bella''s place', 'Annabell', 'infobella@msn.com', 'http://bellasplace.com', 2147483647, 2147483647, '2015-08-24 11:06:04', '2015-08-24 11:06:04', 7, 3, 0, '', 'NO'),
(9, 'Zares Mealss', 'Mr Piro', 'info@zares.com', 'http://www.zaresmeals.com', 2147483647, 2147483647, '2015-08-24 13:09:21', '2015-09-05 12:08:04', 7, 3, 0, '', 'NO'),
(11, 'Sammy''s Bank', 'Zares', 'samizares@bank.com', 'http://www.sammysbank.com', 909837637, 2147483647, '2015-08-24 22:00:54', '2015-09-05 12:30:38', 7, 3, 0, '', 'YES'),
(12, 'shanshan cars', 'Mr Phil', 'info@shahshan.com', 'http://www.shanshan.com', 2147483647, 2147483647, '2015-08-25 20:04:54', '2015-09-05 12:03:55', 7, 3, 0, '', 'YES'),
(15, 'Twilight Services', 'Gentle jack', 'info@twillight.com', 'http://www.twilightservices.com', 2147483647, 2147483647, '2015-08-25 21:50:11', '2015-08-27 15:28:25', 7, 3, 0, '', 'YES'),
(16, 'Angry birds', 'Angry man', 'info@angry.com', 'http://angrybirds.com', 9984003, 9489454, '2015-08-25 21:56:13', '2015-08-27 10:46:13', 7, 3, 0, '', 'YES'),
(17, 'Franks home', 'Frank Spiff', 'info@frank.com', 'http://frankshome.com', 2147483647, 2147483647, '2015-08-25 22:06:40', '2015-08-27 12:55:09', 7, 3, 0, '', 'YES'),
(18, 'Janes Super stores', 'Mrs Jane Foster', 'info@jane.com', 'http://janestores.com', 90434850, 94853324, '2015-08-27 17:17:17', '2015-08-27 17:17:17', 7, 3, 0, '', 'NO'),
(19, 'Meegan Exotic cars', 'Mr Meegan Renault', 'info@meegan.com', 'http://meegancars.com', 2147483647, 2147483647, '2015-08-27 17:20:12', '2015-09-05 12:06:56', 7, 3, 0, '', 'YES'),
(20, 'Mo''s Cathering services', 'Mrs Modukpe Uyi', 'info@mocat.com', 'http://mocathering.com', 909876789, 989049857, '2015-08-27 17:34:07', '2015-09-05 21:34:52', 7, 3, 0, '', 'YES'),
(21, 'Fred engines', 'Mr Fred Perry', 'info@fredengines.com', 'http://fredengines.com', 980989485, 890458593, '2015-08-27 17:44:47', '2015-08-27 17:44:47', 7, 3, 0, '', 'NO'),
(22, 'New Bank Biz', 'Gbenga Daniels', 'info@newbank.com', 'http://www.newbank.com', 2147483647, 2147483647, '2015-08-31 23:10:01', '2015-09-05 20:19:57', 7, 3, 0, '', '10');

-- --------------------------------------------------------

--
-- Table structure for table `biz_cat_pivot`
--

CREATE TABLE IF NOT EXISTS `biz_cat_pivot` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `biz_id` int(10) unsigned NOT NULL,
  `cat_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `biz_id` (`biz_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `biz_cat_pivot`
--

INSERT INTO `biz_cat_pivot` (`id`, `biz_id`, `cat_id`) VALUES
(2, 3, 8),
(3, 8, 1),
(4, 9, 4),
(6, 11, 34),
(7, 1, 10),
(8, 12, 11),
(10, 15, 6),
(11, 16, 1),
(12, 17, 33),
(13, 18, 12),
(14, 19, 10),
(15, 20, 36),
(16, 21, 37),
(17, 22, 34);

-- --------------------------------------------------------

--
-- Table structure for table `biz_state_pivot`
--

CREATE TABLE IF NOT EXISTS `biz_state_pivot` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `state_id` int(10) unsigned NOT NULL,
  `biz_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `biz_state_pivot`
--

INSERT INTO `biz_state_pivot` (`id`, `state_id`, `biz_id`) VALUES
(1, 25, 1),
(2, 25, 3);

-- --------------------------------------------------------

--
-- Table structure for table `biz_subcat_pivot`
--

CREATE TABLE IF NOT EXISTS `biz_subcat_pivot` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subcat_id` int(10) unsigned NOT NULL,
  `biz_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `biz_subcat_pivot`
--

INSERT INTO `biz_subcat_pivot` (`id`, `subcat_id`, `biz_id`) VALUES
(1, 25, 8),
(2, 26, 8),
(3, 62, 9),
(4, 63, 9),
(5, 64, 11),
(6, 65, 11),
(7, 66, 11),
(8, 59, 1),
(9, 60, 1),
(10, 29, 3),
(11, 30, 3),
(12, 49, 12),
(13, 27, 15),
(14, 25, 16),
(15, 47, 17),
(16, 31, 18),
(17, 61, 19),
(18, 67, 20),
(19, 68, 20),
(20, 70, 21),
(21, 73, 21),
(22, 65, 22);

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE IF NOT EXISTS `cats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `image_class` varchar(100) NOT NULL,
  `meta_description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `name`, `image_class`, `meta_description`) VALUES
(1, 'Fashion', 'female', 'Classical clothes'),
(2, 'Shopping', 'bicycle', NULL),
(3, 'Sports & Leisure', 'futbol-o', NULL),
(4, 'Restaurants', 'spoon', 'Great African cuisines'),
(5, 'Transportation', 'taxi', 'Bus transportation'),
(6, 'Hotel & Travels', 'institution', 'Get the cheapest hotel rooms here'),
(8, 'Bars', 'glass', 'Nightlife'),
(9, 'Arts And Entertainment', 'glass', 'Here this is it'),
(10, 'cars', 'car', 'Automobiles'),
(11, 'Cars and factories', 'bus', 'Does this really exist'),
(12, 'Magnet producers', 'book', 'wow,,this is cool'),
(33, 'home furniture', 'home', 'home utencils here'),
(34, 'Banking and Finance', 'money', 'Contact the closest bank to you'),
(36, 'Cathering Services', 'spoon', 'Ndibiz stock all kinds of Cathering Services'),
(37, 'Car Mechanic', 'car', 'Check out all the mechanics for all the available cars'),
(38, 'Shipping Services', 'ship', 'Get the trusted contacts of your trusted Shipping companies');

-- --------------------------------------------------------

--
-- Table structure for table `lgas`
--

CREATE TABLE IF NOT EXISTS `lgas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `state_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `lgas`
--

INSERT INTO `lgas` (`id`, `name`, `state_id`) VALUES
(1, 'Kosofo', 25),
(2, 'Ikorodu', 25),
(3, 'Agege', 25),
(4, 'Alimosho', 25),
(5, 'Ikwuano', 1),
(6, 'Aba North', 1),
(7, 'Aba South', 1),
(8, 'Arochukwu', 1),
(9, 'Bende', 1),
(10, 'Isiala Ngwa North', 1),
(11, 'Isiala Ngwa South', 1),
(12, 'Isuikwuato', 1),
(13, 'Obi Ngwa', 1),
(14, 'Ohafia', 1),
(15, 'Osisioma Ngwa', 1),
(16, 'Ugwunagbo', 1),
(17, 'Ukwa East', 1),
(18, 'Ukwa West', 1),
(19, 'Umuahia North', 1),
(20, 'Umuahia South', 1),
(21, 'Umu Nneochi', 1),
(22, 'Abaji', 2),
(23, 'Abuja Municipal', 2),
(24, 'Bwari', 2),
(25, 'Gwagwalada', 2),
(26, 'Kuje', 2),
(27, 'Kwali', 2),
(28, 'Victoria Island', 25),
(29, 'Ikoyi', 25),
(30, 'Banana Island', 25),
(31, 'Lekki', 25),
(32, 'Demsa', 3),
(33, 'Fufore', 3),
(34, 'Ganye', 3),
(35, 'Girei', 3),
(36, 'Gombi', 3),
(37, 'Guyuk', 3),
(38, 'Hong', 3),
(39, 'Jada', 3),
(40, 'Lamurde', 3),
(41, 'Madagali', 3),
(42, 'Maiha', 3),
(43, 'Mayo-Belwa', 3),
(44, 'Michika', 3),
(45, 'Mubi North', 3),
(46, 'Mubi South', 3),
(47, 'Numan', 3),
(48, 'Shelleng', 3),
(49, 'Song', 3),
(50, 'Toungo', 3),
(51, 'Yola North', 3),
(52, 'Yola South', 3),
(53, 'Abak', 4),
(54, 'Eastern Obolo', 4),
(55, 'Eket', 4),
(56, 'Ibiono-Ibom', 4),
(57, 'Okobo', 4),
(58, 'Onna', 4),
(59, 'Oron', 4),
(60, 'Oruk Anam', 4),
(61, 'Ukanafun', 4),
(62, 'Udung-Uko', 4),
(63, 'Uruan', 4),
(64, 'Urue-Offong/Oruko', 4),
(65, 'Uyo', 4),
(66, 'Esit-Eket', 4),
(67, 'Ika', 4),
(68, 'Essien Udim', 4),
(69, 'Ikono', 4),
(70, 'Etim-Ekpo', 4),
(71, 'Ikot Abasi', 4),
(72, 'Etinan', 4),
(73, 'Ikot Ekpene', 4),
(74, 'Ibeno', 4),
(75, 'Ini', 4),
(76, 'Ibesikpo-Asutan', 4),
(77, 'Itu', 4),
(78, 'Mbo', 4),
(79, 'Mkpat-Enin', 4),
(80, 'Akowonjo', 25),
(81, 'Sango', 25),
(82, 'Ajegunle', 25),
(83, 'AJEROMI IFELODUN', 25),
(84, 'Apapa', 25),
(85, 'Amuwo Odofin', 25),
(86, 'Epe', 25),
(87, 'ITA-MARU', 25),
(88, 'IGBO-IFON', 25),
(89, 'SURULERE', 25),
(90, 'Ikota', 25),
(91, 'Ifako', 25),
(92, 'EBUTE-METTA', 25),
(93, 'MUSHIN', 25),
(94, 'OJO', 25),
(95, 'SHOMOLU', 25),
(96, 'Aguda', 25),
(97, 'Ejigbo', 25),
(98, 'Bariga', 25);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_07_31_225910_create_businessprofile_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `biz_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `rating` int(10) NOT NULL,
  `comment` text NOT NULL,
  `approved` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `spam` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Abia'),
(2, 'Abuja'),
(3, 'Adamawa'),
(4, 'Akwa Ibom'),
(5, 'Anambra'),
(6, 'Bauchi'),
(7, 'Bayelsa'),
(8, 'Benue'),
(9, 'Borno'),
(10, 'Cross River'),
(11, 'Delta'),
(12, 'Ebonyi'),
(13, 'Edo'),
(14, 'Ekiti'),
(15, 'Enugu'),
(16, 'Gombe'),
(17, 'Imo'),
(18, 'Jigawa'),
(19, 'Kaduna'),
(20, 'Kano'),
(21, 'Katsina'),
(22, 'Kebbi'),
(23, 'Kogi'),
(24, 'Kwara'),
(25, 'Lagos'),
(26, 'Nasarawa'),
(27, 'Niger'),
(28, 'Ogun'),
(29, 'Ondo'),
(30, 'Osun'),
(31, 'Oyo'),
(32, 'Plateau'),
(33, 'Rivers'),
(34, 'Sokoto'),
(35, 'Taraba'),
(36, 'Yobe'),
(37, 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=166 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`) VALUES
(1, 'phone'),
(2, 'battery-full'),
(3, 'black-tie'),
(4, 'commenting'),
(5, 'hourglass'),
(6, 'industry'),
(7, 'map'),
(8, 'map-pin'),
(9, 'mouse-pointer'),
(10, 'opencart'),
(11, 'register'),
(12, 'television'),
(13, 'trademark'),
(14, 'asterisk'),
(15, 'bed'),
(16, 'bear'),
(17, 'bell'),
(18, 'birthday-cake'),
(19, 'bicycle'),
(20, 'book'),
(21, 'briefcase'),
(22, 'bookmark'),
(23, 'building'),
(24, 'bullhorn'),
(25, 'bus'),
(26, 'calender'),
(27, 'camera'),
(28, 'car'),
(29, 'cartificate'),
(30, 'check'),
(31, 'child'),
(32, 'clock-o'),
(33, 'clone'),
(34, 'close'),
(35, 'cloud'),
(36, 'code'),
(37, 'coffee'),
(38, 'cogs'),
(39, 'comment'),
(40, 'compass'),
(41, 'copyright'),
(42, 'credit-card'),
(43, 'cutlery'),
(44, 'dashboard'),
(45, 'database'),
(46, 'desktop'),
(47, 'diamond'),
(48, 'download'),
(49, 'edit'),
(50, 'envelope'),
(51, 'exchange'),
(52, 'eye'),
(53, 'eyedropper'),
(54, 'fax'),
(55, 'female'),
(56, 'fighter-jet'),
(57, 'film'),
(58, 'filter'),
(59, 'fire'),
(60, 'fire-extinguisher'),
(61, 'flag'),
(62, 'flash'),
(63, 'flask'),
(64, 'folder'),
(65, 'futbol-o'),
(66, 'gamepad'),
(67, 'gavel'),
(68, 'gears'),
(69, 'gift'),
(70, 'glass'),
(71, 'globe'),
(72, 'graduation-cap'),
(73, 'group'),
(74, 'handpointer-o'),
(75, 'hdd-o'),
(76, 'headphones'),
(77, 'heart'),
(78, 'home'),
(79, 'hotel'),
(80, 'hourglass'),
(81, 'image'),
(82, 'inbox'),
(83, 'info'),
(84, 'institution'),
(85, 'key'),
(86, 'keyboard-0'),
(87, 'laptop'),
(88, 'leaf'),
(89, 'legal'),
(90, 'lightbulb-o'),
(91, 'location-arrow'),
(92, 'lock'),
(93, 'male'),
(94, 'map-marker'),
(95, 'microphone'),
(96, 'mobile'),
(97, 'money'),
(98, 'moon-o'),
(99, 'motocycle'),
(100, 'music'),
(101, 'newspaper-o'),
(102, 'paint-brush'),
(103, 'pencil'),
(104, 'phone'),
(105, 'photo'),
(106, 'pie-chart'),
(107, 'plane'),
(108, 'plug'),
(109, 'plus'),
(110, 'power-off'),
(111, 'print'),
(112, 'question'),
(113, 'recycle'),
(114, 'refresh'),
(115, 'registered'),
(116, 'remove'),
(117, 'retweet'),
(118, 'road'),
(119, 'rocket'),
(120, 'search'),
(121, 'server'),
(122, 'shield'),
(123, 'ship'),
(124, 'shopping-cart'),
(125, 'signal'),
(126, 'spoon'),
(127, 'medkit'),
(128, 'star'),
(129, 'suitcase'),
(130, 'tablet'),
(131, 'tag'),
(132, 'taxi'),
(133, 'ticket'),
(134, 'trademark'),
(135, 'trash'),
(136, 'tree'),
(137, 'trophy'),
(138, 'truck'),
(139, 'umbrella'),
(140, 'university'),
(141, 'upload'),
(142, 'user'),
(143, 'video-camera'),
(144, 'volume-up'),
(145, 'wheelchair'),
(146, 'wifi'),
(147, 'ambulance'),
(148, 'train'),
(149, 'file'),
(150, 'cc-visa'),
(151, 'paypal'),
(152, 'dollar'),
(153, 'euro'),
(154, 'gbp'),
(155, 'floppy'),
(156, 'andriod'),
(157, 'apple'),
(158, 'facebook'),
(159, 'google'),
(160, 'instagram'),
(161, 'windows'),
(162, 'youtube'),
(163, 'soundcloud'),
(164, 'skype'),
(165, 'cc-mastercard');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cats`
--

CREATE TABLE IF NOT EXISTS `sub_cats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `cat_id` int(10) unsigned NOT NULL,
  `image_class` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `sub_cats`
--

INSERT INTO `sub_cats` (`id`, `name`, `cat_id`, `image_class`) VALUES
(23, 'creativity', 9, 'paint-brush'),
(25, 'men''s wear', 1, 'male'),
(26, 'women''s wear', 1, 'female'),
(27, 'bookings', 6, 'book'),
(28, 'cheap rooms', 6, 'home'),
(29, 'pubs', 8, 'home'),
(30, 'clubs', 8, 'home'),
(31, 'sodium', 12, 'question'),
(32, 'great', 9, 'question'),
(44, 'spoons', 33, 'spoon'),
(45, 'table', 33, 'spoon'),
(46, 'tee', 33, 'spoon'),
(47, 'spoon', 33, 'spoon'),
(48, 'benz factories', 11, 'car'),
(49, 'volkswagon', 11, 'car'),
(59, 'car dealers', 10, 'car'),
(60, 'car wash', 10, 'car'),
(61, 'mini mart', 10, 'edit'),
(62, 'mamaput', 4, 'spoon'),
(63, 'African dish', 4, 'spoon'),
(64, 'accounting', 34, 'money'),
(65, 'loans', 34, 'money'),
(66, 'mortgage', 34, 'money'),
(67, 'cake services', 36, 'birthday-cake'),
(68, 'events food rental', 36, 'spoon'),
(69, 'baking experts', 36, 'birthday-cake'),
(70, 'Benz mechanic', 37, 'car'),
(71, 'Peaugeut mechanic', 37, 'car'),
(72, 'Jeep mechanic', 37, 'car'),
(73, 'Toyota Mechanic', 37, 'car'),
(74, 'Honda Mechanic', 37, 'car'),
(75, 'Mitsubushi mechanic', 37, 'car'),
(76, 'Kia Mechanic', 37, 'car'),
(77, 'Volkswagon mechanic', 37, 'car'),
(78, 'BMW mechanic', 37, 'car'),
(80, 'clearing', 38, ''),
(81, 'clearing and forwarding', 38, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `confirmation_code`, `confirmed`, `admin`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, '', 'samizares1', 'samizares@hotmail.com', '$2y$10$wKoP0dgXzogJOLwOiq4YXeJuHZ2Cf3zM8xp3DCulbLNz8QI7Z47NS', '', 1, 0, 'N2lJ1zkKlm6uBodcoJevPyY8zTlccfbQPciwU1abYGD3cmTqtkyqw8kzgM7k', '2015-08-04 10:37:00', '2015-08-13 05:13:53', NULL),
(10, '', 'sammylee', 'samizares@gmail.com', '$2y$10$wbNf3Oo3Om9RflheTdLpKeZjo5BZPxnOirE5qpbelwGP0jbQZbvDK', '', 1, 0, NULL, '2015-08-13 05:15:24', '2015-08-13 05:16:30', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`id`) REFERENCES `states` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
