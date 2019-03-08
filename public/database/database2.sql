-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2018 a las 19:13:21
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica`
--

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_log` (IN `usuario` VARCHAR(100), IN `perfil` VARCHAR(20), IN `actividad` TEXT) NO SQL
INSERT INTO log VALUES (usuario, perfil, NOW(), actividad);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `usuario` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `perfil` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `actividad` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`usuario`, `perfil`, `fecha`, `actividad`) VALUES
('pjleonmartin', 'Administrador', '2018-12-15 00:00:00', 'Alta'),
('pjleonmartin', 'Administrador', '2018-12-15 19:53:39', 'Alta'),
('pjleonmartin', 'Administrador', '2018-12-15 19:57:45', 'Baja'),
('pjleonmartin', 'Administrador', '2018-12-15 20:10:02', 'Baja'),
('pjleonmartin', 'Administrador', '2018-12-15 20:22:32', 'Inicio de sesión'),
('pjleonmartin', 'Administrador', '2018-12-15 21:20:40', 'Inicio de sesión'),
('pjleonmartin', 'Administrador', '2018-12-15 23:41:46', 'Inicio de sesión'),
('pjleonmartin', 'Administrador', '2018-12-15 23:44:54', 'Inicio de sesión'),
('pjleonmartin', 'Administrador', '2018-12-16 00:18:04', 'Modificación'),
('pjleonmartin', 'Administrador', '2018-12-16 00:21:03', 'Modificación'),
('pjleonmartin', 'Administrador', '2018-12-16 00:26:47', 'Modificación'),
('pjleonmartin', 'Administrador', '2018-12-16 00:28:54', 'Modificación'),
('pjleonmartin', 'Administrador', '2018-12-16 00:29:02', 'Modificación'),
('pjleonmartin', 'Administrador', '2018-12-16 00:31:22', 'Modificación'),
('pjleonmartin', 'Administrador', '2018-12-16 00:31:41', 'Modificación'),
('pjleonmartin', 'Administrador', '2018-12-16 00:31:46', 'Modificación'),
('pjleonmartin', 'Administrador', '2018-12-16 00:33:41', 'Modificación'),
('pjleonmartin', 'Administrador', '2018-12-16 00:34:00', 'Modificación'),
('maria', 'Profesor', '2018-12-16 00:39:05', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-16 00:39:46', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-16 00:41:12', 'Modificación'),
('maria', 'Administrador', '2018-12-16 00:41:21', 'Modificación'),
('maria', 'Administrador', '2018-12-16 01:33:35', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-16 01:43:50', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-16 02:23:05', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-16 02:59:37', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-16 03:01:34', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-16 18:53:20', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-16 19:34:00', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-16 20:00:28', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-16 21:06:37', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-16 21:49:04', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-16 21:56:00', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-16 22:19:48', 'Modificación'),
('maria', 'Administrador', '2018-12-16 22:21:28', 'Modificación'),
('maria', 'Administrador', '2018-12-16 22:24:04', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-16 22:38:06', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-16 23:27:20', 'Alta'),
('pedro', 'Profesor', '2018-12-16 23:27:49', 'Inicio de sesión'),
('pedro', 'Administrador', '2018-12-16 23:27:59', 'Modificación'),
('pedro', 'Administrador', '2018-12-16 23:28:21', 'Modificación'),
('pedro', '', '2018-12-16 23:29:07', 'Inicio de sesión'),
('pedro', 'Administrador', '2018-12-16 23:29:15', 'Modificación'),
('pedro', 'Administrador', '2018-12-16 23:30:56', 'Modificación'),
('pedro', 'Administrador', '2018-12-16 23:31:04', 'Modificación'),
('maria', 'Administrador', '2018-12-16 23:33:59', 'Inicio de sesión'),
('pedro', '', '2018-12-16 23:34:45', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-16 23:35:37', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-16 23:37:22', 'Alta'),
('pedro', 'Profesor', '2018-12-16 23:38:33', 'Inicio de sesión'),
('pedro', 'Administrador', '2018-12-16 23:38:41', 'Modificación'),
('pedro', '', '2018-12-16 23:41:46', 'Inicio de sesión'),
('pedro', 'Profesor', '2018-12-16 23:45:40', 'Inicio de sesión'),
('pedro', 'Administrador', '2018-12-16 23:46:25', 'Modificación'),
('pedro', 'Profesor', '2018-12-16 23:48:56', 'Inicio de sesión'),
('pedro', 'Administrador', '2018-12-16 23:49:07', 'Modificación'),
('pedro', 'Administrador', '2018-12-16 23:49:25', 'Modificación'),
('pedro', 'Administrador', '2018-12-16 23:49:32', 'Modificación'),
('maria', 'Administrador', '2018-12-16 23:58:03', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 01:03:11', 'Alta'),
('angel', 'Profesor', '2018-12-17 01:04:30', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 01:04:38', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 01:31:22', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 01:44:05', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 01:57:33', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 01:59:13', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 01:59:33', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 02:01:18', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 02:01:49', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 02:05:08', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 02:05:54', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 02:06:15', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 02:06:41', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 02:08:30', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 02:09:48', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 02:09:57', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 02:10:27', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 02:35:51', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 02:45:26', 'Inicio de sesión'),
('pedro', 'Profesor', '2018-12-17 02:46:40', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 03:36:03', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 03:46:14', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 03:47:41', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 03:48:44', 'Alta'),
('maria', 'Administrador', '2018-12-17 03:49:30', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 03:53:58', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 03:55:46', 'Alta'),
('maria', 'Administrador', '2018-12-17 03:57:03', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 03:57:32', 'Alta'),
('hola', 'Profesor', '2018-12-17 04:01:47', 'Inicio de sesión'),
('hola', 'Profesor', '2018-12-17 16:15:06', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 16:16:06', 'Inicio de sesión'),
('hola', 'Profesor', '2018-12-17 16:16:54', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 16:18:18', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 16:33:19', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 17:23:54', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 18:21:45', 'Inicio de sesión'),
('maria', 'Administrador', '2018-12-17 18:37:03', 'Eliminar Mensaje'),
('maria', 'Administrador', '2018-12-17 18:37:09', 'Eliminar Mensaje'),
('maria', 'Administrador', '2018-12-17 18:37:16', 'Eliminar Mensaje'),
('maria', 'Administrador', '2018-12-17 18:37:19', 'Eliminar Mensaje'),
('maria', 'Administrador', '2018-12-17 18:38:29', 'Eliminar Mensaje'),
('maria', 'Administrador', '2018-12-17 18:38:56', 'Eliminar Mensaje'),
('maria', 'Administrador', '2018-12-17 18:39:41', 'Eliminar Mensaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL,
  `remitente` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechahora` datetime NOT NULL,
  `destinatario` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `NIF` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido1` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido2` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fotografia` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `user` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `movil` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fijo` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `web` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `blog` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `twitter` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `fechasolicitud` date NOT NULL,
  `asignaturas` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`NIF`, `nombre`, `apellido1`, `apellido2`, `fotografia`, `user`, `password`, `perfil`, `movil`, `fijo`, `email`, `departamento`, `web`, `blog`, `twitter`, `activo`, `fechasolicitud`, `asignaturas`) VALUES
('29050486Z', 'Ángel', 'Pérez', 'López', '', 'angel', 'e624512f691b43e691bde0131bb79e0d', 'Profesor', '734652341', '', 'angel@outlook.es', 'Administración y Finanzas', '', '', '', 0, '2018-12-17', ''),
('49549424H', 'María', 'Leona', '', '', 'hola', 'e624512f691b43e691bde0131bb79e0d', 'Profesor', '722345623', '', 'lucia@yahoo.es', 'Informática', '', '', '', 1, '2018-12-17', ''),
('49549424H', 'h', 'h', 'h', '', 'mama', 'e624512f691b43e691bde0131bb79e0d', 'Profesor', '722334455', '', 'h@h.com', 'Informática', '', '', '', 0, '2018-12-17', ''),
('49549424H', 'Pepa', 'Suárez', 'Martínez', '', 'maria', 'e624512f691b43e691bde0131bb79e0d', 'Administrador', '745632412', '', 'maria@yahoo.es', 'Informática', '', '', 'mariaperez', 1, '2018-12-16', ''),
('29798299M', 'mANUEL', 'Leon', 'Martin', '', 'pedro', 'e624512f691b43e691bde0131bb79e0d', 'Profesor', '733445566', '', 'pedro@outlook.es', 'Administración y Finanzas', '', '', '', 1, '2018-12-16', ''),
('49549424H', 'hola', 'hola', 'hola', '', 'root', 'e624512f691b43e691bde0131bb79e0d', 'Administrador', '722334455', '', 'hola@yahoo.es', 'Informática', '', '', '', 0, '2018-12-17', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
