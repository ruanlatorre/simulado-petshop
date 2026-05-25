-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

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
  `idbrinquedos` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_brinquedo` VARCHAR(45) NULL DEFAULT NULL,
  `peso_brinquedo` VARCHAR(45) NULL DEFAULT NULL,
  `unidade_medida` VARCHAR(45) NULL,
  `tipo_brinquedo` VARCHAR(45) NULL DEFAULT NULL,
  `tipo_animal` VARCHAR(45) NULL DEFAULT NULL,
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
  PRIMARY KEY (`idmedicamentos`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `petshop_db`.`produtos_higiene`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop_db`.`produtos_higiene` (
  `idprodutohigiene` INT(11) NOT NULL AUTO_INCREMENT,
  `marca_produto` VARCHAR(45) NULL DEFAULT NULL,
  `peso_produto` VARCHAR(45) NULL,
  `unidade_medida` VARCHAR(45) NULL DEFAULT NULL,
  `tipo_produto` VARCHAR(45) NULL DEFAULT NULL,
  `tipo_animal` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idprodutohigiene`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `petshop_db`.`racoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop_db`.`racoes` (
  `idracoes` INT(11) NOT NULL AUTO_INCREMENT,
  `marca_racao` VARCHAR(45) NULL DEFAULT NULL,
  `peso_racao` VARCHAR(45) NULL DEFAULT NULL,
  `unidade_medida` VARCHAR(45) NULL,
  `sabor_racao` VARCHAR(45) NULL DEFAULT NULL,
  `tipo_racao` VARCHAR(45) NULL DEFAULT NULL,
  `tipo_animal` VARCHAR(45) NULL DEFAULT NULL,
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
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
