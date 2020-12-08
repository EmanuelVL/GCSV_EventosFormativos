-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2020 at 04:25 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db13`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `autoevalRealizada` (IN `idEF` INT, IN `idUsuario` INT)  NO SQL
SELECT COUNT(*) AS autoeval FROM autoevaluacion
    WHERE autoevaluacion.idEF = idEF
    AND autoevaluacion.idUsuario = idUsuario
    AND autoevaluacion.r1 IS NOT NULL
    AND autoevaluacion.r2 IS NOT NULL
    AND autoevaluacion.r3 IS NOT NULL
    AND autoevaluacion.r4 IS NOT NULL
    AND autoevaluacion.r5 IS NOT NULL$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `evaldocRealizada` (IN `idEF` INT, IN `idUsuario` INT)  NO SQL
SELECT COUNT(*) AS evaldoc FROM evaluaciondocente
    WHERE evaluaciondocente.idEF = idEF
    AND evaluaciondocente.idUsuario = idUsuario
    AND evaluaciondocente.r1 IS NOT NULL
    AND evaluaciondocente.r2 IS NOT NULL
    AND evaluaciondocente.r3 IS NOT NULL
    AND evaluaciondocente.r4 IS NOT NULL
    AND evaluaciondocente.r5 IS NOT NULL$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `evalproRealizada` (IN `idEF` INT, IN `idUsuario` INT)  NO SQL
SELECT COUNT(*) AS evalpro FROM evaluacionprograma
    WHERE evaluacionprograma.idEF = idEF
    AND evaluacionprograma.idUsuario = idUsuario
    AND evaluacionprograma.r1 IS NOT NULL
    AND evaluacionprograma.r2 IS NOT NULL
    AND evaluacionprograma.r3 IS NOT NULL
    AND evaluacionprograma.r4 IS NOT NULL
    AND evaluacionprograma.r5 IS NOT NULL$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listaEFTerminados` (IN `idUsuario` INT)  NO SQL
SELECT * FROM eventoformativo INNER JOIN detalleeventoparticipante ON eventoformativo.idEF = detalleeventoparticipante.idEF WHERE detalleeventoparticipante.idUsuario = idUsuario AND eventoformativo.fechaFinal <= DATE(NOW())$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `participanteAprobado` (IN `idEF` INT, IN `idUsuario` INT)  NO SQL
SELECT aprobado FROM detalleeventoparticipante
WHERE detalleeventoparticipante.idEF = idEF AND detalleeventoparticipante.idUsuario = idUsuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `participantesEvaluados` (IN `idEF` INT)  NO SQL
SELECT evalParticipantes FROM eventoformativo WHERE eventoformativo.idEF = idEF$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectEF` (IN `idEF` INT)  NO SQL
SELECT eventoformativo.nombreEF, DAY(eventoformativo.fechaInicio) AS diaInicio, MONTH(eventoformativo.fechaInicio) AS mesInicio, DAY(eventoformativo.fechaFinal) AS diaFinal, MONTH(eventoformativo.fechaFinal) AS mesFinal, eventoformativo.duracion FROM eventoformativo WHERE eventoformativo.idEF = idEF$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listaEFTerminadosInstructores` (IN `idUsuario` INT)  NO SQL
SELECT * FROM eventoformativo INNER JOIN instructor ON eventoformativo.idInstructor = instructor.idInstructor WHERE instructor.idUsuario = idUsuario AND eventoformativo.fechaFinal <= DATE(NOW())$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `autoevaluacion`
--

