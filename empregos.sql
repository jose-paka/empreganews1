-- phpMyAdmin SQL Dump
-- version 4.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 08-Jun-2025 às 02:02
-- Versão do servidor: 5.6.22
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `empregos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidatos`
--

CREATE TABLE IF NOT EXISTS `candidatos` (
`id` int(11) NOT NULL,
  `nome` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idade` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `corriculo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `candidatos`
--

INSERT INTO `candidatos` (`id`, `nome`, `email`, `idade`, `sexo`, `contacto`, `descricao`, `corriculo`, `created`) VALUES
(16, 'domingos pongolola', 'domingos@gmail.com', '23', 'Macolino', '930581053', 'O gerenciador de anÃºncios.', 'busca.html', '2025-06-28 09:26:23'),
(17, 'asfongff', 'fgfjkltffghgb@hotmail.com', '19', 'Macolino', '925443311', 'gestor', 'vantagens_desvantagens_gerenciador_vagas_cladanto_netos.docx', '2025-06-28 10:37:53'),
(18, 'domingos pongolola', 'domingos@gmail.com', '23', 'Mascolino', '55446464', '464646464', 'vantagens_desvantagens_gerenciador_vagas_cladanto_netos.docx', '2025-06-28 10:56:04'),
(19, 'kbhivu', 'domingos@gmail.com', '67', 'Mascolino', '089789', '797969', 'ad', '2025-06-28 08:08:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidaturas`
--

CREATE TABLE IF NOT EXISTS `candidaturas` (
`id` int(11) NOT NULL,
  `vaga_id` int(11) DEFAULT NULL,
  `candidato_id` int(11) DEFAULT NULL,
  `data_candidatura` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
`id` int(11) NOT NULL,
  `nome` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('candidato','empresa','admin') NOT NULL,
  `nif` varchar(30) DEFAULT NULL,
  `empresa_nome` varchar(100) DEFAULT NULL,
  `empresa_endereco` varchar(150) DEFAULT NULL,
  `empresa_contacto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `password`, `user_type`, `nif`, `empresa_nome`, `empresa_endereco`, `empresa_contacto`) VALUES
(20, 'domingos', 'domingos@gmail.com', '1234', 'candidato', NULL, NULL, NULL, NULL),
(21, 'cladanto neto', 'cladantoneto@gmail.com', '12345', 'empresa', '12343L2302wLA', 'Conlexo escola cladanto neto', 'LUanda, viana, estalagem', '930581053');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE IF NOT EXISTS `vagas` (
`id` int(11) NOT NULL,
  `nome_empresa` varchar(222) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` varchar(222) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=286 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`id`, `nome_empresa`, `nome`, `tipo`, `area`, `nivel`, `cidade`, `descricao`, `created`, `modified`) VALUES
(283, 'Conplexo escolar cladanto neto', 'Professor de matemÃ¡tica', 'Estagiario', 'Administrativa', 'Proficional', 'LUanda, viana, estalagem', 'melher em todo para o bem dos alunos.', '2025-06-07 21:04:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidatos`
--
ALTER TABLE `candidatos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidaturas`
--
ALTER TABLE `candidaturas`
 ADD PRIMARY KEY (`id`), ADD KEY `vaga_id` (`vaga_id`), ADD KEY `candidato_id` (`candidato_id`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vagas`
--
ALTER TABLE `vagas`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidatos`
--
ALTER TABLE `candidatos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `candidaturas`
--
ALTER TABLE `candidaturas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `vagas`
--
ALTER TABLE `vagas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=286;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `candidaturas`
--
ALTER TABLE `candidaturas`
ADD CONSTRAINT `candidaturas_ibfk_1` FOREIGN KEY (`vaga_id`) REFERENCES `vagas` (`id`),
ADD CONSTRAINT `candidaturas_ibfk_2` FOREIGN KEY (`candidato_id`) REFERENCES `candidatos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
