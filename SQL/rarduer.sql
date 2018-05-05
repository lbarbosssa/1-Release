-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 05/05/2018 às 21:49
-- Versão do servidor: 10.1.31-MariaDB
-- Versão do PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rarduer`
--
CREATE DATABASE IF NOT EXISTS `rarduer` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rarduer`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `manut_maquinas`
--

CREATE TABLE `manut_maquinas` (
  `cod_manut` int(11) NOT NULL,
  `filial` varchar(6) DEFAULT NULL,
  `patrimonio` varchar(8) DEFAULT NULL,
  `jira` int(7) DEFAULT NULL,
  `defeito` varchar(60) DEFAULT NULL,
  `laudo_tec` varchar(100) DEFAULT NULL,
  `dt_manu` date DEFAULT NULL,
  `OBS` varchar(90) DEFAULT NULL,
  `tec_responsavel` varchar(20) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `dt_criacao` date NOT NULL,
  `dt_hr_criacao` datetime NOT NULL,
  `criado_por` varchar(100) NOT NULL,
  `dt_modificacao` datetime NOT NULL,
  `modificado_por` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(6) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(220) NOT NULL,
  `nivel_acesso_id` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `manut_maquinas`
--
ALTER TABLE `manut_maquinas`
  ADD PRIMARY KEY (`cod_manut`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `manut_maquinas`
--
ALTER TABLE `manut_maquinas`
  MODIFY `cod_manut` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
