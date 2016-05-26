-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`KORISNIK`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`KORISNIK` (
  `IDKor` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `korisnickoIme` VARCHAR(20) NOT NULL,
  `lozinka` VARCHAR(50) NOT NULL,
  `ime` VARCHAR(20) NOT NULL,
  `prezime` VARCHAR(20) NOT NULL,
  `email` VARCHAR(40) NOT NULL,
  `tip` INT NOT NULL,
  PRIMARY KEY (`IDKor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`REGISTROVANI_KORISNIK`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`REGISTROVANI_KORISNIK` (
  `idKor` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `datumRodjenja` DATE NOT NULL,
  `pol` CHAR NOT NULL,
  `drzava` VARCHAR(40) NOT NULL,
  `grad` VARCHAR(40) NOT NULL,
  `statusVeze` VARCHAR(20) NOT NULL,
  `obrazovanje` VARCHAR(20) NULL,
  `biografija` VARCHAR(160) NULL,
  `hobiji` VARCHAR(160) NULL,
  `lajkovi` VARCHAR(160) NULL,
  `dislajkovi` VARCHAR(160) NULL,
  `trazeniPol` CHAR(2) NULL,
  `brOpomena` INT ZEROFILL NOT NULL,
  `REGISTROVANI_KORISNIKcol` VARCHAR(45) NULL,
  PRIMARY KEY (`idKor`),
  CONSTRAINT `IDKor`
    FOREIGN KEY (`idKor`)
    REFERENCES `mydb`.`KORISNIK` (`IDKor`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`MATCH_REQUEST`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`MATCH_REQUEST` (
  `IDReq` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `IDKorOd` INT UNSIGNED NOT NULL,
  `IDKorDo` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`IDReq`),
  INDEX `IDKor_idx` (`IDKorOd` ASC),
  INDEX `IDKorDo_idx` (`IDKorDo` ASC, `IDKorOd` ASC),
  CONSTRAINT `IDKorOd`
    FOREIGN KEY (`IDKorOd`)
    REFERENCES `mydb`.`REGISTROVANI_KORISNIK` (`idKor`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `IDKorDo`
    FOREIGN KEY (`IDKorDo` , `IDKorOd`)
    REFERENCES `mydb`.`REGISTROVANI_KORISNIK` (`idKor` , `idKor`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`INTERAKCIJA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`INTERAKCIJA` (
  `IDInt` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `IDKor1` INT UNSIGNED NOT NULL,
  `IDKor2` INT UNSIGNED NOT NULL,
  `brPoruka` INT ZEROFILL NOT NULL,
  PRIMARY KEY (`IDInt`),
  INDEX `IDKor1_idx` (`IDKor1` ASC),
  INDEX `IDKor2_idx` (`IDKor2` ASC),
  CONSTRAINT `IDKor1`
    FOREIGN KEY (`IDKor1`)
    REFERENCES `mydb`.`REGISTROVANI_KORISNIK` (`idKor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `IDKor2`
    FOREIGN KEY (`IDKor2`)
    REFERENCES `mydb`.`REGISTROVANI_KORISNIK` (`idKor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`PORUKA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`PORUKA` (
  `IDPor` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `IDInt` INT UNSIGNED NOT NULL,
  `IDKorOd` INT UNSIGNED NOT NULL,
  `vreme` TIMESTAMP(6) NOT NULL,
  PRIMARY KEY (`IDPor`),
  INDEX `IDInt_idx` (`IDInt` ASC),
  INDEX `IDKorOd_idx` (`IDKorOd` ASC),
  CONSTRAINT `IDInt`
    FOREIGN KEY (`IDInt`)
    REFERENCES `mydb`.`INTERAKCIJA` (`IDInt`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `IDKorOd`
    FOREIGN KEY (`IDKorOd`)
    REFERENCES `mydb`.`REGISTROVANI_KORISNIK` (`idKor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`FOTOGRAFIJA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`FOTOGRAFIJA` (
  `IDFoto` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `link` VARCHAR(50) NULL,
  `IDKor` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`IDFoto`),
  INDEX `IDKor_idx` (`IDKor` ASC),
  CONSTRAINT `IDKor`
    FOREIGN KEY (`IDKor`)
    REFERENCES `mydb`.`REGISTROVANI_KORISNIK` (`idKor`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`NOTIFIKACIJA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`NOTIFIKACIJA` (
  `IDNot` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `IDKor` INT UNSIGNED NOT NULL,
  `tip` INT UNSIGNED NOT NULL,
  `vreme` TIMESTAMP(6) NOT NULL,
  `sadrzaj` VARCHAR(50) NULL,
  `IDKorVeza` INT UNSIGNED NULL,
  PRIMARY KEY (`IDNot`),
  INDEX `IDKor_idx` (`IDKor` ASC),
  INDEX `IDKorVeza_idx` (`IDKorVeza` ASC),
  CONSTRAINT `IDKor`
    FOREIGN KEY (`IDKor`)
    REFERENCES `mydb`.`REGISTROVANI_KORISNIK` (`idKor`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `IDKorVeza`
    FOREIGN KEY (`IDKorVeza`)
    REFERENCES `mydb`.`REGISTROVANI_KORISNIK` (`idKor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`PRIJAVA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`PRIJAVA` (
  `IDPri` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `IDKor` INT UNSIGNED NOT NULL,
  `tip` INT NOT NULL,
  `opis` VARCHAR(120) NULL,
  `status` INT ZEROFILL NOT NULL,
  INDEX `IDKor_idx` (`IDKor` ASC),
  CONSTRAINT `IDKor`
    FOREIGN KEY (`IDKor`)
    REFERENCES `mydb`.`REGISTROVANI_KORISNIK` (`idKor`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
