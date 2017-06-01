-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Servidor: sql11.freemysqlhosting.net
-- Tiempo de generación: 01-06-2017 a las 11:36:44
-- Versión del servidor: 5.5.53-0ubuntu0.14.04.1
-- Versión de PHP: 5.3.28

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sql11176712`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Chats`
--

CREATE TABLE IF NOT EXISTS `Chats` (
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `hour` varchar(10) NOT NULL,
  `msg` varchar(200) NOT NULL COMMENT '200 char max',
  PRIMARY KEY (`user1`,`user2`,`hour`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Drivers`
--

CREATE TABLE IF NOT EXISTS `Drivers` (
  `username` varchar(30) NOT NULL COMMENT 'foreign key',
  `score` int(11) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Journeys`
--

CREATE TABLE IF NOT EXISTS `Journeys` (
  `tripID` int(11) NOT NULL COMMENT 'foreign key',
  `journeyID` int(11) NOT NULL,
  `hour` varchar(5) NOT NULL COMMENT 'format: "##:##"',
  `cost` int(11) NOT NULL,
  `nSeats` int(11) NOT NULL,
  `origin` varchar(40) NOT NULL,
  `destination` varchar(40) NOT NULL,
  PRIMARY KEY (`tripID`,`journeyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Passengers`
--

CREATE TABLE IF NOT EXISTS `Passengers` (
  `username` varchar(30) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Trips`
--

CREATE TABLE IF NOT EXISTS `Trips` (
  `tripID` int(11) NOT NULL AUTO_INCREMENT,
  `driverUsername` varchar(30) NOT NULL COMMENT 'foreign key',
  `origin` varchar(40) NOT NULL,
  `destination` varchar(40) NOT NULL,
  `totalAmount` int(11) NOT NULL,
  PRIMARY KEY (`tripID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `username` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(9) NOT NULL,
  `photo` varchar(1000) NOT NULL COMMENT 'src path to img',
  `rol` int(11) NOT NULL COMMENT '0 passenger / 1 driver',
  PRIMARY KEY (`username`),
  UNIQUE KEY `dni` (`dni`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
