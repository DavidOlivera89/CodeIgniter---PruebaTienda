-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-09-2018 a las 19:57:32
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `edi_ci`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE IF NOT EXISTS `articulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `precio_compra` double DEFAULT NULL,
  `precio_venta` varchar(45) DEFAULT NULL,
  `descripcion` longtext,
  `categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categoria_idx` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `nombre`, `precio_compra`, `precio_venta`, `descripcion`, `categoria`) VALUES
(1, 'I5 8600K', 7999.9, '7000', 'Procesador Intel de la 8va Generación. Cuenta con 6 nucleso y 6 hilos', 1),
(2, 'SSD Kingston 120GB', 1400, '1599.9', 'Disco Sólido SSD Kingstone A400 120GB 6gb/s 2.5 sata3', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_promocion`
--

CREATE TABLE IF NOT EXISTS `articulo_promocion` (
  `articulo` int(11) NOT NULL,
  `promocion` int(11) NOT NULL,
  PRIMARY KEY (`articulo`,`promocion`),
  KEY `fk_promocion_idx` (`promocion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo_promocion`
--

INSERT INTO `articulo_promocion` (`articulo`, `promocion`) VALUES
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(0, 'Sin categoría'),
(1, 'Procesadores'),
(2, 'Memorias'),
(3, 'Discos'),
(4, 'Fuentes'),
(6, 'Gabinete'),
(7, 'Perifericos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE IF NOT EXISTS `datos_personales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) DEFAULT NULL,
  `cuit` varchar(20) DEFAULT NULL,
  `nombre` varchar(90) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(90) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_idx` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `datos_personales`
--

INSERT INTO `datos_personales` (`id`, `usuario`, `cuit`, `nombre`, `telefono`, `correo`, `nacimiento`) VALUES
(2, 1, '', '', '', 'ezequielsuazo@outlook.com', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion`
--

CREATE TABLE IF NOT EXISTS `operacion` (
  `articulo` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo_operacion` int(11) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`articulo`,`fecha`),
  KEY `fk_tipo_operacion_idx` (`tipo_operacion`),
  KEY `fk_usuario_operacion_idx` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE IF NOT EXISTS `promocion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `vencimiento` date DEFAULT NULL,
  `descuento` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `promocion`
--

INSERT INTO `promocion` (`id`, `nombre`, `vencimiento`, `descuento`) VALUES
(2, 'Promo Monitor 10%. Febrero 2019!', '2019-02-28', 0.1),
(3, 'Descuento SSD', '2018-12-18', 0.25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_operacion`
--

CREATE TABLE IF NOT EXISTS `tipo_operacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipo_operacion`
--

INSERT INTO `tipo_operacion` (`id`, `nombre`) VALUES
(1, 'Reservado'),
(2, 'Comprado'),
(3, 'Enviado'),
(4, 'Entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`, `estado`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `articulo_promocion`
--
ALTER TABLE `articulo_promocion`
  ADD CONSTRAINT `fk_articulo_promocion` FOREIGN KEY (`articulo`) REFERENCES `articulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_promocion` FOREIGN KEY (`promocion`) REFERENCES `promocion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD CONSTRAINT `fk_articulo_operacion` FOREIGN KEY (`articulo`) REFERENCES `articulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipo_operacion` FOREIGN KEY (`tipo_operacion`) REFERENCES `tipo_operacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_operacion` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
