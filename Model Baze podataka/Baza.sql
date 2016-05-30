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
-- -----------------------------------------------------
-- Schema test
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema test
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `passsword` VARCHAR(255) NOT NULL,
  `type` INT(11) NOT NULL,
  `remember_token` VARCHAR(100) NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`registered_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`registered_users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `surname` VARCHAR(45) NOT NULL,
  `birth_date` DATE NOT NULL,
  `sex` CHAR NOT NULL,
  `country` VARCHAR(40) NOT NULL,
  `city` VARCHAR(40) NOT NULL,
  `relationship_status` VARCHAR(20) NOT NULL,
  `education` VARCHAR(20) NULL,
  `bio` VARCHAR(160) NULL,
  `hobbies` VARCHAR(160) NULL,
  `likes` VARCHAR(160) NULL,
  `dislikes` VARCHAR(160) NULL,
  `interested_in` CHAR(2) NULL,
  `minimal_age` INT NULL,
  `max_age` INT NULL,
  `number_of_warnings` INT ZEROFILL NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `IDKor`
    FOREIGN KEY (`id`)
    REFERENCES `mydb`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`match_requests`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`match_requests` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_source_user` INT UNSIGNED NOT NULL,
  `id_destination_user` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `IDKor_idx` (`id_source_user` ASC),
  INDEX `IDKorDo_idx` (`id_destination_user` ASC, `id_source_user` ASC),
  CONSTRAINT `id_source_user`
    FOREIGN KEY (`id_source_user`)
    REFERENCES `mydb`.`registered_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `id_destination_user`
    FOREIGN KEY (`id_destination_user` , `id_source_user`)
    REFERENCES `mydb`.`registered_users` (`id` , `id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`interactions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`interactions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user1` INT UNSIGNED NOT NULL,
  `id_user2` INT UNSIGNED NOT NULL,
  `messages` INT ZEROFILL NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `IDKor1_idx` (`id_user1` ASC),
  INDEX `IDKor2_idx` (`id_user2` ASC),
  CONSTRAINT `id_user1`
    FOREIGN KEY (`id_user1`)
    REFERENCES `mydb`.`registered_users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_user2`
    FOREIGN KEY (`id_user2`)
    REFERENCES `mydb`.`registered_users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`messages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`messages` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_interaction` INT UNSIGNED NOT NULL,
  `id_source_user` INT UNSIGNED NOT NULL,
  `time` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `IDInt_idx` (`id_interaction` ASC),
  INDEX `IDKorOd_idx` (`id_source_user` ASC),
  CONSTRAINT `id_interaction`
    FOREIGN KEY (`id_interaction`)
    REFERENCES `mydb`.`interactions` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `id_source_user`
    FOREIGN KEY (`id_source_user`)
    REFERENCES `mydb`.`registered_users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`photos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`photos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `link` VARCHAR(50) NULL,
  `id_user` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `IDKor_idx` (`id_user` ASC),
  CONSTRAINT `id_user`
    FOREIGN KEY (`id_user`)
    REFERENCES `mydb`.`registered_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`notifications`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`notifications` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_destination_user` INT UNSIGNED NOT NULL,
  `type` INT UNSIGNED NOT NULL,
  `time` TIMESTAMP NOT NULL,
  `description` VARCHAR(50) NULL,
  `id_source_user` INT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  INDEX `IDKor_idx` (`id_destination_user` ASC),
  INDEX `IDKorVeza_idx` (`id_source_user` ASC),
  CONSTRAINT `id_destination_user`
    FOREIGN KEY (`id_destination_user`)
    REFERENCES `mydb`.`registered_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `id_source_user`
    FOREIGN KEY (`id_source_user`)
    REFERENCES `mydb`.`registered_users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`reports`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`reports` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_source_user` INT UNSIGNED NOT NULL,
  `type` INT NOT NULL,
  `description` VARCHAR(120) NULL,
  `status` INT ZEROFILL NOT NULL,
  INDEX `IDKor_idx` (`id_source_user` ASC),
  CONSTRAINT `id_source_user`
    FOREIGN KEY (`id_source_user`)
    REFERENCES `mydb`.`registered_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `test` ;

-- -----------------------------------------------------
-- Table `test`.`migrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `test`.`migrations` (
  `migration` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `batch` INT(11) NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `test`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `test`.`password_resets` (
  `email` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `token` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `password_resets_email_index` (`email` ASC),
  INDEX `password_resets_token_index` (`token` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
