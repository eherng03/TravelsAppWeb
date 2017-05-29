-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Servidor: sql11.freemysqlhosting.net
-- Tiempo de generación: 27-05-2017 a las 00:05:48
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
-- Estructura de tabla para la tabla `Destinations`
--

CREATE TABLE IF NOT EXISTS `Destinations` (
  `city` varchar(15) NOT NULL,
  `price` int(11) NOT NULL,
  `arrivalTime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Drivers`
--

CREATE TABLE IF NOT EXISTS `Drivers` (
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `telephone` varchar(9) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `photo` varchar(1000) NOT NULL COMMENT 'Photo = image src in localhost',
  `averageScore` int(11) NOT NULL,
  PRIMARY KEY (`dni`),
  UNIQUE KEY `dni` (`dni`),
  UNIQUE KEY `dni_2` (`dni`),
  UNIQUE KEY `dni_3` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DriversJourneys`
--

CREATE TABLE IF NOT EXISTS `DriversJourneys` (
  `driverDni` int(11) NOT NULL,
  `journeyId` int(11) NOT NULL,
  PRIMARY KEY (`driverDni`,`journeyId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Links each driver with its journeys';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Journeys`
--

CREATE TABLE IF NOT EXISTS `Journeys` (
  `source` int(11) NOT NULL,
  `initDate` date NOT NULL,
  `seatsNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Each journey is composed of 1 or more destinations';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `JourneysDestinations`
--

CREATE TABLE IF NOT EXISTS `JourneysDestinations` (
  `journeyId` int(11) NOT NULL,
  `destinationId` int(11) NOT NULL,
  PRIMARY KEY (`journeyId`,`destinationId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `JourneysPassengers`
--

CREATE TABLE IF NOT EXISTS `JourneysPassengers` (
  `journeyId` int(11) NOT NULL,
  `passengerDni` int(11) NOT NULL,
  PRIMARY KEY (`journeyId`,`passengerDni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Links each journey with its passengers';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Passengers`
--

CREATE TABLE IF NOT EXISTS `Passengers` (
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `telephone` varchar(9) NOT NULL,
  `dni` int(9) NOT NULL,
  `photo` varchar(1000) NOT NULL COMMENT 'Photo = image src in localhost',
  PRIMARY KEY (`dni`),
  UNIQUE KEY `dni` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Each passenger can have several journeys linked with it';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
