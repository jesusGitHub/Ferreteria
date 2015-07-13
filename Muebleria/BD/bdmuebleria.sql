-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2015 a las 17:07:37
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdmuebleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `CategoriaID` int(11) NOT NULL AUTO_INCREMENT,
  `Categoria` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CategoriaID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`CategoriaID`, `Categoria`, `Fecha`) VALUES
(1, 'Mueble en ratan', '2015-03-15 19:28:59'),
(2, 'Mueble en Mimbre', '2015-03-15 19:28:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imagen`
--

CREATE TABLE IF NOT EXISTS `tbl_imagen` (
  `ImagenId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductoID` int(11) NOT NULL,
  `Imagen` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ImagenId`),
  KEY `ProductoId` (`ProductoID`),
  KEY `Imagen` (`Imagen`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `tbl_imagen`
--

INSERT INTO `tbl_imagen` (`ImagenId`, `ProductoID`, `Imagen`, `Fecha`) VALUES
(1, 7, 'producto_1426451054.jpg', '2015-03-15 23:24:14'),
(10, 9, 'producto_1427930721.jpg', '2015-04-01 23:25:21'),
(9, 8, 'producto_1427930682.jpg', '2015-04-01 23:24:42'),
(5, 4, 'producto_1427389818.jpg', '2015-03-26 17:10:18'),
(6, 5, 'producto_1427389966.jpg', '2015-03-26 17:12:46'),
(7, 6, 'producto_1426451054.jpg', '2015-03-28 13:12:51'),
(11, 10, 'producto_1427945338.jpg', '2015-04-02 03:28:58'),
(12, 11, 'producto_1427945391.jpg', '2015-04-02 03:29:51'),
(14, 13, 'producto_1427946341.jpg', '2015-04-02 03:45:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto`
--

CREATE TABLE IF NOT EXISTS `tbl_producto` (
  `ProductoID` int(11) NOT NULL AUTO_INCREMENT,
  `ImagenId` int(11) NOT NULL,
  `CategoriaID` int(11) NOT NULL,
  `UsuarioID` int(11) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Codigo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Descripcion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Precio` int(10) NOT NULL,
  `PrecioOferta` int(10) NOT NULL,
  `Oferta` int(2) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ProductoID`),
  KEY `ImagenId` (`ImagenId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `tbl_producto`
--

INSERT INTO `tbl_producto` (`ProductoID`, `ImagenId`, `CategoriaID`, `UsuarioID`, `Nombre`, `Codigo`, `Descripcion`, `Precio`, `PrecioOferta`, `Oferta`, `Fecha`) VALUES
(8, 0, 1, 2, 'mueble', '1427930682', 'marron', 1500, 500, 1, '2015-04-01 23:24:42'),
(9, 0, 1, 2, 'mesedora', '1427930721', 'amarillo', 2000, 1550, 1, '2015-04-01 23:25:21'),
(10, 0, 2, 2, 'ratan', '1427945338', 'colorado', 1800, 500, 1, '2015-04-02 03:28:58'),
(11, 0, 1, 2, 'silla', '1427945391', 'blanco', 5000, 600, 1, '2015-04-02 03:29:51'),
(13, 0, 1, 2, 'madera', '1427946341', 'pino', 1500, 200, 1, '2015-04-02 03:45:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipousuario`
--

CREATE TABLE IF NOT EXISTS `tbl_tipousuario` (
  `TipoID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`TipoID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tbl_tipousuario`
--

INSERT INTO `tbl_tipousuario` (`TipoID`, `Nombre`) VALUES
(2, 'Gerencia'),
(5, 'Administraccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `UsuarioID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellido` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Cedula` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `Usuario` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Password` varchar(32) COLLATE utf8_spanish2_ci NOT NULL,
  `Direccion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `TipoUsuID` int(11) NOT NULL,
  `Estatus` int(2) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UsuarioID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`UsuarioID`, `Nombre`, `Apellido`, `Cedula`, `Usuario`, `Password`, `Direccion`, `Telefono`, `TipoUsuID`, `Estatus`, `Fecha`) VALUES
(1, 'rafael', 'uceta', '123456', 'admin', '202cb962ac59075b964b07152d234b70', 'las americas', '85255255', 2, 1, '2015-03-15 18:40:14'),
(2, 'juana', 'disss', 'dfg', 'st', '202cb962ac59075b964b07152d234b70', 'dfg', 'dfg', 5, 1, '2015-03-26 12:53:38'),
(3, 'adf', 'diss', 'asdf', 'adsf', '698d51a19d8a121ce581499d7b701668', 'adsf', 'adf', 0, 0, '2015-03-26 13:37:42'),
(4, 'empleado', 'empleado', '0063', 'limitado', '202cb962ac59075b964b07152d234b70', 'asl;dfkj', 'a;sdfklj', 0, 0, '2015-03-26 15:04:08'),
(5, 'jesus', 'soriano', '14587', 'jesus', '202cb962ac59075b964b07152d234b70', 'mal nombre callle principal', '809', 0, 0, '2015-04-01 14:35:54'),
(6, 'cristofer', 'uceta', '78945', 'cristofer', '2b24d495052a8ce66358eb576b8912c8', 'calle primera', '80895741', 0, 0, '2015-04-01 21:07:11');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
