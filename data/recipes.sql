

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