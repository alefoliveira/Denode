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
-- Estrutura da tabela `perfil_usuario`
--

CREATE TABLE IF NOT EXISTS `perfil_usuario` (
  `ID_PERFUSU` int(10) NOT NULL AUTO_INCREMENT,
  `ID_EMP` int(10) NOT NULL,
  `CPF_PERFUSU` varchar(11) DEFAULT NULL,
  `NOME_PERFUSU` varchar(30) DEFAULT NULL,
  `SOBRENOME_PERFUSU` varchar(100) DEFAULT NULL,
  `IDADE_PERFUSU` int(2) DEFAULT NULL,
  `EMAIL_PERFUSU` varchar(140) DEFAULT NULL,
  `TIPO_PERFUSU` int(1) DEFAULT NULL,
  `IMAGEM_PERFUSU` mediumblob NOT NULL,
  `LOCALIMG_PERFUSU` varchar(40) NOT NULL,
  `SENHA_PERFUSU` varchar(100) DEFAULT NULL,
  `PONTOS_PERFUSU` int(255) DEFAULT NULL,
  `ATIVO_PERFUSU` tinyint(1) NOT NULL DEFAULT '1',
  `DURACAO_ATIPLA` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_PERFUSU`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Extraindo dados da tabela `perfil_usuario`
--

INSERT INTO `perfil_usuario` (`ID_PERFUSU`, `ID_EMP`, `CPF_PERFUSU`, `NOME_PERFUSU`, `SOBRENOME_PERFUSU`, `IDADE_PERFUSU`, `EMAIL_PERFUSU`, `TIPO_PERFUSU`, `IMAGEM_PERFUSU`, `LOCALIMG_PERFUSU`, `SENHA_PERFUSU`, `PONTOS_PERFUSU`, `ATIVO_PERFUSU`, `DURACAO_ATIPLA`) VALUES
(1, 1, '408564103', 'Mickey', 'Mouse', 88, 'mickey@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 123, 1, NULL),
(2, 1, '358313564', 'Donald', 'Duck', 83, 'donald@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 76, 1, NULL),
(3, 1, '327689847', 'Pateta', 'Goofy Goof ', 85, 'pateta@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 45, 1, NULL),
(4, 1, '352789794', 'Margarida', 'Duck', 77, 'margarida@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 90, 1, NULL),
(5, 1, '103041571', 'Minnie', 'Mouse', 88, 'minnie@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 97, 1, NULL),
(6, 1, '358313564', 'Clarabela', 'Vaca', 89, 'clarabela@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 18, 1, NULL),
(7, 1, '582785610', 'Piu Piu', 'Piu', 73, 'piupiu@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 78, 1, NULL),
(8, 1, '571822817', 'Pernalonga', 'Duck', 73, 'pernalonge@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 172, 1, NULL),
(9, 1, '358313564', 'Taz', 'Mania', 65, 'taz@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 65, 1, NULL),
(10, 1, '358313564', 'Patolino', 'Chato', 80, 'patolino@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 5, 1, NULL),
(16, 1, 'admin', 'admin', NULL, NULL, 'admin@gmail.com', 1, '', '', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', NULL, 1, '2017-07-29 18:04:36'),
(32, 0, '12312312312', 'TESTE', 'TESTE', 1990, 'teste@gmail.com', 1, 0x3132333132333132333132313939302e6a7067, '../img/user', '$2a$08$MTY3NjUxODEzODU5YjFmZOkChIWLv84kIV648l.nGYk/9dtyGLrqW', NULL, 1, NULL),
(33, 0, '12345678999', 'j', 'k', 1978, 'inglid@gmail.com', 1, 0x3132333435363738393939313937382e706e67, '../img/mcqueen', '$2a$08$MTEwNTAzNDYyODU5YjMzNOIcE98xQwb9yAc1duwUHujDhIdTAf85u', NULL, 1, NULL),
(34, 0, '12345667812', 'oI', 'oi', 1990, 'inglidianka@gmail.com', 1, 0x3132333435363637383132313939302e706e67, '../img/Sem tÃ­tulo', '$2a$08$MjA1NjM0NTQ2NTU5YjU2OOPSdYRrI.fFKY/3k/AjXeZwPdsTNvrL6', NULL, 1, NULL),
(35, 0, '12345667812', 'er', 'er', 1990, 'maikewt@gmail.com', 1, 0x3132333435363637383132313939302e6a7067, '../img/MySnapshot_4', '$2a$08$MTAxODQxOTgxNTU5YjU2YOxaa5YVw.xTC2/jQhcnwwMUT3BsGH7a.', NULL, 1, NULL),
(36, 0, '11211211236', 'Maria Antonieta', 'Carvalho dos Santos Silva', 1996, 'e@e.com', 1, 0x3131323131323131323336313939362e706e67, 'img/emma.jpg', '123456789', NULL, 1, NULL),
(37, 0, '12345678900', 'MMMMMMMMMMMMMMMMMMMM', 'MMMMMMMMMMMMMMMMMMMMMMMMM', 1990, 'eeee@e.com', 1, 0x3132333435363738393030313939302e676966, '../img/74969', '$2a$08$MTI1NjI3NDQzMTU5YjU3YOk6dNUZmFy4SO/VlFHunfrmUpoHDijD.', NULL, 1, NULL);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `evento_teste` ON SCHEDULE EVERY 20 SECOND STARTS '2017-08-31 15:40:00' ENDS '2017-08-31 18:00:00' ON COMPLETION PRESERVE DISABLE DO INSERT INTO `notificacoes_plat`(`DESCRICAO_NOTPLA`, `REMETENTE_NOTPLA`, `DESTINATARIOS_NOTPLA`, `STATUS_NOTPLA`) VALUES ('teste','1','1,2',0)$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
