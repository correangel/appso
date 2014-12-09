-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-03-2014 a las 04:08:21
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `so`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `codigocliente` int(11) NOT NULL,
  `razonsocial` varchar(100) DEFAULT NULL,
  `nombretrabajo` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `enviamails` bit(1) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `conestados` char(10) DEFAULT NULL,
  `conorden` char(10) DEFAULT NULL,
  PRIMARY KEY (`codigocliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`codigocliente`, `razonsocial`, `nombretrabajo`, `email`, `enviamails`, `Estado`, `activo`, `conestados`, `conorden`) VALUES
(1, 'Optical Center', 'Optical Center', 'center@gmail.com', b'1', 1, b'1', '1234', '1234'),
(2, 'Opticas Devlin', 'Opticas Devlin', 'devlin@gmail.com', b'1', 1, b'1', '1234', '1234'),
(3, 'Opticas America', 'Opticas America', 'america@gmail.com', b'1', 1, b'1', '1234', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_tarjeta`
--

CREATE TABLE IF NOT EXISTS `detalle_tarjeta` (
  `plastico_no` varchar(20) NOT NULL,
  `fecha_transac` datetime DEFAULT NULL,
  `descripcion_transac` varchar(150) DEFAULT NULL,
  `cantidad` decimal(18,2) DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `detalle_tarjeta`
--

INSERT INTO `detalle_tarjeta` (`plastico_no`, `fecha_transac`, `descripcion_transac`, `cantidad`, `estado`) VALUES
('1111-1111-1111-1111', '2014-01-15 00:00:00', 'Compra', '150.00', b'1'),
('1111-1111-1111-1111', '2014-01-24 00:00:00', 'Compra', '200.00', b'1'),
('1111-1111-1111', '2014-02-10 00:00:00', 'Compra', '200.00', b'0'),
('2222-2222-2222-2222', '2014-02-01 00:00:00', 'Compra', '300.00', b'1'),
('2222-2222-2222-2222', '2014-02-01 00:00:00', 'Compra', '300.00', b'1'),
('2222-2222-2222-2222', '2014-02-28 00:00:00', NULL, '300.00', b'0'),
('3333-3333-3333-3333', '2014-02-10 00:00:00', 'Compra', '400.00', b'1'),
('3333-3333-3333-3333', '2014-02-10 00:00:00', 'Compra', '400.00', b'1'),
('3333-3333-3333-3333', '2014-02-15 00:00:00', NULL, '300.00', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE IF NOT EXISTS `tarjetas` (
  `plastico_no` varchar(20) NOT NULL,
  `codigocliente` int(11) NOT NULL,
  `clave` char(15) NOT NULL,
  `TipoPlastico` char(1) DEFAULT NULL,
  `fechai` datetime DEFAULT NULL,
  `fechaf` datetime DEFAULT NULL,
  `Apellido_afiliado` varchar(120) DEFAULT NULL,
  `Nombre_afiliado` varchar(120) DEFAULT NULL,
  `Cargo` varchar(60) DEFAULT NULL,
  `cedula` varchar(60) DEFAULT NULL,
  `fechanac` datetime DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `telefonos` varchar(60) DEFAULT NULL,
  `celular` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado_plastico` bit(1) DEFAULT NULL,
  `accesoint` varchar(5) DEFAULT NULL,
  `saldo_anterior` decimal(18,0) DEFAULT NULL,
  `ventas_mes_C` decimal(18,0) DEFAULT NULL,
  `ventas_mes_X` decimal(18,0) DEFAULT NULL,
  `canjes_mes` decimal(18,0) DEFAULT NULL,
  `saldo_actual` decimal(18,0) DEFAULT NULL,
  PRIMARY KEY (`plastico_no`,`codigocliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPRESSED;

--
-- Volcar la base de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`plastico_no`, `codigocliente`, `clave`, `TipoPlastico`, `fechai`, `fechaf`, `Apellido_afiliado`, `Nombre_afiliado`, `Cargo`, `cedula`, `fechanac`, `sexo`, `direccion`, `telefonos`, `celular`, `email`, `estado_plastico`, `accesoint`, `saldo_anterior`, `ventas_mes_C`, `ventas_mes_X`, `canjes_mes`, `saldo_actual`) VALUES
('1111-1111-1111-1111', 1, '123456', 'A', '2012-01-01 00:00:00', '2015-01-01 00:00:00', 'Miranda Galvez', 'Luisa Francisca', 'Vendedor', 'A-1 000000', '1980-01-01 00:00:00', 'F', 'Zona 1', '2230-2514', '5142-4568', 'luisa@gmail.com', b'1', '1', '1500', '200', '100', '0', '1700'),
('2222-2222-2222-2222', 2, '123456', 'B', '2012-01-01 00:00:00', '2015-01-01 00:00:00', 'Gonzalez Marroquin', 'Mario Andres', 'Optometrista', 'B-2 000000', '1978-01-04 00:00:00', 'M', 'Zona 2', '2261-3645', '4812-7896', 'mario@gmail.com', b'1', '1', '800', '300', '200', '100', '1000'),
('3333-3333-3333-3333', 3, '123456', 'C', '2012-01-01 00:00:00', '2015-01-01 00:00:00', 'Morales Aguilar', 'Carlos Alberto', 'Dueño', 'C-3 000000', '1975-06-01 00:00:00', 'M', 'Zona 3', '2365-1230', '5525-3012', 'carlos@gmail.com', b'1', '1', '1800', '400', '300', '200', '2000');
