-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 24, 2018 at 02:12 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edusoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(20) NOT NULL,
  `title` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `students` int(2) NOT NULL,
  `status` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `after` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `title`, `type`, `students`, `status`, `after`) VALUES
(15, 'Actividad Completa', 'actividad', 2, 'asignada', NULL),
(16, 'Actividad Completa 2', 'actividad', 3, 'asignada', 15),
(17, 'Examen', 'examen', 1, 'asignada', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activity_has_exercises`
--

CREATE TABLE `activity_has_exercises` (
  `id` int(50) NOT NULL,
  `activity` int(20) NOT NULL,
  `exercise` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `activity_has_exercises`
--

INSERT INTO `activity_has_exercises` (`id`, `activity`, `exercise`) VALUES
(9, 15, 26),
(10, 15, 29),
(11, 15, 28),
(12, 16, 27),
(13, 17, 26),
(14, 17, 29),
(15, 17, 27),
(16, 17, 28);

-- --------------------------------------------------------

--
-- Table structure for table `conceptos`
--

CREATE TABLE `conceptos` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `img` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `conceptos`
--

INSERT INTO `conceptos` (`id`, `name`, `description`, `img`) VALUES
(8, 'test', 'test', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ejercicio`
--

CREATE TABLE `ejercicio` (
  `idEjercicio` int(11) NOT NULL,
  `tituloEjercicio` varchar(50) NOT NULL,
  `descripcionEjercicio` varchar(300) DEFAULT NULL,
  `imagenEjercicio` varchar(45) DEFAULT NULL,
  `solucionEjercicio` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `estudiante`
--

CREATE TABLE `estudiante` (
  `idEstudiante` int(11) NOT NULL,
  `nombreEstudiante` varchar(45) DEFAULT NULL,
  `apellidoEstudiante` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `estudiante_has_examen`
--

CREATE TABLE `estudiante_has_examen` (
  `Estudiante_idEstudiante` int(11) NOT NULL,
  `Examen_idExamen` int(11) NOT NULL,
  `calificacionExamen` varchar(45) DEFAULT NULL,
  `resuelto` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `estudiante_has_examen_has_ejercicio`
--

CREATE TABLE `estudiante_has_examen_has_ejercicio` (
  `Estudiante_idEstudiante` int(11) NOT NULL,
  `Examen_has_Ejercicio_Examen_idExamen` int(11) NOT NULL,
  `Examen_has_Ejercicio_Ejercicio_idEjercicio` int(11) NOT NULL,
  `solucionEstudiante` varchar(45) DEFAULT NULL,
  `buena` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examen`
--

CREATE TABLE `examen` (
  `idExamen` int(11) NOT NULL,
  `temaExamen` varchar(45) DEFAULT NULL,
  `tipoExamen` varchar(45) NOT NULL,
  `cantidadEstudiantesExamen` int(11) DEFAULT NULL COMMENT 'Individual\nGrupal',
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examen_has_ejercicio`
--

CREATE TABLE `examen_has_ejercicio` (
  `Examen_idExamen` int(11) NOT NULL,
  `Ejercicio_idEjercicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `id` int(10) NOT NULL,
  `title` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `img` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`id`, `title`, `description`, `img`, `type`) VALUES
(26, 'completar suma', 'Complete la siguiente suma', NULL, 'completar'),
(27, 'multiple resta', 'Seleccione las restas correctas', NULL, 'multiple'),
(28, 'unica multiplicacion', 'de las siguientes multiplicaciones, seleccione la verdadera', NULL, 'unica'),
(29, 'desplegar division', 'la operacion 2 / 2 = 1 es', NULL, 'desplegar');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `id` int(20) NOT NULL,
  `exercise` int(20) NOT NULL,
  `description` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `img` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `solution` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`id`, `exercise`, `description`, `img`, `solution`) VALUES
(168, 26, '2 + _ = 5', NULL, '3'),
(169, 27, '2 - 3 = 1', '', '0'),
(170, 27, '2 - 3 = -1', '', '1'),
(171, 27, '3 - 2 = 1', '', '1'),
(172, 28, '2 x 3 = 5', '', '0'),
(173, 28, '2 x 3 = 6', '', '1'),
(174, 28, '2 x 3 = 7', '', '0'),
(175, 29, 'verdadera', NULL, '1'),
(176, 29, 'falsa', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `rol`, `name`, `lastName`) VALUES
(1, 'd', 'd', 'teacher', 'Diana Maria', 'Balanta Borja'),
(2, '1', '1', 'student', 'Julian David', 'Chavarro Balanta'),
(3, '2', '2', 'student', 'Sara', 'Bermudez Rincon'),
(4, '3', '3', 'student', 'Ana Victoria', 'Chavarro Bermudez'),
(5, '4', '4', 'student', 'Isaac', 'Chavarro Bermudez');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `username` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_has_exercises`
--
ALTER TABLE `activity_has_exercises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD PRIMARY KEY (`idEjercicio`);

--
-- Indexes for table `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idEstudiante`);

--
-- Indexes for table `estudiante_has_examen`
--
ALTER TABLE `estudiante_has_examen`
  ADD PRIMARY KEY (`Estudiante_idEstudiante`,`Examen_idExamen`),
  ADD KEY `fk_Estudiante_has_Examen_Examen1_idx` (`Examen_idExamen`),
  ADD KEY `fk_Estudiante_has_Examen_Estudiante_idx` (`Estudiante_idEstudiante`);

--
-- Indexes for table `estudiante_has_examen_has_ejercicio`
--
ALTER TABLE `estudiante_has_examen_has_ejercicio`
  ADD PRIMARY KEY (`Estudiante_idEstudiante`,`Examen_has_Ejercicio_Examen_idExamen`,`Examen_has_Ejercicio_Ejercicio_idEjercicio`),
  ADD KEY `fk_Estudiante_has_Examen_has_Ejercicio_Examen_has_Ejercicio_idx` (`Examen_has_Ejercicio_Examen_idExamen`,`Examen_has_Ejercicio_Ejercicio_idEjercicio`),
  ADD KEY `fk_Estudiante_has_Examen_has_Ejercicio_Estudiante1_idx` (`Estudiante_idEstudiante`);

--
-- Indexes for table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`idExamen`);

--
-- Indexes for table `examen_has_ejercicio`
--
ALTER TABLE `examen_has_ejercicio`
  ADD PRIMARY KEY (`Examen_idExamen`,`Ejercicio_idEjercicio`),
  ADD KEY `fk_Examen_has_Ejercicio_Ejercicio1_idx` (`Ejercicio_idEjercicio`),
  ADD KEY `fk_Examen_has_Ejercicio_Examen1_idx` (`Examen_idExamen`);

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `activity_has_exercises`
--
ALTER TABLE `activity_has_exercises`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estudiante_has_examen`
--
ALTER TABLE `estudiante_has_examen`
  ADD CONSTRAINT `fk_Estudiante_has_Examen_Estudiante` FOREIGN KEY (`Estudiante_idEstudiante`) REFERENCES `estudiante` (`idEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estudiante_has_Examen_Examen1` FOREIGN KEY (`Examen_idExamen`) REFERENCES `examen` (`idExamen`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `estudiante_has_examen_has_ejercicio`
--
ALTER TABLE `estudiante_has_examen_has_ejercicio`
  ADD CONSTRAINT `fk_Estudiante_has_Examen_has_Ejercicio_Estudiante1` FOREIGN KEY (`Estudiante_idEstudiante`) REFERENCES `estudiante` (`idEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estudiante_has_Examen_has_Ejercicio_Examen_has_Ejercicio1` FOREIGN KEY (`Examen_has_Ejercicio_Examen_idExamen`,`Examen_has_Ejercicio_Ejercicio_idEjercicio`) REFERENCES `examen_has_ejercicio` (`Examen_idExamen`, `Ejercicio_idEjercicio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `examen_has_ejercicio`
--
ALTER TABLE `examen_has_ejercicio`
  ADD CONSTRAINT `fk_Examen_has_Ejercicio_Ejercicio1` FOREIGN KEY (`Ejercicio_idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Examen_has_Ejercicio_Examen1` FOREIGN KEY (`Examen_idExamen`) REFERENCES `examen` (`idExamen`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
