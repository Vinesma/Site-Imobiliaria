-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2019 at 10:29 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_imobiliaria`
--

-- --------------------------------------------------------

--
-- Table structure for table `aluguel`
--

CREATE TABLE `aluguel` (
  `ID_CO` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vigencia` int(11) DEFAULT NULL,
  `aprovado` tinyint(1) NOT NULL DEFAULT '0',
  `FK_CLLO` int(11) NOT NULL,
  `FK_CLLC` int(11) NOT NULL,
  `FK_IM` int(11) NOT NULL,
  `FK_CT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `ID_CL` int(11) NOT NULL,
  `login` varchar(40) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(20) CHARACTER SET utf8 NOT NULL,
  `endereco` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `telefone` varchar(30) CHARACTER SET utf8 NOT NULL,
  `tipo_pessoa` varchar(1) COLLATE latin1_bin NOT NULL,
  `imglink` text COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`ID_CL`, `login`, `senha`, `endereco`, `email`, `telefone`, `tipo_pessoa`, `imglink`) VALUES
(1, 'Vinesma', '38615612', 'Rua Edmundo Fernando Souza, N 228', 'otaviocos_13@hotmail.com', '38615612', 'F', 'imgdata/IMG-20161101-WA0001.jpg'),
(2, 'EmpresaQQ', '12345678', 'Rua Qualquer, N 02', 'empresa@email.com', '38615612', 'J', 'imgdata/IMG-20190104-WA0014.jpg'),
(3, 'ClienteTeste', '123456', 'Rua Qualquer, N 02', 'otaviocos_13@hotmail.com', '(11)11111-1111', 'F', 'imgdata/vector-person-icon-8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `corretor`
--

CREATE TABLE `corretor` (
  `ID_CT` int(11) NOT NULL,
  `login` varchar(40) COLLATE latin1_bin NOT NULL,
  `nome` varchar(50) COLLATE latin1_bin NOT NULL,
  `endereco` varchar(100) COLLATE latin1_bin NOT NULL,
  `senha` varchar(20) COLLATE latin1_bin NOT NULL,
  `cpf` varchar(11) COLLATE latin1_bin NOT NULL,
  `creci` varchar(6) COLLATE latin1_bin NOT NULL,
  `imglink` text COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `corretor`
--

INSERT INTO `corretor` (`ID_CT`, `login`, `nome`, `endereco`, `senha`, `cpf`, `creci`, `imglink`) VALUES
(1, 'admin', 'ADMIN', '...', 'admin', '11111111111', '111111', 'imgdata/default_user_img.png');

-- --------------------------------------------------------

--
-- Table structure for table `imovel`
--

CREATE TABLE `imovel` (
  `ID_IM` int(11) NOT NULL,
  `cidade` varchar(50) COLLATE latin1_bin NOT NULL,
  `finalidade` varchar(40) COLLATE latin1_bin NOT NULL,
  `garagens` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `descricao` varchar(400) COLLATE latin1_bin NOT NULL,
  `quartos` int(11) NOT NULL,
  `suites` int(11) NOT NULL,
  `banheiros` int(11) NOT NULL,
  `endereco` varchar(100) COLLATE latin1_bin NOT NULL,
  `imglink` text COLLATE latin1_bin NOT NULL,
  `preco` float NOT NULL,
  `FK_TI` int(11) NOT NULL,
  `FK_CLPR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `imovel`
--

