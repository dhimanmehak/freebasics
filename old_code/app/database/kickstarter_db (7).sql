-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2015 at 01:52 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kickstarter_db`
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
  `admintype` enum('super','sub') NOT NULL,
  `previleges` text NOT NULL,
  `lastlogindate` datetime NOT NULL,
  `lastlogoutdate` datetime NOT NULL,
  `lastloginip` varchar(16) NOT NULL,
  `isverified` tinyint(4) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `createdon` date NOT NULL,
  `modifiedon` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `admintype`, `previleges`, `lastlogindate`, `lastlogoutdate`, `lastloginip`, `isverified`, `status`, `createdon`, `modifiedon`) VALUES
(1, 'Administrator', 'admin@casperon.in', '$2y$10$kjlh4pZokZcVDROl99reVOwUlIp4zuiQBBFqrRO1n6UmNcfehm7g2', 'super', 'all', '2015-04-28 11:33:39', '2015-03-30 14:13:31', '127.0.0.1', 1, 'active', '2015-03-04', '2015-04-20'),
(2, 'vinothini', 'vinothini@casperon.in', '$2y$10$HJhx2x7GhxNTj0tcFS7Qz.ohinbxJMiuqbp6s2cYSDDXirAaDOurm', 'sub', 'all', '2015-03-05 13:12:09', '2015-03-05 13:43:20', '127.0.0.1', 1, 'active', '2015-03-05', '2015-03-10'),
(3, 'subuser', 'subuser@casperon.in', '$2y$10$7IXYRkC/5xVmcTlptu7Dhe9k1HBemaqFBBPcDki1gsN9BxSvFdrX.', 'sub', 'all', '2015-03-05 13:43:48', '0000-00-00 00:00:00', '127.0.0.1', 1, 'active', '2015-03-05', '2015-03-05'),
(5, 'test', 'test@casperon.in', '$2y$10$RLdeOPrdje1ER6fTiRNBaOY6/xRQENxYxCbDvvOmvbxTMSOQ6VLoa', 'sub', 'all', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 'inactive', '2015-03-05', '2015-03-11'),
(7, 'finaltest', 'finaltest@casperon.in', '$2y$10$TIebA4gGHCChJaHdBDuF8e58fNThljFD2azE5GKk6PgD6b8Ux63gi', 'sub', 'all', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 'active', '2015-03-05', '2015-03-11');

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
  `googleanalyticscode` text NOT NULL,
  `facebooklink` varchar(100) NOT NULL,
  `twitterlink` varchar(100) NOT NULL,
  `pinterestlink` varchar(100) NOT NULL,
  `googlepluslink` varchar(100) NOT NULL,
  `linkedinlink` varchar(100) NOT NULL,
  `rsslink` varchar(100) NOT NULL,
  `youtubelink` varchar(100) NOT NULL,
  `footercontent` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `metatitle` varchar(100) NOT NULL,
  `metakeyword` varchar(100) NOT NULL,
  `metadescription` text NOT NULL,
  `favicon` varchar(125) NOT NULL,
  `watermark` varchar(125) NOT NULL,
  `facebookapi` varchar(125) NOT NULL,
  `facebooksecretkey` varchar(125) NOT NULL,
  `paypalmode` varchar(125) NOT NULL,
  `paypalapiname` varchar(55) NOT NULL,
  `paypalapipwd` varchar(125) NOT NULL,
  `paypalapikey` varchar(255) NOT NULL,
  `paypalid` varchar(150) NOT NULL,
  `paypallive` varchar(255) NOT NULL,
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
  `liketext` text NOT NULL,
  `unliketext` text NOT NULL,
  `bannertext` text NOT NULL,
  `twilioaccountid` varchar(150) NOT NULL,
  `twilioaccounttoken` varchar(125) NOT NULL,
  `twiliophonenumber` int(11) NOT NULL,
  `googlemapapi` varchar(125) NOT NULL,
  `hometitle1` varchar(45) NOT NULL,
  `hometitle2` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminsettings`
--

INSERT INTO `adminsettings` (`id`, `adminname`, `adminemail`, `dropboxemail`, `dropboxpassword`, `contactmail`, `contactnumber`, `sitetitle`, `paginationlimit`, `googleverification`, `googleanalyticscode`, `facebooklink`, `twitterlink`, `pinterestlink`, `googlepluslink`, `linkedinlink`, `rsslink`, `youtubelink`, `footercontent`, `logo`, `metatitle`, `metakeyword`, `metadescription`, `favicon`, `watermark`, `facebookapi`, `facebooksecretkey`, `paypalmode`, `paypalapiname`, `paypalapipwd`, `paypalapikey`, `paypalid`, `paypallive`, `smtphost`, `smtpport`, `smtpusername`, `smtppassword`, `consumerkey`, `consumersecret`, `accesstoken`, `accesstokensecret`, `googleclientsecret`, `googleclientid`, `googleredirecturl`, `googledeveloperkey`, `facebookappid`, `liketext`, `unliketext`, `bannertext`, `twilioaccountid`, `twilioaccounttoken`, `twiliophonenumber`, `googlemapapi`, `hometitle1`, `hometitle2`) VALUES
(2, 'Administrator', 'admin@casperon.in', '', '', 'vinothini@casperon.in', 984561237, 'Fundstarter', 20, 'drt546erte5edr', 'ium89yrn9y7yhkbtt', 'www.facebook.com/fundstarter', 'www.twitter.com/fundstarter', 'www.pinterest.com/fundstarter', 'plus.google.com/fundstarter', '', '', 'www.youtube.com/fundstarter', 'Copyrights 2015. All rights reserved.', 'uploads/images/logo.png', 'Fundstarter', 'post and back projects', 'post ur projects and earn money', 'uploads/images/favicon.png', 'uploads/images/242712.jpg', '', '5ad94c08322837753e972192411189a6', 'sandbox', 'admin_api1.casperon.in', 'UFDKCLX7VHNALYVF', 'AFcWxV21C7fd0v3bYYYRCpSSRl31Awzkb9OTqj.wTHEs5P1eM5wgk3zh', 'APP-80W284485P519543T', '', 'smtp.gmail.com', 587, 'vinothini', '111', 'gn24Z1tEJEU8Y8Iw6hZZ0mcIt', 'OUoe2QsNKLCoe6UP7lqPCYT2PfcLuxO3OGRG94nPeoF4TJ7BCf', '2258770255-NWmZl1Zm4YwLjQORvSvLTutjvkQweNuXxRTJPXi', 'E7GEuDuLinrE9RJXkVfHiPAwKootTsAuQ6sxtem0qlNHa', '2312q4r3rw54w4', 'AC86dee6bbb798', 'www.google.com', 'AC86dee6bbb798dfa194415808420c6518', '1593859854164269', '', '', 'Post and back projects..', 'AC86dee6bbb798dfa194415808420c6518', '0a4495ba71d620a5981f0527743e5de4', 2147483647, 'AIzaSyC5YIg8-Yk_zqjzWpFyZrgYuzzjTCBJV7k', 'Fundstarter', '');

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
  `cardnumber` int(45) NOT NULL,
  `expirydate` varchar(125) NOT NULL,
  `cvv` int(11) NOT NULL,
  `isremember` tinyint(4) NOT NULL,
  `billingaddress1` varchar(255) NOT NULL,
  `billingaddress2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postalcode` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backings`
--

INSERT INTO `backings` (`id`, `userid`, `pledgeamount`, `projectid`, `rewardid`, `categoryid`, `cardname`, `cardnumber`, `expirydate`, `cvv`, `isremember`, `billingaddress1`, `billingaddress2`, `city`, `postalcode`, `country`, `status`, `createdon`) VALUES
(12, 15, 1, 6, 0, 1, 'trt', 0, '1-2015', 45, 0, 'dfgf', 'dgdfg', 'dfgdf', 6456454, 'Andorra', 0, '2015-03-19'),
(13, 16, 2, 6, 0, 1, 'gsdfgdfg', 2147483647, '1-2015', 5654, 1, 'ryty', 'tyrty', 'tygfh', 5645645, 'Afghanistan', 0, '2015-03-19'),
(14, 16, 25, 3, 12, 1, 'vinothini', 2147483647, '1-2015', 787, 1, 'mylapore', 'mylapore', 'chennai', 890665, 'India', 0, '2015-03-19'),
(17, 1, 10, 7, 0, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-04'),
(18, 1, 11, 12, 0, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-04'),
(20, 16, 5, 13, 32, 0, 'vinothini', 2147483647, '1-2015', 343, 1, 'dfgdfg', 'dgdfg fg', 'Chennai', 656445, 'India', 0, '2015-04-04'),
(21, 1, 25, 7, 16, 0, 'vino', 2147483647, '1-2015', 544, 0, 'chennai', 'Chennai', 'Chennai', 600018, 'Andorra', 0, '2015-04-08'),
(22, 1, 50, 7, 0, 0, 'vino', 2147483647, '1-2015', 544, 1, 'chennai', 'Chennai', 'Chennai', 600018, 'Belgium', 0, '2015-04-09'),
(34, 1, 5, 7, 0, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-20'),
(35, 1, 5, 7, 0, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-20'),
(36, 1, 5, 7, 0, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-20'),
(37, 1, 5, 7, 0, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-20'),
(38, 1, 5, 7, 0, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-20'),
(39, 1, 5, 7, 0, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-20'),
(40, 1, 5, 7, 0, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-20'),
(41, 1, 5, 7, 0, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-20'),
(42, 1, 5, 7, 0, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-20'),
(43, 1, 2, 7, 0, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-20'),
(47, 1, 20, 7, 0, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-21'),
(48, 1, 12, 7, 0, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-21'),
(49, 15, 20, 7, 0, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-21'),
(52, 16, 50, 18, 38, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-21'),
(53, 1, 50, 18, 0, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-21'),
(54, 1, 10, 14, 0, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-21'),
(55, 16, 2, 22, 0, 0, '', 0, '', 0, 0, '', '', '', 0, '', 0, '2015-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `categoryname` varchar(100) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryname`, `status`, `createdon`) VALUES
(1, 'Art', 'active', '2015-03-03'),
(4, 'Photography', 'active', '2015-03-06'),
(5, 'Comics', 'active', '2015-03-24'),
(6, 'Dance', 'active', '2015-03-24'),
(7, 'Design', 'active', '2015-03-24'),
(8, 'Fashion', 'active', '2015-03-24'),
(9, 'Film & Video', 'active', '2015-03-24'),
(10, 'Food', 'active', '2015-03-24'),
(11, 'Games', 'active', '2015-03-24'),
(12, 'Journalism', 'active', '2015-03-24'),
(13, 'Music', 'active', '2015-03-24'),
(14, 'Publishing', 'active', '2015-03-24'),
(15, 'Technology', 'active', '2015-03-24'),
(16, 'Theater', 'active', '2015-03-24'),
(17, 'Crafts', 'active', '2015-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
`id` int(11) NOT NULL,
  `stateid` int(11) NOT NULL,
  `cityname` varchar(65) NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(45) NOT NULL,
  `projectid` int(45) NOT NULL,
  `userid` int(45) NOT NULL,
  `comment` text NOT NULL,
  `postedon` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `projectid`, `userid`, `comment`, `postedon`) VALUES
