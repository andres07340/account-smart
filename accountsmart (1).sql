-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2015 a las 16:39:04
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `accountsmart`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_documento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `num_documento`, `nombre`, `apellido`, `telefono`, `direccion`) VALUES
(5, '444', 'servidor', '2014', '34000', 'es buno'),
(6, '666', 'Windows', '10', '54000', 'Programa windows');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_transacion`
--

CREATE TABLE IF NOT EXISTS `cuentas_transacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `cuentas_transacion`
--

INSERT INTO `cuentas_transacion` (`id`, `codigo`, `descripcion`, `tipo`) VALUES
(1, '1105', 'Caja', 'activo'),
(2, '1120', 'Cuenta de Ahorros', 'activo'),
(3, '112005', 'Bancos', 'activo'),
(4, '12', 'Inversiones', 'activo'),
(5, '1205', 'Acciones', 'activo'),
(6, '123005', 'Empresas', 'activo'),
(7, '131505', 'Ventas', 'activo'),
(8, '131520', 'Presatomos', 'activo'),
(9, '134010', 'Maquinaria y equipo', 'activo'),
(10, '134515', 'Comiciones', 'activo'),
(11, '14', 'Inventario', 'activo'),
(12, '21', 'Obligaciones Financi', 'pasivo'),
(13, '2205', 'Proveedor', 'pasivo'),
(14, '2804', 'IVA', 'pasivo'),
(15, '31', 'Capital Social', 'activo'),
(16, '4135', 'Ventas', 'ingreso'),
(17, '613554', 'Costo de venta', 'costo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE IF NOT EXISTS `documento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eps`
--

CREATE TABLE IF NOT EXISTS `eps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `eps`
--

INSERT INTO `eps` (`id`, `nombre`, `telefono`) VALUES
(1, 'Salud Vida', '87312354');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `nombre`, `role`) VALUES
(1, 'Administrador', 'role_admin'),
(2, 'Gerente', 'role_gerente'),
(3, 'Contador', 'role_contador'),
(4, 'Vendedor', 'role_vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_users`
--

CREATE TABLE IF NOT EXISTS `grupo_users` (
  `grupo_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`grupo_id`,`users_id`),
  KEY `IDX_A437A4229C833003` (`grupo_id`),
  KEY `IDX_A437A42267B3B43D` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pension`
--

CREATE TABLE IF NOT EXISTS `pension` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `pension`
--

INSERT INTO `pension` (`id`, `nombre`, `telefono`) VALUES
(1, 'Colpensiones', '87312312');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `representante` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `razon_social`, `representante`, `telefono`, `email`, `is_active`) VALUES
(1, 'Toyota', 'Jose Marquez', '23112313', 'edison9417@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE IF NOT EXISTS `transaccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cuenta` int(11) DEFAULT NULL,
  `id_documento` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `naturaleza` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BFF96AF717F00A22` (`id_cuenta`),
  KEY `IDX_BFF96AF7368492E0` (`id_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `num_documento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `salario_basico` int(11) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `id_eps` int(11) DEFAULT NULL,
  `id_pension` int(11) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1483A5E9C9CA61F3` (`id_eps`),
  KEY `IDX_1483A5E9A741350A` (`id_pension`),
  KEY `IDX_1483A5E9E553F37` (`rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12348 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `nombre`, `apellido`, `num_documento`, `email`, `telefono`, `salario_basico`, `salt`, `password`, `is_active`, `id_eps`, `id_pension`, `rol`) VALUES
(1, 'admin', 'Edixon Fabian', 'Hernandez', '1232131', 'edison9417@hotmail.com', '23132', 1200000, '471340675fdcc887f4e8007bffa0259b', 'b9cPDiM0RKUhYrTyMiztD0YeMXjxuBEAM0XSVUtQH3WEEkbGu3kL/W/UddttOYo9rKwBZ2uDy5w6dv8cYLEfRw==', 1, 1, 1, 1),
(2, 'mateo', 'Sebastian Mateo', 'Cortés Barbosa', '1231321', 'mateo@hotmail.com', '3045251569', 1000000, '557037392a11446be7c8fd49636beeb1', 'fSZ4JakMqxHqu5s8stnYkQFle6Ptn0hUQCMOPOt/b6PG2aLMo0bTYV0o2dO0WIWIBVW7Y9/Ns62jvHzzYd/6qw==', 1, 1, 1, 2),
(7, 'rafael', 'Rafael Alberto', 'Cubillos Rodriguez', '567890', 'rafael@gmail.com', '7788', 878787, '5387e8de64916fa13e11dd7888df51ee', '6SkCzDqUsNlsKYPSTuXLv6keS422pSNs7JaAUQsK27frE8LeioOuz6A1ZsNPGA5cP1VfkebJhaAhc1ZwlXb9LA==', 1, 1, 1, 1),
(8, 'eduard', 'Eduard Wbeima', 'Díaz García', '1232131', 'eduard@gmail.com', '1232', 1200000, '4ad17d0f02e2084cb7109279725d29f1', 'Hy5PDeprFGCj8pPPf/tgnkwW+HDFZQV/lBQV2DHFpFG5x8ZcMN+dtcMd1V1Hbru0N4T3mt2wHLDUYYL6O5fhnQ==', 1, 1, 1, 3),
(9, 'jeison', 'Jeisson Giovanni', 'Guchubo Guerrero', '123321', 'jeisson@gmail.com', '123213', 1200000, '55e2c5e323a0979f4a519c75b9eb7822', 'vDqLNNKvooOV5deC8YY8t7fPop9/ynf9ME+zV+QzD8mX53sGUetfliYfSZGDt6cHYx+ePixYD1GnLquGonuNlQ==', 1, 1, 1, 4),
(12346, '12345', 'Andres', 'Rodriguez', '161212137', 'andres@htrmail.com', '31433480', 100000, '471340675fdcc887f4e8007bffa0259b', 'b9cPDiM0RKUhYrTyMiztD0YeMXjxuBEAM0XSVUtQH3WEEkbGu3kL/W/UddttOYo9rKwBZ2uDy5w6dv8cYLEfRw==', 1, 1, 1, 2),
(12347, '12345', 'Andres', 'Rodriguez', '161212137', 'andres@htrmail.com', '31433480', 100000, '471340675fdcc887f4e8007bffa0259b', 'b9cPDiM0RKUhYrTyMiztD0YeMXjxuBEAM0XSVUtQH3WEEkbGu3kL/W/UddttOYo9rKwBZ2uDy5w6dv8cYLEfRw==', 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_grupo`
--

CREATE TABLE IF NOT EXISTS `user_grupo` (
  `user_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`grupo_id`),
  KEY `IDX_6ECC608BA76ED395` (`user_id`),
  KEY `IDX_6ECC608B9C833003` (`grupo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user_grupo`
--

INSERT INTO `user_grupo` (`user_id`, `grupo_id`) VALUES
(1, 1),
(2, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `grupo_users`
--
ALTER TABLE `grupo_users`
  ADD CONSTRAINT `FK_A437A42267B3B43D` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A437A4229C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD CONSTRAINT `FK_BFF96AF717F00A22` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentas_transacion` (`id`),
  ADD CONSTRAINT `FK_BFF96AF7368492E0` FOREIGN KEY (`id_documento`) REFERENCES `documento` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_1483A5E9A741350A` FOREIGN KEY (`id_pension`) REFERENCES `pension` (`id`),
  ADD CONSTRAINT `FK_1483A5E9C9CA61F3` FOREIGN KEY (`id_eps`) REFERENCES `eps` (`id`),
  ADD CONSTRAINT `FK_1483A5E9E553F37` FOREIGN KEY (`rol`) REFERENCES `grupo` (`id`);

--
-- Filtros para la tabla `user_grupo`
--
ALTER TABLE `user_grupo`
  ADD CONSTRAINT `FK_6ECC608B9C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `FK_6ECC608BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
