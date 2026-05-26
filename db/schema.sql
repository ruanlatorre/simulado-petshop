-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema petshop_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema petshop_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `petshop_db` DEFAULT CHARACTER SET utf8 ;
USE `petshop_db` ;

-- -----------------------------------------------------
-- Table `petshop_db`.`brinquedos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop_db`.`brinquedos` (
  `idbrinquedos` INT(11) NOT NULL,
  `nome_brinquedo` VARCHAR(45) NULL DEFAULT NULL,
  `peso_brinquedo` VARCHAR(45) NULL DEFAULT NULL,
  `unidade_medida` VARCHAR(45) NULL DEFAULT NULL,
  `tipo_brinquedo` VARCHAR(45) NULL DEFAULT NULL,
  `tipo_animal` VARCHAR(45) NULL DEFAULT NULL,
  `quantidade` INT(11) NULL DEFAULT 0,
  PRIMARY KEY (`idbrinquedos`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `petshop_db`.`medicamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop_db`.`medicamentos` (
  `idmedicamentos` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_medicamento` VARCHAR(45) NULL DEFAULT NULL,
  `unidade_medida` VARCHAR(45) NULL DEFAULT NULL,
  `tipo_sintoma` VARCHAR(45) NULL DEFAULT NULL,
  `peso_recomendado` VARCHAR(45) NULL DEFAULT NULL,
  `tipo_animal` VARCHAR(45) NULL DEFAULT NULL,
  `quantidade` INT(11) NULL DEFAULT 0,
  PRIMARY KEY (`idmedicamentos`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `petshop_db`.`movimentacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop_db`.`movimentacao` (
  `idmovimentacao` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo_mov` VARCHAR(45) NULL DEFAULT NULL,
  `quantidade` INT(11) NULL DEFAULT NULL,
  `categoria` VARCHAR(45) NULL DEFAULT NULL,
  `produto` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idmovimentacao`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `petshop_db`.`produtos_higiene`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop_db`.`produtos_higiene` (
  `idprodutohigiene` INT(11) NOT NULL AUTO_INCREMENT,
  `marca_produto` VARCHAR(45) NULL DEFAULT NULL,
  `peso_produto` VARCHAR(45) NULL DEFAULT NULL,
  `unidade_medida` VARCHAR(45) NULL DEFAULT NULL,
  `tipo_produto` VARCHAR(45) NULL DEFAULT NULL,
  `tipo_animal` VARCHAR(45) NULL DEFAULT NULL,
  `quantidade` INT(11) NULL DEFAULT 0,
  PRIMARY KEY (`idprodutohigiene`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `petshop_db`.`racoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop_db`.`racoes` (
  `idracoes` INT(11) NOT NULL AUTO_INCREMENT,
  `marca_racao` VARCHAR(45) NULL DEFAULT NULL,
  `peso_racao` VARCHAR(45) NULL DEFAULT NULL,
  `unidade_medida` VARCHAR(45) NULL DEFAULT NULL,
  `sabor_racao` VARCHAR(45) NULL DEFAULT NULL,
  `tipo_racao` VARCHAR(45) NULL DEFAULT NULL,
  `tipo_animal` VARCHAR(45) NULL DEFAULT NULL,
  `quantidade` INT(11) NULL DEFAULT 0,
  PRIMARY KEY (`idracoes`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `petshop_db`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop_db`.`usuario` (
  `idusuario` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `senha` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



INSERT INTO `petshop_db`.`usuario` (email, senha) VALUES ('admin@petshop.com', 'admin123');
INSERT INTO `petshop_db`.`usuario` (email, senha) VALUES ('vendedor@petshop.com', 'senha123');
INSERT INTO `petshop_db`.`usuario` (email, senha) VALUES ('gerente@petshop.com', 'gerente123');

INSERT INTO `petshop_db`.`brinquedos` (nome_brinquedo, peso_brinquedo, unidade_medida, tipo_brinquedo, tipo_animal, quantidade) 
VALUES ('Bolinha Furacão', '0.2', 'kg', 'Mordedor', 'Cachorro', 25);
INSERT INTO `petshop_db`.`brinquedos` (nome_brinquedo, peso_brinquedo, unidade_medida, tipo_brinquedo, tipo_animal, quantidade) 
VALUES ('Ratinho de Corda', '0.05', 'kg', 'Interativo', 'Gato', 15);
INSERT INTO `petshop_db`.`brinquedos` (nome_brinquedo, peso_brinquedo, unidade_medida, tipo_brinquedo, tipo_animal, quantidade) 
VALUES ('Mordedor Osso Nylon', '0.3', 'kg', 'Mordedor', 'Cachorro', 30);


INSERT INTO `petshop_db`.`medicamentos` (nome_medicamento, unidade_medida, tipo_sintoma, peso_recomendado, tipo_animal, quantidade) 
VALUES ('Vermífugo Plus', 'ml', 'Vermes intestinais', '10.00', 'Cachorro', 22);
INSERT INTO `petshop_db`.`medicamentos` (nome_medicamento, unidade_medida, tipo_sintoma, peso_recomendado, tipo_animal, quantidade) 
VALUES ('Anti-inflamatório Max', 'ml', 'Dores e inflamações', '5.00', 'Gato', 8);
INSERT INTO `petshop_db`.`medicamentos` (nome_medicamento, unidade_medida, tipo_sintoma, peso_recomendado, tipo_animal, quantidade) 
VALUES ('Antiparasitário Spot', 'ml', 'Pulgas e Carrapatos', '15.00', 'Cachorro', 35);


INSERT INTO `petshop_db`.`produtos_higiene` (marca_produto, tipo_produto, peso_produto, unidade_medida, tipo_animal, quantidade) 
VALUES ('PetShampoo Neutro', 'Shampoo', '500', 'ml', 'Cachorro', 40);
INSERT INTO `petshop_db`.`produtos_higiene` (marca_produto, tipo_produto, peso_produto, unidade_medida, tipo_animal, quantidade) 
VALUES ('GatoLindo Condicionador', 'Condicionador', '250', 'ml', 'Gato', 12);
INSERT INTO `petshop_db`.`produtos_higiene` (marca_produto, tipo_produto, peso_produto, unidade_medida, tipo_animal, quantidade) 
VALUES ('Limpa Orelhas Easy', 'Loção', '100', 'ml', 'Cachorro', 25);


INSERT INTO `petshop_db`.`racoes` (marca_racao, tipo_racao, peso_racao, unidade_medida, tipo_animal, quantidade) 
VALUES ('Golden Special Frango', 'Seca', '15', 'kg', 'Cachorro', 50);
INSERT INTO `petshop_db`.`racoes` (marca_racao, tipo_racao, peso_racao, unidade_medida, tipo_animal, quantidade) 
VALUES ('PremieR Gatos Castrados', 'Seca', '1.5', 'kg', 'Gato', 18);
INSERT INTO `petshop_db`.`racoes` (marca_racao, tipo_racao, peso_racao, unidade_medida, tipo_animal, quantidade) 
VALUES ('Royal Canin Puppy', 'Seca', '3', 'kg', 'Cachorro', 30);

INSERT INTO `petshop_db`.`movimentacao` (tipo_mov, categoria, produto, quantidade) 
VALUES ('entrada', 'brinquedos', 'Bolinha Furacão', 10);
INSERT INTO `petshop_db`.`movimentacao` (tipo_mov, categoria, produto, quantidade) 
VALUES ('saida', 'racao', 'PremieR Gatos Castrados', 2);
INSERT INTO `petshop_db`.`movimentacao` (tipo_mov, categoria, produto, quantidade) 
VALUES ('entrada', 'medicamentos', 'Vermífugo Plus', 5);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
