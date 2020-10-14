-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2020 a las 16:09:17
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

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
  `nombreC` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombreC`, `img`) VALUES
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
(1, 'Liquidación mensual y anual de tributos\r\n', 1, 150, 'Control integral del estado de cumplimiento impositivo'),
(2, 'Preparación de Estados Contables\r\n', 2, 1550, 'Armado y Confección de Estados Contables Auditados o Certificados y legalizados en el Consejo Profesional de Ciencias Económicas correspondiente.'),
(3, 'Liquidación de sueldos, jornales y cargas sociales\r\n', 3, 220, 'Liquidación de Haberes; F. 931 y Planilla de aportes Sindicales; Convenios Colectivos de Trabajo.'),
(55, 'Monotributistas', 1, 100, 'Asesoramiento y atención a Monotributistas, liquidaciones.'),
(60, 'Auditoría de Estados Contables.', 2, 200, 'Auditoria sobre estados contables anuales, o de periodos intermedios.'),
(61, 'Determinación del encuadre societario apropiado para su empresa', 4, 1500, 'Elegir el tipo societario adecuado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `pass`, `isAdmin`) VALUES
(1, 'admin', '$2y$10$R6jemoaOkkuCQoKq1t9FZ.yN3T9EvqHGAl0eZQjN/bIASZGPueisi', 1),
(22, 'invitado', '$2y$10$R6jemoaOkkuCQoKq1t9FZ.yN3T9EvqHGAl0eZQjN/bIASZGPueisi', 0);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria_fk` (`id_categoria_fk`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=452;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`id_categoria_fk`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
