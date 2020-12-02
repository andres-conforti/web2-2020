-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2020 a las 22:31:53
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
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `img`) VALUES
(1, 'Asesoramiento Impositivo\r\n', '5fc59216cf79f.png'),
(2, 'Asesoramiento Contable\r\n', '5fc804569e0dd.png'),
(3, 'Sociedades', '5fc80469ef9d2.png'),
(4, 'Sueldos', '5fc8075bbc2b0.png'),
(5, 'categoria 5', NULL),
(6, 'categoria 6', NULL),
(457, 'categoria 7', NULL),
(458, 'categoria 8', '5fc35a8604387.jpg'),
(459, 'categoria 9', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(255) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `puntaje` tinyint(4) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_servicio` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `texto`, `puntaje`, `id_user`, `id_servicio`) VALUES
(3, 'test comentario', 5, 25, 1),
(25, 'prueba 1', 5, 25, 1),
(34, 'hola?', 5, 26, 1);

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
(1, 'impositivo 1', 1, 150, 'Control integral del estado de cumplimiento impositivo'),
(2, 'contable 1', 2, 1550, 'Armado y Confección de Estados Contables Auditados o Certificados y legalizados en el Consejo Profesional de Ciencias Económicas correspondiente.'),
(55, 'impositivo 2', 1, 100, 'Asesoramiento y atención a Monotributistas, liquidaciones.'),
(60, 'contable 2', 2, 200, 'Auditoria sobre estados contables anuales, o de periodos intermedios.'),
(61, 'sociedades 1', 3, 1500, 'Elegir el tipo societario adecuado'),
(80, 'test', 6, 100, 'xqeetvby5num6'),
(81, 'prueba 1', 4, 123123, 'asdasda safs a fa sfa fa'),
(83, 'impositivo 3', 1, 22323, 'aasdasd'),
(84, 'asdasdasd', 458, 213123, 'adasdasd');

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
(22, 'invitado', '$2y$10$R6jemoaOkkuCQoKq1t9FZ.yN3T9EvqHGAl0eZQjN/bIASZGPueisi', 0),
(25, 'andres', '$2y$10$R6jemoaOkkuCQoKq1t9FZ.yN3T9EvqHGAl0eZQjN/bIASZGPueisi', 0),
(26, 'nombresuperlargocalifrastilisticoespialidoso', '$2y$10$R6jemoaOkkuCQoKq1t9FZ.yN3T9EvqHGAl0eZQjN/bIASZGPueisi', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_servicio` (`id_servicio`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=460;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`id_categoria_fk`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
