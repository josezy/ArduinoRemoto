-- phpMyAdmin SQL Dump
-- version 4.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-08-2014 a las 15:47:37
-- Versión del servidor: 5.6.11-log
-- Versión de PHP: 5.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `arduinodb`
--
CREATE DATABASE IF NOT EXISTS `arduinodb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `arduinodb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE IF NOT EXISTS `datos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `s_valor` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`ID`, `s_id`, `s_valor`, `fecha`) VALUES
(13, 0, 46, '2014-08-24 14:38:10'),
(14, 1, 450, '2014-08-24 14:38:10'),
(15, 4, 613, '2014-08-24 14:38:10'),
(16, 0, 56, '2014-08-24 14:38:31'),
(17, 1, 480, '2014-08-24 14:38:31'),
(18, 4, 710, '2014-08-24 14:38:31'),
(19, 0, 54, '2014-08-24 14:38:50'),
(20, 1, 460, '2014-08-24 14:38:50'),
(21, 4, 780, '2014-08-24 14:38:50'),
(22, 0, 58, '2014-08-24 14:39:08'),
(23, 1, 500, '2014-08-24 14:39:08'),
(24, 4, 600, '2014-08-24 14:39:08'),
(25, 0, 58, '2014-08-24 14:39:38'),
(26, 1, 420, '2014-08-24 14:39:38'),
(27, 2, 256, '2014-08-24 14:39:38'),
(28, 4, 400, '2014-08-24 14:39:38'),
(29, 0, 62, '2014-08-24 14:39:58'),
(30, 1, 480, '2014-08-24 14:39:58'),
(31, 2, 220, '2014-08-24 14:39:58'),
(32, 4, 280, '2014-08-24 14:39:58'),
(33, 0, 60, '2014-08-24 14:40:17'),
(34, 1, 512, '2014-08-24 14:40:17'),
(35, 2, 280, '2014-08-24 14:40:17'),
(36, 4, 460, '2014-08-24 14:40:17'),
(37, 0, 60, '2014-08-24 14:40:31'),
(38, 1, 480, '2014-08-24 14:40:31'),
(39, 2, 360, '2014-08-24 14:40:31'),
(40, 0, 58, '2014-08-24 14:40:44'),
(41, 1, 500, '2014-08-24 14:40:44'),
(42, 2, 310, '2014-08-24 14:40:44'),
(43, 0, 58, '2014-08-24 14:40:55'),
(44, 1, 612, '2014-08-24 14:40:55'),
(45, 0, 60, '2014-08-24 14:41:02'),
(46, 1, 480, '2014-08-24 14:41:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `user`, `pass`) VALUES
(1, 'jose', '4a3487e57d90e2084654b6d23937e75af5c8ee55'),
(2, 'yepes', '7b6afb55f5e3a16baa67a0b20a9b2f0cfbd2bbc2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
