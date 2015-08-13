-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2015 at 06:37 PM
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
-- Table structure for table `biz`
--

CREATE TABLE IF NOT EXISTS `biz` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `contactname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone1` int(11) DEFAULT NULL,
  `phone2` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(10) unsigned NOT NULL,
  `address2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_id` int(10) unsigned NOT NULL,
  `cat_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `businessprofile_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `biz`
--

INSERT INTO `biz` (`id`, `name`, `address`, `contactname`, `email`, `website`, `phone1`, `phone2`, `created_at`, `updated_at`, `user_id`, `address2`, `state_id`, `cat_id`) VALUES
(1, 'samizares cab service', '5, fisher street, off shangisha road,,', 'sammy', 'samizares@gmail.com', 'http://www.samizarescab.com', 2147483647, 2147483647, '2015-08-12 21:17:40', '2015-08-12 21:17:40', 7, '', 25, 5),
(3, 'coded Night club', '34,Etim Inyang crescent, Victoria Island', 'Great sammy', 'samizares@yahoo.com', 'http://www.codednightclub.com', 2147483647, 2147483647, '2015-08-12 21:34:57', '2015-08-12 21:34:57', 7, '', 25, 8);

-- --------------------------------------------------------

--
-- Table structure for table `biz_cat_pivot`
--

CREATE TABLE IF NOT EXISTS `biz_cat_pivot` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `biz_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `name`, `image_class`, `meta_description`) VALUES
(1, 'Fashion', 'female', 'Classical clothes'),
(2, 'Shopping', 'bicycle', NULL),
(3, 'Sports & Leisure', 'futbol-o', NULL),
(4, 'Restaurants', 'spoon', 'cutlery'),
(5, 'Transportation', 'taxi', 'Bus transportation'),
(6, 'Hotel & Travels', 'institution', 'Get the cheapest hotel rooms here'),
(8, 'Bars', 'glass', 'Nightlife'),
(9, 'Arts And Entertainment', 'university', 'Here this is it'),
(10, 'cars', 'car', 'Automobiles'),
(11, 'Cars and factories', 'bus', 'Does this really exist'),
(12, 'Magnet producers', 'book', 'wow,,this is cool'),
(33, 'home furniture', 'home', 'home utencils here');

-- --------------------------------------------------------

--
-- Table structure for table `lgas`
--

CREATE TABLE IF NOT EXISTS `lgas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `area` varchar(150) NOT NULL,
  `state_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `area` (`area`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lgas`
--

INSERT INTO `lgas` (`id`, `name`, `area`, `state_id`) VALUES
(1, 'Kosofo', 'kosofo1', 25),
(2, 'Ikorodu', 'Ikorodu main-axis', 25),
(3, 'Agege', 'agege ibare', 25),
(4, 'Alimosho', 'volks', 25);

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
  `cats_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `sub_cats`
--

INSERT INTO `sub_cats` (`id`, `name`, `cats_id`) VALUES
(23, 'creativity', 9),
(25, 'men''s wear', 1),
(26, 'women''s wear', 1),
(27, 'bookings', 6),
(28, 'cheap rooms', 6),
(29, 'pubs', 8),
(30, 'clubs', 8),
(31, 'sodium', 12),
(32, 'great', 9),
(44, 'spoons', 33),
(45, 'table', 33),
(46, 'tee', 33),
(47, 'spoon', 33),
(48, 'benz factories', 11),
(49, 'volkswagon', 11),
(59, 'car dealers', 10),
(60, 'car wash', 10),
(61, 'mini mart', 10);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
