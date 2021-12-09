-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2021 a las 00:17:04
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_producto`
--

CREATE TABLE `tm_producto` (
  `prod_id` int(11) NOT NULL,
  `prod_nom` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `prod_desc` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fech_crea` datetime NOT NULL,
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_producto`
--

INSERT INTO `tm_producto` (`prod_id`, `prod_nom`, `prod_desc`, `fech_crea`, `fech_modi`, `fech_elim`, `est`) VALUES
(2, 'Mouse Gamer', 'Ninguna', '2021-12-04 18:03:56', NULL, NULL, 1),
(3, 'Cargador', 'Ninguna', '2021-12-04 18:05:01', NULL, NULL, 1),
(4, 'Case iPhone 7', 'Ninguna', '2021-12-04 18:06:31', NULL, NULL, 1),
(5, 'Monitor', 'Ninguna', '2021-12-04 21:28:23', NULL, NULL, 1),
(6, 'Cable USB 2.0', 'Ninguna', '2021-12-07 01:17:20', '2021-12-09 17:17:34', NULL, 1),
(7, 'Cargador Portatil', 'Ninguna', '2021-12-07 01:17:20', NULL, NULL, 1),
(8, 'Cargador tipo C 3.0', 'Ninguna', '2021-12-08 20:49:10', NULL, NULL, 1),
(9, 'Cargador tipo C', 'Ninguna', '2021-12-08 20:50:31', NULL, NULL, 1),
(10, 'Mouse Gamer 3.0', 'Ninguna', '2021-12-09 17:20:53', NULL, '2021-12-09 17:23:13', 1),
(11, 'Auriculares Xiaomi', 'Xiaomi jack 3.5', '2021-12-09 17:24:32', '2021-12-09 18:16:23', NULL, 1),
(12, 'Lector de códigos de barra', 'Ninguna', '2021-12-09 17:24:44', '2021-12-09 17:35:41', '2021-12-09 17:24:47', 1),
(13, 'asd', 'asd', '2021-12-09 17:56:24', NULL, '2021-12-09 17:59:18', 0),
(14, 'Impresora', 'Multifuncional', '2021-12-09 17:59:08', '2021-12-09 18:03:04', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tm_producto`
--
ALTER TABLE `tm_producto`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tm_producto`
--
ALTER TABLE `tm_producto`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
