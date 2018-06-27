-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 27, 2018 at 11:19 PM
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
  `after` int(20) DEFAULT NULL,
  `grupo` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `title`, `type`, `students`, `status`, `after`, `grupo`) VALUES
(42, 'actividad unica', 'actividad', 3, 'resuelto', NULL, NULL),
(43, 'evaluacion general 1', 'examen', 1, 'resuelto', 42, 1),
(44, 'evaluacion general 2', 'examen', 1, 'resuelto', NULL, 1),
(45, 'evaluacion especial julian', 'examen', 1, 'resuelto', 42, 1),
(46, 'evaluacion especial jose', 'examen', 1, 'resuelto', 42, 1);

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
(74, 36, 30),
(75, 36, 33),
(76, 37, 31),
(77, 37, 32),
(78, 38, 30),
(79, 38, 33),
(80, 38, 31),
(81, 38, 32),
(82, 39, 30),
(83, 39, 33),
(84, 39, 31),
(85, 39, 32),
(86, 40, 30),
(87, 41, 33),
(88, 42, 30),
(89, 43, 30),
(90, 43, 33),
(91, 43, 31),
(92, 43, 32),
(93, 44, 30),
(94, 44, 33),
(95, 44, 31),
(96, 44, 32),
(97, 45, 30),
(98, 46, 33);

-- --------------------------------------------------------

--
-- Table structure for table `computers`
--

CREATE TABLE `computers` (
  `id` int(20) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `activity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `computers`
--

INSERT INTO `computers` (`id`, `name`, `activity`) VALUES
(14, 'jdchavarro-pc', 45),
(15, 'jdchavarro-pc', 43),
(16, 'jdchavarro-pc', 44),
(17, 'jdchavarro-pc', 46);

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
(1, 'Concepto1', 'Descripcion', 'Concepto1.png'),
(2, 'Concepto 2', 'Descripcion', 'Concepto 2.png');

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
(30, 'Completar Suma', 'completar', 'Completar Suma.png', 'completar'),
(31, 'Multiple resta', 'multiple', NULL, 'multiple'),
(32, 'unica multiplicacion', 'unica', NULL, 'unica'),
(33, 'desplegar division', 'varias', NULL, 'desplegar');

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
(186, 30, '2 + _ = 5', NULL, '3'),
(187, 30, '_ - 4 = 6', NULL, '10'),
(188, 31, 'solo descripcion', '', '1'),
(189, 31, 'solo imagen', '31-1.jpeg', '0'),
(190, 31, 'imagen descripcion', '31-2.png', '1'),
(191, 31, 'des', '', '0'),
(192, 32, 'abc', '', '0'),
(193, 32, '', '32-1.png', '0'),
(194, 32, 'ac', '32-2.jpeg', '1'),
(195, 33, 'a', NULL, '0'),
(196, 33, 'b', NULL, '1'),
(197, 33, 'c', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `student_activities`
--

CREATE TABLE `student_activities` (
  `id` int(20) NOT NULL,
  `activity` int(20) NOT NULL,
  `student` int(20) NOT NULL,
  `status` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rating` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `student_activities`
--

INSERT INTO `student_activities` (`id`, `activity`, `student`, `status`, `rating`) VALUES
(152, 42, 2, 'calificado', 5),
(153, 42, 1, 'calificado', 5),
(154, 42, 3, 'calificado', 5),
(155, 42, 4, 'calificado', 5),
(156, 42, 5, 'calificado', 5),
(157, 46, 5, 'calificado', 5),
(158, 45, 1, 'calificado', 5),
(159, 43, 2, 'calificado', 2),
(160, 44, 3, 'calificado', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_responses`
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

--
-- Dumping data for table `student_responses`
--

INSERT INTO `student_responses` (`id`, `student`, `activity`, `exercise`, `response`, `answer`, `rating`) VALUES
(329, 1, 42, 30, 186, '3', 1),
(330, 1, 42, 30, 187, '10', 1),
(331, 2, 42, 30, 186, '3', 1),
(332, 2, 42, 30, 187, '10', 1),
(333, 5, 42, 30, 186, '3', 1),
(334, 5, 42, 30, 187, '10', 1),
(335, 4, 42, 30, 186, '3', 1),
(336, 4, 42, 30, 187, '10', 1),
(337, 3, 42, 30, 186, '3', 1),
(338, 3, 42, 30, 187, '10', 1),
(339, 1, 45, 30, 186, '3', 1),
(340, 1, 45, 30, 187, '10', 1),
(341, 2, 43, 30, 186, '3', 1),
(342, 2, 43, 30, 187, '10', 1),
(343, 2, 43, 33, 195, '0', 0),
(344, 2, 43, 32, 194, '1', 1),
(345, 2, 43, 31, 188, '0', 0),
(346, 2, 43, 31, 189, '1', 0),
(347, 2, 43, 31, 190, '0', 0),
(348, 2, 43, 31, 191, '1', 0),
(349, 3, 44, 30, 186, '', 0),
(350, 3, 44, 30, 187, '', 0),
(351, 3, 44, 33, 195, '0', 0),
(352, 3, 44, 31, 188, '0', 0),
(353, 3, 44, 31, 189, '1', 0),
(354, 3, 44, 31, 190, '0', 0),
(355, 3, 44, 31, 191, '1', 0),
(356, 3, 44, 32, 194, '1', 0),
(357, 5, 46, 33, 196, '1', 1);

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
(5, '4', '4', 'student', 'Isaac', 'Chavarro Bermudez'),
(6, '5', '5', 'student', 'Jose Daniel', 'Zapata Balanta');

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
-- Indexes for table `computers`
--
ALTER TABLE `computers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `student_activities`
--
ALTER TABLE `student_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_responses`
--
ALTER TABLE `student_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `activity_has_exercises`
--
ALTER TABLE `activity_has_exercises`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `computers`
--
ALTER TABLE `computers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `student_activities`
--
ALTER TABLE `student_activities`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `student_responses`
--
ALTER TABLE `student_responses`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
