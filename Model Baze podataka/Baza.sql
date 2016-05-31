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
-- Table `mydb`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `email` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `password` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `type` INT(11) NOT NULL,
  `remember_token` VARCHAR(100) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 22
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
KEY_BLOCK_SIZE = 4;


-- -----------------------------------------------------
-- Table `mydb`.`registered_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`registered_users` (
  `id` INT(10) UNSIGNED NOT NULL,
  `name` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `surname` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `birth_date` DATETIME NOT NULL,
  `sex` CHAR(1) CHARACTER SET 'utf8' NOT NULL,
  `country` VARCHAR(40) CHARACTER SET 'utf8' NOT NULL,
  `city` VARCHAR(40) CHARACTER SET 'utf8' NOT NULL,
  `relationship_status` VARCHAR(22) CHARACTER SET 'utf8' NOT NULL,
  `education` VARCHAR(20) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `bio` VARCHAR(160) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `hobbies` VARCHAR(160) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `likes` VARCHAR(160) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `dislikes` VARCHAR(160) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `interested_in` CHAR(2) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `minimal_age` INT(11) NULL DEFAULT NULL,
  `max_age` INT(11) NULL DEFAULT NULL,
  `number_of_warnings` INT(10) UNSIGNED ZEROFILL NOT NULL,
  `first_date` VARCHAR(160) CHARACTER SET 'utf8' NOT NULL DEFAULT '/',
  `quote` VARCHAR(160) CHARACTER SET 'utf8' NULL DEFAULT '/',
  `song` VARCHAR(160) CHARACTER SET 'utf8' NULL DEFAULT '/',
  `longest_relationship` VARCHAR(160) CHARACTER SET 'utf8' NULL DEFAULT '/',
  `best_quality` VARCHAR(160) CHARACTER SET 'utf8' NULL DEFAULT '/',
  `worst_quality` VARCHAR(160) CHARACTER SET 'utf8' NULL DEFAULT '/',
  `work` VARCHAR(45) CHARACTER SET 'utf8' NULL DEFAULT '/',
  `photo_link` CHAR(44) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `id_user_reguser`
    FOREIGN KEY (`id`)
    REFERENCES `mydb`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `mydb`.`interactions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`interactions` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user1` INT(10) UNSIGNED NOT NULL,
  `id_user2` INT(10) UNSIGNED NOT NULL,
  `messages` INT(10) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `IDKor1_idx` (`id_user1` ASC),
  INDEX `IDKor2_idx` (`id_user2` ASC),
  CONSTRAINT `id_user1_int`
    FOREIGN KEY (`id_user1`)
    REFERENCES `mydb`.`registered_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `id_user2_int`
    FOREIGN KEY (`id_user2`)
    REFERENCES `mydb`.`registered_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `mydb`.`match_requests`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`match_requests` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_source_user` INT(10) UNSIGNED NOT NULL,
  `id_destination_user` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `IDKor_idx` (`id_source_user` ASC),
  INDEX `IDKorDo_idx` (`id_destination_user` ASC),
  CONSTRAINT `id_destination_user_mr`
    FOREIGN KEY (`id_destination_user`)
    REFERENCES `mydb`.`registered_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `id_source_user_mr`
    FOREIGN KEY (`id_source_user`)
    REFERENCES `mydb`.`registered_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `mydb`.`messages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`messages` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_interaction` INT(10) UNSIGNED NOT NULL,
  `id_source_user` INT(10) UNSIGNED NOT NULL,
  `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` VARCHAR(500) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `IDInt_idx` (`id_interaction` ASC),
  INDEX `IDKorOd_idx` (`id_source_user` ASC),
  CONSTRAINT `id_interaction_msgs`
    FOREIGN KEY (`id_interaction`)
    REFERENCES `mydb`.`interactions` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `id_source_user_msgs`
    FOREIGN KEY (`id_source_user`)
    REFERENCES `mydb`.`registered_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 22
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `mydb`.`migrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`migrations` (
  `migration` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `batch` INT(11) NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `mydb`.`notifications`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`notifications` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_destination_user` INT(10) UNSIGNED NOT NULL,
  `type` INT(10) UNSIGNED NOT NULL,
  `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_source_user` INT(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `IDKor_idx` (`id_destination_user` ASC),
  INDEX `IDKorVeza_idx` (`id_source_user` ASC),
  CONSTRAINT `id_destination_user_not`
    FOREIGN KEY (`id_destination_user`)
    REFERENCES `mydb`.`registered_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `id_source_user_not`
    FOREIGN KEY (`id_source_user`)
    REFERENCES `mydb`.`registered_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `mydb`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`password_resets` (
  `email` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `token` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `password_resets_email_index` (`email` ASC),
  INDEX `password_resets_token_index` (`token` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `mydb`.`photos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`photos` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `link` CHAR(44) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `id_user` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `IDKor_idx` (`id_user` ASC),
  CONSTRAINT `id_user_phot`
    FOREIGN KEY (`id_user`)
    REFERENCES `mydb`.`registered_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `mydb`.`reports`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`reports` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_source_user` INT(10) UNSIGNED NOT NULL,
  `type` INT(11) NOT NULL,
  `description` VARCHAR(120) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `status` INT(10) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `IDKor_idx` (`id_source_user` ASC),
  CONSTRAINT `id_source_user_reports`
    FOREIGN KEY (`id_source_user`)
    REFERENCES `mydb`.`registered_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
