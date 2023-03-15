-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 15/03/2023 às 17:49
-- Versão do servidor: 5.6.51
-- Versão do PHP: 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `products`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `product_book`
--

CREATE TABLE `product_book` (
  `id` int(11) NOT NULL,
  `sku` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `type` varchar(15) NOT NULL,
  `weight` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `product_dvd`
--

CREATE TABLE `product_dvd` (
  `id` int(11) NOT NULL,
  `sku` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `type` varchar(15) NOT NULL,
  `size` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `product_furniture`
--

CREATE TABLE `product_furniture` (
  `id` int(11) NOT NULL,
  `sku` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `type` varchar(15) NOT NULL,
  `height` decimal(8,2) NOT NULL,
  `width` decimal(8,2) NOT NULL,
  `length` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `product_book`
--
ALTER TABLE `product_book`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- Índices de tabela `product_dvd`
--
ALTER TABLE `product_dvd`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- Índices de tabela `product_furniture`
--
ALTER TABLE `product_furniture`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `product_book`
--
ALTER TABLE `product_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `product_dvd`
--
ALTER TABLE `product_dvd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `product_furniture`
--
ALTER TABLE `product_furniture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;