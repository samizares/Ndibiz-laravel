-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2015 at 03:42 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `street`, `lga_id`, `state_id`, `biz_id`) VALUES
(1, '5,omonile street, off shangisha', 2, 25, 1),
(2, '10,uyi street,off Ikorodu street', 4, 25, 3),
(6, '10,omonile street off shangisha', 2, 25, 8),
(7, '34,notorious street', 1, 25, 9),
(9, '67,federal housing mile 2', 3, 25, 11);

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `businessprofile_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `biz`
--

INSERT INTO `biz` (`id`, `name`, `contactname`, `email`, `website`, `phone1`, `phone2`, `created_at`, `updated_at`, `user_id`, `rating_cache`, `rating_count`, `slug`) VALUES
(1, 'samizares cab service', 'sammyoryor', 'samizares@gmail.com', 'http://www.samizarescab.com', 2147483647, 2147483647, '2015-08-12 21:17:40', '2015-08-25 00:00:24', 7, 3, 0, ''),
(3, 'coded Night club', 'Great sammy', 'samizares@yahoo.com', 'http://www.codednightclub.com', 2147483647, 2147483647, '2015-08-12 21:34:57', '2015-08-12 21:34:57', 7, 3, 0, ''),
(8, 'Bella''s place', 'Annabell', 'infobella@msn.com', 'http://bellasplace.com', 2147483647, 2147483647, '2015-08-24 11:06:04', '2015-08-24 11:06:04', 7, 3, 0, ''),
(9, 'Zares Mealss', 'Mr Piro', 'info@zares.com', 'http://www.zaresmeals.com', 2147483647, 2147483647, '2015-08-24 13:09:21', '2015-08-25 00:07:28', 7, 3, 0, ''),
(11, 'Sammy''s Bank', 'Zares', 'samizares@bank.com', 'http://www.sammysbank.com', 909837637, 2147483647, '2015-08-24 22:00:54', '2015-08-24 22:00:54', 7, 3, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `biz_cat_pivot`
--

CREATE TABLE IF NOT EXISTS `biz_cat_pivot` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `biz_id` int(10) unsigned NOT NULL,
  `cat_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cat_id` (`cat_id`),
  KEY `biz_id` (`biz_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `biz_cat_pivot`
--

INSERT INTO `biz_cat_pivot` (`id`, `biz_id`, `cat_id`) VALUES
(2, 3, 8),
(3, 8, 1),
(4, 9, 4),
(6, 11, 34),
(7, 1, 10);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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
(11, 30, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

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
(9, 'Arts And Entertainment', 'university', 'Here this is it'),
(10, 'cars', 'car', 'Automobiles'),
(11, 'Cars and factories', 'bus', 'Does this really exist'),
(12, 'Magnet producers', 'book', 'wow,,this is cool'),
(33, 'home furniture', 'home', 'home utencils here'),
(34, 'Banking and Finance', 'money', 'Contact the closest bank to you');

-- --------------------------------------------------------

--
-- Table structure for table `lgas`
--

CREATE TABLE IF NOT EXISTS `lgas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `state_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

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
(27, 'Kwali', 2);

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
-- Table structure for table `sub_cats`
--

CREATE TABLE IF NOT EXISTS `sub_cats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `cat_id` int(10) unsigned NOT NULL,
  `image_class` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `sub_cats`
--

INSERT INTO `sub_cats` (`id`, `name`, `cat_id`, `image_class`) VALUES
(23, 'creativity', 9, ''),
(25, 'men''s wear', 1, 'male'),
(26, 'women''s wear', 1, 'female'),
(27, 'bookings', 6, ''),
(28, 'cheap rooms', 6, ''),
(29, 'pubs', 8, ''),
(30, 'clubs', 8, ''),
(31, 'sodium', 12, ''),
(32, 'great', 9, ''),
(44, 'spoons', 33, ''),
(45, 'table', 33, ''),
(46, 'tee', 33, ''),
(47, 'spoon', 33, ''),
(48, 'benz factories', 11, ''),
(49, 'volkswagon', 11, ''),
(59, 'car dealers', 10, ''),
(60, 'car wash', 10, ''),
(61, 'mini mart', 10, ''),
(62, 'mamaput', 4, ''),
(63, 'African dish', 4, ''),
(64, 'accounting', 34, ''),
(65, 'loans', 34, ''),
(66, 'mortgage', 34, '');

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
