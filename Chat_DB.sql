-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-11-2017 a las 21:44:56
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Chat_DB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `destinatario` varchar(100) NOT NULL,
  `remitente` varchar(100) NOT NULL,
  `fecha_actual` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id`, `mensaje`, `destinatario`, `remitente`, `fecha_actual`) VALUES
(1, 'Hola como estas', 'lan', 'nay', '2017-11-22 08:17:18'),
(2, 'Yo muy bien y tu?', 'nay', 'lan', '2017-11-10 11:35:42'),
(3, 'ahora que a haras', 'nay', 'lan', '2017-11-12 21:23:00'),
(4, 'parace que esta socupado', 'nay', 'lan', '2017-11-12 21:24:00'),
(5, 'creo que estas doteando', 'nay', 'lan', '2017-11-12 21:25:00'),
(6, 'si creo', 'nay', 'lan', '2017-11-12 21:26:00'),
(7, 'seee', 'nay', 'lan', '2017-11-12 21:27:00'),
(8, 'ya', 'nay', 'lan', '2017-11-12 21:28:00'),
(9, 'ok', 'nay', 'lan', '2017-11-12 21:28:00'),
(10, 'Hola chemito', 'chemo', 'lan', '2017-11-12 21:28:00'),
(11, 'hoy sale un dota?', 'chemo', 'lan', '2017-11-12 21:28:00'),
(12, 'si creo', 'sdf', 'lan', '2017-11-12 21:30:21'),
(13, 'yaya mas tarde', 'sdf', 'lan', '2017-11-12 21:30:28'),
(14, 'ok', 'lan', 'sdf', '2017-11-12 21:35:09'),
(15, 'yaya', 'lan', 'sdf', '2017-11-12 22:02:08'),
(16, 'ok', 'sdf', 'lan', '2017-11-12 22:02:51'),
(17, 'serio?', 'chemo', 'lan', '2017-11-12 22:03:09'),
(18, 'que tal', 'lan', 'chemo', '2017-11-12 22:03:40'),
(19, 'si creo', 'lan', 'chemo', '2017-11-12 22:15:59'),
(20, 'ire a doteat', 'lan', 'chemo', '2017-11-12 22:18:24'),
(21, 'ya man', 'chemo', 'lan', '2017-11-12 22:30:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `nombres`, `apellidos`, `password`) VALUES
(1, 'lan', 'bryan', 'masca', 'contrasenia123'),
(2, 'nay', 'nayda', 'taco', 'naydita123'),
(3, 'sdf', '', '', 'sdf'),
(4, 'chemo', 'julio', 'apaza', 'xhemox123'),
(5, 'the beast', 'mario', 'ordoÃ±ez', '123456'),
(6, 'flex', 'eber', 'mamani', 'conde'),
(7, 'sss', 'sss', 'ssss', '123'),
(8, 'cema', 'yasmith', 'pino', 'terzi'),
(9, 'juan', 'mama', 'msms', 'mama');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
