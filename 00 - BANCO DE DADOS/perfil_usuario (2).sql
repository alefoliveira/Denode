-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Set-2017 às 05:37
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
-- Estrutura da tabela `perfil_usuario`
--

CREATE TABLE `perfil_usuario` (
 
  `CARGO_PERFUSU` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil_usuario`
--

INSERT INTO `perfil_usuario` (`ID_PERFUSU`, `ID_EMP`, `CPF_PERFUSU`, `NOME_PERFUSU`, `SOBRENOME_PERFUSU`, `IDADE_PERFUSU`, `EMAIL_PERFUSU`, `TIPO_PERFUSU`, `IMAGEM_PERFUSU`, `LOCALIMG_PERFUSU`, `SENHA_PERFUSU`, `PONTOS_PERFUSU`, `ATIVO_PERFUSU`, `DURACAO_ATIPLA`, `CARGO_PERFUSU`) VALUES
(1, 1, '408564103', 'Mickey', 'Mouse', 88, 'mickey@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 123, 1, NULL, 'Redator(a)'),
(2, 1, '358313564', 'Donald', 'Duck', 83, 'donald@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 76, 1, NULL, 'Account Manager '),
(3, 1, '327689847', 'Pateta', 'Goofy Goof ', 85, 'pateta@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 45, 1, NULL, 'Analista de Desenvolvimento Java'),
(4, 1, '352789794', 'Margarida', 'Duck', 77, 'margarida@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 90, 1, NULL, 'Desenvolvedor(a) Front-end'),
(5, 1, '103041571', 'Minnie', 'Mouse', 88, 'minnie@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 97, 1, NULL, 'UX Designer'),
(6, 1, '358313564', 'Clarabela', 'Vaca', 89, 'clarabela@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 18, 1, NULL, 'Analista de Business Intelligence'),
(7, 1, '582785610', 'Piu Piu', 'Piu', 73, 'piupiu@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 78, 1, NULL, 'Representante Comercial'),
(8, 1, '571822817', 'Pernalonga', 'Duck', 73, 'pernalonge@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 172, 1, NULL, 'Analista de Desenvolvimento .NET'),
(9, 1, '358313564', 'Taz', 'Mania', 65, 'taz@gmail.com', 2, '', '', '10470c3b4b1fed12c3baac014be15fac67c6e815', 65, 1, NULL, 'Consultor(a) SAP Basis Autorizações'),
(10, 1, '358313564', 'Patolino', 'Chato', 80, 'patolino@gmail.com', 2, '', '', '', 5, 1, '2017-09-14 12:34:24', 'Diretor(a) de Arte Sênior'),
(16, 1, 'admin', 'admin', NULL, NULL, 'admin@gmail.com', 1, '', '', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', NULL, 1, '2017-07-29 18:04:36', 'Analista de Mídia de Performance'),
(32, 0, '12312312312', 'TESTE', 'TESTE', 1990, 'teste@gmail.com', 1, 0x3132333132333132333132313939302e6a7067, '../img/user', '$2a$08$MTY3NjUxODEzODU5YjFmZOkChIWLv84kIV648l.nGYk/9dtyGLrqW', NULL, 1, NULL, 'Técnico de Ti'),
(33, 0, '12345678999', 'Inglid', 'Ianka', 1996, 'inglid@gmail.com', 1, 0x3132333435363738393939313937382e706e67, './img/mcqueen', '', NULL, 1, '2017-09-10 23:29:00', 'Desenvolvedora Full Stack'),
(34, 0, '12345667812', 'oI', 'oi', 1990, 'inglidianka@gmail.com', 1, 0x3132333435363637383132313939302e706e67, '../img/Sem tÃ­tulo', '$2a$08$MjA1NjM0NTQ2NTU5YjU2OOPSdYRrI.fFKY/3k/AjXeZwPdsTNvrL6', NULL, 1, NULL, 'Analista de Customer Success Júnior'),
(35, 0, '12345667812', 'er', 'er', 1990, 'maikewt@gmail.com', 1, 0x3132333435363637383132313939302e6a7067, '../img/MySnapshot_4', '$2a$08$MTAxODQxOTgxNTU5YjU2YOxaa5YVw.xTC2/jQhcnwwMUT3BsGH7a.', NULL, 1, NULL, 'Auxiliar Administrativo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
  ADD PRIMARY KEY (`ID_PERFUSU`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
  MODIFY `ID_PERFUSU` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
