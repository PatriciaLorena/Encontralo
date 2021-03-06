-- MySQL Script generated by MySQL Workbench
-- Thu Sep 17 09:53:33 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema empresa
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema empresa
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `empresa` DEFAULT CHARACTER SET utf8 ;
USE `empresa` ;

-- -----------------------------------------------------
-- Table `empresa`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresa`.`roles` (
  `idroles` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idroles`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `empresa`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresa`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `idroles` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `contraseña` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idusuario`),
  INDEX `fk_idx` (`idroles` ASC) VISIBLE,
  CONSTRAINT `fk`
    FOREIGN KEY (`idroles`)
    REFERENCES `empresa`.`roles` (`idroles`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `empresa`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresa`.`empresa` (
  `idEmpresa` INT NOT NULL AUTO_INCREMENT,
  `idUsuario` INT NOT NULL,
  `nombreEmpresa` VARCHAR(100) NOT NULL,
  `direccion` VARCHAR(100) NOT NULL,
  `ruc` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEmpresa`),
  UNIQUE INDEX `direccion_UNIQUE` (`direccion` ASC) VISIBLE,
  INDEX `fk_usuario_empresa_idx` (`idUsuario` ASC) VISIBLE,
  CONSTRAINT `fk_usuario_empresa`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `empresa`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `empresa`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresa`.`categoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `decricripcion` VARCHAR(255) NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `empresa`.`marca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresa`.`marca` (
  `idMarca` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `descripccion` VARCHAR(45) NULL,
  PRIMARY KEY (`idMarca`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `empresa`.`articulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresa`.`articulo` (
  `idArticulo` INT NOT NULL AUTO_INCREMENT,
  `idEmpresa` INT NOT NULL,
  `idMarca` INT NULL,
  `idCategoria` INT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `codigo` INT NOT NULL,
  `descripcion` VARCHAR(255) NULL,
  `imagen` VARCHAR(45) NULL,
  `caducidad` VARCHAR(45) NULL,
  `estado` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idArticulo`),
  INDEX `fk_empresa_producto_idx` (`idEmpresa` ASC) VISIBLE,
  INDEX `fk_categoria_producto_idx` (`idCategoria` ASC) VISIBLE,
  INDEX `fk_marca_producto_idx` (`idMarca` ASC) VISIBLE,
  CONSTRAINT `fk_empresa_producto`
    FOREIGN KEY (`idEmpresa`)
    REFERENCES `empresa`.`empresa` (`idEmpresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_categoria_producto`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `empresa`.`categoria` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_marca_producto`
    FOREIGN KEY (`idMarca`)
    REFERENCES `empresa`.`marca` (`idMarca`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
