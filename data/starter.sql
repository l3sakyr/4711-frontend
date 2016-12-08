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

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--
DROP TABLE IF EXISTS `Supplies`;
CREATE TABLE `Supplies` (
  `code` INT(2) NOT NULL,
  `name` TEXT,
  `description` TEXT,
  `receiving_unit` TEXT,
  `receiving_cost` REAL,
  `stocking_unit` TEXT,
  `quantity` INT(10) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplies`
--

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(0, 'Lavendar', 'Lavendar oil', 'case of 12 bottles', '$30', '5mL bottles', 6);

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(1, 'Eucalyptus', 'Eucalyptus oil', 'case of 10 bottles', '$35', '5mL bottles', 6);

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(2, 'Lemon', 'Lemon oil', 'case of 12 bottles', '$30', '5mL bottles', 6);

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(3, 'Orange', 'Orange oil', 'case of 8 bottles', '$40', '5mL bottles', 6);

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(4, 'Grapefruit', 'Grapefruit oil', 'case of 10 bottles', '$25', '5mL bottles', 6);

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(5, 'Ylang ylang', 'Ylang ylang oil', 'case of 12 bottles', '$30', '5mL bottles', 6);

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(6, 'Geranium', 'Geranium oil', 'case of 10 bottles', '$30', '5mL bottles', 6);

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(7, 'Rosemary', 'Rosemary oil', 'case of 14 bottles', '$50', '5mL bottles', 6);

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(8, 'Peppermint', 'Peppermint oil', 'case of 12 bottles', '$28', '5mL bottles', 6);

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(9, 'Sandalwood', 'Sandalwood oil', 'case of 10 bottles', '$50', '5mL bottles', 6);

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(10, 'Neroli', 'Neroli oil', 'case of 12 bottles', '$42', '5mL bottles', 6);

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(11, 'Spearmint', 'Spearmint oil', 'case of 8 bottles', '$50', '5mL bottles', 6);

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(12, 'Bergamot', 'Bergamot oil', 'case of 12 bottles', '$50', '5mL bottles', 6);

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(13, 'Cedarwood', 'Cedarwood oil', 'case of 8 bottles', '$38', '5mL bottles', 6);

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(14, 'Chamomile', 'Chamomile oil', 'case of 8 bottles', '$26', '5mL bottles', 6);

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(15, 'Rosewood', 'Rosewood oil', 'case of 8 bottles', '$52', '5mL bottles', 6);

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(16, 'Ginger', 'Ginger oil', 'case of 12 bottles', '$32', '5mL bottles', 6);

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(17, 'Marjoram', 'Marjoram oil', 'case of 12 bottles', '$30', '5mL bottles', 6);

INSERT INTO `Supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(18, 'Basil', 'Basil oil', '10', '$42', '5mL bottles', 6);


--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `Supplies`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
--
--
--
-- --------------------------------------------------------


DROP TABLE IF EXISTS `Recipes`;
CREATE TABLE `recipes` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `description` text,
   PRIMARY KEY (`code`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`name`, `description`) VALUES
('Refresh', 'Sharpen concentration, increase stamina, and revitalize your senses');
INSERT INTO `recipes` (`name`, `description`) VALUES
('Cloud Nine', 'Lift your spirits');
INSERT INTO `recipes` (`name`, `description`) VALUES
('Energy', 'Invigorate and refresh your mind and body');
INSERT INTO `recipes` (`name`, `description`) VALUES
('Exhale', 'An exhilarating essential oil blend that renews and strengthens');
INSERT INTO `recipes` (`name`, `description`) VALUES
('Citrus Dream', 'For promoting a sense of calmness and positivity');
INSERT INTO `recipes` (`name`, `description`) VALUES
('Tranquility', 'For a deeper, more restful sleep');
INSERT INTO `recipes` (`name`, `description`) VALUES
('Unwind', 'Melt away stress and ease tension with this uplifting blend');



CREATE TABLE `ingredients` (
  `icode` int(11) NOT NULL AUTO_INCREMENT, 
  `code` int(11) NOT NULL, 
  `name` varchar(20),
  `amount` DECIMAL(7, 2) DEFAULT NULL,
  PRIMARY KEY (`icode`),
  FOREIGN KEY (`code`) REFERENCES `recipes` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(1,'Spearmint', 1);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(1,'Lavendar', 1);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(1,'Eucalyptus', 1);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(1,'Lemon', 1);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(1,'Rosewood', 0.5);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(1,'Cedarwood', 0.5);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(2,'Lavendar',2);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(2,'Ylang ylang', 1);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(2,'Neroli', 1);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(2,'Sandalwood', 1);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(3,'Peppermint', 1.5);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(3,'Rosemary', 1);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(3,'Lemon', 1);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(3,'Bergamot', 1);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(3,'Basil', 0.5);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(4,'Eucalyptus', 2);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(4,'Peppermint', 1.5);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(4,'Rosemary', 1);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(4,'Ginger', 5);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(5,'Orange', 2.5);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(5,'Grapefruit', 1);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(5,'Lemon', 1);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(5,'Neroli', 0.5);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(6,'Orange', 1.5);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(6,'Lavendar', 1.5);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(6,'Marjoram', 1);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(6,'Chamomile', 1);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(7,'Orange', 2);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(7,'Lavendar', 1.5);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(7,'Bergamot', 1);
INSERT INTO `ingredients` (`code`, `name`, `amount`) VALUES
(7,'Geranium', 5);
-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `Stock`;
CREATE TABLE `Stock` (
  `code` INT(2) NOT NULL,
  `name` TEXT,
  `description` TEXT,
  `quantity` INT(10) DEFAULT NULL,
  `price` REAL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `Stock` (`code`, `name`, `description`, `quantity`, `price`) VALUES
(0, 'Refresh', 'Sharpen concentration, increase stamina, and revitalize your senses', 4, 14.95);

INSERT INTO `Stock` (`code`, `name`, `description`, `quantity`, `price`) VALUES
(1, 'Cloud Nine', 'Lift your spirits', 7, 16.45);

INSERT INTO `Stock` (`code`, `name`, `description`, `quantity`, `price`) VALUES
(2, 'Energy', 'Invigorate and refresh your mind and body', 5, 18.45);

INSERT INTO `Stock` (`code`, `name`, `description`, `quantity`, `price`) VALUES
(3, 'Exhale', 'An exhilarating essential oil blend that renews and strengthens', 4, 12.95);

INSERT INTO `Stock` (`code`, `name`, `description`, `quantity`, `price`) VALUES
(4, 'Citrus Dream', 'For promoting a sense of calmness and positivity', 9, 16.95);

INSERT INTO `Stock` (`code`, `name`, `description`, `quantity`, `price`) VALUES
(5, 'Tranquility', 'For a deeper, more restful sleep', 5, 12.45);

INSERT INTO `Stock` (`code`, `name`, `description`, `quantity`, `price`) VALUES
(6, 'Unwind', 'Melt away stress and ease tension with this uplifting blend', 7, 19.45);

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `Stock`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
--
--
--
--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `Recipe_Supply`;
CREATE TABLE `Recipe_Supply` (
  `code` INT(2) NOT NULL,
  `supplyCode` INT(2) NOT NULL,
  `recipeCode` INT(2) NOT NULL,
  `amount` REAL NOT NULL,
  PRIMARY KEY (`code`),
  FOREIGN KEY (`supplyCode`) REFERENCES Supplies(`code`),
  FOREIGN KEY (`recipeCode`) REFERENCES Recipes(`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `Recipe_Supply` (`code`, `supplyCode`, `recipeCode`, `amount`) VALUES(0, 13, 0, .5);

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `Recipe_Supply`
  MODIFY `code` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
--
--
--
