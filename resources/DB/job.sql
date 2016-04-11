-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema job
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `job` ;

-- -----------------------------------------------------
-- Schema job
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `job` DEFAULT CHARACTER SET utf8 ;
USE `job` ;

-- -----------------------------------------------------
-- Table `job`.`education`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `job`.`education` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ru` VARCHAR(100) NOT NULL,
  `en` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `job`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `job`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `lastName` VARCHAR(45) NOT NULL COMMENT 'фамилия',
  `firstName` VARCHAR(45) NOT NULL COMMENT 'имя',
  `patronymic` VARCHAR(45) NOT NULL COMMENT 'отчество',
  `yearOfBirth` DATE NOT NULL COMMENT 'Год рождения',
  `sex` ENUM('1', '2') NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(33) NOT NULL,
  `education_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `xEmail` (`email` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_user_education1_idx` (`education_id` ASC),
  CONSTRAINT `fk_user_education1`
  FOREIGN KEY (`education_id`)
  REFERENCES `job`.`education` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `job`.`work`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `job`.`work` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Опыт работы ',
  `organization` VARCHAR(255) NOT NULL COMMENT 'организация',
  `post` VARCHAR(100) NOT NULL COMMENT 'должность',
  `jobStartMonth` TINYINT NOT NULL COMMENT 'начало работы месяц',
  `jobStartYear` SMALLINT(4) NOT NULL COMMENT 'начало работы год',
  `forNow` TINYINT(1) NULL DEFAULT 0 COMMENT 'По настоящее время',
  `jobStopMonth` TINYINT NULL COMMENT 'начало работы месяц',
  `jobStopYear` SMALLINT(4) NULL COMMENT 'окончание работы год',
  `duties` VARCHAR(1024) NULL COMMENT 'обязанности',
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_work_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_work_user1`
  FOREIGN KEY (`user_id`)
  REFERENCES `job`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `job`.`phone`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `job`.`phone` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Контактная информация (телефон (-ы) и т.п.)',
  `phone` VARCHAR(10) NOT NULL DEFAULT '-',
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_phone_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_phone_user1`
  FOREIGN KEY (`user_id`)
  REFERENCES `job`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `job`.`location`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `job`.`location` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Место проживания',
  `name` VARCHAR(45) NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_location_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_location_user1`
  FOREIGN KEY (`user_id`)
  REFERENCES `job`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `job`.`maritalStatus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `job`.`maritalStatus` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Семейное положение',
  `name` VARCHAR(45) NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_maritalStatus_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_maritalStatus_user1`
  FOREIGN KEY (`user_id`)
  REFERENCES `job`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `job`.`about`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `job`.`about` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `about` VARCHAR(1024) NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_about_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_about_user1`
  FOREIGN KEY (`user_id`)
  REFERENCES `job`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `job`.`photo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `job`.`photo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `path` VARCHAR(255) NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  `size` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_photo_user_idx` (`user_id` ASC),
  CONSTRAINT `fk_photo_user`
  FOREIGN KEY (`user_id`)
  REFERENCES `job`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;

USE `job` ;

-- -----------------------------------------------------
-- procedure getUserInfo
-- -----------------------------------------------------

DELIMITER $$
USE `job`$$
CREATE PROCEDURE `getUserInfo` (IN userId INT)
  BEGIN
    SELECT
      u.lastName,
      u.firstName,
      u.patronymic,
      DATE_FORMAT(u.yearOfBirth, '%d.%m.%Y') AS yearOfBirth,
      u.sex,
      u.email,
      u.password,
      e.en,
      e.ru,
      l.name as lName,
      m.name as mName,
      a.about,
      (p.id) AS photoId,
      w.organization,
      w.post,
      w.jobStartMonth,
      w.jobStartYear,
      w.forNow,
      w.jobStopMonth,
      w.jobStopYear,
      w.duties,
      c.phone
    FROM (SELECT * FROM users WHERE users.id = userId) AS u
      LEFT JOIN locations AS l
        ON u.id = l.users_id

      LEFT JOIN maritalStatus AS m
        ON u.id = m.users_id

      LEFT JOIN educations AS e
        ON u.educations_id = e.id

      LEFT JOIN abouts AS a
        ON u.id = a.users_id

      LEFT JOIN photos AS p
        ON u.id = p.users_id

      LEFT JOIN works AS w
        ON u.id = w.users_id

      LEFT JOIN phones AS c
        ON u.id = c.users_id;

  END
$$

DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `job`.`education`
-- -----------------------------------------------------
START TRANSACTION;
USE `job`;
INSERT INTO `job`.`education` (`id`, `ru`, `en`) VALUES (1, '-', '-');
INSERT INTO `job`.`education` (`id`, `ru`, `en`) VALUES (2, 'Высшее', 'Higher');
INSERT INTO `job`.`education` (`id`, `ru`, `en`) VALUES (3, 'Среднее', 'Average');

COMMIT;

