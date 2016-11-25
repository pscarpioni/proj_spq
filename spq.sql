-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25-Nov-2016 às 00:03
-- Versão do servidor: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spq`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id_avaliacao` int(11) NOT NULL,
  `codigo_projeto` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `data_avaliacao` varchar(20) NOT NULL,
  `sugestao` varchar(400) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id_avaliacao`, `codigo_projeto`, `codigo_usuario`, `id_categoria`, `data_avaliacao`, `sugestao`) VALUES
(10, 8, 8, 1, '2016-11-24', 'O projeto poderia ampliar o leque de atuaÃ§Ã£o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao_possui_criterio`
--

CREATE TABLE IF NOT EXISTS `avaliacao_possui_criterio` (
  `id_avaliacao` int(11) NOT NULL,
  `codigo_projeto` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_criterio` int(11) NOT NULL,
  `nota` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao_possui_criterio`
--

INSERT INTO `avaliacao_possui_criterio` (`id_avaliacao`, `codigo_projeto`, `codigo_usuario`, `id_categoria`, `id_criterio`, `nota`) VALUES
(10, 8, 8, 1, 8, 50),
(10, 8, 8, 1, 9, 100),
(10, 8, 8, 1, 10, 64);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria_projeto` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria_projeto`) VALUES
(1, 'Pesquisa'),
(2, 'Competição Tecnológica'),
(3, 'Inovação no Ensino'),
(4, 'Manutenção e Reforma'),
(5, 'Pequenas Obras');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cota_financiamento`
--

CREATE TABLE IF NOT EXISTS `cota_financiamento` (
  `id_cota` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_financ` int(11) NOT NULL,
  `codigo_projeto` int(11) NOT NULL,
  `valor_total_cota` double NOT NULL,
  `valor_cota_proj` double NOT NULL,
  `data_repasse` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `criterio_avaliacao`
--

