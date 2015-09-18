-- MySQL Script generated by MySQL Workbench
-- Mon Sep 14 12:34:45 2015
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema resly
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema resly
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `resly` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `resly` ;

-- -----------------------------------------------------
-- Table `resly`.`Restaurant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `resly`.`Restaurant` (
  `restaurant_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(45) NOT NULL COMMENT '',
  `location` VARCHAR(200) NOT NULL COMMENT '',
  `restaurateur_id` INT NOT NULL COMMENT '',
  `description` VARCHAR(200) NULL,
  `cuisines` VARCHAR(200) NULL,
  PRIMARY KEY (`restaurant_id`)  COMMENT '',
  FOREIGN KEY (`restaurateur_id`) REFERENCES Restaurateur(`restaurateur_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `resly`.`Diner`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `resly`.`Diner` (
  `diner_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `fname` TEXT(20) NOT NULL COMMENT '',
  `lname` TEXT(20) NOT NULL COMMENT '',
  `email` VARCHAR(45) NOT NULL COMMENT '',
  `creditcard` VARCHAR(40) NOT NULL COMMENT '',
  PRIMARY KEY (`diner_id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `resly`.`Restaurateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `resly`.`Restaurateur` (
  `restaurateur_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `email` VARCHAR(45) NOT NULL COMMENT '',
  `creditcard` VARCHAR(45) NOT NULL COMMENT '',
  `fname` TEXT(20) NOT NULL COMMENT '',
  `lname` TEXT(20) NOT NULL COMMENT '',
  PRIMARY KEY (`restaurateur_id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `resly`.`Table`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `resly`.`Table` (
  `table_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `restaurant_id` INT NOT NULL COMMENT '',
  `position` VARCHAR(45) NOT NULL COMMENT '',
  `seats_number` INT NOT NULL COMMENT '',
  PRIMARY KEY (`table_id`)  COMMENT '',
  FOREIGN KEY (`restaurant_id`) REFERENCES 
    Restaurant(`restaurant_id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `resly`.`Booking`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `resly`.`Booking` (
  `booking_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `payment_id` INT NOT NULL,
  `diner_id` INT NOT NULL,
  `tables` VARCHAR(40) NOT NULL COMMENT 'Comma delimited booked tables',
  `restaurant_id` INT NOT NULL COMMENT '',
  `seats_number` INT NOT NULL COMMENT '',
  `booking_time` TIMESTAMP NOT NULL,
  `booking_duration` INT NOT NULL COMMENT 'In minutes',
  PRIMARY KEY (`booking_id`)  COMMENT '',
  FOREIGN KEY (`payment_id`) REFERENCES 
    Payment(`payment_id`),
  FOREIGN KEY (`diner_id`) REFERENCES
    Diner(`diner_id`),
  FOREIGN KEY (`restaurant_id`) REFERENCES
    Restaurant(`restaurant_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `resly`.`Payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `resly`.`Payment` (
  `payment_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `diner_id` INT NOT NULL COMMENT '',
  `payment_amount` INT NOT NULL COMMENT '',
  `payment_type` VARCHAR(30) NOT NULL COMMENT '',
  PRIMARY KEY (`payment_id`)  COMMENT '',
  FOREIGN KEY (`diner_id`) REFERENCES Diner(`diner_id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
