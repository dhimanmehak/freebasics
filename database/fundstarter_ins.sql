-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2015 at 10:31 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fundstarter_ins`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `admintype` enum('super','sub') NOT NULL,
  `previleges` mediumtext NOT NULL,
  `lastlogindate` datetime NOT NULL,
  `lastlogoutdate` datetime NOT NULL,
  `lastloginip` varchar(16) NOT NULL,
  `isverified` tinyint(4) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `createdon` date NOT NULL,
  `modifiedon` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `address`, `contact`, `admintype`, `previleges`, `lastlogindate`, `lastlogoutdate`, `lastloginip`, `isverified`, `status`, `createdon`, `modifiedon`) VALUES
(1, 'admin', 'admin@casperon.in', '$2y$10$NDiJHD5llUlnUivCLDlxfenLjMMfrAC4iQl1rxTJAgpr0NGJ2rSMC', 'test', '0', 'super', 'all', '2015-11-26 08:05:50', '2015-07-23 13:12:29', '192.168.1.50', 1, 'active', '2015-03-04', '2015-08-14'),
(2, 'test', 'subadmin@gmail.com', '$2y$10$39m4KY2Qpmac.dY6JqqcI.rNGN77Q4u2wD8YQwSVq9ty8slYzIwxi', 'No:7, pillayar street,\r\nchennai', '9789570062', 'sub', 'all', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 'inactive', '2015-07-27', '2015-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `adminsettings`
--

CREATE TABLE IF NOT EXISTS `adminsettings` (
`id` int(11) NOT NULL,
  `adminname` varchar(125) NOT NULL,
  `adminemail` varchar(125) NOT NULL,
  `dropboxemail` varchar(255) NOT NULL,
  `dropboxpassword` varchar(255) NOT NULL,
  `contactmail` varchar(255) NOT NULL,
  `contactnumber` int(11) NOT NULL,
  `sitetitle` varchar(255) NOT NULL,
  `paginationlimit` int(45) NOT NULL,
  `googleverification` varchar(45) NOT NULL,
  `googleanalyticscode` mediumtext NOT NULL,
  `facebooklink` varchar(100) NOT NULL,
  `twitterlink` varchar(100) NOT NULL,
  `pinterestlink` varchar(100) NOT NULL,
  `googlepluslink` varchar(100) NOT NULL,
  `linkedinlink` varchar(100) NOT NULL,
  `rsslink` varchar(100) NOT NULL,
  `youtubelink` varchar(100) NOT NULL,
  `footerlogo` varchar(255) NOT NULL,
  `footercontent` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `metatitle` varchar(100) NOT NULL,
  `metakeyword` varchar(100) NOT NULL,
  `metadescription` mediumtext NOT NULL,
  `favicon` varchar(125) NOT NULL,
  `watermark` varchar(125) NOT NULL,
  `facebookapi` varchar(125) NOT NULL,
  `facebooksecretkey` varchar(125) NOT NULL,
  `facebookaccesstoken` varchar(255) NOT NULL,
  `paypalmode` varchar(125) NOT NULL,
  `paypalapiname` varchar(55) NOT NULL,
  `paypalapipwd` varchar(125) NOT NULL,
  `paypalapikey` varchar(255) NOT NULL,
  `paypalid` varchar(150) NOT NULL,
  `paypallive` varchar(255) NOT NULL,
  `paypalclientid` varchar(255) NOT NULL,
  `paypalsecret` varchar(255) NOT NULL,
  `language` varchar(45) NOT NULL,
  `currency` varchar(45) NOT NULL,
  `listingfee` float(10,2) NOT NULL,
  `smtphost` varchar(125) NOT NULL,
  `smtpport` int(11) NOT NULL,
  `smtpusername` varchar(55) NOT NULL,
  `smtppassword` varchar(255) NOT NULL,
  `consumerkey` varchar(255) NOT NULL,
  `consumersecret` varchar(125) NOT NULL,
  `accesstoken` varchar(255) NOT NULL,
  `accesstokensecret` varchar(255) NOT NULL,
  `googleclientsecret` varchar(125) NOT NULL,
  `googleclientid` varchar(150) NOT NULL,
  `googleredirecturl` varchar(255) NOT NULL,
  `googledeveloperkey` varchar(255) NOT NULL,
  `facebookappid` varchar(150) NOT NULL,
  `liketext` mediumtext NOT NULL,
  `unliketext` mediumtext NOT NULL,
  `bannertext` mediumtext NOT NULL,
  `twilioaccountid` varchar(150) NOT NULL,
  `twilioaccounttoken` varchar(125) NOT NULL,
  `twiliophonenumber` int(11) NOT NULL,
  `googlemapapi` varchar(125) NOT NULL,
  `hometitle1` varchar(45) NOT NULL,
  `hometitle2` varchar(45) NOT NULL,
  `admincommission` float(10,2) NOT NULL,
  `affcommissiontype` varchar(125) NOT NULL,
  `affiliatecommission` float(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminsettings`
--

