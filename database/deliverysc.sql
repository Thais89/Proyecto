-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2016 at 10:58 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `deliverysc`
--

-- --------------------------------------------------------

--
-- Table structure for table `depositos`
--

CREATE TABLE IF NOT EXISTS `depositos` (
  `depositoID` int(11) NOT NULL AUTO_INCREMENT,
  `banco` varchar(20) DEFAULT NULL,
  `numero` int(20) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `estado` int(1) DEFAULT '0',
  `monto` float DEFAULT '0',
  PRIMARY KEY (`depositoID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `depositos`
--

INSERT INTO `depositos` (`depositoID`, `banco`, `numero`, `fecha`, `estado`, `monto`) VALUES
(1, 'Mercantil', 1111, '2016-04-04', 0, 5000),
(2, 'Mercantil', 1112, '2016-04-04', 0, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `encomiendas`
--

CREATE TABLE IF NOT EXISTS `encomiendas` (
  `encomiendaID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `latitudOrigen` double NOT NULL,
  `longitudOrigen` double NOT NULL,
  `latitudDestino` double NOT NULL,
  `longitudDestino` double NOT NULL,
  `distancia` varchar(45) NOT NULL,
  `cantIDadDocumentos` int(11) NOT NULL,
  `receptorNombre` varchar(200) NOT NULL,
  `receptorCedula` varchar(12) NOT NULL,
  `estado` int(11) NOT NULL,
  `precio` double NOT NULL,
  `fechaSolicitud` datetime NOT NULL,
  `fechaRecepcion` datetime NOT NULL,
  `fechaEntrega` datetime NOT NULL,
  `usuarioID` int(10) unsigned NOT NULL,
  `estadoEncomiendaID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`encomiendaID`),
  KEY `encomiendas_usuarioID_foreign` (`usuarioID`),
  KEY `encomiendas_estadoencomiendaID_foreign` (`estadoEncomiendaID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `estado_encomiendas`
--

CREATE TABLE IF NOT EXISTS `estado_encomiendas` (
  `estadoEncomiendasID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`estadoEncomiendasID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reclamos`
--

CREATE TABLE IF NOT EXISTS `reclamos` (
  `reclamoID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(45) NOT NULL,
  `fechaReclamo` datetime NOT NULL,
  `comentario` text NOT NULL,
  `usuarioID` int(10) unsigned NOT NULL,
  `encomiendaID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`reclamoID`),
  KEY `reclamos_usuarioID_foreign` (`usuarioID`),
  KEY `reclamos_encomiendaID_foreign` (`encomiendaID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tabuladores`
--

CREATE TABLE IF NOT EXISTS `tabuladores` (
  `tabuladorID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tabulador` varchar(45) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` double NOT NULL,
  `encomiendaID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tabuladorID`),
  KEY `tabuladores_encomiendaID_foreign` (`encomiendaID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transacciones`
--

CREATE TABLE IF NOT EXISTS `transacciones` (
  `transaccionID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaccion` varchar(45) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`transaccionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transacciones`
--

INSERT INTO `transacciones` (`transaccionID`, `transaccion`, `descripcion`) VALUES
(1, 'Recarga', 'Recarga el Saldo al usuario'),
(2, 'Transferencia/Deposito', 'Transferencia o deposito Bancario');

-- --------------------------------------------------------

--
-- Table structure for table `transaccion_usuario`
--

CREATE TABLE IF NOT EXISTS `transaccion_usuario` (
  `transaccionUsuarioID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `monto` double NOT NULL,
  `fecha` datetime NOT NULL,
  `usuarioID` int(10) unsigned NOT NULL,
  `transaccionID` int(10) unsigned NOT NULL,
  `numeroReferencia` int(20) NOT NULL,
  `origenBanco` varchar(20) NOT NULL,
  PRIMARY KEY (`transaccionUsuarioID`),
  KEY `transaccion_usuario_usuarioID_foreign` (`usuarioID`),
  KEY `transaccion_usuario_transaccionID_foreign` (`transaccionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `transaccion_usuario`
--

INSERT INTO `transaccion_usuario` (`transaccionUsuarioID`, `monto`, `fecha`, `usuarioID`, `transaccionID`, `numeroReferencia`, `origenBanco`) VALUES
(1, 0, '2016-10-12', 3, 1, 0, ''),
(2, 1200, '2016-10-10', 2, 1, 0, ''),
(3, 1000, '2016-10-10', 3, 1, 0, ''),
(4, 100, '2016-10-10', 2, 1, 0, ''),
(5, 500, '2016-10-10', 3, 1, 0, ''),
(6, 1000, '2016-10-10', 3, 1, 0, ''),
(7, 900, '2016-10-10', 3, 1, 0, ''),
(8, 5000, '2016-04-03', 3, 1, 0, ''),
(9, 500, '2016-04-03', 3, 1, 0, ''),
(10, 1000, '2016-04-03', 3, 1, 0, ''),
(11, 1000, '2016-04-03', 2, 1, 0, ''),
(12, 900, '2016-04-03', 1, 1, 0, ''),
(13, 1200, '2016-04-03', 3, 1, 2147483647, '0'),
(14, 400, '2016-04-03', 3, 1, 12221, '0'),
(16, 100, '2016-04-03', 1, 1, 2147483647, '0'),
(17, 0, '2016-10-10', 1, 2, 1111, '1'),
(18, 0, '2016-10-12', 2, 2, 1111, '2'),
(19, 5000, '2016-10-12', 3, 2, 1111, '0'),
(20, 5000, '2016-10-10', 2, 2, 1111, '1'),
(21, 5000, '2016-10-12', 3, 2, 1111, '0'),
(22, 5000, '2016-10-12', 2, 2, 1111, '1'),
(23, 900, '0000-00-00', 3, 1, 8888, '1'),
(24, 500, '2016-04-03', 2, 1, 9999, '1'),
(25, 5000, '2016-10-10', 2, 2, 1111, '1');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuarioID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `cedula` varchar(12) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `fechaRegistro` datetime NOT NULL,
  `ultimoLogin` varchar(45) NULL,
  `saldo` double NOT NULL DEFAULT '0',
  `authKey` varchar(250) DEFAULT NULL,
  `accessToken` varchar(250) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '4',
  PRIMARY KEY (`UsuarioID`),
  UNIQUE KEY `usuarios_email_unique` (`email`),
  UNIQUE KEY `usuarios_cedula_unique` (`cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`UsuarioID`, `email`, `password`, `nombre`, `apellIDo`, `cedula`, `direccion`, `telefono`, `estado`, `fechaRegistro`, `ultimoLogin`, `Saldo`, `authKey`, `accessToken`, `role`) VALUES
(1, 'joferzz1989@gmail.com', SHA1('qazwsx'), 'Jose', 'zapata', '19975950', 'Ermita', '041682828329', 1, '0000-00-00 00:00:00', '01-04-2016', 0, 'qwertyuiop', 'qwertyuiop', 4),
(2, 'thaisrrm1@gmail.com', SHA1('123456'), 'Thais', 'Rodriguez', '19135575', 'Barrancas', '04167827495', 1, '0000-00-00 00:00:00', '01-04-2016', 0, 'qwertyuiop', 'qwertyuiop', 1),
(3, 'gregori.gonzalez.90@gmail.com', SHA1('41556321'), 'GregoADmin', 'Gonza', '21218739', '23 Enero', '04247542489', 1, '0000-00-00 00:00:00', NULL, 0, NULL, NULL, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `encomiendas`
--
ALTER TABLE `encomiendas`
  ADD CONSTRAINT `encomiendas_estadoencomiendaID_foreign` FOREIGN KEY (`estadoEncomiendaID`) REFERENCES `estado_encomiendas` (`estadoEncomiendasID`),
  ADD CONSTRAINT `encomiendas_usuarioID_foreign` FOREIGN KEY (`usuarioID`) REFERENCES `usuarios` (`usuarioID`);

--
-- Constraints for table `reclamos`
--
ALTER TABLE `reclamos`
  ADD CONSTRAINT `reclamos_encomiendaID_foreign` FOREIGN KEY (`encomiendaID`) REFERENCES `encomiendas` (`encomiendaID`),
  ADD CONSTRAINT `reclamos_usuarioID_foreign` FOREIGN KEY (`usuarioID`) REFERENCES `usuarios` (`usuarioID`);

--
-- Constraints for table `tabuladores`
--
ALTER TABLE `tabuladores`
  ADD CONSTRAINT `tabuladores_encomiendaID_foreign` FOREIGN KEY (`encomiendaID`) REFERENCES `encomiendas` (`encomiendaID`);

--
-- Constraints for table `transaccion_usuario`
--
ALTER TABLE `transaccion_usuario`
  ADD CONSTRAINT `transaccion_usuario_transaccionID_foreign` FOREIGN KEY (`transaccionID`) REFERENCES `transacciones` (`transaccionID`),
  ADD CONSTRAINT `transaccion_usuario_usuarioID_foreign` FOREIGN KEY (`usuarioID`) REFERENCES `usuarios` (`usuarioID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
