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

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--
DROP TABLE supplies;
CREATE TABLE `supplies` (
  `code` INT(2) NOT NULL,
  `name` TEXT,
  `description` TEXT,
  `receiving_unit` TEXT,
  `receiving_cost` TEXT,
  `stocking_unit` TEXT,
  `quantity` INT(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(0, 'Lavendar', 'Lavendar oil', 'case of 12 bottles', '$30', '5mL bottles', 6);

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(1, 'Eucalyptus', 'Eucalyptus oil', 'case of 10 bottles', '$35', '5mL bottles', 6);

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(2, 'Lemon', 'Lemon oil', 'case of 12 bottles', '$30', '5mL bottles', 6);

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(3, 'Orange', 'Orange oil', 'case of 8 bottles', '$40', '5mL bottles', 6);

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(4, 'Grapefruit', 'Grapefruit oil', 'case of 10 bottles', '$25', '5mL bottles', 6);

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(5, 'Ylang ylang', 'Ylang ylang oil', 'case of 12 bottles', '$30', '5mL bottles', 6);

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(6, 'Geranium', 'Geranium oil', 'case of 10 bottles', '$30', '5mL bottles', 6);

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(7, 'Rosemary', 'Rosemary oil', 'case of 14 bottles', '$50', '5mL bottles', 6);

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(8, 'Peppermint', 'Peppermint oil', 'case of 12 bottles', '$28', '5mL bottles', 6);

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(9, 'Sandalwood', 'Sandalwood oil', 'case of 10 bottles', '$50', '5mL bottles', 6);

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(10, 'Neroli', 'Neroli oil', 'case of 12 bottles', '$42', '5mL bottles', 6);

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(11, 'Spearmint', 'Spearmint oil', 'case of 8 bottles', '$50', '5mL bottles', 6);

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(12, 'Bergamot', 'Bergamot oil', 'case of 12 bottles', '$50', '5mL bottles', 6);

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(13, 'Cedarwood', 'Cedarwood oil', 'case of 8 bottles', '$38', '5mL bottles', 6);

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(14, 'Chamomile', 'Chamomile oil', 'case of 8 bottles', '$26', '5mL bottles', 6);

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(15, 'Rosewood', 'Rosewood oil', 'case of 8 bottles', '$52', '5mL bottles', 6);

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(16, 'Ginger', 'Ginger oil', 'case of 12 bottles', '$32', '5mL bottles', 6);

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(17, 'Marjoram', 'Marjoram oil', 'case of 12 bottles', '$30', '5mL bottles', 6);

INSERT INTO `supplies` (`code`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stocking_unit`, `quantity`) VALUES
(18, 'Basil', 'Basil oil', '10', '$42', '5mL bottles', 6);


--
-- Indexes for dumped tables
--


--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
--
--
--
-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

DROP TABLE recipes;
CREATE TABLE `recipes` (
  `code` INT(2) NOT NULL,
  `name` TEXT,
  `description` TEXT,
  `ingredients` TEXT,
  `item1` TEXT,
  `item2` TEXT,
  `item3` TEXT,
  `item4` TEXT,
  `item5` TEXT,
  `item6` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`code`, `name`, `description`, `ingredients`) VALUES
(0, 'Refresh', 'Sharpen concentration, increase stamina, and revitalize your senses', "" );



--
-- Indexes for dumped tables
--


--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `code` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
--
--
--




-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE stock;
CREATE TABLE `stock` (
  `code` INT(2) NOT NULL,
  `name` TEXT,
  `description` TEXT,
  `quantity` INT(10) DEFAULT NULL,
  `price` TEXT

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`code`, `name`, `description`, `quantity`, `price`) VALUES
(0, 'Refresh', 'Sharpen concentration, increase stamina, and revitalize your senses', 4, '$14.95');

INSERT INTO `stock` (`code`, `name`, `description`, `quantity`, `price`) VALUES
(1, 'Cloud Nine', 'Lift your spirits', 7, '$16.45');

INSERT INTO `stock` (`code`, `name`, `description`, `quantity`, `price`) VALUES
(2, 'Energy', 'Invigorate and refresh your mind and body', 5, '$18.45');

INSERT INTO `stock` (`code`, `name`, `description`, `quantity`, `price`) VALUES
(3, 'Exhale', 'An exhilarating essential oil blend that renews and strengthens', 4, '$12.95');

INSERT INTO `stock` (`code`, `name`, `description`, `quantity`, `price`) VALUES
(4, 'Citrus Dream', 'For promoting a sense of calmness and positivity', 9, '$16.95');

INSERT INTO `stock` (`code`, `name`, `description`, `quantity`, `price`) VALUES
(5, 'Tranquility', 'For a deeper, more restful sleep', 5, '$12.45');

INSERT INTO `stock` (`code`, `name`, `description`, `quantity`, `price`) VALUES
(6, 'Unwind', 'Melt away stress and ease tension with this uplifting blend', 7, '$19.45');

--
-- Indexes for dumped tables
--


--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
--
--
--