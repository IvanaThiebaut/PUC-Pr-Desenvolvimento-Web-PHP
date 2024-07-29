CREATE DATABASE terapiadb; /*PRECISA SER terapiadb o nome do banco de dados */

-- Criar a tabela `procedimentos`

CREATE TABLE `procedimentos` (
  `ID_Proced` int(11) NOT NULL,
  `Nome_Proced` varchar(100) NOT NULL,
  `Descricao_Proced` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- dados na tabela `procedimentos`

INSERT INTO `procedimentos` (`ID_Proced`, `Nome_Proced`, `Descricao_Proced`) VALUES
(1, 'Hidratação Capilar', 'Hidratação profunda com tratamento combinado de  vitaminas e cremes.'),
(2, 'Limpeza do Couro Cabeludo', 'Remoção de células mortas, resíduos de produtos e excesso de oleosidade'),
(3, 'Detox Capilar', 'Limpeza profunda que desobstrui os poros e estimula a renovação celular.'),
(4, 'Massagem Capilar', 'A massoterapia estimula a circulação sanguínea no couro cabeludo, promovendo a oxigenação dos folículos pilosos e o relaxamento muscular.'),
(5, 'Microagulhamento Capilar', 'Utilizando Dermaroller ou Dermapen para a criação de microperfurações no couro cabeludo para estimular a produção de colágeno e o crescimento de novos fios.'),
(6, 'Ozonioterapia Capilar', 'Aplicação de Ozônio com ação antimicrobiana e estimulante que melhora a oxigenação do couro cabeludo e trata problemas como caspa e queda de cabelo.');

-- Criar a tabela `clientes`

CREATE TABLE `clientes` (
  `ID_Cliente` int(11) NOT NULL,
  `CPF` varchar(15) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `ID_Proced` int(11) NOT NULL,
  `Dt_Nasc` date DEFAULT NULL,
  `Dt_Proced` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dados da tabela `clientes`

INSERT INTO `clientes` (`ID_Cliente`, `CPF`, `Nome`, `ID_Proced`, `Dt_Nasc`, `Dt_Proced`) VALUES
(1, '017.844.256-85', 'Rosangela Ceccato', 1, '1963-10-16','2024-07-20'),
(2, '524.366.845-87', 'Valéria Maria', 2, '1993-05-16', '2024-07-19'),
(4, '541.255.874.21', 'Miguel Tissot', 4, '1996-12-10', '2024-07-19'),
(6, '214.688.259.36', 'Tania Marcia', 3, '1964-09-06','2024-07-22');

-- Criar a tabela `usuarios`

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `Nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Celular` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Login` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Senha` varchar(40) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


-- Índices para tabela `procedimentos`

ALTER TABLE `procedimentos`
  ADD PRIMARY KEY (`ID_Proced`);

-- Índices para tabela `clientes`

ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID_Cliente`),
  ADD UNIQUE KEY `UN_CPF` (`CPF`),
  ADD KEY `FK_ID_Proced` (`ID_Proced`);

-- Índices para tabela `usuarios`

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`);

-- AUTO_INCREMENT de tabela 'procedimentos`

ALTER TABLE `procedimentos`
  MODIFY `ID_Proced` int(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT de tabela `clientes`

ALTER TABLE `clientes`
  MODIFY `ID_Cliente` int(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT de tabela `usuarios`

ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT;

-- Limitadores para a tabela `clientes`

ALTER TABLE `clientes`
  ADD CONSTRAINT `FK_ID_Proced` FOREIGN KEY (`ID_Proced`) REFERENCES `procedimentos` (`ID_Proced`);

