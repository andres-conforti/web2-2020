-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2020 a las 03:35:28
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estudio_perez`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `img`) VALUES
(1, 'Asesoramiento Impositivo\r\n', 'impuestos.png'),
(2, 'Asesoramiento Contable\r\n', 'conta.png'),
(3, 'Liquidacion del sueldos y jornales\r\n', 'sueldos.png'),
(4, 'Sociedades', 'soc.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `id_categoria_fk` int(11) NOT NULL,
  `honorarios` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `nombre`, `id_categoria_fk`, `honorarios`, `descripcion`) VALUES
(1, 'Liquidación mensual y anual de tributos\r\n', 1, 150, 'esta es la descripcion'),
(2, 'Preparación de Estados Contables\r\n', 2, 0, ''),
(3, 'Liquidación de sueldos, jornales y cargas sociales\r\n', 3, 0, ''),
(4, 'Determinación del encuadre societario apropiado para su empresa\r\n\r\n', 4, 0, ''),
(55, '1 LOREM IPSUM HOLA QUE TAL ASDASDASD', 1, 0, ''),
(56, '2 LOREM IPSUM HOLA QUE TAL ASDASDASD', 1, 0, ''),
(57, '3 LOREM IPSUM HOLA QUE TAL ASDASDASD', 4, 0, ''),
(58, '4 LOREM IPSUM HOLA QUE TAL ASDASDASD', 1, 0, ''),
(59, '6 LOREM IPSUM HOLA QUE TAL ASDASDASD', 3, 0, ''),
(60, '15 LOREM IPSUM HOLA QUE TAL ASDASDASD', 2, 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=445;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
