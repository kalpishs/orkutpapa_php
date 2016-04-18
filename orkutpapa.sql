-- phpMyAdmin SQL Dump
-- version 3.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2011 at 08:01 PM
-- Server version: 5.1.45
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `orkutpapa`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(70) NOT NULL,
  `cat_slug` varchar(80) NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_title` text NOT NULL,
  `cat_keywords` text NOT NULL,
  `cat_text` text NOT NULL,
  `cat_heading` text NOT NULL,
  `cat_type` enum('I','F','O') NOT NULL DEFAULT 'I',
  `featured` enum('Y','N') NOT NULL DEFAULT 'N',
  `cat_group` int(3) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=146 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cat_name`, `cat_slug`, `cat_desc`, `cat_title`, `cat_keywords`, `cat_text`, `cat_heading`, `cat_type`, `featured`, `cat_group`) VALUES
(0005, 'Birthday Flash Scraps', 'birthday-orkut-scrap', '', '', '', '', '', 'I', 'Y', 1),
(0004, 'Belated Birthday Scraps', 'belated-birthday-orkut-scrap', '', '', '', '', '', 'I', 'N', 1),
(0003, 'Belated Bday Flash Scraps', 'belated-bday-orkut-scraps', '', '', '', '', '', 'I', 'N', 1),
(0006, 'Birthday Image Scraps', 'birthday-image-orkut -scrap', '', '', '', '', '', 'I', 'N', 1),
(0007, 'Happy Birthday Scraps', 'happy-birthday-orkut- scrap', '', '', '', '', '', 'I', 'N', 1),
(0008, 'Musical Birthday Scraps', 'musical- birthday-orkut- scrap', '', '', '', '', '', 'I', 'N', 1),
(0009, 'Get Well Soon', 'get-well-soon-orkut-scrap', '', '', '', '', '', 'I', 'N', 2),
(0010, 'Good Afternoon', 'good-afternoon-orkut-scrap', '', '', '', '', '', 'I', 'N', 2),
(0011, 'Good Bye', 'good-bye-orkut-scrap', '', '', '', '', '', 'I', 'N', 2),
(0012, 'Good Day', 'good-day-orkut-scrap', '', '', '', '', '', 'I', 'N', 2),
(0013, 'Good Evening', 'good-evening-orkut-scrap', '', '', '', '', '', 'I', 'Y', 2),
(0014, 'Good Luck', 'good-luck-orkut-scrap', '', '', '', '', '', 'I', 'Y', 2),
(0015, 'Good Morning', 'good-morning-orkut-scrap', '', '', '', '', '', 'I', 'Y', 2),
(0016, 'Good Night', 'good-night-orkut-scrap', '', '', '', '', '', 'I', 'N', 2),
(0017, 'Hello', 'hello-orkut-scrap', '', '', '', '', '', 'I', 'N', 2),
(0018, 'Keep In Touch', 'keep-in-touch-orkut-scrap', '', '', '', '', '', 'I', 'N', 2),
(0019, 'Keep Smiling', 'keep-smiling-orkut-scrap', '', '', '', '', '', 'I', 'Y', 2),
(0020, 'LoL Scraps', 'lol-orkut-scrap', '', '', '', '', '', 'I', 'N', 2),
(0021, 'Miss You', 'miss-you-orkut-scrap', '', '', '', '', '', 'I', 'Y', 2),
(0022, ' Miss You Flash Scraps', 'miss-you-orkut-scrap', '', '', '', '', '', 'I', 'N', 2),
(0023, 'Sorry Scrap', 'sorry-orkut-scrap', '', '', '', '', '', 'I', 'N', 2),
(0024, 'Summer Scraps', 'summer-orkut-scrap', '', '', '', '', '', 'I', 'N', 2),
(0025, 'Thank You', 'thank-you-orkut-scrap', '', '', '', '', '', 'I', 'Y', 2),
(0026, 'Thank You Flash Scrap', 'thank-you-orkut-scrap', '', '', '', '', '', 'I', 'N', 2),
(0027, 'Thanks For Add', 'thanks-for-add-orkut-scrap', '', '', '', '', '', 'I', 'Y', 2),
(0028, 'Welcome Scraps', 'welcome-orkut-scrap', '', '', '', '', '', 'I', 'N', 2),
(0029, 'Animated Friendship Day ', 'animated-friendship-day-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0030, 'Scraps', 'scraps-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0031, 'Best Friend Scraps', 'best-friend-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0032, 'Friendship Day Flash Scraps', 'friendship-day-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0033, 'Friendship  Scraps', 'friendship-orkut-scarp', '', '', '', '', '', 'I', 'N', 3),
(0034, 'Happy Friendship Day', 'happy-friendship-day-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0035, 'Heart Scraps', 'heart-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0036, 'Hugs Scraps', 'hugs-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0037, 'I Hate You', 'i-hate-you-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0038, 'I Love You Scraps', 'i-love-you-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0039, 'Kisses', 'kisses-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0040, 'Love Flash Scraps ', 'love-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0041, 'Online Friend', 'online-friend-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0042, 'Rose Day Scraps ', 'rose-day-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0043, 'Showing Love Scraps ', 'showing-love-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0044, 'Special Scraps ', 'special-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0045, 'Teddy Bear Scraps ', 'teddy-bear-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0046, 'Special Scraps ', 'special-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0047, 'Teddy Bear Scraps ', 'teddy-bear-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0048, 'Thinking Of You ', 'thinking-of-you-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0049, 'Valentines Day Flash Scraps ', 'valentines-day-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0050, 'Thinking Of You ', 'thinking-of-you-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0051, 'Valentines Day Flash Scraps ', 'valentines-day-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0052, 'Valentines Day Scraps', 'valentines-day-orkut-scrap', '', '', '', '', '', 'I', 'N', 3),
(0053, 'Animated New Year Scraps', 'animated-new-year-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0054, 'Anniversary Flash Scraps', 'anniversary-orkut-scarp', '', '', '', '', '', 'I', 'N', 4),
(0055, 'Anniversary Scraps', 'anniversary-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0056, 'Bengali New Year Scraps', 'bengali-new-year-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0057, 'Bhai Dooj Scraps', 'bhai-dooj-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0058, 'Chhoti Diwali Scraps', 'chhoti-diwali-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0059, 'Children’s Day Scraps', 'childrens-day-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0060, 'Christmas Animated Scraps', 'christmas-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0061, 'Christmas Flash Scraps', 'chrishmas-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0062, 'Christmas Scraps', 'chrishmas-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0063, 'Dhanteras Scraps', 'dhanteras-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0064, 'Diwali Flash Scraps', 'diwali-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0065, 'Diwali  Scraps', 'diwali-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0066, 'Durga Puja Scraps', 'durga-puja-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0067, 'Dussehra Scraps', 'dussehra-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0068, 'Eid Mubarak Scraps', 'eid-mubarak-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0069, 'Engagement Scraps', 'engagement-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0070, 'Father’s Day Scraps', 'fathers-day-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0071, 'Gandhi Jayanti Scraps', 'gandhi-jayanti-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0072, 'Ganesh Chaturthi Scraps', 'ganesh-chaturthi-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0073, 'Good Friday Scraps', 'good-friday-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0074, 'Gudi Padwa', 'gudi-padwa-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0075, 'Gurupurab Scraps', 'gurupurab-orkut- scrap', '', '', '', '', '', 'I', 'N', 4),
(0076, 'Halloween Scraps', 'halloween-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0077, 'Hanuman Jayanti Scraps', 'hanuman-jayanti-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0078, 'Happy Easter Scraps', 'happy-easter-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0079, 'Happy Holi Scraps', 'happy-holi-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0080, 'Happy New Year Scraps', 'happy-new-year-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0081, 'Hindu New Year \r\n', 'hindu-new-year-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0082, 'Holi Greetings ', 'holi-greeting-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0083, 'Independence Day Scraps ', 'independence-day-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0084, 'Janamastmi Scraps', 'janamastmi-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0085, 'Kite Festival Scraps ', 'kite-festival-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0086, 'Lohri Scraps ', 'lohri-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0087, 'Mahavir Jayanti Scraps ', 'mahavir-jayanti-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0088, 'Makkar Sakranti Scraps ', 'makkar-sakranti-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0089, 'Mother’s Day Scraps', 'mothers-day-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0090, 'Navratri Flash Scraps ', 'navratri-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0091, 'Navratri Scraps ', 'navratri-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0092, 'New Year Flash Greetings ', 'new-year-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0093, 'Onam Scraps ', 'onam-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0094, 'Pongal Scraps ', 'pongal-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0095, 'Raksha Bandhan Scraps', 'raksha-bandhan-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0096, 'Ram Navami Scraps', 'ram-navami-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0097, 'Republic Day Scraps ', 'republic-day-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0098, 'Shivratri Scraps', 'shivratri-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0099, 'Teacher’s Day Scraps', 'teachers-day-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0100, 'Wedding Scraps ', 'wedding-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0101, 'Woman’s Day Scraps', 'womans-day-orkut-scrap', '', '', '', '', '', 'I', 'N', 4),
(0102, 'Friday Scraps', 'friday-orkut-scrap', '', '', '', '', '', 'I', 'N', 5),
(0105, 'Happy Weekend Scraps', 'happy-weekend-orkut-scrap', '', '', '', '', '', 'I', 'N', 5),
(0106, 'Monday Scraps', 'monday-orkut-scrap', '', '', '', '', '', 'I', 'N', 5),
(0107, 'Saturday Scraps', 'saturday-orkut-scrap', '', '', '', '', '', 'I', 'N', 5),
(0108, 'Sunday scraps ', 'sunday-orkut-scrap', '', '', '', '', '', 'I', 'N', 5),
(0109, 'Thursday Scraps ', 'thursday-orkut-scrap', '', '', '', '', '', 'I', 'N', 5),
(0110, 'Tuedsay Scraps', 'tuedsay-orkut-scrap', '', '', '', '', '', 'I', 'N', 5),
(0111, 'Wednesday Scraps', 'wednesday-orkut-scrap', '', '', '', '', '', 'I', 'N', 5),
(0112, 'Angel Scraps', 'angel-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0113, 'April Fool Scraps ', 'april-fool-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0114, 'Butterflies Scraps', 'butterflies-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0115, 'Call Me Scraps', 'call-me-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0116, 'Comment Scraps ', 'comment-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0117, 'Congrates Scraps', 'congrates-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0118, 'Congratulation Flash Scraps', 'congratulation-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0119, 'Fantasy Scraps', 'fantasy-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0120, 'Flash Smileys Scraps', 'flash-smileys-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0121, 'Funny Animation Scraps ', 'funny-animation-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0122, 'Funny Scraps ', 'funny-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0123, 'Gift Scraps ', 'gift-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0124, 'Illusion Scraps', 'illusion-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0125, 'Lets Party Scraps', 'lets-party-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0126, 'Nature Scraps ', 'nature-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0127, 'Quotes Scraps ', 'quotes-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0128, 'Rose Scraps  ', 'rose-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0129, 'Smileys Scraps', 'smileys-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0130, 'Sweets Scraps', 'sweets-orkut-scrap', '', '', '', '', '', 'I', 'N', 6),
(0131, 'Birthday Scraps', 'birthday-orkut-scrap', '', '', '', '', '', 'I', 'N', 7),
(0132, 'Friendship Scraps ', 'friendship-orkut-scrap', '', '', '', '', '', 'I', 'N', 7),
(0133, 'Funny Scraps ', 'funny-orkut-scrap', '', '', '', '', '', 'I', 'N', 7),
(0134, 'Love Scraps', 'love-orkut-scrap', '', '', '', '', '', 'I', 'N', 7);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user_id` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `lastlogin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `password`, `lastlogin`) VALUES
('admin', 'password', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `scraps`
--

CREATE TABLE IF NOT EXISTS `scraps` (
  `sid` int(7) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `cid` int(4) unsigned zerofill NOT NULL,
  `name` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` enum('I','F','G','O') NOT NULL DEFAULT 'I',
  `views` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `scraps`
--

INSERT INTO `scraps` (`sid`, `cid`, `name`, `date`, `type`, `views`) VALUES
(0000001, 0005, '1.gif', '2011-01-15 00:00:00', 'I', 45),
(0000002, 0005, '2.jpg', '2011-01-15 00:00:00', 'G', 12),
(0000016, 0005, 'thankyou-flash-cards1.swf', '2011-01-17 00:00:00', 'F', 0),
(0000005, 0005, '3.jpg', '2011-01-18 00:00:00', 'I', 11),
(0000006, 0005, '4.gif', '2011-01-27 00:00:00', 'G', 21),
(0000007, 0005, '5.gif', '2011-01-29 00:00:00', 'G', 11),
(0000008, 0005, '6.gif', '2011-01-13 00:00:00', 'G', 11),
(0000009, 0005, '7.gif', '2011-01-29 00:00:00', 'G', 7),
(0000010, 0005, '8.gif', '2011-01-29 00:00:00', 'G', 7),
(0000011, 0005, '9.jpg', '2011-01-27 00:00:00', 'G', 8),
(0000012, 0005, '10.jpg', '2011-01-27 00:00:00', 'G', 8),
(0000013, 0005, '11.jpg', '2011-01-22 00:00:00', 'I', 4),
(0000014, 0005, '12.jpg', '2011-01-21 00:00:00', 'I', 7),
(0000015, 0005, '13.jpg', '2011-01-13 00:00:00', 'I', 7),
(0000017, 0013, '125sd.jpg', '2011-01-20 00:00:00', 'I', 10),
(0000018, 0015, '18.jpg', '2011-01-22 00:00:00', 'I', 1);
