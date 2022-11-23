DROP DATABASE IF EXISTS `boomgaarde`;

CREATE DATABASE `boomgaarde`;

USE `boomgaarde`;

CREATE TABLE IF NOT EXISTS `boom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rasnaam` varchar(200) NOT NULL,
  `soort` varchar(200) NOT NULL,
  `aantal` int NOT NULL,
  `tijdvak` varchar(200) NOT NULL,
  `tijdcheck` int NOT NULL,
  `latitude` DOUBLE DEFAULT 0,
  `longitude` DOUBLE DEFAULT 0,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;