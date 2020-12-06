-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2020 at 08:18 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemaeventosformativos`
--

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
-- Table structure for table `eventoformativo`
--

CREATE TABLE `eventoformativo` (
  `idEF` int(11) NOT NULL,
  `nombreEF` varchar(30) NOT NULL,
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
  `duracion` int(11) DEFAULT NULL
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
  `idCreador` int(11) NOT NULL,
  `nombreModulo` varchar(30) NOT NULL,
  `contenidoMod` text,
  `duracionMod` int(11) NOT NULL
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
  `password` varchar(25) NOT NULL,
  `esInstancia` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`idModulo`),
  ADD KEY `FK_Creador` (`idCreador`);

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
  MODIFY `idEF` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `idInstructor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idModulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipoevento`
--
ALTER TABLE `tipoevento`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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

--
-- Constraints for table `modulo`
--
ALTER TABLE `modulo`
  ADD CONSTRAINT `FK_Creador` FOREIGN KEY (`idCreador`) REFERENCES `usuario` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
