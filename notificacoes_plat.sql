-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Ago-2017 às 01:53
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
  `DATA_NOTPLA` date NOT NULL,
  `ICONE_NOTPLA` varchar(100) NOT NULL,
  `COR_NOTPLA` varchar(6) NOT NULL,
  `STATUS_NOTPLA` int(1) NOT NULL,
  PRIMARY KEY (`ID_NOTPLA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `notificacoes_plat`
--

INSERT INTO `notificacoes_plat` (`ID_NOTPLA`, `DESCRICAO_NOTPLA`, `REMETENTE_NOTPLA`, `DESTINATARIOS_NOTPLA`, `DATA_NOTPLA`, `ICONE_NOTPLA`, `COR_NOTPLA`, `STATUS_NOTPLA`) VALUES
(1, 'Aqui vai a descricao', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(2, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(3, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(4, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(5, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(6, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(7, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(8, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(9, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(10, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(11, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(12, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(13, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(14, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(15, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(16, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(17, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(18, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(19, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '3', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(20, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '5', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(21, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '4', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(22, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(23, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '3', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(24, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '5', '2017-08-13', 'img/icone_teste.png', '#f0f', 0),
(25, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '4', '2017-08-13', 'img/icone_teste.png', '#f0f', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
