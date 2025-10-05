-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 05-Out-2025 às 21:57
-- Versão do servidor: 5.7.36
-- versão do PHP: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `folha_pagto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionarios`
--

CREATE TABLE `tb_funcionarios` (
  `n_registro` int(11) NOT NULL,
  `nome_funcionario` varchar(225) NOT NULL,
  `data_admissao` date NOT NULL,
  `cargo` varchar(225) NOT NULL,
  `qtde_salarios` int(225) NOT NULL,
  `salario_bruto` int(225) NOT NULL,
  `inss` varchar(225) NOT NULL,
  `salario_liquido` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_funcionarios`
--

INSERT INTO `tb_funcionarios` (`n_registro`, `nome_funcionario`, `data_admissao`, `cargo`, `qtde_salarios`, `salario_bruto`, `inss`, `salario_liquido`) VALUES
(1, 'Ademir da Silva', '2023-02-01', 'Desenvolvedor Frontend', 1, 1412, 'isento', 1412),
(2, 'César Oliveira Cohen', '2020-02-29', 'DevOps', 5, 7060, '776.6', 6283),
(3, 'Maria Eduarda da Silva Araújo', '2024-10-01', 'Analista de QA', 3, 4236, '465.96', 3770);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_funcionarios`
--
ALTER TABLE `tb_funcionarios`
  ADD PRIMARY KEY (`n_registro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_funcionarios`
--
ALTER TABLE `tb_funcionarios`
  MODIFY `n_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
