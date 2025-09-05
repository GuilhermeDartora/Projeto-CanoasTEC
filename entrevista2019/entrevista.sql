-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Abr-2019 às 00:41
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `entrevista`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nm_usuario` varchar(255) NOT NULL,
  `nr_cpf` varchar(14) NOT NULL,
  `ds_email` varchar(255) DEFAULT NULL,
  `ds_login` varchar(50) NOT NULL,
  `pw_senha` varchar(255) NOT NULL,
  `id_perfil` int(11) DEFAULT '1',
  `ao_status` tinyint(1) NOT NULL DEFAULT '1',
  `id_usuarioinclusao` int(11) NOT NULL,
  `id_usuarioalteracao` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `dt_alteracao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nm_usuario`, `nr_cpf`, `ds_email`, `ds_login`, `pw_senha`, `id_perfil`, `ao_status`, `id_usuarioinclusao`, `id_usuarioalteracao`, `dt_cadastro`, `dt_alteracao`) VALUES
(1, 'Desenvolvedor canoastec', '12345678996', 'dev@canoastec.com.br', 'dev.teste', 'senhadificil', 1, 1, 1, 1, '2019-04-17 00:00:00', '2019-04-17 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
