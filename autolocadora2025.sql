-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/05/2025 às 20:44
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `autolocadora2025`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `cliente_cpf` char(11) NOT NULL,
  `cliente_nome` varchar(100) DEFAULT NULL,
  `cliente_endereco` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblocacao`
--

CREATE TABLE `tblocacao` (
  `locacao_codigo` int(11) NOT NULL,
  `locacao_veiculo` varchar(7) DEFAULT NULL,
  `locacao_cliente` char(11) DEFAULT NULL,
  `locacao_data_inicio` date DEFAULT NULL,
  `locacao_data_fim` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbmarca`
--

CREATE TABLE `tbmarca` (
  `marca_codigo` int(11) NOT NULL,
  `marca_descricao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbveiculo`
--

CREATE TABLE `tbveiculo` (
  `veiculo_placa` varchar(7) NOT NULL,
  `veiculo_marca` int(11) DEFAULT NULL,
  `veiculo_descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`cliente_cpf`);

--
-- Índices de tabela `tblocacao`
--
ALTER TABLE `tblocacao`
  ADD PRIMARY KEY (`locacao_codigo`),
  ADD KEY `locacao_veiculo` (`locacao_veiculo`),
  ADD KEY `locacao_cliente` (`locacao_cliente`);

--
-- Índices de tabela `tbmarca`
--
ALTER TABLE `tbmarca`
  ADD PRIMARY KEY (`marca_codigo`);

--
-- Índices de tabela `tbveiculo`
--
ALTER TABLE `tbveiculo`
  ADD PRIMARY KEY (`veiculo_placa`),
  ADD KEY `veiculo_marca` (`veiculo_marca`);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tblocacao`
--
ALTER TABLE `tblocacao`
  ADD CONSTRAINT `tblocacao_ibfk_1` FOREIGN KEY (`locacao_veiculo`) REFERENCES `tbveiculo` (`veiculo_placa`),
  ADD CONSTRAINT `tblocacao_ibfk_2` FOREIGN KEY (`locacao_cliente`) REFERENCES `tbcliente` (`cliente_cpf`) ON DELETE CASCADE;

--
-- Restrições para tabelas `tbveiculo`
--
ALTER TABLE `tbveiculo`
  ADD CONSTRAINT `tbveiculo_ibfk_1` FOREIGN KEY (`veiculo_marca`) REFERENCES `tbmarca` (`marca_codigo`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
