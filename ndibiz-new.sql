-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2015 at 10:36 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

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
(19, '34,Toyin street', 31, 25, 22),
(20, '23, shangisha, off Association Avenue', 1, 25, 23),
(21, '23, spare parts road,Spare parts market', 84, 25, 24),
(22, '47,total crescent, off Abulegba street', 94, 25, 25),
(26, '32,Abraham Adosanya crescent, Off Mutiu Lawal Road.', 28, 25, 29);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Dumping data for table `biz`
--

INSERT INTO `biz` (`id`, `name`, `contactname`, `email`, `website`, `phone1`, `phone2`, `created_at`, `updated_at`, `user_id`, `rating_cache`, `rating_count`, `slug`, `featured`) VALUES
(1, 'samizares cab service', 'sammyoryor', 'samizares@gmail.com', 'http://www.samizarescab.com', 2147483647, 2147483647, '2015-08-12 21:17:40', '2015-08-27 17:36:11', 7, 3, 0, '', 'YES'),
(3, 'coded Night club', 'Great sammy', 'samizares@yahoo.com', 'http://www.codednightclub.com', 2147483647, 2147483647, '2015-08-12 21:34:57', '2015-08-12 21:34:57', 7, 3, 0, '', 'NO'),
(8, 'Bella''s place', 'Annabell', 'infobella@msn.com', 'http://bellasplace.com', 2147483647, 2147483647, '2015-08-24 11:06:04', '2015-08-24 11:06:04', 7, 3, 0, '', 'NO'),
(9, 'Zares Mealsss', 'Mr Piro', 'info@zares.com', 'http://www.zaresmeals.com', 2147483647, 2147483647, '2015-08-24 13:09:21', '2015-09-28 21:09:08', 7, 3, 0, '', 'YES'),
(11, 'Sammy''s Bank', 'Zares', 'samizares@bank.com', 'http://www.sammysbank.com', 909837637, 2147483647, '2015-08-24 22:00:54', '2015-09-05 12:30:38', 7, 3, 0, '', 'YES'),
(12, 'shanshan cars', 'Mr Phil', 'info@shahshan.com', 'http://www.shanshan.com', 2147483647, 2147483647, '2015-08-25 20:04:54', '2015-09-05 12:03:55', 7, 3, 0, '', 'YES'),
(15, 'Twilight Services', 'Gentle jack', 'info@twillight.com', 'http://www.twilightservices.com', 2147483647, 2147483647, '2015-08-25 21:50:11', '2015-09-24 11:12:35', 7, 3, 0, '', 'YES'),
(16, 'Angry birds', 'Angry man', 'info@angry.com', 'http://angrybirds.com', 9984003, 9489454, '2015-08-25 21:56:13', '2015-08-27 10:46:13', 7, 3, 0, '', 'YES'),
(17, 'Franks home', 'Frank Spiff', 'info@frank.com', 'http://frankshome.com', 2147483647, 2147483647, '2015-08-25 22:06:40', '2015-08-27 12:55:09', 7, 3, 0, '', 'YES'),
(18, 'Janes Super stores', 'Mrs Jane Foster', 'info@jane.com', 'http://janestores.com', 90434850, 94853324, '2015-08-27 17:17:17', '2015-08-27 17:17:17', 7, 3, 0, '', 'NO'),
(19, 'Meegan Exotic cars', 'Mr Meegan Renault', 'info@meegan.com', 'http://meegancars.com', 2147483647, 2147483647, '2015-08-27 17:20:12', '2015-09-05 12:06:56', 7, 3, 0, '', 'YES'),
(20, 'Mo''s Cathering services', 'Mrs Modukpe Uyi', 'info@mocat.com', 'http://mocathering.com', 909876789, 989049857, '2015-08-27 17:34:07', '2015-09-05 21:34:52', 7, 3, 0, '', 'YES'),
(21, 'Fred engines', 'Mr Fred Perry', 'info@fredengines.com', 'http://fredengines.com', 980989485, 890458593, '2015-08-27 17:44:47', '2015-09-24 11:13:25', 7, 3, 0, '', 'YES'),
(22, 'New Bank Biz', 'Gbenga Daniels', 'info@newbank.com', 'http://www.newbank.com', 2147483647, 2147483647, '2015-08-31 23:10:01', '2015-09-24 11:13:16', 7, 3, 0, '', 'YES'),
(23, 'Annabell''s Conglomerate', 'Ann Bella', 'info@anncong.com', 'http://www.annabellsconglomerate.com', 2147483647, 2147483647, '2015-09-11 03:08:21', '2015-09-11 03:08:21', 7, 3, 0, '', 'NO'),
(24, 'Alade''s Auto Empire', 'Alade Bj', 'info@alade.com', 'http://aladeauto.com', 2147483647, 2147483647, '2015-09-11 03:14:41', '2015-09-11 03:14:41', 7, 3, 0, '', 'NO'),
(25, 'Sammy1 testing bizzz', 'Sammy Estrada', 'info@sammytesting.com', 'http://sammytestingone.com', 2147483647, 2147483647, '2015-09-25 14:27:05', '2015-09-25 14:44:40', 7, 3, 0, '', 'NO'),
(29, 'Alagbon Shopping Complex ', 'Mr Desmond Tutu', 'info@alagbon.com', 'http://Alagbonshopping.com', 2147483647, 2147483647, '2015-09-28 06:16:25', '2015-09-28 06:16:25', 7, 3, 0, '', 'NO');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

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
(17, 22, 34),
(18, 23, 37),
(19, 23, 10),
(20, 24, 10),
(21, 24, 11),
(24, 25, 43),
(25, 25, 44),
(30, 29, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

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
(22, 65, 22),
(23, 70, 23),
(24, 73, 23),
(25, 59, 23),
(26, 59, 24),
(27, 61, 24),
(28, 48, 24),
(32, 93, 25),
(33, 94, 25),
(34, 95, 25),
(35, 96, 25),
(36, 97, 25),
(45, 113, 29),
(46, 114, 29);

-- --------------------------------------------------------

--
-- Table structure for table `business_hours`
--

CREATE TABLE IF NOT EXISTS `business_hours` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `day` varchar(3) NOT NULL,
  `open_time` decimal(4,2) NOT NULL,
  `close_time` decimal(4,2) NOT NULL,
  `biz_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `business_hours`
--

INSERT INTO `business_hours` (`id`, `day`, `open_time`, `close_time`, `biz_id`, `created_at`, `updated_at`) VALUES
(1, 'MON', '8.00', '5.00', 1, '2015-09-29 06:32:45', '2015-09-29 06:32:45'),
(2, 'TUE', '8.00', '6.00', 1, '2015-09-29 06:32:45', '2015-09-29 06:32:45'),
(3, 'WED', '9.00', '5.00', 1, '2015-09-29 06:43:26', '2015-09-29 06:43:26'),
(4, 'THU', '8.00', '4.30', 1, '2015-09-29 06:43:26', '2015-09-29 06:43:26'),
(5, 'FRI', '9.00', '5.00', 1, '2015-09-29 06:43:26', '2015-09-29 06:43:26'),
(6, 'SAT', '9.00', '6.00', 1, '2015-09-29 06:43:26', '2015-09-29 06:43:26'),
(7, 'SUN', '10.00', '4.00', 1, '2015-09-29 06:43:26', '2015-09-29 06:43:26');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `name`, `image_class`, `meta_description`) VALUES
(2, 'Shopping', 'bicycle', ''),
(3, 'Sports & Leisure', 'futbol-o', 'Get all businesses in the Sports and Leisure category'),
(4, 'Restaurants', 'spoon', 'Great African cuisines'),
(5, 'Transportation', 'taxi', 'Bus transportation'),
(9, 'Arts And Entertainment', 'glass', 'Here this is it, use it oh,,'),
(10, 'cars', 'car', 'Automobiles'),
(11, 'Cars and factories', 'bus', 'Does this really exist'),
(12, 'Magnet producers', 'book', 'wow,,this is cool'),
(33, 'home furniture', 'home', 'home utencils here'),
(36, 'Cathering Services', 'spoon', 'Ndibiz stock all kinds of Cathering Services'),
(38, 'Shipping Services', 'ship', 'Get the trusted contacts of your trusted Shipping companies'),
(40, 'Education', 'briefcase', 'Check out all the businesses in our Education categories'),
(41, 'Electronics', 'television', 'Check out all the businesses in our Electronics category'),
(43, 'Bars', 'glass', 'Check out the businesses in these categories'),
(44, 'Banking and Finance', 'money', 'Get all the businesses in our Banking and Finance categories');

-- --------------------------------------------------------

--
-- Table structure for table `lgas`
--

CREATE TABLE IF NOT EXISTS `lgas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `state_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

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
(98, 'Bariga', 25),
(111, 'state11', 39),
(112, 'state22', 39),
(113, 'state33', 39),
(118, 'plateau3', 32),
(119, 'plateau4', 32);

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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('samizares@gmail.com', '420ba10abd74442a914b10b2def0c1821f4b0ed938a220226167e373ef58911d', '2015-10-07 13:21:31');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

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
(37, 'Zamfara'),
(39, 'newState2');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=118 ;

--
-- Dumping data for table `sub_cats`
--

INSERT INTO `sub_cats` (`id`, `name`, `cat_id`, `image_class`) VALUES
(31, 'sodium', 12, 'question'),
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
(67, 'cake services', 36, 'birthday-cake'),
(68, 'events food rental', 36, 'spoon'),
(69, 'baking experts', 36, 'birthday-cake'),
(80, 'clearing', 38, ''),
(81, 'clearing and forwarding', 38, ''),
(82, 'web programming', 40, ''),
(83, 'Networking', 40, ''),
(84, 'computer hardware', 40, ''),
(85, 'Televison', 41, ''),
(86, 'Home theatre', 41, ''),
(87, 'DVD', 41, ''),
(93, 'pubs', 43, ''),
(94, 'clubs', 43, ''),
(95, 'Nightlife', 43, ''),
(96, 'Loans', 44, ''),
(97, 'mortagage', 44, ''),
(107, 'colours', 9, ''),
(108, 'creativity', 9, ''),
(109, 'great', 9, ''),
(110, 'new', 9, ''),
(111, 'wiser', 9, ''),
(112, 'newer', 9, ''),
(113, 'great clothes', 2, ''),
(114, 'fashinable items', 2, ''),
(115, 'gym', 3, ''),
(116, 'gym equipment', 3, ''),
(117, 'body building', 3, '');

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
  `notify` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `confirmation_code`, `confirmed`, `admin`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `notify`) VALUES
(7, '', 'samizares1', 'samizares@hotmail.com', '$2y$10$wKoP0dgXzogJOLwOiq4YXeJuHZ2Cf3zM8xp3DCulbLNz8QI7Z47NS', '', 1, 0, 'dyOemaRRxEO1yzQGVlP7dLRGm2TxT2N3bABgjdtYmMORH9IpiyWsNstUhhw1', '2015-08-04 10:37:00', '2015-10-07 13:18:58', NULL, 1),
(10, '', 'sammylee', 'samizares@gmail.com', '$2y$10$wbNf3Oo3Om9RflheTdLpKeZjo5BZPxnOirE5qpbelwGP0jbQZbvDK', '', 1, 1, 'qUU3hhY94OgEmiiUXiyFO6bf8D6tCc1WaBNblow7X6J1pFzoaJ2FZ1vAvHwy', '2015-08-13 05:15:24', '2015-10-07 18:21:17', NULL, 1);

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
