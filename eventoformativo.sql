-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2020 at 03:08 AM
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
-- Table structure for table `eventoformativo`
--

CREATE TABLE `eventoformativo` (
  `idEF` int(11) NOT NULL,
  `nombreEF` varchar(30) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFinal` date NOT NULL,
  `modalidad` varchar(10) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `diseñoInstruccional` text,
  `utilidadOportunidad` text,
  `requisitosParticipacion` text,
  `requisitosAcreditacion` text,
  `condicionesOperativas` text,
  `cuota` decimal(4,1) DEFAULT '0.0',
  `duracion` int(11) DEFAULT NULL,
  `tipoEF` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventoformativo`
--
ALTER TABLE `eventoformativo`
  ADD PRIMARY KEY (`idEF`),
  ADD UNIQUE KEY `nombreEF` (`nombreEF`,`fechaInicio`),
  ADD KEY `FK_Tipo` (`idTipo`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventoformativo`
--
ALTER TABLE `eventoformativo`
  ADD CONSTRAINT `eventoformativo_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `tipoevento` (`idTipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
