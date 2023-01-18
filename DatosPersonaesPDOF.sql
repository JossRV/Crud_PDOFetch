-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-01-2023 a las 07:29:52
-- Versión del servidor: 10.5.18-MariaDB-0+deb11u1
-- Versión de PHP: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Crud_PDO`
--
CREATE DATABASE IF NOT EXISTS `Crud_PDO` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Crud_PDO`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_persona`
--

CREATE TABLE `t_persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellidoP` varchar(250) DEFAULT NULL,
  `apellidoM` varchar(250) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_persona`
--

INSERT INTO `t_persona` (`id_persona`, `nombre`, `apellidoP`, `apellidoM`, `edad`) VALUES
(1, 'Jose Alberto', 'Velazquez', 'Nava', 21),
(2, 'Mitzi Galilea', 'Benítez', 'Pérez', 24),
(3, 'Daniel', 'Blancas', 'Aguilar', 21),
(9, 'Fatima Andrea', 'Benitez', 'Perez', 23),
(10, 'Aline Montserrat', 'Velazquez', 'Nava', 18);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
