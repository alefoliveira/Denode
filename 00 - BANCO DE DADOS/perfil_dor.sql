-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Set-2017 às 14:22
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `0002050`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_dor`
--

CREATE TABLE `perfil_dor` (
  `ID_PERFDOR` int(10) NOT NULL,
  `ID_PERFUSU` int(10) NOT NULL,
  `HISTCLI_PERFDOR` varchar(250) NOT NULL,
  `TRAT_PERFDOR` varchar(300) NOT NULL,
  `CARACT_PERFDOR` varchar(3) NOT NULL,
  `EXAME_PERFDOR` varchar(200) NOT NULL,
  `EXCOMPANT_PERFDOR` varchar(200) NOT NULL,
  `AMBI_PERFDOR` varchar(200) NOT NULL,
  `BIOMEC_PERFDOR` varchar(200) NOT NULL,
  `PSICOSOC_PERFDOR` varchar(200) NOT NULL,
  `ATIV_PERFDOR` varchar(200) NOT NULL,
  `DADOSCOM_PERFDOR` varchar(150) NOT NULL,
  `HIPDIAG_PERFDOR` varchar(100) NOT NULL,
  `CONSEXA_PERFDOR` varchar(200) NOT NULL,
  `TRATAM_PERFDOR` varchar(250) NOT NULL,
  `RECOM_PERFDOR` varchar(200) NOT NULL,
  `PSICO_PERFDOR` varchar(200) NOT NULL,
  `ORTO_PERFDOR` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perfil_dor`
--
ALTER TABLE `perfil_dor`
  ADD UNIQUE KEY `ID_PERFDOR` (`ID_PERFDOR`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perfil_dor`
--
ALTER TABLE `perfil_dor`
  MODIFY `ID_PERFDOR` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
