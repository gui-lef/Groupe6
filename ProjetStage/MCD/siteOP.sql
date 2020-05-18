-- MySQL Script generated by MySQL Workbench
-- Mon May 18 16:17:21 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema siteOP
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `siteOP` ;

-- -----------------------------------------------------
-- Schema siteOP
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `siteOP` DEFAULT CHARACTER SET utf8 ;
USE `siteOP` ;

-- -----------------------------------------------------
-- Table `siteOP`.`Utilisateur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `siteOP`.`Utilisateur` ;

CREATE TABLE IF NOT EXISTS `siteOP`.`Utilisateur` (
  `idUtilisateur` INT NOT NULL,
  `nomUti` VARCHAR(255) NOT NULL,
  `prenomUti` VARCHAR(255) NOT NULL,
  `emailUti` VARCHAR(100) NOT NULL,
  `telUti` INT NOT NULL,
  `numRue` INT NOT NULL,
  `nomRue` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idUtilisateur`),
  UNIQUE INDEX `idUtilisateur_UNIQUE` (`idUtilisateur` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `siteOP`.`Adresse`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `siteOP`.`Adresse` ;

CREATE TABLE IF NOT EXISTS `siteOP`.`Adresse` (
  `idAdresse` INT NOT NULL AUTO_INCREMENT,
  `codePostal` INT NOT NULL,
  `NomVille` VARCHAR(255) NOT NULL,
  `NomPays` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idAdresse`),
  UNIQUE INDEX `idAdresse_UNIQUE` (`idAdresse` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `siteOP`.`Type Utilisateur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `siteOP`.`Type Utilisateur` ;

CREATE TABLE IF NOT EXISTS `siteOP`.`Type Utilisateur` (
  `idTypeUtilisateur` INT NOT NULL AUTO_INCREMENT,
  `nomTypeUtilisateur` VARCHAR(255) NOT NULL,
  `Utilisateur_idUtilisateur` INT NOT NULL,
  `Adresse_idAdresse` INT NOT NULL,
  PRIMARY KEY (`idTypeUtilisateur`),
  UNIQUE INDEX `idTypeUtilisateur_UNIQUE` (`idTypeUtilisateur` ASC) VISIBLE,
  UNIQUE INDEX `nomTypeUtilisateur_UNIQUE` (`nomTypeUtilisateur` ASC) VISIBLE,
  INDEX `fk_Type Utilisateur_Utilisateur1_idx` (`Utilisateur_idUtilisateur` ASC) VISIBLE,
  INDEX `fk_Type Utilisateur_Adresse1_idx` (`Adresse_idAdresse` ASC) VISIBLE,
  CONSTRAINT `fk_Type Utilisateur_Utilisateur1`
    FOREIGN KEY (`Utilisateur_idUtilisateur`)
    REFERENCES `siteOP`.`Utilisateur` (`idUtilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Type Utilisateur_Adresse1`
    FOREIGN KEY (`Adresse_idAdresse`)
    REFERENCES `siteOP`.`Adresse` (`idAdresse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `siteOP`.`Figurine`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `siteOP`.`Figurine` ;

CREATE TABLE IF NOT EXISTS `siteOP`.`Figurine` (
  `idFigurine` INT NOT NULL AUTO_INCREMENT,
  `nomFigurine` VARCHAR(255) NOT NULL,
  `prixFigurine` DECIMAL(3,2) NOT NULL,
  `genreFigurine` VARCHAR(255) NOT NULL,
  `imageFigurine` VARCHAR(255) NOT NULL,
  `dateAjoutFigurine` DATETIME NOT NULL,
  `qteFigurine` INT NOT NULL,
  PRIMARY KEY (`idFigurine`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `siteOP`.`Livre`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `siteOP`.`Livre` ;

CREATE TABLE IF NOT EXISTS `siteOP`.`Livre` (
  `idLivre` INT NOT NULL AUTO_INCREMENT,
  `titreLivre` VARCHAR(255) NOT NULL,
  `prixLivre` DECIMAL(3,2) NOT NULL,
  `genreLivre` VARCHAR(45) NOT NULL,
  `imageLivre` VARCHAR(255) NOT NULL,
  `dateAjoutLivre` DATETIME NOT NULL,
  `qteLivre` INT NOT NULL,
  PRIMARY KEY (`idLivre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `siteOP`.`DVD & Bluray`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `siteOP`.`DVD & Bluray` ;

CREATE TABLE IF NOT EXISTS `siteOP`.`DVD & Bluray` (
  `idDvd` INT NOT NULL AUTO_INCREMENT,
  `nomDvd` VARCHAR(255) NOT NULL,
  `prixDvd` DECIMAL(3,2) NOT NULL,
  `genreDvd` TINYINT(2) NULL,
  `imageDvd` VARCHAR(255) NOT NULL,
  `dateAjoutDvd` DATETIME NOT NULL,
  `qteDvd` INT NOT NULL,
  PRIMARY KEY (`idDvd`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `siteOP`.`Vetement`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `siteOP`.`Vetement` ;

CREATE TABLE IF NOT EXISTS `siteOP`.`Vetement` (
  `idVetement` INT NOT NULL AUTO_INCREMENT,
  `nomVetement` VARCHAR(255) NOT NULL,
  `prixVetement` DECIMAL(3,2) NOT NULL,
  `tailleVetement` VARCHAR(45) NOT NULL,
  `imageVetement` VARCHAR(45) NOT NULL,
  `dateAjoutVetement` DATETIME NOT NULL,
  `qteVetement` INT NOT NULL,
  PRIMARY KEY (`idVetement`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `siteOP`.`Goodie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `siteOP`.`Goodie` ;

CREATE TABLE IF NOT EXISTS `siteOP`.`Goodie` (
  `idGoodie` INT NOT NULL AUTO_INCREMENT,
  `nomGoodie` VARCHAR(255) NOT NULL,
  `prixGoodie` DECIMAL(3,2) NOT NULL,
  `imageGoodie` VARCHAR(45) NOT NULL,
  `dateAjoutGoodie` DATETIME NOT NULL,
  `qteGoodie` INT NOT NULL,
  PRIMARY KEY (`idGoodie`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `siteOP`.`Panier`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `siteOP`.`Panier` ;

CREATE TABLE IF NOT EXISTS `siteOP`.`Panier` (
  `idPanier` INT NOT NULL,
  `Figurine_idFigurine` INT NOT NULL,
  `Livre_idLivre` INT NOT NULL,
  `DVD & Bluray_idDvd` INT NOT NULL,
  `Vetement_idVetement` INT NOT NULL,
  `Goodie_idGoodie` INT NOT NULL,
  PRIMARY KEY (`idPanier`),
  INDEX `fk_Panier_Figurine_idx` (`Figurine_idFigurine` ASC) VISIBLE,
  INDEX `fk_Panier_Livre1_idx` (`Livre_idLivre` ASC) VISIBLE,
  INDEX `fk_Panier_DVD & Bluray1_idx` (`DVD & Bluray_idDvd` ASC) VISIBLE,
  INDEX `fk_Panier_Vetement1_idx` (`Vetement_idVetement` ASC) VISIBLE,
  INDEX `fk_Panier_Goodie1_idx` (`Goodie_idGoodie` ASC) VISIBLE,
  CONSTRAINT `fk_Panier_Figurine`
    FOREIGN KEY (`Figurine_idFigurine`)
    REFERENCES `siteOP`.`Figurine` (`idFigurine`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Panier_Livre1`
    FOREIGN KEY (`Livre_idLivre`)
    REFERENCES `siteOP`.`Livre` (`idLivre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Panier_DVD & Bluray1`
    FOREIGN KEY (`DVD & Bluray_idDvd`)
    REFERENCES `siteOP`.`DVD & Bluray` (`idDvd`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Panier_Vetement1`
    FOREIGN KEY (`Vetement_idVetement`)
    REFERENCES `siteOP`.`Vetement` (`idVetement`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Panier_Goodie1`
    FOREIGN KEY (`Goodie_idGoodie`)
    REFERENCES `siteOP`.`Goodie` (`idGoodie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `siteOP`.`Commande`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `siteOP`.`Commande` ;

CREATE TABLE IF NOT EXISTS `siteOP`.`Commande` (
  `idCommande` INT NOT NULL AUTO_INCREMENT,
  `Panier_idPanier` INT NOT NULL,
  UNIQUE INDEX `idType de produit_UNIQUE` (`idCommande` ASC) VISIBLE,
  PRIMARY KEY (`idCommande`),
  INDEX `fk_Commande_Panier1_idx` (`Panier_idPanier` ASC) VISIBLE,
  CONSTRAINT `fk_Commande_Panier1`
    FOREIGN KEY (`Panier_idPanier`)
    REFERENCES `siteOP`.`Panier` (`idPanier`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;