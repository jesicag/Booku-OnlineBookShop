-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2018 at 05:03 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `try`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1514004611),
('user', '2', 1514004612);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1514004611, 1514004611),
('approve_detail', 2, 'approve_detail', NULL, NULL, 1514004610, 1514004610),
('assign_user', 2, 'assign_user', NULL, NULL, 1514004611, 1514004611),
('browse', 2, NULL, NULL, NULL, 1514004609, 1514004609),
('cancel_request_detail', 2, 'cancel_request_detail', NULL, NULL, 1514004609, 1514004609),
('change_password', 2, 'change_password', NULL, NULL, 1514004609, 1514004609),
('create_detail', 2, 'create_detail', NULL, NULL, 1514004609, 1514004609),
('create_stock', 2, 'create_stock', NULL, NULL, 1514004610, 1514004610),
('create_user', 2, 'create_user', NULL, NULL, 1514004610, 1514004610),
('delete_detail', 2, 'delete_detail', NULL, NULL, 1514004609, 1514004609),
('delete_stock', 2, 'delete_stock', NULL, NULL, 1514004610, 1514004610),
('delete_user', 2, 'delete_user', NULL, NULL, 1514004610, 1514004610),
('guest', 1, NULL, NULL, NULL, 1514004609, 1514004609),
('list_cart', 2, 'list_cart', NULL, NULL, 1514004610, 1514004610),
('list_detail', 2, 'list_detail', NULL, NULL, 1514004609, 1514004609),
('list_user', 2, 'list_user', NULL, NULL, 1514004610, 1514004610),
('login', 2, 'Login', NULL, NULL, 1514004609, 1514004609),
('manage_cart', 2, NULL, NULL, NULL, 1514004610, 1514004610),
('manage_detail', 2, NULL, NULL, NULL, 1514004610, 1514004610),
('manage_stock', 2, NULL, NULL, NULL, 1514004610, 1514004610),
('manage_user', 2, NULL, NULL, NULL, 1514004611, 1514004611),
('register', 2, 'Register', NULL, NULL, 1514004609, 1514004609),
('reject_detail', 2, 'reject_detail', NULL, NULL, 1514004610, 1514004610),
('request_detail', 2, 'request_detail', NULL, NULL, 1514004609, 1514004609),
('return_detail', 2, 'return_detail', NULL, NULL, 1514004610, 1514004610),
('revoke_user', 2, 'revoke_user', NULL, NULL, 1514004611, 1514004611),
('update_detail', 2, 'update_detail', NULL, NULL, 1514004609, 1514004609),
('update_stock', 2, 'update_stock', NULL, NULL, 1514004609, 1514004609),
('update_user', 2, 'update_user', NULL, NULL, 1514004610, 1514004610),
('user', 1, NULL, NULL, NULL, 1514004611, 1514004611),
('view_cart', 2, 'view_cart', NULL, NULL, 1514004609, 1514004609),
('view_detail', 2, 'view_detail', NULL, NULL, 1514004609, 1514004609),
('view_expired', 2, 'view_expired', NULL, NULL, 1514004610, 1514004610),
('view_stock', 2, 'view_stock', NULL, NULL, 1514004609, 1514004609),
('view_unexpired', 2, 'view_unexpired', NULL, NULL, 1514004610, 1514004610),
('view_user', 2, 'view_user', NULL, NULL, 1514004610, 1514004610);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'assign_user'),
('admin', 'browse'),
('admin', 'manage_cart'),
('admin', 'manage_detail'),
('admin', 'manage_stock'),
('admin', 'manage_user'),
('admin', 'revoke_user'),
('browse', 'cancel_request_detail'),
('browse', 'change_password'),
('browse', 'list_detail'),
('browse', 'request_detail'),
('browse', 'view_cart'),
('browse', 'view_detail'),
('browse', 'view_stock'),
('guest', 'login'),
('guest', 'register'),
('manage_cart', 'approve_detail'),
('manage_cart', 'list_cart'),
('manage_cart', 'reject_detail'),
('manage_cart', 'return_detail'),
('manage_cart', 'view_cart'),
('manage_cart', 'view_expired'),
('manage_cart', 'view_unexpired'),
('manage_detail', 'create_detail'),
('manage_detail', 'delete_detail'),
('manage_detail', 'update_detail'),
('manage_stock', 'create_stock'),
('manage_stock', 'delete_stock'),
('manage_stock', 'update_stock'),
('manage_user', 'create_user'),
('manage_user', 'delete_user'),
('manage_user', 'list_user'),
('manage_user', 'update_user'),
('manage_user', 'view_user'),
('user', 'browse');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'ID',
  `user_id` int(11) NOT NULL COMMENT 'USER_ID',
  `stock_id` int(11) NOT NULL,
  `total` int(10) NOT NULL,
  `buy_date` date NOT NULL,
  `cost` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `stock_id`, `total`, `buy_date`, `cost`) VALUES
