-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2017 a las 18:18:12
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
-- Estructura de tabla para la tabla `chats`
--

CREATE TABLE `chats` (
  `user1` varchar(30) CHARACTER SET utf8 NOT NULL,
  `user2` varchar(30) CHARACTER SET utf8 NOT NULL,
  `hour` varchar(50) CHARACTER SET utf8 NOT NULL,
  `msg` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '200 char max'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chats`
--

INSERT INTO `chats` (`user1`, `user2`, `hour`, `msg`) VALUES
('abanod', 'EvaHergar', '1496932986625', 'eres subnormal'),
('EvaHergar', 'abanod', '1496932980513', 'jamon'),
('EvaHergar', 'abanod', '1496932986621', 'pepe'),
('EvaHergar', 'abanod', '1496933139508', 'hola'),
('EvaHergar', 'abanod', '1496933145225', 'carapene'),
('EvaHergar', 'abanod', '1496933151006', 'cusca'),
('EvaHergar', 'abanod', '1496933158351', 'alberto puto amo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drivercomments`
--

CREATE TABLE `drivercomments` (
  `driverUsername` varchar(30) CHARACTER SET utf8 NOT NULL,
  `passUsername` varchar(30) CHARACTER SET utf8 NOT NULL,
  `comment` varchar(200) CHARACTER SET utf8 NOT NULL,
  `score` int(11) NOT NULL,
  `commentID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `drivercomments`
--

INSERT INTO `drivercomments` (`driverUsername`, `passUsername`, `comment`, `score`, `commentID`) VALUES
('abanod', 'eeeee', 'sdfghjk', 2, 0),
('abanod', 'EvaHergar', 'Es un falso y venenoso', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drivers`
--

CREATE TABLE `drivers` (
  `username` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT 'foreign key',
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `drivers`
--

INSERT INTO `drivers` (`username`, `score`) VALUES
('abanod', 0),
('pepeperas', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `journeypassengers`
--

CREATE TABLE `journeypassengers` (
  `journeyID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `journeypassengers`
--

INSERT INTO `journeypassengers` (`journeyID`, `username`) VALUES
(1, 'EvaHergar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `journeys`
--

CREATE TABLE `journeys` (
  `tripID` int(11) NOT NULL COMMENT 'foreign key',
  `journeyID` int(11) NOT NULL,
  `departureDate` varchar(50) NOT NULL,
  `arrivalDate` varchar(50) NOT NULL,
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `passengers`
--

CREATE TABLE `passengers` (
  `username` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `passengers`
--

INSERT INTO `passengers` (`username`) VALUES
('eeeee'),
('EvaHergar'),
('pepepepe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trips`
--

CREATE TABLE `trips` (
  `tripID` int(11) NOT NULL,
  `driverUsername` varchar(30) CHARACTER SET utf8 NOT NULL,
  `origin` varchar(40) CHARACTER SET utf8 NOT NULL,
  `destination` varchar(40) CHARACTER SET utf8 NOT NULL,
  `cancelled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trips`
--

INSERT INTO `trips` (`tripID`, `driverUsername`, `origin`, `destination`, `cancelled`) VALUES
(1, 'abanod', 'Leon', 'Madrid', 0),
(2, 'pepeperas', 'Oviedo', 'Sevilla', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(30) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `dni` varchar(9) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(9) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'img file name',
  `rol` int(11) NOT NULL COMMENT '0 passenger / 1 driver'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`username`, `pass`, `name`, `dni`, `email`, `phone`, `photo`, `rol`) VALUES
('abanod', 'caca', 'alberto', '123698547', 'caca@hotmail.es', '123456789', 'abanod.png', 1),
('eeeee', 'eeeee', 'Eeee', 'eeeeeeeee', 'eeeeeee', 'eeeeeee', 'eeeee.png', 0),
('EvaHergar', 'olakase', 'Eva', '74175369U', 'evahergar@gmail.com', '123456789', 'EvaHergar.png', 0),
('pepepepe', 'jamon', 'pepe', '123456789', 'jshsfdjh', '123456789', 'pepepepe.png', 0),
('pepeperas', 'pepe', 'pepe', 'dfghj', 'sdfgh', 'sdfghjhgf', 'pepeperas.png', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`user1`,`user2`,`hour`),
  ADD KEY `user2` (`user2`);

--
-- Indices de la tabla `drivercomments`
--
ALTER TABLE `drivercomments`
  ADD PRIMARY KEY (`commentID`),
  ADD UNIQUE KEY `commentID` (`commentID`),
  ADD KEY `driverUsername` (`driverUsername`),
  ADD KEY `passUsername` (`passUsername`);

--
-- Indices de la tabla `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `journeypassengers`
--
ALTER TABLE `journeypassengers`
  ADD PRIMARY KEY (`journeyID`,`username`),
  ADD KEY `username` (`username`);

--
-- Indices de la tabla `journeys`
--
ALTER TABLE `journeys`
  ADD PRIMARY KEY (`tripID`,`journeyID`),
  ADD KEY `journeyID` (`journeyID`);

--
-- Indices de la tabla `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`tripID`),
  ADD KEY `driverUsername` (`driverUsername`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `trips`
--
ALTER TABLE `trips`
  MODIFY `tripID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`user1`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`user2`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `drivercomments`
--
ALTER TABLE `drivercomments`
  ADD CONSTRAINT `drivercomments_ibfk_1` FOREIGN KEY (`driverUsername`) REFERENCES `drivers` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `drivercomments_ibfk_2` FOREIGN KEY (`passUsername`) REFERENCES `passengers` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `journeypassengers`
--
ALTER TABLE `journeypassengers`
  ADD CONSTRAINT `journeypassengers_ibfk_1` FOREIGN KEY (`username`) REFERENCES `passengers` (`username`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `journeypassengers_ibfk_2` FOREIGN KEY (`journeyID`) REFERENCES `journeys` (`journeyID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `journeys`
--
ALTER TABLE `journeys`
  ADD CONSTRAINT `journeys_ibfk_1` FOREIGN KEY (`tripID`) REFERENCES `trips` (`tripID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `passengers`
--
ALTER TABLE `passengers`
  ADD CONSTRAINT `passengers_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`driverUsername`) REFERENCES `drivers` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
