CREATE TABLE `tb_clientes` (
  `id_cliente` INT(11) NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(14) NULL,
  `nome` VARCHAR(60) NOT NULL,
  `data_nasc` VARCHAR(10) NOT NULL,
  `endereco` VARCHAR(60) NOT NULL,
  `n_comp` VARCHAR(20) NULL,
  `bairro` VARCHAR(40) NULL,
  `cidade` VARCHAR(40) NOT NULL,
  `uf` VARCHAR(2) NOT NULL,
  `fone` VARCHAR(18) NOT NULL,
  `e_mail` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_cliente`)
);

