-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-12-2018 a las 18:09:54
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `edusoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities`
--

CREATE TABLE `activities` (
  `id` int(20) NOT NULL,
  `title` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `students` int(2) NOT NULL,
  `status` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `after` int(20) DEFAULT NULL,
  `grupo` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `activities`
--

INSERT INTO `activities` (`id`, `title`, `type`, `students`, `status`, `after`, `grupo`) VALUES
(51, 'SesiÃ³n 1 - Puesta en contexto', 'actividad', 3, 'sin asignar', NULL, NULL),
(52, 'SesiÃ³n 1 - Aplicacion', 'actividad', 3, 'sin asignar', NULL, NULL),
(53, 'Sesion 1 - Individual 1', 'examen', 1, 'sin asignar', NULL, NULL),
(54, 'Sesion 1 - Individual 2', 'examen', 1, 'sin asignar', NULL, NULL),
(55, 'Sesion 2 - Contexto', 'actividad', 3, 'sin asignar', NULL, NULL),
(56, 'Sesion 2 - Aplicacion', 'actividad', 3, 'sin asignar', NULL, NULL),
(57, 'Sesion 2 - Individual 1', 'examen', 1, 'sin asignar', NULL, NULL),
(58, 'Sesion 2 - Individual 2', 'examen', 1, 'sin asignar', NULL, NULL),
(59, 'Sesion 2 - Individual 3', 'examen', 1, 'sin asignar', NULL, NULL),
(60, 'Sesion 3 - Contexto', 'actividad', 3, 'sin asignar', NULL, NULL),
(61, 'Sesion 3 - Aplicacion', 'actividad', 3, 'sin asignar', NULL, NULL),
(62, 'Sesion 3 - Individual 1', 'examen', 1, 'sin asignar', NULL, NULL),
(63, 'Sesion 4 - Contexto', 'actividad', 3, 'sin asignar', NULL, NULL),
(64, 'Sesion 4 - Aplicacion', 'actividad', 3, 'sin asignar', NULL, NULL),
(65, 'Sesion 4 - Individual 1', 'examen', 1, 'sin asignar', NULL, NULL),
(66, 'Sesion 4 - Individual 2', 'examen', 1, 'sin asignar', NULL, NULL),
(67, 'Sesion 5 - Contexto', 'actividad', 3, 'sin asignar', NULL, NULL),
(68, 'Sesion 5 - Aplicacion', 'actividad', 3, 'sin asignar', NULL, NULL),
(69, 'Sesion 5 - Individual 1', 'examen', 1, 'sin asignar', NULL, NULL),
(70, 'Sesion 5 - Individual 2', 'examen', 1, 'sin asignar', NULL, NULL),
(71, 'Sesion 6 - Evaluacion Final 1', 'examen', 1, 'sin asignar', NULL, NULL),
(72, 'Sesion 6 - Evaluacion Final 2', 'examen', 1, 'sin asignar', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity_has_exercises`
--

CREATE TABLE `activity_has_exercises` (
  `id` int(50) NOT NULL,
  `activity` int(20) NOT NULL,
  `exercise` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `activity_has_exercises`
--

INSERT INTO `activity_has_exercises` (`id`, `activity`, `exercise`) VALUES
(105, 51, 36),
(106, 51, 45),
(107, 51, 37),
(108, 51, 38),
(109, 51, 39),
(110, 51, 40),
(111, 51, 41),
(112, 51, 42),
(113, 51, 43),
(114, 51, 44),
(115, 52, 46),
(116, 52, 55),
(117, 52, 56),
(118, 52, 57),
(119, 52, 58),
(120, 52, 59),
(121, 52, 60),
(122, 52, 47),
(123, 52, 48),
(124, 52, 49),
(125, 52, 50),
(126, 52, 51),
(127, 52, 52),
(128, 52, 53),
(129, 52, 54),
(130, 53, 61),
(131, 53, 62),
(132, 53, 63),
(133, 53, 64),
(134, 53, 65),
(135, 53, 66),
(136, 54, 67),
(137, 54, 68),
(138, 54, 69),
(139, 54, 70),
(140, 54, 71),
(141, 54, 72),
(142, 55, 73),
(143, 55, 74),
(144, 55, 75),
(145, 55, 76),
(146, 56, 77),
(147, 56, 78),
(148, 56, 79),
(149, 56, 80),
(150, 56, 81),
(151, 56, 82),
(152, 57, 83),
(153, 57, 84),
(154, 57, 85),
(155, 57, 86),
(156, 57, 87),
(157, 58, 88),
(158, 58, 89),
(159, 58, 90),
(160, 58, 91),
(161, 58, 92),
(162, 59, 93),
(163, 59, 94),
(164, 59, 95),
(165, 59, 96),
(166, 59, 97),
(167, 60, 98),
(168, 60, 99),
(169, 60, 100),
(170, 60, 101),
(171, 61, 102),
(172, 61, 103),
(173, 61, 104),
(174, 61, 105),
(175, 61, 106),
(176, 61, 107),
(177, 62, 108),
(178, 62, 109),
(179, 63, 110),
(180, 63, 111),
(181, 63, 112),
(182, 63, 113),
(183, 64, 114),
(184, 64, 123),
(185, 64, 124),
(186, 64, 125),
(187, 64, 115),
(188, 64, 116),
(189, 64, 117),
(190, 64, 118),
(191, 64, 119),
(192, 64, 120),
(193, 64, 121),
(194, 64, 122),
(195, 65, 126),
(196, 65, 127),
(197, 65, 128),
(198, 65, 129),
(199, 66, 130),
(200, 66, 131),
(201, 66, 132),
(202, 66, 133),
(203, 67, 134),
(204, 67, 135),
(205, 67, 136),
(206, 67, 137),
(207, 67, 138),
(208, 68, 139),
(209, 68, 140),
(210, 68, 141),
(211, 68, 142),
(212, 68, 143),
(213, 69, 144),
(214, 69, 145),
(215, 69, 146),
(216, 69, 147),
(217, 69, 148),
(218, 70, 149),
(219, 70, 150),
(220, 70, 151),
(221, 70, 152),
(222, 70, 153),
(223, 71, 154),
(224, 71, 155),
(225, 71, 156),
(226, 71, 157),
(227, 71, 158),
(228, 71, 159),
(229, 71, 160),
(230, 71, 161),
(231, 72, 162),
(232, 72, 163),
(233, 72, 164),
(234, 72, 165),
(235, 72, 166),
(236, 72, 167),
(237, 72, 168),
(238, 72, 169);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `computers`
--

CREATE TABLE `computers` (
  `id` int(20) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `activity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `computers`
--

INSERT INTO `computers` (`id`, `name`, `activity`) VALUES
(14, 'jdchavarro-pc', 45),
(15, 'jdchavarro-pc', 43),
(16, 'jdchavarro-pc', 44),
(17, 'jdchavarro-pc', 46),
(19, '192.168.1.58', 48),
(22, '192.168.1.58', 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE `conceptos` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `img` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`id`, `name`, `description`, `img`) VALUES
(1, 'Suma de Enteros', '', 'Suma de Enteros.png'),
(2, 'Supresion de signos', '', 'Supresion de signos.png'),
(3, 'Resta de Enteros', '', 'Resta de Enteros.png'),
(4, 'Multiplicacion de Enteros', '', 'Multiplicacion de Enteros.png'),
(5, 'Propiedad Distributiva', '', 'Propiedad Distributiva.png'),
(6, 'Division de enteros', '', 'Division de enteros.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exercises`
--

CREATE TABLE `exercises` (
  `id` int(10) NOT NULL,
  `title` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `img` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `exercises`
--

INSERT INTO `exercises` (`id`, `title`, `description`, `img`, `type`) VALUES
(36, 'S1 - Contexto - Ejercicio 1', 'El valor absoluto geomÃ©tricamente es la distancia de un nÃºmero a cero', 'S1 - Contexto - Ejercicio 1.png', 'multiple'),
(37, 'S1 - Contexto - Ejercicio 2', 'Dos nÃºmeros son opuestos cuando tienen distinto signo y se encuentran a la misma distancia de cero\r\nPor ejemplo -3 es el opuesto de 3 y el opuesto de 15 es -15\r\nTeniendo en cuenta lo anterior indica en la siguiente lista cuÃ¡les son los nÃºmeros opuestos de -7', NULL, 'multiple'),
(38, 'S1 - Contexto - Ejercicio 3', 'Al sumar el valor absoluto de 7 con el valor absoluto de -18 se tiene', NULL, 'unica'),
(39, 'S1 - Contexto - Ejercicio 4', 'Rellena los siguientes campos segÃºn se indique', NULL, 'completar'),
(40, 'S1 - Contexto - Ejercicio 5', 'Las distancias a cero de los puntos indicados en la siguiente recta numÃ©rica de izquierda a derecha respectivamente son:', 'S1 - Contexto - Ejercicio 5.png', 'unica'),
(41, 'S1 - Contexto - Ejercicio 6', 'Las preguntas 6 a la 10 se responden de acuerdo con la siguiente situaciÃ³n:\r\n\r\n En la cafeterÃ­a escolar se recibieron los siguientes ingresos durante una semana', 'S1 - Contexto - Ejercicio 6.png', 'unica'),
(42, 'S1 - Contexto - Ejercicio 7', 'Para determinar cuanto mÃ¡s se vendiÃ³ el viernes que el miÃ©rcoles, se', NULL, 'unica'),
(43, 'S1 - Contexto - Ejercicio 8', 'QuÃ© dÃ­a tuvo lugar la mayor cantidad de ventas', NULL, 'unica'),
(44, 'S1 - Contexto - Ejercicio 9', 'El tercer dÃ­a de la semana el dueÃ±o de la tienda tiene que cancelar una factura por un valor de $479.400, con quÃ© nÃºmero entero representarÃ­as el valor de la factura', NULL, 'unica'),
(45, 'S1 - Contexto - Ejercicio 10', 'Con que nÃºmero entero representarÃ­as el saldo que quedarÃ­a despuÃ©s de haber cancelado la factura el dÃ­a miÃ©rcoles', NULL, 'unica'),
(46, 'S1 - Aplicacion - Ejercicio 1', 'Teniendo en cuenta la anterior informaciÃ³n responde\r\nSi el punto B se toma como punto de referencia, la afirmaciÃ³n CORRECTA es', 'S1 - Aplicacion - Ejercicio 1.png', 'unica'),
(47, 'S1 - Aplicacion - Ejercicio 2', 'AndrÃ©s y Andrea se ubican a 530 metros de la AlcaldÃ­a. AndrÃ©s le pregunta  a Andrea que si su posiciÃ³n se toma como punto de referencia y desean dirigirse hacia los Juzgados Â¿cuÃ¡l serÃ­a la operaciÃ³n matemÃ¡tica que representa l?.', NULL, 'unica'),
(48, 'S1 - Aplicacion - Ejercicio 3', 'La distancia entre los Juzgados y la AlcaldÃ­a Municipal es:', NULL, 'unica'),
(49, 'S1 - Aplicacion - Ejercicio 4', 'Al tomar el Paso Nivel como punto de referencia, los nÃºmeros que representan los Juzgados y la AlcaldÃ­a Municipal respectivamente son:', NULL, 'unica'),
(50, 'S1 - Aplicacion - Ejercicio 5', 'Un dÃ­a de invierno amaneciÃ³ a 3 grados bajo cero. A las doce del mediodÃ­a la temperatura habÃ­a subido 8 grados, y hasta las cuatro de la tarde subiÃ³ 2 grados mÃ¡s. Desde las cuatro hasta las doce de la noche bajÃ³ 4 grados, y desde las doce a las 6 de la maÃ±ana bajÃ³ 5 grados mÃ¡s. La grÃ¡fica que representa la anterior situaciÃ³n es:', 'S1 - Aplicacion - Ejercicio 5.png', 'unica'),
(51, 'S1 - Aplicacion - Ejercicio 6', 'el nÃºmero que sumado con (-43) da (-54) es', NULL, 'unica'),
(52, 'S1 - Aplicacion - Ejercicio 7', 'Completar los campos para que las siguientes igualdades sean verdaderas:', NULL, 'completar'),
(53, 'S1 - Aplicacion - Ejercicio 8', 'Para realizar la resta (-21) â€“ (-6),  se suma el minuendo con el opuesto del sustraendo. La expresiÃ³n correcta es:', NULL, 'unica'),
(54, 'S1 - Aplicacion - Ejercicio 9', 'El resultado de la sustracciÃ³n del numeral anterior es:', NULL, 'unica'),
(55, 'S1 - Aplicacion - Ejercicio 10', 'Determina el resultado de la siguiente sustracciÃ³n 7 â€“ (-9)', NULL, 'unica'),
(56, 'S1 - Aplicacion - Ejercicio 11', 'De la siguiente lista indica las operaciones efectuadas correctamente:', NULL, 'multiple'),
(57, 'S1 - Aplicacion - Ejercicio 12', 'Lee el procedimiento para suprimir signos de agrupaciÃ³n. De acuerdo con lo leÃ­do la siguiente expresiÃ³n : -17 + (-21) â€“ (-19) â€“ (+10) al suprimÃ­rsele los signos de agrupaciÃ³n quedarÃ­a', NULL, 'unica'),
(58, 'S1 - Aplicacion - Ejercicio 13', 'La respuesta del punto anterior es', NULL, 'unica'),
(59, 'S1 - Aplicacion - Ejercicio 14', 'La expresiÃ³n que representa la pregunta: Â¿QuÃ© nÃºmero restado de 19 da 31? Es:', NULL, 'unica'),
(60, 'S1 - Aplicacion - Ejercicio 15', 'Ernesto saliÃ³ de su casa en la maÃ±ana con $230.000.Primero pagÃ³ los recibos de los servicios de luz y agua por $98.000.Luego, se encontrÃ³ con un amigo que le pagÃ³ $35.000 que le debÃ­a y despuÃ©s pagÃ³ el servicio de telefonÃ­a y tv cable por $110.000. Â¡Con cuÃ¡nto dinero regresÃ³ Ernesto a su casa?', NULL, 'unica'),
(61, 'S1 - Individual 1 - Ejercicio 1', 'Hallar el sumando que hace falta en cada igualdad', NULL, 'completar'),
(62, 'S1 - Individual 1 - Ejercicio 2', 'Representa numÃ©ricamente la siguiente suma', 'S1 - Individual 1 - Ejercicio 2.png', 'unica'),
(63, 'S1 - Individual 1 - Ejercicio 3', 'SeÃ±alas las afirmaciones falsas', NULL, 'multiple'),
(64, 'S1 - Individual 1 - Ejercicio 4', 'Al realizar la operaciÃ³n (-7) +(-5) + (-3)+(-6) se obtiene:', NULL, 'unica'),
(65, 'S1 - Individual 1 - Ejercicio 5', 'El congelador de un frigorÃ­fico tiene una temperatura inicial de â€“ 18oC. En una hora la temperatura disminuye 6oC. La temperatura final es', NULL, 'unica'),
(66, 'S1 - Individual 1 - Ejercicio 6', 'Al eliminar los signos de agrupaciÃ³n de (-4) + (-6) â€“ (- 3) + (-9) â€“ (-5)  y resolver se tiene:', NULL, 'unica'),
(67, 'S1 - Individual 2 - Ejercicio 1', 'Hallar el sumando que hace falta en cada igualdad:', NULL, 'completar'),
(68, 'S1 - Individual 2 - Ejercicio 2', 'Representa numÃ©ricamente la siguiente suma', 'S1 - Individual 2 - Ejercicio 2.png', 'unica'),
(69, 'S1 - Individual 2 - Ejercicio 3', 'SeÃ±ala las afirmaciones correctas:', NULL, 'multiple'),
(70, 'S1 - Individual 2 - Ejercicio 4', 'Al realizar la operaciÃ³n (-7) +(-8) + (-2)+(-3) se obtiene', NULL, 'unica'),
(71, 'S1 - Individual 2 - Ejercicio 5', 'Al eliminar los signos de agrupaciÃ³n de (-5) + (-2) â€“ (- 3) + (-6) â€“ (-5)  y resolver se tiene:', NULL, 'unica'),
(72, 'S1 - Individual 2 - Ejercicio 6', 'El congelador de un frigorÃ­fico tiene una temperatura inicial de â€“ 8oC. En una hora la temperatura disminuye 15oC. La temperatura final es:', NULL, 'unica'),
(73, 'S2 - Contexto - Ejercicio 1', 'Observa la imagen y responde\r\nÂ¿Con quÃ© nÃºmero entero representarÃ­as la deuda de la compaÃ±Ã­a B?', 'S2 - Contexto - Ejercicio 1.png', 'unica'),
(74, 'S2 - Contexto - Ejercicio 2', 'Para saber cuÃ¡nto debe la compaÃ±Ã­a A, la operaciÃ³n que se debe realizar es:', NULL, 'unica'),
(75, 'S2 - Contexto - Ejercicio 3', 'El valor de la deuda de la compaÃ±Ã­a A es:', NULL, 'unica'),
(76, 'S2 - Contexto - Ejercicio 4', 'La siguiente adiciÃ³n (-3 )+ (-3 )+ (-3 )+ (-3 )+ (-3 )+ (-3 )+ (-3 )+ (-3 )+ (-3 ) se puede expresar como : (-3) sumado nueve veces y se representa (-3) x 9\r\nRellena los siguientes campos siguiendo el ejemplo anterior', NULL, 'completar'),
(77, 'S2 - Aplicacion - Ejercicio 1', 'Indica de la siguiente lista las multiplicaciones correctas', NULL, 'multiple'),
(78, 'S2 - Aplicacion - Ejercicio 2', 'Halla el factor desconocido para que la igualdad sea verdadera', NULL, 'completar'),
(79, 'S2 - Aplicacion - Ejercicio 3', 'De acuerdo con la secuencia mostrada en la imagen el nÃºmero que reemplazarÃ­a el signo de interrogaciÃ³n es', 'S2 - Aplicacion - Ejercicio 3.png', 'unica'),
(80, 'S2 - Aplicacion - Ejercicio 4', 'Cierta compaÃ±Ã­a disminuye su rentabilidad en 18 pesos cada mes. Â¿CuÃ¡nto habrÃ¡ perdido al cabo de 3 aÃ±os?', NULL, 'unica'),
(81, 'S2 - Aplicacion - Ejercicio 5', 'Al representar por un nÃºmero entero la pÃ©rdida de la compaÃ±Ã­a en el numeral anterior, se tiene:', NULL, 'unica'),
(82, 'S2 - Aplicacion - Ejercicio 6', 'Observa la imagen y luego responde\r\nAl resolver aplicando la propiedad distributiva (-3) [ (-4) + (  -2)], la opciÃ³n correcta es', 'S2 - Aplicacion - Ejercicio 6.png', 'unica'),
(83, 'S2 - Individual 1 - Ejercicio 1', 'SeÃ±ala las afirmaciones verdaderas', NULL, 'multiple'),
(84, 'S2 - Individual 1 - Ejercicio 2', 'Al realizar el siguiente producto: (-4) (-10) (-3) (-6), la opciÃ³n correcta es', NULL, 'unica'),
(85, 'S2 - Individual 1 - Ejercicio 3', 'Halla el valor de la siguiente expresiÃ³n de acuerdo con los valores que se asignan para cada letra:  -5med, m= -1, e = -2 y d = 3', NULL, 'desplegar'),
(86, 'S2 - Individual 1 - Ejercicio 4', 'Pedro gasta $29.000 cada sÃ¡bado en la entrada para un partido de futbol. Deja de ir a siete  partidos porque no jugaba su equipo favorito. Â¿CuÃ¡nto dinero ahorra en total?', NULL, 'unica'),
(87, 'S2 - Individual 1 - Ejercicio 5', 'Completa los espacios con los factores que hacen verdadera la igualdad', NULL, 'completar'),
(88, 'S2 - Individual 2 - Ejercicio 1', 'SeÃ±ala las afirmaciones que son falsas', NULL, 'multiple'),
(89, 'S2 - Individual 2 - Ejercicio 2', 'Al realizar el siguiente producto: (-3) (-10) (-5) (-7), la opciÃ³n correcta es:', NULL, 'desplegar'),
(90, 'S2 - Individual 2 - Ejercicio 3', 'Halla el valor de la siguiente expresiÃ³n de acuerdo con los valores que se asignan para cada letra:  -5med, m= -1, e = -4 y d = 2', NULL, 'unica'),
(91, 'S2 - Individual 2 - Ejercicio 4', 'Pedro gasta $29.000 cada sÃ¡bado en la entrada para un partido de futbol. Deja de ir a ocho   partidos porque no jugaba su equipo favorito. Â¿CuÃ¡nto dinero ahorra en total?', NULL, 'unica'),
(92, 'S2 - Individual 2 - Ejercicio 5', 'Completa los espacios con los factores que hacen verdadera la igualdad', NULL, 'completar'),
(93, 'S2 - Individual 3 - Ejercicio 1', 'SeÃ±ala las afirmaciones que son falsas', NULL, 'multiple'),
(94, 'S2 - Individual 3 - Ejercicio 2', 'Al realizar el siguiente producto: (-4) (-10) (-3) (-7), la opciÃ³n correcta es:', NULL, 'desplegar'),
(95, 'S2 - Individual 3 - Ejercicio 3', 'Halla el valor de la siguiente expresiÃ³n de acuerdo con los valores que se asignan para cada letra:  -5med, m= -1, e = - 3 y d = 4', NULL, 'unica'),
(96, 'S2 - Individual 3 - Ejercicio 4', 'Harold  gasta $29.000 cada sÃ¡bado en la entrada para un partido de futbol. Deja de ir a cinco  partidos porque no jugaba su equipo favorito. Â¿CuÃ¡nto dinero ahorra en total?', NULL, 'unica'),
(97, 'S2 - Individual 3 - Ejercicio 5', 'Completa los espacios con los factores que hacen verdadera la igualdad', NULL, 'completar'),
(98, 'S3 - Contexto - Ejercicio 1', 'SeÃ±ala de la siguiente lista las palabras que se relacionan con el tÃ©rmino DIVISIÃ“N', NULL, 'multiple'),
(99, 'S3 - Contexto - Ejercicio 2', 'La soluciÃ³n INCORRECTA de la siguiente operaciÃ³n 32 Ã· 4 es:', NULL, 'unica'),
(100, 'S3 - Contexto - Ejercicio 3', '    3. Observa la imagen y responde\r\nEn una granja gastan 160 kilos de grano alimentando a 40 gallinas. CuÃ¡ntos kilos come en promedio cada gallina?', 'S3 - Contexto - Ejercicio 3.png', 'unica'),
(101, 'S3 - Contexto - Ejercicio 4', 'Completa los siguientes campos para que la igualdad sea verdadera', NULL, 'completar'),
(102, 'S3 - Aplicacion - Ejercicio 1', 'Los NÃºmeros del interior de los triÃ¡ngulos se forman a partir de los que le rodena y siguiendo siempre la misma regla (DivisiÃ³n entre nÃºmeros enteros.', 'S3 - Aplicacion - Ejercicio 1.png', 'completar'),
(103, 'S3 - Aplicacion - Ejercicio 2', 'Un nÃºmero entero dividido entre -12 da por cociente 3.', NULL, 'completar'),
(104, 'S3 - Aplicacion - Ejercicio 3', 'A la secciÃ³n de empaques llegaron 3875 huevos, si los huevos deben ser empacados en panales y en cada panal es posible colocar 30 huevos', NULL, 'completar'),
(105, 'S3 - Aplicacion - Ejercicio 4', 'Teniendo en cuenta el ejercicio anterior', NULL, 'completar'),
(106, 'S3 - Aplicacion - Ejercicio 5', 'Escribir los tÃ©rminos que hacen verdadera la igualdad', NULL, 'completar'),
(107, 'S3 - Aplicacion - Ejercicio 6', 'Un nÃºmero entero divido entre -12 da por cociente 3', NULL, 'completar'),
(108, 'S3 - Individual 1 - Ejercicio 1', 'Tres amigos crearon una microempresa pero al finalizar el aÃ±o observaron un balance negativo, en el que las pÃ©rdidas ascendieron a $210.000, ', NULL, 'completar'),
(109, 'S3 - Individual 1 - Ejercicio 2', 'Indica cuales son las operaciones INCORRECTAS', NULL, 'multiple'),
(110, 'S4 - Contexto - Ejercicio 1', 'Si se quiere multiplicar el nÃºmero 2 cinco veces, se tiene:', NULL, 'unica'),
(111, 'S4 - Contexto - Ejercicio 2', 'Al realizar el producto anterior la respuesta es', NULL, 'unica'),
(112, 'S4 - Contexto - Ejercicio 3', 'Observa la imagen y responde:', 'S4 - Contexto - Ejercicio 3.png', 'desplegar'),
(113, 'S4 - Contexto - Ejercicio 4', 'La  expresiÃ³n CORRECTA que permitirÃ­a conocer la cantidad de cabezas que tendrÃ­a la Hidra de Lerna al cabo de un mes es:', NULL, 'unica'),
(114, 'S4 - Aplicacion - Ejercicio 1', 'El exponente en la potenciaciÃ³n representa:', NULL, 'unica'),
(115, 'S4 - Aplicacion - Ejercicio 2', 'Si la base es un nÃºmero entero negativo, cÃ³mo  determinar el signo de la potencia', NULL, 'unica'),
(116, 'S4 - Aplicacion - Ejercicio 3', 'Los signos de las siguientes potencias (-9)<sup>5</sup>    y  (-9)<sup>4</sup> son respectivamente', NULL, 'unica'),
(117, 'S4 - Aplicacion - Ejercicio 4', 'Las preguntas 4 a la 6 se responden teniendo en cuenta la siguiente tabla\r\nEn la fila 1 el exponente tiene un valor de:', 'S4 - Aplicacion - Ejercicio 4.png', 'desplegar'),
(118, 'S4 - Aplicacion - Ejercicio 5', 'En la fila 2 al escribir la expresiÃ³n en forma de potencia se tiene:', NULL, 'unica'),
(119, 'S4 - Aplicacion - Ejercicio 6', 'En la fila 3 la base y el exponente respectivamente son:', NULL, 'desplegar'),
(120, 'S4 - Aplicacion - Ejercicio 7', 'Al escribir  el siguiente producto como potencia (-d)(-d)(-d)(-d)(-d)(-d) la opciÃ³n correcta es:', NULL, 'unica'),
(121, 'S4 - Aplicacion - Ejercicio 8', 'Observa la imagen y responde', 'S4 - Aplicacion - Ejercicio 8.png', 'unica'),
(122, 'S4 - Aplicacion - Ejercicio 9', 'Expresa como una sola potencia\r\n2<sup>3</sup> . 2<sup>4</sup> . 2', NULL, 'unica'),
(123, 'S4 - Aplicacion - Ejercicio 10', 'Escribe con un solo exponente las siguientes potencias\r\n[(-6)<sup>3</sup>]<sup>7</sup>', NULL, 'unica'),
(124, 'S4 - Aplicacion - Ejercicio 11', 'Los valores de los exponentes de los siguientes cociente \r\n(-7)<sup>_</sup> Ã· (-7)<sup>_</sup> = (-7)<sup>7</sup> podrÃ­an ser:', NULL, 'desplegar'),
(125, 'S4 - Aplicacion - Ejercicio 12', 'Observa la imagen y responde', 'S4 - Aplicacion - Ejercicio 12.png', 'desplegar'),
(126, 'S4 - Individual 1 - Ejercicio 1', 'Juanita trajo de su viaje tres paquetes con 3 cajas cada uno, cada caja tiene 3 bolsas y cada bolsa, 3 lÃ¡pices.\r\nLa potencia indicada que refleja la anterior situaciÃ³n es:', NULL, 'unica'),
(127, 'S4 - Individual 1 - Ejercicio 2', 'Con relaciÃ³n al punto anterior cuÃ¡ntos lÃ¡pices trajo juanita', NULL, 'desplegar'),
(128, 'S4 - Individual 1 - Ejercicio 3', 'Al expresar como producto indicado (-6)<sup>4</sup> la opciÃ³n correspondiente es:', NULL, 'unica'),
(129, 'S4 - Individual 1 - Ejercicio 4', 'Al aplicar las propiedades de la potenciaciÃ³n para simplificar la siguiente expresiÃ³n:', 'S4 - Individual 1 - Ejercicio 4.png', 'unica'),
(130, 'S4 - Individual 2 - Ejercicio 1', 'Juanita trajo de su viaje cuatro paquetes con 4 cajas cada uno, cada caja tiene 4 bolsas y cada bolsa, 4  lÃ¡pices.\r\nLa potencia indicada que refleja la anterior situaciÃ³n es:', NULL, 'unica'),
(131, 'S4 - Individual 2 - Ejercicio 2', 'Con relaciÃ³n al punto anterior cuÃ¡ntos lÃ¡pices trajo juanita', NULL, 'desplegar'),
(132, 'S4 - Individual 2 - Ejercicio 3', 'Al expresar como producto indicado (-6)<sup>5</sup> la opciÃ³n correspondiente es:', NULL, 'unica'),
(133, 'S4 - Individual 2 - Ejercicio 4', 'Al aplicar las propiedades de la potenciaciÃ³n para simplificar la siguiente expresiÃ³n:', 'S4 - Individual 2 - Ejercicio 4.png', 'unica'),
(134, 'S5 - Contexto - Ejercicio 1', 'La siguiente tabla ilustra las temperaturas en los paÃ­ses mÃ¡s frÃ­os durante el invierno.\r\nEn la clase de matemÃ¡ticas Daniel manifiesta que el lugar mÃ¡s frÃ­o es Suecia por encontrarse cerca a cero, esta afirmaciÃ³n es INCORRECTA, porque:\r\n', 'S5 - Contexto - Ejercicio 1.png', 'unica'),
(135, 'S5 - Contexto - Ejercicio 2', 'Al ordenar los paÃ­ses de mayor a menor temperatura se tiene:', NULL, 'unica'),
(136, 'S5 - Contexto - Ejercicio 3', 'SegÃºn se muestra en la figura, la expresiÃ³n matemÃ¡tica que representa los desplazamientos de un cartero son:', 'S5 - Contexto - Ejercicio 3.png', 'unica'),
(137, 'S5 - Contexto - Ejercicio 4', 'Observa la imagen\r\nEn cada ejercicio existe una relaciÃ³n entre las tres cantidades de cada arreglo, el nÃºmero que corresponde a la casilla vacÃ­a del literal c es:', 'S5 - Contexto - Ejercicio 4.png', 'desplegar'),
(138, 'S5 - Contexto - Ejercicio 5', 'Teniendo en cuenta la imagen anterior si en el arreglo d. el valor de g es -4 y el valor de h es 9, el nÃºmero correspondiente a la casilla vacÃ­a es:', NULL, 'unica'),
(139, 'S5 - Aplicacion - Ejercicio 1', 'El siguiente grÃ¡fico representa la variaciÃ³n de la temperatura de dos ciudades A y B, desde las 6:00 a.m hasta las 12:00 m del  mismo dÃ­a', 'S5 - Aplicacion - Ejercicio 1.png', 'unica'),
(140, 'S5 - Aplicacion - Ejercicio 2', 'Observa la siguiente imagen con nÃºmeros y luego responde', 'S5 - Aplicacion - Ejercicio 2.png', 'unica'),
(141, 'S5 - Aplicacion - Ejercicio 3', 'Por la tarde el termÃ³metro de la terraza de Victoria marcaba 3oC y por la noche habÃ­a bajado 9 grados Â¿CuÃ¡l de estos termÃ³metros vio Victoria por la noche?', 'S5 - Aplicacion - Ejercicio 3.png', 'desplegar'),
(142, 'S5 - Aplicacion - Ejercicio 4', 'Ã“scar vive en el cuarto piso de un edificio, si el mando del ascensor es el siguiente. (ver figura), que botÃ³n del ascensor debe pulsar para bajar 7 pisos.', 'S5 - Aplicacion - Ejercicio 4.png', 'unica'),
(143, 'S5 - Aplicacion - Ejercicio 5', 'CuÃ¡ntas esferas habrÃ¡n en la figura 25?', 'S5 - Aplicacion - Ejercicio 5.png', 'unica'),
(144, 'S5 - Individual 1 - Ejercicio 1', 'Resuelve las preguntas 1 y 2 con base en el siguiente enunciados\r\nHace una hora el termÃ³metro marcaba â€“2ÂºC y ahora marca 2ÂºC.\r\nIndica la respuesta correcta', NULL, 'unica'),
(145, 'S5 - Individual 1 - Ejercicio 2', 'La temperatura ha variado en', NULL, 'unica'),
(146, 'S5 - Individual 1 - Ejercicio 3', 'En una estaciÃ³n de esquÃ­, la temperatura desciende 2 grados cada hora a partir de las 00:00 y hasta las 8:00. Â¿QuÃ© temperatura hay a las 8:00, si la temperatura a las 00:00 de la noche era de 4 ÂºC?', NULL, 'unica'),
(147, 'S5 - Individual 1 - Ejercicio 4', 'Observa la tabla que representa datos relacionados por una regularidad y luego responde\r\nCuÃ¡les son los valores de x y m respectivamente:', 'S5 - Individual 1 - Ejercicio 4.png', 'unica'),
(148, 'S5 - Individual 1 - Ejercicio 5', 'La  operaciÃ³n representada en la recta numÃ©rica corresponde a:', 'S5 - Individual 1 - Ejercicio 5.png', 'unica'),
(149, 'S5 - Individual 2 - Ejercicio 1', 'Resuelve las preguntas 1 y 2 con base en el siguiente enunciados\r\nHace una hora el termÃ³metro marcaba 2ÂºC y ahora marca -2ÂºC.\r\nIndica la respuesta correcta', NULL, 'desplegar'),
(150, 'S5 - Individual 2 - Ejercicio 2', 'La temperatura ha variado en', NULL, 'unica'),
(151, 'S5 - Individual 2 - Ejercicio 3', 'En una estaciÃ³n de esquÃ­, la temperatura desciende 2 grados cada hora a partir de las 00:00 y hasta las 8:00. Â¿QuÃ© temperatura hay a las 8:00, si la temperatura a las 00:00 de la noche era de 2ÂºC?', NULL, 'unica'),
(152, 'S5 - Individual 2 - Ejercicio 4', 'Observa la tabla que representa datos relacionados por una regularidad y luego responde\r\nCuÃ¡les son los valores de x y m respectivamente:', 'S5 - Individual 2 - Ejercicio 4.png', 'unica'),
(153, 'S5 - Individual 2 - Ejercicio 5', 'La  operaciÃ³n representada en la recta numÃ©rica corresponde a:', 'S5 - Individual 2 - Ejercicio 5.png', 'desplegar'),
(154, 'S6 - Evaluacion Final 1 - Ejercicio 1', 'Complete los campos para que las igualdades sean verdaderas', NULL, 'completar'),
(155, 'S6 - Evaluacion Final 1 - Ejercicio 2', 'Â Un dÃ­a de invierno amaneciÃ³ a 3 grados bajo cero. A las doce del mediodÃ­a la temperatura habÃ­a subido 8 grados, y hasta las cuatro de la tarde subiÃ³ 2 grados mÃ¡s. Desde las cuatro hasta las doce de la noche bajÃ³ 4 grados, y desde las doce a las 6 de la maÃ±ana bajÃ³ 5 grados mÃ¡s. Â¿QuÃ© temperatura hacÃ­a a esa hora?', NULL, 'unica'),
(156, 'S6 - Evaluacion Final 1 - Ejercicio 3', 'Observa la imagen y responde:', 'S6 - Evaluacion Final 1 - Ejercicio 3.png', 'desplegar'),
(157, 'S6 - Evaluacion Final 1 - Ejercicio 4', 'En el siguiente grÃ¡fico se representa la variaciÃ³n de temperatura en cierta ciudad, durante un dÃ­a cualquiera.', 'S6 - Evaluacion Final 1 - Ejercicio 4.png', 'unica'),
(158, 'S6 - Evaluacion Final 1 - Ejercicio 5', 'Un buque ha pescado una gran cantidad de calamar y se dispone a congelarlo. En cÃ¡mara frigorÃ­fica la temperatura desciende 3Â°C cada 5 minutos. Si al principio la cÃ¡mara estÃ¡ a 9Â°c Â¿CuÃ¡nto tiempo tarda en alcanzar una temperatura de - 27Â°c?', NULL, 'unica'),
(159, 'S6 - Evaluacion Final 1 - Ejercicio 6', 'MarÃ­a tiene cinco cajas, en cada caja hay 5 bolsas y en cada bolsa hay 5 chocolatinas. Â¿CuÃ¡ntas chocolatinas tiene MarÃ­a?', NULL, 'unica'),
(160, 'S6 - Evaluacion Final 1 - Ejercicio 7', 'Completa los siguientes campos para que las igualdades sean verdaderas', NULL, 'completar'),
(161, 'S6 - Evaluacion Final 1 - Ejercicio 8', 'La familia MartÃ­nez tiene una deuda de $1.400.000, si en la familia MartÃ­nez hay siete personas y cada uno de ellos debe contribuir en partes iguales para pagar la deuda. Â¡cuÃ¡nto debe cada miembro de la familia?', NULL, 'unica'),
(162, 'S6 - Evaluacion Final 2 - Ejercicio 1', 'Un dÃ­a de invierno amaneciÃ³ a 4 grados bajo cero. A las doce del mediodÃ­a la temperatura habÃ­a subido 8 grados, y hasta las cuatro de la tarde subiÃ³ 2 grados mÃ¡s. Desde las cuatro hasta las doce de la noche bajÃ³ 4 grados, y desde las doce a las 6 de la maÃ±ana bajÃ³ 5 grados mÃ¡s. Â¿QuÃ© temperatura hacÃ­a a esa hora?', NULL, 'unica'),
(163, 'S6 - Evaluacion Final 2 - Ejercicio 2', 'Observa la imagen y responde:', 'S6 - Evaluacion Final 2 - Ejercicio 2.png', 'unica'),
(164, 'S6 - Evaluacion Final 2 - Ejercicio 3', 'Complete los campos para que las igualdades sean verdaderas', NULL, 'completar'),
(165, 'S6 - Evaluacion Final 2 - Ejercicio 4', 'Observa la imagen y responde', 'S6 - Evaluacion Final 2 - Ejercicio 4.png', 'unica'),
(166, 'S6 - Evaluacion Final 2 - Ejercicio 5', 'MarÃ­a tiene seis cajas, en cada caja hay 6 bolsas y en cada bolsa hay 6 chocolatinas. Â¿CuÃ¡ntas chocolatinas tiene MarÃ­a?', NULL, 'unica'),
(167, 'S6 - Evaluacion Final 2 - Ejercicio 6', 'Completa los siguientes campos para que las igualdades sean verdaderas', NULL, 'completar'),
(168, 'S6 - Evaluacion Final 2 - Ejercicio 7', 'La familia MartÃ­nez tiene una deuda de $1.800.000, si en la familia MartÃ­nez hay seis personas y cada uno de ellos debe contribuir en partes iguales para pagar la deuda. Â¿cuÃ¡nto debe cada miembro de la familia?', NULL, 'unica'),
(169, 'S6 - Evaluacion Final 2 - Ejercicio 8', 'En el siguiente grÃ¡fico se representa la variaciÃ³n de temperatura en cierta ciudad, durante un dÃ­a cualquiera. Determine el tiempo transcurrido entre la menor y la mayor temperatura', 'S6 - Evaluacion Final 2 - Ejercicio 8.png', 'unica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responses`
--

CREATE TABLE `responses` (
  `id` int(20) NOT NULL,
  `exercise` int(20) NOT NULL,
  `description` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `img` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `solution` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `responses`
--

INSERT INTO `responses` (`id`, `exercise`, `description`, `img`, `solution`) VALUES
(207, 36, 'a. Si un nÃºmero es positivo, entonces, su valor absoluto es positivo', '', '1'),
(208, 36, 'b. Si un nÃºmero es negativo, entonces, su valor absoluto es positivo', '', '1'),
(209, 36, 'c. El valor absoluto de -5 es -5', '', '0'),
(210, 36, 'd. El valor absoluto de -10 es 10', '', '1'),
(211, 36, 'e. El valor absoluto de +7 es +7', '', '1'),
(212, 37, 'a. 7+ 2', '', '0'),
(213, 37, 'b. -7', '', '0'),
(214, 37, 'c. 49 Ã· 7', '', '1'),
(215, 37, 'd. 5 + 2', '', '1'),
(216, 37, 'e. 7', '', '1'),
(217, 37, 'f. (7 x 2) Ã· 2', '', '1'),
(218, 37, 'g. 12 â€“ 5', '', '1'),
(219, 37, 'h. 28 -21', '', '1'),
(220, 37, 'i. 21 â€“ 14', '', '1'),
(221, 37, 'j. 0 â€“ 7', '', '0'),
(222, 38, '    a. -11', '', '0'),
(223, 38, '    b. 20', '', '0'),
(224, 38, '    c. 25', '', '1'),
(225, 38, '    d. 11', '', '0'),
(226, 39, 'El opuesto de â€“(6) es _', NULL, '6'),
(227, 39, 'El opuesto de 13 es', NULL, '-13'),
(228, 39, '    c. El valor absoluto de 110 es _', NULL, '110'),
(229, 39, 'El opuesto de (+9) es', NULL, '-9'),
(230, 39, 'El valor absoluto de -8 es', NULL, '8'),
(231, 40, '    a. -9, -4, -1,-3 y 7', '', '0'),
(232, 40, '    b. 7, 3, 1, 6 y 9', '', '0'),
(233, 40, '    c. 9, 6, 3, 1 y 7', '', '0'),
(234, 40, '    d. 9,6, 1, 3 y 7', '', '1'),
(235, 41, '    a. SustracciÃ³n', '', '0'),
(236, 41, '    b. MultiplicaciÃ³n', '', '0'),
(237, 41, '    c. AdiciÃ³n', '', '1'),
(238, 41, '    d. Resta', '', '0'),
(239, 42, '    a. Resta', '', '1'),
(240, 42, '    b. Suma', '', '0'),
(241, 42, '    c. Multiplica', '', '0'),
(242, 42, '    d. Divide', '', '0'),
(243, 43, '    a. Lunes', '', '0'),
(244, 43, '    b. Martes', '', '0'),
(245, 43, '    c. Viernes', '', '1'),
(246, 43, '    d. Jueves', '', '0'),
(247, 44, '    a. +479.400', '', '0'),
(248, 44, '    b. -479.400', '', '1'),
(249, 44, '    c. +419.400', '', '0'),
(250, 44, '    d. -419.400', '', '0'),
(251, 45, '    a. 0', '', '0'),
(252, 45, '    b. -60.000', '', '1'),
(253, 45, '    c. +60.000', '', '0'),
(254, 45, '    d. -59.400', '', '0'),
(255, 46, 'El punto A se encuentra a 320 m del punto B', '', '0'),
(256, 46, 'El punto C se encuentra a -660 m del punto A', '', '0'),
(257, 46, 'El punto A se encuentra a -320 m del punto B', '', '1'),
(258, 46, 'Ninguna de las anteriores', '', '0'),
(259, 47, '(530) + (-320) = -210', '', '0'),
(260, 47, '530 + 320 = 850', '', '0'),
(261, 47, '(-530) + 320 = 210', '', '0'),
(262, 47, '(-530) + (-320) = -850', '', '1'),
(263, 48, '1640 m', '', '0'),
(264, 48, '320 m', '', '1'),
(265, 48, '340 m', '', '0'),
(266, 48, '1300 m', '', '0'),
(267, 49, '-660 y -320', '', '0'),
(268, 49, '-660 y -980', '', '0'),
(269, 49, '-980 y -320', '', '0'),
(270, 49, '-980 y -660', '', '1'),
(271, 50, 'a', '', '1'),
(272, 50, 'b', '', '0'),
(273, 50, 'c', '', '0'),
(274, 50, 'd', '', '0'),
(275, 51, 'a.  11', '', '0'),
(276, 51, 'b. -97', '', '0'),
(277, 51, 'c. -11', '', '1'),
(278, 51, 'd. 97', '', '0'),
(279, 52, '(-8 ) +  _ = -28', NULL, '-20'),
(280, 52, '_ + (+13) = +8', NULL, '-5'),
(281, 52, '(+23) + _ = +35', NULL, '12'),
(282, 52, '(+15) + _ = -7', NULL, '-22'),
(283, 52, '_ + (-21) = -10', NULL, '11'),
(284, 52, '(-3) + _ = -12', NULL, '-9'),
(285, 53, 'a.  (-21) + (6)', '', '1'),
(286, 53, 'b. (21) + (-6)', '', '0'),
(287, 53, 'c. (-21) + (-6)', '', '0'),
(288, 53, 'd. 21 + 6', '', '0'),
(289, 54, 'a. 27', '', '0'),
(290, 54, 'b.  -27', '', '0'),
(291, 54, 'c.  -15', '', '1'),
(292, 54, 'd. 15', '', '0'),
(293, 55, 'a. 2', '', '0'),
(294, 55, 'b. 16', '', '1'),
(295, 55, 'c. -2', '', '0'),
(296, 55, 'd. -16', '', '0'),
(297, 56, 'a. -8 â€“(+12) = -20', '', '1'),
(298, 56, 'b. 12 + (+3) = 9', '', '0'),
(299, 56, 'c. 11 -9 = -2', '', '0'),
(300, 56, 'd. (-14) â€“ (-22) = +8', '', '1'),
(301, 56, 'e. 7 â€“ 12 = -5', '', '1'),
(302, 57, 'a. â€“ 17 + 21  - 19+10', '', '0'),
(303, 57, 'b. - 17 - 21 + 19 â€“ 10', '', '1'),
(304, 57, 'c. 17 - 21 + 19 - 10', '', '0'),
(305, 57, 'd. â€“ 17 â€“ 21 â€“ 19 â€“ 10', '', '0'),
(306, 58, 'a. -5', '', '0'),
(307, 58, 'b. 25', '', '0'),
(308, 58, 'c. -33', '', '0'),
(309, 58, 'd. -29', '', '1'),
(310, 59, 'a. 19 - 12 = 31', '', '0'),
(311, 59, 'b. 19 â€“ (-12)  = 31', '', '1'),
(312, 59, 'c. 19 â€“ (+12) = 31', '', '0'),
(313, 59, 'd. -12- 19 = 31', '', '0'),
(314, 60, 'a. $-22.000', '', '0'),
(315, 60, 'b. $-57.000', '', '0'),
(316, 60, 'c. $57.000', '', '1'),
(317, 60, 'd. $22.000', '', '0'),
(318, 61, 'a.    (-5) +  _ = -9 ', NULL, '-4'),
(319, 61, 'b. _ + (-2) + (-3) = 17', NULL, '22'),
(320, 62, '-6 + 4 = 10', '', '0'),
(321, 62, '-6 + (-10) = 4', '', '0'),
(322, 62, '-6 + 10 = 4', '', '1'),
(323, 62, '-6 â€“ 4 = -10', '', '0'),
(324, 63, 'El signo de la suma de dos enteros negativos es positivo', '', '1'),
(325, 63, 'Para sumar enteros con diferente signo, se restan sus valores absolutos y al resultado se lo pone el signo del nÃºmero con menor valor absoluto', '', '1'),
(326, 63, 'El signo de la resta  de dos enteros negativos siempre serÃ¡ negativo', '', '1'),
(327, 63, 'El nÃºmero entero que sumado con 1 da -1 es 2', '', '1'),
(328, 64, '21', '', '0'),
(329, 64, '-20', '', '0'),
(330, 64, '-21', '', '1'),
(331, 64, '20', '', '0'),
(332, 65, '12 Â°C', '', '0'),
(333, 65, '-12 Â°C', '', '0'),
(334, 65, '24 Â°C', '', '0'),
(335, 65, '-24 Â°C', '', '1'),
(336, 66, 'â€“ 4 + 6 â€“ 3 â€“ 9 â€“ 5 = -15', '', '0'),
(337, 66, '- 4 â€“ 6 + 3 + 9 + 5 = 7', '', '0'),
(338, 66, '- 4 â€“ 6  -  3 â€“ 9 + 5 = - 17 ', '', '0'),
(339, 66, 'â€“ 4 â€“ 6 + 3 â€“ 9 + 5 = -11', '', '1'),
(340, 67, 'a.    (-13) + _ = -19', NULL, '-6'),
(341, 67, 'b. _ + (-5) + (-3) = 16', NULL, '24'),
(342, 68, '(-4) + 6 = 2', '', '0'),
(343, 68, '(+6) + (-10) =-  4', '', '1'),
(344, 68, '(+6) + (10) = 4', '', '0'),
(345, 68, '(+6) + (-4) = 10', '', '0'),
(346, 69, 'El signo de la suma de dos enteros negativos es positivo', '', '0'),
(347, 69, 'Para sumar enteros con diferente signo, se  restan sus valores absolutos y al resultado se lo pone el signo del nÃºmero con  mayor  valor absoluto', '', '1'),
(348, 69, 'El signo de la suma de cinco  nÃºmeros enteros negativos es negativo', '', '1'),
(349, 69, 'El nÃºmero entero que restado de 1 da -1 es -2', '', '1'),
(350, 70, '20', '', '0'),
(351, 70, '-15', '', '0'),
(352, 70, '15', '', '0'),
(353, 70, '-20', '', '1'),
(354, 71, 'â€“ 5 â€“ 2 + 3 â€“ 6 + 5 = - 5', '', '1'),
(355, 71, 'â€“ 5 + 2 + 3 â€“ 5 = - 5', '', '0'),
(356, 71, '- 5 â€“ 2 + 3 â€“ 6 â€“ 5 = - 15', '', '0'),
(357, 71, 'â€“ 5 + 2  - 3 + 6 â€“ 5 = - 5', '', '0'),
(358, 72, '7 Â°C', '', '0'),
(359, 72, '-7 Â°C', '', '0'),
(360, 72, '23 Â°C', '', '0'),
(361, 72, '-23 Â°C', '', '1'),
(362, 73, '13â€™000.000', '', '0'),
(363, 73, '-1â€™300.000', '', '0'),
(364, 73, '-13â€™000.000', '', '1'),
(365, 73, 'â€“ 130â€™000.000', '', '0'),
(366, 74, 'DivisiÃ³n', '', '0'),
(367, 74, 'SustracciÃ³n', '', '0'),
(368, 74, 'MultiplicaciÃ³n', '', '1'),
(369, 74, 'PotenciaciÃ³n', '', '0'),
(370, 75, '65â€™000.000', '', '1'),
(371, 75, '650â€™000.000', '', '0'),
(372, 75, '6â€™500.000', '', '0'),
(373, 75, '650.000', '', '0'),
(374, 76, '1+ 1 + 1 + 1  El 1 sumado  4  veces  1 X _', NULL, '4'),
(375, 76, '(-6) + (-6) + (-6) + (-6) + (-6)  El (-6) sumado 5 veces  _ x 5', NULL, '-6'),
(376, 77, '(-3) x (4) x ( -6) = 72', '', '1'),
(377, 77, '(-10)(9) = -90', '', '1'),
(378, 77, '(1)(-1)(-8)(0)= -8', '', '0'),
(379, 77, '(5) (2) (-1) = -10', '', '1'),
(380, 78, '(-12) ( _ ) = 24', NULL, '-2'),
(381, 78, '(8) (-8) ( _ ) = -64', NULL, '1'),
(382, 78, '( _ ) (4) (9) (-1) = -72', NULL, '2'),
(383, 78, '(1 ) ( _ ) (2) = -150', NULL, '-75'),
(384, 79, 'a. 192', '', '0'),
(385, 79, 'b.  21', '', '0'),
(386, 79, 'c. -21', '', '0'),
(387, 79, 'd. -192', '', '1'),
(388, 80, 'HabrÃ¡ perdido 216 pesos', '', '0'),
(389, 80, 'HabrÃ¡ perdido 128 pesos', '', '0'),
(390, 80, 'HabrÃ¡ perdido 54 pesos', '', '0'),
(391, 80, 'HabrÃ¡ perdido 648 pesos', '', '1'),
(392, 81, '-216', '', '0'),
(393, 81, '-648', '', '1'),
(394, 81, '-128', '', '0'),
(395, 81, '-54', '', '0'),
(396, 82, '(-3)(-4) + (-3)(-2)=  (-12) + (-6) = -18', '', '0'),
(397, 82, '(-3)(-4) + (-3)(-2)= 12 + 6 = 18', '', '1'),
(398, 82, '(-3)(-4) + (-3)(2)=    -12 - 6 = --18', '', '0'),
(399, 82, '(3)(4) + (3)(2)=  12 + 6 = 18', '', '0'),
(400, 83, 'El signo del siguiente producto es negativo (- 4) x (-7)', '', '0'),
(401, 83, 'El producto entre dos nÃºmeros enteros de diferente signo es negativo', '', '1'),
(402, 83, 'El producto de todo nÃºmero entero por cero da como resultado el mismo nÃºmero', '', '0'),
(403, 83, 'El signo del producto de siete nÃºmeros negativos es negativo', '', '1'),
(404, 83, 'El producto de tres nÃºmeros enteros es positivo, si uno de ellos es negativo, los signos de los otros factores son uno negativo y el otro positivo', '', '1'),
(405, 84, '720', '', '1'),
(406, 84, 'â€“ 23', '', '0'),
(407, 84, '23', '', '0'),
(408, 84, '-720', '', '0'),
(409, 85, '0', NULL, '0'),
(410, 85, '-30', NULL, '1'),
(411, 85, '30', NULL, '0'),
(412, 85, 'Ninguna de las anteriores', NULL, '0'),
(413, 86, '$200.000', '', '0'),
(414, 86, '$201.000', '', '0'),
(415, 86, '$207.000', '', '0'),
(416, 86, '$203.000', '', '1'),
(417, 87, '_ x -8 = - 32', NULL, '4'),
(418, 87, '-20 x _ = 120', NULL, '-6'),
(419, 87, '_ x 12 = -36', NULL, '-3'),
(420, 87, '-15 x _ = 90', NULL, '-6'),
(421, 87, '_ x 5 x 2 = -70', NULL, '-7'),
(422, 88, 'El signo del siguiente producto es negativo (- 4) x (-7)', '', '1'),
(423, 88, 'El producto entre dos nÃºmeros enteros de diferente signo es positivo', '', '1'),
(424, 88, 'El producto de todo nÃºmero entero por cero da como resultado el mismo nÃºmero', '', '1'),
(425, 88, 'El signo del producto de siete nÃºmeros negativos es negativo', '', '0'),
(426, 88, 'El producto de tres nÃºmeros enteros es positivo, si uno de ellos es negativo, los signos de los otros factores son uno negativo y el otro positivo', '', '0'),
(427, 89, '- 1050', NULL, '0'),
(428, 89, 'â€“ 25', NULL, '0'),
(429, 89, '25', NULL, '0'),
(430, 89, '1050', NULL, '1'),
(431, 90, '- 40', '', '1'),
(432, 90, '-35', '', '0'),
(433, 90, '35', '', '0'),
(434, 90, 'Ninguna de las anteriores', '', '0'),
(435, 91, '$230.000', '', '0'),
(436, 91, '$221.000', '', '0'),
(437, 91, '$232.000', '', '1'),
(438, 91, '$233.000', '', '0'),
(439, 92, '_ x -8 = - 40', NULL, '5'),
(440, 92, '-20 x _ = 60', NULL, '-3'),
(441, 92, '_ x 14 = -42', NULL, '-3'),
(442, 92, '-11 x _ = 66', NULL, '-6'),
(443, 92, '_ x 5 x 2 = -90', NULL, '-9'),
(444, 93, 'El signo del siguiente producto es positivo ( 10) x (-7)', '', '1'),
(445, 93, 'El producto entre dos nÃºmeros enteros de diferente signo es negativo', '', '0'),
(446, 93, 'El producto de todo nÃºmero entero por cero da como resultado cero', '', '0'),
(447, 93, 'El signo del producto de siete nÃºmeros negativos es positivo', '', '1'),
(448, 93, 'El producto de tres nÃºmeros enteros es negativo, si uno de ellos es negativo, los signos de los otros factores son uno negativo y el otro positivo', '', '1'),
(449, 94, '840', NULL, '1'),
(450, 94, 'â€“ 24', NULL, '0'),
(451, 94, '24', NULL, '0'),
(452, 94, '- 840', NULL, '0'),
(453, 95, '- 13', '', '0'),
(454, 95, '-60', '', '1'),
(455, 95, '35', '', '0'),
(456, 95, 'Ninguna de las anteriores', '', '0'),
(457, 96, '$14.500', '', '0'),
(458, 96, '$128.000', '', '0'),
(459, 96, '$136.000', '', '0'),
(460, 96, '$145.000', '', '1'),
(461, 97, '_ x -5 = - 45', NULL, '9'),
(462, 97, '-10 x _ = 60', NULL, '-6'),
(463, 97, '_ x 6 = -42', NULL, '-7'),
(464, 97, '-11 x _ = 99', NULL, '-9'),
(465, 97, '_ x 5 x 2 = -100', NULL, '-10'),
(466, 98, 'Repartir', '', '1'),
(467, 98, 'Distribuir', '', '1'),
(468, 98, 'Agregar', '', '0'),
(469, 98, 'Reunir', '', '0'),
(470, 98, 'Partir', '', '1'),
(471, 99, '12 â€“ 4', '', '0'),
(472, 99, '4 x 2', '', '0'),
(473, 99, '2 x 2 x 2', '', '0'),
(474, 99, '2 x 3', '', '1'),
(475, 100, '40 kilos', '', '0'),
(476, 100, '2 kilos', '', '0'),
(477, 100, '4 kilos', '', '1'),
(478, 100, 'Ninguna de las anteriores', '', '0'),
(479, 101, '4 x 8 = 32 porque 32 Ã· _ = 8', NULL, '4'),
(480, 101, '11 x 2 = 22 porque 22 Ã· _ = 2', NULL, '11'),
(481, 101, '20 x 6 = 120 porque _ Ã·20 = 6', NULL, '120'),
(482, 101, '_ x 5 = 45 porque  45 Ã· 5 = 9', NULL, '9'),
(483, 102, 'CuÃ¡l es el nÃºmero que falta en el triangulo _', NULL, '-2'),
(484, 103, 'Â¿CuÃ¡l es ese nÃºmero? _', NULL, '-36'),
(485, 104, 'Â¿cuÃ¡ntos panales de huevos lograron empacar? _', NULL, '129'),
(486, 105, 'Cuantos huevos quedaron sin empacar? _', NULL, '5'),
(487, 106, '(-4) Ã· _ = -2', NULL, '2'),
(488, 106, '_  Ã· 6= -4', NULL, '-24'),
(489, 106, '51 Ã· _ = -3', NULL, '-17'),
(490, 106, '- 12 Ã· Â­_ = 4', NULL, '-3'),
(491, 106, '_ Ã· -7= -5', NULL, '35'),
(492, 106, '36 Ã· _ = -6', NULL, '-6'),
(493, 106, '_ Ã· (-11) = 8', NULL, '-88'),
(494, 106, '(-27) Ã· _ = -3', NULL, '9'),
(495, 106, '_ Ã· (-5) = 4', NULL, '-20'),
(496, 106, '(-30) Ã· _ = -2', NULL, '15'),
(497, 107, 'Â¿CuÃ¡l es ese nÃºmero? _', NULL, '-36'),
(498, 108, 'Â¿cuÃ¡l debe ser el aporte de cada uno, si deben responder por las pÃ©rdidas en partes iguales?', NULL, '70000'),
(499, 109, '(36) Ã· (-12) = 3', '', '1'),
(500, 109, '( - 169) Ã· (-13) = 13', '', '0'),
(501, 109, '(-114) Ã· 3 = -41', '', '1'),
(502, 109, '100 Ã· (-25) = 4', '', '1'),
(503, 110, '2 x 5', '', '0'),
(504, 110, '2 x 2 x 2 x 2', '', '0'),
(505, 110, '(2)(5)', '', '0'),
(506, 110, '(2)(2)(2)(2)(2)', '', '1'),
(507, 111, '32', '', '1'),
(508, 111, '10', '', '0'),
(509, 111, '16', '', '0'),
(510, 111, 'Ninguna de las anteriores', '', '0'),
(511, 112, '6 y 20 cabezas respectivamente', NULL, '0'),
(512, 112, '1024 y 8 cabezas respectivamente', NULL, '0'),
(513, 112, '8 y 1024 cabezas respectivamente', NULL, '1'),
(514, 112, '20 y 6 cabezas respectivamente', NULL, '0'),
(515, 113, 'Multiplicar el  nÃºmero 2 por la cantidad de dÃ­as que tiene un mes', '', '0'),
(516, 113, 'Multiplicar el nÃºmero 2 treinta veces', '', '1'),
(517, 113, 'Multiplicar el nÃºmero 30 por dos', '', '0'),
(518, 113, 'a y c', '', '0'),
(519, 114, 'Las veces que se debe multiplicar la potencia', '', '0'),
(520, 114, 'Las veces en que se debe multiplicar la base por si misma', '', '1'),
(521, 114, 'El nÃºmero por el que hay que multiplicar la base', '', '0'),
(522, 114, 'a y c', '', '0'),
(523, 115, 'Identificando si el exponente es positivo o negativo, si es positivo el signo de la potencia serÃ¡ positivo, si es negativo el signo de la potencia serÃ¡ negativo', '', '0'),
(524, 115, 'Identificando si el exponente es par o impar, si es par el signo de la potencia serÃ¡ negativo, si es negativo el signo de la potencia serÃ¡ positivo', '', '0'),
(525, 115, 'Identificando si el exponente es positivo o negativo, si es positivo el signo de la potencia serÃ¡ negativo, si es negativo compuesto el signo de la potencia serÃ¡ positivo', '', '0'),
(526, 115, 'Identificando si el exponente es par o impar, si es par el signo de la potencia serÃ¡ positivo, si es impar el signo de la potencia serÃ¡ negativo', '', '1'),
(527, 116, 'a.	Negativo y positivo', '', '1'),
(528, 116, 'b.	Negativos', '', '0'),
(529, 116, 'c.	Positivos ', '', '0'),
(530, 116, 'd.	Positivo y negativo', '', '0'),
(531, 117, '7', NULL, '0'),
(532, 117, '-7', NULL, '0'),
(533, 117, '3', NULL, '1'),
(534, 117, '343', NULL, '0'),
(535, 118, '3<sup>6</sup>', '', '0'),
(536, 118, '6<sup>3</sup>', '', '0'),
(537, 118, '(-6)<sup>3</sup>', '', '1'),
(538, 118, '(-3)<sup>6</sup>', '', '0'),
(539, 119, '6 y 3', NULL, '0'),
(540, 119, '3 y 8', NULL, '0'),
(541, 119, '3 y 6', NULL, '0'),
(542, 119, 'Ninguna de las anteriores', NULL, '1'),
(543, 120, '(-d)<sup>6</sup>', '', '1'),
(544, 120, '(d)<sup>6</sup>', '', '0'),
(545, 120, '(d)<sup>-6</sup>', '', '0'),
(546, 120, '-(d)<sup>6</sup>', '', '0'),
(547, 121, '3<sup>5</sup> y en total tiene 243 chocolates', '', '0'),
(548, 121, '5<sup>3</sup> y tiene 125 chocolates', '', '1'),
(549, 121, '5<sup>3</sup> y tiene 15 chocolates', '', '0'),
(550, 121, '3<sup>5</sup> y en total tiene 125 chocolates', '', '0'),
(551, 122, '2<sup>7</sup>', '', '0'),
(552, 122, '2<sup>8</sup>', '', '1'),
(553, 122, '2<sup>12</sup>', '', '0'),
(554, 122, '2<sup>2</sup>', '', '0'),
(555, 123, '(-6)<sup>10</sup>', '', '0'),
(556, 123, '(-6)<sup>4</sup>', '', '0'),
(557, 123, '(-6)<sup>21</sup>', '', '1'),
(558, 123, '(6)<sup>21</sup>', '', '0'),
(559, 124, '3 y 4 respectivamente', NULL, '0'),
(560, 124, '5 y 2 respectivamente', NULL, '0'),
(561, 124, '10  y 3 respectivamente', NULL, '1'),
(562, 124, '7 y 1 respectivamente', NULL, '0'),
(563, 125, '$207.200', NULL, '1'),
(564, 125, '$121.800', NULL, '0'),
(565, 125, '$131.600', NULL, '0'),
(566, 125, 'Ninguna de las anteriores', NULL, '0'),
(567, 126, '4<sup>3</sup>', '', '0'),
(568, 126, '3<sup>4</sup>', '', '1'),
(569, 126, '3<sup>3</sup>', '', '0'),
(570, 126, '2<sup>4</sup>', '', '0'),
(571, 127, '81 lÃ¡pices', NULL, '1'),
(572, 127, '64 lÃ¡pices', NULL, '0'),
(573, 127, '27 lÃ¡pices', NULL, '0'),
(574, 127, '12 lÃ¡pices', NULL, '0'),
(575, 128, '(-4) (-4) (-4)', '', '0'),
(576, 128, '(-6) (-6) (-6) (-6) (-6)', '', '0'),
(577, 128, '(-6) (-6) (-6) (-6)', '', '1'),
(578, 128, '(-4)(-4)(-4)(-4)(-4)(-4)', '', '0'),
(579, 129, '(-1)<sup>4</sup>', '', '0'),
(580, 129, '(-1)<sup>10</sup>', '', '0'),
(581, 129, '(-1)<sup>44</sup>', '', '0'),
(582, 129, '(-1)<sup>5</sup>', '', '1'),
(583, 130, '4<sup>3</sup>', '', '0'),
(584, 130, '3<sup>4</sup>', '', '0'),
(585, 130, '3<sup>3</sup>', '', '0'),
(586, 130, '4<sup>4</sup>', '', '1'),
(587, 131, '16 lÃ¡pices', NULL, '0'),
(588, 131, '256  lÃ¡pices', NULL, '1'),
(589, 131, '64 lÃ¡pices', NULL, '0'),
(590, 131, '12 lÃ¡pices', NULL, '0'),
(591, 132, '(-5) (-5) (-5)', '', '0'),
(592, 132, '(-6) (-6) (-6) (-6) (-6)', '', '1'),
(593, 132, '(-6) (-6) (-6) (-6)', '', '0'),
(594, 132, '(-4)(-4)(-4)(-4)(-4)(-4)', '', '0'),
(595, 133, '(-3)<sup>4</sup>', '', '0'),
(596, 133, '(-3)<sup>10</sup>', '', '0'),
(597, 133, '(-3)<sup>44</sup>', '', '0'),
(598, 133, '(-3)<sup>5</sup>', '', '1'),
(599, 134, 'Entre mÃ¡s cerca se encuentre la temperatura de cero hace menos frÃ­o, porque el nÃºmero es mayor', '', '0'),
(600, 134, 'Entre mÃ¡s alejado de cero se encuentre la temperatura hace mÃ¡s frÃ­o, debido a que todo nÃºmero ubicado mÃ¡s hacia la izquierda de cero es menor', '', '0'),
(601, 134, 'El paÃ­s mÃ¡s frio es MoscÃº, porque -40 oC se encuentra mÃ¡s alejado de cero', '', '0'),
(602, 134, 'Todas las anteriores', '', '1'),
(603, 135, 'Mongolia, Islandia, Suecia, CanadÃ¡ y MoscÃº.', '', '0'),
(604, 135, 'Suecia, CanadÃ¡, Islandia, Mongolia y MoscÃº', '', '1'),
(605, 135, 'Suecia, MoscÃº, Islandia, Mongolia y CanadÃ¡', '', '0'),
(606, 135, 'Suecia, Islandia, MoscÃº, CanadÃ¡ y Mongolia', '', '0'),
(607, 136, '(-3) + 8 + 2 + (-4) + (-4) + (-4)', '', '1'),
(608, 136, '(-3) + 5 + 2 + (-3) + (-1) + (-5)', '', '0'),
(609, 136, '(-3) + (- 8 )+ (-2 )+ (-4) + (-4) + (-4)', '', '0'),
(610, 136, '3 + 8 + 2 + (-4) + (-4) + (-4)', '', '0'),
(611, 137, '-14', NULL, '0'),
(612, 137, '48', NULL, '1'),
(613, 137, '-2', NULL, '0'),
(614, 137, '2', NULL, '0'),
(615, 138, '-36', '', '1'),
(616, 138, '5', '', '0'),
(617, 138, '-13', '', '0'),
(618, 138, '13', '', '0'),
(619, 139, 'A las 8:00 a.m., la temperatura de la ciudad A fue de 5oC mÃ¡s que la temperatura de la ciudad B', '', '0'),
(620, 139, 'En la ciudad B siempre se presentÃ³ una temperatura mayor o igual que en la ciudad A.', '', '1'),
(621, 139, 'La diferencia entre la mayor temperatura y la menor temperatura registradas en la ciudad B es 30Â°C', '', '0'),
(622, 139, 'Entre las 6:00 a.m. y las 10:00 a.m., la variaciÃ³n de la temperatura en la ciudad A fue de 25 oC', '', '0'),
(623, 140, 'El grupo 1 contiene los nÃºmeros pares y el grupo 2 los cuadrados perfectos de los cinco primeros nÃºmeros', '', '0'),
(624, 140, 'El grupo 1 contiene los dobles de los nÃºmeros 2,3,4, y 6 y el grupo dos el triple de los nÃºmeros 2, 3, 4, 5 y 6', '', '0'),
(625, 140, 'El grupo 1 contiene los cuadrados de 2,3,4,5, 6  y el grupo 2 el cubo de 2, 3, 4, 5 y 6 respectivamente', '', '1'),
(626, 140, 'a y c', '', '0'),
(627, 141, 'TermÃ³metro 1', NULL, '0'),
(628, 141, 'TermÃ³metro 2', NULL, '1'),
(629, 141, 'TermÃ³metro 3', NULL, '0'),
(630, 141, 'TermÃ³metro 4', NULL, '0'),
(631, 142, '-3', '', '1'),
(632, 142, '6', '', '0'),
(633, 142, '-1', '', '0'),
(634, 142, '-2', '', '0'),
(635, 143, '47 esferas', '', '1'),
(636, 143, '51 esferas', '', '0'),
(637, 143, '53 esferas', '', '0'),
(638, 143, '49 esferas', '', '0'),
(639, 144, 'La temperatura ha disminuido', '', '0'),
(640, 144, 'La temperatura se ha mantenido', '', '0'),
(641, 144, 'La temperatura ha aumentado', '', '1'),
(642, 144, 'No se pueden comparar', '', '0'),
(643, 145, '2Â°C', '', '0'),
(644, 145, '4Â°C', '', '1'),
(645, 145, '6Â°C', '', '0'),
(646, 145, 'No hay variaciÃ³n de temperatura', '', '0'),
(647, 146, '36ÂºC', '', '0'),
(648, 146, '-12ÂºC', '', '1'),
(649, 146, '20ÂºC', '', '0'),
(650, 146, '16ÂºC', '', '0'),
(651, 147, '100 y 10', '', '0'),
(652, 147, '10 y 100', '', '0'),
(653, 147, '11 y 81', '', '1'),
(654, 147, '81 y 11', '', '0'),
(655, 148, 'La suma de dos nÃºmeros enteros de igual signo', '', '0'),
(656, 148, 'La suma de dos nÃºmeros enteros de signos positivos', '', '0'),
(657, 148, 'La suma de dos nÃºmeros enteros negativos', '', '0'),
(658, 148, 'La suma de dos nÃºmeros enteros de diferente signo', '', '1'),
(659, 149, 'La temperatura ha disminuido', NULL, '1'),
(660, 149, 'La temperatura se ha mantenido', NULL, '0'),
(661, 149, 'La temperatura ha aumentado', NULL, '0'),
(662, 149, 'No se pueden comparar', NULL, '0'),
(663, 150, '2Â°C', '', '1'),
(664, 150, '4Â°C', '', '0'),
(665, 150, '6Â°C', '', '0'),
(666, 150, 'No hay variaciÃ³n de temperatura', '', '0'),
(667, 151, '36ÂºC', '', '0'),
(668, 151, '-12ÂºC', '', '0'),
(669, 151, '-14ÂºC', '', '1'),
(670, 151, '16ÂºC', '', '0'),
(671, 152, '100 y 10', '', '0'),
(672, 152, '10 y 100', '', '0'),
(673, 152, '11 y 81', '', '1'),
(674, 152, '81 y 11', '', '0'),
(675, 153, 'La suma de dos nÃºmeros enteros de igual signo', NULL, '0'),
(676, 153, 'La suma de dos nÃºmeros enteros de signos positivos', NULL, '0'),
(677, 153, 'La suma de dos nÃºmeros enteros negativos', NULL, '0'),
(678, 153, 'La suma de dos nÃºmeros enteros de diferente signo', NULL, '1'),
(679, 154, '_ + (-3) = -10', NULL, '-7'),
(680, 154, '(-12) + _ = -4', NULL, '8'),
(681, 154, '6 + _ = 13', NULL, '7'),
(682, 154, '(-19) + (-9) = _', NULL, '-28'),
(683, 154, '13 + (-20) = _', NULL, '-7'),
(684, 155, '-2 grados centÃ­grados', '', '1'),
(685, 155, '3 grados centÃ­grados', '', '0'),
(686, 155, '-5 grados centÃ­grados', '', '0'),
(687, 155, '-3 grados centÃ­grados', '', '0'),
(688, 156, 'B,D,C,A', NULL, '0'),
(689, 156, 'C, A, D,B', NULL, '1'),
(690, 156, 'B,D, A, C', NULL, '0'),
(691, 156, 'C, D, B, A', NULL, '0'),
(692, 157, '-6Â°C y 2:00 a.m.', '', '1'),
(693, 157, '-6Â°C y 2:00 p.m.', '', '0'),
(694, 157, '-2Â°C y 8:00 a.m.', '', '0'),
(695, 157, '-2Â°C y 8:00 p.m.', '', '0'),
(696, 158, '1 hora y 5 minutos', '', '0'),
(697, 158, '1 hora y 10 minutos', '', '0'),
(698, 158, '1 hora', '', '1'),
(699, 158, 'Hora y media', '', '0'),
(700, 159, '15 chocolatinas', '', '0'),
(701, 159, '125 chocolatinas', '', '1'),
(702, 159, '25 chocolatinas', '', '0'),
(703, 159, '115 chocolatinas', '', '0'),
(704, 160, '(-4)(-8) = _', NULL, '32'),
(705, 160, '(7)(-1)(-1) = _', NULL, '7'),
(706, 160, '(-1)(-1)(-1)(-1) = _', NULL, '1'),
(707, 160, '(2)(-3)(4) = _', NULL, '-24'),
(708, 161, '$2.000.000', '', '0'),
(709, 161, '$2.000', '', '0'),
(710, 161, '$200.000', '', '1'),
(711, 161, '$20.000', '', '0'),
(712, 162, 'a. -2 grados centÃ­grados', '', '0'),
(713, 162, 'b. 3 grados centÃ­grados', '', '0'),
(714, 162, 'c. -5 grados centÃ­grados', '', '0'),
(715, 162, 'd. -3 grados centÃ­grados', '', '1'),
(716, 163, 'B,D,C,A', '', '0'),
(717, 163, 'C, A, D,B', '', '1'),
(718, 163, 'B,D, A, C', '', '0'),
(719, 163, 'C, D, B, A', '', '0'),
(720, 164, '_ + (-2) = -10', NULL, '-8'),
(721, 164, '(-13) + _ = -4', NULL, '9'),
(722, 164, '6 + _ = 15', NULL, '9'),
(723, 164, '(-13) + (-9) = _', NULL, '-22'),
(724, 164, '13 + (-21) = _', NULL, '-8'),
(725, 165, '-81Â°c', '', '1'),
(726, 165, '-75Â°c', '', '0'),
(727, 165, '-90Â°c', '', '0'),
(728, 165, 'Ninguna de las anteriores', '', '0'),
(729, 166, '18 chocolatinas', '', '0'),
(730, 166, '36 chocolatinas', '', '0'),
(731, 166, '216 chocolatinas', '', '1'),
(732, 166, '12 chocolatinas', '', '0'),
(733, 167, '(-3)(-8) = _', NULL, '24'),
(734, 167, '(5)(-1)(-1) = _', NULL, '5'),
(735, 167, '(-1)(-1)(-1)(-1) = _', NULL, '1'),
(736, 167, '(2)(-6)(4) = _', NULL, '-48'),
(737, 168, '$3.000.000', '', '0'),
(738, 168, '$3.000', '', '0'),
(739, 168, '$30.000', '', '0'),
(740, 168, '$300.000', '', '1'),
(741, 169, '14 horas', '', '1'),
(742, 169, '4 horas', '', '0'),
(743, 169, '16 horas', '', '0'),
(744, 169, '8 horas', '', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student_activities`
--

CREATE TABLE `student_activities` (
  `id` int(20) NOT NULL,
  `activity` int(20) NOT NULL,
  `student` int(20) NOT NULL,
  `status` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rating` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student_responses`
--

CREATE TABLE `student_responses` (
  `id` int(50) NOT NULL,
  `student` int(20) NOT NULL,
  `activity` int(20) NOT NULL,
  `exercise` int(20) NOT NULL,
  `response` int(20) NOT NULL,
  `answer` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `lastName` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `rol`, `name`, `lastName`) VALUES
(1, 'd', 'd', 'teacher', 'Diana Maria', 'Balanta Borja'),
(7, '1000516684', '1000516684', 'student', 'Andres Felipe', 'Guarin Agudelo'),
(8, '1000516685', '1000516685', 'student', 'Dayanna Stefany', 'Guarin Agudelo'),
(9, '1043298501', '1043298501', 'student', 'Miguel Angel', 'Parra Gutierrez'),
(10, '1105675128', '1105675128', 'student', 'Leidy Alexandra', 'PeÃ±a Hernandez'),
(11, '1110287192', '1110287192', 'student', 'Alejandro', 'Gutierrez Lopez'),
(12, '1114240574', '1114240574', 'student', 'Jean Derlyn', 'Giraldo Hernandez'),
(13, '1114953030', '1114953030', 'student', 'Laura Marcela', 'Gonzales Bermudez'),
(14, '1116070922', '1116070922', 'student', 'Hector Leandro', 'Arango Garcia'),
(15, '1116071024', '1116071024', 'student', 'Felipe', 'Ortiz Bocanegra'),
(16, '1116071593', '1116071593', 'student', 'Jake Steven', 'Romero Calero'),
(17, '1116071696', '1116071696', 'student', 'Santiago', 'Gonzalez Giraldo'),
(18, '1116238098', '1116238098', 'student', 'Nicolas', 'Gutierrez Escudero'),
(19, '1117013272', '1117013272', 'student', 'Luisa Maria', 'Hidalgo Ospina'),
(20, '1117014232', '1117014232', 'student', 'Daniela', 'Giraldo Hernandez'),
(21, '1117014346', '1117014346', 'student', 'Maria de los Angeles', 'Torres Valencia'),
(22, '1117014534', '1117014534', 'student', 'Laionan Stik', 'Holguin Vanegas'),
(23, '1117014616', '1117014616', 'student', 'Juan Manuel', 'Rodriguez Acevedo'),
(24, '1117014675', '1117014675', 'student', 'David Santiago', 'Hurtado Collazos'),
(25, '1117014836', '1117014836', 'student', 'Esteban', 'Arana Arana'),
(26, '1117014859', '1117014859', 'student', 'Manuela', 'Monsalve Rivera'),
(27, '1117015051', '1117015051', 'student', 'Juan Alejandro', 'Pereira Vinasco'),
(28, '1117015489', '1117015489', 'student', 'Juan Esteban', 'Lopez Henao'),
(29, '1117015585', '1117015585', 'student', 'Juan Pablo', 'Ospina Rincon'),
(30, '1117015638', '1117015638', 'student', 'Katerin Johanna', 'Largo Grajales'),
(31, '1117015724', '1117015724', 'student', 'Isabella', 'Quirama Ochoa'),
(32, '1117015762', '1117015762', 'student', 'Daniel Andres', 'Gaviria Rodas'),
(33, '1117015844', '1117015844', 'student', 'Angelo', 'Angulo Bedoya'),
(34, '1117016153', '1117016153', 'student', 'Santiago', 'Parra Serna'),
(35, '1117016381', '1117016381', 'student', 'Yeferson', 'Garcia Alzate'),
(36, '1117016624', '1117016624', 'student', 'Dilan', 'Osorio Diaz'),
(37, '1117348880', '1117348880', 'student', 'Juan David', 'Gomez Henao'),
(38, '1117349727', '1117349727', 'student', 'Juan Esteban', 'Sandoval Restrepo'),
(39, '1117349948', '1117349948', 'student', 'Yeimer', 'Gordillo Barreto'),
(40, '1117350210', '1117350210', 'student', 'Maria Lucia', 'Gomez Moncada'),
(41, '1117350305', '1117350305', 'student', 'Kevin Stiven', 'Lopez Bedoya'),
(42, '1117350351', '1117350351', 'student', 'Jennifer Andrea', 'Olaya Maya'),
(43, '1122921839', '1122921839', 'student', 'Hector Santiago', 'Lopez Marquez'),
(44, '1126806372', '1126806372', 'student', 'Kevin', 'Hernandez Mazo'),
(45, '1127792547', '1127792547', 'student', 'Maria Isabella', 'Rojas Hernandez');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `activity_has_exercises`
--
ALTER TABLE `activity_has_exercises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `computers`
--
ALTER TABLE `computers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `student_activities`
--
ALTER TABLE `student_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `student_responses`
--
ALTER TABLE `student_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `activity_has_exercises`
--
ALTER TABLE `activity_has_exercises`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT de la tabla `computers`
--
ALTER TABLE `computers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT de la tabla `responses`
--
ALTER TABLE `responses`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=745;

--
-- AUTO_INCREMENT de la tabla `student_activities`
--
ALTER TABLE `student_activities`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `student_responses`
--
ALTER TABLE `student_responses`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