(8, 2, 3, 1, '2018-01-12', 220000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_name`) VALUES
('Christianity'),
('Computer'),
('Fiction'),
('Health'),
('Motivation'),
('Travelers');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(30) NOT NULL COMMENT 'ID',
  `title` varchar(100) NOT NULL COMMENT 'Title',
  `category` varchar(20) NOT NULL,
  `author` varchar(100) NOT NULL COMMENT 'Author/Brand',
  `price` int(60) NOT NULL COMMENT 'Price',
  `publisher` varchar(100) NOT NULL COMMENT 'Publisher',
  `language` varchar(100) NOT NULL COMMENT 'Language',
  `page` int(100) NOT NULL COMMENT 'Page',
  `review` text NOT NULL COMMENT 'Review',
  `picture` varchar(240) NOT NULL COMMENT 'Picture'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `title`, `category`, `author`, `price`, `publisher`, `language`, `page`, `review`, `picture`) VALUES
(1, 'Earthly Remains', 'Fiction', 'Leon, Donna', 130000, 'Cornerstone', 'English', 320, 'During the interrogation of an entitled, arrogant man suspected of giving drugs to a young girl who then died, Commissario Guido Brunetti acts rashly, doing something he will quickly come to regret... ', 'img/earthly.png'),
(2, 'Wonder Woman : WarBringer', 'Fiction', 'Bardugo, Leigh', 230000, 'Random House Books for Young Readers', 'English', 384, 'She will become one of the world\'s greatest heroes: WONDER WOMAN. But first she is Diana, Princess of the Amazons. And her fight is just beginning. . . .\r\n \r\nDiana longs to prove herself to her legendary warrior sisters. But when the opportunity finally comes, she throws away her chance at glory and breaks Amazon law—risking exile—to save a mere mortal. Even worse, Alia Keralis is no ordinary girl and with this single brave act, Diana may have doomed the world.\r\n \r\nAlia just wanted to escape her overprotective brother with a semester at sea. She doesn\'t know she is being hunted. When a bomb detonates aboard her ship, Alia is rescued by a mysterious girl of extraordinary strength and forced to confront a horrible truth: Alia is a Warbringer—a direct descendant of the infamous Helen of Troy, fated to bring about an age of bloodshed and misery.\r\n \r\nTogether, Diana and Alia will face an army of enemies—mortal and divine—determined to either destroy or possess the Warbringer. If they have any hope of saving both their worlds, they will have to stand side by side against the tide of war.\r\n\r\nAct fast! The first printing includes a poster of Diana! Each first printing in the DC Icons series will have a limited-edition poster—collect them all to create the full image!\r\n\r\n\"Warbringer is straight-up dazzling, every sentence waking up your senses with a \'Yeah, that\'s right, this is BRAND-NEW, SUCKAS!\' punch.\"\r\n—LIBBA BRAY, New York Times bestselling author of The Diviners\r\n\r\n\"Will absolutely satisfy pre-existing fans of Wonder Woman, but it also readily stands alone for non-superhero fans.\"\r\n—Kirkus Reviews, STARRED REVIEW\r\n\r\n\"Wonder Woman is the epitome of a kick-butt heroine, and Bardugo does her justice with aplomb.\"\r\n—The Bulletin\r\n\r\n\"Bardugo breathes zippy new life into the story with a twisty plot, whip-smart characters, and her trademark masterful writing.\"', 'img/wonder.png'),
(3, 'Rich People Problems', 'Fiction', 'Kwan, Kevin', 220000, 'Doubleday Books for Young Readers', 'English', 384, 'NEW YORK TIMES BESTSELLER Kevin Kwan, bestselling author of Crazy Rich Asians (soon to be a MAJOR MOTION PICTURE starring Constance Wu, Henry Golding, Michelle Yeoh and Gemma Chan) and China Rich Girlfriend, is back with an uproarious new novel of a family riven by fortune, an ex-wife driven psychotic with jealousy, a battle royal fought through couture gown sabotage, and the heir to one of Asia\'s greatest fortunes locked out of his inheritance. When Nicholas Young hears that his grandmother, Su Yi, is on her deathbed, he rushes to be by her bedside—but he\'s not alone. The entire Shang-Young clan has convened from all corners of the globe to stake claim on their matriarch’s massive fortune. With each family member vying to inherit Tyersall Park—a trophy estate on 64 prime acres in the heart of Singapore—Nicholas’s childhood home turns into a hotbed of speculation and sabotage. As her relatives fight over heirlooms, Astrid Leong is at the center of her own storm, desperately in love with her old sweetheart Charlie Wu, but tormented by her ex-husband—a man hell bent on destroying Astrid’s reputation and relationship. Meanwhile Kitty Pong, married to China’s second richest man, billionaire Jack Bing, still feels second best next to her new step-daughter, famous fashionista Colette Bing. A sweeping novel that takes us from the elegantly appointed mansions of Manila to the secluded private islands in the Sulu Sea, from a kidnapping at Hong Kong’s most elite private school to a surprise marriage proposal at an Indian palace, caught on camera by the telephoto lenses of paparazzi, Kevin Kwan\'s hilarious, gloriously wicked new novel reveals the long-buried secrets of Asia\'s most privileged families and their rich people problems.', 'img/rpp.png'),
(4, 'Arrowood (B)', 'Fiction', 'McHugh, Laura', 150000, 'Cornerstone', 'English', 288, '\'Kept me guessing and re-guessing all the way to its inexorable conclusion\' Ruth Ware, Sunday Times bestselling author of The Woman in Cabin 10. `Superb and subtle psychological suspense, and a compelling mystery, too . . . I thought I knew who did it, but I was wrong-four times\' Lee Child `This robust, old-fashioned gothic mystery has everything you\'re looking for: a creepy old house, a tenant with a secret history, and even a few ghosts. Laura McHugh\'s novel sits at the intersection of memory and history, astutely asking whether we carry the past or it carries us\'Jodi Picoult Arrowood is the grandest of historical houses lining the Mississippi. It has its own stories and ghostly presence: it\'s where two small twin girls were abducted ten years ago... Now, Arden has returned to her childhood home determined to establish what really happened to her sisters that traumatic summer. But the house and the surrounding town hold their secrets close - and the truth, when Arden finds it, is more devastating than she ever could have imagined. Family lies, buried secrets and a terrifying truth lie at the heart of this brilliant and haunting crime novel.', 'img/arrow.png'),
(5, 'Stealth Health Lunches Kids Love', 'Health', 'Tracy Griffith', 180000, 'Macmillan USA', 'English', 192, 'Nearly every lunchtime staple nowadays includes bland, carb-loaded bread that leaves kids bloated and sluggish. That is, until now. Best-selling author and health-conscious chef, Tracy Griffith has the answer: unique gluten-free sandwich wraps that hide healthy ingredients and are appealing to kids. With Stealth Health Lunches Kids Love, Tracy presents parents with a multitude of healthy, delicious ways to prepare exciting wraps for their children. Say goodbye to dull bread and same old wraps because each recipe is packed with nutrients to give kids a happy, healthy, energized day, wrapped in fun shapes and are easy to eat. Kids will also have a blast in the kitchen making their own Stealth Health creations.\r\nAs the first woman to graduate from the California Sushi Academy, author of Sushi American Style, Executive Chef for New Gem Foods, and from a prominent Hollywood family; Tracy Griffith has used her diverse life and culinary experience to create irresistible and innovative lunches in this soon-to-be family favorite cookbook.\r\nThese recipes were intensively tested on kids from the prestigious Hong Kong International School (which is attended by children from throughout the world) to Singapore to schoolchildren in New Jersey, New York and Los Angeles. Each recipe passed a majority of thumbs up from at least three to five kids. Short quotes will run with each recipe and add to the fun and make the book stand out to kids.', 'img/health1.png'),
(6, 'The 8-Hour Diet: Watch the Pounds Disappear Without Watching What You Eat!', 'Health', 'Zinczenko, David', 240000, 'MensHealth', 'English', 288, 'In The 8-Hour Diet, bestselling authors David Zinczenko and Peter Moore present a paradigm-shifting plan that allows readers to eat anything they want, as much as they want—and still strip away 20, 40, 60 pounds, or more.\r\n\r\nAfter visits to world-renowned researchers at the Salk Institute, in La Jolla, California, and the National Institute on Aging, in Baltimore, and completing interviews with a dozen other clinical experts—plus poring over the copious amounts of new research in the fascinating field of intermittent fasting, Zinczenko and Moore came up with a plan that they themselves tried, and they engaged 2,000 people for a test panel. Based on their interviews, research, and test panel results, they determined that readers can lose remarkable amounts of weight eating the foods they like best—as long as they eat within a set 8-hour time period. Fasting is, of course, an ancient spiritual and health practice, but it\'s also a way to sidestep many of the ills of the modern world—including diabetes, heart disease, and cognitive impairment.\r\n\r\nZinczenko and Moore demonstrate how simply observing this timed-eating strategy, even just three days a week, will reset a dieter\'s metabolism so that he or she can enter fat-burning mode first thing in the morning—and stay there all day long. And by focusing on eight critical, nutrient-rich Powerfoods, readers build in a second layer of protection against Alzheimer\'s, heart disease, and even the common cold.\r\n\r\nIn the book, readers will find motivating strategies, delicious recipes, and an 8-minute workout routine to maximize calorie burn. The 8-Hour Diet promises to strip away unwanted pounds and give readers the focus and willpower they need to reach their goals for weight loss and life.', 'img/health2.png'),
(7, 'Mindless Eating: Why We Eat More Than We Think', 'Health', 'Wansink, Brian', 230000, 'Bantam', 'English', 304, 'In this illuminating and groundbreaking new book, food psychologist Brian Wansink shows why you may not realize how much you’re eating, what you’re eating–or why you’re even eating at all.\r\n\r\n• Does food with a brand name really taste better?\r\n• Do you hate brussels sprouts because your mother did?\r\n• Does the size of your plate determine how hungry you feel?\r\n• How much would you eat if your soup bowl secretly refilled itself?\r\n• What does your favorite comfort food really say about you?\r\n• Why do you overeat so much at healthy restaurants?\r\n\r\nBrian Wansink is a Stanford Ph.D. and the director of the Cornell University Food and Brand Lab. He’s spent a lifetime studying what we don’t notice: the hidden cues that determine how much and why people eat. Using ingenious, fun, and sometimes downright fiendishly clever experiments like the “bottomless soup bowl,” Wansink takes us on a fascinating tour of the secret dynamics behind our dietary habits. How does packaging influence how much we eat? Which movies make us eat faster? How does music or the color of the room influence how much we eat? How can we recognize the “hidden persuaders” used by restaurants and supermarkets to get us to mindlessly eat? What are the real reasons most diets are doomed to fail? And how can we use the “mindless margin” to lose–instead of gain–ten to twenty pounds in the coming year?\r\n\r\nMindless Eating will change the way you look at food, and it will give you the facts you need to easily make smarter, healthier, more mindful and enjoyable choices at the dinner table, in the supermarket, in restaurants, at the office–even at a vending machine–wherever you decide to satisfy your appetite.', 'img/health3.png'),
(8, 'Disease-Proof', 'Health', 'Katz, David L.', 220000, 'Plume', 'English', 304, '“If you want to build better health and a better future, this book makes an excellent tool kit.”—David A. Kessler, MD, author of The End of Overeating and former commissioner of the FDA\r\n \r\nIt sometimes seems as if everyone around us is being diagnosed with a chronic illness—and that we might soon join them. In Disease-Proof, leading specialist in preventive medicine Dr. David Katz draws upon the latest scientific evidence and decades of clinical experience to explain how we can slash our risk of every major chronic disease—heart disease, cancer, stroke, diabetes, dementia, and obesity—by an astounding 80%. Dr. Katz arms us with skillpower: a proven, user-friendly set of tools that helps us make simple behavioral changes that have a tremendous effect on our health and well-being. Inspiring, groundbreaking, and prescriptive, Disease-Proof proves making lasting lifestyle changes is easier than we think. \r\n', 'img/health4.png'),
(9, 'SQL the Complete Reference, 3rd Edition\r\n', 'Computer', 'Groff, James', 170000, 'McGrawHill', 'English', 277, 'The Definitive Guide to SQL\r\nGet comprehensive coverage of every aspect of SQL from three leading industry experts. Revised with coverage of the latest RDBMS software versions, this one-stop guide explains how to build, populate, and administer high-performance databases and develop robust SQL-based applications. \r\n\r\nSQL: The Complete Reference, Third Edition shows you how to work with SQL commands and statements, set up relational databases, load and modify database objects, perform powerful queries, tune performance, and implement reliable security policies. Learn how to employ DDL statements and APIs, integrate XML and Java scripts, use SQL objects, build web servers, handle remote access, and perform distributed transactions. Techniques for managing in-memory, stream, and embedded databases that run on today\'s mobile, handheld, and wireless devices are included in this in-depth volume.Build SQL-based relational databases and applicationsCreate, load, and modify database objects using SQLConstruct and execute simple, multitable, and summary queriesImplement security measures with authentication, privileges, roles, and viewsHandle database optimization, backup, recovery, and replicationWork with stored procedures, functions, extensions, triggers, and objectsExtend functionality using APIs, dynamic SQL, and embedded SQLExplore advanced topics such as DBMS transactions, locking mechanisms, materialized views, and two-phase commit protocol Understand the latest market trends and the future of SQL', 'img/computer1.png'),
(10, 'Making Things Move: DIY Mechanisms for Inventors, Hobbyists, and Artists', 'Computer', 'Roberts, Dustyn', 150000, 'McGraw-Hill Professional', 'English', 300, 'Get Your Move On \r\nIn \"Making Things Move: DIY Mechanisms for Inventors, Hobbyists, and Artists,\" you\'ll learn how to successfully build moving mechanisms through non-technical explanations, examples, and do-it-yourself projects--from kinetic art installations to creative toys to energy-harvesting devices. Photographs, illustrations, screen shots, and images of 3D models are included for each project. \r\nThis unique resource emphasizes using off-the-shelf components, readily available materials, and accessible fabrication techniques. Simple projects give you hands-on practice applying the skills covered in each chapter, and more complex projects at the end of the book incorporate topics from multiple chapters. Turn your imaginative ideas into reality with help from this practical, inventive guide. \r\nDiscover how to: Find and select materials Fasten and join parts Measure force, friction, and torque Understand mechanical and electrical power, work, and energy Create and control motion Work with bearings, couplers, gears, screws, and springs Combine simple machines for work and fun \r\nProjects include: Rube Goldberg breakfast machine Mousetrap powered car DIY motor with magnet wire Motor direction and speed control Designing and fabricating spur gears Animated creations in paper An interactive rotating platform Small vertical axis wind turbine SADbot: the seasonally affected drawing robot \r\nMake Great Stuff \r\n\r\nTAB, an imprint of McGraw-Hill Professional, is a leading publisher of DIY technology books for makers, hackers, and electronics hobbyists', 'img/computer2.png'),
(11, 'Comptia Network+ Certification All-In-One Exam Guide, 5th Edition (Exam N10-005)\r\n', 'Computer', 'Whitman, Drew Eric', 280000, 'McGraw-Hill', 'English', 244, 'Prepare for CompTIA Network+ Exam N10-005 with McGraw-Hill--a Gold-Level CompTIA Authorized Partner offering Authorized CompTIA Approved Quality Content to give you the competitive edge on exam day. \r\nGet complete coverage of all the material included on CompTIA Network+ exam N10-005 inside this comprehensive, up-to-date resource. Written by CompTIA certification and training expert Mike Meyers, this authoritative exam guide features learning objectives at the beginning of each chapter, exam tips, practice questions, and in-depth explanations. Designed to help you pass the CompTIA Network+ exam with ease, this definitive volume also serves as an essential on-the-job reference. \r\nCOVERS ALL EXAM TOPICS, INCLUDING HOW TO: Build a network with the OSI and TCP/IP models Configure network hardware, topologies, and cabling Connect multiple Ethernet components Install and configure routers and switches Work with TCP/IP applications and network protocols Configure IPv6 routing protocols Implement virtualization Set up clients and servers for remote access Configure wireless networks Secure networks with firewalls, NAT, port filtering, packet filtering, and other methods Build a SOHO network Manage and troubleshoot networks \r\n\r\nCD-ROM FEATURES: Two full practice exams Video presentation from Mike Meyers A new collection of Mike\'s favorite shareware and freeware networking tools and utilities One hour of video training Adobe Digital Editions free eBook download (subject to Adobe\'s system requirements)', 'img/computer3.png'),
(12, 'CorelDRAW X6 the Official Guide', 'Computer', 'Ghosh, M. K', 320000, 'CorelPRESS', 'English', 280, 'The only official guide to CorelDRAW--fully updated throughout to cover all the new features of the latest release \r\n\"CorelDRAW X The Official Guide\" is the one-stop tutorial/reference for learning how to create gorgeous graphics for a variety of print and web uses. Veteran graphic designer and author Gary Bouton shows you how to use the new product features, and shows off beautiful graphics and techniques in this Corel-authorized guide. Packed with examples and techniques, this book delivers details no CorelDRAW user can afford to be without \r\nIdeal for beginners through experts getting started on the new release, the book explains how to install the software, use the illustration and drawing tools, work with text, apply colors, fills, and outlines, apply special effects, and work in 3D. \r\n\"CorelDRAW X The Official Guide\" Offers hundreds of tips, tricks, and shortcuts that show how to get the most out of product features, not just what the features do Includes online access to 30+ video tutorials of hands-on instruction from the author, plus CorelDRAW native files, stock images for tutorials in Corel PHOTO-PAINT, custom typefaces designed by the author, and other useful starter pieces for learning CorelDRAW Includes a full-color insert demonstrating results of various filters and effects Provides a comprehensive CorelDRAW X reference as well as drawing tips and illustration techniques Discusses print and web use and potential issues Explains how to use PHOTO-PAINT, Corel\'s image-editing tool ', 'img/computer4.png');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(20) NOT NULL,
  `start_date` date NOT NULL,
  `due_date` date NOT NULL,
  `category` varchar(30) NOT NULL,
  `percent` int(10) NOT NULL,
  `final_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `start_date`, `due_date`, `category`, `percent`, `final_cost`) VALUES
(3, '2018-02-01', '2018-03-01', 'Health', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1513869447),
('m130524_201442_init', 1513869454),
('m140506_102106_rbac_init', 1513869678);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `book` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `book_id`, `book_stock`) VALUES
(1, 1, 10),
(2, 2, 11),
(3, 3, 9),
(4, 4, 10),
(5, 5, 10),
(6, 6, 10),
(7, 7, 10),
(8, 8, 10),
(9, 9, 10),
(10, 10, 10),
(11, 11, 10),
(12, 12, 10);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `sum_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `sum_cost`) VALUES
(1, 'admin', 'Vjwb-fc3062ITmKvzTId0afTbV7wRvtD', '$2y$13$5b4nybWxhSxhCOg7Y60InePwGa50.L0eZYi3OcZ1UNCXlFt1wuyha', NULL, 'elisajesica@gmail.com', 10, 1513870463, 1513870463, 0),
(2, 'jesica', '_48cX5JwaICwZF-Xs7__ujZldslJZm3m', '$2y$13$uuGBnA93ea9h88gtpIjDbeIT97x/wlzZJQm2mQqf5n/fsVy3rhqhq', NULL, 'elisa@gmail.com', 10, 1513955011, 1513955011, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_buyer` (`user_id`),
  ADD KEY `cart_book_stock` (`stock_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_name`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `def_category` (`category`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `book` (`book`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_book_stock` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`stock_id`),
  ADD CONSTRAINT `cart_buyer` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `book` FOREIGN KEY (`book`) REFERENCES `details` (`id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock` FOREIGN KEY (`book_id`) REFERENCES `details` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
