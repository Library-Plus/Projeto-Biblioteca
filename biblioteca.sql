-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2024 at 10:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `aluguel`
--

CREATE TABLE `aluguel` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `data_venda` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `aluguel`
--

INSERT INTO `aluguel` (`id`, `id_cliente`, `id_vendedor`, `data_venda`) VALUES
(5, 1, 3, '2024-04-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `aluguel_livro`
--

CREATE TABLE `aluguel_livro` (
  `id_venda` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `aluguel_livro`
--

INSERT INTO `aluguel_livro` (`id_venda`, `id_livro`) VALUES
(5, 11);

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `cpf` char(14) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Tabela para cadastro de Clientes da Biblioteca';

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `telefone`, `cpf`, `status`) VALUES
(1, 'Gabriel', 'gabriel@gmail.com', '11911111111', '11827835974', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `livro`
--

CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `capa` varchar(200) NOT NULL,
  `sinopse` text NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `livro`
--

INSERT INTO `livro` (`id`, `id_tipo`, `titulo`, `capa`, `sinopse`, `status`) VALUES
(11, 2, 'Star wars', 'retorno-20240528224836.jpg', 'aaaaa', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tipo`
--

INSERT INTO `tipo` (`id`, `genero`) VALUES
(2, 'Ficção Ciêntifica');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `usuario`, `senha`, `sexo`, `tipo`) VALUES
(1, 'Raphael', 'raphael', '202cb962ac59075b964b07152d234b70', 'Masculino', 1),
(7, 'Gabriel', 'gabriel', '202cb962ac59075b964b07152d234b70', 'Masculino', 1),
(11, 'leonardo', 'leonardo', '202cb962ac59075b964b07152d234b70', 'm', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vendedor`
--

CREATE TABLE `vendedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `cpf` char(14) NOT NULL,
  `admissao` datetime NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Tabela para cadastro de Vendedores da Biblioteca';

--
-- Dumping data for table `vendedor`
--

INSERT INTO `vendedor` (`id`, `nome`, `endereco`, `telefone`, `cpf`, `admissao`, `status`) VALUES
(3, 'Raphael Caetano Garcia Valinhas', 'Rua Palamede Milioli', '48999542837', '444.444.444-44', '0000-00-00 00:00:00', 'A'),
(6, 'Gabriel', 'rua mariano procopio', '48999542837', '444.444.444-33', '0000-00-00 00:00:00', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluguel`
--
ALTER TABLE `aluguel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_venda_x_cliente` (`id_cliente`),
  ADD KEY `fk_venda_x_vendedor` (`id_vendedor`);

--
-- Indexes for table `aluguel_livro`
--
ALTER TABLE `aluguel_livro`
  ADD KEY `fk_venda_livro_x_venda` (`id_venda`),
  ADD KEY `fk_venda_livro_x_livro` (`id_livro`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_livro_x_tipo` (`id_tipo`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluguel`
--
ALTER TABLE `aluguel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aluguel`
--
ALTER TABLE `aluguel`
  ADD CONSTRAINT `fk_venda_x_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_venda_x_vendedor` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `aluguel_livro`
--
ALTER TABLE `aluguel_livro`
  ADD CONSTRAINT `fk_venda_livro_x_livro` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_venda_livro_x_venda` FOREIGN KEY (`id_venda`) REFERENCES `aluguel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `fk_livro_x_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
