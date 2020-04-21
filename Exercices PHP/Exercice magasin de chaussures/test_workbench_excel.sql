-- MySQL Script generated by MySQL Workbench
-- Thu Apr  2 16:20:08 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`tva`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tva` ;

CREATE TABLE IF NOT EXISTS `mydb`.`tva` (
  `IdTva` INT NOT NULL AUTO_INCREMENT,
  `NomTva` VARCHAR(45) NOT NULL,
  `StatutTva` VARCHAR(45) NULL,
  PRIMARY KEY (`IdTva`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`typeutilisateur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`typeutilisateur` ;

CREATE TABLE IF NOT EXISTS `mydb`.`typeutilisateur` (
  `IdTypeUtilisateur` INT NOT NULL AUTO_INCREMENT,
  `NomTypeUtilisateur` VARCHAR(255) NOT NULL,
  `tva_IdTva` INT NOT NULL,
  PRIMARY KEY (`IdTypeUtilisateur`),
  INDEX `fk_typeutilisateur_tva1_idx` (`tva_IdTva` ASC) VISIBLE,
  CONSTRAINT `fk_typeutilisateur_tva1`
    FOREIGN KEY (`tva_IdTva`)
    REFERENCES `mydb`.`tva` (`IdTva`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`regiondept`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`regiondept` ;

CREATE TABLE IF NOT EXISTS `mydb`.`regiondept` (
  `IdRegionDep` INT NOT NULL AUTO_INCREMENT,
  `NomDep` VARCHAR(255) NOT NULL,
  `NumDep` INT NOT NULL,
  `NomRegion` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`IdRegionDep`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ville`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`ville` ;

CREATE TABLE IF NOT EXISTS `mydb`.`ville` (
  `IdVille` INT NOT NULL AUTO_INCREMENT,
  `CodePostal` INT NOT NULL,
  `NomVille` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`IdVille`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`utilisateur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`utilisateur` ;

CREATE TABLE IF NOT EXISTS `mydb`.`utilisateur` (
  `IdUti` INT NOT NULL AUTO_INCREMENT,
  `NomUti` VARCHAR(255) NULL,
  `PrenomUser` VARCHAR(255) NULL,
  `NumRueUti` INT NOT NULL,
  `NomRueUti` VARCHAR(255) NULL,
  `EmailUti` VARCHAR(255) NULL,
  `Tel` VARCHAR(45) NOT NULL,
  `StatutUti` VARCHAR(255) NULL,
  `PaysUti` VARCHAR(45) NOT NULL,
  `typeutilisateur_IdTypeUtilisateur` INT NOT NULL,
  `regiondept_IdRegionDep` INT NOT NULL,
  `ville_IdVille` INT NOT NULL,
  PRIMARY KEY (`IdUti`),
  INDEX `fk_utilisateur_typeutilisateur_idx` (`typeutilisateur_IdTypeUtilisateur` ASC) VISIBLE,
  INDEX `fk_utilisateur_regiondept1_idx` (`regiondept_IdRegionDep` ASC) VISIBLE,
  INDEX `fk_utilisateur_ville1_idx` (`ville_IdVille` ASC) VISIBLE,
  CONSTRAINT `fk_utilisateur_typeutilisateur`
    FOREIGN KEY (`typeutilisateur_IdTypeUtilisateur`)
    REFERENCES `mydb`.`typeutilisateur` (`IdTypeUtilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utilisateur_regiondept1`
    FOREIGN KEY (`regiondept_IdRegionDep`)
    REFERENCES `mydb`.`regiondept` (`IdRegionDep`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utilisateur_ville1`
    FOREIGN KEY (`ville_IdVille`)
    REFERENCES `mydb`.`ville` (`IdVille`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`banque`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`banque` ;

CREATE TABLE IF NOT EXISTS `mydb`.`banque` (
  `IdBanque` INT NOT NULL AUTO_INCREMENT,
  `NomBanque` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`IdBanque`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`entrepot`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`entrepot` ;

CREATE TABLE IF NOT EXISTS `mydb`.`entrepot` (
  `IdEntrepot` INT NOT NULL AUTO_INCREMENT,
  `NomEntrepot` VARCHAR(255) NOT NULL,
  `Quantité` INT NOT NULL,
  `statutEntrepot` VARCHAR(45) NULL,
  PRIMARY KEY (`IdEntrepot`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`commande`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`commande` ;

CREATE TABLE IF NOT EXISTS `mydb`.`commande` (
  `IdCommande` INT NOT NULL AUTO_INCREMENT,
  `QuantitéCom` INT NOT NULL,
  `DateCommande` DATE NOT NULL,
  `utilisateur_IdUti` INT NOT NULL,
  `entrepot_IdEntrepot` INT NOT NULL,
  PRIMARY KEY (`IdCommande`),
  INDEX `fk_commande_utilisateur1_idx` (`utilisateur_IdUti` ASC) VISIBLE,
  INDEX `fk_commande_entrepot1_idx` (`entrepot_IdEntrepot` ASC) VISIBLE,
  CONSTRAINT `fk_commande_utilisateur1`
    FOREIGN KEY (`utilisateur_IdUti`)
    REFERENCES `mydb`.`utilisateur` (`IdUti`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_commande_entrepot1`
    FOREIGN KEY (`entrepot_IdEntrepot`)
    REFERENCES `mydb`.`entrepot` (`IdEntrepot`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`couleur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`couleur` ;

CREATE TABLE IF NOT EXISTS `mydb`.`couleur` (
  `IdCouleur` INT NOT NULL AUTO_INCREMENT,
  `NomCouleur` VARCHAR(45) NOT NULL,
  `StatueCouleur` VARCHAR(45) NULL,
  `couleurcol` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`IdCouleur`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`taille`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`taille` ;

CREATE TABLE IF NOT EXISTS `mydb`.`taille` (
  `IdTaille` INT NOT NULL AUTO_INCREMENT,
  `NomTaille` VARCHAR(45) NOT NULL,
  `StatutTaille` VARCHAR(45) NULL,
  PRIMARY KEY (`IdTaille`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`materiel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`materiel` ;

CREATE TABLE IF NOT EXISTS `mydb`.`materiel` (
  `IdMateriel` INT NOT NULL AUTO_INCREMENT,
  `NomMateriel` VARCHAR(255) NOT NULL,
  `StatutMateriel` VARCHAR(255) NULL,
  PRIMARY KEY (`IdMateriel`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`produit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`produit` ;

CREATE TABLE IF NOT EXISTS `mydb`.`produit` (
  `IdProduit` INT NOT NULL AUTO_INCREMENT,
  `NomProduit` VARCHAR(255) NOT NULL,
  `DescriptionProduit` VARCHAR(255) NOT NULL,
  `PrixHTProduit` DECIMAL(4,2) NOT NULL,
  `RefProduit` VARCHAR(255) NOT NULL,
  `VipProduit` VARCHAR(255) NOT NULL,
  `NoteProduit` INT NOT NULL,
  `StatutProduit` VARCHAR(255) NOT NULL,
  `commande_IdCommande` INT NOT NULL,
  `couleur_IdCouleur` INT NOT NULL,
  `taille_IdTaille` INT NOT NULL,
  `materiel_IdMateriel` INT NOT NULL,
  PRIMARY KEY (`IdProduit`),
  INDEX `fk_produit_commande1_idx` (`commande_IdCommande` ASC) VISIBLE,
  INDEX `fk_produit_couleur1_idx` (`couleur_IdCouleur` ASC) VISIBLE,
  INDEX `fk_produit_taille1_idx` (`taille_IdTaille` ASC) VISIBLE,
  INDEX `fk_produit_materiel1_idx` (`materiel_IdMateriel` ASC) VISIBLE,
  CONSTRAINT `fk_produit_commande1`
    FOREIGN KEY (`commande_IdCommande`)
    REFERENCES `mydb`.`commande` (`IdCommande`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produit_couleur1`
    FOREIGN KEY (`couleur_IdCouleur`)
    REFERENCES `mydb`.`couleur` (`IdCouleur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produit_taille1`
    FOREIGN KEY (`taille_IdTaille`)
    REFERENCES `mydb`.`taille` (`IdTaille`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produit_materiel1`
    FOREIGN KEY (`materiel_IdMateriel`)
    REFERENCES `mydb`.`materiel` (`IdMateriel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`banque_has_utilisateur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`banque_has_utilisateur` ;

CREATE TABLE IF NOT EXISTS `mydb`.`banque_has_utilisateur` (
  `banque_IdBanque` INT NOT NULL,
  `utilisateur_IdUti` INT NOT NULL,
  PRIMARY KEY (`banque_IdBanque`, `utilisateur_IdUti`),
  INDEX `fk_banque_has_utilisateur_utilisateur1_idx` (`utilisateur_IdUti` ASC) VISIBLE,
  INDEX `fk_banque_has_utilisateur_banque1_idx` (`banque_IdBanque` ASC) VISIBLE,
  CONSTRAINT `fk_banque_has_utilisateur_banque1`
    FOREIGN KEY (`banque_IdBanque`)
    REFERENCES `mydb`.`banque` (`IdBanque`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_banque_has_utilisateur_utilisateur1`
    FOREIGN KEY (`utilisateur_IdUti`)
    REFERENCES `mydb`.`utilisateur` (`IdUti`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;