CREATE TABLE `autoevaluacion` (
  `idUsuario` int(11) NOT NULL,
  `idEF` int(11) NOT NULL,
  `r1` text,
  `r2` text,
  `r3` text,
  `r4` text,
  `r5` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detalleeventomodulo`
--

CREATE TABLE `detalleeventomodulo` (
  `idEF` int(11) NOT NULL,
  `idModulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detalleeventoparticipante`
--

CREATE TABLE `detalleeventoparticipante` (
  `idEF` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `aprobado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluaciondocente`
--

CREATE TABLE `evaluaciondocente` (
  `idUsuario` int(11) NOT NULL,
  `idEF` int(11) NOT NULL,
  `r1` text,
  `r2` text,
  `r3` text,
  `r4` text,
  `r5` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluacionprograma`
--

CREATE TABLE `evaluacionprograma` (
  `idUsuario` int(11) NOT NULL,
  `idEF` int(11) NOT NULL,
  `r1` text,
  `r2` text,
  `r3` text,
  `r4` text,
  `r5` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventoformativo`
--

CREATE TABLE `eventoformativo` (
  `idEF` int(11) NOT NULL,
  `nombreEF` varchar(80) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFinal` date NOT NULL,
  `modalidad` varchar(10) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `idInstructor` int(11) NOT NULL,
  `idInstancia` int(11) NOT NULL,
  `diseñoInstruccional` text,
  `utilidadOportunidad` text,
  `requisitosParticipacion` text,
  `requisitosAcreditacion` text,
  `condicionesOperativas` text,
  `cuota` decimal(4,1) NOT NULL DEFAULT '0.0',
  `duracion` int(11) DEFAULT NULL,
  `evalParticipantes` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `idInstructor` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `calidadProfesional` text,
  `calidadAcademica` text,
  `curriculumSintetico` text,
  `experiencia` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `modulo`
--

CREATE TABLE `modulo` (
  `idModulo` int(11) NOT NULL,
  `idEF` int(11) NOT NULL,
  `nombreModulo` varchar(60) NOT NULL,
  `contenidoModulo` text,
  `duracionModulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tipoevento`
--

CREATE TABLE `tipoevento` (
  `idTipo` int(11) NOT NULL,
  `nombreTipo` varchar(20) NOT NULL,
  `minModulos` tinyint(4) NOT NULL DEFAULT '1',
  `minHoras` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipoevento`
--

INSERT INTO `tipoevento` (`idTipo`, `nombreTipo`, `minModulos`, `minHoras`) VALUES
(1, 'Curso', 1, 20),
(2, 'Taller', 1, 10),
(3, 'Programa Especial', 1, 20),
(4, 'Diplomado', 2, 120);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `apellidoUsuario` varchar(50) DEFAULT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `esInstancia` tinyint(1) NOT NULL DEFAULT '0',
  `esAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autoevaluacion`
--
ALTER TABLE `autoevaluacion`
  ADD PRIMARY KEY (`idUsuario`,`idEF`),
  ADD KEY `idEF` (`idEF`);

--
-- Indexes for table `detalleeventomodulo`
--
ALTER TABLE `detalleeventomodulo`
  ADD PRIMARY KEY (`idEF`,`idModulo`),
  ADD KEY `idModulo` (`idModulo`);

--
-- Indexes for table `detalleeventoparticipante`
--
ALTER TABLE `detalleeventoparticipante`
  ADD PRIMARY KEY (`idEF`,`idUsuario`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `evaluaciondocente`
--
ALTER TABLE `evaluaciondocente`
  ADD PRIMARY KEY (`idUsuario`,`idEF`),
  ADD KEY `idEF` (`idEF`);

--
-- Indexes for table `evaluacionprograma`
--
ALTER TABLE `evaluacionprograma`
  ADD PRIMARY KEY (`idUsuario`,`idEF`),
  ADD KEY `idEF` (`idEF`);

--
-- Indexes for table `eventoformativo`
--
ALTER TABLE `eventoformativo`
  ADD PRIMARY KEY (`idEF`),
  ADD UNIQUE KEY `nombreEF` (`nombreEF`,`fechaInicio`),
  ADD KEY `FK_Tipo` (`idTipo`),
  ADD KEY `FK_Inst` (`idInstructor`),
  ADD KEY `FK_Instancia` (`idInstancia`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`idInstructor`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idModulo`);

--
-- Indexes for table `tipoevento`
--
ALTER TABLE `tipoevento`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventoformativo`
--
ALTER TABLE `eventoformativo`
  MODIFY `idEF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `idInstructor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idModulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tipoevento`
--
ALTER TABLE `tipoevento`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `autoevaluacion`
--
ALTER TABLE `autoevaluacion`
  ADD CONSTRAINT `autoevaluacion_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `autoevaluacion_ibfk_2` FOREIGN KEY (`idEF`) REFERENCES `eventoformativo` (`idEF`);

--
-- Constraints for table `detalleeventomodulo`
--
ALTER TABLE `detalleeventomodulo`
  ADD CONSTRAINT `detalleeventomodulo_ibfk_1` FOREIGN KEY (`idEF`) REFERENCES `eventoformativo` (`idEF`),
  ADD CONSTRAINT `detalleeventomodulo_ibfk_2` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`);

--
-- Constraints for table `detalleeventoparticipante`
--
ALTER TABLE `detalleeventoparticipante`
  ADD CONSTRAINT `detalleeventoparticipante_ibfk_1` FOREIGN KEY (`idEF`) REFERENCES `eventoformativo` (`idEF`),
  ADD CONSTRAINT `detalleeventoparticipante_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Constraints for table `evaluaciondocente`
--
ALTER TABLE `evaluaciondocente`
  ADD CONSTRAINT `evaluaciondocente_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `evaluaciondocente_ibfk_2` FOREIGN KEY (`idEF`) REFERENCES `eventoformativo` (`idEF`);

--
-- Constraints for table `evaluacionprograma`
--
ALTER TABLE `evaluacionprograma`
  ADD CONSTRAINT `evaluacionprograma_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `evaluacionprograma_ibfk_2` FOREIGN KEY (`idEF`) REFERENCES `eventoformativo` (`idEF`);

--
-- Constraints for table `eventoformativo`
--
ALTER TABLE `eventoformativo`
  ADD CONSTRAINT `FK_Inst` FOREIGN KEY (`idInstructor`) REFERENCES `instructor` (`idInstructor`),
  ADD CONSTRAINT `FK_Instancia` FOREIGN KEY (`idInstancia`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `FK_Tipo` FOREIGN KEY (`idTipo`) REFERENCES `tipoevento` (`idTipo`);

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
