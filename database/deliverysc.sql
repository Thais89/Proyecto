-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2016 a las 15:22:51
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `deliverysc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encomiendas`
--

CREATE TABLE `encomiendas` (
  `EncomiendaID` int(10) UNSIGNED NOT NULL,
  `latitudOrigen` double NOT NULL,
  `longitudOrigen` double NOT NULL,
  `latitudDestino` double NOT NULL,
  `longitudDestino` double NOT NULL,
  `Distancia` varchar(45) NOT NULL,
  `CantidadDocumentos` int(11) NOT NULL,
  `ReceptorNombre` varchar(200) NOT NULL,
  `ReceptorCedula` varchar(12) NOT NULL,
  `estado` int(11) NOT NULL,
  `precio` double NOT NULL,
  `FechaSolicitud` datetime NOT NULL,
  `FechaRecepcion` datetime NOT NULL,
  `FechaEntrega` datetime NOT NULL,
  `usuarioID` int(10) UNSIGNED NOT NULL,
  `EstadoEncomiendaID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_encomiendas`
--

CREATE TABLE `estado_encomiendas` (
  `estadoEncomiendasID` int(10) UNSIGNED NOT NULL,
  `estado` varchar(45) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclamos`
--

CREATE TABLE `reclamos` (
  `reclamoid` int(10) UNSIGNED NOT NULL,
  `nombreUsuario` varchar(45) NOT NULL,
  `FechaReclamo` datetime NOT NULL,
  `comentario` text NOT NULL,
  `usuarioID` int(10) UNSIGNED NOT NULL,
  `encomiendaID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabuladores`
--

CREATE TABLE `tabuladores` (
  `TabuladorID` int(10) UNSIGNED NOT NULL,
  `tabulador` varchar(45) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` double NOT NULL,
  `encomiendaID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `transaccionID` int(10) UNSIGNED NOT NULL,
  `transaccion` varchar(45) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion_usuario`
--

CREATE TABLE `transaccion_usuario` (
  `TransaccionUsuarioID` int(10) UNSIGNED NOT NULL,
  `monto` double NOT NULL,
  `fecha` date NOT NULL,
  `usuarioID` int(10) UNSIGNED NOT NULL,
  `transaccionID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `UsuarioID` int(10) UNSIGNED NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `cedula` varchar(12) NOT NULL,
  `direcion` varchar(200) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `estado` int(11) NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `ultimoLogin` varchar(45) DEFAULT NULL,
  `Saldo` double NOT NULL DEFAULT '0',
  `authKey` varchar(250) DEFAULT NULL,
  `accessToken` varchar(250) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UsuarioID`, `email`, `password`, `nombre`, `apellido`, `cedula`, `direcion`, `telefono`, `estado`, `fechaRegistro`, `ultimoLogin`, `Saldo`, `authKey`, `accessToken`, `role`) VALUES
(2, 'joferzz1989@gmail.com', 'qazwsx', 'Jose', 'zapata', '19975950', 'Ermita', '041682828329', 1, '0000-00-00 00:00:00', '01-04-2016', 0, 'qwertyuiop', 'qwertyuiop', 4),
(3, 'thaisrrm1@gmail.com', 'qazwsxedc', 'Thais', 'Rodriguez', '19135575', 'Barrancas', '04167827495', 1, '0000-00-00 00:00:00', '01-04-2016', 0, 'qwertyuiop', 'qwertyuiop', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encomiendas`
--
ALTER TABLE `encomiendas`
  ADD PRIMARY KEY (`EncomiendaID`),
  ADD KEY `encomiendas_usuarioid_foreign` (`usuarioID`),
  ADD KEY `encomiendas_estadoencomiendaid_foreign` (`EstadoEncomiendaID`);

--
-- Indices de la tabla `estado_encomiendas`
--
ALTER TABLE `estado_encomiendas`
  ADD PRIMARY KEY (`estadoEncomiendasID`);

--
-- Indices de la tabla `reclamos`
--
ALTER TABLE `reclamos`
  ADD PRIMARY KEY (`reclamoid`),
  ADD KEY `reclamos_usuarioid_foreign` (`usuarioID`),
  ADD KEY `reclamos_encomiendaid_foreign` (`encomiendaID`);

--
-- Indices de la tabla `tabuladores`
--
ALTER TABLE `tabuladores`
  ADD PRIMARY KEY (`TabuladorID`),
  ADD KEY `tabuladores_encomiendaid_foreign` (`encomiendaID`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`transaccionID`);

--
-- Indices de la tabla `transaccion_usuario`
--
ALTER TABLE `transaccion_usuario`
  ADD PRIMARY KEY (`TransaccionUsuarioID`),
  ADD KEY `transaccion_usuario_usuarioid_foreign` (`usuarioID`),
  ADD KEY `transaccion_usuario_transaccionid_foreign` (`transaccionID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioID`),
  ADD UNIQUE KEY `usuarios_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encomiendas`
--
ALTER TABLE `encomiendas`
  MODIFY `EncomiendaID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estado_encomiendas`
--
ALTER TABLE `estado_encomiendas`
  MODIFY `estadoEncomiendasID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reclamos`
--
ALTER TABLE `reclamos`
  MODIFY `reclamoid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tabuladores`
--
ALTER TABLE `tabuladores`
  MODIFY `TabuladorID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `transaccionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `transaccion_usuario`
--
ALTER TABLE `transaccion_usuario`
  MODIFY `TransaccionUsuarioID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `encomiendas`
--
ALTER TABLE `encomiendas`
  ADD CONSTRAINT `encomiendas_estadoencomiendaid_foreign` FOREIGN KEY (`EstadoEncomiendaID`) REFERENCES `estado_encomiendas` (`estadoEncomiendasID`),
  ADD CONSTRAINT `encomiendas_usuarioid_foreign` FOREIGN KEY (`usuarioID`) REFERENCES `usuarios` (`UsuarioID`);

--
-- Filtros para la tabla `reclamos`
--
ALTER TABLE `reclamos`
  ADD CONSTRAINT `reclamos_encomiendaid_foreign` FOREIGN KEY (`encomiendaID`) REFERENCES `encomiendas` (`EncomiendaID`),
  ADD CONSTRAINT `reclamos_usuarioid_foreign` FOREIGN KEY (`usuarioID`) REFERENCES `usuarios` (`UsuarioID`);

--
-- Filtros para la tabla `tabuladores`
--
ALTER TABLE `tabuladores`
  ADD CONSTRAINT `tabuladores_encomiendaid_foreign` FOREIGN KEY (`encomiendaID`) REFERENCES `encomiendas` (`EncomiendaID`);

--
-- Filtros para la tabla `transaccion_usuario`
--
ALTER TABLE `transaccion_usuario`
  ADD CONSTRAINT `transaccion_usuario_transaccionid_foreign` FOREIGN KEY (`transaccionID`) REFERENCES `transacciones` (`transaccionID`),
  ADD CONSTRAINT `transaccion_usuario_usuarioid_foreign` FOREIGN KEY (`usuarioID`) REFERENCES `usuarios` (`UsuarioID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
