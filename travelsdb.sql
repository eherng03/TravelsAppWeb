-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2017 a las 12:36:48
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `travelsdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `journeys`
--

CREATE TABLE `journeys` (
  `tripID` int(11) NOT NULL COMMENT 'foreign key',
  `journeyID` int(11) NOT NULL,
  `departureDate` varchar(11) NOT NULL,
  `arrivalDate` varchar(11) NOT NULL,
  `price` int(11) NOT NULL,
  `nSeats` int(11) NOT NULL,
  `origin` varchar(40) CHARACTER SET utf8 NOT NULL,
  `destination` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `journeys`
--

INSERT INTO `journeys` (`tripID`, `journeyID`, `departureDate`, `arrivalDate`, `price`, `nSeats`, `origin`, `destination`) VALUES
(1, 1, '06/06/2017', '06/06/2017', 20, 3, 'Leon', 'Valladolid'),
(1, 2, '06/062017', '06/06/2017', 20, 3, 'Valladolid', 'Madrid'),
(2, 0, '03/06/2017', '03/06/2017', 10, 3, 'Oviedo', 'Zamora');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `journeys`
--
ALTER TABLE `journeys`
  ADD PRIMARY KEY (`tripID`,`journeyID`),
  ADD KEY `journeyID` (`journeyID`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `journeys`
--
ALTER TABLE `journeys`
  ADD CONSTRAINT `journeys_ibfk_1` FOREIGN KEY (`tripID`) REFERENCES `trips` (`tripID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