CREATE TABLE IF NOT EXISTS `criterio_avaliacao` (
  `id_criterio` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `criterio_avaliacao` varchar(50) NOT NULL,
  `status_criterio` varchar(20) NOT NULL,
  `peso_criterio` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `criterio_avaliacao`
--

INSERT INTO `criterio_avaliacao` (`id_criterio`, `id_categoria`, `codigo_usuario`, `criterio_avaliacao`, `status_criterio`, `peso_criterio`) VALUES
(8, 1, 1, 'Qualidade', 'Ativado', 5),
(9, 1, 1, 'Impacto', 'Ativado', 10),
(10, 1, 1, 'Inovacao', 'Ativado', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `edital`
--

CREATE TABLE IF NOT EXISTS `edital` (
  `id_edital` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nome_edital` varchar(30) NOT NULL,
  `data_publicacao` date NOT NULL,
  `data_termino` date NOT NULL,
  `valor_disponivel` double NOT NULL,
  `valor_minimo` double NOT NULL,
  `valor_maximo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `financiamento`
--

CREATE TABLE IF NOT EXISTS `financiamento` (
  `id_financ` int(11) NOT NULL,
  `codigo_projeto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `tipo_financ` varchar(30) NOT NULL,
  `quant_modulos` int(11) NOT NULL,
  `valor` double NOT NULL,
  `forma_pagamento` varchar(30) NOT NULL,
  `data_financiamento` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `financiamento`
--

INSERT INTO `financiamento` (`id_financ`, `codigo_projeto`, `id_categoria`, `codigo_usuario`, `tipo_financ`, `quant_modulos`, `valor`, `forma_pagamento`, `data_financiamento`) VALUES
(16, 8, 1, 9, 'Integral', 0, 100, 'Boleto Bancario', '2016-11-24'),
(17, 8, 1, 9, 'Integral', 0, 500, 'Boleto Bancario', '2016-11-24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE IF NOT EXISTS `projeto` (
  `codigo_projeto` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_edital` int(11) NOT NULL,
  `nome_projeto` varchar(30) NOT NULL,
  `duracao_projeto` int(11) NOT NULL,
  `valor_projeto` double NOT NULL,
  `status` varchar(20) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `link` varchar(50) NOT NULL,
  `imagem` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`codigo_projeto`, `codigo_usuario`, `id_categoria`, `id_edital`, `nome_projeto`, `duracao_projeto`, `valor_projeto`, `status`, `descricao`, `link`, `imagem`) VALUES
(6, 7, 1, 0, 'IOT e  ComputaÃ§Ã£o em NÃ©voa', 12, 2000, 'Candidato', 'Este projeto tem por finalidade desenvolver pesquisas relacionadas Ã  tecnologias de Internet das Coisas com ligaÃ§Ã£o Ã  ComputaÃ§Ã£o em NÃ©voa', 'https://www.youtube.com/watch?v=QSIPNhOiMoE', '97c46129ba097603cdbf29be3688e219.jpg'),
(8, 7, 1, 0, 'Analise Estatitistica', 10, 2500, 'Aprovado', 'Este projeto tem por finalidade realizar calculos e analises estatisticas para fins academicos da comunidade interna da Universidade Federal de Itajuba', 'https://www.youtube.com/watch?v=BV67KHwV-5A', '5d1396cf4e306c56ed4d609d90c40412.png'),
(9, 9, 3, 0, 'Acessibilidade Digital', 12, 10000, 'Candidato', '', '', '5b7dac7546ad3416d586202c164a4b4c.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recompensa`
--

CREATE TABLE IF NOT EXISTS `recompensa` (
  `id_recompensa` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_financ` int(11) NOT NULL,
  `codigo_projeto` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `valor_min` double NOT NULL,
  `valor_max` double NOT NULL,
  `limite` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `recompensa`
--

INSERT INTO `recompensa` (`id_recompensa`, `codigo_usuario`, `id_categoria`, `id_financ`, `codigo_projeto`, `descricao`, `valor_min`, `valor_max`, `limite`) VALUES
(10, 9, 1, 16, 8, 'Caneta', 15, 2000, 100),
(11, 9, 0, 0, 9, 'Caneta', 20, 100, 250);

-- --------------------------------------------------------

--
-- Estrutura da tabela `restricao_financiamento`
--

CREATE TABLE IF NOT EXISTS `restricao_financiamento` (
  `id_restricao` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo_projeto` int(11) NOT NULL,
  `prazo_max` int(11) NOT NULL,
  `valor_min` double NOT NULL,
  `valor_max` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `restricao_financiamento`
--

INSERT INTO `restricao_financiamento` (`id_restricao`, `codigo_usuario`, `id_categoria`, `codigo_projeto`, `prazo_max`, `valor_min`, `valor_max`) VALUES
(47, 1, 1, 8, 1, 10, 2000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo_usuario` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `cpf` varchar(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `rua` varchar(30) NOT NULL,
  `numero_residencia` int(11) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo_usuario`, `id_categoria`, `cpf`, `login`, `status`, `senha`, `nome`, `pais`, `cidade`, `estado`, `rua`, `numero_residencia`, `bairro`, `data_nascimento`, `email`, `tipo`) VALUES
(1, NULL, '56598896323', 'adm', 'Ativo', '123', 'Alberto Gomes', 'Brasil', 'Itajuba', 'Minas Gerais', 'Rua Lima', 89, 'Laranjal', '1970-02-24', 'adm@gmail.com', 1),
(6, NULL, '11378617622', 'pscarpioni', 'Desativado', '26121994', 'Pedro ', 'Brasil', 'Monte Siao', 'Minas', 'Coronel RennÃ³', 200, 'Centro', '1994-12-26', 'pscarpioni@gmail.com', 5),
(7, NULL, '123456789', 'kdantas', 'Ativo', '123456', 'Karen Dantas', 'Brasil', 'Itajuba', 'Minas Gerais', 'Avenida BPS', 102, 'Centro', '1995-11-24', 'karen@gmail.com', 2),
(8, 1, '987654321', 'vmanoel', 'Ativo', '147852', 'Vinicius', 'Brasil', 'Sao Jose do Alegre', 'Minas Gerais', 'A', 387, 'Centro', '1992-10-20', 'vinicius@gmail.com', 3),
(9, NULL, '1928374650', 'rlima', 'Ativo', '258963', 'Regiane Lima', 'Brasil', 'Itajuba', 'Minas Gerais', 'das Orquideas', 308, 'Centro', '1994-05-04', 'regiane@gmail.com', 4),
(10, 2, '1020304050', 'lregina', 'Ativo', '102030', 'Luana Regina', 'Brasil', 'Itajuba', 'Minas Gerais', 'A', 389, 'Centro', '1994-08-12', 'luana@gmail.com', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `valor_repasse_financeiro`
--

CREATE TABLE IF NOT EXISTS `valor_repasse_financeiro` (
  `id_repasse` int(11) NOT NULL,
  `codigo_projeto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `necessidade` varchar(40) NOT NULL,
  `data` date NOT NULL,
  `valor_parcela` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `valor_repasse_financeiro`
--

INSERT INTO `valor_repasse_financeiro` (`id_repasse`, `codigo_projeto`, `id_categoria`, `codigo_usuario`, `necessidade`, `data`, `valor_parcela`) VALUES
(4, 8, 1, 9, 'Calculadora Cientifica', '2016-11-24', 100),
(5, 8, 1, 9, 'Cadernos', '2016-11-24', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_avaliacao`);

--
-- Indexes for table `avaliacao_possui_criterio`
--
ALTER TABLE `avaliacao_possui_criterio`
  ADD PRIMARY KEY (`id_avaliacao`,`codigo_projeto`,`codigo_usuario`,`id_categoria`,`id_criterio`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `cota_financiamento`
--
ALTER TABLE `cota_financiamento`
  ADD PRIMARY KEY (`id_cota`);

--
-- Indexes for table `criterio_avaliacao`
--
ALTER TABLE `criterio_avaliacao`
  ADD PRIMARY KEY (`id_criterio`), ADD KEY `usuario_criterio_avaliacao_fk` (`codigo_usuario`), ADD KEY `usuario_criterio_avaliacao_fk1` (`id_categoria`);

--
-- Indexes for table `edital`
--
ALTER TABLE `edital`
  ADD PRIMARY KEY (`id_edital`), ADD KEY `usuario_edital_fk` (`codigo_usuario`), ADD KEY `usuario_edital_fk1` (`id_categoria`);

--
-- Indexes for table `financiamento`
--
ALTER TABLE `financiamento`
  ADD PRIMARY KEY (`id_financ`), ADD KEY `usuario_cota_financiamento_fk` (`codigo_usuario`), ADD KEY `usuario_cota_financiamento_fk1` (`id_categoria`);

--
-- Indexes for table `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`codigo_projeto`), ADD KEY `usuario_projeto_fk` (`codigo_usuario`), ADD KEY `usuario_projeto_fk1` (`id_categoria`);

--
-- Indexes for table `recompensa`
--
ALTER TABLE `recompensa`
  ADD PRIMARY KEY (`id_recompensa`);

--
-- Indexes for table `restricao_financiamento`
--
ALTER TABLE `restricao_financiamento`
  ADD PRIMARY KEY (`id_restricao`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo_usuario`), ADD KEY `categoria_usuario_fk` (`id_categoria`);

--
-- Indexes for table `valor_repasse_financeiro`
--
ALTER TABLE `valor_repasse_financeiro`
  ADD PRIMARY KEY (`id_repasse`), ADD KEY `usuario_valor_repasse_financeiro_fk` (`codigo_usuario`), ADD KEY `usuario_valor_repasse_financeiro_fk1` (`id_categoria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cota_financiamento`
--
ALTER TABLE `cota_financiamento`
  MODIFY `id_cota` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `criterio_avaliacao`
--
ALTER TABLE `criterio_avaliacao`
  MODIFY `id_criterio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `edital`
--
ALTER TABLE `edital`
  MODIFY `id_edital` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `financiamento`
--
ALTER TABLE `financiamento`
  MODIFY `id_financ` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `projeto`
--
ALTER TABLE `projeto`
  MODIFY `codigo_projeto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `recompensa`
--
ALTER TABLE `recompensa`
  MODIFY `id_recompensa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `restricao_financiamento`
--
ALTER TABLE `restricao_financiamento`
  MODIFY `id_restricao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `valor_repasse_financeiro`
--
ALTER TABLE `valor_repasse_financeiro`
  MODIFY `id_repasse` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `criterio_avaliacao`
--
ALTER TABLE `criterio_avaliacao`
ADD CONSTRAINT `categoria_criterio_avaliacao_fk` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `usuario_criterio_avaliacao_fk` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `usuario_criterio_avaliacao_fk1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `edital`
--
ALTER TABLE `edital`
ADD CONSTRAINT `usuario_edital_fk` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `usuario_edital_fk1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `financiamento`
--
ALTER TABLE `financiamento`
ADD CONSTRAINT `usuario_cota_financiamento_fk` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `usuario_cota_financiamento_fk1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
ADD CONSTRAINT `categoria_projeto_fk` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `usuario_projeto_fk` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `usuario_projeto_fk1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `categoria_usuario_fk` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `valor_repasse_financeiro`
--
ALTER TABLE `valor_repasse_financeiro`
ADD CONSTRAINT `usuario_valor_repasse_financeiro_fk` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `usuario_valor_repasse_financeiro_fk1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
