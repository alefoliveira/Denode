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
-- Estrutura da tabela `atividades_empresa_plat`
--

CREATE TABLE IF NOT EXISTS `atividades_empresa_plat` (
  `ID_ATIEMPPLA` int(10) NOT NULL AUTO_INCREMENT,
  `ATIVIDADES_ATIEMPPLA` varchar(50) NOT NULL,
  `PONTOS_ATIEMPPLA` varchar(50) NOT NULL,
  `ID_EMP` int(10) NOT NULL,
  PRIMARY KEY (`ID_ATIEMPPLA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `atividades_empresa_plat`
--

INSERT INTO `atividades_empresa_plat` (`ID_ATIEMPPLA`, `ATIVIDADES_ATIEMPPLA`, `PONTOS_ATIEMPPLA`, `ID_EMP`) VALUES
(25, '1,2,4', '15,10,25', 1);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `evento_teste` ON SCHEDULE EVERY 20 SECOND STARTS '2017-08-31 15:40:00' ENDS '2017-08-31 18:00:00' ON COMPLETION PRESERVE DISABLE DO INSERT INTO `notificacoes_plat`(`DESCRICAO_NOTPLA`, `REMETENTE_NOTPLA`, `DESTINATARIOS_NOTPLA`, `STATUS_NOTPLA`) VALUES ('teste','1','1,2',0)$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;