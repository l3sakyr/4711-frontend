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
-- Database: `recipes`
--
-- drop table recipes;
-- drop table ingredients;
-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `code` int(11) NOT NULL,
  `name` text,
  `description` text,
   PRIMARY KEY (`code`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `ingredients` (
  `icode` int(11) NOT NULL, 
  `code` int(11) NOT NULL, 
  `itemNum` text,
  `name` varchar(20),
  `amount` DECIMAL(7, 2) DEFAULT NULL,
  PRIMARY KEY (`icode`),
  FOREIGN KEY (`code`) REFERENCES `recipes` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`code`, `name`, `description`) VALUES
(0, 'Refresh', 'Sharpen concentration, increase stamina, and revitalize your senses');
INSERT INTO `recipes` (`code`, `name`, `description`) VALUES
(1, 'Cloud Nine', 'Lift your spirits');
INSERT INTO `recipes` (`code`, `name`, `description`) VALUES
(2, 'Energy', 'Invigorate and refresh your mind and body');
INSERT INTO `recipes` (`code`, `name`, `description`) VALUES
(3, 'Exhale', 'An exhilarating essential oil blend that renews and strengthens');
INSERT INTO `recipes` (`code`, `name`, `description`) VALUES
(4, 'Citrus Dream', 'For promoting a sense of calmness and positivity');
INSERT INTO `recipes` (`code`, `name`, `description`) VALUES
(5, 'Tranquility', 'For a deeper, more restful sleep');
INSERT INTO `recipes` (`code`, `name`, `description`) VALUES
(6, 'Unwind', 'Melt away stress and ease tension with this uplifting blend');


INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(0, 0, 'item1', 'Spearmint', 1);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(1, 0, 'item2', 'Lavendar', 1);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(2, 0, 'item3', 'Eucalyptus', 1);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(3, 0, 'item4', 'Lemon', 1);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(4, 0, 'item5', 'Rosewood', 0.5);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(5, 0, 'item6', 'Cedarwood', 0.5);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(6, 1, 'item1', 'Lavendar',2);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(7, 1, 'item2', 'Ylang ylang', 1);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(8, 1, 'item3', 'Neroli', 1);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(9, 1, 'item4', 'Sandalwood', 1);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(10, 2, 'item1', 'Peppermint', 1.5);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(11, 2, 'item2', 'Rosemary', 1);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(12, 2, 'item3', 'Lemon', 1);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(13, 2, 'item4', 'Bergamot', 1);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(14, 2, 'item5', 'Basil', 0.5);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(15, 3, 'item1', 'Eucalyptus', 2);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(16, 3, 'item2', 'Peppermint', 1.5);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(17, 3, 'item3', 'Rosemary', 1);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(18, 3, 'item4', 'Ginger', 5);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(19, 4, 'item1', 'Orange', 2.5);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(20, 4, 'item2', 'Grapefruit', 1);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(21, 4, 'item3', 'Lemon', 1);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(22, 4, 'item4', 'Neroli', 0.5);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(23, 5, 'item1', 'Orange', 1.5);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(24, 5, 'item2', 'Lavendar', 1.5);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(25, 5, 'item3', 'Marjoram', 1);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(26, 5, 'item4', 'Chamomile', 1);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(27, 6, 'item1', 'Orange', 2);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(28, 6, 'item2', 'Lavendar', 1.5);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(29, 6, 'item3', 'Bergamot', 1);
INSERT INTO `ingredients` (`icode`, `code`, `itemNum`, `name`, `amount`) VALUES
(30, 6, 'item4', 'Geranium', 5);


--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
--  ALTER TABLE `recipes`
--  ADD PRIMARY KEY (`code`);
/*
 ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`code`);
*/
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
-- ALTER TABLE `recipes`
--  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
/*
ALTER TABLE `ingredients`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
*/
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
