CREATE DATABASE IF NOT EXISTS `football_db`;
USE `football_db`;


CREATE TABLE IF NOT EXISTS `clubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `manager_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `clubs` (`id`, `name`, `manager_id`) VALUES
	(2, 'Juventus', 2),
	(3, 'Real Madrid', 3),
	(4, 'Manchester United', 6),
	(5, 'Barcelona', 5);

CREATE TABLE `listclubsandmanagers` (
	`name` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`first_name` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`last_name` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

CREATE TABLE `listclubsandstadiums` (
	`Stadium` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`Club` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

CREATE TABLE `listplayersandclubs` (
	`first_name` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`last_name` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`Club` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `managers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `manager2club` (`club_id`),
  CONSTRAINT `manager2club` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `managers` (`id`, `first_name`, `last_name`, `club_id`) VALUES
	(1, 'Julen', 'Lopetegui', 3),
	(2, 'Ernesto ', 'Valverde', 5),
	(3, 'Massimiliano ', 'Allegri', 2);

CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `manager2player` (`manager_id`),
  KEY `club2player` (`club_id`),
  CONSTRAINT `club2player` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `manager2player` FOREIGN KEY (`manager_id`) REFERENCES `managers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `players` (`id`, `first_name`, `last_name`, `manager_id`, `club_id`) VALUES
	(2, 'Cristiano', 'Ronaldo', NULL, 2),
	(3, 'Luis', 'Suarez', NULL, NULL),
	(4, 'Ivan', 'Rakitic', NULL, NULL),
	(5, 'Thibaut', 'Courtois', NULL, NULL),
	(6, 'Luka', 'Modric', NULL, 3),
	(7, 'Gareth', 'Bale', NULL, 3);

CREATE TABLE IF NOT EXISTS `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `home_id` int(11) NOT NULL,
  `away_id` int(11) NOT NULL,
  `winner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `results` (`id`, `home_id`, `away_id`, `winner_id`) VALUES
	(1, 1, 2, 1),
	(2, 1, 3, 1),
	(3, 3, 2, 2),
	(4, 3, 1, 3),
	(5, 2, 3, 3),
	(6, 2, 1, 2);

CREATE TABLE IF NOT EXISTS `stadiums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `club_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stadium2club` (`club_id`),
  CONSTRAINT `stadium2club` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `stadiums` (`id`, `name`, `club_id`) VALUES
	(1, 'Camp Nou', 5),
	(2, 'Juventus Stadium', 2),
	(3, 'Santiago Bernabeu', 3);

DROP TABLE IF EXISTS `listclubsandmanagers`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listclubsandmanagers` AS SELECT clubs.name, managers.first_name, managers.last_name FROM clubs
INNER JOIN managers ON managers.club_id = clubs.id ;

DROP TABLE IF EXISTS `listclubsandstadiums`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listclubsandstadiums` AS SELECT stadiums.name AS Stadium, clubs.name AS Club FROM stadiums
INNER JOIN clubs ON stadiums.club_id = clubs.id ;

DROP TABLE IF EXISTS `listplayersandclubs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listplayersandclubs` AS SELECT players.first_name, players.last_name, clubs.name AS Club FROM players
INNER JOIN clubs ON players.club_id = clubs.id ;