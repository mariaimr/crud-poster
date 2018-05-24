-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-07-2017 a las 21:19:58
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `post_ejercicio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `codigo` varchar(10) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripción` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Datos
--
INSERT INTO `post` (`codigo`, `titulo`, `descripción`, `escritor`) VALUES ('COD001', 'GoT', 'Serie HBO', 'escritor@correo.co');
INSERT INTO `post` (`codigo`, `titulo`, `descripción`, `escritor`) VALUES ('COD002', 'hola', 'xoxoxo', 'creador@correo.co');
INSERT INTO `post` (`codigo`, `titulo`, `descripción`, `escritor`) VALUES ('cdfr43', 'hola', 'hoaldnjdkdmkek', 'escritor@correo.co');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `nombre_rol` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Datos
--
INSERT INTO `rol` (`nombre_rol`) VALUES ('creador'), ('visualizador');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `correo` varchar(30) NOT NULL,
  `contrasenia` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `rol_fk` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Datos
--
INSERT INTO `usuario` (`correo`, `contrasenia`, `nombre`, `edad`, `rol_fk`) VALUES ('escritor@correo.co', 'escritor', 'Juanito', '24', 'creador');
INSERT INTO `usuario` (`correo`, `contrasenia`, `nombre`, `edad`, `rol_fk`) VALUES ('lector@correo.co', 'lector', 'maria', '23', 'visualizador');
INSERT INTO `usuario` (`correo`, `contrasenia`, `nombre`, `edad`, `rol_fk`) VALUES ('creador@correo.co', 'creador', 'pepito', '23', 'creador');
--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`nombre_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correo`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `escritor_fk` FOREIGN KEY (`codigo`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `rol_fk` FOREIGN KEY (`rol_fk`) REFERENCES `rol` (`nombre_rol`) ON DELETE CASCADE ON UPDATE CASCADE;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
