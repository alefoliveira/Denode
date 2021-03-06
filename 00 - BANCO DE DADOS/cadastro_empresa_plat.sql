-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Set-2017 às 22:57
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
-- Estrutura da tabela `cadastro_empresa_plat`
--

CREATE TABLE `cadastro_empresa_plat` (
  `ID_CADEMPPLA` int(10) NOT NULL,
  `RAZAOSOCIAL_CADEMPPLA` varchar(30) NOT NULL,
  `NOMEFANTASIA_CADEMPPLA` varchar(30) NOT NULL,
  `CNPJ_CADEMPPLA` int(14) NOT NULL,
  `ENDERECO_CADEMPPLA` varchar(30) NOT NULL,
  `TELEFONE_CADEMPPLA` int(12) NOT NULL,
  `RESPCONTATO_CADEMPPLA` varchar(30) NOT NULL,
  `EMAIL_CADEMPPLA` varchar(100) NOT NULL,
  `INSCRESTADUAL_CADEMPPLA` int(30) NOT NULL,
  `NUMFUNCIONARIOS_CADEMPPLA` int(2) NOT NULL,
  `RAMOATIV_CADEMPPLA` varchar(30) NOT NULL,
  `SETOR_CADEMPPLA` varchar(30) NOT NULL,
  `REPRNOME_CADEMPPLA` varchar(30) NOT NULL,
  `REPRCPF_CADEMPPLA` varchar(11) NOT NULL,
  `REPRSEXO_CADEMPPLA` varchar(9) NOT NULL,
  `REPRDATANASC_CADEMPPLA` date NOT NULL,
  `REPRCARGO_CADEMPPLA` varchar(20) NOT NULL,
  `REPREMAIL_CADEMPPLA` varchar(100) NOT NULL,
  `REPRENDERECO_CADEMPPLA` varchar(30) NOT NULL,
  `REPRTELEFONE_CADEMPPLA` varchar(12) NOT NULL,
  `REPRCELULAR_CADEMPPLA` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadastro_empresa_plat`
--
ALTER TABLE `cadastro_empresa_plat`
  ADD PRIMARY KEY (`ID_CADEMPPLA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadastro_empresa_plat`
--
ALTER TABLE `cadastro_empresa_plat`
  MODIFY `ID_CADEMPPLA` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
