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
-- Estrutura da tabela `atividades_plat`
--

CREATE TABLE IF NOT EXISTS `atividades_plat` (
  `ID_ATIPLA` int(10) NOT NULL AUTO_INCREMENT,
  `ID_PERFUSU` int(10) NOT NULL,
  `TITULO_ATIPLA` varchar(140) NOT NULL,
  `COR_ATIPLA` varchar(7) NOT NULL,
  `DESCRICAO_ATIPLA` varchar(500) NOT NULL,
  `MEMBRO_ATIPLA` int(2) NOT NULL,
  `DURACAO_ATIPLA` int(2) NOT NULL,
  `IMAGEM_ATIPLA` varchar(100) NOT NULL,
  `GIF_ATIPLA` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_ATIPLA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `atividades_plat`
--

INSERT INTO `atividades_plat` (`ID_ATIPLA`, `ID_PERFUSU`, `TITULO_ATIPLA`, `COR_ATIPLA`, `DESCRICAO_ATIPLA`, `MEMBRO_ATIPLA`, `DURACAO_ATIPLA`, `IMAGEM_ATIPLA`, `GIF_ATIPLA`) VALUES
(1, 1, 'Cervical - 1', '#f0f', 'Sentado, faça movimentos para cima e para baixo com a cabeça (mesmo movimento feito quando dizemos “sim”)', 1, 15, 'img/teste.png', ''),
(2, 1, 'Cervical - 2', '#f2f', 'Incline a cabeça de para a lateral, como no movimento para “talvez”\r\n', 1, 15, 'img/teste.png', ''),
(3, 1, 'Cervical - 3', '#f4f', 'Faça o movimento para “Não”, virando a cabeça para um lado e para outro', 1, 15, 'img/teste.png', ''),
(4, 1, 'Braços', '#ff4040', 'Estique os braços a sua frente com as palmas das mãos para fora. Em seguida, gire os braços de forma que os dorsos das suas mãos encostem. \r\n		Mantenha a posição por alguns segundos e, depois, gire os braços para manter as palmas das mãos para cima por alguns segundos.\r\n		Relaxe e repita o exercício 3 vezes.', 0, 20, 'img/teste.png', '');

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `evento_teste` ON SCHEDULE EVERY 20 SECOND STARTS '2017-08-31 15:40:00' ENDS '2017-08-31 18:00:00' ON COMPLETION PRESERVE DISABLE DO INSERT INTO `notificacoes_plat`(`DESCRICAO_NOTPLA`, `REMETENTE_NOTPLA`, `DESTINATARIOS_NOTPLA`, `STATUS_NOTPLA`) VALUES ('teste','1','1,2',0)$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