INSERT INTO `adminsettings` (`id`, `adminname`, `adminemail`, `dropboxemail`, `dropboxpassword`, `contactmail`, `contactnumber`, `sitetitle`, `paginationlimit`, `googleverification`, `googleanalyticscode`, `facebooklink`, `twitterlink`, `pinterestlink`, `googlepluslink`, `linkedinlink`, `rsslink`, `youtubelink`, `footerlogo`, `footercontent`, `logo`, `metatitle`, `metakeyword`, `metadescription`, `favicon`, `watermark`, `facebookapi`, `facebooksecretkey`, `facebookaccesstoken`, `paypalmode`, `paypalapiname`, `paypalapipwd`, `paypalapikey`, `paypalid`, `paypallive`, `paypalclientid`, `paypalsecret`, `language`, `currency`, `listingfee`, `smtphost`, `smtpport`, `smtpusername`, `smtppassword`, `consumerkey`, `consumersecret`, `accesstoken`, `accesstokensecret`, `googleclientsecret`, `googleclientid`, `googleredirecturl`, `googledeveloperkey`, `facebookappid`, `liketext`, `unliketext`, `bannertext`, `twilioaccountid`, `twilioaccounttoken`, `twiliophonenumber`, `googlemapapi`, `hometitle1`, `hometitle2`, `admincommission`, `affcommissiontype`, `affiliatecommission`) VALUES
(2, 'Administrator', 'admin@casperon.in', '', '', 'vinothini@casperon.in', 984561237, 'Fundstarter', 20, 'drt546erte5edr', '<script type="text/javascript">\r\n var googleanalyticscode;\r\n</script>', 'www.facebook.com/kickstarter', 'www.twitter.com/kickstarter', 'www.pinterest.com/kickstarter', 'plus.google.com/kickstarter', '', '', 'www.youtube.com/kickstarter', 'uploads/images/footerlogo.png', 'Â© 2015 Fundstarter, Inc.', 'uploads/images/logo.png', 'Kickstarter clone', 'post and back projects', 'post ur projects and earn money', 'uploads/images/favicon.ico', 'uploads/images/watermark.jpg', '', 'ab047a5308477527f248b287514ad68b', '', 'sandbox', 'admin_api1.casperon.in', 'UFDKCLX7VHNALYVF', 'AFcWxV21C7fd0v3bYYYRCpSSRl31Awzkb9OTqj.wTHEs5P1eM5wgk3zh', 'APP-80W284485P519543T', '', 'Afb3OmYnnxfMBXzaiXwc9uDbMKdI3OKIjKywOk12K7vpAWB_bBggaok2lR0sY0KJte6CAIaVdv1rvZy0', 'ECQNfI-M6uF440NS6bwRGsjh_MSQAhcwJxHPDI5hT_q1ExJn9kzR6nLgXtfvhKgSklQ_EQseeUvD8An8', 'en', 'USD', 0.00, 'smtp.gmail.com', 587, 'vinothini', '111', 'gn24Z1tEJEU8Y8Iw6hZZ0mcIt', 'OUoe2QsNKLCoe6UP7lqPCYT2PfcLuxO3OGRG94nPeoF4TJ7BCf', '2258770255-NWmZl1Zm4YwLjQORvSvLTutjvkQweNuXxRTJPXi', 'E7GEuDuLinrE9RJXkVfHiPAwKootTsAuQ6sxtem0qlNHa', '2312q4r3rw54w4', 'AC86dee6bbb798', 'www.google.com', 'AC86dee6bbb798dfa194415808420c6518', '441566379364333', '', '', 'Post and back projects..', 'AC86dee6bbb798dfa194415808420c6518', '0a4495ba71d620a5981f0527743e5de4', 2147483647, 'AIzaSyC5YIg8-Yk_zqjzWpFyZrgYuzzjTCBJV7k', 'Fundstarter', '', 10.00, 'flat', 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `backings`
--

CREATE TABLE IF NOT EXISTS `backings` (
`id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `pledgeamount` int(11) NOT NULL,
  `projectid` int(45) NOT NULL,
  `rewardid` int(11) NOT NULL,
  `categoryid` int(45) NOT NULL,
  `cardname` varchar(100) NOT NULL,
  `cardnumber` bigint(125) DEFAULT NULL,
  `expirydate` varchar(125) NOT NULL,
  `cvv` int(11) NOT NULL,
  `isremember` tinyint(4) NOT NULL,
  `billingaddress1` varchar(255) NOT NULL,
  `billingaddress2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postalcode` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdon` date NOT NULL,
  `stripecustomerid` varchar(255) NOT NULL,
  `stripetoken` varchar(255) NOT NULL,
  `stripechargeid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `categoryname` varchar(100) NOT NULL,
  `metatitle` varchar(255) NOT NULL,
  `metakeyword` mediumtext NOT NULL,
  `metadescription` mediumtext NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `createdon` date NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryname`, `metatitle`, `metakeyword`, `metadescription`, `status`, `createdon`, `deleted_at`) VALUES
(1, 'Sample', 'sample', 'sample', 'sample', 'active', '2015-07-25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
`id` int(11) NOT NULL,
  `stateid` int(11) NOT NULL,
  `cityname` varchar(65) NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(45) NOT NULL,
  `projectid` int(45) NOT NULL,
  `userid` int(45) NOT NULL,
  `comment` mediumtext NOT NULL,
  `postedon` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `projectid`, `userid`, `comment`, `postedon`) VALUES
(1, 1, 1, 'test', '2015-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
`id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
`id` int(255) NOT NULL,
  `countryid` varchar(255) NOT NULL,
  `countrycode` varchar(2) DEFAULT NULL,
  `countrymobilecode` varchar(200) NOT NULL,
  `countryname` varchar(255) DEFAULT NULL,
  `currencytype` char(3) NOT NULL,
  `currencysymbol` text NOT NULL,
  `paypalsupport` tinyint(4) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `defaultcurrency` enum('No','Yes') NOT NULL DEFAULT 'No'
) ENGINE=MyISAM AUTO_INCREMENT=231 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryid`, `countrycode`, `countrymobilecode`, `countryname`, `currencytype`, `currencysymbol`, `paypalsupport`, `status`, `createdon`, `defaultcurrency`) VALUES
(1, 'EU', 'AD', '+376', 'Andorra', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(2, 'AS', 'AE', '+971', 'United Arab Emirates', 'AED', '$', 0, 'active', '2014-12-12 21:00:58', 'No'),
(3, 'AS', 'AF', '+93 ', 'Afghanistan', 'AFN', '0', 0, 'active', '2014-12-12 21:02:49', 'No'),
(4, 'NA', 'AG', '+268', 'Antigua And Barbuda', 'XCD', '$', 0, 'active', '2014-12-12 21:04:56', 'No'),
(5, 'EU', 'AL', '+355', 'Albania', 'ALL', 'EUR', 0, 'active', '2015-03-10 03:55:37', 'No'),
(6, 'AS', 'AM', '+374', 'Armenia', 'AMD', '', 0, 'active', '2014-12-12 21:05:30', 'No'),
(7, 'AF', 'AO', '+244', 'Angola', 'AOA', '', 0, 'active', '2014-12-12 21:05:47', 'No'),
(8, 'AN', 'AQ', '+672', 'Antarctica', 'XCD', '', 0, 'active', '2014-12-12 21:06:04', 'No'),
(9, 'SA', 'AR', '+54 ', 'Argentina', 'ARS', '', 0, 'active', '2014-12-12 21:06:52', 'No'),
(10, 'OC', 'AS', '+684', 'American Samoa', 'USD', '$', 1, 'active', '2015-05-04 01:00:14', 'No'),
(11, 'EU', 'AT', '+43', 'Austria', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(12, 'OC', 'AU', '+61', 'Australia', 'AUD', '$', 1, 'active', '2015-05-04 00:22:37', 'No'),
(13, 'NA', 'AW', '+297', 'Aruba', 'AWG', '', 0, 'active', '2014-12-12 21:08:47', 'No'),
(14, '', 'AX', '+358\n', 'Aland Islands', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'Yes'),
(15, 'AS', 'AZ', '+994', 'Azerbaijan', 'AZN', '', 0, 'active', '2014-12-12 21:10:43', 'No'),
(16, '', 'BA', '+387', 'Bosnia And Herzegovina', 'BAM', '', 0, 'active', '2014-12-12 21:10:57', 'No'),
(17, 'NA', 'BB', '+246', 'Barbados', 'BBD', '', 0, 'active', '2014-12-12 21:12:49', 'No'),
(18, 'AS', 'BD', '+880', 'Bangladesh', 'BDT', '', 0, 'active', '2014-12-12 21:13:02', 'No'),
(19, 'EU', 'BE', '+32', 'Belgium', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(20, 'AF', 'BF', '+226', 'Burkina Faso', 'XOF', '', 0, 'active', '2014-12-12 21:14:05', 'No'),
(21, 'EU', 'BG', '+359', 'Bulgaria', 'BGN', '', 0, 'active', '2014-12-12 21:14:27', 'No'),
(22, 'AS', 'BH', '+973', 'Bahrain', 'BHD', '', 0, 'active', '2014-12-12 21:14:48', 'No'),
(23, 'AF', 'BI', '+257', 'Burundi', 'BIF', '', 0, 'active', '2014-12-12 21:15:04', 'No'),
(24, 'AF', 'BJ', '+229 ', 'Benin', 'XOF', '', 0, 'active', '2014-12-12 21:15:36', 'No'),
(25, 'NA', 'BM', '+1441', 'Bermuda', 'BMD', '', 0, 'active', '2014-12-12 21:16:42', 'No'),
(26, '', 'BN', '+673', 'Brunei', 'BND', '', 0, 'active', '2014-12-12 21:16:54', 'No'),
(27, 'SA', 'BO', '+591', 'Bolivia', 'BOB', '', 0, 'active', '2014-12-12 21:17:16', 'No'),
(28, '', 'BQ', '+599', 'Bonaire, Saint Eustatius And Saba ', 'USD', '$', 1, 'active', '2015-05-04 01:00:17', 'No'),
(29, 'SA', 'BR', '+55', 'Brazil', 'BRL', '$', 1, 'active', '2015-05-04 00:25:02', 'No'),
(30, 'NA', 'BS', '+242', 'Bahamas', 'BSD', '', 0, 'active', '2014-12-12 21:18:46', 'No'),
(31, 'AS', 'BT', '+975', 'Bhutan', 'BTN', '', 0, 'active', '2014-12-12 21:19:06', 'No'),
(32, 'AN', 'BV', '+47	', 'Bouvet Island', 'NOK', 'kr', 1, 'active', '2015-05-04 01:13:16', 'No'),
(33, 'AF', 'BW', '+267', 'Botswana', 'BWP', '', 0, 'active', '2014-12-12 21:21:06', 'No'),
(34, 'EU', 'BY', '+375', 'Belarus', 'BYR', '', 0, 'active', '2014-12-12 21:21:20', 'No'),
(35, 'NA', 'BZ', '+501', 'Belize', 'BZD', '', 0, 'active', '2014-12-12 21:21:32', 'No'),
(36, 'NA', 'CA', '+1', 'Canada', 'CAD', '$', 1, 'active', '2015-05-04 00:25:14', 'No'),
(37, '', 'CD', '+243', 'Democratic Republic Of The Congo', 'DRC', '', 0, 'active', '2014-12-12 21:22:19', 'No'),
(38, 'AF', 'CF', '+236\n', 'Central African Republic', 'XAF', '', 0, 'active', '2014-12-12 21:22:31', 'No'),
(39, '', 'CG', '+ 242', 'Republic Of The Congo', 'DRC', '', 0, 'active', '2014-12-12 21:22:52', 'No'),
(40, 'EU', 'CH', '+41\n', 'Switzerland', 'CHF', 'CHF', 1, 'active', '2015-05-04 01:04:41', 'No'),
(41, '', 'CI', '+225', 'Ivory Coast', 'XOF', '', 0, 'active', '2014-12-12 21:24:59', 'No'),
(42, 'SA', 'CL', '+56\n', 'Chile', 'CLP', '', 0, 'active', '2014-12-12 21:25:34', 'No'),
(43, 'AF', 'CM', '+237', 'Cameroon', 'XAF', '', 0, 'active', '2014-12-12 21:26:12', 'No'),
(44, 'AS', 'CN', '+86', 'China', 'CNY', '', 0, 'active', '2014-12-12 21:26:32', 'No'),
(45, 'SA', 'CO', '+57', 'Colombia', 'COP', '', 0, 'active', '2014-12-12 21:26:43', 'No'),
(46, 'NA', 'CR', '+506\n', 'Costa Rica', 'CRC', '', 0, 'active', '2014-12-12 21:26:58', 'No'),
(47, 'NA', 'CU', '+53\n', 'Cuba', 'CUP', '', 0, 'active', '2014-12-12 21:27:11', 'No'),
(48, 'AF', 'CV', '+238\n', 'Cape Verde', 'CVE', '', 0, 'active', '2014-12-12 21:27:22', 'No'),
(49, 'EU', 'CY', '+357\n', 'Cyprus', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(50, 'EU', 'CZ', '+420\n', 'Czech Republic', 'CZK', 'Kc', 1, 'active', '2015-05-04 00:25:55', 'No'),
(51, 'EU', 'DE', '+49', 'Germany', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(52, 'AF', 'DJ', '+253', 'Djibouti', 'DJF', '', 0, 'active', '2014-12-12 21:28:12', 'No'),
(53, 'EU', 'DK', '+45', 'Denmark', 'DKK', 'kr', 1, 'active', '2015-05-04 00:26:38', 'No'),
(54, 'NA', 'DM', '+ 1 767', 'Dominica', 'XCD', '', 0, 'active', '2014-12-12 21:28:55', 'No'),
(55, 'NA', 'DO', '+1 809 ', 'Dominican Republic', 'DOP', '', 0, 'active', '2014-12-12 21:29:55', 'No'),
(56, 'AF', 'DZ', '+213', 'Algeria', 'DZD', '', 0, 'active', '2014-12-12 21:30:06', 'No'),
(57, 'SA', 'EC', '+593', 'Ecuador', 'ECS', '', 0, 'active', '2014-12-12 21:30:16', 'No'),
(58, 'EU', 'EE', '+372', 'Estonia', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(59, 'AF', 'EG', '+20', 'Egypt', 'EGP', '', 0, 'active', '2014-12-12 21:30:38', 'No'),
(60, 'AF', 'EH', '+212', 'Western Sahara', 'MAD', '', 0, 'active', '2014-12-12 21:31:28', 'No'),
(61, 'AF', 'ER', '+291', 'Eritrea', 'ERN', '', 0, 'active', '2014-12-12 22:15:36', 'No'),
(62, 'EU', 'ES', '+34', 'Spain', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(63, 'AF', 'ET', '+251', 'Ethiopia', 'ETB', '', 0, 'active', '2014-12-12 22:16:18', 'No'),
(64, 'EU', 'FI', '+358', 'Finland', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(65, 'OC', 'FJ', '+679', 'Fiji', 'FJD', '', 0, 'active', '2014-12-12 22:16:47', 'No'),
(66, '', 'FM', '+691', 'Micronesia', 'USD', '$', 1, 'active', '2015-05-04 01:00:23', 'No'),
(67, 'EU', 'FO', '+298', 'Faroe Islands', 'DKK', 'kr', 1, 'active', '2015-05-04 01:21:32', 'No'),
(68, 'EU', 'FR', '+33', 'France', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(69, 'AF', 'GA', '+241 ', 'Gabon', 'XAF', '', 0, 'active', '2014-12-12 22:17:49', 'No'),
(70, 'EU', 'GB', '+44', 'United Kingdom', 'USD', '$', 1, 'active', '2015-05-06 08:31:26', 'No'),
(71, 'NA', 'GD', '+1 473', 'Grenada', 'XCD', '', 0, 'active', '2014-12-12 22:18:37', 'No'),
(72, 'AS', 'GE', '+995', 'Georgia', 'GEL', '', 0, 'active', '2014-12-12 22:18:53', 'No'),
(73, 'SA', 'GF', '+594', 'French Guiana', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(74, '', 'GG', '+44', 'Guernsey', 'GGP', '', 0, 'active', '2014-12-12 22:19:48', 'No'),
(75, 'AF', 'GH', '+233', 'Ghana', 'GHS', '', 0, 'active', '2014-12-12 22:20:00', 'No'),
(76, 'NA', 'GL', '+299', 'Greenland', 'DKK', 'kr', 1, 'active', '2015-05-04 01:21:31', 'No'),
(77, 'AF', 'GM', '+220', 'Gambia', 'GMD', '', 0, 'active', '2014-12-12 22:20:24', 'No'),
(78, 'AF', 'GN', '+224 ', 'Guinea', 'GNF', '', 0, 'active', '2014-12-12 22:21:16', 'No'),
(79, 'NA', 'GP', '+590', 'Guadeloupe', 'EUD', '', 0, 'active', '2014-12-12 22:21:30', 'No'),
(80, 'AF', 'GQ', '+240', 'Equatorial Guinea', 'XAF', '', 0, 'active', '2014-12-12 22:21:43', 'No'),
(81, 'EU', 'GR', '+30', 'Greece', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(82, 'NA', 'GT', '+502', 'Guatemala', 'QTQ', '', 0, 'active', '2014-12-12 22:22:51', 'No'),
(83, 'OC', 'GU', '+1 671', 'Guam', 'USD', '$', 1, 'active', '2015-05-04 01:00:21', 'No'),
(84, 'AF', 'GW', '+245', 'Guinea-Bissau', 'GWP', '', 0, 'active', '2014-12-12 22:23:31', 'No'),
(85, 'SA', 'GY', '+592', 'Guyana', 'GYD', '', 0, 'active', '2014-12-12 22:23:51', 'No'),
(86, 'AS', 'HK', '+852', 'Hong Kong', 'HKD', '$', 1, 'active', '2015-05-04 00:28:03', 'No'),
(87, 'NA', 'HN', '+504', 'Honduras', 'HNL', '', 0, 'active', '2014-12-12 22:24:21', 'No'),
(88, 'EU', 'HR', '+385', 'Croatia', 'HRK', '', 0, 'active', '2014-12-12 22:24:35', 'No'),
(89, 'NA', 'HT', '+509', 'Haiti', 'HTG', '', 0, 'active', '2014-12-12 22:24:49', 'No'),
(90, 'EU', 'HU', '+36', 'Hungary', 'HUF', 'Ft', 1, 'active', '2015-05-04 01:17:25', 'No'),
(91, 'AS', 'ID', '+62', 'Indonesia', 'IDR', '', 0, 'active', '2014-12-12 22:25:23', 'No'),
(92, 'EU', 'IE', '+353', 'Ireland', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(93, 'AS', 'IL', '+972 ', 'Israel', 'ILS', 'â‚ª', 1, 'active', '2015-05-04 01:16:30', 'No'),
(94, '', 'IM', '+44', 'Isle Of Man', 'GBP', 'Â£', 1, 'active', '2015-05-04 01:09:37', 'No'),
(95, 'AS', 'IN', '+91', 'India', 'INR', 'Rs', 0, 'active', '2015-03-10 06:05:44', 'No'),
(96, 'AS', 'IO', '+246', 'British Indian Ocean Territory', 'USD', '$', 1, 'active', '2015-05-04 01:00:18', 'No'),
(97, 'AS', 'IQ', '+964', 'Iraq', 'IQD', '', 0, 'active', '2014-12-12 22:27:40', 'No'),
(98, '', 'IR', '+98', 'Iran', 'IRR', '', 0, 'active', '2014-12-12 22:27:52', 'No'),
(99, 'EU', 'IS', '+354', 'Iceland', 'ISK', '', 0, 'active', '2014-12-12 22:28:08', 'No'),
(100, 'EU', 'IT', '+39', 'Italy', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(101, '', 'JE', '+44 ', 'Jersey', 'GBP', 'Â£', 1, 'active', '2015-05-04 01:09:38', 'No'),
(102, 'NA', 'JM', '+1 876', 'Jamaica', 'JMD', '', 0, 'active', '2014-12-12 22:45:08', 'No'),
(103, 'AS', 'JO', '+962', 'Jordan', 'JOD', '', 0, 'active', '2014-12-12 22:45:25', 'No'),
(104, 'AS', 'JP', '+81 ', 'Japan', 'JPY', 'Â¥', 1, 'active', '2015-05-04 01:15:32', 'No'),
(105, 'AF', 'KE', '+254', 'Kenya', 'KES', '', 0, 'active', '2014-12-12 22:45:56', 'No'),
(106, 'AS', 'KG', '+996', 'Kyrgyzstan', 'KGS', '', 0, 'active', '2014-12-12 22:46:19', 'No'),
(107, 'AS', 'KH', '+855', 'Cambodia', 'KHR', '', 0, 'active', '2014-12-12 22:46:29', 'No'),
(108, 'OC', 'KI', '+686', 'Kiribati', 'AUD', '$', 1, 'active', '2015-05-04 01:23:58', 'No'),
(109, 'AF', 'KM', '+269', 'Comoros', 'KMF', '', 0, 'active', '2014-12-12 22:46:53', 'No'),
(110, 'NA', 'KN', '+1 869', 'Saint Kitts And Nevis', 'XCD', '', 0, 'active', '2014-12-12 22:47:06', 'No'),
(111, '', 'KP', '+850', 'North Korea', 'KPW', '', 0, 'active', '2014-12-12 22:47:21', 'No'),
(112, '', 'KR', '+82', 'South Korea', 'KRW', '', 0, 'active', '2014-12-12 22:47:34', 'No'),
(113, 'AS', 'KW', '+965', 'Kuwait', 'KWD', '', 0, 'active', '2014-12-12 22:47:47', 'No'),
(114, 'AS', 'KZ', '+7', 'Kazakhstan', 'KZT', '', 0, 'active', '2014-12-12 22:48:00', 'No'),
(115, '', 'LA', '+856', 'Laos', 'LAK', '', 0, 'active', '2014-12-12 22:48:14', 'No'),
(116, 'AS', 'LB', '+961', 'Lebanon', 'LBP', '', 0, 'active', '2014-12-12 22:48:24', 'No'),
(117, 'NA', 'LC', '+1 758', 'Saint Lucia', 'XCD', '', 0, 'active', '2014-12-12 22:48:44', 'No'),
(118, 'EU', 'LI', '+423', 'Liechtenstein', 'CHF', 'CHF', 1, 'active', '2015-05-04 01:04:40', 'No'),
(119, 'AS', 'LK', '+94', 'Sri Lanka', 'LKR', 'Rs', 0, 'active', '2014-12-12 22:49:12', 'No'),
(120, 'AF', 'LR', '+231', 'Liberia', 'LRD', '', 0, 'active', '2014-12-12 22:49:26', 'No'),
(121, 'AF', 'LS', '+266', 'Lesotho', 'LSL', '', 0, 'active', '2014-12-13 00:07:37', 'No'),
(122, 'EU', 'LT', '+370', 'Lithuania', 'LTL', '', 0, 'active', '2014-12-13 00:07:49', 'No'),
(123, 'EU', 'LU', '+352', 'Luxembourg', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(124, 'EU', 'LV', '+371', 'Latvia', 'LVL', '', 0, 'active', '2014-12-13 00:08:17', 'No'),
(125, '', 'LY', '+ 218', 'Libya', 'LYD', '', 0, 'active', '2014-12-13 00:08:34', 'No'),
(126, 'AF', 'MA', '+212', 'Morocco', 'MAD', '', 0, 'active', '2014-12-13 00:09:49', 'No'),
(127, 'EU', 'MC', '+377', 'Monaco', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(128, '', 'MD', '+373', 'Moldova', 'MDL', '', 0, 'active', '2014-12-13 00:10:20', 'No'),
(129, '', 'ME', '+382', 'Montenegro', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(130, 'AF', 'MG', '+261', 'Madagascar', 'MGF', '', 0, 'active', '2014-12-13 00:10:47', 'No'),
(131, 'OC', 'MH', '+692', 'Marshall Islands', 'USD', '$', 1, 'active', '2015-05-04 01:00:22', 'No'),
(132, '', 'MK', '+389', 'Macedonia', 'MKD', '', 0, 'active', '2014-12-13 00:11:20', 'No'),
(133, 'AF', 'ML', '+223', 'Mali', 'XOF', '', 0, 'active', '2014-12-13 00:11:33', 'No'),
(134, 'AS', 'MM', '+95', 'Myanmar', 'MMK', '', 0, 'active', '2014-12-13 00:12:12', 'No'),
(135, 'AS', 'MN', '+976', 'Mongolia', 'MNT', '', 0, 'active', '2014-12-13 00:12:26', 'No'),
(136, '', 'MO', '+853', 'Macao', 'MOP', '', 0, 'active', '2014-12-13 00:12:38', 'No'),
(137, 'OC', 'MP', '+1 670', 'Northern Mariana Islands', 'USD', '$', 1, 'active', '2015-05-04 01:00:25', 'No'),
(138, 'NA', 'MQ', '+596', 'Martinique', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(139, 'AF', 'MR', '+222', 'Mauritania', 'MRO', '', 0, 'active', '2014-12-13 00:14:00', 'No'),
(140, 'NA', 'MS', '+1664', 'Montserrat', 'XCD', '', 0, 'active', '2014-12-13 00:14:26', 'No'),
(141, 'AF', 'MU', '+230', 'Mauritius', 'MUR', '', 0, 'active', '2014-12-13 00:15:18', 'No'),
(142, 'AS', 'MV', '+960', 'Maldives', 'MVR', '', 0, 'active', '2014-12-13 00:15:31', 'No'),
(143, 'AF', 'MW', '+265', 'Malawi', 'MWK', '', 0, 'active', '2014-12-13 00:15:47', 'No'),
(144, 'NA', 'MX', '+52', 'Mexico', 'MXN', '$ ', 1, 'active', '2015-05-04 01:14:00', 'No'),
(145, 'AS', 'MY', '+60', 'Malaysia', 'MYR', 'RM', 1, 'active', '2015-05-04 01:14:42', 'No'),
(146, 'AF', 'MZ', '+258', 'Mozambique', 'MZN', '', 0, 'active', '2014-12-13 00:16:46', 'No'),
(147, 'AF', 'NA', '+264', 'Namibia', 'NAD', '', 0, 'active', '2014-12-13 00:17:10', 'No'),
(148, 'OC', 'NC', '+687', 'New Caledonia', 'CFP', '', 0, 'active', '2014-12-13 00:17:31', 'No'),
(149, 'AF', 'NE', '+227', 'Niger', 'XOF', '', 0, 'active', '2014-12-13 00:18:48', 'No'),
(150, 'AF', 'NG', '+234', 'Nigeria', 'NGN', '', 0, 'active', '2014-12-13 00:19:28', 'No'),
(151, 'NA', 'NI', '+505', 'Nicaragua', 'NIO', '', 0, 'active', '2014-12-13 00:19:48', 'No'),
(152, 'EU', 'NL', '+31', 'Netherlands', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(153, 'EU', 'NO', '+47', 'Norway', 'NOK', 'kr', 1, 'active', '2015-05-04 01:13:14', 'No'),
(154, 'AS', 'NP', '+977', 'Nepal', 'NPR', '', 0, 'active', '2014-12-13 00:20:36', 'No'),
(155, 'OC', 'NR', '+674', 'Nauru', 'AUD', '$', 1, 'active', '2015-05-04 01:23:57', 'No'),
(156, 'OC', 'NZ', '+64', 'New Zealand', 'NZD', '$', 1, 'active', '2015-05-04 01:12:14', 'No'),
(157, 'AS', 'OM', '+968', 'Oman', 'OMR', '', 0, 'active', '2014-12-13 00:21:28', 'No'),
(158, 'NA', 'PA', '+507', 'Panama', 'PAB', '', 0, 'active', '2014-12-13 00:21:42', 'No'),
(159, 'SA', 'PE', '+51', 'Peru', 'PEN', '', 0, 'active', '2014-12-13 00:21:53', 'No'),
(160, 'OC', 'PF', '+689', 'French Polynesia', 'CFP', '', 0, 'active', '2014-12-13 00:22:06', 'No'),
(161, 'OC', 'PG', '+675', 'Papua New Guinea', 'PGK', '', 0, 'active', '2014-12-13 00:22:20', 'No'),
(162, 'AS', 'PH', '+63', 'Philippines', 'PHP', 'â‚±', 1, 'active', '2015-05-04 01:11:22', 'No'),
(163, 'AS', 'PK', '+92', 'Pakistan', 'PKR', '', 0, 'active', '2014-12-13 00:22:51', 'No'),
(164, 'EU', 'PL', '+48 ', 'Poland', 'PLN', 'zÅ‚', 1, 'active', '2015-05-04 01:10:43', 'No'),
(165, '', 'PM', '+508', 'Saint Pierre And Miquelon', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(166, 'NA', 'PR', '+787', 'Puerto Rico', 'USD', '$', 1, 'active', '2015-05-04 01:00:29', 'No'),
(167, '', 'PS', '+970', 'Palestinian Territory', 'PAB', '', 0, 'active', '2014-12-13 00:24:43', 'No'),
(168, 'EU', 'PT', '+351', 'Portugal', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(169, 'OC', 'PW', '+680', 'Palau', 'USD', '$', 1, 'active', '2015-05-04 01:00:27', 'No'),
(170, 'SA', 'PY', '+595', 'Paraguay', 'PYG', '', 0, 'active', '2014-12-13 00:26:38', 'No'),
(171, 'AS', 'QA', '+974', 'Qatar', 'QAR', '', 0, 'active', '2014-12-13 00:26:55', 'No'),
(172, 'AF', 'RE', '+262', 'Reunion', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(173, 'EU', 'RO', '+40', 'Romania', 'RON', '', 0, 'active', '2014-12-13 00:27:23', 'No'),
(174, '', 'RS', '+381', 'Serbia', 'RSD', '', 0, 'active', '2014-12-13 00:27:37', 'No'),
(175, '', 'RU', '+7', 'Russia', 'RUB', 'Ð ', 1, 'active', '2015-05-04 01:08:33', 'No'),
(176, 'AF', 'RW', '+250', 'Rwanda', 'RWF', '', 0, 'active', '2014-12-13 00:28:06', 'No'),
(177, 'AS', 'SA', '+966', 'Saudi Arabia', 'SAR', '', 0, 'active', '2014-12-13 00:28:20', 'No'),
(178, 'OC', 'SB', '+677', 'Solomon Islands', 'SBD', '', 0, 'active', '2014-12-13 00:28:38', 'No'),
(179, 'AF', 'SC', '+248 ', 'Seychelles', 'SCR', '', 0, 'active', '2014-12-13 00:30:16', 'No'),
(180, 'AF', 'SD', '+249', 'Sudan', 'SDG', '', 0, 'active', '2014-12-13 00:30:30', 'No'),
(181, 'EU', 'SE', '+46 ', 'Sweden', 'SEK', 'kr', 1, 'active', '2015-05-04 01:05:36', 'No'),
(182, 'AS', 'SG', '+65', 'Singapore', 'SGD', '$', 1, 'active', '2015-05-04 01:06:28', 'No'),
(183, '', 'SH', '+290', 'Saint Helena', 'SHP', '', 0, 'active', '2014-12-13 00:31:36', 'No'),
(184, 'EU', 'SI', '+386', 'Slovenia', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(185, '', 'SJ', '+47', 'Svalbard And Jan Mayen', 'NOK', 'kr', 1, 'active', '2015-05-04 01:13:13', 'No'),
(186, '', 'SK', '+421', 'Slovakia', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(187, 'AF', 'SL', '+232', 'Sierra Leone', 'SLL', '', 0, 'active', '2014-12-13 00:32:52', 'No'),
(188, 'EU', 'SM', '+378', 'San Marino', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(189, 'AF', 'SN', '+221', 'Senegal', 'XOF', '', 0, 'active', '2014-12-13 00:33:27', 'No'),
(190, 'AF', 'SO', '+252', 'Somalia', 'SOS', '', 0, 'active', '2014-12-13 00:33:41', 'No'),
(191, 'SA', 'SR', '+597', 'Suriname', 'SRD', '', 0, 'active', '2014-12-13 00:33:54', 'No'),
(192, '', 'SS', '+211', 'South Sudan', 'SSP', '', 0, 'active', '2014-12-13 00:34:41', 'No'),
(193, 'AF', 'ST', '+239', 'Sao Tome And Principe', 'STD', '', 0, 'active', '2014-12-13 00:34:57', 'No'),
(194, 'NA', 'SV', '+503', 'El Salvador', 'SVC', '', 0, 'active', '2014-12-13 00:35:19', 'No'),
(195, '', 'SY', '+963', 'Syria', 'SYP', '', 0, 'active', '2014-12-13 00:35:43', 'No'),
(196, 'AF', 'SZ', '+268', 'Swaziland', 'SZL', '', 0, 'active', '2014-12-13 00:36:03', 'No'),
(197, 'AF', 'TD', '+235', 'Chad', 'XAF', '', 0, 'active', '2014-12-13 00:37:02', 'No'),
(198, 'AN', 'TF', '', 'French Southern Territories', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(199, 'AF', 'TG', '+228', 'Togo', 'XOF', '', 0, 'active', '2014-12-13 00:40:14', 'No'),
(200, 'AS', 'TH', '+66', 'Thailand', 'THB', 'à¸¿', 1, 'active', '2015-05-04 01:02:38', 'No'),
(201, 'AS', 'TJ', '+992', 'Tajikistan', 'TJS', '', 0, 'active', '2014-12-13 00:40:53', 'No'),
(202, 'OC', 'TK', '+690', 'Tokelau', 'NZD', '$', 1, 'active', '2015-05-04 01:12:15', 'No'),
(203, 'OC', 'TL', '+670', 'East Timor', 'USD', '$', 1, 'active', '2015-05-04 01:00:19', 'No'),
(204, 'AS', 'TM', '+993', 'Turkmenistan', 'TMT', '', 0, 'active', '2014-12-13 00:41:30', 'No'),
(205, 'AF', 'TN', '+216', 'Tunisia', 'TND', '', 0, 'active', '2014-12-13 00:41:44', 'No'),
(206, 'OC', 'TO', '+676', 'Tonga', 'TOP', '', 0, 'active', '2014-12-13 00:42:00', 'No'),
(207, 'AS', 'TR', '+90', 'Turkey', 'TRY', 'TL', 1, 'active', '2015-05-04 01:01:27', 'No'),
(208, 'NA', 'TT', '+868\n', 'Trinidad And Tobago', 'TTD', '', 0, 'active', '2014-12-13 00:49:41', 'No'),
(209, 'OC', 'TV', '+688', 'Tuvalu', 'AUD', '$', 1, 'active', '2015-05-04 01:23:56', 'No'),
(210, 'AS', 'TW', '+886', 'Taiwan', 'TWD', '$ ', 1, 'active', '2015-05-04 01:03:32', 'No'),
(211, '', 'TZ', '+255', 'Tanzania', 'TZS', '', 0, 'active', '2014-12-13 01:17:54', 'No'),
(212, 'EU', 'UA', '+380', 'Ukraine', 'UAH', '', 0, 'active', '2014-12-13 01:18:07', 'No'),
(213, 'AF', 'UG', '+256', 'Uganda', 'UGX', '', 0, 'active', '2014-12-13 01:18:31', 'No'),
(214, 'OC', 'UM', '+1', 'United States Minor Outlying Islands', 'USD', '$', 1, 'active', '2015-05-04 01:00:34', 'No'),
(216, 'SA', 'UY', '+598\n', 'Uruguay', 'UYU', '', 0, 'active', '2014-12-13 01:21:11', 'No'),
(217, 'AS', 'UZ', '+998', 'Uzbekistan', 'UZS', '', 0, 'active', '2014-12-13 01:21:22', 'No'),
(218, 'NA', 'VC', '+1 784 ', 'Saint Vincent And The Grenadines', 'XCD', '', 0, 'active', '2014-12-13 01:21:38', 'No'),
(219, 'SA', 'VE', '+58', 'Venezuela', 'VEF', '', 0, 'active', '2014-12-13 01:21:53', 'No'),
(220, '', 'VI', '+1 340', 'U.S. Virgin Islands', 'USD', '$', 1, 'active', '2015-05-04 01:00:30', 'No'),
(221, '', 'VN', '+84', 'Vietnam', 'VND', '', 0, 'active', '2014-12-13 01:22:37', 'No'),
(222, 'OC', 'VU', '+678', 'Vanuatu', 'VUV', '', 0, 'active', '2014-12-13 01:22:47', 'No'),
(223, '', 'WF', '+681 ', 'Wallis And Futuna', 'XPF', '', 0, 'active', '2014-12-13 01:23:12', 'No'),
(224, 'OC', 'WS', '+685', 'Samoa', 'WST', '', 0, 'active', '2014-12-13 01:23:28', 'No'),
(225, '', 'XK', '+381', 'Kosovo', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(226, 'AS', 'YE', '+967', 'Yemen', 'YER', '', 0, 'active', '2014-12-13 01:23:55', 'No'),
(227, 'AF', 'YT', '+262', 'Mayotte', 'EUR', 'â‚¬', 1, 'active', '2015-05-04 01:20:32', 'No'),
(228, 'AF', 'ZA', '+27', 'South Africa', 'ZAR', '', 0, 'active', '2014-12-13 01:24:19', 'No'),
(229, 'AF', 'ZM', '+260', 'Zambia', 'ZMW', '', 0, 'active', '2014-12-13 01:24:39', 'No'),
(230, 'AF', 'ZW', '+263', 'Zimbabwe', 'ZWD', '', 0, 'active', '2014-12-13 01:24:56', 'No'),
(215, 'NA', 'US', '+1', 'United States', 'USD', '$', 1, 'active', '2015-05-03 19:30:33', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
`id` int(11) NOT NULL,
  `countryname` varchar(100) NOT NULL,
  `currencytype` varchar(100) NOT NULL,
  `currencysymbol` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `currencyrate` float(10,2) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `countryname`, `currencytype`, `currencysymbol`, `currencyrate`, `status`, `createdon`) VALUES
(1, 'United States', 'USD', '$', 1.00, 'active', '2015-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
`id` int(45) NOT NULL,
  `projectid` int(125) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` blob NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `followprojects`
--

CREATE TABLE IF NOT EXISTS `followprojects` (
`id` int(45) NOT NULL,
  `projectid` int(45) NOT NULL,
  `followerid` int(45) NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE IF NOT EXISTS `follows` (
`id` int(45) NOT NULL,
  `followerid` int(45) NOT NULL,
  `followingid` int(45) NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE IF NOT EXISTS `histories` (
`id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `location` varchar(250) NOT NULL,
  `ipaddress` varchar(50) NOT NULL,
  `status` varchar(250) NOT NULL,
  `logindatetime` datetime NOT NULL,
  `logoutdatetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `userid`, `email`, `location`, `ipaddress`, `status`, `logindatetime`, `logoutdatetime`) VALUES
(1, 1, 'sampleuser@gmail.com', '', '192.168.1.81', 'Login Successfull', '2015-07-27 07:23:05', '0000-00-00 00:00:00'),
(2, 1, 'sampleuser@gmail.com', 'United States', '192.168.1.50', 'Login Successfull', '2015-07-27 07:52:11', '0000-00-00 00:00:00'),
(3, 1, 'sampleuser@gmail.com', 'United States', '192.168.1.50', 'Login Successfull', '2015-08-07 08:13:05', '0000-00-00 00:00:00'),
(4, 1, 'sampleuser@gmail.com', 'United States', '192.168.1.50', 'Login Successfull', '2015-08-14 09:40:45', '0000-00-00 00:00:00'),
(5, 1, 'sampleuser@gmail.com', 'United States', '192.168.1.81', 'Login Successfull', '2015-08-14 11:20:23', '0000-00-00 00:00:00'),
(6, 1, 'sampleuser@gmail.com', 'United States', '192.168.1.81', 'Login Successful', '2015-11-12 09:05:18', '2015-11-12 09:05:18'),
(7, 1, 'sampleuser@gmail.com', 'United States', '192.168.1.50', 'Login Successful', '2015-11-26 03:12:37', '2015-11-26 03:12:37');

-- --------------------------------------------------------

--
-- Table structure for table `inboxmsgs`
--

CREATE TABLE IF NOT EXISTS `inboxmsgs` (
`id` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `recieverid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `senderstatus` enum('available','deleted') NOT NULL DEFAULT 'available',
  `recieverstatus` enum('available','deleted') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
`id` int(45) NOT NULL,
  `languagename` varchar(125) NOT NULL,
  `languagecode` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `languagename`, `languagecode`, `status`) VALUES
(1, 'Korean', 'kr', 1),
(2, 'English', 'en', 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
`id` int(45) NOT NULL,
  `userid` int(45) NOT NULL,
  `projectid` int(45) NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE IF NOT EXISTS `memberships` (
`id` int(45) NOT NULL,
  `packagename` varchar(125) NOT NULL,
  `duration` varchar(125) NOT NULL,
  `features` mediumtext NOT NULL,
  `price` float(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE IF NOT EXISTS `newsletters` (
`id` int(45) NOT NULL,
  `templatename` varchar(125) NOT NULL,
  `subject` varchar(125) NOT NULL,
  `senderemail` varchar(125) NOT NULL,
  `sendername` varchar(45) NOT NULL,
  `emailcontent` blob NOT NULL,
  `createdon` datetime NOT NULL,
  `subscription` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `templatename`, `subject`, `senderemail`, `sendername`, `emailcontent`, `createdon`, `subscription`) VALUES
(7, 'samplenewsletter', 'Newsletter Sample', 'admin@kickstarter.com', 'admin', 0x3c21444f43545950452048544d4c3e0d0a3c68746d6c3e0d0a3c686561643e3c6d65746120687474702d65717569763d5c22436f6e74656e742d547970655c2220636f6e74656e743d5c22746578742f68746d6c3b20636861727365743d7574662d385c223e3c6d657461206e616d653d5c2276696577706f72745c2220636f6e74656e743d5c2277696474683d6465766963652d77696474685c222f3e0d0a093c7469746c653e466f72676f742050617373776f72643c2f7469746c653e0d0a3c2f686561643e0d0a3c626f6479206c6566746d617267696e3d5c22305c22206d617267696e6865696768743d5c22305c22206d617267696e77696474683d5c22305c2220746f706d617267696e3d5c22305c223e0d0a3c7461626c65206267636f6c6f723d5c22233764613263315c2220626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c222077696474683d5c223634305c223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c7464207374796c653d5c2270616464696e673a343070783b5c223e0d0a0909093c7461626c6520626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c22207374796c653d5c22626f726465723a233164343536372031707820736f6c69643b20666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b5c222077696474683d5c223631305c223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d5c224865616465725c22206865696768743d5c223134385c22207372633d5c227b7b55524c3a3a746f28246c6f676f297d7d5c22207374796c653d5c226d617267696e3a3070783b2070616464696e673a3070783b20626f726465723a6e6f6e653b5c222077696474683d5c223630385c22202f3e7b7b247469746c657d7d3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74642076616c69676e3d5c22746f705c223e0d0a0909090909093c7461626c65206267636f6c6f723d5c22234646464646465c2220626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d5c22325c223e0d0a0909090909090909093c70207374796c653d5c2270616464696e673a313070782031357078203130707820313570783b20666f6e742d73697a653a313470783b206d617267696e3a3070783b5c223e3c7374726f6e673e44656172204a686f6e652c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e3c7374726f6e673e5468616e6b20796f7520666f7220726567697374657220776974682075732e203c2f7374726f6e673e5072616573656e7420696163756c697320636f6e7365637465747572206d61747469732e2053757370656e6469737365206163206c656f2061207075727573206772617669646120766f6c75747061742e2044756973206d6174746973207475727069732065752064756920756c74726963696573207472697374697175652e20496e20706f73756572652c20657261742076756c70757461746520616c69717565742072757472756d2c206d61737361206f7263692072757472756d20697073756d2c206e6f6e2074696e636964756e74206d69206c6563747573206e6563206e756e632e3c2f703e0d0a0d0a0909090909090909093c7461626c6520626f726465723d5c22305c222063656c6c70616464696e673d5c22355c222063656c6c73706163696e673d5c22305c22207374796c653d5c226d617267696e3a3130707820313570783b20666f6e742d73697a653a313270783b5c223e0d0a090909090909090909093c74626f64793e0d0a09090909090909090909093c74723e0d0a0909090909090909090909093c746420616c69676e3d5c2272696768745c223e3c7374726f6e673e456d61696c3a3c2f7374726f6e673e3c2f74643e0d0a0909090909090909090909093c74643e7b7b24656d61696c7d7d3c2f74643e0d0a09090909090909090909093c2f74723e0d0a090909090909090909093c2f74626f64793e0d0a0909090909090909093c2f7461626c653e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e5072616573656e7420696163756c697320636f6e7365637465747572206d61747469732e2053757370656e6469737365206163206c656f2061207075727573206772617669646120766f6c75747061742e2044756973206d6174746973207475727069732065752064756920756c74726963696573207472697374697175652e20496e20706f73756572652c20657261742076756c70757461746520616c69717565742072757472756d2c206d61737361206f7263692072757472756d20697073756d2c206e6f6e2074696e636964756e74206d69206c6563747573206e6563206e756e632e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c7464207374796c653d5c22666f6e742d73697a653a313270783b2070616464696e673a3130707820313570783b5c222076616c69676e3d5c22746f705c222077696474683d5c223530255c223e0d0a0909090909090909093c703e436c61737320617074656e742074616369746920736f63696f737175206164206c69746f726120746f727175656e742070657220636f6e75626961206e6f737472612c2070657220696e636570746f732068696d656e61656f732e2050686173656c6c75732073697420616d6574206c6163696e69612073617069656e2e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c7464207374796c653d5c22666f6e742d73697a653a313270783b2070616464696e673a3130707820313570783b5c222076616c69676e3d5c22746f705c222077696474683d5c223530255c223e0d0a0909090909090909093c703e496620796f75206861766520616e79207175657374696f6e732c20636865636b206f7574206f7572203c6120687265663d5c22235c223e3c7374726f6e673e646f63756d656e746174696f6e3c2f7374726f6e673e3c2f613e206f722073656e64207468656d206f75722077617920766961203c6120687265663d5c22235c223e3c7374726f6e673e737570706f72742e3c2f7374726f6e673e3c2f613e3c2f703e0d0a0d0a0909090909090909093c703e3c7374726f6e673e2d205468652077656273697465205465616d3c2f7374726f6e673e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, '2015-03-19 09:39:24', 0),
(8, 'subscriptionconfirmation', 'Subscription Confirmation', 'admin@casperon.in', 'admin', 0x3c21444f43545950452048544d4c3e0d0a3c68746d6c3e0d0a3c686561643e3c6d65746120687474702d65717569763d5c22436f6e74656e742d547970655c2220636f6e74656e743d5c22746578742f68746d6c3b20636861727365743d7574662d385c223e3c6d657461206e616d653d5c2276696577706f72745c2220636f6e74656e743d5c2277696474683d6465766963652d77696474685c222f3e0d0a093c7469746c653e466f72676f742050617373776f72643c2f7469746c653e0d0a3c2f686561643e0d0a3c626f6479206c6566746d617267696e3d225c2671756f743b305c2671756f743b22206d617267696e6865696768743d225c2671756f743b305c2671756f743b22206d617267696e77696474683d225c2671756f743b305c2671756f743b2220746f706d617267696e3d225c2671756f743b305c2671756f743b223e0d0a3c7461626c65206267636f6c6f723d225c2671756f743b233764613263315c2671756f743b2220626f726465723d225c2671756f743b305c2671756f743b222063656c6c70616464696e673d225c2671756f743b305c2671756f743b222063656c6c73706163696e673d225c2671756f743b305c2671756f743b222077696474683d225c2671756f743b3634305c2671756f743b223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c7464207374796c653d225c2671756f743b70616464696e673a343070783b5c2671756f743b223e0d0a0909093c7461626c65203170783d222220626f726465723d225c2671756f743b305c2671756f743b222063656c6c70616464696e673d225c2671756f743b305c2671756f743b222063656c6c73706163696e673d225c2671756f743b305c2671756f743b2220736f6c69643d2222207374796c653d225c2671756f743b626f726465723a23316434353637223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d225c2671756f743b4865616465725c2671756f743b22206865696768743d225c2671756f743b3134385c2671756f743b222070616464696e673a3070783d2222207372633d227b7b55524c3a3a746f28276c6f676f27297d7d22207374796c653d225c2671756f743b6d617267696e3a3070783b22202f3e7b7b247469746c657d7d3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74642076616c69676e3d225c2671756f743b746f705c2671756f743b223e0d0a0909090909093c7461626c65206267636f6c6f723d225c2671756f743b234646464646465c2671756f743b2220626f726465723d225c2671756f743b305c2671756f743b222063656c6c70616464696e673d225c2671756f743b305c2671756f743b222063656c6c73706163696e673d225c2671756f743b305c2671756f743b223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d225c2671756f743b325c2671756f743b223e0d0a0909090909090909093c7020313070783d222220313570783d2222207374796c653d225c2671756f743b70616464696e673a31307078223e3c7374726f6e673e44656172207b7b246e616d657d7d2c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c7020313070783d222220313570783d2222207374796c653d225c2671756f743b70616464696e673a307078223e3c7374726f6e673e5468616e6b20796f7520666f72207375627363726962696e67206f7572266e6273703b6e6577736c65747465722e266e6273703b3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c7020313070783d222220313570783d2222207374796c653d225c2671756f743b70616464696e673a307078223e3c7374726f6e673e436c69636b20746865206c696e6b2062726c6f7720746f20636f6e6669726d20796f757220737562736372697074696f6e3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c7461626c6520313570783d222220626f726465723d225c2671756f743b305c2671756f743b222063656c6c70616464696e673d225c2671756f743b355c2671756f743b222063656c6c73706163696e673d225c2671756f743b305c2671756f743b22207374796c653d225c2671756f743b6d617267696e3a31307078223e0d0a090909090909090909093c74626f64793e0d0a09090909090909090909093c74723e0d0a0909090909090909090909093c746420616c69676e3d225c2671756f743b72696768745c2671756f743b223e3c7374726f6e673e4c696e6b3a3c2f7374726f6e673e3c2f74643e0d0a0909090909090909090909093c74643e7b7b55524c3a3a746f28262333393b636f6e6669726d737562736372697074696f6e3f69643d262333393b2e3c7370616e207374796c653d226261636b67726f756e642d636f6c6f723a2072676228302c203235352c20323430293b223e7b7b2469647d7d2e262333393b26616d703b26616d703b636f64653d262333393b7b7b24636f64657d7d3c2f7370616e3e297d7d3c2f74643e0d0a09090909090909090909093c2f74723e0d0a090909090909090909093c2f74626f64793e0d0a0909090909090909093c2f7461626c653e0d0a0d0a0909090909090909093c7020313070783d222220313570783d2222207374796c653d225c2671756f743b70616464696e673a307078223e5072616573656e7420696163756c697320636f6e7365637465747572206d61747469732e2053757370656e6469737365206163206c656f2061207075727573206772617669646120766f6c75747061742e2044756973206d6174746973207475727069732065752064756920756c74726963696573207472697374697175652e20496e20706f73756572652c20657261742076756c70757461746520616c69717565742072757472756d2c206d61737361206f7263692072757472756d20697073756d2c206e6f6e2074696e636964756e74206d69206c6563747573206e6563206e756e632e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c746420313570783d22222070616464696e673a313070783d2222207374796c653d225c2671756f743b666f6e742d73697a653a313270783b223e0d0a0909090909090909093c703e436c61737320617074656e742074616369746920736f63696f737175206164206c69746f726120746f727175656e742070657220636f6e75626961206e6f737472612c2070657220696e636570746f732068696d656e61656f732e2050686173656c6c75732073697420616d6574206c6163696e69612073617069656e2e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c746420313570783d22222070616464696e673a313070783d2222207374796c653d225c2671756f743b666f6e742d73697a653a313270783b223e0d0a0909090909090909093c703e496620796f75206861766520616e79207175657374696f6e732c20636865636b206f7574206f7572203c6120687265663d225c223e3c7374726f6e673e646f63756d656e746174696f6e3c2f7374726f6e673e3c2f613e206f722073656e64207468656d206f75722077617920766961203c6120687265663d225c223e3c7374726f6e673e737570706f72742e3c2f7374726f6e673e3c2f613e3c2f703e0d0a0d0a0909090909090909093c703e3c7374726f6e673e2d205468652077656273697465205465616d3c2f7374726f6e673e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, '2015-03-23 13:50:16', 0),
(9, 'forgotpassword', 'Notification to change password!', 'admin@casperon.in', 'admin', 0x3c21444f43545950452048544d4c3e0d0a3c68746d6c3e0d0a3c686561643e3c6d65746120687474702d65717569763d22436f6e74656e742d547970652220636f6e74656e743d22746578742f68746d6c3b20636861727365743d7574662d38223e3c6d657461206e616d653d2276696577706f72742220636f6e74656e743d2277696474683d6465766963652d7769647468222f3e0d0a093c7469746c653e466f72676f742050617373776f72643c2f7469746c653e0d0a3c2f686561643e0d0a3c626f6479206c6566746d617267696e3d223022206d617267696e6865696768743d223022206d617267696e77696474683d22302220746f706d617267696e3d2230223e0d0a3c7461626c65206267636f6c6f723d22233764613263312220626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d2230222077696474683d22363430223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c7464207374796c653d2270616464696e673a343070783b223e0d0a0909093c7461626c6520626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d223022207374796c653d22626f726465723a233164343536372031707820736f6c69643b20666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b222077696474683d22363130223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d2248656164657222206865696768743d2231343822207372633d227b7b55524c3a3a746f28276c6f676f27297d7d22207374796c653d226d617267696e3a3070783b2070616464696e673a3070783b20626f726465723a6e6f6e653b222077696474683d2236303822202f3e3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74642076616c69676e3d22746f70223e0d0a0909090909093c7461626c65206267636f6c6f723d22234646464646462220626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d2230223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d2232223e0d0a0909090909090909093c6833207374796c653d2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b223e526573657420596f75722050617373776f72643c2f68333e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a313070782031357078203130707820313570783b20666f6e742d73697a653a313470783b206d617267696e3a3070783b223e3c7374726f6e673e44656172207b7b246e616d657d7d2c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e436c69636b20746865206c696e6b2062656c6f7720746f20726573657420796f75722070617373776f72642e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e3c7374726f6e673e456d61696c203a3c2f7374726f6e673e207b7b24656d61696c7d7d3c6272202f3e0d0a0909090909090909093c6272202f3e0d0a0909090909090909093c7374726f6e673e4c696e6b203a3c2f7374726f6e673e203c6120687265663d227b7b55524c3a3a746f28277265736574666f72676f747077643f69643d27297d7d7b7b2469647d7d223e7b7b55524c3a3a746f28262333393b7265736574666f72676f747077643f69643d262333393b297d7d7b7b2469647d7d3c2f613e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c7464207374796c653d22666f6e742d73697a653a313270783b222076616c69676e3d22746f70222077696474683d2231303025223e0d0a0909090909090909093c6833207374796c653d2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b223e526567617264732c3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e7b7b2473656e6465726e616d657d7d3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e3c693e7b7b2473656e646572656d61696c7d7d3c2f693e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c7464207374796c653d22666f6e742d73697a653a313270783b2070616464696e673a3130707820313570783b222076616c69676e3d22746f70222077696474683d223025223e266e6273703b3c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, '2015-03-24 09:41:31', 0),
(10, 'emailverification', 'Email Verification', 'admin@casperon.in', 'admin', 0x3c21444f43545950452048544d4c3e0d0a3c68746d6c3e0d0a3c686561643e3c6d65746120687474702d65717569763d5c22436f6e74656e742d547970655c2220636f6e74656e743d5c22746578742f68746d6c3b20636861727365743d7574662d385c223e3c6d657461206e616d653d5c2276696577706f72745c2220636f6e74656e743d5c2277696474683d6465766963652d77696474685c222f3e0d0a093c7469746c653e466f72676f742050617373776f72643c2f7469746c653e0d0a3c2f686561643e0d0a3c626f6479206c6566746d617267696e3d5c22305c22206d617267696e6865696768743d5c22305c22206d617267696e77696474683d5c22305c2220746f706d617267696e3d5c22305c223e0d0a3c7461626c65206267636f6c6f723d5c22233764613263315c2220626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c222077696474683d5c223634305c223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c7464207374796c653d5c2270616464696e673a343070783b5c223e0d0a0909093c7461626c6520626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c22207374796c653d5c22626f726465723a233164343536372031707820736f6c69643b20666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b5c222077696474683d5c223631305c223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d5c224865616465725c22206865696768743d5c223134385c22207372633d5c227b7b55524c3a3a746f285c275c27297d7d2f7b7b246c6f676f7d7d5c22207374796c653d5c226d617267696e3a3070783b2070616464696e673a3070783b20626f726465723a6e6f6e653b5c222077696474683d5c223630385c22202f3e3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74642076616c69676e3d5c22746f705c223e0d0a0909090909093c7461626c65206267636f6c6f723d5c22234646464646465c2220626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d5c22325c223e0d0a0909090909090909093c6833207374796c653d5c2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b5c223e5665726966697920596f757220456d61696c3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a313070782031357078203130707820313570783b20666f6e742d73697a653a313470783b206d617267696e3a3070783b5c223e3c7374726f6e673e44656172207b7b246e616d657d7d2c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e436c69636b20746865206c696e6b2062656c6f7720746f2076657269667920796f757220656d61696c20616464726573732e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e3c7374726f6e673e456d61696c203a3c2f7374726f6e673e207b7b24656d61696c7d7d3c6272202f3e0d0a0909090909090909093c6272202f3e0d0a0909090909090909093c7374726f6e673e4c696e6b203a3c2f7374726f6e673e203c6120687265663d5c227b7b55524c3a3a746f285c2770726f6a6563742f73656e64766572696669636174696f6e2f636f6e6669726d5c27297d7d2f7b7b2469647d7d2f7b7b24636f64657d7d5c223e636c69636b20686572653c2f613e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c7464207374796c653d5c22666f6e742d73697a653a313270783b5c222076616c69676e3d5c22746f705c222077696474683d5c22313030255c223e0d0a0909090909090909093c6833207374796c653d5c2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b5c223e526567617264732c3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e7b7b2473656e6465726e616d657d7d3c2f703e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e3c693e7b7b2473656e646572656d61696c7d7d3c2f693e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c7464207374796c653d5c22666f6e742d73697a653a313270783b2070616464696e673a3130707820313570783b5c222076616c69676e3d5c22746f705c222077696474683d5c2230255c223e266e6273703b3c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a3c2f626f64793e0d0a3c2f68746d6c3e, '2015-04-03 09:56:10', 0),
(11, 'projectupdates', 'Fundstarter project updates', 'admin@casperon.in', 'admin', 0x3c21444f43545950452048544d4c3e0d0a3c68746d6c3e0d0a3c686561643e3c6d65746120687474702d65717569763d5c22436f6e74656e742d547970655c2220636f6e74656e743d5c22746578742f68746d6c3b20636861727365743d7574662d385c223e3c6d657461206e616d653d5c2276696577706f72745c2220636f6e74656e743d5c2277696474683d6465766963652d77696474685c222f3e0d0a093c7469746c653e466f72676f742050617373776f72643c2f7469746c653e0d0a3c2f686561643e0d0a3c626f6479206c6566746d617267696e3d5c22305c22206d617267696e6865696768743d5c22305c22206d617267696e77696474683d5c22305c2220746f706d617267696e3d5c22305c223e0d0a3c7461626c65206267636f6c6f723d5c22233764613263315c2220626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c222077696474683d5c223634305c223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c7464207374796c653d5c2270616464696e673a343070783b5c223e0d0a0909093c7461626c6520626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c22207374796c653d5c22626f726465723a233164343536372031707820736f6c69643b20666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b5c222077696474683d5c223631305c223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d5c224865616465725c22206865696768743d5c223134385c22207372633d5c227b7b55524c3a3a746f28246c6f676f297d7d5c22207374796c653d5c226d617267696e3a3070783b2070616464696e673a3070783b20626f726465723a6e6f6e653b5c222077696474683d5c223630385c22202f3e3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74642076616c69676e3d5c22746f705c223e0d0a0909090909093c7461626c65206267636f6c6f723d5c22234646464646465c2220626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d5c22325c223e0d0a0909090909090909093c6833207374796c653d5c2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b5c223e50726f6a65637420757064617465206f66207b7b2470726f6a6563747469746c657d7d3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a313070782031357078203130707820313570783b20666f6e742d73697a653a313470783b206d617267696e3a3070783b5c223e3c7374726f6e673e44656172207b7b246e616d657d7d2c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e436c69636b20746865206c696e6b20746f207669657720746865207570646174652e3c2f703e0d0a0909090909090909093c6272202f3e0d0a0909090909090909093c7374726f6e673e4c696e6b203a3c2f7374726f6e673e203c6120687265663d5c227b7b55524c3a3a746f285c272f70726f6a6563742f64657461696c5c27297d7d2f7b7b2470726f6a65637469647d7d5c223e636c69636b20686572653c2f613e0d0a0d0a0909090909090909093c703e266e6273703b3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c7464207374796c653d5c22666f6e742d73697a653a313270783b5c222076616c69676e3d5c22746f705c222077696474683d5c22313030255c223e0d0a0909090909090909093c6833207374796c653d5c2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b5c223e526567617264732c3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e7b7b2473656e6465726e616d657d7d3c2f703e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e3c693e7b7b2473656e646572656d61696c7d7d3c2f693e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c7464207374796c653d5c22666f6e742d73697a653a313270783b2070616464696e673a3130707820313570783b5c222076616c69676e3d5c22746f705c222077696474683d5c2230255c223e266e6273703b3c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, '2015-04-08 10:23:35', 0),
(12, 'projectcomments', 'Notification from fundstarter for comment on your project', 'admin@casperon.in', 'admin', 0x3c6d65746120687474702d65717569763d22436f6e74656e742d547970652220636f6e74656e743d22746578742f68746d6c3b20636861727365743d7574662d38223e3c6d657461206e616d653d2276696577706f72742220636f6e74656e743d2277696474683d6465766963652d7769647468222f3e0d0a3c7469746c653e3c2f7469746c653e0d0a3c7461626c65206267636f6c6f723d22233764613263312220626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d2230222077696474683d22363430223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c7464207374796c653d2270616464696e673a343070783b223e0d0a0909093c7461626c6520626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d223022207374796c653d22626f726465723a233164343536372031707820736f6c69643b20666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b222077696474683d22363130223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d2248656164657222206865696768743d2231343822207372633d227b7b55524c3a3a746f282727297d7d2f7b7b246c6f676f7d7d22207374796c653d226d617267696e3a3070783b2070616464696e673a3070783b20626f726465723a6e6f6e653b222077696474683d2236303822202f3e3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74642076616c69676e3d22746f70223e0d0a0909090909093c7461626c65206267636f6c6f723d22234646464646462220626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d2230223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d2232223e0d0a0909090909090909093c6833207374796c653d2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b223e5669657720636f6d6d656e74206f6e207b7b2470726f6a6563747469746c657d7d3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a313070782031357078203130707820313570783b20666f6e742d73697a653a313470783b206d617267696e3a3070783b223e3c7374726f6e673e44656172207b7b246e616d657d7d2c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e7b7b246261636b65726e616d657d7d20636f6d6d656e746564206f6e20796f75722070726f6a656374207b7b2470726f6a6563747469746c657d7d2e3c6272202f3e0d0a090909090909090909436c69636b20746865206c696e6b20746f20766965772074686520636f6d6d656e742e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e3c7374726f6e673e4c696e6b203a3c2f7374726f6e673e203c6120687265663d227b7b55524c3a3a746f28272f70726f6a6563742f64657461696c27297d7d2f7b7b2470726f6a65637469647d7d223e636c69636b20686572653c2f613e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c7464207374796c653d22666f6e742d73697a653a313270783b222076616c69676e3d22746f70222077696474683d2231303025223e0d0a0909090909090909093c6833207374796c653d2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b223e526567617264732c3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e7b7b2473656e6465726e616d657d7d3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e3c693e7b7b2473656e646572656d61696c7d7d3c2f693e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c7464207374796c653d22666f6e742d73697a653a313270783b2070616464696e673a3130707820313570783b222076616c69676e3d22746f70222077696474683d223025223e266e6273703b3c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a, '2015-04-08 11:58:42', 0),
(13, 'projectbacking', 'Notification from fundstarter for backing your project', 'admin@casperon.in', 'admin', 0x3c6d65746120687474702d65717569763d22436f6e74656e742d547970652220636f6e74656e743d22746578742f68746d6c3b20636861727365743d7574662d38223e3c6d657461206e616d653d2276696577706f72742220636f6e74656e743d2277696474683d6465766963652d7769647468222f3e0d0a3c7469746c653e3c2f7469746c653e0d0a3c7461626c65206267636f6c6f723d22233764613263312220626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d2230222077696474683d22363430223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c7464207374796c653d2270616464696e673a343070783b223e0d0a0909093c7461626c6520626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d223022207374796c653d22626f726465723a233164343536372031707820736f6c69643b20666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b222077696474683d22363130223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d2248656164657222206865696768743d2231343822207372633d227b7b55524c3a3a746f282727297d7d2f7b7b246c6f676f7d7d22207374796c653d226d617267696e3a3070783b2070616464696e673a3070783b20626f726465723a6e6f6e653b222077696474683d2236303822202f3e3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74642076616c69676e3d22746f70223e0d0a0909090909093c7461626c65206267636f6c6f723d22234646464646462220626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d2230223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d2232223e0d0a0909090909090909093c6833207374796c653d2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b223e56696577206261636b696e67206f6e207b7b2470726f6a6563747469746c657d7d3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a313070782031357078203130707820313570783b20666f6e742d73697a653a313470783b206d617267696e3a3070783b223e3c7374726f6e673e44656172207b7b2463726561746f726e616d657d7d2c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e7b7b246261636b65726e616d657d7d206261636b656420796f75722070726f6a656374207b7b2470726f6a6563747469746c657d7d2e3c6272202f3e0d0a090909090909090909436c69636b20746865206c696e6b20746f2076696577206261636b696e672e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e3c7374726f6e673e4c696e6b203a3c2f7374726f6e673e203c6120687265663d227b7b55524c3a3a746f28272f70726f6a6563742f64657461696c27297d7d2f7b7b2470726f6a65637469647d7d223e636c69636b20686572653c2f613e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c7464207374796c653d22666f6e742d73697a653a313270783b222076616c69676e3d22746f70222077696474683d2231303025223e0d0a0909090909090909093c6833207374796c653d2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b223e526567617264732c3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e7b7b2473656e6465726e616d657d7d3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e3c693e7b7b2473656e646572656d61696c7d7d3c2f693e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c7464207374796c653d22666f6e742d73697a653a313270783b2070616464696e673a3130707820313570783b222076616c69676e3d22746f70222077696474683d223025223e266e6273703b3c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a, '2015-04-08 12:49:34', 0),
(14, 'requeststatus', 'Status of your request to change funding goal and duration', 'admin@casperon.in', 'admin', 0x3c21444f43545950452048544d4c3e0d0a3c68746d6c3e0d0a3c686561643e3c6d65746120687474702d65717569763d5c22436f6e74656e742d547970655c2220636f6e74656e743d5c22746578742f68746d6c3b20636861727365743d7574662d385c223e3c6d657461206e616d653d5c2276696577706f72745c2220636f6e74656e743d5c2277696474683d6465766963652d77696474685c222f3e0d0a093c7469746c653e52657175657374205374617475733c2f7469746c653e0d0a3c2f686561643e0d0a3c626f6479206c6566746d617267696e3d5c22305c22206d617267696e6865696768743d5c22305c22206d617267696e77696474683d5c22305c2220746f706d617267696e3d5c22305c223e0d0a3c7461626c65206267636f6c6f723d5c22233764613263315c2220626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c222077696474683d5c223634305c223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c7464207374796c653d5c2270616464696e673a343070783b5c223e0d0a0909093c7461626c6520626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c22207374796c653d5c22626f726465723a233164343536372031707820736f6c69643b20666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b5c222077696474683d5c223631305c223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d5c224865616465725c22206865696768743d5c223134385c22207372633d5c227b7b55524c3a3a746f28246c6f676f297d7d5c22207374796c653d5c226d617267696e3a3070783b2070616464696e673a3070783b20626f726465723a6e6f6e653b5c222077696474683d5c223630385c22202f3e3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74642076616c69676e3d5c22746f705c223e0d0a0909090909093c7461626c65206267636f6c6f723d5c22234646464646465c2220626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d5c22325c223e0d0a0909090909090909093c6833207374796c653d5c2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b5c223e596f7572207265717565737420686173206265656e207b7b247374617475737d7d3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a313070782031357078203130707820313570783b20666f6e742d73697a653a313470783b206d617267696e3a3070783b5c223e3c7374726f6e673e44656172207b7b246e616d657d7d2c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e596f7572207265717565737420746f206368616e67652066756e64696e6720676f616c20616e642066756e64696e67206475726174696f6e20686173206265656e207b7b247374617475737d7d2e4b696e646c792076697369742066756e647374617274657220666f72206d6f72652064657461696c732e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c7464207374796c653d5c22666f6e742d73697a653a313270783b5c222076616c69676e3d5c22746f705c222077696474683d5c22313030255c223e0d0a0909090909090909093c6833207374796c653d5c2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b5c223e526567617264732c3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e7b7b2473656e6465726e616d657d7d3c2f703e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e3c693e7b7b2473656e646572656d61696c7d7d3c2f693e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c7464207374796c653d5c22666f6e742d73697a653a313270783b2070616464696e673a3130707820313570783b5c222076616c69676e3d5c22746f705c222077696474683d5c2230255c223e266e6273703b3c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, '2015-05-29 11:02:45', 0),
(15, 'approvalstatus', 'Status of your project approval', 'admin@casperon.in', 'admin', 0x3c21444f43545950452048544d4c3e0d0a3c68746d6c3e0d0a3c686561643e3c6d65746120687474702d65717569763d5c22436f6e74656e742d547970655c2220636f6e74656e743d5c22746578742f68746d6c3b20636861727365743d7574662d385c223e3c6d657461206e616d653d5c2276696577706f72745c2220636f6e74656e743d5c2277696474683d6465766963652d77696474685c222f3e0d0a093c7469746c653e417070726f76616c205374617475733c2f7469746c653e0d0a3c2f686561643e0d0a3c626f6479206c6566746d617267696e3d5c22305c22206d617267696e6865696768743d5c22305c22206d617267696e77696474683d5c22305c2220746f706d617267696e3d5c22305c223e0d0a3c7461626c65206267636f6c6f723d5c22233764613263315c2220626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c222077696474683d5c223634305c223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c7464207374796c653d5c2270616464696e673a343070783b5c223e0d0a0909093c7461626c6520626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c22207374796c653d5c22626f726465723a233164343536372031707820736f6c69643b20666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b5c222077696474683d5c223631305c223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d5c224865616465725c22206865696768743d5c223134385c22207372633d5c227b7b55524c3a3a746f28246c6f676f297d7d5c22207374796c653d5c226d617267696e3a3070783b2070616464696e673a3070783b20626f726465723a6e6f6e653b5c222077696474683d5c223630385c22202f3e3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74642076616c69676e3d5c22746f705c223e0d0a0909090909093c7461626c65206267636f6c6f723d5c22234646464646465c2220626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d5c22325c223e0d0a0909090909090909093c6833207374796c653d5c2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b5c223e596f75722070726f6a65637420686173206265656e207b7b247374617475737d7d2e3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a313070782031357078203130707820313570783b20666f6e742d73697a653a313470783b206d617267696e3a3070783b5c223e3c7374726f6e673e44656172207b7b246e616d657d7d2c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e596f75722070726f6a65637420686173206265656e207b7b247374617475737d7d2e4b696e646c792076697369742066756e647374617274657220666f72206d6f72652064657461696c73207468616e6b20666f72207669736974696e672e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c7464207374796c653d5c22666f6e742d73697a653a313270783b5c222076616c69676e3d5c22746f705c222077696474683d5c22313030255c223e0d0a0909090909090909093c6833207374796c653d5c2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b5c223e526567617264732c3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e7b7b2473656e6465726e616d657d7d3c2f703e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e3c693e7b7b2473656e646572656d61696c7d7d3c2f693e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c7464207374796c653d5c22666f6e742d73697a653a313270783b2070616464696e673a3130707820313570783b5c222076616c69676e3d5c22746f705c222077696474683d5c2230255c223e266e6273703b3c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, '2015-05-29 13:47:31', 0),
(16, 'followermail', 'New project on fundstarter by creator you are following', 'admin@casperon.in', 'admin', 0x3c703e4e65772070726f6a656374206f6e2066756e6473746172746572206279207b7b24666f6c6c6f77696e676e616d657d7d3c2f703e0d0a0d0a3c7461626c6520626f726465723d5c225c5c2671756f743b5c5c5c5c2671756f743b305c5c5c5c2671756f743b5c5c2671756f743b5c222063656c6c70616464696e673d5c225c5c2671756f743b5c5c5c5c2671756f743b305c5c5c5c2671756f743b5c5c2671756f743b5c222063656c6c73706163696e673d5c225c5c2671756f743b5c5c5c5c2671756f743b305c5c5c5c2671756f743b5c5c2671756f743b5c22207374796c653d5c225c5c2671756f743b5c5c5c5c2671756f743b77696474683a36343070785c5c5c5c2671756f743b5c5c2671756f743b5c223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c74643e0d0a0909093c7461626c6520626f726465723d5c225c5c2671756f743b5c5c5c5c2671756f743b305c5c5c5c2671756f743b5c5c2671756f743b5c222063656c6c70616464696e673d5c225c5c2671756f743b5c5c5c5c2671756f743b305c5c5c5c2671756f743b5c5c2671756f743b5c222063656c6c73706163696e673d5c225c5c2671756f743b5c5c5c5c2671756f743b305c5c5c5c2671756f743b5c5c2671756f743b5c22207374796c653d5c225c5c2671756f743b5c5c5c5c2671756f743b626f726465723a233164343536375c5c2671756f743b5c223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d5c225c5c2671756f743b5c5c5c5c2671756f743b4865616465725c5c5c5c2671756f743b5c5c2671756f743b5c22207372633d5c225c5c5c22207374796c653d5c225c5c2671756f743b5c5c5c5c2671756f743b626f726465723a6e6f6e655c5c2671756f743b5c22202f3e3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74643e0d0a0909090909093c7461626c6520626f726465723d5c225c5c2671756f743b5c5c5c5c2671756f743b305c5c5c5c2671756f743b5c5c2671756f743b5c222063656c6c70616464696e673d5c225c5c2671756f743b5c5c5c5c2671756f743b305c5c5c5c2671756f743b5c5c2671756f743b5c222063656c6c73706163696e673d5c225c5c2671756f743b5c5c5c5c2671756f743b305c5c5c5c2671756f743b5c5c2671756f743b5c223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d5c225c5c2671756f743b5c5c5c5c2671756f743b325c5c5c5c2671756f743b5c5c2671756f743b5c223e0d0a0909090909090909093c68333e4e65772070726f6a656374206f6e2066756e6473746172746572206279207b7b24666f6c6c6f77696e676e616d657d7d3c2f68333e0d0a0d0a0909090909090909093c703e3c7374726f6e673e44656172207b7b246e616d657d7d2c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c703e7b7b24666f6c6c6f77696e676e616d657d7d2061646465642061206e65772070726f6a656374206f6e2066756e64737461727465722e204b696e646c792076697369742066756e647374617274657220666f72206d6f72652064657461696c732e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c74643e0d0a0909090909090909093c68333e526567617264732c3c2f68333e0d0a0d0a0909090909090909093c703e7b7b2473656e6465726e616d657d7d3c2f703e0d0a0d0a0909090909090909093c703e3c656d3e7b7b2473656e646572656d61696c7d7d3c2f656d3e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c74643e266e6273703b3c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a, '2015-05-29 14:10:08', 0),
(20, 'test', 'test', 'tset', 'stet', 0x3c6d65746120687474702d65717569763d22436f6e74656e742d547970652220636f6e74656e743d22746578742f68746d6c3b20636861727365743d7574662d38223e3c6d657461206e616d653d2276696577706f72742220636f6e74656e743d2277696474683d6465766963652d7769647468222f3e0d0a3c7469746c653e3c2f7469746c653e0d0a3c7461626c65206267636f6c6f723d22233764613263312220626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d2230222077696474683d22363430223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c7464207374796c653d2270616464696e673a343070783b223e0d0a0909093c7461626c6520626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d223022207374796c653d22626f726465723a233164343536372031707820736f6c69643b20666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b222077696474683d22363130223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d2248656164657222206865696768743d2231343822207372633d227b7b55524c3a3a746f28246c6f676f297d7d22207374796c653d226d617267696e3a3070783b2070616464696e673a3070783b20626f726465723a6e6f6e653b222077696474683d2236303822202f3e3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74642076616c69676e3d22746f70223e0d0a0909090909093c7461626c65206267636f6c6f723d22234646464646462220626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d2230223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d2232223e0d0a0909090909090909093c6833207374796c653d2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b223e4e65772070726f6a656374206f6e2066756e6473746172746572206279207b7b24666f6c6c6f77696e676e616d657d7d3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a313070782031357078203130707820313570783b20666f6e742d73697a653a313470783b206d617267696e3a3070783b223e3c7374726f6e673e44656172207b7b246e616d657d7d2c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e7b7b24666f6c6c6f77696e676e616d657d7d2061646465642061206e65772070726f6a656374206f6e2066756e64737461727465722e204b696e646c792076697369742066756e647374617274657220666f72206d6f72652064657461696c732e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c7464207374796c653d22666f6e742d73697a653a313270783b222076616c69676e3d22746f70222077696474683d2231303025223e0d0a0909090909090909093c6833207374796c653d2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b223e526567617264732c3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e7b7b2473656e6465726e616d657d7d3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e3c693e7b7b2473656e646572656d61696c7d7d3c2f693e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c7464207374796c653d22666f6e742d73697a653a313270783b2070616464696e673a3130707820313570783b222076616c69676e3d22746f70222077696474683d223025223e266e6273703b3c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a, '2015-07-08 10:45:29', 0);
INSERT INTO `newsletters` (`id`, `templatename`, `subject`, `senderemail`, `sendername`, `emailcontent`, `createdon`, `subscription`) VALUES
(21, 'signupmessage', 'Thanks for registering with Fundstarter', 'admin@casperon.in', 'admin', 0x3c21444f43545950452048544d4c3e0d0a3c68746d6c3e0d0a3c686561643e3c6d65746120687474702d65717569763d22436f6e74656e742d547970652220636f6e74656e743d22746578742f68746d6c3b20636861727365743d7574662d38223e3c6d657461206e616d653d2276696577706f72742220636f6e74656e743d2277696474683d6465766963652d7769647468222f3e0d0a093c7469746c653e466f72676f742050617373776f72643c2f7469746c653e0d0a3c2f686561643e0d0a3c626f6479206c6566746d617267696e3d223022206d617267696e6865696768743d223022206d617267696e77696474683d22302220746f706d617267696e3d2230223e0d0a3c7461626c65206267636f6c6f723d22233764613263312220626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d2230222077696474683d22363430223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c7464207374796c653d2270616464696e673a343070783b223e0d0a0909093c7461626c6520626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d223022207374796c653d22626f726465723a233164343536372031707820736f6c69643b20666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b222077696474683d22363130223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d2248656164657222206865696768743d2231343822207372633d227b7b55524c3a3a746f28276c6f676f27297d7d22207374796c653d226d617267696e3a3070783b2070616464696e673a3070783b20626f726465723a6e6f6e653b222077696474683d2236303822202f3e3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74642076616c69676e3d22746f70223e0d0a0909090909093c7461626c65206267636f6c6f723d22234646464646462220626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d2230223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d2232223e0d0a0909090909090909093c6833207374796c653d2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b223e526567697374726174696f6e207375636365737366756c6c7920776974682066756e64737461727465723c2f68333e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a313070782031357078203130707820313570783b20666f6e742d73697a653a313470783b206d617267696e3a3070783b223e3c7374726f6e673e44656172207b7b246e616d657d7d2c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a313070782031357078203130707820313570783b20666f6e742d73697a653a313470783b206d617267696e3a3070783b223e266e6273703b20266e6273703b20266e6273703b20266e6273703b20266e6273703b20266e6273703b205468616e6b20796f7520666f72207265676973746572696e6720776974682046756e64737461727465722e204665656c206672656520746f20636f6e74616374207573266e6273703b666f7220616c6c20796f757220717565726965732e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c7464207374796c653d22666f6e742d73697a653a313270783b222076616c69676e3d22746f70222077696474683d2231303025223e0d0a0909090909090909093c6833207374796c653d2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b223e526567617264732c3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e7b7b2473656e6465726e616d657d7d3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e3c693e7b7b2473656e646572656d61696c7d7d3c2f693e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c7464207374796c653d22666f6e742d73697a653a313270783b2070616464696e673a3130707820313570783b222076616c69676e3d22746f70222077696474683d223025223e266e6273703b3c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, '2015-07-14 12:16:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paymentgateways`
--

CREATE TABLE IF NOT EXISTS `paymentgateways` (
`id` int(11) NOT NULL,
  `gatewayname` varchar(100) NOT NULL,
  `settings` mediumtext NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paymentgateways`
--

INSERT INTO `paymentgateways` (`id`, `gatewayname`, `settings`, `status`) VALUES
(1, 'Paypal IPN', 'a:3:{s:4:"mode";s:7:"sandbox";s:14:"merchant_email";s:26:"sivaprakash@teamtweaks.com";s:14:"paypal_ipn_url";s:58:"http://192.168.1.253/sivaprakash/etsy/site/order/ipnpaymet";}', 'active'),
(2, 'Stripe', 'a:3:{s:4:"mode";s:7:"sandbox";s:10:"secret_key";s:32:"sk_test_0tTTuvYsRdKGPkZ0McunhY4P";s:15:"publishable_key";s:32:"pk_test_PT3XNxa5eYTVkfGBqmslDEMX";}', 'active'),
(3, 'Paypal', 'a:5:{s:4:"mode";s:7:"sandbox";s:11:"gatewayname";s:6:"Paypal";s:8:"username";s:22:"admin_api1.casperon.in";s:8:"password";s:16:"UFDKCLX7VHNALYVF";s:9:"signature";s:56:"AFcWxV21C7fd0v3bYYYRCpSSRl31Awzkb9OTqj.wTHEs5P1eM5wgk3zh";}', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `paymenthosts`
--

CREATE TABLE IF NOT EXISTS `paymenthosts` (
`id` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `hostid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `transactionid` int(11) NOT NULL,
  `transactiondate` date NOT NULL,
  `transactiontype` varchar(100) NOT NULL,
  `paymentstatus` enum('active','inactive') NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
`id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `backingid` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `paykey` varchar(125) NOT NULL,
  `transactionid` varchar(125) NOT NULL,
  `shippingstatus` enum('active','inactive') NOT NULL,
  `paymenttype` int(11) NOT NULL,
  `payeremail` varchar(125) NOT NULL,
  `recievedstatus` enum('active','inactive') NOT NULL,
  `paidon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prefooters`
--

CREATE TABLE IF NOT EXISTS `prefooters` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `footerlink` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prefooters`
--

INSERT INTO `prefooters` (`id`, `title`, `description`, `footerlink`, `image`, `status`, `createdon`) VALUES
(1, 'Our Partner', 'test', 'www.link.com', 'uploads/images/prefooters/795846.jpg', 'active', '2015-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `subcategoryid` int(11) NOT NULL,
  `shortblurb` mediumtext NOT NULL,
  `location` varchar(255) NOT NULL,
  `fundingduration` varchar(100) NOT NULL,
  `fundinggoal` double DEFAULT NULL,
  `totalpledgeamount` float(10,2) NOT NULL,
  `totalbacking` int(45) NOT NULL,
  `currencyid` int(11) NOT NULL,
  `projectimage` varchar(125) NOT NULL,
  `projectvideo` varchar(100) NOT NULL,
  `description` blob NOT NULL,
  `risks` blob NOT NULL,
  `likes` int(45) NOT NULL,
  `popular` tinyint(4) NOT NULL,
  `newandnoteworthy` tinyint(11) NOT NULL,
  `projectoftheday` tinyint(4) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  `isfunded` tinyint(4) NOT NULL,
  `createdon` date NOT NULL,
  `updatedon` date NOT NULL,
  `endingon` date NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(125) NOT NULL,
  `state` varchar(125) NOT NULL,
  `country` varchar(125) NOT NULL,
  `pincode` int(45) NOT NULL,
  `recipient` enum('individual','organisation') NOT NULL,
  `businessname` varchar(255) NOT NULL,
  `businesstype` varchar(255) NOT NULL,
  `idverified` tinyint(4) NOT NULL,
  `identityproof` varchar(255) NOT NULL,
  `prooftype` varchar(125) NOT NULL,
  `proofverified` tinyint(4) NOT NULL,
  `verifiedon` date NOT NULL,
  `feerecieved` tinyint(4) NOT NULL,
  `paypalemail` varchar(255) NOT NULL,
  `metatitle` varchar(255) NOT NULL,
  `metakeyword` mediumtext NOT NULL,
  `metadescription` mediumtext NOT NULL,
  `fundingtype` enum('fixed','flexible') NOT NULL,
  `projectverified` tinyint(4) NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `userid`, `categoryid`, `subcategoryid`, `shortblurb`, `location`, `fundingduration`, `fundinggoal`, `totalpledgeamount`, `totalbacking`, `currencyid`, `projectimage`, `projectvideo`, `description`, `risks`, `likes`, `popular`, `newandnoteworthy`, `projectoftheday`, `remarks`, `isfunded`, `createdon`, `updatedon`, `endingon`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `recipient`, `businessname`, `businesstype`, `idverified`, `identityproof`, `prooftype`, `proofverified`, `verifiedon`, `feerecieved`, `paypalemail`, `metatitle`, `metakeyword`, `metadescription`, `fundingtype`, `projectverified`, `deleted_at`) VALUES
(1, 'sample project', 1, 1, 0, 'test blurb', '215', '29', 31.90999984741211, 0.00, 0, 1, 'uploads/images/projects/sample project/projectimage.jpg', 'uploads/images/projects/1/projectvideo.jpg', 0x3c703e746573742064656372697074696f6e3c2f703e, 0x74657374205269736b732026204368616c6c656e676573, 0, 1, 1, 1, 'Sample admin remarks', 0, '2015-07-27', '2015-07-27', '2015-12-25', 'sample', 'sample', 'sample', 'sample', 'India', 123121, 'individual', '', '', 2, 'uploads/images/projects/1/identityproof.jpg', 'driving license', 2, '2015-07-27', 0, 'sample@gmail.com', '', '', '', 'fixed', 2, '0000-00-00 00:00:00'),
(3, 'sample', 2, 1, 0, '', '64', '', 0, 0.00, 0, 0, '', '', '', '', 0, 0, 0, 0, '', 0, '2015-08-14', '0000-00-00', '0000-00-00', '', '', '', '', '', 0, 'individual', '', '', 0, '', '', 0, '0000-00-00', 0, '', '', '', '', 'fixed', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `projectviews`
--

CREATE TABLE IF NOT EXISTS `projectviews` (
`id` int(45) NOT NULL,
  `projectid` int(45) NOT NULL,
  `ipaddress` varchar(45) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projectviews`
--

INSERT INTO `projectviews` (`id`, `projectid`, `ipaddress`, `created`) VALUES
(1, 1, '192.168.1.50', '2015-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
`id` int(45) NOT NULL,
  `projecttitle` varchar(255) NOT NULL,
  `projectid` int(45) NOT NULL,
  `fundinggoal` int(45) NOT NULL,
  `fundingduration` int(45) NOT NULL,
  `message` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE IF NOT EXISTS `rewards` (
`id` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `pledgeamount` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `shippinginvolved` tinyint(4) NOT NULL,
  `shippingdetails` varchar(500) NOT NULL,
  `estimateddelivery` varchar(45) NOT NULL,
  `islimited` tinyint(4) NOT NULL,
  `quantity` int(11) NOT NULL,
  `countrylist` mediumtext NOT NULL,
  `backerscount` int(45) NOT NULL,
  `createdon` date NOT NULL,
  `updatedon` date NOT NULL,
  `cname` varchar(250) NOT NULL,
  `cvalue` varchar(250) NOT NULL,
  `rvalue` int(11) NOT NULL,
  `checkbox` enum('on','off') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`id`, `projectid`, `pledgeamount`, `description`, `shippinginvolved`, `shippingdetails`, `estimateddelivery`, `islimited`, `quantity`, `countrylist`, `backerscount`, `createdon`, `updatedon`, `cname`, `cvalue`, `rvalue`, `checkbox`) VALUES
(1, 1, 10, 'test decrtiption test', 0, '', '12-2015', 1, 100, '', 0, '2015-07-27', '2015-08-07', '', '', 0, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `sendmsgs`
--

CREATE TABLE IF NOT EXISTS `sendmsgs` (
`id` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `recieverid` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `senton` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
`id` int(11) NOT NULL,
  `slidername` varchar(125) NOT NULL,
  `slidertitle` varchar(100) NOT NULL,
  `sliderimage` varchar(255) NOT NULL,
  `sliderdescription` varchar(255) NOT NULL,
  `status` varchar(65) NOT NULL,
  `sliderurl` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slidername`, `slidertitle`, `sliderimage`, `sliderdescription`, `status`, `sliderurl`) VALUES
(1, 'homeslider1', 'Little Libraries, Big Impact', 'uploads/images/sliders/239361.jpg', 'Little Libraries, Big Impact', 'active', 'http://www.casperon.com'),
(2, 'slider2', 'A Bright Idea', 'uploads/images/sliders/845834.jpg', 'Meet the creativity of the future.', 'active', 'http://www.casperon.com');

-- --------------------------------------------------------

--
-- Table structure for table `starredprojects`
--

CREATE TABLE IF NOT EXISTS `starredprojects` (
`id` int(45) NOT NULL,
  `userid` int(45) NOT NULL,
  `projectid` int(45) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
`id` int(11) NOT NULL,
  `countryid` int(11) NOT NULL,
  `statecode` varchar(32) NOT NULL,
  `statename` varchar(32) NOT NULL,
  `status` enum('inactive','active') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staticpages`
--

CREATE TABLE IF NOT EXISTS `staticpages` (
`id` int(11) NOT NULL,
  `pagename` varchar(100) NOT NULL,
  `pagetitle` varchar(100) NOT NULL,
  `seourl` varchar(255) NOT NULL,
  `hidden` varchar(45) NOT NULL,
  `category` enum('main','sub') NOT NULL,
  `parent` varchar(45) NOT NULL,
  `metaname` varchar(255) NOT NULL,
  `metadescription` blob NOT NULL,
  `description` blob NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `header` enum('on','off') NOT NULL,
  `footer` enum('on','off') NOT NULL,
  `metakeyword` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
`id` int(45) NOT NULL,
  `categoryid` int(45) NOT NULL,
  `subcategoryname` varchar(125) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
`id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `verificationcode` varchar(45) NOT NULL,
  `isverified` enum('no','yes') NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `verificationcode`, `isverified`, `status`, `createdon`) VALUES
(1, 'sampleuser@gmail.com', '16537', 'yes', 'active', '2015-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE IF NOT EXISTS `updates` (
`id` int(45) NOT NULL,
  `projectid` int(125) NOT NULL,
  `userid` int(125) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` blob NOT NULL,
  `postedon` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `projectid`, `userid`, `title`, `description`, `postedon`) VALUES
(1, 1, 1, 'sample art of plant test', 0x3c703e74657374207570646174696f6e3c62723e3c2f703e, '2015-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `logintype` varchar(65) NOT NULL,
  `twitterid` varchar(255) NOT NULL,
  `mobileveificationcode` varchar(45) NOT NULL,
  `emailverificationcode` varchar(45) NOT NULL,
  `mobilestatus` tinyint(4) NOT NULL,
  `emailstatus` tinyint(4) NOT NULL,
  `createdon` date NOT NULL,
  `modifiedon` date NOT NULL,
  `lastlogindate` datetime NOT NULL,
  `lastlogoutdate` datetime NOT NULL,
  `lastloginip` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `biography` mediumtext NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(65) NOT NULL,
  `state` varchar(60) NOT NULL,
  `country` varchar(65) NOT NULL,
  `postalcode` int(11) NOT NULL,
  `vanityurl` varchar(125) NOT NULL,
  `weburl` varchar(255) NOT NULL,
  `followerscount` int(11) NOT NULL,
  `followingcount` int(11) NOT NULL,
  `followers` varchar(255) NOT NULL,
  `following` mediumtext NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `subscription` tinyint(4) NOT NULL,
  `loginhit` int(11) NOT NULL,
  `createdcount` int(45) NOT NULL,
  `backedcount` int(45) NOT NULL,
  `packageid` int(45) NOT NULL,
  `packageenddate` date NOT NULL,
  `staffpick` tinyint(4) NOT NULL,
  `happening` tinyint(4) NOT NULL,
  `newsandevents` tinyint(4) NOT NULL,
  `backerupdates` tinyint(4) NOT NULL,
  `creatorpledges` tinyint(4) NOT NULL,
  `creatorcomments` tinyint(4) NOT NULL,
  `friendactivity` tinyint(4) NOT NULL,
  `newfollowers` tinyint(4) NOT NULL,
  `newlikes` tinyint(4) NOT NULL,
  `referrerid` int(125) NOT NULL,
  `referrercredit` int(125) NOT NULL,
  `username` varchar(125) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `adminremarks` mediumtext NOT NULL,
  `privilege` mediumtext NOT NULL,
  `paypalemail` varchar(255) NOT NULL,
  `prooftype` varchar(125) NOT NULL,
  `idproof` varchar(125) NOT NULL,
  `accountverified` tinyint(4) NOT NULL,
  `sandbox_stripe_access_token` varchar(255) NOT NULL,
  `sandbox_stripe_refresh_token` varchar(255) NOT NULL,
  `sandbox_stripe_publishable_key` varchar(255) NOT NULL,
  `sandbox_stripe_user_id` varchar(255) NOT NULL,
  `sandbox_stripe_token_type` varchar(255) NOT NULL,
  `live_stripe_access_token` varchar(255) NOT NULL,
  `live_stripe_refresh_token` varchar(255) NOT NULL,
  `live_stripe_publishable_key` varchar(255) NOT NULL,
  `live_stripe_user_id` varchar(255) NOT NULL,
  `live_stripe_token_type` varchar(255) NOT NULL,
  `stripe_customerid` varchar(255) NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `mobile`, `password`, `status`, `logintype`, `twitterid`, `mobileveificationcode`, `emailverificationcode`, `mobilestatus`, `emailstatus`, `createdon`, `modifiedon`, `lastlogindate`, `lastlogoutdate`, `lastloginip`, `image`, `biography`, `address`, `city`, `state`, `country`, `postalcode`, `vanityurl`, `weburl`, `followerscount`, `followingcount`, `followers`, `following`, `facebook`, `twitter`, `google`, `dob`, `gender`, `subscription`, `loginhit`, `createdcount`, `backedcount`, `packageid`, `packageenddate`, `staffpick`, `happening`, `newsandevents`, `backerupdates`, `creatorpledges`, `creatorcomments`, `friendactivity`, `newfollowers`, `newlikes`, `referrerid`, `referrercredit`, `username`, `question`, `answer`, `adminremarks`, `privilege`, `paypalemail`, `prooftype`, `idproof`, `accountverified`, `sandbox_stripe_access_token`, `sandbox_stripe_refresh_token`, `sandbox_stripe_publishable_key`, `sandbox_stripe_user_id`, `sandbox_stripe_token_type`, `live_stripe_access_token`, `live_stripe_refresh_token`, `live_stripe_publishable_key`, `live_stripe_user_id`, `live_stripe_token_type`, `stripe_customerid`, `deleted_at`) VALUES
(1, 'sample', 'user', 'sampleuser@gmail.com', '', '$2y$10$ks/o3mJUrLt3LKS5kVl.8.4OxYDRqIRvekbe04RBYNPq8CyICDKq6', 'active', 'normal', '', '', '', 1, 1, '2015-07-25', '0000-00-00', '2015-11-26 08:12:37', '0000-00-00 00:00:00', '192.168.1.50', 'uploads/images/users//sampleuser@gmail.com.png', 'no biography', '', '', 'TN', 'United States', 0, '', 'www.venki.com', 0, 0, '', '', '', '', '', '0000-00-00', '', 0, 2, 2, 0, 0, '0000-00-00', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 'sample', 'What was your childhood nickname?', 'sample', '  sample', '', '', '', '', 2, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE IF NOT EXISTS `wp_commentmeta` (
`meta_id` bigint(20) unsigned NOT NULL,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE IF NOT EXISTS `wp_comments` (
`comment_ID` bigint(20) unsigned NOT NULL,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE IF NOT EXISTS `wp_links` (
`link_id` bigint(20) unsigned NOT NULL,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE IF NOT EXISTS `wp_options` (
`option_id` bigint(20) unsigned NOT NULL,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE IF NOT EXISTS `wp_postmeta` (
`meta_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE IF NOT EXISTS `wp_posts` (
`ID` bigint(20) unsigned NOT NULL,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(20) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE IF NOT EXISTS `wp_terms` (
`term_id` bigint(20) unsigned NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE IF NOT EXISTS `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `wp_term_taxonomy` (
`term_taxonomy_id` bigint(20) unsigned NOT NULL,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE IF NOT EXISTS `wp_usermeta` (
`umeta_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE IF NOT EXISTS `wp_users` (
`ID` bigint(20) unsigned NOT NULL,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminsettings`
--
ALTER TABLE `adminsettings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backings`
--
ALTER TABLE `backings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followprojects`
--
ALTER TABLE `followprojects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inboxmsgs`
--
ALTER TABLE `inboxmsgs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentgateways`
--
ALTER TABLE `paymentgateways`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymenthosts`
--
ALTER TABLE `paymenthosts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefooters`
--
ALTER TABLE `prefooters`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projectviews`
--
ALTER TABLE `projectviews`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sendmsgs`
--
ALTER TABLE `sendmsgs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `starredprojects`
--
ALTER TABLE `starredprojects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staticpages`
--
ALTER TABLE `staticpages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
 ADD PRIMARY KEY (`meta_id`), ADD KEY `comment_id` (`comment_id`), ADD KEY `meta_key` (`meta_key`);

--
-- Indexes for table `wp_comments`
--
ALTER TABLE `wp_comments`
 ADD PRIMARY KEY (`comment_ID`), ADD KEY `comment_post_ID` (`comment_post_ID`), ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`), ADD KEY `comment_date_gmt` (`comment_date_gmt`), ADD KEY `comment_parent` (`comment_parent`);

--
-- Indexes for table `wp_links`
--
ALTER TABLE `wp_links`
 ADD PRIMARY KEY (`link_id`), ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `wp_options`
--
ALTER TABLE `wp_options`
 ADD PRIMARY KEY (`option_id`), ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
 ADD PRIMARY KEY (`meta_id`), ADD KEY `post_id` (`post_id`), ADD KEY `meta_key` (`meta_key`);

--
-- Indexes for table `wp_posts`
--
ALTER TABLE `wp_posts`
 ADD PRIMARY KEY (`ID`), ADD KEY `post_name` (`post_name`), ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`), ADD KEY `post_parent` (`post_parent`), ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `wp_terms`
--
ALTER TABLE `wp_terms`
 ADD PRIMARY KEY (`term_id`), ADD UNIQUE KEY `slug` (`slug`), ADD KEY `name` (`name`);

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
 ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`), ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
 ADD PRIMARY KEY (`term_taxonomy_id`), ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`), ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
 ADD PRIMARY KEY (`umeta_id`), ADD KEY `user_id` (`user_id`), ADD KEY `meta_key` (`meta_key`);

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
 ADD PRIMARY KEY (`ID`), ADD KEY `user_login_key` (`user_login`), ADD KEY `user_nicename` (`user_nicename`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `adminsettings`
--
ALTER TABLE `adminsettings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `backings`
--
ALTER TABLE `backings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=231;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `followprojects`
--
ALTER TABLE `followprojects`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `inboxmsgs`
--
ALTER TABLE `inboxmsgs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `paymentgateways`
--
ALTER TABLE `paymentgateways`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `paymenthosts`
--
ALTER TABLE `paymenthosts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prefooters`
--
ALTER TABLE `prefooters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `projectviews`
--
ALTER TABLE `projectviews`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sendmsgs`
--
ALTER TABLE `sendmsgs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `starredprojects`
--
ALTER TABLE `starredprojects`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staticpages`
--
ALTER TABLE `staticpages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
MODIFY `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_comments`
--
ALTER TABLE `wp_comments`
MODIFY `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_links`
--
ALTER TABLE `wp_links`
MODIFY `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_options`
--
ALTER TABLE `wp_options`
MODIFY `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
MODIFY `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_terms`
--
ALTER TABLE `wp_terms`
MODIFY `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
MODIFY `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
MODIFY `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