(1, 6, 16, 'Lovely project.Excellent work.', '2015-03-27'),
(2, 3, 16, 'Great work..:)', '2015-03-27'),
(4, 7, 1, ' fjgij gjfog opg opsroptg eopgigpotigkpi kgpoikfopftghrtghryh ', '2015-04-07'),
(7, 7, 1, ' wqe ew eqwe qweweqweq qwewe qwe e w eqeqweqweqwe', '2015-04-07'),
(15, 3, 16, ' my comment to send mail', '2015-04-08'),
(17, 3, 16, ' hi dis s vino..:)', '2015-04-08'),
(20, 3, 16, ' hello', '2015-04-08');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `firstname`, `lastname`, `email`, `mobile`, `subject`, `message`, `createdon`) VALUES
(1, 'vinothini', 'venkatesan', 'vinothini@casperon.in', 1234564789, 'Regarding test', 'This message is just to test the contact listings..:)', '2015-03-10'),
(2, 'sample', 'sample', 'sample', 0, 'uploads/images/file.zip', 'uploads/images/file.zip', '2015-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
`id` int(255) NOT NULL,
  `countryid` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `countrycode` varchar(2) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `countrymobilecode` varchar(200) NOT NULL,
  `countryname` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `currencytype` char(3) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `currencysymbol` text NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL DEFAULT 'active',
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `defaultcurrency` enum('No','Yes') CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL DEFAULT 'No'
) ENGINE=MyISAM AUTO_INCREMENT=233 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryid`, `countrycode`, `countrymobilecode`, `countryname`, `currencytype`, `currencysymbol`, `status`, `createdon`, `defaultcurrency`) VALUES
(1, 'EU', 'AD', '+376', 'Andorra', 'EUR', '$', 'active', '2015-03-10 09:25:21', 'No'),
(2, 'AS', 'AE', '+971', 'United Arab Emirates', 'AED', '$', 'active', '2014-12-13 02:30:58', 'No'),
(3, 'AS', 'AF', '+93 ', 'Afghanistan', 'AFN', '0', 'active', '2014-12-13 02:32:49', 'No'),
(4, 'NA', 'AG', '+268', 'Antigua And Barbuda', 'XCD', '$', 'active', '2014-12-13 02:34:56', 'No'),
(5, 'EU', 'AL', '+355', 'Albania', 'ALL', 'EUR', 'active', '2015-03-10 09:25:37', 'No'),
(6, 'AS', 'AM', '+374', 'Armenia', 'AMD', '', 'active', '2014-12-13 02:35:30', 'No'),
(7, 'AF', 'AO', '+244', 'Angola', 'AOA', '', 'active', '2014-12-13 02:35:47', 'No'),
(8, 'AN', 'AQ', '+672', 'Antarctica', 'XCD', '', 'active', '2014-12-13 02:36:04', 'No'),
(9, 'SA', 'AR', '+54 ', 'Argentina', 'ARS', '', 'active', '2014-12-13 02:36:52', 'No'),
(10, 'OC', 'AS', '+684', 'American Samoa', 'USD', '', 'active', '2014-12-13 02:37:29', 'No'),
(11, 'EU', 'AT', '+43', 'Austria', 'EUR', '', 'active', '2014-12-13 02:37:46', 'No'),
(12, 'OC', 'AU', '+61', 'Australia', 'AUD', '$', 'active', '2014-12-13 02:38:00', 'No'),
(13, 'NA', 'AW', '+297', 'Aruba', 'AWG', '', 'active', '2014-12-13 02:38:47', 'No'),
(14, '', 'AX', '+358\n', 'Aland Islands', 'EUR', '€', 'active', '2014-12-13 02:40:15', 'Yes'),
(15, 'AS', 'AZ', '+994', 'Azerbaijan', 'AZN', '', 'active', '2014-12-13 02:40:43', 'No'),
(16, '', 'BA', '+387', 'Bosnia And Herzegovina', 'BAM', '', 'active', '2014-12-13 02:40:57', 'No'),
(17, 'NA', 'BB', '+246', 'Barbados', 'BBD', '', 'active', '2014-12-13 02:42:49', 'No'),
(18, 'AS', 'BD', '+880', 'Bangladesh', 'BDT', '', 'active', '2014-12-13 02:43:02', 'No'),
(19, 'EU', 'BE', '+32', 'Belgium', 'EUR', '', 'active', '2014-12-13 02:43:36', 'No'),
(20, 'AF', 'BF', '+226', 'Burkina Faso', 'XOF', '', 'active', '2014-12-13 02:44:05', 'No'),
(21, 'EU', 'BG', '+359', 'Bulgaria', 'BGN', '', 'active', '2014-12-13 02:44:27', 'No'),
(22, 'AS', 'BH', '+973', 'Bahrain', 'BHD', '', 'active', '2014-12-13 02:44:48', 'No'),
(23, 'AF', 'BI', '+257', 'Burundi', 'BIF', '', 'active', '2014-12-13 02:45:04', 'No'),
(24, 'AF', 'BJ', '+229 ', 'Benin', 'XOF', '', 'active', '2014-12-13 02:45:36', 'No'),
(25, 'NA', 'BM', '+1441', 'Bermuda', 'BMD', '', 'active', '2014-12-13 02:46:42', 'No'),
(26, '', 'BN', '+673', 'Brunei', 'BND', '', 'active', '2014-12-13 02:46:54', 'No'),
(27, 'SA', 'BO', '+591', 'Bolivia', 'BOB', '', 'active', '2014-12-13 02:47:16', 'No'),
(28, '', 'BQ', '+599', 'Bonaire, Saint Eustatius And Saba ', 'USD', '', 'active', '2014-12-13 02:48:11', 'No'),
(29, 'SA', 'BR', '+55', 'Brazil', 'BRL', '', 'active', '2014-12-13 02:48:32', 'No'),
(30, 'NA', 'BS', '+242', 'Bahamas', 'BSD', '', 'active', '2014-12-13 02:48:46', 'No'),
(31, 'AS', 'BT', '+975', 'Bhutan', 'BTN', '', 'active', '2014-12-13 02:49:06', 'No'),
(32, 'AN', 'BV', '+47	', 'Bouvet Island', 'NOK', '', 'active', '2014-12-13 02:50:27', 'No'),
(33, 'AF', 'BW', '+267', 'Botswana', 'BWP', '', 'active', '2014-12-13 02:51:06', 'No'),
(34, 'EU', 'BY', '+375', 'Belarus', 'BYR', '', 'active', '2014-12-13 02:51:20', 'No'),
(35, 'NA', 'BZ', '+501', 'Belize', 'BZD', '', 'active', '2014-12-13 02:51:32', 'No'),
(36, 'NA', 'CA', '+1', 'Canada', 'CAD', '', 'active', '2014-12-13 02:51:55', 'No'),
(37, '', 'CD', '+243', 'Democratic Republic Of The Congo', 'DRC', '', 'active', '2014-12-13 02:52:19', 'No'),
(38, 'AF', 'CF', '+236\n', 'Central African Republic', 'XAF', '', 'active', '2014-12-13 02:52:31', 'No'),
(39, '', 'CG', '+ 242', 'Republic Of The Congo', 'DRC', '', 'active', '2014-12-13 02:52:52', 'No'),
(40, 'EU', 'CH', '+41\n', 'Switzerland', 'CHF', '', 'active', '2014-12-13 02:54:43', 'No'),
(41, '', 'CI', '+225', 'Ivory Coast', 'XOF', '', 'active', '2014-12-13 02:54:59', 'No'),
(42, 'SA', 'CL', '+56\n', 'Chile', 'CLP', '', 'active', '2014-12-13 02:55:34', 'No'),
(43, 'AF', 'CM', '+237', 'Cameroon', 'XAF', '', 'active', '2014-12-13 02:56:12', 'No'),
(44, 'AS', 'CN', '+86', 'China', 'CNY', '', 'active', '2014-12-13 02:56:32', 'No'),
(45, 'SA', 'CO', '+57', 'Colombia', 'COP', '', 'active', '2014-12-13 02:56:43', 'No'),
(46, 'NA', 'CR', '+506\n', 'Costa Rica', 'CRC', '', 'active', '2014-12-13 02:56:58', 'No'),
(47, 'NA', 'CU', '+53\n', 'Cuba', 'CUP', '', 'active', '2014-12-13 02:57:11', 'No'),
(48, 'AF', 'CV', '+238\n', 'Cape Verde', 'CVE', '', 'active', '2014-12-13 02:57:22', 'No'),
(49, 'EU', 'CY', '+357\n', 'Cyprus', 'EUR', '', 'active', '2014-12-13 02:57:34', 'No'),
(50, 'EU', 'CZ', '+420\n', 'Czech Republic', 'CZK', '', 'active', '2014-12-13 02:57:47', 'No'),
(51, 'EU', 'DE', '+49', 'Germany', 'EUR', '0', 'active', '2014-12-13 02:58:01', 'No'),
(52, 'AF', 'DJ', '+253', 'Djibouti', 'DJF', '', 'active', '2014-12-13 02:58:12', 'No'),
(53, 'EU', 'DK', '+45', 'Denmark', 'DKK', '', 'active', '2014-12-13 02:58:33', 'No'),
(54, 'NA', 'DM', '+ 1 767', 'Dominica', 'XCD', '', 'active', '2014-12-13 02:58:55', 'No'),
(55, 'NA', 'DO', '+1 809 ', 'Dominican Republic', 'DOP', '', 'active', '2014-12-13 02:59:55', 'No'),
(56, 'AF', 'DZ', '+213', 'Algeria', 'DZD', '', 'active', '2014-12-13 03:00:06', 'No'),
(57, 'SA', 'EC', '+593', 'Ecuador', 'ECS', '', 'active', '2014-12-13 03:00:16', 'No'),
(58, 'EU', 'EE', '+372', 'Estonia', 'EUR', '', 'active', '2014-12-13 03:00:26', 'No'),
(59, 'AF', 'EG', '+20', 'Egypt', 'EGP', '', 'active', '2014-12-13 03:00:38', 'No'),
(60, 'AF', 'EH', '+212', 'Western Sahara', 'MAD', '', 'active', '2014-12-13 03:01:28', 'No'),
(61, 'AF', 'ER', '+291', 'Eritrea', 'ERN', '', 'active', '2014-12-13 03:45:36', 'No'),
(62, 'EU', 'ES', '+34', 'Spain', 'EUR', '', 'active', '2014-12-13 03:46:03', 'No'),
(63, 'AF', 'ET', '+251', 'Ethiopia', 'ETB', '', 'active', '2014-12-13 03:46:18', 'No'),
(64, 'EU', 'FI', '+358', 'Finland', 'EUR', '', 'active', '2014-12-13 03:46:34', 'No'),
(65, 'OC', 'FJ', '+679', 'Fiji', 'FJD', '', 'active', '2014-12-13 03:46:47', 'No'),
(66, '', 'FM', '+691', 'Micronesia', 'USD', '', 'active', '2014-12-13 03:47:01', 'No'),
(67, 'EU', 'FO', '+298', 'Faroe Islands', 'DKK', '', 'active', '2014-12-13 03:47:20', 'No'),
(68, 'EU', 'FR', '+33', 'France', 'EUR', '', 'active', '2014-12-13 03:47:33', 'No'),
(69, 'AF', 'GA', '+241 ', 'Gabon', 'XAF', '', 'active', '2014-12-13 03:47:49', 'No'),
(70, 'EU', 'GB', '+44', 'United Kingdom', 'USD', '', 'active', '2014-12-13 03:48:13', 'No'),
(71, 'NA', 'GD', '+1 473', 'Grenada', 'XCD', '', 'active', '2014-12-13 03:48:37', 'No'),
(72, 'AS', 'GE', '+995', 'Georgia', 'GEL', '', 'active', '2014-12-13 03:48:53', 'No'),
(73, 'SA', 'GF', '+594', 'French Guiana', 'EUR', '', 'active', '2014-12-13 03:49:18', 'No'),
(74, '', 'GG', '+44', 'Guernsey', 'GGP', '', 'active', '2014-12-13 03:49:48', 'No'),
(75, 'AF', 'GH', '+233', 'Ghana', 'GHS', '', 'active', '2014-12-13 03:50:00', 'No'),
(76, 'NA', 'GL', '+299', 'Greenland', 'DKK', '', 'active', '2014-12-13 03:50:11', 'No'),
(77, 'AF', 'GM', '+220', 'Gambia', 'GMD', '', 'active', '2014-12-13 03:50:24', 'No'),
(78, 'AF', 'GN', '+224 ', 'Guinea', 'GNF', '', 'active', '2014-12-13 03:51:16', 'No'),
(79, 'NA', 'GP', '+590', 'Guadeloupe', 'EUD', '', 'active', '2014-12-13 03:51:30', 'No'),
(80, 'AF', 'GQ', '+240', 'Equatorial Guinea', 'XAF', '', 'active', '2014-12-13 03:51:43', 'No'),
(81, 'EU', 'GR', '+30', 'Greece', 'EUR', '', 'active', '2014-12-13 03:52:04', 'No'),
(82, 'NA', 'GT', '+502', 'Guatemala', 'QTQ', '', 'active', '2014-12-13 03:52:51', 'No'),
(83, 'OC', 'GU', '+1 671', 'Guam', 'USD', '', 'active', '2014-12-13 03:53:11', 'No'),
(84, 'AF', 'GW', '+245', 'Guinea-Bissau', 'GWP', '', 'active', '2014-12-13 03:53:31', 'No'),
(85, 'SA', 'GY', '+592', 'Guyana', 'GYD', '', 'active', '2014-12-13 03:53:51', 'No'),
(86, 'AS', 'HK', '+852', 'Hong Kong', 'HKD', '', 'active', '2014-12-13 03:54:09', 'No'),
(87, 'NA', 'HN', '+504', 'Honduras', 'HNL', '', 'active', '2014-12-13 03:54:21', 'No'),
(88, 'EU', 'HR', '+385', 'Croatia', 'HRK', '', 'active', '2014-12-13 03:54:35', 'No'),
(89, 'NA', 'HT', '+509', 'Haiti', 'HTG', '', 'active', '2014-12-13 03:54:49', 'No'),
(90, 'EU', 'HU', '+36', 'Hungary', 'HUF', '', 'active', '2014-12-13 03:55:05', 'No'),
(91, 'AS', 'ID', '+62', 'Indonesia', 'IDR', '', 'active', '2014-12-13 03:55:23', 'No'),
(92, 'EU', 'IE', '+353', 'Ireland', 'EUR', '', 'active', '2014-12-13 03:55:40', 'No'),
(93, 'AS', 'IL', '+972 ', 'Israel', 'ILS', '', 'active', '2014-12-13 03:56:06', 'No'),
(94, '', 'IM', '+44', 'Isle Of Man', 'GBP', '', 'active', '2014-12-13 03:56:18', 'No'),
(95, 'AS', 'IN', '+91', 'India', 'INR', 'Rs', 'active', '2015-03-10 11:35:44', 'No'),
(96, 'AS', 'IO', '+246', 'British Indian Ocean Territory', 'USD', '', 'active', '2014-12-13 03:57:18', 'No'),
(97, 'AS', 'IQ', '+964', 'Iraq', 'IQD', '', 'active', '2014-12-13 03:57:40', 'No'),
(98, '', 'IR', '+98', 'Iran', 'IRR', '', 'active', '2014-12-13 03:57:52', 'No'),
(99, 'EU', 'IS', '+354', 'Iceland', 'ISK', '', 'active', '2014-12-13 03:58:08', 'No'),
(100, 'EU', 'IT', '+39', 'Italy', 'EUR', '', 'active', '2014-12-13 04:14:29', 'No'),
(101, '', 'JE', '+44 ', 'Jersey', 'GBP', '', 'active', '2014-12-13 04:14:54', 'No'),
(102, 'NA', 'JM', '+1 876', 'Jamaica', 'JMD', '', 'active', '2014-12-13 04:15:08', 'No'),
(103, 'AS', 'JO', '+962', 'Jordan', 'JOD', '', 'active', '2014-12-13 04:15:25', 'No'),
(104, 'AS', 'JP', '+81 ', 'Japan', 'JPY', '', 'active', '2014-12-13 04:15:44', 'No'),
(105, 'AF', 'KE', '+254', 'Kenya', 'KES', '', 'active', '2014-12-13 04:15:56', 'No'),
(106, 'AS', 'KG', '+996', 'Kyrgyzstan', 'KGS', '', 'active', '2014-12-13 04:16:19', 'No'),
(107, 'AS', 'KH', '+855', 'Cambodia', 'KHR', '', 'active', '2014-12-13 04:16:29', 'No'),
(108, 'OC', 'KI', '+686', 'Kiribati', 'AUD', '', 'active', '2014-12-13 04:16:38', 'No'),
(109, 'AF', 'KM', '+269', 'Comoros', 'KMF', '', 'active', '2014-12-13 04:16:53', 'No'),
(110, 'NA', 'KN', '+1 869', 'Saint Kitts And Nevis', 'XCD', '', 'active', '2014-12-13 04:17:06', 'No'),
(111, '', 'KP', '+850', 'North Korea', 'KPW', '', 'active', '2014-12-13 04:17:21', 'No'),
(112, '', 'KR', '+82', 'South Korea', 'KRW', '', 'active', '2014-12-13 04:17:34', 'No'),
(113, 'AS', 'KW', '+965', 'Kuwait', 'KWD', '', 'active', '2014-12-13 04:17:47', 'No'),
(114, 'AS', 'KZ', '+7', 'Kazakhstan', 'KZT', '', 'active', '2014-12-13 04:18:00', 'No'),
(115, '', 'LA', '+856', 'Laos', 'LAK', '', 'active', '2014-12-13 04:18:14', 'No'),
(116, 'AS', 'LB', '+961', 'Lebanon', 'LBP', '', 'active', '2014-12-13 04:18:24', 'No'),
(117, 'NA', 'LC', '+1 758', 'Saint Lucia', 'XCD', '', 'active', '2014-12-13 04:18:44', 'No'),
(118, 'EU', 'LI', '+423', 'Liechtenstein', 'CHF', '', 'active', '2014-12-13 04:18:58', 'No'),
(119, 'AS', 'LK', '+94', 'Sri Lanka', 'LKR', 'Rs', 'active', '2014-12-13 04:19:12', 'No'),
(120, 'AF', 'LR', '+231', 'Liberia', 'LRD', '', 'active', '2014-12-13 04:19:26', 'No'),
(121, 'AF', 'LS', '+266', 'Lesotho', 'LSL', '', 'active', '2014-12-13 05:37:37', 'No'),
(122, 'EU', 'LT', '+370', 'Lithuania', 'LTL', '', 'active', '2014-12-13 05:37:49', 'No'),
(123, 'EU', 'LU', '+352', 'Luxembourg', 'EUR', '', 'active', '2014-12-13 05:38:03', 'No'),
(124, 'EU', 'LV', '+371', 'Latvia', 'LVL', '', 'active', '2014-12-13 05:38:17', 'No'),
(125, '', 'LY', '+ 218', 'Libya', 'LYD', '', 'active', '2014-12-13 05:38:34', 'No'),
(126, 'AF', 'MA', '+212', 'Morocco', 'MAD', '', 'active', '2014-12-13 05:39:49', 'No'),
(127, 'EU', 'MC', '+377', 'Monaco', 'EUR', '', 'active', '2014-12-13 05:40:06', 'No'),
(128, '', 'MD', '+373', 'Moldova', 'MDL', '', 'active', '2014-12-13 05:40:20', 'No'),
(129, '', 'ME', '+382', 'Montenegro', 'EUR', '', 'active', '2014-12-13 05:40:33', 'No'),
(130, 'AF', 'MG', '+261', 'Madagascar', 'MGF', '', 'active', '2014-12-13 05:40:47', 'No'),
(131, 'OC', 'MH', '+692', 'Marshall Islands', 'USD', '', 'active', '2014-12-13 05:41:04', 'No'),
(132, '', 'MK', '+389', 'Macedonia', 'MKD', '', 'active', '2014-12-13 05:41:20', 'No'),
(133, 'AF', 'ML', '+223', 'Mali', 'XOF', '', 'active', '2014-12-13 05:41:33', 'No'),
(134, 'AS', 'MM', '+95', 'Myanmar', 'MMK', '', 'active', '2014-12-13 05:42:12', 'No'),
(135, 'AS', 'MN', '+976', 'Mongolia', 'MNT', '', 'active', '2014-12-13 05:42:26', 'No'),
(136, '', 'MO', '+853', 'Macao', 'MOP', '', 'active', '2014-12-13 05:42:38', 'No'),
(137, 'OC', 'MP', '+1 670', 'Northern Mariana Islands', 'USD', '', 'active', '2014-12-13 05:42:58', 'No'),
(138, 'NA', 'MQ', '+596', 'Martinique', 'EUR', '', 'active', '2014-12-13 05:43:48', 'No'),
(139, 'AF', 'MR', '+222', 'Mauritania', 'MRO', '', 'active', '2014-12-13 05:44:00', 'No'),
(140, 'NA', 'MS', '+1664', 'Montserrat', 'XCD', '', 'active', '2014-12-13 05:44:26', 'No'),
(141, 'AF', 'MU', '+230', 'Mauritius', 'MUR', '', 'active', '2014-12-13 05:45:18', 'No'),
(142, 'AS', 'MV', '+960', 'Maldives', 'MVR', '', 'active', '2014-12-13 05:45:31', 'No'),
(143, 'AF', 'MW', '+265', 'Malawi', 'MWK', '', 'active', '2014-12-13 05:45:47', 'No'),
(144, 'NA', 'MX', '+52', 'Mexico', 'MXN', '', 'active', '2014-12-13 05:46:20', 'No'),
(145, 'AS', 'MY', '+60', 'Malaysia', 'MYR', '', 'active', '2014-11-25 04:37:35', 'No'),
(146, 'AF', 'MZ', '+258', 'Mozambique', 'MZN', '', 'active', '2014-12-13 05:46:46', 'No'),
(147, 'AF', 'NA', '+264', 'Namibia', 'NAD', '', 'active', '2014-12-13 05:47:10', 'No'),
(148, 'OC', 'NC', '+687', 'New Caledonia', 'CFP', '', 'active', '2014-12-13 05:47:31', 'No'),
(149, 'AF', 'NE', '+227', 'Niger', 'XOF', '', 'active', '2014-12-13 05:48:48', 'No'),
(150, 'AF', 'NG', '+234', 'Nigeria', 'NGN', '', 'active', '2014-12-13 05:49:28', 'No'),
(151, 'NA', 'NI', '+505', 'Nicaragua', 'NIO', '', 'active', '2014-12-13 05:49:48', 'No'),
(152, 'EU', 'NL', '+31', 'Netherlands', 'EUR', '', 'active', '2014-12-13 05:50:05', 'No'),
(153, 'EU', 'NO', '+47', 'Norway', 'NOK', '', 'active', '2014-12-13 05:50:23', 'No'),
(154, 'AS', 'NP', '+977', 'Nepal', 'NPR', '', 'active', '2014-12-13 05:50:36', 'No'),
(155, 'OC', 'NR', '+674', 'Nauru', 'AUD', '', 'active', '2014-12-13 05:50:59', 'No'),
(156, 'OC', 'NZ', '+64', 'New Zealand', 'NZD', '', 'active', '2014-12-13 05:51:14', 'No'),
(157, 'AS', 'OM', '+968', 'Oman', 'OMR', '', 'active', '2014-12-13 05:51:28', 'No'),
(158, 'NA', 'PA', '+507', 'Panama', 'PAB', '', 'active', '2014-12-13 05:51:42', 'No'),
(159, 'SA', 'PE', '+51', 'Peru', 'PEN', '', 'active', '2014-12-13 05:51:53', 'No'),
(160, 'OC', 'PF', '+689', 'French Polynesia', 'CFP', '', 'active', '2014-12-13 05:52:06', 'No'),
(161, 'OC', 'PG', '+675', 'Papua New Guinea', 'PGK', '', 'active', '2014-12-13 05:52:20', 'No'),
(162, 'AS', 'PH', '+63', 'Philippines', 'PHP', '', 'active', '2014-12-13 05:52:36', 'No'),
(163, 'AS', 'PK', '+92', 'Pakistan', 'PKR', '', 'active', '2014-12-13 05:52:51', 'No'),
(164, 'EU', 'PL', '+48 ', 'Poland', 'PLN', '', 'active', '2014-12-13 05:53:11', 'No'),
(165, '', 'PM', '+508', 'Saint Pierre And Miquelon', 'EUR', '', 'active', '2014-12-13 05:53:39', 'No'),
(166, 'NA', 'PR', '+787', 'Puerto Rico', 'USD', '', 'active', '2014-12-13 05:54:15', 'No'),
(167, '', 'PS', '+970', 'Palestinian Territory', 'PAB', '', 'active', '2014-12-13 05:54:43', 'No'),
(168, 'EU', 'PT', '+351', 'Portugal', 'EUR', '', 'active', '2014-12-13 05:55:07', 'No'),
(169, 'OC', 'PW', '+680', 'Palau', 'USD', '', 'active', '2014-12-13 05:56:25', 'No'),
(170, 'SA', 'PY', '+595', 'Paraguay', 'PYG', '', 'active', '2014-12-13 05:56:38', 'No'),
(171, 'AS', 'QA', '+974', 'Qatar', 'QAR', '', 'active', '2014-12-13 05:56:55', 'No'),
(172, 'AF', 'RE', '+262', 'Reunion', 'EUR', '', 'active', '2014-12-13 05:57:12', 'No'),
(173, 'EU', 'RO', '+40', 'Romania', 'RON', '', 'active', '2014-12-13 05:57:23', 'No'),
(174, '', 'RS', '+381', 'Serbia', 'RSD', '', 'active', '2014-12-13 05:57:37', 'No'),
(175, '', 'RU', '+7', 'Russia', 'RUB', '', 'active', '2014-12-13 05:57:54', 'No'),
(176, 'AF', 'RW', '+250', 'Rwanda', 'RWF', '', 'active', '2014-12-13 05:58:06', 'No'),
(177, 'AS', 'SA', '+966', 'Saudi Arabia', 'SAR', '', 'active', '2014-12-13 05:58:20', 'No'),
(178, 'OC', 'SB', '+677', 'Solomon Islands', 'SBD', '', 'active', '2014-12-13 05:58:38', 'No'),
(179, 'AF', 'SC', '+248 ', 'Seychelles', 'SCR', '', 'active', '2014-12-13 06:00:16', 'No'),
(180, 'AF', 'SD', '+249', 'Sudan', 'SDG', '', 'active', '2014-12-13 06:00:30', 'No'),
(181, 'EU', 'SE', '+46 ', 'Sweden', 'SEK', '', 'active', '2014-12-13 06:01:07', 'No'),
(182, 'AS', 'SG', '+65', 'Singapore', 'SGD', '', 'active', '2014-12-13 06:01:24', 'No'),
(183, '', 'SH', '+290', 'Saint Helena', 'SHP', '', 'active', '2014-12-13 06:01:36', 'No'),
(184, 'EU', 'SI', '+386', 'Slovenia', 'EUR', '', 'active', '2014-12-13 06:01:50', 'No'),
(185, '', 'SJ', '+47', 'Svalbard And Jan Mayen', 'NOK', '', 'active', '2014-12-13 06:02:26', 'No'),
(186, '', 'SK', '+421', 'Slovakia', 'EUR', '', 'active', '2014-12-13 06:02:38', 'No'),
(187, 'AF', 'SL', '+232', 'Sierra Leone', 'SLL', '', 'active', '2014-12-13 06:02:52', 'No'),
(188, 'EU', 'SM', '+378', 'San Marino', 'EUR', '', 'active', '2014-12-13 06:03:13', 'No'),
(189, 'AF', 'SN', '+221', 'Senegal', 'XOF', '', 'active', '2014-12-13 06:03:27', 'No'),
(190, 'AF', 'SO', '+252', 'Somalia', 'SOS', '', 'active', '2014-12-13 06:03:41', 'No'),
(191, 'SA', 'SR', '+597', 'Suriname', 'SRD', '', 'active', '2014-12-13 06:03:54', 'No'),
(192, '', 'SS', '+211', 'South Sudan', 'SSP', '', 'active', '2014-12-13 06:04:41', 'No'),
(193, 'AF', 'ST', '+239', 'Sao Tome And Principe', 'STD', '', 'active', '2014-12-13 06:04:57', 'No'),
(194, 'NA', 'SV', '+503', 'El Salvador', 'SVC', '', 'active', '2014-12-13 06:05:19', 'No'),
(195, '', 'SY', '+963', 'Syria', 'SYP', '', 'active', '2014-12-13 06:05:43', 'No'),
(196, 'AF', 'SZ', '+268', 'Swaziland', 'SZL', '', 'active', '2014-12-13 06:06:03', 'No'),
(197, 'AF', 'TD', '+235', 'Chad', 'XAF', '', 'active', '2014-12-13 06:07:02', 'No'),
(198, 'AN', 'TF', '', 'French Southern Territories', 'EUR', '', 'active', '2014-08-25 20:54:29', 'No'),
(199, 'AF', 'TG', '+228', 'Togo', 'XOF', '', 'active', '2014-12-13 06:10:14', 'No'),
(200, 'AS', 'TH', '+66', 'Thailand', 'THB', '', 'active', '2014-12-13 06:10:38', 'No'),
(201, 'AS', 'TJ', '+992', 'Tajikistan', 'TJS', '', 'active', '2014-12-13 06:10:53', 'No'),
(202, 'OC', 'TK', '+690', 'Tokelau', 'NZD', '', 'active', '2014-12-13 06:11:07', 'No'),
(203, 'OC', 'TL', '+670', 'East Timor', 'USD', '', 'active', '2014-12-13 06:11:19', 'No'),
(204, 'AS', 'TM', '+993', 'Turkmenistan', 'TMT', '', 'active', '2014-12-13 06:11:30', 'No'),
(205, 'AF', 'TN', '+216', 'Tunisia', 'TND', '', 'active', '2014-12-13 06:11:44', 'No'),
(206, 'OC', 'TO', '+676', 'Tonga', 'TOP', '', 'active', '2014-12-13 06:12:00', 'No'),
(207, 'AS', 'TR', '+90', 'Turkey', 'TRY', '', 'active', '2014-12-13 06:18:51', 'No'),
(208, 'NA', 'TT', '+868\n', 'Trinidad And Tobago', 'TTD', '', 'active', '2014-12-13 06:19:41', 'No'),
(209, 'OC', 'TV', '+688', 'Tuvalu', 'AUD', '', 'active', '2014-12-13 06:19:56', 'No'),
(210, 'AS', 'TW', '+886', 'Taiwan', 'TWD', '', 'active', '2014-12-13 06:47:11', 'No'),
(211, '', 'TZ', '+255', 'Tanzania', 'TZS', '', 'active', '2014-12-13 06:47:54', 'No'),
(212, 'EU', 'UA', '+380', 'Ukraine', 'UAH', '', 'active', '2014-12-13 06:48:07', 'No'),
(213, 'AF', 'UG', '+256', 'Uganda', 'UGX', '', 'active', '2014-12-13 06:48:31', 'No'),
(214, 'OC', 'UM', '+1', 'United States Minor Outlying Islands', 'USD', '', 'active', '2014-12-13 06:50:23', 'No'),
(215, 'NA', 'US', '+1', 'United States', 'USD', '$', 'active', '2015-03-25 10:56:05', 'No'),
(216, 'SA', 'UY', '+598\n', 'Uruguay', 'UYU', '', 'active', '2014-12-13 06:51:11', 'No'),
(217, 'AS', 'UZ', '+998', 'Uzbekistan', 'UZS', '', 'active', '2014-12-13 06:51:22', 'No'),
(218, 'NA', 'VC', '+1 784 ', 'Saint Vincent And The Grenadines', 'XCD', '', 'active', '2014-12-13 06:51:38', 'No'),
(219, 'SA', 'VE', '+58', 'Venezuela', 'VEF', '', 'active', '2014-12-13 06:51:53', 'No'),
(220, '', 'VI', '+1 340', 'U.S. Virgin Islands', 'USD', '', 'active', '2014-12-13 06:52:21', 'No'),
(221, '', 'VN', '+84', 'Vietnam', 'VND', '', 'active', '2014-12-13 06:52:37', 'No'),
(222, 'OC', 'VU', '+678', 'Vanuatu', 'VUV', '', 'active', '2014-12-13 06:52:47', 'No'),
(223, '', 'WF', '+681 ', 'Wallis And Futuna', 'XPF', '', 'active', '2014-12-13 06:53:12', 'No'),
(224, 'OC', 'WS', '+685', 'Samoa', 'WST', '', 'active', '2014-12-13 06:53:28', 'No'),
(225, '', 'XK', '+381', 'Kosovo', 'EUR', '', 'active', '2014-12-13 06:53:43', 'No'),
(226, 'AS', 'YE', '+967', 'Yemen', 'YER', '', 'active', '2014-12-13 06:53:55', 'No'),
(227, 'AF', 'YT', '+262', 'Mayotte', 'EUR', '', 'active', '2014-12-13 06:54:08', 'No'),
(228, 'AF', 'ZA', '+27', 'South Africa', 'ZAR', '', 'active', '2014-12-13 06:54:19', 'No'),
(229, 'AF', 'ZM', '+260', 'Zambia', 'ZMW', '', 'active', '2014-12-13 06:54:39', 'No'),
(230, 'AF', 'ZW', '+263', 'Zimbabwe', 'ZWD', '', 'active', '2014-12-13 06:54:56', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
`id` int(11) NOT NULL,
  `countryname` varchar(100) NOT NULL,
  `currencytype` varchar(100) NOT NULL,
  `currencysymbol` varchar(45) NOT NULL,
  `currencyrate` float(10,2) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `countryname`, `currencytype`, `currencysymbol`, `currencyrate`, `status`, `createdon`) VALUES
(1, 'Andorra', 'AUD', 'AUD', 1.56, 'active', '2015-03-09'),
(3, 'Afghanistan', 'AFG', '#', 2.30, 'active', '2015-03-10');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `projectid`, `question`, `answer`, `createdon`) VALUES
(1, 8, 'You can´t pay through Fundstarter? Can I use Paypal instead ?', 0x3c703e496620796f752063616ec2b47420706179207468726f756768266e6273703b3c7374726f6e673e3c656d3e46756e64737461727465723c2f656d3e3c2f7374726f6e673e2c20686572652069732061206c696e6b20746f206120446f6e6174652070617970616c266e6273703b3c656d3e627574746f6d266e6273703b3c2f656d3e696620796f75266e6273703b77616e74266e6273703b746f20737570706f727420746865207365726965732e266e6273703b3c656d3e52656d656d626572266e6273703b3c2f656d3e746f2064726f702061206c696e6520726567617264696e672074686520616d6f756e7420796f752061726520676976696e6720666f722077686963682072657761726420796f7520617265266e6273703b706c656467696e67266e6273703b666f722021205468616e6b2061206c6f742021266e6273703b3c7374726f6e673e3c656d3e4869676820466976653c2f656d3e3c2f7374726f6e673e266e6273703b213c62723e3c2f703e, '2015-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `inboxmsgs`
--

CREATE TABLE IF NOT EXISTS `inboxmsgs` (
`id` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `recieverid` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `message` varchar(255) NOT NULL,
  `senderstatus` enum('available','deleted') NOT NULL DEFAULT 'available',
  `recieverstatus` enum('available','deleted') NOT NULL DEFAULT 'available',
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inboxmsgs`
--

