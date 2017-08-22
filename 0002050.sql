-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Ago-2017 às 23:22
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
-- Estrutura da tabela `agenda_app`
--

CREATE TABLE IF NOT EXISTS `agenda_app` (
  `ID_AGEAPP` int(10) NOT NULL,
  `ID_PERFUSU` int(10) NOT NULL,
  `TITULO_AGEAPP` varchar(140) NOT NULL,
  `CATEGORIA_AGEAPP` int(1) NOT NULL,
  `INICIO_AGEAPP` datetime NOT NULL,
  `FIM_AGEAPP` datetime NOT NULL,
  `DESCRICAO_AGEAPP` varchar(500) NOT NULL,
  `REPETICAO_AGEAPP` int(1) NOT NULL,
  PRIMARY KEY (`ID_AGEAPP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(25, '1,2,4', ',,', 1);

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_age_app`
--

CREATE TABLE IF NOT EXISTS `categoria_age_app` (
  `ID_CATAGEAPP` int(10) NOT NULL,
  `ID_PERFUSU` int(10) NOT NULL,
  `TITULO_CATAGEAPP` varchar(140) NOT NULL,
  `COR_CATAGEAPP` varchar(7) NOT NULL,
  `ICONE_CATAGEAPP` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_inf_plat`
--

CREATE TABLE IF NOT EXISTS `categoria_inf_plat` (
  `ID_CATINFPLA` int(10) NOT NULL,
  `TITULO_CATINFAPP` varchar(140) NOT NULL,
  `COR_CATINFAPP` varchar(7) NOT NULL,
  `ICONE_CATINFAPP` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_pos_site`
--

CREATE TABLE IF NOT EXISTS `categoria_pos_site` (
  `ID_CATPOSSIT` int(10) NOT NULL,
  `TITULO_CATPOSSIT` varchar(140) NOT NULL,
  `COR_CATPOSSIT` varchar(7) NOT NULL,
  `ICONE_CATPOSSIT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato_site`
--

CREATE TABLE IF NOT EXISTS `contato_site` (
  `ID_CONSIT` int(10) NOT NULL,
  `TITULO_CONSIT` varchar(140) NOT NULL,
  `CORPO_CONSIT` varchar(500) NOT NULL,
  `AUTOR_CONSIT` int(4) NOT NULL,
  `EMAIL_CONSIT` varchar(30) NOT NULL,
  `DATA_CONSIT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `cronograma_usuario_plat`
--

CREATE TABLE IF NOT EXISTS `cronograma_usuario_plat` (
  `ID_CROUSUPLA` int(10) NOT NULL,
  `ID_PERFUSU` int(10) NOT NULL,
  `ATIVIDADES_CROUSUPLA` varchar(50) NOT NULL,
  `APROVADO_CROUSUPLA` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `feedbacks_plat`
--

CREATE TABLE IF NOT EXISTS `feedbacks_plat` (
  `ID_FEEPLA` int(10) NOT NULL,
  `ID_RES_PERFUSU` int(10) NOT NULL,
  `ID_COL_PERFUSU` int(10) NOT NULL,
  `MENSAGEM_FEEPLA` varchar(500) NOT NULL,
  `DATA_FEEPLA` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `informacoes_plat`
--

CREATE TABLE IF NOT EXISTS `informacoes_plat` (
  `ID_INFPLA` int(10) NOT NULL,
  `TITULO_INFPLA` varchar(140) NOT NULL,
  `IMAGEM_INFPLA` varchar(140) NOT NULL,
  `DESCRICAO_INFPLA` varchar(1000) NOT NULL,
  `DATA_INFPLA` datetime NOT NULL,
  `CATEGORIA` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos_app`
--

CREATE TABLE IF NOT EXISTS `jogos_app` (
  `ID_JOGAPP` int(10) NOT NULL,
  `TITULO_JOGAPP` varchar(140) NOT NULL,
  `COR_JOGAPP` varchar(7) NOT NULL,
  `TIPO_JOGAPP` int(1) NOT NULL,
  `JUNTOS_JOGAPP` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `CATEGORIA_NOTPLA` int(2) NOT NULL,
  PRIMARY KEY (`ID_NOTPLA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `notificacoes_plat`
--

INSERT INTO `notificacoes_plat` (`ID_NOTPLA`, `DESCRICAO_NOTPLA`, `REMETENTE_NOTPLA`, `DESTINATARIOS_NOTPLA`, `DATA_NOTPLA`, `ICONE_NOTPLA`, `COR_NOTPLA`, `STATUS_NOTPLA`, `CATEGORIA_NOTPLA`) VALUES
(1, 'Aqui vai a descricao', 'Administrador', '1,2,3,4,5,6,7,8,9,0', '2017-08-13', 'img/icone_teste.png', '#f0f', 1, 0),
(2, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1,0', '2017-08-13', 'img/icone_teste.png', '#f0f', 1, 1),
(3, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 2),
(4, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 0),
(5, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 0),
(6, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 0),
(7, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 0),
(8, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 0),
(9, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 0),
(10, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 0),
(11, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 0),
(12, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 0),
(13, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 0),
(14, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 0),
(15, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 0),
(16, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 0),
(17, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 0),
(18, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 0),
(19, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '3', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 0),
(20, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '5', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 0),
(21, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '4,0', '2017-08-13', 'img/icone_teste.png', '#f0f', 1, 0),
(22, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '1,0', '2017-08-13', 'img/icone_teste.png', '#f0f', 1, 0),
(23, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '3,0', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 0),
(24, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '5,0', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 1),
(25, 'VocÃª foi adicionado na sessÃ£o TITULO DA SESSAO', 'Administrador', '4,0', '2017-08-13', 'img/icone_teste.png', '#f0f', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacotes_projeto`
--

CREATE TABLE IF NOT EXISTS `pacotes_projeto` (
  `ID_PACPRO` int(10) NOT NULL,
  `TITULO_PACPRO` varchar(140) NOT NULL,
  `DESCRICAO_PACPRO` varchar(500) NOT NULL,
  `PRECO_PACPRO` int(4) NOT NULL,
  `BENEFICIOS_PACPRO` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_dor`
--

CREATE TABLE IF NOT EXISTS `perfil_dor` (
  `ID_PERFDOR` int(10) NOT NULL,
  `ID_PERFUSU` int(10) NOT NULL,
  `MEMBRO_PERFDOR` varchar(15) NOT NULL,
  `FREQUENCIA_PERFDOR` varchar(30) NOT NULL,
  `POSTBRACOS_PERFDOR` int(1) NOT NULL,
  `POSTCOSTAS_PERFDOR` int(1) NOT NULL,
  `POSTPERNAS_PERFDOR` int(1) NOT NULL,
  `PAUSAS_PERFDOR` tinyint(1) NOT NULL,
  `FREQPAUSAS_PERFDOR` int(1) NOT NULL,
  `INFLUENCIA_PERFDOR` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil_dor`
--

INSERT INTO `perfil_dor` (`ID_PERFDOR`, `ID_PERFUSU`, `MEMBRO_PERFDOR`, `FREQUENCIA_PERFDOR`, `POSTBRACOS_PERFDOR`, `POSTCOSTAS_PERFDOR`, `POSTPERNAS_PERFDOR`, `PAUSAS_PERFDOR`, `FREQPAUSAS_PERFDOR`, `INFLUENCIA_PERFDOR`) VALUES
(1, 1, '1', '2', 1, 1, 1, 1, 1, 1),
(2, 2, '1,2', '1', 1, 1, 1, 1, 1, 1),
(3, 3, '1,2', '1', 1, 1, 1, 1, 1, 1),
(4, 4, '2', '1', 1, 1, 1, 1, 1, 1),
(5, 5, '1,2,3,4,5', '1', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_usuario`
--

CREATE TABLE IF NOT EXISTS `perfil_usuario` (
  `ID_PERFUSU` int(10) NOT NULL,
  `ID_EMP` int(10) NOT NULL,
  `CPF_PERFUSU` int(11) NOT NULL,
  `NOME_PERFUSU` varchar(30) NOT NULL,
  `SOBRENOME_PERFUSU` varchar(100) NOT NULL,
  `IDADE_PERFUSU` int(2) NOT NULL,
  `EMAIL_PERFUSU` varchar(140) NOT NULL,
  `TIPO_PERFUSU` int(1) NOT NULL,
  `SENHA_PERFUSU` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil_usuario`
--

INSERT INTO `perfil_usuario` (`ID_PERFUSU`, `ID_EMP`, `CPF_PERFUSU`, `NOME_PERFUSU`, `SOBRENOME_PERFUSU`, `IDADE_PERFUSU`, `EMAIL_PERFUSU`, `TIPO_PERFUSU`, `SENHA_PERFUSU`) VALUES
(1, 1, 123456789, 'José', 'Costa e Silva', 30, 'jose.silva@empresa1.com.br', 2, '123456'),
(2, 2, 123456789, 'Isabele', 'Oliveira', 22, 'ioliveira@empresa2.com.br', 1, '123456'),
(3, 1, 123456789, 'Karina', 'Goes', 25, 'karina.goes@empresa1.com.br', 1, '123456'),
(4, 1, 123456789, 'Victor', 'Pereira', 22, 'victor.pereira@empresa1.com.br', 2, '123456'),
(5, 1, 21474836, 'Maria', 'Santos', 34, 'maria.santos@empresa1.com.br', 2, '123456'),
(0, 0, 2147483647, 'Erika', 'Teste', 1996, 'e@e.com', 2, '12345678');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas_qui_app`
--

CREATE TABLE IF NOT EXISTS `perguntas_qui_app` (
  `ID_PERQUIAPP` int(10) NOT NULL,
  `ID_JOGAPP` int(10) NOT NULL,
  `TITULO_PERQUIAPP` varchar(140) NOT NULL,
  `OPCAO1_PERQUIAPP` varchar(80) NOT NULL,
  `OPCAO2_PERQUIAPP` varchar(80) NOT NULL,
  `OPCAO3_PERQUIAPP` varchar(80) NOT NULL,
  `OPCAO4_PERQUIAPP` varchar(80) NOT NULL,
  `OPCAO5_PERQUIAPP` varchar(80) NOT NULL,
  `RESPOSTA_PERQUIAPP` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontos_app`
--

CREATE TABLE IF NOT EXISTS `pontos_app` (
  `ID_PONAPP` int(10) NOT NULL,
  `ID_PERFUSU` int(10) NOT NULL,
  `ID_JOGAPP` int(10) NOT NULL,
  `DATA_PONAPP` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagens_site`
--

CREATE TABLE IF NOT EXISTS `postagens_site` (
  `ID_POSSIT` int(10) NOT NULL,
  `TITULO_POSSIT` varchar(140) NOT NULL,
  `CORPO_POSSIT` varchar(500) NOT NULL,
  `AUTOR_POSSIT` int(4) NOT NULL,
  `DATA_POSSIT` datetime NOT NULL,
  `CATEGORIA` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recompensas_app`
--

CREATE TABLE IF NOT EXISTS `recompensas_app` (
  `ID_RECAPP` int(10) NOT NULL,
  `ID_PERFUSU` int(10) NOT NULL,
  `TITULO_RECAPP` varchar(140) NOT NULL,
  `CATEGORIA_RECAPP` int(1) NOT NULL,
  `PONTOS_RECAPP` int(10) NOT NULL,
  `QUANTIDADE_RECAPP` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recompensas_usuario_app`
--

CREATE TABLE IF NOT EXISTS `recompensas_usuario_app` (
  `ID_RECUSUAPP` int(10) NOT NULL,
  `ID_PERFUSU` int(10) NOT NULL,
  `ID_RECAPP` int(10) NOT NULL,
  `DATA_RECUSUAPP` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessao_plat`
--

CREATE TABLE IF NOT EXISTS `sessao_plat` (
  `ID_SESPLA` int(10) NOT NULL AUTO_INCREMENT,
  `ID_EMP` int(10) NOT NULL,
  `PARTICIPANTES_SESPLA` varchar(50) NOT NULL,
  `CONFIRMADOS_SESPLA` varchar(50) NOT NULL,
  `LIBERADO_SESPLA` tinyint(1) NOT NULL,
  `DATA_SESPLA` datetime NOT NULL,
  `ID_CROEMPPLA` int(10) NOT NULL,
  PRIMARY KEY (`ID_SESPLA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `sessao_plat`
--

INSERT INTO `sessao_plat` (`ID_SESPLA`, `ID_EMP`, `PARTICIPANTES_SESPLA`, `CONFIRMADOS_SESPLA`, `LIBERADO_SESPLA`, `DATA_SESPLA`, `ID_CROEMPPLA`) VALUES
(8, 1, '3', '3,0', 0, '2017-07-24 18:16:27', 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
