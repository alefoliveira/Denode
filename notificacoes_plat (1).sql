-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Set-2017 às 03:18
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
-- Estrutura da tabela `notificacoes_plat`
--

CREATE TABLE IF NOT EXISTS `notificacoes_plat` (
  `ID_NOTPLA` int(20) NOT NULL AUTO_INCREMENT,
  `DESCRICAO_NOTPLA` varchar(140) NOT NULL,
  `REMETENTE_NOTPLA` varchar(50) NOT NULL,
  `DESTINATARIOS_NOTPLA` varchar(50) NOT NULL,
  `PENDENTES_NOTPLA` varchar(50) NOT NULL,
  `DATA_NOTPLA` date NOT NULL,
  `ICONE_NOTPLA` varchar(100) NOT NULL,
  `COR_NOTPLA` varchar(6) NOT NULL,
  `STATUS_NOTPLA` int(1) NOT NULL,
  `CATEGORIA_NOTPLA` int(2) NOT NULL,
  PRIMARY KEY (`ID_NOTPLA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1032 ;

--
-- Extraindo dados da tabela `notificacoes_plat`
--

INSERT INTO `notificacoes_plat` (`ID_NOTPLA`, `DESCRICAO_NOTPLA`, `REMETENTE_NOTPLA`, `DESTINATARIOS_NOTPLA`, `PENDENTES_NOTPLA`, `DATA_NOTPLA`, `ICONE_NOTPLA`, `COR_NOTPLA`, `STATUS_NOTPLA`, `CATEGORIA_NOTPLA`) VALUES
(1, 'Sessão para mãos', 'Administrador', '1,2,3,4,5,6,7,8,9,0,36', '1,2,3,4,5,6,7,8,9,36', '2017-08-13', 'img/iconset.svg#svgView(viewBox(0, 56, 23, 23))\r\n', '#f0f', 1, 1),
(2, 'Sessão para braços e pernas', 'Administrador', '1,0,36', '1,2,3,4,5,6,7,8,9,0,36', '2017-08-13', 'img/iconset.svg#svgView(viewBox(0, 56, 23, 23))', '#f0f', 0, 1),
(3, 'Sessão para braços e pernas', 'Administrador', '1,36', '1,2,3,4,5,6,7,8,9,0,36', '2017-08-13', 'img/iconset.svg#svgView(viewBox(0, 56, 23, 23))', '#f0f', 0, 2),
(22, 'Sessão das 08:15', 'Administrador', '1,0, 36', '4,5,6,7,8,9,0,36', '2017-08-13', 'img/iconset.svg#svgView(viewBox(0, 56, 23, 23))', '#f0f', 0, 2),
(23, 'Sessão para Mãos', '1', '3,0, 36', '3,4,5,6,7,8,9,0,36', '2017-08-13', 'img/iconset.svg#svgView(viewBox(0, 56, 23, 23))', '#f0f', 0, 3),
(24, 'Sessão para Mãos', '2', '5,0, 36', '1,2,3,4,5,6,7,8,9,0,36', '2017-08-13', 'img/iconset.svg#svgView(viewBox(0, 56, 23, 23))', '#f0f', 0, 3),
(25, 'Medalha de Ouro 1', 'Administrador', '4,0, 36', '3,4,5,6,7,8,9,0,36', '2017-08-13', 'img/iconset.svg#svgView(viewBox(0, 56, 23, 23))', '#f0f', 0, 4);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `evento_teste` ON SCHEDULE EVERY 20 SECOND STARTS '2017-08-31 15:40:00' ENDS '2017-08-31 18:00:00' ON COMPLETION PRESERVE DISABLE DO INSERT INTO `notificacoes_plat`(`DESCRICAO_NOTPLA`, `REMETENTE_NOTPLA`, `DESTINATARIOS_NOTPLA`, `STATUS_NOTPLA`) VALUES ('teste','1','1,2',0)$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
