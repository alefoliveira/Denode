-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Set-2017 às 03:19
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `0002050`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cronograma_empresa_plat`
--

CREATE TABLE IF NOT EXISTS `cronograma_empresa_plat` (
  `ID_CROEMPPLA` int(10) NOT NULL AUTO_INCREMENT,
  `ID_EMP` int(10) NOT NULL,
  `ID_PERFUSU` int(10) NOT NULL,
  `ATIVIDADES_CROEMPPLA` varchar(500) NOT NULL,
  `INICIO_CROEMPPLA` time NOT NULL,
  `FIM_CROEMPPLA` time NOT NULL,
  `PARTICIPANTES_CROEMPPLA` varchar(50) NOT NULL,
  `ATIVO_CROEMPPLA` tinyint(1) NOT NULL,
  `DIAS_CROEMPPLA` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_CROEMPPLA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Extraindo dados da tabela `cronograma_empresa_plat`
--

INSERT INTO `cronograma_empresa_plat` (`ID_CROEMPPLA`, `ID_EMP`, `ID_PERFUSU`, `ATIVIDADES_CROEMPPLA`, `INICIO_CROEMPPLA`, `FIM_CROEMPPLA`, `PARTICIPANTES_CROEMPPLA`, `ATIVO_CROEMPPLA`, `DIAS_CROEMPPLA`) VALUES
(3, 1, 0, '4', '09:00:00', '09:20:00', '1', 1, '5'),
(6, 1, 0, '2,3', '16:15:00', '16:30:00', '3', 1, '1,2,4'),
(7, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(8, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(9, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(10, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(11, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(12, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(13, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(14, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(15, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(16, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(17, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(18, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(19, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(20, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(21, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(22, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(23, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(24, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(25, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(26, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(27, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(28, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(29, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(30, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(31, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(32, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(33, 1, 0, '1,2', '07:00:00', '07:30:00', '1,3', 1, '3,5'),
(34, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3', 1, '3,5'),
(35, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3', 1, '3,5'),
(36, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(37, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(38, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(39, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(40, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(41, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(42, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(43, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(44, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(45, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(46, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(47, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(48, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(49, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(50, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(51, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(52, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(53, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(54, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5'),
(55, 1, 0, '1,2', '08:00:00', '08:30:00', '1,3,5,4', 1, '3,5');

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `evento_teste` ON SCHEDULE EVERY 20 SECOND STARTS '2017-08-31 15:40:00' ENDS '2017-08-31 18:00:00' ON COMPLETION PRESERVE DISABLE DO INSERT INTO `notificacoes_plat`(`DESCRICAO_NOTPLA`, `REMETENTE_NOTPLA`, `DESTINATARIOS_NOTPLA`, `STATUS_NOTPLA`) VALUES ('teste','1','1,2',0)$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
