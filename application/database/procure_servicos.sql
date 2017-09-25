-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Set-2017 às 01:24
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `procure_servicos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`id`, `category`, `description`) VALUES
(1, 'Chaveiro', NULL),
(2, 'Mecânico', NULL),
(3, 'Eletricista', NULL),
(4, 'Hidráulico', NULL),
(5, 'Pedreiro', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `category_professional`
--

CREATE TABLE `category_professional` (
  `id_category` int(11) NOT NULL,
  `id_professional` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `category_professional`
--

INSERT INTO `category_professional` (`id_category`, `id_professional`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 1),
(5, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `cpf_document` varchar(100) NOT NULL,
  `cpf_address` varchar(255) NOT NULL,
  `id_professional` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professional`
--

CREATE TABLE `professional` (
  `id` int(11) NOT NULL,
  `certificate` tinyint(4) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `invoice` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professional`
--

INSERT INTO `professional` (`id`, `certificate`, `id_user`, `cnpj`, `invoice`) VALUES
(1, 1, 1, '1222222222221', 1),
(2, 0, 2, NULL, 0),
(3, 1, 3, '12345643222', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `type_payment` float(10,2) NOT NULL,
  `value` float(10,2) NOT NULL,
  `description` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_professional` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `service_map`
--

CREATE TABLE `service_map` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `date_create` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `service_map`
--

INSERT INTO `service_map` (`id`, `name`, `description`, `date_create`, `order`, `status`, `id_user`) VALUES
(1, 'teste', 'teste descrição', 2147483647, 1, 1, 1),
(2, 'teste 2', 'teste 2 descrição', 2147483647, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `cep` int(11) NOT NULL,
  `nation` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `street` varchar(45) NOT NULL,
  `number` varchar(45) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `latitude` float(10,7) DEFAULT NULL,
  `longitude` float(10,7) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `name_picture` varchar(255) DEFAULT NULL,
  `address_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `cpf`, `cep`, `nation`, `country`, `city`, `street`, `number`, `complemento`, `latitude`, `longitude`, `email`, `name_picture`, `address_picture`) VALUES
(1, 'Neon Dotta', '22222222222', 90550002, 'Brasil', 'RS', 'Porto Alegre', 'Benjamim Constant', '1111', '', -30.0162868, -51.1535683, 'neon@neon.com', NULL, NULL),
(2, 'Tamara', '23232123412', 91360000, 'Brasil', 'RS', 'Porto Alegre', 'Avenida Do Forte', '697', '', -30.0113792, -51.1937218, 'tamara@tamara.com', NULL, NULL),
(3, 'Matheus', '12121212121', 91750740, 'Brasil', 'RS', 'Porto Alegre', 'Romeu Samarani Ferreira', '265', '', -30.1275501, -51.2082291, 'matheus@matheus.com', NULL, NULL),
(4, 'Deni', '12211245643', 92200300, 'Brasil', 'RS', 'Porto Alegre', 'Rua Primavera', '2109', '', -29.9635429, -51.1885872, 'deni@deni.com', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_professional`
--
ALTER TABLE `category_professional`
  ADD PRIMARY KEY (`id_category`,`id_professional`),
  ADD KEY `fk_category_professional_has_professional_professional1_idx` (`id_professional`),
  ADD KEY `fk_category_professional_has_professional_category_professi_idx` (`id_category`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_documents_professional1_idx` (`id_professional`);

--
-- Indexes for table `professional`
--
ALTER TABLE `professional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_professional_user1_idx` (`id_user`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_service_user_idx` (`id_user`),
  ADD KEY `fk_service_professional1_idx` (`id_professional`);

--
-- Indexes for table `service_map`
--
ALTER TABLE `service_map`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_service_map_user1_idx` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `professional`
--
ALTER TABLE `professional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service_map`
--
ALTER TABLE `service_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `category_professional`
--
ALTER TABLE `category_professional`
  ADD CONSTRAINT `fk_category_professional_has_professional_category_profession1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_category_professional_has_professional_professional1` FOREIGN KEY (`id_professional`) REFERENCES `professional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `fk_documents_professional1` FOREIGN KEY (`id_professional`) REFERENCES `professional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professional`
--
ALTER TABLE `professional`
  ADD CONSTRAINT `fk_professional_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `fk_service_professional1` FOREIGN KEY (`id_professional`) REFERENCES `professional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_service_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `service_map`
--
ALTER TABLE `service_map`
  ADD CONSTRAINT `fk_service_map_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
