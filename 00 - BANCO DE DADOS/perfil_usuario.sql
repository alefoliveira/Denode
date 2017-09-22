-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Set-2017 às 01:56
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
  `ID_PERFUSU` int(10) NOT NULL,
  `ID_EMP` int(10) NOT NULL,
  `CPF_PERFUSU` bigint(11) NOT NULL,
  `NOME_PERFUSU` varchar(30) NOT NULL,
  `SOBRENOME_PERFUSU` varchar(100) NOT NULL,
  `IDADE_PERFUSU` int(2) NOT NULL,
  `SEXO_PERFUSU` varchar(1) NOT NULL,
  `CARGO_PERFUSU` varchar(30) NOT NULL,
  `EMAIL_PERFUSU` varchar(140) NOT NULL,
  `TIPO_PERFUSU` int(1) NOT NULL,
  `IMAGEM_PERFUSU` mediumblob NOT NULL,
  `LOCALIMG_PERFUSU` varchar(100) NOT NULL,
  `SENHA_PERFUSU` varchar(60) NOT NULL,
  `PONTOS_PERFUSU` int(255) NOT NULL,
  `ATIVO_PERFUSU` int(11) NOT NULL DEFAULT '1',
  `DURACAO_ATIPLA` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil_usuario`
--

INSERT INTO `perfil_usuario` (`ID_PERFUSU`, `ID_EMP`, `CPF_PERFUSU`, `NOME_PERFUSU`, `SOBRENOME_PERFUSU`, `IDADE_PERFUSU`, `SEXO_PERFUSU`, `CARGO_PERFUSU`, `EMAIL_PERFUSU`, `TIPO_PERFUSU`, `IMAGEM_PERFUSU`, `LOCALIMG_PERFUSU`, `SENHA_PERFUSU`, `PONTOS_PERFUSU`, `ATIVO_PERFUSU`, `DURACAO_ATIPLA`) VALUES
(1, 0, 11111111111, 'Queen', 'Madonna', 1900, 'F', 'Rainha Pop', 'celebration@holiday.com', 1, 0x3131313131313131313131313930302e706e67, 'img/111111111111900.png', '$2a$08$MTAzNDc0ODE4OTU5YzA3Nu6oPKdkJPHbfqS22CkK4qNAAbmUM4NM.', 0, 1, '0000-00-00 00:00:00'),
(2, 0, 22222222222, 'Its Britney', 'Bitch', 1990, '', '', 'notthat@innocent.com', 2, 0x3232323232323232323232313939302e706e67, 'img/222222222221990.png', '$2a$08$OTY1ODA0NDg2NTliYWJhMu6mTJDTknUw2cdY/6oboEQtlwO3CsBGa', 0, 1, '0000-00-00 00:00:00'),
(3, 0, 33333333333, 'Lady', 'Gaga', 2005, '', '', 'poker@face.com', 3, 0x3333333333333333333333323030352e706e67, 'img/333333333332005.png', '$2a$08$NTQ0OTI4ODUwNTliYWJhNel3Cjw26DuXrWJtoaY5rVEgXXQZspjgi', 0, 1, '0000-00-00 00:00:00'),
(4, 0, 44444444444, 'Beyonce', 'Knowles', 1990, '', '', 'single@lady.com', 4, 0x3434343434343434343434313939302e706e67, 'img/444444444441990.png', '$2a$08$MTc2NTkzNDkwODU5YmFiYOTvH/fZskuKWibBCyrJ7KK8zV9/PXxlm', 0, 1, '0000-00-00 00:00:00'),
(5, 0, 55555555555, 'Mario', 'Bros', 1960, 'M', 'Encanador', 'mario@bros.com', 1, '', '', '$2a$08$MTYzNDk2NjUzNTU5YzNkNO4mae7xRJqijecSMyqsmkIPxr7/RV.Xa', 0, 1, '0000-00-00 00:00:00');

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
  MODIFY `ID_PERFUSU` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