INSERT INTO `inboxmsgs` (`id`, `senderid`, `recieverid`, `status`, `message`, `senderstatus`, `recieverstatus`, `date`) VALUES
(1, 1, 16, 1, 'hi vinothini viji.. this s vino..:)))))))))))))))', 'deleted', 'available', '2015-04-08'),
(2, 1, 16, 0, 'my message to the creator...', 'available', 'available', '2015-04-09'),
(3, 16, 1, 1, 'hi vinothini venkatesan this is viji..', 'available', 'available', '2015-04-09'),
(4, 16, 1, 1, 'jskldfj  jopsdopsd fodofr etriofj   rerioputperutiu rut ioerutiurtuioer ji j terio tpuero ujogjdfigjdfiojgiodfjgiojdfogjidfi eri y9ue9pyipogkfopdkgpodfgio0ogo0[fop fdgidfopgiodf gdfgodfjkg dfgo', 'available', 'available', '2015-04-09'),
(5, 1, 16, 0, '', 'deleted', 'available', '2015-04-16'),
(6, 1, 16, 0, '', 'deleted', 'available', '2015-04-16'),
(7, 1, 16, 0, 'sample', 'available', 'available', '2015-04-16'),
(8, 1, 15, 0, 'this message is to vinothini venkatesan backed this project', 'available', 'available', '2015-04-24'),
(9, 1, 16, 0, 'this message from backer list page', 'available', 'available', '2015-04-24');

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
  `createdon` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `templatename`, `subject`, `senderemail`, `sendername`, `emailcontent`, `createdon`) VALUES
