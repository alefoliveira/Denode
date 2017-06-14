-- phpMyAdmin SQL Dump
-- version 4.2.8.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-Jun-2017 às 18:25
-- Versão do servidor: 5.6.14
-- PHP Version: 5.5.6

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
  `REPETICAO_AGEAPP` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades_plat`
--

CREATE TABLE IF NOT EXISTS `atividades_plat` (
`ID_ATIPLA` int(10) NOT NULL,
  `ID_PERFUSU` int(10) NOT NULL,
  `TITULO_ATIPLA` varchar(140) NOT NULL,
  `COR_ATIPLA` varchar(7) NOT NULL,
  `DESCRICAO_ATIPLA` varchar(500) NOT NULL,
  `DURACAO_ATIPLA` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
`ID_CROEMPPLA` int(10) NOT NULL,
  `ID_PERFUSU` int(10) NOT NULL,
  `ATIVIDADES__CROEMPPLA` varchar(500) NOT NULL,
  `INICIO_CROEMPPLA` datetime NOT NULL,
  `FIM_CROEMPPLA` datetime NOT NULL,
  `PARTICIPANTES_CROEMPPLA` int(3) NOT NULL,
  `ATIVO_CROEMPPLA` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `MEMBRO_PERFDOR` varchar(6) NOT NULL,
  `FREQUENCIA_PERFDOR` varchar(30) NOT NULL,
  `POSTBRACOS_PERFDOR` int(1) NOT NULL,
  `POSTCOSTAS_PERFDOR` int(1) NOT NULL,
  `POSTPERNAS_PERFDOR` int(1) NOT NULL,
  `PAUSAS_PERFDOR` tinyint(1) NOT NULL,
  `FREQPAUSAS_PERFDOR` int(1) NOT NULL,
  `INFLUENCIA_PERFDOR` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_usuario`
--

