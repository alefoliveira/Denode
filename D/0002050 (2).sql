-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Ago-2017 às 01:05
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
-- Estrutura da tabela `agenda_app`
--

CREATE TABLE `agenda_app` (
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
-- Estrutura da tabela `atividades_empresa_plat`
--

CREATE TABLE `atividades_empresa_plat` (
  `PONTOS_ATIEMPPLA` varchar(50) NOT NULL,
  `ATIVIDADES_ATIEMPPLA` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades_plat`
--

CREATE TABLE `atividades_plat` (
  `ID_ATIPLA` int(10) NOT NULL,
  `ID_PERFUSU` int(10) NOT NULL,
  `SESSAO_ID_PLAT` int(11) NOT NULL,
  `TITULO_ATIPLA` varchar(140) NOT NULL,
  `COR_ATIPLA` varchar(7) NOT NULL,
  `DESCRICAO_ATIPLA` varchar(500) NOT NULL,
  `EXERCICIOS_ID_PLAT` int(11) NOT NULL,
  `MEMBRO_ATIPLA` int(2) NOT NULL,
  `DURACAO_ATIPLA` int(2) NOT NULL,
  `ATUALIZADO_EM` datetime DEFAULT NULL,
  `TIPO_PERFUSU_id` int(11) NOT NULL,
  `PRIORIDADE_PLAT_ID` int(11) NOT NULL DEFAULT '1',
  `STATUS_ID` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `atividades_plat`
--

INSERT INTO `atividades_plat` (`ID_ATIPLA`, `ID_PERFUSU`, `SESSAO_ID_PLAT`, `TITULO_ATIPLA`, `COR_ATIPLA`, `DESCRICAO_ATIPLA`, `EXERCICIOS_ID_PLAT`, `MEMBRO_ATIPLA`, `DURACAO_ATIPLA`, `ATUALIZADO_EM`, `TIPO_PERFUSU_id`, `PRIORIDADE_PLAT_ID`, `STATUS_ID`) VALUES
(1, 1, 1, 'MINAS GERAIS', '', 'kkk', 3, 0, 2147483647, NULL, 1, 3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_age_app`
--

CREATE TABLE `categoria_age_app` (
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

CREATE TABLE `categoria_inf_plat` (
  `ID_CATINFPLA` int(10) NOT NULL,
  `TITULO_CATINFAPP` varchar(140) NOT NULL,
  `COR_CATINFAPP` varchar(7) NOT NULL,
  `ICONE_CATINFAPP` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_pos_site`
--

CREATE TABLE `categoria_pos_site` (
  `ID_CATPOSSIT` int(10) NOT NULL,
  `TITULO_CATPOSSIT` varchar(140) NOT NULL,
  `COR_CATPOSSIT` varchar(7) NOT NULL,
  `ICONE_CATPOSSIT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato_site`
--

CREATE TABLE `contato_site` (
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

CREATE TABLE `cronograma_empresa_plat` (
  `ID_CROEMPPLA` int(10) NOT NULL,
  `ID_PERFUSU` int(10) NOT NULL,
  `ATIVIDADES__CROEMPPLA` varchar(500) NOT NULL,
  `INICIO_CROEMPPLA` time NOT NULL,
  `FIM_CROEMPPLA` time NOT NULL,
  `PARTICIPANTES_CROEMPPLA` int(3) NOT NULL,
  `ATIVO_CROEMPPLA` tinyint(1) NOT NULL,
  `DIAS_CROEMPPLA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cronograma_usuario_plat`
--

CREATE TABLE `cronograma_usuario_plat` (
  `ID_CROUSUPLA` int(10) NOT NULL,
  `ID_PERFUSU` int(10) NOT NULL,
  `ATIVIDADES_CROUSUPLA` varchar(50) NOT NULL,
  `APROVADO_CROUSUPLA` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicios_plat`
--

CREATE TABLE `exercicios_plat` (
  `ID_EXERPLAT` int(11) NOT NULL,
  `TITULO_EXERPLAT` varchar(200) DEFAULT NULL,
  `TIPO_EXERPLAT` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `exercicios_plat`
--

INSERT INTO `exercicios_plat` (`ID_EXERPLAT`, `TITULO_EXERPLAT`, `TIPO_EXERPLAT`) VALUES
(3, 'hy', NULL),
(5, 'foi', NULL),
(6, 'er', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `feedbacks_plat`
--

CREATE TABLE `feedbacks_plat` (
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

CREATE TABLE `informacoes_plat` (
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

CREATE TABLE `jogos_app` (
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

CREATE TABLE `pacotes_projeto` (
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

CREATE TABLE `perfil_dor` (
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

CREATE TABLE `perfil_usuario` (
  `ID_PERFUSU` int(10) NOT NULL,
  `ID_EMP` int(10) NOT NULL,
  `CPF_PERFUSU` varchar(11) DEFAULT NULL,
  `NOME_PERFUSU` varchar(30) DEFAULT NULL,
  `SOBRENOME_PERFUSU` varchar(100) DEFAULT NULL,
  `IDADE_PERFUSU` int(2) DEFAULT NULL,
  `EMAIL_PERFUSU` varchar(140) DEFAULT NULL,
  `TIPO_PERFUSU` int(1) DEFAULT NULL,
  `SENHA_PERFUSU` varchar(100) DEFAULT NULL,
  `PONTOS_PERFUSU` int(255) DEFAULT NULL,
  `ATIVO_PERFUSU` tinyint(1) NOT NULL DEFAULT '1',
  `DURACAO_ATIPLA` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil_usuario`
--

INSERT INTO `perfil_usuario` (`ID_PERFUSU`, `ID_EMP`, `CPF_PERFUSU`, `NOME_PERFUSU`, `SOBRENOME_PERFUSU`, `IDADE_PERFUSU`, `EMAIL_PERFUSU`, `TIPO_PERFUSU`, `SENHA_PERFUSU`, `PONTOS_PERFUSU`, `ATIVO_PERFUSU`, `DURACAO_ATIPLA`) VALUES
(1, 1, '408564103', 'Mickey', 'Mouse', 88, 'mickey@gmail.com', 2, '10470c3b4b1fed12c3baac014be15fac67c6e815', 123, 1, NULL),
(2, 1, '358313564', 'Donald', 'Duck', 83, 'donald@gmail.com', 2, '10470c3b4b1fed12c3baac014be15fac67c6e815', 76, 1, NULL),
(3, 1, '327689847', 'Pateta', 'Goofy Goof ', 85, 'pateta@gmail.com', 2, '10470c3b4b1fed12c3baac014be15fac67c6e815', 45, 1, NULL),
(4, 1, '352789794', 'Margarida', 'Duck', 77, 'margarida@gmail.com', 2, '10470c3b4b1fed12c3baac014be15fac67c6e815', 90, 1, NULL),
(5, 1, '103041571', 'Minnie', 'Mouse', 88, 'minnie@gmail.com', 2, '10470c3b4b1fed12c3baac014be15fac67c6e815', 97, 1, NULL),
(6, 1, '358313564', 'Clarabela', 'Vaca', 89, 'clarabela@gmail.com', 2, '10470c3b4b1fed12c3baac014be15fac67c6e815', 18, 1, NULL),
(7, 1, '582785610', 'Piu Piu', 'Piu', 73, 'piupiu@gmail.com', 2, '10470c3b4b1fed12c3baac014be15fac67c6e815', 78, 1, NULL),
(8, 1, '571822817', 'Pernalonga', 'Duck', 73, 'pernalonge@gmail.com', 2, '10470c3b4b1fed12c3baac014be15fac67c6e815', 172, 1, NULL),
(9, 1, '358313564', 'Taz', 'Mania', 65, 'taz@gmail.com', 2, '10470c3b4b1fed12c3baac014be15fac67c6e815', 65, 1, NULL),
(10, 1, '358313564', 'Patolino', 'Chato', 80, 'patolino@gmail.com', 2, '10470c3b4b1fed12c3baac014be15fac67c6e815', 5, 1, NULL),
(16, 1, 'admin', 'admin', NULL, NULL, NULL, 1, '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', NULL, 1, '2017-07-29 18:04:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas_qui_app`
--

CREATE TABLE `perguntas_qui_app` (
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

CREATE TABLE `pontos_app` (
  `ID_PONAPP` int(10) NOT NULL,
  `ID_PERFUSU` int(10) NOT NULL,
  `ID_JOGAPP` int(10) NOT NULL,
  `DATA_PONAPP` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagens_site`
--

CREATE TABLE `postagens_site` (
  `ID_POSSIT` int(10) NOT NULL,
  `TITULO_POSSIT` varchar(140) NOT NULL,
  `CORPO_POSSIT` varchar(500) NOT NULL,
  `AUTOR_POSSIT` int(4) NOT NULL,
  `DATA_POSSIT` datetime NOT NULL,
  `CATEGORIA` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prioridade_plat`
--

CREATE TABLE `prioridade_plat` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prioridade_plat`
--

INSERT INTO `prioridade_plat` (`id`, `name`) VALUES
(1, 'Alta'),
(2, 'Media'),
(3, 'Baixa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recompensas_app`
--

CREATE TABLE `recompensas_app` (
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

CREATE TABLE `recompensas_usuario_app` (
  `ID_RECUSUAPP` int(10) NOT NULL,
  `ID_PERFUSU` int(10) NOT NULL,
  `ID_RECAPP` int(10) NOT NULL,
  `DATA_RECUSUAPP` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessao_plat`
--

CREATE TABLE `sessao_plat` (
  `ID_SESPLA` int(10) NOT NULL,
  `ID_EMP` int(10) NOT NULL,
  `PARTICIPANTES_SESPLA` varchar(50) NOT NULL,
  `CONFIRMADOS_SESPLA` varchar(50) NOT NULL,
  `LIBERADO_SESPLA` tinyint(1) NOT NULL,
  `DATA_SESPLA` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sessao_plat`
--

INSERT INTO `sessao_plat` (`ID_SESPLA`, `ID_EMP`, `PARTICIPANTES_SESPLA`, `CONFIRMADOS_SESPLA`, `LIBERADO_SESPLA`, `DATA_SESPLA`) VALUES
(1, 0, '', '', 0, '0000-00-00 00:00:00'),
(2, 1, '', '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Pendente'),
(2, 'Em andamento'),
(3, 'Completado'),
(4, 'Cancelado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_perfusu`
--

CREATE TABLE `tipo_perfusu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_perfusu`
--

INSERT INTO `tipo_perfusu` (`id`, `name`) VALUES
(1, 'Para pés e pernas'),
(2, 'Para punhos e mãos'),
(3, 'Para lombar'),
(4, 'Para cervical');

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
-- Indexes for table `exercicios_plat`
--
ALTER TABLE `exercicios_plat`
  ADD PRIMARY KEY (`ID_EXERPLAT`);

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
-- Indexes for table `prioridade_plat`
--
ALTER TABLE `prioridade_plat`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_perfusu`
--
ALTER TABLE `tipo_perfusu`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `ID_ATIPLA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `exercicios_plat`
--
ALTER TABLE `exercicios_plat`
  MODIFY `ID_EXERPLAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `ID_PERFUSU` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
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
-- AUTO_INCREMENT for table `prioridade_plat`
--
ALTER TABLE `prioridade_plat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `ID_SESPLA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tipo_perfusu`
--
ALTER TABLE `tipo_perfusu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