(7, 'samplenewsletter', 'Newsletter Sample', 'admin@kickstarter.com', 'admin', 0x3c21444f43545950452048544d4c3e0d0a3c68746d6c3e0d0a3c686561643e3c6d65746120687474702d65717569763d5c22436f6e74656e742d547970655c2220636f6e74656e743d5c22746578742f68746d6c3b20636861727365743d7574662d385c223e3c6d657461206e616d653d5c2276696577706f72745c2220636f6e74656e743d5c2277696474683d6465766963652d77696474685c222f3e0d0a093c7469746c653e466f72676f742050617373776f72643c2f7469746c653e0d0a3c2f686561643e0d0a3c626f6479206c6566746d617267696e3d5c22305c22206d617267696e6865696768743d5c22305c22206d617267696e77696474683d5c22305c2220746f706d617267696e3d5c22305c223e0d0a3c7461626c65206267636f6c6f723d5c22233764613263315c2220626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c222077696474683d5c223634305c223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c7464207374796c653d5c2270616464696e673a343070783b5c223e0d0a0909093c7461626c6520626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c22207374796c653d5c22626f726465723a233164343536372031707820736f6c69643b20666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b5c222077696474683d5c223631305c223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d5c224865616465725c22206865696768743d5c223134385c22207372633d5c227b7b55524c3a3a746f28246c6f676f297d7d5c22207374796c653d5c226d617267696e3a3070783b2070616464696e673a3070783b20626f726465723a6e6f6e653b5c222077696474683d5c223630385c22202f3e7b7b247469746c657d7d3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74642076616c69676e3d5c22746f705c223e0d0a0909090909093c7461626c65206267636f6c6f723d5c22234646464646465c2220626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d5c22325c223e0d0a0909090909090909093c70207374796c653d5c2270616464696e673a313070782031357078203130707820313570783b20666f6e742d73697a653a313470783b206d617267696e3a3070783b5c223e3c7374726f6e673e44656172204a686f6e652c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e3c7374726f6e673e5468616e6b20796f7520666f7220726567697374657220776974682075732e203c2f7374726f6e673e5072616573656e7420696163756c697320636f6e7365637465747572206d61747469732e2053757370656e6469737365206163206c656f2061207075727573206772617669646120766f6c75747061742e2044756973206d6174746973207475727069732065752064756920756c74726963696573207472697374697175652e20496e20706f73756572652c20657261742076756c70757461746520616c69717565742072757472756d2c206d61737361206f7263692072757472756d20697073756d2c206e6f6e2074696e636964756e74206d69206c6563747573206e6563206e756e632e3c2f703e0d0a0d0a0909090909090909093c7461626c6520626f726465723d5c22305c222063656c6c70616464696e673d5c22355c222063656c6c73706163696e673d5c22305c22207374796c653d5c226d617267696e3a3130707820313570783b20666f6e742d73697a653a313270783b5c223e0d0a090909090909090909093c74626f64793e0d0a09090909090909090909093c74723e0d0a0909090909090909090909093c746420616c69676e3d5c2272696768745c223e3c7374726f6e673e456d61696c3a3c2f7374726f6e673e3c2f74643e0d0a0909090909090909090909093c74643e7b7b24656d61696c7d7d3c2f74643e0d0a09090909090909090909093c2f74723e0d0a090909090909090909093c2f74626f64793e0d0a0909090909090909093c2f7461626c653e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e5072616573656e7420696163756c697320636f6e7365637465747572206d61747469732e2053757370656e6469737365206163206c656f2061207075727573206772617669646120766f6c75747061742e2044756973206d6174746973207475727069732065752064756920756c74726963696573207472697374697175652e20496e20706f73756572652c20657261742076756c70757461746520616c69717565742072757472756d2c206d61737361206f7263692072757472756d20697073756d2c206e6f6e2074696e636964756e74206d69206c6563747573206e6563206e756e632e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c7464207374796c653d5c22666f6e742d73697a653a313270783b2070616464696e673a3130707820313570783b5c222076616c69676e3d5c22746f705c222077696474683d5c223530255c223e0d0a0909090909090909093c703e436c61737320617074656e742074616369746920736f63696f737175206164206c69746f726120746f727175656e742070657220636f6e75626961206e6f737472612c2070657220696e636570746f732068696d656e61656f732e2050686173656c6c75732073697420616d6574206c6163696e69612073617069656e2e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c7464207374796c653d5c22666f6e742d73697a653a313270783b2070616464696e673a3130707820313570783b5c222076616c69676e3d5c22746f705c222077696474683d5c223530255c223e0d0a0909090909090909093c703e496620796f75206861766520616e79207175657374696f6e732c20636865636b206f7574206f7572203c6120687265663d5c22235c223e3c7374726f6e673e646f63756d656e746174696f6e3c2f7374726f6e673e3c2f613e206f722073656e64207468656d206f75722077617920766961203c6120687265663d5c22235c223e3c7374726f6e673e737570706f72742e3c2f7374726f6e673e3c2f613e3c2f703e0d0a0d0a0909090909090909093c703e3c7374726f6e673e2d205468652077656273697465205465616d3c2f7374726f6e673e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, '2015-03-19 09:39:24'),
(8, 'subscriptionconfirmation', 'Subscription Confirmation', 'admin@casperon.in', 'admin', 0x3c21444f43545950452048544d4c3e0d0a3c68746d6c3e0d0a3c686561643e3c6d65746120687474702d65717569763d5c22436f6e74656e742d547970655c2220636f6e74656e743d5c22746578742f68746d6c3b20636861727365743d7574662d385c223e3c6d657461206e616d653d5c2276696577706f72745c2220636f6e74656e743d5c2277696474683d6465766963652d77696474685c222f3e0d0a093c7469746c653e466f72676f742050617373776f72643c2f7469746c653e0d0a3c2f686561643e0d0a3c626f6479206c6566746d617267696e3d225c2671756f743b305c2671756f743b22206d617267696e6865696768743d225c2671756f743b305c2671756f743b22206d617267696e77696474683d225c2671756f743b305c2671756f743b2220746f706d617267696e3d225c2671756f743b305c2671756f743b223e0d0a3c7461626c65206267636f6c6f723d225c2671756f743b233764613263315c2671756f743b2220626f726465723d225c2671756f743b305c2671756f743b222063656c6c70616464696e673d225c2671756f743b305c2671756f743b222063656c6c73706163696e673d225c2671756f743b305c2671756f743b222077696474683d225c2671756f743b3634305c2671756f743b223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c7464207374796c653d225c2671756f743b70616464696e673a343070783b5c2671756f743b223e0d0a0909093c7461626c65203170783d222220626f726465723d225c2671756f743b305c2671756f743b222063656c6c70616464696e673d225c2671756f743b305c2671756f743b222063656c6c73706163696e673d225c2671756f743b305c2671756f743b2220736f6c69643d2222207374796c653d225c2671756f743b626f726465723a23316434353637223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d225c2671756f743b4865616465725c2671756f743b22206865696768743d225c2671756f743b3134385c2671756f743b222070616464696e673a3070783d2222207372633d227b7b55524c3a3a746f28276c6f676f27297d7d22207374796c653d225c2671756f743b6d617267696e3a3070783b22202f3e7b7b247469746c657d7d3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74642076616c69676e3d225c2671756f743b746f705c2671756f743b223e0d0a0909090909093c7461626c65206267636f6c6f723d225c2671756f743b234646464646465c2671756f743b2220626f726465723d225c2671756f743b305c2671756f743b222063656c6c70616464696e673d225c2671756f743b305c2671756f743b222063656c6c73706163696e673d225c2671756f743b305c2671756f743b223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d225c2671756f743b325c2671756f743b223e0d0a0909090909090909093c7020313070783d222220313570783d2222207374796c653d225c2671756f743b70616464696e673a31307078223e3c7374726f6e673e44656172207b7b246e616d657d7d2c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c7020313070783d222220313570783d2222207374796c653d225c2671756f743b70616464696e673a307078223e3c7374726f6e673e5468616e6b20796f7520666f72207375627363726962696e67206f7572266e6273703b6e6577736c65747465722e266e6273703b3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c7020313070783d222220313570783d2222207374796c653d225c2671756f743b70616464696e673a307078223e3c7374726f6e673e436c69636b20746865206c696e6b2062726c6f7720746f20636f6e6669726d20796f757220737562736372697074696f6e3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c7461626c6520313570783d222220626f726465723d225c2671756f743b305c2671756f743b222063656c6c70616464696e673d225c2671756f743b355c2671756f743b222063656c6c73706163696e673d225c2671756f743b305c2671756f743b22207374796c653d225c2671756f743b6d617267696e3a31307078223e0d0a090909090909090909093c74626f64793e0d0a09090909090909090909093c74723e0d0a0909090909090909090909093c746420616c69676e3d225c2671756f743b72696768745c2671756f743b223e3c7374726f6e673e4c696e6b3a3c2f7374726f6e673e3c2f74643e0d0a0909090909090909090909093c74643e7b7b55524c3a3a746f28262333393b636f6e6669726d737562736372697074696f6e3f69643d262333393b2e3c7370616e207374796c653d226261636b67726f756e642d636f6c6f723a2072676228302c203235352c20323430293b223e7b7b2469647d7d2e262333393b26616d703b26616d703b636f64653d262333393b7b7b24636f64657d7d3c2f7370616e3e297d7d3c2f74643e0d0a09090909090909090909093c2f74723e0d0a090909090909090909093c2f74626f64793e0d0a0909090909090909093c2f7461626c653e0d0a0d0a0909090909090909093c7020313070783d222220313570783d2222207374796c653d225c2671756f743b70616464696e673a307078223e5072616573656e7420696163756c697320636f6e7365637465747572206d61747469732e2053757370656e6469737365206163206c656f2061207075727573206772617669646120766f6c75747061742e2044756973206d6174746973207475727069732065752064756920756c74726963696573207472697374697175652e20496e20706f73756572652c20657261742076756c70757461746520616c69717565742072757472756d2c206d61737361206f7263692072757472756d20697073756d2c206e6f6e2074696e636964756e74206d69206c6563747573206e6563206e756e632e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c746420313570783d22222070616464696e673a313070783d2222207374796c653d225c2671756f743b666f6e742d73697a653a313270783b223e0d0a0909090909090909093c703e436c61737320617074656e742074616369746920736f63696f737175206164206c69746f726120746f727175656e742070657220636f6e75626961206e6f737472612c2070657220696e636570746f732068696d656e61656f732e2050686173656c6c75732073697420616d6574206c6163696e69612073617069656e2e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c746420313570783d22222070616464696e673a313070783d2222207374796c653d225c2671756f743b666f6e742d73697a653a313270783b223e0d0a0909090909090909093c703e496620796f75206861766520616e79207175657374696f6e732c20636865636b206f7574206f7572203c6120687265663d225c223e3c7374726f6e673e646f63756d656e746174696f6e3c2f7374726f6e673e3c2f613e206f722073656e64207468656d206f75722077617920766961203c6120687265663d225c223e3c7374726f6e673e737570706f72742e3c2f7374726f6e673e3c2f613e3c2f703e0d0a0d0a0909090909090909093c703e3c7374726f6e673e2d205468652077656273697465205465616d3c2f7374726f6e673e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, '2015-03-23 13:50:16'),
(9, 'forgotpassword', 'Notification to change password!', 'admin@casperon.in', 'admin', 0x3c21444f43545950452048544d4c3e0d0a3c68746d6c3e0d0a3c686561643e3c6d65746120687474702d65717569763d22436f6e74656e742d547970652220636f6e74656e743d22746578742f68746d6c3b20636861727365743d7574662d38223e3c6d657461206e616d653d2276696577706f72742220636f6e74656e743d2277696474683d6465766963652d7769647468222f3e0d0a093c7469746c653e466f72676f742050617373776f72643c2f7469746c653e0d0a3c2f686561643e0d0a3c626f6479206c6566746d617267696e3d223022206d617267696e6865696768743d223022206d617267696e77696474683d22302220746f706d617267696e3d2230223e0d0a3c7461626c65206267636f6c6f723d22233764613263312220626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d2230222077696474683d22363430223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c7464207374796c653d2270616464696e673a343070783b223e0d0a0909093c7461626c6520626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d223022207374796c653d22626f726465723a233164343536372031707820736f6c69643b20666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b222077696474683d22363130223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d2248656164657222206865696768743d2231343822207372633d227b7b55524c3a3a746f28276c6f676f27297d7d22207374796c653d226d617267696e3a3070783b2070616464696e673a3070783b20626f726465723a6e6f6e653b222077696474683d2236303822202f3e3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74642076616c69676e3d22746f70223e0d0a0909090909093c7461626c65206267636f6c6f723d22234646464646462220626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d2230223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d2232223e0d0a0909090909090909093c6833207374796c653d2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b223e526573657420596f75722050617373776f72643c2f68333e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a313070782031357078203130707820313570783b20666f6e742d73697a653a313470783b206d617267696e3a3070783b223e3c7374726f6e673e44656172207b7b246e616d657d7d2c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e436c69636b20746865206c696e6b2062656c6f7720746f20726573657420796f75722070617373776f72642e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e3c7374726f6e673e456d61696c203a3c2f7374726f6e673e207b7b24656d61696c7d7d3c6272202f3e0d0a0909090909090909093c6272202f3e0d0a0909090909090909093c7374726f6e673e4c696e6b203a3c2f7374726f6e673e203c6120687265663d227b7b55524c3a3a746f28277265736574666f72676f747077643f69643d27297d7d7b7b2469647d7d223e7b7b55524c3a3a746f28262333393b7265736574666f72676f747077643f69643d262333393b297d7d7b7b2469647d7d3c2f613e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c7464207374796c653d22666f6e742d73697a653a313270783b222076616c69676e3d22746f70222077696474683d2231303025223e0d0a0909090909090909093c6833207374796c653d2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b223e526567617264732c3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e7b7b2473656e6465726e616d657d7d3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e3c693e7b7b2473656e646572656d61696c7d7d3c2f693e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c7464207374796c653d22666f6e742d73697a653a313270783b2070616464696e673a3130707820313570783b222076616c69676e3d22746f70222077696474683d223025223e266e6273703b3c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, '2015-03-24 09:41:31'),
(10, 'emailverification', 'Email Verification', 'admin@casperon.in', 'admin', 0x3c21444f43545950452048544d4c3e0d0a3c68746d6c3e0d0a3c686561643e3c6d65746120687474702d65717569763d5c22436f6e74656e742d547970655c2220636f6e74656e743d5c22746578742f68746d6c3b20636861727365743d7574662d385c223e3c6d657461206e616d653d5c2276696577706f72745c2220636f6e74656e743d5c2277696474683d6465766963652d77696474685c222f3e0d0a093c7469746c653e466f72676f742050617373776f72643c2f7469746c653e0d0a3c2f686561643e0d0a3c626f6479206c6566746d617267696e3d5c22305c22206d617267696e6865696768743d5c22305c22206d617267696e77696474683d5c22305c2220746f706d617267696e3d5c22305c223e0d0a3c7461626c65206267636f6c6f723d5c22233764613263315c2220626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c222077696474683d5c223634305c223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c7464207374796c653d5c2270616464696e673a343070783b5c223e0d0a0909093c7461626c6520626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c22207374796c653d5c22626f726465723a233164343536372031707820736f6c69643b20666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b5c222077696474683d5c223631305c223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d5c224865616465725c22206865696768743d5c223134385c22207372633d5c227b7b55524c3a3a746f285c275c27297d7d2f7b7b246c6f676f7d7d5c22207374796c653d5c226d617267696e3a3070783b2070616464696e673a3070783b20626f726465723a6e6f6e653b5c222077696474683d5c223630385c22202f3e3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74642076616c69676e3d5c22746f705c223e0d0a0909090909093c7461626c65206267636f6c6f723d5c22234646464646465c2220626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d5c22325c223e0d0a0909090909090909093c6833207374796c653d5c2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b5c223e5665726966697920596f757220456d61696c3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a313070782031357078203130707820313570783b20666f6e742d73697a653a313470783b206d617267696e3a3070783b5c223e3c7374726f6e673e44656172207b7b246e616d657d7d2c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e436c69636b20746865206c696e6b2062656c6f7720746f2076657269667920796f757220656d61696c20616464726573732e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e3c7374726f6e673e456d61696c203a3c2f7374726f6e673e207b7b24656d61696c7d7d3c6272202f3e0d0a0909090909090909093c6272202f3e0d0a0909090909090909093c7374726f6e673e4c696e6b203a3c2f7374726f6e673e203c6120687265663d5c227b7b55524c3a3a746f285c2770726f6a6563742f73656e64766572696669636174696f6e2f636f6e6669726d5c27297d7d2f7b7b2469647d7d2f7b7b24636f64657d7d5c223e636c69636b20686572653c2f613e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c7464207374796c653d5c22666f6e742d73697a653a313270783b5c222076616c69676e3d5c22746f705c222077696474683d5c22313030255c223e0d0a0909090909090909093c6833207374796c653d5c2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b5c223e526567617264732c3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e7b7b2473656e6465726e616d657d7d3c2f703e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e3c693e7b7b2473656e646572656d61696c7d7d3c2f693e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c7464207374796c653d5c22666f6e742d73697a653a313270783b2070616464696e673a3130707820313570783b5c222076616c69676e3d5c22746f705c222077696474683d5c2230255c223e266e6273703b3c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a3c2f626f64793e0d0a3c2f68746d6c3e, '2015-04-03 09:56:10'),
(11, 'projectupdates', 'Fundstarter project updates', 'admin@casperon.in', 'admin', 0x3c21444f43545950452048544d4c3e0d0a3c68746d6c3e0d0a3c686561643e3c6d65746120687474702d65717569763d5c22436f6e74656e742d547970655c2220636f6e74656e743d5c22746578742f68746d6c3b20636861727365743d7574662d385c223e3c6d657461206e616d653d5c2276696577706f72745c2220636f6e74656e743d5c2277696474683d6465766963652d77696474685c222f3e0d0a093c7469746c653e466f72676f742050617373776f72643c2f7469746c653e0d0a3c2f686561643e0d0a3c626f6479206c6566746d617267696e3d5c22305c22206d617267696e6865696768743d5c22305c22206d617267696e77696474683d5c22305c2220746f706d617267696e3d5c22305c223e0d0a3c7461626c65206267636f6c6f723d5c22233764613263315c2220626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c222077696474683d5c223634305c223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c7464207374796c653d5c2270616464696e673a343070783b5c223e0d0a0909093c7461626c6520626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c22207374796c653d5c22626f726465723a233164343536372031707820736f6c69643b20666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b5c222077696474683d5c223631305c223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d5c224865616465725c22206865696768743d5c223134385c22207372633d5c227b7b55524c3a3a746f28246c6f676f297d7d5c22207374796c653d5c226d617267696e3a3070783b2070616464696e673a3070783b20626f726465723a6e6f6e653b5c222077696474683d5c223630385c22202f3e3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74642076616c69676e3d5c22746f705c223e0d0a0909090909093c7461626c65206267636f6c6f723d5c22234646464646465c2220626f726465723d5c22305c222063656c6c70616464696e673d5c22305c222063656c6c73706163696e673d5c22305c223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d5c22325c223e0d0a0909090909090909093c6833207374796c653d5c2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b5c223e50726f6a65637420757064617465206f66207b7b2470726f6a6563747469746c657d7d3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a313070782031357078203130707820313570783b20666f6e742d73697a653a313470783b206d617267696e3a3070783b5c223e3c7374726f6e673e44656172207b7b246e616d657d7d2c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e436c69636b20746865206c696e6b20746f207669657720746865207570646174652e3c2f703e0d0a0909090909090909093c6272202f3e0d0a0909090909090909093c7374726f6e673e4c696e6b203a3c2f7374726f6e673e203c6120687265663d5c227b7b55524c3a3a746f285c272f70726f6a6563742f64657461696c5c27297d7d2f7b7b2470726f6a65637469647d7d5c223e636c69636b20686572653c2f613e0d0a0d0a0909090909090909093c703e266e6273703b3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c7464207374796c653d5c22666f6e742d73697a653a313270783b5c222076616c69676e3d5c22746f705c222077696474683d5c22313030255c223e0d0a0909090909090909093c6833207374796c653d5c2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b5c223e526567617264732c3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e7b7b2473656e6465726e616d657d7d3c2f703e0d0a0d0a0909090909090909093c70207374796c653d5c2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b5c223e3c693e7b7b2473656e646572656d61696c7d7d3c2f693e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c7464207374796c653d5c22666f6e742d73697a653a313270783b2070616464696e673a3130707820313570783b5c222076616c69676e3d5c22746f705c222077696474683d5c2230255c223e266e6273703b3c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, '2015-04-08 10:23:35'),
(12, 'projectcomments', 'Notification from kickstarter for comment on your project', 'admin@casperon.in', 'admin', 0x3c21444f43545950452048544d4c3e0d0a3c68746d6c3e0d0a3c686561643e3c6d65746120687474702d65717569763d22436f6e74656e742d547970652220636f6e74656e743d22746578742f68746d6c3b20636861727365743d7574662d38223e3c6d657461206e616d653d2276696577706f72742220636f6e74656e743d2277696474683d6465766963652d7769647468222f3e0d0a093c7469746c653e50726f6a656374205570646174653c2f7469746c653e0d0a3c2f686561643e0d0a3c626f6479206c6566746d617267696e3d223022206d617267696e6865696768743d223022206d617267696e77696474683d22302220746f706d617267696e3d2230223e0d0a3c7461626c65206267636f6c6f723d22233764613263312220626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d2230222077696474683d22363430223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c7464207374796c653d2270616464696e673a343070783b223e0d0a0909093c7461626c6520626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d223022207374796c653d22626f726465723a233164343536372031707820736f6c69643b20666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b222077696474683d22363130223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d2248656164657222206865696768743d2231343822207372633d227b7b55524c3a3a746f282727297d7d2f7b7b246c6f676f7d7d22207374796c653d226d617267696e3a3070783b2070616464696e673a3070783b20626f726465723a6e6f6e653b222077696474683d2236303822202f3e3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74642076616c69676e3d22746f70223e0d0a0909090909093c7461626c65206267636f6c6f723d22234646464646462220626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d2230223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d2232223e0d0a0909090909090909093c6833207374796c653d2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b223e5669657720636f6d6d656e74206f6e207b7b2470726f6a6563747469746c657d7d3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a313070782031357078203130707820313570783b20666f6e742d73697a653a313470783b206d617267696e3a3070783b223e3c7374726f6e673e44656172207b7b246e616d657d7d2c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e7b7b246261636b65726e616d657d7d20636f6d6d656e746564206f6e20796f75722070726f6a656374207b7b2470726f6a6563747469746c657d7d2e3c6272202f3e0d0a090909090909090909436c69636b20746865206c696e6b20746f20766965772074686520636f6d6d656e742e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e3c7374726f6e673e4c696e6b203a3c2f7374726f6e673e203c6120687265663d227b7b55524c3a3a746f28272f70726f6a6563742f64657461696c27297d7d2f7b7b2470726f6a65637469647d7d223e636c69636b20686572653c2f613e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c7464207374796c653d22666f6e742d73697a653a313270783b222076616c69676e3d22746f70222077696474683d2231303025223e0d0a0909090909090909093c6833207374796c653d2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b223e526567617264732c3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e7b7b2473656e6465726e616d657d7d3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e3c693e7b7b2473656e646572656d61696c7d7d3c2f693e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c7464207374796c653d22666f6e742d73697a653a313270783b2070616464696e673a3130707820313570783b222076616c69676e3d22746f70222077696474683d223025223e266e6273703b3c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, '2015-04-08 11:58:42'),
(13, 'projectbacking', 'Notification from kickstarter for backing your project', 'admin@casperon.in', 'admin', 0x3c21444f43545950452048544d4c3e0d0a3c68746d6c3e0d0a3c686561643e3c6d65746120687474702d65717569763d22436f6e74656e742d547970652220636f6e74656e743d22746578742f68746d6c3b20636861727365743d7574662d38223e3c6d657461206e616d653d2276696577706f72742220636f6e74656e743d2277696474683d6465766963652d7769647468222f3e0d0a093c7469746c653e50726f6a656374204261636b65643c2f7469746c653e0d0a3c2f686561643e0d0a3c626f6479206c6566746d617267696e3d223022206d617267696e6865696768743d223022206d617267696e77696474683d22302220746f706d617267696e3d2230223e0d0a3c7461626c65206267636f6c6f723d22233764613263312220626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d2230222077696474683d22363430223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c7464207374796c653d2270616464696e673a343070783b223e0d0a0909093c7461626c6520626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d223022207374796c653d22626f726465723a233164343536372031707820736f6c69643b20666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b222077696474683d22363130223e0d0a090909093c74626f64793e0d0a09090909093c74723e0d0a0909090909093c74643e3c696d6720616c743d2248656164657222206865696768743d2231343822207372633d227b7b55524c3a3a746f282727297d7d2f7b7b246c6f676f7d7d22207374796c653d226d617267696e3a3070783b2070616464696e673a3070783b20626f726465723a6e6f6e653b222077696474683d2236303822202f3e3c2f74643e0d0a09090909093c2f74723e0d0a09090909093c74723e0d0a0909090909093c74642076616c69676e3d22746f70223e0d0a0909090909093c7461626c65206267636f6c6f723d22234646464646462220626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d2230223e0d0a090909090909093c74626f64793e0d0a09090909090909093c74723e0d0a0909090909090909093c746420636f6c7370616e3d2232223e0d0a0909090909090909093c6833207374796c653d2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b223e56696577206261636b696e67206f6e207b7b2470726f6a6563747469746c657d7d3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a313070782031357078203130707820313570783b20666f6e742d73697a653a313470783b206d617267696e3a3070783b223e3c7374726f6e673e44656172207b7b246e616d657d7d2c3c2f7374726f6e673e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e7b7b246261636b65726e616d657d7d206261636b656420796f75722070726f6a656374207b7b2470726f6a6563747469746c657d7d2e3c6272202f3e0d0a090909090909090909436c69636b20746865206c696e6b20746f2076696577206261636b696e672e3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e3c7374726f6e673e4c696e6b203a3c2f7374726f6e673e203c6120687265663d227b7b55524c3a3a746f28272f70726f6a6563742f64657461696c27297d7d2f7b7b2470726f6a65637469647d7d223e636c69636b20686572653c2f613e3c2f703e0d0a0909090909090909093c2f74643e0d0a09090909090909093c2f74723e0d0a09090909090909093c74723e0d0a0909090909090909093c7464207374796c653d22666f6e742d73697a653a313270783b222076616c69676e3d22746f70222077696474683d2231303025223e0d0a0909090909090909093c6833207374796c653d2270616464696e673a3130707820313570783b206d617267696e3a3070783b20636f6c6f723a233064343837613b223e526567617264732c3c2f68333e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e7b7b2473656e6465726e616d657d7d3c2f703e0d0a0d0a0909090909090909093c70207374796c653d2270616464696e673a3070782031357078203130707820313570783b20666f6e742d73697a653a313270783b206d617267696e3a3070783b223e3c693e7b7b2473656e646572656d61696c7d7d3c2f693e3c2f703e0d0a0909090909090909093c2f74643e0d0a0909090909090909093c7464207374796c653d22666f6e742d73697a653a313270783b2070616464696e673a3130707820313570783b222076616c69676e3d22746f70222077696474683d223025223e266e6273703b3c2f74643e0d0a09090909090909093c2f74723e0d0a090909090909093c2f74626f64793e0d0a0909090909093c2f7461626c653e0d0a0909090909093c2f74643e0d0a09090909093c2f74723e0d0a090909093c2f74626f64793e0d0a0909093c2f7461626c653e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, '2015-04-08 12:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `paymentgateways`
--

CREATE TABLE IF NOT EXISTS `paymentgateways` (
`id` int(11) NOT NULL,
  `gatewayname` varchar(100) NOT NULL,
  `settings` text NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentgateways`
--

INSERT INTO `paymentgateways` (`id`, `gatewayname`, `settings`, `status`) VALUES
(1, 'PAYPAL IPN TEST', 'a:3:{s:4:"mode";s:7:"sandbox";s:14:"merchant_email";s:35:"vinubusiness1-facilitator@gmail.com";s:14:"paypal_ipn_url";s:11:"www.ipn.net";}', 'active');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `userid`, `backingid`, `projectid`, `amount`, `paykey`, `transactionid`, `shippingstatus`, `paymenttype`, `payeremail`, `recievedstatus`, `paidon`) VALUES
(6, 1, 41, 7, 5, 'AP-67C8190894890671D', '9', 'active', 0, '0', 'active', '2015-04-20'),
(7, 1, 42, 7, 5, 'AP-0KD98072Y7993110F', '0', 'active', 0, '0', 'active', '2015-04-20'),
(8, 1, 43, 7, 2, 'AP-5WN03451R8912614V', '0', 'active', 0, '0', 'active', '2015-04-20'),
(9, 1, 44, 18, 10, 'AP-39P08174M5631952P', '3FY82411WY7325546', 'active', 0, 'vijibuyer@casperon.in', 'active', '2015-04-20'),
(10, 1, 46, 18, 10, 'AP-76R09224E1395641E', '', 'active', 0, '', 'active', '2015-04-21'),
(11, 15, 49, 7, 20, 'AP-09S83693L2562563B', '9VR752303V409294W', 'active', 0, 'vinobuyer@casperon.in', 'active', '2015-04-21'),
(12, 15, 50, 18, 100, 'AP-7CH11370U7573804X', '0SM28855W2719451M', 'active', 0, 'vijibuyer@casperon.in', 'active', '2015-04-21'),
(13, 16, 51, 18, 100, 'AP-86A74060NW099553H', '7A986626XH227071V', 'active', 0, 'vinobuyer@casperon.in', 'active', '2015-04-21'),
(14, 16, 52, 18, 50, 'AP-8X900856M8644564N', '05F13578TB497280B', 'active', 0, 'vinobuyer@casperon.in', 'active', '2015-04-21'),
(15, 1, 53, 18, 50, 'AP-9EX67810M5969291V', '0JH81458317888053', 'active', 0, 'vijibuyer@casperon.in', 'active', '2015-04-21'),
(16, 1, 54, 14, 10, 'AP-2X103654TL964540W', '88E47029P4309771Y', 'active', 0, 'vinobuyer@casperon.in', 'active', '2015-04-21'),
(17, 16, 55, 22, 2, 'AP-8RS87579X56403149', '', 'active', 0, '', 'active', '2015-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `prefooters`
--

CREATE TABLE IF NOT EXISTS `prefooters` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `footerlink` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prefooters`
--

INSERT INTO `prefooters` (`id`, `title`, `description`, `footerlink`, `image`, `status`, `createdon`) VALUES
(1, 'prefooter1 update', 'description for prefooter update', 'http://localhost:8080/kickstarter/public/addprefooterupdate', 'uploads/images/prefooters/380426.jpg', 'active', '2015-03-09');

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
  `shortblurb` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `fundingduration` varchar(100) NOT NULL,
  `fundinggoal` float(10,2) NOT NULL,
  `endingon` date NOT NULL,
  `totalpledgeamount` float(10,2) NOT NULL,
  `totalbacking` int(45) NOT NULL,
  `currencyid` int(11) NOT NULL,
  `projectimage` varchar(125) NOT NULL,
  `projectvideo` varchar(100) NOT NULL,
  `description` blob NOT NULL,
  `risks` blob NOT NULL,
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
  `paypalemail` varchar(255) NOT NULL,
  `isfunded` tinyint(4) NOT NULL,
  `createdon` date NOT NULL,
  `updatedon` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `userid`, `categoryid`, `subcategoryid`, `shortblurb`, `location`, `fundingduration`, `fundinggoal`, `endingon`, `totalpledgeamount`, `totalbacking`, `currencyid`, `projectimage`, `projectvideo`, `description`, `risks`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `recipient`, `businessname`, `businesstype`, `idverified`, `identityproof`, `prooftype`, `proofverified`, `paypalemail`, `isfunded`, `createdon`, `updatedon`) VALUES
(3, 'Creative', 1, 1, 0, 'Checkboxes (and radio buttons) are on/off switches that may be toggled by the user. ', '215', '39', 300.00, '2015-04-21', 150.00, 2, 0, 'uploads/images/projects/Creative/projectimage.jpg', 'uploads/images/projects/Creative/projectvideo.jpeg', 0x0d0a0d0a093c7469746c653e3c2f7469746c653e0d0a0d0a0d0a3c703e3c696d6720616c743d2222207372633d22687474703a2f2f7777772e6d616769633477616c6c732e636f6d2f77702d636f6e74656e742f75706c6f6164732f323031342f30342f6469676974616c2d6172742d6c696c792d666c6f7765722d77617465722d63726561746976652d696465612d73706c6173682d68642d77616c6c70617065722d7769646573637265656e2e6a706722207374796c653d2277696474683a2034303070783b206865696768743a2032353770783b223e3c2f703e0d0a0d0a3c703e3c7370616e207374796c653d22666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e3c7374726f6e673e3c656d3e697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747565722061646970697363696e6720656c69742e204d616563656e6173206665756769617420636f6e736571756174206469616d2e204d616563656e6173206d657475732e20566976616d7573206469616d2070757275732c2063757273757320612c20636f6d6d6f646f3c2f656d3e3c2f7374726f6e673e206e6f6e2c20666163696c697369732076697461652c206e756c6c612e2041656e65616e2064696374756d206c6163696e696120746f72746f722e204e756e6320696163756c69732c206e696268206e6f6e20696163756c697320616c697175616d2c206f7263692066656c697320657569736d6f64206e657175652c20736564206f726e617265206d61737361206d6175726973207365642076656c69742e204e756c6c61207072657469756d206d692065742072697375732e204675736365206d6920706564652c2074656d706f722069642c206375727375732061632c20756c6c616d636f72706572206e65632c20656e696d2e203c753e3c7374726f6e673e536564203c2f7374726f6e673e3c2f753e746f72746f722e20437572616269747572206d6f6c65737469652e20447569732076656c69742061756775652c20636f6e64696d656e74756d2061742c20756c74726963657320612c206c75637475732075742c206f7263692e20446f6e6563203c753e3c7374726f6e673e70656c6c656e746573717565203c2f7374726f6e673e3c2f753e656765737461732065726f732e266e6273703b3c2f7370616e3e3c2f703e0d0a0d0a0d0a, 0x697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747565722061646970697363696e6720656c69742e204d616563656e6173206665756769617420636f6e736571756174206469616d2e204d616563656e6173206d657475732e20566976616d7573206469616d2070757275732c2063757273757320612c20636f6d6d6f646f206e6f6e2c20666163696c697369732076697461652c206e756c6c612e2041656e65616e2064696374756d206c6163696e696120746f72746f722e204e756e6320696163756c69732c206e696268206e6f6e20696163756c697320616c697175616d2c206f7263692066656c697320657569736d6f64206e657175652c20736564206f726e617265206d61737361206d6175726973207365642076656c69742e204e756c6c61207072657469756d206d692065742072697375732e204675736365206d6920706564652c2074656d706f722069642c206375727375732061632c20756c6c616d636f72706572206e65632c20656e696d2e2053656420746f72746f722e20437572616269747572206d6f6c65737469652e20447569732076656c69742061756775652c20636f6e64696d656e74756d2061742c20756c74726963657320612c206c75637475732075742c206f7263692e20446f6e65632070656c6c656e74657371756520656765737461732065726f732e20, '', '', '', '', '', 0, 'individual', '', '', 0, '', '', 0, '', 0, '2015-03-12', '0000-00-00'),
(6, 'Newproject', 1, 4, 0, 'ui rui ruiehir ryhe yhfdhgiudfgiufdhguiduiy gif ytet uyyh 7uierfeg', '1', '30', 200.00, '2015-03-23', 200.00, 1, 0, 'uploads/images/projects/Newproject/projectimage.jpg', 'http://www.youtube.com/embed/UFrYGiSi0Uw', 0x5b695d446f6e277420757365206d757369632c20696d616765732c20766964656f2c206f72206f7468657220636f6e74656e74207468617420796f7520646f6e27742068617665207468652072696768747320746f2e0d0a0d0a5b625d2052657573696e6720636f707972696768746564206d6174655b2f625d5b2f695d5b625d7269616c205b2f625d697320616c6d6f737420616c7761797320616761696e737420746865206c617720616e642063616e206c65616420746f5b625d657870656e73697665206c617773756974735b2f625dc2a0646f776e2074686520726f61642e0d0a0d0a2054686520656173696573742077617920746f2061766f696420636f707972696768742074726f75626c657320697320746f2063726561746520616c6c2074686520636f6e74656e7420796f757273656c66206f7220757365205b625d636f6e74656e742074686174206973206672656520666f72207075626c6963207573655b2f625d2e, 0x5768656e20697420636f6d657320746f2066756c66696c6c6d656e742c2065766572792070726f6a6563742068617320706f74656e7469616c206f62737461636c65732c2066726f6d2070726f64756374696f6e2064656c61797320746f207065726d69747320746f20636f6c6c61626f7261746f72206d6973686170732e205768617420756e69717565206368616c6c656e676573206d6967687420796f75206661636520616674657220796f75722070726f6a656374206973207375636365737366756c6c792066756e6465643f20416e64206966207365746261636b7320646f2061726973652028776520686f7065207468657920646f6ee28099742c206275742069742068617070656e7321292c20686f772077696c6c20796f75207461636b6c65207468656d3f20496620796f75206861766520616e79206f746865722070726f6a65637473207468617420796f752772652063757272656e746c7920696e207468652070726f63657373206f662066756c66696c6c696e672c20706c65617365206d656e74696f6e2074686569722073746174757320696e20746869732073656374696f6e2e, 'teynampet', 'mylapore', 'chennai', 'tamilnadu', 'India', 600018, 'individual', '', '', 2, 'uploads/images/projects/6/identityproof.png', 'voter id', 2, 'vinoseller@casperon.in', 0, '2015-02-21', '2015-04-15'),
(7, 'sample comics', 16, 5, 0, ' dhf hdfhf sdhfudhu urfh efhe ffuer ffgh fghdfh gdfhg dfuhgudfhg udf dsdgds sd ssdfsd fsdf sdf sdfsdfsdfsd dsf sdfs', '1', '24', 100.00, '2015-04-21', 110.00, 5, 0, 'uploads/images/projects/sample comics/projectimage.jpg', 'uploads/images/projects/sample comics/projectvideo.jpg', 0x3c68746d6c3e0d0a3c686561643e0d0a093c7469746c653e3c2f7469746c653e0d0a3c2f686561643e0d0a3c626f64793e0d0a3c703e7265777277752065722077206577752075207520752075207520752075207520752075206a6b6c68626b6c20626c76206268696c64666a696f676a2064696f66676f2072696f6766676a206669646a67696f64666a2069676a64662069676a2069646f6a662067696f206466696f676a20696f64666a67696f6a206466696f207220696f677265696f676a696f666a67696f6a6f206f673c2f703e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, 0x746574657220746572742065746572746420666466676667686667682066677320726661736466676874797920797475747574757479757479757479756a, 'chennai', 'chennai', 'chennai', 'tamilnadu', 'India', 600018, 'individual', '', '', 2, '', '', 2, 'vinomerchant@casperon.in', 1, '2015-03-27', '0000-00-00'),
(8, 'sample', 1, 6, 0, 'Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\n', '1', '6', 120.00, '2015-03-31', 0.00, 0, 0, 'uploads/images/projects/sample/projectimage.jpg', 'uploads/images/projects/sample/projectvideo.jpg', 0x3c68746d6c3e0d0a3c686561643e0d0a093c7469746c653e3c2f7469746c653e0d0a3c2f686561643e0d0a3c626f64793e0d0a3c703e71776571776520717765206572686577697220696f2072206572657538796875696620667265756668756572666768667220266e6273703b2072206f206f74656f7267726966696f2067696f64666820676f646820666f67686f6466683c2f703e0d0a0d0a3c703e67646667206f6466696f676a6466673c2f703e0d0a0d0a3c703e646720696f703c2f703e0d0a0d0a3c703e64666766646d3067696f2065723c2f703e0d0a0d0a3c703e262333393b7465657274797236377975747975793c2f703e0d0a0d0a3c703e6a683b6a673c2f703e0d0a0d0a3c703e686a67683b5b6a67686a3c2f703e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, 0x74797274797274792074792072747972747972747972747974207972747972742079727420797274792072747974722079727479727479777274736466672073646620736466616466736166776572776572, 'teynampet', 'mylapore', 'chennai', 'tamilnadu', 'India', 600018, '', 'It software', 'corporation', 2, 'uploads/images/projects/8/identityproof.png', 'passport', 2, 'vinoseller@casperon.in', 0, '2015-03-25', '2015-04-15'),
(9, 'sample design', 16, 7, 0, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', '2', '7', 320.00, '0000-00-00', 0.00, 0, 0, 'uploads/images/projects/sample design/projectimage.jpg', 'uploads/images/projects/sample design/projectvideo.jpg', 0x3c68746d6c3e0d0a3c686561643e0d0a093c7469746c653e3c2f7469746c653e0d0a3c2f686561643e0d0a3c626f64793e0d0a3c703e776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c3c6272202f3e0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a3c6272202f3e0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e3c2f703e0d0a0d0a3c703e776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c3c6272202f3e0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a3c6272202f3e0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e3c2f703e0d0a0d0a3c703e776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c3c6272202f3e0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a3c6272202f3e0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e3c2f703e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, 0x776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e, '', '', '', '', '', 0, 'individual', '', '', 0, '', '', 0, '', 0, '2015-03-25', '0000-00-00'),
(10, 'sample fashion', 16, 8, 0, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', '1', '9', 200.00, '0000-00-00', 0.00, 0, 0, 'uploads/images/projects/sample fashion/projectimage.jpg', 'uploads/images/projects/sample fashion/projectvideo.jpg', 0x3c68746d6c3e0d0a3c686561643e0d0a093c7469746c653e3c2f7469746c653e0d0a3c2f686561643e0d0a3c626f64793e0d0a3c703e776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c3c6272202f3e0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a3c6272202f3e0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e3c2f703e0d0a0d0a3c703e776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c3c6272202f3e0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a3c6272202f3e0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e3c2f703e0d0a0d0a3c703e776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c3c6272202f3e0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a3c6272202f3e0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e3c2f703e0d0a0d0a3c703e266e6273703b3c2f703e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, 0x776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e, '', '', '', '', '', 0, 'individual', '', '', 0, '', '', 0, '', 0, '2015-03-25', '0000-00-00'),
(11, 'sample food', 16, 10, 0, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', '11', '10', 300.00, '0000-00-00', 0.00, 0, 0, 'uploads/images/projects/sample food/projectimage.jpg', 'uploads/images/projects/sample food/projectvideo.jpg', 0x3c68746d6c3e0d0a3c686561643e0d0a093c7469746c653e3c2f7469746c653e0d0a3c2f686561643e0d0a3c626f64793e0d0a3c703e776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c3c6272202f3e0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a3c6272202f3e0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e3c2f703e0d0a0d0a3c703e776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c3c6272202f3e0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a3c6272202f3e0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e3c2f703e0d0a0d0a3c703e776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c3c6272202f3e0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a3c6272202f3e0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e3c2f703e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, 0x776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e, '', '', '', '', '', 0, 'individual', '', '', 0, '', '', 0, '', 0, '2015-03-27', '0000-00-00'),
(12, 'sample games', 15, 11, 0, 'ewer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', '1', '8', 400.00, '0000-00-00', 0.00, 0, 0, 'uploads/images/projects/sample games/projectimage.jpg', 'uploads/images/projects/sample games/projectvideo.jpg', 0x3c68746d6c3e0d0a3c686561643e0d0a093c7469746c653e3c2f7469746c653e0d0a3c2f686561643e0d0a3c626f64793e0d0a3c703e776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c3c6272202f3e0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a3c6272202f3e0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e3c2f703e0d0a0d0a3c703e776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c3c6272202f3e0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a3c6272202f3e0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e3c2f703e0d0a0d0a3c703e776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c3c6272202f3e0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a3c6272202f3e0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e3c2f703e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, 0x776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e, '', '', '', '', '', 0, 'individual', '', '', 0, '', '', 0, '', 0, '2015-03-27', '0000-00-00'),
(13, 'sample music', 15, 13, 0, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', '95', '15', 180.00, '0000-00-00', 0.00, 1, 0, 'uploads/images/projects/sample music/projectimage.jpg', 'uploads/images/projects/sample music/projectvideo.jpg', 0x3c68746d6c3e0d0a3c686561643e0d0a093c7469746c653e3c2f7469746c653e0d0a3c2f686561643e0d0a3c626f64793e0d0a3c703e776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c3c6272202f3e0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a3c6272202f3e0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e3c2f703e0d0a0d0a3c703e776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c3c6272202f3e0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a3c6272202f3e0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e3c2f703e0d0a0d0a3c703e776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c3c6272202f3e0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a3c6272202f3e0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e3c2f703e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, 0x776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e, '', '', '', '', '', 0, 'individual', '', '', 0, '', '', 0, '', 0, '2015-03-22', '0000-00-00'),
(14, 'sample technology', 16, 15, 0, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', '76', '30', 1000.00, '0000-00-00', 10.00, 1, 0, 'uploads/images/projects/sample technology/projectimage.jpg', 'uploads/images/projects/sample technology/projectvideo.jpg', 0x3c68746d6c3e0d0a3c686561643e0d0a093c7469746c653e3c2f7469746c653e0d0a3c2f686561643e0d0a3c626f64793e0d0a3c703e776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c3c6272202f3e0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a3c6272202f3e0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e3c2f703e0d0a0d0a3c703e776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c3c6272202f3e0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a3c6272202f3e0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c3c6272202f3e0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a3c6272202f3e0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e3c2f703e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, 0x776572206577722075646668677568206720756466686720696475666867697564682067756966687569676468667569677569686572756968677569686575726967682048656c6c6f2065766572796f6e652c0d0a4974206d6967687420626520736f6d657468696e67207472697669616c2c20627574204920636f756c64206e6f742066696e6420612077617920746f206d616b65207468697320656c6567616e743a0d0a49206861766520612043617465676f7279206d6f64656c20616e6420612050696374757265206d6f64656c2e, '', '', '', '', '', 0, 'individual', '', '', 2, '', '', 2, 'vinomerchant@casperon.in', 0, '2015-03-27', '0000-00-00'),
(18, 'Photography of Yellow flowers', 23, 4, 0, 'These words will help people find your project, so choose them wisely! Your name will be searchable too.', '95', '19', 100.00, '2015-04-21', 100.00, 6, 0, 'uploads/images/projects/18/projectimage.jpg', 'uploads/images/projects/18/projectvideo.mp4', 0x55736520796f75722070726f6a656374206465736372697074696f6e20746f207368617265206d6f72652061626f7574207768617420796f75e2809972652072616973696e672066756e647320746f20646f20616e6420686f7720796f7520706c616e20746f2070756c6c206974206f66662e204974e280997320757020746f20796f7520746f206d616b6520746865206361736520666f7220796f75722070726f6a6563742e0d0a0d0a5b625d55736520796f75722070726f6a656374206465736372697074696f6e20746f207368617265206d6f72652061626f7574207768617420796f75e2809972652072616973696e672066756e647320746f20646f20616e6420686f7720796f7520706c616e20746f2070756c6c206974206f66662e204974e280997320757020746f20796f7520746f206d616b6520746865206361736520666f7220796f75722070726f6a6563742e5b2f625d0d0a0d0a5b695d55736520796f75722070726f6a656374206465736372697074696f6e20746f207368617265206d6f72652061626f7574207768617420796f75e2809972652072616973696e672066756e647320746f20646f20616e6420686f7720796f7520706c616e20746f2070756c6c206974206f66662e204974e280997320757020746f20796f7520746f206d616b6520746865206361736520666f7220796f75722070726f6a6563742e5b766964656f5d5145617a394265317a2d515b2f766964656f5d5b2f695d, 0x55736520796f75722070726f6a656374206465736372697074696f6e20746f207368617265206d6f72652061626f7574207768617420796f75e2809972652072616973696e672066756e647320746f20646f20616e6420686f7720796f7520706c616e20746f2070756c6c206974206f66662e204974e280997320757020746f20796f7520746f206d616b6520746865206361736520666f7220796f75722070726f6a6563742e, '', '', '', '', '', 0, 'individual', '', '', 2, '', '', 2, 'vinomerchant@casperon.in', 1, '2015-04-01', '0000-00-00'),
(21, 'publishing sample', 16, 14, 0, 'Your project title and blurb should be simple, specific, and memorable. Our search tools run through these sections of your project,', '18', '56', 200.00, '2015-05-30', 0.00, 0, 0, '', '', '', '', '', '', '', '', '', 0, 'individual', '', '', 0, '', '', 0, '', 0, '2015-04-04', '0000-00-00'),
(22, 'Craft design', 1, 17, 0, 'Your project title and blurb should be simple, specific, and memorable. ', '7', '25', 200.00, '2015-04-27', 0.00, 0, 0, 'uploads/images/projects/22/projectimage.jpg', '', '', '', 'teynampet', 'mylapore', 'chennai', 'tamilnadu', 'India', 600018, 'individual', '', '', 2, 'uploads/images/projects/22/identityproof.png', 'driving license', 2, 'vinomerchant@casperon.in', 0, '2015-04-07', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE IF NOT EXISTS `rewards` (
`id` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `pledgeamount` int(11) NOT NULL,
  `description` text NOT NULL,
  `shippinginvolved` tinyint(4) NOT NULL,
  `shippingdetails` varchar(100) NOT NULL,
  `estimateddelivery` varchar(45) NOT NULL,
  `islimited` tinyint(4) NOT NULL,
  `quantity` int(11) NOT NULL,
  `countrylist` text NOT NULL,
  `backerscount` int(45) NOT NULL,
  `createdon` date NOT NULL,
  `updatedon` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`id`, `projectid`, `pledgeamount`, `description`, `shippinginvolved`, `shippingdetails`, `estimateddelivery`, `islimited`, `quantity`, `countrylist`, `backerscount`, `createdon`, `updatedon`) VALUES
(12, 3, 10, 'dhf duisd uid fuisfg uisf huid uisdhfusdfi sdh iosrhguierh uied fuygf dyugyguyg uxi cvxugv uxcgvyxcgyi', 0, '', '4-2016', 1, 25, 'Afghanistan', 1, '2015-03-16', '2015-03-18'),
(13, 3, 20, 'er8u we90r 990wfu90u f89u ohfioofg tjh ghohgoh doijhdo fijoid godfiogdfguodoifu ifgjhofgojhifgoh f fgiohiofjhiof hjto hrtgujhio', 1, '', '9-2016', 1, 30, 'Andorra,United Arab Emirates,Afghanistan,Antigua And Barbuda,Albania,Armenia,Angola,Antarctica,Argentina,American Samoa,Austria,Australia,Aruba,Aland Islands', 2, '2015-03-16', '2015-03-16'),
(14, 6, 1, 'rter rt retert rt ret etetrtet trtertertert', 1, '', '1-2015', 1, 1, 'United Arab Emirates,Bulgaria,Czech Republic,Guernsey,Jordan', 1, '2015-03-16', '2015-03-16'),
(15, 6, 12, 'sdas deedrtf3ftgsfgsfg fgdfgfdf', 1, '', '1-2015', 0, 0, 'United Arab Emirates,Afghanistan,Antigua And Barbuda', 1, '2015-03-17', '2015-03-17'),
(16, 7, 1, 'sdasd as r rqwrqwrwerwer', 0, '', '1-2015', 0, 0, '', 1, '2015-03-27', '2015-03-27'),
(17, 7, 10, 'fsd sdfs fsd fsd sdf sdfsdfds rg fh rtfgh tgvbhvbvrtgbh ', 0, '', '1-2015', 0, 0, '', 0, '2015-03-27', '2015-03-27'),
(18, 8, 1, 'Copies of what you''re making, unique experiences, and limited editions work great.', 0, '', '2-2015', 1, 12, '', 0, '2015-03-27', '2015-04-02'),
(19, 8, 10, 'wer we  erew rwerewr wer we  rwe rer wer wewerwerwerwerwerwerwe', 0, '', '1-2015', 1, 12, '', 0, '2015-03-27', '2015-03-27'),
(20, 8, 20, 'ew rwerwerwewe rw efedf dfdghfhfghghfg hfgh gfhfghfghfggh fgsdfgsd s', 0, '', '1-2015', 1, 21, '', 0, '2015-03-27', '2015-03-27'),
(21, 9, 1, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, ', 0, '', '1-2015', 0, 0, '', 0, '2015-03-27', '2015-03-27'),
(22, 9, 5, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', 0, '', '1-2015', 1, 12, '', 0, '2015-03-27', '2015-03-27'),
(23, 9, 20, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', 0, '', '1-2015', 1, 50, '', 0, '2015-03-27', '2015-03-27'),
(24, 10, 1, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', 0, '', '1-2015', 0, 0, '', 0, '2015-03-27', '2015-03-27'),
(25, 10, 10, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', 0, '', '1-2015', 1, 12, '', 0, '2015-03-27', '2015-03-27'),
(26, 11, 1, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', 0, '', '1-2015', 1, 12, '', 0, '2015-03-27', '2015-03-27'),
(27, 11, 10, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', 0, '', '1-2015', 1, 20, '', 0, '2015-03-27', '2015-03-27'),
(28, 11, 15, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', 0, '', '1-2015', 1, 25, '', 0, '2015-03-27', '2015-03-27'),
(29, 12, 1, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', 0, '', '1-2015', 1, 12, '', 0, '2015-03-27', '2015-03-27'),
(30, 12, 10, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', 0, '', '1-2015', 1, 45, '', 0, '2015-03-27', '2015-03-27'),
(31, 12, 20, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', 0, '', '1-2015', 1, 33, '', 0, '2015-03-27', '2015-03-27'),
(32, 13, 1, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', 0, '', '1-2015', 1, 12, '', 1, '2015-03-27', '2015-03-27'),
(33, 13, 10, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', 0, '', '1-2015', 1, 25, '', 0, '2015-03-27', '2015-03-27'),
(34, 14, 1, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', 0, '', '1-2015', 0, 0, '', 0, '2015-03-27', '2015-03-27'),
(35, 14, 10, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', 0, '', '1-2015', 1, 12, '', 0, '2015-03-27', '2015-03-27'),
(36, 14, 15, 'wer ewr udfhguh g udfhg idufhgiudh guifhuigdhfuiguiheruihguiheurigh Hello everyone,\r\nIt might be something trivial, but I could not find a way to make this elegant:\r\nI have a Category model and a Picture model.', 0, '', '1-2015', 0, 0, '', 0, '2015-03-27', '2015-03-27'),
(37, 18, 1, 'Copies of what you''re making, unique experiences, and limited editions work great.', 0, '', '2-2015', 1, 12, '', 2, '2015-04-02', '2015-04-02'),
(38, 18, 10, 'Rewards not directly produced by the creator or the project itself', 0, '', '3-2015', 1, 45, '', 1, '2015-04-02', '2015-04-02'),
(39, 18, 23, 'Funds that backers pledge to account for shipping costs will count towards your project''s funding goal. ', 1, '', '4-2017', 1, 54, 'Andorra,Burkina Faso,Eritrea,Hungary,Kazakhstan', 0, '2015-04-02', '2015-04-02'),
(40, 18, 40, 'Rewards in bulk quantities (more than ten of an item)', 0, '', '8-2016', 1, 56, '', 0, '2015-04-02', '2015-04-02'),
(41, 22, 2, 'Backers receive one 4-piece Planetware place setting (1 each of a Cup, Bowl, 8" Salad Plate, 11" Dinner Plate) in the color of your choice.', 0, '', '1-2015', 1, 5, '', 0, '2015-04-22', '2015-04-22');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status` varchar(65) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slidername`, `slidertitle`, `sliderimage`, `sliderdescription`, `status`) VALUES
(3, 'homeslider1', 'Explore projects, everywhere', 'uploads/images/sliders/897744.jpg', 'Check out Fundstarter for iPhone and iPad', 'active'),
(4, 'homeslider2', 'Introducing spotlight', 'uploads/images/sliders/360430.png', 'unding is just the beginning. Meet the new spotlight page, where every project can tell its whole story — all in one place.', 'active'),
(5, 'homeslider3', 'Power to the People', 'uploads/images/sliders/538272.jpg', 'Help Stanley Nelson share the vital history of an American movement with audiences nationwide.', 'active'),
(6, 'sample', 'Sample', 'uploads/images/sliders/436758.jpg', 'Sample description', 'inactive');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `starredprojects`
--

INSERT INTO `starredprojects` (`id`, `userid`, `projectid`, `status`, `createdon`) VALUES
(5, 16, 7, 1, '2015-04-13'),
(8, 1, 14, 1, '2015-04-21');

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
) ENGINE=MyISAM AUTO_INCREMENT=869 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `countryid`, `statecode`, `statename`, `status`) VALUES
(3, 215, 'AS', 'American Samoa', 'active'),
(4, 215, 'AZ', 'Arizona', 'active'),
(5, 215, 'AR', 'Arkansas', 'active'),
(6, 215, 'AF', 'Armed Forces Africa', 'active'),
(7, 215, 'AA', 'Armed Forces Americas', 'active'),
(8, 215, 'AC', 'Armed Forces Canada', 'active'),
(9, 215, 'AE', 'Armed Forces Europe', 'active'),
(10, 215, 'AM', 'Armed Forces Middle East', 'active'),
(11, 215, 'AP', 'Armed Forces Pacific', 'active'),
(12, 215, 'CA', 'demo', 'active'),
(13, 215, 'CO', 'Colorado', 'active'),
(14, 215, 'CT', 'Connecticut', 'active'),
(15, 215, 'DE', 'Delaware', 'active'),
(16, 215, 'DC', 'District of Columbia', 'active'),
(17, 215, 'FM', 'Federated States Of Micronesia', 'active'),
(18, 215, 'FL', 'Florida', 'active'),
(19, 215, 'GA', 'Georgia', 'active'),
(20, 215, 'GU', 'Guam', 'active'),
(21, 215, 'HI', 'Hawaii', 'active'),
(22, 215, 'ID', 'Idaho', 'active'),
(23, 215, 'IL', 'Illinois', 'active'),
(24, 215, 'IN', 'Indiana', 'active'),
(25, 215, 'IA', 'Iowa', 'active'),
(26, 215, 'KS', 'Kansas', 'active'),
(27, 215, 'KY', 'Kentucky', 'active'),
(28, 215, 'LA', 'Louisiana', 'active'),
(29, 215, 'ME', 'Maine', 'active'),
(30, 215, 'MH', 'Marshall Islands', 'active'),
(31, 215, 'MD', 'Maryland', 'active'),
(32, 215, 'MA', 'Massachusetts', 'active'),
(33, 215, 'MI', 'Michigan', 'active'),
(34, 215, 'MN', 'Minnesota', 'active'),
(35, 215, 'MS', 'Mississippi', 'active'),
(36, 215, 'MO', 'Missouri', 'active'),
(37, 215, 'MT', 'Montana', 'active'),
(38, 215, 'NE', 'Nebraska', 'active'),
(39, 215, 'NV', 'Nevada', 'active'),
(40, 215, 'NH', 'New Hampshire', 'active'),
(41, 215, 'NJ', 'New Jersey', 'active'),
(42, 215, 'NM', 'New Mexico', 'active'),
(43, 215, 'NY', 'New York', 'active'),
(44, 215, 'NC', 'North Carolina', 'active'),
(45, 215, 'ND', 'North Dakota', 'active'),
(46, 215, 'MP', 'Northern Mariana Islands', 'active'),
(47, 215, 'OH', 'Ohio', 'active'),
(48, 215, 'OK', 'Oklahoma', 'active'),
(49, 215, 'OR', 'Oregon', 'active'),
(50, 215, 'PW', 'Palau', 'active'),
(51, 215, 'PA', 'Pennsylvania', 'active'),
(52, 215, 'PR', 'Puerto Rico', 'active'),
(53, 215, 'RI', 'Rhode Island', 'active'),
(54, 215, 'SC', 'South Carolina', 'active'),
(55, 215, 'SD', 'South Dakota', 'active'),
(56, 215, 'TN', 'Tennessee', 'active'),
(57, 215, 'TX', 'Texas', 'active'),
(58, 215, 'UT', 'Utah', 'active'),
(59, 215, 'VT', 'Vermont', 'active'),
(60, 215, 'VI', 'Virgin Islands', 'active'),
(61, 215, 'VA', 'Virginia', 'active'),
(62, 215, 'WA', 'Washington', 'active'),
(63, 215, 'WV', 'West Virginia', 'active'),
(64, 215, 'WI', 'Wisconsin', 'active'),
(65, 215, 'WY', 'Wyoming', 'active'),
(66, 38, 'AB', 'Alberta', 'active'),
(67, 38, 'BC', 'British Columbia', 'active'),
(68, 38, 'MB', 'Manitoba', 'active'),
(69, 38, 'NF', 'Newfoundland', 'active'),
(70, 38, 'NB', 'New Brunswick', 'active'),
(71, 38, 'NS', 'Nova Scotia', 'active'),
(72, 38, 'NT', 'Northwest Territories', 'active'),
(73, 38, 'NU', 'Nunavut', 'active'),
(74, 38, 'ON', 'Ontario', 'active'),
(75, 38, 'PE', 'Prince Edward Island', 'active'),
(76, 38, 'QC', 'Quebec', 'active'),
(77, 38, 'SK', 'Saskatchewan', 'active'),
(78, 38, 'YT', 'Yukon Territory', 'active'),
(182, 13, 'NSW', 'New South Wales', 'active'),
(183, 13, 'VIC', 'Victoria', 'active'),
(184, 13, 'QLD', 'Queensland', 'active'),
(185, 13, 'NT', 'Northern Territory', 'active'),
(186, 13, 'WA', 'Western Australia', 'active'),
(187, 13, 'SA', 'South Australia', 'active'),
(188, 13, 'TAS', 'Tasmania', 'active'),
(189, 13, 'ACT', 'Australian Capital Territory', 'active'),
(420, 105, 'AG', 'Agrigento', 'active'),
(421, 105, 'AL', 'Alessandria', 'active'),
(422, 105, 'AN', 'Ancona', 'active'),
(423, 105, 'AO', 'Aosta', 'active'),
(424, 105, 'AR', 'Arezzo', 'active'),
(425, 105, 'AP', 'Ascoli Piceno', 'active'),
(426, 105, 'AT', 'Asti', 'active'),
(427, 105, 'AV', 'Avellino', 'active'),
(428, 105, 'BA', 'Bari', 'active'),
(429, 105, 'BL', 'Belluno', 'active'),
(430, 105, 'BN', 'Benevento', 'active'),
(431, 105, 'BG', 'Bergamo', 'active'),
(432, 105, 'BI', 'Biella', 'active'),
(433, 105, 'BO', 'Bologna', 'active'),
(434, 105, 'BZ', 'Bolzano', 'active'),
(435, 105, 'BS', 'Brescia', 'active'),
(436, 105, 'BR', 'Brindisi', 'active'),
(437, 105, 'CA', 'Cagliari', 'active'),
(438, 105, 'CL', 'Caltanissetta', 'active'),
(439, 105, 'CB', 'Campobasso', 'active'),
(440, 105, 'CE', 'Caserta', 'active'),
(441, 105, 'CT', 'Catania', 'active'),
(442, 105, 'CZ', 'Catanzaro', 'active'),
(443, 105, 'CH', 'Chieti', 'active'),
(444, 105, 'CO', 'Como', 'active'),
(445, 105, 'CS', 'Cosenza', 'active'),
(446, 105, 'CR', 'Cremona', 'active'),
(447, 105, 'KR', 'Crotone', 'active'),
(448, 105, 'CN', 'Cuneo', 'active'),
(449, 105, 'EN', 'Enna', 'active'),
(450, 105, 'FE', 'Ferrara', 'active'),
(451, 105, 'FI', 'Firenze', 'active'),
(452, 105, 'FG', 'Foggia', 'active'),
(453, 105, 'FO', 'Forlì', 'active'),
(454, 105, 'FR', 'Frosinone', 'active'),
(455, 105, 'GE', 'Genova', 'active'),
(456, 105, 'GO', 'Gorizia', 'active'),
(457, 105, 'GR', 'Grosseto', 'active'),
(458, 105, 'IM', 'Imperia', 'active'),
(459, 105, 'IS', 'Isernia', 'active'),
(460, 105, 'AQ', 'Aquila', 'active'),
(461, 105, 'SP', 'La Spezia', 'active'),
(462, 105, 'LT', 'Latina', 'active'),
(463, 105, 'LE', 'Lecce', 'active'),
(464, 105, 'LC', 'Lecco', 'active'),
(465, 105, 'LI', 'Livorno', 'active'),
(466, 105, 'LO', 'Lodi', 'active'),
(467, 105, 'LU', 'Lucca', 'active'),
(468, 105, 'MC', 'Macerata', 'active'),
(469, 105, 'MN', 'Mantova', 'active'),
(470, 105, 'MS', 'Massa-Carrara', 'active'),
(471, 105, 'MT', 'Matera', 'active'),
(472, 105, 'ME', 'Messina', 'active'),
(473, 105, 'MI', 'Milano', 'active'),
(474, 105, 'MO', 'Modena', 'active'),
(475, 105, 'NA', 'Napoli', 'active'),
(476, 105, 'NO', 'Novara', 'active'),
(477, 105, 'NU', 'Nuoro', 'active'),
(478, 105, 'OR', 'Oristano', 'active'),
(479, 105, 'PD', 'Padova', 'active'),
(480, 105, 'PA', 'Palermo', 'active'),
(481, 105, 'PR', 'Parma', 'active'),
(482, 105, 'PG', 'Perugia', 'active'),
(483, 105, 'PV', 'Pavia', 'active'),
(484, 105, 'PS', 'Pesaro e Urbino', 'active'),
(485, 105, 'PE', 'Pescara', 'active'),
(486, 105, 'PC', 'Piacenza', 'active'),
(487, 105, 'PI', 'Pisa', 'active'),
(488, 105, 'PT', 'Pistoia', 'active'),
(489, 105, 'PN', 'Pordenone', 'active'),
(490, 105, 'PZ', 'Potenza', 'active'),
(491, 105, 'PO', 'Prato', 'active'),
(492, 105, 'RG', 'Ragusa', 'active'),
(493, 105, 'RA', 'Ravenna', 'active'),
(494, 105, 'RC', 'Reggio di Calabria', 'active'),
(495, 105, 'RE', 'Reggio Emilia', 'active'),
(496, 105, 'RI', 'Rieti', 'active'),
(497, 105, 'RN', 'Rimini', 'active'),
(498, 105, 'RM', 'Roma', 'active'),
(499, 105, 'RO', 'Rovigo', 'active'),
(500, 105, 'SA', 'Salerno', 'active'),
(501, 105, 'SS', 'Sassari', 'active'),
(502, 105, 'SV', 'Savona', 'active'),
(503, 105, 'SI', 'Siena', 'active'),
(504, 105, 'SR', 'Siracusa', 'active'),
(505, 105, 'SO', 'Sondrio', 'active'),
(506, 105, 'TA', 'Taranto', 'active'),
(507, 105, 'TE', 'Teramo', 'active'),
(508, 105, 'TR', 'Terni', 'active'),
(509, 105, 'TO', 'Torino', 'active'),
(510, 105, 'TP', 'Trapani', 'active'),
(511, 105, 'TN', 'Trento', 'active'),
(512, 105, 'TV', 'Treviso', 'active'),
(513, 105, 'TS', 'Trieste', 'active'),
(514, 105, 'UD', 'Udine', 'active'),
(515, 105, 'VA', 'Varese', 'active'),
(516, 105, 'VE', 'Venezia', 'active'),
(517, 105, 'VB', 'Verbania', 'active'),
(518, 105, 'VC', 'Vercelli', 'active'),
(519, 105, 'VR', 'Verona', 'active'),
(520, 105, 'VV', 'Vibo Valentia', 'active'),
(521, 105, 'VI', 'Vicenza', 'active'),
(522, 105, 'VT', 'Viterbo', 'active'),
(787, 222, 'AVON', 'Avon', 'active'),
(788, 222, 'BEDS', 'Bedfordshire', 'active'),
(789, 222, 'BERK', 'Berkshire', 'active'),
(790, 222, 'BIRM', 'Birmingham', 'active'),
(791, 222, 'BORD', 'Borders', 'active'),
(792, 222, 'BUCK', 'Buckinghamshire', 'active'),
(793, 222, 'CAMB', 'Cambridgeshire', 'active'),
(794, 222, 'CENT', 'Central', 'active'),
(795, 222, 'CHES', 'Cheshire', 'active'),
(796, 222, 'CLEV', 'Cleveland', 'active'),
(797, 222, 'CLWY', 'Clwyd', 'active'),
(798, 222, 'CORN', 'Cornwall', 'active'),
(799, 222, 'CUMB', 'Cumbria', 'active'),
(800, 222, 'DERB', 'Derbyshire', 'active'),
(801, 222, 'DEVO', 'Devon', 'active'),
(802, 222, 'DORS', 'Dorset', 'active'),
(803, 222, 'DUMF', 'Dumfries & Galloway', 'active'),
(804, 222, 'DURH', 'Durham', 'active'),
(805, 222, 'DYFE', 'Dyfed', 'active'),
(806, 222, 'ESUS', 'East Sussex', 'active'),
(807, 222, 'ESSE', 'Essex', 'active'),
(808, 222, 'FIFE', 'Fife', 'active'),
(809, 222, 'GLAM', 'Glamorgan', 'active'),
(810, 222, 'GLOU', 'Gloucestershire', 'active'),
(811, 222, 'GRAM', 'Grampian', 'active'),
(812, 222, 'GWEN', 'Gwent', 'active'),
(813, 222, 'GWYN', 'Gwynedd', 'active'),
(814, 222, 'HAMP', 'Hampshire', 'active'),
(815, 222, 'HERE', 'Hereford & Worcester', 'active'),
(816, 222, 'HERT', 'Hertfordshire', 'active'),
(817, 222, 'HUMB', 'Humberside', 'active'),
(818, 222, 'KENT', 'Kent', 'active'),
(819, 222, 'LANC', 'Lancashire', 'active'),
(820, 222, 'LEIC', 'Leicestershire', 'active'),
(821, 222, 'LINC', 'Lincolnshire', 'active'),
(822, 222, 'LOND', 'London', 'active'),
(823, 222, 'LOTH', 'Lothian', 'active'),
(824, 222, 'MANC', 'Manchester', 'active'),
(825, 222, 'MERS', 'Merseyside', 'active'),
(826, 222, 'NORF', 'Norfolk', 'active'),
(827, 222, 'NYOR', 'North Yorkshire', 'active'),
(828, 222, 'NWHI', 'North west Highlands', 'active'),
(829, 222, 'NHAM', 'Northamptonshire', 'active'),
(830, 222, 'NUMB', 'Northumberland', 'active'),
(831, 222, 'NOTT', 'Nottinghamshire', 'active'),
(832, 222, 'OXFO', 'Oxfordshire', 'active'),
(833, 222, 'POWY', 'Powys', 'active'),
(834, 222, 'SHRO', 'Shropshire', 'active'),
(835, 222, 'SOME', 'Somerset', 'active'),
(836, 222, 'SYOR', 'South Yorkshire', 'active'),
(837, 222, 'STAF', 'Staffordshire', 'active'),
(838, 222, 'STRA', 'Strathclyde', 'active'),
(839, 222, 'SUFF', 'Suffolk', 'active'),
(840, 222, 'SURR', 'Surrey', 'active'),
(841, 222, 'WSUS', 'West Sussex', 'active'),
(842, 222, 'TAYS', 'Tayside', 'active'),
(843, 222, 'TYWE', 'Tyne & Wear', 'active'),
(844, 222, 'WARW', 'Warwickshire', 'active'),
(845, 222, 'WISL', 'West Isles', 'active'),
(846, 222, 'WYOR', 'West Yorkshire', 'active'),
(847, 222, 'WILT', 'Wiltshire', 'active'),
(859, 51, 'NRW', 'North Rhine-Westphalia', 'active'),
(860, 95, 'TN', 'Tamil Nadu', 'active'),
(861, 95, 'MI', 'Mumbai', 'active'),
(862, 145, 'KL', 'Kuala lumpur', 'active'),
(868, 0, 'aaa', 'aaaa', ''),
(867, 0, '', '', '');

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
  `header` enum('on','off') NOT NULL,
  `footer` enum('on','off') NOT NULL,
  `category` enum('main','sub') NOT NULL,
  `parent` varchar(45) NOT NULL,
  `metaname` varchar(255) NOT NULL,
  `metadescription` blob NOT NULL,
  `description` blob NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staticpages`
--

INSERT INTO `staticpages` (`id`, `pagename`, `pagetitle`, `seourl`, `hidden`, `header`, `footer`, `category`, `parent`, `metaname`, `metadescription`, `description`, `status`) VALUES
(1, 'About Us', 'About Us', 'about-us', 'off', 'on', 'on', 'main', 'null', 'about us', 0x090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a202020202020202020202020202020202020202020202020202020202020202020202020202020204c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747565722061646970697363696e6720656c69742e204d616563656e6173206665756769617420636f6e736571756174206469616d2e204d616563656e6173206d657475732e20566976616d7573206469616d2070757275732c2063757273757320612c20636f6d6d6f646f206e6f6e2c20666163696c697369732076697461652c206e756c6c612e2041656e65616e2064696374756d206c6163696e696120746f72746f722e204e756e6320696163756c69732c206e696268206e6f6e20696163756c697320616c697175616d2c206f7263692066656c697320657569736d6f64206e657175652c20736564206f726e617265206d61737361206d6175726973207365642076656c69742e204e756c6c61207072657469756d206d692065742072697375732e204675736365206d6920706564652c2074656d706f722069642c206375727375732061632c20756c6c616d636f72706572206e65632c20656e696d0d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020, 0x3c68746d6c3e0d0a3c686561643e0d0a093c7469746c653e3c2f7469746c653e0d0a3c2f686561643e0d0a3c626f64793e0d0a3c703e3c7370616e207374796c653d22666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e4c6f72656d20697073756d20646f6c6f722073697420616d65742c203c7374726f6e673e3c753e3c656d3e636f6e736563746574756572203c2f656d3e3c2f753e3c2f7374726f6e673e61646970697363696e6720656c69742e204d616563656e6173206665756769617420636f6e736571756174206469616d2e203c656d3e3c7374726f6e673e4d616563656e6173203c2f7374726f6e673e3c2f656d3e6d657475732e20566976616d7573206469616d2070757275732c2063757273757320612c20636f6d6d6f646f206e6f6e2c20666163696c697369732076697461652c206e756c6c612e2041656e65616e2064696374756d206c6163696e696120746f72746f722e204e756e6320696163756c69732c206e696268206e6f6e20696163756c697320616c697175616d2c206f7263692066656c697320657569736d6f64206e657175652c20736564206f726e617265206d61737361206d6175726973207365642076656c69742e204e756c6c61207072657469756d206d692065742072697375732e203c753e4675736365203c2f753e6d6920706564652c2074656d706f722069642c206375727375732061632c20756c6c616d636f72706572206e65632c20656e696d2e2053656420746f72746f722e20437572616269747572206d6f6c65737469652e20447569732076656c69742061756775652c20636f6e64696d656e74756d2061742c20756c74726963657320612c206c75637475732075742c206f7263692e203c656d3e446f6e6563203c2f656d3e70656c6c656e74657371756520656765737461732065726f732e20496e7465676572206375727375732c20617567756520696e203c7374726f6e673e637572737573203c2f7374726f6e673e66617563696275732c2065726f73207065646520626962656e64756d2073656d2c20696e2074656d7075732074656c6c7573206a7573746f2071756973206c6967756c612e203c656d3e3c7374726f6e673e457469616d203c2f7374726f6e673e3c2f656d3e6567657420746f72746f722e20566573746962756c756d2072757472756d2c2065737420757420706c61636572617420656c656d656e74756d2c206c6563747573206e69736c20616c697175616d2076656c69742c2074656d706f7220616c697175616d2065726f73206e756e63206e6f6e756d6d79206d657475732e20496e2065726f73206d657475732c206772617669646120612c2067726176696461207365642c206c6f626f727469732069642c207475727069732e20557420756c7472696365732c203c7374726f6e673e3c656d3e697073756d203c2f656d3e3c2f7374726f6e673e6174203c656d3e3c7374726f6e673e76656e656e61746973203c2f7374726f6e673e3c2f656d3e6672696e67696c6c612c2073656d206e756c6c61206c6163696e69612074656c6c75732c206567657420616c697175657420747572706973206d6175726973206e6f6e20656e696d2e203c7374726f6e673e3c656d3e3c753e4e616d203c2f753e3c2f656d3e3c2f7374726f6e673e7475727069732e2053757370656e6469737365206c6163696e69612e2043757261626974757220616320746f72746f7220757420697073756d206567657374617320656c656d656e74756d2e204e756e6320696d706572646965742067726176696461206d61757269732e3c2f7370616e3e3c2f703e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, 'active'),
(3, 'contact-us', 'Contact us', 'contact-us', 'off', 'on', 'on', 'main', 'null', 'contact us', 0x090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200909090d0a2020636f6e74616374207573207061676520202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020, 0x3c68746d6c3e0d0a3c686561643e0d0a093c7469746c653e3c2f7469746c653e0d0a3c2f686561643e0d0a3c626f64793e0d0a3c666f726d20616374696f6e3d22706f73742220656e63747970653d22746578742f706c61696e222069643d22636f6e7461637422206e616d653d22636f6e74616374223e266e6273703b3c2f666f726d3e0d0a0d0a3c703e3c696e707574206e616d653d22456d61696c2220747970653d2274657874222076616c75653d22456d61696c22202f3e3c2f703e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c703e3c696e707574206e616d653d224e616d652220747970653d2274657874222076616c75653d224e616d6522202f3e3c2f703e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c703e3c746578746172656120636f6c733d22313022206e616d653d224d6573736167652220726f77733d22323022207374796c653d226d617267696e3a203070783b2077696474683a2032303570783b206865696768743a20333770783b223e3c2f74657874617265613e3c2f703e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, 'active'),
(8, 'what-is-fundstarter', 'What is Fundstarter?', 'whatisfundstarter', 'off', 'off', 'on', 'main', 'null', 'what is fundstarter', 0x090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a202020202020202020202020202020202020202020202020202020202020202020202020202020204c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747565722061646970697363696e6720656c69742e204d616563656e6173206665756769617420636f6e736571756174206469616d2e204d616563656e6173206d657475732e20566976616d7573206469616d2070757275732c2063757273757320612c20636f6d6d6f646f206e6f6e2c20666163696c697369732076697461652c206e756c6c612e2041656e65616e2064696374756d206c6163696e696120746f72746f722e204e756e6320696163756c69732c206e696268206e6f6e20696163756c697320616c697175616d2c206f7263692066656c697320657569736d6f64206e657175652c20736564206f726e617265206d61737361206d6175726973207365642076656c69742e204e756c6c61207072657469756d206d692065742072697375732e204675736365206d6920706564652c2074656d706f722069642c206375727375732061632c20756c6c616d636f72706572206e65632c20656e696d2e2053656420746f72746f722e20437572616269747572206d6f6c65737469652e20447569732076656c69742061756775652c20636f6e64696d656e74756d2061742c20756c74726963657320612c206c75637475732075742c206f7263692e20446f6e65632070656c6c656e74657371756520656765737461732065726f732e20496e7465676572206375727375732c20617567756520696e206375727375732066617563696275732c2065726f73207065646520626962656e64756d2073656d2c20696e2074656d7075732074656c6c7573206a7573746f2071756973206c6967756c612e20457469616d206567657420746f72746f722e20566573746962756c756d2072757472756d2c2065737420757420706c61636572617420656c656d656e74756d2c206c6563747573206e69736c20616c697175616d2076656c69742c2074656d706f7220616c697175616d2065726f73206e756e63206e6f6e756d6d79206d657475732e20496e2065726f73206d657475732c206772617669646120612c2067726176696461207365642c206c6f626f727469732069642c207475727069732e20557420756c7472696365732c20697073756d2061742076656e656e61746973206672696e67696c6c612c2073656d206e756c6c61206c6163696e69612074656c6c75732c206567657420616c697175657420747572706973206d6175726973206e6f6e20656e696d2e204e616d207475727069732e2053757370656e6469737365206c6163696e69612e2043757261626974757220616320746f72746f7220757420697073756d206567657374617320656c656d656e74756d2e204e756e6320696d706572646965742067726176696461206d61757269732e0d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020, 0x3c68746d6c3e0d0a3c686561643e0d0a093c7469746c653e3c2f7469746c653e0d0a3c2f686561643e0d0a3c626f64793e0d0a3c703e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e4c6f72656d20697073756d20646f6c6f722073697420616d65742c266e6273703b3c2f7370616e3e3c7374726f6e67207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a202748656c766574696361204e657565272c2048656c7665746963612c20417269616c3b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20313270783b20666f6e742d73697a653a20313270783b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b20636f6c6f723a207267622831352c2033332c2035293b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e3c75207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20696e68657269743b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d7765696768743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b223e3c656d207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d7765696768743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e636f6e736563746574756572266e6273703b3c2f656d3e3c2f753e3c2f7374726f6e673e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e61646970697363696e6720656c69742e204d616563656e6173206665756769617420636f6e736571756174206469616d2e266e6273703b3c2f7370616e3e3c656d207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a202748656c766574696361204e657565272c2048656c7665746963612c20417269616c3b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20313270783b20666f6e742d73697a653a20313270783b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b20636f6c6f723a207267622831352c2033332c2035293b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e3c7374726f6e67207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e4d616563656e6173266e6273703b3c2f7374726f6e673e3c2f656d3e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e6d657475732e20566976616d7573206469616d2070757275732c2063757273757320612c20636f6d6d6f646f206e6f6e2c20666163696c697369732076697461652c206e756c6c612e2041656e65616e2064696374756d206c6163696e696120746f72746f722e204e756e6320696163756c69732c206e696268206e6f6e20696163756c697320616c697175616d2c206f7263692066656c697320657569736d6f64206e657175652c20736564206f726e617265206d61737361206d6175726973207365642076656c69742e204e756c6c61207072657469756d206d692065742072697375732e266e6273703b3c2f7370616e3e3c75207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20313270783b20666f6e742d73697a653a20313270783b20766572746963616c2d616c69676e3a20626173656c696e653b20636f6c6f723a207267622831352c2033332c2035293b223e4675736365266e6273703b3c2f753e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e6d6920706564652c2074656d706f722069642c206375727375732061632c20756c6c616d636f72706572206e65632c20656e696d2e2053656420746f72746f722e20437572616269747572206d6f6c65737469652e20447569732076656c69742061756775652c20636f6e64696d656e74756d2061742c20756c74726963657320612c206c75637475732075742c206f7263692e266e6273703b3c2f7370616e3e3c656d207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a202748656c766574696361204e657565272c2048656c7665746963612c20417269616c3b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20313270783b20666f6e742d73697a653a20313270783b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b20636f6c6f723a207267622831352c2033332c2035293b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e446f6e6563266e6273703b3c2f656d3e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e70656c6c656e74657371756520656765737461732065726f732e20496e7465676572206375727375732c20617567756520696e266e6273703b3c2f7370616e3e3c7374726f6e67207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a202748656c766574696361204e657565272c2048656c7665746963612c20417269616c3b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20313270783b20666f6e742d73697a653a20313270783b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b20636f6c6f723a207267622831352c2033332c2035293b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e637572737573266e6273703b3c2f7374726f6e673e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e66617563696275732c2065726f73207065646520626962656e64756d2073656d2c20696e2074656d7075732074656c6c7573206a7573746f2071756973206c6967756c612e266e6273703b3c2f7370616e3e3c656d207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a202748656c766574696361204e657565272c2048656c7665746963612c20417269616c3b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20313270783b20666f6e742d73697a653a20313270783b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b20636f6c6f723a207267622831352c2033332c2035293b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e3c7374726f6e67207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e457469616d266e6273703b3c2f7374726f6e673e3c2f656d3e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e6567657420746f72746f722e20566573746962756c756d2072757472756d2c2065737420757420706c61636572617420656c656d656e74756d2c206c6563747573206e69736c20616c697175616d2076656c69742c2074656d706f7220616c697175616d2065726f73206e756e63206e6f6e756d6d79206d657475732e20496e2065726f73206d657475732c206772617669646120612c2067726176696461207365642c206c6f626f727469732069642c207475727069732e20557420756c7472696365732c266e6273703b3c2f7370616e3e3c7374726f6e67207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a202748656c766574696361204e657565272c2048656c7665746963612c20417269616c3b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20313270783b20666f6e742d73697a653a20313270783b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b20636f6c6f723a207267622831352c2033332c2035293b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e3c656d207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d7765696768743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e697073756d266e6273703b3c2f656d3e3c2f7374726f6e673e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e6174266e6273703b3c2f7370616e3e3c656d207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a202748656c766574696361204e657565272c2048656c7665746963612c20417269616c3b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20313270783b20666f6e742d73697a653a20313270783b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b20636f6c6f723a207267622831352c2033332c2035293b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e3c7374726f6e67207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e76656e656e61746973266e6273703b3c2f7374726f6e673e3c2f656d3e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e6672696e67696c6c612c2073656d206e756c6c61206c6163696e69612074656c6c75732c206567657420616c697175657420747572706973206d6175726973206e6f6e20656e696d2e266e6273703b3c2f7370616e3e3c7374726f6e67207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a202748656c766574696361204e657565272c2048656c7665746963612c20417269616c3b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20313270783b20666f6e742d73697a653a20313270783b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b20636f6c6f723a207267622831352c2033332c2035293b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e3c656d207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d7765696768743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e3c75207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20696e68657269743b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d7765696768743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b223e4e616d266e6273703b3c2f753e3c2f656d3e3c2f7374726f6e673e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e7475727069732e2053757370656e6469737365206c6163696e69612e2043757261626974757220616320746f72746f7220757420697073756d206567657374617320656c656d656e74756d2e204e756e6320696d706572646965742067726176696461206d61757269732e3c2f7370616e3e3c2f703e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, 'active');
INSERT INTO `staticpages` (`id`, `pagename`, `pagetitle`, `seourl`, `hidden`, `header`, `footer`, `category`, `parent`, `metaname`, `metadescription`, `description`, `status`) VALUES
(9, 'who-we-are', 'Who we are', 'who-we-are', 'off', 'off', 'on', 'main', 'null', 'whoweare', 0x090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200909090d0a20202020202020204c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747565722061646970697363696e6720656c69742e204d616563656e6173206665756769617420636f6e736571756174206469616d2e204d616563656e6173206d657475732e20566976616d7573206469616d2070757275732c2063757273757320612c20636f6d6d6f646f206e6f6e2c20666163696c697369732076697461652c206e756c6c612e2041656e65616e2064696374756d206c6163696e696120746f72746f722e204e756e6320696163756c69732c206e696268206e6f6e20696163756c697320616c697175616d2c206f7263692066656c697320657569736d6f64206e657175652c20736564206f726e617265206d61737361206d6175726973207365642076656c69742e204e756c6c61207072657469756d206d692065742072697375732e204675736365206d6920706564652c2074656d706f722069642c206375727375732061632c20756c6c616d636f72706572206e65632c20656e696d2e2053656420746f72746f722e20437572616269747572206d6f6c65737469652e20447569732076656c69742061756775652c20636f6e64696d656e74756d2061742c20756c74726963657320612c206c75637475732075742c206f7263692e20446f6e65632070656c6c656e74657371756520656765737461732065726f732e20496e7465676572206375727375732c20617567756520696e206375727375732066617563696275732c2065726f73207065646520626962656e64756d2073656d2c20696e2074656d7075732074656c6c7573206a7573746f2071756973206c6967756c612e20457469616d206567657420746f72746f722e20566573746962756c756d2072757472756d2c2065737420757420706c61636572617420656c656d656e74756d2c206c6563747573206e69736c20616c697175616d2076656c69742c2074656d706f7220616c697175616d2065726f73206e756e63206e6f6e756d6d79206d657475732e20496e2065726f73206d657475732c206772617669646120612c2067726176696461207365642c206c6f626f727469732069642c207475727069732e20557420756c7472696365732c20697073756d2061742076656e656e61746973206672696e67696c6c612c2073656d206e756c6c61206c6163696e69612074656c6c75732c206567657420616c697175657420747572706973206d6175726973206e6f6e20656e696d2e204e616d207475727069732e2053757370656e6469737365206c6163696e69612e2043757261626974757220616320746f72746f7220757420697073756d206567657374617320656c656d656e74756d2e204e756e6320696d706572646965742067726176696461206d61757269732e20202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020, 0x3c68746d6c3e0d0a3c686561643e0d0a093c7469746c653e3c2f7469746c653e0d0a3c2f686561643e0d0a3c626f64793e0d0a3c703e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e4c6f72656d20697073756d20646f6c6f722073697420616d65742c266e6273703b3c2f7370616e3e3c7374726f6e67207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a202748656c766574696361204e657565272c2048656c7665746963612c20417269616c3b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20313270783b20666f6e742d73697a653a20313270783b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b20636f6c6f723a207267622831352c2033332c2035293b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e3c75207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20696e68657269743b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d7765696768743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b223e3c656d207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d7765696768743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e636f6e736563746574756572266e6273703b3c2f656d3e3c2f753e3c2f7374726f6e673e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e61646970697363696e6720656c69742e204d616563656e6173206665756769617420636f6e736571756174206469616d2e266e6273703b3c2f7370616e3e3c656d207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a202748656c766574696361204e657565272c2048656c7665746963612c20417269616c3b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20313270783b20666f6e742d73697a653a20313270783b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b20636f6c6f723a207267622831352c2033332c2035293b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e3c7374726f6e67207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e4d616563656e6173266e6273703b3c2f7374726f6e673e3c2f656d3e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e6d657475732e20566976616d7573206469616d2070757275732c2063757273757320612c20636f6d6d6f646f206e6f6e2c20666163696c697369732076697461652c206e756c6c612e2041656e65616e2064696374756d206c6163696e696120746f72746f722e204e756e6320696163756c69732c206e696268206e6f6e20696163756c697320616c697175616d2c206f7263692066656c697320657569736d6f64206e657175652c20736564206f726e617265206d61737361206d6175726973207365642076656c69742e204e756c6c61207072657469756d206d692065742072697375732e266e6273703b3c2f7370616e3e3c75207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20313270783b20666f6e742d73697a653a20313270783b20766572746963616c2d616c69676e3a20626173656c696e653b20636f6c6f723a207267622831352c2033332c2035293b223e4675736365266e6273703b3c2f753e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e6d6920706564652c2074656d706f722069642c206375727375732061632c20756c6c616d636f72706572206e65632c20656e696d2e2053656420746f72746f722e20437572616269747572206d6f6c65737469652e20447569732076656c69742061756775652c20636f6e64696d656e74756d2061742c20756c74726963657320612c206c75637475732075742c206f7263692e266e6273703b3c2f7370616e3e3c656d207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a202748656c766574696361204e657565272c2048656c7665746963612c20417269616c3b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20313270783b20666f6e742d73697a653a20313270783b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b20636f6c6f723a207267622831352c2033332c2035293b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e446f6e6563266e6273703b3c2f656d3e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e70656c6c656e74657371756520656765737461732065726f732e20496e7465676572206375727375732c20617567756520696e266e6273703b3c2f7370616e3e3c7374726f6e67207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a202748656c766574696361204e657565272c2048656c7665746963612c20417269616c3b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20313270783b20666f6e742d73697a653a20313270783b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b20636f6c6f723a207267622831352c2033332c2035293b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e637572737573266e6273703b3c2f7374726f6e673e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e66617563696275732c2065726f73207065646520626962656e64756d2073656d2c20696e2074656d7075732074656c6c7573206a7573746f2071756973206c6967756c612e266e6273703b3c2f7370616e3e3c656d207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a202748656c766574696361204e657565272c2048656c7665746963612c20417269616c3b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20313270783b20666f6e742d73697a653a20313270783b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b20636f6c6f723a207267622831352c2033332c2035293b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e3c7374726f6e67207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e457469616d266e6273703b3c2f7374726f6e673e3c2f656d3e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e6567657420746f72746f722e20566573746962756c756d2072757472756d2c2065737420757420706c61636572617420656c656d656e74756d2c206c6563747573206e69736c20616c697175616d2076656c69742c2074656d706f7220616c697175616d2065726f73206e756e63206e6f6e756d6d79206d657475732e20496e2065726f73206d657475732c206772617669646120612c2067726176696461207365642c206c6f626f727469732069642c207475727069732e20557420756c7472696365732c266e6273703b3c2f7370616e3e3c7374726f6e67207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a202748656c766574696361204e657565272c2048656c7665746963612c20417269616c3b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20313270783b20666f6e742d73697a653a20313270783b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b20636f6c6f723a207267622831352c2033332c2035293b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e3c656d207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d7765696768743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e697073756d266e6273703b3c2f656d3e3c2f7374726f6e673e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e6174266e6273703b3c2f7370616e3e3c656d207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a202748656c766574696361204e657565272c2048656c7665746963612c20417269616c3b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20313270783b20666f6e742d73697a653a20313270783b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b20636f6c6f723a207267622831352c2033332c2035293b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e3c7374726f6e67207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e76656e656e61746973266e6273703b3c2f7374726f6e673e3c2f656d3e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e6672696e67696c6c612c2073656d206e756c6c61206c6163696e69612074656c6c75732c206567657420616c697175657420747572706973206d6175726973206e6f6e20656e696d2e266e6273703b3c2f7370616e3e3c7374726f6e67207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a202748656c766574696361204e657565272c2048656c7665746963612c20417269616c3b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20313270783b20666f6e742d73697a653a20313270783b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b20636f6c6f723a207267622831352c2033332c2035293b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e3c656d207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d7765696768743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b206f75746c696e653a203070783b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e3c75207374796c653d22626f782d73697a696e673a20626f726465722d626f783b206d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20696e68657269743b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d7765696768743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b223e4e616d266e6273703b3c2f753e3c2f656d3e3c2f7374726f6e673e3c7370616e207374796c653d22636f6c6f723a207267622831352c2033332c2035293b20666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206c696e652d6865696768743a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e7475727069732e2053757370656e6469737365206c6163696e69612e2043757261626974757220616320746f72746f7220757420697073756d206567657374617320656c656d656e74756d2e204e756e6320696d706572646965742067726176696461206d61757269732e3c2f7370616e3e3c2f703e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, 'active'),
(10, 'FAQ', 'FAQ', 'faq', 'off', 'off', 'on', 'main', 'null', 'faq', 0x090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200909090d0a202020202020202020202020202020202020202020202020202020202020202020666171202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020, 0x3c68746d6c3e0d0a3c686561643e0d0a093c7469746c653e3c2f7469746c653e0d0a3c2f686561643e0d0a3c626f64793e0d0a3c683420636c6173733d226d6232222069643d226661715f363239393622207374796c653d226d617267696e3a203070782030707820323070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a202748656c766574696361204e657565272c2048656c7665746963612c20417269616c2c20274c696265726174696f6e2053616e73272c204672656553616e732c2073616e732d73657269663b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20323070783b20666f6e742d73697a653a20313670783b20766572746963616c2d616c69676e3a20626173656c696e653b20636f6c6f723a207267622831352c2033332c2035293b223e3c6120636c6173733d22677265656e2d6461726b2220687265663d2268747470733a2f2f7777772e6b69636b737461727465722e636f6d2f68656c702f6661712f6b69636b737461727465722b626173696373236661715f363239393622207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20696e68657269743b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d7765696768743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b20636f6c6f723a207267622831352c2033332c2035293b20746578742d6465636f726174696f6e3a206e6f6e653b223e576861742061726520746865206261736963733f3c2f613e3c2f68343e0d0a0d0a3c64697620636c6173733d226661715f616e7377657222207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a202748656c766574696361204e657565272c2048656c7665746963612c20417269616c2c20274c696265726174696f6e2053616e73272c204672656553616e732c2073616e732d73657269663b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a2032322e3339393939393631383533303370783b20666f6e742d73697a653a20313670783b20766572746963616c2d616c69676e3a20626173656c696e653b20636f6c6f723a207267622831352c2033332c2035293b223e0d0a3c70207374796c653d226d617267696e3a203070782030707820323070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20696e68657269743b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d7765696768743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b223e41266e6273703b3c62207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20696e68657269743b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b223e70726f6a6563743c2f623e266e6273703b697320612066696e69746520776f726b2077697468206120636c65617220676f616c207468617420796f7526727371756f3b64206c696b6520746f206272696e6720746f206c6966652e205468696e6b20616c62756d732c20626f6f6b732c206f722066696c6d732e3c2f703e0d0a0d0a3c70207374796c653d226d617267696e3a203070782030707820323070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20696e68657269743b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d7765696768743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b223e546865266e6273703b3c62207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20696e68657269743b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b223e66756e64696e6720676f616c3c2f623e266e6273703b69732074686520616d6f756e74206f66206d6f6e6579207468617420612063726561746f72206e6565647320746f20636f6d706c6574652074686569722070726f6a6563742e3c2f703e0d0a0d0a3c70207374796c653d226d617267696e3a203070782030707820323070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20696e68657269743b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d7765696768743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b223e46756e64696e67206f6e204b69636b73746172746572206973266e6273703b3c62207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20696e68657269743b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b223e616c6c2d6f722d6e6f7468696e673c2f623e2e204e6f206f6e652077696c6c206265206368617267656420666f72206120706c6564676520746f776172647320612070726f6a65637420756e6c6573732069742072656163686573206974732066756e64696e6720676f616c2e2054686973207761792c2063726561746f727320616c776179732068617665207468652062756467657420746865792073636f706564206f7574206265666f7265206d6f76696e6720666f72776172642e3c2f703e0d0a0d0a3c70207374796c653d226d617267696e3a203070782030707820323070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20696e68657269743b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d7765696768743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b223e41266e6273703b3c62207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20696e68657269743b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b223e63726561746f723c2f623e266e6273703b69732074686520706572736f6e206f72207465616d20626568696e64207468652070726f6a65637420696465612c20776f726b696e6720746f206272696e6720697420746f206c6966652e3c2f703e0d0a0d0a3c70207374796c653d226d617267696e3a203070782030707820323070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20696e68657269743b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d7765696768743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b223e3c62207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20696e68657269743b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b223e4261636b6572733c2f623e266e6273703b61726520666f6c6b732077686f266e6273703b3c62207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20696e68657269743b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b223e706c656467653c2f623e266e6273703b6d6f6e657920746f206a6f696e2063726561746f727320696e206272696e67696e672070726f6a6563747320746f206c6966652e3c2f703e0d0a0d0a3c70207374796c653d226d617267696e3a203070782030707820323070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20696e68657269743b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d7765696768743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b223e3c62207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20666f6e742d66616d696c793a20696e68657269743b20666f6e742d7374796c653a20696e68657269743b20666f6e742d76617269616e743a20696e68657269743b20666f6e742d737472657463683a20696e68657269743b206c696e652d6865696768743a20696e68657269743b20766572746963616c2d616c69676e3a20626173656c696e653b223e526577617264733c2f623e266e6273703b61726520612063726561746f72262333393b73206368616e636520746f2073686172652061207069656365206f662074686569722070726f6a6563742077697468207468656972206261636b657220636f6d6d756e6974792e205479706963616c6c792c20746865736520617265206f6e652d6f662d612d6b696e6420657870657269656e6365732c206c696d697465642065646974696f6e732c206f7220636f70696573206f662074686520637265617469766520776f726b206265696e672070726f64756365642e3c2f703e0d0a3c2f6469763e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, 'active'),
(11, 'creator handbook', 'Creator Handbook', 'creator-handbook', 'on', 'off', 'off', 'main', 'null', 'creator handbook', 0x0909090d0a2020202020202020202020202020202020202020202063726561746f722068616e64626f6f6b202020202020202020202020202020202020, 0x3c68746d6c3e0d0a3c686561643e0d0a093c7469746c653e3c2f7469746c653e0d0a3c2f686561643e0d0a3c626f64793e0d0a3c703e3c7370616e207374796c653d22666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747565722061646970697363696e6720656c69742e204d616563656e6173206665756769617420636f6e736571756174206469616d2e204d616563656e6173206d657475732e20566976616d7573206469616d2070757275732c2063757273757320612c20636f6d6d6f646f206e6f6e2c20666163696c697369732076697461652c206e756c6c612e2041656e65616e2064696374756d206c6163696e696120746f72746f722e204e756e6320696163756c69732c206e696268206e6f6e20696163756c697320616c697175616d2c206f7263692066656c697320657569736d6f64206e657175652c20736564206f726e617265206d61737361206d6175726973207365642076656c69742e204e756c6c61207072657469756d206d692065742072697375732e204675736365206d6920706564652c2074656d706f722069642c206375727375732061632c20756c6c616d636f72706572206e65632c20656e696d2e2053656420746f72746f722e20437572616269747572206d6f6c65737469652e20447569732076656c69742061756775652c20636f6e64696d656e74756d2061742c20756c74726963657320612c206c75637475732075742c206f7263692e20446f6e65632070656c6c656e74657371756520656765737461732065726f732e20496e7465676572206375727375732c20617567756520696e206375727375732066617563696275732c2065726f73207065646520626962656e64756d2073656d2c20696e2074656d7075732074656c6c7573206a7573746f2071756973206c6967756c612e20457469616d206567657420746f72746f722e20566573746962756c756d2072757472756d2c2065737420757420706c61636572617420656c656d656e74756d2c206c6563747573206e69736c20616c697175616d2076656c69742c2074656d706f7220616c697175616d2065726f73206e756e63206e6f6e756d6d79206d657475732e20496e2065726f73206d657475732c206772617669646120612c2067726176696461207365642c206c6f626f727469732069642c207475727069732e20557420756c7472696365732c20697073756d2061742076656e656e61746973206672696e67696c6c612c2073656d206e756c6c61206c6163696e69612074656c6c75732c206567657420616c697175657420747572706973206d6175726973206e6f6e20656e696d2e204e616d207475727069732e2053757370656e6469737365206c6163696e69612e2043757261626974757220616320746f72746f7220757420697073756d206567657374617320656c656d656e74756d2e204e756e6320696d706572646965742067726176696461206d61757269732e3c2f7370616e3e3c2f703e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, 'active'),
(12, 'creator faq', 'Creator FAQ', 'creator-faq', 'on', 'off', 'off', 'main', 'null', 'creator faq', 0x090963726561746f7220666171090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020, 0x3c68746d6c3e0d0a3c686561643e0d0a093c7469746c653e3c2f7469746c653e0d0a3c2f686561643e0d0a3c626f64793e0d0a3c703e3c7370616e207374796c653d22666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747565722061646970697363696e6720656c69742e204d616563656e6173206665756769617420636f6e736571756174206469616d2e204d616563656e6173206d657475732e20566976616d7573206469616d2070757275732c2063757273757320612c20636f6d6d6f646f206e6f6e2c20666163696c697369732076697461652c206e756c6c612e2041656e65616e2064696374756d206c6163696e696120746f72746f722e204e756e6320696163756c69732c206e696268206e6f6e20696163756c697320616c697175616d2c206f7263692066656c697320657569736d6f64206e657175652c20736564206f726e617265206d61737361206d6175726973207365642076656c69742e204e756c6c61207072657469756d206d692065742072697375732e204675736365206d6920706564652c2074656d706f722069642c206375727375732061632c20756c6c616d636f72706572206e65632c20656e696d2e2053656420746f72746f722e20437572616269747572206d6f6c65737469652e20447569732076656c69742061756775652c20636f6e64696d656e74756d2061742c20756c74726963657320612c206c75637475732075742c206f7263692e20446f6e65632070656c6c656e74657371756520656765737461732065726f732e20496e7465676572206375727375732c20617567756520696e206375727375732066617563696275732c2065726f73207065646520626962656e64756d2073656d2c20696e2074656d7075732074656c6c7573206a7573746f2071756973206c6967756c612e20457469616d206567657420746f72746f722e20566573746962756c756d2072757472756d2c2065737420757420706c61636572617420656c656d656e74756d2c206c6563747573206e69736c20616c697175616d2076656c69742c2074656d706f7220616c697175616d2065726f73206e756e63206e6f6e756d6d79206d657475732e20496e2065726f73206d657475732c206772617669646120612c2067726176696461207365642c206c6f626f727469732069642c207475727069732e20557420756c7472696365732c20697073756d2061742076656e656e61746973206672696e67696c6c612c2073656d206e756c6c61206c6163696e69612074656c6c75732c206567657420616c697175657420747572706973206d6175726973206e6f6e20656e696d2e204e616d207475727069732e2053757370656e6469737365206c6163696e69612e2043757261626974757220616320746f72746f7220757420697073756d206567657374617320656c656d656e74756d2e204e756e6320696d706572646965742067726176696461206d61757269732e3c2f7370616e3e3c2f703e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, 'active'),
(13, 'awesome video', 'How to make awesome video?', 'awesome-video', 'on', 'off', 'off', 'main', 'null', 'awesome video', 0x0909090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020617765736f6d6520766964656f, 0x3c68746d6c3e0d0a3c686561643e0d0a093c7469746c653e3c2f7469746c653e0d0a3c2f686561643e0d0a3c626f64793e0d0a3c703e3c7370616e207374796c653d22666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c205461686f6d612c2056657264616e612c2073616e732d73657269663b20666f6e742d73697a653a20313270783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b223e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747565722061646970697363696e6720656c69742e204d616563656e6173206665756769617420636f6e736571756174206469616d2e204d616563656e6173206d657475732e20566976616d7573206469616d2070757275732c2063757273757320612c20636f6d6d6f646f206e6f6e2c20666163696c697369732076697461652c206e756c6c612e2041656e65616e2064696374756d206c6163696e696120746f72746f722e204e756e6320696163756c69732c206e696268206e6f6e20696163756c697320616c697175616d2c206f7263692066656c697320657569736d6f64206e657175652c20736564206f726e617265206d61737361206d6175726973207365642076656c69742e204e756c6c61207072657469756d206d692065742072697375732e204675736365206d6920706564652c2074656d706f722069642c206375727375732061632c20756c6c616d636f72706572206e65632c20656e696d2e2053656420746f72746f722e20437572616269747572206d6f6c65737469652e20447569732076656c69742061756775652c20636f6e64696d656e74756d2061742c20756c74726963657320612c206c75637475732075742c206f7263692e20446f6e65632070656c6c656e74657371756520656765737461732065726f732e20496e7465676572206375727375732c20617567756520696e206375727375732066617563696275732c2065726f73207065646520626962656e64756d2073656d2c20696e2074656d7075732074656c6c7573206a7573746f2071756973206c6967756c612e20457469616d206567657420746f72746f722e20566573746962756c756d2072757472756d2c2065737420757420706c61636572617420656c656d656e74756d2c206c6563747573206e69736c20616c697175616d2076656c69742c2074656d706f7220616c697175616d2065726f73206e756e63206e6f6e756d6d79206d657475732e20496e2065726f73206d657475732c206772617669646120612c2067726176696461207365642c206c6f626f727469732069642c207475727069732e20557420756c7472696365732c20697073756d2061742076656e656e61746973206672696e67696c6c612c2073656d206e756c6c61206c6163696e69612074656c6c75732c206567657420616c697175657420747572706973206d6175726973206e6f6e20656e696d2e204e616d207475727069732e2053757370656e6469737365206c6163696e69612e2043757261626974757220616320746f72746f7220757420697073756d206567657374617320656c656d656e74756d2e204e756e6320696d706572646965742067726176696461206d61757269732e3c2f7370616e3e3c2f703e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, 'active'),
(14, 'project image', ' Creating great project images', 'project-image', 'on', 'off', 'off', 'main', 'null', 'project image', 0x090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020090d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200909090d0a2020202020202020202020202020202020202020202020202020202020202020202020202020202070726f6a65637420696d6167650d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a20202020202020202020202020202020202020202020202020202020202020202020202020202020, 0x3c68746d6c3e0d0a3c686561643e0d0a093c7469746c653e3c2f7469746c653e0d0a3c2f686561643e0d0a3c626f64793e0d0a3c7461626c6520626f726465723d22312220626f72646572636f6c6f723d2223636363222063656c6c70616464696e673d2235222063656c6c73706163696e673d223022207374796c653d226261636b67726f756e642d636f6c6f723a234536453646413b626f726465722d7374796c653a68696464656e3b223e0d0a093c74626f6479207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b206f75746c696e653a203070783b20766572746963616c2d616c69676e3a20626173656c696e653b2077696474683a206175746f3b206865696768743a206175746f3b20626f782d73697a696e673a20636f6e74656e742d626f783b20706f736974696f6e3a207374617469633b202d7765626b69742d7472616e736974696f6e3a206e6f6e653b207472616e736974696f6e3a206e6f6e653b20626f726465722d636f6c6c617073653a20636f6c6c617073653b20666f6e742d737472657463683a206e6f726d616c3b20637572736f723a206175746f3b20666c6f61743a206e6f6e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e0d0a09093c7472207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b206f75746c696e653a203070783b20766572746963616c2d616c69676e3a20626173656c696e653b2077696474683a206175746f3b206865696768743a206175746f3b20626f782d73697a696e673a20636f6e74656e742d626f783b20706f736974696f6e3a207374617469633b202d7765626b69742d7472616e736974696f6e3a206e6f6e653b207472616e736974696f6e3a206e6f6e653b20626f726465722d636f6c6c617073653a20636f6c6c617073653b20666f6e742d737472657463683a206e6f726d616c3b20637572736f723a206175746f3b20666c6f61743a206e6f6e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e0d0a0909093c7464207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b206f75746c696e653a203070783b20766572746963616c2d616c69676e3a20626173656c696e653b2077696474683a206175746f3b206865696768743a206175746f3b20626f782d73697a696e673a20636f6e74656e742d626f783b20706f736974696f6e3a207374617469633b202d7765626b69742d7472616e736974696f6e3a206e6f6e653b207472616e736974696f6e3a206e6f6e653b20626f726465722d636f6c6c617073653a20636f6c6c617073653b20666f6e742d737472657463683a206e6f726d616c3b2077686974652d73706163653a206e6f726d616c3b20637572736f723a206175746f3b20666c6f61743a206e6f6e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b223e0d0a0909093c646976207374796c653d226261636b67726f756e643a236565653b626f726465723a31707820736f6c696420236363633b70616464696e673a35707820313070783b223e3c73616d703e3c7370616e207374796c653d22666f6e742d73697a653a313270783b223e3c7370616e207374796c653d22666f6e742d66616d696c793a617269616c2c68656c7665746963612c73616e732d73657269663b223e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747565722061646970697363696e6720656c69742e204d616563656e6173206665756769617420636f6e736571756174206469616d2e204d616563656e6173206d657475732e20566976616d7573206469616d2070757275732c2063757273757320612c20636f6d6d6f646f206e6f6e2c20666163696c697369732076697461652c206e756c6c612e2041656e65616e2064696374756d206c6163696e696120746f72746f722e204e756e6320696163756c69732c206e696268206e6f6e20696163756c697320616c697175616d2c206f7263692066656c697320657569736d6f64206e657175652c20736564206f726e617265206d61737361206d6175726973207365642076656c69742e204e756c6c61207072657469756d206d692065742072697375732e204675736365206d6920706564652c2074656d706f722069642c206375727375732061632c20756c6c616d636f72706572206e65632c20656e696d2e2053656420746f72746f722e20437572616269747572206d6f6c65737469652e20447569732076656c69742061756775652c20636f6e64696d656e74756d2061742c20756c74726963657320612c206c75637475732075742c206f7263692e20446f6e65632070656c6c656e74657371756520656765737461732065726f732e20496e7465676572206375727375732c20617567756520696e206375727375732066617563696275732c2065726f73207065646520626962656e64756d2073656d2c20696e2074656d7075732074656c6c7573206a7573746f2071756973206c6967756c612e20457469616d206567657420746f72746f722e20566573746962756c756d2072757472756d2c2065737420757420706c61636572617420656c656d656e74756d2c206c6563747573206e69736c20616c697175616d2076656c69742c2074656d706f7220616c697175616d2065726f73206e756e63206e6f6e756d6d79206d657475732e20496e2065726f73206d657475732c206772617669646120612c2067726176696461207365642c206c6f626f727469732069642c207475727069732e20557420756c7472696365732c20697073756d2061742076656e656e61746973206672696e67696c6c612c2073656d206e756c6c61206c6163696e69612074656c6c75732c206567657420616c697175657420747572706973206d6175726973206e6f6e20656e696d2e204e616d207475727069732e2053757370656e6469737365206c6163696e69612e2043757261626974757220616320746f72746f7220757420697073756d206567657374617320656c656d656e74756d2e204e756e6320696d706572646965742067726176696461206d61757269732e3c2f7370616e3e3c2f7370616e3e3c2f73616d703e3c2f6469763e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
`id` int(45) NOT NULL,
  `categoryid` int(45) NOT NULL,
  `subcategoryname` varchar(125) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `categoryid`, `subcategoryname`, `status`) VALUES
(2, 1, 'Mountains', 'active'),
(7, 4, 'wildlife', 'active');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `verificationcode`, `isverified`, `status`, `createdon`) VALUES
(1, 'vinothini@casperon.in', '12345', 'yes', 'active', '2015-03-06'),
(12, 'vinothini.sakthi@gmail.com', '1366', 'yes', 'active', '2015-03-24'),
(13, 'vinothini@outlook.com', '28129', 'no', 'inactive', '2015-03-26');

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `projectid`, `userid`, `title`, `description`, `postedon`) VALUES
(2, 6, 1, 'Second update for my project from editttttt', 0x5b695d446f6e277420757365206d757369632c20696d616765732c20766964656f2c206f72206f7468657220636f6e74656e74207468617420796f7520646f6e27742068617665207468652072696768747320746f2e0d0a0d0a5b625d2052657573696e6720636f707972696768746564206d6174655b2f625d5b2f695d5b625d7269616c205b2f625d697320616c6d6f737420616c7761797320616761696e737420746865206c617720616e642063616e206c65616420746f5b625d657870656e73697665206c617773756974735b2f625dc2a0646f776e2074686520726f61642e0d0a0d0a2054686520656173696573742077617920746f2061766f696420636f707972696768742074726f75626c657320697320746f2063726561746520616c6c2074686520636f6e74656e7420796f757273656c66206f7220757365205b625d636f6e74656e742074686174206973206672656520666f72207075626c6963207573655b2f625d2e, '2015-04-06'),
(3, 6, 1, 'third sample', 0x5b695d446f6e277420757365206d757369632c20696d616765732c20766964656f2c206f72206f7468657220636f6e74656e74207468617420796f7520646f6e27742068617665207468652072696768747320746f2e0d0a0d0a5b625d2052657573696e6720636f707972696768746564206d6174655b2f625d5b2f695d5b625d7269616c205b2f625d697320616c6d6f737420616c7761797320616761696e737420746865206c617720616e642063616e206c65616420746f5b625d657870656e73697665206c617773756974735b2f625dc2a0646f776e2074686520726f61642e0d0a0d0a2054686520656173696573742077617920746f2061766f696420636f707972696768742074726f75626c657320697320746f2063726561746520616c6c2074686520636f6e74656e7420796f757273656c66206f7220757365205b625d636f6e74656e742074686174206973206672656520666f72207075626c6963207573655b2f625d2e, '2015-04-06'),
(4, 6, 1, 'update with images', 0x0d0a64687375646820756975696468756973682075647573207564207561736864617375692068647569616873647569682061757369682075696568666865646668207568646865642069666865646866697520646668682075692069686675696820697568687569682075690d0a0d0a0d0a5b696d675d687474703a2f2f696d616765732e766973697463616e62657272612e636f6d2e61752f696d616765732f63616e62657272615f6865726f5f696d6167652e6a70675b2f696d675d, '2015-04-06'),
(5, 3, 1, 'Updates with email dfdfd wqwqw', 0x3c626c6f636b71756f74653e55706461746573207769746820656d61696c2064666466642077717771773c62723e3c2f626c6f636b71756f74653e, '2015-04-08'),
(35, 3, 1, 'Mail test to backers', 0x4d61696c207465737420746f206261636b657273, '2015-04-08'),
(36, 3, 1, 'test', 0x7465737474747474747474747474, '2015-04-09'),
(37, 3, 1, 'sample', 0x446f6e277420757365206d757369632c20696d616765732c20766964656f2c206f72206f7468657220636f6e74656e74207468617420796f7520646f6e27742068617665207468652072696768747320746f2e2052657573696e6720636f707972696768746564206d6174657269616c20697320616c6d6f737420616c7761797320616761696e737420746865206c617720616e642063616e206c65616420746f5b625d657870656e73697665206c617773756974735b2f625dc2a0646f776e2074686520726f61642e2054686520656173696573742077617920746f2061766f696420636f707972696768742074726f75626c657320697320746f2063726561746520616c6c2074686520636f6e74656e7420796f757273656c66206f722075736520636f6e74656e742074686174206973206672656520666f72207075626c6963207573652e0d0a466f72206c6567616c2c206d6f73746c79206672656520616c7465726e6174697665732c20636865636b206f757420736f6d65206f662074686573652067726561742e2e2e2e0d0a0d0a506c656173652072656d656d62657220746f20696e636c75646520616e20456e676c6973682d6c616e67756167652076657273696f6e206f6620796f7572206465736372697074696f6e2c207265776172647320616e64206f7468657220656c656d656e74732e20466f7220766964656f732c20796f752063616e20646f20746869732077697468207375627469746c6573206f722061207472616e7363726970742e, '2015-04-21'),
(38, 8, 1, 'Important reminder', 0x3c703e506c656173652072656d656d62657220746f20696e636c75646520616e20456e676c6973682d6c616e67756167652076657273696f6e206f6620796f7572206465736372697074696f6e2c207265776172647320616e64206f7468657220656c656d656e74732e20466f7220766964656f732c20796f752063616e20646f20746869732077697468207375627469746c6573206f722061207472616e7363726970742e3c62723e3c2f703e, '2015-04-27');

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
  `twitterid` varchar(125) NOT NULL,
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
  `biography` text NOT NULL,
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
  `following` text NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `subscription` tinyint(4) NOT NULL,
  `staffpick` tinyint(4) NOT NULL,
  `happening` tinyint(4) NOT NULL,
  `newsandevents` tinyint(4) NOT NULL,
  `backerupdates` tinyint(4) NOT NULL,
  `creatorpledges` tinyint(4) NOT NULL,
  `creatorcomments` tinyint(4) NOT NULL,
  `friendactivity` tinyint(4) NOT NULL,
  `loginhit` int(11) NOT NULL,
  `createdcount` int(45) NOT NULL,
  `backedcount` int(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `mobile`, `password`, `status`, `logintype`, `twitterid`, `mobileveificationcode`, `emailverificationcode`, `mobilestatus`, `emailstatus`, `createdon`, `modifiedon`, `lastlogindate`, `lastlogoutdate`, `lastloginip`, `image`, `biography`, `address`, `city`, `state`, `country`, `postalcode`, `vanityurl`, `weburl`, `followerscount`, `followingcount`, `followers`, `following`, `facebook`, `twitter`, `google`, `dob`, `gender`, `subscription`, `staffpick`, `happening`, `newsandevents`, `backerupdates`, `creatorpledges`, `creatorcomments`, `friendactivity`, `loginhit`, `createdcount`, `backedcount`) VALUES
(1, 'vinothini', 'venkatesan', 'vinothini@casperon.in', '+91-9874561324', '$2y$10$qRXOIuVQcRmt7sXiKjZkM.gSfYpi9mzNw9qTOfeyQ0Sw4wWw4O3R2', 'active', 'normal', '', '', '14770', 0, 1, '2015-03-10', '2015-03-11', '2015-04-28 11:31:28', '0000-00-00 00:00:00', '127.0.0.1', 'uploads/images/users/vinothini@casperon.in.jpg', 'I m ME..:)', 'Teynampet,Chennai', 'chennai', 'tamilnadu', 'India', 600018, 'http://localhost:8080/kickstarter/public/vinothini', 'www.vino.com', 0, 0, '', '', 'www.facebook.com/vinothini', 'www.twitter.com/vinothini', 'plus.google.com/vinothini', '1992-03-12', 'female', 0, 1, 1, 1, 1, 1, 1, 1, 1, 4, 10),
(15, 'vinothini', 'venkatesan', 'vinothini.sakthi@gmail.com', '', '$2y$10$AARtlDlHxEQTesL7hgcr3e/5eGWdwDJeLjNJV4G/oIcoZNve9mjLa', 'active', 'normal', '', '', '', 0, 0, '2015-03-24', '0000-00-00', '2015-04-21 07:10:24', '0000-00-00 00:00:00', '127.0.0.1', '', '', '', '', '', '', 0, '', '', 0, 0, '', '', '', '', '', '0000-00-00', 'male', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3),
(16, 'vinothini', 'viji', 'vinothini@outlook.com', '', '$2y$10$SI37wvuN41/XfYYKxZKtce8jB71WjGh/mIYujLuMFTl9N8nMsZXFO', 'active', 'normal', '', '', '8064', 0, 0, '2015-03-26', '0000-00-00', '2015-04-28 11:32:22', '0000-00-00 00:00:00', '127.0.0.1', 'uploads/images/users/vinothini@outlook.com.jpg', 'Input::get(''key'');\r\n// Default if the key is missing\r\nInput::get(''key'');\r\n// Default if the key is missing\r\n Input::get(''key'', ''default'');\r\nInput::has(''key'');\r\nInput::all();\r\n// Only retrieve ''foo'' and ''bar'' when getting input\r\n Input::only(''foo'', ''bar'');\r\n// Disregard ''foo'' when getting input\r\n Input::except(''foo'');\r\nInput::flush();', '', '', 'Tamilnadu', 'India', 0, 'http://localhost:8080/kickstarter/public/vino', 'www.vinothini.com', 0, 0, '', '', '', '', '', '0000-00-00', 'female', 0, 1, 1, 1, 1, 1, 1, 1, 0, 6, 5),
(17, 'vino', 'viji', 'vinothini.sakthi@yahoo.com', '+91-34242342343', '$2y$10$RrExk6HbcO.lIpkbYxbrEON5ZJWe1T96wlIMa3WEKNWy0QQTjPZLO', 'inactive', 'normal', '', '', '', 0, 0, '2015-03-30', '0000-00-00', '2015-04-07 11:37:59', '0000-00-00 00:00:00', '127.0.0.1', 'uploads/images/users//vinothini.sakthi@yahoo.com.png', 'dasdsa we rewrwe werfw rfe rwerfwerfwsefdsfsdf sd sdfsdfsdf', 'chennai', '', 'ffafafas', 'Andorra', 600018, '', 'www.vino.in', 0, 0, '', '', '', '', '', '1990-03-11', 'female', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0),
(23, 'Vinothini', 'Viji', 'vinothinisakthi@yahoo.com', '', '$2y$10$qRXOIuVQcRmt7sXiKjZkM.gSfYpi9mzNw9qTOfeyQ0Sw4wWw4O3R2', 'inactive', 'facebook', '', '', '20938', 0, 0, '2015-04-01', '0000-00-00', '2015-04-07 11:52:23', '0000-00-00 00:00:00', '127.0.0.1', 'uploads/images/users//vinothinisakthi@yahoo.com.jpg', 'Launching another project? Awesome! For the sake of transparency, just be sure all of them are under the same account.', '', '', 'Tamilnadu', 'Andorra', 0, '', 'www.vvvv.com', 0, 0, '', '', '', '', '', '0000-00-00', 'female', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(29, 'vinothini', '', 'twittertest@gmail.com', '', '$2y$10$w3TXIk0rt.cfoYbALLTqYuOhIsC99/TuheMNb0acBNFF2xbdCPcAe', 'active', 'twitter', '2258770255', '', '', 0, 0, '2015-04-18', '0000-00-00', '2015-04-22 04:53:54', '0000-00-00 00:00:00', '127.0.0.1', 'uploads/images/users/twittertest@gmail.com.jpeg', '', '', '', '', '', 0, '', '', 0, 0, '', '', '', '', '', '0000-00-00', 'male', 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0);

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
-- Indexes for table `inboxmsgs`
--
ALTER TABLE `inboxmsgs`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `adminsettings`
--
ALTER TABLE `adminsettings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `backings`
--
ALTER TABLE `backings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=233;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `inboxmsgs`
--
ALTER TABLE `inboxmsgs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `paymentgateways`
--
ALTER TABLE `paymentgateways`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `paymenthosts`
--
ALTER TABLE `paymenthosts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `prefooters`
--
ALTER TABLE `prefooters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `sendmsgs`
--
ALTER TABLE `sendmsgs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `starredprojects`
--
ALTER TABLE `starredprojects`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=869;
--
-- AUTO_INCREMENT for table `staticpages`
--
ALTER TABLE `staticpages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
MODIFY `id` int(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
