-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Ago-2021 às 04:38
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `financeiro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banco`
--

CREATE TABLE `banco` (
  `id_banco` int(11) NOT NULL,
  `banco` varchar(50) NOT NULL,
  `agencia` varchar(50) NOT NULL,
  `conta` varchar(50) NOT NULL,
  `saldo` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `banco`
--

INSERT INTO `banco` (`id_banco`, `banco`, `agencia`, `conta`, `saldo`) VALUES
(13, 'Caixa', '3433', '2753-1', '2263.00'),
(14, 'Nubank', '5162', '1264', '143.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesa`
--

CREATE TABLE `despesa` (
  `id_despesa` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `fixo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `despesa`
--

INSERT INTO `despesa` (`id_despesa`, `descricao`, `fixo`) VALUES
(11, 'Alimentação', 'N'),
(12, 'Assinatura', 'S'),
(13, 'Serviços', 'N'),
(14, 'Bares', 'N'),
(15, 'Restaurantes', 'N'),
(16, 'Casa', 'N'),
(17, 'Compras', 'N'),
(18, 'Cuidado Pessoais', 'N'),
(19, 'Duvidas', 'N'),
(20, 'Empréstimos ', 'N'),
(21, 'Educação', 'N'),
(22, 'Familia', 'N'),
(23, 'Imposto e Taxa', 'N'),
(24, 'Investimentos ', 'N'),
(25, 'Lazer e Hobbies', 'N'),
(26, 'Mercado', 'N'),
(27, 'Pets e Gatos', 'N'),
(28, 'Presente e Doações', 'N'),
(29, 'Roupas', 'N'),
(30, 'Saúde', 'N'),
(31, 'Trabalho', 'N'),
(32, 'Transporte', 'N'),
(33, 'Viagem', 'N'),
(34, 'Internet', 'S'),
(35, 'Energia', 'N'),
(36, 'Gás Cozinha', 'S'),
(37, 'Cartão de Credito', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lancamento`
--

CREATE TABLE `lancamento` (
  `id_lancamento` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `id_banco` int(11) NOT NULL,
  `id_despesa` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `observacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lancamento`
--

INSERT INTO `lancamento` (`id_lancamento`, `tipo`, `id_banco`, `id_despesa`, `data`, `valor`, `observacao`) VALUES
(44, 'SAIDA', 14, 14, '2021-07-21', '40.00', 'BEBIDAS'),
(45, 'SAIDA', 14, 14, '2021-07-07', '40.00', 'BEBIDAS'),
(46, 'SAIDA', 14, 14, '2021-08-21', '40.00', 'BEBIDAS'),
(47, 'ENTRADA', 14, 14, '2021-08-21', '40.00', 'BEBIDAS'),
(48, 'SAIDA', 14, 14, '2021-07-14', '40.00', 'BEBIDAS'),
(49, 'ENTRADA', 14, 14, '2021-08-21', '40.00', 'BEBIDAS'),
(50, 'SAIDA', 14, 14, '2021-08-21', '40.00', 'BEBIDAS'),
(51, 'SAIDA', 14, 14, '2021-08-21', '40.00', 'BEBIDAS'),
(52, 'SAIDA', 14, 14, '2021-07-19', '40.00', 'BEBIDAS'),
(53, 'SAIDA', 14, 14, '2021-08-21', '40.00', 'BEBIDAS'),
(54, 'SAIDA', 14, 14, '2021-08-21', '40.00', 'BEBIDAS'),
(55, 'SAIDA', 14, 14, '2021-08-21', '1.00', 'BEBIDAS'),
(56, 'SAIDA', 14, 16, '2021-08-21', '5.00', 'BEBIDAS'),
(57, 'ENTRADA', 14, 16, '2021-07-15', '5.00', 'BEBIDAS'),
(58, 'SAIDA', 14, 16, '2021-08-21', '5.00', 'BEBIDAS'),
(59, 'ENTRADA', 14, 16, '2021-07-14', '5.00', 'BEBIDAS'),
(60, 'SAIDA', 14, 16, '2021-08-21', '5.00', 'BEBIDAS'),
(61, 'ENTRADA', 14, 16, '2021-08-21', '5.00', 'BEBIDAS'),
(62, 'SAIDA', 14, 11, '2021-08-21', '50.00', 'BEBIDAS'),
(63, 'ENTRADA', 14, 11, '2021-08-21', '50.00', 'BEBIDAS'),
(64, 'SAIDA', 14, 14, '2021-08-21', '1.00', 'BEBIDAS'),
(65, 'ENTRADA', 14, 14, '2021-08-21', '1.00', 'BEBIDAS'),
(66, 'SAIDA', 14, 14, '2021-07-21', '60.00', ''),
(67, 'ENTRADA', 14, 14, '2021-08-21', '60.00', ''),
(68, 'SAIDA', 14, 14, '2021-08-21', '101.00', 'BEBIDAS'),
(69, 'ENTRADA', 14, 14, '2021-08-21', '101.00', 'BEBIDAS'),
(70, 'SAIDA', 14, 14, '2021-08-21', '101.00', 'BEBIDAS'),
(71, 'ENTRADA', 14, 14, '2021-08-21', '101.00', 'BEBIDAS'),
(72, 'SAIDA', 14, 18, '2021-08-22', '8.00', ''),
(73, 'ENTRADA', 14, 18, '2021-08-22', '8.00', ''),
(74, 'SAIDA', 14, 18, '2021-08-22', '8.00', 'ggg'),
(75, 'ENTRADA', 14, 18, '2021-08-22', '8.00', 'ggg'),
(76, 'SAIDA', 14, 15, '2021-08-22', '8.00', 'BEBIDAS'),
(77, 'ENTRADA', 14, 15, '2021-08-22', '8.00', 'BEBIDAS'),
(78, 'SAIDA', 14, 11, '2021-08-22', '8.00', 'BEBIDAS'),
(79, 'ENTRADA', 14, 11, '2021-08-22', '8.00', 'BEBIDAS'),
(80, 'SAIDA', 14, 15, '2021-08-22', '8.00', 'BEBIDAS'),
(81, 'ENTRADA', 14, 15, '2021-08-22', '8.00', 'BEBIDAS'),
(82, 'SAIDA', 14, 11, '2021-08-22', '49.00', 'BEBIDAS'),
(83, 'ENTRADA', 14, 11, '2021-08-22', '49.00', 'BEBIDAS'),
(84, 'SAIDA', 14, 11, '2021-08-22', '49.00', 'BEBIDAS'),
(85, 'SAIDA', 14, 11, '2021-08-22', '49.00', 'BEBIDAS'),
(86, 'ENTRADA', 14, 11, '2021-08-22', '49.00', 'BEBIDAS'),
(87, 'SAIDA', 14, 11, '2021-08-22', '49.00', 'BEBIDAS'),
(88, 'ENTRADA', 14, 11, '2021-08-22', '49.00', 'BEBIDAS'),
(89, 'SAIDA', 14, 11, '2021-08-22', '1550.00', 'ggg'),
(90, 'ENTRADA', 14, 11, '2021-08-22', '1550.00', 'ggg'),
(91, 'SAIDA', 14, 11, '2021-08-22', '1110.00', 'BEBIDAS'),
(92, 'SAIDA', 14, 11, '2021-08-22', '1110.00', 'BEBIDAS'),
(93, 'SAIDA', 14, 11, '2021-08-22', '1110.00', 'BEBIDAS'),
(94, 'SAIDA', 14, 11, '2021-08-22', '1110.00', 'BEBIDAS'),
(95, 'SAIDA', 14, 13, '2021-08-22', '49.00', 'BEBIDAS'),
(96, 'SAIDA', 14, 13, '2021-08-22', '49.00', 'BEBIDAS'),
(97, 'ENTRADA', 14, 13, '2021-08-22', '49.00', 'BEBIDAS'),
(98, 'SAIDA', 14, 13, '2021-08-22', '49.00', 'BEBIDAS'),
(99, 'ENTRADA', 14, 13, '2021-08-22', '49.00', 'BEBIDAS'),
(100, 'SAIDA', 14, 13, '2021-08-22', '1000.00', 'BEBIDAS'),
(101, 'ENTRADA', 14, 13, '2021-08-22', '1000.00', 'BEBIDAS'),
(102, 'SAIDA', 14, 13, '2021-08-22', '1000.00', 'BEBIDAS'),
(103, 'ENTRADA', 14, 13, '2021-08-22', '1000.00', 'BEBIDAS'),
(104, 'SAIDA', 14, 11, '2021-08-22', '49.00', 'BEBIDAS'),
(105, 'ENTRADA', 14, 11, '2021-08-22', '49.00', 'BEBIDAS'),
(106, 'SAIDA', 14, 11, '2021-08-22', '26.90', 'BEBIDAS'),
(107, 'ENTRADA', 14, 11, '2021-08-22', '26.90', 'BEBIDAS'),
(108, 'SAIDA', 14, 11, '2021-08-22', '26.90', 'BEBIDAS'),
(109, 'ENTRADA', 14, 11, '2021-08-22', '26.90', 'BEBIDAS'),
(110, 'SAIDA', 13, 13, '2021-08-23', '49.00', 'BEBIDAS'),
(111, 'ENTRADA', 13, 13, '2021-08-23', '49.00', 'BEBIDAS'),
(112, 'SAIDA', 14, 13, '2021-08-23', '49.00', 'BEBIDAS'),
(113, 'ENTRADA', 14, 13, '2021-08-23', '49.00', 'BEBIDAS'),
(114, 'SAIDA', 14, 15, '2021-08-22', '451.00', '256'),
(115, 'ENTRADA', 14, 15, '2021-05-12', '451.00', '256'),
(116, 'SAIDA', 14, 13, '2021-08-22', '1554.00', '1fdef'),
(117, 'ENTRADA', 14, 13, '2021-06-09', '1554.00', '1fdef'),
(118, 'SAIDA', 14, 12, '2021-08-22', '49.00', 'BEBIDAS'),
(119, 'ENTRADA', 14, 12, '2021-08-22', '49.00', 'BEBIDAS'),
(120, 'SAIDA', 14, 12, '2021-07-08', '49.00', 'BEBIDAS'),
(121, 'ENTRADA', 14, 12, '2021-08-22', '49.00', 'BEBIDAS'),
(122, 'SAIDA', 14, 12, '2021-08-22', '49.00', 'BEBIDAS'),
(123, 'ENTRADA', 14, 12, '2021-08-22', '49.00', 'BEBIDAS'),
(124, 'SAIDA', 14, 12, '2021-08-22', '49.00', 'BEBIDAS'),
(125, 'ENTRADA', 14, 12, '2021-08-22', '49.00', 'BEBIDAS'),
(126, 'SAIDA', 14, 12, '2021-08-22', '49.00', 'BEBIDAS'),
(127, 'ENTRADA', 14, 12, '2021-08-22', '49.00', 'BEBIDAS'),
(128, 'SAIDA', 14, 12, '2021-08-22', '49.00', 'BEBIDAS'),
(129, 'ENTRADA', 14, 12, '2021-08-22', '49.00', 'BEBIDAS'),
(130, 'SAIDA', 14, 12, '2021-08-22', '49.00', 'BEBIDAS'),
(131, 'ENTRADA', 14, 12, '2021-08-22', '49.00', 'BEBIDAS'),
(132, 'SAIDA', 14, 12, '2021-08-22', '49.00', 'BEBIDAS'),
(133, 'ENTRADA', 14, 12, '2021-08-22', '49.00', 'BEBIDAS'),
(134, 'SAIDA', 14, 12, '2021-08-22', '49.00', 'BEBIDAS'),
(135, 'ENTRADA', 14, 12, '2021-08-22', '49.00', 'BEBIDAS'),
(136, 'SAIDA', 14, 11, '2021-08-19', '49.00', 'BEBIDAS'),
(137, 'ENTRADA', 14, 11, '2021-08-19', '49.00', 'BEBIDAS'),
(138, 'ENTRADA', 14, 11, '2021-08-22', '1550.00', '669sdsc'),
(139, 'ENTRADA', 14, 11, '2021-08-22', '1550.00', '669sdsc'),
(140, 'ENTRADA', 14, 11, '2021-08-22', '1550.00', '669sdsc'),
(141, 'ENTRADA', 14, 11, '2021-08-22', '1550.00', '669sdsc'),
(142, 'ENTRADA', 14, 11, '2021-08-22', '1550.00', '669sdsc'),
(143, 'ENTRADA', 14, 11, '2021-08-22', '1550.00', '669sdsc'),
(144, 'ENTRADA', 14, 11, '2021-06-10', '1550.00', '669sdsc'),
(145, 'ENTRADA', 14, 11, '2021-07-15', '1550.00', '669sdsc'),
(146, 'SAIDA', 14, 11, '2021-08-23', '888.00', 'BEBIDAS'),
(147, 'SAIDA', 14, 15, '2021-06-10', '2169.00', 'BEBIDAS'),
(148, 'ENTRADA', 14, 15, '2021-08-22', '201.00', 'BEBIDAS'),
(149, 'ENTRADA', 14, 15, '2021-08-22', '201.00', 'BEBIDAS'),
(150, 'SAIDA', 14, 11, '2021-08-22', '233.00', 'jjjj'),
(151, 'SAIDA', 14, 11, '2021-08-22', '233.00', 'jjjj'),
(152, 'SAIDA', 14, 11, '2021-08-22', '233.00', 'jjjj'),
(153, 'ENTRADA', 14, 15, '2021-08-18', '150.00', 'efc'),
(154, 'ENTRADA', 14, 11, '2021-08-22', '1555.00', 'BEBIDAS'),
(155, 'ENTRADA', 14, 11, '2021-08-22', '49.00', 'dfds'),
(156, 'SAIDA', 14, 11, '2021-08-13', '454.00', 'BEBIDAS'),
(157, 'SAIDA', 14, 11, '2021-08-22', '4.00', 'BEBIDAS'),
(158, 'SAIDA', 14, 11, '2021-08-22', '49.00', 'BEBIDAS'),
(159, 'SAIDA', 14, 19, '2021-08-22', '2000.00', 'fgff'),
(160, 'ENTRADA', 14, 14, '2021-08-22', '50.00', 'BEBIDAS'),
(161, 'SAIDA', 14, 28, '2021-08-22', '50.00', 'dvfdv'),
(162, 'ENTRADA', 14, 28, '2021-08-22', '20.00', 'dvfdv'),
(163, 'ENTRADA', 14, 18, '2021-08-22', '201.00', 'vfvfv'),
(164, 'ENTRADA', 14, 16, '2021-08-22', '20.00', 'dcfvgf'),
(165, 'ENTRADA', 14, 33, '2021-08-22', '30.00', '1fdef'),
(166, 'ENTRADA', 14, 11, '2021-08-22', '20.00', 'dcsd'),
(167, 'SAIDA', 14, 18, '2021-08-22', '50.00', 'BEBIDAS'),
(168, 'ENTRADA', 14, 18, '2021-08-22', '20.00', 'BEBIDAS'),
(169, 'SAIDA', 14, 11, '2021-08-22', '30.00', 'dcdc'),
(170, 'ENTRADA', 14, 15, '2021-08-22', '20.00', 'BEBIDAS'),
(171, 'ENTRADA', 14, 15, '2021-08-22', '20.00', 'BEBIDAS'),
(172, 'ENTRADA', 14, 22, '2021-08-20', '20.00', 'BEBIDAS'),
(173, 'ENTRADA', 14, 14, '2021-08-22', '50.00', 'vfdvghngh'),
(174, 'ENTRADA', 14, 11, '2021-08-22', '100.00', 'BEBIDAS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

CREATE TABLE `receita` (
  `id_receita` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `receita`
--

INSERT INTO `receita` (`id_receita`, `descricao`) VALUES
(2, 'Empréstimos'),
(3, 'Investimentos'),
(4, 'Outras Receitas'),
(5, 'Salário');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`id_banco`);

--
-- Índices para tabela `despesa`
--
ALTER TABLE `despesa`
  ADD PRIMARY KEY (`id_despesa`);

--
-- Índices para tabela `lancamento`
--
ALTER TABLE `lancamento`
  ADD PRIMARY KEY (`id_lancamento`),
  ADD KEY `fk_id_banco` (`id_banco`),
  ADD KEY `fk_id_despesa` (`id_despesa`);

--
-- Índices para tabela `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`id_receita`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `banco`
--
ALTER TABLE `banco`
  MODIFY `id_banco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `despesa`
--
ALTER TABLE `despesa`
  MODIFY `id_despesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `lancamento`
--
ALTER TABLE `lancamento`
  MODIFY `id_lancamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT de tabela `receita`
--
ALTER TABLE `receita`
  MODIFY `id_receita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `lancamento`
--
ALTER TABLE `lancamento`
  ADD CONSTRAINT `fk_id_banco` FOREIGN KEY (`id_banco`) REFERENCES `banco` (`id_banco`),
  ADD CONSTRAINT `fk_id_despesa` FOREIGN KEY (`id_despesa`) REFERENCES `despesa` (`id_despesa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