CREATE TABLE IF NOT EXISTS `perfil_usuario` (
`ID_PERFUSU` int(10) NOT NULL,
  `CPF_PERFUSU` int(11) NOT NULL,
  `NOME_PERFUSU` varchar(30) NOT NULL,
  `SOBRENOME_PERFUSU` varchar(100) NOT NULL,
  `IDADE_PERFUSU` int(2) NOT NULL,
  `EMAIL_PERFUSU` varchar(140) NOT NULL,
  `TIPO_PERFUSU` int(1) NOT NULL,
  `SENHA_PERFUSU` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
`ID_SESPLA` int(10) NOT NULL,
  `ID_PERFUSU` int(10) NOT NULL,
  `PARTICIPANTES_SESPLA` varchar(50) NOT NULL,
  `LIBREADO_SESPLA` tinyint(1) NOT NULL,
  `DATA_SESPLA` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda_app`
--
ALTER TABLE `agenda_app`
 ADD PRIMARY KEY (`ID_AGEAPP`);

--
-- Indexes for table `atividades_plat`
--
ALTER TABLE `atividades_plat`
 ADD PRIMARY KEY (`ID_ATIPLA`);

--
-- Indexes for table `categoria_age_app`
--
ALTER TABLE `categoria_age_app`
 ADD PRIMARY KEY (`ID_CATAGEAPP`);

--
-- Indexes for table `categoria_inf_plat`
--
ALTER TABLE `categoria_inf_plat`
 ADD PRIMARY KEY (`ID_CATINFPLA`);

--
-- Indexes for table `categoria_pos_site`
--
ALTER TABLE `categoria_pos_site`
 ADD PRIMARY KEY (`ID_CATPOSSIT`);

--
-- Indexes for table `contato_site`
--
ALTER TABLE `contato_site`
 ADD PRIMARY KEY (`ID_CONSIT`);

--
-- Indexes for table `cronograma_empresa_plat`
--
ALTER TABLE `cronograma_empresa_plat`
 ADD PRIMARY KEY (`ID_CROEMPPLA`);

--
-- Indexes for table `cronograma_usuario_plat`
--
ALTER TABLE `cronograma_usuario_plat`
 ADD PRIMARY KEY (`ID_CROUSUPLA`);

--
-- Indexes for table `feedbacks_plat`
--
ALTER TABLE `feedbacks_plat`
 ADD PRIMARY KEY (`ID_FEEPLA`);

--
-- Indexes for table `informacoes_plat`
--
ALTER TABLE `informacoes_plat`
 ADD PRIMARY KEY (`ID_INFPLA`);

--
-- Indexes for table `jogos_app`
--
ALTER TABLE `jogos_app`
 ADD PRIMARY KEY (`ID_JOGAPP`);

--
-- Indexes for table `pacotes_projeto`
--
ALTER TABLE `pacotes_projeto`
 ADD PRIMARY KEY (`ID_PACPRO`);

--
-- Indexes for table `perfil_dor`
--
ALTER TABLE `perfil_dor`
 ADD PRIMARY KEY (`ID_PERFDOR`);

--
-- Indexes for table `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
 ADD PRIMARY KEY (`ID_PERFUSU`);

--
-- Indexes for table `perguntas_qui_app`
--
ALTER TABLE `perguntas_qui_app`
 ADD PRIMARY KEY (`ID_PERQUIAPP`);

--
-- Indexes for table `pontos_app`
--
ALTER TABLE `pontos_app`
 ADD PRIMARY KEY (`ID_PONAPP`);

--
-- Indexes for table `postagens_site`
--
ALTER TABLE `postagens_site`
 ADD PRIMARY KEY (`ID_POSSIT`);

--
-- Indexes for table `recompensas_app`
--
ALTER TABLE `recompensas_app`
 ADD PRIMARY KEY (`ID_RECAPP`);

--
-- Indexes for table `recompensas_usuario_app`
--
ALTER TABLE `recompensas_usuario_app`
 ADD PRIMARY KEY (`ID_RECUSUAPP`);

--
-- Indexes for table `sessao_plat`
--
ALTER TABLE `sessao_plat`
 ADD PRIMARY KEY (`ID_SESPLA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda_app`
--
ALTER TABLE `agenda_app`
MODIFY `ID_AGEAPP` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `atividades_plat`
--
ALTER TABLE `atividades_plat`
MODIFY `ID_ATIPLA` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categoria_age_app`
--
ALTER TABLE `categoria_age_app`
MODIFY `ID_CATAGEAPP` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categoria_inf_plat`
--
ALTER TABLE `categoria_inf_plat`
MODIFY `ID_CATINFPLA` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categoria_pos_site`
--
ALTER TABLE `categoria_pos_site`
MODIFY `ID_CATPOSSIT` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contato_site`
--
ALTER TABLE `contato_site`
MODIFY `ID_CONSIT` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cronograma_empresa_plat`
--
ALTER TABLE `cronograma_empresa_plat`
MODIFY `ID_CROEMPPLA` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cronograma_usuario_plat`
--
ALTER TABLE `cronograma_usuario_plat`
MODIFY `ID_CROUSUPLA` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedbacks_plat`
--
ALTER TABLE `feedbacks_plat`
MODIFY `ID_FEEPLA` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `informacoes_plat`
--
ALTER TABLE `informacoes_plat`
MODIFY `ID_INFPLA` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jogos_app`
--
ALTER TABLE `jogos_app`
MODIFY `ID_JOGAPP` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pacotes_projeto`
--
ALTER TABLE `pacotes_projeto`
MODIFY `ID_PACPRO` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perfil_dor`
--
ALTER TABLE `perfil_dor`
MODIFY `ID_PERFDOR` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
MODIFY `ID_PERFUSU` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perguntas_qui_app`
--
ALTER TABLE `perguntas_qui_app`
MODIFY `ID_PERQUIAPP` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pontos_app`
--
ALTER TABLE `pontos_app`
MODIFY `ID_PONAPP` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `postagens_site`
--
ALTER TABLE `postagens_site`
MODIFY `ID_POSSIT` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recompensas_app`
--
ALTER TABLE `recompensas_app`
MODIFY `ID_RECAPP` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recompensas_usuario_app`
--
ALTER TABLE `recompensas_usuario_app`
MODIFY `ID_RECUSUAPP` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sessao_plat`
--
ALTER TABLE `sessao_plat`
MODIFY `ID_SESPLA` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
