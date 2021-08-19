-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2021 a las 00:30:35
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kiosco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `Transaccion` int(11) NOT NULL,
  `Articulo` varchar(60) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `PrecioCosto` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`Transaccion`, `Articulo`, `Cantidad`, `PrecioCosto`, `Fecha`) VALUES
(1, 'caramelos', 1000, 0, '2021-06-12'),
(2, 'caramelos', 1000, 0, '2021-06-12'),
(3, 'vino', 12, 0, '2021-06-12'),
(4, 'vino', 10, 2000, '2021-06-12'),
(5, 'vino', 10, 2000, '2021-06-12'),
(6, 'PC', 4, 40000, '2021-06-12'),
(7, 'golosinas', 120, 230, '2021-06-12'),
(8, 'golosinas', 120, 230, '2021-06-12'),
(9, 'caramelos', 1, 1, '2021-06-12'),
(10, 'caramelos', 1, 1, '2021-06-12'),
(11, 'vasos', 10, 200, '2021-06-12'),
(12, 'bebidas', -6, 45, '2021-06-12'),
(13, 'bebidas', -6, 45, '2021-06-12'),
(14, 'bebidas', -10, 456, '2021-06-12'),
(15, 'Termos', 65, 567, '2021-06-12'),
(16, 'Termos', 56, 5656, '2021-06-12'),
(17, 'Termos', 56, 5656, '2021-06-12'),
(18, 'jabon', 234, 234, '2021-06-12'),
(19, 'vino', 10, 45, '2021-06-12'),
(20, 'vino', 10, 45, '2021-06-12'),
(21, 'vino', 10, 45, '2021-06-12'),
(22, 'vino', 10, 2, '2021-06-12'),
(23, 'vino', 10, 2, '2021-06-12'),
(24, 'golosinas', 100, 1200, '2021-06-15'),
(25, 'golosinas', 100, 1200, '2021-06-15'),
(26, 'Termos', 12, 11, '2021-06-15'),
(27, 'pc', 10, 234, '2021-06-15'),
(28, 'pc', 8, 23, '2021-06-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `ID_art` int(11) NOT NULL,
  `Articulo` varchar(60) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`ID_art`, `Articulo`, `Cantidad`) VALUES
(1, 'golosinas', 250),
(3, 'Alfajor ', 100),
(4, 'caramelos', 990),
(6, 'vino', 53),
(7, 'PC', 20),
(9, 'vasos', 10),
(12, 'Termos', 133),
(14, 'jabon', 234),
(15, 'vino', 21),
(17, 'golosinas', 82);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Apellido` varchar(60) NOT NULL,
  `Usuario` varchar(60) NOT NULL,
  `Pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Apellido`, `Usuario`, `Pass`) VALUES
(1, 'moni', 'iannone', 'moni@g0a53.c60', 12),
(2, 'Dario', 'Rodriguez', 'dario11@hotmail.com', 12345),
(3, 'Martin', 'Rodriguez', 'martin@gmiail.com', 0),
(4, 'Claudia', 'Villar', 'villar@gmail.com', 1234),
(5, 'Ale', 'Rodriguez', 'ale@gmail.com', 0),
(6, 'pablo', 'moggia', 'mogia@gmail.com', 0),
(7, 'Sandra', 'Valenzuela', 'sandravalenzuela86@gmail.com', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `Transaccion` int(11) NOT NULL,
  `Articulo` varchar(60) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `PrecioDeVenta` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`Transaccion`, `Articulo`, `Cantidad`, `PrecioDeVenta`, `Fecha`) VALUES
(1, 'golosinas', 10, 120, '2021-06-11'),
(2, 'golosinas', 21, 483, '2021-06-11'),
(3, 'golosinas', 9, 216, '2021-06-11'),
(4, 'PC', 2, 4000, '2021-06-12'),
(5, 'caramelos', 11, 121, '2021-06-12'),
(6, 'caramelos', 11, 121, '2021-06-12'),
(10, 'golosinas', 12, 144, '2021-06-16'),
(11, 'chupetines', 1, 1, '2021-06-16'),
(12, 'golosinas', 6, 36, '2021-06-16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`Transaccion`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`ID_art`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`Transaccion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `Transaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `ID_art` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `Transaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
