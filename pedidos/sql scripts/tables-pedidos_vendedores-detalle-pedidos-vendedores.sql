-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-10-2016 a las 20:08:08
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `qvarvene_responsive`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos_vendedores`
--

CREATE TABLE IF NOT EXISTS `detalle_pedidos_vendedores` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `codigo_producto` varchar(20) DEFAULT NULL,
  `producto` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `presentacion` varchar(100) DEFAULT NULL,
  `cantidad` int(10) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `iva` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `act` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `id_pedido` (`id_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_vendedores`
--

CREATE TABLE IF NOT EXISTS `pedidos_vendedores` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `id_vendedor` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha_hora` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `base_imp` double DEFAULT NULL,
  `iva` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `act` int(1) DEFAULT NULL,
  `forma_pago` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `observaciones` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id_pedido`),
  KEY `id_vendedor` (`id_vendedor`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedidos_vendedores`
--
ALTER TABLE `detalle_pedidos_vendedores`
  ADD CONSTRAINT `detalle_pedidos_vendedores_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos_vendedores` (`id_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidos_vendedores`
--
ALTER TABLE `pedidos_vendedores`
  ADD CONSTRAINT `pedidos_vendedores_ibfk_4` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION,
  ADD CONSTRAINT `pedidos_vendedores_ibfk_3` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedores` (`id_vendedor`) ON DELETE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
