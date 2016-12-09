-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2016 at 08:31 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: a2
--

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Table structure for table `orderitems`
--

DROP TABLE IF EXISTS `Orderitems`;
CREATE TABLE `Orderitems` (
  `order` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `special` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
  
--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `Orders`;
CREATE TABLE `Orders` (
  `num` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(1) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `customer` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for table `orderitems`
--
ALTER TABLE `Orderitems`
  ADD PRIMARY KEY (`order`,`item`);

--
-- Indexes for table `orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`num`);

DROP TABLE IF EXISTS `Recipe_Supply`;
-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--
DROP TABLE IF EXISTS `Supplies`;
CREATE TABLE `Supplies` (
  `code` INT(2) NOT NULL,
  `name` TEXT NOT NULL,
  `description` TEXT NOT NULL,
  `measuring_units` TEXT NOT NULL,
  `receiving_cost` REAL NOT NULL,
  `receiving_amount` INT(2) NOT NULL,
  `quantity` REAL NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplies`
--

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(0, 'Lavendar', 'Lavendar oil', 'mL', 29.99, 25, 0);

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(1, 'Eucalyptus', 'Eucalyptus oil', 'mL', 39.99, 50, 0);

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(2,'Lemon', 'Lemon oil', 'mL', 19.99, 50, 0);

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(3,'Orange', 'Orange oil', 'mL', 14.99, 25, 0);

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(4,'Grapefruit', 'Grapefruit oil', 'mL', 29.99, 50, 0);

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(5,'Ylang ylang', 'Ylang ylang oil', 'mL', 24.99, 25, 0);

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(6,'Geranium', 'Geranium oil', 'mL', 29.99, 25, 0);

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(7,'Rosemary', 'Rosemary oil', 'mL', 39.99, 50, 0);

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(8,'Peppermint', 'Peppermint oil', 'mL', 29.99, 50, 0);

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(9,'Sandalwood', 'Sandalwood oil', 'mL', 29.99, 50, 0);

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(10,'Neroli', 'Neroli oil', 'mL', 9.99, 25, 0);

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(11,'Spearmint', 'Spearmint oil', 'mL', 19.99, 50, 0);

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(12,'Bergamot', 'Bergamot oil', 'mL', 29.99, 50, 0);

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(13,'Cedarwood', 'Cedarwood oil', 'mL', 39.99, 50, 0);

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(14,'Chamomile', 'Chamomile oil', 'mL', 29.99, 25, 0);

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(15,'Rosewood', 'Rosewood oil', 'mL', 19.99, 25, 0);

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(16,'Ginger', 'Ginger oil', 'mL', 34.99, 50, 0);

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(17,'Marjoram', 'Marjoram oil', 'mL', 34.99, 50, 0);

INSERT INTO `Supplies` (`code`, `name`, `description`, `measuring_units`, `receiving_cost`, `receiving_amount`, `quantity`) VALUES
(18,'Basil', 'Basil oil', 'mL', 29.99, 50, 0);




DROP TABLE IF EXISTS `Recipes`;
CREATE TABLE `Recipes` (
  `code` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
   PRIMARY KEY (`code`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `Recipes` (`code`, `name`, `description`) VALUES
(0,'Refresh', 'Sharpen concentration, increase stamina, and revitalize your senses');
INSERT INTO `Recipes` (`code`, `name`, `description`) VALUES
(1,'Cloud Nine', 'Lift your spirits');
INSERT INTO `Recipes` (`code`, `name`, `description`) VALUES
(2,'Energy', 'Invigorate and refresh your mind and body');
INSERT INTO `Recipes` (`code`, `name`, `description`) VALUES
(3,'Exhale', 'An exhilarating essential oil blend that renews and strengthens');
INSERT INTO `Recipes` (`code`, `name`, `description`) VALUES
(4,'Citrus Dream', 'For promoting a sense of calmness and positivity');
INSERT INTO `Recipes` (`code`, `name`, `description`) VALUES
(5,'Tranquility', 'For a deeper, more restful sleep');
INSERT INTO `Recipes` (`code`, `name`, `description`) VALUES
(6,'Unwind', 'Melt away stress and ease tension with this uplifting blend');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `Stock`;
CREATE TABLE `Stock` (
  `code` INT(2) NOT NULL,
  `name` TEXT NOT NULL,
  `description` TEXT NOT NULL,
  `quantity` INT(10) NOT NULL,
  `price` REAL NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `Stock` (`name`, `description`, `quantity`,`price`) VALUES
(0,'Refresh', 'Sharpen concentration, increase stamina, and revitalize your senses',0, 14.95);

INSERT INTO `Stock` (`name`, `description`, `quantity`,`price`) VALUES
(1,'Cloud Nine', 'Lift your spirits',0, 16.45);

INSERT INTO `Stock` (`name`, `description`, `quantity`,`price`) VALUES
(2,'Energy', 'Invigorate and refresh your mind and body',0, 18.45);

INSERT INTO `Stock` (`name`, `description`, `quantity`,`price`) VALUES
(3,'Exhale', 'An exhilarating essential oil blend that renews and strengthens',0, 12.95);

INSERT INTO `Stock` (`name`, `description`, `quantity`,`price`) VALUES
(4,'Citrus Dream', 'For promoting a sense of calmness and positivity',0, 16.95);

INSERT INTO `Stock` (`name`, `description`, `quantity`,`price`) VALUES
(5,'Tranquility', 'For a deeper, more restful sleep',0, 12.45);

INSERT INTO `Stock` (`name`, `description`, `quantity`,`price`) VALUES
(6,'Unwind', 'Melt away stress and ease tension with this uplifting blend',0,19.45);


--
-- Table structure for table `Recipe_Supply`
--

DROP TABLE IF EXISTS `Recipe_Supply`;
CREATE TABLE `Recipe_Supply` (
  `code` INT(2) NULL AUTO_INCREMENT,
  `supplyCode` INT(2) NOT NULL,
  `recipeCode` INT(2) NOT NULL,
  `amount` REAL NOT NULL,
  PRIMARY KEY (`code`),
  FOREIGN KEY (`supplyCode`) REFERENCES Supplies(`code`),
  FOREIGN KEY (`recipeCode`) REFERENCES Recipes(`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Recipe_Supply`
--

-- Refresh
-- Spearmint 1mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(11, 0, 1);
-- Lavendar 1mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(0, 0, 1);
-- Eucalyptus 1mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(1, 0, 1);
-- Lemon 1mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(2, 0, 1);
-- Rosewood .5mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(15, 0, .5);
-- Cedarwood .5mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(13, 0, .5);

-- Cloud Nine
-- Lavendar 2mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(0, 1, 2);
-- Ylang ylang 1mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(5, 1, 1);
-- Neroli 1mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(10, 1, 1);
-- Sandalwood 1mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(9, 1, 1);

-- Energy
-- Peppermint 1.5mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(8, 2, 1.5);
-- Rosemary 1mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(7, 2, 1);
-- Lemon 1mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(2, 2, 1);
-- Bergamot 1mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(12, 2, 1);
-- Basil .5mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(18, 2, .5);

-- Exhale
-- Eucalyptus 2mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(1, 3, 2);
-- Peppermint 1.5mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(8, 3, 1.5);
-- Rosemary 1mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(7, 3, 1);
-- Ginger .5mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(16, 3, .5);

-- Citrus Dream
-- Orange 2.5mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(3, 4, 2.5);
-- Grapefruit 1mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(4, 4, 1);
-- Lemon 1mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(2, 4, 1);
-- Neroli .5mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(10, 4, .5);

-- Tranquility
-- Orange 1.5mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(3, 5, 1.5);
-- Lavendar 1.5mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(0, 5, 1.5);
-- Marjoram 1mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(17, 5, 1);
-- Chamomille 1mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(14, 5, 1);

-- Unwind
-- Orange 2mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(3, 6, 2);
-- Lavendar 1.5mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(0, 6, 1.5);
-- Bergamot 1mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(12, 6, 1);
-- Geranium .5mL
INSERT INTO `Recipe_Supply` (`supplyCode`, `recipeCode`, `amount`) VALUES
(6, 6, .5);