INSERT INTO `imovel` (`ID_IM`, `cidade`, `finalidade`, `garagens`, `area`, `descricao`, `quartos`, `suites`, `banheiros`, `endereco`, `imglink`, `preco`, `FK_TI`, `FK_CLPR`) VALUES
(7, 'Juazeiro', 'Aluguel', 2, 20, 'DescriÃ§Ã£o curta.', 1, 1, 1, 'Rua Edmundo Fernando Souza, N 228', 'imgdata/em-frente-ao-estabelecimento.jpg', 20000, 4, 2),
(8, 'Petrolina', 'Venda', 1, 40, 'DescriÃ§Ã£o mÃ©dia, apresenta informaÃ§Ã£o breve sobre o imÃ³vel e aponta algumas observaÃ§Ãµes rÃ¡pidas.', 2, 2, 1, 'Rua Qualquer, N 02', 'imgdata/20171011fachada-casa-simples-pequena-99.jpg', 80000, 1, 1),
(9, 'Juazeiro', 'Venda', 0, 40, 'DescriÃ§Ã£o longa. Entra em detalhes sobre o imÃ³vel e seus pontos de interesse. Providencia um argumento ou algo a mais para realmente vender/alugar o imÃ³vel.', 0, 0, 0, 'Rua Edmundo Fernando Souza, N 228', 'imgdata/terreno.jpg', 60000, 2, 2),
(10, 'Petrolina', 'Aluguel', 0, 25, 'DescriÃ§Ã£o longa. Entra em detalhes sobre o imÃ³vel e seus pontos de interesse. Providencia um argumento ou algo a mais para realmente vender/alugar o imÃ³vel.', 2, 0, 1, 'Rua Qualquer, N 02', 'imgdata/ap.jpg', 120000, 3, 2),
(11, 'Juazeiro', 'Venda', 0, 50, 'DescriÃ§Ã£o curta.', 0, 0, 0, 'Rua Edmundo Fernando Souza, N 228', 'imgdata/terreno2.jpg', 70000, 2, 2),
(12, 'Petrolina', 'Venda', 2, 50, 'DescriÃ§Ã£o mÃ©dia, apresenta informaÃ§Ã£o breve sobre o imÃ³vel e aponta algumas observaÃ§Ãµes rÃ¡pidas.', 3, 1, 2, 'Rua Qualquer, N 02', 'imgdata/casa.jpg', 200000, 1, 1),
(13, 'Juazeiro', 'Aluguel', 6, 30, 'DescriÃ§Ã£o longa. Entra em detalhes sobre o imÃ³vel e seus pontos de interesse. Providencia um argumento ou algo a mais para realmente vender/alugar o imÃ³vel.', 0, 0, 2, 'Rua Qualquer, N 02', 'imgdata/est.jpg', 700, 4, 2),
(14, 'Petrolina', 'Aluguel', 0, 30, 'DescriÃ§Ã£o mÃ©dia, apresenta informaÃ§Ã£o breve sobre o imÃ³vel e aponta algumas observaÃ§Ãµes rÃ¡pidas.', 2, 0, 1, 'Rua Edmundo Fernando Souza, N 228', 'imgdata/apartamento-jardim-de-valencia-fachad-1680x530-A_B.jpg', 600, 3, 2),
(15, 'Petrolina', 'Venda', 1, 50, 'DescriÃ§Ã£o curta.', 2, 1, 2, 'Rua Edmundo Fernando Souza, N 228', 'imgdata/casa2.jpg', 120000, 1, 1),
(16, 'Juazeiro', 'Aluguel', 10, 50, 'DescriÃ§Ã£o longa. Entra em detalhes sobre o imÃ³vel e seus pontos de interesse. Providencia um argumento ou algo a mais para realmente vender/alugar o imÃ³vel. DescriÃ§Ã£o longa.', 0, 0, 4, 'Rua Edmundo Fernando Souza, N 228', 'imgdata/estabelecimento-tea-shop.jpg', 1000, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pessoa_fisica`
--

CREATE TABLE `pessoa_fisica` (
  `FK_CL` int(11) NOT NULL,
  `nome` varchar(50) COLLATE latin1_bin NOT NULL,
  `cpf` varchar(11) COLLATE latin1_bin NOT NULL,
  `sexo` varchar(10) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `pessoa_fisica`
--

INSERT INTO `pessoa_fisica` (`FK_CL`, `nome`, `cpf`, `sexo`) VALUES
(1, 'Otavio Cornelio da Silva', '11787074820', 'Masculino'),
(3, 'Cliente', '11787074820', 'Feminino');

-- --------------------------------------------------------

--
-- Table structure for table `pessoa_juridica`
--

CREATE TABLE `pessoa_juridica` (
  `FK_CL` int(11) NOT NULL,
  `nomef` varchar(80) COLLATE latin1_bin NOT NULL,
  `cnpj` varchar(14) COLLATE latin1_bin NOT NULL,
  `ramo` varchar(50) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `pessoa_juridica`
--

INSERT INTO `pessoa_juridica` (`FK_CL`, `nomef`, `cnpj`, `ramo`) VALUES
(2, 'Empresa Qualquer ltda.', '12389548135210', 'Tudo e qualquer coisa');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_imovel`
--

CREATE TABLE `tipo_imovel` (
  `ID_TI` int(11) NOT NULL,
  `nome` varchar(30) COLLATE latin1_bin NOT NULL,
  `descricao` varchar(60) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `tipo_imovel`
--

INSERT INTO `tipo_imovel` (`ID_TI`, `nome`, `descricao`) VALUES
(1, 'Casa', 'Casa simples'),
(2, 'Terreno', 'Terreno sem construção'),
(3, 'Apartamento', 'Moradia de várias pessoas'),
(4, 'Comercial', 'Estabelecimento com fins lucrativos');

-- --------------------------------------------------------

--
-- Table structure for table `venda`
--

CREATE TABLE `venda` (
  `ID_VD` int(11) NOT NULL,
  `valor` double NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aprovado` tinyint(1) NOT NULL DEFAULT '0',
  `FK_CT` int(11) DEFAULT NULL,
  `FK_IM` int(11) NOT NULL,
  `FK_CTPR` int(11) NOT NULL,
  `FK_CTCP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluguel`
--
ALTER TABLE `aluguel`
  ADD PRIMARY KEY (`ID_CO`),
  ADD KEY `FK2_CLLC` (`FK_CLLC`),
  ADD KEY `FK2_CLLO` (`FK_CLLO`),
  ADD KEY `FK2_CT` (`FK_CT`),
  ADD KEY `FK2_IM` (`FK_IM`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_CL`);

--
-- Indexes for table `corretor`
--
ALTER TABLE `corretor`
  ADD PRIMARY KEY (`ID_CT`);

--
-- Indexes for table `imovel`
--
ALTER TABLE `imovel`
  ADD PRIMARY KEY (`ID_IM`),
  ADD KEY `FK_TI` (`FK_TI`),
  ADD KEY `FK_CLPRP` (`FK_CLPR`);

--
-- Indexes for table `pessoa_fisica`
--
ALTER TABLE `pessoa_fisica`
  ADD KEY `FK_CL` (`FK_CL`);

--
-- Indexes for table `pessoa_juridica`
--
ALTER TABLE `pessoa_juridica`
  ADD KEY `FK2_CL` (`FK_CL`);

--
-- Indexes for table `tipo_imovel`
--
ALTER TABLE `tipo_imovel`
  ADD PRIMARY KEY (`ID_TI`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`ID_VD`),
  ADD KEY `FK_CT` (`FK_CT`),
  ADD KEY `FK_IM` (`FK_IM`),
  ADD KEY `FK_CLCP` (`FK_CTCP`),
  ADD KEY `FK_CLPR` (`FK_CTPR`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluguel`
--
ALTER TABLE `aluguel`
  MODIFY `ID_CO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_CL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `corretor`
--
ALTER TABLE `corretor`
  MODIFY `ID_CT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `imovel`
--
ALTER TABLE `imovel`
  MODIFY `ID_IM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tipo_imovel`
--
ALTER TABLE `tipo_imovel`
  MODIFY `ID_TI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `ID_VD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aluguel`
--
ALTER TABLE `aluguel`
  ADD CONSTRAINT `FK2_CLLC` FOREIGN KEY (`FK_CLLC`) REFERENCES `cliente` (`ID_CL`),
  ADD CONSTRAINT `FK2_CLLO` FOREIGN KEY (`FK_CLLO`) REFERENCES `cliente` (`ID_CL`),
  ADD CONSTRAINT `FK2_CT` FOREIGN KEY (`FK_CT`) REFERENCES `corretor` (`ID_CT`),
  ADD CONSTRAINT `FK2_IM` FOREIGN KEY (`FK_IM`) REFERENCES `imovel` (`ID_IM`);

--
-- Constraints for table `imovel`
--
ALTER TABLE `imovel`
  ADD CONSTRAINT `FK_CLPRP` FOREIGN KEY (`FK_CLPR`) REFERENCES `cliente` (`ID_CL`),
  ADD CONSTRAINT `FK_TI` FOREIGN KEY (`FK_TI`) REFERENCES `tipo_imovel` (`ID_TI`);

--
-- Constraints for table `pessoa_fisica`
--
ALTER TABLE `pessoa_fisica`
  ADD CONSTRAINT `FK_CL` FOREIGN KEY (`FK_CL`) REFERENCES `cliente` (`ID_CL`);

--
-- Constraints for table `pessoa_juridica`
--
ALTER TABLE `pessoa_juridica`
  ADD CONSTRAINT `FK2_CL` FOREIGN KEY (`FK_CL`) REFERENCES `cliente` (`ID_CL`);

--
-- Constraints for table `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `FK_CLCP` FOREIGN KEY (`FK_CTCP`) REFERENCES `cliente` (`ID_CL`),
  ADD CONSTRAINT `FK_CLPR` FOREIGN KEY (`FK_CTPR`) REFERENCES `cliente` (`ID_CL`),
  ADD CONSTRAINT `FK_CT` FOREIGN KEY (`FK_CT`) REFERENCES `corretor` (`ID_CT`),
  ADD CONSTRAINT `FK_IM` FOREIGN KEY (`FK_IM`) REFERENCES `imovel` (`ID_IM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
